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

namespace app\data\model\withdraw;
use app\data\model\BaseModel as BaseModel;
use app\data\service\BaseService;
use think\Db;
use think\Request;
class WithdrawModel extends BaseModel
{
    protected $db = 'withdraw' ;//提现申请表


    public function get_page($where,$field){
        $list = Db::table($this->tbale)
            ->alias('w')
            ->where($where)
            ->field($field)
            ->join('pai_member m','w.w_mid=m.m_id')
            ->paginate(20,false,['query' => Request::instance()->param()]);
        return $list;
    }

}