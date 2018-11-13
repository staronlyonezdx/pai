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
class Coupon extends MemberHome
{
    /**
     * 我的红包
     */
    public function index(){
        $this->assign('header_title','我的红包');
        return view();
    }

    /**
     * 订单选择红包
     */
    public function selectcoupon(){
        $this->assign('header_title','选择红包');
        return view();
    }



}