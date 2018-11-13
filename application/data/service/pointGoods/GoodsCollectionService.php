<?php
/**
* 公共Service
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\pointGoods;
use app\data\model\pointGoods\GoodsCollectionModel  as GoodsCollectionModel;
use app\data\model\pointGoods\PointGoodsModel;
use app\data\service\BaseService as BaseService;
use think\Db;

class GoodsCollectionService extends BaseService
{
	protected $cache = 'point_goods_collection';
	
	public function __construct()
	{
		parent::__construct();	
		$this->goods_collection = new GoodsCollectionModel();
		$this->cache = 'point_goods_collection';
	}
	
    /**
     * 查询商品收藏列表
	 * 创建人 邓赛赛
	 * 时间 2017-07-14 11:10:21
     */
	public function collectionList($where='', $field='*', $order='sort asc', $cache='gclass')
	{
		$list = $this->goods_collection->getList($where, $order, $field, $cache);
		return $list;
	}

    /**
     * 收藏商品分页查询
     * 邓赛赛
     */
    public function collectionPage($where,$order='gdr.gdr_price asc',$field='*',$offset='0',$page_size='20'){
	    $list = Db($this->cache)
            ->alias('gc')
            ->where($where)
            ->order($order)
            ->field($field)
            ->join('pai_goods g','gc.g_id=g.g_id','left')
            ->join('pai_goods_dt_record gdr','gdr.g_id=g.g_id','left')
            ->join('pai_goods_product gp','gp.g_id=g.g_id','left')
            ->limit($offset,$page_size)
            ->group('gdr.g_id')
            ->select();
	    $pai_where = [
            'o_paystate'=>2,
            'o_state'=>1
        ];
	    foreach($list as $k =>$v){
            $pai_where['gp_id'] = $v['gp_id'];
            $list[$k]['gp_num'] = Db::table('pai_order_pai')->order('o_periods desc')->where($pai_where)->sum('gp_num');
        }
	    return $list;
    }

    /**
     * 商品收藏数量
     * 邓赛赛
     */
    public function collection_num($where){
        $count = $this->goods_collection->get_count_num($where);
//        $count = Db($this->cache)
//            ->alias('gc')
//            ->where($where)
//            ->join('pai_goods g','gc.g_id=g.g_id','left')
//            ->join('pai_goods_dt_record gdr','gdr.g_id=g.g_id','left')
//            ->join('pai_goods_product gp','gp.g_id=g.g_id','left')
//            ->group('gdr.g_id')
//            ->count();
        return $count;
    }

    /**
     * @param $where
     * @param string $order
     * @param string $field
     * @param string $offset
     * @param string $page_size
     * 收藏商品推荐列表
     * 邓赛赛
     */
    public function collection_tj($where,$order='gdr.gdr_price asc',$field='*',$offset='0',$page_size='20'){
        $goods = new GoodsModel();
        $list = $goods->goodsCollectionTj($where,$order,$field,$offset,$page_size);
        return $list;
    }

    /**
     * 获取列表
     * 邓赛赛
     */
    public function collection_list($where,$order='g_id desc',$field,$cache){
        $list = $this->goods_collection->getList($where,$order,$field,$cache);
        return $list;
    }


	
    /**
     * 获取一条收藏商品信息
	 * 创建人 邓赛赛
	 * 时间 2017-07-14 11:40:09
     */
	public function collectionInfo($where='', $field='*')
	{		
		$info =  $this->goods_collection->getInfo($where, $field, $this->cache);
		return $info;
	}

    /**
     * 添加一条收藏商品数据
     * 创建人 邓赛赛
     * 时间 2017-09-10 20:10:00
     */
    public function collectionAdd($data='')
    {
        $list = $this->goods_collection->getAdd($data, $this->cache);
        return $list;
    }

    /**
     *删除一条收藏的商品
     * 邓赛赛
     */
    public function collectionDel($where,$cache=''){
        $list = $this->goods_collection->getDel($where, $cache);
        return $list;
    }

    /**
     * 删除多条藏品
     * 邓赛赛
     */
    public function del_multiple_collection($where){
        $res = $this->goods_collection->del_multiple($where);
        return $res;
    }
    /**
     * 条件统计商品分类数量
	 * 创建人 邓赛赛
	 * 时间 2017-07-14 11:40:09
     */
	public function collectionCount($where='')
	{		
		$Count =  $this->goods_collection->getCount($where);
		return $Count;
	}

    /**
     * 查询某一列的值
	 * 创建人 邓赛赛
	 * 时间 2017-09-06 22:31:22          
     */	
	public function collectionColumn($where='', $field='')
	{		
		$Column =  $this->goods_collection->getColumn($where, $field);
		return $Column;
	}
	

	


	

	
}