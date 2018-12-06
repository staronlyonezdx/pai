<?php
namespace app\admin\controller;

use app\data\service\member\MemberLevelService;
use app\data\service\member\MemberService;
use app\data\service\system_msg\SystemMsgService;
use think\Db;
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
    //推送消息页面
    public function tuisongmsg(){
        $pm_list = Db::connect('db_pai_data')->name('push_msg')->field('*')->order('pm_addtime desc')->paginate(5,false,['query'=>request()->param() ]);
        $page = $pm_list->render();
        $total = $pm_list->total();
        $this->assign('page', $page);
        $this->assign('total', $total);
        $this->assign('pm_list',$pm_list);
        return $this->fetch();
    }
    //新增加推送消息
    public function addtuisongmsg(){
        $pm_id = input('param.pm_id');//系统消息id
        $pm_list = Db::connect('db_pai_data')->name('push_msg')->where('pm_id',$pm_id)->find();
        if(request()->isPost()){
            $pm_title=input('param.pm_title');//标题
            $pm_range = input('param.pm_range');//用户范围
            $pm_open_type = input('param.hx');//打开类型
            $pm_url=input('param.pm_url');//打开url
            $pm_push_type = input('param.ts');//推送类型
            $pm_push_time = strtotime(input('param.pm_push_time'));//推送时间
//            print_r($pm_push_time);die();
//            if(empty($pm_title)){
//                $this->error('标题不为空');
//            }
//            if(empty($pm_range)){
//                $this->error('用户范围不为空');
//            }
//            if(empty($pm_open_type)){
//                $this->error('打开类型不为空');
//            }
//            if($pm_push_type == 1){
//                if(empty($pm_url)){
//                    $this->error('打开url不为空');
//                }
//            }
//            if(empty($pm_push_type)){
//                $this->error('推送类型不为空');
//            }
//            if(empty($pm_push_time)){
//                $this->error('推送时间不为空');
//            }
            $data = array(
                'pm_title'=>$pm_title,
                'pm_range'=>$pm_range,
                'pm_open_type'=>$pm_open_type,
                'pm_url'=>$pm_url,
                'pm_push_type'=>$pm_push_type,
                'pm_push_time'=>$pm_push_time,
                'pm_addtime'=>time(),
            );
            //修改
            if($pm_id){
                $where['pm_id'] = $pm_id;
                $res = Db::connect('db_pai_data')->name('push_msg')->where($where)->update($data);
                if($res){
                    $this->success('修改成功');
                }else{
                    $this->error('修改失败');
                }
            }else{//添加
                $res = Db::connect('db_pai_data')->name('push_msg')->insertGetId($data);
                if($res){
                    $this->success('添加成功',url('systemmsg/tuisongmsg'));
                }else{
                    $this->error('添加失败');
                }
            }
        }
        $this->assign('pm_list',$pm_list);
        return $this->fetch();
    }
    //撤销推送消息
    public function revoke_tuisongmsg(){
        $pm_id = input('param.pm_id');//消息记录id
        $res = Db::connect('db_pai_data')->name('push_msg')->where('pm_id',$pm_id)->update(array('pm_status'=>2));
        if($res){
            $this->success('撤销成功',url('systemmsg/tuisongmsg'));
        }else{
            $this->error('撤销失败');
        }
    }
    //通知消息页面
    public function noticemsg(){
        return $this->fetch();
    }
    //新增加通知消息
    public function addnoticemsg(){
        return $this->fetch();
    }
}