<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\review\ReviewgoodsService as ReviewgoodsService;
use app\data\service\review\ReviewgoodsimgsService as ReviewgoodsimgsService;
use app\data\service\review\RevieworderService as RevieworderService;
use think\Db;

class Review extends AdminHome
{
    /*
    * 订单评价列表
    * 创建人 刘勇豪
    * 时间 2018-07-11 10:40:00
    */
    public function index()
    {
        $reviewOrder = new RevieworderService();
        $list = $reviewOrder->reviewOrderDetailPaginate(['ro.state'=>0], '*', "ro.ro_id desc",10);
        $page = $list->render();
        $total = $list->total();

        $list = $list->toArray();
        $list = $list['data'];

        // 获取评价图片
        if(!empty($list)){
            $reviewgoodsimgs = new ReviewgoodsimgsService();
            foreach($list as $k => $v){
                $rg_id = $v['rg_id'];
                $img_list = [];
                if($rg_id){
                    $img_list = $reviewgoodsimgs->reviewGoodsImgsList(['rg_id'=>$rg_id]);
                }
                $list[$k]['img_list'] = $img_list;
            }
        }

        $this->assign('list', $list);
        $this->assign('page', $page);
        $this->assign('total', $total);
        return $this->fetch();
    }


    /*
    * 拍品订单删除
    * 创建人 刘勇豪
    * 时间 2018-07-09 10:40:00
    */
    public function delete()
    {
        $ro_id = input('request.ro_id', 0);
        if (!$ro_id || !is_numeric($ro_id)) {
            $this->error("非法请求！", url('Review/index'), 3);
        }

        $reviewOrder = new RevieworderService();
        $res = $reviewOrder->myOrderDeiete($ro_id);
        if($res){
            $this->success("订单评价删除成功！", url('review/index'), 3);
        }else{
            $this->error("订单评价删除失败！", url('review/index'), 3);
        }
    }
}
