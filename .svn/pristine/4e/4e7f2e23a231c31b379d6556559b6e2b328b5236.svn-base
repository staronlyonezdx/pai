<?php
namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\sms\SmsService as SmsService;
use app\data\service\BaseService as BaseService;
use app\data\service\goods\GoodsDtRecordService as GoodsDtRecordService;
use app\data\service\goods\GoodsService as GoodsService;
use app\data\service\api\ApigoodsService as ApigoodsService;
use app\data\service\goodsCategory\GoodsCategoryService;



class Goods extends ApiIndex
{

    //读取商品信息
    public function get_goodsinfo(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['g_id']))
        {
            $this->response_error("商品ID不能为空");
        }
        $ApigoodsService=new ApigoodsService();
        $where2['g_id']=$this->data['g_id'];
        $info=$ApigoodsService->get_goods_info($this->data['g_id']);
        if(empty($info)){
            $this->response_error("该商品信息为空");
        }

        $g_id=$this->data['g_id'];
        $store_id=$info['g_storeid'];
        $category_id=$info['gc_id'];
        //商品总成交人数
        $gp_id=$info['gp_id'];
        $o_state='1';
        $g_ordernum=0;
        $g_ordernum=$ApigoodsService->get_goods_ordernum($gp_id,$o_state);
        //发货省市区地址
        $provinceName="";
        $cityName="";
        $dName="";
        if(!empty($info['pid'])&&!empty($info['cid'])&&!empty($info['did']))
        {
            $provinceName=$ApigoodsService->getAddressNameById($info['pid']);
            $cityName=$ApigoodsService->getAddressNameById($info['cid']);
            $dName=$ApigoodsService->getAddressNameById($info['did']);
        }
        //折扣订单总人数
        $zk_list=array();
        $zk_list=$ApigoodsService->getZKPai2($g_id);
        $ordernum_list=array();
        $ordernum_list=$ApigoodsService->getordernum($gp_id);
       // $tjproducts=$ApigoodsService->get_pinfo_tjproducts($store_id,$category_id);
        $where11=[
            'gc_id'=>$category_id,
            'g_storeid'=>$store_id,
            'g_state'=>6,
            'g_id'=>['<>',$g_id]
        ];
        $goods = new GoodsService();
        $tj_list = $goods->get_tj_list($where11,$order='g_id desc',$field="g_id,g_name,g_img,gc_id");
        if(!empty($tj_list)){
            foreach($tj_list as $k=>$v){
                $tj_list[$k]['g_img']=CDN_URL.$v['g_img'];
            }
        }
        $info['ordernum']=$ordernum_list;
        $info['g_ordernum']=$g_ordernum;
        $info['provinceName']=$provinceName;
        $info['cityName']=$cityName;
        $info['dName']=$dName;
        $info['zk_list']=$zk_list;
        $info['now_time']=time();
        $info['tjproducts']= $tj_list;
        //读取评价
        $g_review=$ApigoodsService->get_goods_review($info['gp_id'],$info['g_storeid']);
        $info['g_review']=$g_review;
        //店铺详情
        $store_data=$ApigoodsService->get_store_data($info['g_storeid']);
        $info['store_data']=$store_data;
        if(!empty($info)){
            $this->response_data($info);
        }
        else{
            $this->response_error("商品信息为空");
        }
    }
    //读取商品目录
    public function get_goods_category(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApigoodsService=new ApigoodsService();
        $goods_category_list=$ApigoodsService->get_goodscategory();
        if(!empty($goods_category_list)){
            $this->response_data($goods_category_list);
        }else{
            $this->response_error("数据为空");
        }

    }
   //读取当前拍买人信息
    public function get_pai_member_cur(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['gdr_id']))
        {
            $this->response_error("订单gdr_id不能为空");
        }
        if(empty($this->data['curpage']))
        {
            $curpage=1;
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $pagenum=10;
        }
        else{
            $pagenum= $this->data['pagenum'];
        }
        $ApigoodsService=new ApigoodsService();
        $list=$ApigoodsService->doget_pai_member_cur($this->data['gdr_id'],$curpage,$pagenum);
        $where="op.o_state=1 and op.gdr_id=".$this->data['gdr_id'];
        $c=$ApigoodsService->doget_pai_member_cur_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        $pagelist['all']=$c;
        if(!empty($list)){
            $this->response_data($list,$pagelist);
            $pagelist['cur']=$list[0]['gdr_membernum'];
        }
        else{
            $this->response_error("数据为空");
        }
    }
    //读取旧的拍买人
    public function get_pai_member_old(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $ApigoodsService=new ApigoodsService();
        if(empty($this->data['gdr_id']))
        {
            $this->response_error("订单gdr_id不能为空");
        }
        $where="op.gdr_id=".$this->data['gdr_id']." AND op.o_state<>1";
        $fields=" m.m_avatar,m.m_name,op.o_addtime,gdt.gdt_img,gdt.gdt_name";
        $order="op.o_addtime desc";
        if(empty($this->data['curpage']))
        {
            $curpage=1;
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $pagenum=10;
        }
        else{
            $pagenum= $this->data['pagenum'];
        }
        $list=array();
        $list=$ApigoodsService->doget_pai_member_old($where,$fields,$order,$curpage,$pagenum);
        $c=$ApigoodsService->doget_pai_member_old_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        if(!empty($list)){
            $this->response_data($list,$pagelist);
        }
        else{
            $this->response_error("数据为空");
        }

    }
    //读取当前拍买人信息
    public function get_pai_member_cur_all(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['gp_id']))
        {
            $this->response_error("订单gp_id不能为空");
        }
        $ApigoodsService=new ApigoodsService();
        if(empty($this->data['curpage']))
        {
            $curpage=1;
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $pagenum=10;
        }
        else{
            $pagenum= $this->data['pagenum'];
        }
        $list=array();
        $list=$ApigoodsService->doget_pai_member_cur_all($this->data['gp_id'],$curpage,$pagenum);
        $where="op.o_state=1 and op.o_paystate=2 and op.gp_id=".$this->data['gp_id'];
        $c=$ApigoodsService->doget_pai_member_cur_all_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        $pagelist['all']=$c;
        if(!empty($list)){
            $this->response_data($list,$pagelist);
        }
        else{
            $this->response_error("数据为空");
        }
    }
    //读取旧的拍买人
    public function get_pai_member_old_all(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $ApigoodsService=new ApigoodsService();
        if(empty($this->data['gp_id']))
        {
            $this->response_error("订单商品gp_id不能为空");
        }
        $where="op.gp_id=".$this->data['gp_id']." AND op.o_state<>1";
        $fields=" m.m_avatar,m.m_name,op.o_addtime,gdt.gdt_img,gdt.gdt_name";
        $order="op.o_addtime desc";
        if(empty($this->data['curpage']))
        {
            $curpage=1;
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $pagenum=10;
        }
        else{
            $pagenum= $this->data['pagenum'];
        }
        $list=array();
        $list=$ApigoodsService->doget_pai_member_old_all($where,$fields,$order,$curpage,$pagenum);
        $c=$ApigoodsService->doget_pai_member_old_all_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        if(!empty($list)){
            $this->response_data($list,$pagelist);
        }
        else{
            $this->response_error("数据为空");
        }

    }
    //读取收藏的商品
    public function get_goods_collection_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $where="gc.m_id=".$this->data['member_id'];
        $fields="g.g_id,gc.g_time,g.g_name,g.g_img,gp.gp_market_price,MIN(gdr.gdr_price) price";
        $order="gc.g_time desc";
        if(empty($this->data['curpage']))
        {
            $curpage=1;
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $pagenum=10;
        }
        else{
            $pagenum= $this->data['pagenum'];
        }
        $list=array();
        $ApigoodsService=new ApigoodsService();
        $list=$ApigoodsService->doget_goods_collection_list($where,$fields,$order,$curpage,$pagenum);
        $c=$ApigoodsService->doget_goods_collection_list_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        if(!empty($list)){
            $this->response_data($list,$pagelist);
        }
        else{
            $this->response_error("数据为空");
        }
    }
    //读取收藏的商家
    public function get_store_collection_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $where="sc.m_id=".$this->data['member_id'];
        $fields="s.store_id,s.stroe_name,s.store_logo";
        $order="sc.sc_time desc";
        if(empty($this->data['curpage']))
        {
            $curpage=1;
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $pagenum=10;
        }
        else{
            $pagenum= $this->data['pagenum'];
        }
        $list=array();
        $ApigoodsService=new ApigoodsService();
        $list=$ApigoodsService->doget_store_collection_list($where,$fields,$order,$curpage,$pagenum);
        $c=$ApigoodsService->doget_store_collection_list_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        if(!empty($list)){
            $this->response_data($list,$pagelist);
        }
        else{
            $this->response_error("数据为空");
        }
    }
    //是否收藏了商品
    public function is_goods_collection(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        if(empty($this->data['g_id']))
        {
            $this->response_error("商品ID不能为空");
        }
        $ApigoodsService=new ApigoodsService();
        $res=$ApigoodsService->dois_goods_collection($this->data['member_id'],$this->data['g_id']);
        if($res['status']=='1'){
            $this->response_data($res['msg']);
        }
        else{
            $this->response_error($res['msg']);
        }
    }
    //读取一级目录
    public function get_first_category(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $ApigoodsService=new ApigoodsService();
        $res=$ApigoodsService->doget_first_category();
        if($res['status']=='1'){
            $this->response_data($res['data']);
        }
        else{
            $this->response_error($res['msg']);
        }
    }
    //读取目录
   public function get_categroy(){
       $res=$this->checktoken();
       if($res['state']!='1'){
           $this->response_error($res['msg']);
       }
       $ApigoodsService=new ApigoodsService();
       if(empty($this->data['parent_id']))
       {
           $this->response_error("父类ID不能为空");
       }
       if($this->data['parent_id']=='tj'){
           $res=$ApigoodsService->doget_tj_category();
           if($res['status']=='1'){
               $this->response_data($res['data']);
           }
           else{
               $this->response_error($res['msg']);
           }
       }
       else{
           $res=$ApigoodsService->doget_category($this->data['parent_id']);
           if($res['status']=='1'){
               $this->response_data($res['data']);
           }
           else{
               $this->response_error($res['msg']);
           }
       }
   }
    //读取商品目录 2018-11-05获取首页分类
    public function get_goods_categoryty(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApigoodsService=new ApigoodsService();
        $goods_category_list=$ApigoodsService->get_goodscategory();
        //所有分类类型
        $where = [
            'g.g_state'=>6,
            'g.g_endtime'=>['>',time()],
            'gp.gp_stock'=>['>',0],
        ];
        $arr_gc_id = Db::table('pai_goods g')
            ->join('pai_goods_product gp','g.g_id=gp.g_id','left')
            ->where($where)
            ->group('g.gc_id')
            ->column('g.gc_id');
        //剔除三级空分类
        foreach($goods_category_list as $k => $v){
            foreach($v['son1'] as $k2 => $v2){
                foreach($v2['son2'] as $k3 => $v3){
                    if(!in_array($v3['gc_id'],$arr_gc_id)){
                        unset($goods_category_list[$k]['son1'][$k2]['son2'][$k3]);
                    }
                }
            }
        }

        //剔除二级空分类
        foreach($goods_category_list as $k => $v){
            foreach($v['son1'] as $k2 => $v2){
                if(!$v2['son2']){
                    if(!in_array($v2['gc_id'],$arr_gc_id)){
                        unset($goods_category_list[$k]['son1'][$k2]);
                    }
                }
            }
        }
        //剔除一级空分类
        foreach($goods_category_list as $k => $v){
            if(!$v['son1']){
                if(!in_array($v['gc_id'],$arr_gc_id)){
                    unset($goods_category_list[$k]);
                }
            }
        }
        $goods_category_list = array_values($goods_category_list);
        if(!empty($goods_category_list)){
            $this->response_data($goods_category_list);
        }else{
            $this->response_error("数据为空");
        }
    }
    //分类下的商品列表
    public function product_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $gc_id = $data['gc_id'];//分类id
        if(empty($gc_id))
        {
            $this->response_error("分类ID不能为空");
        }
        if(empty($this->data['page']))
        {
            $page=1;
        }
        else{
            $page=$this->data['page'];
        }
        if(empty($this->data['page_size']))
        {
            $page_size=10;
        }
        else{
            $page_size= $this->data['page_size'];
        }
        $goodsCategory = new GoodsCategoryService();
        //当前分类
        $info = $goodsCategory->goodsCategoryInfo(['gc_id'=>$gc_id]);
        $where = [
            'state'=>0,
        ];
        //父ID为0时表示以及分类用gc_id取二级分类
        if($info['parent_id'] == 0){
            $where['parent_id'] = $gc_id;
            $data['parent_id'] =$gc_id;
        }else{
            $where['parent_id'] = $info['parent_id'];
            $data['parent_id'] = $info['parent_id'];
        }
        //二级分类
        $titleAll = $goodsCategory->getCategoryList($where,'gc_id asc','gc_id,gc_name,parent_id',$cache='');
        //删除空二级分类
        $where9 = [
            'g.g_state'=>6,
            'g.g_endtime'=>['>',time()],
            'gp.gp_stock'=>['>',0],
        ];
        $arr_gc_id = Db::table('pai_goods g')
            ->join('pai_goods_product gp','g.g_id=gp.g_id','left')
            ->where($where9)
            ->group('g.gc_id')
            ->column('g.gc_id');
        foreach($titleAll as $k => $v){
            if(!in_array($v['gc_id'],$arr_gc_id)){
                unset($titleAll[$k]);
            }
        }
        $titleAll = array_values($titleAll);
        $data['gc_title'] = $info['gc_name'];
        $data['titleAll'] = $titleAll;
        $data['gc_id'] = $gc_id;

        $goods = new GoodsService();
        if($info['parent_id'] == 0){
            $gc_ids = array_column($titleAll,'gc_id');
            $gc_ids = implode(",",$gc_ids);
            //无二级分类时，查询以及分类
            $gc_ids = empty($gc_ids) ? $gc_id : $gc_ids;
            $where2['g.gc_id'] = ['in',$gc_ids];
        }else{
            $where2['g.gc_id'] = $gc_id;
        }
        $where2['g.g_state'] = 6;
        $where2['g.g_endtime'] = ['>', time()];
        $where2['p.gp_stock'] = ['>',0];
        $list = $goods->goods_category_list($where2,'g.g_id,g.g_name,g.g_img,g.gc_id,p.gp_id,p.gp_market_price,dtr.gdr_id,min(dtr.gdr_price) min_price,max(dtr.gdr_price) max_price','g.g_endtime asc',$page_size,$page);
        $data['list'] = $list;
        $this->response_data($data['list']);

    }
    //目录产品页面
    public function get_category_goods(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['gc_id']))
        {
            $this->response_error("分类ID不能为空");
        }
        $gc_id=$this->data['gc_id'];
        if(empty($this->data['curpage']))
        {
            $page=1;
        }
        else{
          $page=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
           $page_size=10;
        }
        else{
           $page_size= $this->data['pagenum'];
        }
        $goodsCategory = new GoodsCategoryService();
        //当前分类
        $info = $goodsCategory->goodsCategoryInfo(['gc_id'=>$gc_id]);
        $where = [
            'state'=>0,
        ];
        //父ID为0时表示以及分类用gc_id取二级分类
        if($info['parent_id'] == 0){
            $where['parent_id'] = $gc_id;
            $data['parent_id'] =$gc_id;
        }else{
            $where['parent_id'] = $info['parent_id'];
            $data['parent_id'] = $info['parent_id'];
        }
        //二级分类
        $titleAll = $goodsCategory->getCategoryList($where,'gc_id asc','gc_id,gc_name,parent_id',$cache='');
        $data['gc_title'] = $info['gc_name'];
        $data['titleAll'] = $titleAll;
        $data['gc_id'] = $gc_id;
        $goods = new GoodsService();
        if($info['parent_id'] == 0){
            $gc_ids = array_column($titleAll,'gc_id');
            $gc_ids = implode(",",$gc_ids);
            $where2['g.gc_id'] = ['in',$gc_ids];
//            dump($where2);
        }else{
            $where2['g.gc_id'] = $gc_id;
        }
        $list = $goods->goods_category_list($where2,'g.g_id,g.g_name,g.g_img,g.gc_id,p.gp_market_price,dtr.gdr_id,min(dtr.gdr_price) min_price,max(dtr.gdr_price) max_price','g.g_endtime asc',$page_size,$page);
        $data['list'] = $list['list'];
        foreach($data['list'] as $k=>$v){
            $data['list'][$k]['g_img']=CDN_URL.$v['g_img'];
        }
        $page_count=$list['totle_page'];
        $pagelist=$this->app_page($page_count);
        $this->response_data($data,$pagelist);
    }
}
