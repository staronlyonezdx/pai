<?php
/**
 * User: Shine
 * Date: 2018/9/4
 * Time: 15:01
 */
namespace app\data\service\orderPai;

use app\data\service\BaseService;
use app\data\model\orderPai\OrderPaiModel;
use app\data\service\orderAwardcode\OrderAwardcodeService;

class PaiOrderService extends BaseService{
    protected $cache = 'order_pai';

    public function __construct()
    {
        parent::__construct();
        $this->orderPai = new OrderPaiModel();
        $this->cache = 'order_pai';
    }

    /**
     * 获取余额订单
     * 高居鹏
     */
    public function getOrderList($where='',$order='o.o_id desc',$field='*',$page=10){

        $list = Db($this->cache)->alias("o")
            ->join('pai_goods_product gp', 'gp.gp_id = o.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->join('pai_store s', 's.store_id = o.store_id', 'left')
            ->join('pai_member m', 'm.m_id = s.m_id', 'left')
            ->field($field)
            ->where($where)
            ->order($order)
            ->paginate($page);

        return $list;

    }

    /**
     * 统计指定拍品的抽奖码数量（这里是以实际抽奖码数量为准）
     * 刘勇豪
     */
    public function countPaiNum($where)
    {
        $num = Db('order_awardcode')->where($where)->count();
        return $num;
    }

    /**
     * 参拍揭晓时间，最后下单时间
     * 刘勇豪
     */
    public function get_pai_publish_time($gdr_id,$operiods){
        $publish_time = 0;
        if(!$gdr_id || !$operiods){
            return ['status'=>0,'msg'=>'参数错误！'];
        }

        $where['oa.gdr_id'] = $gdr_id;
        $where['oa.o_periods'] = $operiods;
        //$where['oa.oa_state'] = 2;
        $info = Db("order_awardcode")->alias("oa")
            ->where($where)
            ->join('pai_order_pai o', 'o.o_id = oa.o_id', 'left')
            ->order("oa.oa_id desc")
            ->find();
        if(empty($info)){
            return ['status'=>0,'msg'=>'本期参拍中拍信息还没有产生！'];
        }

        $publish_time = $info['o_paytime'];
        return ['status'=>1,'msg'=>'本期参拍中拍时间已经产生！','data'=>$publish_time];
    }


}