<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"D:\project\pai\public/../application/member/view/wallet/bookcard.html";i:1543367779;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543280491;s:72:"D:\project\pai\public/../application/member/view/common/header_card.html";i:1542589248;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/bookcard.css">

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
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?>>
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>

</header>
        <header></header>
        
<main>
    <p class="jiebang">解绑银行卡</p>
    <?php if(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty())): ?>
    <div class="bookcard_view" onclick="check_open()">
        <div class="bookcard_img">
            <img src="__STATIC__/image/wallet/icon_nav_ka@2x.png" alt="">
        </div>
        <p>绑定银行卡</p>
        <span>绑定银行卡将用于账户充值提现等</span>
        <div class="bookcard_btn" onclick="check_open()"><i><img src="__STATIC__/image/wallet/icon_(.png" alt=""></i>绑定银行卡</div>
    </div>
    <?php else: ?>
        
    <div class="bankcard_box">
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bank): $mod = ($i % 2 );++$i;?>
        <div class="bookcard_yes">
            <!--<img src="__STATIC__/image/wallet/cardyes@2x.png" alt="" >-->
            <div class="bankcard_info clearfloat">
                <img src="__STATIC__/image/wallet/icon_yinlian@2x.png" alt="">
                <div class="bankcard_name">
                    <h3><?php echo $bank['m_bankname']; ?></h3>
                    <span>储蓄卡</span>
                </div>
            </div>
            <p>
                <span><?php echo substr($bank['m_bankaccount'] ,0,4); ?></span>
                <span><?php echo substr($bank['m_bankaccount'] ,5,4); ?></span>
                <span><?php echo substr($bank['m_bankaccount'] ,10,4); ?></span>
                <span><?php echo substr($bank['m_bankaccount'] ,15,4); ?></span>
            </p>
            <div class="bookcard_btn" onclick="check_open()"><i><img src="__STATIC__/image/wallet/icon_(.png" alt=""></i>绑定银行卡</div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
        
    <?php endif; ?>

    <div class="yzm-view">
        <div class="header_nav" >
            <div class="header_view">
                <div class="header_tit">
                    <div class="header_back" id="fanhui">
                        <img src="__STATIC__/icon/publish/icon_nav_back@2x.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="yzm-title">验证码</div>
        <div class="yzm-cont">为保障您的账户安全我们已向<span><?php echo $info['m_mobile']; ?></span>发送了验证码<br>请输入您收到的验证码</div>
        <div class="yzm-input">
            <input type="number" id="code" placeholder="请输入验证码" />
            <button class="bangdingcard_code">发送验证码</button>
        </div>
        <div class="yzm-btn">确定</div>
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
    var authentication = "<?php echo $info['authentication']; ?>"
    var bankcard_info = "<?php echo $bankcard_info; ?>";
    console.log(bankcard_info)
    if(bankcard_info==0){
        $('.jiebang').addClass('unbind-normal');
    }
    // var pops=window.sessionStorage.getItem("pop");
    $('.jiebang').off('click').on('click',function(){
        if(bankcard_info!=0){
            window.location.href='/member/wallet/untie_bank_card'
        }else{
            $(this).addClass('unbind-normal');
        }
    })
    //去绑定银行卡弹窗
    function check_open() {
        if(authentication == 1) {
            $('.bookcard_view').hide();
            $('.yzm-view').show();
            // $(".jiebang").hide();
        }else {
            // if(pops){
            //     $('.bookcard_view').hide();
            //     $('.yzm-view').show();
            // }else{
                layer.confirm("绑定银行卡<br>即可快速实名认证啦！", {
                    title: false, /*标题*/
                    closeBtn: 0,
                    btnAlign: 'c',
                    btn: ['再想想', '立即绑定'], //按钮
                    // 按钮2的回调
                    btn2: function () {
                        $('.bookcard_view').hide();
                        $('.yzm-view').show();
                    }
                })
            // }
        }
    }

    var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    //点击发送验证码
    $(".bangdingcard_code").click(function(){
        curCount=count;
        $('.bangdingcard_code').attr("disabled","true");
        $(".bangdingcard_code").css({background:"#F2F2F2",color:"#aaaaaa",border:"none"});
        $('.bangdingcard_code').text(curCount+"s后可重新发送");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
        $.ajax({
            type:"POST",//用post方式传输
            dataType:"JSON",//数据格式：JSON
            url:"/member/login/get_token ",//目标地址
            data:{
                mobile:<?php echo $info['m_mobile2']; ?>
            },
            success:function(res){
                console.log(res)
                $.ajax({
                    type:"post",
                    url:"/member/register/news_code",
                    data: {
                        m_mobile: <?php echo $info['m_mobile2']; ?>,
                        sms_checked_code:res.data
                    },
                    success: function(str){
                        layer.msg('<span style="color:#fff">'+ str.msg +'</span>',{time:2000});
                    }
                })
            }
        });

        
    })
    //timer处理函数
    function SetRemainTime(){
        if(curCount==0){
            window.clearInterval(InterValObj);//停止计时器
            $(".bangdingcard_code").css({background:"transparent",color:"#2B2B2B",border:"0.02rem solid #000000"});
            $(".bangdingcard_code").removeAttr("disabled");//启用按钮
            $(".bangdingcard_code").text("重新发送");
        }else{
            curCount--;
            $(".bangdingcard_code").css({background:"#F2F2F2",color:"#aaaaaa",border:"none"});
            $(".bangdingcard_code").text(curCount+"s后可重新发送");
        }
    }

    //隐藏发送验证窗口
    $('#fanhui').click(function(){
        $('.bookcard_view').show();
        $('.yzm-view').hide();
    })

    //校验验证码
    $('.yzm-btn').click(function(){
        if($('#code').val() == '') {
            layer.msg('<span style="color:#fff">'+ res.msg +'</span>',{time:2000});
            return false;
        }
        $.ajax({
            type:"post",
            url:"/member/wallet/checked_code",
            data: {
                verification: $('#code').val(),
                m_mobile: "<?php echo $info['m_mobile2']; ?>"
            },
            success: function(res){
                if(res.status == 1) {
                    console.log(window.location.pathname);
                    var path = window.location.pathname;
                    if(path == '/member/wallet/bookCard/from/1'){
                        // alert(11)
                        window.location.href = '/member/wallet/bindingCard/from/1';
                    }else{
                        // alert(22)
                        window.location.href = '/member/wallet/bindingCard';
                    }
                    $('#code').val('');
                }else {
                    layer.msg('<span style="color:#fff">'+ res.msg +'</span>',{time:2000});
                }
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