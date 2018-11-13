<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"D:\project\pai\public/../application/member/view/classify/classify.html";i:1541491283;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/footer.html";i:1541986719;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="full-screen" content="yes">
        <meta name="x5-fullscreen" content="true">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 viewport-fit=cover">
        <meta name="format-detection" content="telephone=no">
        <!--<link rel="stylesheet" type="text/css" href="__CSS__/mui/mui.min.css">-->
        <!--<link rel="stylesheet" type="text/css" href="__CSS__/common/bootstrap.min.css">-->

        <!--<link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">-->
        <link rel="stylesheet" type="text/css" href="__CSS__/common/larea.css">
        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/size.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/popups.css">
        
<link rel="stylesheet" type="text/css" href="__STATIC__/css/mui/mui.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/search_index.css">
<link rel="stylesheet" type="text/css" href="__STATIC__/css/classify/classify.css">

        <script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>
        <script src="__JS__/common/rem.js"></script>
        <script src="__JS__/common/jquery_lazyload.js"></script>
        <script src="__JS__/common/lazyload.js"></script>
        <!--<script src="__JS__/mui/mui.min.js"></script>-->
        <!--<script src="__JS__/mui/mui.pullToRefresh.js"></script>-->
        <!--<script src="__JS__/mui/mui.pullToRefresh.material.js"></script>-->
        <script src="__JS__/common/site.js"></script>
        <script src="__JS__/common/larea.js"></script>
        <!--<script src="__JS__/common/bootstrap.min.js"></script>-->
        <!--<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.js"></script>-->
        <!--<script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>-->
        <script src="__STATIC__/lib/layui/layui.js"></script>
        <script src="__JS__/common/popups.js"></script>
        <script src="__JS__/common/vconsole.min.js"></script>
        <title></title>
    </head>
    <body>
        <header>
<div class="index_searsh_top head_search_view">
	<div class="index_search head_search">
		<img src="__STATIC__/image/classify/search@2x.png">
        <p>搜索您想要的分类商品或店铺</p>
	</div>
</div>
</header>
        <header></header>
        
<main>
    <!-- <form action="/index/index/search_index" method="post"> -->
        <div class="index_search_pop">
            <!--搜索框-->
            <div class="index_search_pop_top clear">
                    <div class="index_pop_text lf">
                        <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" alt=""/>
                    </div>
                    <div class="index_search_pop_view clear lf">
                        <div class="index_search_lfimg" class="lf">
                            <img src="__STATIC__/image/index/searchbar_icon_search1@2x.png">
                        </div>
                        <input type="text" name="keyword" class="index_pop_inp lf">
        
                        <div class="index_search_cancel rt">
                            <img src="__STATIC__/image/index/icon_qingchu1@2x.png" alt="">
                        </div>
                    </div>
                    <!-- <button type="submit" class="index_pop_sousuo rt"> 搜索</button> -->
                    <a class="index_pop_sousuo rt"> 搜索</a>
                </div>
            <!--tab切换-->
            <div class="index_pop_class clear">
                <div class="index_pop_tab index_pop_bold lf">
                    <img src="__STATIC__/image/index/icon_nav_scroll@2x.png" alt="">
                    <span>商品</span>
                </div>
                <div class="index_pop_tab  lf">
                    <img src="__STATIC__/image/index/icon_nav_scroll@2x.png" alt="">
                    <span>店铺</span>
                </div>
            </div>
            <?php if(!(empty($searchs['self']) || (($searchs['self'] instanceof \think\Collection || $searchs['self'] instanceof \think\Paginator ) && $searchs['self']->isEmpty()))): ?>
            <!--历史搜索-->
            <div class="index_pop_history_view history">
                <div class="index_pop_history clear">
                    <p class="lf">历史搜索</p>

                    <div class="rt del_search">清除</div>
                </div>
                <div class="index_pop_history_main clear">
                    <?php if(is_array($searchs['self']) || $searchs['self'] instanceof \think\Collection || $searchs['self'] instanceof \think\Paginator): $i = 0; $__LIST__ = $searchs['self'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/index/index/search_index/keyword/<?php echo $vo; ?>"><div class="lf"><?php echo $vo; ?></div></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <?php endif; if(!(empty($searchs['hot']) || (($searchs['hot'] instanceof \think\Collection || $searchs['hot'] instanceof \think\Paginator ) && $searchs['hot']->isEmpty()))): ?>
            <!--热门搜索-->
            <div class="index_pop_history_view">
                <div class="index_pop_history clear">
                    <p class="lf">热门搜索</p>
                </div>
                <div class="index_pop_history_main clear">
                    <?php if(is_array($searchs['hot']) || $searchs['hot'] instanceof \think\Collection || $searchs['hot'] instanceof \think\Paginator): $i = 0; $__LIST__ = $searchs['hot'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/index/index/search_index/keyword/<?php echo $vo; ?>">
                    <div class="lf"><?php echo $vo; ?></div>
                        </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <!--搜索出的列表-->
            <div class="index_pop_search_main">
                    <ul class="index_pop_search_ul">
        
                    </ul>
                </div>
            <!--<div class="index_pop_search_main">-->
            <!--<ul class="index_pop_search_ul">-->
            <!--<li class="index_pop_search_li clear">-->
            <!--<span>移动电源</span>-->
            <!--<img src="__STATIC__/image/index/icon_nav_jump@2x.png" alt="">-->
            <!--</li>-->
            <!--</ul>-->
            <!--</div>-->
        </div>
    <!-- </form> -->
	<div class="mui-content mui-row mui-fullscreen">
		<div class="mui-col-xs-3">
			<div  class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-vertical" id="segmentedControls">
			</div>
		</div>
		<div  class="mui-col-xs-9" id="segmentedControlContents">
			<div class="classify_content">
				<!--加载内容区域-->
			</div>
		</div>
    </div>

</main>

        <footer>
	<?php if($is_lord ==1): if($m_type==0): ?>
<div style="height: 1.6rem;"></div>
<footer>
    <div class="footer_tab phonex">
            <a href="/index/index">
                <div class="footer_tab_list lf" style="width:1.875rem">
                    <?php if($controller=='Index'): ?>
                    <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                    <?php endif; ?>
                    <p>首页</p>
                </div>
            </a>
            <a href="/member/classify/classify">
                <div class="footer_tab_list lf" style="width:1.875rem">
                    <?php if($controller=='Classify'): ?>
                    <img src="__STATIC__/image/myhome/icon_fenlei_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_fenlei_off@2x.png">
                    <?php endif; ?>
                    <p>分类</p>
                </div>
            </a>

            <a href="/member/myhome/index">
                <div class="footer_tab_list rt" style="width:1.875rem">
                    <?php if($controller=='Myhome'): ?>
                    <img src="__STATIC__/image/myhome/icon_user_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_user_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_user_off@2x.png">
                    <?php endif; ?>
                    <p>我的</p>
                </div>
            </a>
            <?php if($is_read==0): ?>
            <a href="/member/systemmsg/index">
                <div class="footer_tab_list rt" style="width:1.875rem">
                    <?php if($controller=='Systemmsg'): ?>
                    <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php else: ?>
            <a href="/member/systemmsg/index">
                <div class="footer_tab_list rt" style="width:1.875rem">
                    <?php if($controller=='Systemmsg'): ?>
                    <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                    <p class="unread"></p>
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                    <p class="unread"></p>
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php endif; ?>
    </div>
</footer>
<?php endif; if($m_type==1): ?>
<div style="height: 1.6rem;"></div>
<div class="footer_tab phonex">
        <a href="/index/index">
            <div class="footer_tab_list lf" style="width:1.875rem">
                <?php if($controller=='Index'): ?>
                <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                
                <?php endif; ?>
                <p>首页</p>
            </div>
        </a>
        <a href="/member/classify/classify">
            <div class="footer_tab_list lf" style="width:1.875rem">
                <?php if($controller=='Classify'): ?>
                <img src="__STATIC__/image/myhome/icon_fenlei_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_fenlei_off@2x.png">
                <?php endif; ?>
                <p>分类</p>
            </div>
        </a>

        <a href="/member/myhome/index">
            <div class="footer_tab_list rt" style="width:1.875rem">
                <?php if($controller=='Myhome'): ?>
                <img src="__STATIC__/image/myhome/icon_user_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_user_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_user_off@2x.png">
                <?php endif; ?>
                <p>我的</p>
            </div>
        </a>
        <?php if($is_read==0): ?>
        <a href="/member/systemmsg/index">
            <div class="footer_tab_list rt" style="width:1.875rem">
                <?php if($controller=='Systemmsg'): ?>
                <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                <?php endif; ?>
                <p>消息</p>
            </div>
        </a>
        <?php else: ?>
        <a href="/member/systemmsg/index">
            <div class="footer_tab_list rt" style="width:1.875rem">
                <?php if($controller=='Systemmsg'): ?>
                <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                <p class="unread"></p>
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                <p class="unread"></p>
                <?php endif; ?>
                <p>消息</p>
            </div>
        </a>
        <?php endif; ?>
</div>
<?php endif; else: if($m_type==0): ?>
<div style="height: 1.6rem;"></div>
<footer>
    <div class="footer_tab phonex">
            <a href="/index/index">
                <div class="footer_tab_list lf">
                    <?php if($controller=='Index'): ?>
                    <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                    <?php endif; ?>
                    <p>首页</p>
                </div>
            </a>
            <a href="/member/classify/classify">
                <div class="footer_tab_list lf">
                    <?php if($controller=='Classify'): ?>
                    <img src="__STATIC__/image/myhome/icon_fenlei_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_fenlei_off@2x.png">
                    <?php endif; ?>
                    <p>分类</p>
                </div>
            </a>

            <a href="/popularity/popularitygoods/share_list">
                <div class="footer_tab_list footer_pub lf">
                    <img src="__STATIC__/image/myhome/icon_fabu1@2x.png">
                </div>
            </a>

            <a href="/member/myhome/index">
                <div class="footer_tab_list rt">
                    <?php if($controller=='Myhome'): ?>
                    <img src="__STATIC__/image/myhome/icon_user_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_user_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_user_off@2x.png">
                    <?php endif; ?>
                    <p>我的</p>
                </div>
            </a>
            <?php if($is_read==0): ?>
            <a href="/member/systemmsg/index">
                <div class="footer_tab_list rt">
                    <?php if($controller=='Systemmsg'): ?>
                    <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php else: ?>
            <a href="/member/systemmsg/index">
                <div class="footer_tab_list rt">
                    <?php if($controller=='Systemmsg'): ?>
                    <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                    <p class="unread"></p>
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                    <p class="unread"></p>
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php endif; ?>
    </div>
</footer>
<?php endif; if($m_type==1): ?>
<div style="height: 1.6rem;"></div>
<div class="footer_tab phonex">
        <a href="/index/index">
            <div class="footer_tab_list lf">
                <?php if($controller=='Index'): ?>
                <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                <?php endif; ?>
                <p>首页</p>
            </div>
        </a>
        <a href="/member/classify/classify">
            <div class="footer_tab_list lf">
                <?php if($controller=='Classify'): ?>
                <img src="__STATIC__/image/myhome/icon_fenlei_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_fenlei_off@2x.png">
                <?php endif; ?>
                <p>分类</p>
            </div>
        </a>
        <a href="/popularity/popularitygoods/share_list">
            <div class="footer_tab_list footer_pub lf">
                <img src="__STATIC__/image/myhome/icon_fabu1@2x.png">
            </div>
        </a>
        <a href="/member/myhome/index">
            <div class="footer_tab_list rt">
                <?php if($controller=='Myhome'): ?>
                <img src="__STATIC__/image/myhome/icon_user_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_user_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_user_off@2x.png">
                <?php endif; ?>
                <p>我的</p>
            </div>
        </a>
        <?php if($is_read==0): ?>
        <a href="/member/systemmsg/index">
            <div class="footer_tab_list rt">
                <?php if($controller=='Systemmsg'): ?>
                <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                <?php endif; ?>
                <p>消息</p>
            </div>
        </a>
        <?php else: ?>
        <a href="/member/systemmsg/index">
            <div class="footer_tab_list rt">
                <?php if($controller=='Systemmsg'): ?>
                <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                <p class="unread"></p>
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                <p class="unread"></p>
                <?php endif; ?>
                <p>消息</p>
            </div>
        </a>
        <?php endif; ?>
</div>
<?php endif; endif; ?>
</footer>
    </body>

    <!--bugtags 开始-->
    <!-- <script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script> -->
    <!-- <script> -->
        <!-- // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本 -->
        <!-- // new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE'); -->
    <!-- </script> -->
    <!--bugtags 结束-->

    
<script type="text/javascript" src="__STATIC__/js/mui/mui.min.js"></script>
<script src="__JS__/index/index.js"></script>
<script type="text/javascript" src="__STATIC__/js/classify/classify.js"></script>
<script> 
    //点击搜索
    $(".index_pop_sousuo").click(function(){
        var keyword=$("input[name='keyword']").val();
        var typ=$("input[name='type']").val();
        window.location.href="/index/index/search_index/type/"+typ+"/keyword/"+keyword;
    })

    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
    var controls = document.getElementById("segmentedControls");
    var contents = document.getElementById("segmentedControlContents");
    var title = <?php echo $title; ?>;
    
    var html = [];
    var i = 0,
        j = 0,
        m = title.length;

    for (i = 0; i < m; i++) {
        html.push('<a class="mui-control-item" data-index="' + i + '" href="#content' + i + '">'+title[i]+'</a>');
    }
    controls.innerHTML = html.join('');
    var list = <?php echo $list; ?>;
    html = [];

    for (i = 0; i < m; i++) {
        html.push('<div id="content' + i + '" class="mui-control-content classify_all_con"><a href="/member/classify/index/gc_id/'+list[i]['gc_id']+'"><div class="classify_content"><div class="classify_main classify_dis"><div class="classify_banner"><img src="'+list[i]['gc_banner_img']+'"></div><div class="classify_all"><span></span><p>'+list[i]['gc_name']+'</p></a><span></span></div><ul class="mui-table-view classify_all_con clear">');
        var n = list[i]['son'].length
        if(n !=0) {
            for (j = 0; j < n; j++) {
                html.push('<li class="mui-table-view-cell lf"><a href="/member/classify/index/gc_id/'+list[i]['son'][j]['gc_id']+'"><div class="classify_list "><div><img src="'+list[i]['son'][j]['gc_img']+'"></div><p>'+list[i]['son'][j]['gc_name']+'</p></div></a></li>');
            }
        }

        html.push('</ul></div></div></div>');
    }
    contents.innerHTML = html.join('');
    //默认选中第一个
    if(controls.querySelector('.mui-control-item') != null) {
        controls.querySelector('.mui-control-item').classList.add('mui-active');
    }    
</script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="__STATIC__/js/iphoneXfooter.js"></script>
<script>
//    title = '邀您入驻拍吖吖，享大福利！';
    var title = '';
    var share_title = "<?php echo isset($share_title) ? $share_title :  ''; ?>";
    if($.trim(share_title)){
        title = share_title;
    }else{
        title = '拍吖吖：让快乐充满你的拍子！';
    }

//    var desc = '5折！3折！1折！还有1元价！尽在拍吖吖，快来抢购吧';
    var desc = '';
    var share_desc = "<?php echo isset($share_desc) ? $share_desc :  ''; ?>";
    if($.trim(share_desc)){
        desc = share_desc;
    }else{
        desc = '5折！3折！1折！还有1元价！尽在拍吖吖，快来抢购吧！';
    }

    var link = '';
    var share_link = "<?php echo isset($share_link) ? $share_link :  ''; ?>";
    if($.trim(share_link)){
        link = share_link;
    }else{
        link = "https://m.paiyy.com.cn/";
    }
    //var imgUrl = 'https://gss0.bdstatic.com/70cFsj3f_gcX8t7mm9GUKT-xh_/avatar/100/r6s1g4.gif';
    var imgUrl = '';
    var share_imgUrl = "<?php echo isset($share_imgUrl) ? $share_imgUrl :  ''; ?>";
    if($.trim(share_imgUrl)){
        imgUrl = share_imgUrl;
    }else{
        imgUrl = "https://m.paiyy.com.cn/uploads/logo/1.jpg";
    }
    wx.config({
//        debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: "<?php echo $appId; ?>", // 必填，公众号的唯一标识
        timestamp: "<?php echo $timestamp; ?>", // 必填，生成签名的时间戳
        nonceStr: "<?php echo $noncestr; ?>", // 必填，生成签名的随机串
        signature: "<?php echo $signature; ?>",// 必填，签名
        jsApiList: [
            'checkJsApi',
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone',
        ], // 必填，需要使用的JS接口列表
    });
    wx.ready(function(){
        //分享到朋友圈
        wx.onMenuShareTimeline({
            title: title,
            link: link,
            imgUrl: imgUrl,
        });
        //分享给朋友
        wx.onMenuShareAppMessage({
            title: title, // 分享标题
            desc: desc, // 分享描述
            link: link, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: imgUrl, // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        });
        //分享到QQ
        wx.onMenuShareQQ({
            title:title,
            desc: desc,
            link:link,
            imgUrl: imgUrl,
        });
        //分享到腾讯微博
        wx.onMenuShareWeibo({
            title:title,
            desc: desc,
            link:link,
            imgUrl: imgUrl,
        });
        wx.onMenuShareQZone({
            title:title,
            desc: desc,
            link:link,
            imgUrl: imgUrl,
        });
    });

</script>

</html>