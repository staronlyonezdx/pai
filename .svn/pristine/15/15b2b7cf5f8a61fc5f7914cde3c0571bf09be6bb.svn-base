<?php
namespace app\cmmadmin\controller;
use think\Request;
use think\Url;
use think\Response;

class Message extends Admin
{
    /**
     * 留言
	 * 创建人 韦丽明
	 * 时间 2017-09-14 03:55:01
     */
	public function index() 
	{
		parent::userauthHtml(105);
		if (request()->isAjax())
		{   
			$message = new \app\data\service\message\MessageService();
			$lists  = $message->messageListShow();
    		$volist = $lists->toArray();
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
    /**
     * 修改留言html页面
	 * 创建人 韦丽明
	 * 时间 2017-09-14 04:10:12
     */	
	public function edit() 
	{
		parent::userauthHtml(103);
		$message = new \app\data\service\message\MessageService();
		$result  = $message->messageRoomEdit();
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
     * 修改处理留言
	 * 创建人 韦丽明
	 * 时间 2017-09-14 04:11:03
     */	
	public function edit_do() 
	{
		parent::userauthHtml(103);
		if (request()->isPost()) {
			$message = new \app\data\service\message\MessageService();
			$result  = $message->messageRoomEditDoo();
			if ($result) 
			{
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('message/index'),3);
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
     * 删除留言操作
	 * 创建人 韦丽明
	 * 时间 2017-09-14 04:14:56
     */	
	public function del() 
	{
		//验证用户权限
		parent::userauth(104);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$message = new \app\data\service\message\MessageService();
			$result  = $message->messageRoomDel();
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
     * 批量删除留言操作
	 * 创建人 韦丽明
	 * 时间 2017-09-14 04:23:51
     */	
	public function indel() 
	{
		//验证用户权限
		parent::userauth(104);
		if (request()->isAjax()) 
		{
			$message = new \app\data\service\message\MessageService();
			$result  = $message->messageRoomDelMost();
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
