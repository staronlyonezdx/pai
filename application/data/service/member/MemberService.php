<?php
/**
* 地址Service
*-------------------------------------------------------------------------------------------
* 版权所有 广州市素材火信息科技有限公司
* 创建日期 2017-07-12
* 版本 v.1.0.0
* 网站：www.sucaihuo.com
*--------------------------------------------------------------------------------------------
*/

namespace app\data\service\member;
use app\admin\controller\Testsms;
use app\data\model\member\MemberModel;
use app\data\service\BaseService as BaseService;
use app\data\service\config\ConfigService;
use app\data\service\frozen\FrozenService;
use app\data\service\moneyLog\MoneyLogService;
use app\data\service\promoters\PromotersFrozenService;
use app\data\service\sms\SmsService;
use app\data\service\withdraw\WithdrawService;
use RedisCache\RedisCache;
use think\Exception;
use think\Validate;
use think\Loader;
use think\Cache;
use think\Cookie;
use think\Image;
use think\Db;
class MemberService extends BaseService
{
    protected $cache = 'member';

    public function __construct()
    {
        parent::__construct();
        $this->member = new MemberModel();
        $this->cache = 'member';
    }


    /**
     * 获取单个值
     * 邓赛赛
     */
    public function get_value($where,$field){
        $value = $this->member->get_value($where,$field);
        return $value;
    }

    /**
     * 修改数据
     * 邓赛赛
     */
    public function get_save($where,$data,$cache=''){
        $res = $this->member->getSave($where,$data,$cache);
        return $res;
    }

    /**
     * 统计数量
     * 邓赛赛
     */
    public function get_count($where){
        $res = $this->member->getCount($where);
        return $res;
    }

    /**
     * 获取用户的等级
     * 邓赛赛
     */
    public function levelid(){
        $levelid = $this->member->get_levelid();
        return $levelid;
    }

    /**
     * 注册发送验证码
     * 微信绑定时发送验证码
     */
	public function getMemberInfo($map,$name='')
	{
	    $select['m_mobile'] = $this->encrypt($map['m_mobile']);//手机加密后再查询
        $info = $this->member->getInfo($select,'m_id');
        return $info;
	}
    //注册用户（App和PC端）注册加入uuid
    public function new_addUserAP($data,$tj=''){
        $parameter['m_mobile'] = trim($data['m_mobile']);
        $parameter['m_pwd'] =trim($data["m_pwd"]);
        $parameter['re_pwd'] = empty($data["re_pwd"]) ? '' : trim($data["re_pwd"]) ;
        $parameter['verification'] = trim($data["verification"]);
        $parameter['tj_mobile'] = empty($data["tj_mobile"]) ? '' : $data["tj_mobile"] ;
        $parameter['uuid'] = trim($data['uuid']);
        //写入IP--------wu start
        $uip=$this->getIp();
        $parameter['ip'] = empty($data["ip"]) ? $uip : $data["ip"];
        //写入IP--------wu end
        //写入渠道--------wu start
        if(!empty($_COOKIE['channel'])){
            $parameter['channel'] =$_COOKIE['channel'];
        }
        else{
            $parameter['channel']="";
        }
        //写入渠道--------wu end

        //推荐注册时无确认密码
        if(!$tj){
            if($parameter['m_pwd'] != $parameter['re_pwd']){
                return ['status'=>0,'msg'=>'两次密码不一致'];
            }
        }

        $is_phone = $this->is_phone($parameter['m_mobile']);
        if($is_phone){ return $is_phone;}
        $is_pwd = $this->is_pwd($parameter['m_pwd']);
        if($is_pwd){ return $is_pwd;}

        if(empty($parameter['verification'])){
            return ['status'=>0,'msg'=>'请输入验证码'];
        }

        //推荐者账号是否正确
        $parameter['tj_mid'] = '';
        $level_path = '';   //家族id
        if(trim($parameter['tj_mobile'])){
            $tj_is_phone = $this->is_phone($parameter['tj_mobile']);
            if($tj_is_phone){ return $tj_is_phone;}

            $sele['m_mobile'] = $this->encrypt($parameter['tj_mobile']);
            $tj_res = $this->member->getInfo($sele,'m_id');
            if($tj_res){
//                $level_path = $this->member->digui_mid($tj_res['m_id']);
                $level_path = $this->member->get_value(['m_id'=>$tj_res['m_id']],'level_path');
                $level_path = trim($level_path.'-'.$tj_res['m_id'],'-');
                $parameter['tj_mid'] = $tj_res['m_id'];
            }else{
                return ['status'=>0,'msg'=>'推荐者账号非会员'];
            }
        }
        $sms = new SmsService();                                //此处检测短信验证是否正确
        $res = $sms->checkSmsCode($parameter['verification'],$parameter['m_mobile']);
        if($res['status']!=1){
            return $res;
        }

        $parameter['m_mobile'] = $this->encrypt($parameter['m_mobile']); //手机号加密存储****切记****
        $map = [
            'm_mobile'=>$parameter['m_mobile']
        ];
        $info = $this->member->getInfo($map,'m_id');
        if($info){
            return ['status'=>0,'msg'=>'该手机号已被注册'];
        }
        $insert = [                                         //开始注册
            'm_mobile'=>$parameter['m_mobile'],
            'm_pwd'=>md5($parameter['m_pwd']),
            'level_path'=>$level_path,
            'add_time'=>time(),
            'm_state'=>0,
            'popularity'=>100,
            'm_name'=>'m'.substr(trim($data['m_mobile']),5),
            'm_ip'=>$parameter['ip'],
            'm_channel'=>$parameter['channel'],
            'uuid'=>$parameter['uuid'],
        ];

        // $city = $this->member->getCity($parameter['ip']);   //获取地理位置
        $city = "";   //获取地理位置
        if($city){
            $insert['m_province'] = $city['region'];
            $insert['m_city'] = $city['city'];
        }

        if($parameter['tj_mid']){
            $insert['tj_mid'] = $parameter['tj_mid'];
        }
        $id = $this->member->insertId($insert);
        if($id){
            if($parameter['tj_mid']){
                //注册log
                $invitation['tj_mid'] =$parameter['tj_mid'];
                $invitation['m_id'] =$id;
                $invitation['add_time'] =time();
                Db('invitation_log')->insert($invitation);
            }

            $msg = ['status'=>1, 'msg' => '注册成功'];
        }else{
            $msg = ['status'=>0,'msg' => '请稍后重试'];
        }
        return $msg;
    }
	//注册用户（App和PC端）
	public function addUserAP($data,$tj=''){
        $parameter['m_mobile'] = trim($data['m_mobile']);
        $parameter['m_pwd'] =trim($data["m_pwd"]);
        $parameter['re_pwd'] = empty($data["re_pwd"]) ? '' : trim($data["re_pwd"]) ;
        $parameter['verification'] = trim($data["verification"]);
        $parameter['tj_mobile'] = empty($data["tj_mobile"]) ? '' : $data["tj_mobile"] ;
        $parameter['promoters_code'] = empty($data["promoters_code"]) ? '' : $data["promoters_code"] ;
        //写入IP--------wu start
        $uip=$this->getIp();
        $parameter['ip'] = empty($data["ip"]) ? $uip : $data["ip"];
        //写入IP--------wu end
        //写入渠道--------wu start
        if(!empty($_COOKIE['channel'])){
            $parameter['channel'] =$_COOKIE['channel'];
        }
        else{
            $parameter['channel']="";
        }
        //写入渠道--------wu end

        //推荐注册时无确认密码
        if(!$tj){
            if($parameter['m_pwd'] != $parameter['re_pwd']){
                return ['status'=>0,'msg'=>'两次密码不一致'];
            }
        }

        $is_phone = $this->is_phone($parameter['m_mobile']);
        if($is_phone){ return $is_phone;}
        $is_pwd = $this->is_pwd($parameter['m_pwd']);
        if($is_pwd){ return $is_pwd;}

        if(empty($parameter['verification'])){
            return ['status'=>0,'msg'=>'请输入验证码'];
        }

        //推荐者账号是否正确
        $parameter['tj_mid'] = '';
        $level_path = '';   //家族id
        if(trim($parameter['tj_mobile'])){
            $tj_is_phone = $this->is_phone($parameter['tj_mobile']);
            if($tj_is_phone){ return $tj_is_phone;}

            $sele['m_mobile'] = $this->encrypt($parameter['tj_mobile']);
            $tj_res = $this->member->getInfo($sele,'m_id');
            if($tj_res){
//                $level_path = $this->member->digui_mid($tj_res['m_id']);
                $level_path = $this->member->get_value(['m_id'=>$tj_res['m_id']],'level_path');
                $level_path = trim($level_path.'-'.$tj_res['m_id'],'-');
                $parameter['tj_mid'] = $tj_res['m_id'];
            }else{
                return ['status'=>0,'msg'=>'推荐者账号非会员'];
            }
        }
        //推荐者推广员promoters_code码
        if(trim($parameter['promoters_code'])){
            $sele['promoters_code'] = $parameter['promoters_code'];
            $tj_res = $this->member->getInfo($sele,'m_id');
            if($tj_res){
                $level_path = $this->member->get_value(['m_id'=>$tj_res['m_id']],'level_path');
                $level_path = trim($level_path.'-'.$tj_res['m_id'],'-');
                $parameter['tj_mid'] = $tj_res['m_id'];
            }else{
                return ['status'=>0,'msg'=>'推荐者账号非推广员'];
            }
        }

        $sms = new SmsService();                                //此处检测短信验证是否正确
        $res = $sms->checkSmsCode($parameter['verification'],$parameter['m_mobile']);
        if($res['status']!=1){
            return $res;
        }

        $parameter['m_mobile'] = $this->encrypt($parameter['m_mobile']); //手机号加密存储****切记****
        $map = [
            'm_mobile'=>$parameter['m_mobile']
        ];
        $info = $this->member->getInfo($map,'m_id');
        if($info){
            return ['status'=>0,'msg'=>'该手机号已被注册'];
        }
        Db::startTrans();
        try{
        $insert = [                                         //开始注册
            'm_mobile'=>$parameter['m_mobile'],
            'm_pwd'=>md5($parameter['m_pwd']),
            'level_path'=>$level_path,
            'add_time'=>time(),
            'm_state'=>0,
            'popularity'=>100,
            'm_name'=>'m'.substr(trim($data['m_mobile']),5),
            'm_ip'=>$parameter['ip'],
            'm_channel'=>$parameter['channel'],
        ];

       // $city = $this->member->getCity($parameter['ip']);   //获取地理位置
        $city = "";   //获取地理位置
        if($city){
            $insert['m_province'] = $city['region'];
            $insert['m_city'] = $city['city'];
        }

        if($parameter['tj_mid']){
            $insert['tj_mid'] = $parameter['tj_mid'];
        }
        $id = $this->member->insertId($insert);
            //推荐者不为空是走此项
            if($parameter['tj_mid']){
                //注册log
                $invitation['tj_mid']   = $parameter['tj_mid'];
                $invitation['m_id']     =$id;
                $invitation['add_time'] =time();
                if($invitation['tj_mid']){
                    $where = [
                        'm_id'=>$invitation['tj_mid'],
                        'm_state'=>0,
                    ];
                    //查找推荐者
                    $tj_info = $this->get_info($where,'m_id,tj_mid,is_promoters');
                    //推广者有为真，推广员状态为 考核期推广员4或正式推广员5
                    $arr = [4,5];
//                    $config = new ConfigService();
                    if(!empty($tj_info['m_id']) && in_array($tj_info['is_promoters'],$arr)){
                        $invitation['descendants_num']  = 1;
                        $invitation['group_gene']       = $parameter['tj_mid'];
//                        //读取配置文件奖励
//                            $where = [
//                                'c_state'=>0,
//                                'c_code'=>'TGY_ZT'
//                            ];
//                            $c_value = $config->configGetValue($where,'c_value');
//                            if($tj_info['is_promoters'] == 4){
//                                //插入冻结收益
//                                $pa_info = [
//                                    'm_id'=>$tj_info['m_id'],
//                                    'from_id'=>$id,
//                                    'p_money'=>$c_value,
//                                    'e_money'=>10,
//                                    'descendants_num'=>1,
//                                    'type'=>1,
//                                    'state'=>1,
//                                    'add_time'=>time(),
//                                ];
//                                $promoters = new PromotersFrozenService();
//                                $promoters->get_add($pa_info);
//                            }
                            //如果推荐者还有推荐者
                            if($tj_info['tj_mid']){
                                $where2 = [
                                    'm_id'=>$tj_info['tj_mid'],
                                    'm_state'=>0,
                                ];
                                $top_member = $this->get_info($where2,'m_id,tj_mid,is_promoters');
                                //顶级推荐者为真，推广员状态为 考核期推广员4或正式推广员5
                                if(!empty($top_member['m_id']) && in_array($top_member['is_promoters'],$arr)){
                                    //多插入一次顶级注册log
                                    $invitation2['tj_mid']   = $parameter['tj_mid'];
                                    $invitation2['m_id']     =$id;
                                    $invitation2['add_time'] =time();
                                    $invitation2['descendants_num']  = 2;
                                    $invitation2['group_gene']       = $top_member['m_id'];
                                    Db('invitation_log')->insert($invitation2);

//                                    $where3 = [
//                                        'c_state'=>0,
//                                        'c_code'=>'TGY_JT'
//                                    ];
//                                    $c_value = $config->configGetValue($where3,'c_value');
//                                    if($top_member['is_promoters'] == 4){
//                                        //插入冻结收益
//                                        $pa_info = [
//                                            'm_id'=>$top_member['m_id'],
//                                            'from_id'=>$id,
//                                            'p_money'=>$c_value,
//                                            'e_money'=>0,
//                                            'descendants_num'=>2,
//                                            'type'=>2,
//                                            'state'=>1,
//                                            'add_time'=>time(),
//                                        ];
//                                        $promoters = new PromotersFrozenService();
//                                        $promoters->get_add($pa_info);
//                                    }
                                }
                            }
                        }else{
                        //推荐者非推广员进入此项，检测上上级是否为推广员
                        if(!empty($tj_info['tj_mid'])){
                            $where = [
                                'm_id'=>$tj_info['tj_mid'],
                                'm_state'=>0,
                            ];
                            //查找推荐者
                            $top_tj_info = $this->get_info($where,'m_id,is_promoters');
                            if(!empty($top_tj_info['m_id']) && in_array($top_tj_info['is_promoters'],$arr)) {
                                //多插入一次顶级注册log
                                $invitation2['tj_mid'] = $parameter['tj_mid'];
                                $invitation2['m_id'] = $id;
                                $invitation2['add_time'] = time();
                                $invitation2['descendants_num'] = 2;
                                $invitation2['group_gene'] = $top_tj_info['m_id'];
                                Db('invitation_log')->insert($invitation2);
//                                if ($top_tj_info['is_promoters'] == 4) {
//                                    $where3 = [
//                                        'c_state' => 0,
//                                        'c_code' => 'TGY_JT'
//                                    ];
//                                    $c_value = $config->configGetValue($where3, 'c_value');
//                                    //插入冻结收益
//                                    $pa_info = [
//                                        'm_id' => $top_tj_info['m_id'],
//                                        'from_id' => $id,
//                                        'p_money' => $c_value,
//                                        'e_money' => 0,
//                                        'descendants_num' => 2,
//                                        'type' => 2,
//                                        'state' => 1,
//                                        'add_time' => time(),
//                                    ];
//                                    $promoters = new PromotersFrozenService();
//                                    $promoters->get_add($pa_info);
//                                }
                            }
                        }
                    }
                }
                Db('invitation_log')->insert($invitation);
            }
            // 提交事务
            Db::commit();
            $msg = ['status'=>1 , 'msg' => '注册成功'];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $error_msg = $e ->getMessage();//错误信息
            $arr = array(
                'el_type_id'    =>5,
                'el_description'=>date('Y-m-d H:i:s').'推广员注册失败'.$error_msg,
                'el_time'       =>time(),
            );
            Db('error_log')->insert($arr);//插入错误日志表
            return ['status'=>0, 'msg' => '注册失败'];
        }
//        }else{
//            $msg = ['status'=>0,'msg' => '请稍后重试'];
//        }
        return $msg;
    }

//    //注册用户（推广员邀请注册)
//    public function promoters_add($data){
//        $parameter['m_mobile']  = empty($data["m_mobile"]) ? '' : trim($data["m_mobile"]);
//        $parameter['m_pwd']     = empty($data["m_pwd"]) ? '' : trim($data["m_pwd"]) ;
//        $parameter['re_pwd']    = empty($data["re_pwd"]) ? '' : trim($data["re_pwd"]) ;
//        $parameter['verification'] = empty($data["verification"]) ? '' : trim($data["verification"]);
//
//        $parameter['promoters_code'] = empty($data["promoters_code"]) ? '' : trim($data["promoters_code"]);
//        //写入IP--------wu start
//        $uip=$this->getIp();
//        $parameter['ip'] = empty($data["ip"]) ? $uip : $data["ip"];
//        //写入IP--------wu end
//        //写入渠道--------wu start
//        if(!empty($_COOKIE['channel'])){
//            $parameter['channel'] =$_COOKIE['channel'];
//        }
//        else{
//            $parameter['channel']="";
//        }
//        //写入渠道--------wu end
//
//        //检测手机号
//        $is_phone = $this->is_phone($parameter['m_mobile']);
//        if($is_phone){ return $is_phone;}
//        //检测密码
//        $is_pwd = $this->is_pwd($parameter['m_pwd']);
//        if($is_pwd){ return $is_pwd;}
//        if(empty($parameter['verification'])){
//            return ['status'=>0,'msg'=>'请输入验证码'];
//        }
//        //检测验证码
//        $sms = new SmsService();                                //此处检测短信验证是否正确
//        $res = $sms->checkSmsCode($parameter['verification'],$parameter['m_mobile']);
//        if($res['status']!=1){
//            return $res;
//        }
//        //推荐者账号是否正确
//        $parameter['tj_mid'] = '';
//        $level_path = '';   //家族id
//        if(!$parameter['promoters_code']){
//            return ['status'=>0,'msg'=>'推荐者为空'];
//        }
//        $sele['promoters_code'] = $parameter['promoters_code'];
//        $where = [
//            'promoters_code'=>$parameter['promoters_code']
//        ];
//        //推广员信息id和状态
//        $tj_info = $this->member->getInfo($where,'m_id,is_promoters');
//        //推广员状态 4考核中 5考核成功(推广员)
//        $arr = [4,5];
//        if($tj_info['m_id'] && in_array($tj_info['is_promoters'],$arr)){
//            $level_path = $this->member->get_value(['m_id'=>$tj_info['m_id']],'level_path');
//            $level_path = trim($level_path.'-'.$tj_info['m_id'],'-');
//            $parameter['tj_mid'] = $tj_info['m_id'];
//        }else{
//            return ['status'=>0,'msg'=>'未找到此推广员'];
//        }
//
//
//        $parameter['m_mobile'] = $this->encrypt($parameter['m_mobile']); //手机号加密存储****切记****
//        $map = [
//            'm_mobile'=>$parameter['m_mobile']
//        ];
//        $info = $this->member->getInfo($map,'m_id');
//
//        if($info){
//            return ['status'=>0,'msg'=>'该手机号已被注册'];
//        }
//
//        Db::startTrans();
//        try{
//            $insert = [                                         //开始注册
//                'm_mobile'  =>$parameter['m_mobile'],
//                'm_pwd'     =>md5($parameter['m_pwd']),
//                'level_path'=>$level_path,
//                'add_time'  =>time(),
//                'm_state'   =>0,
//                'popularity'=>100,
//                'm_name'    =>'m'.substr($data['m_mobile'],5),
//                'm_ip'      =>$parameter['ip'],
//                'm_channel' =>$parameter['channel'],
//                'tj_mid'    =>$parameter['tj_mid'],
//            ];
//            $city = "";   //获取地理位置
//            if($city){
//                $insert['m_province'] = $city['region'];
//                $insert['m_city'] = $city['city'];
//            }
//            //插入member表
//            $id = $this->member->insertId($insert);
//
//            $config = new ConfigService();
//            $where = [
//                'c_state'=>0,
//                'c_code'=>'TGY_ZT'
//            ];
//            $c_value = $config->configGetValue($where,'c_value');
//            //插入冻结收益
//            $pa_info = [
//                'm_id'=>$parameter['tj_mid'],
//                'from_id'=>$id,
//                'p_money'=>$c_value,
//                'e_money'=>$c_value,
//                'descendants_num'=>1,
//                'type'=>1,
//                'state'=>1,
//                'add_time'=>time(),
//            ];
//            $promoters = new PromotersFrozenService();
//            $promoters->get_add($pa_info);
//
//            //注册log
//            $invitation['tj_mid'] =$parameter['tj_mid'];
//            $invitation['m_id'] =$id;
//            $invitation['add_time'] =time();
//            $invitation['descendants_num'] =1;
//            $invitation['group_gene'] = $parameter['tj_mid'] ;
//            Db('invitation_log')->insert($invitation);
//            $where = [
//                'm.m_id'=>$parameter['tj_mid']
//            ];
//            //上上级信息
//            $top_member = Db::table('pai_member m')
//                ->join('pai_member fm','fm.m_id = m.tj_mid','left')
//                ->where($where)
//                ->field('fm.m_id,fm.m_state,fm.is_promoters')
//                ->find();
//            //上上级是账号正常的推广员时
//            if($top_member['m_state'] == 0 && ($top_member['is_promoters'] == 4 || $top_member['is_promoters'] == 5)){
//                //注册log
//                $invitation['tj_mid'] =$parameter['tj_mid'];
//                $invitation['m_id'] =$id;
//                $invitation['add_time'] =time();
//                $invitation['descendants_num'] =2;
//                $invitation['group_gene'] = $top_member['m_id'];
//                Db('invitation_log')->insert($invitation);
//
//                //插入冻结收益
//                $pa_info = [
//                    'm_id'=>$top_member['m_id'],
//                    'from_id'=>$id,
//                    'p_money'=>$c_value,
//                    'e_money'=>$c_value,
//                    'descendants_num'=>2,
//                    'type'=>2,
//                    'state'=>1,
//                    'add_time'=>time(),
//                ];
//                $promoters = new PromotersFrozenService();
//                $promoters->get_add($pa_info);
//            }
//            // 提交事务
//            Db::commit();
//            return ['status'=>1, 'msg' => '注册成功'];
//        } catch (\Exception $e) {
//            // 回滚事务
//            Db::rollback();
//            $error_msg = $e ->getMessage();//错误信息
//            $arr = array(
//                'el_type_id'    =>5,
//                'el_description'=>date('Y-m-d H:i:s').'推广员注册失败'.$error_msg,
//                'el_time'       =>time(),
//            );
//            Db('error_log')->insert($arr);//插入错误日志表
//            return ['status'=>0, 'msg' => '注册失败'];
//        }
//    }


//微信用户登录
    public function addUserWx($data,$tj=''){
        $parameter['m_mobile'] = trim($data['m_mobile']);
        $parameter['m_avatar'] = trim($data['m_avatar']);
        $parameter['m_name'] = trim($data['m_name']);
        $parameter['wx_openid'] = trim($data['wx_openid']);
        $parameter['m_pwd'] ="a".trim($data["m_mobile"]);
        $parameter['verification'] = trim($data["verification"]);
        $parameter['tj_mobile'] = empty($data["tj_mobile"]) ? '' : $data["tj_mobile"] ;
        $parameter['wx_unionid'] = empty($data["wx_unionid"]) ? '' : $data["wx_unionid"] ;
        //写入IP--------wu start
        $uip=$this->getIp();
        $parameter['ip'] = empty($data["ip"]) ? $uip : $data["ip"];
        //写入IP--------wu end
        //写入渠道--------wu start
        if(!empty($_COOKIE['channel'])){
            $parameter['channel'] =$_COOKIE['channel'];
        }
        else{
            $parameter['channel']="";
        }
        //写入渠道--------wu end
        //推荐注册时无确认密码
        $is_phone = $this->is_phone($parameter['m_mobile']);
        if($is_phone){ return $is_phone;}
        if(empty($parameter['verification'])){
           return ['status'=>0,'msg'=>'请输入验证码'];
        }
        //推荐者账号是否正确
        $parameter['tj_mid'] = '';
        $level_path = '';   //家族id
        if(trim($parameter['tj_mobile'])){
            $tj_is_phone = $this->is_phone($parameter['tj_mobile']);
            if($tj_is_phone){ return $tj_is_phone;}

            $sele['m_mobile'] = $this->encrypt($parameter['tj_mobile']);
            $tj_res = $this->member->getInfo($sele,'m_id');
            if($tj_res){
//                $level_path = $this->member->digui_mid($tj_res['m_id']);
                $level_path = $this->member->get_value(['m_id'=>$tj_res['m_id']],'level_path');
                $level_path = trim($level_path.'-'.$tj_res['m_id'],'-');
                $parameter['tj_mid'] = $tj_res['m_id'];
            }else{
                return ['status'=>0,'msg'=>'推荐者账号非会员'];
            }
        }
        $sms = new SmsService();                                //此处检测短信验证是否正确
        $res = $sms->checkSmsCode($parameter['verification'],$parameter['m_mobile']);
        if($res['status']!=1){
         return $res;
        }

        $parameter['m_mobile'] = $this->encrypt($parameter['m_mobile']); //手机号加密存储****切记****
        $map = [
            'm_mobile'=>$parameter['m_mobile']
        ];
        $info = $this->member->getInfo($map,'m_id');
        if($info){
            return ['status'=>0,'msg'=>'该手机号已被注册'];
        }

        $insert = [                                         //开始注册
            'm_mobile'=>$parameter['m_mobile'],
            'm_pwd'=>md5($parameter['m_pwd']),
            'level_path'=>$level_path,
            'add_time'=>time(),
            'm_state'=>0,
            'popularity'=>100,
            'm_name'=>$parameter['m_name'],
            'm_avatar'=>$parameter['m_avatar'],
            'wx_openid'=>$parameter['wx_openid'],
            'wx_unionid'=>$parameter['wx_unionid'],
            'm_ip'=>$parameter['ip'],
            'm_channel'=>$parameter['channel'],
        ];

        // $city = $this->member->getCity($parameter['ip']);   //获取地理位置
        $city = "";   //获取地理位置
        if($city){
            $insert['m_province'] = $city['region'];
            $insert['m_city'] = $city['city'];
        }

        if($parameter['tj_mid']){
            $insert['tj_mid'] = $parameter['tj_mid'];
        }
        $id = $this->member->insertId($insert);
        if($id){
            if($parameter['tj_mid']){
                //注册log
                $invitation['tj_mid'] =$parameter['tj_mid'];
                $invitation['m_id'] =$id;
                $invitation['add_time'] =time();
                $invitation['group_gene'] =$parameter['tj_mid'];
                Db('invitation_log')->insert($invitation);
            }

            $msg = ['status'=>1, 'msg' => '注册成功'];
        }else{
            $msg = ['status'=>0,'msg' => '请稍后重试'];
        }
        return $msg;
    }

    //手机短信用户登录
    public function addUserMobileCode($data,$tj=''){
        $parameter['m_mobile'] = trim($data['m_mobile']);
        $parameter['m_name'] = 'm'.substr(trim($data['m_mobile']),5);
        $parameter['m_pwd'] ="a".trim($data["m_mobile"]);
        $parameter['verification'] = trim($data["verification"]);
        $parameter['tj_mobile'] = empty($data["tj_mobile"]) ? '' : $data["tj_mobile"] ;
        $parameter['promoters_code'] = empty($data["promoters_code"]) ? '' : $data["promoters_code"] ;
        //写入IP--------wu start
        $uip=$this->getIp();
        $parameter['ip'] = empty($data["ip"]) ? $uip : $data["ip"];
        //写入IP--------wu end
        //写入渠道--------wu start
        if(!empty($_COOKIE['channel'])){
            $parameter['channel'] =$_COOKIE['channel'];
        }
        else{
            $parameter['channel']="";
        }
        //写入渠道--------wu end
        $is_phone = $this->is_phone($parameter['m_mobile']);
        if($is_phone){ return $is_phone;}
        $is_pwd = $this->is_pwd($parameter['m_pwd']);
        if($is_pwd){ return $is_pwd;}

        if(empty($parameter['verification'])){
            return ['status'=>0,'msg'=>'请输入验证码'];
        }

        //推荐者账号是否正确
        $parameter['tj_mid'] = '';
        $level_path = '';   //家族id
        if(trim($parameter['tj_mobile'])){
            $tj_is_phone = $this->is_phone($parameter['tj_mobile']);
            if($tj_is_phone){ return $tj_is_phone;}

            $sele['m_mobile'] = $this->encrypt($parameter['tj_mobile']);
            $tj_res = $this->member->getInfo($sele,'m_id');
            if($tj_res){
//                $level_path = $this->member->digui_mid($tj_res['m_id']);
                $level_path = $this->member->get_value(['m_id'=>$tj_res['m_id']],'level_path');
                $level_path = trim($level_path.'-'.$tj_res['m_id'],'-');
                $parameter['tj_mid'] = $tj_res['m_id'];
            }else{
                return ['status'=>0,'msg'=>'推荐者账号非会员'];
            }
        }
        //推荐者推广员promoters_code码
        if(trim($parameter['promoters_code'])){
            $sele['promoters_code'] = $parameter['promoters_code'];
            $tj_res = $this->member->getInfo($sele,'m_id');
            if($tj_res){
                $level_path = $this->member->get_value(['m_id'=>$tj_res['m_id']],'level_path');
                $level_path = trim($level_path.'-'.$tj_res['m_id'],'-');
                $parameter['tj_mid'] = $tj_res['m_id'];
            }else{
                return ['status'=>0,'msg'=>'推荐者账号非推广员'];
            }
        }

        $sms = new SmsService();                                //此处检测短信验证是否正确
        $res = $sms->checkSmsCode($parameter['verification'],$parameter['m_mobile']);
        if($res['status']!=1){
            return $res;
        }

        $parameter['m_mobile'] = $this->encrypt($parameter['m_mobile']); //手机号加密存储****切记****
        $map = [
            'm_mobile'=>$parameter['m_mobile']
        ];
        $info = $this->member->getInfo($map,'m_id');
        if($info){
            return ['status'=>0,'msg'=>'该手机号已被注册'];
        }
        Db::startTrans();
        try{
            $insert = [                                         //开始注册
                'm_mobile'=>$parameter['m_mobile'],
                'm_pwd'=>md5($parameter['m_pwd']),
                'level_path'=>$level_path,
                'add_time'=>time(),
                'm_state'=>0,
                'popularity'=>100,
                'm_name'=>'m'.substr(trim($data['m_mobile']),5),
                'm_ip'=>$parameter['ip'],
                'm_channel'=>$parameter['channel'],
            ];

            // $city = $this->member->getCity($parameter['ip']);   //获取地理位置
            $city = "";   //获取地理位置
            if($city){
                $insert['m_province'] = $city['region'];
                $insert['m_city'] = $city['city'];
            }

            if($parameter['tj_mid']){
                $insert['tj_mid'] = $parameter['tj_mid'];
            }
            $id = $this->member->insertId($insert);
//        if($id){
            if($parameter['tj_mid']){
                //注册log
                $invitation['tj_mid']   = $parameter['tj_mid'];
                $invitation['m_id']     =$id;
                $invitation['add_time'] =time();
                if($invitation['tj_mid']){
                    $where = [
                        'm_id'=>$invitation['tj_mid'],
                        'm_state'=>0,
                    ];
                    //查找推荐者
                    $tj_info = $this->get_info($where,'m_id,tj_mid,is_promoters');
                    //推广者有为真，推广员状态为 考核期推广员4或正式推广员5
                    $arr = [4,5];
                    if(!empty($tj_info['m_id']) && in_array($tj_info['is_promoters'],$arr)){
                        $invitation['descendants_num']  = 1;
                        $invitation['group_gene']       = $parameter['tj_mid'];
                        //读取配置文件奖励
                        $config = new ConfigService();
                        $where = [
                            'c_state'=>0,
                            'c_code'=>'TGY_ZT'
                        ];
                        $c_value = $config->configGetValue($where,'c_value');
                        if($tj_info['is_promoters'] == 4){
                            //插入冻结收益
                            $pa_info = [
                                'm_id'=>$tj_info['m_id'],
                                'from_id'=>$id,
                                'p_money'=>$c_value,
                                'e_money'=>10,
                                'descendants_num'=>1,
                                'type'=>1,
                                'state'=>1,
                                'add_time'=>time(),
                            ];
                            $promoters = new PromotersFrozenService();
                            $promoters->get_add($pa_info);
                        }
                        //如果推荐者还有推荐者
                        if($tj_info['tj_mid']){
                            $where2 = [
                                'm_id'=>$tj_info['tj_mid'],
                                'm_state'=>0,
                            ];
                            $top_member = $this->get_info($where2,'m_id,tj_mid,is_promoters');
                            //顶级推荐者为真，推广员状态为 考核期推广员4或正式推广员5
                            if(!empty($top_member['m_id']) && in_array($top_member['is_promoters'],$arr)){
                                //多插入一次顶级注册log
                                $invitation2['tj_mid']   = $parameter['tj_mid'];
                                $invitation2['m_id']     =$id;
                                $invitation2['add_time'] =time();
                                $invitation2['descendants_num']  = 2;
                                $invitation2['group_gene']       = $top_member['m_id'];
                                Db('invitation_log')->insert($invitation2);

                                $where3 = [
                                    'c_state'=>0,
                                    'c_code'=>'TGY_JT'
                                ];
                                $c_value = $config->configGetValue($where3,'c_value');
                                if($top_member['is_promoters'] == 4){
                                    //插入冻结收益
                                    $pa_info = [
                                        'm_id'=>$top_member['m_id'],
                                        'from_id'=>$id,
                                        'p_money'=>$c_value,
                                        'e_money'=>0,
                                        'descendants_num'=>2,
                                        'type'=>2,
                                        'state'=>1,
                                        'add_time'=>time(),
                                    ];
                                    $promoters = new PromotersFrozenService();
                                    $promoters->get_add($pa_info);
                                }
                            }
                        }
                    }
                }
                Db('invitation_log')->insert($invitation);
            }
            // 提交事务
            Db::commit();
            return ['status'=>1 , 'msg' => '注册成功'];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $error_msg = $e ->getMessage();//错误信息
            $arr = array(
                'el_type_id'    =>5,
                'el_description'=>date('Y-m-d H:i:s').'推广员注册失败'.$error_msg,
                'el_time'       =>time(),
            );
            Db('error_log')->insert($arr);//插入错误日志表
            return ['status'=>0, 'msg' => '注册失败'];
        }
    }

    //微信用户注册
    public function addUserW($data){
            $rule = [
                'wx_openid'  => 'require',
                'wx_name'   => 'require',
                'wx_avatar' => 'require',
            ];
            $msg = [
                'wx_openid.require' => 'openID必须',
                'wx_name.require'     => '微信昵称必须',
                'wx_avatar.require'   => '微信头像必须',
            ];
            $validate = new Validate($rule, $msg);
            $result   = $validate->check($data);

            if(!$result){
                $msg = [
                    'status'=>0,
                    'msg' => '微信openID,微信昵称、微信头像不可为空',
                ];
                return $msg;
            }
            $map = [
                'wx_openid'=>$data['wx_openid']
            ];
            $info = $this->member->getInfo($map,'*');               //openID第一次默认添加到数据库
            if(!$info){
                $map['add_time'] = time();
                $map['wx_name'] = $data['wx_name'];
                $map['wx_avatar'] = $data['wx_avatar'];
                $map['m_state'] = 0 ;
                $this->member->getAdd($map,'');
            }

            $validate = Loader::validate('checkWxRegister');        //检测注册会员信息是否合法
            if(!$validate->check($data)){
                $msg = [
                    'status'=>0,
                    'msg' => $validate->getError(),
                ];
                return $msg;
            }

            //开始注册
            $save = [
                'm_mobile'=>$this->encrypt($data['m_mobile']),
                'm_pwd'=>md5($data['m_pwd']),
                'edit_time'=>time(),
            ];

            if(empty(trim($data['m_mobile'])) || empty(trim($data['m_pwd']))){  //账号密码一个为空则都为空(因微信注册,非必须)
                $save['m_mobile'] = '';
                $save['m_pwd'] = '';
            }

            if(trim($data['m_mobile']) && trim($data['m_pwd'])){                 //手机和密码都为真时,验证手机验证码
                if (!preg_match("/^1[34578]{1}\d{9}$/", $data['tj_mobile'])) {
                    return ['status'=>0,'msg'=>'请输入推荐者正确的手机号格式'];
                }

                $sms = new SmsService();                                        //检测验证码
                $res = $sms->checkSmsCode($data['verification']);
                if($res['status' != 1]){
                    return $res;
                }
            }
            $where = [                                                             //update条件
                'wx_openid'=>$data['wx_openid']
            ];

            $res = $this->member->getSave($where,$save);
            if($res){
                $msg = [ 'status'=>1,'msg' => '注册成功'];
            }else{
                $msg = [ 'status'=>0,'msg' => '请稍后重试'];
            }
            return $msg;
    }

    /**
     * @return string
     * 微信绑定手机号码
     */
    public function binding_phone($parameter){
        if(empty($parameter['verification'])){
            return ['status'=>0,'msg'=>'验证码不能为空'];
        }
        if(empty($parameter['m_id']) || empty($parameter['m_mobile'])){                 //手机号和会员id不能为空
            return ['status'=>0,'msg'=>'手机号和用户唯一标识不能为空'];
        }
        $sms = new SmsService();                                        //检测验证码
        $res = $sms->checkSmsCode($parameter['verification']);
        if($res['status'] != 1 ){
            return $res;
        }

        $where = [
            'm_id'=>$parameter['m_id']
        ];
        $info = $this->member->getinfo($where,'m_id');             //检测此m_id是否真实存在
        if(!$info) {
            return ['status' => 0, '非会员不可绑定手机号码'];
        }

        $update = [
            'm_mobile'=>$parameter['m_mobile']
        ];
        $res = $this->member->getSave($where,$update);                  //绑定手机号
        if($res){
            return ['status'=>1,'msg'=>'ok'];
        }else{
            return ['status'=>0,'请稍后重试'];
        }

    }

    /**
     * @param $where
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     * 获取用户信息
     * 邓赛赛
     */
    public function get_info($where,$field="*"){
        $info = $this->member->getInfo($where,$field);
        return $info;
    }

    /**
     * 获取晟域用户信息
     * 刘勇豪
     * @param $where
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     *
     */
    public function get_syumem_info($where,$field="*"){
        $syu_meminfo = Db::connect('db_syu')->name('member_content')->where($where)->field($field)->find();
        return $syu_meminfo;
    }



    /**
     * 设置登录后的登录密码（不需要验证手机验证码）
     * 邓赛赛
     */
    public function set_login_pwd($where,$data){
        $parameter['used_pwd'] = trim($data['used_pwd']);
        $parameter['new_pwd'] = trim($data['new_pwd']);
        $parameter['m_pwd'] = trim($data['m_pwd']);

        $where['m_pwd'] = md5($parameter['used_pwd']);
        $res = $this->member->getInfo($where,"*");
        if(!$res){
            return ['status'=>0,'msg'=>'旧密码输入错误'];
        }
        if($parameter['new_pwd'] != $parameter['m_pwd']){
            return ['status'=>0,'msg'=>'两次密码不一致'];
        }
        if((mb_strlen($parameter['m_pwd']) < 6) || (mb_strlen($parameter['m_pwd'])>16)){
            return ['status'=>0,'msg'=>'请输入6-16位的密码'];
        }
        if($parameter['used_pwd'] == $parameter['new_pwd']){
            return ['status'=>1,'msg'=>'登录密码修改成功'];
        }


        $update['m_pwd'] =  md5($parameter['m_pwd']);
        $res = $this->member->getSave($where,$update);
        if($res){
            return ['status'=>1,'msg'=>'登录密码修改成功'];
        }else{
            return ['status'=>0,'msg'=>'修改失败,请稍后重试'];
        }
    }

    /**
     * 设置登录后的支付密码（不需要验证手机验证码）
     */
    public function set_payment_pwd($where,$data){
        $parameter['used_payment_pwd'] = trim($data['used_payment_pwd']);
        $parameter['new_payment_pwd'] = trim($data['new_payment_pwd']);
        $parameter['m_payment_pwd'] = trim($data['m_payment_pwd']);

        $where['m_payment_pwd'] = md5($parameter['used_payment_pwd']);
        $res = $this->member->getInfo($where,"*");
        if(!$res){
            return ['status'=>0,'msg'=>'旧密码输入错误'];
        }

        if($parameter['new_payment_pwd'] != $parameter['m_payment_pwd']){
            return ['status'=>0,'msg'=>'两次密码不一致'];
        }
        if($parameter['used_payment_pwd'] == $parameter['new_payment_pwd']){
            return ['status'=>0,'msg'=>'新旧密码一致无需修改'];
        }
        if(!preg_match("/^[0-9]\d{5}$/",$parameter['m_payment_pwd'])){
            return ['status'=>0,'msg'=>'请输入6位数字的支付密码'];
        }

        $update['m_payment_pwd'] =  md5($parameter['m_payment_pwd']);
        $res = $this->member->getSave($where,$update);
        if($res){
            return ['status'=>1,'msg'=>'支付密码修改成功'];
        }else{
            return ['status'=>0,'msg'=>'修改失败,请稍后重试'];
        }
    }

    /**
     * 修改个人资料
     */
    public function set_personal_data($where,$data){
        $update['edit_time'] = time();
        if(isset($data['m_name'])) {
           $update['m_name']=$data['m_name'];
        }
        if(isset($data['m_sex'])){
            if(($data['m_sex']==0) || ($data['m_sex']==1) || ($data['m_sex']==2)) {
                $update['m_sex']=$data['m_sex'];
            }
        }
        $update['m_avatar'] = request()->file('m_avatar');
        if($update['m_avatar']){
            $file = $this->upload('avatar','m_avatar','',500,300);
            if($file){
                $update['m_avatar'] = $file;
                $info = $this->member->getSave($where,$update);
                if($info){
                    $this->new_code(['m_id'=>$where['m_id']]);
                    return ['status'=>1,'msg'=>'修改头像成功','data'=>$file];
                }else{
                    return ['status'=>0,'msg'=>'修改头像失败'];
                }
            }else{
                return ['status'=>0,'msg'=>'上传头像失败'];
            }
        }else{
            if(!empty($data['m_avatar']) && is_array($data) ){
                $data['m_avatar'] = array_values(array_filter($data['m_avatar']));
                $update['m_avatar'] = $this->member->ba64_img($data['m_avatar'],'m_avatar')[0];

                $this->member->getSave($where,$update);
                //上传代码修改二维码logo
                if(is_file(trim($update['m_avatar'],'/'))){
                    $res = $this->new_code(['m_id'=>$where['m_id']]);
                    return ['status'=>1,'msg'=>'修改头像成功','data'=>$res];
                }
            }
        }
        if(empty( $update['m_avatar'])){
            unset( $update['m_avatar']);
        }

        $res = $this->member->getSave($where,$update);

        if($res){
            return ['status'=>1,'msg'=>'修改成功'];
        }else{
            return ['status'=>0,'msg'=>'修改失败'];
        }
    }

    /**
     * @return string
     * 前台登录并保存在coolie中
     */
    public function user_login($data){
        $is_phone = $this->is_phone($data['m_mobile']); //验证手机号格式

        $is_pwd = $this->is_pwd($data['m_pwd']);       //密码格式(必须数字和字母6位)
        if($is_phone || $is_pwd){
            return ['status'=>0,'msg'=>'请输入正确的账号、密码格式'];
        }


        $data['m_mobile'] = $this->encrypt($data['m_mobile']);            //加密手机号码
        $data['m_pwd'] = md5($data['m_pwd']);
        $data['m_state'] = 0;

        $res = $this->member->getInfo(['m_mobile'=>$data['m_mobile']],'m_id');
        if(empty($res)){
            return ['status'=>2,'msg'=>'该手机号尚未被注册'];
        }
        $res = $this->member->getInfo($data,'m_id,m_name,m_mobile,m_avatar,m_sex,wx_name,wx_avatar,m_type');
        if($res){
            $m_id = $this->encrypt('abcde'.$res['m_id']);
            $time = 3600*24*365;
            Cookie::set('m_id',$m_id,$time);
            Cookie::set('phone',$res['m_mobile'],$time);
            $this->member->getSave($data,['login_time'=>time()]);
            //用户登录日志---------------wu start
              $loginlogdata=array();
              $loginlogdata['ip']=$this->getIp();
              $loginlogdata['m_id']=$res['m_id'];
              if(!empty($_COOKIE['channel'])){
                  $loginlogdata['channel'] =$_COOKIE['channel'];
                }
              else{
                  $loginlogdata['channel']="";
                }
              $this->writeLoginLog($loginlogdata);
            //用户登录日志---------------wu end
            return ['status'=>1,'msg'=>'登录成功','data'=>$res];
        }else{
            return ['status'=>0,'msg'=>'账号或密码有误'];
        }
    }

    /**
     * @return string
     * 前台登录并保存在coolie中
     */
    public function new_user_login($data,$uuid){
        $is_phone = $this->is_phone($data['m_mobile']); //验证手机号格式

        $is_pwd = $this->is_pwd($data['m_pwd']);       //密码格式(必须数字和字母6位)
        if($is_phone || $is_pwd){
            return ['status'=>0,'msg'=>'请输入正确的账号、密码格式'];
        }
        $data['m_mobile'] = $this->encrypt($data['m_mobile']);            //加密手机号码
        $data['m_pwd'] = md5($data['m_pwd']);
        $data['m_state'] = 0;

        $res = $this->member->getInfo(['m_mobile'=>$data['m_mobile']],'m_id');
        if(empty($res)){
            return ['status'=>2,'msg'=>'该手机号尚未被注册'];
        }
        $res = $this->member->getInfo($data,'m_id,m_name,m_mobile,m_avatar,m_sex,wx_name,wx_avatar,m_type,uuid');
        if($res){
            //登陆写入uuid开始
            if(empty($res['uuid'])){
                $update_uuid = Db('member')->where($data)->update(['uuid'=>$uuid,'edit_time'=>time()]);//判定没有机器码则添加进去
            }else{
                $arr = array(
                    'm_id'=>$res['m_id'],
                    'ml_reason_id'=>5,
                );
                $mid_money_log = Db('money_log')->where($arr)->count();//查找m_id是否在money_log
                if(!$mid_money_log){
                    $uuid_money_log = Db('money_log')->where('uuid',$res['uuid'])->count();//查找uuid是否在money_log
                    if($uuid_money_log){
                        $update_uuid = Db('member')->where('m_mobile',$data['m_mobile'])->update(['uuid'=>$uuid,'edit_time'=>time()]);//修改member表uuid
                    }
                }
            }
            //登陆写入uuid结束
            $m_id = $this->encrypt('abcde'.$res['m_id']);
            $time = 3600*24*365;
            Cookie::set('m_id',$m_id,$time);
            Cookie::set('phone',$res['m_mobile'],$time);
            $this->member->getSave($data,['login_time'=>time()]);
            //用户登录日志---------------wu start
            $loginlogdata=array();
            $loginlogdata['ip']=$this->getIp();
            $loginlogdata['m_id']=$res['m_id'];
            if(!empty($_COOKIE['channel'])){
                $loginlogdata['channel'] =$_COOKIE['channel'];
            }
            else{
                $loginlogdata['channel']="";
            }
            $this->writeLoginLog($loginlogdata);
            //用户登录日志---------------wu end
            return ['status'=>1,'msg'=>'登录成功','data'=>$res];
        }else{
            return ['status'=>0,'msg'=>'账号或密码有误'];
        }
    }

    /**
     * @return string
     * newapi前台登录并保存在coolie中
     */
    public function newapi_user_login($data,$uuid){
        $is_phone = $this->is_phone($data['m_mobile']); //验证手机号格式

        $is_pwd = $this->is_pwd($data['m_pwd']);       //密码格式(必须数字和字母6位)
        if($is_phone || $is_pwd){
            return ['status'=>0,'msg'=>'请输入正确的账号、密码格式'];
        }
        $data['m_mobile'] = $this->encrypt($data['m_mobile']);            //加密手机号码
        $data['m_pwd'] = md5($data['m_pwd']);
        $data['m_state'] = 0;

        $res = $this->member->getInfo(['m_mobile'=>$data['m_mobile']],'m_id');
        if(empty($res)){
            return ['status'=>2,'msg'=>'该手机号尚未被注册'];
        }
        $res = $this->member->getInfo($data,'m_id,m_mobile,m_type,uuid');
        if($res){
            //登陆写入uuid开始
            if(empty($res['uuid'])){
                $update_uuid = Db('member')->where($data)->update(['uuid'=>$uuid,'edit_time'=>time()]);//判定没有机器码则添加进去
            }else{
                $arr = array(
                    'm_id'=>$res['m_id'],
                    'ml_reason_id'=>5,
                );
                $mid_money_log = Db('money_log')->where($arr)->count();//查找m_id是否在money_log
                if(!$mid_money_log){
                    $uuid_money_log = Db('money_log')->where('uuid',$res['uuid'])->count();//查找uuid是否在money_log
                    if($uuid_money_log){
                        $update_uuid = Db('member')->where('m_mobile',$data['m_mobile'])->update(['uuid'=>$uuid,'edit_time'=>time()]);//修改member表uuid
                    }
                }
            }
            //登陆写入uuid结束
            $m_id = $this->encrypt('abcde'.$res['m_id']);
            $time = 3600*24*365;
            Cookie::set('m_id',$m_id,$time);
            Cookie::set('phone',$res['m_mobile'],$time);
            $this->member->getSave($data,['login_time'=>time()]);
            //用户登录日志---------------wu start
            $loginlogdata=array();
            $loginlogdata['ip']=$this->getIp();
            $loginlogdata['m_id']=$res['m_id'];
            if(!empty($_COOKIE['channel'])){
                $loginlogdata['channel'] =$_COOKIE['channel'];
            }
            else{
                $loginlogdata['channel']="";
            }
            $this->writeLoginLog($loginlogdata);
            //用户登录日志---------------wu end
            return ['status'=>1,'msg'=>'登录成功','data'=>$res];
        }else{
            return ['status'=>0,'msg'=>'账号或密码有误'];
        }
    }

    /**张文斌
     * 2018-9-11
     * 检查是否在认证表
     */
    public function get_attestation($where, $field='*')
    {
        $info =  Db('member_attestation')->field($field)->where($where)->find();
        return $info;
    }
    /**张文斌
     * 2018-9-11
     * 插入认证表数据
     */
    public function insertId($data){
        if (!$data)
        {
            return false;
        }
        $id = Db('member_attestation')->insertGetId($data);
        return $id;
    }
    /**
     * 退出登录
     */
    public function sign_out(){
        Cookie::delete('m_id');
        return ['status'=>0,'msg'=>'退出成功'];

    }
    /**
     * 忘记登录密码
     */
    public function forget_login_pwd($data){
        $parameter['m_mobile'] = trim($data['m_mobile']);
        $parameter['re_pwd'] = trim($data['re_pwd']);
        $parameter['m_pwd'] = trim($data['m_pwd']);
        $parameter['verification'] = trim($data['verification']);
        if(trim($parameter['re_pwd']) != trim($parameter['m_pwd'])){
            return ['status'=>0,'msg'=>'两次密码不一致'];
        }
//        $validate = Loader::validate("CheckRegister");
//        if(!$validate->check($parameter)){
//            return ['status'=>0,'msg'=>$validate->getError()];
//        }

        $is_phone = $this->is_phone($parameter['m_mobile']);

        if($is_phone){ return $is_phone;}
        $is_pwd = $this->is_pwd($parameter['m_pwd']);
        if($is_pwd){ return $is_pwd;}
        $check_phone = $this->checked_phone($parameter['m_mobile']);
        if($check_phone['status']==1){
            return ['status'=>0,'msg'=>'此账户非会员'];
        }
        $where = [
            'm_mobile'=>$this->encrypt($parameter['m_mobile']),
            'm_pwd'   =>md5($parameter['m_pwd']),
        ];
        $res = $this->member->get_value($where,'m_id');
        if($res){
            return ['status'=>2,'msg'=>'新旧密码一致,无需更改'];
        }
        unset($where['m_pwd']);
        $update = [
          'm_pwd'=>md5($parameter['m_pwd']),
            'edit_time'=>time(),
        ];
        $res = $this->member->getSave($where,$update);
        if($res){
            return ['status'=>1,'msg'=>'ok'];
        }else{
            return ['status'=>0,'msg'=>'修改失败'];
        }
    }

    /**
     * 忘记支付密码
     * 邓赛赛
     */
    public function forget_payment_pwd($data){
        $parameter['m_mobile'] = trim($data['m_mobile']);
        $parameter['re_payment_pwd'] = trim($data['re_payment_pwd']);
        $parameter['m_payment_pwd'] = trim($data['m_payment_pwd']);
        $parameter['verification'] = trim($data['verification']);

        if($parameter['re_payment_pwd'] != $parameter['m_payment_pwd']){
            return ['status'=>0,'msg'=>'两次密码不一致'];
        }

        $is_phone = $this->is_phone($parameter['m_mobile']);
        if($is_phone){ return $is_phone;}

        if(!preg_match("/^\d{6}$/",$parameter['m_payment_pwd'])){
            return ['status'=>0,'msg'=>'支付密码必须为6位数字组成'];
        }

        $where = [
            'm_mobile'=>$this->encrypt($parameter['m_mobile'])
        ];
        $is_payment = $this->get_info($where,'m_payment_pwd');
        if(!$is_payment){
            return ['status'=>0,'msg'=>'此账户非会员'];
        }

        if($is_payment['m_payment_pwd'] == null){
            return ['status'=>2,'msg'=>'您还未绑定支付,前往绑定'];
        }

        $update = [
            'm_payment_pwd' =>md5($parameter['m_payment_pwd']),
            'edit_time'     =>time()
        ];
        $res = $this->member->getSave($where,$update);
        if($res){
            return ['status'=>1,'msg'=>'ok'];
        }else{
            return ['status'=>0,'msg'=>'修改失败,请稍后重试'];
        }
    }


    /**
     * @param $phone
     * @return array
     * 检验手机号是否注册
     */
    public function checked_phone($phone){
        $where = [
            'm_mobile'=>$this->encrypt($phone)
        ];
        $res = $this->member->getInfo($where,'m_id');
        if(empty($res)){
            return ['status'=>1,'msg'=>'此账号未注册'];
        }else{
            return ['status'=>0,'msg'=>'此用户已注册'];
        }
    }

    /**
     * 统计邀请人数邀请人数
     * 邓赛赛
     */
    public function count($where){
        $list = $this->member->getlist($where,'','m_type','');
        $type = array_column($list,'m_type');
        $array_num= array_count_values($type);
        $array_count = [
            0=>empty($array_num[0]) ? 0 : $array_num[0],    //邀请会员
            1=>empty($array_num[1]) ? 0 : $array_num[1],    //邀请商家
        ];
        return $array_count;
    }


    /**
     * 生成二维码(会员邀请)
     * 邓赛赛
     */
    public function new_code($where){
        $member = $this->member->getInfo($where,'m_id,add_time,m_avatar,m_mobile');
        if(empty($member['m_avatar']) || !is_file(trim($member['m_avatar'],'/'))){
            $member['m_avatar']='/uploads/logo/1.jpg';  //默认中间logo
        }
        $file_url = 'uploads/code/'.date("Ymd");
        if(!is_dir($file_url)){
            mkdir($file_url);
            chmod($file_url,0777);
        }
        $m_mobile = $this->decrypt($member['m_mobile']);
        $server_url = PAI_URL."/member/register/it_to_rg?phone=".$m_mobile;  //上线地址
//        $server_url = "http://"."10.0.2.62"."/member/register/it_to_rg?phone=".$m_mobile;  //本地ip测试使用

//        $get_code_url = 'http://qr.liantu.com/api.php?text='.$server_url;
        $get_code_url = 'https://bshare.optimix.asia/barCode?site=weixin&url='.$server_url;
        $code = $file_url.'/'.$member['m_id'].$member['add_time'].".jpg";
        $content = file_get_contents($get_code_url);
        file_put_contents($code,$content);
        $image = Image::open(ltrim($member['m_avatar'],'/'));
        $ab_img = $file_url.'/'.$member['m_id'].'ab_img'.'.jpg';
        $image->thumb(35, 35,Image::THUMB_CENTER)->save($ab_img);
        $image = Image::open($code);
        $image->water($ab_img,Image::WATER_CENTER)->save($file_url.'/'.$member['m_id'].'new_code'.'.jpg');
        $update = [
            'm_code' => '/'.$file_url.'/'.$member['m_id'].'new_code'.'.jpg',
            'edit_time' =>time(),
        ];
        $this->member->getSave($where,$update);
        unlink($ab_img);
        return $update['m_code'];  //二维码路径
    }

    /**
     * 更新一条数据
     * 创建人 刘勇豪
     * 时间 2018-07-06 10:51:00
     */
    public function memberSave($where="", $data="")
    {
        $save = $this->member->getSave($where, $data, $this->cache);
        return $save;
    }
    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where,$order,$field,$cache=''){
        $num = $this->member->getList($where,$order,$field,$cache);
        return $num;
    }

    /**
     * 邀请列表(会员/商家)
     * 邓赛赛
     */
    public function its_list($m_type,$where,$money_where,$order,$field,$page=1,$page_size=20){
        if($page <= 0)$page = 1;
        $offset = ($page-1)*$page_size;
        $list = array();
        if($m_type == 0){
            $list = $this->member->get_limit_list($where,$order,$field,$offset,$page_size);
        }else if($m_type == 1){
            $list = $this->member->get_store_list($where,$order,$field,$offset,$page_size);
        }
        $sumMoney = Db::table('pai_money_log')->where($money_where)->sum('ml_money');
        $total_num = $this->member->get_count_num($where);

        $total_page = ceil($total_num/$page_size);
        $data = [
            'list'=>$list,
            'page'=>$page,
            'num'=>count($list),
            'page_size'=>$page_size,
            'total_num'=>$total_num,
            'total_page'=>$total_page,
            'total_money'=>$sumMoney,
        ];
        return $data;
    }


    /**
    * @param $where
     * @param $order
    * @param $field
    * @param $offset
    * @param $page_size
   * @return mixed
    * 获取limit列表
    * 邓赛赛
    */
    public function get_limit($where,$order,$field,$offset,$page_size){
           $list = $this->member->get_limit_list($where,$order,$field,$offset,$page_size);
            return $list;
   }

    /**
     * 提现操作
     * 邓赛赛
     */
   public function withdraw_money($m_id,$param){
       $res = $this->member->withdrawMoney($m_id,$param);
       return $res;
   }

    /**
     * 钱包充值
     * 邓赛赛
     */
   public function recharge(){

   }

    /**
     * 第一次注册领取奖励
     * 邓赛赛
     */
   public function first__register_reward($m_id,$max_money){
       $res = $this->member->register_reward($m_id,$max_money);
       return $res;
   }

    /**
     * 检测注册领取
     * 邓赛赛
     */
    public function check_app_reward($m_id){
        $is_member = $this->member->getCount(['m_id'=>$m_id]);
        if(!$is_member){
            return  ['status'=>3,'msg'   =>'非法请求'];
        }
        $arr = array(
            'm_id'=>$m_id,
            'ml_reason_id'=>5,
        );
        $mid_money_log = Db('money_log')->where($arr)->find();//查找m_id是否在money_log
        if($mid_money_log){
            $is_reward = 2;
            $msg = '该用户已领取奖励';
        }else{
            $uuid = Db('member')->where('m_id',$m_id)->value('uuid');//查找用户的uuid
            if($uuid){
                $uuid_money_log = Db('money_log')->where('uuid',$uuid)->find();//查找uuid是否在money_log
                if($uuid_money_log){
                    $is_reward = 2;
                    $msg = '此手机号设备已领取奖励';
                }else{
                    $where = [
                        'm_id'        => $m_id,
                        'ml_reason_id'=> 5,
                        'ml_type'     => 'add',
                    ];
                    $m_log = new MoneyLogService();
                    //统计是否可领取
                    $is_reward = $m_log->get_count($where);
                    $is_reward = $is_reward ? 2 : 1;
                    $msg       =  $is_reward == 2 ? '不可领取奖励' : '可领取奖励';
                }
            }else{
                $where = [
                    'm_id'        => $m_id,
                    'ml_reason_id'=> 5,
                    'ml_type'     => 'add',
                ];
                $m_log = new MoneyLogService();
                //统计是否可领取
                $is_reward = $m_log->get_count($where);
                $is_reward = $is_reward ? 2 : 1;
                $msg       =  $is_reward == 2 ? '不可领取奖励' : '可领取奖励';
            }
        }
        $res = [
            'status'=>$is_reward,
            'msg'   =>$msg
        ];
        return $res;
    }

    //获取用户真实IP-----------------------wu  start
    public function getIp() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else
            if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            else
                if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                    $ip = getenv("REMOTE_ADDR");
                else
                    if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                        $ip = $_SERVER['REMOTE_ADDR'];
                    else
                        $ip = "unknown";
        return ($ip);
    }
  //获取用户真实IP-----------------------wu  end
    //用户登录写入登录日志--------------------------------  wu start
    public function writeLoginLog($data){
        $logindata['ll_ip'] =$data['ip'];
        $logindata['m_id'] =$data['m_id'];
        $logindata['ll_channel'] =$data['channel'];
        $logindata['ll_time'] =time();
        Db('member_login_log')->insert($logindata);
    }
    //用户登录写入登录日志--------------------------------  wu end
    //用户活跃度登录日志--------------------------------  wu start
    public function writeActiveLoginLog($data){
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        $where1="ll_time>".$beginToday." and m_id=".$data['m_id'];
        $redis = RedisCache::getInstance();
        $is_login_log = $redis->get('login_log'.$data['m_id']);
        if(!$is_login_log){
            $logindata=array();
            $logindata['ll_ip'] =$this->getIp();
            $logindata['m_id'] =$data['m_id'];
            $logindata['ll_channel'] =$data['channel'];
            $logindata['ll_time'] =time();
            Db('member_login_log')->insert($logindata);
            //redis保存时间  当天结束时间 - 当前时间
            $redis_time = $endToday - time();
            $redis->set('login_log'.$data['m_id'],1,$redis_time);
        }

    }
    //用户活跃度写入登录日志--------------------------------  wu end

}