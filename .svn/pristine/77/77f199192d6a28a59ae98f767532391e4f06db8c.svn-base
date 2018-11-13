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

namespace app\data\model\storeCategory;
use app\data\model\BaseModel;
use think\Db;
use think\Request;
    class storeCategoryModel extends BaseModel
{
    protected $db = 'store_category' ;//店铺分类表

    public function getCategory($sc_parent_id=0)
    {
       $list = Db($this->db)->where('sc_parent_id',$sc_parent_id)->select();
       foreach($list as $k => $v){
           $sc_parent_id = $v['sc_id'];
           $son = $this->getCategory($sc_parent_id);
           $list[$k]['status'] = empty($son) ? 0 :1;
           $list[$k]['son'] = $son;
       }
       return $list;
    }
}