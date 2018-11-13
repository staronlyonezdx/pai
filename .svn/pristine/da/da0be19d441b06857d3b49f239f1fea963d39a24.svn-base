<?php
/**
* 商品特殊属性Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\goodsSpec;
use app\data\model\goodsSpec;
use app\data\model\goodsSpec\GoodsSpecModel  as GoodsSpecModel;
use app\data\service\BaseService as BaseService;

class GoodsSpecService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->goodsSpec = new GoodsSpecModel();
		$this->cache = 'goods_spec';
	}
	
    /**
     * 查询商品特殊属性列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecList($where='', $field='*', $order='gs_id asc')
	{
		$list = $this->goodsSpec->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取商品特殊属性信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecInfo($where='', $field='*')
	{		
		$info =  $this->goodsSpec->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计商品特殊属性数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecCount($where='')
	{		
		$Count =  $this->goodsSpec->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00           
     */	
	public function goodsSpecSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->goodsSpec->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00           
     */	
	public function goodsSpecSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->goodsSpec->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00          
     */	
	public function goodsSpecColumn($where='', $field='')
	{		
		$Column =  $this->goodsSpec->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条商品特殊属性数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecAdd($data='')
	{
		$list = $this->goodsSpec->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条商品特殊属性数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecAddAll($data='')
	{
		$list = $this->goodsSpec->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 商品特殊属性分页查询(旧)
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecPageList($where='', $field='*', $order="gs_id asc", $page=15)
	{
		
		$list = $this->goodsSpec->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}

    /**
     * 商品特殊属性分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function goodsSpecPaginate($where='', $field='*', $order="gs_id asc",$page=15)
    {
        $list = $this->goodsSpec->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新商品特殊属性数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
    public function goodsSpecSave($where="", $data="")
    {	
        $save = $this->goodsSpec->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条商品特殊属性数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00      
     */
    public function goodsSpecDel($where='')
    {		
        $del = $this->goodsSpec->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条商品特殊属性数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00       
     */
    public function goodsSpecDelMost($id_arr='')
    {		
        $delAll = $this->goodsSpec->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 商品特殊属性列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecListShow($type=0) 
	{
    	$where = array();
		
		$where['gs_id'] = array('>',0);
    	$lists  = $this->goodsSpecPageList($where);
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
     * 按条件更新商品特殊属性
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecRoomEdit() 
	{
		$id = input('get.gs_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['gs_id'] = $id;
		$result = false;		
    	$result = $this->goodsSpecInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理商品特殊属性
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecRoomEditDoo() 
	{
		$id = input('post.gs_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 商品特殊属性POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['gs_id'] = $id;
		if($this->goodsSpecSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除商品特殊属性操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecRoomDel() 
	{
		$id = input('post.gs_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['gs_id'] = $id;
    	$info = $this->specInfo($where);
		if($info && $this->specDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}	
	
    /**
     * 批量删除商品特殊属性
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->specDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 添加一条商品特殊属性
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsSpecRoomAdd() 
	{
		// 商品特殊属性POST数据
		$type = 'add';
		$data = $this->inputData($type);		
		if($this->specAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 商品特殊属性POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
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
		$data['specname']    = input('post.specname');
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
        //分类名
        if(isset($data['gs_name'])){
            if($data['gs_name'] == ''){
                $error_msg .= "属性名不能为空";
            }
        }

        //显示状态
        if(isset($data['state'])){
            if($data['state'] != 0 && $data['state'] != 1){
                $error_msg .= "显示状态设置有误！";
            }
        }

        return $error_msg;
    }
	
}