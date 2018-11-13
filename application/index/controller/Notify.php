<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Config;
use think\Cache;
use think\Session;
use app\member\controller\MemberHome;
use app\data\service\recharge\RechargeService;
use think\log;

class Notify extends MemberHome
{
    //微信JSAPI支付
    public function wx_jsapi_pay(){
        require_once "../vendor/wxpay/lib/WxPay.Api.php";
        require_once "../vendor/wxpay/WxPay.JsApiPay.php";
        require_once "../vendor/wxpay/WxPay.Config.php";
        try{
            $r_id=input("r_id");
            if(empty($r_id)){
                $this->error("充值订单ID不能为空");
            }
            $recharge = new RechargeService();
            $where['r_id']=$r_id;
            $fields="r_id,r_money";
            $info=$recharge->get_info($where,$fields);
            if(empty($info)){
                $this->error("充值订单信息为空");
            }
            $o_id=$info['r_id']."-".rand(1,99999).time();
            $r_money=intval($info['r_money']*100);
            $tools = new \JsApiPay();
            $openId = $tools->GetOpenid();
            //②、统一下单
            $input = new \WxPayUnifiedOrder();
            $input->SetBody("拍吖吖");
            $input->SetAttach("充值");
            $input->SetOut_trade_no($o_id);
            $input->SetTotal_fee($r_money);
            $input->SetTime_start(date("YmdHis"));
            $input->SetTime_expire(date("YmdHis", time() + 6000));
            $input->SetGoods_tag("余额充值");
            $input->SetNotify_url("https://m.paiyy.com.cn/index/notify2/wx_jsapi_notify");
            $input->SetTrade_type("JSAPI");
            $input->SetOpenid($openId);
            $config = new \WxPayConfig();
            $order = \WxPayApi::unifiedOrder($config, $input);
//            echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
//            printf_info($order);
            $jsApiParameters = $tools->GetJsApiParameters($order);
            $this->assign('jsApiParameters',$jsApiParameters);
            $this->assign('o_id',$info['r_id']);
            return $this->fetch();

            //获取共享收货地址js函数参数
//            $editAddress = $tools->GetEditAddressParameters();
        } catch(Exception $e) {
//            Log::ERROR(json_encode($e));
        }

    }

    //添加充值订单
    public function addpayorder(){
        $m_id = $this->m_id;
        $r_money = input('post.r_money');
        $r_type = input('post.r_type');
        $r_for = input('post.r_for');
        $r_jump_type = input('r_jump_type') ? input('r_jump_type') : '0';
        $r_jump_id = input('r_jump_id') ? input('r_jump_id') : '0';
        $data = [
            'm_id'=>$m_id,
            'r_time'=>time(),
            'r_state'=>1,
            'r_type'=>$r_type,
            'r_money'=>$r_money,
            'r_type_code'=>$r_type,
            'r_for'=>$r_for,
            'r_jump_type'=>$r_jump_type,
            'r_jump_id'=>$r_jump_id,
        ];
        $r_type_code='';
        switch ($r_type){
            case 1:
                $r_type_code = 'wxpay';
                break;
            case 2:
                $r_type_code = 'wxh5pay';
                break;
            case 3:
                $r_type_code = 'alih5pay';
                break;
            case 4:
                $r_type_code = 'bankpay';
                break;
            case 5:
                $r_type_code = 'yuepay';
                break;
            case 6:
                $r_type_code = 'appwxpay';
                break;
            case 7:
                $r_type_code = 'appalipay';
                break;
            default:
                $r_type_code = 'wz';
                break;
        }
        if(!in_array($r_type,[1,2,3,4,5,6,7])){
            $return=array("status"=>'0',"msg"=>"请选择支付类型");
           echo json_encode($return);die;
        }
        if(!in_array($r_for,[1,2,3,4,5])){
            $return=array("status"=>'0',"msg"=>"请选择充值用途");
            echo json_encode($return);die;
        }
        if(!is_numeric($r_money) || $r_money <= 0){
            $return=array("status"=>'0',"msg"=>"充值金额为大于0的数字类型");
            echo json_encode($return);die;
        }
        $data['r_type_code']=$r_type_code;
        $recharge = new RechargeService();
        $o_id = $recharge->get_add_id($data);
        if(empty($o_id)){
            $return=array("status"=>'0',"msg"=>"充值订单生成失败");
            echo json_encode($return);die;
        }
        else{
            $return=array("status"=>'1',"msg"=>"充值订单生成成功","r_id"=>$o_id);
            echo json_encode($return);die;
        }
    }

}
