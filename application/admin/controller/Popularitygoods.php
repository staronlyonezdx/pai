<?php
namespace app\admin\controller;

use app\data\service\popularity\PopularityGoodsService;
use app\data\service\popularity\PopularityService;
use app\data\model\goods\GoodsModel;
use think\Db;
use app\data\service\BaseService as BaseService;
use think\Request;
use think\Url;
use think\Response;

class Popularitygoods extends AdminHome
{

    /**
     * 人气商品列表
     */
     public function goodslist()
	{
        $goods =  new PopularityService();
        $field = '*';
        $where=[
            'pg_type'=>['<>',3]
        ];
        $list = $goods->popularity_goods_list($where,$field,'pg_sortnum desc');
        $page = $list->render();
        $total = $list->total();

        $num = empty(input('get.page')) ? 1 : input('get.page');    //当前页
        $this->assign(['list'=>$list,'page'=>$page,'total'=>$total,'num'=>$num]);
        return $this->fetch();

	}

	/**
     * 人气商品添加、修改
     */
	public function edit(){

	    $pg_id = input('request.pg_id', 0);
        $goods = new PopularityService();
        $p_goods = new PopularityGoodsService();
        $mid = 1;

        //表单提交
        if (request()->isPost()){
            //表单数据
            $type = 'add';
            if( $pg_id > 0 ){
                $type = 'edit';
            }
            $data = $goods->inputData($type);

            //表单验证
            $error_msg = $goods->checkData($data);
            if ($error_msg) {
                $this->error($error_msg, url('popularitygoods/edit') . "?pg_id=" . $pg_id, 3);
            }

            if(!empty($data['pg_img']) && is_array($data['pg_img']) ){
                $Img = new GoodsModel();
                $data['pg_img'] = array_values(array_filter($data['pg_img']));
                $imgs = $Img->ba64_img($data['pg_img'],'popularitygoods');
            }else{
                $imgs[0]='';
            }

            if ($pg_id) {
                // 修改
                $where_save['pg_id'] = $pg_id;
                $data['update_time'] = time();
                $periods = $goods->popularityGoodsInfo($where_save,'pg_img,pg_periods,end_time');
                if ($periods['end_time'] < time()){
                    $data['pg_periods'] = $periods['pg_periods'] + 1;
                }
                if (empty($periods['pg_img'])){
                    $data['pg_img'] = $imgs[0];
                }
                $res    = $goods->popularitySave($where_save, $data);

                //添加新增图片
                if (!empty($imgs)){
                    $result = $goods->goodsImgAdd($pg_id,$imgs);
                }else{
                    $result = 1;
                }

                $path_3 = '/uploads/code/popularity/shop/'.$mid.'code_'.$pg_id.".jpg";
                $info   = $p_goods->hebingImg('/uploads/logo/father.png',$data['pg_img'],$path_3,$data['pg_name'],$data['pg_price'],$mid,$pg_id);

                if (!$res || !$result || !$info) {
                    $this->error('商品修改失败', url('popularitygoods/edit') . "?pg_id=" . $pg_id, 3);
                }
                $this->success("商品修改成功！", url('popularitygoods/goodslist'), 3);
            } else {
                //添加
                if(isset($imgs) && !empty($imgs)){
                    $data['pg_img'] = $imgs[0];
                }
                $data['pg_periods'] = 1;
                $data['pg_state']   = 1;
                $res    = $goods->popularityAdd($data);
                $info   = $goods->goodsImgAdd($res,$imgs);

                //生成分享详情二维码
                $path_3 = '/uploads/code/popularity/shop/'.$mid.'code_'.$res.".jpg";
                $result  = $p_goods->hebingImg('/uploads/logo/father.png',$data['pg_img'],$path_3,$data['pg_name'],$data['pg_price'],$mid,$res);

                if (!$res || !$info || !$result) {
                    $this->error('商品添加失败', url('popularitygoods/edit'), 3);
                }
                $this->success("商品添加成功！", url('popularitygoods/goodslist'), 3);
            }
        }

        //查询人气商品详情
        $info=[];
        if($pg_id){
            $where_find['pg_id']=$pg_id;
            $info = $goods->popularityGoodsInfo($where_find);
            $info['pg_imgs'] = $goods->popularityImgs($where_find);
            if(empty($info)){
                $this->error("非法请求，商品不存在！", url('popularitygoods/goodslist'), 3);
            }
        }

        $this->assign('info',$info);
        $this->assign('pg_id',$pg_id);
        return $this->fetch();

    }

    /**
     * @return mixed
     * 删除图片
     */
    public function delete_img()
    {
        $data = input('post.');
        $where = [
            'pgi_id' => $data['pgi_id'],
            'pg_id' => $data['pg_id']
        ];
        $goods = new PopularityService();
        $info   = $goods->goodsImgDel($where);
        if(is_file("uploads/code/popularity/shop/1merge_".$data['pg_id'].'.jpg')){
            unlink("uploads/code/popularity/shop/1merge_".$data['pg_id'].'.jpg');
        }

        return $info;
    }


    /**
     * 人气商品删除
     */
    public function delete()
    {
        $pg_id = input('request.pg_id', 0);
        if (!$pg_id || !is_numeric($pg_id)) {
            $this->error("非法请求！", url('popularitygoods/goodslist'), 3);
        }

        $goods = new PopularityService();

        // 删除
        $res = $goods->popGoodsDel(['pg_id' => $pg_id]);

        if (!$res) {
            $this->error("人气商品删除失败！", url('popularitygoods/goodslist'), 3);
        }

        $this->success("人气商品删除成功！", url('popularitygoods/goodslist'), 3);
    }



}
