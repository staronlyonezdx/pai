<?php
namespace app\activity\controller;

use app\member\controller\MemberHome;

class Seckill extends MemberHome
{
    /**
     * 大牌秒杀首页
     */
    public function sec_kill_list(){

        $this->assign('header_title','大牌秒杀');
        return view();
    }
    /**
     * 秒杀详情
     */
    public function sec_kill_info(){
        return view();
    }
    /**
     * 确认订单页
     */
    public function confirm_order(){
        $this->assign('header_title','确认参拍订单');
        return view();
    }
    /**
     * 订单是否成功
     */
    public function order_is_success(){
        return view();
    }
}