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


class Notifyjh extends IndexHome
{
    //建行支付回调路径
    public function jhpaynotify()
    {
        //验证开始
        $send_data="POSID=100001329&BRANCHID=500000000&ORDERID=GWA10081217305965959&PAYMENT=0.01&CURCODE=01&REMARK1=&REMARK2=&SUCCESS=Y&TYPE=1&REFERER=http://114.255.7.208/page/bankpay.do&CLIENTIP=114.255.7194&SIGN=9a7efc7f15f4b0e7f8fba52649d6b97ae33fad44598a7ca1c26196e8ddba00ecf91a596346e4bfd3cc6d2bdba6c085a3cdb0f231d865d7856e37de89846a371c8bc09f8f2643284260499e1d3f464d9ca9d379fe8af3202a09fc83d39f5c68501a4627d62a3ae891d4b0ff6aa21d61f6ba0e9c8bc5840b292af853d2736ce04a";
        $returndata=$this->get_data_from_server("127.0.0.1",55533,$send_data);
        //验证结束
        //如果验证通过开始
        if($returndata['status']=="success"){
            //更改订单的状态开始
            $data=array();
            $data=$_POST;
            $oid_arr=explode("-", $data['ORDERID']);
            $oid=$oid_arr[0];
            $sql = "select * from pai.pai_recharge where r_id=" . $oid;
            $rlist = Db::table("pai_recharge")->query($sql);
            if (!empty($rlist[0]['r_id'])) {
                if ($rlist[0]['r_state'] != '8') {
                    $r_id = $oid;
                    $r_state = '8';
                    $r_money = $data['cash_fee'] / 100;
                    $r_success_time = time();
                    $sql2 = "update pai.pai_recharge set r_state=$r_state,r_money=$r_money,r_success_time=$r_success_time where r_id=".$r_id;
                    $res = Db::table("pai_recharge")->execute($sql2);
                    if (!$res) {
                        \Log::DEBUG("edit recharge fall2:" . $r_id);
                    }
                    //如果充值余额，更改余额start
                    if ($rlist[0]['r_for'] == '1') {
                        $experience=intval($r_money);
                        $sql3 = "update pai.pai_member set m_money=m_money+$r_money where m_id=" . $rlist[0]['m_id'];
                        $res3 = Db::table("pai_recharge")->execute($sql3);
                        if (!$res3) {
                            \Log::DEBUG("edit recharge fall3mid:" . $rlist[0]['m_id']);
                        }
                        //插入资金记录到资金表start
                        $ml_type = "'" . "add" . "'";
                        $ml_reason = "'" . "余额充值" . "'";
                        $ml_table = '2';
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
                        // \Log::DEBUG("money_sql:" . $sql_moneylog);
                        $res_money_log = Db::table("pai_money_log")->execute($sql_moneylog);
                        if (!$res_money_log) {
                            \Log::DEBUG("edit recharge fall4mid:" . $rlist[0]['m_id']);
                        }
                        //插入资金记录到资金表end
                    }
                    //如果充值余额，更改余额end
                    //如果充值花生，更改花生start
                    if ($rlist[0]['r_for'] == '2') {
                        $experience=intval($r_money);
                        $sql3 = "update pai.pai_member set peanut=peanut+$r_money where m_id=" . $rlist[0]['m_id'];
                        $res3 = Db::table("pai_recharge")->execute($sql3);
                        if (!$res3) {
                            \Log::DEBUG("edit recharge fall3mid:" . $rlist[0]['m_id']);
                        }
                        //充值花生日志表start
                        $pl_num = $r_money;
                        $pl_time = time();
                        $from_id = $r_id;
                        $pl_type = "'" . "add" . "'";
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
                    //如果充值花生，更改花生end

                    // 发送系统消息start
                    $sm_addtime = time();
                    $is_read = '1';
                    $sm_type = "1";
                    $sm_display = '0';
                    $sm_public = '1';
                    if ($rlist[0]['r_for'] == '1') {
                        $time = date("Y-m-d H:i", time());
                        $sm_title = "'" . "恭喜您充值余额成功" . "'";
                        $sm_brief = "'" . "您于" . $time . "成功充值￥" . $r_money . "元，具体详情可以到充值详情查看。" . "'";
                        $sm_content ="'" . "您于" . $time . "成功充值￥" . $r_money . "元，具体详情可以到充值详情查看。" . "'";
                    }
                    if ($rlist[0]['r_for'] == '2') {
                        $time = date("Y-m-d H:i", time());
                        $sm_title = "'" . "恭喜您充值花生成功" . "'";
                        $sm_brief = "'" . "您于" . $time . "成功充值花生" . $r_money . "，具体详情可以到充值花生详情查看。" . "'";
                        $sm_content = "'" . "您于" . $time . "成功充值花生" . $r_money . "，具体详情可以到充值花生详情查看。" . "'";
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
            //更改订单的状态结束
        }
        //如果验证通过结束

    }
    public function get_data_from_server($address, $service_port, $send_data) {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket < 0) {
            echo "socket创建失败原因: " . socket_strerror($socket) . "\n";
        } else {
            echo "socket_create OK，HE HE.\n";
        }
        $result = socket_connect($socket, $address, $service_port);
        if ($result < 0) {
            echo "SOCKET连接失败原因: ($result) " . socket_strerror($result) . "\n";
        } else {
            echo "OK.\n";
        }
        //发送命令
        $in = $send_data;
        $out = '';
        echo "Send ..........";
        socket_write($socket, $in, strlen($in));
        echo "OK.\n";
        echo "Reading Backinformatin:\n\n";
        while ($out = socket_read($socket, 2048)) {
            echo $out;
        }
        echo "Close socket........";
        socket_close($socket);
        echo "OK,He He.\n\n";
        return $out;
    }




}
