<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:81:"D:\project\pai\public/../application/business/view/popularitygoods/goodslist.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/base.html";i:1541491289;s:69:"D:\project\pai\public/../application/business/view/common/header.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/menu.html";i:1542013166;s:69:"D:\project\pai\public/../application/business/view/common/footer.html";i:1542013166;}*/ ?>
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
    
<link rel="stylesheet" type="text/css" href="__ADMIN_LIB_CLEARMINMASTER_CSS__/summernote.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/add_admin.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/goodscategory.css">
<style>
    .table {
        width: 100% !important;
    }
    .Hui-article-box{
        overflow: auto;
    }
    .sele_box{
        margin-top:20px;
    }
    .sele{
        display: inline-block;
        width:350px;
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
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group  from_add_authority">
                <label>人气商品列表</label>
                <a class="pull-right" href="<?php echo url('popularitygoods/edit'); ?>">添加商品</a>
            </div>
            <span>商品状态：</span>
            <a href="/business/popularitygoods/goodslist/pg_state/0" type="button" class="btn <?php if($pg_state == '0'): ?>btn-success<?php else: ?> btn-info <?php endif; ?> btn-xs">全部</a>
            <a href="/business/popularitygoods/goodslist/pg_state/1" type="button" class="btn <?php if($pg_state == '1'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">参拍中</a>
            <a href="/business/popularitygoods/goodslist/pg_state/8" type="button" class="btn <?php if($pg_state == '8'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">参拍完成</a>

            <a href="/business/popularitygoods/goodslist/pg_status/1" type="button" class="btn <?php if($pg_status == '1'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">上架</a>
            <a href="/business/popularitygoods/goodslist/pg_status/2" type="button" class="btn <?php if($pg_status == '2'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">预上架</a>
            <a href="/business/popularitygoods/goodslist/home/1" type="button" class="btn btn-warning radius btn-xs">人气首页12个商品</a>
            <div class="sele_box">
                <span>搜索：</span>
                <input type="text" class="input-text radius size-M sele sn_code" placeholder="请输入商品pg_id或编号或商品名称"><button class="btn btn-success radius" onclick="pg_se()">搜索</button>
            </div>
            <table class="table table-hover" style="margin-bottom:0">
                <thead>
                <tr>
                    <th>商品ID</th>
                    <th>编号</th>
                    <th width="150px;">人气商品</th>
                    <th>商品二级标题</th>
                    <th>添加日期</th>
                    <th>添加管理员ID</th>
                    <th>市场价</th>
                    <th>参加价格</th>
                    <th>成团人数</th>
                    <th>参拍状态</th>
                    <th>参拍期数</th>
                    <th>入选人数</th>
                    <th>排序</th>
                    <th>位置</th>
                    <th>领取方式</th>
                    <th>首页展示</th>
                    <th>是否精选</th>
                    <th>商品状态</th>
                    <th>人气商品主图</th>
                    <th>更新日期</th>
                    <th>结束日期</th>
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
                    <th scope="row" class="sid"><?php echo $vo['pg_id']; ?></th>
                    <th scope="row" ><?php echo $vo['pg_sn']; ?></th>
                    <td><?php echo $vo['pg_name']; ?></td>
                    <td><?php echo $vo['pg_second_name']; ?></td>
                    <!--<td><?php echo $vo['add_time']; ?></td>-->
                    <td><?php if(!(empty($vo['add_time']) || (($vo['add_time'] instanceof \think\Collection || $vo['add_time'] instanceof \think\Paginator ) && $vo['add_time']->isEmpty()))): ?><?php echo date("Y-m-d H:i:s",$vo['add_time']); else: endif; ?></td>
                    <td><?php echo $vo['admin_id']; ?></td>
                    <td><?php echo $vo['pg_market_price']; ?></td>
                    <td><?php echo $vo['pg_price']; ?></td>
                    <td><?php echo $vo['pg_membernum']; ?></td>
                    <td><?php if($vo['pg_state'] == 1): ?>参拍中<?php else: ?>参拍完成<?php endif; ?></td>
                    <td><?php echo $vo['pg_periods']; ?></td>
                    <td><?php echo $vo['pg_chosen_num']; ?></td>
                    <td><?php echo $vo['pg_sortnum']; ?></td>
                    <td><?php echo $vo['pg_position']; ?></td>
                    <td><?php if($vo['pg_type'] == 1): ?>在线公布<?php elseif($vo['pg_type']==2): ?>现场领取<?php else: ?>未知<?php endif; ?></td>
                    <td><?php if($vo['is_show'] == 1): ?>是<?php elseif($vo['is_show']==2): ?>否<?php else: ?>未知<?php endif; ?></td>
                    <td><?php if($vo['is_recommendation'] == 1): ?>是<?php elseif($vo['is_recommendation']==2): ?>否<?php else: ?>未知<?php endif; ?></td>
                    <td><?php if($vo['pg_status'] == 1): ?>上架<?php elseif($vo['pg_status']==2): ?>预上架<?php else: ?>下架<?php endif; ?></td>
                    <td><img src="<?php echo (isset($vo['pg_img']) && ($vo['pg_img'] !== '')?$vo['pg_img']:''); ?>"></td>
                    <td><?php if(!(empty($vo['update_time']) || (($vo['update_time'] instanceof \think\Collection || $vo['update_time'] instanceof \think\Paginator ) && $vo['update_time']->isEmpty()))): ?><?php echo date("Y-m-d H:i:s",$vo['update_time']); else: endif; ?></td>
                    <td><?php if(!(empty($vo['end_time']) || (($vo['end_time'] instanceof \think\Collection || $vo['end_time'] instanceof \think\Paginator ) && $vo['end_time']->isEmpty()))): ?><?php echo date("Y-m-d H:i:s",$vo['end_time']); else: endif; ?></td>
                    <td>
                        <a href="<?php echo url('popularitygoods/edit',['pg_id' => $vo['pg_id']]); ?>">
                            编辑
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
</section>
<script type="text/javascript">
    function pg_se(){
        var value = $('.sn_code').val();
        console.log($.trim(value));
        value = $.trim(value)
        if(value){
            location.href='/business/popularitygoods/goodslist/pg_sn/'+value
        }
    }
</script>

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