<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Response;

class Page extends Admin
{
    /**
     * 新闻单页列表
	 * 创建人 韦丽明
	 * 时间 2017-09-18 00:02:00
     */
	public function index() 
	{
		parent::userauthHtml(97);
		if ($this->request->isAjax())
		{
		    $page = new \app\data\service\page\PageService();
    		$lists  = $page->pagesListShow();
    		$volist = $lists->toArray();
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
	
    /**
     * 添加新闻单页
	 * 创建人 韦丽明
	 * 时间 2017-09-18 00:02:00
     */	
	public function add() 
	{
		parent::userauthHtml(97);
		return $this->fetch();
	}
	
    /**
     * 添加新闻单页处理
	 * 创建人 韦丽明
	 * 时间 2017-09-18 00:16:11
     */	
	public function add_do() 
	{
		parent::userauthHtml(98);
		$request = Request::instance();
		if (request()->isPost()) 
		{			
		    $page = new \app\data\service\page\PageService();
    		$result  = $page->pagesRoomAdd();			
			if ($result) 
			{
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('page/index'),3);
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
     * 更新新闻单页
	 * 创建人 韦丽明
	 * 时间 2017-09-18 00:18:15
     */	
	public function edit() 
	{
		parent::userauthHtml(99);
		$page = new \app\data\service\page\PageService();
		$result  = $page->pagesRoomEdit();
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
     * 修改新闻单页处理
	 * 创建人 韦丽明
	 * 时间 2017-09-18 00:21:33
     */	
	public function edit_do() 
	{
		parent::userauthHtml(99);
		if (request()->isPost()) 
		{
			$page = new \app\data\service\page\PageService();
			$result  = $page->pagesRoomEditDoo();
			if ($result) 
			{
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('page/index'),3);
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
     * 删除新闻单页
	 * 创建人 韦丽明
	 * 时间 2017-09-18 00:24:09
     */	
	public function del() 
	{
		//验证用户权限
		parent::userauth(100);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$page = new \app\data\service\page\PageService();
			$result  = $page->pagesRoomDel();
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
     * 批量删除新闻单页
	 * 创建人 韦丽明
	 * 时间 2017-09-18 00:26:11
     */
	public function indel() 
	{
		//验证用户权限
		parent::userauth(100);
		if (request()->isAjax()) 
		{
			$page = new \app\data\service\page\PageService();
			$result  = $page->pagesRoomDelMost();
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
     * 删除单个图片
	 * 创建人 韦丽明
	 * 时间 2017-09-18 00:29:04
     */
	public function deleteimage() 
	{
	    parent::userauthHtml(99);
	    if (request()->isPost()) 
		{
			$page = new \app\data\service\page\PageService();
			$result  = $page->pagesDelOnePic();
	        if ($result) 
			{
	            parent::operating(request()->path(),0,'图片删除成功');
	            $this->success('修改成功',url('page/index'),3);
	        }
			else 
			{
	            parent::operating(request()->path(),1,'图片删除失败：'.$page->getError());
	            $this->error($page->getError());
	        }
	    }
		else 
		{
	        parent::operating(request()->path(),1,'非法请求');
	        $this->error('非法请求');
	    }
	}
}
