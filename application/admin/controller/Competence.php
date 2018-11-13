<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;

class Competence extends Admin
{
    /**
     * 权限列表
	 * 创建人 韦丽明
	 * 时间 2017-09-14 11:10:21
     */
	public function index() 
	{
		parent::userauthHtml(12);
		$keyword = input('request.keyword');
		$compt = new \app\data\service\competence\CompetenceService();
		$where  = array();
		$where['Sid']    = array("NEQ",0);
		$type = 1 ;
		$lists = $compt->competenceListShow($type);	
		$volist   = $lists->toArray();		
		$sidlist  = $compt->competenceList($where);

		$this->assign('volist',$volist);
		$this->assign('sidlist',$sidlist);
		$this->assign('keyword',$keyword);
		$this->assign('lists',$lists);
		return $this->fetch();
	}
	
    /**
     * 添加权限
	 * 创建人 韦丽明
	 * 时间 2017-09-14 11:10:21
     */	
	public function cadd() 
	{
		parent::userauthHtml(13);
		$type = 1;
		$compt =  parent::comptList($type);
		$this->assign('volist',$compt['volist']);
		return $this->fetch('add');
	}
	
    /**
     * 添加权限操作
	 * 创建人 韦丽明
	 * 时间 2017-09-14 11:10:21
     */	
	public function cadd_do() 
	{
		//验证用户权限
		parent::userauth(13);
		$data=array();
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$compt = new \app\data\service\competence\CompetenceService();
			$add = $compt->competenceRoomAdd();
			if ($add) 
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
     * 修改权限信息
	 * 创建人 韦丽明
	 * 时间 2017-09-14 11:10:21
     */	
	public function cedit() 
	{
		parent::userauthHtml(14);
		$id = input('get.id');
		$id=intval($id);
		$compt = new \app\data\service\competence\CompetenceService();
		$result = $compt->competenceRoomEdit();
		if ($result) 
		{
			//获取分类信息
			$type = 1;
			$volist =  parent::comptList($type);
			$this->assign('volist',$volist['volist']);
			$this->assign('result',$result);
			return $this->fetch('edit');
		}
		else 
		{
			parent::operating(request()->path(),1,'没有找到相关数据：'.$id);
			$this->assign('content','没有找到相关数据，请关闭本窗口');
			return $this->fetch('Public\err');
		}
	}

    /**
     * 修改权限信息处理
	 * 创建人 韦丽明
	 * 时间 2017-09-14 11:10:21
     */	
	public function cedit_do() 
	{
		//验证用户权限
		parent::userauth(14);
		$data=array();
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$compt = new \app\data\service\competence\CompetenceService();
			$result = $compt->competenceRoomEditDoo();
			if ($result) 
			{
				parent::operating(request()->path(),0,'更新成功');
				return array('s'=>'ok');
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
	
    /**
     * 删除权限信息
	 * 创建人 韦丽明
	 * 时间 2017-09-14 11:10:21
     */
	public function cdel() 
	{
		//验证用户权限
		parent::userauth(15);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			if (input('post.post') == 'ok') 
			{
				$id = input('post.id');
				$id=intval($id);
				$compt = new \app\data\service\competence\CompetenceService();
				$where = 'ID='.$id.' OR Sid='.$id;
				$result = $compt->competenceRoomEditDoo($where);
				if ($result) 
				{
					parent::operating(request()->path(),0,'删除成功');
					return array('s'=>'ok');
				}
				else 
				{
					parent::operating(request()->path(),1,'删除失败');
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
