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
use app\data\service\withdraw\WithdrawService;
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
        $m_id = $this->m_id;
        $where=[
            'm_id'=>$m_id,
        ];
        $member_a = new MemberAttestationService();

        //有时检测不出银行卡已绑定,此操作在重复保定成功是删除新的绑定 ( 无奈之举 0.0 )
        $sql = 'select id from pai_member_attestation m where (m.identification,m.bankaccount) in (select identification,bankaccount from pai_member_attestation where m_id = '.$m_id.' group by identification,bankaccount having count(*) > 1) order by m.id desc limit 1';
        $del_id = db::query($sql);
        if(!empty($del_id[0]) && !empty($del_id[0]['id'])){
            $where2 = [
                'id'=>$del_id[0]['id']
            ];
            $member_a->get_del($where2);
        }
        $card = $member_a->get_list($where,'id asc','id,real_name,status,identification,bankowner m_bankowner,bankname m_bankname,bankaccount m_bankaccount');

        //是否已经实名认证 1已实名 0未实名
        $info['authentication'] = 0;
        //绑定银行卡信息
        $bankcard_info = 0;
        $card_list = array();
        foreach($card as $k => $v){
            if($v['m_bankname'] && $v['m_bankaccount'] && $v['m_bankowner'] && $v['status']){
                $v['m_bankaccount'] = '**** **** **** '.substr($v['m_bankaccount'] ,-4,4);
                $card_list[] = $v;
                $bankcard_info = 1;
            }
           //是否已经实名认证
            if(!empty($v['real_name']) && !empty($v['identification'])){
                $info['authentication'] = 1;
            }
        }

        //用户手机号
        $member = new MemberService();
        $m_mobile = $member->get_value($where,'m_mobile');
        $info['m_mobile2'] = $member->decrypt($m_mobile);
        $info['m_mobile'] = substr($info['m_mobile2'],0,3).'****'.substr($info['m_mobile2'],-4,4);
        $this->assign(['data'=>$card_list]);
        $this->assign(['bankcard_info'=>$bankcard_info]);
        $this->assign('info',$info);
        $this->assign(['header_title'=>'我的银行卡']);

        return $this->fetch();
    }

    /*
    * 为实名认证绑定提现银行卡即实名认证
     * 邓赛赛
    */
    public function bindingCard(){
        $data = input('post.');
        $m_id = $this->m_id;
        $mem = new MemberService();
        $where = [
            'm_id'=>$m_id
        ];
        $memberAttestation = new MemberAttestationService();
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
//            if(empty($data['m_bank_phone'])){
//                return ['status'=>0,'msg'=>'预留手机号不能为空'];
//            }
            if(empty($data['m_bank_branch'])){
                return ['status'=>0,'msg'=>'请输入开户银行支行信息'];
            }
//            if(empty($data['verification'])){
//                return ['status'=>0,'msg'=>'验证码不能为空'];
//            }
            //此身份证已有多少用户认证
            $num = $memberAttestation->get_id_count($data['m_identification']);
            if($num >= 5){
                return ['status'=>0,'msg'=>'每个身份证最多只可认证五个账号哦'];
            }

            //单个用户不可重复绑定银行卡
            $where1 = [
                'm_id'=>$m_id,
                'bankaccount'=>trim($data['m_bankaccount']),
                'status'=>1
            ];
            $is_existence = $memberAttestation->get_count($where1);
            if($is_existence){
                return ['status'=>0,'msg'=>'银行卡不可重复绑定哦'];
            }
            Db::startTrans();
            try{
//                $sms = new SmsService();//此处检测短信验证是否正确
//                $res = $sms->checkSmsCode($data['verification'],$data['m_bank_phone']);
//                if($res['status']!=1){
//                    return ['status'=>0,'msg'=>$res['msg']];
//                }
                $AliService = new AliService();

                //阿里接口验证银行卡(四要素)
                //$return_list_ty = $AliService->bank_check($data['m_bankaccount'],$data['m_identification'],$data['m_bank_phone'],$data['m_bankowner']);
                //阿里接口验证银行卡(三要素)
                $return_list_ty = $AliService->san_bank_check($data['m_bankaccount'],$data['m_identification'],$data['m_bankowner']);

                if($return_list_ty['status'] != 01){
                    return ['status'=>0,'msg'=>$return_list_ty['msg']];
                }

                //此银行卡是否为解绑的银行卡
                $where3 = [
                    'm_id'=>$m_id,
                    'bankaccount'=>trim($return_list_ty['accountNo']),
                    'status'=>0
                ];
                $is_c = $memberAttestation->get_value($where3,'id');
                if($is_c){
                    $memberAttestation->get_save($where3,['status'=>1,'bank_branch'=>$data['m_bank_branch']]);
                }else{
                    //非解绑银行
                    $arr_atta = array(
                        'real_name'     =>$return_list_ty['name'],
                        'identification'=>$return_list_ty['idCard'],
                        'bankowner'     =>$return_list_ty['name'],
                        'bankname'      =>$return_list_ty['bank'],
                        'bankaccount'   =>$return_list_ty['accountNo'],
//                        'bank_phone'    =>$data['m_bank_phone'],
                        'area'          =>$return_list_ty['area'],
                        'province'      =>$return_list_ty['province'],
                        'city'          =>$return_list_ty['city'],
                        'prefecture'    =>$return_list_ty['prefecture'],
                        'sex'           => $return_list_ty['sex'] == '男' ? 2 : 1,
                        'birthday'      =>strtotime($return_list_ty[ 'birthday']),
                        'add_time'      =>time(),
                        'bank_branch'   =>$data['m_bank_branch'],
                    );
                    //查找此用户是否有默认绑定卡
                    $where4 = [
                        'm_id'=>$m_id,
                        'm_main_card'=>1
                    ];
                    $card_info = $memberAttestation->get_info($where4,'id,status,m_main_card');
                    $arr_atta['m_main_card'] = 0;
                    //有默认值时
                    if($card_info){
                        //此卡已解绑
                        if(empty($card_info['status'])){
                            $where5 = [
                                'id'=>$card_info['id']
                            ];
                            //先去除默认值
                            $memberAttestation->get_save($where5,['m_main_card'=>0]);
                            //设为默认卡
                            $arr_atta['m_main_card'] = 1;
                        }
                    }else{
                        //设为默认卡
                        $arr_atta['m_main_card'] = 1;
                    }
                    //检测是否有认证但未绑定银行卡
                    $where2 = [
                        'm_id'=>$m_id,
                        'w_classification'=>1,
                        'bankaccount'=>''
                    ];
                    $id = $memberAttestation->get_value($where2,'id');
                    if(!$id){
                        $arr_atta['m_id'] = $m_id;
                        $memberAttestation->get_add($arr_atta);
                    }else{
                        $where = [
                            'id'=>$id
                        ];
                        $memberAttestation->get_save($where,$arr_atta);
                    }
                }

                //有时检测不出银行卡已绑定,此操作在重复保定成功是删除新的绑定 ( 无奈之举 0.0 )
                $sql = 'select id from pai_member_attestation m where (m.identification,m.bankaccount) in (select identification,bankaccount from pai_member_attestation where m_id = '.$m_id.' group by identification,bankaccount having count(*) > 1) order by m.id desc limit 1';
                $id = db::query($sql);
                if(!empty($id[0]) && !empty($id[0]['id'])){
                    $where2 = [
                        'id'=>$id[0]['id']
                    ];
                    $memberAttestation->get_del($where2);
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
        $info = $memberAttestation->get_info($where,'real_name,identification,bankowner,identification,bankaccount,bank_phone');
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
        $m_id = $this->m_id;
        $id = input('param.id','');
        if(\request()->isAjax()){
            $id = trim($id,',');
            $id_arr = explode(',',$id);
            $moren_card = 0; //默认绑定
             $is_success = 0; //绑定是否成功
            foreach($id_arr as $v){
                $where = [
                    'm_id'=>$m_id,
                    'id'=>$v,
                    'status'=>1,
                ];
                $card = Db::table('pai_member_attestation')->where($where)->field('id,status,m_main_card')->find();
                if(!empty($card['status'])) {
                    $where = [
                        'id'=>$v
                    ];
                    $res = Db::table('pai_member_attestation')->where($where)->update(['status' => 0]);
                    if($res){
                        $is_success = 1;
                        //取消了默认绑定银行卡
                        if ($card['m_main_card']) {
                            $moren_card = $v;
                        }

                    }
                }
            }
            //解绑的银行卡中如果有默认银行卡
            if($moren_card){
                $where = [
                    'm_id'=>$m_id,
                    'status'=>1,
                ];
                //查找剩余认证信息
                $ac_id = Db::table('pai_member_attestation')->where($where)->order('id asc')->value('id');
                if($ac_id){
                    $where = [
                        'id'=>$ac_id,
                    ];
                    //添加新默认值
                    Db::table('pai_member_attestation')->where($where)->update(['m_main_card' => 1]);
                    //就默认值去除
                    $where = [
                        'id'=>$moren_card,
                    ];
                    Db::table('pai_member_attestation')->where($where)->update(['m_main_card' => 0]);
                }
            }

            if($is_success){
                  return ['status'=>1,'msg'=>'解绑成功'];
            }else{
                return ['status'=>0,'msg'=>'解绑失败'];
            }
        }
        $where = [
            'status' => 1,
            'm_id'  =>$m_id
        ];

        $member_attestation = new MemberAttestationService();
        $list = $member_attestation->get_list($where,'id asc','id,bankname,bankaccount');

        $bankcard_info = empty($list) ? 0 : 1;
        $this->assign(['bankcard_info'=>$bankcard_info]);
        $this->assign('data',$list);
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
        $m_id = $this->m_id;
        $mem = new MemberService();
        $where = [
            'm_id'=>$m_id,
            'm_state'=>0
        ];
        $field='m_money,m_mobile,m_frozen_money,m_income,m_frozen_income,m_levelid,m_code';
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
        //无二维码时，生成新二维码
        if(empty($money['m_code']) || !is_file(trim($money['m_code'],'/')) ){
            $money['m_code'] = $mem->new_code(['m_id'=>$m_id]); //检测是否有二维码,无时生成新的二维码
        }
        //按钮分享链接
        $m_mobile = $promoters_apply->decrypt($money['m_mobile']);
        $info['share_link'] = 'https://m.paiyy.com.cn/member/register/it_to_rg/phone/'.$m_mobile;
        $info['m_code'] = $money['m_code'];
        $this->assign("info",$info);

        $this->assign(['header_title'=>'我的钱包','promoters_info'=>$promoters_info]);
        $this->assign("header_path",'/member/myhome/index');


        //分享参数
        $this->assign('share_title','邀您入驻拍吖吖，享大福利！');
        $this->assign('share_desc','新人注册立得10元现金！各种折扣尽在拍吖吖，快来抢购吧！');
        $this->assign('share_link',PAI_URL.'/member/register/it_to_rg/phone/'.$m_mobile);
        $this->assign('share_imgUrl',PAI_URL.'/uploads/logo/new_10.png');

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
        $this->assign(['header_title'=>'收益明细']);
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

        //开始提现
        if(request()->isPost()){
            $id = trim(input('post.id',''));
            $where=[
                'm_id'=>$m_id,
                'status'=>1,
                'id'=>$id
            ];
            //认证表银行卡信息
            $is_core = Db::table('pai_member_attestation')->where($where)->count();
            if(!$is_core){
                return ['status'=>0,'msg'=>"非法请求,未找到您的银行卡信息"];
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
            //提现传参开始
            $data = [
                'frozen'        => trim(input('post.frozen')),
                'w_type'        => trim(input('post.w_type')),
                'm_payment_pwd' => trim(input('post.m_payment_pwd')),
                'is_urgent'     => trim(input('post.is_urgent')),
                'id'            => $id,
            ];
            $res = $mem->withdraw_money($m_id,$data);
            return $res;
        }
        $where = [
            'm_id'=>$m_id
        ];
        //银行卡、开户行、余额、收益
        $info = $mem->get_info($where,'m_money,m_income');
        //1余额 2收益
        $info['w_type']=input('param.w_type');
        $where=[
            'm_id'=>$m_id,
            'status'=>1,
        ];
        //认证表银行卡信息
        $core = Db::table('pai_member_attestation')->where($where)->field('id,bankname,bankaccount,m_main_card')->select();
        //绑定银行卡默认为空
        $info['m_bankname']     = '';
        $info['m_bankaccount']  = '';
        //有绑定银行卡是循环赋值
        foreach($core as $k => $v){
            $m_bankname     = empty($v['bankname'])         ? '' : $v['bankname'];
            $m_bankaccount  = empty($v['bankaccount'])      ? '' : $v['bankaccount'];
            $m_bankaccount  = substr($m_bankaccount ,-4,4);
            //默认提现卡
            if($v['m_main_card'] == 1){
                $info['id']             = $v['id'];
                $info['m_bankname']     = $m_bankname;
                $info['m_bankaccount']  = $m_bankaccount;
                $info['m_main_card']  = $v['m_main_card'];
            }
            //可提现银行卡列表
            $core[$k] = [
                'id'            =>$v['id'],
                'bankname'      =>$m_bankname,
                'm_bankaccount' =>$m_bankaccount,
                'm_main_card'   =>$v['m_main_card'],
            ];
        }

        $config = new ConfigService();
        $info['fee1'] = $config ->configGetValue(['c_code'=>'DRAW_FEE1'],'c_value');
        $info['fee2'] = $config ->configGetValue(['c_code'=>'DRAW_FEE2'],'c_value');
        $this->assign(['info'=>$info]);
        $this->assign(['core'=>$core]);
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
            case '6':
                $info['r_type_code'] ="微信APP支付";
                break;
            case '7':
                $info['r_type_code'] ="支付宝APP支付";
                break;
            default:
                $info['r_type_code'] = '移动支付';
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
        $page = input('param.page',1);
        $size = input('param.size',10);
        $m_id = $this->m_id;
        if(\request()->isAjax()){
            $withdraw = new WithdrawService();
            $where = [
                'w_mid'=>$m_id,
                'w_state'=>['in','0,1,2,4'],
            ];
            //提现列表
            $list =  $withdraw->get_withdraw_limit($where,'w.w_id desc','w.w_id,w.w_time,w.w_money,w.w_state,w.ac_id,ma.bankname,ma.w_classification',$page,$size);
            //找用户在认证表里面的银行卡名称
            foreach($list as $k => &$v){
                //提现到银行卡且有认证id的
                if(!empty($v['ac_id']) && $v['w_classification'] == 1){
                    $v['bankname'] = $v['bankname'].'提现';
                }else{
                    $v['bankname'] = '提现';
                }
                $v['w_time'] = date('m-d H:i',$v['w_time']);
                switch($v['w_state']){
                    case 1:
                    $v['s_state_name'] = '平台处理中';
                    break;case 2:
                    case 4:
                        $v['s_state_name'] = '提现失败';
                        break;
                    default:
                        $v['s_state_name'] = '成功提交申请';
                        break;
                }
                unset($v['w_classification']);
            }
            return ['status'=>1,'msg'=>'ok','data'=>$list];
        }

        $this->assign('header_title','提现中列表');
        return view();
    }

    /**
     * 取消申请提现
     * 邓赛赛
     */
    public function cancel_money(){
            $m_id = $this->m_id;
            $w_id = input('param.w_id','');
            $where = [
                'w_mid'=>$m_id,
                'w_id'=>$w_id,
                'w_state'=>0
            ];
            $withdraw = new WithdrawService();
            $w_money = $withdraw->get_value($where,'w_money');
            if(!$w_money){
                $this->error('非法请求');
            }
            $w_id = $withdraw->get_value($where,'w_id');
            Db::startTrans();
            try{
                //提现状态变为5
                $where = [
                    'w_id'=>$w_id,
                ];
                $withdraw->get_save($where,['w_state'=>5]);
                $where = [
                    'm_id'=>$m_id
                ];
                //余额表动
                Db::table('pai_member')->where($where)->setInc('m_money',$w_money);
                Db::table('pai_member')->where($where)->setDec('m_frozen_money',$w_money);
                //冻结表减少
                $f_money = Db::table('pai_frozen')->where('m_id',$m_id)->order('f_id desc')->value('f_money');
                $frozen_data =  [
                    'f_type'=>'reduce',
                    'f_money'=>$f_money-$w_money,
                    'f_typeid'=>2,
                    'f_time'=>time(),
                    'f_from_id'=>$w_id,
                    'm_id'=>$m_id,
                ];
                Db::table('pai_frozen')->insert($frozen_data);
                $data = [
                    'ml_type'=>'add',
                    'ml_reason'=>'取消提现',
                    'ml_table'=>1,
                    'ml_money'=>$w_money,
                    'money_type'=>1,
                    'add_time'=>time(),
                    'from_id'=>$w_id,
                    'm_id'=>$m_id,
                    'state'=>8,
                ];
                Db::table('pai_money_log')->insert($data);
                // 提交事务
                Db::commit();
                $data = ['status'=>1,'msg'=>'ok'];
                $this->assign('data',$data);
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                $data = [
                    'el_type_id'=>7,
                    'el_description'=>date('Y-m-d H:i:s').'取消提现错误:'.$e->getMessage(),
                    'm_id'=>$m_id,
                    'el_time'=>time()
                ];
                Db::table('pai_error_log')->insert($data);
                $data = ['status'=>0,'msg'=>'未知错误'];
                $this->assign('data',$data);
            }
        $this->assign('header_title','取消成功');
        return view();
    }
    /**
     * 重新提交
     * 邓赛赛
     */
    public function resubmit_Apply(){
            $m_id = $this->m_id;
            $w_id = input('param.w_id','');
            $bank_branch = input('param.bank_branch','');
            $where = [
                'w_mid'=>$m_id,
                'w_id'=>$w_id,
                'w_state'=>4,                      //财务驳回
                'w_explain'=>'持卡人开户支行错误' //必须是选择开户行错误的
            ];
            $withdraw = new WithdrawService();
            $info = $withdraw->get_info($where,'*');
            if(!$info){
                $data = ['status'=>0,'msg'=>'非法请求'];
            }
            $where = [
                'm_id'=>$m_id
            ];

            $m_money = Db::table('pai_member')->where($where)->value('m_money');
            if($m_money < $info['w_money']){
                $data = ['status'=>2,'msg'=>'余额不足'];
            }
            //必须传来开户支行
            if(!$bank_branch){
                $data = ['status'=>3,'msg'=>'请填写开户支行'];
            }
            //认证信息ID
            if(empty($info['ac_id'])){
                $data = ['status'=>4,'msg'=>'未找到认证信息'];
            }
            if(!empty($data)){
                $this->error($data['msg']);
            }
            Db::startTrans();
            try{
                $money = $info['w_money'];
                $where = [
                    'w_id'=>$w_id,
                ];
                //填表
                $withdraw->get_save($where,['w_state'=>0]);
                //余额减少
                $where = [
                    'm_id'=>$m_id
                ];
                Db::table('pai_member')->where($where)->setDec('m_money',$money);
                Db::table('pai_member')->where($where)->setInc('m_frozen_money',$money);
                $where = [
                    'w_id'=>$w_id
                ];
                $withdraw->get_save($where,['w_state'=>0]);
                //冻结表增加
                $f_money = Db::table('pai_frozen')->where('m_id',$m_id)->order('f_id desc')->value('f_money');
                $frozen_data =  [
                    'f_type'=>'add',
                    'f_money'=>$f_money+$money,
                    'f_typeid'=>1,
                    'f_time'=>time(),
                    'f_from_id'=>$w_id,
                    'm_id'=>$m_id,
                ];
                Db::table('pai_frozen')->insert($frozen_data);
                //修改此认证信息的开户行
                $where = [
                    'id'=>$info['ac_id']
                ];
                Db::table('pai_member_attestation')->where($where)->update(['bank_branch'=>$bank_branch]);
                $data = [
                    'ml_type'=>'reduce',
                    'ml_reason'=>'重新提交申请提现',
                    'ml_table'=>1,
                    'ml_money'=>$money,
                    'money_type'=>1,
                    'add_time'=>time(),
                    'from_id'=>$w_id,
                    'm_id'=>$m_id,
                    'state'=>8,
                ];
                Db::table('pai_money_log')->insert($data);
                // 提交事务
                Db::commit();
                $data = ['status'=>1,'msg'=>'重新申请提现完成'];
                $this->assign('data',$data);
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                $data = [
                    'el_type_id'=>7,
                    'el_description'=>date('Y-m-d H:i:s').'重新申请提现错误:'.$e->getMessage(),
                    'm_id'=>$m_id,
                    'el_time'=>time()
                ];
                Db::table('pai_error_log')->insert($data);
                $data = ['status'=>5,'msg'=>'重新申请提现未知错误'];
                $this->assign('data',$data);
            }
        $this->assign('header_title','申请成功');
        return view();
    }
    /**
     * 提现进度
     * 邓赛赛
     */
    public function taking_money_result(){
        $m_id = $this->m_id;
        $w_id = input('param.w_id','');
        $where = [
            'w_mid'=>$m_id,
            'w_id'=>$w_id,
            'w_state'=>['in','0,1,2,4'],
        ];
        $withdraw = new WithdrawService();
        $info = $withdraw->get_info($where,'w_id,w_mid,ac_id,w_time,w_state,w_explain');
        if(!$info){
            $this->error('此提现已不可查看');
        }
        //提现时间
        $info['w_time'] = empty($info['w_time']) ? '' : date('Y-m-d H:i',$info['w_time']);
        //银行卡号
        $info['bankaccount'] = '';
        if($info['ac_id']){
            //银行卡号
            $bankaccount =  Db::table('pai_member_attestation')->where('id',$info['ac_id'])->value('bankaccount');
            if($bankaccount){
                $info['bankaccount'] = substr($bankaccount,0,4).'*******'.substr($bankaccount,-4,4);
            }
        }
        //是否可再次提交申请
        $info['is_push'] = 0;
        if($info['w_state'] == 4 && $info['w_explain'] == '持卡人开户支行错误'){
            $info['is_push'] = 1;
        }
        $this->assign('info',$info);
        $this->assign('header_title','提现进度');
        return view();
    }

    /**
     * 吖吖充值
     * 邓赛赛
     */
    public function recharge_transition()
    {
        $m_id = $this->m_id;
        $member = new MemberService();
        $where = [
            'm_id'=>$m_id
        ];
        $info = $member->get_info($where,'m_money,peanut');
        $this->assign('info',$info);
        $this->assign('header_title','吖吖充值');
        return view();
    }

}