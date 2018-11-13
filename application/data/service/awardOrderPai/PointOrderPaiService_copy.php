<?php
/**
 * 拍一拍积分订单Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 杭州市拍吖吖科技有限公司
 * 创建日期 2018-08-29
 * 版本 v.1.0.0
 * 网站：www.pai.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\service\pointOrderPai2;

use app\data\model\pointOrderPai;
use app\data\model\pointOrderPai\PointOrderPaiModel as PointOrderPaiModel;
use app\data\service\PointGoodsProduct\PointGoodsProductService as PointGoodsProductService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\pointOrderAwardcode\PointOrderAwardcodeService as PointOrderAwardcodeService;
use app\data\service\config\ConfigService as ConfigService;
use app\data\service\system_msg\SystemMsgService as SystemMsgService;
use app\data\service\BaseService as BaseService;
use think\Cookie;
use think\Db;


class PointOrderPaiService extends BaseService
{
    protected $cache = 'point_order_pai';

    public function __construct()
    {
        parent::__construct();
        $this->pointOrderPai = new PointOrderPaiModel();
        $this->cache = 'point_order_pai';
    }

    /**
     * 查询拍一拍积分订单列表
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiList($where = '', $field = '*', $order = 'o_id asc')
    {
        $list = $this->pointOrderPai->getList($where, $order, $field, $this->cache);
        return $list;
    }

    /**
     * 获取拍一拍积分订单信息
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiInfo($where = '', $field = '*')
    {
        $info = $this->pointOrderPai->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 获取拍一拍积分订单详细信息 point_order_pai,member,storer,point_goods_product,point_goods
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function getMoreInfo($where = '', $field = '*')
    {
        $info = $this->pointOrderPai->getMoreInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 条件统计拍一拍积分订单数量
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiCount($where = '')
    {
        $Count = $this->pointOrderPai->getCount($where);
        return $Count;
    }

    /**
     * 更新某个字段的值
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiSetField($where = '', $field = '', $data = '')
    {
        $SetField = $this->pointOrderPai->getSetField($where, $field, $data, $this->cache);
        return $SetField;
    }

    /**
     * 自增数据
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiSetInc($where = '', $field = '', $data = '')
    {
        $SetInc = $this->pointOrderPai->getSetInc($where, $field, $data, $this->cache);
        return $SetInc;
    }

    /**
     * 查询某一列的值
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiColumn($where = '', $field = '')
    {
        $Column = $this->pointOrderPai->getColumn($where, $field);
        return $Column;
    }

    /**
     * 添加一条拍一拍积分订单数据
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiAdd($data = '')
    {
        $list = $this->pointOrderPai->getAdd($data, $this->cache);
        return $list;
    }

    /**
     * 添加一条拍一拍积分订单数据(返回自增id)
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiAdd_getId($data = '')
    {
        $id = $this->pointOrderPai->insertId($data, $this->cache);
        return $id;
    }


    /**
     * 添加多条拍一拍积分订单数据
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiAddAll($data = '')
    {
        $list = $this->pointOrderPai->getAddAll($data, $this->cache);
        return $list;
    }

    /**
     * 拍一拍积分订单分页查询(旧)
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiPageList($where = '', $field = '*', $order = "o_id asc", $page = 15)
    {
        $list = $this->pointOrderPai->getPageList($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 拍一拍积分订单分页查询(新)
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiPaginate($where = '', $field = '*', $order = "o_id asc", $page = 15)
    {
        $list = $this->pointOrderPai->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 拍一拍积分订单分页查询
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function getOrderInfoPaginate($where = '', $field = '*', $order = "o_id asc", $page = 15)
    {
        $list = $this->pointOrderPai->getInfoPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 更新拍一拍积分订单数据
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiSave($where = "", $data = "")
    {
        $save = $this->pointOrderPai->getSave($where, $data, $this->cache);
        return $save;
    }

    /**
     * 删除一条拍一拍积分订单数据
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiDel($where = '')
    {
        $del = $this->pointOrderPai->getDel($where, $this->cache);
        return $del;
    }

    /**
     * 删除一条拍一拍积分订单数据（非物理刪除,事务）
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiDelete($o_id)
    {
        $del = $this->pointOrderPai->getDelete($o_id);
        return $del;
    }

    /**
     * 删除多条拍一拍积分订单数据
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiDelMost($id_arr = '')
    {
        $delAll = $this->pointOrderPai->getDelMost($id_arr, $this->cache);
        return $delAll;
    }

    /**
     * 拍一拍积分订单列表分页
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiListShow($type = 0)
    {
        $where = array();

        $where['o_id'] = array('>', 0);
        $lists = $this->pointOrderPaiPageList($where);
        $volist = false;
        if ($lists && !$type) {
            $volist = $lists->toArray();
        } else if ($lists && $type) {
            $volist = $lists;
        }
        return $volist;
    }

    /**
     * 按条件更新拍一拍积分订单
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiRoomEdit()
    {
        $id = input('get.o_id');
        if ($id == '' || !is_numeric($id)) {
            return false;
        }
        $id = intval($id);
        $where = array();
        $where['o_id'] = $id;
        $result = false;
        $result = $this->pointOrderPaiInfo($where);
        return $result;
    }

    /**
     * 按条件修改处理拍一拍积分订单
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiRoomEditDoo()
    {
        $id = input('post.o_id');
        if ($id == '' || !is_numeric($id)) {
            return false;
        }
        $id = intval($id);
        // 拍一拍积分订单POST数据
        $type = 'edit';
        $data = $this->inputData($type);
        $where = array();
        $where['o_id'] = $id;
        if ($this->pointOrderPaiSave($where, $data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 删除拍一拍积分订单操作
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiRoomDel()
    {
        $id = input('post.o_id');
        if ($id == '' || !is_numeric($id)) {
            return false;
        }
        $id = intval($id);
        $where = array();
        $where['o_id'] = $id;
        $info = $this->brandInfo($where);
        if ($info && $this->brandDel($where)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 批量删除拍一拍积分订单
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiRoomDelMost()
    {
        $id = input('post.delid');
        if ($this->brandDelMost($id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 添加一条拍一拍积分订单
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function pointOrderPaiRoomAdd()
    {
        // 拍一拍积分订单POST数据
        $type = 'add';
        $data = $this->inputData($type);
        if ($this->brandAdd($data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 拍一拍积分订单POST数据
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function inputData($type)
    {
        $data = array();
        switch ($type) {
            case 'edit';
                break;
            case 'add';
                break;
        }
        $data['Brandname'] = input('post.brandname');
        return $data;
    }

    /**
     * 数据验证
     * 创建人 刘勇豪
     * 时间 2018-06-26 14:44:00
     */
    public function checkData($data = [])
    {
        $error_msg = "";
        //收件人
        if (!isset($data['o_receiver']) || $data['o_receiver'] == '') {
            $error_msg .= "收件人不能为空；";
        }

        //收件人手机
        if (!isset($data['o_mobile']) || !preg_match("/^1[34578]{1}\d{9}$/", $data['o_mobile'])) {
            $error_msg .= '请输入合法的手机号码；';
        }

        //收件人地址
        if (!isset($data['o_address']) || $data['o_address'] == '') {
            $error_msg .= "收件地址不能为空；";
        }

        //积分订单金额
        if (!isset($data['o_totalmoney']) || !is_numeric($data['o_totalmoney'])) {
            $error_msg .= "请输入合法的积分订单金额；";
        }

        return $error_msg;
    }


    /**
     * 生成积分订单SN
     * 创建人 刘勇豪
     */
    public function createOrderSN()
    {
        $o_sn = "pai";
        $rand = rand(100000, 999999);
        $time = time();
        $o_sn = $o_sn . $time . $rand;
        return $o_sn;
    }

    /**
     * 判断指定拍品的最高期数
     * 创建人 刘勇豪
     * @param $gdr_id 商品折扣人数表id
     * @return array
     */
    public function maxPeriods($gdr_id)
    {
        $periods = 0;
        $error_msg = '';

        if (!$gdr_id) {
            return ['status' => 0, 'msg' => "参数有误！"];
        }

        $where_pai['gdr_id'] = $gdr_id; // 指定拍品折扣
        $where_pai['o_paystate'] = ['gt',1]; // 已付款
        $list = $this->pointOrderPaiList($where_pai, '*', 'o_periods desc');
        if (!empty($list)) {
            $periods = $list[0]['o_periods'];
        }
        return ['status' => 1, 'msg' => "ok！", 'data' => $periods];
    }

    /**判断并生成新下积分订单的期数
     * 创建人 刘勇豪
     *
     * @param $gdr_id 拍品的折扣
     * @return array
     */
    public function createPeriods($gdr_id)
    {
        $periods = 1;
        if (!$gdr_id) {
            return ['status' => 0, 'msg' => "参数有误！"];
        }

        // 最大期数
        $res = $this->maxPeriods($gdr_id);
        if ($res['status'] == 0) {
            return ['status' => 0, 'msg' => $res['msg']];
        }
        $maxPeriods = $res['data'];

        // 拍品设置的单品每期最少参与人数
        $peopleNum = $this->getPeopleNum($gdr_id);

        // 计算期数
        if ($maxPeriods != 0) {
            $periods = $maxPeriods;
            $where_award['gdr_id'] = $gdr_id; //指定拍品
            $where_award['oa_state'] = ['lt', 4]; // 废弃的除外
            $where_award['o_periods'] = $maxPeriods; // 指定期数
            $num = $this->countPaiNum($where_award);
            if ($num >= $peopleNum) {
                $periods++;
            }
        }
        return ['status' => 1, 'msg' => 'ok', 'data' => $periods];
    }

    /**
     * 统计指定拍品的抽奖码数量（这里是以实际抽奖码数量为准）
     * 创建人 刘勇豪
     */
    public function countPaiNum($where)
    {
        $num = Db('point_order_awardcode')->where($where)->count();
        return $num;
    }

    /**
     * 获取指定拍品的设定参与人数
     * 创建人 刘勇豪
     * @param $gdr_id
     * @return int
     */
    public function getPeopleNum($gdr_id)
    {
        $num = 0;
        $where_discount['gdr_id'] = $gdr_id;
        $info = Db::table("pai_point_point_goods_dt_record")
            ->where($where_discount)
            ->find();
        if (!empty($info)) {
            $num = $info['gdr_membernum'];
        }
        return $num;
    }

    /**
     * 获取指定拍品的用户剩余最大购买量
     * 创建人 刘勇豪
     * @param $m_id 用户id,
     * @param $gp_id 拍品id。
     * @return array
     */
    public function get_max_pai_num($m_id, $gp_id)
    {
        if (!$m_id || !$gp_id) {
            return ['status' => 0, 'msg' => '参数错误！'];
        }

        $max_pai_num = 0; //初始值

        // 1.查询库存
        // 2.查询拍品设置的用户最大拍买数量
        $where['pgp.gp_id'] = $gp_id;
        $info = Db::table("pai_point_goods_product")->alias('pgp')
            ->where($where)
            ->field("pgp.gp_stock,pg.g_limited")
            ->join('pai_point_goods pg', 'pgp.g_id=pg.g_id', 'left')
            ->find();

        $gp_stock = 0; // 初始化库存
        $g_limited = 0; // 初始化拍品设置的用户最大拍买数量

        if (!empty($info)) {
            if (!empty($info['gp_stock'])) {
                $gp_stock = $info['gp_stock'];
            }
            if (!empty($info['g_limited'])) {
                $g_limited = $info['g_limited'];
            }
        }
        $max_pai_num = $g_limited;


        // 1.判断用户已下单的数量
        $where_pai['m_id'] = $m_id;
        $where_pai['gp_id'] = $gp_id;
        $pai_num = $this->countPaiNum($where_pai);
        if ($max_pai_num > $pai_num) {
            $max_pai_num = $max_pai_num - $pai_num;
        } else {
            $max_pai_num = 0;
        }

        // 3.判断库存
        if ($gp_stock < 1) {
            $max_pai_num = 0;
        }
        return ['status' => 1, 'msg' => 'success！', 'data' => $max_pai_num];
    }

    /**
     * 获取指定拍品的用户剩余最大购买量
     * 创建人 刘勇豪
     * @param int $m_id 用户id
     * @param int $gdr_id 拍品折扣id。
     * @param int $periods 拍品折扣id。(如果没有指定就是获取最新一期的)
     * @return array|int
     */
    public function get_max_pai_num_bygdrid($m_id=0, $gdr_id = 0,$periods = 0)
    {
        $max_pai_num = 0; //初始值

        // 1.查询库存
        // 2.查询拍品设置的用户最大拍买数量
        $where['pgdr.gdr_id'] = $gdr_id;

        $info = Db("point_goods_dt_record")->alias("pgdr")
            ->where($where)
            ->field("pgp.gp_stock,pgp.gp_id,pg.g_limited,pgdr.gdr_membernum")
            ->join('pai_point_goods pg', 'pgdr.g_id=pg.g_id', 'left')
            ->join('pai_point_goods_product pgp', 'pgp.g_id=pg.g_id', 'left')
            ->find();

        $gp_stock = 0; // 初始化库存
        $g_limited = 0; // 初始化拍品设置的用户最大拍买数量
        $gdr_membernum = 0; // 初始化拍品折扣的成团人数

        if(empty($info)){
            return ['status'=>0, 'msg'=>"拍品不存在！"];
        }

        if (!empty($info['gp_stock'])) {
            $gp_stock = $info['gp_stock'];
        }
        if (!empty($info['g_limited'])) {
            $g_limited = $info['g_limited'];
        }
        if (!empty($info['gdr_membernum'])) {
            $gdr_membernum = $info['gdr_membernum'];
        }
        $gp_id = $info['gp_id'];
        $max_pai_num = $g_limited;

        // 判断当前参拍期数
        $where_pai = [];
        $where_pai['gdr_id'] = $gdr_id;
        if(!$periods){
            $call_periods = $this->createPeriods($gdr_id);
            if(!$call_periods['status']){
                return $call_periods;
            }
            $periods = $call_periods['data'];
        }

        // 1.判断当前用户已下单的数量 和 拍品限购
        $where_pai = '';
        $where_pai['m_id'] = $m_id;
        $where_pai['gp_id'] = $gp_id;
        $where_pai['o_periods'] = $periods;
        $my_pai_num = $this->countPaiNum($where_pai);

        if ($max_pai_num > $my_pai_num) {
            $max_pai_num = $max_pai_num - $my_pai_num;
        } else {
            $max_pai_num = 0;
        }

        // 2.判断所有用户下单数量 和 判断折扣剩余份数

        $where_pai['m_id'] = $m_id;
        $where_pai['gp_id'] = $gp_id;
        $where_pai['o_periods'] = $periods;
        $total_pai_num = $this->countPaiNum($where_pai);
        $left_gdr_membernum = $gdr_membernum - $total_pai_num;
        if($left_gdr_membernum < $max_pai_num){
            $max_pai_num = $left_gdr_membernum;
        }

        // 3.判断库存
        if ($gp_stock < 1) {
            $max_pai_num = 0;
        }

        $data['left_max_pai_num'] = $max_pai_num;
        $data['gdr_membernum'] = $gdr_membernum;
        $data['g_limited'] = $g_limited;
        $data['gp_stock'] = $gp_stock;
        return ['status' => 1, 'msg' => 'success！', 'data' => $data];
    }


    /**
     * 积分订单支付
     * @param $o_id 积分订单编号
     * @param $m_id 用户id
     * @param $pwd 支付密码（md5之后的）
     * @return array
     */
    public function order_pay($o_id, $m_id, $pwd)
    {
        if (!$o_id || !$m_id || !$pwd) {
            return ['status' => 0, 'msg' => '非法请求！'];
        }

        // 用户信息
        $member = new MemberService();
        $mem_info = $member->get_info(['m_id' => $m_id]);
        $m_money = $mem_info['m_money']; // 账号资金
        $m_payment_pwd = $mem_info['m_payment_pwd']; // 会员支付密码
        $m_name = $mem_info['m_name'];
        $m_levelid = $mem_info['m_levelid'];
        $popularity = $mem_info['popularity'];//人气值。
        // 判断支付密码
        if ($pwd != $m_payment_pwd) {
            // 支付错误日志。。。TODO。。。

            // 支付错误的配置信息
            $res1 = Db("config")->where(['c_code'=>'PIN_PAY'])->find();
            $max_error_num = 5;
            if(!empty($res1)){
                $max_error_num = $res1['c_value'];
            }
            $res2 = Db("config")->where(['c_code'=>'ACCT_FROZEN'])->find();
            $max_frozen_time = 6;
            if(!empty($res2)){
                $max_frozen_time = $res2['c_value'];
            }
            $pwd_error_num = Cookie::get("pwd_error_num");
            if(!$pwd_error_num){
                $pwd_error_num = 1;
            }else{
                $pwd_error_num++;
            }
            Cookie::set("pwd_error_num",$pwd_error_num);
            if($pwd_error_num < $max_error_num){
                return ['status' => 2, 'msg' => "密码输入错误".$pwd_error_num."次，输错5次账号将会被冻结".$max_frozen_time."小时！"];
            }else{
                $frozen_time = Cookie::get("frozen_time");
                if(!$frozen_time){
                    $frozen_time = time();
                    Cookie::set("frozen_time",$frozen_time);
                }
                $ltfe_time = $frozen_time + 6*60*60 - time();
                if($ltfe_time>0){
                    $lefthour = $this->Sec2Time($ltfe_time);
                    return ['status' => 2, 'msg' => "密码输入错误次数过多，请".$lefthour."后重试！"];
                }
            }
        }
        Cookie::delete("pwd_error_num");
        Cookie::delete("frozen_time");
        // 积分订单详情
        $pointOrderpai = new pointOrderPaiService();
        $orderInfo = $pointOrderpai->pointOrderPaiInfo(['o_id' => $o_id]);
        if (empty($orderInfo)) {
            return ['status' => 0, 'msg' => '服务器繁忙，积分订单信息不见了！'];
        }
        if ($orderInfo['o_paystate'] > 1) {
            return ['status' => 0, 'msg' => '这笔积分订单已经付过钱了哦！'];
        }

        // 商品详情
        $gp_id = $orderInfo['gp_id'];
        $gdr_id = $orderInfo['gdr_id'];
        $point_goods_product = new PointGoodsProductService();
        $where_discount['pgp.gp_id'] = $gp_id;
        $where_discount['pgdr.gdr_id'] = $gdr_id;
        $goods_info = $point_goods_product->getGoodsDiscountInfo($where_discount);
        if (empty($goods_info)) {
            return ['status' => 0, 'msg' => '支付商品已下架！', 'data' => $goods_info];
        }
        $g_name = $goods_info['g_name'];//商品名称
        $gdt_name = $goods_info['gdt_name'];//几折拍
        $g_img = $goods_info['g_img'];//商品图片
        $g_id = $goods_info['g_id'];//商品
        $gp_stock = $goods_info['gp_stock'];// 库存

        // 判断库存
        if( $gp_stock < 0 ){
            return ['status' => 0, 'msg' => '对不起亲！这件商品已经被别人抢走了~', 'data' => $gp_stock];
        }

        $num = $orderInfo['gp_num']; //购买数量
        $gdr_membernum = $goods_info['gdr_membernum']; //折扣的成团人数
        $g_limited = $goods_info['g_limited']; //单人的购买受限数

        // 判断受限次数
        $max_pai_num = $pointOrderpai->get_max_pai_num($m_id, $gp_id);
        if ($num > $max_pai_num) {
            return ['status' => 0, 'msg' => '宝贝数量不足，请重新下单！'];
        }

        // 判断支付
        $o_totalmoney = $orderInfo['o_totalmoney'];
        if ($m_money < $o_totalmoney) {
            return ['status' => 0, 'msg' => '资金不足，请充值！'];
        }

        // 判断抽奖期数
        $periodsInfo = $pointOrderpai->createPeriods($gdr_id);
        if (!$periodsInfo['status']) {
            return ['status' => 0, 'msg' => $periodsInfo['msg']];

        }
        $periods = $periodsInfo['data'];

        // 退款、转花生的比例参数
        $config = new ConfigService();
        $con_peanut_info = $config->configInfo(['c_code'=>'PEANUT']);
        $peanut_rate = 0.05;//默认值
        if(!empty($con_peanut_info) && !empty($con_peanut_info['c_value'])){
            $peanut_rate = $con_peanut_info['c_value'];
        }

        // 人气活动: 产生人气转化率
        $pop_rate_info = $config->configInfo(['c_code'=>'POP_RATE']);
        $pop_rate = 0.1;//默认值
        if(!empty($pop_rate_info)){
            $pop_rate = $pop_rate_info['c_value'];
        }


        // 积分订单处理 （事务：扣费 -> 更新point_order_pai表 -> 生成抽奖码）
        Db::startTrans();
        try {

            // 1.扣费
            $newdata_mem['m_money'] = $m_money - $o_totalmoney;
            $where_mem['m_id'] = $m_id;
            $save1 = Db::table('pai_member')->where($where_mem)->update($newdata_mem);
            // 判断是否扣费成功
            if (!$save1) {
                throw new \Exception("扣费失败！");
            }

            // 2.更新point_order_pai表
            $where_point_order = [];
            $where_point_order['o_id'] = $o_id;
            $order_data['o_paytype'] = 3;//支付方式：余额支付
            $order_data['o_paystate'] = 2;//支付状态 1待付款，2已付款
            $order_data['o_paytime'] = time();//支付时间
            $order_data['o_periods'] = $periods;//拍品期数
            $order_data['gs_id'] = $goods_info['g_typeid'];//商品特殊属性
            $order_data['o_paymoney'] = $o_totalmoney;//支付金额
            $save2 = Db::table("pai_point_order_pai")->where($where_point_order)->update($order_data);
            // 2-1判断积分订单是否更新成功
            if (!$save2) {
                throw new \Exception("积分订单更新失败！");
            }

            // 记录扣款日志
            if($o_id){
                $money_log['ml_type'] = 'reduce';
                $money_log['ml_reason'] = '积分订单付款';
                $money_log['ml_table'] = 6;
                $money_log['ml_money'] = $o_totalmoney;
                $money_log['money_type'] = 1;
                $money_log['nickname'] = $m_name;
                $money_log['position'] = $m_levelid;
                $money_log['member_type'] = 1;
                $money_log['income_type'] = 2;
                $money_log['add_time'] = time();
                $money_log['from_id'] = $o_id;
                $money_log['m_id'] = $m_id;
                $log_id = Db::table('pai_money_log')->insertGetId($money_log);
            }

            // pop1.人气活动 产生人气
            $add_pop = $pop_rate * $o_totalmoney;
            $max_add_pop = 100 - $popularity;
            if($add_pop > $max_add_pop){
                $add_pop = $max_add_pop;
            }
            if($add_pop){
                $res = Db("member")->where(['m_id'=>$m_id])->setInc('popularity',$add_pop);
                if(!$res){
                    throw new \Exception("数据库繁忙，人气添加失败！");
                }

                // pop2.人气值日志
                $data_log['pl_type'] = "add";
                $data_log['pl_num'] = $add_pop;
                $data_log['pl_time'] = time();
                $data_log['m_id'] = $m_id;
                $data_log['pl_reason'] = "人气值自动更新";
                $log_id = Db("popularity_log")->insertGetId($data_log);
            }

            // 2-2 判断积分订单是否免手续费
            $calback = $pointOrderpai->is_notip($o_id);
            if(!$calback['status']){
                throw new \Exception($calback['msg']);
            }
            $o_is_no_tip = $calback['data'];
            if($o_is_no_tip == 2){
                $where_point_order = [];
                $where_point_order['o_id'] = $o_id;
                $save3 = Db::table("pai_point_order_pai")->where($where_point_order)->update(['o_is_no_tip'=>$o_is_no_tip]);
                if(!$save3){
                    throw new \Exception("数据库繁忙，积分订单免手续费状态更新失败！");
                }
            }

            // 3.生成抽奖码
            $point_order_awardcode = new PointOrderAwardcodeService();
            $awardcode = $point_order_awardcode->getAwardcode($o_id);
            if(!$awardcode['status']){
                throw new \Exception($awardcode['msg']);
            }

            $arr_awardcode = $awardcode['data'];
            if(empty($arr_awardcode)){
                throw new \Exception("积分订单错误！生成幸运码失败鸟~'");
            }
            $add_all = $point_order_awardcode->pointOrderAwardcodeAddAll($arr_awardcode);
            if(!$add_all){
                throw new \Exception("系统繁忙");
            }

            // 4.判断并产生幸运码
            // 已参团人数
            $where_sum = [];
            $where_sum['gdr_id'] = $gdr_id;// 折id
            $where_sum[ 'o_periods'] = $periods;// 期数
            $sum_gp_num = Db('point_order_awardcode')->where($where_sum)->count();
            if($sum_gp_num >= $gdr_membernum){
                // 开始抽奖
                $now_time = time();

                // 幸运数字
                $luck_id = $now_time % $sum_gp_num + 1;
                $data['luck_id'] = $luck_id;

                $where_luck = [];
                $where_luck['oa_number'] = $luck_id;
                $where_luck['gdr_id'] = $gdr_id;
                $where_luck['o_periods'] = $periods;
                $luck_info = Db('point_order_awardcode')->where($where_luck)->find();
                if(empty($luck_info)){
                    throw new \Exception("gdr_id：".$gdr_id."o_periods:".$periods."中拍号码:".$luck_id."中拍信息不存在！");
                }

                $luck_oa_id = $luck_info['oa_id']; // 中拍码id
                $luck_o_id = $luck_info['o_id']; // 积分订单id
                $luck_gp_id = $luck_info['gp_id'];// 拍品id

                //4-1.更新中拍码状态
                $where_point_awardcode = [];
                $where_point_awardcode['gdr_id'] = $gdr_id;// 折id
                $where_point_awardcode[ 'o_periods'] = $periods;// 期数
                $res1 = Db('point_order_awardcode')->where($where_point_awardcode)->update(['oa_state'=>3]);
                $res2 = Db('point_order_awardcode')->where(['oa_id'=>$luck_oa_id])->update(['oa_state'=>2]);
                // 判断中拍码状态更新成功
                if (!$res1 || !$res2) {
                    throw new \Exception("中拍码状态更新失败！");
                }

                // 4-2.更新积分订单状态
                $where_point_order = [];
                $where_point_order['gdr_id'] = $gdr_id;
                $where_point_order['o_periods'] = $periods;
                $where_point_order['o_state'] = 1;
                $where_point_order['o_paystate'] = 2;
                $res3 = Db('point_order_pai')->where($where_point_order)->update(['o_state'=>10,'o_paystate'=>3]);
                $res4 = Db('point_order_pai')->where(['o_id'=>$luck_o_id])->update(['o_state'=>2]);
                // 判断积分订单码状态更新成功
                if (!$res3 || !$res4) {
                    $luck_info = Db('point_order_pai')->where(['o_id'=>$luck_o_id])->find();
                    if(!empty($luck_info) && $luck_info['o_state'] != 2){
                        throw new \Exception("积分订单码状态更新失败！");
                    }
                }

                // 发送抽奖信息
                $systemMsg = new SystemMsgService();
                // 中拍信息
                $luck_order_info = Db("point_order_pai")->where(['o_id'=>$luck_o_id])->find();
                $msg_data['sm_addtime'] = time();//系统消息添加时间
                $msg_data['sm_display'] = 2;//2中拍消息
                $msg_data['sm_title'] = "参拍结果信息";//消息标题
                $msg_data['sm_brief'] = "恭喜您！您的参拍积分订单号为：".$luck_order_info['o_sn']."的积分订单抽中拍品啦！";//消息简介
                $msg_data['sm_content'] = "恭喜您！您在商品：'".$g_name."'的'".$gdt_name."'活动中的第'".$periods."'期摘得奖品，本期中拍数字为 ".$luck_id;//消息内容
                $msg_data['sm_img'] = $g_img;//图片(商品等简介图片)
                $msg_data['g_id'] = $g_id;//商品ID
                $msg_data['shop_price'] = $luck_order_info['o_money'] + $luck_order_info['o_deliverfee'];//商品价格 + 运费
                $msg_data['o_id'] = $luck_order_info['o_id'];//积分订单ID
                $msg_data['to_mid'] = $luck_order_info['m_id'];//收消息人ID
                $res = $systemMsg->add_msg($msg_data);

                //未中拍信息
                $where_msg = $where_point_order;
                $where_msg['o_state'] = 10;
                $where_msg['o_paystate'] = ['gt',2];//退款状态
                $msg_order_list = Db("point_order_pai")->where($where_msg)->select();
                if(!empty($msg_order_list)){
                    foreach($msg_order_list as $vo){
                        $msg_data['sm_addtime'] = time();//系统消息添加时间
                        $msg_data['sm_display'] = 2;//2中拍消息
                        $msg_data['sm_title'] = "参拍结果信息";//消息标题
                        $msg_data['sm_brief'] = "好遗憾啊！您的参拍积分订单号为：".$vo['o_sn']."的积分订单与奖品擦肩而过！";//消息简介
                        $msg_data['sm_content'] = "很遗憾！您在商品：'".$g_name."'的'".$gdt_name."'活动中的第'".$periods."'期参拍中未能摘得奖品，本期中拍数字为 ".$luck_id;//消息内容
                        $msg_data['sm_img'] = $g_img;//图片(商品等简介图片)
                        $msg_data['g_id'] = $g_id;//商品ID
                        $msg_data['shop_price'] = $vo['o_money'] + $vo['o_deliverfee'];//商品价格 + 运费
                        $msg_data['o_id'] = $vo['o_id'];//积分订单ID
                        $msg_data['to_mid'] = $vo['m_id'];//收消息人ID
                        $res = $systemMsg->add_msg($msg_data);
                    }
                }

                // 4-3.更新库存
                $where_gp['gp_id'] = $luck_gp_id;
                $res5 = Db('point_goods_product')->where($where_gp)->setDec('gp_stock',1); // 拍品库存减1
                // 判断是否扣库存成功
                if (!$res5) {
                    throw new \Exception("拍品库存更新失败！");
                }

                // 5.本期中拍结果统计并退款
                $where_state3['gdr_id'] = $gdr_id;
                $where_state3['o_periods'] = $periods;
                $where_state3['o_paystate'] = 3;
                $where_state3['o_state'] = 10;
                $list_state3 = Db("point_order_pai")->where($where_state3)->select();

                $where_state2['gdr_id'] = $gdr_id;
                $where_state2['o_periods'] = $periods;
                $where_state2['o_state'] = 2;// 中拍积分订单
                $list_state2 = Db("point_order_pai")->where($where_state2)->find();
                if(!empty($list_state2) && $list_state2['gp_num'] > 1){
                    $o_money = $list_state2['o_money'];
                    $o_deliverfee = $list_state2['o_deliverfee'];
                    $list_state2['o_totalmoney'] = $list_state2['o_totalmoney'] - $o_money - $o_deliverfee;
                    $list_state3[] = $list_state2;
                }

                foreach($list_state3 as $v){
                    $o_id = $v['o_id'];
                    $m_id = $v['m_id'];
                    $o_sn = $v['o_sn'];
                    $o_money = $v['o_money'];
                    $gp_num = $v['gp_num'];
                    $o_totalmoney = $v['o_totalmoney'];
                    $o_money = $v['o_money'];
                    $o_deliverfee = $v['o_deliverfee'];
                    $o_state = $v['o_state'];
                    $o_is_no_tip = $v['o_is_no_tip'];
                    if($o_is_no_tip == 2){
                        $peanut_rate = 0;
                    }

                    // 1.退款日志
                    $refund_momey = round($o_totalmoney*(1-$peanut_rate),2);//积分订单退款
                    $refund_peanut = round($o_totalmoney*$peanut_rate,2);// 积分订单的手续费（转换为花生）


                    $refund['refund_time'] = time();
                    $refund['m_id'] = $m_id;
                    $refund['refund_money'] = $refund_momey;
                    $refund['refund_success_time'] = time();
                    $refund['refund_state'] = 8;
                    $refund['refund_fromid'] = $o_id;
                    $refund_id = Db("refund")->insertGetId($refund);


                    // 2.生成money_log日志
                    if($refund_id){
                        $money_log['ml_type'] = 'add';
                        //$money_log['ml_reason'] = "来自积分订单：".$o_sn."拍卖的退款";
                        $money_log['ml_reason'] = "未拍中自动退款";
                        $money_log['ml_table'] = 4;
                        $money_log['ml_money'] = $refund_momey;
                        $money_log['money_type'] = 1;
                        $money_log['nickname'] = $m_name;
                        $money_log['position'] = $m_levelid;
                        $money_log['add_time'] = time();
                        $money_log['from_id'] = $refund_id;
                        $money_log['m_id'] = $m_id;
                        $log_id = Db("money_log")->insertGetId($money_log);
                    }

                    // 3.返款到用户表
                    Db("member")->where(['m_id'=>$m_id])->setInc('m_money',$refund_momey);

                    // 4.返还花生
                    if($refund_peanut > 0){
                        $peanut_log['pl_num'] = $refund_peanut;
                        $peanut_log['pl_time'] = time();
                        $peanut_log['from_id'] = $o_id;
                        $peanut_log['pl_type'] = 'add';
                        $peanut_log['pl_state'] = 8;
                        $peanut_log['pl_mid'] = $m_id;
                        $plog_id = Db("peanut_log")->insertGetId($peanut_log);

                        // 5.返花生到用户表
                        Db("member")->where(['m_id'=>$m_id])->setInc('peanut',$refund_peanut);
                    }

                    // 6.更新用户积分订单和中拍码状态
                    Db("point_order_pai")->where(['o_id'=>$o_id])->update(['o_paystate'=>4]);

                    // 7.判断是否是首次下积分订单
                    $callback = $this->if_myfirstorder($m_id);
                    if(!$callback['status']){
                        throw new \Exception($callback['msg']);
                    }

                    // 8.更新下单用户的经验
                    if($o_state == 2){
                        $exp = floor($o_totalmoney + $o_money + $o_deliverfee);//真正的下单金额 一元对应一经验
                    }else{
                        $exp = floor($o_totalmoney);//一元对应一经验
                    }

                    $res = Db::table('pai_member')->where(['m_id' => $m_id])->setInc('experience', $exp);
                    if(!$res){
                        throw new \Exception("用户m_id:".$m_id."的经验添加失败");
                    }

                    // 9.查询我的的经验 并 判断用户是否首次升级
                    $info = Db::table('pai_member')->where(['m_id' => $m_id])->find();
                    $m_name = $info['m_name'];
                    $m_mobile = $this->decrypt($mem_info['m_mobile']);//手机号
                    $m_secret_mobile = substr($m_mobile,0,3)."****".substr($m_mobile,7,4);
                    $tj_mid = $info['tj_mid'];
                    $m_levelid = $info['m_levelid'];

                    $callback = $this->mem_levelup($m_id,$o_id);
                    if(!$callback['status']){
                        throw new \Exception($callback['msg']);
                    }
                }
            }

            // 执行提交操作
            Db::commit();
            return ['status' => 1, 'msg' => '扣费成功！'];
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();

            // 错误日志
            $error_data['el_type_id'] = 1;
            $error_data['el_description'] = $e->getMessage();
            $error_data['m_id'] = $m_id;
            $error_data['el_time'] = time();
            Db::table('pai_error_log')->data($error_data)->insert();

            // 获取提示信息
            return ['status' => 0, 'msg' => $e->getMessage()];
        }
    }

    /**
     * 秒转换小时 分钟 秒
     * @param $time
     * @return string
     */
    function Sec2Time($time)
    {
        $value = array(
            "hours" => 0,
            "minutes" => 0,
            "seconds" => 0
        );

        if (is_numeric($time)) {

            if ($time >= 3600) {
                $value["hours"] = floor($time / 3600);
                $time = ($time % 3600);
            }
            if ($time >= 60) {
                $value["minutes"] = floor($time / 60);
                $time = ($time % 60);
            }
            $value["seconds"] = floor($time);
        }

        $t = $value["hours"] . "小时" . $value["minutes"] . "分" . $value["seconds"] . "秒";
        Return $t;
    }


    /**
     * 积分订单详情页数据
     * 刘勇豪
     * @param $o_id 积分订单编号
     * @return array
     */
    public function order_info_page($o_id)
    {

        if (!$o_id) {
            return ['status' => 0, 'msg' => "id参数错误！"];
        }

        $where['po.o_id'] = $o_id;
        $info = $this->getMoreInfo($where);

        $o_addtime = $info['o_addtime'];

        // 支付状态1待付款，2已付款，3退款中，4退款完成
        $o_paystate = $info['o_paystate'];

        // 积分订单状态1参拍中，2已中拍，3已发货，4已签收，5待评价，6交易完成，10未中拍
        $o_state = $info['o_state'];

        // 剩余支付时间
        $live_paytime = $o_addtime + 24 * 60 * 60 - time();
        $liva_date = $this->Sec2Time($live_paytime);

        $info['live_paytime'] = $live_paytime; //剩余支付时间
        $info['liva_date'] = $liva_date; // 剩余支付时间（格式化）

        $info['o_mobile_secret'] = substr($info['o_mobile'], 0, 3) . "****" . substr($info['o_mobile'], 7, 4);

        // 中拍揭晓时间
        $call_publish = $this->get_pai_publish_time($info['gdr_id'], $info['o_periods']);
        $publish_time = 0;
        if($call_publish['status']){
            $publish_time = $call_publish['data'];
        }
        $info['o_publishtime'] = $publish_time;

        return ['status' => 1, 'msg' => "success !", 'data' => $info];
    }

    /**
     * @param $gdr_id
     * @param $o_periods
     * @return float 2位小数,百分比*100
     */
    public function get_pointOrderpai_rate($gdr_id, $o_periods)
    {

        $where['gdr_id'] = $gdr_id;
        $where['o_periods'] = $o_periods;

        $sum_gp_num = Db('point_order_awardcode')->where($where)->count();
        $sum_gp_num = intval($sum_gp_num);

        $gdr_membernum = Db('point_goods_dt_record')
            ->where(['gdr_id' => $gdr_id])
            ->value('gdr_membernum');
        $gdr_membernum = intval($gdr_membernum);

        $rate = round($sum_gp_num * 100 / $gdr_membernum, 1);
        if ($rate > 100) {
            $rate = 100;
        }

        return $rate;
    }

    /**
     * 分页查询积分订单详细列表（point_order_pai,member）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function orderLimitList($where = '', $order = 'po.o_id asc', $field = '*', $limit = "0,5", $cache = 'point_order_pai')
    {
        $limit_list = $this->pointOrderPai->getOrderLimitList($where, $order, $field, $limit, $cache = 'point_order_pai');
        return $limit_list;
    }


    /**
     * 检查并生成幸运码
     * 创建人 刘勇豪
     * @param $gdr_id
     * @param $o_periods
     * @return array
     */
    public function set_luck_awardcode($gdr_id, $o_periods)
    {
        if (!$gdr_id || !$o_periods) {
            return ['status' => 0, 'msg' => "参数错误！"];
        }

        $data = []; //成功的返回信息

        // $m_id
        $m_id = Cookie::get("m_id");
        $mem = new MemberService();
        $m_id = $mem->decrypt($m_id); //解密账号id
        $m_id = str_replace('abcde', '', $m_id); //删除多余字符

        // 设置的折 对应的人数
        $gdr_membernum = Db("point_goods_dt_record")->where(['gdr_id' => $gdr_id])->value("gdr_membernum");

        // 已参团人数
        $where_sum['gdr_id'] = $gdr_id; // 折id
        $where_sum['o_periods'] = $o_periods; // 期数
        $sum_gp_num = Db('point_order_awardcode')->where($where_sum)->count();

        $data['m_id'] = $m_id;
        $data['gdr_id'] = $gdr_id;
        $data['o_periods'] = $o_periods;
        $data['sum_gp_num'] = $sum_gp_num;
        $data['gdr_membernum'] = $gdr_membernum;

        if ($sum_gp_num >= $gdr_membernum) {
            // 开始抽奖
            $now_time = time();

            // 幸运数字
            $luck_id = $now_time % $sum_gp_num;
            $data['luck_id'] = $luck_id;

            $where_luck['oa_number'] = $luck_id;
            $where_luck['gdr_id'] = $gdr_id;
            $where_luck['o_periods'] = $o_periods;
            $luck_info = Db('point_order_awardcode')->where($where_luck)->find();
            if (empty($luck_info)) {
                // 错误日志
                $error_data['el_type_id'] = 1;
                $error_data['el_description'] = "gdr_id：" . $gdr_id . "o_periods:" . $o_periods . "中拍号码:" . $luck_id . "中拍信息不存在！";
                $error_data['m_id'] = $m_id;
                $error_data['el_time'] = time();
                Db::table('pai_error_log')->data($error_data)->insert();
                return ['status' => 0, 'msg' => "中拍号码不存在！", 'data' => $data];
            }

            $oa_id = $luck_info['oa_id']; // 中拍码id
            $o_id = $luck_info['o_id']; // 积分订单id
            $gp_id = $luck_info['gp_id']; // 拍品id

            Db::startTrans();
            try {
                //1.更新中拍码状态
                $where_point_awardcode['gdr_id'] = $gdr_id; // 折id
                $where_point_awardcode['o_periods'] = $o_periods; // 期数
                $res1 = Db('point_order_awardcode')->where($where_point_awardcode)->update(['oa_state' => 3]);
                $res2 = Db('point_order_awardcode')->where(['oa_id' => $oa_id])->update(['oa_state' => 2]);
                // 判断中拍码状态更新成功
                if (!$res1 || !$res2) {
                    throw new \Exception("中拍码状态更新失败！");
                }

                // 2.更新积分订单状态
                $where_point_order['gdr_id'] = $gdr_id;
                $where_point_order['o_periods'] = $o_periods;
                $where_point_order['o_state'] = 1;
                $res3 = Db('point_order_pai')->where($where_point_order)->update(['o_state' => 10]);
                $res4 = Db('point_order_awardcode')->where(['o_id' => $o_id])->update(['o_state' => 2]);
                // 判断积分订单码状态更新成功
                if (!$res3 || !$res4) {
                    throw new \Exception("积分订单码状态更新失败！");
                }

                // 3.更新库存
                $where_gp['gp_id'] = $gp_id;
                $res5 = Db('point_goods_product')->where($where_gp)->setDec('gp_stock', 1); // 拍品库存减1
                // 判断是否扣费成功
                if (!$res5) {
                    throw new \Exception("拍品库存更新失败！");
                }

                // 执行提交操作
                Db::commit();
                return ['status' => 8, 'msg' => '本期中拍信息已产生！', 'data' => $data];
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();

                // 错误日志
                $error_data['el_type_id'] = 1;
                $error_data['el_description'] = $e->getMessage();
                $error_data['m_id'] = $m_id;
                $error_data['el_time'] = time();
                Db::table('pai_error_log')->data($error_data)->insert();

                // 获取提示信息
                return ['status' => 0, 'msg' => $e->getMessage()];
            }
        }
        return ['status' => 1, 'msg' => "本期抽奖名额没满，不能抽奖 !", 'data' => $data];
    }

    /**
     * @param $m_id:用户id
     * @param $from_id:收益来源id如果是提成收益，收益具体积分订单ID
     * @return mixed
     */
    public function mem_levelup($m_id,$from_id=0){
        $mem_info = Db("member")->where(["m_id"=>$m_id])->find();

        if(empty($mem_info)){
            return ['status'=>1,'msg'=>"用户".$m_id."的信息不存在",'data'=>''];
        }

        $tj_mid = $mem_info['tj_mid'];// 推荐上级ID
        $m_name = $mem_info['m_name'];// 会员名
        $m_mobile = $this->decrypt($mem_info['m_mobile']);//手机号
        $m_secret_mobile = substr($m_mobile,0,3)."****".substr($m_mobile,7,4);
        $m_type = $mem_info['m_type'];// 账号类型0为普通会员，1为商家会员（以后会用）
        $m_levelid = $mem_info['m_levelid'];// 用户等级ID
        $experience = $mem_info['experience'];// 经验值

        // 只查大于当前等级的等级列表
        $where_level['ml_id'] = ['gt', $m_levelid];
        $levellist = Db('member_level')->where($where_level)->order('ml_id asc')->select();
        $new_ml_id = $m_levelid;
        if (!empty($levellist)) {
            foreach ($levellist as $v) {
                $ml_tj1 = $v['ml_tj1'];
                $ml_tj2 = $v['ml_tj2'];
                if ($experience >= $ml_tj1 && $experience < $ml_tj2) {
                    $new_ml_id = $v['ml_id'];
                    break;
                }
            }
        }

        // 当用户升级
        if ($new_ml_id > $m_levelid) {
            // 1.更新用户等级
            $data_update['m_levelid'] = $new_ml_id;
            $res = Db::table('pai_member')->where(['m_id' => $m_id])->update($data_update);

            // 判断用户是否是首次升级 并且 是否有上级
            if($m_levelid < 2 && $tj_mid){
                $p_mem_info = Db("member")->where(["m_id"=>$tj_mid])->find();
                $p_level_id = $p_mem_info['m_levelid'];


                // 2.判断有无上级，和上级的等级
                $p_mem_info = Db("member")->where(["m_id"=>$tj_mid])->find();
                if(!empty($p_mem_info)){
                    $p_level_id = $p_mem_info['m_levelid'];
                    $p_tj_mid = $p_mem_info['tj_mid'];

                    $where_plevel = '';
                    $where_plevel['ml_id'] = $p_level_id;
                    $p_level_info = Db("member_level")->where($where_plevel)->find();

                    $ml_first_levelup_exp = 0;
                    $ml_first_levelup_profit1 = 0;
                    if(!empty($p_level_info)){
                        $ml_first_levelup_exp = $p_level_info['ml_first_levelup_exp'];
                        $ml_first_levelup_profit1 = $p_level_info['ml_first_levelup_profit1'];
                    }

                    // 上级获得经验
                    if($ml_first_levelup_exp){
                        $res = Db::table('pai_member')->where(['m_id' => $tj_mid])->setInc('experience', $ml_first_levelup_exp);
                        if(!$res){
                            return ['status'=>0,'msg'=>'数据库繁忙，首次升级经验计算失败!'];
                        }
                    }

                    // 上级获得收益
                    if($ml_first_levelup_profit1){
                        // 4.收益日志
                        Db::table('pai_member')->where(['m_id' => $tj_mid])->setInc('m_income', $ml_first_levelup_profit1);
                        $data_income['i_time'] = time();
                        $data_income['i_typeid'] = 2;
                        $data_income['m_id'] = $tj_mid;
                        $data_income['i_state'] = 8;
                        $data_income['i_money'] = $ml_first_levelup_profit1;
                        $data_income['i_reason'] = '来自下级账号{'.$m_secret_mobile."}的首次等级提升收益";
                        $data_income['i_from_mid'] = $m_id;
                        $data_income['i_from_id'] = $from_id;
                        $income_id = Db::table('pai_income')->insertGetId($data_income);
                        if($income_id){
                            // 5.金钱日志
                            $money_log['ml_type'] = 'add';
                            $money_log['ml_reason'] = "下级等级提升收益";
                            $money_log['ml_table'] = 3;
                            $money_log['ml_money'] = $ml_first_levelup_profit1;
                            $money_log['money_type'] = 2;
                            $money_log['nickname'] = $p_mem_info['m_name'];
                            $money_log['position'] = $p_level_id;
                            $money_log['member_type'] = $m_type + 1;
                            $money_log['income_type'] = 2;
                            $money_log['add_time'] = time();
                            $money_log['from_id'] = $income_id;
                            $money_log['m_id'] = $tj_mid;
                            $log_id = Db::table('pai_money_log')->insertGetId($money_log);
                        }
                    }

                    // 判断上上级是否存在
                    if($p_tj_mid){
                        $pp_mem_info = Db("member")->where(["m_id"=>$p_tj_mid])->find();
                        if(!empty($pp_mem_info)){
                            $pp_level_id = $pp_mem_info['m_levelid'];
                            $pp_tj_mid = $pp_mem_info['tj_mid'];

                            $where_pplevel = '';
                            $where_pplevel['ml_id'] = $pp_level_id;
                            $pp_level_info = Db("member_level")->where($where_pplevel)->find();

                            $ml_first_levelup_profit2 = 0;
                            if(!empty($pp_level_info)){
                                $ml_first_levelup_profit2 = $pp_level_info['ml_first_levelup_profit2'];
                            }

                            if($ml_first_levelup_profit2){
                                // 4.收益日志
                                Db::table('pai_member')->where(['m_id' => $p_tj_mid])->setInc('m_income', $ml_first_levelup_profit2);
                                $data_income['i_time'] = time();
                                $data_income['i_typeid'] = 2;
                                $data_income['m_id'] = $p_tj_mid;
                                $data_income['i_state'] = 8;
                                $data_income['i_money'] = $ml_first_levelup_profit2;
                                $data_income['i_reason'] = '来自下下级账号{'.$m_secret_mobile."}的首次等级提升收益";
                                $data_income['i_from_mid'] = $m_id;
                                $data_income['i_from_id'] = $from_id;
                                $income_id = Db::table('pai_income')->insertGetId($data_income);
                                if($income_id){
                                    // 5.金钱日志
                                    $money_log['ml_type'] = 'add';
                                    $money_log['ml_reason'] = "下下级首次等级提升收益";
                                    $money_log['ml_table'] = 3;
                                    $money_log['ml_money'] = $ml_first_levelup_profit2;
                                    $money_log['money_type'] = 2;
                                    $money_log['nickname'] = $pp_mem_info['m_name'];
                                    $money_log['position'] = $pp_level_id;
                                    $money_log['member_type'] = $m_type + 1;
                                    $money_log['income_type'] = 2;
                                    $money_log['add_time'] = time();
                                    $money_log['from_id'] = $income_id;
                                    $money_log['m_id'] = $p_tj_mid;
                                    $log_id = Db::table('pai_money_log')->insertGetId($money_log);
                                }
                            }
                        }
                    }
                }
            }
        }

        $back['m_id'] = $m_id;
        $back['levelid'] = $m_levelid;
        return ['status'=>8,'msg'=>'success!','data'=>$back];
    }


    /**
     * 判断用户首次升级
     * @param $m_id
     * @param int $from_id
     * @return array
     */
    public function mem_first_levelup($m_id,$from_id=0){

        // 参拍用户信息
        $mem_info = Db("member")->where(["m_id"=>$m_id])->find();
        if(empty($mem_info)){
            return ['status'=>0,'msg'=>"用户".$m_id."的信息不存在",'data'=>''];
        }

        $tj_mid = $mem_info['tj_mid'];// 推荐上级ID
        $m_name = $mem_info['m_name'];// 会员名
        $m_mobile = $this->decrypt($mem_info['m_mobile']);//手机号
        $m_secret_mobile = substr($m_mobile,0,3)."****".substr($m_mobile,7,4);
        $m_type = $mem_info['m_type'];// 账号类型0为普通会员，1为商家会员（以后会用）
        $m_levelid = $mem_info['m_levelid'];// 用户等级ID
        $experience = $mem_info['experience'];// 经验值

        if($m_levelid > 1){
            return ['status'=>1,'msg'=>"此用户的升级收益已经发放过了哟~"];
        }





    }

    /**
     * 判断是否第一次下单，
     * 第一次下单要给我的上一家推荐人
     * @param $m_id
     * @return array
     */
    public function if_myfirstorder($m_id){
        $where_find['m_id'] = $m_id;
        $where_find['o_paystate'] = ['gt',1];
        $list = Db("point_order_pai")->field("o_id")->where($where_find)->limit("2")->select();

        if(count($list) == 1){
            $first_oid = $list[0]['o_id'];
            $mem_info = Db("member")->where(['m_id'=>$m_id])->find();
            if(empty($mem_info)){
                return ['status'=>0,'msg'=>"下单账号信息不存在！"];
            }
            $tj_mid = $mem_info['tj_mid'];
            $m_mobile = $this->decrypt($mem_info['m_mobile']);//手机号
            $m_secret_mobile = substr($m_mobile,0,3)."****".substr($m_mobile,7,4);
            $m_name = $mem_info['m_name'];
            $m_levelid = $mem_info['m_levelid'];
            // 如果有上一级
            if($tj_mid){
                // 查看上一级的等级详情
                $p_mem_info = Db::table('pai_member')->alias("m")
                    ->join('pai_member_level ml', 'ml.ml_id = m.m_levelid', 'left')
                    ->where(['m.m_id'=>$tj_mid])
                    ->find();
                $ml_newbuyer_exp = 1;//默认 新推荐会员并拍购的多少经验/人
                if(!empty($p_mem_info) && !empty($p_mem_info['ml_newbuyer_exp'])){
                    $ml_newbuyer_exp = $p_mem_info['ml_newbuyer_exp'];
                }
                // 增加经验值
                $res = Db::table('pai_member')->where(['m_id' => $tj_mid])->setInc('experience', $ml_newbuyer_exp);
                if(!$res){
                    return ['status'=>0,'msg'=>"来自账号{".$m_mobile."}的首次参拍经验收益添加失败了"];
                }
            }
        }
        return ['status'=>8,'msg'=>"首次参拍收益已产生!", 'data'=>$m_id];
    }


    /**
     * 参拍者数量统计
     * 刘勇豪
     * @param $gp_id
     * @param int $gdr_id
     * @param int $o_periods
     * @return array
     */
    public function count_paier($gp_id,$gdr_id=0,$o_periods=0){
        if(!$gp_id){
            return ['status'=>0,'msg'=>"参数错误"];
        }

        $where['gp_id'] = $gp_id;
        if($gdr_id){
            $where['gdr_id'] = $gdr_id;
        }
        if($o_periods){
            $where['o_periods'] = $o_periods;
        }
        $where['oa_state'] = ['lt',4];//废弃的除外
        $count_awardcode = Db("point_order_awardcode")->where($where)->count("oa_id");// 已参拍人次

        // 剩余参拍人次
        $where_gdr["pgp.gp_id"] = $gp_id;
        if($gdr_id){
            $where_gdr["pgdr.gdr_id"] = $gdr_id;
        }
        $gdr_list = Db('point_goods_dt_record')->alias("pgdr")
            ->join('pai_point_goods_product pgp', 'pgp.g_id = pgdr.g_id', 'left')
            ->where($where_gdr)
            ->select();

        if(empty($gdr_list)){
            return ['status'=>0,'msg'=>"商品折扣不存在"];
        }

        $total_left_num = 0;
        $maxPeriods_str = '';
        foreach($gdr_list as $k=>$v){
            $v_gdr_id = $v['gdr_id'];
            $v_gdr_membernum = $v['gdr_membernum'];
            $maxPeriods = $this->createPeriods($v_gdr_id);

            $where_count['gdr_id'] = $v_gdr_id;
            $where_count['o_periods'] = $maxPeriods['data'];
            $this_count_awardcode = Db("point_order_awardcode")->where($where_count)->count("*");// 已参拍人次

            $this_left_num = $v_gdr_membernum - $this_count_awardcode;
            if($this_left_num < 0){
                $this_left_num = 0;
            }
            $total_left_num += $this_left_num;
            $maxPeriods_str .= $maxPeriods['data'];
        }

        $data['count_awardcode'] = $count_awardcode;
        $data['total_left_num'] = $total_left_num;


        return ['status'=>8,'msg'=>"success !", 'data'=>$data];
    }

    /**
     * 根据$gp_id查找所有gdr_id
     * 刘勇豪
     * @param $gp_id
     * @return array
     */
    public function get_gdrlist_by_gpid($gp_id){
        $point_goods_product = Db("point_goods_product")->where(['gp_id'=>$gp_id])->find();
        if(empty($point_goods_product)){
            return ['status'=>0, 'msg'=>"拍品不存在"];
        }
        $g_id = $point_goods_product['g_id'];

        $list = Db("point_goods_dt_record")->alias("pgdr")
            ->join('pai_point_goods_discounttype gdt', 'gdt.gdt_id = pgdr.gdt_id', 'left')
            ->where(['pgdr.g_id'=>$g_id])
            ->order('pgdr.gdt_id asc')
            ->select();

        if(empty($list)){
            return ['status'=>0, 'msg'=>"当前拍品没有设置参拍折扣", "data"=>$list];
        }
        foreach($list as $k=>$v){
            $gdr_id = $v['gdr_id'];
            $call_reatePeriods = $this->createPeriods($gdr_id);
            if(!$call_reatePeriods['status']){
                return ['status'=>0, 'msg'=>$call_reatePeriods['msg']];
            }
            $list[$k]['createPeriods'] = $call_reatePeriods['data'];
        }

        return ['status'=>1, 'msg'=>"success ！", "data"=>$list];
    }

    /**
     * 分页查询积分订单详细列表（point_order_pai,point_goods_product,goods,store）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     *
     * 备注：o_paystate、o_addtime，gdr_id,o_periods是必须的
     */
    public function get_order_detail_limit_list($where = '', $order = 'po.o_id desc', $field = '*', $limit = "0,5", $cache = 'point_order_pai')
    {
        $list = Db($this->cache)->alias("po")
            ->field($field)
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = po.gp_id', 'left')
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->join('pai_store s', 's.store_id = pg.g_storeid', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();

        // 待支付积分订单保留时间
        $res = Db("config")->where(['c_code'=>'PO_UNPAID'])->find();
        $max_pay_time = 24;
        if(!empty($res1)){
            $max_pay_time = $res['c_value'];
        }

        if(!empty($list)){
            foreach($list as $k=>$v){
                // 幸运码数量
                $where_count['o_id'] = $v['o_id'];
                $pai_num = $this->countPaiNum($where_count);
                $list[$k]['pai_num'] = $pai_num;

                // 积分订单是否关闭
                $is_close = 0;

                if($v['o_paystate'] == 1 && $v['o_addtime'] < ( time() - $max_pay_time * 60 * 60 )){
                    $is_close = 1;
                }
                $list[$k]['is_close'] = $is_close;

                //参拍揭晓时间（当期最后下单时间）
                $gdr_id = $v['gdr_id'];
                $o_periods = $v['o_periods'];
                $call_publish = $this->get_pai_publish_time($gdr_id, $o_periods);
                $publish_time = 0;
                if($call_publish['status']){
                    $publish_time = $call_publish['data'];
                }
                $list[$k]['o_publishtime'] = $publish_time;

            }
        }
        return $list;
    }

    /**
     * 统计分页查询积分订单详细列表总条数
     * 刘勇豪
     * @param string $where
     * @return int|string
     */
    public function get_order_detail_count($where = ''){
        $total = 0;
        $count = Db($this->cache)->alias("po")
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = po.gp_id', 'left')
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->join('pai_store s', 's.store_id = pg.g_storeid', 'left')
            ->where($where)
            ->count();
        if($count){
            $total = $count;
        }
        return $total;
    }
    /**
     * 卖家分页查询积分订单详细列表（point_order_pai,point_goods_product,goods,store,member）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     *
     * 备注：o_paystate、o_addtime，gdr_id,o_periods是必须的
     */
    public function seller_order_detail_limit_list($where = '', $order = 'po.o_id desc', $field = '*', $limit = "0,5", $cache = 'point_order_pai')
    {
        $list = Db($this->cache)->alias("po")
            ->field($field)
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = po.gp_id', 'left')
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->join('pai_store s', 's.store_id = po.store_id', 'left')
            ->join('pai_member m', 'm.m_id = s.m_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();

        if(!empty($list)){
            foreach($list as $k=>$v){
                // 幸运码数量
                $where_count['o_id'] = $v['o_id'];
                $pai_num = $this->countPaiNum($where_count);
                $list[$k]['pai_num'] = $pai_num;

                //参拍揭晓时间（当期最后下单时间）
                $gdr_id = $v['gdr_id'];
                $o_periods = $v['o_periods'];
                $call_publish = $this->get_pai_publish_time($gdr_id, $o_periods);
                $publish_time = 0;
                if($call_publish['status']){
                    $publish_time = $call_publish['data'];
                }
                $list[$k]['o_publishtime'] = $publish_time;

                // 中奖者信息
                $pointOrderAwardcode = new PointOrderAwardcodeService();
                $awards_mem_info = $pointOrderAwardcode->get_awards_mem($gdr_id,$o_periods);

                $award_m_avatar = '';//中奖者头像
                $award_m_name = '';//中奖者名称
                $award_m_name_secret = '';//中奖者名称保密
                if(!empty($awards_mem_info) && !empty($awards_mem_info['m_name_secret'])){
                    $award_m_avatar = $awards_mem_info['m_avatar'];//中奖者头像
                    $award_m_name = $awards_mem_info['m_name'];//中奖者名称
                    $award_m_name_secret = $awards_mem_info['m_name_secret'];//中奖者名称保密
                }
                $list[$k]['award_m_avatar'] = $award_m_avatar;
                $list[$k]['award_m_name'] = $award_m_name;
                $list[$k]['award_m_name_secret'] = $award_m_name_secret;
            }
        }
        return $list;
    }
    /**
     * 统计卖家分页查询积分订单详细列表条数
     * 刘勇豪
     * @param string $where
     * @return int|string
     */
    public function seller_order_detail_count($where = ''){
        $total = 0;
        $count = Db($this->cache)->alias("po")
            ->join('pai_point_goods_product pgp', 'pgp.gp_id = po.gp_id', 'left')
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->join('pai_store s', 's.store_id = po.store_id', 'left')
            ->join('pai_member m', 'm.m_id = s.m_id', 'left')
            ->where($where)
            ->count();
        if($count){
            $total = $count;
        }
        return $total;
    }

    /**
     * 我卖出的页面获取数据
     * 刘勇豪
     * @param int $m_id
     * @param int $page
     * @param int $size
     * @param int $i
     * @param string $keyword
     * @return array
     */
    public function get_sell_list_page($m_id=0,$page=1,$size=5,$i=0,$keyword=''){

        if(!$m_id){
            return ['status' => 0, 'msg' => '参数错误', 'data' => ''];
        }
        $where['s.m_id'] = $m_id;
        if($keyword){
            $where['pg.g_name'] = ['like','%'.$keyword.'%'];
        }
        //积分订单状态 0全部 1待发货 2已发货 3待结算 4退款售后
        switch ($i)
        {
            case 0:
                // 全部
                $where['po.o_paystate'] = ['gt','1'];
                $where['po.o_state'] = ['in','2,,3,4,5'];
                break;
            case 1:
                // 待发货
                $where['po.o_paystate'] = ['gt','1'];
                $where['po.o_state'] = 2;
                break;
            case 2:
                // 已发货
                $where['po.o_paystate'] = ['gt','1'];
                $where['po.o_state'] = ['in','3,4'];
                break;
            case 3:
                // 已完成
                $where['po.o_paystate'] = ['gt','1'];
                $where['po.o_state'] = 5;
                break;
//            case 4:
//                // 退款售后
//                $where['po.o_paystate'] = ['in','3,4'];
//                break;
            default:
                // 全部
                $where['po.o_paystate'] = ['gt','1'];
                $where['po.o_state'] = ['in','2,,3,4,5'];
                break;
        }

        $order='po.o_id desc';
        $field = "po.o_id,po.store_id,po.o_money,po.o_paystate,po.o_state,po.gp_id,po.gp_num,po.o_addtime,po.o_paytime,po.o_totalmoney,po.gdr_id,po.o_periods,po.o_isdelete,po.o_gp_settlement_price,pgp.gp_market_price,pgp.g_id,pgp.gp_img,pg.g_name,pg.g_endtime";

        $limit = (($page-1) * $size).','.$size;
        $list = $this->seller_order_detail_limit_list($where,$order,$field,$limit);
        if(empty($list)){
            return ['status' => 0, 'msg' => '没有数据', 'data' => $list];
        }

        foreach($list as $k => $v){
            $g_id = $v['g_id'];
            $min_price = 0;
            $max_price = 0;
            $res_min = Db("point_goods_dt_record")->where(['g_id'=>$g_id])->order("gdr_price asc")->find();
            $res_max = Db("point_goods_dt_record")->where(['g_id'=>$g_id])->order("gdr_price desc")->find();
            if(!empty($res_min)){
                $min_price = $res_min['gdr_price'];
            }
            if(!empty($res_max)){
                $max_price = $res_max['gdr_price'];
            }
            $list[$k]['min_price'] = $min_price;
            $list[$k]['max_price'] = $max_price;
        }
        // 统计总条数
        $total_num = $this->get_order_detail_count($where);
        return ['status' => 1, 'msg' => 'success', 'data' => $list,'total_num'=>$total_num];
    }


    /**
     * 确认积分订单
     * 刘勇豪
     * @param $o_id
     * @param $m_id
     * @return array
     */
    public function confirm_order($o_id,$m_id){
        if(!$o_id && !$m_id){
            return ['status'=>0,'msg'=>'缺少参数'];
        }

        $order_info = Db($this->cache)->where(['o_id'=>$o_id])->find();
        if(empty($order_info)){
            return ['status'=>0,'msg'=>'积分订单信息不存在！'];
        }

        if($order_info['m_id'] != $m_id){
            return ['status'=>0,'msg'=>'积分订单用户不匹配！'];
        }

        $store_id = $order_info['store_id'];//店铺id
        $o_money = $order_info['o_money'];//积分订单折拍单价
        $o_deliverfee = $order_info['o_deliverfee'];// 积分订单运费
        $o_sn = $order_info['o_sn'];// 积分订单sn

        $store_goodsmoney = $o_money + $o_deliverfee;// 转给商家的货款

        // 事务
        Db::startTrans();
        try{
            // 1.给商家货款
            $res1 = Db("store")->where(['store_id'=>$store_id])->setInc('store_goodsmoney',$store_goodsmoney);
            if(!$res1){
                throw new \Exception("货款到账失败！");
            }
            // 2.记录货款日志
            $store_goodsmoney_log['sgml_goodsmoney'] = $store_goodsmoney;
            $store_goodsmoney_log['sgml_addtime'] = time();
            $store_goodsmoney_log['sgml_from_id'] = $o_id;
            $store_goodsmoney_log['sgml_type'] = 'add';
            $store_goodsmoney_log['sgml_reason'] = "来自积分订单：".$o_sn."的签收货款！";
            $store_goodsmoney_log['sgml_state'] = 8;
            $store_goodsmoney_log['sgml_store_id'] = $store_id;
            $log_id = Db("store_goodsmoney_log")->insertGetId($store_goodsmoney_log);
            if(!$log_id){
                throw new \Exception("系统繁忙，日志生成失败！");
            }

            // 3.更新积分订单状态
            $res = Db($this->cache)->where(['o_id'=>$o_id])->update(['o_state'=>4]);
            if(!$res){
                $o_state = Db($this->cache)->where(['o_id'=>$o_id])->value("o_state");
                if($o_state != 4){
                    return ['status'=>0,'msg'=>'系统繁忙，请稍后再试！'];
                }
            }

            // 执行提交操作
            Db::commit();
            return ['status' => 1, 'msg' => '积分订单签收成功！'];
        }catch(\Exception $e){
            // 回滚事务
            Db::rollback();
            // 错误日志
            $error_data['el_type_id'] = 1;
            $error_data['el_description'] = $e->getMessage();
            $error_data['m_id'] = $m_id;
            $error_data['el_time'] = time();
            Db::table('pai_error_log')->data($error_data)->insert();

            // 获取提示信息
            return ['status' => 0, 'msg' => $e->getMessage()];
        }


        return ['status'=>1,'msg'=>'积分订单签收成功','data'=>$res];
    }

    /**
     * 删除积分订单
     * 刘勇豪
     * @param $o_id
     * @param $m_id
     * @return array
     */
    public function delete_order($o_id,$m_id){
        if(!$o_id && !$m_id){
            return ['status'=>0,'msg'=>'缺少参数'];
        }

        $order_info = Db($this->cache)->where(['o_id'=>$o_id])->find();
        if(empty($order_info)){
            return ['status'=>0,'msg'=>'积分订单信息不存在！'];
        }

        if($order_info['m_id'] != $m_id){
            return ['status'=>0,'msg'=>'积分订单用户不匹配！'];
        }

        $res = Db($this->cache)->where(['o_id'=>$o_id])->update(['o_isdelete'=>3]);
        if(!$res){
            $o_state = Db($this->cache)->where(['o_id'=>$o_id])->value("o_isdelete");
            if($o_state != 3){
                return ['status'=>0,'msg'=>'系统繁忙，请稍后再试！'];
            }
        }
        return ['status'=>1,'msg'=>'删除成功！','data'=>$res];
    }

    /**
     * 取消积分订单
     * 刘勇豪
     * @param $o_id
     * @param $m_id
     * @return array
     */
    public function cancel_order($o_id,$m_id){
        if(!$o_id && !$m_id){
            return ['status'=>0,'msg'=>'缺少参数'];
        }

        $order_info = Db($this->cache)->where(['o_id'=>$o_id])->find();
        if(empty($order_info)){
            return ['status'=>0,'msg'=>'积分订单信息不存在！'];
        }

        if($order_info['m_id'] != $m_id){
            return ['status'=>0,'msg'=>'积分订单用户不匹配！'];
        }

        $res = Db($this->cache)->where(['o_id'=>$o_id])->update(['o_isdelete'=>2]);
        if(!$res){
            $o_state = Db($this->cache)->where(['o_id'=>$o_id])->value("o_isdelete");
            if($o_state != 2){
                return ['status'=>0,'msg'=>'系统繁忙，请稍后再试！'];
            }
        }
        return ['status'=>1,'msg'=>'积分订单取消成功！','data'=>$res];
    }

    /**
     * 参拍揭晓时间，最后下单时间
     * 刘勇豪
     * @param $gdr_id
     * @param $operiods
     * @return array
     */
    public function get_pai_publish_time($gdr_id,$operiods){
        $publish_time = 0;
        if(!$gdr_id || !$operiods){
            return ['status'=>0,'msg'=>'参数错误！'];
        }

        $where['poa.gdr_id'] = $gdr_id;
        $where['poa.o_periods'] = $operiods;
        //$where['poa.oa_state'] = 2;
        $info = Db("point_order_awardcode")->alias("poa")
            ->where($where)
            ->join('pai_point_order_pai o', 'po.o_id = poa.o_id', 'left')
            ->order("poa.oa_id desc")
            ->find();
        if(empty($info)){
            return ['status'=>0,'msg'=>'本期参拍中拍信息还没有产生！'];
        }

        $publish_time = $info['o_paytime'];
        return ['status'=>1,'msg'=>'本期参拍中拍时间已经产生！','data'=>$publish_time];
    }


    /**
     *
     * @param int $o_id
     * @return array
     */
    public function new_logistics_page($o_id=0){

        if(!$o_id){
            return ['status'=>0,'msg'=>'参数错误！'];
        }

        $where["po.o_id"] = $o_id;
        $info = $this->order_detail($where);
        if(empty($info)){
            return ['status'=>0,'msg'=>'没有数据！','data'=>$info];
        }

        return ['status'=>1,'msg'=>'success ！','data'=>$info];
    }

    /**
     * 积分订单详情
     * 刘勇豪
     * @param $where
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function order_detail($where, $field="*"){
        $info = Db("point_order_pai")->alias("po")
            ->join('pai_point_goods_product pgp', 'po.gp_id = pgp.gp_id', 'left')
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->join('pai_point_point_goods_dt_record pgdr', 'pgdr.gdr_id = po.gdr_id', 'left')
            ->join('pai_point_goods_discounttype pgdt', 'pgdt.gdt_id = pgdr.gdt_id', 'left')
            ->join('pai_store s', 's.store_id = po.store_id', 'left')
            ->where($where)
            ->field($field)
            ->find();
        return $info;
    }

    /**
     * 根据条件group统计
     * 邓赛赛
     */
    public function get_group_count($where=[],$field='*',$group){
        $list =Db('point_order_pai')->where($where)
            ->field($field)
            ->group($group)
            ->select();
        return $list;
    }

    /**
     * 买家添加物流信息的表单验证
     * 刘勇豪
     * @param $data
     * @return array
     */
    public function check_logistics($data){
        // 积分订单id
        if(!isset($data['o_id']) || empty($data['o_id'])){
            return ['status'=>0,'msg'=>"缺少积分订单信息!"];
        }

        // 物流id
        if(!isset($data['express_corid']) || empty($data['express_corid'])){
            return ['status'=>0,'msg'=>"请填写物流信息!"];
        }

        // 物流信息
        if(!isset($data['express_way']) || empty($data['express_way'])){
            return ['status'=>0,'msg'=>"请填写物流信息!"];
        }

        // 快递单号
        if(!isset($data['express_num']) || empty($data['express_num'])){
            return ['status'=>0,'msg'=>"请填写快递单号!"];
        }

        // 卖家姓名
        if(!isset($data['seller_name']) || empty($data['seller_name'])){
            return ['status'=>0,'msg'=>"请填卖家姓名!"];
        }

        // 联系电话
        if(!isset($data['seller_mobile']) || empty($data['seller_mobile'])){
            return ['status'=>0,'msg'=>"请填联系电话!"];
        }

        if(!preg_match('/^1[3-9][0-9]{9}$|^0\d{2,3}-?\d{7,8}$/',$data['seller_mobile'])){
            return ['status'=>0,'msg'=>"联系电话格式错误!"];
        }

        return ['status'=>1,'msg'=>"ok!"];
    }

    /**
     * 卖家发货（填写快递单）
     * 刘勇豪
     * @param $data
     * @return array
     *
     * 备注：
     * o_id ：积分订单id （必填字段）
     * express_corid ：快递公司id （必填字段）
     * express_way ：快递公司名称（必填字段）
     * express_num ：快递单号（必填字段）
     * seller_name ：卖家姓名（必填字段）
     * seller_mobile ：卖家联系方式（必填字段）
     * express_img：卖家发货图片（选填）
     */
    public function new_logistics_post($data){

        $call_back = $this->check_logistics($data);
        if(!$call_back['status']){
            return $call_back;
        }

        $o_id = $data['o_id'];
        $express_corid = $data['express_corid'];
        $express_way = trim($data['express_way']);
        $express_num = $data['express_num'];
        $seller_name = $data['seller_name'];
        $seller_mobile = $data['seller_mobile'];
        $express_img = empty($data['express_img'])?[]:$data['express_img'];

        $new_data = [];
        $new_data['o_state'] = 3;//已发货
        $new_data['o_express_corid'] = $express_corid;//快递公司ID
        $new_data['o_express_way'] = $express_way;//快递名称
        $new_data['o_express_num'] = $express_num;//快递单号
        $new_data['o_seller_name'] = $seller_name;//卖家姓名
        $new_data['o_seller_mobile'] = $seller_mobile;//卖家联系方式
        $res1 = Db("point_order_pai")->where(['o_id'=>$o_id])->update($new_data);
        if(!$res1){
            $o_state = Db("point_order_pai")->where(['o_id'=>$o_id])->value('o_state');
            if(!$o_state || $o_state != 3){
                return ['status'=>0,'msg'=>"系统繁忙，请稍后重试!",'data'=>''];
            }
        }

        if(!empty($data['express_img']) && is_array($data['express_img']) ){
            $data['express_img'] = array_values(array_filter($data['express_img']));
            $imgs = $this->pointOrderPai->ba64_img($data['express_img'],'express_img',300,300);
        }else{
            $imgs[0]='';
        }
        if(!empty($imgs[0])){
            foreach($imgs as $k =>$v){
                $data_img[$k]['oli_oid'] = $o_id;
                $data_img[$k]['oli_img'] = $v;
            }
            $add = Db("point_order_logistics_img")->insertAll($data_img);
            if(!$add){
                return ['status'=>0,'msg'=>"系统繁忙，图片保存不成功!",'data'=>''];
            }
        }
        return ['status'=>1,'msg'=>"物流信息填写成功！",'data'=>$new_data];
    }

    /**
     * 积分订单物流信息
     * 刘勇豪
     * @param string $where
     * @param string $field
     * @return array
     */
    public function order_logistics_info($where = '', $field = ''){
        $info = Db("point_order_pai")->where($where)->find();
        if(empty($info)){
            return ['status'=>0,'msg'=>"积分订单信息不存在!",'data'=>''];
        }

        $info['data_img'] = [];
        $img_info = Db("order_logistics_img")->where(['oli_oid'=>$info['o_id']])->limit('4')->select();
        $info['data_img'] = $img_info;
        return ['status'=>1,'msg'=>"ok!",'data'=>$info];
    }

    /**判断积分订单是否是当天第3次（动态配置）或联系7天（动态配置）之后的积分订单
     * 刘勇豪
     * @param int $o_id
     * @return array
     */
    public function is_notip($o_id=0){
        if(!$o_id){
            return ['status'=>0,'msg'=>"参数错误"];
        }
        $order_info = Db("point_order_pai")->where(['o_id'=>$o_id])->find();
        if(empty($order_info)){
            return ['status'=>0,'msg'=>"积分订单信息不存在"];
        }
        $o_paystate = $order_info['o_paystate'];
        $o_paytime = $order_info['o_paytime'];
        $m_id = $order_info['m_id'];

        if($o_paystate < 2){
            return ['status'=>0,'msg'=>"积分订单未支付，不能参与计算！"];
        }

        $day = date("Y-m-d",$o_paytime);
        $start_time = strtotime($day);
        $end_time = $start_time + 24 * 60 * 60 -1;

        // 当天连续几次参拍后的参拍不收手续费（次）
        $no_tip_time = 3;//默认值
        $db_no_tid_time = Db("config")->where(["c_code"=>"NO_TIP_TIME"])->value("c_value");
        if($db_no_tid_time){
            $no_tip_time = $db_no_tid_time;
        }
        $where_count['o_paystate'] = ['gt',1];
        $where_count['o_paytime'] = ['between',$start_time.",".$end_time];
        $where_count['m_id'] = $m_id;
        $db_count = Db("point_order_pai")->where($where_count)->count();

        $today_pai_num = 0;//设置默认值
        if($db_count){
            $today_pai_num = $db_count;
        }

        $is_no_tip = 1;

        if($today_pai_num > $no_tip_time){
            $is_no_tip = 2;
        }else{
            // 统计是否是连续7天之后下的积分订单
            $no_tip_days = 7;
            $db_no_tid_days = Db("config")->where(["c_code"=>"NO_TIP_DAYS"])->value("c_value");
            if($db_no_tid_days){
                $no_tip_days = $db_no_tid_days;
            }
            $call_back = $this->is_every_day($m_id, $o_paytime, $no_tip_days);
            if(!$call_back['status']){
                return $call_back;
            }
            $is_no_tip = $call_back['data'];
        }

        return ['status'=>1,'msg'=>"ok", 'data'=>$is_no_tip];

    }

    /**
     * 统计是否是连续7天之后下的积分订单
     * 刘勇豪
     * @param int $m_id
     * @param int $o_paytime
     * @param int $no_tip_days
     * @return array
     */
    public function is_every_day($m_id=0, $o_paytime=0, $no_tip_days=7){
        if(!$m_id || !$o_paytime){
            return ['status'=>0,'msg'=>'参数错误'];
        }

        $is_every_day = 2;//默认是每天都下单了
        $o_paytime = $o_paytime - 86400;


        $day = date("Y-m-d",$o_paytime);
        $start_time = strtotime($day);
        $end_time = $start_time + 24 * 60 * 60 -1;

        $where_count['o_paystate'] = ['gt',1];
        $where_count['o_paytime'] = ['between',$start_time.",".$end_time];
        $where_count['m_id'] = $m_id;
        $find = Db("point_order_pai")->where($where_count)->find();
        if(empty($find)){
            $is_every_day = 1;
            return ['status'=>1,'msg'=>'没有连续下单','data'=>$is_every_day];
        }

        if($no_tip_days > 1){
            $no_tip_days--;
            return $this->is_every_day($m_id,$o_paytime,$no_tip_days);
        }
        return ['status'=>1,'msg'=>'连续下单','data'=>$is_every_day];
    }

    /**
     * 判断拍品是不是自己发布的
     * 刘勇豪
     * @param int $gp_id
     * @param int $m_id
     * @return array
     */
    public function is_my_goods($gp_id=0,$m_id=0){
        if(!$gp_id){
            return ['status'=>0,'msg'=>'参数错误！'];
        }

        $where['pgp.gp_id'] = $gp_id;
        $gp_info = Db("point_goods_product")->alias("gp")
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->where($where)
            ->find();

        if(empty($gp_info)){
            return ['status'=>0,'msg'=>'拍品不存在！'];
        }

        $g_mid = $gp_info['g_mid'];

        if($g_mid == $m_id){
            return ['status'=>0,'msg'=>'您不能参拍您自己发布的商品哦~'];
        }

        return ['status'=>1,'msg'=>'这是别人发布的商品，可以购买！~'];
    }

}