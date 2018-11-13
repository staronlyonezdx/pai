<?php
namespace app\admin\controller;
use app\data\service\search\SearchHotService;
use app\data\service\search\SearchService;
class Search extends AdminHome
{
    /**
     * 用户搜索列表
     * 邓赛赛
     */
    public function search(){
        $search = new SearchService();
        $list = $search->get_page($where=[], 'ps_id,ps_addtime,ps_keyword', 'ps_addtime desc', 20);
        $page_num = input('param.page');
        $total = $list->total();
        $page = $list->render();
        $this->assign([
            'total'=>$total,
            'list' =>$list,
            'page' =>$page,
            'page_num' =>$page_num,
        ]);
        return view();
    }
    /**
     * 删除用户搜索记录
     * 邓赛赛
     */
    public function del_self(){
       $search =  new SearchService();
        $ps_id = input('param.ps_id');
        $page = input('param.page');
       $where = [
           'ps_id'=>$ps_id,
       ];
       $res = $search->get_del($where);
       if($res){
            $this->success("删除成功","/admin/search/search?page=$page",'',1);
       }else{
           $this->error("删除失败","/admin/search/search?page=$page",'',1);
       }
    }

    /**
     * 热搜列表
     * 邓赛赛
     */
    public function search_hot(){
        $search_hot = new SearchHotService();
        $where = [];
        $list = $search_hot->get_list($where,'psh_sort asc','psh_id,psh_keyword,psh_sort','');
        $this->assign('list',$list);
        return view();
    }

    /**
     * 删除热搜信息
     * 邓赛赛
     */
    public function del_hot(){
        $psh_id = input('post.psh_id');
        $where = [
            'psh_id'=>$psh_id
        ];
        $search_hot = new SearchHotService();
        $res = $search_hot->get_del($where);
        return $res;
    }

    /**
     * 添加热搜信息add
     * 邓赛赛
     */
    public function add_hot(){
        $search_hot = new SearchHotService();
        if(request()->post()){
            $data = input('post.');
            if(empty($data['psh_sort']) || !is_numeric($data['psh_sort']) || $data['psh_sort']< 0){
                $this->error('请输入正常的排序','/admin/search/search_hot','','');
            }
            if(empty($data['psh_id'])){
                $res = $search_hot->get_add($data,'');//添加
            }else{
                $psh_id = $data['psh_id'];
                $where = ['psh_id'=>$psh_id];
                unset($data['psh_id']);
                $res = $search_hot->get_save($where,$data,'');//修改
            }
            if($res){
                $this->success("操作成功","/admin/search/search_hot",'',1);
            }else{
                $this->error("操作失败","/admin/search/search_hot",'',1);
            }
        }
        $psh_id = input('param.psh_id');
        $where = [
            'psh_id'=>$psh_id,
        ];
        $info = $search_hot->get_info($where);
        $this->assign('info',$info);
        return view();
    }

}
