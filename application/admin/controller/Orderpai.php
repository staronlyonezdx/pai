<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use app\data\service\orderAwardcode\OrderAwardcodeService as OrderAwardcodeService;
use think\Db;
use think\Cookie;

class Orderpai extends AdminHome
{
    /*
    * 拍品订单列表
    * 创建人 刘勇豪
    * 时间 2018-07-09 10:40:00
    */
    public function index()
    {
        $status = input('param.status/d', 0);
        $g_name = trim(input('param.g_name/s', ''));
        $m_name = trim(input('param.m_name/s', ''));
        $o_sn = trim(input('param.o_sn/s', ''));
        $admin_id = Cookie::get('admin_id');

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

        $order='o.o_id desc';
        $field = "o.o_id,o.o_sn,o.store_id,o.o_money,o.o_paystate,o.o_state,o.gp_id,o.gp_num,o.o_addtime,o.o_paytime,o.o_totalmoney,o.gs_id,o.gdr_id,o.o_periods,o.o_isdelete,o.o_gp_settlement_price,o.o_deliverfee,gp.gp_market_price,gp.g_id,gp.gp_img,g.g_name,g.g_endtime,g.g_typeid,s.stroe_name,m.m_name,m.is_jq,s.store_logo";
        $list = $orderPai->getOrderInfoPaginate($where, $field, $order,5);
        $page = $list->render();
        $total = $list->total();

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
        $this->assign('admin_id', $admin_id);
        return $this->fetch();
    }

    /*
    * 拍品订单编辑
    * 创建人 刘勇豪
    * 时间 2018-07-09 10:40:00
    */
    public function edit()
    {
        $o_id = input('request.o_id', 0);
        if(!$o_id){
            $this->error('参数错误！', url('orderpai/index'), 3);
        }
        $orderPai = new OrderPaiService();

        //表单提交
        if (request()->isPost()) {
            //表单数据
            $data['o_receiver'] = input('post.o_receiver', '');
            $data['o_mobile'] = input('post.o_mobile', '');
            $data['o_address'] = input('post.o_address', '');
            $data['o_totalmoney'] = input('post.o_totalmoney/d', 0);

            //表单验证
            $error_msg = $orderPai->checkData($data);
            if ($error_msg) {
                $this->error($error_msg, url('orderpai/edit') . "?o_id=" . $o_id, 3);
            }

            // 修改
            $where_save['o_id'] = $o_id;
            $res = $orderPai->orderPaiSave($where_save, $data);
            if (!$res) {
                $this->error('修改拍品订单失败', url('orderpai/edit') . "?o_id=" . $o_id, 3);
            }
            $this->success("修改拍品订单成功！", url('orderpai/index'), 3);
        }

        //查询拍品订单详情
        $orderPai = new OrderPaiService();
        $info = $orderPai->getMoreInfo(['o.o_id'=>$o_id]);
        if(empty($info)){
            $this->error('拍品订单不存在', url('orderpai/index'), 3);
        }

        $this->assign('o_id', $o_id);
        $this->assign('info', $info);
        return $this->fetch();
    }

    /*
    * 拍品订单删除
    * 创建人 刘勇豪
    * 时间 2018-07-09 10:40:00
    */
    public function delete()
    {
        $o_id = input('request.o_id', 0);
        if (!$o_id || !is_numeric($o_id)) {
            $this->error("非法请求！", url('orderpai/index'), 3);
        }

        $orderPai = new OrderPaiService();
        $res = $orderPai->orderPaiDelete($o_id);
//        dump($res);die;
        if($res){
            $this->success("拍品订单删除成功！", url('orderpai/index'), 3);
        }else{
            $this->error("拍品订单删除失败！", url('orderpai/index'), 3);
        }
    }

    /*
    * 拍品订单详情
    * 创建人 刘勇豪
    * 时间 2018-07-09 10:40:00
    */
    public function info()
    {
        $o_id = input('request.o_id', 0);
        if (!$o_id || !is_numeric($o_id)) {
            $this->error("非法请求！", url('orderpai/index'), 3);
        }

        // 订单详情
        $orderPai = new OrderPaiService();
        $info = $orderPai->getMoreInfo(['o.o_id'=>$o_id]);

        // 中拍号码详情
        $orderAwardcode = new OrderAwardcodeService();
        $awardcodeList = $orderAwardcode->orderAwardcodeList();

        $this->assign('o_id', $o_id);
        $this->assign('info', $info);
        $this->assign('awardcodeList', $awardcodeList);
        return $this->fetch();
    }

    /**
     * ajax动态获取拍品订单
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getPTypeList($level=0){
        if($level){
            $o_level = $level;
        }else{
            $o_level = input('request.o_level', 1);
        }

        if(!$o_level){
            return ['status'=>0,'msg'=>'缺少参数！','data'=>''];
        }

        $orderPai = new OrderPaiService();

        $p_level = $o_level - 1;

        if($p_level == 0){
            $p_typeList[0] = ['o_id'=>0,'o_name'=>'顶级分类','o_parent_id'=>0,'o_level'=>0,'o_state'=>0];
        }else{
            $where_list['o_level'] = $p_level;
            $p_typeList = $orderPai->orderPaiList($where_list);
        }

        if(empty($p_typeList)){
            return ['status'=>0,'msg'=>'列表空！','data'=>''];
        }
        // 生成动态html
        $opt_html = '';
        foreach($p_typeList as $v){
            $opt_html .= "<option value=".$v['o_id'].">".$v['o_name']."</option>";
        }

        return ['status'=>1,'msg'=>'success','data'=>$opt_html];
    }
}
