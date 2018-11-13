<?php
/**
 * Created by PhpStorm.
 * User: shine
 * Date: 2018/8/15
 * Time: 11:56
 */

namespace app\data\model\popularity;

use app\data\model\BaseModel as BaseModel;
use app\data\service\popularity\PopularityGoodsService;
use app\data\service\popularity\PopularityMemberService;
use app\data\service\system_msg\SystemMsgService;
use think\Db;

class PopularityGoodsModel extends BaseModel
{
    protected $db = 'popularity_goods' ;//人气商品表

    /**
     * 最大期数
     * 邓赛赛
     */
    public function max_periods($where,$field){
        $max = Db($this->db)->where($where)->max($field);
        return $max;
    }
    /**
     * 更多活动
     * 邓赛赛
     */
    public function more_activities($where,$order,$field,$offset,$page_size){
        $list = Db($this->db)
            ->alias('pg')
            ->join('pai_popularity_member pm','pg.pg_id = pm.pg_id','left')
            ->where($where)
            ->order($order)
            ->field($field)
            ->limit($offset,$page_size)
            ->select();
        $lists['list'] = array();
        foreach($list as $k => $v){
            if(!empty($v['pg_id'])){
                $lists['list'][] = $v;
            }
        }
        $total_num = Db($this->db)
            ->alias('pg')
            ->join('pai_popularity_member pm','pg.pg_id = pm.pg_id','left')
            ->where($where)
            ->count();
        $total_page = ceil($total_num/$page_size);
        $lists['page_size'] = $page_size;
        $new_num = count($lists['list']);
        $lists['new_num'] = $new_num;
        $lists['total_num'] = $total_num;
        $lists['total_page'] = $total_page;
        return $lists;
    }

    /**
     * 获取精选推荐
     * 邓赛赛
     */
    public function get_recommendation($where,$field){
        $list = Db::table('pai_popularity_goods')->where($where)->field($field)->order('pg_position asc')->select();
        $lists = array();
        $p_member = new PopularityMemberService();
        $p_goods = new PopularityGoodsService();
        foreach($list as $k => $v){

            //最大期数
            $max_periods = $p_goods->get_max_periods($v['pg_id']);
            $where = [
                'pg_id'     =>$v['pg_id'],
                'pm_state'  =>2,
                'pm_periods'  =>$max_periods
            ];
            //最大期参拍人数
            $num= $p_member->get_count($where);
            //前台百分比计算
            $percentage = $num/$v['pg_membernum']*100;
            //百分比舍进
            $v['percentage'] =  $p_goods->percentage($percentage)."%";
            $lists[$v['pg_position']-1] = $v;
        }
        return $lists;
    }

    /**
     * 时间到时候自动补齐商品
     * 邓赛赛
     */
    public function go_time_shop(){
        //精选推荐
        $popularity_goods = new PopularityGoodsService();
        $where1 = [
            'pg_state'=>1,
            'pg_type'=>['<>',3],
            'is_show'=>1,
            'pg_status'=>1,
            'end_time'=>['>',time()],
            'pg_position'=>['between','1,12']
        ];
        $list = $popularity_goods->get_column($where1,'pg_position');
        $list = empty($list) ? [] : $list;
        sort($list);
        $where2 = [
            'pg_state'=>1,
            'pg_type'=>['<>',3],
            'pg_status'=>2,
            'end_time'=>['>',time()],
        ];
        for($i = 1; $i <= 12 ; $i ++){
            if(!in_array($i,$list)){
                $where2['pg_position'] = $i;
                // 判断和更新下一个预上线产品上线
                $nex_goods = Db("popularity_goods")->where($where2)->order("pg_sortnum desc")->find();
                if(!empty($nex_goods)){
                    Db("popularity_goods")->where(['pg_id'=>$nex_goods['pg_id']])->order("pg_sortnum desc")->update(['pg_status'=>1,'is_show'=>1,'update_time'=>time()]);
                    // 给收藏此商品的人发布通知
                    $collect_list = Db("popularity_collection")->where(['pg_id'=>$nex_goods['pg_id']])->select();
                    if(!empty($collect_list)){
                        $systemMsg = new SystemMsgService();
                        foreach($collect_list as $cv){
                            // 给收藏者发送信息
                            $msg_data['sm_addtime'] = time();//系统消息添加时间
                            $msg_data['sm_title'] = "您收藏的人气商品上线啦";//消息标题
                            $msg_data['sm_brief'] = "您收藏的人气商品上线啦，快去看看吧！";//消息简介
                            $msg_data['sm_content'] = "您在收藏的商品 ".$nex_goods['pg_name']." 商品第".$nex_goods['pg_periods']." 期人气购活动中已发布，快去会场看看吧~！";//消息内容
                            $msg_data['to_mid'] = $cv['m_id'];//收消息人ID
                            $systemMsg->add_msg($msg_data);
                        }
                    }
                }
            }
        }
    }

}