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

class Aliwappay extends MemberHome
{
    //阿里wap支付
    public function ali_wap_pay(){
        require_once "../vendor/alipay/service/AlipayTradeService.php";
        require_once "../vendor/alipay/buildermodel/AlipayTradeWapPayContentBuilder.php";
        require "../vendor/alipay/config.php";
        $r_id=input("r_id");
        if(empty($r_id)){
            $this->error("充值订单ID不能为空");
        }
        $recharge = new RechargeService();
        $where['r_id']=$r_id;
        $fields="r_id,r_money";
        $info=$recharge->get_info($where,$fields);
        if(empty($info)){
            $this->error("充值订单信息为空");
        }
        $o_id=$info['r_id'];
        $r_money=$info['r_money'];
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no =$o_id."-".rand(1,99999).time();
        //订单名称，必填
        $subject ="支付宝H5余额充值";
        //付款金额，必填
        $total_amount = $r_money;
        //商品描述，可空
        $body ="alipay wap会员余额充值";
        //超时时间
        $timeout_express = "1m";
        $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setTimeExpress($timeout_express);
        $payResponse = new \AlipayTradeService($config);
        $result = $payResponse->wapPay($payRequestBuilder, $config['return_url'], $config['notify_url']);
        return;
    }


}
