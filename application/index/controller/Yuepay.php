<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Config;
use think\Cache;
use think\Session;
use app\member\controller\MemberHome;
use app\data\service\recharge\RechargeService;
use think\log;
use think\Db;

class Yuepay extends MemberHome
{
    //余额支付
    public function ypay()
    {
        $m_id = $this->m_id;
        $r_id = input("r_id");
        if (empty($r_id)) {
            $this->error( "充值ID为空");
        }
        $sql = "select * from pai.pai_recharge where r_id=$r_id";
        $rlist = Db::table("pai_recharge")->query($sql);
        if (empty($rlist[0]['r_id'])) {
           $this->error("充值信息为空");
        }
        //查询用户账号余额是否足够开始
        $sql_m = "select m_money from pai.pai_member where m_id=".$rlist[0]['m_id'];
        $list_m = Db::table("pai_recharge")->query($sql_m);
        if (empty($list_m[0]['m_money'])) {
           $this->error("账号余额不存在");
        }
        if($list_m[0]['m_money']<$rlist[0]['r_money']){
            $this->error("账号余额小于充值金额");
        }
        //查询用户账号余额是否足够结束
        $r_money = $rlist[0]['r_money'];
        $r_state = '8';
        $r_success_time = time();
        $sql2 = "update pai.pai_member set m_money=m_money-$r_money, peanut=peanut+$r_money where m_id=" . $rlist[0]['m_id'];
        $res2 = Db::table("pai_recharge")->execute($sql2);
        if ($res2) {
            $sql3 = "update pai.pai_recharge set r_state=$r_state,r_money=$r_money,r_success_time=$r_success_time where r_id=" . $r_id;
            $res3 = Db::table("pai_recharge")->execute($sql3);
            if (!$res3) {
                $this->error("更改充值状态失败");
            }
        } else {
            $this->error( "用户加花生失败");
        }
        //插入资金记录到资金表start
        $ml_type = "'" . "reduce" . "'";
        $ml_reason = "'" . "余额充值花生" . "'";
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
        $ml_mid = $m_id;
        $ml_state = "8";
        $ml_updatetime = time();
        $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$add_time,$from_id,$ml_mid,$ml_state,$ml_updatetime)";
        $res_money_log = Db::table("pai_money_log")->execute($sql_moneylog);
        //插入资金记录到资金表end

        //充值花生日志表start
        $pl_num = $r_money;
        $pl_time = time();
        $from_id = $r_id;
        $pl_type = "'" . "add" . "'";
        $pl_reason = "'" . "余额充值花生" . "'";
        $pl_state = '8';
        $pl_mid = $m_id;
        $sql4 = "INSERT INTO pai.pai_peanut_log (pl_num,pl_time,from_id,pl_type,pl_state,pl_mid,pl_reason) values ($pl_num,$pl_time,$from_id,$pl_type,$pl_state,$pl_mid,$pl_reason)";
        $res4 = Db::table("pai_recharge")->execute($sql4);
        //充值花生日志表end
        $url = "/member/wallet/recharge_success/r_id/" . $r_id;
        redirect($url);
    }
    //检查支付密码是否正确
    public function checkpaypwd(){
        $m_id=$this->m_id;
        $pwd=input("post.paypwd");
        $table = "goods";
        $paypwd="'".md5($pwd)."'";
        $sql = "SELECT m_id FROM pai_member WHERE m_id=$m_id AND m_payment_pwd=$paypwd";
        $res = Db::table($table)->query($sql);
        if(!empty($res[0]['m_id'])){
            $return = array("status" => '1', "msg" => "密码正确");
            echo json_encode($return);
        }
        else{
            $return = array("status" => '0', "msg" => "密码不正确");
            echo json_encode($return);
        }
    }
    //检查支付密码是否设置
    public function is_has_paypwd(){
        $m_id=$this->m_id;
        $table = "goods";
        $sql = "SELECT m_payment_pwd FROM pai_member WHERE m_id=$m_id";
        $res = Db::table($table)->query($sql);
        if(!empty($res[0]['m_payment_pwd'])){
            $return = array("status" => '1', "msg" => "密码有");
            echo json_encode($return);
        }
        else{
            $return = array("status" => '0', "msg" => "密码无");
            echo json_encode($return);
        }
    }
    //检查支付密码是否设置
    public function get_m_money(){
        $m_id=$this->m_id;
        $table = "goods";
        $sql = "SELECT m_money FROM pai_member WHERE m_id=$m_id";
        $res = Db::table($table)->query($sql);
        if(!empty($res[0]['m_money'])){
            $return = array("status" => '1', "msg" => "余额读取正确","m_money"=>$res[0]['m_money']);
            echo json_encode($return);
        }
        else{
            $return = array("status" => '0', "msg" => "没有信息");
            echo json_encode($return);
        }
    }



}
