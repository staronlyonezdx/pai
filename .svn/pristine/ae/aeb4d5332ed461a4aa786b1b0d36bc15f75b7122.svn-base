<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/9/1
 * Time: 10:41
 */

namespace app\api\controller;


use app\data\service\api\ApiincomeService;
use app\data\service\api\ApimemberService;
use app\data\service\api\ApituiinviterService;
use app\data\service\sms\AliService;
use app\data\service\sms\SmsService;
use app\data\service\system_msg\SystemMsgService;
use think\Db;
/*
 * 张文斌
 * 2018-9-1
 */
class Tuiincome extends Tuiapimember
{
    //我的收益主页面
    public function index(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $ml_type = $data['ml_type'];//传过来的筛选条件 默认为0显示全部 1为增加，2为减少
        $tuiincome = new ApiincomeService();
        $where['m_id'] = $data['m_id'];
        if(empty($this->data['curpage'])){
            $curpage="1";//当前页数
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum'])){
            $pagenum=10;//每页条数
        }
        else{
            $pagenum=$this->data['pagenum'];
        }
        $returnarray = array();//最后返回的数据
        $member = $tuiincome->getinfo($where,$field="m_income,m_frozen_income");//返回会员的收益资金/冻结收益
        $where_withdraw = "m_id=" .$m_id;
        $where_withdraw .= " and money_type = 2";
        $list = $tuiincome->getall_new($where_withdraw,$fields="add_time,ml_money,ml_type,ml_reason",$order="add_time desc",$curpage,$pagenum,$ml_type);
        $c= $tuiincome->get_withdraw_count($where_withdraw);//提现记录总条数
        $page_count=ceil($c/$pagenum);
        $ApituiinviterService = new ApituiinviterService();
        $pagelist=$ApituiinviterService->app_page($page_count);
        $returnarray = array(
            'm_income'=>$member['m_income'],
            'm_frozen_income'=>$member['m_frozen_income'],
            'data'=>$list,
            'pages'=>$pagelist['page_total'],
        );
        $this->response_data($returnarray);
    }
    //判断是否实名认证
    public function isnameauth(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $tuiincome = new ApiincomeService();
        $where['m_id'] = $m_id;
        $member = $tuiincome->isattestation($where,$field='identification,real_name');
        if(empty($member)){
            $this->response_error('您还未实名认证');
        }else{
            $arr = array(
                'msg'=>'您已实名认证',
                'real_name'=>$member['real_name'],
                'identification'=>$member['identification'],
            );
            $this->response_data($arr);
        }
    }
    //实名认证信息
    public function nameauth_list(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $tuiincome = new ApiincomeService();
        $where['m_id'] = $m_id;
        $member = $tuiincome->isattestation($where,$field='identification,real_name,sex,birthday,idcard_positive,idcard_reverse');
        if(!empty($member['birthday'])){
            $member['age'] = date('Y',time()) - date('Y',$member['birthday']);
            $member['birthday'] = date('Y-m-d',$member['birthday']);
        }
        if($member['sex'] == '1'){
            $member['sex'] = '女';
        }
        if($member['sex'] == '2'){
            $member['sex'] = '男';
        }
        if(!empty($member['idcard_positive'])){
            $member['idcard_positive'] = PAIYY_URL.$member['idcard_positive'];
        }
        if(!empty($member['idcard_reverse'])){
            $member['idcard_reverse'] = PAIYY_URL.$member['idcard_reverse'];
        }
        $this->response_data($member);
        if(empty($member)){
            $this->response_error('您还未实名认证');
        }else{
            $this->response_data($member);
        }
    }
    /*
     * 张文斌
     * 2018-9-13
     * 单独上传身份证正面
     */
    public function upload_positive(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $where['m_id'] = $data['m_id'];
        $tuiincome = new ApiincomeService();
        $list = $tuiincome->set_personal_data($where,$data);
        if($list['status'] == '1'){
            $this->response_data('修改成功!');
        }else{
            $this->response_error('修改失败!');
        }
    }
    /*
     * 张文斌
     * 2018-9-13
     * 单独上传身份证反面
     */
    public function set_personal_data_fan(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $where['m_id'] = $data['m_id'];
        $tuiincome = new ApiincomeService();
        $list = $tuiincome->set_personal_data_fan($where,$data);
        if($list['status'] == '1'){
            $this->response_data('修改成功!');
        }else{
            $this->response_error('修改失败!');
        }
    }
    //实名认证
    public function tonameauth(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $where['m_id'] = $m_id;
        $tuiincome = new ApiincomeService();
        $apimember = new ApimemberService();
        $member = $tuiincome->isattestation($where,$field='real_name,identification');
        if(!empty($member)){
            $this->response_data('您已实名认证');
        }
        $real_name = $data['real_name'];//姓名
        $identification = $data['identification'];//身份证号
        $idcard_positive = request()->file('idcard_positive');//身份证正面照  二进制
        $idcard_reverse = request()->file('idcard_reverse');//身份证反面照
        if(!empty($data['idcard_positive'])){
            if(!empty($data['idcard_positive']) && is_array($data['idcard_positive']) ){
                $data['idcard_positive'] = array_values(array_filter($data['idcard_positive']));
                $update['idcard_positive'] = $apimember->ba64_img($data['idcard_positive'],'idcard_positive')[0];
            }
        }
        if(!empty($data['idcard_reverse'])){
            if(!empty($data['idcard_reverse']) && is_array($data['idcard_reverse']) ){
                $data['idcard_reverse'] = array_values(array_filter($data['idcard_reverse']));
                $update['idcard_reverse'] = $apimember->ba64_img($data['idcard_reverse'],'idcard_reverse')[0];
            }
        }
        if(empty($real_name)){
            $this->response_error('真实姓名不为空');
        }
        if(empty($identification)){
            $this->response_error('身份证号不为空');
        }
        if(!empty($idcard_positive)){
            $idcard_positive_file = $tuiincome->upload('idcard_positive','idcard_positive','',500,300);//身份证正面
        }
        if(!empty($idcard_reverse)){
            $idcard_reverse_file = $tuiincome->upload('idcard_reverse','idcard_reverse','',500,300);//身份证反面
        }
        $AliService = new AliService();
        $return_list = $AliService->id_check($identification,$real_name);
        if($return_list['status'] == '02'){
            $this->response_error('验证不通过');
        }
        if($return_list['status'] == '202'){
            $this->response_error('无法验证');
        }
        if($return_list['status'] == '203'){
            $this->response_error('异常情况');
        }
        if($return_list['status'] == '204'){
            $this->response_error('姓名格式不正确  ');
        }
        if($return_list['status'] == '205'){
            $this->response_error('身份证格式不正确  ');
        }
        $sex = $return_list['sex'] == '女' ? 1 : 2;
        $update['m_id'] = $m_id;
        if(!empty($idcard_positive_file)){
            $update['idcard_positive'] = $idcard_positive_file;
        }
        if(!empty($idcard_reverse_file)){
            $update['idcard_reverse'] = $idcard_reverse_file;
        }
        $update['real_name'] = $real_name;
        $update['identification'] = $identification;
        $update['add_time'] = time();
        $update['area'] = $return_list['area'];
        $update['province'] = $return_list['province'];
        $update['city'] = $return_list['city'];
        $update['prefecture'] = $return_list['prefecture'];
        $update['birthday'] = strtotime($return_list['birthday']);
        $update['addrCode'] = $return_list['addrCode'];
        $update['sex'] = $sex;
        $info = $tuiincome->add_attestation($update);//插入实名认证表
        $update_member = Db('member')->where($where)->update(['real_name'=>$real_name,'m_identification'=>$identification]);
        if($info && $update_member){
            $this->response_data('实名认证提交成功');
        }else{
            $this->response_error('实名认证提交失败');
        }
    }
    //验证绑定银行卡手机号银行卡等信息否正确
    public function check_bankcard(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $tuiincome = new ApiincomeService();
        $where['m_id'] = $data['m_id'];
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
        $AliService = new AliService();
        $return_list = $AliService->bank_check($data['m_bankaccount'],$data['m_identification'],$data['m_bank_phone'],$data['m_bankowner']);
        if($return_list['status'] == '01'){
            $this->response_data('验证通过');
        }else{
            $this->response_error('验证失败');
        }
    }
    //绑定提现银行卡
    public function bankcard(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $tuiincome = new ApiincomeService();
        $where['m_id'] = $data['m_id'];
        $info = $tuiincome->getInfo($where,$filed="*");
        if(!empty($info['m_bankowner']) && !empty($info['m_bank_phone']) && !empty($info['m_bankaccount']) && !empty($info['m_identification'])){
            $this->response_error('只能绑定一个银行卡');
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
        $list = $tuiincome->getSave($where,$array);//修改pai_member表
        $arr_atta = array(
            'bankowner'=>$return_list['name'],
            'bankname'=>$return_list['bank'],
            'bankaccount'=>$return_list['accountNo'],
            'bank_phone'=>$return_list['mobile'],
        );
        $save_atta = $tuiincome->get_atta($where,$arr_atta);
        if($list && $save_atta){
            $this->response_data('绑定银行卡成功');
        }else{
            $this->response_error('绑定银行卡失败');
        }
    }
    //绑定提现银行卡并且实名认证
    public function bankcard_sm(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $tuiincome = new ApiincomeService();
        $where['m_id'] = $data['m_id'];
        $member = $tuiincome->isattestation($where,$field='real_name,identification');
        $info = $tuiincome->getInfo($where,$filed="*");
        if(!empty($info['m_bankowner']) && !empty($info['m_bank_phone']) && !empty($info['m_bankaccount']) && !empty($info['m_identification'])){
            $this->response_error('只能绑定一个银行卡');
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
        if(empty($member)){//判断没有在实名认证表
            Db::startTrans();
            try{
                $sms = new SmsService();//此处检测短信验证是否正确
                $res = $sms->checkSmsCode($data['verification'],$data['m_bank_phone']);
                if($res['status']!=1){
                    $this->response_error($res);
                }
                $AliService = new AliService();
                $return_list = $AliService->id_check($data['m_identification'],$data['m_bankowner']);
                if($return_list['status'] != '01'){
                    $this->response_error($return_list['msg']);
                }
                $sex = $return_list['sex'] == '女' ? 1 : 2;
                $update['m_id'] = $m_id;
//            print_r($return_list);exit();
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
                $AliService = new AliService();
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
                );
                $list = $tuiincome->getSave($where,$array);//修改pai_member表
                $arr_atta = array(
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

    }
    //我的银行卡
    public function mybankcard(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $where['m_id'] = $m_id;
        $tuiincome = new ApiincomeService();
        $list = $tuiincome->getInfo($where,$filed="m_bankname,m_bankaccount,m_bank_phone,m_bankowner,m_income");
        if(!empty($list['m_bankaccount']) && !empty($list['m_bankowner']) && !empty($list['m_bank_phone']) && !empty($list['m_bankname'])){
            $this->response_data($list);
        }else{
            $this->response_error('该用户还未绑定银行卡');
        }
    }
    //收益提现
    public function putforward(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $where['m_id'] = $m_id;
        $tuiincome = new ApiincomeService();
        $m_bankaccount = $data['m_bankaccount'];//提交的银行卡卡号
        $ti_amount = $data['ti_amount'];//提现金额
        $ti_member = $tuiincome->getInfo($where,$field="m_name");
        if(empty($m_bankaccount)){
            $this->response_error('绑定的银行卡不能为空');
        }
        if(!is_numeric($ti_amount) || $ti_amount < 100){
            $this->response_error('提现金额为大于等于100的数字类型');
        }
        $res = $tuiincome->getInfo($where,$field="*");
        if($res['m_bankaccount'] != $m_bankaccount){
            $this->response_error('您选择的银行卡跟绑定的银行卡号不一致，请重新选择');
        }
        //还得写入记录跟扣除收益金额
        $w_rate = 0.01;//手续费
        $last_date = strtotime('+7 day');//最后日期
        if(!$data['m_payment_pwd']){
            $this->response_error('支付密码不能为空');
        }
        $where = [
            'm_id'=>$m_id,
            'm_state'=>0,
            'm_payment_pwd'=>md5($data['m_payment_pwd']),
        ];
        $ishave = $tuiincome->getInfo($where,$field="m_money,m_frozen_money,m_income,m_frozen_income");
        if(!$ishave){
            $this->response_error('支付密码不正确!');
        }
        $save = array();
        $w_poundage = $ti_amount * $w_rate;//手续费
        $end_amount = $ti_amount - $w_poundage;
        $amount = $ishave['m_income'] - $ti_amount;//收益资金减去提现金额
        if($amount < 0){
            $this->response_error('您的收益资金小于提现金额!');
        }
        $monsy_type = 2;
        $reason = "提现到银行卡";
        $old_income = $ishave['m_income'];//原本收益资金
        $m_frozen_money = $ishave['m_frozen_money'] + $ti_amount;//账号冻结资金加上提现金额
        $save=['m_income'=>$amount,'m_frozen_income'=>$m_frozen_money];
        Db::startTrans();//启动事务
        try{
            $where2 = ['m_id'=>$m_id];
            $savety = $tuiincome->getSave($where,$save);//更改用户表金额
            //插入收益记录表
            $withdraw_log = array(
                'w_time'=>time(),
                'w_mid'=>$m_id,
                'w_money'=>$ti_amount,
                'w_state'=>0,
                'w_last_time'=>$last_date,
                'w_rate'=>$w_rate,
                'w_poundage'=>$w_poundage,
                'w_new_proce'=>$end_amount,
                'w_type'=>2,
                'is_urgent'=>1,
                'w_old_moneymount'=>$old_income,
            );
            $add_withdraw_id = $tuiincome->get_withdraw_id($withdraw_log);
            //插入money_log表
            $money_log = array(
                'ml_type'=>'reduce',
                'ml_reason'=>'提现到银行卡',
                'ml_table'=>1,
                'ml_money'=>$ti_amount,
                'money_type'=>2,
                'add_time'=>time(),
                'from_id'=>$add_withdraw_id,
                'state' =>1,
                'withdraw_method'=>3,
                'm_id'=>$m_id,
                'nickname'=>$ti_member['m_name'],
                'card_number'=>$m_bankaccount,
            );
            $insert_monry_log = $tuiincome->addmoney_log($money_log);//插入money_log
            //插入冻结表
            $f_money = $tuiincome->get_last_info('f_money',$m_id);//查找用户在frozen表的最后的冻结资金
            $f_moneys = $f_money['f_money'] + $ti_amount;
            $frozen_log = array(
                'f_type'=>'add',
                'f_money'=>$f_moneys,
                'f_typeid'=>1,
                'f_time'=>time(),
                'f_from_id'=>$add_withdraw_id,
                'm_id'=>$m_id
            );
            $add_foren = $tuiincome->add_frozen($frozen_log);
            $end_frozen = $ishave['m_frozen_income'] + $ti_amount;
            $data_frozen = array(
                'm_frozen_income'=>$end_frozen,
            );
            $change_frozen_income = $tuiincome->getSave($where,$data_frozen);
            // 提交事务
            Db::commit();
            $this->response_data('提现申请成功!');
        } catch (\Exception $e){
            Db::rollback();
            $this->response_error('提现申请失败,请稍后重试!');
        }
    }
    //设置支付密码
    public function setpaypwd(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        if(empty($data['m_payment_pwd'])){
            $this->response_error('支付密码不为空');
        }
        if(!preg_match("/^[0-9]\d{5}$/",$data['m_payment_pwd'])){
            $this->response_error('请输入6位数字的支付密码');
        }
        $update['m_payment_pwd'] =  md5($data['m_payment_pwd']);
        $where['m_id'] = $m_id;
        $tuiincome = new ApiincomeService();
        $save = $tuiincome->getSave($where,$update);
//        $this->response_data($save);
        if($save){
            $this->response_data('设置支付密码成功!');
        }else{
            $this->response_error('设置支付密码失败!');
        }
    }
    //当前积分主页
    public function point(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $tuiincome = new ApiincomeService();
        $where['m_id'] = $data['m_id'];
        $returnarray = array();//最后返回的数据
        $member = $tuiincome->getinfo($where);//返回会员积分
        if(empty($this->data['curpage'])){
            $curpage="1";
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum'])){
            $pagenum=10;
        }
        else{
            $pagenum=$this->data['pagenum'];
        }
//        $list = $tuiincome->getallpoint($m_id);
        $where_new = "pl_mid=" . $this->data['m_id'];
        $list = $tuiincome->getpage_member($where_new,$fields="pl_num,pl_time,pl_type,pl_reason",$order="pl_time desc",$curpage,$pagenum);
        $c= $tuiincome->get_count($where_new);//消费记录总条数
        $page_count=ceil($c/$pagenum);
        $ApituiinviterService = new ApituiinviterService();
        $pagelist=$ApituiinviterService->app_page($page_count);
        $returnarray = array(
            'tui_diamond'=>$member['tui_diamond'],
            'data'=>$list,
            'pages'=>$pagelist['page_total'],
        );
        $this->response_data($returnarray);
    }
    //添加充值订单
//    public function addpayorder(){
//        $data = $this->data;
//        $m_id = $this->data['m_id'];//用户id
//        $tuiincome = new ApiincomeService();
//        $r_money = input('param.r_money');//充值金额
//        $r_type = input('param.r_type');//充值方式
//        $data = [
//            'm_id'=>$m_id,
//            'r_time'=>time(),
//            'r_state'=>1,
//            'r_type'=>$r_type,
//            'r_money'=>$r_money,
//            'r_type_code'=>$r_type,
//        ];
//        $pl_data = array(
//            'pl_num'=>input('param.pl_num'),//积分
//            'pl_mid'=>$m_id,
//            'pl_state'=>1,
//            'pl_reason'=>'充值积分',
//            'pl_type'=>'add',
//            'pl_time'=>time(),
//        );
//        $r_type_code='';
//        switch ($r_type){
//            case 1:
//                $r_type_code = 'wxpay';
//                break;
//            case 2:
//                $r_type_code = 'wxh5pay';
//                break;
//        }
//        if($r_type != '1' || !is_numeric($r_type)){
//            $this->response_error('请选择微信支付类型');
//        }
//        if(!is_numeric($r_money) || $r_money <= 0){
//            $this->response_error('充值金额为大于0的数字类型');
//        }
//        $data['r_type_code']=$r_type_code;
//        $tuiincome = new ApiincomeService();
//        $o_id = $tuiincome->get_add_id($data);//插入充值表并且返回id
//        $pl_id = $tuiincome->get_pl_id($data);//插入积分记录表并且返回id
//        if(empty($o_id)){
//            $this->response_error(['status'=>'0','msg'=>'充值订单生成失败']);
//        }
//        else{
//            $this->response_data(['status'=>1,'msg'=>'充值订单生成成功','r_id'=>$o_id]);
//        }
//    }
    //微信JSAPI支付
//    public function wx_jsapi_pay(){
//        require_once "../vendor/wxpay/lib/WxPay.Api.php";
//        require_once "../vendor/wxpay/WxPay.JsApiPay.php";
//        require_once "../vendor/wxpay/WxPay.Config.php";
//        try{
//            $data = $this->data;
//            $r_id=$data['r_id'];
//            if(empty($r_id)){
//                $this->response_error("充值订单ID不能为空");
//            }
//            $recharge = new ApiincomeService();
//            $where['r_id']=$r_id;
//            $fields="r_id,r_money";
//            $info=$recharge->get_Info($where,$fields);
//            if(empty($info)){
//                $this->response_error("充值订单信息为空");
//            }
//            $o_id=$info['r_id']."-".rand(1,99999).time();
//            $r_money=intval($info['r_money']*100);
//            $tools = new \JsApiPay();
//            $openId = $tools->GetOpenid();
//            //②、统一下单
//            $input = new \WxPayUnifiedOrder();
//            $input->SetBody("晟域俱乐部");
//            $input->SetAttach("充值");
//            $input->SetOut_trade_no($o_id);
//            $input->SetTotal_fee($r_money);
//            $input->SetTime_start(date("YmdHis"));
//            $input->SetTime_expire(date("YmdHis", time() + 6000));
//            $input->SetGoods_tag("积分充值");
//            $input->SetNotify_url("http://www.paiyy.com.cn/index/notify2/wx_jsapi_notify");
//            $input->SetTrade_type("JSAPI");
//            $input->SetOpenid($openId);
//            $config = new \WxPayConfig();
//            $order = \WxPayApi::unifiedOrder($config, $input);
//            $jsApiParameters = $tools->GetJsApiParameters($order);
////            $this->assign('jsApiParameters',$jsApiParameters);
////            $this->assign('o_id',$info['r_id']);
//            $this->response_data(['jsApiParameters'=>$jsApiParameters,'o_id'=>$info['r_id']]);
////            return $this->fetch();
//        } catch(Exception $e) {
//
//        }
//
//    }
    //支付成功
//    public function recharge_success(){
//        $data = $this->data;
//        $m_id = $data['m_id'];//用户id
//        $recharge = new ApiincomeService();
//        $r_id=$data['r_id'];//订单id
//        $where = [
//            'r_id'=>$r_id,
//            'm_id'=>$m_id
//        ];
//        $info = $recharge->get_info($where,'r_id,r_money,r_type,r_time,r_state,r_success_time,r_jump_type,r_jump_id');//查找充值记录
//        if(empty($info)){
//            $this->error("支付信息不存在");
//        }
//        switch ($info['r_type']){
//            case 1:
//                $info['r_type_code'] = '微信公众号支付';
//                break;
//            case 2:
//                $info['r_type_code'] = '微信H5支付';
//                break;
//            case 3:
//                $info['r_type_code'] = '支付宝H5支付';
//                break;
//            case 4:
//                $info['r_type_code'] = '银行卡支付';
//                break;
//            case 5:
//                $info['r_type_code'] = '余额充值花生';
//                break;
//            default:
//                $info['r_type_code'] = '未知';
//                break;
//        }
//        $info['r_money'] = empty($info['r_money']) ? 0 : $info['r_money'];
//        $info['r_time'] = empty($info['r_time']) ? '0' : $info['r_time'];
//        $info['r_success_time'] = empty($info['r_success_time']) ? '0' : $info['r_success_time'];
//        $info['r_state'] = empty($info['r_state']) ? '0' : $info['r_state'];
//        $info['r_time'] = date("Y-m-d H:i",$info['r_time']);
//        $info['r_success_time']=date("Y-m-d H:i",$info['r_success_time']);
//        $this->assign('info',$info);
//        $this->assign('header_title','充值详情');
//        $jump_url="/member/wallet/index";
//        if($info['r_jump_type']=='1'&&!empty($info['r_jump_id']))
//        {
//            $jump_url="/member/orderpai/index/o_id/".$info['r_jump_id'];
//        }
//        if($info['r_jump_type']=='2'&&!empty($info['r_jump_id']))
//        {
//            $jump_url="/member/store/deposit/g_id/".$info['r_jump_id'];
//        }
//        if($info['r_jump_type']=='3')
//        {
//            $jump_url="/member/myhome/peanut";
//        }
//        if($info['r_jump_type']=='4') //跳积分商品
//        {
//            $jump_url="/popularity/popularitygoods/commodity_info/pg_id/".$info['r_jump_id'];;
//        }
//        $this->assign('jump_url',$jump_url);
//        $this->assign('header_path',$jump_url);
//        return view();
//    }
    //充值积分成功分销
    public function Distribution(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $data['m_id'];//用户id
        $amount = $data['r_money'];//充值金额
        $status = $data['status'];//充值的金额分类
        if($amount <= 0 || !is_numeric($amount)){
            $this->response_error('充值的金额必须大于0的数字类型');
        }
        $tuiincome = new ApiincomeService();
        $where['m_id'] = $m_id;
        $member = $tuiincome->getInfo($where,$field="m_point,tj_mid,m_tj_mid2,m_tj_jy1,m_tj_jy2,ml_tui_id,m_name");
        if(empty($member)){
            $this->response_error('参数有误，没有该会员');
        }
        if($status == '1'){
            $point = 200;
            $money = 100;
        }elseif($status == '2'){
            $point = 3000;
            $money = 1000;
        }
        $end_point = $point + $member['m_point'];//最后会员积分
        Db::startTrans();//开启事务
        try{
            $res = $tuiincome->getSave($where,['m_point'=>$end_point]);//修改充值人积分
            $data = array(
                'm_id'=>$m_id,
                'r_time'=>time(),
                'r_state'=>8,
                'r_type'=>1,
                'r_money'=>$money,
                'r_type_code'=>1,
                'r_success_time'=>time(),
            );
            $recharge_id = $tuiincome->get_add_id($data);//插入充值记录
            switch($member['ml_tui_id']){
                case 1://创推人
                    if(!empty($member['tj_mid'])){//一级推荐人
                        $tj_where['m_id'] = $member['tj_mid'];//一级推荐人id
                        $tj_list = $tuiincome->getInfo($tj_where,$field="m_money,ml_tui_id,m_id");//推荐人信息
                        if($tj_list['ml_tui_id'] == '1'){
                            $end_money = "";
                            $end_money = $money * 0.1 + $tj_list['m_money'];
                            $save_money['m_money'] = $end_money;
                            $res = $tuiincome->getSave($tj_where,$save_money);//修改一级推荐人余额
                            $money_log = array(
                                'ml_type'=>'add',
                                'ml_reason'=>'下下级'.$member['m_name'].'充值积分,一级推荐人获得现金',
                                'ml_money'=>$money * 0.1,
                                'money_type'=>2,
                                'nickname'=>$member['m_name'],
                                'position'=>$member['ml_tui_id'],
                                'member_type'=>1,
                                'income_type'=>1,
                                'add_time'=>time(),
                                'from_id'=>$recharge_id,
                                'm_id'=>$tj_list['m_id'],
                                'state'=>8,
                            );
                            $tuiincome->addmoney_log($money_log);
                        }
                    }
                    if(!empty($member['m_tj_mid2'])){
                        $tj_up_where['m_id'] = $member['m_tj_mid2'];//二级推荐人id
                        $tj_up_list = $tuiincome->getInfo($tj_up_where,$field="m_money,ml_tui_id,m_id");
                        if($tj_up_list['ml_tui_id'] == '1') {
                            $end_up_money = "";
                            $end_up_money = $money * 0.03 + $tj_up_list['m_money'];
                            $save_up_money['m_money'] = $end_up_money;
                            $res = $tuiincome->getSave($tj_up_where, $save_up_money);
                            $money_log = array(
                                'ml_type'=>'add',
                                'ml_reason'=>'下级'.$member['m_name'].'充值积分,二级推荐人获得现金',
                                'ml_money'=>$money * 0.03,
                                'money_type'=>2,
                                'nickname'=>$member['m_name'],
                                'position'=>$member['ml_tui_id'],
                                'member_type'=>1,
                                'income_type'=>1,
                                'add_time'=>time(),
                                'from_id'=>$recharge_id,
                                'm_id'=>$tj_up_list['m_id'],
                                'state'=>8,
                            );
                            $tuiincome->addmoney_log($money_log);
                        }
                    }
                    if(!empty($member['m_tj_jy1'])){
                        $jy_where['m_id'] = $member['m_tj_jy1'];//顶级基因人id
                        $jy_list = $tuiincome->getInfo($jy_where,$field="m_money,ml_tui_id,m_id");//顶级基因人信息
                        if($jy_list['ml_tui_id'] == '1'){
                            $end_money = "";
                            $end_money = $money * 0.03 + $jy_list['m_money'];//顶级基因总金额
                            $save_money['m_money'] = $end_money;
                            $res = $tuiincome->getSave($jy_where,$save_money);//修改金额表
                            $money_log = array(
                                'ml_type'=>'add',
                                'ml_reason'=>$member['m_name'].'充值积分,顶级基因获得现金',
                                'ml_money'=>$money * 0.03,
                                'money_type'=>2,
                                'nickname'=>$member['m_name'],
                                'position'=>$member['ml_tui_id'],
                                'member_type'=>1,
                                'income_type'=>1,
                                'add_time'=>time(),
                                'from_id'=>$recharge_id,
                                'm_id'=>$jy_list['m_id'],
                                'state'=>8,
                            );
                            $tuiincome->addmoney_log($money_log);//插入金额表
                        }
                    }
                    if(!empty($member['m_tj_jy2'])){
                        $jy_two_where['m_id'] = $member['m_tj_jy2'];//二级基因人id
                        $jy_two_list = $tuiincome->getInfo($jy_two_where,$field="m_point,ml_tui_id,m_id");//二级基因人信息
                        if($jy_two_list['ml_tui_id'] == '1'){
                            $end_money = "";
                            $end_money = $money * 0.05 + $jy_two_list['m_money'];//顶级基因总金额
                            $save_money['m_money'] = $end_money;
                            $res = $tuiincome->getSave($jy_two_where,$save_money);//修改金额表
                            $money_log = array(
                                'ml_type'=>'add',
                                'ml_reason'=>$member['m_name'].'充值积分,二级基因获得现金',
                                'ml_money'=>$money * 0.05,
                                'money_type'=>2,
                                'nickname'=>$member['m_name'],
                                'position'=>$member['ml_tui_id'],
                                'member_type'=>1,
                                'income_type'=>1,
                                'add_time'=>time(),
                                'from_id'=>$recharge_id,
                                'm_id'=>$jy_two_list['m_id'],
                                'state'=>8,
                            );
                            $tuiincome->addmoney_log($money_log);//插入金额表
                        }
                    }
                    break;
                case 2://品推人
                    if(!empty($member['tj_mid'])){//一级推荐人
                        $tj_where['m_id'] = $member['tj_mid'];//一级推荐人id
                        $tj_list = $tuiincome->getInfo($tj_where,$field="m_money,ml_tui_id,m_id");//推荐人信息
                        if($tj_list['ml_tui_id'] == '1' || $tj_list['ml_tui_id'] == '2'){
                            $end_money = "";
                            $end_money = $money * 0.1 + $tj_list['m_money'];
                            $save_money['m_money'] = $end_money;
                            $res = $tuiincome->getSave($tj_where,$save_money);
                            $money_log = array(
                                'ml_type'=>'add',
                                'ml_reason'=>'下下级'.$member['m_name'].'充值积分,一级推荐人获得现金',
                                'ml_money'=>$money * 0.1,
                                'money_type'=>2,
                                'nickname'=>$member['m_name'],
                                'position'=>$member['ml_tui_id'],
                                'member_type'=>1,
                                'income_type'=>1,
                                'add_time'=>time(),
                                'from_id'=>$recharge_id,
                                'm_id'=>$tj_list['m_id'],
                            );
                            $tuiincome->addmoney_log($money_log);
                        }
                    }
                    if(!empty($member['m_tj_mid2'])){
                        $tj_up_where['m_id'] = $member['m_tj_mid2'];//二级推荐人id
                        $tj_up_list = $tuiincome->getInfo($tj_up_where,$field="m_money,ml_tui_id,m_id");
                        if($tj_up_list['ml_tui_id'] == '1' || $tj_up_list['ml_tui_id'] == '2') {
                            $end_up_money = "";
                            $end_up_money = $money * 0.03 + $tj_up_list['m_money'];
                            $save_up_money['m_money'] = $end_up_money;
                            $res = $tuiincome->getSave($tj_up_where, $save_up_money);
                            $money_log = array(
                                'ml_type'=>'add',
                                'ml_reason'=>'下级'.$member['m_name'].'充值积分,二级推荐人获得现金',
                                'ml_money'=>$money * 0.03,
                                'money_type'=>2,
                                'nickname'=>$member['m_name'],
                                'position'=>$member['ml_tui_id'],
                                'member_type'=>1,
                                'income_type'=>1,
                                'add_time'=>time(),
                                'from_id'=>$recharge_id,
                                'm_id'=>$tj_up_list['m_id'],
                            );
                            $tuiincome->addmoney_log($money_log);
                        }
                    }
                    if(!empty($member['m_tj_jy1'])){//充值身份是2跟1时候有问题
                        $jy_where['m_id'] = $member['m_tj_jy1'];//顶级基因人id
                        $jy_list = $tuiincome->getInfo($jy_where,$field="m_point,ml_tui_id,m_id");//顶级基因人信息
                        if($jy_list['ml_tui_id'] == '1' || $jy_list['ml_tui_id'] == '2'){
                            $end_money = "";
                            $end_money = $money * 0.03 + $jy_list['m_money'];//顶级基因总金额
                            $save_money['m_money'] = $end_money;
                            $res = $tuiincome->getSave($jy_where,$save_money);//修改金额表
                            $money_log = array(
                                'ml_type'=>'add',
                                'ml_reason'=>$member['m_name'].'充值积分,顶级基因获得现金',
                                'ml_money'=>$money * 0.03,
                                'money_type'=>2,
                                'nickname'=>$member['m_name'],
                                'position'=>$member['ml_tui_id'],
                                'member_type'=>1,
                                'income_type'=>1,
                                'add_time'=>time(),
                                'from_id'=>$recharge_id,
                                'm_id'=>$jy_list['m_id'],
                                'state'=>8,
                            );
                            $tuiincome->addmoney_log($money_log);//插入金额表
                        }
                    }
                    if(!empty($member['m_tj_jy2'])){
                        $jy_two_where['m_id'] = $member['m_tj_jy2'];//二级基因人id
                        $jy_two_list = $tuiincome->getInfo($jy_two_where,$field="m_point,ml_tui_id,m_id");//二级基因人信息
                        if($jy_two_list['ml_tui_id'] == '1' || $jy_two_list['ml_tui_id'] == '2'){
                            $end_money = "";
                            $end_money = $money * 0.05 + $jy_two_list['m_money'];//顶级基因总金额
                            $save_money['m_money'] = $end_money;
                            $res = $tuiincome->getSave($jy_two_where,$save_money);//修改金额表
                            $money_log = array(
                                'ml_type'=>'add',
                                'ml_reason'=>$member['m_name'].'充值积分,二级基因获得现金',
                                'ml_money'=>$money * 0.05,
                                'money_type'=>2,
                                'nickname'=>$member['m_name'],
                                'position'=>$member['ml_tui_id'],
                                'member_type'=>1,
                                'income_type'=>1,
                                'add_time'=>time(),
                                'from_id'=>$recharge_id,
                                'm_id'=>$jy_two_list['m_id'],
                                'state'=>8,
                            );
                            $tuiincome->addmoney_log($money_log);//插入金额表
                        }
                    }
                    break;
                case 3://vip会员
                    if(!empty($member['tj_mid'])){//一级推荐人
                        $tj_where['m_id'] = $member['tj_mid'];//一级推荐人id
                        $tj_list = $tuiincome->getInfo($tj_where,$field="m_point,ml_tui_id,m_id");//推荐人信息
                        if($tj_list['ml_tui_id'] == '1' || $tj_list['ml_tui_id'] == '2' || $tj_list['ml_tui_id'] == '3'){
                            $end_point = "";
                            $end_point = $point * 0.1 + $tj_list['m_point'];
                            $save_money['m_point'] = $end_point;
                            $res = $tuiincome->getSave($tj_where,$save_money);
                            $point_log = array(
                                'pl_num'=>$point * 0.1,
                                'pl_time'=>time(),
                                'from_id'=>$recharge_id,
                                'pl_type'=>'add',
                                'pl_reason'=>'一级推荐人获得积分',
                                'pl_state'=>8,
                                'pl_mid'=>$tj_list['m_id'],
                            );
                            $tuiincome->get_pl_id($point_log);//积分记录表
                        }
                    }
                    if(!empty($member['m_tj_mid2'])){
                        $tj_up_where['m_id'] = $member['m_tj_mid2'];//二级推荐人id
                        $tj_up_list = $tuiincome->getInfo($tj_up_where,$field="m_point,ml_tui_id,m_id");
                        if($tj_up_list['ml_tui_id'] == '1' || $tj_up_list['ml_tui_id'] == '2' || $tj_up_list['ml_tui_id'] == '3') {
                            $end_up_point = "";
                            $end_up_point = $point * 0.03 + $tj_up_list['m_point'];
                            $save_up_money['m_point'] = $end_up_point;
                            $res = $tuiincome->getSave($tj_up_where, $save_up_money);
                            $point_log = array(
                                'pl_num'=>$point * 0.03,
                                'pl_time'=>time(),
                                'from_id'=>$recharge_id,
                                'pl_type'=>'add',
                                'pl_reason'=>'二级推荐人获得积分',
                                'pl_state'=>8,
                                'pl_mid'=>$tj_up_list['m_id'],
                            );
                            $tuiincome->get_pl_id($point_log);//积分记录表
                        }
                    }
                    if(!empty($member['m_tj_jy1'])){
                        $jy_where['m_id'] = $member['m_tj_jy1'];//顶级基因人id
                        $jy_list = $tuiincome->getInfo($jy_where,$field="m_point,ml_tui_id,m_id");//顶级基因人信息
                        if($jy_list['ml_tui_id'] == '1' || $jy_list['ml_tui_id'] == '2' || $jy_list['ml_tui_id'] == '3'){
                            $end_point = "";
                            $end_point = $point * 0.03 + $jy_list['m_point'];
                            $save_point['m_point'] = $end_point;
                            $res = $tuiincome->getSave($jy_where,$save_point);
                            $point_log = array(
                                'pl_num'=>$point * 0.03,
                                'pl_time'=>time(),
                                'from_id'=>$recharge_id,
                                'pl_type'=>'add',
                                'pl_reason'=>'顶级基因获得积分',
                                'pl_state'=>8,
                                'pl_mid'=>$jy_list['m_id'],
                            );
                            $tuiincome->get_pl_id($point_log);//积分记录表
                        }
                    }
                    if(!empty($member['m_tj_jy2'])){
                        $jy_two_where['m_id'] = $member['m_tj_jy2'];//二级基因人id
                        $jy_two_list = $tuiincome->getInfo($jy_two_where,$field="m_point,ml_tui_id,m_id");//二级基因人信息
                        if($jy_two_list['ml_tui_id'] == '1' || $jy_two_list['ml_tui_id'] == '2' || $jy_two_list['ml_tui_id'] == '3'){
                            $end_two_point = "";
                            $end_two_point = $point * 0.05 + $jy_two_list['m_point'];
                            $save_point['m_point'] = $end_two_point;
                            $res = $tuiincome->getSave($jy_two_where,$save_point);
                            $point_log = array(
                                'pl_num'=>$point * 0.05,
                                'pl_time'=>time(),
                                'from_id'=>$recharge_id,
                                'pl_type'=>'add',
                                'pl_reason'=>'二级基因获得积分',
                                'pl_state'=>8,
                                'pl_mid'=>$jy_two_list['m_id'],
                            );
                            $tuiincome->get_pl_id($point_log);//积分记录表
                        }
                    }
                    break;
                case 4://普通会员
                    if(!empty($member['tj_mid'])){//一级推荐人
                        $tj_where['m_id'] = $member['tj_mid'];//一级推荐人id
                        $tj_list = $tuiincome->getInfo($tj_where,$field="m_point,ml_tui_id,m_id");//推荐人信息
                        if($tj_list['ml_tui_id'] == '1' || $tj_list['ml_tui_id'] == '2' || $tj_list['ml_tui_id'] == '3' || $tj_list['ml_tui_id'] == '4'){
                            $end_point = "";
                            $end_point = $point * 0.1 + $tj_list['m_point'];
                            $save_money['m_point'] = $end_point;
                            $res = $tuiincome->getSave($tj_where,$save_money);
                            $point_log = array(
                                'pl_num'=>$point * 0.1,
                                'pl_time'=>time(),
                                'from_id'=>$recharge_id,
                                'pl_type'=>'add',
                                'pl_reason'=>'一级推荐人获得积分',
                                'pl_state'=>8,
                                'pl_mid'=>$tj_list['m_id'],
                            );
                            $tuiincome->get_pl_id($point_log);//积分记录表
                        }
                    }
                    if(!empty($member['m_tj_mid2'])){
                        $tj_up_where['m_id'] = $member['m_tj_mid2'];//二级推荐人id
                        $tj_up_list = $tuiincome->getInfo($tj_up_where,$field="m_point,ml_tui_id,m_id");
                        if($tj_up_list['ml_tui_id'] == '1' || $tj_up_list['ml_tui_id'] == '2' || $tj_up_list['ml_tui_id'] == '3' || $tj_up_list['ml_tui_id'] == '4') {
                            $end_up_point = "";
                            $end_up_point = $point * 0.03 + $tj_up_list['m_point'];
                            $save_up_money['m_point'] = $end_up_point;
                            $res = $tuiincome->getSave($tj_up_where, $save_up_money);
                            $point_log = array(
                                'pl_num'=>$point * 0.03,
                                'pl_time'=>time(),
                                'from_id'=>$recharge_id,
                                'pl_type'=>'add',
                                'pl_reason'=>'二级推荐人获得积分',
                                'pl_state'=>8,
                                'pl_mid'=>$tj_up_list['m_id'],
                            );
                            $tuiincome->get_pl_id($point_log);//积分记录表
                        }
                    }
                    if(!empty($member['m_tj_jy1'])){
                        $jy_where['m_id'] = $member['m_tj_jy1'];//顶级基因人id
                        $jy_list = $tuiincome->getInfo($jy_where,$field="m_point,ml_tui_id,m_id");//顶级基因人信息
                        if($jy_list['ml_tui_id'] == '1' || $jy_list['ml_tui_id'] == '2' || $jy_list['ml_tui_id'] == '3' || $jy_list['ml_tui_id'] == '4'){
                            $end_point = "";
                            $end_point = $point * 0.03 + $jy_list['m_point'];
                            $save_point['m_point'] = $end_point;
                            $res = $tuiincome->getSave($jy_where,$save_point);
                            $point_log = array(
                                'pl_num'=>$point * 0.03,
                                'pl_time'=>time(),
                                'from_id'=>$recharge_id,
                                'pl_type'=>'add',
                                'pl_reason'=>'顶级基因获得积分',
                                'pl_state'=>8,
                                'pl_mid'=>$jy_list['m_id'],
                            );
                            $tuiincome->get_pl_id($point_log);//积分记录表
                        }
                    }
                    if(!empty($member['m_tj_jy2'])){
                        $jy_two_where['m_id'] = $member['m_tj_jy2'];//二级基因人id
                        $jy_two_list = $tuiincome->getInfo($jy_two_where,$field="m_point,ml_tui_id,m_id");//二级基因人信息
                        if($jy_two_list['ml_tui_id'] == '1' || $jy_two_list['ml_tui_id'] == '2' || $jy_two_list['ml_tui_id'] == '3' || $jy_two_list['ml_tui_id'] == '4'){
                            $end_two_point = "";
                            $end_two_point = $point * 0.05 + $jy_two_list['m_point'];
                            $save_point['m_point'] = $end_two_point;
                            $res = $tuiincome->getSave($jy_two_where,$save_point);
                            $point_log = array(
                                'pl_num'=>$point * 0.05,
                                'pl_time'=>time(),
                                'from_id'=>$recharge_id,
                                'pl_type'=>'add',
                                'pl_reason'=>'二级基因获得积分',
                                'pl_state'=>8,
                                'pl_mid'=>$jy_two_list['m_id'],
                            );
                            $tuiincome->get_pl_id($point_log);//积分记录表
                        }
                    }
                    break;
            }
            // 提交事务
            Db::commit();
            $this->response_data('修改积分成功');
        } catch(\Exception $e) {
            Db::rollback();
        }
    }
}