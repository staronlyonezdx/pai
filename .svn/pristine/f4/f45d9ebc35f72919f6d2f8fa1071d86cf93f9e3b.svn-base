<?php
namespace app\index\controller;

class Wx
{
    //验证微信
    public function valid()
    {
        $echoStr = $_GET["echostr"];  //随机字符串
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    //验证微信
    private function checkSignature()
    {
        $signature = $_GET["signature"];    //微信加密签名
        $timestamp = $_GET["timestamp"];    //时间戳
        $nonce = $_GET["nonce"];            //随机数
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);      //进行字典序排序
        //sha1加密后与签名对比
        if( sha1(implode($tmpArr)) == $signature ){
            return true;
        }else{
            return false;
        }
    }


    //微信接受信息
    public function receiveEvent()
    {
        define("TOKEN", "paiyaya");
        if (isset($_GET['echostr'])) {
            $this->valid();
        }else{
            $this->responseMsg();
        }
    }

    //生成菜单项
    public function setbutton(){
        $button=array(
            "button"=>array(
                array('type'=>'view','name'=>'吖吖商城','url'=>"https://m.paiyy.com.cn"),
//				array('type'=>'view','name'=>'大会签到','url'=>'https://www.wmnetwork.cc/conference/signwall_show/index.htm?mid=26501'),
                //array('type'=>'view','name'=>'加盟政策','url'=>'http://mp.weixin.qq.com/s/JDk_ceajyBGdRlpk5F9yOQ'),
                //array('type'=>'view','name'=>'乐值商城','url'=>'https://www.lezhi365.com.cn/wap/'),
//                array('name'=>'乐值商城','sub_button'=>array(
//                    array('type'=>'view','name'=>'商城主页','url'=>'https://www.lezhi365.com.cn/mobile/store_center-one_enter.html'),
//                    array('type'=>'view','name'=>'乐值头条','url'=>'https://www.lezhi365.com.cn/wx/cms/cms.index.html'),
//                )),
                array('name'=>'会员中心','sub_button'=>array(
                    //array('type'=>'view','name'=>'乐值网简介','url'=>'http://mp.weixin.qq.com/s?__biz=MzI2NjMwMjQ1Mg==&mid=100000026&idx=1&sn=48e84b229b683f667b53b047c19347fe&scene=18#wechat_redirect'),
                    array('type'=>'view','name'=>'诺丁百利','url'=>"https://m.paiyy.com.cn"),
                    array('type'=>'view','name'=>'会员中心','url'=>"https://m.paiyy.com.cn/member/myhome/index"),
//					array('type'=>'view','name'=>'商家后台','url'=>'http://www.lezhi365.com.cn/mobile/store_center-first_enter.html'),
//                    array('type'=>'click','name'=>'获取二维码','key'=>'V1001'),
                )),
                array('name'=>'APP下载','sub_button'=>array(
                    //array('type'=>'view','name'=>'乐值网简介','url'=>'http://mp.weixin.qq.com/s?__biz=MzI2NjMwMjQ1Mg==&mid=100000026&idx=1&sn=48e84b229b683f667b53b047c19347fe&scene=18#wechat_redirect'),
                    array('type'=>'view','name'=>'IOS下载','url'=>'https://m.paiyy.com.cn/member/register/ios_guide'),
                    array('type'=>'view','name'=>'安卓下载','url'=>'https://m.paiyy.com.cn/member/register/az_guide'),
//					array('type'=>'view','name'=>'商家后台','url'=>'http://www.lezhi365.com.cn/mobile/store_center-first_enter.html'),
//                    array('type'=>'click','name'=>'获取二维码','key'=>'V1001'),
                ))
            )
        );
        $button=json_encode($button,JSON_UNESCAPED_UNICODE);
        $token=$this->get_access_token();
        $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$token}";
        $msg=$this->postMethod($url,$button);
        var_dump(json_encode($msg));
    }

    //对关注的动作进行处理
    public function responseMsg()
    {
//        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
//        if (!empty($postStr)){
//            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
//            switch ($postObj->Event)
//            {
//                case "subscribe":
//                    if (isset($postObj->EventKey)){
//                        $openid="$postObj->FromUserName";
//                        $ismember=D('Members')->checkOpenID($openid);
//                        if(!$ismember)
//                        {
//
//                            $minfo=$this->get_wx_memberinfo($openid);
//                            $mdata['m_name']=$minfo['m_name'];
//                            $mdata['avatar']=$minfo['avatar'];
//                            $mdata['open_id']=$openid;
//                            $mdata['m_recommended']="$postObj->EventKey";
//                            $result=D('Members')->doRegister($mdata);
//                        }
//
//                        $data['s_date']=date('Y:m:d H:i:s');
//                        $data['s_openid']="$postObj->FromUserName";
//                        $data['s_tj_mid']="$postObj->EventKey";
//                        $data['s_operation_type']=0;
//                        $subscribe = M('subscribe',C('DB_PREFIX'),'DB_CUSTOM');
//                        $result=$subscribe->add($data);
//                    }
//                    echo "";
//                    break;
//                case "unsubscribe":
//                    if (isset($postObj->EventKey)){
//                        $data['s_date']=date('Y:m:d H:i:s');
//                        $data['s_openid']="$postObj->FromUserName";
//                        $data['s_operation_type']=1;
//                        $subscribe = M('subscribe',C('DB_PREFIX'),'DB_CUSTOM');
//                        $where['s_openid']=$data['s_openid'];
//                        $s_tj_mid = $subscribe->where($where)->getField('s_tj_mid');
//                        $data['s_tj_mid']=$s_tj_mid;
//                        $result=$subscribe->add($data);
//                    }
//                    echo "";
//                    break;
//                case "SCAN":
//
//                    //要实现统计分析，则需要扫描事件写入数据库，这里可以记录 EventKey及用户OpenID，扫描时间
//                    echo "";
//                    break;
//                default:
//                    file_put_contents('testwx1.txt', "3");
//                    echo "";
//                    break;
//            }
//
//        }else{
//            echo "";
//            exit;
//        }
    }




    //得到用户资料
    public function get_wx_memberinfo($openid)
    {
        $access_token=$this->get_access_token();
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
        $output =$this->https_request($url);
        $jsoninfo = json_decode($output, true);
        $minfo['avatar'] = $jsoninfo["headimgurl"];
        $minfo['m_name'] = $jsoninfo["nickname"];
        // header('Location:https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$ticket);
        return $minfo;
    }

    //得到access_token
    public function get_access_token()
    {
        if(empty($_COOKIE['access_token'])){
            $appid ="wxd45db706907b4bef";
            $appsecret ="77e571fe4563a938eb06f47b38d359d5";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
            $output =$this->https_request($url);
            $jsoninfo = json_decode($output, true);
            $access_token = $jsoninfo["access_token"];
            $_COOKIE['access_token']=$access_token;
            setcookie('access_token',$access_token);
            return $access_token;
        }
        else
        {
            return $_COOKIE['access_token'];
        }
    }
    //调用第三方接口方法
    function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    function postMethod($url,$data){
        $ch=curl_init();
        /*curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $result=curl_exec($ch);
        curl_close($ch);
        return $result;*/
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $tmpInfo;

    }


}
