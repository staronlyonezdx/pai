<?php
/**
 * User: Shine
 * Date: 2018/9/27
 * Time: 11:34
 */
namespace app\data\service\channel;

use app\data\model\channel\ChannelModel;
use app\data\service\BaseService;

class ChannelService extends BaseService{
    protected $cache = 'channel';

    public function __construct()
    {
        parent::__construct();
        $this->channel = new ChannelModel();
        $this->cache = 'channel';
    }

    //渠道数据
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
        $data['c_name']         = input('post.c_name','');
        $data['c_identifying']  = input('post.c_identifying','');
        $data['admin_id']       = $this->cookieGets('admin_id');
        if (isset($param['pg_img'])){
            $data['c_img']      = array_filter($param['pg_img']) ? array_filter($param['pg_img']) : 0;
        }else{
            $data['c_img']      = "";
        }

        return $data;
    }

    //检验数据
    public function checkData($data,$type,$c_id){
        $err_msg = "";
        //渠道名称
        if(isset($data['c_name'])){
            if($data['c_name'] == ''){
                $err_msg .= "渠道名称不能为空！";
            }
        }

        //渠道标识
        $isBig = "/^[A-Z]+$/";
        if(isset($data['c_identifying'])){
            if($data['c_identifying'] == ''){
                $err_msg .= "渠道标识不能为空！";
            }elseif(!preg_match($isBig,$data['c_identifying'])){
                $err_msg .= "标识由大写字母组成！";
            }
        }
        if ($type == 'add'){
            $where = [
                'c_identifying' => $data['c_identifying']
            ];
            $info = $this->channel->getInfo($where,'*');
            if ($info){
                $err_msg .= "标识已被使用,请重新填写！";
            }
        }elseif ($type == 'edit'){
            $where = [
                'c_identifying' => $data['c_identifying']
            ];
            $info = $this->channel->get_value($where,'c_id');
            if ($info != $c_id){
                $err_msg .= "标识已被使用,请重新填写！";
            }
        }

        return $err_msg;
    }

    //添加渠道信息
    public function channelAdd($data){
        $res = $this->channel->getAdd($data, $this->cache);
        return $res;
    }

    //修改渠道信息
    public function channelSave($where,$data){
        $res = $this->channel->getSave($where,$data);
        return $res;
    }

    //获取渠道信息
    public function channelInfo($where,$field = '*'){
        $info = $this->channel->getInfo($where,$field);
        return $info;
    }

    //获取渠道信息
    public function channelVal($where,$field){
        $info = $this->channel->get_value($where,$field);
        return $info;
    }

    //分页获取渠道列表
    public function get_channel_list($where='',$field='*',$order='add_time desc',$page=15){
        $list = $this->channel->getPaginate($where,$field,$order,$page,$this->cache);
        return $list;
    }

    //获取渠道列表
    public function getList($where,$order='add_time desc', $field = '*'){
        $info = $this->channel->getList($where,$order,$field,$this->cache);
        return $info;
    }

    //删除渠道
    public function channelDel($where=''){
        $res = $this->channel->getDel($where, $this->cache);
        return $res;
    }

}