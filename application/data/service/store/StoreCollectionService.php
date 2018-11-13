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

namespace app\data\service\store;
use app\data\model\store\StoreCollectionModel as StoreCollectionModel;
use app\data\service\BaseService as BaseService;
use app\data\service\goods\GoodsService;

class StoreCollectionService extends BaseService
{
    protected $cache = 'store_collection';

    public function __construct()
    {
        parent::__construct();
        $this->store_collection = new StoreCollectionModel();
        $this->cache = 'store_collection';
    }
    /**
     * 获取商家粉丝数量
     * 邓赛赛
     */
    public function get_count($where){
        $num = $this->store_collection->get_count_num($where);
        return $num;
    }

    /**
     * 收藏商家
     * 邓赛赛
     */
    public function get_add($data,$cache=''){
        $res = $this->store_collection->getAdd($data,$cache);
        return $res;
    }

    /**
     * 获取一条收藏商家
     * 创建人 邓赛赛
     * 时间 2017-07-14 11:40:09
     */
    public function collectionInfo($where='', $field='*')
    {
        $info =  $this->store_collection->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     *删除一条收藏商家
     * 邓赛赛
     */
    public function collectionDel($where,$cache=''){
        $list = $this->store_collection->getDel($where, $cache);
        return $list;
    }

    /**
     * 添加一条收藏商家
     * 创建人 邓赛赛
     * 时间 2017-09-10 20:10:00
     */
    public function collectionAdd($data='')
    {
        $list = $this->store_collection->getAdd($data, $this->cache);
        return $list;
    }

    /**
     * 删除多条收藏商家
     * 邓赛赛
     */
    public function del_multiple_collection($where){
        $res = $this->store_collection->del_multiple($where);
        return $res;
    }

    /**
     * 关注店铺列表
     * 邓赛赛
     */
    public function store_all($where,$order='sc.sc_id desc',$field='*',$page,$page_size){
        $offset = ($page-1) * $page_size;
        $list = $this->store_collection->follow_store_all($where,$order,$field,$offset,$page_size);
        return $list;
    }
    /**
     * 推荐店铺
     * 邓赛赛
     */
    public function tj_store_list($where,$order='sc.sc_id desc',$field='*',$page,$page_size){
        $offset = ($page-1) * $page_size;
        $list = $this->store_collection->tj_store($where,$order,$field,$offset,$page_size);
        return $list;
    }

    /**
     * @param $where
     * @return bool|int|string
     * 关注店铺数量
     * 邓赛赛
     */
    public function get_num($where){
        $num = $this->store_collection->get_count_num($where);
        return $num;
    }

    /**
     * 店铺粉丝列表
     * 邓赛赛
     */
    public function fans_list($where,$order,$field,$page,$page_size){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page - 1) * $page_size;
        $list = $this->store_collection->get_fans_list($where,$order,$field,$offset,$page_size);
        return $list;
    }

}