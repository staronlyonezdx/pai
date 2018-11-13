<?php
/**
 * 节分订单评价Model
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州拍吖吖科技有限公司
 * 创建日期 2018-07-12
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\model\pointReview;

use app\data\model\BaseModel as BaseModel;
use think\Db;
use think\Cache;

class RevieworderModel extends BaseModel
{
    protected $db = 'point_review_order'; //节分订单评价表

    /**
     * 查询节分订单评价详细列表（point_review_order,point_review_goods,point_review_goods_imgs,member,goods_product,goods,store,order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function getDetailList($where='', $order='pro.ro_id desc', $field='*', $cache='point_review_order')
    {
        $list = Db::table($this->tbale)->alias("pro")
            ->field($field)
            ->join('pai_point_order_pai pop', 'pop.o_id = pro.ro_id', 'left')
            ->join('pai_store s', 's.store_id = pro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = pro.m_id', 'left')
            ->join('pai_point_review_goods rg', 'prg.ro_id = pro.ro_id', 'left')
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = prg.gp_id', 'left')
            ->join('pai_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->select();
        if(!empty($list)){
            foreach($list as $k => $v){
                $rg_id = $v['rg_id'];
                $img_list = [];
                if($rg_id){
                    $img_list = Db::table("pai_point_review_goods_imgs")->where(['rg_id'=>$rg_id])->select();
                }
                $list[$k]['img_list'] = $img_list;
            }
        }
        return $list;
    }

    /**
     * 获取节分订单评价详细信息（point_review_order,point_review_goods,point_review_goods_imgs,member,goods_product,goods,order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function getDetailInfo($where, $field='*')
    {
        $info =  Db::table($this->tbale)->alias("pro")
            ->field($field)
            ->join('pai_point_order_pai po', 'po.o_id = pro.ro_id', 'left')
            ->join('pai_store s', 's.store_id = pro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = pro.m_id', 'left')
            ->join('pai_point_review_goods prg', 'prg.ro_id = pro.ro_id', 'left')
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = prg.gp_id', 'left')
            ->join('pai_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->where($where)
            ->find();
        if(!empty($info)){
            $rg_id = $info['rg_id'];
            $img_list = [];
            if($rg_id){
                $img_list = Db::table("pai_point_review_goods_imgs")->where(['rg_id'=>$rg_id])->select();
            }
            $info['img_list'] = $img_list;
        }
        return $info;
    }

    /**
     * 节分订单评价详细分页查询（point_review_order,point_review_goods,point_review_goods_imgs,member,point_goods_product,point_goods,point_order_pai）
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function getDetailPaginate($where, $field, $order, $page, $cache)
    {
        $list = Db::table($this->tbale)->alias("pro")
            ->field($field)
            ->join('pai_point_order_pai po', 'po.o_id = pro.ro_id', 'left')
            ->join('pai_store s', 's.store_id = pro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = pro.m_id', 'left')
            ->join('pai_point_review_goods prg', 'pro.ro_id = prg.ro_id', 'left')
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = prg.gp_id', 'left')
            ->join('pai_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->paginate($page,false,['query'=>request()->param() ]);
        return $list;
    }

    /**
     * 删除节分订单评价（point_review_order,point_review_goods,point_review_goods_img）
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     * 备注：非物理
     */
    public function deleteReview($ro_id){

        if(!$ro_id){
            return false;
        }

        Db::table($this->tbale)->where(['ro_id'=>$ro_id])->update(['state'=>1]);
        $point_review_goods = Db::table("pai_point_review_goods")->where(['ro_id'=>$ro_id])->select();

        if(!empty($point_review_goods)){
            Db::table("pai_point_review_goods")->where(['ro_id'=>$ro_id])->update(['state'=>1]);
            foreach($point_review_goods as $v){
                if(!empty($v['rg_id'])){
                    $rg_id = $v['rg_id'];
                    Db::table("pai_point_review_goods_imgs")->where(['rg_id'=>$rg_id])->update(['state'=>1]);
                }

            }
        }
        return true;
    }

    /**
     * 分页查询节分订单评价详细列表（point_review_order,point_review_goods,point_review_goods_imgs,member,point_goods_product,goods,store,point_order_pai）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function getDetailLimitList($where='', $order='pro.ro_id desc', $field='*', $limit='0,5', $cache='point_review_order')
    {
        $list = Db::table($this->tbale)->alias("pro")
            ->field($field)
            ->join('pai_point_order_pai po', 'po.o_id = pro.order_id', 'left')
            ->join('pai_store s', 's.store_id = pro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = pro.m_id', 'left')
            ->join('pai_point_review_goods prg', 'prg.ro_id = pro.ro_id', 'left')
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = prg.gp_id', 'left')
            ->join('pai_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();
        if(!empty($list)){
            foreach($list as $k => $v){
                $rg_id = $v['rg_id'];
                $img_list = [];
                if($rg_id){
                    $img_list = Db::table("pai_point_review_goods_imgs")->where(['rg_id'=>$rg_id])->select();
                }
                $list[$k]['img_list'] = $img_list;
            }
        }
        return $list;
    }


    /**
     * 分页查询节分订单评总数量（point_review_order,point_review_goods,point_review_goods_imgs,member,goods_product,goods,store,order_pai）
     * 创建人 邓赛赛
     * 时间 2018-07-11 16:09:00
     */
    public function getDetailCount($where='', $field='*',  $cache='point_review_order')
    {
        $num = Db::table($this->tbale)->alias("pro")
            ->field($field)
            ->join('pai_point_order_pai po', 'po.o_id = pro.ro_id', 'left')
            ->join('pai_store s', 's.store_id = pro.store_id', 'left')
            ->join('pai_member m', 'm.m_id = pro.m_id', 'left')
            ->join('pai_point_review_goods prg', 'prg.ro_id = pro.ro_id', 'left')
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = prg.gp_id', 'left')
            ->join('pai_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->where($where)
            ->count();
        return $num;
    }

}