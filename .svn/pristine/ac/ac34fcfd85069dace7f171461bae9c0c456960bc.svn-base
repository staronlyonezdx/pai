<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/30
 * Time: 17:03
 */

namespace app\data\service\api;


use app\data\service\BaseService;
use think\Db;

class ApiregisterService extends BaseService
{
    /**
     * 解密数据
     * @param $data 待加密数据
     * @return string 加密后的数据
     */
    function encrypt($data)
    {
        $key = $this->key;  //加密秘钥

        $key = md5($key);
        $x = 0;
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        $str = '';
        for ($i = 0; $i < $len; $i++)
        {
            if ($x == $l){
                $x = 0;
            }
            $char .= $key{$x};
            $x++;
        }
        for ($i = 0; $i < $len; $i++){
            $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
        }
        return base64_encode($str);
    }
    //忘记登陆密码
    public function forget_m_pwd($data){
        $parameter['m_mobile'] = trim($data['m_mobile']);
        $parameter['re_pwd'] = trim($data['re_pwd']);//确认密码
        $parameter['m_pwd'] = trim($data['m_pwd']);//登陆密码
        $parameter['verification'] = trim($data['verification']);//验证码

        if($parameter['re_pwd'] != $parameter['m_pwd']){
            return ['status'=>0,'msg'=>'两次密码不一致'];
        }

        $is_phone = $this->isphone($parameter['m_mobile']);
        if($is_phone){ return $is_phone;}

        if(!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/',trim($parameter['m_pwd']))){
            return ['status'=>0,'msg'=>'请输入6-16位数字/字母组合密码'];
        }
        $where = [
            'm_mobile'=>$this->encrypt($parameter['m_mobile'])
        ];
        $is_payment = $this->getinfo($where,'m_pwd');
        if(!$is_payment){
            return ['status'=>0,'msg'=>'此账户非会员'];
        }

        $update = [
            'm_pwd' =>md5($parameter['m_pwd']),
            'edit_time'     =>time()
        ];
        $res = $this->getSave($where,$update);
        if($res){
            return ['status'=>1,'msg'=>'修改登陆密码成功'];
        }else{
            return ['status'=>0,'msg'=>'修改登陆密码失败'];
        }
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
    /**
     * 获取单条数据
     * @param unknown $where
     * @param unknown $field
     */
    //验证手机号
    public function isphone($phone){
        if (!preg_match("/^1[3-9][0-9]{9}$/",trim($phone))) {
            return ['status'=>0,'msg'=>'请输入正确的手机号格式'];
        }
    }
    public function getInfo($where, $field='*')
    {
        $info =  Db('member')->field($field)->where($where)->find();
        return $info;
    }
    //获取token
    public function getToken($where, $field='*'){
        $info = Db('api_token')->where($where)->field($field)->value('at_token');
        return $info;
    }
    /**
     * 递归获取推荐人二级基因m_id  待测
     */
    public function digui_mid($param_mid){
            $ml_tui_id = Db('member')->where('m_id',$param_mid)->field('ml_tui_id,tj_mid,m_id')->find();//推荐人的等级
//        dump($ml_tui_id);
            if(!($ml_tui_id['ml_tui_id'] == 2) && !($ml_tui_id['ml_tui_id'] == 1)){
//                print_r($m_tj_jy2);
               $res =  $this->digui_mid($ml_tui_id['tj_mid']);
                return $res;
            }else{
                $m_tj_jy2 = $ml_tui_id['m_id'];
                return $m_tj_jy2;
            }
    }
    /**
     * 通过ip获取地理位置
     */
    function getCity($ip = '')
    {
        if($ip == ''){
            return false;
        }else{
            $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
            $ip=json_decode(file_get_contents($url));
            if((string)$ip->code=='1'){
                return false;
            }
            $data = (array)$ip->data;
        }

        return $data;
    }
    /**
     * 插入返回id
     */
    public function insertId($data){
        if (!$data)
        {
            return false;
        }
        $id = Db('member')->insertGetId($data);
        return $id;
    }
    //检验手机是否已注册
    public function getMemberInfo($map,$name='')
    {
        $select['m_mobile'] = $this->encrypt($map['m_mobile']);//手机加密后再查询
        $info = $this->getInfo($select,'m_levelid');
        return $info;
    }
}