<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\project\pai\public/../application/member/view/orderpai/pay_result.html";i:1541575155;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1544154864;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/payment_success.css">

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
        <header></header>
        <header></header>
        
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span>支付结果</span>
            <div class="header_back" onclick="backUrl()">
                <img src="/static/icon/publish/icon_nav_back@2x.png" name="out" class="smt">
            </div>
        </div>
    </div>
</div>
<main>
    <!--支付成功-->
    <?php if($info['o_paystate'] > 1): ?>
    <div class="payment_success">
        <div class="payment_success_tit ">
            <div class="payment_success_con clear">
                <span>
                  <img src="__STATIC__/image/orderpai/icon_gou@2x.png">
                  订单支付成功
                </span>
                <a href="/member/Orderpai/index/o_id/<?php echo $info['o_id']; ?>/j_type/1">
                    <div class="rt">查看订单</div>
                </a>
            </div>
        </div>
        <div class="payment_success_bottom">
            <div class="payment_success_list clear">
                <p class="lf">支付方式</p>

                <p class="rt">
                    <?php switch($info['o_paytype']): case "1": ?>微信<?php break; case "2": ?>支付宝<?php break; case "3": ?>余额支付<?php break; default: ?>默认
                    <?php endswitch; ?>
                </p>
            </div>
            <div class="payment_success_list clear">
                <p class="lf">订单时间</p>
                <p class="rt"><?php echo date('Y-m-d H:i',$info['o_addtime']); ?></p>
            </div>
            <div class="payment_success_list clear">
                <p class="lf">订单编号</p>
                <p class="rt"><?php echo $info['o_sn']; ?></p>
            </div>
            <div class="payment_success_list clear">
                <p class="lf">订单金额</p>
                <p class="rt">￥<?php echo (isset($info['o_totalmoney']) && ($info['o_totalmoney'] !== '')?$info['o_totalmoney']:'0.00'); ?></p>
            </div>
        </div>
        <div class="payment_success_border"></div>
    </div>
    <div class="payment_success_chilun">
        <img src="__STATIC__/image/orderpai/icon_chilun@2x.png">
    </div>
    <a href="/index/index/search_index"><div class="payment_success_btn">再去逛逛宝贝~</div></a>
    <!--支付失败-->
    <?php else: ?>
    <style>
        body{
            background: #fff;
        }
    </style>
    <!--<p>订单支付失败</p>-->
    <div class="payment_failure">
        <div class="payment_failure_img">
            <img src="__STATIC__/image/orderpai/icon_X@2x.png" alt="">
        </div>
        <p>订单支付失败</p>
        <span>系统发生错误订单支付失败 请再次尝试支付</span>
    </div>
    <a href="/member/orderpai/index/o_id/<?php echo (isset($o_id) && ($o_id !== '')?$o_id:0); ?>">
        <div class="payment_failure_btn">再次支付</div>
    </a>
    <!--<p>请在<?php echo $time_str; ?>内完成付款，否则订单会被系统取消</p>-->
    <!--<a href="/member/Orderpai/index/o_id/<?php echo $info['o_id']; ?>">查看订单</a>-->
    <!--<a href="##">充新付款</a>-->
    <?php endif; ?>
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
    // 返回首页
    $(".payment_success_btn").click(function(){
        window.location.href="/";
    });

    // 头部返回
    function backUrl() {
        if(sessionStorage.getItem('backUrl') != null) {
            window.history.go(-2);
            sessionStorage.removeItem('backUrl');
        }else{
            window.history.go(-1);
        }
    }
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>