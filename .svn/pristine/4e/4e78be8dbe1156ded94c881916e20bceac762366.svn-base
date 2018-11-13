<?php
/**
 * 公共Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 广州市素材火信息科技有限公司
 * 创建日期 2017-07-12
 * 版本 v.1.0.0
 * 网站：www.sucaihuo.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\service\goods;
use app\data\model\goods\VisitGoodsHistoryModel;
use app\data\service\BaseService as BaseService;
use think\Db;

class VisitGoodsHistoryService extends BaseService
{
    protected $cache = 'visit_goods_history';
    protected $pid = 0;

    public function __construct()
    {
        parent::__construct();
        $this->visit_goods_history = new VisitGoodsHistoryModel();
        $this->cache = 'visit_goods_history';
    }

    /**
     * 插入单条消息
     * 邓赛赛
     */
    public function get_add($data){
        $res = $this->visit_goods_history->getAdd($data);
        return $res;
    }

    /**
     * 查询单条消息
     * 邓赛赛
     */
    public function get_info($where,$field){
        $info = $this->visit_goods_history->getInfo($where,$field);
        return $info;
    }


    /**
     * 统计足迹数量(足迹表)
     * 邓赛赛
     */
    public function get_count($where){
        $info = $this->visit_goods_history->get_count_num($where);
        return $info;
    }

    /**
     * 根据商品状态统计足迹
     * 邓赛赛
     */
    public function v_get_count($m_id){
        $where = [
            'g.g_state'=>['in',6,8,9],
            'v.m_id'=>$m_id,
        ];
        $num = Db::table('pai_visit_goods_history v')->join('pai_goods g','v.g_id=g.g_id','left')->where($where)->count();
        return $num;
    }

    /**
     * 足迹列表
     * 邓赛赛
     */
    public function get_limit_list($where=[], $order='v.vgh_id desc', $field='*',$page=1,$page_size=4, $cache=''){

        $page = $page<1 ? 1 : $page;
        $offset = ($page - 1)*$page_size;
        $data = $this->visit_goods_history->getLimitList($where, $order, $field,$offset,$page_size, $cache);
        $data['page'] = $page;
        $data['page_size'] = $page_size;
        $data['total_page'] = ceil($data['total_num']/$page_size);

        return $data;
    }

    /**
     * @param $where
     * @return bool|int
     * 删除我的足迹
     * 邓赛赛
     */
    public function del($where){
        $res = $this->visit_goods_history->getDel($where,'');
        return $res;
    }





}