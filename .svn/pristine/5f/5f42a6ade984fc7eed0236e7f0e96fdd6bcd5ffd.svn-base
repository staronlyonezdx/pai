<?php
namespace app\pointpai\controller;
use app\data\service\member\MemberService;
use app\data\service\system_msg\SystemMsgService;
use think\Cache;
use think\Controller;
use think\Cookie;
use think\Request;
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

//        //获取是否有未读消息
//        $is_read = Cache::get('is_read');
//        $is_read = $is_read ? 1 : 0;
//        if($is_read==0){
//            $where = [
//                'to_mid'=>$m_id,
//                'is_read'=>1,
//                'sm_public'=>1
//            ];
//            $msg = new SystemMsgService();
//            $is_read = $msg->get_count($where);
//            if($is_read){
//                Cache::set('is_read',1);
//            }
//        }
        $this->m_id = $m_id;
        $res = $mem->get_info(['m_id'=>$m_id,'m_state'=>0,'m_mobile'=>$m_mobile],'m_id,m_name,m_type');
        if(!$res){
            $this->redirect("/member/login/index");
        }
        $this->m_name = $res['m_name'];
        $controller = request()->controller();
//        $this->assign('is_read',$is_read);
        $this->assign('m_type',$res['m_type']);
        $this->assign('controller',$controller);
        //全局调用微信分享
        $this->share();
    }
    public function share(){
        $mem =  new MemberService();
        //微信分享--------start
        $appId = config('share.appId');
        $timestamp = time();
        $jsapi_ticket = $mem->getJsApiTicket();
        $noncestr = $mem->getMonceStr();
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $signature = sha1("jsapi_ticket=$jsapi_ticket&noncestr=$noncestr&timestamp=$timestamp&url=$url");
        $this->assign('appId',$appId);
        $this->assign('timestamp',$timestamp);
        $this->assign('noncestr',$noncestr);
        $this->assign('signature',$signature);
        //微信分享---------over
    }

}
