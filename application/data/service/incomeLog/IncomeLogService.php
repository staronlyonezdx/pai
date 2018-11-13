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

namespace app\data\service\incomeLog;
use app\data\model\incomeLog\IncomeLogModel  as IncomeLogModel;
use app\data\service\BaseService as BaseService;
use think\Db;
class IncomeLogService extends BaseService
{
	protected $cache = '';
	
	public function __construct()
	{
		parent::__construct();
		
		$this->cache = 'incomelog';
		$this->incomelog = new IncomeLogModel();
	}

    /**
     * 所得明细列表
     * 邓赛赛
     */
    public function get_limits($where,$order,$field,$page=1,$page_size=20){
        if($page <= 0)$page = 1;
        $start_num = ($page-1)*$page_size;
        $list = $this->incomelog ->get_limits($where,$order,$field,$start_num,$page_size);
        foreach($list as $k =>$v){
            $list[$k]['m_mobile'] = $this->decrypt($v['m_mobile']);
        }
        $total_num=count($list);
        $total_page = ceil($total_num/$page_size);
        $data = [
            'list'=>$list,
            'page'=>$page,
            'num'=>count($list),
            'page_size'=>$page_size,
            'total_num'=>$total_num,
            'total_page'=>$total_page,
        ];
        return $data;
    }

    /**
     *查询某一列的值
     * 邓赛赛
     */
    public function get_column($where,$field){
        $list = $this->incomelog->getColumn($where,$field);
        return $list;
    }
	
	
}