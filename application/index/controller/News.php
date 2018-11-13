<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Config;
use think\Cache;
use think\Session;
//use app\index\Cmmcom;

class News extends Cmmcom
{
	/*
	* 关于我们
	*/
    public function about()
    {
		$About = 'active';
		$cache = "" ;
    	$news = new \app\data\service\news\NewsService();
		$where = array();
		$where['pid'] = 4 ;
    	$lists = $news->newsList($where, $cache);
		$id = input('get.get_id');
		if(!$id && $lists)
		{
		   $id = $lists[0]['ID'] ; 
		}
		$where['ID'] = $id ;
		$info = $news->newsInfo($where);
		//dump($id);die;
		$this->assign('About',$About);//导航高亮
		$this->assign('lists',$lists);
		$this->assign('info',$info);
		$this->assign('getid',$id);
        return $this->fetch();
    }
	
	/*
	* 服务
	*/	
	public function service()
	{
		$Service = 'active';
		$cache = "" ;
    	$news = new \app\data\service\news\NewsService();
		$where = array();
		$where['pid'] = 2 ;
    	$lists = $news->newsList($where, $cache);
		$id = input('get.get_id');
		if(!$id && $lists)
		{
		   $id = $lists[0]['ID'] ; 
		}
		$where['ID'] = $id ;
		$info = $news->newsInfo($where);
		//dump($id);die;
		$this->assign('Service',$Service);//导航高亮
		$this->assign('lists',$lists);
		$this->assign('info',$info);
		$this->assign('getid',$id);		
        return $this->fetch();		
	}
	
}
