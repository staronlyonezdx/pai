<?php
namespace app\api\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\goods\GoodsService as GoodsService;
use app\data\service\store\StoreService as StoreService;
use app\data\service\store\StoreCategoryService as StoreCategoryService;
use app\data\service\goodsDiscounttype\GoodsDiscounttypeService as GoodsDiscounttypeService;
use app\data\service\goods\GoodsApiService as GoodsApiService;
use app\data\service\api\ApigoodsService as ApigoodsService;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use think\Db;
use app\data\service\store\StoreCollectionService;
use app\data\service\member\MemberService;




class Store extends ApiMember
{
    //商家发布商品
    public function add_goods()
    {

        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['g_name']))
        {
            $this->response_error("商品名称不能为空");
        }
        $data['g_name']=$this->data['g_name'];
        if(empty($this->data['pid']))
        {
            $this->response_error("商品所在地不能为空");
        }
        $data['pid']=$this->data['pid'];
        if(empty($_FILES['g_img']))
        {
            $this->response_error("商品图片不能为空");
        }
        $data['g_img']="g_img";
        if(!empty($this->data['g_secondname']))
        {
            $data['g_secondname']=$this->data['g_secondname'];
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $m_id=$this->data['member_id'];
        if(empty($this->data['store_id']))
        {
            $this->response_error(" 商户ID不能为空");
        }
        $data['store_id']=$this->data['store_id'];
        if(empty($this->data['g_description']))
        {
            $this->response_error(" 商品描述不能为空");
        }
        $data['g_description']=$this->data['g_description'];
        if(empty($this->data['g_typeid']))
        {
            $this->response_error(" 商品特殊属性不能为空");
        }
        $data['g_typeid']=$this->data['g_typeid'];
//        if(empty($this->data['g_peoplenumber']))
//        {
//            $this->response_error(" 参拍成拍人数不能为空");
//        }
//        $data['g_peoplenumber']=$this->data['g_peoplenumber'];
        if(empty($this->data['g_express']))
        {
            $data['g_express']='0';
        }
        else{
            $data['g_express']=$this->data['g_express'];
        }
        if(empty($this->data['g_express_way']))
        {
            $this->response_error(" 运费方式不能为空");
        }
        $data['g_express_way']=$this->data['g_express_way'];
        if(empty($this->data['g_starttime']))
        {
            $this->response_error("拍品开始时间不能为空");
        }
        $data['g_starttime']=$this->data['g_starttime'];
        if(empty($this->data['g_endtime']))
        {
            $this->response_error("拍品结束时间不能为空");
        }
        $data['g_endtime']=$this->data['g_endtime'];
        if(empty($this->data['gp_stock']))
        {
            $this->response_error("商品库存不能为空");
        }
        $data['gp_stock']=$this->data['gp_stock'];
        if(empty($this->data['gp_settlement_price']))
        {
            $this->response_error("结算价格不能为空");
        }
        $data['gp_settlement_price']=$this->data['gp_settlement_price'];
        if(empty($this->data['gp_market_price']))
        {
            $this->response_error("市场价格不能为空");
        }
        $data['gp_market_price']=$this->data['gp_market_price'];
        if(!empty($this->data['gp_description']))
        {
            $data['gp_description']=$this->data['gp_description'];
        }
        if(empty($this->data['gc_id']))
        {
            $this->response_error("商品分类不能为空");
        }
        $data['gc_id']=$this->data['gc_id'];
        $store = new StoreService();
        $money = $this->data['gp_market_price'];                         //保证金判定区域
        $total_money = 0;
        switch($money){
            case $money <= 1000:
                $total_money = '1000';
                break;
            case $money > 1000 && $money<= 10000:
                $total_money = '5000';
                break;
            case $money > 10000:
                $total_money = '10000';
                break;
        }
        $deposit = $store->storeInfo(['m_id'=>$m_id],'deposit');                    //已有保证金
        $g_state = ($total_money-$deposit['deposit']) > 0 ? 1 : 2;

        $goodsservice=new GoodsService();
        $result=$goodsservice->add_goods($data,$m_id,$g_state);
        if($result['status']=='1'){
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_data($rdata);
        }
        elseif($result['status']=='2'){
            $error_code=501;
            $this->response_error($result['msg'],$error_code);
        }
        else{
            $this->response_error($result['msg']);
        }
    }
    //商家发布商品保存到草稿箱
    public function add_goods_draft()
    {

        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(!empty($this->data['g_name']))
        {
            $data['g_name']=$this->data['g_name'];
        }
        if(!empty($this->data['pid']))
        {
            $data['pid']=$this->data['pid'];
        }
        if(!empty($this->data['g_secondname']))
        {
            $data['g_secondname']=$this->data['g_secondname'];
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $m_id=$this->data['member_id'];
        if(!empty($this->data['store_id']))
        {
            $data['store_id']=$this->data['store_id'];
        }
        if(!empty($this->data['g_description']))
        {
            $data['g_description']=$this->data['g_description'];
        }
        if(!empty($this->data['g_typeid']))
        {
            $data['g_typeid']=$this->data['g_typeid'];
        }
        if(!empty($this->data['g_peoplenumber']))
        {
            $data['g_peoplenumber']=$this->data['g_peoplenumber'];
        }

        if(!empty($this->data['g_express']))
        {
            $data['g_express']=$this->data['g_express'];
        }
        else{
            $data['g_express']='0';
        }

        if(!empty($this->data['g_express_way']))
        {
            $data['g_express_way']=$this->data['g_express_way'];
        }
        $data['g_img']='g_img';
        if(!empty($this->data['g_starttime']))
        {
            $data['g_starttime']=$this->data['g_starttime'];
        }
        if(!empty($this->data['g_endtime']))
        {
            $data['g_endtime']=$this->data['g_endtime'];
        }
        if(!empty($this->data['g_endtime']))
        {
            $data['g_endtime']=$this->data['g_endtime'];
        }
        if(!empty($this->data['gp_stock']))
        {
            $data['gp_stock']=$this->data['gp_stock'];
        }
        if(!empty($this->data['gp_settlement_price']))
        {
            $data['gp_settlement_price']=$this->data['gp_settlement_price'];
        }
        if(!empty($this->data['gp_market_price']))
        {
            $data['gp_market_price']=$this->data['gp_market_price'];
        }
        if(!empty($this->data['gp_description']))
        {
            $data['gp_description']=$this->data['gp_description'];
        }
        if(!empty($this->data['gc_id']))
        {
            $data['gc_id']=$this->data['gc_id'];
        }
        $goodsservice=new GoodsService();
        if(empty($data)){
          $this->response_error("没有任何要修改的数据");
        }
        else{
            $result=$goodsservice->add_goods($data,$m_id,'7');
            if($result['status']=='1'){
                $rdata=array();
                $rdata['msg']=$result['msg'];
                $this->response_data($rdata);
            }
            else{
                $this->response_error($result['msg']);
            }
        }

    }
    //得到折扣类型
    public function get_discount_type(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $GoodsDiscounttypeService=new GoodsDiscounttypeService();
        $where="1=1";
        if(!empty($this->data['market_price']))
        {
           $where.=" AND gdt_money1<".$this->data['market_price']." AND gdt_money2 >".$this->data['market_price'];
        }
        $list=$GoodsDiscounttypeService->goods_discounttype_list($where);
        $rlist=array();
        $c1=0.05;
        $c2=0.2;
        $price=$this->data['market_price'];
        foreach($list as $k=>$v){
            $rlist[$k]['dt_img']=CDN_URL.$v['gdt_img'];
            if($v['gdt_discount']=="0.0"){
                $rlist[$k]['dt_name']=$v['gdt_name'];
                $rlist[$k]['pai_price']="1.00";
                $rlist[$k]['dt_member_num']=ceil($price*10);
            }
            else{
                $rlist[$k]['dt_name']=$v['gdt_name'];
                $rlist[$k]['pai_price']=sprintf("%.2f",$price*$v['gdt_discount']);
                $rlist[$k]['dt_member_num']=ceil(($price/($price*$v['gdt_discount']))*10);
            }
        }
        $this->response_data($rlist);

    }
    //是否是商家
    public function is_business(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $where['m_id']=$this->data['member_id'];
        $goodsservice=new GoodsService();
        $result=$goodsservice->is_business($where);
        if($result['status']=='1'){
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_data($rdata);
        }
        else{
            $this->response_error($result['msg']);
        }
    }
    //读取商家信息
    public function get_storeinfo(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $where['m_id']=$this->data['member_id'];
        $storeservice=new StoreService();
        $info=$storeservice->storeInfo($where);
        if(!empty($info)){
            $this->response_data($info);die;
        }
        else{
            $this->response_error("商家信息为空");die;
        }
    }
    //读取商家分类
    public function get_storecategory(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $StoreCategoryService=new StoreCategoryService();
        $info=$StoreCategoryService->storecategoryList();
        if(!empty($info)){
            $this->response_data($info);die;
        }
        else{
            $this->response_error("商家分类信息为空");die;
        }
    }
    //我的商品列表
    public function my_goods_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $GoodsApiService=new GoodsApiService();
        $where="g.g_mid=".$this->data['member_id'];
        if(!empty($this->data['g_state']))
        {
            $where.=" and g.g_state=".$this->data['g_state'];
        }
        $fields="g.g_id,gp.gp_id,g.g_name,g_img,g_typeid,g_endtime,gp.gp_stock,gp.gp_sn,gp.gp_sale_price,g.g_state";
        $order="g.g_addtime desc";
        if (empty($this->data['curpage'])) {
            $curpage = 1;
        } else {
            $curpage = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $pagenum = 10;
        } else {
            $pagenum = $this->data['pagenum'];
        }
        $list=array();
        $list=$GoodsApiService->get_my_goods_list($where,$fields,$order,$curpage,$pagenum);
        $c=$GoodsApiService->get_my_goods_list_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        if(!empty($list)){
            $this->response_data($list,$pagelist);
        }
        else{
            $this->response_error("数据为空");
        }

    }
    //得到 属性
    public function get_goods_type(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        if(empty($this->data['store_type']))
        {
            $this->response_error("店铺类型ID没有");
        }
        $store_type=$this->data['store_type'];
        $ApigoodsService=new ApigoodsService();
        $list=$ApigoodsService->get_goodstype($store_type);
        if(empty($list)){
            $this->response_error("数据为空");
        }
        else{
            $this->response_data($list);
        }
    }
    //店铺首页
    public function store_index(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(!empty($this->data['member_id']))
        {
           $m_id=$this->data['member_id'];
        }
        if(empty($this->data['store_id']))
        {
            $this->response_error("店铺store_id不能为空");
        }
        $g_storeid =$this->data['store_id'];
        $store = new StoreService();
        $store_id = $store->get_value(['store_id'=>$g_storeid],'store_id');
        if(!$store_id){
           $this->response_error("该店铺不存在");
        }
        if(!empty($this->data['g_name']))
        {
            $g_name = $this->data['g_name'];
        }

        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size = 10;
        } else {
            $page_size = $this->data['pagenum'];
        }
        if (empty($this->data['order'])) {
            $order = 1;
        } else {
            $order = $this->data['order'];
        }
        $goods = new GoodsService();
        $where = [
            'g.g_storeid'=>$g_storeid,
            'g.g_state'=>6,
        ];
        if(!empty($g_name)){
            $where['g.g_name'] = ['like','%'.$g_name.'%'];
        }
        switch($order){
            case 2:     //新品排序
                $order = 'g.g_addtime desc';
                break;
            case 3:     //人数正序
                $order = 'sum_gp_num asc';
                break;
            case 4:     //人数倒叙
                $order = 'sum_gp_num desc';
                break;
            case 5:     //价格正序
                $order = 'p.gp_market_price asc';
                break;
            case 6:     //价格倒叙
                $order = 'p.gp_market_price desc';
                break;
            default:    //综合排序
                $order = 'g.g_score desc,g.g_starttime desc';
                break;
        }
        $field='g.g_id,g.g_name,g.g_img,g.g_starttime,p.gp_market_price,min(dtr.gdr_price)min_price,max(dtr.gdr_price)max_price,sum(op.gp_num) sum_gp_num';
        $list = $goods->shop_list($where,$field,$order,$page_size,$page);

        //店铺logo和名称
        $where2 = [
            'store_id'=>$g_storeid,
        ];
        $store_info = $store->storeInfo($where2,'store_id,stroe_name,store_logo,store_background_img');
        if(!empty($store_info)){
            $store_info['store_logo']=CDN_URL.$store_info['store_logo'];
            $store_info['store_background_img']=CDN_URL.$store_info['store_background_img'];
        }
        //店铺被收藏数量
        $collection = new StoreCollectionService();
        $store_info['num'] = $collection ->get_num($where2);
        //是否已收藏 1是 2否
        $store_info['is_collection'] = '';
        if((int)$m_id){
            $where3 = [
                'm_id'=>$m_id,
                'store_id'=>$g_storeid,
            ];
            $store_info['is_collection'] = $collection->get_count($where3) ? 1 : 2;

        }
        $store_info['is_login'] = (int)$m_id ? 1 : 0 ;
        $data=array();
        $data['list']=$list['list'];
        $data['store_info']=$store_info;
        $page_count=$list['totle_page'];
        $pagelist=$this->app_page($page_count);
        $this->response_data($data,$pagelist);
    }
    //我卖出的
    public function my_sell_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
         $this->response_error("没有用户member_id");
        }
        $m_id=$this->data['member_id'];
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $size = 10;
        } else {
            $size = $this->data['pagenum'];
        }
        if (empty($this->data['state'])) {
            $i = 0;
        } else {
            $i = $this->data['state'];
        }
        $orderPai = new OrderPaiService();
        $callback = $orderPai -> get_sell_list_page($m_id,$page,$size,$i);
        $data=$callback['data'];
        $this->response_data($data);
    }
    //验证保证金
    public function store_deposit(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['store_id']))
        {
            $this->response_error("没有商户store_id");
        }
        if(empty($this->data['market_price']))
        {
            $this->response_error("没有商品market_price");
        }
        $market_price=$this->data['market_price'];
        $where=array();
        $where['store_id']=$this->data['store_id'];
        $storeservice=new StoreService();
        $fields="deposit";
        $info=$storeservice->storeInfo($where,$fields);
        if(!empty($info)){
            switch($market_price){
                case $market_price <= 1000:
                    $total_money = '1000';
                    break;
                case $market_price > 1000 && $market_price<= 10000:
                    $total_money = '5000';
                    break;
                case $market_price > 10000:
                    $total_money = '10000';
                    break;
            }
            $ymoney=sprintf("%.2f",$total_money-$info['deposit']);
            if($ymoney>0){
                $data['msg']="保证金不足";
                $data['state']="0";
                $data['deposit']=$info['deposit'];
                $data['ymoney']=sprintf("%.2f",$total_money-$info['deposit']);
                $this->response_data($data);
            }
            else{
                $data['msg']="保证金足够";
                $data['state']="1";
                $data['deposit']=$info['deposit'];
                $this->response_data($data);
            }
        }
        else{
            $this->response_error("商家信息为空");die;
        }
    }
    //交保证金
    public function add_storedeposit(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['store_id']))
        {
            $this->response_error("没有商户store_id");
        }
        if(empty($this->data['g_id']))
        {
            $this->response_error("没有商品g_id");
        }
        $g_id=$this->data['g_id'];
        if(empty($this->data['paypwd']))
        {
            $this->response_error("没有支付密码paypwd");
        }
        $m_payment_pwd =$this->data['paypwd'];
        $paypwd=$this->data['paypwd'];
        $storeservice=new StoreService();
        $fields="deposit";
        $where=array();
        $where['store_id']=$this->data['store_id'];
        $info=$storeservice->storeInfo($where,$fields);
        if(!empty($info)) {
            $m_id = $info['m_id'];
            $mem = new MemberService();
            $where = [
                'm_id'=>$m_id,
                'm_payment_pwd'=>trim($m_payment_pwd),
            ];
            $is_pwd = $mem->get_info($where,'m_id');
            if(!$is_pwd){
               $this->response_error('支付密码错误');
            }
            $where2 = [
                'g.g_id'=>$g_id,
                'g.g_mid'=>$m_id,
            ];
            $field = 'gp.gp_settlement_price,m.m_money';
            $store = new StoreService();
            $goodsInfo = $store->checkDeposit($where2,$field,$m_id);
            if($goodsInfo['status'] == 1){
                $this->response_error('您无需支付保证金');
            }
            $deposit = $goodsInfo['data'];
            if($deposit['new_deposit'] - $deposit['m_money'] > 0){
               $this->response_error('账户余额不足');
            }
            $where3 = [
                'g_id'=>$g_id,
                'm_id'=>$m_id,
            ];
            $store = new StoreService();
            //现应缴纳保证金(已减原有保证金)
            $new_deposit = $deposit['new_deposit'];
            $res = $store->add_deposit($where3,$new_deposit);
           if($res['status']=='1'){
               $data=array();
               $data['msg']=$res['msg'];
               $this->response_data($data);
           }else{
               $this->response_error($res['msg']);
           }
        }
    }
    //商家确定发货
    public function store_logistic(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['o_id']))
        {
            $this->response_error("没有订单o_id");
        }
        if(empty($this->data['express_corid']))
        {
            $this->response_error("没有物流公司express_corid");
        }
        if(empty($this->data['express_way']))
        {
            $this->response_error("没有物流信息express_way");
        }
        if(empty($this->data['express_num']))
        {
            $this->response_error("没有快递单号express_num");
        }
        if(empty($this->data['seller_mobile']))
        {
            $this->response_error("卖家联系电话seller_mobile");
        }
        if(empty($this->data['seller_name']))
        {
            $this->response_error("卖家姓名seller_name");
        }
        $data=array();
        $data['o_id']=$this->data['o_id'];
        $data['express_corid']=$this->data['express_corid'];
        $data['express_way']=$this->data['express_way'];
        $data['express_num']=$this->data['express_num'];
        $data['seller_mobile']=$this->data['seller_mobile'];
        $data['seller_name']=$this->data['seller_name'];
        $orderPai = new OrderPaiService();
        //提交数据
        $call_back = $orderPai->new_logistics_post($data);
        if($call_back['status']=='1'){
            $ret['msg']=$call_back['msg'];
            $this->response_data($ret);
        }
        else{
            $this->response_error($call_back['msg']);
        }

    }



}
