<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\project\pai\public/../application/member/view/review/index.html";i:1542767234;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/dropload/dropload.css">
<link rel="stylesheet" type="text/css" href="__CSS__/review/evaluation.css">
<style>
    .big_img {
        position: fixed;
        z-index: -1;
        opacity: 0;
        background: rgba(0, 0, 0, 1);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0
    }

    .big_img .swiper-container2 {
        position: relative;
        width: 100%;
        height: 100%
    }

    .big_img .swiper-container2 .swiper-wrapper {
        width: 100%;
        height: 100%
    }

    .big_img .swiper-slide {
        width: 100%;
        height: 100%;
        display: table
    }

    .big_img .swiper-slide .cell {
        width: 100%;
        height: 100%;
        display: table-cell;
        vertical-align: middle;
        text-align: center
    }

    .big_img .swiper-slide img {
        max-width: 90%;
        max-height: 80%;
        margin: 0 auto
    }

    .big_img .swiper-pagination2 {
        position: absolute;
        top: .2rem;
        text-align: center;
        width: 100%
    }

    .big_img .swiper-pagination2 span {
        margin: 0 .05rem
    }
</style>

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
    <div class="content-view">
        <div class="lists-view">
            <div class="evaluation_top clear">
                <div class="evaluation_top_img lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['m_avatar']) && ($info['m_avatar'] !== '')?$info['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>">
                </div>
                <div class="evaluation_top_name rt clear">
                    <p class="lf"><?php echo (isset($info['m_name']) && ($info['m_name'] !== '')?$info['m_name']:''); ?></p>
                    <a class="evaluation_top_btn rt" href="/member/Orderpai/orderlist/i/4">
                        写评价
                    </a>
                </div>
            </div>
            <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                <!--评价为空时-->
                <div class="review_blank">
                    <img src="__STATIC__/image/review/pic_pingjia@2x.png" alt=""/>
                    <p>遇见好东西要大声分享粗来哦</p>
                </div>
            <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <!--评价不为空时-->
                    <div class='evaluation_list'>
                        <div class='evaluation_main clear'>
                            <div class='evaluation_main_img lf'>
                                <img src='__CDN_PATH__<?php echo (isset($list['gp_s_img']) && ($list['gp_s_img'] !== '')?$list['gp_s_img']:"/static/image/myhome/TIM20180731142117.jpg"); ?>'>
                            </div>
                            <div class='evaluation_main_text rt'>
                                <p><?php echo $vo['g_name']; ?></p>￥<span><?php echo $vo['o_money']; ?></span>
                            </div>
                        </div>
                        <?php if(!(empty($vo['img_list']) || (($vo['img_list'] instanceof \think\Collection || $vo['img_list'] instanceof \think\Paginator ) && $vo['img_list']->isEmpty()))): ?>
                            <!--评价图片不为空时-->
                            <div class='evaluation_img_view '>
                                <div class='evaluation_img_con clear'>
                                    <?php if(count($vo['img_list']) > 2): if(is_array($vo['img_list']) || $vo['img_list'] instanceof \think\Collection || $vo['img_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['img_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
                                            <div class='evaluation_img_list lf'>
                                                <!--遍历评价的图片-->
                                                <img src='<?php echo $voo['img_url']; ?>' onClick="bigs(this)">
                                            </div>
                                        <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($vo['img_list']) || $vo['img_list'] instanceof \think\Collection || $vo['img_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['img_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>

                                            <div class='evaluation_img_list evaluation_img_two lf'>
                                                <!--遍历评价的图片-->
                                                <img src='<?php echo $voo['img_url']; ?>' onClick="bigs(this)">
                                            </div>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                            <div class='evaluation_main_content'>
                                <div class='evaluation_main_con'>
                                    <p><?php echo $vo['rg_content']; ?></p>
                                    <span><?php echo $vo['ro_add_time']; ?></span>
                                </div>
                            </div>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
    </div>
</main>
<div class="big_img">
    <div class="swiper-container2">
        <div class="swiper-wrapper"></div>
    </div>
</div>

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
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/dropload/dropload.min.js"></script>
<script>
    $(function () {

        var count_list = "<?php echo $count_list; ?>";  //判断评价是否为空
        if(count_list==0){

        }else{
            /**
             * status: 0没有数据了 1有数据
             * msg:提示信息
             * data:返回html
             * list:返回的数组
             * total_num：数据总条数
             *
             * 参数：
             * "gp_img": 商品图片,
             * "g_name": 商品名称,
             * "o_money": 商品下单时的单价,
             * "rg_content": 评价内容,
             * "ro_add_time": 评论时间,
             * "rg_id": 评论商品id,
             * "gp_num": 购买数量,
             * "store_id": 店铺id,
             * "gp_id": 商品id,
             * "g_id": 商品id,
             * "img_list": [{
          *  "rgi_id": 评论图片id,
          *  "img_url": 评论图片路径,
          *  "state": 图片状态,
          *  "rg_id": 评论商品id
          * }]
             */
            //精选商品的下拉加载数据
            var tabLoadEnd =false;//加载后已没有数据
            var page=1;
            var size=3;
//    // 上拉刷新
            var dropload = $('.content-view').dropload({
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
                        $.ajax("/member/Review/get_content/", {
                            data: {page:page,size:size},
                            dataType: 'json',//服务器返回json格式数据
                            type: 'post',//HTTP请求类型
                            success: function (data) {
                                console.log(data)
                                var html="";
                                if(data.status>0){
                                    for(var i=0;i<data.list.length;i++){
                                        html+=' <div class="evaluation_list">'
                                        html+='<div class="evaluation_main clear">'
                                        html+='<div class="evaluation_main_img lf">'
                                        html+='<img src="'+data.list[i].gp_img+'">'
                                        html+='</div>'
                                        html+='<div class="evaluation_main_text rt">'
                                        html+='<p>'+data.list[i].g_name+'</p>￥<span>'+data.list[i].o_money+'</span>'
                                        html+='</div></div>'
                                        html+='<div class="evaluation_img_view ">'
                                        html+='<div class="evaluation_img_con clear">'
                                        if(data.list[i].img_list.length>0){
                                            for(var j=0;j<data.list[i].img_list.length;j++){
                                                if(data.list[i].img_list.length>2){
                                                    html+='<div class="evaluation_img_list lf"><img src="'+data.list[i].img_list[j].img_url+'" onClick="bigs(this)"></div>'
                                                }else{
                                                    html+='<div class="evaluation_img_list evaluation_img_two lf"><img src="'+data.list[i].img_list[j].img_url+'" onClick="bigs(this)"></div>'
                                                }
                                            }
                                        }
                                        html+='</div></div>'
                                        html+=' <div class="evaluation_main_content">'
                                        html+='<div class="evaluation_main_con">'
                                        html+='<p>'+data.list[i].rg_content+'</p>'
                                        html+='<span>'+data.list[i].ro_add_time+'</span>'
                                        html+='</div></div></div>'
                                    }
                                    $(".lists-view").append(html);
                                } else {
                                    tabLoadEnd = true;
                                    me.noData();
                                }
                                me.resetload();
                            }
                        });
                    }, 500);
                }
            });
        }
        })


    /*调起大图 S*/
    var mySwiper = new Swiper('.swiper-container2', {
        loop: false,
        pagination: '.swiper-pagination2',
    })
    function bigs(obj){
        var imgBox =$(obj).parents(".evaluation_img_con").find("img");
        var i = $(imgBox).index(this);
        $(".big_img .swiper-wrapper").html("");

        for(var j = 0 ,c = imgBox.length; j < c ;j++){
            $(".big_img .swiper-wrapper").append('<div class="swiper-slide"><div class="cell"><img src="' + imgBox.eq(j).attr("src") + '" / ></div></div>');
        }
        mySwiper.updateSlidesSize();//这个方法会重新计算Slides的数量
        mySwiper.updatePagination();//这个方法会重新计算Slides分页器的数量
        $(".big_img").css({
            "z-index": 1001,
            "opacity": "1"
        });
        mySwiper.slideTo(i, 0, false);
        return false;
    }
    $(".big_img").on("click",function() {
        $(this).css({
            "z-index": "-1",
            "opacity": "0"
        });
    });
    /*调起大图 E*/

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