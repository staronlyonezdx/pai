<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"D:\project\pai\public/../application/member/view/myhome/recharge_peanut.html";i:1544431988;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1544154864;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/myhome/recharge.css">
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
</header>
        <header></header>
        
<main>
    <div class="recharge_main">
        <div class="recharge_num">
            现有花生数:<span><?php echo $peanut; ?></span>
        </div>
        <div class="recharge_con">
            <span>购买花生数:</span>
            <input type="number" value="5.00" name="r_money"/>
        </div>
        <div class="recharge_con_tab">
            <ul class="clear">
                <li class="lf">300颗</li>
                <li class="lf">200颗</li>
                <li class="lf">100颗</li>
                <li class="lf">50颗</li>
            </ul>
        </div>
        <div class="recharge_price">
            价值金额:<small style="margin-left:0.51rem;color:#FE3939">￥</small><span style="margin-left: 0">5.00</span>
        </div>
    </div>
    <div class="recharge_paylist">
        <div class="recharge_list clear recharge_yuer">
            <div class="recharge_bg"></div>
            <div class="recharge_inp lf">
                <!--<input type="hidden" name="paytype" value="5"/>-->
                <img src="__STATIC__/image/myhome/icon_weixuanze@2x.png" alt=""/>
            </div>
            <div class="recharge_payimg lf">
                <img src="__STATIC__/image/myhome/yuer@2x.png" alt=""/>
            </div>
            <div class="recharge_text lf">
                <p>余额支付</p>
                <span>当前账户余额￥<span class="recharge_list_price"><?php echo $m_money; ?></span></span>
            </div>
            <a href="/member/wallet/recharge/">
                <div class="recharge_chongzhi_btn rt">
                    充值
                </div>
            </a>
        </div>
        <div class="recharge_list clear widthdraw_gongzhonghao">
            <div class="recharge_inp lf">
                <!--<input type="hidden" name="paytype" value="1"/>-->
                <img src="__STATIC__/image/myhome/icon_weixuanze@2x.png" alt=""/>
            </div>
            <div class="recharge_payimg lf">
                <img src="__STATIC__/image/wallet/weixin@2x.png" alt=""/>
            </div>
            <div class="recharge_text lf">
                <p>微信公众号支付</p>
                <span>推荐微信用户使用 </span>
            </div>
        </div>
        <div class="recharge_list clear">
            <div class="recharge_inp lf">

                <img src="__STATIC__/image/myhome/icon_weixuanze@2x.png" alt=""/>
            </div>
            <div class="recharge_payimg lf">
                <img src="__STATIC__/image/wallet/weixin@2x.png" alt=""/>
            </div>
            <div class="recharge_text lf">
                <p>微信h5支付</p>
                <span>推荐微信用户使用 </span>
            </div>
        </div>
        <div class="recharge_list clear">
            <div class="recharge_inp lf">
                <!--<input type="hidden" name="paytype" value="3"/>-->
                <img src="__STATIC__/image/myhome/icon_weixuanze@2x.png" alt=""/>
            </div>
            <div class="recharge_payimg lf">
                <img src="__STATIC__/image/wallet/zhifubao@2x.png" alt=""/>
            </div>
            <div class="recharge_text lf">
                <p>支付宝支付</p>
                <span>推荐支付宝用户使用 </span>
            </div>
        </div>
        <input type="hidden" name="paytype" value="0"/>
        <!--<div class="recharge_list clear">-->
        <!--<div class="recharge_inp lf">-->
        <!--<input type="checkbox"/>-->
        <!--<img src="__STATIC__/image/myhome/icon_weixuanze@2x.png" alt=""/>-->
        <!--</div>-->
        <!--<div class="recharge_payimg lf">-->
        <!--<img src="__STATIC__/image/myhome/zhaoshang@2x.png" alt=""/>-->
        <!--</div>-->
        <!--<div class="recharge_text lf">-->
        <!--<p>银行卡支付</p>-->
        <!--<span>由拍吖吖钱包提供支付服务 </span>-->
        <!--</div>-->
        <!--</div>-->
    </div>
    <!-- <div class="recharge_agreen clear">
        <div class="recharge_agreen_img lf">
            <img src="__STATIC__/image/myhome/icon_weixuanze@2x.png" alt="" data="1"/>
            <img src="__STATIC__/image/myhome/icon_yixuanze@2x.png" alt="" class="recharge_agreen_disp" data="2"/>
        </div>
        <span class="lf">同意<a href="/index/index/agreement/at_name/花生使用协议">《拍吖吖花生使用协议》</a></span>
    </div> -->
    <div class="phonex anquan">
        <input type="submit" class="recharge_btn recharge_btn_yew"  value="安全支付">
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
                    <span class="all_money">54654</span>
                </p>
            </div>
            <!-- <ul class="mm_box">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul> -->
            <div class="inputBoxContainer" id="inputBoxContainer">
                <input type="tel" class="realInput" autofocus="autofocus"/>
                <div class="bogusInput">
                    <input type="password" maxlength="6" disabled class="active"/>
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
        <!-- <div class="numb_box">
            <ul class="nub_ggg">
                <li><a href="javascript:void(0);" class="zf_num">1</a></li>
                <li><a href="javascript:void(0);" class="zj_x zf_num">2</a></li>
                <li><a href="javascript:void(0);" class="zf_num">3</a></li>
                <li><a href="javascript:void(0);" class="zf_num">4</a></li>
                <li><a href="javascript:void(0);" class="zj_x zf_num">5</a></li>
                <li><a href="javascript:void(0);" class="zf_num">6</a></li>
                <li><a href="javascript:void(0);" class="zf_num">7</a></li>
                <li><a href="javascript:void(0);" class="zj_x zf_num">8</a></li>
                <li><a href="javascript:void(0);" class="zf_num">9</a></li>
                <li><a href="javascript:void(0);" class="zf_empty">清空</a></li>
                <li><a href="javascript:void(0);" class="zj_x zf_num">0</a></li>
                <li><a href="javascript:void(0);" class="zf_del"><img
                        src="__STATIC__/image/orderpai/icon_01@2x.png"></a></li>
            </ul>
        </div> -->
        <div class="hbbj"></div>
    </div>
</main>
<input type="hidden" id="r_id">
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
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script>
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

    /*余额不足的弹框的封装*/
    function huasheng_money(){
        layer.confirm("余额不足", {
            title:false,/*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            btn: ['去充值','其他充值方式'],
            btn1:function(){
                location.href="https://m.paiyy.com.cn/member/wallet/recharge";
            }
        })
    }
    //点击事件
    $(".recharge_bg").click(function(){
        huasheng_money();
        return false;
    })
    /*进入页面时判断input框的里数值是否大于账户余额*/
    var r_money=$("input[name='r_money']").val();
    if(r_money><?php echo $m_money; ?>){
        $(".recharge_bg").show();
    }else{
        $(".recharge_bg").hide();
    }
    /*点击花生的颗数*/
    $(".recharge_con_tab li").click(function(){
        var lival=parseFloat($(this).html()).toFixed(2);
        $("input[name='r_money']").val(lival);
        var r_money=$("input[name='r_money']").val();
        $(".recharge_price span").html(r_money);
        if(r_money><?php echo $m_money; ?>){
            $(".recharge_bg").show();
        }else{
            $(".recharge_bg").hide();
        }
    })
    //实时去判断input的值
    $("input[name='r_money']").on("input propertychange",function(){
        var  r_money=$("input[name='r_money']").val();
        var preval=parseFloat($(this).val()).toFixed(2);
        $(".recharge_price span").html(preval);
        if($(this).val()==""){
            $(".recharge_price span").html(0.00);
        }
        clearNoNum(this);
//      判断余额是否充足
        if(r_money><?php echo $m_money; ?>){
            $(".recharge_list").eq(0).find('.recharge_inp').children("img").attr("src","__STATIC__/image/myhome/icon_weixuanze@2x.png");
            $('input[name="paytype"]').val(0);
            $(".recharge_bg").show();
        }else{
            $(".recharge_bg").hide();
        }
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
    // 判断是否是微信浏览器
    $(document).ready(function () {
        var ua = navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == "micromessenger") {
            $(".recharge_list").css({display: "none"});
            $(".widthdraw_gongzhonghao").css({display: "block"});
            $(".recharge_yuer").css({display: "block"});
        } else {
            $(".recharge_list").css({display: "block"});
            $(".widthdraw_gongzhonghao").css({display: "none"});
            $(".recharge_yuer").css({display: "block"});
        }
    })
    //    选择支付方式
    $(".recharge_inp").click(function(){
        $(".recharge_inp").children("img").attr("src","__STATIC__/image/myhome/icon_weixuanze@2x.png");
        $(this).children("img").attr("src","__STATIC__/image/myhome/icon_yixuanze@2x.png");
        if($(this).parents(".recharge_list").index()==0){
            $(this).parents(".recharge_paylist").find("input").val("5");
        }else if($(this).parents(".recharge_list").index()==1){
            $(this).parents(".recharge_paylist").find("input").val("1");
        }else if($(this).parents(".recharge_list").index()==2){
            $(this).parents(".recharge_paylist").find("input").val("2").attr('data',6);
        }else if($(this).parents(".recharge_list").index()==3){
            $(this).parents(".recharge_paylist").find("input").val("3").attr('data',7);
        }else if($(this).parents(".recharge_list").index()==4){
            $(this).parents(".recharge_paylist").find("input").val("4");
        }
    });
    //    //如果余额为0.则标题变灰色
    //    var htm=$(".recharge_list_price").html();
    //    var val=parseFloat(htm);
    //    if(val==0){
    //        $(".recharge_list_price").parents().siblings("p").css({color:"#aaaaaa"});
    //    }
    //点击协议
    $(".recharge_agreen_img").on("click",function(){
        $(this).children("img").toggleClass("recharge_agreen_disp");
        $(".recharge_btn").toggleClass("recharge_btn_yew");
        if($(".recharge_agreen_disp").attr("data")==1){
            $(".recharge_btn").attr("disabled",true);
        }else{
            $(".recharge_btn").attr("disabled",false);
        }
    })
    //点击安全支付
    $(".recharge_btn").click(function(){
        var  r_money=$("input[name='r_money']").val();
        //判断输入数量
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
        var number=/^\d+\.?\d*$/;
        if(!number.test(r_money)){
            layer.msg("<span style='color:#fff'>只能输入数字或者小数哦</span>",{
                time:2000
            });
            return false;
        }
        if($(".recharge_paylist").find("input").val() == 0){
            layer.msg("<span style='color:#fff'>请选择充值方式</span>",{
                time:2000
            });
            return false;
        }
        $("input[name='r_money']").val('5.00');
        if($(".recharge_paylist").find("input").val()==5){
            //判断余额是否充足
            if(<?php echo $m_money; ?><r_money){
                $(".recharge_bg").show();
            }else{
                $(".recharge_bg").hide();
                $.ajax("/index/yuepay/is_has_paypwd",{
                    type:"POST",
                    dataType:"json",
                    data: {},
                    success:function(data){
                        if(data.status==1){
                            var money_val=$(".recharge_price span").html();
                            var r_money=$("input[name='r_money']").val();
                            var r_type=$(".recharge_paylist").find("input").val();
                            $(".ftc_wzsf").show();
                            $(".all_money").html(money_val);
                            $.ajax("/index/notify/addpayorder",{
                                dataType: 'json',//服务器返回json格式数据
                                type: 'POST',//HTTP请求类型
                                data: { r_money: r_money, r_type: r_type,r_for:2,r_jump_id:0,r_jump_type:3},
                                success:function(res){
                                    if(res.status==1){
                                        $('#r_id').val(res.r_id);
                                    }
                                }
                            })
                        }else{
                            layer.confirm("你还没有设置支付密码哦", {
                                title:false,/*标题*/
                                closeBtn: 0,
                                btnAlign: 'c',
                                btn: ['去设置','其他支付'],
                                btn1:function(){
                                    location.href="";
                                }
                            })
                        }
                    }
                })
            }
        }else{
            /*判断为其他支付时*/
            var r_money=$("input[name='r_money']").val();
            var r_type=$(".recharge_paylist").find("input").val();
            var ra_type=$(".recharge_paylist").find("input").attr('data');
            var data = '{"member_id": "'+<?php echo $m_id; ?>+'","r_money": "'+r_money+'","r_type": "'+ra_type+'","r_for": "2"}';
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
                            type: 'POST',//HTTP请求类型
                            data: { r_money: r_money, r_type: r_type,r_for:2,r_jump_id:0,r_jump_type:3},
                            success:function(data){
                                if(data.status==1){
                                    if ($(".recharge_paylist").find("input").val() == 1) {
                                        window.location.href ="https://m.paiyy.com.cn/index/notify/wx_jsapi_pay/r_id/"+data.r_id;
                                    } else if ($(".recharge_paylist").find("input").val()== 2) {
                                        window.location.href ="https://m.paiyy.com.cn/index/wxh5pay/wx_h5_pay/r_id/"+data.r_id;
                                    } else if ($(".recharge_paylist").find("input").val()== 3) {
                                        window.location.href ="https://m.paiyy.com.cn/index/aliwappay/ali_wap_pay/r_id/"+data.r_id
                                    } else if ($(".recharge_paylist").find("input").val() == 4) {
                                    }
                                }

                            }
                        })
                    }
                }else {
                    $.ajax("/index/notify/addpayorder",{
                        dataType: 'json',//服务器返回json格式数据
                        type: 'POST',//HTTP请求类型
                        data: { r_money: r_money, r_type: r_type,r_for:2,r_jump_id:0,r_jump_type:3},
                        success:function(data){
                            if(data.status==1){
                                if ($(".recharge_paylist").find("input").val() == 1) {
                                    window.location.href = "https://m.paiyy.com.cn/index/notify/wx_jsapi_pay/r_id/"+data.r_id;
                                } else if ($(".recharge_paylist").find("input").val()== 2) {
                                    window.location.href ="https://m.paiyy.com.cn/index/wxh5pay/wx_h5_pay/r_id/"+data.r_id;
                                } else if ($(".recharge_paylist").find("input").val()== 3) {
                                    window.location.href ="https://m.paiyy.com.cn/index/aliwappay/ali_wap_pay/r_id/"+data.r_id
                                } else if ($(".recharge_paylist").find("input").val() == 4) {
                                }
                            }

                        }
                    })
                }
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
                    window.location.href ="/member/wallet/recharge_success/r_id/"+val.rid;
                });
            }else {
                layer.msg("<span style='color:#fff'>"+ val.msg +"</span>",{
                    time:2000
                });
            }
        })
    })


    //关闭浮动
    $(".close").click(function () {
        $(".ftc_wzsf").hide();
        $(".mm_box li").removeClass("mmdd");
        $(".mm_box li").attr("data", "");
        i = 0;
        // is_setorder();
    });
    // //数字显示隐藏
    // $(".xiaq_tb").click(function () {

    //     $(".numb_box").slideUp(500);
    // });
    // $(".mm_box").click(function () {
    //     $(".numb_box").slideDown(500);
    // });
    // //点击数字
    // var i = 0;
    // $(".nub_ggg li .zf_num").click(function () {
    // //    var txt = $(this).text();
    //     if (i < 6) {
    // //        $(".mm_box li").eq(i).html(txt);
    // //        setTimeout(function () {
    // //            $(".mm_box li").eq(i - 1).html("");
    // //            $(".mm_box li").eq(i - 1).addClass("mmdd");
    // //        }, 100);
    //         $(".mm_box li").eq(i).addClass("mmdd");
    //         $(".mm_box li").eq(i).attr("data", $(this).text());
    //         i++
    //         if (i == 6) {
    //             setTimeout(function () {
    //                 var paypwd  = "";
    //                 $(".mm_box li").each(function () {
    //                     paypwd  += $(this).attr("data");
    //                 });
    //                 var r_money=$("input[name='r_money']").val();
    //                 var r_type=$(".recharge_paylist").find("input").val();
    //                 var r_id = $('#r_id').val();
    //                 $.ajax("/index/yuepay/checkpaypwd",{
    //                     dataType: 'json',//服务器返回json格式数据
    //                     type: 'POST',//HTTP请求类型
    //                     data: {r_money: r_money, r_type: r_type,r_for:2,paypwd:paypwd},
    //                     success:function(data){
    //                           if(data.status == 1) {
    //                               location.href="<?php echo PAI_URL; ?>"+"/index/yuepay/ypay/r_id/"+r_id
    //                           }else {
    //                               layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
    //                                   time:2000
    //                               });
    //                           }
    //                     }
    //                 })


    //             },200)

    //         }
    //     }
    // });
    // $(".nub_ggg li .zf_del").click(function () {
    //     if (i > 0) {
    //         i--
    //         $(".mm_box li").eq(i).removeClass("mmdd");
    //         $(".mm_box li").eq(i).attr("data", "");
    //     }
    // });
    // $(".nub_ggg li .zf_empty").click(function () {
    //     $(".mm_box li").removeClass("mmdd");
    //     $(".mm_box li").attr("data", "");
    //     i = 0;
    // });
    boxInput.init(function () {
        var pawval = boxInput.getBoxInputValue();
        setTimeout(function () {
            var paypwd  = pawval;
            var r_money=$("input[name='r_money']").val();
            var r_type=$(".recharge_paylist").find("input").val();
            var r_id = $('#r_id').val();
            $.ajax("/index/yuepay/checkpaypwd",{
                dataType: 'json',//服务器返回json格式数据
                type: 'POST',//HTTP请求类型
                data: {r_money: r_money, r_type: r_type,r_for:2,paypwd:paypwd},
                success:function(data){
                    if(data.status == 1) {
                        location.href="<?php echo PAI_URL; ?>"+"/index/yuepay/ypay/r_id/"+r_id
                    }else {
                        layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                            time:2000
                        });
                        $(".realInput").val('')
                        boxInput.setValue();
                    }
                }
            })
        },200)
    });
$('.recharge_chongzhi_btn ').click(function(){
    $("input[name='r_money']").val('5.00');
})
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>