<?php
/**
 * User: Shine
 * Date: 2018/9/3
 * Time: 20:19
 */
namespace app\data\service\promoters;

use app\data\model\promoters\PromotersApplyModel;
use app\data\service\BaseService;
use app\data\service\member\MemberService;
use think\Image;

class PromotersApplyService extends BaseService{
    protected $cache = 'promoters_apply';

    public function __construct()
    {
        parent::__construct();
        $this->promoters = new PromotersApplyModel();
        $this->cache = 'promoters_apply';
    }

    /**
     * 获取某条
     * 邓赛赛
     */
    public function get_info($where,$field = '*'){
        $info = $this->promoters->getInfo($where,$field);
        return $info;
    }
    /**
     * 获取某值
     * 邓赛赛
     */
    public function get_value($where,$field = '*'){
        $info = $this->promoters->get_value($where,$field);
        return $info;
    }
    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where=[], $order, $field='*', $cache=''){
        $info = $this->promoters->getList($where, $order, $field, $cache);
        return $info;
    }
    /**
     * 获取列表（分页）
     * 邓赛赛
     */
    public function get_page_list($where=[], $field, $order, $page_size, $cache=''){
        $info = $this->promoters-> get_page($where, $field, $order, $page_size, $cache);
        return $info;
    }
    /**
     * 获取某列
     * 邓赛赛
     */
    public function get_column($where=[], $field='*'){
        $info = $this->promoters->getColumn($where, $field);
        return $info;
    }
    /**
     * 统计数据
     * 邓赛赛
     */
    public function get_count($where=[], $field='*'){
        $info = $this->promoters->getCount($where);
        return $info;
    }
    /**
     * 插入数据
     * 邓赛赛
     */
    public function get_add($data){
        $info = $this->promoters->getAdd($data);
        return $info;
    }
    /**
     * 更新数据
     * 邓赛赛
     */
    public function get_save($where=[], $data){
        $info = $this->promoters->getSave($where,$data);
        return $info;
    }
    /**
     * 申请推广员
     * 邓赛赛
     */
    public function set_prepare_promoters($m_id,$admin_id=''){
        $res = $this->promoters->set_prepare($m_id,$admin_id);
        return $res;
    }

    /**
     * 获取推广员推广人数
     * 邓赛赛
     */
    public function get_promoters_people_num($m_id,$is_promoters=''){
        $list = $this->promoters->promoters_people_num($m_id,$is_promoters);
        return $list;
    }
    /**
     * 推广期邀请列表（参拍和未参拍数据）
     * 邓赛赛
     */
    public function get_assessment_user($where,$is_auction,$page,$page_size){
        $offset = ($page -1) * $page_size;
        $list= $this->promoters->assessment_user_list($where,$is_auction,$offset,$page_size);
        return $list;
    }

    /**
     * 审核成为考核推广员
     * 邓赛赛
     */
    public function set_assessment_promoters($promoters,$m_id,$pa_id,$error_explain='',$admin_id=''){
        $res =  $this->promoters->assessment_promoters($promoters,$m_id,$pa_id,$error_explain,$admin_id);
        return $res;
    }

    /**
     * 推广员考核结束操作
     * 邓赛赛
     */
    public function set_assessment_end(){
        $res = $this->promoters->promoters_assessment_end();
        return $res;
    }

    /**
     * 生成二维码(会员邀请)
     * 邓赛赛
     */
    public function new_code($m_id,$file_url,$img_name,$server_url,$img){
        $code = $file_url.$img_name;
        echo 1;
        if(is_file(trim($code,'/'))){
            return '/'.trim($code,'/');
        }
        if(empty($img) || !is_file(trim($img,'/'))){
            $img='/uploads/logo/1.jpg';  //默认中间logo
        }

        if(!is_dir($file_url)){
            mkdir($file_url);
            chmod($file_url,0777);
        }
        $get_code_url = 'https://bshare.optimix.asia/barCode?site=weixin&url='.$server_url;
        $code = $file_url.$img_name;
        $content = file_get_contents($get_code_url);
        file_put_contents($code,$content);
        $image = Image::open(ltrim($img,'/'));
        $ab_img = $file_url.'/'.$m_id.'ab_img'.'.jpg';
        $image->thumb(35, 35,Image::THUMB_CENTER)->save($ab_img);
        $image = Image::open($code);
        $image->water($ab_img,Image::WATER_CENTER)->save($code);
        unlink($ab_img);
        return '/'.trim($code,'/');  //二维码路径
    }




}