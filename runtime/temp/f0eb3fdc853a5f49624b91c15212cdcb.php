<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\project\pai\public/../application/member/view/wallet/index.html";i:1542617310;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/goods/swiper.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/index.css">

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
        <header></header>
        <header></header>
        
<main>

    <!-- <div class="fail_tip">
        <span class="alert">!</span>
        <span class="alert_tip">您有一笔提现失败，快去看看吧！</span>
        <img src="__STATIC__/image/wallet/icon_go@2x.png" alt="">
    </div> -->
    <div class="header_nav">
        <div class="header_view">
            <div class="header_tit">
                <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
                <div class="header_back" onclick="backH5()" >
                    <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
                </div>
            </div>
        </div>
    </div>

    <div class="index_tab clear">
        <!--<div class="index_tab_list lf">-->
            <!--<div class="index_tab_line ">-->
                <!--<img src="__STATIC__/image/wallet/juxing1615@2x.png" alt="" class="index_tab_block">-->
            <!--</div>-->
            <!--<p>交易所得</p>-->
        <!--</div>-->
        <div class="index_tab_list lf">
            <div class="index_tab_line ">
                <img src="__STATIC__/image/wallet/line1615@2x.png" class="index_tab_block" alt="" >
            </div>
            <p>账户余额</p>
        </div>
        <div class="index_tab_list lf">
            <div class="index_tab_line ">
                <img src="__STATIC__/image/wallet/line21615@2x.png" alt="">
            </div>
            <p>我的收益</p>
        </div>

    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper ">
            <!--<div class="swiper-slide index_card_thr">-->
                <!--<div class="index_card_view clear">-->
                    <!--<div class="index_card_lf lf">-->
                        <!--<p>当前余额</p>-->
                        <!--<p>￥<span><?php echo $money['store_goodsmoney']; ?></span></p>-->
                    <!--</div>-->
                    <!--<a href="/member/wallet/goodsmoney_log">-->
                        <!--<div class="index_card_rt index_carf_red_rt rt">-->
                            <!--交易明细-->
                        <!--</div>-->
                    <!--</a>-->
                <!--</div>-->
                <!--<div class="index_card_text clear">-->
                    <!--<p class="lf">提现中金额   ￥ <span><?php echo $money['store_frozen_goodsmoney']; ?></span></p>-->

                <!--</div>-->
            <!--</div>-->
            <div class="swiper-slide index_card_one">
                <div class="index_card_view clear">
                    <div class="index_card_lf lf">
                        <p>可用余额</p>
                        <p>￥<span><?php echo $money['m_money']; ?></span></p>
                    </div>
                    <a href="/member/wallet/surplus_book">
                        <div class="index_card_rt rt">
                            余额明细
                        </div>
                    </a>

                </div>
                
                <div class="index_card_text">
                    <a href="/member/wallet/taking_money">
                        <p>提现中金额   ￥ <span><?php echo $money['m_frozen_money']; ?></span>
                            <img src="__STATIC__/image/wallet/icon_jump2@2x.png" alt="">
                        </p>
                    </a>
                </div>
            
            </div>
            <div class="swiper-slide index_card_two">
                <div class="index_card_view clear">
                    <div class="index_card_lf lf">
                        <p>可用余额</p>
                        <p>￥<span><?php echo $money['m_income']; ?></span></p>
                    </div>
                    <a href="/member/wallet/profit_book">
                        <div class="index_card_rt index_carf_red_rt rt">
                            收益明细
                        </div>
                    </a>
                </div>


                <!--<div class="is_promoters clear">-->
                    <!--<p >提现中金额￥<span><?php echo $money['m_frozen_income']; ?></span><img src="__STATIC__/image/wallet/icon_jump2@2x.png" alt=""></p>-->
                    <!--&lt;!&ndash;吖吖推广员审核阶段显示&ndash;&gt;-->
                    <!--<p class="dongjie">推广冻结金额￥<span class='dongjiezijin'></span><a href="/member/wallet/profit_book"style="color:white"><img src="__STATIC__/image/wallet/icon_jump2@2x.png" alt=""></a></p>-->
                    <!--<div class="wallet_help_text rt help" style="margin-top: -0.6rem">-->
                        <!--<img src="__STATIC__/image/wallet/icon_shuoming@2x.png" alt=""/>-->
                        <!--<span>帮助说明</span>-->
                    <!--</div>-->

                <!--</div>-->


                <div class="is_promoters2">
                    <!-- <div class="wallet_help_text rt help" style="margin-top: -0.5rem;margin-right: 0">
                        <img src="__STATIC__/image/wallet/icon_shuoming@2x.png" alt=""/>
                        <span>帮助说明</span>
                    </div> -->
                    <div class="clear">
                        <!-- <div class="lf" style="margin-top: 0.1rem">
                            <p>￥<span><?php echo $money['m_frozen_income']; ?></span></p>
                            <p style="margin-top: 0.1rem">提现中金额</p>
                            <img src="__STATIC__/image/wallet/icon_jump2@2x.png" alt="" class="more">
                        </div> -->
                        <a href="/member/wallet/profit_book">
                            <div style="margin-top: 0.1rem" class="clear">
                                <!-- <p>￥<span class="dongjiezijin"></span></p> -->
                                <p style="margin-top: 0.1rem;" class="lf">推广冻结金额&nbsp;&nbsp;&nbsp;￥<span class="dongjiezijin"></span></p>
                                <img src="__STATIC__/image/wallet/icon_jump2@2x.png" alt="" class="more">
                            </div>
                        </a>

                    </div>
                </div>

                <!-- <div class="index_card_text clear no_promoters">
                    <a href="/member/wallet/taking_money"> 
                        <p class="lf">提现中金额￥<span><?php echo $money['m_frozen_income']; ?></span>
                            <img src="__STATIC__/image/wallet/icon_jump2@2x.png" alt="">
                        </p>
                    </a>
                    <div class="wallet_help_text rt help">
                        <img src="__STATIC__/image/wallet/icon_shuoming@2x.png" alt=""/>
                        <span>帮助说明</span>
                    </div>
                </div> -->
            </div>

            <!--<div class="swiper-slide">4654654</div>-->
        </div>
    </div>
    <div class="index_cart_all">
        <!--交易所得开始-->
        <!-- <div class="index_action index_action_dis">
            <a href="/member/wallet/withdraw/w_type/1">
                <div class="index_action_list clear">
                    <div class="index_action_img lf">
                        <img src="__STATIC__/image/wallet/icon_tixian@2x.png" alt="">
                    </div>
                    <p class="lf">交易所得提现</p>
                    <div class="index_action_icon rt">
                        <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                    </div>
                </div>
            </a>
        </div> -->
        <!--交易所得结束-->
        <!--账户余额开始-->
        <div class="index_action index_action_dis">
            <a href="/member/wallet/recharge">
                <div class="index_action_list clear">
                    <div class="index_action_img lf">
                        <img src="__STATIC__/image/wallet/icon_chognzhi@2x.png" alt="">
                    </div>
                    <p class="lf">余额充值</p>
                    <div class="index_action_icon rt">
                        <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                    </div>
                </div>
            </a>
            
            <div class="index_action_list clear">
                <div class="qs"></div>
                <a href="/member/wallet/withdraw/w_type/1">
                    <div class="qc">
                        <div class="index_action_img lf">
                            <img src="__STATIC__/image/wallet/icon_tixian@2x.png" alt="">
                        </div>
                        <p class="lf">余额提现</p>
                        <!-- <div class="index_action_icon rt">
                            <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                        </div> -->
                    </div>
                </a>
            </div>
            
            <a href="/member/wallet/bookCard">
                <div class="index_action_list index_action_card clear">
                    <div class="index_action_img lf">
                        <img src="__STATIC__/image/wallet/icon_ka@2x.png" alt="">
                    </div>
                    <p class="lf">银行卡</p>
                    <div class="index_action_icon rt">
                        <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                    </div>
                </div>
            </a>
        </div>
        <!--账户余额结束-->

        <!--邀请所得开始-->
        <div class="index_action">
            <div class="wallet_show">
                <h3>沉淀资金分润收益</h3>
                <div class="wallet_show_con clear">
                    <div class="wallet_show_tab lf">
                        <p><?php echo isset($money['last_money']) ? $money['last_money'] :  0.00; ?></p>
                        <span>昨日收益(元)</span>
                    </div>
                    <div class="wallet_show_tab lf">
                        <p><?php echo isset($money['total_money']) ? $money['total_money'] :  0.00; ?></p>
                        <span>累计收益(元)</span>
                    </div>
                    <div class="wallet_show_tab lf">
                        <p><?php echo $money['rate']; ?></p>
                        <span>万份收益(元)</span>
                    </div>
                </div>
            </div>
            <div class="wallet_hint">
                <!--每日收益固定次日00:00生成流水到账-->
                每日收益固定次日00:00生成流水到账
                <img src="__STATIC__/image/wallet/icon_delete@2x.png" alt=""/>
            </div>
            <!-- <div class="index_action_list clear">
                <div class="index_action_img lf">
                    <img src="__STATIC__/image/wallet/icon_chognzhi2@2x.png" alt="">
                </div>
                <p class="lf">转出到百利账户</p>
                <div class="index_action_icon rt">
                    <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                </div>
            </div> -->
            <div class="index_action_list clear index_action_card">
                <!-- <div class="qs"></div> -->

                <a href="/member/tomoney/index">
                    <div class="qc">
                        <div class="index_action_img lf">
                            <img src="__STATIC__/image/wallet/icon_yue@2x.png" alt="">
                        </div>
                        <p class="lf">转入余额</p>
                        <div class="index_action_icon rt">
                            <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                        </div>
                        <span class="rt">可用于团购</span>
                    </div>
                </a>
            </div>
            <!-- <div class="index_action_list clear index_action_card">
                <div class="qs"></div>
                <a href="/member/wallet/withdraw/w_type/2">
                    <div class="qc">
                        <div class="index_action_img lf">
                            <img src="__STATIC__/image/wallet/icon_tixian@2x.png" alt="">
                        </div>
                        <p class="lf">收益提现</p> -->
                        <!-- <div class="index_action_icon rt">
                            <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                        </div> -->
                    <!-- </div>
                </a>
            </div> -->
            
            <a href="/member/wallet/bookCard">
            <div class="index_action_list clear action_line index_action_card"> 
                <div class="index_action_img lf">
                    <img src="__STATIC__/image/wallet/icon_ka@2x.png" alt="">
                </div>
                <p class="lf">银行卡</p>
                <div class="index_action_icon rt">
                    <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                </div>
            </div>
            </a>
            <!-- <a href="/member/wallet/bookCard">
                <div class="index_action_list index_action_card clear">
                    <div class="index_action_img lf">
                        <img src="__STATIC__/image/wallet/icon_yaoqing@2x.png" alt="">
                    </div>
                    <p class="lf">邀请好友</p>
                    <div class="index_action_icon rt">
                        <img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">
                    </div>
                    <div class="index_action_code rt">
                        <img src="__STATIC__/image/wallet/icon_erweima@2x.png" alt="">
                    </div>
                </div>
                </a> -->
            <!--<a href="<?php echo url('wallet/instructions'); ?>">-->
                <!--<div class="index_action_list index_action_card clear">-->
                    <!--<div class="index_action_img lf">-->
                        <!--<img src="__STATIC__/image/wallet/icon_shuo@2x.png" alt="">-->
                    <!--</div>-->
                    <!--<p class="lf">使用说明</p>-->
                    <!--<div class="index_action_icon rt">-->
                        <!--<img src="__STATIC__/image/wallet/icon_jump@2x.png" alt="">-->
                    <!--</div>-->
                <!--</div>-->
            <!--</a>-->
        </div>
        <!--邀请所得结束-->
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
<script type="text/javascript" src="__JS__/goods/swiper.min.js"></script>
<script>
    $(function(){
        var mySwiper = new Swiper('.swiper-container', {
            direction: 'horizontal',//滚动方向
            loop: false,//循环
            autoplay: false,//自动轮播
            slidesPerView :"1.2",//设置一页显示几个slide
            centeredSlides :true,//设定为true时，active slide会居中，而不是默认状态下的居左。
            onSlideChangeStart: function (swiper) {
                var index = swiper.activeIndex;
                $(".index_tab_list").find("img").removeClass("index_tab_block");
                $(".index_tab_list").eq(index).find("img").addClass("index_tab_block");
                $(".index_action").removeClass("index_action_dis");
                $(".index_action").eq(index).addClass("index_action_dis");
                var type = window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1);
                type = index;
                history.replaceState(null,null,type)
            },
        })
        function clic(){
            $(".index_tab_list").click(function(){
                var inde_=$(this).index();
                // console.log(inde_);
                $(".index_tab_list").find("img").removeClass("index_tab_block");
                $(this).find("img").addClass("index_tab_block");
                mySwiper.slideTo(inde_, 500, false);//切换到第一个slide，速度为1秒
                $(".index_action").removeClass("index_action_dis");
                $(".index_action").eq(inde_).addClass("index_action_dis");
                var type = window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1);
                type = inde_;
                history.replaceState(null,null,type)
            })
        }
        clic();
        var path = window.location.pathname;
        // console.log(path);
        if(path == '/member/wallet/index/type/1'){
            $(".index_tab_list").find("img").removeClass("index_tab_block");
            $(".index_tab_list").eq(1).find("img").addClass("index_tab_block");
            mySwiper.slideTo(1, 500, false);//切换到第一个slide，速度为1秒
            $(".index_action").removeClass("index_action_dis");
            $(".index_action").eq(1).addClass("index_action_dis");
        }
    })
    $(".index_yaoqing").click(function(){
        layer.confirm("邀请收益说明", {
            title:['邀请收益说明','color:#666666;font-size:0.24rem;margin-left:0.25rem;margin-right:0.25rem;border-bottom:0.01rem solid #e2e2e2!important;'],/*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            content: '<div id="lay_pop">\n' +
            '    <p style="color:#333333;font-size:0.26rem;text-align: left;">1. 邀请所得收益可用于在拍吖吖拍购使用邀请所得收益可用于在拍吖吖拍购使用。</p>\n' +
            '    <p style="color:#333333;font-size:0.26rem;text-align: left;margin-top: 0.2rem;">1. 邀请所得收益可用于在拍吖吖拍购使用邀请所得收益可用于在拍吖吖拍购使用。<a href="##" style="color:#4891EA;font-size: 0.24rem;">什么是诺丁百利？</a></p>\n' +
            '    <p style="color:#333333;font-size:0.26rem;text-align: left;margin-top: 0.2rem;">1. 邀请所得收益可用于在拍吖吖拍购使用邀请所得收益可用于在拍吖吖拍购使用。</p>\n' +
            '</div>\n',
            btn: '我知道啦~',

        })
    })
    $(".wallet_help_text").click(function(){
        $(".layui-layer-dialog .layui-layer-content").css({paddingTop:0});
        layer.confirm("",{
            title:['邀请收益说明','color:#666666;font-size:0.24rem;border-bottom:0.01rem solid #eee!important;margin-left:0.2rem;margin-right:0.2rem;'],/*标题*/
//        title:true,/*标题*/
            closeBtn:1,
            btnAlign: 'c',
            closeBtn: 0,
            btn:'我知道啦~',
            content:'<p style="text-align: left;color:#333333;font-size: 0.26rem;">1.收益可以转入余额在吖吖商城中使用哦！</p><p style="text-align: left;color:#333333;font-size: 0.26rem;">2.收益可以通过绑定银行卡直接提现哦！</p><p style="text-align: left;color:#333333;font-size: 0.26rem;">3.邀请所得收益也可以提现到个人银行卡，支付宝以及微信账户。</p> ',
        });
    })
    $(".wallet_hint img").click(function(){
        $(this).parent(".wallet_hint").remove();
    })
    $('.qs').click(function(){
        window.location.href = "/index/index/agreement/at_name/余额提现规则";
    })


    // 如果是吖吖会员，则显示冻结金额
    var is_dongjie = "<?php echo $promoters_info['is_show']; ?>";
    console.log(is_dongjie);
    if(is_dongjie == 0){
        $('.no_promoters').show();
        $('.is_promoters2').hide()
    }else if(is_dongjie == 1){
        $('.no_promoters').hide();
        $('.is_promoters2').show()

        var money_dongjie = "<?php echo $promoters_info['money']; ?>"
        $('.dongjiezijin').html(money_dongjie)

    }
    var header_path = "<?php echo isset($header_path) ? $header_path :  ''; ?>";
    //返回按钮
    function backH5() {        
        if(header_path != '') {
            window.location.href = header_path;
        }else {
            window.history.back();
        }
    }
</script>

</html>