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

namespace app\data\model\frozen;
use app\data\model\BaseModel as BaseModel;

class FrozenModel extends BaseModel
{	
  protected $db = 'frozen' ;//冻结表
    public function getLastInfo($field='*',$m_id){
        $info = Db($this->db)->where('m_id',$m_id)->order('f_id desc')->field($field)->find();
        return $info;
    }

}