<?php
/**
* 管理员账户Model
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\model\incomeLog;
use app\data\model\BaseModel as BaseModel;
use think\Db;
class IncomeLogModel extends BaseModel
{	
        protected $db = 'income_log' ;//income_log表

        public function get_limits($where,$order,$field,$start_num,$page_size){
            $list = Db($this->db)->alias('l')
                ->where($where)
                ->field($field)
                ->order($order)
                ->limit($start_num,$page_size)
                ->join('pai_member m','l.il_form_mid = m.m_id','left')
                ->select();
            return $list;
        }
}