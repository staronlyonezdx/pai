<?php
namespace app\member\controller;
use app\data\service\member\MemberService;
use app\data\service\webImages\WebImagesService;
use think\Controller;
use think\Cookie;

class Login extends IndexHome
{
	/**
	* 会员登录
	*/
    public function index()
    {
        $webImg = new WebImagesService();
        $where = [
            'wi_type'=>1,
            'wi_state'=>0,
        ];
        $field = 'wi_imgurl,wi_id';
        $img = $webImg->webImgInfo($where,$field);
        $version = !empty($_COOKIE['version']) ? $_COOKIE['version'] : '';//判定是不是新版本
        if($version){
            $uuid = $_COOKIE['uuid'];//机器码
            if(empty($uuid)){
                $return=array("state"=>'0',"msg"=>"机器码不能为空");
                echo json_encode($return);die;
            }
        }

        if (request()->isAjax()) {
            $data = [
                'm_mobile' => input('post.phone'),
                'm_pwd' => input('post.pwd'),
            ];
            $member = new MemberService();
            if($version){
                $res = $member->new_user_login($data,$uuid);//uuid登陆的方式
            }else{
                $res = $member->user_login($data);
            }
            return $res;
        }
        if($img){
            $this->assign(['img_name'=>$img]);
        }
        $this->assign('header_title','登录');
        // $this->assign('header_path','/');
        return view('index');
    }

    /**
     * 退出登录
     * 邓赛赛
     */
    public function out(){
        $m_id = Cookie::get('m_id');
        if(!$m_id){
            $this->redirect("/member/login/index");
        }
        $member = new MemberService();
        $member->sign_out();
        $this->redirect("/member/login/index");


    }

}
