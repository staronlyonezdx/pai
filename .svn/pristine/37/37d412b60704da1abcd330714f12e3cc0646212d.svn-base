<?php

namespace app\data\service\api;
use app\data\model\api\ApiModel  as ApiModel;
use app\data\service\BaseService as BaseService;
use think\Cookie;
use think\Db;
use think\Request;
use think\image;


class ApimoneyService extends BaseService
{
	protected $cache = 'api';
	public function __construct()
	{
		parent::__construct();
		$this->api = new ApiModel();
		$this->cache = 'api';
		
	}
    //读取商品库存，商品限购
    public function doget_goods_xg($gp_id){
        $table="goods";
        $sql="select gp.gp_stock stock,g.g_limited xgnum from pai_goods_product gp LEFT join pai_goods g ON gp.g_id=g.g_id where gp.gp_id=$gp_id ";
        $list=Db::table($table)->query($sql);
        $n=array();
       if(!empty($list[0])){
           $n=$list[0];
       }
        return $n;
    }


	
	
}