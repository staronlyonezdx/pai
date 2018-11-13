<?php
/**
* 省市区地址Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州拍吖吖科技有限公司
* 创建日期 2018-06-25
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\region;
use app\data\model\region\RegionModel  as RegionModel;
use app\data\service\BaseService as BaseService;

class RegionService extends BaseService
{
	protected $cache = '';

	public function __construct()
	{
		parent::__construct();
		$this->region = new RegionModel();
		$this->cache = 'region';
	}
	
    /**
     * 查询省市区地址列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionList($where='', $order='region_id desc', $field='*', $cache='region')
	{	
		$list = $this->region->getList($where, $order, $field, $cache);
		return $list;
	}

	
    /**
     * 获取省市区地址信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionInfo($where='', $field='*')
	{		
		$info =  $this->region->getInfo($where, $field, $this->cache);
		return $info;
	}

    /**
     * 获取省市区名字
     * 创建人 刘勇豪
     * 时间 2018-06-25 10:30:00
     */
    public function regionName($region_id=0)
    {
        if(!$region_id){
            return false;
        }
        $info =  $this->region->getInfo(['region_id'=>$region_id],'region_name',$this->cache);
        $region_name = '';
        if(!empty($info) && $info['region_name']){
            $region_name = $info['region_name'];
        }
        return $region_name;
    }

    /**
     * 获取省市区名字（所有商品的）
     * 创建人 刘勇豪
     * 时间 2018-06-25 10:30:00
     */
    public function regionName_by_region_code($region_code=0)
    {
        if(!$region_code){
            return false;
        }
        $info =  $this->region->getInfo(['region_code'=>$region_code],'region_name',$this->cache);
        $region_name = '';
        if(!empty($info) && $info['region_name']){
            $region_name = $info['region_name'];
        }
        return $region_name;
    }
	
    /**
     * 条件统计省市区地址数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionCount($where='')
	{		
		$Count =  $this->region->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00           
     */	
	public function regionSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->region->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00           
     */	
	public function regionSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->region->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00          
     */	
	public function regionColumn($where='', $field='')
	{		
		$Column =  $this->region->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条省市区地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionAdd($data='')
	{
		$list = $this->region->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条省市区地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionAddAll($data='')
	{
		$list = $this->region->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 省市区地址分页查询
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionPageList($data)
	{
		$lable = array();
		//合并数组
		$lable = parent::mergeArray($data);		
		$where = $lable['where'];
		$field = $lable['field'];
		if(empty($lable['order'])){			
			$order = 'region_id desc';
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
		$list = $this->region->getPageList($where, $field, $order, $page, $cache);
		return $list;
	}
	
	/**
     * 更新省市区地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
    public function regionSave($where="", $data="")
    {	
        $save = $this->region->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条省市区地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00      
     */
    public function regionDel($where='')
    {		
        $del = $this->region->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条省市区地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00       
     */
    public function regionDelMost($id_arr='')
    {		
        $delAll = $this->region->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 省市区地址列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionListShow($type=0, $field='*', $c_pid=0, $page=15) 
	{
    	$where = array();
		$data = array();
		$cache = '';
		$where['region_id'] = array('>',0);
		$data['where'] = $where ;
		$data['field'] = $field;
		$data['page'] = $page;
		$data['cache'] = $cache;
    	$lists  = $this->regionPageList($data);
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
     * 按条件添加一条省市区地址
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionRoomAdd() 
	{
		//省市区地址POST数据
		$type = 'add' ;
		$data = $this->inputData($type);
		if($this->regionAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 按条件更新省市区地址
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionRoomEdit() 
	{
		$id = input('get.region_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
    	$result = $this->regionInfo("region_id=$id");
		return $result;
	}
	
    /**
     * 按条件修改处理省市区地址
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionRoomEditDoo() 
	{
		$id = input('post.region_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		//省市区地址POST数据
		$type = 'edit' ;
		$data = $this->inputData($type);
		$where = array();		
		$where['region_id'] = $id;
		$info = $this->regionInfo($where);
		
		if($info && $this->regionSave($where, $data))
		{
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 省市区地址POST数据(要重写TODO。。。)
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function inputData($type) 
	{
		$data = array();
		switch($type)
		{
			case 'edit';
			break;
			case 'add';	
				$data['addtime'] = time();
			break;
		}  
		input('post.email') && $data['email'] = input('post.email');
		input('post.phone') &&	$data['phone'] = input('post.phone');
		input('post.tel') && $data['tel'] = input('post.tel');
		input('post.skype') && $data['skype'] = input('post.skype');
		input('post.contacts') && $data['contacts'] = input('post.contacts');
		input('post.region') && $data['region'] = input('post.region');		
		
		return $data;
	}
	
    /**
     * 删除省市区地址操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionRoomDel() 
	{
		$id = input('post.region_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['region_id'] = $id;
    	$info = $this->regionInfo($where);
		if($info && $this->regionDel($where))
		{				
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 批量删除省市区地址分类
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function regionRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->regionDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
}