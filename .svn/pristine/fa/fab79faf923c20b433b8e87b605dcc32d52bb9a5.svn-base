<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/11/15
 * Time: 17:54
 */

namespace app\admin\controller;


use think\Db;

class Appedition extends AdminHome
{
    //版本列表
    public function index(){
        $clist = Db('app_version')->order('updatetime desc')->select();
        $this->assign('clist',$clist);
        return $this->fetch();
    }
    //添加页面
    public function appadd(){
        $id = input('param.id');//版本id
        if(!empty($id)){
            $info = Db('app_version')->where('id',$id)->find();
            $this->assign('info',$info);
        }
        return $this->fetch();
    }
    //添加与编辑
    public function add(){
        $id = input('param.id');//版本id
        $app_version=input('param.app_version');//版本号
        $updatemsg = input('param.updatemsg');//更新内容
        $downloadurl = input('param.downloadurl');//下载链接
        $updatetype = input('param.updatetype');//更新类型
        $app_type = input('param.app_type');//版本机型
        if(empty($app_version)){
            $this->error('版本号不能为空!');
        }
        if(empty($updatemsg)){
            $this->error('更新内容不能为空!');
        }
        if(empty($downloadurl)){
            $this->error('下载链接不能为空!');
        }
        if(empty($updatetype) && $updatetype != 0){
            $this->error('更新类型不能为空!');
        }
        if(empty($app_type)){
            $this->error('版本机型不能为空!');
        }
        $end_data = array(
            'app_version'=>$app_version,
            'updatemsg'=>$updatemsg,
            'downloadurl'=>$downloadurl,
            'updatetype'=>$updatetype,
            'updatetime'=>time(),
            'app_type'=>$app_type,
        );
        if(empty($id)){
            $res = Db('app_version')->insert($end_data);
            if($res){
                $this->success('添加成功',url('appedition/index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $res = Db('app_version')->where('id',$id)->update($end_data);
            if($res){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }
    }
    //删除
    public function delete(){
        $id = input('param.id');
        if(empty($id)){
            $this->error('非法操作');
        }
        $res = Db('app_version')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}