<?php
/**
* 商品品牌Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\goodsBrand;
use app\data\model\goodsBrand;
use app\data\model\goodsBrand\GoodsBrandModel  as GoodsBrandModel;
use app\data\service\BaseService as BaseService;

class GoodsBrandService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->goodsBrand = new GoodsBrandModel();
		$this->cache = 'goods_brand';
	}
	
    /**
     * 查询商品品牌列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandList($where='', $field='*', $order='gb_id asc')
	{
		$list = $this->goodsBrand->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取商品品牌信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandInfo($where='', $field='*')
	{		
		$info =  $this->goodsBrand->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计商品品牌数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandCount($where='')
	{		
		$Count =  $this->goodsBrand->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00           
     */	
	public function goodsBrandSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->goodsBrand->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00           
     */	
	public function goodsBrandSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->goodsBrand->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00          
     */	
	public function goodsBrandColumn($where='', $field='')
	{		
		$Column =  $this->goodsBrand->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条商品品牌数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandAdd($data='')
	{
		$list = $this->goodsBrand->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条商品品牌数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandAddAll($data='')
	{
		$list = $this->goodsBrand->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 商品品牌分页查询(旧)
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandPageList($where='', $field='*', $order="gb_id asc", $page=15)
	{
		
		$list = $this->goodsBrand->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}

    /**
     * 商品品牌分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function goodsBrandPaginate($where='', $field='*', $order="gb_id asc",$page=15)
    {
        $list = $this->goodsBrand->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新商品品牌数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
    public function goodsBrandSave($where="", $data="")
    {	
        $save = $this->goodsBrand->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条商品品牌数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00      
     */
    public function goodsBrandDel($where='')
    {		
        $del = $this->goodsBrand->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条商品品牌数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00       
     */
    public function goodsBrandDelMost($id_arr='')
    {		
        $delAll = $this->goodsBrand->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 商品品牌列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandListShow($type=0) 
	{
    	$where = array();
		
		$where['gb_id'] = array('>',0);
    	$lists  = $this->goodsBrandPageList($where);
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
     * 按条件更新商品品牌
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandRoomEdit() 
	{
		$id = input('get.gb_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['gb_id'] = $id;
		$result = false;		
    	$result = $this->goodsBrandInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理商品品牌
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandRoomEditDoo() 
	{
		$id = input('post.gb_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 商品品牌POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['gb_id'] = $id;
		if($this->goodsBrandSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除商品品牌操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandRoomDel() 
	{
		$id = input('post.gb_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['gb_id'] = $id;
    	$info = $this->brandInfo($where);
		if($info && $this->brandDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}	
	
    /**
     * 批量删除商品品牌
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->brandDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 添加一条商品品牌
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:51:00
     */
	public function goodsBrandRoomAdd() 
	{
		// 商品品牌POST数据
		$type = 'add';
		$data = $this->inputData($type);		
		if($this->brandAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 商品品牌POST数据
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
		$data['Brandname']    = input('post.brandname');
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
        if(isset($data['gb_name'])){
            if($data['gb_name'] == ''){
                $error_msg .= "品牌名不能为空";
            }
        }

        //显示状态
        if(isset($data['state'])){
            if($data['state'] != 0 && $data['state'] != 1){
                $error_msg .= "显示状态设置有误！";
            }
        }

        //分类图标
        if(isset($data['gb_img'])){
            if($data['gb_img'] == ''){
                $error_msg .= "请设置商品品牌图片";
            }
        }

        return $error_msg;
    }
	
}