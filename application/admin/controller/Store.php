<?php
namespace app\admin\controller;
use app\data\service\admit\AdmitService;
use app\data\service\store\StoreCategoryService;
use app\data\service\store\StoreService;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use think\Db;
class Store extends AdminHome
{

	/**
     * 后台登录页面
     */
    public function index()
    {
        $store = new \app\data\service\store\StoreCategoryService();
        $clist=$store->storecategoryList();
        if(!empty($clist)){
            foreach($clist as $k=>$v)
            {
                if($v['sc_parent_id']=='0')
                {
                    $clist[$k]['sc_parent_name']="顶级分类";
                }
                $where ="sc_id=".$v['sc_parent_id'];
                $cdata=$store->storecategoryInfo($where);
                if(!empty($cdata))
                {
                    $clist[$k]['sc_parent_name']=$cdata['sc_name'];
                }
            }
        }

        $this->assign('clist',$clist);
        return $this->fetch();
    }
    /**
     * 添加商家分类页面
     */
    public function storecategoryadd()
    {
        $store = new \app\data\service\store\StoreCategoryService();
        $data=array();
        if(!empty($_GET['id'])){
            $where ="sc_id=".$_GET['id'];
            $data=$store->storecategoryInfo($where);
        }
        $this->assign('data',$data);
        $clist=$store->storecategoryList();
        $this->assign('clist',$clist);
        return $this->fetch();
    }
    /**
     * 添加商家分类方法
     */
    public function dostorecategoryadd()
    {
        $store = new \app\data\service\store\StoreCategoryService();
        $sc_name=input('post.sc_name');
        if(empty($sc_name))
        {
            $this->error('商家分类名称不能为空!');
        }
        $sc_parent_id=input('post.sc_parent_id');
        $sc_sort=input('post.sc_sort');
        if(empty($sc_parent_id))
        {
            $sc_parent_id=0;
        }
        if(empty($sc_sort)){
            $sc_sort=0;
        }
        $data=array();
        $data['sc_name']=$sc_name;
        $data['sc_parent_id']=$sc_parent_id;
        $data['sc_sort']=$sc_sort;
        if($sc_parent_id=='0')
        {
            $sc_level='0';
        }
        else{
            $where ="sc_id=".$sc_parent_id;
            $cdata=$store->storecategoryInfo($where);
            if(!empty($cdata))
            {
              $sc_level=$cdata['sc_level']+1;
            }
        }
        $data['sc_level']=$sc_level;
        $sc_id=input('post.sc_id');
        if(!empty($sc_id))
        {
            $where_u="sc_id=".$sc_id;
            $res=$store->storecategorySave($where_u,$data);
        }
        else{
            $res=$store->storecategoryAdd($data);
        }
        if($res) {
           $this->success("管理商家分类成功",url("store/index"));
        }
        else{
            $this->error("管理商家分类失败");
        }

    }

    /**
     * @return mixed
     * 申请成为商家列表
     * 邓赛赛
     */
    public function applylist(){
        $ba_state = input('get.ba_state');
        $ba_state = empty($ba_state) ? 0 : $ba_state;
        $where = [
            'ba_state'=>$ba_state
        ];
        $admit = new AdmitService();
        $list = $admit->getBusinessAuthList($where);
        $page = $list->render();
        $total = $list->total();

        $category = new StoreCategoryService();
        $categoryList = $category-> storecategoryList();
        $categoryList = array_column($categoryList,"sc_name","sc_id");

        $this->assign([
                'list'=>$list,
                'categoryList'=>$categoryList,
                'page'=>$page,
                'total'=>$total,
                'ba_state'=>$ba_state
            ]);
        return $this->fetch();
    }



    /**
     * 查看此入驻详情
     * @return mixed
     * 邓赛赛
     */
    public function applyinfo(){
        $id = input('get.ba_id');
        $ba_state = input('get.ba_state');
        $db = "pai_business_auth";
        $where = [
            'ba_id'=>$id
        ];
        $store = new StoreService();
        $info = $store->BusinessAuthInfo($db,$where);
        $category = new StoreCategoryService();
        $categoryList = $category-> storecategoryList();
        $categoryList = array_column($categoryList,"sc_name","sc_id");
        $address = [
            'pid'=>$info['pid'],
            'cid'=>$info['cid'],
            'aid'=>$info['aid'],
        ];
        $info['address'] = $category->id_tfm_address($address).' '.$info['address'];
//        dump($info);die;
        $this->assign(['info'=>$info,'categoryList'=>$categoryList,'ba_state'=>$ba_state]);
        return $this->fetch();
    }
    /**
     * @return mixed
     * 审核商家
     * 邓赛赛
     */
    public function auditing(){
        $data['ba_id'] = input('get.ba_id');
        $data['ba_state'] = input('get.ba_state');
        $data['ba_type'] = input('get.ba_type');
        $data['ba_describe'] = trim(input('get.ba_describe'));

        $where = [
            'ba_id'=>$data['ba_id'],
        ];
        if($data['ba_state'] == 9){
            unset($data['ba_type']);
        }
        $update = [
            'ba_state'=>$data['ba_state'],
            'ba_type'=>empty($data['ba_type']) ? 0 :$data['ba_type'] ,
            'ba_describe'=>$data['ba_describe']
        ];
        $store = new StoreService();
        $res = $store->setState($where,$update);
        if($res){
            $this->success("操作成功",'/admin/store/applylist','',1);
        }else{
            $this->error("失败,请稍后重试",'/admin/store/applylist','',1);
        }
    }

    /**
     * 商家列表
     * 邓赛赛
     */
    public function storelist(){
        $tj_value = input('param.tj_value');
//        dump($tj_value);die;
        $store = new StoreService();
        $where = [
            'store_state'=>0
        ];
        if($tj_value){
            $where['store_tj'] = ['>',0];
        }
        $list = $store->get_page_list($where, '*', 'add_time desc', 10);
        $category = new StoreCategoryService();
        $categoryList = $category-> storecategoryList();
        $categoryList = array_column($categoryList,"sc_name","sc_id");
        $num = empty(input('get.page')) ? 1 : input('get.page');    //当前页
        $total = $list->total();
        $page = $list->render();
        $this->assign('tj_value',$tj_value);
        $this->assign('num',$num);
        $this->assign('total',$total);
        $this->assign('page',$page);
        $this->assign('list',$list);
        $this->assign('categoryList',$categoryList);
        return view();
    }

    /**
     * 设置店铺推荐
     * 邓赛赛
     */
    public function  set_store(){
        $store_id = input('param.store_id');
        $store_tj = input('param.store_tj');
        $page = input('param.page');
        $store = new StoreService();
        $res = $store->get_save(['store_id'=>$store_id],['store_tj'=>$store_tj]);
        if($res){
            $this->success("操作成功",'/admin/store/storelist?page='.$page,'',1);
        }else{
            $this->error("失败,请稍后重试",'/admin/store/storelist?page='.$page,'',1);
        }
    }


}
