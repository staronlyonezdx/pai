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

namespace app\data\service\store;
use app\data\model\store\StoreCategoryModel  as StoreCategoryModel;
use app\data\service\BaseService as BaseService;

class StoreCategoryService extends BaseService
{
	protected $cache = 'storecategory';
	
	public function __construct()
	{
		parent::__construct();	
		$this->storecategory = new StoreCategoryModel();
		$this->cache = 'storecategory';
		//统计分类种类数量
		$cache = $this->cache;
		$count = \think\Cache::get($cache.'Count');
		if(!$count)
		{
			$where['sc_id']=array('>',0);
			$count = $this->storecategoryCount();
			\think\Cache::set($cache.'Count',$count);
		}
	}
	
    /**
     * 查询店铺分类列表
     */
	public function storecategoryList($where='', $field='*', $order='sc_sort asc', $cache='storecategory')
	{
		$list = $this->storecategory->getList($where, $order, $field, $cache);
		return $list;
	}
	
    /**
     * 获取店铺分类信息
     */
	public function storecategoryInfo($where='', $field='*')
	{		
		$info =  $this->storecategory->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计店铺分类数量
     */
	public function storecategoryCount($where='')
	{		
		$Count =  $this->storecategory->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
     */	
	public function gclassSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->storecategory->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
     */	
	public function storecategorySetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->storecategory->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
     */	
	public function storecategoryColumn($where='', $field='')
	{		
		$Column =  $this->storecategory->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条店铺分类数据
     */
	public function storecategoryAdd($data='')
	{
		$list = $this->storecategory->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条店铺分类数据
     */
	public function storecategoryAddAll($data='')
	{
		$list = $this->storecategory->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 商家分类分页查询
     */
	public function storecategoryPageList($data)
	{
		$lable = array();
		//合并数组
		$lable = parent::mergeArray($data);		
		$where = $lable['where'];
		$field = $lable['field'];
		if(empty($lable['order'])){			
			$order = 'sc_sort asc';
		}else{
			$order = $lable['order'];
		}	
		$page  = $lable['page'];
		$cache = $lable['cache'];		
		//后台默认不分类缓存
		if(!$where && $cache===''){
			$cache = $this->cache; 
		}		
		//有条件情况下
		if($where){}		
		$list = $this->storecategory->getPageList($where, $field, $order, $page, $cache);
		return $list;
	}
	
	/**
     * 更新商家分类数据
     */
    public function storecategorySave($where="", $data="")
    {	
        $save = $this->storecategory->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条商家分类数据
     */
    public function storecategoryDel($where='')
    {		
        $del = $this->storecategory->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条商家分类数据
     */
    public function storecategoryDelMost($id_arr='')
    {		
        $delAll = $this->storecategory->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	

	
    /**
     * 商家分类POST数据
     */
	public function inputData($type) 
	{
		$data = array();
		switch($type)
		{
			case 'edit';
			break;
			case 'add';			
			$data['addtime']         = time();			
			break;
		}   	
		$data['name_en']      = input('post.name_en');
		$data['name_ch']      = input('post.name_ch');			
		$data['pid']          = input('post.pid');			
		$data['sort']         = input('post.sort');	
		$data['states']       = 1 ;				
		input('post.description') && $data['description'] = htmlentities(input('post.description'));		
		return $data;
	}


	
}