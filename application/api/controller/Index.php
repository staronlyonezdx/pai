<?php
namespace app\api\controller;

use app\data\service\activity\ActivityService;
use app\data\service\api\ApimemberService;
use app\data\service\article\ArticleService;
use app\data\service\articleType\ArticleTypeService;
use app\data\service\goods\GoodsService;
use app\data\service\goodsCategory\GoodsCategoryService;
use app\data\service\PhpServerSdk\PhpsdkService;
use app\data\service\PhpServerSdk\TimRestApi;
use app\data\service\PhpServerSdk\TLSSig;
use app\data\service\PhpServerSdk\TLSSigAPI;
use app\data\service\search\SearchService;
use app\data\service\store\StoreService;
use RedisCache\RedisCache;
use think\Controller;
use think\Db;
use think\image\Exception;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\sms\SmsService as SmsService;
use app\data\service\BaseService as BaseService;

class Index extends ApiIndex
{
    //添加
    public function gettoken() {
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
    //接口生成usersig
    public function get_usersig(){
        $return = new TLSSig();
        $data = $this->data;
        $identifier = $data['identifier'];
        $a = $return->genSig($identifier,3650*24*3600);
        print_r($a);die();
    }
    public function check(){
        $phpsdkService = new PhpsdkService();
        $list = $phpsdkService->post_get_usersig('1543823807_992');
        print_r($list);die();
    }
    //传参生成usersig
    public function post_get_usersig($identifier){
        $return = new TLSSig();
        $usersig = $return->genSig($identifier,3650*24*3600);
        return $usersig;
    }
    //导入特殊账号到云通讯
    public function account_import(){
        $data = $this->data;
        $identifier = !empty($data['identifier']) ? $data['identifier'] : "";//成员名称
        $nick_name = !empty($data['nick_name']) ? $data['nick_name'] : "";//昵称
        $face_url = !empty($data['face_url']) ? $data['face_url'] : "";//头像链接
        $sex = !empty($data['sex']) ? $data['sex'] : "";//性别
        if($sex == 1){
            $sex = "Gender_Type_Female";
        }elseif($sex == 2){
            $sex = "Gender_Type_Male";
        }else{
            $sex = "Gender_Type_Unknown";
        }
        $level = !empty($data['level']) ? $data['level'] : "";//等级
        $usertype = !empty($data['usertype']) ? $data['usertype'] : "";//用户类型 Customer客服，SystemNotice系统消息，TicketNotice订单消息，WalletNotice钱包消息
        $return = new TimRestApi();
        $data_arr = array(
            'sex'=>$sex,
            'level'=>intval($level),
            'usertype'=>$usertype,
            'nick_name'=>$nick_name,
            'm_avatar'=>$face_url,
        );
        $data = $return->account_import($identifier, $nick_name, $face_url);//导入用户
        if($data){
            $result = $this->testSetUserInfo($identifier,$data_arr);//设置用户资料
            $return_data['msg'] = "导入成员成功";
            $this->response_data($return_data);
        }else{
            $this->response_error('导入失败');
        }
    }
    //获取成员信息
    public function portrait_get()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $return = new TimRestApi();
        $data = $this->data;
        $identifier = !empty($data['identifier']) ? $data['identifier'] : "";//成员名称
        $data = $return->profile_portrait_get($identifier);
//        $this->response_data($data['UserProfileItem'][0]['ProfileItem'][0]);
        print_r($data['UserProfileItem'][0]['ProfileItem'][3]['Value']);die('66');
    }
    //用户注册导入资料到云通讯
    public function account_import_yun($m_id){
        if(empty($m_id)){
            $this->response_error('用户id不能为空');
        }
        $member_list = Db('member')->where('m_id',$m_id)->field('m_id,m_name,m_avatar,m_sex,m_levelid')->find();
        $identifier = time()."_".$member_list['m_id'];//账号名称
        $nick_name = !empty($member_list['m_name']) ? $member_list['m_name'] : "";//昵称
        $face_url = !empty($member_list['m_avatar']) ? $member_list['m_avatar'] : "";//头像链接
        $sex = !empty($member_list['sex']) ? $member_list['sex'] : "";//性别
        $level = !empty($member_list['m_levelid']) ? $member_list['m_levelid'] : "";//等级
        if($sex == 1){
            $sex = "Gender_Type_Female";
        }elseif($sex == 2){
            $sex = "Gender_Type_Male";
        }else{
            $sex = "Gender_Type_Unknown";
        }
        $return = new TimRestApi();
        $data_arr = array(
            'nick_name'=>$nick_name,
            'sex'=>$sex,
            'level'=>$level,
            'm_avatar'=>$face_url,
        );
        $data = $return->account_import($identifier, $nick_name, $face_url);//导入用户
        $usersig = $this->post_get_usersig($identifier);
        $data_update = array(
            'identifier'=>$identifier,
            'usersig'=>$usersig,
        );
        $res = Db('member')->where('m_id',$m_id)->update($data_update);
        if($data){
            $result = $this->testSetUserInfo($identifier,$data_arr);//设置用户资料
            if($result['ActionStatus'] == "OK"){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
    //修改云账号资料
    public function testSetUserInfo($account_id, $arr)
    {
        #构造高级接口所需参数
        $profile_list = array();
        //设置昵称
        $profile_nick = array(
            "Tag" => "Tag_Profile_IM_Nick",
            "Value" => !empty($arr['nick_name']) ? $arr['nick_name'] : ""
        );
        //设置等级
        $profile_level = array(
            "Tag" => "Tag_Profile_IM_Level",
            "Value" => !empty($arr['level']) ? $arr['level'] : ""
        );
        //设置性别
        $profile_sex = array(
            "Tag" => "Tag_Profile_IM_Gender",
            "Value" => !empty($arr['sex']) ? $arr['sex'] : ""
        );
        //设置账号类型usertype
        $profile_usertype = array(
            "Tag" => "Tag_Profile_Custom_UserType",
            "Value" => !empty($arr['usertype']) ? $arr['usertype'] : ""
        );
        //设置头像
        $profile_avatar = array(
            "Tag" => "Tag_Profile_IM_Image",
            "Value" => !empty($arr['m_avatar']) ? $arr['m_avatar'] : ""
        );
        //加好友验证方式
        $profile_allow = array(
            "Tag" => "Tag_Profile_IM_AllowType",
            "Value" => "NeedPermission"
        );
        array_push($profile_list, $profile_nick);
        array_push($profile_list, $profile_level);
        array_push($profile_list, $profile_sex);
        array_push($profile_list, $profile_usertype);
        array_push($profile_list, $profile_avatar);
        $return = new TimRestApi();
        $ret = $return->profile_portrait_set2($account_id, $profile_list);
        return $ret;
    }
    //批量导入帐号到云通讯
    public function new_multiaccount_import(){
        $count = Db('member')->where('m_id','neq',0)->where('identifier',null)->where('is_jq',2)->count();//总条数
        $number = floor($count / 500) + 1;//执行次数
        $return = new TimRestApi();
        for($a=1;$a<=$number;$a++){
            $all_number = $a * 500;//取的最后一个条数
            $list = Db('member')->where('m_id','neq',0)->where('identifier',null)->where('is_jq',2)->field('m_id,identifier,usersig,m_avatar,m_sex,m_name')->order('m_id desc')->limit(($a-1)*500,$all_number)->select();
            if(!empty($list)){
                Db::startTrans();
                try{
                    foreach($list as $l){
                        $res = $return->account_import($l['identifier'], $l['m_name'], $l['m_avatar']);
                    }
                    // 提交事务
                    Db::commit();
                    echo "导入成功";
                }catch (\Exception $e){
                    Db::rollback();
                    echo "导入失败";
                }
            }
        }
    }
    //更新已有的会员账号及账号类型到pai_member
    public function change_identifier(){
        $count = Db('member')->where('m_id','neq',0)->where('identifier',null)->where('is_jq',2)->count();//总条数
        $number = floor($count / 500) + 1;//执行次数
        for($a=1;$a<=$number;$a++){
            $all_number = $a * 500;//取的最后一个条数
            $list = Db('member')->where('m_id','neq',0)->where('identifier',null)->where('is_jq',2)->field('m_id')->order('m_id desc')->limit(($a-1)*500,$all_number)->select();
            if(!empty($list)){
                Db::startTrans();
                try{
                    foreach($list as $l){
                        $identifier = time()."_".$l['m_id'];
                        $usersig = $this->post_get_usersig($identifier);
                        $data = array(
                            'identifier'=>$identifier,
                            'usersig'=>$usersig,
                        );
                        $res = Db('member')->where('m_id',$l['m_id'])->update($data);
                    }
                    // 提交事务
                    Db::commit();
                    echo "成功";
                }catch (\Exception $e){
                    Db::rollback();
                    echo "失败";
                }
            }

        }
    }
    //设置成员信息
    public function portrait_set()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $identifier = $data['identifier'];
        $data_arr = array(
            'nick_name'=>!empty($data['nick_name']) ? $data['nick_name'] : "",
            'sex'=>!empty($data['sex']) ? $data['sex'] : "",
            'level'=>!empty($data['level']) ? $data['level'] : "",
            'usersig'=>!empty($data['usersig']) ? $data['usersig'] : "",
        );
        $account_id = $identifier;
        $data = $this->testSetUserInfo($account_id,$data_arr);
        print_r($data);die('66');
    }
    //批量更新已有的会员账号及账号类型pai_member表
    public function change_iden(){
        $start_time = time();
        $list = Db('member')->where('identifier',null)->whereOr('usersig',null)->field('m_id')->order('m_id asc')->select();
        $ids = '';
        $sql = ' UPDATE pai_member SET identifier = CASE m_id ';
        $new_sql = "," .' usersig = CASE m_id ';
        $usersig = "";
        foreach ($list as $key => $value) {
            $new_identifier = time()."_".$value['m_id'];
            $sql .= sprintf("WHEN %d THEN '$new_identifier' " , $value['m_id']);
            $usersig = $this->post_get_usersig($new_identifier);
            $new_sql .= sprintf("WHEN %d THEN '$usersig' " , $value['m_id']);
            $ids .= $value['m_id'].',';
        }
        $ids = rtrim($ids,',');
        $sql .= " END". $new_sql." end WHERE m_id IN ($ids)";
//        print_r($sql);die();
        $res = Db::execute($sql);//批量更新数据
        $return_array = array();
        if($res){
            $end_time = time();
            $return_array['msg'] = "修改成功";
            $return_array['end_time'] = $end_time - $start_time;
            $this->response_data($return_array);
        }else{
            $return_array['msg'] = "修改失败";
            $this->response_data($return_array);
        }
    }
    //单发
    public function send_dan(){
        $return = new TimRestApi();
        $data = $this->data;
        $account_id = !empty($data['account_id']) ? $data['account_id'] : "";//发送者
        $receiver = !empty($data['receiver']) ? $data['receiver'] : "";//接收者
        $share_title = !empty($data['share_title']) ? $data['share_title'] : "";//标题
        $share_content = !empty($data['share_content']) ? $data['share_content'] : "";//简介
        $share_url = !empty($data['share_url']) ? $data['share_url'] : "";//跳转链接
        $share_image = PAIYAYA_URL."/uploads/m_avatar/20181106/1541482960259745960.jpg";//图片
        $share_id = !empty($data['share_id']) ? $data['share_id'] : "";//订单id
        $share_detail_content = !empty($data['share_detail_content']) ? $data['share_detail_content'] : "";;
        $im_message_type = 2;//1跳链接 2内容展示
        $content = array();
        $content['share_title'] = $share_title;
        $content['share_content'] = $share_content;
        $content['share_url'] = $share_url;
        $content['share_image'] = $share_image;
        $content['share_id'] = $share_id;
        $content['share_detail_content'] = $share_detail_content;
        $content['im_message_type'] = $im_message_type;
        $content = json_encode($content,JSON_UNESCAPED_SLASHES);
        $result = $return->openim_send_msg($account_id, $receiver, $content);
//        print_r($result);die();
        if($result['ActionStatus'] == "OK"){//发送成功返回
            $this->response_data('发送成功');
        }else{
            $this->response_error('发送失败');//发送失败返回
        }
    }
    //群发
    public function send_dans(){
        $return = new TimRestApi();
        $account_id="SystemNotice";
//        $receiver="13164872368_992";
//        $receiver = array('shenran','13164872368_992');//数组格式
        $receiver = array ( 0 => 'shenran',1 =>'13164872368_992');
        $share_title = '标题1111';//标题
        $share_content = '666';//简介
        $share_url = "www.baidu.com";//跳转链接
        $share_image = PAIYAYA_URL."/uploads/m_avatar/20181106/1541482960259745960.jpg";//图片
        $share_id = 1;//订单id
        $share_detail_content = "详细内容";
        $im_message_type = 1;//1跳链接 2内容展示
        $content = array();
        $content['share_title'] = $share_title;
        $content['share_content'] = $share_content;
        $content['share_url'] = $share_url;
        $content['share_image'] = $share_image;
        $content['share_id'] = $share_id;
        $content['share_detail_content'] = $share_detail_content;
        $content['im_message_type'] = $im_message_type;
        $content = json_encode($content,JSON_UNESCAPED_SLASHES);
        $result = $return->openim_batch_sendmsg($receiver, $content);
//        print_r($result);die();
        if($result['ActionStatus'] == "OK"){//发送成功返回
            $this->response_data('发送成功');
        }else{
            $this->response_error('发送失败');//发送失败返回
        }
    }
    //系统消息发送
    public function order_message($sm_id,$status){
        $return = new TimRestApi();
        if($status == 1){
            $account_id="SystemNotice";//1系统消息
        }elseif($status == 2){
            $account_id="TicketNotice";//2为订单消息
        }elseif($status == 3){
            $account_id="WalletNotice";//3为钱包消息
        }
        $sm_list = Db('system_msg')->where('sm_id',$sm_id)->field('sm_title,sm_brief,sm_content,sm_display,sm_img,o_id,to_mid,shop_price,g_id')->find();//消息内容
        $o_id = !empty($sm_list['o_id']) ? $sm_list['o_id'] : "";//订单id
        $g_id = !empty($sm_list['g_id']) ? $sm_list['g_id'] : 0;//商品id
        if($sm_list['sm_display'] == 0){
            $share_url = PAIYAYA_URL."member/systemmsg/get_content?sm_id=".$sm_id;//跳转链接 0文字通知
        }elseif($sm_list['sm_display'] == 1){
            $share_url = PAIYAYA_URL."/member/goods/index";//跳转链接  1商家审核
        }elseif($sm_list['sm_display'] == 2){
            $share_url = PAIYAYA_URL."/member/orderpai/index?o_id=".$o_id;//跳转到订单详情链接 2中拍消息
        }elseif($sm_list['sm_display'] == 3){
            $share_url = PAIYAYA_URL."/member/goodsproduct/index?g_id=".$g_id;//跳转链接  3通过发布商品
        }
        $receiver = Db('member')->where('m_id',$sm_list['to_mid'])->value('identifier');//接收者账号
        $share_title = !empty($sm_list['sm_title']) ? $sm_list['sm_title'] : "";//标题
        $share_content = !empty($sm_list['sm_brief']) ? $sm_list['sm_brief'] : "";//简介
        $share_detail_content = !empty($sm_list['sm_content']) ? $sm_list['sm_content'] : "";//内容
        $price = !empty($sm_list['ticket_price_desc']) ? $sm_list['ticket_price_desc'] : "";
        if(!empty($price)){
            $ticket_price_desc = "参团价:".$price;//订单价格描述
        }else{
            $ticket_price_desc = "";
        }
        $share_id = !empty($sm_list['o_id']) ? $sm_list['o_id'] : 0;//订单id
        if($sm_list['sm_display'] == 0){
            $im_message_type = 2;//1跳链接 2内容展示
        }elseif($sm_list['sm_display'] == 1){
            $im_message_type = 1;//1跳链接 2内容展示
        }elseif($sm_list['sm_display'] == 2){
            $im_message_type = 1;//1跳链接 2内容展示
        }elseif($sm_list['sm_display'] == 3){
            $im_message_type = 1;//1跳链接 2内容展示
        }
        $image = !empty($sm_list['sm_img']) ? $sm_list['sm_img'] : "";
        if(!empty($image)){
            $share_image = PAIYAYA_URL.$image;//图片
        }else{
            $share_image = "";//图片
        }
        $content = array();
        $content['share_title'] = $share_title;
        $content['share_content'] = $share_content;
        $content['share_url'] = $share_url;
        $content['share_image'] = $share_image;
        $content['share_id'] = $share_id;
        $content['share_detail_content'] = $share_detail_content;
        $content['im_message_type'] = $im_message_type;
        $content['ticket_price_desc'] = $ticket_price_desc;
        $content = json_encode($content,JSON_UNESCAPED_SLASHES);
        $result = $return->openim_send_msg($account_id, $receiver, $content);
        if($result['ActionStatus'] == "OK"){
            return 1;//发送成功返回
        }else{
            return 0;//发送失败返回
        }
    }
    //获取用户IP
    public function getIP(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        static $realip;
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $realip = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $realip = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $realip = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $realip = getenv("HTTP_CLIENT_IP");
            } else {
                $realip = getenv("REMOTE_ADDR");
            }
        }

        return $realip;
    }
    //用户注册
    public function member_add()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['m_mobile']))
        {
            $this->response_error("注册手机号码不能为空");
        }
        $m_mobile=$this->data['m_mobile'];
        if(empty($this->data['m_pwd']))
        {
            $this->response_error("注册密码不能为空");
        }
        $m_pwd=$this->data['m_pwd'];
        if(empty($this->data['re_pwd']))
        {
            $this->response_error("确认密码不能为空");
        }
        $re_pwd=$this->data['re_pwd'];
        if(empty($this->data['verification']))
        {
            $this->response_error(" 验证码不能为空");
        }
        $verification=$this->data['verification'];
        if(!empty($this->data['tj_mobile']))
        {
          $data['tj_mobile']= $this->data['tj_mobile'];
        }
        if(!empty($this->data['ip']))
        {
            $data['ip']= $this->data['ip'];
        }
        $uuid = $this->data['uuid'];//机器码
        if(empty($uuid)){
            $this->response_error('机器码不能为空');
        }
        $memberservice=new MemberService();

        $data['m_mobile']=$m_mobile;
        $data['m_pwd']=$m_pwd;
        $data['re_pwd']=$re_pwd;
        $data['verification']=$verification;
        $data['uuid'] = $uuid;
        $result=$memberservice->new_addUserAP($data);
        if($result['status']=='1'){
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_data($rdata);
        }
        else{
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_error($rdata);
        }
    }
    //ios审核期间
    public function audit_period(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $return_data = array(
            'status'=>0,
            'code'=>135790,
        );
        $this->response_data($return_data);
    }
    //新用户注册
    public function new_member_add()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['m_mobile']))
        {
            $this->response_error("注册手机号码不能为空");
        }
        $m_mobile=$this->data['m_mobile'];
        if(empty($this->data['m_pwd']))
        {
            $this->response_error("注册密码不能为空");
        }
        $m_pwd=$this->data['m_pwd'];
        if(empty($this->data['re_pwd']))
        {
            $this->response_error("确认密码不能为空");
        }
        $re_pwd=$this->data['re_pwd'];
        if(empty($this->data['verification']))
        {
            $this->response_error(" 验证码不能为空");
        }
        $verification=$this->data['verification'];
        if(!empty($this->data['tj_mobile']))
        {
            $data['tj_mobile']= $this->data['tj_mobile'];
        }
        if(!empty($this->data['ip']))
        {
            $data['ip']= $this->data['ip'];
        }
        $uuid = $this->data['uuid'];//机器码
        if(empty($uuid)){
            $this->response_error('机器码不能为空');
        }
        $memberservice=new MemberService();

        $data['m_mobile']=$m_mobile;
        $data['m_pwd']=$m_pwd;
        $data['re_pwd']=$re_pwd;
        $data['verification']=$verification;
        $data['uuid'] = $uuid;
        $result=$memberservice->new_addUserAP($data);
        if($result['status']=='1'){
            //导入云通讯开始
            $m_id = Db('member')->where('uuid',$data['uuid'])->value('m_id');
            $account_yun = $this->account_import_yun($m_id);//导入云通讯
            if($account_yun != 1){
                $arr=array();
                $arr['msg'] = '注册失败';
                $this->response_error($arr);
            }
            //导入云通讯结束
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_data($rdata);
        }
        else{
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_error($rdata);
        }
    }
    public function checkfile(){

        $image = $_FILES["file"]["tmp_name"];
        $data['img']=$image;
        $this->response_data($data);

        $fp = fopen($image, "r");

        $file = fread($fp, $_FILES["file"]["size"]); //二进制数据流

        //$filename = md5(time().mt_rand(10, 99)).".png"; //设置图片名称
        $filename ="wu498958968.png"; //设置图片名称

        $data = $file;

        $newFile = fopen($filename,"w"); //打开文件准备写入

        fwrite($newFile,$data); //写入二进制流到文件

        fclose($newFile); //关闭文件
        die;
    }
    //返回ios版本
    public function return_ios_data(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $list = Db('app_version')->where('app_type',2)->order('updatetime desc')->find();
        $return_data = array(
            'iosVersion'=>!empty($list['app_version']) ? $list['app_version'] : '',
            'downloadURL'=>!empty($list['downloadurl']) ? $list['downloadurl'] : '',
            'updateMsg'=>!empty($list['updatemsg']) ? $list['updatemsg'] : '',
            'updateType'=>!empty($list['updatetype']) ? $list['updatetype'] : '',
        );
        $this->response_data($return_data);
    }

    //用户登录
    public function member_login()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['m_mobile']))
        {
            $this->response_error("登录手机号码不能为空");
        }
        $data['m_mobile']=$this->data['m_mobile'];
        if(empty($this->data['m_pwd']))
        {
            $this->response_error("登录密码不能为空");
        }
        $uuid = $this->data['uuid'];//机器码
        if(empty($uuid)){
            $this->response_error('机器码不能为空');
        }
        $data['m_pwd']=$this->data['m_pwd'];
        $memberservice=new MemberService();
//        $result=$memberservice->user_login($data);
        $result=$memberservice->new_user_login($data,$uuid);
        if($result['status']=='1'){
            $rdata=array();
            if(!empty($result['data']['m_id'])){
                $new_m_id = "abcde" . $result['data']['m_id'];//m_id加上abcde
            }
            $encryption_m_id = $memberservice->encrypt($new_m_id);
            if(!empty($encryption_m_id)){
                $result['data']['encryption_m_id'] = $encryption_m_id;//加密的用户id
            }
            $rdata=$result['data'];
            $rdata['headerimg']=CDN_URL.$result['data']['m_avatar'];
            if(!empty($data['m_mobile'])){
                $rdata['m_mobile_one'] = $data['m_mobile'];//加密的用户手机号
            }
            $this->response_data($rdata);
        }
        else{
            $this->response_error($result['msg']);
        }

    }
    //新用户登录
    public function new_member_login()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['m_mobile']))
        {
            $this->response_error("登录手机号码不能为空");
        }
        $data['m_mobile']=$this->data['m_mobile'];
        if(empty($this->data['m_pwd']))
        {
            $this->response_error("登录密码不能为空");
        }
        $uuid = $this->data['uuid'];//机器码
        if(empty($uuid)){
            $this->response_error('机器码不能为空');
        }
        $data['m_pwd']=$this->data['m_pwd'];
        $memberservice=new MemberService();
        $result=$memberservice->new_user_login($data,$uuid);
        if($result['status']=='1'){
            $rdata=array();
            if(!empty($result['data']['m_id'])){
                $new_m_id = "abcde" . $result['data']['m_id'];//m_id加上abcde
            }
            $encryption_m_id = $memberservice->encrypt($new_m_id);
            if(!empty($encryption_m_id)){
                $result['data']['encryption_m_id'] = $encryption_m_id;//加密的用户id
            }
            $rdata=$result['data'];
            $rdata['headerimg']=CDN_URL.$result['data']['m_avatar'];
            if(!empty($data['m_mobile'])){
                $rdata['m_mobile_one'] = $data['m_mobile'];//加密的用户手机号
            }
            //返回云账号信息
            $m_id = !empty($result['data']['m_id']) ? $result['data']['m_id'] : "";//用户id
            $member_list  = Db('member')->where('m_id',$m_id)->field('identifier,usersig')->find();//云账号信息
            $rdata['identifier'] = !empty($member_list['identifier']) ? $member_list['identifier'] : "";
            $rdata['usersig'] = !empty($member_list['usersig']) ? $member_list['usersig'] : "";
            $this->response_data($rdata);
        }
        else{
            $this->response_error($result['msg']);
        }

    }
    //发送验证码
    public function send_sms()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $sms = new SmsService();
        $to_mobile = $this->data['to_mobile'];
        if (!preg_match("/^1[0123456789]{1}\d{9}$/",$to_mobile)) {
          $this->response_error("请输入正确的手机号格式");
        }
        $res = $sms->smsSingleSender($to_mobile);
        if($res['status']=='1'){
            $base = new BaseService();
            $smsCode = $base->sessionGets('smsCode');
            $data=array();
//            $data['code']=$smsCode;
            $data['code']=$res['data'];//返回的验证码
            $this->response_data($data);
        }
        else{
            $this->response_error($res['msg']);
        }

    }

    //检查手机号码是否可以用
    public function checkmobile(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $memberservice=new MemberService();
        $to_mobile = $this->data['to_mobile'];
        if (!preg_match("/^1[34578]{1}\d{9}$/",$to_mobile)) {
            $this->response_error("请输入正确的手机号格式");
        }
        $res = $memberservice->checked_phone($to_mobile);
        if($res['status']=='1'){
            $data=array();
            $data['msg']=$res['msg'];
            $this->response_data($data);
        }
        else{
            $this->response_error($res['msg']);
        }
    }

    //忘记登录密码
    public function forget_login_pwd(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['m_mobile'])){
            $this->response_error("手机号码不能为空");
        }
        $data['m_mobile']=$this->data['m_mobile'];
        if(empty($this->data['m_pwd'])){
            $this->response_error("新密码不能为空");
        }
        $data['m_pwd']=$this->data['m_pwd'];
        if(empty($this->data['re_pwd'])){
            $this->response_error("重复密码不能为空");
        }
        $data['re_pwd']=$this->data['re_pwd'];
        if(empty($this->data['verification'])){
            $this->response_error("短信码不能为空");
        }
        $data['verification']=$this->data['verification'];

        $memberservice=new MemberService();
        $res= $memberservice->forget_login_pwd($data);
        if($res['status']=='1'){
            $data=array();
            $data['msg']=$res['msg'];
            $this->response_data($data);
        }
        else{
            $this->response_error($res['msg']);
        }
    }
    //忘记支付密码
    public function forget_payment_pwd(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['m_moblie'])){
            $this->response_error("手机号码不能为空");
        }
        $data['m_mobile']=$this->data['m_moblie'];
        if(empty($this->data['m_payment_pwd'])){
            $this->response_error("新支付密码不能为空");
        }
        $data['m_payment_pwd']=$this->data['m_payment_pwd'];
        if(empty($this->data['re_payment_pwd'])){
            $this->response_error("重复支付密码不能为空");
        }
        $data['re_payment_pwd']=$this->data['re_payment_pwd'];
        if(empty($this->data['verification'])){
            $this->response_error("短信码不能为空");
        }
        $data['verification']=$this->data['verification'];
        $memberservice=new MemberService();
        $res= $memberservice->forget_payment_pwd($data);
        if($res['status']=='1'){
            $data=array();
            $data['msg']=$res['msg'];
            $this->response_data($data);
        }
        else{
            $this->response_error($res['msg']);
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
            $return_data = array();
            $return_data['msg'] = '支付密码修改成功';
            $this->response_data($return_data);
        }else{
            $this->response_error('修改失败,请稍后重试');
        }
    }
    /*
    * zwb公告接口
    * 2018-10-16
    */
    public function notice(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $a_type = new ArticleTypeService();
        $where = [
            'at_name'=>'公告'
        ];
        $at_id = $a_type->articleTypeValue($where,'at_id');
        if(!$at_id){
            $this->response_error('未找到公告分类');
        }
        $article = new ArticleService();
        $where2 = [
            'a_type'=>$at_id,
            'a_state'=>0
        ];
        //2018-11-04判断是否存入redis
        $redis = RedisCache::getInstance(1);
        $notice = $redis->get('notice');
        if($notice){
            $list = json_decode($notice,true);
        }else{
            $list = $article->articleColumn($where2, 'a_name');
            foreach($list as $k => $v){
                $list[$k] = htmlspecialchars_decode($v);
            }
            $redis->set('notice',json_encode($list),300);
        }

        $this->response_data($list);
    }
    /*
    * zwb卡券接口
    * 2018-10-16
    */
    public function coiling(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $page = input('param.page',1);
        $page_size = input('param.page_size',10);
        $goods = new GoodsService();
        $goods_category = new GoodsCategoryService();
        $where3=[
            'parent_id'=>12,
            'state'=>0
        ];

        //卡券信息展示
        $ids = $goods_category->goodsCategoryColumn($where3,'gc_id');
        $ids = $ids ? $ids : [];
        $gc_ids = trim(12 . ','.implode(',',$ids),',');
        $where2['g.g_state'] = 6;
        $where2['p.gp_stock'] = ['>',0];
        $where2['g.gc_id'] = ['in', $gc_ids];
        $gc_list = $goods->goods_category_list($where2,'g.g_id,g.g_name,g.g_img,g.gc_id,p.gp_id,p.gp_market_price,dtr.gdr_id,min(dtr.gdr_price) min_price,max(dtr.gdr_price) max_price','g.g_endtime asc',$page_size,$page);
        if(!empty($gc_list['list'])){
            foreach($gc_list['list'] as &$v){
                if(!empty($v['g_img'])){
                    $g_img = $v['g_img'];
                    unset($v['g_img']);
                    $v['g_img'] = PAIYAYA_URL.$g_img;
                }
            }
        }
        $where4 = [
            'wit_code'=>'kq',
            'wi_state'=>0,
        ];
        $wb_img = Db::table('pai_web_images_type wit')->join('pai_web_images wi','wit.wit_id = wi.wit_id')->where($where4)->field('wi_imgurl,wi_href')->find();
        $gc_list['wi_imgurl'] = !empty($wb_img['wi_imgurl']) ? PAIYAYA_URL.$wb_img['wi_imgurl'] : '';
        $gc_list['wi_href'] = !empty($wb_img['wi_href']) ? $wb_img['wi_href'] : '';
        $this->response_data($gc_list);
    }
    /*
    * zwb我的历史搜索记录
    * 2018-11-12
    */
    public function my_search(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = !empty($data['member_id']) ? $data['member_id'] : "";
        $list = Db('search')->where('m_id',$m_id)->field('ps_keyword')->select();
        $hot_list = Db('search_hot')->field('psh_keyword')->select();
        $return_data = array();
        if(empty($m_id)){
            $return_data['list'] = [];
            $return_data['hot_list'] = !empty($hot_list) ? $hot_list : [];
            $this->response_data($return_data);
        }else{
            $return_data['list'] = !empty($list) ? $list : [];
            $return_data['hot_list'] = !empty($hot_list) ? $hot_list : [];
            $this->response_data($return_data);
        }
    }
    /*
    * zwb首页大搜索
    * 2018-10-16
    */
    public function search_index(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = !empty($data['member_id']) ? $data['member_id'] : '';//用户id
        $page = !empty($data['page']) ? $data['page'] : 1;//显示页数
        $page_size = !empty($data['page_size']) ? $data['page_size'] : 10;//显示条数
        $keyword = !empty($data['keyword']) ? $data['keyword'] : '';
        $type = !empty($data['type']) ? $data['type'] : '';//搜索类型 1商品  2商家
        $type = $type != 2 ? 1 : 2;
        //请求时保存搜索内容
        if(trim($keyword) && $m_id){
            $search = new SearchService();
            $where2 = [
                'ps_keyword'=>$keyword,
                'ps_type'=>$type,
                'm_id'=>$m_id
            ];
            //第一次是插入
            $ps_id = $search->get_value($where2,'ps_id');
            if(!$ps_id){
                $data = [
                    'm_id'=>$m_id,
                    'ps_addtime'=>time(),
                    'ps_keyword'=>$keyword,
                    'ps_type'=>$type
                ];
                $search->get_add($data);
            }
        }

        $list = array();
        switch($type){
            case 1:
                $min_price = !empty($data['min_price']) ? $data['min_price'] : 0;//where条件筛选
                $max_price = !empty($data['max_price']) ? $data['max_price'] : "";//where条件筛选
                $activity = !empty($data['activity']) ? $data['activity'] : '';//where条件筛选(为真时只看有参拍的)
                $order = !empty($data['order']) ? $data['order'] : '';//排序条件（综合、价格、人数）
                if($order){
                    switch($order){
                        case 3:     //人数正序
                            $order = 'sum_gp_num asc';
                            break;
                        case 4:     //人数倒叙
                            $order = 'sum_gp_num desc';
                            break;
                        case 5:     //价格正序
                            $order = 'gp.gp_market_price asc';
                            break;
                        case 6:     //价格倒叙
                            $order = 'gp.gp_market_price desc';
                            break;
                        default:    //综合排序
                            $order = 'g.is_heat asc,g.g_id desc';
                            break;
                    }
                }else{
                    $order = 'g.is_heat asc,g.g_id desc';
                }
                if($max_price){
                    $where['gp.gp_market_price'] = ['BETWEEN',[$min_price,$max_price]];
                }
                if($activity){
                    $where['op.gp_num'] = ['>',0];
                }
                $where['g.g_name'] = ['like','%'.$keyword.'%'];
                $where['g.g_state'] = 6;
                $where['g.g_endtime'] = ['>',time()];
                $field='g.g_id,gp.gp_id,g.g_name,g.g_img,g.g_express,gp.gp_market_price,sum(op.gp_num) sum_gp_num,min(dtr.gdr_price) min_gdr_price,max(dtr.gdr_price) max_gdr_price';
                $goods = new GoodsService();
                $list = $goods->search_goods($where,$order,$field,$page,$page_size);
                break;
            case 2:
                $where = [
                    'stroe_name'=>['like','%'.$keyword.'%'],
                    'store_state'=>0,
                ];
                $store = new StoreService();
                $order = 'add_time desc';
                $field='store_id,stroe_name,store_logo,m_id';
                $list = $store->search_store($where,$order,$field,$page,$page_size);
                break;
        }
        foreach($list['list'] as &$l){
            if(!empty($l['g_img'])){
                $l['g_img'] = PAIYAYA_URL.$l['g_img'];
            }
        }
        $this->response_data($list);
    }
    /*
    * zwb首页双11方法
    * 2018-11-05
    */
    public function double_eleven(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $time = time();
        $end_time = 1541951999;//2018-11-11 23：59：59
        if($time <= $end_time){
            $status = 1;
        }else{
            $status = 0;
        }
        $list = array(
            'url'=>PAIYAYA_URL."/promotion/index/double11",
            'tietle_img'=>PAIYAYA_URL."/static/image/index/icon_shuang11@2x.png",
            'login'=>0,
            'status'=>$status,
            'four_img'=>array(
                'img1'=>PAIYAYA_URL."/static/image/myhome/icon_home_on11@2x.png",
                'img2'=>PAIYAYA_URL."/static/image/myhome/icon_fenlei_on11@2x.png",
                'img3'=>PAIYAYA_URL."/static/image/myhome/icon_xiaoxi_on11@2x.png",
                'img4'=>PAIYAYA_URL."/static/image/myhome/icon_user_on11@2x.png",
            )
        );
        $this->response_data($list);
    }
    /*
    * zwb返回图片版本及图片链接
    * 2018-10-25
    */
    public function return_iamges(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
//        $time = time();
//        $end_time = 1541951999;//2018-11-11 23：59：59
//        if($time <= $end_time){
            $url = "https://xwcs.paiyy.com.cn"."/static/image/index/welcome.png";
//        }else{
//            $url = "";
//        }
        $data = array(
            'version'=>"1.0.0",
            'splashImageUrl'=>$url,
        );
        $this->response_data($data);
    }
    /*
    * zwb首页秒杀区
    * 2018-10-25
    */
    public function second_kill(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $activity = new ActivityService();
        $where = '';
        $where['a_name'] = ['like',"%超值团购%"];
        $call_back = $activity->get_cztg_goods($where);
        if(!empty($call_back['data'])){
            $ac_end_time = !empty($call_back['data']['activity']['a_end_time']) ? $call_back['data']['activity']['a_end_time'] : "";//活动结束时间
            $ac_status = !empty($call_back['data']['activity']['a_state']) ? $call_back['data']['activity']['a_state'] : "";//活动开启状态
            if($ac_end_time > time() && $ac_status == 1){
                $end_ac_status = 1;
            }else{
                $end_ac_status = 0;
            }
            $g_s_img1 = !empty($call_back['data']['goods_list'][0]['g_s_img']) ? $call_back['data']['goods_list'][0]['g_s_img'] : "";//商品1图片
            $gp_market_price1 = !empty($call_back['data']['goods_list'][0]['gp_market_price']) ? $call_back['data']['goods_list'][0]['gp_market_price'] : "";//商品1市场价
            $min_price1 =  !empty($call_back['data']['goods_list'][0]['min_price']) ? $call_back['data']['goods_list'][0]['min_price'] : "";//商品1最低价
            $g_s_img2 = !empty($call_back['data']['goods_list'][1]['g_s_img']) ? $call_back['data']['goods_list'][1]['g_s_img'] : "";//商品2图片
            $gp_market_price2 = !empty($call_back['data']['goods_list'][1]['gp_market_price']) ? $call_back['data']['goods_list'][1]['gp_market_price'] : "";//商品2市场价
            $min_price2 =  !empty($call_back['data']['goods_list'][1]['min_price']) ? $call_back['data']['goods_list'][1]['min_price'] : "";//商品2最低价
            $leak = array(
                'leak_img'=>PAIYAYA_URL."/static/image/index/icon_fudai@2x.png",
                'title'=>"参与必中 还有额外大奖",
                'first_img'=>PAIYAYA_URL.$g_s_img1,
                'first_seckill_price'=>"¥".$min_price1,
                'first_seckill_old_price'=>"¥".$gp_market_price1,
                'second_img'=>PAIYAYA_URL.$g_s_img2,
                'second_seckill_price'=>"¥".$min_price2,
                'second_seckill_old_price'=>"¥".$gp_market_price2,
                'status'=>$end_ac_status,
                'url'=>'/activity/index/index/code/act1543473374',
            );
        }
        if(!empty($call_back['data'])){
            if(empty($call_back['data']['goods_list'])){
                $ac_status = !empty($call_back['data']['activity']['a_state']) ? $call_back['data']['activity']['a_state'] : "";//活动开启状态
                $leak = array(
                    'leak_img'=>PAIYAYA_URL."/static/image/index/icon_fudai@2x.png",
                    'title'=>"参与必中 还有额外大奖",
                    'first_img'=>PAIYAYA_URL."/static/image/index/img5@2x.png",
                    'first_seckill_price'=>"¥77.00",
                    'first_seckill_old_price'=>"¥¥853.00",
                    'second_img'=>PAIYAYA_URL."/static/image/index/img4@2x.png",
                    'second_seckill_price'=>"¥288.00",
                    'second_seckill_old_price'=>"¥429.00",
                    'status'=>$ac_status,
                    'url'=>'/activity/index/index/code/act1543473374',
                );
            }
        }
        $return_data = array(
            'kill'=>array(
                'kill_img'=>PAIYAYA_URL."/static/image/index/icon_miaosha@2x.png",//秒杀图片
                'time_img'=>PAIYAYA_URL."/static/image/index/icon_23@2x.png",//23点场图片
                'start_img'=>PAIYAYA_URL."/static/image/index/icon_jijiangkaishi@2x.png",//即将开始图片
                'title'=>"超值商品 敬请期待",
                'first_img'=>PAIYAYA_URL."/static/image/index/img1@2x.png",
                'first_seckill_price'=>"¥27.00",
                'first_seckill_old_price'=>"¥12377.00",
                'second_img'=>PAIYAYA_URL."/static/image/index/img2@2x.png",
                'second_seckill_price'=>"¥87.00",
                'second_seckill_old_price'=>"¥15100.00",
                'three_img'=>PAIYAYA_URL."/static/image/index/img3@2x.png",
                'three_seckill_price'=>"¥99.00",
                'three_seckill_old_price'=>"¥21800.00",
                'status'=>0,
                'url'=>'',
                'end_time'=> 0,
            ),
            'leak'=>$leak,
            'large'=>array(
                'title_img'=>PAIYAYA_URL."/static/image/index/icon_daeshangpin@2x.png",
                'title'=>"高端商品 快来吖",
                'first_img'=>PAIYAYA_URL."/static/image/index/img10@2x.png",
                'second_img'=>PAIYAYA_URL."/static/image/index/img11@2x.png",
                'status'=>0,
                'url'=>'',
            ),
            'digital'=>array(
                'title_img'=>PAIYAYA_URL."/static/image/index/icon_shoujishuma.png",
                'title'=>"Iphone XS 新品",
                'first_img'=>PAIYAYA_URL."/static/image/index/img8@2x.png",
                'second_img'=>PAIYAYA_URL."/static/image/index/img9@2x.png",
                'status'=>0,
                'url'=>'',
            ),
            'decoration'=>array(
                'title_img'=>PAIYAYA_URL."/static/image/index/icon_jijujiazhuang.png",
                'title'=>"低至一折！三折！",
                'first_img'=>PAIYAYA_URL."/static/image/index/img6@2x.png",
                'second_img'=>PAIYAYA_URL."/static/image/index/img7@2x.png",
                'status'=>0,
                'url'=>'',
            ),
        );
        $this->response_data($return_data);
    }
    public function countDown()
    {
        $endTime = 1541453907;
        $beiginTime = strtotime(date('Y-m-d H:i:s'));
        $timeDifference = $endTime - $beiginTime;
        switch ($timeDifference) {
            case $timeDifference < 0 :
                $timeDifference = '已经结束！';
                break;
            case $timeDifference < 60 :
                $timeDifference = $timeDifference . '秒';
                break;
            case $timeDifference < 3600 :
                $minutes = floor($timeDifference / 60);
                $seconds = floor($timeDifference - ($minutes * 60));
                $timeDifference = $minutes . '分' . $seconds . '秒';
                break;
            case $timeDifference < 86400 :
                $hours = floor($timeDifference / 3600);
                $minutes = floor(($timeDifference - ($hours * 3600)) / 60);
                $seconds = floor($timeDifference - ($hours * 3600) - ($minutes * 60));
                $timeDifference = $hours . '小时' . $minutes . '分' . $seconds . '秒';
                break;
            default:
                $days = floor(($timeDifference / 86400));
                $hours = floor(($timeDifference - ($days * 86400)) / 3600);
                $minutes = floor(($timeDifference - ($days * 86400) - ($hours * 3600)) / 60);
                $seconds = floor($timeDifference - ($days * 86400) - ($hours * 3600) - ($minutes * 60));
                $timeDifference = $days . '天' . $hours . '小时' . $minutes . '分' . $seconds . '秒';
                break;
        }
        print_r($timeDifference);die();
    }
}
