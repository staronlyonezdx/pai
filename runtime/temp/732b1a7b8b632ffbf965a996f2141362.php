<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"D:\project\pai\public/../application/popularity/view/popularityorder/order_list.html";i:1543564718;s:69:"D:\project\pai\public/../application/popularity/view/common/base.html";i:1543280491;s:71:"D:\project\pai\public/../application/popularity/view/common/js_sdk.html";i:1541491295;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/goods/my_publish1.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goods/search_index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/stroe/index.css">
 
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
        <!-- <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script> -->
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <!-- <script src="__JS__/login/loginsdk.js"></script> -->
        <!--web im sdk 登出 示例代码-->
        <!-- <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script> -->
        
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
        <title></title>
    </head>
    <body>
        <header></header>
        
<main>
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

    <!-- 搜索框 S -->
    <div class="my_goods_search_img">
        <img src="__STATIC__/image/goods/icon_nav_sousuo@2x.png" alt=""/>
    </div>
    <!-- 搜索框 E -->

    <!-- 切换订单列表 S -->
    <div class="nav-over"></div>
    <div class="nav-down"><span>人气购订单</span></div>
    <div class="nav-cont">
            <small data="1">吖吖订单</small>
            <small data="2">人气购订单</small>
            <small data="3">积分订单</small>
        <!-- <a href="/member/orderpai/orderlist">吖吖订单</a>
        <a class="active">人气购订单</a>
        <a href="/pointpai/Pointorder/orderlist">积分订单</a> -->
    </div>
    <!-- 切换订单列表 E -->

    <!-- <form action="/popularity/popularityorder/order_search" method="post"> -->
        <div class="index_search_pop">
            <!--搜索框-->
            <div class="index_search_pop_top clear">
                <div class="index_pop_text lf">
                    <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" alt=""/>
                </div>
                <div class="index_search_pop_view clear lf">
                    <div class="index_search_lfimg" class="lf">
                        <img src="__STATIC__/image/index/searchbar_icon_search@2x.png">
                    </div>
                    <input type="text" name="keyword" class="index_pop_inp lf">

                    <div class="index_search_cancel rt">
                        <img src="__STATIC__/image/index/icon_search_clear@2x.png" alt="">
                    </div>
                </div>
                <a class="index_pop_sousuo rt"> 搜索</a>
            </div>
            <?php if(!(empty($searchs['self']) || (($searchs['self'] instanceof \think\Collection || $searchs['self'] instanceof \think\Paginator ) && $searchs['self']->isEmpty()))): ?>
            <!--历史搜索-->
            <div class="index_pop_history_view history">
                <div class="index_pop_history clear">
                    <p class="lf">历史搜索</p>

                    <div class="rt del_search">清除</div>
                </div>
                <div class="index_pop_history_main clear">
                    <?php if(is_array($searchs['self']) || $searchs['self'] instanceof \think\Collection || $searchs['self'] instanceof \think\Paginator): $i = 0; $__LIST__ = $searchs['self'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="lf"><?php echo $vo; ?></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <!--搜索出的列表-->
            <div class="index_pop_search_main">
                <ul class="index_pop_search_ul">

                </ul>
            </div>
        </div>
    <!-- </form> -->
    
    <!--我团中的 导航-->
    <!--菜单 需加上mescroll-touch-x,原因: http://www.mescroll.com/qa.html#q10 -->
    <div class="top-nav">
        <div class="scrollx mescroll-touch-x">
            <div id="scrollxContent" class="scrollx-content">
                <ul id="nav" class="nav wd">
                    <li i="0"><span>全部</span></li>
                    <li i="1"><span>进行中</span></li>
                    <li i="2"><span>待确认</span></li>
                    <li i="3"><span>待收货</span></li>
                    <li i="4"><span>已结束</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!--轮播-->
    <div id="swiper" class="swiper-container">
        <div id="swiperWrapper" class="swiper-wrapper">

            <!--全部-->
            <div id="mescroll0" class="swiper-slide mescroll">
                <ul id="dataList0" class="data-list">
                </ul>
            </div>

            <!--进行中-->
            <div id="mescroll1" class="swiper-slide mescroll">
                <ul id="dataList1" class="data-list"> </ul>
            </div>

            <!--待发货-->
            <div id="mescroll2" class="swiper-slide mescroll">
                <ul id="dataList2" class="data-list"> </ul>
            </div>

            <!--待收货-->
            <div id="mescroll3" class="swiper-slide mescroll">
                <ul id="dataList3" class="data-list"> </ul>
            </div>

            <!--已结束-->
            <div id="mescroll4" class="swiper-slide mescroll">
                <ul id="dataList4" class="data-list"> </ul>
            </div>

        </div>
    </div>

    <!-- 分享弹窗 S -->
    <div class="share-pop">
        <div class="share-over"></div>
        <div class="share-tip"></div>
        <div class="share-cont">
            <img class="share-tit" src="__STATIC__/image/popularity/share-tit.png" />
            <img class="share-code" />
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

    <input type="hidden" id="app" />
    <input type="hidden" id="title" />
    <input type="hidden" id="imgUrl" />
    <input type="hidden" id="share_title" />
    <input type="hidden" id="share_desc" />
    <input type="hidden" id="share_link" />
    <input type="hidden" name="pm_id" value="" />
</main>

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
<script src="__STATIC__/js/clipboard.min.js"></script>
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script type="text/javascript" src="__JS__/md5.js"></script>
<script type="text/javascript" src="__JS__/cookie/jquery.cookie.js"></script>
<script type="text/javascript" charset="utf-8">

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

    function call(tel) {
        var data = '{"tel": "'+ tel +'"}'
        setupWebViewJavascriptBridge(function(bridge) {
            /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
            bridge.callHandler('call_tel',data);
        })
    }

    var header_path = "<?php echo isset($header_path) ? $header_path :  ''; ?>";
    //返回按钮
    function backH5() {
      
            window.history.go(-1);
       
    }
   
    //点击搜索
    $(".index_pop_sousuo").click(function(){
        var keyword=$("input[name='keyword']").val();
        // var typ=$("input[name='type']").val();
        // console.log(keyword);
        // console.log(typ);
        window.location.href="/popularity/popularityorder/order_search/keyword/"+keyword;
    })
    //切换订单列表
    $('.nav-down span').click(function(){
        $('.nav-cont').toggle();
        $('.nav-down span').toggleClass('sel');
        $('.nav-over').toggle();
    });
    $('.nav-over').click(function(){
        $('.nav-cont').toggle();
        $('.nav-down span').toggleClass('sel');
        $('.nav-over').toggle();
    });
    $('.nav-cont').click(function(){
        $('.nav-cont').toggle();
        $('.nav-down span').toggleClass('sel');
        $('.nav-over').toggle();
    });
    
    $(".nav-cont small").click(function(){
        if($(this).attr("data")==1){
            window.location.replace("/member/orderpai/orderlist");
        }else if($(this).attr("data")==2){
            window.location.replace("/popularity/popularityorder/order_list");
        }else if($(this).attr("data")==3){
            window.location.replace("/pointpai/Pointorder/orderlist");
        }
        
    })
    // 毫秒数转标准时间
    function msToDate (msec) {
        var datetime = new Date(msec);
        var year = datetime.getFullYear();
        var month = datetime.getMonth();
        var date = datetime.getDate();
        var hour = datetime.getHours();
        var minute = datetime.getMinutes();
        var second = datetime.getSeconds();

        var result0 = year + 
                    '-' + 
                    ((month + 1) >= 10 ? (month + 1) : '0' + (month + 1)) + 
                    '-' + 
                    ((date + 1) < 10 ? '0' + date : date) + 
                    ' ' + 
                    ((hour + 1) < 10 ? '0' + hour : hour) +
                    ':' + 
                    ((minute + 1) < 10 ? '0' + minute : minute);

        var result1 = year + 
                    '-' + 
                    ((month + 1) >= 10 ? (month + 1) : '0' + (month + 1)) + 
                    '-' + 
                    ((date + 1) < 10 ? '0' + date : date) + 
                    ' ' + 
                    ((hour + 1) < 10 ? '0' + hour : hour) +
                    ':' + 
                    ((minute + 1) < 10 ? '0' + minute : minute) + 
                    ':' + 
                    ((second + 1) < 10 ? '0' + second : second);

        var result2 = year + 
                    '-' + 
                    ((month + 1) >= 10 ? (month + 1) : '0' + (month + 1)) + 
                    '-' + 
                    ((date + 1) < 10 ? '0' + date : date);

        var result = {
            wasTime: result0,
            hasTime: result1,
            withoutTime: result2
        };
        return result;
    }

    $(function () {
        $(".my_goods_search_img").click(function(){
            $(".index_search_pop").addClass("index_pop_block");
            $(".index_search_pop_view input").focus();
        })
        //点击叉号
        $(".index_search_cancel").click(function () {
            $(this).siblings("input").val("");
            $(this).siblings("input").focus();
            $(".index_pop_search_li").css({ display: "block" });
        })
        //点击取消
        $(".index_pop_text").click(function () {
            $(".index_search_pop").removeClass("index_pop_block");
        })

        //订单类型
        var t = "<?php echo $i; ?>";

        $('#nav').find('li').eq(t).addClass('active');

        //导航菜单        
        var mescrollArr = new Array(6);//每个菜单对应一个mescroll对象
        
        //当前菜单下标
        var curNavIndex = t;

        //初始化首页
        mescrollArr[t] = initMescroll(t);

        /*初始化轮播*/
        var swiper = new Swiper('#swiper', {
            initialSlide: t,
            onTransitionEnd: function (swiper) {
                var i = swiper.activeIndex;//轮播切换完毕的事件
                changePage(i);
            }
        });

        /*菜单点击事件*/
        $("#nav li").click(function () {
            var i = Number($(this).attr("i"));
            window.location.replace('/popularity/popularityorder/order_list/i/' + i);
            swiper.slideTo(i);//以轮播的方式切换列表
        })

        $("#nav li").each(function (n, dom) {
            if (dom.getAttribute("i") == t) {
                curNavDom = dom;
            } 
        });
        //菜单项居中动画
        var scrollxContent = document.getElementById("scrollxContent");
        var star = scrollxContent.scrollLeft;//当前位置
        var end = curNavDom.offsetLeft + curNavDom.clientWidth / 2 - document.body.clientWidth / 2; //居中
        mescrollArr[curNavIndex].getStep(star, end, function (step, timer) {
            scrollxContent.scrollLeft = step; //从当前位置逐渐移动到中间位置,默认时长300ms
        });

        /*切换列表*/
        function changePage(i) {
            if (curNavIndex != i) {
                //更改列表条件
                var curNavDom;//当前菜单项
                $("#nav li").each(function (n, dom) {
                    if (dom.getAttribute("i") == i) {
                        dom.classList.add("active");
                        curNavDom = dom;
                    } else {
                        dom.classList.remove("active");
                    }
                });
                //菜单项居中动画
                var scrollxContent = document.getElementById("scrollxContent");
                var star = scrollxContent.scrollLeft;//当前位置
                var end = curNavDom.offsetLeft + curNavDom.clientWidth / 2 - document.body.clientWidth / 2; //居中
                mescrollArr[curNavIndex].getStep(star, end, function (step, timer) {
                    scrollxContent.scrollLeft = step; //从当前位置逐渐移动到中间位置,默认时长300ms
                });
                //隐藏当前回到顶部按钮
                mescrollArr[curNavIndex].hideTopBtn();
                //取出菜单所对应的mescroll对象,如果未初始化则初始化
                if (mescrollArr[i] == null) {
                    mescrollArr[i] = initMescroll(i);
                } else {
                    //检查是否需要显示回到到顶按钮
                    var curMescroll = mescrollArr[i];
                    var curScrollTop = curMescroll.getScrollTop();
                    if (curScrollTop >= curMescroll.optUp.toTop.offset) {
                        curMescroll.showTopBtn();
                    } else {
                        curMescroll.hideTopBtn();
                    }
                }
                //更新标记
                curNavIndex = i;
            }
        }

        /*创建MeScroll对象*/
        function initMescroll(index) {
            //创建MeScroll对象,内部已默认开启下拉刷新,自动执行up.callback,刷新列表数据;
            var mescroll = new MeScroll("mescroll" + index, {
                //下拉刷新
                down: {
                    isLock: true, //锁定下拉
                },
                //上拉加载的配置项
                up: {
                    callback: getListData, //上拉回调,此处可简写; 相当于 callback: function (page) { getListData(page); }
                    isBounce: false, //此处禁止ios回弹,解析(务必认真阅读,特别是最后一点): http://www.mescroll.com/qa.html#q10
                    noMoreSize: 4, //如果列表已无数据,可设置列表的总数量要大于半页才显示无更多数据;避免列表数据过少(比如只有一条数据),显示无更多数据会不好看; 默认5
                    empty: {
                        icon: "/static/image/participate/no-content.png", //图标,默认null
                        tip: "当前暂未订单信息，吖吖狠伤心~", //提示
                        btntext: "先去逛逛", //按钮,默认""
						btnClick: function(){
                            //点击按钮的回调,默认null
							window.location.href = "/popularity/popularitygoods/share_list";
						},
                    },
                    clearEmptyId: "dataList" + index,
                    htmlLoading: '<p class="upwarp-progress mescroll-rotate"></p><p class="upwarp-tip">加载中..</p>', //上拉加载中的布局
                    htmlNodata: '<p class="upwarp-nodata">我是有底线的~</p>', //无数据的布局
                    toTop: { //配置回到顶部按钮
                        src: "/static/image/application/mescroll-totop.png", //默认滚动到1000px显示,可配置offset修改
                        //offset : 1000
                    }
                }
            });
            return mescroll;
        }

        /*联网加载列表数据  page = {num:1, size:10}; num:当前页 从1开始, size:每页数据条数 */
        function getListData(page) {
            //联网加载数据
            var dataIndex = curNavIndex; //记录当前联网的nav下标,防止快速切换时,联网回来curNavIndex已经改变的情况;
            getListDataFromNet(dataIndex, page.num, page.size, function (pageData) {
                //联网成功的回调,隐藏下拉刷新和上拉加载的状态;
                //mescroll会根据传的参数,自动判断列表如果无任何数据,则提示空;列表无下一页数据,则提示无更多数据;
                //console.log("dataIndex="+dataIndex+", curNavIndex="+curNavIndex+", page.num="+page.num+", page.size="+page.size+", pageData.length="+pageData.length);

                //方法一(推荐): 后台接口有返回列表的总页数 totalPage
                //mescrollArr[dataIndex].endByPage(pageData.length, totalPage); //必传参数(当前页的数据个数, 总页数)

                //方法二(推荐): 后台接口有返回列表的总数据量 totalSize
                //mescrollArr[dataIndex].endBySize(pageData.length, totalSize); //必传参数(当前页的数据个数, 总数据量)

                //方法三(推荐): 您有其他方式知道是否有下一页 hasNext
                //mescrollArr[dataIndex].endSuccess(pageData.length, hasNext); //必传参数(当前页的数据个数, 是否有下一页true/false)

                //方法四 (不推荐),会存在一个小问题:比如列表共有20条数据,每页加载10条,共2页.如果只根据当前页的数据个数判断,则需翻到第三页才会知道无更多数据,如果传了hasNext,则翻到第二页即可显示无更多数据.
                mescrollArr[dataIndex].endSuccess(pageData.length);

                //设置列表数据
                setListData(pageData, dataIndex);
            }, function () {
                //联网失败的回调,隐藏下拉刷新和上拉加载的状态;
                mescrollArr[dataIndex].endErr();
            });
        }

        /*设置列表数据
         * pageData 当前页的数据
         * dataIndex 数据属于哪个nav */
        function setListData(pageData, dataIndex) {
            
            var listDom = document.getElementById("dataList" + dataIndex);
            for (var i = 0; i < pageData.length; i++) {
                var pd = pageData[i];
                var fh = '';
                var bt = '';               
                var img='';
                var dizhi="";
              
                if(pd.pm_state == 2) {
                    fh = '<span class="my_publish_hint rt">进行中</span>';
                    if(pd.pg_spec==1){
                        if(pd.pm_state<3){
                            //判断商品有没有收货地址
                            if(pd.pm_addressid==null||pd.pm_addressid==""||pd.pm_addressid==0){
                                dizhi+='<a href="/member/address/index/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt cong_dizhicon" i="0" onclick="clic(this)" pm_id="'+pd.pm_id+'"><span>添加地址</span></div></a>';
                            }else{
                                dizhi+='<a href="/member/address/index/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt cong_dizhicon" i="1" onclick="clic(this)"><span">修改地址</span></div></a>';
                               
                            }
                        }else{
                            //判断商品有没有收货地址
                            if(pd.pm_addressid==null||pd.pm_addressid==""||pd.pm_addressid==0){
                                dizhi+='<a href="/member/address/index/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt cong_dizhicon" i="0" onclick="clic(this)" pm_id="'+pd.pm_id+'"><span>添加地址</span></div></a>';
                            }
                        }

                    }
                   
                    bt = '<div class="my_publish_share rt my_pub_share-hot" onclick="share(this)" wx_title="'+ pd.share_title +'" wx_desc="'+ pd.share_desc +'" wx_link="'+ pd.share_link +'" url="'+ pd.url +'" tit="'+ pd.pg_name +'" imgs="'+ pd.pg_img +'" code="'+ pd.code +'" data-id="' + pd.pm_id + '"><img src="__STATIC__/image/orderpai/fenxiangb.png" /><span>邀请好友涨人气</span></div>'+dizhi;
                }
                if(pd.pm_order_status == 1&&pd.pm_addressid>0) {
                    fh = '<span class="my_publish_hint rt">等待发货</span>';          
                    if(pd.pg_spec==1){
                        if(pd.pm_state<3){
                            if(pd.pm_addressid!=null||pd.pm_addressid!=""||pd.pm_addressid!=0){
                            }else{
                                dizhi+='<a href="/member/address/index/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt cong_dizhicon cong_xuanzedizhi" i="0" onclick="clic(this)" pm_id="'+pd.pm_id+'" style="margin-top:0.15rem;"><span>选择收货地址</span></div></a>';
                            }
                        }else{
                            if(pd.pm_addressid==null||pd.pm_addressid==""||pd.pm_addressid==0){
                                dizhi+='<a href="/member/address/index/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt cong_dizhicon cong_xuanzedizhi" i="0" onclick="clic(this)" pm_id="'+pd.pm_id+'" style="margin-top:0.15rem;"><img src="__STATIC__/image/orderpai/icon_dingwei@2x.png"><span>选择收货地址</span></div></a>';
                            }
                        }
                    }                 
                    bt = '<div class="my_publish_share rt" data-id="' + pd.pm_id + '"><span><a class="phs" href="tel:400-027-1888">联系客服</span></a></div>'+dizhi;
                }else if(pd.pm_order_status == 1){
                    fh = '<span class="my_publish_hint rt">待选择收货地址</span>';          
                    if(pd.pg_spec==1){
                        if(pd.pm_state<3){
                            if(pd.pm_addressid!=null||pd.pm_addressid!=""||pd.pm_addressid!=0){
                            }else{
                                dizhi+='<a href="/member/address/index/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt cong_dizhicon cong_xuanzedizhi" i="0" onclick="clic(this)" pm_id="'+pd.pm_id+'"><span>选择收货地址</span></div></a>';
                            }
                        }else{
                            if(pd.pm_addressid==null||pd.pm_addressid==""||pd.pm_addressid==0){
                                dizhi+='<a href="/member/address/index/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt cong_dizhicon cong_xuanzedizhi" i="0" onclick="clic(this)" pm_id="'+pd.pm_id+'"><img src="__STATIC__/image/orderpai/icon_dingwei@2x.png"><span>选择收货地址</span></div></a>';
                            }
                        }
                    }                 
                    bt =dizhi;
                }
                if(pd.pm_order_status == 2) {
                    fh = '<span class="my_publish_hint rt">等待收货</span>';                         
                    bt = '<div class="my_publish_share my_publish_renqicolor rt hs" data-id="' + pd.pm_id + '" onclick="confirms(this)"><span>确认收货</span></div><a href="/member/Orderpai/pop_order_logistics/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt" data-id="' + pd.pm_id + '"><span>发货信息</span></div></a>';
                }
                if(pd.pm_paystate == 2) {
                    fh = '<span class="my_publish_hint rt">退款中</span>';                        
                    bt = '<a href="/popularity/popularityorder/refund_info/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt" data-id="' + pd.pm_id + '"><span>退款详情</span></div></a>';
                }

                if(pd.pm_paystate == 3) {
                    fh = '<span class="my_publish_hint rt ls">已完成退款</span>';
                    bt = '<a href="/popularity/popularityorder/refund_info/pm_id/'+pd.pm_id+'"><div class="my_publish_share rt" data-id="' + pd.pm_id + '"><span>退款详情</span></div></a><div class="my_publish_share rt" data-id="' + pd.pm_id + '" onclick="del(this)"><span>删除订单</span></div>';
                }                            
                
                if(pd.pm_order_status == 3) {
                    fh = '<span class="my_publish_hint hei rt">已完成订单</span>';                         
                     bt = '<a href="/popularity/popularitygoods/share_list/"><div class="my_publish_share rt" data-id="' + pd.pm_id + '"><span>随便逛逛</span></div></a><div class="my_publish_share rt" data-id="' + pd.pm_id + '" onclick="del(this)"><span>删除订单</span></div>';
                }
                if(pd.pm_order_status==4){
                    str += '<div class="my_publish_img lf pmg">';
                    str += '<img src="' + pd.pg_s_img + '">';
                    str += '</div>';
                }
                if(pd.pm_order_status==5){

                }
                
                var str = '<div class="my_publish_tit clear">';
                str +='<a><span class="my_publish_bh lf">商品编号：'+pd.pg_sn+'</span><a>'
                str += fh;
                str += '</div>';
                str += '<a href="/popularity/popularityorder/order_info/pm_id/' + pd.pm_id + '">';
                str += '<div class="my_publish_main clear">';
                str +='<div class="my_publish_img lf pmg">';
                if(pd.pg_type == 3) {
                    str +='<div class="xc-icon"></div>';
                }
                str +='<img src="'+pd.pg_s_img+'"/>'
                str +='</div>'
                str += '<div class="my_publish_text lf pmgd">';
                str += '<p>' + pd.pg_name + '</p>';
                str += '<div class="my_publish_price clear">';
                str += '<span class="my_publish_new">￥' + pd.pg_price;
                str += '<span>￥' + pd.pg_market_price + '</span>';
                str += '</span>';
                str += '<span class="my_publish_inventory rt">x';
                str += '<span>1</span>';
                str += '</span>';
                str += '</div>';
                str += '</div>';
                str += '</div>';
                str += '</a>';
                str += '<div class="my_publish_data clear">';
                str += '<p class="lf">当前人气值'+ pd.pm_popularity +'</p>';
                str += '<p class="rt">总排名NO.'+ pd.pm_sort +'</p>';
                str += '</div>';
                str += '<div class="my_publish_btn clear">';
                str += bt;
                str += '</div>';

                var liDom = document.createElement("div");
                liDom.className = "my_publish_list";
                liDom.innerHTML = str;
                listDom.appendChild(liDom);

                if($('#app').val() == '1.0') {
                    $('.phs').removeAttr('href').attr('onclick','call(4000271888)');
                }
            }
             //点击跳转页面后存session
    // $(".my_publish_share").click(function(){
    //     alert("e")
    //     $(this).attr("pm_id");
    //     var getsess=window.sessionStorage.setItem("pmId",$(this).attr("pm_id"));//存session
    // })
        }

        /*联网加载列表数据
         在您的实际项目中,请参考官方写法: http://www.mescroll.com/api.html#tagUpCallback
         请忽略getListDataFromNet的逻辑,这里仅仅是在本地模拟分页数据,本地演示用
         实际项目以您服务器接口返回的数据为准,无需本地处理分页.
         * */
        function getListDataFromNet(curNavIndex, pageNum, pageSize, successCallback, errorCallback) {  

            //延时一秒,模拟联网
            setTimeout(function () {
                $.ajax({
                    type: 'GET',
                    url: '/popularity/popularityorder/getorderlist/status/' + curNavIndex + '/page/' + pageNum + '/size/' + pageSize,
                    dataType: 'json',
                    success: function (data) {
                        var listData = [];
                        for (var i = 0; i < data.data.length; i++) {
                            listData.push(data.data[i]);
                        }

                        //回调
                        successCallback(listData);
                    },
                    error: errorCallback
                });
            }, 500)
        }
    });

    function clic(obj){
            // $(".change_address").click(function(){
                // var pm_id = "<?php echo (isset($info['pm_id']) && ($info['pm_id'] !== '')?$info['pm_id']:0); ?>";
                // var pm_addressid = "<?php echo (isset($info['pm_addressid']) && ($info['pm_addressid'] !== '')?$info['pm_addressid']:0); ?>";
                // var pm_order_status = "<?php echo (isset($info['pm_order_status']) && ($info['pm_order_status'] !== '')?$info['pm_order_status']:0); ?>";
                // var pm_state="<?php echo (isset($info['pm_state']) && ($info['pm_state'] !== '')?$info['pm_state']:0); ?>";
                var hasAddress = $(obj).attr('i');
                $.cookie('hasAddress',hasAddress,{expire:1000,path:'/'});
                // console.log(pm_addressid);
                // if(pm_state<3||pm_state>2&&(pm_addressid==0 || pm_addressid==''|| pm_addressid==null)){
                      //不能改地址
                    // window.location.href="/member/address/index/pm_id/"+pm_id;
                    // $.cookie('hasAddress',hasAddress,{expire:1000,path:'/'});
                // }
                // if(pm_order_status !=2 && pm_order_status !=3){
                    // 已发货 已签收不能改地址
                    
                // }
            // });
        }
    //显示分享弹窗
    function share(obj) {
        var url = $(obj).attr("url");
        $('#title').val($(obj).attr("tit"));
        var imgs = $(obj).attr('imgs');        
        var wx_link = $(obj).attr('wx_link');
        var wx_desc = $(obj).attr('wx_desc');
        var wx_title = $(obj).attr('wx_title');
        var ym = document.domain;
        var code = $(obj).attr("code");
        $('#imgUrl').val('https://'+ym+imgs);
        $('.share-code').attr('src',code);
        $('.share-link').attr('data-clipboard-text',url);
        $('#share_link').val(wx_link);
        $('#share_title').val(wx_title);
        $('#share_desc').val(wx_desc);

        var ym = document.domain;
        var share_qr_image = "https://"+ym+code;

        var link = $('#share_link').val();
        var title = $('#share_title').val();
        var desc = $('#share_desc').val();
        var imgUrl = $('#imgUrl').val();

        var data = '{"share_title": "'+ title +'","share_content": "'+ desc +'","share_url": "'+ link +'","share_image": "'+ imgUrl +'","is_share_to_firend_circle": "1","share_qr_image": "'+ share_qr_image +'","type": "1"}';

        if($('#app').val() != '') {
            if($('#app').val() == '1.0') {
                /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
                setupWebViewJavascriptBridge(function(bridge) {
                    /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                    bridge.callHandler('getShareParams',data);
                })
            }else {
                $('.details_fenxiang').show();
            }
            
        }else {
            // 非微信浏览器端安卓分享
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        if(getCookie("version") == null) {
                            $('.details_fenxiang').show();
                        }else {
                            window.android.getShareParams(data);
                        }
                    }
                }else {
                    $('.share-pop').show();
                    $('.share-cont').show();
                    $('.share-tip').hide();
                }
            }else {
                $('.share-pop').show();
                $('.share-cont').show();
                $('.share-tip').hide();
            }
        }
    }

    //隐藏分享弹窗
    $('.share-over').click(function(){
        $('.share-pop').hide();
    });

    //复制功能
    var btns = document.querySelectorAll('.share-link');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });

    clipboard.on('error', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });

    //微信分享提示
    $('.share-link-wx').click(function(){
        $('.share-cont').hide();
        $('.share-tip').show();

        var link = $('#share_link').val();
        var title = $('#share_title').val();
        var desc = $('#share_desc').val();
        var imgUrl = $('#imgUrl').val();

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

    // 判断是否在微信内
    if(isWeiXin()){
        $('.share-link-wx').show();
        $('.share-link').hide();
    }else{
        $('.share-link').show();
        $('.share-link-wx').hide();
    }

    //关闭app分享弹窗
    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })
    // 确认收货
    function confirms(obj){
        var pm_id=$(obj).attr("data-id")
        layer.confirm("是否确认收货？", {
            title: false,
            /*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            btn: ['取消', '确认'], //按钮
            btn2: function (index) {
                //按钮2的回调
                $.ajax({
                    type: 'GET',
                    url: '/popularity/popularityorder/confirm_pm/pm_id/'+pm_id,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status == 1) {
                            layer.msg("<span style='color:#fff'>" + res.msg +
                                "</span>", {
                                    time: 2000
                                },
                                function () {
                                    location.reload();
                                });
                        } else {
                            layer.msg("<span style='color:#fff'>" + res.msg +
                                "</span>", {
                                    time: 2000
                                });
                            layer.close(index);
                        }
                    }
                });
            }
        })
    };
    //删除订单
    function del(obj) {
        var pm_id=$(obj).attr("data-id");
        // alert(pm_id);
        // return false;
        layer.confirm("是否确认删除该订单？", {
            title: false,
            /*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            btn: ['取消', '确认'], //按钮
            btn2: function (index) {
                //按钮2的回调
                $.ajax({
                    type: 'GET',
                    url: '/popularity/popularityorder/delete_pm/pm_id/'+pm_id,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status == 1) {
                            layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                time: 2000
                            }, function () {
                                window.location.href =
                                    "/popularity/popularityorder/order_list/i/0";
                            });
                        } else {
                            layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                time: 2000
                            });
                            layer.close(index);
                        }
                    }
                });
            }
        })
    }
    function app(id) {
        var link = $('#share_link').val();
        var title = $('#share_title').val();
        var desc = $('#share_desc').val();
        var imgUrl = $('#imgUrl').val();

        var is_share_to_firend_circle = '';
        if(id == 0) {
            is_share_to_firend_circle = false;
        }else {
            is_share_to_firend_circle = true;
        }

        var data = '{"share_title": "'+ title +'","share_content": "'+ desc +'","share_url": "'+ link +'","share_image": "'+ imgUrl +'","is_share_to_firend_circle": '+is_share_to_firend_circle+'}';

        if($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function(bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getShareParams',data);
            })
        }else {
            // 非微信浏览器端安卓分享
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        window.android.getShareParams(data);
                    }
                }
            }
        }       
        $('.details_fenxiang').hide();
    }

    function copyUrl() {
        var link = $('.share-link').attr("data-clipboard-text");
        var data = '{"copy_url": "'+ link +'"}';
        if($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function(bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getCopyUrl',data);
            })
        }else {
            // 非微信浏览器端安卓复制链接
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        window.android.getCopyUrl(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }
</script> 
    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>