<?php
namespace app\api\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\BaseService as BaseService;
use app\data\service\address\AddressService as AddressService;
use app\data\service\api\ApigoodsService as ApigoodsService;
use app\data\service\api\ApiorderService as ApiorderService;
use app\data\service\goodsDiscounttype\GoodsDiscounttypeService as GoodsDiscounttypeService;
use app\data\service\orderPai\OrderPaiService;
use app\data\service\recharge\RechargeService;
use \DOMDocumemt;

class Pay extends ApiMember
{
    /*
     配置参数
     */
    var $config = array(
        'appid' => "wx6bbd7113014b8551",    /*微信开放平台上的应用id*/
        'mch_id' => "1512273331",   /*微信申请成功之后邮件中的商户id*/
        'api_key' => "PaiYaya20180803zsdzswyxgs2017o4l",    /*在微信商户平台上自己设定的api密钥 32位*/
        'notify_url' => "https://m.paiyy.com.cn/index/notifyapp/wx_jsapi_notify" /*自定义的回调程序地址id*/
    );
//获取预支付订单
    public function getPrePayOrder(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        if(empty($this->data['r_id']))
        {
            $this->response_error("需要充值订单ID");
        }
        $r_id=$this->data['r_id'];
        $recharge = new RechargeService();
        $where['r_id']=$r_id;
        $fields="r_id,r_money,r_state";
        $info=$recharge->get_info($where,$fields);
        if(empty($info)){
            $this->response_error("充值订单信息为空");
        }
        if($info['r_state']=='8'){
           $this->response_error("该订单已经完成");
        }
        $o_id=$info['r_id']."-".rand(1,99999).time();
        $r_money=$info['r_money'];
        $money=intval($r_money*100);                     //充值金额 微信支付单位为分
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $notify_url = $this->config["notify_url"];
        $body ="APP支付";
        $out_trade_no =$o_id;
        $total_fee =$money;
        $onoce_str = $this->getRandChar(32);
        $data["appid"] = $this->config["appid"];
        $data["body"] = "APP充值";
        $data["mch_id"] = $this->config['mch_id'];
        $data["nonce_str"] = $onoce_str;
        $data["notify_url"] = $notify_url;
        $data["out_trade_no"] = $out_trade_no;
        $data["spbill_create_ip"] = $this->get_client_ip();
        $data["total_fee"] = $total_fee;
        $data["trade_type"] = "APP";
        $s = $this->getSign($data, false);
        $data["sign"] = $s;
        $xml = $this->arrayToXml($data);
        $response = $this->postXmlCurl($xml, $url);

        //将微信返回的结果xml转成数组
        $res = $this->xmlstr_to_array($response);
        $sign2 = $this->getOrder($res['prepay_id']);
//        if(!empty($sign2)) echo json_encode(array('status'=>1,'data'=>$sign2));
//        else echo json_encode(array('status'=>0,'data'=>"请确保参数合法性！"));
        if(!empty($sign2)){
           $this->response_data($sign2);
        }
        else{
           $this->response_error("请确保参数合法性");
        }
    }

// 待付款订单再次生成预生成订单  调起，覆盖之前的调起
    public function orderquery($osn,$feedeal,$type=""){ //$osn是第一次生成的也是数据库待付款的订单号  $feedeal也是之前的金额
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $notify_url = $this->config["notify_url"];
        $body ="钱包充值";
        $attach = "钱包充值";
        $out_trade_no = $osn;
        $total_fee =$feedeal;
        $onoce_str = $this->getRandChar(32);
        //判断是微信钱包充值调起，还是购物调起
        if($type!='' && $type==1){
            $notify_url = PAI_URL."/index/notifyapp/wx_jsapi_notify";
            $body = "订单支付";
            $attach = "订单支付";
        }
        $data["appid"] = $this->config["appid"];
        $data["attach"]=$attach;
        $data["body"] = $body;
        $data["mch_id"] = $this->config['mch_id'];
        $data["nonce_str"] = $onoce_str;
        $data["notify_url"] = $notify_url;
        $data["out_trade_no"] = $out_trade_no;
        $data["spbill_create_ip"] = $this->get_client_ip();
        $data["total_fee"] = $total_fee*100;
        $data["trade_type"] = "APP";
        $s = $this->getSign($data, false);
        $data["sign"] = $s;

        $xml = $this->arrayToXml($data); //echo json_encode(array('status'=>0,'data'=>$xml,'one'=>$data));exit;
        $response = $this->postXmlCurl($xml, $url);


        //将微信返回的结果xml转成数组
        $res = $this->xmlstr_to_array($response);
        $sign2 = $this->getOrder($res['prepay_id']);
        if(!empty($sign2)) return json_encode(array('status'=>1,'data'=>$sign2));
        else return json_encode(array('status'=>0,'data'=>"请确保参数合法性！"));
    }

    /*
            生成签名
        */
    function getSign($Obj)
    {
        foreach ($Obj as $k => $v)
        {
            $Parameters[strtolower($k)] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);
        //echo "【string】 =".$String."</br>";
        //签名步骤二：在string后加入KEY
        $String = $String."&key=".$this->config['api_key'];
        //echo "<textarea style='width: 50%; height: 150px;'>$String</textarea> <br />";
        //签名步骤三：MD5加密
        $result_ = strtoupper(md5($String));
        return $result_;
    }

    //执行第二次签名，才能返回给客户端使用
    public function getOrder($prepayId){
        $data["appid"] = $this->config["appid"];
        $data["noncestr"] = $this->getRandChar(32);;
        $data["package"] = "Sign=WXPay";
        $data["partnerid"] = $this->config['mch_id'];
        $data["prepayid"] = $prepayId;
        $data["timestamp"] = time();
        $s = $this->getSign($data, false);
        $data["sign"] = $s;


        return $data;
    }
    //获取指定长度的随机字符串
    function getRandChar($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;


        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }


        return $str;
    }
    /*
        获取当前服务器的IP
    */
    function get_client_ip()
    {
        if ($_SERVER['REMOTE_ADDR']) {
            $cip = $_SERVER['REMOTE_ADDR'];
        } elseif (getenv("REMOTE_ADDR")) {
            $cip = getenv("REMOTE_ADDR");
        } elseif (getenv("HTTP_CLIENT_IP")) {
            $cip = getenv("HTTP_CLIENT_IP");
        } else {
            $cip = "unknown";
        }
        return $cip;
    }
    /**
    xml转成数组
     */
    function xmlstr_to_array($xmlstr) {
        $doc = new \DOMDocument();
        $doc->loadXML($xmlstr);
        return $this->domnode_to_array($doc->documentElement);
    }
    //数组转xml
    function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val))
            {
                $xml.="<".$key.">".$val."</".$key.">";


            }
            else
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
        }
        $xml.="</xml>";
        return $xml;
    }
    //将数组转成uri字符串
    function formatBizQueryParaMap($paraMap, $urlencode)
    {
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v)
        {
            if($urlencode)
            {
                $v = urlencode($v);
            }
            $buff .= strtolower($k) . "=" . $v . "&";
        }
        $reqPar;
        if (strlen($buff) > 0)
        {
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        return $reqPar;
    }
    //post https请求，CURLOPT_POSTFIELDS xml格式
    function postXmlCurl($xml,$url,$second=30)
    {
        //初始化curl
        $ch = curl_init();
        //超时时间
        curl_setopt($ch,CURLOPT_TIMEOUT,$second);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
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
        if($data)
        {
            curl_close($ch);
            return $data;
        }
        else
        {
            $error = curl_errno($ch);
            echo "curl出错，错误码:$error"."<br>";
            echo "<a href='https://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
            curl_close($ch);
            return false;
        }
    }
    function domnode_to_array($node) {
        $output = array();
        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
            case XML_TEXT_NODE:
                $output = trim($node->textContent);
                break;
            case XML_ELEMENT_NODE:
                for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
                    $child = $node->childNodes->item($i);
                    $v = $this->domnode_to_array($child);
                    if(isset($child->tagName)) {
                        $t = $child->tagName;
                        if(!isset($output[$t])) {
                            $output[$t] = array();
                        }
                        $output[$t][] = $v;
                    }
                    elseif($v) {
                        $output = (string) $v;
                    }
                }
                if(is_array($output)) {
                    if($node->attributes->length) {
                        $a = array();
                        foreach($node->attributes as $attrName => $attrNode) {
                            $a[$attrName] = (string) $attrNode->value;
                        }
                        $output['@attributes'] = $a;
                    }
                    foreach ($output as $t => $v) {
                        if(is_array($v) && count($v)==1 && $t!='@attributes') {
                            $output[$t] = $v[0];
                        }
                    }
                }
                break;
        }
        return $output;
    }
}
