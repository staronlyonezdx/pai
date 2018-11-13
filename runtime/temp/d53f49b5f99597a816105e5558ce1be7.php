<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"D:\project\pai\public/../application/member/view/promoters/invitation_list.html";i:1541491284;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1541491283;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1541491283;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/promoters/invitation.css">

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
<!--<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?>>
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>-->
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <div class="title">
        <span class="spans">
            <span class="titlt_name active" i="0">已邀请成功</span>
            <span class="titlt_name" i="1">邀请未激活</span>
        </span>

            </div>
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >
            <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
        </div>
    </div>
</div>
</div>
</header>
        <header></header>
        
<main>
    <div class="black"></div>

    <!--轮播-->
    <div id="swiper" class="swiper-container">

        <div class="swiper-wrapper">

            <!--已邀请成功列表-->
            <div id="mescroll0" class="swiper-slide mescroll">
                <ul id="dataList0" class="main_content">
                    <!--<ul class="main_content">-->
                    <!--<li class="item_item">-->
                    <!--<span class="inv_num lf">15232382351</span>-->
                    <!--<span class="inv_name lf">王大哈雷</span>-->
                    <!--<span class="inv_dengji lf">普通会员</span>-->
                    <!--</li>-->
                    <!--</ul>-->
                </ul>
            </div>

            <!--邀请未激活列表-->
            <div id="mescroll1" class="swiper-slide mescroll">
                <img src="__STATIC__/image/promoters/pg_tishi@2x.png" alt="">
                <ul id="dataList1" class="main_list">

                    <!--<ul class="main_list">-->
                    <!--<li class="item_item">-->
                    <!--<span class="inv_num lf">18888888888</span>-->
                    <!--<span class="inv_name lf">哈哈哈哈哈</span>-->
                    <!--<span class="inv_dengji lf">普通会员</span>-->
                    <!--</li>-->
                    <!--</ul>-->
                </ul>
            </div>
        </div>
    </div>

</main>

        <footer></footer>
    </body>

    <!--bugtags 开始-->
    <!-- <script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script> -->
    <script>
        // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本
        // new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE');
    </script>
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
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script>
    $(function () {
        var curNavIndex = 0;
        var mescrollArr = new Array(2);//2个菜单所对应的2个mescroll对象

//初始化首页
        mescrollArr[0] = initMescroll("mescroll0", "dataList0");

        /*初始化轮播*/
        var swiper = new Swiper('#swiper', {
            onTransitionEnd: function (swiper) {
                var i = swiper.activeIndex;//轮播切换完毕的事件
                changePage(i);
            }
        });

        /*初始化菜单*/
        $(".titlt_name").click(function () {
            var i = Number($(this).attr("i"));
            swiper.slideTo(i);//以轮播的方式切换列表
        })

        /*切换列表*/
        function changePage(i) {
            if (curNavIndex != i) {
//更改列表条件
                $(".titlt_name").each(function (n, dom) {
                    if (dom.getAttribute("i") == i) {
                        dom.classList.add("active");
                    } else {
                        dom.classList.remove("active");
                    }
                })
//隐藏当前回到顶部按钮
// mescrollArr[curNavIndex].hideTopBtn();
//取出菜单所对应的mescroll对象,如果未初始化则初始化
                if (mescrollArr[i] == null) {
                    mescrollArr[i] = initMescroll("mescroll" + i, "dataList" + i);
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
        function initMescroll(mescrollId, clearEmptyId) {
//创建MeScroll对象,内部已默认开启下拉刷新,自动执行up.callback,刷新列表数据;
            var mescroll = new MeScroll(mescrollId, {
//下拉刷新
                down: {
                    isLock: true, //锁定下拉
                },
//上拉加载的配置项
                up: {
                    callback: getListData, //上拉回调,此处可简写; 相当于 callback: function (page) { getListData(page); }
                    isBounce: false, //此处禁止ios回弹,解析(务必认真阅读,特别是最后一点): http://www.mescroll.com/qa.html#q10
                    noMoreSize: 1, //如果列表已无数据,可设置列表的总数量要大于半页才显示无更多数据;避免列表数据过少(比如只有一条数据),显示无更多数据会不好看; 默认5
                    empty: {
                        icon: "/static/image/goods/no-cont.png", //图标,默认null
                        tip: "暂无相关数据~", //提示
                    },
                    clearEmptyId: clearEmptyId, //相当于同时设置了clearId和empty.warpId; 简化写法;默认null
                    htmlLoading: '<p class="upwarp-progress mescroll-rotate"></p><p class="upwarp-tip">加载中..</p>', //上拉加载中的布局
                    htmlNodata: '<p class="upwarp-nodata">我是有底线的~</p>', //无数据的布局
                    toTop: { //配置回到顶部按钮
                        src: "/static/image/application/mescroll-totop.png", //默认滚动到1000px显示,可配置offset修改
                    }
                }
            });
            return mescroll;
        }


        /*联网加载列表数据  page = {num:1, size:10}; num:当前页 从1开始, size:每页数据条数 */
        function getListData(page) {
//联网加载数据
            var dataIndex = curNavIndex; //记录当前联网的nav下标,防止快速切换时,联网回来curNavIndex已经改变的情况;
            getListDataFromNet(dataIndex, page.num, page.size, function (pageData, total_num) {
///方法二(推荐): 后台接口有返回列表的总数据量 total_num
                mescrollArr[dataIndex].endBySize(pageData.length, total_num); //必传参数(当前页的数据个数, 总数据量)
                // console.log(pageData);
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
                var data = pageData[i];
                if (dataIndex == 0) {
                    var str = '<li class="main_item">';
                    str += '<span class="inv_num lf">' + data.m_mobile + '</span>';
                    str += ' <span class="inv_name lf">' + data.m_name + '</span>';
                    str += '<span class="inv_dengji lf">' + data.ml_name + '</span>';
                    str += ' </li>';
                    var liDom = document.createElement("div");
                    liDom.className = "participate_pick";
                    liDom.innerHTML = str;
                    listDom.appendChild(liDom);
                } else if (dataIndex == 1) {
                    var str = '<li class="main_item">';
                    str += '<span class="inv_num lf">' + data.m_mobile + '</span>';
                    str += ' <span class="inv_name lf">' + data.m_name + '</span>';
                    str += '<span class="inv_dengji lf">' + data.ml_name + '</span>';
                    str += ' </li>';
                    var liDom = document.createElement("div");
                    // liDom.className = "participate_pick";
                    liDom.innerHTML = str;
                    listDom.appendChild(liDom);
                }
            }
        }

        /*联网加载列表数据
        在您的实际项目中,请参考官方写法: http://www.mescroll.com/api.html#tagUpCallback
        请忽略getListDataFromNet的逻辑,这里仅仅是在本地模拟分页数据,本地演示用
        实际项目以您服务器接口返回的数据为准,无需本地处理分页.
        * */
        function getListDataFromNet(curNavIndex, pageNum, pageSize, successCallback, errorCallback) {
            var url = '';
            if (curNavIndex == 0) {
                // url = '/member/promoters/invitation_list/is_auction/1';
                // url = '/member/promoters/invitation_list/is_auction/1/page/' + pageNum + '/page_size/' + pageSize + '/from/' + <?php echo $from; ?>;
                url = '/member/promoters/invitation_list/is_auction/1/page/' + pageNum + '/page_size/' + pageSize + '/from/2';
            } else if (curNavIndex == 1) {
                // url = '/member/promoters/invitation_list/is_auction/2' ;
                // url = '/member/promoters/invitation_list/is_auction/2/page/' + pageNum + '/page_size/' + pageSize + '/from/' + <?php echo $from; ?>;
                url = '/member/promoters/invitation_list/is_auction/2/page/' + pageNum + '/page_size/' + pageSize + '/from/2';
            }
//延时一秒,模拟联网
            setTimeout(function () {
                $.ajax({
                    type: 'GET',
                    url: url,
                    // dataType: 'json',
                    success: function (data) {
                        var listData = [];
                        for (var i = 0; i < data.list.length; i++) {
                            listData.push(data.list[i]);
                        }
//回调
                        successCallback(listData, data.total_num);
                    },
                    error: errorCallback
                });
            }, 500)
        }


//iosapp
        /*这段代码是固定的，必须要放到js中*/
        function setupWebViewJavascriptBridge(callback) {
            if (window.WebViewJavascriptBridge) {
                return callback(WebViewJavascriptBridge);
            }
            if (window.WVJBCallbacks) {
                return window.WVJBCallbacks.push(callback);
            }
            window.WVJBCallbacks = [callback];
            var WVJBIframe = document.createElement('iframe');
            WVJBIframe.style.display = 'none';
            WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
            document.documentElement.appendChild(WVJBIframe);
            setTimeout(function () {
                document.documentElement.removeChild(WVJBIframe)
            }, 0)
        }


        var pathname = window.location.pathname;
        if (pathname == '/member/promoters/invitation_list/type/2/from/1' || pathname == '/member/promoters/invitation_list/type/2/from/2') {
            // console.log($('.titlt_name'));
            $('.titlt_name').eq(1).addClass('active');
            swiper.slideTo(2);
            $('.titlt_name').eq(0).removeClass('active');
            $('.titlt_name').click(function () {
                // console.log($(this).index());
                $('.titlt_name').removeClass('active')
                $(this).addClass('active');
                var i = $(this).index();
                swiper.slideTo(i);//以轮播的方式切换列表
            })
        }
    })


</script>


</html>