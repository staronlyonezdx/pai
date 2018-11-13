<?php
/**
 * Created by PhpStorm.
 * User: zskj
 * Date: 2018/8/31
 * Time: 16:02
 */

namespace app\data\service\api;


use app\data\model\api\ApiModel;
use app\data\service\BaseService;
use think\Db;
class ApituiinviterService extends BaseService
{
    protected $cache = 'api';
    protected $members = "";
    //当前页数
    public $curpage = 1;
    public function __construct()
    {
        parent::__construct();
        $this->api = new ApiModel();
        $this->cache = 'api';

    }
    //获取各个会员分类人数
    function get_all_childcount($m_id){
        $arr = array();
        $array = Db('member')->where('tj_mid',$m_id)->select();//查询所有下级
        foreach($array as $v){
            if($v['tj_mid'] == $m_id){
                $arr[] = $v;
                $arr = array_merge($arr,$this->get_all_childcount($v['m_id']));
            };
        };
        return $arr;//返回所有下级被推荐人信息
    }
    //获取各个会员分类人数
    function get_all_childcount_wu($m_id){
        $arr = array();
        $count1 = Db('member')->where('tj_mid',$m_id)->count();//查询所有直推的数量
        $count2 = Db('member')->where('m_tj_jy1',$m_id)->count();//查询所有直推的数量
        $count3 = Db('member')->where('m_tj_jy2',$m_id)->count();//查询所有直推的数量
        $arr['zt_num']=$count1;
        $arr['jy1_num']=$count2;
        $arr['jy2_num']=$count3;
        return $arr;//返回所有下级被推荐人信息
    }
    //获取各个会员分类人数---不同等级
    function get_all_childcount_level_wu($m_id){
        $arr = array();
        $count1 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','1')->count();//查询所有创推人数量
        $count2 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','2')->count();//查询所有品推人数量
        $count3 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','3')->count();//查询所有VIP粉丝数量
        $count4 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','4')->count();//查询所有VIP粉丝数量
        $count5 = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','0')->count();//查询所有VIP粉丝数量
        $arr['ct_num']=$count1;
        $arr['pt_num']=$count2;
        $arr['vfs_num']=$count3;
        $arr['fs_num']=$count4;
        $arr['p_num']=$count5;
        return $arr;//返回所有下级被推荐人信息
    }
//递归获取所有的子分类的ID
    function get_all_child($m_id,$ml_tui_id){
        $arr = array();
        if($ml_tui_id == '0'){
            $array = Db('member')->where('tj_mid',$m_id)->select();//查询所有下级
        }elseif($ml_tui_id == '1' || $ml_tui_id == '2'){
            $array = Db('member')->where('tj_mid','eq',$m_id)->where('ml_tui_id','eq',$ml_tui_id)->select();//查询id为mid的用户的直接下级
        } elseif($ml_tui_id == '3' || $ml_tui_id == '4'){
//            $array = Db('member')->where('tj_mid','eq',$m_id)->where('ml_tui_id','eq',3)->whereor('ml_tui_id','eq',4)->select();//查询id为mid的用户的直接下级
            $array = Db('member')->where('tj_mid',$m_id)->select();
        }
        foreach($array as $v){
            if($v['tj_mid'] == $m_id){
                $arr[] = $v;
                $arr = array_merge($arr,$this->get_all_child($v['m_id'],$ml_tui_id));
            };
        };
        return $arr;//返回所有下级被推荐人信息
    }
    //递归获取所有的子分类的ID     $m_id为顶级id
    function get_all_childty($m_id){
        $arr = array();
//        $array = Db('member')->where('tj_mid',$m_id)->where('ml_tui_id','neq','0')->select();//查询id为mid的用户的直接下级
        $array = Db('member')->where('tj_mid',$m_id)->select();//查询id为mid的用户的直接下级      2018-9-4修改
        foreach($array as $v){
            if($v['tj_mid'] == $m_id){
                $arr[] = $v;
                $arr = array_merge($arr,$this->get_all_childty($v['m_id']));
            };
        };
        return $arr;//返回所有下级被推荐人信息
    }
    //读取我直接推荐的人
    public function getzhitui($where,$fields,$order,$curpage='1',$pagenum='10',$ml_tui_id){
        $table="pai_member";
        if(empty($curpage)){
            $curpage="1";
        }
        if(empty($pagenum)){
            $pagenum=10;
        }
        if($ml_tui_id == '0'){
            $where_ml = "";
        }else{
            if($ml_tui_id == '5'){//查找普通会员
                $ml_tui_id = '0';
            }
            $where_ml = " and ml_tui_id = " . $ml_tui_id;
        }
        $cn=($curpage-1)*$pagenum;
        $sql="SELECT".$fields." from ".$table." WHERE ".$where.$where_ml . " ORDER BY  ".$order." LIMIT $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
//        if(!empty($list)){
//            foreach($list as $k3=>$v3){
//                $list[$k3]['g_img']=$this->cdn_url.$v3['g_img'];
//            }
//        }
        return $list;
    }
    //读取我直接推荐的人的数量
    public function getzhitui_count($where,$ml_tui_id){
        $table="pai_member";
        if($ml_tui_id == '0'){
            $where_ml = "";
        }else{
            if($ml_tui_id == '5'){//查找普通会员
                $ml_tui_id = '0';
            }
            $where_ml = " and ml_tui_id = " . $ml_tui_id;
        }
        $sql="SELECT count(*) allnum from ".$table." WHERE ".$where.$where_ml;
        $list=Db::table($table)->query($sql);
        $n=0;
        if(!empty($list[0]['allnum'])){
            $n=$list[0]['allnum'];
        }
        return $n;
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
}