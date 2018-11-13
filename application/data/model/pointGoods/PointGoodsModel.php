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

namespace app\data\model\pointGoods;
use app\data\model\BaseModel as BaseModel;
use think\Db;

class PointGoodsModel extends BaseModel
{
    protected $db = 'point_goods' ;//积分商品表
    /**
     * 积分列表
     * 邓赛赛
     */
    public function goods_list($where,$field,$order,$offset,$page_size,$cache){
        $list['list'] = Db::table('pai_point_goods pg')
            ->join('pai_point_goods_product gp','pg.g_id = gp.g_id','left')
            ->join('pai_point_order_awardcode oa','oa.gp_id = gp.gp_id','left')
            ->where($where)
            ->field($field)
            ->order($order)
            ->limit($offset,$page_size)
            ->group('pg.g_id')
            ->select();
        $total_num = Db::table('pai_point_goods pg')
            ->join('pai_point_goods_product gp','pg.g_id = gp.g_id','left')
            ->join('pai_point_order_awardcode oa','oa.gp_id = gp.gp_id','left')
            ->where($where)
            ->group('pg.g_id')
            ->count();
        $total_page = ceil($total_num/$page_size);

        $list['page_size'] = $page_size;
        $new_num = count($list['list']);
        $list['new_num'] = $new_num;
        $list['total_num'] = $total_num;
        $list['total_page'] = $total_page;
        return $list;
    }

}