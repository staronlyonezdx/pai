<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\goodsSpec\GoodsSpecService as GoodsSpecService;

use think\Db;
use think\Db\Query;
use think\paginator\driver;

class Goodsspec extends AdminHome
{	
	/*
	* 商品属性列表
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/	
	public function index()
	{
        $goodsSpec = new GoodsSpecService();
        $list = $goodsSpec->goodsSpecList();

        $this->assign('list', $list);
		return $this->fetch();
	}
	
	/*
	* 商品属性编辑
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/	
	public function edit()
	{
        $gs_id = input('request.gs_id',0);
        $goodsSpec = new GoodsSpecService();

        //表单提交
        if(request()->isPost()){
            $file = request()->file();

            //表单数据
            $data['gs_name'] = input('post.gs_name','');
            $data['gs_state'] = input('post.gs_state',0);

            //表单验证
            $error_msg = $goodsSpec->checkData($data);
            if($error_msg){
                $this->error($error_msg, url('goodsspec/edit')."?gs_id=".$gs_id, 3);
            }

            if($gs_id){
                // 修改
                $where_save['gs_id'] = $gs_id;
                $res = $goodsSpec ->goodsSpecSave($where_save, $data);
                if(!$res){
                    $this->error('修改属性失败', url('goodsspec/edit')."?gs_id=".$gs_id, 3);
                }
                $this->success("修改属性成功！", url('goodsspec/index'), 3);
            }else{
                //添加
                $res = $goodsSpec ->goodsSpecAdd($data);
                if(!$res){
                    $this->error('添加属性失败', url('goodsspec/edit'), 3);
                }
                $this->success("添加属性成功！", url('goodsspec/index'), 3);
            }
        }

        //查询分类详情
        $info=[];
        if($gs_id){
            $where_find['gs_id']=$gs_id;
            $info = $goodsSpec->goodsSpecInfo($where_find);
            if(empty($info)){
                $this->error("非法请求，属性不存在！", url('goodsspec/index'), 3);
            }
        }

        //分类列表
        $this->assign('info', $info);
        $this->assign('gs_id', $gs_id);
		return $this->fetch();
	}
	
	/*
	* 商品属性删除
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/
	public function delete()
	{
        $gs_id = input('request.gs_id',0);
        if(!$gs_id || !is_numeric($gs_id)){
            $this->error("非法请求！", url('goodsspec/index'), 3);
        }
        $goodsSpec = new GoodsSpecService();

        // 删除
        $res = $goodsSpec->goodsspecDel(['gs_id'=>$gs_id]);
        if(!$res){
            $this->error("属性删除失败！", url('goodsspec/index'), 3);
        }
        $this->success("属性删除成功！", url('goodsspec/index'), 3);
	}
}
