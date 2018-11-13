<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/28
 * Time: 10:25
 */

namespace app\crontab\controller;


use think\Controller;
use think\Db;

class Loopty extends  Controller
{
//    public function index(){
//        $ishave = Db('income')->whereTime('i_updatetime', 'today')->find();//判断今天是否已经执行过
//        $starttime = microtime();
////        $endtime = microtime();
////        dump($starttime);
////        echo "<br>";
////        dump($endtime);exit();
//        if(!empty($ishave)){
//            $this->error('该任务已执行过');
//        }
//        $count = Db('member')->count();//总条数
//        $number = floor($count / 500) + 1;//执行次数
//        for($a=1;$a<=$number;$a++){
//            $all_number = $a * 500;//取的最后一个条数
//            $list = Db('member')->alias('m')->where('m_money','egt',100)->where('tj_mid','gt',0)->field('m.m_id,m.m_money,m.m_name,m.m_levelid,m.tj_mid,m.m_income,m.m_type')->order('m_id desc')->limit(($a-1)*500,$all_number)->select();
//            $data = array();
//            $sj_amount = "";//上级收益
//            $sj_all_amount = "";//上级最后总收益金额
//            $ssj_amount = "";//上上级收益
//            $ssj_all_amount = "";//上上级最后总收益金额
//            $sjrate = "";//上级费率
//            $ssjrate = "";//上上级费率
//            if(!empty($list)){
//                $sjsql = "INSERT INTO pai_income(`i_time`,`i_typeid`,`m_id`,`i_state`,`i_money`,`i_reason`,`i_from_mid`,`i_from_id`,`i_updatetime`) VALUES ";
//                $sjmembersql = "INSERT INTO pai_money_log(`ml_type`,`ml_reason`,`ml_table`,`ml_money`,`money_type`,`nickname`,`position`,`member_type`,`income_type`,`withdraw_method`,`card_number`,`add_time`,`from_id`,`m_id`,`state`,`update_time`) VALUES ";
//                $ssjsql = "INSERT INTO pai_income(`i_time`,`i_typeid`,`m_id`,`i_state`,`i_money`,`i_reason`,`i_from_mid`,`i_from_id`,`i_updatetime`) VALUES ";
//                $ssjmembersql = "INSERT INTO pai_money_log(`ml_type`,`ml_reason`,`ml_table`,`ml_money`,`money_type`,`nickname`,`position`,`member_type`,`income_type`,`withdraw_method`,`card_number`,`add_time`,`from_id`,`m_id`,`state`,`update_time`) VALUES ";
//                $sjsql_tmp = $sjsql;
//                $sjmembersql_tmp = $sjmembersql;
//                $ssjsql_tmp = $ssjsql;
//                $ssjmembersql_tmp = $ssjmembersql;
////                dump($sjsql);exit();
//                // 启动事务
//                Db::startTrans();
//                try{
//                    foreach($list as $value){
//                        if($value['tj_mid'] > 0){//上级id不为空
//                            $sjres = Db('member')->field('m_id,m_money,m_name,m_levelid,tj_mid,m_income,m_type')->where(['m_id'=>$value['tj_mid']])->find();//上级的信息
//                            if($sjres['m_levelid'] >= $value['m_levelid']){//上级会员等级大于等于推荐人
//                                switch ($sjres['m_levelid']){//上级等级
//                                    case 1:
//                                        $sjrate = 0.0001;
//                                        break;
//                                    case 2:
//                                        $sjrate = 0.00015;
//                                        break;
//
//                                    case 3:
//                                        $sjrate = 0.0002;
//                                        break;
//                                    case 4:
//                                        $sjrate = 0.00035;
//                                        break;
//                                }
//                                $sj_amount = $value['m_money'] * $sjrate;//上级收益
//                                $sj_all_amount = $sjres['m_income'] + $sj_amount;//上级最后总收益
//                                if($sj_amount > 0){//判断上级的收益是否大于0
//                                    $sjsql .= "('".time()."','".'1'."','".$sjres['m_id']."','".'8'."',$sj_amount,'".'每日余额收益'."','".$value['m_id']."','','".time()."'),";
//                                    $sjmembersql .= "('".'add'."','".'每日余额收益'."','".'5'."','".$sj_amount."','2','".$sjres['m_name']."','".$sjres['m_levelid']."','".$sjres['m_type']."','2','','','".time()."','','".$sjres['m_id']."','8',''),";
//                                    $update_sj = Db('member')->where('m_id', $sjres['m_id'])->update(['m_income'=>$sj_all_amount]);//修改自己的收益金额字段
//                                }
//                                if($sjres['tj_mid'] > 0){
//                                    $ssjres = Db('member')->field('m_id,m_money,m_name,m_levelid,tj_mid,m_income,m_type')->where(['m_id'=>$sjres['tj_mid']])->find();//上上级的信息
//                                    if($ssjres['m_levelid'] >= $sjres['m_levelid']){
//                                        $ssjrate = 0.000075;//上上级费率
//                                        $ssj_amount = $value['m_money'] * $ssjrate;//上上级收益
//                                        $ssj_all_amount = $ssjres['m_income'] + $ssj_amount;//上上级最后总收益
//                                        if($ssj_amount > 0){//判断上上级的收益是否大于0
//                                            $ssjsql .= "('".time()."','".'1'."','".$ssjres['m_id']."','".'8'."',$ssj_amount,'".'每日余额收益'."','".$value['m_id']."','','".time()."'),";
//                                            $ssjmembersql .= "('".'add'."','".'每日余额收益'."','".'5'."','".$ssj_amount."','2','".$ssjres['m_name']."','".$ssjres['m_levelid']."','".$ssjres['m_type']."','2','','','".time()."','".$value['m_id']."','".$ssjres['m_id']."','8',''),";
//                                            $update_ssj = Db('member')->where('m_id', $ssjres['m_id'])->update(['m_income'=>$ssj_all_amount]);//修改自己的收益金额字段
//                                        }
//                                    }
//                                }
//                            }
//                        }
//                    }
//                    $sjsql = rtrim($sjsql,',');
//                    $ssjsql = rtrim($ssjsql,',');
//                    $sjmembersql = rtrim($sjmembersql,',');
//                    $ssjmembersql =rtrim($ssjmembersql,',');
//                    if(!empty($sjsql) && $sjsql != $sjsql_tmp){
//                        Db::execute($sjsql);//批量插入上级收益
//                    }
//                    if(!empty($sjmembersql) && $sjmembersql != $sjmembersql_tmp){
//                        Db::execute($sjmembersql);
//                    }
//                    if(!empty($ssjsql) && $ssjsql != $ssjsql_tmp){
////                        print_r($ssjsql);exit('5555');
//                        Db::execute($ssjsql);//批量插入上上级收益
//                    }
//                    if(!empty($ssjmembersql) && $ssjmembersql != $ssjmembersql_tmp){
//                        Db::execute($ssjmembersql);
//                    }
//                    // 提交事务
//                    Db::commit();
//                }catch(\Exception $e){
//                    Db::rollback();
//                }
//
//            }
//        }
//        $endtime = microtime();
//        $end = $endtime-$starttime;
//        echo $end;
//    }

    //新的观望奖方法
    public function index(){
        $ishave = Db('income')->whereTime('i_updatetime', 'today')->find();//判断今天是否已经执行过
        $starttime = microtime();
        if(!empty($ishave)){
            $this->error('该任务已执行过');
        }
        $count = Db('member')->count();//总条数
        $number = floor($count / 500) + 1;//执行次数
        for($a=1;$a<=$number;$a++){
            $all_number = $a * 500;//取的最后一个条数
            $list = Db('member')->alias('m')->where('m_money','egt',20)->where('tj_mid','gt',0)->field('m.m_id,m.m_money,m.m_name,m.m_levelid,m.tj_mid,m.m_income,m.m_type')->order('m_id desc')->limit(($a-1)*500,$all_number)->select();
            $data = array();
            $sj_amount = "";//上级收益
            $sj_all_amount = "";//上级最后总收益金额
            $sjrate = "";//上级费率
            if(!empty($list)){
                $sjsql = "INSERT INTO pai_income(`i_time`,`i_typeid`,`m_id`,`i_state`,`i_money`,`i_reason`,`i_from_mid`,`i_updatetime`) VALUES ";
                $sjmembersql = "INSERT INTO pai_money_log(`ml_type`,`ml_reason`,`ml_table`,`ml_money`,`money_type`,`nickname`,`position`,`member_type`,`income_type`,`card_number`,`add_time`,`m_id`,`state`) VALUES ";
                $sjsql_tmp = $sjsql;
                $sjmembersql_tmp = $sjmembersql;
                // 启动事务
                Db::startTrans();
                try{
                    foreach($list as $value){
                        if($value['tj_mid'] > 0){//上级id不为空
                            $sjres = Db('member')->field('m_id,m_money,m_name,m_levelid,tj_mid,m_income,m_type,is_promoters')->where(['m_id'=>$value['tj_mid']])->find();//上级的信息
                            if($sjres['m_levelid'] >= $value['m_levelid'] && ($sjres['is_promoters'] == 1 || $sjres['is_promoters'] == 2 || $sjres['is_promoters'] == 3 || $sjres['is_promoters'] == 6)){//上级会员等级大于等于推荐人并且上级不是推广人
                                switch ($sjres['m_levelid']){//上级等级
                                    case 1:
                                        $sjrate = 0.0001;
                                        break;
                                    case 2:
                                        $sjrate = 0.00015;
                                        break;

                                    case 3:
                                        $sjrate = 0.0002;
                                        break;
                                    case 4:
                                        $sjrate = 0.00035;
                                        break;
                                }
                                $sj_amount = $value['m_money'] * $sjrate;//上级收益
                                $sj_all_amount = $sjres['m_income'] + $sj_amount;//上级最后总收益
                                if($sj_amount >= 0.01){//判断上级的收益是否大于0.01才插入
                                    $sjsql .= "('".time()."','".'1'."','".$sjres['m_id']."','".'8'."',$sj_amount,'".'观望奖'."','".$value['m_id']."','".time()."'),";
                                    $sjmembersql .= "('".'add'."','".'观望奖'."','".'5'."','".$sj_amount."','2','".$sjres['m_name']."','".$sjres['m_levelid']."','".$sjres['m_type']."','2','','".time()."','".$sjres['m_id']."','8'),";
                                    $update_sj = Db('member')->where('m_id', $sjres['m_id'])->update(['m_income'=>$sj_all_amount]);//修改自己的收益金额字段
                                }
                            }
                        }
                    }
                    $sjsql = rtrim($sjsql,',');
                    $sjmembersql = rtrim($sjmembersql,',');
                    if(!empty($sjsql) && $sjsql != $sjsql_tmp){

                        Db::execute($sjsql);//批量插入上级收益
                    }
                    if(!empty($sjmembersql) && $sjmembersql != $sjmembersql_tmp){

                        Db::execute($sjmembersql);
                    }
                    // 提交事务
                    Db::commit();
                }catch(\Exception $e){
                    Db::rollback();
                }
            }
        }
        $endtime = microtime();

        $end = $endtime-$starttime;
        echo $end;
    }
}