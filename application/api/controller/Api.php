<?php
namespace app\api\controller;
use RedisCache\RedisCache;
use think\Controller;
use think\Request;
use think\Url;
use think\Session;
use think\Config;
use think\Cache;
use think\Image;
use app\data\service\member\MemberService as MemberService;

use app\data\service\BaseService as BaseService;
define("PAIYAYA_URL","https://m.paiyy.com.cn");

class Api extends Controller
{
    /* * ******************************** 前台control父类 ********************************************* */
    //客户端类型
    protected $client_type_array = array('android', 'ios','h5');
    //列表默认一页显示的个数
    protected $page = 10;
    //当前页数
    public $curpage = 1;
    //接受参数
    public $data = array();
    //用户信息
    public $member_info = array();
    //客户端
    public $client;
    public $member_name;
    public $member_id;
    public $has_login;
    public $check_login = false;
    public $error_balanceshortof = "300"; ##代金券不足
    public $error_pointsshortof = "301"; ##兑付宝不足
    public $error_pay_pwd = "302"; ##支付密码错误
    public $error_pay_no_address = "303"; ##没有设置收货地址
    public $snflag = 0;
    private $v = 0.0;               ##初始化版本


    public function __construct() {
        $file_data = json_decode(file_get_contents("php://input"), TRUE);
        $this->data = empty($file_data) ? $_POST : $file_data;
        $client = isset($this->data['client']) && $this->data['client'] ? strtolower($this->data['client']) : "";
        if (!$client || ($client && !in_array($client, $this->client_type_array))) {
            $this->response_error('参数错误');
        }
        $this->client = $client;
        //分页数处理，默认10条
        $page = isset($this->data['page']) ? intval($this->data['page']) : $this->page;
        if ($page > 0) {
            $this->page = $page;
        }
        $curpage = isset($this->data['curpage']) ? intval($this->data['curpage']) : 1;
        if ($curpage > 0) {
            $this->curpage = $curpage;
        } else {
            $this->curpage = 1;
        }
        define("CDN_URL","https://m.paiyy.com.cn");
        //判断是否登录
     $this->get_member_info();
    }

    //返回数据
    public function response_data($datas = array(), $extend_data = array()) {
        $response = $extend_data;
        $is_object=false;
        if (count($datas) == 0) {
            $is_object = TRUE;
        }
        $response['data'] = $datas;
        $response['status'] = array();
        $response['status']['succeed'] = '1';
        if ($is_object) {
            echo json_encode($response, JSON_FORCE_OBJECT);
        } else {
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        die;
    }

    //返回错误
    public function response_error($error_desc, $error_code = 600) {
        $response = array();
        $response['data'] = array();
        $response['status'] = array();
        $response['status']['succeed'] = '0';
        $response['status']['error_code'] = $error_code;
        $response['status']['error_desc'] = $error_desc ? $error_desc : '';
        echo json_encode($response, JSON_FORCE_OBJECT);
        die;
    }

    //输出是否有下一页
    public function app_page($page_count) {
        $extend_data = array();
        $current_page = $this->curpage;
        if ($current_page >= $page_count) {
            $extend_data['hasmore'] = false;
        } else {
            $extend_data['hasmore'] = true;
        }
        $extend_data['curpage'] = $this->curpage;
        $extend_data['page_total'] = $page_count;
        return $extend_data;
    }

    //检查必填的参数
    public function check_parameters($params) {
        foreach ($params as $param) {
            if (!isset($this->data[$param])) {
                $this->response_error('参数错误');
            }
        }
    }

    //检查支付方式
    public function check_payment_code($payment_code, $type = "") {
        if ($type == "pd_order") {
            // 在线支付，是不需要代金券支付的
            if ($payment_code == 'balance') {
                $this->response_error('系统不支持选定的支付方式');
            }
        } else if ($type == 'mp_order') {
            // 商户购买积分在线支付，是不需要代金券支付的
            if ($payment_code == 'balance') {
                $this->response_error('系统不支持选定的支付方式');
            }
        } else if ($type == 'real_order') {

        } else {

            //其它都只需要代金券支付
            if ($payment_code != 'balance') {
                $this->response_error('系统不支持选定的支付方式');
            }
        }
        //判断支付方式是否正确
        $model_mb_payment = Model('mb_payment');
        $condition = array();
        $condition['payment_code'] = $payment_code;
        $mb_payment_info = $model_mb_payment->getMbPaymentOpenInfo($condition);
        if (!$mb_payment_info) {
            $this->response_error('系统不支持选定的支付方式');
        }
    }

    public function addressToId($address) {
        //处理地区
        $ids = array();
        $area_model = Model('area');
        //省
        $position = strpos($address['province'], '市');
        if ($position) {
            $address['province'] = mb_substr($address['province'], 0, $position / 2 - 1, 'utf-8');
        }
        $province_info = $area_model->getAreaInfo("`area_name` = '" . $address['province'] . "' and area_deep = 1");

        if (!$province_info['area_id']) {
            $this->response_error('请选择省份');
        }
        $ids['province'] = $province_info['area_id'];
        $ids['provincename'] = $province_info['area_name'];
        //市
        $city_info = $area_model->getAreaInfo("`area_name` = '" . $address['city'] . "' and area_deep = 2");
        if (!$city_info['area_id']) {
            $this->response_error('请选择城市');
        }
        $ids['city'] = $city_info['area_id'];
        $ids['cityname'] = $city_info['area_name'];
        //区
        $area_info = $area_model->getAreaInfo("`area_name` = '" . $address['area'] . "' and area_deep = 3");
        if (!$area_info['area_id']) {
            $this->response_error('请选择区');
        }
        $ids['area'] = $area_info['area_id'];
        $ids['areaname'] = $area_info['area_name'];
        return $ids;
    }

    public function get_member_info() {
        $this->has_login = FALSE;
        if (isset($this->data['member_id'])) {
            $member_id = isset($this->data['member_id']) && $this->data['member_id'] ? $this->data['member_id'] : "";
            if (empty($member_id)) {
                //如果需要检查是否是登录
                if ($this->check_login) {
                    $this->response_error('参数错误');
                }
            }
            $member_service=new MemberService();
            $where="m_id=".$member_id;
            $fields="m_id,m_money,m_name,m_state";
            //2018-11-04判断是否存入redis
            $redis = RedisCache::getInstance(1);
            $member_login = $redis->get('member_login');
            if($member_login){
                $member_login = json_decode($member_login,true);
            }else{
                $member_info = $member_service->get_info($where,$fields);
                if (empty($member_info)) {
                    if ($this->check_login) {
                        $this->response_error('用户不存在');
                    }
                }
                $redis->set('member_login'.$member_id,json_encode($member_login),600);
            }


            //30天有效期，30天登录信息自动失效
//            if (($member_info['login_time'] < time() - 30 * 24 * 60 * 60)) {
//                if ($this->check_login) {
//                    $this->response_error('登录超时');
//                }
//            }

            $this->member_info =$member_info;
            if ($this->member_info['m_state']) {
                $this->response_error('账号已被停用');
            }
            if (!empty($this->member_info)) {
//                //读取卖家信息
//                $seller_info = Model('seller')->getSellerInfo(array('member_id' => $this->member_info['member_id']));
//                if ($seller_info) {
//                    $store_info = Model('store')->getStoreInfo($seller_info['store_id']);
//                    if (!$store_info['store_state']) {
//                        $this->response_error('该店铺已被关闭');
//                    }
//                    $this->member_info['store_id'] = $seller_info['store_id'];
//                    $this->member_info['store_name'] = $seller_info['store_name'];
//                }
            }
            $this->has_login = true;
        }
    }
}


