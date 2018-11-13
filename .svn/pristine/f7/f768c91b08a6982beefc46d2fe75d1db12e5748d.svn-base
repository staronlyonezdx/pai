<?php
namespace app\business\controller;
use app\data\service\member\MemberService;
use app\data\service\store\StoreService;
use think\Controller;
use think\Cookie;
use think\Db;
use think\Request;
class MemberHome extends Controller
{
    public  $m_id;
    public  $m_name;
    public  $store_id;
    //检测用户是否登录
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $m_id = Cookie::get("m_id");
        $mem = new MemberService();
        $m_id = $mem->decrypt($m_id);       //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符(加盐字符串)


        $this->m_id = $m_id;
        $res = $mem->get_info(['m_id'=>$m_id,'m_state'=>0],'m_id,m_name,m_type');
        if(!$res){
            $this->redirect("/business/login/index");
        }

        $store = new  StoreService();
        $store_data = $store->storeInfo(['m_id'=>$m_id,'store_state'=>0],'store_id,stroe_name,store_type');
        if(!$store_data){
            $this->error('您不是商家','/business/login/index','',1);
        }

        $store_id = $store_data['store_id'];
        $this->m_name = $res['m_name'];
        $this->store_type = $store_data['store_type'];

        $this->assign('m_type',$res['m_type']);
        $this->assign('stroe_name',$store_data['stroe_name']);
        $this->assign('store_id',$store_data['store_id']);
        $this->assign('store_type',$store_data['store_type']);
    }

}
