<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"D:\project\pai\public/../application/member/view/modifydata/use_help.html";i:1542589248;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/modifydata/use_help.css">

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
<!-- <div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" onClick="javascript:history.go(-1);">
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div> -->
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <!-- <div class="header_back" > -->
            <div class="header_back" onClick="javascript:history.back();">
            <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
        </div>
    </div>
</div>
</header>
        <header></header>
        
<main>
<a href="/member/modifydata/search_use_help/">
    <div class="use_help_search">
        <img src="__STATIC__/image/index/searchbar_icon_search@2x.png" alt=""/>
        <span>有问题？点我搜搜看吧！</span>
    </div>
</a>
    <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
    <div>暂无数据</div>
    <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="use_help_list clear">
        <a href="/member/modifydata/often_problem/at_id/<?php echo $vo['at_id']; ?>">
            <div class="use_help_one lf">
                <div class="use_help_img">
                    <img src="<?php echo $vo['at_img']; ?>" alt=""/>
                </div>
                <p><?php echo isset($vo['at_name']) ? $vo['at_name'] :  ''; ?></p>
            </div>
        </a>
        <div class="use_help_con lf">
            <?php if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['son']) ? array_slice($vo['son'],0,2, true) : $vo['son']->slice(0,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
            <a href="/member/modifydata/help_info/a_id/<?php echo $voo['a_id']; ?>">
                <div class="use_help_con_top">
                    <?php echo $voo['a_name']; ?>
                </div>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="use_help_con use_help_rtborder lf">
            <?php if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['son']) ? array_slice($vo['son'],2,2, true) : $vo['son']->slice(2,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
            <a href="/member/modifydata/help_info/a_id/<?php echo $voo['a_id']; ?>">
                <div class="use_help_con_top">
                    <?php echo $voo['a_name']; ?>
                </div>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    <!--<div class="use_help_list clear">-->
    <!--<a href="/member/modifydata/often_problem/">-->
    <!--<div class="use_help_one lf">-->
    <!--<div class="use_help_img">-->
    <!--<img src="__STATIC__/image/modifydata/icon_help_ComPro@2x.png" alt=""/>-->
    <!--</div>-->
    <!--<p>常见问题</p>-->
    <!--</div>-->
    <!--</a>-->
    <!--<div class="use_help_con lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--参与流程-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top use_help_border">-->
    <!--幸运码是什么-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--<div class="use_help_con use_help_rtborder lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--花生是什么-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top use_help_border">-->
    <!--截止时间是什么-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--</div>-->
    <!--<div class="use_help_list clear">-->
    <!--<a href="/member/modifydata/often_problem/">-->
    <!--<div class="use_help_one lf">-->
    <!--<div class="use_help_img">-->
    <!--<img src="__STATIC__/image/modifydata/icon_help_order@2x.png" alt=""/>-->
    <!--</div>-->
    <!--<p>订单相关</p>-->
    <!--</div>-->
    <!--</a>-->
    <!--<div class="use_help_con lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--取消订单-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top use_help_border">-->
    <!--订单自动退款-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--<div class="use_help_con use_help_rtborder lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--订单被关闭-->
    <!--</div>-->
    <!--</a>-->
    <!--<a>-->
    <!--<div class="use_help_con_top use_help_border">-->

    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--</div>-->
    <!--<div class="use_help_list clear">-->
    <!--<a href="/member/modifydata/often_problem/">-->
    <!--<div class="use_help_one lf">-->
    <!--<div class="use_help_img">-->
    <!--<img src="__STATIC__/image/modifydata/icon_help_finance@2x.png" alt=""/>-->
    <!--</div>-->
    <!--<p>财务相关</p>-->
    <!--</div>-->
    <!--</a>-->
    <!--<div class="use_help_con lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--如何提现-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top use_help_border">-->
    <!--提现到账-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--<div class="use_help_con use_help_rtborder lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--邀请收益-->
    <!--</div>-->
    <!--</a>-->
    <!--<a>-->
    <!--<div class="use_help_con_top use_help_border">-->

    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--</div>-->
    <!--<div class="use_help_list clear">-->
    <!--<a href="/member/modifydata/often_problem/">-->
    <!--<div class="use_help_one lf">-->
    <!--<div class="use_help_img">-->
    <!--<img src="__STATIC__/image/modifydata/icon_help_logistics@2x.png" alt=""/>-->
    <!--</div>-->
    <!--<p>物流相关</p>-->
    <!--</div>-->
    <!--</a>-->
    <!--<div class="use_help_con lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--参与流程-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top use_help_border">-->
    <!--申请退款-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--<div class="use_help_con use_help_rtborder lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--修改发货地址-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top use_help_border">-->
    <!--未收到货-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--</div>-->
    <!--<div class="use_help_list clear">-->
    <!--<a href="/member/modifydata/often_problem/">-->
    <!--<div class="use_help_one lf">-->
    <!--<div class="use_help_img">-->
    <!--<img src="__STATIC__/image/modifydata/icon_help_logistics2@2x.png" alt=""/>-->
    <!--</div>-->
    <!--<p>商家相关</p>-->
    <!--</div>-->
    <!--</a>-->
    <!--<div class="use_help_con lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--开店流程-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top use_help_border">-->
    <!--保证金规则-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--<div class="use_help_con use_help_rtborder lf">-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top">-->
    <!--如何发布商品-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/modifydata/help_info/">-->
    <!--<div class="use_help_con_top use_help_border">-->
    <!--店铺等级-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->

    <!--</div>-->
    <div class="use_help_fix phonex">
        <a class="phs" href="tel:400-027-1888">
            <div class="use_help_kefu">
                咨询时间7:00~17:00，确认咨询
            </div>
        </a>
    </div>

</main>

        <footer></footer>
    </body>

    <!--bugtags 开始-->
    <!-- <script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script> -->
    <!-- <script> -->
        <!-- // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本 -->
        <!-- // new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE'); -->
    <!-- </script> -->
    <!--bugtags 结束-->

    
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
<script>
    //iosapp
    /*这段代码是固定的，必须要放到js中*/
    function setupWebViewJavascriptBridge(callback) {
        if (window.WebViewJavascriptBridge) { return callback(WebViewJavascriptBridge); }
        if (window.WVJBCallbacks) { return window.WVJBCallbacks.push(callback); }
        window.WVJBCallbacks = [callback];
        var WVJBIframe = document.createElement('iframe');
        WVJBIframe.style.display = 'none';
        WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
        document.documentElement.appendChild(WVJBIframe);
        setTimeout(function() { document.documentElement.removeChild(WVJBIframe) }, 0)
    }

    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    setupWebViewJavascriptBridge(function(bridge) {
        /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
        bridge.callHandler('isApp',function(str) {
            $('.phs').removeAttr('href').attr('onclick','call(4000271888)');
        })
    })

    function call(tel) {
        var data = '{"tel": "'+ tel +'"}'
        setupWebViewJavascriptBridge(function(bridge) {
            /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
            bridge.callHandler('call_tel',data);
        })
    }
</script>

</html>