<?php
/**
 * 公共Service
 *-------------------------------------------------------------------------------------------
 * 版权所有 广州市素材火信息科技有限公司
 * 创建日期 2017-07-12
 * 版本 v.1.0.0
 * 网站：www.sucaihuo.com
 *--------------------------------------------------------------------------------------------
 */

namespace app\data\service\store;
use app\data\model\store\StoreModel  as StoreModel;
use app\data\service\BaseService as BaseService;
use app\data\service\goods\GoodsService;
use think\Db;
use think\Image;
use think\Request;

class StoreService extends BaseService
{
    protected $cache = 'store';

    public function __construct()
    {
        parent::__construct();
        $this->store = new StoreModel();
        $this->cache = 'store';
    }
    /**
     * @return mixed
     * 获取单个入驻详情
     * 邓赛赛
     */
    public function BusinessAuthInfo($db,$where){
        $list = $this->store->getBusinessAuthInfo($db,$where);
        return $list;
    }
    /**
     * 设置入驻商家(后台)
     * 邓赛赛
     */
    public function setState($where,$update){
        switch($update['ba_state']){
            case 8:
                $update[ 'ba_authtime'] = time();
                $update[ 'ba_success_time'] = time();

                break;
            case 9:
                $update[ 'ba_authtime'] = time();
                break;
        }
        $db = "pai_business_auth";
        $res = $this->store->dataSave($db,$where,$update);
        return $res;
    }


    /**
     * 获取商家商品列表数量
     * 邓赛赛
     */
    public function store_goods_count($where){
        if(!$where){
            return false;
        }
        $res = Db($this->cache)
            ->alias('s')
            ->where($where)
            ->join('pai_goods g','s.store_id=g.g_storeid')
            ->count();
        return $res;
    }
    /**
     * 获取单个字段
     * 邓赛赛
     */
    public function get_value($where,$field){
        $value = $this->store->get_value($where,$field);
        return $value;
    }
    /**
     * 获取商家详情
     * @param string $where
     * @param string $field
     * @return array|false|\PDOStatement|string|\think\Model
     * 邓赛赛
     */
    public function storeInfo($where=[], $field='*')
    {
        $info =  $this->store->getInfo($where, $field, $this->cache);
        return $info;
    }

    /**
     * @param $where
     * @param $field
     * @return array|false|\PDOStatement|string|\think\Model
     * 检查保证金
     * 邓赛赛
     */
    public function checkDeposit($where,$field,$m_id){
        $goods = new GoodsService();
        $goodsInfo = $goods->get_goods_info($where,$field);
        if(!$goodsInfo){
            return ['status'=>2,'msg'=>'未查到此商品'];
        }

        $money = $goodsInfo['gp_settlement_price'];                         //保证金判定区域
        switch($money){
            case $money <= 1000:
                $goodsInfo['total_deposit'] = '1000';
                break;
            case $money > 1000 && $money<= 10000:
                $goodsInfo['total_deposit'] = '5000';
                break;
            case $money > 10000:
                $goodsInfo['total_deposit'] = '10000';
                break;
        }
        $store = new StoreService();                                        //查找已有保证金
        $store_where = [
            'm_id'=>$m_id,
        ];
        unset($goodsInfo['img']);
        //现有保证金
        $goodsInfo['self_deposit'] = $store->storeInfo($store_where,'deposit self_deposit')['self_deposit'];
        //应缴保证金
        $goodsInfo['new_deposit'] = $goodsInfo['total_deposit']-$goodsInfo['self_deposit'];
        if($goodsInfo['new_deposit']>0){
            return ['status'=>0,'msg'=>'请支付保证金','data'=>$goodsInfo];
        }else{
            return ['status'=>1,'msg'=>'保证金充足'];
        }
    }

    /**
     * 修改数据
     * 邓赛赛
     */
    public function get_save($where,$data){
        $logo = '';
        $background = '';
        //修改logo
        if(!empty($data['store_logo'])){
            $logo = $this->store->ba64_img($data['store_logo'],'avatar');
            if($logo){
                $logo=$logo[0];
            }
        }
        $store_logo =  \request()->file('store_logo');
        if($store_logo){
            $logo = $this->upload('store_logo','avatar');
        }
        if($logo){
            $data['store_logo'] = $logo;
        }
        //修改背景
        if(!empty($data['store_background_img'])){
            $background = $this->store->ba64_img($data['store_background_img'],'avatar');
            if($background){
                $background=$background[0];
            }
        }
        $store_background_img = \request()->file('store_background_img');
        if($store_background_img){
            $background = $this->upload('store_background_img','avatar');
        }
        if($background){
            $data['store_background_img'] = $background;
        }
        $res = $this->store->getSave($where,$data);
        //修改成功并且修改头像生成新的二维码
        if($res && $logo){
            $this->new_shop_code($where);
        }
        return $res;
    }

    /**
     * 搜索店铺（首页）
     * 邓赛赛
     */
    public function search_store($where,$order,$field,$page,$page_size){
        $page = $page < 1 ? 1 : $page;
        $offset = ($page-1)*$page_size;
        $list = $this->store->searchStore($where,$order,$field,$offset,$page_size);
        $list['page'] = $page;
        return $list;
    }
    /**
     *limit查询列表
     *邓赛赛
     */
    public function get_limit_list($where=[],$order='g_id desc',$field='*',$page=1,$page_size=20){
        $page = $page<1 ? 1 : $page;
        $offset = ($page - 1) * $page_size;
        $list = $this->store->get_limit_list($where,$order,$field,$offset,$page_size);
        return $list;
    }

    /**
     * 分页查询商家列表
     * 邓赛赛
     */
    public function get_page_list($where=[], $field='*', $order='add_time desc', $page=10, $cache=''){
        $list = $this->store->getPaginate($where, $field, $order, $page, $cache);
        return $list;
    }

    /**
     * 支付保证金
     * 邓赛赛
     */
    public function add_deposit($where,$data){
        $res = $this->store->addDeposit($where,$data);
        return $res;
    }

    /**
     * 生成店铺二维码
     * 邓赛赛
     */
    public function new_shop_code($where){
        $store = $this->store->getInfo($where,'store_id,m_id,store_logo,store_code');
        if(empty($store['store_logo'])){
            $store['store_logo'] = '/uploads/logo/1.jpg';  //默认中间logo
        }
        //生成新的文件夹
        $file_url = 'uploads/code/'.date("Ymd");
        if(!is_dir($file_url)){
            mkdir($file_url);
            chmod($file_url,0777);
        }
        //链接地址
        $server_url = PAI_URL."/member/shop/index/store_id/".$store['store_id'].'?share=1';  //上线地址
//        $server_url = "http://10.0.2.52/member/shop/index/store_id/".$store['store_id'];  //上线地址
        //访问线上地址生成二维码
        $get_code_url = 'https://bshare.optimix.asia/barCode?site=weixin&url='.$server_url;
        $code = $file_url.'/'.$store['store_id'].time().".jpg";
        $content = file_get_contents($get_code_url);
        file_put_contents($code,$content);
        $image = Image::open(ltrim($store['store_logo'],'/'));
        $ab_img = $file_url.'/'.$store['store_id'].'ab_img'.'.jpg';
        $image->thumb(30, 30,Image::THUMB_CENTER)->save($ab_img);
        $image = Image::open($code);
        $new_code = $file_url.'/'.$store['store_id'].time().'.jpg';
        //合成二维码
        $image->water($ab_img,Image::WATER_CENTER)->save($new_code);
        $update = [
            'store_code' =>'/'.$new_code,
        ];
        $res = $this->store->getSave($where,$update);
        //删除修改成功老路径
        if($res){
            if(is_file(trim($store['store_code'],'/'))){
                unlink(trim($store['store_code'],'/'));
            }
        }
        unlink($ab_img);
        return '/'.$new_code;  //二维码路径
    }

    /**
     * 交易明细
     * 刘勇豪
     * @param string $where
     * @param string $order
     * @param string $field
     * @param string $limit
     * @param string $cache
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function get_goodsmoney_log_list($where = '', $order = 'o.o_id asc', $field = '*', $limit = "0,5", $cache = 'store_goodsmoney_log'){
        $list = Db("store_goodsmoney_log")->alias('sgml')
            ->where($where)
            ->field($field)
            ->join('pai_order_pai o', 'o.store_id = sgml.sgml_store_id', 'left')
            ->join('pai_member m', 'm.m_id = o.m_id', 'left')
            ->order($order)
            ->limit($limit)
            ->select();
        return $list;
    }

    /**
     * 统计日志条数
     * 刘勇豪
     * @param string $where
     * @return int|string
     */
    public function count_goodsmoney_log($where=''){
        $count = Db("store_goodsmoney_log")->where($where)->count();
        return $count;
    }

}