<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"D:\project\pai\public/../application/member/view/orderpai/order_search.html";i:1542847769;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/goods/my_publish1.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goods/search_index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/stroe/index.css">
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
</div> </header>
        <header></header>
        

<main style="margin: 0.88rem 0 0 0">
    <!--展示上拉加载的数据列表-->
    <div id="dataList" class="data-list"></div>
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
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script src="__STATIC__/js/clipboard.min.js"></script>
<script type="text/javascript" src="__JS__/md5.js"></script>
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script>
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
                    tip: "暂无搜索结果~", //提示
                    btntext: "先去逛逛", //按钮,默认""
                    btnClick: function(){
                        window.location.href="/member/Orderpai/orderlist/type/0/"
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
            getListDataFromNet(page.num, page.size, function (curPageData,total_num) {
                //方法二(推荐): 后台接口有返回列表的总数据量 totalSize
                //必传参数(当前页的数据个数, 总数据量)
                mescroll.endBySize(curPageData.length, total_num);

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
                var fh = '';
                var bt = '';
                var time = '';
                var pay = '';         
                if(pd.is_close==1){
                    fh = '<span class="my_publish_hint my_publish_gray rt">已关闭</span>';
                    time = '<p class="rt">截止时间：'+ msToDate(pd.g_endtime * 1000).wasTime +'</p>';
                } 
                if (pd.o_paystate == 1) {
                    if(pd.live_paytime > 0 && pd.o_isdelete < 2) {
                        fh = '<span class="my_publish_hint rt">等待付款</span>';
                        time = '<p class="rt">截止时间：'+ msToDate(pd.g_endtime * 1000).wasTime +'</p>';
                        pay = '<div class="zfs fl">需支付 ￥'+ pd.o_totalmoney +'</div>';
                        // bt = '<div class="my_publish_share rt hs" data-id="' + pd.o_id + '" price="' + pd.o_totalmoney + '" onclick="pay(this)"><span>付款</span></div><div class="my_publish_share rt" data-id="' + pd.o_id + '" onclick="cancel(this)"><span>取消订单</span></div>';
                    }                        
                } else if (pd.o_paystate > 1) {
                    if(pd.o_state == 1) {
                        fh = '<span class="my_publish_hint rt">等待揭晓</span>';
                        time = '<p class="rt">截止时间：' + msToDate(pd.g_endtime * 1000).wasTime +'</p>';
                        // bt = '<div class="my_publish_share rt my_pub_share" onclick="share(this)" url="'+ pd.url +'" desc="'+ pd.share_desc +'" tit="'+ pd.share_title +'" imgs="'+ pd.gp_img +'" code="'+ pd.code +'" data-id="' + pd.o_id + '"><img src="__STATIC__/image/orderpai/fenxiang.png" /><span>分享商品</span></div>';
                    }
                    if(pd.o_state == 2 || pd.o_state == 12) {
                        fh = '<span class="my_publish_hint rt">等待发货</span>';
                        time = '<p class="rt">揭晓时间：' + msToDate(pd.o_publishtime * 1000).wasTime +'</p>';                            
                        // bt = '<div class="my_publish_share rt" data-id="' + pd.o_id + '"><span><a href="tel:400-027-1888">联系客服</span></a></div>';
                    }
                    if(pd.o_state == 3 || pd.o_state == 13) {
                        fh = '<span class="my_publish_hint rt">等待收货</span>';
                        time = '<p class="rt">揭晓时间：' + msToDate(pd.o_publishtime * 1000).wasTime +'</p>';                            
                        // bt = '<div class="my_publish_share rt" data-id="' + pd.o_id + '"><span onclick="logistics_info(this)">发货信息</span></div><div class="my_publish_share rt hs" data-id="' + pd.o_id + '" onclick="confirms(this)"><span>确认收货</span></div>';
                    }
                    if(pd.o_state == 4 || pd.o_state == 14) {
                        fh = '<span class="my_publish_hint rt">等待评价</span>';
                        time = '<p class="rt">揭晓时间：' + msToDate(pd.o_publishtime * 1000).wasTime +'</p>';                            
                        // bt = '<div class="my_publish_share rt hs" data-id="' + pd.o_id + '"><span onclick="review_order(this)">评价商品</span></div>';
                    }
                    if(pd.o_state == 5 || pd.o_state == 15) {
                        fh = '<span class="my_publish_hint rt ls">已完成订单</span>';
                        time = '<p class="rt">揭晓时间：' + msToDate(pd.o_publishtime * 1000).wasTime +'</p>';                            
                        // bt = '<div class="my_publish_share rt" data-id="' + pd.o_id + '"><span>随便逛逛</span></div><div class="my_publish_share rt" data-id="' + pd.o_id + '" onclick="del(this)"><span>删除订单</span></div>';
                    }
                    if(pd.o_state == 10 || pd.o_state == 11) {
                        if(pd.o_paystate == 3) {
                            fh = '<span class="my_publish_hint rt">退款中</span>';
                            time = '<p class="rt">揭晓时间：' + msToDate(pd.o_publishtime * 1000).wasTime +'</p>';                            
                            // bt = '<div class="my_publish_share rt" data-id="' + pd.o_id + '"><span onclick="refund_info(this)">退款详情</span></div>';
                        }
                        if(pd.o_paystate == 4) {
                            fh = '<span class="my_publish_hint rt ls">已完成退款</span>';
                            time = '<p class="rt">揭晓时间：' + msToDate(pd.o_publishtime * 1000).wasTime +'</p>';                            
                            // bt = '<div class="my_publish_share rt" data-id="' + pd.o_id + '"><span onclick="refund_info(this)">退款详情</span></div><div class="my_publish_share rt" data-id="' + pd.o_id + '" onclick="del(this)"><span>删除订单</span></div>';
                        }                            
                    }
                }

                var str = '<div class="my_publish_tit clear">';
                str += '<a href="/member/shop/index/store_id/'+ pd.store_id + '">';
                str += '<span class="my_publish_bh lf">';
                if(pd.store_logo == null || pd.store_logo == ''){
                    pd.store_logo = '__STATIC__/image/myhome/TIM20180731142117.jpg'
                }
                str += '<img src="' + pd.store_logo + '" alt="">' + pd.stroe_name + '</span></a>';
                str += fh;
                str += '</div>';
                str += '<a href="/member/orderpai/index/o_id/' + pd.o_id + '">';
                str += '<div class="my_publish_main clear">';
                str += '<div class="my_publish_img lf pmg">';
                if(pd.is_fudai == 1 || pd.is_huodong == 1) {
                    str += '<div class="fd"></div>';
                }

                str += '<img src="' + pd.g_s_img + '">';
                str += '</div>';
                str += '<div class="my_publish_text lf pmgd">';
                if(pd.is_fudai == 1) {
                    str += '<p><img src="__STATIC__/image/goodsproduct/icon_chaozhigou@2x.png">&nbsp;' + pd.g_name + '</p>';
                }else if(pd.is_huodong == 1) {
                    str += '<p><img src="__STATIC__/image/goodsproduct/Icon_11biaoshi@2x.png">&nbsp;' + pd.g_name + '</p>';
                }else {
                    str += '<p>' + pd.g_name + '</p>';
                }                
                str += '<div class="my_publish_price clear">';
                str += '<span class="my_publish_new">' + pd.o_money;
                str += '<span>￥' + pd.gp_market_price + '</span>';
                str += '</span>';
                str += '<span class="my_publish_inventory rt">x';
                str += '<span>' + pd.gp_num + '</span>';
                str += '</span>';
                str += '</div>';
                str += '</div>';
                str += '</div>';
                str += '</a>';
                str += '<div class="my_publish_data clear">';
                    if("<?php echo $is_lord; ?>"==1){
                        
                    }else{
                        str += '<p class="lf">含' + pd.pai_num + '份吖吖码</p>';
                    }
                
                str += time;
                str += '</div>';
                str += '<div class="my_publish_btn clear">';
                str += pay;
                str += bt;
                str += '</div>';

                var liDom = document.createElement("div");
                liDom.className = "my_publish_list";
                liDom.innerHTML = str;
                listDom.appendChild(liDom);

                $('.my_publish_bh img').error(function(){
                    $(this).attr('src','/static/image/index/pic_home_taplace@2x.png');
                })
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
                    url: '/member/Orderpai/getorderlist/',
                    data: {
                        keyword: '<?php echo $keyword; ?>',
                        page: pageNum,
                        size: pageSize
                    },
                    dataType: 'json',
                    success: function (data) {
                        var listData = [];
                        for (var i = 0; i < data.data.length; i++) {
                            listData.push(data.data[i]);
                        }

                        //回调
                        successCallback(listData,data.total_num);
                    },
                    error: errorCallback
                });
            }, 1000)
        }
    });
</script> 

</html>