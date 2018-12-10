<?php
namespace app\business\controller;
use app\data\service\goods\GoodsService;
use app\data\service\goodsCategory\GoodsCategoryService;
use app\data\service\goodsDiscounttype\GoodsDiscounttypeService;
use app\data\service\goodsImgs\GoodsImgsService;
use app\data\service\goodsProduct\GoodsProductService;
use app\data\service\goodsSpec\GoodsSpecService;
use app\data\service\region\RegionService;
use app\data\service\store\StoreService;
use RedisCache\RedisCache;
use think\Db;

class Goods extends MemberHome
{
    /**
     * 商品列表
     * 邓赛赛
     */
    public function goods_list(){
        $m_id = $this->m_id;
        $goods = new GoodsService();
        $g_state = input('param.g_state',0);
        $g_state = $g_state ?  $g_state : 0;
        $where['g.g_state'] = $g_state ?  $g_state : 0;
        $gp_sn = input('param.gp_sn');
        $type = input('param.type',1);
        switch ($where['g.g_state']) {
            case 0:             //全部
                $where['g.g_state'] =['in', [1, 2, 4, 6, 7, 8]] ;
                $where['p.gp_stock'] = ['>',0];
                break;
            case 1:             //竞拍中
                $where['g.g_state'] = 6;
                $where['p.gp_stock'] = ['>',0];
                break;
            case 2:             //草稿
                $where['g.g_state'] = ['in', [1, 7]];
                break;
            case 3:             //审核中
                $where['g.g_state'] = 2;
                break;
            case 4:             //已失败
                $where['g.g_state'] = ['in', [4, 8, 9]];
                break;
            default:
                $where['g.g_state'] =['in', [1, 2, 4, 6, 7, 8]] ;
                $where['p.gp_stock'] = ['>',0];
                break;
        }
        //搜索字段
        if($gp_sn){
            $where = [
                'g.g_id|p.gp_sn|g.g_name'=>['like','%'.$gp_sn.'%']
            ];
        }
        //商品类型 1普通 2福袋 3 活动
        switch ($type) {
            case 1:
                $where['p.is_huodong']  = 2;
                $where['p.is_fudai']    = 2;
                break;
            case 2:
                $where['p.is_fudai']    = 1;
                $where['p.is_huodong']  = 2;
                break;
            case 3:
                $where['p.is_huodong']  = 1;
                $where['p.is_fudai']    = 2;
                break;
            default:
                $where['p.is_huodong']  = 2;
                $where['p.is_fudai']    = 2;
                break;
        }
        $where['g.g_mid'] = $m_id;
        $field = "g.g_img,g.g_name,g.g_id,g.g_state,g.g_starttime,g.g_endtime,g.is_heat,g.is_top,g.is_tj,p.gp_stock,p.gp_market_price,p.gp_settlement_price,p.gp_sn,p.gp_id,gp_sale_price,min(dtr.gdr_price)min_gdr_price,max(dtr.gdr_price)max_gdr_price,g.g_type";
        $list = $goods->admin_goods_list($where, $field, 'g.g_addtime desc');
        $store = new StoreService();
        $deposit = $store->get_value(['m_id'=>$m_id],'deposit');
        $total_money = 0;
        $total_num = $list->total();
        $page = $list->render();
        $data = array();
        foreach($list as $k => $v){
            $data[$k] = $v;
            if($v["g_state"] == 1){
                $gp_settlement_price = $v['gp_settlement_price'];
                switch($gp_settlement_price){
                    case $gp_settlement_price <= 1000:
                        $total_money = 1000;
                        break;
                    case $gp_settlement_price > 1000 && $gp_settlement_price<= 10000:
                        $total_money = 5000;
                        break;
                    case $gp_settlement_price > 10000:
                        $total_money = 10000;
                        break;
                }
                if($total_money-$deposit > 0){
                    $data[$k]['deposit'] = sprintf('%.2f',$total_money-$deposit);
                }else{
                    $data[$k]['deposit'] = sprintf('%.2f',0);;
                }

            }
        }

        $this->assign(['list' => $list, 'g_state' => $g_state]);
        $this->assign(['total_num' => $total_num, 'page' => $page,'gp_sn'=>$gp_sn]);
        $this->assign('type',$type);
        return $this->fetch();
    }

	/**
	* 商品发布
     * 邓赛赛
	*/
    public function add_goods()
    {

        $type = input('param.type',1);
        $m_id = $this->m_id;
        $store = new StoreService();
        $goods = new GoodsService();
        if (request()->isPost()) {                                  //发布商品
            $data = input('post.');
            $g_starttime = input('post.g_starttime');
            $g_endtime   = input('post.g_endtime');

            $pid = input('param.pid');
            $cid = input('param.cid');
            $aid = input('param.aid');
            $data['pid'] = trim($pid.','.$cid.','.$aid,',');
            $data['g_starttime'] = empty($g_starttime)  ?    time() : strtotime($g_starttime);
            $data['g_endtime']   = empty($g_endtime)    ?    $data['g_starttime']+86400*30 : strtotime($g_endtime);
            //是否为福袋商品
            if(!empty($data['is_fudai']) && $data['is_fudai'] == 1){
                //是否为上架状态
                if(!empty($data['gp_state']) && $data['gp_state'] == 1){
                    $res = $this->check_gp_state($data['g_starttime']);
                    if($res['status'] != 1){
                        return $res;
                    }
                }
            }
            if(!empty($data['cancel'])){                            //保存商品时直接插入
                $res = $goods->add_goods($data, $m_id,7);
                return $res;
            }
            $check = $goods->check_goods($data);                    //验证发布商品
            if($check){
                return $check;
            }
            $res = $goods->add_goods($data, $m_id);
            return $res;
        }

        //商品分类
        $address = $this->address(0);
        $category = $this->category();
        //商家类型
        $store_type = $store->get_value(['m_id' => $m_id],'store_type');

        //商品类型(特殊属性如：大宗、实物、虚拟)
        $goods_spec = new GoodsSpecService();
        $specWhere['gs_state'] = 0;
        if($store_type==2){
            $specWhere['gs_store_type'] =2;
        }
        $spec = $goods_spec->goodsSpecList($specWhere);

        //玩法数组列表
        $where = [
            'state'=>1,
        ];
        $play_type = $this->play_type($where);

        $this->assign(['category1'=>$category,'address'=>$address,'spec'=>$spec]);
        //发布商品类型(1普通 2活动 3福袋)
        $this->assign('type',$type);
        $this->assign('play_type',$play_type);
        return view();
    }

    /**
     * 发布福袋商品价格是否已有上架商品
     * 邓赛赛
     */
    public function check_gp_state($g_starttime,$g_id=''){
        $starttime = date("Y-m-d",$g_starttime);
        $endtime = $starttime.' 23:59:59';
        $where = [
            'g.g_starttime'=>['between time',[$starttime,$endtime]],
            'p.gp_state'=>1,
            'p.is_fudai'=>1,
        ];
        if($g_id){
            $is_goods = Db('goods')->where('g_id',$g_id)->count();
            if($is_goods){
                $where['g.g_id'] = ['<>',$g_id];
            }
        }
        $is_existence = Db('goods')->alias('g')->join('pai_goods_product p','g.g_id = p.g_id','left')->where($where)->count();
        if($is_existence){
            return ['status'=>0,'msg'=>'福袋每日只可有一个上架商品'];
        }else{
            return ['status'=>1,'msg'=>'ok'];
        }
    }

    /**
     * 继续编辑商品(继续中和未通过)
     * 邓赛赛
     */
    public function reedit()
    {
        $m_id = $this->m_id;
        $g_id = input('param.g_id');
        $goods = new GoodsService();
        $where = [
            'g_mid' => $m_id,
            'g.g_id' => $g_id,
        ];

        $info = $goods->get_goods_info($where, ['g.g_id' => $g_id, "g.*,gp.*"]);            //商品详情
        $array = [2,4,7,8,9];
        if(!in_array($info['g_state'],$array)){
            $this->error('此商品类型不可修改');
        }
        $store = new StoreService();
        if (request()->isPost()) {
            $data = input('post.');
            $pid = input('param.pid');
            $cid = input('param.cid');
            $aid = input('param.aid');
            $data['pid'] = trim($pid.','.$cid.','.$aid,',');

            $goods = new GoodsService();
            //再次保存时
            $g_state = 7;
            //在此编辑时
            if(empty($data['cancel'])){

                $g_endtime = input('post.g_endtime');
                $g_starttime = input('post.g_starttime');
                //转化时间戳做验证使用
                $data['g_starttime'] = empty($g_starttime)  ?    time() : strtotime($g_starttime);
                $data['g_endtime']   = empty($g_endtime)    ?    $data['g_starttime']+86400*30 : strtotime($g_endtime);
                $check = $goods->check_goods($data);
                if($check){
                    if($info['g_img']){
                        if($check['msg'] != '商品图片不能为空'){
                            return $check;
                        }
                    }else{
                        return $check;
                    }
                }
                //是否为福袋商品
                if(!empty($data['is_fudai']) && $data['is_fudai'] == 1){
                    //是否为上架状态
                    if(!empty($data['gp_state']) && $data['gp_state'] == 1){
                        $res = $this->check_gp_state($data['g_starttime'],$data['g_id']);
                        if($res['status'] != 1){
                            return $res;
                        }
                    }
                }
            }
            $where = ['m_id' => $m_id];
            $res = $goods->continue_edit($data, $where,2);
            return $res;
        }

        $goods_spec = new GoodsSpecService();                                           //商品类型(属性表)
        $spec = $goods_spec->goodsSpecList(['gs_state' => 0]);
        $goods_category = new GoodsCategoryService();
       $category1 = $this->category(0);                        //店铺一级分类
        if(!empty($info["gp_market_price"])){                                           //展示折扣信息
            $info['dt_record'] = $goods->discount($info['gp_market_price'],'*',$g_id,$info['play_type']);
        }
        //地址列表
        $region = new RegionService();
        $region_list = $region->regionList();

        //关联父级gc_id
        $str_gc_id = $info['gc_id'];
        $gc_id = $info['gc_id'];
        while($gc_id){
            $where = [
                'gc_id'=>$gc_id
            ];
            $gc_id = $goods_category->getValue($where,'parent_id');
            if(!$gc_id){
                continue;
            }
            $str_gc_id = $gc_id.','.$str_gc_id;
        }
        $info['str_gc_id'] = explode(',',$str_gc_id);
        $store_type = $store->get_value(['m_id'=>$m_id],'store_type');
        //商品信息、 商品特殊属性、商家类型、商品状态
        $info['g_starttime']    = $info['g_starttime'] ? date('Y-m-d H:i',$info['g_starttime']) : 0;
        $info['g_endtime']      = $info['g_endtime']   ? date('Y-m-d H:i',$info['g_endtime'])   : 0;
//        dump($info);die;
        $this->assign(['info' => $info, 'spec' => $spec,'store_type'=>$store_type]);
        //1普通商品 2福袋商品 3活动商品
        $type = 1;
        if($info['is_fudai'] == 1){
            $type = 2;
        }
        if($info['is_huodong'] == 1){
            $type = 3;
        }
        $this->assign('type',$type);
        //所有地址列表
        $this->assign('region_list',$region_list);

        //省份地址
        $address = $this->address();
        $this->assign('address',$address);

        //玩法数组列表
        $where = [
            'state'=>1,
        ];
        $play_type = $this->play_type($where);
        $this->assign('play_type',$play_type);

        //调用指定分类列表
        if(!empty($info['str_gc_id'][0])){
            $category2 = $this->category($info['str_gc_id'][0]);
        }else{
            $category2 = array();
        }
        if(!empty($info['str_gc_id'][1])){
            $category3 = $this->category($info['str_gc_id'][1]);
        }else{
            $category3 = array();
        }

        //一级分类
        $this->assign('category1',$category1);
        //二级分类
        $this->assign('category2',$category2);
//        三级分类
        $this->assign('category3',$category3);
        return $this->fetch('goods/add_goods');
    }

    /**
     * 取消发布商品
     * 邓赛赛
     */
    public function cancel()
    {
        $where = [
            'g_id' => input('post.g_id'),
            'g_mid' => $this->m_id,
        ];
        $update = [
            'g_state' => 5
        ];
        $goods = new GoodsService();
        $res = $goods->cancelShop($where, $update);
        if ($res) {
            return ['status' => 1, 'msg' => '取消发布成功'];
        } else {
            return ['status' => 0, 'msg' => '取消发布失败'];
        }
    }
    /**
     * @return mixed
     * 删除图片
     * 邓赛赛
     */
    public function delete_img()
    {
        $data = input('post.');
        $where = [
            'gi_id' => $data['gi_id'],
            'g_id' => $data['g_id']
        ];
        $goods = new GoodsImgsService();
        $res = $goods->del_goods_img($where);
        return $res;
    }
    /**
     * @return array
     * 修改库存
     * 邓赛赛
     */
    public function set_stock(){
        $where['g_id'] = input('post.g_id');
        $data['gp_stock'] = input('post.gp_stock/d');
        $product = new GoodsProductService();
        $res = $product->goodsProductSetField($where,$data);
        if($res){
            return ['status'=>1,'msg'=>'修改成功','data'=>$data];
        }else{
            return ['status'=>0,'msg'=>'修改失败'];
        }
    }

    /**
     * 设置热拍、推荐、置顶
     * 邓赛赛
     */
    public function set_goods(){
        $where['g_id'] = input('post.g_id');
        $where['g_mid'] = $this->m_id;
        $data['is_heat'] = input('post.is_heat/d');
        $data['is_top'] = input('post.is_top/d');
        $data['is_tj'] = input('post.is_tj/d');
        if( $data['is_heat'] === null){
            unset( $data['is_heat']);
        }
        if( $data['is_top'] === null){
            unset( $data['is_top']);
        }
        if( $data['is_tj'] === null){
            unset( $data['is_tj']);
        }
        $goods = new GoodsService();
        $res = $goods->get_save($where,$data);
        if($res){
            //删除首页精品推荐
            $redis = RedisCache::getInstance();
            $redis->del('first_heat');
            return ['status'=>1,'msg'=>'修改成功','data'=>$data];
        }else{
            return ['status'=>0,'msg'=>'修改失败'];
        }
    }

    /**
     * 获取地址
     * 邓赛赛
     */
    public function address($region_code=0){
        $region_code = input('param.region_code');
        $regon = new RegionService();
        if(!$region_code){
            $where = [
                'father_id' => 0
            ];
        }else{
            $where = [
                'father_id' => $region_code
            ];
        }
        $list = $regon->regionList($where,'','region_id,region_name,region_id,region_code');
        return $list;
    }

    /**
     * 获取分类信息
     * 邓赛赛
     */
    public function category($gc_id=0){
//        $gc_id = input('param.gc_id',0);
        $g_category = new GoodsCategoryService();
        $where = [
            'parent_id'=>$gc_id,
            'state'=>0
        ];
        $list = $g_category->getCategoryList($where,$order='gc_id desc',$field='*');
        // dump($list);die;
        return $list;
    }

    /**
     * 计算商品价格和参拍人数
     * 邓赛赛
     */
    public function get_discount($money='',$g_id=''){
        $pr_id = input('param.pr_id');
        $goods = new GoodsService();
        if(empty($money)){
            return ['status'=>'0','msg'=>'未传入销售价'];
        }
        $field='gdt_id,gdt_name,gdt_img,gdt_discount';
        $data = $goods->discount_calculation($money,$field,$g_id,$pr_id);
        if($data){
            return ( ['status'=>'1','msg'=>'ok','data'=>$data]);
        }else{
            return ( ['status'=>'0','msg'=>'换算失败','data'=>'']);
        }
    }

    /**
     * 玩法列表
     * 邓赛赛
     */
    public function play_type($where){
        $play_type = Db('play_rule')->where($where)->field('pr_id,pr_name')->select();
        return $play_type;
    }
//    /**
//     * @return array
//     * 再次发拍
//     * 邓赛赛
//     */
//    public function supply()
//    {
//        $goods = new GoodsService();
//        $where = [
//            'g_mid' => $this->m_id,
//            'g_id' => input('param.g_id')
//        ];
//        $info = $goods->get_info($where,"*");
//        if($info['g_state'] != 8){
//            return ['status'=>0,'msg'=>'此商品目前非流拍状态'];
//        }
//        if (request()->isPost()) {
//            $data['g_id'] = input('post.g_id');
//            $data['g_starttime'] = input('post.g_starttime');
//            $data['g_endtime'] = input('post.g_endtime');
//            $data['gp_stock'] = input('post.gp_stock');
//            $data['gp_settlement_price'] = input('post.gp_settlement_price');
//            $data['gp_market_price'] = input('post.gp_market_price');
//
//            if(!trim($data['g_id'])){
//                return ['status' => 0, 'msg' => '未找到此商品'];
//            }
//            if(empty(trim((int)$data['gp_settlement_price']))){
//                return ['status' => 0, 'msg' => '请输入结算价'];
//            }
//            if(empty(trim((int)$data['gp_market_price']))){
//                return ['status' => 0, 'msg' => '请输入市场价'];
//            }
//
//            if($data['gp_market_price']*0.8 < $data['gp_settlement_price']){
//                return ['status' => 0, 'msg' => '结算价不可高于市场价80%'];
//            }
//
//            if(!trim($data['g_starttime'])){
//                return ['status' => 0, 'msg' => '请输入开始时间'];
//            }
//            if(!trim($data['g_endtime'])){
//                return ['status' => 0, 'msg' => '请输入结束时间'];
//            }
//            if((time()-strtotime($data['g_starttime'])) > 0){
//                return ['status'=>0,'msg'=>'开始时间不能小于发布时间'];
//            }
//            if((strtotime($data['g_endtime']) - strtotime($data['g_starttime']))<86400*3 || (strtotime($data['g_endtime']) - strtotime($data['g_starttime'])>86400*15)){
//                return ['status'=>0,'msg'=>'开始时间和结束时间区间在3-15日'];
//            }
//            if(empty(trim((int)$data['gp_stock']))){
//                return ['status' => 0, 'msg' => '请输入库存数量'];
//            }
//
//            $goods_update = [
//                'g_starttime' => strtotime($data['g_starttime']),
//                'g_endtime' => strtotime($data['g_endtime']),
//                'g_state' => 6,
//            ];
//            $product_update = [
//                'gp_stock' => $data['gp_stock'],
//                'gp_sn' => "SN" . time() . rand(1000, 9999) . $data['g_id'],
//            ];
//            $product = new GoodsProductService();
//            Db::startTrans();
//            try {                                                            //日期和库存同时成功才成功
//                $goods_save = $goods->get_save($where, $goods_update);
//                $product_save = $product->goodsProductSave(['g_id' => $data['g_id']], $product_update);
//
//                if ($goods_save && $product_save) {
//                    $goods->add_dt_record($data['g_id'],$data['gp_market_price']);      //都成功时调用此方法修改折扣信息
//                    $msg = ['status' => 1, 'msg' => '上架成功'];
//                    Db::commit();
//                } else {
//                    $msg = ['status' => 0, 'msg' => '上架失败'];
//                    // 回滚事务
//                    Db::rollback();
//                }
//                // 提交事务
//            } catch (\Exception $e) {
//                $msg = ['status' => 0, 'msg' => '上架失败'];
//                // 回滚事务
//                Db::rollback();
//            }
//            return $msg;
//        }
//    }





}
