<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use think\Response;
use think\Cookie;
use app\data\service\adminRole\AdminRoleService as AdminRoleService;
use app\data\service\adminAuthority\AdminAuthorityService as AdminAuthorityService;

class Adminrole extends AdminHome
{
    /**
     * 角色列表
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:15:00
     */
    public function index()
    {
        $adminRole = new AdminRoleService();
        $adminAuthority = new AdminAuthorityService();
        $list = $adminRole->adminRoleList();
        // 查找包含权限
        if(!empty($list)){
            foreach($list as $k => $v){
                $role_auth = [];
                if( !empty($v['authority_id'])){
                    $authority_id = rtrim($v['authority_id'],",");
                    $arr_ids = explode(",", $authority_id);
                    foreach($arr_ids as $auth_id){
                        $auth_info = $adminAuthority->adminAuthorityInfo(['authority_id'=>$auth_id]);
                        $role_auth[] = $auth_info;
                    }
                }
                $list[$k]['role_auth'] = $role_auth;
            }
        }
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 角色编辑（增加，修改）
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:15:00
     */
    public function roleedit()
    {
        $adminRole = new AdminRoleService();
        $adminAuthority = new AdminAuthorityService();
        $role_id = input('request.role_id',0);


        // 表单提交
        if(request()->isPost()){
            $new_aids = '';
            $arr_ids = [];
            if(!empty($_POST['allcheckbox'])){
                $arr_ids = $_POST['allcheckbox'];
            }
            if(!empty($arr_ids)){
                $new_aids = implode(",", $arr_ids);
            }
            $data['role_name'] = input('request.role_name','');
            $data['authority_id'] = $new_aids;

            if(empty($data['role_name'])){
                $this->error("角色名不能为空！", url('adminrole/roleedit').'?role_id='.$role_id, 3);
            }

            if($role_id){
                // 修改
                $where_save['role_id'] = $role_id;
                $res = $adminRole ->adminRoleSave($where_save,$data);

                if(!$res){
                    $this->error("修改失败了！", url('adminrole/roleedit').'?role_id='.$role_id, 3);
                }
                $this->success("角色修改成功！", url('adminrole/index'), 3);
            }else{
                //添加
                $role_info = $adminRole->adminRoleInfo(['role_name'=>$data['role_name']]);
                if(!empty($role_info)){
                    $this->error("角色名已存在，请换个名字！", url('adminrole/roleedit').'?role_id='.$role_id, 3);
                }
                $res = $adminRole -> adminRoleAdd($data);
                if(!$res){
                    $this->error("服务器繁忙，添加角色失败了！", url('adminrole/roleedit').'?role_id='.$role_id, 3);
                }
                $this->success("角色添加成功！", url('adminrole/index'), 3);
            }
        }

        // 角色详细信息
        $role_info = [];
        $my_authority_id_arr = [];
        if($role_id){
            $role_info = $adminRole->adminRoleInfo(['role_id'=>$role_id]);
            if(empty($role_info)){
                $this->error("参数非法！", url('adminrole/index'), 3);
            }
            if(!empty($role_info['authority_id'])){
                $my_authority_id_arr = explode(",", $role_info['authority_id']);
            }
        }

        // 权限列表
        $authorityList = $adminAuthority->adminAuthorityList(['authority_parent_id'=>0]);
        if(!empty($authorityList)){
            foreach($authorityList as $k => $v){
                $pid = $v['authority_id'];
                $authorityList[$k]['child_auth'] = $adminAuthority->adminAuthorityList(['authority_parent_id'=>$pid]);
            }
        }


        //判断是否含有权限
        if(!empty($authorityList)){
            foreach($authorityList as $k => $v){
                $is_check = 0;
                $authority_id = $v['authority_id'];
                if(in_array($authority_id, $my_authority_id_arr) ){
                    $is_check = 1;
                }
                $authorityList[$k]['is_check'] = $is_check;

                //子权限判断
                if(!empty($v['child_auth'])){
                    foreach($v['child_auth'] as $ck => $cv){
                        $is_check = 0;
                        $c_aid = $cv['authority_id'];
                        if(in_array($c_aid, $my_authority_id_arr) ){
                            $is_check = 1;
                        }
                        $authorityList[$k]['child_auth'][$ck]['is_check'] = $is_check;
                    }
                }
            }
        }

        $this->assign('role_info',$role_info);
        $this->assign('authorityList',$authorityList);
        $this->assign('role_id', $role_id);
        return $this->fetch();
    }

    /**
     * 角色权限删除
     * 创建人 刘勇豪
     * 时间 2018-06-20 10:15:00
     */
    public function role_authdel()
    {
        $adminRole = new AdminRoleService();
        $authority_id = input('request.authority_id',0);
        $role_id = input('request.role_id',0);
        if(!$authority_id || !$role_id){
            $this->error("非法请求！", url('adminrole/index'), 3);
        }

        $role_info = $adminRole->adminRoleInfo(['role_id'=>$role_id]);
        if(empty($role_info)){
            $this->error("角色不见了！", url('adminrole/index'), 3);
        }

        $authority_id = $role_info['authority_id'];
        if(strlen($authority_id) > 0){
            $arr_ids = explode(",", $authority_id);
            foreach($arr_ids as $arr_k =>$auth_id){
                if($auth_id == $authority_id){
                    unset($arr_ids[$arr_k]);
                }
            }

            $new_auth['authority_id'] = implode(",",$arr_ids);
            $where_new['role_id'] = $role_id;
            $res = $adminRole->adminRoleSave($where_new, $new_auth);
            if(!$res){
                $this->error("删除失败！", url('adminrole/index'), 3);
            }
        }

        $this->success("权限删除成功！", url('adminrole/index'), 3);
        return $this->fetch();
    }
	
    /**
     * 删除角色数据
	 * 创建人 刘勇豪
	 * 时间 2018-06-20 10:15:00
     */
	public function roledel()
	{
        $adminRole = new AdminRoleService();
        $role_id = input('request.role_id',0);
        if(!$role_id){
            $this->error("非法请求！", url('adminrole/index'), 3);
        }
        $res = $adminRole->adminRoleDel(['role_id'=>$role_id]);
        if(!$res){
            $this->error("服务器繁忙，删除失败！", url('adminrole/index'), 3);
        }
        $this->success("角色删除成功！", url('adminrole/index'), 3);
	}
}
