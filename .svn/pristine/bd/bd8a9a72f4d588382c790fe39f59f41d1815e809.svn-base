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

class Jhpay extends MemberHome
{
    //建行支付
    public function jpay(){
        $MERCHANTID="";
        $POSID="";
        $BRANCHID="";
        $ORDERID="";
        $PAYMENT="0.01";
        $CURCODE="01";
        $TXCODE="520100";
        $TYPE="1";
        $CLIENTIP=$this->get_client_ip();
        $REGINFO="";
        $PROINFO="";
        $MAC_STR="MERCHANTID=123456789&POSID=000000000&BRANCHID=110000000&ORDERID=19991101234&PAYMENT=0.01&CURCODE=01&TXCODE=520100&REMARK1=&REMARK2=&TYPE=1&PUB=30819d300d06092a864886f70d0108&GATEWAY=&CLIENTIP=172.0.0.1&REGINFO=%u5C0F%u98DE%u4FA0&PROINFO=%u5145%u503C%u5361&REFERER=";
        $MAC=md5($MAC_STR);
     $url="https://ibsbjstar.ccb.com.cn/CCBIS/ccbMain?MERCHANTID=$MERCHANTID&POSID=$POSID&BRANCHID=$BRANCHID&ORDERID=$ORDERID&PAYMENT=$PAYMENT&CURCODE=$CURCODE&TXCODE=$TXCODE&REMARK1=&REMARK2=&TYPE=$TYPE&GATEWAY=&CLIENTIP=$CLIENTIP&REGINFO=$REGINFO&PROINFO=$PROINFO&REFERER=&MAC=$MAC";
        redirect($url);

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
