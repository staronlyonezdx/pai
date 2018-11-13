<?php
namespace app\api\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\BaseService as BaseService;
use think\Db;

class Paimember extends ApiMember
{

    //根据m_id获取用户的详细信息
    public function get_meminfo_by_mid(){
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);
        }
        if(empty($this->data['m_id']))
        {
            $this->response_error("缺少关键参数m_id");
        }

        $member = new MemberService();
//        $member

//        public function get_info($where,$field="*"){
//            $info = $this->member->getInfo($where,$field);
//            return $info;
//        }


//        $res=$ApiorderService->do_edit_paypwd($this->data['member_id'],$pwd);
//        if($res['status']=='1')
//        {
//            $this->response_data($res['msg']);
//        }
//        else{
//            $this->response_error($res['msg']);
//        }


    }


}
