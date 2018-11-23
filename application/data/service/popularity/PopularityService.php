<?php
/**
 * Created by PhpStorm.
 * User: shine
 * Date: 2018/8/15
 * Time: 11:26
 */

namespace app\data\service\popularity;

use app\data\service\BaseService;
use app\data\service\config\ConfigService;
use app\data\service\orderPai\OrderPaiService;
use app\data\service\popularity\PopularityGoodsService;
use app\data\model\popularity\PopularityGoodsModel;
use app\data\service\promoters\PromotersFrozenService;
use think\Db;
use think\Cookie;
use think\Request;
use app\data\service\sms\SmsService;
use app\data\service\member\MemberService;
use app\data\service\system_msg\SystemMsgService as SystemMsgService;
use app\data\service\wx\WxService;
use app\data\service\address\AddressService as AddressService;
use RedisCache\RedisCache;
use \Redis;

class PopularityService extends BaseService{

    protected $cache = 'popularity_goods';

    public function __construct()
    {
        parent::__construct();
        $this->goods = new PopularityGoodsModel();
        $this->cache = 'popularity_goods';
    }


    /**
     * 管理员查看商品列表
     */
    public function popularity_goods_list($where=[],$field='*',$order){
        $list = Db($this->cache)
            ->where($where)
            ->field($field)
            ->order($order)
            ->paginate(10,false,['query'=>request()->param() ]);
        return $list;
    }


    /**
     * 人气商品POST数据
     */
    public function inputData($type,$m_id)
    {
        $data = array();
        switch($type)
        {
            case 'edit';
                break;
            case 'add';
                $data['add_time'] = time();
                break;
        }
        $param = input('post.');
        $data['pg_name']            = input('post.pg_name','');
        $data['pg_second_name']     = input('post.pg_second_name','');
        $data['admin_id']           = $m_id;
        $data['pg_market_price']    = input('post.pg_market_price',0);
        $data['pg_price']           = input('post.pg_price',0);
        $data['pg_membernum']       = input('post.pg_membernum',0);
        $data['pg_chosen_num']      = input('post.pg_chosen_num',0);
        $data['pg_sortnum']         = input('post.pg_sortnum',0);
        $data['pg_type']            = input('post.pg_type/d',1);
        $data['pg_spec']            = input('post.pg_spec/d',1);
        $data['pg_img']             = array_filter($param['gp_img']) ? array_filter($param['gp_img']) : 0;
        $data['pg_des']             = htmlspecialchars(input('post.pg_des',''));
        $data['end_time']           = strtotime(input('post.end_time',''));
        $data['pg_loser_point']     = input('post.pg_loser_point',0);
//        $data['is_shelves']         = input('post.is_shelves',0);
        $data['pg_position']            = input('post.pg_position');
        $data['is_show']            = input('post.is_show',0);
//        $data['is_recommendation']            = input('post.is_recommendation',0);
        $data['pg_status']            = input('post.pg_status',0);

        return $data;
    }


    /**
     * 数据验证
     */
    public function checkData($data=[]){
        $error_msg = "";
        //人气商品标题
        if(isset($data['pg_name'])){
            if($data['pg_name'] == ''){
                $error_msg .= "人气商品标题不能为空";
            }
        }

        // 商品描述
        if(isset($data['pg_des'])){
            if($data['pg_des'] == ''){
                $error_msg .= "商品描述不能为空";
            }
        }

        // 市场价
        if(isset($data['pg_market_price'])){
            if(!is_numeric($data['pg_market_price'])){
                $error_msg .= "市场价设置有误！";
            }
        }

        // 参加价格
        if(isset($data['pg_price'])){
            if(!is_numeric($data['pg_price'])){
                $error_msg .= "参加价格设置有误！";
            }
        }

        // 成团人数
        if(isset($data['pg_membernum'])){
            if(!is_numeric($data['pg_membernum'])){
                $error_msg .= "成团人数设置有误！";
            }
        }

        // 排序
        if(isset($data['pg_sortnum'])){
            if(!is_numeric($data['pg_sortnum'])){
                $error_msg .= "排序设置有误！";
            }
        }

        //人气商品图片
        if (empty($data['pg_img'])){
            $error_msg .= "请至少上传一张图片！";
        }
        $img_count = count($data['pg_img']);
        if( $img_count > 6){
            $error_msg .= "最多上传六张图片！";
        }

        // 结束日期
        if(isset($data['end_time'])){
            if($data['end_time'] == ''){
                $error_msg .= "结束日期不能为空！";
            }
        }
//        // 精选推荐
//        if(empty($data['is_recommendation'])){
//            if($data['is_recommendation'] == ''){
//                $error_msg .= "请选择是否精选推荐！";
//            }
//        }
        // 商品上架状态
        if(empty($data['pg_status'])){
            if($data['pg_status'] == ''){
                $error_msg .= "请选择商品上架状态！";
            }
        }

        return $error_msg;
    }

    /**
     * 更新人气商品数据
     */
    public function popularitySave($where="", $data="")
    {
        $save = $this->goods->getSave($where, $data, $this->cache);
        return $save;
    }

    /**
     * 添加一个人气商品数据
     */
    public function popularityAdd($data='')
    {
        $list = Db::table('pai_popularity_goods')->insertGetId($data);
        return $list;
    }

    /**
     * 修改人气商品图片数据
     */
    public function  goodsImgDel($data)
    {
        if(!$data['pgi_id'] || !$data['pg_id']){
            return false;
        }
        $imgs = $this->get_list(['pg_id'=>$data['pg_id']],'pgi_id asc',"*");

        if($imgs[0]['pgi_id'] == $data['pgi_id']){   //如果删除的是第一个(第一个为主图),默认添加更新第二个位主图
            if(!empty($imgs[1])){
                Db::table("pai_popularity_goods")->where('pg_id',$data['pg_id'])->update(['pg_img'=>$imgs[1]['pgi_url'],'pg_s_img'=>str_replace('/uploads/','/s_uploads/',$imgs[1]['pgi_url'])]);
            }else{
                Db::table("pai_popularity_goods")->where('pg_id',$data['pg_id'])->update(['pg_img'=>'','pg_s_img'=>'']);
            }
        }

        $info = Db::table("pai_popularity_goods_imgs")->where('pgi_id',$data['pgi_id'])->delete();
        return $info;
    }

    /**
     * 获取单条信息
     */
    public function get_list($where,$order,$field=''){
        $res = Db::table('pai_popularity_goods_imgs')->field($field)->where($where)->order($order)->select();
        return $res;
    }

    /**
     * 添加人气商品图片数据
     */
    public function  goodsImgAdd($pg_id,$imgs)
    {
        $imgArr = array();
        if(array_filter($imgs)){
            foreach($imgs as $k => $v){
                $imgArr[$k] = [
                    'pgi_url'=>$v,
                    'pg_id'=>$pg_id,
                ];
            }
            $info = Db::table("pai_popularity_goods_imgs")->insertAll($imgArr);
        }

        return $info;
    }

    /**
     * 获取人气商品信息
     */
    public function popularityGoodsInfo($where='', $field='*')
    {
        $info =  $this->goods->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * 获取人气商品图片信息
     */
    public function popularityImgs($where='', $field='*')
    {
        $info =  Db::table('pai_popularity_goods_imgs')->field($field)->where($where)->select();
        return $info;
    }

    /**
     * 删除一条人气商品数据
     */
    public function popGoodsDel($where='')
    {
        $del = $this->goods->getDel($where, $this->cache);
        return $del;
    }

    /**
     * 我要出道
     * 刘勇豪
     * @param int $m_id
     * @param int $pg_id
     * @return array
     */
    public function to_be_popmem($pg_id=0,$m_id=0){
        if(!$m_id || !$pg_id){
            return ['status'=>0,'msg'=>'参数错误'];
        }

        // 查询用户详情  判断设置支付密码
        $mem_info = Db("member")->where(['m_id'=>$m_id])->find();
        if(empty($mem_info)){
            return ['status'=>0,'msg'=>'用户不存在！'];
        }
        $db_pwd = $mem_info['m_payment_pwd'];
        if(!$db_pwd){
            $url = url('/member/modifydata/first_payment_pwd/pg_id/'.$pg_id);
            return ['status' => 2, 'msg' => '未设置支付密码！', 'data' => $url];
        }
        // 商品详情
        $popgoods_info = Db("popularity_goods")->where(['pg_id'=>$pg_id])->find();
        if(empty($popgoods_info)){
            return ['status'=>0,'msg'=>'错误：商品不见了！'];
        }
        $pg_periods = $popgoods_info['pg_periods'];
        $pg_price = $popgoods_info['pg_price'];
        $pg_membernum = $popgoods_info["pg_membernum"];
        $end_time = $popgoods_info["end_time"];
        $pg_state = $popgoods_info["pg_state"];

        // 活动时间
        if($end_time < time()){
            return ['status'=>0,'msg'=>'来晚了哟~亲！此商品活动已结束！'];
        }
        if($pg_state > 1){
            return ['status'=>0,'msg'=>'来晚了哟~亲！此商品本期活动人额已满！'];
        }

        // 成团判定
        $where_count['pg_id'] = $pg_id;
        $where_count['pm_periods'] = $pg_periods;
        $where_count['pm_paystate'] = 8;
        $count = Db("popularity_member")->where($where_count)->count();
        if($count >= $pg_membernum){
            return ['status'=>0,'msg'=>'本期活动人数已满，再看看别的商品吧！'];
        }


        $where_pm['m_id'] = $m_id;
        $where_pm['pg_id'] = $pg_id;
        $popmem_info = Db("popularity_member")->where($where_pm)->find();

        if(empty($popmem_info)){
            $data_mem['m_id'] = $m_id;
            $data_mem['pm_state'] = 1;// 状态1未参拍  2 参拍中   8参拍成功
            $data_mem['pm_paystate'] = 1;// 支付状态 1未支付  8支付成功
            $data_mem['add_time'] = time();
            $data_mem['pm_popularity'] = 0;
            $data_mem['pg_id'] = $pg_id;
            $data_mem['pm_periods'] = $pg_periods;
            $data_mem['pm_paymoney'] = $pg_price;

            $insert_id = Db("popularity_member")->insertGetId($data_mem);
            if(!$insert_id){
                return ['status'=>0,'msg'=>'数据库繁忙，请稍后再试...'];
            }
            $pm_id = $insert_id;
            $popmem_info = $data_mem;

        }else{
            $pm_id = $popmem_info['pm_id'];
        }

        $back['pm_id'] = $pm_id;
        $back['pm_state'] = $popmem_info['pm_state'];
        $back['pm_paystate'] = $popmem_info['pm_paystate'];

        return ['status'=>1,'msg'=>'您已成功成为此商品的擂主了！','data'=>$back];
    }

    /**
     * 出道付款
     * 刘勇豪
     * @param int $pm_id
     * @param int $m_id
     * @param int $md5_pwd
     * @return array
     *
     * status: 0错误；2未设置支付密码；3余额不足；8成功。
     */
    public function pay_popmem($pm_id=0, $m_id=0, $md5_pwd=0){

        if(!$pm_id || !$m_id || !$md5_pwd){
            return ['status'=>0,'msg'=>'参数错误'];
        }

        // 查询用户详情
        $mem_info = Db("member")->where(['m_id'=>$m_id])->find();
        if(empty($mem_info)){
            return ['status'=>0,'msg'=>'用户不存在！'];
        }

        // 查询订单详情
        $where = '';
        $where['pm.pm_id'] = $pm_id;
        $popgoods_info = Db("popularity_member")->alias("pm")
            ->join('pai_popularity_goods pg', 'pg.pg_id = pm.pg_id', 'left')
            ->where($where)
            ->find();
        if(empty($popgoods_info)){
            return ['status'=>0,'msg'=>'活动商品不存在！'];
        }
        if($popgoods_info['pg_state'] != 1){
            return ['status'=>0,'msg'=>'此商品本期参拍活动已结束！'];
        }

        $pg_price = $popgoods_info['pg_price'];
        $pg_id = $popgoods_info['pg_id'];
        $db_pwd = $mem_info['m_payment_pwd'];
        $m_money = $mem_info['m_money'];
        $m_name = $mem_info['m_name'];
        $m_levelid = $mem_info['m_levelid'];
        $member_type = $mem_info['m_type'] + 1;

        $pg_position = $popgoods_info['pg_position'];

        $data_back['pm_id'] = $pm_id;
        $data_back['pg_id'] = $pg_id;

        if($pg_price > $m_money){
            return ['status'=>3,'msg'=>'余额不足，请充值！','data'=>$data_back];
        }

        if(!$db_pwd){
            return ['status'=>2,'msg'=>'您还没有设置支付密码，请先设置密码！','data'=>$data_back];
        }
        if($db_pwd != $md5_pwd){
            return ['status'=>0,'msg'=>'密码错误！'];
        }

        Db::startTrans();
        try{
            // 1.扣钱
            $res1 = Db("member")->where(['m_id'=>$m_id])->setDec("m_money",$pg_price);
            // 判断是否扣钱
            if (!$res1) {
                throw new \Exception("支付失败！");
            }

            // 2.生成money_log
            // 记录扣款日志
            if($pm_id){
                $money_log['ml_type'] = 'reduce';
                $money_log['ml_reason'] = '人气订单付款';
                $money_log['ml_table'] = 6;
                $money_log['ml_money'] = $pg_price;
                $money_log['money_type'] = 1;
                $money_log['nickname'] = $m_name;
                $money_log['position'] = $m_levelid;
                $money_log['member_type'] = 1;
                $money_log['add_time'] = time();
                $money_log['from_id'] = $pm_id;
                $money_log['m_id'] = $m_id;
                $log_id = Db::table('pai_money_log')->insertGetId($money_log);
                if(!$log_id){
                    throw new \Exception("数据库繁忙，日志生成失败！");
                }
            }

            //3.更改pop_mem状态
            $where = '';
            $where['pm_id'] = $pm_id;
            $data = [];
            $data['pm_state'] = 2;// 成为擂主成功
            $data['pm_paystate'] = 8;// 支付成功
            $data['pm_paytime'] = time();// 支付日期
            $data['pm_paymoney'] = $pg_price;// 支付金额
            $res2 = Db("popularity_member")->where($where)->update($data);
            if(!$res2){
                throw new \Exception("数据库繁忙，更改pop_mem状态失败！");
            }
            //参拍金额大于
            if($pg_price >= 50 && $mem_info['is_auction'] == 2){
                // x.判断是否是首次下订单（邓赛赛）
                $promoters = Db::table('pai_invitation_log il')
                    ->where(['il.m_id'=>$m_id,'descendants_num'=>1])
                    ->join('pai_member m','il.group_gene=m.m_id','left')
                    ->join('pai_member il_m','il.m_id=il_m.m_id','left')
                    ->field('il.m_id,m.m_id promoters_mid,m.is_promoters,il.descendants_num,il_m.is_auction')
                    ->find();
                $order_pai = new OrderPaiService();
                if($promoters && !empty($promoters['m_id']) && ($promoters['descendants_num'] == 2 || $promoters['descendants_num'] == 1) && ($promoters['is_promoters'] == 4 || $promoters['is_promoters'] == 5) && $promoters['promoters_mid'] && $promoters['is_auction'] == 2){
                    $callback = $order_pai->promoters_descendants_isfirstorder($m_id,$promoters['promoters_mid'],$promoters['is_promoters'],$promoters['descendants_num']);
                    if(!$callback['status']){
                        throw new \Exception($callback['msg']);
                    }
                }else{
                    // x.判断是否是首次下订单
                    $callback = $this->if_myfirstorder($m_id);
                    if(!$callback['status']){
                        throw new \Exception($callback['msg']);
                    }
                }
            }

            // 4.人气排名
            $call_sort = $this->pm_sort_by_pmid($pm_id);
            if(!$call_sort['status']){
                throw new \Exception($call_sort['msg']);
            }
            $pm_sort = $call_sort['data'];

            // 5.邀请二维码
            $popularityGoods = new PopularityGoodsService();
            $code_img = $popularityGoods->code($m_id,$pg_id);
            if(!$code_img){
                throw new \Exception("邀请二维码生成失败！");
            }

            // 执行提交操作
            Db::commit();
            //擂主详情
            $data_back['m_avatar'] = $mem_info['m_avatar'];
            $data_back['m_s_avatar'] = $mem_info['m_s_avatar'];
            $data_back['m_name'] = $mem_info['m_name'];
            $data_back['pm_popularity'] = 0;
            $data_back['pm_sort'] = $pm_sort;
            $data_back['code_img'] = $code_img;
            $data_back['challenger_url'] = PAI_URL."/popularity/popularitygoods/new_people/pm_id/".$pm_id.'/pg_id/'.$pg_id.'?share=1';
            return ['status'=>8,'msg'=>'您已成功成为擂主！','data'=>$data_back];
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
     * 判断是否第一次下单，
     * 第一次下单要给我的上一家推荐人
     * @param $m_id
     * @return array
     */
    public function if_myfirstorder($m_id){
        $where_find['m_id'] = $m_id;
        $where_find['pm_paystate'] = ['gt',1];
        $where_find['pm_paymoney'] = ['>=',50];
        $list = Db("popularity_member")->field("pm_id")->where($where_find)->limit("2")->select();
        //此用户是否有给上家奖励
        $where_log = [
            'income_type'=>1,
            'from_id'   =>$m_id,
            'state'     =>8
        ];
        $is_tj_money = Db('money_log')->where($where_log)->count();
        //第一次参拍和未给上家提供过推荐奖励
        if(count($list) == 1 && empty($is_tj_money)){
            $first_oid = $list[0]['pm_id'];
            $mem_info = Db("member")->where(['m_id'=>$m_id])->find();
            if(empty($mem_info)){
                return ['status'=>0,'msg'=>"下单账号信息不存在！"];
            }
            $tj_mid = $mem_info['tj_mid'];
            $m_mobile = $this->decrypt($mem_info['m_mobile']);//手机号
            $m_secret_mobile = substr($m_mobile,0,3)."****".substr($m_mobile,7,4);
            $m_name = $mem_info['m_name'];
            $m_levelid = $mem_info['m_levelid'];

            //用户参拍状态
            Db::table('pai_member')->where('m_id',$m_id)->update(['is_auction'=> 1,'edit_time'=>time()]);

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

                //上级得收益 领会员推荐费（10元/人）
                $ml_newbuyer_income = 10;//默认 新推荐会员并拍购的多少收益/人
                if(!empty($p_mem_info) && !empty($p_mem_info['ml_newbuyer_income'])){
                    $ml_newbuyer_income = $p_mem_info['ml_newbuyer_income'];
                }
                $p_profit = $ml_newbuyer_income;
                Db::table('pai_member')->where(['m_id' => $tj_mid])->setInc('m_income', $p_profit);
                $data_income['i_time'] = time();
                $data_income['i_typeid'] = 2;
                $data_income['m_id'] = $tj_mid;
                $data_income['i_state'] = 8;
                $data_income['i_money'] = $p_profit;
                $data_income['i_reason'] = '来自账号{'.$m_secret_mobile."}的首次参拍收益";
                $data_income['i_from_mid'] = $m_id;
                $data_income['i_from_id'] = $first_oid;
                $income_id = Db::table('pai_income')->insertGetId($data_income);
                if($income_id){
                    // 金钱日志
                    $money_log['ml_type'] = 'add';
                    $money_log['ml_reason'] = "下级首次参拍收益";
                    $money_log['ml_table'] = 3;
                    $money_log['ml_money'] = $p_profit;
                    $money_log['money_type'] = 2;
                    $money_log['nickname'] = $m_name;
                    $money_log['position'] = $m_levelid;
                    $money_log['member_type'] = 1;
                    $money_log['income_type'] = 2;
                    $money_log['add_time'] = time();
                    $money_log['from_id'] = $income_id;
                    $money_log['m_id'] = $tj_mid;
                    $log_id = Db::table('pai_money_log')->insertGetId($money_log);
                }

                //上上家是否为正式推广员
                $top_member = Db::table('pai_invitation_log il')
                    ->where(['il.m_id'=>$m_id,'descendants_num'=>2])
                    ->join('pai_member m','il.group_gene=m.m_id','left')
                    ->join('pai_member il_m','il.m_id=il_m.m_id','left')
                    ->field('il.m_id,m.m_id promoters_mid,m.is_promoters,il.descendants_num,il_m.is_auction')
                    ->find();
                if(!empty($top_member) && $top_member['is_promoters'] == 5){
                    $config = new ConfigService();
                    //说明考核期此粉丝未参拍,粉丝首次参拍再给正式推广员2元间推推荐奖
                    $where = [
                        'c_state'=>0,
                        'c_code'=>'TGY_JT'
                    ];
                    $TGY_JT = $config->configGetValue($where,'c_value');//间推
                    $data_income['i_time'] = time();
                    $data_income['i_typeid'] = 6;
                    $data_income['m_id'] = $top_member['m_id'];
                    $data_income['i_state'] = 8;
                    $data_income['i_money'] = $TGY_JT;
                    $data_income['i_reason'] = '来自账号{'.$m_secret_mobile."}间推会员的首次参拍收益";
                    $data_income['i_from_mid'] = $m_id;
                    $data_income['i_from_id'] = $first_oid;
                    $income_id = Db::table('pai_income')->insertGetId($data_income);
                    if($income_id){
                        // 金钱日志
                        $money_log['ml_type'] = 'add';
                        $money_log['ml_reason'] = "推广员间推会员首次参拍收益";
                        $money_log['ml_table'] = 3;
                        $money_log['ml_reason_id'] = 7;
                        $money_log['ml_money'] = $TGY_JT;
                        $money_log['money_type'] = 2;
                        $money_log['nickname'] = $m_name;
                        $money_log['position'] = $m_levelid;
                        $money_log['member_type'] = 1;
                        $money_log['income_type'] = 2;
                        $money_log['add_time'] = time();
                        $money_log['from_id'] = $m_id;
                        $money_log['m_id'] = $top_member['promoters_mid'];
                        $money_log['state'] = 8;
                        $log_id = Db::table('pai_money_log')->insertGetId($money_log);
                    }
                    Db::table('pai_member')->where('m_id',$top_member['promoters_mid'])->setInc('m_income', $TGY_JT);
                    if(!$income_id){
                        return ['status'=>0,'msg'=>"来自账号{".$m_mobile."}的首次参拍收益添加失败了"];
                    }
                }else if(!empty($top_member) && $top_member['is_promoters'] == 4){
                    $config = new ConfigService();
                    $where3 = [
                        'c_state' => 0,
                        'c_code' => 'TGY_JT'
                    ];
                    $c_value = $config->configGetValue($where3, 'c_value');
                    //插入冻结收益
                    $pa_info = [
                        'm_id' => $top_member['promoters_mid'],
                        'from_id' => $m_id,
                        'p_money' => $c_value,
                        'e_money' => 0,
                        'descendants_num' => 2,
                        'type' => 2,
                        'state' => 1,
                        'add_time' => time(),
                    ];
                    $promoters = new PromotersFrozenService();
                    $promoters->get_add($pa_info);
                }

            }
        }
        return ['status'=>8,'msg'=>"首次参拍收益已产生!", 'data'=>$m_id];
    }

    /**
     * 人气拍排名
     * 刘勇豪
     * @param int $pm_id
     * @return array
     */
    public function pm_sort_by_pmid($pm_id = 0){
        $where['pm_id'] = $pm_id;
        $row = Db("popularity_member")->where($where)->find();
        if(empty($row)){
            return ['status' => 0, 'msg' => "擂主信息不存在！",'data'=>''];
        }
        $pg_id = $row['pg_id'];
        $pm_popularity = $row['pm_popularity'];
        $pm_paytime = $row['pm_paytime'];
        $where_count['pm_popularity'] = ['gt',$pm_popularity];
        $where_count['pg_id'] = $pg_id;
        $count = Db("popularity_member")->where($where_count)->count();
        $pm_sort = $count + 1;

        // 名词相同的按付款时间排序
        $where = '';
        $where['pg_id'] = $pg_id;
        $where['pm_popularity'] = $pm_popularity;
        $where['pm_paytime'] = ['lt',$pm_paytime];
        $count2 = Db("popularity_member")->where($where)->count();
        $pm_sort = $pm_sort + $count2;
        return ['status' => 1, 'msg' => "ok",'data'=>$pm_sort];
    }

    /**
     * 邀请好友页面
     * 刘勇豪
     * @param $pm_id
     * @param $m_id
     * @return array
     */
    public function invite_page($pm_id,$m_id){
        if(!$pm_id){
            return ['status'=>0,'msg'=>'参数错误！'];
        }

        // 人气商品详情
        $where['pm.pm_id'] = $pm_id;
        $popgoods_info = $this->popgoods_info($where);
        if(empty($popgoods_info)){
            return ['status'=>0,'msg'=>'商品不存在！'];
        }
        $pm_mid = $popgoods_info['m_id'];//擂主id
        $pm_state = $popgoods_info['pm_state'];//状态1出道中 2 成为擂主 3成功出道 4出道失败
        $pm_paystate = $popgoods_info['pm_paystate'];//支付状态 1未支付  8支付成功
        $pg_id = $popgoods_info['pg_id'];//擂主参加的商品ID

        // 擂主排名
        $call_sort = $this->pm_sort_by_pmid($pm_id);
        if(!$call_sort['status']){
            return $call_sort;
        }
        $pm_sort = $call_sort['data'];



        // 点赞排行榜
        $where = [];
        $where['pj.pm_id'] = $pm_id;
        $field = '*';
        $order='pj_num desc';
        $limit='100';
        $joinner_list = $this->joinner_list($where,$field,$order,$limit);

        // 为擂主点赞人数量
        $total_joinner_num = Db("popularity_joinner")->where(['pj_for_pgid'=>$pg_id])->count();

        // 商品擂主数量
        $where = [];
        $where['pg_id'] = $pg_id;
        $where['pm_paystate'] = ['gt',1];
        $total_pm_num = Db("popularity_member")->where($where)->count();

        // 是否已经点赞
        $where = [];
        $where['pm_id'] = $pm_id;
        $where['m_id'] = $m_id;
        $find = Db("popularity_joinner")->where($where)->find();
        $is_called = 0;
        if(!empty($find)){
            $is_called = 1;
        }

        //返回数据整合
        $data['popgoods_info'] = $popgoods_info;
        $data['pm_sort'] = $pm_sort;
        $data['total_joinner_num'] = $total_joinner_num;
        $data['total_pm_num'] = $total_pm_num;
        $data['joinner_list'] = $joinner_list;
        $data['is_called'] = $is_called;

        return ['status'=>1,'msg'=>'ok','data'=>$data];
    }

    /**
     * 人气商品详情
     * 刘勇豪
     */
    public function popgoods_info($where = '', $field = '*'){
        $info = Db("popularity_member")->alias("pm")
            ->join('pai_popularity_goods pg', 'pg.pg_id=pm.pg_id', 'left')
            ->join('pai_member m', 'm.m_id=pm.m_id', 'left')
            ->where($where)
            ->field($field)
            ->find();
        return $info;
    }

    /**
     * 打call列表
     * 刘勇豪
     * @param string $where
     * @param string $field
     * @param string $order
     * @param string $limit
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function joinner_list($where = '', $field = '*',$order='pj.pj_num desc',$limit=''){
        $list = Db("popularity_joinner")->alias("pj")
            ->join('pai_member m', 'm.m_id=pj.m_id', 'left')
            ->where($where)
            ->field($field)
            ->order($order)
            ->limit($limit)
            ->select();

        return $list;
    }

    /**
     * 打call列表统计
     * 刘勇豪
     * @param string $where
     * @return int|string
     */
    public function joinner_count($where = ''){
        $count = Db("popularity_joinner")->alias("pj")
            ->join('pai_member m', 'm.m_id=pj.m_id', 'left')
            ->where($where)
            ->count();
        return $count;
    }

    /**
     * 为擂主打call
     * 刘勇豪
     * @param int $pm_id 擂主订单id
     * @param int $pj_mid 参与打call者的m_id
     * @return array
     * status 0错误 1未登录 8打call成功
     */
    public function make_calls($pm_id=0,$pj_mid=0){
        if(!$pm_id){
            return ['status'=>0,'msg'=>'缺少参数！'];
        }

        if(!$pj_mid){
            return ['status'=>1,'msg'=>'请登录登录！'];
        }

        // 擂主订单详情
        $pm_info = Db("popularity_member")->alias("pm")
            ->join('pai_member m', 'm.m_id=pm.m_id', 'left')
            ->where(['pm.pm_id'=>$pm_id])
            ->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>'打call擂主不见了！'];
        }

        $pm_mid = $pm_info['m_id'];
        $pm_state = $pm_info['pm_state'];
        $pm_paystate = $pm_info['pm_paystate'];
        $pm_popularity = $pm_info['pm_popularity'];
        $pg_id = $pm_info['pg_id'];
        $pm_periods = $pm_info['pm_periods'];

        if($pm_state > 2 || $pm_paystate != 8){
            return ['status'=>0,'msg'=>'此商品本期活动已结束咯~','data'=>'pm_paystate:'.$pm_state.'pm_paystate:'.$pm_paystate.'pm_id:'.$pm_id];
        }

        // 判断商品的状态
        $pop_goods_info = Db("popularity_goods")->where(['pg_id'=>$pg_id,'pg_periods'=>$pm_periods])->find();
        if(empty($pop_goods_info)){
            return ['status'=>0,'msg'=>'商品不见了！'];
        }
        $pg_state = $pop_goods_info['pg_state'];
        if($pg_state > 1){
            return ['status'=>0,'msg'=>'此商品本期活动已结束咯~','data'=>'$pg_state:'.$pg_state];
        }

        // 打call者详情
        $pj_meminfo = Db("member")->where(['m_id'=>$pj_mid])->find();
        if(empty($pj_meminfo)){
            return ['status'=>1,'msg'=>'请登录登录！'];
        }

        // 自己不能给自己打call
        if($pj_mid == $pm_mid){
            return ['status'=>2,'msg'=>'自己不能给自己点赞哦！'];
        }

        // 判断是否已经点赞过了
        $where = '';
        $where['m_id'] = $pj_mid;
        $where['pm_id'] = $pm_id;
        $pj_id = Db("popularity_joinner")->where($where)->find();
        if(!empty($pj_id)){
            return ['status'=>0,'msg'=>'您已经为擂主点过赞了，只能为擂主点一次赞哦！'];
        }

        $pj_popularity = $pj_meminfo['popularity'];


        // 获取我的现有人气值 可更新人气质时间(lyh)
        $Popularity = new PopularityService();
        $call_back = $Popularity -> get_mypop_info($pj_mid);
        if(!$call_back['status']){
            return $call_back['msg'];
        }
        $pop_info = $call_back['data'];

        if($pj_popularity < 20){
            return ['status'=>3,'msg'=>'哎呀！您已无法为小伙伴点赞了,听说在拍吖吖普通拍场参拍商品可以恢复哦!','data'=>$pop_info];
        }

        // 点赞者的人气如有超出100的一律按照100来计算
        if($pj_popularity > 100){
            $pj_popularity = 100;
        }


        // 人气值加减3
        if($pj_popularity < 3){
            $num_call = 1;
        }else{
            $num_call = round(( $pj_popularity / 2 ), 2);

            $num=mt_rand() / mt_getrandmax() * 3;
            $newNum  = sprintf("%.2f",$num);

            $mod = time()%2;
            if($mod){
                $num_call = $num_call + $newNum;
            }else{
                $num_call = $num_call - $newNum;
            }
        }

        $where = '';
        $where_pm['pm_id'] = $pm_id;
        $row = Db("popularity_member")->where($where_pm)->find();
        if(empty($row)){
            return ['status'=>0,'msg'=>'擂主消失了！'];
        }

        Db::startTrans();
        try{
            // 1.扣除自身人气值
            $res1 = Db("member")->where(['m_id'=>$pj_mid])->setDec("popularity",$num_call);
            if(!$res1){
                throw new \Exception("数据库繁忙！");
            }

            // 2.人气值日志
            $data_log['pl_type'] = "reduce";
            $data_log['pl_num'] = $num_call;
            $data_log['pl_time'] = time();
            $data_log['m_id'] = $pj_mid;
            $data_log['pl_for_mid'] = $pm_mid;
            $data_log['pl_pg_id'] = $pg_id;
            $data_log['pl_reason'] = "为擂主点赞";
            $log_id = Db("popularity_log")->insertGetId($data_log);
            if(!$log_id){
                throw new \Exception("数据库繁忙，点赞日志生成失败！");
            }

            // 3.加人气值
            $where = '';
            $where_pm['pm_id'] = $pm_id;
            $res2 = Db("popularity_member")->where($where_pm)->setInc("pm_popularity",$num_call);
            // 判断是否加人气值
            if (!$res2) {
                throw new \Exception("数据库繁忙！");
            }

            // 4.生成日志
            $data_pj['m_id'] = $pj_mid;
            $data_pj['pj_for_mid'] = $pm_mid;
            $data_pj['pj_for_pgid'] = $pg_id;
            $data_pj['pj_num'] = $num_call;
            $data_pj['pj_time'] = time();
            $data_pj['pm_id'] = $pm_id;
            $data_pj['pj_periods'] = $pm_periods;
            $pj_id = Db("popularity_joinner")->insertGetId($data_pj);
            if(!$pj_id){
                throw new \Exception("数据库繁忙，点赞记录生成失败！");
            }

            // 执行提交操作
            Db::commit();
            $back = '';
            $back['pm_mid'] = $pm_mid;
            $back['m_name'] = $pm_info['m_name'];
            $back['m_avatar'] = $pm_info['m_avatar'];
            $back['m_s_avatar'] = $pm_info['m_s_avatar'];
            $back['num_call'] = $num_call;
            $call_sort = $this->pm_sort_by_pmid($pm_id);
            $back['pm_sort'] = $call_sort['data'];
            $back['pop_info'] = $pop_info;

            return ['status'=>8,'msg'=>'点赞成功！','data'=>$back];
        }catch(\Exception $e){
            // 回滚事务
            Db::rollback();
            // 错误日志
            $error_data['el_type_id'] = 2;
            $error_data['el_description'] = $e->getMessage();
            $error_data['m_id'] = $pj_mid;
            $error_data['el_time'] = time();
            Db::table('pai_error_log')->data($error_data)->insert();

            // 获取提示信息
            return ['status' => 0, 'msg' => $e->getMessage()];
        }

    }

    /**
     * 判断首次登陆未参拍加人气值
     * 刘勇豪
     * @param int $m_id
     */
    public function is_first_pop($m_id=0){
        if($m_id){
            $mem_info = Db("member")->where(['m_id'=>$m_id])->find();
            if(!empty($mem_info)){
                $popularity = $mem_info['popularity'];

                // 统计
                $day = date("Y-m-d",time());
                $start_time = strtotime($day);
                $end_time = $start_time + 24 * 60 * 60 -1;

                $where_count['m_id'] = $m_id;
                $where_count['pj_time'] = ['between',$start_time.",".$end_time];
                $is_find = Db("popularity_joinner")->where($where_count)->find();

                if(empty($is_find) && $popularity < 50){
                    $add_pop = 50 - $popularity;
                    $res = Db("member")->where(['m_id'=>$m_id])->update(['popularity'=>50]);

                    // 2.人气值日志
                    $data_log['pl_type'] = "add";
                    $data_log['pl_num'] = $add_pop;
                    $data_log['pl_time'] = time();
                    $data_log['m_id'] = $m_id;
                    $data_log['pl_reason'] = "人气值自动更新";
                    $log_id = Db("popularity_log")->insertGetId($data_log);
                }
            }
        }
    }

    /**
     * @param int $m_id
     */
    public function pop_refresh($m_id=0){
        if($m_id){
            $mem_info = Db("member")->where(['m_id'=>$m_id])->find();
            if(!empty($mem_info)){
                $popularity = $mem_info['popularity'];// 现有人气值

                if($popularity < 50){

                    $add_pop  = 0;//默认增加人气值

                    $where['m_id'] = $m_id;
                    $where['pl_is_refresh'] = 2;//来自自动更新
                    $log_info = Db("popularity_log")->where($where)->order("pl_id desc")->find();
                    if(empty($log_info)){
                        $add_pop = 5;
                    }else{
                        $pl_time = $log_info['pl_time'];
                        $factor = 2 * 60 * 60;

                        $num = floor( (time() - $pl_time)/$factor );

                        $add_pop = 5 * $num;
                    }

                    $max_add = 50 - $popularity;
                    if($add_pop > $max_add){
                        $add_pop = $max_add;
                    }

                    if($add_pop){
                        $res = Db("member")->where(['m_id'=>$m_id])->setInc('popularity',$add_pop);

                        // 2.人气值日志
                        $data_log['pl_type'] = "add";
                        $data_log['pl_num'] = $add_pop;
                        $data_log['pl_time'] = time();
                        $data_log['m_id'] = $m_id;
                        $data_log['pl_reason'] = "人气值自动更新";
                        $data_log['pl_is_refresh'] = 2;
                        $log_id = Db("popularity_log")->insertGetId($data_log);
                    }
                }




            }

        }
    }


    /**
     * 登录并为好友点赞
     * 刘勇豪
     * @param int $phone
     * @param string $pwd
     * @param int $pm_id
     * @return array
     */
    public function user_login($phone=0,$pwd='',$pm_id=0){
        if(!$phone ){
            return ['status' => 0, 'msg' => "请输入账号！"];
        }

        if(!$pwd){
            return ['status' => 0, 'msg' => "请输入密码！"];
        }

        if(!$pm_id){
            return ['status' => 0, 'msg' => "参数错误！"];
        }
        $md5_pwd = md5($pwd);

        $where_user['m_mobile'] = $this->encrypt($phone); //加密手机号码
        $where_user['m_state'] = 0;
        $res = Db("member")->where($where_user)->field('m_id,m_name,m_avatar,m_sex,wx_name,wx_avatar,m_type,m_pwd,m_mobile')->find();
        if(empty($res)){
            return ['status'=>0,'msg'=>'该手机号尚未注册'];
        }
        $db_m_pwd = $res['m_pwd'];
        if($db_m_pwd != $md5_pwd){
            return ['status'=>0,'msg'=>'账号或密码有误'];
        }
        unset($res['m_pwd']);

        $m_id = $this->encrypt('abcde'.$res['m_id']);
        $time = 3600*24*365;
        Cookie::set('m_id',$m_id,$time);
        Cookie::set('phone',$res['m_mobile']);
        $save = Db("member")->where(['m_id'=>$res['m_id']])->update(['login_time'=>time()]);

        if(!$save){
            return ['status'=>0,'msg'=>'登录失败！'];
        }

        // 调用点赞
        //$callback = $this->make_calls($pm_id,$res['m_id']);
        //if($callback['status'] != 8){
        //   return $callback;
        //}

        return ['status'=>8,'msg'=>'登录成功,并成功为好友点赞','data'=>$m_id];
    }

    /**
     * 注册验证码
     * 刘勇豪
     * @param int $phone
     * @return array
     */
    public function register_code($phone=0){
        if(!$phone){
            return ['status'=>0,'msg'=>'请填写手机号！'];
        }
        if(!preg_match("/^[1][0-9]{10}$/", $phone)){
            return ['status'=>0,'msg'=>'手机格式不正确！'];
        }

//        $where_user['m_mobile'] = $this->encrypt($phone); //加密手机号码
//        $res = Db("member")->where($where_user)->find();
//        if(!empty($res)){
//            return ['status'=>0,'msg'=>'此手机已注册！直接登录就可以了~'];
//        }

        $sms = new SmsService();
        $callback = $sms->smsSingleSender($phone);
        return $callback;
    }

    /**
     * 用户注册并登录并为好友点赞
     * 刘勇豪
     * @param int $phone
     * @param int $code
     * @param string $pwd
     * @param int $pm_id
     * @return array
     */
    public function user_register($phone=0,$code=0,$pwd='',$pm_id=0){

        if(!preg_match("/^[1][0-9]{10}$/", $phone)){
            return ['status'=>0,'msg'=>'手机格式不正确！'];
        }

        if(!$code){
            return ['status'=>0,'msg'=>'请填写验证码！'];
        }

        if(!$pm_id){
            return ['status'=>0,'msg'=>'擂主参数不存在！'];
        }

        $pm_info = Db("popularity_member")->alias("pm")
            ->join('pai_member m', 'm.m_id=pm.m_id', 'left')
            ->where(['pm.pm_id'=>$pm_id])
            ->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>'错误：擂主信息不见了！'];
        }

        //
        $data = '';
        $data['m_mobile'] = $phone;
        $data['verification'] = $code;
        $data['m_pwd'] = $pwd;
        $data['re_pwd'] = $pwd;
        $data['type'] = 3;
        $data['tj_mobile'] = $this->decrypt($pm_info['m_mobile']);
        $data['ip'] = "";

        $member = new MemberService();
        $callback = $member->addUserAP($data);//app和pc端注册
        if(!$callback['status']){
            return $callback;
        }

        // 注册成功之后直接登录并点赞
        $callback = $this->user_login($phone,$pwd,$pm_id);
        if($callback['status']){
            return $callback;
        }else{
            return ['status'=>0,'msg'=>'系统错误，点赞失败了！'];
        }
    }

    /**
     * 新的登录注册（合并功能）
     * 刘勇豪
     */
    public function new_login($pm_id=0,$phone=0,$code=0){
        if(!preg_match("/^[1][0-9]{10}$/", $phone)){
            return ['status'=>0,'msg'=>'手机格式不正确！'];
        }

        if(!$code){
            return ['status'=>0,'msg'=>'请填写验证码！'];
        }

        if(!$pm_id){
            return ['status'=>0,'msg'=>'擂主参数不存在！'];
        }

        $pm_info = Db("popularity_member")->alias("pm")
            ->join('pai_member m', 'm.m_id=pm.m_id', 'left')
            ->where(['pm.pm_id'=>$pm_id])
            ->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>'错误：擂主信息不见了！'];
        }

        //此处检测短信验证是否正确
        $sms = new SmsService();
        $res = $sms->checkSmsCode($code,$phone);
        if(!$res['status']){
            return $res;
        }

        $wxS = new WxService();
        $result = $wxS->checkMobileCode($phone);
        if($result['state']=='1'){
            //mobile都存在且匹配,直接登录
            $mdata=array();
            $mdata['m_mobile']=$phone;
            $result2= $wxS->member_login($mdata);

            if(!$result2['state']){
                return ['status'=>0,'msg'=>'系统繁忙！登录失败！'];
            }
        }elseif($result['state']=='2'){
            //mobile都不存在 注册并登录
            $tj_mobile = $this->decrypt($pm_info['m_mobile']);

            $data=array();
            $data['m_mobile'] = trim($phone);
            $data['verification'] = trim($code);
            $data['tj_mobile'] = $tj_mobile;
            $regres=$wxS->register_mobilecode($data);
            if($regres['status']=='1'){
                $mdata3['m_mobile']=$phone;
                $result3= $wxS->member_login($mdata3);
                if(!$result3['state']){
                    return ['status'=>0,'msg'=>'系统繁忙！注册并登录失败！'];
                }
            }else{
                return ['status'=>0,'msg'=>'系统繁忙！注册用户失败！'];
            }
        }

        // 重新判断登录这的m_id
        $login_m_id = Cookie::get("m_id");
        $login_m_mobile = Cookie::get("phone");
        $mem = new MemberService();
        $login_m_id = $mem->decrypt($login_m_id); //解密账号id
        $login_m_id = str_replace('abcde','',$login_m_id);//删除多余字符(加盐字符串)

        // 调用点赞
        //$callback = $this->make_calls($pm_id,$login_m_id);
        //if($callback['status'] != 8){
        //    return $callback;
        //}

        //return ['status'=>8,'msg'=>'登录成功,并成功为好友点赞','data'=>$callback['data']];
        return ['status'=>8,'msg'=>'登录成功,并成功为好友点赞','data'=>''];



    }

    /**
     * 人气商品分页查询
     * 创建人 刘勇豪
     * 时间 2018-09-03 10:51:00
     */
    public function pop_goods_paginate($where='', $field='*', $order="gb_id asc",$page=15)
    {
        $list = $this->goods->getPaginate($where, $field, $order, $page, $this->cache);
        return $list;
    }

    /**
     * 人气商品订单分页查询
     * 创建人 邓赛赛
     * 时间 2018-09-03 10:51:00
     */
    public function pop_goods_join_paginate($where='', $field='*', $order="g.gb_id asc",$page=15)
    {
        if(!empty($where['g.pg_state'])){
            $list = Db::table('pai_popularity_goods g')
                ->join('pai_popularity_member pm','g.pg_id = pm.pg_id','left')
                ->join('pai_member m','m.m_id = pm.m_id','left')
                ->where($where)
                ->order($order)
                ->field($field)
                ->group('g.pg_id')
                ->paginate($page,false,['query'=>request()->param() ]);
//            dump($where);
//            dump($list);die;
            return $list;
        }
        $list = Db::table('pai_popularity_goods g')
            ->join('pai_popularity_member pm','g.pg_id = pm.pg_id','left')
            ->join('pai_member m','m.m_id = pm.m_id','left')
            ->where($where)
            ->order($order)
            ->field($field)
            ->paginate($page,false,['query'=>request()->param() ]);
        return $list;
    }
    /**
     * 导出人气商品订单查询
     * 创建人 邓赛赛
     * 时间 2018-09-03 10:51:00
     */
    public function pop_goods_join_select($where='', $field='*', $order="g.gb_id asc")
    {
        $list = Db::table('pai_popularity_goods g')
            ->join('pai_popularity_member pm','g.pg_id = pm.pg_id','left')
            ->join('pai_member m','m.m_id = pm.m_id','left')
            ->join('pai_store s','m.m_id = s.m_id','left')
            ->where($where)
            ->order($order)
            ->field($field)
            ->select();
        return $list;
    }
    /**
     * 人气商品分页查询
     * 创建人 刘勇豪
     * 时间 2018-09-03 10:51:00
     */
    public function pm_list_paginate($where='', $field='*', $order="pm_popularity desc",$page=10)
    {
        $list = Db("popularity_member")->alias("pm")
            ->field($field)
            ->join('pai_member m', 'm.m_id=pm.m_id', 'left')
            ->join('pai_popularity_goods pg', 'pg.pg_id=pm.pg_id', 'left')
            ->where($where)
            ->order($order)
            ->paginate($page,false,['query'=>request()->param() ]);
        return $list;
    }

    /**
     * 擂主列表
     * 刘勇豪
     */
    public function popmem_list($where='', $field='*', $limit='5',$order='pm.pm_popularity desc')
    {
        $list = Db("popularity_member")->alias("pm")
            ->field($field)
            ->join('pai_member m', 'm.m_id=pm.m_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();
        return $list;
    }

    /**
     * 根据pm_id设置中奖者（暂时不用了）
     * 刘勇豪
     * @param int $pm_id
     * @return array
     */
    public function set_lucky_by_pmid($pm_id=0){
        if(!$pm_id){
            return ['status'=>0,'msg'=>'参数错误！~'];
        }

        $where['pm_id'] = $pm_id;
        $res = Db("popularity_member")->alias("pm")
            ->join('pai_popularity_goods pg', 'pg.pg_id=pm.pg_id', 'left')
            ->field("pm.pm_periods,pm.pg_id,pg.pg_membernum,pg.end_time")
            ->where($where)
            ->find();

        if(empty($res)){
            return ['status'=>0,'msg'=>'擂主或不存在！~'];
        }

        $pm_periods = $res['pm_periods'];
        $pg_id = $res['pg_id'];
        $pg_membernum = $res['pg_membernum'];
        $end_time = $res['end_time'];

        $where_count['pg_id'] = $pg_id;
        $where_count['pm_periods'] = $pm_periods;
        $where_count['pm_paystate'] = 8;
        $count = Db("popularity_member")->where($where_count)->count();
        if($end_time > time() && $count < $pg_membernum){
            return ['status'=>2,'msg'=>"此商品还在活动期，本期需要".$pg_membernum."人成团，当前有".$count."人参拍，还差".($pg_membernum - $count)."人哦~"];
        }

        // 事务
        Db::startTrans();
        try{
            // 1.更新未成为幸运者
            $res1 = Db("popularity_member")->where(['pg_id'=>$pg_id,'pm_periods'=>$pm_periods])->update(['pm_state'=>4]);
            if(!$res1){
                throw new \Exception("数据库繁忙！");
            }

            // 1.更新成为幸运者
            $res2 = Db("popularity_member")->where(['pm_id'=>$pm_id])->update(['pm_state'=>3]);
            if(!$res2){
                throw new \Exception("数据库繁忙！");
            }
            // 执行提交操作
            Db::commit();
            return ['status' => 8, 'msg' => '设置成功！'];
        }catch(\Exception $e){
            // 回滚事务
            Db::rollback();

            // 获取提示信息
            return ['status' => 0, 'msg' => $e->getMessage()];
        }

    }

    /**
     * 筛选人气王
     * 刘勇豪
     * @param int $pg_id
     * @param int $periods
     * @return array
     */
    public function select_num1($pg_id=0,$periods=0){
        if(!$pg_id || !$periods){
            return ['status' => 0, 'msg' => "参数错误！" ,'data'=>''];
        }

        $goods_info = Db("popularity_goods")->where(['pg_id'=>$pg_id])->find();
        if(empty($goods_info)){
            return ['status' => 0, 'msg' => "商品不存在！" ,'data'=>''];
        }

        $pg_membernum = $goods_info['pg_membernum'];
        $pg_state = $goods_info['pg_state'];
        $pg_periods = $goods_info['pg_periods'];
        $end_time = $goods_info['end_time'];
        $pg_chosen_num = $goods_info['pg_chosen_num'];
        $pg_type = $goods_info['pg_type'];
        $pg_spec = $goods_info['pg_spec'];
        $pg_loser_point = $goods_info['pg_loser_point'];//入选未抽中送花生
        $pg_price = $goods_info['pg_price'];//购买价格
        $pg_position = $goods_info['pg_position'];


        if($end_time < time()){
            return ['status' => 0, 'msg' => "此商品本期活动已截止，在看点别的吧！" ,'data'=>''];
        }

        if($pg_state > 1 && $pg_state <= 8){
            return ['status' => 0, 'msg' => "此商品本期活动已截止了哦！" ,'data'=>''];
        }

        // 统计已参拍人数
        $where = '';
        $where['pm_periods'] = $pg_periods;
        $where['pm_paystate'] = 8;
        $where['pg_id'] = $pg_id;
        $count = Db("popularity_member")->where($where)->count();
        if( $count < $pg_membernum ){
            return ['status' => 1, 'msg' => "活动正在进行中！还差".($pg_membernum - $count)."人成团。" ,'data'=>''];
        }else{
            // 选第一名为中奖的人
            $first_mem = Db("popularity_member")->where($where)->order("pm_popularity desc,pm_paytime")->find();

            // 更新商品状态
            $update = '';
            if($pg_type == 2){
                $update['pg_state'] = 8;//2发布会等待开始 3发布会进行中  4发布会结束 8参拍完成(先定为8)
            }else{
                $update['pg_state'] = 8;//2发布会等待开始 3发布会进行中  4发布会结束 8参拍完成
            }
            $goods_update = Db("popularity_goods")->where(['pg_id'=>$pg_id])->update($update);

            // 判断和更新下一个预上线产品上线
            $where = '';
            $where['pg_position'] = $pg_position;
            $where['end_time'] = ['gt',time()];
            $where['pg_state'] = 1;
            $where['pg_type'] = ['lt',3];
            //$where['is_show'] = 1;
            //$where['is_recommendation'] = 1;
            $where['pg_status'] = 2;

            $nex_goods = Db("popularity_goods")->where($where)->order("pg_sortnum desc")->find();
            if(!empty($nex_goods)){
                Db("popularity_goods")->where(['pg_id'=>$nex_goods['pg_id']])->order("pg_sortnum desc")->update(['pg_status'=>1,'is_show'=>1]);

                // 给收藏此商品的人发布通知
                $collect_list = Db("popularity_collection")->where(['pg_id'=>$nex_goods['pg_id']])->select();
                if(!empty($collect_list)){
                    $systemMsg = new SystemMsgService();
                    foreach($collect_list as $cv){
                        // 给收藏者发送信息
                        $msg_data['sm_addtime'] = time();//系统消息添加时间
                        $msg_data['sm_title'] = "您收藏的人气商品上线啦";//消息标题
                        $msg_data['sm_brief'] = "您收藏的人气商品上线啦，快去看看吧！";//消息简介
                        $msg_data['sm_content'] = "您在收藏的商品 ".$nex_goods['pg_name']." 商品第".$nex_goods['pg_periods']." 期人气购活动中已发布，快去会场看看吧~！";//消息内容
                        $msg_data['to_mid'] = $cv['m_id'];//收消息人ID
                        $systemMsg->add_msg($msg_data);
                    }
                }
            }


            // 更新中奖者状态
            $data = '';
            $data['pm_state'] = 3;// 3成功出道 4出道失败
            $data['pm_order_status'] = 1;// 0未中奖 1已中奖（待发货） 2已发货 3已签收
            $data['pm_publishtime'] = time();// 中奖公布时间
            $res = Db("popularity_member")->where(['pm_id'=>$first_mem['pm_id']])->update($data);

            // 给中奖者发送信息
            $systemMsg = new SystemMsgService();
            $msg_data['sm_addtime'] = time();//系统消息添加时间
            $msg_data['sm_title'] = "人气购结果";//消息标题
            $msg_data['sm_brief'] = "人气购结果通知";//消息简介
            $msg_data['sm_content'] = "恭喜您！您在 ".$goods_info['pg_name']." 商品第".$goods_info['pg_periods']." 期人气购活动中成为人气王，您将获得此奖品，已安排工作人员为您发货啦~！";//消息内容
            $msg_data['to_mid'] = $first_mem['m_id'];//收消息人ID
            $res = $systemMsg->add_msg($msg_data);

            // 没有中奖的入选擂主返花生
            // $pg_chosen_num  $pg_loser_point
            $where = '';
            $where['pm_periods'] = $pg_periods;
            //$where['pm_paystate'] = 3;
            $where['pg_id'] = $pg_id;
            $where['pm_order_status'] = 0;
            $limit = $pg_chosen_num - 1;
            $loser_list = Db("popularity_member")->where($where)->order("pm_popularity desc,pm_paytime")->limit($limit)->select();
            if(!empty($loser_list)){
                // 返花生
                foreach($loser_list as $vv){
                    if($vv['pm_paystate'] == 8 && $pg_loser_point){
                        $add = Db("member")->where(['m_id'=>$vv['m_id']])->setInc('peanut',$pg_loser_point);
                        if($add){
                            // 充值积分日志
                            $peanut_log = '';
                            $peanut_log['pl_num'] = $pg_loser_point;
                            $peanut_log['pl_time'] = time();
                            $peanut_log['from_id'] = $vv['pm_id'];
                            $peanut_log['pl_type'] = 'add';
                            $peanut_log['pl_state'] = 8;
                            $peanut_log['pl_mid'] = $vv['m_id'];
                            $peanut_log['pl_reason'] = "人气购活动安慰奖";
                            $plog_id = Db("peanut_log")->insertGetId($peanut_log);
                            // 充值积分发送系统消息
                            $msg_data['sm_addtime'] = time();//系统消息添加时间
                            $msg_data['sm_display'] = 0;//0文字通知
                            $msg_data['sm_title'] = "新花生到账";//消息标题
                            $msg_data['sm_brief'] = "赠送的人气购未中奖安慰花生";//消息简介
                            $msg_data['sm_content'] = "赠送的人气购未中奖安慰花生~，到账花生：".$pg_loser_point;//消息内容
                            $msg_data['from_id'] = 0;//0表示系统
                            $msg_data['to_mid'] = $vv['m_id'];//收消息人ID
                            $msg_id = Db::table('pai_system_msg')->insertGetId($msg_data);
                        }
                    }
                }
            }

            // 如果不是中奖者立即退款
            $where = '';
            $where['pm.pm_periods'] = $pg_periods;
            $where['pm.pm_paystate'] = 8;
            $where['pm.pg_id'] = $pg_id;
            $where['pm.pm_order_status'] = 0;
            $row = Db("popularity_member")->alias("pm")
                ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
                ->where($where)
                ->select();

            // 执行退款、发送消息 并 更改订单状态
            if(!empty($row)){
                foreach($row as $v){
                    $pm_paymoney = $v['pm_paymoney'];
                    $m_id = $v['m_id'];

                    $refund['refund_time'] = time();
                    $refund['m_id'] = $m_id;
                    $refund['refund_money'] = $pm_paymoney;
                    $refund['refund_success_time'] = time();
                    $refund['refund_state'] = 8;
                    $refund['refund_fromid'] = $v['pm_id'];
                    $refund['refund_reason'] = "人气购未能成为人气王退款";
                    $refund['refund_from_type'] = 2;
                    $refund_id = Db("refund")->insertGetId($refund);


                    // 2.生成money_log日志
                    if($refund_id){
                        $money_log['ml_type'] = 'add';
                        $money_log['ml_reason'] = "未拍中自动退款";
                        $money_log['ml_table'] = 4;
                        $money_log['ml_money'] = $pm_paymoney;
                        $money_log['money_type'] = 1;//1余额  2收益
                        $money_log['nickname'] = $v['m_name'];
                        $money_log['position'] = $v['m_levelid'];
                        $money_log['add_time'] = time();
                        $money_log['from_id'] = $refund_id;
                        $money_log['m_id'] = $v['m_id'];
                        $log_id = Db("money_log")->insertGetId($money_log);
                    }

                    // 3.返款到用户表
                    Db("member")->where(['m_id'=>$v['m_id']])->setInc('m_money',$pm_paymoney);

                    // 更新未中奖者状态
                    $data = '';
                    $data['pm_state'] = 4;// 3成功出道 4出道失败
                    $data['pm_paystate'] = 3;// 1未支付 2退款中 3退款完成  8支付成功
                    $res = Db("popularity_member")->where(['pm_id'=>$v['pm_id']])->update($data);

                    // 给没有出道者发送信息
                    $systemMsg = new SystemMsgService();
                    $msg_data['sm_addtime'] = time();//系统消息添加时间
                    $msg_data['sm_title'] = "人气购结果";//消息标题
                    $msg_data['sm_brief'] = "人气购结果通知";//消息简介
                    $msg_data['sm_content'] = "很遗憾！您在 ".$goods_info['pg_name']." 商品第".$goods_info['pg_periods']." 期人气购活动中未能成为人气王，您的参拍金额已为您全额退款，请查收！";//消息内容
                    $msg_data['to_mid'] = $v['m_id'];;//收消息人ID
                    $res = $systemMsg->add_msg($msg_data);
                }
            }
        }
        return ['status' => 8, 'msg' => "人气王已经产生" ,'data'=>''];
    }

    /**
     * 根据pg_id立即发布商品中奖人
     * 刘勇豪
     */
    public function now_publish($pg_id=0,$periods=0){
        if(!$pg_id || !$periods){
            return ['status' => 0, 'msg' => "参数错误" ,'data'=>''];
        }

        $goods_info = Db("popularity_goods")->where(['pg_id'=>$pg_id])->find();
        if(empty($goods_info)){
            return ['status' => 0, 'msg' => "商品不存在！" ,'data'=>''];
        }

        $pg_membernum = $goods_info['pg_membernum'];
        $pg_state = $goods_info['pg_state'];
        $pg_periods = $goods_info['pg_periods'];
        $end_time = $goods_info['end_time'];
        $pg_chosen_num = $goods_info['pg_chosen_num'];
        $pg_type = $goods_info['pg_type'];
        $pg_spec = $goods_info['pg_spec'];
        $pg_loser_point = $goods_info['pg_loser_point'];//现在是花生了
        $pg_price = $goods_info['pg_price'];//购买价格
        $pg_position = $goods_info['pg_position'];//

        // 选第一名为中奖的人
        $where = '';
        $where['pm_periods'] = $periods;
        $where['pm_paystate'] = 8;
        $where['pg_id'] = $pg_id;
        $first_mem = Db("popularity_member")->where($where)->order("pm_popularity desc,pm_paytime")->find();
        if(empty($first_mem)){
            return ['status' => 0, 'msg' => "主人~此商品还没有擂主参与呀！" ,'data'=>''];
        }

        // 更新商品状态
        $update = '';
        if($pg_type == 2){
            // (先也定为8，后期可能会改)
            $update['pg_state'] = 8;//2发布会等待开始 3发布会进行中  4发布会结束 8参拍完成
        }else{
            $update['pg_state'] = 8;//2发布会等待开始 3发布会进行中  4发布会结束 8参拍完成
        }
        $goods_update = Db("popularity_goods")->where(['pg_id'=>$pg_id])->update($update);

        // 判断和更新下一个预上线产品上线
        $where = '';
        $where['pg_position'] = $pg_position;

        $where['end_time'] = ['gt',time()];
        $where['pg_state'] = 1;
        $where['pg_type'] = ['lt',3];
        //$where['is_show'] = 1;
        //$where['is_recommendation'] = 1;
        $where['pg_status'] = 2;

        $nex_goods = Db("popularity_goods")->where($where)->order("pg_sortnum desc")->find();
        if(!empty($nex_goods)){
            Db("popularity_goods")->where(['pg_id'=>$nex_goods['pg_id']])->order("pg_sortnum desc")->update(['pg_status'=>1,'is_show'=>1]);

            // 给收藏此商品的人发布通知
            $collect_list = Db("popularity_collection")->where(['pg_id'=>$nex_goods['pg_id']])->select();
            if(!empty($collect_list)){
                $systemMsg = new SystemMsgService();
                foreach($collect_list as $cv){
                    // 给收藏者发送信息
                    $msg_data['sm_addtime'] = time();//系统消息添加时间
                    $msg_data['sm_title'] = "您收藏的人气商品上线啦";//消息标题
                    $msg_data['sm_brief'] = "您收藏的人气商品上线啦，快去看看吧！";//消息简介
                    $msg_data['sm_content'] = "您在收藏的商品 ".$nex_goods['pg_name']." 商品第".$nex_goods['pg_periods']." 期人气购活动中已发布，快去会场看看吧~！";//消息内容
                    $msg_data['to_mid'] = $cv['m_id'];//收消息人ID
                    $systemMsg->add_msg($msg_data);
                }
            }
        }

        // 更新中奖者状态
        $data = '';
        $data['pm_state'] = 3;// 3成功出道 4出道失败
        $data['pm_order_status'] = 1;// 0未中奖 1已中奖（待发货） 2已发货 3已签收
        $data['pm_publishtime'] = time();// 中奖公布时间
        $res = Db("popularity_member")->where(['pm_id'=>$first_mem['pm_id']])->update($data);

        // 给中奖者发送信息
        $systemMsg = new SystemMsgService();
        $msg_data['sm_addtime'] = time();//系统消息添加时间
        $msg_data['sm_title'] = "人气购结果";//消息标题
        $msg_data['sm_brief'] = "人气购结果通知";//消息简介
        $msg_data['sm_content'] = "恭喜您！您在 ".$goods_info['pg_name']." 商品第".$goods_info['pg_periods']." 期人气购活动中成为人气王，您将获得此奖品，已安排工作人员为您发货啦~！";//消息内容
        $msg_data['to_mid'] = $first_mem['m_id'];//收消息人ID
        $res = $systemMsg->add_msg($msg_data);

        // 没有中奖的入选擂主送花生
        // $pg_chosen_num  $pg_loser_point
        $where = '';
        $where['pm_periods'] = $periods;
        //$where['pm_paystate'] = 3;
        $where['pg_id'] = $pg_id;
        $where['pm_order_status'] = 0;
        $limit = $pg_chosen_num - 1;
        $loser_list = Db("popularity_member")->where($where)->order("pm_popularity desc,pm_paytime")->limit($limit)->select();
        if(!empty($loser_list)){
            // 送花生
            foreach($loser_list as $vv){
                if($vv['pm_paystate'] == 8 && $pg_loser_point){
                    $add = Db("member")->where(['m_id'=>$vv['m_id']])->setInc('peanut',$pg_loser_point);
                    if($add){
                        // 充值积分日志
                        $peanut_log = '';
                        $peanut_log['pl_num'] = $pg_loser_point;
                        $peanut_log['pl_time'] = time();
                        $peanut_log['from_id'] = $vv['pm_id'];
                        $peanut_log['pl_type'] = 'add';
                        $peanut_log['pl_state'] = 8;
                        $peanut_log['pl_mid'] = $vv['m_id'];
                        $peanut_log['pl_reason'] = "人气购活动安慰奖";
                        $plog_id = Db("peanut_log")->insertGetId($peanut_log);
                        // 充值积分发送系统消息
                        $msg_data['sm_addtime'] = time();//系统消息添加时间
                        $msg_data['sm_display'] = 0;//0文字通知
                        $msg_data['sm_title'] = "新花生到账";//消息标题
                        $msg_data['sm_brief'] = "赠送的人气购未中奖安慰花生";//消息简介
                        $msg_data['sm_content'] = "赠送的人气购未中奖安慰花生~，到账花生：".$pg_loser_point;//消息内容
                        $msg_data['from_id'] = 0;//0表示系统
                        $msg_data['to_mid'] = $vv['m_id'];//收消息人ID
                        $msg_id = Db::table('pai_system_msg')->insertGetId($msg_data);
                    }
                }
            }
        }

        // 如果不是中奖者立即退款
        $where = '';
        $where['pm.pm_periods'] = $periods;
        $where['pm.pm_paystate'] = 8;
        $where['pm.pg_id'] = $pg_id;
        $where['pm.pm_order_status'] = 0;
        $row = Db("popularity_member")->alias("pm")
            ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
            ->where($where)
            ->select();

        // 执行退款、发送消息 并 更改订单状态
        if(!empty($row)){
            foreach($row as $v){
                $pm_paymoney = $v['pm_paymoney'];
                $m_id = $v['m_id'];

                $refund['refund_time'] = time();
                $refund['m_id'] = $m_id;
                $refund['refund_money'] = $pm_paymoney;
                $refund['refund_success_time'] = time();
                $refund['refund_state'] = 8;
                $refund['refund_fromid'] = $v['pm_id'];
                $refund['refund_reason'] = "人气购未能成为人气王退款";
                $refund['refund_from_type'] = 2;
                $refund_id = Db("refund")->insertGetId($refund);


                // 2.生成money_log日志
                if($refund_id){
                    $money_log['ml_type'] = 'add';
                    $money_log['ml_reason'] = "未拍中自动退款";
                    $money_log['ml_table'] = 4;
                    $money_log['ml_money'] = $pm_paymoney;
                    $money_log['money_type'] = 1;//1余额  2收益
                    $money_log['nickname'] = $v['m_name'];
                    $money_log['position'] = $v['m_levelid'];
                    $money_log['add_time'] = time();
                    $money_log['from_id'] = $refund_id;
                    $money_log['m_id'] = $v['m_id'];
                    $log_id = Db("money_log")->insertGetId($money_log);
                }

                // 3.返款到用户表
                Db("member")->where(['m_id'=>$v['m_id']])->setInc('m_money',$pm_paymoney);

                // 更新未中奖者状态
                $data = '';
                $data['pm_state'] = 4;// 3成功出道 4出道失败
                $data['pm_paystate'] = 3;// 1未支付 2退款中 3退款完成  8支付成功
                $res = Db("popularity_member")->where(['pm_id'=>$v['pm_id']])->update($data);

                // 给没有出道者发送信息
                $systemMsg = new SystemMsgService();
                $msg_data['sm_addtime'] = time();//系统消息添加时间
                $msg_data['sm_title'] = "人气购结果";//消息标题
                $msg_data['sm_brief'] = "人气购结果通知";//消息简介
                $msg_data['sm_content'] = "很遗憾！您在 ".$goods_info['pg_name']." 商品第".$goods_info['pg_periods']." 期人气购活动中未能成为人气王，您的参拍金额已为您全额退款，请查收！";//消息内容
                $msg_data['to_mid'] = $v['m_id'];//收消息人ID
                $res = $systemMsg->add_msg($msg_data);
            }
        }
        return ['status' => 8, 'msg' => "操作完成！" ,'data'=>''];

    }

    /**
     * 根据pg_id立即发布商品中奖人
     * 刘勇豪
     * status ：0：参数错误 8成团成功 10没有成团
     */
    public function line_publish($pg_id=0,$periods=0){
        if(!$pg_id || !$periods){
            return ['status' => 0, 'msg' => "参数错误" ,'data'=>''];
        }

        $goods_info = Db("popularity_goods")->where(['pg_id'=>$pg_id])->find();
        if(empty($goods_info)){
            return ['status' => 0, 'msg' => "商品不存在！" ,'data'=>''];
        }

        $pg_membernum = $goods_info['pg_membernum'];// 成团人数
        $pg_state = $goods_info['pg_state'];
        $pg_periods = $goods_info['pg_periods'];
        $end_time = $goods_info['end_time'];
        $pg_chosen_num = $goods_info['pg_chosen_num'];
        $pg_type = $goods_info['pg_type'];
        $pg_spec = $goods_info['pg_spec'];
        $pg_loser_point = $goods_info['pg_loser_point'];//现在是花生了
        $pg_price = $goods_info['pg_price'];//购买价格
        $pg_type =  $goods_info['pg_type'];//3 线下商品

        // 判断是不是线下商品
        // if($pg_type != 3){
        //     return ['status' => 0, 'msg' => "访问被拒绝：这不是一件线下的商品哦！" ,'data'=>$goods_info];
        //  }

        // 判断商品有没有成团，没有成团要流拍（未成团）
        // 成团判定
        $where_count['pg_id'] = $pg_id;
        $where_count['pm_periods'] = $pg_periods;
        $where_count['pm_paystate'] = ['gt',1];
        $count = Db("popularity_member")->where($where_count)->count();
        if($count < $pg_membernum){
            //更新商品状态为未成团
            $update = '';
            $update['pg_state'] = 10;//2发布会等待开始 3发布会进行中  4发布会结束 8参拍完成 10未成团
            $goods_update = Db("popularity_goods")->where(['pg_id'=>$pg_id])->update($update);

            // 如果不是中奖者立即退款
            $where = '';
            $where['pm.pm_periods'] = $pg_periods;
            $where['pm.pm_paystate'] = 8;
            $where['pm.pg_id'] = $pg_id;
            $where['pm.pm_order_status'] = 0;
            $row = Db("popularity_member")->alias("pm")
                ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
                ->where($where)
                ->select();

            // 执行退款、发送消息 并 更改订单状态
            if(!empty($row)){
                foreach($row as $v){
                    $pm_paymoney = $v['pm_paymoney'];
                    $m_id = $v['m_id'];

                    $refund['refund_time'] = time();
                    $refund['m_id'] = $m_id;
                    $refund['refund_money'] = $pm_paymoney;
                    $refund['refund_success_time'] = time();
                    $refund['refund_state'] = 8;
                    $refund['refund_fromid'] = $v['pm_id'];
                    $refund['refund_reason'] = "人气购未能成团退款";
                    $refund['refund_from_type'] = 2;
                    $refund_id = Db("refund")->insertGetId($refund);

                    // 2.生成money_log日志
                    if($refund_id){
                        $money_log['ml_type'] = 'add';
                        $money_log['ml_reason'] = "未成团自动退款";
                        $money_log['ml_table'] = 4;
                        $money_log['ml_money'] = $pm_paymoney;
                        $money_log['money_type'] = 1;//1余额  2收益
                        $money_log['nickname'] = $v['m_name'];
                        $money_log['position'] = $v['m_levelid'];
                        $money_log['add_time'] = time();
                        $money_log['from_id'] = $refund_id;
                        $money_log['m_id'] = $v['m_id'];
                        $log_id = Db("money_log")->insertGetId($money_log);
                    }

                    // 3.返款到用户表
                    Db("member")->where(['m_id'=>$v['m_id']])->setInc('m_money',$pm_paymoney);

                    // 更新未中奖者状态
                    $data = '';
                    $data['pm_state'] = 4;// 3成功出道 4出道失败
                    $data['pm_paystate'] = 3;// 1未支付 2退款中 3退款完成  8支付成功
                    $data['pm_order_status'] = 4;//  4未成团
                    $res = Db("popularity_member")->where(['pm_id'=>$v['pm_id']])->update($data);

                    // 给没有出道者发送信息
                    $systemMsg = new SystemMsgService();
                    $msg_data['sm_addtime'] = time();//系统消息添加时间
                    $msg_data['sm_title'] = "人气购结果";//消息标题
                    $msg_data['sm_brief'] = "人气购结果通知";//消息简介
                    $msg_data['sm_content'] = "很遗憾！您在 ".$goods_info['pg_name']." 商品第".$goods_info['pg_periods']." 期人气购活动中因商品没有成团，您的参拍金额已为您全额退款，请查收！";//消息内容
                    $msg_data['to_mid'] = $v['m_id'];//收消息人ID
                    $res = $systemMsg->add_msg($msg_data);
                }
            }

            return ['status'=>10,'msg'=>'本期活动人数已满，再看看别的商品吧！'];
        }else{
            // 选第一名为中奖的人
            $where = '';
            $where['pm_periods'] = $periods;
            $where['pm_paystate'] = 8;
            $where['pg_id'] = $pg_id;
            $first_mem = Db("popularity_member")->where($where)->order("pm_popularity desc,pm_paytime")->find();
            if(empty($first_mem)){
                return ['status' => 0, 'msg' => "主人~此商品还没有擂主参与呀！" ,'data'=>''];
            }

            // 更新商品状态
            $update = '';
            if($pg_type == 2){
                // (先也定为8，后期可能会改)
                $update['pg_state'] = 8;//2发布会等待开始 3发布会进行中  4发布会结束 8参拍完成 10未成团
            }else{
                $update['pg_state'] = 8;//2发布会等待开始 3发布会进行中  4发布会结束 8参拍完成 10未成团
            }
            $goods_update = Db("popularity_goods")->where(['pg_id'=>$pg_id])->update($update);

            // 更新中奖者状态
            $data = '';
            $data['pm_state'] = 3;// 3成功出道 4出道失败
            $data['pm_order_status'] = 1;// 0未中奖 1已中奖（待发货） 2已发货 3已签收
            $data['pm_publishtime'] = time();// 中奖公布时间
            $res = Db("popularity_member")->where(['pm_id'=>$first_mem['pm_id']])->update($data);

            // 给中奖者发送信息
            $systemMsg = new SystemMsgService();
            $msg_data['sm_addtime'] = time();//系统消息添加时间
            $msg_data['sm_title'] = "人气购结果";//消息标题
            $msg_data['sm_brief'] = "人气购结果通知";//消息简介
            $msg_data['sm_content'] = "恭喜您！您在 ".$goods_info['pg_name']." 商品第".$goods_info['pg_periods']." 期人气购活动中成为人气王，您将获得此奖品，已安排工作人员为您发货啦~！";//消息内容
            $msg_data['to_mid'] = $first_mem['m_id'];//收消息人ID
            $res = $systemMsg->add_msg($msg_data);

            // 没有中奖的入选擂主送花生
            // $pg_chosen_num  $pg_loser_point
            $where = '';
            $where['pm_periods'] = $periods;
            //$where['pm_paystate'] = 3;
            $where['pg_id'] = $pg_id;
            $where['pm_order_status'] = 0;
            $limit = $pg_chosen_num - 1;
            $loser_list = Db("popularity_member")->where($where)->order("pm_popularity desc,pm_paytime")->limit($limit)->select();
            if(!empty($loser_list)){
                // 送花生
                foreach($loser_list as $vv){
                    if($vv['pm_paystate'] == 8 && $pg_loser_point){
                        $add = Db("member")->where(['m_id'=>$vv['m_id']])->setInc('peanut',$pg_loser_point);
                        if($add){
                            // 充值积分日志
                            $peanut_log = '';
                            $peanut_log['pl_num'] = $pg_loser_point;
                            $peanut_log['pl_time'] = time();
                            $peanut_log['from_id'] = $vv['pm_id'];
                            $peanut_log['pl_type'] = 'add';
                            $peanut_log['pl_state'] = 8;
                            $peanut_log['pl_mid'] = $vv['m_id'];
                            $peanut_log['pl_reason'] = "人气购活动安慰奖";
                            $plog_id = Db("peanut_log")->insertGetId($peanut_log);
                            // 充值积分发送系统消息
                            $msg_data['sm_addtime'] = time();//系统消息添加时间
                            $msg_data['sm_display'] = 0;//0文字通知
                            $msg_data['sm_title'] = "新花生到账";//消息标题
                            $msg_data['sm_brief'] = "赠送的人气购未中奖安慰花生";//消息简介
                            $msg_data['sm_content'] = "赠送的人气购未中奖安慰花生~，到账花生：".$pg_loser_point;//消息内容
                            $msg_data['from_id'] = 0;//0表示系统
                            $msg_data['to_mid'] = $vv['m_id'];//收消息人ID
                            $msg_id = Db::table('pai_system_msg')->insertGetId($msg_data);
                        }
                    }
                }
            }

            // 如果不是中奖者立即退款
            $where = '';
            $where['pm.pm_periods'] = $periods;
            $where['pm.pm_paystate'] = 8;
            $where['pm.pg_id'] = $pg_id;
            $where['pm.pm_order_status'] = 0;
            $row = Db("popularity_member")->alias("pm")
                ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
                ->where($where)
                ->select();

            // 执行退款、发送消息 并 更改订单状态
            if(!empty($row)){
                foreach($row as $v){
                    $pm_paymoney = $v['pm_paymoney'];
                    $m_id = $v['m_id'];

                    $refund['refund_time'] = time();
                    $refund['m_id'] = $m_id;
                    $refund['refund_money'] = $pm_paymoney;
                    $refund['refund_success_time'] = time();
                    $refund['refund_state'] = 8;
                    $refund['refund_fromid'] = $v['pm_id'];
                    $refund['refund_reason'] = "人气购未能成为人气王退款";
                    $refund['refund_from_type'] = 2;
                    $refund_id = Db("refund")->insertGetId($refund);


                    // 2.生成money_log日志
                    if($refund_id){
                        $money_log['ml_type'] = 'add';
                        $money_log['ml_reason'] = "未拍中自动退款";
                        $money_log['ml_table'] = 4;
                        $money_log['ml_money'] = $pm_paymoney;
                        $money_log['money_type'] = 1;//1余额  2收益
                        $money_log['nickname'] = $v['m_name'];
                        $money_log['position'] = $v['m_levelid'];
                        $money_log['add_time'] = time();
                        $money_log['from_id'] = $refund_id;
                        $money_log['m_id'] = $v['m_id'];
                        $log_id = Db("money_log")->insertGetId($money_log);
                    }

                    // 3.返款到用户表
                    Db("member")->where(['m_id'=>$v['m_id']])->setInc('m_money',$pm_paymoney);

                    // 更新未中奖者状态
                    $data = '';
                    $data['pm_state'] = 4;// 3成功出道 4出道失败
                    $data['pm_paystate'] = 3;// 1未支付 2退款中 3退款完成  8支付成功
                    $res = Db("popularity_member")->where(['pm_id'=>$v['pm_id']])->update($data);

                    // 给没有出道者发送信息
                    $systemMsg = new SystemMsgService();
                    $msg_data['sm_addtime'] = time();//系统消息添加时间
                    $msg_data['sm_title'] = "人气购结果";//消息标题
                    $msg_data['sm_brief'] = "人气购结果通知";//消息简介
                    $msg_data['sm_content'] = "很遗憾！您在 ".$goods_info['pg_name']." 商品第".$goods_info['pg_periods']." 期人气购活动中未能成为人气王，您的参拍金额已为您全额退款，请查收！";//消息内容
                    $msg_data['to_mid'] = $v['m_id'];//收消息人ID
                    $res = $systemMsg->add_msg($msg_data);
                }
            }
            return ['status' => 8, 'msg' => "操作完成！" ,'data'=>''];
        }
    }


    /**
     * 人气购确认订单页的url重写
     * 刘勇豪
     * @param int $pg_id
     * @param int $periods
     * @return array
     */
    public function rewrite_url($pg_id=0,$periods=0){
        if(!$pg_id){
            return ['status'=>0,'msg'=>'参数错误'];
        }

        // 查询订单详情
        $where = '';
        $where['pm_id'] = $pg_id;
        $where['pg_periods'] = $periods;
        $popgoods_info = Db("popularity_goods")->where($where)->find();
        if(empty($popgoods_info)){
            return ['status'=>0,'msg'=>'活动商品不存在！'];
        }
        if($popgoods_info['pg_state'] != 1){
            return ['status'=>0,'msg'=>'此商品本期参拍活动已结束！'];
        }

        $data['pg_id'] = $pg_id;
        $data['periods'] = $periods;
        $json_data = json_encode($data);
        $encrypt = $this->encrypt($json_data);
        return ['status'=>1,'msg'=>'success！','data'=>$encrypt];
    }

    /**
     * 分页查询订单详细列表（）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     *
     * 备注：o_paystate、o_addtime，gdr_id,o_periods是必须的
     */
    public function get_pm_detail_limit_list($where = '', $order = 'pm.pm_id desc', $field = '*', $limit = "0,5", $cache = 'popularity_member')
    {
        $list = Db("popularity_member")->alias("pm")
            ->field($field)
            ->join('pai_popularity_goods pg', 'pg.pg_id = pm.pg_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();
        return $list;
    }

    /**
     * 统计总条数
     * 刘勇豪
     * @param string $where
     * @return int|string
     */
    public function get_pm_detail_count($where = ''){
        $count = Db("popularity_member")->alias("pm")
            ->join('pai_popularity_goods pg', 'pg.pg_id = pm.pg_id', 'left')
            ->where($where)
            ->count();
        return $count;
    }

    /**
     * 人气订单详情页
     * 刘勇豪
     * @param int $pm_id
     * @return array
     */
    public function order_info_page($pm_id = 0){

        if(!$pm_id){
            return ['status'=>0,'msg'=>'参数错误！','data'=>''];
        }

        $field = '*';
        $where['pm.pm_id'] = $pm_id;

        // 订单详情
        $info = $this->order_info($where,$field);
        if(empty($info)){
            return ['status'=>0,'msg'=>'数据为空！','data'=>''];
        }

        // 最新点赞详情
        $last_joinner = Db("popularity_joinner")->alias("pj")
            ->field("m.m_id,m.m_name,m.m_avatar,pj.pj_num")
            ->join('pai_member m', 'm.m_id = pj.m_id', 'left')
            ->where(['pj.pm_id'=>$pm_id])
            ->order("pj.pj_id desc")
            ->find();
        $info['last_joinner'] = $last_joinner;

        // 当前擂主排名
        $call_sort = $this->pm_sort_by_pmid($pm_id);
        $pm_sort = $call_sort['data'];
        $info['pm_sort'] = $pm_sort;

        // 统计打气人数
        $where = '';
        $where['pj.pm_id'] = $pm_id;
        $joinner_count = $this->joinner_count($where);
        $info['joinner_count'] = $joinner_count;

        // 参与百分比
        $pg_membernum = $info['pg_membernum'];
        $info['pai_rate'] = round($joinner_count * 100 / $pg_membernum,2);

        // 揭晓时间
        $call_back = $this->get_award_time($info['pg_id'],$info['pm_periods']);
        $info['publish_time'] = $call_back['data'];

        // 人气王信息
        $call_back = $this->pop_king_info($info['pg_id'],$info['pm_periods']);
        $info['pop_king_info'] = $call_back['data'];

        // 我的信息
        $my_info = Db("member")->field("m_id,m_name,m_avatar")->where(['m_id'=>$info['m_id']])->find();
        if(!empty($my_info) && $my_info['m_name']){
            $screte_name = mb_substr($my_info['m_name'],0,1,'utf-8').'**';
            $my_info['screte_name'] = $screte_name;
        }
        $info['my_info'] = $my_info;

        // 获取二维码
        $popularity_goods = new PopularityGoodsService();
        $info['code']  = $popularity_goods->code($info['m_id'],$info['pg_id']);
        $info['url']   = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/popularity/popularitygoods/new_people/pm_id/".$info['pm_id'].'/pg_id/'.$info['pg_id'].'?share=1';
//        dump($info);die;

        //微信分享参数
        $info['share_title'] = '拍吖吖：只要¥'.$info['pg_price'].'，你敢信？快跟我一起来抢购吧！';
        $info['share_desc'] =$info['pg_name'];
        $info['share_link'] = PAI_URL.'/popularity/popularitygoods/new_people/pm_id/'.$info['pm_id'].'/pg_id/'.$info['pg_id'].'?share=1';
        $info['share_imgUrl'] = PAI_URL.$info['pg_img'];

        return ['status'=>8,'msg'=>'success！','data'=>$info];
    }

    /**
     * 订单详情
     * 刘勇豪
     * @param string $where
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function order_info($where='',$field='*'){
        $info = Db("popularity_member")->alias("pm")
            ->field($field)
            ->join('pai_popularity_goods pg', 'pg.pg_id = pm.pg_id', 'left')
            ->where($where)
            ->find();

        return $info;
    }

    /**
     * 订单退款详情
     * 刘勇豪
     * @param int $pm_id
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function refund_info($pm_id=0,$field='*'){
        $where['pm.pm_id'] = $pm_id;
        $info = Db("popularity_member")->alias("pm")
            ->field($field)
            ->join('pai_popularity_goods pg', 'pg.pg_id = pm.pg_id', 'left')
            ->where($where)
            ->find();
        if(!empty($info)){
            $where = '';
            $where['refund_fromid'] = $pm_id;
            $where['refund_from_type'] = 2;

            //初始值
            $refund_start_time = 0;
            $refund_end_time = 0;

            // 退款时间
            $refund_info = Db("refund")->where($where)->find();
            if(!empty($refund_info)){
                $refund_time = $refund_info['refund_time'];
                if($refund_time){
                    $refund_end_time = $refund_time;
                }
            }

            // 中奖公布时间 退款发布时间
            $where = '';
            $where['pm.pg_id'] = $info['pg_id'];
            $where['pm.pm_periods'] = $info['pm_periods'];
            $where['pm.pm_state'] = 3;
            //中奖者信息
            $am_info = Db("popularity_member")->alias("pm")
                ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
                ->where($where)
                ->find();
            if(!empty($am_info)){
                $am_pm_paytime = $am_info['pm_paytime'];

                $refund_start_time = $am_pm_paytime;
                if(!$refund_end_time){
                    $refund_end_time = $am_pm_paytime;
                }
            }

            $info['refund_start_time'] = $refund_start_time;
            $info['refund_end_time'] = $refund_end_time;
        }

        return $info;
    }

    /**
     * 物流信息
     * 刘勇豪
     * @param string $where
     * @param string $field
     * @return array
     */
    public function logistics_info($where = '', $field = '*'){
        $info = Db("popularity_member")->where($where)->field($field)->find();
        if(empty($info)){
            return ['status'=>0,'msg'=>"订单信息不存在!",'data'=>''];
        }
        // 图片先不管
        //$info['data_img'] = [];
        //$img_info = Db("order_logistics_img")->where(['oli_oid'=>$info['o_id']])->limit('4')->select();
        //$info['data_img'] = $img_info;
        return ['status'=>1,'msg'=>"ok!",'data'=>$info];
    }

    /**
     * 人气王详情
     * 刘勇豪
     * @param int $pg_id
     * @param int $paystate
     * @return array
     */
    public function pop_king_info($pg_id=0,$paystate=0){
        if(!$pg_id || !$paystate){
            return ['status'=>0,'msg'=>'参数错误！','data'=>''];
        }

        $where['pm.pg_id'] = $pg_id;
        $where['pm.pm_periods'] = $paystate;
        $where['pm.pm_state'] = 3;
        //中奖者信息
        $info = Db("popularity_member")->alias("pm")
            ->field("m.m_avatar,m.m_name")
            ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
            ->where($where)
            ->find();
        if(!empty($info)){
            $m_name = $info['m_name'];
            $screte_name = '';
            if(!empty($m_name)){
                $screte_name = mb_substr($m_name,0,1,'utf-8')."**";
            }
            $info['screte_name'] = $screte_name;
        }

        return ['status'=>1,'msg'=>'ok！','data'=>$info];

    }

    /**
     * 跟新擂主收货地址
     * 刘勇豪
     * @param $address_id
     * @param $pm_id
     * @return array
     */
    public function change_address($address_id=0,$pm_id=0){
        if(!$address_id || !$pm_id){
            return ['status'=>0,'msg'=>'参数错误！','data'=>''];
        }

        // 地址详情
        $where['address_id'] = $address_id;
        $address = new AddressService();
        $address_info = $address->addressInfo($where);
        if(empty($address_info)){
            return ['status'=>0,'msg'=>'地址不存在！','data'=>''];
        }

        // 擂主信息
        $where = '';
        $where['pm_id'] = $pm_id;
        $pm_info = Db("popularity_member")->where($where)->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>'擂主信息不存在！','data'=>''];
        }

        $pm_order_status = $pm_info['pm_order_status'];
        if($pm_order_status == 2 || $pm_order_status == 3){
            return ['status'=>0,'msg'=>'订单发货或签收，不能更改地址了！','data'=>''];
        }

        $data['pm_address'] = $address_info['province'].$address_info['city'].$address_info['district'].$address_info['address'];
        $data['pm_receiver'] = $address_info['name'];
        $data['pm_mobile'] = $address_info['tel'];
        $data['pm_addressid'] = $address_info['address_id'];

        Db("popularity_member")->where(['pm_id'=>$pm_id])->update($data);

        return ['status'=>1,'msg'=>'ok ！','data'=>$address_info];

    }

    /**
     * 获取人气值详情
     * @param int $m_id
     * @return array
     */
    public function get_mypop_info($m_id=0){
        if(!$m_id){
            return ['status'=>0,'msg'=>'参数错误！','data'=>''];
        }
        $mem_info = Db("member")->where(['m_id'=>$m_id])->find();
        if(empty($mem_info)){
            return ['status'=>0,'msg'=>'用户不存在！','data'=>''];
        }

        // 剩余更新人气值时间
        $where['m_id'] = $m_id;
        $where['pl_is_refresh'] = 2;//来自自动更新
        $log_info = Db("popularity_log")->where($where)->order("pl_id desc")->find();

        $left_time = 0;
        if(!empty($log_info)){
            $pl_time = $log_info['pl_time'];
            $left_time = 2 * 60 * 60 - (time() - $pl_time);
        }

        $data['popularity'] = $mem_info['popularity'];
        $data['left_time'] = $left_time;

        $add_pop = 5;
        $max_add = 50 - $data['popularity'];
        if($add_pop > $max_add){
            $add_pop = $max_add;
        }
        $data['add_pop'] = $add_pop;
        return ['status'=>1,'msg'=>'ok！','data'=>$data];

    }

    /**
     * 发货信息处理
     * 刘勇豪
     * @param string $data
     * @return array
     */
    public function fahuo_do($data=''){
        $call_back = $this->check_logistics($data);
        if(!$call_back['status']){
            return $call_back;
        }

        $pm_id = $data['pm_id'];
        $express_corid = $data['express_corid'];
        $express_way = trim($data['express_way']);
        $express_num = $data['express_num'];
        $seller_name = $data['seller_name'];
        $seller_mobile = $data['seller_mobile'];
//        $express_img = empty($data['express_img'])?[]:$data['express_img'];

        $new_data = [];
        $new_data['pm_order_status'] = 2;//已发货
        $new_data['pm_express_corid'] = $express_corid;//快递公司ID
        $new_data['pm_express_way'] = $express_way;//快递名称
        $new_data['pm_express_num'] = $express_num;//快递单号
        $new_data['pm_seller_name'] = $seller_name;//卖家姓名
        $new_data['pm_seller_mobile'] = $seller_mobile;//卖家联系方式
        $new_data['fahuo_time'] = time();//卖家发货时间
        $new_data = array_filter($new_data);
        $res1 = Db("popularity_member")->where(['pm_id'=>$pm_id])->update($new_data);
        if(!$res1){
            $pm_order_status = Db("popularity_member")->where(['pm_id'=>$pm_id])->value('pm_order_status');
            if($pm_order_status != 2){
                return ['status'=>0,'msg'=>"系统繁忙，请稍后重试!",'data'=>''];
            }
        }

//        if(!empty($data['express_img']) && is_array($data['express_img']) ){
//            $data['express_img'] = array_values(array_filter($data['express_img']));
//            $imgs = $this->orderPai->ba64_img($data['express_img'],'express_img',300,300);
//        }else{
//            $imgs[0]='';
//        }
//        if(!empty($imgs[0])){
//            foreach($imgs as $k =>$v){
//                $data_img[$k]['oli_oid'] = $o_id;
//                $data_img[$k]['oli_img'] = $v;
//            }
//            $add = Db("order_logistics_img")->insertAll($data_img);
//            if(!$add){
//                return ['status'=>0,'msg'=>"系统繁忙，图片保存不成功!",'data'=>''];
//            }
//        }
        return ['status'=>1,'msg'=>"物流信息填写成功！",'data'=>$new_data];

    }

    /**
     * 非普通商品直接发货成功
     * 刘勇豪
     * @param int $pm_id
     * @param int $m_id
     * @return array
     */
    public function send_out($pm_id=0,$m_id=0){
        if(!$pm_id || !$m_id){
            return ['status'=>0,'msg'=>"参数错误!"];
        }

        $pm_info = Db("popularity_member")->where(['pm_id'=>$pm_id])->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>"擂主订单不存在!"];
        }

        $pm_order_status = $pm_info['pm_order_status'];//订单状态
        $o_m_id = $pm_info['m_id'];//订单所属
        $pg_id = $pm_info['pg_id'];//商品id

        if($pm_order_status != 1){
            return ['status'=>0,'msg'=>"订单状态有误!"];
        }

        $res = Db("popularity_member")->where(['pm_id'=>$pm_id])->update(["pm_order_status"=>2,"fahuo_time"=>time()]);
        if(!$res){
            return ['status'=>0,'msg'=>"数据库繁忙，订单装填更新失败！!"];
        }

        return ['status'=>1,'msg'=>"订单发货成功！",'data'=>2];

    }

    /**
     * 买家添加物流信息的表单验证
     * 刘勇豪
     * @param $data
     * @return array
     */
    public function check_logistics($data){
        // 订单id
        if(!isset($data['pm_id']) || empty($data['pm_id'])){
            return ['status'=>0,'msg'=>"缺少订单编号!",'data'=>$data];
        }

        // 物流id
        if(!isset($data['express_corid']) || empty($data['express_corid'])){
            return ['status'=>0,'msg'=>"请填写物流信息1!",'data'=>$data];
        }

        // 物流信息
        if(!isset($data['express_way']) || empty($data['express_way'])){
            return ['status'=>0,'msg'=>"请填写物流信息2!",'data'=>$data];
        }

        // 快递单号
        if(!isset($data['express_num']) || empty($data['express_num'])){
            return ['status'=>0,'msg'=>"请填写快递单号!",'data'=>$data];
        }

        // 卖家姓名
        if(!isset($data['seller_name']) || empty($data['seller_name'])){
            return ['status'=>0,'msg'=>"请填卖家姓名!",'data'=>$data];
        }

        // 联系电话
        if(!isset($data['seller_mobile']) || empty($data['seller_mobile'])){
            return ['status'=>0,'msg'=>"请填联系电话!",'data'=>$data];
        }

//        if(!preg_match('/^1[3-9][0-9]{9}$|^0\d{2,3}-?\d{7,8}$/',$data['seller_mobile'])){
//            return ['status'=>0,'msg'=>"联系电话格式错误!",'data'=>$data];
//        }

        return ['status'=>1,'msg'=>"ok!",'data'=>$data];
    }

    /**
     * 订单签收
     * 刘勇豪
     * @param int $pm_id
     * @param int $m_id
     * @return array
     */
    public function confirm_pm($pm_id=0,$m_id=0){
        if(!$pm_id || !$m_id){
            return ['status'=>0,'msg'=>"参数错误！",'data'=>''];
        }

        $pm_info = Db("popularity_member")->where(['pm_id'=>$pm_id])->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>"擂主信息不存在！",'data'=>''];
        }

        if($pm_info['m_id'] != $m_id){
            return ['status'=>0,'msg'=>"不是你的订单！",'data'=>''];
        }

        $pm_order_status = $pm_info['pm_order_status'];
        if($pm_order_status != 2){
            return ['status'=>0,'msg'=>"订单状态有误！",'data'=>''];
        }

        $data = '';
        $data['pm_order_status'] = 3;
        $data['qianshou_time'] = time();
        $data['chengjiao_time'] = time();
        $res = Db("popularity_member")->where(['pm_id'=>$pm_id])->update($data);
        if(!$res){
            return ['status'=>0,'msg'=>"系统繁忙！",'data'=>''];
        }

        return ['status'=>1,'msg'=>"订单签收成功！",'data'=>$res];

    }

    /**
     * 删除订单
     * 刘勇豪
     * @param int $pm_id
     * @param int $m_id
     * @return array
     */
    public function delete_pm($pm_id=0,$m_id=0){
        if(!$pm_id || !$m_id){
            return ['status'=>0,'msg'=>"参数错误！",'data'=>''];
        }

        $pm_info = Db("popularity_member")->where(['pm_id'=>$pm_id])->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>"擂主信息不存在！",'data'=>''];
        }

        if($pm_info['m_id'] != $m_id){
            return ['status'=>0,'msg'=>"不是你的订单！",'data'=>''];
        }

        $pm_order_status = $pm_info['pm_order_status'];
        $pm_state = $pm_info['pm_state'];
        $pm_paystate = $pm_info['pm_paystate'];

        if($pm_order_status != 3 && $pm_paystate != 3 ){
            return ['status'=>0,'msg'=>"未完成订单不能删除哦！",'data'=>''];
        }

        $res = Db("popularity_member")->where(['pm_id'=>$pm_id])->update(['pm_isdelete'=>2]);
        if(!$res){
            return ['status'=>0,'msg'=>"系统繁忙！",'data'=>''];
        }

        return ['status'=>1,'msg'=>"订单删除成功！",'data'=>$res];

    }

     /**
     * 分页查询订单详细列表（）
     * 创建人 刘勇豪
     * 时间 2018-07-11 16:09:00
     *
     * 备注：o_paystate、o_addtime，gdr_id,o_periods是必须的
     */
    public function get_champion_limit_list($where = '', $order = 'pm.pm_id desc', $field = '*', $limit = "0,5", $cache = 'popularity_member')
    {
        $list = Db("popularity_member")->alias("pm")
            ->field($field)
            ->join('pai_popularity_goods pg', 'pg.pg_id = pm.pg_id', 'left')
            ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->select();
        return $list;
    }

    /**
     * 统计总条数
     * 刘勇豪
     * @param string $where
     * @return int|string
     */
    public function get_champion_list_count($where = ''){
        $count = Db("popularity_member")->alias("pm")
            ->join('pai_popularity_goods pg', 'pg.pg_id = pm.pg_id', 'left')
            ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
            ->where($where)
            ->count();
        return $count;
    }

    /**
     * 判断线下商品自动更新中奖
     * 刘勇豪
     * @param int $pg_id
     * @param int $periods
     * @return array
     */
    public function auto_line_publish($pg_id=0,$periods=0){
        if(!$pg_id || !$periods){
            return ['status'=>0,'msg'=>"参数错误！",'data'=>''];
        }

        // 商品状态
        $where['pg_id'] = $pg_id;
        $where['pg_periods'] = $periods;
        $pop_goods_info = Db("popularity_goods")->where($where)->find();
        if(empty($pop_goods_info)){
            return ['status'=>0,'msg'=>"商品不存在！",'data'=>''];
        }

        $pg_state = $pop_goods_info['pg_state'];
        if($pg_state > 1 && $pg_state < 10){
            // 参拍结束，直接判断人气王状态订单状态
            $where = '';
            $where['pg_id'] = $pg_id;
            $where['pm_periods'] = $periods;
            $where['pm_state'] = 3;// 出道成功
            $pm_info = Db("popularity_member")->alias("pm")
                ->field("m.m_name,m.m_avatar,pm.pm_popularity,pm.pm_state,pm.m_id")
                ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
                ->where($where)
                ->find();
            if(empty($pm_info)){
                return ['status'=>1,'msg'=>"Being processed1 ！",'data'=>$pm_info,'left_time'=>0];
            }else{
                $pm_info['short_pop'] = $this->num_to_wan($pm_info['pm_popularity']);
                return ['status'=>8,'msg'=>"success ！",'data'=>$pm_info,'left_time'=>0];
            }
        }elseif($pg_state == 10){
            return ['status'=>10,'msg'=>"商品未能成团 ！",'data'=>'','left_time'=>0];
        }else{
            // 判断剩余公布时间
            $left_time = $pop_goods_info['end_time'] - time();
            if($left_time > 10){
                // 如果时间超过10秒，不处理
                return ['status'=>1,'msg'=>"Being processed2 ！",'data'=>'','left_time'=>$left_time];
            }else{
                $redis = RedisCache::getInstance();
                $redis_name = 'pop'.$pg_id.'_'.$periods;
                $get_val = $redis->get($redis_name);

                if(!$get_val){
                    $set = $redis->set($redis_name,1);
                    $call_back = $this->line_publish($pg_id,$periods);
                    if(!$call_back['status']){
                        $set = $redis->set($redis_name,0);
                        return $call_back;
                    }elseif($call_back['status'] < 10){
                        // 返回中奖者信息
                        $left_time = $pop_goods_info['end_time'] - time();
                        $where = '';
                        $where['pg_id'] = $pg_id;
                        $where['pm_periods'] = $periods;
                        $where['pm_state'] = 3;// 出道成功
                        $pm_info = Db("popularity_member")->alias("pm")
                            ->field("m.m_name,m.m_avatar,pm.pm_popularity,pm.pm_state,pm.m_id")
                            ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
                            ->where($where)
                            ->find();
                        if(empty($pm_info)){
                            $set = $redis->set($redis_name,0);
                            return ['status'=>1,'msg'=>"Being processed4 ！",'data'=>$pm_info,'left_time'=>$left_time,'get_val'=>$get_val];
                        }else{
                            $set = $redis->set($redis_name,8);
                            $pm_info['short_pop'] = $this->num_to_wan($pm_info['pm_popularity']);
                            return ['status'=>8,'msg'=>"success ！",'data'=>$pm_info,'left_time'=>$left_time,'get_val'=>$get_val];
                        }
                    }else{
                        $set = $redis->set($redis_name,8);
                        return ['status'=>10,'msg'=>"商品未能成团2！",'data'=>'','left_time'=>0];
                    }
                }else{

                    // 商品状态
                    $where['pg_id'] = $pg_id;
                    $where['pg_periods'] = $periods;
                    $pop_goods_info = Db("popularity_goods")->where($where)->find();
                    if(empty($pop_goods_info)){
                        return ['status'=>0,'msg'=>"商品不存在！",'data'=>''];
                    }
                    if($pop_goods_info['pg_state'] == 10){
                        //未成团
                        $set = $redis->set($redis_name,8);
                        return ['status'=>10,'msg'=>"商品未能成团 ！",'data'=>'','left_time'=>0];
                    }else{
                        // 返回中奖者信息
                        $left_time = $pop_goods_info['end_time'] - time();
                        $where = '';
                        $where['pg_id'] = $pg_id;
                        $where['pm_periods'] = $periods;
                        $where['pm_state'] = 3;// 出道成功
                        $pm_info = Db("popularity_member")->alias("pm")
                            ->field("m.m_name,m.m_avatar,pm.pm_popularity,pm.pm_state,pm.m_id")
                            ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
                            ->where($where)
                            ->find();
                        if(empty($pm_info)){
                            $set = $redis->set($redis_name,0);
                            return ['status'=>1,'msg'=>"Being processed4 ！",'data'=>$pm_info,'left_time'=>$left_time,'get_val'=>$get_val];
                        }else{
                            $set = $redis->set($redis_name,8);
                            $pm_info['short_pop'] = $this->num_to_wan($pm_info['pm_popularity']);
                            return ['status'=>8,'msg'=>"success ！",'data'=>$pm_info,'left_time'=>$left_time,'get_val'=>$get_val];
                        }
                    }
                }
            }
        }
    }

    /**
     * 数字转化为万
     * 刘勇豪
     * @param int $num
     * @return int
     */
    public function num_to_wan($num=0){
        if($num >= 10000){
            $num = intval($num);
            $wan = substr($num,0,-4);
            $qian = substr($num,-4,1);
            $num = $wan.'.'.$qian.'w';
        }
        return $num;
    }


    /**
     * 获取人气商品的中奖时间
     * 刘勇豪
     * @param int $pg_id
     * @param int $periods
     * @return array
     */
    public function get_award_time($pg_id=0,$periods=0){
        if(!$pg_id){
            return ['status'=>0,'msg'=>"参数错误！",'data'=>''];
        }
        // 商品状态
        $where['pg_id'] = $pg_id;
        $where['pg_periods'] = $periods;
        $pop_goods_info = Db("popularity_goods")->where($where)->find();
        if(empty($pop_goods_info)){
            return ['status'=>0,'msg'=>"商品不存在！",'data'=>''];
        }

        $pg_state = $pop_goods_info['pg_state'];
        $pg_type = $pop_goods_info['pg_type'];
        $end_time = $pop_goods_info['end_time'];

        $last_pay_pm = '';
        if($pg_type == 3){
            $publish_time = $end_time;
        }else{
            // 本期中奖者的中奖时间
            $where = '';
            $where['pg_id'] = $pg_id;
            $where['pm_periods'] = $periods;
            $where['pm_state'] = 3;// 中奖
            $award_info = Db("popularity_member")->where($where)->find();
            $pm_publishtime = 0;
            if(!empty($award_info) && $award_info['pm_publishtime']){
                $pm_publishtime = $award_info['pm_publishtime'];
            }

            // 最后一个擂主的退款 和 付款时间
            $where = '';
            $where['pg_id'] = $pg_id;
            $where['pm_periods'] = $periods;
            $last_pay_pm = Db("popularity_member")->where($where)->order("pm_paytime desc")->find();
            $last_pm_paytime = $last_pay_pm['pm_paytime'];
            $last_pm_id = $last_pay_pm['pm_id'];
            $last_m_id = $last_pay_pm['m_id'];

            $last_pay_pm = Db("refund")->where(['refund_fromid'=>$last_pm_id,'m_id'=>$last_m_id])->find();
            $last_refund_time = 0;
            if(!empty($last_pay_pm)){
                $last_refund_time = $last_pay_pm['refund_time'];
            }

            if($pm_publishtime){
                $publish_time = $pm_publishtime;
            }elseif($last_refund_time){
                $publish_time = $last_refund_time;
            }else{
                $publish_time = $last_pm_paytime;
            }

            if(!$publish_time && $pop_goods_info["pg_state"] > 1){
                $publish_time = $end_time;
            }
        }


        return ['status'=>1,'msg'=>"success ！",'data'=>$publish_time];
    }

    /**
     * 修改订单地址
     * 刘勇豪
     * @param int $pm_id
     * @param string $data
     * @return array
     */
    public function address_post($pm_id=0,$data=''){
        if(!isset($data['pm_receiver']) || empty($data['pm_receiver'])){
            return ['status'=>0,'msg'=>" 请填写收货人！",'data'=>''];
        }

        if(!isset($data['pm_mobile']) || empty($data['pm_mobile'])){
            return ['status'=>0,'msg'=>" 请填写联系方式！",'data'=>''];
        }

        if(!isset($data['pm_address']) || empty($data['pm_address'])){
            return ['status'=>0,'msg'=>" 请填写收货地址！",'data'=>''];
        }

        if(!isset($data['pm_addressid']) || empty($data['pm_addressid'])){
            return ['status'=>0,'msg'=>" 内部参数错误，请联系程序员修改！",'data'=>''];
        }

        $res = Db("popularity_member")->where(['pm_id'=>$pm_id])->update($data);

        return ['status'=>1,'msg'=>"success ！",'data'=>$res];
    }


    /**
     * 统计用户人气王订单未填写地址的订单
     * 刘勇豪
     * @param int $m_id
     * @return array
     */
    public function count_noaddress_order($m_id=0){

        if(!$m_id){
            return ['status'=>0,'msg'=>"用户未登录 ！",'data'=>''];
        }

        $where = '';
        $where['pm.pm_state'] = 3;//中奖
        $where['pm.pm_order_status'] = 1;//待发货
        $where['pm.m_id'] = $m_id;//
        $list = Db("popularity_member")->alias("pm")
            ->join('popularity_goods pg', 'pm.pg_id = pg.pg_id', 'left')
            ->where($where)
            ->where('pm.pm_addressid',null)
            ->select();
        $count = 0;
        $data['count'] = $count;
        $data['first_pg_img'] = '';
        $data['first_pg_name'] = '';
        $data['pm_id'] = '';
        if(!empty($list)){
            $count = count($list);
            $data['count'] = $count;
            $data['first_pg_img'] = $list[0]['pg_img'];
            $data['first_pg_name'] = $list[0]['pg_name'];
            $data['pm_id'] = $list[0]['pm_id'];
        }
        return ['status'=>1,'msg'=>"success ！",'data'=>$data];
    }

    /**
     * 获取订单的地址可修改状态
     * 刘勇豪
     * @param int $pm_id
     * @return array
     */
    public function get_pm_address_status($pm_id=0){
        if(!$pm_id){
            return ['status'=>0,'msg'=>"参数错误 ！",'data'=>''];
        }

        $pm_info = Db("popularity_member")->where(['pm_id'=>$pm_id])->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>"订单不存在 ！",'data'=>''];
        }

        $pm_state = $pm_info['pm_state'];
        if($pm_state > 3){
            return ['status'=>1,'msg'=>" 请点击收货地址完成添加～地址添加后不可更改！",'data'=>$pm_state];
        }else{
            return ['status'=>1,'msg'=>"请点击收货地址完成添加～人气王揭晓后地址不可更改！",'data'=>$pm_state];
        }

    }

    /**
     * 机器人列表
     * 刘勇豪
     * @param string $where
     * @param string $order
     * @param string $field
     * @param string $limit
     * @return false|mixed|\PDOStatement|string|\think\Collection
     */
    public function get_robot_list($where = '', $order = 'm_id asc', $field = '*', $limit = "0,5"){
        $list = Db::table("pai_member")->alias('m')
            ->field($field)
            ->where($where)
            ->where(['is_jq'=>1])
            ->order($order)
            ->limit($limit)
            ->select();
        if(!empty($list)){
            foreach($list as $k=>$v){
                $m_mobile = $v['m_mobile'];
                $m_mobile2 = $this->decrypt($m_mobile);
                $list[$k]['m_mobile2'] = $m_mobile2;
            }
        }
        return $list;
    }

    /**
     * 机器人列表
     * 刘勇豪
     * @param string $where
     * @param string $order
     * @param string $field
     * @param string $limit
     * @return false|mixed|\PDOStatement|string|\think\Collection
     */
    public function get_robot_list2($where = '', $order = 'm_id asc', $field = '*', $limit = "0,5"){

        $list = Db::table("pai_member")
            ->field($field)
            ->where($where)
            ->where(['is_jq'=>1])
            ->order($order)
            ->limit($limit)
            ->select();
        if(!empty($list)){
            foreach($list as $k=>$v){
                $m_mobile = $v['m_mobile'];
                $m_mobile2 = $this->decrypt($m_mobile);
                $list[$k]['m_mobile2'] = $m_mobile2;

                // 随机人气值
                //2位小数的随机数
                $list[$k]['round_num'] = sprintf("%.2f", (30 + mt_rand() / mt_getrandmax() * (50 - 30)));

            }
        }
        return $list;
    }

    /**
     * 添加机器擂主
     * 刘勇豪
     */
    public function add_pm($pg_id = 0,$ids=''){
        if(!$pg_id || !$ids){
            return ['status'=>0,'msg'=>"参数错误！",'data'=>''];
        }

        $goods_info  = Db("popularity_goods")->where(['pg_id'=>$pg_id])->find();
        if(empty($goods_info)){
            return ['status'=>0,'msg'=>"商品不存在！",'data'=>''];
        }
        $pg_state = $goods_info['pg_state'];
        $pg_price = $goods_info['pg_price'];
        $pg_periods = $goods_info['pg_periods'];

        if($pg_state != 1){
            return ['status'=>0,'msg'=>"此商品参拍已结束了！",'data'=>''];
        }

        $ids = rtrim($ids,",");
        $arr_ids = explode(",", $ids);

        if(!empty($arr_ids)){
            $data = '';
            $back = '';
            foreach($arr_ids as $v){
                $where = '';
                $where['m_id'] = $v;
                $where['pm_periods'] = $pg_periods;
                $where['pg_id'] = $pg_id;
                $find = Db("popularity_member")->where($where)->find();
                if(empty($find)){
                    $data['m_id'] = $v;
                    $data['pm_state'] = 2;
                    $data['pm_periods'] = $pg_periods;
                    $data['pm_paystate'] = 8;
                    $data['add_time'] = time();
                    $data['pm_paytime'] = time();
                    $data['pm_paymoney'] = $pg_price;
                    $data['pg_id'] = $pg_id;
                    $back[] = Db("popularity_member")->insertGetId($data);
                }
            }
        }

        return ['status'=>1,'msg'=>"success",'data'=>$back];
    }

    /**
     * 添加机器人给擂主点赞
     * @param int $pm_id
     * @param string $datastr
     * @return array
     */
    public function add_pm_pop($pm_id=0,$datastr=''){
        if(!$pm_id || !$datastr){
            return ['status'=>0,'msg'=>"参数错误！",'data'=>''];
        }

        $pm_info  = Db("popularity_member")->alias("pm")
            ->join('pai_member m', 'm.m_id = pm.m_id', 'left')
            ->where(['pm.pm_id'=>$pm_id])
            ->find();
        if(empty($pm_info)){
            return ['status'=>0,'msg'=>"擂主不存在！",'data'=>''];
        }
        $is_jq = $pm_info['is_jq'];
        $pm_m_id = $pm_info['m_id'];
        $pm_state = $pm_info['pm_state'];
        $pm_periods = $pm_info['pm_periods'];
        $pm_paystate = $pm_info['pm_paystate'];
        $pm_popularity = $pm_info['pm_popularity'];
        $pm_order_status = $pm_info['pm_order_status'];
        $pg_id = $pm_info['pg_id'];

        // 判断擂主是不是机器人
        if($is_jq != 1){
            return ['status'=>0,'msg'=>"擂主不是机器人，不能为他点赞！",'data'=>''];
        }

        //return ['status'=>1,'msg'=>"参数错误！",'data'=>$datastr,'pm_id'=>$pm_id];
        $datastr = rtrim($datastr,",");
        $arr_str = explode(",", $datastr);
        $data = '';
        $sum_pop = 0;
        if(!empty($arr_str)){
            foreach($arr_str as $k=>$v){
                $arr_one = explode(":", $v);
                $data[$k]['m_id'] = $arr_one[0];
                $data[$k]['pj_num'] = $arr_one[1];
                $data[$k]['pj_for_mid'] = $pm_m_id;
                $data[$k]['pj_for_pgid'] = $pg_id;
                $data[$k]['pj_periods'] = $pm_periods;
                $data[$k]['pm_id'] = $pm_id;
                $sum_pop += $arr_one[1];
            }
        }
        if(!empty($data)){
            Db("popularity_joinner")->insertAll($data);
            Db("popularity_member")->where(['pm_id'=>$pm_id])->setInc('pm_popularity',$sum_pop);
        }
        return ['status'=>1,'msg'=>"success！",'data'=>$data,'sum_pop'=>$sum_pop];



    }

    /**
     * 人气商品现有人气统计接口
     * 刘勇豪
     * @param int $m_id
     * @return array
     */
    public function get_mypop($m_id=0){
        if(!$m_id){
            return ['status'=>1,'msg'=>"没有登录！",'data'=>'100'];
        }

        $where['m_id'] = $m_id;
        $mem_info = Db("member")->where($where)->find();
        if(empty($mem_info)){
            return ['status'=>0,'msg'=>"用户不存在！",'data'=>'0'];
        }

        return ['status'=>8,'msg'=>"success！",'data'=>$mem_info['popularity']];
    }

    /**
     * 查询当前用户是否有未填写地址的中奖人气订单
     * 刘勇豪
     * @param int $m_id
     * @return array
     */
    public function find_no_address_aworder($m_id=0){
        if(!$m_id){
            return ['status'=>0,'msg'=>"没有登录！",'data'=>''];
        }

        $where['m_id'] = $m_id;
        $where['pm_state'] = 3;// 中奖订单
        $find = Db("popularity_member")->where($where)->where('pm_addressid is NULL or pm_addressid = 0')->find();
        if(empty($find)){
            return ['status'=>0,'msg'=>"no find！",'data'=>''];
        }

        return ['status'=>8,'msg'=>"success！",'data'=>$find];
    }
}