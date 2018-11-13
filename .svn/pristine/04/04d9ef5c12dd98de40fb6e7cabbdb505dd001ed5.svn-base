<?php
/**
* 商品分类Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\goodsCategory;
use app\data\model\goodsCategory;
use app\data\model\goodsCategory\GoodsCategoryModel  as GoodsCategoryModel;
use app\data\service\BaseService as BaseService;

class GoodsCategoryService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->goodsCategory = new GoodsCategoryModel();
		$this->cache = 'goods_category';
	}
	
    /**
     * 查询商品分类列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryList($where='', $field='*', $order='gc_id asc')
	{
		$list = $this->goodsCategory->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取商品分类信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryInfo($where='', $field='*')
	{		
		$info =  $this->goodsCategory->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计商品分类数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryCount($where='')
	{		
		$Count =  $this->goodsCategory->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00           
     */	
	public function goodsCategorySetField($where='', $field='', $data='')
	{		
		$SetField =  $this->goodsCategory->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00           
     */	
	public function goodsCategorySetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->goodsCategory->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00          
     */	
	public function goodsCategoryColumn($where='', $field='')
	{		
		$Column =  $this->goodsCategory->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条商品分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryAdd($data='')
	{
		$list = $this->goodsCategory->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条商品分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryAddAll($data='')
	{
		$list = $this->goodsCategory->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 商品分类分页查询
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryPageList($where='', $field='*', $order="gc_id asc", $page=15)
	{
		
		$list = $this->goodsCategory->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}
	
	/**
     * 更新商品分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
    public function goodsCategorySave($where="", $data="")
    {	
        $save = $this->goodsCategory->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条商品分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00      
     */
    public function goodsCategoryDel($where='')
    {		
        $del = $this->goodsCategory->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条商品分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00       
     */
    public function goodsCategoryDelMost($id_arr='')
    {		
        $delAll = $this->goodsCategory->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 商品分类列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryListShow($type=0) 
	{
    	$where = array();
		
		$where['gc_id'] = array('>',0);
    	$lists  = $this->goodsCategoryPageList($where);
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
     * 按条件更新商品分类
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryRoomEdit() 
	{
		$id = input('get.gc_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['gc_id'] = $id;
		$result = false;		
    	$result = $this->goodsCategoryInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理商品分类
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryRoomEditDoo() 
	{
		$id = input('post.gc_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 商品分类POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['gc_id'] = $id;
		if($this->goodsCategorySave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除商品分类操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryRoomDel() 
	{
		$id = input('post.gc_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['gc_id'] = $id;
    	$info = $this->categoryInfo($where);
		if($info && $this->categoryDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}	
	
    /**
     * 批量删除商品分类
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->categoryDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 添加一条商品分类
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
     */
	public function goodsCategoryRoomAdd() 
	{
		// 商品分类POST数据
		$type = 'add';
		$data = $this->inputData($type);		
		if($this->categoryAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 商品分类POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-26 14:44:00
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
		$data['categoryname']    = input('post.categoryname');
		$data['Description'] = input('post.description');
		$data['Competence']  = input('post.comp');
		$data['Status']      = input('post.status');		
		return $data;
	}

    /**
     * 获取无限极分类
     * 创建人邓赛赛
     * 时间 2018-06-27 14：30：00
     */
	public function getCategory($parent_id=0){
        $data = $this->goodsCategory->getList(['parent_id'=>$parent_id],"","*","");
        foreach($data as $k => $v){
            $son = $this->getCategory($v['gc_id']);
            $data[$k]['status'] = empty($son) ? 0 :1 ;
            $data[$k]['son'] = $son;
        }
        return $data;
    }

    /**
     * @param $where
     * @param $order
     * @param $field
     * @param $cache
     * 获取商品分类列表
     */
    public function getCategoryList($where=[],$order='gc_id desc',$field='*',$cache=''){
        $data = $this->goodsCategory->getList($where,$order,$field,$cache);
        return $data;
    }

    /**
     * 判断层级(不可用)
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getLevel($parent_id,$level=1)
    {
        if($parent_id == 0){
            return $level;
        }else{
            $info = $this->goodsCategoryInfo(['gc_id'=>$parent_id]);
            if(empty($info)){
                return false;
            }else{
                $level++;
                $parent_id = $info['gc_id'];
                return  $this->getLevel($parent_id,$level);
            }
        }
    }

    /**
     * 数据验证
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function checkData($data=[]){
        $error_msg = "";
        //分类名
        if(isset($data['gc_name'])){
            if($data['gc_name'] == ''){
                $error_msg .= "分类名不能为空";
            }
        }

        //显示状态
        if(isset($data['state'])){
            if($data['state'] != 0 && $data['state'] != 1){
                $error_msg .= "显示状态设置有误！";
            }
        }

        //分类图标
        if(isset($data['gc_img'])){
            if($data['gc_img'] == ''){
                $error_msg .= "请设置分类图片";
            }
        }

        return $error_msg;
    }

    /**
     * @param $where
     * @param $field
     * @return mixed
     * 获取单个字段信息
     * 邓赛赛
     */
    public function getValue($where,$field){
        $val = $this->goodsCategory->get_value($where,$field);
        return $val;
    }

}