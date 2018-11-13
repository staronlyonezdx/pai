<?php
namespace app\api\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\api\ApiService as ApiService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\BaseService as BaseService;
use app\data\service\admit\AdmitService as AdmitService;
use app\data\service\address\AddressService as AddressService;
use app\data\service\api\ApigoodsService as ApigoodsService;
use app\data\service\system_msg\SystemMsgService;
use app\data\service\goods\VisitGoodsHistoryService;

class Money extends ApiMember
{
    //用户修改密码
    public function member_editpwd()
    {
        $res=$this->checktoken();
        if($res['state']!='1'){
            $this->response_error($res['msg']);die;
        }
        $data=array();
        if(empty($this->data['m_mobile']))
        {
            $this->response_error("手机号码不能为空");
        }
        $data['m_mobile']=$this->data['m_mobile'];
        if(empty($this->data['new_pwd']))
        {
            $this->response_error("新密码不能为空");
        }
        $data['new_pwd']=$this->data['new_pwd'];
        if(empty($this->data['m_pwd']))
        {
            $this->response_error("重复密码不能为空");
        }
        $data['m_pwd']=$this->data['m_pwd'];
        if(empty($this->data['used_pwd']))
        {
            $this->response_error("旧密码不能为空");
        }
        $data['used_pwd']=$this->data['used_pwd'];
        $memberservice=new MemberService();
        $baseservice=new BaseService();
        $where['m_mobile'] = $baseservice->encrypt($data['m_mobile']);
        $result=$memberservice->set_login_pwd($where,$data);
        if($result['status']=='1'){
            $rdata=array();
            $rdata['msg']=$result['msg'];
            $this->response_data($rdata);die;
        }
        else{
            $this->response_error($result['msg']);die;
        }
    }


}
