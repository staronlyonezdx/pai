<?php
/**
 * Created by PhpStorm.
 * User: lyh
 * Date: 2018/9/1
 * Time: 10:25
 * 线上运行连接：http://www.paiyy.com.cn/crontab/Paiorderautodo/auto_confirm_order
 */
namespace app\crontab\controller;

use think\Controller;
use think\Db;
use app\data\service\config\ConfigService as ConfigService;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use app\data\service\orderAwardcode\OrderAwardcodeService as OrderAwardcodeService;
use app\data\service\member\MemberService as MemberService;

class Paiorderautodo extends  Controller
{
    /**
     * 自动确认订单
     * 刘勇豪
     */
    public function auto_confirm_order(){
        $res = Db("config")->where(['c_code'=>'LOG_CONFIRM'])->find();
        $log_confirm = 15;
        if(!empty($res) ){
            $log_confirm = $res['c_value'];
        }

        $log_comfirm_time = $log_confirm * 24 * 60 * 60;

        $where = '';
        $where['o_state'] = 3;//已发货
        $where['o_delivertime'] = ['lt',time()-$log_comfirm_time];
        $order_list = Db("order_pai")->where($where)->select();

        $count = Db("order_pai")->where($where)->count();//总共几条
        echo "共有".$count."条数据待处理\n;";

        if(!empty($order_list)){
            $member = new MemberService();

            // 退款、转花生的比例参数
            $config = new ConfigService();
            $con_peanut_info = $config->configInfo(['c_code'=>'PEANUT']);

            $success_num = 0;
            $fail_num = 0;
            $do_num = 0;

            foreach($order_list as $v){
                $o_id = $v['o_id'];//店铺id
                $store_id = $v['store_id'];//店铺id
                $o_money = $v['o_money'];//订单折拍单价
                $o_deliverfee = $v['o_deliverfee'];// 订单运费
                $o_sn = $v['o_sn'];// 订单sn
                $gdr_id = $v['gdr_id'];// 订单折扣编号
                $periods = $v['o_periods'];// 期数
                $error_m_id = $v['m_id'];//错误的m_id

                // 事务
                Db::startTrans();
                try{
                    // 1.更新订单状态
                    $data['o_state'] = 4;
                    $data['o_dealtime'] = time();
                    $data['o_receivetime'] = time();
                    $res = Db("order_pai")->where(['o_id'=>$o_id])->update($data);
                    if(!$res){
                        $o_state = Db("order_pai")->where(['o_id'=>$o_id])->value("o_state");
                        if($o_state != 4){
                            throw new \Exception("订单编号为".$o_id."在执行自动确认收货时没有执行成功");
                        }
                    }

                    // 2.本期中拍结果统计并退款
                    $where_state3['gdr_id'] = $gdr_id;
                    $where_state3['o_periods'] = $periods;
                    $where_state3['o_paystate'] = 3;
                    $where_state3['o_state'] = 10;
                    $list_state3 = Db("order_pai")->where($where_state3)->select();

                    // 中拍订单
                    $list_state2 = Db("order_pai")->where(['o_id'=>$o_id])->find();
                    if(!empty($list_state2) && $list_state2['gp_num'] > 1){
                        $o_money = $list_state2['o_money'];
                        $o_deliverfee = $list_state2['o_deliverfee'];
                        $list_state2['o_totalmoney'] = $list_state2['o_totalmoney'] - $o_money - $o_deliverfee;
                        $list_state3[] = $list_state2;
                    }

                    if(!empty($list_state3)){
                        foreach($list_state3 as $vv){
                            $vv_o_id = $vv['o_id'];
                            $vv_m_id = $vv['m_id'];
                            $vv_o_sn = $vv['o_sn'];
                            $vv_o_money = $vv['o_money'];
                            $vv_gp_num = $vv['gp_num'];
                            $vv_o_totalmoney = $vv['o_totalmoney'];
                            $vv_o_money = $vv['o_money'];
                            $vv_o_deliverfee = $vv['o_deliverfee'];
                            $vv_o_state = $vv['o_state'];
                            $vv_o_is_no_tip = $vv['o_is_no_tip'];
                            $error_m_id = $vv_m_id;//错误的m_id

                            $peanut_rate = 0.05;//默认值(每次进来都要初始化一下)
                            if(!empty($con_peanut_info) && !empty($con_peanut_info['c_value'])){
                                $peanut_rate = $con_peanut_info['c_value'];
                            }
                            if($vv_o_is_no_tip == 2){
                                $peanut_rate = 0;
                            }

                            // 退款者信息
                            $mem_info = $member->get_info(['m_id' => $vv_m_id]);
                            if(!empty($mem_info)){
                                $m_name = $mem_info['m_name'];
                                $m_levelid = $mem_info['m_levelid'];

                                // 1.退款日志
                                $refund_momey = round($vv_o_totalmoney*(1-$peanut_rate),2);//订单退款
                                $refund_peanut = round($vv_o_totalmoney*$peanut_rate,2);// 订单的手续费（转换为花生）


                                $refund['refund_time'] = time();
                                $refund['m_id'] = $vv_m_id;
                                $refund['refund_money'] = $refund_momey;
                                $refund['refund_success_time'] = time();
                                $refund['refund_state'] = 8;
                                $refund['refund_fromid'] = $vv_o_id;
                                $refund['refund_reason'] = '未中拍退款！';
                                $refund_id = Db("refund")->insertGetId($refund);

                                // 2.生成money_log日志
                                if($refund_id){
                                    $money_log['ml_type'] = 'add';
                                    $money_log['ml_reason'] = "未拍中自动退款";
                                    $money_log['ml_table'] = 4;
                                    $money_log['ml_money'] = $refund_momey;
                                    $money_log['money_type'] = 1;
                                    $money_log['nickname'] = $mem_info['m_name'];
                                    $money_log['position'] = $mem_info['m_levelid'];
                                    $money_log['add_time'] = time();
                                    $money_log['from_id'] = $refund_id;
                                    $money_log['m_id'] = $vv_m_id;
                                    $log_id = Db("money_log")->insertGetId($money_log);
                                }

                                // 3.返款到用户表
                                Db("member")->where(['m_id'=>$vv_m_id])->setInc('m_money',$refund_momey);

                                // 4.返还花生
                                if($refund_peanut > 0){
                                    $peanut_log['pl_num'] = $refund_peanut;
                                    $peanut_log['pl_time'] = time();
                                    $peanut_log['from_id'] = $vv_o_id;
                                    $peanut_log['pl_type'] = 'add';
                                    $peanut_log['pl_state'] = 8;
                                    $peanut_log['pl_mid'] = $vv_m_id;
                                    $peanut_log['pl_reason'] = "未中拍订单返回";
                                    $plog_id = Db("peanut_log")->insertGetId($peanut_log);

                                    // 5.返花生到用户表
                                    Db("member")->where(['m_id'=>$vv_m_id])->setInc('peanut',$refund_peanut);
                                }

                                // 6.更新用户订单和中拍码状态
                                Db("order_pai")->where(['o_id'=>$o_id])->update(['o_paystate'=>4]);
                            }
                        }
                    }
                    // 执行提交操作
                    Db::commit();
                    $success_num++;
                }catch(\Exception $e){
                    // 回滚事务
                    Db::rollback();
                    // 错误日志
                    $error_data['el_type_id'] = 1;
                    $error_data['el_description'] = $e->getMessage();
                    $error_data['m_id'] = $error_m_id;
                    $error_data['el_time'] = time();
                    Db::table('pai_error_log')->data($error_data)->insert();
                    $fail_num++;
                }
                $do_num++;
            }
            echo "处理完毕！本次任务共处理了".$do_num."条数据，其中".$success_num."处理成功，".$fail_num."条处理失败";
            if($fail_num){
                echo "错误原因请到pai_error_log表查看";
            }
            echo "\n";
        }else{
            echo "没有待自动发货的订单哦~\n";
        }
    }
}