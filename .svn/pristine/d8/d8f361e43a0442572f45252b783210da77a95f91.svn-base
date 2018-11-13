<?php
namespace app\cmmadmin\controller;
use think\Request;
use think\Url;
use think\Response;

class Prove extends Admin
{
    /**
     * 证书列表
	 * 创建人 韦丽明
	 * 时间 2017-09-10 21:29:11
     */
	public function index() 
	{
		parent::userauthHtml(154);
		if ($this->request->isAjax())
		{		
    		$Prove = new \app\data\service\prove\ProveService();					
			$volist = $Prove->proveListShow();
            return Response::create($volist, 'json');
		}			
		return $this->fetch();
	}
	
    /**
     * 添加证书页面
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:42:18
     */
	public function add() 
	{
		parent::userauthHtml(156);
		return $this->fetch();
	}
	
    /**
     * 添加证书处理
	 * 创建人 韦丽明
	 * 时间 2017-09-11 18:05:55
     */	
	public function add_do() 
	{
		parent::userauthHtml(156);
		$request = Request::instance();
		if (request()->isPost()) 
		{
    		$Prove = new \app\data\service\prove\ProveService();
			$result = $Prove->proveRoomAdd();
			//自动创建并验证数据
			if ($result) 
			{
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('prove/index'),3);
			}
			else 
			{
				parent::operating($request->path(),1,'新增失败');
				$this->error('新增失败');
			}
		}
		else 
		{
			parent::operating($request->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}
	
	
    /**
     * 修改证书页面
	 * 创建人 韦丽明
	 * 时间 2017-09-11 18:21:58
     */	
	public function edit() 
	{
		parent::userauthHtml(155);
		$prove = new \app\data\service\prove\ProveService();
		$result = $prove->proveRoomEdit();
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
     * 修改处理证书
	 * 创建人 韦丽明
	 * 时间 2017-09-11 18:21:58
     */	
	public function edit_do() 
	{
		parent::userauthHtml(155);		
		if (request()->isPost()) 
		{			
			$prove = new \app\data\service\prove\ProveService();
			$updata = $prove->proveRoomEditDoo();					
			if ($updata) 
			{
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('prove/index'),3);
			}
			else 
			{
				parent::operating(request()->path(),1,'更新失败');
				$this->error('更新失败');
			}
		}
		else 
		{
			parent::operating($request->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}
	
    /**
     * 删除证书
	 * 创建人 韦丽明
	 * 时间 2017-09-11 18:21:58
     */		
	public function del() 
	{		
		//验证用户权限
		parent::userauth(157);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$prove = new \app\data\service\prove\ProveService();
			$del = $prove->proveRoomDel();	
			if ($del)
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
	
    /**
     * 批量删除证书
	 * 创建人 韦丽明
	 * 时间 2017-09-11 21:38:55
     */	
	public function indel() 
	{
		//验证用户权限
		parent::userauth(157);
		if (request()->isAjax()) 
		{
			if (!$delid=explode(',',input('post.delid',''))) 
			{
				return array('s'=>'请选中后再删除');
			}
			$prove = new \app\data\service\prove\ProveService();
			$delMost = $prove->proveRoomDelMost();
			if ($delMost) 
			{
				parent::operating(request()->path(),0,'删除成功');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'删除失败');
				return array('s'=>'删除失败');
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
}
