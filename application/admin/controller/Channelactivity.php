<?php
/**
 * User: Shine
 * Date: 2018/9/27
 * Time: 18:34
 */
namespace app\admin\controller;

use app\data\model\BaseModel;
use app\data\service\BaseService;
use app\data\service\channel\ChannelService;
use app\data\service\channelactivity\ChannelActivityService;

class Channelactivity extends AdminHome{
    /**
     * 添加/编辑活动
     */
    public function add_activity(){
        $ca_id    = input('request.ca_id/d',0);
        $activity = new ChannelActivityService();
        $channel  = new ChannelService();
        $Img      = new BaseModel();
        //判断是否发布
        if ($ca_id){
            $where = [
                'ca_id' => $ca_id
            ];
            $res = $activity->activityVal($where,'ca_state');
            if ($res == 2){
                $this->error('已发布，不允许编辑！',url('Channelactivity/activity_list'),3);
            }
        }

        //表单信息
        if (request()->isPost()){
            //表单数据
            $type = 'add';
            if ($ca_id > 0){
                $type = 'edit';
            }
            $data = $activity->inputData($type);
            //表单验证
            $error_msg = $activity->checkData($data);
            if ($error_msg) {
                $this->error($error_msg, url('channelactivity/add_activity') . "?ca_id=" . $ca_id, 3);
            }

            // logo
            if(!empty($data['ca_img']) && is_array($data['ca_img']) ){
                $data['ca_img'] = array_values(array_filter($data['ca_img']));
                $imgs = $Img->ba64_img($data['ca_img'],'channelactivity');
            }else{
                $imgs[0] = '';
            }

            if ($ca_id){
                //修改
                $where_save['ca_id'] = $ca_id;
                $data['update_time'] = time();
                if (!empty($imgs)){
                    $data['ca_img']      = $imgs[0];
                }
                if ($data['ca_img']){
                    $ca_img = $data['ca_img'];
                }else{
                    $ca_img = '';
                }
                $data['ca_code'] = $activity->code($ca_id,$data['ca_link'],$ca_img);//生成二维码
                $res = $activity->activitySave($where_save, $data);

                if (!$res) {
                    $this->error('活动修改失败', url('channelactivity/add_activity') . "?ca_id=" . $ca_id, 3);
                }
                $this->success("活动修改成功！", url('channelactivity/activity_list'), 3);
            }else{
                //添加
                $data['ca_state'] = 1;
                $data['ca_img']   = $imgs[0];
                $res  = $activity->activityAdd($data);
                //生成二维码
                $where['ca_id']  = $res;
                $code = $activity->code($res,$data['ca_link'],$data['ca_img']);
                $QR['ca_code'] = $code;
                $result = $activity->activitySave($where,$QR);

                if (!$res || !$result) {
                    $this->error('活动添加失败！', url('channelactivity/add_activity'), 3);
                }
                $this->success("活动添加成功！", url('channelactivity/activity_list'), 3);
            }

        }

        //查询活动详情
        $info = [];
        if($ca_id){
            $where_find['ca_id'] = $ca_id;
            $info = $activity->activityInfo($where_find);
            if(empty($info)){
                $this->error("非法请求，活动不存在！", url('channelactivity/activity_list'), 3);
            }
        }
        //渠道列表
        $where_list['c_state'] = 2;
        $channel_list =  $channel->getList($where_list,'add_time desc','c_id,c_name');

        $this->assign('info',$info);
        $this->assign('ca_id',$ca_id);
        $this->assign('channel_list',$channel_list);
        return $this->fetch();

    }

    /**
     * 获取活动列表
     */
    public function activity_list(){
        $where_find = "";
        $ca_state   = input('param.ca_state/d',0);
        if(!$ca_state){
            $where_find .= " ca_state IN (1,2) ";
        }else{
            $where_find .= " ca_state = " . $ca_state;
        }
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $stime = $_GET['starttime'];
            $etime = $_GET['endtime'];
            $where_find .= " AND ca.add_time>$stime AND ca.add_time<$etime ";
        }
        if (!empty($_GET['ca_name'])){
            $where_find .= " AND ca_name like '%".$_GET['ca_name']."%'";
        }
        //获取列表
        $activity  = new ChannelActivityService();
        $list      = $activity->get_activity_lists($where_find,'ca.ca_id,ca.ca_name,ca.ca_img,ca.ca_state,ca.ca_link,ca.ca_code,ca.add_time,ca.update_time,ca.end_time,ca.admin_id,c.c_name','add_time desc',10);
        $page  = $list->render();
        $total = $list->total();

        $num = empty(input('get.page')) ? 1 : input('get.page');    //当前页
        $this->assign([
            'list'=>$list,
            'num'=>$num,
            'page'=>$page,
            'total'=>$total,
            'ca_state'=>$ca_state
        ]);
        return $this->fetch();
    }

    /**
     * 活动删除
     */
    public function del_activity(){
        $ca_id = input('request.ca_id/d', 0);
        if (!$ca_id || !is_numeric($ca_id)) {
            $this->error("非法请求！", url('channelactivity/activity_list'), 3);
        }

        // 删除
        $activity = new ChannelActivityService();
        $res = $activity->activityDel(['ca_id' => $ca_id]);

        if (!$res) {
            $this->error("活动删除失败！", url('channelactivity/activity_list'), 3);
        }

        $this->success("活动删除成功！", url('channelactivity/activity_list'), 3);
    }

    /**
     * 活动发布
     */
    public function pub_activity(){
        $ca_id = input('request.ca_id/d', 0);
        if (!$ca_id || !is_numeric($ca_id)) {
            $this->error("非法请求！", url('channelactivity/activity_list'), 3);
        }
        //发布
        $where = [
            'ca_id' => $ca_id
        ];
        $data['ca_state'] = 2;
        $activity = new ChannelActivityService();
        $res      = $activity->activitySave($where,$data);

        if (!$res){
            $this->error("活动发布失败！", url('channelactivity/activity_list'), 3);
        }
        $this->success("活动发布成功！", url('channelactivity/activity_list'), 3);
    }

}