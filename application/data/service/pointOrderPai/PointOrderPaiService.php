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

namespace app\data\service\pointOrderPai;

use app\data\model\pointOrderPai;
use app\data\model\pointOrderPai\PointOrderPaiModel as PointOrderPaiModel;
use app\data\service\goods\GoodsService;
use app\data\service\pointGoods\PointGoodsProductService;
use app\data\service\member\MemberService as MemberService;
use app\data\service\pointOrderAwardcode\PointOrderAwardcodeService as PointOrderAwardcodeService;
use app\data\service\config\ConfigService as ConfigService;
use app\data\service\system_msg\SystemMsgService as SystemMsgService;
use app\data\service\pointGoods\PointGoodsService;
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
     * 拍一拍积分订单分页查询
     * 创建人 刘勇豪
     * 时间 2018-08-29 10:51:00
     */
    public function getOrderInfoLimit($where = '', $field = '*', $order = "o_id asc", $page = 15)
    {
        $list = $this->pointOrderPai->getInfoList($where, $field, $order, $page, $this->cache);
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
     * 判断指定拍品的当前最高期数
     * 创建人 刘勇豪
     * @param $gp_id 积分商品id
     * @return array
     */
    public function maxPeriods($gp_id)
    {
        $periods = 0;
        $error_msg = '';

        if (!$gp_id) {
            return ['status' => 0, 'msg' => "参数有误！"];
        }

        $where_pai['gp_id'] = $gp_id; // 指定商品id
        $where_pai['o_paystate'] = ['gt',1]; // 已付款
        $last_order = Db("point_order_pai")->where($where_pai)->order("o_periods desc")->find();
        if (!empty($last_order)) {
            $periods = $last_order['o_periods'];
        }
        return ['status' => 1, 'msg' => "ok！", 'data' => $periods];
    }

    /**
     * 获取指定拍品的设定成团人数
     * 创建人 刘勇豪
     * @param $gp_id
     * @return int
     */
    public function getPeopleNum($gp_id=0)
    {
        $num = 0;
        $where['pgp.gp_id'] = $gp_id;
        $info = Db::table("pai_point_goods")->alias("pg")
            ->join('pai_point_goods_product pgp', 'pgp.g_id = pg.g_id', 'left')
            ->where($where)
            ->find();
        if (!empty($info)) {
            $num = $info['g_peoplenumber'];
        }
        return $num;
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

    /**判断并生成新下订单的期数
     * 创建人 刘勇豪
     *
     * @param $gp_id 拍品的折扣
     * @return array
     */
    public function createPeriods($gp_id)
    {
        $periods = 1;
        if (!$gp_id) {
            return ['status' => 0, 'msg' => "参数有误！"];
        }

        // 最大期数
        $res = $this->maxPeriods($gp_id);
        if ($res['status'] == 0) {
            return ['status' => 0, 'msg' => $res['msg']];
        }
        $maxPeriods = $res['data'];

        // 拍品设置的单品每期成团人次
        $peopleNum = $this->getPeopleNum($gp_id);

        // 计算期数
        if ($maxPeriods != 0) {
            $periods = $maxPeriods;
            $where_award['gp_id'] = $gp_id; //指定拍品
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
     * 获取指定拍品当前期的用户剩余最大购买量
     * 创建人 刘勇豪
     * @param int $m_id 用户id
     * @param int $gp_id 拍品折扣id。
     * @param int $periods 拍品折扣id。(如果没有指定就是获取最新一期的)
     * @return array|int
     */
    public function get_max_pai_num_bygpid($m_id=0, $gp_id = 0,$periods = 0)
    {
        $max_pai_num = 0; //初始值

        // 1.查询库存
        // 2.查询拍品设置的用户最大拍买数量
        $where['pgp.gp_id'] = $gp_id;

        $info = Db("point_goods_product")->alias("pgp")
            ->where($where)
            ->field("pgp.gp_stock,pgp.gp_id,pg.g_limited,pg.g_peoplenumber,pg.g_limited")
            ->join('pai_point_goods pg', 'pgp.g_id=pg.g_id', 'left')
            ->find();

        $gp_stock = 0; // 初始化库存
        $g_limited = 0; // 初始化拍品设置的用户最大拍买数量
        $g_peoplenumber = 0; // 初始化拍品折扣的成团人数

        if(empty($info)){
            return ['status'=>0, 'msg'=>"拍品不存在！"];
        }

        if (!empty($info['gp_stock'])) {
            $gp_stock = $info['gp_stock'];
        }
        if (!empty($info['g_limited'])) {
            $g_limited = $info['g_limited'];
        }
        if (!empty($info['g_peoplenumber'])) {
            $g_peoplenumber = $info['g_peoplenumber'];
        }
        $max_pai_num = $g_limited;

        // 当前期数
        $where_pai = [];
        $where_pai['gp_id'] = $gp_id;
        if(!$periods){
            $call_periods = $this->createPeriods($gp_id);
            if(!$call_periods['status']){
                return $call_periods;
            }
            $periods = $call_periods['data'];
        }

        // 1.判断当前用户本期已下单的数量 和 拍品限购
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
        $where_pai = '';
        $where_pai['o_periods'] = $periods;
        $where_pai['gp_id'] = $gp_id;
        $total_pai_num = $this->countPaiNum($where_pai);
        $left_gp_membernum = $g_peoplenumber - $total_pai_num;
        if($left_gp_membernum < $max_pai_num){
            $max_pai_num = $left_gp_membernum;
        }

        $data['left_max_pai_num'] = $max_pai_num;
        $data['g_peoplenumber'] = $g_peoplenumber;
        $data['g_limited'] = $g_limited;
        $data['gp_stock'] = $gp_stock;
        $data['my_pai_num'] = $my_pai_num;
        $data['periods'] = $periods;
        $data['total_pai_num'] = $total_pai_num;

        // 3.判断库存
        if ($gp_stock < 1) {
            $max_pai_num = 0;
            $data['left_max_pai_num'] = $max_pai_num;
            return ['status' => 0, 'msg' => '该商品已售完！', 'data' => $data];
        }
        return ['status' => 1, 'msg' => 'success！', 'data' => $data];
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
        $gp_info = Db("point_goods_product")->alias("pgp")
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

    /**
     * 订单支付
     * @param $o_id 订单编号
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
        $syumem_info = $member->get_syumem_info(['m_id' => $m_id]);

        if(empty($syumem_info)){
            return ['status' => 0, 'msg' => '您不是晟域会员哦！'];
        }
        $tui_diamond = $syumem_info['tui_diamond']; // 账号资金
        $m_payment_pwd = $mem_info['m_payment_pwd']; // 会员支付密码
        $m_name = $mem_info['m_name'];
        $m_levelid = $mem_info['m_levelid'];
        $tj_mid = $mem_info['tj_mid'];// 推荐m_id

        // 上级详情
        $tj_syumem_info = [];
        if($tj_mid){
            $tj_syumem_info = $member->get_syumem_info(['m_id' => $m_id]);
        }

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
        // 订单详情
        $orderInfo = $this->pointOrderPaiInfo(['o_id' => $o_id]);
        if (empty($orderInfo)) {
            return ['status' => 0, 'msg' => '服务器繁忙，订单信息不见了！'];
        }
        if ($orderInfo['o_paystate'] > 1) {
            return ['status' => 0, 'msg' => '这笔订单已经付过钱了哦！'];
        }

        // 商品详情
        $gp_id = $orderInfo['gp_id'];
        $goods_product = new PointGoodsProductService();
        $where = '';
        $where['pgp.gp_id'] = $gp_id; // 商品id
        $goods_info = $goods_product->getGoodsStoreInfo($where);

        if (empty($goods_info)) {
            return ['status' => 0, 'msg' => '支付商品已下架！', 'data' => $goods_info];
        }
        $g_name = $goods_info['g_name'];//商品名称
        $g_img = $goods_info['g_img'];//商品图片
        $g_id = $goods_info['g_id'];//商品
        $gp_stock = $goods_info['gp_stock'];// 库存

        // 判断库存
        if( $gp_stock < 1 ){
            return ['status' => 0, 'msg' => '对不起亲！这件商品已经被别人抢光了~', 'data' => $gp_stock];
        }

        $num = $orderInfo['gp_num']; //购买数量
        $g_peoplenumber = $goods_info['g_peoplenumber']; //成团人数
        $g_limited = $goods_info['g_limited']; //单人的购买受限数

        // 判断受限次数
        $max_pai_num = $this->get_max_pai_num_bygpid($m_id, $gp_id);
        if ($num > $max_pai_num) {
            return ['status' => 0, 'msg' => '宝贝数量不足，请重新下单！'];
        }

        // 判断支付
        $o_totalpoint = $orderInfo['o_totalpoint'];
        if ($tui_diamond < $o_totalpoint) {
            return ['status' => 0, 'msg' => '积分不足，请充值！'];
        }

        // 判断抽奖期数
        $periodsInfo = $this->createPeriods($gp_id);
        if (!$periodsInfo['status']) {
            return ['status' => 0, 'msg' => $periodsInfo['msg']];

        }
        $periods = $periodsInfo['data'];

        // 订单处理 （事务：扣费 -> 更新order_pai表 -> 生成抽奖码->未中奖退款->经验。。。）
        Db::startTrans();
        try {

            // 1.扣费
            $where_mem['m_id'] = $m_id;
            $save1 = Db::connect('db_syu')->name('member_content')->where($where_mem)->setDec('tui_diamond',$o_totalpoint);
            // 判断是否扣费成功
            if (!$save1) {
                throw new \Exception("扣费失败！");
            }

            // 2.更新order_pai表
            $where_order = [];
            $where_order['o_id'] = $o_id;
            $order_data['o_paytype'] = 4;//支付方式： 0未选择 4积分支付
            $order_data['o_paystate'] = 2;//支付状态 1待付款，2已付款
            $order_data['o_paytime'] = time();//支付时间
            $order_data['o_periods'] = $periods;//拍品期数
            $order_data['gs_id'] = $goods_info['g_typeid'];//商品特殊属性
            $order_data['o_paypoint'] = $o_totalpoint;//支付
            $save2 = Db::table("pai_point_order_pai")->where($where_order)->update($order_data);
            // 2-1判断订单是否更新成功
            if (!$save2) {
                throw new \Exception("订单更新失败！");
            }

            // 3.记录扣款日志
            if($o_id){
                $point_log['pl_num'] = $o_totalpoint;
                $point_log['pl_time'] = time();
                $point_log['from_id'] = $o_id;
                $point_log['pl_type'] = 'reduce';
                $point_log['pl_reason'] = '积分参团';
                $point_log['pl_state'] = 8;// 1 未完成 8完成
                $point_log['pl_mid'] = $m_id;
                $log_id = Db::connect('db_syu')->name('point_log')->insertGetId($point_log);
            }

            // 7.生成抽奖码
            $pointOrderAwardcode = new PointOrderAwardcodeService();
            $awardcode = $pointOrderAwardcode->getPointAwardcode($o_id);
            if(!$awardcode['status']){
                throw new \Exception($awardcode['msg']);
            }

            $arr_awardcode = $awardcode['data'];
            if(empty($arr_awardcode)){
                throw new \Exception("订单错误！生成幸运码失败鸟~'");
            }
            $add_all = $pointOrderAwardcode->pointOrderAwardcodeAddAll($arr_awardcode);
            if(!$add_all){
                throw new \Exception("数据库繁忙！");
            }

            // 8.判断并产生幸运码
            // 已参团人数
            $where_sum = [];
            $where_sum['gp_id'] = $gp_id;// 商品id
            $where_sum[ 'o_periods'] = $periods;// 期数
            $sum_gp_num = Db('point_order_awardcode')->where($where_sum)->count();
            $is_mem_full = 0;
            if($sum_gp_num >= $g_peoplenumber){
                $is_mem_full = 1;
                // 开始抽奖
                $now_time = time();
                $newNum = mt_rand(1,5);

                $mod = time()%2;
                if($mod){
                    $now_time = $now_time + $newNum;
                }else{
                    $now_time = $now_time - $newNum;
                }

                // 幸运数字
                $luck_id = $now_time % $sum_gp_num + 1;
                $data['luck_id'] = $luck_id;

                $where_luck = [];
                $where_luck['oa_number'] = $luck_id;
                $where_luck['o_periods'] = $periods;
                $where_luck['gp_id'] = $gp_id;
                $luck_info = Db('point_order_awardcode')->where($where_luck)->find();
                if(empty($luck_info)){
                    throw new \Exception("gp_id：".$gp_id."o_periods:".$periods."中拍号码:".$luck_id."中拍信息不存在！");
                }

                $luck_oa_id = $luck_info['oa_id']; // 中拍码id
                $luck_o_id = $luck_info['o_id']; // 订单id
                $luck_gp_id = $luck_info['gp_id'];// 拍品id

                // 幸运订单详情
                $luck_order_info = Db('point_order_pai')->where(['o_id'=>$luck_o_id])->find();
                if(empty($luck_order_info)){
                    throw new \Exception("gp_id：".$gp_id."o_periods:".$periods."中拍号码:".$luck_id."中拍订单不存在！");
                }

                //4-1.更新中拍码状态
                $where_awardcode = [];
                $where_awardcode['gp_id'] = $gp_id;// 折id
                $where_awardcode[ 'o_periods'] = $periods;// 期数
                $res1 = Db('point_order_awardcode')->where($where_awardcode)->update(['oa_state'=>3]);
                $res2 = Db('point_order_awardcode')->where(['oa_id'=>$luck_oa_id])->update(['oa_state'=>2]);

                //4-1-1.更新order_pai表付款时间
                $where_order = [];
                $where_order['o_id'] = $o_id;
                $order_data['o_paytime'] = $now_time;//支付时间
                Db::table("pai_point_order_pai")->where($where_order)->update($order_data);

                // 判断中拍码状态更新成功
                if (!$res1 || !$res2) {
                    throw new \Exception("中拍码状态更新失败！");
                }

                // 4-2.更新订单状态
                $where_order = [];
                $where_order['gp_id'] = $gp_id;
                $where_order['o_periods'] = $periods;
                $where_order['o_state'] = 1;
                $where_order['o_paystate'] = 2;
                $res3 = Db('point_order_pai')->where($where_order)->update(['o_state'=>10,'o_paystate'=>3]);

                if($luck_order_info['gp_num'] > 1){
                    $res4 = Db('point_order_pai')->where(['o_id'=>$luck_o_id])->update(['o_state'=>2,'o_publishtime'=>$now_time]);
                }else{
                    $res4 = Db('point_order_pai')->where(['o_id'=>$luck_o_id])->update(['o_state'=>2,'o_paystate'=>2,'o_publishtime'=>$now_time]);
                }

                // 判断订单码状态更新成功
                if (!$res3 || !$res4) {
                    $luck_info = Db('point_order_pai')->where(['o_id'=>$luck_o_id])->find();
                    if(!empty($luck_info) && $luck_info['o_state'] != 2){
                        throw new \Exception("订单码状态更新失败！");
                    }
                }

                // 发送中拍信息
                $systemMsg = new SystemMsgService();
                // 中拍信息
                $luck_order_info = Db("point_order_pai")->where(['o_id'=>$luck_o_id])->find();
                $msg_data['sm_addtime'] = time();//系统消息添加时间
                $msg_data['sm_title'] = "参拍结果信息";//消息标题
                $msg_data['sm_brief'] = "恭喜您有积分参团订单被系统选定为幸运买家";//消息简介
                $msg_data['sm_content'] = "恭喜您！您在积分商品：'".$g_name."'的活动中的第'".$periods."'期摘得奖品，本期中拍数字为 ".$luck_id;//消息内容
                $msg_data['to_mid'] = $luck_order_info['m_id'];//收消息人ID
                $systemMsg->add_msg($msg_data);

                //未中拍信息
                $where_msg = $where_order;
                $where_msg['o_state'] = 10;
                $where_msg['o_paystate'] = ['gt',2];//退款状态
                $msg_order_list = Db("order_pai")->where($where_msg)->select();
                if(!empty($msg_order_list)){
                    foreach($msg_order_list as $vo){
                        $msg_data['sm_addtime'] = time();//系统消息添加时间
                        $msg_data['sm_title'] = "参拍结果信息";//消息标题
                        $msg_data['sm_brief'] = "好遗憾啊！您的参拍订单号为：".$vo['o_sn']."的积分订单与奖品擦肩而过！";//消息简介
                        $msg_data['sm_content'] = "很遗憾！您在商品：'".$g_name."'的活动中的第'".$periods."'期参拍中未能摘得奖品，本期中拍数字为 ".$luck_id;//消息内容
                        $msg_data['to_mid'] = $vo['m_id'];//收消息人ID
                        $systemMsg->add_msg($msg_data);
                    }
                }

                // 4-3.更新库存
                $where_gp = '';
                $where_gp['gp_id'] = $luck_gp_id;
                $res5 = Db('point_goods_product')->where($where_gp)->setDec('gp_stock',1); // 拍品库存减1
                // 判断是否扣库存成功
                if (!$res5) {
                    throw new \Exception("拍品库存更新失败！");
                }
                //有人购买成功删除积分首页redis  邓赛赛
                if($res5){
                    $goods = new GoodsService();
                    $goods->set_goods_redis(2);
                }
                // 销售数量+1
                $where_gp = '';
                $where_gp['gp_id'] = $luck_gp_id;
                $res6 = Db('point_goods_product')->where($where_gp)->setInc('gp_salenum',1); // 销售数量+1
                // 判断是否扣库存成功
                if (!$res6) {
                    throw new \Exception("拍品销量更新失败！");
                }

                // 积分提成
                $where = '';
                $where['gp_id'] = $gp_id;
                $where['o_periods'] = $periods;
                $res = Db("point_order_pai")->where($where)->update(['o_send_state'=>1]);
                if(!$res){
                    throw new \Exception("数据库繁忙！");
                }

                // x.判断商品是否已卖完
                $callback = $this->if_no_stock($gp_id);
                if(!$callback['status']){
                    throw new \Exception($callback['msg']);
                }
            }
            // 执行提交操作
            Db::commit();
            $back = '';
            $back['is_mem_full'] = $is_mem_full;
            return ['status' => 1, 'msg' => '扣费成功！','data'=>$back];
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
     * 订单流拍处理
     * 刘勇豪
     * @param int $gp_id
     * @return array
     */
    public function if_no_stock($gp_id=0){
        $where['pgp.gp_id'] = $gp_id;
        $gp_info = Db("point_goods_product")->alias("pgp")
            ->field("pgp.g_id,pgp.gp_stock,pgp.gp_id,pg.g_state,pg.g_name,pg.g_img,pgp.gp_gift_peanut")
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->where($where)
            ->find();
        if(empty($gp_info)){
            return ['status'=>0,'msg'=>'商品信息不见了！'];
        }

        $gp_stock = $gp_info['gp_stock'];
        $g_state = $gp_info['g_state'];
        $g_id = $gp_info['g_id'];
        $g_name = $gp_info['g_name'];
        $g_img = $gp_info['g_img'];
        $gp_gift_peanut = $gp_info['gp_gift_peanut'];
        if($gp_stock < 1){
            if($g_state != 9){
                $where = '';
                $where['g_id'] = $g_id;
                $res = Db("point_goods")->where($where)->update(['g_state'=>9]);
                if(!$res){
                    return ['status'=>0,'msg'=>'数据库繁忙！商品状态更新失败！'];
                }
            }

            // 成团的订单退款
            $where = '';
            $where['po.gp_id'] = $gp_id;
            $where['po.o_paystate'] = 2;
            $where['po.o_state'] = 1;
            $list = Db("point_order_pai")->alias("po")
                ->join('pai_member m', 'm.m_id = po.m_id', 'left')
                ->where($where)
                ->select();
            if(!empty($list)){
                foreach($list as $v){
                    $o_id = $v['o_id'];
                    $m_id = $v['m_id'];
                    $o_sn = $v['o_sn'];
                    $o_totalpoint = $v['o_totalpoint'];
                    $o_periods = $v['o_periods'];
                    $m_name = $v['m_name'];
                    $m_levelid = $v['m_levelid'];

                    // 4.返还花生
                    if($gp_gift_peanut > 0){
                        $peanut_log['pl_num'] = $gp_gift_peanut;
                        $peanut_log['pl_time'] = time();
                        $peanut_log['from_id'] = $o_id;
                        $peanut_log['pl_type'] = 'add';
                        $peanut_log['pl_state'] = 8;
                        $peanut_log['pl_mid'] = $m_id;
                        $peanut_log['pl_reason'] = "未中拍订单返回";
                        $plog_id = Db("peanut_log")->insertGetId($peanut_log);

                        // 5.返花生到用户表
                        Db("member")->where(['m_id'=>$m_id])->setInc('peanut',$gp_gift_peanut);
                    }

                    //未中拍信息
                    $systemMsg = new SystemMsgService();
                    // 未成团信息
                    $msg_data['sm_addtime'] = time();//系统消息添加时间
                    $msg_data['sm_title'] = "参拍结果信息";//消息标题
                    $msg_data['sm_brief'] = "好遗憾！您的参拍订单号为：".$o_sn."的积分订单没有成团！";//消息简介
                    $msg_data['sm_content'] = "很遗憾！您在积分商品：'".$g_name."'的折拍活动中的第'".$o_periods."'期参拍中因商品售罄，该期订单不能成团未能参与抽奖，已为您返回花生！";//消息内容
                    $msg_data['to_mid'] = $m_id;//收消息人ID
                    $systemMsg->add_msg($msg_data);

                    // 订单状态
                    $res3 = Db('point_order_pai')->where(['o_id'=>$o_id])->update(['o_state'=>11,'o_paystate'=>4]);
                    if(!$res3){
                        return ['status'=>0,'msg'=>'数据库繁忙！'];
                    }
                }
            }
            return ['status'=>1,'msg'=>'流拍订单已处理！'];
        }
        return ['status'=>1,'msg'=>'商品正常参拍中！'];
    }

    /**
     * 订单详情页数据
     * 刘勇豪
     * @param $o_id 订单编号
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

        // 订单状态1参拍中，2已中拍，3已发货，4已签收，5待评价，6交易完成，10未中拍
        $o_state = $info['o_state'];

        // 剩余支付时间
        $live_paytime = $o_addtime + 24 * 60 * 60 - time();
        $liva_date = $this->Sec2Time($live_paytime);

        $info['live_paytime'] = $live_paytime; //剩余支付时间
        $info['liva_date'] = $liva_date; // 剩余支付时间（格式化）

        $info['o_mobile_secret'] = substr($info['o_mobile'], 0, 3) . "****" . substr($info['o_mobile'], 7, 4);

        // 中拍揭晓时间
        $call_publish = $this->get_pai_publish_time($info['gp_id'], $info['o_periods']);
        $publish_time = 0;
        if($call_publish['status']){
            $publish_time = $call_publish['data'];
        }
        $info['o_publishtime'] = $publish_time;

        // 退款时间
        $call_refund = $this->get_refund_info($o_id);
        $refund_time = 0;
        if($call_refund['status']){
            $refund_time = $call_refund['data']['pl_time'];
        }
        $info['o_refund_time'] = $refund_time;

        return ['status' => 1, 'msg' => "success !", 'data' => $info];
    }

    /**
     * 获取订单退款时间
     * 刘勇豪
     * @param int $o_id
     * @return array
     */
    public function get_refund_info($o_id=0){
        $refund_time = 0;
        if(!$o_id){
            return ['status'=>0,'msg'=>'参数错误！'];
        }

        // 只能先这样查了
        $where = '';
        $where['from_id'] = $o_id;
        $where['pl_reason'] = '未成团退回积分';

        $refund_info = Db::connect('db_syu')->name('point_log')->where($where)->find();
        if(empty($refund_info)){
            return ['status' => 0, 'msg' => "empty data !", 'data' => $refund_info];
        }else{
            return ['status' => 8, 'msg' => "success !", 'data' => $refund_info];
        }

    }

    /**
     * 参拍揭晓时间，最后下单时间
     * 刘勇豪
     * @param $gp_id
     * @param $operiods
     * @return array
     */
    public function get_pai_publish_time($gp_id=0,$operiods=0){
        $publish_time = 0;
        if(!$gp_id || !$operiods){
            return ['status'=>0,'msg'=>'参数错误！'];
        }

        $where['poa.gp_id'] = $gp_id;
        $where['poa.o_periods'] = $operiods;
        //$where['poa.oa_state'] = 2;
        $info = Db("point_order_awardcode")->alias("poa")
            ->where($where)
            ->join('pai_point_order_pai po', 'po.o_id = poa.o_id', 'left')
            ->order("poa.oa_id desc")
            ->find();
        if(empty($info)){
            return ['status'=>0,'msg'=>'本期参拍中拍信息还没有产生！'];
        }

        $publish_time = $info['o_paytime'];
        return ['status'=>1,'msg'=>'本期参拍中拍时间已经产生！','data'=>$publish_time];
    }

    /**
     * 参拍进度
     * 刘勇豪
     * @param $gp_id
     * @param $o_periods
     * @return float 2位小数,百分比*100
     */
    public function get_orderpai_rate($gp_id, $o_periods)
    {

        $where['gp_id'] = $gp_id;
        $where['o_periods'] = $o_periods;

        $sum_gp_num = Db('point_order_awardcode')->where($where)->count();
        $sum_gp_num = intval($sum_gp_num);

        $gdr_membernum = Db('point_goods')->alias("pg")
            ->join('pai_point_goods_product pgp', 'pgp.g_id = pg.g_id', 'left')
            ->where(['pgp.gp_id' => $gp_id])
            ->value('pg.g_peoplenumber');
        $gdr_membernum = intval($gdr_membernum);

        $rate = round($sum_gp_num * 100 / $gdr_membernum, 1);
        if ($rate > 100) {
            $rate = 100;
        }

        return $rate;
    }

    /**
     * 分页查询订单详细列表（order_pai,goods_product,goods,store）
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

        // 待支付订单保留时间
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

                // 订单是否关闭
                $is_close = 0;

                if($v['o_paystate'] == 1 && $v['o_addtime'] < ( time() - $max_pay_time * 60 * 60 )){
                    $is_close = 1;
                }
                $list[$k]['is_close'] = $is_close;

                //参拍揭晓时间（当期最后下单时间）
                $gp_id = $v['gp_id'];
                $o_periods = $v['o_periods'];
                $call_publish = $this->get_pai_publish_time($gp_id, $o_periods);
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
     * 统计分页查询订单详细列表总条数
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
     * 分页查询订单详细列表（point_order_pai,member）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     */
    public function orderLimitList($where = '', $order = 'po.o_id asc', $field = '*', $limit = "0,5", $cache = 'point_order_pai')
    {
        $limit_list = Db("point_order_pai")->alias('po')
            ->where($where)
            ->field($field)
            ->join('pai_member m', 'm.m_id = po.m_id', 'left')
            ->order($order)
            ->limit($limit)
            ->select();
        return $limit_list;
    }

    /**
     * 删除订单
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
            return ['status'=>0,'msg'=>'订单不存在！'];
        }

        if($order_info['m_id'] != $m_id){
            return ['status'=>0,'msg'=>'不是你的订单！'];
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
     * 取消订单
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
            return ['status'=>0,'msg'=>'订单信息不存在！'];
        }

        if($order_info['m_id'] != $m_id){
            return ['status'=>0,'msg'=>'订单用户不匹配！'];
        }

        $res = Db($this->cache)->where(['o_id'=>$o_id])->update(['o_isdelete'=>2]);
        if(!$res){
            $o_state = Db($this->cache)->where(['o_id'=>$o_id])->value("o_isdelete");
            if($o_state != 2){
                return ['status'=>0,'msg'=>'系统繁忙，请稍后再试！'];
            }
        }
        return ['status'=>1,'msg'=>'订单取消成功！','data'=>$res];
    }

    /**
     * 确认订单
     * 刘勇豪
     * @param $o_id
     * @param $m_id
     * @return array
     */
    public function confirm_ordergoods($o_id,$m_id){
        if(!$o_id && !$m_id){
            return ['status'=>0,'msg'=>'缺少参数'];
        }

        $order_info = Db($this->cache)->where(['o_id'=>$o_id])->find();
        if(empty($order_info)){
            return ['status'=>0,'msg'=>'订单信息不存在！'];
        }

        if($order_info['m_id'] != $m_id){
            return ['status'=>0,'msg'=>'订单用户不匹配！'];
        }

        // 事务
        Db::startTrans();
        try{
            // 1.更新订单状态
            $data['o_state'] = 4;
            $data['o_dealtime'] = time();
            $data['o_receivetime'] = time();
            $res = Db($this->cache)->where(['o_id'=>$o_id])->update($data);
            if(!$res){
                $o_state = Db($this->cache)->where(['o_id'=>$o_id])->value("o_state");
                if($o_state != 4){
                    throw new \Exception("系统繁忙，请稍后再试！");
                }
            }

            // 执行提交操作
            Db::commit();
            return ['status' => 1, 'msg' => '订单签收成功！'];
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
    }

    /**
     * 订单物流信息
     * 刘勇豪
     * @param string $where
     * @param string $field
     * @return array
     */
    public function order_logistics_info($where = '', $field = ''){
        $info = Db("point_order_pai")->where($where)->find();
        if(empty($info)){
            return ['status'=>0,'msg'=>"订单信息不存在!",'data'=>''];
        }

        $info['data_img'] = [];
        $img_info = Db("point_order_logistics_img")->where(['oli_oid'=>$info['o_id']])->limit('4')->select();
        $info['data_img'] = $img_info;
        return ['status'=>1,'msg'=>"ok!",'data'=>$info];
    }

    /**
     * 参拍进度进度
     * 刘勇豪
     * @param int $gp_id
     * @param int $periods
     * @return array
     */
    public function pai_progress($gp_id=0, $periods=0){

        if(!$gp_id){
            return ['status'=>0,'msg'=>"参数错误!",'data'=>''];
        }
        $where['pgp.gp_id'] = $gp_id;
        $goods_info = Db("point_goods")->alias("pg")
            ->join('pai_point_goods_product pgp','pg.g_id=pgp.g_id','left')
            ->where($where)
            ->find();
        if(empty($goods_info)){
            return ['status'=>0,'msg'=>"商品不存在!",'data'=>''];
        }

        if(!$periods){
            $call_back = $this->createPeriods($gp_id);
            $periods = $call_back['data'];
        }

        //成团人数
        $g_peoplenumber = $goods_info['g_peoplenumber'];

        // 本期已参团人数
        $where = '';
        $where['gp_id'] = $gp_id;
        $where['o_periods'] = $periods;
        $count_painum = $this->countPaiNum($where);

        // 总共参拍人次
        $where = '';
        $where['gp_id'] = $gp_id;
        $total_painum = $this->countPaiNum($where);

        // 本期晟域参拍人次
        $left_pai_num = $g_peoplenumber - $count_painum;

        // 参拍率
        $pai_rate = $count_painum * 100 / $g_peoplenumber;
        if($pai_rate > 99 && $pai_rate < 100){
            $pai_rate = 99;
        }
        $pai_rate = round($pai_rate,1);

        // 四个最新参拍的头像
        $where = '';
        $where['po.gp_id'] = $gp_id;
        $where['po.o_paystate'] = ['gt',1];
        $last_4_avatars = Db("point_order_pai")->alias("po")
            ->field('m.m_id,m.m_avatar,m.m_s_avatar')
            ->join('pai_member m','po.m_id=m.m_id','left')
            ->where($where)
            ->order("po.o_paytime desc")
            ->limit(4)
            ->select();

        $data['periods'] = $periods;
        $data['g_peoplenumber'] = $g_peoplenumber;
        $data['count_painum'] = $count_painum;
        $data['total_painum'] = $total_painum;
        $data['left_pai_num'] = $left_pai_num;
        $data['pai_rate'] = $pai_rate;
        $data['last_4_avatars'] = $last_4_avatars;
        return ['status'=>1,'msg'=>"succcess!",'data'=>$data];
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
     * 订单详情
     * 刘勇豪
     * @param $where
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function order_detail($where, $field="*"){
        $info = Db("point_order_pai")->alias("po")
            ->join('pai_point_goods_product pgp', 'po.gp_id = pgp.gp_id', 'left')
            ->join('pai_point_goods pg', 'pg.g_id = pgp.g_id', 'left')
            ->join('pai_store s', 's.store_id = po.store_id', 'left')
            ->where($where)
            ->field($field)
            ->find();
        return $info;
    }

    /**
     * 非普通商品直接发货成功
     * 刘勇豪
     * @param int $o_id
     * @param int $m_id
     * @return array
     */
    public function send_out($o_id=0,$m_id=0){
        if(!$o_id || !$m_id){
            return ['status'=>0,'msg'=>"参数错误!"];
        }

        $order_info = Db("point_order_pai")->where(['o_id'=>$o_id])->find();
        if(empty($order_info)){
            return ['status'=>0,'msg'=>"订单不存在!"];
        }

        $o_state = $order_info['o_state'];//订单状态
        $gs_id = $order_info['gs_id'];//商品属性
        $o_m_id = $order_info['m_id'];//订单所属

        if($gs_id == 1){
            return ['status'=>0,'msg'=>"普通物品是需要填写物流信息的!"];
        }

        if($o_state < 2 || $o_state > 3){
            return ['status'=>0,'msg'=>"订单状态有误!"];
        }
        if($o_state == 3){
            return ['status'=>1,'msg'=>"订单已发货!",'data'=>$o_state];
        }else{
            $res = Db("point_order_pai")->where(['o_id'=>$o_id])->update(["o_state"=>3,"o_delivertime"=>time()]);
            if(!$res){
                return ['status'=>0,'msg'=>"数据库繁忙，订单装填更新失败！!"];
            }

            return ['status'=>1,'msg'=>"订单发货成功！",'data'=>3];
        }

    }

    /**
     * 买家添加物流信息的表单验证
     * 刘勇豪
     * @param $data
     * @return array
     */
    public function check_logistics($data){
        // 订单id
        if(!isset($data['o_id']) || empty($data['o_id'])){
            return ['status'=>0,'msg'=>"缺少订单信息!"];
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

//        if(!preg_match('/^1[3-9][0-9]{9}$|^0\d{2,3}-?\d{7,8}$/',$data['seller_mobile'])){
//            return ['status'=>0,'msg'=>"联系电话格式错误!"];
//        }

        return ['status'=>1,'msg'=>"ok!"];
    }

    /**
     * 卖家发货（填写快递单）
     * 刘勇豪
     * @param $data
     * @return array
     *
     * 备注：
     * o_id ：订单id （必填字段）
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
        $new_data['o_delivertime'] = time();//卖家发货时间
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
     * 获取我的店铺id
     * 刘勇豪
     */
    public function get_my_storeid_by_mid($m_id=0){
        $store_id = 0;
        $store_info = Db("store")->where(['m_id'=>$m_id])->find();

        if(!empty($store_info)){
            $store_id = $store_info['store_id'];
        }

        return $store_id;
    }

    /**
     * 单个订单应该退的花生
     * 刘勇豪
     * @param int $o_id
     * @return int
     */
    public function get_refund_peanut($o_id=0){
        $refund_peanut = 0;

        $where['po.o_id'] = $o_id;
        $order_info = $this->order_detail($where);
        if(!empty($order_info)){
            $gp_num = $order_info['gp_num'];
            $gp_gift_peanut = $order_info['gp_gift_peanut'];
            $o_state = $order_info['o_state'];

            if($o_state == 10 || $o_state == 11){
                //未中奖
                $refund_peanut = $gp_gift_peanut * $gp_num;
            }elseif($o_state < 10 && $o_state > 1){
                // 中奖
                $refund_peanut = $gp_gift_peanut * ($gp_num - 1);
            }
        }

        return $refund_peanut;
    }

    /**
     * 参拍者数量统计
     * 刘勇豪
     * @param $gp_id
     * @param int $o_periods
     * @return array
     */
    public function count_paier($gp_id,$o_periods=0){
        if(!$gp_id){
            return ['status'=>0,'msg'=>"参数错误"];
        }

        $where['gp_id'] = $gp_id;

        if($o_periods){
            $where['o_periods'] = $o_periods;
        }
        $where['oa_state'] = ['lt',4];//废弃的除外
        $count_awardcode = Db("point_order_awardcode")->where($where)->count("oa_id");// 已参拍人次

        $data['count_awardcode'] = $count_awardcode;
        //$data['total_left_num'] = $total_left_num;

        return ['status'=>8,'msg'=>"success !", 'data'=>$data];
    }

    /**
     * 获取中奖订单和订单的评价详情
     * 刘勇豪
     * @param string $where
     * @param string $field
     * @param string $order
     * @param string $limit
     * @return array
     */
    public function get_limit_order_review($where='',$field="*",$order="po.o_id desc",$limit=''){

        $list = Db("point_order_pai")->alias("po")
            ->field($field)
            ->join('pai_point_review_order pro', 'pro.order_id = po.o_id', 'left')
            ->join('pai_member m', 'm.m_id = po.m_id', 'left')
            ->join('pai_point_review_goods prg', 'prg.ro_id = pro.ro_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();
        if(!empty($list)){
            foreach($list as $k => $v){

                // 评价图片
                $rg_id = $v['rg_id'];
                $img_list = [];
                if($rg_id){
                    $img_list = Db::table("pai_point_review_goods_imgs")->where(['rg_id'=>$rg_id])->select();
                }
                $list[$k]['img_list'] = $img_list;

                // 吖吖码数量
                $pai_num = $this->countPaiNum(['o_id'=>$v['o_id']]);
                $list[$k]['pai_num'] = $pai_num;

                //名字加密
                $m_name = $v['m_name'];
                $s_name = '';
                if(mb_strlen($m_name) == 1){
                    $s_name = $m_name.'**';
                }else{
                    $s_name = mb_substr($m_name,0,1,'utf-8').'**'.mb_substr($m_name,-1,1,'utf-8');
                }
                $list[$k]['s_name'] = $s_name;
            }
        }

        return $list;
    }

    /**
     * 积分拍支付成功就回调（返花生）
     * 刘勇豪
     * @param int $gp_id
     * @return array
     */
    public function point_pay_callback($gp_id=0){

        if(!$gp_id){
            return ['status'=>0,'msg'=>"参数错误 !", 'data'=>''];
        }

        $pointGoods = new PointGoodsService();
        $goods_info = $pointGoods->goods_info(['pgp.gp_id'=>$gp_id]);
        if(empty($goods_info)){
            return ['status'=>0,'msg'=>"商品找不到 !", 'data'=>''];
        }
        $gp_gift_peanut = $goods_info['gp_gift_peanut'];// 每一个不中奖的吖吖码要退的花生数额

        $call_back = $this->maxPeriods($gp_id);
        if(!$call_back['status']){
            return $call_back;
        }
        $max_periods = $call_back['data'];

        //查找所有退款中的订单退款
        $where = '';
        $where['o_paystate'] = 3;//退款中
        $where['gp_id'] = $gp_id;//指定商品
        $where['o_periods'] = ['between',"1,$max_periods"];//指定商品
        $list = Db("point_order_pai")->where($where)->select();
        $member = new MemberService();

        if(!empty($list)){
            foreach($list as $v){
                $o_id = $v['o_id'];
                $m_id = $v['m_id'];
                $o_sn = $v['o_sn'];
                $gp_num = $v['gp_num'];
                $o_state = $v['o_state'];
                // 事务
                Db::startTrans();
                try{
                    // 返花生者信息
                    $mem_info = $member->get_info(['m_id' => $m_id]);
                    if(!empty($mem_info)){
                        $m_name = $mem_info['m_name'];
                        $m_levelid = $mem_info['m_levelid'];

                        // 1.退款日志
                        $refund_peanut = 0;
                        if($o_state == 10){
                            //未中奖
                            $refund_peanut = $gp_gift_peanut * $gp_num;
                        }elseif($o_state < 10 && $o_state > 1){
                            // 中奖
                            $refund_peanut = $gp_gift_peanut * ($gp_num - 1);
                        }

                        // 4.返还花生
                        if($refund_peanut > 0){
                            $peanut_log['pl_num'] = $refund_peanut;
                            $peanut_log['pl_time'] = time();
                            $peanut_log['from_id'] = $o_id;
                            $peanut_log['pl_type'] = 'add';
                            $peanut_log['pl_state'] = 8;
                            $peanut_log['pl_mid'] = $m_id;
                            $peanut_log['from_type'] = 3;//积分订单
                            $peanut_log['pl_reason'] = "积分场未团中的订单赠送花生";
                            $plog_id = Db("peanut_log")->insertGetId($peanut_log);

                            // 5.返花生到用户表
                            Db("member")->where(['m_id'=>$m_id])->setInc('peanut',$refund_peanut);

                            // 6.更新用户订单和中拍码状态
                            Db("point_order_pai")->where(['o_id'=>$o_id])->update(['o_paystate'=>4]);
                        }
                    }

                    // 执行提交操作
                    Db::commit();
                    // return ['status' => 1, 'msg' => '订单签收成功！'];
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
            }
        }

        return ['status'=>8,'msg'=>"success !", 'data'=>''];
    }

    /**
     * 获取毫秒时间戳
     * 刘勇豪
     * @return float
     */
    function getMillisecond() {
        list($s1, $s2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }

    /**
     * 退款详情
     * 刘勇豪
     * @param int $o_id
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function refund_info($o_id=0){
        $order_info = Db("point_order_pai")->where(['o_id'=>$o_id])->find();
        if(!empty($order_info)){
            $call_back = $this->get_refund_info($o_id);
            if($call_back['status']){
                $order_info['refund_info'] = $call_back['data'];
            }
        }
        return $order_info;
    }

    /**
     * 赠送上级积分的回调方法
     * 刘勇豪
     * @param int $gp_id
     * @param int $periods
     * @return array
     */
    public function callback_sent_point($gp_id=0,$periods=0){

        $where = [];
        $where['o_send_state'] = 1;// 赠送中
        if($gp_id){
            $where['gp_id'] = $gp_id;
        }
        if($periods){
            $where['o_periods'] = $periods;
        }
        $list = Db("point_order_pai")->where($where)->select();
        $update_num = 0;
        if(!empty($list)){
            $member = new MemberService();
            foreach($list as $v){

                $o_id = $v['o_id'];
                $m_id = $v['m_id'];
                $o_totalpoint = $v['o_totalpoint'];

                // 用户信息
                $mem_info = $member->get_info(['m_id' => $m_id]);
                $syumem_info = $member->get_syumem_info(['m_id' => $m_id]);

                if(empty($syumem_info)){
                    Db("point_order_pai")->where(['o_id'=>$o_id])->update(['o_send_state'=>0]);
                    continue;
                }
                $tj_mid = $mem_info['tj_mid'];// 推荐m_id
                $ml_tui_id = $syumem_info['ml_tui_id'];// 晟域等级

                // 上级详情
                $tj_syumem_info = [];
                if($tj_mid){
                    $tj_syumem_info = $member->get_syumem_info(['m_id' => $tj_mid]);
                }
                if(empty($tj_syumem_info)){
                    Db("point_order_pai")->where(['o_id'=>$o_id])->update(['o_send_state'=>0]);
                    continue;
                }
                $tj_tui_id = $tj_syumem_info['ml_tui_id'];// 推荐者的晟域等级

                $point_fh = 0;

                // 更具等级 划分赠送额度百分比
                switch ($tj_tui_id)
                {
                    case 1:
                        $config_pointph = Db("config")->where(['c_code'=>'POINT_FH_1'])->find();
                        if(!empty($config_pointph)){
                            $point_fh = $config_pointph['c_value'];
                        }
                        break;
                    case 2:
                        $config_pointph = Db("config")->where(['c_code'=>'POINT_FH_2'])->find();
                        if(!empty($config_pointph)){
                            $point_fh = $config_pointph['c_value'];
                        }
                        break;
                    case 3:
                        $config_pointph = Db("config")->where(['c_code'=>'POINT_FH_3'])->find();
                        if(!empty($config_pointph)){
                            $point_fh = $config_pointph['c_value'];
                        }
                        break;
                }

                $tj_gift_point = round($o_totalpoint*$point_fh/100,2);//给上级的积分

                if($tj_gift_point > 0){
                    $inc1 = Db::connect('db_syu')->name('member_content')->where(['m_id'=>$tj_mid])->setInc('tui_diamond',$tj_gift_point);
                    if(!$inc1){
                        continue;//数据库繁忙，返回推荐人积分失败！
                    }
                    $point_log = '';
                    $point_log['pl_num'] = $tj_gift_point;
                    $point_log['pl_time'] = time();
                    $point_log['from_id'] = $o_id;
                    $point_log['pl_type'] = 'add';
                    $point_log['pl_reason'] = '下级参拍赠送';
                    $point_log['pl_state'] = 8;// 1 未完成 8完成
                    $point_log['pl_mid'] = $tj_mid;
                    $log_id = Db::connect('db_syu')->name('point_log')->insertGetId($point_log);
                    Db("point_order_pai")->where(['o_id'=>$o_id])->update(['o_send_state'=>2]);

                    $update_num++;
                }else{
                    Db("point_order_pai")->where(['o_id'=>$o_id])->update(['o_send_state'=>0]);
                    continue;
                }
            }
        }

        $back_data = [];
        $back_data['update_num'] = $update_num;
        return ['status'=>8,'msg'=>"success !", 'data'=>$back_data];
    }


}