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
use app\data\service\config\ConfigService;
use app\data\service\member\MemberService;
use app\data\service\promoters\PromotersLogService;
use think\Db;

class PromotersFrozenModel extends BaseModel
{	
    protected $db = 'promoters_frozen' ;//推广员考核资金冻结表
    /**
     * 考核期推广员观望奖（每日脚本）
     * 邓赛赛
     */
    public function examination_watch_bonus(){
        $start_date=date("Y-m-d",time())." 0:0:0";
        $start_time1=strtotime($start_date);
        $end_time1 = $start_time1+86400;
        $where = [
            'add_time'=>['between',[$start_time1,$end_time1]],
            'type'    =>1,
        ];
        $promoters_log = new PromotersLogService();
        $res = $promoters_log->get_count($where);
        if($res){
            return ['status'=>0,'msg'=>'今日已冻结收益计算，不可重复操作'];
        }
        $where = [
            'is_promoters'=>4,
            'm_state'=>0,
        ];
        //所有考核期推广员
        $mid_list = Db::table('pai_member')->where($where)->column('m_id');
        $config = new ConfigService();
        $ztsy = $config->configGetValue(['c_code'=>'TGY_ZTSY'],'c_value');
        Db::startTrans();
        try{
            //logo表信息
            $log_info = [
                'type'      =>1,        //审核信息类型 1每日冻结 2每日审核 3每日推广员收益
                'add_time'  =>time(),   //添加时间
                'data'      =>'每日冻结执行操作'.date('Y-m-d H:i:s'),
            ];
            //最低金额才可提供收益
            $min_money = ceil(0.01/$ztsy);
            //推广员id数组
                $where = [
                    'tgy_m.is_promoters'=>4,
                    'tgy_m.m_state'=>0,          //推广员必须账号正常
                    'son_m.m_state'=>0,          //被邀请者必须账号正常
                    'son_m.m_money'=>['>',$min_money],
                    'son_m.is_auction'=>1,
                ];
                $page = 1;
                $page_size = 500;
                //每次调用此会员一百条数据
                while(true){
                    $offset = ($page - 1) * $page_size;
                    $list = Db::table('pai_member tgy_m')
                        ->join('pai_member son_m','tgy_m.m_id = son_m.tj_mid','left')
                        ->join('pai_member_level ml','ml.ml_id = tgy_m.m_levelid','left')
                        ->where($where)
                        ->field('tgy_m.m_id tgy_m_id,ml.ml_share_income1 ,son_m.m_id son_m_id,son_m.m_money')
                        ->limit($offset,$page_size)
                        ->select();
                    //检测是否数组是否为真
                    if(empty($list)){
                        break;
                    }
                    //每位下家提供的冻结收益
                    $data = array();
                   foreach($list as $key => $value){
                        $data[$key] = [
                            'm_id'           =>$value['tgy_m_id'],
                            'from_id'        =>$value['son_m_id'],
                            'descendants_num'=>1,
                            'add_time'       =>time(),
                            'type'           =>3,
                            'p_money'        =>floor($value['m_money']*$ztsy*100)/100,
                            'e_money'        =>floor($value['m_money']*($value['ml_share_income1']/10000)*100)/100,
                        ];
                      }
                    if($data){
                        Db::table('pai_promoters_frozen')->insertAll($data);
                    }
                    //检测是否是最后一页
                    if(count($list) != $page_size){
                        break;
                    }else{
                        $page ++;
                    }
                }
            $promoters_log->get_add($log_info);   //插入log表
            // 提交事务
            Db::commit();
            return ['status'=>1,'msg'=>'每日冻结收益计算完成'];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $error_msg = $e ->getMessage();//错误信息
            $arr = array(
                'el_type_id'    =>5,
                'el_description'=>date('Y-m-d H:i:s').'推广员计算冻结信息报错：'.$error_msg,
                'el_time'       =>time(),
            );
            Db('error_log')->insert($arr);//插入错误日志表
            return ['status'=>0,'msg'=>'每日冻结收益计算失败'.$error_msg];
        }
    }

    /**
     * 推广员每日收益(观望奖-正式推广员 每日脚本)
     * 邓赛赛
     */
    public function today_money(){
        $start_date=date("Y-m-d",time())." 0:0:0";
        $start_time1=strtotime($start_date);
        $end_time1 = $start_time1+86400;
        $where = [
            'add_time'=>['between',[$start_time1,$end_time1]],
            'type'    =>3,
        ];
        $promoters_log = new PromotersLogService();
        $res = $promoters_log->get_count($where);
        if($res){
            return ['status'=>0,'msg'=>'推广员每日收益已操作，不可重复操作'];
        }
        $config = new ConfigService();
        //直推收益比例
        $ztsy = $config->configGetValue(['c_code'=>'TGY_ZTSY'],'c_value');
        $where = [
            'm.is_promoters'=>5,                //必须是推广员状态
            'm.m_state'=>0,                     //推广员账号必须正常
            'ilm.m_state'=>0,                   //会员账号必须正常
            'ilm.m_money'=>['>',29],             //最不能低29才可为推广员提供收益
            'ilm.is_auction'=>1,             //用户必须参拍才可提供奖励
        ];
        $page = 1;
        $page_size = 500;
        Db::startTrans();
        try{
            //logo表信息
            $log_info = [
                'type'      =>3,        //审核信息类型 1每日冻结 2每日审核 3每日推广员收益
                'add_time'  =>time(),   //添加时间
                'data'      =>'每日推广员收益执行操作'.date('Y-m-d H:i:s'),
            ];
            //每次调用此会员五百条数据
            while(true){
                $mid_array = array();
                $offset = ($page - 1) * $page_size;
                $mid_arr = Db::table('pai_member m')
                    ->where($where)
                    ->join('pai_member ilm','m.m_id=ilm.tj_mid','left')
                    ->field('m.m_id promoters_id,ilm.m_id,ilm.m_money,ilm.m_name,ilm.m_levelid,ilm.m_type')
                    ->limit($offset,$page_size)
                    ->select();
                if(empty($mid_arr)){
                    break;
                }
                $data = array();
                $data1 = array();
                foreach($mid_arr as $k => $v){
                    $member_type = $v['m_type'] == 1 ? 2 : 1;   //会员类型1会员2商家
                    $money = floor($v['m_money']*$ztsy*100)/100; //利息
                    if($money <= 0){
                        continue;
                    }
                    //不同推广员的会员提成收益
                    if(isset($mid_array[$v['promoters_id']])){
                        $m_income = $mid_array[$v['promoters_id']]['m_income'];
                        $mid_array[$v['promoters_id']] = [
                            'm_id'=>$v['promoters_id'],
                            'm_income'=> $m_income+$money,
                        ];
                    }else{
                        $mid_array[$v['promoters_id']] = [
                            'm_id'=>$v['promoters_id'],
                            'm_income'=>$money,
                        ];
                    }
                    //收益表
                    $data[$k] = [
                        'i_time'=>time(),
                        'i_typeid'=>1,
                        'm_id'=>$v['promoters_id'],
                        'i_state'=>8,
                        'i_money'=>$money,
                        'i_from_mid'=>$v['m_id'],
                        'i_reason'=>'推广员推荐会员收益奖励',
                    ];
                    //money_log表
                    $data1[$k] = [
                        'ml_type'=>'add',
                        'ml_table'=>3,
                        'ml_reason_id'=>7,
                        'ml_money'=>$money,
                        'money_type'=>2,
                        'nickname'=>$v['m_name'],
                        'position'=>$v['m_levelid'],
                        'member_type'=>$member_type,
                        'add_time'=>time(),
                        'm_id'=>$v['promoters_id'],
                        'state'=>8,
                        'from_id'=>$v['m_id'],
                        'ml_reason'=>'推广员推荐会员收益奖励',
                        'income_type'=>2,
                    ];
                }
                Db::table('pai_income')->insertAll($data);
                Db::table('pai_money_log')->insertAll($data1);
                foreach($mid_array as $value){
                    Db::table('pai_member')->where('m_id',$value['m_id'])->setInc('m_income',$value['m_income']);
                }
                //检测是否是最后一页
                if(count($mid_arr) < $page_size){
                    break;
                }else{
                    $page ++;
                }
            }
            $promoters_log->get_add($log_info);   //插入log表
            Db::commit();
            return ['status'=>1,'msg'=>'每日推广员收益计算完成'];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $error_msg = $e ->getMessage();//错误信息
            $arr = array(
                'el_type_id'    =>5,
                'el_description'=>date('Y-m-d H:i:s').'推广员收益信息报错：'.$error_msg,
                'el_time'       =>time(),
            );
            Db('error_log')->insert($arr);//插入错误日志表
            return ['status'=>0,'msg'=>'每日推广员收益计算失败'.$error_msg];
        }
    }

    /**
     * 考核成功冻结资金解冻操作
     * 邓赛赛
     */
    public function thaw_money($m_id,$is_invitation_people_ok){
        $where = [
            'pf.m_id'=>$m_id,
            'pf.state'=>1,
            'm.m_state'=>0,
            'm.is_auction'=>1,
        ];
        $list = Db::table('pai_promoters_frozen pf')
            ->join('pai_member m','pf.from_id = m.m_id','left')
            ->where($where)
            ->field('pf.*,m.m_name,m.m_levelid,m.m_type,is_auction')
            ->select();
        $pf_ids = array();
        if($list){
            $data = array();
            $data1 = array();
            $money = 0;
            foreach($list as $k => $v){
                $pf_ids[$k] = $v['pf_id'];
                $member_type = $v['m_type'] == 1 ? 2 : 1;   //会员类型1会员2商家
                //是否邀请够人数达到推广员
                if($is_invitation_people_ok){
                    //收益表
                    $data[$k] = [
                        'i_time'=>time(),
                        'i_typeid'=>1,
                        'm_id'=>$m_id,
                        'i_state'=>8,
                        'i_money'=>$v['p_money'],
                        'i_reason'=>'推广员考核期收益奖励',
                        'i_from_mid'=>$v['from_id'],
                    ];
                    //money_log表
                    $data1[$k] = [
                        'ml_type'=>'add',
                        'ml_table'=>3,
                        'ml_reason_id'=>7,
                        'ml_money'=>$v['p_money'],
                        'money_type'=>2,
                        'nickname'=>$v['m_name'],
                        'position'=>$v['m_levelid'],
                        'member_type'=>$member_type,
                        'add_time'=>time(),
                        'm_id'=>$m_id,
                        'state'=>8,
                        'from_id'=>$v['from_id']
                    ];
                    switch($v['type']){
                        case 1:
                            if($v['is_auction'] == 1){
                                $data[$k]['i_typeid'] = 5;
                                $data[$k]['i_reason'] = '推广员邀请直推会员首次参拍奖励';
                                $data1[$k]['ml_reason'] = '推广员邀请直推会员首次参拍奖励';
                                $data1[$k]['income_type'] = 1;
                                $money += $v['p_money'];
                            }else{
                                unset($pf_ids[$k]);
                            }
                            break;
                        case 2:
                            if($v['is_auction'] == 1){
                                $data[$k]['i_typeid'] = 6;
                                $data[$k]['i_reason'] = '推广员邀请间推会员首次参拍奖励';
                                $data1[$k]['ml_reason'] = '推广员邀请间推会员首次参拍奖励';
                                $data1[$k]['income_type'] = 1;
                                $money += $v['p_money'];
                            }else{
                                unset($pf_ids[$k]);
                            }
                            break;
                        case 3:
                            $data[$k]['i_typeid'] = 1;
                            $data[$k]['i_reason'] = '推广员邀请直推会员收益奖励';
                            $data1[$k]['ml_reason'] = '推广员邀请直推会员收益奖励';
                            $data1[$k]['income_type'] = 2;
                            $money += $v['p_money'];
                            break;
                    }
                }else{
                    switch($v['type']){
                        case 1:
                            if($v['is_auction'] == 1){
                                //收益表
                                $data[$k] = [
                                    'i_time'=>time(),
                                    'i_typeid'=>1,
                                    'm_id'=>$m_id,
                                    'i_state'=>8,
                                    'i_money'=>$v['e_money'],
                                    'i_reason'=>'推广员考核期收益奖励',
                                    'i_from_mid'=>$v['from_id'],
                                ];
                                //money_log表
                                $data1[$k] = [
                                    'ml_type'=>'add',
                                    'ml_table'=>3,
                                    'ml_reason_id'=>7,
                                    'ml_money'=>$v['e_money'],
                                    'money_type'=>2,
                                    'nickname'=>$v['m_name'],
                                    'position'=>$v['m_levelid'],
                                    'member_type'=>$member_type,
                                    'add_time'=>time(),
                                    'm_id'=>$m_id,
                                    'state'=>8,
                                    'from_id'=>$v['from_id']
                                ];
                                $data[$k]['i_typeid'] = 5;
                                $data[$k]['i_reason'] = '推广员邀请直推会员首次参拍奖励';
                                $data1[$k]['ml_reason'] = '推广员邀请直推会员首次参拍奖励';
                                $data1[$k]['income_type'] = 1;
                                $money += $v['e_money'];
                            }else{
                                unset($pf_ids[$k]);
                            }
                            break;
                        case 2:
                            unset($pf_ids[$k]);
                            break;
                        case 3:
                            //收益表
                            $data[$k] = [
                                'i_time'=>time(),
                                'i_typeid'=>1,
                                'm_id'=>$m_id,
                                'i_state'=>8,
                                'i_money'=>$v['e_money'],
                                'i_reason'=>'推广员考核期收益奖励',
                                'i_from_mid'=>$v['from_id'],
                            ];
                            //money_log表
                            $data1[$k] = [
                                'ml_type'=>'add',
                                'ml_table'=>3,
                                'ml_reason_id'=>7,
                                'ml_money'=>$v['e_money'],
                                'money_type'=>2,
                                'nickname'=>$v['m_name'],
                                'position'=>$v['m_levelid'],
                                'member_type'=>$member_type,
                                'add_time'=>time(),
                                'm_id'=>$m_id,
                                'state'=>8,
                                'from_id'=>$v['from_id']
                            ];
                            $data[$k]['i_typeid'] = 1;
                            $data[$k]['i_reason'] = '推广员考核期邀请会员收益奖励';
                            $data1[$k]['ml_reason'] = '推广员考核期邀请会员收益奖励';
                            $data1[$k]['income_type'] = 2;
                            $money += $v['e_money'];
                            break;
                    }
                }
            }
            Db::table('pai_income')->insertAll($data);
            Db::table('pai_money_log')->insertAll($data1);
            Db::table('pai_member')->where('m_id',$m_id)->setInc('m_income',$money);
        }
        if($pf_ids){
            $where = [
                'pf_id'=>['in',$pf_ids]
            ];
            //邀请的用户已参拍解冻给推广员money
            Db::table('pai_promoters_frozen')->where($where)->update(['state'=>8,'update_time'=>time()]);
        }
        //邀请的用户未参拍解冻不给推广员money
        $where = [
            'm_id'=>$m_id,
            'state'=>1
        ];
        Db::table('pai_promoters_frozen')->where($where)->update(['state'=>7,'update_time'=>time()]);
        return $pf_ids;
    }

    /**
     * 考核期冻结资金列表
     * 邓赛赛
     */
    public function examination_money_list($where,$field,$offset,$page_size){
        $list['list'] = Db::table('pai_promoters_frozen pf')
            ->where($where)
            ->join('pai_member m','pf.from_id = m.m_id','left')
            ->join('pai_member_level ml','m.m_levelid = ml.ml_id','left')
            ->limit($offset,$page_size)
            ->field($field)
            ->select();
        $data['list'] = array();
        foreach($list['list'] as $k => $v){
            switch($v['type']){
                case 1:
                case 2:
                    $data['list'][$k]['reason'] = '冻结推荐奖';
                    break;
                case 3:
                case 4:
                    $data['list'][$k]['reason'] = '冻结观望奖';
                    break;
            }
            $data['list'][$k]['add_time'] = date('m-d H:i',$v['add_time']);
            $data['list'][$k]['m_name'] =$v['m_name'];
            $data['list'][$k]['money']  = $v['p_money'];
            $data['list'][$k]['ml_name']  = $v['ml_name'];
        }
        $total_num = Db::table('pai_promoters_frozen pf')
            ->where($where)
            ->join('pai_member m','pf.from_id = m.m_id','left')
            ->join('pai_member_level ml','m.m_levelid = ml.ml_id','left')
            ->count();
        $total_page = ceil($total_num/$page_size);

        $data['page_size'] = $page_size;
        $new_num = count($list['list']);
        $data['new_num'] = $new_num;
        $data['total_num'] = $total_num;
        $data['total_page'] = $total_page;
        return $data;
    }

}