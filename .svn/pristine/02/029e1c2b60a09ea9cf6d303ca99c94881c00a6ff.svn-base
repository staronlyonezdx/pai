<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\goodsBrand\GoodsBrandService as GoodsBrandService;

use think\Db;
use think\Db\Query;
use think\paginator\driver;

class Goodsbrand extends AdminHome
{	
	/*
	* 商品品牌列表
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/	
	public function index()
	{
        $goodsbrand = new GoodsbrandService();
        $list = $goodsbrand->goodsBrandPaginate('','*','gb_id desc',10);

        $page = $list->render();
        $total = $list->total();

        $this->assign('page', $page);
        $this->assign('total', $total);
        $this->assign('list', $list);
		return $this->fetch();
	}
	
	/*
	* 商品品牌编辑
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/	
	public function edit()
	{
        $gb_id = input('request.gb_id',0);
        $goodsbrand = new GoodsbrandService();

        //表单提交
        if(request()->isPost()){
            $file = request()->file();

            $base = new BaseService();
            if(!empty($file)){
                $back = $base->upload('gb_img', 'gb_img', 2);
                $data['gb_img'] = $back['info'];
            }
            //表单数据
            $data['gb_name'] = input('post.gb_name','');
            $data['gb_state'] = input('post.gb_state',0);


            //表单验证
            $error_msg = $goodsbrand->checkData($data);
            if($error_msg){
                $this->error($error_msg, url('goodsbrand/edit')."?gb_id=".$gb_id, 3);
            }

            if($gb_id){
                // 修改
                $where_save['gb_id'] = $gb_id;
                $res = $goodsbrand ->goodsBrandSave($where_save, $data);
                if(!$res){
                    $this->error('修改品牌失败', url('goodsbrand/edit')."?gb_id=".$gb_id, 3);
                }
                $this->success("修改品牌成功！", url('goodsbrand/index'), 3);
            }else{
                //添加
                $res = $goodsbrand ->goodsBrandAdd($data);
                if(!$res){
                    $this->error('添加品牌失败', url('goodsbrand/edit'), 3);
                }
                $this->success("添加品牌成功！", url('goodsbrand/index'), 3);
            }
        }

        //查询分类详情
        $info=[];
        if($gb_id){
            $where_find['gb_id']=$gb_id;
            $info = $goodsbrand->goodsBrandInfo($where_find);
            if(empty($info)){
                $this->error("非法请求，品牌不存在！", url('goodsbrand/index'), 3);
            }
        }

        //分类列表
        $this->assign('info', $info);
        $this->assign('gb_id', $gb_id);
		return $this->fetch();
	}
	
	/*
	* 商品品牌删除
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/
	public function delete()
	{
        $gb_id = input('request.gb_id',0);
        if(!$gb_id || !is_numeric($gb_id)){
            $this->error("非法请求！", url('goodsbrand/index'), 3);
        }
        $goodsbrand = new GoodsbrandService();

        // 删除
        $res = $goodsbrand->goodsbrandDel(['gb_id'=>$gb_id]);
        if(!$res){
            $this->error("品牌删除失败！", url('goodsbrand/index'), 3);
        }
        $this->success("品牌删除成功！", url('goodsbrand/index'), 3);
	}
}
