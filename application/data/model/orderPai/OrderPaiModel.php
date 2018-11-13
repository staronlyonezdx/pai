<?php
/**
 * 订单Model
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州拍吖吖科技有限公司
 * 创建日期 2018-07-02
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\model\orderPai;

use app\data\model\BaseModel as BaseModel;
use think\Db;
use think\Cache;

class OrderPaiModel extends BaseModel
{
    protected $db = 'order_pai'; //订单

    /**
     * 关联查询 order_pai,member,storer,goods_product,goods
     * 创建人 刘勇豪
     * 时间 2018-07-04
     */
    public function getMoreInfo($where, $field = '*')
    {
        $info = Db::table($this->tbale)->alias('o')
            ->field($field)
            ->join('pai_member m', 'm.m_id = o.m_id', 'left')
            ->join('pai_store s', 's.store_id = o.store_id', 'left')
            ->join('pai_goods_product gp', 'gp.gp_id = o.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->find();
        return $info;
    }

    /**
     * 订单详细分页查询 order_pai,member,storer,goods_product,goods
     * 创建人 刘勇豪
     * 时间 2018-06-27 18:00:00
     */
    public function getInfoPaginate($where, $field, $order, $page, $cache)
    {
        $list = Db::table($this->tbale)->alias('o')
            ->field($field)
            ->join('pai_member m', 'm.m_id = o.m_id', 'left')
            ->join('pai_store s', 's.store_id = o.store_id', 'left')
            ->join('pai_goods_product gp', 'gp.gp_id = o.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->paginate($page,false,['query'=>request()->param()]);
        return $list;
    }
    /**
     * 订单详细查询 order_pai,member,storer,goods_product,goods
     * 创建人 邓赛赛
     * 时间 2018-06-27 18:00:00
     */
    public function getInfoSelect($where, $field, $order, $cache)
    {
        $list = Db::table($this->tbale)->alias('o')
            ->field($field)
            ->join('pai_member m', 'm.m_id = o.m_id', 'left')
            ->join('pai_store s', 's.store_id = o.store_id', 'left')
            ->join('pai_goods_product gp', 'gp.gp_id = o.gp_id', 'left')
            ->join('pai_goods g', 'g.g_id = gp.g_id', 'left')
            ->where($where)
            ->order($order)
            ->select();
        return $list;
    }
    /**
     * 删除一条拍一拍订单数据（非物理刪除,事务）
     * 创建人 刘勇豪
     * 时间 2018-07-04 10:51:00
     */
    public function getDelete($o_id){
        if (!$o_id)
        {
            return false;
        }

        // 启动事务
        Db::startTrans();
        try{
            // 删除订单
            $data_pai['o_isdelete'] = 1;
            $where_pai['o_id'] = $o_id;
            $save1 = Db::table($this->tbale)->where($where_pai)->update($data_pai);

            // 删除抽奖号码
            $where_awardcode['o_id'] = $o_id;
            $data_awardcode['oa_state'] = 3;
            $save2 = Db::table('pai_order_awardcode')->where($where_awardcode)->update($data_awardcode);

            // 提交事务
            Db::commit();
            return true;

        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return false;
        }
    }

    /**
     * 分页查询订单详细列表（order_pai,member）
     * 创建人 刘勇豪
     * @param string $where
     * @param string $order
     * @param string $field
     * @param string $limit
     * @param string $cache
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getOrderLimitList($where = '', $order = 'o.o_id asc', $field = '*', $limit = "0,5", $cache = 'order_pai'){
        $list = Db::table($this->tbale)->alias('o')
            ->where($where)
            ->field($field)
            ->join('pai_member m', 'm.m_id = o.m_id', 'left')
            ->order($order)
            ->limit($limit)
            ->select();
        return $list;
    }


}