<?php
/**
 * Created by PhpStorm.
 * User: lyh
 * Date: 2018/9/1
 * Time: 10:25
 * 线上运行连接：http://m.paiyy.com.cn/crontab/Tipsforwinners/index
 */
namespace app\crontab\controller;

use think\Controller;
use think\Db;
use app\data\service\config\ConfigService as ConfigService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\popularity\PopularityService;
use app\data\service\system_msg\SystemMsgService as SystemMsgService;

class Tipsforwinners extends  Controller
{
    /**
     * 人气商品中奖用户超出3天未填写地址发系统消息
     * 刘勇豪
     */
    public function index(){

        $out_day = 3;//3天
        $where = '';
        $where['pm_state'] = 3;//中奖
        $where['pm_order_status'] = 1;//待发货
        $list = Db("popularity_member")->where($where)->where('pm_addressid',null)->select();

        $total_num = count($list);

        $ok_num = 0;
        $error_num = 0;
        if(empty($list)){
            echo "无需采处理\n";
        }else{
            $popularity = new PopularityService();
            foreach($list as $k => $v){

                // 判断今天是否已经发送过消息



                $pg_id = $v['pg_id'];
                $pm_periods = $v['pm_periods'];
                $callback = $popularity->get_award_time($pg_id,$pm_periods);

                $publish_time = $callback['data'];

                if($publish_time && $publish_time < (time() - $out_day * 24 * 60 * 60)){
                    // 给未填写地址的中奖者发送信息
                    $systemMsg = new SystemMsgService();
                    $msg_data['sm_addtime'] = time();//系统消息添加时间
                    $msg_data['sm_title'] = "订单待处理信息";//消息标题
                    $msg_data['sm_brief'] = "您有团中的人气王订单需要填写地址";//消息简介
                    $msg_data['sm_content'] = "尊敬的拍吖吖用户，您好！您有一笔人气王订单还没有填写收货地址，请到个人中心->选择人气购订单->待发货的订单里，选择未填写收货地址的订单，填写收货地址后我们才能为您发货哟~！";//消息内容
                    $msg_data['to_mid'] = $v['m_id'];//收消息人ID
                    $res = $systemMsg->add_msg($msg_data);
                    if($res){
                        $ok_num++;
                    }else{
                        $error_num++;
                    }
                }
            }
            echo "本地任务共找到".$total_num."位人气王还诶有填写地址，其中".($ok_num + $error_num)."位人气王已经超出3天没有填写地址了".$ok_num."位已成功发送通知消息，".$error_num."条发送失败\n";
        }
    }
}