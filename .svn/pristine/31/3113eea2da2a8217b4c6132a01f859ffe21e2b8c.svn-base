<?php
namespace app\business\controller;

use app\data\service\popularity\PopularityGoodsService;
use app\data\service\popularity\PopularityService;
use app\data\model\goods\GoodsModel;
use think\Db;

class Popularitygoods extends MemberHome
{

    /**
     * 人气商品列表(在线公布、线下获得+线上获得)
     */
     public function goodslist()
	{
	    $m_id = $this->m_id;

        $pg_state = input('param.pg_state',0);
        $pg_status = input('param.pg_status',0);
        $pg_sn = input('param.pg_sn',0);
        $home = input('param.home',0);
        $goods =  new PopularityService();
        $field = '*';
        $where = [
            'pg_type'=>['<>',3]
        ];
        //参拍状态
        $where['pg_state'] = $pg_state;
        if($pg_state == 0){
            unset($where['pg_state']);

        }

        //上架状态
        $where['pg_status'] = $pg_status;
        if(!$pg_status){
            unset($where['pg_status']);
        }else{
            $pg_state = 100;
        }
        if($pg_sn){
            $where = [
                'pg_id|pg_sn|pg_name'=>['like','%'.$pg_sn.'%']
            ];
        }
        $order = 'pg_sortnum desc';
        //人气活动页
        if($home){
            $where = [
                'pg_state'=>1,
                'is_show'=>1,
                'pg_status'=>1,
                'end_time'=>['>',time()],
                'pg_type'=>['<>',3],
                'pg_position'=> ['between',[1,12]]
            ];
            $order = 'pg_position asc';
            $pg_state = 100;
        }
        $where['admin_id'] = $m_id;

        $list = $goods->popularity_goods_list($where,$field,$order);
        $page = $list->render();
        $total = $list->total();

        $num = empty(input('get.page')) ? 1 : input('get.page');    //当前页
        $this->assign(['list'=>$list,'page'=>$page,'total'=>$total,'num'=>$num]);
        $this->assign('pg_state',$pg_state);
        $this->assign('pg_status',$pg_status);
        return $this->fetch();
	}
    /**
     * 人气商品列表（线下活动商品）
     * 邓赛赛
     */
    public function goods_list_two()
    {
        $m_id = $this->m_id;
        $pg_state = input('param.pg_state',0);
        $pg_status = input('param.pg_status',0);
        $pg_sn = input('param.pg_sn',0);

        //参拍状态
        $where['pg_state'] = $pg_state;
        if($pg_state == 0){
            unset($where['pg_state']);

        }
        //上架状态
        $where['pg_status'] = $pg_status;
        if(!$pg_status){
            unset($where['pg_status']);
        }else{
            $pg_state = 100;
        }

        //搜索pg_id或pg_sn或者商品名称
        if($pg_sn){
            $where = [
                'pg_id|pg_sn|pg_name'=>['like','%'.$pg_sn.'%']
            ];
        }
        $order = 'pg_sortnum desc';
        $where['pg_type'] = 3;

        $where['admin_id'] = $m_id;

        $mid = 6;
        $goods =  new PopularityService();
        $field = '*';
        $list = $goods->popularity_goods_list($where,$field,$order);
        $page = $list->render();
        $total = $list->total();
        $lists = array();
        $p_goods = new PopularityGoodsService();
        foreach($list as $k => $v){
            $lists[$k] = $v;
            $goods_code = '/uploads/code/popularity/shop/'.$mid.'code_'.$v['pg_id'].".jpg";
            if(!is_file(trim($goods_code,'/'))){
                $goods_code = $p_goods->popularity_code($v['pg_id'],$mid);
            }
            $lists[$k]['goods_code'] = $goods_code."?v=".rand(100,999);
            $lists[$k]['goods_fuzhi'] = PAI_URL.'/popularity/popularitygoods/line_goods/pg_id/'.$v['pg_id'];
        }
        $num = empty(input('get.page')) ? 1 : input('get.page');    //当前页
        $this->assign(['list'=>$lists,'page'=>$page,'total'=>$total,'num'=>$num]);
        $this->assign('pg_state',$pg_state);
        $this->assign('pg_status',$pg_status);
        return $this->fetch();
    }
    /**
     * 查询是否可再次上架（线下活动商品）
     * 邓赛赛
     */
    public function check_release(){
        $pg_id = input('post.id');
        $p_goods = new PopularityGoodsService();
        $where = [
            'pg_id'=>$pg_id
        ];
        $pg_state = $p_goods->get_value($where,'pg_state');
        if($pg_state == 1){
            return ['status'=>0,'msg'=>'活动参拍中不可再次发布'];
        }
    }
    /**
     * 商品再次上架（线下活动商品）
     * 邓赛赛
     */
    public function multiple_release(){
        $pg_id = trim(input('post.pg_id'));
        $pg_chosen_num = trim(input('post.pg_chosen_num'));
        $pg_sortnum = trim(input('post.pg_sortnum'));
        $end_time = trim(input('post.end_time'));
        if(!$pg_id || !$pg_chosen_num || !$pg_sortnum || !$end_time){
            return ['status'=>0,'msg'=>'参数不完整'];
        }
        $where = [
            'pg_id'=>$pg_id
        ];
        $p_goods = new PopularityGoodsService();
        $pg_state = $p_goods->get_value($where,'pg_state');
        if($pg_state == 1){
            return ['status'=>0,'msg'=>'活动参拍中不可再次发布'];
        }
        Db::startTrans();
        try{
            Db::table('pai_popularity_goods')->where($where)->setInc('pg_periods');
            $data = [
                'pg_chosen_num'=>$pg_chosen_num,
                'pg_sortnum'=>$pg_sortnum,
                'end_time'=>strtotime($end_time),
                'pg_state'=>1,
                'update_time'=>time(),
            ];
            Db::table('pai_popularity_goods')->where($where)->update($data);
            // 提交事务
            Db::commit();
            return ['status'=>1,'msg'=>'修改成功','data'=>date('Y-m-d H:i:s')];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return ['status'=>1,'msg'=>'修改失败'];
        }
    }

	/**
     * 人气商品添加、修改
     */
	public function edit(){
	    $m_id = $this->m_id;
	    $pg_id = input('request.pg_id', 0);
        $goods = new PopularityService();
        $p_goods = new PopularityGoodsService();
        $mid = 1;

        //表单提交
        if (request()->isPost()){
            //表单数据
            $type = 'add';
            if( $pg_id > 0 ){
                $type = 'edit';
            }
            $data = $goods->inputData($type,$m_id);

            //线下活动人气商品
            if($data['pg_type'] == 3){
                $mid = 6;
            }

            if(!empty($data['pg_img']) && is_array($data['pg_img']) ){
                $Img = new GoodsModel();
                $data['pg_img'] = array_values(array_filter($data['pg_img']));
                $imgs = $Img->ba64_img($data['pg_img'],'popularitygoods');
            }else{
                $imgs[0]='';
            }
            //表单验证
            $error_msg = $goods->checkData($data);
            if ($error_msg) {
                return ['status'=>2,'msg'=>$error_msg];
            }
            //检测发布线上人气或线上+线下是否有此上线位置的商品
            if(($data['pg_type'] == 1 || $data['pg_type'] == 2) && !empty($data['pg_position']) &&  $data['pg_status'] == 1){
                $popularity_goods = new PopularityGoodsService();
                $where = [
                    'pg_state'=>1,
                    'pg_type'=>['<>',3],
                    'is_show'=>1,
                    'pg_status'=>1,
                    'pg_position'=>$data['pg_position'],
                    'end_time'=>['>=',time()],
                ];
                if($pg_id){
                    $where['pg_id'] = ['<>',$pg_id];
                }
                $pg_position = $popularity_goods ->get_count($where);
                if ($pg_position) {
                    return ['status'=>2,'msg'=>'此位置已存在上架商品,可发布为预上架'];
                }
            }
            if ($pg_id) {
                // 修改
                $where_save['pg_id'] = $pg_id;
                $data['update_time'] = time();
                $periods = $goods->popularityGoodsInfo($where_save,'pg_img,pg_periods,end_time');
                if ($periods['end_time'] < time()){
                    $data['pg_periods'] = $periods['pg_periods'] + 1;
                }
                if (empty($periods['pg_img'])){
                    $data['pg_img'] = $imgs[0];
                }
                $res    = $goods->popularitySave($where_save, $data);

                //添加新增图片
                if (!empty($imgs)){
                    $result = $goods->goodsImgAdd($pg_id,$imgs);
                }else{
                    $result = 1;
                }


                if(is_file('uploads/code/popularity/shop/'.$mid.'merge_'.$pg_id.".jpg")){
                    unlink('uploads/code/popularity/shop/'.$mid.'merge_'.$pg_id.".jpg");
                }
                $path_3 = '/uploads/code/popularity/shop/'.$mid.'code_'.$pg_id.".jpg";
                $info   = $p_goods->hebingImg('/uploads/logo/father.png',$data['pg_img'][0],$path_3,$data['pg_name'],$data['pg_price'],$mid,$pg_id);

                if (!$res || !$result) {
                    return ['status'=>2,'msg'=>'商品修改失败'];
                }
                return ['status'=>1,'msg'=>'修改成功'];
            } else {
                //添加
                if(isset($imgs) && !empty($imgs)){
                    $data['pg_img'] = $imgs[0];
                }
                $data['pg_periods'] = 1;
                $data['pg_state']   = 1;
                $data['pg_sn']   = 'PGSN'.time().rand(100,999);
                $res    = $goods->popularityAdd($data);
                $info   = $goods->goodsImgAdd($res,$imgs);

                //生成分享详情二维码
                $path_3 = '/uploads/code/popularity/shop/'.$mid.'code_'.$res.".jpg";
                $result  = $p_goods->hebingImg('/uploads/logo/father.png',$data['pg_img'],$path_3,$data['pg_name'],$data['pg_price'],$mid,$res);

                if (!$res || !$info) {
                    return ['status'=>2,'msg'=>'商品添加失败'];
                }
                return ['status'=>1,'msg'=>'商品添加失败'];
            }
        }
        //查询人气商品详情
        $info=[];
        if($pg_id){
            $where_find['pg_id']=$pg_id;
            $info = $goods->popularityGoodsInfo($where_find);
            $info['pg_imgs'] = $goods->popularityImgs($where_find);
            $info['pg_des'] = htmlspecialchars_decode($info['pg_des']);
            if(empty($info)){
                $this->error("非法请求，商品不存在！", url('popularitygoods/goodslist'), 3);
            }
        }
        $info['end_time'] = empty($info['end_time']) ? 0 : date('Y-m-d H:i',$info['end_time']);
        $this->assign('info',$info);
        $this->assign('pg_id',$pg_id);
        return $this->fetch();

    }

    /**
     * @return mixed
     * 删除图片
     */
    public function delete_img()
    {
        $data = input('post.');
        $where = [
            'pgi_id' => $data['pgi_id'],
            'pg_id' => $data['pg_id']
        ];
        $goods = new PopularityService();
        $info   = $goods->goodsImgDel($where);
        if(is_file("uploads/code/popularity/shop/1merge_".$data['pg_id'].'.jpg')){
            unlink("uploads/code/popularity/shop/1merge_".$data['pg_id'].'.jpg');
        }

        return $info;
    }


    /**
     * 人气商品删除
     */
    public function delete()
    {
        $pg_id = input('request.pg_id', 0);
        if (!$pg_id || !is_numeric($pg_id)) {
            $this->error("非法请求！", url('popularitygoods/goodslist'), 3);
        }

        $goods = new PopularityService();

        // 删除
        $res = $goods->popGoodsDel(['pg_id' => $pg_id]);

        if (!$res) {
            $this->error("人气商品删除失败！", url('popularitygoods/goodslist'), 3);
        }

        $this->success("人气商品删除成功！", url('popularitygoods/goodslist'), 3);
    }



}
