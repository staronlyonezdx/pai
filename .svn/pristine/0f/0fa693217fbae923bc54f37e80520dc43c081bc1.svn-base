<?php
/**
* 拍吖吖积分订单中拍码Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-08-29
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\pointOrderAwardcode;
use app\data\model\pointOrderAwardcode;
use app\data\model\pointOrderAwardcode\PointOrderAwardcodeModel  as PointOrderAwardcodeModel;
use app\data\service\pointOrderPai\PointOrderPaiService as PointOrderPaiService;
use app\data\service\pointGoods\PointGoodsProductService;
use app\data\service\BaseService as BaseService;
use think\Cookie;
use think\Db;

class PointOrderAwardcodeService extends BaseService 
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();	
		$this->pointOrderAwardcode = new PointOrderAwardcodeModel();
		$this->cache = 'point_order_awardcode';
	}
	
    /**
     * 查询拍吖吖积分订单中拍码列表
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodeList($where='', $field='*', $order='oa_id asc')
	{
		$list = $this->pointOrderAwardcode->getList($where, $order, $field, $this->cache);
		return $list;
	}
	
    /**
     * 获取拍吖吖积分订单中拍码信息
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodeInfo($where='', $field='*')
	{		
		$info =  $this->pointOrderAwardcode->getInfo($where, $field, $this->cache);
		return $info;
	}
	
    /**
     * 条件统计拍吖吖积分订单中拍码数量
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodeCount($where='')
	{		
		$Count =  $this->pointOrderAwardcode->getCount($where);
		return $Count;
	}

    /**
     * 更新某个字段的值
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00           
     */	
	public function pointOrderAwardcodeSetField($where='', $field='', $data='')
	{		
		$SetField =  $this->pointOrderAwardcode->getSetField($where, $field, $data, $this->cache);
		return $SetField;
	}

    /**
     * 自增数据
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00           
     */	
	public function pointOrderAwardcodeSetInc($where='', $field='', $data='')
	{		
		$SetInc =  $this->pointOrderAwardcode->getSetInc($where, $field, $data, $this->cache);
		return $SetInc;
	}
	
    /**
     * 查询某一列的值
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00          
     */	
	public function pointOrderAwardcodeColumn($where='', $field='')
	{		
		$Column =  $this->pointOrderAwardcode->getColumn($where, $field);
		return $Column;
	}
	
    /**
     * 添加一条拍吖吖积分订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodeAdd($data='')
	{
		$list = $this->pointOrderAwardcode->getAdd($data, $this->cache);
		return $list;
	}

    /**
     * 添加一条拍吖吖积分订单中拍码数据(返回自增id)
     * 创建人 刘勇豪
     * 时间 2018-08-29 09:40:00
     */
    public function pointOrderAwardcodeAdd_getId($data='')
    {
        $id = $this->pointOrderAwardcode->insertId($data, $this->cache);
        return $id;
    }
	
	
    /**
     * 添加多条拍吖吖积分订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodeAddAll($data='')
	{
		$list = $this->pointOrderAwardcode->getAddAll($data, $this->cache);
		return $list;
	}
	
    /**
     * 拍吖吖积分订单中拍码分页查询(旧)
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodePageList($where='', $field='*', $order="oa_id asc", $page=15)
	{
		
		$list = $this->pointOrderAwardcode->getPageList($where, $field, $order, $page, $this->cache);
		return $list;
	}

    /**
     * 拍吖吖积分订单中拍码分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-08-29 09:40:00
     */
    public function pointOrderAwardcodePaginate($where='', $field='*', $order="oa_id asc",$page=15)
    {
        $list = $this->pointOrderAwardcode->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }
	
	/**
     * 更新拍吖吖积分订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
    public function pointOrderAwardcodeSave($where="", $data="")
    {	
        $save = $this->pointOrderAwardcode->getSave($where, $data, $this->cache);
		return $save;       
    }
	
    /**
     * 删除一条拍吖吖积分订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00      
     */
    public function pointOrderAwardcodeDel($where='')
    {		
        $del = $this->pointOrderAwardcode->getDel($where, $this->cache);
		return $del;  
    }
	
    /**
     * 删除多条拍吖吖积分订单中拍码数据
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00       
     */
    public function pointOrderAwardcodeDelMost($id_arr='')
    {		
        $delAll = $this->pointOrderAwardcode->getDelMost($id_arr, $this->cache);
		return $delAll;  
    }
	
    /**
     * 拍吖吖积分订单中拍码列表分页
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodeListShow($type=0) 
	{
    	$where = array();
		
		$where['oa_id'] = array('>',0);
    	$lists  = $this->pointOrderAwardcodePageList($where);
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
     * 按条件更新拍吖吖积分订单中拍码
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodeRoomEdit() 
	{
		$id = input('get.oa_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		$where = array();
		$where['oa_id'] = $id;
		$result = false;		
    	$result = $this->pointOrderAwardcodeInfo($where);	
		return $result;
	}

    /**
     * 按条件修改处理拍吖吖积分订单中拍码
	 * 创建人 刘勇豪
	 * 时间 2018-08-29 09:40:00
     */
	public function pointOrderAwardcodeRoomEditDoo() 
	{
		$id = input('post.oa_id');
		if ($id=='' || !is_numeric($id)) {
			return false;
		}
		$id=intval($id);
		// 拍吖吖积分订单中拍码POST数据
		$type = 'edit';
		$data = $this->inputData($type);
		$where = array();		
		$where['oa_id'] = $id;
		if($this->pointOrderAwardcodeSave($where, $data))
		{			
			return true;		
		}
		else
		{
			return false;
		}
	}


    /**
     * 随机生成抽奖码 (gp_sn + 期数 + 本期参与顺序 + m_id)
     * 创建人 刘勇豪
     * @param $o_id
     * @return array （三维数组。积分订单中g_num是几，就返回几个对应抽奖码。）
     *
     */
    public function getPointAwardcode($o_id){

        if(!$o_id){
            return ['status'=>0,'msg'=>'参数非法，生成抽奖码失败！','data'=>''];
        }

        // 积分订单详情
        $point_order_pai = new PointOrderPaiService();
        $where['o_id'] = $o_id;
        $info = $point_order_pai->pointOrderPaiInfo($where);
        if(empty($info)){
            return ['status'=>0,'msg'=>'积分订单信息不见了，生成抽奖码失败！','data'=>''];
        }
        $o_periods = $info['o_periods'];
        $m_id = $info['m_id'];
        $gp_num = $info['gp_num'];
        $gp_id = $info['gp_id'];

        // 拍品sn
        $pointGoodsProduct = new PointGoodsProductService();
        $where = '';
        $where['pgp.gp_id'] = $gp_id; // 商品id
        $goods_info = $pointGoodsProduct->getGoodsStoreInfo($where);
        if(empty($goods_info)){
            return ['status'=>0,'msg'=>'拍品信息不见了，生成抽奖码失败！','data'=>''];
        }
        $gp_sn = $goods_info['gp_sn'];//拍品sn

        $where_oa['po.o_periods'] = $o_periods;
        $where_oa['po.gp_id'] = $gp_id;
        $point_order_awards = $this->getPointOrderAwards($where_oa);
        $max_oa_number = 0;
        if(!empty($point_order_awards) && !empty($point_order_awards[0]['oa_number'])){
            $max_oa_number = $point_order_awards[0]['oa_number'];
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
            $data[$i]['o_id'] = $o_id;//拍品积分订单id
            $data[$i]['oa_number'] = $oa_number;//抽奖数字
            $data[$i]['gp_id'] = $gp_id;//商品gp_id
        }

        return ['status'=>1,'msg'=>'success ！','data'=>$data];
    }

    /**
     * 关联查询积分订单以及抽奖码信息 （order_pai , point_order_awardcode）
     * 刘勇豪
     * @param string $where
     * @param string $field
     * @param string $order
     * @return mixed
     */
    public function getPointOrderAwards($where='',$field='*',$order='oa_number desc'){
        $list = Db::table("pai_point_order_pai")->alias('po')
            ->where($where)
            ->field($field)
            ->join('pai_point_order_awardcode poa', 'poa.o_id=po.o_id','left')
            ->order($order)
            ->select();

        return $list;
    }

    /**
     * 查询中拍者详情
     * 刘勇豪
     * @param $gp_id
     * @param $o_periods
     * @return array
     */
    public function get_awards_mem($gp_id,$o_periods){

        $where['poa.gp_id'] = $gp_id;
        $where['poa.o_periods'] = $o_periods;
        $where['poa.oa_state'] = 2;// 中拍

        $info = Db($this->cache)->alias('poa')
            ->where($where)
            ->join('pai_member m', 'poa.m_id=m.m_id','left')
            ->join('pai_point_order_pai po', 'po.o_id=poa.o_id','left')
            ->find();

        $info['m_name_secret'] = '';
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
    public function get_point_awardinfo_list($where = '', $order = 'poa.oa_id desc', $field = '*', $limit = "0,5", $cache = 'point_order_awardcode'){
        $list = Db($this->cache)->alias('poa')
            ->where($where)
            ->field($field)
            ->join('pai_member m', 'm.m_id = poa.m_id', 'left')
            ->join('pai_point_order_pai po', 'po.o_id = poa.o_id', 'left')
            ->order($order)
            ->limit($limit)
            ->select();
        return $list;
    }




}