<?php
namespace app\index\controller;
use think\Response;
class Products extends Cmmcom
{
	/*
	* 商品列表
	*/
    public function goodslist()
    {
		$Products = 'active';
		$pid = input('get.classid');
		if(!$pid)
		{
			$pid = 1;
		}		
    	$goods = new \app\data\service\goods\GoodsService();
		$gclass = new \app\data\service\goods\GclassService();
		$type = 1;
    	$lists = $goods->goodsListShow($type, $page=9, $pid);
		$result = $lists->toArray();						
		$volist = $gclass->goodsGcalss($result);
		$endArr = 0;
		if($volist['data'])
		{
			$endArr = end($volist['data']);
		}		
		//产品分类
		$goodsClass = $gclass->gclassAll();

		$this->assign('gclass',$goodsClass);//产品分类
		$this->assign('endArr',$endArr);//最后一个数组
		$this->assign('volist',$volist);
		$this->assign('lists',$lists);
		$this->assign('classid',$pid);//分类高两
		$this->assign('Products',$Products);//导航高亮		
        return $this->fetch();
    }
	
	/*
	* 商品详情
	*/	
    public function index()
    {
		$Products = 'active';
		$gid = input('get.gid');
		$op = input('get.op') ;
		if(!empty($gid) && is_numeric($gid) && $op==='index')
		{
			$where = array();
			$goods = new \app\data\service\goods\GoodsService();
			$gclass = new \app\data\service\goods\GclassService();
			
			$where['goods_id'] = input('get.gid');
			$info = $goods->goodsInfo($where);
			$info['p_name'] = $gclass->goodsGcalss($info['pid']);
			//产品属性
			if($info['organizers'])
			{
				$info['organizers'] = json_decode($info['organizers']);
				 if(is_object($info['organizers'])) 
				 {  
					$info['organizers'] = (array)$info['organizers'];  
				 }
			}
			//产品分类
			$goodsClass = $gclass->gclassAll();	
			
			$this->assign('gclass',$goodsClass);
			$this->assign('organizers',$info['organizers']);
			$this->assign('goods',$info);
		}
		else
		{
			$this->error("404 Not found!");
		}
		$this->assign('Products',$Products);//导航高亮
        return $this->fetch();
    }	

	

	
}
