<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/12/4
 * Time: 9:15
 */

namespace app\data\service\PhpServerSdk;


use app\data\service\BaseService;
use think\Db;

class PhpsdkService extends BaseService
{
    /*
     * 用户注册导入资料到云通讯
     * $m_id 用户id
     */
    public function account_import_yun($m_id){
        if(empty($m_id)){
            return "用户id不能为空";
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
        Db::startTrans();
        try{
            $data = $return->account_import($identifier, $nick_name, $face_url);//导入用户
            $usersig = $this->post_get_usersig($identifier);//获取usersig
            $data_update = array(
                'identifier'=>$identifier,
                'usersig'=>$usersig,
            );
            $res = Db('member')->where('m_id',$m_id)->update($data_update);//修改会员资料
            $result = $this->testSetUserInfo($identifier,$data_arr);//设置用户云账号资料
            Db::commit();
            return 1;
        }catch (\Exception $e){
            Db::rollback();
            return 0;
        }

    }
    /*
     * 设置用户资料
     * $account_id 云账号
     * $arr 修改的资料
     */
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
    /*
     * 传参生成usersig
     * $identifier用户云账号
     */
    public function post_get_usersig($identifier){
        $return = new TLSSig();
        $usersig = $return->genSig($identifier,3650*24*3600);
        return $usersig;
    }
    /*
     * 插入系统消息发送及时消息给用户
     * $sm_id系统消息id
     * $status 1系统消息 2为订单消息 3为钱包消息
     */
    public function order_message_s($sm_id,$status){
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
            $share_url = PAIYAYA_URL."/member/orderpai/index?o_id=".$o_id;//跳转链接 2中拍消息
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
    /*
     * 插入系统消息发送及时消息给用户
     * $sm_id系统消息id
     * $status 1系统消息 2为订单消息 3为钱包消息
     */
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
            $share_url = PAIYAYA_URL."/member/orderpai/index?o_id=".$o_id;//跳转链接 2中拍消息
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
        if($sm_list['sm_display'] == 0){
            $im_message_type = 1;//1内容展示2跳链接
        }elseif($sm_list['sm_display'] == 1){
            $im_message_type = 2;//1内容展示2跳链接
        }elseif($sm_list['sm_display'] == 2){
            $im_message_type = 2;//1内容展示2跳链接
        }elseif($sm_list['sm_display'] == 3){
            $im_message_type = 2;//1内容展示2跳链接
        }
        $image = !empty($sm_list['sm_img']) ? $sm_list['sm_img'] : "";
        if(!empty($image)){
            $share_image = PAIYAYA_URL.$image;//图片
        }else{
            $share_image = "";//图片
        }
        $content = array();
        $content['imMsgTitle'] = $share_title;
        $content['imMsgContent'] = $share_content;
        $content['imMsgLinkUrl'] = $share_url;
        $content['imMsgImageUrl'] = $share_image;
        $content['imMsgType'] = $im_message_type;
        $content['imMsgPriceContent'] = $ticket_price_desc;
        $content['imMsgTimeStamp'] = $sm_list['sm_addtime'];
        $content['imMsgId'] = $sm_list['sm_id'];
        $content = json_encode($content,JSON_UNESCAPED_SLASHES);
        $result = $return->openim_send_msg($account_id, $receiver, $content);
        if($result['ActionStatus'] == "OK"){
            return 1;//发送成功返回
        }else{
            return 0;//发送失败返回
        }
    }
    /*
     * 后台发送推送消息给用户
     * $sm_id系统消息id
     * $status 1系统消息
     */
    public function ts_message($sm_id,$status){
        $TimRestApi = new TimRestApi();
        if($status == 1){
            $account_id="SystemNotice";//1系统消息
        }
        $sm_list = Db::connect('db_pai_data')->name('push_msg')->where('pm_id',$sm_id)->find();
        $share_url = $sm_list['pm_url'];//跳转链接
        $receiver = Db('member')->where('m_id',992)->column('identifier');
        $share_title = !empty($sm_list['pm_title']) ? $sm_list['pm_title'] : "";//标题
        $share_content = !empty($sm_list['sm_brief']) ? $sm_list['sm_brief'] : "";//简介
        if(!empty($sm_list['pm_url'])){
            $im_message_type = 2;//1内容展示2跳链接
        }else{
            $im_message_type = 1;//1内容展示2跳链接
        }
        $share_image = "";//图片
        $ticket_price_desc = "";
        $content = array();
        $content['imMsgTitle'] = $share_title;
        $content['imMsgContent'] = $share_content;
        $content['imMsgLinkUrl'] = $share_url;
        $content['imMsgImageUrl'] = $share_image;
        $content['imMsgType'] = $im_message_type;
        $content['imMsgPriceContent'] = $ticket_price_desc;
        $content['imMsgTimeStamp'] = $sm_list['pm_addtime'];
        $content['imMsgId'] = $sm_list['pm_id'];
        $content = json_encode($content,JSON_UNESCAPED_SLASHES);
        $result = $TimRestApi->openim_batch_sendmsg($receiver, $content);
        if($result['ActionStatus'] == "OK"){
            return 1;//发送成功返回
        }else{
            return 0;//发送失败返回
        }
    }
}