<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"D:\project\pai\public/../application/member/view/modifydata/set_data.html";i:1544171093;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1544154864;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/set/set.css">

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
<!--<div class="header_nav">-->
    <!--<div class="header_view">-->
        <!--<div class="header_tit">-->
            <!--设置-->
            <!--<a href="/member/myhome">-->
              <!--<div class="header_back">-->
                  <!--<img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">-->
              <!--</div>-->
            <!--</a>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>-->
</header>
        <header></header>
        
<main>
    <div class="set_com">
        <a href="/member/Modifydata/self_data">
            <div class="set_top clear">
               <div class="set_headportrait lf header_img_box">
                 <img id="header_img" src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="__CDN_PATH__<?php echo isset($info['m_s_avatar']) ? $info['m_s_avatar'] :  ''; ?>">
               </div>
               <div class="set_text1 lf clear">
                  <div class="lf set_lf">
                      <!--  -->
                      <p class='p1'><?php echo $info['m_name']; ?></p>
                      <!--  -->
                      <p><?php echo $info['m_mobile']; ?></p>
                      <!--  -->
                   </div>
                 
               </div>
               <div class="set_more rt">
                 <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
               </div>
            </div>
        </a>
    </div>
    <div class="set_com">
        <a href="/member/address/index?thisinfo=1">
            <div class="set_address">
                <div class="set_list clear">
                    我的收货地址
                    <div class="set_more rt">
                        <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
                    </div>
                </div>
            </div>
        </a>  
    </div>
    <div class="set_com set_margin">
        <a href="pwd_set">
            <div class="set_address set_password">
                <div class="set_list clear">
                    密码设置
                    <div class="set_more rt">
                         <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php if($is_lord ==1): else: ?>
    <div class="set_com set_margin help">
            <a href="/member/modifydata/use_help/">
                <div class="set_address set_password">
                    <div class="set_list clear ">
                        使用与帮助
                        <div class="set_more rt">
                            <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endif; ?>
    <!--<div class="set_com">-->
        <!--<a href="/member/modifydata/feedback/">-->
            <!--<div class="set_address">-->
                <!--<div class="set_list clear">-->
                    <!--我要反馈-->
                    <!--<div class="set_more rt">-->
                         <!--<img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</a>  -->
    <!--</div>-->
    <div class="set_com">
        <a href="/member/modifydata/about/">
            <div class="set_address">
                <div class="set_list clear">
                    关于吖吖商城
                    <div class="set_more rt">
                         <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
                    </div>
                </div>
            </div>
        </a>  
    </div>
</main>
<!-- <a href="/member/login/out"> -->
    <div class="set_exit">
        退出当前账户
    </div>
<!-- </a> -->


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
<script src="__STATIC__/lib/layui/layui.js"></script>
<script src="__JS__/common/popups.js"></script>
<script type="text/javascript">
    // var vConsole = new VConsole();
    var ua = window.navigator.userAgent.toLowerCase();
    console.log(ua.match(/MicroMessenger/i))
    $(function(){
        if(ua.match(/MicroMessenger/i) == 'micromessenger'){
            //微信走这个
            // $(".set_exit").css('display','none');
            $(".set_exit").css({'backgroundColor':'#d5d5d5','cursor': 'no-drop!important;'});
            $(".set_exit").off()
            $(".set_exit").hide();
        }else{
            //其他环境走这个
            $(".set_exit").on('click',function(){
                layer.confirm("是否退出登录", {
                    title:false,/*标题*/
                    closeBtn: 0,
                    btnAlign: 'c',
                    btn: ['取消','退出'], //按钮
                    btn2:function(){ 
                        location.href="/member/login/out";
                    }
                })
            })
        }
　　})
    $.ajax({
        type:'post',
        url:'/api/Audit/audit_period',
        dataType:'json',
        success:function(data){
            console.log(data);
            var res=  $.parseJSON(data);
            console.log(res);
            if(res.data.status == 0){
                $('.help').hide()
            }
        }
    })
    
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>