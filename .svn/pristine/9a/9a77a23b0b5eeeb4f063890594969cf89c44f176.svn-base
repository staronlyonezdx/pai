<?php
/**
 * Created by PhpStorm.
 * User: lyh
 * Date: 2018/9/1
 * Time: 10:25
 * 测试连接：http://www.pai.com/crontab/Liupai/index
 */
namespace app\crontab\controller;

use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use think\Controller;
use think\Db;

class Liupai extends  Controller
{
    public function index(){
        $now = time();
        $where['o.o_paystate'] = 2;// 1待付款，2已付款，3退款中，4退款完成
        $where['o.o_state'] = 1;// 订单状态1参拍中，2已中拍，3已发货，4已签收（待评价），5交易完成，10未中拍 11流拍
        $where['g.g_endtime'] = ['lt',$now];
        $row = Db("order_pai")->alias("o")
            ->join('pai_goods_product gp', 'gp.gp_id = o.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->join('pai_member m', 'm.m_id = o.m_id', 'left')
            ->where($where)
            ->field("o.o_id,o.o_sn,o.m_id,o.o_totalmoney,o.gp_id,g.g_endtime,m.m_name,m.m_levelid,gp.is_fudai,g.g_id")
            ->select();
        $count = count($row);
        echo "共有".$count."条订单待统计;\n";

        if($count > 0){
            $orderpai = new OrderPaiService();
            $i = 0;
            foreach($row as $k => &$v){
                $o_id = $v['o_id'];
                $m_id = $v['m_id'];
                $o_totalmoney = $v['o_totalmoney'];
                $g_endtime = $v['g_endtime'];
                $m_name = $v['m_name'];
                $m_levelid = $v['m_levelid'];
                $is_fudai = $v['is_fudai'];
                $g_id = $v['g_id'];
                $i++;
                if($o_totalmoney > 0){
                    // 启动事务
                    Db::startTrans();
                    try{

                        $mem_info = Db("member")->where(['m_id'=>$m_id])->find();
                        if(!empty($mem_info)){
                            // 1.退款记录
                            $refund['refund_time'] = time();
                            $refund['m_id'] = $m_id;
                            $refund['refund_money'] = $o_totalmoney;
                            $refund['refund_success_time'] = time();
                            $refund['refund_state'] = 8;
                            $refund['refund_fromid'] = $o_id;
                            $refund['refund_reason'] = '订单流拍退款！';
                            $refund_id = Db("refund")->insertGetId($refund);
                            if(!$refund_id){
                                throw new \Exception("流拍订单o_id:".$o_id."的退款记录生成失败！");
                            }

                            // 2.生成money_log日志
                            if($refund_id){
                                $money_log['ml_type'] = 'add';
                                $money_log['ml_reason'] = "订单流拍退款";
                                $money_log['ml_table'] = 4;
                                $money_log['ml_money'] = $o_totalmoney;
                                $money_log['money_type'] = 1;
                                $money_log['nickname'] = $m_name;
                                $money_log['position'] = $m_levelid;
                                $money_log['add_time'] = time();
                                $money_log['from_id'] = $refund_id;
                                $money_log['m_id'] = $m_id;
                                $log_id = Db("money_log")->insertGetId($money_log);
                                if(!$log_id){
                                    throw new \Exception("流拍订单o_id:".$o_id."的money_log日志生成失败！");
                                }
                            }

                            // 3.返款到用户表

                            $res = Db("member")->where(['m_id'=>$m_id])->setInc('m_money',$o_totalmoney);
                            if(!$res){
                                throw new \Exception("用户m_id:".$m_id."的流拍订单退款失败");
                            }

                            // 4.更改订单状态
                            $res = Db("order_pai")->where(['o_id'=>$o_id])->update(['o_state'=>11,'o_paystate'=>4]);
                            if(!$res){
                                throw new \Exception("用户m_id:".$m_id."的流拍订单状态修改");
                            }
                        }
                        // 5.更改商品状态
                        $res = Db("goods")->where(['g_id'=>$g_id])->update(['g_state'=>8]);
                        if(!$res){
                            throw new \Exception("商品g_id:".$m_id."的流拍状态修改失败！");
                        }

                        // 6.如果是福袋商品
                        if($is_fudai == 1){
                            $call_back = $orderpai->sale_next_fudai();
                        }

                        // 提交事务
                        Db::commit();
                    }catch(\Exception $e){
                        Db::rollback();
                        // 错误日志
                        $error_data['el_type_id'] = 1;
                        $error_data['el_description'] = $e->getMessage();
                        $error_data['m_id'] = $m_id;
                        $error_data['el_time'] = time();
                        Db::table('pai_error_log')->data($error_data)->insert();
                        continue;
                    }
                    echo "处理进度".$i.'/'.$count.";\n";
                }

            }
        }else{
            echo "没有待处理的订单啦~;";
        }

    }
}