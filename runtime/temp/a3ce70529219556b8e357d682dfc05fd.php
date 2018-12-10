<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\project\pai\public/../application/member/view/myhome/visit_list.html";i:1544153225;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1544154864;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/dropload/dropload.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goodscollection/goods_list.css">
<link rel="stylesheet" type="text/css" href="__CSS__/storecollection/store_list.css">
<link rel="stylesheet" type="text/css" href="__CSS__/myhome/visit_list.css"> 
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
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
        <!-- <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script> -->
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <!-- <script src="__JS__/login/loginsdk.js"></script> -->
        <!--web im sdk 登出 示例代码-->
        <!-- <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script> -->
        
        <title></title>
    </head>
    <body>
        <header></header>
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

    <div class="goods_list_fix clear" style="display: none;">
        <div class="goods_list_manage rt">管理</div>
    </div>

    <div class="goods_list" style="display: none;">
        <div class="goods_list_img">
            <img src="__STATIC__/image/application/no-c.png" alt="" />
        </div>
        <p>咦？这么多热拍商品没逛过？
            <br>快跟吖吖一块去看看吧！</p>
            <a href="/"><div class="goods_list_btn">去逛逛</div></a>
    </div>

    <div class="hostiy">
        <div class="hostiy-cont">

        </div>
    </div>

    <div class="bh"></div>
    <div class="store-panel phonex">
        <div class="checkAll">全选</div>
        <button>删除</button>
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
<script src="__JS__/dropload/dropload.js"></script>
<script src="__JS__/Public.js"></script>
<script>
    var itemIndex = 0;//点击的索引值
    var tabLoadEnd = false;//加载后已没有数据
    var page = 0;
    // 上拉加载
    var dropload = $('.hostiy').dropload({
        scrollArea: window,
        domDown: {
            domClass: 'dropload-down',
            domRefresh: '<div class="dropload-refresh">上拉加载更多</div>',
            domLoad: '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
            domNoData: '<div class="dropload-noData">已无数据</div>'
        },
        loadDownFn: function (me) {
            setTimeout(function () {
                if (tabLoadEnd) {
                    me.resetload();
                    me.lock();
                    me.noData();
                    me.resetload();
                    return;
                }
                page++;
                $.ajax("/member/myhome/visit_list/page/" + page, {
                    data: {},
                    dataType: 'json',//服务器返回json格式数据
                    type: 'get',//HTTP请求类型
                    success: function (res) {
                        //获得服务器响应
                        var html = '';
                        if (res.list.length > 0) {
                            $('.goods_list_fix').show();
                            for (var i = 0; i < res.list.length; i++) {
                                if (res.new_num > 0) {
                                    res.new_num--;
                                } else {
                                    tabLoadEnd = true;
                                    break;
                                }
                                if(res.list[i].time != $('.hostiy-list-title').last().text()) {
                                    html += '<h3 class="hostiy-list-title">'+ res.list[i].time +'</h3>';
                                }
                                for(var j = 0; j<res.list[i].info.length; j++) {
                                    if ($('.goods_list_manage').text() == '管理') {
                                        html += '<div class="hostiy-list-item">';
                                    }else {
                                        html += '<div class="hostiy-list-item pr">';
                                    }
                                    html += '<a href="/member/goodsproduct/index/g_id/'+ res.list[i].info[j].g_id +'">';
                                    html += '<img src="'+ res.list[i].info[j].g_s_img +'">';
                                    html += '<div class="ostiy-list-mm">';
                                    html += '<p>'+ res.list[i].info[j].g_name +'</p>';
                                    html += '<span>￥<i>'+ res.list[i].info[j].gdr_price +'</i></span>';
                                    html += '<small>'+ res.list[i].info[j].sum_num +'人已参与</small>';
                                    html += '</div>';
                                    html += '</a>';
                                    
                                    if ($('.goods_list_manage').text() == '管理') {
                                        if(res.list[i].info[j].is_collection == 2) {
                                            html += '<em onclick="collection(this,'+ res.list[i].info[j].g_id +')">收藏</em>';
                                        }else {
                                            html += '<em onclick="collection(this,'+ res.list[i].info[j].g_id +')" class="active">取消收藏</em>';
                                        }
                                    } else {
                                        if(res.list[i].info[j].is_collection == 2) {
                                            html += '<em onclick="collection(this,'+ res.list[i].info[j].g_id +')" style="display:none">收藏</em>';
                                        }else {
                                            html += '<em onclick="collection(this,'+ res.list[i].info[j].g_id +')" style="display:none" class="active">取消收藏</em>';
                                        }                                        
                                    }
                                    if ($('.store-panel').find('div').attr('class') == 'checkAll select') {
                                        html += '<div class="hostiy-list-check"><span class="select" data-id="'+ res.list[i].info[j].vgh_id +'" onclick="checkItem(this)"></span></div>';
                                    } else {
                                        html += '<div class="hostiy-list-check"><span class="" data-id="'+ res.list[i].info[j].vgh_id +'" onclick="checkItem(this)"></span></div>';
                                    }                                             
                                    html += '</div>';
                                }                       
                            }
                            $('.hostiy-cont').append(html);

                        } else {
                            tabLoadEnd = true;
                            if ($('.hostiy-cont').find('.hostiy-list-item').length == 0) {
                                $('.goods_list').show();
                                $('.goods_list_fix').remove();
                                $('.hostiy').remove();
                            }
                            me.noData();
                        }
                        me.resetload();
                    }
                });
            }, 500);
        }
    });

    //切换足迹选中状态
    function checkItem(obj) {
        $(obj).toggleClass("select");
        $('.hostiy-list-check').each(function(){
            if($(this).find('span').attr('class') == 'select') {
                $('.checkAll').addClass('select');
            }else {
                $('.checkAll').removeClass('select');
                return false;
            }
        })
    }

    //切换管理店足迹选中状态
    $('.goods_list_manage').on("click", function () {
        if ($(this).text() == '管理') {
            $(this).text('完成');
        } else {
            $(this).text('管理');
        }

        //显示隐藏底部全选
        $('.store-panel').toggle();
        $('.bh').toggle();

        //显示隐藏“收藏”按钮
        $('.hostiy-list-item').find('em').toggle();

        $('.hostiy-list-item').toggleClass('pr');

    })

    //全选按钮
    $('.checkAll').click(function () {
        $(this).toggleClass('select');

        if ($(this).attr('class') == 'checkAll select') {
            $('.hostiy-list-check span').addClass('select');
        } else {
            $('.hostiy-list-check span').removeClass('select');
        }
    })

    //删除足迹
    $('.store-panel').find('button').on("click", function () {
        var arr = [];
        $('.hostiy').find('.hostiy-list-check').find('.select').each(function () {
            var id = $(this).attr('data-id');
            console.log(id);
            arr.push(id);
            console.log(arr);
        });
        if (arr.length == 0) {
            layer.msg('<span style="color:#fff">请选择要删除的足迹</span>');
            return false;
        }
        $.ajax("/member/myhome/del_visit", {
            data: {
                vgh_id: arr
            },
            dataType: 'json',//服务器返回json格式数据
            type: 'post',//HTTP请求类型
            success: function (res) {
                if (res.status == 1) {
                    layer.msg('<span style="color:#fff">' + res.msg + '</span>',{time: 2000},function(){
                        location.reload();
                    });
                } else {
                    layer.msg('<span style="color:#fff">' + res.msg + '</span>');
                }
            }
        });
    })

    //收藏和取消收藏商品
    function collection(obj,id) {
        
        if($(obj).text() == "收藏") {
            //收藏
            $.ajax("/member/Goodscollection/add_collection/", {
                data: {
                    g_id: id
                },
                dataType: 'json',//服务器返回json格式数据
                type: 'post',//HTTP请求类型
                success: function (res) {
                    if (res.status == 1) {
                        layer.msg('<span style="color:#fff">' + res.msg + '</span>',{time: 2000});
                        $(obj).text("取消收藏");
                        $(obj).addClass('active');
                    } else {
                        layer.msg('<span style="color:#fff">' + res.msg + '</span>');
                    }
                }
            });
        }else {
            //取消收藏
            $.ajax("/member/Goodscollection/add_collection/", {
                data: {
                    g_id: id
                },
                dataType: 'json',//服务器返回json格式数据
                type: 'post',//HTTP请求类型
                success: function (res) {
                    if (res.status == 1) {
                        layer.msg('<span style="color:#fff">' + res.msg + '</span>',{time: 2000});
                        $(obj).text("收藏");
                        $(obj).removeClass('active');
                    } else {
                        layer.msg('<span style="color:#fff">' + res.msg + '</span>');
                    }
                }
            });
        }
    }

    var header_path = "<?php echo isset($header_path) ? $header_path :  ''; ?>";
    //返回按钮
    function backH5() {        
        if(header_path != '') {
            window.location.href = header_path;
        }else {
            window.history.back();
        }
    }
</script> 
    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>