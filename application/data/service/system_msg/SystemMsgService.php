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

namespace app\data\service\system_msg;
use app\data\model\system_msg\SystemMsgModel  as SystemMsgModel;
use app\data\service\BaseService as BaseService;
use app\data\service\member\MemberService;
use think\Db;

class SystemMsgService extends BaseService
{
    protected $cache = 'system_msg';

    public function __construct()
    {
        parent::__construct();
        $this->system_msg = new SystemMsgModel();
        $this->cache = 'system_msg';
    }

    /**
     * 获取消息列表
     * 邓赛赛
     */
    public function get_msg_list($where,$order,$field,$page=1,$page_size=20){
        if($page <=1) $page=1;
        $offset = ($page-1)*$page_size;
        $list = $this->system_msg->get_msg_list($where,$order,$field,$offset,$page_size);
        return $list;
    }

    /**
     * 统计详细数量
     * 邓赛赛
     */
    public function get_count($where){
        $num = $this->system_msg->get_count_num($where);
        return $num;
    }

    /**
     * @return mixed
     * 添加系统消息
     */
    public function AddSystemMsg($data){
        $table="system_msg";
        $result = $this->system_msg->getAdd2($table,$data, $this->cache);
        if($result){
            $data=array();
            $data['id']=$result;
            $return=array("status"=>'1',"msg"=>"添加系统消息成功","data"=>$data);
            return $return;
        }
        else{
            $return=array("status"=>'0',"msg"=>"添加系统消息失败","data"=>"");
            return $return;
        }
    }



    /**
     * 读取一条系统消息
     * 邓赛赛
     */
    public function GetSystemMsg($id,$m_id){
        $where['sm_id']=trim($id);
//        $table="system_msg";
        if(!empty($m_id)){
            $where['to_mid'] = $m_id;
        }
        $sql = "SELECT * FROM `pai_system_msg` WHERE  `sm_id` = $id AND (`to_mid` = $m_id  OR `sm_public` = 2) LIMIT 1";
        $info = Db::query($sql);
        if($info){
            $info = $info[0];
        }
        if(empty($info)){
            $return=array("status"=>'0',"msg"=>"消息内容为空","data"=>"");
            return $return;
        }
        else{
            $return=array("status"=>'1',"msg"=>"读取成功","data"=>$info);
            return $return;
        }
    }

    /**
     * 读取一条系统消息
     */
    public function GetSystemMsgList($m_id){
        if(empty($m_id)){
            $return=array("status"=>'0',"msg"=>"用户ID不能为空","data"=>"");
            return $return;
        }
        $table="system_msg";
        $page="1";
        $pagenum="5";
        $cn=$page*$pagenum;
        $sql="select m.m_id, m.m_name from pai_member m order by m_id asc limit $cn ,$pagenum ";
        $list=Db::table($table)->query($sql);
        return $list;
    }

    /**
     * 修改消息
     * 邓赛赛
     */
    public function get_save($where,$update){
        $res = $this->system_msg->getSave($where,$update,"");
        return $res;
    }

    /**
     * 根据会员等级发送消息(批量)
     * 邓赛赛
     */
    public function addSystemMsgAll($where,$insert,$order='m_id desc',$field='m_id',$page=1,$page_size=10){
        $mem = new MemberService();
        while(true){
            $offset = ($page-1)*$page_size;
            $list = $mem->get_limit($where,$order,$field,$offset,$page_size);
            foreach($list as $k =>$v){
                $insert['to_mid'] = $v['m_id'];
                $this->add_msg($insert);
            }
            if(count($list) != $page_size ){
                break;
            }
            $page ++;
        }
        return true;
    }

    /**
     * 插入数据
     * 邓赛赛
     */
    public function add_msg($data){
        $res = $this->system_msg->getAdd($data,'');
        return $res;
    }

    /**
     * 获取列表
     * 邓赛赛
     */
    public function get_list($where,$field,$order,$page){
        $list = $this->system_msg->getPaginate($where,$field,$order,$page,'');
        return $list;
    }


}