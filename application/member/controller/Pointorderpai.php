<?php
namespace app\member\controller;

use app\data\service\orderPaiPoint\PointOrderPaiService as PointOrderPaiService;
use app\data\service\address\AddressService as AddressService;
use app\data\service\pointGoodsProduct\PointGoodsProductService as PointGoodsProductService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\pointOrderAwardcode\PointOrderAwardcodeService as PointOrderAwardcodeService;
use think\Controller;
use think\Cookie;
use think\Db;

class Orderpaipoint extends MemberHome
{
    /*
    * 订单详情页
    * 创建人 刘勇豪
    * @return mixed
    */
    public function index()
    {
        
        return $this->fetch();
    }

    /*
    * 订单列表页（团中）
    * 创建人 刘勇豪
    * @return mixed
    */
    public function orderlist()
    {
        $type = input('param.type/d', 0);
        $i = input('param.i/d', 0);

        $header_title = "我参团的";
        if($type){
            $header_title = "我团中的";
        }
        $this->assign('header_title', $header_title);
        $this->assign('header_path', "/member/myhome/index");
        $this->assign('type', $type);
        $this->assign('i', $i);
        return $this->fetch();
    }

    /**
     * 动态获取我参团的列表
     * @return array
     */
    public function getorderlist(){
        $m_id = $this->m_id;
        $page = input('param.page/d',1);
        $size = input('param.size/d',5);
        $status = input('param.status/d',0);//订单状态
        $keyword = input('param.keyword/s','');//订单搜索关键字

        // 待支付订单保留时间
        $res = Db("config")->where(['c_code'=>'PO_UNPAID'])->find();
        $max_pay_time = 24;
        if(!empty($res1)){
            $max_pay_time = $res['c_value'];
        }

        $where['po.m_id'] = $m_id;
        $where['po.o_isdelete'] = ['lt',3];
        if($keyword){
            $where['g.g_name'] = ['like','%'.$keyword.'%'];
        }

        //订单状态
        switch ($status)
        {
            case 0:
                // 全部（我参团的）
                $where['po.o_state'] = ['in','0,1,10'];
                break;
            case 1:
                // 待付款（我参团的）
                $where['po.o_paystate'] = 1;
                //$where['po.o_addtime'] = ['gt',(time() - $max_pay_time * 60 * 60)];
                break;
            case 2:
                // 参团中（我参团的）
                $where['po.o_paystate'] = 2;
                $where['po.o_state'] = 1;
                break;
            case 3:
                // 未团中（我参团的）
                $where['po.o_state'] = 10;
                break;
            case 4:
                $where = [];
                $where = "po.m_id = " . $m_id . " and (( po.o_paystate = 4 and po.o_state = 10 and po.o_isdelete = 1 ) or ( po.o_isdelete = 2 ))";
                if($keyword){
                    $where .= " and g.name like %".$keyword."%";
                }
                break;
            case 10:
                // 全部（我团中的）
                $where['po.o_paystate'] = ['gt',1];
                $where['po.o_state'] = ['between','2,5'];
                break;
            case 11:
                // 待发货（我团中的）
                $where['po.o_paystate'] = ['gt',1];
                $where['po.o_state'] = 2;
                break;
            case 12:
                // 待收货（我团中的）
                $where['po.o_paystate'] = ['gt',1];
                $where['po.o_state'] = 3;
                break;
            case 13:
                // 待评价（我团中的）
                $where['po.o_paystate'] = ['gt',1];
                $where['po.o_state'] = 4;
                break;
            case 14:
                // 退款/售后（我团中的）
                $where['po.o_paystate'] = ['gt',2];
                break;
            case 15:
                // 已完成（我团中的）
                $where['po.o_paystate'] = ['gt',1];
                $where['po.o_state'] = 5;
                break;
            default:
                // 全部（我参团的）
                $where['po.o_state'] = ['in','0,1,10'];
                break;
        }


        $pointOrderPai = new PointOrderPaiService();
        $order='po.o_id desc';
        $field='po.o_id,po.store_id,po.o_money,po.o_paystate,po.o_state,po.gp_id,po.gp_num,po.o_addtime,po.o_paytime,po.o_totalmoney,po.gdr_id,po.o_periods,po.o_isdelete,po.o_gp_settlement_price,gp.gp_market_price,gp.g_id,
gp.gp_img,g.g_name,g.g_endtime,s.stroe_name,s.store_logo';
        $limit = (($page-1) * $size).','.$size;
        $list = $pointOrderPai->get_order_detail_limit_list($where,$order,$field,$limit);

        // 统计总条数
        $total_num = $pointOrderPai->get_order_detail_count($where);
        if(empty($list)){
            return ['status' => 0, 'msg' => '没有数据', 'data' => $list,'total_num'=>$total_num];
        }
        return ['status' => 1, 'msg' => 'success', 'data' => $list,'total_num'=>$total_num];
    }




    /*
    * 订单列表页（参团）
    * 创建人 刘勇豪
    * @return mixed
    */
    public function orderlist2()
    {

        return $this->fetch();
    }

    /*
    * 确认订单页
    * 创建人 刘勇豪
    * @return mixed
    */
    public function confirm()
    {
        $encrypt = input('param.param', '');
        $address_id = input('param.address_id', 0);

        $pointOrderPai = new PointOrderPaiService();
        $json_data = $pointOrderPai->decrypt($encrypt);

        $data = json_decode($json_data, true);
        if (!isset($data['num']) || !isset($data['gp_id']) || !isset($data['gdr_id'])) {
            return "非法请求";
        }
        $gp_id = $data['gp_id'];
        $num = $data['num'];
        $gdr_id = $data['gdr_id'];
        $gs_id = $data['gs_id'] ? $data['gs_id'] : 1;

        $m_id = $this->m_id;

        //收货地址
        $address = new AddressService();
        $default_address = [];
        if ($address_id) {
            $default_address = $address->addressInfo(['address_id' => $address_id, 'm_id' => $m_id]);
        }
        if (!$address_id || empty($default_address)) {
            $callback = $address->getMyDefaultAddress($m_id);
            $default_address = $callback['data'];
        }

        // 商品详情
        if (!$gp_id) {
            return '缺少参数'; // 缺少参数
        } else {
            // 商品详情
            $point_goods_product = new PointGoodsProductService();
            $where['gp.gp_id'] = $gp_id; //商品id
            $where['gdr.gdr_id'] = $gdr_id; // 折扣id
            $info = $point_goods_product->getPointGoodsDiscountInfo($where);
            if (empty($info)) {
                return "商品不存在！";
            }
        }

        // 当前最多能团的件数
        $back = $pointOrderPai->get_max_pai_num($m_id, $gp_id);
        $max_pai_num = 0;
        if ($back['status']) {
            $max_pai_num = $back['data'];
        }

        // 计算总金额
        $price = 0;
        if (!empty($info['gdr_price'])) {
            $price = $info['gdr_price'];
        }
        $all_money = $price * $num;

        // 用户信息
        $member = new MemberService();
        $mem_info = $member->get_info(['m_id' => $m_id]);

        $this->assign('default_address', $default_address);
        $this->assign('info', $info);
        $this->assign('num', $num);
        $this->assign('gp_id', $gp_id);
        $this->assign('gdr_id', $gdr_id);
        $this->assign('gs_id', $gs_id);
        $this->assign('all_money', $all_money);
        $this->assign('mem_info', $mem_info);
        $this->assign('encrypt', $encrypt);
        $this->assign('max_pai_num', $max_pai_num);
        $this->assign('header_title', '确认订单');
        return $this->fetch();
    }

    /*
    * 参团订单支付
    * 创建人 刘勇豪
    * @return mixed
    */
    public function creat_order()
    {
        $address_id = input('param.address_id', '');
        $num = input('param.num', '');
        $gp_id = input('param.gp_id', '');
        $gdr_id = input('param.gdr_id', '');
        $gs_id = input('param.gs_id', 1);
        $o_id = input('param.o_id', '');
        $m_id = $this->m_id;
        if (!$num || !$gp_id || !$gdr_id) {
            return ['status' => 0, 'msg' => '非法请求！'];
        }
        $pointOrderPai = new PointOrderPaiService();

        // 判断是不是自己的商品
        $callback = $pointOrderPai->is_my_goods($gp_id,$m_id);
        if(!$callback['status']){
            return ['status' => 0, 'msg' => $callback['msg']];
        }

        // 判断是否超出最大购买量

        $back = $pointOrderPai->get_max_pai_num($m_id, $gp_id);
        $max_pai_num = 0;
        if ($back['status']) {
            $max_pai_num = $back['data'];
        } else {
            return ['status' => 0, 'msg' => $back['msg']];
        }
        if ($num > $max_pai_num) {
            return ['status' => 0, 'msg' => '下单失败，您剩于' . $max_pai_num . '次购买机会！'];
        }

        //收货地址
        if ($gs_id < 2) {
            $address = new AddressService();
            $my_address = $address->addressInfo(['address_id' => $address_id]);
            if (empty($my_address)) {
                return ['status' => 0, 'msg' => '请填写收货地址！'];
            }
            $data['o_pid'] = $my_address['pid']; //收货人省ID
            $data['o_cid'] = $my_address['cid']; //收货人市ID
            $data['o_did'] = $my_address['did']; //收货人区ID
            $data['o_address'] = $my_address['province'] . $my_address['city'] . $my_address['district'] . $my_address['address']; //收货地址详细
            $data['o_receiver'] = $my_address['name']; //收货人姓名
            $data['o_mobile'] = $my_address['tel']; //收货人手机
            $data['o_addressid'] = $my_address['address_id']; //收货地址ID
        }

        // 商品详情
        $point_goods_product = new PointGoodsProductService();
        $where_discount['gp.gp_id'] = $gp_id;
        $where_discount['gdr.gdr_id'] = $gdr_id;
        $info = $point_goods_product->getPointGoodsDiscountInfo($where_discount);
        if (empty($info)) {
            return ['status' => 0, 'msg' => '商品不存在！'];
        }

        $g_state = $info['g_state'];// 商品状态 6位出售中
        $g_starttime = $info['g_starttime'];// 出售开始时间
        $g_endtime = $info['g_endtime'];// 出售最终截止时间
        if($g_state != 6){
            return ['status' => 0, 'msg' => '抱歉亲！这件商品不在出售中，还不能购买哦！'];
        }

        if($g_starttime > time()){
            return ['status' => 0, 'msg' => '抱歉亲！这件商品还没有开始参团哦'];
        }

        if($g_endtime < time()){
            return ['status' => 0, 'msg' => '抱歉亲！这件商品参团活动已结束了~'];
        }

        // 生成订单信息
        $data['o_sn'] = $pointOrderPai->createOrderSN(); //商品订单编码

        $data['m_id'] = $m_id; //参团人会员ID
        $data['gdr_id'] = $gdr_id; //参团人会员ID
        $data['store_id'] = $info['g_storeid']; //商品商家ID
        $data['o_money'] = $info['gdr_price']; //商品价格
        $data['gp_id'] = $info['gp_id']; //商品ID
        $data['gs_id'] = $info['g_typeid']; //商品特殊属性id 等于$gs_id
        $data['gp_num'] = $num; //商品数量
        $data['o_addtime'] = time(); //订单日期
        $data['o_deliverfee'] = $info['g_express']; //快递费
        $data['o_gp_settlement_price'] = $info['gp_settlement_price'];//商品下单时的结算价格
        $data['o_totalmoney'] = $info['gdr_price'] * $num + $info['g_express']; //订单金额
        $data['o_totalmoney'] = round($data['o_totalmoney'],2);

        // 订单期数
        $callback = $pointOrderPai->createPeriods($gdr_id);
        if (!$callback['status']) {
            return ['status' => 0, 'msg' => $callback['msg']];
        }
        $data['o_periods'] = $callback['data'];

        // 订单信息验证完善
        // TODO ...

        if (!$o_id) {
            // 添加订单
            $o_id = $pointOrderPai->orderPaiAdd_getId($data);

            // 有无设置密码
            $member = new MemberService();
            $mem_info = $member->get_info(['m_id' => $m_id]);
            $m_payment_pwd = $mem_info['m_payment_pwd']; // 会员支付密码
            if(empty($m_payment_pwd)){
                if(empty($m_payment_pwd)){
                    $url = url('/member/modifydata/first_payment_pwd/o_id/'.$o_id);
                    return ['status' => 2, 'msg' => '未设置支付密码！', 'data' => $url];
                }
            }

            if ($o_id) {
                return ['status' => 1, 'msg' => '订单生成成功！', 'data' => $o_id];
            } else {
                return ['status' => 0, 'msg' => '订单生成失败！'];
            }
        } else {
            // 修改订单
            $where_save['o_id'] = $o_id;
            $save = $pointOrderPai->orderPaiSave($where_save, $data);
            if ($save) {
                return ['status' => 1, 'msg' => '订单修改成功！', 'data' => $save];
            } else {
                return ['status' => 0, 'msg' => '订单修改失败！', 'data' => $save];
            }
        }
    }

    /**
     * 参团订单支付
     * 创建人 刘勇豪
     * @return array
     */
    public function order_pay()
    {
        $o_id = input('param.o_id', '');
        $pwd = input('param.pwd', '');
        $m_id = $this->m_id;
        if (!$o_id) {
            return ['status' => 0, 'msg' => '非法请求！'];
        }

        $pointOrderpai = new PointOrderPaiService();
        $calback = $pointOrderpai->order_pay($o_id, $m_id, $pwd);
        return $calback;
    }

    /**
     * 支付结果页面
     * 创建人 刘勇豪
     * @return mixed|string
     */
    public function pay_result()
    {
        $o_id = input('param.o_id/d', 0);
        $j_type = input('param.j_type', 0);

        if (!$o_id) {
            return "参数错误！";
        }
        // 订单详情
        $pointOrderpai = new PointOrderPaiService();
        $info = $pointOrderpai->getMoreInfo(['po.o_id' => $o_id]);

        // 订单剩余支付时间
        $o_addtime = $info['o_addtime'];
        $over_time = 24 * 60 * 60 - (time() - $o_addtime);

        $hour = 0;
        $minute = 0;
        if($over_time>0){
            $hour = floor($over_time / 3600);
            $minute = floor(($over_time - $hour * 3600) / 60);
        }

        $time_str = $hour . "小时" . $minute . "分钟";
        $g_id = $info['g_id'];

        // 设置返回路径
        $header_path = '';
        if($j_type){
            $header_path = "/member/goodsproduct/index/g_id/".$g_id."/o_id/".$o_id;
        }

        $this->assign('info', $info);
        $this->assign('o_id', $o_id);
        $this->assign('header_title', "支付结果");
        $this->assign('header_path', $header_path);
        $this->assign('time_str', $time_str);

        return $this->fetch();
    }

    /**
     * 参团者列表
     * @return mixed
     */
    public function paier_list()
    {
        $gdr_id = input('param.gdr_id/d',0);
        $o_periods = input('param.o_periods/d',0);

        $this->assign('gdr_id', $gdr_id);
        $this->assign('o_periods', $o_periods);
        $this->assign('header_title', '参团者列表');
        return $this->fetch();
    }

    /**
     * 参团这列表
     * @return mixed
     */
    public function get_paier_list()
    {
        $m_id = $this->m_id;

        $page = input('param.page/d',0);
        $size = input('param.size/d',5);
        $gdr_id = input('param.gdr_id/d',0);
        $o_periods = input('param.o_periods/d',0);
        $type = input('param.type/d',0);

        if($type == 1){
            $where['m.m_id'] = $m_id;
        }elseif($type == 2){
            $where['po.o_state'] = 2;
        }
        if($gdr_id){
            $where['po.gdr_id'] = $gdr_id;
        }
        if($o_periods){
            $where['po.o_periods'] = $o_periods;
        }
        $where['po.o_paystate'] = ['gt',1];//已支付的
        $where['po.o_isdelete'] = ['lt',2];//未删除
        $order='po.o_id asc';
        $field='*';
        $limit = ($page * $size).','.$size;
        $pointOrderpai = new PointOrderPaiService();
        $list = $pointOrderpai->orderLimitList($where,$order,$field,$limit);
        if(!empty($list)){
            $html = '';
            foreach($list as $v){
                $o_id = $v['o_id'];//订单id

                $m_avatar = "/static/image/index/pic_home_taplace@2x.png";//默认头像
                if(!empty($v['m_avatar'])){
                    $m_avatar = $v['m_avatar'];// 头像
                }
                $m_name = $v['m_name'];// 昵称

                // 抽奖码份数
                $gp_num = $pointOrderpai->countPaiNum(['o_id'=>$o_id]);
                //是否团中的图片
                $o_state = $v['o_state'];
                if($o_state == 2){
                    $zhongpai_img = "<img src='/static/image/Pointorderpai/icon_zhongpai@2x.png' o_state = ".$o_id.'=='.$o_state.">";
                }else{
                    $zhongpai_img = '';
                }

                $html .= "<a href='/member/Pointorderpai/paier_info/o_id/".$o_id."'>
                <div class='all_participants_main_list clear'>
                    <div class='all_participants_main_picview lf'>
                        <div class='all_participants_main_pic'>
                            <img src='".$m_avatar."'>
                        </div>
                        <div class='all_participants_zhongpai'>
                            ".$zhongpai_img."
                        </div>
                    </div>
                    <div class='all_participants_text lf clear'>
                        <p>".$m_name."<span class='rt'>2018-06-24</span></p>
                        <div>拥有".$gp_num."份吖吖码<img src='/static/image/Pointorderpai/icom_jump@2x.png'  class='rt'></div>
                    </div>
                </div>
            </a>";
            }

            return ['status'=>1,'msg'=>"ok",'data'=>$html];
        }else{
            return ['status'=>0,'msg'=>"empty",'data'=>''];
        }
    }


    /**
     * 参团者详情
     * @return mixed
     */
    public function paier_info()
    {
        $o_id = input('param.o_id/d',0);
        $pointOrderAwardcode = new PointOrderAwardcodeService();
        $where['o_id'] = $o_id;
        $list = $pointOrderAwardcode -> pointOrderAwardcodeList($where);

        $m_name = $this->m_name;
        $this->assign('list', $list);
        $this->assign('m_name', $m_name);
        $this->assign('header_title', $m_name);
        return $this->fetch();
    }

    /**
     * 退款详情
     * @return mixed
     */
    public function refund_info()
    {
        return $this->fetch();
    }

    /**
     * 订单物流详情
     * @return mixed
     */
    public function order_logistics()
    {
        $o_id = input('param.o_id/d',0);
        $is_seller = input('param.is_seller/d',0);
        $m_id = $this->m_id;
        $pointOrderpai = new PointOrderPaiService();


        $where['o_id'] = $o_id;
        $call_back = $pointOrderpai->order_logistics_info($where);
        if(!$call_back['status']){
            return $call_back['msg'];
        }
        $info = $call_back['data'];

        $this->assign('info',$info);
        $this->assign('is_seller',$is_seller);
        $this->assign('header_title', "物流信息");
        return $this->fetch();
    }

    /**
     * 订单确认结果
     * @return mixed
     */
    public function confirm_res()
    {
        return $this->fetch();
    }

    /**
     * 揭晓规则页
     * @return mixed
     */
    public function pai_rule()
    {
        $this->assign('header_title', "揭晓规则");
        return $this->fetch();
    }

    /**
     * 参团者列表
     * @return mixed
     */
    public function pai_memlist()
    {
        $gp_id = input('param.gp_id/d',0);
        $gdr_id = input('param.gdr_id/d',0);
        $o_periods = input('param.o_periods/d',0);
        if(!$gp_id){
            return "参数错误！";
        }

        $pointOrderpai = new PointOrderPaiService();
        $data = $pointOrderpai->get_gdrlist_by_gpid($gp_id);

        if(!$data['status']){
            return $data['msg'];
        }
        $gdr_list = $data['data'];
        //dump($gdr_list);

        $this->assign('gp_id', $gp_id);
        $this->assign('gdr_id', $gdr_id);
        $this->assign('o_periods', $o_periods);
        $this->assign('list', $gdr_list);
        $this->assign('header_title', "参团者列表");
        return $this->fetch();
    }

    /**
     * 统计参团人数
     * @return array
     */
    public function count_paier(){
        $gp_id = input('param.gp_id/d',0);
        $gdr_id = input('param.gdr_id/d',0);
        $o_periods = input('param.o_periods/d',0);
        if(!$gp_id){
            return ['status'=>0,'msg'=>"参数错误"];
        }

        $pointOrderpai = new PointOrderPaiService();
        $callback = $pointOrderpai->count_paier($gp_id,$gdr_id,$o_periods);
        if(!$callback['status']){
            return ['status'=>0,'msg'=>$callback['msg']];
        }

        $count_paier = $callback['data'];

        return ['status'=>8,'msg'=>$callback['msg'],'data'=>$count_paier];
    }

    /**
     * @return array
     */
    public function get_pai_mem_list(){
        $m_id = $this->m_id;
        $page = input('param.page/d',1);
        $size = input('param.size/d',5);
        $gp_id = input('param.gp_id/d',0);
        $gdr_id = input('param.gdr_id/d',0);
        $oa_status = input('param.oa_status/d',1);

        $point_order_awardcode = new PointOrderAwardcodeService();

        $where = [];
        if($gp_id){
            $where['poa.gp_id'] = $gp_id;
        }
        if($gdr_id){
            $where['poa.gdr_id'] = $gdr_id;
        }
        if($oa_status == 1){
            $where['poa.oa_state'] = 1;//参团中
        }elseif($oa_status == 2){
            $where['poa.oa_state'] = ['gt',1];//参团中
        }
        $order='poa.oa_id desc';
        $field='m.m_avatar,m.m_name,poa.o_id,poa.gdr_id,poa.gp_id,poa.o_periods,poa.oa_state, po.o_addtime,po.o_paytime,pgdt.gdt_img';
        $limit = (($page-1) * $size).','.$size;

        $list = $point_order_awardcode->get_point_awardinfo_list($where,$order,$field,$limit);
        if(!empty($list)){
            foreach($list as $k=>$v){
                $m_avatar = "/static/image/index/pic_home_taplace@2x.png";//默认头像
                if(!empty($v['m_avatar'])){
                    $m_avatar = $v['m_avatar'];// 头像
                }
                $list[$k]['m_avatar'] = $m_avatar;
            }
        }

        if(!empty($list)){
            return ['status'=>1,'msg'=>"ok",'data'=>$list];
        }else{
            return ['status'=>0,'msg'=>"empty",'data'=>$list];
        }
    }

    /**
     * 确认订单
     * 刘勇豪
     * @return mixed
     */
    public function confirm_order(){
        $o_id = input('param.o_id/d',0);
        $m_id = $this->m_id;

        $pointOrderpai = new PointOrderPaiService();
        $call_back = $pointOrderpai->confirm_order($o_id,$m_id);

        return $call_back;
    }

    /**
     * 删除订单
     * 刘勇豪
     * @return mixed
     */
    public function delete_order(){
        $o_id = input('param.o_id/d',0);
        $m_id = $this->m_id;

        $pointOrderpai = new PointOrderPaiService();
        $call_back = $pointOrderpai->delete_order($o_id,$m_id);

        return $call_back;
    }

    /**
     * 删除订单
     * 刘勇豪
     * @return mixed
     */
    public function cancel_order(){
        $o_id = input('param.o_id/d',0);
        $m_id = $this->m_id;

        $pointOrderpai = new PointOrderPaiService();
        $call_back = $pointOrderpai->cancel_order($o_id,$m_id);

        return $call_back;
    }

    /**
     * 条款规则页面
     * 刘勇豪
     * @return mixed
     */
    public function refund_rule(){
        return $this->fetch();
    }

    /**
     * 我卖出订单列表
     * 刘勇豪
     * @return mixed
     */
    public function my_sell_list(){
        $i = input('param.i/d', 0);

        $header_title = "我卖出的";
        $this->assign('header_title', $header_title);
        $this->assign('i', $i);
        $this->assign('header_path', "/member/myhome/index");
        return $this->fetch();
    }

    /**
     * ajax获取我卖出的列表
     * 刘勇豪
     * @return array
     */
    public function get_sell_list(){
        $page = input('param.page/d',1);
        $size = input('param.size/d',5);
        $i = input('param.i/d', 0);
        $keyword = input('param.keyword/s', '');
        $m_id = $this->m_id;

        $pointOrderPai = new PointOrderPaiService();
        $callback = $pointOrderPai -> get_sell_list_page($m_id,$page,$size,$i,$keyword);
        return  $callback;
    }

    /**
     * 店家发货（新建订单物流信息）
     * 刘勇豪
     * @return mixed
     */
    public function new_logistics(){
        $o_id = input('param.o_id/d', 0);

        $pointOrderPai = new PointOrderPaiService();
        $callback = $pointOrderPai->new_logistics_page($o_id);
        if(!$callback['status']){
            return $callback['msg'];
        }
        $info = $callback['data'];

        $this->assign('header_title', "填写快递单");
        $this->assign('o_id', $o_id);
        $this->assign('info', $info);
        return $this->fetch();
    }


    /**
     * 填写快递单提交
     * 刘勇豪
     * @return array|mixed
     */
    public function new_logistics_post(){
        $data = input('post.');
        $pointOrderPai = new PointOrderPaiService();

        //提交数据
        $call_back = $pointOrderPai->new_logistics_post($data);

        return $call_back;
    }

    /**
     * 店家发货结果展示(暂时不需要了)
     * 刘勇豪
     * @return mixed
     */
    public function logistics_res(){
        $o_id = input('param.o_id/d', 0);

        $this->assign('header_title','发货结果');
        return $this->fetch();
    }

    /**
     * 快递方式页(暂时不需要了)
     * 刘勇豪
     * @return mixed
     */
    public function logistics_ways(){
        return $this->fetch();
    }

    /**
     * 卖出的订单详情
     * @return mixed
     */
    public function sell_goods_info(){
        $o_id = input('param.o_id', '');
        $j_type = input('param.j_type', 0);
        if (!$o_id) {
            return "参数错误！";
        }

        $pointOrderpai = new PointOrderPaiService();
        $callback = $pointOrderpai->order_info_page($o_id);
        if (!$callback['status']) {
            return $callback['msg'];
        }
        $info = $callback['data'];
        $gdr_id = $info['gdr_id'];
        $o_periods = $info['o_periods'];

        // 参团进度
        $rate = $pointOrderpai->get_orderpai_rate($gdr_id, $o_periods);

        // 查询团中信息
        $pointOrderAwardcode = new PointOrderAwardcodeService();

        // 本期团中者信息
        $awardinfo = $pointOrderAwardcode->get_awards_mem($gdr_id, $o_periods);

        // 我的幸运码
        $where['po.o_id'] = $info['o_id'];
        $myawards = $pointOrderAwardcode->getOrderAwards($where);

//        dump($info);
//        dump($awardinfo);

        $this->assign('info', $info);
        $this->assign('rate', $rate);
        $this->assign('awardinfo', $awardinfo);
        $this->assign('myawards', $myawards);
        $this->assign('header_title', "订单详情");
        return $this->fetch();
    }

    /**
     * 测试新下订单是否是免手续费的
     * 刘勇豪
     */
    public function test_is_notip(){
        $o_id = input('param.o_id', '');
        $pointOrderpai = new PointOrderPaiService();
        $callback = $pointOrderpai->is_notip($o_id);
        dump($callback);
    }

    /**
     * 订单搜索
     * 刘勇豪
     * @return mixed
     */
    public function order_search(){
        $type = input('param.type', 0);
        $keyword = input('param.keyword', '');

        $this->assign('type', $type);
        $this->assign('keyword', $keyword);
        $this->assign('header_title', "订单搜索");
        $this->assign('header_path', "/member/Pointorderpai/orderlist/type/".$type);
        return $this->fetch();
    }

    /**
     * 卖家我卖出的订单搜索
     * 刘勇豪
     * @return mixed
     */
    public function seller_order_search(){
        $keyword = input('param.keyword', '');

        $this->assign('keyword', $keyword);
        $this->assign('header_title', "订单搜索");
        $this->assign('header_path', "/member/Pointorderpai/my_sell_list");
        return $this->fetch();
    }
}

