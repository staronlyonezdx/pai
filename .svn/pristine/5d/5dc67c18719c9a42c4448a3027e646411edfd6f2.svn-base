<?php
namespace app\api\controller;
use think\Controller;
use think\Request;
use think\Url;
use think\Session;
use think\Config;
use think\Cache;
use think\Image;
use app\data\service\admin\ApiService as ApiService;

use app\data\service\BaseService as BaseService;

class ApiMember extends Api {
    public function __construct() {
        $this->check_login = TRUE;
        parent::__construct();
        if (!$this->has_login) {
            $this->response_error('请登录');
        }
    }
    public function checktoken(){
        $resust_array=array("state"=>'0',"msg"=>"");
        if(empty($this->data['token'])){
            $resust_array=array("state"=>'0',"msg"=>"token参数错误");
            return $resust_array;
        }
        $token=$this->data['token'];

        if(empty($this->data['at_id'])){
            $resust_array=array("state"=>'0',"msg"=>"接口用户ID错误");
            return $resust_array;
        }
        $at_id=$this->data['at_id'];
        $api = new ApiService();
        $where="at_id=".$at_id;
        $at_data=$api->apitokenInfo($where);
        if($at_data['at_token']!=$token){
            $resust_array=array("state"=>'0',"msg"=>"token参数不匹配");
            return $resust_array;
        }

        if(empty($this->data['randonnum'])){
            $resust_array=array("state"=>'0',"msg"=>"随机参数错误");
            return $resust_array;
        }
        $randonnum=$this->data['randonnum'];

        if(empty($this->data['timespan'])){
            $resust_array=array("state"=>'0',"msg"=>"时间戳参数错误");
            return $resust_array;
        }
        $timespan=$this->data['timespan'];
        if(empty($this->data['ntoken'])){
            $resust_array=array("state"=>'0',"msg"=>"token加密参数错误");
            return $resust_array;
        }
        $ntoken=$this->data['ntoken'];
        $newtoken=md5($token).md5($randonnum).$timespan;
        if($ntoken!=$newtoken){
            $resust_array=array("state"=>'0',"msg"=>"token验证失败");
            return $resust_array;
        }

        $resust_array=array("state"=>'1',"msg"=>"token验证成功");
        return $resust_array;
    }

}


