<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:76:"D:\project\pai\public/../application/business/view/popularitygoods/edit.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/base.html";i:1541491289;s:69:"D:\project\pai\public/../application/business/view/common/header.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/menu.html";i:1542013166;s:69:"D:\project\pai\public/../application/business/view/common/footer.html";i:1542013166;}*/ ?>
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
            <span class="c-666">人气商品</span>
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div class="Hui-article">
            <div class="page-container">
                <form class="form form-horizontal" id="form-article-add">
                    <div class="form-group from_add_authority">
                        <label><?php if($pg_id > 0): ?>人气商品修改<?php else: ?>人气商品添加<?php endif; ?></label>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>人气商品标题：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_name" class="input-text" placeholder="人气商品标题" value="<?php echo (isset($info['pg_name']) && ($info['pg_name'] !== '')?$info['pg_name']:''); ?>" >
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">商品二级标题：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_second_name" class="form-control" placeholder="商品二级标题"
                                   value="<?php echo (isset($info['pg_second_name']) && ($info['pg_second_name'] !== '')?$info['pg_second_name']:''); ?>">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>结束时间：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="end_time" id="countTimeend" onfocus="selecttime(1)" size="17" class="input-text Wdate" readonly>
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>市场价：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_market_price" class="form-control" placeholder="市场价"
                                   value="<?php echo (isset($info['pg_market_price']) && ($info['pg_market_price'] !== '')?$info['pg_market_price']:''); ?>">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>参加价格：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_price" class="form-control" placeholder="参加价格"
                                   value="<?php echo (isset($info['pg_price']) && ($info['pg_price'] !== '')?$info['pg_price']:''); ?>">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>成团人数：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_membernum" class="form-control" placeholder="成团人数"
                                   value="<?php echo (isset($info['pg_membernum']) && ($info['pg_membernum'] !== '')?$info['pg_membernum']:''); ?>">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>入选人数：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_chosen_num" class="form-control" placeholder="入选人数"
                                   value="<?php echo (isset($info['pg_chosen_num']) && ($info['pg_chosen_num'] !== '')?$info['pg_chosen_num']:''); ?>">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>未中赠送花生：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_loser_point" class="form-control" placeholder="未中赠送花生"
                                   value="<?php echo (isset($info['pg_loser_point']) && ($info['pg_loser_point'] !== '')?$info['pg_loser_point']:''); ?>">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>排序：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_sortnum" class="form-control" placeholder="排序"
                                   value="<?php echo (isset($info['pg_sortnum']) && ($info['pg_sortnum'] !== '')?$info['pg_sortnum']:''); ?>">
                        </div>
                    </div>

                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>领取方式：</label>
                        <div class="radio-box">
                            <input type="radio" id="radio-1" class="pg_type" name="pg_type" value="1" <?php if(!(empty($info['pg_type']) || (($info['pg_type'] instanceof \think\Collection || $info['pg_type'] instanceof \think\Paginator ) && $info['pg_type']->isEmpty()))): if($info['pg_type'] == '1'): ?>checked<?php endif; else: ?>checked<?php endif; ?> >
                            <label for="radio-1">在线公布</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" id="radio-2" class="pg_type" name="pg_type" value="2" <?php if(!(empty($info['pg_type']) || (($info['pg_type'] instanceof \think\Collection || $info['pg_type'] instanceof \think\Paginator ) && $info['pg_type']->isEmpty()))): if($info['pg_type'] == '2'): ?>checked<?php endif; endif; ?>>
                            <label for="radio-2">线下获得+线上获得</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" id="radio-20" class="pg_type" name="pg_type" value="3" <?php if(!(empty($info['pg_type']) || (($info['pg_type'] instanceof \think\Collection || $info['pg_type'] instanceof \think\Paginator ) && $info['pg_type']->isEmpty()))): if($info['pg_type'] == '3'): ?>checked<?php endif; endif; ?>>
                            <label for="radio-20">线下活动商品</label>
                        </div>
                    </div>
                    <!--<div class="row cl">-->
                        <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上下架：</label>-->
                        <!--<div class="radio-box">-->
                            <!--<input type="radio" id="radio-5" class="is_shelves" name="is_shelves" value="1" <?php if(!(empty($info['is_shelves']) || (($info['is_shelves'] instanceof \think\Collection || $info['is_shelves'] instanceof \think\Paginator ) && $info['is_shelves']->isEmpty()))): if($info['is_shelves'] == '1'): ?>checked<?php endif; else: ?>checked<?php endif; ?> >-->
                            <!--<label for="radio-5">上架</label>-->
                        <!--</div>-->
                        <!--<div class="radio-box">-->
                            <!--<input type="radio" id="radio-6" class="is_shelves" name="is_shelves" value="2" <?php if(!(empty($info['is_shelves']) || (($info['is_shelves'] instanceof \think\Collection || $info['is_shelves'] instanceof \think\Paginator ) && $info['is_shelves']->isEmpty()))): if($info['is_shelves'] == '2'): ?>checked<?php endif; endif; ?>>-->
                            <!--<label for="radio-6">下架</label>-->
                        <!--</div>-->
                    <!--</div>-->

                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">上架位置：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" name="pg_position" class="form-control pg_position" placeholder="预上架位置"
                                   value="<?php echo (isset($info['pg_position']) && ($info['pg_position'] !== '')?$info['pg_position']:''); ?>">
                        </div>
                    </div>

                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>拍品类型：</label>
                        <div class="radio-box">
                            <input type="radio" id="radio-7"  class="pg_spec" <?php if(!(empty($info['pg_spec']) || (($info['pg_spec'] instanceof \think\Collection || $info['pg_spec'] instanceof \think\Paginator ) && $info['pg_spec']->isEmpty()))): if($info['pg_spec'] == '1'): ?>checked<?php endif; endif; ?> name="pg_spec" value="1" >
                            <label for="radio-7">普通商品</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" id="radio-8" class="pg_spec"  <?php if(!(empty($info['pg_spec']) || (($info['pg_spec'] instanceof \think\Collection || $info['pg_spec'] instanceof \think\Paginator ) && $info['pg_spec']->isEmpty()))): if($info['pg_spec'] == '2'): ?>checked<?php endif; endif; ?> name="pg_spec" value="2">
                            <label for="radio-8">虚拟商品</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio"  id="radio-9" class="pg_spec" <?php if(!(empty($info['pg_spec']) || (($info['pg_spec'] instanceof \think\Collection || $info['pg_spec'] instanceof \think\Paginator ) && $info['pg_spec']->isEmpty()))): if($info['pg_spec'] == '3'): ?>checked<?php endif; endif; ?>  name="pg_spec" value="3">
                            <label for="radio-9">大宗商品</label>
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否首页展示：</label>
                        <div class="radio-box">
                            <input type="radio" id="radio-10"  <?php if(!(empty($info['is_show']) || (($info['is_show'] instanceof \think\Collection || $info['is_show'] instanceof \think\Paginator ) && $info['is_show']->isEmpty()))): if($info['is_show'] == '1'): ?>checked<?php endif; else: ?>checked<?php endif; ?>  class="is_show" name="is_show" value="1" >
                            <label for="radio-10">是</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio"  id="radio-11" <?php if(!(empty($info['is_show']) || (($info['is_show'] instanceof \think\Collection || $info['is_show'] instanceof \think\Paginator ) && $info['is_show']->isEmpty()))): if($info['is_show'] == '2'): ?>checked<?php endif; endif; ?>  class="is_show" name="is_show" value="2">
                            <label for="radio-11">否</label>
                        </div>
                    </div>

                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品状态：</label>
                        <div class="radio-box">
                            <input type="radio" id="radio-13" class="pg_status" name="pg_status" value="1" <?php if(!(empty($info['pg_status']) || (($info['pg_status'] instanceof \think\Collection || $info['pg_status'] instanceof \think\Paginator ) && $info['pg_status']->isEmpty()))): if($info['pg_status'] == '1'): ?>checked<?php endif; endif; ?> >
                            <label for="radio-13">上架</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" id="radio-14" class="pg_status" name="pg_status" value="2" <?php if(!(empty($info['pg_status']) || (($info['pg_status'] instanceof \think\Collection || $info['pg_status'] instanceof \think\Paginator ) && $info['pg_status']->isEmpty()))): if($info['pg_status'] == '2'): ?>checked<?php endif; endif; ?>>
                            <label for="radio-14">预上架</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" id="radio-15" class="pg_status" name="pg_status" value="3" <?php if(!(empty($info['pg_status']) || (($info['pg_status'] instanceof \think\Collection || $info['pg_status'] instanceof \think\Paginator ) && $info['pg_status']->isEmpty()))): if($info['pg_status'] == '3'): ?>checked<?php endif; endif; ?>>
                            <label for="radio-15">下架</label>
                        </div>
                    </div>
                    <!--<div class="row cl">-->
                        <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否精选推荐：</label>-->
                        <!--<div class="radio-box">-->
                            <!--<input type="radio" id="radio-16" class="is_recommendation" name="is_recommendation" value="1" <?php if(!(empty($info['is_recommendation']) || (($info['is_recommendation'] instanceof \think\Collection || $info['is_recommendation'] instanceof \think\Paginator ) && $info['is_recommendation']->isEmpty()))): if($info['is_recommendation'] == '1'): ?>checked<?php endif; endif; ?>-->
                            <!--<label for="radio-16">是</label>-->
                        <!--</div>-->
                        <!--<div class="radio-box">-->
                            <!--<input type="radio" id="radio-17" class="is_recommendation" name="is_recommendation" value="2" <?php if(!(empty($info['is_recommendation']) || (($info['is_recommendation'] instanceof \think\Collection || $info['is_recommendation'] instanceof \think\Paginator ) && $info['is_recommendation']->isEmpty()))): if($info['is_recommendation'] == '2'): ?>checked<?php endif; endif; ?>>-->
                            <!--<label for="radio-17">否</label>-->
                        <!--</div>-->
                    <!--</div>-->

                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>人气商品主图（建议上传800像素*600像素,默认第一张为主图）：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <div class="item">
                                <div class="addImg" onclick="clickImg(this);"></div>
                                <input name="url" type="file" class="upload_input" onchange="change(this)" />
                                <div class="preBlock">
                                    <img class="preview" alt="" name="pg_img" src="<?php echo isset($info['pg_imgs'][0]['pgi_url']) ? $info['pg_imgs'][0]['pgi_url'] :  ''; ?>" />
                                </div>
                                <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['pg_imgs'][0]['pgi_id']) ? $info['pg_imgs'][0]['pgi_id'] :  ''; ?>',<?php echo isset($pg_id) ? $pg_id :  ''; ?>)" src="/static/image/business/goods/delete.png" />
                            </div>
                            <div class="item">
                                <div class="addImg" onclick="clickImg(this);"></div>
                                <input name="url" type="file" class="upload_input" onchange="change(this)" />
                                <div class="preBlock">
                                    <img class="preview" alt="" name="pg_img" src="<?php echo isset($info['pg_imgs'][1]['pgi_url']) ? $info['pg_imgs'][1]['pgi_url'] :  ''; ?>" />
                                </div>
                                <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['pg_imgs'][1]['pgi_id']) ? $info['pg_imgs'][1]['pgi_id'] :  ''; ?>',<?php echo isset($pg_id) ? $pg_id :  ''; ?>)" src="/static/image/business/goods/delete.png" />
                            </div>
                            <div class="item">
                                <div class="addImg" onclick="clickImg(this);"></div>
                                <input name="url" type="file" class="upload_input" onchange="change(this)" />
                                <div class="preBlock">
                                    <img class="preview" alt="" name="pg_img" src="<?php echo isset($info['pg_imgs'][2]['pgi_url']) ? $info['pg_imgs'][2]['pgi_url'] :  ''; ?>" />
                                </div>
                                <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['pg_imgs'][2]['pgi_id']) ? $info['pg_imgs'][2]['pgi_id'] :  ''; ?>',<?php echo isset($pg_id) ? $pg_id :  ''; ?>)" src="/static/image/business/goods/delete.png" />
                            </div>
                            <div class="item">
                                <div class="addImg" onclick="clickImg(this);"></div>
                                <input name="url" type="file" class="upload_input" onchange="change(this)" />
                                <div class="preBlock">
                                    <img class="preview" alt="" name="pg_img" src="<?php echo isset($info['pg_imgs'][3]['pgi_url']) ? $info['pg_imgs'][3]['pgi_url'] :  ''; ?>" />
                                </div>
                                <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['pg_imgs'][3]['pgi_id']) ? $info['pg_imgs'][3]['pgi_id'] :  ''; ?>',<?php echo isset($pg_id) ? $pg_id :  ''; ?>)" src="/static/image/business/goods/delete.png" />
                            </div>
                            <div class="item">
                                <div class="addImg" onclick="clickImg(this);"></div>
                                <input name="url" type="file" class="upload_input" onchange="change(this)" />
                                <div class="preBlock">
                                    <img class="preview" alt="" name="pg_img" src="<?php echo isset($info['pg_imgs'][4]['pgi_url']) ? $info['pg_imgs'][4]['pgi_url'] :  ''; ?>" />
                                </div>
                                <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['pg_imgs'][4]['pgi_id']) ? $info['pg_imgs'][4]['pgi_id'] :  ''; ?>',<?php echo isset($pg_id) ? $pg_id :  ''; ?>)" src="/static/image/business/goods/delete.png" />
                            </div>
                            <div class="item">
                                <div class="addImg" onclick="clickImg(this);"></div>
                                <input name="url" type="file" class="upload_input" onchange="change(this)" />
                                <div class="preBlock">
                                    <img class="preview" alt="" name="pg_img" src="<?php echo isset($info['pg_imgs'][5]['pgi_url']) ? $info['pg_imgs'][5]['pgi_url'] :  ''; ?>" />
                                </div>
                                <img class="delete" onclick="deleteImg(this,'<?php echo isset($info['pg_imgs'][5]['pgi_id']) ? $info['pg_imgs'][5]['pgi_id'] :  ''; ?>',<?php echo isset($pg_id) ? $pg_id :  ''; ?>)" src="/static/image/business/goods/delete.png" />
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="pg_id" value="<?php echo (isset($pg_id) && ($pg_id !== '')?$pg_id:'0'); ?>"/>

                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品描述：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <script id="editor" type="text/plain" style="width:100%;height:400px;"><?php echo (isset($info['pg_des']) && ($info['pg_des'] !== '')?$info['pg_des']:''); ?></script></div>
                </div>
                 <div class="row cl">
                        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                            <div onClick="save_submit();" class="btn btn-primary radius save_submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</div>
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
<script type="text/javascript">
    $(function(){
        var ue = UE.getEditor('editor',{
            autoFloatEnabled:false//是否保持toolbar位置不懂
        }); //编辑器
    });

    var dateend = "<?php echo (isset($info['end_time']) && ($info['end_time'] !== '')?$info['end_time']:0); ?>"
    if(dateend !=0) {
        dateend = "<?php echo (isset($info['end_time']) && ($info['end_time'] !== '')?$info['end_time']:0); ?>";
        $('#countTimeend').val(dateend);
    }


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
    var deleteImg = function(obj,pgi_id,pg_id){
        $.ajax({
            type: "post",
            url: "/business/Popularitygoods/delete_img",
            data: {
                pgi_id:pgi_id,
                pg_id:pg_id
            },
            success: function(res){
            }
        })
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
    function save_submit() {
        $('.save_submit').attr('disabled',true);
        var num = $.trim($('input[name="pg_name"]').val()).length;
        if(num < 1 || num > 40) {
            layer.msg("<span style='color:#fff'>拍品标题长度为1-40字</span>",{time:2000});
            $('.save_submit').attr('disabled',false);
            return false;
        }
//        //图片
        var gp_img = [];
        $('.preview').each(function(){
            if($(this).attr('src') != undefined) {
                var imgs = $(this).attr('src');
                gp_img.push(imgs);
            }
        })


        var pg_name = $('input[name="pg_name"]').val();
        var pg_second_name = $('input[name="pg_second_name"]').val();
        var end_time = $('#countTimeend').val();
        var gp_market_price = $('input[name="gp_market_price"]').val();
        var gp_price = $('input[name="gp_price"]').val();
        var pg_membernum = $('input[name="pg_membernum"]').val();
        var pg_chosen_num = $('input[name="pg_chosen_num"]').val();
        var pg_market_price = $('input[name="pg_market_price"]').val();
        var pg_price = $('input[name="pg_price"]').val();
        var pg_sortnum = $('input[name="pg_sortnum"]').val();
        var pg_des = UE.getEditor('editor').getContent();
        var pg_id = $('input[name="pg_id"]').val();
        var pg_type = $('input[name="pg_type"]:checked').val();
        var pg_spec = $('input[name="pg_spec"]:checked').val();
        var pg_loser_point = $('input[name="pg_loser_point"]').val();
        var pg_position = $('input[name="pg_position"]').val();
//        var is_shelves = $('input[name="is_shelves"]:checked').val();//(暂时不用)

        var is_show = $('input[name="is_show"]:checked').val();
        var pg_status = $('input[name="pg_status"]:checked').val();
//        var is_recommendation = $('input[name="is_recommendation"]:checked').val();
        if(pg_spec == undefined){
            layer.msg("<span style='color:#fff'>请选择拍品类型</span>",{time:2000});
            $('.save_submit').attr('disabled',false);
            return false;
        }
        if(pg_status == undefined){
            layer.msg("<span style='color:#fff'>请选择商品状态</span>",{time:2000});
            $('.save_submit').attr('disabled',false);
            return false;
        }
//        if(is_recommendation == undefined){
//            layer.msg("<span style='color:#fff'>请选择是否精选推荐</span>",{time:2000});
//            $('.save_submit').attr('disabled',false);
//            return false;
//        }
//        console.log(is_show,pg_status,is_recommendation);
//        return false;
        $.post('/business/popularitygoods/edit',{
            pg_name:pg_name,
            pg_second_name:pg_second_name,
            end_time:end_time,
            gp_market_price:gp_market_price,
            gp_price:gp_price,
            pg_membernum:pg_membernum,
            pg_chosen_num:pg_chosen_num,
            pg_market_price:pg_market_price,
            pg_price:pg_price,
            pg_sortnum:pg_sortnum,
            pg_des:pg_des,
            pg_id:pg_id,
            gp_img:gp_img,
            pg_type:pg_type,
            pg_spec:pg_spec,
            pg_loser_point:pg_loser_point,
//            is_shelves:is_shelves,
            pg_position:pg_position,
            is_show:is_show,
            pg_status:pg_status,
//            is_recommendation:is_recommendation
        },function(res){
            if(res.status == 1){
                layer.msg("<span style='color:#fff'>提交成功</span>",{
                    time:2000
                },function(){
                    console.log(3);
                    if(pg_type == 3){
                        location.href="/business/popularitygoods/goods_list_two";
                    }else{
                        location.href="/business/popularitygoods/goodslist";
                    }
                });
            }else {
                layer.msg('<span style="color:#fff">'+ res.msg +'</span>',{
                    time:2000
                });
                $('.save_submit').attr('disabled',false);
            }
        })
    }

    var datas = new Date();
    //时间控件
    function selecttime(flag){
            var endTime = $("#countTimeend").val();
            if(endTime != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})
            }else{
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})
            }
    }




</script>

<!--/请在上方写此页面业务相关的脚本-->

<!--此乃百度统计代码，请自行删除-->

<!--/此乃百度统计代码，请自行删除-->
</body>
</html>