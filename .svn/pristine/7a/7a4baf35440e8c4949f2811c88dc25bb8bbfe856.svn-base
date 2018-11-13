<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/30
 * Time: 20:26
 */

namespace app\api\controller;


use app\data\service\api\ApiloginService;
use think\Cookie;
/*
 * 张文斌
 * 2018-9-3
 */
class Tuilogin extends Tuiapiindex
{
    public function index(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $loginService = new ApiloginService();
        $data = $this->data;//接收的所有数据
        if(empty($data['m_mobile'])){
            $this->response_error('手机号不为空');
        }
        if(empty($data['m_pwd'])){
            $this->response_error('密码不为空');
        }
        $is_phone = $loginService->is_phone($data['m_mobile']);//验证手机号格式
        $is_pwd = $loginService->is_pwd($data['m_pwd']);//密码格式(必须数字和字母6位)
        if($is_phone || $is_pwd){
            $this->response_error('请输入正确的账号、密码格式');
        }
        $data['m_mobile'] = $loginService->encrypt($data['m_mobile']);//加密手机号码
        $data['m_pwd'] = md5($data['m_pwd']);
        $data['m_state'] = 0;

        $res = $loginService->getinfo(['m_mobile'=>$data['m_mobile']],'m_id,ml_tui_id,m_mobile');
        if(empty($res)){
            $this->response_error('该手机号尚未被注册');
        }

        $list = $loginService->getInfo(['m_mobile'=>$data['m_mobile'],'m_pwd'=>$data['m_pwd']],'m_id,m_name,m_avatar,m_sex,wx_name,wx_avatar,m_type');
//        $this->response_data($res);
        if($list){
            $m_id = $loginService->encrypt('abcde'.$res['m_id']);
            $time = 3600*24*365;
            Cookie::set('m_id',$m_id,$time);
            Cookie::set('phone',$res['m_mobile'],$time);
            $loginService->getSave(['m_mobile'=>$data['m_mobile'],'m_pwd'=>$data['m_pwd']],['login_time'=>time()]);
            $this->response_data(['m_id'=>$m_id,'msg'=>'登录成功','ml_tui_id'=>$res['ml_tui_id'],'m_mobile'=>$res['m_mobile']]);
        }else{
            $this->response_error('账号或密码有误');
        }
    }
}