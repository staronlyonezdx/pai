<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"D:\project\pai\public/../application/popularity/view/popularitygoods/prize_list.html";i:1542770048;s:69:"D:\project\pai\public/../application/popularity/view/common/base.html";i:1542013165;s:71:"D:\project\pai\public/../application/popularity/view/common/js_sdk.html";i:1541491295;}*/ ?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="full-screen" content="yes">
        <meta name="x5-fullscreen" content="true">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 viewport-fit=cover">
        <meta name="format-detection" content="telephone=no">
        <!--<link rel="stylesheet" type="text/css" href="__CSS__/mui/mui.min.css">-->
        <!-- <link rel="stylesheet" type="text/css" href="__CSS__/common/bootstrap.min.css"> -->

        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/larea.css">
        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/size.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/popups.css">
        
<link rel="stylesheet" type="text/css" href="__CSS__/dropload/dropload.css">
<link rel="stylesheet" type="text/css" href="__CSS__/prize_list/prize_list.css">

        <script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>
        <!--<script type="text/javascript" src="__JS__/zepto.min.js"></script>-->
        <script src="__JS__/common/rem.js"></script>
        <script src="__JS__/common/jquery_lazyload.js"></script>
        <script src="__JS__/common/lazyload.js"></script>
        <!--<script src="__JS__/mui/mui.min.js"></script>-->
        <!--<script src="__JS__/mui/mui.pullToRefresh.js"></script>-->
        <!--<script src="__JS__/mui/mui.pullToRefresh.material.js"></script>-->
        <script src="__JS__/common/site.js"></script>
        <script src="__JS__/common/larea.js"></script>
        <script src="__JS__/common/bootstrap.min.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
        <script src="__STATIC__/lib/layui/layui.js"></script>
        <script src="__JS__/common/popups.js"></script>
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
        <title></title>
    </head>
    <body>
        <header></header>
        
<div class="header_nav">
        <div class="header_view">
            <div class="header_tit">
                <span>通告列表</span>
                <div class="header_back">
                    <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
                </div>
            </div>
        </div>
    </div>
<main>


    <div class="no-message">
        <img src="/static/image/systemmsg/icon_xiaoxi@2x.png"/>
        <p>天呐~这里目前没有任何消息~</p>
    </div>



    <div class="prize_list_wrap">
        <div class="prize_list_content">
            <!--<a href="/popularity/popularitygoods/prize_info/a_id/'+res.list[i].a_id+'">-->
            <!--<div class="prize_list_item">-->
                <!--<img src="'+res.list[i].a_img+'" alt="">-->
                <!--<img src="__STATIC__/image/systemmsg/icon_zhiding@2x.png" alt="" class="zhiding">-->
                <!--<div class="prize_list_info">-->
                    <!--<span class="prize_list_name">hhhhhhhhhh</span>-->
                    <!--<span class="prize_list_detail">ffffffff</span>-->
                    <!--<span class="prize_list_date">mmmmmmmmmmm</span>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</a>-->
        </div>
    </div>

</main>

        <footer></footer>
    </body>

    <!--bugtags 开始-->
    <!--<script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script>-->
    <!-- <script> -->
        <!-- // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本 -->
         <!-- //new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE'); -->
    <!-- </script> -->
    <!--bugtags 结束-->

    
<script src="__STATIC__/js/common/jweixin-1.2.0.js"></script>
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
<script src="__JS__/dropload/dropload.js"></script>
<script>
$(".header_back").click(function(){
    if(window.sessionStorage.getItem("backUrl")!=null){
        window.location.href="/popularity/popularitygoods/share_list/"
        window.sessionStorage.removeItem("backUrl");
    }else{
        window.history.back();
    }
})


// 时间戳转换时间S
function getMyDate(str){
    var oDate = new Date(str),
    oYear = oDate.getFullYear(),
    oMonth = oDate.getMonth()+1,
    oDay = oDate.getDate(),
    oHour = oDate.getHours(),
    oMin = oDate.getMinutes(),
    oSen = oDate.getSeconds(),
    oTime = oYear +'-'+ getzf(oMonth) +'-'+ getzf(oDay) +' '+ getzf(oHour) +':'+getzf(oMin) +':'+getzf(oSen);//最后拼接时间            
    return oTime;        
};        
//补0操作      	
function getzf(num){          
    if(parseInt(num) < 10){              
        num = '0'+num;        
    }          	
    return num;      	
}
// 时间戳转换时间E

    var itemIndex = 0;//点击的索引值
    var tabLoadEnd = false;//加载后已没有数据
    var page = 0;
    // 上拉加载
    var dropload = $('.prize_list_wrap').dropload({
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
                $.ajax("/popularity/popularitygoods/prize_list/page/" + page, {
                    data: {},
                    dataType: 'json',//服务器返回json格式数据
                    type: 'get',//HTTP请求类型
                    success: function (res) {
                        // console.log(res);
                        //获得服务器响应
                        var html = '';
                        
                        if (res.list.length > 0) {
                            for (var i = 0; i < res.list.length; i++) {
                                var datas=getMyDate(res.list[i].a_addtime*1000);
                                // console.log(datas)
                                if (res.new_num > 0) {
                                    res.new_num--;
                                } else {
                                    tabLoadEnd = true;
                                    break;
                                }
                                html += '<a href="/popularity/popularitygoods/prize_info/a_id/'+res.list[i].a_id+'">'
                                html += '<div class="prize_list_item">';
                                html += '<div class="yy_notice_img lf">'
                                html += '<img src="__STATIC__/image/myhome/TIM20180731142117.jpg" alt="" class=" annunciate_img ">';
                                // html += '<img src="'+res.list[i].a_img+'" alt="" class=" annunciate_img ">';
                                html += '</div>'
                                // if(i == 1){
                                //      html += '<img src="__STATIC__/image/systemmsg/icon_zhiding@2x.png" alt="" class="zhiding">'
                                // }
                                html += '<div class="prize_list_info">';
                                html += '<span class="prize_list_name">'+res.list[i].a_name+'</span>';
                                html += '<span class="prize_list_detail">'+res.list[i].a_brief+'</span>';
                                html += '<span class="prize_list_date">'+datas+'</span>';
                                html += '</div>';
                                html += '</div>'
                                html += '</a>'
                            }
                            $('.prize_list_content').append(html);

                            $('.annunciate_img').each(function(){
                                // alert(11)
                                //获取图片父容器的宽度
                                var pat = $(this).parent().width();


                                //获取图片父容器的高度
                                var pah = $(this).parent().height();
                                var img = $(this);
                                var wid;// 真实的宽度
                                var hei;// 真实的高度
                                // 这里做下说明，$("<img/>")这里是创建一个临时的img标签，类似js创建一个new Image()对象！
                                $("<img/>").attr("src", $(img).attr("src")).load(function() {
                                    /*
                                    * 如果要获取图片的真实的宽度和高度有三点必须注意 1、需要创建一个image对象：如这里的$("<img/>")
                                    * 2、指定图片的src路径 3、一定要在图片加载完成后执行如.load()函数里执行
                                    */
                                    wid = this.width;
                                    hei = this.height;
                                    // console.log(wid,hei);
                                    if (wid > hei) {
                                        //图片宽度设置为100%
                                        img.css({"width":pat+"px","height":"auto"});

                                        //居中显示
                                        hei = hei/(wid/pat);
                                        var mtp = (img.parent().height()-hei)/2;
                                        img.css("margin-top",mtp+"px");
                                        // console.log(wid,hei);
                                    }else if(wid <= hei){
                                        //图片宽度设置为100%
                                        img.css({"width":'auto',"height":'100%'});
                                        //居中显示
                                        wid = wid/(hei/pah);
                                        var mtp = (img.parent().width()-wid)/2;
                                        img.css("margin-left",mtp+"px");
                                        // console.log(wid,hei);
                                    }
                                });
                            })
                        } else {
                            tabLoadEnd = true;
                            if ($('.prize_list_item').length == 0) {
                                $(".dropload-down").css({display: "none"});
                                // $('.no-message').show();
                            }
                            me.noData();
                        }
                        me.resetload();
                    }
                });
            }, 500);
        }
    });



</script>



</html>