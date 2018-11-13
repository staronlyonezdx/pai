<?php
/**
 * User: Shine
 * Date: 2018/9/3
 * Time: 20:19
 */
namespace app\data\service\promoters;

use app\data\model\promoters\PromotersLogModel;
use app\data\service\BaseService;
use think\Db;

class PromotersLogService extends BaseService{
    protected $cache = 'promoters_frozen';

    public function __construct()
    {
        parent::__construct();
        $this->promoters = new PromotersLogModel();
        $this->cache = 'promoters_frozen';
    }

    /**
     * 获取某条
     * 邓赛赛
     */
    public function get_info($where,$field = '*'){
        $info = $this->promoters->getInfo($where,$field);
        return $info;
    }
    /**
     * 获取某值
     * 邓赛赛
     */
    public function get_value($where,$field = '*'){
        $info = $this->promoters->get_value($where,$field);
        return $info;
    }
    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where=[], $order, $field='*', $cache=''){
        $info = $this->promoters->getList($where, $order, $field, $cache);
        return $info;
    }
    /**
     * 获取列表（分页）
     * 邓赛赛
     */
    public function get_page_list($where=[], $field, $order, $page_size, $cache=''){
        $info = $this->promoters-> getPaginate($where, $field, $order, $page_size, $cache);
        return $info;
    }

    /**
     * 获取某列
     * 邓赛赛
     */
    public function get_column($where=[], $field='*'){
        $info = $this->promoters->getColumn($where, $field);
        return $info;
    }
    /**
     * 统计数据
     * 邓赛赛
     */
    public function get_count($where=[], $field='*'){
        $info = $this->promoters->getCount($where);
        return $info;
    }
    /**
     * 插入数据
     * 邓赛赛
     */
    public function get_add($data){
        $info = $this->promoters->getAdd($data);
        return $info;
    }
    /**
     * 更新数据
     * 邓赛赛
     */
    public function get_save($where=[], $data){
        $info = $this->promoters->getSave($where,$data);
        return $info;
    }



}