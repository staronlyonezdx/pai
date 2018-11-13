<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;

class User extends Admin
{	
	/*
	* 管理员列表
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/	
	public function index() 
	{
		parent::userauthHtml(2);
		$keyword = input('request.keyword');
		$user = new \app\data\service\user\UserService();
		$type = 1 ;
		$lists  = $user->userListShow($type);
		$volist = $lists->toArray();
		$role = new \app\data\service\role\RoleService();	
		
		foreach($volist['data'] as $k=>$v)
		{
			$roleIfon = $role->roleRoomEditDoo("ID='{$v['Roleid']}'", 'Rolename');
		    $volist['data'][$k]['Rolename'] = $roleIfon['Rolename'];
		}
		$this->assign('volist',$volist);			
		$this->assign('keyword',$keyword);
		$this->assign('lists',$lists);
		return $this->fetch();
	}
	
	/*
	* 添加管理员
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/	
	public function useradd() 
	{
		parent::userauthHtml(3);
		$role = new \app\data\service\role\RoleService();
		$volist = $role->roleColumn('Status=0', 'ID,Rolename,Status');
		
		$user = new \app\data\service\user\UserService();
		$where = array();
		$where['Status'] = 0;
		$field = 'ID,Username,Status';
		$user_list  = $user->userColumn($where, $field);
		
		$this->assign('volist',$volist);
		$this->assign('user_list',$user_list);
		return $this->fetch('add');
	}
	
	/*
	* 添加管理员处理
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/
	public function useradd_do() 
	{
		//验证用户权限
		parent::userauth(3);
		$data=array();
		if (request()->isAjax()) 
		{		    
			//给新用户添加默认权限
			$role = new \app\common\model\Role;
			$rid = input('post.roleid');
			$r = '' ;
			if($rid)
			{
				$r = $role->where('ID='.$rid)->value('Competence');
			}
			//添加管理员
			$user = new \app\data\service\user\UserService();
			$result = $user->userRoomAdd($r);
			if (is_numeric($result)) 
			{				
				parent::operating(request()->path(),0,'新增用户：'.input('post.username'));
				return array('s'=>'ok');
			}
			else if(!is_numeric($result) && $result)
			{
				return array('s'=>$result);
			}
			else 
			{
				parent::operating(request()->path(),1,'新增失败:'.input('post.username'));
				return array('s'=>'新增失败');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
	
	
	//修改界面
	public function useredit() 
	{
		parent::userauthHtml(4);
		$id = input('request.id');
		if ($id=='' || !is_numeric($id)) {
			parent::operating(request()->path(),1,'参数错误');
			$this->assign('content','参数ID类型错误，请关闭本窗口');
			return $this->fetch('Public/err');
		}
		$id=intval($id);
		$role =   new \app\common\model\Role;
		$user =   new \app\common\model\User;
		//获取分类信息
		$volist=$role->where('Status=0')->order('Dtime')->column('ID,Rolename,Status');
		$data=array('ID' => $id);
		if ($result=$user->where($data)->find()) {
			//获取权限数据
			$co= new \app\common\model\Competence;
			$slist=$co->where('Sid<>0 AND Status=0')->order('Dtime asc')->column('ID,Sid,Cname,Status');
			$user_list=$user->where("Status=0 AND ID<>{$result['ID']}")->column('ID,Username,Status');
			$this->assign('result',$result);
			$this->assign('volist',$volist);
			$this->assign('user_list',$user_list);
			$this->assign('slist',$slist);
			return $this->fetch('edit');
		}else {
			parent::operating(request()->path(),1,'数据不存在');
			$this->assign('content','没有找到相关数据，请关闭本窗口');
			return $this->fetch('Public/err');
		}
	}
	
	/*
	* 用户修改处理
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/
	public function useredit_do() 
	{
		//验证用户权限
		parent::userauth(4);		
		if (request()->isAjax()) 
		{
			$data = array();
			$data['Username']    = input('post.username');
			//修改权限
			$role = new \app\common\model\Role;
			$rid = input('post.roleid');
			$r = '' ;
			if($rid)
			{
				$r = $role->where('ID='.$rid)->value('Competence');
			}
			//更新数据
			$user = new \app\data\service\user\UserService();
			$result = $user->userRoomEditDoo($r);
			if ($result===true) 
			{
				parent::operating(request()->path(),0,'更改用户资料：'.$data['Username']);
				return array('s'=>'ok');
			}
			else if($result!=true && $result) 
			{
				return array('s'=>$result);
			}
			else 
			{
				parent::operating(request()->path(),1,'更新失败：'.$data['Username']);
				return array('s'=>'更新失败');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求：');
			return array('s'=>'非法请求');
		}
	}
	
	/*
	* 个别信息修改
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/	
	public function uedit() 
	{
		parent::userauthHtml(18);
		$id = session('ThinkUser.ID');
		$user = new \app\data\service\user\UserService();
		$result = $user->userRoomEdit();
		if ($result) 
		{			
			$this->assign('result',$result);
			//获取权限数据
			return $this->fetch('uedit');
		}
		else 
		{
			parent::operating(request()->path(),1,'没有找到相关数据：'.$id);		
			$this->assign('content','没有找到相关数据，请关闭本窗口');
			$this->fetch('Public:err');
		}
	}
	
	/*
	* 管理员修改密码
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/
	public function uedit_do() 
	{
		//验证用户权限
		parent::userauth(18);
		$data=array();
		if (request()->isAjax()) 
		{
			$user = new \app\data\service\user\UserService();
			$result = $user->userEditPws();			
			if ($result===true) 
			{
				parent::operating(request()->path(),0,'修改密码成功');
				return array('s'=>'ok');
			}
			else if ($result!=true && $result) 
			{
				return array('s'=>$result);
			}
			else
			{
				parent::operating(request()->path(),1,'更新失败');
				return array('s'=>'更新失败');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
	
	/*
	* 删除管理员
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/
	public function userdel() 
	{
		//验证用户权限
		parent::userauth(5);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			if (input('post.post')=='ok') 
			{
				$id=intval(input('post.id'));
				if ($id==1) 
				{
					parent::operating(request()->path(),1,'不能删除系统默认用户');
					return array('s'=>'不能删除系统默认用户');
				}
				$user = new \app\data\service\user\UserService();
				$result = $user->userRoomDel();
				if ($result) 
				{
					parent::operating(request()->path(),0,'删除用户ID为：'.$id.'的数据');
					return array('s'=>'ok');
				}
				else 
				{
					parent::operating(request()->path(),1,'删除用户失败');
					return array('s'=>'删除用户失败');
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
	
	/*
	* 批量删除管理员
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/
	public function in_user_del() 
	{
		//验证用户权限
		parent::userauth(5);
		if (request()->isAjax()) 
		{
			$user = new \app\data\service\user\UserService();
			$result = $user->userRoomDelMost();
			if ($result) 
			{
				$delid = input('post.delid');
				parent::operating(request()->path(),0,'批量删除ID为：'.$delid.'的数据');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'批量删除用户失败');
				return array('s'=>'批量删除用户失败');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
}
