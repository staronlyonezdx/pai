<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"D:\project\pai\public/../application/member/view/core/upgrade.html";i:1542704491;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543280491;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/core/upgrade.css">
<link rel="stylesheet" type="text/css" href="__CSS__/core/continue_invitation.css">

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
        
<main style="margin-top: 0">
<div class="upgrade_top">
    <div class="upgrade_progress-bar">
        <div class="upgrade_bar"></div>
        <div class="upgrade_bar active"></div>
        <?php if(($info['m_levelid'] == 1)): ?>
        <div class="upgrade_active upgrade_item">
                <div class="upgrade_cycle">
                        <?php if(empty($info['m_avatar']) || (($info['m_avatar'] instanceof \think\Collection || $info['m_avatar'] instanceof \think\Paginator ) && $info['m_avatar']->isEmpty())): ?>
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png"> <?php else: ?>
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo $info['m_s_avatar']; ?>"> <?php endif; ?>
                </div>
                <div class="upgrade_text active">普通会员</div>
            </div>
            
            <div class="upgrade_item2">
                <div class="upgrade_cycle">
                </div>
                <div class="upgrade_text">白银会员</div>
            </div>
            
            <div class="upgrade_item3">
                <div class="upgrade_cycle"></div>
                <div class="upgrade_text">黄金会员</div>
            </div>
            
            <div class="upgrade_item4">                
                <div class="upgrade_cycle"></div>
                <div class="upgrade_text">黑金会员</div>
            </div>
        <?php elseif(($info['m_levelid'] == 2)): ?>
        <div class="upgrade_item">
                <div class="upgrade_cycle active"></div>
                <div class="upgrade_text active">普通会员</div>
            </div>
            
            <div class="upgrade_active upgrade_item2">
                <div class="upgrade_cycle">
                        <?php if(empty($info['m_avatar']) || (($info['m_avatar'] instanceof \think\Collection || $info['m_avatar'] instanceof \think\Paginator ) && $info['m_avatar']->isEmpty())): ?>
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png"> <?php else: ?>
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo $info['m_s_avatar']; ?>"> <?php endif; ?>
                </div>
                <div class="upgrade_text">白银会员</div>
            </div>
            
            <div class="upgrade_item3">
                <div class="upgrade_cycle"></div>
                <div class="upgrade_text">黄金会员</div>
            </div>
            
            <div class="upgrade_item4">                
                <div class="upgrade_cycle"></div>
                <div class="upgrade_text">黑金会员</div>
            </div>
        <?php elseif(($info['m_levelid'] == 3)): ?>
        <div class="upgrade_item">
                <div class="upgrade_cycle active"></div>
                <div class="upgrade_text active">普通会员</div>
            </div>
            
            <div class="upgrade_item2">
                <div class="upgrade_cycle active">
                </div>
                <div class="upgrade_text active">白银会员</div>
            </div>
            
            <div class="upgrade_active upgrade_item3">
                <div class="upgrade_cycle">
                        <?php if(empty($info['m_avatar']) || (($info['m_avatar'] instanceof \think\Collection || $info['m_avatar'] instanceof \think\Paginator ) && $info['m_avatar']->isEmpty())): ?>
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png"> <?php else: ?>
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo $info['m_s_avatar']; ?>"> <?php endif; ?>
                </div>
                <div class="upgrade_text">黄金会员</div>
            </div>
            
            <div class="upgrade_item4">                
                <div class="upgrade_cycle"></div>
                <div class="upgrade_text">黑金会员</div>
            </div>
        <?php elseif(($info['m_levelid'] == 4)): ?>
        <div class="upgrade_item">
                <div class="upgrade_cycle active"></div>
                <div class="upgrade_text active">普通会员</div>
            </div>
            
            <div class="upgrade_item2">
                <div class="upgrade_cycle active">                    
                </div>
                <div class="upgrade_text active">白银会员</div>
            </div>
            
            <div class="upgrade_item3">
                <div class="upgrade_cycle active"></div>
                <div class="upgrade_text active">黄金会员</div>
            </div>
            
            <div class="upgrade_active upgrade_item4">                
                <div class="upgrade_cycle">
                        <?php if(empty($info['m_avatar']) || (($info['m_avatar'] instanceof \think\Collection || $info['m_avatar'] instanceof \think\Paginator ) && $info['m_avatar']->isEmpty())): ?>
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png"> <?php else: ?>
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo $info['m_s_avatar']; ?>"> <?php endif; ?>
                </div>
                <div class="upgrade_text">黑金会员</div>
            </div>
        <?php endif; ?>            
    </div>
    <p>还差<span><?php echo $info['ml_tj2'] - $info['experience']; ?></span>经验即可升级<?php echo $info['next_name']; ?></p>
</div>
    <div class="upgrade_main">
        <div class="upgrade_tit">成长攻略</div>
        <div class="upgrade_main_con">
            <div class="upgrade_main_top clear">
                <div class="upgrade_main_img lf">
                    <img src="__STATIC__/image/core/icon_member_consume@2x.png" alt="">
                </div>
                <p class="lf">消费得经验值</p>
            </div>                
            <div class="upgrade_main_text">每消费（含参团）1元——得1经验值。 </div>
        </div>
        <div class="upgrade_main_con">
            <div class="upgrade_main_top clear">
                <div class="upgrade_main_img lf">
                    <img src="__STATIC__/image/core/icon_member_invite@2x.png" alt="">
                </div>
                <p class="lf">邀请好友</p>
            </div>
            <div class="upgrade_main_text">
                <p>
                    1、邀请新会员注册并参团得100经验值/人。
                </p>
                <!-- <p>
                    2、所属会员成为白银会员——5个经验值/人。
                </p>
                <p>
                    3、所属会员成为黄金会员——10个经验值/人。
                </p>
                <p>
                    4、所属会员成为黑金会员——15个经验值/人。
                </p> -->
            </div>
        </div>
        <div class="upgrade_btn phonex">
            <a href="/index/index/price_range/type/1"><div class="upgrade_gopaly lf">去消费</div></a>
            <a><div class="upgrade_goinvite lf">去邀请</div></a>
        </div>
    </div>
</main>

        <!--分享弹框-->
        <div class="continue_pop">
                <div class="continue_con">
                    <div class="continue_con_top">
                        <img src="__STATIC__/image/core/icon_yaoqingma@2x.png" alt="">
                    </div>
                    <div class="continue_con_code">
                        <img src="<?php echo isset($info['m_code']) ? $info['m_code'] :  ''; ?>" alt="">
                    </div>
                    <!-- <div class="continue_con_btn clear"> -->
                        <div class="bc-btn">长按保存二维码到本地</div>
                        <div data-clipboard-text="<?php echo $share_link; ?>" class="copy-btn">复制链接</div>
                    <!-- </div> -->
                    <!--<div class="continue_con_list clear">-->
                        <!--<div class="continue_con_list_div lf">-->
                            <!--<div>-->
                                <!--<img src="__STATIC__/image/core/wx@2x.png" alt="">-->
                            <!--</div>-->
                            <!--<p>微信好友</p>-->
                        <!--</div>-->
                        <!--<div class="continue_con_list_div lf">-->
                            <!--<div>-->
                                <!--<img src="__STATIC__/image/core/pyq@2x.png" alt="">-->
                            <!--</div>-->
                            <!--<p>朋友圈</p>-->
                        <!--</div>-->
                        <!--<div class="continue_con_list_div lf">-->
                            <!--<div>-->
                                <!--<img src="__STATIC__/image/core/qq@2x.png" alt="">-->
                            <!--</div>-->
                            <!--<p>QQ好友</p>-->
                        <!--</div>-->
                        <!--<div class="continue_con_list_div lf">-->
                            <!--<div>-->
                                <!--<img src="__STATIC__/image/core/xl@2x.png" alt="">-->
                            <!--</div>-->
                            <!--<p>新浪微博</p>-->
                        <!--</div>-->
                    <!--</div>-->
                </div>
            </div>

            <!-- 安卓，ios分享效果 S -->
            <div class="details_fenxiang">
                    <div class="details_fxcon">
                        <div class="details_fxtit">
                            邀请好友
                        </div>
                        <div class="details_fxlist clear">
                            <div class="details_fx_img lf" onclick="app(0)">
                                <img src="__STATIC__/image/details/wx.png">
                                微信好友
                            </div>
                            <div class="details_fx_img lf" onclick="app(1)">
                                <img src="__STATIC__/image/details/pyq.png">
                                朋友圈
                            </div>
                            <!-- <div class="details_fx_img lf">
                                <img src="__STATIC__/image/details/iconqq@2x.png">
                                QQ好友
                            </div>
                            <div class="details_fx_img lf">
                                <img src="__STATIC__/image/details/icon微博@2x.png">
                                新浪微博
                            </div> -->
                            <div class="details_fx_img lf" onclick="copyUrl()">
                                <img src="__STATIC__/image/details/link.png">
                                复制链接
                            </div>
                        </div>
                        <div class="details_fx_cancel">
                            取消
                        </div>
                    </div>
                </div>
                <input type="hidden" id="app" />
                <!-- 安卓，ios分享效果 E -->

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
<script src="__STATIC__/js/clipboard.min.js"></script>
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
            $('#app').val(str);
        })
    })

    //关闭app分享弹窗
    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })
    function app(id) {
        var is_share_to_firend_circle = '';
        if(id == 0) {
            is_share_to_firend_circle = false;
        }else {
            is_share_to_firend_circle = true;
        }

        var data = '{"share_title": "'+title+'","share_content": "'+desc+'","share_url": "'+ link +'","share_image": "'+ imgUrl +'","is_share_to_firend_circle": '+is_share_to_firend_circle+'}';

        if($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function(bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getShareParams',data);
            })
        }else {
            // 非微信浏览器端安卓分享
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        window.android.getShareParams(data);
                    }
                }
            }
        }       
        $('.details_fenxiang').hide();
    }

    function copyUrl() {
        var data = '{"copy_url": "'+ link +'"}';
        if($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function(bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getCopyUrl',data);
            })
        }else {
            // 非微信浏览器端安卓复制链接
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        window.android.getCopyUrl(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }

    $(function(){
        //会员进度条

        var pag = "<?php echo $info['m_levelid']; ?>";
        var wh = <?php echo $info['experience']; ?>/<?php echo $info['ml_tj2']; ?>*100;
        var wid = ""; 
        if(pag == 1) {
            wid = (33.33*wh)/100;
        }else if(pag == 2) {
            wid = ((33.33*wh)/100)+33.33;
        }else if(pag == 3) {
            wid = ((33.33*wh)/100)+66.66;
        }else if(pag == 4) {
            wid = 100;
        }

        $('.upgrade_bar').eq(1).css("width",wid+'%');

        $(".header_back img").attr("src","__STATIC__/image/wallet/icon_nav_back@2x.png");
        
        var share_qr_image = "https://"+ document.domain + "<?php echo isset($info['m_code']) ? $info['m_code'] :  ''; ?>";
        //分享弹窗
        $(".upgrade_goinvite").click(function(){
            var data = '{"share_title": "'+title+'","share_content": "'+desc+'","share_url": "'+ link +'","share_image": "'+ imgUrl +'","is_share_to_firend_circle": "1","share_qr_image": "'+ share_qr_image +'","type": "2"}';
            if($('#app').val() != '') {
                if($('#app').val() == '1.0') {
                    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
                    setupWebViewJavascriptBridge(function(bridge) {
                        /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                        bridge.callHandler('getShareParams',data);
                    })
                }else {
                    $(".details_fenxiang").show();
                }
            
            }else {
                // 非微信浏览器端安卓分享
                if(hideFlag){
                    if (typeof(window.android) != "undefined") {
                        if(androidIos() == 'android') {
                            if(getCookie("version") == null) {
                                $('.details_fenxiang').show();
                            }else {
                                window.android.getShareParams(data);
                            }
                        }
                    }else {
                        $(".continue_pop").css({ display: "block" });
                    }
                }else {
                    $(".continue_pop").css({ display: "block" });
                }
            }
        })
        $(".continue_pop").click(function(){
            $(".continue_pop").css({display:"none"});
        })
        $(".continue_con").click(function(e){
            e.stopPropagation();
        })

        //滚动条改变头部
        $(window).scroll(function () {
            var scro = $(window).scrollTop();
            if (scro > 10) {
                $(".header_tit").css({ color: "#000000" });
                $(".header_nav").css({ backgroundColor: "#fff" });
                $('.header_back').find('img').attr('src','/static/icon/publish/icon_nav_back@2x.png');
            } else {
                $(".header_tit").css({ color: "#fff" });
                $(".header_nav").css({ backgroundColor: "transparent" });
                $('.header_back').find('img').attr('src','/static/image/wallet/icon_nav_back@2x.png');
            }
        })
    })

    //复制功能
    var btns = document.querySelectorAll('.copy-btn');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });

    clipboard.on('error', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>