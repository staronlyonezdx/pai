<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"D:\project\pai\public/../application/member/view/promoters/is_success.html";i:1541491284;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/promoters/is_success.css">

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
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span class="success">推广员考核</span>
            <span class="fail">审核未通过</span>
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >
            <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
        </div>
    </div>
</div>
</div>
</header>
        <header></header>
        
<main>
    <div class="audit">
        <!--推广员考核-->
        <div class="audit_success" style="display: block">
            <div class="audit_success_bg">
                <!--头部提示-->
                <div class="audit_success_title">
                    <img src="__STATIC__/image/promoters/icon_chenggong@2x.png" alt="" class="success_icon">
                    <p class="success_title rt">恭喜您已经成功通过吖吖推广员申请，进入到推广员考核期！</p>
                </div>
                <!--倒计时-->
                <div class="details_rt clear">
                    <p class="details_hint_text lf">考核倒计时:</p>
                    <div class="details_time rt" id="first">
                        <span class="details_show details_day"></span>
                        <span class="details_fenhao">:</span>
                        <span class="details_show details_hour"></span>
                        <span class="details_fenhao">:</span>
                        <span class="details_show details_minute"></span>
                        <span class="details_fenhao">:</span>
                        <span class="details_show details_second"></span>
                    </div>
                </div>
                <!--进度-->
                <div class="progress">
                    <div class="circle-progress">
                        <div class="wrapper-back">
                            <div class="wrapper right">
                                <div class="circle-progress-bar circle-right"></div>
                            </div>
                            <div class="wrapper left">
                                <div class="circle-progress-bar circle-left"></div>
                            </div>
                            <!--<a href="/member/promoters/invitation_list/type/1">-->
                            <div>
                                <div class="mask">
                                    <p>考核期内已成功邀请</p>
                                    <p><span class="join"><?php echo isset($data['auction']) ? $data['auction'] :  0; ?></span>人</p>
                                    <p>考核目标人数:<span class="total"><?php echo isset($data['total_people']) ? $data['total_people'] :  0; ?></span>人</p>


                                </div>
                            </div>
                        </div>


                        <!--</a>-->
                    </div>
                    <a href="/member/promoters/invitation_list/from/2">
                        <img src="__STATIC__/image/promoters/icon_jump1@2x.png" alt="" class="from2">
                    </a>
                </div>

            </div>
            <div class="audit_success_num clear">
                <div class="success_item lf">
                    <p class="success_num"><?php echo isset($data['no_auction']) ? $data['no_auction'] :  0; ?></p>
                    <p>邀请未激活</p>
                    <a href="/member/promoters/invitation_list/type/2/from/2">
                        <img src="__STATIC__/image/promoters/icon_jump@2x.png" alt="" class="from2">
                    </a>

                </div>
                <div class="success_item rt">
                    <p class="success_num"><?php echo isset($data['sum_money']) ? $data['sum_money'] :  0; ?></p>
                    <p>冻结资金</p>
                    <a href="/member/promoters/frozen_money">
                        <img src="__STATIC__/image/promoters/icon_jump@2x.png" alt="" style="left:3rem">
                    </a>
                </div>
            </div>
            <p class="tip">注：未通过考核将不能再申请成为吖吖推广员！！！</p>
            <a href="javascript:;" class="inv index_btn">立即邀请</a>
        </div>
        <!--审核未通过-->
        <div class="audit_fail">
            <img src="<?php echo isset($apply_info['m_avatar']) ? $apply_info['m_avatar'] :  '__STATIC__/image/myhome/TIM20180731142117.jpg'; ?>">
            <p class="fail_result">您的吖吖推广员申请未通过</p>
            <p class="fail_reason">未通过理由：<?php echo $apply_info['error_explain']; ?></p>
            <p class="tip">温馨提示：您可以咨询客服修改完善个人信息后再次申请。</p>
            <div class="fail_btns">
                <a href="tel:400-027-1888">咨询客服</a>
                <a href="javascript:;" class="apply_again">重新申请</a>
            </div>
        </div>
    </div>

    <!--分享弹框-->
    <div class="continue_pop">
        <div class="continue_con">
            <div class="continue_con_top">
                <img src="__STATIC__/image/core/icon_yaoqingma@2x.png" alt="">
            </div>
            <div class="continue_con_code">
                <img src="<?php echo isset($data['qr_code']) ? $data['qr_code'] :  ''; ?>" alt="">
            </div>
            <div class="bc-btn">长按保存二维码到本地</div>
            <div data-clipboard-text="<?php echo $share_link; ?>" class="copy-btn">复制链接</div>
            <!-- <div class="continue_con_btn clear"> -->
            <!-- <div>请长按上方二维码保存</div> -->
            <!--<div class="rt">点击右上角指定分享</div>-->
            <!-- </div> -->
            <!--<div class="continue_con_list clear">-->
            <!--<div class="continue_con_list_div share_wx lf">-->
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
</main>

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
<input type="hidden" id="app"/>
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

    // 圆形的显示百分比
    function setCircle(dom, percent) {
        var deg = percent * 360;
        // console.log(deg);
        var reDeg = 0;
        if (deg >= 180) {
            reDeg = deg - 315;
            dom.getElementsByClassName("circle-right")[0].style.transform = "rotate(45deg)";
            dom.getElementsByClassName("circle-left")[0].style.transform = "rotate(" + reDeg + "deg)";
        } else {
            reDeg = deg - 135;
            dom.getElementsByClassName("circle-right")[0].style.transform = "rotate(" + reDeg + "deg)";
            dom.getElementsByClassName("circle-left")[0].style.transform = "rotate(-135deg)";
        }
    }

    var dom = document.querySelector('.circle-progress');
    var total = +$('.total').html();
    if (total == 0) {
        total = 1;
    }
    var percent = (+$('.join').html()) / total;
    setCircle(dom, percent);

    // 倒计时
    var end_time = "<?php echo isset($data['end_time']) ? $data['end_time'] :  ''; ?> ";
    // console.log(end_time);
    var is_pomoters = "<?php echo $apply_info['is_promoters']; ?>";// 1普通会员  2申请中 3审核失败 4考核中 5考核成功(推广员)  6考核失败
    console.log(is_pomoters);
    // 根据状态来判断显示哪一个
    if (is_pomoters == 4) {
        $('.success').show();
        $('.fail').hide();
        $('.audit_success').show();
        $('.audit_fail').hide();
    } else if (is_pomoters == 3) {
        $('.success').hide();
        $('.fail').show();
        $('.audit_success').hide();
        $('.audit_fail').show();
    } else if (is_pomoters == 5 || is_pomoters == 6) {
        window.location.href = '/member/myhome/index'
    }



    var time = end_time * 1000 - Date.now();
    console.log(Date.now());
    console.log(time);

    // 倒计时  从申请后七天开始
    function timer(intDiff, idName) {
        timerInterval = setInterval(function (e) {
            var day = 0,
                hour = 0,
                minute = 0,
                second = 0;

            /*时间默认值*/
            if (intDiff > 0) {
                day = Math.floor(intDiff / 1000 / 60 / 60 / 24);
                hour = Math.floor(intDiff / 1000 / 60 / 60 - (day * 24));
                minute = Math.floor((intDiff / 1000 / 60) - (day * 24 * 60) - (hour * 60));
                second = Math.floor((intDiff / 1000) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60));
                if (day == 0 && hour == 0 && minute == 0 && second == 1) {
                    console.log(11);
                    clearInterval(timerInterval);

                }
            }
            if (minute <= 9) minute = '0' + minute;
            if (second <= 9) second = '0' + second;

            $('.details_day').html(' <span>' + day + '</span>天');
            $('.details_hour').html('<span>' + hour + '</span>');
            $(' .details_minute').html('<span>' + minute + '</span>');
            $('.details_second').html('<span>' + second + '</span>');
            intDiff -= 1000;
        }, 1000);
    }

    timer(time, "#first");


    //iosapp
    /*这段代码是固定的，必须要放到js中*/
    function setupWebViewJavascriptBridge(callback) {
        if (window.WebViewJavascriptBridge) {
            return callback(WebViewJavascriptBridge);
        }
        if (window.WVJBCallbacks) {
            return window.WVJBCallbacks.push(callback);
        }
        window.WVJBCallbacks = [callback];
        var WVJBIframe = document.createElement('iframe');
        WVJBIframe.style.display = 'none';
        WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
        document.documentElement.appendChild(WVJBIframe);
        setTimeout(function () {
            document.documentElement.removeChild(WVJBIframe)
        }, 0)
    }

    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    setupWebViewJavascriptBridge(function (bridge) {
        /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
        bridge.callHandler('isApp', function (str) {
            $('#app').val(str);
        })
    })


    // 点击立即邀请按钮
    var share_qr_image = "https://" + document.domain + "<?php echo isset($data['qr_code']) ? $data['qr_code'] :  ''; ?>";
    $(".index_btn").click(function () {

        var data = '{"share_title": "<?php echo $share_title; ?>","share_content": "<?php echo $share_desc; ?>","share_url": "<?php echo $share_link; ?>","share_image": "' + imgUrl + '","is_share_to_firend_circle": "1","share_qr_image": "' + share_qr_image + '"}';

        if ($('#app').val() != '') {
            $('.details_fenxiang').show();
        } else {
            // 非微信浏览器端安卓分享
            if (hideFlag) {
                if (typeof(window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        if (getCookie("version") == null) {
                            $('.details_fenxiang').show();
                        } else {
                            window.android.getShareParams(data);
                        }
                    }
                } else {
                    $(".continue_pop").css({display: "block"});
                }
            } else {
                $(".continue_pop").css({display: "block"});
            }
        }
    })

    function app(id) {
        var is_share_to_firend_circle = '';
        if (id == 0) {
            is_share_to_firend_circle = false;
        } else {
            is_share_to_firend_circle = true;
        }
        var data = '{"share_title": "<?php echo $share_title; ?>","share_content": "<?php echo $share_desc; ?>","share_url": "<?php echo $share_link; ?>","share_image": "' + imgUrl + '","is_share_to_firend_circle": ' + is_share_to_firend_circle + '}';

        if ($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function (bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getShareParams', data);
            })
        } else {
            // 非微信浏览器端安卓分享
            if (hideFlag) {
                if (typeof(window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        window.android.getShareParams(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }

    function copyUrl() {
        var data = '{"copy_url": "<?php echo $share_link; ?>"}';
        if ($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function (bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getCopyUrl', data);
            })
        } else {
            // 非微信浏览器端安卓复制链接
            if (hideFlag) {
                if (typeof(window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        window.android.getCopyUrl(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }


    //复制功能
    var btns = document.querySelectorAll('.copy-btn');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function (e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>', {time: 2000});
    });

    clipboard.on('error', function (e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>', {time: 2000});
    });

    $(".continue_pop").click(function () {
        $(".continue_pop").css({display: "none"});
    })

    $('.apply_again').click(function () {
        $.ajax({
            url: "/member/promoters/promoters_apply",
            type: "POST",
            data: {
                apply: 1
            },
            success: function (data) {
                if (data.status == 1) {
                    window.location.href = '/member/promoters/is_apply_success'
                } else {
                    // data.msg
                    layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                        time: 2000
                    });
                }
            }
        })
    })
    // $('.from2').click(function () {
    //
    // })
</script>

</html>