<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"D:\project\pai\public/../application/member/view/wallet/recharge.html";i:1541491284;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543280491;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/withdraw.css">

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
        
<main>
        <div class="withdraw_select ">
            <div class="withdraw clear">
                <p class="withdraw_optfor lf">选择充值方式</p>
                <div class="withdraw_img rt">
                    <img src="__STATIC__/image/wallet/jiantou.png" alt="">
                </div>
            </div>
        </div>
        <div class="withdraw_select withdraw_sum">
            <p>充值金额</p>
        </div>
        <div class="withdraw_select withdraw_ipt">
            <div class="withdraw_inp">
                <p>￥</p>
                <input type="text" class='frozen' name="r_money">
            </div>
        </div>
        <div class="withdraw_money">账户余额 <span>￥<?php echo $m_money; ?></span></div>
        <a class="withdraw_btn" disabled="disabled" >
            确认充值
        </a>
        <div class="withdraw_pop">
        <div class="withdraw_bottom">
            <div class="withdraw_tit clear">
                <span>选择充值方式</span>
                <img src="__STATIC__/image/wallet/cancel910@2x.png" alt="" class="rt">
            </div>

            <div class="withdraw_pop_list widthdraw_gongzhonghao">
                <div class="withdraw_pop_list_view clear">
                    <div class="withdraw_pop_con">
                        <input type="hidden" name="paytype" value="1"/>

                        <div class="withdraw_pop_lf lf">
                            <img src="__STATIC__/image/wallet/weixin@2x.png" alt="">
                        </div>
                        <div class="withdraw_pop_text lf">
                            <p>微信公众号充值</p>
                            <span>推荐微信用户使用</span>
                        </div>
                    </div>
                    <div class="withdraw_pitch withdraw_pitch_dis rt">
                        <img src="__STATIC__/image/wallet/xunazhong909@2x.png" alt="">
                    </div>
                </div>
            </div>
            <div class="withdraw_pop_list">
                <div class="withdraw_pop_list_view clear">
                    <div class="withdraw_pop_con">
                        <input type="hidden" name="paytype" data="6" value="2"/>

                        <div class="withdraw_pop_lf lf">
                            <img src="__STATIC__/image/wallet/weixin@2x.png" alt="">
                        </div>
                        <div class="withdraw_pop_text lf">
                            <p>微信h5充值</p>
                            <span>推荐微信用户使用</span>
                        </div>
                    </div>
                    <div class="withdraw_pitch rt">
                        <img src="__STATIC__/image/wallet/xunazhong909@2x.png" alt="">
                    </div>
                </div>
            </div>
            <div class="withdraw_pop_list">
                <div class="withdraw_pop_list_view clear">
                    <div class="withdraw_pop_con">
                        <input type="hidden" name="paytype" data="7" value="3"/>

                        <div class="withdraw_pop_lf lf">
                            <img src="__STATIC__/image/wallet/zhifubao@2x.png" alt="">
                        </div>
                        <div class="withdraw_pop_text lf">
                            <p>支付宝充值</p>
                            <span>推荐支付宝用户使用</span>
                        </div>
                    </div>
                    <div class="withdraw_pitch  rt">
                        <img src="__STATIC__/image/wallet/xunazhong909@2x.png" alt="">
                    </div>
                </div>
            </div>
            <!--<div class="withdraw_pop_list">-->
                <!--<div class="withdraw_pop_list_view clear">-->
                    <!--<div class="withdraw_pop_con">-->
                        <!--<input type="hidden" name="paytype" value="4"/>-->

                        <!--<div class="withdraw_pop_lf lf">-->
                            <!--<img src="__STATIC__/image/wallet/ic_zhongguoyinhang@2x.png" alt="">-->
                        <!--</div>-->
                        <!--<div class="withdraw_pop_text lf">-->
                            <!--<p>银行卡充值</p>-->
                            <!--<span>由拍吖吖钱包提供支付服务</span>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="withdraw_pitch rt">-->
                        <!--<img src="__STATIC__/image/wallet/xunazhong909@2x.png" alt="">-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        </div>
    </div>
</main>
<input type="hidden" id="app">

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
    // var vConsole = new VConsole();
    // console.log('VConsole is cool');

    	// 手机调试
	// var vConsole = new VConsole();
  	// console.log('VConsole is cool');


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

    // 判断是否是微信浏览器
    $(document).ready(function () {
        var ua = navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == "micromessenger") {
            $(".withdraw_pop_list").css({display: "none"});
            $(".widthdraw_gongzhonghao").css({display: "block"});
        } else {
            $(".withdraw_pop_list").css({display: "block"});
            $(".widthdraw_gongzhonghao").css({display: "none"});
        }
    })
    $(".header_tit span").html("充值");
    $(".withdraw_lf_img").click(function () {
        $(this).children("img").eq(0).toggleClass("withdraw_img_dis");
        $(this).children("img").eq(1).toggleClass("withdraw_img_dis");
    })
    //点击支付方式
    $(".withdraw").click(function () {
        $(".withdraw_pop").addClass("withdraw_pitch_dis");
    })
    //点击支付方式的叉号
    $(".withdraw_tit img").click(function () {
        $(".withdraw_pop").removeClass("withdraw_pitch_dis");
    })
    //点击支付方式的选项
    $(".withdraw_pop_list").click(function () {
        $(".withdraw_pop_list").find(".withdraw_pitch").removeClass("withdraw_pitch_dis");
        $(this).find(".withdraw_pitch").addClass("withdraw_pitch_dis");
        var htm = $(this).find(".withdraw_pop_con").html();
        $(".withdraw_optfor").html(htm);
        $(".withdraw_pop").removeClass("withdraw_pitch_dis");
        $(".withdraw_btn").addClass("withdraw_btn_bg");
        $(".withdraw_btn").attr("disabled",false);
        //改变form的url地址
    })
    //点击确认提现
    $(".withdraw_btn").click(function(){
        
        var r_money=$(".frozen").val();
        var number=/^\d+\.?\d*$/;
        if(r_money==""){
            layer.msg("<span style='color:#fff'>金额不能为空</span>",{
                time:2000
            });
            return false;
        }
        if(r_money==0){
            layer.msg("<span style='color:#fff'>金额不能为0</span>",{
                time:2000
            });
            return false;
        }
        if(!number.test(r_money)){
            layer.msg("<span style='color:#fff'>只能输入数字或者小数哦</span>",{
                time:2000
            });
            return false;
        }
        var r_type=$(".withdraw_optfor").find("input").val();
        var ra_type=$(".withdraw_optfor").find("input").attr('data');
        var r_jump_id=<?php echo $r_jump_id; ?>;
        var r_jump_type=<?php echo $r_jump_type; ?>;
        var data = '{"member_id": "'+<?php echo $m_id; ?>+'","r_money": "'+r_money+'","r_type": "'+ra_type+'","r_for": "1"}';

        if($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function(bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getPayParams',data)
            })
        }else {
            // 非微信浏览器端安卓充值
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        window.android.getPayParams(data); //安卓
                    }
                } else {
                    $.ajax("/index/notify/addpayorder",{
                        dataType: 'json',//服务器返回json格式数据
                        type: 'POST',//HTTP请求类型console.log(data)
                        data: { r_money: r_money, r_type: r_type,r_for:1,r_jump_id:r_jump_id,r_jump_type:r_jump_type},
                        success:function(data){
                            if(data.status>0){
                                if ($(".withdraw").find("input").val() == 1) {
                                    window.location.href = "https://m.paiyy.com.cn/index/notify/wx_jsapi_pay/r_id/"+data.r_id;
                                } else if ($(".withdraw").find("input").val() == 2) {
                                    window.location.href ="https://m.paiyy.com.cn/index/wxh5pay/wx_h5_pay/r_id/"+data.r_id;
                                } else if ($(".withdraw").find("input").val() == 3) {
                                    window.location.href ="https://m.paiyy.com.cn/index/aliwappay/ali_wap_pay/r_id/"+data.r_id
                                } else if ($(".withdraw").find("input").val() == 4) {

                                }
                            }
                        }
                    })
                }
            }else {
                $.ajax("/index/notify/addpayorder",{
                    dataType: 'json',//服务器返回json格式数据
                    type: 'POST',//HTTP请求类型console.log(data)
                    data: { r_money: r_money, r_type: r_type,r_for:1,r_jump_id:r_jump_id,r_jump_type:r_jump_type},
                    success:function(data){
                        if(data.status>0){
                            if ($(".withdraw").find("input").val() == 1) {
                                window.location.href = "https://m.paiyy.com.cn/index/notify/wx_jsapi_pay/r_id/"+data.r_id;
                            } else if ($(".withdraw").find("input").val() == 2) {
                                window.location.href ="https://m.paiyy.com.cn/index/wxh5pay/wx_h5_pay/r_id/"+data.r_id;
                            } else if ($(".withdraw").find("input").val() == 3) {
                                window.location.href ="https://m.paiyy.com.cn/index/aliwappay/ali_wap_pay/r_id/"+data.r_id
                            } else if ($(".withdraw").find("input").val() == 4) {

                            }
                        }
                    }
                })
            }
        }
    })

    //安卓,ios支付成功
    function pay_success(str) {
        var val = JSON.parse(str);
        if(val.status == 1) {
            layer.msg("<span style='color:#fff'>"+ val.msg +"</span>",{
                time:2000
            },function(){
                window.location.href ="/member/wallet/recharge_success/r_id/"+val.rid;
            });
        }else {
            layer.msg("<span style='color:#fff'>"+ val.msg +"</span>",{
                time:2000
            });
        }
    }

    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    setupWebViewJavascriptBridge(function(bridge) {
        /*JS给ObjC提供公开的API，在ObjC端可以手动调用JS的这个API。接收ObjC传过来的参数，且可以回调ObjC*/
        bridge.registerHandler('pay_success', function(str) {
            var val = JSON.parse(str);
            if(val.status == 1) {
                layer.msg("<span style='color:#fff'>"+ val.msg +"</span>",{
                    time:2000
                },function(){
                    window.location.href ="https://m.paiyy.com.cn/member/wallet/recharge_success/r_id/"+val.rid;
                });
            }else {
                layer.msg("<span style='color:#fff'>"+ val.msg +"</span>",{
                    time:2000
                });
            }
        })
    })
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>