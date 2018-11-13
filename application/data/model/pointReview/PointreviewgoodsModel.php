<?php
/**
* 积分商品评价Model
*-------------------------------------------------------------------------------------------
* 版权所有 杭州拍吖吖科技有限公司
* 创建日期 2018-07-11
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\model\pointReview;
use app\data\model\BaseModel as BaseModel;
use think\Db;
use think\Cache;

class ReviewgoodsModel extends BaseModel
{	
  	protected $db = 'point_review_goods' ;//积分商品评价表

    /**
     * 获取平均值
     * 邓赛赛
     */
    public function get_avg($where,$field){
        $num = Db($this->db)->where($where)->avg($field);
        return $num;
    }
}