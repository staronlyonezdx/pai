<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\goodsType\GoodsTypeService as GoodsTypeService;

class Goodstype extends AdminHome
{
    /*
    * 商品规格列表
    * 创建人 刘勇豪
    * 时间 2018-06-26 13:40:00
    */
    public function index()
    {
        $goodsType = new GoodsTypeService();
        $list = $goodsType->goodsTypeList();
        if (!empty($list)) {
            foreach ($list as $k => $v) {
                $gt_parent_id = $v['gt_parent_id'];
                if ($gt_parent_id == 0) {
                    $list[$k]['pname'] = "顶级规格";
                } else {
                    $pinfo = $goodsType->goodsTypeInfo(['gt_id' => $gt_parent_id]);
                    $pinfo && $list[$k]['pname'] = $pinfo['gt_name'];
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
    * 商品规格编辑
    * 创建人 刘勇豪
    * 时间 2018-06-26 13:40:00
    */
    public function edit()
    {
        $gt_id = input('request.gt_id', 0);
        $goodsType = new GoodsTypeService();

        //表单提交
        if (request()->isPost()) {
            //表单数据
            $data['gt_name'] = input('post.gt_name', '');
            $data['gt_parent_id'] = input('post.gt_parent_id', '');
            $data['gt_level'] = input('post.gt_level', 1);
            $data['gt_state'] = input('post.gt_state', 0);

            //表单验证
            $error_msg = $goodsType->checkData($data);
            if ($error_msg) {
                $this->error($error_msg, url('goodstype/edit') . "?gt_id=" . $gt_id, 3);
            }

            if ($gt_id) {
                // 修改
                $where_save['gt_id'] = $gt_id;
                $res = $goodsType->goodsTypeSave($where_save, $data);
                if (!$res) {
                    $this->error('修改规格失败', url('goodstype/edit') . "?gt_id=" . $gt_id, 3);
                }
                $this->success("修改规格成功！", url('goodstype/index'), 3);
            } else {
                //添加
                $res = $goodsType->goodsTypeAdd($data);
                if (!$res) {
                    $this->error('添加规格失败', url('goodstype/edit'), 3);
                }
                $this->success("添加规格成功！", url('goodstype/index'), 3);
            }
        }

        //查询规格详情
        $info = [];
        $level = 0;
        if ($gt_id) {
            $where_find['gt_id'] = $gt_id;
            $info = $goodsType->goodsTypeInfo($where_find);
            if (empty($info)) {
                $this->error("非法请求，规格不存在！", url('goodstype/index'), 3);
            }
            $level = $info['gt_level'];
        }

        //规格列表
        $where_list['gt_state'] = 0;
        $typelist = $goodsType->goodsTypeList($where_list);

        // 上级规格列表
        $p_typeList = $this->getPTypeList($level);
        if($p_typeList['status'] == 0){
            $this->error($p_typeList['msg'], url('goodstype/index'), 3);
        }

        $this->assign('info', $info);
        $this->assign('typelist', $typelist);
        $this->assign('opt_html', $p_typeList['data']);
        $this->assign('gt_id', $gt_id);
        return $this->fetch();
    }

    /*
    * 商品规格删除
    * 创建人 刘勇豪
    * 时间 2018-06-26 13:40:00
    */
    public function delete()
    {
        $gt_id = input('request.gt_id', 0);
        if (!$gt_id || !is_numeric($gt_id)) {
            $this->error("非法请求！", url('goodstype/index'), 3);
        }
        $goodsType = new GoodsTypeService();

        //判断该规格下有无子规格，有子规格不能删除
        $where_exist['gt_parent_id'] = $gt_id;
        $where_exist['gt_state'] = 0;
        $count = $goodsType->goodsTypeCount($where_exist);
        if ($count > 0) {
            $this->error("该规格下有子规格，不能删除！", url('goodstype/index'), 3);
        }

        // 删除
        $res = $goodsType->goodsTypeDel(['gt_id' => $gt_id]);

        if (!$res) {
            $this->error("规格删除失败！", url('goodstype/index'), 3);
        }

        $this->success("规格删除成功！", url('goodstype/index'), 3);
    }

    /**
     * ajax动态获取商品规格
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getPTypeList($level=0){
        if($level){
            $gt_level = $level;
        }else{
            $gt_level = input('request.gt_level', 1);
        }

        if(!$gt_level){
            return ['status'=>0,'msg'=>'缺少参数！','data'=>''];
        }

        $goodsType = new GoodsTypeService();

        $p_level = $gt_level - 1;

        if($p_level == 0){
            $p_typeList[0] = ['gt_id'=>0,'gt_name'=>'顶级分类','gt_parent_id'=>0,'gt_level'=>0,'gt_state'=>0];
        }else{
            $where_list['gt_level'] = $p_level;
            $p_typeList = $goodsType->goodsTypeList($where_list);
        }

        if(empty($p_typeList)){
            return ['status'=>0,'msg'=>'列表空！','data'=>''];
        }
        // 生成动态html
        $opt_html = '';
        foreach($p_typeList as $v){
            $opt_html .= "<option value=".$v['gt_id'].">".$v['gt_name']."</option>";
        }

        return ['status'=>1,'msg'=>'success','data'=>$opt_html];
    }

    /**
     * 商品规格树状数组
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getTree($data, $pId)
    {
        $tree = '';
        foreach ($data as $k => $v) {
            if ($v['gt_parent_id'] == $pId) {
                //父亲找到儿子
                $v['children'] = $this->getTree($data, $v['gt_id']);
                $tree[] = $v;
                unset($data[$k]);
            }
        }
        return $tree;
    }

    /**
     * 判断层级(不可用)
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getLevel($gt_parent_id, $level = 1)
    {
        $goodsType = new GoodsTypeService();
        if ($gt_parent_id != 0) {
            $info = $goodsType->goodsTypeInfo(['gt_id' => $gt_parent_id]);
            if (empty($info)) {
                return false;
            } else {
                $level++;
                $gt_parent_id = $info['gt_id'];
                unset($goodsType);
                $this->getLevel($gt_parent_id, $level);
            }
        }
        return $level;
    }

    /**
     * 判断层级（临时用）
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getLevel2($gt_parent_id)
    {
        $level = 1;
        $goodsType = new GoodsTypeService();

        $list = $goodsType->goodsTypeList();
        if (empty($list)) {
            return $level;
        } else {
            $tree = $this->getTree($list, 0);
            $list = $tree;
            foreach ($list as $v) {
                if ($v['gt_parent_id'] == $gt_parent_id) {
                    return 1;
                }
                if (is_array($v['children'])) {
                    $list1 = $v['children'];
                    foreach ($list1 as $v1) {
                        if ($v1['gt_parent_id'] == $gt_parent_id) {
                            return 2;
                        }
                        if (is_array($v1['children'])) {
                            $list2 = $v1['children'];
                            foreach ($list2 as $v2) {
                                if ($v2['gt_parent_id'] == $gt_parent_id) {
                                    return 3;
                                }
                                if (is_array($v2['children'])) {
                                    $list3 = $v2['children'];
                                    foreach ($list3 as $v3) {
                                        if ($v3['gt_parent_id'] == $gt_parent_id) {
                                            return 4;
                                        }
                                        if (is_array($v3['children'])) {
                                            return 5;
                                        } else {
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
