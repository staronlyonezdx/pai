<?php
namespace app\member\validate;
use think\Validate;
class CheckBindingCard extends Validate
{
	/*
	* 会员申请入驻
	*/
    protected $rule = [
        'm_bankowner'  => 'require|min:2|max:25',
        'm_bankname'   => 'require|max:50',
        'm_bankaccount' => 'require|number|length:16,19',
    ];

    protected $message = [
        'm_bankowner.require'  => '真实姓名不能为空',
        'm_bankowner.max'  => '真实姓名不超过25位',
        'm_bankowner.min'  => '真实姓名不小于2位',
        'm_bankname.require'   => '开户行不能为空',
        'm_bankname.between'   => '开户行不能超过100字',
        'm_bankaccount.require' => '银行卡号不能为空',
        'm_bankaccount.number' => '银行卡号格式错误',
        'm_bankaccount.length' => '银行卡号格式错误',
    ];

	
}
