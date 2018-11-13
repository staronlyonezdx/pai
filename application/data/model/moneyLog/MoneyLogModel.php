<?php
/**
* 管理员账户Model
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\model\moneyLog;
use app\data\model\BaseModel as BaseModel;

class MoneyLogModel extends BaseModel
{	
  protected $db = 'money_log' ;//金钱log表



    /**
     * @param $where
     * @return mixed
     * 最大金钱值
     * 邓赛赛
     */
    public function maxMoney($where,$val){
	    $maxMoney = Db($this->db)->where($where)->max($val);
	    return $maxMoney;
    }

    /**
     * @param $where
     * @return mixed
     * 总金钱
     * 邓赛赛
     */
    public function sumMoney($where,$val){
        $maxMoney = Db($this->db)->where($where)->sum($val);
        return $maxMoney;
    }

    /**
     * @param $where
     * @param $order
     * @param $field
     * 获取余额明细列表
     * 邓赛赛
     */
    public function detailsList($where,$order,$field,$cache=''){
        $list = Db($this->db)
            ->alias('ml')
            ->where($where)
            ->join('pai_withdraw w','w.w_id=ml.from_id and w_type=1')
            ->order($order)
            ->field($field)
            ->select();
        return $list;
    }

    /**
     * 计算金额总数
     * 邓赛赛
     */
    public function sum_money($where,$field){
        $sum = Db($this->db)->where($where)->sum($field);
        return $sum;
    }
}