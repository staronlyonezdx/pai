<?php
/**
 * User: Shine
 * Date: 2018/9/26
 * Time: 10:52
 */
namespace app\admin\controller;

use app\data\service\comm\PageWuService;
use app\data\service\promoter\PromoterRegService;

class Adminindex extends AdminHome{
    //首页展示
    public function index()
    {
        $sy_member = new PromoterRegService();
        $showrow   = 10; //一页显示的行数
        $curpage   = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况
        $offset    = ($curpage -1) * $showrow;
        $url       = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $url.="&starttime=".$_GET['starttime']."&endtime=".$_GET['endtime'];
        }
        $where1 = " m_from = 1 and is_jq=2";
        $where2 = " m_from = 1 and is_jq=2";
        $where3 = " m_from = 1 and is_jq=2";
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $stime   = $_GET['starttime'];
            $etime   = $_GET['endtime'];
            $where1 .= " AND add_time>$stime AND add_time<$etime ";
            $where2 .= " AND add_time>$stime AND add_time<$etime ";
            $where3 .= " AND add_time>$stime AND add_time<$etime ";
        }
        $total=$sy_member->get_member_counts($where1);//记录总条数
        if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow)){
            $curpage = ceil($total / $showrow); //当前页数大于最后页数，取最后一页
        }

        $ps=new PageWuService($total, $showrow, $curpage, $url, 2);
        if($showrow<$total) {
            $phtml = $ps->myde_write();
        }
        else{
            $phtml = "";
        }

        //天
        $beginToday = mktime(0,0,0,date('m'),date('d'),date('Y'));
        $endToday   = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        $where_day  = " m_from = 1 and is_jq=2 and add_time>$beginToday and add_time<$endToday ";
        $total_day  = $sy_member->get_member_counts($where_day);

        //周
        $beginLastweek  = mktime(0,0,0,date('m'),date('d')-date('w')+1,date('Y'));
        $endLastweek    = mktime(23,59,59,date('m'),date('d')-date('w')+7,date('Y'));
        $where_week     = " m_from = 1 and is_jq=2 and add_time>$beginLastweek and add_time<$endLastweek ";
        $total_week     = $sy_member->get_member_counts($where_week);

        //月
        $beginThismonth = mktime(0,0,0,date('m'),1,date('Y'));
        $endThismonth   = mktime(23,59,59,date('m'),date('t'),date('Y'));
        $where_month    = " m_from = 1 and is_jq=2 and add_time>$beginThismonth and add_time<$endThismonth ";
        $total_month    = $sy_member->get_member_counts($where_month);

        //年
        $begin_year = strtotime(date("Y",time())."-1"."-1"); //本年开始
        $end_year   = strtotime(date("Y",time())."-12"."-31"); //本年结束
        $where_year = " m_from = 1 and is_jq=2 and add_time>$begin_year and add_time<$end_year ";
        $total_year = $sy_member->get_member_counts($where_year);

        $tjhtml = "";
        if(!empty($_GET['starttime'])&& !empty($_GET['endtime'])){
            $tjhtml = "从".date("Y-m-d H:i:s",$_GET['starttime'])."至".date("Y-m-d H:i:s",$_GET['endtime'])."注册人数为<span style='color:red'>" .$total. "</span>";
        }
        else{
            $tjhtml = "总注册人数:<span style='color:red'>" .$total. "</span>; 年注册人数:<span style='color:red'>" .$total_year. "</span>; 月注册人数:<span style='color:red'>" .$total_month. "</span>; 周注册人数:<span style='color:red'>" .$total_week. "</span>; 今天注册人数:<span style='color:red'>" .$total_day. "</span>";
        }
        $pagenum = ceil($total / $showrow);
        //获取列表
        $list    = $sy_member->getPromoterList($where2,'*','add_time desc',$showrow,$offset);
        $mlist   = $sy_member->get_member_count($where3);
        $mlist   = json_encode($mlist);

        $this->assign([
            "total_day"     => $total_day,
            "total_week"    => $total_week,
            "total_month"   => $total_month,
            "total_year"    => $total_year,
            "pagenum"       => $pagenum,
            "total"         => $total,
            "tjhtml"        => $tjhtml,
            "mlist"         => $mlist
        ]);

        return $this->fetch();

    }

}