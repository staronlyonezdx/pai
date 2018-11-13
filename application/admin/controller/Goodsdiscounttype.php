<?php
namespace app\admin\controller;


use app\data\service\goodsDiscounttype\GoodsDiscounttypeService;

class Goodsdiscounttype extends AdminHome
{
    /**
     * 折扣列表
     * 邓赛赛
     */
    public function index(){
        $discount = new GoodsDiscounttypeService();
        $where = [
            'gdt_state'=>0
        ];
        $list = $discount->goods_discounttype_list($where,'gdt_id desc','*');
        $this->assign([
            'list'=>$list,
        ]);
        return $this->fetch();
    }

    /**
     * 添加折扣
     * 邓赛赛
     */
    public function add(){
        if(request()->isPost()){
            $data['gdt_name'] = input('post.gdt_name');
            $data['gdt_money1'] = input('post.gdt_money1');
            $data['gdt_money2'] = input('post.gdt_money2');
            $data['gdt_state'] = input('post.gdt_state') ? 0 : input('post.gdt_state');
            $data['gdt_discount'] = input('post.gdt_discount');
            $data['gdt_img'] = Request()->file('gdt_img');
            $discount = new GoodsDiscounttypeService();
            $res = $discount->goods_discounttype_add($data);
            if($res){
                $this->success('添加成功','Goodsdiscounttype/index','',1);
            }else{
                $this->success('添加失败','Goodsdiscounttype/index','',1);
            }

        }
        return $this->fetch('goodsdiscounttype/edit');
    }

    /**
     * 修改折扣
     * 邓赛赛
     */
    public function edit(){
        $discount = new GoodsDiscounttypeService();
        $gdt_id = input('get.gdt_id');

        if(request()->isPost()){
            $where['gdt_id'] = input('post.gdt_id');
            $data['gdt_name'] = input('post.gdt_name');
            $data['gdt_money1'] = input('post.gdt_money1');
            $data['gdt_money2'] = input('post.gdt_money2');
            $data['gdt_state'] = input('post.gdt_state');
            $data['gdt_discount'] = input('post.gdt_discount');
            $data['gdt_img'] =  Request()->file('gdt_img');

            $res = $discount->goods_discounttype_save($where,$data);
            if($res){
                $this->success('修改成功','Goodsdiscounttype/index','',1);
            }else{
                $this->success('修改失败','Goodsdiscounttype/index','',1);
            }
        }
        $where = [
            'gdt_id'=>$gdt_id,
        ];
        $info = $discount->goods_discounttype_info($where,'*');
        $this->assign(['info'=>$info]);
        return $this->fetch();
    }

    /**
     * 删除折扣
     * 邓赛赛
     */
    public function del(){
        $where = [
            'gdt_id'=>input('get.gdt_id'),
        ];
        $update = [
            'gdt_state'=>1,
        ];
        $discounttype = new GoodsDiscounttypeService();
        $res = $discounttype->goods_discounttype_save($where,$update);
        if($res){
            $this->success('删除成功','Goodsdiscounttype/index','',1);
        }else{
            $this->success('删除失败','Goodsdiscounttype/index','',1);
        }
    }

}
