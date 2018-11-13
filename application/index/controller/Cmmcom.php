<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Config;
use think\Cache;
use think\Session;

class Cmmcom extends Controller
{
	/*
	* 数据初始化
	* 创建人 韦丽明
	* 时间 2017-09-16 20:12:55
	*/	
	public function _initialize() 
	{
		//网站配置数据
		$webConfig = $this->webData();
		//地址（底部联系方式）
		$address = $this->address();
		//当前商品分类ID
		$gclass_id = 0;
		//产品分类ID
		$pid = input('get.classid');
		if(!$pid)
		{
			$pid = 0;
		}		
		
		$this->assign('config',$webConfig);		
		$this->assign('address',$address);
		$this->assign('Home','');//导航高亮
		$this->assign('About','');//导航高亮
		$this->assign('Products','');//导航高亮
		$this->assign('Inquiry','');//导航高亮
		$this->assign('Service','');//导航高亮
		$this->assign('Certificates','');//导航高亮
		$this->assign('Contact','');//导航高亮
		$this->assign('classid',$pid);//分类高亮
	}
	
	/*
	* 地址（底部联系方式）
	* 创建人 韦丽明
	* 时间 2017-09-16 20:40:11
	*/	
    protected function address()
    {
		$cache = "address" ;
		$info = Cache::get($cache); 
		if(!$info)
		{
			$address = new \app\data\service\address\AddressService();			
			$info = $address->addressInfo();
			Cache::set($cache,$info);			
		}
		return $info;
		
    }	
	
	/*
	* 操作记录
	* 创建人 韦丽明
	* 时间 2017-09-11 13:22:15
	*/
	public function operating($url,$status,$description) 
	{
		$operating = new \app\data\service\operating\OperatingService();
		$result = $operating->operatingRoomAdd($url, $status, $description);
	}
	
	/*
	*网站配置数据
	*/
    protected function webData()
    {
	   $list = array();
	   $config = array();      
	   //后台设置输出数量
		$set = new \app\data\service\system\SetService();
		$list = $set->setListShow();

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
			$this->assign('setconfig',$config);			
		}
		return $config;
    }


}
