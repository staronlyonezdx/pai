<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\project\pai\public/../application/member/view/goodsproduct/rule.html";i:1541491283;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/goodsproduct/rule.css">

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
            <span>商品规则</span>
            <div class="header_back"  <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back(-1);" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >
            <img src="__STATIC__/image/goodsproduct/icon_nav_back2@2x.png" name='out' class="smt">
        </div>
    </div>
</div>
</div>
</header>
        <header></header>
        
<main>
    <div class="rule_top clear">
        <div class="rule_top_text lf">
            <?php if($is_lord ==1): ?>
            <p>吖吖商城规则</p>
            <span>吖吖商城团购流程规则</span>
            <?php else: ?>
            <p>拍吖吖规则</p>
            <span>拍吖吖团购流程规则</span>
            <?php endif; ?>
            
        </div>
        <div class="rule_top_img">
            <img src="__STATIC__/image/goodsproduct/dengpao@2x.png" alt=""/>
        </div>
    </div>
    <div class="rule_main">
        <div class="rule_list">
            <div class="rule_bg_img">
                <img src="__STATIC__/image/goodsproduct/tuoyuan1818@2x.png" alt=""/>
            </div>
            <p>吖吖参团流程</p>
        </div>
        <div class="rule_main_img">
            <!-- 加判断S -->
            <?php if($is_lord ==1): ?>
            <img src="__STATIC__/image/goodsproduct/Icon_guize@2x.png" alt=""/>
            <?php else: ?>
            <img src="__STATIC__/image/goodsproduct/guize@2x.png" alt=""/>
            <?php endif; ?>
            <!-- 加判断E -->
        </div>
        <!-- 加判断S -->
        <!-- 加判断S -->
         <?php if($is_lord ==1): else: ?>
        <div>
            <div class="rule_list">
                <div class="rule_bg_img">
                    <img src="__STATIC__/image/goodsproduct/tuoyuan1818@2x.png" alt=""/>
                </div>
                <p>什么是吖吖码?</p>
            </div>
            <div class="rule_mian_text">
                 <span>亲爱的您在购买商品后，可由购买的份数获得一定的吖吖码当在商品满额揭晓时，系统将从该轮商品中对应的所有吖吖码里抽取一名幸运儿获得商品</span>
                <!--<a href="/member/orderpai/pai_rule/">查看详细揭晓规则</a>-->
                <a href="/index/index/agreement/at_name/详细揭晓规则">查看详细揭晓规则</a>
            </div>
        </div>
        <!-- <div>
            <div class="rule_list">
                <div class="rule_bg_img">
                    <img src="__STATIC__/image/goodsproduct/tuoyuan1818@2x.png" alt=""/>
                </div>
                <p>退款注意事项</p>
            </div>
            <div class="rule_mian_text">
                <span>未团中时，拍吖吖将扣除退款金额中的5%作为花生存于您的账户中～ <a href="/index/index/agreement/at_name/全额返活动规则">想要全额返？三七全额返活动了解一下！</a></span>
                <a href="/member/modifydata/often_problem/at_id/13">查看退款规则详情</a>
                  <br> -->
                   <!-- <a href="/index/index/agreement/at_name/退款规则详情" class="inlinea">查看退款规则详情</a>&nbsp;&nbsp;&nbsp;&nbsp;
                   <a href="" class="inlinea">什么是花生?</a> -->

            <!-- </div>
        </div> -->
        <?php endif; ?>
        <!-- 加判断E -->
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
    $(window).scroll(function () {
        var scrol = $(window).scrollTop();
        if (scrol > 1) {
            $(".header_nav").css({background:"#fff"});
            $(".header_tit span").css({color:"#000000"});
            $(".header_tit img").attr("src","__STATIC__/image/admit/icon_nav_back@2x.png");
        } else {
            $(".header_nav").css({background:"transparent"});
            $(".header_tit span").css({color:"#fff"});
            $(".header_tit img").attr("src","__STATIC__/image/goodsproduct/icon_nav_back2@2x.png");
        }
    })
</script>

</html>