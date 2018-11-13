<?php
/**
* 评论图片Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-07-11
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\review;
use app\data\model\review\ReviewgoodsimgsModel  as ReviewgoodsimgsModel;
use app\data\service\BaseService as BaseService;

class ReviewgoodsimgsService extends BaseService 
{
	protected $cache = 'review_goods_imgs';
	
	public function __construct()
	{
		parent::__construct();
		$this->reviewGoodsImgs = new ReviewgoodsimgsModel();
		$this->cache = 'review_goods_imgs';
		
	}
	
    /**
     * 查询评论图片列表
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsList($where='', $order='rgi_id asc', $field='*', $cache='review_goods_imgs')
	{	
		$list = $this->reviewGoodsImgs->getList($where, $order, $field, $cache);
		return $list;
	}
	
    /**
     * 获取评论图片信息
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsInfo($where='', $field='*')
	{		
		$info =  $this->reviewGoodsImgs->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计评论图片数量
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsCount($where='')
	{		
		$Count =  $this->reviewGoodsImgs->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00           
     */	
	public function reviewGoodsImgsSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->reviewGoodsImgs->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00           
     */	
	public function reviewGoodsImgsSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->reviewGoodsImgs->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00          
     */	
	public function reviewGoodsImgsColumn($where='', $field='')
	{		
		$Column =  $this->reviewGoodsImgs->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsAdd($data='')
	{
		$list = $this->reviewGoodsImgs->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsAddAll($data='')
	{
		$list = $this->reviewGoodsImgs->getAddAll($data, $this->cache);
		return $list;
	}

	/**
     * 评论图片分页查询
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function reviewGoodsPaginate($where='', $field='*', $order="rgi_id asc",$page=15)
    {
        $list = $this->reviewGoodsImgs->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
    public function reviewGoodsImgsSave($where="", $data="")
    {	
        $save = $this->reviewGoodsImgs->getSave($where, $data, $this->cache);
		return $save;
    }
	
    /**
     * 删除一条评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
    public function reviewGoodsDel($where='')
    {		
        $del = $this->reviewGoodsImgs->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条评论图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00       
     */
    public function reviewGoodsImgsDelMost($id_arr='')
    {		
        $delAll = $this->reviewGoodsImgs->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
	 /**
     * 按条件添加一条评论图片(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsRoomAdd() 
	{
		//评论图片POST数据
		$type = 'add' ;
		$data = $this->inputData($type);
		if($this->reviewGoodsImgsAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 按条件更新评论图片(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsRoomEdit() 
	{
		$id = input('get.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
    	$result = $this->reviewGoodsImgsInfo("ID=$id");
		return $result;
	}
	
    /**
     * 按条件修改处理评论图片(TODO ...)
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsRoomEditDoo() 
	{
		$info = $this->reviewGoodsImgsInfo($where);
		
		if($info && $this->reviewGoodsImgsSave($where, $data))
		{	
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 评论图片POST数据(todo)
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
     * 删除评论图片操作
	 * 创建人 刘勇豪
	 * 时间 2018-07-11 16:09:00
     */
	public function reviewGoodsImgsRoomDel() 
	{
		$id = input('post.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['rgi_id'] = $id;		
    	$info = $this->reviewGoodsImgsInfo($where);
		if($info && $this->reviewGoodsImgsDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}
}