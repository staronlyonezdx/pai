<?php
namespace app\member\validate;
use think\Validate;
class CheckRegister extends Validate
{
    /*
    * 验证App和pc会员注册
    */
    protected $rule = [
        'm_mobile'  => 'require|length:11|number',
        'm_pwd'   => 'require|min:6|max:16',
        're_pwd'   => 'require',
        'verification'=>'require'
    ];

    protected $message = [
        'm_mobile.require' => '手机号必须填写',
        'm_mobile.length' => '手机号码为十一位',
        'm_mobile.number' => '号码必须为数字',
        're_pwd.require' => '密码最必须填写',
        'm_pwd.require' => '密码最必须填写',
        'm_pwd.min' => '密码最少六位',
        'm_pwd.max' => '密码最多十六位',
        'verification.require' => '验证码必须填写',
    ];



}
