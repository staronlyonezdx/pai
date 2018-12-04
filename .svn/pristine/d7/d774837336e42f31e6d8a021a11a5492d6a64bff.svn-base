<?php
/**
 * Created by PhpStorm.
 * User: lyh
 * Date: 2018/9/1
 * Time: 10:25
 */
namespace app\crontab\controller;

use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use app\data\service\member\MemberService;
use think\Controller;
use think\Db;

class Liupaigoods extends  Controller
{
    /**
     * 到期商品的订单流拍，有库存自动延期（普通参拍、活动秒杀、福袋）
     * 刘勇豪
     * 测试连接：http://www.pai.com/crontab/Liupaigoods/index
     */
    public function index(){
        // 正在参拍中的过期商品
        $now = time();
        $where['g.g_state'] = 6;// 6发布中
        $where['g.g_endtime'] = ['lt',$now];
        $row = Db("goods")->alias("g")
            ->field("g.g_id,gp.gp_id,gp.gp_stock,g.g_starttime,g.g_endtime,gp.is_fudai")
            ->join('pai_goods_product gp', 'gp.g_id = g.g_id', 'left')
            ->where($where)
            ->select();

        // 订单流拍
        if(!empty($row)){
            foreach($row as $v){
                $g_id = $v['g_id'];
                $gp_id = $v['gp_id'];
                $gp_stock = $v['gp_stock'];

                $where = '';
                $where['o.gp_id'] = $gp_id;
                $where['o.o_paystate'] = 2;// 1待付款，2已付款，3退款中，4退款完成
                $where['o.o_state'] = 1;// 订单状态1参拍中，2已中拍，3已发货，4已签收（待评价），5交易完成，10未中拍 11流拍

                $liu_orders = Db("order_pai")->alias("o")
                    ->field("o.o_id,o.o_sn,o.m_id,o.o_totalmoney,o.gp_id,m.m_name,m.m_levelid")
                    ->join('pai_member m', 'm.m_id = o.m_id', 'left')
                    ->where($where)
                    ->select();
                dump($liu_orders);
                //die;
                if(!empty($liu_orders)){

                }


            }
        }

        dump($row);die;

    }

}