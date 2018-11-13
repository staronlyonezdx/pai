<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\config\ConfigService as ConfigService;

use think\Db;
use think\Db\Query;
use think\paginator\driver;

class Config extends AdminHome
{	
	/*
	* 网站参数列表
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/	
	public function index()
	{
        $is_edit = input('param.is_edit',1);
        $config = new ConfigService();

        $where['c_is_edit'] = 1;
        if($is_edit){
            $where['c_is_edit'] = $is_edit;
        }
        $list = $config->configList($where);

        $this->assign('is_edit', $is_edit);
        $this->assign('list', $list);
		return $this->fetch();
	}
	
	/*
	* 网站参数编辑
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/	
	public function edit()
	{
        $c_id = input('param.c_id',0);
        $config = new ConfigService();

        //表单提交
        if(request()->isPost()){
            //表单数据
            $data['c_name'] = input('param.c_name','');
            $data['c_code'] = input('param.c_code','');
            $data['c_value'] = input('param.c_value','');
            $data['c_state'] = input('param.c_state',0);
            $data['c_is_edit'] = input('param.c_is_edit',1);

            //表单验证
            $error_msg = $config->checkData($data);
            if($error_msg){
                $this->error($error_msg, url('config/edit')."/c_id/".$c_id, 3);
            }

            if($c_id){
                // 修改
                $where_save['c_id'] = $c_id;
                $info = $config -> configInfo(['c_id'=>$c_id]);
                if(empty($info) || $info['c_is_edit'] != 1){
                    $this->error('参数不存在或不允许编辑', url('config/edit')."/c_id/".$c_id, 3);
                }

                $res = $config ->configSave($where_save, $data);
                if(!$res){
                    $this->error('修改网站参数失败', url('config/edit')."?c_id=".$c_id, 3);
                }
                $this->success("修改网站参数成功！", url('config/index'), 3);
            }else{
                //添加
                $res = $config ->configAdd($data);
                if(!$res){
                    $this->error('添加网站参数失败', url('config/edit'), 3);
                }
                $this->success("添加网站参数成功！", url('config/index'), 3);
            }
        }

        //查询分类详情
        $info=[];
        if($c_id){
            $where_find['c_id']=$c_id;
            $info = $config->configInfo($where_find);
            if(empty($info)){
                $this->error("非法请求，网站参数不存在！", url('config/index'), 3);
            }
        }

        //分类列表
        $this->assign('info', $info);
        $this->assign('c_id', $c_id);
		return $this->fetch();
	}
	
	/*
	* 网站参数删除
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/
	public function delete()
	{
        $c_id = input('request.c_id',0);
        if(!$c_id || !is_numeric($c_id)){
            $this->error("非法请求！", url('config/index'), 3);
        }
        $config = new ConfigService();

        // 删除
        $res = $config->configDel(['c_id'=>$c_id]);
        if(!$res){
            $this->error("参数删除失败！", url('config/index'), 3);
        }
        $this->success("参数删除成功！", url('config/index'), 3);
	}
}
