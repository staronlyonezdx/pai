<?php
/**
* 权限组Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\adminAuthority;
use app\data\model\adminAuthority;
use app\data\model\adminAuthority\AdminAuthorityModel  as AdminAuthorityModel;
use app\data\service\BaseService as BaseService;

class AdminAuthorityService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->adminAuthority = new AdminAuthorityModel();
		$this->cache = 'admin_authority';
	}
	
    /**
     * 查询权限组列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityList($where='', $field='*', $order='authority_id asc')
	{
		$list = $this->adminAuthority->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取权限组信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityInfo($where='', $field='*')
	{		
		$info =  $this->adminAuthority->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计权限组数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityCount($where='')
	{		
		$Count =  $this->adminAuthority->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00           
     */	
	public function adminAuthoritySetField($where='', $field='', $data='')
	{		
		$SetField =  $this->adminAuthority->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00           
     */	
	public function adminAuthoritySetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->adminAuthority->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00          
     */	
	public function adminAuthorityColumn($where='', $field='')
	{		
		$Column =  $this->adminAuthority->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条权限组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityAdd($data='')
	{
		$list = $this->adminAuthority->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条权限组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityAddAll($data='')
	{
		$list = $this->adminAuthority->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 权限组分页查询
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityPageList($where='', $field='*', $order="authority_id asc", $page=15)
	{
		
		$list = $this->adminAuthority->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}
	
	/**
     * 更新权限组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
    public function adminAuthoritySave($where="", $data="")
    {	
        $save = $this->adminAuthority->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条权限组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00      
     */
    public function adminAuthorityDel($where='')
    {		
        $del = $this->adminAuthority->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条权限组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00       
     */
    public function adminAuthorityDelMost($id_arr='')
    {		
        $delAll = $this->adminAuthority->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 权限组列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityListShow($type=0) 
	{
    	$where = array();
		
		$where['authority_id'] = array('>',0);
    	$lists  = $this->adminAuthorityPageList($where);
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
     * 按条件更新权限组
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityRoomEdit() 
	{
		$id = input('get.authority_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['authority_id'] = $id;
		$result = false;		
    	$result = $this->adminAuthInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理权限组
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityRoomEditDoo() 
	{
		$authority_id = input('post.authority_id');
		if ($authority_id=='' || !is_numeric($authority_id)) {
			return false;
		}
		$authority_id=intval($authority_id);
		// 权限组POST数据

		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['authority_id'] = $authority_id;
		if($this->adminAuthoritySave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除权限组操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityRoomDel() 
	{
		$id = input('post.authority_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['authority_id'] = $id;
    	$info = $this->adminAuthorityInfo($where);
		if($info && $this->adminAuthorityDel($where))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}	
	
    /**
     * 批量删除权限组
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->authorityDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 添加一条权限组
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function adminAuthorityRoomAdd() 
	{
		// 权限组POST数据
		$type = 'add';
		$data = $this->inputData($type);		
		if($this->adminAuthorityAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 权限组POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-22 10:51:00
     */
	public function inputData($type) 
	{
		$data = array();
		$data['authority_name']    = input('post.authority_name');
		$data['authority_parent_id'] = input('post.authority_parent_id');
		return $data;
	}
	
}