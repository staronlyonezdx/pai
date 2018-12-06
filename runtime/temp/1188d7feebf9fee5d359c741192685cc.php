<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"D:\project\pai\public/../application/pointpai/view/pointgoods/goods_list.html";i:1543915599;s:67:"D:\project\pai\public/../application/pointpai/view/common/base.html";i:1543280491;s:69:"D:\project\pai\public/../application/pointpai/view/common/js_sdk.html";i:1541491294;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/pointpai/pointpai.css">

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
            <div class="header_back"  <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back(-1);" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >
            <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smts">
        </div>
        <a class="isds" href="/pointpai/Pointorder/orderlist/i/0">
            <div class="pointpai_dingdan">
                <img src="__STATIC__/image/pointpai/icon_dingdan@2x.png" alt="" >
            </div>
        </a>
    </div>
</div>
</div>
</header>
        
<main>

    <!--头部开始-->
    <!--登录显示-->
    
    <div class="pointpai_header">
        <a href="/member/sitelogin/to_sy/status/1">
            <div>
                <?php if($tui_user['m_avatar'] != ''): ?>
                <img src="<?php echo $tui_user['m_s_avatar']; ?>" class="pai_img">
                <?php else: ?>
                <img src="/static/image/myhome/TIM20180731142117.jpg" class="pai_img">
                <?php endif; ?>
                <div class="pai_info">
                    <p><?php echo isset($tui_user['m_name']) ? $tui_user['m_name'] :  ''; ?></p>
                    <p><img src="__STATIC__/image/pointpai/icon_jifen@2x.png" alt="" style="width:0.42rem;height:0.42rem"> <?php echo isset($tui_user['tui_diamond']) ? $tui_user['tui_diamond'] :  ''; ?></p>
                    <!--<p>当前积分 <?php echo isset($tui_user['tui_diamond']) ? $tui_user['tui_diamond'] :  ''; ?></p>-->
                </div>
            </div>
        </a>
        <a href="/member/sitelogin/to_sy/status/2">
            <img src="__STATIC__/image/pointpai/icon_anniu@2x.png" alt="" class="anniu">
        </a>
    </div>

    <!--未登录显示-->
    <div class="no_login">
        <a href="javascript:;">登录/注册</a>
    </div>
    <div class="pointpai_img">
        <?php if($wi_img['wi_href'] == ''): ?>
        <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original='<?php echo $wi_img['wi_imgurl']; ?>' />
        <?php else: ?>
        <a href="<?php echo $wi_img['wi_href']; ?>">
            <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original='<?php echo $wi_img['wi_imgurl']; ?>' />
        </a>
        <?php endif; ?>
    </div>
    <img src="__STATIC__/image/pointpai/icon_jingpin@2x.png" alt="" class="jingpin">
    <div class="pointpai_wrap">
        <div class="pointpai_content clear" id="dataList"></div>
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

    
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
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
<script>
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
                icon: "/static/image/goodscollection/shoucang@2x.png", //图标,默认null
                tip: "暂无产品~", //提示
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
        for (var i = 0; i <curPageData.length; i++) {
            var pd = curPageData[i];
            if(pd.gp_sum == null) {
                pd.gp_sum = 0;
            }
            var str = '<div class="pointpai_item">';
            str += '<div class="pointpai_item_img">';
            // str += '<img src="__STATIC__/image/goodsproduct/icon_vipjb@2x.png" alt="" class="vip lf">';
            str += '<img src="__STATIC__/image/goodsproduct/icon_vipjb1@2x.png" alt="" class="vip lf">';
            str += '<img src="'+pd.g_s_img+'" alt="">';
            str += '<span>'+pd.gp_sum+'人参与</span>';
            str += '</div>';
            str += '<div class="pointpai_item_info">';
            str += '<p class="pointpai_name">'+pd.g_name+'</p>';                     
            str += '<p>'+pd.gp_sale_price+'<span>积分</span></p>';
            str += '</div>';
            str += '</div>';

            var liDom = document.createElement("a");
            liDom.setAttribute('href','/pointpai/Pointgoods/index/g_id/'+pd.g_id);
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
                url: '/pointpai/pointgoods/goods_list/page/' + pageNum + '/page_size/' + pageSize,
                dataType: 'json',
                success: function (data) {
                    var listData = [];
                    for (var i = 0; i < data.list.length; i++) {
                        listData.push(data.list[i]);
                    }
                    //回调
                    successCallback(listData,data.total_num);
                },
                error: errorCallback
            });
        }, 1000)
    }

    // 判断是否登录
    var is_login = "<?php echo $is_login; ?>";
    console.log(is_login);
    if(is_login == 1) {
        $('.pointpai_header').show();
        $('.no_login').hide();
        $('.isds').show();
    }else{
        $('.no_login').show();
        $('.pointpai_header').hide();
        $('.isds').hide();
    }
$('.no_login a').click(function(){
    window.location.href = '/member/login/index.html'
})
    //处理无图时添加默认图
    $('img').on('error',function(){ 
        $(this).attr('src','/static/image/index/pic_home_taplace@2x.png'); 
    });
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>