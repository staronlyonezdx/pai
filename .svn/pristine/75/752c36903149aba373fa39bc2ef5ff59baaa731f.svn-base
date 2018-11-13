<?php
namespace app\data\service\api;
use app\data\model\api\ApiModel  as ApiModel;
use app\data\service\BaseService as BaseService;
use think\Cookie;


class ApiService extends BaseService
{
	protected $cache = 'api';
	
	public function __construct()
	{
		parent::__construct();
		$this->api = new ApiModel();
		$this->cache = 'api';
		
	}

    /**
     * 查询API_TOKEN列表
     */
	public function apitokenList($where='', $order='at_id asc', $field='*', $cache='api')
	{
        $table="api_token";
		$list = $this->api->getList2($table,$where, $order, $field, $cache);
		return $list;
	}
	
    /**
     * 获取API_TOKEN信息
     */
	public function apitokenInfo($where='', $field='*')
	{		
		$info =  $this->api->getInfo($where, $field, $this->cache);
		return $info;
	}

    /**
     * 获取API_TOKEN获取记录信息
     */
    public function apitokenrequestrecordInfo($where='', $field='*')
    {
        $table="api_token_request_record";
        $info =  $this->api->getInfo2($table,$where, $field, $this->cache);
        return $info;
    }
	
    /**
     * 条件统计API_TOKEN数量
     */
	public function apitokenCount($where='')
	{		
		$Count = $this->api->table("api_token")->getCount($where);
		return $Count;
	}

    /**
     * 更新API_TOKEN某个字段的值
     */	
	public function apitokenSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->api->table("api_token")->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}
	
    /**
     * 添加一条api_token数据
     */
	public function apitokenAdd($data='')
	{
        $table="api_token";
        $list = $this->api->getAdd2($table,$data, $this->cache);
		return $list;
	}

    /**
     * 添加一条api_token_record数据
     */
    public function apitokenrecordAdd($data='')
    {
        $table="api_token_request_record";
        $list = $this->api->getAdd2($table,$data, $this->cache);
        return $list;
    }

    /**
     * 添加一条api_token数据
     */
    public function apisql($data='')
    {
        $table="api_token";
        $list = $this->api->getsql();
        return $list;
    }
	
	
    /**
     * 添加多条api_token数据
     */
	public function apitokenAddAll($data='')
	{
		$list = $this->api->table("api_token")->getAddAll($data, $this->cache);
		return $list;
	}
	
	/**
     * 更新api_token数据
     */
    public function apitokenSave($where="", $data="")
    {
        $table="api_token";
        $save = $this->api->getSave2($table,$where, $data, $this->cache);
		return $save;       
    }

    /**
     * 更新api_token_record数据
     */
    public function apitokenrecordSave($where="", $data="")
    {
        $table="api_token_request_record";
        $save = $this->api->getSave2($table,$where, $data, $this->cache);
        return $save;
    }
	
    /**
     * 删除一条api_token数据
     */
    public function apitokenDel($where='')
    {		
        $del =  $this->api->table("api_token")->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条菜单数据
     */
    public function apitokenDelMost($id_arr='')
    {		
        $delAll = $this->api->table("api_token")->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }

	
	
}