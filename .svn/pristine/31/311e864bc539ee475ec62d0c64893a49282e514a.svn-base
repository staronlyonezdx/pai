<?php
namespace app\member\validate;
use think\Validate;
class CheckReApp extends Validate
{
	/*
	* 会员申请入驻
	*/
    protected $rule = [
        'corporation_name'  =>  'require',
        'address'  =>  'require',
        'ba_bankname'  =>  'require',
        'ba_bankaccount'  =>  'require',
        'store_tel'  =>  'require',
        'store_categoryid'  =>  'require',
    ];

    protected $message = [
        'corporation_name.require'  =>  '企业名不能为空',
        'address.require'  =>  '详细地址不能为空',
        'ba_bankname.require'  =>  '开户银行名不能为空',
        'ba_bankaccount.require'  =>  '银行卡号不能为空',
        'store_tel.require'  =>  '店铺联系方式不能为空',
        'store_categoryid.require'  =>  '店铺分类不能为空',
    ];
	
}
