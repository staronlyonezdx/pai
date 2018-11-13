<?php
/**
 * 订单评价Model
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州拍吖吖科技有限公司
 * 创建日期 2018-07-12
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\model\review;

use app\data\model\BaseModel as BaseModel;
use think\Db;
use think\Cache;

class RevieworderModel extends BaseModel
{
    protected $db = 'review_order'; //订单评价表

    /**
     * 查询订单评价详细列表（review_order,review_goods,review_goods_imgs,member,goods_product,goods,store,order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function getDetailList($where='', $order='ro.ro_id desc', $field='*', $cache='review_order')
    {
        $list = Db::table($this->tbale)->alias("ro")
            ->field($field)
            ->join('pai_order_pai op', 'op.o_id = ro.ro_id', 'left')
            ->join('pai_store s', 's.store_id = ro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = ro.m_id', 'left')
            ->join('pai_review_goods rg', 'rg.ro_id = ro.ro_id', 'left')
            ->join('pai_goods_product gp', 'gp.gp_id = rg.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->select();
        if(!empty($list)){
            foreach($list as $k => $v){
                $rg_id = $v['rg_id'];
                $img_list = [];
                if($rg_id){
                    $img_list = Db::table("pai_review_goods_imgs")->where(['rg_id'=>$rg_id])->select();
                }
                $list[$k]['img_list'] = $img_list;
            }
        }
        return $list;
    }

    /**
     * 获取订单评价详细信息（review_order,review_goods,review_goods_imgs,member,goods_product,goods,order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function getDetailInfo($where, $field='*')
    {
        $info =  Db::table($this->tbale)->alias("ro")
            ->field($field)
            ->join('pai_order_pai op', 'op.o_id = ro.ro_id', 'left')
            ->join('pai_store s', 's.store_id = ro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = ro.m_id', 'left')
            ->join('pai_review_goods rg', 'rg.ro_id = ro.ro_id', 'left')
            ->join('pai_goods_product gp', 'gp.gp_id = rg.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->find();
        if(!empty($info)){
            $rg_id = $info['rg_id'];
            $img_list = [];
            if($rg_id){
                $img_list = Db::table("pai_review_goods_imgs")->where(['rg_id'=>$rg_id])->select();
            }
            $info['img_list'] = $img_list;
        }
        return $info;
    }

    /**
     * 订单评价详细分页查询（review_order,review_goods,review_goods_imgs,member,goods_product,goods,order_pai）
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function getDetailPaginate($where, $field, $order, $page, $cache)
    {
        $list = Db::table($this->tbale)->alias("ro")
            ->field($field)
            ->join('pai_order_pai op', 'op.o_id = ro.ro_id', 'left')
            ->join('pai_store s', 's.store_id = ro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = ro.m_id', 'left')
            ->join('pai_review_goods rg', 'ro.ro_id = rg.ro_id', 'left')
            ->join('pai_goods_product gp', 'gp.gp_id = rg.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->paginate($page);
        return $list;
    }

    /**
     * 删除订单评价（review_order,review_goods,review_goods_img）
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     * 备注：非物理
     */
    public function deleteReview($ro_id){

        if(!$ro_id){
            return false;
        }

        Db::table($this->tbale)->where(['ro_id'=>$ro_id])->update(['state'=>1]);
        $review_goods = Db::table("pai_review_goods")->where(['ro_id'=>$ro_id])->select();

        if(!empty($review_goods)){
            Db::table("pai_review_goods")->where(['ro_id'=>$ro_id])->update(['state'=>1]);
            foreach($review_goods as $v){
                if(!empty($v['rg_id'])){
                    $rg_id = $v['rg_id'];
                    Db::table("pai_review_goods_imgs")->where(['rg_id'=>$rg_id])->update(['state'=>1]);
                }

            }
        }
        return true;
    }

    /**
     * 分页查询订单评价详细列表（review_order,review_goods,review_goods_imgs,member,goods_product,goods,store,order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function getDetailLimitList($where='', $order='ro.ro_id desc', $field='*', $limit='0,5', $cache='review_order')
    {
        $list = Db::table($this->tbale)->alias("ro")
            ->field($field)
            ->join('pai_order_pai op', 'op.o_id = ro.order_id', 'left')
            ->join('pai_store s', 's.store_id = ro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = ro.m_id', 'left')
            ->join('pai_review_goods rg', 'rg.ro_id = ro.ro_id', 'left')
            ->join('pai_goods_product gp', 'gp.gp_id = rg.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();
        if(!empty($list)){
            foreach($list as $k => $v){
                $rg_id = $v['rg_id'];
                $img_list = [];
                if($rg_id){
                    $img_list = Db::table("pai_review_goods_imgs")->where(['rg_id'=>$rg_id])->select();
                }
                $list[$k]['img_list'] = $img_list;
            }
        }
        return $list;
    }


    /**
     * 分页查询订单评总数量（review_order,review_goods,review_goods_imgs,member,goods_product,goods,store,order_pai）
     * 创建人 邓赛赛
     * 时间 2018-07-11 16:09:00
     */
    public function getDetailCount($where='', $field='*',  $cache='review_order')
    {
        $num = Db::table($this->tbale)->alias("ro")
            ->field($field)
            ->join('pai_order_pai op', 'op.o_id = ro.ro_id', 'left')
            ->join('pai_store s', 's.store_id = ro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = ro.m_id', 'left')
            ->join('pai_review_goods rg', 'rg.ro_id = ro.ro_id', 'left')
            ->join('pai_goods_product gp', 'gp.gp_id = rg.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->count();
        return $num;
    }

}