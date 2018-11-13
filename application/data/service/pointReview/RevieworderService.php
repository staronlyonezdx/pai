<?php
/**
 * 订单评价Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州市拍吖吖科技有限公司
 * 创建日期 2018-07-11
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\service\pointReview;

use app\data\model\pointReview\RevieworderModel as RevieworderModel;
use app\data\service\pointorderPai\PointOrderPaiService as PointOrderPaiService;
use app\data\service\BaseService as BaseService;
use think\Db;
use think\Cache;

class RevieworderService extends BaseService
{
    protected $cache = 'point_review_order';

    public function __construct()
    {
        parent::__construct();
        $this->pointReviewOrder = new RevieworderModel();
        $this->cache = 'point_review_order';

    }

    /**
     * 查询订单评价列表getDetailList  getDetailInfo  getDetailPaginate
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderList($where = '', $order = 'ro_id desc', $field = '*', $cache = 'point_review_order')
    {
        $list = $this->pointReviewOrder->getList($where, $order, $field, $cache);
        return $list;
    }

    /**
     * 查询订单评价详细列表（point_review_order,point_review_goods,point_review_goods_imgs,member,point_goods_product,point_goods,point_order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderDetailList($where = '', $order = 'pro.ro_id desc', $field = '*', $cache = 'point_review_order')
    {
        $list = $this->pointReviewOrder->getDetailList($where, $order, $field, $cache);
        return $list;
    }

    /**
     * 分页查询订单评价详细列表（point_review_order,point_review_goods,point_review_goods_imgs,member,point_goods_product,point_goods,point_order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderDetailLimitList($where = '', $order = 'pro.ro_id desc', $field = '*', $limit = "0,5", $cache = 'point_review_order')
    {
        $limit_list = $this->pointReviewOrder->getDetailLimitList($where, $order, $field, $limit, $cache = 'point_review_order');
        return $limit_list;
    }

    /**
     * 订单评价详细列表总条数
     * 刘勇豪
     * @param string $where
     * @return int|string
     */
    public function pointReviewOrderDetailLimitCount($where = ''){
        $count = Db("point_review_order")->alias("pro")
            ->join('pai_point_order_pai po', 'pop.o_id = pro.order_id', 'left')
            ->join('pai_store s', 's.store_id = pro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = pro.m_id', 'left')
            ->join('pai_point_review_goods prg', 'prg.ro_id = pro.ro_id', 'left')
            ->join('pai_point_goods_product gp', 'pgp.gp_id = prg.gp_id', 'left')
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->where($where)
            ->count();
        return $count;
    }

    /**
     * 获取订单评价信息
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderInfo($where = '', $field = '*')
    {
        $info = $this->pointReviewOrder->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 获取订单评价详细信息（point_review_order,point_review_goods,point_review_goods_imgs,member,point_goods_product,point_goods,point_order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderDetailInfo($where = '', $field = '*')
    {
        $info = $this->pointReviewOrder->getDetailInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 条件统计订单评价数量
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderCount($where = '')
    {
        $Count = $this->pointReviewOrder->getCount($where);
        return $Count;
    }

    /**
     * 更新某个字段的值
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderSetField($where = '', $field = '', $data = '')
    {
        $SetField = $this->pointReviewOrder->getSetField($where, $field, $data, $this->cache);
        return $SetField;
    }

    /**
     * 自增数据
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderSetInc($where = '', $field = '', $data = '')
    {
        $SetInc = $this->pointReviewOrder->getSetInc($where, $field, $data, $this->cache);
        return $SetInc;
    }

    /**
     * 查询某一列的值(point_review_order)
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderColumn($where = '', $field = '')
    {
        $Column = $this->pointReviewOrder->getColumn($where, $field);
        return $Column;
    }

    /**
     * 添加一条point_review_order数据.返回自增id
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderAdd($data = '')
    {
        $ro_id = $this->pointReviewOrder->insertId($data);
        return $ro_id;
    }

    /**
     * 添加一条订单评价数据(point_review_order,order_goods,order_goods_imgs)
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function reviewAdd($data = '')
    {
        $error_msg = $this->checkData($data);
        if ($error_msg) {
            return ['status'=>0,'msg'=>$error_msg,'data'=>''];
        }

        // 评论订单
        $data_order['store_id'] = $data['store_id']; // 店铺id
        $data_order['service_score'] = $data['service_score']; // 店铺服务评分
        $data_order['logistics_score'] = $data['logistics_score']; // 物流评分
        $data_order['order_id'] = $data['o_id']; // 订单id
        $data_order['add_time'] = time(); //评论时间
        $data_order['m_id'] = $data['m_id']; //评论人ID

        $ro_id = $this->pointReviewOrderAdd($data_order);
        if (!$ro_id) {
            return ['status' => 0, 'msg' => '生成订单评论时失败！'];
        }

        // 评论商品
        $data_goods['ro_id'] = $ro_id; //返回的订单评论id
        $data_goods['goods_score'] = $data['goods_score']; // 商品打分
        $data_goods['add_time'] = time(); // 打分日期
        $data_goods['gp_id'] = $data['gp_id']; // 评论商品ID
        $rg_content = '此用户暂未评论！';
        if (!empty($data['rg_content'])) {
            $rg_content = $data['rg_content'];
        }
        $data_goods['rg_content'] = $rg_content; // 评论商品ID
        $data_goods['rg_showname'] = $data['rg_showname']; // 是否匿名

        $rg_id = Db::table("pai_point_review_goods")->insertGetId($data_goods);
        if(!$rg_id){
            return ['status' => 0, 'msg' => '生成商品评论时失败！'];
        }

        // 评论图片
        if (!empty($data['rgi_img'])) {
            $imgs = $this->pointReviewOrder->ba64_img($data['rgi_img'], 'rgi_img');
            if(!empty($imgs)){
                foreach($imgs as $k => $v){
                    $data_img['rg_id'] = $rg_id;
                    $data_img['img_url'] = $v;
                    $rgi_id = Db::table("pai_point_review_goods_imgs")->insertGetId($data_img);
                }
            }
        }

        // 更新店铺和拍品的评分
        $update_store = $this->setStoreScore($data['store_id']);
        if(!$update_store['status']){
            return ['status' => 0, 'msg' => $update_store['msg']];
        }
        $update_goods = $this->setGoodsScore($data['gp_id']);
        if(!$update_goods['status']){
            return ['status' => 0, 'msg' => $update_goods['msg']];
        }

        // 更新订单状态
        $pointOrderPai = new PointOrderPaiService();
        $where_order = [];
        $where_order["o_id"] = $data['o_id'];
        $where_order["m_id"] = $data['m_id'];

        $data_order = [];
        $data_order['o_state'] = 5;
        $res = $pointOrderPai->pointOrderPaiSave($where_order,$data_order);

        if(!$res){
            return ['status'=>0,'msg'=>"系统繁忙，请稍后再试~"];
        }

        return ['status' => 1, 'msg' => '评论成功 ！','data'=>$res];
    }


    /**
     * 添加多条订单评价数据
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderAddAll($data = '')
    {
        $list = $this->pointReviewOrder->getAddAll($data, $this->cache);
        return $list;
    }

    /**
     * 订单评价分页查询
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function pointReviewOrderPaginate($where = '', $field = '*', $order = "ro_id asc", $page = 15)
    {
        $list = $this->pointReviewOrder->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 订单评价详细分页查询（point_review_order,point_review_goods,point_review_goods_imgs,member,point_goods_product,point_goods,point_order_pai）
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function pointReviewOrderDetailPaginate($where = '', $field = '*', $order = "ro_id asc", $page = 15)
    {
        $list = $this->pointReviewOrder->getDetailPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 更新订单评价数据
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderSave($where = "", $data = "")
    {
        $save = $this->pointReviewOrder->getSave($where, $data, $this->cache);
        return $save;
    }

    /**
     * 删除一条订单评价数据
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderDel($where = '')
    {
        $del = $this->pointReviewOrder->getDel($where, $this->cache);
        return $del;
    }

    /**
     * 删除多条订单评价数据
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderDelMost($id_arr = '')
    {
        $delAll = $this->pointReviewOrder->getDelMost($id_arr, $this->cache);
        return $delAll;
    }

    /**
     * 按条件添加一条订单评价(TODO ...)
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderRoomAdd()
    {
        //订单评价POST数据
        $type = 'add';
        $data = $this->inputData($type);
        if ($this->pointReviewOrderAdd($data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 按条件更新订单评价(TODO ...)
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderRoomEdit()
    {
        $id = input('get.id');
        if ($id == '' || !is_numeric($id)) {
            return false;
        }
        $id = intval($id);
        $result = $this->pointReviewOrderInfo("ID=$id");
        return $result;
    }



    /**
     * 数据验证
     * 创建人 刘勇豪
     * 时间 2018-06-30 10:30:00
     */
    public function checkData($data = '')
    {
        $error_msg = "";
        //订单id
        if (!isset($data['o_id']) || empty($data['o_id'])) {
            $error_msg .= "缺少订单参数！";
        }

        // 订单是否一评论
        $o_id = $data['o_id'];
        $count = $this->pointReviewOrder->getCount(['order_id' => $o_id]);
        if ($count > 0) {
            $error_msg .= "订单已评价，不能重复评价！";
        }

        //评论内容
//        if(!isset($data['rg_content']) || $data['rg_content']==''){
//            $error_msg .= "评论内容不能为空！";
//        }

        if (isset($data['rg_content']) && mb_strlen($data['rg_content']) > 400) {
            $error_msg .= "评论内容超过了限制长度！";
        }

        //店铺id
        if (!isset($data['store_id']) || empty($data['store_id'])) {
            $error_msg .= "缺少店铺参数！";
        }

        //评论商品ID
        if (!isset($data['gp_id']) || empty($data['gp_id'])) {
            $error_msg .= "缺少商品参数！";
        }

        //店铺服务评分
        if (!isset($data['service_score']) || $data['service_score'] > 5 || $data['service_score'] < 0) {
            $error_msg .= "缺少店铺服务评分,或评分非法！";
        }

        //物流评分
        if (!isset($data['logistics_score']) || $data['logistics_score'] > 5 || $data['logistics_score'] < 0) {
            $error_msg .= "缺少物流评分,或评分非法！";
        }

        //商品评分
        if (!isset($data['goods_score']) || $data['goods_score'] > 5 || $data['goods_score'] < 0) {
            $error_msg .= "缺少商品评分,或评分非法！";
        }

        //是否匿名
        if (isset($data['rg_showname'])) {
            if ($data['rg_showname'] != 0 && $data['rg_showname'] != 1) {
                $error_msg .= "匿名参数错误！";
            }
        }

        //评论人id
        if (!isset($data['m_id']) || empty($data['m_id'])) {
            $error_msg .= "缺少评论人！";
        }

        return $error_msg;
    }

    /**
     * 删除订单评价操作
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function pointReviewOrderRoomDel()
    {
        $id = input('post.id');
        if ($id == '' || !is_numeric($id)) {
            return false;
        }
        $id = intval($id);
        $where = array();
        $where['ro_id'] = $id;
        $info = $this->pointReviewOrderInfo($where);
        if ($info && $this->pointReviewOrderDel($where)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 删除订单评价操作(非物理删除)
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     * $ro_id:评价表id
     */
    public function myOrderDeiete($ro_id)
    {
        if (!$ro_id) {
            return ['status' => 0, 'msg' => '参数错误！'];
        }

        $del = $this->pointReviewOrder->deleteReview($ro_id);
        return $del;
    }

    /**
     * @param $where
     * @param string $field
     * @param string $cache
     * @return int|string
     */
    public function get_order_count($where,$field='*',$cache='point_review_order'){
       $count =  $this->pointReviewOrder->getDetailCount($where,$field,$cache);
       return $count;
    }

    /**
     * 自动更新店铺 店铺评分 物流评分
     * 参数：店铺id
     * 刘勇豪
     *
     * return array
     */
    public function setStoreScore($store_id){
        if(!$store_id){
            return ['status'=>0, 'msg'=>'店铺参数错误！'];
        }
        $avg_service_score = Db::table("pai_point_review_order")->where(['store_id'=>$store_id,'state'=>0])->avg("service_score");
        $avg_logistics_score = Db::table("pai_point_review_order")->where(['store_id'=>$store_id,'state'=>0])->avg("logistics_score");

        $where['store_id'] = $store_id;
        $data['s_score'] = $avg_service_score;
        $data['e_score'] = $avg_logistics_score;
        $res = Db::table("pai_store")->where($where)->update($data);

        return ['status'=>1,'msg'=>'店铺评分更新成功！','data'=>$data];
    }

    /**
     * 自动更新商品评分
     * 参数：goods_product
     * 刘勇豪
     *
     * return array
     */
    public function setGoodsScore($gp_id){
        if(!$gp_id){
            return ['status'=>0, 'msg'=>'拍品参数错误！'];
        }

        $res = Db::table("pai_point_goods_product")->where(['gp_id'=>$gp_id])->order("gp_id desc")->find();

        if(empty($res) || !$res['g_id']){
            return ['status'=>0, 'msg'=>'拍品不存在！'];
        }

        $g_id = $res['g_id'];

        $avg_goods_score = Db::table("pai_point_review_goods")->where(['gp_id'=>$gp_id,'state'=>0])->avg("goods_score");
        $where['g_id'] = $g_id;
        $data['g_score'] = $avg_goods_score;
        $res = Db::table("pai_point_goods")->where($where)->update($data);

        return ['status'=>1, 'msg'=>'商品评分更新成功！'];
    }
}