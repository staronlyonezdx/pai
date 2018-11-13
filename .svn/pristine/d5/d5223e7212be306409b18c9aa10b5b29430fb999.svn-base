<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\adminAuthority\AdminAuthorityService as AdminAuthorityService;

class Adminauth extends AdminHome
{	
	/*
	* 权限列表
	* 创建人 刘勇豪
	* 时间 2018-06-21 10:21:00
	*/	
	public function index() 
	{
        $adminAuthority = new AdminAuthorityService();
        $authorityList = $adminAuthority->adminAuthorityList(['authority_parent_id'=>0]);
        if(!empty($authorityList)){
            foreach($authorityList as $k => $v){
                $pid = $v['authority_id'];
                $authorityList[$k]['child_auth'] = $adminAuthority->adminAuthorityList(['authority_parent_id'=>$pid]);
            }
        }
        $this->assign('authorityList', $authorityList);
		return $this->fetch();
	}
	
	/*
	* 权限编辑
	* 创建人 刘勇豪
	* 时间 2018-06-21 10:21:00
	*/	
	public function authedit()
	{
        $authority_id = input('request.authority_id',0);
        $adminAuthority = new AdminAuthorityService();

        // 表单提交
        if(request()->isPost()){
            $data['authority_name'] = input('request.authority_name','');
            $data['authority_parent_id'] = input('request.authority_parent_id',0);
            if(empty($data['authority_name'])){
                $this->error("请设置权限名！", url('adminauth/authedit').'?authority_id='.$authority_id, 3);
            }
            if(!is_numeric($data['authority_parent_id'])){
                $this->error("权限设置非法！", url('adminauth/authedit').'?authority_id='.$authority_id, 3);
            }
            //判断权限名是否存在
            $where_find['authority_name'] = $data['authority_name'];
            $where_find['authority_parent_id'] = $data['authority_parent_id'];
            $is_find = $adminAuthority->adminAuthorityInfo($where_find);
            if(!empty($is_find)){
                $this->error("权限名设置重复！", url('adminauth/authedit').'?authority_id='.$authority_id, 3);
            }
            // 提交表单
            if($authority_id){
                // 修改
                $res = $adminAuthority->adminAuthoritySave(['authority_id'=>$authority_id], $data);
                if(!$res){
                    $this->error("权限修改失败！", url('adminauth/authedit').'?authority_id='.$authority_id, 3);
                }
                $this->success("权限修改成功！", url('adminauth/index'), 3);
            }else{
                //添加
                $res = $adminAuthority->adminAuthorityAdd($data);
                if(!$res){
                    $this->error("权限添加失败！", url('adminauth/authedit').'?authority_id='.$authority_id, 3);
                }
                $this->success("权限添加成功！", url('adminauth/index'), 3);
            }
            return false;
        }

        $info = [];
        if($authority_id){
            //该权限详情
            $info = $adminAuthority->adminAuthorityInfo(['authority_id'=>$authority_id]);
        }

        // 获取所有顶级分类
        $parentList = $adminAuthority->adminAuthorityList(['authority_parent_id'=>0]);

        $this->assign('info', $info);
        $this->assign('parentList', $parentList);
        $this->assign('authority_id', $authority_id);
		return $this->fetch();
	}
	
	/*
	* 权限删除
	* 创建人 刘勇豪
	* 时间 2018-06-21 10:21:00
	*/
	public function authdel()
	{
        $authority_id = input('request.authority_id',0);
        $adminAuthority = new AdminAuthorityService();

        if(!$authority_id){
            $this->error("缺少参数！", url('adminauth/index'), 3);
        }

        $res = $adminAuthority->adminAuthorityDel(['authority_id'=>$authority_id]);
        if(!$res){
            $this->error("服务器繁忙，删除失败！", url('adminauth/index'), 3);
        }

        $this->success("权限删除成功！", url('adminauth/index'), 3);
	}
}
