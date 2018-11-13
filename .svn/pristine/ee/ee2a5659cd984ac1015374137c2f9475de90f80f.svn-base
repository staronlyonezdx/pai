<?php
/**
* 角色组Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\adminRole;
use app\data\model\adminRole;
use app\data\model\adminRole\AdminRoleModel  as AdminRoleModel;
use app\data\service\BaseService as BaseService;

class AdminRoleService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->adminRole = new AdminRoleModel();
		$this->cache = 'admin_role';
	}
	
    /**
     * 查询角色组列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleList($where='', $field='*', $order='role_id asc')
	{
		$list = $this->adminRole->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取角色组信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleInfo($where='', $field='*')
	{		
		$info =  $this->adminRole->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计角色组数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleCount($where='')
	{		
		$Count =  $this->adminRole->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00           
     */	
	public function adminRoleSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->adminRole->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00           
     */	
	public function adminRoleSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->adminRole->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00          
     */	
	public function adminRoleColumn($where='', $field='')
	{		
		$Column =  $this->adminRole->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条角色组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleAdd($data='')
	{
		$list = $this->adminRole->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条角色组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleAddAll($data='')
	{
		$list = $this->adminRole->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 角色组分页查询
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRolePageList($where='', $field='*', $order="role_id asc", $page=15)
	{
		
		$list = $this->adminRole->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}
	
	/**
     * 更新角色组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
    public function adminRoleSave($where="", $data="")
    {	
        $save = $this->adminRole->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条角色组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00      
     */
    public function adminRoleDel($where='')
    {		
        $del = $this->adminRole->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条角色组数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00       
     */
    public function adminRoleDelMost($id_arr='')
    {		
        $delAll = $this->adminRole->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 角色组列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleListShow($type=0) 
	{
    	$where = array();
		
		$where['role_id'] = array('>',0);
    	$lists  = $this->adminRolePageList($where);
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
     * 按条件更新角色组
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleRoomEdit() 
	{
		$id = input('get.role_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['role_id'] = $id;
		$result = false;		
    	$result = $this->adminRoleInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理角色组
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleRoomEditDoo() 
	{
		$id = input('post.role_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 角色组POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['role_id'] = $id;
		if($this->adminRoleSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除角色组操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleRoomDel() 
	{
		$id = input('post.role_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['role_id'] = $id;
    	$info = $this->roleInfo($where);
		if($info && $this->roleDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}	
	
    /**
     * 批量删除角色组
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->roleDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 添加一条角色组
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function adminRoleRoomAdd() 
	{
		// 角色组POST数据
		$type = 'add';
		$data = $this->inputData($type);		
		if($this->roleAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 角色组POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function inputData($type) 
	{
		$data = array();
		switch($type)
		{
			case 'edit';
			break;
			case 'add';
				$data['Dtime'] = date('Y-m-d H:i:s',time()) ;
			break;
		}   	
		$data['Rolename']    = input('post.rolename');
		$data['Description'] = input('post.description');
		$data['Competence']  = input('post.comp');
		$data['Status']      = input('post.status');		
		return $data;
	}
	
}