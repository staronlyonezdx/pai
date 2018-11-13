<?php
/**
* 商品品牌Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\goodsDiscounttype;
use app\data\model\goodsBrand;
use app\data\model\goodsBrand\GoodsBrandModel  as GoodsBrandModel;
use app\data\model\goodsDiscounttype\GoodsDiscounttypeModel;
use app\data\service\BaseService as BaseService;
use think\Cookie;
use think\Db;

class GoodsDiscounttypeService extends BaseService
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();
		$this->goodsDiscounttype = new GoodsDiscounttypeModel();
		$this->cache = 'goods_discounttype';
	}

    /**
     *获取 列表
     * 创建人 邓赛赛
     * 时间 2018-06-20 10:51:00
     */
    public function goods_discounttype_list($where='',  $order="gdt_id asc", $field="*")
    {
        $list = $this->goodsDiscounttype->getList($where,$order,$field,'');
        return $list;
    }
    /**
     * 更新折扣数据
     * 创建人 邓赛赛
     * 时间 2018-06-20 10:51:00
     */
    public function goods_discounttype_save($where="", $data="")
    {
        if(!empty($data['gdt_img'])){
            $img_url = $this->upload('shop','gdt_img');
            if($img_url){
                $data['gdt_img'] = $img_url;
            }
        }
        $save = $this->goodsDiscounttype->getSave($where, $data, $this->cache);
        return $save;
    }

    /**
     * 获取一条折扣数据
     * 创建人 邓赛赛
     * 时间 2018-06-20 10:51:00
     */
    public function goods_discounttype_info($where, $field="*")
    {
        $res = $this->goodsDiscounttype->getInfo($where,$field);
        return $res;
    }

    /**
     * 添加一条折扣
     * @param $data
     * @return bool|int|string
     * 邓赛赛
     */
    public function goods_discounttype_add($data){
        if($data['gdt_img']){
            $img_url = $this->upload('shop','gdt_img');
            if($img_url){
                $data['gdt_img'] = $img_url;
            }
        }
        $res = $this->goodsDiscounttype->getAdd($data);
        return $res;
    }

    /**
     * 关联查询所有 折扣人数 和 折扣类型
     * @param string $where
     * @param string $order
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     * 刘勇豪
     */
    public function get_record_discount($where='',  $order="gdr.gdr_id asc", $field="*"){
        $list = Db::table("pai_goods_dt_record")->alias('gdr')
            ->where($where)
            ->field($field)
            ->join('pai_goods_discounttype gdt', 'gdr.gdt_id=gdt.gdt_id','left')
            ->order($order)
            ->select();
        return $list;
    }

}