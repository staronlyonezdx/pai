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
use app\data\model\admin\AdminModel  as AdminModel;
use app\data\service\BaseService as BaseService;
use think\Cookie;
use think\Db;

class AdminService extends BaseService
{
	protected $cache = 'admin';
	
	public function __construct()
	{
		parent::__construct();
		$this->admin = new AdminModel();
		$this->cache = 'admin';
		
	}

    //管理员登录
    public function checkLogin($admin_name){
        $info = Db::table('pai_admin a')->join('pai_admin_role r', 'a.role_id = r.role_id')
            ->where('a.admin_name', $admin_name)
            ->find();
        return $info;
    }

    /**
     * 管理员登录
     * 创建人 刘勇豪
     * 时间 2018-06-20 14:52:00
     */
    public function adminLogin($admin_name, $admin_pwd)
    {
        $where['admin_name']  = $admin_name;
        //账号是否存在
        $filed = "*" ;
        //加密方式
        $admin_pwd = parent::HashPassword($admin_pwd) ;
        $where['admin_pwd']  = $admin_pwd;
        if($info = $this->adminInfo($where,$filed))
        {
            //账号状态
            if($info['state']<>0)
            {
                //日志记录 TODO。。（后期做）
                //parent::loginlog($info['admin_id'],$admin_name,'<div class="de2">违规帐号登录</div>','国家'.'.'.'地区','ip');
                return ['status'=>0, 'msg'=>'当前帐号已被封禁，请等待解除～！','data'=>''];
            }

            //日志记录 TODO。。（后期做）
            //parent::loginlog($info['admin_id'],$username,'<div class="de1">登录成功</div>','国家'.'.'.'地区','ip');

            //保存到cookie
            parent::cookiePack('admin_name',$info['admin_name'],3600*12);
            parent::cookiePack('admin_id',$info['admin_id'],3600*12);
            //销毁验证码session
            parent::sessionPack('verify',null);

            return ['status'=>1, 'msg'=>'success !','data'=>''];
        }
        else
        {
            // 日志记录 TODO。。（后期做）
            //parent::loginlog($info['admin_id'],$username,'<div class="de2">用户不存在或者登录密码错误</div>','国家'.'.'.'地区','ip');

            return ['status'=>0, 'msg'=>'用户不存在或者登录密码错误！','data'=>''];
        }
    }

    /**
     * 添加/修改管理员验证
     * 创建人 刘勇豪
     * 时间 2018-06-20 14:52:00
     */
    public function checkAdmin($type, $data)
    {
        $where = array();
        $where['admin_name'] = $data['admin_name'] ;
        $error = 0;
        switch($type)
        {
            case 'edit';
                $where['admin_id'] = array('neq',input('post.admin_id'));
                $user = $this->adminInfo($where);
                if($user)
                {
                    $error = '用户名已存在!';
                }
                break;
            case 'add';
                $count = $this->adminCount($where);
                if($count)
                {
                    $error = '用户名已存在!';
                }
                break;
        }

        if(empty($data['admin_name']) && !$error)
        {
            $error = '请输入用户名称!';
        }
        if((strlen($data['admin_name'])>20 || strlen($data['admin_name'])<2) && !$error)
        {
            $error = '用户名称请在2-20个字符以内！';
        }
        if((!preg_match('/^[\x{4e00}-\x{9fa5}a-zA-Z0-9_-]{2,16}$/u',$data['admin_name'])) && !$error)
        {
            $error = '请输入合法的用户名！';
        }

        if(!is_numeric($data['role_id']) && !$error)
        {
            $error = '角色状态获取值不正确!';
        }

        // 如果是添加用户还要验证密码格式
        if($type == 'add'){
            if(empty($data['admin_pwd']) && !$error)
            {
                $error = '请输入密码!';
            }
            if( (strlen($data['admin_pwd']) < 6 || strlen($data['admin_pwd']) > 18) && !$error)
            {
                $error = '请输入6~18位数的密码!';
            }
            if( $data['admin_pwd'] != $data['admin_pwd2'] && !$error)
            {
                $error = '两次密码不一致!';
            }
        }

        return $error;
    }

    /**
     * 查询管理员列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 14:52:00
     */
	public function adminList($where='', $order='admin_id asc', $field='*', $cache='admin')
	{	
		$list = $this->admin->getList($where, $order, $field, $cache);
		return $list;
	}
	
    /**
     * 获取管理员信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminInfo($where='', $field='*')
	{		
		$info =  $this->admin->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计管理员数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminCount($where='')
	{		
		$Count =  $this->admin->getCount($where);
		return $Count;
	}

    /**
     * 更新管理员某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00           
     */	
	public function adminSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->admin->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00           
     */	
	public function adminSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->admin->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00          
     */	
	public function adminColumn($where='', $field='')
	{		
		$Column =  $this->admin->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条管理员数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminAdd($data='')
	{
		$list = $this->admin->getAdd($data, $this->cache);
		return $list;
	}
	
	
    /**
     * 添加多条管理员数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminAddAll($data='')
	{
		$list = $this->admin->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 管理员分页查询
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminPageList($data)
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
		$list = $this->admin->getPageList($where, $field, $order, $page, $cache);
		return $list;
	}
	
	/**
     * 更新管理员数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
    public function adminSave($where="", $data="")
    {	
        $save = $this->admin->getSave($where, $data, $this->cache);
        $cache='';
		return $save;       
    }
	
    /**
     * 删除一条管理员数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00      
     */
    public function adminDel($where='')
    {		
        $del = $this->admin->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条管理员数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00       
     */
    public function adminDelMost($id_arr='')
    {		
        $delAll = $this->admin->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 管理员列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminListShow($type=0, $field='*', $c_pid=0, $page=15)
	{
    	$where = array();
		$data = array();
		$cache = '';
		$where['id'] = array('>',0);
		$data['where'] = $where ;
		$data['field'] = $field;
		$data['page'] = $page;
		$data['cache'] = $cache;
    	$lists  = $this->adminPageList($data);
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
     * 按条件添加一条管理员
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminRoomAdd()
	{
		//地址POST数据
		$type = 'add' ;
		$data = $this->inputData($type);
		if($this->adminAdd($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 按条件更新管理员
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminRoomEdit()
	{
		$id = input('get.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
    	$result = $this->adminInfo("id=$id");
		return $result;
	}
	
    /**
     * 按条件修改处理管理员
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminRoomEditDoo()
	{
		$id = input('post.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		//地址POST数据
		$type = 'edit' ;
		$data = $this->inputData($type);
		$where = array();		
		$where['id'] = $id;
		$info = $this->adminInfo($where);
		
		if($info && $this->adminSave($where, $data))
		{
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 管理员POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function inputData($type) 
	{
		$data = array();
		switch($type)
		{
			case 'edit';
			break;
			case 'add';	
				$data['add_time'] = time();
			break;
		}  
		input('post.admin_name') && $data['admin_name'] = input('post.admin_name');
		input('post.add_time') &&	$data['add_time'] = input('post.add_time');
		input('post.admin_pwd') && $data['admin_pwd'] = input('post.admin_pwd');
		input('post.role_id') && $data['role_id'] = input('post.role_id');
		input('post.state') && $data['state'] = input('post.state');
		
		return $data;
	}
	
    /**
     * 删除管理员操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminRoomDel()
	{
		$id = input('post.id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['id'] = $id;		
    	$info = $this->adminInfo($where);
		if($info && $this->adminDel($where))
		{				
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 批量删除管理员分类
	 * 创建人 刘勇豪
	 * 时间 2018-06-19 14:20:00
     */
	public function adminRoomDelMost()
	{
		$id = input('post.delid');
		if($this->adminDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}
	
	
}