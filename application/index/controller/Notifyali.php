<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Config;
use think\Cache;
use think\Session;
use app\member\controller\IndexHome;
use app\data\service\recharge\RechargeService;
use think\Db;
use think\log;
use app\data\service\orderPai\OrderPaiService;

class Notifyali extends IndexHome
{
    //支付宝wap回调路径
    public function notifyurl()
    {
        require_once "../vendor/alipay/config.php";
        require_once '../vendor/alipay/service/AlipayTradeService.php';
        $arr = $_POST;
        $alipaySevice = new \AlipayTradeService($config);
        $alipaySevice->writeLog(var_export($_POST, true));
        $result = $alipaySevice->check($arr);
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */

        if ($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
            //商户订单号
            $out_trade_no = $_POST['out_trade_no'];
            $oid_arr=explode("-",$out_trade_no);
            $oid=$oid_arr[0];
            //支付宝交易号
            $trade_no = $_POST['trade_no'];
            //交易状态
            $trade_status = $_POST['trade_status'];
            if ($_POST['trade_status'] == 'TRADE_FINISHED') {

                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
                $sql = "select * from pai.pai_recharge where r_id=" . $oid;
                $rlist = Db::table("pai_recharge")->query($sql);
                if (!empty($rlist[0]['r_id'])) {
                    if ($rlist[0]['r_state'] != '8') {
                        $r_id = $oid;
                        $r_state = '8';
                        $r_money =$rlist[0]['r_money'];
                        $r_in_money =$_POST['buyer_pay_amount'];
                        $r_out_trade_no="'".$_POST['out_trade_no']."'";
                        $r_success_time = time();
                        $sql2 = "update pai.pai_recharge set r_state=$r_state,r_in_money=$r_in_money,r_out_trade_no=$r_out_trade_no,r_success_time=$r_success_time where r_id=" . $r_id;
                        $res = Db::table("pai_recharge")->execute($sql2);
                        if (!$res) {
                            Log::write("update pai_recharge fall:" . time());
                        }
                        $experience=intval($r_money);
                        $sql3 = "update pai.pai_member set m_money=m_money+$r_money,experience=IFNULL(experience,0)+$experience,popularity=IFNULL(popularity,0)+$r_money  where m_id=" . $rlist[0]['m_id'];
                        $res3 = Db::table("pai_recharge")->execute($sql3);
                        if (!$res3) {
                            Log::write("update pai_member fall:" . time());
                        }
                    }
                }
                //更改订单的状态结束
            } else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                //如果有做过处理，不执行商户的业务程序
                //注意：
                //付款完成后，支付宝系统发送该交易状态通知
                //更改订单的状态开始
                $sql = "select * from pai.pai_recharge where r_id=" . $oid;
                $rlist = Db::table("pai_recharge")->query($sql);
                if (!empty($rlist[0]['r_id'])) {
                    if ($rlist[0]['r_state'] != '8') {
                        $r_id = $oid;
                        $r_state = '8';
                        $r_money =$rlist[0]['r_money'];
                        $r_in_money =$_POST['buyer_pay_amount'];
                        $r_out_trade_no="'".$_POST['out_trade_no']."'";
                        $r_success_time = time();
                        $sql2 = "update pai.pai_recharge set r_state=$r_state,r_in_money=$r_in_money,r_out_trade_no=$r_out_trade_no,r_success_time=$r_success_time where r_id=" . $r_id;
                        $res = Db::table("pai_recharge")->execute($sql2);
                        if (!$res) {
                            Log::write("update pai_recharge fall:" . time());
                        }
                        //如果充值余额，更改余额
                        if ($rlist[0]['r_for'] == '1') {
                            $experience=intval($r_money);
                            $sql3 = "update pai.pai_member set m_money=IFNULL(m_money,0)+$r_money,experience=IFNULL(experience,0)+$experience,popularity=IFNULL(popularity,0)+$r_money  where m_id=" . $rlist[0]['m_id'];
                            $res3 = Db::table("pai_recharge")->execute($sql3);
                            if (!$res3) {
                                Log::write("update pai_member fall:" . time());
                            }
                            //插入资金记录到资金表start
                            $ml_type =  "'" . "add" . "'";
                            $ml_reason = "'" . "余额充值" . "'";
                            $ml_table = "2";
                            $ml_money = $r_money;
                            $money_type = '1';
                            $nickname ="'"."用户"."'";
                            $position ="'" ."未知" . "'";
                            $member_type = '1';
                            $income_type = "0";
                            $withdraw_method = "0";
                            $card_number = "0";
                            $add_time = time();
                            $from_id = $r_id;
                            $ml_mid = $rlist[0]['m_id'];
                            $ml_state = "8";
                            $ml_updatetime = time();
                            $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$add_time,$from_id,$ml_mid,$ml_state,$ml_updatetime)";
                            $res_money_log = Db::table("pai_money_log")->execute($sql_moneylog);
                            if (!$res_money_log) {
                                \Log::DEBUG("edit recharge fall4mid:" . $rlist[0]['m_id']);
                            }
                            //插入资金记录到资金表end
                        }
                        //如果充值花生，更改花生
                        if ($rlist[0]['r_for'] == '2') {
                            $experience=intval($r_money);
                            $sql3 = "update pai.pai_member set peanut=IFNULL(peanut,0)+$r_money,experience=IFNULL(experience,0)+$experience  where m_id=" . $rlist[0]['m_id'];
                            $res3 = Db::table("pai_recharge")->execute($sql3);
                            if (!$res3) {
                                \Log::DEBUG("edit recharge fall3mid:" . $rlist[0]['m_id']);
                            }
                            //充值花生日志表start
                            $pl_num = $r_money;
                            $pl_time = time();
                            $from_id = $r_id;
                            $pl_type =  "'" . "add" . "'";
                            $pl_reason = "'" . "余额充值花生" . "'";
                            $pl_state = '8';
                            $pl_mid = $rlist[0]['m_id'];
                            $sql4 = "INSERT INTO pai.pai_peanut_log (pl_num,pl_time,from_id,pl_type,pl_state,pl_mid,pl_reason) values ($pl_num,$pl_time,$from_id,$pl_type,$pl_state,$pl_mid,$pl_reason)";
                            $res4 = Db::table("pai_recharge")->execute($sql4);
                            if (!$res4) {
                                \Log::DEBUG("edit recharge fall4mid:" . $rlist[0]['m_id']);
                            }
                            //充值花生日志表end
                        }
                        // 发送系统消息start
                        $sm_addtime = time();
                        $is_read = '1';
                        $sm_type = "1";
                        $sm_display = '0';
                        $sm_public = '1';
                        if ($rlist[0]['r_for'] == '1') {
                            $time = date("Y-m-d H:i", time());
                            $sm_title ="'" .  "恭喜您充值余额成功". "'";
                            $sm_brief = "'" . "您于" . $time . "成功充值￥" . $r_money . "元，具体详情可以到充值详情查看。". "'";
                            $sm_content = "'" . "您于" . $time . "成功充值￥" . $r_money . "元，具体详情可以到充值详情查看。". "'";
                        }
                        if ($rlist[0]['r_for'] == '2') {
                            $time = date("Y-m-d H:i", time());
                            $sm_title = "'" . "恭喜您充值花生成功". "'";
                            $sm_brief = "'" . "您于" . $time . "成功充值花生" . $r_money . "，具体详情可以到充值花生详情查看。". "'";
                            $sm_content = "'" . "您于" . $time . "成功充值花生" . $r_money . "，具体详情可以到充值花生详情查看。". "'";
                        }
                        $from_id = '0';
                        $to_mid = $rlist[0]['m_id'];
                        $sql_sysmsg = "INSERT INTO pai.pai_system_msg (sm_addtime,is_read,sm_type,sm_display,sm_public,sm_title,sm_brief,sm_content,from_id,to_mid) values ($sm_addtime,$is_read,$sm_type,$sm_display,$sm_public,$sm_title,$sm_brief,$sm_content,$from_id,$to_mid)";
                        $res_sysmsg = Db::table("pai_recharge")->execute($sql_sysmsg);
                        if (!$res_sysmsg) {
                            \Log::DEBUG("edit recharge sysmsg:" . $rlist[0]['m_id']);
                        }
                        //发送系统消息end
                    }
                }
                //用户经验更改
                $orderpaiS=new OrderPaiService();
                $orderpaiS->mem_levelup($rlist[0]['m_id']);
                //更改订单的状态结束

            }
            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
            echo "success";        //请不要修改或删除
        } else {
            //验证失败
            echo "fail";    //请不要修改或删除
        }
        die;
    }



}
