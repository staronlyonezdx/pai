<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:75:"D:\project\pai\public/../application/business/view/paiorder/order_list.html";i:1542767234;s:67:"D:\project\pai\public/../application/business/view/common/base.html";i:1541491289;s:69:"D:\project\pai\public/../application/business/view/common/header.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/menu.html";i:1542013166;s:69:"D:\project\pai\public/../application/business/view/common/footer.html";i:1542013166;}*/ ?>
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
    
<style>
    .table {
        width: 100% !important;
    }
    .pagination li>a,.pagination li>span{font-size:12px;padding: 5px 10px;}
    .pagi_bar{display: inline-block;padding-left: 0;margin: 20px 0;border-radius: 4px;font-size:12px;padding: 5px 10px;}
    .pagination>.active>a,
    .pagination>.active>span,
    .pagination>.active>a:hover,
    .pagination>.active>span:hover,
    .pagination>.active>a:focus,
    .pagination>.active>span:focus {
        z-index: 2;
        color: #333;
        cursor: default;
        background-color: #ccc;
        border-color: #ccc;
    }
    .pagination>li>a, .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #333 !important;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .my_pgname{
        width:150px;
        overflow:hidden;/*超出长度的文字隐藏*/
        text-overflow:ellipsis;/*文字隐藏以后添加省略号*/
        white-space:nowrap;/*强制不换行*/
    }
    .my_second_name{
        width:120px;
        overflow:hidden;/*超出长度的文字隐藏*/
        text-overflow:ellipsis;/*文字隐藏以后添加省略号*/
        white-space:nowrap;/*强制不换行*/
    }
    .select_body  .upimg{width:20px;height:20px;display: none;}
    .select_body .select_pic{display: inline-block;}
    .list_body{display: none;}
    .body_active{background: #ccc;}
    .container-fluid {
        height: 100%;
        overflow: auto;
    }
    .review{cursor: pointer;color:#369;}
    .now_public{padding: 3px 5px;height:auto;}
    td .img_big{height:40px;width:auto !important;}
    .top5{margin-top: 5px;}
    .bottom5{margin-bottom: 5px;}
    .btn-primary {
        float: none;
        margin-right: 0;
    }
    form{margin-bottom: 5px;}
    form .form-group{width: auto}
    .td_order_info p{margin-bottom: 2px;}
    .order_time{
        display:flex;
        margin:20px 0px;
    }
    .order_time form{
        margin-right:20px;
    }
</style>

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
<div class="container-fluid" >
    <div class="panel panel-default" >
        <div class="panel-body">
            <div class="form-group  from_add_authority" >
                <label>吖吖订单列表</label>
            </div>
            <form class="form-inline" method="get">
                <div class="form-group">
                    <label for="status">商品分类:</label>
                    <select class="form-control" id="gtype" name="gtype">
                        <option value="0">所有</option>
                        <option <?php if($gtype == 1): ?>selected<?php endif; ?> value="1">普通拍品</option>
                        <option <?php if($gtype == 2): ?>selected<?php endif; ?> value="2">福袋商品</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">订单状态:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0">所有</option>
                        <option <?php if($status == 1): ?>selected<?php endif; ?> value="1">参拍中</option>
                        <option <?php if($status == 2): ?>selected<?php endif; ?> value="2">待发货</option>
                        <option <?php if($status == 3): ?>selected<?php endif; ?> value="3">已发货</option>
                        <option <?php if($status == 4): ?>selected<?php endif; ?> value="4">已签收</option>
                        <option <?php if($status == 5): ?>selected<?php endif; ?> value="5">交易完成</option>
                        <option <?php if($status == 6): ?>selected<?php endif; ?> value="6">未中拍</option>
                        <option <?php if($status == 7): ?>selected<?php endif; ?> value="7">流拍</option>
                        <option <?php if($status == 8): ?>selected<?php endif; ?> value="8">待付款</option>
                        <option <?php if($status == 9): ?>selected<?php endif; ?> value="9">已付款</option>
                        <option <?php if($status == 10): ?>selected<?php endif; ?> value="10">退款中</option>
                        <option <?php if($status == 11): ?>selected<?php endif; ?> value="11">退款完成</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="g_name">宝贝名称:</label>
                    <input type="text" class="form-control" id="g_name" name="g_name" placeholder="宝贝名称" value="<?php echo (isset($g_name) && ($g_name !== '')?$g_name:''); ?>">
                </div>
                <div class="form-group">
                    <label for="m_name">买家昵称:</label>
                    <input type="text" class="form-control" id="m_name" name="m_name" placeholder="买家昵称" value="<?php echo (isset($m_name) && ($m_name !== '')?$m_name:''); ?>">
                </div>
                <div class="form-group">
                    <label for="o_sn">订单编号:</label>
                    <input type="text" class="form-control" id="o_sn" name="o_sn" placeholder="订单编号"  value="<?php echo (isset($o_sn) && ($o_sn !== '')?$o_sn:''); ?>">
                </div>
                <div class="form-group">
                    <label for="m_mobile">手机号:</label>
                    <input type="text" class="form-control" id="m_mobile" name="m_mobile" placeholder="手机号码"  value="<?php echo (isset($m_mobile) && ($m_mobile !== '')?$m_mobile:''); ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-info">搜索 <span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>

            <div class="order_time">
                <form class="form-inline" action="/business/paiorder/order_list" method="get" onsubmit="return checkForm()">
                    <div class="form-group">
                        <label for="status">待发货中奖时间:</label>
                        <input type="text" name="start_time" id="countTimestart" onfocus="selecttime(1)" size="17" value='<?php if(!(empty($start_time) || (($start_time instanceof \think\Collection || $start_time instanceof \think\Paginator ) && $start_time->isEmpty()))): ?><?php echo $start_time; endif; ?>' class="form-control Wdate start_time" readonly placeholder="最小时间"> -
                        <input type="text" name="end_time" id="countTimeend" onfocus="selecttime(2)" size="17" value='<?php if(!(empty($end_time) || (($end_time instanceof \think\Collection || $end_time instanceof \think\Paginator ) && $end_time->isEmpty()))): ?><?php echo $end_time; endif; ?>' class="form-control Wdate end_time" readonly placeholder="最大时间">
                        <input type="hidden" name="status"  value="2">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-info time_select">搜索</button>
                    </div>
                </form>
                <span><a class="current_condition">导出当前时间的待发货表</a></span>

            </div>
            <div class="margin-top">
                <label for="status">订单状态:</label>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status == 0): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(0)">全部</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==1): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(1)">参拍中</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==2): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(2)">待发货</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==3): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(3)">已发货</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==4): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(4)">已签收</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==5): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(5)">交易完成</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==6): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(6)">未中拍</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==7): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(7)">流拍</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==8): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(8)">待付款</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==9): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(9)">已付款</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==10): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(10)">退款中</button>
                <button class=" btn <?php if(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty())): ?> btn-info <?php else: if($status==11): ?>btn-success <?php else: ?> } btn-info <?php endif; endif; ?> size-S" onclick="o_state(11)">退款完成</button>
            </div>

            <table class="table table-border table-bordered table-bg table-hover table-sort " style="width:100%">
                <thead>
                <tr class="text-c">
                    <?php if($status == 2): ?>
                        <th width="150px">中奖公布时间</th>
                        <th>编号</th>
                        <th>商品名称</th>
                        <th>商品图片</th>
                        <th width="150px">收货人</th>
                        <th>地址</th>
                        <th>联系电话</th>
                        <th>快递公司</th>
                        <th>快递单号</th>
                        <th>卖家姓名</th>
                        <th>卖家联系电话</th>
                        <th>立即发货</th>
                    <?php else: ?>
                    <!--<th>订单编号</th>-->
                        <th width="150px">商品信息</th>
                        <th width="150px">店铺信息</th>
                        <th>拍品信息</th>
                        <th>状态</th>
                        <th>购买信息</th>
                        <th>中奖者</th>
                        <th>订单日期</th>
                        <?php if(in_array(($status), explode(',',"3,4,5"))): ?>
                            <th>发货信息</th>
                        <?php endif; endif; ?>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if($status == 2): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr class="text-c va-m tr_<?php echo $vo['o_id']; ?>">
                        <!--<td><?php echo $vo['o_id']; ?></td>-->
                        <td>
                            <p class="o_publishtime" title="<?php echo $vo['o_publishtime']; ?>"><?php echo date('Y-m-d H:i:s',$vo['o_publishtime']); ?></p>
                        </td>
                        <td>
                            <p class="o_sn" title="<?php echo $vo['gp_sn']; ?>">商品编号:<?php echo $vo['o_sn']; ?></p><br/>
                            <p class="o_sn" title="<?php echo $vo['o_sn']; ?>">订单编号:<?php echo $vo['o_sn']; ?></p>
                        </td>
                        <td class="td_order_info">
                            <p class="" title="<?php echo $vo['g_name']; ?>"><?php echo $vo['g_name']; ?></p>
                        </td>
                        <td class="td_order_info">
                            <p><img src="<?php echo $vo['gp_img']; ?>" alt="" class="img_big suo_img" width="80" height="80"></p>
                        </td>
                        <td>
                            <p class="m_name_<?php echo $vo['o_id']; ?>" title="<?php echo $vo['o_receiver']; ?>"><?php echo $vo['o_receiver']; ?></p>
                        </td>
                        <td>
                            <p class="o_address_<?php echo $vo['o_id']; ?>" title="<?php echo $vo['o_address']; ?>"><?php echo $vo['o_address']; ?></p>
                        </td>
                        <td>
                            <p class="m_mobile_<?php echo $vo['o_id']; ?>" title="<?php echo $vo['m_mobile']; ?>"><?php echo $vo['o_mobile']; ?></p>
                        </td>
                        <td>
                               <span class="select-box">
                                  <select class="select_<?php echo $vo['o_id']; ?>" size="1" name="demo1">
                                    <option value="1">中通快递</option>
                                    <option value="2">顺丰快递</option>
                                    <option value="3">申通快递</option>
                                    <option value="4">韵达快递</option>
                                    <option value="5">圆通快递</option>
                                    <option value="6">天天快递</option>
                                    <option value="7">龙邦快递</option>
                                    <option value="8">其他</option>
                                  </select>
                                </span>
                        </td>
                        <td class="td_order_info">
                            <input type="text" class="input-text express_num_<?php echo $vo['o_id']; ?>"  placeholder="快递单号">
                        </td>
                        <td class="td_order_info">
                            <input type="text" class="input-text seller_name_<?php echo $vo['o_id']; ?>"  placeholder="卖家姓名">
                        </td>
                        <td class="td_order_info">
                            <input type="text" class="input-text seller_mobile_<?php echo $vo['o_id']; ?>"  placeholder="联系电话">
                        </td>
                        <td class="td_order_info">
                            <button type="button" class="btn size-MINI btn-info " onclick="ostate_2('<?php echo $vo['o_id']; ?>','<?php echo $vo['gs_id']; ?>')">立即发货</button>
                        </td>

                        <td o_id="<?php echo (isset($vo['o_id']) && ($vo['o_id'] !== '')?$vo['o_id']:0); ?>" g_id="<?php echo (isset($vo['g_id']) && ($vo['g_id'] !== '')?$vo['g_id']:0); ?>" gs_id="<?php echo $vo['gs_id']; ?>">
                            <button type="button" class="btn size-MINI btn-info goods_info">商品详情</button>
                            <button type="button" class="btn size-MINI btn-info order_info top5" onclick="">订单详情</button>
                            <?php switch($vo['o_state']): case "2": ?><button type="button" class="btn size-MINI label-primary top5 lijifahuo">立即发货</button><?php break; case "3": ?><button type="button" class="btn size-MINI label-success top5 fahuoxinxi">发货信息</button><?php break; endswitch; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr class="text-c va-m tr_<?php echo $vo['o_id']; ?>">
                        <!--<td><?php echo $vo['o_id']; ?></td>-->
                        <td>
                            <p>商品编号：<?php echo $vo['gp_sn']; ?></p>
                            <p class="p_gname" title="<?php echo $vo['g_name']; ?>"><?php echo $vo['g_name']; ?></p>
                            <p><img src="<?php echo $vo['gp_img']; ?>" alt="" class="img_big suo_img" width="80" height="80"></p>
                        </td>
                        <td>
                            <p class="stroe_name" title="<?php echo $vo['stroe_name']; ?>"><?php echo (isset($vo['stroe_name']) && ($vo['stroe_name'] !== '')?$vo['stroe_name']:''); ?></p>
                            <p><img src="<?php echo (isset($vo['store_logo']) && ($vo['store_logo'] !== '')?$vo['store_logo']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="" class="img_big suo_img" ></p>
                        </td>
                        <td>
                            <p>
                                <span>拍品价格：</span><br>
                                <span>￥<?php echo $vo['min_price']; ?>-<?php echo $vo['max_price']; ?></span>
                            </p>
                            <p>
                                <span>商品属性：</span><br>
                                    <span>
                                        <?php switch($vo['gs_id']): case "1": ?>（普通商品）<?php break; case "2": ?>（虚拟商品）<?php break; case "3": ?>（大宗商品）<?php break; endswitch; ?>
                                    </span>
                            </p>
                        </td>
                        <td>
                            <p>
                                <span>支付状态：</span><br>
                                    <span>
                                        <?php switch($vo['o_paystate']): case "1": ?>待付款<?php break; case "2": ?>已付款<?php break; case "3": ?>退款中<?php break; case "4": ?>退款完成<?php break; endswitch; ?>
                                    </span>
                            </p>
                            <p>
                                <span>订单状态：</span><br>
                                    <span>
                                        <?php switch($vo['o_state']): case "1": ?>参拍中<?php break; case "2": ?>等待发货<?php break; case "3": ?>等待签收<?php break; case "4": ?>等待评价<?php break; case "5": ?>交易完成<?php break; case "10": ?>未中拍<?php break; case "11": ?>流拍<?php break; endswitch; ?>
                                    </span>
                            </p>
                        </td>
                        <td class="td_order_info">

                            <p>
                                <span>订单编号：</span>
                                <span><?php echo $vo['o_sn']; ?></span>
                            </p>
                            <p>
                                <span>买家昵称：</span>
                                <span><?php echo $vo['m_name']; ?></span>
                            </p>
                            <p>
                                <span>下单手机号：</span>
                                <span><?php echo $vo['m_mobile']; ?></span>
                            </p>
                            <p>
                                <span>收货手机号：</span>
                                <span><?php echo $vo['o_mobile']; ?></span>
                            </p>
                            <p>
                                <span>参拍期数：</span>
                                <span><?php echo $vo['o_periods']; ?></span>
                            </p>
                            <p>
                                <span>参拍价：</span>
                                <span>￥<?php echo $vo['o_money']; ?></span>
                            </p>
                            <p>
                                <span>购买数量：</span>
                                <span><?php echo $vo['gp_num']; ?></span>
                            </p>
                            <p>
                                <span>邮费：</span>
                                <span>￥<?php echo $vo['o_deliverfee']; ?></span>
                            </p>
                            <p>
                                <span>订单总费用：</span>
                                <span>￥<?php echo $vo['o_totalmoney']; ?></span>
                            </p>
                        </td>
                        <td>
                            <?php if(empty($vo['award_m_name']) || (($vo['award_m_name'] instanceof \think\Collection || $vo['award_m_name'] instanceof \think\Paginator ) && $vo['award_m_name']->isEmpty())): ?>
                            <p>无</p>
                            <?php else: ?>
                            <p><img src="<?php echo (isset($vo['award_m_avatar']) && ($vo['award_m_avatar'] !== '')?$vo['award_m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" class="img_big" width="50px" alt=""/></p>
                            <p><?php echo (isset($vo['award_m_name']) && ($vo['award_m_name'] !== '')?$vo['award_m_name']:''); ?></p>
                            <?php endif; ?>

                        </td>
                        <td>
                            <?php if(!(empty($vo['o_addtime']) || (($vo['o_addtime'] instanceof \think\Collection || $vo['o_addtime'] instanceof \think\Paginator ) && $vo['o_addtime']->isEmpty()))): ?>
                            <p>
                                <span>下单时间：</span><br>
                                <span><?php echo date("Y-m-d H:i:s",$vo['o_addtime']); ?></span>
                            </p>
                            <?php endif; if(!(empty($vo['o_paytime']) || (($vo['o_paytime'] instanceof \think\Collection || $vo['o_paytime'] instanceof \think\Paginator ) && $vo['o_paytime']->isEmpty()))): ?>
                            <p>
                                <span>付款时间：</span><br>
                                <span><?php echo date("Y-m-d H:i:s",$vo['o_paytime']); ?></span>
                            </p>
                            <?php endif; if(!(empty($vo['o_publishtime']) || (($vo['o_publishtime'] instanceof \think\Collection || $vo['o_publishtime'] instanceof \think\Paginator ) && $vo['o_publishtime']->isEmpty()))): ?>
                            <p>
                                <span>中奖公布时间：</span><br>
                                <span><?php echo date("Y-m-d H:i:s",$vo['o_publishtime']); ?></span>
                            </p>
                            <?php endif; ?>
                        </td>
                        <?php if(in_array(($status), explode(',',"3,4,5"))): ?>
                        <td>
                            <?php if(!(empty($vo['o_receiver']) || (($vo['o_receiver'] instanceof \think\Collection || $vo['o_receiver'] instanceof \think\Paginator ) && $vo['o_receiver']->isEmpty()))): ?>
                            <p>
                                <span>收货人姓名：</span>
                                <span><?php echo $vo['o_receiver']; ?></span>
                            </p>
                            <?php endif; if(!(empty($vo['o_mobile']) || (($vo['o_mobile'] instanceof \think\Collection || $vo['o_mobile'] instanceof \think\Paginator ) && $vo['o_mobile']->isEmpty()))): ?>
                            <p>
                                <span>收货人电话：</span>
                                <span><?php echo $vo['o_mobile']; ?></span>
                            </p>
                            <?php endif; if(!(empty($vo['o_address']) || (($vo['o_address'] instanceof \think\Collection || $vo['o_address'] instanceof \think\Paginator ) && $vo['o_address']->isEmpty()))): ?>
                            <p>
                                <span>收货人地址：</span><br/>
                                <span><?php echo $vo['o_address']; ?></span>
                            </p>
                            <?php endif; if(!(empty($vo['o_express_way']) || (($vo['o_express_way'] instanceof \think\Collection || $vo['o_express_way'] instanceof \think\Paginator ) && $vo['o_express_way']->isEmpty()))): ?>
                            <p>
                                <span>物流名称：</span>
                                <span><?php echo $vo['o_express_way']; ?></span>
                            </p>
                            <?php endif; if(!(empty($vo['o_express_num']) || (($vo['o_express_num'] instanceof \think\Collection || $vo['o_express_num'] instanceof \think\Paginator ) && $vo['o_express_num']->isEmpty()))): ?>
                            <p>
                                <span>快递单号：</span>
                                <span><?php echo $vo['o_express_num']; ?></span>
                            </p>
                            <?php endif; if(!(empty($vo['o_seller_name']) || (($vo['o_seller_name'] instanceof \think\Collection || $vo['o_seller_name'] instanceof \think\Paginator ) && $vo['o_seller_name']->isEmpty()))): ?>
                            <p>
                                <span>发货人姓名：</span>
                                <span><?php echo $vo['o_seller_name']; ?></span>
                            </p>
                            <?php endif; if(!(empty($vo['o_seller_mobile']) || (($vo['o_seller_mobile'] instanceof \think\Collection || $vo['o_seller_mobile'] instanceof \think\Paginator ) && $vo['o_seller_mobile']->isEmpty()))): ?>
                            <p>
                                <span>发货人联系电话：</span>
                                <span><?php echo $vo['o_seller_mobile']; ?></span>
                            </p>
                            <?php endif; ?>
                        </td>
                        <?php endif; ?>
                        <td o_id="<?php echo (isset($vo['o_id']) && ($vo['o_id'] !== '')?$vo['o_id']:0); ?>" g_id="<?php echo (isset($vo['g_id']) && ($vo['g_id'] !== '')?$vo['g_id']:0); ?>" gs_id="<?php echo $vo['gs_id']; ?>">
                            <button type="button" class="btn btn-sm btn-info goods_info">商品详情</button>
                            <button type="button" class="btn btn-sm btn-info order_info top5" onclick="">订单详情</button>
                            <?php if($vo['o_state'] == 2 or $vo['o_state'] == 12): ?>
                            <button type="button" class="btn btn-sm btn-primary top5 lijifahuo" onclick="">立即发货</button>
                            <?php elseif(($vo['o_state'] > 2 and $vo['o_state'] < 6) or ($vo['o_state'] > 12 and $vo['o_state'] < 16)): endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </tbody>
            </table>
        </div>
        <div>
            <div class="page_box pull-right" style="">
                <span class="pagi_bar pull-right">共&nbsp;<?php echo $total; ?>&nbsp;条</span>
                <?php echo $page; ?>
            </div>
        </div>
    </div>
</div>
<img alt="" style="display:none" id="displayImg" src="" />

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
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/h-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
    <script type="text/javascript" src="/static/js/Public.js"></script>
<script type="text/javascript">
    //点击发货
    function ostate_2(o_id,gs_id){
        if(gs_id == 1) {
            var express_corid = $('.select_' + o_id).val();
            var express_way = $('.select_' + o_id).find("option:selected").text();
            var express_num = $('.express_num_' + o_id).val();
            var seller_name = $('.seller_name_' + o_id).val();
            var seller_mobile = $('.seller_mobile_' + o_id).val();
            //数据验证
            if (!o_id) {
                layer.msg("<span style='color:#fff'>参数错误</span>", {
                    time: 2000
                });
                return false;
            }
            if (!express_corid || !express_way) {
                layer.msg("<span style='color:#fff'>请选择快递公司</span>", {
                    time: 2000
                });
                return false;
            }
            if (seller_name == "") {
                layer.msg("<span style='color:#fff'>卖家姓名不能为空</span>", {
                    time: 2000
                });
                return false;
            }
            var tel_reg = /^1[3-9][0-9]{9}$|^0\d{2,3}-?\d{7,8}$/;
            if (seller_mobile == "") {
                layer.msg("<span style='color:#fff'>联系电话不能为空</span>", {
                    time: 2000
                });
                return false;
            }
            $.ajax({
                url: "/member/orderpai/new_logistics_post",
                dataType: 'json',
                type: 'POST',
                data: {
                    o_id: o_id,
                    express_corid: express_corid,
                    express_way: express_way,
                    express_num: express_num,
                    seller_name: seller_name,
                    seller_mobile: seller_mobile
                },
                success: function (data) {
                    if (!data.status) {
                        layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                            time: 2000
                        });
                    } else {
                        layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                            time: 2000
                        });
                        $('.tr_' + o_id).remove();
                    }
                }
            });
        }else{
            //询问框
            var gs_name = '';
            if(gs_id == 3){
                gs_name = "大宗商品";
            }else{
                gs_name = "虚拟商品";
            }
            layer.confirm('此商品为'+gs_name+",不需要填写快递信息，确认要发货吗？", {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.ajax({
                    type: 'post',
                    url: '/member/orderpai/send_out',
                    dataType: 'json',
                    data:{o_id:o_id},
                    success: function (data) {
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
            }, function(){
                layer.closeAll();
            });
        }
    }

    //导出当前添加的excel
    //协议
    var ht = window.location.protocol;
    //域名
    var url = window.location.host;
    //完整的域名
    var totao_url = window.location.href;
    var info = totao_url.replace(ht + '//' + url + '/business/paiorder/order_list'  ,'');
    var new_url =  '/business/paiorder/order_list/excel/1' + info;
    $('.current_condition').attr('href',  new_url);
    //检测中奖时间
    function checkForm(){
        var start_time = $('#countTimestart').val();
        var end_time = $('#countTimeend').val();

        if(!start_time || !end_time){
            layer.msg("<span style='color:#fff'>中奖时间为一个时间段</span>",{
                time:2000
            });
            return false;
        }else{
            if(start_time >= end_time){
                layer.msg("<span style='color:#fff'>开始时间要小于结束时间哦</span>",{
                    time:2000
                });
                return false;
            }
        }
    }
    $(function(){
        // 商品详情
        $(".goods_info").click(function(){
            var g_id = $(this).parents("td").attr("g_id");
            layer.open({
                type: 2,
                title: '商品详情页',
                shadeClose: true,
                shade: 0.5,
                area: ['380px', '90%'],
                content: '/member/goodsproduct/index/g_id/'+g_id
            });
        });

        // 订单详情
        $(".order_info").click(function(){
            var o_id = $(this).parents("td").attr("o_id");
            layer.open({
                type: 2,
                title: '订单详情页',
                shadeClose: true,
                shade: 0.5,
                area: ['380px', '90%'],
                content: '/member/orderpai/sell_goods_info/o_id/'+o_id
            });
        });

        // 立即发货
        $(".lijifahuo").click(function(){
            var o_id = $(this).parents("td").attr("o_id");
            var gs_id = $(this).parents("td").attr("gs_id");
            if(gs_id == 1){
                layer.open({
                    type: 2,
                    title: '物流信息页',
                    shadeClose: true,
                    shade: 0.5,
                    area: ['380px', '90%'],
                    content: '/member/Orderpai/new_logistics/o_id/'+o_id+'/is_layer/1'
                });
            }else{
                //询问框
                var gs_name = '';
                if(gs_id == 3){
                    gs_name = "大宗商品";
                }else{
                    gs_name = "虚拟商品";
                }
                layer.confirm('此商品为'+gs_name+",不需要填写快递信息，确认要发货吗？", {
                    btn: ['确认','取消'] //按钮
                }, function(){
                    $.ajax({
                        type: 'post',
                        url: '/member/orderpai/send_out',
                        dataType: 'json',
                        data:{o_id:o_id},
                        success: function (data) {
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
                }, function(){
                    layer.closeAll();
                });
            }
        });

        // 发货信息
        $(".fahuoxinxi").click(function(){
            var o_id = $(this).parents("td").attr("o_id");
            layer.open({
                type: 2,
                title: '人气活动详情页',
                shadeClose: true,
                shade: 0.5,
                area: ['380px', '90%'],
                content: '/member/orderpai/order_logistics/o_id/'+o_id+'/is_seller/1'
            });
        });

        // 图片放大
        $(".img_big").click(function(){
            var src = $(this).attr("src");
            $("#displayImg").attr("src", src);
            var height = $("#displayImg").height();//拿的图片原来宽高，建议自定义宽高
            var width = $("#displayImg").width();
            var rate = height / width;
            var win_width = $(window).width();
            var win_height = $(window).height();
            if(width > win_width/2){
                width = win_width/2;
                height = width * rate;
            }
            if(height > win_height){
                var h_rate = win_height / height;
                height = win_height;
                width = width * h_rate;
            }
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                shadeClose: true,
                area: [width + 'px', height + 'px'], //宽高
                content: "<img alt=" + name + " title=" + name + " src=" + src + " width=" + width + " height=" + height + " />"
            });
        })
    })
    //    //时间控件
    function selecttime(flag){
        if(flag==1){
            var endTime = $("#countTimeend").val();
            if(endTime != ""){
                WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})
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
    //订单状态
    function o_state(num){
        var start_time = $('.start_time').val();
        var end_time = $('.end_time').val();
        if(start_time && end_time){
            location.href='/business/paiorder/order_list/status/' + num + '/start_time/' + start_time + '/end_time/' + end_time;
        }else{
            location.href='/business/paiorder/order_list/status/' + num ;

        }
    }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<!--/请在上方写此页面业务相关的脚本-->

<!--此乃百度统计代码，请自行删除-->

<!--/此乃百度统计代码，请自行删除-->
</body>
</html>