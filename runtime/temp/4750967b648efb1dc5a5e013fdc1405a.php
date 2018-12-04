<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"D:\project\pai\public/../application/popularity/view/popularitygoods/my_attend.html";i:1541575155;s:69:"D:\project\pai\public/../application/popularity/view/common/base.html";i:1543216456;s:71:"D:\project\pai\public/../application/popularity/view/common/js_sdk.html";i:1541491295;}*/ ?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="full-screen" content="yes">
        <meta name="x5-fullscreen" content="true">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 viewport-fit=cover">
        <meta name="format-detection" content="telephone=no">
        <!--<link rel="stylesheet" type="text/css" href="__CSS__/mui/mui.min.css">-->
        <!-- <link rel="stylesheet" type="text/css" href="__CSS__/common/bootstrap.min.css"> -->

        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/larea.css">
        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/size.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/popups.css">
        
<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/participate/participate.css">
<link rel="stylesheet" type="text/css" href="__CSS__/stroe/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/my_attend/my_attend.css">
<link rel="stylesheet" type="text/css" href="__CSS__/order_info/index.css">

        <script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>
        <!--<script type="text/javascript" src="__JS__/zepto.min.js"></script>-->
        <script src="__JS__/common/rem.js"></script>
        <script src="__JS__/common/jquery_lazyload.js"></script>
        <script src="__JS__/common/lazyload.js"></script>
        <!--<script src="__JS__/mui/mui.min.js"></script>-->
        <!--<script src="__JS__/mui/mui.pullToRefresh.js"></script>-->
        <!--<script src="__JS__/mui/mui.pullToRefresh.material.js"></script>-->
        <script src="__JS__/common/site.js"></script>
        <script src="__JS__/common/larea.js"></script>
        <script src="__JS__/common/bootstrap.min.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
        <script src="__STATIC__/lib/layui/layui.js"></script>
        <script src="__JS__/common/popups.js"></script>
        <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script>
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <script src="__JS__/login/loginsdk.js"></script>
        <!--web im sdk 登出 示例代码-->
        <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script>
        
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
        <title></title>
    </head>
    <body>
        <header></header>
        
<main>
    <!--<div class="my_join_header">-->
        <!--<div class="left">-->
            <!--<span class="call_num"><?php if($pop_info['popularity']>100): ?>100<?php else: ?><?php echo $pop_info['popularity']; endif; ?></span>-->
            <!--<span class="call_info">当前剩余打气值</span><br>-->
            <!--<span class="date_info"></span>-->
            <!--<span class="call_fill">后恢复<?php echo $pop_info['add_pop']; ?>个打气值</span>-->
        <!--</div>-->
        <!--<img src="__STATIC__/image/popularitygoods/icon_tieshi@2x.png" alt="">-->
    <!--</div>-->

    <div class="my_header">

        <div class="my_header_left lf">
            <img src="__STATIC__/image/popularitygoods/icon_nav_back@2x.png" alt="" onClick="javascript:history.back();"
                 class="goback">
            <div style="margin-top: 0.54rem;margin-left: 0.3rem">
                <span class="call_num"><?php if($pop_info['popularity']>100): ?>100<?php else: ?><?php echo $pop_info['popularity']; endif; ?></span><br>
                <p class="call_info">当前剩余打气值</p><br>
                <span class="date_info"></span>
                <span class="call_fill">后恢复<?php echo $pop_info['add_pop']; ?>个打气值</span>
            </div>

        </div>
        <div class="my_header_right rt">
            <img src="__STATIC__/image/popularitygoods/pic_xiaotieshi2@2x.png" alt="">
            <div class="my_header_btns">
                <a href="javaScript:;" class="cantuan">去参团</a>
                <a href="javaScript:;" class="chongzhi">去充值</a>
            </div>

        </div>
    </div>
    <!--点击小贴士出现弹框-->
    <div class="tieshi_mark">
        <div class="alert_tieshi">
            <div class="alert_tieshi_header">
                <img src="__STATIC__/image/popularitygoods/icon_xiaotieshi@2x.png" alt="">
                <span class="tieshi_num">当前人气值: <?php if($pop_info['popularity']>100): ?>100<?php else: ?><?php echo $pop_info['popularity']; endif; ?></span>
                <span class="tieshi_date"><?php echo $pop_info['left_time']; ?></span>
                <span class="tieshi_fill">后恢复<?php echo $pop_info['add_pop']; ?>个打气值</span>
                <img src="__STATIC__/image/popularitygoods/icon_X@2x.png" alt="" class="click_cancle">

            </div>
            <div class="tieshi_content">
                <p>1、主动恢复（上限为50点，2者满足其一即可):<br>
                    ①在<span style="font-weight: 600;color:#333333;">拍吖吖普通场</span>每消费1元，人气值增加1点<br>
                    ②每充值1元，人气值增加1点。
                </p>
                <p>2、自动恢复：若打气值不足50点，则会慢慢恢复，每2小时恢复5点，上限50点。</p>
            </div>
            <div class="buttons">
                <a href="/member/wallet/recharge/">去充值</a>
                <a href="/index/index/">去参团</a>
            </div>
        </div>
    </div>
    <!--<div class='human'>-->
    <!--<p class='p1'>当前剩余人气值：34</p>-->
    <!--<a href="javascript;">小贴士</a>-->
    <!--</div>-->

    <div class="participate_tab clear" style="top:4.2rem">
        <div class="participate_tab_list participate_tab_color lf" i="0">
            <span class="fr">好友点赞</span>
        </div>
        <div class="participate_tab_list lf" i="1">
            <span class="lf">我的参团</span>
        </div>
        <div class="participate_tab_list lf" i="2">
            <span class="lf">我的标记</span>
        </div>
    </div>

    <!--轮播-->
    <div id="swiper" class="swiper-container" style="top:5.4rem">
        <div class="swiper-wrapper">
            <!--好友点赞-->
            <div id="mescroll0" class="swiper-slide mescroll">
                <div id="dataList0" class="data-list"></div>
            </div>
            <!--我的参团-->
            <div id="mescroll1" class="swiper-slide mescroll">
                <div id="dataList1" class="data-list">
                </div>
            </div>

            <!--我的标记-->
            <div id="mescroll2" class="swiper-slide mescroll">
                <div id="dataList2" class="data-list"></div>
            </div>
        </div>
    </div>
</main>

<!-- 支付密码浮动层 S -->
<div class="ftc_wzsf">
    <div class="srzfmm_box">
        <div class="qsrzfmm_bt clear_wl">
            <span class="">请输入支付密码</span>
            <img src="__STATIC__/image/orderpai/icon_nav_X@2x.png" class="tx close fr conf_order_colse">
        </div>
        <div class="zfmmxx_shop conf_order_paypassword_main clear">
            <p class="conf_order_hints">
                <span class="conf_order_fuhao">￥</span>
                <span class="all_money"></span>
                <input type="hidden" id="pm_id"/>
                <input type="hidden" id="pg_id"/>
                <input type="hidden" id="m_money"/>
            </p>
        </div>

        <div class="inputBoxContainer" id="inputBoxContainer">
            <input type="tel" class="realInput" autofocus="autofocus"/>
            <div class="bogusInput">
                <input type="password" maxlength="6" disabled class="active99"/>
                <input type="password" maxlength="6" disabled/>
                <input type="password" maxlength="6" disabled/>
                <input type="password" maxlength="6" disabled/>
                <input type="password" maxlength="6" disabled/>
                <input type="password" maxlength="6" disabled/>
            </div>
        </div>
        <div class="conf_order_paypassword_hint clear">
            <div class="conf_order_balance lf">当前余额
                <span> ￥ <small></small></span>
                <p class="lack_msg">余额不足请立即充值</p>
            </div>
            <a href="/member/wallet/recharge/r_jump_type/4/r_jump_id/1">
                <div class="conf_order_pay rt">充值</div>
            </a>
        </div>
        <a href="/member/register/amnesia_payment">
            <p class="conf_forget">忘记密码</p>
        </a>
    </div>
    <div class="hbbj"></div>
</div>
<!-- 支付密码浮动层 E -->

<!-- 支付成功弹窗 S -->
<div class="pay-success">
    <div class="pay-success-over"></div>
    <div class="pay-success-cont">
        <h3>支付成功 <span></span></h3>
        <img/>
        <p></p>
        <div><span class="lf">人气值：<small class="rqz"></small></span><span class="rt">排名：<small
                class="pm"></small></span></div>
        <small>快去邀请小伙伴为你点赞吧！</small>
        <a onclick="share(this,2)">邀请好友</a>
    </div>
</div>
<!-- 支付成功弹窗 E -->

<!-- 分享弹窗 S -->
<div class="share-pop">
    <div class="share-over"></div>
    <div class="share-tip"></div>
    <div class="share-cont">
        <img class="share-tit" src="__STATIC__/image/popularity/share-tit.png"/>
        <img class="share-code"/>
        <p>长按保存二维码到本地</p>
        <div data-clipboard-text="" class="share-link">直接分享</div>
        <div class="share-link-wx">直接分享</div>
    </div>
</div>
<!-- 分享弹窗 E -->

<!-- 安卓，ios分享效果 S -->
<div class="details_fenxiang">
    <div class="details_fxcon">
        <div class="details_fxtit">
            将商品分享至
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
<!-- 安卓，ios分享效果 E -->

<input type="hidden" id="app"/>
<input type="hidden" id="title"/>
<input type="hidden" id="imgUrl"/>
<input type="hidden" id="share_title"/>
<input type="hidden" id="share_desc"/>
<input type="hidden" id="share_link"/>
<input type="hidden" name="pm_id" value=""/>

        <footer></footer>
    </body>

    <!--bugtags 开始-->
    <!--<script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script>-->
    <!-- <script> -->
        <!-- // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本 -->
         <!-- //new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE'); -->
    <!-- </script> -->
    <!--bugtags 结束-->

    
<script src="__STATIC__/js/common/jweixin-1.2.0.js"></script>
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

//    var link = 'http://www.paiyy.com.cn/member/register/it_to_rg/phone/<?php echo isset($info['m_mobile']) ? $info['m_mobile'] :  ""; ?>';
    var link = '';
    var share_link = "<?php echo isset($share_link) ? $share_link :  ''; ?>";
    if($.trim(share_link)){
        link = share_link;
    }else{
        link = "<?php echo PAI_URL; ?>";
    }

    //var imgUrl = 'https://gss0.bdstatic.com/70cFsj3f_gcX8t7mm9GUKT-xh_/avatar/100/r6s1g4.gif';
    var imgUrl = '';
    var share_imgUrl = "<?php echo isset($share_imgUrl) ? $share_imgUrl :  ''; ?>";
    if($.trim(share_imgUrl)){
        imgUrl = share_imgUrl;
    }else{
        imgUrl = "<?php echo PAI_URL; ?>"+'/uploads/logo/1.jpg';
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
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script src="__STATIC__/js/clipboard.min.js"></script>
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script type="text/javascript" src="__JS__/md5.js"></script>
<script src="__JS__/participate/participate.js"></script>
<script src="__JS__/cookie/jquery.cookie.js"></script>
<script>
    $(function () {
        // console.log(<?php echo $pop_info['add_pop']; ?>)
        //点击小贴士出现弹框
        $('.my_join_header img').click(function () {
            $('.tieshi_mark').css('display', 'block');
            $('.alert_tieshi .alert_tieshi_header img.click_cancle').click(function () {
                $('.tieshi_mark').css('display', 'none');
            })
        })
        // 格式化时间
        var time = '<?php echo $pop_info['left_time']; ?>'
        var timerId;

        function formdate(date) {
            var hours = Math.floor(date / 3600);
            var leave1 = date % 3600;//计算小时数后剩余的毫秒数
            var minutes = Math.floor(leave1 / 60);
            var leave2 = leave1 % 60;//计算分钟数后剩余的毫秒数
            var seconds = Math.floor(leave2);
            if (hours < 9) {
                hours = "0" + hours;
            }
            if (minutes < 9) {
                minutes = "0" + minutes;
            }
            if (seconds < 9) {
                seconds = "0" + seconds;
            }
            time--;
            if (time < 0) {
                   clearInterval(timerId);
                window.location.reload();
            }
            // console.log(<?php echo $pop_info['left_time']; ?>);
            // console.log(hours, minutes, seconds);
            $('.my_header .my_header_left .date_info').html(hours + ':' + minutes + ':' + seconds)
            $('.alert_tieshi .alert_tieshi_header .tieshi_date').html(hours + ':' + minutes + ':' + seconds)
        }

        timerId = setInterval(function () {
            formdate(time)
        }, 1000)
        // 当人气值到达50的时候，提示自动恢复人气值到达上限，人气值到达100，则提示人气值已经到达上限
        var callNum = '<?php echo $pop_info['popularity']; ?>'
        // console.log(callNum);
        // if (callNum >= 50) {
        //     console.log(11);
        //     clearInterval(timerId)
        //     $('.my_join_header .left .date_info').html('您的自动恢复打气值已达上限')
        //     $('.alert_tieshi .alert_tieshi_header .tieshi_date').html('您的自动恢复打气值已达上限')
        //     $('.alert_tieshi .alert_tieshi_header .tieshi_fill').html('')
        //     $('.my_join_header .left .call_fill').html('')
        //     if (callNum >= 100) {
        //         clearInterval(timerId)
        //         console.log(22);
        //         $('.my_join_header .left .date_info').html('您的打气值已达上限')
        //         $('.alert_tieshi .alert_tieshi_header .tieshi_date').html('您的打气值已达上限')
        //         $('.alert_tieshi .alert_tieshi_header .tieshi_fill').html('')
        //         $('.my_join_header .left .call_fill').html('')
        //     }
        //
        // }
        if (callNum >= 50) {
            clearInterval(timerId);
            $('.my_header .my_header_left .date_info').html('');
            $('.my_header .my_header_left .call_fill').html('您的自动恢复打气值已达上限')
            if (callNum >= 100 ) {
                clearInterval(timerId);
                $('.my_header .my_header_left .date_info').html('');
                $('.my_header .my_header_left .call_fill').html('您的打气值已达上限')
            }
        }
    })



    $('.my_header_btns a').click(function(){
       //     console.log($(this).index());
           var index = $(this).index();
           if(index == 0){
               window.location.href = '/'
           }else if(index == 1){
               window.location.href = '/member/wallet/recharge'
           }
    })
</script>

    <script>
        $(function(){
            webimLogin();
        })
    </script> 
</html>