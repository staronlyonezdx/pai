<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/17
 * Time: 9:43
 */

namespace app\crontab\controller;


use think\Controller;
use think\Db;

class Insertlog extends Controller
{
    public function index(){
        Db::query('Call distribution()');//调用已创建的插入pai_member_log,pai_income，会员收益的存储过程
    }
}