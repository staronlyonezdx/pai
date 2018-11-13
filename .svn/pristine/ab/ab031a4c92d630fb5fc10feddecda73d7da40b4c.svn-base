<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/9/1
 * Time: 10:47
 */

namespace app\data\service\api;


use app\data\service\BaseService;
use think\Db;
class ApiincomeService extends BaseService
{
    //获取个人信息
    public function getInfo($where, $field='*')
    {
        $info =  Db('member')->field($field)->where($where)->find();
        return $info;
    }
    //获取会员的收益记录
    public function getall($m_id,$field="*"){
        $list = Db('withdraw')->where(['w_mid'=>$m_id])->field($field)->select();
        return $list;
    }
    /**
     * 更新数据
     */
    public function getSave($where, $data)
    {
        if (!$data || !$where)
        {
            return false;
        }
        $save = Db('member')->where($where)->update($data);
        return $save;
    }
    //更新认证表的银行卡绑定数据
    public function get_atta($where,$data){
        if (!$data || !$where)
        {
            return false;
        }
        $save = Db('member_attestation')->where($where)->update($data);
        return $save;
    }
    //获取会员的积分记录
    public function getallpoint($m_id){
        $list = Db('point_log')->where(['pl_mid'=>$m_id])->select();
        return $list;
    }
    //获取会员的收益记录新的
    public function getall_new($where,$fields="*",$order,$curpage='1',$pagenum='10',$ml_type){
        $table="pai_money_log";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $where_type = "";
        if($ml_type != 0){
            if($ml_type == 1){
                $where_type = " and ml_type = 'add'";
            }
            if($ml_type == 2){
                $where_type = " and ml_type = 'reduce'";
            }
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT " .$fields." from ".$table." WHERE ".$where . $where_type." ORDER BY  ".$order." LIMIT $cn,$pagenum ";
        $list=Db::table($table)->query($sql);
        return $list;
    }
    //获取会员积分分页形式
    public function getpage_member($where,$fields,$order,$curpage='1',$pagenum='10'){
        $table="pai_point_log";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT " .$fields." from ".$table." WHERE ".$where . " ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        return $list;
    }
    //获取条数
    public function get_count($where){
        $count = Db('point_log')->where($where)->count();
        return $count;
    }
    //获取收益提现总条数
    public function get_withdraw_count($where){
        $count = Db('money_log')->where($where)->count();
        return $count;
    }
    /**
     * 插入一条充值数据
     */
    public function get_add_id($data){
        $id = Db('recharge')->insertGetId($data);
        return $id;
    }
    //插入积分表
    public function get_pl_id($data){
        $pl_id = Db('point_log')->insertGetId($data);
        return $pl_id;
    }
    //查找充值记录
    public function get_Info($where, $field='*')
    {
        $info =  Db('recharge')->field($field)->where($where)->find();
        return $info;
    }
    //插入提现记录表
    public function get_withdraw_id($data){
        $info = Db('withdraw')->insertGetId($data);
        return $info;
    }
    //插入money_log表
    public function addmoney_log($data){
        $info = Db('money_log')->insert($data);
        return $info;
    }
    //插入frozen表
    public function add_frozen($data){
        $info = Db('frozen')->insert($data);
        return $info;
    }
    //获取用户frozen表最后一条数据
    public function get_last_info($field,$m_id){
        $info = Db('frozen')->where('m_id',$m_id)->order('f_id desc')->field($field)->find();
        return $info;
    }
    //是否存在已实名认证
    public function isattestation($where,$field){
        $info = Db('member_attestation')->where($where)->field($field)->find();
        return $info;
    }
    //插入实名认证表
    public function add_attestation($data){
        $info = Db('member_attestation')->insertGetId($data);
        return $info;
    }
    /**
     * 修改个人身份证正面照
     */
    public function set_personal_data($where='',$data=''){
        $update['idcard_positive'] = request()->file('idcard_positive');//身份证正面照
        if($update['idcard_positive']){
            $file = $this->upload('idcard_positive','idcard_positive','',500,300);
            $tmp = strstr($file,'http://');//添加上http判断
            if($tmp == false){
                $file = PAIYY_URL . $file;
            }
            if($file){
                $update['idcard_positive'] = $file;
                $info = $this->getSave_positive($where,$update);
                if($info){
                    return ['status'=>1,'msg'=>'修改成功','data'=>$file];
                }else{
                    return ['status'=>0,'msg'=>'修改失败'];
                }
            }else{
                return ['status'=>0,'msg'=>'修改身份证正面照失败'];
            }
        }else{
            $apimemberservice = new ApimemberService();
            if(!empty($data['idcard_positive']) && is_array($data) ){
                $data['idcard_positive'] = array_values(array_filter($data['idcard_positive']));
                $update['idcard_positive'] = $apimemberservice->ba64_img($data['idcard_positive'],'idcard_positive')[0];
                $info = $this->getSave_positive($where,$update);
                if($info){
                    return ['status'=>1,'msg'=>'修改成功'];
                }else{
                    return ['status'=>0,'msg'=>'修改失败'];
                }
            }
        }
    }
    /**
     * 修改个人身份证反面照
     */
    public function set_personal_data_fan($where='',$data=''){
        $update['idcard_reverse'] = request()->file('idcard_reverse');//身份证反面照
        if($update['idcard_reverse']){
            $file = $this->upload('idcard_reverse','idcard_reverse','',500,300);
            $tmp = strstr($file,'http://');//添加上http判断
            if($tmp == false){
                $file = PAIYY_URL . $file;
            }
            if($file){
                $update['idcard_reverse'] = $file;
                $info = $this->getSave_positive($where,$update);
                if($info){
                    return ['status'=>1,'msg'=>'修改成功','data'=>$file];
                }else{
                    return ['status'=>0,'msg'=>'修改失败'];
                }
            }else{
                return ['status'=>0,'msg'=>'修改身份证反面照失败'];
            }
        }else{
            $apimemberservice = new ApimemberService();
            if(!empty($data['idcard_reverse']) && is_array($data) ){
                $data['idcard_reverse'] = array_values(array_filter($data['idcard_reverse']));
                $update['idcard_reverse'] = $apimemberservice->ba64_img($data['idcard_reverse'],'idcard_reverse')[0];
                $info = $this->getSave_positive($where,$update);
                if($info){
                    return ['status'=>1,'msg'=>'修改成功'];
                }else{
                    return ['status'=>0,'msg'=>'修改失败'];
                }
            }
        }
    }
    //更新身份证照
    public function getSave_positive($where, $data)
    {
        if (!$data || !$where)
        {
            return false;
        }
        $save = Db('member_attestation')->where($where)->update($data);
        return $save;
    }
}