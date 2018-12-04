<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\project\pai\public/../application/admin/view/activity/edit.html";i:1543457583;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
<!--日期插件-->
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

       		
<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/summernote.min.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/notepad.js"></script>
<!--百度富文本框编辑器-->
<script type="text/javascript" src="/static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>
<!--日期插件-->
<script src="/static/h-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>


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
            
<style>
    .form-group{width:800px;}
    .myeditor{height:600px;width:800px;margin: 0 auto;clear: both;}
    #editor{width:100%;height:480px;}

    /*上传图片样式*/
    .item-logo {
        width: 100px;
        height: 100px;
        float: left;
        margin: 0 10px 10px 0;
        border: 1px solid #ddd;
        background: url(/static/image/business/goods/addImg.png) no-repeat;
        background-size: 100% 100%;
    }
    .item {
        width: 230px;
        height: 65px;
        margin: 0 10px 60px 0;
        border: 1px solid #ddd;
        background: url(/static/image/business/goods/addimg2.png) no-repeat;
        background-size: 100% 100%;
        display: none;
    }

    .addImg {
        width: 100%;
        height: 100%;
        position: relative;
        left: 0;
        top: 0;
        z-index: 2;
        cursor: pointer;
    }

    .preview,
    .preBlock {
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
    }

    .delete {
        width: 18px;
        height: 18px;
        position: absolute;
        right: 0;
        top: 0;
        cursor: pointer;
        display: none;
        z-index: 3;
    }

    .preBlock img {
        display: block;
        width: 100%;
        height: 100%;
    }

    .upload_input {
        display: block;
        width: 0;
        height: 0;
        -webkit-opacity: 0.0;
        /* Netscape and Older than Firefox 0.9 */
        -moz-opacity: 0.0;
        /* Safari 1.x (pre WebKit!) 老式khtml内核的Safari浏览器*/
        -khtml-opacity: 0.0;
        /* IE9 + etc...modern browsers */
        opacity: .0;
        /* IE 4-9 */
        filter: alpha(opacity=0);
        /*This works in IE 8 & 9 too*/
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        /*IE4-IE9*/
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    }
    .banner_href{width:250px}
</style>
<div class="container-fluid">
    <div class="panel panel-default">
        <form method="post" action="" id="edit_form" onsubmit="return form_submit()" enctype="multipart/form-data">
            <div class="panel-body">
                <div class="form-group from_add_authority">
                    <label><?php if($a_id > 0): ?>活动修改<?php else: ?>活动添加<?php endif; ?></label>
                </div>
                <div class="form-group from_add_margin">
                    <label>活动名称</label>
                    <input type="text" name="a_name" class="form-control" placeholder="活动名称" style="width:100%"
                           value="<?php echo (isset($info['a_name']) && ($info['a_name'] !== '')?$info['a_name']:''); ?>">
                </div>
                <div class="form-group" style="position: relative">
                    <label class="form-label col-xs-4 col-sm-2">活动开始时间：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" name="a_start_time" id="a_start_time" onfocus="selecttime(1)" value="<?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?><?php echo date('Y-m-d H:i:s',(isset($info['a_start_time']) && ($info['a_start_time'] !== '')?$info['a_start_time']:0)); endif; ?>"      size="25" class="input-text Wdate" readonly>
                    </div>

                </div>
                <div class="form-group" style="position: relative">
                    <label class="form-label col-xs-4 col-sm-2">活动结束时间：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" name="a_end_time" id="a_end_time" onfocus="selecttime(2)" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): ?>value="<?php echo date('Y-m-d H:i:s',(isset($info['a_end_time']) && ($info['a_end_time'] !== '')?$info['a_end_time']:0)); ?>"<?php endif; ?>  size="25" class="input-text Wdate" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>活动logo</label>
                    <div class="logo-con">
                        <div class="item-logo view">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this,0)" />
                            <div class="preBlock">
                                <img class="preview a_logo" alt="" name="a_logo"  src="<?php echo isset($info['a_logo']) ? $info['a_logo'] :  ''; ?>" />
                            </div>
                            <img class="delete" onclick="delete_logo(this)" src="/static/image/business/goods/delete.png" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>商品类型</label></br>
                    <div class="edit_float">
                        <input type="radio" name="a_product_type" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['a_product_type'] ==
                        1): ?>checked<?php endif; endif; ?> value="1" checked>
                        <span>余额商品</span>
                    </div>
                    <div class="edit_float">
                        <input type="radio" name="a_product_type" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['a_product_type'] ==
                        2): ?>checked<?php endif; endif; ?> value="2">
                        <span>花生商品</span>
                    </div>
                    <div class="edit_float">
                        <input type="radio" name="a_product_type" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['a_product_type'] ==
                        0): ?>checked<?php endif; endif; ?> value="0">
                        <span>所有商品</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>活动轮播图(最多可添加6个)</label>
                    <div class="logo-con">
                        <div class="item view">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this,1)" />
                            <div class="preBlock">
                                <img class="preview ab_img" alt="" name="ab_img" src="<?php echo isset($info['banners'][0]['ab_img']) ? $info['banners'][0]['ab_img'] :  ''; ?>" />
                            </div>
                            <img class="delete" <?php if(!(empty($info['banners'][0]['ab_img']) || (($info['banners'][0]['ab_img'] instanceof \think\Collection || $info['banners'][0]['ab_img'] instanceof \think\Paginator ) && $info['banners'][0]['ab_img']->isEmpty()))): ?>style="display:block"<?php endif; ?> onclick="delete_banner(this,'<?php echo isset($info['banners'][0]['ab_id']) ? $info['banners'][0]['ab_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                            <div class="form-group href_box">
                                <label for="banner_href0">链接：</label>
                                <input type="text" class="form-control banner_href" id="banner_href0" value="<?php echo (isset($info['banners'][0]['ab_href']) && ($info['banners'][0]['ab_href'] !== '')?$info['banners'][0]['ab_href']:'#content'); ?>"  placeholder="请输入上图跳转链接">
                                <input type="hidden" class="form-control banner_abid" value="<?php echo isset($info['banners'][0]['ab_id']) ? $info['banners'][0]['ab_id'] :  0; ?>">
                            </div>
                        </div>
                        <div class="item view">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this,1)" />
                            <div class="preBlock">
                                <img class="preview ab_img" alt="" name="ab_img" src="<?php echo isset($info['banners'][1]['ab_img']) ? $info['banners'][1]['ab_img'] :  ''; ?>" />
                            </div>
                            <img class="delete" <?php if(!(empty($info['banners'][1]['ab_img']) || (($info['banners'][1]['ab_img'] instanceof \think\Collection || $info['banners'][1]['ab_img'] instanceof \think\Paginator ) && $info['banners'][1]['ab_img']->isEmpty()))): ?>style="display:block"<?php endif; ?> onclick="delete_banner(this,'<?php echo isset($info['banners'][1]['ab_id']) ? $info['banners'][1]['ab_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                            <div class="form-group href_box">
                                <label for="banner_href1">链接：</label>
                                <input type="text" class="form-control banner_href" id="banner_href1" value="<?php echo (isset($info['banners'][1]['ab_href']) && ($info['banners'][1]['ab_href'] !== '')?$info['banners'][1]['ab_href']:'#content'); ?>"  placeholder="请输入上图跳转链接">
                                <input type="hidden" class="form-control banner_abid" value="<?php echo isset($info['banners'][1]['ab_id']) ? $info['banners'][1]['ab_id'] :  0; ?>">
                            </div>
                        </div>
                        <div class="item view">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this,1)" />
                            <div class="preBlock">
                                <img class="preview ab_img" alt="" name="ab_img" src="<?php echo isset($info['banners'][2]['ab_img']) ? $info['banners'][2]['ab_img'] :  ''; ?>" />
                            </div>
                            <img class="delete" <?php if(!(empty($info['banners'][2]['ab_img']) || (($info['banners'][2]['ab_img'] instanceof \think\Collection || $info['banners'][2]['ab_img'] instanceof \think\Paginator ) && $info['banners'][2]['ab_img']->isEmpty()))): ?>style="display:block"<?php endif; ?> onclick="delete_banner(this,'<?php echo isset($info['banners'][2]['ab_id']) ? $info['banners'][2]['ab_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                            <div class="form-group href_box">
                                <label for="banner_href2">链接：</label>
                                <input type="text" class="form-control banner_href" id="banner_href2" value="<?php echo (isset($info['banners'][2]['ab_href']) && ($info['banners'][2]['ab_href'] !== '')?$info['banners'][2]['ab_href']:'#content'); ?>"  placeholder="请输入上图跳转链接">
                                <input type="hidden" class="form-control banner_abid" value="<?php echo isset($info['banners'][2]['ab_id']) ? $info['banners'][2]['ab_id'] :  0; ?>">
                            </div>
                        </div>
                        <div class="item view">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this,1)" />
                            <div class="preBlock">
                                <img class="preview ab_img" alt="" name="ab_img" src="<?php echo isset($info['banners'][3]['ab_img']) ? $info['banners'][3]['ab_img'] :  ''; ?>" />
                            </div>
                            <img class="delete" <?php if(!(empty($info['banners'][3]['ab_img']) || (($info['banners'][3]['ab_img'] instanceof \think\Collection || $info['banners'][3]['ab_img'] instanceof \think\Paginator ) && $info['banners'][3]['ab_img']->isEmpty()))): ?>style="display:block"<?php endif; ?> onclick="delete_banner(this,'<?php echo isset($info['banners'][3]['ab_id']) ? $info['banners'][3]['ab_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                            <div class="form-group href_box">
                                <label for="banner_href3">链接：</label>
                                <input type="text" class="form-control banner_href" id="banner_href3" value="<?php echo (isset($info['banners'][3]['ab_href']) && ($info['banners'][3]['ab_href'] !== '')?$info['banners'][3]['ab_href']:'#content'); ?>"  placeholder="请输入上图跳转链接">
                                <input type="hidden" class="form-control banner_abid" value="<?php echo isset($info['banners'][3]['ab_id']) ? $info['banners'][3]['ab_id'] :  0; ?>">
                            </div>
                        </div>
                        <div class="item view">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this,1)" />
                            <div class="preBlock">
                                <img class="preview ab_img" alt="" name="ab_img" src="<?php echo isset($info['banners'][4]['ab_img']) ? $info['banners'][4]['ab_img'] :  ''; ?>" />
                            </div>
                            <img class="delete" <?php if(!(empty($info['banners'][4]['ab_img']) || (($info['banners'][4]['ab_img'] instanceof \think\Collection || $info['banners'][4]['ab_img'] instanceof \think\Paginator ) && $info['banners'][4]['ab_img']->isEmpty()))): ?>style="display:block"<?php endif; ?> onclick="delete_banner(this,'<?php echo isset($info['banners'][4]['ab_id']) ? $info['banners'][4]['ab_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                            <div class="form-group href_box">
                                <label for="banner_href4">链接：</label>
                                <input type="text" class="form-control banner_href" id="banner_href4" value="<?php echo (isset($info['banners'][4]['ab_href']) && ($info['banners'][4]['ab_href'] !== '')?$info['banners'][4]['ab_href']:'#content'); ?>"  placeholder="请输入上图跳转链接">
                                <input type="hidden" class="form-control banner_abid" value="<?php echo isset($info['banners'][4]['ab_id']) ? $info['banners'][4]['ab_id'] :  0; ?>">
                            </div>
                        </div>
                        <div class="item view">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this,1)" />
                            <div class="preBlock">
                                <img class="preview ab_img" alt="" name="ab_img" src="<?php echo isset($info['banners'][5]['ab_img']) ? $info['banners'][5]['ab_img'] :  ''; ?>" />
                            </div>
                            <img class="delete" <?php if(!(empty($info['banners'][5]['ab_img']) || (($info['banners'][5]['ab_img'] instanceof \think\Collection || $info['banners'][5]['ab_img'] instanceof \think\Paginator ) && $info['banners'][5]['ab_img']->isEmpty()))): ?>style="display:block"<?php endif; ?> onclick="delete_banner(this,'<?php echo isset($info['banners'][5]['ab_id']) ? $info['banners'][5]['ab_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                            <div class="form-group href_box">
                                <label for="banner_href5">链接：</label>
                                <input type="text" class="form-control banner_href" id="banner_href5" value="<?php echo (isset($info['banners'][5]['ab_href']) && ($info['banners'][5]['ab_href'] !== '')?$info['banners'][5]['ab_href']:'#content'); ?>" placeholder="请输入上图跳转链接">
                                <input type="hidden" class="form-control banner_abid" value="<?php echo isset($info['banners'][5]['ab_id']) ? $info['banners'][5]['ab_id'] :  0; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>是否开启</label></br>
                    <div class="edit_float">
                        <input type="radio" name="a_state" class="" value="1" checked>
                        <span>开启</span>
                    </div>
                    <div class="edit_float">
                        <input type="radio" name="a_state" class="" <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['a_state'] ==
                        0): ?>checked<?php endif; endif; ?> value="0">
                        <span>关闭</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>活动描述</label>
                </div>
                <div class="myeditor">
                    <textarea id="editor" name="a_description" type="text/plain;" ><?php echo (isset($info['a_description']) && ($info['a_description'] !== '')?$info['a_description']:''); ?></textarea>
                </div>
                <div class="form-group text-right" style="margin-top:20px">
                    <input type="hidden" name="a_id" value="<?php echo (isset($a_id) && ($a_id !== '')?$a_id:'0'); ?>"/>
                    <button type="button" id="submit" class="btn btn-primary">保存信息</button>
                    <button type="reset" class="btn btn-default">取消操作</button>
                </div>
        </form>
    </div>
</div>
<script>

    // 表单提交
    $("#submit").click(function(){
        var this_btn = $(this);
        var a_id = $("input[name=a_id]").val();
        var a_name = $("input[name=a_name]").val();
        var a_start_time = $("input[name=a_start_time]").val();
        var a_end_time = $("input[name=a_end_time]").val();
        var a_product_type = $("input[name=a_product_type]:checked").val();
        var a_state = $("input[name=a_state]").val();
        var a_description = $("textarea[name=a_description]").html();
        // 活动logo
        var a_logo = $(".a_logo").attr('src');
        //轮播图片
        var ab_img = [];
        $('.ab_img').each(function(){
            var img_data = new Object();
            if($(this).attr('src') != undefined) {
                var this_img = $(this).attr('src');
                var this_href = $(this).parents(".item").find(".banner_href").val();
                var this_abid = $(this).parents(".item").find(".banner_abid").val();

                if($.trim(this_img) != ''){
                    img_data.img_data = this_img;
                    img_data.href_data = this_href;
                    img_data.ab_id = this_abid;
                    ab_img.push(img_data);
                }
            }
        })

        // 表单验证
        if(a_name == ''){
            layer.msg("活动标题不能为空！");
            return false;
        }
        if(a_start_time == ''){
            layer.msg("请选择开始时间！");
            return false;
        }
        if(a_end_time == ''){
            layer.msg("请选择结束时间！");
            return false;
        }
        if(a_logo==''){
            layer.msg("请上传活动logo！");
            return false;
        }
        if(ab_img.length == 0){
            layer.msg("请至少上传一张活动轮播图！");
            return false;
        }

        this_btn.attr("disabled",true);

        // 表单提交
        $.ajax({
            type: 'post',
            url: '/admin/activity/edit_post',
            dataType: 'json',
            data:{
                a_id:a_id,
                a_name:a_name,
                a_start_time:a_start_time,
                a_end_time:a_end_time,
                a_product_type:a_product_type,
                a_state:a_state,
                a_description:a_description,
                a_logo:a_logo,
                ab_img:ab_img
            },
            success: function (data) {
                console.log(data);
                //return false;
                this_btn.attr("disabled",false);//按钮恢复点击
                layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                    time:2000
                });
                if(data.status > 0){
                    setTimeout(function () {
                        layer.closeAll();
                        window.location.reload();
                    }, 1000)
                }
            }
        });
    });

    //实例化编辑器
    var ue = UE.getEditor('editor');

    //实例化日期插件
//    $( "input[name='act_start_time'],input[name='act_stop_time']" ).datetimepicker();
    //时间控件
    function selecttime(flag){
        if(flag==1){
            var a_start_time = $("#a_start_time").val();
//            if(act_start_time != ""){
//                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'%y-%M-%d'})
//            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})
//            }
        }else if(flag==2){
            var a_end_time = $("#a_end_time").val();

            var t = new Date();//当前时间
            var t_s = t.getTime();//转化为时间戳毫秒数
            t.setTime(t_s + 1000 * 60 * 10);//设置新时间比旧时间多十分钟;

            //标准日期转标准时间
            var t3 = new Date(a_end_time);
            //标准时间转毫秒数
            var result = t3.getTime();
            t3.setTime(result + 1000 * 60 * 60 * 24 *60);//设置新时间比旧时间多60天;

            if(a_end_time != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:a_end_time,maxDate:msToDate(t3).wasTime});
            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});
            }
        }
    }

    //选择图片
    function change(file,type) {
        //预览
        var pic = $(file).parent().find(".preview");
        //添加按钮
        var addImg = $(file).parent().find(".addImg");
        //删除按钮
        var deleteImg = $(file).parent().find(".delete");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            if (ext != '') {
                layer.msg("图片的格式必须为png或者jpg或者jpeg格式！");
            }
            return;
        }
        //判断IE版本
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;
        isIE10 = navigator.userAgent.match(/MSIE 10.0/)!= null;
        if(isIE && !isIE10) {
            file.select();
            var reallocalpath = document.selection.createRange().text;
            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.attr("src",reallocalpath);
            }else{
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.css("filter","progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src=\"" + reallocalpath + "\")");
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.attr('src','data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
            }
            addImg.hide();
            deleteImg.show();
        }else {
            html5Reader(file,pic,addImg,deleteImg);
        }
        if(type == 1){
            setTimeout(function () {
                is_show_banner();// 触发是否加载下一个框
            }, 200)
        }
    }
    //H5渲染
    function html5Reader(file,pic,addImg,deleteImg){
        var size = 1048576 // 图片大小不能大于1M
        var file = file.files[0];
        if(file.size>size) {
            layer.msg("上传图片大小不能大于1M");
            return false;
        }

        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            pic.attr("src",this.result);
            pic.parent().css("background","#fff");
        }
        addImg.hide();
        deleteImg.show();
    }
    //点击
    var clickImg = function(obj){
        $(obj).parent().find('.upload_input').click();
    }

    //删除活动logo
    var delete_logo = function(obj){
        $(obj).parent().find('input').val('');
        $(obj).parent().find('img.preview').attr("src","");
        //IE9以下
        $(obj).parent().find('img.preview').css("filter","");
        $(obj).hide();
        $(obj).parent().find('.addImg').show();
        $(obj).siblings('.preBlock').css("background","none");
    }

    //删除轮播图
    var delete_banner = function(obj,ab_id){
        if(ab_id){
            $.ajax({
                type: "post",
                url: "/admin/activity/delete_banner",
                data: {
                    ab_id:ab_id
                },
                success: function(res){
                    console.log(res);
                    if(res.status){
                        layer.msg('<span style="color:#fff">远程已删除</span>',{
                            time:2000
                        });
                    }
                }
            })
        }

        $(obj).parent().find('input').val('');
        $(obj).parent().find('img.preview').attr("src","");
        //IE9以下
        $(obj).parent().find('img.preview').css("filter","");
        $(obj).hide();
        $(obj).parent().find('.addImg').show();
        $(obj).siblings('.preBlock').css("background","none");
        $(obj).parents(".item").hide(200);

        setTimeout(function () {
            if($(".item:visible:last").find(".ab_img").attr("src").length > 0){
                is_show_banner();// 触发是否加载下一个框
            }
        }, 400)

    }

    //判断轮播图是否展示
    var is_show_banner = function(){
        $(".item").each(function(){
            $(this).find(".href_box").css("margin-top","10px");
            var img_src = $(this).find(".ab_img").attr("src");
            if(img_src){
                $(this).show();
                if(img_src.length >100){
                    $(this).find(".href_box").css("margin-top","70px");
                }
            }
        });
        $(".item").each(function(){
            var img_src2 = $(this).find(".ab_img").attr("src");
            if(!img_src2){
                $(this).parent().append($(this));
                $(this).slideDown();
                return false;
            }
        });

    }
    is_show_banner();// 触发是否加载下一个框

</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>