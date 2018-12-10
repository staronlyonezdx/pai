<?php
/**
 * 店铺收藏Model
 *-------------------------------------------------------------------------------------------

 *--------------------------------------------------------------------------------------------
 */

namespace app\data\model\store;
use app\data\model\BaseModel as BaseModel;
use think\Db;
class StoreCollectionModel extends BaseModel
{
    protected $db = 'store_collection' ;// 店铺收藏

    /**
     * 删除多个收藏商家
     * 邓赛赛
     */
    public function del_multiple($where){
        $res = Db($this->db)->where($where)->delete();
        return $res;
    }
    /**
     * 关注的所有店铺
     * 邓赛赛
     */
    public function follow_store_all($where=[],$order,$field='*',$offset,$page_size){
//        dump($this->db);die;
        $list = Db($this->db)
            ->alias('sc')
            ->where($where)
            ->order($order)
            ->join('pai_store s','s.store_id = sc.store_id','left')
            ->field($field)
            ->limit($offset,$page_size)
            ->select();
        foreach($list as $k => $v){
            $where2 = [
                'g.g_storeid'=>$v['store_id'],
                'g.g_state'=>6,
                'g.g_endtime'=>['>',time()],
                'p.gp_stock'=>['>',0],
                'p.gp_type' =>1
            ];
            $goods = Db::table('pai_goods')
                ->alias('g')
                ->join('pai_goods_dt_record gt','gt.g_id=g.g_id','left')
                ->join('pai_goods_product p','p.g_id=g.g_id','left')
                ->where($where2)
                ->field('g.g_img,g.g_id,g.g_starttime,gt.gdr_id,gt.g_id gtrg_id,min(gdr_price) gdr_price')
                ->group('gtrg_id')
                ->order('g.g_id desc')
                ->limit(3)
                ->select();

            $list[$k]['goods'] = $goods;
            if($goods){
                foreach($goods as $kk => $vv){
                    $list[$k]['goods'][$kk]['new_goods'] = (time() - $goods[$kk]['g_starttime'] < 86400*7) ? 1 : 2;
                }
            }
        }
        return $list;
    }

    /**
     * 关注的所有店铺
     * 邓赛赛
     */
    public function tj_store($where=[]){
            $goods = Db::table('pai_goods')
                ->alias('g')
                ->join('pai_goods_dt_record gt','gt.g_id=g.g_id','left')
                ->where($where)
                ->field('g.g_img,g.g_id,g.g_starttime,gt.gdr_id,gt.g_id gtrg_id,min(gdr_price) gdr_price')
                ->group('gtrg_id')
                ->order('g.g_id desc')
                ->limit(3)
                ->select();


        return $goods;
    }

    /**
     * 此店铺粉丝列表
     * 邓赛赛
     */
    public function get_fans_list($where,$order,$field,$offset,$page_size){
        $list = Db($this->db)
            ->alias('sc')
            ->join('pai_member m','sc.m_id = m.m_id','left')
            ->join('pai_member_level ml','m.m_levelid = ml.ml_id','left')
            ->where($where)
            ->order($order)
            ->field($field)
            ->limit($offset,$page_size)
            ->select();
        return $list;
    }

}