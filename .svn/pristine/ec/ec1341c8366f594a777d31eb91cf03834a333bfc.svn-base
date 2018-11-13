<?php
namespace app\admin\controller;

use app\data\service\article\ArticleService;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\articleType\ArticleTypeService as ArticleTypeService;

class Articletype extends AdminHome
{
    /*
    * 文章分类列表
    * 创建人 刘勇豪
    * 时间 2018-07-14 16:40:00
    */
    public function index()
    {
        $articleType = new ArticleTypeService();
        $list = $articleType->articleTypeList();
        if (!empty($list)) {
            foreach ($list as $k => $v) {
                $at_parentid = $v['at_parentid'];
                if ($at_parentid == 0) {
                    $list[$k]['pname'] = "顶级分类";
                } else {
                    $pinfo = $articleType->articleTypeInfo(['at_id' => $at_parentid]);
                    $pinfo && $list[$k]['pname'] = $pinfo['at_name'];
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
    * 文章分类编辑
    * 创建人 刘勇豪
    * 时间 2018-07-14 16:40:00
    */
    public function edit()
    {
        $at_id = input('request.at_id', 0);
        $articleType = new ArticleTypeService();

        //表单提交
        if (request()->isPost()) {
            //表单数据
            $data['at_name']        = input('post.at_name', '');
            $data['at_parentid']    = input('post.at_parentid', 0);
            $data['at_state']       = input('post.at_state', 0);


            //表单验证
            $error_msg = $articleType->checkData($data,$at_id);
            if ($error_msg) {
                $this->error($error_msg, url('articletype/edit') . "?at_id=" . $at_id, 3);
            }

            $resources     = request()->file('at_img');
            if($resources){
                $a_type         = new ArticleTypeService();
                $data['at_img'] = $a_type->upload('a_img', 'at_img');
            }


            if ($at_id) {
                // 修改
                $where_save['at_id'] = $at_id;
                $res = $articleType->articleTypeSave($where_save, $data);
                if (!$res) {
                    $this->error('修改分类失败', url('articletype/edit') . "?at_id=" . $at_id, 3);
                }
                $this->success("修改分类成功！", url('articletype/index'), 3);
            } else {
                //添加
                $res = $articleType->articleTypeAdd($data);
                if (!$res) {
                    $this->error('添加分类失败', url('articletype/edit'), 3);
                }
                $this->success("添加分类成功！", url('articletype/index'), 3);
            }
        }

        //查询分类详情
        $info = [];
        if ($at_id) {
            $where_find['at_id'] = $at_id;
            $info = $articleType->articleTypeInfo($where_find);
            if (empty($info)) {
                $this->error("非法请求，分类不存在！", url('articletype/index'), 3);
            }
        }

        //分类列表
        $where_list['at_state'] = 0;
        $typelist = $articleType->articleTypeList($where_list);
//        dump($info);die;
        $this->assign('info', $info);
        $this->assign('typelist', $typelist);
        $this->assign('at_id', $at_id);
        return $this->fetch();
    }

    /*
    * 文章分类删除
    * 创建人 刘勇豪
    * 时间 2018-07-14 16:40:00
    */
    public function delete()
    {
        $at_id = input('request.at_id', 0);
        if (!$at_id || !is_numeric($at_id)) {
            $this->error("非法请求！", url('articletype/index'), 3);
        }
        $articleType = new ArticleTypeService();

        //判断该分类下有无子分类，有子分类不能删除
        $where_exist['at_parentid'] = $at_id;
        $count = $articleType->articleTypeCount($where_exist);
        if ($count > 0) {
            $this->error("该分类下有子分类，不能删除！", url('articletype/index'), 3);
        }

        // 删除
        $res = $articleType->articleTypeDel(['at_id' => $at_id]);
        if (!$res) {
            $this->error("分类删除失败！", url('articletype/index'), 3);
        }

        $this->success("分类删除成功！", url('articletype/index'), 3);
    }

    /**
     * 文章分类树状数组
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function getTree($data, $pId)
    {
        $tree = '';
        foreach ($data as $k => $v) {
            if ($v['at_parentid'] == $pId) {
                //父亲找到儿子
                $v['children'] = $this->getTree($data, $v['at_id']);
                $tree[] = $v;
                unset($data[$k]);
            }
        }
        return $tree;
    }
}
