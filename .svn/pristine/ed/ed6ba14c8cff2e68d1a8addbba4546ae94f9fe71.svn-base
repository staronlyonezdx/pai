<?php
/**
 * Created by PhpStorm.
 * User: shine
 * Date: 2018/8/15
 * Time: 11:26
 */

namespace app\data\service\popularity;

use app\data\model\popularity\PopularityMemberModel;
use app\data\service\BaseService;
use think\Db;

class PopularityMemberService extends BaseService{

    protected $cache = 'popularity_member';

    public function __construct()
    {
        parent::__construct();
        $this->popularity_member = new PopularityMemberModel();
        $this->cache = 'popularity_member';
    }

    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where,$order='g_id desc',$field,$cache){
        $list = $this->popularity_member->getList($where,$order,$field,$cache);
        return $list;
    }

    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_limit($where,$order,$field,$page=1,$page_size=20,$cache=''){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page - 1) * $page_size;
        $list = $this->popularity_member->get_limit_list($where,$order,$field,$offset,$page_size,$cache);
        return $list;
    }

    /**
     * 获取列表
     * 邓赛赛
     */
    public function join_member($where,$order,$field,$page=1,$page_size=20,$cache=''){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page - 1) * $page_size;
//        $list = $this->popularity_member->get_limit_list($where,$order,$field,$offset,$page_size,$cache);
        $list = Db::table('pai_popularity_member pm')
            ->join('pai_member m','pm.m_id = m.m_id','left')
            ->join('pai_popularity_goods pg','pm.pg_id = pg.pg_id','right')
            ->where($where)
            ->limit($offset,$page_size)
            ->field($field)
            ->order($order)
            ->select();
        return $list;
    }

    /**
     * 获取一条
     * 创建人 邓赛赛
     * 时间 2017-07-14 11:40:09
     */
    public function get_info($where='', $field='*')
    {
        $info =  $this->popularity_member->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 添加一条数据
     * 创建人 邓赛赛
     * 时间 2017-09-10 20:10:00
     */
    public function get_add($data='')
    {
        $list = $this->popularity_member->getAdd($data, $this->cache);
        return $list;
    }

    /**
     *删除一条
     * 邓赛赛
     */
    public function get_del($where,$cache=''){
        $list = $this->popularity_member->getDel($where, $cache);
        return $list;
    }

    /**
     * 条件统计
     * 创建人 邓赛赛
     * 时间 2017-07-14 11:40:09
     */
    public function get_count($where='')
    {
        $Count =  $this->popularity_member->getCount($where);
        return $Count;
    }

    /**
     * 查询某值
     * 创建人 邓赛赛
     * 时间 2017-07-14 11:40:09
     */
    public function get_value($where='',$field='')
    {
        $Count =  $this->popularity_member->get_value($where,$field);
        return $Count;
    }
    /**
     * 查询某一列的值
     * 创建人 邓赛赛
     * 时间 2017-09-06 22:31:22
     */
    public function get_column($where='', $field='')
    {
        $Column =  $this->popularity_member->getColumn($where, $field);
        return $Column;
    }

    /**
     * 获取人气列表(关联用户表获取头像和昵称)
     * 邓赛赛
     */
    public function popularity_member_join_member($where=[],$order='pm.pm_popularity desc,pm.pm_paytime asc',$field='*',$page=1,$page_size='20'){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page - 1) * $page_size;
        $list = $this->popularity_member->popularityMemberJoinMember($where,$order,$field,$offset,$page_size);
        return $list;
    }





}