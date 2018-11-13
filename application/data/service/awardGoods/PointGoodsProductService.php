<?php
/**
 * 商品详情Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州市拍吖吖科技有限公司
 * 创建日期 2018-06-20
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */
namespace app\data\service\pointGoods;
use app\data\model\pointGoods\PointGoodsProductModel;
use app\data\service\BaseService as BaseService;
use think\Db;

class PointGoodsProductService extends BaseService

{
    protected $cache = 'point_goods_product';

    public function __construct()
    {
        parent::__construct();
        $this->goodsProduct  = new PointGoodsProductModel();

        $this->cache = 'point_goods_product';
    }

    /**
     * 查询商品详情列表
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductList($where='', $field='*', $order='gp_id asc')
    {
        $list = $this->goodsProduct->getList($where, $order, $field, $this->cache);
        return $list;
    }

    /**
     * 获取商品详情信息
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductInfo($where='', $field='*')
    {
        $info =  $this->goodsProduct->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 条件统计商品详情数量
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductCount($where='')
    {
        $Count =  $this->goodsProduct->getCount($where);
        return $Count;
    }

    /**
     * 更新某个字段的值
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductSetField($where='', $field='', $data='')
    {
        $SetField =  $this->goodsProduct->getSetField($where, $field, $data, $this->cache);
        return $SetField;
    }

    /**
     * 自增数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductSetInc($where='', $field='', $data='')
    {
        $SetInc =  $this->goodsProduct->getSetInc($where, $field, $data, $this->cache);
        return $SetInc;
    }

    /**
     * 查询某一列的值
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductColumn($where='', $field='')
    {
        $Column =  $this->goodsProduct->getColumn($where, $field);
        return $Column;
    }

    /**
     * 添加一条商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductAdd($data='')
    {
        $list = $this->goodsProduct->getAdd($data, $this->cache);
        return $list;
    }


    /**
     * 添加多条商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductAddAll($data='')
    {
        $list = $this->goodsProduct->getAddAll($data, $this->cache);
        return $list;
    }

    /**
     * 商品详情分页查询(旧)
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductPageList($where='', $field='*', $order="gp_id asc", $page=15)
    {

        $list = $this->goodsProduct->getPageList($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 商品详情分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function goodsProductPaginate($where='', $field='*', $order="gb_id asc",$page=15)
    {
        $list = $this->goodsProduct->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 更新商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductSave($where="", $data="")
    {
        $save = $this->goodsProduct->getSave($where, $data, $this->cache);
        return $save;
    }

    /**
     * 删除一条商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductDel($where='')
    {
        $del = $this->goodsProduct->getDel($where, $this->cache);
        return $del;
    }

    /**
     * 删除多条商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductDelMost($id_arr='')
    {
        $delAll = $this->goodsProduct->getDelMost($id_arr, $this->cache);
        return $delAll;
    }

    /**
     * 商品详情列表分页
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductListShow($type=0)
    {
        $where = array();

        $where['gp_id'] = array('>',0);
        $lists  = $this->goodsProductPageList($where);
        $volist = false;
        if($lists && !$type)
        {
            $volist = $lists->toArray();
        }
        else if($lists && $type)
        {
            $volist = $lists;
        }
        return $volist;
    }

    /**
     * 按条件更新商品详情
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductRoomEdit()
    {
        $id = input('get.gp_id');
        if ($id=='' || !is_numeric($id)) {
            return false;
        }
        $id=intval($id);
        $where = array();
        $where['gp_id'] = $id;
        $result = false;
        $result = $this->goodsProductInfo($where);
        return $result;
    }

    /**
     * 关联查询商品折扣类型详情（goods_product,goods,store，goods_dt_record, goods_discounttype）
     * 创建人 刘勇豪
     *
     * 备注：当要获取指定拍品的指定折扣详情时，$where一定要带 gp_id 和 gdt_id
     * 例如：$where = ['gp.gp_id'=>1,'gdr.gdr_id'=>2];
     */
    public function getGoodsStoreInfo($where,$field='*'){
        $info = Db::table("pai_point_goods_product")->alias('pgp')
            ->field($field)
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->join('pai_store s', 'pg.g_storeid = s.store_id', 'left')
            ->where($where)
            ->find();
        return $info;

    }

}