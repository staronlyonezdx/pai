<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\project\pai\public/../application/admin/view/webimages/edit.html";i:1541491288;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
            
<div class="container-fluid">
    <div class="panel panel-default">
        <form method="post" action="" id="edit_form" onsubmit="return form_submit()" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="form-group from_add_authority">
                    <label><?php if($wi_id > 0): ?>广告图片编辑<?php else: ?>广告图片添加<?php endif; ?></label>
                </div>
                <div class="form-group from_add_margin">
                    <label>图片名称</label>
                    <input type="text" name="wi_name" class="form-control" placeholder="图片名称" value="<?php echo (isset($info['wi_name']) && ($info['wi_name'] !== '')?$info['wi_name']:''); ?>">
                </div>
                <div class="form-group" style="position: relative">
                    <label>广告图片</label>
					<div class="view">
					    <div class="photo"></div>
					    <div class="form-group"></div>
					    <div class="file-loading">
					        <input id="file-4" type="file" name="wi_img" class="file" data-upload-url="">
					    </div>
                        <?php if(!(empty($info['wi_imgurl']) || (($info['wi_imgurl'] instanceof \think\Collection || $info['wi_imgurl'] instanceof \think\Paginator ) && $info['wi_imgurl']->isEmpty()))): ?>
                        <img src="__CDN_PATH__<?php echo $info['wi_imgurl']; ?>" alt="" class="wi_img" width="100px" height="100px;" style="position: absolute;top:0;left:150px;"/>
                        <?php endif; ?>
					</div>
				</div>
                <div class="form-group">
                    <label>图片类型</label></br>
                    <div class="edit_float">
                        <input type="radio" name="wi_type" class="" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wi_type'] == 0): ?>checked<?php endif; endif; ?> value="0">
                        <span>PC</span>
                    </div>
                    <div class="edit_float">
                        <input type="radio" name="wi_type" class="" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wi_type'] == 1): ?>checked<?php endif; endif; ?> value="1">
                        <span>h5</span>
                    </div>
                    <div class="edit_float">
                        <input type="radio" name="wi_type" class="" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wi_type'] == 2): ?>checked<?php endif; endif; ?> value="2">
                        <span>app</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>图片类型 </label>
                    <select name="wit_id" class="form-control">
                        <option value="0" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wit_id'] == 0): ?>selected<?php endif; endif; ?>>普通图片</option>
                        <?php if(!(empty($typeList) || (($typeList instanceof \think\Collection || $typeList instanceof \think\Paginator ) && $typeList->isEmpty()))): if(is_array($typeList) || $typeList instanceof \think\Collection || $typeList instanceof \think\Paginator): $i = 0; $__LIST__ = $typeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['wit_id']; ?>" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wit_id'] == $vo['wit_id']): ?>selected<?php endif; endif; ?>><?php echo $vo['wit_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>显示状态</label></br>
                    <div class="edit_float">
	                    <input type="radio" name="wi_state" class="" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wi_state'] == 0): ?>checked<?php endif; endif; ?> value="0">
	                    <span>显示</span>
	                </div>
                    <div class="edit_float">
	                    <input type="radio" name="wi_state" class="" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wi_state'] == 1): ?>checked<?php endif; endif; ?> value="1">
	                    <span>不显示</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>图片导航</label>
                    <input type="text" name="wi_href" class="form-control" placeholder="图片导航" value="<?php echo (isset($info['wi_href']) && ($info['wi_href'] !== '')?$info['wi_href']:''); ?>">
                </div>
                <div class="form-group">
                    <label>图片介绍</label>
                    <input type="text" name="wi_info" class="form-control" placeholder="图片介绍" value="<?php echo (isset($info['wi_info']) && ($info['wi_info'] !== '')?$info['wi_info']:''); ?>">
                </div>
                <div class="form-group">
                    <label>排序（越小越靠前）</label>
                    <input type="number" name="wi_sort" class="form-control" placeholder="排序（小的靠前）" min="0" value="<?php echo (isset($info['wi_sort']) && ($info['wi_sort'] !== '')?$info['wi_sort']:'0'); ?>">
                </div>
                <div class="form-group">
                    <label>跳转类型（app用） </label>
                    <select name="wi_linktype" class="form-control">
                        <option value="1" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wi_linktype'] == 1): ?>selected<?php endif; endif; ?>>商品详情id</option>
                        <option value="2" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wi_linktype'] == 2): ?>selected<?php endif; endif; ?>>商品分类id</option>
                        <option value="3" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['wi_linktype'] == 3): ?>selected<?php endif; endif; ?>>活动主题页</option>
                        {/notempty}
                    </select>
                </div>
                <div class="form-group">
                    <label>跳转id（app用）</label>
                    <input type="number" name="wi_linkid" class="form-control" placeholder="跳转id" value="<?php echo (isset($info['wi_linkid']) && ($info['wi_linkid'] !== '')?$info['wi_linkid']:0); ?>">
                </div>
                <div class="form-group">
                    <label>跳转内容（app用）</label>
                    <input type="text" name="wi_linkcontent" class="form-control" placeholder="跳转内容" value="<?php echo (isset($info['wi_linkcontent']) && ($info['wi_linkcontent'] !== '')?$info['wi_linkcontent']:''); ?>">
                </div>
            </div>
            <div class="form-group text-right" style="margin-top:20px">
                <input type="hidden" name="wi_id" value="<?php echo (isset($wi_id) && ($wi_id !== '')?$wi_id:'0'); ?>"/>
                <button type="submit" class="btn btn-primary">保存信息</button>
                <button type="reset" class="btn btn-default">取消操作</button>
            </div>
        </form>
    </div>
</div>
<script>
    function form_submit(){

        //表单验证 TODO。。

        return true;
    }
</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>