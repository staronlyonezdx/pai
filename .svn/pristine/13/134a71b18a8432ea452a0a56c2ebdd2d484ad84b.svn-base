<?php
namespace app\cmmadmin\controller;
use think\Request;
use think\Url;
use think\Response;

class Operating extends Admin
{
    /**
     * 操作日志列表
	 * 创建人 韦丽明
	 * 时间 2017-09-14 14:29:01
     */
	public function index() 
	{
		parent::userauthHtml(82);
		$operat = new \app\data\service\operating\OperatingService();
		$lists  = $operat->operatingListShow();
		$volist = $lists->toArray();
		$user = new \app\data\service\user\UserService();
		$where = array();
		foreach($volist['data'] as $k=>$v)
		{
			$where['ID'] = $v['Uid'];
			$uname = $user->userInfo($where, 'Username');
		    $volist['data'][$k]['Username'] = $uname['Username'];
		}
		//dump($volist);die;
		$this->assign('volist',$volist);			
		$this->assign('keyword',input('request.keyword'));
		$this->assign('lists',$lists);
		$this->assign('Status',input('request.Status'));
		return $this->fetch("public/operatinglog");
	}
	
    /**
     * 删除数据操作日志
	 * 创建人 韦丽明
	 * 时间 2017-09-14 14:51:22
     */	
	public function del() 
	{
		//验证用户权限
		parent::userauth(83);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			if (input('post.post') == 'ok') 
			{
				$operat = new \app\data\service\operating\OperatingService();
				$result  = $operat->operatingRoomDel();
				if($result)
				{
					return array('s'=>'ok');
				}
				else
				{
					return array('s'=>'删除失败');
				}
			}
			else 
			{
				return array('s'=>'非法请求');
			}
		}
		else 
		{
			return array('s'=>'非法请求');
		}
	}

    /**
     * 批量删除操作日志
	 * 创建人 韦丽明
	 * 时间 2017-09-14 14:55:02
     */	
	public function indel() 
	{
		//验证用户权限
		parent::userauth(83);
		if(request()->isAjax()) 
		{
			$operat = new \app\data\service\operating\OperatingService();
			$result  = $operat->operatingRoomDelMost();
			if($result) 
			{
				return array('s'=>'ok');
			}else {
				return array('s'=>'删除失败');
			}
		}
		else 
		{
			return array('s'=>'非法请求');
		}
	}
}
?>