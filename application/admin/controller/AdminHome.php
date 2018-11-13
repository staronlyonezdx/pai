<?php
namespace app\admin\controller;
use app\data\service\admin\AdminService;
use think\Controller;
use think\Cookie;
use think\Db;
use think\Request;
use think\Url;
use think\Session;
use think\Config;
use think\Cache;
use think\Image;

use app\data\service\BaseService as BaseService;

class AdminHome extends Controller
{
	public function _initialize() 
	{
		$admin_id   = $this->checkAdminCookie();
        $this->initMenu($admin_id);
        $request    = Request::instance();
        $cmenu      = $request->controller();//控制器
        $module     = $request->module();//模块
        $action     = $request->action();//方法
        $path       = '/'. $module .'/'.$cmenu .'/'. $action;//访问地址
        $auth       = Db::table('pai_menu')->where('menu_url',$path)->value('menu_auth_ids');
        $auth_now   = Cookie::get('authority_id');
        $auth_arr   = explode(',',$auth);
        $auth_array = explode(',',$auth_now);
        $result     = array_intersect($auth_arr,$auth_array);//权限id交集

        if (!$result){
            $this->error('无权限访问!',url('adminindex/index'),3);
        }
        $this->assign("cmenu",$cmenu);
	}

    public function initMenu($admin_id)
    {
        $menu = new \app\data\service\admin\MenuService();
        $where['menu_parent_id'] = 0;
        $where['is_menu']        = 1;
        //根据用户admin_site获取列表
//        $admin = new AdminService();
//        $where1 = [
//            'admin_id'=>$admin_id
//        ];
//        $admin_site = $admin->adminInfo($where1,'admin_site');
//        $where['menu_site']=empty($admin_site['admin_site']) ? 1 : $admin_site['admin_site'];
        $menulist = $menu->menulist($where);

        //获取权限id
        $admin_info = Db::table('pai_admin a')->join('pai_admin_role r', 'a.role_id = r.role_id')
            ->where('a.admin_id', $admin_id)
            ->find();
        $authority_ids = $admin_info['authority_id'];
        $admin_name    = $admin_info['admin_name'];
        $auth_ids      = explode(",",$authority_ids);
        if ($menulist){
            foreach($menulist as $k=>$v) {
                $auth_arr = explode(",", $v['menu_auth_ids']);
                $result   = array_intersect($auth_ids,$auth_arr);
                if ($result){
                    $son = array();
                    $where_s = "is_menu = 1 and menu_parent_id=" . $v['menu_id'];
                    $order_s = "menu_sort asc";
                    $menulist_son = $menu->menuList($where_s,$order_s);
                    foreach ($menulist_son as $key=>$value){
                        $auth_val = explode(",",$value['menu_auth_ids']);
                        $res      = array_intersect($auth_ids,$auth_val);
                        if ($res){
                            $son[] = $value;
                        }
                    }
                    $menulist[$k]['menu_son'] = $son;
                }else{
                    unset($menulist[$k]);
                }
            }
        }
//        foreach($menulist as $k=>$v) {
//            $where_s = "menu_parent_id=" . $v['menu_id'];
//            $order_s="menu_sort asc";
//            $menulist_son = $menu->menuList($where_s,$order_s);
//            $menulist[$k]['menu_son'] = $menulist_son;
//        }

        $this->assign("admin_name",$admin_name);
        $this->assign("adminmenulist",$menulist);

    }
	
	/**
	* 管理员登录状态
	* 创建人 韦丽明
	* 更新时间 2017-09-07 16:02:15
	*/	
	public function checkAdminSession() 
	{

		$Base = new BaseService();
		$result = $Base->checkAdminSession();
		if(false===$result)
		{
			$this->error('您还没有登录',url('index/index'));
		}
		else if(is_numeric($result))
		{
			//在线人数统计
			$this->statis($result);
		}
		else
		{
			$this->error($result,url('index/index'));
		}		
	}

    /**
     * 管理员登录状态
     * 创建人 刘勇豪
     * 更新时间 2018-06-26 06:26:00
     */
    public function checkAdminCookie()
    {

        $Base = new BaseService();
        $result = $Base->checkAdminCookie();
        if(false===$result)
        {
            $this->error('您还没有登录',url('login/index'));
        }
        else if(is_numeric($result))
        {
            return $result;//返回登陆者的admin_id
            //在线人数统计()
            //$this->statis($result);
        }
        else
        {
            $this->error($result,url('login/index'));
        }
    }
	
    /**
     * 操作记录
	 * 创建人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */
	public function operating($url,$status,$description) 
	{
		$operating = new \app\data\service\operating\OperatingService();
		$result = $operating->operatingRoomAdd($url, $status, $description);
	}
	
    /**
     * 用户权限验证1(ajax发送返回验证)
	 * 创建人 韦丽明
	 * 时间 2017-09-10 21:43:05
     */	
	public function userauth($auth) 
	{
		$Base = new BaseService();
		$result = $Base->userauthHtml($auth);
		if(false===$result)
		{
			$err=array('s'=>'抱歉，您没有此操作权限');
			exit(json_encode($err));
		}
	}

	/**
     * 用户权限验证2(页面)
	 * 创建人 韦丽明
	 * 时间 2017-09-10 20:28:01
     */
	public function userauthHtml($auth) 
	{
		
		$Base = new BaseService();
		$result = $Base->userauthHtml($auth);
		if(false===$result)
		{
			$this->assign('content', '抱歉，您没有此操作权限');
			exit($this->fetch('public/error'));
		}
	}
	
    /**
     * 商品分类列表
	 * 创建人 韦丽明
	 * 时间 2017-09-11 17:45:22
     */
	public function gclassAll() 
	{
		$where = array();
		$where['gc_id'] = ['>',0];
		$where['states'] = ['>',0];
		$field = 'gc_id,name_en,name_ch,pid';
    	$gclass = new \app\data\service\goods\GclassService();
    	$volist = $gclass->gclassList($where, $field);
		return $volist;
	}

    /**
     * 在线人数统计
	 * 创建人 韦丽明
	 * 时间 2017-09-06 21:15:11
     */	
	public function statis($uid) 
	{
		$statis = new \app\data\service\statis\StatisService();
		$where['Dtime'] = array('LT', time()-120);
		if ($statis->statisCount("Uid = $uid")) 
		{
			$statis->statisSave("Uid = $uid", array('Dtime' => time()));
			$statis->statisDel($where);
		}
		else 
		{
			$statis->statisDel($where);
			$time = time();
			$statis->statisSave("Uid = $uid", array('Dtime' => time()));
		}
	}
	
	//更新缓存
	public function upadteCache($cache, $data)
	{
		$cache = Cache::set($cache, $data);
	}
	
	//获取缓存
	public function getCache($cache)
	{
		$cache = Cache::get($cache);
	}
	
	//删除缓存
	public function delCache($cache)
	{
		$cache = Cache::rm($cache);
	}
	
	//更新session
	public function updateSession($name, $value) 
	{
		Session::set($name, $value);
	}
	
    /**
     *  按条件查询所有权限
	 * 创建人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */	
	protected function comptList($type=0) 
	{		
		$compt = new \app\data\service\competence\CompetenceService();
		$where = array();
		$result = array();
		$where['Sid'] = 0;
		$where['Status'] = 0;
		$filed = 'ID,Sid,Cname,Status';
		if(!$type)
		{
			$result['slist'] = $compt->competenceColumn('Sid<>0 AND Status=0', $filed);
		}		
		$result['volist'] = $compt->competenceColumn($where, $filed);
		return  $result ;
	}

    /**
     *  一键清空缓存
	 * 修改人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */	
	public function clearcache() 
	{
		//验证用户权限
		$this->userauth(24);
        $request = Request::instance();
		if ($request->isAjax()) 
		{
			if (input('request.clear')=='ok') 
			{
				//清楚缓存
				self::delAllDir();
				//加载网站设置
				$set = new \app\data\service\system\SetService();
				$list = $set->setListShow();
				return json(['s'=>'ok']);
			}
			else 
			{
				return json(['s'=>'非法请求']);
			}
		}
		else 
		{
			return json(['s'=>'非法请求']);
		}
		
	}
	
    /**
     *  删除所有Runtime文件
	 * 修改人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */	
	public function delAllDir() 
	{
        $request = Request::instance();
		//清楚缓存
		Cache::clear();
		$fileDel = ROOT_PATH.'runtime';
			
		if (!file_exists($fileDel)) 
		{
			$fileDel = ROOT_PATH.'runtime';
		}
					
		if (file_exists($fileDel)) 
		{
			$this->delDir($fileDel);
			$this->operating($request->path(),0,'清空站点缓存');
			return json(['s'=>'ok']);
		}
		else 
		{
			return json(['s'=>'缓存目录不存在']);
		}	return json(['s'=>'非法请求']);
	}

    /**
     *  删除文件
	 * 修改人 韦丽明
	 * 时间 2017-09-14 21:39:01
     */	
	public function delDir($dirName) 
	{
		 $dh = opendir($dirName);
		 
		 //循环读取文件
		 while ($file = readdir($dh)) 
		 {
			 if($file != '.' && $file != '..'){
				 $fullpath = $dirName . '/' . $file;
				 
				 if(!is_dir($fullpath)){					
					 //判断是否是日志文件,不删除日志文件
					 $path = pathinfo($fullpath,PATHINFO_EXTENSION);
					  if($path!='log'){
						  //dump($path);die;
						 //如果不是,删除该文件
						 if(!unlink($fullpath)){
							 echo $fullpath . '无法删除,可能是没有权限!<br>';
						 }
					  }
				 }else{
					 //如果是目录,递归本身删除下级目录
					 $this->delDir($fullpath);
				 }
			 }
		 }
		 //关闭目录
		 closedir($dh);
	}		
	
	
	//删除图片
	public function unlikFile($imgUrl='', $type=0){
		//判读图片是否存在
		if(!$type){
			$fileDel = ROOT_PATH.'public/uploads'.$imgUrl;
		}else{
			$fileDel = $imgUrl;
		}
		
		if(file_exists($fileDel)){
			unlink($fileDel);
			return true;
		}else{
			return false;
		}		
	}
	
	//上传图片
	public function upload($name='', $file = "attach_file", $type=0, $w=350 ,$h=350){
		
	    // 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file($file);
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . $name);
		
	    if($info){
	         //生成缩略图
			 //dump($info);die;
			 if ($type===2) {
				$thumb = $this->thumbImg($info->getSaveName(), $name, $type, $w, $h); 
			 }else if($type==1){
				 $imgUrl = ROOT_PATH.'public' . DS . 'uploads'. DS . $name . DS .$info->getSaveName();
				 $image = \think\Image::open($imgUrl);
				 $image->thumb($w ,$h)->save($imgUrl);
			 }			 
	    }else{
	        // 上传失败获取错误信息
	        //echo $file->getError();
	    }
		if($type===2){
			$pic = array('info'=>$info,'thumb'=>$thumb);
			return $pic;
		}else{
			return $info;
		}	    
	}
	
	//上传视频
	public function uploadFile($name='', $file = "video", $type=0, $w=375 ,$h=286){
		
	    // 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file($file);
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $info = $file->validate(['size'=>999999999,'ext'=>'flv,swf,mkv,avi,rm,rmvb,mpeg,mpg,ogg,ogv,mov,wmv,mp4,webm,mp3'])->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . $name);

	    if($info){
		 
	    }else{
	        // 上传失败获取错误信息
	        echo $file->getError();die();
	    }
		return '/uploads/'.$name.'/'.$info->getSaveName();	    
	}
	
	//链接请求
	public function link() {
		$with = D('With');
		$Uid = $_SESSION['ThinkUser']['ID'];
		$date = date('Y-m-d H:i:s');
		//总跟单数
		$withlist = $with->relation(true)->where("Uid = $Uid AND Status = 0 AND Remind = 0 AND RemindTime <= '$date'")->count();
		R('Public/errjson',array($withlist));
	}
	
	/*
	* 图片压缩
	*/
	public function thumbImg($img, $name, $type ,$w=375 ,$h=286, $goods=''){
		
		$img = './uploads/'.$name.'/'.$img;
		// 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
		$riqi = date("Y-m-d",time());
		if ($goods) {
			$g_id = $goods['goods_id'] ;
		} else {
			$g_id = time() ;
		}
		
		if ($type==1) {
			$name = './uploads/thumb/'.$name.'/item'.$g_id.".jpg";
		} else if ($type==2) {
				
			$url = './uploads/thumb/'.$name;			
			@mkdir('./uploads/thumb/',777,true);
			@mkdir($url,777,true);
			@chmod($url, 0777);
				
			$path = $url ;
			if (!file_exists($path)){
				define($path, __DIR__);
				mkdir($path); 
			}
				
			$path2 = $url.'/'.$riqi;
			@mkdir($path2,777,true);
			@chmod($path2, 0777);				
			if (!file_exists($path2)) {
				mkdir($path2); 
			}				
			$name = $path2.'/'.$name.$g_id.".jpg";
		}

		if (file_exists($img)) {
			if (!file_exists($name)) {	
				$image = \think\Image::open($img);				
				//dump($name);die;
				$image->thumb($w, $h,\think\Image::THUMB_CENTER)->save($name,'jpg');
			}
			$name = substr($name,1);
			$pic = $name ;
			return $pic;		
		}
	 }	 
	 
	/*
	 *excel导出
	 */
	public function export($data, $fields, $savename, $suffix = 'xlsx'){
		//dump($fields);die;
		$Excel = new Excel();
		$Excel->export($data, $fields, $savename, $title = 'Sheet1', $suffix);
	
	 }

}
