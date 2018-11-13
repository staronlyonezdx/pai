<?php
/**
 * Created by PhpStorm.
 * User: shine
 * Date: 2018/8/15
 * Time: 11:26
 */

namespace app\data\service\popularity;

use app\data\service\BaseService;
use app\data\model\popularity\PopularityCollectionModel;
use think\Db;

class PopularityCollectionService extends BaseService{

    protected $cache = 'popularity_collection';

    public function __construct()
    {
        parent::__construct();
        $this->goods = new PopularityCollectionModel();
        $this->cache = 'popularity_collection';
    }
    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where,$order='g_id desc',$field,$cache){
        $list = $this->goods->getList($where,$order,$field,$cache);
        return $list;
    }
    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_limit($where,$order,$field,$page,$page_size){
        $page  = $page < 1 ? 1 : $page ;
        $offset = ($page - 1) * $page_size;
        $list = $this->goods->get_limit_list($where,$order,$field,$offset,$page_size);
        return $list;
    }
    /**
     * 获取一条
     * 创建人 邓赛赛
     * 时间 2017-07-14 11:40:09
     */
    public function get_info($where='', $field='*')
    {
        $info =  $this->goods->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 添加一条数据
     * 创建人 邓赛赛
     * 时间 2017-09-10 20:10:00
     */
    public function get_add($data='')
    {
        $list = $this->goods->getAdd($data, $this->cache);
        return $list;
    }

    /**
     *删除一条
     * 邓赛赛
     */
    public function get_del($where,$cache=''){
        $list = $this->goods->getDel($where, $cache);
        return $list;
    }

    /**
     * 条件统计
     * 创建人 邓赛赛
     * 时间 2017-07-14 11:40:09
     */
    public function get_count($where=[])
    {
        $Count =  $this->goods->getCount($where);
        return $Count;
    }

    /**
     * 查询某一列的值
     * 创建人 邓赛赛
     * 时间 2017-09-06 22:31:22
     */
    public function get_column($where='', $field='')
    {
        $Column =  $this->goods->getColumn($where, $field);
        return $Column;
    }

    /**
     * 查询最大期数
     * 创建人 邓赛赛
     */
    public function get_max_periods($pg_id, $field='pg_periods')
    {
        $where = [
            'pg_id'=>$pg_id
        ];
        $Column =  $this->goods->max_periods($where, $field);
        return $Column;
    }
    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_more_activities($where,$order,$field,$page,$page_size){
        $page  = $page < 1 ? 1 : $page ;
        $offset = ($page - 1) * $page_size;
        $list = $this->goods->more_activities($where,$order,$field,$offset,$page_size);
        return $list;
    }

    /**
     * 收藏商品
     * 邓赛赛
     */
    public function get_collection($m_id,$pg_id){
        //商品是否存在
        $p_goods = new PopularityGoodsService();
        $is_goods = $p_goods->get_count(['pg_id'=>$pg_id]);
        if(!$is_goods){
            return ['status'=>3,'msg'=>'未找到商品'];
        }
        //是否已经收藏
        $p_collection = new PopularityCollectionService();
        $where = [
            'm_id'=>$m_id,
            'pg_id'=>$pg_id,
        ];
        $is_collection = $p_collection->get_count($where);
        if($is_collection){
            $res = $p_collection->get_del($where);
            if($res){   return ['status'=>2,'msg'=>'已取消标记']; }
        }else{
            $data = [
                'add_time'=>time(),
                'm_id'    =>$m_id,
                'pg_id'   =>$pg_id,
            ];
            $res = $p_collection->get_add($data);
            if($res){   return ['status'=>1,'msg'=>'标记成功']; }
        }
        return ['status'=>0,'msg'=>'操作失败'];
    }




}