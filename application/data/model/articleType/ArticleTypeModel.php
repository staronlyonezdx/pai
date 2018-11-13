<?php
/**
* 文章分类规格Model
*-------------------------------------------------------------------------------------------
* 版权所有 杭州拍吖吖科技有限公司
* 创建日期 2018-07-14
* 版本 v.1.0.0
* 网站：www.pai.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\model\articleType;
use app\data\model\BaseModel as BaseModel;

class ArticleTypeModel extends BaseModel
{	
  protected $db = 'article_type';//文章分类规格
    /**
     * type和article关联查询
     * 邓赛赛
     */
    public function typeJoinArticle($where,$order,$field){
        $list = Db($this->db)
            ->alias('at')
            ->join('article a','at.at_id = a.a_type','left')
            ->where($where)
            ->order($order)
            ->field($field)
            ->find();
        return $list;
    }
	
}