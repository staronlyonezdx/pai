<?php
/**
* 设置Model
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\model\promoters;
use app\data\model\BaseModel as BaseModel;
use app\data\service\BaseService;
use app\data\service\config\ConfigService;
use app\data\service\member\MemberAttestationService;
use app\data\service\member\MemberService;
use app\data\service\promoters\PromotersLogService;
use app\data\service\system_msg\SystemMsgService;
use think\Db;

class PromotersApplyModel extends BaseModel
{	
  protected $db = 'promoters_Apply' ;//推广员申请表

    /**
     * 申请推广员
     * 邓赛赛
     */
    public function set_prepare($m_id,$admin_id){
        $where = [
            'm_id'=>$m_id
        ];
        $member_attestion = new MemberAttestationService();
        $is_attestion = $member_attestion->get_count($where);
        if(!$is_attestion){
            return ['status'=>0,'msg'=>'您还未实名认证，不可申请哦'];
        }
        $mem = new MemberService();
        $member_info = $mem->get_info($where,'m_mobile,is_promoters');
        $m_mobile = $mem->decrypt($member_info['m_mobile']);
        switch($member_info['is_promoters']){ //是否为推广员  1否  2申请中 3审核失败 4考核中 5考核成功(推广员) 6考核失败
            case 2:
                return ['status'=>0,'msg'=>'您已申请，请耐心等待审核'];
                break;
            case 4:
                return ['status'=>0,'msg'=>'您已处在推广员考核期，不可重复提交'];
                break;
            case 5:
                return ['status'=>0,'msg'=>'您已是推广员，不可在次申请哦'];
                break;
            case 6:
                return ['status'=>0,'msg'=>'您的推广员考核失败，不可申请此活动'];
                break;
        }
        $pa_id = $this->get_value($where,'pa_id');
        if($pa_id){
            //修改
            $where2 = [
                'pa_id'=>$pa_id
            ];
            $data = [
                'is_promoters'=>2,
                'update_time'=>time(),
                'm_mobile'=>$member_info['m_mobile'],
                'add_admin_id'=>$admin_id,
            ];
            $res1 = $this->getSave($where2,$data);
            //member表
            $data2 = [
                'is_promoters'=>2,
                'edit_time'=>time(),
            ];
            $res2 = $mem->get_save($where,$data2);
        }else{
            //添加
            $data = [
                'is_promoters'=>2,
                'm_id'=>$m_id,
                'add_time'=>time(),
                'm_mobile'=>$member_info['m_mobile'],
                'add_admin_id'=>$admin_id,
            ];
            $res1 = $this->getAdd($data);
            $data2 = [
                'is_promoters'=>2,
                'edit_time'=>time(),
                'promoters_code'=>substr($m_mobile,5,5).rand(100,999).rand(100,999),
            ];
            $res2 = $mem->get_save($where,$data2);
        }
        if( $res1 &&  $res2){
            return ['status'=>1,'msg'=>'您的申请已提交'];
        }else{
            return ['status'=>0,'msg'=>'申请失败，请稍后重试'];
        }
    }
    /**
     * 审核成为考核推广员
     * 邓赛赛
     */
    public function assessment_promoters($promoters,$m_id,$pa_id,$error_explain,$admin_id){
        if(!$promoters){
            return ['status'=>0,'msg'=>'审核状态为空'];
        }
        if(!$m_id){
            return ['status'=>0,'msg'=>'用户ID为空'];
        }
        if(!$pa_id){
            return ['status'=>0,'msg'=>'申请ID为空'];
        }
        $member = new MemberService();
        $user = $member->get_info(['m_id'=>$m_id],'*');
        if(!$user){
            return ['status'=>0,'msg'=>'未找到此用户'];
        }else{
            if($user['m_state'] == 1){
                return ['status'=>0,'msg'=>'此用户已被关闭'];
            }
            if($user['is_jq'] == 1){
                return ['status'=>0,'msg'=>'此用户是机器人'];
            }
            if($user['is_promoters'] != 2){
                return ['status'=>0,'msg'=>'此用户状态不可修改为考核推广员'];
            }
        }
        Db::startTrans();
        try{
            //修改推广员信息
            $data = [
                'is_promoters'=>$promoters,
                'update_time'=>time(),
                'update_admin_id'=>$admin_id,
                'start_time'=>time(),
                'end_time'=>time()+86400*7,
            ];
            $where = [
                'pa_id'=>$pa_id,
            ];
            $this->getSave($where,$data);
            //修改member表推广员状态
            $where2 = [
                'm_id'=>$m_id
            ];
            $member = new MemberService();
            $data2=[
                'is_promoters'=>$promoters,
//                'is_promoters'=>$promoters,
            ];
            $member->get_save($where2,$data2);

            //添加系统消息
            $system = new SystemMsgService();
            $data2 = [
                'sm_addtime'=>time(),
                'sm_title'=>'申请推广员结果',
                'sm_brief'=>'申请推广员审核通知',
                'sm_content'=>'恭喜您，现在已进入推广员的7天考核期，达成500人目标后有丰厚的奖励哦！<br/><a href="/member/promoters/is_success">前往查看进度></a>',
                'to_mid'=>$m_id,
            ];
            if($promoters == 3){
                $data2['sm_content'] = '很遗憾！您的推广员审核未通过,理由：'.$error_explain;
                $data2['is_success'] = 1;
            }
            $system->AddSystemMsg($data2);

            // 提交事务
            Db::commit();
            return ['status'=>1, 'msg' => '操作成功'];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $error_msg = $e ->getMessage();//错误信息
            $arr = array(
                'el_type_id'    =>5,
                'el_description'=>date('Y-m-d H:i:s').'预备推广员审核失败'.$error_msg,
                'el_time'       =>time(),
                'm_id'          =>$m_id,
            );
            Db('error_log')->insert($arr);//插入错误日志表
            return ['status'=>0, 'msg' => '操作失败'];
        }
    }
    /**
     * 分页查询
     * 邓赛赛
     * 时间 2018-06-27 18:00:00
     */
    public function get_page($where, $field, $order, $page, $cache)
    {
        $list = Db::table('pai_promoters_apply pa')
            ->join('pai_member m','pa.m_id = m.m_id','left')
            ->join('pai_admin a','a.admin_id = pa.add_admin_id','left')
            ->join('pai_admin a2','a2.admin_id = pa.update_admin_id','left')
            ->field($field)
            ->where($where)
            ->order($order)
            ->paginate($page,false,['query'=>request()->param() ]);

        return $list;
    }

    /**
     * 获取推广员推广人数
     * 邓赛赛
     */
    public function promoters_people_num($m_id,$is_promoters){
        $where = [
            'tgy_m.m_id'=>$m_id,                //用户id
            'tgy_m.is_promoters'=>$is_promoters,//推广员状态
            'il.descendants_num'=>1,            //被邀请者为几级邀请
            'son_m.is_auction'=>1,              //是否参拍 1参拍 2为参拍
        ];
        //不传入推广员状态引出此字段
        if(!$is_promoters){
            unset($where['tgy_m.is_promoters']);
        }
        $data['m_id'] = $m_id;
        //推广员一级推荐参拍人数
        $data['class_a']['auction'] = Db::table('pai_member tgy_m')
            ->where($where)
            ->join('pai_invitation_log il','tgy_m.m_id = il.group_gene','left')
            ->join('pai_member son_m','il.m_id=son_m.m_id','left')
            ->count();
        //推广员一级推荐未参拍人数
        $where['son_m.is_auction'] = 2; //是否参拍 1参拍 2为参拍
        $data['class_a']['no_auction'] = Db::table('pai_member tgy_m')
            ->where($where)
            ->join('pai_invitation_log il','tgy_m.m_id = il.group_gene','left')
            ->join('pai_member son_m','il.m_id=son_m.m_id','left')
            ->count();
        //推广员二级推荐参拍人数
        $where['son_m.is_auction'] = 1; //是否参拍 1参拍 2为参拍
        $where['il.descendants_num'] = 2;//被邀请者为几级邀请
        $data['class_b']['auction'] = Db::table('pai_member tgy_m')
            ->where($where)
            ->join('pai_invitation_log il','tgy_m.m_id = il.group_gene','left')
            ->join('pai_member son_m','il.m_id=son_m.m_id','left')
            ->count();
        $where['son_m.is_auction'] = 2; //是否参拍 1参拍 2为参拍
        $data['class_b']['no_auction'] = Db::table('pai_member tgy_m')
            ->where($where)
            ->join('pai_invitation_log il','tgy_m.m_id = il.group_gene','left')
            ->join('pai_member son_m','il.m_id=son_m.m_id','left')
            ->count();
        return $data;
    }
    /**
     * 推广员推广期考核结束
     * 邓赛赛
     */
    public function promoters_assessment_end(){
        $start_date=date("Y-m-d",time())." 0:0:0";
        $start_time1=strtotime($start_date);
        $end_time1 = $start_time1+86400;
        $where = [
            'add_time'=>['between',[$start_time1,$end_time1]],
            'type'    =>2,
        ];
        $promoters_log = new PromotersLogService();
        $res = $promoters_log->get_count($where);
        if($res){
            return ['status'=>0,'msg'=>'今日已审核，不可重复操作'];
        }
        //查找昨天时间，昨日待考核的预备推广员
        $str=date("Y-m-d",strtotime("-1 day"))." 0:0:0";
        $start_time=strtotime($str);
        $str=date("Y-m-d",strtotime("-1 day"))." 24:00:00";
        $end_time=strtotime($str);
        $where = [
            'is_promoters'=>4,
            'end_time'=>['between',[$start_time,$end_time]],
        ];
        $mid_arr = Db::table('pai_promoters_apply')->where($where)->column('m_id');
        $config = new ConfigService();
        $c_value = $config->configGetValue(['c_code'=>'TGY_ONE'],'c_value');
        Db::startTrans();
        try{
            //logo表信息
            $log_info = [
                'type'      =>2,        //审核信息类型 1每日冻结 2每日审核 3每日推广员收益
                'add_time'  =>time(),   //添加时间
                'data'      =>array(),
            ];
            //待审核ID不为空是执行操作
            if(!empty($mid_arr)){
                //添加系统消息
                $system = new SystemMsgService();
                $data2 = [
                    'sm_addtime'=>time(),
                    'sm_title'=>'推广员考核',
                    'sm_brief'=>'推广员考核通知',
                    'sm_content'=>'恭喜您，您已通过推广员考核，成为吖吖推广员',
                ];
                $promoters_frozen_model = new PromotersFrozenModel();
                foreach($mid_arr as $k => $v){
                    $people = $this->promoters_people_num($v,4);
                    //推广员邀请的参团的一级推荐者是否达到标准
                    $is_invitation_people_ok = $people['class_a']['auction'] >= $c_value;
                    if($is_invitation_people_ok){
                        $is_promoters = 5;
                        //logo表信息
                        $log_info['data'][$k] = [
                            'm_id'=>$v,
                            'standard_people_number '=>$c_value,
                            'new_people'=>$people['class_a']['auction'],
                            'is_promoters'=>5,
                            'info'=>'通过审核，标准'.$c_value.'人，现有激活人数：'.$people['class_a']['auction'].'人',
                            'time'=>time(),
                        ];
                    }else{
                        $is_promoters = 6;
                        $data2['sm_content'] = '很遗憾！您未通过推广员考核，不要灰心，吖吖会有很多活动哦';
                        $data2['is_success'] = 1;
                        //logo表信息
                        $log_info['data'][$k] = [
                            'is_promoters'=>6,
                            'info'=>'未通过审核，标准'.$c_value.'人，现有激活人数：'.$people['class_a']['auction'].'人，缺少'.($c_value-$people['class_a']['auction']).'人',
                        ];
                    }
                    //考核结束时结算冻结期的收益
                    $promoters_frozen_model ->thaw_money($v,$is_invitation_people_ok);
                    $data2['to_mid'] = $v;
                    $system->AddSystemMsg($data2);
                    $where = [
                        'm_id'=> $v
                    ];
                    Db::table('pai_member')->where($where)->update(['is_promoters'=>$is_promoters,'edit_time'=>time()]);
                    Db::table('pai_promoters_apply')->where($where)->update(['is_promoters'=>$is_promoters,'update_time'=>time()]);
                }
            }
            $log_info['data'] = json_encode($log_info['data']);
            $promoters_log->get_add($log_info);
            // 提交事务
            Db::commit();
            return ['status'=>1,'msg'=>'已审核考核期结束推广员','data'=>$log_info];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $error_msg = $e ->getMessage();//错误信息
            $arr = array(
                'el_type_id'    =>5,
                'el_description'=>date('Y-m-d H:i:s').'考核时间结束推广员报错：'.$error_msg,
                'el_time'       =>time(),
            );
            Db('error_log')->insert($arr);//插入错误日志表
            return ['status'=>0,'msg'=>'审核考核期结束推广员错误'.$error_msg];
        }
    }

    /**
     * 推广期邀请列表（参拍和未参拍数据）
     * 邓赛赛
     */
    public function assessment_user_list($where,$is_auction,$offset,$page_size){
        $base = new BaseService();
        $where['son_m.is_auction'] =  1;
        if($is_auction != 1){
            $where['son_m.is_auction'] =  2;
        }
        $list['list'] = Db::table('pai_member m')
            ->where($where)
            ->join('pai_member son_m','m.m_id = son_m.tj_mid','left')
            ->join('pai_member_level ml','son_m.m_levelid = ml.ml_id','left')
            ->field('son_m.m_id,son_m.m_name,son_m.m_mobile,ml.ml_name')
            ->limit($offset,$page_size)
            ->select();
        foreach($list['list'] as &$v){
            $m_mobile = htmlspecialchars($base->decrypt($v['m_mobile']));
            if($m_mobile){
                $v['m_mobile'] = substr_replace($m_mobile,"****",3,4);
            }else{
                $v['m_mobile'] = '';
            }
        }
        $total_num = Db::table('pai_member m')
            ->where($where)
            ->join('pai_member son_m','m.m_id = son_m.tj_mid','left')
            ->count();

        $total_page = ceil($total_num/$page_size);

        $list['page_size'] = $page_size;
        $new_num = count($list['list']);
        $list['new_num'] = $new_num;
        $list['total_num'] = $total_num;
        $list['total_page'] = $total_page;
        return $list;
    }
//    /**
//     * 推广期邀请列表（参拍和未参拍数据）
//     * 邓赛赛
//     */
//    public function assessment_user_list($where,$is_auction,$offset,$page_size){
//        $base = new BaseService();
//        $where['son_m.m_id'] =  ['<>','null'];
//        $where['o_id'] =  ['>',0];
//        if($is_auction != 1){
//            $where['o_id'] =  ['exp','is null'];
//        }
//        $list['list'] = Db::table('pai_member m')
//            ->where($where)
//            ->join('pai_member son_m','m.m_id = son_m.tj_mid','left')
//            ->join('pai_order_pai op','op.m_id = son_m.m_id','left')
//            ->join('pai_member_level ml','son_m.m_levelid = ml.ml_id','left')
//            ->field('son_m.m_id,son_m.m_name,son_m.m_mobile,o_id,count(op.o_id) is_order_pai,ml.ml_name')
//            ->group('son_m.m_id')
//            ->limit($offset,$page_size)
//            ->select();
//        foreach($list['list'] as &$v){
//            $m_mobile = htmlspecialchars($base->decrypt($v['m_mobile']));
//            if($m_mobile){
//                $v['m_mobile'] = substr_replace($m_mobile,"****",3,4);
//            }else{
//                $v['m_mobile'] = '';
//            }
//        }
//        $total_num = Db::table('pai_member m')
//            ->where($where)
//            ->join('pai_member son_m','m.m_id = son_m.tj_mid','left')
//            ->join('pai_order_pai op','op.m_id = son_m.m_id','left')
//            ->group('son_m.m_id')
//            ->count();
//
//        $total_page = ceil($total_num/$page_size);
//
//        $list['page_size'] = $page_size;
//        $new_num = count($list['list']);
//        $list['new_num'] = $new_num;
//        $list['total_num'] = $total_num;
//        $list['total_page'] = $total_page;
//        return $list;
//    }



	
}