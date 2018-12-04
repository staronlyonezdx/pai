<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\project\pai\public/../application/admin/view/orderpai/index.html";i:1541491287;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
    table td .suo_img{width:100px;height:auto;}
    .jq_ren{
        color:red;
    }
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
            <div class="form-group  from_add_authority">
                <label>拍品订单列表</label>
                <!--<a class="pull-right" href="<?php echo url('orderpai/edit'); ?>">添加分类</a>-->

            </div>
            <form class="form-inline" method="get">
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
                    <button type="submit" class="form-control btn btn-info">搜索 <span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>

            <table class="table table-border table-bordered table-bg table-hover table-sort " style="width:100%">
                <thead>
                <tr class="text-c">
                    <!--<th>订单编号</th>-->
                    <th width="150px">商品信息</th>
                    <th width="150px">店铺信息</th>
                    <th>拍品信息</th>
                    <th>状态</th>
                    <th>购买信息</th>
                    <th>中奖者</th>
                    <th>订单日期</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c va-m tr_<?php echo $vo['o_id']; ?>">
                    <!--<td><?php echo $vo['o_id']; ?></td>-->
                    <td>
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
                        <p>
                            <span>是否为机器人：</span>
                            <?php if($vo['is_jq'] == 1): ?><span class="jq_ren">是</span><?php else: ?><span>否</span><?php endif; ?>
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
                    <td o_id="<?php echo (isset($vo['o_id']) && ($vo['o_id'] !== '')?$vo['o_id']:0); ?>" g_id="<?php echo (isset($vo['g_id']) && ($vo['g_id'] !== '')?$vo['g_id']:0); ?>" gs_id="<?php echo $vo['gs_id']; ?>">
                        <button type="button" class="btn btn-sm btn-info goods_info">商品详情</button>
                        <button type="button" class="btn btn-sm btn-info order_info top5" onclick="">订单详情</button>
                        <?php switch($vo['o_state']): case "3": ?>
                            <button type="button" class="btn btn-sm top5 fahuoxinxi" onclick="">发货信息</button>
                            <?php if($admin_id == 1): ?>
                            <button type="button" class="btn btn-sm top5 order_index_shouhuo" onclick="">确认收货</button>
                            <?php endif; break; case "4": ?>
                        <button type="button" class="btn btn-sm top5 fahuoxinxi" onclick="">发货信息</button>
                        <?php break; case "5": ?>
                        <button type="button" class="btn btn-sm top5 fahuoxinxi" onclick="">发货信息</button>
                        <?php break; endswitch; ?>
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
    })
</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>