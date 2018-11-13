<?php
/**
* 图片类型Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-07-06
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\webImagesType;
use app\data\model\webImagesType;
use app\data\model\webImagesType\WebImagesTypeModel  as WebImagesTypeModel;
use app\data\service\BaseService as BaseService;

class WebImagesTypeService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->webImagesType = new WebImagesTypeModel();
		$this->cache = 'web_images_type';
	}
	
    /**
     * 查询图片类型列表
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeList($where='', $field='*', $order='wit_id asc')
	{
		$list = $this->webImagesType->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取图片类型信息
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeInfo($where='', $field='*')
	{		
		$info =  $this->webImagesType->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计图片类型数量
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeCount($where='')
	{		
		$Count =  $this->webImagesType->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00           
     */	
	public function webImagesTypeSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->webImagesType->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00           
     */	
	public function webImagesTypeSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->webImagesType->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00          
     */	
	public function webImagesTypeColumn($where='', $field='')
	{		
		$Column =  $this->webImagesType->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条图片类型数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeAdd($data='')
	{
		$list = $this->webImagesType->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条图片类型数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeAddAll($data='')
	{
		$list = $this->webImagesType->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 图片类型分页查询(旧)
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypePageList($where='', $field='*', $order="wit_id asc", $page=15)
	{
		
		$list = $this->webImagesType->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}

    /**
     * 图片类型分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function webImagesTypePaginate($where='', $field='*', $order="wit_id asc",$page=15)
    {
        $list = $this->webImagesType->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新图片类型数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
    public function webImagesTypeSave($where="", $data="")
    {	
        $save = $this->webImagesType->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条图片类型数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00      
     */
    public function webImagesTypeDel($where='')
    {		
        $del = $this->webImagesType->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条图片类型数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00       
     */
    public function webImagesTypeDelMost($id_arr='')
    {		
        $delAll = $this->webImagesType->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 图片类型列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeListShow($type=0) 
	{
    	$where = array();
		
		$where['wit_id'] = array('>',0);
    	$lists  = $this->webImagesTypePageList($where);
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
     * 按条件更新图片类型
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeRoomEdit() 
	{
		$id = input('get.wit_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['wit_id'] = $id;
		$result = false;		
    	$result = $this->webImagesTypeInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理图片类型
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeRoomEditDoo() 
	{
		$id = input('post.wit_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 图片类型POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['wit_id'] = $id;
		if($this->webImagesTypeSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除图片类型操作
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeRoomDel() 
	{
		$id = input('post.wit_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['wit_id'] = $id;
    	$info = $this->typeInfo($where);
		if($info && $this->typeDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}	
	
    /**
     * 批量删除图片类型
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->typeDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 添加一条图片类型
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function webImagesTypeRoomAdd() 
	{
		// 图片类型POST数据
		$type = 'add';
		$data = $this->inputData($type);		
		if($this->typeAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 图片类型POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-06 10:30:00
     */
	public function inputData($type) 
	{
		$data = array();
		switch($type)
		{
			case 'edit';
			break;
			case 'add';
			break;
		}   	
		$data['wit_name']    = input('post.wit_name','');
		$data['wit_code']    = input('post.wit_code','');
		return $data;
	}

    /**
     * 数据验证
     * 创建人 刘勇豪
     * 时间 2018-07-06 10:30:00
     */
    public function checkData($data=[]){
        $error_msg = "";
        //图片分类名
        if(isset($data['wit_name'])){
            if($data['wit_name'] == ''){
                $error_msg .= "图片类型名不能为空";
            }
        }
        //图片分类字段
        if(isset($data['wit_code'])){
            if($data['wit_code'] == ''){
                $error_msg .= "图片分类字段不能为空";
            }
        }

        return $error_msg;
    }

    /**
     * 获取分类图片
     * 邓赛赛
     */
    public function get_web_img($where=[],$order='wi.wi_id asc',$field='*',$cache=''){
        $list = $this->webImagesType->webImg($where,$order,$field,$cache);
        return $list;
    }
}