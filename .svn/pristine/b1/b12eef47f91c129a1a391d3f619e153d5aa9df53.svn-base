<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;

class Role extends Admin
{
    /**
     * 权限组列表
	 * 创建人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */
	public function index() 
	{
		parent::userauthHtml(7);
		$keyword = input('request.keyword');
		$role = new \app\data\service\role\RoleService();
		$type = 1;
		$lists  = $role->roleListShow($type);
		$volist = $lists->toArray();
		$this->assign('volist',$volist);			
		$this->assign('keyword',$keyword);
		$this->assign('lists',$lists);
		return $this->fetch();
	}
	
    /**
     * 添加角色
	 * 创建人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */	
	public function roleadd() 
	{
		parent::userauthHtml(8);		
		$compt = new \app\data\service\competence\CompetenceService();
		$result = parent::comptList();
		
		$this->assign('slist',$result['slist']);
		$this->assign('volist',$result['volist']);
		return $this->fetch('add');
	}
	
    /**
     * 添加角色处理
	 * 创建人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */	
	public function roleadd_do() 
	{
		//验证用户权限
		parent::userauth(8);
		if (request()->isAjax()) 
		{
			$role = new \app\data\service\role\RoleService();
			$result = $role->roleRoomAdd();
			if ($result) 
			{
				parent::operating(request()->path(),0,'新增成功');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'新增失败');
				return array('s'=>'新增失败');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
	
    /**
     * 修改角色信息
	 * 创建人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */	
	public function roleedit() 
	{
		parent::userauthHtml(9);
		$role = new \app\data\service\role\RoleService();
		$result = $role->roleRoomEdit();
		if ($result) 
		{
			$this->assign('result',$result);
			//获取权限数据
			$compt =  parent::comptList();
			$this->assign('volist',$compt['volist']);
			$this->assign('slist',$compt['slist']);
			return $this->fetch('edit');
		}
		else 
		{
			parent::operating(request()->path(),1,'数据不存在');
			$this->assign('content','没有找到相关数据，请关闭本窗口');
			return $this->fetch('Public/err');
		}
	}
	
    /**
     * 修改角色信息处理
	 * 创建人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */	
	public function roleedit_do() 
	{
		//验证用户权限
		parent::userauth(9);
		$data=array();
		if (request()->isAjax()) 
		{
			$ID = input('post.id');
			$comp =  input('post.comp');
			$role = new \app\data\service\role\RoleService();
			$result = $role->roleRoomEditDoo();			
			if ($result) 
			{
				//修改所有属于该角色的用户权限
				//return array('s'=>$ID);
				$user = new \app\data\service\user\UserService();
				$data['Competence'] = $comp;
				$save = $user->userSetField('Roleid='.$ID,$data);
				//更新数据
				$adminid = parent::getCache('ThinkUser.ID');
				if($adminid===$ID)
				{
					parent::updateSession('ThinkUser.Competence',$comp);
				}				
				parent::operating(request()->path(),0,'更新成功');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'更新失败');
				return json(['s'=>'更新失败']);
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
	
    /**
     * 删除角色数据
	 * 创建人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */
	public function roledel() 
	{
		//验证用户权限
		parent::userauth(10);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			if (input('post.post')=='ok') 
			{	
				$id = input('post.id');
				$id = intval($id);
				if ($id==1) 
				{
					parent::operating(request()->path(),1,'不能删除系统默认角色');
					return array('s'=>'不能删除此角色');
				}
				$role = new \app\data\service\role\RoleService();
				$result = $role->roleRoomDel();
				if ($result) 
				{
					parent::operating(request()->path(),0,'删除成功');
					return array('s'=>'ok');
				}
				else 
				{
					parent::operating(request()->path(),1,'数据不存在：'.$id);
					return array('s'=>'数据不存在');
				}
			}
			else 
			{
				parent::operating(request()->path(),1,'非法请求');
				return array('s'=>'非法请求');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
}
