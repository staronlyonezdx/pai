<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"D:\project\pai\public/../application/member/view/wallet/taking_money_result.html";i:1542617310;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543280491;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/refund_info.css">
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/withdraw_success.css">
<link rel="stylesheet" type="text/css" href="__CSS__/tomoney/tomoneyresult.css">

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
        <?php if($info['w_state']==0): ?>
            <div class="refund_main">
                <div class="refund_view clear">
                    <div class="refund_img refund_two_img lf" style="margin-top: 0.26rem;">
                        <img src="__STATIC__/image/orderpai/icon_jindu2@2x.png">
                    </div>
                    <div class="refund_new lf">
                        <div class="refund_first">
                            <p>成功提交申请</p>
                            <span><?php echo $info['w_time']; ?></span>
                        </div>
                        <div class="success_list">
                            <p>平台处理中</p>
                            <span>约7个工作日内到账</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wallet_success_btn cancelbtn">
                取消申请
            </div>
        <?php elseif($info['w_state']==1): ?>
           <!-- 平台处理中 -->
           <div class="refund_main">
                <div class="refund_view clear">
                    <div class="refund_img refund_two_img lf" style="margin-top: 0.26rem;">
                        <img src="__STATIC__/image/orderpai/icon_jindu2@2x.png">
                    </div>
                    <div class="refund_new lf">
                        <div class="refund_first">
                            <p>平台处理中</p>
                            <span>约7个工作日内到账</span>
                        </div>
                        <div class="success_list">
                            <p>成功提交提现申请</p>
                            <span>2018.09.09 12：00</span>
                        </div>
                    </div>

                </div>
            </div>
            <a href="/">
                <div class="wallet_success_btn">
                    先去逛逛呗
                </div>
            </a>
        <?php elseif($info['w_state']==2): ?>
            <!-- 提现失败 -->
            <div class="tomoneyresult">
                    <div class="tomoneyresult_img">
                        <img src="__STATIC__/image/orderpai/icon_fail@2x.png" alt="">
                    </div> 
                    <p>提现失败!</p>
                    <div class="clear" style="padding-left:0.55rem;margin-top: 0.78rem;">
                        <span class="lf" style="margin-top:0;color:#333333;">失败原因:</span><small class="lf" style="width:5.5rem;margin-left: 0.23rem;color:#333333;">经拍吖吖核实，由于您的收益来源通过非法手段，予以不通过处理。还请通过正常途径参与平台活动。</small>
                    </div>
                </div>
        <?php elseif($info['w_state']==4): ?>
        <div class="tomoneyresult">
                <div class="tomoneyresult_img">
                    <img src="__STATIC__/image/orderpai/icon_fail@2x.png" alt="">
                </div> 
                <p>提现失败!</p>
                <div class="clear" style="padding-left:0.55rem;margin-top: 0.78rem;">
                    <span class="lf" style="margin-top:0;color:#333333;font-size: 0.26rem;">失败原因:</span><small class="lf" style="width:5.6rem;margin-left: 0.2rem;color:#333333;font-size: 0.26rem;">您的开户行填写错误，请重新填写下卡开户行。</small>
                </div>
                <div style="text-align: center;margin-top: 0.35rem;font-size: 0.32rem;color: #333333;font-weight: 600;">6225********5676</div>
                <div style="padding-left: 0.5rem;margin-top: 0.47rem;" class="clear" >
                    <span class="lf" style="margin-top: 0;color:#333333;font-size: 0.28rem;color:#333333;font-weight: 600;">开户行:</span>
                    <input type="text" name="openingBack" class="lf" style="vertical-align: middle;width:5.6rem;border-bottom:1px solid #f2f2f2;text-indent: 0.25rem;padding-bottom: 0.18rem;" placeholder="请输入正确的开户行">
                </div>
                <div style="padding-left: 0.5rem;">
                    <p style="color:#aaaaaa;font-size: 0.24rem;text-align: left;font-weight: 400;">如何查询开户行？</p>
                    <div class="clear" style="margin-top: 0.17rem;">
                        <span class="lf" style="margin-top:0;color:#aaaaaa;font-size: 0.26rem;">方法一:</span><small class="lf" style="width:5.8rem;margin-left: 0.2rem;color:#aaaaaa;font-size: 0.24rem;">找到银行卡背后服务电话，拨打服务电话查询。 </small>
                    </div>
                    
                    <div class="clear" style="margin-top: 0.21rem;">
                        <span class="lf" style="margin-top:0;color:#aaaaaa;font-size: 0.26rem;">方法二: </span><small class="lf" style="width:5.8rem;margin-left: 0.2rem;color:#aaaaaa;font-size: 0.24rem;">打开银行网站（例如泰隆银行就打开泰隆银行网站）；<br>登录自己的网银账号密码；<br>找到我的账户 ——账务查询——账户开户信息查询。</small>
                    </div>
                </div>
                <!-- <div class="clear" style="padding:0 0.3rem;margin-top: 0.64rem;">
                    <div class="lf cancelbtn" style="width:3.24rem;border:0.02rem solid #000000;border-radius: 0.18rem;height:0.84rem;line-height: 0.84rem;text-align: center;font-weight: 600;font-size: 0.32rem;">
                        取消申请
                    </div>
                    <div class="rt tomoneyresult_btn" style="width:3.28rem;margin-top: 0;font-size: 0.32rem;">
                        重新提交
                    </div>
                </div> -->
                <div class="tomoneyresult_btn tomoneyresult_again_btn">
                    重新提交
                </div>
                <div class="clear" style="width:3.88rem;margin:0 auto;margin-top:0.42rem;">
                    <img src="__STATIC__/image/tomoney/icon_kf@2x.png" alt="" style="width:0.36rem;height:0.36rem;vertical-align: middle;" class="lf">
                    <span class="lf" style="margin-top: 0;">联系客服，咨询时间9:00～22:00</span>
                </div>
        </div>
            <!-- 提现失败 -->
            
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
    $(function(){
        console.log('<?php echo $info['w_id']; ?>');
        $(".cancelbtn").click(function(){
            layer.confirm("取消申请后提现金额将立即返还到您的收益金额，如需提现可重新申请。", {
                title: false, /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['我在想想','确定取消'], 
                btn2: function () {
                    window.location.replace("/member/wallet/cancel_money/w_id/<?php echo $info['w_id']; ?>")
                }
            })
        })

        
        $(".tomoneyresult_again_btn").click(function(){
            var bank_branch=$("input[name='openingBack']").val();
                window.location.replace("/member/wallet/resubmit_Apply/w_id/<?php echo $info['w_id']; ?>/bank_branch/"+bank_branch)
        })
    })
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>