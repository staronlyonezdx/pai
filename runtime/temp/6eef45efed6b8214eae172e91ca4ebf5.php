<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:73:"D:\project\pai\public/../application/member/view/orderpai/paier_list.html";i:1543312462;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543280491;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/all_participants.css">
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
            <div class="header_back" onClick="javascript:history.go(-1);">
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>
</header>
        <header></header>
        
<main>
    <div class="all_participants_header">
        <div class="all_participants_tab clear">
            <div class="all_participants all_participants_border lf">
                <span>
                    <span class="title">所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icon_xia@2x.png" class="all_participants_inline">
                    <img src="__STATIC__/image/orderpai/icon_shang@2x.png">
                </span>
            </div>
            <div class="all_participants lf">
                <a href="/member/orderpai/pai_rule">
                    <span>揭晓规则<img src="__STATIC__/image/orderpai/icon__@2x.png"></span>
                </a>
            </div>
        </div>
        <div class="all_participants_postion ">
            <div class="all_participants_screen">
                <div class="all_participants_list all_participants_black" select_type="0">所有参与者</div>
                <div class="all_participants_list" select_type="1">只看我的</div>
                <?php if($goods['is_fudai'] == 1): ?>
                <div class="all_participants_list" select_type="2">只看大福袋</div>
                <?php else: ?>
                <div class="all_participants_list" select_type="2">只看抽中者</div>
                <?php endif; ?>
            </div>
            <div class="all_participants_zhezhao"></div>
        </div>
    </div>
    <?php if(!(empty($awardinfo) || (($awardinfo instanceof \think\Collection || $awardinfo instanceof \think\Paginator ) && $awardinfo->isEmpty()))): ?>
    <div class="paier_detail">
        <div class="paier_detail_bg">
            <div class="paier_con">
                <div class="paier_view">
                    <img src="<?php echo (isset($awardinfo['m_s_avatar']) && ($awardinfo['m_s_avatar'] !== '')?$awardinfo['m_s_avatar']:'__STATIC__/image/myhome/TIM20180731142117.jpg'); ?>" class="tuanzhong">
                </div>
                <?php if($awardinfo['o_play_type'] == 1): if($goods['is_fudai'] == 1): ?>
                    <div class="paier_view_img">
                        <img src="__STATIC__/image/orderpai/dfd2.png" alt="">
                    </div>
                <?php else: ?>
                    <div class="paier_view_img">
                        <img src="__STATIC__/image/orderpai/icon_zhongpai@2x.png" alt="">
                    </div>
                <?php endif; elseif($awardinfo['o_play_type'] == 2): ?>
                    <div class="paier_view_img">
                        <img src="__STATIC__/image/orderpai/jxzp.png" alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- <img src="__STATIC__/image/orderpai/bg_zhuangshi@2x.png" alt="" class=""> -->
        <p class="paier_detail_name"><?php echo (isset($awardinfo['m_name']) && ($awardinfo['m_name'] !== '')?$awardinfo['m_name']:''); ?></p>
        <p class="paier_detail_yaya">吖吖码：<?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></p>
    </div>
    <?php endif; ?>

    <div class="all_participants_main content-view">
        <div class="lists-view" id="dataList"></div>
    </div>
    <input type="hidden" name="gdr_id" value="<?php echo (isset($gdr_id) && ($gdr_id !== '')?$gdr_id:0); ?>"/>
    <input type="hidden" name="o_periods" value="<?php echo (isset($o_periods) && ($o_periods !== '')?$o_periods:0); ?>"/>
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
    $(function () {
        // 折id
        var gdr_id = $("input[name=gdr_id]").val();
        // 期数
        var o_periods = $("input[name=o_periods]").val();
        // 参与者类型
        var type = 0;

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
        
        //点击显示隐藏所有参与类型
        $(".all_participants_border").click(function () {
            $(".all_participants_border").find("img").toggleClass("all_participants_inline");
            $(".all_participants_postion").toggleClass("all_participants_block");             
        })
        
        //隐藏下拉参与类型
        $('.all_participants_zhezhao').click(function(){
            $(".all_participants_border").find("img").toggleClass("all_participants_inline");
            $(".all_participants_postion").toggleClass("all_participants_block");
        })

        //点击选择参与类型
        $(".all_participants_list").click(function () {
            $(".all_participants_list").removeClass("all_participants_black");
            $(this).addClass("all_participants_black");
            $(".all_participants_postion").removeClass("all_participants_block");

            type = $(this).attr("select_type");
            var this_title = $(".all_participants_black").html();
            $(".title").html(this_title);

            //重置列表数据
            mescroll.resetUpScroll();
            //隐藏回到顶部按钮
            mescroll.hideTopBtn();
        })

        /*联网加载列表数据  page = {num:1, size:10}; num:当前页 从1开始, size:每页数据条数 */
        function getListData(page) {
            //联网加载数据
            getListDataFromNet(page.num, page.size, function (curPageData,total_num) {
                //方法二(推荐): 后台接口有返回列表的总数据量 totalSize
                mescroll.endBySize(curPageData.length, total_num); //必传参数(当前页的数据个数, 总数据量) 

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

                if(pd.m_s_avatar == '' || pd.m_s_avatar == null) {
                    pd.m_s_avatar = '__STATIC__/image/myhome/TIM20180731142117.jpg';
                }
                if(pd.o_state == 2 || pd.o_state == 3 || pd.o_state == 4 || pd.o_state == 5) {
                    var str = '<div class="all_participants_main_list clear fdbg">';
                }else {
                    var str = '<div class="all_participants_main_list clear">';
                }
                str += '<div class="all_participants_main_picview lf">';
                str += '<div class="all_participants_main_pic">';
                str += '<img src="' + pd.m_s_avatar + '">';
                str += '</div>';
                if(pd.o_state == 2 || pd.o_state == 3 || pd.o_state == 4 || pd.o_state == 5) {
                    str += '<div class="all_participants_zhongpai">';
                    if(pd.o_play_type == 1) {
                        if(pd.o_is_fudai == 1) {
                            str += '<img src="/static/image/orderpai/dfd2.png" />';
                        }else {
                            str += '<img src="/static/image/orderpai/icon_zhongpai@2x.png" />';
                        }   
                    }else if(pd.o_play_type == 2) {
                        str += '<img src="/static/image/orderpai/jxzp.png" />';
                    }
                    str += '</div>';
                }
                str += '</div>';
                str += '<div class="all_participants_text lf clear">';
                str += '<p>' + pd.m_name + '<span>' + msToDate(pd.o_paytime * 1000).wasTime + '</span></p>';
                str += '<div>拥有' + pd.gp_num + '份吖吖码<img src="/static/image/orderpai/icom_jump@2x.png" class="rt"></div>';
                str += '</div>';
                str += '</div>';

                var liDom = document.createElement("a");
                liDom.setAttribute("href", "/member/orderpai/paier_info/o_id/" + pd.o_id + "");
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
        function getListDataFromNet(pageNum, pageSize, successCallback, errorCallback) {
            //延时一秒,模拟联网
            setTimeout(function () {
                $.ajax({
                    type: 'post',
                    url: '/member/Orderpai/get_paier_list',
                    data: {
                        gdr_id: gdr_id,
                        o_periods: o_periods,
                        type: type,
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
    $('img').on('error',function(){
        $(this).attr('src','/static/image/index/pic_home_taplace@2x.png');
    })
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>