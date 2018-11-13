<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;

class Adminuser extends AdminHome
{	
	/*
	* 管理员列表
	* 创建人 刘勇豪
	* 时间 2018-06-21 10:21:00
	*/	
	public function index() 
	{
        $admin = new \app\data\service\admin\AdminService();
        $where['state'] = 0;
        $list = $admin->adminList($where);
        if(!empty($list)){
            foreach($list as $k =>$val){
                $list[$k]['role_name'] = '';
                if(!empty($val['role_id'])){
                    $role_id = $val['role_id'];
                    $adminRole = new \app\data\service\adminRole\AdminRoleService();
                    $role_info = $adminRole->adminRoleInfo(['role_id'=>$role_id]);
                    $list[$k]['role_name'] = $role_info['role_name'];
                }
            }
        }
        $this->assign('list', $list);
		return $this->fetch();
	}

    //管理员添加或编辑界面
    public function adminedit()
    {
        $admin = new \app\data\service\admin\AdminService();
        $admin_id = input('request.admin_id',0);

        if (request()->isPost()) {
            //表单数据验证
            $type = 'edit';//修改
            $info['admin_name'] = input('request.admin_name','');
            $info['role_id'] = input('request.role_id','');
            if(!$admin_id){
                $type = 'add';// 添加
                $info['admin_pwd'] = input('request.admin_pwd','');
                $info['admin_pwd2'] = input('request.admin_pwd2','');
            }
            $check = $admin->checkAdmin($type, $info);
            if ($check) {
                $this->error($check);
            }

            //提交
            if($admin_id){
                //更新
                $res = $admin->adminSave(['admin_id'=>$admin_id], $info);
            }else{
                //添加
                $info['add_time'] = time();
                $base = new BaseService();
                $info['admin_pwd'] = $base->HashPassword($info['admin_pwd']);
                unset($info['admin_pwd2']);
                $res = $admin->adminAdd($info);
            }

            if(!$res){
                $this->error("系统繁忙，请稍后再试！", url('adminuser/adminedit').'?admin_id='.$admin_id , 3);
            }
            $this->success("操作成功！", url('adminuser/adminedit').'?admin_id='.$admin_id, 3);
            return false;
        }
        $adminInfo = [];
        if($admin_id){
            $adminInfo = $admin -> adminInfo(['admin_id'=>$admin_id]);
        }

        // 管理员角色列表
        $adminRole = new \app\data\service\adminRole\AdminRoleService();
        $roleList = $adminRole->adminRoleList();

        $this->assign('adminInfo',$adminInfo);
        $this->assign('roleList',$roleList);
        $this->assign('admin_id',$admin_id);
        return $this->fetch();
    }

    /*
     * admin修改管理员的密码
    * 创建人 刘勇豪
    * 时间 2018-06-26 10:21:00
    */
    public function update_admin_pwd()
    {
        $admin = new \app\data\service\admin\AdminService();
        $admin_id = input('request.admin_id',0);

        if(!$admin_id){
            $this->error("缺少用户参数！", url('adminuser/update_admin_pwd').'?admin_id='.$admin_id, 3);
        }

        if(request()->isPost()){
            $new_pwd = input('request.new_pwd','');
            $new_pwd2 = input('request.new_pwd2','');

            //密码验证
            $base = new BaseService();

            if(strlen($new_pwd) < 6 || strlen($new_pwd) > 18){
                $this->error("请输入6~18位数的密码！", url('adminuser/update_admin_pwd').'?admin_id='.$admin_id, 3);
            }

            if($new_pwd != $new_pwd2){
                $this->error("两次密码不一致！", url('adminuser/update_admin_pwd').'?admin_id='.$admin_id, 3);
            }

            // 提交修改
            $update['admin_pwd'] = $base->HashPassword($new_pwd);
            $res = $admin->adminSave(['admin_id'=>$admin_id], $update);
            if($res){
                $this->success("密码修改成功！", url('adminuser/index'), 3);
            }else{
                $this->error("服务器繁忙，修改失败！", url('adminuser/update_admin_pwd').'?admin_id='.$admin_id, 3);
            }
        }
        $this->assign('admin_id',$admin_id);
        return $this->fetch();
    }

    /*
     * 管理员修改自己的密码
    * 创建人 刘勇豪
    * 时间 2018-06-21 10:21:00
    */
    public function update_pwd()
    {
        $base = new BaseService();
        $admin = new \app\data\service\admin\AdminService();
        $admin_id = $base->cookieGets('admin_id');//登录者的id

        if(!$admin_id){
            $this->error("缺少用户参数！", url('adminuser/adminedit'), 3);
        }

        if(request()->isPost()){
            $adminInfo = $admin -> adminInfo(['admin_id'=>$admin_id]);
            $old_pwd = input('request.old_pwd','');
            $new_pwd = input('request.new_pwd','');
            $new_pwd2 = input('request.new_pwd2','');

            //密码验证
            $base = new BaseService();
            if( $base->HashPassword($old_pwd) != $adminInfo['admin_pwd']){
                $this->error("原密码错误！", url('adminuser/update_pwd'), 3);
            }

            if(strlen($new_pwd) < 6 || strlen($new_pwd) > 18){
                $this->error("请输入6~18位数的密码！", url('adminuser/update_pwd'), 3);
            }

            if($new_pwd != $new_pwd2){
                $this->error("两次密码不一致！", url('adminuser/update_pwd'), 3);
            }

            // 提交修改
            $update['admin_pwd'] = $base->HashPassword($new_pwd);
            $res = $admin->adminSave(['admin_id'=>$admin_id], $update);
            if($res){
                $this->success("密码修改成功！", url('adminuser/index'), 3);
            }else{
                $this->error("服务器繁忙，修改失败！", url('adminuser/update_pwd'), 3);
            }
        }
        return $this->fetch();
    }
	
	/*
	* 删除管理员
	* 创建人 刘勇豪
	* 时间 2018-06-21 10:21:00
	*/
	public function admindel()
	{
        $admin = new \app\data\service\admin\AdminService();
        $admin_id = input('request.admin_id',0);

        if(!$admin_id){
            $this->error("缺少用户参数！", url('adminuser/index'), 3);
        }

        // 提交删除
        $update['state'] = 1;
        $res = $admin->adminSave(['admin_id'=>$admin_id], $update);
        if($res){
            $this->success("删除成功！", url('adminuser/index'), 3);
        }else{
            $this->error("服务器繁忙，删除失败！", url('adminuser/index'), 3);
        }

	}
	
	/*
	* 批量删除管理员
	* 创建人 刘勇豪
	* 时间 2018-06-21 10:21:00
	*/
	public function in_user_del() 
	{
		//验证用户权限
		parent::userauth(5);
		if (request()->isAjax()) 
		{
			$user = new \app\data\service\user\UserService();
			$result = $user->userRoomDelMost();
			if ($result) 
			{
				$delid = input('post.delid');
				parent::operating(request()->path(),0,'批量删除ID为：'.$delid.'的数据');
				return array('s'=>'ok');
			}
			else 
			{
				parent::operating(request()->path(),1,'批量删除用户失败');
				return array('s'=>'批量删除用户失败');
			}
		}
		else 
		{
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
}
