<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/20
 * Time: 9:25
 */

namespace app\crontab\controller;


use think\Controller;
use think\Db;

class Receipt extends Controller
{
    public function index(){
        Db::query('call shouorder()');//未确认收货7天后自动收货，货款加入所属店铺
    }
}