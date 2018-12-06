<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\project\pai\public/../application/activity/view/index/search.html";i:1544075010;s:67:"D:\project\pai\public/../application/activity/view/common/base.html";i:1541491285;s:69:"D:\project\pai\public/../application/activity/view/common/js_sdk.html";i:1541491285;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/activity/search.css">
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">

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
        
<mian style="margin-top: -0.88rem">
    <div class="search_top">
        <?php if($is_peanut==1): ?>
        <div class="search_top_hearder" style="background: #FDD42F">
            <?php else: ?>
            <div class="search_top_hearder">
                <?php endif; ?>
                <div class="goback lf close_top">
                    <?php if($is_peanut==1): ?>
                    <img src="__STATIC__/image/activity/icon_back@2x (1).png" alt="">
                    <?php else: ?>
                    <img src="__STATIC__/image/activity/icon_back@2x.png" alt="">
                    <?php endif; ?>
                </div>
                <div class="index_search lf">
                    <img src="__STATIC__/image/activity/icon_sousuo@2x.png" alt="" class="lf"
                         style="margin-left: 0.3rem;margin-top: 0.18rem">
                    <input type="text" placeholder="输入您想搜索的商品" autofocus class="search_input">
                </div>
                <?php if($is_peanut==1): ?>
                <span class="search_btn" style="color:#000000;font-weight: 600">搜索</span>
                <?php else: ?>
                <span class="search_btn">搜索</span>
                <?php endif; ?>
            </div>

            <div class="del_all rt" style="display: none">
                <img src="__STATIC__/image/activity/icon_del@2x.png" alt="">
            </div>
            <div class="search_top_content" style="display: none">
                <div class="search_top_item">
                    <p class="search_top_title">历史搜索</p>
                    <div class="search_item clear">
                        <a onClick="hclic(this)">
                            <div class="lf">iPhone X</div>
                        </a>
                        <a onClick="hclic(this)">
                            <div class="lf">Beats Beats Studio3</div>
                        </a>
                        <a onClick="hclic(this)">
                            <div class="lf">RGB背光键盘</div>
                        </a>
                        <a onClick="hclic(this)">
                            <div class="lf">刺绣条纹毛衣</div>
                        </a>


                    </div>
                </div>
                <div class="search_top_item">
                    <p class="search_top_title">火热参团中</p>
                    <div class="search_item claer">
                        <a onClick="hclic(this)">
                            <div class="lf">外星人 Gsync 游戏本</div>
                        </a>
                        <a onClick="hclic(this)">
                            <div class="lf">简约电视柜</div>
                        </a>
                        <a onClick="hclic(this)">
                            <div class="lf">GENANX印花连帽卫衣</div>
                        </a>
                        <a onClick="hclic(this)">
                            <div class="lf">三星人工智能黑色手机</div>
                        </a>
                    </div>
                </div>
            </div>
    </div>

    <div id="mescroll" class="mescroll">
        <!--展示上拉加载的数据列表-->
        <ul id="dataList" class="data-list clear">
            <!--<li class="content_item lf">-->
            <!--<img src="" alt="" class="info_img">-->
            <!--<div class="content_item_info">-->
            <!--<p class="content_info_name">iPhone XR 256G 深空灰色 双卡双待 全网通 限…</p>-->
            <!--<div class="progress clear">-->
            <!--<div class="progress_main lf">-->
            <!--<span style="width: 70%"></span>-->
            <!--</div>-->
            <!--<span class="progress_num lf">700%</span>-->
            <!--</div>-->
            <!--<div class="content_info_data">-->
            <!--<span class="info_price"><small>￥</small>1788.00</span>-->
            <!--<span class="join">100人参与</span>-->
            <!--</div>-->
            <!--</div>-->
            <!--</li>-->
        </ul>
    </div>
</mian>


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
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script>
var isPeanut = "<?php echo $is_peanut; ?>"
    // var path = window.location.pathname;
    // // console.log(path);
    //
    // function getUrl(path, name) {
    //     var pathArr = path.split('/');
    //     // console.log(pathArr);
    //     // console.log(pathArr.indexOf(name));
    //     if (pathArr.indexOf(name) > 0) {
    //         var index = pathArr.indexOf(name);
    //     }
    //     index = index + 1;
    //     return pathArr[index];
    // }

    // var keyWord = getUrl(path, 'keyword');
    // console.log(keyWord);
    // $('input[name="keyword"]').val(getUrl(path, 'keyword'))
    var code = "<?php echo $code; ?>";
    var keyWord = "<?php echo $keyword; ?>";
    console.log(keyWord);
    // if(keyWord==""){
    // }else{
        $('input[name="keyword"]').val(keyWord);
    // }
    
    //创建MeScroll对象,内部已默认开启下拉刷新,自动执行up.callback,刷新列表数据;
    var mescroll = new MeScroll("mescroll", {
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
                icon: "/static/image/activity/icon_ss@2x@2x@2x.png", //图标,默认null
                tip: "吖吖没有找到您想要的商品", //提示
                btntext: "再去逛逛", //按钮,默认""
                btnClick: function () {
                    //点击按钮的回调,默认null
                    window.location.href = "/index/index";
                },
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
            if(isPeanut == 1){
                console.log($('.empty-btn'));
                $('.empty-btn').addClass('is_peanut')
            }
        }, function () {
            //联网失败的回调,隐藏下拉刷新和上拉加载的状态;
            mescroll.endErr();
        });
    }


    $(".search_btn").click(function () {
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
            var str = '<li class="content_item lf">';
            str += '<div style="position: relative;width:3.34rem;height:3.34rem">'
            str += ' <img src="' + pd.g_s_img + '" alt="" class="info_img err_img">';
            if(isPeanut == 1){
                str += "<span class='is_peanut_sheng'>仅剩27人</span>"

            }
            str += '</div>'
            str += '<div class="content_item_info">';
            str += ' <p class="content_info_name">'
            if(isPeanut == 1){
                str+='<img src="__STATIC__/image/activity/icon_danren@2x.png">'
            }
            str += pd.g_name;
            str += '</p>';
            str += '<div class="progress clear">';
            if (isPeanut == 1) {
                str += '<div class="progress_main lf" style="background: #FFF4D1">';
                str += '<span style="width: ' + pd.proportion + '%;background: #FFC60A"></span>';
                str += '</div>';
            } else {
                str += '<div class="progress_main lf">';
                str += '<span style="width: ' + pd.proportion + '%"></span>';
                str += '</div>';
            }

            str += ' <span class="progress_num lf">' + pd.proportion + '%</span>';
            str += '</div>'
            if (isPeanut == 1) {
                str += '<p class="peanut_item_data"><img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">1788.00</p>'
            } else {
                str += '<div class="content_info_data clear">';
                str += '<span class="info_price lf"><small>￥</small>' + pd.gdr_price + '</span>';
                str += '<span class="join rt">' + pd.pai_num + '人参与</span>';
                str += '</div>';

            }
            str += '</div>';
            str += ' </li>';
            var liDom = document.createElement("a");
            liDom.setAttribute("href", '/member/goodsproduct/index/g_id/' + pd.g_id);
            liDom.innerHTML = str;
            listDom.appendChild(liDom);
            if(isPeanut == 1){
                $('.content_item_info').css('margin-top','0.8rem')
            }
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
                url: '/activity/index/get_activity_goods',
                data: {
                    page: pageNum,
                    page_size: pageSize,
                    code: 'act1543473374',
                    // code: code,
                    keyword: $('input[name="keyword"]').val()
                },
                dataType: 'json',
                success: function (data) {

                    var listData = [];
                    for (var i = 0; i < data.data.length; i++) {
                        listData.push(data.data[i]);
                    }
                    //回调
                    successCallback(listData, data.total_num);
                    // var recommend = $('.recommend');
                    // recommend.html('11')
                    // // console.log(recommend);
                    // $('.mescroll-upwarp').after(recommend)
                    // $('.recommend').show()
                },
                error: errorCallback
            });
        }, 1000)
    }

    $('.goback').click(function () {
        window.history.back()
    })
</script>

</html>