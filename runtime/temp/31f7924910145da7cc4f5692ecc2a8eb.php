<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\project\pai\public/../application/admin/view/goods/goodslist.html";i:1541583031;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1541491286;}*/ ?>

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
        	
<style>
    .select_box{
        margin-left:30px;
    }
    .form-control{
        width: 100px;
        display:inline-block;
    }
    .fade{
        margin-top:10%;

    }
    .modal-body{
        z-index: 100000;
    }
    label{
        width:80px;
    }
    .form-control{
        width:250px;
        height:200px;
       vertical-align: middle;
    }
    .num{
        width:80px;
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
       		
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/summernote.min.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/notepad.js"></script>

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
        <header id="cm-header" style="z-index: 9999;">
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
                <label>商品审核： </label>
                <span class="select_box">
                    <label> 商品状态:</label>
                    <select type="text" class="form-control input-sm slt" >
                        <option <?php if($g_state == '2'): ?>selected="selected"<?php endif; ?> value="2" >待审核</option>
                        <option <?php if($g_state == '6'): ?>selected="selected"<?php endif; ?> value="6">审核通过</option>
                        <option <?php if($g_state == '4'): ?>selected="selected"<?php endif; ?> value="4">审核失败</option>
                    </select>
                </span>
            </div>
            <div class="form-group  from_add_authority">
                <span class="select_box">
                    <label> 热拍商品:</label>
                    <select type="text" class="form-control input-sm hot" >
                        <option <?php if($is_heat == ''): ?>selected="selected"<?php endif; ?> value="" >全部</option>
                        <option <?php if($is_heat == '1'): ?>selected="selected"<?php endif; ?> value="1">热拍</option>
                    </select>
                </span>
            </div>
            <table class="table table-hover" style="margin-bottom:0">
                <thead>
                <tr>
                    <th>申请ID</th>
                    <th style="width:150px;">标题</th>
                    <!--<th style="width:150px;">二级标题</th>-->
                    <th>地区</th>
                    <th>商品图片</th>
                    <!--<th style="width:200px;">商品描述</th>-->
                    <th>商品类型</th>
                    <th>开始日期</th>
                    <th>结束日期</th>
                    <th>申请时间</th>
                    <th>审核时间</th>
                    <th>市场价</th>
                    <th>结算价</th>
                    <th>快递方式</th>
                    <th>快递费</th>
                    <th style="width:150px;">限购数 </th>
                    <th style="width:100px;">商品类型 </th>
                    <th>是否推荐</th>
                    <th>是否热拍</th>
                    <th>状态 </th>
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
                    <td class="id_<?php echo $vo['g_id']; ?>"><?php echo $vo['g_id']; ?></td>
                    <td class="name_<?php echo $vo['g_id']; ?>"><?php echo $vo['g_name']; ?></td>
                    <!--<td><?php echo $vo['g_secondname']; ?></td>-->
                    <td><?php echo $vo['shop_address']; ?></td>
                    <td><img src="__CDN_PATH__<?php echo $vo['g_img']; ?>" alt="" width="50" height="50"></td>
                    <!--<td><?php echo $vo['g_description']; ?></td>-->
                    <!--<td><?php echo $vo['g_typeid']; ?></td>-->
                    <td><?php echo isset($spec[$vo['g_typeid']]) ? $spec[$vo['g_typeid']] :  '未知'; ?></td>
                    <td><?php if(!(empty($vo['g_starttime']) || (($vo['g_starttime'] instanceof \think\Collection || $vo['g_starttime'] instanceof \think\Paginator ) && $vo['g_starttime']->isEmpty()))): ?><?php echo date("m-d H:i",$vo['g_starttime']); else: ?>通过立即开拍<?php endif; ?></td>
                    <td><?php if(!(empty($vo['g_endtime']) || (($vo['g_endtime'] instanceof \think\Collection || $vo['g_endtime'] instanceof \think\Paginator ) && $vo['g_endtime']->isEmpty()))): ?><?php echo date("m-d H:i",$vo['g_endtime']); else: endif; ?></td>
                    <td><?php if(!(empty($vo['g_addtime']) || (($vo['g_addtime'] instanceof \think\Collection || $vo['g_addtime'] instanceof \think\Paginator ) && $vo['g_addtime']->isEmpty()))): ?><?php echo date("m-d H:i",$vo['g_addtime']); else: endif; ?></td>
                    <td><?php if(!(empty($vo['g_audittime']) || (($vo['g_audittime'] instanceof \think\Collection || $vo['g_audittime'] instanceof \think\Paginator ) && $vo['g_audittime']->isEmpty()))): ?><?php echo date("m-d H:i",$vo['g_audittime']); else: endif; ?></td>
                    <td><?php echo $vo['gp_market_price']; ?></td>
                    <td><?php echo $vo['gp_settlement_price']; ?></td>
                    <td><?php echo $vo['g_express_way']; ?></td>
                    <td><?php echo $vo['g_express']; ?></td>
                    <td><?php if(is_array($vo['limit_list']) || $vo['limit_list'] instanceof \think\Collection || $vo['limit_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['limit_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
                            <div style="display:flex;"><?php echo $voo['gdt_name']; ?>:<input type="text" id="g_limited<?php echo $voo['gdr_id']; ?>" placeholder="限购数" class="num<?php echo $vo['g_id']; ?> input-text radius col-sm-5" data-value='<?php echo $voo['gdr_id']; ?>' value="<?php echo $voo['gdr_limited']; ?>"></div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                    <td>
                        <?php if($vo['is_huodong'] == 1): ?>
                        活动商品
                        <?php elseif($vo['is_fudai'] == 1): ?>
                        福袋商品
                        <?php else: ?>
                        普通商品
                        <?php endif; ?>
                    </td>
                    <td>
                        <input <?php if($vo['is_tj'] == '2'): ?>checked <?php endif; ?> type="radio"  name='is_tj_<?php echo $vo['g_id']; ?>' class='is_tj_<?php echo $vo['g_id']; ?>'value="2">是
                        <input <?php if($vo['is_tj'] == '1'): ?>checked <?php endif; ?>  type="radio"  name='is_tj_<?php echo $vo['g_id']; ?>'  class='is_tj_<?php echo $vo['g_id']; ?>' value="1">否
                    </td>
                    <td><?php if($vo['is_heat'] == 0): ?>非热拍<?php else: ?><?php echo $vo['is_heat']; endif; ?></td>
                    <td>
                        <?php if($vo['g_state'] == 2): ?>
                        待审核
                        <?php elseif($vo['g_state'] == 6): ?>
                        成功
                        <?php elseif($vo['g_state'] == 4): ?>
                        失败
                        <?php else: ?>
                        未知
                        <?php endif; ?>
                    </td>
                    <td>
                        <button onclick="btn_info('<?php echo $vo['g_id']; ?>')" class='btn btn-primary btn-xs'>商品详情</button>
                        <?php if(in_array(($g_state), explode(',',"2,4"))): ?>
                            <button onclick="btn_success('<?php echo $vo['g_id']; ?>')" class='btn btn-success btn-xs'>通过</button>
                        <?php endif; if(in_array(($g_state), explode(',',"2,3"))): ?>
                            <button  data-toggle="modal" onclick="btn_fail('<?php echo $vo['g_id']; ?>')"  class='btn btn-danger btn-xs' data-target="#exampleModal">不通过</button>
                        <?php endif; if(in_array(($g_state), explode(',',"6"))): ?>
                    <button data-toggle="modal"  type="button" class="btn btn-info  btn-xs" data-target="#exampleModal" onclick="set_hot('<?php echo $vo['g_id']; ?>')">设为热拍</button>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="margin-top:30px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">不通过理由</h4>
                            </div>
                            <div class="modal-body">
                                <form method="get" id='form' action="/admin/goods/set_state" onsubmit="return checkForm()">
                                    <div class="form-group">
                                        <input type="hidden" class="g_id" name='g_id' id="g_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="g_state" class="control-label">商品标题:</label>
                                        <input type="text" class="g_name"  id="g_name">
                                    </div>
                                    <input type="hidden" class="g_state" name='g_state' id="g_state" value="4">
                                    <div class="form-group chge1">
                                        <label for="g_des" class="control-label ">理由:</label>
                                        <textarea class="form-control" name="g_des" id="g_des"></textarea>
                                    </div>
                                    <div class="form-group chge2" style="display:none">
                                        <label for="g_des" class="control-label ">排序:</label>
                                        <input type="text" class="is_heat" name="is_heat" >
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                        <button type="submit" class="btn btn-primary">发送</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
<script>
    $(function () {
        //商品状态
       $('.slt').change(function(){
          var g_state = $(this).val();
          location.href="/admin/goods/goodslist?g_state="+g_state
       });
       $('.hot').change(function(){
           var is_heat = $(this).val();
           location.href="/admin/goods/goodslist/?is_heat="+is_heat
        })
    })
    ///通过
    function btn_success(id){
        var gdr_info = [];
        var child = [];
        $('.num'+id).each(function(index,item){
            var gdr_id = $(this).attr('data-value');
            var gdr_limited = $(this).val();
            child = [gdr_id,gdr_limited];
            gdr_info.push(child);
        })
        var is_tj = $('.is_tj_'+id+':checked').val();
        var g_limited = $('#g_limited'+id).val()
//        var g_invitations = $('#g_invitations'+id).val()
//        location.href="/admin/goods/set_state?g_id="+id+"&g_state="+6+"&num="+"<?php echo $num; ?>"+"&g_limited="+g_limited+"&g_invitations="+g_invitations+'&is_tj='+is_tj
        $.post('/admin/goods/set_state',{
            g_id:id,
            g_state:6,
            num:"<?php echo $num; ?>",
            g_limited:g_limited,
            is_tj:is_tj,
            gdr_info:gdr_info
        },function(res){
            if(res.code == 1){
                location.href=res.url;
            }
        })
    }
    function btn_fail(id){
        var g_id = $('.id_'+id).html();
        var name = $('.name_'+id).html();
        $("#g_id").val(g_id)
        $("#g_name").val(name)
//        $('.chge').empty()
//        var html = ' <label for="g_des" class="control-label ">理由:</label>'+
//            '<textarea class="form-control" name="g_des" id="g_des"></textarea>';
//        $('.chge').html(html);
        $('.chge1').show()
        $('.chge2').hide()
        $('#form').attr('action','/admin/goods/set_state');
    }
    //验证from表单
    function checkForm(){
        var name = $('#exampleModalLabel').html()
        if(name == '理由'){
            var g_des = $('#g_des').val()
            if(!$.trim(g_des)){
                alert('请输入不通过理由');
                return false;
            }
        }
    }
    //设为热拍
    function set_hot(id){
        var g_id = $('.id_'+id).html();
        var name = $('.name_'+id).html();
        $("#g_id").val(g_id)
        $("#g_name").val(name)
        $('#exampleModalLabel').html('设为热拍');
        $('.chge2').show()
        $('.chge1').hide()
//        var html = ' <label for="g_des" class="control-label ">排序:</label>' +
//                    ' <input type="text" class="is_heat" name="is_heat" >';
//        $('.chge').html(html);
        $('#form').attr('action','/admin/goods/set_heat');
    }

    //查看商品详情
    function btn_info(id){
        location.href='/admin/goods/goods_info/g_id/'+id;
    }

</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>