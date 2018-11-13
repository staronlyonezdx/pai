<?php
namespace app\cmmadmin\controller;
use think\Request;
use think\Url;
use think\Response;

class Loginlog extends Admin
{
    /**
     * 登录日志列表
	 * 创建人 韦丽明
	 * 时间 2017-09-15 14:54:01
     */	
	public function index() 
	{
		parent::userauthHtml(19);
		$loginlog = new \app\data\service\index\LoginlogService();
		$lists  = $loginlog->loginlogListShow();
		$volist = $lists->toArray();
		$user = new \app\data\service\user\UserService();
		$where = array();
		foreach($volist['data'] as $k=>$v)
		{
			$where['ID'] = $v['Uid'];
			$uname = $user->userInfo($where, 'Username');
		    $volist['data'][$k]['Username'] = $uname['Username'];
		}		
		$keyword  = input('request.keyword');
		$this->assign('volist',$volist);			
		$this->assign('keyword',$keyword);
		$this->assign('lists',$lists);
		return $this->fetch("public/loginlog");
	}
	
    /**
     * 删除登录日志
	 * 创建人 韦丽明
	 * 时间 2017-09-15 14:58:14
     */	
	public function del() 
	{
		//验证用户权限
		parent::userauth(20);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			if (input('post.post') == 'ok') 
			{
				$loginlog = new \app\data\service\index\LoginlogService();
				$result  = $loginlog->loginlogRoomDel();
				if ($result) 
				{
					parent::operating(request()->path(),0,'登录日志删除成功');
					return array('s'=>'ok');
				}else 
				{
						parent::operating(request()->path(),1,'数据不存在');
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
	
    /**
     * 批量删除登录日志
	 * 创建人 韦丽明
	 * 时间 2017-09-15 14:59:58
     */	
	public function indel() 
	{
		//验证用户权限
		parent::userauth(20);
		if (request()->isAjax()) 
		{
			if (!$delid=explode(',',input('post.delid'))) {
				return array('s'=>'请选中后再删除');
			}
			$loginlog = new \app\data\service\index\LoginlogService();
			$result  = $loginlog->loginlogRoomDelMost();
			if ($result) 
			{
				parent::operating(request()->path(),0,'登录日志删除成功');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'登录日志删除失败');
				return array('s'=>'删除失败');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
}
