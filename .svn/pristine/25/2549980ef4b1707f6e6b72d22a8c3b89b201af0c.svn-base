<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/31
 * Time: 15:56
 */

namespace app\api\controller;


use app\data\service\api\ApituiinviterService;
use app\data\service\BaseService;
use Symfony\Component\Yaml\Tests\B;
use think\Db;

/*
 * 张文斌
 * 2018-8-29
 */
class Tuiinviter extends Tuiapimember
{
    //我的邀请人主页面
    public function index(){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $m_id = $this->data['m_id'];//用户id
        $ml_tui_id = $data['ml_tui_id'];//传过来的会员身份 默认是为0
        $where['m_id'] = $data['m_id'];
        $tuiinviter = new ApituiinviterService();
        $count_list = $tuiinviter->get_all_childcount_wu($m_id);//获取各个会员分类的人数
        $count_zt=$count_list['zt_num'];      //直推总人数
        $count_all = $count_list['zt_num']+$count_list['jy1_num']+$count_list['jy2_num']; //下级总人数
        if(empty($this->data['curpage'])){
            $curpage="1";
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum'])){
            $pagenum=10;
        }
        else{
            $pagenum=$this->data['pagenum'];
        }
        $tui_list = '';
        $where_zhitui = "tj_mid=" . $data['m_id'];//推荐人id
        $tui_list = $tuiinviter->getzhitui($where_zhitui,$fields="*",$order="add_time desc",$curpage,$pagenum,$ml_tui_id);
        if(!empty($tui_list)){
            foreach($tui_list as &$t){
                $tmp = strstr($t['m_avatar'],'http://');
                if($tmp == false){
                    if(!empty($t['m_avatar'])){
                        $t['member_avatar'] = PAIYY_URL . $t['m_avatar'];
                    }else{
                        $t['member_avatar'] = $t['m_avatar'];
                    }
                }
            }
        }
        $c= $tuiinviter->getzhitui_count($where_zhitui,$ml_tui_id);
        $page_count=ceil($c/$pagenum);
        $pagelist=$tuiinviter->app_page($page_count);
        if(!empty($tui_list)){
            $tui_list = $tui_list;
        }
        else{
            $tui_list = [];
        }

        $chuangnum ="";//创推人
        $pinnum = "";//品推人
        $fennum = "";//粉丝

        $count_list_level = $tuiinviter->get_all_childcount_level_wu($m_id);//获取各个会员分类的人数
        $chuangnum=$count_list_level['ct_num'];//创推人
        $pinnum=$count_list_level['pt_num'];//品推人
        $fennum=$count_list_level['vfs_num']+$count_list_level['fs_num'];//粉丝
        $punum = $count_list_level['p_num'];//普通会员
        if(empty($chuangnum)){
            $chuangnum = 0;
        }
        if(empty($pinnum)){
            $pinnum = 0;
        }
        if(empty($fennum)){
            $fennum = 0;
        }
        if(empty($punum)){
            $punum = 0;
        }
        $arr = array(
            'chuangnum'=>$chuangnum,//创推人人数
            'pinnum'=>$pinnum,//品推人人数
            'fennum'=>$fennum,//粉丝人数
            'list'=>$tui_list,//直接下级人信息
            'count'=>$count_all,//下级总人条数
            'pages'=>$pagelist['page_total'],
            'count_zhitui'=>$count_zt,
            'punum'=>$punum,
        );
        $this->response_data($arr);
    }
    public function yaonum($m_id){
        $res=$this->checktoken();//验证token
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        $data = $this->data;
        $m_id = $m_id;//用户id
        $ml_tui_id = $data['ml_tui_id'];//传过来的会员身份 默认是为0
        $where['m_id'] = $m_id;
        $tuiinviter = new ApituiinviterService();
        $count_list = $tuiinviter->get_all_childcount_wu($m_id);//获取各个会员分类的人数
        $count_zt=$count_list['zt_num'];      //直推总人数
        $count_all = $count_list['zt_num']+$count_list['jy1_num']+$count_list['jy2_num']; //下级总人数
        if(empty($this->data['curpage'])){
            $curpage="1";
        }
        else{
            $curpage=$this->data['curpage'];
        }
        if(empty($this->data['pagenum'])){
            $pagenum=10;
        }
        else{
            $pagenum=$this->data['pagenum'];
        }
        $tui_list = '';
        $where_zhitui = "tj_mid=" . $data['m_id'];//推荐人id
        $tui_list = $tuiinviter->getzhitui($where_zhitui,$fields="*",$order="add_time desc",$curpage,$pagenum,$ml_tui_id);
        $c= $tuiinviter->getzhitui_count($where_zhitui,$ml_tui_id);
        $page_count=ceil($c/$pagenum);
        $pagelist=$tuiinviter->app_page($page_count);
        if(!empty($tui_list)){
            $tui_list = $tui_list;
        }
        else{
            $tui_list = "";
        }

        $chuangnum ="";//创推人
        $pinnum = "";//品推人
        $fennum = "";//粉丝

        $count_list_level = $tuiinviter->get_all_childcount_level_wu($m_id);//获取各个会员分类的人数
        $chuangnum=$count_list_level['ct_num'];
        $pinnum=$count_list_level['pt_num'];
        $fennum=$count_list_level['vfs_num']+$count_list_level['fs_num']+$count_list_level['p_num'];
        if(empty($chuangnum)){
            $chuangnum = 0;
        }
        if(empty($pinnum)){
            $pinnum = 0;
        }
        if(empty($fennum)){
            $fennum = 0;
        }
        $arr = array(
            'chuangnum'=>$chuangnum,//创推人人数
            'pinnum'=>$pinnum,//品推人人数
            'fennum'=>$fennum,//粉丝人数
            'list'=>$tui_list,//直接下级人信息
            'count'=>$count_all,//下级总人条数
        );
        $this->response_data($arr);
    }

    /**
     * 更改用户推荐手机号码
     * 邓赛赛
     */
    public function updatePhone(){
        $base = new BaseService();
        if(empty($this->data['m_mobile2']))
        {
            $this->response_error("上家手机号码不能为空");
        }
        $m_id = $this->data['m_id'];
        if(empty($m_id))
        {
            $this->response_error("未知的修改人");
        }
        $where = [
            'm_id'=>$m_id
        ];
        $is_set = Db::table('pai_member')->where($where)->value('tj_mid');
        if($is_set){
            $this->response_error("推荐上家只可更改一次");
        }
        $m_mobile2 = $this->data['m_mobile2'];
        $m_mobile2 = $base->encrypt($m_mobile2);
        $ml_tui_id1_info = Db::table('pai_member')->where('m_id',$m_id)->field('m_id,tj_mid,ml_tui_id')->find();
        $ml_tui_id2_info = Db::table('pai_member')->where('m_mobile',$m_mobile2)->field('m_id,tj_mid,ml_tui_id')->find();
        if(empty($ml_tui_id1_info)){
            $this->response_error("被推荐人非会员");
        }
        if(empty($ml_tui_id2_info)){
            $this->response_error("推荐人非会员");
        }

        if($ml_tui_id2_info['m_id'] == $ml_tui_id1_info['m_id']){
            $this->response_error("自己不可推荐自己");
        }

        if($ml_tui_id2_info['tj_mid'] == $ml_tui_id1_info['m_id']){
            $this->response_error("推荐人的推荐者是此被推荐者，现不可执行您的操作");
        }

        if(empty($ml_tui_id2_info['ml_tui_id'])){
            if($ml_tui_id2_info['ml_tui_id'] < $ml_tui_id1_info['ml_tui_id']){
                $this->response_error("推荐人不可比被推荐人等级低");
            }
        }else{
            if(!empty($ml_tui_id1_info['ml_tui_id'])){
                if($ml_tui_id2_info['ml_tui_id'] > $ml_tui_id1_info['ml_tui_id']){
                    $this->response_error("推荐人不可比被推荐人等级低");
                }
            }
        }
        $res = Db::table('pai_member')->where('m_id',$m_id)->update(['tj_mid'=>$ml_tui_id2_info['m_id'],'edit_time'=>time()]);
        if($res){
            //查看推荐状态
            $set_type = Db::table('pai_invitation_log')->where('m_id',$m_id)->value('set_type');
            if($set_type == 1){
                //状态等于1更改状态为2
                $update = [
                    'tj_mid'=>$ml_tui_id2_info['m_id'],
                    'set_type'=>2,
                    'add_time'=>time()
                ];
                Db::table('pai_invitation_log')->where('m_id',$m_id)->update($update);
            }else if($set_type == null){
                //无推荐上家时，添加记录记录
                $insert = [
                    'add_time'=>time(),
                    'tj_mid'=>$ml_tui_id2_info['m_id'],
                    'm_id'=>$m_id,
                    'set_type'=>2
                ];
                Db::table('pai_invitation_log')->insert($insert);
            }
            $this->response_data($res);
        }else{
            $this->response_error("操作失败");
        }

    }

}