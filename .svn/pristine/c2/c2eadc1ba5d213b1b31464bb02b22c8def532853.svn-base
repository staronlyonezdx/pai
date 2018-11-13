<?php
namespace app\member\controller;
use app\admin\controller\Testsms;
use app\data\service\member\MemberService;
use app\data\service\sms\Sms1Service;
use app\data\service\sms\SmsService;
use app\data\service\wx\WxService;
use think\Controller;
use think\Request;
class Register extends IndexHome
{

    /**
     * @return mixed
     * 注册页面
     */
    public function index(){
        $this->assign('header_title','注册页面');
        return $this->fetch();
    }
    /**
     * @return string
     * 发送注册手机验证码(非会员调用)
     */
    public function register_code(){
        $member = new MemberService();
        $phone = input('post.m_mobile');
        if(empty(trim($phone))){
            return ['status'=>0,'msg'=>'手机号码不能为空'];
        }
        $map = [
            'm_mobile'=> $phone
        ];
        $info = $member->getMemberInfo($map); //检验是否已经注册
        if(!$info){
            $sms = new SmsService();
            $info = $sms->smsSingleSender($phone);
            return $info;
        }
        return ['status'=>2,'msg'=>'此账户已注册'];
    }

    /**
     * @return string
     * 接收注册信息(手机号和密码注册)
     * 邓赛赛
     */
    public function register_start(){
        if(\request()->isPost()){
            $member = new MemberService();
            $data = input('post.');
            $info = $member->addUserAP($data);//app和pc端注册
            return $info;
        }
    }

    /**
     * 手机号码和验证码注册
     * 邓赛赛
     */
    public function code_register(){
//        if(\request()->isAjax()){
            $m_mobile = trim(input('param.m_mobile'));
            $verification = trim(input('param.verification'));
            $member = new MemberService();
            //验证手机号码是否合格
            $is_phone = $member->is_phone($m_mobile);
            if($is_phone){ return $is_phone;}

            //此处检测短信验证是否正确
            $sms = new SmsService();
            $res = $sms->checkSmsCode($verification,$m_mobile);

            if(!$res['status']){
                return $res;
            }
            //登录或注册登录
            $wxS = new WxService();
            $result = $wxS->checkMobileCode($m_mobile);
            if($result['state']=='1'){
                //mobile都存在且匹配,直接登录
                $mdata=array();
                $mdata['m_mobile']=$m_mobile;
                $result2= $wxS->member_login($mdata);
                if(!$result2['state']){
                    return ['status'=>0,'msg'=>'系统繁忙！登录失败！'];
                }
            }elseif($result['state']=='2'){
                //mobile都不存在 注册并登录
                $data=array();
                $data['m_mobile'] = trim($m_mobile);
                $data['verification'] = trim($verification);
                $regres=$wxS->register_mobilecode($data);
                if($regres['status']=='1'){
                    $mdata3['m_mobile']=$m_mobile;
                    $result3= $wxS->member_login($mdata3);
                    if(!$result3['state']){
                        return ['status'=>0,'msg'=>'系统繁忙！登录失败！'];
                    }
                }else{
                    return ['status'=>0,'msg'=>'系统繁忙！注册用户失败！'];
                }
            }
            return ['status'=>1,'msg'=>'登录成功'];
//        }

    }

    /**
     * @return string
     * 发送手机验证码(会员调用)
     * 邓赛赛
     */
    public function news_code(){
        $member = new MemberService();
        $phone = input('post.m_mobile');
        $is_phone = $member->is_phone($phone);
        if($is_phone){
            return $is_phone;
        }
        $map = [
            'm_mobile'=> $phone
        ];
        $info = $member->getMemberInfo($map); //检验是否已经注册
        if($info){
            $sms = new SmsService();
            $info = $sms->smsSingleSender($phone);
            return $info;
        }
        return ['status'=>2,'msg'=>'此手机号非会员'];
    }

    /**
     * 忘记登录密码
     * 邓赛赛
     */
    public function amnesia_login(){
        if(request()->isPost()){
            $verification = input('post.verification');
            $m_mobile = input('post.m_mobile');
            $sms = new SmsService();
            $res = $sms->checkSmsCode($verification,$m_mobile);
            if($res['status'] == 1){
                $data = input('post.');
               $mem = new MemberService();
               $res = $mem->forget_login_pwd($data);
            }
            return $res;
        }
        $this->assign('header_title','忘记密码');
        return $this->fetch();
    }

    /**
     * @return string
     * 发送手机验证码(会员调用)
     * 邓赛赛
     */
    public function news_code1(){
        $member = new MemberService();
        $phone = input('post.m_mobile');
        $is_phone = $member->is_phone($phone);
        if($is_phone){
            return $is_phone;
        }
        $map = [
            'm_mobile'=> $phone
        ];
        $info = $member->getMemberInfo($map); //检验是否已经注册
        if($info){
            $sms = new Sms1Service();
            $info = $sms->smsSingleSender($phone);
            return $info;
        }
        return ['status'=>2,'msg'=>'此手机号非会员'];
    }

    /**
     * 忘记登录密码
     * 邓赛赛
     */
    public function amnesia_login1(){
        if(request()->isPost()){
            $verification = input('post.verification');
            $m_mobile = input('post.m_mobile');
            $sms = new Sms1Service();
            $res = $sms->checkSmsCode($verification,$m_mobile);
            if($res['status'] == 1){
                $data = input('post.');
                $mem = new MemberService();
                $res = $mem->forget_login_pwd($data);
            }
            return $res;
        }
        $this->assign('header_title','忘记密码');
        return $this->fetch();
    }


    /**
     * @return mixed
     * 忘记支付密码
     * 邓赛赛
     */
    public function amnesia_payment(){
        if(request()->isPost()){
            $verification = input('post.verification');
            $m_mobile = input('post.m_mobile');
            $sms = new SmsService();
            $res = $sms->checkSmsCode($verification,$m_mobile);
            if($res['status'] == 1){
                $data = input('post.');
                $mem = new MemberService();
                $res = $mem->forget_payment_pwd($data);
            }
            return $res;
        }
        $this->assign('header_title','忘记支付密码');
        return $this->fetch();
    }

    /**
     * @return \think\response\View
     * 邀请好友注册页面被(扫码或通过链接展示页面)
     * 邓赛赛
     */
    public function it_to_rg(){
        $member = new MemberService();
        if(\request()->isPost()){
            $data = input('post.');
            $info = $member->addUserAP($data,$tj=1);//app和pc端注册
            return $info;
        }
        $phone = input('param.phone');
        $promoters_code = input('param.promoters_code','');
        if(!trim($phone) && $promoters_code){
            $m_mobile = $member->get_value(['promoters_code'=>$promoters_code],'m_mobile');
            $phone = $member->decrypt($m_mobile);
        }
        $header_title = '邀请好友入驻';
        $this->assign('header_title',$header_title);
        $this->assign('phone',$phone);

        return $this->fetch();
    }

    /**
     * 注册成功页面(扫码注册)
     * 邓赛赛
     */
    public function tj_success(){
        $header_title = '注册完成';
        $header_path = '/member/login/index';
        $this->assign('header_title',$header_title);
        $this->assign('header_path',$header_path);

        return view();
    }

    /**
     * ios引导页
     * 邓赛赛
     */
    public function ios_guide(){
        $header_title = '引导页';
        $this->assign('header_title',$header_title);
        return view();
    }

    /**
     * 安卓引导页
     * 邓赛赛
     */
    public function az_guide(){
        $header_title = '引导页';
        $this->assign('header_title',$header_title);
        return view();
    }

//    /**
//     * @return \think\response\View
//     * 推广员邀请注册
//     * 邓赛赛
//     */
//    public function promoters_to_rg(){
//
//        if(\request()->isPost()){
//            $member = new MemberService();
//            $data = input('post.');
//            $info = $member->promoters_add($data);//app和pc端注册\
//            dump($info);die;
//            return $info;
//        }
//        $phone = input('param.phone');
//        $promoters_code = input('param.promoters_code');
//        $header_title = '邀请好友入驻';
//        $this->assign('header_title',$header_title);
//        $this->assign('phone',$phone);
//        $this->assign('promoters_code',$promoters_code);
//
//        return $this->fetch();
//    }


}
