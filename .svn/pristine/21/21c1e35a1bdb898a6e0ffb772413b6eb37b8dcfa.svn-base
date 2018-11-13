<?php
/**
* 商品详情Service
*-------------------------------------------------------------------------------------------
* 版权所有 杭州市拍吖吖科技有限公司
* 创建日期 2018-06-20
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/
namespace app\data\service\goodsProduct;
use app\data\model\goodsProduct;
use app\data\model\goodsProduct\GoodsProductModel;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use app\data\service\BaseService as BaseService;

class GoodsProductService extends BaseService
{
	protected $cache = 'goods_product';
	
	public function __construct()
	{
		parent::__construct();
        $this->goodsProduct  = new GoodsProductModel();

		$this->cache = 'goods_product';
	}

    /**
     * 查询商品详情列表
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductList($where='', $field='*', $order='gp_id asc')
    {
        $list = $this->goodsProduct->getList($where, $order, $field, $this->cache);
        return $list;
    }

    /**
     * 获取商品详情信息
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductInfo($where='', $field='*')
    {
        $info =  $this->goodsProduct->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 条件统计商品详情数量
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductCount($where='')
    {
        $Count =  $this->goodsProduct->getCount($where);
        return $Count;
    }

    /**
     * 更新某个字段的值
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductSetField($where='', $field='', $data='')
    {
        $SetField =  $this->goodsProduct->getSetField($where, $field, $data, $this->cache);
        return $SetField;
    }

    /**
     * 自增数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductSetInc($where='', $field='', $data='')
    {
        $SetInc =  $this->goodsProduct->getSetInc($where, $field, $data, $this->cache);
        return $SetInc;
    }

    /**
     * 查询某一列的值
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductColumn($where='', $field='')
    {
        $Column =  $this->goodsProduct->getColumn($where, $field);
        return $Column;
    }

    /**
     * 添加一条商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductAdd($data='')
    {
        $list = $this->goodsProduct->getAdd($data, $this->cache);
        return $list;
    }


    /**
     * 添加多条商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductAddAll($data='')
    {
        $list = $this->goodsProduct->getAddAll($data, $this->cache);
        return $list;
    }

    /**
     * 商品详情分页查询(旧)
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductPageList($where='', $field='*', $order="gp_id asc", $page=15)
    {

        $list = $this->goodsProduct->getPageList($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 商品详情分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:51:00
     */
    public function goodsProductPaginate($where='', $field='*', $order="gb_id asc",$page=15)
    {
        $list = $this->goodsProduct->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 更新商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductSave($where="", $data="")
    {
        $save = $this->goodsProduct->getSave($where, $data, $this->cache);
        return $save;
    }

    /**
     * 删除一条商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductDel($where='')
    {
        $del = $this->goodsProduct->getDel($where, $this->cache);
        return $del;
    }

    /**
     * 删除多条商品详情数据
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductDelMost($id_arr='')
    {
        $delAll = $this->goodsProduct->getDelMost($id_arr, $this->cache);
        return $delAll;
    }

    /**
     * 商品详情列表分页
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductListShow($type=0)
    {
        $where = array();

        $where['gp_id'] = array('>',0);
        $lists  = $this->goodsProductPageList($where);
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
     * 按条件更新商品详情
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductRoomEdit()
    {
        $id = input('get.gp_id');
        if ($id=='' || !is_numeric($id)) {
            return false;
        }
        $id=intval($id);
        $where = array();
        $where['gp_id'] = $id;
        $result = false;
        $result = $this->goodsProductInfo($where);
        return $result;
    }

    /**
     * 按条件修改处理商品详情
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductRoomEditDoo()
    {
        $id = input('post.gp_id');
        if ($id=='' || !is_numeric($id)) {
            return false;
        }
        $id=intval($id);
        // 商品详情POST数据
        $type = 'edit';
        $data = $this->inputData($type);
        $where = array();
        $where['gp_id'] = $id;
        if($this->goodsProductSave($where, $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * 删除商品详情操作
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductRoomDel()
    {
        $id = input('post.gp_id');
        if ($id=='' || !is_numeric($id)) {
            return false;
        }
        $id=intval($id);
        $where = array();
        $where['gp_id'] = $id;
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
     * 批量删除商品详情
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductRoomDelMost()
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
     * 添加一条商品详情
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function goodsProductRoomAdd()
    {
        // 商品详情POST数据
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
     * 商品详情POST数据(数据待添加。。。)
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
        $data['gp_sn']    = input('post.gp_sn','');
        return $data;
    }

    /**
     * 数据验证(数据待添加。。。)
     * 创建人 刘勇豪
     * 时间 2018-07-02 10:30:00
     */
    public function checkData($data=[]){
        $error_msg = "";
        //商品详情名
        if(isset($data['gp_sn'])){
            if($data['gp_sn'] == ''){
                $error_msg .= "商品编码不能为空";
            }
        }

        return $error_msg;
    }

    /**
     * 关联查询商品详情（goods_product,goods,store）
     * 创建人 刘勇豪
     */
    public function getMoreInfo($gp_id){
        $where['gp.gp_id'] = $gp_id;
        $list = $this->goodsProduct->getMoreInfo($where);
        return $list;
    }

    /**
     * 关联查询商品折扣类型详情（goods_product,goods,store，goods_dt_record, goods_discounttype）
     * 创建人 刘勇豪
     *
     * 备注：当要获取指定拍品的指定折扣详情时，$where一定要带 gp_id 和 gdt_id
     * 例如：$where = ['gp.gp_id'=>1,'gdr.gdr_id'=>2];
     */
    public function getGoodsDiscountInfo($where){
        $info = $this->goodsProduct->getGoodsDiscountInfo($where);
        return $info;
    }

    /**
     * 按条件获取活动商品
     * 刘勇豪
     * @param int $start_time
     * @param int $end_time
     * @param int $limit
     * @param string $field
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function get_limit_huodong_goods($start_time=0,$end_time=0,$limit=0,$field = "*"){
        if(!$end_time){
            $end_time = time();
        }
        $where = '';
        $where['g.g_starttime'] = ['LT',$end_time];
        $where['g.g_endtime'] = ['GT',$start_time];
        $where['g.g_state'] = ['in','6,9'];
        $where['gp.is_huodong'] = 1;//是活动商品

        $order = 'gp.sort desc';
        $list = Db("goods")->alias("g")
            ->field($field)
            ->join('pai_goods_product gp', 'g.g_id = gp.g_id', 'left')
            ->join('pai_store s', 'g.g_storeid = s.store_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();

        return $list;
    }

    /**
     * 按条件获取指定福袋商品
     * 刘勇豪
     * @param int $start_time
     * @param int $end_time
     * @param int $limit
     * @param string $field
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function get_limit_fudai_goods($start_time=0,$end_time=0,$limit=0,$field = "*"){
        if(!$end_time){
            $end_time = time();
        }
        $where = '';
        $where['g.g_starttime'] = ['LT',$end_time];
        $where['g.g_endtime'] = ['EGT',$start_time];
        $where['g.g_state'] = 6;
        $where['gp.gp_state'] = ['in','1,2'];
        $where['gp.is_fudai'] = 1;//是福袋商品

        $order = 'gp.gp_state asc,gp.sort asc';
        $list = Db("goods")->alias("g")
            ->field($field)
            ->join('pai_goods_product gp', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();

        $count = count($list);

        if(!$count){
            // 如果全部参拍结束
            $where = '';
            $where['g.g_starttime'] = ['LT',$end_time];
            $where['g.g_endtime'] = ['GT',$start_time];
            $where['g.g_state'] = 9;
            $where['gp.is_fudai'] = 1;//是福袋商品
            $order = 'gp.sort desc';
            $list2 = Db("goods")->alias("g")
                ->field($field)
                ->join('pai_goods_product gp', 'g.g_id = gp.g_id', 'left')
                ->where($where)
                ->order($order)
                ->limit($limit - $count)
                ->select();
            $list = $list2;
            $count = 1;
        }
        if($count < $limit){
            // 如果部分参拍结束
            $where = '';
            $where['g.g_starttime'] = ['LT',$end_time];
            $where['g.g_endtime'] = ['GT',$start_time];
            $where['g.g_state'] = 9;
            $where['gp.is_fudai'] = 1;//是福袋商品

            $order = 'gp.sort asc';
            $list2 = Db("goods")->alias("g")
                ->field($field)
                ->join('pai_goods_product gp', 'g.g_id = gp.g_id', 'left')
                ->where($where)
                ->order($order)
                ->limit($limit - $count)
                ->select();

            if(!empty($list2)){
                foreach($list2 as $k=>$v){
                    $list[$count + $k] = $v;
                }
            }
        }

        return $list;
    }

    /**
     * 查找商品详情
     * @param string $where
     * @param string $field
     * @return array
     */
    public function get_goods_info($where='',$field='*'){
        $info  = Db("goods")->alias("g")
            ->field($field)
            ->join('pai_goods_product gp', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->find();

        if(empty($info)){
            return ['status'=>0,'msg'=>"empty",'data'=>''];
        }

        $orderpai = new OrderPaiService();
        $call_back = $orderpai->pai_progress($info['g_id']);
        if(!$call_back['status']){
            return $call_back;
        }
        $pai_progress = $call_back['data'];
        $info['pai_progress'] = $pai_progress;
        return ['status'=>8,'msg'=>"success",'data'=>$info];
    }


}