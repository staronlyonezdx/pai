<?php
/**
 * User: Shine
 * Date: 2018/9/3
 * Time: 20:19
 */
namespace app\data\service\promoter;

use app\data\service\BaseService;
use app\data\model\member\MemberModel;
use think\Db;

class PromoterRegService extends BaseService{
    protected $cache = 'member';

    public function __construct()
    {
        parent::__construct();
        $this->member = new MemberModel();
        $this->cache = 'member';
    }

    /**
     * 注册用户会员
     */
    public function addMember($data){
        //转译手机号
        $m_mobile   = $this->decrypt($data['m_mobile']);

        //判断手机号是否注册
        $info = $this->member->getInfo(['m_mobile'=>$data['m_mobile']],'m_id');
        if ($info){
            return $info;
        }else{
            //插入信息
            $insert = [
                'm_name'            => 'm'.substr($m_mobile,5),//用户名
                'm_mobile'          => $data['m_mobile'],//手机号
                'm_pwd'             => $data['m_pwd'],//登录密码
                'real_name'         => $data['real_name'],//真实姓名
                'm_identification'  => $data['m_identification'],//身份证号
                'm_bankname'        => $data['m_bankname'],//银行名
                'm_bankaccount'     => $data['m_bankaccount'],//银行卡号
                'm_bank_phone'      => $data['m_bank_phone'],//银行预留手机号
                'ml_tui_id'         => $data['ml_tui_id'],//晟域会员等级
                'level_path'        => $data['level_path'],//等级路径
                'm_from'            => $data['m_from'],//来源
                'add_time'          => time(),//注册时间
                'm_state'           => 0,//用户状态
                'popularity'        => 100,//人气
                'tj_mid'            => $data['tj_mid'],//上级推荐人
                'm_tj_mid2'         => $data['m_tj_mid2']//上级推荐人
            ];

            //插入信息
            $id = $this->member->insertId($insert);
            if($id){
                $msg = $id;
            }else{
                $msg = ["status"=>'0',"msg"=>"会员注册失败！请重试"];
            }
        }

        return $msg;

    }

    //检测创推人/品推人上级是否存在
    public function checkMobile($data){
        $where['m_mobile'] = $data['mi_mobile'];
        $tj_mid = $this->member->getInfo($where,'*');
        if (!$tj_mid){
            $return = ["status"=>'0',"msg"=>"查询为空"];
            return $return;
        }
        $return = ["status"=>"1","msg"=>$tj_mid];
        return $return;

    }

    //查询手机号
    public function findMobile($data){
        $where['m_id'] = $data['m_id'];
        $tj_mobile = $this->member->getInfo($where,'*');
        if (!$tj_mobile){
            return ["status" => '0',"msg"=>"查询为空"];
        }
        $return = ["status"=>"1","msg"=>$tj_mobile];
        return $return;
    }

    //统计数量
    public function get_member_counts($where){
        $count = $this->member->getCount($where);
        return $count;
    }

    //获取创推人/品推人列表
    public function getPromoterList($where='',$field='*',$order='add_time desc',$page_size=15,$offset){
        $info = $this->member->get_limit_list($where,$order,$field,$offset,$page_size,$this->cache);
        return $info;
    }

    //统计
    public function get_member_count($where){
        $table="member";
        $page=input("get.page");
        if(empty($page)){
            $page="1";
        }
        $pagenum=input("get.pagenum");
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=$page*$pagenum;
        $sql="select count(m_id) as n, FROM_UNIXTIME(add_time,'%Y-%m-%d') add_time from pai_member WHERE ".$where." group by FROM_UNIXTIME(add_time,'%Y-%m-%d') ";
        $list=Db::table($table)->query($sql);
        return $list;
    }

    public function get_info($where,$field = '*'){
        $info = $this->member->getInfo($where,$field);
        return $info;
    }

}