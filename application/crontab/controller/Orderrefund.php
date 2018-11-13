<?php
/**
 * Created by PhpStorm.
 * User: lyh
 * Date: 2018/9/1
 * Time: 10:25
 * 备注：此脚本用来对pai_order_pai中的退款中的订单立即退款完成。（没必要每天执行）。
 * 测试连接：http://www.pai.com/crontab/Orderrefund/index
 */
namespace app\crontab\controller;

use app\data\service\member\MemberService as MemberService;
use app\data\service\config\ConfigService as ConfigService;
use think\Controller;
use think\Db;

class Orderrefund extends  Controller
{
    public function index(){

        //查找所有退款中的订单退款
        $where = '';
        $where['o_paystate'] = 3;//退款中
        $list = Db("order_pai")->where($where)->select();

        $total_todo = count($list);

        $member = new MemberService();

        // 退款、转花生的比例参数
        $config = new ConfigService();
        $con_peanut_info = $config->configInfo(['c_code'=>'PEANUT']);
        $peanut_rate = 0;//默认值
        if(!empty($con_peanut_info) && !empty($con_peanut_info['c_value'])){
            $peanut_rate = $con_peanut_info['c_value'];
        }

        $num = 0;
        if(empty($list)){
            echo "没有退款中的订单啦~";
        }else{
            foreach($list as $v){
                $o_id = $v['o_id'];
                $m_id = $v['m_id'];
                $o_sn = $v['o_sn'];
                $o_money = $v['o_money'];
                $gp_num = $v['gp_num'];
                $o_totalmoney = $v['o_totalmoney'];
                $o_money = $v['o_money'];
                $o_deliverfee = $v['o_deliverfee'];
                $o_state = $v['o_state'];
                $o_is_no_tip = $v['o_is_no_tip'];
                if($o_is_no_tip == 2){
                    $peanut_rate = 0;
                }

                // 1.退款金额
                $refund_momey = 0;
                if($o_state == 10){
                    //未中奖
                    $refund_momey = $o_totalmoney;
                }elseif($o_state < 10 && $o_state > 1){
                    // 中奖
                    $refund_momey = $o_totalmoney - $o_money - $o_deliverfee;
                }

                // 退款者信息
                $mem_info = $member->get_info(['m_id' => $m_id]);

                if(!$refund_momey){
                    // 数据矫正
                    // 6.过去有买了一件的订单状态为退款中的要改回2
                    // 事务
                    Db::startTrans();
                    try{
                        Db("order_pai")->where(['o_id'=>$o_id])->update(['o_paystate'=>2]);
                        // 执行提交操作
                        Db::commit();
                        $num++;
                    }catch(\Exception $e){
                        // 回滚事务
                        Db::rollback();
                        // 错误日志
                        $error_data['el_type_id'] = 1;
                        $error_data['el_description'] = $e->getMessage();
                        $error_data['m_id'] = $m_id;
                        $error_data['el_time'] = time();
                        Db::table('pai_error_log')->data($error_data)->insert();
                        // 获取提示信息
                        continue;
                    }
                }elseif($refund_momey > 0 && !empty($mem_info)){

                    // 事务
                    Db::startTrans();
                    try{
                        $m_name = $mem_info['m_name'];
                        $m_levelid = $mem_info['m_levelid'];

                        // 1.退款日志
                        $refund_momey = round($refund_momey*(1-$peanut_rate),2);//订单退款
                        $refund_peanut = round($refund_momey*$peanut_rate,2);// 订单的手续费（转换为花生）

                        $refund['refund_time'] = time();
                        $refund['m_id'] = $m_id;
                        $refund['refund_money'] = $refund_momey;
                        $refund['refund_success_time'] = time();
                        $refund['refund_state'] = 8;
                        $refund['refund_fromid'] = $o_id;
                        $refund['refund_reason'] = '未中拍退款！';
                        $refund_id = Db("refund")->insertGetId($refund);

                        // 2.生成money_log日志
                        if($refund_id){
                            $money_log['ml_type'] = 'add';
                            $money_log['ml_reason'] = "未拍中自动退款";
                            $money_log['ml_table'] = 4;
                            $money_log['ml_money'] = $refund_momey;
                            $money_log['money_type'] = 1;
                            $money_log['nickname'] = $m_name;
                            $money_log['position'] = $m_levelid;
                            $money_log['add_time'] = time();
                            $money_log['from_id'] = $refund_id;
                            $money_log['m_id'] = $m_id;
                            $log_id = Db("money_log")->insertGetId($money_log);
                        }

                        // 3.返款到用户表
                        Db("member")->where(['m_id'=>$m_id])->setInc('m_money',$refund_momey);

                        // 4.返还花生
                        if($refund_peanut > 0){
                            $peanut_log['pl_num'] = $refund_peanut;
                            $peanut_log['pl_time'] = time();
                            $peanut_log['from_id'] = $o_id;
                            $peanut_log['pl_type'] = 'add';
                            $peanut_log['pl_state'] = 8;
                            $peanut_log['pl_mid'] = $m_id;
                            $peanut_log['pl_reason'] = "未订单返回";
                            $plog_id = Db("peanut_log")->insertGetId($peanut_log);

                            // 5.返花生到用户表
                            Db("member")->where(['m_id'=>$m_id])->setInc('peanut',$refund_peanut);
                        }

                        // 6.更新用户订单和中拍码状态
                        Db("order_pai")->where(['o_id'=>$o_id])->update(['o_paystate'=>4]);

                        // 执行提交操作
                        Db::commit();
                        $num++;
                        // return ['status' => 1, 'msg' => '订单签收成功！'];
                    }catch(\Exception $e){
                        // 回滚事务
                        Db::rollback();
                        // 错误日志
                        $error_data['el_type_id'] = 1;
                        $error_data['el_description'] = $e->getMessage();
                        $error_data['m_id'] = $m_id;
                        $error_data['el_time'] = time();
                        Db::table('pai_error_log')->data($error_data)->insert();

                        // 获取提示信息
                        continue;
                    }
                }
            }
            echo "共有".$total_todo."条订单退款中，本次操作成功处理".$num."条，".($total_todo - $num)."条处理失败！";
        }
    }
}