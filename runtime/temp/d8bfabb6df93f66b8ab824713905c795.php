<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"D:\project\pai\public/../application/member/view/classify/index.html";i:1541491283;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1541491283;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1541491283;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__STATIC__/css/productlist/product_list.css"> 
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
        <header> <div class="header_nav">
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
        
<!--菜单 需加上mescroll-touch-x,原因: http://www.mescroll.com/qa.html#q10 -->
<?php if(!(empty($data['titleAll']) || (($data['titleAll'] instanceof \think\Collection || $data['titleAll'] instanceof \think\Paginator ) && $data['titleAll']->isEmpty()))): ?>
<div class="product_list_rt">
    <img src="__STATIC__/image/product_list/icon_nav_down_selected.png" class="product_list_dis">
    <img src="__STATIC__/image/product_list/icon_nav_up_selected.png" class>
</div>
<?php endif; ?>

<div class="product_list_bg">
    <div class="product-over"></div>
    <div class="product_list_title">全部分类</div>
    <div class="product_list_sele">
        <?php if(is_array($data['titleAll']) || $data['titleAll'] instanceof \think\Collection || $data['titleAll'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['titleAll'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a i="<?php echo $key+1; ?>"><?php echo $vo['gc_name']; ?></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

<div class="top">
    <div class="top-nav">
        <div class="scrollx mescroll-touch-x">
            <div id="scrollxContent" class="scrollx-content">
                <ul id="nav" class="nav">
                    <li data-id="<?php echo $data['parent_id']; ?>" class="d<?php echo $data['parent_id']; ?>" i="0">全部</li>
                    <?php if(is_array($data['titleAll']) || $data['titleAll'] instanceof \think\Collection || $data['titleAll'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['titleAll'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li data-id="<?php echo $vo['gc_id']; ?>" class="d<?php echo $vo['gc_id']; ?>" i="<?php echo $key+1; ?>"><?php echo $vo['gc_name']; ?></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--轮播-->
<div id="swiper" class="swiper-container">
    <div id="swiperWrapper" class="swiper-wrapper">
        <div id="mescroll0" class="swiper-slide mescroll">
            <ul id="dataList0" class="data-list">
            </ul>
        </div>
        <?php if(is_array($data['titleAll']) || $data['titleAll'] instanceof \think\Collection || $data['titleAll'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['titleAll'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div id="mescroll<?php echo $key+1; ?>" class="swiper-slide mescroll">
            <ul id="dataList<?php echo $key+1; ?>" class="data-list">

            </ul>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

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
    $(".product_list_rt").click(function () {
		$(this).children("img").eq(0).toggleClass("product_list_dis");
		$(this).children("img").eq(1).toggleClass("product_list_dis");
        $(".product_list_bg").toggle();
        $(".product-over").toggle();
	})

    var t = $('.d<?php echo $data['gc_id']; ?>').attr('i');
    var len = $('#nav li').length;
    $('#nav').find('li').eq(t).addClass('active');

    var mescrollArr = new Array(len);//每个菜单对应一个mescroll对象

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
        swiper.slideTo(i);//以轮播的方式切换列表
    })

    //隐藏下拉分类
    $(".product-over").click(function(){
        $(".product_list_rt").children("img").eq(0).toggleClass("product_list_dis");
		$(".product_list_rt").children("img").eq(1).toggleClass("product_list_dis");
        $(".product_list_bg").toggle();
        $(".product-over").toggle();
    })

    $('.product_list_sele a').on('click', function () {
        $(".product_list_rt").children("img").eq(0).toggleClass("product_list_dis");
		$(".product_list_rt").children("img").eq(1).toggleClass("product_list_dis");
        $('.product_list_bg').hide();
        $(".product-over").hide();
        var i = Number($(this).attr("i"));
        swiper.slideTo(i);//以轮播的方式切换列表

	})

    $("#nav li").each(function (n, dom) {
        if (dom.getAttribute("i") == t) {
            curNavDom = dom;
        }
    });
//    //菜单项居中动画
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
                noMoreSize: 1, //如果列表已无数据,可设置列表的总数量要大于半页才显示无更多数据;避免列表数据过少(比如只有一条数据),显示无更多数据会不好看; 默认5
                empty: {
                    icon: '/static/image/goods/no-cont.png',
                    tip: "暂无相关数据~", //提示
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
        getListDataFromNet(dataIndex, page.num, page.size, function (pageData,totle_num) {
            
            //方法二(推荐): 后台接口有返回列表的总数据量 totle_num
            mescrollArr[dataIndex].endBySize(pageData.length, totle_num); //必传参数(当前页的数据个数, 总数据量)

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
            
            if (pd.min_price == '' || pd.min_price == null) {
                pd.min_price = 0;
            }
            if (pd.max_price == '' || pd.max_price == null) {
                pd.max_price = 0;
            }
            if(pd.gp_num == null) {
                pd.gp_num = 0;
            }
            
            var str = '<div class="product_list_list lf">';
            str += '<div class="product_list_pic">';
            str += '<img src="' + pd.g_img + '">';
            str += '<div class="product_list_number">' + pd.gp_num + '人已参与</div>';
            str += '</div>';
            str += '<p class="product_list_tit_p">' + pd.g_name + '</p>';
            str += '<p class="product_list_price clear">';
            if(pd.min_price == pd.max_price) {
                str += '￥<span class="product_list_red "> ' + pd.min_price + '</span>';
            }else {
                str += '￥<span class="product_list_red "> ' + pd.min_price + '～' + pd.max_price + ' </span>';
            } 
            str += '</p>';
            str += '<span class="product_list_oldprice">￥' + pd.gp_market_price + '</span>';
            str += '</div>';

            var liDom = document.createElement("a");
            liDom.setAttribute('href','/member/goodsproduct/index/g_id/' + pd.g_id);
            liDom.innerHTML = str;
            listDom.appendChild(liDom);
        }
    }

    /*联网加载列表数据
    在您的实际项目中,请参考官方写法: http://www.mescroll.com/api.html#tagUpCallback
    请忽略getListDataFromNet的逻辑,这里仅仅是在本地模拟分页数据,本地演示用
    实际项目以您服务器接口返回的数据为准,无需本地处理分页.
    * */
    function getListDataFromNet(curNavIndex, pageNum, pageSize, successCallback, errorCallback) {
        var id = $('#nav li').eq(curNavIndex).attr('data-id');
        //延时一秒,模拟联网
        setTimeout(function () {
            $.ajax({
                type: 'GET',
                url: '/member/classify/index/gc_id/' + id + '/page/' + pageNum + '/size/' + pageSize,
                dataType: 'json',
                success: function (data) {
                    var listData = [];
                    for (var i = 0; i < data.list.length; i++) {
                        listData.push(data.list[i]);
                    }

                    //回调
                    successCallback(listData,data.totle_num);
                },
                error: errorCallback
            });
        }, 500)
    }
</script>

</html>