<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/30
 * Time: 15:01
 */

namespace app\data\service\api;


use app\data\model\admin\ApiModel;
use app\data\service\BaseService;
use think\Db;
use think\Image;

class ApimemberService extends BaseService
{
    protected $cache = 'api';
    public function __construct()
    {
        parent::__construct();
        $this->api = new ApiModel();
        $this->cache = 'api';
    }
    //获取个人信息
    public function getInfo($where, $field='m_avatar,m_name,m_income,m_id,m_payment_pwd,tj_mid,ml_tui_id,tui_code,tui_diamond')//m_id是2018-9-1加上去的
    {
        $info =  Db('member')->field($field)->where($where)->find();
        return $info;
    }
    //获取手机号码
    public function getmobile($where, $field='*'){
        $info =  Db('member')->where($where)->field($field)->value($field);
        return $info;
    }
    //判断是否已修改过推荐人
    public function get_invitation($where){
        $info = Db('invitation_log')->where($where)->find();
        return $info;
    }
    /**
     * 解密数据
     * @param $encrypt 待解密数据
     * @return string  解密后的值
     *  创建人 邓赛赛
     */
    function decrypt($encrypt)
    {
        $key = $this->key;  //解密秘钥(同加密秘钥)

        $key = md5($key);
        $x = 0;
        $data = base64_decode($encrypt);
        $len = strlen($data);
        $l = strlen($key);
        $char = '';
        $str = '';
        for ($i = 0; $i < $len; $i++)
        {
            if ($x == $l)
            {
                $x = 0;
            }
            $char .= substr($key, $x, 1);
            $x++;
        }
        for ($i = 0; $i < $len; $i++)
        {
            if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
            {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            }
            else
            {
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        return $str;
    }
    //获取头像及昵称
    public function getavatar($where){
        $info =  Db('member')->field("m_name,m_avatar")->where($where)->find();
        return $info;
    }
    //修改昵称
    public function changename($where,$data){
        $info = Db('member')->where($where)->update($data);
        return $info;
    }
    //修改头像
    public function change_avatar($where){
        $img = request()->file('m_avatar');//头像
        if($img){
            $file = $this->upload('avatar','m_avatar','',500,300);
            if($file){
                $update['m_avatar'] = $file;
                $info = $this->getSave($where,$update);
                if($info){
                    $this->new_code(['m_id'=>$where['m_id']]);
                    return ['status'=>1,'msg'=>'修改头像成功','data'=>$file];
                }else{
                    return ['status'=>0,'msg'=>'修改头像失败'];
                }
            }
        }else{
            if(!empty($data['m_avatar']) && is_array($data) ){
                $data['m_avatar'] = array_values(array_filter($data['m_avatar']));
                $update['m_avatar'] = $this->ba64_img($data['m_avatar'],'m_avatar')[0];

                $this->getSave($where,$update);
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
        $res = $this->getSave($where,$update);

        if($res){
            return ['status'=>1,'msg'=>'修改成功'];
        }else{
            return ['status'=>0,'msg'=>'修改失败'];
        }
    }
    /**
     * 修改个人资料
     */
    public function set_personal_data($where='',$data=''){
        $update['edit_time'] = time();
        if(isset($data['m_name'])) {
            $update['m_name']=$data['m_name'];
            $end = "/^[\x{4e00}-\x{9fa5}A-Za-z0-9]{1,10}$/u";
            if(!preg_match($end,$update['m_name'])){
                return ['status'=>-1,'msg'=>'用户名由1-10位数字或字母、汉字组成！'];
            }
        }
        if(isset($data['m_sex'])){
            if(($data['m_sex']==0) || ($data['m_sex']==1) || ($data['m_sex']==2)) {
                $update['m_sex']=$data['m_sex'];
            }
        }
        $update['m_avatar'] = request()->file('m_avatar');
        if($update['m_avatar']){
            $file = $this->upload('avatar','m_avatar','',500,300);
            $tmp = strstr($file,'http://');//添加上http判断
            if($tmp == false){
                $file = PAIYY_URL . $file;
            }
            if($file){
                $update['m_avatar'] = $file;
                $info = $this->getSave($where,$update);
                if($info){
                    $this->new_code(['m_id'=>$where['m_id']]);
                    return ['status'=>1,'msg'=>'修改成功','data'=>$file];
                }else{
                    return ['status'=>0,'msg'=>'修改失败'];
                }
            }else{
                return ['status'=>0,'msg'=>'上传头像失败'];
            }
        }else{
            if(!empty($data['m_avatar']) && is_array($data) ){
                $data['m_avatar'] = array_values(array_filter($data['m_avatar']));
                $update['m_avatar'] = $this->ba64_img($data['m_avatar'],'m_avatar')[0];

                $this->getSave($where,$update);
                //上传代码修改二维码logo
                if(is_file(trim($update['m_avatar'],'/'))){
                    $res = $this->new_code(['m_id'=>$where['m_id']]);
                    return ['status'=>1,'msg'=>'修改成功','data'=>PAIYY_URL.$res];
                }
            }
        }
        if(empty( $update['m_avatar'])){
            unset( $update['m_avatar']);
        }

        $res = $this->getSave($where,$update);

        if($res){
            return ['status'=>1,'msg'=>'修改成功'];
        }else{
            return ['status'=>0,'msg'=>'修改失败'];
        }
    }
    /**
     * 保存ba64文件
     */
    public function ba64_img($img=[],$name,$width=300, $height=300){

        if(!$img){
            return false;
        }
        $imgs = [];
        $date = date("Ymd",time());
        $url = "uploads/".$name."/".$date;

        if(!is_dir($url)){
            $root_path = "uploads/".$name;
            if(!is_dir($root_path)){
                mkdir($root_path);
                chmod($root_path,0777);
            }
            mkdir($url);
            chmod($url,0777);
        }

        $thumbUrl = 's_uploads/'.$name.'/'.$date;
        if(!is_dir($thumbUrl)){
            if(!is_dir('s_uploads/'.$name)){
                mkdir('s_uploads/'.$name);
                chmod($url,0777);
            }
            mkdir($thumbUrl);
            chmod($thumbUrl,0777);
        }

        $img = array_filter($img);
        foreach($img as $k => $v){
            $base64_string= explode(',', $v);
            if(empty($base64_string[1])){
                continue;
            }
            $file= base64_decode($base64_string[1]);
            $shopUrl= $url."/".time().rand(1000,9999).rand(1000,9999).$k.".jpg";
            $is_success = file_put_contents($shopUrl,$file);
//            return $is_success;
            if($is_success){
                $imgs [] = "/".$shopUrl;
                $image = Image::open($shopUrl);
                $image->thumb($width, $height)->save(str_replace("uploads/","s_uploads/",$shopUrl),'jpg','90');
            }
        }
        return $imgs;
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
    //验证手机号
    public function isphone($phone){
        if (!preg_match("/^1[3-9][0-9]{9}$/",trim($phone))) {
            return ['status'=>0,'msg'=>'请输入正确的手机号格式'];
        }
    }
    //检验手机是否已注册
    public function getMemberInfo($map,$name='')
    {
        $select['m_mobile'] = $this->encrypt($map['m_mobile']);//手机加密后再查询
        $info = $this->getInfo($select,'m_id');
        return $info;
    }
    /**
     * 忘记支付密码
     */
    public function forget_payment_pwd($data){
        $parameter['m_mobile'] = trim($data['m_mobile']);
        $parameter['re_payment_pwd'] = trim($data['re_payment_pwd']);
        $parameter['m_payment_pwd'] = trim($data['m_payment_pwd']);
        $parameter['verification'] = trim($data['verification']);

        if($parameter['re_payment_pwd'] != $parameter['m_payment_pwd']){
            return ['status'=>0,'msg'=>'两次密码不一致'];
        }

        $is_phone = $this->isphone($parameter['m_mobile']);
        if($is_phone){ return $is_phone;}

        if(!preg_match("/^\d{6}$/",$parameter['m_payment_pwd'])){
            return ['status'=>0,'msg'=>'支付密码必须为6位数字组成'];
        }

        $where = [
            'm_mobile'=>$this->encrypt($parameter['m_mobile'])
        ];
        $is_payment = $this->getinfo($where,'m_payment_pwd');
        if(!$is_payment){
            return ['status'=>0,'msg'=>'此账户非会员'];
        }

        if($is_payment['m_payment_pwd'] == null){
            return ['status'=>0,'msg'=>'您还未绑定支付,前往绑定'];
        }

        $update = [
            'm_payment_pwd' =>md5($parameter['m_payment_pwd']),
            'edit_time'     =>time()
        ];
        $res = $this->getSave($where,$update);
        if($res){
            return ['status'=>1,'msg'=>'修改支付密码成功'];
        }else{
            return ['status'=>0,'msg'=>'修改支付密码失败,请稍后重试'];
        }
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
            return ['status'=>0,'msg'=>'修改登陆密码失败,请稍后重试'];
        }
    }
    /**
     * 生成会员二维码
     */
    public function new_code($where){
        $member = $this->getInfo($where,'m_id,add_time,m_avatar,m_mobile');
        if(empty($member['m_avatar']) || !is_file(trim($member['m_avatar'],'/'))){
            $member['m_avatar']='/uploads/logo/shengyu.png';  //默认中间晟域logo
        }
        $file_url = 'uploads/code/'.date("Ymd");
        if(!is_dir($file_url)){
            mkdir($file_url);
            chmod($file_url,0777);
        }
        $m_mobile = $this->decrypt($member['m_mobile']);
        $server_url = "http://"."m.syu666.com"."/member/Newreg/reg?tj_mobile=".$m_mobile;
//        $server_url = "http://"."cscs.syu666.com"."/member/Newreg/reg?tj_mobile=".$m_mobile;
        $get_code_url = 'http://b.bshare.cn/barCode?site=weixin&url='.$server_url;
        $code = $file_url.'/'.$member['m_id'].$member['add_time'].".jpg";
        $content = file_get_contents($get_code_url);
        file_put_contents($code,$content);
        $image = Image::open(ltrim($member['m_avatar'],'/'));
        $ab_img = $file_url.'/'.$member['m_id'].'ab_img'.'.jpg';
        $image->thumb(30, 30,Image::THUMB_CENTER)->save($ab_img);
        $image = Image::open($code);
        $image->water($ab_img,Image::WATER_CENTER)->save($file_url.'/'.$member['m_id'].'new_code_shengyu'.'.jpg');
        $update = [
            'tui_code' => '/'.$file_url.'/'.$member['m_id'].'new_code_shengyu'.'.jpg',
            'edit_time' =>time(),
        ];
        $this->getSave($where,$update);
//        return 1;
        unlink($ab_img);
        return $update['tui_code'];  //二维码路径
    }
}