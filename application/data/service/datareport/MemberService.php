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

namespace app\data\service\datareport;
use app\data\model\datareport\DatareportModel  as DatareportModel;
use app\data\service\BaseService as BaseService;
use think\Db;

class MemberService extends BaseService
{
	protected $cache = 'data_member';
	
	public function __construct()
	{
		parent::__construct();	
		$this->member = new DataReportModel();
		$this->cache = 'data_member';
	}
    /**
     * 读取消息
     */
    public function get_member_list($where){
        $table="member";
        $page=input("get.page");
        if(empty($page)){
            $page="1";
        }
        $pagenum=input("get.pagenum");
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($page-1)*$pagenum;
        $sql="select m.m_id, m.m_name,m_avatar,m.add_time from pai_member m WHERE ".$where." order by m_id desc limit $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        return $list;
    }
    public function get_member_count($where){
        $table="member";
        $page=input("get.page");
        if(empty($page)){
            $page="1";
        }
        $pagenum=input("get.pagenum");
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=$page*$pagenum;
        $sql="select count(m_id) as n, FROM_UNIXTIME(add_time,'%Y-%m-%d') add_time from pai_member WHERE ".$where." group by FROM_UNIXTIME(add_time,'%Y-%m-%d') ";
        $list=Db::table($table)->query($sql);
        return $list;
    }
    //读取会员总人数
    public function get_member_counts($where){
        $table="member";
        $sql="select count(m_id) as n from pai_member WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $n='0';
        if(!empty($list[0]['n'])){
         $n=$list[0]['n'];
        }
        return $n;
    }


	
}