<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Response;

class Address extends AdminHome
{
    /**
     * 地址列表分页
	 * 创建人 韦丽明
	 * 时间 2017-09-14 15:23:00
     */
	public function index() 
	{
		parent::userauthHtml(149);
		if ($this->request->isAjax())
		{
    		$address = new \app\data\service\address\AddressService();			
    		$volist = $address->addressListShow();
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
	
    /**
     * 添加地址页面
	 * 创建人 韦丽明
	 * 时间 2017-09-14 15:24:12
     */	
	public function add() 
	{
		parent::userauthHtml(151);
		return $this->fetch();
	}
	
    /**
     * 添加地址处理
	 * 创建人 韦丽明
	 * 时间 2017-09-14 15:29:55
     */	
	public function add_do() 
	{
		parent::userauthHtml(151);
		$request = Request::instance();
		if (request()->isPost()) 
		{
    		$address = new \app\data\service\address\AddressService();
    		$result = $address->addressRoomAdd();
			if ($result) 
			{
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('link/index'),3);
			}
			else 
			{
				parent::operating($request->path(),1,'新增失败'.$link->getError());
				$this->error($link->getError());
			}
		}
		else 
		{
			parent::operating($request->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}
	
    /**
     * 更新地址页面
	 * 创建人 韦丽明
	 * 时间 2017-09-14 15:33:15
     */	
	public function edit() 
	{
		parent::userauthHtml(150);
    	$address = new \app\data\service\address\AddressService();
    	$result = $address->addressRoomEdit();
		if ($result) 
		{
			$this->assign('result',$result);
			return $this->fetch();
		}
		else 
		{
			parent::operating(request()->path(),1,'数据不存在');
			$this->error('没有找到相关数据');
		}
	}
	
    /**
     * 更新地址处理
	 * 创建人 韦丽明
	 * 时间 2017-09-14 15:38:18
     */	
	public function edit_do() 
	{
		parent::userauthHtml(150);
		if (request()->isPost()) 
		{
			$address = new \app\data\service\address\AddressService();
			$result = $address->addressRoomEditDoo();
			if ($result) 
			{
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('Address/index'),3);
			}
			else 
			{
				parent::operating(request()->path(),1,'更新失败');
				$this->error('更新失败');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}
	
    /**
     * 删除地址
	 * 创建人 韦丽明
	 * 时间 2017-09-14 15:49:11
     */	
	public function del() 
	{
		//验证用户权限
		parent::userauth(152);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$address = new \app\data\service\address\AddressService();
			$result = $address->addressRoomDel();
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
	

    /**
     * 批量删除地址
	 * 创建人 韦丽明
	 * 时间 2017-09-14 15:51:22
     */	
	public function indel() 
	{
		//验证用户权限
		parent::userauth(152);
		if (request()->isAjax()) 
		{
			if (!$delid=explode(',',input('post.delid',''))) {
				return array('s'=>'请选中后再删除');
			}
			$address = new \app\data\service\address\AddressService();
			$result = $address->addressRoomDelMost();
			if ($result) 
			{
				parent::operating(request()->path(),0,'删除成功');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'删除失败');
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
