<?php
/**
 * 公共Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 广州市素材火信息科技有限公司
 * 创建日期 2017-07-12
 * 版本 v.1.0.0
 * 网站：www.sucaihuo.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\service\goods;
use app\data\model\goods\GoodsModel  as GoodsModel;
use app\data\model\GoodsProduct\GoodsProductModel;
use app\data\service\admit\AdmitService;
use app\data\service\BaseService as BaseService;
use app\data\service\goodsCategory\GoodsCategoryService;
use app\data\service\goods\GoodsProductService;
use app\data\service\goodsImgs\GoodsImgsService;
use app\data\service\member\MemberService;
use think\Cookie;
use think\Loader;
use think\Db;
class GoodsApiService extends BaseService
{
    protected $cache = 'goods';
    protected $pid = 0;

    public function __construct()
    {
        parent::__construct();
        $this->goods = new GoodsModel();
        $this->cache = 'goods';
        //dump($this->pid);die;
    }
    /**
     * 读取我的商品列表
     */
    public function get_my_goods_list($where,$fields,$order,$curpage='1',$pagenum='100'){
        $table="goods";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT ".$fields." FROM pai.pai_goods g LEFT JOIN pai.pai_goods_product gp ON g.g_id=gp.g_id WHERE ".$where." ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        foreach($list as $k=>$v){
            $sql1="SELECT MAX(gdr_price) max_price,MIN(gdr_price) min_price FROM pai_goods_dt_record WHERE g_id=".$v['g_id'];
            $info=Db::table($table)->query($sql1);
            if(!empty($info)){
                $list[$k]['max_price']=$info[0]['max_price'];
                $list[$k]['min_price']=$info[0]['min_price'];
            }
            else{
                $list[$k]['max_price']=$v['gp_sale_price'];
                $list[$k]['min_price']=$v['gp_sale_price'];
            }
        }
        return $list;
    }
    public function get_my_goods_list_count($where){
        $table="goods";
        $sql="SELECT count(g.g_id) as totalnum FROM pai.pai_goods g LEFT JOIN pai.pai_goods_product gp ON g.g_id=gp.g_id WHERE ".$where;
        $list=Db::table($table)->query($sql);
        $count=$list[0]['totalnum'];
        return $count;
    }



}