<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/9/8
 * Time: 1:55
 */

namespace app\api\controller;


use app\data\service\api\ApimemberService;
use app\data\service\sms\SmsService;
use think\Controller;
use app\data\service\api\ApiregisterService;
class Toregister extends Controller
{
    public function index(){
        $ApiregisterService = new ApiregisterService();
        if(empty(input('param.m_mobile'))){
            return ['status'=>0,'msg'=>'手机号不能为空'];
        }
        if(empty(input('param.m_pwd'))){
            return ['status'=>0,'msg'=>'密码不为空'];
        }
//        print_r(input('param.m_pwd'));exit();
        $is_pwd = $ApiregisterService->is_pwd(input('param.m_pwd'));//密码格式(必须数字和字母6位)
        if($is_pwd){
            return ['status'=>0,'msg'=>'请输入正确的密码格式'];
        }
        if(empty(input('param.verification'))){
            return ['status'=>0,'msg'=>'验证码不为空'];
        }
        $sms = new SmsService();//此处检测短信验证是否正确
        $res = $sms->checkSmsCode(input('param.verification'),input('param.m_mobile'));
        if($res['status']!=1){
            $ret=$res['msg'];
            return ['status'=>0,'msg'=>$ret];
        }
        $data['m_mobile'] = $ApiregisterService->encrypt(input('param.m_mobile')); //手机号加密存储****切记****
        $map = [
            'm_mobile'=>input('param.m_mobile')
        ];
        $info = $ApiregisterService->getInfo($map,'m_id');
        if($info){
            return ['status'=>0,'msg'=>'该手机号已被注册'];
        }
        if(!empty(input('param.m_mobile'))){
            $tj_mobile = input('param.m_mobile');//推荐人手机号
        }
        if(!empty($tj_mobile)){
            $tj_where['m_mobile'] = $ApiregisterService->encrypt($tj_mobile);
            $tj_res = $ApiregisterService->getInfo($tj_where,$field="m_id,m_levelid");//推荐人信息
            $data['tj_mid'] = $tj_res['m_id'];
        }
        $insert = array();
        if(!empty($data['tj_mobile'])){//判断是否有推荐人
            $tj_arr = ['m_id'=>$data['tj_mid']];
            $tj_list = $ApiregisterService->getInfo($tj_arr);//上级信息
            if(!empty($tj_list['m_mobile'])){
//                    print_r('66');exit();
                $insert['tj_mid'] = $tj_list['m_id'];
                $insert['m_tj_mid2'] = $tj_list['tj_mid'];//推荐上上级用户id新
                $level_path = "";//家族id
                if(!empty($tj_list['level_path'])){
                    $level_path = trim($tj_list['level_path'].'-'.$tj_list['m_id'],'-');
                }
                switch($tj_list['ml_tui_id']){
                    case 1://推荐人是创推人
//                            $insert['m_tj_jy2'] = $tj_list['m_id'];//推荐人二级基因mid
                        if(!empty($tj_list['tj_mid'])){
                            $tj_up_arr = ['m_id'=>$tj_list['tj_mid']];
                            $tj_up_list = $ApiregisterService->getInfo($tj_up_arr);//上上级信息
//                                $insert['m_tj_jy1'] = $tj_up_list['m_id'];//推荐人顶级基因mid
                        }
                        break;
                    case 2://推荐人是品推人
//                            $insert['m_tj_jy2'] = $tj_list['m_id'];//推荐人二级基因mid
                        if(!empty($tj_list['tj_mid'])){
                            $tj_up_arr = ['m_id'=>$tj_list['tj_mid']];
                            $tj_up_list = $ApiregisterService->getInfo($tj_up_arr);//上上级信息
//                                $insert['m_tj_jy1'] = $tj_up_list['m_id'];//推荐人顶级基因mid
                        }
                        break;
                    case 3://推荐人是vip会员
                        if(!empty($tj_list['tj_mid'])){
                            $m_tj_jy2 = $ApiregisterService->digui_mid($tj_list['m_id']);//递归查找上级是创推人/品推人
                            $insert['m_tj_jy2'] = $m_tj_jy2;//推荐人二级基因mid
                            $m_tj2_mid = ['m_id'=>$m_tj_jy2];//推荐人id
                            $m_tj2_list = $ApiregisterService->getInfo($m_tj2_mid);//上级信息
//                                print_r($m_tj2_list);exit();
                            if(!empty($m_tj2_list['ml_tui_id'])){
                                $insert['m_tj_jy1'] = $m_tj2_list['tj_mid'];//推荐人顶级基因mid
                            }
                        }
                        break;
                    case 4://推荐人是普通会员
                        if(!empty($tj_list['tj_mid'])){
                            $m_tj_jy2 = $ApiregisterService->digui_mid($tj_list['m_id']);//递归查找上级是创推人/品推人
                            $insert['m_tj_jy2'] = $m_tj_jy2;//推荐人二级基因mid
                            $m_tj2_mid = ['m_id'=>$m_tj_jy2];//推荐人id
                            $m_tj2_list = $ApiregisterService->getInfo($m_tj2_mid);//上级信息
                            if(!empty($m_tj2_list['ml_tui_id'])){
                                $insert['m_tj_jy1'] = $m_tj2_list['tj_mid'];//推荐人顶级基因mid
                            }
                        }
                        break;
                }
            }
            if(!empty($tj_list['tj_mid'])){
                $tj_up_arr = ['m_id'=>$tj_list['tj_mid']];//上上级id
                $tj_up_list = $ApiregisterService->getInfo($tj_up_arr,$field='*');//上上级信息
                if(!empty($tj_up_list['m_mobile'])){

                }
            }
        }
        $insert['m_mobile'] = $data['m_mobile'];
        $insert['m_pwd'] = md5(input('param.m_pwd'));
        $insert['add_time'] = time();
        $insert['m_state'] = 0;
        $insert['popularity'] = 100;
        $insert['m_name'] = '晟域'.substr(trim(input('param.m_mobile')),5);
        $insert['m_from'] = 3;
        if(!empty($level_path)){
            $insert['level_path'] = $level_path;
        }
        $id = $ApiregisterService->insertId($insert);//用户id
        if($id){
            if(!empty($tj_list['tj_mid'])){
                //注册log记录
                $invitation['tj_mid'] =$tj_list['tj_mid'];
                $invitation['m_id'] =$id;
                $invitation['add_time'] =time();
                Db('invitation_log')->insert($invitation);
            }
            $m_id = $ApiregisterService->encrypt('abcde'.$id);
//            $this->response_data(['m_id'=>$m_id,'msg'=>'注册成功']);
            return ['status'=>1,'msg'=>'注册成功'];
        }else{
//            $this->response_error('注册失败');
            return ['status'=>0,'msg'=>'注册失败'];
        }
    }
}