<?php
/**
* 商品规格Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-30
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\goodsType;
use app\data\model\goodsType;
use app\data\model\goodsType\GoodsTypeModel  as GoodsTypeModel;
use app\data\service\BaseService as BaseService;

class GoodsTypeService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->goodsType = new GoodsTypeModel();
		$this->cache = 'goods_type';
	}
	
    /**
     * 查询商品规格列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeList($where='', $field='*', $order='gt_id asc')
	{
		$list = $this->goodsType->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取商品规格信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeInfo($where='', $field='*')
	{		
		$info =  $this->goodsType->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计商品规格数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeCount($where='')
	{		
		$Count =  $this->goodsType->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00           
     */	
	public function goodsTypeSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->goodsType->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00           
     */	
	public function goodsTypeSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->goodsType->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00          
     */	
	public function goodsTypeColumn($where='', $field='')
	{		
		$Column =  $this->goodsType->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条商品规格数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeAdd($data='')
	{
		$list = $this->goodsType->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条商品规格数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeAddAll($data='')
	{
		$list = $this->goodsType->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 商品规格分页查询
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypePageList($where='', $field='*', $order="gt_id asc", $page=15)
	{
		
		$list = $this->goodsType->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}
	
	/**
     * 更新商品规格数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
    public function goodsTypeSave($where="", $data="")
    {	
        $save = $this->goodsType->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条商品规格数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00      
     */
    public function goodsTypeDel($where='')
    {		
        $del = $this->goodsType->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条商品规格数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00       
     */
    public function goodsTypeDelMost($id_arr='')
    {		
        $delAll = $this->goodsType->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 商品规格列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeListShow($type=0) 
	{
    	$where = array();
		
		$where['gt_id'] = array('>',0);
    	$lists  = $this->goodsTypePageList($where);
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
     * 按条件更新商品规格
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeRoomEdit() 
	{
		$id = input('get.gt_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['gt_id'] = $id;
		$result = false;		
    	$result = $this->goodsTypeInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理商品规格
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeRoomEditDoo() 
	{
		$id = input('post.gt_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 商品规格POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['gt_id'] = $id;
		if($this->goodsTypeSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除商品规格操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeRoomDel() 
	{
		$id = input('post.gt_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['gt_id'] = $id;
    	$info = $this->typeInfo($where);
		if($info && $this->typeDel($where))
		{		
			return true;
		}
		else
		{
			return false;
		}
	}	
	
    /**
     * 批量删除商品规格
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->typeDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 添加一条商品规格
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
     */
	public function goodsTypeRoomAdd() 
	{
		// 商品规格POST数据
		$type = 'add';
		$data = $this->inputData($type);		
		if($this->typeAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 商品规格POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-30 10:30:00
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
		$data['typename']    = input('post.typename');
		$data['Description'] = input('post.description');
		$data['Competence']  = input('post.comp');
		$data['Status']      = input('post.status');		
		return $data;
	}

    /**
     * 获取无限极规格
     * 创建人邓赛赛
     * 时间 2018-06-27 14：30：00
     */
	public function getType($gt_parent_id=0){
        $data = $this->goodsType->getList(['gt_parent_id'=>$gt_parent_id],"","*","");
        foreach($data as $k => $v){
            $data[$k]['son'] = $this->getType($v['gt_id']);
        }
        return $data;
    }

    /**
     * 判断层级(不可用)
     * 创建人 刘勇豪
     * 时间 2018-06-30 10:30:00
     */
    public function getLevel($gt_parent_id,$level=1)
    {
        if($gt_parent_id == 0){
            return $level;
        }else{
            $info = $this->goodsTypeInfo(['gt_id'=>$gt_parent_id]);
            if(empty($info)){
                return false;
            }else{
                $level++;
                $gt_parent_id = $info['gt_id'];
                return  $this->getLevel($gt_parent_id,$level);
            }
        }
    }

    /**
     * 数据验证
     * 创建人 刘勇豪
     * 时间 2018-06-30 10:30:00
     */
    public function checkData($data=[]){
        $error_msg = "";
        //规格名
        if(isset($data['gt_name'])){
            if($data['gt_name'] == ''){
                $error_msg .= "规格名不能为空";
            }
        }

        // 父级规格
        if(isset($data['gt_parent_id'])){
            if($data['gt_parent_id'] == ''){
                $error_msg .= "规格上级设置有误";
            }
        }


        // 层级
        if(isset($data['gt_level'])){
            if($data['gt_level'] != 1 && $data['gt_level'] != 2 && $data['gt_level'] != 3){
                $error_msg .= "层级设置有误！";
            }
        }

        //显示状态
        if(isset($data['state'])){
            if($data['state'] != 0 && $data['state'] != 1){
                $error_msg .= "显示状态设置有误！";
            }
        }

        // 规格重复判断
        if( isset($data['gt_name']) && isset($data['gt_parent_id']) ){
            $where_find['gt_name'] = $data['gt_name'];
            $where_find['gt_parent_id'] = $data['gt_parent_id'];
            $find = $this->goodsTypeInfo($where_find);
            if(!empty($find)){
                $error_msg .= "此上级规格下已存在此规格！换一个名字试试！";
            }
        }

        return $error_msg;
    }
}