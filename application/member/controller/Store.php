<?php
namespace app\member\controller;
use app\data\service\admit\AdmitService;
use app\data\service\goods\GoodsService;
use app\data\service\member\MemberService;
use app\data\service\store\StoreCollectionService;
use app\data\service\store\StoreService;
use think\Controller;
use think\Db;

class Store extends MemberHome
{
    /**
     * 店铺首页
     * 邓赛赛
     */
    public function index(){
        $m_id = $this->m_id;
        $where = [
            'm_id'=>$m_id
        ];
        $store = new StoreService();
        $data = $store->storeInfo($where,'store_id,stroe_name,store_logo,deposit,store_code');
        $collection = new StoreCollectionService();
        $where = [
            'store_id'=>$data['store_id']
        ];
        //无二维码是生成二维码
        if(!$data['store_code'] || !is_file(trim($data['store_code'],'/'))){
            $code = $store->new_shop_code($where);
            $data['store_code'] = $code;
        }
        $data['fans'] = $collection->get_count($where);                 //粉丝数
        $this->assign("data",$data);
        $this->assign("header_title",'我的店铺');
        //分享参数
        $this->assign('share_title','拍吖吖：'.$data['stroe_name']);
        $this->assign('share_desc','发现一个好店，优惠多多，快来淘淘东西吧！');
        $this->assign('share_link',PAI_URL.'/member/shop/index/store_id/'.$data['store_id'].'?share=1');
        $this->assign('share_imgUrl',PAI_URL.$data['store_logo']);
        //无logo时取默认值
        if(empty($data['store_logo']) || !is_file(trim($data['store_logo'],'/'))){
            $data['store_logo'] = '/uploads/logo/1.jpg';
        }
        $this->assign('share_imgUrl',PAI_URL.$data['store_logo']);

        return view();
    }
    /**
     * 保证金页面
     * 邓赛赛
     */
    public function deposit()
    {
        $g_id = input('param.g_id');
        $m_id = $this->m_id;
        $where = [
            'g.g_id'=>$g_id,
            'g.g_mid'=>$m_id,
        ];

        $field = 'g.g_id,g.g_name,g.g_img,g.g_secondname,g.g_endtime,gp.gp_settlement_price,m.m_money';
        $store = new StoreService();
        $goodsInfo = $store->checkDeposit($where,$field,$m_id);
        if($goodsInfo['status'] == 1){
            $this->error('此商品无需保证金','/member/goods/my_goods','',1);
        }
        if($goodsInfo['status'] == 2){
            $this->error('未查到此商品','/member/goods/my_goods','',1);
        }
        $goodsInfo = $goodsInfo['data'];
        $this->assign(['goodsInfo'=>$goodsInfo]);
        $this->assign('header_title','支付保证金');
        return $this->fetch();
    }
    /**
     * 保证金规则页面
     * 邓赛赛
     */
    public function deposit_rule(){
        $this->assign('header_title',"保证金规则");
        return view();
    }
    /**
     * 支付保证金
     * 邓赛赛
     */
    public function payment_deposit(){
        if(request()->isPost()){
            $m_id = $this->m_id;
            $g_id = input('post.g_id');
            $m_payment_pwd = input('post.pwd');
            if(!trim($g_id)){
                $this->error('未知的商品','/member/goods/my_goods','',1);
            }
            $mem = new MemberService();
            $where = [
                'm_id'=>$m_id,
                'm_payment_pwd'=>trim($m_payment_pwd),
            ];

            $is_pwd = $mem->get_info($where,'m_id');
            if(!$is_pwd){
                return ['status'=>0,'msg'=>'支付密码错误'];
            }
            $where2 = [
                'g.g_id'=>$g_id,
                'g.g_mid'=>$m_id,
            ];
            $field = 'gp.gp_settlement_price,m.m_money';
            $store = new StoreService();
            $goodsInfo = $store->checkDeposit($where2,$field,$m_id);
            if($goodsInfo['status'] == 1){
                return ['status'=>2,'msg'=>'您无需支付保证金'];
            }
            $deposit = $goodsInfo['data'];
            if($deposit['new_deposit'] - $deposit['m_money'] > 0){
                return ['status'=>3,'msg'=>'账户余额不足'];
            }
            $where3 = [
                'g_id'=>$g_id,
                'm_id'=>$m_id,
            ];
            $store = new StoreService();
            //现应缴纳保证金(已减原有保证金)
            $new_deposit = $deposit['new_deposit'];
            $res = $store->add_deposit($where3,$new_deposit);
            return $res;
        }else{
            return ['status'=>0,'msg'=>'请求错误'];
        }
    }
    /**
     *修改商家信息
     *邓赛赛
     */
    public function set_store(){
        $m_id = $this->m_id;
        $store = new StoreService();
//        $store_id = $store->get_value(['m_id'=>$m_id],'store_id');
        $where = [
            'm_id'=>$m_id,
            'store_state'=>0,
        ];
        $data = input('post.');
        $res = $store->get_save($where,$data);
        return $res;

    }

    /**
     * 商家证件信息
     * 邓赛赛
     */
    public function certificates(){
        $m_id = $this->m_id;
        $where = [
            'm_id'=>$m_id
        ];
        $admitService = new AdmitService();
        $info = $admitService->vdRegister($where);//申请信息
        $address = [
            'pid'=>$info['pid'],
            'cid'=>$info['cid'],
            'aid'=>$info['aid'],
        ];
        $info['pid'] = $admitService->id_tfm_address($address);
        $cate = Db::table("pai_store_category")->column('sc_name','sc_id');//替换使用(如:分类3,替换为实木家具
        if(!empty($info['store_categoryid'])){
            $info['store_categoryid_name'] = empty($cate[$info['store_categoryid']]) ? '' : $cate[$info['store_categoryid']];
        }else{
            $info['store_categoryid_name'] = '';
        }
        $this ->assign(["info"=>$info,'cate'=>$cate]);
        $this ->assign('header_title','入驻详情');
        return view();
    }

    /**
     * 我的粉丝列表
     * 邓赛赛
     */
    public function fans_list(){
        $m_id = $this->m_id;
        $data = input('post.');
        $page = empty($data['page']) ? 1 : $data['page'];
        $page_size = empty($data['page_size']) ? 20 : $data['page_size'];
        $where = [
            'm_id'=>$m_id,
        ];
        $store = new StoreService();
        $store_id = $store->get_value($where,'store_id');
        $where2 = [
            'sc.store_id' => $store_id,
//            'm.m_state' => 0
        ];

        $store_collection = new StoreCollectionService();
        $list['list'] = $store_collection->fans_list($where2,'','m.m_id,m.m_name,m.m_avatar,ml.ml_name',$page,$page_size);
        //分页
        $total_num = $store_collection->get_count(['store_id'=>$store_id]);
        $total_page = ceil($total_num/$page_size);
        $list['page'] = $page;
        $list['page_size'] = $page_size;
        $new_num = count($list['list']);
        $list['new_num'] = $new_num;
        $list['total_num'] = $total_num;
        $list['total_page'] = $total_page;
        //ajax请求
        if(request()->isAjax()){
            return $list;
        }
        $list['store_id'] = $store_id;
        $this->assign('list',$list);
        $this->assign('header_title','我的粉丝');
        return view();
    }

    /**
     * 商家背景墙设置
     * 邓赛赛
     */
    public function store_bk_img(){
        $m_id = $this->m_id;
        $store = new StoreService();
        $where = [
            'm_id'=>$m_id
        ];
        $background_img = $store -> get_value($where,'store_background_img');
        $this->assign('store_background_img',$background_img);
        $this->assign('header_title','设置背景墙');
        return view();
    }




}
