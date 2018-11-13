<?php
namespace app\member\controller;

use app\data\service\review\RevieworderService as RevieworderService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\BaseService as BaseService;
use app\data\service\orderPai\OrderPaiService as OrderPaiService;
use think\Controller;
use think\Request;
use think\Cookie;

class Review extends MemberHome
{
    /*
	* 我的评价列表
	* 创建人 刘勇豪
	* 时间 2018-07-12 10:21:00
	*/
    public function index()
    {
        $m_id = $this->m_id;

        $member = new MemberService();
        $where['m_id'] = $m_id;

        $info = $member->get_info($where);

        $review_order = new RevieworderService();
        $where = [];
        $where['m.m_id'] = $m_id;
        $where['ro.state'] = 0;
        $where['rg.state'] = 0;
        $order='ro.ro_id desc';
        $field='gp.gp_img,g.g_name,op.o_money,rg.rg_content,ro.add_time as ro_add_time,rg.rg_id,op.gp_num,s.store_id,gp.gp_id,g.g_id';
        $limit = '0,3';
        $list = $review_order->reviewOrderDetailLimitList($where,$order,$field,$limit);
        $count_list = count($list);

        $this->assign('info', $info);
        $this->assign('list', $list);
        $this->assign('count_list', $count_list);
        $this->assign('header_title','我的评价');
        return $this->fetch();
    }

    /*
	* 发布评价
	* 创建人 刘勇豪
	* 时间 2018-07-12 10:21:00
	*/
    public function review_add(){
        $m_id = $this->m_id;
        $o_id = input('param.o_id/d',0);//假设订单id
        if(!$o_id){
            return "参数错误！";
        }

        if (request()->isAjax() || request()->isPost() ) {
            $data = input('post.');
            $data['m_id']  = $m_id;//评论人ID

            // 添加评论
            $reviewOrder = new RevieworderService();
            $call_back = $reviewOrder->reviewAdd($data);

            return $call_back;
        }

        // 订单详情
        $orderpai = new OrderPaiService();
        $orderInfo = $orderpai->orderPaiInfo(['o_id'=>$o_id]);

        $this->assign('orderInfo', $orderInfo);
        $this->assign('o_id', $o_id);
        $this->assign('header_title','发表评价');
        return $this->fetch();
    }

    /*
	* 我的评价列表
	* 创建人 刘勇豪
	* 时间 2018-07-12 10:21:00
	*/
    public function get_content(){
        $m_id = $this->m_id;

        $page = input('post.page/d',0);
        $size = input('post.size/d',5);

        $review_order = new RevieworderService();
        $where['m.m_id'] = $m_id;
        $where['ro.state'] = 0;
        $where['rg.state'] = 0;
        $order='ro.ro_id desc';
        $field='gp.gp_img,g.g_name,op.o_money,rg.rg_content,ro.add_time as ro_add_time,rg.rg_id,op.gp_num,s.store_id,gp.gp_id,g.g_id';
        $limit = (($page-1) * $size).','.$size;
        $list = $review_order->reviewOrderDetailLimitList($where,$order,$field,$limit);
        if(!empty($list)){
            $html = '';
            foreach($list as $v){
                $gp_img = $v['gp_img'];//商品图片
                $g_name = $v['g_name'];//商品名称
                $o_money = $v['o_money'];//商品价格
                $gp_num = $v['gp_num'];//商品数量
                $rg_content = empty($v['rg_content'])?'此用户暂未评论！':$v['rg_content'];//评论内容
                $add_time = date('Y-m-d H:i:s');//评论时间
                $img_row = $v['img_list'];//图片数组

                $img_html = '';
                if(!empty($img_row)){
                    $img_class = '';
                    if( count( $img_row ) < 3 ){
                        $img_class = 'evaluation_img_two';
                    }
                    $img_html .= "<div class='evaluation_img_view '><div class='evaluation_img_con clear'>";
                    foreach($img_row as $voo){
                        $img_html .= "<div class='evaluation_img_list ".$img_class." lf'><img src='".$voo['img_url']."'></div>";
                    }
                    $img_html .= "</div></div>";
                }

                $html = "<div class='evaluation_list'><div class='evaluation_main clear'><div class='evaluation_main_img lf'><img src='".$gp_img."'></div><div class='evaluation_main_text rt'><p>".$g_name."</p>￥<span>".$o_money."</span></div></div>".$img_html."<div class='evaluation_main_content'><div class='evaluation_main_con'><p>".$rg_content."</p><span>".$add_time."</span></div></div></div>";
            }

            // 统计总条数
            $count = $review_order->reviewOrderDetailLimitCount($where);
            return ['status'=>1,'msg'=>"ok",'data'=>$html,'list'=>$list,'total_num'=>$count];
        }else{
            return ['status'=>0,'msg'=>"empty",'data'=>'','list'=>$list,'total_num'=>0];
        }
    }

}
