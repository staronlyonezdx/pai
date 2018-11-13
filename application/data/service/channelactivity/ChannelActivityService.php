<?php
/**
 * User: Shine
 * Date: 2018/9/27
 * Time: 18:42
 */
namespace app\data\service\channelactivity;

use app\data\model\channelactivity\ChannelActivityModel;
use app\data\service\BaseService;
use think\Db;
use think\Image;

class ChannelActivityService extends BaseService{
    protected $cache = 'channel_activity';

    public function __construct()
    {
        parent::__construct();
        $this->activity = new ChannelActivityModel();
        $this->cache = 'channel_activity';
    }

    //活动数据
    public function inputData($type){
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
        $data['ca_name']  = input('post.ca_name','');
        $data['c_id']     = input('post.c_id','');
        $data['ca_link']  = input('post.ca_link','');
        $data['admin_id'] = $this->cookieGets('admin_id');
        $data['end_time'] = strtotime(input('post.end_time',''));
        if (isset($param['pg_img'])){
            $data['ca_img'] = array_filter($param['pg_img']) ? array_filter($param['pg_img']) : 0;
        }else{
            $data['ca_img'] = "";
        }

        return $data;
    }

    //检测数据
    public function checkData($data){
        $err_msg = "";
        //活动名称
        if(isset($data['ca_name'])){
            if($data['ca_name'] == ''){
                $err_msg .= "活动名称不能为空！";
            }
        }

        //活动渠道
        if(isset($data['c_id'])){
            if($data['c_id'] == ''){
                $err_msg .= "活动渠道不能为空！";
            }
        }

        //链接验证
        $pattern   = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        if(isset($data['ca_link'])){
            if($data['ca_link'] == ''){
                $err_msg .= "活动链接不能为空！";
            }elseif(!preg_match($pattern,$data['ca_link'])){
                $err_msg .= "请填写正确活动链接！";
            }
        }
        // 结束日期
        if(isset($data['end_time'])){
            if($data['end_time'] == ''){
                $err_msg .= "结束日期不能为空！";
            }elseif($data['end_time'] < time()){
                $err_msg .= "结束日期应大于当前日期！";
            }
        }

        return $err_msg;
    }

    //获取活动详情
    public function activityInfo($where,$field = '*'){
        $info = $this->activity->getInfo($where,$field);
        return $info;
    }

    //存储活动信息
    public function activitySave($where,$data){
        $res = $this->activity->getSave($where,$data,$this->cache);
        return $res;
    }

    //插入信息
    public function activityAdd($data){
        $info = $this->activity->insertId($data);
        return $info;
    }

    //获取获取单值信息
    public function activityVal($where,$field){
        $info = $this->activity->get_value($where,$field);
        return $info;
    }

    /**
     * 生成活动二维码
     */
    public function code($ca_id,$link,$logo){
        $file_url = 'uploads/code/channelactivity';
        if(!is_dir($file_url)){
            mkdir($file_url);
            chmod($file_url,0777);
        }
        $user_code_url = $file_url.'/'.$ca_id.'.jpg';
        //有此商品二维码时直接返回路径
//        if(is_file($user_code_url)){
//            return '/'.$user_code_url;
//        }

        //api生成二维码
        $get_code_url = 'https://bshare.optimix.asia/barCode?site=weixin&url='.$link;
        $code = $file_url.'/'.$ca_id.time().".jpg";

        $content = file_get_contents($get_code_url);
        file_put_contents($code,$content);
        if(!is_file(ltrim($logo,'/'))){
            $logo = 'uploads/logo/1.jpg';
        }
        $image = Image::open(ltrim($logo,'/'));
        $ab_img = $file_url.'/'.$ca_id.'ca_img'.'.jpg';
        $image->thumb(30, 30,Image::THUMB_CENTER)->save($ab_img);
        $image = Image::open($code);
        $image->water($ab_img,Image::WATER_CENTER)->save($user_code_url);

        unlink($code);
        unlink($ab_img);
        return '/'.$user_code_url;  //二维码路径
    }

    //获取活动列表
    public function get_activity_list($where='',$field='*',$order='add_time desc'){
        $list = $this->activity->getList($where,$order,$field,$this->cache);
        return $list;
    }

    //分页获取活动列表
    public function get_activity_lists($where='',$field='*',$order='add_time desc',$page=15){
        $list = Db('channel_activity ca')
            ->join('channel c','ca.c_id = c.c_id')
            ->where($where)
            ->field($field)
            ->order($order)
            ->paginate($page,false,['query'=>request()->param() ]);
        return $list;
    }

    //删除活动
    public function activityDel($where){
        $res = $this->activity->getDel($where, $this->cache);
        return $res;
    }

}