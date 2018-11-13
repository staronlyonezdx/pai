<?php
namespace app\api\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\BaseService as BaseService;
use app\data\service\address\AddressService as AddressService;
use app\data\service\api\ApigoodsService as ApigoodsService;
use app\data\service\api\ApiorderService as ApiorderService;
use app\data\service\goodsDiscounttype\GoodsDiscounttypeService as GoodsDiscounttypeService;
use app\data\service\orderPai\OrderPaiService;
use app\data\service\orderAwardcode\OrderAwardcodeService as OrderAwardcodeService;
use think\Db;

class Order extends ApiMember
{
   //得到库存和限购
    public function get_goods_xg(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if(empty($this->data['gp_id']))
        {
            $this->response_error("商品gpID不能为空");
        }
        $gp_id=$this->data['gp_id'];
        $ApiorderService=new ApiorderService();
        $xg=array();
        $xg=$ApiorderService->doget_goods_xg($gp_id);
        $cz_num=$ApiorderService->doget_goods_ordernum($m_id,$gp_id);
        $xg['cz_num']=$cz_num;
        $this->response_data($xg);
    }
    //添加订单
    public function add_order(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id'])){
            $this->response_error("拍买用户ID不能为空");
        }
        $data['m_id']=$this->data['member_id'];
        if(empty($this->data['store_id'])){
            $this->response_error("商品店铺ID不能为空");
        }
        $data['store_id']=$this->data['store_id'];
        if(empty($this->data['o_money'])){
            $this->response_error("订单金额不能为空");
        }
        $data['o_money']=$this->data['o_money'];
        if(empty($this->data['gp_id'])){
            $this->response_error("商品gp_id不能为空");
        }
        $data['gp_id']=$this->data['gp_id'];
        if(empty($this->data['gp_num'])){
            $this->response_error("购买数量不能为空");
        }
        $data['gp_num']=$this->data['gp_num'];
        if(!empty($this->data['o_pid'])){
            $data['o_pid']=$this->data['o_pid'];
        }
        if(!empty($this->data['o_cid'])){
            $data['o_cid']=$this->data['o_cid'];
        }
        if(!empty($this->data['o_did'])){
            $data['o_did']=$this->data['o_did'];
        }
        if(!empty($this->data['o_address'])){
            $data['o_address']=$this->data['o_address'];
        }
        if(!empty($this->data['o_receiver'])){
            $data['o_receiver']=$this->data['o_receiver'];
        }
        if(!empty($this->data['o_mobile'])){
            $data['o_mobile']=$this->data['o_mobile'];
        }
        if(!empty($this->data['o_addressid'])){
            $data['o_addressid']=$this->data['o_addressid'];
        }
        if(empty($this->data['gdr_id'])){
            $this->response_error("商品折扣类型ID不能为空");
        }
        $data['gdr_id']=$this->data['gdr_id'];
        if(empty($this->data['gs_id'])){
            $this->response_error("商品类型ID不能为空");
        }
        $data['gs_id']=$this->data['gs_id'];
        if($data['gs_id']=='1'){
            if(empty($data['o_pid'])||empty($data['o_cid'])||empty($data['o_address'])||empty($data['o_receiver'])||empty($data['o_mobile'])||empty($data['o_addressid'])){
                $this->response_error("如果是普通商品，需要填写详细的收货地址和联系人电话等");
            }
        }
        $ApiorderService=new ApiorderService();
        $result=$ApiorderService->do_add_order($data);
        if($result['status']){
            $rdata=array();
            $rdata['msg']="操作成功";
            $rdata['o_id']=$result['data'];
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($res['msg']);die;
        }
    }
    //添加订单
    public function pay_order(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id'])){
            $this->response_error("拍买用户ID不能为空");
        }
        if(empty($this->data['o_id'])){
            $this->response_error("订单ID不能为空");
        }
        if(empty($this->data['m_payment_pwd'])){
            $this->response_error("支付密码不能为空");
        }
        $m_id=$this->data['member_id'];
        $o_id=$this->data['o_id'];
        $m_payment_pwd=md5($this->data['m_payment_pwd']);
        $OrderPaiService=new OrderPaiService();
        $result=$OrderPaiService->order_pay($o_id,$m_id,$m_payment_pwd);
        if($result['status']){
            $rdata=array();
            $rdata['msg']="操作成功";
            $rdata['o_id']=$o_id;
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($res['msg']);die;
        }
    }
    //得到折扣类型
    public function get_discount_type(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $where="1=1 ";
        if(empty($this->data['g_id']))
        {
            $this->response_error("商品ID不能为空");
        }
        $ApigoodsService=new ApigoodsService();
        $where2['g_id']=$this->data['g_id'];
        $info=$ApigoodsService->get_goods_info($this->data['g_id']);
        if(empty($info)){
            $this->response_error("该商品信息为空");
        }

        $where.=" AND gdr.g_id=".$this->data['g_id'];
        $list=$ApigoodsService->doget_pai_gdrlist($where);
        $this->response_data($list);

    }
    //得到订单列表
    public function get_pai_order_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $ApiorderService=new ApiorderService();
        $where="op.m_id=".$this->data['member_id'];
        if(!empty($this->data['o_state'])){
            $where.=" and op.o_state=".$this->data['o_state'];
        }
        $fields=" s.stroe_name,g.g_img,g.g_name,gp.gp_market_price,gdr.gdr_price,op.o_addtime,g.g_endtime,op.gp_num";
        $order="op.o_addtime desc";
        if(empty($this->data['curpage'])){
            $curpage="1";
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum'])){
            $pagenum=10;
        }
        else{
            $pagenum=$this->data['pagenum'];
        }
        $list=array();
        $list=$ApiorderService->doget_pai_order_list($where,$fields,$order,$curpage,$pagenum);
        $c=$ApiorderService->doget_pai_order_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        if(!empty($list)){
            $this->response_data($list,$pagelist);
        }
        else{
            $this->response_error("数据为空");
        }
    }
    //得到订单详情
    public function get_pai_order_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $ApiorderService=new ApiorderService();
        if(empty($this->data['o_id']))
        {
            $this->response_error("订单o_id不能为空");
        }
        $list=array();
        $fields=" op.o_id,op.o_periods,op.gdr_id,op.m_id,s.stroe_name,g.g_img,g.g_name,gp.gp_market_price,gdr.gdr_price,op.o_address,op.o_receiver,op.o_mobile,op.o_state,op.o_addtime,g.g_endtime,op.gp_num,op.gs_id,op.o_deliverfee,op.o_sn,op.o_paystate,op.o_paytime";
        $list=$ApiorderService->doget_pai_order_info($this->data['o_id'],$fields);
        if(empty($list['o_id'])){
            $this->response_error("订单数据为空");
        }
        $list['g_img']=PAI_URL.$list['g_img'];
        $gdr_id=$list['gdr_id'];
        $o_periods=$list['o_periods'];
        $m_id=$list['m_id'];
        $list['outdate']="2";
       //订单状态信息
        $o_state=$list['o_state'];
        $gdr_id=$list['gdr_id'];
        $o_periods=$list['o_periods'];
        $o_paystate=$list['o_paystate'];
        $o_id=$list['o_id'];
        $pai_cur=$ApiorderService->doget_order_stateinfo($o_state,$gdr_id,$o_periods,$o_paystate,$o_id);
        $list['orderstate']=$pai_cur;
        $this->response_data($list);
    }
    //获取用户金额
    public function get_money(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $ApiorderService=new ApiorderService();
        $my_money=$ApiorderService->dogetMoney($this->data['member_id']);
        $this->response_data($my_money);
    }
    //检查用户支付密码
    public function checkpaypwd(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        if(empty($this->data['paypwd']))
        {
            $this->response_error("用户支付密码没有");
        }
        $pwd=$this->data['paypwd'];
        $ApiorderService=new ApiorderService();
        $res=$ApiorderService->docheckpaypwd($this->data['member_id'],$pwd);
        $this->response_data($res);
    }
    //用户是否有支付密码
    public function is_has_paypwd(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $ApiorderService=new ApiorderService();
        $res=$ApiorderService->do_is_has_paypwd($this->data['member_id']);
        if($res['status']=='1')
        {
            $this->response_data($res['msg']);
        }
        else{
            $this->response_error($res['msg']);
        }
    }
    //设置用户的支付密码
    public function edit_paypwd(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        if(empty($this->data['paypwd']))
        {
            $this->response_error("用户支付密码没有");
        }
        $pwd=$this->data['paypwd'];
        $pwd=md5($pwd);
        $ApiorderService=new ApiorderService();
        $res=$ApiorderService->do_edit_paypwd($this->data['member_id'],$pwd);
        if($res['status']=='1')
        {
            $this->response_data($res['msg']);
        }
        else{
            $this->response_error($res['msg']);
        }


    }
    //所有参拍者列表
    public function paier_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $m_id =$this->data['member_id'];
        if(empty($this->data['curpage'])){
            $page="0";
        }
        else{
            $page=$this->data['curpage']-1;
        }
        if(empty($this->data['pagenum'])){
            $size=10;
        }
        else{
            $size=$this->data['pagenum'];
        }
        if(empty($this->data['gdr_id']))
        {
            $this->response_error("gdr_id不能为空");
        }
        $gdr_id =$this->data['gdr_id'];
        if(empty($this->data['o_periods']))
        {
            $this->response_error("o_periods不能为空");
        }
        $o_periods = $this->data['o_periods'];
        if(!empty($this->data['type']))
        {
            $type = $this->data['type'];
        }
        else{
            $type=0;
        }
        if($type == 1){
            $where['m.m_id'] = $m_id;
        }elseif($type == 2){
            $where['o.o_state'] = 2;
        }
        if($gdr_id){
            $where['o.gdr_id'] = $gdr_id;
        }
        if($o_periods){
            $where['o.o_periods'] = $o_periods;
        }
        $where['o.o_paystate'] = ['gt',1];//已支付的
        $where['o.o_isdelete'] = ['lt',2];//未删除
        $order='o.o_id asc';
        $field='*';
        $limit = ($page * $size).','.$size;
        $orderpai = new OrderPaiService();
        $list = $orderpai->orderLimitList($where,$order,$field,$limit);
        if(!empty($list)) {
            foreach ($list as $k => $v) {
                $o_id = $v['o_id'];//订单id
                $m_avatar = PAI_URL."/static/image/index/pic_home_taplace@2x.png";//默认头像
                if (!empty($v['m_avatar'])) {
                    $list[$k]['m_avatar'] = CDN_URL . $v['m_avatar'];// 头像
                }
                // 抽奖码份数
                $list[$k]['gp_num'] = $orderpai->countPaiNum(['o_id' => $o_id]);
                //是否中拍的图片
                $o_state = $v['o_state'];
                if ($o_state == 2) {
                    $list[$k]['zhongpai_img'] = "<img src='".PAI_URL."'/static/image/orderpai/icon_zhongpai@2x.png' o_state = " . $o_id . '==' . $o_state . ">";
                } else {
                    $list[$k]['zhongpai_img'] = '';
                }
            }
        }
        $this->response_data($list);
    }
    //订单吖吖码列表
    public function paier_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $m_id =$this->data['member_id'];
        if(empty($this->data['o_id']))
        {
            $this->response_error("订单o_id不能为空");
        }
        $o_id =$this->data['o_id'];
        $orderAwardcode = new OrderAwardcodeService();
        $where['o_id'] = $o_id;
        $list = $orderAwardcode -> orderAwardcodeList($where);

        $m_name =$this->member_info['m_name'];
        $data=array();
        $data['list']=$list;
        $data['m_name']=$m_name;
        $this->response_data($data);
    }
    //我的订单列表
    public function my_order_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $m_id =$this->data['member_id'];
        if(empty($this->data['curpage'])){
            $page="1";
        }
        else{
            $page=$this->data['curpage'];
        }
        if(empty($this->data['pagenum'])){
            $size=10;
        }
        else{
            $size=$this->data['pagenum'];
        }
        if(empty($this->data['status'])){
            $status=0;
        }
        else{
            $status=$this->data['status'];
        }
       // 待支付订单保留时间
        $res = Db("config")->where(['c_code'=>'PO_UNPAID'])->find();
        $max_pay_time = 24;
        if(!empty($res1)){
            $max_pay_time = $res['c_value'];
        }
        $where['o.m_id'] = $m_id;
        $where['o.o_isdelete'] = ['lt',3];
        //订单状态
        switch ($status)
        {
            case 0:
                // 全部（我参拍的）
                $where['o.o_state'] = ['in','0,1,10'];
                break;
            case 1:
                // 待付款（我参拍的）
                $where['o.o_paystate'] = 1;
                //$where['o.o_addtime'] = ['gt',(time() - $max_pay_time * 60 * 60)];
                break;
            case 2:
                // 参拍中（我参拍的）
                $where['o.o_paystate'] = 2;
                $where['o.o_state'] = 1;
                break;
            case 3:
                // 未拍中（我参拍的）
                $where['o.o_state'] = 10;
                break;
            case 4:
                $where = '';
                $where = "o.m_id = " . $m_id . " and (( o.o_paystate = 4 and o.o_state = 10 and o.o_isdelete = 1 ) or ( o.o_isdelete = 2 ))";
                break;
            case 10:
                // 全部（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = ['between','2,5'];
                break;
            case 11:
                // 待发货（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = 2;
                break;
            case 12:
                // 待收货（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = 3;
                break;
            case 13:
                // 待评价（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = 4;
                break;
            case 14:
                // 退款/售后（我拍中的）
                $where['o.o_paystate'] = ['gt',2];
                break;
            case 15:
                // 已完成（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = 5;
                break;
            default:
                // 全部（我参拍的）
                break;
        }
        $orderPai = new OrderPaiService();
        $order='o.o_id desc';
        $field='o.o_id,o.store_id,o.o_money,o.o_paystate,o.o_state,o.gp_id,o.gp_num,o.o_addtime,o.o_paytime,o.o_totalmoney,o.gdr_id,o.o_periods,o.o_isdelete,o.o_gp_settlement_price,gp.gp_market_price,gp.g_id,
gp.gp_img,g.g_name,g.g_endtime,s.stroe_name,s.store_logo';
        $limit = (($page-1) * $size).','.$size;
        $list = $orderPai->get_order_detail_limit_list($where,$order,$field,$limit);
        $c=Db::table("pai_order_pai")->alias("o")->where($where)->count();
        $page_count=ceil($c/$size);
        if(empty($list)){
           $this->response_error("没有数据");
        }
        foreach($list as $k=>$v){
            $list[$k]['gp_img']=CDN_URL.$v['gp_img'];
            $list[$k]['store_logo']=CDN_URL.$v['store_logo'];
        }
        $pagelist=$this->app_page($page_count);
        $this->response_data($list,$pagelist);
    }

}
