<?php
/**
* 图片类型Model
*-------------------------------------------------------------------------------------------
* 版权所有 杭州拍吖吖科技有限公司
* 创建日期 2018-07-02
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\model\webImagesType;
use app\data\model\BaseModel as BaseModel;
use think\Db;
class WebImagesTypeModel extends BaseModel
{	
    protected $db = 'web_images_type';//图片类型

    /**
     * @param $where
     * @param $order
     * @param $field
     * @param string $cache
     * @return false|\PDOStatement|string|\think\Collection
     * 查询首页图片
     * 邓赛赛
     */
    public function webImg($where,$order,$field,$cache=''){
        $list = Db::table($this->tbale)
            ->alias('wit')
            ->where($where)
            ->join('pai_web_images wi','wi.wit_id = wit.wit_id','left')
            ->order($order)
            ->field($field)
            ->select();
        return $list;
    }

}