<?php
namespace app\member\controller;
use app\data\service\member\MemberService;
use app\data\service\system_msg\SystemMsgService;
use RedisCache\RedisCache;
use think\Cache;
use think\Controller;
use think\Cookie;
use think\Request;
use app\data\service\wx\WxService;
use app\data\service\popularity\PopularityService;


class MemberHome extends Controller
{
    public  $m_id;
    public  $m_name;
    //检测用户是否登录
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $m_id = Cookie::get("m_id");
        $m_mobile = Cookie::get("phone");
        $mem = new MemberService();
        $m_id = $mem->decrypt($m_id);       //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符(加盐字符串)
        $this->m_id = $m_id;

        $redis = RedisCache::getInstance();
        //检测信息用户是否存在
        $user_info = $redis->get('user_'.$m_id);
        if(!$user_info){
            $res = $mem->get_info(['m_id'=>$m_id,'m_state'=>0,'m_mobile'=>$m_mobile],'m_id,m_name,m_type,m_mobile');
            if($res){
                $redis->set('user_'.$m_id,json_encode($res));
            }
        }else{
            $user_info = $redis->get('user_'.$m_id);
            $res = json_decode($user_info,true);
        }
        //是否为测试手机号
        $is_lord = 0;
        if(!empty($res['m_mobile'])){
            $m_mobile = $mem->decrypt($res['m_mobile']);
            $is_lord = $m_mobile == '15676246642' ? 1 : 0;
        }

        if(!$res){
            //如果微信浏览器授权---------------------start
            if($this->is_weixin()){
                $ws = new WxService();
                $cururl=$ws->curPageURL();
                $returl=urlencode($cururl);
                //去微信授权
                $redirect_uri ="https://m.paiyy.com.cn/index/thirdlogin/one_enter/returl/$returl";
                $href = $ws->toWxAuth($redirect_uri);
                header('Location:' . $href);
                die;
            }else{
                $this->redirect("/member/login/index");
            }
            //如果微信浏览器授权---------------------end
        }
        //是否有未读信息
        $is_read = $redis->get('is_read_'.$m_id);
        if($m_id && !$is_read){
            $where = [
                'to_mid'=>$m_id,
                'is_read'=>1,
                'sm_public'=>1
            ];
            $msg = new SystemMsgService();
            $is_read = $msg->get_count($where);
            if($is_read){
                $redis->set('is_read_'.$m_id,1);
            }else{
                $redis->set('is_read_'.$m_id,0);
            }
            $is_read = $redis->get('is_read_'.$m_id);
        }
        $this->m_name = $res['m_name'];
        $controller = request()->controller();
        $this->assign('is_read',$is_read);
        $this->assign('m_type',$res['m_type']);
        $this->assign('controller',$controller);
        $this->assign('is_lord',$is_lord);
        //全局调用微信分享
        $this->share();
        //渠道来源统计开始-------start
        if(!empty($_GET['channel'])){
            $_COOKIE['channel']=$_GET['channel'];
            setcookie('channel',$_GET['channel']);
        }
        //渠道来源统计结束-------end
        // 用户登录统计开始-------start
            if(!empty($_COOKIE['channel'])){
                $parameter['channel'] =$_COOKIE['channel'];
            }
            else{
                $parameter['channel']="";
            }
           $logindata=array();
           $logindata['m_id']=$m_id;
           $logindata['channel']= $parameter['channel'];
           $mem->writeActiveLoginLog($logindata);
        //用户登录统计结束-------end
    }
    public function share(){
        $mem =  new MemberService();
        //微信分享--------start
        $appId = config('share.appId');
        $timestamp = time();
        $jsapi_ticket = $mem->getJsApiTicket();
        $noncestr = $mem->getMonceStr();
        $url = 'https://m.paiyy.com.cn'.$_SERVER['REQUEST_URI'];
        $signature = sha1("jsapi_ticket=$jsapi_ticket&noncestr=$noncestr&timestamp=$timestamp&url=$url");
        $this->assign('appId',$appId);
        $this->assign('timestamp',$timestamp);
        $this->assign('noncestr',$noncestr);
        $this->assign('signature',$signature);
        //微信分享---------over
    }
    //判断是否微信浏览器
    public function is_weixin(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'],
                'MicroMessenger') !== false ) {
            return true;
        }
        return false;
    }

}
