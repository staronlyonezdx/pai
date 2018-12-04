<?php
namespace app\index\controller;
use app\data\service\article\ArticleService;
use app\data\service\articleType\ArticleTypeService;
use app\data\service\BaseService;
use app\data\service\config\ConfigService;
use app\data\service\goods\GoodsService;
use app\data\service\goodsCategory\GoodsCategoryService;
use app\data\service\member\MemberService;
use app\data\service\search\SearchHotService;
use app\data\service\search\SearchService;
use app\data\service\store\StoreService;
use app\data\service\webImagesType\WebImagesTypeService;
use app\member\controller\IndexHome;
use RedisCache\RedisCache;
use think\Controller;
use think\Cookie;
use think\Db;

class Datarepair extends IndexHome
{
    /**
     * 余额商品销售数量更新
     * 刘勇豪
     * http://www.pai.com/index/Datarepair/update_gp_salenum
     */
    public function update_gp_salenum(){
        $goods_lists = Db("goods_product")->select();

        $update = 0;
        if(!empty($goods_lists)){
            foreach($goods_lists as $v){
                $gp_id = $v['gp_id'];
                $gp_salenum = $v['gp_salenum'];

                $where = '';
                $where['gp_id'] = $gp_id;
                $where['o_state'] = ['IN','2,3,4,5'];

                $count = Db("order_pai")->where($where)->count();

                if($count != $gp_salenum){
                    $res = Db("goods_product")->where(['gp_id'=>$gp_id])->update(['gp_salenum'=>$count]);
                    $update++;
                }
            }
        }
        echo "更新完毕,共更新".$update."条";
    }

    /**
     * 积分商品销售数量更新
     * 刘勇豪
     * http://www.pai.com/index/Datarepair/update_point_salenum
     */
    public function update_point_salenum(){
        $goods_lists = Db("point_goods_product")->select();

        $update = 0;
        if(!empty($goods_lists)){
            foreach($goods_lists as $v){
                $gp_id = $v['gp_id'];
                $gp_salenum = $v['gp_salenum'];

                $where = '';
                $where['gp_id'] = $gp_id;
                $where['o_state'] = ['IN','2,3,4,5'];

                $count = Db("point_order_pai")->where($where)->count();

                if($count != $gp_salenum){
                    $res = Db("point_goods_product")->where(['gp_id'=>$gp_id])->update(['gp_salenum'=>$count]);
                    $update++;
                    //echo "gp_id".$gp_id."gp_salenum".$gp_salenum."count".$count."<br>";
                }
            }
        }
        echo "更新完毕,共更新".$update."条";
    }


}
