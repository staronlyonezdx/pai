<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\project\pai\public/../application/admin/view/banklogo/addpage.html";i:1542704491;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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

        	
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/add_admin.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_LIB_CLEARMINMASTER_CSS__/summernote.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/add_admin.css">
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/edit.css">

	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/lib/jquery-2.1.3.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/jquery.mousewheel.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/jquery.cookie.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/fastclick.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/bootstrap.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/clearmin.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/home.js"></script>
            <script type="text/javascript" src="/static/h-ui.admin/lib/layer/2.4/layer.js"></script>

       		
<script type="text/javascript" src="__ADMIN_JS__/add_role.js"></script>
<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/summernote.min.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/notepad.js"></script>

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
            
<form method="post" action="<?php echo url('Banklogo/add'); ?>" id="add_store_category_form" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group from_add_authority">
                    <label>添加银行logo</label>
                </div>
                <div class="form-group from_add_margin">
                    <label>银行名称</label>
                    <input type="text" class="form-control" placeholder="银行名称" required name="b_bankname" <?php if(!(empty($info['b_bankname']) || (($info['b_bankname'] instanceof \think\Collection || $info['b_bankname'] instanceof \think\Paginator ) && $info['b_bankname']->isEmpty()))): ?> value="<?php echo $info['b_bankname']; ?>" <?php endif; ?>>
                </div>
                <div class="form-group">
                    <label>银行唯一编码</label>
                    <input type="text" class="form-control" placeholder="银行唯一编码" required name="b_bankcode" <?php if(!(empty($info['b_bankcode']) || (($info['b_bankcode'] instanceof \think\Collection || $info['b_bankcode'] instanceof \think\Paginator ) && $info['b_bankcode']->isEmpty()))): ?> value="<?php echo $info['b_bankcode']; ?>" <?php endif; ?>>
                </div>
                <div class="form-group">
                    <label>对应颜色</label>
                    <input type="text" class="form-control" placeholder="对应颜色" required name="b_bankcolor" <?php if(!(empty($info['b_bankcolor']) || (($info['b_bankcolor'] instanceof \think\Collection || $info['b_bankcolor'] instanceof \think\Paginator ) && $info['b_bankcolor']->isEmpty()))): ?> value="<?php echo $info['b_bankcolor']; ?>" <?php endif; ?>>
                </div>
                <div class="form-group">
                    <label>银行logo</label>
                    <div class="view">
                        <div class="photo"></div>
                        <div class="form-group"></div>
                        <div class="file-loading">
                            <input id="file-4" type="file" required name="b_banklogo" class="file" data-upload-url="#">
                        </div>
                        <?php if(!(empty($info['b_banklogo']) || (($info['b_banklogo'] instanceof \think\Collection || $info['b_banklogo'] instanceof \think\Paginator ) && $info['b_banklogo']->isEmpty()))): ?>
                        <img src="__CDN_PATH__<?php echo $info['b_banklogo']; ?>" alt="" class="b_banklogo" width="100px" height="100px;" style="position: absolute;top:0;left:150px;"/>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group text-right" style="margin-top:20px">
                <input type="hidden" <?php if(!(empty($info['b_id']) || (($info['b_id'] instanceof \think\Collection || $info['b_id'] instanceof \think\Paginator ) && $info['b_id']->isEmpty()))): ?> value="<?php echo $info['b_id']; ?>"  <?php endif; ?> name="b_id"/>
                <input type="submit" class="btn btn-primary" value="保存信息"/>
                <input  type="button" class="btn btn-default" value="取消操作"/>
            </div>
        </div>
    </div>
</form>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>