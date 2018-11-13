<?php
/**
* 文章分类Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-07-14
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\articleType;
use app\data\model\articleType;
use app\data\model\articleType\ArticleTypeModel  as ArticleTypeModel;
use app\data\service\BaseService as BaseService;

class ArticleTypeService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->articleType = new ArticleTypeModel();
		$this->cache = 'article_type';
	}
	
    /**
     * 查询文章分类列表
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeList($where='', $field='*', $order='at_id asc')
	{
		$list = $this->articleType->getList($where, $order, $field, $this->cache);
		return $list;
	}
    /**
     * type和article关联查询
     * 邓赛赛
     */
	public function articleTypeJoinArticle($where=[],$order='at.at_id desc',$field='*'){
	    $list = $this->articleType->typeJoinArticle($where,$order,$field);
	    return $list;
    }
	
    /**
     * 获取文章分类信息
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeInfo($where='', $field='*')
	{		
		$info =  $this->articleType->getInfo($where, $field, $this->cache);
		return $info;
	}

    /**
     * 获取文章分类信息
     * 创建人 邓赛赛
     * 时间 2018-07-14 10:30:00
     */
    public function articleTypeValue($where='', $field='*')
    {
        $info =  $this->articleType->get_value($where, $field, $this->cache);
        return $info;
    }
	
    /**
     * 条件统计文章分类数量
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeCount($where='')
	{		
		$Count =  $this->articleType->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00           
     */	
	public function articleTypeSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->articleType->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00           
     */	
	public function articleTypeSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->articleType->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00          
     */	
	public function articleTypeColumn($where='', $field='')
	{		
		$Column =  $this->articleType->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条文章分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeAdd($data='')
	{
		$list = $this->articleType->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条文章分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeAddAll($data='')
	{
		$list = $this->articleType->getAddAll($data, $this->cache);
		return $list;
	}

	/**
     * 商品品牌分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function articleTypePaginate($where='', $field='*', $order="at_id asc",$page=15)
    {
        $list = $this->articleType->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新文章分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
    public function articleTypeSave($where="", $data="")
    {	
        $save = $this->articleType->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条文章分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00      
     */
    public function articleTypeDel($where='')
    {		
        $del = $this->articleType->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条文章分类数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00       
     */
    public function articleTypeDelMost($id_arr='')
    {		
        $delAll = $this->articleType->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 按条件更新文章分类
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeRoomEdit() 
	{
		$id = input('get.at_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['at_id'] = $id;
		$result = false;		
    	$result = $this->articleTypeInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理文章分类
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeRoomEditDoo() 
	{
		$id = input('post.at_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 文章分类POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['at_id'] = $id;
		if($this->articleTypeSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除文章分类操作
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeRoomDel() 
	{
		$id = input('post.at_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['at_id'] = $id;
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
     * 批量删除文章分类
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeRoomDelMost()
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
     * 添加一条文章分类
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function articleTypeRoomAdd() 
	{
		// 文章分类POST数据
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
     * 文章分类POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-14 10:30:00
     */
	public function inputData($type) 
	{
		$data = array();
		switch($type)
		{
			case 'edit';
			break;
			case 'add';
			break;
		}   	
		$data['at_name']    = input('post.at_name');
		$data['at_parentid'] = input('post.at_parentid');
		$data['at_state']  = input('post.at_state');
		return $data;
	}

    /**
     * 文章分类树状数组
     * 创建人 刘勇豪
     * 时间 2018-07-14 14:44:00
     */
    public function getTree($pid=0)
    {
    	$data = $this->articleType->getList(['at_parentid'=>$pid]);
        $tree = '';
        foreach ($data as $k => $v) {
            if ($v['at_parentid'] == $pid) {
                //父亲找到儿子
                $v['children'] = $this->getTree($v['at_id']);
                $tree[] = $v;
                unset($data[$k]);
            }
        }
        return $tree;
    }

    /**
     * 判断层级(不可用)
     * 创建人 刘勇豪
     * 时间 2018-07-14 10:30:00
     */
    public function getLevel($at_parentid,$level=1)
    {
        if($at_parentid == 0){
            return $level;
        }else{
            $info = $this->articleTypeInfo(['at_id'=>$at_parentid]);
            if(empty($info)){
                return false;
            }else{
                $level++;
                $at_parentid = $info['at_id'];
                return  $this->getLevel($at_parentid,$level);
            }
        }
    }

    /**
     * 数据验证
     * 创建人 刘勇豪
     * 时间 2018-07-14 10:30:00
     */
    public function checkData($data=[],$at_id){
        $error_msg = "";
        //分类名
        if(isset($data['at_name'])){
            if($data['at_name'] == ''){
                $error_msg .= "分类名不能为空";
            }

            if(strlen($data['at_name']) > 45 ){
                $error_msg .= "分类名过长！";
            }
        }

        // 父级分类
        if(isset($data['at_parentid'])){
            if($data['at_parentid'] == ''){
                $error_msg .= "分类上级设置有误";
            }
        }

        //类型状态
        if(isset($data['at_state'])){
            if($data['at_state'] != 0 && $data['at_state'] != 1){
                $error_msg .= "类型状态设置有误！";
            }
        }

        // 分类重复判断
        if( isset($data['at_name']) && isset($data['at_parentid']) ){
            $where_find['at_name'] = $data['at_name'];
            $where_find['at_parentid'] = $data['at_parentid'];
            //邓赛赛（不检测自己的名称是否更改）
            $where_find['at_id'] = ['<>',$at_id];
            $find = $this->articleTypeInfo($where_find);
            if(!empty($find)){
                $error_msg .= "此上级分类下已存在此分类！换一个名字试试！";
            }
        }

        return $error_msg;
    }

}