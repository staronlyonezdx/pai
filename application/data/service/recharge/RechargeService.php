<?php
/**
 * 省市区地址Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州拍吖吖科技有限公司
 * 创建日期 2018-06-25
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\service\recharge;
use app\data\model\recharge\RechargeModel;
use app\data\service\BaseService as BaseService;
use think\db;

class RechargeService extends BaseService
{
    protected $cache = '';

    public function __construct()
    {
        parent::__construct();
        $this->recharge = new RechargeModel();
        $this->cache = 'recharge';

    }

    /**
     * 插入一条充值数据
     * 邓赛赛
     */
    public function get_add_id($data){
        $id = $this->recharge->insertId($data);
        return $id;
    }

    /**
     * 查询数据
     * 邓赛赛
     */
    public function get_info($where,$field){
        $info = $this->recharge->getInfo($where,$field);
        return $info;
    }

    //修改订单状态
    public function edit_recharge_info($r_id,$r_state,$r_money,$r_success_time,$m_id){
        $table="recharge";
        $sql = "UPDATE pai_recharge SET r_state=$r_state,r_money=$r_money,r_success_time=$r_success_time WHERE r_id=$r_id";
        $res = Db::table($table)->execute($sql);
        if($res){
            $sql2 = "UPDATE pai_member SET m_money=m_money+$r_money WHERE m_id=$m_id";
            $res2 = Db::table($table)->execute($sql2);
            $return = array("status" => '1', "msg" => "操作成功");
            return $return;
        }
        else{
            $return = array("status" => '0', "msg" => "操作失败");
            return $return;
        }
    }
}