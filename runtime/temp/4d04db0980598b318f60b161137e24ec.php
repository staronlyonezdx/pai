<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"D:\project\pai\public/../application/admin/view/wallet/withdrawlist.html";i:1541491288;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
<!-- <link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/goodscategory.css"> -->
<style>
    .modal{
        margin-top:100px;
    }
    .modal-footer{
        text-align: center;
    }
    .red{
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
                <label>提现列表</label>
            </div>
            <a href="/admin/wallet/withdrawlist/w_state/0" type="button" class="btn <?php if($w_state == '0'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">申请中</a>
            <a href="/admin/wallet/withdrawlist/w_state/1" type="button" class="btn <?php if($w_state == '1'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">通过</a>
            <a href="/admin/wallet/withdrawlist/w_state/2" type="button" class="btn <?php if($w_state == '2'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">不通过</a>
            <a href="/admin/wallet/withdrawlist/w_state/3" type="button" class="btn <?php if($w_state == '3'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">提现完成</a>
            <table class="table table-hover radius table-bordered" style="margin-bottom:0">
                <thead>
                <tr>
                    <th>提现ID</th>
                    <th>用户ID</th>
                    <th>用户昵称</th>
                    <th>手机号</th>
                    <th>提现类型</th>
                    <th>提款前余额</th>
                    <th>提款额</th>
                    <th>手续费</th>
                    <th>费率</th>
                    <th class="red">实际打款</th>
                    <th>开户人</th>
                    <th>开户行</th>
                    <th>银行卡</th>
                    <th>是否加急</th>
                    <th>申请时间</th>
                    <th class="red">最迟打款时间</th>
                    <th>状态</th>
                    <th width="200px;">客服操作</th>
                    <th>财务操作</th>
                    <th>详情</th>
                </tr>
                </thead>
                <tbody>
                <tbody>
                <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                <tr>
                    <td colspan="20">没有数据</td>
                </tr>
                <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="tr_<?php echo $vo['w_id']; ?>">
                    <th scope="row" class="th_w_id<?php echo $vo['w_id']; ?>"><?php echo $vo['w_id']; ?></th>
                    <td><?php echo $vo['w_mid']; ?></td>
                    <td><?php echo $vo['m_name']; ?></td>
                    <td><?php echo $vo['m_mobile']; ?></td>
                    <td>
                        <?php if($vo['w_type'] == 1): ?>余额提现
                        <?php elseif($vo['w_type'] == 2): ?>收益提现
                        <?php else: ?>未知提现类型
                        <?php endif; ?>
                    </td>
                    <td><?php echo $vo['w_old_moneymount']; ?></td>
                    <td><?php echo $vo['w_money']; ?></td>
                    <td><?php echo $vo['w_poundage']; ?></td>
                    <td><?php echo $vo['w_rate']; ?></td>
                    <td  class="red"><?php echo $vo['w_new_proce']; ?></td>
                    <td><?php echo $vo['m_bankowner']; ?></td>
                    <td><?php echo $vo['m_bankname']; ?></td>
                    <td><?php echo $vo['m_bankaccount']; ?></td>
                    <td><?php if($vo['is_urgent'] == 1): ?> 否 <?php else: ?>是<?php endif; ?></td>
                    <td><?php echo date('Y-m-d H:i',$vo['w_time']); ?></td>
                    <?php if($vo['is_urgent'] == 1): ?>
                        <td class="red"><?php echo date('Y-m-d H:i',$vo['w_time']+86400*6); ?></td>
                    <?php else: ?>
                        <td class="red"><?php echo date('Y-m-d H:i',$vo['w_last_time']); ?></td>
                    <?php endif; ?>
                    <td class="state<?php echo $vo['w_id']; ?>"><?php if($vo['w_state'] == 0): ?>审核中<?php elseif($vo['w_state'] == 1): ?>审核通过<?php elseif($vo['w_state'] == 2): ?>不通过<?php else: ?>已提现<?php endif; ?></td>
                    <td class="text-c">
                        <?php if($w_state == 0): ?>
                        <button type="button" class="btn btn-primary btn-xs acceptance<?php echo $vo['w_id']; ?>" onclick="acceptance(<?php echo $vo['w_id']; ?>)">通过</button>
                        <button type="button" class="btn btn-primary btn-xs acceptance<?php echo $vo['w_id']; ?>"  onclick="no_acceptance(<?php echo $vo['w_id']; ?>)" data-toggle="modal" data-target="#exampleModal">不通过</button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <!--<button type="button" class="btn btn-success btn-xs withdraw<?php echo $vo['w_id']; ?>" style="display:none" onclick="withdraw(<?php echo $vo['w_id']; ?>)">提现完成</button>-->
                        <?php if($w_state == 1): ?>
                        <button type="button" class="btn btn-success btn-xs "  onclick="withdraw(<?php echo $vo['w_id']; ?>)">提现完成</button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/admin/wallet/money_info/m_id/<?php echo $vo['w_mid']; ?>/money_type/<?php echo $vo['w_type']; ?>" type="button" class="btn btn-success btn-xs " target="view_window">金钱详情</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">拒绝理由</h4>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="message-text" class="control-label">不通过理由:</label>
                                    <input type="hidden" name="w_id" class="w_id">
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="modal()">发送</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <?php echo $page; ?>
                <span class="pagi_bar">共&nbsp;<?php echo $total; ?>&nbsp;条</span>
            </div>
        </div>
    </div>
</div>
<script>
    function acceptance(w_id){
        $.post("/admin/wallet/acceptance",{w_id:w_id,num:1},function(res){
            if(res){
                $('.state'+w_id).html('审核通过');
                $('.acceptance'+w_id).hide();
                $('.withdraw'+w_id).show();
            }else{
                alert('未受理,请稍后重试或联系管理员');
            }
        })
    }
    function no_acceptance(w_id){
        $('.w_id').val(w_id)
    }

    function modal(){
        var w_explain = $('.form-control').val();
        var w_id = $('.w_id').val();

        if(!$.trim(w_explain)){
            alert('请输入不通过理由');
            return false;
        }
        $.post("/admin/wallet/acceptance",{w_id:w_id,num:2,w_explain:w_explain},function(res){
            console.log('.tr_'+w_id);
            if(res){
                $('.tr_'+w_id).remove();
            }else{
                alert('未受理,请稍后重试或联系管理员');
            }
        })
    }

    function withdraw(w_id){
        if(!confirm("确定已转款?")){
            return false;
        }
        $.post("/admin/wallet/withdraw",{w_id:w_id},function(res){
            console.log(res);
            if(res.status){
                $('.tr_'+w_id).remove();
                alert('已经提现完成');
            }else{
                alert('提现失败')
            }
        })
    }

//    function w_state(v){
//        location.href='/admin/wallet/withdrawlist/w_state/'+v
//    }
</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>