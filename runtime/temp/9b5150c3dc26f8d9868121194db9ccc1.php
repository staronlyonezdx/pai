<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"D:\project\pai\public/../application/member/view/wallet/withdraw.html";i:1542617310;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543216456;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/conf_order.css">
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/withdraw.css">
<link rel="stylesheet" type="text/css" href="__CSS__/order_info/index.css">

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
        <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script>
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <script src="__JS__/login/loginsdk.js"></script>
        <!--web im sdk 登出 示例代码-->
        <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script>
        
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
           <!--<p class="withdraw_optfor lf">选择提现方式</p>-->
           <div class="withdraw_optfor lf">
           <?php if($info['m_bankaccount']==""): ?>
               <div class="withdraw_pop_text lf" style="width:100%">
                    <p>绑定银行卡</p>
                   <!--<span>约7个工作日到账</span>-->
               </div>
           <?php else: ?>
                <div class="withdraw_pop_lf lf">
                   <img src="__STATIC__/image/wallet/icon_yinlian@2x.png" alt="">
                </div>
                <div class="withdraw_pop_text lf">
                    <p><?php echo $info['m_bankname']; ?>(<?php echo $info['m_bankaccount']; ?>)</p>
                    <span>约7个工作日内到账</span>
                </div>
                <input type="hidden" name="bank_id" value="<?php echo $info['id']; ?>">
           <?php endif; ?>
           </div>
           <div class="withdraw_img rt">
               <img src="__STATIC__/image/wallet/jiantou.png" alt="">
           </div>
       </div>
   </div>
    <div class="withdraw_select withdraw_sum">
        <p>提现金额(收取<?php echo $info['fee1']*100; ?>%手续费)</p>
    </div>
        <div class="withdraw_select withdraw_ipt">
            <div class="withdraw_inp">
                <p>￥</p>
                <input type="number"  class='frozen' oninput="if(value.length>9)value=value.slice(0,9)" name="frozen">
            </div>
        </div>
    <input type="hidden" class="w_type" value="<?php echo $info['w_type']; ?>">
    <?php if($info['w_type']==1): ?>
        <div class="withdraw_money clear">
            账户余额 ￥<span><?php echo $info['m_money']; ?></span>
            <small class="rt">提现金额不得低于￥100</small>
        </div>
    <?php elseif($info['w_type']==2): ?>
    <div class="withdraw_money">账户余额 ￥<span><?php echo $info['m_income']; ?></span></div>
    <?php endif; ?>
    <a class="withdraw_btn withdraw_btn_bg wallet">
        确认提现
    </a>
    <div class="withdraw_protocol clear">
        <div class="withdraw_lf_img lf">
            <img src="__STATIC__/icon/publish/icon_weixuanze@2x.png" alt="" class="withdraw_img_dis" data="1" >
            <img src="__STATIC__/icon/publish/icon_yixuanze@2x.png" alt="" data="2">
        </div>
        <span class="lf">闪电提现一天内到账 [收取<?php echo $info['fee2']*100; ?>%手续费]</span>
    </div>
    <div class="withdraw_pop">
        <div class="withdraw_bottom">
            <div class="withdraw_tit clear">
                <!--<span>选择提现方式</span>-->
                <span>选择提现方式</span>
                <img src="__STATIC__/image/wallet/cancel910@2x.png" alt="" class="rt">
            </div>
            <!-- <div class="withdraw_pop_list">
                <div class="withdraw_pop_list_view clear">
                    <div class="withdraw_pop_con">
                        <div class="withdraw_pop_lf lf">
                            <img src="__STATIC__/image/wallet/zhifubao@2x.png" alt="">
                        </div>
                        <div class="withdraw_pop_text lf">
                            <p>提现至支付宝</p>
                            <span>推荐支付宝用户使用</span>
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
                        <div class="withdraw_pop_lf lf">
                            <img src="__STATIC__/image/wallet/weixin@2x.png" alt="">
                        </div>
                        <div class="withdraw_pop_text lf">
                            <p>提现至微信</p>
                            <span>推荐微信用户使用</span>
                        </div>
                    </div>
                    <div class="withdraw_pitch rt">
                        <img src="__STATIC__/image/wallet/xunazhong909@2x.png" alt="">
                    </div>
                </div>
            </div> -->
            <?php if(is_array($core) || $core instanceof \think\Collection || $core instanceof \think\Paginator): $i = 0; $__LIST__ = $core;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$core): $mod = ($i % 2 );++$i;?>
            <div class="withdraw_pop_list">
                <div class="withdraw_pop_list_view clear">
                    <div class="withdraw_pop_con">
                        <div class="withdraw_pop_lf lf">
                            <img src="__STATIC__/image/wallet/icon_yinlian@2x.png" alt="">
                        </div>
                        <div class="withdraw_pop_text lf">
                            <p><?php echo $core['bankname']; ?>(<?php echo $core['m_bankaccount']; ?>)</p>
                            <span>约7个工作日内到账</span>
                        </div>
                        <input type="hidden" name="bank_id" value="<?php echo $core['id']; ?>">
                    </div>
                    <?php if($core['m_main_card']==1): ?>
                    <div class="withdraw_pitch rt withdraw_pitch_dis">
                        <img src="__STATIC__/image/wallet/xunazhong909@2x.png" alt="">
                    </div>
                    <?php else: ?>
                        <div class="withdraw_pitch rt">
                            <img src="__STATIC__/image/wallet/xunazhong909@2x.png" alt="">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <a href="/member/wallet/bookCard">
                <div class="withdraw_pop_add">
                <div class="withdraw_pop_list_view  withdraw_add  clear">
                    <div class="withdraw_pop_lf lf">
                        <img src="__STATIC__/image/wallet/tianjia@2x.png" alt="">
                    </div>
                    <div class="withdraw_pop_text lf">
                        <p>绑定银行卡</p>
                    </div>
                    <div class="withdraw_pitch rt">
                        <img src="__STATIC__/image/wallet/xunazhong909@2x.png" alt="">
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
    <!--支付密码浮动层-->
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
                </p>
                <p class="withdraw_shouxufei">已扣除手续费<span></span></p>
            </div>
            <div class="inputBoxContainer" id="inputBoxContainer">
                <input type="tel" class="realInput" autofocus="autofocus"/>
                <div class="bogusInput">
                    <input type="password" maxlength="6" disabled class="active99"/>
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                </div>
            </div>
            <a href="/member/register/amnesia_payment">
                <p class="conf_forget">忘记密码</p>
            </a>
        </div>
        <div class="hbbj"></div>
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
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script>
      //四舍五入保留2位小数（不够位数，则用0替补）
    function keepTwoDecimalFull(num) {
        var result = parseFloat(num);
        if (isNaN(result)) {
        layer.msg('<span class="color:#fff">传递参数错误，请检查！</span>',{time:2000});
        return false;
        }
        result = Math.round(num * 100) / 100;
        var s_x = result.toString();
        var pos_decimal = s_x.indexOf('.');
        if (pos_decimal < 0) {
        pos_decimal = s_x.length;
        s_x += '.';
        }
        while (s_x.length <= pos_decimal + 2) {
        s_x += '0';
        }
        return s_x;
    }

    //实时去判断input的值
    $("input[name='frozen']").on("input propertychange",function(){
        var frozen=parseFloat($(this).val()).toFixed(2);
//        $(".recharge_price span").html(preval);
        clearNoNum(this);
    })
    //input只能输入小数点后两位
    function clearNoNum(obj){
        obj.value = obj.value.replace(/[^\d.]/g,"");
        obj.value = obj.value.replace(/\.{2,}/g,".");
        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
        obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3');
        if(obj.value.indexOf(".")< 0 && obj.value !=""){
            obj.value= parseFloat(obj.value);
        }
    }
    var w_type = "<?php echo $info['w_type']; ?>";
    if(w_type == 1){
        $(".header_tit span").html("余额提现");
    }else if(w_type == 2){
        $(".header_tit span").html("邀请所得提现");
    }
    //点击闪电提现
    $(".withdraw_lf_img").click(function(){
        $(this).children("img").eq(0).toggleClass("withdraw_img_dis");
        $(this).children("img").eq(1).toggleClass("withdraw_img_dis");
    })
    var con = "<?php echo $info['m_bankaccount']; ?>";
    // 点击确认提现
    $(".withdraw_btn_bg").click(function(){
        $(".realInput").val('')
        boxInput.setValue();
        if(con ==""){
            layer.msg("<span style='color:#fff'>暂未绑定银行卡，请前去绑定</span>",{
                time:2000
            });
            return false;
        }else{
            var m_income=$(".withdraw_money span").html();
            var is_urgent=$(".withdraw_lf_img").children(".withdraw_img_dis").attr("data");
            var frozen=Number($("input[name='frozen']").val());
            var w_type=<?php echo $info['w_type']; ?>;
            var m_income=$(".withdraw_money span").html();
            
            if(frozen!=""&&frozen>=100&&frozen<=m_income){
                $(".ftc_wzsf").show();
                if(is_urgent==1){
                    var shouxufei=frozen*(<?php echo $info['fee1']*100; ?>/100);
                    var jiner=frozen-shouxufei;
                    $(".all_money").html(keepTwoDecimalFull(jiner));
                    $(".withdraw_shouxufei span").text("￥"+keepTwoDecimalFull(shouxufei));
                }else if(is_urgent==2){
                    var shouxufei=frozen*(<?php echo $info['fee2']*100; ?>/100);
                    keepTwoDecimalFull(shouxufei);
                    var jiner=frozen-shouxufei;
                    console.log(jiner)
                    $(".all_money").html(keepTwoDecimalFull(jiner));
                    $(".withdraw_shouxufei span").text("￥"+keepTwoDecimalFull(shouxufei));
                }
                
            }
            if(frozen==""){
                layer.msg("<span style='color:#fff'>提现金额不能为空</span>",{
                    time:2000
                });
                return false;
            }
            if(frozen<100){
                layer.msg("<span style='color:#fff'>提现金额不能小于100</span>",{
                    time:2000
                });
                return false;
            }
            if(m_income<frozen){
                layer.msg("<span style='color:#fff'>提现金额不能大于账户余额</span>",{
                    time:2000
                });
                return false;
            }
           

        }
    })
    console.log("<?php echo $info['m_bankaccount']; ?>")
    //点击支付方式
    $(".withdraw").click(function(){
        if("<?php echo $info['m_bankaccount']; ?>"==""){
            window.location.replace("/member/wallet/bookCard");

        }else{
            $(".withdraw_pop").addClass("withdraw_pitch_dis");
        }
       
    })
    //点击支付方式的叉号
    $(".withdraw_tit img").click(function(){
        $(".withdraw_pop").removeClass("withdraw_pitch_dis");
    })
    //点击支付方式的选项
    $(".withdraw_pop_list").click(function(){
        $(".withdraw_pop_list").find(".withdraw_pitch").removeClass("withdraw_pitch_dis");
        $(this).find(".withdraw_pitch").addClass("withdraw_pitch_dis");
        var htm=$(this).find(".withdraw_pop_con").html();
        $(".withdraw_optfor").html(htm);
        $(".withdraw_pop").removeClass("withdraw_pitch_dis");
        $(".withdraw_btn").addClass("withdraw_btn_bg");
    });
    //关闭浮动
    $(".close").click(function () {
        $(".ftc_wzsf").hide();
        $(".mm_box li").removeClass("mmdd");
        $(".mm_box li").attr("data", "");
        i = 0;
        window.location.reload();
        // is_setorder();
    });
    boxInput.init(function () {
            var pawval = boxInput.getBoxInputValue();
            setTimeout(function () {
                var  m_payment_pwd = pawval;
                // 判断余额
                var $pay_money = parseFloat("<?php echo (isset($all_money) && ($all_money !== '')?$all_money:'0'); ?>");
                var $my_money = parseFloat("<?php echo (isset($mem_info['m_money']) && ($mem_info['m_money'] !== '')?$mem_info['m_money']:'0'); ?>");
                if ($pay_money > $my_money) {
                    // 失败提示
                    layer.msg("<span style='color:#fff'>余额不足，请充值</span>", {
                        time: 2000
                    });
                    return false;
                }
                var is_urgent=$(".withdraw_lf_img").children(".withdraw_img_dis").attr("data");
                var frozen=$("input[name='frozen']").val();
                var w_type=<?php echo $info['w_type']; ?>;
                var id=$("input[name='bank_id']").val();
                $.ajax({
                    url: "member/wallet/withdraw",
                    dataType: 'json',
                    type: 'POST',
                    data: {is_urgent: is_urgent, frozen: frozen,w_type:w_type,m_payment_pwd:m_payment_pwd,id:id},
                    success: function (data) {
                        if(data.status==0){
                            layer.msg("<span style='color:#fff'>"+data.msg+"</span>", {
                                time: 2000
                            });
                            $(".realInput").val('')
                            boxInput.setValue();
                            clear();
                        }
                        else{
                            console.log(data);
                            window.location.href = "/member/wallet/taking_money_result/w_id/"+data.data.w_id
                        }
                    }
                });
            }, 200);
        });
</script>

    <script>
        $(function(){
            webimLogin();
        })
    </script> 
</html>