<?php
namespace app\index\controller;
use app\data\service\article\ArticleService;
use app\data\service\articleType\ArticleTypeService;
use app\data\service\BaseService;
use app\data\service\config\ConfigService;
use app\data\service\goods\GoodsService;
use app\data\service\goodsCategory\GoodsCategoryService;
use app\data\service\member\MemberService;
use app\data\service\search\SearchHotService;
use app\data\service\search\SearchService;
use app\data\service\store\StoreService;
use app\data\service\webImagesType\WebImagesTypeService;
use app\member\controller\IndexHome;
use RedisCache\RedisCache;
use think\Controller;
use think\Cookie;
use think\Db;

class Debugging extends IndexHome
{
    /**
    * 根据手机号获取用户城市地址
    * 邓赛赛
    */
//    public function add_mobile_city(){
//        set_time_limit(360);
//        Db::startTrans();
//        try{
//            $where = [
//                'm_state'=>0,
//                'm_id'=>['>',19756]
//            ];
//            $page = 1;
//            $page_size = 1000;
//            echo '程序开始'.'<br/>';
//            while(true){
//                echo '第'.$page.'页开始查询'.time().'<br/>';
//                $offset = ($page - 1) * $page_size;
//                $list = Db::table('pai_member')->where($where)->field('m_id,m_mobile')->limit($offset,$page_size)->select();
//                $data = array();
//                foreach($list as $k => $v){
//                    $base = new BaseService();
//                    $mobile = htmlspecialchars($base->decrypt($v['m_mobile']));
//                    if($mobile){
//                        $city_info = $base->mobile_city($mobile);
//                        if($city_info){
//                            $data[] = [
//                                'm_id'=>$v['m_id'],
//                                'mobile'    =>$city_info['data']['mobile'],
//                                'province'  =>$city_info['data']['province'],
//                                'city'      =>$city_info['data']['city'],
//                                'isp'       =>$city_info['data']['service_provider'],
//                                'post_code' =>trim($city_info['data']['postcode']),
//                                'city_code' =>$city_info['data']['city_code'],
//                            ];
//                        }
//                    }
//                }
//                if($data){
//                    Db::table('pai_member_area')->insertAll($data);
//                    echo '第'.$page.'页插入结束'.time().'<br/>';
//                    $page ++;
//                }else{
//                    echo '第'.$page.'页数据为空，跳出循环'.time().'<br/>';
//                    break;
//                }
//            }
//            Db::commit();
//            echo '程序执行完成'.time();
//        } catch (\Exception $e) {
//            // 回滚事务
//            Db::rollback();
//            dump('程序执行失败'.$e->getMessage().time());
//        }
//    }
//    /**
//     *提现表加入认证信息id
//     * 邓赛赛
//     */
//    public function wit_get_ac_id(){
//        $m_id_list = Db::table('pai_withdraw')->field('w_id,w_mid')->select();
//        foreach($m_id_list as $v){
//            $where = [
//                'm_id'=>$v['w_mid']
//            ];
//            $ac_id = Db::table('pai_member_attestation')->where($where)->value('id');
//            if($ac_id){
//                Db::table('pai_withdraw')->where('w_id',$v['w_id'])->update(['ac_id'=>$ac_id]);
//            }
//        }
//        echo 'ok';
//    }



}
