<?php
namespace app\member\validate;
use think\Validate;
class CheckApp extends Validate
{
	/*
	* 会员申请入驻
	*/
    protected $rule = [
        'corporation_name'  =>  'require',
        'pid'  =>  'require',
//        'cid'  =>  'require',
//        'aid'  =>  'require',
        'address'  =>  'require',
        'ba_bankname'  =>  'require',
        'ba_bankaccount'  =>  'require',
        'store_tel'  =>  'require',
        'store_categoryid'  =>  'require',
//        'ba_legal_person_idnumber'  =>  'require',
    ];

    protected $message = [
        'corporation_name.require'  =>  '企业名不能为空',
        'pid.require'  =>  '地区不能为空',
//        'cid.require'  =>  '市区不能为空',
//        'aid.require'  =>  '区、县不能为空',
        'address.require'  =>  '详细地址不能为空',
        'ba_bankname.require'  =>  '开户银行名不能为空',
        'ba_bankaccount.require'  =>  '银行卡号不能为空',
        'store_tel.require'  =>  '店铺联系方式不能为空',
        'store_categoryid.require'  =>  '店铺分类不能为空',
//        'ba_legal_person_idnumber.require'  =>  '企业法人身份证号码不能为空',
    ];

//    protected $scene = [
//        'add'   =>  ['name','email'],
//    ];
	
}
