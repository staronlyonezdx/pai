<?php
namespace app\cmmadmin\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Response;
use think\Cache;

class Video extends Admin
{
	//视频区 
	public function index() {
		parent::userauthHtml(112);
		if (request()->isAjax())
		{   
		    $title         = input('get.title');
		    $op            = input('get.video');
		    $states        = input('get.states');			
    		$where = array();
			$Video = new \app\common\model\Video;
			
    		if($title!=""){
    		    $where['title'] = array("LIKE","%$title%");
    		}

			$lists  = $Video->where($where)->order('id desc')->paginate();
    		$volist = $lists->toArray();
			//dump($volist);die;
            return Response::create($volist, 'json');
		}
		return $this->fetch();
	}
	
	//添加视频
	public function add() {
		parent::userauthHtml(113);
		return $this->fetch();
	}
	
	//添加处理
	public function add_do() {
		parent::userauthHtml(113);
		$request = Request::instance();
		if (request()->isPost()) {
		    $data = array();
		    if(!empty($_FILES['pic']['tmp_name'])){
				$type = 1 ;
		        $file = parent::upload('video_pic', 'pic', $type);
		        if($file){
		            $data['pic'] = $file->getSaveName();	
		        }else{
		            $this->error($file->getError());
		        }
		    }
			$data['flvurl']          = input('post.flvurl');
			if ($data['flvurl'] && !empty($_FILES['fileurl']['tmp_name'])) {
				$this->error('“视频地址”和“上传视频”只能二选一');
			}
			
		    if(!empty($_FILES['fileurl']['tmp_name'])){
		        $video = parent::uploadFile('video', 'fileurl');
		        if($video){
		            $data['fileurl'] = $video;				
		        }
		    }
			input('post.states') ? $data['states'] = input('post.states') : $data['states'] = 1 ;
			$data['title']            = input('post.title');			
			$data['author']           = input('post.author');			
			$data['download']         = input('post.download');
			$data['flvname']          = input('post.flvname');			
			$data['addtime']          = time();
		
			input('post.description') && $data['description'] = htmlentities(input('post.description'));
			
			$Video = new \app\common\model\Video;
			//自动创建并验证数据
			if ($Video->data($data)) {
				$Video->save();
				//删除缓存
				$cache = 'video' ;
				parent::delCache($cache);
				//删除缓存
				$cache = 'video_one';
				parent::delCache($cache);
				parent::operating($request->path(),0,'新增成功');
				$this->success('添加成功',url('video/index'),3);
			}else {
				parent::operating($request->path(),1,'新增失败'.$Video->getError());
				$this->error($Video->getError());
			}
		}else {
			parent::operating($request->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}
	
	//删除
	public function del() {
		//验证用户权限
		parent::userauth(115);
		//判断是否是ajax请求
		if (request()->isAjax()) {
			$id = input('post.id');
			if ($id=='' || !is_numeric($id)) {
				parent::operating(request()->path(),1,'参数错误');
				return array('s'=>'参数ID类型错误');
			}else {
				$id=intval($id);
				$Video= new \app\common\model\Video;
				$info = $Video->where("id=$id")->find();
				if ($Video->where("id=$id")->delete()) {
					//删除缓存
					$cache = 'video';
					parent::delCache($cache);
					//删除缓存
					$cache = 'video_one';
					parent::delCache($cache);
					//删除原图片
					if($info['pic']){
						$primary_file = '';
						$primary_file = $info['pic'];
						$imgUrl = '/video_pic/'.$primary_file;
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
		parent::userauth(115);
		if (request()->isAjax()) {
			if (!$delid=explode(',',input('post.delid',''))) {
				return json(['s'=>'请选中后再删除']);
			}
			$id=join(',',$delid);
			$Video= new \app\common\model\Video;
			if ($Video->where('id','IN',$id)->delete()) {
				//删除缓存
				$cache = 'video' ;
				parent::delCache($cache);
				parent::operating(request()->path(),0,'删除成功');
				return json(['s'=>'ok']);
			}else {
				parent::operating(request()->path(),1,'删除失败');
				return array('s'=>'删除失败');
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			return json(['s'=>'非法请求']);
		}
	}	

	//更新
	public function edit() {
		parent::userauthHtml(114);
		$id = input('get.id');
		if ($id=='' || !is_numeric($id)) {
			parent::operating(request()->path(),1,'参数错误');
			$this->error('参数ID类型错误');
		}
		$id=intval($id);
		$Video= new \app\common\model\Video;
		if ($result=$Video->where("id=$id")->find()) {
			$this->assign('result',$result);
			return $this->fetch();
		}else {
			parent::operating(request()->path(),1,'数据不存在');
			$this->error('没有找到相关数据');
		}
	}
	
	//修改处理
	public function edit_do() {
		parent::userauthHtml(114);
		if (request()->isPost()) {
		    $id               = input('post.id');			
		    $data = array();
		    if(!empty($_FILES['pic']['tmp_name'])){
				$type = 1 ;
		        $file = parent::upload('video_pic', 'pic', $type);
		        if($file){
		            $data['pic'] = $file->getSaveName();	
		        }else{
		            $this->error($file->getError());
		        }
		    }
			$data['flvurl']          = input('post.flvurl');
			if ($data['flvurl'] && !empty($_FILES['fileurl']['tmp_name'])) {
				$this->error('“视频地址”和“上传视频”只能二选一');
			}
			
		    if(!empty($_FILES['fileurl']['tmp_name'])){
		        $video = parent::uploadFile('video', 'fileurl');
		        if($video){
		            $data['fileurl'] = $video;				
		        }
		    }
			
			$data['title']            = input('post.title');			
			$data['author']           = input('post.author');			
			$data['download']         = input('post.download');
			$data['flvname']          = input('post.flvname');
			input('post.states') ? $data['states'] = input('post.states') : $data['states'] = 1 ;			
			$data['addtime']          = time();
		
			input('post.description') && $data['description'] = htmlentities(input('post.description'));
			$Video = new \app\common\model\Video;
			//自动创建并验证数据
			if ($Video->save($data,"id=".$id)) {
				//删除缓存
				$cache = 'video';
				parent::delCache($cache);
				//删除原图片
				if(!empty($_FILES['video_pic']['tmp_name'])){
					$primary_file = '';
					$primary_file = input('post.primary_video');
					if(!empty($primary_file)){
						$imgUrl = '/video_pic/'.$primary_file;
						$unlink = parent::unlikFile($imgUrl);
					}
				}
				parent::operating(request()->path(),0,'更新成功');
				$this->success('修改成功',url('video/index'),3);
			}else {
				parent::operating(request()->path(),1,'更新失败：'.$Video->getError());
				$this->error($Video->getError());
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			$this->error('非法请求');
		}
	}

}
