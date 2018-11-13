<?php
/**
 * User: Shine
 * Date: 2018/9/27
 * Time: 11:21
 */
namespace app\admin\controller;

use app\data\model\BaseModel;
use app\data\service\BaseService;
use app\data\service\channel\ChannelService;

class Channel extends AdminHome{
    /**
     * 添加渠道
     */
    public function add_channel(){
        $c_id    = input('request.c_id/d',0);
        $channel = new ChannelService();
        $Img     = new BaseModel();

        //判断是否发布
        if ($c_id){
            $where = [
                'c_id' => $c_id
            ];
            $res = $channel->channelVal($where,'c_state');
            if ($res == 2){
                $this->error('已发布，不允许编辑！',url('channel/channel_list'),3);
            }
        }

        if (request()->isPost()){
            //表单数据
            $type = 'add';
            if ($c_id > 0){
                $type = 'edit';
            }
            $data = $channel->inputData($type);
            //表单验证
            $error_msg = $channel->checkData($data,$type,$c_id);
            if ($error_msg) {
                $this->error($error_msg, url('channel/add_channel') . "?c_id=" . $c_id, 3);
            }

            // logo
            if(!empty($data['c_img']) && is_array($data['c_img']) ){
                $data['c_img'] = array_values(array_filter($data['c_img']));
                $imgs = $Img->ba64_img($data['c_img'],'channel');
            }else{
                $imgs[0] = '';
            }
            if ($c_id){
                //修改
                $where_save['c_id']  = $c_id;
                $data['update_time'] = time();
                if (!empty($imgs)){
                    $data['c_img']       = $imgs[0];
                }
                $res = $channel->channelSave($where_save,$data);
                if (!$res){
                    $this->error('修改失败！',url('channel/add_channel'),3);
                }
                $this->success('修改成功！',url('channel/channel_list'),3);
            }else{
                //添加
                $data['c_state'] = 1;
                $data['c_img']   = $imgs[0];
                $res = $channel->channelAdd($data);
                if (!$res) {
                    $this->error('渠道添加失败！', url('channel/add_channel'), 3);
                }
                $this->success("渠道添加成功！", url('channel/channel_list'), 3);
            }
        }

        //查询渠道详情
        $info = [];
        if($c_id){
            $where_find['c_id']=$c_id;
            $info = $channel->channelInfo($where_find);
            if(empty($info)){
                $this->error("非法请求，渠道不存在！", url('channel/channel_list'), 3);
            }
        }

        $this->assign('info',$info);
        $this->assign('c_id',$c_id);
        return $this->fetch();

    }

    /**
     * 获取渠道列表
     */
    public function channel_list(){
        $where_find = "";
        $c_state    = input('param.c_state/d',0);
        if(!$c_state){
            $where_find .= " c_state IN (1,2) ";
        }else{
            $where_find .= " c_state = ".$c_state;
        }
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $stime = $_GET['starttime'];
            $etime = $_GET['endtime'];
            $where_find .= " AND add_time>$stime AND add_time<$etime ";
        }
        if (!empty($_GET['c_name'])){
            $where_find .= " AND c_name like '%".$_GET['c_name']."%'";
        }
        $channel  = new ChannelService();
        $list     = $channel->get_channel_list($where_find,'*','add_time desc',15);
        $page     = $list->render();
        $total    = $list->total();

        $num = empty(input('get.page')) ? 1 : input('get.page');    //当前页
        $this->assign(['list'=>$list, 'page'=>$page, 'total'=>$total, 'num'=>$num, 'c_state'=>$c_state]);
        return $this->fetch();
    }

    /**
     * 渠道删除
     */
    public function del_channel(){
        $c_id = input('request.c_id/d', 0);
        if (!$c_id || !is_numeric($c_id)) {
            $this->error("非法请求！", url('channel/channel_list'), 3);
        }

        // 删除
        $channel = new ChannelService();
        $res = $channel->channelDel(['c_id' => $c_id]);

        if (!$res) {
            $this->error("渠道删除失败！", url('channel/channel_list'), 3);
        }

        $this->success("渠道删除成功！", url('channel/channel_list'), 3);
    }

    /**
     * 渠道发布
     */
    public function pub_channel(){
        $c_id = input('request.c_id/d', 0);
        if (!$c_id || !is_numeric($c_id)) {
            $this->error("非法请求！", url('channel/channel_list'), 3);
        }
        //发布
        $where = [
            'c_id' => $c_id
        ];
        $data['c_state'] = 2;
        $channel = new ChannelService();
        $res     = $channel->channelSave($where,$data);

        if (!$res){
            $this->error("渠道发布失败！", url('channel/channel_list'), 3);
        }
        $this->success("渠道发布成功！", url('channel/channel_list'), 3);
    }

}