<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Response;
use think\Cache;

class Advertisement extends Admin
{
    /**
     * 广告列表分页
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:22:00
     */ 
	public function index() 
	{
		parent::userauthHtml(97);
		if ($this->request->isAjax())
		{			
			$ad = new \app\data\service\index\AdService();			
			$volist = $ad->adListShow();
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
	
    /**
     * 添加广告
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */	
	public function add() 
	{
		parent::userauthHtml(97);
		return $this->fetch();
	}
	
    /**
     * 添加广告处理
	 * 创建人 韦丽明
	 * 时间 2017-09-15 00:18:00
     */	
	public function add_do() 
	{
		parent::userauthHtml(98);
		$request = Request::instance();
		if (request()->isPost()) 
		{
			$ad = new \app\data\service\index\AdService();
			$add = $ad->adRoomAdd();
			if ($add) 
			{
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('advertisement/index'),3);
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
     * 修改广告页面
	 * 创建人 韦丽明
	 * 时间 2017-09-15 00:20:52
     */
	public function edit() 
	{
		parent::userauthHtml(99);
		$ad = new \app\data\service\index\AdService();
		$result = $ad->adRoomEdit();
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
     * 修改广告处理
	 * 创建人 韦丽明
	 * 时间 2017-09-15 00:28:15
     */	
	public function edit_do() 
	{
		parent::userauthHtml(99);
		if (request()->isPost()) 
		{
			$ad = new \app\data\service\index\AdService();
			$result = $ad->adRoomEditDoo();
			if ($result) 
			{
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('advertisement/index'),3);
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
     * 删除广告
	 * 创建人 韦丽明
	 * 时间 2017-09-11 16:03:55
     */
	public function del() 
	{
		//验证用户权限
		parent::userauth(100);
		//判断是否是ajax请求
		if (request()->isAjax()) {
			$ad = new \app\data\service\index\AdService();			
			$del = $ad->adRoomDel();
			if ($del) 
			{
				parent::operating(request()->path(),0,'删除成功');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'删除失败');
				return array('s'=>'数据不存在');
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
	
    /**
     * 批量删除广告
	 * 创建人 韦丽明
	 * 时间 2017-09-11 15:59:33
     */
	public function indel() 
	{
		//验证用户权限
		parent::userauth(100);
		if (request()->isAjax()) 
		{
			if (!$delid=explode(',',input('post.delid',''))) {
				return array('s'=>'请选中后再删除');
			}
			
    		$ad = new \app\data\service\index\AdService();			
    		$result = $ad->adRoomDelMost();
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

    /**
     * 删除广告图片
	 * 创建人 韦丽明
	 * 时间 2017-09-11 15:59:33
     */
	public function deleteimage() 
	{
	    parent::userauthHtml(99);
	    if (request()->isPost()) 
		{
    		$ad = new \app\data\service\index\AdService();			
    		$result = $ad->adDelOnePic();
	        if ($result) 
			{
				//删除缓存
				$cache = 'ad';
				parent::delCache($cache);
	            parent::operating(request()->path(),0,'图片删除成功');
	            $this->success('修改成功',url('advertisement/index'),3);
	        }
			else 
			{
	            parent::operating(request()->path(),1,'图片删除失败');
	            $this->error('图片删除失败');
	        }
	    }
		else 
		{
	        parent::operating(request()->path(),1,'非法请求');
	        $this->error('非法请求');
	    }
	}
}
