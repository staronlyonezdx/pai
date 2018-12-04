<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\project\pai\public/../application/admin/view/systemmsg/sendmsg.html";i:1541491288;s:64:"D:\project\pai\public/../application/admin/view/common/base.html";i:1543283930;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/edit.css">

	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/lib/jquery-2.1.3.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/jquery.mousewheel.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/jquery.cookie.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/fastclick.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/bootstrap.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/clearmin.min.js"></script>
	        <script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/home.js"></script>
            <script type="text/javascript" src="/static/h-ui.admin/lib/layer/2.4/layer.js"></script>

       		
<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/summernote.min.js"></script>
<script src="__ADMIN_LIB_CLEARMINMASTER_JS__/demo/notepad.js"></script>
<!--百度富文本框编辑器-->
<script type="text/javascript" src="/static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>


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
            
<style>
    .form-group{width:800px;}
    .myeditor{height:600px;width:800px;margin: 0 auto;clear: both;}
    #editor{width:100%;height:500px;}
    .sm_title{
        width:300px;
        display:inline-block;
    }
    .sm_brief{
        vertical-align: middle;
        margin-bottom:10px;
    }
    .m_levelid{
        display:inline-block;
        width:200px;

    }
    .user{
        display:inline-block;
        width:300px;
    }
    label{
        width:100px;
    }
    .m_type{
        text-align: center;
        color:#111;
    }
    .nav{
        border:1px solid #eee;
    }
    .eyebrow2{
        display:none;
    }
    .use_user{
        padding-top:15px;
        text-align: left;
        margin-bottom:10px;
    }
</style>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="form-group">
            <label>发布系统消息</label>
        </div>
        <div class="form-group m_type">
            <label class="">指定接收者</label>
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" onclick="selecred(1)" class="btn1 active"><a href="#">选择用户发送</a></li>
                <li role="presentation" onclick="selecred(2)" class="btn2"><a href="#">选择等级发送</a></li>
            </ul>
            <div class="form-group eyebrow1 use_user">
                <label>指定单个用户:</label>
                <input type="text" class="form-control user m_mobile" name='phone' placeholder="请输入用户手机号">
                <button type="button" class="btn btn-success sele" >查询</button><span class="m_name"></span>
            </div>
            <div class="form-group eyebrow2 use_user">
                <label>指定会员等级:</label>
                <select name="m_levelid" id="m_levelid" class="form-control m_levelid" onchange="levelid()" >
                    <option value="">会员等级</option>
                    <?php if(is_array($level) || $level instanceof \think\Collection || $level instanceof \think\Paginator): $i = 0; $__LIST__ = $level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['ml_id']; ?>"><?php echo $vo['ml_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>

        <form method="post" action="" id="edit_form" onsubmit="return form_submit()" enctype="multipart/form-data">
            <div class="panel-body">
                <input type="hidden" id="member" name="">
                <div class="form-group">
                    <label>消息标题:</label>
                    <input type="text" name="sm_title" class="form-control sm_title" placeholder="请输入消息标题">
                </div>
                <div class="form-group">
                    <label>消息简介:</label>
                    <textarea name="sm_brief"  cols="50" rows="2" class="sm_brief"></textarea>
                </div>

                <div class="myeditor">
                    <textarea id="editor" name="sm_content" type="text/plain;" ></textarea>
                </div>
            </div>
            <div class="form-group text-right" style="margin-top:20px">
                <button type="submit" class="btn btn-primary">保存信息</button>
                <button type="reset" class="btn btn-default">取消操作</button>
            </div>
        </form>
    </div>
</div>
<script>
    function selecred(num){
        var hid = (num == 1) ? 2 :1
        $('.btn'+num).addClass('active')
        $('.btn'+hid).removeClass('active')
        $('.eyebrow'+num).show();
        $('.eyebrow'+hid).hide()
        $('#member').val('')
    }
    $('.sele').click(function(){
        var to_mid  = $('.m_mobile').val();
        var pattern = /^1[34578]\d{9}$/;
        if(!pattern.test(to_mid)){
            alert('手机号码格式有误');
            return false;
        }
        $.post('getInfo',{m_mobile:to_mid},function(res){
            console.log(res);
            if(res){
                $('#member').val(res.m_id).attr('name','to_mid')
                $('.m_name').html('用户已找到--昵称为：'+ res.m_name).css('color','#35ff24');
            }else{
                $('.m_name').html('无此用户').css('color','#f00');
                $('#member').val('')
            }
        })
    })

    function levelid(){
        var m_levelid = $('#m_levelid').val();
        $('#member').val(m_levelid).attr('name','m_levelid')
    }
    //表单验证
    function form_submit() {
        var para  = $('#member').val()
        if(!para){
            alert('请选择接收者');
            return false;
        }
        var sm_title  = $('.sm_title').val()
        var sm_brief  = $('.sm_brief').val()
        var editor  = $('#editor').val()
        if($.trim(sm_title) && $.trim(sm_brief) && $.trim(editor)){
            alert('标题、简介、内容');
            return false;
        }
    }

    //实例化编辑器
    var ue = UE.getEditor('editor');
</script>

            <footer class="cm-footer"><span class="pull-left"></span><span class="pull-right"></span></footer>
        </div>
        <script>
            $('.open').nextAll().css("transform","translateY(351px)");
        </script>
    </body>
</html>