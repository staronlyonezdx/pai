<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\project\pai\public/../application/admin/view/promoters/index.html";i:1541491287;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1541491286;}*/ ?>

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
    .red{
        color:red;
    }
    .attestation{
        display:none;
    }
    .btn{
        margin-top:2px;
    }
    .modal-footer{
        display:flex;
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
                <label>推广员列表</label>
            </div>
            <div>
                <span>商品状态：</span>
                <a href="/admin/promoters/index/is_promoters/2" type="button" class="btn <?php if($is_promoters == '2'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">申请中</a>
                <a href="/admin/promoters/index/is_promoters/3" type="button" class="btn <?php if($is_promoters == '3'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">审核失败</a>
                <a href="/admin/promoters/index/is_promoters/4" type="button" class="btn <?php if($is_promoters == '4'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">考核中</a>
                <a href="/admin/promoters/index/is_promoters/5" type="button" class="btn <?php if($is_promoters == '5'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">推广员</a>
                <a href="/admin/promoters/index/is_promoters/6" type="button" class="btn <?php if($is_promoters == '6'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">考核失败</a>
            </div>
            <table class="table table-hover" style="margin-bottom:0">
                <thead>
                <tr>
                    <th width="100px;">申请ID</th>
                    <th width="100px;">用户ID</th>
                    <th  width="100px;">申请账号</th>
                    <th width="150px;">昵称</th>
                    <th width="150px;">账号状态</th>
                    <th width="170px;">添加时间</th>
                    <th width="170px;">审核开始时间</th>
                    <th width="170px;">审核结束时间</th>
                    <th width="250px;">添加此条申请信息的管理员</th>
                    <th  width="150px;">通过此条申请的管理员</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tbody>
                <?php if(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty())): ?>
                <tr>
                    <td colspan="20">没有数据</td>
                </tr>

                <?php else: if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="tr_<?php echo $vo['pa_id']; ?>">
                    <th scope="row" class="sid"><?php echo $vo['pa_id']; ?></th>
                    <td><?php echo $vo['m_id']; ?></td>
                    <td class="m_mobile_<?php echo $vo['pa_id']; ?>"}><?php echo $vo['m_mobile']; ?></td>
                    <td><?php echo $vo['m_name']; ?></td>
                    <td>
                        <?php switch($vo['is_promoters']): case "1": ?>普通会员<?php break; case "2": ?>申请中<?php break; case "3": ?>审核失败<?php break; case "4": ?>考核中<?php break; case "5": ?>考核成功<?php break; case "6": ?>考核失败<?php break; default: ?>未知
                        <?php endswitch; ?>
                    </td>
                    <td><?php if(!(empty($vo['add_time']) || (($vo['add_time'] instanceof \think\Collection || $vo['add_time'] instanceof \think\Paginator ) && $vo['add_time']->isEmpty()))): ?><?php echo date('Y-m-d H:i',$vo['add_time']); endif; ?></td>
                    <td><?php if(!(empty($vo['start_time']) || (($vo['start_time'] instanceof \think\Collection || $vo['start_time'] instanceof \think\Paginator ) && $vo['start_time']->isEmpty()))): ?><?php echo date('Y-m-d H:i',$vo['start_time']); endif; ?></td>
                    <td><?php if(!(empty($vo['end_time']) || (($vo['end_time'] instanceof \think\Collection || $vo['end_time'] instanceof \think\Paginator ) && $vo['end_time']->isEmpty()))): ?><?php echo date('Y-m-d H:i',$vo['end_time']); endif; ?></td>
                    <td><?php if($vo['add_admin_id'] != null): ?>管理员ID:<?php echo $vo['add_admin_id']; ?><br/>管理员昵称:<?php echo $vo['add_admin_name']; endif; ?></td>
                    <td><?php if($vo['update_admin_id'] != null): ?>管理员ID:<?php echo $vo['update_admin_id']; ?><br/>管理员昵称:<?php echo $vo['update_admin_name']; endif; ?></td>
                    <td>
                        <?php if(in_array(($is_promoters), explode(',',"2,3"))): ?>
                        <button class='btn btn-primary btn-xs' onclick="scs_promoters('<?php echo $vo['m_id']; ?>','<?php echo $vo['pa_id']; ?>')">
                            成为考核期推广员
                        </button><br/>
                        <?php endif; if(in_array(($is_promoters), explode(',',"2"))): ?>
                        <button  data-toggle="modal" class='btn btn-danger btn-xs' onclick="err_promoters('<?php echo $vo['m_id']; ?>','<?php echo $vo['pa_id']; ?>')"  data-target="#exampleModal">
                            不通过
                        </button><br/>
                        <?php endif; ?>
                        <button onclick="is_show('<?php echo $vo['pa_id']; ?>')" class='btn btn-success btn-xs'>查看认证信息</button>
                    </td>
                </tr>
                    <?php if(empty($vo['attestation']) || (($vo['attestation'] instanceof \think\Collection || $vo['attestation'] instanceof \think\Paginator ) && $vo['attestation']->isEmpty())): ?>
                        <tr class='attestation<?php echo $vo['pa_id']; ?> attestation'>
                            <td colspan="20">没有数据</td>
                        </tr>
                        <?php else: if(is_array($vo['attestation']) || $vo['attestation'] instanceof \think\Collection || $vo['attestation'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['attestation'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
                        <tr  class='attestation<?php echo $vo['pa_id']; ?> attestation'>
                            <td></td>
                            <td>真实姓名: <span class="red"><?php echo $voo['real_name']; ?></span></td>
                            <td>身份证号码: <span class="red"><?php echo $voo['identification']; ?></span></td>
                            <td>身份证号码: <span class="red"><?php echo $voo['identification']; ?></span></td>
                            <td>身份证所在地: <span class="red"><?php echo $voo['area']; ?></span></td>
                            <td>银行卡号: <span class="red"><?php echo $voo['bankowner']; ?></span></td>
                            <td>开户银行: <span class="red"><?php echo $voo['bankname']; ?></span></td>
                            <td>开户支行: <span class="red"><?php echo $voo['bank_branch']; ?></span></td>
                            <td>银行卡号: <span class="red"><?php echo $voo['bankaccount']; ?></span></td>
                            <td>银行卡联系人: <span class="red"><?php echo $voo['bank_phone']; ?></span></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="margin-top:30px;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">不通过理由</h4>
                        </div>
                        <div class="modal-body">
                            <!--<form method="post" id='form' action="/admin/promoters/index" onsubmit="return checkForm()">-->
                                <div class="form-group">
                                    <input type="hidden" class="g_id" name='g_id' id="g_id">
                                </div>
                                <div class="form-group">
                                    <label for="m_mobile" class="control-label">申请者账号:</label>
                                    <span  id="m_mobile"></span>
                                </div>
                                <input type="hidden" class="promoters" name='promoters' id="promoters" value="3">
                                <input type="hidden" class="promoters" name='m_id' id="m_id" >
                                <input type="hidden" class="promoters" name='pa_id' id="pa_id">
                                <div class="form-group chge1">
                                    <label for="error_explain" class="control-label ">理由:</label>
                                    <textarea style='vertical-align: middle;'class="error_explain" name="error_explain" id="error_explain" rows=5   cols=27 placeholder="请输入不通过理由"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                    <button type="submit" class="btn btn-primary " onclick='error_info()'>发送</button>
                                </div>
                            <!--</form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //显示和隐藏认证信息
    function is_show(id){
        $('.attestation'+id).toggle();
    }

    //审核通过(成为考核期推广员)
    function scs_promoters(m_id,pa_id){
        if(confirm('确定成为推广期推荐员？')){
           $.post('/admin/promoters/index',{promoters:4,m_id:m_id,pa_id:pa_id},function(res){
                if(res.status == 1){
                    layer.msg(res.msg, {icon: 1,time:2000});
                    $('.tr_'+pa_id).hide();
                }else{
                    layer.msg(res.msg, {icon: 2,time:2000});
                }
           })
        }
    }
    //审核不通过(成为考核期推广员)
    function err_promoters(m_id,pa_id){
        var m_mobile = $('.m_mobile_'+pa_id).html();
        $('#m_mobile').html(m_mobile);
        $('#m_id').val(m_id);
        $('#pa_id').val(pa_id);
    }
    //审核不通过ajax
    function error_info(){
        var m_id = $('#m_id').val();
        var pa_id = $('#pa_id').val();
        var promoters = 3;
        var error_explain = $('#error_explain').val();
            $.post('/admin/promoters/index',{promoters:4,m_id:m_id,pa_id:pa_id,error_explain:error_explain,promoters:promoters},function(res){
                $('#exampleModal').modal('toggle')
                if(res.status == 1){
                    layer.msg(res.msg, {icon: 1,time:2000});
                    $('.tr_'+pa_id).hide();
                }else{
                    layer.msg(res.msg, {icon: 2,time:2000});
                }
            })
    }

    //检测发布的from表达
    function checkForm(){
        var error_explain = $('#error_explain').val();
        if(!$.trim(error_explain)){
            layer.msg('请输入审核不通过理由', {icon: 2,time:2000});
            return false;
        }
    }
</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>