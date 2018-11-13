<?php
/**
* 微信Service
*-------------------------------------------------------------------------------------------
* 版权所有 mengge
*--------------------------------------------------------------------------------------------
*/
namespace app\data\service\wx;
use app\data\service\member\MemberService;
use RedisCache\RedisCache;
use think\Config;
use think\Session;
use app\data\service\BaseService as BaseService;
use think\cookie;
use think\Db;

class WxService extends BaseService
{
    // 应用SDK AppID
    protected $appid;
    // 应用SDK $secret
    protected $secret;
    public function __construct()
    {
        $this->appid = "wxd45db706907b4bef";
        $this->secret = "77e571fe4563a938eb06f47b38d359d5";
    }
    //得到access_token
    public function get_access_token()
    {
        if(empty($_COOKIE['access_token'])){
            $appid =$this->appid;
            $appsecret =$this->secret;
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
    //去微信授权登录
    public function toWxAuth($redirect_uri)
    {
        $appid=$this->appid;
        $href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
        return $href;
    }
    //得到微信用户资料信息
    public function get_wx_userinfo($code)
    {
        $appid=$this->appid;
        $secret=$this->secret;
        $url1 = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$secret."&code=".$code."&grant_type=authorization_code";
        $result1 =$this->https_request($url1);
        $info1 = json_decode($result1,true);
        $url2 = "https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=".$appid."&grant_type=refresh_token&refresh_token=".$info1['refresh_token'];
        $result2 =$this->https_request($url2);
        $info2 = json_decode($result2,true);
        $url3 = "https://api.weixin.qq.com/sns/userinfo?access_token=".$info2['access_token']."&openid=".$info2['openid']."&lang=zh_CN";
        $result3 =$this->https_request($url3);
        $info3 = json_decode($result3,true);
        return $info3;
    }
    //得到用户unionid
    public function get_wx_unionid($code)
    {
        $appid=$this->appid;
        $secret=$this->secret;
        $url1 = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$secret."&code=".$code."&grant_type=authorization_code";
        $result1 =$this->https_request($url1);
        $info1 = json_decode($result1,true);
        $url2 = "https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=".$appid."&grant_type=refresh_token&refresh_token=".$info1['refresh_token'];
        $result2 =$this->https_request($url2);
        $info2 = json_decode($result2,true);
        $url3 = "https://api.weixin.qq.com/sns/userinfo?access_token=" .$info2['access_token']. "&openid=" .$info2['openid'];
        $result3 =$this->https_request($url3);
        $info3 = json_decode($result3,true);
        return $info3;
    }
    //检查是否绑定手机号码
    public function isBindMobile($openid)
    {
        $return=array("state"=>'1',"msg"=>"OK");
        $openid="'".$openid."'";
        $table="member";
        $sql="select m_id,m_state,m_mobile from pai_member where wx_openid=$openid ";
        $list=Db::table($table)->query($sql);
        if(!empty($list[0]['m_mobile'])){
            $return=array("state"=>'1',"msg"=>"ok","data"=>$list[0]['m_mobile']);
        }
        else
        {
            $return=array("state"=>'0',"msg"=>"failure");
        }
        return $return;
    }
    //检查用户openid
    public function checkOpenId($openid)
    {
        $condition['openid']=$openid;
        return $this->table('member')->where($condition)->find();
    }
    //检查用户手机
    public function checkWxMobile($mobile,$openid)
    {
        $table="member";
        $mobile ="'".$this->encrypt($mobile)."'";            //加密手机号码
        $openid="'".$openid."'";
        $sql="select m_id,m_state,m_mobile,wx_openid from pai_member where m_mobile=$mobile ";
        $list=Db::table($table)->query($sql);
        if(!empty($list[0]['wx_openid'])){
            $return=array("state"=>'0',"msg"=>"手机号码已经绑定");
            return $return;
        }
        //1、如果openid与mobile都存在且匹配
        $sql1="select m_id,m_state,m_mobile,wx_openid,wx_unionid from pai_member where wx_openid=$openid and m_mobile=$mobile ";
        $list1=Db::table($table)->query($sql1);
        if(!empty($list1[0]['m_id'])){
            $return=array("state"=>'1',"msg"=>"openid和mobile都存在且匹配");
            return $return;
        }
        //2、如果openid不存在
        $sql2="select m_id from pai_member where wx_openid=$openid";
        $list2=Db::table($table)->query($sql2);
        if(empty($list2[0]['m_id'])){
            //2、openid不存在 1如果mobile也不存在
            $sql3="select m_id from pai_member where m_mobile=$mobile";
            $list3=Db::table($table)->query($sql3);
            if(empty($list3[0]['m_id'])) {
                $return = array("state" => '5', "msg" => "openid和mobile都不存在");
                return $return;
            }
            //2、openid不存在  2如果mobile存在
            if(!empty($list3[0]['m_id'])) {
                $return = array("state" => '4', "msg" => "openid不存在，mobile存在");
                return $return;
            }
        }
        //3、如果openid存在
        if(!empty($list2[0]['m_id'])){
            //2、openid存在 1如果mobile不存在
            $sql4="select m_id from pai_member where m_mobile=$mobile";
            $list4=Db::table($table)->query($sql4);
            if(empty($list4[0]['m_id'])) {
                $return = array("state" => '3', "msg" => "openid存在和mobile不存在");
                return $return;
            }
            //2、openid存在  2如果mobile存在
            if(!empty($list4[0]['m_id'])) {
                //1、如果openid与mobile都存在且匹配
                $sql5="select m_id,m_state,m_mobile,wx_openid from pai_member where wx_openid=$openid and m_mobile=$mobile ";
                $list5=Db::table($table)->query($sql5);
                if(!empty($list5[0]['m_id'])){
                    $return=array("state"=>'1',"msg"=>"openid和mobile都存在且匹配");
                    return $return;
                }
                if(empty($list5[0]['m_id'])){
                    $return=array("state"=>'2',"msg"=>"openid存在mobile存在");
                    return $return;
                }
            }
        }

    }
    //检查用户绑定手机是否存在
    public function checkMobile($mobile)
    {
        $isphone =$this->is_phone($mobile); //验证手机号格式
        if($isphone['state']=='0'){
            return ['state'=>0,'msg'=>'请输入正确的账号'];
        }
        $table="member";
        $m_mobile ="'".  $this->encrypt($mobile)."'";            //加密手机号码
        $sql="select m_id,m_state,m_mobile,wx_openid from pai_member where m_mobile=$m_mobile ";
        $list=Db::table($table)->query($sql);
        if(!empty($list[0]['wx_openid'])){
            $return=array("state"=>'0',"msg"=>"手机号码已经绑定");
        }
        else
        {
            $return=array("state"=>'1',"msg"=>"ok");
        }
        return $return;
    }
    //调用接口
    public function https_request($url,$data = null){
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
    //获取当前完整URL路径
    public function curPageURL()
    {
        $pageURL=$_SERVER["REQUEST_URI"];
        return $pageURL;

    }

    //是否登录
    public function isLogin(){
        $m_id = Cookie::get("m_id");
        $m_mobile = Cookie::get("phone");
        $mem =new MemberService();
        $m_id = $mem->decrypt($m_id);       //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符(加盐字符串)
        $minfo = $mem->get_info(['m_id'=>$m_id,'m_state'=>0,'m_mobile'=>$m_mobile],'m_id,m_name,m_type');
        if(empty($minfo)){
            $return=array("state"=>'0',"msg"=>'数据为空');
            return  $return;
        }
        else{
            $return=array("state"=>'1',"msg"=>'数据存在');
            return  $return;
        }
    }

    /**
     * @return string
     * 前台登录并保存在coolie中
     */
    public function member_login($data){
        $ms=new MemberService();
        $is_phone = $this->is_phone($data['m_mobile']); //验证手机号格式
        if($is_phone['state']=='0'){
            return ['state'=>0,'msg'=>'请输入正确的账号'];
        }
        $m_mobile =$data['m_mobile'];
        $mobile =$this->encrypt($m_mobile);            //加密手机号码
        $res = $this->get_member_info($mobile);
        if($res['data']['m_state']=='1'){
            return ['state'=>0,'msg'=>'账号已经被禁用'];
        }
        if($res['state']=='1'){
            $m_id = $this->encrypt('abcde'.$res['data']['m_id']);
            $time = 3600*24*365;
            Cookie::set('m_id',$m_id,$time);
            Cookie::set('phone',$res['data']['m_mobile'],$time);
            $this->update_member_info($m_id);
            //用户登录日志---------------wu start
            $loginlogdata=array();
            $loginlogdata['ip']=$this->getIp();
            $loginlogdata['m_id']=$res['data']['m_id'];
            if(!empty($_COOKIE['channel'])){
                $loginlogdata['channel'] =$_COOKIE['channel'];
            }
            else{
                $loginlogdata['channel']="";
            }
            $this->writeLoginLog($loginlogdata);
            //用户登录日志---------------wu end
            return ['state'=>1,'msg'=>'登录成功','data'=>$res];
        }else{
            return ['state'=>0,'msg'=>'账号或密码有误'];
        }
    }

    //获取用户信息
    public function get_member_info($mobile){
        $table="member";
        $mobile ="'". $mobile."'";            //加密手机号码
        $sql="select m_id,m_state,m_mobile,wx_unionid from pai_member where m_mobile=$mobile ";
        $list=Db::table($table)->query($sql);
        if(!empty($list[0]['m_id'])){
            $return=array("state"=>'1',"msg"=>"ok","data"=>$list[0]);
        }
        else
        {
            $return=array("state"=>'0',"msg"=>"failure");
        }
        return $return;
    }
    //修改用户信息
    public function update_member_info($m_id){
        $table="member";
        $ntime=time();
        $mem =new MemberService();
        $m_id = $mem->decrypt($m_id);       //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符(加盐字符串)
        $sql="update pai_member set login_time=$ntime where m_id=$m_id ";
        $res=Db::table($table)->execute($sql);
        if(!$res){
            $return=array("state"=>'1',"msg"=>"ok");
        }
        else
        {
            $return=array("state"=>'0',"msg"=>"failure");
        }
        return $return;
    }
    //修改用户信息openid
    public function update_member_openid($m_mobile,$openid,$unionid){
        $table="member";
        $m_mobile ="'". $this->encrypt($m_mobile)."'";            //加密手机号码
        $openid1=$openid;
        $openid="'".$openid."'";
        $sql="update pai_member set wx_openid=$openid where m_mobile=$m_mobile ";
        $res=Db::table($table)->execute($sql);
        if($res){
            //openid与mobile都存在 unionid处理 start
            if(!empty($unionid)){
                $res_union=$this->update_member_unionid( $unionid,$openid1);
            }
            //openid与mobile都存在 unionid处理 end
            $return=array("state"=>'1',"msg"=>"ok");
        }
        else
        {
            $return=array("state"=>'0',"msg"=>"failure");
        }
        return $return;
    }
    //修改用户信息unionid
    public function update_member_unionid($unionid,$openid){
        $table="member";
        $openid="'".$openid."'";
        $unionid="'".$unionid."'";
        $sql="update pai_member set wx_unionid=$unionid where wx_openid=$openid ";
        $res=Db::table($table)->execute($sql);
        if($res){
            $return=array("state"=>'1',"msg"=>"ok");
        }
        else
        {
            $return=array("state"=>'0',"msg"=>"failure");
        }
        return $return;
    }
    //修改用户信息mobile
    public function update_member_mobile($m_mobile,$openid,$unionid){
        $table="member";
        $m_mobile ="'". $this->encrypt($m_mobile)."'";            //加密手机号码
        $openid1=$openid;
        $openid="'".$openid."'";
        $sql="update pai_member set m_mobile=$m_mobile where wx_openid=$openid";
        $res=Db::table($table)->execute($sql);
        if($res){
            //openid与mobile都存在 unionid处理 start
            if(!empty($unionid)){
                 $res_union=$this->update_member_unionid( $unionid,$openid1);
            }
            //openid与mobile都存在 unionid处理 end
            $return=array("state"=>'1',"msg"=>"ok");
        }
        else
        {
            $return=array("state"=>'0',"msg"=>"failure");
        }
        return $return;
    }
    /**
     * 检验手机号码格式
     */
    public function is_phone($phone){
        if (!preg_match("/^1[3-9][0-9]{9}$/",trim($phone))) {
            return ['state'=>0,'msg'=>'请输入正确的手机号格式'];
        }
        else{
            return ['state'=>1,'msg'=>'ok'];
        }
    }
    /**
     * 检验密码格式
     */
    public function is_pwd($pwd){
        if(!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/',trim($pwd))){
            return ['state'=>0,'msg'=>'请输入6-16位数字/字母组合密码'];
        }
    }
    /**
     * 解密数据
     * @param $data 待加密数据
     * @return string 加密后的数据
     */
    function encrypt($data)
    {
        $key = $this->key;  //加密秘钥
        $key = md5($key);
        $x = 0;
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        $str = '';
        for ($i = 0; $i < $len; $i++)
        {
            if ($x == $l){
                $x = 0;
            }
            $char .= $key{$x};
            $x++;
        }
        for ($i = 0; $i < $len; $i++){
            $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
        }
        return base64_encode($str);
    }

    /**
     * 解密数据
     * @param $encrypt 待解密数据
     * @return string  解密后的值
     */
    function decrypt($encrypt)
    {
        $key = $this->key;  //解密秘钥(同加密秘钥)
        $key = md5($key);
        $x = 0;
        $data = base64_decode($encrypt);
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        $str = '';
        for ($i = 0; $i < $len; $i++)
        {
            if ($x == $l)
            {
                $x = 0;
            }
            $char .= substr($key, $x, 1);
            $x++;
        }
        for ($i = 0; $i < $len; $i++)
        {
            if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
            {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            }
            else
            {
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        return $str;
    }

    /**
     * @return string
     * 接收注册信息
     */
    public function register_wx($data,$unionid){
            $member = new MemberService();
        //openid与mobile都存在 unionid处理 start
        if(!empty($unionid)){
                $data['wx_unionid']= $unionid;
        }
        //openid与mobile都存在 unionid处理 end
            $info = $member->addUserWx($data);//app和pc端注册
            return $info;

    }

    /**
     * @return string
     * 短信直接注册
     */
    public function register_mobilecode($data){
        $member = new MemberService();
        $info = $member->addUserMobileCode($data);//app和pc端注册
        return $info;
    }

    //检查用户手机短信
    public function checkMobileCode($mobile)
    {
        $table="member";
        $mobile ="'".$this->encrypt($mobile)."'";            //加密手机号码
        $sql="select m_id,m_state,m_mobile from pai_member where m_mobile=$mobile ";
        $list=Db::table($table)->query($sql);
        if(!empty($list[0]['m_id'])){
            $return=array("state"=>'1',"msg"=>"手机号码存在","data"=>$list[0]['m_id']);
            return $return;
        }
        else{
            $return=array("state"=>'2',"msg"=>"手机号码不存在");
            return $return;
        }


    }
    //获取用户真实IP-----------------------wu  start
    public function getIp() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else
            if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            else
                if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                    $ip = getenv("REMOTE_ADDR");
                else
                    if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                        $ip = $_SERVER['REMOTE_ADDR'];
                    else
                        $ip = "unknown";
        return ($ip);
    }
    //获取用户真实IP-----------------------wu  end
    //用户登录写入登录日志--------------------------------  wu start
    public function writeLoginLog($data){
        $logindata['ll_ip'] =$data['ip'];
        $logindata['m_id'] =$data['m_id'];
        $logindata['ll_channel'] =$data['channel'];
        $logindata['ll_time'] =time();
        Db('member_login_log')->insert($logindata);
    }
    //用户登录写入登录日志--------------------------------  wu end



}