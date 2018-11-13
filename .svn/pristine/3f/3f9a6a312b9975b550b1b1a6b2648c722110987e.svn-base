<?php
namespace app\api\controller;
use app\data\service\articleType\ArticleTypeService;
use app\data\service\goods\GoodsService;
use app\data\service\goodsCategory\GoodsCategoryService;
use app\data\service\income\IncomeService;
use app\data\service\member\MemberAttestationService;
use app\data\service\orderAwardcode\OrderAwardcodeService;
use app\data\service\pointOrderAwardcode\PointOrderAwardcodeService;
use app\data\service\pointOrderPai\PointOrderPaiService;
use app\data\service\popularity\PopularityGoodsService;
use app\data\service\popularity\PopularityService;
use app\data\service\review\RevieworderService;
use app\data\service\search\SearchHotService;
use app\data\service\search\SearchService;
use app\data\service\sms\AliService;
use app\data\service\sms\SmsService;
use app\data\service\store\StoreCollectionService;
use app\data\service\store\StoreService;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\BaseService as BaseService;
use app\data\service\admit\AdmitService as AdmitService;
use app\data\service\address\AddressService as AddressService;
use app\data\service\api\ApigoodsService as ApigoodsService;
use app\data\service\system_msg\SystemMsgService;
use app\data\service\goods\VisitGoodsHistoryService;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use app\data\service\moneyLog\MoneyLogService;
use app\data\service\config\ConfigService;
use app\data\service\peanutLog\PeanutLogService;
use app\data\service\goods\GoodsCollectionService;
use app\data\service\member\MemberLevelService;
use app\data\service\recharge\RechargeService;
use think\Db;



class Member extends ApiMember
{
    //用户修改密码
    public function member_editpwd()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['m_mobile']))
        {
            $this->response_error("手机号码不能为空");
        }
        $data['m_mobile']=$this->data['m_mobile'];
        if(empty($this->data['new_pwd']))
        {
            $this->response_error("新密码不能为空");
        }
        $data['new_pwd']=$this->data['new_pwd'];
        if(empty($this->data['m_pwd']))
        {
            $this->response_error("重复密码不能为空");
        }
        $data['m_pwd']=$this->data['m_pwd'];
        if(empty($this->data['used_pwd']))
        {
            $this->response_error("旧密码不能为空");
        }
        $data['used_pwd']=$this->data['used_pwd'];
        $memberservice=new MemberService();
        $baseservice=new BaseService();
        $where['m_mobile'] = $baseservice->encrypt($data['m_mobile']);
        $result=$memberservice->set_login_pwd($where,$data);
        if($result['status']=='1'){
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($result['msg']);die;
        }
    }
    //获取用户个人资料
    public function get_m_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $memberservice=new MemberService();
        $where['m_id']=$this->data['member_id'];
        $info=$memberservice->get_info($where);
        $info['headerimg']=CDN_URL.$info['m_avatar'];
        $this->response_data($info);
    }
    //获取用户金额
    public function get_m_money(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $memberservice=new MemberService();
        $where['m_id']=$this->data['member_id'];
        $field="m_money";
        $info=$memberservice->get_info($where,$field);
        $this->response_data($info);
    }
    //用户编辑个人资料
    public  function  edit_memberinfo(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        if(!empty($_FILES['m_avatar']))
        {
            $data['m_avatar']=$_FILES['m_avatar'];
        }
//        if(!empty($this->data['m_sex']))
//        {
//            $data['m_sex']=$this->data['m_sex'];
//        }
        if(isset($this->data['m_sex']))
        {
            $data['m_sex']=$this->data['m_sex'];
        }
        if(!empty($this->data['m_name']))
        {
            $data['m_name']=$this->data['m_name'];
        }
        $memberservice=new MemberService();
        $where=array();
        $where['m_id']=$this->data['member_id'];
        $result=$memberservice->set_personal_data($where,$data);
        if($result['status']=='1'){
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($result['msg']);die;
        }
    }
    //申请商家入驻
    public  function  apply_store(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $data['m_id']=$this->data['member_id'];
        if(empty($this->data['corporation_name']))
        {
            $this->response_error("公司名称不能为空");
        }
        $data['corporation_name']=$this->data['corporation_name'];
        if(empty($this->data['pid']))
        {
            $this->response_error("省市区ID不能为空，省市区ID用逗号隔开");
        }
        $data['pid']=$this->data['pid'];
        if(empty($this->data['address']))
        {
            $this->response_error("商家地址不能为空");
        }
        $data['address']=$this->data['address'];
        if(empty($this->data['ba_bankname']))
        {
            $this->response_error("开户银行名称不能为空");
        }
        $data['ba_bankname']=$this->data['ba_bankname'];
        if(empty($this->data['ba_bankaccount']))
        {
            $this->response_error("开户银行账号不能为空");
        }
        $data['ba_bankaccount']=$this->data['ba_bankaccount'];
        if(empty($this->data['ba_license']))
        {
            $this->response_error("营业执照不能为空");
        }
        $data['ba_license']=$this->data['ba_license'];
        if(empty($this->data['store_categoryid']))
        {
            $this->response_error("店家分类不能为空");
        }
        $data['store_categoryid']=$this->data['store_categoryid'];
        if(empty($this->data['store_tel']))
        {
            $this->response_error("店家联系方式不能为空");
        }
        $data['store_tel']=$this->data['store_tel'];
        if(empty($this->data['ba_legal_person']))
        {
            $data['ba_legal_person']=$this->data['ba_legal_person'];
        }
        if(!empty($this->data['ba_legal_person_tel']))
        {
            $data['ba_legal_person_tel']=$this->data['ba_legal_person_tel'];
        }
        if(empty($this->data['ba_stroe_name']))
        {
            $this->response_error("商家简称不能为空");
        }
        $data['ba_stroe_name']=$this->data['ba_stroe_name'];

        if(!empty($this->data['ba_legal_person_idnumber']))
        {
            $data['ba_legal_person_idnumber']=$this->data['ba_legal_person_idnumber'];
        }
       //营业执照图片 必填
        if(empty($_FILES['ba_license_img']))
        {
           $this->response_error("营业执照图片不能为空");
        }
        $data['ba_license_img']=$_FILES['ba_license_img'];
        //身份证正面照片 选填
        if(!empty($_FILES['ba_identification_positive_img']))
        {
            $data['ba_identification_positive_img']=$_FILES['ba_identification_positive_img'];
        }
       //身份证反面照片 选填
        if(!empty($_FILES['ba_identification_negative_img']))
        {
            $data['ba_identification_negative_img']=$_FILES['ba_identification_negative_img'];
        }
        $AdmitService=new AdmitService();
        $result=$AdmitService->admitApplication($data['m_id'],$data);
        if($result['status']=='1'){
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($result['msg']);die;
        }
    }
    //获取用户入驻资料
    public function get_apply_store_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $AdmitService=new AdmitService();
        $m_id = $this->data['member_id'];
        $where = [
            'm_id'=>$m_id
        ];
        $admitService = new AdmitService();
        $info = $admitService->vdRegister($where);//申请信息
        if(empty($info)){
            $this->response_error("没有数据");
        }
        $address = [
            'pid'=>$info['pid'],
            'cid'=>$info['cid'],
            'aid'=>$info['aid'],
        ];
        $info['pid'] = $admitService->id_tfm_address($address);
        $cate = Db::table("pai_store_category")->column('sc_name','sc_id');//替换使用(如:分类3,替换为实木家具
        if(!empty($info['store_categoryid'])){
            $info['store_categoryid_name'] = empty($cate[$info['store_categoryid']]) ? '' : $cate[$info['store_categoryid']];
        }
        $info['ba_license_img']=CDN_URL.$info['ba_license_img'];
        $info['ba_identification_positive_img']=CDN_URL.$info['ba_identification_positive_img'];
        $info['ba_identification_negative_img']=CDN_URL.$info['ba_identification_negative_img'];
        $this->response_data($info);
    }
    //读取收货地址
    public function get_address_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $data['m_id']=$this->data['member_id'];
        $AddressService=new AddressService();
        $where['m_id']=$this->data['member_id'];
        $address_list=$AddressService->addressInfoList($where,'is_default desc, updatetime desc');
        $this->response_data($address_list);
    }
    //获取地址的详细信息
    public function get_address_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $data['m_id']=$this->data['member_id'];
        $AddressService=new AddressService();
        $where['address_id']=$this->data['address_id'];
        $address_info=$AddressService->addressInfo($where);
        $this->response_data($address_info);
    }
  //读取用户的默认地址
    public function get_default_address(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $data['m_id']=$this->data['member_id'];
        $AddressService=new AddressService();
        $m_id=$this->data['member_id'];
        $address_info=$AddressService->getMyDefaultAddress($m_id);
        $this->response_data($address_info);
    }
   //添加收货地址
    public function add_address(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $AddressService=new AddressService();
        if(empty($this->data['name'])){
            $this->response_error("收货人姓名不能为空");
        }
        $data['name']=$this->data['name'];
        if(empty($this->data['tel'])){
            $this->response_error("收货人手机不能为空");
        }
        $data['tel']=$this->data['tel'];
        if(empty($this->data['address'])){
            $this->response_error("收货人详细地址不能为空");
        }
        $data['address']=$this->data['address'];
        if(empty($this->data['pid'])){
            $this->response_error("收货人省ID不能为空");
        }
        $data['pid']=$this->data['pid'];
        if(!empty($this->data['cid'])){
            $data['cid']=$this->data['cid'];
        }
        else{
            $data['cid']=0;
        }
        if(!empty($this->data['did'])){
            $data['did']=$this->data['did'];
        }
        else{
            $data['did']=0;
        }
        if(!empty($this->data['is_default'])){
            $data['is_default']=$this->data['is_default'];
        }

        $data['m_id']=$this->data['member_id'];
        $res=$AddressService->myAddressAdd($data);
        if($res['status']=='1'){
            $rdata=array();
            $rdata['address_id']=$res['data'];
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($res['msg']);die;
        }

    }
    //编辑收货地址
    public function edit_address(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $AddressService=new AddressService();
        if(empty($this->data['name'])){
            $this->response_error("收货人姓名不能为空");
        }
        $data['name']=$this->data['name'];
        if(empty($this->data['tel'])){
            $this->response_error("收货人手机不能为空");
        }
        $data['tel']=$this->data['tel'];
        if(empty($this->data['address'])){
            $this->response_error("收货人详细地址不能为空");
        }
        $data['address']=$this->data['address'];
        if(empty($this->data['pid'])){
            $this->response_error("收货人省ID不能为空");
        }
        $data['pid']=$this->data['pid'];
        if(!empty($this->data['cid'])){
            $data['cid']=$this->data['cid'];
        }
        else{
            $data['cid']=0;
        }
        if(!empty($this->data['did'])){
            $data['did']=$this->data['did'];
        }
        else{
            $data['did']=0;
        }
        $data['m_id']=$this->data['member_id'];
        if(empty($this->data['address_id'])){
            $this->response_error("收货地址ID不能为空");
        }
        $where['address_id']=$this->data['address_id'];
        if(!empty($this->data['is_default'])){
            $data['is_default']=$this->data['is_default'];
        }
        $res=$AddressService->myAddressSave($where,$data);
        if($res['status']=='1'){
            $rdata=array();
            $rdata['msg']=$res['msg'];
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($res['msg']);die;
        }
    }
    //删除收货地址
    public function del_address(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $AddressService=new AddressService();
        if(empty($this->data['address_id'])){
            $this->response_error("收货地址ID不能为空");
        }
        $where['address_id']=$this->data['address_id'];
        $res=$AddressService->myAddressDel($where);
        if($res['status']){
            $rdata=array();
            $rdata['msg']="删除成功";
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($res['msg']);die;
        }
    }
    //收藏或者取消商品
    public function dogoods_collection(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_erro($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if(empty($this->data['g_id']))
        {
            $this->response_error("没有商品g_id");
        }
        $g_id=$this->data['g_id'];
        if(empty($this->data['store_id']))
        {
            $this->response_error("没有商品所属店铺store_id");
        }
        $store_id=$this->data['store_id'];
        if(empty($this->data['dotype']))
        {
            $this->response_error("没有操作类型");
        }
        $type=$this->data['dotype'];
        $ApigoodsService=new ApigoodsService();
        $result=$ApigoodsService->docollection($m_id,$type,$g_id,$store_id);
        if($result['status']){
            $rdata=array();
            $rdata['msg']="操作成功";
            $this->response_data($rdata);
        }
        else{
            $this->response_error($res['msg']);
        }
    }
    //收藏或者取消店铺
    public function dostore_collection(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if(empty($this->data['store_id']))
        {
            $this->response_error("没有店铺store_id");
        }
        $store_id=$this->data['store_id'];
        if(empty($this->data['dotype']))
        {
            $this->response_error("没有操作类型");
        }
        $type=$this->data['dotype'];
        $ApigoodsService=new ApigoodsService();
        $result=$ApigoodsService->dostorecollection($m_id,$type,$store_id);
        if($result['status']){
            $rdata=array();
            $rdata['msg']="操作成功";
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($res['msg']);die;
        }
    }
    //添加评价
    public function add_review(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $data['m_id']=$this->data['member_id'];
        if(empty($this->data['store_id']))
        {
            $this->response_error("评价店铺ID不能为空");
        }
        $data['store_id']=$this->data['store_id'];
        if(empty($this->data['service_score'])){
            $this->response_error("店铺评价分数为空service_score");
        }
        $data['service_score']=$this->data['service_score'];
        if(empty($this->data['logistics_score'])){
            $this->response_error("物流评价分数为空logistics_score");
        }
        $data['logistics_score']=$this->data['logistics_score'];
        if(empty($this->data['order_id'])){
            $this->response_error("订单ID为空order_id");
        }
        $data['order_id']=$this->data['order_id'];
        if(empty($this->data['goods_score'])){
            $this->response_error("商品打分不能为空goods_score");
        }
        $data['goods_score']=$this->data['goods_score'];
        if(empty($this->data['gp_id'])){
            $this->response_error("商品gp id不能为空gp_id");
        }
        $data['gp_id']=$this->data['gp_id'];
        if(empty($this->data['rg_content'])){
            $this->response_error("商品评论不能为空rg_content");
        }
        $data['rg_content']=$this->data['rg_content'];
        if(empty($this->data['rg_showname'])){
            $this->response_error("商品是否匿名为空rg_showname");
        }
        $data['rg_showname']=$this->data['rg_showname'];
        if(!empty($_FILES['file_name'])){
           $data['file_name']=$_FILES['file_name'];
        }
        $ApigoodsService=new ApigoodsService();
        $result=$ApigoodsService->do_add_review($data);
        if($result['status']){
            $rdata=array();
            $rdata['msg']="操作成功";
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($res['msg']);die;
        }

    }
//根据用户ID得到用户的二维码完整路径
    public function  get_fx_ewm(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $memberservice=new MemberService();
        $m_id=$this->data['member_id'];
        $data['m_code'] =CDN_URL.$memberservice->new_code(['m_id'=>$m_id]);
        $data['hddate']="活动时间 7月1日 ～ 12月31日";
        $this->response_data($data);
    }

    //得到分享的相关内容
    public function get_fx_content(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $memberservice=new MemberService();
        $where['m_id']=$this->data['member_id'];
        $fields="m_mobile";
        $info=$memberservice->get_info($where);
        $mobile=$memberservice->decrypt($info['m_mobile']);
        $data['share_title']="邀您加入拍吖吖，享大福利！";
        $data['share_content']="5折！3折！1折！还有1元价！尽在拍吖吖，快来抢购吧！";
        $data['share_url']=PAI_URL."/member/register/it_to_rg/phone/$mobile";
        $data['share_image']=PAI_URL."/uploads/comm/toshare.jpg";
        $this->response_data($data);
    }
    //得到我的系统消息
    public function get_my_system_msg()
    {
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
        }
        $data = array();
        if (empty($this->data['member_id'])) {
            $this->response_error("没有登录参数");
        }
        $m_id = $this->data['member_id'];
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size = 10;
        } else {
            $page_size = $this->data['pagenum'];
        }
        $where = [
            'to_mid' => $m_id,
        ];
        $order = 'sm_addtime desc';
        $field = 'sm_id,sm_addtime,is_read,sm_type,sm_title,sm_brief,from_id,to_mid,sm_img,g_id,shop_price,sm_display,o_id,is_success';
        $msg = new SystemMsgService();
        $list['list'] = $msg->get_msg_list($where, $order, $field, $page, $page_size);
        $data=$list['list'];

        $sql = "select count(*) num from pai_system_msg where sm_public=2 OR to_mid= $m_id";
        $total_num = Db::query($sql);
        $total_num = isset($total_num[0]['num']) ? $total_num[0]['num'] : 0;
        $page_count = ceil($total_num / $page_size);
        $pagelist=$this->app_page($page_count);
        foreach($data as &$d){
            if(!empty($d['sm_img'])){
                $d['sm_img'] = PAIYAYA_URL.$d['sm_img'];
            }
            if($d['sm_display'] > 0){
                $d['url'] = PAIYAYA_URL."/member/orderpai/index?o_id=" . $d['o_id'];
            }
        }
        $this->response_data($data,$pagelist);
    }
    //得到消息详情
    public function get_sysmsg_content(){
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
        }
        $data = array();
        if (empty($this->data['member_id'])) {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if (empty($this->data['sm_id'])) {
            $this->response_error("消息ID不能为空");
        }
        $msg = new SystemMsgService();
        $sm_id =$this->data['sm_id'];
        $info = $msg->GetSystemMsg($sm_id,$m_id);
        $this->response_data($info);
    }
    //用户足迹
    public function visit_list(){
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
        }
        $data = array();
        if (empty($this->data['member_id'])) {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size = 4;
        } else {
            $page_size = $this->data['pagenum'];
        }
        $visit_goods_history = new VisitGoodsHistoryService();
        $where=[
            'g.g_state'=>['in',6,8,9],
            'v.m_id'=>$m_id
        ];
        $field='g.g_name,g.g_id,g.g_state,g.g_img,gp.gp_market_price,gp.gp_id,v.m_id,v.vgh_id,v.visit_time';
        $list = $visit_goods_history->get_limit_list($where, $order='v.vgh_id desc', $field, $page,$page_size);
        $data=$list['list'];
        $page_count =$list['total_page'];
        $pagelist=$this->app_page($page_count);
        $this->response_data($data,$pagelist);
    }
    //用户确定订单
    public function toconfirm_order(){
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
        }
        $data = array();
        if (empty($this->data['member_id'])) {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if (empty($this->data['o_id'])) {
            $this->response_error("没有订单o_id");
        }
        $o_id = $this->data['o_id'];
        $orderpai = new OrderPaiService();
        $call_back = $orderpai->confirm_order($o_id,$m_id);
        if($call_back['status']=='1'){
            $ret=array();
            $ret['msg']=$call_back['msg'];
            $this->response_data($ret);
        }
        else{
            $this->response_error($call_back['msg']);
        }
    }
    //获取用户的余额和冻结资金,收益。冻结收益，花生，经验值，等级ID
    public function getmember_money(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $memberservice=new MemberService();
        $where['m_id']=$this->data['member_id'];
        $field="m_money,m_frozen_money,m_income,m_frozen_income,peanut,experience,m_levelid";
        $info=$memberservice->get_info($where,$field);
        $this->response_data($info);

    }
    //用户余额明细
    public function yue_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if(empty($this->data['ml_type']))
        {

        }
        else{
            $ml_type=$this->data['ml_type'];
        }
        $money = new MoneyLogService();
        $money_type = 1;                        //1余额 2收益
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size =10;
        } else {
            $page_size = $this->data['pagenum'];
        }

        $where=[
            'm_id'=>$m_id,
            'money_type'=>$money_type,
            'ml_type'=>$ml_type,
        ];
        if(!$ml_type){
            unset($where['ml_type']);
        }
        $list = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
        $data=$list['list'];
        $page_count = $list['total_page'];
        $pagelist=$this->app_page($page_count);
        $this->response_data($data,$pagelist);
    }

    //收益明细
    public function income_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if(empty($this->data['ml_type']))
        {
        }
        else{
            $ml_type=$this->data['ml_type'];
        }                           //1余额 2收益
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size =10;
        } else {
            $page_size = $this->data['pagenum'];
        }
        $money = new MoneyLogService();
        $money_type = 2;                        //1余额 2收益

        $where=[
            'm_id'=>$m_id,
            'money_type'=>$money_type,
        ];
        $where_add=[
            'm_id'=>$m_id,
            'money_type'=>$money_type,
        ];
        $where_add['ml_type'] = "add";
        $where_reduce=[
            'm_id'=>$m_id,
            'money_type'=>$money_type,
        ];
        $where_reduce['ml_type'] = "reduce";
        //收入
        $where['ml_type'] = $ml_type;
        $add_money = $money->sum_ml_money($where_add);
        $reduce_monet = $money->sum_ml_money($where_reduce);
        $list= $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
        $money = [
            'add_money'=>$add_money,
            'reduce_money'=>$reduce_monet,
        ];
        $page_count = $list['total_page'];
        $pagelist=$this->app_page($page_count);
        $data=array();
        $data['money']=$money;
        $data['list']=$list['list'];
        $this->response_data($data,$pagelist);
    }
    //绑定银行卡
    public function bindingcard(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        $mem = new MemberService();
        $info = $mem->get_info(['m_id'=>$m_id],'m_bankowner,m_bankname,m_bankaccount');
        if(!empty($info['m_bankowner']) && !empty($info['m_bankname']) && !empty($info['m_bankaccount'])){      //真实姓名、银行卡、开户行全部不为空则不需更改信息
            $this->response_error('目前暂时只支持绑定一张银行卡');
        }
        if(empty($this->data['m_bankowner']))
        {
            $this->response_error("账号人信息为空");
        }
            $data['m_bankowner'] =$this->data['m_bankowner'];
        if(empty($this->data['m_bankname']))
        {
            $this->response_error("开户用户名称为空");
        }
            $data['m_bankname'] =$this->data['m_bankname'];
        if(empty($this->data['m_bankaccount']))
        {
            $this->response_error("银行账号为空");
        }
            $data['m_bankaccount'] =$this->data['m_bankaccount'];
            $data['edit_time'] = time();
            $where = ['m_id'=>$m_id];
            $res = $mem->memberSave($where,$data);
        if($res){
          $ret=array();
            $ret['msg']="绑定银行卡成功";
            $this->response_data($ret);
        }
        else{
          $this->response_error("绑定银行卡失败");
        }
    }
    //判断是否绑定银行卡
    public function isbindcard(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        $mem = new MemberService();
        $info = $mem->get_info(['m_id'=>$m_id],'m_bankowner,m_bankname,m_bankaccount');
        if(!empty($info['m_bankowner']) && !empty($info['m_bankname']) && !empty($info['m_bankaccount'])){      //真实姓名、银行卡、开户行全部不为空则不需更改信息
            $this->response_data($info);
        }
        else{
            $this->response_error("用户没有绑定银行卡");
        }
    }
    //提现页面数据
    public function with_draw_page(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $mem = new MemberService();
        $m_id=$this->data['member_id'];
        $where=[
            'm_id'=>$m_id
        ];
        $info = $info = $mem->get_info($where,'m_bankname,m_bankaccount,m_money,m_income');
        $info['w_type']=input('param.w_type');
        $info['m_bankaccount'] = substr($info['m_bankaccount'] ,-4,4);
        $config = new ConfigService();
        $info['fee1'] = $config ->configGetValue(['c_code'=>'DRAW_FEE1'],'c_value');
        $info['fee2'] = $config ->configGetValue(['c_code'=>'DRAW_FEE2'],'c_value');
        $this->response_data($info);
    }
    //提现申请
    public function with_draw(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        if(empty($this->data['frozen']))
        {
            $this->response_error("提现资金不能为空");
        }
        $frozen=$this->data['frozen'];
        if(empty($this->data['w_type']))
        {
            $this->response_error("提现类型不能为空");
        }
        $w_type=$this->data['w_type'];
        if(empty($this->data['m_payment_pwd']))
        {
            $this->response_error("支付密码不能为空");
        }
        $m_payment_pwd=$this->data['m_payment_pwd'];
        if(empty($this->data['is_urgent']))
        {
            $this->response_error("是否加急");
        }
        $bank_number = $this->data['bank_number'];//银行卡号
        if(empty($bank_number)){
            $this->response_error("提现银行卡号不能为空");
        }
        $is_urgent=$this->data['is_urgent'];
        $mem = new MemberService();
        $data = [
                'frozen'        => trim($frozen),
                'w_type'        => trim($w_type),
                'm_payment_pwd' => trim($m_payment_pwd),
                'is_urgent' => trim($is_urgent),
            ];
         $res = $mem->withdraw_money($m_id,$data);
//        print_r($res);die();
        if($res['status'] == 0){
            $this->response_error($res['msg']);
        }
        if($res['status'] == 1){
            $this->response_data("提现成功");
        }

    }

    //花生记录页面
    public function peanut_log_page(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data=array();
        if(empty($this->data['member_id']))
        {
            $this->response_error("没有登录参数");
        }
        $m_id=$this->data['member_id'];
        $where = [
            'm_id'=>$m_id
        ];
        $member = new MemberService();
        //现有花生
        $peanut = $member->get_info($where,'peanut');
        $info['peanut'] = empty($peanut['peanut']) ? 0 : $peanut['peanut'];
        $peanut_log = new PeanutLogService();
        $where = [
            'pl_mid'=>$m_id,
            'pl_state'=>8,
            'pl_type'=>'add',
        ];
        //总花生
        $info['total_peanut'] = $peanut_log->get_value($where,'sum(pl_num)');
        $info['total_peanut'] = sprintf("%.2f",$info['total_peanut']);
        //抵用
        $info['spend_peanut'] = sprintf("%.2f",$info['total_peanut'] - $info['peanut']);
        $this->response_data($info);
    }

    //花生记录
    public function peanut_log()
    {
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
        }
        $data = array();
        if (empty($this->data['member_id'])) {
            $this->response_error("没有登录参数");
        }
        $mem = new MemberService();
        $m_id = $this->data['member_id'];
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size = 4;
        } else {
            $page_size = $this->data['pagenum'];
        }
        if (empty($this->data['pl_type'])) {
            $pl_type = "";
        } else {
            $pl_type = $this->data['pl_type'];
        }
        $peanut_log = new PeanutLogService();
        $where2 = [
            'pl_mid' => $m_id,
            'pl_state' => 8,
        ];
        switch ($pl_type) {
            case 'add':
                $where2['pl_type'] = $pl_type;
                break;
            case 'reduce':
                $where2['pl_type'] = $pl_type;
                break;
        }
        $list['list'] = $peanut_log->get_limit($where2, 'pl_time asc', '*', $page, $page_size);
        $lists['list'] = array();
        //整合成新的数组
        $add_money = 0;
        $reduce_money = 0;
//            dump($list);
        $lists['list'] = array();
        foreach ($list['list'] as $k => $v) {
            $v['date_pl_time'] = date('Y-m-d', $v['pl_time']);
            $v['month'] = date('Y-m', $v['pl_time']);
            $lists['list'][] = $v;
            $date = $v['month'];
            $month_begin_date = $date . "-01";

            $start_time = strtotime($month_begin_date); //月初时间
            $next_month_begin_date = date('Y-m-d H:i:s', strtotime("$month_begin_date +1 month") - 1);    //月底时间
            $ent_time = strtotime($next_month_begin_date);
            $where = [
                'pl_mid' => $m_id,
                'pl_time' => ['between time', [$start_time, $ent_time]],
                'pl_state' => 8
            ];
//
            if (!isset($time[$v['month']])) {
                //第一次设置此变量(值无意义)
                $time[$v['month']] = '第一次才会设置此变量';
                $where['pl_type'] = 'add';
                $add_money = $peanut_log->get_value($where, 'sum(pl_num)');
                $lists['list'][$k]['add_price'] = $add_money ? $add_money : 0;
                $where['pl_type'] = 'reduce';
                $reduce_money = $peanut_log->get_value($where, 'sum(pl_num)');
                $lists['list'][$k]['reduce_money'] = $reduce_money ? $reduce_money : 0;
                $time[$v['month']] = '';
            } else {
                $lists['list'][$k]['add_price'] = $add_money ? $add_money : 0;
                $lists['list'][$k]['reduce_money'] = $reduce_money ? $reduce_money : 0;
            }
        }
        //日期下标重新变为数字下标
        $list['list'] = $lists['list'];
        $total_num = $peanut_log->get_Count($where2);
        $total_page = ceil($total_num / $page_size);
        $page_count =$total_page;
        $pagelist=$this->app_page($page_count);
        $this->response_data($list,$pagelist);
    }
    //我的主页数据
    public function my_index(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $m_id=$this->data['member_id'];
        $mem = new MemberService();
        $where = [
            'm_id'=>$m_id
        ];
        //收藏商品数量
        $goods_collection = new GoodsCollectionService();
        $g_c_num = $goods_collection->collection_num($where);
        //关注店铺数量
        $store_collection= new StoreCollectionService();
        $s_c_num = $store_collection->get_count($where);
        //足迹数量
        $visit_goods_history = new VisitGoodsHistoryService();
        $v_g_h_num = $visit_goods_history->get_count($where);
        //商家id
        $store =  new StoreService();
        $store_id = $store->get_value($where,'store_id');
        $store_name = $store->get_value($where,'stroe_name');
        $goods = new GoodsService();
        $where2 = [
            'g_mid'=>$m_id,
            'g_state'=>['in',[2,4,6,8,9]]
        ];
        $goods_list = array();
        if($store_id){
            $goods_list = $goods->get_limit_list($where2,'g_addtime desc','g_id,g_img',1,4);
            foreach($goods_list as &$g){
                if(!empty($g['g_img'])){
                    $newg_img = $g['g_img'];
                    unset($g['g_img']);

                    $g['g_img'] = PAIYAYA_URL.$newg_img;
                }
            }
            $goods_list = [
                'list'=>$goods_list,
                'len'=>count($goods_list)
            ];
        }
        //用户信息
        $data = $mem->get_info($where,"m_name,m_avatar,m_type,m_payment_pwd,m_levelid");
        if(!empty($data['m_avatar'])){
            $m_avatar = $data['m_avatar'];
            unset($data['m_avatar']);
            $data['m_avatar'] = PAIYAYA_URL.$m_avatar;
        }
        $member_level = new MemberLevelService();
        //用户等级头像
        $where2 = [
            'ml_id'=>$data['m_levelid']
        ];
        $data['ml_img'] = $member_level->get_value($where2,'ml_img');//用户等级图片
        if(!empty($data['ml_img'])){
            $ml_img = $data['ml_img'];
            unset($data['ml_img']);
            $data['ml_img'] = PAIYAYA_URL.$ml_img;
        }
        //是否设置支付密码
        $data['m_payment_pwd'] = $data['m_payment_pwd'] ?  true :false;
        //待付款/
        $where3 = [
            'o_state' => ['in','1,2,3,4'],
            'm_id' => $m_id
        ];
        $orderpai = new OrderPaiService();
        $order = $orderpai->get_group_count($where3,'count(*)num,o_state','o_state');
        $order = array_column($order,'num','o_state');
        $config = new ConfigService();
        $where4 = [
            'c_code'=>'PO_UNPAID',
        ];
        $c_value = $config->configGetValue($where4,'c_value');

        $time = $c_value * 60 * 60;
        $where3 = [
            'o_paystate' =>1,
            'o_addtime' =>['>=',time()-$time],
        ];
        $o_paystate = $orderpai->orderPaiInfo($where3,'count(*)num');
        //拍吖吖订单2018-9-22开始
        $order_payment_where = ['m_id'=>$m_id,'o_paystate'=>1,'o_isdelete'=>1];
        $order_payment_where['o_addtime'] = ['gt',(time() - $time)];
        $order_payment_count = Db('order_pai')->where($order_payment_where)->count();//拍吖吖待付款数量
        $order_conduct_count = Db('order_pai')->where(array('o_paystate'=>2,'o_state'=>1,'m_id'=>$m_id))->count();//拍吖吖进行中数量
        $pending_where = ['m_id'=>$m_id];
        $pending_where['o_paystate'] = ['gt',1];
        $pending_where['o_state'] = ['in','2,3'];
        $pending_delivery_count = Db('order_pai')->where($pending_where)->count();//拍吖吖待发货数量
        $to_evaluate_where = ['m_id'=>$m_id,'o_state'=>4];
        $to_evaluate_where['o_paystate'] = ['gt',1];
        $to_evaluate_count = Db('order_pai')->where($to_evaluate_where)->count();//拍吖吖待评价数量
        $all_my_order = Db('order_pai')->where('m_id',$m_id)->count();//拍吖吖我的所有订单数量
        //拍吖吖订单2018-9-22结束
        //人气购订单2018-9-22开始
        $pm_payment_where = ['m_id'=>$m_id,'pm_paystate'=>1,'pm_isdelete'=>1];
        $pm_payment_where['add_time'] = ['gt',(time() - $time)];
        $pm_payment_count = Db('popularity_member')->where($pm_payment_where)->count();//人气拍待付款数量
        $pm_conduct_count = Db('popularity_member')->where(array('pm_paystate'=>2,'pm_state'=>1,'m_id'=>$m_id))->count();//人气拍进行中数量
        $pm_pending_where = ['m_id'=>$m_id];
        $pm_pending_where['pm_paystate'] = ['gt',1];
        $pm_pending_where['pm_state'] = ['in','2,3'];
        $pm_pending_count = Db('popularity_member')->where($pm_pending_where)->count();//人气拍待发货数量
        $pm_evaluate_where = ['m_id'=>$m_id,'pm_state'=>4];
        $pm_evaluate_where['pm_paystate'] = ['gt',1];
        $pm_evaluate_count = Db('popularity_member')->where($pm_evaluate_where)->count();//人气拍待评价数量
        $pm_all_my_order = Db('popularity_member')->where('m_id',$m_id)->count();//人气拍我的所有订单数量
        //人气购订单2018-9-22结束
        $data['goods_collection']       = $g_c_num;
        $data['store_collection']       = $s_c_num;
        $data['visit_goods_history']    = $v_g_h_num;
        $data['store_id']               = $store_id;
        $data['store_name']               = $store_name;
        $data['goods']               = $goods_list;
        $data['order']=$order;
        $data['o_paystate']=$o_paystate;
        $data['pai_payment_count'] = $order_payment_count;//拍吖吖待付款数量
        $data['pai_conduct'] = $order_conduct_count;//拍吖吖进行中数量
        $data['pai_delivery'] = $pending_delivery_count;//拍吖吖待发货数量
        $data['pai_evaluate_count'] = $to_evaluate_count;//拍吖吖待评价数量
        $data['pai_all_order'] = $all_my_order;//拍吖吖我的所有订单数量
        $data['pm_payment_count'] = $pm_payment_count;//人气拍待付款数量
        $data['pm_conduct_count'] = $pm_conduct_count;//人气拍进行中数量
        $data['pm_pending_count'] = $pm_pending_count;//人气拍待发货数量
        $data['pm_evaluate_count'] = $pm_evaluate_count;//人气拍待评价数量
        $data['pm_all_my_order'] = $pm_all_my_order;//人气拍我的所有订单数量
        $this->response_data($data);
    }
    //添加充值订单
    public function addpayorder(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        if(empty($this->data['member_id']))
        {
            $this->response_error("用户登录ID没有");
        }
        $m_id=$this->data['member_id'];
        if(empty($this->data['r_money']))
        {
            $this->response_error("充值金额不能为空");
        }
        $r_money = $this->data['r_money'];
        if(empty($this->data['r_type']))
        {
            $this->response_error("充值方式不能为空");
        }
        $r_type =$this->data['r_type'];
        if(empty($this->data['r_for']))
        {
            $this->response_error("充值用途不能为空");
        }
        $r_for = $this->data['r_for'];
        if(!empty($this->data['r_jump_type']))
        {
            $r_jump_type = $this->data['r_jump_type'];
        }
        else{
            $r_jump_type =0;
        }
        if(!empty($this->data['r_jump_id']))
        {
            $r_jump_id =$this->data['r_jump_id'];
        }
        else{
            $r_jump_id =0;
        }

        $data = [
            'm_id'=>$m_id,
            'r_time'=>time(),
            'r_state'=>1,
            'r_type'=>$r_type,
            'r_money'=>$r_money,
            'r_type_code'=>$r_type,
            'r_for'=>$r_for,
            'r_jump_type'=>$r_jump_type,
            'r_jump_id'=>$r_jump_id,
        ];
        $r_type_code='';
        switch ($r_type){
            case 1:
                $r_type_code = 'wxpay';
                break;
            case 2:
                $r_type_code = 'wxh5pay';
                break;
            case 3:
                $r_type_code = 'alih5pay';
                break;
            case 4:
                $r_type_code = 'bankpay';
                break;
            case 5:
                $r_type_code = 'yuepay';
                break;
            case 6:
                $r_type_code = 'appwxpay';
                break;
            case 7:
                $r_type_code = 'appalipay';
                break;
            default:
                $r_type_code = 'wz';
                break;
        }
        if(!in_array($r_type,[1,2,3,4,5,6,7])){
            $this->response_error("请选择支付类型");
        }
        if(!in_array($r_for,[1,2,3,4,5])){
           $this->response_error("请选择充值用途");
        }
        if(!is_numeric($r_money) || $r_money <= 0){
           $this->response_error("充值金额为大于0的数字类型");
        }
        $data['r_type_code']=$r_type_code;
        $recharge = new RechargeService();
        $o_id = $recharge->get_add_id($data);
        if(empty($o_id)){
           $this->response_error("充值订单生成失败");
        }
        else{
            $data=array();
            $data['r_id']=$o_id;
            $this->response_data($data);
        }
    }

    /**
     * 会员修改成为商家信息
     */
    public function edit_application()
    {
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
        }
        if (empty($this->data['member_id'])) {
            $this->response_error("用户登录ID没有");
        }
        $m_id = $this->data['member_id'];
        $where = [
            'm_id' => $m_id
        ];
        $mem = new MemberService();
        $info = $mem->get_info($where, 'm_type');
        if ($info['m_type']) {
            $this->response_error("您已经是商家");
        }
        if (empty($this->data['ba_stroe_name'])) {
            $this->response_error("店铺名称不能为空");
        }
        $data['ba_stroe_name'] = $this->data['ba_stroe_name'];
        if (empty($this->data['corporation_name'])) {
            $this->response_error('企业名不能为空');
        }
        $data['corporation_name'] = $this->data['corporation_name'];
        if (empty($this->data['address'])) {
            $this->response_error('地址不能为空');
        }
        $data['address'] = $this->data['address'];
        if (empty($this->data['ba_bankname'])) {
            $this->response_error('开户银行名不能为空');
        }
        if (empty($this->data['ba_bankaccount'])) {
            $this->response_error('银行卡号不能为空');
        }
        $data['ba_bankaccount'] = $this->data['ba_bankaccount'];
        //企业手机或座机验证
        $isMob = "/^1[34578]{1}\d{9}$/";
        $isTel = "/^([0-9]{3,4}-)?[0-9]{7,8}$/";
        if (!empty($this->data['store_tel'])) {
            if (!preg_match($isMob, $this->data['store_tel']) && !preg_match($isTel, $this->data['store_tel'])) {
                $this->response_error('请输入正确的手机号或座机号');
            }
            $data['store_tel'] = $this->data['store_tel'];
        }
        //法人姓名
        if (!empty($this->data['ba_legal_person'])) {
            $naeme_len = strlen($this->data['ba_legal_person']);
            if ($naeme_len > 15) {
                $this->response_error('请输入1-15的正确姓名');
            }
            $data['ba_legal_person'] = $this->data['ba_legal_person'];
        }

        //身份证验证
        if (!empty($this->data['ba_legal_person_idnumber'])) {
            $len = strlen($this->data['ba_legal_person_idnumber']);
            if ($len == 15) {
                $isIDCard1 = "/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/";
                $is = preg_match($isIDCard1, $this->data['ba_legal_person_idnumber']);
                if (!$is) {
                    $this->response_error("身份证不合法1");
                }
            } else if ($len == 18) {
                $isIDCard2 = "/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/";
                $is = preg_match($isIDCard2, $this->data['ba_legal_person_idnumber']);
                if (!$is) {
                    $this->response_error("身份证不合法2");
                }
            } else {
                $this->response_error('身份证不合法3');
            }
            $data['ba_legal_person_idnumber'] = $this->data['ba_legal_person_idnumber'];
        }
        //验证企业名称是否已经注册
        $where = [
            'corporation_name' => $this->data['corporation_name'],
            'm_id' => ['<>', $m_id]
        ];
        $admitService = new AdmitService();
        $is_mid = $admitService->vdRegister($where);//检测企业名是否已经注册
        if ($is_mid) {
            $this->response_error("此企业名称已注册");
        }
        $data['ba_identification_positive_img'] = request()->file('ba_identification_positive_img');
        $data['ba_identification_negative_img'] = request()->file('ba_identification_negative_img');
        $data['ba_license_img'] = request()->file('ba_license_img');
        $res = $admitService->upApplication($m_id, $data);
        if ($res['status'] == 1) {
            $ret=array();
            $ret['msg']=$res['msg'];
            $this->response_data($ret);
        } else {
            $this->response_error($res['msg']);
        }
    }

    /**
     * 检测是否是否为第一次注册奖励
     * 邓赛赛
     */
    public function check_register_reward(){
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
        }
        if (empty($this->data['member_id'])) {
            $this->response_error("用户登录ID没有");
        }
        $m_id = $this->data['member_id'];
        //检测是否为第一次领取
        $member = new MemberService();
        $res = $member->check_app_reward($m_id);
        $this->response_data($res);
    }

    /**
     * app第一次领取奖励
     * 邓赛赛
     */
    public function add_register_reward(){
        $res = $this->checktoken();
        if ($res['state'] != '1') {
            $this->response_error($res['msg']);
        }
        if (empty($this->data['member_id'])) {
            $this->response_error("用户登录ID没有");
        }
        $m_id = $this->data['member_id'];
        //充值金额
        //最大充值金额
        $config = new ConfigService();
        $where = [
            'c_code'=>'FIRST_MONEY'
        ];
        $max_money = $config->configGetValue($where,'c_value');
        if(empty($max_money)){
            $max_money = 10;
        }
        //是否有资格领取
        $member = new MemberService();
        $check = $member->check_app_reward($m_id);

        if($check['status'] == 1){
            $member = new MemberService();
            //领取奖励
            $res = $member->first__register_reward($m_id,$max_money);
        }else{
            $res = [
                'status'=>3,
                'msg'   =>'第一次才可领取奖励哦',
            ];

        }
        $this->response_data($res);
    }

//    /**
//     * 检测注册领取
//     * 邓赛赛
//     */
//    public function check_app_reward($m_id){
//        $where = [
//            'm_id'        => $m_id,
//            'ml_reason_id'=> 5,
//            'ml_type'     => 'add',
//        ];
//        $m_log = new MoneyLogService();
//        //统计是否可领取
//        $is_reward = $m_log->get_count($where);
//        $is_reward = $is_reward ? 2 : 1;
//        $msg       =  $is_reward == 2 ? '不可领取奖励' : '可领取奖励';
//        $res = [
//            'status'=>$is_reward,
//            'msg'   =>$msg
//        ];
//        return $res;
//    }

    /*
     * zwb
     * 2018-10-13个人资料信息
     */
    public function get_m_detail(){
        $memberservice=new MemberService();
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $m_id = $this->data['member_id'];
        $where['m_id']=$m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $member_list = $memberservice->get_info($where,$field="m_name,m_avatar,m_sex,m_mobile,tj_mid");//查找个人信息
        if(!empty($member_list['m_mobile'])){
            $mobile = $memberservice->decrypt($member_list['m_mobile']);
            $mobile = htmlspecialchars($mobile);
        }else{
            $mobile = "";
        }
        if(!empty($member_list['tj_mid'])){//查找推荐人手机号
            $where2 = [
                'm_id'=>$member_list['tj_mid']
            ];
            $tj_mobile = $memberservice->get_value($where2,'m_mobile');
            $tj_mobile = $memberservice->decrypt($tj_mobile);
            if($tj_mobile){
                $member_list['tj_mobile'] = $tj_mobile;
            }else{
                $member_list['tj_mobile'] = "-1";
            }
        }else{
            $member_list['tj_mobile'] = "-1";
        }
        $is_attestation = Db('member_attestation')->where($where)->count();//判断是否已实名认证
        $return_data = array(
            'm_name'=>$member_list['m_name'],
            'm_sex'=>$member_list['m_sex'],
            'm_mobile'=>$mobile,
            'tj_mobile'=>$member_list['tj_mobile'],
        );

        if(!empty($member_list['m_avatar'])){
            $return_data['m_avatar'] = PAIYAYA_URL.$member_list['m_avatar'];
        }else{
            $return_data['m_avatar'] = "";
        }
        if(!empty($is_attestation)){
            $return_data['is_attestation'] = 2;//已实名认证
        }else{
            $return_data['is_attestation'] = 1;//未实名认证
        }
        $this->response_data($return_data);
    }
    /*
     * zwb
     * 2013-10-13修改推荐人
     */
    public function change_tj_mid(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $m_id = $this->data['member_id'];
        $where['m_id']=$m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $member_tj_mid = Db('member')->where($where)->value('tj_mid');
        if(!empty($member_tj_mid)){
            $this->response_error("您已经有推荐人了,不能再次修改");
        }
        $tj_mobile = $this->data['tj_mobile'];//推荐人手机号
        if(empty($tj_mobile)){
            $this->response_error("推荐人手机号码不能为空");
        }
        $BaseService = new BaseService();
        $is_phone = $BaseService->is_phone($tj_mobile);//检测手机号码格式
        if($is_phone){
            $this->response_error($is_phone['msg']);
        }
        $tui_m_mobile = $BaseService->encrypt($tj_mobile);
        $tui_where['m_mobile'] = $tui_m_mobile;
        $tui_m_id = Db('member')->where($tui_where)->value('m_id');//推荐人id
        if($m_id == $tui_m_id){
            $this->response_error('您不能成为自己的推荐人');
        }
        if($tui_m_id){
            $res = Db('member')->where($where)->update(['tj_mid'=>$tui_m_id]);
            if($res){
                $this->response_data('修改推荐人成功');
            }else{
                $this->response_error('修改推荐人失败');
            }
        }else{
            $this->response_error('无法找到该手机号码所对应的推荐人');
        }
    }
    /*
     * zwb
     * 2018-10-13绑定提现银行卡并且实名认证
     */
    public function bankcard_sm(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $where['m_id'] = $m_id;
        $info = Db('member')->where($where)->field('m_bankowner,m_bank_phone,m_bankaccount,m_identification')->find();
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
        if(empty($data['bank_branch'])){
            $this->response_error('开户行支行不能为空');
        }
        //开启事务
        Db::startTrans();
        try{
            $sms = new SmsService();//此处检测短信验证是否正确
            $res = $sms->checkSmsCode($data['verification'],$data['m_bank_phone']);
            if($res['status']!=1){
                $this->response_error($res['msg']);
            }
            $AliService = new AliService();
            $return_list_ty = $AliService->bank_check($data['m_bankaccount'],$data['m_identification'],$data['m_bank_phone'],$data['m_bankowner']);
            if($return_list_ty['status'] != 01){
                $this->response_error($return_list_ty['msg']);
            }
            $sex = $return_list_ty['sex'] == '女' ? 1 : 2;
            $update['m_id'] = $m_id;
            $update['real_name'] = $return_list_ty['name'];
            $update['identification'] = $return_list_ty['idCard'];
            $update['add_time'] = time();
            $update['area'] = $return_list_ty['area'];
            $update['province'] = $return_list_ty['province'];
            $update['city'] = $return_list_ty['city'];
            $update['prefecture'] = $return_list_ty['prefecture'];
            $update['birthday'] = strtotime($return_list_ty['birthday']);
            $update['addrCode'] = $return_list_ty['addrCode'];
            $update['sex'] = $sex;
            $update['bankowner'] = $return_list_ty['name'];
            $update['bankname'] = $return_list_ty['bank'];
            $update['bankaccount'] = $return_list_ty['accountNo'];
            $update['bank_phone'] = $return_list_ty['mobile'];
            $update['bank_branch'] = $data['bank_branch'];
            $is_shiming = Db('member_attestation')->where($where)->find();
            if(empty($is_shiming)){
                $attestation = Db('member_attestation')->insert($update);//插入实名认证表
            }else{
                $save_attestation = Db('member_attestation')->where($where)->update($update);//修改实名认证表
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
                'm_bank_branch'=>$data['bank_branch'],
            );
            $list = Db('member')->where($where)->update($array);//修改pai_member表
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
    /*
     * zwb
     * 2018-10-13钱包余额明细
     */
    public function fine_balance(){
        $money = new MoneyLogService();
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data = $this->data;
        $m_id = $this->data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $where['m_id'] = $m_id;
        $ml_type    = $data['ml_type'];  //add 收入  reduce支出
        if(empty($ml_type)){
            $this->response_error('余额类型不能为空');
        }
        $money_type = $data['money_type'];//1余额 2收益
        $page = $data['page'] ? $data['page'] : 1;//显示页数
        $page_size = $data['page_size'] ? $data['page_size'] : 10;//显示条数
        $where=[
            'm_id'=>$m_id,
            'money_type'=>$money_type,
            'ml_type'=>$ml_type,
        ];
        if($ml_type == 1){
            unset($where['ml_type']);
        }
        $list = $money->get_list($where,'ml_id desc','ml_id,ml_type,ml_table,ml_reason,add_time,state,ml_money,nickname,position,member_type,card_number',$page,$page_size);
        $this->response_data($list);
    }
    /*
     * zwb
     * 2018-10-13账户余额主页
     */
    public function get_m_moneys(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        $m_id = $this->data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $memberservice=new MemberService();
        $where['m_id'] = $m_id;
        $field="m_money,m_frozen_money,m_income,m_frozen_income,m_levelid";
        $info=$memberservice->get_info($where,$field);

        $startTime = strtotime(date("Y-m-d"))-86400;
        $endTime = strtotime(date("Y-m-d"))-1;
        $where2 = [
            'i_time'=>['between time',[$startTime,$endTime]],
            'm_id'  =>$m_id,
            'i_state'=>8
        ];
        $income = new IncomeService();
        $last_money = $income->get_value($where2,'sum(i_money)');
        unset($where2['i_time']);
        $total_money = $income->get_value($where2,'sum(i_money)');
        $info['last_money']    = sprintf("%.2f",$last_money);
        $info['total_money']   = sprintf("%.2f",$total_money);
        switch ($info['m_levelid']){//上级等级
            case 2:
                $sjrate = 0.00015;
                break;

            case 3:
                $sjrate = 0.0002;
                break;
            case 4:
                $sjrate = 0.00035;
                break;
            default:
            case 1:
                $sjrate = 0.0001;
                break;
        }
        $info['rate'] = sprintf("%.2f",$sjrate*10000);
        $this->response_data($info);
    }
    /*
     * zwb
     * 2018-10-13我的银行卡
     */
    public function my_bankcard(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        $m_id = $this->data['member_id'];//用户id
        $where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $bank_list = Db('member_attestation')->where($where)->field('bankname,bankaccount')->select();
        $count = count($bank_list);
        if(!empty($count)){
            foreach($bank_list as &$value){
                $value['bank_img'] = PAIYAYA_URL."/static/image/wallet/icon_yinlian@2x.png";
            }
            $this->response_data($bank_list);
        }else{
            $array = array(
                'bankname'=>'',
                'bankaccount'=>'',
                'bank_img'=>PAIYAYA_URL."/static/image/wallet/icon_yinlian@2x.png",
            );
            $this->response_data($array);
        }
    }
    /*
     * zwb
     * 2018-10-13我的花生
     */
    public function peanut(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $page = $data['page'] ? $data['page'] : 1;//显示页数
        $page_size = $data['page_size'] ? $data['page_size'] : 10;//显示条数
        $pl_type = $data['pl_type'];//增加add 减少 reduce 1全部

        $peanut_log = new PeanutLogService();
        $where2 = [
            'pl_mid'=>$m_id,
            'pl_state'=>8,
        ];
        switch($pl_type){
            case 'add':
                $where2['pl_type'] = $pl_type;
                break;
            case 'reduce':
                $where2['pl_type'] = $pl_type;
                break;
        }
        $list['list'] = $peanut_log->get_limit($where2,'pl_time desc','*',$page,$page_size);
        $lists['list'] = array();
        //整合成新的数组
        $add_money = 0;
        $reduce_money = 0;
        foreach($list['list'] as $k => $v){
            $v['date_pl_time'] = date('Y-m-d',$v['pl_time']);
            $v['month'] = date('Y-m',$v['pl_time']);
            $lists['list'][] = $v;
            $date = $v['month'];
            $month_begin_date = $date . "-01";

            $start_time = strtotime($month_begin_date); //月初时间
            $next_month_begin_date = date('Y-m-d H:i:s', strtotime("$month_begin_date +1 month")-1);    //月底时间
            $ent_time = strtotime($next_month_begin_date);
            $where = [
                'pl_mid'=>$m_id,
                'pl_time'=>['between time',[$start_time,$ent_time]],
                'pl_state'=>8
            ];
//
            if(!isset($time[$v['month']])){
                //第一次设置此变量(值无意义)
                $time[$v['month']] = '第一次才会设置此变量';
                $where['pl_type'] = 'add';
                $add_money = $peanut_log->get_value($where,'sum(pl_num)');
                $lists['list'][$k]['add_price'] = $add_money ? $add_money : 0;
                $where['pl_type'] = 'reduce';
                $reduce_money = $peanut_log->get_value($where,'sum(pl_num)');
                $lists['list'][$k]['reduce_money'] = $reduce_money ? $reduce_money : 0;
                $time[$v['month']] = '';
            }else{
                $lists['list'][$k]['add_price'] = $add_money ? $add_money : 0;
                $lists['list'][$k]['reduce_money'] = $reduce_money ? $reduce_money : 0;
            }
        }//日期下标重新变为数字下标
        $list['list'] = $lists['list'];
        $tmp_arr = array();
//        print_r($list['list']);die();
        foreach($list['list'] as $k=>$v){
            $tmp_arr[$v['month']]['head'] = $v['month'];
            $tmp_arr[$v['month']]['add_price'] = sprintf("%.2f",$v['add_price']);
            $tmp_arr[$v['month']]['reduce_money'] = sprintf("%.2f",$v['reduce_money']);
            $tmp_arr[$v['month']]['sublist'][] = $v;
        }
        $tmp_arr = array_values($tmp_arr);
        $new_arr['list'] = $tmp_arr;
//        print_r($new_arr);die();
        $total_num = $peanut_log->get_Count($where2);
        $total_page = ceil($total_num/$page_size);
        $new_arr['page'] = (int)$page;
        $new_arr['page_size'] = (int)$page_size;
        $new_arr['new_num'] = count($new_arr['list']);
        $new_arr['total_num'] = $total_num;
        $new_arr['total_page'] = $total_page;
        $where = [
            'm_id'=>$m_id
        ];
        $member = new MemberService();
        //现有花生
        $peanut = $member->get_info($where,'peanut');
        $new_arr['peanut'] = empty($peanut['peanut']) ? 0 : $peanut['peanut'];
        $peanut_log = new PeanutLogService();
        $where = [
            'pl_mid'=>$m_id,
            'pl_state'=>8,
            'pl_type'=>'add',
        ];
        //总花生
        $new_arr['total_peanut'] = $peanut_log->get_value($where,'sum(pl_num)');
        $new_arr['total_peanut'] = sprintf("%.2f",$new_arr['total_peanut']);
        //抵用
        $new_arr['spend_peanut'] = sprintf("%.2f",$new_arr['total_peanut'] - $new_arr['peanut']);
        $this->response_data($new_arr);
    }
    /*
     * zwb
     * 2018-10-19充值花生页面
     */
    public function recharge_peanut(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $m_where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $list = Db('member')->where($m_where)->field('m_money,peanut')->find();//查找余额跟花生
        $rate = round(1,2);
        $list = array(
            'm_money'=>!empty($list['m_money']) ? $list['m_money'] : 0.00,
            'peanut'=>!empty($list['peanut']) ? $list['peanut'] : 0.00,
            'rate'=>$rate,
        );
        $this->response_data($list);
    }
    /*
     * zwb
     * 2018-10-13我的评价列表
     */
    public function my_evaluation_list(){
        $member = new MemberService();
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $m_where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $member_list = Db('member')->where($m_where)->field('m_name,m_avatar')->find();//查找头像，昵称

        $info = $member->get_info($m_where);

        $review_order = new RevieworderService();
        $where = [];
        $where['m.m_id'] = $m_id;
        $where['ro.state'] = 0;
        $where['rg.state'] = 0;
        $order='ro.ro_id desc';
        $field='gp.gp_img,g.g_name,op.o_money,rg.rg_content,ro.add_time as ro_add_time,rg.rg_id,op.gp_num,s.store_id,gp.gp_id,g.g_id';
        $limit = '0,10';
        $list = $review_order->reviewOrderDetailLimitList($where,$order,$field,$limit);
        $return_data = array();
        $return_data['list'] = $list;
        $count_list = count($list);
        if(!empty($member_list['m_name'])){
            $list['m_name'] = $member_list['m_name'];
        }
        if(!empty($member_list['m_avatar'])){
            $list['m_avatar'] = PAIYAYA_URL.$member_list['m_avatar'];
        }
        $list['count_list'] = $count_list;

        $return_data['m_name'] = !empty($list['m_name']) ? $list['m_name'] : '';
        $return_data['m_avatar'] = !empty($list['m_avatar']) ? $list['m_avatar'] : '';
        $return_data['count_list'] = !empty($list['count_list']) ? $list['count_list'] : 0;
        $this->response_data($return_data);
    }
    /*
     * zwb
     * 2018-10-13人气购订单列表
     */
    public function getorderlist(){
        $member = new MemberService();
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $page = $data['page'] ? $data['page'] : 1;//显示页数
        $size = $data['page_size'] ? $data['page_size'] : 10;//显示条数
        $status = !empty($data['status']) ? $data['status'] : 0;//订单状态
        $keyword = !empty($data['keyword']) ? $data['keyword'] : '';//订单搜索关键字
        // 待支付订单保留时间
        $where['pm.m_id'] = $m_id;
        $where['pm.pm_paystate'] = ['gt',1];
        $where['pm.pm_isdelete'] = ['lt',2];
        if($keyword){
            $where['pg.pg_name'] = ['like','%'.$keyword.'%'];
        }

        //订单状态（新需求）
        switch ($status)
        {
            case 0:
                // 全部订单
                break;
            case 1:
                // 进行中
                $where['pm.pm_state'] = 2;
                break;
            case 2:
                // 待发货
                $where['pm.pm_state'] = 3;
                $where['pm.pm_order_status'] = 1;
                break;
            case 3:
                // 待收货
                $where['pm.pm_state'] = 3;
                $where['pm.pm_order_status'] = 2;
                break;
            case 4:
                // 已失败(未成团、未团中退款中、未团中退款完成)
                $where['pm.pm_paystate'] = ['in','2,3'];
                break;
            default:
                // 全部（我参团的）
                break;
        }
        $popularity = new PopularityService();
        $popularity_goods = new PopularityGoodsService();
        $order='pm.pm_id desc';
        $field = 'pm.pm_id,pm.m_id,pm.pm_state,pm.pm_periods,pm.pm_paystate,pm.add_time,pm.pm_paytime,pm.pm_popularity,pm.pg_id,pm.m_id,pm.m_id,pm.pm_addressid,pm.pm_order_status,pg.pg_name,pg.pg_market_price,pg.pg_price,pg.pg_membernum,pg.pg_state,pg.pg_img,pg.pg_type,pg.pg_spec,pg.pg_loser_point,pg.pg_sn';
        $limit = (($page-1) * $size).','.$size;
        $list = $popularity->get_pm_detail_limit_list($where,$order,$field,$limit);
        // 判断订单是否已经超出支付时间
        if(!empty($list)){
            foreach($list as $kk => $vv){
                // 4.人气排名
                $call_sort = $popularity->pm_sort_by_pmid($vv['pm_id']);
                if(!$call_sort['status']){
                    throw new \Exception($call_sort['msg']);
                }
                $pm_sort = $call_sort['data'];
                $list[$kk]['pm_sort'] = $pm_sort;

                // 如果没有pg_sn，给默认值
                if(empty($vv['pg_sn'])){
                    $list[$kk]['pg_sn'] = '2018001'.$vv['pg_id'];
                }

                // 获取二维码
                $list[$kk]['code']  = $popularity_goods->code($m_id,$vv['pg_id']);
                $list[$kk]['url']   = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/popularity/popularitygoods/new_people/pm_id/".$vv['pm_id'].'/pg_id/'.$vv['pg_id'].'?share=1';

                // 微信分享
                //微信分享参数
                $list[$kk]['share_title'] = '拍吖吖：只要¥'.$vv['pg_price'].'，你敢信？快跟我一起来抢购吧！';
                $list[$kk]['share_desc'] =$vv['pg_name'];
                $list[$kk]['share_link'] = PAI_URL.'/popularity/popularitygoods/new_people/pm_id/'.$vv['pm_id'].'/pg_id/'.$vv['pg_id'].'?share=1';
                $list[$kk]['share_imgUrl'] = PAI_URL.$vv['pg_img'];
                if(!empty($vv['pg_img'])){
                    $list[$kk]['pg_img'] = PAIYAYA_URL.$vv['pg_img'];
                }
                if(!empty($list[$kk]['code'])){
                    $list[$kk]['code'] = PAIYAYA_URL.$list[$kk]['code'];
                }
//                print_r($vv);die('555');
            }
        }
//        print_r($list);die('555');
        // 统计总条数
        $total_num = $popularity->get_pm_detail_count($where);
        $return_data = array();
        if(empty($list)){
            $return_data['status'] = 0;
            $return_data['msg'] = '没有数据';
            $return_data['data'] = $list;
            $return_data['total_num'] = $total_num;
            $this->response_error($return_data);
        }
        $return_data['status'] = 1;
        $return_data['msg'] = 'success';
        $return_data['data'] = $list;
        $return_data['total_num'] = $total_num;
        $this->response_data($return_data);
    }
    /*
    * zwb积分订单列表
    * 2018-10-31
    */
    public function point_orderlist(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $m_where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $page = $data['page'] ? $data['page'] : 1;//显示页数
        $size = $data['page_size'] ? $data['page_size'] : 10;//显示条数
        $status = !empty($data['status']) ? $data['status'] : 0;//订单状态
        $keyword = !empty($data['keyword']) ? $data['keyword'] : '';//订单搜索关键字
        // 待支付订单保留时间
        $res = Db("config")->where(['c_code'=>'PO_UNPAID'])->find();
        $max_pay_time = 24;
        if(!empty($res1)){
            $max_pay_time = $res['c_value'];
        }

        $where['po.m_id'] = $m_id;
        $where['po.o_isdelete'] = ['lt',3];
        if($keyword){
            $where['pg.g_name'] = ['like','%'.$keyword.'%'];
        }
        //订单状态（新需求）
        switch ($status)
        {
            case 0:
                // 全部
                break;
            case 1:
                // 待付款
                $where['po.o_paystate'] = 1;
                $where['po.o_isdelete'] = 1;
                $where['po.o_addtime'] = ['gt',(time() - $max_pay_time * 60 * 60)];
                break;
            case 2:
                // 进行中（参团中）
                $where['po.o_paystate'] = 2;
                $where['po.o_state'] = 1;
                break;
            case 3:
                // 待收货（待发货、待收货）
                $where['po.o_paystate'] = ['gt',1];
                $where['po.o_state'] = ['in','2,3'];
                break;
            case 4:
                // 待评价
                $where['po.o_paystate'] = ['gt',1];
                $where['po.o_state'] = 4;
                break;
            case 5:
                // 已失败（未成团、未团中退款中、未团中退款完成）
                $where['po.o_paystate'] = ['gt',2];
                $where['po.o_state'] = ['in','10,11'];
                break;
            default:
                // 全部（我参团的）
                break;
        }
        $pointOrderPai = new PointOrderPaiService();
        $order='po.o_id desc';
        $field='po.o_id,po.m_id,po.store_id,po.o_point,po.o_paystate,po.o_state,po.gp_id,po.gp_num,po.o_addtime,po.o_paytime,po.o_totalpoint,po.o_periods,po.o_isdelete,po.o_gp_settlement_price,po.gs_id,pgp.gp_market_price,pgp.g_id,
pgp.gp_img,pg.g_name,pg.g_endtime,s.stroe_name,s.store_logo,pg.g_img';
        $limit = (($page-1) * $size).','.$size;
        $list = $pointOrderPai->get_order_detail_limit_list($where,$order,$field,$limit);
        // 判断订单是否已经超出支付时间
        if(!empty($list)){
            $is_close = 0;
            foreach($list as $kk => $vv){
                $o_paystate = $vv['o_paystate'];
                $o_addtime = $vv['o_addtime'];

                $live_paytime = $o_addtime + 24 * 60 * 60 - time();
                if($live_paytime < 1){
                    $is_close = 1;
                }
                $list[$kk]['is_close'] = $is_close;
                $list[$kk]['live_paytime'] = $live_paytime;


                // 获取二维码
                $p_goods = new PopularityGoodsService();
                $mid = 2;
                $path_3 = '/uploads/code/pointpai/shop/'.$mid.'code_'.$vv['g_id'].".jpg";
                $list[$kk]['code']  = $p_goods->hebingImg('/uploads/logo/father.png',$vv['g_img'],$path_3,$vv['g_name'],$vv['o_point'],$mid,$vv['g_id']);
                $list[$kk]['url']   = PAI_URL."/pointpai/Pointgoods/index/g_id/".$vv['g_id'].'?share=1';

                // 微信分享
                //微信分享参数
                $list[$kk]['share_title'] = '拍吖吖：只要'.$vv['o_point'].'积分，你敢信？快跟我一起来抢购吧！';
                $list[$kk]['share_desc'] =$vv['g_name'];
                $list[$kk]['share_link'] = PAI_URL.'/pointpai/Pointgoods/index/g_id/'.$vv['g_id'].'?share=1';
                $list[$kk]['share_imgUrl'] = PAI_URL.$vv['gp_img'];
            }
        }
        // 统计总条数
        $total_num = $pointOrderPai->get_order_detail_count($where);
        if(empty($list)){
            $return_data = array(
                'status' => 0,
                'msg' => '没有数据',
                'data' => $list,
                'total_num'=>$total_num,
            );
        }else{
            $return_data = array(
                'status' => 1,
                'msg' => 'success',
                'data' => $list,
                'total_num'=>$total_num,
            );
        }
        $this->response_data($return_data);
    }
    /*
     * zwb
     * 2018-10-31获取推广员图片及链接
     */
    public function promoters(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $is_promoters = Db('promoters_apply')->where($where)->value('is_promoters');
        $return_data = array(
            'img'=>PAIYAYA_URL."/static/image/myhome/pic_tgy@2x.png",
        );
        if($is_promoters == null){
            $return_data['url'] = PAIYAYA_URL."/member/promoters/index";
        }elseif($is_promoters == 4 || $is_promoters == 3){
            $return_data['url'] = PAIYAYA_URL."/member/promoters/is_success";
        }elseif($is_promoters == 2){
            $return_data['url'] = PAIYAYA_URL."/member/promoters/is_apply_success";
        }
        $this->response_data($return_data);
    }
    /*
     * zwb
     * 2018-10-13删除人气订单
     */
    public function delete_popularity_order(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $order_id = $data['order_id'];//订单id
        if(empty($order_id)){
            $this->response_error('订单id不能为空');
        }
        $where['pm_id'] = $order_id;
        $popularity = new PopularityService();
        $call_back = $popularity->delete_pm($order_id,$m_id);
        if($call_back['status'] == 1){
            $this->response_data($call_back['msg']);
        }elseif($call_back['status'] == 0){
            $this->response_error($call_back['msg']);
        }
    }
    /*
     * zwb
     * 2018-11-01删除积分订单
     */
    public function delete_pointorder(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $order_id = $data['order_id'];//订单id
        if(empty($order_id)){
            $this->response_error('订单id不能为空');
        }
        $pointOrderPai = new PointorderPaiService();
        $call_back = $pointOrderPai->delete_order($order_id,$m_id);
        if($call_back['status'] == 1){
            $this->response_data($call_back['msg']);
        }elseif($call_back['status'] == 0){
            $this->response_error($call_back['msg']);
        }
    }
    /*
     * zwb
     * 2018-11-01取消积分订单
     */
    public function cancle_pointorder(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $order_id = $data['order_id'];//订单id
        if(empty($order_id)){
            $this->response_error('订单id不能为空');
        }
        $pointOrderPai = new PointorderPaiService();
        $call_back = $pointOrderPai->cancel_order($order_id,$m_id);
        if($call_back['status'] == 1){
            $this->response_data($call_back['msg']);
        }elseif($call_back['status'] == 0){
            $this->response_error($call_back['msg']);
        }
    }
    /*
     * zwb
     * 2018-11-01确认积分订单
     */
    public function confirm_pointorder(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $order_id = $data['order_id'];//订单id
        if(empty($order_id)){
            $this->response_error('订单id不能为空');
        }
        $pointOrderPai = new PointorderPaiService();
        $call_back = $pointOrderPai->confirm_ordergoods($order_id,$m_id);
        if($call_back['status'] == 1){
            $this->response_data($call_back['msg']);
        }elseif($call_back['status'] == 0){
            $this->response_error($call_back['msg']);
        }
    }
    /*
     * zwb
     * 2018-11-01积分订单详情
     */
    public function pointorder_detail(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $order_id = $data['order_id'];//订单id
        if(empty($order_id)){
            $this->response_error('订单id不能为空');
        }
        $j_type = !empty($data['j_type']) ? $data['j_type'] : 0;
        $pointOrderPai = new PointorderPaiService();
        $callback = $pointOrderPai->order_info_page($order_id);
        if (!$callback['status']) {
            return $callback['msg'];
        }
        $info = $callback['data'];
        $gp_id = $info['gp_id'];
        $o_periods = $info['o_periods'];
        $g_id = $info['g_id'];
        // 参团进度
        $rate = $pointOrderPai->get_orderpai_rate($gp_id, $o_periods);

        // 查询团中信息
        $pointOrderAwardcode = new PointOrderAwardcodeService();

        // 本期团中者信息
        $awardinfo = $pointOrderAwardcode->get_awards_mem($gp_id, $o_periods);

        // 我的幸运码
        $where['po.o_id'] = $info['o_id'];

        $myawards = $pointOrderAwardcode->getPointOrderAwards($where);

        // 订单退花生数量
        $refund_peanut = $pointOrderPai->get_refund_peanut($order_id);
        // 设置返回路径
        $header_path = '';
        if($j_type){
            //$header_path = "/pointpai/Pointgoods/index/g_id/".$info['g_id']."/o_id/".$o_id;
        }

        // 用户信息
        $member = new MemberService();
        $mem_info = $member->get_info(['m_id' => $m_id]);
        $syumem_info = $member->get_syumem_info(['m_id' => $m_id]);

        //分享二维码
        // 获取二维码( 问赛赛 TODO...
        $p_goods = new PopularityGoodsService();
        $mid = 2;
        $path_3 = '/uploads/code/pointpai/shop/'.$mid.'code_'.$g_id.".jpg";
        $info['code']  = $p_goods->hebingImg('/uploads/logo/father.png',$info['g_img'],$path_3,$info['g_name'],$info['o_point'],$mid,$g_id);
        $info['url']   = PAI_URL."/pointpai/Pointgoods/index/g_id/".$g_id.'?share=1';

        // 微信分享
        //微信分享参数
        $info['share_title'] = '拍吖吖：只要'.$info['o_point'].'积分，你敢信？快跟我一起来抢购吧！';
        $info['share_desc'] =$info['g_name'];
        $info['share_link'] = PAI_URL.'/pointpai/Pointgoods/index/g_id/'.$info['g_id'].'?share=1';
        $info['share_imgUrl'] = PAI_URL.$info['gp_img'];
        $this->response_data($info);
    }
    /*
     * zwb
     * 2018-11-01积分订单物流信息
     */
    public function pointorder_logistics(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $order_id = $data['order_id'];//订单id
        if(empty($order_id)){
            $this->response_error('订单id不能为空');
        }
        $pointOrderPai = new PointorderPaiService();
        $where['o_id'] = $order_id;
        $call_back = $pointOrderPai->order_logistics_info($where);
        if(!$call_back['status']){
            $this->response_error($call_back['msg']);
        }
        $info = $call_back['data'];
        $this->response_data($info);
    }
    /*
     * zwb
     * 2018-10-13人气订单退款详情
     */
    public function refund_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $popularity = new PopularityService();
        $pm_id = $data['pm_id'];
        if(empty($pm_id)){
            $this->response_error('人气购订单id不能为空');
        }
        $field = 'pm.*';
        $refund_info = $popularity->refund_info($pm_id,$field);
        $this->response_data($refund_info);
    }
    /*
     * zwb
     * 2018-10-13人气订单发货信息
     */
    public function pop_order_logistics(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $pm_id = $data['pm_id'];
        if(empty($pm_id)){
            $this->response_error('人气购订单id不能为空');
        }
        $is_seller = $data['is_seller'];//是否为卖家 1是，0不是
        $popularity = new PopularityService();
        $where['pm_id'] = $pm_id;
        $call_back = $popularity->logistics_info($where);
        if($call_back['status'] == 0){
            $this->response_error($call_back['msg']);
        }
        $info = $call_back['data'];
        if($info['m_id'] != $m_id){
            $is_seller = 1;
        }
        if(!empty($is_seller)){
            $info['is_seller'] = $is_seller;
        }
        $this->response_data($info);
    }
    /*
     * zwb
     * 2018-10-15人气订单确认收货
     */
    public function confirm_pm(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $pm_id = $data['pm_id'];
        if(empty($pm_id)){
            $this->response_error('人气购订单id不能为空');
        }
        $popularity = new PopularityService();
        $call_back = $popularity->confirm_pm($pm_id,$m_id);//确认收货方法
        if($call_back['status'] == 0){
            $this->response_error($call_back['msg']);
        }elseif($call_back['status'] == 1){
            $this->response_data($call_back['msg']);
        }
    }
    /*
     * zwb
     * 2018-10-15发表评价，获取人气订单商品图片
     */
    public function get_popuorder_pic(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $pm_id = $data['pm_id'];
        if(empty($pm_id)){
            $this->response_error('人气购订单id不能为空');
        }
        $pm_goods_id = Db("popularity_member")->where(['pm_id'=>$pm_id])->value('pg_id');//人气商品id
        if($pm_goods_id){
            $pic = Db('popularity_goods')->where('pg_id',$pm_goods_id)->value('pg_img');
            if($pic){
                $img = PAIYAYA_URL . $pic;
                $this->response_data($img);
            }else{
                $this->response_error('该人气商品没有图片');
            }
        }else{
            $this->response_error('没有该人气商品');
        }
    }
    /*
     * zwb
     * 2018-10-15人气订单发表评价
     */
    public function pm_evaluate(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;

    }
    /*
     * zwb
     * 2018-10-15人气订单详情
     */
    public function pm_order_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $pm_id = $data['pm_id'];
        if(empty($pm_id)){
            $this->response_error('人气购订单id不能为空');
        }
        $popularity = new PopularityService();
        $call_back = $popularity->order_info_page($pm_id);
        if(!$call_back['status']){
            $this->response_error($call_back['msg']);
        }
       if(!empty($call_back['data']['pg_img'])){
           $call_back['data']['pg_img'] = PAIYAYA_URL.$call_back['data']['pg_img'];
       }
        if(!empty($call_back['data']['last_joinner']['m_avatar'])){
            $call_back['data']['last_joinner']['m_avatar'] = PAIYAYA_URL.$call_back['data']['last_joinner']['m_avatar'];
        }
        if(!empty($call_back['data']['my_info']['m_avatar'])){
            $call_back['data']['my_info']['m_avatar'] = PAIYAYA_URL.$call_back['data']['my_info']['m_avatar'];
        }
        if(!empty($call_back['data']['code'])){
            $call_back['data']['code'] = PAIYAYA_URL.$call_back['data']['code'];
        }
        $this->response_data($call_back);
    }
    /*
     * zwb
     * 2018-10-15吖吖订单详情
     */
    public function ordinary_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $o_id = $data['o_id'];
        $j_type = !empty($data['j_type']) ? $data['j_type'] : 0;
        if(empty($o_id)){
            $this->response_error('订单id不能为空');
        }
        $orderpai = new OrderPaiService();
        $callback = $orderpai->order_info_page($o_id);
        if (!$callback['status']) {
            $this->response_error($callback['msg']);
        }
        if(!empty($callback['data']['m_avatar'])){
            $callback['data']['m_avatar'] = PAIYAYA_URL.$callback['data']['m_avatar'];
        }
        if(!empty($callback['data']['m_code'])){
            $callback['data']['m_code'] = PAIYAYA_URL.$callback['data']['m_code'];
        }
        if(!empty($callback['data']['tui_code'])){
            $callback['data']['tui_code'] = PAIYAYA_URL.$callback['data']['tui_code'];
        }
        if(!empty($callback['data']['store_license_img'])){
            $callback['data']['store_license_img'] = PAIYAYA_URL.$callback['data']['store_license_img'];
        }
        if(!empty($callback['data']['store_logo'])){
            $callback['data']['store_logo'] = PAIYAYA_URL.$callback['data']['store_logo'];
        }
        if(!empty($callback['data']['store_code'])){
            $callback['data']['store_code'] = PAIYAYA_URL.$callback['data']['store_code'];
        }
        if(!empty($callback['data']['gp_img'])){
            $callback['data']['gp_img'] = PAIYAYA_URL.$callback['data']['gp_img'];
        }
        if(!empty($callback['data']['g_img'])){
            $callback['data']['g_img'] = PAIYAYA_URL.$callback['data']['g_img'];
        }
        $this->response_data($callback);
    }
    /*
    * zwb
    * 2018-10-15人气订单好友点赞排行榜
    */
    public function pop_rank(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $pm_id = $data['pm_id'];
        if(empty($pm_id)){
            $this->response_error('人气购订单id不能为空');
        }
        $popularity = new PopularityService();
        $field = '*';
        $where['pm.pm_id'] = $pm_id;
        $info = $popularity->popgoods_info($where, $field);
        $page = $data['page'] ? $data['page'] : 1;//显示页数
        $size = $data['page_size'] ? $data['page_size'] : 10;//显示条数
        $call_back = $this->get_joinner_list($page,$size,$pm_id);
//        print_r($call_back);die();
        // 查询排名
        if(!empty($info)){
            $call_sort = $popularity->pm_sort_by_pmid($pm_id);
            $pm_sort = $call_sort['data'];
            $info['pm_sort'] = $pm_sort;

            //擂主二维码和待复制链接
            $popularityGoods = new PopularityGoodsService();
            if(!empty($info['pm_id'])){
                $info['challenger_code'] = $popularityGoods->code($info['m_id'],$info['pg_id']);
                $info['challenger_url'] = PAI_URL."/popularity/popularitygoods/new_people/pm_id/".$info['pm_id'].'/pg_id/'.$info['pg_id'].'?share=1';
            }

            $info['popularity_url'] = PAI_URL."/popularity/popularitygoods/new_people/pg_id/".$info['pg_id'].'?share=1';
            //详情页二维码
            $mid = 1;
            if($info['pg_type'] == 3){
                $mid = 6;
            }
            $path_3 = '/uploads/code/popularity/shop/'.$mid.'code_'.$info['pg_id'].".jpg";

            $info['popularity_code'] = $popularityGoods->hebingImg('/uploads/logo/father.png',$info['pg_img'],$path_3,$info['pg_name'],$info['pg_price'],$mid,$info['pg_id']);
        }
        $info['data_list']  = $call_back['data'];
        $this->response_data($info);
    }
    /**
     * 动态获取点赞列表
     * @return array
     */
    public function get_joinner_list($page,$size,$pm_id){
        $page = $page;
        $size = $size;
        $pm_id = $pm_id;//擂主id

        $order='pj.pj_num desc';
        $field='*';
        $limit = (($page-1) * $size).','.$size;
        $where['pj.pm_id'] = $pm_id;

        $popularity = new PopularityService();

        $joinner_count = $popularity->joinner_count($where);


        $joinner_list = $popularity->joinner_list($where, $field,$order,$limit);
        if(!empty($joinner_list)){
            return ['status'=>0,'msg'=>'empty!','data'=>$joinner_list,'total_num'=>$joinner_count];
        }else{
            return ['status'=>1,'msg'=>'ok!','data'=>$joinner_list,'total_num'=>$joinner_count];
        }
    }
    /*
    * zwb
    * 2018-10-15人气订单查看评价
    */
    public function evaluation_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $m_where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $member_list = Db('member')->where($m_where)->field('m_name,m_avatar')->find();//查找头像，昵称
        $o_id = $data['o_id'];
        if(empty($o_id)){
            $this->response_error('订单id不能为空');
        }
        $review_order = new RevieworderService();
        $where = [];
        $where['m.m_id'] = $m_id;
        $where['ro.state'] = 0;
        $where['rg.state'] = 0;
        $where['o_id'] = $o_id;
        $order='ro.ro_id desc';
        $field='gp.gp_img,g.g_name,op.o_money,rg.rg_content,ro.add_time as ro_add_time,rg.rg_id,op.gp_num,s.store_id,gp.gp_id,g.g_id';
        $limit = '0,10';
        $res = $review_order->reviewOrderDetailLimitList($where,$order,$field,$limit);
        $return_data = array();
        $return_data['list'] = $res;
        if(!empty($member_list['m_name'])){
            $return_data['m_name'] = $member_list['m_name'];
        }
        if(!empty($member_list['m_avatar'])){
            $return_data['m_avatar'] = PAIYAYA_URL.$member_list['m_avatar'];
        }
        $this->response_data($return_data);
    }
    /*
    * zwb收藏夹商品列表以及搜索功能
    * 2018-10-15
    */
    public function goods_list(){
        $collection = new GoodsCollectionService();
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $g_name = !empty($data['g_name']) ? $data['g_name'] : '';//搜索商品名称
        $m_where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $page = $data['page'] ? $data['page'] : 1;//显示页数
        $page_size = $data['page_size'] ? $data['page_size'] : 10;//显示条数
        $offset = ($page-1) * $page_size;
        $where=[
            'gc.m_id'=>$m_id
        ];
        if(!empty($g_name)){
            $where['g.g_name'] = ['like','%'.$g_name.'%'];
        }
        $order = 'gdr.g_id desc,gdr.gdr_price asc';
        $field = 'g.g_name,g.g_state,g.g_id,g.g_img,gdr.gdr_membernum,min(gdr.gdr_price) gdr_price,gdr.gdr_id,gdr.gdt_id,gp.gp_id,gp.gp_market_price';
        $list = array();
        $list['list'] = $collection->collectionPage($where,$order,$field,$offset,$page_size);
        $total_num = $collection->collection_num(['m_id'=>$m_id]);      //收藏总数量
        $total_page = ceil($total_num/$page_size);
        $list['page'] = $page;
        $list['page_size'] = $page_size;
        $new_num = count($list['list']);
        $list['new_num'] = $new_num;
        $list['total_num'] = $total_num;
        $list['total_page'] = $total_page;

        //推荐(当前页等于总页数和大于总页数时显示)
        if($page >= $list['total_page']){
            $where=[
                'g.is_tj'=>2,
                'g.g_state'=>6,
                'g.g_starttime'=>['<=',time()],
            ];
            $list['goods_tj'] = $collection->collection_tj($where,$order,$field);
        }
        $this->response_data($list);
    }
    /*
    * zwb删除收藏夹商品 单独删除及批量删除
    * 2018-10-15
    */
    public function delete_goods_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $collection = new GoodsCollectionService();
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $g_ids = $data['g_id'];//收藏商品id  以分号隔开的字符串形式传过来，有可能是一个，也有可能是多个
        if(empty($g_ids)){
            $this->response_error("要删除的商品不能为空");
        }
        Db::startTrans();//开启事务
        try{
            foreach($g_ids as $v){
                $where = [
                    'm_id' => $m_id,
                    'g_id' => $v,
                ];
                $is_true = $collection->collectionInfo($where);
                if($is_true){
                    $res = $collection->collectionDel($where);
                }else{
                    $this->response_error('取消关注失败');
                }
            }
            // 提交事务
            Db::commit();
            $return_data = array();
            $return_data['msg'] = "取消关注成功";
            $this->response_data($return_data);
        } catch(\Exception $e) {
            Db::rollback();
            $this->response_error('取消关注失败');
        }
    }
    /*
    * zwb收藏店铺列表及搜索
    * 2018-10-15
    */
    public function store_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        $store_name = !empty($data['store_name']) ? $data['store_name'] : '';//搜索店铺名称
        $m_where['m_id'] = $m_id;
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $page = $data['page'] ? $data['page'] : 1;//显示页数
        $page_size = $data['page_size'] ? $data['page_size'] : 10;//显示条数
        $collection = new StoreCollectionService();

        $where = [
            'sc.m_id'=>$m_id
        ];
        if(!empty($store_name)){
            $where['s.stroe_name'] = ['like','%'.$store_name.'%'];
        }
        $field = 's.stroe_name,s.store_id,s.store_logo';
        $list['list'] = $collection->store_all($where,$order='sc.sc_id desc',$field,$page,$page_size);
        $where2=[
            'm_id'=>$m_id
        ];
        $total_num = $collection->get_num($where2); //关注总数量
        $total_page = ceil($total_num/$page_size);
        $list['page'] = $page;
        $list['page_size'] = $page_size;
        $new_num = count($list['list']);
        $list['new_num'] = $new_num;
        $list['total_num'] = $total_num;
        $list['total_page'] = $total_page;
        //店铺推荐
        if($page == $list['page']){
            $store = new StoreService();
            $where2 = [
                'store_tj'=>[">",0],
                'store_state'=>0
            ];
            //推荐店铺
            $tj = $store->get_limit_list($where2,$order='add_time desc','store_id,stroe_name,store_logo',1,20);
            if($tj){
                //循环查出店铺三个商品
                foreach($tj as $k => $v){
                    $where2 = [
                        'g.g_storeid'=>$v['store_id'],
                        'g.g_state'=>6,
                        'g_endtime'=>['>',time()],
                    ];
                    $goods = Db::table('pai_goods')
                        ->alias('g')
                        ->join('pai_goods_dt_record gt','gt.g_id=g.g_id','left')
                        ->where($where2)
                        ->field('g.g_img,g.g_id,g.g_starttime,gt.gdr_id,gt.g_id gtrg_id,min(gdr_price) gdr_price')
                        ->group('gtrg_id')
                        ->order('g.g_id desc')
                        ->limit(3)
                        ->select();
                    $tj[$k]['goods'] = $goods;
                    if($goods){
                        //是否为最新商品(七天之内为最新)
                        foreach($goods as $kk => $vv){
                            $tj[$k]['goods'][$kk]['new_goods'] = (time() - $goods[$kk]['g_starttime'] < 86400*7) ? 1 : 2;
                        }
                    }
                }
            }
            $list['tj_list'] = $tj;
        }
        $this->response_data($list);
    }
    /*
    * zwb删除我收藏的店铺
    * 2018-10-16
    */
    public function delete_store_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $collection = new StoreCollectionService();
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $store_ids = $data['store_id'];//收藏商品id  以分号隔开的字符串形式传过来，有可能是一个，也有可能是多个
        if(empty($store_ids)){
            $this->response_error("要删除的店铺不能为空");
        }
        Db::startTrans();//开启事务
        try{
            foreach($store_ids as $v){
                $where = [
                    'm_id' => $m_id,
                    'store_id' => $v,
                ];
                $is_true = $collection->collectionInfo($where);
                if($is_true){
                    $res = $collection->collectionDel($where);
                }else{
                    $this->response_error('取消关注失败');
                }
            }
            // 提交事务
            Db::commit();
            $return_data = array();
            $return_data['msg'] = "取消关注成功";
            $this->response_data($return_data);
        } catch(\Exception $e) {
            Db::rollback();
            $this->response_error('取消关注失败');
        }
    }
    /*
    * zwb我的足迹列表
    * 2018-10-16
    */
    public function my_visit_list(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $page = $data['page'] ? $data['page'] : 1;//显示页数
        $page_size = $data['page_size'] ? $data['page_size'] : 4;//显示条数
        $visit_goods_history = new VisitGoodsHistoryService();
        $where=[
            'g.g_state'=>['in',6,8,9],
            'v.m_id'=>$m_id
        ];
        $field='g.g_name,g.g_id,g.g_state,g.g_img,gp.gp_market_price,gp.gp_id,v.m_id,v.vgh_id,v.visit_time';
        $list['list'] = array();
        $list = $visit_goods_history->get_limit_list($where, $order='v.vgh_id desc', $field, $page,$page_size);
//        print_r($list);die();
        if(!empty($list['list'])){
            foreach($list['list'] as &$v){
                if(!empty($v)){
                    foreach($v['info'] as $k => $g){
                        $v['info'][$k]["g_img"] = PAIYAYA_URL.$g['g_img'];
                    }
                }
            }
        }
        $this->response_data($list);
    }
    /*
    * zwb删除我的足迹列表 单独删除以及批量删除
    * 2018-10-16
    */
    public function del_visit(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $vgh_ids = $data['vgh_id'];//足迹商品id 一维数组格式 postman是以 vgh_id[] value=17678,17166
        $vgh_ids = implode(',',$vgh_ids);
        if(empty($vgh_ids)){
            $this->response_error("足迹商品id不能为空");
        }
        $where = [
            'm_id'=>$m_id,
            'vgh_id'=>['in',$vgh_ids]
        ];
        $visit = new VisitGoodsHistoryService();
        $res = $visit -> del($where);
        if($res){
            $return_data['msg'] = "删除成功";
            $this->response_data($return_data);
        }else{
            $this->response_error("删除失败");
        }
    }
    /*
    * zwb获取充值时间
    * 2018-10-16
    */
    public function recharge_time(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $r_id = $data['r_id'];//充值记录id
        if(empty($r_id)){
            $this->response_error('充值记录id不能为空');
        }
        $where =array(
            'r_id'=>$r_id,
            'm_id'=>$m_id,
        );
        $list = Db("recharge")->where($where)->field('r_time,r_state,r_type,r_money')->find();
        if($list){
            $this->response_data($list);
        }else{
            $this->response_data('查无记录');
        }
    }
    /*
    * zwb返回提现页面信息
    * 2018-10-17
    */
    public function forward_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $mem = new MemberService();
        $where=[
            'm_id'=>$m_id
        ];
        //认证表银行卡信息
        $memberArticle = new MemberAttestationService();
        $core = $memberArticle->get_info($where,'bankname,bankaccount');
        //银行卡、开户行、余额、收益
        $info = $mem->get_info($where,'m_money,m_income');
        $info['m_bankname']     = empty($core['bankname'])      ? '' : $core['bankname'];
        $info['m_bankaccount']  = empty($core['bankaccount']) ? '' : $core['bankaccount'];
        if(!empty($info['m_bankname']) && !empty($info['m_bankaccount'])){
            $info['is_bang'] = 1;
        }
        if(empty($info['m_bankname']) && empty($info['bankaccount'])){
            $info['is_bang'] = 0;
        }
        $config = new ConfigService();
        $info['fee1'] = $config ->configGetValue(['c_code'=>'DRAW_FEE1'],'c_value');
        $info['fee2'] = $config ->configGetValue(['c_code'=>'DRAW_FEE2'],'c_value');
        $info['img'] = PAIYAYA_URL."/static/image/wallet/icon_yinlian@2x.png";
        $this->response_data($info);
    }
    /*
    * zwb认证信息
    * 2018-10-17
    */
    public function attachment_info(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $member_a = new MemberAttestationService();
        $where=[
            'm_id'=>$m_id
        ];
        $info = $member_a->get_info($where,'real_name,identification,birthday,sex');
        if($info){
            $info['sex'] = $info['sex']==1 ? '女' : '男';
            $this_year = date('Y',time());
            $birthday_year = date('Y',$info['birthday']);
            $info['birthday'] = date("Y-m-d",$info['birthday']);
            $info['year'] = $this_year-$birthday_year;
            $name_len = mb_strlen($info['real_name']);
            switch($name_len){
                case 1:
                    $info['real_name'] = $info['real_name'].'*';
                    break;
                case 2:
                    $info['real_name'] = mb_substr($info['real_name'],0,1).'*';
                    break;
                default:
                    $info['real_name'] = mb_substr($info['real_name'],0,1).'*'.mb_substr($info['real_name'],-1,1);
            }
            $info['identification'] = mb_substr($info['identification'],0,3).'****'.mb_substr($info['identification'],-4,4);
        }
        $this->response_data($info);
    }
    /*
    * zwb吖吖大会员
    * 2018-10-17
    */
    public function big_member(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $mem = new MemberService();
        $where = [
            'm_id'=>$m_id,
        ];
        //本人信息
        $field = 'm_id,m_name,m_avatar,m_levelid,tj_mid,m_mobile,m_code,experience,m_mobile,is_promoters';
        $info = $mem->get_info($where,$field);
        if(!empty($info['m_avatar'])){
            $m_avatar = $info['m_avatar'];
            unset($info['m_avatar']);
            $info['m_avatar'] = PAIYAYA_URL.$m_avatar;
        }
        if($info['is_promoters'] == 4 || $info['is_promoters'] == 5){
            $info['promoters_img'] = PAIYAYA_URL.'/uploads/logo/ml_tgy.png';
        }
        //本人等级信息
        $member_level = new MemberLevelService();
        $level = $member_level->get_info(['ml_id'=>$info['m_levelid']],'ml_tj1,ml_tj2,ml_name');
        $info = array_merge($info,$level);
        $where = [
            'ml_id'=>['>',$info['m_levelid']]
        ];
        $target = $member_level->get_limit($where,$order='ml_id asc',$field='ml_name',$offset='0',$page_size='1');

        $info['target'] = empty($target[0]['ml_name']) ? '' : $target[0]['ml_name'];
        //无二维码时，生成新二维码
        if(empty($info['m_code']) || !is_file(trim($info['m_code'],'/')) ){
            $info['m_code'] = $mem->new_code(['m_id'=>$info['m_id']]); //检测是否有二维码,无时生成新的二维码
        }
        if(!empty($info['m_code'])){
            $m_code = $info['m_code'];
            unset($info['m_code']);
            $info['m_code'] = PAIYAYA_URL.$m_code;
        }
        //推荐者信息
        $tj_info = array();
        if($info['tj_mid']){
            $tj_m_id = $info['tj_mid'];
            $where2 = [
                'm_id'=>$tj_m_id
            ];
            $field = 'm.m_name tj_name,m.m_mobile tj_m_mobile,m.m_avatar tj_m_avatar,ml.ml_name tj_ml_name';
            $tj_info = Db::table('pai_member m')->join('pai_member_level ml','m.m_levelid=ml.ml_id','left')->where($where2)->field($field)->find();
            //处理手机号码
            $tj_m_mobile = empty($tj_info['tj_m_mobile']) ?  '' : $tj_info['tj_m_mobile'];
            $tj_m_mobile = $member_level->decrypt($tj_m_mobile);
            $tj_info['tj_m_mobile'] = substr_replace($tj_m_mobile,'****',3,4);
            //处理名字
            $tj_name = empty($tj_info['tj_name']) ?  '' : $tj_info['tj_name'];
            $tj_info['tj_name2'] = $tj_name;
            $name_len = mb_strlen($tj_name);
            switch($name_len){
                case 1:
                case 2:
                    $tj_name = mb_substr($tj_name,0,1).'**';
                    break;
                default:
                    $tj_name = mb_substr($tj_name,0,1).'**'.mb_substr($tj_name,-1);
                    break;
            }
            $tj_info['tj_name'] = $tj_name;

        }
        if(!empty($tj_info['tj_m_avatar'])){
            $tj_m_avatar = $tj_info['tj_m_avatar'];
            unset($tj_info['tj_m_avatar']);
            $tj_info['tj_m_avatar'] = PAIYAYA_URL.$tj_m_avatar;
        }
        if(!empty($info['tj_mid'])){
            $info['tj'] = $tj_info;
        }else{
            $info['tj'] = null;
        }
//        print_r($info);die();
        $money = new MoneyLogService();
        $where = [
            'm_id'=>$m_id,
            'ml_type'=>'add',
            'state'=>8
        ];
        //money最大值
        $max_money = $money->max_money($where,'ml_money');
        $max_money = sprintf("%.2f",$max_money);
        $info['max_money'] = $max_money;
        $count_where = [
            'tj_mid'=>$m_id,
            'm_type'=>['in',[0,1,3]],
            'm_state'=>0,
        ];
        //邀请人数 已激活和未激活
        $order_pai = new OrderPaiService();
        $activation_count = $order_pai->get_participate_num($m_id);
        $info['is_activation'] = $activation_count[0];//已激活
        $info['no_activation'] = $activation_count[1];//未激活
        //邀请人数
        $array_count = $mem->count($count_where);
        $info['yao_member'] = $array_count[0];
        $info['yao_business'] = $array_count[1];
        $m_mobile = empty($info['m_mobile']) ? '' : $mem->decrypt($info['m_mobile']) ;
        $info['m_mobile'] = $m_mobile;

        // 累计消费金额(lyh)
        $total_pay = 0.00;
        $orderpai = new OrderPaiService();
        $total_pay = $orderpai -> get_total_pay($m_id);
        $info['total_pay'] = $total_pay;
        $info['end_point'] = $info['ml_tj2'] - $info['experience'];//差多少点升级

        //权益信息
        $article_type = new ArticleTypeService();
        $at_name_arr = [
            '普通会员','白银会员','黄金会员','黑金会员','推广员'
        ];
        $a_name_arr = [
            '观望奖','立返推荐费','成长加速'
        ];
        $articles = array();
        foreach($at_name_arr as $k => $v){
            foreach($a_name_arr as $value){
                $where = [
                    'at.at_name'    => $v,
                    'at.at_state'   => 0,
                    'a.a_name'      => $value,
                    'a.a_state'     => 0
                ];
                $article = $article_type->articleTypeJoinArticle($where,'a.a_id asc','a.a_id,a.a_name,a.a_description,a.a_img');
                $article['a_id']    = empty($article['a_id']) ? '' : $article["a_id"];
                $article['a_name']  = empty($article['a_name']) ? '' : $article["a_name"];
                $article['a_description'] = empty($article['a_description']) ? '' : strip_tags(htmlspecialchars_decode($article["a_description"]));
                $article['a_img']   = empty($article['a_img']) ? '' : $article["a_img"];
                $articles[$k][] = $article;
            }
        }
        $is_promoters = Db('member')->where('m_id',$m_id)->value('is_promoters');//查看是否是推广员
        if($is_promoters == 1){//不是
            $info['tui_link'] = PAIYAYA_URL."/member/promoters/index";
        }elseif($is_promoters == 4 || $is_promoters == 3){//3审核失败 4考核中
            $info['tui_link'] = PAIYAYA_URL."/member/promoters/is_success";
        }elseif($is_promoters == 2){//申请中
            $info['tui_link'] = PAIYAYA_URL."/member/promoters/is_apply_success";
        }
        $info['quanyi_list'] = $articles;
        $info['bottom_title'] = "PS：若所属会员等级超过推荐人，则推荐人自动停止对该会员的现金收益及分润收入计算！";
        $info['invitation_link'] = PAIYAYA_URL."/member/register/it_to_rg/phone/" . $info['m_mobile'];//邀请链接
        $tui_max_number = Db('config')->where(array('c_code'=>'TGY_ONE'))->value('c_value');
        $tui_max_number = intval($tui_max_number);
        $info['tui_max_number'] = $tui_max_number;//考核推广员预设最大人数
        $info['share_title'] = "邀您入驻拍吖吖，享大福利！";
        $info['share_content'] = "5折！3折！1折！还有1元价！尽在拍吖吖，快来抢购吧！";
        $info['share_img'] = PAIYAYA_URL."/static/image/modifydata/icon_icon@2x.png";
        $this->response_data($info);
    }
    /*
    * zwb吖吖大会员里面的会员权益
    * 2018-10-17
    */
    public function member_quanyi(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        //权益信息
        $article_type = new ArticleTypeService();
        $at_name_arr = [
            '普通会员','白银会员','黄金会员','黑金会员','推广员'
        ];
        $a_name_arr = [
            '观望奖','立返推荐费','成长加速'
        ];
        $articles = array();
        foreach($at_name_arr as $k => $v){
            foreach($a_name_arr as $value){
                $where = [
                    'at.at_name'    => $v,
                    'at.at_state'   => 0,
                    'a.a_name'      => $value,
                    'a.a_state'     => 0
                ];
                $article = $article_type->articleTypeJoinArticle($where,'a.a_id asc','a.a_id,a.a_name,a.a_description,a.a_img');
                $article['a_id']    = empty($article['a_id']) ? '' : $article["a_id"];
                $article['a_name']  = empty($article['a_name']) ? '' : $article["a_name"];
                $article['a_description'] = empty($article['a_description']) ? '' : strip_tags(htmlspecialchars_decode($article["a_description"]));
                $article['a_img']   = empty($article['a_img']) ? '' : $article["a_img"];
                $articles[$k][] = $article;
            }
        }
        $this->response_data($articles);
    }
    /*
    * zwb余额充值花生
    * 2018-10-19
    */
    public function balancepay(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=$this->data;
        $m_id = $data['member_id'];//用户id
        if(empty($m_id)){
            $this->response_error("用户id不能为空");
        }
        $r_id = $data['r_id'];
        if (empty($r_id)) {
            $this->response_error( "充值ID为空");
        }
        $password = $data['password'];//支付密码
        if(empty($password)){
            $this->response_error( "支付密码不能为空");
        }
        $member_list = Db('member')->where('m_id',$m_id)->field('m_payment_pwd,m_name')->find();//用户信息
        if($member_list['m_payment_pwd'] != md5($password)){
            $this->response_error( "支付密码不正确");
        }
        $sql = "select * from pai.pai_recharge where r_id=$r_id";
        $rlist = Db::table("pai_recharge")->query($sql);
        if (empty($rlist[0]['r_id'])) {
            $this->response_error("充值信息为空");
        }
        //查询用户账号余额是否足够开始
        $sql_m = "select m_money from pai.pai_member where m_id=".$rlist[0]['m_id'];
        $list_m = Db::table("pai_recharge")->query($sql_m);
        if (empty($list_m[0]['m_money'])) {
            $this->response_error("账号余额不存在");
        }
        if($list_m[0]['m_money']<$rlist[0]['r_money']){
            $this->response_error("账号余额小于充值金额");
        }
        //查询用户账号余额是否足够结束
        $r_money = $rlist[0]['r_money'];
        $r_state = '8';
        $r_success_time = time();
        $sql2 = "update pai.pai_member set m_money=m_money-$r_money, peanut=peanut+$r_money where m_id=" . $rlist[0]['m_id'];
        $res2 = Db::table("pai_recharge")->execute($sql2);
        if ($res2) {
            $sql3 = "update pai.pai_recharge set r_state=$r_state,r_money=$r_money,r_success_time=$r_success_time where r_id=" . $r_id;
            $res3 = Db::table("pai_recharge")->execute($sql3);
            if (!$res3) {
                $this->response_error("更改充值状态失败");
            }
        } else {
            $this->response_error( "用户加花生失败");
        }
        //插入资金记录到资金表start
        $ml_type = "'" . "reduce" . "'";
        $ml_reason = "'" . "余额充值花生" . "'";
        $ml_table = '2';
        $ml_money = $r_money;
        $money_type = '1';
        $nickname = !empty($member_list['m_name']) ? "'" . $member_list['m_name'] . "'" : "'" ."未知" . "'";
        $position ="'" ."未知" . "'";
        $member_type = '1';
        $income_type = "0";
        $withdraw_method = "0";
        $card_number = "0";
        $add_time = time();
        $from_id = $r_id;
        $ml_mid = $m_id;
        $ml_state = "8";
        $ml_updatetime = time();
        $sql_moneylog = "INSERT INTO pai_money_log (ml_type,ml_reason,ml_table,ml_money,money_type,nickname,position,member_type,income_type,withdraw_method,card_number,add_time,from_id,m_id,state,update_time) values($ml_type,$ml_reason,$ml_table,$ml_money,$money_type,$nickname,$position,$member_type,$income_type,$withdraw_method,$card_number,$add_time,$from_id,$ml_mid,$ml_state,$ml_updatetime)";
        $res_money_log = Db::table("pai_money_log")->execute($sql_moneylog);
        //插入资金记录到资金表end

        //充值花生日志表start
        $pl_num = $r_money;
        $pl_time = time();
        $from_id = $r_id;
        $pl_type = "'" . "add" . "'";
        $pl_reason = "'" . "余额充值花生" . "'";
        $pl_state = '8';
        $pl_mid = $m_id;
        $sql4 = "INSERT INTO pai.pai_peanut_log (pl_num,pl_time,from_id,pl_type,pl_state,pl_mid,pl_reason) values ($pl_num,$pl_time,$from_id,$pl_type,$pl_state,$pl_mid,$pl_reason)";
        $res4 = Db::table("pai_recharge")->execute($sql4);
        //充值花生日志表end
        $return_data = array();
        if($res4){
            $return_data['msg'] = "余额充值花生成功";
            $this->response_data($return_data);
        }else{
            $return_data['msg'] = "余额充值花生失败";
            $this->response_error($return_data);
        }
    }

}
