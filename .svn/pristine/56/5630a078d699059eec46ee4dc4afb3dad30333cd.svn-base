<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/31
 * Time: 11:12
 */

namespace app\member\controller;


use think\Controller;

/*
 * 2018-8-31
 * 张文斌
 */

class Integralman extends IndexHome
{
    public function integralman(){
        $type = input("param.type/d",0);

        $this->assign('type',$type);
        return $this->fetch();
    }
}