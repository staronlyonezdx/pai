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

namespace app\data\service\member;
use app\data\model\member\MemberLevelModel;
use app\data\service\BaseService as BaseService;
class MemberLevelService extends BaseService
{
    protected $cache = 'member_level';

    public function __construct()
    {
        parent::__construct();
        $this->member_level = new MemberLevelModel();
        $this->cache = 'member_level';
    }

    /**
     * 修改数据
     * 邓赛赛
     */
    public function get_save($where,$data,$cache=''){
        $res = $this->member_level->getSave($where,$data,$cache);
        return $res;
    }

    /**
     * 获取单条数据
     * 邓赛赛
     */
    public function get_info($where,$field){
        $info = $this->member_level->getInfo($where,$field);
        return $info;
    }

    /**
     * 获取单个字段
     * 邓赛赛
     */
    public function get_value($where,$field){
        $value = $this->member_level->get_value($where,$field);
        return $value;
    }

    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where=[],$order='member_level asc',$field='*',$cache=''){
        $list = $this->member_level->getList($where,$order,$field,$cache);
        return $list;
    }

    /**
     *等级列表
     * 邓赛赛
     */
    public function get_limit($where,$order='ml_id asc',$field='*',$offset='0',$page_size='5'){
        $list = $this->member_level->get_limit_list($where,$order,$field,$offset,$page_size);
        return $list;
    }




}