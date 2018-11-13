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
use app\data\model\goods\GoodsDtRecordModel;
use app\data\service\BaseService as BaseService;
class GoodsDtRecordService extends BaseService
{
    protected $cache = 'goods_dt_record';
    protected $pid = 0;

    public function __construct()
    {
        parent::__construct();
        $this->goods_dt_record = new GoodsDtRecordModel();
        $this->cache = 'goods_dt_record';
        //dump($this->pid);die;
    }

    /**
     * 添加商品折扣和人人数
     * 邓赛赛
     */
    public function dt_insert($data){
        $res = $this->goods_dt_record->getAdd($data);
        return $res;
    }

    /**
     * 添加商品折扣和人人数(多条)
     * 邓赛赛
     */
    public function dt_insert_all($data,$cache=''){
        $res = $this->goods_dt_record->getAddAll($data,$cache);
        return $res;
    }

    /**
     * 删除商品折扣和人数
     * 邓赛赛
     */
    public function dt_del($where){
        $res = $this->goods_dt_record->getDel($where,'');
        return $res;
    }

    /**
     * @param $where
     * @param string $field
     * 获取折扣信息
     * 邓赛赛
     */
    public function get_list($where,$order='gdr_id desc',$field='*'){
        $res = $this->goods_dt_record->getList($where,$order,$field,"");
        return $res;
    }

    /**
     * @param $where
     * @param string $field
     * 获取折扣信息
     * 邓赛赛
     */
    public function get_join_discounttype($where,$field='dt.*,d.*'){
        $list = Db($this->cache)
            ->alias('dt')
            ->field($field)
            ->where($where)
            ->join('pai_goods_discounttype d','dt.gdt_id=d.gdt_id','left')
            ->select();
        return $list;
    }



}