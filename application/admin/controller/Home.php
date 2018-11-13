<?php
namespace app\cmmadmin\controller;
use think\Request;
use think\Url;
use think\Response;

class Home extends Admin
{

    /**
	 * 首页管理
     * 企业简介设置
	 * 创建人 韦丽明
	 * 时间 2017-09-12 20:34:09
     */
	public function index() 
	{
		parent::userauthHtml(147);
		$home = new \app\data\service\index\HomeService();
		$where['h_type']= 1 ;
		$info = $home->homeInfo($where);
		//dump($info);die;
		$this->assign('homeset',$info);
		return $this->fetch();
	}

    /**
	 * 首页分类
     * 企业简介设置
	 * 创建人 韦丽明
	 * 时间 2017-09-13 18:45:11
     */	
	public function gclass() 
	{
		parent::userauthHtml(147);
		$home = new \app\data\service\index\HomeService();
		$where['h_type']= 2 ;
		$list = $home->homeList($where);
		$class = parent::gclassAll();
		$this->assign('class',$class);
		//dump($list);die;
		$this->assign('homeclass',$list);
		return $this->fetch();
	}
	
    /**
	 * 修改首页设置
     * 企业简介设置
	 * 创建人 韦丽明
	 * 时间 2017-09-12 20:34:09
     */
	public function homeEdit_do() 
	{
		parent::userauthHtml(147);
		if (request()->isPost())
		{		
		    $home = new \app\data\service\index\HomeService();
		    $updata = $home->homeRoomEditDoo();
			if ($updata) 
			{
				if(input('post.h_type')=='1')
				{
					$url = 'home/index';
				}
				else
				{
					$url = 'home/gclass';
				}
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url($url),3);
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
	 * 删除图片
     * 企业简介设置
	 * 创建人 韦丽明
	 * 时间 2017-09-12 20:34:09
     */
	public function deleteimage() {
	    parent::userauthHtml(147);
	    if (request()->isPost()) {
	        $data = array();
	        $id           = input('post.key');
	        $data['h_pic']        = "";
	        $home = new \app\data\service\index\HomeService();
			
	        if ($home->homeSave("h_id=".$id, $data)) {
				
	            parent::operating(request()->path(),0,'图片删除成功');
	            $this->success('修改成功',url('homd/index'),3);
	        }else {
	            parent::operating(request()->path(),1,'图片删除失败：'.$advertisement->getError());
	            $this->error($advertisement->getError());
	        }
	    }else {
	        parent::operating(request()->path(),1,'非法请求');
	        $this->error('非法请求');
	    }
	}
	

}
