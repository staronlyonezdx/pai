<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;

class News extends Admin
{
    /**
     * 新闻分类列表
	 * 创建人 韦丽明
	 * 时间 2017-09-17 17:11:08       
     */	
	public function classindex() 
	{
		parent::userauthHtml(45);
    	$ncalss = new \app\data\service\news\NewsclassService();
		$lists = $ncalss->nclassListShow();
		$volist = $lists->toArray();
		$volist['data']  = $ncalss->nclassUname($volist['data']);
		//dump($volist);die;
		$this->assign('volist',$volist);			
		$this->assign('lists',$lists);
		return $this->fetch();
	}
	
    /**
     * 添加新闻分类
	 * 创建人 韦丽明
	 * 时间 2017-09-17 17:20:08       
     */	
	public function classadd() 
	{
		parent::userauthHtml(46);
		return $this->fetch();
	}

    /**
     * 添加新闻分类处理
	 * 创建人 韦丽明
	 * 时间 2017-09-17 17:41:15       
     */	
	public function classadd_do() 
	{
		parent::userauth(46);
		if (request()->isAjax()) 
		{
    		$ncalss = new \app\data\service\news\NewsclassService();
    		$result = $ncalss->nclassRoomAdd();
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
     * 修改新闻分类
	 * 创建人 韦丽明
	 * 时间 2017-09-17 17:41:15       
     */	
	public function classedit() 
	{
		parent::userauthHtml(47);
    	$ncalss = new \app\data\service\news\NewsclassService();
    	$result = $ncalss->nclassRoomEdit();
		if ($result) 
		{
			$this->assign('result',$result);
			return $this->fetch();
		}
		else 
		{
			parent::operating(request()->path(),1,'数据不存在');
			$this->assign('content','没有找到相关数据，请关闭本窗口');
			return $this->fetch('Public/err');
		}
	}

    /**
     * 修改新闻分类处理
	 * 创建人 韦丽明
	 * 时间 2017-09-17 18:09:25       
     */	
	public function classedit_do() 
	{
		parent::userauth(47);
		if (request()->isAjax()) {
			$ncalss = new \app\data\service\news\NewsclassService();
			$result = $ncalss->nclassRoomEditDoo();
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
     * 删除新闻分类
	 * 创建人 韦丽明
	 * 时间 2017-09-17 18:00:04
     */
	public function classdel() 
	{
		//验证用户权限
		parent::userauth(48);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
    		$ncalss = new \app\data\service\news\NewsclassService();
    		$result = $ncalss->nclassRoomDel();			
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
     * 新闻列表
	 * 创建人 韦丽明
	 * 时间 2017-09-17 19:09:04
     */	
	public function news() 
	{		
		parent::userauthHtml(84);
		$sid   = input('request.sid');
		$where['ID'] = array('>',0);
		
		$ncalss = new \app\data\service\news\NewsclassService();
    	$news = new \app\data\service\news\NewsService();
		
    	$lists = $news->newsListShow();
		$volist = $lists->toArray();
		//作者
		$volist['data'] = $ncalss->nclassUname($volist['data']);
		//新闻所属分类名
		$volist['data'] = $ncalss->newsClass($volist['data']);
		$clist = $ncalss->nclassList($where);
		
		$this->assign('volist',$volist);
		$this->assign('sid',$sid);
		$this->assign('clist',$clist);
		$this->assign('lists',$lists);
		return $this->fetch();
	}

    /**
     * 添加新闻
	 * 创建人 韦丽明
	 * 时间 2017-09-17 19:47:04
     */	
	public function add() 
	{
		parent::userauthHtml(49);		
		$where['ID'] = array('>',0);	
		$ncalss = new \app\data\service\news\NewsclassService();
		$news = new \app\data\service\news\NewsService();
		$clist = $ncalss->nclassList($where);		
		//排序ID		
		$Sortid = $news->newsCount($where);
		$this->assign('clist',$clist);
		$this->assign('Sortid',($Sortid+1));
		return $this->fetch();
	}

    /**
     * 添加新闻处理
	 * 创建人 韦丽明
	 * 时间 2017-09-17 20:04:08
     */	
	public function add_do() 
	{
		parent::userauthHtml(49);
		$request = Request::instance();
		if (request()->isPost()) 
		{
			$news = new \app\data\service\news\NewsService();
			$result = $news->newsRoomAdd();
			if ($result) 
			{
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('News/news'),3);
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
     * 更新新闻
	 * 创建人 韦丽明
	 * 时间 2017-09-17 20:30:11
     */	
	public function edit() 
	{
		parent::userauthHtml(50);
		$where['ID'] = input('get.id');
		$ncalss = new \app\data\service\news\NewsclassService();
		$news = new \app\data\service\news\NewsService();
		//分类数据
		$clist = $ncalss->nclassList($where);	
		$result = $news->newsRoomEdit();
		if ($result) 
		{
			$this->assign('result',$result);
			$this->assign('clist',$clist);
			return $this->fetch();
		}
		else 
		{
			parent::operating(request()->path(),1,'数据不存在');
			$this->error('没有找到相关数据');
		}
	}
	
    /**
     * 更新新闻处理
	 * 创建人 韦丽明
	 * 时间 2017-09-17 20:35:10
     */	
	public function edit_do() 
	{
		parent::userauthHtml(50);
		if (request()->isPost()) 
		{			
			$news = new \app\data\service\news\NewsService();
			$result = $news->newsRoomEditDoo();
			if ($result) 
			{
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('News/news'),3);
			}else 
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
     * 文章详情
	 * 创建人 韦丽明
	 * 时间 2017-09-17 20:35:10
     */	
	public function article() 
	{
		$id = input('get.id');
		if ($id =='' && !is_numeric($id)) 
		{
			$this->error('参数错误');
		}
		$id = intval($id);		
		$where['ID'] = input('get.id');
		
		$ncalss = new \app\data\service\news\NewsclassService();
    	$news = new \app\data\service\news\NewsService();
		
    	$result = $news->newsInfo($where);
		//作者
		$result['Username'] = $ncalss->nclassUname($result['Uid']);
		//新闻所属分类名
		$result['ClassName'] = $ncalss->newsClass($result['pid']);
		$clist = $ncalss->nclassList($where);
		$result['Content'] = htmlspecialchars_decode($result['Content']) ;
		
		$this->assign('result',$result);
		$this->assign('clist',$clist);
		return $this->fetch();
	}

    /**
     * 删除新闻
	 * 创建人 韦丽明
	 * 时间 2017-09-17 18:58:11
     */
	public function newsdel() 
	{
		//验证用户权限
		parent::userauth(51);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
    		$news = new \app\data\service\news\NewsService();
    		$result = $news->newsRoomDel();
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
     * 批量删除新闻
	 * 创建人 韦丽明
	 * 时间 2017-09-17 19:09:04
     */	
	public function newsindel() 
	{
		//验证用户权限
		parent::userauth(51);
		if (request()->isAjax()) 
		{
    		$news = new \app\data\service\news\NewsService();
    		$result = $news->newsRoomDelMost();
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
