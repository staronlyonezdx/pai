<?php
namespace app\admin\controller;

use app\data\service\member\MemberLevelService;
use app\data\service\member\MemberService;
use app\data\service\system_msg\SystemMsgService;
use think\Request;

class Systemmsg extends AdminHome
{
    /**
     * 消息列表
     * 邓赛赛
     */
    public function index(){
        $msg = new SystemMsgService();
        $where = [
            'sm_type'=>0
        ];
        $list = $msg->get_list($where,'*','sm_addtime desc',10,'sm_content');
        $page = $list->render();
        $total = $list->total();
        $this->assign([
            'total'=>$total,
            'list'=>$list,
            'page'=>$page
        ]);
        return $this->fetch();
    }

    /**
     * 发布系统消息
     * 邓赛赛
     */
    public function sendmsg(){
        $mem = new MemberService();
        if(request()->isPost()){
            $data = input('post.');
            $insert = [
                'sm_title'=>$data['sm_title'],
                'sm_brief'=>$data['sm_brief'],
                'sm_content'=>$data['sm_content'],
                'from_id'=>0,
                'sm_type'=>0,
                'sm_addtime'=>time(),
            ];
            $msg = new SystemMsgService();
            //指定用户单条消息
            if(isset($data['to_mid'])){
                $insert['to_mid'] = $data['to_mid'];

                $res = $msg->AddSystemMsg($insert);
                if($res){
                    $this->success('发送成功','/admin/systemmsg/index','',1);
                }
                else{
                    $this->success('发送失败','/admin/systemmsg/sendmsg','',1);
                }
            }
            //根据会员等级批量插入
            if(isset($data['m_levelid'])){
                $where = [
                    'm_levelid'=>$data['m_levelid'],
                    'm_state'=>0,
                ];
                $msg->addSystemMsgAll($where,$insert);
                $this->success('发送成功','/admin/systemmsg/index','',1);
            }
        }

        $ml = new MemberLevelService();
        $level = $ml->get_list([],'ml_id asc','ml_id,ml_name');

        $this->assign(['level'=>$level]);
        return $this->fetch();
    }

    /**
     * @return array|false|\PDOStatement|string|\think\Model
     * 搜索词会员信息  (单独发布时搜索指定用户)
     * 邓赛赛
     */
    public function getInfo(){
        $mem = new MemberService();
        $m_mobile = input('post.m_mobile');
        $m_mobile=$mem->encrypt($m_mobile);
        $where = [
            'm_mobile'=>$m_mobile
        ];
        $data = $mem->get_info($where,'m_id,m_name');
        return $data;
    }
}