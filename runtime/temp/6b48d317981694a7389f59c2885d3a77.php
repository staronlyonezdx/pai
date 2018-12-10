<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\project\pai\public/../application/index/view/syuclub/index.html";i:1544192640;s:63:"D:\project\pai\public/../application/index/view/index/base.html";i:1544154864;s:66:"D:\project\pai\public/../application/index/view/common/js_sdk.html";i:1541491293;}*/ ?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="full-screen" content="yes">
        <meta name="x5-fullscreen" content="true">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 viewport-fit=cover">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/larea.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/size.css">
        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/popups.css">
        
<link rel="stylesheet" type="text/css" href="__STATIC__/css/syuclub/index.css">

        <script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>
        <script src="__JS__/common/rem.js"></script>
        <script src="__JS__/common/jquery_lazyload.js"></script>
        <script src="__JS__/common/lazyload.js"></script>
        <script src="__JS__/common/site.js"></script>
        <script src="__JS__/common/larea.js"></script>
        <!-- <script src="__JS__/common/bootstrap.min.js"></script> -->
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
        <script src="__STATIC__/lib/layui/layui.js"></script>
        <script src="__JS__/common/popups.js"></script>
        <!-- <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script> -->
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <!-- <script src="__JS__/login/loginsdk.js"></script> -->
        <!--web im sdk 登出 示例代码-->
        <!-- <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script> -->
        <title>首页</title>
    </head>
    <body>
        <header>
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span>登录晟域会员</span>
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >
            <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
        </div>
    </div>
</div>

</header>
        
<main>
    <div class="main">
        <div class="syuclub_view">
            <div class="syuclub_phone">
                <input type="number" placeholder="输入手机号" name="phone">
            </div>
            <div class="syuclub_pass clear">
                <input type="password" id="pwd" placeholder="密码" class="lf" name="password">
                <div class="syuclub_open rt">
                    <img src="__STATIC__/image/syuclub/icon_eye2@2x.png" alt="" class="show">
                    <img src="__STATIC__/image/syuclub/icon_eye1@2x.png" alt="">
                </div>
            </div>
            <p class="syuclub_text">必须为晟域用户才可登陆</p>
            <div class="syuclub_btn">
                <img src="__STATIC__/image/syuclub/icon_anniu@2x.png" alt="">
            </div>
        </div>
    </div>
    <div class="no_sy">
<div class="no_sy_alert">
    <div class="alert_content">您当前还不是晟域用户呦</div>
    <div class="close_alert">
    我知道了
    </div>

</div>
    </div>
</main>

        <footer></footer>
    </body>

    <!--bugtags 开始-->
    <!-- <script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script> -->
    <!-- <script> -->
        <!-- // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本 -->
        <!-- // new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE'); -->
    <!-- // </script> -->
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

//    var link = PAI_URL.'/member/register/it_to_rg/phone/<?php echo isset($info['m_mobile']) ? $info['m_mobile'] :  ""; ?>';
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
        imgUrl = "https://m.paiyy.com.cn"+'/uploads/logo/1.jpg';
    }
    wx.config({
      //  debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
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


    var isSy = "<?php echo $is_user; ?>";
    console.log(isSy);
    if(isSy == 1){
    // alert(11)
        $('.no_sy').show();
    }

$('.close_alert').click(function(){
    $('.no_sy').hide();
})

   $(".syuclub_open img").click(function(){
       $(this).toggleClass("show");
       $(this).siblings("img").toggleClass("show");
       if($("input[name='password']").attr("type")=="password"){
            $("input[name='password']").attr("type","text");
       }else{
            $("input[name='password']").attr("type","password");
       }
   });

   $(".syuclub_btn").click(function(){
       var phone=$("input[name='phone']").val();
       var password=$("input[name='password']").val();
       // console.log(phone, password);
       if(phone == ''){
           layer.msg("<span style='color:#fff'>输入手机号不能为空</span>", {
               time: 2000
           });
           return false;
       }
       if(password == '' ){
           layer.msg("<span style='color:#fff'>输入密码不能为空</span>", {
               time: 2000
           });
           return false;
       }
       $.ajax({
            type: 'post',
            url:"/index/syuclub/index",
            data: {m_mobile:phone,m_pwd:password},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if(data.status==1){
                    window.location.href = data.data;
                }else if(data.status == 0){
                    layer.msg("<span style='color:#fff'>"+ data.msg +"</span>", {
                        time: 2000
                    });
                }else if(data.status == 2){
                    layer.confirm("您当前还不是晟域用户呦", {
                        title: false,/*标题*/
                        closeBtn:0,
                        btnAlign: 'c',
                        btn: '返回拍吖吖',
                        btn1: function () {
                            location.href = "/";
                        }
                    })
                }
            }
       })  
   });





</script>



    <!-- 调用登陆的sdk -->
    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>