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

namespace app\data\service\frozen;
use app\data\model\frozen\FrozenModel;
use app\data\service\BaseService as BaseService;

class FrozenService extends BaseService
{
	
	protected $cache = 'frozen';
	
	public function __construct()
	{
		parent::__construct();
        $this->frozen = new FrozenModel();
        $this->cache = 'frozen';
	}

    /**
     * @param $data
     * @param string $cache
     * @return bool|int|string
     * 添加一条数据
     * 邓赛赛
     */
	public function get_add($data,$cache=''){
	    $res = $this->frozen->getAdd($data,$cache);
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
        $res = $this->frozen->getSave($where,$data,$cache);
        return $res;
    }

    /**
     * 获取最后一条数据
     * 邓赛赛
     */
    public function get_last_info($field,$m_id){
       $info = $this->frozen->getLastInfo($field,$m_id);
       return $info;
    }
}