<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/28
 * Time: 10:25
 */
namespace app\crontab\controller;

use app\data\service\promoters\PromotersApplyService;
use app\data\service\promoters\PromotersFrozenService;
use think\Controller;

class Promoters extends  Controller
{
    /**
     * 考核期结束操作(推广员考核结束，定时审核考核期任务)
     * 邓赛赛
     */
    public function assessment_end(){
        $promoters_apply = new PromotersApplyService();
        $res = $promoters_apply->set_assessment_end();
        dump($res);die;
    }

    /**
     * 考核期资金计算(推广员考核期观望奖资金计算，定时任务)
     * 邓赛赛
     */
    public function get_examination_money(){
        $promoters_frozen = new PromotersFrozenService();
        $res = $promoters_frozen->get_examination_watch_bonus();
        dump($res);die;
    }
    /**
     * 计算推广员每日收益(观望奖-正式推广员 定时任务)
     * 邓赛赛
     */
    public function promoters_today_money(){
        $promoters_frozen = new PromotersFrozenService();
        $res = $promoters_frozen->get_today_money();
        dump($res);die;
    }

}