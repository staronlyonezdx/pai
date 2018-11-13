<?php
namespace app\admin\controller;
use app\data\model\promoters\PromotersApplyModel;
use app\data\service\admit\AdmitService;
use app\data\service\member\MemberAttestationService;
use app\data\service\member\MemberService;
use app\data\service\promoters\PromotersApplyService;
use app\data\service\promoters\PromotersFrozenService;
use app\data\service\store\StoreCategoryService;
use app\data\service\store\StoreService;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use think\Db;
class Promoters extends AdminHome
{

    /**
     * 推广员列表
     * 邓赛赛
     */
	public function index(){
        $is_promoters = input('param.is_promoters',2);
        $promoters_apply = new PromotersApplyService();
        //是否能成为推广员
        if(\request()->isPost()){
            $promoters = input('post.promoters');
            $m_id = input('post.m_id');
            $pa_id = input('post.pa_id');
            $error_explain = input('post.error_explain','');
            $admin_id = $this->checkAdminCookie();
            $res = $promoters_apply->set_assessment_promoters($promoters,$m_id,$pa_id,$error_explain,$admin_id);

            if($res['status'] == 1){
                return ['status'=>1,'msg'=>'操作成功'];
//                $this->success('审核成功','/admin/promoters/index','',1);
            }else{
                return ['status'=>0,'msg'=>$res['msg']];
//                $this->error($res['msg'],'/admin/promoters/index','',1);
            }
        }
        $where=[
            'pa.is_promoters'=>$is_promoters,
            'm.m_state'=>0
        ];
        $field = 'pa.*,m.m_name,m.real_name,a.admin_name add_admin_name,a2.admin_name update_admin_name';
        $list = $promoters_apply->get_page_list($where, $field, 'pa_id asc', 10);
        $total_num = $list->total();
        $show_page = $list->render();
        $member_att = new MemberAttestationService();
        $lists = array();
        foreach($list as $k => $v){
            $lists[$k] = $v;
            $lists[$k]['m_mobile'] = $promoters_apply->decrypt($v['m_mobile']);
            $where2 = [
                'm_id'=>$v['m_id']
            ];
            $lists[$k]['attestation'] = $member_att->get_list($where2,'',$field='*');
        }
//        dump($lists);die;
        $this->assign(['lists'=>$lists,'total_num'=>$total_num,'show_page'=>$show_page,'is_promoters'=>$is_promoters]);
	    return view();
    }
    /**
     * 管理员查询认证信息和添加申请推广员
     * 邓赛赛
     */
    public function manual_query(){
        $member = new MemberService();
        $phone = $m_mobile = input('param.m_mobile');
//        $m_mobile = '15157176870';
        $m_mobile = $member->encrypt($m_mobile);
        $where = [
            'm_mobile'=>$m_mobile
        ];
        $info = $member->get_info($where,'m_id,m_name,m_state,is_jq,is_promoters');
        if($info['m_state'] == 1){
            $this->assign('error_info','此账号已被管理封停');
        }
        if($info['is_jq'] == 1){
            $this->assign('error_info','此账号为内部机器人账号');
        }

        //申请考核期推广员
        if(\request()->isAjax()){
            $m_id = input('param.m_id');
            $admin_id = $this->checkAdminCookie();
            $promoters_apply =  new PromotersApplyService();
            $res = $promoters_apply->set_prepare_promoters($m_id,$admin_id);

            if($res){
                return ['status'=>1,'msg'=>'已申请推广员'];
            }else{
                return ['status'=>0,'msg'=>'操作有误'];
            }
        }
        $where = [
            'm_id'=>$info['m_id']
        ];
        $member_att = new MemberAttestationService();
        $data = $member_att->get_list($where,'','*');
        $this->assign('data',$data);
        $this->assign('info',$info);
        $this->assign('m_mobile',$phone);
        return view();
    }

}
