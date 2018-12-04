<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\project\pai\public/../application/admin/view/activity/goods_list.html";i:1543283930;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
    .toolong_hide{
        width:200px;
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
            <label>
                <img src="<?php echo $info['a_logo']; ?>" width="30px" class="img_big"> |  <?php echo isset($info['a_name']) ? $info['a_name'] :  ''; ?> |
                <?php switch($ag_type): case "1": ?>
                添加广告商品
                <?php break; case "2": ?>
                添加推荐商品
                <?php break; default: ?>添加活动商品
                <?php endswitch; ?>
            </label>
            <form class="form-inline" method="get">
                <div class="form-group">
                    <label for="g_name">商品名称:</label>
                    <input type="text" class="form-control" id="g_name" name="g_name" placeholder="请搜索商品名称" value="<?php echo (isset($g_name) && ($g_name !== '')?$g_name:''); ?>">
                </div>
                <div class="form-group">
                    <label for="gp_sn">商品编号:</label>
                    <input type="text" class="form-control" id="gp_sn" name="gp_sn" placeholder="请搜索商品编号" value="<?php echo (isset($gp_sn) && ($gp_sn !== '')?$gp_sn:''); ?>">
                </div>
                <div class="form-group">
                    <label for="stroe_name">发布店铺:</label>
                    <input type="text" class="form-control" id="stroe_name" name="stroe_name" placeholder="请搜索店铺昵称" value="<?php echo (isset($stroe_name) && ($stroe_name !== '')?$stroe_name:''); ?>">
                </div>
                <div class="form-group">
                    <label for="status">商品类目:</label>
                    <select class="form-control" id="status" name="type">
                        <option value="0">全部类目</option>
                        <option <?php if(!(empty($type) || (($type instanceof \think\Collection || $type instanceof \think\Paginator ) && $type->isEmpty()))): if($type == 1): ?>selected = "selected"<?php endif; endif; ?> value="1">普通商品</option>
                        <option <?php if(!(empty($type) || (($type instanceof \think\Collection || $type instanceof \think\Paginator ) && $type->isEmpty()))): if($type == 2): ?>selected = "selected"<?php endif; endif; ?> value="2">虚拟商品</option>
                        <option <?php if(!(empty($type) || (($type instanceof \think\Collection || $type instanceof \think\Paginator ) && $type->isEmpty()))): if($type == 3): ?>selected = "selected"<?php endif; endif; ?> value="3">大宗商品</option>
                        <option <?php if(!(empty($type) || (($type instanceof \think\Collection || $type instanceof \think\Paginator ) && $type->isEmpty()))): if($type == 4): ?>selected = "selected"<?php endif; endif; ?> value="4">余额可退</option>
                        <option <?php if(!(empty($type) || (($type instanceof \think\Collection || $type instanceof \think\Paginator ) && $type->isEmpty()))): if($type == 5): ?>selected = "selected"<?php endif; endif; ?> value="5">余额不退</option>
                        <option <?php if(!(empty($type) || (($type instanceof \think\Collection || $type instanceof \think\Paginator ) && $type->isEmpty()))): if($type == 6): ?>selected = "selected"<?php endif; endif; ?> value="6">花生不退</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-info">搜索 <span class="glyphicon glyphicon-search"></span></button>
                </div>
            </form>

            <table class="table table-border table-bordered table-bg table-hover table-sort " style="width:100%">
                <thead>
                <tr class="text-c">
                    <th>
                        <input type="checkbox" id="goods_ids" name="goods_ids[]" class="all_checked" >
                        <label for="goods_ids">全选:</label>
                    </th>
                    <th>商品图片</th>
                    <th>商品标题</th>
                    <th>店铺信息</th>
                    <th>商品类型</th>
                    <th>商品起止时间</th>
                    <th>商品状态</th>
                    <th>商品价格</th>
                    <th>商品库存</th>
                    <th >操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                <tr>
                    <td colspan="20">没有数据~</td>
                </tr>
                <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c va-m" g_id = "<?php echo $vo['g_id']; ?>" >
                    <td>
                        <input type="checkbox" name="goods_ids[]" class="box_checked" >
                    </td>
                    <td>
                        <p><img src="<?php echo $vo['g_img']; ?>" height="80px" alt="" class="img_big suo_img" ></p>
                    </td>
                    <td>
                        <p class="g_name toolong_hide toolong_hide" title="<?php echo $vo['g_name']; ?>">商品名称：<?php echo (isset($vo['g_name']) && ($vo['g_name'] !== '')?$vo['g_name']:''); ?></p>
                        <p class="gp_sn toolong_hide toolong_hide" title="<?php echo $vo['gp_sn']; ?>">商品SN：<?php echo (isset($vo['gp_sn']) && ($vo['gp_sn'] !== '')?$vo['gp_sn']:''); ?></p>
                    </td>
                    <td>
                        <p class="stroe_name toolong_hide" title="<?php echo $vo['stroe_name']; ?>"><?php echo (isset($vo['stroe_name']) && ($vo['stroe_name'] !== '')?$vo['stroe_name']:''); ?></p>
                        <p class="corporation_tel toolong_hide" title="<?php echo $vo['corporation_tel']; ?>">公司电话:<?php echo (isset($vo['corporation_tel']) && ($vo['corporation_tel'] !== '')?$vo['corporation_tel']:''); ?></p>
                    </td>
                    <td>
                        <p>
                            <?php switch($vo['g_typeid']): case "0": ?>其他<?php break; case "1": ?>普通商品<?php break; case "2": ?>虚拟商品<?php break; case "3": ?>大宗商品<?php break; endswitch; ?>
                        </p>
                        <p>
                            <span>
                                <?php if($vo['play_type'] == 2): ?>
                                余额支付不中不退款
                                <?php elseif($vo['play_type'] == 3): ?>
                                花生支付不中不退
                                <?php elseif($vo['is_fudai'] == 1): ?>
                                福袋商品
                                <?php elseif($vo['is_huodong'] == 1): ?>
                                福袋商品
                                <?php else: ?>
                                余额支付不中退款
                                <?php endif; ?>
                            </span>
                        </p>
                    </td>
                    <td class="td_order_info">
                        <p class="toolong_hide" title='<?php echo date("Y-m-d H:i:s",$vo['g_starttime']); ?>'>
                            <span>开始时间：</span>
                            <span><?php echo date("Y-m-d H:i:s",$vo['g_starttime']); ?></span>
                        </p>
                        <p class="toolong_hide" title='<?php echo date("Y-m-d H:i:s",$vo['g_endtime']); ?>'>
                            <span>结束时间：</span>
                            <span><?php echo date("Y-m-d H:i:s",$vo['g_endtime']); ?></span>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php switch($vo['g_state']): case "1": ?>未支付保证金<?php break; case "2": ?>审核中<?php break; case "4": ?>已失败<?php break; case "6": ?>竞拍中<?php break; case "7": ?>编辑中<?php break; case "8": ?>已流拍<?php break; case "9": ?>已完成<?php break; endswitch; ?>
                        </p>
                    </td>
                    <td>
                        <p><span>参拍价格：￥<?php echo isset($vo['min_goods_price']) ? $vo['min_goods_price'] :  '0.00'; ?>-<?php echo isset($vo['max_goods_price']) ? $vo['max_goods_price'] :  '0.00'; ?></span></p>
                        <p><span>市场价：￥<?php echo isset($vo['gp_market_price']) ? $vo['gp_market_price'] :  '0.00'; ?></span></p>
                        <p><span>结算价：￥<?php echo isset($vo['gp_settlement_price']) ? $vo['gp_settlement_price'] :  '0.00'; ?></span></p>
                    </td>
                    <td>
                        <p>
                            <?php echo $vo['gp_stock']; ?>
                        </p>
                    </td>

                    <td g_id = "<?php echo $vo['g_id']; ?>" gp_id="<?php echo $vo['gp_id']; ?>">
                        <button type="button" class="btn btn-xs btn-info goods_info">商品参拍页</button><br>
                        <?php if($ag_type == 1): ?>
                        <button type="button" class="btn btn-xs btn-success add_goods top5">选为广告商品</button><br>
                        <?php elseif($ag_type == 2): ?>
                        <button type="button" class="btn btn-xs btn-success add_goods top5">选为推荐商品</button><br>
                        <?php else: ?>
                        <button type="button" class="btn btn-xs btn-danger add_goods top5">选为活动商品</button><br>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="20">
                        <button type="button" class="btn btn-sm btn-success add_all_goods">确认添加</button>
                        <button type="reset" class="btn btn-sm btn-waning">取消</button>
                    </td>
                </tr>
                <?php endif; ?>
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
        // 商品详情页
        $(".goods_info").click(function(){
            var g_id = $(this).parent("td").attr("g_id");
            layer.open({
                type: 2,
                title: '商品详情页',
                shadeClose: true,
                shade: 0.5,
                area: ['380px', '90%'],
                content: '/member/goodsproduct/index/g_id/'+g_id
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
        });

        // 图片保存不展示
        $('img').on('error',function(){
            $(this).attr('src','/static/image/index/pic_home_taplace@2x.png');
        });

        // 全选/全不选
        $(".all_checked").change(function(){
            if($(this).is(':checked')){
                //alert(1);
                // 所有的选中
                $(".box_checked").prop("checked",true);
            }else{
                //alert(0);
                // 所有的不选中
                $(".box_checked").prop("checked",false);
            }
        });

        // 判断全选状态
        $(".box_checked").click(function(){
            var check_num = 0;
            $(".box_checked").each(function(){
                if(!$(this).is(':checked')){
                    $(".all_checked").prop("checked",false);
                }else{
                    check_num++;
                }
            });
            if($(".box_checked").length == check_num){
                $(".all_checked").prop("checked",true);
            }
        });

        // 单个确认添加
        $(".add_goods").click(function(){
            var a_id = "<?php echo isset($a_id) ? $a_id :  0; ?>";
            var ag_type = "<?php echo isset($ag_type) ? $ag_type :  1; ?>";
            var g_id = $(this).parent("td").attr("g_id");
            $(this).attr("disabled",true);
            $.ajax({
                type: 'post',
                url: '/admin/activity/add_goods',
                dataType: 'json',
                data:{a_id:a_id,ag_type:ag_type,g_ids:g_id},
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
        });

        // 批量添加
        $(".add_all_goods").click(function(){
            var a_id = "<?php echo isset($a_id) ? $a_id :  0; ?>";
            var ag_type = "<?php echo isset($ag_type) ? $ag_type :  1; ?>";
            var ids = '';
            $(".box_checked").each(function(){
                if($(this).is(':checked')){
                    var gid = $(this).parents("tr").attr("g_id");
                    ids = ids + gid + ",";
                }
            });
            if(ids == ''){
                layer.msg("<span style='color:#fff'>请选择商品</span>",{
                    time:2000
                });
                return;
            }
            $.ajax({
                type: 'post',
                url: '/admin/activity/add_goods',
                dataType: 'json',
                data:{a_id:a_id,ag_type:ag_type,g_ids:ids},
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