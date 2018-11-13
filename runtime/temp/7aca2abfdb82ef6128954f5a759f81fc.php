<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\project\pai\public/../application/admin/view/adminindex/index.html";i:1541491286;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1541491286;}*/ ?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	        <link rel="stylesheet" type="text/css" href="__ADMIN_LIB_CLEARMINMASTER_CSS__/bootstrap-clearmin.min.css">

	        <link rel="stylesheet" type="text/css" href="__ADMIN_LIB_CLEARMINMASTER_CSS__/roboto.css">
	        <link rel="stylesheet" type="text/css" href="__ADMIN_LIB_CLEARMINMASTER_CSS__/material-design.css">
	        <link rel="stylesheet" type="text/css" href="__ADMIN_LIB_CLEARMINMASTER_CSS__/small-n-flat.css">
	        <link rel="stylesheet" type="text/css" href="__ADMIN_LIB_CLEARMINMASTER_CSS__/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="__CSS__/pccommon/common.css">
        	
<link rel="stylesheet" type="text/css" href="__ADMIN_LIB_CLEARMINMASTER_CSS__/summernote.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/add_admin.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/datareport_member.css">
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/timepicker/css/jquery-ui.css" />


	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/lib/jquery-2.1.3.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/jquery.mousewheel.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/jquery.cookie.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/fastclick.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/bootstrap.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/clearmin.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/home.js"></script>
            <script type="text/javascript" src="/static/h-ui.admin/lib/layer/2.4/layer.js"></script>
       		
<script src="__STATIC__/lib/timepicker/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="__STATIC__/lib/timepicker/js/jquery.ui.datepicker-zh-CN.js"></script>
<script src="__STATIC__/lib/timepicker/js/jquery-ui-timepicker-addon.js"></script>
<script src="__STATIC__/lib/timepicker/js/jquery-ui-timepicker-zh-CN.js"></script>
<script src="__STATIC__/lib/timepicker/js/jquery.ui.datepicker-zh-CN.js"></script>

        	<title>拍吖吖管理后台首页</title>
    </head>
    <body>
	 	<div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><a href="index.html" class="cm-logo"></a></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            <?php if(is_array($adminmenulist) || $adminmenulist instanceof \think\Collection || $adminmenulist instanceof \think\Paginator): $i = 0; $__LIST__ = $adminmenulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!(empty($vo['menu_son']) || (($vo['menu_son'] instanceof \think\Collection || $vo['menu_son'] instanceof \think\Paginator ) && $vo['menu_son']->isEmpty()))): ?>
                                    <li class='cm-submenu <?php if(in_array(($cmenu), is_array($vo['menu_c'])?$vo['menu_c']:explode(',',$vo['menu_c']))): ?>open <?php endif; ?> '>
                                        <a class="sficon_<?php echo $key+1; ?>"><?php echo $vo['menu_name']; ?><span class="caret"></span></a>
                                        <ul>
                                            <?php if(is_array($vo['menu_son']) || $vo['menu_son'] instanceof \think\Collection || $vo['menu_son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['menu_son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_son): $mod = ($i % 2 );++$i;?>
                                            <li><a href="<?php echo $vo_son['menu_url']; ?>"><?php echo $vo_son['menu_name']; ?></a></li>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </li>
                                <?php endif; if(empty($vo['menu_son']) || (($vo['menu_son'] instanceof \think\Collection || $vo['menu_son'] instanceof \think\Paginator ) && $vo['menu_son']->isEmpty())): ?>
                              <li class="active" ><a href="<?php echo $vo['menu_url']; ?>" class="sficon_<?php echo $key+1; ?>"><?php echo $vo['menu_name']; ?></a></li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header id="cm-header" style="z-index: 9999;">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>Home</h1>
                    <form id="cm-search" action="index.html" method="get">
                        <input type="search" name="q" autocomplete="off" placeholder="Search...">
                    </form>
                </div>
                <div class="pull-right">
                    <div id="cm-search-btn" class="btn btn-primary md-search-white" data-toggle="cm-search"></div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-notifications-white" data-toggle="dropdown"> <span class="label label-danger">23</span> </button>
                    <div class="popover cm-popover bottom">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading text-overflow">
                                        <i class="fa fa-fw fa-envelope"></i> Nunc volutpat aliquet magna.
                                    </h4>
                                    <p class="list-group-item-text text-overflow">Pellentesque tincidunt mollis scelerisque. Praesent vel blandit quam.</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">
                                        <i class="fa fa-fw fa-envelope"></i> Aliquam orci lectus
                                    </h4>
                                    <p class="list-group-item-text">Donec quis arcu non risus sagittis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">
                                        <i class="fa fa-fw fa-warning"></i> Holy guacamole !
                                    </h4>
                                    <p class="list-group-item-text">Best check yo self, you're not looking too good.</p>
                                </a>
                            </div>
                            <div style="padding:10px"><a class="btn btn-success btn-block" href="#">Show me more...</a></div>
                        </div>
                    </div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;"><strong><?php echo $admin_name; ?></strong></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-cog"></i> Settings</a>
                        </li>
                        <li>
                            <a href="/admin/login/sign_out"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div id="global" style="padding-top: 51px;">
            
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="doc-set" style="list-style:none;">
                <li>
                    <div class="doc-dd">  <p style="display:inline-block;">注册时间</p>
                        <input name="act_start_time" id="startdate" type="text" class="text-box" value="" placeholder="开始时间" title="开始时间" readonly="readonly" style="cursor:pointer;"/>
                        <input name="act_stop_time" id="enddate" type="text" class="text-box" value="" placeholder="结束时间" title="结束时间>开始时间" readonly="readonly" style="cursor:pointer;"/>
                        <input type="button" value="seach" id="search"/>
                    </div>
                </li>
            </ul>
            <script type="text/javascript">
                $( "input[name='act_start_time'],input[name='act_stop_time']" ).datetimepicker();
            </script>
            <div style="margin:5px 0 5px 38px"><?php echo $tjhtml;?></div>
            <div id="chart" style="width:100%;height:400px;"></div>
            <script src="__STATIC__/lib/echarts/echarts.min.js"></script>
            <script type="text/javascript">
                // 初始化图表标签
                var myChart = echarts.init(document.getElementById('chart'));
                var x=[],t=[];
                var xdat=<?php echo $mlist; ?>;
                for(i=0;i<xdat.length;i++){
                    x.push(xdat[i]['n']);
                    t.push(xdat[i]['add_time']);
                }
                var xdata=t;
                var ydata=x;
                var options={
                    //定义一个标题
                    title:{
                        text:'会员增长图示'
                    },
                    legend:{
                        data:['注册人数']
                    },
                    toolbox: {
                        show : true,
                        feature : {
                            mark : {show: true},
                            dataView : {show: true, readOnly: false},
                            magicType : {show: true, type: ['line', 'bar']},
                            restore : {show: true},
                            saveAsImage : {show: true}
                        }
                    },
                    //X轴设置
                    xAxis:{
                        data:xdata
                    },
                    yAxis:{
                    },
                    //name=legend.data的时候才能显示图例
                    series:[{
                        name:'注册人数',
                        type:'line',
                        data:ydata
                    }]

                };
                myChart.setOption(options);
            </script>

        </div>
    </div>
</div>
<script>
    $("#search").click(function(){
        var page="<?php if(!empty($_GET['page'])){echo $_GET['page'];} else{ echo '0';}?>";
        var startdate=$("#startdate").val();
        var enddate=$("#enddate").val();
        var protocol = window.location.protocol;
        protocol+="//";
        var host = window.location.host;
        var port = window.location.port;
        var pathname = window.location.pathname;
        var url=protocol+host+port+pathname;
        if(startdate==''||enddate==''){
            location.href=url;
            return;
        }
        // var sdate = new Date(startdate);
        // var edate = new Date(enddate);
        // var starttime = Date.parse(sdate)/1000;
        // var endtime = Date.parse(edate)/1000;
        var date1 = new Date(startdate.replace(/-/g, '/'));
        var date2 = new Date(enddate.replace(/-/g, '/'));
        var starttime = date1.getTime()/1000;
        var endtime = date2.getTime()/1000;

        if(endtime<starttime){
            alert('起始日期不能大于结束日期');
        }
        if(page!="0"){
            url+="?page="+page+"&starttime="+starttime+"&endtime="+endtime;
        }
        else{
            url+="?starttime="+starttime+"&endtime="+endtime;
        }

        location.href=url;


    });
</script>



            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>