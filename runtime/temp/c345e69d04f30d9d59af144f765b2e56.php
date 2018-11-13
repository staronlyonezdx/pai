<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:72:"D:\project\pai\public/../application/business/view/goods/goods_list.html";i:1541677268;s:67:"D:\project\pai\public/../application/business/view/common/base.html";i:1541491289;s:69:"D:\project\pai\public/../application/business/view/common/header.html";i:1541491289;s:67:"D:\project\pai\public/../application/business/view/common/menu.html";i:1541677268;s:69:"D:\project\pai\public/../application/business/view/common/footer.html";i:1541491289;}*/ ?>
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
            <dt class="selected"><i class="Hui-iconfont">&#xe616;</i>余额商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd >
                <ul>
                    <li ><a href="/business/goods/goods_list/type/1" title="余额商品列表">1.余额商品列表</a></li>
                    <li ><a href="/business/goods/add_goods/type/1" title="添加余额商品">添加余额商品</a></li>
                    <?php if(!(empty($store_type) || (($store_type instanceof \think\Collection || $store_type instanceof \think\Paginator ) && $store_type->isEmpty()))): if($store_type == 1): ?>
                    <li><a href="/business/goods/goods_list/type/2" title="余额商品列表">2.福袋商品列表</a></li>
                    <li><a href="/business/goods/add_goods/type/2" title="添加福袋商品">添加福袋商品</a></li>
                    <li><a href="/business/goods/goods_list/type/3" title="余额商品列表">3.活动商品列表</a></li>
                    <li><a href="/business/goods/add_goods/type/3" title="添加福袋商品">添加活动商品</a></li>
                    <?php endif; endif; ?>
                </ul>
            </dd>
        </dl>
        <dl id="menu-picture">
            <dt><i class="Hui-iconfont">&#xe613;</i> 余额商品订单<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="/business/paiorder/order_list" title="订单列表">订单列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 积分商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="/business/pointgoods/goods_list" title="积分商品列表">积分商品列表</a></li>
                    <li><a href="/business/pointgoods/add_goods" title="添加积分商品">添加积分商品</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-ptorder">
            <dt><i class="Hui-iconfont">&#xe622;</i> 积分商品订单<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="/business/pointorder/order_list" title="订单列表">订单列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 人气商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="/business/popularitygoods/goodslist" title="人气商品列表">人气商品列表</a></li>
                    <li><a href="/business/popularitygoods/goods_list_two" title="人气商品列表">线下活动人气商品列表</a></li>
                    <li><a href="/business/popularitygoods/edit" title="添加人气商品">添加人气商品</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-comments">
            <dt><i class="Hui-iconfont">&#xe62e;</i> 人气商品订单<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="/business/Poporder/goods_list" title="订单列表">订单列表</a></li>
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
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <div style="margin-left:50px;">
            <div class="pd-20">
                <!--<div class="text-c">-->
                    <!--<input type="text" name="" id="" placeholder=" 产品名称" style="width:250px" class="input-text">-->
                    <!--<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜产品</button>-->
                <!--</div>-->
                <div>
                    <span>商品状态：</span>
                    <a href="/business/goods/goods_list/g_state/0/type/<?php echo $type; ?>" type="button" class="btn <?php if($g_state == '0'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">全部</a>
                    <a href="/business/goods/goods_list/g_state/1/type/<?php echo $type; ?>" type="button" class="btn <?php if($g_state == '1'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">竞拍中</a>
                    <a href="/business/goods/goods_list/g_state/2/type/<?php echo $type; ?>" type="button" class="btn <?php if($g_state == '2'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">草稿</a>
                    <a href="/business/goods/goods_list/g_state/3/type/<?php echo $type; ?>" type="button" class="btn <?php if($g_state == '3'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">审核中</a>
                    <a href="/business/goods/goods_list/g_state/4/type/<?php echo $type; ?>" type="button" class="btn <?php if($g_state == '4'): ?>btn-success <?php else: ?> btn-info <?php endif; ?> btn-xs">已失败</a>
                </div>
                <div class="sele_box">
                    <span>搜索：</span>
                    <input type="text" class="input-text radius size-M sele sn_code" value='<?php echo isset($gp_sn) ? $gp_sn :  ""; ?>' placeholder="请输入商品p_id或编号或商品名称"><button class="btn btn-success radius" onclick="gp_sn()">搜索</button>
                <div class="mt-20">
                    <table class="table table-border table-bordered table-bg table-hover table-sort" style="width:100%">
                        <thead>
                        <tr class="text-c">
                            <th width="80" >商品ID</th>
                            <th width="170"><?php if(!(empty($type) || (($type instanceof \think\Collection || $type instanceof \think\Paginator ) && $type->isEmpty()))): if($type==1): ?>余额<?php elseif($type==2): ?>福袋 <?php elseif($type == 3): ?>活动<?php else: ?>余额<?php endif; else: ?>余额<?php endif; ?>商品名称</th>
                            <th width="170">商品编号</th>
                            <th width="100">图片</th>
                            <th width="100">价格</th>
                            <th width="50">库存</th>
                            <th width="100">首页精选排序</th>
                            <th width="100">置顶排序</th>
                            <th width="100">推荐排序</th>
                            <th width="100">市场价格</th>
                            <th width="100">结算价格</th>
                            <th width="100">开始时间</th>
                            <th width="100">截止时间</th>
                            <th width="100">状态</th>
                            <th width="100">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr class="text-c va-m tr_<?php echo $vo['g_id']; ?>">
                                <td><?php echo $vo['g_id']; ?></td>
                                <td><?php echo $vo['g_name']; ?></td>
                                <td><?php echo $vo['gp_sn']; ?></td>
                                <td><img src="<?php echo $vo['g_img']; ?>" alt="" width="50" height="50"></td>
                                <td>￥<?php echo $vo['min_gdr_price']; ?>-<?php echo $vo['max_gdr_price']; ?></td>
                                <td class="gp_stock<?php echo $vo['g_id']; ?>"><?php echo $vo['gp_stock']; ?></td>
                                <td class="is_heat<?php echo $vo['g_id']; ?>"><?php if($vo['is_heat']==0): ?>非首页精选<?php else: ?><?php echo $vo['is_heat']; endif; ?></td>
                                <td class="is_top<?php echo $vo['g_id']; ?>"><?php if($vo['is_top']==0): ?>非置顶<?php else: ?><?php echo $vo['is_top']; endif; ?></td>
                                <td class="is_tj<?php echo $vo['g_id']; ?>"><?php if($vo['is_tj']==1): ?>非推荐<?php else: ?><?php echo $vo['is_tj']; endif; ?></td>
                                <td>￥<?php echo $vo['gp_market_price']; ?></td>
                                <td>￥<?php echo $vo['gp_settlement_price']; ?></td>
                                <td><?php echo date('Y-m-d H:i',$vo['g_starttime']); ?></td>
                                <td><?php echo date('Y-m-d H:i',$vo['g_endtime']); ?></td>
                                <td><?php switch($vo['g_state']): case "1": ?>未支付保证金<?php break; case "2": ?>审核中<?php break; case "4": ?>已失败<?php break; case "6": ?>竞拍中<?php break; case "7": ?>编辑中<?php break; case "8": ?>已流拍<?php break; case "9": ?>已完成<?php break; endswitch; ?></td>
                                <td>
                                    <?php if($vo['is_heat'] > 0): ?>
                                        <button type="button" class="btn btn-success btn-xs rh_<?php echo $vo['g_id']; ?>" onclick="revoke_heat('<?php echo $vo['g_id']; ?>')">撤下首页精选</button>
                                    <?php endif; switch($vo['g_state']): case "1": ?><button type="button" class="btn btn-warning btn-xs" onclick="cancel('<?php echo $vo['g_id']; ?>')">下架</button><?php break; case "2": ?><button type="button" class="btn btn-warning btn-xs" onclick="cancel('<?php echo $vo['g_id']; ?>')">下架</button>
                                    <a href="/business/goods/reedit/g_id/<?php echo $vo['g_id']; ?>" type="button" class="btn btn-info btn-xs">重新编辑</a><?php break; case "4": ?><button type="button" class="btn btn-warning btn-xs" onclick="cancel('<?php echo $vo['g_id']; ?>')">下架</button>
                                    <a href="/business/goods/reedit/g_id/<?php echo $vo['g_id']; ?>" type="button" class="btn btn-info btn-xs">重新编辑</a>
                                    <?php break; case "6": ?>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="is_heat('<?php echo $vo['g_id']; ?>','<?php echo $vo['is_heat']; ?>')">热拍</button><br/>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="is_top('<?php echo $vo['g_id']; ?>','<?php echo $vo['is_top']; ?>')">顶置</button><br/>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="is_tj('<?php echo $vo['g_id']; ?>','<?php echo $vo['is_tj']; ?>')">推荐</button><br/>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="gp_stock('<?php echo $vo['g_id']; ?>','<?php echo $vo['gp_stock']; ?>')">修改库存</button><?php break; case "7": ?><a href="/business/goods/reedit/g_id/<?php echo $vo['g_id']; ?>"  type="button" class="btn btn-info btn-xs">继续编辑</a>
                                    <button type="button" class="btn btn-warning btn-xs" onclick="cancel('<?php echo $vo['g_id']; ?>')">下架</button>
                                    <?php break; case "8": ?><a href="/business/goods/reedit/g_id/<?php echo $vo['g_id']; ?>"  type="button" class="btn btn-success btn-xs">再次编辑</a><?php break; endswitch; ?>
                                </td>
                            </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div >共<?php echo $total_num; ?>页 <?php echo $page; ?></div>
            </div>
        </div>

    </div>
</section>

<!--_footer 作为公共模版分离出去-->

<script type="text/javascript" src="/static/h-ui.admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/h-ui.admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript">
    //搜索商品
    function gp_sn(){
        var value = $('.sn_code').val();
        value = $.trim(value)
        if(value){
            location.href='/business/goods/goods_list/type/'+ <?php echo $type; ?> + '/gp_sn/'+ value + "/g_state/" + <?php echo $g_state; ?>
        }
    }
    //取消发布
    function cancel(g_id){
        $.post("/business/goods/cancel",{g_id:g_id},function(res){
            if(res.status == 1){
                $('.tr_'+g_id).remove();
                layer.msg('取消发布成功', {icon:6,time:1000});
            }else{
                layer.msg('取消发布失败', {icon:5,time:1000});
            }
        })
    }
    //修改库存
    function gp_stock(g_id,val){
        layer.prompt({title: '请输入库存数量',value:val, formType: 0}, function(text){
            if(isNaN(text) || text < 1){
                layer.msg('大于零的整数', {icon:5,time:1000});
            }
            $.post("/business/goods/set_stock",{g_id:g_id,gp_stock:text},function(res){
                if(res.status == 1){
                    $('.gp_stock'+g_id).html(res.data.gp_stock);
                    layer.msg('修改库存成功', {icon:6,time:1000});
                }else{
                    layer.msg('修改库存失败', {icon:5,time:1000});
                }
            })
        });
    }
    //热拍设置
    function is_heat(g_id,val){
        layer.prompt({title: '设置热拍从小到大排序',value:val, formType: 0}, function(text){
            if(isNaN(text) || text < 0){
                layer.msg('不小于0', {icon:5,time:1000});
                return false;
            }
            $.post("/business/goods/set_goods",{g_id:g_id,is_heat:text},function(res){
                if(res.status == 1){
                    if(text != 0){
                        $('.is_heat'+g_id).html(res.data.is_heat);
                    }else{
                        $('.is_heat'+g_id).html('非热拍');
                    }
                    layer.msg('操作成功', {icon:6,time:1000});
                }else{
                    layer.msg('操作失败', {icon:5,time:1000});
                }
            })
        });
    }
    //置顶设置
    function is_top(g_id,val){
        layer.prompt({title: '设置置顶从小到大排序',value:val, formType: 0}, function(text){
            if(isNaN(text) || text < 0){
                layer.msg('不小于0', {icon:5,time:1000});
                return false;
            }
            $.post("/business/goods/set_goods",{g_id:g_id,is_top:text},function(res){
                if(res.status == 1){
                    if(text != 0){
                        $('.is_top'+g_id).html(res.data.is_top);
                    }else{
                        $('.is_top'+g_id).html('非置顶');
                    }
                    layer.msg('操作成功', {icon:6,time:1000});
                }else{
                    layer.msg('操作失败', {icon:5,time:1000});
                }
            })
        });
    }
    //推荐设置
    function is_tj(g_id,val){
        layer.prompt({title: '设置热拍从小到大排序',value:val, formType: 0}, function(text){
            if(isNaN(text) || text < 1){
                layer.msg('不小于1', {icon:5,time:1000});
                return false;
            }
            $.post("/business/goods/set_goods",{g_id:g_id,is_tj:text},function(res){
                if(res.status == 1){
                    if(text != 1){
                        $('.is_tj'+g_id).html(res.data.is_tj);
                    }else{
                        $('.is_tj'+g_id).html('非推荐');
                    }
                    layer.msg('操作成功', {icon:6,time:1000});
                }else{
                    layer.msg('操作失败', {icon:5,time:1000});
                }
            })
        });
    }

    //撤销热拍
    function revoke_heat(g_id){
        var self = $(this)
        $.post("/business/goods/set_goods",{g_id:g_id,is_heat:0},function(res){
            if(res.status == 1){
                $('.is_heat'+g_id).html('非首页精选');
                $('.rh_'+g_id).remove();
                layer.msg('取消首页精选成功', {icon:6,time:1000});
            }else{
                layer.msg('操作失败', {icon:5,time:1000});
            }
        })
    }
    var setting = {
        view: {
            dblClickExpand: false,
            showLine: false,
            selectedMulti: false
        },
        data: {
            simpleData: {
                enable:true,
                idKey: "id",
                pIdKey: "pId",
                rootPId: ""
            }
        },
        callback: {
            beforeClick: function(treeId, treeNode) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (treeNode.isParent) {
                    zTree.expandNode(treeNode);
                    return false;
                } else {
                    demoIframe.attr("src",treeNode.file + ".html");
                    return true;
                }
            }
        }
    };

//    var zNodes =[
//        { id:1, pId:0, name:"一级分类", open:true},
//        { id:11, pId:1, name:"二级分类"},
//        { id:111, pId:11, name:"三级分类"},
//        { id:112, pId:11, name:"三级分类"},
//        { id:113, pId:11, name:"三级分类"},
//        { id:114, pId:11, name:"三级分类"},
//        { id:115, pId:11, name:"三级分类"},
//        { id:12, pId:1, name:"二级分类 1-2"},
//        { id:121, pId:12, name:"三级分类 1-2-1"},
//        { id:122, pId:12, name:"三级分类 1-2-2"},
//    ];

    var code;

    function showCode(str) {
        if (!code) code = $("#code");
        code.empty();
        code.append("<li>"+str+"</li>");
    }

//    $(document).ready(function(){
//        var t = $("#treeDemo");
//        t = $.fn.zTree.init(t, setting, zNodes);
//        demoIframe = $("#testIframe");
//        demoIframe.bind("load", loadReady);
//        var zTree = $.fn.zTree.getZTreeObj("tree");
//        zTree.selectNode(zTree.getNodeByParam("id",'11'));
//    });

//    $('.table-sort').dataTable({
//        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
//        "bStateSave": true,//状态保存
//        "aoColumnDefs": [
//            {"orderable":false,"aTargets":[0,7]}// 制定列不参与排序
//        ]
//    });
    /*图片-添加*/
    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-查看*/
    function product_show(title,url,id){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-审核*/
    function product_shenhe(obj,id){
        layer.confirm('审核文章？', {
                btn: ['通过','不通过'],
                shade: false
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                $(obj).remove();
                layer.msg('已发布', {icon:6,time:1000});
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                $(obj).remove();
                layer.msg('未通过', {icon:5,time:1000});
            });
    }
    /*图片-下架*/
    function product_stop(obj,id){
        layer.confirm('确认要下架吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            $(obj).remove();
            layer.msg('已下架!',{icon: 5,time:1000});
        });
    }

    /*图片-发布*/
    function product_start(obj,id){
        layer.confirm('确认要发布吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布!',{icon: 6,time:1000});
        });
    }
    /*图片-申请上线*/
    function product_shenqing(obj,id){
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
        $(obj).parents("tr").find(".td-manage").html("");
        layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
    }
    /*图片-编辑*/
    function product_edit(title,url,id){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-删除*/
    function product_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
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