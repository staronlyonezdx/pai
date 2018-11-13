<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\project\pai\public/../application/index/view/index/search_winners.html";i:1541491294;s:63:"D:\project\pai\public/../application/index/view/index/base.html";i:1541491294;s:66:"D:\project\pai\public/../application/index/view/common/js_sdk.html";i:1541491293;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/index/search_winners.css">
<style>
    /*.mescroll-upwarp {*/
    /*padding: 0.5rem 0 1.6rem 0;*/
    /*}*/

    /*.layui-layer-msg {*/
    /*width: 3.8rem;*/
    /*}*/
</style>

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
        
<main>

    <div class="search">
        <!--搜索框-->
        <div class="index_search_pop_top clear">
            <a href="/">
                <div class="index_pop_text lf">
                    <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" alt=""/>
                </div>
            </a>
            <div class="index_search_pop_view clear lf">
                <div class="index_search_lfimg" class="lf">
                    <img src="__STATIC__/image/index/searchbar_icon_search1@2x.png">
                </div>
                <input type="text" name="keyword" class="index_pop_inp lf" autofocus="autofocus">

                <div class="index_search_cancel rt">
                    <img src="__STATIC__/image/index/icon_qingchu1@2x.png" alt="">
                </div>
            </div>
            <!-- <button type="submit" class="index_pop_sousuo rt"> 搜索</button> -->
            <a class="index_pop_sousuo rt"> 搜索</a>
        </div>


    </div>
    <!--搜索出的列表-->
    <div class="index_pop_search_main" id="mescroll">
        <ul class="index_pop_search_ul data-list" id="dataList">

        </ul>
    </div>
</main>

        <footer></footer>
    </body>

    <!--bugtags 开始-->
    <script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script>
    <script>
        // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本
        new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE');
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
<script>

    $(function () {

        // 格式化时间戳
        function formatDate(date) {

            var now = new Date(date)
            var year = now.getFullYear();
            var month = now.getMonth() + 1;
            var date = now.getDate();
            var hour = now.getHours();
            var minute = now.getMinutes();
            var second = now.getSeconds();
            if (second < 10) {
                second = "0" + second;
            }
            if (minute < 10) {
                minute = "0" + minute;
            }
            if (hour < 10) {
                hour = "0" + hour;
            }
            return year + "-" + month + "-" + date + " " + hour + ":" + minute + ":" + second;

        }

        // window.sessionStorage.setItem("type",type);//存数据到sessionStorage
        //创建MeScroll对象,内部已默认开启下拉刷新,自动执行up.callback,刷新列表数据;
        var mescroll = new MeScroll("body", {
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
                    icon: "/static/image/index/no-cont.png", //图标,默认null
                    tip: "吖吖这里没有您搜索的信息呢", //提示
                },
                clearEmptyId: "dataList", //相当于同时设置了clearId和empty.warpId; 简化写法;默认null
                htmlLoading: '<p class="upwarp-progress mescroll-rotate"></p><p class="upwarp-tip">加载中..</p>', //上拉加载中的布局
                htmlNodata: '<p class="upwarp-nodata">我是有底线的~</p>', //无数据的布局
                toTop: {
                    //配置回到顶部按钮
                    src: "/static/image/application/mescroll-totop.png", //默认滚动到1000px显示,可配置offset修改
                    //offset : 1000
                }
            }
        });

        /*联网加载列表数据  page = {num:1, size:10}; num:当前页 从1开始, size:每页数据条数 */
        function getListData(page) {
            //联网加载数据
            getListDataFromNet(page.num, page.size, function (curPageData) {
                //方法四 (不推荐),会存在一个小问题:比如列表共有20条数据,每页加载10条,共2页.如果只根据当前页的数据个数判断,则需翻到第三页才会知道无更多数据,如果传了hasNext,则翻到第二页即可显示无更多数据.
                mescroll.endSuccess(curPageData.length);

                //设置列表数据
                setListData(curPageData);
            }, function () {
                //联网失败的回调,隐藏下拉刷新和上拉加载的状态;
                mescroll.endErr();
            });
        }

        //清空搜索框
        $('.index_search_cancel').on("click", function () {
            $(this).siblings("input").val("");
            $(this).siblings("input").focus();
            $('.search_history').hide();
        });
        //点击搜索
        $(".index_pop_sousuo").click(function () {
            $(".shop_index_tab_list").removeClass("shop_index_tab_bold");
            $(".shop_index_tab_list").eq(0).addClass("shop_index_tab_bold");

            //重置列表数据
            mescroll.resetUpScroll();
            //隐藏回到顶部按钮
            mescroll.hideTopBtn();
        })
        /*设置列表数据*/
        function setListData(curPageData) {
            var listDom = document.getElementById("dataList");
                for (var i = 0; i < curPageData.length; i++) {

                    var pd = curPageData[i];

                    var award_time = formatDate(pd.award_time * 1000);
                    var str = '<li class="all_list_item clear">';
                    str += '<div class="all_list_left lf">';
                    str += ' <p class="all_list_name">【第245期】人气王中奖者公布运气也太好了吧!喜提iPhone X</p>';
                    // str += ' <div class="all_list_info">';
                    // str += '<img src="" alt="" class="winner_avert">';
                    // str += ' <span class="winner_name">超**鱼</span>';
                    // str += ' <img src="__STATIC__/image/index/icon_zhognjiang1@2x.png" alt="" class="winner_tip">';
                    // str += '</div>';

                    str += '<div class="details_tit_top clear">';
                    str += '<div class="details_imgs lf">';
                    str += '<img src="" alt="">';
                    str += ' </div>';
                    str += '<div class="details_imgs lf">';
                    str += '<img src="" alt="">';
                    str += ' </div>';
                    str += '<div class="details_imgs lf">';
                    str += '<img src="" alt="">';
                    str += ' </div>';
                    str += '<p class="lf">等共17人团中</p>';
                    str += ' </div>';



                    str += '<div class="all_list_data">';
                    str += '2018-10-24 15:24 · 52评论';
                    str += '</div>';
                    str += '</div>';
                    str += '<img src="" alt="" class="rt all_list_img">';
                    str += ' </li>';

                    var liDom = document.createElement("a");
                    liDom.setAttribute('href', '/pointpai/Pointgoods/index/g_id/' + pd.g_id);
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
                    url: '/index/index/search_index',
                    data: {
                        keyword: $('input[name="keyword"]').val(),
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

</script>

</html>