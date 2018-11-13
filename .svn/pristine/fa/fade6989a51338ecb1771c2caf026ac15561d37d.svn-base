<?php
namespace app\member\controller;
use app\data\service\admit\AdmitService;
use app\data\service\member\MemberService;
use think\Controller;
use think\Cookie;
use think\Db;
use think\Request;
use think\Url;
use think\Config;
use think\Cache;
use think\Session;
//use app\index\Cmmcom;

class Admit extends MemberHome
{
    /**
     * @return mixed
     * 用户申请成为商家页面
     */
    public function apply_store()
    {
        $m_id = $this->m_id;
        $where=[
            'm_id'=>$m_id,
        ];
        $admit = new AdmitService();
        $info = $admit -> vdRegister($where,'ba_state,ba_describe');
        $ba_describe = '';
        $is_apply = '';
        if(empty($info)){                   //未申请
            $is_apply = 100;
        }else if($info['ba_state'] == 0){   //未审核
            $is_apply = 0;
        }else if($info['ba_state'] == 8){  //审核通过
            $this->redirect('/member/myhome/index');
        }else if($info['ba_state'] == 9){   //审核未通过
            $is_apply = 9;
            $ba_describe = $info['ba_describe'];
        }
        $this->assign(['is_apply'=>$is_apply,'ba_describe'=>$ba_describe]);
        $this->assign('header_title','申请入驻');
        return $this->fetch();
    }

    /*
    * 会员申请入驻
     * 邓赛赛
    */
    public function application()
    {
        $m_id = $this->m_id;
        $admitService = new AdmitService();
        $m_id_where=[
            'm_id'=>$m_id
        ];
        $is_mid = $admitService->vdRegister($m_id_where);//检测用户申请信息
        if($is_mid){
            switch($is_mid['ba_state']){
                case 8:
                    $this->success("您已成功商家",'myhome/index','',1);
                    break;
                case 0:
                    $this->success("您已申请,请耐心等待",'Admit/apply_store','',1);
                    break;
                case 9:
                    $this->success("审核未通过,请重新申请",'Admit/edit_application','',1);
                    break;
            }
        }

        if(request()->isPost()) {
            $data = input('post.');
            if(empty($data['corporation_name'])){
                $this->error('企业名不能为空','admit/application','',1);
            }
            if(empty($data['pid']) || empty($data['address'])){
                $this->error('地址不能为空','admit/application','',1);
            }
            if(empty($data['ba_bankname'])){
                $this->error('开户银行名不能为空','admit/application','',1);
            }
            if(empty($data['ba_bankaccount'])){
                $this->error('银行卡号不能为空','admit/application','',1);
            }
            //电话或座机验证
            $isMob="/^1[34578]{1}\d{9}$/";
            $isTel="/^([0-9]{3,4}-)?[0-9]{7,8}$/";
            if(!preg_match($isMob,$data['store_tel']) && !preg_match($isTel,$data['store_tel'])){
                $this->error('请输入正确的手机号或座机号','admit/application','',1);
            }
            //法人姓名
            if(!empty($data['ba_legal_person'])){
                $naeme_len = strlen($data['ba_legal_person']);
                if($naeme_len > 15){
                    $this->error('请输入1-15的正确姓名','admit/application','',1);
                }
            }
            //身份证验证
            if(!empty($data['ba_legal_person_idnumber'])){
                $len = strlen($data['ba_legal_person_idnumber']);
                if($len == 15){
                    $isIDCard1="/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/";
                    $is = preg_match($isIDCard1,$data['ba_legal_person_idnumber']);
                    if(!$is){
                        $this->error("身份证不合法1",'Admit/application','',1);
                    }
                }else if($len == 18){
                    $isIDCard2="/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/";
                    $is = preg_match($isIDCard2,$data['ba_legal_person_idnumber']);
                    if(!$is){
                        $this->error("身份证不合法2",'Admit/application','',1);
                    }
                }else{
                    $this->error('身份证不合法3','admit/application','',1);
                }
            }
            //验证企业名称是否已经注册
            $where=[
                'corporation_name'=>$data['corporation_name']
            ];
            $is_mid = $admitService->vdRegister($where);//检测企业名是否已经注册
            if($is_mid){
                $this->error("此企业名称已注册",'Admit/application','',1);
            }
            echo 1;
            //开始申请
            $res = $admitService->admitApplication($m_id,$data);
            if($res['status'] == 1){
                $this->redirect("Admit/apply_store_success");
            }else{
                $this->error($res);
            }
        }else{
            $category = $admitService->storeCategory();
            $this->assign('category',$category);
            $this->assign('header_title','填写申请资料');
            return $this->fetch();
        }
    }

    /**
     * @return mixed
     * 提交申请成为商家后
     */
    public function apply_store_success()
    {
        $m_id = $this->m_id;
        $admitService = new AdmitService();
        $where=[
            'm_id'=>$m_id
        ];
        $info = $admitService->vdRegister($where,'ba_addtime');
        $this->assign(['info'=>$info]);
        $this->assign('header_title','提交成功');
        $this->assign('header_path','/member/myhome/index');
        return $this->fetch();
    }

    /**
     * 会员修改成为商家信息
     */
    public function edit_application(){
        $m_id = $this->m_id;
        $where=[
            'm_id'=>$m_id
        ];

        $mem = new MemberService();
        $info = $mem->get_info($where,'m_type');
        if($info['m_type']){
            $this->redirect("myhome/index");
        }
        if(request()->isPost()) {
            $data = input("post.");
         
            $data['ba_stroe_name'] = input("post.shopname");
            if(empty($data['corporation_name'])){
                $this->error('企业名不能为空','admit/edit_application','',1);
            }
            if(empty($data['address'])){
                $this->error('地址不能为空','admit/edit_application','',1);
            }
            if(empty($data['ba_bankname'])){
                $this->error('开户银行名不能为空','admit/edit_application','',1);
            }
            if(empty($data['ba_bankaccount'])){
                $this->error('银行卡号不能为空','admit/edit_application','',1);
            }
            //企业手机或座机验证
            $isMob="/^1[34578]{1}\d{9}$/";
            $isTel="/^([0-9]{3,4}-)?[0-9]{7,8}$/";
            if(!preg_match($isMob,$data['store_tel']) && !preg_match($isTel,$data['store_tel'])){
                $this->error('请输入正确的手机号或座机号','admit/application','',1);
            }
            //法人姓名
            if(!empty($data['ba_legal_person'])){
                $naeme_len = strlen($data['ba_legal_person']);
                if($naeme_len > 15){
                    $this->error('请输入1-15的正确姓名','admit/application','',1);
                }
            }
            //身份证验证
            if(!empty($data['ba_legal_person_idnumber'])){
                $len = strlen($data['ba_legal_person_idnumber']);
                if($len == 15){
                    $isIDCard1="/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/";
                    $is = preg_match($isIDCard1,$data['ba_legal_person_idnumber']);
                    if(!$is){
                        $this->error("身份证不合法1",'Admit/application','',1);
                    }
                }else if($len == 18){
                    $isIDCard2="/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/";
                    $is = preg_match($isIDCard2,$data['ba_legal_person_idnumber']);
                    if(!$is){
                        $this->error("身份证不合法2",'Admit/application','',1);
                    }
                }else{
                    $this->error('身份证不合法3','admit/application','',1);
                }
            }
            //验证企业名称是否已经注册
            $where=[
                'corporation_name'=>$data['corporation_name'],
                'm_id'=>['<>',$this->m_id]
            ];
            $admitService = new AdmitService();
            $is_mid = $admitService->vdRegister($where);//检测企业名是否已经注册
            if($is_mid){
                $this->error("此企业名称已注册",'Admit/application','',1);
            }
            $res = $admitService->upApplication($m_id,$data);
            if ($res['status'] == 1) {
                $this->redirect("Admit/apply_store_success");
            } else {
                $this->error($res['msg']);
            }
        }else{
            $admitService = new AdmitService();
            $category = $admitService->storeCategory();//分类选择
            $info = $admitService->vdRegister($where);//申请信息
            $address = [
                'pid'=>$info['pid'],
                'cid'=>$info['cid'],
                'aid'=>$info['aid'],
            ];
            $info['pid'] = $admitService->id_tfm_address($address);
            $cate = Db::table("pai_store_category")->column('sc_name','sc_id');//替换使用(如:分类3,替换为实木家具
            $info['store_categoryid_name'] = empty($cate[$info['store_categoryid']]) ? '' : $cate[$info['store_categoryid']];

            $this ->assign(["info"=>$info,'category'=>$category,'cate'=>$cate]);
            $this->assign('header_title','申请入驻详情');
            return $this->fetch('admit/application');
        }
    }

}