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
use app\data\service\orderPai\OrderPaiService;

require_once "../vendor/wxpayapp/lib/WxPay.Api.php";
require_once '../vendor/wxpayapp/lib/WxPay.Notify.php';
require_once "../vendor/wxpayapp/WxPay.Config.php";
require_once '../vendor/wxpayapp/log.php';
//初始化日志
$logHandler= new \CLogFileHandler("../vendor/wxpayapp/logs/".date('Y-m-d').'.log');
$log = \Log::Init($logHandler, 15);

class Notifyapp extends \WxPayNotify
{
    //微信JSAPI回调路径
    public function wx_jsapi_notify()
    {
        $config = new \WxPayConfig();
        \Log::DEBUG("begin notify");
        $notify = new Notifyapp();
        $notify->Handle($config, false);
    }
    //查询订单
    public function Queryorder($transaction_id)
    {
        $input = new \WxPayOrderQuery();
        $input->SetTransaction_id($transaction_id);

        $config = new \WxPayConfig();
        $result = \WxPayApi::orderQuery($config, $input);
        \Log::DEBUG("query:" . json_encode($result));
        if(array_key_exists("return_code", $result)
            && array_key_exists("result_code", $result)
            && $result["return_code"] == "SUCCESS"
            && $result["result_code"] == "SUCCESS")
        {
            return true;
        }
        return false;
    }

    /**
     *
     * 回包前的回调方法
     * 业务可以继承该方法，打印日志方便定位
     * @param string $xmlData 返回的xml参数
     *
     **/
    public function LogAfterProcess($xmlData)
    {
        \Log::DEBUG("call back， return xml:" . $xmlData);
        return;
    }

    //重写回调处理函数
    /**
     * @param WxPayNotifyResults $data 回调解释出的参数
     * @param WxPayConfigInterface $config
     * @param string $msg 如果回调处理失败，可以将错误信息输出到该方法
     * @return true回调出来完成不需要继续回调，false回调处理未完成需要继续回调
     */
    public function NotifyProcess($objData, $config, &$msg)
    {
        $data = $objData->GetValues();
        //TODO 1、进行参数校验
        if (!array_key_exists("return_code", $data)
            || (array_key_exists("return_code", $data) && $data['return_code'] != "SUCCESS")
        ) {
            //TODO失败,不是支付成功的通知
            //如果有需要可以做失败时候的一些清理处理，并且做一些监控
            $msg = "异常异常";
            return false;
        }
        if (!array_key_exists("transaction_id", $data)) {
            $msg = "输入参数不正确";
            return false;
        }

        //TODO 2、进行签名验证
        try {
            $checkResult = $objData->CheckSign($config);
            if ($checkResult == false) {
                //签名错误
                \Log::ERROR("签名错误...");
                return false;
            }
        } catch (Exception $e) {
            Log::ERROR(json_encode($e));
        }

        //TODO 3、处理业务逻辑
        \Log::DEBUG("call back:" . json_encode($data));
        $notfiyOutput = array();


        //查询订单，判断订单真实性
        if (!$this->Queryorder($data["transaction_id"])) {
            $msg = "订单查询失败";
            return false;
        }

        //更改订单的状态开始
        $oid_arr=explode("-", $data['out_trade_no']);
        $oid=$oid_arr[0];
        $sql = "select * from pai.pai_recharge where r_id=" . $oid;
        $rlist = Db::table("pai_recharge")->query($sql);
        if (!empty($rlist[0]['r_id'])) {
            if ($rlist[0]['r_state'] != '8') {
                $r_id = $oid;
                $r_state = '8';
                $r_money = $rlist[0]['r_money'];
                $r_in_money = $data['cash_fee'] / 100;
                $r_out_trade_no="'".$data['out_trade_no']."'";
                $r_success_time = time();
                $sql2 = "update pai.pai_recharge set r_state=$r_state,r_in_money=$r_in_money,r_out_trade_no=$r_out_trade_no,r_success_time=$r_success_time where r_id=".$r_id;
                $res = Db::table("pai_recharge")->execute($sql2);
                if (!$res) {
                    \Log::DEBUG("edit recharge fall2:" . $r_id);
                }
                //如果充值余额，更改余额start
                if ($rlist[0]['r_for'] == '1') {
                    $experience=intval($r_money);
                    $sql3 = "update pai.pai_member set m_money=IFNULL(m_money,0)+$r_money,experience=IFNULL(experience,0)+$experience,popularity=IFNULL(popularity,0)+$r_money  where m_id=" . $rlist[0]['m_id'];
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
                    $sql3 = "update pai.pai_member set peanut=IFNULL(peanut,0)+$r_money,experience=IFNULL(experience,0)+$experience  where m_id=" . $rlist[0]['m_id'];
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
        //用户经验更改
        $orderpaiS=new OrderPaiService();

        $orderpaiS->mem_levelup($rlist[0]['m_id']);
        //更改订单的状态结束
        return true;
    }



}
