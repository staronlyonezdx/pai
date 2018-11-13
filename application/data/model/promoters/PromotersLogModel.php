<?php
/**
* 设置Model
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\model\promoters;
use app\data\model\BaseModel as BaseModel;
use think\Db;

class PromotersLogModel extends BaseModel
{	
    protected $db = 'promoters_log' ;//定时任务log表


}