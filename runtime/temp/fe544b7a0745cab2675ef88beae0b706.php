<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"D:\project\pai\public/../application/admin/view/activity/goods_admin.html";i:1543453232;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
<!--<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/goodscategory.css">-->
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/edit.css">

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
    .sort_span{border:1px dotted #ccc;display: inline-block;width:50px;}
    .sort_input{display: none;}

    /*上传图片样式*/
    .item-logo {
        width: 90px;
        height: 50px;
        float: left;
        margin: 0 10px 10px 0;
        border: 1px solid #ddd;
        background: url(/static/image/business/goods/addImg.png) no-repeat;
        background-size: 100% 100%;
    }
    .item {
        width: 230px;
        height: 65px;
        float: left;
        margin: 0 10px 10px 0;
        border: 1px solid #ddd;
        background: url(/static/image/business/goods/addimg2.png) no-repeat;
        background-size: 100% 100%;
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
        <img src="<?php echo $info['a_logo']; ?>" width="30px" class="img_big img_error"> |  <?php echo isset($info['a_name']) ? $info['a_name'] :  ''; ?> |
        <?php switch($ag_type): case "1": ?>
        广告商品列表
        <?php break; case "2": ?>
        推荐商品列表
        <?php break; default: ?>活动商品列表
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
        <div class="form-group pull-right" >
            <a type="button" href="/admin/activity/goods_list/a_id/<?php echo $a_id; ?>/ag_type/<?php echo $ag_type; ?>" class="form-control btn btn-info">添加商品 <span class="glyphicon glyphicon-plus"></span></a>
        </div>
    </form>

    <table class="table table-border table-bordered table-bg table-hover table-sort " style="width:100%">
        <thead>
        <tr class="text-c">
            <th>商品id</th>
            <th>商品图片</th>
            <th>商品标题</th>
            <th>店铺信息</th>
            <th>商品类型</th>
            <th>商品起止时间</th>
            <th>商品状态</th>
            <th>商品价格</th>
            <th>商品库存</th>
            <th>活动排序<br><i>（小的靠前,点击数字修改）</i></th>
            <?php if($ag_type == 1): ?>
            <th>商品广告图片</th>
            <?php endif; ?>
            <th >操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
        <tr>
            <td colspan="20">没有数据~</td>
        </tr>
        <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr class="text-c va-m tr_<?php echo $vo['a_id']; ?>">
            <td><?php echo $vo['g_id']; ?></td>
            <td>
                <p><img src="<?php echo $vo['g_img']; ?>" height="80px" alt="" class="img_error img_big suo_img" ></p>
            </td>
            <td>
                <p class="g_name toolong_hide" title="<?php echo $vo['g_name']; ?>">商品名称：<?php echo (isset($vo['g_name']) && ($vo['g_name'] !== '')?$vo['g_name']:''); ?></p>
                <p class="gp_sn toolong_hide" title="<?php echo $vo['gp_sn']; ?>">商品SN：<?php echo (isset($vo['gp_sn']) && ($vo['gp_sn'] !== '')?$vo['gp_sn']:''); ?></p>
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
                <p  class="toolong_hide" title='<?php echo date("Y-m-d H:i:s",$vo['g_endtime']); ?>'>
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
            <td>
                <span class="sort_span"><?php echo $vo['ag_sort']; ?></span>
                <input type="text" class="sort_input" size="3" value="<?php echo $vo['ag_sort']; ?>"/>
            </td>
            <?php if($ag_type == 1): ?>
            <td>
                <div class="item-logo view">
                    <div class="addImg" onclick="clickImg(this);"></div>
                    <input name="url" type="file" class="upload_input" onchange="change(this)" />
                    <div class="preBlock">
                        <img class="preview ag_banner" alt="" name="ag_banner"  src="<?php echo isset($vo['ag_banner']) ? $vo['ag_banner'] :  ''; ?>" style="border:none;"/>
                    </div>
                    <img class="delete" onclick="delete_ag_banner(this)" src="/static/image/business/goods/delete.png" />
                </div>
                </div>
            </td>
            <?php endif; ?>
            <td class="data-td" a_id = "<?php echo $vo['a_id']; ?>" a_code="<?php echo $vo['a_code']; ?>" g_id="<?php echo $vo['g_id']; ?>" ag_id="<?php echo $vo['ag_id']; ?>">
                <button type="button" class="btn btn-xs btn-info goods_info">商品参拍页</button><br>
                <?php if($ag_type == 1): ?>
                <button type="button" class="btn btn-xs btn-warning del_goods top5">剔除广告商品</button><br>
                <?php elseif($ag_type == 2): ?>
                <button type="button" class="btn btn-xs btn-warning del_goods top5">剔除推荐商品</button><br>
                <?php else: ?>
                <button type="button" class="btn btn-xs btn-warning del_goods top5">剔除活动商品</button><br>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
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

<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/summernote.min.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/notepad.js"></script>
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
        //剔除商品
        $(".del_goods").click(function(){
            var this_btn = $(this);
            var a_id = "<?php echo isset($a_id) ? $a_id :  0; ?>";
            var g_id = this_btn.parent("td").attr("g_id");
            this_btn.attr("disabled",true);
            layer.confirm('您确定要把此商品从该活动中剔除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.ajax({
                    type: 'post',
                    url: '/admin/activity/del_goods',
                    dataType: 'json',
                    data:{a_id:a_id,g_id:g_id},
                    success: function (data) {
                        layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                            time:2000
                        });
                        this_btn.attr("disabled",false);
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

        // 更改活动商品的顺序
        $(".sort_span").click(function(){
            $(this).hide();
            $(this).siblings(".sort_input").show().focus();
        });
        $(".sort_input").blur(function(){
            var ag_sort = $(this).val();
            var ag_id = $(this).parent("td").siblings(".data-td").attr("ag_id");
            $(this).siblings(".sort_span").html(ag_sort).show();
            $(this).hide();
            $.ajax({
                type: 'post',
                url: '/admin/activity/set_sort',
                dataType: 'json',
                data:{ag_id:ag_id,ag_sort:ag_sort},
                success: function (data) {
                    layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                        time:2000
                    });
                }
            });

        });

        $('.img_error').on('error',function(){
            $(this).attr('src','/static/image/index/pic_home_taplace@2x.png');
        });
    })

    /**
     * 以下为广告图操作
     * @param file
     */
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

        // 上传到远程
        var ag_id = $(file).parents("td").siblings(".data-td").attr("ag_id");

        // 广告商品banner
        setTimeout(function(){
            var ag_banner = $(file).parents("td").find(".ag_banner").attr('src');
            if(ag_id && ag_banner){
                $.ajax({
                    type: 'post',
                    url: '/admin/activity/update_ads_banner',
                    dataType: 'json',
                    data:{ag_id:ag_id,ag_banner:ag_banner},
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
            }

        },200);
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
    var delete_ag_banner = function(obj){
        $(obj).parent().find('input').val('');
        $(obj).parent().find('img.preview').attr("src","");
        //IE9以下
        $(obj).parent().find('img.preview').css("filter","");
        $(obj).hide();
        $(obj).parent().find('.addImg').show();
        $(obj).siblings('.preBlock').css("background","none");
    }
</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>