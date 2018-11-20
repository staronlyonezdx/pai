<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"D:\project\pai\public/../application/member/view/shop/index.html";i:1542693723;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__STATIC__/css/productlist/product_list.css">
<link rel="stylesheet" type="text/css" href="__CSS__/shop/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/search_index.css"> 

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
    <div class="shop_index_bgbanner">
        <div class="shop_img_bg"></div>
        <img class="bg-img" src="<?php echo isset($store_info['store_background_img']) ? $store_info['store_background_img'] :  '/static/image/shop/banner.png'; ?>">
        <div class="shop_search_bg">
            <div class="shop_back"></div>
            <div class="shop_index_search">搜索本店商品</div>
        </div>
        <div class="shop_name clear">
            <div class="shop_name_pic lf">
                <a href="/member/shop/introduction/store_id/<?php echo $store_info['store_id']; ?>">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="<?php echo $store_info['store_logo']; ?>">
                </a>
            </div>
            <div class="shop_name_name lf">
                <p><?php echo isset($store_info['stroe_name']) ? $store_info['stroe_name'] :  '11'; ?></p>
                <span>
                    <span class="p_num"><?php echo isset($store_info['num']) ? $store_info['num'] :  0; ?></span>人关注</span>
            </div>
            <div class="shop_name_guanzhu rt" onclick="collection(<?php echo $store_info['store_id']; ?>)">
                <?php if($store_info['is_collection']==1): ?>已关注<?php else: ?>关注<?php endif; ?>
            </div>
        </div>
    </div>

    <div class="shop_index_tab search_index_block clear">
        <div class="shop_index_tab_list shop_index_tab_bold lf" data="8">
            <span>综合</span>
        </div>
        <div class="shop_index_tab_list lf new_pro" data="2">
            <span>新品</span>
        </div>
        <div class="shop_index_tab_list shop_index_tab_filter lf">
            <span>人数</span>
            <div class="shop_index_tab_default">
                <img src="__STATIC__/image/shop/icon_nav_defelt@2x.png" alt="">
            </div>
            <div class="shop_index_filter">
                <img src="__STATIC__/image/shop/icon_nav_on@2x.png" alt="" data="3">
                <img src="__STATIC__/image/shop/icon_nav_down@2x.png" alt="" data="4" class="shop_index_filter_img">
            </div>
        </div>
        <div class="shop_index_tab_list shop_index_tab_price lf">
            <span>价格</span>
            <div class="shop_index_tab_default">
                <img src="__STATIC__/image/shop/icon_nav_defelt@2x.png" alt="">
            </div>
            <div class="shop_index_filter">
                <img src="__STATIC__/image/shop/icon_nav_on@2x.png" alt="" data="5">
                <img src="__STATIC__/image/shop/icon_nav_down@2x.png" alt="" data="6" class="shop_index_filter_img">
            </div>
        </div>
        <input type="hidden" name="order" />
    </div>
    <div id="dataList" class="data-list">
    </div>

    <div class="index_search_pop">
        <!--搜索框-->
        <div class="index_search_pop_top clear">
            <div class="index_pop_text lf">
                <img src="/static/icon/publish/icon_nav_back@2x.png" alt="">
            </div>
            <div class="index_search_pop_view clear lf">
                <div class="index_search_lfimg">
                    <img src="/static/image/index/searchbar_icon_search@2x.png">
                </div>
                <input type="text" name="keyword" class="index_pop_inp lf">

                <div class="index_search_cancel rt">
                    <img src="/static/image/index/icon_search_clear@2x.png" alt="">
                </div>
            </div>
            <button type="submit" class="index_pop_sousuo rt"> 搜索</button>
        </div>

        <!--热门搜索-->
        <!-- <div class="index_pop_history_view">
            <div class="index_pop_history clear">
                <p class="lf">热门搜索</p>
            </div>
            <div class="index_pop_history_main clear">
                <div class="lf">iphone6</div>
                <div class="lf">荣耀166</div>
                <div class="lf">荣耀10X</div>
                <div class="lf">iphone5</div>
            </div>
        </div> -->
        <!--搜索出的列表-->
        <div class="index_pop_search_main">
            <ul class="index_pop_search_ul">

            </ul>
        </div>
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
<script src="__JS__/Public.js"></script>
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script>
    //调用方法
    $('.shop_back').click(function(){   
        var data3=window.sessionStorage.getItem("data");  
        var data4=window.sessionStorage.getItem("keyword");  
        if(getQueryString("share") != null) {
            window.location.href = "/index/index/";
        }else if(data3 == 2){
            window.location.href='/index/index/search_index/type/'+data3+'/keyword/'+data4;
            sessionStorage.removeItem('data');
            sessionStorage.removeItem('keyword');

        }else {
            window.history.back();
        }  
        // if(data2){
        //     sessionStorage.removeItem(data2);
        //     return false;
        //     alert("de");
        //     
            
        // }else {
        //     alert("d1");
        //     window.history.back();
        // }  
    })

    //点击首页头部搜索
    $(".shop_index_search").click(function () {
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

    $(function () {
        //创建MeScroll对象,内部已默认开启下拉刷新,自动执行up.callback,刷新列表数据;
        var mescroll = new MeScroll("body", {
            //下拉刷新
            down: {
                isLock: true, //锁定下拉
            },
            //上拉加载的配置项
            up: {
                callback: getListData, //上拉回调,此处可简写; 相当于 callback: function (page) { getListData(page); }
                noMoreSize: 0, //如果列表已无数据,可设置列表的总数量要大于半页才显示无更多数据;避免列表数据过少(比如只有一条数据),显示无更多数据会不好看; 默认5
                empty: {
                    icon: "/static/image/goodscollection/shoucang@2x.png", //图标,默认null
                    tip: "暂无相关数据~", //提示
                },
                clearEmptyId: "dataList", //相当于同时设置了clearId和empty.warpId; 简化写法;默认null
                htmlLoading: '<p class="upwarp-progress mescroll-rotate"></p><p class="upwarp-tip">加载中..</p>', //上拉加载中的布局
                htmlNodata: '<p class="upwarp-nodata">我是有底线的~</p>', //无数据的布局
                toTop: { //配置回到顶部按钮
                    src: "/static/image/application/mescroll-totop.png", //默认滚动到1000px显示,可配置offset修改
                    //html: null, //html标签内容,默认null; 如果同时设置了src,则优先取src
                    //offset : 1000
                }
            }
        });

        //点击切换排序
        $('.shop_index_tab').find(".shop_index_tab_list").click(function () {
            $(".shop_index_tab_default").show();
            $(".shop_index_filter").css({ "display": "none" });

            $(this).find(".shop_index_tab_default").hide();
            $(this).find(".shop_index_filter").css({ "display": "inline-block" });
            $(this).find('.shop_index_filter').find('img').toggleClass('shop_index_filter_img');

            if ($(this).index() == 0 || $(this).index() == 1) {
                $('input[name="order"]').val($(this).attr("data"));
            }

            if ($(this).index() == 2 || $(this).index() == 3) {
                $('input[name="order"]').val($(this).find('.shop_index_filter_img').attr("data"));
            }

            $(".shop_index_tab_list").removeClass("shop_index_tab_bold");
            $(this).addClass("shop_index_tab_bold");

            if ($('.product_list_list').length == 0) {
                $('input[name="keyword"]').val('');
            }

            //重置列表数据
            mescroll.resetUpScroll();
            //隐藏回到顶部按钮
            mescroll.hideTopBtn();
        })
        var path = window.location.pathname;
        var thisPath = '/member/shop/index/store_id/'+ <?php echo $store_info['store_id']; ?>+'/from/xinpin'
        if(path == thisPath){
            $('.shop_index_tab_list ').removeClass('shop_index_tab_bold');
            $('.new_pro').addClass('shop_index_tab_bold');
            $('input[name="order"]').val($('.new_pro').attr("data"));
        }
        //重置搜索数据
        function resets() {
            $('.index_search_pop').removeClass('index_pop_block');
            $(".shop_index_tab_list").removeClass("shop_index_tab_bold");
            $(".shop_index_tab_list").eq(0).addClass("shop_index_tab_bold");
            $('input[name="order"]').val('');
        }

        //搜索
        $(document).keyup(function (event) {
            if (event.keyCode == 13) {
                //重置数据
                resets()
                //重置列表数据
                mescroll.resetUpScroll();
                //隐藏回到顶部按钮
                mescroll.hideTopBtn();
            }
        });

        $('.index_pop_sousuo').click(function(){
            //重置数据
            resets()
            //重置列表数据
            mescroll.resetUpScroll();
            //隐藏回到顶部按钮
            mescroll.hideTopBtn();
        })
        /*联网加载列表数据  page = {num:1, size:10}; num:当前页 从1开始, size:每页数据条数 */
        function getListData(page) {
            //联网加载数据
            getListDataFromNet(page.num, page.size, function (curPageData) {
                //联网成功的回调,隐藏下拉刷新和上拉加载的状态;
                //mescroll会根据传的参数,自动判断列表如果无任何数据,则提示空;列表无下一页数据,则提示无更多数据;
                //console.log("pdType="+pdType+", page.num="+page.num+", page.size="+page.size+", curPageData.length="+curPageData.length);

                //方法四 (不推荐),会存在一个小问题:比如列表共有20条数据,每页加载10条,共2页.如果只根据当前页的数据个数判断,则需翻到第三页才会知道无更多数据,如果传了hasNext,则翻到第二页即可显示无更多数据.
                mescroll.endSuccess(curPageData.length);

                //设置列表数据
                setListData(curPageData);
            }, function () {
                //联网失败的回调,隐藏下拉刷新和上拉加载的状态;
                mescroll.endErr();
            });
        }

        /*设置列表数据*/
        function setListData(curPageData) {
            var listDom = document.getElementById("dataList");
            for (var i = 0; i < curPageData.length; i++) {
                var pd = curPageData[i];

                if (pd.sum_gp_num == null) {
                    pd.sum_gp_num = '0';
                }

                var str = '<div class="product_list_list lf">';
                str += '<div class="product_list_pic">';
                str += '<img src="' + pd.g_img + '">';
                str += '<div class="product_list_number">' + pd.sum_gp_num + '人已参与</div>';
                str += '</div>';
                str += '<p class="product_list_tit_p">' + pd.g_name + '</p>';
                str += '<p class="product_list_price clear">￥<span class="product_list_red">' + pd.min_price + '-' + pd.max_price + '</span></p>';
                str += '<span class="product_list_oldprice">' + pd.gp_market_price + '</span>';
                str += '</div>';

                var liDom = document.createElement("a");
                liDom.setAttribute("href", "/member/goodsproduct/index/g_id/" + pd.g_id + "");
                liDom.innerHTML = str;
                listDom.appendChild(liDom);
            }
        }

        /*联网加载列表数据
         在您的实际项目中,请参考官方写法: http://www.mescroll.com/api.html#tagUpCallback
         请忽略getListDataFromNet的逻辑,这里仅仅是在本地模拟分页数据,本地演示用
         实际项目以您服务器接口返回的数据为准,无需本地处理分页.
         * */
        function getListDataFromNet(pageNum, pageSize, successCallback, errorCallback) {
            //延时一秒,模拟联网
            setTimeout(function () {
                $.ajax({
                    type: 'post',
                    url: '/member/shop/index/',
                    data: {
                        store_id: '<?php echo $store_info['store_id']; ?>',
                        g_name: $('input[name="keyword"]').val(),
                        order: $('input[name="order"]').val(),
                        page: pageNum,
                        page_size: pageSize
                    },
                    dataType: 'json',
                    success: function (data) {
                        var listData = [];
                        for (var i = 0; i < data.list.length; i++) {
                            listData.push(data.list[i]);
                        }

                        //回调
                        successCallback(listData);
                    },
                    error: errorCallback
                });
            }, 1000)
        }
    });

    //关注和取消关注店铺
    function collection(id) {
        var is_login = "<?php echo $store_info['is_login']; ?>"
        if (is_login == 0) {
            layer.confirm("您还没有登录，请登录！", {
                title: false,/*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['知道啦', '前去登录'], //按钮
                // 按钮2的回调
                btn2: function () {                    
                    window.location.href = "/member/login/index";                    
                }
            })
        } else {
            // alert('前台发送此商家'+id+'后台判定是收藏还是取消关注res.states 0失败，1删除收藏成功 2收藏成功');
            $.post("/member/storecollection/store_collection", { store_id: id }, function (res) {
                var p_num = parseInt($('.p_num').html());
                if (res.status == 1) {
                    $('.shop_name_guanzhu').html('关注');
                    p_num = p_num - 1;
                    layer.msg('<span style="color:#fff">您已取消关注该店铺</span>', { time: 2000 });
                } else if (res.status == 2) {
                    $('.shop_name_guanzhu').html('已关注');
                    layer.msg('<span style="color:#fff">您已关注该店铺</span>', { time: 2000 });
                    p_num = p_num + 1
                }
                $('.p_num').html(p_num)
            })
        }
    }

    $(window).scroll(function () {
        // 滚动条距离顶部的距离 大于 200px时
        if ($(window).scrollTop() >= $('.shop_index_bgbanner').outerHeight()) {
            $('.shop_index_tab').addClass('psoi');
        } else {
            $('.shop_index_tab').removeClass('psoi');
        }
    });



</script> 
</html>