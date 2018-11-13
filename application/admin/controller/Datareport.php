<?php
namespace app\admin\controller;
use app\data\service\datareport\MemberService as MemberService;
use app\data\service\store\StoreService;
use think\Controller;
use think\Request;
use think\Url;
use app\data\service\BaseService as BaseService;
use think\Db;
use app\data\service\comm\PageWuService as PageWuService;
use app\data\service\datareport\RechargeService;

class Datareport extends AdminHome
{

	/**
     * 会员数据
     */
    public function member()
    {
        $MemberService =new MemberService();
        $showrow =10; //一页显示的行数
        $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
        $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
          $url.="&starttime=".$_GET['starttime']."&endtime=".$_GET['endtime'];
        }
        $where1=" 1=1 and is_jq=2 ";
        $where2="1=1  and is_jq=2 ";
        $where3="1=1  and is_jq=2 ";
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $stime=$_GET['starttime'];
            $etime=$_GET['endtime'];
            $where1.=" AND add_time>$stime AND add_time<$etime ";
            $where2.=" AND add_time>$stime AND add_time<$etime ";
            $where3.=" AND add_time>$stime AND add_time<$etime ";
        }
        if(!empty($_GET['m_from'])){
            $where1.=" AND m_from=".$_GET['m_from'];
            $where2.=" AND m_from=".$_GET['m_from'];
            $where3.=" AND m_from=".$_GET['m_from'];
        }
        $total=$MemberService->get_member_counts($where1);//记录总条数
        if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
            $curpage = ceil($total / $showrow); //当前页数大于最后页数，取最后一页

        $ps=new PageWuService($total, $showrow, $curpage, $url, 2);
        if($showrow<$total) {
            $phtml = $ps->myde_write();
        }
        else{
            $phtml="";
        }
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        $where_day=" 1=1 and add_time>$beginToday and add_time<$endToday ";
        if(!empty($_GET['m_from'])){
            $where_day=" 1=1 and is_jq=2  and add_time>$beginToday and add_time<$endToday and  m_from=".$_GET['m_from'];
        }
        $total_day=$MemberService->get_member_counts($where_day);
        $beginLastweek=mktime(0,0,0,date('m'),date('d')-date('w')+1,date('Y'));
        $endLastweek=mktime(23,59,59,date('m'),date('d')-date('w')+7,date('Y'));
        $where_week=" 1=1 and add_time>$beginLastweek and add_time<$endLastweek ";
        if(!empty($_GET['m_from'])){
            $where_week=" 1=1 and is_jq=2  and add_time>$beginLastweek and add_time<$endLastweek  and  m_from=".$_GET['m_from'];
        }
        $total_week=$MemberService->get_member_counts($where_week);
        $beginThismonth=mktime(0,0,0,date('m'),1,date('Y'));
        $endThismonth=mktime(23,59,59,date('m'),date('t'),date('Y'));
        $where_month=" 1=1 and add_time>$beginThismonth and add_time<$endThismonth ";
        if(!empty($_GET['m_from'])){
            $where_month=" 1=1 and is_jq=2  and add_time>$beginThismonth and add_time<$endThismonth and  m_from=".$_GET['m_from'];
        }
        $total_month=$MemberService->get_member_counts($where_month);
        $begin_year = strtotime(date("Y",time())."-1"."-1"); //本年开始
        $end_year = strtotime(date("Y",time())."-12"."-31"); //本年结束
        $where_year=" 1=1 and add_time>$begin_year and add_time<$end_year ";
        if(!empty($_GET['m_from'])){
            $where_year=" 1=1 and is_jq=2  and add_time>$begin_year and add_time<$end_year  and  m_from=".$_GET['m_from'];
        }
        $total_year=$MemberService->get_member_counts($where_year);
        $this->assign("total_day",$total_day);
        $this->assign("total_month",$total_month);
        $this->assign("total_week",$total_week);
        $this->assign("total_year",$total_year);
        $tjhtml="";
        if(!empty($_GET['m_from'])){
            if($_GET['m_from']=='1'){
                $tjhtml.="<span style='color:red'>拍吖吖会员：</span>";
            }
            if($_GET['m_from']=='2'){
                $tjhtml.="<span style='color:red'>诺丁百利会员：</span>";
            }
            if($_GET['m_from']=='3'){
                $tjhtml.="<span style='color:red'>晟域会员：</span>";
            }

        }
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
           $tjhtml.="从".date("Y-m-d H:i:s",$_GET['starttime'])."至".date("Y-m-d H:i:s",$_GET['endtime'])."注册人数为".$total;
        }
        else{
            $tjhtml.="总注册人数<span style='color:red'>".$total."</span>; 年注册人数:<span style='color:red'>".$total_year."</span>; 月注册人数:<span style='color:red'>".$total_month."</span>; 周注册人数:<span style='color:red'>".$total_week."</span>; 今天注册人数:<span style='color:red'>".$total_day."</span>";
        }
        $pagenum=ceil($total / $showrow);
        $this->assign("pagenum",$pagenum);
        $this->assign("total",$total);
        $this->assign("pagehtml",$phtml);
        $this->assign("tjhtml",$tjhtml);
        $list=$MemberService->get_member_list($where2);
        $mlist=$MemberService->get_member_count($where3);
        $mlist=json_encode($mlist);
        $this->assign('mlist',$mlist);
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function rechargedata()
    {
        $RechargeService =new RechargeService();
        $showrow =10; //一页显示的行数
        $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
        $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $url.="&starttime=".$_GET['starttime']."&endtime=".$_GET['endtime'];
        }
        $where1=" 1=1 and r_state=8 and r_type<>5 ";
        $where2=" 1=1 and r_state=8 and r_type<>5 ";
        $where3=" 1=1 and r_state=8 and r_type<>5 ";
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $stime=$_GET['starttime'];
            $etime=$_GET['endtime'];
            $where1.=" AND r_time>$stime AND r_time<$etime ";
            $where2.=" AND r_time>$stime AND r_time<$etime ";
            $where3.=" AND r_time>$stime AND r_time<$etime ";
        }
        $total=$RechargeService->get_recharge_count($where1);//记录总条数
        $total_all=$RechargeService->get_r_money_sum($where1);
        if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))
            $curpage = ceil($total / $showrow); //当前页数大于最后页数，取最后一页

        $ps=new PageWuService($total, $showrow, $curpage, $url, 2);
        if($showrow<$total) {
            $phtml = $ps->myde_write();
        }
        else{
            $phtml="";
        }
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        $where_day=" 1=1 and r_state=8 and r_type<>5   and r_time>$beginToday and r_time<$endToday ";
        $total_day=$RechargeService->get_r_money_sum($where_day);
        $beginLastweek=mktime(0,0,0,date('m'),date('d')-date('w')+1,date('Y'));
        $endLastweek=mktime(23,59,59,date('m'),date('d')-date('w')+7,date('Y'));
        $where_week=" 1=1 and r_state=8 and r_type<>5   and r_time>$beginLastweek and r_time<$endLastweek ";
        $total_week=$RechargeService->get_r_money_sum($where_week);
        $beginThismonth=mktime(0,0,0,date('m'),1,date('Y'));
        $endThismonth=mktime(23,59,59,date('m'),date('t'),date('Y'));
        $where_month=" 1=1 and r_state=8 and r_type<>5   and r_time>$beginThismonth and r_time<$endThismonth ";
        $total_month=$RechargeService->get_r_money_sum($where_month);
        $begin_year = strtotime(date("Y",time())."-1"."-1"); //本年开始
        $end_year = strtotime(date("Y",time())."-12"."-31"); //本年结束
        $where_year=" 1=1 and r_state=8  and r_time>$begin_year and r_time<$end_year ";
        $total_year=$RechargeService->get_r_money_sum($where_year);
        $this->assign("total_day",$total_day);
        $this->assign("total_month",$total_month);
        $this->assign("total_week",$total_week);
        $this->assign("total_year",$total_year);
        $tjhtml="";
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $tjhtml="从".date("Y-m-d H:i:s",$_GET['starttime'])."至".date("Y-m-d H:i:s",$_GET['endtime'])."支付金额为".$total_all;
        }
        else{
            $tjhtml="总支付金额".$total_all."; 年支付金额:".$total_year."; 月支付金额:".$total_month."; 周支付金额:".$total_week."; 今日支付金额:".$total_day;
        }
        $pagenum=ceil($total / $showrow);
        $this->assign("pagenum",$pagenum);
        $this->assign("totalall",$total_all);
        $this->assign("pagehtml",$phtml);
        $this->assign("tjhtml",$tjhtml);
        $list=$RechargeService->get_recharge_list($where2);
        $rlist=$RechargeService->get_r_count($where3);
        $rlist=json_encode($rlist);
        $this->assign('rlist',$rlist);
        $this->assign('list',$list);
        return $this->fetch();
    }


}
