<?php
/**
 * 商品分类Model
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州拍吖吖科技有限公司
 * 创建日期 2018-06-26
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\model\GoodsProduct;
use app\data\model\BaseModel as BaseModel;
use think\Db;
use think\Cache;

class GoodsProductModel extends BaseModel
{
    protected $db = 'goods_product'; //商品分类

    /**
     * 关联查询 产品详情，店铺详情
     * 创建人 刘勇豪
     * 时间 2018-07-04
     */
    public function getMoreInfo($where, $field = '*')
    {
        $info = Db::table($this->tbale)->alias('gp')
            ->field($field)
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->join('pai_store s', 'g.g_storeid = s.store_id', 'left')
            ->where($where)
            ->find();
        return $info;
    }

    /**
     * 关联查询 产品详情，店铺详情，折扣详情
     * 创建人 刘勇豪
     * 时间 2018-07-04
     */
    public function getGoodsDiscountInfo($where, $field = '*')
    {
        $info = Db::table($this->tbale)->alias('gp')
            ->field($field)
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->join('pai_store s', 'g.g_storeid = s.store_id', 'left')
            ->join('pai_goods_dt_record gdr', 'g.g_id = gdr.g_id', 'left')
            ->join('pai_goods_discounttype gdt', 'gdr.gdt_id = gdt.gdt_id', 'left')
            ->where($where)
            ->find();
        return $info;
    }

}