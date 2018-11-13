<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/31
 * Time: 15:56
 */

namespace app\api\controller;

/*
 * 邓赛赛
 * 2018-8-29
 */
use app\data\service\BaseService;
use app\data\service\member\MemberService;
use app\data\service\sms\AliService;
use think\Db;

class Tuicheck extends Tuiapiindex
{

    /**
     * 身份证验证(单纯验证无后续操作)
     * 邓赛赛
     */
    public function identityCheck(){
        if(empty($this->data['idCard']))
        {
            $this->response_error("身份证号码不能为空");
        }
        if(empty($this->data['name']))
        {
            $this->response_error("姓名不能为空");
        }
        $idCard =$this->data['idCard'];

        $name = $this->data['name'];
        $ali = new AliService();
        $res = $ali->id_check($idCard,$name);
        $ret=array();
        $ret=$res;
        $this->response_data($ret);
    }

    /**
     * 银行卡验证(单纯验证无后续操作)
     * 邓赛赛
     */
    public function bankCheck(){
        if(empty($this->data['accountNo']))
        {
            $this->response_error("身份证号码不能为空");
        }
        if(empty($this->data['idCard']))
        {
            $this->response_error("身份证号不能为空");
        }
        if(empty($this->data['mobile']))
        {
            $this->response_error("手机号码不能为空");
        }
        if(empty($this->data['name']))
        {
            $this->response_error("姓名不能为空");
        }
        $accountNo = $this->data['accountNo'];
        $idCard = $this->data['idCard'];
        $mobile = $this->data['mobile'];
        $name = $this->data['name'];
        $ali = new AliService();
        $res = $ali->bank_check($accountNo,$idCard,$mobile,$name);
        $ret=array();
        $ret=$res;
        $this->response_data($ret);
    }

    /**
     * 获取上家和上上家信息
     * 邓赛赛
     */
    public function get_leader(){
        $m_mobile = empty($this->data['m_mobile']) ? '' :$this->data['m_mobile'];
        if(!$m_mobile){
            $this->response_error('未传入手机号码');
        }
        $member = new MemberService();
        $where = [
            'm_mobile'=>$m_mobile
        ];
        $info1 = $member->get_info($where,'m_id,m_mobile,tj_mid,ml_tui_id');
        $info2 = array();
        $info3 = array();
        if(!empty($info1['tj_mid'])){
            $where2 = [
                'm_id'=>$info1['tj_mid']
            ];
            $info2 = $member->get_info($where2,'m_id,m_mobile,tj_mid,ml_tui_id');
            if(!empty($info2['tj_mid'])){
                $where3 = [
                    'm_id'=>$info2['tj_mid']
                ];
                $info3 = $member->get_info($where3,'m_id,m_mobile,tj_mid,ml_tui_id');
            }
        }
        $data = [
            'info1'=>$info1,
            'info2'=>$info2,
            'info3'=>$info3,
        ];

        $data = array_filter($data);
        foreach($data as $k => $v){
            $v['m_mobile'] = $member->decrypt($v['m_mobile']);
            $data[$k] = $v;
        }
        return $this->response_data($data);
    }


}