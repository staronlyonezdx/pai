<?php
/**
* 网站参数Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\config;
use app\data\model\config;
use app\data\model\config\ConfigModel  as ConfigModel;
use app\data\service\BaseService as BaseService;

class ConfigService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->config = new ConfigModel();
		$this->cache = 'config';
	}
	
    /**
     * 查询网站参数列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configList($where='', $field='*', $order='c_id asc')
	{
		$list = $this->config->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取网站参数信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configInfo($where='', $field='*')
	{		
		$info =  $this->config->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计网站参数数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configCount($where='')
	{		
		$Count =  $this->config->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00           
     */	
	public function configSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->config->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00           
     */	
	public function configSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->config->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00          
     */	
	public function configColumn($where='', $field='')
	{		
		$Column =  $this->config->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条网站参数数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configAdd($data='')
	{
		$list = $this->config->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条网站参数数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configAddAll($data='')
	{
		$list = $this->config->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 网站参数分页查询(旧)
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configPageList($where='', $field='*', $order="c_id asc", $page=15)
	{
		
		$list = $this->config->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}

    /**
     * 网站参数分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-06-29 14:46:00
     */
    public function configPaginate($where='', $field='*', $order="c_id asc",$page=15)
    {
        $list = $this->config->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新网站参数数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
    public function configSave($where="", $data="")
    {	
        $save = $this->config->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条网站参数数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00      
     */
    public function configDel($where='')
    {		
        $del = $this->config->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条网站参数数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00       
     */
    public function configDelMost($id_arr='')
    {		
        $delAll = $this->config->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 网站参数列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configListShow($type=0) 
	{
    	$where = array();
		
		$where['c_id'] = array('>',0);
    	$lists  = $this->configPageList($where);
		$volist = false;
		if($lists && !$type)
		{
			$volist = $lists->toArray();
		}
		else if($lists && $type)
		{
			$volist = $lists;
		}
        return $volist;
	}
	
    /**
     * 按条件更新网站参数
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configRoomEdit() 
	{
		$id = input('get.c_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['c_id'] = $id;
		$result = false;		
    	$result = $this->configInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理网站参数
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configRoomEditDoo() 
	{
		$id = input('post.c_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 网站参数POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['c_id'] = $id;
		if($this->configSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除网站参数操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configRoomDel() 
	{
		$id = input('post.c_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['c_id'] = $id;
    	$info = $this->configInfo($where);
		if($info && $this->configDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}	
	
    /**
     * 批量删除网站参数
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->configDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 添加一条网站参数
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function configRoomAdd() 
	{
		// 网站参数POST数据
		$type = 'add';
		$data = $this->inputData($type);		
		if($this->configAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 网站参数POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-29 14:46:00
     */
	public function inputData($type) 
	{
		$data = array();
		switch($type)
		{
			case 'edit';
			break;
			case 'add';
				$data['Dtime'] = date('Y-m-d H:i:s',time()) ;
			break;
		}   	
		$data['configname']    = input('post.configname');
		$data['Description'] = input('post.description');
		$data['Competence']  = input('post.comp');
		$data['Status']      = input('post.status');		
		return $data;
	}

    /**
     * 数据验证
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function checkData($data=[]){
        $error_msg = "";
        //参数名
        if(isset($data['c_name'])){
            if($data['c_name'] == ''){
                $error_msg .= "网站参数名不能为空";
            }
        }

        //参数名
        if(isset($data['c_code'])){
            if($data['c_code'] == ''){
                $error_msg .= "网站参数字段不能为空";
            }
        }

        //参数名
        if(isset($data['c_value'])){
            if($data['c_value'] == ''){
                $error_msg .= "网站参数值不能为空";
            }
        }

        //显示状态
        if(isset($data['c_state'])){
            if($data['c_state'] != 0 && $data['c_state'] != 1){
                $error_msg .= "显示状态设置有误！";
            }
        }

        return $error_msg;
    }

    /**
     * 获取某字段的值
     * 邓赛赛
     */
    public function configGetValue($where,$field)
    {
        $value = $this->config->get_value($where, $field);
        return $value;
    }
}