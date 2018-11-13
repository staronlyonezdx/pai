<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\sms\SmsService as SmsService;

class Testsms extends AdminHome
{
    /*
    * 管理员列表
    * 创建人 刘勇豪
    * 时间 2018-06-21 10:21:00
    */
    public function index()
    {
        $phone = input("post.m_mobile");
        $phone = 18258421827;//要发送的手机号码
        $sms = new SmsService();
        $res = $sms->smsSingleSender($phone);
//        return $res;
        dump($res);
    }

    /*
    * 管理员列表
    * 创建人 刘勇豪
    * 时间 2018-06-21 10:21:00
    */
    public function checkCode()
    {
        $code = input('request.code',0);
        $phone = input('request.phone',0);
        $sms = new SmsService();
        $res = $sms->checkSmsCode($code,$phone);
        dump($res);
    }
}
