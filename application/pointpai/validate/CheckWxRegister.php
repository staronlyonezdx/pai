<?php
namespace app\member\validate;
use think\Validate;
class CheckWxRegister extends Validate
{
	/*
	* 验证微信手机号注册
	*/
    protected $rule = [
        'm_mobile'  => 'length:11|number',
        'm_pwd'   => 'min:6|max:11',
    ];

    protected $message = [
        'm_mobile.length' => '手机号码为十一位',
        'm_mobile.number' => '号码必须为数字',
        'm_pwd.min' => '密码最少六位数',
        'm_pwd.max' => '密码最多十一位',
    ];

	
}
