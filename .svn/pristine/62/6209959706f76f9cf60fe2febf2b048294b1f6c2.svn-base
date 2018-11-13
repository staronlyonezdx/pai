<?php
namespace app\admin\controller;

use app\data\service\admin\AdminService;
use think\Controller;
use think\Url;
use app\data\service\BaseService as BaseService;
use think\Response;
use think\Cookie;
use app\data\service\system_msg\SystemMsgService as SystemMsgService;
use app\data\service\comm\PageWuService as PageWuService;
use app\data\service\goods\GoodsApiService as GoodsApiService;
use app\data\service\api\ApigoodsService as ApigoodsService;
use think\cache\driver\Redis;
use think\Config;
use think\Image;
use think\Request;
use think\File;
use app\data\service\api\ApiorderService as ApiorderService;
use think\Db;
use app\data\service\goodsCategory\GoodsCategoryService;
use app\data\service\goods\GoodsService;
use app\data\service\goods\VisitGoodsHistoryService;
use app\data\service\webImagesType\WebImagesTypeService;
use app\data\service\orderPai\OrderPaiService;
use app\data\service\orderAwardcode\OrderAwardcodeService as OrderAwardcodeService;
use app\data\service\store\StoreService as StoreService;
use app\data\service\store\StoreCollectionService;

class Login extends Controller
{
    /**
     * 后台登录页面
     * 创建人 wumengsheng
     * 时间 2018-06-19
     */
    public function index()
    {
        if (request()->isPost()) {
            $Base  = new BaseService();
            //验证
            $type  = 'username|password|code';
            $info  = input('request.username') . "|" . input('request.password') . "|" . input('request.code');
            $check = $Base->checkInfo($type, $info);
            if ($check) {
                $this->error($check);
            }

            //账号信息判断
            $admin      = new AdminService();
            $admin_name = input('request.username');
            $admin_pwd  = input('request.password');
            //$ruesult    = $admin->adminLogin($admin_name, $admin_pwd);
            $result     = $admin->checkLogin($admin_name);
            if(empty($result)){
                $this->error('管理员不存在！');
            }
            if ($result['admin_pwd'] != $Base->HashPassword($admin_pwd)){
                $this->error('密码错误！');
            }
            if ($result['state'] == 1){
                $this->error('账号已被禁用！');
            }

            //保存到cookie
            $Base->cookiePack('admin_id',$result['admin_id'],3600*12);
            $Base->cookiePack('admin_name',$result['admin_name'],3600*12);
            $Base->cookiePack('role_id',$result['role_id'],3600*12);
            $Base->cookiePack('role_name',$result['role_name'],3600*12);
            $Base->cookiePack('authority_id',$result['authority_id'],3600*12);
            //销毁验证码session
            $Base->cookiePack('verify',null);

            $this->redirect('adminindex/index');

//            if ($ruesult['status'] == 1) {
//                $this->redirect('Adminuser/index');
//            } else {
//                $this->error($ruesult['msg']);
//            }
        }
        return $this->fetch();
    }

    /**
     * 退出登录
     * 邓赛赛
     */
    public function sign_out(){
        Cookie::delete('admin_id');
        Cookie::delete('admin_name');
        Cookie::delete('role_id');
        Cookie::delete('role_name');
        Cookie::delete('authority_id');
        $this->redirect('/admin/login/index');
    }


    public function test()
    {
//        $showrow =2; //一页显示的行数
//        $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
//        $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
////省略了链接mysql的代码，测试时自行添加
////$sql = "SELECT * FROM data_type";
//
//        $total ='5'; //记录总条数
//        if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
//            $curpage = ceil($total / $showrow); //当前页数大于最后页数，取最后一页
//        //获取数据
//        $sm=new SystemMsgService();
//        $m_id='2';
//        $list=$sm->GetSystemMsgList($m_id);
//        $this->assign("list",$list);
//
//        $ps=new PageWuService($total, $showrow, $curpage, $url, 2);
//        if($showrow<$total) {
//            $phtml = $ps->myde_write();
//        }
//        else{
//            $phtml="";
//        }
//        $this->assign("pagehtml",$phtml);
//
//
//        return $this->fetch();
//        $GoodsApiService=new GoodsApiService();
//        $where="g.g_mid=32";
//        $fields="g.g_id,gp.gp_id,g.g_name,g_img,g_typeid,g_endtime,gp.gp_stock,gp.gp_sn,gp.gp_sale_price";
//        $order="g.g_addtime desc";
//        $curpage=1;
//        $pagenum=10;
//        $list=$GoodsApiService->get_my_goods_list($where,$fields,$order,$curpage,$pagenum);
//        $c=$GoodsApiService->get_my_goods_list_count($where);
//        $page_count=ceil($c/$pagenum);
//        $pagelist=$this->app_page($page_count);
//        var_dump($pagelist);die;
//        $config =Config::load(APP_PATH.'redis_config.php');
//
//        $Redis=new Redis($config);
//        $Redis->set("test","test");
//        echo $Redis->get("test");
        $ApigoodsService=new ApigoodsService();
//        $res=$ApigoodsService->getZKPai('28');
//        $r=$ApigoodsService->get_goods_review("28","3");
//        $r=$ApigoodsService->get_store_data("3");
//        $r=$ApigoodsService->get_collection_goods("32");
//        $r=$ApigoodsService->get_goodscategory();
//       var_dump($r);die;
        return $this->fetch();

    }
    public function testorder(){
        $ApiorderService=new ApiorderService();
        $o_id='120';
        $fields=" s.stroe_name,g.g_img,g.g_name,gp.gp_market_price,gdr.gdr_price,op.o_addtime,g.g_endtime,op.gp_num";
        $list=$ApiorderService->doget_pai_order_info($o_id,$fields);
        var_dump($list);die;
    }
    public function testorderlist(){
        $ApiorderService=new ApiorderService();
        $m_id='44';
        $data['state']=1;
        $data['curpage']='1';
        $data['pagenum']="100";
        $where="op.m_id=".$m_id;
        if(!empty($data['o_state'])){
            $where.=" and op.o_state=".$data['o_state'];
        }
        $fields=" s.stroe_name,g.g_img,g.g_name,gp.gp_market_price,gdr.gdr_price,op.o_addtime,g.g_endtime,op.gp_num";
        $order="op.o_addtime desc";
        $curpage=$data['curpage'];
        $pagenum=$data['pagenum'];
        $list=array();
        $list=$ApiorderService->doget_pai_order_list($where,$fields,$order,$curpage,$pagenum);
        $c=$ApiorderService->doget_pai_order_count($where);

        var_dump($list);die;
    }
    public function addimg(){
        $name="rgi_img";
        $file="review";
        $type="2";
        $w=350;
        $h=350;
        // 获取表单上传文件
        $files = request()->file($file);
        // 移动到框架应用根目录/public/uploads/ 目录下
        foreach($files as $file)
            $info = $file->move(ROOT_PATH.'public'.DS.'uploads'.DS.$name);
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
               // echo $info->getExtension();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
               // echo $info->getFilename();
                //生成缩略图
                if ($type==2) {
                    $thumb = $this->thumbImg($info->getSaveName(), $name, $type, $w, $h);
                }else if($type==1){
                    $imgUrl = ROOT_PATH.'public' . DS . 'uploads'. DS . $name . DS .$info->getSaveName();
                    $image = \think\Image::open($imgUrl);
                    $image->thumb($w ,$h)->save($imgUrl);
                }
                $saveName="/uploads".DS.$name.DS.$info->getSaveName();

            }else{
                // 上传失败获取错误信息
               // echo $file->getError();
            }
    }

    /*
	* 图片压缩
	*/
    public function thumbImg($img, $name, $type ,$w=375 ,$h=286, $goods=''){

        $img = './uploads/'.$name.'/'.$img;
        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
        $riqi = date("Ymd",time());
        if ($goods) {
            $g_id = $goods['goods_id'] ;
        } else {
            $g_id = time() ;
        }

        if ($type==1) {
            $name = './uploads/thumb/'.$name.'/item'.$g_id.".jpg";
        } else if ($type==2) {

            $url = './uploads/thumb/'.$name;
            @mkdir('./uploads/thumb/',777,true);
            @mkdir($url,777,true);
            @chmod($url, 0777);

            $path = $url ;
            if (!file_exists($path)){
                define($path, __DIR__);
                mkdir($path);
            }

            $path2 = $url.'/'.$riqi;
            @mkdir($path2,777,true);
            @chmod($path2, 0777);
            if (!file_exists($path2)) {
                mkdir($path2);
            }
            $name = $path2.'/'.$name.$g_id.".jpg";
        }

        if (file_exists($img)) {
            if (!file_exists($name)) {
                $image = \think\Image::open($img);
                //dump($name);die;
                $image->thumb($w, $h,\think\Image::THUMB_CENTER)->save($name,'jpg');
            }
            $name = substr($name,1);
            $pic = $name ;
            return $pic;
        }
    }
    public function addSMdata()
    {
        $data=array();
        $data['sm_addtime']=time();
        $data['is_read']='0';
        $data['sm_type']='1';
        $data['sm_title']="恭喜您竞拍成功";
        $data['sm_brief']="恭喜您竞拍获得了很多机会";
        $data['sm_content']="激发了附近的历史发送数据莲富大厦发沙发上的";
        $data['from_id']='0';
        $data['to_mid']="2";
        $sm=new SystemMsgService();
        $result=$sm->AddSystemMsg($data);
        var_dump($result);die;
        return $this->fetch();
    }

    public function testaddorder(){
        $data=array();
        $data['m_id']="44";
        $data['store_id']="1";
        $data['o_money']="200.00";
        $data['gp_id']="92";
        $data['gp_num']=2;
        $data['o_pid']="2";
        $data['o_cid']="5";
        $data['o_did']="6";
        $data['o_address']="北京是发多少级范德萨就";
        $data['o_receiver']="双方都";
        $data['o_mobile']="13722222222";
        $data['o_addressid']="1";
        $data['gdr_id']="2";
        $data['gs_id']="1";
        $ApiorderService=new ApiorderService();
        $res=$ApiorderService->do_add_order($data);
        var_dump($res);die;
    }
    public function getcollection(){
        $where="gc.m_id=44";
        $fields="g.g_id,gc.g_time,g.g_name,g.g_img,gp.gp_market_price,MIN(gdr.gdr_price) price";
        $order="gc.g_time desc";
        $curpage=1;
        $pagenum=10;
        $list=array();
        $ApigoodsService=new ApigoodsService();
        $list=$ApigoodsService->doget_goods_collection_list($where,$fields,$order,$curpage,$pagenum);
        $s=Db::table('goods')->getLastSql();
        $c=$ApigoodsService->doget_goods_collection_list_count($where);
        $page_count=ceil($c/$pagenum);
        var_dump($list);die;
    }
    public function getstorecollection(){
        $where="sc.m_id=44";
        $fields="s.store_id,s.stroe_name,s.store_logo";
        $order="sc.sc_time desc";
        $curpage=1;
        $pagenum=10;
        $list=array();
        $ApigoodsService=new ApigoodsService();
        $list=$ApigoodsService->doget_store_collection_list($where,$fields,$order,$curpage,$pagenum);
        $c=$ApigoodsService->doget_store_collection_list_count($where);
        $page_count=ceil($c/$pagenum);
        var_dump($c);
        var_dump($list);

    }
    public function testcheckpaypwd(){
        $member_id=44;
        $pwd="123456";
        $ApiorderService=new ApiorderService();
        $res=$ApiorderService->docheckpaypwd($member_id,$pwd);
        var_dump($res);die;
    }
    public function testcheckmoney()
    {
        $member_id='44';
        $ApiorderService=new ApiorderService();
        $my_money=$ApiorderService->dogetMoney($member_id);
        var_dump($my_money);die;
    }

    public function getoinfo(){
       $o_id=446;
        $ApiorderService=new ApiorderService();
        $list=array();
        $fields=" op.o_id,op.o_periods,op.gdr_id,op.m_id,s.stroe_name,g.g_img,g.g_name,gp.gp_market_price,gdr.gdr_price,op.o_address,op.o_receiver,op.o_mobile,op.o_state,op.o_addtime,g.g_endtime,op.gp_num,op.gs_id,op.o_deliverfee,op.o_sn,op.o_paystate,op.o_paytime";
        $list=$ApiorderService->doget_pai_order_info($o_id,$fields);
        if(empty($list['o_id'])){
            $this->response_error("订单数据为空");
        }
        $list['g_img']="http://10.0.2.52/".$list['g_img'];
        $gdr_id=$list['gdr_id'];
        $o_periods=$list['o_periods'];
        $m_id=$list['m_id'];
        var_dump($list);die;
    }

    //读取gdr
    public function getgdr(){
        $ApigoodsService=new ApigoodsService();
        $gp_id=189;
        $pai_cur=$ApigoodsService->doget_pai_member_cur_all($gp_id);
        var_dump($pai_cur);
    }
    //读取gdr
    public function getgdr2(){
        $ApigoodsService=new ApigoodsService();
      $gp_id=189;
        $where="op.gp_id=".$gp_id." AND op.o_state<>1";
        $fields=" m.m_avatar,m.m_name,op.o_addtime,gdt.gdt_img,gdt.gdt_name";
        $order="op.o_addtime desc";
        $data['curpage']=1;
        $data['pagenum']=100;
        $curpage=$data['curpage'];
        $pagenum=$data['pagenum'];
        $list=array();
        $list=$ApigoodsService->doget_pai_member_old_all($where,$fields,$order,$curpage,$pagenum);
        $c=$ApigoodsService->doget_pai_member_old_all_count($where);
        $page_count=ceil($c/$pagenum);

       var_dump($list);die;
    }
    //读取订单状态信息
    public function getostateinfo(){
        $ApiorderService=new ApiorderService();
        $gp_id=189;
        $o_state='2';
        $gdr_id=460;
        $o_periods='1';
        $o_paystate=2;
        $o_id=245;
        $pai_cur=$ApiorderService->doget_order_stateinfo($o_state,$gdr_id,$o_periods,$o_paystate,$o_id);
        var_dump($pai_cur);
    }

    public function getcur(){
        $ApigoodsService=new ApigoodsService();
        $curpage=1;
        $pagenum=10;
        $gp_id=189;
        $pai_cur=$ApigoodsService->doget_pai_member_cur_all($gp_id,$curpage,$pagenum);
        $where="op.o_state=1 and op.o_paystate=2 and op.gp_id=".$gp_id;
        $c=$ApigoodsService->doget_pai_member_old_all_count($where);
        $page_count=ceil($c/$pagenum);
        $pagelist=$this->app_page($page_count);
        if(!empty($list)){
            $this->response_data($list,$pagelist);
        }
        else{
            $this->response_error("数据为空");
        }
    }
    public function getFC(){
        $ApigoodsService=new ApigoodsService();
        $pid='tj';
        $res=$ApigoodsService->doget_tj_category();
        var_dump($res);die;
    }
    public function getcategorygoods(){

        $gc_id=2;
        if(empty($this->data['curpage']))
        {
            $page=1;
        }
        else{
            $page=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $page_size=10;
        }
        else{
            $page_size= $this->data['pagenum'];
        }
        $goodsCategory = new GoodsCategoryService();
        //当前分类
        $info = $goodsCategory->goodsCategoryInfo(['gc_id'=>$gc_id]);
        $where = [
            'state'=>0,
        ];
        //父ID为0时表示以及分类用gc_id取二级分类
        if($info['parent_id'] == 0){
            $where['parent_id'] = $gc_id;
            $data['parent_id'] =$gc_id;
        }else{
            $where['parent_id'] = $info['parent_id'];
            $data['parent_id'] = $info['parent_id'];
        }
        //二级分类
        $titleAll = $goodsCategory->getCategoryList($where,'gc_id asc','gc_id,gc_name,parent_id',$cache='');
        $data['gc_title'] = $info['gc_name'];
        $data['titleAll'] = $titleAll;
        $data['gc_id'] = $gc_id;
        $goods = new GoodsService();
        if($info['parent_id'] == 0){
            $gc_ids = array_column($titleAll,'gc_id');
            $gc_ids = implode(",",$gc_ids);
            $where2['g.gc_id'] = ['in',$gc_ids];
//            dump($where2);
        }else{
            $where2['g.gc_id'] = $gc_id;
        }
        $list = $goods->goods_category_list($where2,'g.g_id,g.g_name,g.g_img,g.gc_id,p.gp_market_price,dtr.gdr_id,min(dtr.gdr_price) min_price,max(dtr.gdr_price) max_price','g.g_endtime asc',$page_size,$page);
        $data['list'] = $list['list'];
        $page_count=$list['totle_page'];
       var_dump($data);die;
    }
    public function getSysmsg(){
        $m_id = 100;
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

        $sql = "select count(*) num from pai_system_msg where sm_public=2 OR to_mid= $m_id";
        $total_num = Db::query($sql);
        $total_num = isset($total_num[0]['num']) ? $total_num[0]['num'] : 0;
        $page_count = ceil($total_num / $page_size);
       var_dump($list['list']);die;
    }
    public function visitlist(){
        $m_id=90;
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
      var_dump($data);die;
    }

    public function getindex(){
        $wit = new WebImagesTypeService();
        $where_sydh = [
            'wi.wi_type'=>1,
            'wi.wi_state'=>0,
            'wit.wit_code'=>'sydh',
        ];
        //分类图片(轮播图/广告/导航)
        $sydh_img = $wit->get_web_img($where_sydh,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href');

        $where_hd = [
            'wi.wi_type'=>1,
            'wi.wi_state'=>0,
            'wit.wit_code'=>'hd',
        ];
        //分类图片(轮播图/广告/导航)
        $hd_img = $wit->get_web_img($where_hd,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href');

        $where_ad = [
            'wi.wi_type'=>1,
            'wi.wi_state'=>0,
            'wit.wit_code'=>'syad',
        ];
        //分类图片(轮播图/广告/导航)
        $ad_img = $wit->get_web_img($where_ad,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href');

        //热拍
        $heat = $this->goods_hot();
        var_dump($heat);die;
    }

    public function goods_hot(){
        if (empty($this->data['curpage'])) {
            $page = 1;
        } else {
            $page = $this->data['curpage'];
        }
        if (empty($this->data['pagenum'])) {
            $page_size = 6;
        } else {
            $page_size = $this->data['pagenum'];
        }
        $goods = new GoodsService();
        //热拍
        $heat = $goods->get_heat_list('g.g_addtime desc',$page,$page_size);
        $data=$heat['list'];
        $page_count =$heat['total_page'];

        var_dump($data);die;
    }
    public function get_pai_member_old(){
        $gdr_id=304;
        $ApigoodsService=new ApigoodsService();
        $where="op.gdr_id=".$gdr_id." AND op.o_state<>1";
        $fields=" m.m_avatar,m.m_name,op.o_addtime,gdt.gdt_img,gdt.gdt_name";
        $order="op.o_addtime desc";
        if(empty($this->data['curpage']))
        {
            $curpage=1;
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $pagenum=10;
        }
        else{
            $pagenum= $this->data['pagenum'];
        }
        $list=array();
        $list=$ApigoodsService->doget_pai_member_old($where,$fields,$order,$curpage,$pagenum);
        $c=$ApigoodsService->doget_pai_member_old_count($where);
        $page_count=ceil($c/$pagenum);


       var_dump($list);die;
    }
    public function get_pai_cur(){

        $gdr_id=304;
        if(empty($this->data['curpage']))
        {
            $curpage=1;
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum']))
        {
            $pagenum=10;
        }
        else{
            $pagenum= $this->data['pagenum'];
        }
        $ApigoodsService=new ApigoodsService();
        $list=$ApigoodsService->doget_pai_member_cur($gdr_id,$curpage,$pagenum);
        $where="op.o_state=1 and op.gdr_id=".$gdr_id;
        $c=$ApigoodsService->doget_pai_member_cur_count($where);
        $page_count=ceil($c/$pagenum);
        $sql=Db::table("tt")->getLastSql();
       var_dump($sql);die;
    }
    public function iscollection(){
        $g_id=240;
        $m_id=100;
        $ApigoodsService=new ApigoodsService();
        $res=$ApigoodsService->dois_goods_collection($m_id,$g_id);
       var_dump($res);die;
    }
    public function getginfo(){
        $this->data['g_id']=339;
        $ApigoodsService=new ApigoodsService();
        $where2['g_id']=$this->data['g_id'];
        $info=$ApigoodsService->get_goods_info($this->data['g_id']);
        if(empty($info)){
            $this->response_error("该商品信息为空");
        }

        $g_id=$this->data['g_id'];
        $store_id=$info['g_storeid'];
        $category_id=$info['gc_id'];
        //商品总成交人数
        $gp_id=$info['gp_id'];
        $o_state='1';
        $g_ordernum=0;
        $g_ordernum=$ApigoodsService->get_goods_ordernum($gp_id,$o_state);
        //发货省市区地址
        $provinceName="";
        $cityName="";
        $dName="";
        if(!empty($info['pid'])&&!empty($info['cid'])&&!empty($info['did']))
        {
            $provinceName=$ApigoodsService->getAddressNameById($info['pid']);
            $cityName=$ApigoodsService->getAddressNameById($info['cid']);
            $dName=$ApigoodsService->getAddressNameById($info['did']);
        }
        //折扣订单总人数
        $zk_list=array();
        $zk_list=$ApigoodsService->getZKPai2($g_id);
        $ordernum_list=array();
        $ordernum_list=$ApigoodsService->getordernum($gp_id);
        $tjproducts=$ApigoodsService->get_pinfo_tjproducts($store_id,$category_id);
        $info['ordernum']=$ordernum_list;
        $info['g_ordernum']=$g_ordernum;
        $info['provinceName']=$provinceName;
        $info['cityName']=$cityName;
        $info['dName']=$dName;
        $info['zk_list']=$zk_list;
        $info['now_time']=time();
        $info['tjproducts']= $tjproducts;
        //读取评价
        $g_review=$ApigoodsService->get_goods_review($info['gp_id'],$info['g_storeid']);
        $info['g_review']=$g_review;
        //店铺详情
        $store_data=$ApigoodsService->get_store_data($info['g_storeid']);
        $info['store_data']=$store_data;
        if(!empty($info)){
           var_dump($info);die;
        }
        else{
            echo("商品信息为空");die;
        }
    }

    //
    public function add_admin()
    {
        if (request()->isPost() || request()->isAjax()) {

            $admin = new \app\data\service\admin\AdminService();

            //表单数据验证
            $type = 'add';
            $info = input('request.admin_name') . "|" . input('request.admin_pwd') . "|" . input('request.admin_pwd2') . "|" . input('request.role_id');
            $check = $admin->checkAdmin($type, $info);
            if ($check) {
                $this->error($check);
            }

            //账号信息判断




        }
        return $this->fetch();
    }

    public function  getyym(){

        $m_id =100;
        if(empty($this->data['curpage'])){
            $page="1";
        }
        else{
            $page=$this->data['curpage'];
        }
        if(empty($this->data['pagenum'])){
            $size=10;
        }
        else{
            $size=$this->data['pagenum'];
        }
        $gdr_id =304;
        $o_periods =1;
        if(!empty($this->data['type']))
        {
            $type = $this->data['type'];
        }
        else{
            $type=0;
        }
        if($type == 1){
            $where['m.m_id'] = $m_id;
        }elseif($type == 2){
            $where['o.o_state'] = 2;
        }
        if($gdr_id){
            $where['o.gdr_id'] = $gdr_id;
        }
        if($o_periods){
            $where['o.o_periods'] = $o_periods;
        }
        $where['o.o_paystate'] = ['gt',1];//已支付的
        $where['o.o_isdelete'] = ['lt',2];//未删除
        $order='o.o_id asc';
        $field='*';
        $limit = ($page * $size).','.$size;
        $orderpai = new OrderPaiService();
        $list = $orderpai->orderLimitList($where,$order,$field,$limit);
        $sql=Db::table("tt")->getLastSql();
        var_dump($sql);
    }
    public function getmyorderlist(){
        $m_id =100;
        if(empty($this->data['curpage'])){
            $page="1";
        }
        else{
            $page=$this->data['curpage'];
        }
        if(empty($this->data['pagenum'])){
            $size=10;
        }
        else{
            $size=$this->data['pagenum'];
        }
        if(empty($this->data['status'])){
            $status=0;
        }
        else{
            $status=$this->data['status'];
        }
        // 待支付订单保留时间
        $res = Db("config")->where(['c_code'=>'PO_UNPAID'])->find();
        $max_pay_time = 24;
        if(!empty($res1)){
            $max_pay_time = $res['c_value'];
        }
        $where['o.m_id'] = $m_id;
        $where['o.o_isdelete'] = ['lt',3];
        //订单状态
        switch ($status)
        {
            case 0:
                // 全部（我参拍的）
                $where['o.o_state'] = ['in','0,1,10'];
                break;
            case 1:
                // 待付款（我参拍的）
                $where['o.o_paystate'] = 1;
                //$where['o.o_addtime'] = ['gt',(time() - $max_pay_time * 60 * 60)];
                break;
            case 2:
                // 参拍中（我参拍的）
                $where['o.o_paystate'] = 2;
                $where['o.o_state'] = 1;
                break;
            case 3:
                // 未拍中（我参拍的）
                $where['o.o_state'] = 10;
                break;
            case 4:
                $where = '';
                $where = "o.m_id = " . $m_id . " and (( o.o_paystate = 4 and o.o_state = 10 and o.o_isdelete = 1 ) or ( o.o_isdelete = 2 ))";
                break;
            case 10:
                // 全部（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = ['between','2,5'];
                break;
            case 11:
                // 待发货（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = 2;
                break;
            case 12:
                // 待收货（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = 3;
                break;
            case 13:
                // 待评价（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = 4;
                break;
            case 14:
                // 退款/售后（我拍中的）
                $where['o.o_paystate'] = ['gt',2];
                break;
            case 15:
                // 已完成（我拍中的）
                $where['o.o_paystate'] = ['gt',1];
                $where['o.o_state'] = 5;
                break;
            default:
                // 全部（我参拍的）
                break;
        }
        $orderPai = new OrderPaiService();
        $order='o.o_id desc';
        $field='o.o_id,o.store_id,o.o_money,o.o_paystate,o.o_state,o.gp_id,o.gp_num,o.o_addtime,o.o_paytime,o.o_totalmoney,o.gdr_id,o.o_periods,o.o_isdelete,o.o_gp_settlement_price,gp.gp_market_price,gp.g_id,
gp.gp_img,g.g_name,g.g_endtime,s.stroe_name,s.store_logo';
        $limit = (($page-1) * $size).','.$size;
        $list = $orderPai->get_order_detail_limit_list($where,$order,$field,$limit);
        $c=Db::table("pai_order_pai")->alias("o")->where($where)->count();
        $page_count=ceil($c/$size);
       var_dump($c);die;
    }
    public function storeindex(){

        $m_id=100;
        $g_storeid =10;
        $store = new StoreService();
        $store_id = $store->get_value(['store_id'=>$g_storeid],'store_id');
        if(!$store_id){
            $this->response_error("该店铺不存在");
        }
        if(!empty($this->data['g_name']))
        {
            $g_name = $this->data['g_name'];
        }

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
        if (empty($this->data['order'])) {
            $order = 1;
        } else {
            $order = $this->data['order'];
        }
        $goods = new GoodsService();
        $where = [
            'g.g_storeid'=>$g_storeid,
            'g.g_state'=>6,
        ];
        if(!empty($g_name)){
            $where['g.g_name'] = ['like','%'.$g_name.'%'];
        }
        switch($order){
            case 2:     //新品排序
                $order = 'g.g_addtime desc';
                break;
            case 3:     //人数正序
                $order = 'sum_gp_num asc';
                break;
            case 4:     //人数倒叙
                $order = 'sum_gp_num desc';
                break;
            case 5:     //价格正序
                $order = 'p.gp_market_price asc';
                break;
            case 6:     //价格倒叙
                $order = 'p.gp_market_price desc';
                break;
            default:    //综合排序
                $order = 'g.g_score desc,g.g_starttime desc';
                break;
        }
        $field='g.g_id,g.g_name,g.g_img,g.g_starttime,p.gp_market_price,min(dtr.gdr_price)min_price,max(dtr.gdr_price)max_price,sum(op.gp_num) sum_gp_num';
        $list = $goods->shop_list($where,$field,$order,$page_size,$page);

        //店铺logo和名称
        $where2 = [
            'store_id'=>$g_storeid,
        ];
        $store_info = $store->storeInfo($where2,'store_id,stroe_name,store_logo');
        //店铺被收藏数量
        $collection = new StoreCollectionService();
        $store_info['num'] = $collection ->get_num($where2);
        //是否已收藏 1是 2否
        $store_info['is_collection'] = '';
        if((int)$m_id){
            $where3 = [
                'm_id'=>$m_id,
                'store_id'=>$g_storeid,
            ];
            $store_info['is_collection'] = $collection->get_count($where3) ? 1 : 2;

        }
        $store_info['is_login'] = (int)$m_id ? 1 : 0 ;
        $data=array();
        $data['list']=$list['list'];
        $data['store_info']=$store_info;
        $page_count=$list['totle_page'];
       var_dump($data);die;
    }
    public function getindex1(){

        if (empty($this->data['wi_type'])) {
            $wi_type =1;
        }
        else{
            $wi_type=$this->data['wi_type'];
        }
        $wit = new WebImagesTypeService();
        $where_sydh = [
            'wi.wi_type'=>$wi_type,
            'wi.wi_state'=>0,
            'wit.wit_code'=>'sydh',
        ];
        //分类图片(轮播图/广告/导航)
        $sydh_img = $wit->get_web_img($where_sydh,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href');
        if(!empty($sydh_img)){
            foreach($sydh_img as $k1=>$v1){
                $sydh_img[$k1]['wi_imgurl']=CDN_URL.$v1['wi_imgurl'];
            }
        }

        $where_hd = [
            'wi.wi_type'=>1,
            'wi.wi_state'=>0,
            'wit.wit_code'=>'hd',
        ];
        //分类图片(轮播图/广告/导航)
        $hd_img = $wit->get_web_img($where_hd,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href');
        if(!empty($hd_img)){
            foreach($hd_img as $k2=>$v2){
                $hd_img[$k2]['wi_imgurl']=CDN_URL.$v2['wi_imgurl'];
            }
        }
        $where_ad = [
            'wi.wi_type'=>1,
            'wi.wi_state'=>0,
            'wit.wit_code'=>'syad',
        ];
        //分类图片(轮播图/广告/导航)
        $ad_img = $wit->get_web_img($where_ad,$order='wi.wi_sort asc',$field='wit.wit_name,wit.wit_code,wi.wi_name,wi.wi_imgurl,wi.wi_href');

        if(!empty($ad_img)){
            foreach($ad_img as $kad=>$vad){
                $ad_img[$kad]['wi_imgurl']=CDN_URL. $vad['wi_imgurl'];
            }
        }
        $data=array();
        $data['hd']=$hd_img;
        $data['sydh']=$sydh_img;
        $data['ad']=$ad_img;
       var_dump($data);die;
    }

    public function edit_pwd()
    {
        return $this->fetch();
    }

    public function add_role()
    {
        return $this->fetch();
    }

    public function edit_role()
    {
        return $this->fetch();
    }

    public function add_authority()
    {
        return $this->fetch();
    }

    public function edit_authority()
    {
        return $this->fetch();
    }

    public function authoritylist()
    {
        return $this->fetch();
    }

    public function apply_store_success()
    {
        return $this->fetch();
    }
    public function apply_store()
    {
        return $this->fetch();
    }

}
