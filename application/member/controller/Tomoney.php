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
use app\data\service\system_msg\SystemMsgService;
use think\Request;
use think\Validate;
use think\Db;
class Tomoney extends MemberHome
{
    /**
     * @return mixed
     * 把收益转到余额填写页面
     */
    public function index(){
        $m_id = $this->m_id;
        $member = new MemberService();
        $where = [
            'm_id'=>$m_id
        ];
        $data['m_income'] = $member->get_value($where,'m_income');
        $where = [
            'c_code'=>'SY_TO_YE'
        ];
        $config = new ConfigService();
        $data['taxation'] = $config->configGetValue($where,'c_value');
        $this->assign('data',$data);
        $this->assign('header_title','转入余额');
        return $this->fetch();
    }

    /*
    * 把收益转到余额结构页面
    */
    public function tomoneyresult(){
        $status = input('param.status',1);
        $title = $status == 1 ? '转入成功' : '转入失败' ;
        $this->assign('header_title',$title);
        $this->assign('status',$status);
        return view();
    }

    /**
     * 转入明细列表
     */
    public function tomoneylist(){
        return view();
    }

    //收益转入余额方法
    public function dotomeney(){
        $m_id = $this->m_id;
        $money = input('post.money',0);
        $m_payment_pwd = input('post.m_payment_pwd','');
        $member = new MemberService();
        $where = [
            'm_id'=>$m_id
        ];
        $memberinfo = $member->get_info($where,'m_income,m_payment_pwd');
        if($money > $memberinfo['m_income'] || $money <= 0){
            return ['status'=>0,'msg'=>'超出收益可转入的最大金额'];
        }
        if(md5($m_payment_pwd) != $memberinfo['m_payment_pwd']){
            return ['status'=>2,'msg'=>'支付密码错误'];
        }
        //税收百分比
        $where2 = [
            'c_code'=>'SY_TO_YE'
        ];
        $config = new ConfigService();
        $taxation = $config->configGetValue($where2,'c_value');
        //应扣除税收
        $taxation_money = ceil($money*$taxation*100)/100;
        $after_tax_money = $money-$taxation_money;
        $money_log = new MoneyLogService();
        $system_msg = new SystemMsgService();
        Db::startTrans();//启动事务
        try{
            //插入收益记录表
            $income_log = array(
                'i_time'=>time(),
                'i_tax'=>$taxation_money,
                'i_typeid'=>7,
                'i_type'=>'reduce',
                'm_id'=>$m_id,
                'i_state'=>8,
                'i_money'=>$money,
                'i_reason'=>'收益金额转入余额',
            );
            $income_id = Db::table('pai_income')->insertGetId($income_log);
            //插入money_log表
            $money_log_arr = array(
                'ml_type'=>'reduce',
                'ml_reason'=>'收益金额转入到余额',
                'ml_reason_id'=>8,
                'ml_table'=>3,
                'ml_money'=>$money,
                'money_type'=>2,
                'add_time'=>time(),
                'from_id' =>$income_id,
                'm_id' =>$m_id,
                'state' =>8,
            );
            $money_log->get_add($money_log_arr);//插入money_log
            //插入money_log表
            $money_log_arr2 = array(
                'ml_type'=>'add',
                'ml_reason'=>'收益金额转入到余额',
                'ml_reason_id'=>8,
                'ml_table'=>3,
                'ml_money'=>$after_tax_money,
                'money_type'=>1,
                'add_time'=>time(),
                'from_id' =>$income_id,
                'm_id' =>$m_id,
                'state' =>8,
            );
            $money_log->get_add($money_log_arr2);//插入money_log
            $data2 = [
                'sm_addtime'=>time(),
                'sm_title'=>'收益金额转余额',
                'sm_brief'=>'收益金额转余额通知',
                'sm_content'=>'您的收益金额:'.$money.'元,已转入余额,实际到账金额为:'.$after_tax_money.'元,请注意查收!',
                'is_success' => 1,
            ];
            $system_msg->AddSystemMsg($data2);
            Db::table('pai_member')->where('m_id',$m_id)->setDec('m_income',$money);
            Db::table('pai_member')->where('m_id',$m_id)->setInc('m_money',$after_tax_money);
            // 提交事务
            Db::commit();
            return ['status'=>1,'msg'=>'收益转余额成功'];
        } catch (\Exception $e){
            Db::rollback();
            $error_msg = $e ->getMessage();//错误信息
            $arr = array(
                'el_type_id'    =>6,
                'el_description'=>date('Y-m-d H:i:s').'用户m_id'.$m_id.',收益转余额报错：'.$error_msg,
                'el_time'       =>time(),
            );
            Db('error_log')->insert($arr);//插入错误日志表
            return ['status'=>3,'msg'=>'服务繁忙,请稍后重试'];
        }

    }


}