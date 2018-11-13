<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/20
 * Time: 9:21
 */

namespace app\crontab\controller;


use think\Controller;
use think\Db;

class Destruction extends Controller
{
    public function index(){
        Db::query('Call editorder()');//未支付超24小时作废
    }
}