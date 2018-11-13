<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\model\admin\MenuModel as MenuModel;

class Menu extends AdminHome
{
    //添加
    public function menuadd() {
        $auth = new \app\data\service\adminAuthority\AdminAuthorityService();
        $menu = new \app\data\service\admin\MenuService();
        $where='authority_parent_id=0';
        $field='*';
        $order='authority_id asc';
        $authlist=$auth->adminAuthorityList($where);
        foreach($authlist as $k=>$v)
        {
            $where_son="authority_parent_id=".$v['authority_id'];
            $authlist_son=$auth->adminAuthorityList($where_son);
            $authlist[$k]['authlist_son']=$authlist_son;
        }
       $this->assign("authlist",$authlist);
        if(!empty($_GET['id']))
        {
            $where_d="menu_id=".$_GET['id'];
            $menudata=$menu->menuInfo($where_d);
            $this->assign("data",$menudata);
        }
        $where_menulist="menu_parent_id=0";
        $menulist=$menu->menuList( $where_menulist);

        $this->assign("menulist",$menulist);
        return $this->fetch();
    }

	//添加处理
    public function menuadd_do() {
        if (request()->post()) {
            $data=array();
            $data['menu_name']      = input('post.menu_name');
            $data['menu_parent_id'] = input('post.menu_parent_id');
            $data['menu_sort']      = input('post.menu_sort');
            $data['menu_c']         = input('post.menu_c');
            $data['menu_url']       = input('post.menu_url');
            $data['is_menu']        = input('post.is_menu');
            $auth_ids     = $_POST['auth_ids'];
            $auth_ids_str = '';
            $count = count($auth_ids);
            if(is_array($auth_ids)){
                foreach($auth_ids as $k=>$v){
                  $auth_ids_str.=$v;
                    if($k<$count-1)
                    {
                     $auth_ids_str.=",";
                    }
                }
            }
            $data['menu_auth_ids']=$auth_ids_str;

            if(empty($data['menu_name']))
            {
                $this->error('菜单不能为空!');
            }
            $menu = new \app\data\service\admin\MenuService();
            $menu_id=input('post.menu_id');
            if(!empty($menu_id))
            {
                $where_u="menu_id=".$menu_id;
                if ($menu->menuSave($where_u,$data)) {
                    $this->success("管理成功",url("menu/menulist"));
                }else {
                    $this->error('管理失败');
                }
            }
            else{
                if ($menu->menuAdd($data)) {
                    $this->success("管理成功",url("menu/menulist"));
                }else {
                    $this->error('管理失败');
                }
            }

        }else {
            $this->error('非法请求');
        }
    }

    //菜单列表
    public function menulist() {
        $menu = new \app\data\service\admin\MenuService();
        $where="menu_parent_id=0";
        $menulist=$menu->menuList($where);
        if(!empty($menulist)) {
            foreach ($menulist as $k => $v) {
                if($v['menu_parent_id']=='0'){
                    $menulist[$k]['menu_parent_name'] ="顶级目录";
                    $where_son="menu_parent_id=".$v['menu_id'];
                    $menulist_son=$menu->menulist($where_son);
                    $menulist[$k]['menu_son'] = $menulist_son;
                    foreach($menulist_son as $ks=>$vs)
                    {
                        $where_s = "menu_id=" . $vs['menu_parent_id'];
                        $pmenusdata = $menu->menuInfo($where_s);
                        $menulist[$k]['menu_son'][$ks]['menu_parent_name'] = $pmenusdata['menu_name'];

                        $authsarr = explode(",", $vs['menu_auth_ids']);
                        $authsstr='';
                        if (!empty($authsarr)) {
                            foreach ($authsarr as $kas => $vas) {
                                $auth = new \app\data\service\adminAuthority\AdminAuthorityService();
                                $where_aus = "authority_id=" . $vas;
                                $authsdata = $auth->adminAuthorityInfo($where_aus);
                                if ($kas == 0) {
                                    $authsstr .= $authsdata['authority_name'];
                                } else {
                                    $authsstr .= "," . $authsdata['authority_name'];
                                }
                            }
                        }
                        $menulist[$k]['menu_son'][$ks]['authstr']=$authsstr;
                    }
                }
                else{
                    $where_p = "menu_id=" . $v['menu_parent_id'];
                    $pmenudata = $menu->menuInfo($where_p);
                    $menulist[$k]['menu_parent_name'] = $pmenudata['menu_name'];
                }

                $autharr = explode(",", $v['menu_auth_ids']);
                $authstr='';
                if (!empty($autharr)) {
                    foreach ($autharr as $ka => $va) {
                        $auth = new \app\data\service\adminAuthority\AdminAuthorityService();
                        $where_au = "authority_id=" . $va;
                        $authdata = $auth->adminAuthorityInfo($where_au);
                        if ($ka == 0) {
                            $authstr .= $authdata['authority_name'];
                        } else {
                            $authstr .= "," . $authdata['authority_name'];
                        }
                    }
                }
                $menulist[$k]['authstr']=$authstr;
            }
        }
        $this->assign("menulist",$menulist);
        return $this->fetch();
    }

	//删除
	public function del() {
		//验证用户权限
		parent::userauth(63);
		if (request()->isAjax()) {
			if (!$delid=explode(',',input('post.delid'))) {
				return array('s'=>'请选中后再删除');
			}
			//将最后一个元素弹出栈
			array_pop($delid);
			$id=join(',',$delid);
			$dmenu=  new \app\common\model\Dmenu;
			if ($dmenu->where('ID','IN',$id)->delete()) {
				parent::operating(request()->path(),0,'删除成功');
				return array('s'=>'ok');
			}else {
				parent::operating(request()->path(),1,'删除失败：'.$dmenu->getError());
				return array('s'=>'删除失败');
			}
		}else {
			parent::operating(request()->path(),1,'非法请求');
			return array('s'=>'非法请求');
		}
	}
}
