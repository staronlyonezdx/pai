<?php
/**
* 地址Model
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\model\businessAuth;
use app\data\model\BaseModel;
use think\Db;
use think\Request;
    class BusinessAuthModel extends BaseModel
{
    protected $db = 'business_auth' ;//入驻申请表

    public function getBusinessAuth($where, $order, $field)
    {
        $list = Db::table($this->tbale)->field($field)->where($where)->order($order)->paginate(20, false, [
            'query' => Request::instance()->param()]);
        return $list;
    }

    public function dataSave($where, $data)
    {
        if (!$data || !$where)
        {
            return false;
        }
        $save = Db::table($this->tbale)->where($where)->update($data);
        return $save;
    }
}