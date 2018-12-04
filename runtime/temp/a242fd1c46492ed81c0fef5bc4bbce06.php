<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:71:"D:\project\pai\public/../application/business/view/goods/add_goods.html";i:1541897130;s:67:"D:\project\pai\public/../application/business/view/common/base.html";i:1541491289;s:69:"D:\project\pai\public/../application/business/view/common/header.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/menu.html";i:1542013166;s:69:"D:\project\pai\public/../application/business/view/common/footer.html";i:1542013166;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="favicon.ico" >
    <link rel="Shortcut Icon" href="favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/h-ui.admin/lib/html5.js"></script>
    <script type="text/javascript" src="/static/h-ui.admin/lib/respond.min.js"></script>
    <script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
    
<link rel="stylesheet" type="text/css" href="__STATIC__/css/business/goods/add_goods.css">

    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>自营店铺管理系统</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
</head>
<body>
<!--_header 作为公共模版分离出去-->

<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="#">拍吖吖商户管理后台</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <!--<nav class="nav navbar-nav">-->
                <!--<ul class="cl">-->
                    <!--<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>-->
                        <!--<ul class="dropDown-menu menu radius box-shadow">-->
                            <!--<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>-->
                            <!--<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>-->
                            <!--<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>-->
                            <!--<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>-->
                        <!--</ul>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</nav>-->
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>超级管理员</li>

                    <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo isset($stroe_name) ? $stroe_name :  '吖吖'; ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <!--<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>-->
                            <li><a href="/business/login/out">切换账户</a></li>
                            <li><a href="/business/login/out">退出</a></li>
                        </ul>
                    </li>
                    <!--<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>-->
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->

<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i>余额商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li class="itemli"><a href="/business/goods/goods_list/type/1" title="余额商品列表">1.余额商品列表</a></li>
                    <li class="itemli"><a href="/business/goods/add_goods/type/1" title="添加余额商品">添加余额商品</a></li>
                    <?php if(!(empty($store_type) || (($store_type instanceof \think\Collection || $store_type instanceof \think\Paginator ) && $store_type->isEmpty()))): if($store_type == 1): ?>
                    <li class="itemli"><a href="/business/goods/goods_list/type/2" title="余额商品列表">2.福袋商品列表</a></li>
                    <li class="itemli"><a href="/business/goods/add_goods/type/2" title="添加福袋商品">添加福袋商品</a></li>
                    <li class="itemli"><a href="/business/goods/goods_list/type/3" title="余额商品列表">3.活动商品列表</a></li>
                    <li class="itemli"><a href="/business/goods/add_goods/type/3" title="添加福袋商品">添加活动商品</a></li>
                    <?php endif; endif; ?>
                </ul>
            </dd>
        </dl>
        <dl id="menu-picture">
            <dt><i class="Hui-iconfont">&#xe613;</i> 余额商品订单<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li class="itemli"><a href="/business/paiorder/order_list" title="订单列表">订单列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 积分商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li class="itemli"><a href="/business/pointgoods/goods_list" title="积分商品列表">积分商品列表</a></li>
                    <li class="itemli"><a href="/business/pointgoods/add_goods" title="添加积分商品">添加积分商品</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-ptorder">
            <dt><i class="Hui-iconfont">&#xe622;</i> 积分商品订单<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li class="itemli"><a href="/business/pointorder/order_list" title="订单列表">订单列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 人气商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li class="itemli"><a href="/business/popularitygoods/goodslist" title="人气商品列表">人气商品列表</a></li>
                    <li class="itemli"><a href="/business/popularitygoods/goods_list_two" title="人气商品列表">线下活动人气商品列表</a></li>
                    <li class="itemli"><a href="/business/popularitygoods/edit" title="添加人气商品">添加人气商品</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-comments">
            <dt><i class="Hui-iconfont">&#xe62e;</i> 人气商品订单<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li class="itemli"><a href="/business/Poporder/goods_list" title="订单列表">订单列表</a></li>
                </ul>
            </dd>
        </dl>
        <!--<dl id="menu-admin">-->
            <!--<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>-->
            <!--<dd>-->
                <!--<ul>-->
                    <!--<li><a href="admin-role.html" title="角色管理">角色管理</a></li>-->
                    <!--<li><a href="admin-permission.html" title="权限管理">权限管理</a></li>-->
                    <!--<li><a href="admin-list.html" title="管理员列表">管理员列表</a></li>-->
                <!--</ul>-->
            <!--</dd>-->
        <!--</dl>-->
        <!--<dl id="menu-tongji">-->
            <!--<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>-->
            <!--<dd>-->
                <!--<ul>-->
                    <!--<li><a href="charts-1.html" title="折线图">折线图</a></li>-->
                    <!--<li><a href="charts-2.html" title="时间轴折线图">时间轴折线图</a></li>-->
                    <!--<li><a href="charts-3.html" title="区域图">区域图</a></li>-->
                    <!--<li><a href="charts-4.html" title="柱状图">柱状图</a></li>-->
                    <!--<li><a href="charts-5.html" title="饼状图">饼状图</a></li>-->
                    <!--<li><a href="charts-6.html" title="3D柱状图">3D柱状图</a></li>-->
                    <!--<li><a href="charts-7.html" title="3D饼状图">3D饼状图</a></li>-->
                <!--</ul>-->
            <!--</dd>-->
        <!--</dl>-->
        <!--<dl id="menu-system">-->
            <!--<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>-->
            <!--<dd>-->
                <!--<ul>-->
                    <!--<li><a href="system-base.html" title="系统设置">系统设置</a></li>-->
                    <!--<li><a href="system-category.html" title="栏目管理">栏目管理</a></li>-->
                    <!--<li><a href="system-data.html" title="数据字典">数据字典</a></li>-->
                    <!--<li><a href="system-shielding.html" title="屏蔽词">屏蔽词</a></li>-->
                    <!--<li><a href="system-log.html" title="系统日志">系统日志</a></li>-->
                <!--</ul>-->
            <!--</dd>-->
        <!--</dl>-->
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>


<!--/_menu 作为公共模版分离出去-->


<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a>
        <span class="c-999 en">&gt;</span>
        <span class="c-666">余额商品</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="Hui-article">
        <div class="page-container">
            <h3 class="text-c red">
                <?php switch($type): case "1": ?>普通商品<?php break; case "2": ?>福袋商品<?php break; case "3": ?>活动商品<?php break; default: ?>普通商品发布
                <?php endswitch; ?>
            </h3>
            <form class="form form-horizontal" id="form-article-add">
                <input type="hidden" id="g_state" value="<?php echo isset($info['g_state']) ? $info['g_state'] :  '0'; ?>">
                <input type="hidden" id="hidden_val" value="<?php echo isset($info['g_id']) ? $info['g_id'] :  ''; ?>">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>拍品标题：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo isset($info['g_name']) ? $info['g_name'] :  ''; ?>" placeholder="" id="g_name" name="g_name">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">二级标题：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo isset($info['g_secondname']) ? $info['g_secondname'] :  ''; ?>" placeholder="" id="g_secondname" name="g_secondname">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上传图片（建议上传800像素*600像素,默认第一张为主图）：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <div class="item">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this)" />
                            <div class="preBlock">
                                <img class="preview" alt="" name="pic" src="<?php echo isset($info['img'][0]['gi_name']) ? $info['img'][0]['gi_name'] :  ''; ?>" />
                            </div>
                            <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['img'][0]['gi_id']) ? $info['img'][0]['gi_id'] :  ''; ?>','<?php echo isset($info['img'][0]['g_id']) ? $info['img'][0]['g_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                        </div>
                        <div class="item">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this)" />
                            <div class="preBlock">
                                <img class="preview" alt="" name="pic" src="<?php echo isset($info['img'][1]['gi_name']) ? $info['img'][1]['gi_name'] :  ''; ?>" />
                            </div>
                            <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['img'][1]['gi_id']) ? $info['img'][1]['gi_id'] :  ''; ?>','<?php echo isset($info['img'][1]['g_id']) ? $info['img'][1]['g_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                        </div>
                        <div class="item">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this)" />
                            <div class="preBlock">
                                <img class="preview" alt="" name="pic" src="<?php echo isset($info['img'][2]['gi_name']) ? $info['img'][2]['gi_name'] :  ''; ?>" />
                            </div>
                            <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['img'][2]['gi_id']) ? $info['img'][2]['gi_id'] :  ''; ?>','<?php echo isset($info['img'][2]['g_id']) ? $info['img'][2]['g_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                        </div>
                        <div class="item">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this)" />
                            <div class="preBlock">
                                <img class="preview" alt="" name="pic" src="<?php echo isset($info['img'][3]['gi_name']) ? $info['img'][3]['gi_name'] :  ''; ?>" />
                            </div>
                            <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['img'][3]['gi_id']) ? $info['img'][3]['gi_id'] :  ''; ?>','<?php echo isset($info['img'][3]['g_id']) ? $info['img'][3]['g_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                        </div>
                        <div class="item">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this)" />
                            <div class="preBlock">
                                <img class="preview" alt="" name="pic" src="<?php echo isset($info['img'][4]['gi_name']) ? $info['img'][4]['gi_name'] :  ''; ?>" />
                            </div>
                            <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['img'][4]['gi_id']) ? $info['img'][4]['gi_id'] :  ''; ?>','<?php echo isset($info['img'][4]['g_id']) ? $info['img'][4]['g_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                        </div>
                        <div class="item">
                            <div class="addImg" onclick="clickImg(this);"></div>
                            <input name="url" type="file" class="upload_input" onchange="change(this)" />
                            <div class="preBlock">
                                <img class="preview" alt="" name="pic" src="<?php echo isset($info['img'][5]['gi_name']) ? $info['img'][5]['gi_name'] :  ''; ?>" />
                            </div>
                            <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['img'][5]['gi_id']) ? $info['img'][5]['gi_id'] :  ''; ?>','<?php echo isset($info['img'][5]['g_id']) ? $info['img'][5]['g_id'] :  ''; ?>')" src="/static/image/business/goods/delete.png" />
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择地址：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <div class="row cl" style="margin-top:0">
                            <div class="col-xs-4 col-sm-4">
                                <span class="select-box">
                                    <select class="select" id="province"  onchange="address(this,1)">
                                        <option value="省份">省份</option>
                                        <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option <?php if(!(empty($info['pid']) || (($info['pid'] instanceof \think\Collection || $info['pid'] instanceof \think\Paginator ) && $info['pid']->isEmpty()))): if($vo['region_code'] == $info['pid']): ?>selected<?php endif; endif; ?>  value="<?php echo $vo['region_code']; ?>"><?php echo $vo['region_name']; ?></option>                              
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </select>
                                </span>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <span class="select-box">
                                    <select class="select" onchange="address(this,2)" id="city">
                                        <option value="城市">城市</option>
                                        <?php if(!(empty($info['cid']) || (($info['cid'] instanceof \think\Collection || $info['cid'] instanceof \think\Paginator ) && $info['cid']->isEmpty()))): if(is_array($region_list) || $region_list instanceof \think\Collection || $region_list instanceof \think\Paginator): $i = 0; $__LIST__ = $region_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <option  <?php if(!(empty($info['cid']) || (($info['cid'] instanceof \think\Collection || $info['cid'] instanceof \think\Paginator ) && $info['cid']->isEmpty()))): if($vo['region_code'] == $info['cid']): ?>selected<?php endif; endif; ?>   value="<?php echo $info['cid']; ?>"><?php echo $vo['region_name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </select>
                                </span>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <span class="select-box">
                                    <select class="select" id="area">
                                        <option value="地区">地区</option>
                                        <?php if(!(empty($info['aid']) || (($info['aid'] instanceof \think\Collection || $info['aid'] instanceof \think\Paginator ) && $info['aid']->isEmpty()))): if(is_array($region_list) || $region_list instanceof \think\Collection || $region_list instanceof \think\Paginator): $i = 0; $__LIST__ = $region_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <option  <?php if(!(empty($info['aid']) || (($info['aid'] instanceof \think\Collection || $info['aid'] instanceof \think\Paginator ) && $info['aid']->isEmpty()))): if($vo['region_code'] == $info['aid']): ?>selected<?php endif; endif; ?>   value="<?php echo $info['aid']; ?>"><?php echo $vo['region_name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>拍品分类：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <div class="row cl" style="margin-top:0">
                            <div class="col-xs-4 col-sm-4">
                                <span class="select-box">
                                    <select class="select" id="cate1" onchange="cate(this,1)">
                                        <option value="一级分类">一级分类</option>                                
                                        <?php if(!(empty($category1) || (($category1 instanceof \think\Collection || $category1 instanceof \think\Paginator ) && $category1->isEmpty()))): if(is_array($category1) || $category1 instanceof \think\Collection || $category1 instanceof \think\Paginator): $i = 0; $__LIST__ = $category1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option <?php if(!(empty($info['str_gc_id'][0]) || (($info['str_gc_id'][0] instanceof \think\Collection || $info['str_gc_id'][0] instanceof \think\Paginator ) && $info['str_gc_id'][0]->isEmpty()))): if($info['str_gc_id'][0] == $vo['gc_id']): ?> selected <?php endif; endif; ?> value="<?php echo $vo['gc_id']; ?>"><?php echo $vo['gc_name']; ?></option>                              
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </select>
                                </span>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <span class="select-box">
                                    <select class="select" id="cate2" onchange="cate(this,2)">
                                        <option value="二级分类">二级分类</option>
                                        <?php if(!(empty($category2) || (($category2 instanceof \think\Collection || $category2 instanceof \think\Paginator ) && $category2->isEmpty()))): if(is_array($category2) || $category2 instanceof \think\Collection || $category2 instanceof \think\Paginator): $i = 0; $__LIST__ = $category2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <option <?php if(!(empty($info['str_gc_id'][1]) || (($info['str_gc_id'][1] instanceof \think\Collection || $info['str_gc_id'][1] instanceof \think\Paginator ) && $info['str_gc_id'][1]->isEmpty()))): if($info['str_gc_id'][1] == $vo['gc_id']): ?> selected <?php endif; endif; ?> value="<?php echo $vo['gc_id']; ?>"><?php echo $vo['gc_name']; ?></option>    
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </select>
                                </span>
                            </div>
                            <div class="col-xs-4 col-sm-4">
                                <span class="select-box">
                                    <select class="select" id="cate3" onchange="cate(this,3)">
                                        <option value="三级分类">三级分类</option>
                                        <?php if(!(empty($category3) || (($category3 instanceof \think\Collection || $category3 instanceof \think\Paginator ) && $category3->isEmpty()))): if(is_array($category3) || $category3 instanceof \think\Collection || $category3 instanceof \think\Paginator): $i = 0; $__LIST__ = $category3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option <?php if(!(empty($info['str_gc_id'][2]) || (($info['str_gc_id'][2] instanceof \think\Collection || $info['str_gc_id'][2] instanceof \think\Paginator ) && $info['str_gc_id'][2]->isEmpty()))): if($info['str_gc_id'][2] == $vo['gc_id']): ?> selected <?php endif; endif; ?> value="<?php echo $vo['gc_id']; ?>"><?php echo $vo['gc_name']; ?></option>                              
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </select>
                                </span>
                            </div>
                            <input type="hidden" id="classify" value="<?php echo isset($info['gc_id']) ? $info['gc_id'] :  ''; ?>">
                        </div>
                    </div>
                </div>
                <!--<?php if($type == 3): ?>-->
                <!--<div class="row cl">-->
                    <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否活动商品：</label>-->
                    <!--<input type="radio" name="is_huodong" value="1"  <?php if(!(empty($info['is_huodong']) || (($info['is_huodong'] instanceof \think\Collection || $info['is_huodong'] instanceof \think\Paginator ) && $info['is_huodong']->isEmpty()))): if($info['is_huodong'] == 1): ?>checked<?php endif; endif; ?>>是-->
                    <!--<input type="radio" name="is_huodong" value="2" <?php if(empty($info['is_huodong']) || (($info['is_huodong'] instanceof \think\Collection || $info['is_huodong'] instanceof \think\Paginator ) && $info['is_huodong']->isEmpty())): ?>checked <?php else: if($info['is_huodong'] == 2): ?>checked<?php endif; endif; ?>>否-->
                <!--</div>-->
                <!--<?php endif; ?>-->
                <?php if($type == 2): ?>
                    <div class="row cl sort_box" >
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>福袋排序：</label>
                        <div class="formControls col-xs-8 col-sm-2">
                            <input type="number" class="input-text sort" name="sort" value="<?php echo isset($info['sort']) ? $info['sort'] :  ''; ?>" placeholder="福袋商品排序" >
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上架状态：</label>
                        <div class="radio-box">
                            <input type="radio" id="radio-1" name="gp_state" value="1" <?php if(empty($info['gp_state']) || (($info['gp_state'] instanceof \think\Collection || $info['gp_state'] instanceof \think\Paginator ) && $info['gp_state']->isEmpty())): else: if($info['gp_state'] == 1): ?>checked<?php endif; endif; ?>>
                            <label for="radio-1">上架</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" id="radio-2" name="gp_state"  value="2" <?php if(empty($info['gp_state']) || (($info['gp_state'] instanceof \think\Collection || $info['gp_state'] instanceof \think\Paginator ) && $info['gp_state']->isEmpty())): ?>checked<?php else: if($info['gp_state'] == 2): ?>checked<?php endif; endif; ?>>
                            <label for="radio-2">预上架</label>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>结算价：</label>
                    <div class="formControls col-xs-8 col-sm-2">
                        <input type="number" class="input-text" value="<?php echo isset($info['gp_settlement_price']) ? $info['gp_settlement_price'] :  ''; ?>" placeholder="" id="gp_settlement_price" name="gp_settlement_price">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>市场价：</label>
                    <div class="formControls col-xs-8 col-sm-2">
                        <input type="number" class="input-text" value="<?php echo isset($info['gp_market_price']) ? $info['gp_market_price'] :  ''; ?>" placeholder="" id="gp_market_price" name="gp_market_price">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"></label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <div class="content_number">
                            <?php if(!(empty($info['dt_record']) || (($info['dt_record'] instanceof \think\Collection || $info['dt_record'] instanceof \think\Paginator ) && $info['dt_record']->isEmpty()))): if(is_array($info['dt_record']) || $info['dt_record'] instanceof \think\Collection || $info['dt_record'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['dt_record'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <div class="content_number_list">
                                    <input type="checkbox" <?php if($vo['is_check'] == 1): ?> checked <?php endif; ?> name="nod" value="<?php echo isset($vo['gdt_id']) ? $vo['gdt_id'] :  ''; ?>" />
                                    <img src="__CDN_PATH__<?php echo isset($vo['gdt_img']) ? $vo['gdt_img'] :  ''; ?>"  class="gdt_img<?php echo $key+1; ?>">
                                    <span class="content_margin_left gdt_name<?php echo $key+1; ?>"><?php echo isset($vo['gdt_name']) ? $vo['gdt_name'] :  ''; ?></span>
                                    <span class="content_price_view gdr_price<?php echo $key+1; ?>">￥<input type="number" name="gdr_price" g_id="<?php echo isset($info['g_id']) ? $info['g_id'] :  ''; ?>" value="<?php echo isset($vo['gdr_price']) ? $vo['gdr_price'] :  ''; ?>" /></span>
                                    <span>参与人次
                                      <span class="content_number_view gdr_membernum<?php echo $key+1; ?>"><input type="number" name="membernum" value="<?php echo isset($vo['gdr_membernum']) ? $vo['gdr_membernum'] :  ''; ?>" g_id="<?php echo isset($info['g_id']) ? $info['g_id'] :  ''; ?>" />人</span>
                                    </span>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">开始时间：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" name="start_time" id="countTimestart" onfocus="selecttime(1)" size="17" class="input-text Wdate" readonly>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">截至时间：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" name="end_time" id="countTimeend" onfocus="selecttime(2)" size="17" class="input-text Wdate" readonly>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>拍品库存：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="number" class="input-text" value="<?php echo (isset($info['gp_stock']) && ($info['gp_stock'] !== '')?$info['gp_stock']:''); ?>" placeholder="至少1件" id="gp_stock" name="gp_stock">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>配送方式：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <span class="select-box">
                            <select class="select" id="ps">
                                <option>请选择</option>
                                <?php if(is_array($spec) || $spec instanceof \think\Collection || $spec instanceof \think\Paginator): $i = 0; $__LIST__ = $spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option <?php if(!(empty($info['g_typeid']) || (($info['g_typeid'] instanceof \think\Collection || $info['g_typeid'] instanceof \think\Paginator ) && $info['g_typeid']->isEmpty()))): if($vo['gs_id'] == $info['g_typeid']): ?>selected<?php endif; endif; ?> value="<?php echo $vo['gs_id']; ?>" data="<?php echo $vo['gs_name']; ?>" ><?php echo $vo['gs_name']; ?>（<?php echo $vo['gs_des']; ?>）</option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="row cl" id="kdf">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>快递费：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="number" class="input-text" value="<?php echo isset($info['g_express']) ? $info['g_express'] :  ''; ?>" placeholder="" id="g_express" name="g_express">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>拍品描述：</label>
                    <div class="formControls col-xs-8 col-sm-9"> 
                        <script id="editor" type="text/plain" style="width:100%;height:400px;"><?php echo isset($info['g_description']) ? $info['g_description'] :  ''; ?></script>
                    </div>
                </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                        <div class="over"></div>
                        <div onClick="save_submit(this);" class="btn btn-primary radius" id='button_id'><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!--_footer 作为公共模版分离出去-->

<script type="text/javascript" src="/static/h-ui.admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script>
    $('.itemli').on('click',function () {
        var wurl = $(this).find('a').attr('href');
        sessionStorage.setItem('wurl',wurl);
    })
    var links = window.location.pathname;
    $('.itemli').each(function () {
        var ur = $(this).find('a').attr('href');
        if(links == ur) {
            $(this).parents('dd').css("display","block");
            $(this).addClass('current');
            $(this).parents('dl').find('dt').addClass('selected');
        }
    })
</script>

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="/static/h-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/static/h-ui.admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="/static/js/Public.js"></script>
<script type="text/javascript">
    $(function(){
        var ue = UE.getEditor('editor',{
            autoFloatEnabled:false//是否保持toolbar位置不懂
        }); //编辑器
    });

    var g_id = "<?php echo isset($info['g_id']) ? $info['g_id'] :  ''; ?>";

    if($('#ps').val() == 1) {
        $('#kdf').show();
    }

    //显示隐藏快递费
    $('#ps').change(function(){
        if($(this).val() == '1') {
            $('#kdf').show();
        }else {
            $('#kdf').hide();
        }
    })

    $('.preview').each(function(){
        if($(this).attr('src') != '') {
            $(this).parents('.item').find('.delete').show();
            $(this).parents('.item').find('.preBlock').css("background","#fff");
        }
    })
    
    //点击
    var clickImg = function(obj){
        $(obj).parent().find('.upload_input').click();
    }
    //删除
    var deleteImg = function(obj,gi_id,g_id){
        if(gi_id != '' && g_id != '') {
            $.ajax({
                type: "post",
                url: "/business/goods/delete_img/",
                data: {
                    gi_id: gi_id,
                    g_id:g_id
                },
                success: function(res){

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
    }
    //选择图片
    function change(file) {
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
    function save_submit(obj) {
//        $("#button_id").attr('disabled',true);
        var cancel ='';
        var aid = '';
        
        var num = $.trim($('#g_name').val()).length;
        if(num < 1 || num > 40) {
            layer.msg("<span style='color:#fff'>拍品标题长度为1-40字</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }
//        if($('#g_name').val() == '') {
//            layer.msg("<span style='color:#fff'>请填写拍品标题</span>",{time:2000});
//            return false;
//        }
        //图片
        var g_img = [];

        $('.preview').each(function(){
            if($(this).attr('src') != undefined) {
                var imgs = $(this).attr('src');
                if($.trim(imgs) != ''){
                    g_img.push(imgs);
                }
            }            
        })
        if(g_img.length == 0) {
            layer.msg("<span style='color:#fff'>请至少上传一张图片</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }
        if($('#province').val() == '省份') {
            layer.msg("<span style='color:#fff'>请选择省份</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }
        if($('#city').val() == '城市' || $('#city').val() == '请选择') {
            layer.msg("<span style='color:#fff'>请选择城市</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }
        if($('#area').val() == '地区' || $('#area').val() == '请选择') {
            aid = '';
        }else {
            aid = $('#area').val();
        }
        if($('#cate1').val() == '一级分类') {
            layer.msg("<span style='color:#fff'>请选择分类</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }


        if($('#gp_settlement_price').val() == '') {
            layer.msg("<span style='color:#fff'>请输入结算价</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }
        
        // 价格正则验证
        var mm = /(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/;
        if(!mm.test($('#gp_settlement_price').val())) {
			layer.msg("您输入的结算价格式不正确");
            $("#button_id").attr('disabled',false);
			return false;
		}

        if($('#gp_market_price').val() == '') {
            layer.msg("<span style='color:#fff'>请输入市场价</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }
        if(!mm.test($('#gp_market_price').val())) {
			layer.msg("您输入的市场价格式不正确");
            $("#button_id").attr('disabled',false);
			return false;
		}
        //折扣价参与人数
        var gd_info = [];
        var child = [];
        $('input[name="nod"]:checked').each(function(index,item){
            var gdt_id = $(this).val();
            var gdr_membernum = $(this).parents('.content_number_list').find('input[name="membernum"]').val();
            var gdr_price = $(this).parents('.content_number_list').find('input[name="gdr_price"]').val();
            child = [gdt_id,gdr_membernum,gdr_price];
            gd_info.push(child);
        })
        if(gd_info.length == 0) {
            layer.msg("请选择最少一个折扣类型");
            $("#button_id").attr('disabled',false);
            return false;
        }
//        if($('#countTimestart').val() == '') {
//            layer.msg("<span style='color:#fff'>请输入开始时间</span>",{time:2000});
//            return false;
//        }
//        if($('#countTimeend').val() == '') {
//            layer.msg("<span style='color:#fff'>请输入截至时间</span>",{time:2000});
//            return false;
//        }
        if($('#gp_stock').val() == '') {
            layer.msg("<span style='color:#fff'>请输入库存</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }
        if($('#gp_stock').val() <= 0) {
            layer.msg("<span style='color:#fff'>库存必须大于0</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }
        if($('#ps').val() == '请选择') {
            layer.msg("<span style='color:#fff'>请选择配送方式</span>",{time:2000});
            $("#button_id").attr('disabled',false);
            return false;
        }



        var g_id = $("#hidden_val").val();
        var g_state = $("#g_state").val();
        var g_name = $('input[name="g_name"]').val();
        var g_secondname = $('input[name="g_secondname"]').val();
        var g_description = UE.getEditor('editor').getContent();
        var pid = $('#province').val();
        var cid = $('#city').val();        
        var gp_settlement_price = $('input[name="gp_settlement_price"]').val();
        var gp_market_price = $('input[name="gp_market_price"]').val();
        var g_peoplenumber = $('input[name="g_peoplenumber"]').val();
        var g_express = $('input[name="g_express"]').val();
        var g_express_way = $('#ps').find("option:selected").attr('data');
        var g_typeid = $('#ps').val();
        var g_starttime = $('#countTimestart').val();
        var g_endtime = $('#countTimeend').val();
        var gp_stock = $('input[name="gp_stock"]').val();
        var gc_id = $('#classify').val();
        var is_fudai    = 2;
        var is_huodong = 2;
        var sort = 0;
        var gp_state = 2;
        if(<?php echo $type; ?> == 2){
            is_fudai = 1;   //福袋
             sort = $('.sort').val();
            var reg=/^[1-9]\d*$/
            if(!reg.test(sort)){
                layer.msg("<span style='color:#fff'>福袋商品请输入正整数的排序数字</span>",{time:2000});
                $("#button_id").attr('disabled',false);
                return false;
            }
             gp_state = $("input[name='gp_state']:checked").val();
        }else if(<?php echo $type; ?> == 3){
            is_huodong = 1; //活动
        }

        var url = '';
        if(g_state == 0){
            url = '/business/goods/add_goods';
        }else if(g_state == 7 ){
            url = '/business/goods/reedit';
        }else if(g_state == 8 ){
            url = '/business/goods/reedit';

            //现不用此方法
            //url = '/business/goods/supply';
        }
        $('.over').show();
        $(obj).css("background-color","#ccc");

        $.post(url,{
            cancel:cancel,
            g_name:g_name,
            g_secondname:g_secondname,
            g_description:g_description,
            gc_id:gc_id,
            g_typeid:g_typeid,
            pid:pid,
            cid:cid,
            aid:aid,
            g_img:g_img,
            gp_settlement_price:gp_settlement_price,
            gp_market_price:gp_market_price,
            g_express:g_express,
            g_express_way:g_express_way,
            g_starttime:g_starttime,
            g_endtime:g_endtime,
            gp_stock:gp_stock,
            g_id:g_id,
            gd_info:gd_info,
            g_type:1,
            is_fudai:is_fudai,
            sort:sort,
            is_huodong:is_huodong,
            gp_state:gp_state
        },function(res){
            if(res.status == 1){
                layer.msg("<span style='color:#fff'>提交成功</span>",{
                    time:2000
                },function(){
                    location.href="/business/goods/goods_list/type/" + <?php echo $type; ?>;
                });
            }else {
                layer.msg('<span style="color:#fff">'+ res.msg +'</span>',{
                    time:2000
                });
                $('.over').hide();
                $(obj).css("background-color","#286090");
                $("#button_id").attr('disabled',false);
            }
        })
    }
    
    var t = new Date();//当前时间
    var t_s = t.getTime();//转化为时间戳毫秒数
    t.setTime(t_s + 1000 * 60 * 10);//设置新时间比旧时间多十分钟;

    var tt = new Date();//当前时间
    var tt_s = tt.getTime();//转化为时间戳毫秒数
    tt.setTime(600000 + tt_s + 1000 * 60 * 60 * 24 *15);//设置新时间比旧时间多15天加十分钟;

    var datestart = "<?php echo (isset($info['g_starttime']) && ($info['g_starttime'] !== '')?$info['g_starttime']:0); ?>"
    if(datestart !=0) {
        datestart = "<?php echo (isset($info['g_starttime']) && ($info['g_starttime'] !== '')?$info['g_starttime']:0); ?>";
        $('#countTimestart').val(datestart);
    }else {
        $('#countTimestart').val(msToDate(t).wasTime);
    }
    
    var dateend = "<?php echo (isset($info['g_endtime']) && ($info['g_endtime'] !== '')?$info['g_endtime']:0); ?>"
    if(dateend !=0) {
        dateend = "<?php echo (isset($info['g_endtime']) && ($info['g_endtime'] !== '')?$info['g_endtime']:0); ?>";
        $('#countTimeend').val(dateend);
    }else {
        $('#countTimeend').val(msToDate(tt).wasTime);
    }

    //时间控件
    function selecttime(flag){
        if(flag==1){
            var endTime = $("#countTimeend").val();
            if(endTime != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'%y-%M-%d'})
            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})
            }
        }else{
            var startTime = $("#countTimestart").val();

            var t = new Date();//当前时间
            var t_s = t.getTime();//转化为时间戳毫秒数
            t.setTime(t_s + 1000 * 60 * 10);//设置新时间比旧时间多十分钟;

            //标准日期转标准时间
            var t3 = new Date(startTime);
            //标准时间转毫秒数
            var result = t3.getTime();
            t3.setTime(result + 1000 * 60 * 60 * 24 *60);//设置新时间比旧时间多60天;

            if(startTime != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:startTime,maxDate:msToDate(t3).wasTime})
            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})
            }
        }
    }    

    //省市联动
    function address(obj,id) {
        var region_code = $(obj).val();
        $.ajax({
            type: "post",
            url: "/business/goods/address/",
            data: {
                region_code: region_code
            },
            success: function(res){
                if(id == 1) {
                    $('#city').empty().append('<option value="请选择">请选择</option>');
                    $('#area').empty().append('<option value="请选择">请选择</option>');
                }else if(id == 2) {
                    $('#area').empty().append('<option value="请选择">请选择</option>');
                }
                
                for(i=0;i<res.length;i++) {
                    var html = '<option value="'+ res[i].region_code +'">'+ res[i].region_name +'</option>';  
                    if(id==1) {
                        $('#city').append(html);
                    }else if(id==2) {
                        $('#area').append(html);
                    }                    
                }                                
            }
        })
    }

    //分类联动
    function cate(obj,id) {
        var gc_id = $(obj).val();
        $('#classify').val(gc_id);
        if(id != 3) {
            $.ajax({
                type: "post",
                url: "/business/goods/category",
                data: {
                    gc_id: gc_id
                },
                success: function(res){
                    if(id == 1) {
                        $('#cate2').empty().append('<option value="请选择">请选择</option>');
                        $('#cate3').empty().append('<option value="请选择">请选择</option>');
                    }else if(id == 2) {
                        $('#cate3').empty().append('<option value="请选择">请选择</option>');
                    }
                    for(i=0;i<res.length;i++) {
                        var html = '<option value="'+ res[i].gc_id +'">'+ res[i].gc_name +'</option>';   
                        if(id==1) {
                            $('#cate2').append(html);
                        }else if(id==2) {
                            $('#cate3').append(html);
                        }
                    }                              
                }
            })
        }        
    }

    //实时折扣价
    var inp_val=$('#gp_market_price').val();
    if(inp_val==""||inp_val==undefined){
        $(".content_number").removeClass("application_tab_li");
    }else{
        $(".content_number").addClass("application_tab_li");
    }
    $('#gp_market_price').keyup(function(){
        var inp_val=$(this).val();
        if(inp_val==""){
             $(".content_number").removeClass("application_tab_li");
        }else{
             $(".content_number").addClass("application_tab_li");
            $.get('/business/goods/get_discount',{money:inp_val},function(res){
                if(res.status==1){
                    $('.content_number').empty();
                    var html = '';
                    for(var i=0; i<res.data.length; i++) {
                        var num = Number(i)+1;
                        html = '<div class="content_number_list">';
                        if(g_id != '') {
                            if(res.data[i].is_check == 0) {
                                html += '<input type="checkbox"  name="nod" value="'+ res.data[i].gdt_id +'" />';
                            }
                        }else {
                            html += '<input type="checkbox" checked name="nod" value="'+ res.data[i].gdt_id +'" />';
                        }
                        
                        html += '<img src="'+ res.data[i].gdt_img +'"  class="gdt_img'+ num +'">';
                        html += '<span class="content_margin_left gdt_name'+ num +'">'+ res.data[i].gdt_name +'</span>';
                        html += '<span class="content_price_view gdr_price'+ num +'" >￥<input type="number" name="gdr_price" g_id="'+ g_id +'" value="'+ res.data[i].gdr_price +'" /></span>';
                        html += '<span>参与人次';
                        html += '<span class="content_number_view gdr_membernum'+ num +'"><input type="number" name="membernum" g_id="'+ g_id +'" value="'+ res.data[i].gdr_membernum +'" />人</span>';
                        html += '</span>';
                        html += '</div>';
                        $('.content_number').append(html);
                    }                   
                }
            })
        }
    })
</script>

<!--/请在上方写此页面业务相关的脚本-->

<!--此乃百度统计代码，请自行删除-->

<!--/此乃百度统计代码，请自行删除-->
</body>
</html>