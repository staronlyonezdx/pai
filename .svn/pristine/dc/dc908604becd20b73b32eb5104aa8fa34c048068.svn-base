<?php
/**
* 广告图片Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-07-02
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\webImages;
use app\data\model\webImages;
use app\data\model\webImages\WebImagesModel  as WebImagesModel;
use app\data\service\BaseService as BaseService;

class WebImagesService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->webImages = new WebImagesModel();
		$this->cache = 'web_images';
	}
	
    /**
     * 查询广告图片列表
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesList($where='', $field='*', $order='wi_id asc')
	{
		$list = $this->webImages->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取广告图片信息
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesInfo($where='', $field='*')
	{		
		$info =  $this->webImages->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计广告图片数量
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesCount($where='')
	{		
		$Count =  $this->webImages->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00           
     */	
	public function webImagesSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->webImages->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00           
     */	
	public function webImagesSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->webImages->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function webImagesColumn($where='', $field='')
    {
        $Column =  $this->webImages->getColumn($where, $field);
        return $Column;
    }
    /**
     * 查询某一列的值
     * 创建人 邓赛赛
     * 时间 2018-07-02 10:30:00
     */
    public function webImgInfo($where='', $field='')
    {
        $Column =  $this->webImages->getInfo($where, $field);
        return $Column;
    }

    /**
     * 添加一条广告图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesAdd($data='')
	{
		$list = $this->webImages->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条广告图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesAddAll($data='')
	{
		$list = $this->webImages->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 广告图片分页查询(旧)
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesPageList($where='', $field='*', $order="wi_id asc", $page=15)
	{
		
		$list = $this->webImages->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}

    /**
     * 广告图片分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function webImagesPaginate($where='', $field='*', $order="gb_id asc",$page=15)
    {
        $list = $this->webImages->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新广告图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
    public function webImagesSave($where="", $data="")
    {	
        $save = $this->webImages->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条广告图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00      
     */
    public function webImagesDel($where='')
    {		
        $del = $this->webImages->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条广告图片数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00       
     */
    public function webImagesDelMost($id_arr='')
    {		
        $delAll = $this->webImages->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 广告图片列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesListShow($type=0) 
	{
    	$where = array();
		
		$where['wi_id'] = array('>',0);
    	$lists  = $this->webImagesPageList($where);
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
     * 按条件更新广告图片
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesRoomEdit() 
	{
		$id = input('get.wi_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['wi_id'] = $id;
		$result = false;		
    	$result = $this->webImagesInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理广告图片
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesRoomEditDoo() 
	{
		$id = input('post.wi_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 广告图片POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['wi_id'] = $id;
		if($this->webImagesSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除广告图片操作
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesRoomDel() 
	{
		$id = input('post.wi_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['wi_id'] = $id;
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
     * 批量删除广告图片
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesRoomDelMost() 
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
     * 添加一条广告图片
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
     */
	public function webImagesRoomAdd() 
	{
		// 广告图片POST数据
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
     * 广告图片POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-02 10:30:00
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
		$data['wi_name']    = input('post.wi_name','');
        $data['wi_type']  = input('post.wi_type',0);
        $data['wit_id']  = input('post.wit_id',0);
        $data['wi_state']      = input('post.wi_state',0);
        $data['wi_href']      = input('post.wi_href','');
        $data['wi_state']      = input('post.wi_state',0);
        $data['wi_info']      = input('post.wi_info','');
        $data['wi_sort']      = input('post.wi_sort',0);
        $data['wi_linktype']      = input('post.wi_linktype',1);
        $data['wi_linkid']      = input('post.wi_linkid',0);
        $data['wi_linkcontent']      = input('post.wi_linkcontent','');
		return $data;
	}

    /**
     * 数据验证
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function checkData($data=[]){
        $error_msg = "";
        //广告图片名
        if(isset($data['wi_name'])){
            if($data['wi_name'] == ''){
                $error_msg .= "广告图片名不能为空";
            }
        }

        // 图片路径
        if(isset($data['wi_imgurl'])){
            if($data['wi_imgurl'] == ''){
                $error_msg .= "图片上传失败！";
            }
        }


        // 图片类型
        if(isset($data['wi_type'])){
            if($data['wi_type'] != 0 && $data['wi_type'] != 1 && $data['wi_type'] != 2){
                $error_msg .= "图片类型设置有误！";
            }
        }

        // 显示状态
        if(isset($data['wi_state'])){
            if($data['wi_state'] != 0 && $data['wi_state'] != 1){
                $error_msg .= "显示状态设置有误！";
            }
        }

        return $error_msg;
    }
}