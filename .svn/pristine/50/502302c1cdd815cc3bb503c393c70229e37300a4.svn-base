<?php
/**
* 拍一拍订单中拍码Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-07-09
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\orderAwardcode;
use app\data\model\orderAwardcode;
use app\data\model\orderAwardcode\OrderAwardcodeModel  as OrderAwardcodeModel;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use app\data\service\goodsProduct\GoodsProductService as GoodsProductService;
use app\data\service\BaseService as BaseService;
use think\Cookie;
use think\Db;

class OrderAwardcodeService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->orderAwardcode = new OrderAwardcodeModel();
		$this->cache = 'order_awardcode';
	}
	
    /**
     * 查询拍一拍订单中拍码列表
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeList($where='', $field='*', $order='oa_id asc')
	{
		$list = $this->orderAwardcode->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取拍一拍订单中拍码信息
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeInfo($where='', $field='*')
	{		
		$info =  $this->orderAwardcode->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计拍一拍订单中拍码数量
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeCount($where='')
	{		
		$Count =  $this->orderAwardcode->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00           
     */	
	public function orderAwardcodeSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->orderAwardcode->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00           
     */	
	public function orderAwardcodeSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->orderAwardcode->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00          
     */	
	public function orderAwardcodeColumn($where='', $field='')
	{		
		$Column =  $this->orderAwardcode->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条拍一拍订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeAdd($data='')
	{
		$list = $this->orderAwardcode->getAdd($data, $this->cache);
		return $list;
	}

    /**
     * 添加一条拍一拍订单中拍码数据(返回自增id)
     * 创建人 刘勇豪
     * 时间 2018-07-09 09:40:00
     */
    public function orderAwardcodeAdd_getId($data='')
    {
        $id = $this->orderAwardcode->insertId($data, $this->cache);
        return $id;
    }
	
	
    /**
     * 添加多条拍一拍订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeAddAll($data='')
	{
		$list = $this->orderAwardcode->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 拍一拍订单中拍码分页查询(旧)
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodePageList($where='', $field='*', $order="oa_id asc", $page=15)
	{
		
		$list = $this->orderAwardcode->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}

    /**
     * 拍一拍订单中拍码分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-07-09 09:40:00
     */
    public function orderAwardcodePaginate($where='', $field='*', $order="oa_id asc",$page=15)
    {
        $list = $this->orderAwardcode->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新拍一拍订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
    public function orderAwardcodeSave($where="", $data="")
    {	
        $save = $this->orderAwardcode->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条拍一拍订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00      
     */
    public function orderAwardcodeDel($where='')
    {		
        $del = $this->orderAwardcode->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条拍一拍订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00       
     */
    public function orderAwardcodeDelMost($id_arr='')
    {		
        $delAll = $this->orderAwardcode->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 拍一拍订单中拍码列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeListShow($type=0) 
	{
    	$where = array();
		
		$where['oa_id'] = array('>',0);
    	$lists  = $this->orderAwardcodePageList($where);
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
     * 按条件更新拍一拍订单中拍码
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeRoomEdit() 
	{
		$id = input('get.oa_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['oa_id'] = $id;
		$result = false;		
    	$result = $this->orderAwardcodeInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理拍一拍订单中拍码
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeRoomEditDoo() 
	{
		$id = input('post.oa_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 拍一拍订单中拍码POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['oa_id'] = $id;
		if($this->orderAwardcodeSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}

    /**
     * 删除拍一拍订单中拍码操作
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeRoomDel() 
	{
		$id = input('post.oa_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();		
		$where['oa_id'] = $id;
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
     * 批量删除拍一拍订单中拍码
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeRoomDelMost() 
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
     * 添加一条拍一拍订单中拍码
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
     */
	public function orderAwardcodeRoomAdd() 
	{
		// 拍一拍订单中拍码POST数据
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
     * 拍一拍订单中拍码POST数据
	 * 创建人 刘勇豪
	 * 时间 2018-07-09 09:40:00
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
		$data['Brandname']    = input('post.brandname');
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
        if(isset($data['oa_name'])){
            if($data['oa_name'] == ''){
                $error_msg .= "品牌名不能为空";
            }
        }

        return $error_msg;
    }

    /**
     * 随机生成抽奖码 (gp_sn + 折id + 期数 + 本期参与顺序 + m_id)
     * 创建人 刘勇豪
     * @param $o_id
     * @return array （三维数组。订单中g_num是几，就返回几个对应抽奖码。）
     *
     */
    public function getAwardcode($o_id){

        if(!$o_id){
            return ['status'=>0,'msg'=>'参数非法，生成抽奖码失败！','data'=>''];
        }

        // 订单详情
        $order_pai = new OrderPaiService();
        $where['o_id'] = $o_id;
        $info = $order_pai->orderPaiInfo($where);
        if(empty($info)){
            return ['status'=>0,'msg'=>'订单信息不见了，生成抽奖码失败！','data'=>''];
        }
        $gdr_id = $info['gdr_id'];
        $o_periods = $info['o_periods'];
        $m_id = $info['m_id'];
        $gp_num = $info['gp_num'];
        $gp_id = $info['gp_id'];

        // 拍品sn
        $goodsProduct = new GoodsProductService();
        $ductinfo = $goodsProduct->goodsProductInfo(['gp_id'=>$gp_id]);
        if(empty($ductinfo)){
            return ['status'=>0,'msg'=>'拍品信息不见了，生成抽奖码失败！','data'=>''];
        }
        $gp_sn = $ductinfo['gp_sn'];//拍品sn

        $where_oa['o.gdr_id'] = $gdr_id;
        $where_oa['o.o_periods'] = $o_periods;
        $order_awards = $this->getOrderAwards($where_oa);
        $max_oa_number = 0;
        if(!empty($order_awards) && !empty($order_awards[0]['oa_number'])){
            $max_oa_number = $order_awards[0]['oa_number'];
        }
        $max_oa_number++;

        $data = [];
        for($i=0; $i<$gp_num; $i++){

            $oa_number = $max_oa_number + $i;
            $oa_code = "YYM" . ($oa_number * $m_id) . "-" . $oa_number;

            $data[$i]['oa_code'] = $oa_code;//中拍码数字
            $data[$i]['oa_state'] = 1;//状态
            $data[$i]['m_id'] = $m_id;//会员ID
            $data[$i]['o_periods'] = $o_periods;//期数
            $data[$i]['o_id'] = $o_id;//拍品订单id
            $data[$i]['oa_number'] = $oa_number;//抽奖数字
            $data[$i]['gdr_id'] = $gdr_id;//折扣类型ID
            $data[$i]['gp_id'] = $gp_id;//商品gp_id
        }

        return ['status'=>1,'msg'=>'success ！','data'=>$data];
    }

    /**
     * 关联查询订单以及抽奖码信息 （order_pai , order_awardcode）
     * 刘勇豪
     * @param string $where
     * @param string $field
     * @param string $order
     * @return mixed
     */
    public function getOrderAwards($where='',$field='*',$order='oa_number desc'){
        $list = Db::table("pai_order_pai")->alias('o')
            ->where($where)
            ->field($field)
            ->join('pai_order_awardcode oa', 'oa.o_id=o.o_id','left')
            ->order($order)
            ->select();

        return $list;
    }

    /**
     * 查询中拍者详情
     * 刘勇豪
     * @param $gdr_id
     * @param $o_periods
     * @return array
     */
    public function get_awards_mem($gdr_id,$o_periods){

        $where['oa.gdr_id'] = $gdr_id;
        $where['oa.o_periods'] = $o_periods;
        $where['oa.oa_state'] = 2;// 中拍

        $info = Db($this->cache)->alias('oa')
            ->where($where)
            ->join('pai_member m', 'oa.m_id=m.m_id','left')
            ->join('pai_order_pai o', 'o.o_id=oa.o_id','left')
            ->find();

        if(!empty($info) && !empty($info['m_name'])){
            $info['m_name_secret'] = substr($info['m_name'],0,3)."**";
        }
        return $info;
    }

    /**
     * 查询中拍码详情列表
     * 刘勇豪
     * @param string $where
     * @param string $order
     * @param string $field
     * @param string $limit
     * @param string $cache
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function get_awardinfo_list($where = '', $order = 'oa.oa_id desc', $field = '*', $limit = "0,5", $cache = 'order_awardcode'){
        $list = Db($this->cache)->alias('oa')
            ->where($where)
            ->field($field)
            ->join('pai_member m', 'm.m_id = oa.m_id', 'left')
            ->join('pai_order_pai o', 'o.o_id = oa.o_id', 'left')
            ->join('pai_goods_dt_record gdr', 'gdr.gdr_id = oa.gdr_id', 'left')
            ->join('pai_goods_discounttype gdt', 'gdt.gdt_id = gdr.gdt_id', 'left')
            ->order($order)
            ->limit($limit)
            ->select();
        return $list;
    }

}