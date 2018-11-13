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

namespace app\data\model\pointGoods;
use app\data\model\BaseModel as BaseModel;
use think\Db;
class GoodsCollectionModel extends BaseModel
{	
  protected $db = 'point_goods_collection' ;//商品收藏表
  //protected $pid = 0 ;//分类

    /**
     * 删除多个收藏商品
     * 邓赛赛
     */
    public function del_multiple($where){
        $res = Db($this->db)->where($where)->delete();
        return $res;
    }

}