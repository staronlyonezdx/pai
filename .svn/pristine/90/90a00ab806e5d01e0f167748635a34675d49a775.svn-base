<?php
/**
 * Created by PhpStorm.
 * User: shine
 * Date: 2018/8/15
 * Time: 11:56
 */

namespace app\data\model\popularity;

use app\data\model\BaseModel as BaseModel;
use think\Db;

class PopularityMemberModel extends BaseModel
{
    protected $db = 'popularity_member';//参加人气商品的擂主和会员表

    /**
     * 获取人气列表和用户头像
     * 邓赛赛
     */
    public  function popularityMemberJoinMember($where,$order,$field,$offset,$page_size){
        $list = Db($this->db)
            ->alias('pm')
            ->join('pai_member m','pm.m_id=m.m_id','left')
            ->where($where)
            ->order($order)
            ->field($field)
            ->limit($offset,$page_size)
            ->select();
        return $list;
    }
}