<?php
namespace app\admin\controller;

use think\console\command\make\Model;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\admin\ApiService as ApiService;


class Api extends AdminHome
{
    //添加
    public function apitokenadd() {
        $data=array();
        if(!empty($_GET['id']))
        {
            $api = new ApiService();
            $where_at="at_id=".$_GET['id'];
            $data=$api->apitokenInfo($where_at);
        }
        $this->assign("data",$data);
        return $this->fetch();
    }
    //修改密码
    public function apitokenpwd() {
        $data=array();
        if(!empty($_GET['id']))
        {
            $api = new ApiService();
            $where_at="at_id=".$_GET['id'];
            $data=$api->apitokenInfo($where_at);
        }
        $this->assign("data",$data);
        return $this->fetch();
    }

	//添加处理
    public function apitokenadd_do() {
        if (request()->post()) {
            $data=array();
            $data['at_name']         =trim(input('post.at_name'));
            $data['at_interval_time'] = input('post.at_interval_time');
            $data['at_token'] = trim(input('post.at_token'));
            if(empty($data['at_name']))
            {
                $this->error('token 账号不能为空!');
            }

            if(empty($data['at_interval_time']))
            {
                $this->error('token间隔时间不能为空!');
            }
            if(empty($data['at_token']))
            {
                $this->error('token不能为空!');
            }

            $api = new ApiService();

            $at_id=input('post.at_id');
            if(!empty($at_id))
            {
                $where_at="at_name='".trim(input('post.at_name'))."' and at_id <>".$at_id;
                $atdata=$api->apitokenInfo($where_at);
                if(!empty($atdata))
                {
                    $this->error('账号已经存在!');
                }
                $where_t="at_token='".trim(input('post.at_token'))."' and at_id <>".$at_id;
                $tdata=$api->apitokenInfo($where_t);
                if(!empty($tdata))
                {
                    $this->error('TOKEN已经存在!');
                }
                $where_u="at_id=".$at_id;
                if ($api->apitokenSave($where_u,$data)) {
                    $this->success("管理成功",url("api/apitokenlist"));
                }else {
                    $this->error('管理失败');
                }
            }
            else{
                $data['at_pwd']    =md5(trim(input('post.at_pwd')));
                if(empty($data['at_pwd']))
                {
                    $this->error('token 密码不能为空!');
                }
                $where_at="at_name='".trim(input('post.at_name'))."'";
                $atdata=$api->apitokenInfo($where_at);
                if(!empty($atdata))
                {
                    $this->error('账号已经存在!');
                }
                $where_t="at_token='".trim(input('post.at_token'))."'";
                $tdata=$api->apitokenInfo($where_t);
                if(!empty($tdata))
                {
                    $this->error('TOKEN已经存在!');
                }
                if ($api->apitokenAdd($data)) {
                    $this->success("管理成功",url("menu/menulist"));
                }else {
                    $this->error('管理失败');
                }
            }

        }else {
            $this->error('非法请求');
        }
    }

    //添加修改密码处理
    public function apitokenpwd_do() {
        if (request()->post()) {
            $data=array();
            $api = new ApiService();
            $at_id=input('post.at_id');
            if(!empty($at_id))
            {
                $data['at_pwd']    =md5(trim(input('post.at_pwd')));
                if(empty($data['at_pwd']))
                {
                    $this->error('token 密码不能为空!');
                }
                $where_u="at_id=".$at_id;
                if ($api->apitokenSave($where_u,$data)) {
                    $this->success("管理成功",url("api/apitokenlist"));
                }else {
                    $this->error('管理失败');
                }
            }
            else{
                $this->error('管理ID不存在');
            }
        }else {
            $this->error('非法请求');
        }
    }



    //菜单列表
    public function apitokenlist() {
        $api = new ApiService();
        $list=$api->apitokenList();
        $this->assign("list",$list);
        return $this->fetch();
    }

	//删除
	public function del() {
		//验证用户权限
		parent::userauth(63);
		if (request()->isAjax()) {
			if (!$delid=explode(',',input('post.delid'))) {
				return array('s'=>'请选中后再删除');
			}
			//将最后一个元素弹出栈
			array_pop($delid);
			$id=join(',',$delid);
			$dmenu=  new \app\common\model\Dmenu;
			if ($dmenu->where('ID','IN',$id)->delete()) {
				parent::operating(request()->path(),0,'删除成功');
				return array('s'=>'ok');
			}else {
				parent::operating(request()->path(),1,'删除失败：'.$dmenu->getError());
				return array('s'=>'删除失败');
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
}
