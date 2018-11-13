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

namespace app\data\model\goods;
use app\data\model\BaseModel as BaseModel;
use app\data\service\orderPai\OrderPaiService;
use think\Db;

class VisitGoodsHistoryModel extends BaseModel
{
    protected $db = 'visit_goods_history' ;//足迹表

    /**
     * @param $where
     * @param $order
     * @param $field
     * @param $offset
     * @param $page_size
     * @param string $cache
     * @return array
     * 足迹列表
     * 邓赛赛
     */
    public function getLimitList($where, $order, $field,$offset,$page_size, $cache=''){
        //总条数
        $total_num = Db($this->db)
            ->alias('v')
            ->join('pai_goods g', 'v.g_id = g.g_id','right')
            ->where($where)
            ->count();

        //前四条足迹
        $list = Db($this->db)
            ->alias('v')
            ->join('pai_goods g', 'v.g_id = g.g_id','right')
            ->join('pai_goods_product gp','v.g_id = gp.g_id','left')
            ->where($where)
            ->order($order)
            ->field($field)
            ->limit($offset,$page_size)
            ->select();
        //根据订单表获取销量最高gdr_id、
        $lists = array();
        foreach($list as $k => $v){
            $time = date('Y-m-d',$v['visit_time']);
            $list[$k]['time'] = $time;
            $where = [
                'gp_id'=>$v['gp_id'],
                'o_state'=>1,
                'o_paystate'=>2,
                'o_isdelete'=>1
            ];
            $lists[$k] = Db::table('pai_order_pai')
                ->field('gdr_id,o_id,sum(gp_num) sum_num')
                ->where($where)
                ->group('gdr_id')
                ->order('sum_num desc')
                ->select();
            $where = [
                'm_id'=>$v['m_id'],
                'g_id'=>$v['g_id']
            ];
            $is_collection= Db::table('pai_goods_collection')->where($where)->value('gc_id');
            $list[$k]['is_collection'] = $is_collection ? 1 :2;
        }
        //根据销售最高值获取销售价格(有订单)或根据g_id获取最低销售价格(无订单)
        foreach($lists as $kk => $vv){
            $lists[$kk] = isset($vv[0]) ? $vv[0] : [];
            $lists[$kk]['g_id'] = $list[$kk]['g_id'];
                if(isset($vv[0]['gdr_id']) && $vv[0]['sum_num'] != 0 ){
                    $list[$kk]['sum_num'] = $vv[0]['sum_num'];
                    $gdr_price = Db::table('pai_goods_dt_record')->where('gdr_id',$vv[0]['gdr_id'])->value('gdr_price');
                }else{
                    $list[$kk]['sum_num'] = 0;
                    $gdr_price = Db::table('pai_goods_dt_record')->where('g_id',$list[$kk]['g_id'])->min('gdr_price');
                }
                $list[$kk]['gdr_price'] = $gdr_price;
        }

        $array_t = array();
        $new_num = 0;
        foreach($list as $k => $v){
            $new_num ++;
            $array_t[$v["time"]]['info'][] = $v;
            $array_t[$v["time"]]['time'] = $v["time"];
        }
        $data['list'] = array_values($array_t);
        //当前页
        $data['new_num']    = $new_num;
        //总页数
        $data['total_num']  = $total_num;

        return $data;
    }

}