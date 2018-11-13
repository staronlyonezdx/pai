<?php
namespace app\member\controller;
use app\data\service\system_msg\SystemMsgService;
use RedisCache\RedisCache;
use think\Cache;
use think\Db;

class Systemmsg extends MemberHome
{
    /**
     * @return mixed
     * 消息列表
     * 邓赛赛
     */
    public function index(){
        $m_id = $this->m_id;
        $where = [
            'to_mid'=>$m_id,
        ];
        $order='sm_addtime desc';
        $field='sm_id,sm_addtime,is_read,sm_type,sm_title,sm_brief,from_id,to_mid,sm_img,g_id,shop_price,sm_display,o_id,is_success';
        $page=input('param.page') ? input('param.page') : 1;
        $page_size=input('param.page_size') ? input('param.page_size') : 20;
        $msg = new SystemMsgService();
        $list['list'] = $msg->get_msg_list($where,$order,$field,$page,$page_size);
        $url='';
        foreach($list['list'] as $k => $v){
            switch ($v['sm_display']){
                case 0:         //文字系统公告
                    $url='/member/systemmsg/get_content/sm_id/'.$v['sm_id'];
                    break;
                case 1:         //审核商家
                    if($v['is_success'] == 1){
                        $url='/member/admit/apply_store';
                    }else{
                        $url='/member/goods/index';
                    }
                    break;
                case 2:         //团中消息
                    $url='/member/orderpai/index?o_id='.$v['o_id'];
                    break;
                case 3:         //发布商品
                    $url='/member/goodsproduct/index/g_id/'.$v['g_id'];
                    break;
            }
            $list['list'][$k]['url'] = $url;
        }
        $sql = "select count(*) num from pai_system_msg where sm_public=2 OR to_mid= $m_id";
        $total_num = Db::query($sql);
        $total_num = isset($total_num[0]['num']) ? $total_num[0]['num'] : 0;
        $total_page = ceil($total_num/$page_size);
        $new_num = count($list['list']);
        $list['total_num'] = $total_num;
        $list['total_page'] = $total_page;
        $list['new_num'] = $new_num;
        $list['page'] = $page;
        $list['page_size'] = $page_size;
//        dump($list);die;
        if(request()->isAjax()){
            return $list;
        }
        $this->assign('list',$list);
        $this->assign('header_title','消息中心');
        return $this->fetch();
    }

    /**
     *消息中心(分类列表)
     * 邓赛赛
     */
    public function get_category_list(){
        $this->assign('header_title','消息中心');
        return view();
    }

    /**
     * 查看内容详情
     * 邓赛赛
     */
    public function get_content(){
        $msg = new SystemMsgService();
        $sm_id = input('param.sm_id');
        if(!$sm_id){
            $this->redirect('systemmsg/index');
        }

        $info = $msg->GetSystemMsg($sm_id,$this->m_id);
        $title = empty($info['data']["sm_title"]) ? '' : $info['data']["sm_title"]  ;
        $this->assign(['info'=>$info]);
        $this->assign(['header_title'=>$title]);
        return $this->fetch();
    }

    /**
     * 修改消息状态（前台ajax请求）
     * 邓赛赛
     */
    public function set_read(){
        $m_id = $this->m_id;
        $sm_id = input('param.sm_id');
//        $where=[
//            'sm_id'=>$sm_id,
//            'to_mid'=>$m_id
//        ];
        $where['to_mid'] = [
           ['=',0 ],['=',$m_id],'OR'
        ];
        $where['sm_id'] = $sm_id;
        $msg = new SystemMsgService();
        $res = $msg->get_save($where,['is_read'=>2]);

        $redis = RedisCache::getInstance();
        if($m_id){
            $where = [
                'to_mid'=>$m_id,
                'is_read'=>1,
                'sm_public'=>1
            ];
            $msg = new SystemMsgService();
            $is_read = $msg->get_count($where);
            if($is_read){
                $redis->set('is_read_'.$m_id,1);
            }else{
                $redis->set('is_read_'.$m_id,0);
            }
        }
        return $res;
    }
}
