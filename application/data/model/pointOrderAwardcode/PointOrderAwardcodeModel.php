<?php
/**
 * 积分中奖码Model
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州拍吖吖科技有限公司
 * 创建日期 2018-07-07
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\model\PointOrderAwardcode;

use app\data\model\BaseModel as BaseModel;
use think\Db;
use think\Cache;

class PointOrderAwardcodeModel extends BaseModel
{
    protected $db = 'point_order_awardcode'; //中奖码

}