<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/30
 * Time: 14:52
 */
//个人中心
namespace app\api\controller;
use app\data\service\api\ApimemberService;
use app\data\service\api\ApiregisterService;
use app\data\service\api\ApituiinviterService;
use app\data\service\sms\SmsService;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\member\MemberService as MemberService;
use app\data\service\BaseService as BaseService;
use think\Db;
/*
 * 张文斌
 * 2018-8-27
 */
class Tuimember extends Tuiapimember{
    //个人中心主页
    public function index(){
        $res=$this->checktoken();//验证token
        if($res['state'] != '1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $where['m_id'] = $data['m_id'];
        $tuiinviter = new Tuiinviter();//调用我的邀请人接口
        $apituiinviterS= new ApituiinviterService();
        $yaonum = $apituiinviterS->get_all_childcount_wu($m_id);//邀请人总数量
        $ApimemberService = new \app\data\service\api\ApimemberService();
        $memberlist = $ApimemberService->getinfo($where);
        $new_where = array(
            'm_id'=>$data['m_id'],
            'set_type'=>2,
        );
        $ishave_invitation = $ApimemberService->get_invitation($new_where);//判断是否修改了推荐人
        if(!empty($ishave_invitation)){
            $memberlist['status'] = 2;
        }else{
            $memberlist['status'] = 1;
        }
        if(empty($memberlist['tui_code']) || !is_file(trim($memberlist['tui_code'],'/'))){
            $qrcode = $ApimemberService->new_code($where);
//            dump($qrcode);exit();
            $memberlist['tui_code'] = $qrcode;
        }
        if(empty($memberlist['m_avatar'])){
            $memberlist['m_avatar'] = "";
        }else{
//            $memberlist['m_avatar'] = "http://" . $_SERVER['HTTP_HOST'].$memberlist['m_avatar'];
            $tmp = strstr($memberlist['m_avatar'],'http://');
            if($tmp == false){
                $memberlist['m_avatar'] = PAIYY_URL . $memberlist['m_avatar'];//拍吖吖图片的路径
            }
        }
//        $memberlist['tui_code'] = "http://" . "www.paiyy.com.cn".$memberlist['tui_code'];
        if(!empty($memberlist['tui_code'])){
            $tui_code = strstr($memberlist['tui_code'],'http://');
            if($tui_code == false){
                $memberlist['tui_code'] = PAIYY_URL . $memberlist['tui_code'];
            }
        }
        if(!empty($memberlist['tj_mid'])){
            $sj_where['m_id'] = $memberlist['tj_mid'];
            $sj_list = $ApimemberService->getInfo($sj_where,$field="m_mobile");
        }
        if(!empty($memberlist)){
            $memberlist['yaonum'] = $yaonum['zt_num']+$yaonum['jy1_num']+$yaonum['jy2_num'];//邀请人总数量
            if(!empty($sj_list['m_mobile'])){
                $Apiregister = new ApiregisterService();
                $new_mobile = $Apiregister->decrypt($sj_list['m_mobile']);
                $memberlist['tj_mobile'] = $new_mobile;
            }else{
                $memberlist['tj_mobile'] = "";
            }
            $this->response_data($memberlist);//返回会员信息
        }else{
            $this->response_error('没有该用户信息');
        }

    }
    //推荐我的人
    public function tui_me(){
        $res=$this->checktoken();//验证token
        if($res['state'] != '1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $where = ['m_id'=>$data['m_id']];//id
        $ApimemberService = new ApimemberService();
        $member = $ApimemberService->getInfo($where,$field="tj_mid");
        if(empty($member['tj_mid'])){
            $this->response_error('该用户无上级推荐人');
        }else{
            $sj_where['m_id'] = $member['tj_mid'];
            $sj_list = $ApimemberService->getInfo($sj_where,$field="m_mobile");
            $this->response_data($sj_list);//返回推荐人手机号
        }
    }
    //修改推荐人
    public function change_tui(){
        $res=$this->checktoken();//验证token
        if($res['state'] != '1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_mobile = $data['m_mobile'];
        $where = ['m_id'=>$data['m_id']];//id
        if(empty($m_mobile)){
            $this->response_error('手机号不为空');
        }
        $ApimemberService = new ApimemberService();
        $check_mobile = new ApiregisterService();
        $is_mobile = $check_mobile->isphone($m_mobile);//判断手机号是否正确
        if($is_mobile['status'] == '0'){
            $this->response_error('请输入正确的手机号格式');
        }
        $tui_where['m_mobile'] = $check_mobile->encrypt($m_mobile);//加密手机号
        $tui_list = $ApimemberService->getInfo($tui_where,$field="m_id");//查找推荐人id
        $res = $ApimemberService->getSave($where,['m_id'=>$tui_list['m_id']]);//修改用户的推荐人
        if($res){
            $this->response_data('修改成功');
        }else{
            $this->response_error('修改失败');
        }
    }
    //个人信息页
    public function personal(){
        $res=$this->checktoken();//验证token
        if($res['state'] != '1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $where = ['m_id'=>$data['m_id']];//id
        $ApimemberService = new ApimemberService();
        $memberlist = $ApimemberService->getavatar($where);
        if(!empty($memberlist)){
            if(!empty($memberlist['m_avatar'])){
                $tmp = strstr($memberlist['m_avatar'],'http://');
                if($tmp == false){
                    $memberlist['m_avatar'] = PAIYY_URL . $memberlist['m_avatar'];
                }
            }
            $this->response_data($memberlist);//返回会员头像跟昵称
        }else{
            $this->response_error('没有该用户');
        }
    }
    //接收传过来的昵称跟m_id修改用户昵称
    public function cg_name(){
        //m_id用户id m_name用户名称
        $res=$this->checktoken();//验证token
        if($res['state'] != '1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $where = ['m_id'=>$data['m_id']];
        if(empty($data['m_name'])){
            $this->response_error('用户昵称不为空');
        }
        if(preg_match('/^[a-zA-Z0-9]{1,10}$/',$data['m_name'])) {

        }else{
            $this->response_error('用户名由1-10位数字或字母、汉字组成！');
        }
        $ApimemberService = new ApimemberService();
        $list = $ApimemberService->changename($where,['m_name'=>$data['m_name']]);
        if($list){
            $this->response_data('修改昵称成功');
        }else{
            $this->response_error('修改昵称失败');
        }
    }
    //修改头像
    public function cg_avatar(){
        $res=$this->checktoken();//验证token
        if($res['state'] != '1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $where = ['m_id'=>$data['m_id']];
        $ApimemberService = new ApimemberService();
        $list = $ApimemberService->set_personal_data($where,$data);
        if($list['status'] == '1'){
            $this->response_data('修改成功!');
        }elseif($list['status'] == '-1'){
            $this->response_error('用户名由1-10位数字或字母、汉字组成!');
        } else{
            $this->response_error('修改失败!');
        }
    }
    //修改登陆密码
    public function cg_pwd(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApimemberService = new ApimemberService();
        //m_id用户id old_pwd旧密码 new_pwd新密码 re_pwd确定密码
        $data = $this->data;
        if(empty($data['m_id'])){
            $this->response_error('会员id不为空');
        }
        if(empty($data['old_pwd'])){
            $this->response_error('旧密码不为空');
        }
        if(empty($data['new_pwd'])){
            $this->response_error('新密码不为空');
        }
        if(empty($data['re_pwd'])){
            $this->response_error('确定密码不为空');
        }
        if($data['old_pwd'] == $data['new_pwd']){
            $this->response_error('新旧密码不能一致');
        }
        $where['m_pwd'] = md5($data['old_pwd']);
        $where['m_id'] = $data['m_id'];
        $res = $ApimemberService->getInfo($where,"*");
        if(!$res){
            $this->response_error('旧密码输入错误');
        }
        if($data['new_pwd'] != $data['re_pwd']){
            $this->response_error('两次密码不一致');
        }
        if((mb_strlen($data['new_pwd']) < 6) || (mb_strlen($data['re_pwd'])>16)){
            $this->response_error('请输入6-16位的密码');
        }
        $ApimemberService = new ApimemberService();
        $update['m_pwd'] =  md5($data['new_pwd']);
        $list = $ApimemberService->getSave($where,$update);
        if($list){
            $this->response_data('修改成功');
        }else{
            $this->response_error('修改失败');
        }
    }
    //修改支付密码
    public function cg_paypwd(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApimemberService = new ApimemberService();
        $data = $this->data;
        $where = ['m_id'=>$data['m_id']];
        //        绑定支付是开启此功能
        $info = $ApimemberService->getInfo($where,"m_payment_pwd");
        if($info['m_payment_pwd'] == null){
            $this->response_error('未设置支付密码');
        }
        //m_id用户id old_paypwd旧支付密码 new_paypwd新支付密码 re_paypwd确定支付密码
        if(empty($data['m_id'])){
            $this->response_error('会员id不为空');
        }
        if(empty($data['old_paypwd'])){
            $this->response_error('旧支付密码不为空');
        }
        if(empty($data['new_paypwd'])){
            $this->response_error('新支付密码不为空');
        }
        if(empty($data['re_paypwd'])){
            $this->response_error('确定支付密码不为空');
        }
        $where['m_payment_pwd'] = md5($data['old_paypwd']);
        $res = $ApimemberService->getInfo($where,"*");
        if(!$res){
            $this->response_error('旧密码输入错误');
        }
        if($data['new_paypwd'] != $data['re_paypwd']){
            $this->response_error('两次密码不一致');
        }
        if($data['old_paypwd'] == $data['new_paypwd']){
            $this->response_error('新旧密码一致无需修改');
        }
        if(!preg_match("/^[0-9]\d{5}$/",$data['new_paypwd'])){
            $this->response_error('请输入6位数字的支付密码');
        }
        $update['m_payment_pwd'] =  md5($data['new_paypwd']);

        $res = $ApimemberService->getSave($where,$update);
        if($res){
            $this->response_data('支付密码修改成功');
        }else{
            $this->response_error('修改失败,请稍后重试');
        }
    }
    //忘记支付密码
    public function pay_pwd(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApimemberService = new ApimemberService();
        $data = $this->data;
        $verification = $data['verification'];//验证码
        $m_mobile = $data['m_mobile'];//手机号码
        $sms = new SmsService();
        $res = $sms->checkSmsCode($verification,$m_mobile);//验证手机号码跟验证码是否正确
        if($res['status'] == 1){
            $res = $ApimemberService->forget_payment_pwd($data);
        }
        if($res['status'] == '0'){
            $this->response_error($res);
        }elseif($res['status'] == '1'){
            $this->response_data($res);
        }
    }
    //返回用户手机号
    public function return_mobile(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApimemberService = new ApimemberService();
        $data = $this->data;
        $m_id = $data['m_id'];
        $where['m_id'] = $m_id;
        $list = $ApimemberService->getmobile($where,$field="m_mobile");
        $mobile = $ApimemberService->decrypt($list);
        $this->response_data($mobile);
    }
    //忘记登陆密码
    public function m_pwd(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApimemberService = new ApimemberService();
        $data = $this->data;
        $verification = $data['verification'];//验证码
        $m_mobile = $data['m_mobile'];//手机号码
        $sms = new SmsService();
        $res = $sms->checkSmsCode($verification,$m_mobile);//验证手机号码跟验证码是否正确
        if($res['status'] == 1){
            $res = $ApimemberService->forget_m_pwd($data);
        }
        if($res['status'] == '0'){
            $this->response_error($res);
        }elseif($res['status'] == '1'){
            $this->response_data($res);
        }
    }
    /**
     * 生成会员二维码
     */
    public function qrcode(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $where['m_id'] = $data['m_id'];
        $ApimemberService = new ApimemberService();
        $qrcode = $ApimemberService->new_code($where);
        $this->response_data($qrcode);
    }
}