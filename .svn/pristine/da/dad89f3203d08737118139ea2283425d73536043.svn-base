<?php
/**
 * 地址Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 广州市素材火信息科技有限公司
 * 创建日期 2017-07-12
 * 版本 v.1.0.0
 * 网站：www.sucaihuo.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\service\search;
use app\data\model\search\SearchHotModel;
use app\data\service\BaseService as BaseService;
class SearchHotService extends BaseService
{
    protected $cache = 'search_hot';

    public function __construct()
    {
        parent::__construct();
        $this->search_hot = new SearchHotModel();
        $this->cache = 'search_hot';
    }

    /**
     * 添加数据
     * 邓赛赛
     */
    public function get_add($data=[],$cache=''){
        $res = $this->search_hot->getAdd($data,$cache);
        return $res;
    }
    /**
     * 删除数据
     * 邓赛赛
     */
    public function get_del($where=[],$cache=''){
        $res = $this->search_hot->getDel($where,$cache);
        return $res;
    }
    /**
     * 修改数据
     * 邓赛赛
     */
    public function get_save($where=[],$data=[],$cache=''){
        $res = $this->search_hot->getSave($where,$data,$cache);
        return $res;
    }

    /**
     * 搜索列表
     * 邓赛赛
     */
    public function get_list($where=[],$order='ps_id desc',$field='*',$cache=''){
        $list = $this->search_hot->getList($where,$order,$field,$cache);
        return $list;
    }

    /**
     * limit搜索列表
     * 邓赛赛
     */
    public function get_limit($where=[],$order='ps_id desc',$field='*',$page=1,$page_size=20){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page - 1) * $page_size;
        $list  = $this->search_hot->get_limit_list($where,$order,$field,$offset,$page_size);
        return $list;
    }

    /**
     *获取单条消息
     * 邓赛赛
     */
    public function get_info($where=[],$field='*'){
        $info = $this->search_hot->getInfo($where,$field);
        return $info;
    }

    /**
     * 获取单个字段
     * 邓赛赛
     */
    public function get_value($where=[],$field='*'){
        $value = $this->search_hot->get_value($where,$field);
        return $value;
    }

    /**
     * 获取某列的值
     * 邓赛赛
     */
    public function get_column($where=[],$field){
        $list = $this->search_hot->getColumn($where,$field);
        return $list;
    }

}