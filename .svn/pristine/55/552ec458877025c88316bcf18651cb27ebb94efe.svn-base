<?php
namespace app\member\controller;
use app\data\service\member\MemberService;
use think\Controller;
use think\Request;
use think\Cache;
class Wxphone extends IndexHome
{

//    /**
//     * 修改密码页面
//     */
//    public function modify_password(){
//        return $this -> fetch();
//    }
//
//    /**
//     * 发送短信验证码
//     */
//    public function short_message(){
//        $member = new MemberService();
//        $data = input('post.');
//        $res = $member->check_phone($data['m_mobile'],'set_password');
//        return $res;
//    }
//    /**
//     * @return bool|int|string
//     * 发送短信后,点击下一步校验验证码
//     */
//    public function check_message(){
//        $data['m_mobile'] = input('post.m_mobile');
//        $data['verification'] = input('verification');
//        if(empty(trim($data['m_mobile'])) || empty(trim($data['verification']))){
//            return json_encode(['status'=>0,'msg'=>'手机号和验证码不能为可空']);
//        }
//        $verification = Cache::get('set_password'.$data['m_mobile']);
//        if($data['verification'] != $verification){
//            return json_encode(['status'=>0,'msg'=>'验证码有误']);
//        }
//        return json_encode(['status'=>1,'msg'=>'ok']);
//    }

//    /**
//     * 接受重新设置密码消息
//     */
//    public function reset_password(){
//        $member = new MemberService();
//        $res = $member->set_password();
//        if($res == 1){
//            $this->success("修改密码成功");
//        }else{
//            $this->error($res);
//        }
//    }

//    /**
//     * @return string
//     * 发送微信绑定手机验证码
//     */
//    public function news_binding(){
//        $member = new MemberService();
//        $map = [
//            'm_mobile'=>input('post.m_mobile')
//        ];
//        $info = $member->getMemberInfo($map,'wx_binding_phone_');
//        return $info;
//    }

//	/**
//     * 绑定微信的手机号
//     */
//	public function wx_phone(){
//	    $data = input('post.');
//        $member = new MemberService();
//        $res = $member->binding_phone($data);
//        return $res;
//    }
}
