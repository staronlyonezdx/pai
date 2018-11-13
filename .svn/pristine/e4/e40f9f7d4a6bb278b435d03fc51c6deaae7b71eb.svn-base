<?php
/**
* 积分评论图片Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-07-11
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\pointReview;
use app\data\model\pointReview\PointReviewgoodsimgsModel  as PointReviewgoodsimgsModel;
use app\data\service\BaseService as BaseService;

class ReviewgoodsimgsService extends BaseService
{
	protected $cache = 'point_review_goods_imgs';
	
	public function __construct()
	{
		parent::__construct();
		$this->pointReviewGoodsImgs = new PointReviewgoodsimgsModel();
		$this->cache = 'point_review_goods_imgs';
		
	}
	
    /**
     * 查询积分评论图片列表
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsList($where='', $order='rgi_id asc', $field='*', $cache='point_review_goods_imgs')
	{	
		$list = $this->pointReviewGoodsImgs->getList($where, $order, $field, $cache);
		return $list;
	}
	
    /**
     * 获取积分评论图片信息
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsInfo($where='', $field='*')
	{		
		$info =  $this->pointReviewGoodsImgs->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计积分评论图片数量
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsCount($where='')
	{		
		$Count =  $this->pointReviewGoodsImgs->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00           
     */	
	public function pointReviewGoodsImgsSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->pointReviewGoodsImgs->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00           
     */	
	public function pointReviewGoodsImgsSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->pointReviewGoodsImgs->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00          
     */	
	public function pointReviewGoodsImgsColumn($where='', $field='')
	{		
		$Column =  $this->pointReviewGoodsImgs->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条积分评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsAdd($data='')
	{
		$list = $this->pointReviewGoodsImgs->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条积分评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsAddAll($data='')
	{
		$list = $this->pointReviewGoodsImgs->getAddAll($data, $this->cache);
		return $list;
	}

	/**
     * 积分评论图片分页查询
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function pointReviewGoodsPaginate($where='', $field='*', $order="rgi_id asc",$page=15)
    {
        $list = $this->pointReviewGoodsImgs->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新积分评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
    public function pointReviewGoodsImgsSave($where="", $data="")
    {	
        $save = $this->pointReviewGoodsImgs->getSave($where, $data, $this->cache);
		return $save;
    }
	
    /**
     * 删除一条积分评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
    public function pointReviewGoodsDel($where='')
    {		
        $del = $this->pointReviewGoodsImgs->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条积分评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00       
     */
    public function pointReviewGoodsImgsDelMost($id_arr='')
    {		
        $delAll = $this->pointReviewGoodsImgs->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
	 /**
     * 按条件添加一条积分评论图片(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsRoomAdd() 
	{
		//积分评论图片POST数据
		$type = 'add' ;
		$data = $this->inputData($type);
		if($this->pointReviewGoodsImgsAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 按条件更新积分评论图片(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsRoomEdit() 
	{
		$id = input('get.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
    	$result = $this->pointReviewGoodsImgsInfo("ID=$id");
		return $result;
	}
	
    /**
     * 按条件修改处理积分评论图片(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsRoomEditDoo() 
	{
		$info = $this->pointReviewGoodsImgsInfo($where);
		
		if($info && $this->pointReviewGoodsImgsSave($where, $data))
		{	
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 积分评论图片POST数据(todo)
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
     * 删除积分评论图片操作
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function pointReviewGoodsImgsRoomDel() 
	{
		$id = input('post.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['rgi_id'] = $id;		
    	$info = $this->pointReviewGoodsImgsInfo($where);
		if($info && $this->pointReviewGoodsImgsDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}
}