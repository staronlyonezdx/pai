<?php
namespace app\member\controller;
use app\data\service\config\ConfigService;
use app\data\service\goods\GoodsCollectionService;
use app\data\service\goods\GoodsDtRecordService;
use app\data\service\goods\GoodsHistoryService;
use app\data\service\goods\GoodsService as GoodsService;
use app\data\service\goods\VisitGoodsHistoryService;
use app\data\service\goods\VisitStoreHistoryService;
use app\data\service\goodsProduct\GoodsProductService as GoodsProductService;
use app\data\service\goodsDiscounttype\GoodsDiscounttypeService as GoodsDiscounttypeService;
use app\data\service\orderAwardcode\OrderAwardcodeService;
use app\data\service\orderPai\OrderPaiService;
use app\data\service\popularity\PopularityGoodsService;
use app\data\service\review\ReviewgoodsService;
use app\data\service\review\RevieworderService;
use app\data\service\store\StoreCollectionService;
use app\data\service\store\StoreService;
use RedisCache\RedisCache;
use think\Controller;
use think\Cookie;

class Goodsproduct extends IndexHome
{
    /*
    * 产品详情页
    * 创建人 邓赛赛
    */
    public function index(){
        $m_id = $this->m_id;
        $g_id = input('g_id');
        $where = [
            'g.g_id'=>$g_id,
//            'g.g_state'=>['not in',[1,7]],
        ];
        $redis = RedisCache::getInstance();
        $goods = new GoodsService();
        $goodsData = $goods->get_goods_info($where);
        $goodsData['is_store'] = $m_id == $goodsData['g_mid'] ? 1 : 0;
        //无商品拦截
        if(!$goodsData){
            $this->error('宝宝未找到此商品');
        }
        //拦截非此商品商家
        if($m_id != $goodsData['g_mid']){
            if(in_array($goodsData['g_state'],[1,2,4,5,7])){
                $this->error('此商品不可查看详情');
            }
        }
        //拦截此商品商家
        $where14 = [
            'gp_id'=>$goodsData['gp_id'],
            'oa_state'=>2
        ];
        //成交数量
        $orde_wardcode = new OrderAwardcodeService();
        $nransaction_num = $orde_wardcode->orderAwardcodeCount($where14);

        $goodsData['gp_stock'] = $goodsData['gp_stock']  > 0 ? $goodsData['gp_stock']  : 0;
        if(in_array($goodsData['g_state'],[1,7])){
            $this->error('此商品无详情信息');
        }
        //地址id转换为文字
        $address = [
            'pid'=>$goodsData['pid'],
            'cid'=>$goodsData['cid'],
        ];
        $address = $goods->id_tfm_address($address);
        $address = str_replace(',',' ',$address);
        $orderPai = new OrderPaiService();

        $dt_recor = new GoodsDtRecordService();
        $where3 = [
            'dt.g_id'=>$g_id,
            'd.gdt_money1'=>['<',1000]
        ];
        //获取场次详情信息
        $gdr_list = $dt_recor->get_join_discounttype($where3,'dt.gdr_id,dt.gdr_membernum,dt.gdr_price,d.gdt_name,d.gdt_img,d.gdt_id');
        //场次上方最多四个头像
        $member = array();

        $gdr_lists = array();
        foreach($gdr_list as $k => $v){
            //根据最高期获取评论
            $call_create = $orderPai->createPeriods($v['gdr_id']);
            $max_pai = $call_create['data'];
            $order_where = [
                'o.gp_id'=>$goodsData['gp_id'],
                'o.o_isdelete'=>1,
                'o.o_paystate'=>['>=',2],
                'o.o_periods'=>$max_pai,
                'o.gdr_id'=>$v['gdr_id'],
            ];
            $orderPaiList = $orderPai ->get_json_member($order_where,'o.gdr_id,o.o_id,o.gp_num,o.o_state,o.o_periods,o.o_periods,o.gdr_id,o.gdr_id,o.o_addtime,m.m_id,m.m_name,m.m_avatar,m.m_s_avatar','o.o_id asc','');
            $order = array();
            foreach($orderPaiList as $kk => $vv){
                if(array_filter($vv)){

                    // 名字脱敏(lyh)
                    $s_name = '';
                    if(mb_strlen($vv['m_name'],'utf-8') == 1 ){
                        $s_name = $vv['m_name']."**";
                    }elseif(mb_strlen($vv['m_name'],'utf-8') > 1){
                        $str_first = mb_substr($vv['m_name'],0,1,"utf-8");
                        $str_last = mb_substr($vv['m_name'],-1,1,"utf-8");
                        $s_name = $str_first."**".$str_last;
                    }
                    $vv['s_name'] = $s_name;

                    $order[] = $vv;
                    if(count($member) >= 4){
                        continue;
                    }

                    $member[]=[
                        'm_name'    =>$vv['m_name'],
                        'm_avatar'  =>$vv['m_avatar'],
                        'm_s_avatar'  =>$vv['m_s_avatar']
                    ];
                }
            }
            //评论内容(每场次最高期)
            $gdr_lists[$v['gdr_id']]['member'] = $order;
            //评论数量(每场次最高期)
            $gdr_lists[$v['gdr_id']]['member_num'] = count($order);
            $gdr_lists[$v['gdr_id']]['gdt_img'] = $v['gdt_img'];
            $gdr_lists[$v['gdr_id']]['gdt_name'] = $v['gdt_name'];
            $gdr_lists[$v['gdr_id']]['gdr_price'] = $v['gdr_price'];
            $gdr_lists[$v['gdr_id']]['gdr_id'] = $v['gdr_id'];
            $gdr_lists[$v['gdr_id']]['gdr_membernum'] = $v['gdr_membernum'];
        }
        $order = new OrderPaiService();
        //总参团人数
        $where15=[
            'gp_id'=>$goodsData['gp_id'],
            'o_isdelete'=>1,
            'o_state'=>['>=',1],
            'o_paystate'=>['>=',2]
        ];
        $total = $order->orderPaiInfo($where15,'sum(gp_num) total_people');
        $total_people = empty($total['total_people']) ? 0 : $total['total_people'];

        $section = array_column($gdr_lists,'gdr_price');
        $goodsData['min']= empty($section) ? '' : min($section);
        $goodsData['max']= empty($section) ? '' : max($section);
        $goodsData['address']=$address;
        $store_info = $redis->get('store_info_'.$goodsData['g_storeid']);
        //redis获取店铺信息保存到晚上12点
        if($store_info){
            $store_info = json_decode($store_info,true);
        }else{
            //店铺评分和物流评分
            $where8=['store_id'=>$goodsData['g_storeid']];
            $store = new StoreService();
            $store_info = $store ->storeInfo($where8,'store_id,stroe_name,store_logo,s_score,e_score,g_score');
            //全部商品数量
            $store = new StoreService();
            $where4 = [
                'g.g_state'=>6,
                'g.g_storeid'=>$goodsData['g_storeid'],
                'g.g_endtime'=>['>',time()],
            ];
            $store_info['totle_goods'] = $store->store_goods_count($where4);

            $config = new ConfigService();
            $where5 = [
                'c_code'=>'show_new',
                'c_state'=>0
            ];
            $c_value = $config->configInfo($where5,'c_value');
            $c_value = empty($c_value['c_value']) ? 7*86400 : $c_value['c_value']*86400;
            $time = time()-$c_value;
            $where6 = [
                'g.g_state'=>6,
                'g.g_starttime'=>['>',$time],
                'g.g_storeid'=>$goodsData['g_storeid'],
            ];
            //新品数量
            $store_info['new_goods'] = $store->store_goods_count($where6);
            //粉丝数
            $collection = new StoreCollectionService();
            $where6 = [
                'store_id'=>$goodsData['g_storeid']
            ];
            $store_info['fans'] = $collection->get_count($where6);
            $redis_store_time = strtotime(date('Y-m-d').' 23:59:59') - time();
            $redis->set('store_info_'.$goodsData['g_storeid'],json_encode($store_info),$redis_store_time);
        }
        //评论信息
        $comment = $redis->get('comment_'.$goodsData['gp_id']);
        if($comment){
            $comment = json_decode($comment,true);
        }else{
            $comment = $this->order_comment($goodsData['gp_id'],1,3);
            $redis->set('comment_'.$goodsData['gp_id'],json_encode($comment),600);
        }
        //本商品底部推荐商品 缓存十分钟
        $tj_list = $redis -> get('goods_promoters_tj_list'.$g_id);
        if($tj_list){
            $tj_list = json_decode($tj_list,true);
        }else{
            $where11=[
                'g.gc_id'=>$goodsData['gc_id'],
                'g.g_storeid'=>$goodsData['g_storeid'],
                'g.g_state'=>6,
                'g.g_id'=>['<>',$g_id],
                'g.g_endtime'=>['>',time()],
                'gp.gp_stock'=>['>',0],
                'gp.gp_type' => 1
            ];

            $tj_list = $goods->get_tj_list($where11,$order='g.g_id desc',$field="g.g_id,g.g_name,g.g_img,g.g_s_img,g.g_s_img,g.gc_id");
            $redis -> set('goods_promoters_tj_list'.$g_id,json_encode($tj_list),600);
        }
        //足迹信息
        if($m_id){
            //商品收藏(登录时查询是否已经收藏)
            $collection = $redis->get('goods_collection_'.$m_id.'_'.$g_id);
            //为收藏或未保存redis
            if($collection == false){
                $goodsCollection = new GoodsCollectionService();
                $where10=[
                    'g_id'=>$g_id,
                    'm_id'=>$m_id,
                ];
                $is_collection = $goodsCollection->collectionInfo($where10,'gc_id');
                //已收藏
                if($is_collection){
                    //保存redis正确状态
                    $redis->set('goods_collection_'.$m_id.'_'.$g_id,1);
                    //由此值表示收藏
                    $is_collection['gc_id'] = 1;
                    $this->assign('is_collection',$is_collection);
                }else{
                    //未收藏，保存错误redis收藏状态
                    $redis->set('goods_collection_'.$m_id.'_'.$g_id,2);
                }
            }else if($collection == 1){
                //正确的redis状态直接返回前端，表示收藏
                $is_collection['gc_id'] = 1;
                $this->assign('is_collection',$is_collection);
            }
            $startTime = strtotime(date("Y-m-d"));
            if($m_id != $goodsData['g_mid']){
                //我的商品足迹
                //商品足迹是否已经保存redis
                $is_visit_goods = $redis->get('visit_goods_history_'.$m_id.'_'.$g_id);
                $redis_visit_time = $startTime+86400 - time();
                //无足迹redis时
                if(!$is_visit_goods){
                    $visit_goods = new VisitGoodsHistoryService();
                    $where12 = [
                        'g_id'=>$g_id,
                        'visit_time'=>['between time',[$startTime,$startTime+86400]],
                        'm_id'=>$m_id,
                    ];

                    $num = $visit_goods->get_count($where12);
                    //无足迹redis时又无数据记录时
                    if(!$num){
                        $data=[
                            'g_id'=>$g_id,
                            'visit_time'=>time(),
                            'm_id'=>$m_id,
                        ];
                        $res = $visit_goods->get_add($data);
                        if($res){
                            $redis->set('visit_goods_history_'.$m_id.'_'.$g_id,1,$redis_visit_time);
                        }
                    }else{
                        $redis->set('visit_goods_history_'.$m_id.'_'.$g_id,1,$redis_visit_time);
                    }
                }
                //店铺足迹是否已经保存redis
                $is_store_goods = $redis->get('visit_goods_history_'.$m_id.'_'.$goodsData['g_storeid']);
                //无店铺足迹redis时
                if(!$is_store_goods){
                    //店铺足迹
                    $visit_store = new VisitStoreHistoryService();
                    $where13 = [
                        'store_id'=>$goodsData['g_storeid'],
                        'visit_time'=>['between time',[$startTime,$startTime+86400]],
                        'm_id'=>$m_id,
                    ];
                    $num1 = $visit_store->get_count($where13);
                    //无店铺足迹数据是
                    if(!$num1){
                        $data = [
                            'store_id'=>$goodsData['g_storeid'],
                            'visit_time'=>time(),
                            'm_id'=>$m_id,
                        ];
                        $res = $visit_store->get_add($data);
                        if($res){
                            //添加成功数据是保存redis
                            $redis->set('visit_goods_history_'.$m_id.'_'.$goodsData['g_storeid'],1,$redis_visit_time);
                        }
                    }else{
                        //有数据无redis时
                        $redis->set('visit_goods_history_'.$m_id.'_'.$goodsData['g_storeid'],1,$redis_visit_time);
                    }
                }
            }
        }

        // 当前最多能团的件数(刘勇豪)
        $orderPai = new OrderPaiService();
        $max_pai_num = 0;
        if($m_id){
            $back = $orderPai->get_max_pai_num($m_id, $goodsData['gp_id']);
            $max_pai_num = $back['data'];
        }
        if(!empty($gdr_lists)){
            foreach($gdr_lists as $kk=>$vv){
                $gdr_id = $vv['gdr_id'];
                $gdr_membernum = $vv['gdr_membernum'];
                $call_create = $orderPai->createPeriods($gdr_id);
                if(!$call_create['status']){
                    return $call_create['msg'];
                }
                $maxPeriods = $call_create['data'];//当前第几期在团
                $where_award['gdr_id'] = $gdr_id;
                $where_award['o_periods'] = $maxPeriods;
                $pai_num = $orderPai->countPaiNum($where_award);// 已团数量
                $left_num = $gdr_membernum - $pai_num;
                $gdr_lists[$kk]['left_num'] = $left_num;
                $gdr_lists[$kk]['pai_periods'] = $maxPeriods;
                $gdr_lists[$kk]['gp_num'] = $pai_num;
                $gdr_lists[$kk]['left_num'] = $left_num;
                //参团率
                $proportion = $pai_num/$gdr_membernum*100;
                if($proportion < 99){
                    $gdr_lists[$kk]['proportion'] = ceil($proportion);
                }else{
                    $gdr_lists[$kk]['proportion'] = floor($proportion);
                }
            }
        }
        $o_id = input('param.o_id');
        if($o_id){
            $this->assign('header_path','/index/index/index');
        }
//        echo 1;
        //详情二维码
        $p_goods = new PopularityGoodsService();
        $mid = 2;
        $path_3 = '/uploads/code/popularity/shop/'.$mid.'code_'.$g_id.".jpg";
        $goodsData['code']  = $p_goods->hebingImg('/uploads/logo/father.png',$goodsData['g_img'],$path_3,$goodsData['g_name'],$goodsData['min'],$mid,$g_id);
        $goodsData['url']   = PAI_URL."/member/goodsproduct/index/g_id/".$goodsData['g_id'].'?share=1';

        $this->assign([
            'gdr_list'          =>$gdr_lists,
            'tj_list'          =>$tj_list,
            'goods'             =>$goodsData,
            'total_people'      =>$total_people,
            'nransaction_num'   =>$nransaction_num,
            'member'            =>$member,
            'store_info'        =>$store_info,
            'comment'          =>$comment,
            'max_pai_num'      =>$max_pai_num,
            'm_id'             =>$m_id,
            'time'             =>time(),
        ]);
//        dump(htmlspecialchars($goodsData['g_description']));die;
        //分享参数
        $this->assign('share_title','只要¥'.$goodsData['min'].'，你敢信？快跟我一起来抢购吧！');
        $this->assign('share_desc',$goodsData['g_name']);
        $this->assign('share_link','https://m.paiyy.com.cn/member/goodsproduct/index/g_id/'.$g_id.'?share=1');
        $this->assign('share_imgUrl','https://m.paiyy.com.cn'.$goodsData['g_img']);
        return $this->fetch();
    }

    /**
     * 规则页面
     * 邓赛赛
     */
    public function rule(){
        return view();
    }

    /**
     * 花生规则页面
     * 刘勇豪
     * http://www.pai.com/member/goodsproduct/peanut_rule
     */
    public function peanut_rule(){

        $this->assign('header_title','花生堂规则');
        return view();
    }
    /**
     * 查看全部订单信息
     * 邓赛赛
     */
    public function comment_list(){
        $gp_id = input('param.gp_id');
        $page = input('param.page') ? input('param.page') : 1;
        $page_size = input('param.page_size') ? input('param.page_size') : 20;
        $list = $this->order_comment($gp_id,$page,$page_size);
//        dump($list);die;
        if(request()->isAjax()){
            return $list;
        }
        $this->assign('list',$list);
        $this->assign('gp_id',$gp_id);
        $this->assign('header_title','商品评论');
        return $this->fetch();
    }
    /**
     * 获取订单评论信息
     * 邓赛赛
     */
    public function order_comment($gp_id,$page,$page_size){
        if(!$gp_id){
            return false;
        }
        $where16 = [
            'op.gp_id'=>$gp_id,
            'op.o_state'=>['in','2,3,4,5'],
        ];
        $order_pai = new OrderPaiService();
        $field='op.o_id,op.gp_id,op.o_paytime,op.gdr_id,op.o_periods,op.gp_num,op.o_publishtime,ro.service_score,ro.logistics_score,rg.rg_showname,rg.goods_score,rg.rg_id,rg.rg_content,m.m_name,m.m_avatar,m.m_s_avatar,ro.add_time,gdt.gdt_name';
        $list = $order_pai->order_suc($where16,'o_id asc',$field,$page,$page_size);

//        if(!$gp_id){
//            return false;
//        }
//        $where = [
//            'rg.gp_id'=>$gp_id,
//        ];
//        $page = empty($page) ? 1 : $page;
//        $offset = ($page-1)*$page_size;
//        $limit = "$offset,$page_size";
//        $reviewor = new RevieworderService();
//        $field='s.s_score,ro.service_score,ro.logistics_score,rg.rg_showname,rg.goods_score,rg.rg_id,rg.rg_content,m.m_name,m.m_avatar,ro.add_time';
//        $list['list'] = $reviewor->reviewOrderDetailLimitList($where,'rg.rg_id desc',$field,$limit);
////        return $list['list'];
//        $review = new ReviewgoodsService();
//        $where = [
//            'gp_id'=>$gp_id,
//        ];
//        $total_num = $review->reviewGoodsCount($where);
//        $total_page = ceil($total_num/$page_size);
//        $list['page'] = $page;
//        $list['page_size'] = $page_size;
//        $new_num = count($list['list']);
//        $list['new_num'] = $new_num;
//        $list['total_num'] = $total_num;
//        $list['total_page'] = $total_page;

        return $list;
    }
    /**
     * 设置商品库存
     * 邓赛赛
     */
    public function set_stock(){
        $where['g_id'] = input('post.g_id');
        $data['gp_stock'] = input('post.gp_stock');
        $product = new GoodsProductService();
        $res = $product->goodsProductSetField($where,$data);
        if($res){
            return ['status'=>1,'msg'=>'修改成功'];
        }else{
            return ['status'=>0,'msg'=>'修改失败'];
        }
    }
    /*
    * 生成请求链接
    * 创建人 刘勇豪
    */
    public function rewriteUrl(){
        $data['num'] = input('param.num');
        $data['gp_id'] = input('param.gp_id');
        $data['gdr_id'] = input('param.gdr_id');
        $data['gs_id'] = input('param.gs_id');

        // 判断能不能参团
        $where['gp.gp_id']=$data['gp_id'];
        $goods = new GoodsService();
        $goods_info = $goods->goods_info($where,"g.g_starttime,g.g_endtime");
        $g_starttime = $goods_info['g_starttime'];
        $g_endtime = $goods_info['g_endtime'];
        $now_time = time();

        if( $now_time < $g_starttime){
            return ['status'=>0,'msg'=>'活动还没开始哦~'];
        }
        if( $now_time > $g_endtime){
            return ['status'=>0,'msg'=>'活动已经结束了哦~'];
        }

        // 判断是不是自己的商品
        $m_id = 0;
        if($this->m_id){
            $m_id = $this->m_id;
        }
        $orderPai = new OrderPaiService();
        $callback = $orderPai->is_my_goods($data['gp_id'],$m_id);
        if(!$callback['status']){
            return ['status' => 0, 'msg' => $callback['msg']];
        }

        if(!$data['num']){
            return ['status'=>0,'msg'=>'未选择商品！'];
        }
        // 判断剩余购买次数
        $call_back = $orderPai->get_max_pai_num_bygdrid($m_id,$data['gdr_id']);
        if(!$call_back['status']){
            return ['status'=>0,'msg'=>$call_back['msg']];
        }
        $left_max_pai_num = $call_back['data']['left_max_pai_num'];
        if(!$left_max_pai_num){
            return ['status'=>0,'msg'=>'当前折扣参拍次数已用完！','data'=>$call_back['data']];
        }

        if(!$data['gp_id'] || !$data['gdr_id']){
            return ['status'=>0,'msg'=>'参数非法！'];
        }

        $goodsProduct = new GoodsProductService();
        $json_data = json_encode($data);
        $encrypt = $goodsProduct->encrypt($json_data);
        return ['status'=>1,'msg'=>'success！','data'=>$encrypt];
    }

    /**
     * 获取商品折扣下用户最大的参团数量（现在已改成只限制本期的了）
     * 刘勇豪
     * @param $gdr_id
     * @return array
     */
    public function get_max_pai_num_bygdrid($gdr_id){
        $m_id = 0;
        if($this->m_id){
            $m_id = $this->m_id;
        }
        $orderpai = new OrderPaiService();
        $call_back = $orderpai->get_max_pai_num_bygdrid($m_id,$gdr_id);
        return $call_back;
    }

    /**
     * 福袋活动规则
     *
     */
    public function fudai_rule(){
        $this->assign('header_title','福袋活动规则');
        return view();
    }

    /**
     * 花生会场
     * 刘勇豪
     * @return \think\response\View
     * http://www.pai.com/member/goodsproduct/peanut_goods
     */
    public function peanut_goods(){

        $this->assign('header_title','花生会场');
        return view();
    }

    /**
     * 超值购规则页面
     * 刘勇豪
     * http://www.pai.com/member/goodsproduct/chaozhi_rule
     */
    public function chaozhi_rule(){
        return view();
    }
}
