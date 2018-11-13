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

class RechargeService extends BaseService
{
	protected $cache = 'data_recharge';
	
	public function __construct()
	{
		parent::__construct();	
		$this->member = new DataReportModel();
		$this->cache = 'data_recharge';
	}
    /**
     * 读取消息
     */
    public function get_recharge_list($where){
        $table="recharge";
        $page=input("get.page");
        if(empty($page)){
            $page="1";
        }
        $pagenum=input("get.pagenum");
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($page-1)*$pagenum;
        $sql="select m.m_id, m.m_name,m_avatar,r.r_money,r.r_for,r.r_type,r.r_time from pai_recharge r LEFT JOIN  pai_member m on r.m_id=m.m_id WHERE ".$where." order by r.r_time desc limit $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        foreach($list as $k=>$v){
            switch($v['r_type']){
                case '1':
                    $list[$k]['r_type_name']="微信公众号支付";
                    break;
                case '2':
                    $list[$k]['r_type_name']="微信H5支付";
                    break;
                case '3':
                    $list[$k]['r_type_name']="支付宝H5支付";
                    break;
                case '4':
                    $list[$k]['r_type_name']="银行卡支付";
                   break;
                case '5':
                    $list[$k]['r_type_name']="余额支付";
                    break;
                case '6':
                    $list[$k]['r_type_name']="微信APP支付";
                    break;
                case '7':
                    $list[$k]['r_type_name']="支付宝APP支付";
                    break;
                 default:
                    $list[$k]['r_type_name']="其他";
            }
            switch($v['r_for']){
                case '1':
                    $list[$k]['r_for_name']="余额充值";
                    break;
                case '2':
                    $list[$k]['r_for_name']="花生充值";
                    break;
                default:
                    $list[$k]['r_for_name']="其他";
            }
        }
        return $list;
    }
    public function get_recharge_count($where){
        $table="recharge";
        $sql="select count(r_id) as n from pai_recharge WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $n=0;
        if(!empty($list)){
            $n=$list[0]['n'];
        }
        return $n;
    }
    public function get_r_count($where){
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
        $sql="select sum(r_money) as n, FROM_UNIXTIME(r_time,'%Y-%m-%d') r_time from pai_recharge WHERE ".$where." group by FROM_UNIXTIME(r_time,'%Y-%m-%d') ";
        $list=Db::table($table)->query($sql);
        return $list;
    }
    //读取充值总金额
    public function get_r_money_sum($where){
        $table="recharge";
        $sql="select sum(r_money) as n from pai_recharge WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $n='0.00';
        if(!empty($list[0]['n'])){
         $n=$list[0]['n'];
        }
        return $n;
    }


	
}