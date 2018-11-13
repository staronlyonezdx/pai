<?php
/**
 * User: Shine
 * Date: 2018/9/3
 * Time: 16:27
 */
namespace app\api\controller;

use app\data\service\promoter\PromoterRegService;
use think\Db;


class Tuipromoter extends Tuiapiindex{
    /**
     * 创推人/品推人注册为用户
     */
    public function PromoterReg(){
        $data = $this->data;
        //添加创推人为会员
        $reg = new PromoterRegService();
        $res = $reg->addMember($data);
        if (!empty($res)){
            $this->response_data($res);
        }else{
            $this->response_error("注册会员失败！");
        }

    }

    /**
     * 创推人/品推人上级手机号检测
     */
    public function mobilecheck(){
        $data = $this->data;
        $mobile = new PromoterRegService();
        $info = $mobile->checkMobile($data);

        $this->response_data($info);
    }

    /**
     * 创推人/品推人上级手机号检测
     */
    public function findmobile(){
        $data = input('param.');
        $mobile = new PromoterRegService();
        $info = $mobile->findMobile($data);

        $this->response_data($info);
    }

    /**
     * 获取创推人/品推人列表
     */
    public function promoterlist(){
        $data      = $this->data;
        $where     = $data['find'];
        $page_size = $data['page'];
        $offset    = $data['offset'];
        $promoter  = new PromoterRegService();
        $info      = $promoter->getPromoterList($where,'*','add_time desc',$page_size,$offset);

        $this->response_data($info);
    }

    /**
     * 统计创推人/品推人数量
     */
    public function promotercount(){
        $data  = $this->data;
        $where = $data['find'];
        $count = new PromoterRegService();
        $info  = $count->get_member_counts($where);

        $this->response_data($info);
    }

    /**
     * 统计
     */
    public function count(){
        $data  = $this->data;
        $where = $data['find'];
        $count = new PromoterRegService();
        $info  = $count->get_member_count($where);

        $this->response_data($info);
    }

    /**
     * 获取上家和上上家信息
     */
    public function getsuperior(){
        $data = input('param.');
        $m_id = empty($data['m_id']) ? '' : $data['m_id'];
        if(!$m_id){
            $this->response_error('未传入手机号码');
        }
        $member = new PromoterRegService();
        $where = [
            'm_id'=>$m_id
        ];
        $info1 = $member->get_info($where,'m_id,m_name,real_name,m_mobile,tj_mid,ml_tui_id');
        $info2 = array();
        $info3 = array();
        if(!empty($info1['tj_mid'])){
            $where2 = [
                'm_id'=>$info1['tj_mid']
            ];
            $info2 = $member->get_info($where2,'m_id,m_name,real_name,m_mobile,tj_mid,ml_tui_id');
            if(!empty($info2['tj_mid'])){
                $where3 = [
                    'm_id'=>$info2['tj_mid']
                ];
                $info3 = $member->get_info($where3,'m_id,m_name,real_name,m_mobile,tj_mid,ml_tui_id');
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

    public function getchild(){
        $data = input('param.');
        $m_id = $data['m_id'];
        $data = $this->get_all_childty($m_id);

        return $this->response_data($data);
    }

    /**
     * 获取所有下级
     */
    function get_all_childty($m_id){
        $arr = array();
        $array = Db::table('pai_member')->where('tj_mid',$m_id)->select();//查询id为mid的用户的直接下级
        foreach($array as $v){
            if($v['tj_mid'] == $m_id){
                $arr[] = $v;
                $arr = array_merge($arr,$this->get_all_childty($v['m_id']));
            }
        }
        return $arr;//返回所有下级被推荐人信息
    }

}