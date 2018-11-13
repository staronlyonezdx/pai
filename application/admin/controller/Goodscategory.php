<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\goodsCategory\GoodsCategoryService as GoodsCategoryService;

class Goodscategory extends AdminHome
{

	/*
	* 商品分类列表
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/	
	public function index()
	{
        $goodsCategory = new GoodsCategoryService();
        $list = $goodsCategory->goodsCategoryList();

        if(!empty($list)){
            foreach($list as $k => $v){
                $parent_id = $v['parent_id'];
                if($parent_id == 0){
                    $list[$k]['pname'] = "顶级分类";
                }else{
                    $pinfo = $goodsCategory->goodsCategoryInfo(['gc_id' => $parent_id]);
                    $pinfo && $list[$k]['pname'] = $pinfo['gc_name'];
                }
            }
        }

        //转树状数组
//        if(!empty($list)){
//            $tree = $this->getTree($list, 0);
//            $list = $tree;
//        }
        $this->assign('list', $list);
		return $this->fetch();
	}
	
	/*
	* 商品分类编辑
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/	
	public function edit()
	{
        $gc_id = input('request.gc_id',0);
        $goodsCategory = new GoodsCategoryService();

        //表单提交
        if(request()->isPost()){
            $file = request()->file();
            $base = new BaseService();

            // 分类图片
            if(!empty($file['gc_img'])){
                $back1 = $base->upload('gc_img', 'gc_img', 2);
                $data['gc_img'] = $back1['thumb'];
            }

            // banner图片
            if(!empty($file['gc_banner_img'])){
                $back2 = $base->upload('gc_banner_img', 'gc_banner_img',2);
                $data['gc_banner_img'] = $back2['info'];
            }

            //表单数据
            $data['gc_name'] = input('post.gc_name','');
            $data['parent_id'] = input('post.parent_id','');
            $data['state'] = input('post.state',0);
            $data['gc_is_tj'] = input('post.gc_is_tj',0);


            //表单验证
            $error_msg = $goodsCategory->checkData($data);
            if($error_msg){
                $this->error($error_msg, url('goodscategory/edit')."?gc_id=".$gc_id, 3);
            }
            $data['level'] = $this->getLevel2($data['parent_id']);

            if($gc_id){
                // 修改
                $where_save['gc_id'] = $gc_id;
                $res = $goodsCategory ->goodsCategorySave($where_save, $data);
                if(!$res){
                    $this->error('修改分类失败', url('goodscategory/edit')."?gc_id=".$gc_id, 3);
                }
                $this->success("修改分类成功！", url('goodscategory/index'), 3);
            }else{
                //添加
                $res = $goodsCategory ->goodsCategoryAdd($data);
                if(!$res){
                    $this->error('添加分类失败', url('goodscategory/edit'), 3);
                }
                $this->success("添加分类成功！", url('goodscategory/index'), 3);
            }
        }

        //查询分类详情
        $info=[];
        if($gc_id){
            $where_find['gc_id']=$gc_id;
            $info = $goodsCategory->goodsCategoryInfo($where_find);
            if(empty($info)){
                $this->error("非法请求，分类不存在！", url('goodscategory/index'), 3);
            }
        }

        //分类列表
        $where_list['state'] = 0;
        $catelist = $goodsCategory->goodsCategoryList($where_list);

        $this->assign('info', $info);
        $this->assign('catelist', $catelist);
        $this->assign('gc_id', $gc_id);
		return $this->fetch();
	}
	
	/*
	* 商品分类删除
	* 创建人 刘勇豪
	* 时间 2018-06-26 13:40:00
	*/
	public function delete()
	{
        $gc_id = input('request.gc_id',0);
        if(!$gc_id || !is_numeric($gc_id)){
            $this->error("非法请求！", url('goodscategory/index'), 3);
        }
        $goodsCategory = new GoodsCategoryService();

        //判断该分类下有无子分类，有子分类不能删除
        $where_exist['parent_id'] = $gc_id;
        $where_exist['state'] = 0;
        $count = $goodsCategory->goodsCategoryCount($where_exist);
        if($count > 0){
            $this->error("该分类下有子分类，不能删除！", url('goodscategory/index'), 3);
        }

        // 删除
        $res = $goodsCategory->goodsCategoryDel(['gc_id'=>$gc_id]);

        if(!$res){
            $this->error("分类删除失败！", url('goodscategory/index'), 3);
        }

        $this->success("分类删除成功！", url('goodscategory/index'), 3);
	}

    /**
     * 商品分类树状数组
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getTree($data, $pId)
    {
        $tree = '';
        foreach($data as $k => $v)
        {
            if($v['parent_id'] == $pId)
            {
                //父亲找到儿子
                $v['children'] = $this->getTree($data, $v['gc_id']);
                $tree[] = $v;
                unset($data[$k]);
            }
        }
        return $tree;
    }

    /**
     * 判断层级(递归不可用)
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getLevel($parent_id,$level=1)
    {
        $goodsCategory = new GoodsCategoryService();
        if($parent_id != 0){
            $info = $goodsCategory->goodsCategoryInfo(['gc_id'=>$parent_id]);
            if(empty($info)){
                return false;
            }else{
                $level++;
                $parent_id = $info['gc_id'];
                unset($goodsCategory);
                $this->getLevel($parent_id,$level);
            }
        }
        return $level;
    }

    /**
     * 判断层级（临时用）
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getLevel2($parent_id)
    {
        $level=1;
        $goodsCategory = new GoodsCategoryService();

        $list = $goodsCategory->goodsCategoryList();
        if(empty($list)){
            return $level;
        }else{
            $tree = $this->getTree($list, 0);
            $list = $tree;
            foreach($list as $v){
                if($v['parent_id'] == $parent_id){
                    return 1;
                }
                if(is_array($v['children'])){
                    $list1 = $v['children'];
                    foreach($list1 as $v1){
                        if($v1['parent_id'] == $parent_id){
                            return 2;
                        }
                        if(is_array($v1['children'])){
                            $list2 = $v1['children'];
                            foreach($list2 as $v2){
                                if($v2['parent_id'] == $parent_id){
                                    return 3;
                                }
                                if(is_array($v2['children'])){
                                    $list3 = $v2['children'];
                                    foreach($list3 as $v3){
                                        if($v3['parent_id'] == $parent_id){
                                            return 4;
                                        }
                                        if(is_array($v3['children'])){
                                            return 5;
                                        }else{
                                            return false;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
