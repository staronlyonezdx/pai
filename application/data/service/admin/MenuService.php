<?php
/**
* 地址Service
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2018-06-19 14:20:00
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\admin;
use app\data\model\admin\MenuModel  as MenuModel;
use app\data\service\BaseService as BaseService;
use think\Cookie;

class MenuService extends BaseService
{
	protected $cache = 'menu';
	
	public function __construct()
	{
		parent::__construct();
		$this->menu = new MenuModel();
		$this->cache = 'menu';
		
	}

    /**
     * 查询管理员菜单列表
     */
	public function menuList($where='', $order='menu_id asc', $field='*', $cache='menu')
	{	
		$list = $this->menu->getList($where, $order, $field, $cache);
		return $list;
	}
	
    /**
     * 获取菜单信息
     */
	public function menuInfo($where='', $field='*')
	{		
		$info =  $this->menu->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计菜单数量
     */
	public function menuCount($where='')
	{		
		$Count =  $this->menu->getCount($where);
		return $Count;
	}

    /**
     * 更新菜单某个字段的值
     */	
	public function menuSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->menu->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
     */	
	public function menuSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->menu->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
     */	
	public function menuColumn($where='', $field='')
	{		
		$Column =  $this->menu->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条菜单数据
     */
	public function menuAdd($data='')
	{
		$list = $this->menu->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条菜单数据
     */
	public function menuAddAll($data='')
	{
		$list = $this->menu->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 菜单分页查询
     */
	public function menuPageList($data)
	{
		$lable = array();
		//合并数组
		$lable = parent::mergeArray($data);
		$where = $lable['where'];
		$field = $lable['field'];
		if(empty($lable['order'])){			
			$order = 'id desc';
		}else{
			$order = $lable['order'];
		}	
		$page  = $lable['page'];
		$cache = $lable['cache'];		
		//后台默认不分类缓存
		if(!$where && $cache===''){
			$cache = $this->cache; 
		}		
		//有条件情况下
		if($where){}		
		$list = $this->menu->getPageList($where, $field, $order, $page, $cache);
		return $list;
	}
	
	/**
     * 更新菜单数据
     */
    public function menuSave($where="", $data="")
    {	
        $save = $this->menu->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条菜单数据
     */
    public function menuDel($where='')
    {		
        $del = $this->menu->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条菜单数据
     */
    public function menuDelMost($id_arr='')
    {		
        $delAll = $this->menu->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }

	
	
}