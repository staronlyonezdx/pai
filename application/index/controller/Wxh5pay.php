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

class Wxh5pay extends MemberHome
{
    //微信h5支付
    public function wx_h5_pay(){
        $r_id=input("r_id");
        if(empty($r_id)){
            $this->error("充值订单ID不能为空");
        }
        $recharge = new RechargeService();
        $where['r_id']=$r_id;
        $fields="r_id,r_money,r_state";
        $info=$recharge->get_info($where,$fields);
        if(empty($info)){
            $this->error("充值订单信息为空");
        }
        if($info['r_state']=='8'){
            $url="/member/wallet/recharge_success/r_id/".$r_id;
            redirect($url);
        }
        $o_id=$info['r_id']."-".rand(1,99999).time();
        $r_money=$info['r_money'];
        $money=intval($r_money*100);                     //充值金额 微信支付单位为分
        $userip =$this->get_client_ip();     //获得用户设备IP
        $appid  = "wxd45db706907b4bef";                  //应用APPID
        $mch_id = "1511240551";                  //微信支付商户号
        $key    = "PaiYaya20180803zsdzswyxgs2017o4l";                 //微信商户API密钥
        $out_trade_no =$o_id;//平台内部订单号
        $nonce_str =$this->createNoncestr();//随机字符串
        $body = "微信H5充值";//内容
        $total_fee = $money; //金额
        $spbill_create_ip = $userip; //IP
        $notify_url = "https://m.paiyy.com.cn/index/notify2/wx_jsapi_notify"; //回调地址
        $trade_type = 'MWEB';//交易类型 具体看API 里面有详细介绍
        $scene_info ='{"h5_info":{"type":"Wap","wap_url":'.PAI_URL.',"wap_name":"支付"}}';//场景信息 必要参数
        $signA ="appid=$appid&attach=$out_trade_no&body=$body&mch_id=$mch_id&nonce_str=$nonce_str&notify_url=$notify_url&out_trade_no=$out_trade_no&scene_info=$scene_info&spbill_create_ip=$spbill_create_ip&total_fee=$total_fee&trade_type=$trade_type";
        $strSignTmp = $signA."&key=$key"; //拼接字符串  注意顺序微信有个测试网址 顺序按照他的来 直接点下面的校正测试 包括下面XML  是否正确
        $sign = strtoupper(MD5($strSignTmp)); // MD5 后转换成大写
        $post_data = "<xml>
                    <appid>$appid</appid>
                    <mch_id>$mch_id</mch_id>
                    <body>$body</body>
                    <out_trade_no>$out_trade_no</out_trade_no>
                    <total_fee>$total_fee</total_fee>
                    <spbill_create_ip>$spbill_create_ip</spbill_create_ip>
                    <notify_url>$notify_url</notify_url>
                    <trade_type>$trade_type</trade_type>
                    <scene_info>$scene_info</scene_info>
                    <attach>$out_trade_no</attach>
                    <nonce_str>$nonce_str</nonce_str>
                    <sign>$sign</sign>
            </xml>";//拼接成XML 格式
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";//微信传参地址
        $dataxml =$this-> postXmlCurl($post_data,$url); //后台POST微信传参地址  同时取得微信返回的参数
        $objectxml = (array)simplexml_load_string($dataxml, 'SimpleXMLElement', LIBXML_NOCDATA); //将微信返回的XML 转换成数组
        $this->assign("objectxml",$objectxml);
        $this->assign("total_fee",$total_fee);
        return $this->fetch();
    }
    //创建随机数
    private function createNoncestr( $length = 32 ){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ )  {
            $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }
    //发送请求
    private function postXmlCurl($xml,$url,$second = 30){
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        //设置header
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //post提交方式
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        //运行curl
        $data = curl_exec($ch);
        //返回结果
        if($data){
            curl_close($ch);
            return $data;
        }else{
            $error = curl_errno($ch);
            curl_close($ch);
            echo "curl出错，错误码:$error"."<br>";
        }
    }

    /**
     * 获取真实IP
     * @param int $type
     * @param bool $client
     * @return mixed
     */
    function get_client_ip($type = 0,$client=true)
    {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if($client){
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos    =   array_search('unknown',$arr);
                if(false !== $pos) unset($arr[$pos]);
                $ip     =   trim($arr[0]);
            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip     =   $_SERVER['HTTP_CLIENT_IP'];
            }elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip     =   $_SERVER['REMOTE_ADDR'];
            }
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // 防止IP伪造
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }


}
