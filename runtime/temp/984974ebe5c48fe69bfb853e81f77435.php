<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"D:\project\pai\public/../application/member/view/promoters/index.html";i:1542935137;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1544154864;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/promoters/index.css">

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
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
        <!-- <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script> -->
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <!-- <script src="__JS__/login/loginsdk.js"></script> -->
        <!--web im sdk 登出 示例代码-->
        <!-- <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script> -->
        
        <title></title>
    </head>
    <body>
        <header>
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" onClick="javascript:history.go(-1);">
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>
</header>
        <header></header>
        
<main>
    <div class="promoters">
        <div class="promoters_quanyi">
            <img src="__STATIC__/image/promoters/pg_quanyi@2x.png" alt="">
        </div>
        <div class="promoters_why">
            <img src="__STATIC__/image/promoters/pg_tuiguang@2x.png" alt="">
        </div>
        <div class="promoters_tui">
                <img src="__STATIC__/image/promoters/pg_chengwei@2x.png" alt="">
                <a href="/member/promoters/assessment_standard">
                    <span>查看考核指标</span><img src="__STATIC__/image/promoters/icon_jump11@2x.png" alt="">
                </a>
        </div>
        <div class="promoters_bottom clear">
            <a class="phs" href="tel:400-027-1888"><div class="promoters_call lf">咨询客服</div></a>
            <div class="promoters_shenqing lf apply">一键申请</div>
        </div>
        <!-- <div class="promoters_content">
            <p class="join_title">加入我们</p>
            <div class="promoters_content_tips">
                <p>加入拍吖吖成为吖吖推广员，</p>
                <p>邀请会员拿海量推广奖，</p>
                <p>还能拿到直接会员和所有间接会员的观望奖。</p>
                <p>详情请咨询客服。</p>
            </div>
            <p class="join_zixun">咨询客服立刻加入我们吧！</p>
            <div class="promoters_content_btns">
                <a class="phs" href="tel:400-027-1888">咨询客服</a>
                <a href="javascript:;" class="apply">我已了解，一键申请</a>
            </div>
        </div> -->
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
    $(function () {
        var isShiming = "<?php echo $data['is_attestation']; ?>";//1已实名认证 0 未实名认证会员状态
        // console.log(isShiming);
        $('.apply').click(function () {
            if (isShiming == 1) {
                layer.confirm('', {
                    title:false,
                    closeBtn:false,
                    content:'<span class="promoters_alert">您是否已经详细了解推广员制度，确认申请？</span>',
                    btn: ['取消', '立即申请'] //可以无限个按钮
                    ,btn2: function(index, layero){
                        $.ajax({
                            url: "/member/promoters/promoters_apply",
                            type: "POST",
                            data:{
                              apply:1
                            },
                            success: function (data) {
                                if(data.status == 1){
                                    window.location.href = '/member/promoters/is_apply_success'
                                }else{
                                    // data.msg
                                    layer.msg("<span style='color:#fff'>"+ data.msg +"</span>",{
                                        time:2000
                                    });
                                }
                            }
                        })
                    }
                });
            }else{
                var pop=window.sessionStorage.setItem("pop",0);
                layer.confirm('', {
                    title:false,
                    closeBtn:false,
                    content:'<span class="promoters_alert">您还未实名认证哦，绑定银行卡即可快速实名认证啦！</span>',
                    btn: ['再想想', '立即绑定'] //可以无限个按钮
                    ,btn2: function(index, layero){
                        //按钮【按钮三】的回调
                        window.location.href = '/member/wallet/bookCard/from/1'
                    }
                });
            }
        })
        sessionStorage.removeItem('pop')
    })

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
            if(str == '1.0') {
                $('.phs').removeAttr('href').attr('onclick','call(4000271888)');
            }
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

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>