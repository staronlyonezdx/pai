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
use app\data\model\goods\VisitStoreHistoryModel;
use app\data\service\BaseService as BaseService;
class VisitStoreHistoryService extends BaseService
{
    protected $cache = 'visit_store_history';
    protected $pid = 0;

    public function __construct()
    {
        parent::__construct();
        $this->visit_store_history = new VisitStoreHistoryModel();
        $this->cache = 'visit_store_history';
    }

    /**
     * 插入单条消息
     * 邓赛赛
     */
    public function get_add($data){
        $res = $this->visit_store_history->getAdd($data);
        return $res;
    }

    /**
     * 查询单条消息
     * 邓赛赛
     */
    public function get_info($where,$field){
        $info = $this->visit_store_history->getInfo($where,$field);
        return $info;
    }


    /**
     * 统计足迹数量
     * 邓赛赛
     */
    public function get_count($where){
        $info = $this->visit_store_history->get_count_num($where);
        return $info;
    }





}