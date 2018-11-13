<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;

class Index extends Controller
{    
	/**
     * 后台登录页面
	 * 创建人 韦丽明
	 * 时间 2017-09-06 21:10:01
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 管理员登录
	 * 创建人 韦丽明
	 * 时间 2017-09-06 21:15:11
     */	
	public function login() 
	{
		if (request()->isAjax()) 
		{			
			$login = array();
			$Base = new BaseService();
			//验证
			$type = 'username|password|code';
			$info = input('request.username')."|".input('request.password')."|".input('request.code');
			$check = $Base->checkInfo($type, $info);
			
			if($check)
			{
				return json(['s'=>$check]);
			}

			//地理位置信息获取
			$area = $Base->area();
			//自动验证IP
			$dip = new \app\data\service\ip\IpService();
			$whereIP['Ip'] = $area['ip'];		
			$resip = $dip->ipInfo($whereIP);
			
			$checkIp = $Base->checkIp($resip, $area);
			if($checkIp)
			{
				return json(['s'=>$checkIp]);
			}
			//账号信息判断
			$user = new \app\data\service\user\UserService();
			
			$username = input('request.username');
			$password = input('request.password');
			$ruesult = $user->adminLogin($username, $password, $area);
			//添加在线人数
			$statis = new \app\data\service\statis\StatisService();
			$stAdd = $statis->statisRoomAdd();
			if(!$stAdd)
			{
				$statis->statisRoomEditDoo();
			}
			return json(['s'=>$ruesult]);		
		}else {
			return json(['s'=>'非法请求']);
		}
	}
	
    /**
     * 退出登录
	 * 创建人 韦丽明
	 * 时间 2017-09-06 21:15:11
     */
	public function quit() 
	{
		$statis = new \app\data\service\statis\StatisService();
	    $where['Uid'] = \think\Session::get('ThinkUser.ID');
		$del = $statis->statisDel($where);
	    \think\Session::clear('think');
		//后台地址
		$adminurl = \think\Config::get('cmm_admin');
	    $this->redirect('/'.$adminurl);
	}
	
   /**
     * 框架显示
	 * 创建人 韦丽明
	 * 时间 2017-09-06 21:15:11
     */
	public function content() 
	{
	    new \app\cmmadmin\controller\Admin;
        //获取系统信息
        $systeminfo['THINK_VERSION'] = THINK_VERSION;
        $systeminfo['SERVER_SOFTWARE'] = $_SERVER["SERVER_SOFTWARE"];
        $systeminfo['PHP_OS'] = PHP_OS;
		//上线人数
        $statis = new \app\data\service\statis\StatisService();
		$where ['ID'] = array('>',0);
        $usercount =  $statis->statisCount($where);
		//msql版本
        $mysql=\think\Db::query("select version() AS version");
        $systeminfo['mysql']['version'] =$mysql[0]['version'];
        $info = $systeminfo;
        $this->assign('info',$info);
	    $this->assign('usercount',$usercount);
	    return $this->fetch();
	}
	
    /**
     * 管理界面
	 * 创建人 韦丽明
	 * 时间 2017-09-06 21:15:11
     */	
	public function main() 
	{
		//菜单导航
	    new \app\cmmadmin\controller\Admin;
        $module = new \app\data\service\module\ModuleService();
		$where = array();		
		$where['Sid'] = 0;
		$where['Status'] = 0;
        $list = $module->moduleList($where);
		$where2 = array();
		$where2['Sid'] = array('>',0);
		$where2['Status'] = 0;
        $volist = $module->moduleList($where2);
	    $this->assign('list', $list);
	    $this->assign('volist', $volist);
	    //===模块导航结束===
	    return $this->fetch();
	}

}
