<?php
namespace app\member\controller;
use app\data\service\api\ApiincomeService;
use app\data\service\config\ConfigService;
use app\data\service\income\IncomeService;
use app\data\service\member\MemberAttestationService;
use app\data\service\member\MemberService;
use app\data\service\moneyLog\MoneyLogService;
use app\data\service\promoters\PromotersApplyService;
use app\data\service\promoters\PromotersFrozenService;
use app\data\service\recharge\RechargeService;
use app\data\service\sms\AliService;
use app\data\service\sms\SmsService;
use app\data\service\store\StoreService;
use think\Request;
use think\Validate;
use think\Db;
class Wallet extends MemberHome
{
    /**
     * @return mixed
     * 我的银行卡
     */
    public function bookCard(){
        $where=[
            'm_id'=>$this->m_id,
        ];
        $member_a = new MemberAttestationService();
        $card = $member_a->get_info($where,'real_name,identification,bankowner m_bankowner,bankname m_bankname,bankaccount m_bankaccount');
        if(!$card['m_bankname'] || !$card['m_bankaccount'] || !$card['m_bankowner']){
            $card = array();
        }else{
            $card['m_bankaccount'] = '**** **** **** '.substr($card['m_bankaccount'] ,-4,4);
        }
        $member = new MemberService();
        $m_mobile = $member->get_value($where,'m_mobile');
        $info['m_mobile2'] = $member->decrypt($m_mobile);
        $info['m_mobile'] = substr($info['m_mobile2'],0,3).'****'.substr($info['m_mobile2'],-4,4);
        $info['authentication'] = 0;
        if(!empty($info['real_name']) && !empty($info['identification'])){
            $info['authentication'] = 1;
        }
        $this->assign(['card'=>$card]);
        $this->assign('info',$info);
        $this->assign(['header_title'=>'我的银行卡']);
        return $this->fetch();
    }

    /*
    * 为实名认证绑定提现银行卡即实名认证
    */
    public function bindingCard(){
        $data = input('post.');
        $m_id = $this->m_id;
        $mem = new MemberService();
        $where = [
            'm_id'=>$m_id
        ];
        $memberAttestation = new MemberAttestationService();
        $info = $memberAttestation->get_info($where,'real_name,identification,bankowner,identification,bankaccount,bank_phone');
        if(!empty($info['bankowner']) && !empty($info['identification']) && !empty($info['bankaccount']) && !empty($info['bank_phone'])){
            $this->error('目前暂只支持绑定一张银行卡');
        }
        if(\request()->isPost()){
            if(empty($data['m_bankowner'])){
                return ['status'=>0,'msg'=>'开户人不能为空'];
            }
            if(empty($data['m_bankaccount'])){
                return ['status'=>0,'msg'=>'个人银行卡号不能为空'];
            }
            if(empty($data['m_identification'])){
                return ['status'=>0,'msg'=>'身份证号不能为空'];
            }
            if(empty($data['m_bank_phone'])){
                return ['status'=>0,'msg'=>'预留手机号不能为空'];
            }
            if(empty($data['m_bank_branch'])){
                return ['status'=>0,'msg'=>'请输入开户银行支行信息'];
            }
            if(empty($data['verification'])){
                return ['status'=>0,'msg'=>'验证码不能为空'];
            }
                Db::startTrans();
                try{
                    $sms = new SmsService();//此处检测短信验证是否正确
                    $res = $sms->checkSmsCode($data['verification'],$data['m_bank_phone']);
                    if($res['status']!=1){
                        return ['status'=>0,'msg'=>$res['msg']];
                    }
                    $AliService = new AliService();
                    //阿里接口验证银行卡
                    $return_list_ty = $AliService->bank_check($data['m_bankaccount'],$data['m_identification'],$data['m_bank_phone'],$data['m_bankowner']);
                    if($return_list_ty['status'] != 01){
                        return ['status'=>0,'msg'=>$return_list_ty['msg']];
                    }
                    $array = array(
                        'real_name'=>$return_list_ty['name'],
                        'm_bankowner'=>$return_list_ty['name'],
                        'm_bank_phone'=>$return_list_ty['mobile'],
                        'm_bankaccount'=>$return_list_ty['accountNo'],
                        'm_identification'=>$return_list_ty['idCard'],
                        'm_province'=>$return_list_ty['province'],
                        'm_city'=>$return_list_ty['city'],
                        'm_bankname'=>$return_list_ty['bank'],
                        'm_bank_branch'=>$data['m_bank_branch'],
                    );
                    $mem->get_save($where,$array);//修改pai_member表
                    $arr_atta = array(
                        'real_name'=>$return_list_ty['name'],
                        'identification'=>$return_list_ty['idCard'],
                        'bankowner'=>$return_list_ty['name'],
                        'bankname'=>$return_list_ty['bank'],
                        'bankaccount'=>$return_list_ty['accountNo'],
                        'bank_phone'=>$return_list_ty['mobile'],
                        'area'=>$return_list_ty['area'],
                        'province'=>$return_list_ty['province'],
                        'city'=>$return_list_ty['city'],
                        'prefecture'=>$return_list_ty['prefecture'],
                        'sex'=> $return_list_ty['sex'] == '男' ? 2 : 1,
                        'birthday'=>strtotime($return_list_ty[ 'birthday']),
                        'add_time'=>time(),
                        'bank_branch'=>$data['m_bank_branch'],
                    );
                    $is_null = $memberAttestation->get_count($where);
                    if(!$is_null){
                        $arr_atta['m_id'] = $m_id;
                        $memberAttestation->get_add($arr_atta);
                    }else{
                        $memberAttestation->get_save($where,$arr_atta);
                    }
                    Db::commit();
                    return ['status'=>1,'msg'=>'绑定银行卡成功'];
                }catch (\Exception $e){
                    Db::rollback();
                    $msg = $e ->getMessage();//错误信息
                    $arr = array(
                        'el_type_id'=>3,
                        'el_description'=>$msg,
                        'm_id'=>$m_id,
                        'el_time'=>time(),
                    );
                    Db('error_log')->insert($arr);//插入错误日志表
                    return ['status'=>0,'msg'=>'绑定银行卡失败'];
                }
        }
        $info['authentication'] = 0;
        if(!empty($info['real_name']) && !empty($info['identification'])){
            $info['authentication'] = 1;
        }
        $m_mobile = $mem->get_value($where,'m_mobile');
        $m_mobile = $mem->decrypt($m_mobile);
        $info['m_mobile'] = substr($m_mobile,0,3).'****'.substr($m_mobile,-4,4);
        $this->assign('info',$info);
        $this->assign('header_title','绑定银行卡');
        return view();
    }

    /**
     * 解绑银行卡
     * 邓赛赛
     */
    public function untie_bank_card(){
        $this->assign('header_title','解绑银行卡');
        return view();
    }
    /**
     * 检验验证码
     * 邓赛赛
     */
    public function checked_code(){
        $m_mobile = input('post.m_mobile');
        $verification = input('post.verification');
        $sms = new SmsService();
        $res = $sms->checkSmsCode($verification,$m_mobile);
        return $res;
    }

//    /**
//     * 绑定私人银行卡
//     * 邓赛赛
//     */
//    public function bindingCard(){
//        $m_id=$this->m_id;
//        $mem = new MemberService();
//        $info = $mem->get_info(['m_id'=>$m_id],'m_bankowner,m_bankname,m_bankaccount');
//        if(!empty($info['m_bankowner']) && !empty($info['m_bankname']) && !empty($info['m_bankaccount'])){      //真实姓名、银行卡、开户行全部不为空则不需更改信息
//            $this->success('sorry,目前暂时只支持绑定一张银行卡','wallet/index');
//        }
//        if(request()->isPost()){
//            $data['m_bankowner'] = input('post.m_bankowner');
//            $data['m_bankname'] = input('post.m_bankname');
//            $data['m_bankaccount'] = input('post.m_bankaccount');
//            $data['m_bank_phone'] = input('post.m_bank_phone');
//            $msg_code = input('post.msg_code');
//            $result = $this->validate($data,'CheckBindingCard');
//            if(true !== $result){
//                // 验证失败 输出错误信息
//                return ['status'=>0,'msg'=>$result];
//            }
//
//            $sms = new SmsService();                                //此处检测短信验证是否正确
//            $res = $sms->checkSmsCode($msg_code, $data['m_bank_phone']);
//            if($res['status']!=1){
//                return $res;
//            }
//
//            $data['edit_time'] = time();
//            $data['m_bankaccount'] = $this->display($data['m_bankaccount']);
//            $where = ['m_id'=>$this->m_id];
//            $res = $mem->memberSave($where,$data);
//
//            if($res){
//                return ['status'=>1,'msg'=>'设置成功'];
//            }else{
//                return ['status'=>2,'msg'=>'网络错误'];
//            }
//        }
//        $this->assign('header_title','绑定银行卡');
//        return view();
//    }

    /**
     * 发送验证码
     * 邓赛赛
     */
    public function send_msg(){
        $phone = input('post.m_mobile');
        if(empty(trim($phone))){
            return ['status'=>0,'msg'=>'手机号码不能为空'];
        }
        $sms = new SmsService();
        $info = $sms->smsSingleSender($phone);
        return $info;
    }

    /**
     * @return mixed
     * 我的钱包首页
     * 邓赛赛
     */
    public function index(){
//        $this->check_banding_card();
        $m_id = $this->m_id;
        $mem = new MemberService();
        $where = [
            'm_id'=>$m_id,
            'm_state'=>0
        ];
        $field='m_money,m_frozen_money,m_income,m_frozen_income,m_levelid';
        $money = $mem->get_info($where,$field);
        $money['m_money']           = sprintf("%.2f",$money['m_money']);
        $money['m_frozen_money']    = sprintf("%.2f",$money['m_frozen_money']);
        $money['m_income']          = sprintf("%.2f",$money['m_income']);
        $money['m_frozen_income']   = sprintf("%.2f",$money['m_frozen_income']);

        $startTime = strtotime(date("Y-m-d"))-86400;
        $endTime = strtotime(date("Y-m-d"))-1;
        $where2 = [
            'i_time'=>['between time',[$startTime,$endTime]],
            'm_id'  =>$m_id,
            'i_state'=>8,
            'i_type'=>'add'
        ];
        $income = new IncomeService();
        $last_money = $income->get_value($where2,'sum(i_money)');
        unset($where2['i_time']);
        $total_money = $income->get_value($where2,'sum(i_money)');


        $money['last_money']    = sprintf("%.2f",$last_money);
        $money['total_money']   = sprintf("%.2f",$total_money);

        // 交易所得(刘勇豪)
        $store = new StoreService();
        $where = array();
        $where['m_id'] = $m_id;

        $store_goodsmoney = 0.00;//交易所得
        $store_frozen_goodsmoney = 0.00;//提现中的金额
        $db_store_goodsmoney = $store ->get_value($where,'store_goodsmoney');
        if($db_store_goodsmoney){
            $store_goodsmoney = $db_store_goodsmoney;
        }
        $money['store_goodsmoney'] = sprintf("%.2f",$store_goodsmoney);
        $money['store_frozen_goodsmoney'] = sprintf("%.2f",$store_frozen_goodsmoney);
        switch ($money['m_levelid']){//上级等级
            case 2:
                $sjrate = 0.00015;
                break;
            case 3:
                $sjrate = 0.0002;
                break;
            case 4:
                $sjrate = 0.00035;
                break;
            default:
            case 1:
                $sjrate = 0.0001;
                break;
        }
        $money['rate'] = sprintf("%.2f",$sjrate*10000);
        $this->assign(['money'=>$money]);
        //是否为考核期推广员
        $where = [
            'm_id'=>$m_id,
            'is_promoters'=>4,
        ];
        $promoters_apply = new PromotersApplyService();
        $is_promoters_show = $promoters_apply->get_count($where);
        //是否显示考核期推广金额
        $is_promoters_show = $is_promoters_show ? 1 : 0;
        $promoters_info['is_show'] = $is_promoters_show;
        $promoters_info['money'] = 0;
        if($is_promoters_show){
            $promoters_frozen = new PromotersFrozenService();
            $where1 = [
                'm_id'=>$m_id,
                'state'=>1,
            ];
            $sum_money = $promoters_frozen->get_sum($where1,'p_money');
            $promoters_info['money'] = $sum_money;      //考核期冻结金额
        }
        $this->assign(['header_title'=>'我的钱包','promoters_info'=>$promoters_info]);
        $this->assign("header_path",'/member/myhome/index');
        return $this->fetch();
    }

    /**
     * 余额明细列表
     * 邓赛赛
     */
    public function surplus_book(){
        $money = new MoneyLogService();
        $ml_type    = input('param.ml_type');                           //add 收入  reduce支出
        $money_type = 1;                        //1余额 2收益
        $page = input('param.page') ? input('param.page') : 1;
        $page_size = input('param.page_size') ? input('param.page_size') : 10;
        $where=[
            'm_id'=>$this->m_id,
            'money_type'=>$money_type,
            'ml_type'=>$ml_type,
        ];
        if(!$ml_type){
            unset($where['ml_type']);
        }
        if(request()->isAjax()){
            $list = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
            return $list;
        }
        $list[0] = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
        $where['ml_type'] = 'add';
        $list[1] = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
        $where['ml_type'] = 'reduce';
        $list[2] = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
//        dump($list[0]);die;
        $this->assign(['list'=>$list]);
        $this->assign(['header_title'=>'余额明细']);
        return $this->fetch();
    }

    /**
     *邀请明细列表(预加载)
     * 邓赛赛
     */
    public function profit_book(){
        $m_id = $this->m_id;
        $money = new MoneyLogService();
        $money_type = 2;                        //1余额 2收益

        $page = input('param.page') ? input('param.page') : 1;
        $page_size = input('param.page_size') ? input('param.page_size') : 5;
        $where=[
            'm_id'=>$m_id,
            'money_type'=>$money_type,
        ];

        //收入
        $where['ml_type'] = 'add';
        $add_money = $money->sum_ml_money($where);
        $list['add'] = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
        //支出
        $where['ml_type'] = 'reduce';
        $reduce_monet = $money->sum_ml_money($where);
        $list['reduce'] = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);

        //全部
        unset($where['ml_type']);
        $list['all'] = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);

        $money = [
            'add_money'=>$add_money,
            'reduce_money'=>$reduce_monet,
        ];

        //是否为考核期推广员
        $where = [
            'm_id'=>$m_id,
            'is_promoters'=>4,
        ];
        $promoters_apply = new PromotersApplyService();
        $is_promoters_show = $promoters_apply->get_count($where);
        //是否显示考核期推广金额
        $is_promoters_show = $is_promoters_show ? 1 : 0;
        $promoters_info['is_show'] = $is_promoters_show;
        $promoters_info['money'] = 0;
        if($is_promoters_show){
            $promoters_info['end_time'] = $promoters_apply->get_value($where,'end_time');
            $promoters_frozen = new PromotersFrozenService();
            $where1 = [
                'm_id'=>$m_id,
                'state'=>1,
            ];
            $sum_money = $promoters_frozen->get_sum($where1,'p_money');
            $promoters_info['money'] = $sum_money;      //考核期冻结金额
        }
        $this->assign(['list'=>$list,'money'=>$money,'promoters_info'=>$promoters_info]);
        $this->assign(['header_title'=>'邀请明细']);
        return $this->fetch('wallet/profit_book');
    }

    /**
     *邀请明细列表(ajax请求)
     * 邓赛赛
     */
    public function ajax_profit_book(){
        if(\request()->isAjax()){
            $money = new MoneyLogService();
            $ml_type    = input('param.ml_type');                           //add 收入  reduce支出
            $money_type = 2;                        //1余额 2收益

            $page = input('param.page') ? input('param.page') : 1;
            $page_size = input('param.page_size') ? input('param.page_size') : 5;
            $income_type = input('param.income_type') ? input('param.income_type') : '';
            $where=[
                'm_id'=>$this->m_id,
                'money_type'=>$money_type,
                'ml_type'=>$ml_type,
            ];
            if(!$ml_type){
                unset($where['ml_type']);
            }

            $where['income_type'] = $income_type;                        //1推荐 2分润

            if(!$where['income_type']){
                unset($where['income_type']);
            }


            $list = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
        if($income_type == 0){
            $where['ml_type'] = 'add';
            $list['add_money'] = $money->sum_ml_money($where);
        }else if($income_type == 1){
            $where['income_type'] = 1;
            $list['add_money'] = $money->sum_ml_money($where);
        }else if($income_type == 2){
            $where['income_type'] = 2;
            $list['add_money'] = $money->sum_ml_money($where);
        }
            return $list;
        }
    }

    /**
     * 分类列表(钱包点击单条数据跳转不同分类的列表)
     * 邓赛赛
     */
    public function classification_list(){
        $status = input('param.status');
        return view();
    }
    /**
     * 余额单条明细详情
     * 邓赛赛
     */
    public function details(){
        $m_id = $this->m_id;
        $ml_id = input('param.ml_id');
        $money = new MoneyLogService();
        $where = [
            'm_id'=>$m_id,
            'ml_id'=>$ml_id,
        ];
        $info = $money->get_info($where,'ml_id,ml_money,ml_type,add_time,ml_id,ml_reason');
        $this->assign('info',$info);

        if($info['ml_type'] == 'reduce'){
            $this->assign('header_title','收入');
        }else if($info['ml_type'] == 'add'){
            $this->assign('header_title','收入');
        }else{
            $this->assign('header_title','');
        }
        return $this->fetch();
    }

    /**
     * @return mixed
     * 收益单条明细详情
     * 邓赛赛
     */
    public function profit_details(){
        $m_id = $this->m_id;
        $ml_id = input('param.ml_id');
        $money = new MoneyLogService();
        $where = [
            'm_id'=>$m_id,
            'ml_id'=>$ml_id,
        ];
        $info = $money->get_info($where,'ml_money,ml_type,add_time,ml_id,ml_reason,nickname,position,money_type,member_type');
        $this->assign('info',$info);
        if($info['ml_type'] == 'reduce'){
            $this->assign('header_title','收入');
        }else if($info['ml_type'] == 'add'){
            $this->assign('header_title','收入');
        }else{
            $this->assign('header_title','');
        }
        return $this->fetch();
    }
    /**
     * 提现操作
     * 邓赛赛
     */
    public function withdraw(){
        $mem = new MemberService();
        $m_id = $this->m_id;
        $where=[
            'm_id'=>$m_id
        ];


        //认证表银行卡信息
        $memberArticle = new MemberAttestationService();
        $core = $memberArticle->get_info($where,'bankname,bankaccount');
        //开始提现
        if(request()->isPost()){
            if(!$core['bankname'] || !$core['bankaccount']){
                $this->error('请先绑定银行卡');
            }
            $member = new MemberService();
            $where_jq = [
                'm_id'=>$m_id,
                'is_jq'=>1
            ];
            $is_jq = $member->get_count($where_jq);
            if($is_jq){
                return ['status'=>0,'msg'=>"此账号不可提现,请联系管理员",'data'=>''];
            }
            $data = [
                'frozen'        => trim(input('post.frozen')),
                'w_type'        => trim(input('post.w_type')),
                'm_payment_pwd' => trim(input('post.m_payment_pwd')),
                'is_urgent' => trim(input('post.is_urgent')),
            ];
            $res = $mem->withdraw_money($m_id,$data);
            return $res;
        }
        //银行卡、开户行、余额、收益
        $info = $mem->get_info($where,'m_money,m_income');
        $info['m_bankname']     = empty($core['bankname'])      ? '' : $core['bankname'];
        $info['m_bankaccount']  = empty($core['bankaccount']) ? '' : $core['bankaccount'];
        //1余额 2收益
        $info['w_type']=input('param.w_type');
        $info['m_bankaccount'] = substr($info['m_bankaccount'] ,-4,4);

        $config = new ConfigService();
        $info['fee1'] = $config ->configGetValue(['c_code'=>'DRAW_FEE1'],'c_value');
        $info['fee2'] = $config ->configGetValue(['c_code'=>'DRAW_FEE2'],'c_value');

        $this->assign(['info'=>$info]);
        $this->assign('header_title','支出');

        return $this->fetch();

    }

    /**
     * @return \think\response\View
     * 提现成功页面
     * 邓赛赛
     */
    public function withdraw_success(){
        $this->assign('date',date("Y-m-d H:i"));
        $this->assign('header_title','转出成功');

        return view();
    }

    /**
     * 使用说明(余额提现)
     * 邓赛赛
     */
    public function instructions(){
        $this->assign('header_title','余额提现说明');
        return view();
    }

    /**
     *充值页面
     * 邓赛赛
     */
    public function recharge(){
        $this->assign('header_title','拍吖吖充值');
        $m_id = $this->m_id;
        $sql="select m_money from pai.pai_member where m_id=$m_id";
        $list=Db::table("member")->query($sql);
        $info=$list[0];
        $this->assign("m_money",$info['m_money']);
        $r_jump_type = input('r_jump_type') ? input('r_jump_type') : '0';
        $r_jump_id = input('r_jump_id') ? input('r_jump_id') : '0';
        $this->assign("r_jump_type",$r_jump_type);
        $this->assign("r_jump_id",$r_jump_id);
        $this->assign("m_id",$m_id);
        return view();
    }

    /**
     * 微信充值
     * 邓赛赛
     */
    public function recharge_money(){
        $m_id = $this->m_id;
        $r_money = input('param.r_money');
        $r_type = input('param.r_type');
        $data = [
            'm_id'=>$m_id,
            'r_time'=>time(),
            'r_state'=>1,
            'r_type'=>$r_type,
            'r_money'=>$r_money,
            'r_type_code'=>$r_type,
        ];
        $r_type_code='';
        switch ($r_type){
            case 1:
                $r_type_code = 'alipay';
                break;
            case 2:
                $r_type_code = 'wxpay';
                break;
            case 3:
                $r_type_code = 'bankpay';
                break;
        }
        if(!in_array($r_type,[1,2,3])){
            return ['status'=>0,'msg'=>'请选择充值类型'];
        }
        if(!is_numeric($r_money) || $r_money <= 0){
            return ['status'=>2,'msg'=>'充值金额为大于0的数字类型'];
        }
        $data['r_type_code']=$r_type_code;
        $recharge = new RechargeService();
        $id = $recharge->get_add_id($data);
        return $id;
    }

    /**
     * @param int $r_id
     * @return \think\response\View
     * 充值成功页面
     * 邓赛赛
     */
    public function recharge_success(){
        $m_id = $this->m_id;
        $recharge = new RechargeService();
        $r_id=input('r_id');
        $where = [
            'r_id'=>$r_id,
            'm_id'=>$m_id
        ];
        $info = $recharge->get_info($where,'r_id,r_money,r_type,r_time,r_state,r_success_time,r_jump_type,r_jump_id');
        if(empty($info)){
            $this->error("支付信息不存在");
        }
        switch ($info['r_type']){
            case 1:
                $info['r_type_code'] = '微信公众号支付';
                break;
            case 2:
                $info['r_type_code'] = '微信H5支付';
                break;
            case 3:
                $info['r_type_code'] = '支付宝H5支付';
                break;
            case 4:
                $info['r_type_code'] = '银行卡支付';
                break;
            case 5:
                $info['r_type_code'] = '余额充值花生';
                break;
            default:
                $info['r_type_code'] = '未知';
                break;
        }
        $info['r_money'] = empty($info['r_money']) ? 0 : $info['r_money'];
        $info['r_time'] = empty($info['r_time']) ? '0' : $info['r_time'];
        $info['r_success_time'] = empty($info['r_success_time']) ? '0' : $info['r_success_time'];
        $info['r_state'] = empty($info['r_state']) ? '0' : $info['r_state'];
        $info['r_time'] = date("Y-m-d H:i",$info['r_time']);
        $info['r_success_time']=date("Y-m-d H:i",$info['r_success_time']);
        $this->assign('info',$info);
        $this->assign('header_title','充值详情');
        $jump_url="/member/wallet/index";
        if($info['r_jump_type']=='1'&&!empty($info['r_jump_id']))
        {
            $jump_url="/member/orderpai/index/o_id/".$info['r_jump_id'];
        }
        if($info['r_jump_type']=='2'&&!empty($info['r_jump_id']))
        {
            $jump_url="/member/store/deposit/g_id/".$info['r_jump_id'];
        }
        if($info['r_jump_type']=='3')
        {
            $jump_url="/member/myhome/peanut";
        }
        if($info['r_jump_type']=='4') //跳积分商品
        {
            $jump_url="/popularity/popularitygoods/commodity_info/pg_id/".$info['r_jump_id'];;
        }
        $this->assign('jump_url',$jump_url);
        $this->assign('header_path',$jump_url);
        return view();
    }

    //获取订单状态
    public function get_recharge_state(){
        $r_id=$_POST['r_id'];
        $recharge = new RechargeService();
        $where['r_id']=$r_id;
        $fields="r_id,r_state";
        $info=$recharge->get_info($where,$fields);
        if(empty($info)){
            $return=array("status"=>'0',"msg"=>"支付信息不存在");
            echo json_encode($return);die;
        }
        if($info['r_state']=='8'){
            $return=array("status"=>'1',"msg"=>"支付成功","r_id"=>$info['r_id']);
            echo json_encode($return);die;
        }
        else{
            $return=array("status"=>'0',"msg"=>"未支付");
            echo json_encode($return);die;
        }

    }

    /**
     * 动态获取交易收益列表
     * 刘勇豪
     * @return array
     */
    public function get_goodsmoney_log_list(){
        $page = input('param.page/d',1);
        $page_size = input('param.page_size/d',5);
        $sgml_type = input('param.sgml_type','');
        $m_id = $this->m_id;

        $store = new StoreService();
        $where['m_id'] = $m_id;
        $store_id = $store ->get_value($where,'store_id');


        $where = [];
        $where['sgml.sgml_store_id'] = $store_id;
        if($sgml_type == 'add' || $sgml_type == 'reduce'){
            $where['sgml.sgml_type'] = $sgml_type;
        }

        $order = "sgml.sgml_id desc";
        $field = "sgml.sgml_goodsmoney,sgml.sgml_addtime,sgml.sgml_type,sgml_reason,o.o_sn,o.store_id,m.m_name,m.m_avatar";
        $limit = ($page-1).",".$page_size;
        $list = $store->get_goodsmoney_log_list($where, $order, $field , $limit, $cache = 'store_goodsmoney_log');

        $status = 1;
        $msg = "ok";
        if(empty($list)){
            $status = 0;
            $msg = "empty data !";
        }

        // 总条数
        $where = [];
        $where['sgml_store_id'] = $store_id;
        if($sgml_type == 'add' || $sgml_type == 'reduce'){
            $where['sgml_type'] = $sgml_type;
        }
        $count = $store->count_goodsmoney_log($where);

        $return =  ['status'=>$status,'msg'=>$msg,'data'=>$list,'total_num'=>$count];
        return $return;
    }

    /**
     * 交易明细
     * 刘勇豪
     */
    public function goodsmoney_log(){

        return view();
    }

//    /**
//     * 检测是否绑定私人卡
//     * 邓赛赛
//     */
//    public function check_banding_card()
//    {
//        $m_id = $this->m_id;
//        $mem = new MemberService();
//        $where = [
//            'm_id'=>$m_id,
//            'm_state'=>0
//        ];
//        $field='m_bankowner,m_bankname,m_bankaccount,m_payment_pwd';
//        $info = $mem->get_info($where,$field);
//        if(empty($info['m_bankowner']) || empty($info['m_bankname']) || empty($info['m_bankaccount']) || empty($info['m_payment_pwd'])) {
//            $this->redirect('wallet/bindingCard');
//        }
//    }
    /**
     * 提现中列表
     * 邓赛赛
     */
    public function taking_money(){
        $this->assign('header_title','提现列表');
        return view();
    }
    /**
     * 提现中列表
     * 邓赛赛
     */
    public function taking_money_result(){
        $this->assign('header_title','提现进度');
        return view();
    }
}