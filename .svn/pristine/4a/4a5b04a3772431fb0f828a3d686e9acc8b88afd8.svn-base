<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Response;
use think\Cache;

class Service extends Admin
{
	//服务项目 
	public function index() {
		parent::userauthHtml(117);
		if (request()->isAjax())
		{   
		    $title         = input('get.title');
		    $states        = input('get.states');			
    		$where = array();
			$Service = new \app\common\model\Service;
			
    		if($title!=""){
    		    $where['title'] = array("LIKE","%$title%");
    		}

			$lists  = $Service->where($where)->order('sort asc')->paginate();
    		$volist = $lists->toArray();
			//dump($volist);die;
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
	
	//添加项目
	public function add() {
		parent::userauthHtml(118);
		return $this->fetch();
	}
	
	//添加处理
	public function add_do() {
		parent::userauthHtml(118);
		$request = Request::instance();
		if (request()->isPost()) {
		    $data = array();
			
			input('post.states') ? $data['states'] = input('post.states') : $data['states'] = 1 ;
			$data['title']            = input('post.title');
			$data['sort']            = input('post.sort');
			//$data['ioc']            = input('post.ioc');			
			$data['addtime']          = time();
		
			input('post.description') && $data['description'] = htmlentities(input('post.description'));
			
			$Service = new \app\common\model\Service;
			//自动创建并验证数据
			if ($Service->data($data)) {
				$Service->save();
				//删除缓存
				$cache = 'service' ;
				parent::delCache($cache);
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('service/index'),3);
			}else {
				parent::operating($request->path(),1,'新增失败'.$Service->getError());
				$this->error($Service->getError());
			}
		}else {
			parent::operating($request->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}
	
	//删除
	public function del() {
		//验证用户权限
		parent::userauth(120);
		//判断是否是ajax请求
		if (request()->isAjax()) {
			$id = input('post.id');
			if ($id=='' || !is_numeric($id)) {
				parent::operating(request()->path(),1,'参数错误');
				return array('s'=>'参数ID类型错误');
			}else {
				$id=intval($id);
				$Service= new \app\common\model\Service;
				$info = $Service->where("id=$id")->find();
				if ($Service->where("id=$id")->delete()) {
					//删除缓存
					$cache = 'service';
					parent::delCache($cache);
					//删除原图片
					if($info['pic']){
						$primary_file = '';
						$primary_file = $info['pic'];
						$imgUrl = '/service/'.$primary_file;
						$unlink = parent::unlikFile($imgUrl);
					}
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
		parent::userauth(120);
		if (request()->isAjax()) {
			if (!$delid=explode(',',input('post.delid',''))) {
				return array('s'=>'请选中后再删除');
			}
			$id=join(',',$delid);
			$Service= new \app\common\model\Service;
			if ($Service->where('id','IN',$id)->delete()) {
				//删除缓存
				$cache = 'service';
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
		parent::userauthHtml(119);
		$id = input('get.id');
		if ($id=='' || !is_numeric($id)) {
			parent::operating(request()->path(),1,'参数错误');
			$this->error('参数ID类型错误');
		}
		$id=intval($id);
		$Service= new \app\common\model\Service;
		if ($result=$Service->where("id=$id")->find()) {
			$this->assign('result',$result);
			return $this->fetch();
		}else {
			parent::operating(request()->path(),1,'数据不存在');
			$this->error('没有找到相关数据');
		}
	}
	
	//修改处理
	public function edit_do() {
		parent::userauthHtml(119);
		if (request()->isPost()) {
		    $id               = input('post.id');			
		    $data = array();
		    //$data['ioc']            = input('post.ioc');			
			$data['title']            = input('post.title');
			input('post.states') ? $data['states'] = input('post.states') : $data['states'] = 1 ;
			$data['sort']            = input('post.sort');			
			$data['addtime']          = time();
		
			input('post.description') && $data['description'] = htmlentities(input('post.description'));
			$Service = new \app\common\model\Service;
			//自动创建并验证数据
			if ($Service->save($data,"id=".$id)) {
				//删除缓存
				$cache = 'service';
				parent::delCache($cache);
				//删除原图片
				if(!empty($_FILES['pic']['tmp_name'])){
					$primary_file = '';
					$primary_file = input('post.primary_service');
					if(!empty($primary_file)){
						$imgUrl = '/service/'.$primary_file;
						$unlink = parent::unlikFile($imgUrl);
					}
				}
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('service/index'),3);
			}else {
				parent::operating(request()->path(),1,'更新失败：'.$Service->getError());
				$this->error($Service->getError());
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}

}
