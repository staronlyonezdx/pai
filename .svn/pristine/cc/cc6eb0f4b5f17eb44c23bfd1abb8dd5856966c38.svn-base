<?php
/**
* 管理员Service
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\moneyLog;
use app\data\model\moneyLog\MoneyLogModel;
use app\data\service\BaseService as BaseService;

class MoneyLogService extends BaseService
{
	
	protected $cache = 'money_log';
	
	public function __construct()
	{
		parent::__construct();
        $this->money_log = new MoneyLogModel();
        $this->cache = 'money_log';
	}

    /**
     * @param $data
     * @param string $cache
     * @return bool|int|string
     * 添加一条数据
     * 邓赛赛
     */
	public function get_add($data,$cache=''){
	    $res = $this->money_log->getAdd($data,$cache);
	    return $res;
    }

    /**
     * @param $data
     * @param string $cache
     * @return bool|int|string
     * 修改数据
     * 邓赛赛
     */
    public function get_save($where,$data,$cache=''){
        $res = $this->money_log->getSave($where,$data,$cache);
        return $res;
    }

    /**
     * 单条数据
     * 邓赛赛
     */
    public function get_info($where,$field='*'){
        $info = $this->money_log->getInfo($where,$field);
        return $info;
    }

    /**
     * 最大值
     * 邓赛赛
     */
    public function max_money($where,$money){
        $list =$this->money_log->maxMoney($where,$money);
        return $list;
    }

    /**
     * 统计
     * 邓赛赛
     */
    public function get_count($where){
        $num = $this->money_log->getCount($where);
        return $num;
    }
    /**
     * @param $where
     * @param string $order
     * @param string $field
     * @param string $cache
     * 账单列表
     * 邓赛赛
     */
    public function get_list($where,$order='ml_id desc',$field='*',$page=1,$page_size=20){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page-1) * $page_size;
        $list['list'] = $this->money_log->get_limit_list($where,$order,$field,$offset,$page_size);

        $total_num = $this->money_log->get_count_num($where);
        $total_page = ceil($total_num/$page_size);
        $new_num = count($list['list']);
        $list['total_num'] = $total_num;
        $list['total_page'] = $total_page;
        $list['new_num'] = $new_num;
        $list['page'] = $page;
        $list['page_size'] = $page_size;
        return $list;
    }
    /**
     * 计算金额总数
     * 邓赛赛
     */
    public function sum_ml_money($where){
        $sum = $this->money_log->sum_money($where,'ml_money');
        return $sum;
    }



}