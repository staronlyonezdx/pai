<?php
/**
 * User: Shine
 * Date: 2018/9/4
 * Time: 14:39
 */
namespace app\business\controller;

use app\data\service\BaseService;
use app\data\service\orderAwardcode\OrderAwardcodeService;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use Symfony\Component\Yaml\Tests\B;

class Paiorder extends MemberHome{
    /**
     * 获取订单列表
     * 刘勇豪
     */
    public function order_list(){
        $m_id = $this->m_id;
        $gtype  = input('param.gtype/d', 0);
        $status = input('param.status/d', 0);
        $g_name = trim(input('param.g_name/s', ''));
        $m_name = trim(input('param.m_name/s', ''));
        $o_sn   = trim(input('param.o_sn/s', ''));
        $mobile = $m_mobile   = trim(input('param.m_mobile/s', ''));
        $excel  = trim(input('param.excel', ''));
        $start_time  = trim(input('param.start_time', ''));
        $end_time  = trim(input('param.end_time', ''));

        $where = '';
        if($status){
            switch ($status) {
                case 1:
                    // 参拍中
                    $where['o.o_state'] = 1;
                    break;
                case 2:
                    // 待发货
                    $where['o.o_state'] = 2;
                    break;
                case 3:
                    // 已发货
                    $where['o.o_state'] = 3;
                    break;
                case 4:
                    // 已签收
                    $where['o.o_state'] = 4;
                    break;
                case 5:
                    // 交易完成
                    $where['o.o_state'] = 5;
                    break;
                case 6:
                    // 未中拍
                    $where['o.o_state'] = 10;
                    break;
                case 7:
                    // 流拍
                    $where['o.o_state'] = 11;
                    break;
                case 8:
                    // 待付款
                    $where['o.o_paystate'] = 1;
                    break;
                case 9:
                    // 已付款
                    $where['o.o_paystate'] = 2;
                    break;
                case 10:
                    // 退款中
                    $where['o.o_paystate'] = 3;
                    break;
                case 11:
                    // 退款完成
                    $where['o.o_paystate'] = 4;
                    break;
            }
        }

        // 商品分类
        if($gtype == 1){
            $where['gp.is_fudai'] = 2;
        }elseif($gtype == 2){
            $where['gp.is_fudai'] = 1;
        }

        // 商品名搜索
        if($g_name){
            $where['g.g_name'] = ['like', "%".$g_name."%"];
        }

        // 用户昵称搜索
        if($m_name){
            $where['m.m_name'] = ['like', "%".$m_name."%"];
        }

        //订单编号
        if($o_sn){
            $where['o.o_sn'] = $o_sn;
        }
        $orderPai = new OrderPaiService();
        //手机号码
        if($m_mobile){
            $where['m.m_mobile'] = htmlspecialchars($orderPai->encrypt($m_mobile));
        }
        //中奖开始和结束时间
        if($start_time && $end_time){
            $where['o.o_publishtime'] = ['between time',[$start_time,$end_time]];
        }

        //本店铺
        $where['g.g_mid'] = $m_id;
//        dump($where);die;
        $field = "o.o_id,o.o_sn,o.store_id,o.o_mobile,o.o_paystate,o.o_state,o.gp_id,o.gp_num,o.o_address,o.o_addtime,o.o_paytime,o.o_totalmoney,o.gs_id,o.gdr_id,o.o_periods,o.o_isdelete,o.o_gp_settlement_price,o.o_deliverfee,o.o_money,o.o_publishtime,o.o_receiver,o.o_express_way,o.o_express_num,o.o_express_num,o.o_seller_name,o.o_seller_name,o.o_seller_mobile,gp.gp_market_price,gp.g_id,gp.gp_sn,gp.gp_img,gp.is_huodong,gp.is_fudai,g.g_name,g.g_endtime,g.g_typeid,s.stroe_name,m.m_name,m.m_mobile,m.is_jq,s.store_logo";
        $order='o.o_id desc';
        //导出excel
        if($excel == 1){
            if(!$start_time && !$end_time){
                $start_time = date('Y-m-d',strtotime('-1 day')).' 16:00:00';
                $end_time   = date('Y-m-d').' 16:00:00';
                $where['o.o_publishtime'] = ['between time',[$start_time,$end_time]];
            }
            $where['o.o_state'] = 2;
            $list = $orderPai->getOrderInfoSelect($where, $field, $order);
            //待导出数据
            $data = $this->commodity_info($list);
            $title =   [
                '订单编号', '商品编号','支付状态','订单状态','商品名称','商家名称','商品类型','商品属性','订单总价','运费','支付时间','中拍时间','参拍人昵称','收货人','参拍人手机号','收货人手机','收货地址'
            ];
            $filename = date('m-d H:i:s').'待发货发货余额商品订单';
            $orderPai->exportExcel($data,$title,$filename);
            die;
        }else{
            //列表查询
            $list = $orderPai->getOrderInfoPaginate($where, $field, $order,5);
            $page = $list->render();
            $total = $list->total();

        }
//        dump($list);die;

        $list = $list->toArray();
        $list = $list['data'];
        if(!empty($list)){
            foreach($list as $k=>$v){
                // 幸运码数量
                $where_count['o_id'] = $v['o_id'];
                $pai_num = $orderPai->countPaiNum($where_count);
                $list[$k]['pai_num'] = $pai_num;

                //参拍揭晓时间（当期最后下单时间）
                $gdr_id = $v['gdr_id'];
                $o_periods = $v['o_periods'];
                $call_publish = $orderPai->get_pai_publish_time($gdr_id, $o_periods);
                $publish_time = 0;
                if($call_publish['status']){
                    $publish_time = $call_publish['data'];
                }
                $list[$k]['o_publishtime'] = $publish_time;

                // 中奖者信息
                $orderAwardcode = new OrderAwardcodeService();
                $awards_mem_info = $orderAwardcode->get_awards_mem($gdr_id,$o_periods);

                $award_m_avatar = '';//中奖者头像
                $award_m_name = '';//中奖者名称
                $award_m_name_secret = '';//中奖者名称保密
                if(!empty($awards_mem_info) && !empty($awards_mem_info['m_name_secret'])){
                    $award_m_avatar = $awards_mem_info['m_avatar'];//中奖者头像
                    $award_m_name = $awards_mem_info['m_name'];//中奖者名称
                    $award_m_name_secret = $awards_mem_info['m_name_secret'];//中奖者名称保密
                }
                $list[$k]['award_m_avatar'] = $award_m_avatar;
                $list[$k]['award_m_name'] = $award_m_name;
                $list[$k]['award_m_name_secret'] = $award_m_name_secret;
                $list[$k]['m_mobile'] =  htmlspecialchars($orderAwardcode->decrypt($v['m_mobile']));
                $list[$k]['o_mobile'] =  $v['o_mobile'];
            }
            foreach($list as $k => $v){
                $g_id = $v['g_id'];
                $min_price = 0;
                $max_price = 0;
                $res_min = Db("goods_dt_record")->where(['g_id'=>$g_id])->order("gdr_price asc")->find();
                $res_max = Db("goods_dt_record")->where(['g_id'=>$g_id])->order("gdr_price desc")->find();
                if(!empty($res_min)){
                    $min_price = $res_min['gdr_price'];
                }
                if(!empty($res_max)){
                    $max_price = $res_max['gdr_price'];
                }
                $list[$k]['min_price'] = $min_price;
                $list[$k]['max_price'] = $max_price;
            }
        }
//        dump($list);die;
//        dump($list);die;
        $this->assign('list', $list);
        $this->assign('page', $page);
        $this->assign('total', $total);
        $this->assign('status', $status);
        $this->assign('g_name', $g_name);
        $this->assign('m_name', $m_name);
        $this->assign('o_sn', $o_sn);
        $this->assign('gtype', $gtype);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('m_mobile', $mobile);
        return $this->fetch();
    }
    /**
     * 导出商品订单excel
     * 邓赛赛
     */
    public function commodity_info($list){
        $data = array();
        $base = new BaseService();
        foreach($list as $k => $v){
            switch($v['o_paystate']){
                case 1:
                    $o_paystate = '待付款';
                    break;
                case 2:
                    $o_paystate = '已付款';
                    break;
                case 3:
                    $o_paystate = '退款中';
                    break;
                case 4:
                    $o_paystate = '退款完成';
                    break;
                default:
                    $o_paystate = '';
                    break;
            }
            switch($v['gs_id']){
                case 1:
                    $gs_name = '普通商品';
                    break;
                case 2:
                    $gs_name = '虚拟商品';
                    break;
                case 3:
                    $gs_name = '大宗商品';
                    break;
                default:
                    $gs_name = '';
                    break;
            }
            switch($v['o_state']){
                case 1:
                    $o_state = '参拍中';
                    break;
                case 2:
                    $o_state = '已中拍';
                    break;
                case 3:
                    $o_state = '已发货';
                    break;
                case 4:
                    $o_state = '已签收（待评价）';
                    break;
                case 5:
                    $o_state = '交易完成';
                    break;
                case 10:
                    $o_state = '未中拍';
                    break;
                case 11:
                    $o_state = '流拍';
                    break;
                case 12:
                    $o_state = '已中参与奖';
                    break;
                case 13:
                    $o_state = '参与奖已发货';
                    break;
                case 14:
                    $o_state = '参与奖已签收（待评价）';
                    break;
                case 15:
                    $o_state = '参与奖交易完成';
                    break;
                default:
                    $o_state = '';
                    break;
            }

            $status = '普通商品商品';
            if($v['is_fudai'] == 1){
                $status = '福袋商品';
            }
            if($v['is_huodong'] == 1){
                $status = '活动商品';
            }
            $o_deliverfee = $v['o_deliverfee'] > 0 ? $v['o_deliverfee'] : '包邮';
            $o_paytime = empty($v['o_paytime']) ? '' : date('Y-m-d H:i:s',$v['o_paytime']);
            $o_publishtime = empty($v['o_publishtime']) ? '' : date('Y-m-d H:i:s',$v['o_publishtime']);
            $m_mobile = htmlspecialchars($base->decrypt($v['m_mobile']));
            $data[] = [
                $v['o_sn'],
                $v['gp_sn'],
                $o_paystate,
                $o_state,
                $v['g_name'],
                $v['stroe_name'],
                $status,
                $gs_name,
                $v['o_totalmoney'],
                $o_deliverfee,
                $o_paytime,
                $o_publishtime,
                $v['m_name'],
                $v['o_receiver'],
                $m_mobile,
                $v['o_mobile'],
                $v['o_address'],
            ];
        }
        return $data;
    }
}