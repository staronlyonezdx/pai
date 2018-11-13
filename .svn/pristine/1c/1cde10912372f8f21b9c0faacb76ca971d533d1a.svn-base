<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Response;
use think\Cache;

class Team extends Admin
{
    /**
     * 团队管理 
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function index() 
	{
		parent::userauthHtml(132);
		if ($this->request->isAjax())
		{
		    $team = new \app\data\service\index\TeamService();
			$volist  = $team->teamListShow();
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
	
    /**
     * 添加团队 
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function add() 
	{
		parent::userauthHtml(133);
		return $this->fetch();
	}
	
    /**
     * 添加团队处理 
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function add_do() 
	{
		parent::userauthHtml(133);
		$request = Request::instance();
		if (request()->isPost()) 
		{
		    $team = new \app\data\service\index\TeamService();
			$result  = $team->teamRoomAdd();
			if ($result) 
			{
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('team/index'),3);
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
     * 编辑团队 
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function edit() 
	{
		parent::userauthHtml(134);
	    $team = new \app\data\service\index\TeamService();
		$result  = $team->teamRoomEdit();
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
     * 修改团队处理 
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function edit_do() 
	{
		parent::userauthHtml(134);
		if (request()->isPost()) 
		{
			$team = new \app\data\service\index\TeamService();
			$result  = $team->teamRoomEditDoo();
			if ($result) 
			{
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('team/index'),3);
			}else {
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
     * 删除团队操作
	 * 创建人 韦丽明
	 * 时间 2017-09-11 21:19:04
     */
	public function del() 
	{
		//验证用户权限
		parent::userauth(135);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$team = new \app\data\service\index\TeamService();
			$result  = $team->teamRoomDel();
			if ($result) 
			{
				parent::operating(request()->path(),0,'删除成功');
				return json(['s'=>'ok']);
			}
			else 
			{
				parent::operating(request()->path(),1,'删除失败');
				return json(['s'=>'数据不存在']);
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return json(['s'=>'非法请求']);
		}
	}
	
    /**
     * 批量删除团队
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:35:11
     */
	public function indel() 
	{
		//验证用户权限
		parent::userauth(135);
		if (request()->isAjax()) {
			$team = new \app\data\service\index\TeamService();
			$result  = $team->teamRoomDelMost();
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
	 * 时间 2017-09-11 14:35:11
     */
	public function deleteimage() 
	{
	    parent::userauthHtml(134);
	    if (request()->isPost()) 
		{
			$team = new \app\data\service\index\TeamService();
			$result  = $team->teamDelOnePic();
	        if ($result) 
			{
	            parent::operating(request()->path(),0,'图片删除成功');
	            $this->success('修改成功',url('team/index'),3);
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
