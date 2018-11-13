<?php
/**
 * Created by PhpStorm.
 * User: lyh
 * Date: 2018/9/1
 * Time: 10:25
 * 人气商品（包括线上线下）公布定时任务
 * 测试连接：/crontab/linepublish/index
 */
namespace app\crontab\controller;

use think\Controller;
use think\Db;
use app\data\service\popularity\PopularityService;

class linepublish extends  Controller
{
    /**
     * 定时脚本，超出结束时间的人气商品公布
     * 刘勇豪
     */
    public function index(){

        //$where['pg_type'] = 3;//线下商品
        $where['pg_state'] = 1;//进行中的
        $where['end_time'] = ['lt',time()];//结束时间
        $list = Db("popularity_goods")->where($where)->select();

        $total_num = count($list);
        echo "共有".$total_num."件商品待处理\n";

        $ok_num = 0;
        $error_num = 0;
        if(empty($list)){
            echo "无需采处理\n";
        }else{
            $popularity = new PopularityService();
            foreach($list as $k => $v){
                $pg_id = $v['pg_id'];
                $pg_periods = $v['pg_periods'];
                $callback = $popularity->line_publish($pg_id,$pg_periods);

                if($callback['status']){
                    $ok_num++;
                }else{
                    $error_num++;
                }
            }
            echo "本地任务共有".$total_num."件商品待处理，".$ok_num."条处理成功，".$error_num."条处理失败\n";
        }
    }
}