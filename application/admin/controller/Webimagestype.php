<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use app\data\service\webImagesType\WebImagesTypeService as WebImagesTypeService;

class Webimagestype extends AdminHome
{
    /*
    * 图片分类列表
    * 创建人 刘勇豪
    * 时间 2018-07-06 13:40:00
    */
    public function index()
    {
        $webImagesType = new WebImagesTypeService();
        $list = $webImagesType->webImagesTypePaginate('','*','wit_id desc',10);

        $page = $list->render();
        $total = $list->total();

        $this->assign('page', $page);
        $this->assign('total', $total);
        $this->assign('list', $list);
        return $this->fetch();
    }

    /*
    * 图片分类编辑
    * 创建人 刘勇豪
    * 时间 2018-07-06 13:40:00
    */
    public function edit()
    {
        $wit_id = input('request.wit_id', 0);
        $webImagesType = new WebImagesTypeService();

        //表单提交
        if (request()->isPost()) {
            //表单数据
            if($wit_id){
                // 修改
                $data = $webImagesType->inputData('edit');
            }else{
                // 添加
                $data = $webImagesType->inputData('add');
            }

            //表单验证
            $error_msg = $webImagesType->checkData($data);
            if ($error_msg) {
                $this->error($error_msg, url('Webimagestype/edit') . "?wit_id=" . $wit_id, 3);
            }

            if ($wit_id) {
                // 修改
                $where_save['wit_id'] = $wit_id;
                $res = $webImagesType->webImagesTypeSave($where_save, $data);
                if (!$res) {
                    $this->error('修改图片分类失败', url('Webimagestype/edit') . "?wit_id=" . $wit_id, 3);
                }
                $this->success("修改图片分类成功！", url('Webimagestype/index'), 3);
            } else {
                //添加
                $res = $webImagesType->webImagesTypeAdd($data);
                if (!$res) {
                    $this->error('添加图片分类失败', url('Webimagestype/edit'), 3);
                }
                $this->success("添加图片分类成功！", url('Webimagestype/index'), 3);
            }
        }

        //查询图片分类详情
        $info = [];
        if ($wit_id) {
            $where_find['wit_id'] = $wit_id;
            $info = $webImagesType->webImagesTypeInfo($where_find);
            if (empty($info)) {
                $this->error("非法请求，资源不存在！", url('Webimagestype/index'), 3);
            }
        }

        $this->assign('info', $info);
        $this->assign('wit_id', $wit_id);
        return $this->fetch();
    }

    /*
    * 图片分类删除
    * 创建人 刘勇豪
    * 时间 2018-07-06 13:40:00
    */
    public function delete()
    {
        $wit_id = input('request.wit_id', 0);
        if (!$wit_id || !is_numeric($wit_id)) {
            $this->error("非法请求！", url('Webimagestype/index'), 3);
        }

        // 删除
        $webImagesType = new WebImagesTypeService();
        $res = $webImagesType->webImagesTypeDel(['wit_id' => $wit_id]);

        if (!$res) {
            $this->error("图片分类删除失败！", url('Webimagestype/index'), 3);
        }

        $this->success("图片分类删除成功！", url('Webimagestype/index'), 3);
    }
}
