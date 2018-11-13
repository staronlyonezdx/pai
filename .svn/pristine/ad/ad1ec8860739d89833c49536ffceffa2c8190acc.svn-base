<?php
/**
* 新闻单页Service
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\peanutLog;
use app\data\model\peanutLog\PeanutLogModel;
use app\data\service\BaseService as BaseService;

class PeanutLogService extends BaseService
{
	protected $cache = 'peanut_log';
	
	public function __construct()
	{
		parent::__construct();
		$this->peanut_log = new PeanutLogModel();
		$this->cache = 'peanut_log';
		
	}

    /**
     * 添加数据
     * 邓赛赛
     */
    public function get_add($data=[],$cache=''){
        $res = $this->peanut_log->getAdd($data,$cache);
        return $res;
    }
    /**
     * 删除数据
     * 邓赛赛
     */
    public function get_del($where=[],$cache=''){
        $res = $this->peanut_log->getDel($where,$cache);
        return $res;
    }
    /**
     * 修改数据
     * 邓赛赛
     */
    public function get_save($where=[],$data=[],$cache=''){
        $res = $this->peanut_log->getSave($where,$data,$cache);
        return $res;
    }

    /**
     * 搜索列表
     * 邓赛赛
     */
    public function get_list($where=[],$order='pl_id desc',$field='*',$cache=''){
        $list = $this->peanut_log->getList($where,$order,$field,$cache);
        return $list;
    }

    /**
     * limit搜索列表
     * 邓赛赛
     */
    public function get_limit($whre=[],$order='ps_id desc',$field='*',$page=1,$page_size=20){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page - 1) * $page_size;
        $list  = $this->peanut_log->get_limit_list($whre,$order,$field,$offset,$page_size);
        return $list;
    }

    /**
     * 关键词分组查询
     * 邓赛赛
     */
    public function get_group_list($where=[], $field='*', $order, $page=1,$page_size=10, $group='ps_keyword',$cache=''){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page - 1) * $page_size;
        $list = $this->peanut_log->getGroupPaginate($where, $field, $order, $offset,$page_size, $group,$cache);
        return $list;
    }

    /**
     * 分页查询
     * 邓赛赛
     */
    public function get_page($where, $field, $order, $page,$cache=''){
        $list = $this->peanut_log->getPaginate($where, $field, $order, $page,$cache);
        return $list;
    }

    /**
     *获取单条消息
     * 邓赛赛
     */
    public function get_info($where=[],$field='*'){
        $info = $this->peanut_log->getInfo($where,$field);
        return $info;
    }

    /**
     * 获取单个字段
     * 邓赛赛
     */
    public function get_value($where=[],$field='*'){
        $value = $this->peanut_log->get_value($where,$field);
        return $value;
    }

    /**
     * 获取某列的值
     * 邓赛赛
     */
    public function get_column($where=[],$field){
        $list = $this->peanut_log->getColumn($where,$field);
        return $list;
    }
    /**
     * 统计条数
     * 邓赛赛
     */
    public function get_count($where){
        $list = $this->peanut_log->getCount($where);
        return $list;
    }


}