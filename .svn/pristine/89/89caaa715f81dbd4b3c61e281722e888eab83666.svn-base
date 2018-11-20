<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/11/20
 * Time: 15:16
 */

namespace app\admin\controller;


use app\data\service\BaseService;
use think\Db;

class Banklogo extends AdminHome
{
    //银行列表
    public function index(){
        $clist = Db('bank')->select();
        $this->assign('clist',$clist);
        return $this->fetch();
    }
    //添加页面
    public function addpage(){
        $b_id = input('param.b_id');//id
        if(!empty($b_id)){
            $info = Db('bank')->where('b_id',$b_id)->find();
            $this->assign('info',$info);
        }
        return $this->fetch();
    }
    //添加
    public function add(){
        $b_id = input('param.b_id');//银行id
        if(request()->isPost()){
            $file = request()->file();
            $base = new BaseService();
            // logo图片
            if(!empty($file['b_banklogo'])){
                $back1 = $base->upload('b_banklogo', 'b_banklogo', 2);
                $b_banklogo = $back1['thumb'];
            }
            $b_bankname=input('param.b_bankname');//银行名称
            $b_bankcode = input('param.b_bankcode');//银行唯一编码
            $b_bankcolor = input('param.b_bankcolor');//对应颜色
            if(empty($b_banklogo)){
                $this->error('银行logo不为空');
            }
            if(empty($b_bankname)){
                $this->error('银行名称不为空');
            }
            if(empty($b_bankcode)){
                $this->error('银行唯一编码不为空');
            }
            if(empty($b_bankcolor)){
                $this->error('对应颜色不为空');
            }
            $data = array(
                'b_bankname'=>$b_bankname,
                'b_bankcode'=>$b_bankcode,
                'b_bankcolor'=>$b_bankcolor,
                'b_banklogo'=>$b_banklogo,
            );
            //修改
            if($b_id){
                $where['b_id'] = $b_id;
                $res = Db('bank')->where($where)->update($data);
                if($res){
                    $this->success('修改成功',url('banklogo/index'));
                }else{
                    $this->error('修改失败');
                }
            }else{//添加
                $res = Db('bank')->insertGetId($data);
                if($res){
                    $this->success('添加成功',url('banklogo/index'));
                }else{
                    $this->error('添加失败');
                }
            }
        }
    }
    //删除
    public function delete(){
        $b_id = input('param.b_id');
        if(empty($b_id)){
            $this->error('非法操作');
        }
        $res = Db('bank')->where('b_id',$b_id)->delete();
        if($res){
            $this->success('删除成功',url('banklogo/index'));
        }else{
            $this->error('删除失败');
        }
    }
}