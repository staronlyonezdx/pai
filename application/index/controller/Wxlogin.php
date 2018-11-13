<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/10/8
 * Time: 15:10
 */

namespace app\index\controller;


use app\data\service\sms\SmsService;
use app\data\service\wx\WxService;
use app\member\controller\IndexHome;
use think\Db;

class Wxlogin extends IndexHome
{
    //微信授权登陆
    public function weixin_login()
    {
        $wx_service = new WxService();
        $wx_unionid = input('param.wx_unionid');//微信unionid
        if(empty($wx_unionid)){
            $return=array("state"=>'0',"msg"=>"wx_unionid不能为空");
            echo json_encode($return);die();
        }
        $is_bang_mobile = Db('member')->where('wx_unionid',$wx_unionid)->value('m_mobile');
        if(!empty($is_bang_mobile)){
            $new_mobile = $wx_service->decrypt($is_bang_mobile);
            $data['m_mobile'] = $new_mobile;
            $res = $wx_service->member_login($data);//去登陆
            $return=array("state"=>'1',"msg"=>$res['msg']);
            $this->redirect('index/index/index');
        }else{
            $this->assign('wx_unionid',$wx_unionid);
            return view('bang_mobile');//前去绑定手机号
        }

    }
    //绑定手机号
    public function bang_mobile(){
        $wx_service = new WxService();
        $wx_unionid = input('post.wx_unionid');//微信unionid
        $verification = input('post.verification');//验证码
        $mobile = input('post.mobile');//手机号
        if(empty($wx_unionid)){
            $return=array("state"=>'0',"msg"=>"wx_unionid不能为空");
            echo json_encode($return);die;
        }
        if(empty($mobile)){
            $return=array("state"=>'0',"msg"=>"手机号码不能为空");
            echo json_encode($return);die;
        }
        if(empty($verification)){
            $return=array("state"=>'0',"msg"=>"验证码不能为空");
            echo json_encode($return);die;
        }
        //此处检测短信验证是否正确
        $sms = new SmsService();
        $res = $sms->checkSmsCode($verification,$mobile);
        if($res['status']!=1){
            $ret=$res['msg'];
            return ['state'=>0,'msg'=>$ret];
        }
        $encrypt_mobile = $wx_service->encrypt($mobile);//加密手机号码
        $bang_mobile_list = Db('member')->where('m_mobile',$encrypt_mobile)->value('wx_unionid');
        if($bang_mobile_list){
            $return=array("state"=>'0',"msg"=>"手机号码已经绑定，请您换手机号码再绑定");//手机号已绑定
            echo json_encode($return);die;
        }else{
            $have_wx_unionid = Db('member')->where('wx_unionid',$wx_unionid)->value('wx_unionid');
            if(empty($have_wx_unionid)){//wx_unionid不存在
                $have_mobile = Db('member')->where('m_mobile',$encrypt_mobile)->value('m_id');//查找手机号是否存在
                $is_have_wx_unionid = Db('member')->where('m_mobile',$encrypt_mobile)->value('wx_unionid');
                if(empty($have_mobile) && empty($is_have_wx_unionid)){//手机号跟wx_unionid都为空，插入注册表
                    $data = array(
                        'm_mobile'=>$encrypt_mobile,
                        'wx_unionid'=>$wx_unionid,
                        'popularity'=>100,
                        'add_time'=>time(),
                    );
                    $insert_data = Db('member')->insertGetId($data);
                    if($insert_data){
                        $data['m_mobile'] = $mobile;
                        $return = $wx_service->member_login($data);//去登陆
                        echo json_encode($return);die;
                    }else{
                        $return=array("state"=>'0',"msg"=>"注册用户失败");
                        echo json_encode($return);die;
                    }
                }
                if(!empty($have_mobile) && empty($is_have_wx_unionid)){//手机号不为空，wx_unionid为空，更新unionid
                    $update_unionid = Db('member')->where('m_mobile',$encrypt_mobile)->update(['wx_unionid'=>$wx_unionid]);
                    if($update_unionid){
//                        $return=array("state"=>'1',"msg"=>"修改wx_unionid成功");
                        $data['m_mobile'] = $mobile;
                        $return = $wx_service->member_login($data);//去登陆
                        echo json_encode($return);die;
                    }else{
                        $return=array("state"=>'0',"msg"=>"修改wx_unionid失败");
                        echo json_encode($return);die;
                    }
                }
            }else{//wx_unionid存在,更新m_mobile
                $res = Db('member')->where('wx_unionid',$wx_unionid)->update(['m_mobile'=>$encrypt_mobile]);
                if($res){
//                    $return=array("state"=>'0',"msg"=>"修改手机号成功");
                    $data['m_mobile'] = $mobile;
                    $return = $wx_service->member_login($data);//去登陆
                    echo json_encode($return);die;
                }else{
                    $return=array("state"=>'0',"msg"=>"修改手机号失败");
                    echo json_encode($return);die;
                }
            }
        }
        return $this->fetch();
    }
}