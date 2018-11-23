<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\project\pai\public/../application/index/view/index/price_range.html";i:1542704491;s:63:"D:\project\pai\public/../application/index/view/index/base.html";i:1542013165;s:66:"D:\project\pai\public/../application/index/view/common/js_sdk.html";i:1541491293;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/index/index.css">
<link rel="stylesheet" type="text/css" href="__STATIC__/css/productlist/product_list.css">

        <script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>
        <script src="__JS__/common/rem.js"></script>
        <script src="__JS__/common/jquery_lazyload.js"></script>
        <script src="__JS__/common/lazyload.js"></script>
        <script src="__JS__/common/site.js"></script>
        <script src="__JS__/common/larea.js"></script>
        <script src="__JS__/common/bootstrap.min.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
        <script src="__STATIC__/lib/layui/layui.js"></script>
        <script src="__JS__/common/popups.js"></script>
        <title>首页</title>
    </head>
    <body>
        <header></header>
        
<header>
    <div class="header_nav">
        <div class="header_view">
            <div class="header_tit">
                            <div class="header_back" >
                    <img src="/static/icon/publish/icon_nav_back@2x.png" name="out" class="smt">
                </div>
            </div>
        </div>
    </div>
</header>
<div class="tabHead">
    <span class="one" i="0">一折场</span>
    <span class="two" i="1">三折场</span>
    <span class="three" i="2">五折场</span>
</div>

<!--轮播-->
<div id="swiper" class="swiper-container">
    <div id="swiperWrapper" class="swiper-wrapper">

        <!--一折场-->
        <div id="mescroll0" class="swiper-slide mescroll">
            <ul id="dataList0" class="data-list">
            </ul>
        </div>

        <!--三折场-->
        <div id="mescroll1" class="swiper-slide mescroll">
            <ul id="dataList1" class="data-list"></ul>
        </div>

        <!--五折场-->
        <div id="mescroll2" class="swiper-slide mescroll">
            <ul id="dataList2" class="data-list"></ul>
        </div>
    </div>
</div>

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
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script src="__JS__/cookie/jquery.cookie.js"></script>
<script>
    $(function () {

        //类型
        var t = Number("<?php echo $type; ?>") - 1;

        $('.tabHead').find('span').eq(t).addClass('active');

        //导航菜单        
        var mescrollArr = new Array(3);//每个菜单对应一个mescroll对象

        //当前菜单下标
        var curNavIndex = t;

        //初始化首页
        mescrollArr[t] = initMescroll(t);

        /*初始化轮播*/
        var swiper = new Swiper('#swiper', {
            initialSlide: t,
            onTransitionEnd: function (swiper) {
                var i = swiper.activeIndex;//轮播切换完毕的事件
                // console.log(i);
                var type = window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1);
                type = +i + 1;
                console.log(type);
                history.replaceState(null,null,type)
                changePage(i);
            }
        });

        /*菜单点击事件*/
        $(".tabHead span").click(function () {
            var i = Number($(this).attr("i"));
            // $.cookie('zhekou_type', i, {expire: 10000, path: '/'})
            window.location.href='/index/index/price_range/type/'+ (+i+1);
            swiper.slideTo(i);//以轮播的方式切换列表
        })

        $(".tabHead span").each(function (n, dom) {
            if (dom.getAttribute("i") == t) {
                curNavDom = dom;
            }
        });

        /*切换列表*/
        function changePage(i) {
            if (curNavIndex != i) {
                //更改列表条件
                var curNavDom;//当前菜单项
                $(".tabHead span").each(function (n, dom) {
                    if (dom.getAttribute("i") == i) {
                        dom.classList.add("active");
                        curNavDom = dom;
                    } else {
                        dom.classList.remove("active");
                    }
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
                        icon: "/static/image/goodscollection/shoucang@2x.png", //图标,默认null
                        tip: "暂无产品~", //提示
                    },
                    page: {
                        size: 6
                    },
                    loadFull: {
                        use : true,
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
            getListDataFromNet(dataIndex, page.num, page.size, function (pageData, totle_num) {
                //联网成功的回调,隐藏下拉刷新和上拉加载的状态;
                //mescroll会根据传的参数,自动判断列表如果无任何数据,则提示空;列表无下一页数据,则提示无更多数据;
                //console.log("dataIndex="+dataIndex+", curNavIndex="+curNavIndex+", page.num="+page.num+", page.size="+page.size+", pageData.length="+pageData.length);

                //方法一(推荐): 后台接口有返回列表的总页数 totalPage
                // mescrollArr[dataIndex].endByPage(pageData.length, totalPage); //必传参数(当前页的数据个数, 总页数)

                //方法二(推荐): 后台接口有返回列表的总数据量 totalSize
                mescrollArr[dataIndex].endBySize(pageData.length, totle_num); //必传参数(当前页的数据个数, 总数据量)

                //方法三(推荐): 您有其他方式知道是否有下一页 hasNext
                //mescrollArr[dataIndex].endSuccess(pageData.length, hasNext); //必传参数(当前页的数据个数, 是否有下一页true/false)

                //方法四 (不推荐),会存在一个小问题:比如列表共有20条数据,每页加载10条,共2页.如果只根据当前页的数据个数判断,则需翻到第三页才会知道无更多数据,如果传了hasNext,则翻到第二页即可显示无更多数据.
                //  mescrollArr[dataIndex].endSuccess(pageData.length,totle_num);

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
                var num;
                if (pd.gp_num == 0) {
                    num = 0;
                } else {
                    num = pd.gp_num / pd.gdr_membernum * 100;
                    if (num >= 100) {
                        num = 100;
                    } else if (num >= 99 && num < 100) {
                        num = 99;
                    } else {
                        num = Math.ceil(num);
                    }
                }

                var img = '';
                // if (pd.gp_market_price >= 0 && pd.gp_market_price <= 1000) {
                //     img = '<img src="__STATIC__/image/index/icon_home_hundred@2x.png" alt="">'
                // }
                // if (pd.gp_market_price >= 1001 && pd.gp_market_price <= 10000) {
                //     img = '<img src="__STATIC__/image/index/icoc_home_thousand@2x.png" alt="">'
                // }
                // if (pd.gp_market_price >= 10001) {
                //     img = '<img src="__STATIC__/image/index/icon_home_wan@2x.png" alt="">'
                // }

                var str = '<div class="index_module_main clear">';
                str += '<div class="index_module_img_view lf">';
                str += '<div class="index_module_img">';
                str += '<img src="' + pd.g_s_img + '" alt="">';
                str += '</div>';
                str += '<div class="index_module_pic">';
                str += img;
                str += '</div>';
                str += '</div>';
                str += '<div class="index_module_text lf">';
                str += '<p>' + pd.g_name + '</p>';
                str += '<span>￥';
                if (pd.gdr_price == null || pd.gdr_price == '') {
                    str += '<i>0</i>'
                } else {
                    str += '<i>' + pd.gdr_price + '</i>'
                }
                str += '&nbsp;&nbsp;<del>￥' + pd.gp_market_price + '</del></span>';
                str += '<div class="index_module_progress_view clear">';
                str += '<div class="index_module_progress lf">';
                str += '<div class="index_module_progressbar" style="width: ' + num + '%"></div>';
                str += '</div>';
                str += '<div class="index_module_progress_hint lf">' + num + '%</div>';
                str += '</div>';
                str += '<div class="index_module_progress_bottom clear">';
                str += '<span class="lf">' + pd.gp_num + '人已参与</span>';
                str += '<div class="index_module_progress_canyu rt">立即参团</div>';
                str += '</div>';
                str += '</div>';
                str += '</div>';

                var liDom = document.createElement("a");
                liDom.setAttribute('href', '/member/goodsproduct/index/g_id/' + pd.g_id);
                liDom.innerHTML = str;
                listDom.appendChild(liDom);
                $('img').on('error',function(){ 
                    $(this).attr('src','/static/image/index/pic_home_taplace@2x.png'); 
                });
            }
        }

        /*联网加载列表数据
         在您的实际项目中,请参考官方写法: http://www.mescroll.com/api.html#tagUpCallback
         请忽略getListDataFromNet的逻辑,这里仅仅是在本地模拟分页数据,本地演示用
         实际项目以您服务器接口返回的数据为准,无需本地处理分页.
         * */
        function getListDataFromNet(curNavIndex, pageNum, pageSize, successCallback, errorCallback) {
            if (curNavIndex == 0) {
                var url = '/index/index/ajax_top_two_list/state/1/page/' + pageNum + '/page_size/' + pageSize;
            } else if (curNavIndex == 1) {
                var url = '/index/index/ajax_top_two_list/state/2/page/' + pageNum + '/page_size/' + pageSize;
            } else if (curNavIndex == 2) {
                var url = '/index/index/ajax_top_two_list/state/3/page/' + pageNum + '/page_size/' + pageSize;
            }
            //延时一秒,模拟联网
            setTimeout(function () {
                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'json',
                    success: function (data) {
                        var listData = [];
                        for (var i = 0; i < data.list.length; i++) {
                            listData.push(data.list[i]);
                        }
                        //回调
                        successCallback(listData, data.totle_num);
                    },
                    error: errorCallback
                });
            }, 500)
        }
    });
    // function back() {
        // window.history.back(-1);
        $('.header_back').click(function(){
            window.location.href = '/'
        })
    // }
</script>

</html>