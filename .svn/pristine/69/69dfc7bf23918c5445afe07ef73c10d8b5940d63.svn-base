<?php
/**
 * Created by PhpStorm.
 * User: lyh
 * Date: 2018/9/1
 * Time: 10:25
 */
namespace app\crontab\controller;

use app\data\service\pointOrderPai\PointOrderPaiService;
use app\data\model\pointOrderPai;
use app\data\service\member\MemberService;
use app\data\service\BaseService;
use think\Controller;
use think\Cookie;
use think\Db;

class Sentpoint extends  Controller
{
    /**
     * 赠送上级积分的回调方法
     * 刘勇豪
     * 测试连接：http://www.pai.com/crontab/Sentpoint/index
     */
    public function index(){

        $pointOrderPai = new PointOrderPaiService();
        $call_back = $pointOrderPai->callback_sent_point();

        echo json_encode($call_back);
    }
}