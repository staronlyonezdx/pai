<?php
/**
 * 节分订单评价Model
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州拍吖吖科技有限公司
 * 创建日期 2018-07-12
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\model\pointReview;

use app\data\model\BaseModel as BaseModel;
use think\Db;
use think\Cache;

class PointReviewModel extends BaseModel
{
    protected $db = 'point_review_order'; //节分订单评价表
}