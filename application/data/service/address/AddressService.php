<?php
/**
* 地址Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州拍吖吖科技有限公司
* 创建日期 2018-06-25
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\address;
use app\data\model\address\AddressModel  as AddressModel;
use app\data\service\region\RegionService as RegionService;
use app\data\service\BaseService as BaseService;
use app\data\service\member\MemberService;
use think\Cookie;

class AddressService extends BaseService 
{
	protected $cache = 'address';	

	public function __construct()
	{
		parent::__construct();
		$this->address = new AddressModel();
		$this->cache = 'address';

	}
	
    /**
     * 查询地址列表
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressList($where='', $order='address_id desc', $field='*', $cache='address')
	{	
		$list = $this->address->getList($where, $order, $field, $cache);
		return $list;
	}

    /**
     * 查询地址列表详情（更详细的列表）
     * 创建人 刘勇豪
     * 时间 2018-06-25 10:30:00
     */
    public function addressInfoList($where='', $order='address_id desc', $field='*', $cache='address')
    {
        $list = $this->address->getList($where, $order, $field, $cache);
        if(!empty($list)){
            foreach($list as $k => $v){
                $list[$k] = $this->addressDetail($v);
            }
        }
        return $list;
    }

    /**
     * 获取单挑地址信息
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressInfo($where='', $field='*')
	{		
		$info =  $this->address->getInfo($where, $field, $this->cache);

        if(!empty($info)){
            $info = $this->addressDetail($info);
        }
		return $info;
	}

    /**
     * 地址转黄称详情地址
     * 创建人 刘勇豪
     * 时间 2018-06-25 10:30:00
     */
    protected function addressDetail($info){
        if(!empty($info)){
            // 手机号
            $info['secrecy_tel'] = '';
            if(isset($info['tel']) && $info['tel']){
                $info['secrecy_tel'] = substr($info['tel'],0,3)."****".substr($info['tel'],7,4);
            }

            $region = new RegionService();
            // 省市区
            $info['province'] = '';
            $info['city'] = '';
            $info['district'] = '';
            if(isset($info['pid']) && $info['pid']){
                $info['province'] = $region->regionName($info['pid']);
            }
            if(isset($info['cid']) && $info['cid']){
                $info['city'] = $region->regionName($info['cid']);
            }
            if(isset($info['did']) && $info['did']){
                $info['district'] = $region->regionName($info['did']);
            }
        }

        return $info;
    }
	
    /**
     * 条件统计地址数量
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressCount($where='')
	{		
		$Count =  $this->address->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00           
     */	
	public function addressSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->address->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00           
     */	
	public function addressSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->address->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00          
     */	
	public function addressColumn($where='', $field='')
	{		
		$Column =  $this->address->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressAdd($data='')
	{
		$address_id = $this->address->insertId($data, $this->cache);
		return $address_id;
	}
	
	
    /**
     * 添加多条地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressAddAll($data='')
	{
		$list = $this->address->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 地址分页查询
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressPageList($data)
	{
		$lable = array();
		//合并数组
		$lable = parent::mergeArray($data);		
		$where = $lable['where'];
		$field = $lable['field'];
		if(empty($lable['order'])){			
			$order = 'address_id desc';
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
		$list = $this->address->getPageList($where, $field, $order, $page, $cache);
		return $list;
	}
	
	/**
     * 更新地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
    public function addressSave($where="", $data="")
    {	
        $save = $this->address->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00      
     */
    public function addressDel($where='')
    {		
        $del = $this->address->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条地址数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00       
     */
    public function addressDelMost($id_arr='')
    {		
        $delAll = $this->address->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 地址列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressListShow($type=0, $field='*', $c_pid=0, $page=15) 
	{
    	$where = array();
		$data = array();
		$cache = '';
		$where['address_id'] = array('>',0);
		$data['where'] = $where ;
		$data['field'] = $field;
		$data['page'] = $page;
		$data['cache'] = $cache;
    	$lists  = $this->addressPageList($data);
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
     * 按条件添加一条地址
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressRoomAdd() 
	{
        $mem = new MemberService();
        $m_id = Cookie::get("m_id");
        $m_id = $mem->decrypt($m_id); //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符

        // 数据验证
        $checkmsg = $this->checkAddress();
        if($checkmsg){
            return ['status'=>0,'msg'=>$checkmsg];
        }

		//地址POST数据
		$type = 'add' ;
		$data = $this->inputData($type);
        $data['m_id'] = $m_id;

        // 如果设为此条数据是设置为默认地址，其他地址都要改为非默认
        if($data['is_default'] == 1){
            $data_default['is_default'] = 0;
            $where_default['m_id'] = $m_id;
            $this->addressSave($where_default, $data_default);
        }

        $res = $this->addressAdd($data);
		if($res)
		{
            $this->check_default($m_id);
			return ['status'=>1,'msg'=>'添加地址成功','data'=>$res];
		}
		else
		{
			return ['status'=>0,'msg'=>'添加地址成功','data'=>$res];;
		}
	}
	
    /**
     * 按条件更新地址
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressRoomEdit() 
	{
		$id = input('request.address_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
    	$result = $this->addressInfo("address_id=$id");
		return $result;
	}
	
    /**
     * 按条件修改处理地址
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressRoomEditDoo() 
	{
		$id = input('request.address_id');
		if ($id=='' || !is_numeric($id)) {
			return ['status'=>0,'msg'=>'非法的请求id'];
		}
		$id=intval($id);

        $mem = new MemberService();
        $m_id = Cookie::get("m_id");
        $m_id = $mem->decrypt($m_id); //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符

        // 数据验证
        $checkmsg = $this->checkAddress();
        if($checkmsg){
            return ['status'=>0,'msg'=>$checkmsg];
        }

		//地址POST数据
		$type = 'edit' ;
		$data = $this->inputData($type);

		$where = array();
		$where['address_id'] = $id;
		$where['m_id'] = $m_id;
		$info = $this->addressInfo($where);

        // 如果设为此条数据是设置为默认地址，其他地址都要改为非默认
        if($data['is_default'] == 1){
            $data_default['is_default'] = 0;
            $where_default['m_id'] = $m_id;
            $this->addressSave($where_default, $data_default);
        }
		
		if($info && $this->addressSave($where, $data))
		{
            $this->check_default($m_id);
			return ['status'=>1,'msg'=>'修改地址成功'];
		}
		else
		{
			return ['status'=>1,'msg'=>'修改地址成功'];
		}
	}
	
    /**
     * 地址POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function inputData($type)
	{
		$data = array();
        switch($type)
        {
            case 'edit';
                break;
            case 'add';
                $data['addtime'] = time() ;
                break;
        }
		input('request.name') && $data['name'] = input('request.name');
		input('request.tel') &&	$data['tel'] = input('request.tel');
		input('request.address') && $data['address'] = input('request.address');
		$data['is_default'] = input('request.is_default',0);

        if(input('request.area_id') && strpos(input('request.area_id'),',') ){
            $area_id = input('request.area_id');
            $arr_id = explode(",",$area_id);

            // 初始化 很有必要
            $data['pid'] = 0;
            $data['cid'] = 0;
            $data['did'] = 0;

            if(!empty($arr_id[0])){
                $data['pid'] = $arr_id[0];
            }
            if(!empty($arr_id[1])){
                $data['cid'] = $arr_id[1];
            }
            if(!empty($arr_id[2])){
                $data['did'] = $arr_id[2];
            }
        }
		return $data;
	}
	
    /**
     * 删除地址操作
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressRoomDel() 
	{
		$id = input('post.address_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);

        $mem = new MemberService();
        $m_id = Cookie::get("m_id");
        $m_id = $mem->decrypt($m_id); //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符

		$where = array();		
		$where['address_id'] = $id;
		$where['m_id'] = $m_id;
    	$info = $this->addressInfo($where);
		if($info && $this->addressDel($where))
		{
            $this->check_default($m_id);
			return true;		
		}
		else
		{
			return false;
		}
	}
	
    /**
     * 批量删除地址分类
	 * 创建人 刘勇豪
	 * 时间 2018-06-25 10:30:00
     */
	public function addressRoomDelMost() 
	{
		$id = input('post.delid');
		if($this->addressDelMost($id))
		{		
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 地址数据验证
     * 创建人 刘勇豪
     * 时间 2018-06-25 10:30:00
     */
    public function checkAddress()
    {
        $error_msg = '';
        $name = input('request.name','');
        $tel = input('request.tel','');
        $address = input('request.address','');
        $area_id = input('request.area_id','');

        if( strlen($name) < 1 || strlen($name) > 54 ){
            $error_msg .= '请输入1-18位的用户名；';
        }

        if( !preg_match("/^1[3-9][0-9]{9}$|^0\d{2,3}-?\d{7,8}$/",$tel) ){
            $error_msg .= '请输入合法的手机号码；';
        }

        if( $area_id == '' ){
            $error_msg .= '请选择省市区；';
        }

        if(strlen($address) < 5 || strlen($address) > 150){
            $error_msg .= '详细地址不能为空，请输入5-50个字符；';
        }

        return  $error_msg;
    }

    /**
     * 获取自己的默认收货地址
     * 创建人 刘勇豪
     * 时间 2018-07-04
     *
     * 备注：优先选择默认的收货地址，
     *      如果没有默认的收货地址，选择最新添加的，
     *      如果没有一条收货地址，返回空
     */
    public function getMyDefaultAddress($m_id){
        if(!isset($m_id) || !$m_id){
            return ['status' => 0, 'msg'=>'参数错误！'];
        }
        $where['m_id'] = $m_id;
        $order = 'is_default desc, updatetime desc';
        $list = $this->addressList($where,$order);
        if(empty($list)){
            return ['status' => 0, 'msg'=>'空值！','data'=>''];
        }else{
            $default = $list[0];

            // 手机号
            $default['secrecy_tel'] = '';
            if($default['tel']){
                $default['secrecy_tel'] = substr($default['tel'],0,3)."****".substr($default['tel'],7,4);
            }

            $region = new RegionService();
            // 省市区
            $default['province'] = '';
            $default['city'] = '';
            $default['district'] = '';
            if($default['pid']){
                $default['province'] = $region->regionName($default['pid']);
            }
            if($default['cid']){
                $default['city'] = $region->regionName($default['cid']);
            }
            if($default['did']){
                $default['district'] = $region->regionName($default['did']);
            }
             return ['status' => 0, 'msg'=>'空值！','data'=>$default];
        }
    }

    /**
     * 添加一条收货地址
     * 创建人 刘勇豪
     * 时间 2018-07-11
     *
     * 备注：如果添加的地址是默认地址，
     *      当前用户的其他地址设为非默认。
     */
    public function myAddressAdd($data=''){
        if( empty($data) || !isset($data['m_id']) || !$data['m_id']){
            return ['status' => 0, 'msg'=>'数据不完整，请完善！'];
        }
        $m_id = $data['m_id'];
        if( isset($data['is_default']) && $data['is_default'] == 1){
            $where_save['m_id'] = $data['m_id'];
            $data_save['is_default'] = 0;
            $this->addressSave($where_save, $data_save);
        }

        $data['addtime'] = time();
        $data['updatetime'] = time();
        $address_id = $this->addressAdd($data);
        if(!$address_id){
            return ['status' => 0, 'msg'=>'添加失败！', 'data'=>''];
        }
        $this->check_default($m_id);
        return ['status' => 1, 'msg'=>'添加成功！','data'=>$address_id];
    }

    /**
     * 更新一条收货地址
     * 创建人 刘勇豪
     * 时间 2018-07-11
     *
     * 备注：如果更新的地址是默认地址，
     *       当前用户的其他地址设为非默认。
     */
    public function myAddressSave($where="", $data=""){
        if( empty($where) || empty($data) || !isset($data['m_id']) || empty($data['m_id'])){
            return ['status' => 0, 'msg'=>'参数错误！'];
        }

        $m_id = $data['m_id'];
        if( isset($data['is_default']) && $data['is_default'] == 1){
            $where_save['m_id'] = $m_id;
            $data_save['is_default'] = 0;
            $this->addressSave($where_save, $data_save);
        }

        $data['updatetime'] = time();
        $res = $this->addressSave($where, $data);
        if(!$res){
            return ['status' => 0, 'msg'=>'修改失败！'];
        }
        $this->check_default($m_id);
        return ['status' => 1, 'msg'=>'修改成功！'];
    }

    /**
     * 删除一条地址数据
     * 创建人 刘勇豪
     * 时间 2018-06-25 10:30:00
     *
     *
     */
    public function myAddressDel($where='')
    {
        $info = $this->address->getInfo($where);
        if(empty($info)){
            return ['status' => 0, 'msg'=>'地址不存在！'];
        }
        $m_id = $info['m_id'];// 用户
        $del = $this->address->getDel($where, $this->cache);
        if($del){
            $check = $this->check_default($m_id);
            if(!$check['status']){
                return ['status' => 0, 'msg'=>$check['msg']];
            }
            return ['status' => 1, 'msg'=>'删除成功！','data'=>$del];
        }else{
            return ['status' => 0, 'msg'=>'删除失败！','data'=>$del];
        }
    }

    /**
     * 更新默认收货地址
     * 创建人 刘勇豪
     * 时间 2018-07-13
     *
     * 备注：如果我的收货地址不为空，
     * 那么必须有一条要设为默认地址（即：is_default=1）
     */
    public function check_default($m_id){
        if(!$m_id){
            return ['status' => 0, 'msg'=>'参数错误！'];
        }

        $where['m_id'] = $m_id;
        $order = 'is_default desc, updatetime desc';
        $list = $this->addressList($where,$order);
        if(!empty($list)){
            $first_row = $list[0];
            $first_address_id = $first_row['address_id'];
            $first_is_default = $first_row['is_default'];
            if($first_is_default != 1){
                $where_save['address_id'] = $first_address_id;
                $data_save['is_default'] = 1;
                $this->addressSave($where_save, $data_save);
            }
        }
        return ['status' => 1, 'msg'=>'ok！'];
    }
}