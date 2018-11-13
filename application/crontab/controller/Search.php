<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/17
 * Time: 9:38
 */

namespace app\crontab\controller;


use think\Controller;
use think\Db;
class Search extends Controller
{
    public function index(){
        $result = Db::query("Call searchmember()");//调用已创建的插入会员收益表pai_member_money_log的存储过程
    }
}