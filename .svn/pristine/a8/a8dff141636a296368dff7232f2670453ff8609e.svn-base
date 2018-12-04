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

namespace app\data\service\playRule;
use app\data\model\playRule\PlayRuleModel;
use app\data\service\BaseService as BaseService;
class PlayRuleService extends BaseService
{
    protected $cache = 'play_rule';
    protected $pid = 0;

    public function __construct()
    {
        parent::__construct();
        $this->play_rule = new PlayRuleModel();
        $this->cache = 'play_rule';
    }

    /**
     * 删除
     * 邓赛赛
     */
    public function dt_del($where){
        $res = $this->play_rule->getDel($where,'');
        return $res;
    }

    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where,$order='pr_id asc',$field='*'){
        $res = $this->play_rule->getList($where,$order,$field,"");
        return $res;
    }

    /**
     * 获取单条
     * 邓赛赛
     */
    public function get_info($where,$field='*'){
        $res = $this->play_rule->getInfo($where,$field);
        return $res;
    }

    /**
     * 获取某值
     * 邓赛赛
     */
    public function get_value($where,$field='*'){
        $res = $this->play_rule->get_value($where,$field);
        return $res;
    }

    /**
     * 获取某列
     * 邓赛赛
     */
    public function get_column($where,$field='*'){
        $res = $this->play_rule->getColumn($where,$field);
        return $res;
    }

    /**
     * 统计
     * 邓赛赛
     */
    public function get_count($where){
        $res = $this->play_rule->getCount($where);
        return $res;
    }





}