<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/9/20
 * Time: 10:45
 */

namespace app\api\controller;


use app\data\service\api\ApiauthenticationService;
use app\data\service\api\ApimemberService;
use app\data\service\orderPai\OrderPaiService;
use app\data\service\sms\AliService;
use app\data\service\sms\Sms1Service;
use app\data\service\sms\SmsService;
use think\Db;

class Authentication extends ApiIndex
{
    //实名认证
    public function tonameauth(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $where['m_id'] = $m_id;
        $tuiincome = new ApiauthenticationService();
        $member = $tuiincome->isattestation($where,$field='real_name,identification',$order=" order by add_time desc");
        if(!empty($member)){
            $this->response_data('您已实名认证');
        }
        $real_name = $data['real_name'];//姓名
        $identification = $data['identification'];//身份证号
        $idcard_positive = request()->file('idcard_positive');//身份证正面照  二进制
        $Apimemberservice = new ApimemberService();
        if($idcard_positive){
            $idcard_positive = $Apimemberservice->upload('idcard_positive','idcard_positive','',500,300);
        }else{
            if(!empty($data['idcard_positive']) && is_array($data) ){
                $data['idcard_positive'] = array_values(array_filter($data['idcard_positive']));
                $idcard_positive = $Apimemberservice->ba64_img($data['idcard_positive'],'idcard_positive')[0];
            }
        }
        $idcard_reverse = request()->file('idcard_reverse');//身份证反面照
        if($idcard_reverse){
            $idcard_reverse = $Apimemberservice->upload('idcard_reverse','idcard_reverse','',500,300);
        }else{
            if(!empty($data['idcard_reverse']) && is_array($data) ){
                $data['idcard_reverse'] = array_values(array_filter($data['idcard_reverse']));
                $idcard_reverse = $Apimemberservice->ba64_img($data['idcard_reverse'],'idcard_reverse')[0];
            }
        }
        if(empty($real_name)){
            $this->response_error('真实姓名不为空');
        }
        if(empty($identification)){
            $this->response_error('身份证号不为空');
        }
        $AliService = new AliService();
        $return_list = $AliService->id_check($identification,$real_name);
        if($return_list['status'] != 01){
            $this->response_error($return_list['msg']);
        }
        $sex = $return_list['sex'] == '女' ? 1 : 2;
        $update['m_id'] = $m_id;
        if(!empty($idcard_positive)){
            $update['idcard_positive'] = $idcard_positive;
        }
        if(!empty($idcard_reverse)){
            $update['idcard_reverse'] = $idcard_reverse;
        }
        $update['real_name'] = $real_name;
        $update['identification'] = $identification;
        $update['add_time'] = time();
        $update['area'] = !empty($return_list['area']) ? $return_list['area'] : '';
        $update['province'] = !empty($return_list['province']) ? $return_list['province'] : '';
        $update['city'] = !empty($return_list['city']) ? $return_list['city'] : '';
        $update['prefecture'] = !empty($return_list['prefecture']) ? $return_list['prefecture'] : '';
        $update['birthday'] = !empty(strtotime($return_list['birthday'])) ? strtotime($return_list['birthday']) : 0;
        $update['addrCode'] = !empty($return_list['addrCode']) ? $return_list['addrCode'] : '';
        $update['sex'] = $sex;
        $info = $tuiincome->add_attestation($update);//插入实名认证表
        $update_data['real_name'] = !empty($real_name) ? $real_name : '';
        $update_data['m_identification'] = !empty($identification) ? $identification : '';
        $update_member = Db('member')->where($where)->update($update_data);
        if($info){
            $this->response_data('实名认证提交成功');
        }else{
            $this->response_error('实名认证提交失败');
        }
    }
    //绑定提现银行卡
    public function bankcard(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $tuiincome = new ApiauthenticationService();
        $where['m_id'] = $data['m_id'];
        $info = $tuiincome->getInfo_attaestation($where,$filed="*",$order="order by add_time desc");
        if(empty($info)){
            $this->response_error('您还未实名认证');
        }
        if(empty($data['m_bankowner'])){
            $this->response_error('开户人不能为空');
        }
        if(empty($data['m_bankaccount'])){
            $this->response_error('个人银行卡号不能为空');
        }
        if(empty($data['m_bank_phone'])){
            $this->response_error('预留手机号不能为空');
        }
        if(empty($data['m_identification'])){
            $this->response_error('身份证号不能为空');
        }
        if(empty($data['verification'])){
            $this->response_error('验证码不能为空');
        }
        $sms = new SmsService();//此处检测短信验证是否正确
        $res = $sms->checkSmsCode($data['verification'],$data['m_bank_phone']);
        if($res['status']!=1){
            $this->response_error($res);
        }
        $AliService = new AliService();
        $return_list = $AliService->bank_check($data['m_bankaccount'],$data['m_identification'],$data['m_bank_phone'],$data['m_bankowner']);
        if($return_list['status'] != 01){
            $this->response_error($return_list['msg']);
        }
        $array = array(
            'm_bankowner'=>$return_list['name'],
            'm_bank_phone'=>$return_list['mobile'],
            'm_bankaccount'=>$return_list['accountNo'],
            'm_identification'=>$return_list['idCard'],
            'm_province'=>$return_list['province'],
            'm_city'=>$return_list['city'],
            'm_bankname'=>$return_list['bank'],
        );
        $list = $tuiincome->getSave($where,$array);//修改pai_membert表
        if(!empty($info['identification']) && empty($info['bankname']) && empty($info['bankaccount'])){//已实名注册
            $arr_atta = array(
                'bankowner'=>$return_list['name'],
                'bankname'=>$return_list['bank'],
                'bankaccount'=>$return_list['accountNo'],
                'bank_phone'=>$return_list['mobile'],
            );
            $save_atta = $tuiincome->get_atta($where,$arr_atta);//修改认证表
            if($list && $save_atta){
                $this->response_data('绑定银行卡成功');
            }else{
                $this->response_error('绑定银行卡失败');
            }
        }else{
            $arr_atta = array(
                'real_name'=>$info['real_name'],
                'identification'=>$info['identification'],
                'add_time'=>time(),
                'area'=>$info['area'],
                'province'=>$info['province'],
                'city'=>$info['city'],
                'prefecture'=>$info['prefecture'],
                'birthday' => $info['birthday'],
                'addrCode' => $info['addrCode'],
                'sex'=>$info['sex'],
                'bankowner'=>$return_list['name'],
                'bankname'=>$return_list['bank'],
                'bankaccount'=>$return_list['accountNo'],
                'bank_phone'=>$return_list['mobile'],
            );
            $insert = $tuiincome->add_attestation($arr_atta);//插入实名认证表
            if($list && $insert){
                $this->response_data('绑定银行卡成功');
            }else{
                $this->response_error('绑定银行卡失败');
            }
        }
    }
    //绑定提现银行卡并且实名认证
    public function bankcard_all(){
        $res=$this->checktoken();//验证token

        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $tuiincome = new ApiauthenticationService();
        $where['m_id'] = $m_id;
        $member = $tuiincome->isattestation($where,$field='*');
        if(!empty($member['bankowner']) && !empty($member['bankname']) && !empty($member['bankaccount']) && !empty($member['bank_phone'])){
            $this->response_error('目前暂时只支持绑定一张银行卡');
        }
        if(empty($data['m_bankowner'])){
            $this->response_error('开户人不能为空');
        }
        if(empty($data['m_bankaccount'])){
            $this->response_error('个人银行卡号不能为空');
        }
        if(empty($data['m_bank_phone'])){
            $this->response_error('预留手机号不能为空');
        }
        if(empty($data['m_identification'])){
            $this->response_error('身份证号不能为空');
        }
        if(empty($data['verification'])){
            $this->response_error('验证码不能为空');
        }
        Db::startTrans();
        try{
            $sms = new SmsService();//此处检测短信验证是否正确
            $res = $sms->checkSmsCode($data['verification'],$data['m_bank_phone']);
            if($res['status']!=1){
                $this->response_error($res);
            }
            $AliService = new AliService();
            if(empty($member)){//判断没有在实名认证表
                $return_list = $AliService->id_check($data['m_identification'],$data['m_bankowner']);
                if($return_list['status'] != '01'){
                    $this->response_error($return_list['msg']);
                }
                $sex = $return_list['sex'] == '女' ? 1 : 2;
                $update['m_id'] = $m_id;
                $update['real_name'] = $return_list['name'];
                $update['identification'] = $return_list['idCard'];
                $update['add_time'] = time();
                $update['area'] = $return_list['area'];
                $update['province'] = $return_list['province'];
                $update['city'] = $return_list['city'];
                $update['prefecture'] = $return_list['prefecture'];
                $update['birthday'] = strtotime($return_list['birthday']);
                $update['addrCode'] = $return_list['addrCode'];
                $update['sex'] = $sex;
                $attestation_id = $tuiincome->add_attestation($update);//插入实名认证表返回插入id
            }
            $return_list_ty = $AliService->bank_check($data['m_bankaccount'],$data['m_identification'],$data['m_bank_phone'],$data['m_bankowner']);
            if($return_list_ty['status'] != 01){
                $this->response_error($return_list_ty['msg']);
            }
            $array = array(
                'm_bankowner'=>$return_list_ty['name'],
                'm_bank_phone'=>$return_list_ty['mobile'],
                'm_bankaccount'=>$return_list_ty['accountNo'],
                'm_identification'=>$return_list_ty['idCard'],
                'm_province'=>$return_list_ty['province'],
                'm_city'=>$return_list_ty['city'],
                'm_bankname'=>$return_list_ty['bank'],
                'real_name'=>$return_list_ty['name'],
            );
            $list = $tuiincome->getSave($where,$array);//修改pai_member表
            $arr_atta = array(
                'real_name'=>$return_list_ty['name'],
                'identification'=>$return_list_ty['idCard'],
                'bankowner'=>$return_list_ty['name'],
                'bankname'=>$return_list_ty['bank'],
                'bankaccount'=>$return_list_ty['accountNo'],
                'bank_phone'=>$return_list_ty['mobile'],
            );
            $save_atta = $tuiincome->get_atta($where,$arr_atta);
            Db::commit();
            $this->response_data('绑定银行卡成功');
        }catch (\Exception $e){
            Db::rollback();
            $msg = $e ->getMessage();//错误信息
            $arr = array(
                'el_type_id'=>3,
                'el_description'=>$msg,
                'm_id'=>$m_id,
                'el_time'=>time(),
            );
            $res = Db('error_log')->insert($arr);//插入错误日志表
            $this->response_error('绑定银行卡失败');
        }
    }
    //检查用户wx_unionid
    public function check_wx_unionid()
    {
        $Authentication = new ApiauthenticationService();
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $wx_unionid = $data['wx_unionid'];
        if(empty($wx_unionid)){
            $this->response_error('wx_unionid不能为空');
        }
        $condition['wx_unionid']=$wx_unionid;
        $res = Db('member')->where($condition)->find();
        if($res){
            if(empty($res['m_mobile'])){
                $retu_data = ['status'=>1,'msg'=>'手机号未绑定'];
                $this->response_error($retu_data);
            }
            $return_data = ['status'=>2,'msg'=>'wx_unionid存在且手机号已绑定'];
            if(!empty($res['m_id'])){
                $return_data['m_id'] = $res['m_id'];
                $new_m_id = "abcde" . $res['m_id'];//m_id加上abcde
                $return_data['m_id_encryption'] = $Authentication->encrypt($new_m_id);//加密用户id
            }
            if(!empty($res['m_mobile'])){
                $m_mobile = $Authentication->decrypt($res['m_mobile']);
                $return_data['m_mobile'] = $m_mobile;//原始手机号
                $return_data['m_mobile_encryption'] = $res['m_mobile'];//加密的手机号
            }
            $this->response_data($return_data);
        }else{
            $return_dataty = ['status'=>3,'msg'=>'wx_unionid不存在'];
            $this->response_data($return_dataty);
        }
    }
    //绑定手机号
    public function bang_mobile(){
        $Authentication = new ApiauthenticationService();
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $m_mobile = $data['m_mobile'];//手机号
        $wx_unionid = $data['wx_unionid'];//微信unionid
        if(empty($m_mobile)){
            $this->response_error('手机号不能为空');
        }
        if(empty($wx_unionid)){
            $this->response_error('wx_unionid不能为空');
        }
        if(empty($data['verification'])){
            $this->response_error('验证码不能为空');
        }
        $sms = new SmsService();//此处检测短信验证是否正确
        $res = $sms->checkSmsCode($data['verification'],$m_mobile);
        if($res['status']!=1){
            $this->response_error($res);
        }
        $m_mobile = $Authentication->encrypt($m_mobile);
        $where['wx_unionid'] = $wx_unionid;
        $res = Db('member')->where($where)->update(array('m_mobile'=>$m_mobile,'edit_time'=>time()));
        if($res){
            $this->response_data('手机号绑定成功');
        }else{
            $this->response_error('手机号绑定失败');
        }
    }
    //发送验证码
    public function send_code(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $Authentication = new ApiauthenticationService();
        $data = $this->data;
        $phone = $data['m_mobile'];//手机号码
        $is_phone = $Authentication->isphone($phone);
        if($is_phone){
            $this->response_error($is_phone);
        }
        $map = [
            'm_mobile'=> $phone,
        ];
        $sms = new SmsService();
        $info = $sms->smsSingleSender($phone);
        if($info['status'] == '1'){
            $this->response_data($info);
        }elseif($info['status'] == '0'){
            $this->response_error($info);
        }
    }
    //验证验证码是否正确
    public function check_code(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_mobile = $data['m_mobile'];
        if(empty($data['verification'])){
            $this->response_error('验证码不能为空');
        }
        $sms = new SmsService();//此处检测短信验证是否正确
        $res = $sms->checkSmsCode($data['verification'],$m_mobile);
        if($res['status']!=1){
            $return_data=array();
            $return_data = $res;
            $this->response_data($return_data);
        }else{
            $this->response_data($res);
        }
    }
    //微信授权登陆
    public function weixin_login()
    {
        $Authentication = new ApiauthenticationService();
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $m_mobile_one = $data['m_mobile'];
        $m_mobile = $Authentication->encrypt($m_mobile_one);//加密手机号
        $wx_unionid = $data['wx_unionid'];//微信unionid
        $name = $data['name'];//昵称
        $uuid = $data['uuid'];//机器码
        if(empty($m_mobile)){
            $this->response_error('手机号不能为空');
        }
        if(empty($wx_unionid)){
            $this->response_error('wx_unionid不能为空');
        }
        $avatar = $data['avatar'];//头像
        if(empty($data['verification'])){
            $this->response_error('验证码不能为空');
        }
        $sms = new SmsService();//此处检测短信验证是否正确
        $res = $sms->checkSmsCode($data['verification'],$m_mobile_one);
        if($res['status']!=1){
            $this->response_error($res);
        }
        if(empty($avatar)){
            $this->response_error('微信头像不能为空');
        }
        if(empty($name)){
            $this->response_error('微信昵称不能为空');
        }
        if(empty($uuid)){
            $this->response_error('机器码不能为空');
        }
        $wx_unionid_where['wx_unionid'] = $wx_unionid;
        $wx_unionid_where['m_mobile'] = $m_mobile;
        $ishave_wx_unionid = Db('member')->where($wx_unionid_where)->find();
        if($ishave_wx_unionid){
            $this->response_error('wx_unionid已经存在');//wx_unionid不能已被绑定
        }
        $is_bang_mobile = Db('member')->where('wx_unionid',$wx_unionid)->find();
        if(!empty($is_bang_mobile)){
            $new_m_id = "abcde" . $is_bang_mobile['m_id'];//m_id加上abcde
            $encryption_m_id = $Authentication->encrypt($new_m_id);//加密用户id
            $return_data = array(
                'm_id'=>$is_bang_mobile['m_id'],
                'm_id_encryption'=>$encryption_m_id,
                'm_mobile_one'=>$m_mobile_one,
                'm_mobile'=>$m_mobile,
            );
            $this->response_data($return_data);
        }else{
            $bang_mobile_list = Db('member')->where('m_mobile',$m_mobile)->value('wx_unionid');
            if($bang_mobile_list){
                $this->response_error('手机号码已经绑定，请您换手机号码再绑定');
            }else{
                $have_wx_unionid = Db('member')->where('wx_unionid',$wx_unionid)->value('wx_unionid');
                if(empty($have_wx_unionid)) {//wx_unionid不存在
                    $have_mobile = Db('member')->where('m_mobile',$m_mobile)->value('m_id');//查找手机号是否存在
                    $is_have_wx_unionid = Db('member')->where('m_mobile',$m_mobile)->value('wx_unionid');
                    $is_bang_mobile = Db('member')->where('wx_unionid',$wx_unionid)->find();
                    if(empty($have_mobile) && empty($is_have_wx_unionid)){//手机号跟wx_unionid都为空，插入注册表
                        $data = array(
                            'm_name'=>$name,
                            'm_avatar'=>$avatar,
                            'm_mobile'=>$m_mobile,
                            'wx_unionid'=>$wx_unionid,
                            'wx_name'=>$name,
                            'wx_avatar'=>$avatar,
                            'popularity'=>100,
                            'uuid'=>$uuid,
                        );
//                        print_r($data);die();
                        $insert_data = Db('member')->insertGetId($data);
                        if($insert_data){
                            $new_m_id = "abcde" . $insert_data;//m_id加上abcde
                            $encryption_m_id = $Authentication->encrypt($new_m_id);//加密用户id
                            $return_data = array(
                                'm_id'=>$insert_data,
                                'm_id_encryption'=>$encryption_m_id,
                                'm_mobile_one'=>$m_mobile_one,
                                'm_mobile'=>$m_mobile,
                                'uuid'=>$uuid,
                            );
                            $this->response_data($return_data);//去登陆
                        }else{
                            $this->response_error('插入会员表失败');
                        }
                    }
                    if(!empty($have_mobile) && empty($is_have_wx_unionid)){//手机号不为空，wx_unionid为空，更新unionid
                        $update_unionid = Db('member')->where('m_mobile',$m_mobile)->update(['wx_unionid'=>$wx_unionid,'uuid'=>$uuid,'wx_name'=>$name,'wx_avatar'=>$avatar]);
                        $is_bang_mobile = Db('member')->where('wx_unionid',$wx_unionid)->find();
                        if($update_unionid){
                            $new_m_id = "abcde" . $is_bang_mobile['m_id'];//m_id加上abcde
                            $encryption_m_id = $Authentication->encrypt($new_m_id);//加密用户id
                            $return_data = array(
                                'm_id'=>$is_bang_mobile['m_id'],
                                'm_id_encryption'=>$encryption_m_id,
                                'm_mobile_one'=>$m_mobile_one,
                                'm_mobile'=>$m_mobile,
                                'uuid'=>$uuid,
                            );
                            $this->response_data($return_data);//去登陆
                        }else{
                            $this->response_error('修改wx_unionid失败');
                        }
                    }
                }else{//wx_unionid存在,更新m_mobile
                    $res = Db('member')->where('wx_unionid',$wx_unionid)->update(['m_mobile'=>$m_mobile,'uuid'=>$uuid,'wx_name'=>$name,'wx_avatar'=>$avatar]);
                    $is_bang_mobile = Db('member')->where('wx_unionid',$wx_unionid)->find();
                    if($res){
                        $new_m_id = "abcde" . $is_bang_mobile['m_id'];//m_id加上abcde
                        $encryption_m_id = $Authentication->encrypt($new_m_id);//加密用户id
                        $return_data = array(
                            'm_id'=>$is_bang_mobile['m_id'],
                            'm_id_encryption'=>$encryption_m_id,
                            'm_mobile_one'=>$m_mobile_one,
                            'm_mobile'=>$m_mobile,
                            'uuid'=>$uuid,
                        );
                        $this->response_data($return_data);//去登陆
                    }else{
                        $this->response_error('修改手机号失败');
                    }
                }
            }
        }
    }
    //手机号验证码登陆
    public function mobile_msg_login(){
        $Authentication = new ApiauthenticationService();
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        if(empty($data['m_mobile'])){
            $this->response_error('手机号不能为空');
        }
        if(empty($data['verification'])){
            $this->response_error('验证码不能为空');
        }
        $m_mobile_one = $data['m_mobile'];//原始手机号
        $m_mobile = $Authentication->encrypt($data['m_mobile']);//加密手机号
        $where['m_mobile'] = $m_mobile;
        $verification = $this->data['verification'];//验证码
        $uuid = $data['uuid'];//机器码
        if(empty($uuid)){
            $this->response_error('机器码不能为空');
        }
        $sms = new SmsService();//此处检测短信验证是否正确
        $res = $sms->checkSmsCode($data['verification'],$data['m_mobile']);
        if($res['status']!=1){
            $this->response_error($res);
        }
        $mobile_list = Db('member')->where($where)->find();
        $uuid_is_inmember = ['uuid'=>$uuid,'m_mobile'=>$m_mobile];
        $is_have_uuid = Db('member')->where($uuid_is_inmember)->find();//判断该手机号跟uuid是否已存在member表里面
        if(empty($mobile_list)){
            if(!empty($is_have_uuid)){
                $return_data = ['msg'=>'uuid已存在!'];
                $this->response_error($return_data);
            }
            $m_name = 'm'.substr(trim($data['m_mobile']),5);
            $insert_member = [
                'm_mobile'=>$m_mobile,
                'add_time'=>time(),
                'm_name'=>$m_name,
                'popularity'=>100,
                'uuid'=>$uuid,
            ];
            $insert_id = Db('member')->insertGetId($insert_member);
            $new_m_id = "abcde" . $insert_id;//m_id加上abcde
            $encryption_m_id = $Authentication->encrypt($new_m_id);//加密用户id
            $encryption_m_mobile = $m_mobile;//加密用户手机号
            if($insert_id){
                $return_data = ['msg'=>'注册登陆成功','m_id'=>$insert_id,'encryption_m_id'=>$encryption_m_id,'encryption_m_mobile'=>$encryption_m_mobile,'m_mobile_one'=>$m_mobile_one];
                $this->response_data($return_data);
            }else{
                $return_data = ['msg'=>'操作有误，请重新尝试!'];
                $this->response_error($return_data);
            }
        }else{
            if(empty($mobile_list['uuid'])){
                Db('member')->where($where)->update(['uuid'=>$uuid]);//判定没有机器码则添加进去
            }
            $new_m_id = "abcde" . $mobile_list['m_id'];//m_id加上abcde
            $encryption_m_id = $Authentication->encrypt($new_m_id);//加密用户id
            $encryption_m_mobile = $mobile_list['m_mobile'];//加密用户手机号
            $return_data = ['msg'=>'登陆成功','m_id'=>$mobile_list['m_id'],'encryption_m_id'=>$encryption_m_id,'encryption_m_mobile'=>$encryption_m_mobile,'m_mobile_one'=>$m_mobile_one];
            $this->response_data($return_data);
        }
    }
    //判定绑定手机号是否正确
    public function ishave_mobile(){
        $Authentication = new ApiauthenticationService();
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        if(empty($data['m_mobile'])){
            $this->response_error('手机号不能为空');
        }
        $m_mobile = $Authentication->encrypt($data['m_mobile']);//手机号
        $m_id = $data['m_id'];//用户id
        $where['m_id'] = $m_id;
        $member_mobile = Db('member')->where($where)->value('m_mobile');
        if($m_mobile == $member_mobile){
            $this->response_data('手机号正确');
        }else{
            $this->response_error('手机号错误');
        }
    }
    //换绑手机号
    public function change_mobile(){
        $Authentication = new ApiauthenticationService();
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        if(empty($data['new_mobile'])){
            $this->response_error('绑定手机号不能为空');
        }
        if(empty($data['verification'])){
            $this->response_error('验证码不能为空');
        }
        $new_mobile = $Authentication->encrypt($data['new_mobile']);//换绑新手机号
        $sms = new SmsService();//此处检测短信验证是否正确
        $res = $sms->checkSmsCode($data['verification'],$data['new_mobile']);
        if($res['status']!=1){
            $this->response_error($res);
        }
        $m_id = $data['m_id'];//用户id
        $where['m_id'] = $m_id;
        $old_mobile = Db('member')->where($where)->value('m_mobile');//旧手机号
        if($new_mobile == $old_mobile){
            $this->response_error('新旧手机号一致无需修改');
        }
        $update_data = array(
            'm_mobile'=>$new_mobile,
        );
        $result = Db('member')->where($where)->update($update_data);
        if($result){
            $this->response_data('换绑手机号成功');
        }else{
            $this->response_error('换绑手机号失败');
        }
    }
    //全额返现页面
    public function get_tip_detail(){
        $Authentication = new ApiauthenticationService();
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $m_id = $data['m_id'];
        $orderpai = new OrderPaiService();
        $callback = $orderpai->tip_detail($m_id);//调用刘勇豪的统计方法

        if(request()->isPost() || request()->isAjax()){
            $this->response_data($callback);
        }else{
            $this->response_error($callback);
        }
    }
}