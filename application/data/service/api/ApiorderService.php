<?php

namespace app\data\service\api;
use app\data\model\api\ApiModel  as ApiModel;
use app\data\service\BaseService as BaseService;
use think\Cookie;
use think\Db;
use think\Request;
use think\image;


class ApiorderService extends BaseService
{
	protected $cache = 'api';
	public function __construct()
	{
		parent::__construct();
		$this->api = new ApiModel();
		$this->cache = 'api';
		
	}
    //读取商品库存，商品限购
    public function doget_goods_xg($gp_id){
        $table="goods";
        $sql="select gp.gp_stock stock,g.g_limited xgnum from pai_goods_product gp LEFT join pai_goods g ON gp.g_id=g.g_id where gp.gp_id=$gp_id ";
        $list=Db::table($table)->query($sql);
        $n=array();
       if(!empty($list[0])){
           $n=$list[0];
       }
        return $n;
    }
    //读取商品折扣信息
    public function doget_gdt($gp_id){
        $table="goods";
        $sql="select gp.gp_stock stock,g.g_limited xgnum from pai_goods_product gp LEFT join pai_goods g ON gp.g_id=g.g_id where gp.gp_id=$gp_id ";
        $list=Db::table($table)->query($sql);
        $n=array();
        if(!empty($list[0])){
            $n=$list[0];
        }
        return $n;
    }
    //根据省市区ID得到省市区名称
    public function getAddressNameById($id){
        $table="region";
        $sql="select count(region_name) as name from $table where region_id=$id";
        $list=Db::table($table)->query($sql);
        $name="未知";
        if(!empty($list[0]['name'])){
            $name=$list[0]['name'];
        }
        return $name;
    }
    //添加订单
    public function do_add_order($data){
        $return=array("status"=>'0',"msg"=>"操作失败");
        $table="order_pai";
        $o_sn=$this->createOrderSN();
        if(empty($data['m_id'])){
            $return=array("status"=>'0',"msg"=>"拍买用户ID不能为空");
            return $return;
        }
        $m_id=$data['m_id'];
        if(empty($data['store_id'])){
            $return=array("status"=>'0',"msg"=>"商品店铺ID不能为空");
            return $return;
        }
        $store_id=$data['store_id'];
        if(empty($data['o_money'])){
            $return=array("status"=>'0',"msg"=>"订单金额不能为空");
            return $return;
        }
        if(!empty($data['o_deliverfee'])){
            $o_deliverfee=$data['o_deliverfee'];
        }
        else{
            $o_deliverfee='0.00';
        }
        if(empty($data['gp_num'])){
            $return=array("status"=>'0',"msg"=>"购买数量不能为空");
            return $return;
        }
        $gp_num=$data['gp_num'];
        $o_money=sprintf("%.2f",$data['o_money']);
        $o_deliverfee=sprintf("%.2f",$o_deliverfee);
        $o_totalmoney=sprintf("%.2f",$o_money*$gp_num+$o_deliverfee);
        $o_paytype='3';
        $o_paystate='1';
        $o_state='1';
        $o_periods='0';
        if(empty($data['gp_id'])){
            $return=array("status"=>'0',"msg"=>" 商品gp_id不能为空");
            return $return;
        }
        $gp_id=$data['gp_id'];
        $o_addtime=time();
        $o_paytime=time();
        if(!empty($data['o_pid'])){
            $o_pid=$data['o_pid'];
        }
        else{
            $o_pid='0';
        }

        if(!empty($data['o_cid'])){
           $o_cid=$data['o_cid'];
        }
        else{
            $o_cid='0';
        }
        if(!empty($data['o_did'])){
          $o_did=$data['o_did'];
        }
        else{
            $o_did='0';
        }
        if(!empty($data['o_address'])){
            $o_address=$data['o_address'];
        }
        else{
            $o_address='';
        }
        if(!empty($data['o_receiver'])){
            $o_receiver=$data['o_receiver'];
        }
        else{
            $o_receiver='0';
        }
        if(!empty($data['o_mobile'])){
            $o_mobile=$data['o_mobile'];
        }
        else{
            $o_mobile='0';
        }
        if(!empty($data['o_addressid'])){
            $o_addressid=$data['o_addressid'];
        }
        else{
            $o_addressid='0';
        }
        $o_paymoney="0.00";
        $o_isdelete='1';
        if(empty($data['gdr_id'])){
            $return=array("status"=>'0',"msg"=>"商品折扣类型ID不能为空");
            return $return;
        }
        $gdr_id=$data['gdr_id'];
        if(empty($data['gs_id'])){
            $return=array("status"=>'0',"msg"=>"商品类型ID不能为空");
            return $return;
        }
        $gs_id=$data['gs_id'];

        $sql="INSERT INTO  pai_order_pai (o_sn,m_id,store_id,o_money,o_paytype,o_paystate,o_state,o_periods,gp_id,gp_num,o_addtime,o_paytime,o_pid,o_cid,o_did,o_address,o_receiver,o_mobile,o_addressid,o_paymoney,o_isdelete,gdr_id,gs_id,o_totalmoney,o_deliverfee) values($o_sn,$m_id,$store_id,$o_money,$o_paytype,$o_paystate,$o_state,$o_periods,$gp_id,$gp_num,$o_addtime,$o_paytime,$o_pid,$o_cid,$o_did,$o_address,$o_receiver,$o_mobile,$o_addressid,$o_paymoney,$o_isdelete,$gdr_id,$gs_id,$o_totalmoney,$o_deliverfee)";
        $i_data=array();
        $i_data['o_sn']=$o_sn;
        $i_data['m_id']=$m_id;
        $i_data['store_id']=$store_id;
        $i_data['o_money']=$o_money;
        $i_data['o_paytype']=$o_paytype;
        $i_data['o_paystate']=$o_paystate;
        $i_data['o_state']=$o_state;
        $i_data['o_periods']=$o_periods;
        $i_data['gp_id']=$gp_id;
        $i_data['gp_num']=$gp_num;
        $i_data['o_addtime']=$o_addtime;
        $i_data['o_paytime']=$o_paytime;
        $i_data['o_pid']=$o_pid;
        $i_data['o_cid']=$o_cid;
        $i_data['o_did']=$o_did;
        $i_data['o_address']=$o_address;
        $i_data['o_receiver']=$o_receiver;
        $i_data['o_mobile']=$o_mobile;
        $i_data['o_addressid']=$o_addressid;
        $i_data['o_paymoney']=$o_paymoney;
        $i_data['o_isdelete']=$o_isdelete;
        $i_data['gdr_id']=$gdr_id;
        $i_data['gs_id']=$gs_id;
        $i_data['o_totalmoney']=$o_totalmoney;
        $i_data['o_deliverfee']=$o_deliverfee;
        $res=Db::table('pai_order_pai')->insertGetId($i_data);
        if($res){
            $return=array("status"=>'1',"msg"=>"订单添加成功","data"=>$res);
            return $return;
        }
        else{
            $return=array("status"=>'0',"msg"=>"订单添加失败");
            return $return;
        }
    }
    //生成订单sn
    public function createOrderSN(){
        $o_sn="pai";
        $rand=rand(100000,99999);
        $time=time();
        $o_sn=$o_sn.$time.$rand;
        return $o_sn;
    }
    //得到用户购买该商品的数量
    public function doget_goods_ordernum($m_id,$gp_id){
        $table="goods";
        $sql="select sum(gp_num) as num from pai_order_pai where gp_id=$gp_id AND m_id=$m_id";
        $list=Db::table($table)->query($sql);
        $n="0";
        if(!empty($list[0]['num'])){
            $n=$list[0]['num'];
        }
        return $n;
    }
    //查询自己余额
    public function dogetMoney($m_id){
        $table="goods";
        $sql="select m_money  from pai_member where m_id=$m_id";
        $list=Db::table($table)->query($sql);
        $n="0.00";
        if(!empty($list[0]['m_money'])){
            $n=$list[0]['m_money'];
        }
        return $n;
    }
    //检查用户支付密码
    public function docheckpaypwd($m_id,$pwd){
        $table = "goods";
        $paypwd="'".md5($pwd)."'";
        $sql = "SELECT m_id FROM pai_member WHERE m_id=$m_id AND m_payment_pwd=$paypwd";
        $res = Db::table($table)->query($sql);
        if(!empty($res[0]['m_id'])){
            $return = array("status" => '1', "msg" => "密码正确");
            return $return;
        }
        else{
            $return = array("status" => '0', "msg" => "密码不正确");
            return $return;
        }
    }
    //判断用户是否设置了支付密码
    public function do_is_has_paypwd($m_id){
        $table = "goods";
        $sql = "SELECT m_payment_pwd FROM pai_member WHERE m_id=$m_id";
        $res = Db::table($table)->query($sql);
        if(!empty($res[0]['m_payment_pwd'])){
            $return = array("status" => '1', "msg" => "支付密码已经设置");
            return $return;
        }
        else{
            $return = array("status" => '0', "msg" => "没有设置支付密码");
            return $return;
        }
    }
    //余额支付
    public function do_pay($m_id,$o_id){
        // 启动事务
        Db::startTrans();
        try{
            $return = array("status" => '0', "msg" => "操作失败");
            $table = "goods";
            $sql_m="SELECT m_money from pai_member WHERE m_id=$m_id";
            $info_m=Db::table($table)->query($sql_m);
            if(empty($info_m[0]['m_money'])){
                Db::rollback();
                $return = array("status" => '0', "msg" => "用户信息不存在");
                return $return;
            }

            $sql_o="SELECT o_totalmoney from pai_order_pai WHERE o_id=$o_id";
            $info_o=Db::table($table)->query($sql_o);
            if(empty($info_o[0]['o_totalmoney'])){
                Db::rollback();
                $return = array("status" => '0', "msg" => "订单信息不存在");
                return $return;
            }
            $pay_money=$info_o[0]['o_totalmoney'];
            if($info_m[0]['m_money']<$pay_money){
                Db::rollback();
                $return = array("status" => '0', "msg" => "余额不足");
                return $return;
            }
            $sql = "UPDATE pai_member SET m_money=m_money-$pay_money WHERE m_id=$m_id";
            $res = Db::table($table)->execute($sql);
            if($res){
                //支付成功后处理订单后续
                $this->do_pay_success($o_id,$pay_money);
            }
            else{
                Db::rollback();
                $return = array("status" => '0', "msg" => "操作失败");
                return $return;
            }
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }

    }
    //支付成功后的操作
    public function do_pay_success($o_id,$o_paymoney)
    {
        //支付成功后 第一步修改订单状态-----------------------------------------------------------------------start
        $return = array("status" => '0', "msg" => "操作失败");
        $table = "goods";
        $sql_o = "select gdr_id,m_id,gp_num FROM pai_order_pai WHERE o_id=$o_id"; //读取当前订单信息
        $orderinfo_cur = Db::table($table)->query($sql_o);   //支付成功的订单信息
        if(empty($orderinfo_cur[0]['gdr_id'])){
            Db::rollback();
            $return = array("status" => '0', "msg" => "不存在的订单数据");
            return $return;
        }
        $gdr_id=$orderinfo_cur[0]['gdr_id'];  //当前支付订单的折扣id gdr_id
        $m_id=$orderinfo_cur[0]['m_id'];      //当前用户ID
        $gp_num=$orderinfo_cur[0]['gp_num']; //当前订单购买数量
        $o_paytype = '3';  //支付方法 0未选择 1微信 2支付宝 3余额支付
        $o_paystate = '2';  //支付状态1待付款，2已付款，3退款中，4退款完成
        $o_paytime = time();  //支付时间
        $sql = "select MAX(o_periods) as n,o_state FROM pai_order_pai WHERE  gdr_id=$gdr_id";
        $list = Db::table($table)->query($sql);
        $n = "1";
        $o_state = "1"; //订单状态1参拍中，2已中拍，3已发货，4已签收（待评价），5交易完成，10未中拍
        if (!empty($list[0]['n'])) {
            $n = $list[0]['n'];
        }
        if ($o_state != '1') {
            $o_periods = $n + 1;  //得到订单的期数
        } else {
            $o_periods = $n;    //得到订单的期数
        }
        //更新订单信息
        $sql2 = "UPDATE pai_order_pai SET o_paytype=$o_paytype,o_paystate=$o_paystate,o_paytime=$o_paytime,o_paymoney=$o_paymoney,o_periods=$o_periods WHERE o_id=$o_id";
        $res2 = Db::table($table)->execute($sql2);
        if (!$res2) {
            Db::rollback();
            $return = array("status" => '0', "msg" => "更新订单信息失败");
            return $return;
        }
        //支付成功后 第一步修改订单状态-----------------------------------------------------------------------end
        //支付成功后 第二步插入中奖码---------------------------------------------------------------------------------------------------start
        $oa_state = '1'; //状态1参拍中，2中奖，3未中奖，4废弃
        for($i = 0;$i < $gp_num;$i++) {
            $oa_num='0'; //该折扣该期数的最大中奖数字
            $sql3 = "select max(oa_number) as num FROM pai_order_awardcode WHERE gdr_id=$gdr_id AND o_periods=$o_periods";
            $list3 = Db::table($table)->query($sql3);
            if(!empty($list3[0]['num'])){
                $oa_num=$list3[0]['num']+1;
            }
            else{
                $oa_num='1';
            }
            $oa_code = "YYM-".$gdr_id."-".$o_periods."-".$m_id."-".$oa_num;  //  生成中奖码
            $sql4 = "INSERT INTO pai_order_awardcode (oa_code,oa_state,m_id,o_periods,o_id,oa_number) VALUES ($oa_code,$oa_state,$m_id,$o_periods,$o_id,$oa_num)";
            $res4 = Db::table($table)->execute($sql4);
            if (!$res4) {
                Db::rollback();
                $return = array("status" => '0', "msg" => "插入吖吖码失败");
                return $return;
            }
        }
        //支付成功后 第二步插入中奖码---------------------------------------------------------------------------------------------------end
        //支付成功后 第三步判断是否成团--------------------------------------------------------------------------------------------------------------------start
        $sql_gdr = "select gdr_membernum FROM pai_goods_dt_record WHERE gdr_id=$gdr_id";
        $gdrinfo = Db::table($table)->query($sql_gdr);
        if(empty($gdrinfo[0]['gdr_membernum'])){
            Db::rollback();
            $return = array("status" => '0', "msg" => "不存在的商品折扣数据");
            return $return;
        }
        $g_peoplenumber=$gdrinfo[0]['gdr_membernum'];//成团人数
        $sql5 = "select max(oa_number) as num,o_id FROM pai_order_awardcode WHERE  gdr_id=$gdr_id AND o_periods=$o_periods";
        $list5 = Db::table($table)->query($sql5);
        if(!empty($list5[0]['num'])){
            $now_num=$list5[0]['num']; //当前参团人数
            $last_o_id=$list3[0]['o_id']; //最后一个参团的订单ID
            if($now_num>=$g_peoplenumber){  //如果当前参团人数大于等于成团人数，则成团
                //设置中奖人
                $sql6 = "select o_paytime FROM pai_order_pai WHERE o_id=$last_o_id";
                $list6 = Db::table($table)->query($sql6);
                $ltime=$list6[0]['o_paytime'];  //得到最后支付时间
                $zjnum=($ltime%$now_num)+1;     //得到中奖号码
                $sql7 = "select o_id FROM pai_order_awardcode WHERE gdr_id=$gdr_id and o_periods=$o_periods and oa_number=$zjnum order by m_id asc limit 1";
                $list7 = Db::table($table)->query($sql7);
                if(empty($list7[0]['o_id'])){
                    Db::rollback();
                    $return = array("status" => '0', "msg" => "中奖码不存在");
                    return $return;
                }
                $zj_oid=$list7[0]['o_id'];   //中奖订单ID
                $sql8 = "UPDATE pai_order_pai SET o_state=2 WHERE o_id=$zj_oid";   //设置中奖订单ID中奖状态
                $res8 = Db::table($table)->execute($sql8);
                $sql8_gdr = "UPDATE pai_order_awardcode SET oa_state=2 WHERE o_id=$zj_oid  and oa_number=$zjnum ";   //设置中奖码订单的中奖状态
                $res8_gdr = Db::table($table)->execute($sql8_gdr);
                if (!$res8) {
                    Db::rollback();
                    $return = array("status" => '0', "msg" => "更新中奖状态失败");
                    return $return;
                }
                if (!$res8_gdr) {
                    Db::rollback();
                    $return = array("status" => '0', "msg" => "更新中奖码状态失败");
                    return $return;
                }
                $sql9 = "UPDATE pai_order_pai SET o_state=10 WHERE gdr_id=$gdr_id AND o_periods=$o_periods AND o_id<>$zj_oid";   //更新未中拍订单状态
                $res9 = Db::table($table)->execute($sql9);
                $sql9_gdr = "UPDATE pai_order_awardcode SET o_state=3 WHERE gdr_id=$gdr_id AND o_periods=$o_periods AND oa_number<>$zjnum";  //更新未中拍订单码订单状态
                $res9_gdr = Db::table($table)->execute($sql9_gdr);
                if (!$res9) {
                    Db::rollback();
                    $return = array("status" => '0', "msg" => "更新未中奖的失败");
                    return $return;
                }
                if (!$res9_gdr) {
                    Db::rollback();
                    $return = array("status" => '0', "msg" => "更新未中奖码的数据失败");
                    return $return;
                }
                //退未中奖款
                //看中奖人购买了几份，退没有中的份数
                $sql_zj_orderinfo= "SELECT gp_num,o_money,m_id FROM pai_order_pai WHERE  o_id=$zj_oid";  //中奖订单详情
                $zj_orderinfo= Db::table($table)->query($sql_zj_orderinfo);
                if ($zj_orderinfo) {
                    Db::rollback();
                    $return = array("status" => '0', "msg" => "中奖数据为空");
                    return $return;
                }
                $n_zj=0;
                if(!empty($zj_orderinfo[0]['gp_num'])){
                    $n_zj=$zj_orderinfo[0]['gp_num'];  //中奖订单的购买份数
                }
                if(!empty($zj_orderinfo[0]['m_id'])){
                    $zj_mid= $n_zj=$zj_orderinfo[0]['m_id'];  //中奖用户ID
                }
                if($n_zj>1){ //如果购买份数大于1，要退回没有中奖的份数
                    $n_zj_n=$n_zj-1; //退款的份数
                    $o_zj_money_tk=($zj_orderinfo[0]['o_money']*$n_zj_n)*0.95; //退款金额
                    $zj_peanut=($zj_orderinfo[0]['o_money']*$n_zj_n)*0.05;    //赠送花生数
                    $sql_zj_tk = "UPDATE pai_member SET o_money=o_money+$o_zj_money_tk,peanut=peanut+$zj_peanut WHERE m_id=".$zj_mid; //把金额和花生数退还给中奖用户
                    $res_zj_tk = Db::table($table)->execute($sql_zj_tk);
                    if(!$res_zj_tk){
                        Db::rollback();
                        $return = array("status" => '0', "msg" => "退未中奖人款项失败");
                        return $return;
                    }
                    //退款写入记录表开始--中奖人
                    $refund_time=time();
                    $refund_m_id=$zj_mid;
                    $refund_money= $o_zj_money_tk;
                    $refund_success_time=time();
                    $refund_state="8";
                    $refund_fromid=$zj_oid;
                    $sql_tk_log = "INSERT INTO pai_refund (refund_time,m_id,refund_money,refund_success_time,refund_state,refund_fromid) values($refund_time,$refund_m_id,$refund_money,$refund_success_time,$refund_state,$refund_fromid)";
                    $res_tk_log = Db::table($table)->execute($sql_tk_log);
                    if(!$res_tk_log){
                        Db::rollback();
                        $return = array("status" => '0', "msg" => "插入退款数据失败");
                        return $return;
                    }
                    //退款写入记录结束---中奖人
                    //退款写入金额记录表开始--中奖人
                    $ml_type="add";
                    $ml_reason="'"."未中拍退款"."'";
                    $ml_table="refund";
                    $ml_money= $refund_money;
                    $money_type="'"."余额"."'";
                    $nickname="";
                    $position="";
                    $member_type="";
                    $income_type="";
                    $withdraw_method="";
                    $card_number="";
                    $add_time=time();
                    $from_id=$zj_oid;
                    $ml_mid=$zj_mid;
                    $ml_state="8";
                    $ml_updatetime=time();
                    $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$add_time,$from_id,$ml_mid,$ml_state,$ml_updatetime)";
                    $res_money_log = Db::table($table)->execute($sql_moneylog);
                    if(!$res_money_log){
                        Db::rollback();
                        $return = array("status" => '0', "msg" => "插入金额日志失败");
                        return $return;
                    }
                    //退款写入金额记录结束---中奖人
                    //花生数据变化记录开始---中奖人
                    $pl_num= $zj_peanut;
                    $pl_time=time();
                    $pl_mid=$zj_mid;
                    $pl_state="8";
                    $pl_type="add";
                    $pl_fromid=$zj_oid;
                    $sql_peanut_log = "INSERT INTO pai_peanut_log (pl_num,pl_time,pl_mid,pl_state,pl_type,pl_fromid) values($pl_num,$pl_time,$pl_mid,$pl_state,$pl_type,$pl_fromid)";
                    $res_peanut_log = Db::table($table)->execute($sql_peanut_log);
                    if(!$res_peanut_log){
                        Db::rollback();
                        $return = array("status" => '0', "msg" => "插入花生数据失败");
                        return $return;
                    }
                    //花生数据变化记录结束---中奖人
                }
               //没有中奖的用户直接退款和送花生开始
                $sql_tk= "SELECT m_id,o_totalmoney,o_id FROM pai_order_pai WHERE gdr_id=$gdr_id AND o_periods=$o_periods AND o_id<>$zj_oid";
                $list_tk = Db::table($table)->query($sql_tk);
                if (empty($list_tk)) {
                    Db::rollback();
                    $return = array("status" => '0', "msg" => "中奖数据为空");
                    return $return;
                }
                foreach($list_tk as $k_tk=>$v_tk){
                    $o_money_tk=($v_tk['o_totalmoney'])*0.95;   //退款金额
                    $peanut=($v_tk['o_totalmoney'])*0.05;       //花生金额
                    $sql_tk = "UPDATE pai_member SET o_money=o_money+$o_money_tk,peanut=peanut+$peanut WHERE m_id=".$v_tk['m_id'];
                    $res_tk = Db::table($table)->execute($sql_tk);
                    if(!$res_tk){
                        Db::rollback();
                        $return = array("status" => '0', "msg" => "退未中奖人款项失败");
                        return $return;
                    }
                    //退款写入记录表开始
                    $refund_time=time();    //退款日期
                    $refund_m_id=$v_tk['m_id'];  //退款人
                    $refund_money= $o_money_tk;   //退款金额
                    $refund_success_time=time();  //退款成功日期
                    $refund_state="8";           //退款状态
                    $refund_fromid=$v_tk['o_id'];  //退款订单ID
                    $sql_tk_log = "INSERT INTO pai_refund (refund_time,m_id,refund_money,refund_success_time,refund_state,refund_fromid) values($refund_time,$refund_m_id,$refund_money,$refund_success_time,$refund_state,$refund_fromid)";
                    $res_tk_log = Db::table($table)->execute($sql_tk_log);
                    if(!$res_tk_log){
                        Db::rollback();
                        $return = array("status" => '0', "msg" => "插入退款数据失败");
                        return $return;
                    }
                    //退款写入记录表结束
                    //退款写入资金变动表开始
                    $ml_type="add";
                    $ml_reason="'"."未中拍退款"."'";
                    $ml_table="refund";
                    $ml_money= $refund_money;
                    $money_type="'"."余额"."'";
                    $nickname="";
                    $position="";
                    $member_type="";
                    $income_type="";
                    $withdraw_method="";
                    $card_number="";
                    $add_time=time();
                    $from_id=$v_tk['o_id'];
                    $ml_mid=$v_tk['m_id'];
                    $ml_state="8";
                    $ml_updatetime=time();
                    $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$add_time,$from_id,$m_id,$ml_state,$ml_updatetime)";
                    $res_money_log = Db::table($table)->execute($sql_moneylog);
                    if(!$res_money_log){
                        Db::rollback();
                        $return = array("status" => '0', "msg" => "插入金额数据失败");
                        return $return;
                    }
                    //退款写入资金变动表结束
                    //花生数据变化记录开始
                    $pl_num= $peanut;
                    $pl_time=time();
                    $pl_mid=$v_tk['m_id'];
                    $pl_state="8";
                    $pl_type="add";
                    $pl_fromid=$v_tk['o_id'];
                    $sql_peanut_log = "INSERT INTO pai_peanut_log (pl_num,pl_time,pl_mid,pl_state,pl_type,pl_fromid) values($pl_num,$pl_time,$pl_mid,$pl_state,$pl_type,$pl_fromid)";
                    $res_peanut_log = Db::table($table)->execute($sql_peanut_log);
                    if(!$res_peanut_log){
                        Db::rollback();
                        $return = array("status" => '0', "msg" => "插入花生数据失败");
                        return $return;
                    }
                    //花生数据变化记录结束
                }
                //退未中奖款结束
            }
        }
        //如果成团成功--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------end

        //自己加经验值---------------------------------------------------------------------------------------------------------------------start
        $experience=intval($o_paymoney);
        $sql10 = "UPDATE pai_member SET experience=experience+$experience WHERE m_id=$m_id";
        $res10 = Db::table($table)->execute($sql10);
        if (!$res10) {
            Db::rollback();
            $return = array("status" => '0', "msg" => "操作失败");
            return $return;
        }
        //自己加经验值---------------------------------------------------------------------------------------------------------------------end
        //用户等级-------------------------------------------------------------------------------------------------------------------------start
        $sql_minfo = "select m_levelid,experince from pai_member WHERE m_id=$m_id";
        $info_m= Db::table($table)->query($sql_minfo);
        if (empty($info_m[0])) {
            Db::rollback();
            $return = array("status" => '0', "msg" => "用户不存在");
            return $return;
        }
        $member_experince=$info_m[0]['experince'];
        $member_levelid=$info_m[0]['m_levelid'];
        $sql_levelinfo = "select ml_id from pai_member_level WHERE ml_tj1<=$member_experince AND ml_tj2>=$member_experince";
        $info_levelinfo= Db::table($table)->query($sql_levelinfo);
        if (empty($info_levelinfo[0])) {
            Db::rollback();
            $return = array("status" => '0', "msg" => "用户等级不存在");
            return $return;
        }
        if($info_levelinfo[0]['ml_id']!=$member_levelid){
            $sql_ulevelid = "UPDATE pai_member SET m_levelid=".$info_levelinfo[0]['ml_id']." WHERE m_id=$m_id";
            $res_ulevelid = Db::table($table)->execute($sql_ulevelid);
            if (!$res_ulevelid) {
                Db::rollback();
                $return = array("status" => '0', "msg" => "更改用户等级失败");
                return $return;
            }
        }
        //用户等级-------------------------------------------------------------------------------------------------------------------------end
        //上级提成
        $cur_m_levelid=$info_levelinfo[0]['ml_id'];
        $sql11 = "select tj_mid FROM pai_member WHERE m_id=$m_id";
        $list11 = Db::table($table)->query($sql11);
        //如果上级不为空
        if(!empty($list11[0]['tj_mid'])){
            $tj_mid=$list11[0]['tj_mid'];    //得到上级用户ID
            $sql12 = "select m_id,m_levelid,m_name FROM pai_member WHERE m_id=$tj_mid";
            $list12 = Db::table($table)->query($sql12);
            if(!empty($list12[0]['m_levelid'])){
                $levelid=$list12[0]['m_levelid'];   //用户等级ID
            }
            else{
                $levelid=1;   //用户等级ID
            }
            //如果当前用户等级小于上级等级
            if($cur_m_levelid<=$levelid)
            {
                //插入收益-----上级
                $i_time=time();
                $i_typeid='2';
                $i_mid=$tj_mid;
                $i_state='8';
                $i_reason="推荐会员参加拍品付款";
                $i_from_mid=$m_id;
                $i_from_id=$o_id;
                switch($levelid){
                    case '1':
                        $i_money=$o_paymoney*0.05*0.02;
                        $sql13 = "INSERT INTO pai_income (i_time,i_typeid,m_id,i_state,i_money,i_reason,i_from_mid,i_from_id) VALUES ($i_time,$i_typeid,$i_mid,$i_state,$i_money,$i_reason,$i_from_mid,$i_from_id)";
                        $res13 = Db::table($table)->execute($sql13);  //把收入插入收益表
                        if (!$res13) {
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "操作失败");
                            return $return;
                        }
                        $sql_income = "UPDATE pai_member SET experince=experince+1,m_income=m_income+$i_money WHERE m_id=$tj_mid";
                        $res_income = Db::table($table)->execute($sql_income); //更新用户收益
                        if (!$res_income) {
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                            return $return;
                        }
                        //更新上级提成资金日志表
                        $ml_type="add";
                        $ml_reason="下级参拍提成";
                        $ml_table="income";
                        $ml_money= $i_money;
                        $money_type="收益";
                        $nickname=$list12[0]['m_name'];
                        $position="";
                        $member_type="1";
                        $income_type="1";
                        $withdraw_method="";
                        $card_number="";
                        $ml_add_time=time();
                        $ml_from_id=$o_id;
                        $ml_mid=$tj_mid;
                        $ml_state="8";
                        $ml_updatetime=time();
                        $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$ml_add_time,$ml_from_id,$ml_mid,$ml_state,$ml_updatetime)";
                        $res_money_log = Db::table($table)->execute($sql_moneylog);
                        if(!$res_money_log){
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "插入金额失败");
                            return $return;
                        }
                        break;
                    case '2':
                        $i_money=$o_paymoney*0.05*0.1;
                        $sql13 = "INSERT INTO pai_income (i_time,i_typeid,m_id,i_state,i_money,i_reason,i_from_mid,i_from_id) VALUES ($i_time,$i_typeid,$i_mid,$i_state,$i_money,$i_reason,$i_from_mid,$i_from_id)";
                        $res13 = Db::table($table)->execute($sql13);
                        if (!$res13) {
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "操作失败");
                            return $return;
                        }
                        $sql_income = "UPDATE pai_member SET experince=experince+1,m_income=m_income+$i_money WHERE m_id=$tj_mid";
                        $res_income = Db::table($table)->execute($sql_income);
                        if (!$res_income) {
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                            return $return;
                        }
                        //如果推荐的用户升级为白银用户
                        if($info_levelinfo[0]['ml_id']=='2'&& $member_levelid=='1'){
                            $sql_income = "UPDATE pai_member SET experince=experince+5,m_income=m_income+50 WHERE m_id=$tj_mid";
                            $res_income = Db::table($table)->execute($sql_income);
                            if (!$res_income) {
                                Db::rollback();
                                $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                                return $return;
                            }
                        }
                        //收益记录到收益表
                        $ml_type="add";
                        $ml_reason="下级参拍提成";
                        $ml_table="income";
                        $ml_money= $i_money+50;
                        $money_type="收益";
                        $nickname=$list12[0]['m_name'];
                        $position="";
                        $member_type="1";
                        $income_type="1";
                        $withdraw_method="";
                        $card_number="";
                        $ml_add_time=time();
                        $ml_from_id=$o_id;
                        $ml_mid=$tj_mid;
                        $ml_state="8";
                        $ml_updatetime=time();
                        $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$add_time,$ml_from_id,$ml_mid,$ml_state,$ml_updatetime)";
                        $res_money_log = Db::table($table)->execute($sql_moneylog);
                        if(!$res_money_log){
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "插入金额失败");
                            return $return;
                        }
                        break;
                    case '3':
                        $i_money=$o_paymoney*0.05*0.02;
                        $sql13 = "INSERT INTO pai_income (i_time,i_typeid,m_id,i_state,i_money,i_reason,i_from_mid,i_from_id) VALUES ($i_time,$i_typeid,$i_mid,$i_state,$i_money,$i_reason,$i_from_mid,$i_from_id)";
                        $res13 = Db::table($table)->execute($sql13);
                        if (!$res13) {
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "操作失败");
                            return $return;
                        }
                        $sql_income = "UPDATE pai_member SET experince=experince+1,m_income=m_income+$i_money WHERE m_id=$tj_mid";
                        $res_income = Db::table($table)->execute($sql_income);
                        if (!$res_income) {
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                            return $return;
                        }
                        $get_income='0.00';
                        //如果推荐的用户升级为白银用户
                        if($info_levelinfo[0]['ml_id']=='2'&& $member_levelid=='1'){
                            $sql_income = "UPDATE pai_member SET experince=experince+5,m_income=m_income+50.00 WHERE m_id=$tj_mid";
                            $res_income = Db::table($table)->execute($sql_income);
                            if (!$res_income) {
                                Db::rollback();
                                $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                                return $return;
                            }
                            $get_income="50.00";
                        }
                        //如果推荐的用户升级为黄金用户
                        if($info_levelinfo[0]['ml_id']=='3'&& $member_levelid=='2'){
                            $sql_income = "UPDATE pai_member SET experince=experince+10,m_income=m_income+150.00 WHERE m_id=$tj_mid";
                            $res_income = Db::table($table)->execute($sql_income);
                            if (!$res_income) {
                                Db::rollback();
                                $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                                return $return;
                            }
                            $get_income="150.00";
                        }
                        $ml_type="add";
                        $ml_reason="下级参拍提成";
                        $ml_table="income";
                        $ml_money= $i_money+$get_income;
                        $money_type="收益";
                        $nickname=$list12[0]['m_name'];
                        $position="";
                        $member_type="1";
                        $income_type="1";
                        $withdraw_method="";
                        $card_number="";
                        $ml_add_time=time();
                        $ml_from_id=$o_id;
                        $ml_mid=$tj_mid;
                        $ml_state="8";
                        $ml_updatetime=time();
                        $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$ml_add_time,$ml_from_id,$ml_mid,$ml_state,$ml_updatetime)";
                        $res_money_log = Db::table($table)->execute($sql_moneylog);
                        if(!$res_money_log){
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "插入金额失败");
                            return $return;
                        }
                        break;
                    case '4':
                        $i_money=$o_paymoney*0.05*0.02;
                        $sql13 = "INSERT INTO pai_income (i_time,i_typeid,m_id,i_state,i_money,i_reason,i_from_mid,i_from_id) VALUES ($i_time,$i_typeid,$i_mid,$i_state,$i_money,$i_reason,$i_from_mid,$i_from_id)";
                        $res13 = Db::table($table)->execute($sql13);
                        if (!$res13) {
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "操作失败");
                            return $return;
                        }
                        $sql_income = "UPDATE pai_member SET experince=experince+1,m_income=m_income+$i_money WHERE m_id=$tj_mid";
                        $res_income = Db::table($table)->execute($sql_income);
                        if (!$res_income) {
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                            return $return;
                        }
                        //如果推荐的用户升级为白银用户
                        $get_income="0.00";
                        if($info_levelinfo[0]['ml_id']=='2'&& $member_levelid=='1'){
                            $sql_income = "UPDATE pai_member SET experince=experince+5,m_income=m_income+50.00 WHERE m_id=$tj_mid";
                            $res_income = Db::table($table)->execute($sql_income);
                            if (!$res_income) {
                                Db::rollback();
                                $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                                return $return;
                            }
                            $get_income="50.00";
                        }
                        //如果推荐的用户升级为黄金用户
                        if($info_levelinfo[0]['ml_id']=='3'&& $member_levelid=='2'){
                            $sql_income = "UPDATE pai_member SET experince=experince+10,m_income=m_income+150.00 WHERE m_id=$tj_mid";
                            $res_income = Db::table($table)->execute($sql_income);
                            if (!$res_income) {
                                Db::rollback();
                                $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                                return $return;
                            }
                            $get_income="150.00";
                        }
                        //如果推荐的用户升级为黑金用户
                        if($info_levelinfo[0]['ml_id']=='4'&& $member_levelid=='3'){
                            $sql_income = "UPDATE pai_member SET experince=experince+15,m_income=m_income+300 WHERE m_id=$tj_mid";
                            $res_income = Db::table($table)->execute($sql_income);
                            if (!$res_income) {
                                Db::rollback();
                                $return = array("status" => '0', "msg" => "更新用户收益和经验值");
                                return $return;
                            }
                            $get_income="300.00";
                        }
                        $ml_type="add";
                        $ml_reason="下级参拍提成";
                        $ml_table="income";
                        $ml_money= $i_money+$get_income;
                        $money_type="收益";
                        $nickname=$list12[0]['m_name'];
                        $position="";
                        $member_type="1";
                        $income_type="1";
                        $withdraw_method="";
                        $card_number="";
                        $ml_add_time=time();
                        $ml_from_id=$o_id;
                        $ml_mid=$v_tk['m_id'];
                        $ml_state="8";
                        $ml_updatetime=time();
                        $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$ml_add_time,$ml_from_id,$ml_mid,$ml_state,$ml_updatetime)";
                        $res_money_log = Db::table($table)->execute($sql_moneylog);
                        if(!res_tk_log){
                            Db::rollback();
                            $return = array("status" => '0', "msg" => "插入金额失败");
                            return $return;
                        }
                        break;
                    default:
                        break;
                }
            }

        }
        // 提交事务
        Db::commit();
    }
    //读取我的订单
    public function doget_pai_order_list($where,$fields,$order,$curpage='1',$pagenum='100'){
        $table="goods";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT ".$fields." FROM pai.pai_order_pai op LEFT JOIN pai.pai_goods_product gp ON op.gp_id=gp.gp_id LEFT JOIN pai.pai_goods g ON g.g_id=gp.g_id  LEFT JOIN pai.pai_store s ON op.store_id=s.store_id LEFT JOIN pai.pai_goods_dt_record gdr ON op.gdr_id=gdr.gdr_id LEFT JOIN pai.pai_goods_discounttype gdt ON gdr.gdr_id=gdr.gdr_id WHERE ".$where." ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        if(!empty($list)){
            foreach($list as $k3=>$v3){
                $list[$k3]['g_img']=$this->cdn_url.$v3['g_img'];
            }
        }
        return $list;
    }
    //读取我的订单数量
    public function doget_pai_order_count($where){
        $table="goods";
        $sql="SELECT count(op.o_id) as totalnum FROM pai.pai_order_pai op  WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $count=0;
        if(!empty($list[0]['totalnum'])){
            $count=$list[0]['totalnum'];
        }
        return $count;
    }
    //读取订单详情
    public function doget_pai_order_info($o_id,$fields){
        $table="goods";
        $sql="SELECT ".$fields." FROM pai.pai_order_pai op LEFT JOIN pai.pai_goods_product gp ON op.gp_id=gp.gp_id LEFT JOIN pai.pai_goods g ON g.g_id=gp.g_id  LEFT JOIN pai.pai_store s ON op.store_id=s.store_id LEFT JOIN pai.pai_goods_dt_record gdr ON op.gdr_id=gdr.gdr_id LEFT JOIN pai.pai_goods_discounttype gdt ON gdt.gdt_id=gdr.gdt_id  WHERE o_id=$o_id ";
        $list=Db::table($table)->query($sql);
        return $list[0];
    }
    //修改用户的支付密码
    public function do_edit_paypwd($m_id,$pwd){
        $table="member";
        $pwd="'".$pwd."'";
        $sql="update pai.pai_member set m_payment_pwd=$pwd where m_id=$m_id";
        $res=Db::table($table)->execute($sql);
        if(!$res){
          $return=array("status"=>'0',"msg"=>"支付密码设置失败");
        }
        else{
            $return=array("status"=>'1',"msg"=>"支付密码设置成功");
        }
        return $return;
    }
    //读取订单不同状态的数据
    public function doget_order_stateinfo($o_state,$gdr_id,$o_periods,$o_paystate,$o_id){
        $table="goods";
        $return_arr=array();
        if($o_state=='1'&&$o_paystate=='2') {
            $sql = "SELECT m.m_avatar,m.m_name FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id  WHERE  op.gdr_id=$gdr_id  AND op.o_periods=$o_periods AND op.o_paystate=2 order by op.o_addtime desc limit 1";
            $list = Db::table($table)->query($sql);


            $sql2="SELECT gdr_membernum FROM pai.pai_goods_dt_record gdr where gdr.gdr_id=$gdr_id";
            $list2=Db::table($table)->query($sql2);
            $ct_num=$list2[0]['gdr_membernum'];
            $sql3="SELECT COUNT(o_id) num from pai.pai_order_pai op where gdr_id=$gdr_id and op.o_periods=$o_periods and op.o_state=1 and op.o_paystate=2";
            $list3=Db::table($table)->query($sql3);
            $yj_num=$list3[0]['num'];
            $per=sprintf("%.2f", $yj_num/$ct_num)*100;

            $return_arr['statestr']="拍品揭晓中";
            $return_arr['statestr2']="当前进度".$per."%，达成目标后立即揭晓幸运儿";
            $return_arr['item']=$list[0];
            return $return_arr;
        }
        if($o_state=='1'&&$o_paystate=='1') {
            $sql = "SELECT o_addtime FROM pai.pai_order_pai where o_id=$o_id";
            $list = Db::table($table)->query($sql);
            $return_arr['statestr'] = "拍品等待付款";
            if (!empty($list[0]['o_addtime'])) {
                $return_arr['o_addtime'] = $list[0]['o_addtime'];
            }
            return $return_arr;
        }
        if($o_state=='11') {
            $return_arr['statestr']="订单已经关闭";
            $return_arr['statestr2']="该订单已超时并关闭";
            return $return_arr;
        }
        if($o_state=='10') {
            $sql = "SELECT m.m_avatar,m.m_name,oa.oa_code,op.o_paytime FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id LEFT JOIN pai.pai_order_awardcode oa ON oa.o_id=op.o_id  WHERE  op.gdr_id=$gdr_id  AND op.o_periods=$o_periods AND op.o_state=2 AND oa.oa_state=2";
            $list = Db::table($table)->query($sql);
            if (!empty($list[0]['m_avatar'])) {
                $list[0]['m_avatar'] =$this->cdn_url. $list[0]['m_avatar'];
                $return_arr['item']=$list[0];
            }
            $return_arr['statestr']="该订单没有中拍，已经退款";
            $return_arr['statestr2']="";
            return $return_arr;
        }
        if($o_state=='2') {
            $sql = "SELECT m.m_avatar,m.m_name,oa.oa_code,op.o_paytime FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id LEFT JOIN pai.pai_order_awardcode oa ON oa.o_id=op.o_id  WHERE  op.gdr_id=$gdr_id  AND op.o_periods=$o_periods AND op.o_state=2 AND oa.oa_state=2";
            $list = Db::table($table)->query($sql);
            if (!empty($list[0]['m_avatar'])) {
                $list[0]['m_avatar'] =$this->cdn_url. $list[0]['m_avatar'];
                $return_arr['item']=$list[0];
            }
            $return_arr['statestr']="恭喜您已经中拍";
            $return_arr['statestr2']="";
            return $return_arr;
        }
        if($o_state=='3') {
            $sql = "SELECT m.m_avatar,m.m_name,oa.oa_code,op.o_delivertime,op.o_express_corid,op.o_express_num,op.o_paytime FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id LEFT JOIN pai.pai_order_awardcode oa ON oa.o_id=op.o_id  WHERE  op.gdr_id=$gdr_id  AND op.o_periods=$o_periods AND op.o_state=2 AND oa.oa_state=2";
            $list = Db::table($table)->query($sql);
            if (!empty($list[0]['m_avatar'])) {
                $list[0]['m_avatar'] =$this->cdn_url. $list[0]['m_avatar'];
                $return_arr['item']=$list[0];
            }
            $return_arr['statestr']="你的订单已发货";
            $return_arr['statestr2']="";
            return $return_arr;
        }
        if($o_state=='5') {
            $sql = "SELECT m.m_avatar,m.m_name,oa.oa_code,op.o_express_corid,op.o_express_num,op.o_paytime FROM pai.pai_order_pai op LEFT JOIN pai.pai_member m ON op.m_id=m.m_id LEFT JOIN pai.pai_order_awardcode oa ON oa.o_id=op.o_id  WHERE  op.gdr_id=$gdr_id  AND op.o_periods=$o_periods AND op.o_state=2 AND oa.oa_state=2";
            $list = Db::table($table)->query($sql);
            if (!empty($list[0]['m_avatar'])) {
                $list[0]['m_avatar'] =$this->cdn_url. $list[0]['m_avatar'];
                $return_arr['item']=$list[0];
            }
            $return_arr['statestr']="您的订单已完成";
            $return_arr['statestr2']="";
            return $return_arr;
        }
    }







	
	
}