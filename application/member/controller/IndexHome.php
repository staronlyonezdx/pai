<?php
namespace app\member\controller;
use app\data\service\member\MemberService;
use app\data\service\system_msg\SystemMsgService;
use RedisCache\RedisCache;
use think\Cache;
use think\Controller;
use think\Cookie;
use think\Request;
class IndexHome extends Controller
{
    public  $m_id;
    public  $m_name;
    public  $m_type;
    //检测用户是否登录
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $m_id = Cookie::get("m_id");
        $m_mobile = Cookie::get("phone");
        $mem = new MemberService();
        $m_id = $mem->decrypt($m_id);       //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符(加盐字符串)
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
//        $res = $mem->get_info(['m_id'=>$m_id,'m_state'=>0,'m_mobile'=>$m_mobile],'m_id,m_name,m_type,m_mobile');

        $this->m_id     = empty($res['m_id']) ? '' : $res['m_id'];
        $this->m_name   = empty($res['m_name']) ? '' : $res['m_name'];
        $this->m_type   = empty($res['m_type']) ? 0 : $res['m_type'];
        $is_lord = 0;
        if(!empty($res['m_mobile'])){
            $m_mobile = $mem->decrypt($res['m_mobile']);
            $is_lord = $m_mobile == '15676246642' ? 1 : 0;
        }
        //当前控制器的名称
        $controller = request()->controller();
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

        $this->assign('m_type',$res['m_type']);
        $this->assign('controller',$controller);
        $this->assign('is_read',$is_read);
        $this->assign('is_lord',$is_lord);
        //初始化分享
        $this->share();
        //渠道来源统计开始-------start
        if(!empty($_GET['channel'])){
            $_COOKIE['channel']=$_GET['channel'];
            setcookie('channel',$_GET['channel']);
        }
        //渠道来源统计结束-------end
        if(!empty($m_id)){
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
    }
    //每页初始化分享信息
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
}
