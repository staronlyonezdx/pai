<?php
namespace app\api\controller;
use RedisCache\RedisCache;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\goods\GoodsService;
use app\data\service\store\StoreService;
use app\data\service\webImagesType\WebImagesTypeService;
use app\member\controller\IndexHome;
use app\data\service\store\StoreCollectionService;


class Home extends ApiIndex
{

    //读取首页信息
    public function get_index()
    {
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
            die;
        }
        if (empty($this->data['wi_type'])) {
            $wi_type =1;
        }
        else{
            $wi_type=$this->data['wi_type'];
        }
        $wit = new WebImagesTypeService();
        $where_sydh = [
            'wi.wi_type'=>$wi_type,
            'wi.wi_state'=>0,
            'wit.wit_code'=>'sydh',
        ];
        //分类图片(轮播图/广告/导航)
        $redis = RedisCache::getInstance(1);//2018-11-04判断是否存入redis
        $sydh_img = $redis->get('wi_imgurl');
        if($sydh_img){
            $sydh_img = json_decode($sydh_img,true);
        }else{
            $sydh_img = $wit->get_web_img($where_sydh,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href,wi.wi_linktype,wi.wi_linkid,wi.wi_linkcontent');
            if(!empty($sydh_img)){
                foreach($sydh_img as $k1=>$v1){
                    $sydh_img[$k1]['wi_imgurl']=CDN_URL.$v1['wi_imgurl'];
                    if(!empty($sydh_img[$k1]['wi_href'])){
                        $sydh_img[$k1]['status'] = 1;
                    }else{
                        $sydh_img[$k1]['status'] = 0;
                    }
                    if($sydh_img[$k1]['wi_name'] == "晟域会员"){
                        $sydh_img[$k1]['status'] = 1;
                        $sydh_img[$k1]['wi_href'] = "/index/syuclub/index";
                    }
                    switch ($k1){
                        case 0:
                            $sydh_img[$k1]['need_login'] = 1;
                            break;
                        case 1:
                            $sydh_img[$k1]['need_login'] = 0;
                            break;
                        case 2:
                            $sydh_img[$k1]['need_login'] = 1;
                            break;
                        case 3:
                            $sydh_img[$k1]['need_login'] = 0;
                            break;
                        case 4:
                            $sydh_img[$k1]['need_login'] = 1;
                            break;
                        case 5:
                            $sydh_img[$k1]['need_login'] = 0;
                            break;
                        case 6:
                            $sydh_img[$k1]['need_login'] = 0;
                            break;
                        case 7:
                            $sydh_img[$k1]['need_login'] = 0;
                            break;
                        case 8:
                            $sydh_img[$k1]['need_login'] = 0;
                            break;
                        case 9:
                            $sydh_img[$k1]['need_login'] = 0;
                            break;
                    }
                }
            }
            $redis->set('wi_imgurl',json_encode($sydh_img),600);
        }
        $hd_img = $redis->get('hd_img');
        if($hd_img){
            $hd_img = json_decode($hd_img,true);
        }else{
            $where_hd = [
                'wi.wi_type'=>1,
                'wi.wi_state'=>0,
                'wit.wit_code'=>'hd',
            ];
            //分类图片(轮播图/广告/导航)
            $hd_img = $wit->get_web_img($where_hd,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href,wi.wi_linktype,wi.wi_linkid,wi.wi_linkcontent');
            if(!empty($hd_img)){
                foreach($hd_img as $k2=>$v2){
                    $hd_img[$k2]['wi_imgurl']=CDN_URL.$v2['wi_imgurl'];
                }
            }
            $redis->set('hd_img',json_encode($hd_img),600);
        }
        $ad_img = $redis->get('ad_img');
        if($ad_img){
            $ad_img = json_decode($ad_img,true);
        }else{
            $where_ad = [
                'wi.wi_type'=>1,
                'wi.wi_state'=>0,
                'wit.wit_code'=>'syad',
            ];
            //分类图片(轮播图/广告/导航)
            $ad_img = $wit->get_web_img($where_ad,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href,wi.wi_linktype,wi.wi_linkid,wi.wi_linkcontent');
            if(!empty($ad_img)){
                foreach($ad_img as $kad=>$vad){
                    $ad_img[$kad]['wi_imgurl']=CDN_URL. $vad['wi_imgurl'];
                }
            }
            $redis->set('ad_img',json_encode($ad_img),300);
        }
        $data=array();
        $data['hd']=$hd_img;
        $data['sydh']=$sydh_img;
        $data['ad']=$ad_img;
        $this->response_data($data);
    }
    //得到热卖商品
    public function goods_hot(){
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size = 6;
        } else {
            $page_size = $this->data['pagenum'];
        }
        $goods = new GoodsService();
        //热拍
        $heat = $goods->get_heat_list('g.g_addtime desc',$page,$page_size);
        $data=$heat['list'];
        if(!empty($data)){
            foreach($data as $k=>$v){
                $data[$k]['g_img']=CDN_URL.$v['g_img'];
                $data[$k]['url'] = PAIYAYA_URL."/member/goodsproduct/index/g_id/".$data[$k]['g_id'];
            }
        }
        $page_count =$heat['total_page'];
        $pagelist=$this->app_page($page_count);
        $this->response_data($data,$pagelist);
    }
    //得到场次商品
    public function cc_products_list(){
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size = 6;
        } else {
            $page_size = $this->data['pagenum'];
        }
        if (empty($this->data['min_money'])) {
            $min_money = 1;
        } else {
            $min_money = $this->data['min_money'];
        }
        if (empty($this->data['max_money'])) {
            $max_money = 1;
        } else {
            $max_money = $this->data['max_money'];
        }
        $goods = new GoodsService();
        $list = $goods->top_two_list($min_money,$max_money,$page);
        foreach($list['list'] as $k => $v){
            $v['gp_num'] = isset($v['gp_num']) ? $v['gp_num'] : 0;
            $list['list'][$k] = $v;
        }
        $data=array();
        $data=$list['list'];
        foreach($data as $k=>$v){
            $data[$k]['g_img']=CDN_URL. $data[$k]['g_img'];
        }
        $page_count =$list['total_page'];
        $pagelist=$this->app_page($page_count);
        $this->response_data($data,$pagelist);
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
        if(!empty($m_id)) {
            if ((int)$m_id) {
                $where3 = [
                    'm_id' => $m_id,
                    'store_id' => $g_storeid,
                ];
                $store_info['is_collection'] = $collection->get_count($where3) ? 1 : 2;

            }
            $store_info['is_login'] = (int)$m_id ? 1 : 0 ;
        }

        $data=array();
        $data['list']=$list['list'];
        $data['store_info']=$store_info;
        $page_count=$list['totle_page'];
        $pagelist=$this->app_page($page_count);
        $this->response_data($data,$pagelist);
    }



}
