<?php
/**
* 商品评价Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-07-11
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\review;
use app\data\model\review\ReviewgoodsModel  as ReviewgoodsModel;
use app\data\service\BaseService as BaseService;

class ReviewgoodsService extends BaseService 
{
	protected $cache = 'review_goods';
	
	public function __construct()
	{
		parent::__construct();
		$this->reviewGoods = new ReviewgoodsModel();
		$this->cache = 'review_goods';
		
	}
	
    /**
     * 查询商品评价列表
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsList($where='', $order='rg_id desc', $field='*', $cache='review_goods')
	{	
		$list = $this->reviewGoods->getList($where, $order, $field, $cache);
		return $list;
	}
	
    /**
     * 获取商品评价信息
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsInfo($where='', $field='*')
	{		
		$info =  $this->reviewGoods->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计商品评价数量
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsCount($where='')
	{		
		$Count =  $this->reviewGoods->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00           
     */	
	public function reviewGoodsSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->reviewGoods->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00           
     */	
	public function reviewGoodsSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->reviewGoods->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00          
     */	
	public function reviewGoodsColumn($where='', $field='')
	{		
		$Column =  $this->reviewGoods->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsAdd($data='')
	{
		$list = $this->reviewGoods->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsAddAll($data='')
	{
		$list = $this->reviewGoods->getAddAll($data, $this->cache);
		return $list;
	}

	/**
     * 商品评价分页查询
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function reviewGoodsPaginate($where='', $field='*', $order="rg_id asc",$page=15)
    {
        $list = $this->reviewGoods->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
    public function reviewGoodsSave($where="", $data="")
    {	
        $save = $this->reviewGoods->getSave($where, $data, $this->cache);
		return $save;
    }
	
    /**
     * 删除一条商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
    public function reviewGoodsDel($where='')
    {		
        $del = $this->reviewGoods->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条商品评价数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00       
     */
    public function reviewGoodsDelMost($id_arr='')
    {		
        $delAll = $this->reviewGoods->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
	 /**
     * 按条件添加一条商品评价(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsRoomAdd() 
	{
		//商品评价POST数据
		$type = 'add' ;
		$data = $this->inputData($type);
		if($this->reviewGoodsAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 按条件更新商品评价(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsRoomEdit() 
	{
		$id = input('get.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
    	$result = $this->reviewGoodsInfo("ID=$id");
		return $result;
	}
	
    /**
     * 按条件修改处理商品评价(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsRoomEditDoo() 
	{
		$info = $this->reviewGoodsInfo($where);
		
		if($info && $this->reviewGoodsSave($where, $data))
		{	
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 商品评价POST数据(todo)
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
     * 删除商品评价操作
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsRoomDel() 
	{
		$id = input('post.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['rg_id'] = $id;		
    	$info = $this->reviewGoodsInfo($where);
		if($info && $this->reviewGoodsDel($where))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}

	/**
     * 获取单个商品评价平均值
     * 邓赛赛
     */
	public function getAvg($where,$field){
        $avg = $this->reviewGoods->get_avg($where,$field);
        return $avg;
    }
}