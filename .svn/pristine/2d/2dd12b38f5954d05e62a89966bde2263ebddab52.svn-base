<?php

namespace app\member\controller;

use app\data\service\admit\AdmitService;
use app\data\service\goods\GoodsService;
use app\data\service\goodsCategory\GoodsCategoryService;
use app\data\service\goodsImgs\GoodsImgsService;
use app\data\service\goodsProduct\GoodsProductService;
use app\data\service\goodsSpec\GoodsSpecService;
use app\data\service\member\MemberService;
use app\data\service\store\StoreService;
use think\Controller;
use think\Cookie;
use think\Db;

class Goods extends MemberHome
{
    /**
     * @return mixed
     * 发布商品页面
     * 邓赛赛
     */
    public function index()
    {
        $m_id = $this->m_id;
        $where = [
            'm_id' => $m_id,
            'm_state' => 0
        ];
        $this->check_member($where);                                //验证商家是否有权限进入

        $specWhere['gs_state'] = 0;
        $goods_spec = new GoodsSpecService();                                         //商品类型(特殊属性如：大宗、实物、虚拟)

//        $goods_category = new GoodsCategoryService();                                //商品分类
        $store = new StoreService();

        $goods = new GoodsService();
        if (request()->isPost()) {                                  //发布商品
            $data = input('post.');
            $data['g_endtime'] = empty(input('post.g_endtime')) ? '' : strtotime(input('post.g_endtime')) ;
            $data['g_starttime'] = empty(input('post.g_endtime')) ? '' : strtotime(input('post.g_starttime'));

            if(!empty($data['cancel'])){                            //保存商品时直接插入
                $res = $goods->add_goods($data, $m_id,7);
                return $res;
            }
            $check = $goods->check_goods($data);                    //验证发布商品
            if($check){
                return $check;
            }
            $money = input('post.gp_settlement_price');                         //保证金判定区域
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
            $res = $goods->add_goods($data, $m_id,$g_state);

            return $res;
        }

        $store_type = $store->get_value(['m_id' => $m_id],'store_type');

        if($store_type==2){
            $specWhere['gs_store_type'] =2;
        }
        $spec = $goods_spec->goodsSpecList($specWhere);
        $goods_category = new GoodsCategoryService();                                //商品分类
        $category = $goods_category->getCategory(0);

        $this->assign(['category' => $category,'spec'=>$spec,'store_type'=>$store_type]);
        $this->assign('header_title','发布商品');
        return $this->fetch();

    }

    /**
     * @return mixed
     * 我的商品
     * 邓赛赛
     */
    public function my_goods()
    {
        $m_id = $this->m_id;
        $goods = new GoodsService();
        $g_state = input('param.g_state');
        $g_name = input('param.g_name');
        $g_state = $g_state ?  $g_state : 0;
        $where['g.g_state'] = $g_state ?  $g_state : 0;
        if (request()->isAjax()) {
            $page = empty(input('param.page')) ? 1 : input('param.page');
            $num = empty(input('param.page_size')) ? 20 : input('param.page_size');

            switch ($where['g.g_state']) {
                case 0:             //全部
                    $where['g.g_state'] =['in', [1, 2, 4, 6, 7, 8]] ;
                    $where['p.gp_stock'] = ['>',0];
                    break;
                case 1:             //出售中
                    $where['g.g_state'] = 6;
                    $where['p.gp_stock'] = ['>',0];
                    $where['g.g_endtime'] = ['>',time()];
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
            if($g_name){
                $where['g.g_name'] = ['like','%'.$g_name.'%'];
            }
            $where['g.g_mid'] = $this->m_id;
    //        dump($where);
            $field = "g.g_img,g.g_name,g.g_id,g.g_state,g_endtime,p.gp_stock,p.gp_market_price,p.gp_settlement_price,p.gp_sn,p.gp_id,gp_sale_price,min(dtr.gdr_price)min_gdr_price,max(dtr.gdr_price)max_gdr_price,g.g_type";
            $list = $goods->goods_list($where, $field, 'g.g_addtime desc',$num,$page);
            $store = new StoreService();
            $deposit = $store->get_value(['m_id'=>$m_id],'deposit');
            $total_money = 0;
            foreach($list['list'] as $k => $v){
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
                        $list['list'][$k]['deposit'] = sprintf('%.2f',$total_money-$deposit);
                    }else{
                        $list['list'][$k]['deposit'] = sprintf('%.2f',0);
                    }

                }
                //出售中的商品，时间结束时(有库存时改为未团中,没有时为完成)
                if($v["g_state"] == 6){
                    if($v['g_endtime'] < time()){
                        $g_state = $v['gp_stock'] > 1 ? 8 : 9 ;
                        $list['list'][$k]['g_state'] = $g_state;
                    }
                }
            }
            return $list;
        }
//        $this->assign(['list' => $list, 'g_state' => $g_state]);
        $this->assign(['g_state' => $g_state]);
        $this->assign('header_path','/member/myhome/index');

        $this->assign('header_title','我的发布');
        return $this->fetch();
    }

    /**
     * 我的发布搜索结果页
     * 邓赛赛
     */
    public function search_goods(){
        $m_id = $this->m_id;
        $goods = new GoodsService();
        $g_name = input('param.g_name');
        $where['g.g_state'] = ['in', [1, 2, 4, 6, 7, 8]];
        $page = empty(input('param.page')) ? 1 : input('param.page');
        $num = empty(input('param.page_size')) ? 20 : input('param.page_size');
        //搜索字段
        $where['g.g_name'] = ['like','%'.$g_name.'%'];
        $where['g.g_mid'] = $m_id;

        $field = "g.g_img,g.g_name,g.g_id,g.g_state,g_endtime,p.gp_stock,p.gp_market_price,p.gp_settlement_price,p.gp_sn,p.gp_id,gp_sale_price,min(dtr.gdr_price)min_gdr_price,max(dtr.gdr_price)max_gdr_price";
        $list = $goods->goods_list($where, $field, 'g.g_addtime desc',$num,$page);
        $store = new StoreService();
        $deposit = $store->get_value(['m_id'=>$m_id],'deposit');
        $total_money = 0;
        foreach($list['list'] as $k => $v){
            if($v["g_state"] == 1){
                $gp_market_price = $v['gp_market_price'];
                switch($gp_market_price){
                    case $gp_market_price <= 1000:
                        $total_money = '1000';
                        break;
                    case $gp_market_price > 1000 && $gp_market_price<= 10000:
                        $total_money = '5000';
                        break;
                    case $gp_market_price > 10000:
                        $total_money = '10000';
                        break;
                }
                if($total_money-$deposit > 0){
                    $list['list'][$k]['deposit'] = sprintf('%.2f',$total_money-$deposit);
                }
            }
        }
        if (request()->isAjax()) {
            return $list;
        }
        $this->assign('list' , $list);
        $this->assign('g_name',$g_name);
        $this->assign('header_path','/member/goods/my_goods');
        $this->assign('header_title','搜索结果');
        return view();
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
     * 草稿提交（保证金充足时，其他符合规则商品有提交功能）
     * 邓赛赛
     */
    public function examine()
    {
        $where = [
            'g_id' => input('post.g_id'),
            'g_mid' => $this->m_id,
        ];
        $update = [
            'g_state' => 2
        ];
        $goods = new GoodsService();
        $res = $goods->cancelShop($where, $update);
        if ($res) {
            return ['status' => 1, 'msg' => 'ok'];
        } else {
            return ['status' => 0, 'msg' => '提交失败'];
        }
    }

    public function upload()
    {
        header('Access-Control-Allow-Origin:*');
        echo '{"code":1,"msg":"1.jpg"}';
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
        $array = [4,7,8,9];
        if(!in_array($info['g_state'],$array)){
//            return ['status'=>0,'msg'=>'此商品类型不可修改'];
            $this->error('此商品类型不可修改');
        }
        $store = new StoreService();
        //更新数据
        if (request()->isPost()) {
            $data = input('post.');
            $goods = new GoodsService();
            //再次保存时
            $g_state = 7;
            //再次编辑时
            if(empty($data['cancel'])){
                $data['g_endtime'] = empty(input('post.g_endtime')) ? '' : strtotime(input('post.g_endtime')) ;
                $data['g_starttime'] = empty(input('post.g_endtime')) ? '' : strtotime(input('post.g_starttime'));
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
                $money = input('post.gp_market_price');                         //保证金判定区域
                $total_money = 0;
                switch($money){
                    case $money <= 1000:
                        $total_money = 1000;
                        break;
                    case $money > 1000 && $money<= 10000:
                        $total_money = 5000;
                        break;
                    case $money > 10000:
                        $total_money = 10000;
                        break;
                }
                $deposit = $store->storeInfo(['m_id'=>$m_id],'deposit');                    //已有保证金
                $g_state = ($total_money-$deposit['deposit']) > 0 ? 1 : 2;
            }

            $where = ['m_id' => $m_id];

            $res = $goods->continue_edit($data, $where,$g_state);
            return $res;
        }

        $goods_spec = new GoodsSpecService();                                           //商品类型(属性表)
        $spec = $goods_spec->goodsSpecList(['gs_state' => 0]);
        $goods_category = new GoodsCategoryService();
        $category = $goods_category->getCategory(0);                        //商家店铺递归调用(选取使用)


        $info['address'] = $goods->id_address($info['pid'], $info['cid'], $info['aid']); //id转为地址
        if(!empty($info["gp_market_price"])){                                           //展示折扣信息
            $info['dt_record'] = $goods->discount($info['gp_market_price'],'*',$g_id);
        }
        //拼接地址id
        if (!empty($info['cid'])) {
            $info['pid'] = $info['pid'] . ',' . $info['cid'];
        }
        if (!empty($info['aid'])) {
            $info['pid'] = $info['pid'] . ',' . $info['aid'];
        }
        $info['g_description'] = htmlspecialchars_decode($info['g_description']);
        $category_list = $goods_category->getCategoryList('','','gc_id,gc_name');   //商家店铺替换使用
        $category_list = array_column($category_list,'gc_name','gc_id');
        $info['gc_name'] = empty($category_list[$info['gc_id']]) ? '' : $category_list[$info['gc_id']];
        //商家类型
        $store_type = $store->get_value(['m_id'=>$m_id],'store_type');
        $this->assign(['info' => $info, 'spec' => $spec,'category'=>$category,'store_type'=>$store_type]);
        $this->assign('header_title','再次编辑');
        return $this->fetch('goods/index');
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
     * 再次发布
     * 邓赛赛
     */
    public function supply()
    {
        $goods = new GoodsService();
        $where = [
            'g_mid' => $this->m_id,
            'g_id' => input('param.g_id')
        ];
        $info = $goods->get_info($where,"*");
        if($info['g_state'] != 8){
            return ['status'=>0,'msg'=>'此商品目前非未团中状态'];
        }
        if (request()->isPost()) {
            $data['g_id'] = input('post.g_id');
            $data['g_starttime'] = input('post.g_starttime');
            $data['g_endtime'] = input('post.g_endtime');
            $data['gp_stock'] = input('post.gp_stock');
            $data['gp_settlement_price'] = input('post.gp_settlement_price');
            $data['gp_market_price'] = input('post.gp_market_price');

            if(!trim($data['g_id'])){
                return ['status' => 0, 'msg' => '未找到此商品'];
            }
            if(empty(trim((int)$data['gp_settlement_price']))){
                return ['status' => 0, 'msg' => '请输入结算价'];
            }
            if(empty(trim((int)$data['gp_market_price']))){
                return ['status' => 0, 'msg' => '请输入市场价'];
            }

            if($data['gp_market_price']*0.8 < $data['gp_settlement_price']){
                return ['status' => 0, 'msg' => '结算价不可高于市场价80%'];
            }

            if(!trim($data['g_starttime'])){
                return ['status' => 0, 'msg' => '请输入开始时间'];
            }
            if(!trim($data['g_endtime'])){
                return ['status' => 0, 'msg' => '请输入结束时间'];
            }
            if((time()-strtotime($data['g_starttime'])) > 0){
                return ['status'=>0,'msg'=>'开始时间不能小于发布时间'];
            }
            if((strtotime($data['g_endtime']) - strtotime($data['g_starttime']))<86400*3 || (strtotime($data['g_endtime']) - strtotime($data['g_starttime'])>86400*15)){
                return ['status'=>0,'msg'=>'开始时间和结束时间区间在3-15日'];
            }
            if(empty(trim((int)$data['gp_stock']))){
                return ['status' => 0, 'msg' => '请输入库存数量'];
            }

            $goods_update = [
                'g_starttime' => strtotime($data['g_starttime']),
                'g_endtime' => strtotime($data['g_endtime']),
                'g_state' => 6,
            ];
            $product_update = [
                'gp_stock' => $data['gp_stock'],
                'gp_sn' => "SN" . time() . rand(1000, 9999) . $data['g_id'],
            ];
            $product = new GoodsProductService();
            Db::startTrans();
            try {                                                            //日期和库存同时成功才成功
                $goods_save = $goods->get_save($where, $goods_update);
                $product_save = $product->goodsProductSave(['g_id' => $data['g_id']], $product_update);

                if ($goods_save && $product_save) {
//                    $goods->add_dt_record($data['g_id'],$data['gp_market_price']);      //都成功时调用此方法修改折扣信息
                    $msg = ['status' => 1, 'msg' => '上架成功'];
                    Db::commit();
                } else {
                    $msg = ['status' => 0, 'msg' => '上架失败'];
                    // 回滚事务
                    Db::rollback();
                }
                // 提交事务
            } catch (\Exception $e) {
                $msg = ['status' => 0, 'msg' => '上架失败'];
                // 回滚事务
                Db::rollback();
            }
            return $msg;
        }
    }

    /**
     * 发布商品成功
     * 邓赛赛
     */
    public function release_success()
    {
        $g_id = input('param.g_id/d');
        $goods = new GoodsService();
        $where = [
            'g_id'=>$g_id,
            'g_mid'=>$this->m_id,
        ];
        $g_starttime = $goods->get_info($where,'g_starttime')['g_starttime'];
        $data = [
            'date'=>date('Y-m-d H:i',$g_starttime),
            'g_id'=>$g_id
        ];
        $this->assign('header_path','/member/goods/my_goods');
        $this->assign('header_title','提交成功');
        $this->assign('data',$data);
        return view();
    }

    /**
     * @param $where
     * 验证用户是否可发布商品
     */
    public function check_member($where)
    {
        $goods = new GoodsService();
        $res = $goods->is_business($where);
        if ($res['status'] != 200) {
            switch ($res['status']) {
                case 0:
                    $this->error('商家才可发布商品', 'admit/apply_store','',1);
                    break;
                case 1:
                    $this->error('正在审核中,耐心等待', 'myhome/index','',1);
                    break;
                case 2:
                    $this->error('审核失败,请重新修改', 'admit/edit_application','',1);
                    break;
            }
        }
    }

    /**
     * 计算商品价格和参团人数
     * 邓赛赛
     */
    public function get_discount($money='',$g_id=''){
        $goods = new GoodsService();
//        $money = input('post.money');
//        $money = 100;
        if(empty($money)){
            return ['status'=>'0','msg'=>'未传入销售价'];
        }
        $field='gdt_id,gdt_name,gdt_img,gdt_discount';
        $data = $goods->discount_calculation($money,$field,$g_id);
        if($data){
            return ( ['status'=>'1','msg'=>'ok','data'=>$data]);
        }else{
            return ( ['status'=>'0','msg'=>'换算失败','data'=>'']);
        }
    }
}
