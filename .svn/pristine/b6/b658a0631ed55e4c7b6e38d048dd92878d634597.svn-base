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
use app\data\model\member\MemberAttestationModel;
use app\data\service\BaseService as BaseService;
class MemberAttestationService extends BaseService
{
    protected $cache = 'member_attestation';

    public function __construct()
    {
        parent::__construct();
        $this->member_attestation = new MemberAttestationModel();
        $this->cache = 'member_attestation';
    }

    /**
     * 修改数据
     * 邓赛赛
     */
    public function get_save($where,$data,$cache=''){
        $res = $this->member_attestation->getSave($where,$data,$cache);
        return $res;
    }
    /**
     * 增加数据
     * 邓赛赛
     */
    public function get_add($data){
        $res = $this->member_attestation->getAdd($data, '');
        return $res;
    }
    /**
     * 获取单条数据
     * 邓赛赛
     */
    public function get_info($where,$field){
        $info = $this->member_attestation->getInfo($where,$field);
        return $info;
    }

    /**
     * 获取单个字段
     * 邓赛赛
     */
    public function get_value($where,$field){
        $value = $this->member_attestation->get_value($where,$field);
        return $value;
    }

    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where=[],$order='member_level asc',$field='*',$cache=''){
        $list = $this->member_attestation->getList($where,$order,$field,$cache);
        return $list;
    }

    /**
     *limit列表
     * 邓赛赛
     */
    public function get_limit($where,$order='',$field='*',$offset='0',$page_size='5'){
        $list = $this->member_attestation->get_limit_list($where,$order,$field,$offset,$page_size);
        return $list;
    }
    /**
     *获取某列值
     * 邓赛赛
     */
    public function get_colmn($where,$order='ml_id asc',$field='*',$offset='0',$page_size='5'){
        $list = $this->member_attestation->getColumn($where,$order,$field,$offset,$page_size);
        return $list;
    }
    /**
     *获取某列值
     * 邓赛赛
     */
    public function get_count($where){
        $list = $this->member_attestation->getCount($where);
        return $list;
    }






}