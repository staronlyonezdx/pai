<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/30
 * Time: 16:35
 */

namespace app\api\controller;
use app\data\service\api\ApimemberService;
use app\data\service\api\ApiregisterService;
use app\data\service\api\ApiService;
use app\data\service\BaseService;
use app\data\service\sms\SmsService;
use think\Db;
/*
 * 张文斌
 * 2018-9-2
 */
class Tuiregister extends Tuiapiindex
{
    public function index(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApiregisterService = new ApiregisterService();
        $data = $this->data;//接收的所有数据
        $data['m_mobile'] = $ApiregisterService->encrypt($data['m_mobile']); //手机号加密存储****切记****
        $insert = array();
        $insert['m_mobile'] = $data['m_mobile'];
        $insert['m_pwd'] = md5($data['m_pwd']);
        $insert['add_time'] = time();
        $id = $ApiregisterService->insertId($insert);//用户id
        if($id){
            $m_id = $ApiregisterService->encrypt('abcde'.$id);
            $this->response_data(['m_id'=>$m_id,'msg'=>'注册成功','m_mobile'=>$data['m_mobile'],'ml_tui_id'=>0]);
        }else{
            $this->response_error('注册失败');
        }
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
            $newregister = new ApiregisterService();
            $res = $newregister->forget_m_pwd($data);
        }
        if($res['status'] == '0'){
            $this->response_error($res);
        }elseif($res['status'] == '1'){
            $this->response_data($res);
        }
    }

    //修改支付密码发送验证码
    public function send_code(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApimemberService = new ApiregisterService();
        $data = $this->data;
        $phone = $data['m_mobile'];//手机号码
        $is_phone = $ApimemberService->isphone($phone);
        if($is_phone){
            $this->response_error($is_phone);
        }
        $map = [
            'm_mobile'=> $phone
        ];
        $info = $ApimemberService->getMemberInfo($map); //检验是否已经注册
        if(!$info){
            $sms = new SmsService();
            $info = $sms->smsSingleSender($phone);
            if($info['status'] == '1'){
                $this->response_data($info);
            }elseif($info['status'] == '0'){
                $this->response_error($info);
            }
        }else{
            $this->response_error('此账号已注册过!');
        }
    }
    //修改登陆密码发送验证码
    public function send_code_login(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApimemberService = new ApiregisterService();
        $data = $this->data;
        $phone = $data['m_mobile'];//手机号码
        $is_phone = $ApimemberService->isphone($phone);
        if($is_phone){
            $this->response_error($is_phone);
        }
        $map = [
            'm_mobile'=> $phone
        ];
        $info = $ApimemberService->getMemberInfo($map); //检验是否已经注册
        if($info){
            $sms = new SmsService();
            $info = $sms->smsSingleSender($phone);
            if($info['status'] == '1'){
                $this->response_data($info);
            }elseif($info['status'] == '0'){
                $this->response_error($info);
            }
        }else{
            $this->response_error('请前去注册!');
        }
    }
    //绑定银行卡发送验证码
    public function send_bank_code(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApimemberService = new ApiregisterService();
        $data = $this->data;
        $phone = $data['m_mobile'];//手机号码
        $is_phone = $ApimemberService->isphone($phone);
        if($is_phone){
            $this->response_error($is_phone);
        }
        $map = [
            'm_mobile'=> $phone
        ];
        $sms = new SmsService();
        $info = $sms->smsSingleSender($phone);
        if($info['status'] == '1'){
            $this->response_data($info);
        }elseif($info['status'] == '0'){
            $this->response_error($info);
        }
    }
    //验证注册会员身份
    public function checklevel(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $ApiregisterService = new ApiregisterService();
        $data = $this->data;//接收的所有数据
        $mobile = $data['m_mobile'];
        $is_phone = $ApiregisterService->isphone($mobile);
        if($is_phone){
            $this->response_error($is_phone);
        }
        $map = [
            'm_mobile'=> $mobile
        ];
        $mobile_list = $ApiregisterService->getMemberInfo($map);
        if(empty($mobile_list)){
            $this->response_error($mobile_list);//返回推荐人的身份
        }else{
            $this->response_data($mobile_list);//返回推荐人的身份
        }
    }
    //扫描二维码过来推荐人详情页
    public function get_tuilist(){
        $ApiregisterService = new ApiregisterService();
        $data = $this->data;//接收的所有数据
        if(!empty($data['tj_mid'])){
            $tuiwhere['m_id'] = $data['tj_mid'];
            $tuilist = $ApiregisterService->getInfo($tuiwhere,$field="m_avatar,m_name");
            $this->response_data($tuilist);
        }
    }
    //接收账号密码获取token
    public function get_token(){
        $post_data=$this->data;
        if(empty($post_data['at_name']))
        {
            $this->response_error("接口账号不能为空");
        }
        if(empty($post_data['at_pwd']))
        {
            $this->response_error("接口密码不能为空");
        }
        $api = new ApiService();
        $at_pwd=md5($post_data['at_pwd']);
        $where="at_name='".$post_data['at_name']."' and at_pwd='".$at_pwd."'";
        $at_data=$api->apitokenInfo($where);
        if(empty($at_data)){
            $this->response_error("接口账号密码不正确");
        }
        $where_r="at_id=".$at_data['at_id'];
        $atrecord_data=$api->apitokenrequestrecordInfo($where_r);
        if(!empty($atrecord_data)){
            if($atrecord_data['atrr_request_time']+$at_data['at_interval_time']*60>time()) {
                //  $this->response_error("请求过于频繁，请稍后请求");
            }
            $where_u="at_id=".$at_data['at_id'];
            $data_u=array();
            $data_u['atrr_request_time']=time();
            //  $res=$api->apitokenrecordSave($where_u,$data_u);
        }
        else{
            $data_a=array();
            $data_a['at_id']=$at_data['at_id'];
            $data_a['atrr_request_time']=time();
            //  $res=$api->apitokenrecordAdd($data_a);
        }

        $data_return=array();
        $data_return['at_id']=$at_data['at_id'];
        $data_return['token']=$at_data['at_token'];
        $this->response_data($data_return);
        die;
    }
    //加密token
    public function encryption_token(){
        $data = $this->data;//接收的所有数据
        $token = $data['sytoken'];//接收token
        $new_token = md5($token);//加密token
        $suijinumber = rand(100000,999999);//随机数
        $randonnum = md5($suijinumber);//加密随机数
        $timespan = time();//时间戳
        $end_token = $new_token . $randonnum . $timespan;
        $where = array(
            'ntoken'=>$end_token,
            'token'=>$token,
            'randonnum'=>$suijinumber,
            'timespan'=>$timespan,
        );
        $this->response_data($where);
    }

    /**
     * 加密手机号/m_id
     * 邓赛赛
     */
    public function en_code(){
        $p_code = input('post.p_code');
        $m_code = input('post.m_code');
        $base = new BaseService();
        //加密手机号码
        if($p_code){
            $phone = $base->encrypt($p_code);
        }
        //加密m_id
        if($m_code){
            $m_id = $base->encrypt('abcde'.$m_code);
        }
        $data = [
            'p_code' =>empty($phone) ? '' : $phone,
            'm_code'   =>empty($m_id)  ? '' : $m_id,
        ];
        return json_encode($data);
    }

    /**
     * 解密手机号/m_id
     * 邓赛赛
     */
    public function de_code(){
        $p_code = input('post.p_code');
        $m_code = input('post.m_code');
        $base = new BaseService();
        //加密手机号码
        if($p_code){
            $phone = $base->decrypt($p_code);
        }
        //加密m_id
        if($m_code){
            $data = $base->decrypt($m_code);
            $m_id = str_replace('abcde','',$data);//删除多余字符(加盐字符串)
        }
        $data = [
            'p_code' =>empty($phone) ? '' : $phone,
            'm_code'   =>empty($m_id)  ? '' : $m_id,
        ];
        return json_encode($data);
    }

    //是否是会员
    public function ismember(){
        $data = input('param.');
        $m_mobile = $data['m_mobile'];
        $m_id = $data['m_id'];
        $where['m_id'] = $m_id;
        $where['m_mobile'] = $m_mobile;
        $ApiregisterService = new ApiregisterService();
        $ishave = $ApiregisterService->getInfo($where,$field="m_id,m_money,m_name,m_state");
        if(!empty($ishave)){
            $this->response_data($ishave);
        }else{
            $this->response_error('用户不存在');
        }
    }
    //判断是否注册
    public function iszhuce(){
        $data = input('param.');
        $m_mobile = $data['m_mobile'];
        $where['m_mobile'] = $m_mobile;
        $ApiregisterService = new ApiregisterService();
        $ishave = $ApiregisterService->getInfo($where,$field="m_id,m_money,m_name,m_state");
        if(!empty($ishave)){
            $this->response_data($ishave);
        }
    }
    //插入到会员表
    public function insert_member(){
        $data = input('param.');
        $m_mobile = $data['m_mobile'];
        $where['m_mobile'] = $m_mobile;
        $where['m_pwd'] = $data['m_pwd'];
        $ApiregisterService = new ApiregisterService();
        $member_id = $ApiregisterService->insertId($where);
        if(!empty($member_id)){
            $this->response_data($member_id);
        }
    }
    //查找会员信息
    public function member_list(){
        $data = input('param.');
        $m_mobile = $data['m_mobile'];//已加密
        $where['m_mobile'] = $m_mobile;
        $where['m_pwd'] = $data['m_pwd'];
        $ApiregisterService = new ApiregisterService();
        $member_list = $ApiregisterService->getInfo($where,$field="m_id");
        if(!empty($member_list)){
            $this->response_data($member_list);
        }
    }
    //查找会员信息
    public function member_content_ty(){
        $data = input('param.');
        $m_mobile = $data['m_mobile'];//已加密
        $where['m_mobile'] = $m_mobile;
        $where['m_pwd'] = $data['m_pwd'];
        $ApiregisterService = new ApiregisterService();
        $member_list = $ApiregisterService->getInfo($where,$field="*");
        if(!empty($member_list)){
            $this->response_data($member_list);
        }
    }
    //查找member_content信息
    public function member_content(){
        $data = input('param.');
        $m_id = $data['m_id'];
        $where['m_id'] = $m_id;
        $ApiregisterService = new ApiregisterService();
        $member_list = $ApiregisterService->getInfo($where,$field="*");
        if(!empty($member_list)){
            $this->response_data($member_list);
        }
    }
    //查找我直推的人
    public function get_all_childcount_wu(){
        $data = input('param.');$arr = array();
        $m_id = $data['m_id'];
        $count1 = Db('member')->where('tj_mid',$m_id)->count();//查询所有直推的数量
        $count2 = Db('member')->where('m_tj_jy1',$m_id)->count();//查询所有直推的数量
        $count3 = Db('member')->where('m_tj_jy2',$m_id)->count();//查询所有直推的数量
        $arr['zt_num']=$count1;
        $arr['jy1_num']=$count2;
        $arr['jy2_num']=$count3;
        if(!empty($arr)){
            $this->response_data($arr);
        }else{
            $this->response_error('无邀请人');
        }
    }

    //查找会员信息
    public function member_all_list(){
        $data = input('param.');
        $m_id = $data['m_id'];
        $where['m_id'] = $m_id;
        $ApiregisterService = new ApiregisterService();
        $member_list = $ApiregisterService->getInfo($where,$field="*");
        if(!empty($member_list)){
            $this->response_data($member_list);
        }else{
            return 0;
        }
    }
    //修改会员登陆密码
    public function change_member(){
        $data = input('param.');
        $m_id = $data['m_id'];
        $where['m_id'] = $m_id;
        $ApiregisterService = new ApiregisterService();
        $member_save = $ApiregisterService->getSave($where,array('m_pwd'=>$data['m_pwd']));
        if($member_save){
            return 1;//修改成功返回
        }else{
            return 0;//修改失败返回
        }
    }
    //修改会员推荐人
    public function change_member_tui(){
        $data = input('param.');
        $m_id = $data['m_id'];
        $where['m_id'] = $m_id;
        $ApiregisterService = new ApiregisterService();
        $member_save = $ApiregisterService->getSave($where,array('tj_mid'=>$data['tj_mid'],'edit_time'=>time()));
        if($member_save){
            return 1;//修改成功返回
        }else{
            return 0;//修改失败返回
        }
    }
    //修改会员支付密码
    public function change_member_paypwd(){
        $data = input('param.');
        $m_id = $data['m_id'];
        $where['m_id'] = $m_id;
        $ApiregisterService = new ApiregisterService();
//        return $data['m_pwd'];
        $member_save = $ApiregisterService->getSave($where,array('m_pwd'=>$data['m_payment_pwd']));
        if($member_save){
            return 1;//修改成功返回
        }else{
            return 0;//修改失败返回
        }
    }
    //查找会员的直推人跟分类人数
    public function get_all_childcount_level_wu(){
        $data = input('param.');
        $m_id = $data['m_id'];
        $where['m_id'] = $m_id;
        $ApiregisterService = new ApiregisterService();
        $count1 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','1')->count();//查询所有创推人数量
        $count2 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','2')->count();//查询所有品推人数量
        $count3 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','3')->count();//查询所有VIP粉丝数量
        $count4 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','4')->count();//查询所有VIP粉丝数量
        $count5 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','0')->count();//查询所有VIP粉丝数量
        $arr['ct_num']=$count1;
        $arr['pt_num']=$count2;
        $arr['vfs_num']=$count3;
        $arr['fs_num']=$count4;
        $arr['p_num']=$count5;
        $this->response_data($arr);//返回所有下级被推荐人信息
    }
    //获取直推人
    public function gettuinum_list(){
        $arr = array();
        $data = input('param.');
        $curpage = !empty($data['curpage']) ? $data['curpage'] : 1;
        $pagenum = !empty($data['pagenum']) ? $data['pagenum'] : 10;
        $ml_tui_id = !empty($data['ml_tui_id']) ? $data['ml_tui_id'] : 0;
        $fields = "*";
        $order = "add_time desc";
        $tj_mid = !empty($data['tj_mid']) ? $data['tj_mid'] : "";
        $where = " tj_mid = ". $tj_mid;
//        print_r($where);die();
        $ApiregisterService = new ApiregisterService();
        $table="pai_member";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        if($ml_tui_id == '0'){
            $where_ml = "";
        }else{
            if($ml_tui_id == '5'){//查找普通会员
                $ml_tui_id = '0';
            }
            $where_ml = " and ml_tui_id = " . $ml_tui_id;
        }
        $cn=($curpage-1)*$pagenum;

        $sql="SELECT".$fields." from ".$table." WHERE ".$where.$where_ml . " ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
//       var_dump($sql);die;
        $list=Db::table($table)->query($sql);
//        dump($list);
        if(!empty($list)){
            $this->response_data($list);
        }else{
            $this->response_error('查不到数据');
        }
    }
    //读取我直接推荐的人的数量
    public function getzhitui_count(){
        $data = input('param.');
        $where = $data['where_zhitui'];
        $ml_tui_id = $data['ml_tui_id'];
        $table="pai_member";
        if($ml_tui_id == '0'){
            $where_ml = "";
        }else{
            if($ml_tui_id == '5'){//查找普通会员
                $ml_tui_id = '0';
            }
            $where_ml = " and ml_tui_id = " . $ml_tui_id;
        }
        $sql="SELECT count(*) allnum from ".$table." WHERE ".$where.$where_ml;
        $list=Db::table($table)->query($sql);
        $n=0;
        if(!empty($list[0]['allnum'])){
            $n=$list[0]['allnum'];
        }
        return $n;
    }
    //根据手机号查找会员信息
    public function member_res(){
        $data = input('param.');
        $m_mobile = $data['m_mobile'];//已加密
        $tmp = new ApimemberService();
        $where['m_mobile'] = $m_mobile;
        $ApiregisterService = new ApiregisterService();
        $member_list = $ApiregisterService->getInfo($where,$field="m_mobile,m_id");
//        print_r($where);die();
        if(!empty($member_list)){
            $this->response_data($member_list);
        }else{
            $this->response_error('未查到此用户');
        }
    }
    //根据手机号修改会员信息
    public function member_change(){
        $data = input('param.');
        $m_mobile = $data['m_mobile'];
        $where['m_mobile'] = $m_mobile;
        $ApiregisterService = new ApiregisterService();
        $member_list = $ApiregisterService->getSave($where,array('m_pwd'=>$data['m_pwd']));
        if(!empty($member_list)){
            $this->response_data($member_list);
        }
    }
    //获取直推人数
    public function gettuinum(){
        $arr = array();
        $data = input('param.');
        $ApiregisterService = new ApiregisterService();
        $where['tj_mid'] = $data['m_id'];
        $where2['m_tj_jy1'] = $data['m_id'];
        $where3['m_tj_jy2'] = $data['m_id'];
        $tj_mid_num = Db('member')->where($where)->count();
        $jy1_num = Db('member')->where($where2)->count();
        $jy2_num = Db('member')->where($where3)->count();
        $arr['tj_mid_num'] = $tj_mid_num;
        $arr['jy1_num'] = $jy1_num;
        $arr['jy2_num'] = $jy2_num;
        $this->response_data($arr);
    }
    /**
     * 注册时判断推荐人是否空并插入
     * 邓赛赛
     */
    public function add_member(){
        $ApiregisterService = new ApiregisterService();
        $data = input('post.');
        $tj_mid = empty($data['tj_mid']) ? '' :$data['tj_mid'];
        $tj_arr = ['m_id'=>$tj_mid];
        $tj_list = $ApiregisterService->getInfo($tj_arr);//上级信息
        if(!empty($tj_list['m_mobile'])){
            $member_new['tj_mid'] = $tj_list['m_id'];
            $member_new['m_tj_mid2'] = $tj_list['tj_mid'];//推荐上上级用户id新
            $level_path = "";//家族id
            if(!empty($tj_list['level_path'])){
                $level_path = trim($tj_list['level_path'].'-'.$tj_list['m_id'],'-');
            }
            switch($tj_list['ml_tui_id']){
                case 1://推荐人是创推人
                    if(!empty($tj_list['tj_mid'])){
                        $tj_up_arr = ['m_id'=>$tj_list['tj_mid']];
                        $tj_up_list = $ApiregisterService->getInfo($tj_up_arr);//上上级信息
                    }
                    break;
                case 2://推荐人是品推人
                    if(!empty($tj_list['tj_mid'])){
                        $tj_up_arr = ['m_id'=>$tj_list['tj_mid']];
                        $tj_up_list = $ApiregisterService->getInfo($tj_up_arr);//上上级信息
                    }
                    break;
                case 3://推荐人是vip会员
                    if(!empty($tj_list['tj_mid'])){
                        $m_tj_jy2 = $ApiregisterService->digui_mid($tj_list['m_id']);//递归查找上级是创推人/品推人
                        $member_new['m_tj_jy2'] = $m_tj_jy2;//推荐人二级基因mid
                        $m_tj2_mid = ['m_id'=>$m_tj_jy2];//推荐人id
                        $m_tj2_list = $ApiregisterService->getInfo($m_tj2_mid);//上级信息
                        if(!empty($m_tj2_list['ml_tui_id'])){
                            $member_new['m_tj_jy1'] = $m_tj2_list['tj_mid'];//推荐人顶级基因mid
                        }
                    }
                    break;
                case 4://推荐人是普通会员
                    if(!empty($tj_list['tj_mid'])){
                        $m_tj_jy2 = $ApiregisterService->digui_mid($tj_list['m_id']);//递归查找上级是创推人/品推人
                        $member_new['m_tj_jy2'] = $m_tj_jy2;//推荐人二级基因mid
                        $m_tj2_mid = ['m_id'=>$m_tj_jy2];//推荐人id
                        $m_tj2_list = $ApiregisterService->getInfo($m_tj2_mid);//上级信息
                        if(!empty($m_tj2_list['ml_tui_id'])){
                            $member_new['m_tj_jy1'] = $m_tj2_list['tj_mid'];//推荐人顶级基因mid
                        }
                    }
                    break;
            }
        }

        if(!empty($tj_list['tj_mid'])){
            $member_new['m_tj_mid2'] =$tj_list['tj_mid'];//上上级id
        }
        $member_new['m_name'] = 'm'.substr( $data['phone'],5);
        $member_new['m_mobile'] = $ApiregisterService->encrypt($data['phone']);
        $member_new['m_pwd']    = md5($data['m_pwd']);
        $member_new['m_from']   = 3;
        $id = Db::table('pai_member')->insertGetId($member_new);
        if($id){
            return $this->response_data($id);
        }else{
            return $this->response_error('添加用户失败');
        }

    }

}