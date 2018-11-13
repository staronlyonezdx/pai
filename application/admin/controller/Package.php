<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Response;
use think\Cache;

class Package extends Admin
{
	//视频区 
	public function index() {
		parent::userauthHtml(122);
		if (request()->isAjax())
		{   
		    $title         = input('get.title');		
    		$where = array();
			$Package = new \app\common\model\Package;
			
    		if($title!=""){
    		    $where['title'] = array("LIKE","%$title%");
    		}
			
			$lists  = $Package->where($where)->order('sort asc')->paginate();
    		$volist = $lists->toArray();
			//dump($volist);die;
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
	
	//添加视频
	public function add() {
		parent::userauthHtml(123);
		return $this->fetch();
	}
	
	//添加处理
	public function add_do() {
		parent::userauthHtml(123);
		$request = Request::instance();
		if (request()->isPost()) {
		    $data = array();
			
			input('post.states') ? $data['states'] = input('post.states') : $data['states'] = 1 ;
			$data['title']            = input('post.title');
			$data['sort']            = input('post.sort');
			$data['price']            = input('post.price');	
			$data['column1']            = input('post.column1');
			$data['column2']            = input('post.column2');
			$data['column3']            = input('post.column3');
			$data['column4']            = input('post.column4');
			$data['column5']            = input('post.column5');
			$data['buyurl']            = input('post.buyurl');
			$data['addtime']          = time();

			$Package = new \app\common\model\Package;
			//自动创建并验证数据
			if ($Package->data($data)) {
				$Package->save();
				//删除缓存
				$cache = 'package' ;
				parent::delCache($cache);
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('package/index'),3);
			}else {
				parent::operating($request->path(),1,'新增失败'.$Package->getError());
				$this->error($Package->getError());
			}
		}else {
			parent::operating($request->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}
	
	//删除
	public function del() {
		//验证用户权限
		parent::userauth(125);
		//判断是否是ajax请求
		if (request()->isAjax()) {
			$id = input('post.id');
			if ($id=='' || !is_numeric($id)) {
				parent::operating(request()->path(),1,'参数错误');
				return array('s'=>'参数ID类型错误');
			}else {
				$id=intval($id);
				$Package= new \app\common\model\Package;
				if ($Package->where("id=$id")->delete()) {
					//删除缓存
					$cache = 'package';
					parent::delCache($cache);
					parent::operating(request()->path(),0,'删除成功');
					return array('s'=>'ok');
				}else {
					parent::operating(request()->path(),1,'删除失败');
					return array('s'=>'数据不存在');
				}
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}

	//批量删除
	public function indel() {
		//验证用户权限
		parent::userauth(125);
		if (request()->isAjax()) {
			if (!$delid=explode(',',input('post.delid',''))) {
				return array('s'=>'请选中后再删除');
			}
			$id=join(',',$delid);
			$Package= new \app\common\model\Package;
			if ($Package->where('id','IN',$id)->delete()) {
				//删除缓存
				$cache = 'package';
				parent::delCache($cache);
				parent::operating(request()->path(),0,'删除成功');
				return array('s'=>'ok');
			}else {
				parent::operating(request()->path(),1,'删除失败');
				return array('s'=>'删除失败');
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}	

	//更新
	public function edit() {
		parent::userauthHtml(124);
		$id = input('get.id');
		if ($id=='' || !is_numeric($id)) {
			parent::operating(request()->path(),1,'参数错误');
			$this->error('参数ID类型错误');
		}
		$id=intval($id);
		$Package= new \app\common\model\Package;
		if ($result=$Package->where("id=$id")->find()) {
			$this->assign('result',$result);
			return $this->fetch();
		}else {
			parent::operating(request()->path(),1,'数据不存在');
			$this->error('没有找到相关数据');
		}
	}
	
	//修改处理
	public function edit_do() {
		parent::userauthHtml(124);
		if (request()->isPost()) {
		    $id               = input('post.id');			
		    $data = array();
		    $data['price']            = input('post.price');				
			$data['title']            = input('post.title');
			input('post.states') ? $data['states'] = input('post.states') : $data['states'] = 1 ;
			$data['sort']            = input('post.sort');			
			$data['addtime']          = time();
			$data['column1']            = input('post.column1');
			$data['column2']            = input('post.column2');
			$data['column3']            = input('post.column3');
			$data['column4']            = input('post.column4');
			$data['column5']            = input('post.column5');
			$data['buyurl']            = input('post.buyurl');
			
			$Package = new \app\common\model\Package;
			//自动创建并验证数据
			if ($Package->save($data,"id=".$id)) {
				//删除缓存
				$cache = 'package';
				parent::delCache($cache);
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('package/index'),3);
			}else {
				parent::operating(request()->path(),1,'更新失败：'.$Package->getError());
				$this->error($Package->getError());
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}

}
