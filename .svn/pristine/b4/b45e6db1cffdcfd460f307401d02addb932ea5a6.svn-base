<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Response;

class System extends Admin
{	
    /**
     * 模块管理
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */	
	public function module() 
	{
		parent::userauthHtml(25);
		$module = new \app\data\service\module\ModuleService();
		$volist   = $module->moduleListShow();
		$user = new \app\data\service\user\UserService();
		$where = array();
		foreach($volist as $k=>$v)
		{
			$where['ID'] = $v['Uid'];
			$uname = $user->userInfo($where, 'Username');
		    $volist[$k]['Username'] = $uname['Username'];
		}
		$this->assign('volist',$volist);
		return $this->fetch();
	}
	
    /**
     * 添加模块
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */	
	public function module_add() 
	{
		parent::userauthHtml(26);
		$module = new \app\data\service\module\ModuleService();
		$list = $module->moduleAddShow();
		$this->assign('list',$list);
		return $this->fetch('moduleadd');
	}
	
    /**
     * 添加模块处理
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function module_add_do() 
	{
		parent::userauth(26);
		if (request()->isAjax()) 
		{
			$module = new \app\data\service\module\ModuleService();
			$result = $module->moduleRoomAdd();			
			if ($result) 
			{
				parent::operating(request()->path(),0,'新增模块成功');
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
     * 修改模块
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function module_edit() 
	{
		parent::userauthHtml(27);	
		$module = new \app\data\service\module\ModuleService();
		//获取分类信息
		$result = $module->moduleRoomEdit();
		if ($result) 
		{
			$list = $module->moduleAddShow();	
			$this->assign('list',$list);
			$this->assign('result',$result);
			return $this->fetch('moduleedit');
		}
		else
		{
			parent::operating(request()->path(),1,'数据不存在');
			$this->assign('content','没有找到相关数据，请关闭本窗口');
			return $this->fetch('Public/err');
		}
	}
	
    /**
     * 图标列表
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function img () 
	{
		$this->display('img');
	}
	
	//图标列表请求
	public function img_do() 
	{
		$imgcount=1031;			//图标总数
		$speed=100;				//分页数
		if (request()->isAjax()) {
			$page = input('post.page');
			$html='';
			if (floor($imgcount/$speed)+1 == $page) {
				$stratpage=1000;
				$endpage = $imgcount;
			}else {
				$stratpage=$page*$speed;
				if ($page>1) {
					$stratpage-=$speed;
				}else {
					$stratpage=$page;
				}
				$endpage=$page*$speed;
			}
			for ($i = $stratpage; $i <= $endpage; $i++) {
				$html['y'.$i]="/img/$i.png";
			}
			echo json_encode($html);
		}else {
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}

    /**
     * 修改模块处理
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function module_edit_do() 
	{
		parent::userauth(27);
		if (request()->isAjax()) 
		{			
			$module = new \app\data\service\module\ModuleService();
			$result = $module->moduleRoomEditDoo();
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
     * 模块删除
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function moduledel() 
	{
		//验证用户权限
		parent::userauth(28);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$module = new \app\data\service\module\ModuleService();
			$result = $module->moduleRoomDel();	
			if ($result) 
			{
				parent::operating(request()->path(),0,'删除模块成功');
				return array('s'=>'ok');
			}
			else 
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
	
    /**
     * IP操作开始
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */	
	public function ip() 
	{
		parent::userauthHtml(21);
		$keyword  = input('request.keyword');
		$ip = new \app\data\service\ip\IpService();
		$type = 1;
		$lists  = $ip->ipListShow($type);
		
		$volist = $lists->toArray();	
		$user = new \app\data\service\user\UserService();
		$where = array();
		foreach($volist['data'] as $k=>$v)
		{
			$where['ID'] = $v['Uid'];
			$uname = $user->userInfo($where, 'Username');
		    $volist['data'][$k]['Username'] = $uname['Username'];
		}
		
		$this->assign('volist',$volist);			
		$this->assign('keyword',$keyword);
		$this->assign('lists',$lists);
		return $this->fetch();
	}
	
    /**
     * 添加禁止IP页
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */		
	public function ipadd() 
	{
		parent::userauthHtml(22);
		return $this->fetch();
	}
	
    /**
     * 添加禁止IP操作
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */		
	public function ipadd_do() 
	{
		//验证用户权限
		parent::userauth(22);
		//判断请求类型
		if (request()->isAjax()) 
		{
			$ip = new \app\data\service\ip\IpService();
			$result = $ip->ipRoomAdd();
			if ($result) 
			{
				parent::operating(request()->path(),0,'新增IP限制登录成功');
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
     * 删除数据IP
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function del() 
	{
		//验证用户权限
		parent::userauth(23);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$ip = new \app\data\service\ip\IpService();
			$result = $ip->ipRoomDel();
			if ($result) 
			{
				parent::operating(request()->path(),0,'删除成功');
				return array('s'=>'ok');
			}else {
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

    /**
     * 批量删除IP
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function indel() 
	{
		//验证用户权限
		parent::userauth(23);
		if (request()->isAjax()) 
		{
			$ip = new \app\data\service\ip\IpService();
			$result = $ip->ipRoomDelMost();
			if ($result) 
			{
				parent::operating(request()->path(),0,'删除成功');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'删除失败：'.$ip->getError());
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
     * 网站配置
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */	
	public function systemwebsite($type=0) 
	{
		parent::userauthHtml(53);
		$set = new \app\data\service\system\SetService();
		$list = $set->setListShow();
		$config = array();
		
		if($list)
		{
			foreach($list['data'] as $key=>$v)
			{	
				if($v['name']==='WEB_DESCRIPTION' || $v['value'])
				{
					$v['value'] = html_entity_decode($v['value']);
				}		
				if ($v['name']) 
				{
					$config[$v['name']] = $v['value'];
				}			
			}		
					
		}
		else 
		{
			exit('数据不存在');
		}
		if(!$type)
		{	
			$this->assign('setconfig',$config);	
			return $this->fetch();
		}
		
	}

    /**
     * 网站配置修改
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */	
	public function systemwebsite_do() 
	{
		//验证用户权限
		parent::userauthHtml(53);
		
		if (request()->isPost()) 
		{
			if(strlen(input('post.WEB_RECORD_NUMBER'))>200){
				$this->error('描述内容不得超过200字');
			}			
			$set = new \app\data\service\system\SetService();
			$update = $set->setRoomEditDoo();
			if($update)
			{
				$this->success('修改成功','systemwebsite',2);
			}
			else{
				$this->error('修改失败');
			}
			
		}
		else {
			parent::operating(request()->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}
	
    /**
     * 删除单个图片
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:10:00
     */
	public function deleteimage() 
	{
	    parent::userauthHtml(144);
	    if (request()->isPost()) 
		{
			$set = new \app\data\service\system\SetService();
			$save = $set->setDelOnePic();
	        if ($save) 
			{
	            parent::operating(request()->path(),0,'图片删除成功');
	            $this->success('修改成功',url('goods/index'),3);
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
	
    /**
     * 网站导航
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:35:11
     */
	public function nav() 
	{
		parent::userauthHtml(106);
		if (request()->isAjax())
		{   
			$nav = new \app\data\service\system\NavService();
			$volist = $nav->navListShow();
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
	
    /**
     * 添加导航
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:35:11
     */
	public function navadd() 
	{
		parent::userauthHtml(107);
		return $this->fetch('navadd');
	}
	
    /**
     * 添加导航处理
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:35:11
     */
	public function nav_add_do()
	{
		parent::userauthHtml(107);
		$request = Request::instance();
		if (request()->isPost()) 
		{			
			$nav = new \app\data\service\system\NavService();
			$result = $nav->navRoomAdd();
			if ($result) 
			{
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('system/nav'),3);
			}else {
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
     * 更新导航
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:35:11
     */
	public function navedit() 
	{
		parent::userauthHtml(108);
		$nav = new \app\data\service\system\NavService();
		$result = $nav->navRoomEdit();		
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
     * 修改处理导航
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:35:11
     */
	public function nav_edit_do() 
	{
		parent::userauthHtml(108);
		if (request()->isPost()) 
		{
			$nav = new \app\data\service\system\NavService();
			$result = $nav->navRoomEditDoo();
			if ($result) 
			{
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('system/nav'),3);
			}
			else 
			{
				parent::operating(request()->path(),1,'更新失败：');
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
     * 删除导航
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:35:11
     */
	public function navdel() 
	{
		//验证用户权限
		parent::userauth(109);
		//判断是否是ajax请求
		if (request()->isAjax()) 
		{
			$nav = new \app\data\service\system\NavService();
			$result = $nav->navRoomDel();
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
     * 批量删除导航
	 * 创建人 韦丽明
	 * 时间 2017-09-11 14:35:11
     */
	public function navindel() 
	{
		//验证用户权限
		parent::userauth(109);
		if (request()->isAjax()) 
		{
			$nav = new \app\data\service\system\NavService();
			$result = $nav->navRoomDelMost();
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
