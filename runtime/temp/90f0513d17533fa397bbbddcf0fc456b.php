<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"D:\project\pai\public/../application/member/view/orderpai/pai_memlist.html";i:1543385002;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1544154864;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/goodsproduct/details.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/current_reference.css"> 
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
        <header>
<!--<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" onClick="javascript:history.go(-1);">
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>-->
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <!--<p>开通钱包</p>-->
            <div class="pai_memlist_select"style="position: relative;width: 34%;left: 2.3rem;">
                <span class="header_title">所有参团的</span>
                <img src="__STATIC__/image/goods/icon_shang@2x.png" alt="">
                <img src="__STATIC__/image/goods/icon_xia@2x.png" alt="" class="pai_select_pic">
            </div>
            <div class="pai_memlist_all">
                <span class="pai_memlist_all_text">只看本期</span>
                <span class="">查看全部</span>
            </div>
            <div class="header_back" onClick="javascript :history.back(-1);">
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>

        </div>
    </div>
</div>
</header>
        <header></header>
        
<main style="margin-top: 0.88rem;">
    <div class="pai_memlist_select_view">
        <div class="pai_memlist_select_line">
            <div class="pai_memlist_select_list pai_memlist_all_list s0" gdr_id="0">
                所有参团的
            </div>
        </div>
        <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="pai_memlist_select_line">
            <div class="pai_memlist_select_list s<?php echo (isset($vo['gdr_id']) && ($vo['gdr_id'] !== '')?$vo['gdr_id']:0); ?>" gdr_id="<?php echo (isset($vo['gdr_id']) && ($vo['gdr_id'] !== '')?$vo['gdr_id']:0); ?>">
                <?php echo $vo['gdt_name']; ?>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
    <div class="details_view">
        <div class="details_schedule">
            <div class="details_schedule_tit clear">
                <p class="lf">
                    已产生
                    <span class="count_awardcode">0</span>人次吖吖码
                </p>
                <!--<p class="rt">-->
                    <!--当前参团剩余名额-->
                    <!--<span class="total_left_num">0</span>人次-->
                <!--</p>-->
            </div>
        </div>
        <div class="details_carousel" id="current">
            <div class="drop-list" style="display: block;">
                <div class="no-cp">本轮暂无参团</div>
                <div class="list">

                </div>
                <div class="pai_memlist_tit">往轮参团者</div>
                <div class="list1">

                </div>
            </div>

            <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="drop-list">
                <div class="no-cp">本轮暂无参团</div>
                <div class="list">

                </div>
                <div class="pai_memlist_tit">往轮参团者</div>
                <div class="list1">

                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
    </div>
    <!--接口测试按钮-->

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
    $(".pai_memlist_all").click(function () {
        $(this).children("span").toggleClass("pai_memlist_all_text");
        if ($(this).find('span').eq(0).attr("class") == "pai_memlist_all_text") {
            $('.pai_memlist_tit').show();
            $('.list1').show();
        } else {
            $('.pai_memlist_tit').hide();
            $('.list1').hide();
        }
    })

    var gp_id = "<?php echo $gp_id; ?>";//商品id
    var gdr_id = "<?php echo $gdr_id; ?>";//折id

    if(gdr_id !=0) {
        $('.pai_memlist_tit').hide();
        $('.list1').hide();
        $('.pai_memlist_all').find('span').eq(0).attr('class','');
        $('.pai_memlist_all').find('span').eq(1).attr('class','pai_memlist_all_text');
        $('.pai_memlist_select_list').removeClass('pai_memlist_all_list');
        $('.s'+gdr_id).addClass('pai_memlist_all_list');
        $('.header_title').text($('.s'+gdr_id).text());
    }
 
    $(function () {
        $(".pai_memlist_select").click(function () {
            $(this).children("img").toggleClass("pai_select_pic");
            $(".pai_memlist_select_view").toggle();
        })

        var itemIndex = 0;
        var tabLoadEndArray = [];

        $('.drop-list').each(function (index) {
            tabLoadEndArray.push(false);
            window.sessionStorage.setItem('p' + index, 0);
            window.sessionStorage.setItem('g' + index, 0);

        });

        var page;//当前参团页码
        var page1;//往轮参团页码

        var size = 20; //每页数量

        var dropload = $('#current').dropload({
            scrollArea: window,
            domDown: {
                domClass: 'dropload-down',
                domRefresh: '<div class="dropload-refresh">上拉加载更多</div>',
                domLoad: '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
                domNoData: '<div class="dropload-noData">已无数据</div>'
            },
            loadDownFn: function (me) {
                setTimeout(function () {
                    if (tabLoadEndArray[itemIndex]) {
                        me.resetload();
                        me.lock();
                        me.noData();
                        me.resetload();
                        return;
                    }
                    page = window.sessionStorage.getItem('p' + itemIndex);
                    page++;
                    window.sessionStorage.setItem('p' + itemIndex, page);

                    // 折id
                    var gdr_id = $(".pai_memlist_all_list").attr("gdr_id");// 0：所有 数字：当前折参数
                    $.ajax("/member/Orderpai/get_pai_mem_list", {
                        data: {},
                        dataType: 'json',//服务器返回json格式数据
                        type: 'POST',//HTTP请求类型
                        data: { page: page, size: size, gdr_id: gdr_id, gp_id: gp_id, oa_status: 1 },
                        success: function (data) {
                            //获得服务器响应
                            var html = '';
                            var num = data.data.length;
                            if (data.data.length > 0) {
                                for (var i = 0; i < data.data.length; i++) {
                                    
                                    if (num > 0) {
                                        num--;
                                    } else {
                                        tabLoadEndArray[itemIndex] = true;
                                        break;
                                    }   
                                    var m_avatarimg=data.data[i].m_s_avatar;

                                    if(data.data[i].m_s_avatar==''||data.data[i].m_s_avatar==null){
                                        data.data[i].m_s_avatar='/static/image/myhome/TIM20180731142117.jpg'
                                    }

                                    if(data.data[i].oa_state == 2){
                                        html += '<div class="details_carousel_list details_yew_win clear">';
                                        html += '<div class="details_carousel_img lf">';
                                        // if(data.data[i].o_is_fudai==1){
                                        //     html+='<img src="__STATIC__/image/orderpai/icon_zhongpai2@2x.png" class="details_bg_win">'
                                        // }else{
                                            if(data.data[i].o_play_type == 1) {
                                                html+='<img src="__STATIC__/image/orderpai/icon_zhongpai3@2x.png" class="details_bg_win">'
                                            }else if(data.data[i].o_play_type == 2) {
                                                html+='<img src="__STATIC__/image/orderpai/jxzp.png" class="details_bg_win">'
                                            }                                            
                                        // }
                                    }else{
                                        html += '<div class="details_carousel_list clear">';
                                        html += '<div class="details_carousel_img lf">';
                                    }
                                   
                                    html += '<img src="' + data.data[i].m_s_avatar + '" class="details_error_img">';
                                    html += '</div>';
                                    html += '<p class="details_name lf">' + data.data[i].m_name + '';
                                    html += '<span>' + msToDate(data.data[i].o_paytime * 1000).wasTime + '</span>';
                                    html += '</p>';
                                    html += '<div class="details_carousel_rt rt">';
                                    html += '<img src="' + data.data[i].gdt_img + '">';
                                    html += '</div>';
                                    html += '</div>';
                                }
                                $('.details_carousel').find(".list").eq(itemIndex).append(html);
                                $('.details_error_img').on('error',function(){ 
                                    $(this).attr('src','/static/image/index/pic_home_taplace@2x.png'); 
                                });
                            } else {
                                if ($('.details_carousel').find(".list").eq(itemIndex).find('.details_carousel_list').length == 0) {
                                    $('.details_carousel').find(".no-cp").eq(itemIndex).show();
                                }
                                page1 = window.sessionStorage.getItem('g' + itemIndex);
                                page1++;
                                window.sessionStorage.setItem('g' + itemIndex, page1);
                                $.ajax("/member/Orderpai/get_pai_mem_list", {
                                    data: {},
                                    dataType: 'json',//服务器返回json格式数据
                                    type: 'POST',//HTTP请求类型
                                    data: { page: page1, size: size, gdr_id: gdr_id, gp_id: gp_id, oa_status: 2 },
                                    success: function (data) {

                                        //获得服务器响应
                                        var html1 = '';
                                        var num = data.data.length;
                                        if (data.data.length > 0) {
                                            if($('.pai_memlist_all').find('span').eq(1).attr('class') == '') {
                                                $('.details_carousel').find(".pai_memlist_tit").eq(itemIndex).show();
                                                $('.details_carousel').find(".list1").eq(itemIndex).show(); 
                                            }
                                            for (var i = 0; i < data.data.length; i++) {
                                                if (num > 0) {
                                                    num--;
                                                } else {
                                                    tabLoadEnd = true;
                                                    break;
                                                }
                                                if(data.data[i].m_s_avatar==''||data.data[i].m_s_avatar==null){
                                                    data.data[i].m_s_avatar='/static/image/myhome/TIM20180731142117.jpg'
                                                }
                                                
                                                if(data.data[i].oa_state == 2){
                                                    html1 += '<div class="details_carousel_list details_yew_win clear">';
                                                    html1 += '<div class="details_carousel_img lf">';

                                                        // if(data.data[i].oa_state==1){
                                                        //     html1+='<img src="__STATIC__/image/orderpai/icon_zhongpai2@2x.png" class="details_bg_win">'
                                                        // }else{
                                                            if(data.data[i].o_play_type == 1) {
                                                                html1+='<img src="__STATIC__/image/orderpai/icon_zhongpai3@2x.png" class="details_bg_win">'
                                                            }else if(data.data[i].o_play_type == 2) {
                                                                html1+='<img src="__STATIC__/image/orderpai/jxzp.png" class="details_bg_win">'
                                                            }
                                                        // }
                                                   
                                                }else{
                                                    html1 += '<div class="details_carousel_list clear">';
                                                    html1 += '<div class="details_carousel_img lf">';
                                                }
                                                // html1 += '<div class="details_carousel_list clear">';
                                               
                                                html1 += '<img src="' + data.data[i].m_s_avatar + '" class="details_error_img">';
                                                html1 += '</div>';
                                                html1 += '<p class="details_name lf">' + data.data[i].m_name + '';
                                                html1 += '<span>' + msToDate(data.data[i].o_paytime * 1000).wasTime + '</span>';
                                                html1 += '</p>';
                                                html1 += '<div class="details_carousel_rt rt">';
                                                html1 += '<img src="' + data.data[i].gdt_img + '">';
                                                html1 += '</div>';
                                                html1 += '</div>';
                                            }
                                            html1 += '</div>';
                                            $('.details_carousel').find(".list1").eq(itemIndex).append(html1);
                                            $('.details_error_img').on('error',function(){ 
                                                $(this).attr('src','/static/image/index/pic_home_taplace@2x.png'); 
                                            });
                                        } else {

                                            tabLoadEnd = true;
                                            me.noData();
                                        }
                                    }
                                });
                            }

                            me.resetload();
                        }
                    });
                }, 500);
            }
        })
        // 选择折扣类型
        $(".pai_memlist_select_line").on("click", function () {

            $(this).children().addClass("pai_memlist_all_list");
            $(this).siblings().find(".pai_memlist_select_list").removeClass("pai_memlist_all_list");
            var new_title = $(".pai_memlist_all_list").html();
            $(".header_title").html(new_title);
            $(".pai_memlist_select_view").toggle();
            $(".pai_memlist_select img").toggleClass("pai_select_pic");

            var $this = $(this);
            itemIndex = $this.index();

            $('.drop-list').eq(itemIndex).show().siblings('.drop-list').hide();
            var gdr_id = $(".pai_memlist_all_list").attr("gdr_id");// 0：所有 数字：当前折参数
            count_paier(gp_id, gdr_id);

            if (!tabLoadEndArray[itemIndex]) {
                dropload.unlock();
                dropload.noData(false);
            } else {
                dropload.lock('down');
                dropload.noData();
            }
            dropload.resetload();
        })
    })
    /**
    * 顶部参团统计统计
    * gp_id:商品id
    * gdr_id:选择的商品折扣id 0：全部折扣
    * o_periods:选择商品的期数 0：全部期数
    * */
    function count_paier(gp_id, gdr_id) {
        $.ajax({
            type: 'POST',
            url: "/member/orderpai/count_paier",
            dataType: 'json',
            data: { gdr_id: gdr_id, gp_id: gp_id },
            success: function (data) {
                if (data.status) {
                    $(".count_awardcode").html(data.data.count_awardcode);
                    $(".total_left_num").html(data.data.total_left_num);
                } else {
                    alert(data.msg);
                }
            },
            error: function () {
                alert('Ajax error!');
            }
        });
    }
    count_paier(gp_id, gdr_id);
   
   
</script> 
    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>