<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:67:"D:\project\pai\public/../application/business/view/index/index.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/base.html";i:1541491289;s:69:"D:\project\pai\public/../application/business/view/common/header.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/menu.html";i:1542013166;s:69:"D:\project\pai\public/../application/business/view/common/footer.html";i:1542013166;}*/ ?>
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
        <span class="c-666">我的桌面</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="Hui-article">


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

<!--/请在上方写此页面业务相关的脚本-->

<!--此乃百度统计代码，请自行删除-->

<!--/此乃百度统计代码，请自行删除-->
</body>
</html>