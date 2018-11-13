<?php
namespace app\business\controller;
use app\data\service\BaseService;
use app\data\service\member\MemberService;
use app\data\service\webImages\WebImagesService;
use think\Controller;
use think\Cookie;
use think\Db;
use think\Session;
use think\captcha\Captcha;

class Login extends IndexHome
{
	/**
	* 会员登录
	*/
    public function index()
    {

        if (request()->isPost()) {

            //验证
            $base = new BaseService();
            $type = 'm_mobile|m_pwd|code';
            $m_mebile    = trim(input('post.m_mobile'));
            $m_pwd       = trim(input('post.m_pwd'));
            $code        = trim(input('post.code'));
            $info =  $m_mebile . "|" . $m_pwd . "|" .$code;
            $check = $base->checkInfo($type, $info);
            if ($check) {
                $this->error($check,'/business/login/index','',1);
            }

            $m_mebile = $base->encrypt($m_mebile);
            $res = Db::table('pai_member')->where(['m_mobile'=>$m_mebile,'m_type'=>'1'])->count();
            if(!$res){
                $this->error('此账户非商家','/business/login/index','',1);
            }


            $res = Db::table('pai_member')->where(['m_mobile'=>$m_mebile,'m_state'=>1])->count();
            if($res){
                $this->error('此账户暂不可登录，请联系管理员','/business/login/index','',1);
            }

            $res = Db::table('pai_member')->where(['m_mobile'=>$m_mebile,'m_pwd'=>md5(input('post.m_pwd'))])->count();
            if(!$res){
                $this->error('密码有误','/business/login/index','',1);
            }

//            $where = [
//                'm.m_mobile' =>  $m_mebile,
//                'm.m_pwd' => md5($m_pwd),
//                's.store_type' => 1,
//            ];
//            $m_id = Db::table('pai_member m')->join('pai_store s','m.m_id=s.m_id','left')->where($where)->value('m.m_id');
            $where = [
                'm_mobile' =>  $m_mebile,
                'm_pwd' => md5($m_pwd),
                'm_type' => 1,
            ];
            $m_id = Db('member')->where($where)->value('m_id');
            if($m_id){
                $m_id = $base->encrypt('abcde'.$m_id);
                $time = 86400*365;
                Cookie::set('m_id',$m_id,$time);
                $this->redirect('/business/index/index');
            }else{
                $this->error('无权限登录','/business/login/index','',1);
            }
        }

        return view('index');
    }

    /**
     * 退出登录
     * 邓赛赛
     */
    public function out(){
        Cookie::set('m_id','');
        $this->redirect("/business/login/index");


    }

    /**
     * 测试模块
     */
    public function test(){
        $code = input('param.code','');

        $session = Session::get();
        echo 'session:';
        dump($session);
        echo '<hr/><hr/><hr/>';

        $captcha_src = captcha_src();
        echo 'captcha_src:<br/>';
        $html = $_SERVER['REQUEST_SCHEME'].'://'. $_SERVER['SERVER_NAME'].$captcha_src;
        echo $html;
        echo '<hr/><hr/><hr/>';

        // 验证码
        $captcha = new \think\captcha\Captcha([]);

        echo '<hr>打印验证码判断结果:<br>';
        echo '接受到的验证码:'.$code.'<br>';
        echo '接受到的验证码加密验证码:'.$captcha->authcode(strtoupper($code)).'<br>';
        $get_code = $captcha->getcode('');
        echo "生成的验证码：";
        dump($get_code);
        $callback = $captcha->check($code, '');

        echo "<br>判断结果：";
        dump($callback);
        echo "<hr/><hr/><hr/>";


    }

}
