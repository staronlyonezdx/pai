<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\project\pai\public/../application/admin/view/channel/channel_list.html";i:1541491286;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/goodscategory.css">
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
        <header id="cm-header" style="z-index: 1000000002;">
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
            <label>渠道列表</label>
            <div class="form-group  from_add_authority">
                <label> 状态:</label>
                <a href="/admin/channel/channel_list/c_state/0" type="button" class="btn <?php if($c_state == '0'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">全部</a>
                <a href="/admin/channel/channel_list/c_state/1" type="button" class="btn <?php if($c_state == '1'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">未发布</a>
                <a href="/admin/channel/channel_list/c_state/2" type="button" class="btn <?php if($c_state == '2'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">已发布</a>

                <a class="pull-right" href="<?php echo url('channel/add_channel'); ?>">添加渠道</a>
            </div>
            <div class="doc-dd" style="padding: 10px 0 0 0">
                <label>注册时间</label>
                <input name="act_start_time" id="startdate" type="text" class="text-box" value="" placeholder="开始时间" title="开始时间" readonly="readonly" style="cursor:pointer;"/>
                <input name="act_stop_time" id="enddate" type="text" class="text-box" value="" placeholder="结束时间" title="结束时间>开始时间" readonly="readonly" style="cursor:pointer;"/>
                <input type="text" id="c_name" name="c_name" placeholder="渠道名称">
                <button class="btn" type="button" style="padding: 3px 12px" id="search"><strong>搜 索</strong></button>
            </div>
            <script type="text/javascript">
                $( "input[name='act_start_time'],input[name='act_stop_time']" ).datetimepicker();
            </script>

            <table class="table table-hover" style="margin-bottom:0">
                <thead>
                <tr>
                    <th>渠道ID</th>
                    <th>渠道名称</th>
                    <th>Logo</th>
                    <th>标识</th>
                    <th>状态</th>
                    <th>添加日期</th>
                    <th>更新日期</th>
                    <th>添加管理员ID</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tbody>
                <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                <tr>
                    <td colspan="20">没有数据</td>
                </tr>
                <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <th scope="row" class="sid"><?php echo $vo['c_id']; ?></th>
                    <td><?php echo $vo['c_name']; ?></td>
                    <td><img src="<?php echo (isset($vo['c_img']) && ($vo['c_img'] !== '')?$vo['c_img']:''); ?>"></td>
                    <td><?php echo $vo['c_identifying']; ?></td>
                    <td><?php if($vo['c_state'] == 1): ?>未发布<?php else: ?>已发布<?php endif; ?></td>
                    <td><?php if(!(empty($vo['add_time']) || (($vo['add_time'] instanceof \think\Collection || $vo['add_time'] instanceof \think\Paginator ) && $vo['add_time']->isEmpty()))): ?><?php echo date("Y-m-d H:i:s",$vo['add_time']); else: endif; ?></td>
                    <td><?php if(!(empty($vo['update_time']) || (($vo['update_time'] instanceof \think\Collection || $vo['update_time'] instanceof \think\Paginator ) && $vo['update_time']->isEmpty()))): ?><?php echo date("Y-m-d H:i:s",$vo['update_time']); else: endif; ?></td>
                    <td><?php echo $vo['admin_id']; ?></td>
                    <td>
                        <?php if($vo['c_state'] == 1): ?>
                            <a href="<?php echo url('channel/pub_channel',['c_id' => $vo['c_id']]); ?>">
                                发布
                            </a>|
                            <a href="<?php echo url('channel/add_channel',['c_id' => $vo['c_id']]); ?>">
                                编辑
                            </a>|
                        <?php endif; ?>
                        <a href="<?php echo url('channel/del_channel',['c_id' => $vo['c_id']]); ?>" class="dele_btn" onclick="return confirm('确认要删除？');">
                            删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div>
    <div class="page_box">
        <?php echo $page; ?>
        <span class="pagi_bar">共&nbsp;<?php echo $total; ?>&nbsp;条</span>
    </div>
</div>
<script>
    $("#search").click(function(){
        var startdate=$("#startdate").val();
        var enddate=$("#enddate").val();
        var protocol = window.location.protocol;
        protocol+="//";
        var host = window.location.host;
        var port = window.location.port;
        var pathname = window.location.pathname;
        var url=protocol+host+port+pathname;
        var c_name=$("#c_name").val();
        if(startdate==''&& enddate==''&& c_name==''){
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

        if(isNaN(starttime)){
            starttime=0;
        }
        if(isNaN(endtime)){
            endtime=0;
        }
        if(endtime<starttime){
            alert('起始日期不能大于结束日期');
        }

        url+="?starttime="+starttime+"&endtime="+endtime;

        if(c_name!=''){
            url+="&c_name="+c_name;
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