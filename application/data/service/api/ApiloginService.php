<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/30
 * Time: 20:29
 */

namespace app\data\service\api;


use app\data\service\BaseService;
use think\Db;

class ApiloginService extends BaseService
{
    /**
     * 获取单条数据
     * @param unknown $where
     * @param unknown $field
     */
    public function getInfo($where, $field='*')
    {
        $info =  Db('member')->field($field)->where($where)->find();
        return $info;
    }
    /**
     * 更新数据
     */
    public function getSave($where, $data, $cache='')
    {
        if (!$data || !$where)
        {
            return false;
        }
        $save = Db('member')->where($where)->update($data);
        return $save;
    }
}