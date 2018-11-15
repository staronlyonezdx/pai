<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\project\pai\public/../application/member/view/storecollection/store_list.html";i:1541491284;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/goods/search_index.css"> 
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
        <div class="goods_list_search lf">
            <img src="__STATIC__/image/goods/icon_nav_sousuo@2x.png" alt="" />
        </div>
        <div class="goods_list_manage lf">管理</div>
    </div>

    <!-- <form action="/member/storecollection/search_store_list" method="post"> -->
        <div class="index_search_pop">
            <!--搜索框-->
            <div class="index_search_pop_top clear">
                <div class="index_pop_text lf">
                    <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" alt=""/>
                </div>
                <div class="index_search_pop_view clear lf">
                    <div class="index_search_lfimg" class="lf">
                        <img src="__STATIC__/image/index/searchbar_icon_search@2x.png">
                    </div>
                    <input type="text" name="store_name" class="index_pop_inp lf">
    
                    <div class="index_search_cancel rt">
                        <img src="__STATIC__/image/index/icon_search_clear@2x.png" alt="">
                    </div>
                </div>
                <a class="index_pop_sousuo rt"> 搜索</a>
            </div>
            <?php if(!(empty($searchs['self']) || (($searchs['self'] instanceof \think\Collection || $searchs['self'] instanceof \think\Paginator ) && $searchs['self']->isEmpty()))): ?>
            <!--历史搜索-->
            <div class="index_pop_history_view history">
                <div class="index_pop_history clear">
                    <p class="lf">历史搜索</p>
    
                    <div class="rt del_search">清除</div>
                </div>
                <div class="index_pop_history_main clear">
                    <?php if(is_array($searchs['self']) || $searchs['self'] instanceof \think\Collection || $searchs['self'] instanceof \think\Paginator): $i = 0; $__LIST__ = $searchs['self'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="lf"><?php echo $vo; ?></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <!--搜索出的列表-->
            <div class="index_pop_search_main">
                <ul class="index_pop_search_ul">
    
                </ul>
            </div>
        </div>
    <!-- </form> -->

    <div class="goods_list" style="display: none; background: #fff">
        <div class="goods_list_img">
            <img src="__STATIC__/image/goodscollection/shoucang@2x.png" alt="" />
        </div>
        <p>暂时没有收藏的店铺，去逛逛吧！</p>
        <a href="/index/index/index"><div class="goods_list_btn">去逛逛</div></a>
    </div>

    <div class="store">
        <div class="store-list">
            <div class="store-list-plist">

            </div>
        </div>
    </div>

    <!-- 好店推荐 S -->
    <div class="store-good" style="display: none">
        <h3 class="store-good-title">好店推荐</h3>
        <div class="store-list">
            <div class="store-list-plist">

            </div>
        </div>
    </div>
    <!-- 好店推荐 E -->

    <div class="bh"></div>
    <div class="store-panel">
        <div class="checkAll">全选</div>
        <button>取消关注</button>
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
<script>
     //点击搜索
 $(".index_pop_sousuo").click(function(){
        var store_name=$("input[name='store_name']").val();
        // var typ=$("input[name='type']").val();
        // console.log(keyword);
        // console.log(typ);
        window.location.href="/member/storecollection/search_store_list/store_name/"+store_name;
    })


    $(".goods_list_search").click(function(){
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

    //店铺产品列表只有一个产品改变产品宽度
    $('.store-list-img').each(function () {
        if ($(this).find('.store-img-item').length == 1) {
            $(this).find('.store-img-item').css({ "width": "3rem", "height": "3rem" })
        }
    })

    var itemIndex = 0;//点击的索引值
    var tabLoadEnd = false;//加载后已没有数据
    var page = 0;
    // 上拉加载
    var dropload = $('.store').find('.store-list').dropload({
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
                $.ajax("/member/storecollection/store_list/page/" + page, {
                    data: {},
                    dataType: 'json',//服务器返回json格式数据
                    type: 'get',//HTTP请求类型
                    success: function (res) {
                        //获得服务器响应
                        var html = '';
                        if (res.data.list.length > 0) {
                            $('.goods_list_fix').show();
                            for (var i = 0; i < res.data.list.length; i++) {
                                if (res.data.new_num > 0) {
                                    res.data.new_num--;
                                } else {
                                    tabLoadEnd = true;
                                    break;
                                }

                                if (res.data.list[i].store_logo == null) {
                                    res.data.list[i].store_logo = '/static/image/myhome/TIM20180731142117.jpg';
                                }

                                html += '<div class="store-list-item">';
                                html += '<div class="store-list-title">';
                                html += '<div class="store-list-logo">';
                                html += '<img src="' + res.data.list[i].store_logo + '">';
                                html += '</div>';
                                html += '<h3>' + res.data.list[i].stroe_name + '</h3>';
                                if ($('.goods_list_manage').text() == '管理') {
                                    html += '<a class="store-list-link" href="/member/shop/index/store_id/' + res.data.list[i].store_id + '">进店</a>';
                                    html += '<div class="store-list-check" data-id="' + res.data.list[i].store_id + '" onclick="checkItem(this)" style="display:none;"></div>';
                                } else {
                                    html += '<a class="store-list-link" style="display:none;" href="/member/shop/index/store_id/"' + res.data.list[i].store_id + '>进店</a>';
                                    if ($('.store-panel').find('div').attr('class') == 'checkAll select') {
                                        html += '<div class="store-list-check select" data-id="' + res.data.list[i].store_id + '" onclick="checkItem(this)" style="display:block;"></div>';
                                    } else {
                                        html += '<div class="store-list-check" data-id="' + res.data.list[i].store_id + '" onclick="checkItem(this)" style="display:block;"></div>';
                                    }
                                }
                                html += '</div>';


                                // 店铺产品列表
                                if (res.data.list[i].goods.length > 0) {
                                    html += '<div class="store-list-img">';
                                    for (var j = 0; j < res.data.list[i].goods.length; j++) {
                                        if (res.data.list[i].goods.length == 1) {
                                            html += '<div class="store-img-item" style="width:3rem;height:3rem;">';
                                        } else {
                                            html += '<div class="store-img-item">';
                                        }
                                        html += '<a href="/member/goodsproduct/index/g_id/' + res.data.list[i].goods[j].g_id + '">';
                                        html += '<img src="' + res.data.list[i].goods[j].g_img + '">';
                                        html += '<span>￥' + res.data.list[i].goods[j].gdr_price + '</span>';
                                        html += '</a>';
                                        if (res.data.list[i].goods[j].new_goods == 1) {
                                            html += '<div class="store-list-tag">';
                                            html += '<i class="new">上新</i>';
                                            html += '</div>';
                                        }
                                        html += '</div>';
                                    }
                                    html += '</div>';
                                }
                                html += '</div>';
                            }
                            $('.store').find('.store-list-plist').append(html);
                        } else {
                            tabLoadEnd = true;
                            //加载推荐店铺                            
                            var html = '';                           
                            if (res.data.tj_list.length > 0) {
                                $('.store-good').show();                         
                                for (var i = 0; i < res.data.tj_list.length; i++) {
                                    if (res.data.tj_list[i].store_logo == null) {
                                        res.data.tj_list[i].store_logo = '/static/image/myhome/TIM20180731142117.jpg';
                                    }
                                    html += '<div class="store-list-item">';
                                    html += '<div class="store-list-title">';
                                    html += '<div class="store-list-logo">';
                                    html += '<img src="' + res.data.tj_list[i].store_logo + '">';
                                    html += '</div>';
                                    html += '<h3>' + res.data.tj_list[i].stroe_name + '</h3>';
                                    html += '<a class="store-list-link st' + res.data.tj_list[i].store_id + '" onclick="collection(' + res.data.tj_list[i].store_id + ')">关注</a>';
                                    html += '</div>';
                                    // 店铺产品列表
                                    if (res.data.tj_list[i].goods.length > 0) {
                                        html += '<div class="store-list-img">';
                                        for (var j = 0; j < res.data.tj_list[i].goods.length; j++) {
                                            if (res.data.tj_list[i].goods.length == 1) {
                                                html += '<div class="store-img-item" style="width:3rem;height:3rem;">';
                                            } else {
                                                html += '<div class="store-img-item">';
                                            }
                                            html += '<a href="/member/goodsproduct/index/g_id/' + res.data.tj_list[i].goods[j].g_id + '">';
                                            html += '<img src="' + res.data.tj_list[i].goods[j].g_img + '">';
                                            html += '<span>￥' + res.data.tj_list[i].goods[j].gdr_price + '</span>';
                                            html += '</a>';
                                            if (res.data.tj_list[i].goods[j].new_goods == 1) {
                                                html += '<div class="store-list-tag">';
                                                html += '<i class="new">上新</i>';
                                                html += '</div>';
                                            }
                                            html += '</div>';
                                        }
                                        html += '</div>';
                                    }
                                    html += '</div>';
                                }
                                $('.store-good').find('.store-list-plist').append(html);
                            }
                            if ($('.store').find('.store-list-item').length == 0) {
                                $('.goods_list').show();
                                $('.goods_list_fix').remove();
                                $('.store').remove();
                            }
                            me.noData();
                        }
                        me.resetload();
                    }
                });
            }, 500);
        }
    });

    //切换店铺选中状态
    function checkItem(obj) {
        $(obj).toggleClass("select");
        $('.store-list-check').each(function () {
            if ($(this).attr('class') == 'store-list-check select') {
                $('.checkAll').addClass('select');
            } else {
                $('.checkAll').removeClass('select');
                return false;
            }
        })
    }

    //切换管理店铺选中状态
    $('.goods_list_manage').on("click", function () {
        if ($(this).text() == '管理') {
            $(this).text('完成');
        } else {
            $(this).text('管理');
        }

        //显示隐藏底部全选
        $('.store-panel').toggle();
        $('.bh').toggle();

        //显示隐藏“进店”按钮
        $('.store').find('.store-list-link').toggle();

        //显示隐藏多选按钮
        $('.store-list-check').toggle();

    })

    //全选按钮
    $('.checkAll').click(function () {
        $(this).toggleClass('select');

        if ($(this).attr('class') == 'checkAll select') {
            $('.store-list-check').addClass('select');
        } else {
            $('.store-list-check').removeClass('select');
        }
    })

    //取消关注
    $('.store-panel').find('button').on("click", function () {
        var arr = [];
        $('.store').find('.store-list-plist').find('.select').each(function () {
            var id = $(this).attr('data-id');
            arr.push(id);
        });
        if (arr.length == 0) {
            layer.msg('<span style="color:#fff">请选择要取消关注的店铺</span>');
            return false;
        }
        $.ajax("/member/storecollection/del_multiple", {
            data: {
                store_id: arr
            },
            dataType: 'json',//服务器返回json格式数据
            type: 'post',//HTTP请求类型
            success: function (res) {
                if (res.status == 1) {
                    layer.msg('<span style="color:#fff">' + res.msg + '</span>');
                    $('.store').find('.store-list-plist').find('.select').each(function () {
                        $(this).parents(".store-list-item").remove();
                    });
                    if ($('.store').find('.store-list-item').length == 0) {
                        $('.goods_list_fix').remove();
                        $('.goods_list').show();
                        $('.store').remove();
                        $('.bh').remove();
                        $('.store-panel').remove();
                    }
                } else {
                    layer.msg('<span style="color:#fff">' + res.msg + '</span>');
                }
            }
        });
    })

    //关注和取消关注店铺
    function collection(id) {
        $.post("/member/storecollection/store_collection", { store_id: id }, function (res) {
            if (res.status == 1) {
                $('.st'+id).html('关注');
                $('.st'+id).css({"background":"linear-gradient(90deg,rgba(255,212,0,1),rgba(255,232,0,1))"})
                layer.msg('<span style="color:#fff">您已取消关注该店铺</span>', { time: 2000 });
            } else if (res.status == 2) {
                $('.st'+id).html('已关注');
                $('.st'+id).css({"background":"none"})
                layer.msg('<span style="color:#fff">您已关注该店铺</span>', { time: 2000 });
            }
        })
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
</html>