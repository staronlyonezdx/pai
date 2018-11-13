<?php
namespace app\index\controller;
use app\data\service\sms\SmsService;
use app\data\service\wx\WxService;
use think\Controller;
use think\Request;
use think\Url;
use think\Config;
use think\Cache;
use think\Session;
use app\member\controller\IndexHome;
use app\data\service\recharge\RechargeService;
use think\log;
use app\data\service\member\MemberService;
use think\cookie;

class Easylogin extends IndexHome
{
    public  $m_id;
    public  $m_name;
    //统一微信授权登录入口
    public function easy_enter(){
        $wxS = new WxService();
        $reurl="/";
        $returl=input('returl');
        if(empty($returl))
        {
           $reurl="/";
        }
        else{
            $reurl=urldecode($returl);
        }
        //判断是否登录
        $islogin=$wxS->isLogin();
        //如果已经登录
        if($islogin['state']=='1')
        {
          redirect($reurl);
        }
        //如果没有登录
        else{
            if ($_GET['code']) {
                $code = $_GET['code'];
                $minfo = $wxS->get_wx_userinfo($code);
                if(empty($minfo['openid'])){
                    $this->redirect("/member/login/index");
                }
                if(empty($minfo['unionid'])){
                    $this->redirect("/member/login/index");
                }
                $_COOKIE['openid']=$minfo['openid'];
                setcookie('openid',$minfo['openid']);
                //是否绑定手机号码
                $is_bindmobile=$wxS->isBindMobile($minfo['openid']);
                //如果绑定了手机号码
                if($is_bindmobile['state']=='1')
                {
                    $mdata['openid']=$minfo['openid'];
                    $mdata['m_mobile']=$is_bindmobile['data'];
                    $mdata['m_mobile']=$wxS->decrypt($is_bindmobile['data']);
                    $result= $wxS->member_login($mdata);
                    if($result['state']=='1')
                    {
                        $member_data=$result['data'];
                        if(empty($member_data['wx_unionid'])){
                            //openid与mobile都存在 unionid处理 start
                            if(!empty($minfo['unionid'])){
                                $res_union=$wxS->update_member_unionid($minfo['unionid'],$minfo['openid']);
                            }
                            //openid与mobile都存在 unionid处理 end
                        }
                        redirect($reurl);
                    }
                    else{
                        $this->redirect("/member/login/index");
                    }
                }
                //如果没有绑定手机号码
                else{
                    $this->assign('openid',$minfo['openid']);
                    $this->assign('unionid',$minfo['unionid']);
                    $this->assign('returl',$reurl);
                    $this->assign('avatar',$minfo['headimgurl']);
                    $this->assign('m_name',$minfo['nickname']);
                    $this->assign('code',$code);
                    return view('easy_enter');
                }

            } else {
                //去微信授权
                $redirect_uri = 'https://m.paiyy.com.cn/index/thirdlogin/one_enter/returl/$returl';
                $href = $wxS->toWxAuth($redirect_uri);
                header('Location:' . $href);
                die;
            }
        }

    }
    //微信登录ajax
    public function wxlogin_ajax(){
        $openid = input('post.openid');
        $unionid = input('post.unionid');
        $mobile = input('post.mobile');
        $m_avatar = input('post.m_avatar');
        $verification = input('post.verification');
        $code = input('post.code');
        $m_name=input('post.m_name');
        //此处检测短信验证是否正确
        $sms = new SmsService();
        $res = $sms->checkSmsCode($verification,$mobile);
        if($res['status']!=1){
            $ret=$res['msg'];
            return ['state'=>0,'msg'=>$ret];
        }
        if(empty($openid)){
            $return=array("state"=>'0',"msg"=>"openid不能为空");
            echo json_encode($return);die;
        }
        if(empty($mobile)){
            $return=array("state"=>'0',"msg"=>"手机号码不能为空");
            echo json_encode($return);die;
        }

        $wxS = new WxService();
        $result = $wxS->checkWxMobile($mobile,$openid);
        //mobile已经注册
        if($result['state']=='0'){
            $return=array("state"=>'0',"msg"=>"手机号码已经绑定，请您换手机号码再绑定");
            echo json_encode($return);die;
        }
        //openid和mobile都存在且匹配,直接登录
        if($result['state']=='1'){
            $mdata=array();
            $mdata['m_mobile']=$mobile;
            //openid与mobile都存在 unionid处理 start
            if(!empty($unionid)){
                $res_union=$wxS->update_member_unionid($unionid,$openid);
            }
            //openid与mobile都存在 unionid处理 end
            $result2= $wxS->member_login($mdata);
            if($result2['state']=='1'){
                $return=array("state"=>'1',"msg"=>"登录成功");
                echo json_encode($return);die;
            }
            else{
                $return=array("state"=>'0',"msg"=>"登录失败");
                echo json_encode($return);die;
            }
        }
        //openid存在mobile存在,把Openid更新到mobile
        if($result['state']=='2'){
            $return=array("state"=>'0',"msg"=>"手机号和微信号已经是独立的两个会员，为了数据一致请联系客服解决");
            echo json_encode($return);die;
        }
        //openid存在和mobile不存在
        if($result['state']=='3'){
            $result2= $wxS->update_member_mobile($mobile,$openid,$unionid);
            if($result2['state']=='1'){
                $mdata3=array();
                $mdata3['m_mobile']=$mobile;
                $result3= $wxS->member_login($mdata3);
                if($result3['state']=='1'){
                    $return=array("state"=>'1',"msg"=>"登录成功");
                    echo json_encode($return);die;
                }
                else{
                    $return=array("state"=>'0',"msg"=>"登录失败");
                    echo json_encode($return);die;
                }
            }
            else{
                $return=array("state"=>'0',"msg"=>"更新mobile失败");
                echo json_encode($return);die;
            }
        }
        //openid不存在，mobile存在
        if($result['state']=='4'){
            $result2= $wxS->update_member_openid($mobile,$openid,$unionid);
            if($result2['state']=='1'){
                $mdata3['m_mobile']=$mobile;
                $result3= $wxS->member_login($mdata3);
                if($result3['state']=='1'){
                    $return=array("state"=>'1',"msg"=>"登录成功");
                    echo json_encode($return);die;
                }
                else{
                    $return=array("state"=>'0',"msg"=>"登录失败");
                    echo json_encode($return);die;
                }
            }
            else{
                $return=array("state"=>'0',"msg"=>"更新OPENID失败");
                echo json_encode($return);die;
            }
        }
        //openid和mobile都不存在
        if($result['state']=='5'){
            $data=array();
            $data['m_mobile'] = trim($mobile);
            $data['m_avatar'] = trim($m_avatar);
            $data['m_name'] = trim($m_name);
            $data['wx_openid'] = trim($openid);
            $data['verification'] = trim($verification);
            $regres=$wxS->register_wx($data,$unionid);
            if($regres['status']=='1'){
                $mdata3['m_mobile']=$mobile;
                $result3= $wxS->member_login($mdata3);
                if($result3['state']=='1'){
                    $return=array("state"=>'1',"msg"=>"登录成功");
                    echo json_encode($return);die;
                }
                else{
                    $return=array("state"=>'0',"msg"=>"登录失败");
                    echo json_encode($return);die;
                }
            }
            else{
                $return=array("state"=>'0',"msg"=>"注册用户失败");
                echo json_encode($return);die;
            }

        }
    }
    //检查手机号码是否已经绑定
    public function checkbdmobile(){
        $mobile = input('post.mobile');
        $wxS = new WxService();
        $res = $wxS->checkMobile($mobile);
        if($res['state']=='1'){
            $return=array("state"=>'1',"msg"=>"可以绑定");
            echo json_encode($return);die;
        }
        else{
            $return=array("state"=>'0',"msg"=>$res['msg']);
            echo json_encode($return);die;
        }
    }

    public function easyenter(){
        $m_id = Cookie::get("m_id");
        $m_mobile = Cookie::get("phone");
        $mem = new MemberService();
        $m_id = $mem->decrypt($m_id);       //解密账号id
        $m_id = str_replace('abcde','',$m_id);//删除多余字符(加盐字符串)
        $this->m_id = $m_id;
        $res = $mem->get_info(['m_id'=>$m_id,'m_state'=>0,'m_mobile'=>$m_mobile],'m_id,m_name,m_type');
        if(!$res){
            //如果微信浏览器授权---------------------start
            if($this->is_weixin()){
                $ws=new WxService();
                $cururl=$ws->curPageURL();
                $returl=urlencode($cururl);
                //去微信授权
                $redirect_uri = "https://m.paiyy.com.cn/index/thirdlogin/one_enter/returl/$returl";
                $href = $ws->toWxAuth($redirect_uri);
                header('Location:' . $href);
                die;
            }else{
                $this->redirect("/member/login/index");
            }
            //如果微信浏览器授权---------------------end

        }

    }
    //判断是否微信浏览器
    public function is_weixin(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'],
                'MicroMessenger') !== false ) {
            return true;
        }
        return false;
    }
    /**
     * @return string
     * 发送手机验证码(会员调用)
     */
    public function news_code()
    {
        $mobile = input('post.mobile');
        if(empty($mobile)){
            $return=array("state"=>'1',"msg"=>"手机不能为空");
            echo json_encode($return);die;
        }
        $wxS = new WxService();
        $res = $wxS->checkMobile($mobile);
        if($res['state']!='1'){
            $return=array("state"=>'0',"msg"=>$res['msg']);
            echo json_encode($return);die;
        }
        $sms = new SmsService();
        $info = $sms->smsSingleSender($mobile);
        return $info;
    }




}
