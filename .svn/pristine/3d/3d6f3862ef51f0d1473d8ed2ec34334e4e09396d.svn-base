<?php
/**
* 积分商品评价Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-07-11
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\pointReview;
use app\data\model\pointReview\PointReviewgoodsModel  as PointReviewgoodsModel;
use app\data\service\BaseService as BaseService;

class ReviewgoodsService extends BaseService
{
	protected $cache = 'point_review_goods';
	
	public function __construct()
	{
		parent::__construct();
		$this->pointReviewGoods = new PointReviewgoodsModel();
		$this->cache = 'point_review_goods';
		
	}
	
    /**
     * 查询积分商品评价列表
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsList($where='', $order='rg_id desc', $field='*', $cache='point_review_goods')
	{	
		$list = $this->pointReviewGoods->getList($where, $order, $field, $cache);
		return $list;
	}
	
    /**
     * 获取积分商品评价信息
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsInfo($where='', $field='*')
	{		
		$info =  $this->pointReviewGoods->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计积分商品评价数量
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsCount($where='')
	{		
		$Count =  $this->pointReviewGoods->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00           
     */	
	public function pointReviewGoodsSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->pointReviewGoods->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00           
     */	
	public function pointReviewGoodsSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->pointReviewGoods->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00          
     */	
	public function pointReviewGoodsColumn($where='', $field='')
	{		
		$Column =  $this->pointReviewGoods->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条积分商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsAdd($data='')
	{
		$list = $this->pointReviewGoods->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条积分商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsAddAll($data='')
	{
		$list = $this->pointReviewGoods->getAddAll($data, $this->cache);
		return $list;
	}

	/**
     * 积分商品评价分页查询
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function pointReviewGoodsPaginate($where='', $field='*', $order="rg_id asc",$page=15)
    {
        $list = $this->pointReviewGoods->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新积分商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
    public function pointReviewGoodsSave($where="", $data="")
    {	
        $save = $this->pointReviewGoods->getSave($where, $data, $this->cache);
		return $save;
    }
	
    /**
     * 删除一条积分商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
    public function pointReviewGoodsDel($where='')
    {		
        $del = $this->pointReviewGoods->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条积分商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00       
     */
    public function pointReviewGoodsDelMost($id_arr='')
    {		
        $delAll = $this->pointReviewGoods->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
	 /**
     * 按条件添加一条积分商品评价(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsRoomAdd() 
	{
		//积分商品评价POST数据
		$type = 'add' ;
		$data = $this->inputData($type);
		if($this->pointReviewGoodsAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 按条件更新积分商品评价(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsRoomEdit() 
	{
		$id = input('get.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
    	$result = $this->pointReviewGoodsInfo("ID=$id");
		return $result;
	}
	
    /**
     * 按条件修改处理积分商品评价(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsRoomEditDoo() 
	{
		$info = $this->pointReviewGoodsInfo($where);
		
		if($info && $this->pointReviewGoodsSave($where, $data))
		{	
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 积分商品评价POST数据(todo)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function inputData($type) 
	{
		$data = array();
		switch($type)
		{
			case 'edit';
			break;
			case 'add';	
				$data['Dtime'] = date('Y-m-d H:i:s',time());
			break;
		}   	
		input('post.classname') &&	$data['ClassName'] = input('post.classname');
		
		return $data;
	}
	
    /**
     * 删除积分商品评价操作
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsRoomDel() 
	{
		$id = input('post.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['rg_id'] = $id;		
    	$info = $this->pointReviewGoodsInfo($where);
		if($info && $this->pointReviewGoodsDel($where))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}

	/**
     * 获取单个积分商品评价平均值
     * 邓赛赛
     */
	public function getAvg($where,$field){
        $avg = $this->pointReviewGoods->get_avg($where,$field);
        return $avg;
    }
}