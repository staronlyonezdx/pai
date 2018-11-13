<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/9/7
 * Time: 23:00
 */

namespace app\api\controller;


use think\Controller;

class Tuigetmobile extends Controller
{
    public function index(){
        $phone = input('param.tj_mobile');
        $data = [
            'status'=>1,
            'tj_mobile'=>$phone
        ];
        $this->assign('tj_mobile',$data['tj_mobile']);
        return $this->fetch('index');
    }
}