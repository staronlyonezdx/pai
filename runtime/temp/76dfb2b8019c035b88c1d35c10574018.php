<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\project\pai\public/../application/admin/view/activity/index.html";i:1543394830;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
<style>
    .top5{margin-top: 5px;}
    .p_gname{
        width:150px;
        overflow:hidden;/*超出长度的文字隐藏*/
        text-overflow:ellipsis;/*文字隐藏以后添加省略号*/
        white-space:nowrap;/*强制不换行*/
    }
    .td_order_info p{margin-bottom: 1px;}
    form .form-group{width: auto}
    table td .suo_img{width:80px;height:auto;}
    .jq_ren{
        color:red;
    }
    .a_description{display: none;}
</style>

	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/lib/jquery-2.1.3.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/jquery.mousewheel.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/jquery.cookie.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/fastclick.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/bootstrap.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/clearmin.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/home.js"></script>
            <script type="text/javascript" src="/static/h-ui.admin/lib/layer/2.4/layer.js"></script>

       		
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

        <label>活动列表</label>
        <!--<a class="pull-right" href="<?php echo url('orderpai/edit'); ?>">添加分类</a>-->

    <form class="form-inline" method="get">
        <div class="form-group">
            <label for="status">活动状态:</label>
            <select class="form-control" id="status" name="status">
                <option value="0">所有</option>
                <option <?php if(!(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty()))): if($status == 1): ?>selected = "selected"<?php endif; endif; ?> value="1">进行中</option>
                <option <?php if(!(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty()))): if($status == 2): ?>selected = "selected"<?php endif; endif; ?> value="2">已结束</option>
                <option <?php if(!(empty($status) || (($status instanceof \think\Collection || $status instanceof \think\Paginator ) && $status->isEmpty()))): if($status == 3): ?>selected = "selected"<?php endif; endif; ?> value="3">未开始</option>
            </select>
        </div>
        <div class="form-group">
            <label for="a_name">活动名称:</label>
            <input type="text" class="form-control" id="a_name" name="a_name" placeholder="活动名称" value="<?php echo (isset($a_name) && ($a_name !== '')?$a_name:''); ?>">
        </div>
        <div class="form-group">
            <label for="a_code">活动编号:</label>
            <input type="text" class="form-control" id="a_code" name="a_code" placeholder="活动编号" value="<?php echo (isset($a_code) && ($a_code !== '')?$a_code:''); ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-info">搜索 <span class="glyphicon glyphicon-search"></span></button>
        </div>
        <div class="form-group pull-right" >
            <a type="button" href="/admin/activity/edit" class="form-control btn btn-info">添加活动 <span class="glyphicon glyphicon-plus"></span></a>
        </div>
    </form>

    <table class="table table-border table-bordered table-bg table-hover table-sort " style="width:100%">
        <thead>
        <tr class="text-c">
            <th>活动id</th>
            <th>活动编码</th>
            <th width="150px">活动名称</th>
            <th width="150px">活动logo</th>
            <th>商品类型</th>
            <th>活动时间</th>
            <th>活动状态</th>
            <th>内容管理</th>
            <th >活动管理</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr class="text-c va-m tr_<?php echo $vo['a_id']; ?>">
            <div class="a_description"><?php echo isset($vo['a_description']) ? $vo['a_description'] :  ''; ?></div>
            <td><?php echo $vo['a_id']; ?></td>
            <td>
                <p class="a_code" title="<?php echo $vo['a_code']; ?>"><?php echo $vo['a_code']; ?></p>
            </td>
            <td>
                <p class="a_name" title="<?php echo $vo['a_name']; ?>"><?php echo (isset($vo['a_name']) && ($vo['a_name'] !== '')?$vo['a_name']:''); ?></p>
            </td>
            <td>
                <p><img src="<?php echo (isset($vo['a_logo']) && ($vo['a_logo'] !== '')?$vo['a_logo']:'/static/image/index/pic_home_taplace@2x.png'); ?>" height="80px" alt="" class="img_big suo_img" ></p>
            </td>
            <td>
                <p>
                    <span>
                        <?php switch($vo['a_product_type']): case "0": ?>默认<?php break; case "1": ?>余额商品<?php break; case "2": ?>花生商品<?php break; endswitch; ?>
                    </span>
                </p>
            </td>
            <td class="td_order_info">
                <p>
                    <span>开始时间：</span>
                    <span><?php echo date("Y-m-d H:i:s",$vo['a_start_time']); ?></span>
                </p>
                <p>
                    <span>结束时间：</span>
                    <span><?php echo date("Y-m-d H:i:s",$vo['a_end_time']); ?></span>
                </p>
            </td>
            <td>
                <p>
                    <?php if($vo['a_state'] == 1): ?>开启<?php else: ?>未开启<?php endif; ?>
                </p>
            </td>
            <td a_id = "<?php echo $vo['a_id']; ?>" a_code="<?php echo $vo['a_code']; ?>" >
                <a href="/admin/activity/goods_admin/a_id/<?php echo $vo['a_id']; ?>/ag_type/1" class="btn btn-xs btn-success top5">广告商品管理</a><br>
                <a href="/admin/activity/goods_admin/a_id/<?php echo $vo['a_id']; ?>/ag_type/2" class="btn btn-xs btn-success activity_edit top5">推荐商品管理</a><br>
                <a href="/admin/activity/goods_admin/a_id/<?php echo $vo['a_id']; ?>/ag_type/0" class="btn btn-xs btn-success activity_edit top5">活动商品管理</a>
            </td>
            <td a_id = "<?php echo $vo['a_id']; ?>" a_code="<?php echo $vo['a_code']; ?>" >
                <button type="button" class="btn btn-xs btn-info activity_page">活动页</button><br>
                <?php if($vo['a_state'] > 0): ?>
                    <button type="button" class="btn btn-xs btn-danger activity_close top5">活动关闭</button><br>
                <?php else: ?>
                    <button type="button" class="btn btn-xs btn-success activity_open top5">活动开启</button><br>
                <?php endif; ?>
                <a href="/admin/activity/edit/a_id/<?php echo $vo['a_id']; ?>" class="btn btn-xs btn-info activity_edit top5">活动编辑</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="page_box pull-right" style="">
        <span class="pagi_bar pull-right">共&nbsp;<?php echo $total; ?>&nbsp;条</span>
        <?php echo $page; ?>
    </div>
</div>
</div>
<img alt="" style="display:none" id="displayImg" src="" />
</div>
<script type="text/javascript">

    $(function(){
        // 活动详情页
        $(".activity_page").click(function(){
            var code = $(this).parents("td").attr("a_code");
            layer.open({
                type: 2,
                title: '活动详情页',
                shadeClose: true,
                shade: 0.5,
                area: ['450px', '90%'],
                content: '/activity/index/index/code/'+code
            });
        });

        //activity_close
        $(".activity_close").click(function(){
            var a_id = $(this).parents("td").attr("a_id");

            layer.confirm('您确定要关闭此活动吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.ajax({
                    type: 'post',
                    url: '/admin/activity/activity_close',
                    dataType: 'json',
                    data:{a_id:a_id},
                    success: function (data) {
                        console.log(data);
                        window.location.reload();
                    }
                });
            }, function(){
                layer.closeAll();
            });
        });

        //activity_open
        $(".activity_open").click(function(){
            var a_id = $(this).parents("td").attr("a_id");
            layer.confirm('您确定要开启此活动吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.ajax({
                    type: 'post',
                    url: '/admin/activity/activity_open',
                    dataType: 'json',
                    data:{a_id:a_id},
                    success: function (data) {
                        console.log(data);
                    }
                });
                window.location.reload();
            }, function(){
                layer.closeAll();
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

        // 确认收货
        $(".order_index_shouhuo").click(function(){
            var o_id = $(this).parents("td").attr("o_id");
            var admin_id = "<?php echo (isset($admin_id) && ($admin_id !== '')?$admin_id:0); ?>";
            layer.confirm("是否确认买家已经收货？", {
                title: false,/*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['取消', '确认'], //按钮
                btn2: function (index) {
                    //按钮2的回调
                    $.ajax({
                        type: 'POST',
                        url: '/member/orderpai/confirm_order',
                        data: {o_id: o_id, admin_id: admin_id},
                        dataType: 'json',
                        success: function (res) {
                            if (res.status == 1) {
                                layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                    time: 2000
                                }, function () {
                                    location.reload();
                                });
                            } else {
                                layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                    time: 2000
                                });
                                layer.close(index);
                            }
                        }
                    });
                }
            })
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
        });

        // 功能建设中
        $(".built").click(function(){
            layer.msg("<span style='color:#fff'>功能开发中...</span>", {
                time: 2000
            });
        });
    })
</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>