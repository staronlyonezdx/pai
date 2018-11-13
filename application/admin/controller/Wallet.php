<?php
namespace app\admin\controller;
use app\api\controller\Member;
use app\data\service\BaseService;
use app\data\service\member\MemberService;
use app\data\service\withdraw\WithdrawService;
use think\Db;

class Wallet extends AdminHome
{
    /**
     * 提现列表
     * 邓赛赛
     */
    public function withdrawList(){
        $w_state = input('param.w_state');
        $w_state = empty($w_state) ? 0 : $w_state;
        $where = [
            'w.w_state'=>$w_state,
            'm.is_jq'=>2,
        ];
        $field = 'w.w_id,w.w_time,w.w_mid,w.w_money,w.w_state,w.w_type,w.w_old_moneymount,w.w_rate,w.w_poundage,w.w_new_proce,w.is_urgent,w.w_last_time,m.m_name,m.m_bankowner,m.m_bankname,m.m_bankaccount,m.m_mobile';
        $withdraw = new WithdrawService();
        $list = $withdraw->get_withdraw_page($where,$field);
        $page = $list->render();
        $total = $list->total();
        $lists = array();
        foreach($list as $k => $v){
            $lists[$k] = $v;
            $mobile2 = htmlspecialchars($withdraw->decrypt($v['m_mobile']));
            $lists[$k]['m_mobile'] = $mobile2;
        }
        $this->assign([
            'page'=>$page,
            'total'=>$total,
            'list'=>$lists,
            'w_state'=>$w_state
        ]);
        return $this->fetch();
    }

    /**
     * 金额详情
     * 邓赛赛
     */
    public function money_info(){
        $m_id = input('param.m_id');
        $money_type = input('param.money_type'); //资金详情
        $recharge   = input('param.recharge');   //充值
        $withdraw   = input('param.withdraw');   //提现
        $consumption= input('param.consumption');//消费
        $excel= input('param.excel');//导出excel

        $excel_arr = array();

        $member = new MemberService();
        $where = [
            'm_id'=>$m_id
        ];
        $info = $member->get_info($where,'m_name,m_mobile,real_name');
        $info['m_mobile'] = $member->decrypt($info['m_mobile']);
        //收益详情
        if(!$recharge && !$withdraw && !$consumption){
            $whw = new WithdrawService();

                $where = [
                    'm_id'=>$m_id,
                    'money_type'=>$money_type,
                ];
                $list = $whw->get_list($where,'add_time desc','*');
                foreach($list as $k => $v){
                    $excel_arr[$k]['ml_id'] = $v['ml_id'];
                    $excel_arr[$k]['m_id'] = $v['m_id'];
                    $excel_arr[$k]['m_name'] = $list[$k]['m_name'] = $info['m_name'];
                    $excel_arr[$k]['real_name'] = $list[$k]['real_name'] = $info['real_name'];
                    $excel_arr[$k]['m_mobile']= $list[$k]['m_mobile'] = $info['m_mobile'];
                    switch($v['ml_table']){
                        case 1:
                            $v['ml_table'] = '提现表'.$v['ml_table'];
                            break;
                        case 2:
                            $v['ml_table'] = '充值表'.$v['ml_table'];
                            break;
                        case 3:
                            $v['ml_table'] = '收益表'.$v['ml_table'];
                            break;
                        case 4:
                            $v['ml_table'] = '退款表'.$v['ml_table'];
                            break;
                        case 5:
                            $v['ml_table'] = '余额收益表'.$v['ml_table'];
                            break;
                        case 6:
                            $v['ml_table'] = '余额支付'.$v['ml_table'];
                            break;
                        default :
                            $v['ml_table'] = '未知';
                            break;
                    }
                    $excel_arr[$k]['ml_table'] = $list[$k]['ml_table'] = $v['ml_table'];
                    $excel_arr[$k]['add_time'] = $list[$k]['add_time'] = date('Y-m-d H:i',$v['add_time']);
                    $excel_arr[$k]['update_time'] = $list[$k]['update_time'] = $v['update_time'] ? date('Y-m-d H:i',$v['update_time']) : '';
                    $excel_arr[$k]['ml_money'] = $v['ml_money'];
                    $excel_arr[$k]['ml_type'] = $list[$k]['ml_type'] = $v['ml_type'] == 'add' ? '增加' : '减少';
                    $excel_arr[$k]['ml_money'] = $v['ml_money'];
                    if($money_type == 2) {
                        switch ($v['state']) {
                            case 1:
                                $v['state'] = '申请中';
                                break;
                            case 7:
                                $v['state'] = '不通过';
                                break;
                            case 8:
                                $v['state'] = '完成';
                                break;
                            default :
                                $v['ml_table'] = '未知';
                                break;
                        }
                    }else{
                        switch ($v['state']) {
                            case 8:
                                $v['state'] = '完成';
                                break;
                            default :
                                $v['state'] = '未成功';
                                break;
                        }
                    }
                    $excel_arr[$k]['state'] = $list[$k]['state'] = $v['state'];
                    $excel_arr[$k]['ml_reason'] = $v['ml_reason'];
                }
            if($excel){
                    $m_type = $money_type == 1 ? '余额资金详情': '收益资金详情';
                $filename = $m_type . date('Y-m-d H:i');
                $header = array('logID','用户ID','用户昵称','用户名','手机号', '关联表', '开始日期', '变动日期','金额','增减','状态','变动理由');
                $base = new BaseService();
                $base->exportExcel($excel_arr, $header, $filename);
            }
//            dump($list);die;
//            dump($excel_arr);die;
//            die;
//            $where = [
//                'm_id'=>$m_id,
//                'money_type'=>$money_type,
//            ];
//            $list = $whw->get_money_info($where,'*',1,20);
            $this->assign('list',$list);
        }


        $mem = new MemberService();
        $where =['m_id'=>$m_id];
        $user = $mem->get_info($where,'m_id,m_name,m_mobile,m_money,m_frozen_money,m_income,m_frozen_income');
        $user['m_mobile'] = htmlspecialchars($mem->decrypt($user['m_mobile']));
        $recharge_array = array();
        //充值信息
        if($recharge) {
            $recharge_array =  Db::query('SELECT r_id,r_time,r_type,r_money FROM pai_recharge  where m_id = '.$m_id .' AND r_state = 8  ORDER BY r_time DESC');
            foreach($recharge_array as $k => $v){
                $excel_arr[$k]['r_id'] = $v['r_id'];
                $excel_arr[$k]['m_name'] = $recharge_array[$k]['m_name'] = $info['m_name'];
                $excel_arr[$k]['real_name'] = $recharge_array[$k]['real_name'] = $info['real_name'];
                $excel_arr[$k]['m_mobile'] = $recharge_array[$k]['m_mobile'] =  $info['m_mobile'];
                $excel_arr[$k]['r_time'] = $recharge_array[$k]['r_time'] = date("Y-m-d H:i:s",$v['r_time']);
                switch ($v['r_type']){
                    case 1:
                        $recharge_array[$k]['r_type'] = '微信公众号支付';
                        break;
                    case 2:
                        $recharge_array[$k]['r_type'] = '微信H5支付';
                        break;
                    case 3:
                        $recharge_array[$k]['r_type'] = '支付宝H5支付';
                        break;
                    case 4:
                        $recharge_array[$k]['r_type'] = '银行卡支付';
                        break;
                    case 5:
                        $recharge_array[$k]['r_type'] = '余额支付';
                        break;
                    case 6:
                        $recharge_array[$k]['r_type'] = '微信APP支付';
                        break;
                    case 7:
                        $recharge_array[$k]['r_type'] = '支付宝APP支付';
                        break;
                    default :
                        $recharge_array[$k]['r_type'] = '未知';
                        break;
                }
                $excel_arr[$k]['r_type'] = $recharge_array[$k]['r_type'];
                $excel_arr[$k]['r_money'] = $v['r_money'];
            }
            if($excel){
                $filename = '充值信息' . date('Y-m-d H:i');
                $header = array('充值ID','用户昵称','用户名','手机号', '日期', '充值方式', '充值金额');
                $base = new BaseService();
                $base->exportExcel($excel_arr, $header, $filename);
            }
        }
        //提现信息
        $withdraw_array = array();
        if($withdraw){
            $withdraw_array =  Db::query('SELECT w_id,w_time,w_success_time,w_money,w_state,w_explain FROM pai_withdraw where w_mid = '.$m_id .' ORDER BY w_time DESC');
            foreach($withdraw_array as $k => $v){
                $excel_arr[$k]['w_id'] = $v['w_id'];
                $excel_arr[$k]['m_name'] = $withdraw_array[$k]['m_name'] = $info['m_name'];
                $excel_arr[$k]['real_name'] = $withdraw_array[$k]['real_name'] = $info['real_name'];
                $excel_arr[$k]['m_mobile'] = $withdraw_array[$k]['m_mobile'] =  $info['m_mobile'];
                $excel_arr[$k]['w_time'] = $withdraw_array[$k]['w_time'] = date("Y-m-d H:i:s",$v['w_time']);
                $excel_arr[$k]['w_success_time'] = $withdraw_array[$k]['w_success_time'] = empty($v['w_success_time']) ? '' : date("Y-m-d H:i:s",$v['w_success_time']);
                $excel_arr[$k]['w_money'] = $v['w_money'];
                switch ($v['w_state']){
                    case 0:
                        $withdraw_array[$k]['w_state'] = '申请中';
                        break;
                    case 1:
                        $withdraw_array[$k]['w_state'] = '通过';
                        break;
                    case 2:
                        $withdraw_array[$k]['w_state'] = '不通过';
                        break;
                    case 3:
                        $withdraw_array[$k]['w_state'] = '已转账';
                        break;
                    default :
                        $withdraw_array[$k]['w_state'] = '未知';
                        break;
                }
                $excel_arr[$k]['w_state'] = $withdraw_array[$k]['w_state'];
                $excel_arr[$k]['w_explain'] = $v['w_explain'];
            }
            if($excel){
                $filename = '提现信息' . date('Y-m-d H:i');
                $header = array('提现ID','用户昵称','用户名','手机号', '申请日期', '打款日期', '提现金额','状态','不通过理由');
                $base = new BaseService();
                $base->exportExcel($excel_arr, $header, $filename);
            }
        }
        //消费和退款信息
        $consumption_array = array();
        if($consumption){
            $consumption_array =  Db::query('SELECT * FROM pai_money_log where m_id = '.$m_id .' AND ml_table in (4,6) ORDER BY add_time DESC');
            foreach($consumption_array as $k => $v){
                $excel_arr[$k]['ml_id'] = $v['ml_id'];
                $excel_arr[$k]['m_name'] = $consumption_array[$k]['m_name'] = $info['m_name'];
                $excel_arr[$k]['real_name'] = $consumption_array[$k]['real_name'] = $info['real_name'];
                $excel_arr[$k]['m_mobile'] = $consumption_array[$k]['m_mobile'] =  $info['m_mobile'];
                $excel_arr[$k]['add_time'] = $consumption_array[$k]['add_time'] = date("Y-m-d H:i:s",$v['add_time']);
                $excel_arr[$k]['ml_money'] = $v['ml_money'];
                $excel_arr[$k]['ml_table'] = $consumption_array[$k]['ml_table'] = $v['ml_table'] == 4 ? '退款' : '消费' ;
                $excel_arr[$k]['ml_reason'] = $v['ml_reason'];
                if($v['ml_table'] == 4){
                    switch($v['state']){
                        case 1 :
                            $consumption_array[$k]['state'] = '办理中';
                            break;
                        case 7 :
                            $consumption_array[$k]['state'] = '不通过';
                            break;
                        case 8 :
                            $consumption_array[$k]['state'] = '完成';
                            break;
                        default:
                            $consumption_array[$k]['state'] = '未知';
                            break;
                    };
                }else{
                    $consumption_array[$k]['state'] = '';
                }
                $excel_arr[$k]['state'] = $consumption_array[$k]['state'];
            }
            if($excel){
                $filename = '消费和退款信息' . date('Y-m-d H:i');
                $header = array('记录ID','用户昵称','用户名','手机号', '创建如期', '金额', '类型','原因','退款状态');
                $base = new BaseService();
                $base->exportExcel($excel_arr, $header, $filename);
            }
        }
        $this->assign('recharge_array',$recharge_array);
        $this->assign('withdraw_array',$withdraw_array);
        $this->assign('consumption_array',$consumption_array);
        $this->assign('money_type',$money_type);
        $this->assign('user',$user);
        return view();
    }
    /**
     *审核提现(通过/不通过)
     * 邓赛赛
     */
    public function acceptance(){
        $w_id = input('post.w_id');
        $num  = input('post.num');
        $w_explain = input('post.w_explain');
        $admin_id = $this->checkAdminCookie();
        $withdraw = new WithdrawService();
        $where   = ['w_id'   =>$w_id];
        $data    =[
            'w_state'=>$num,
            'w_explain'=>$w_explain,
            'admin_id'=>$admin_id,
        ];
        $res     = $withdraw->get_save($where,$data);
        return $res;
    }

    /**
     * 提现完成操作
     * 邓赛赛
     */
    public function withdraw(){
        $admin_id = $this->checkAdminCookie();
        $w_id = input('param.w_id');
        $withdraw = new WithdrawService();
        $res = $withdraw->withdraw_money($w_id,$admin_id);
        return $res;
    }

}
