<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/9/20
 * Time: 10:48
 */

namespace app\data\service\api;


use think\Image;

class ApiauthenticationService
{
    protected $key='zhishen'; //加密、解密秘钥
    //是否存在已实名认证
    public function isattestation($where,$field,$order){
        $info = Db('member_attestation')->where($where)->field($field)->order($order)->find();
        return $info;
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
     * 解密数据
     * @param $data 待加密数据
     * @return string 加密后的数据
     * 创建人 邓赛赛
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
    /**
     * 上传图片
     * 创建人 韦丽明
     * 时间 2017-09-10 21:26:02
     */
    public function upload($name='', $file = "attach_file", $type=0, $w=350 ,$h=350)
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($file);
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . $name);

        if($info)
        {
            $info = '/uploads/'.$name.'/'.$info->getSaveName();

            //生成缩略图
            if ($type===2)
            {
                $thumb = $this->thumbImg($info, $name, $type, $w, $h);
            }
        }
        else
        {
            // 上传失败获取错误信息 /uploads/goods/
            //echo $file->getError();
        }

        if($type===2)
        {
            $pic = array('info'=>$info,'thumb'=>$thumb);
            unset($thumb);
            return $pic;
        }
        else
        {
            return $info;
        }
    }
    //插入实名认证表
    public function add_attestation($data){
        $info = Db('member_attestation')->insertGetId($data);
        return $info;
    }
    /**
     * 更新会员表银行卡
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
    //获取个人信息
    public function getInfo($where, $field='*')
    {
        $info =  Db('member')->field($field)->where($where)->find();
        return $info;
    }
    //获取个人信息
    public function getInfo_attaestation($where, $field='*',$order)
    {
        $info =  Db('member')->field($field)->where($where)->order($order)->find();
        return $info;
    }
    //验证手机号
    public function isphone($phone){
        if (!preg_match("/^1[3-9][0-9]{9}$/",trim($phone))) {
            return ['status'=>0,'msg'=>'请输入正确的手机号格式'];
        }
    }
    //检验手机是否已注册
    public function getMemberInfo($map)
    {
        $m_mobile = $this->encrypt($map['m_mobile']);//手机加密后再查询
        $where['m_mobile'] = $m_mobile;
        $info = Db('member')->field('*')->where($where)->find();
        return $info;
    }
}