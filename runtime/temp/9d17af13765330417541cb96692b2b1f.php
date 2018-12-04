<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"D:\project\pai\public/../application/member/view/modifydata/self_data.html";i:1543383912;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543280491;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/set/set.css">
<link rel="stylesheet" type="text/css" href="__CSS__/set/upload_photo.css">

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
    <div class="set_com">
        <div class="set_top clear">
            <p class="set_header_div lf">修改头像</p>
            <div class="set_more rt">
                <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
            </div>
            <div class="set_headportrait rt">
                <!--压缩图片开始-->
                <div class="view">
                    <div class="goods_view_position">
                        <ul class="img-list" id="upload">
                            <input type="file" id="choose" accept="image/*">
                            <li>
                                <img id="header_img" src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="__CDN_PATH__<?php echo isset($info['m_avatar']) ? $info['m_avatar'] :  ''; ?>">
                            </li>
                        </ul>

                    </div>
                </div>
                <!--压缩图片结束-->
            </div>
        </div>
    </div>
    <div class="set_com set_name">
            <div class="set_address clear">
                <p class="set_list lf">
                    昵称
                </p>
                <div class="set_more rt">
                    <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
                </div>
                <p class="set_text_margin rt"><?php echo isset($info['m_name']) ? $info['m_name'] :  $info['m_mobile']; ?></p>
            </div>
    </div>
    <div class="set_com set_margin set_sex">
             <div class="set_address clear">
                <p class="set_list lf">
                    性别
                </p>
                <div class="set_more rt">
                    <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
                </div>
                 <?php if(($info['m_sex']==1)): ?>
                 <p class="set_text_margin rt">男生</p>
                 <?php elseif(($info['m_sex']==2)): ?>
                 <p class="set_text_margin rt">女生</p>
                 <?php else: ?>
                 <p class="set_text_margin rt">保密</p>
                 <?php endif; ?>
            </div>
    </div>
     <div class="set_com">
            <div class="set_address">
                <div class="set_list clear">
                    手机号码
                    <input type="text" unselectable="on" onfocus="this.blur()" name="" class="m_mobile" value="<?php echo $info['m_mobile']; ?>" readonly="readonly">
                </div>
            </div>
    </div>
    <?php if(($info['is_attestation']==2)): ?>
    <a href="/member/modifydata/id_check">
    <div class="set_com  set_margin">
            <div class="set_address clear">
                <p class="set_list lf">
                    实名认证
                </p>
                <div class="set_more rt">
                    <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
                </div>
                <p class="set_text_margin rt">查看信息</p>
            </div>
        </div>
    </a>
    <?php elseif(($info['is_attestation']!=2)): ?>    
    <div class="set_com  set_margin" onclick="check_open()">
        <div class="set_address clear">
            <p class="set_list lf">
                实名认证
            </p>
            <div class="set_more rt">
                <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
            </div>
            <p class="set_text_margin rt">前去认证</p>
        </div>
    </div>
    <?php endif; if(empty($info['tj_mobile']) || (($info['tj_mobile'] instanceof \think\Collection || $info['tj_mobile'] instanceof \think\Paginator ) && $info['tj_mobile']->isEmpty())): ?>
    <a href="/member/modifydata/updatePhone">
        <div class="set_com">
            <div class="set_address clear">
                <p class="set_list lf">
                    推荐人
                </p>
                <div class="set_more rt">
                    <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
                </div>
                <p class="set_text_margin rt">填写推荐人</p>
            </div>
        </div>
    </a>
    <?php else: ?>
    <div class="set_com">
        <div class="set_address clear">
            <p class="set_list lf">
                推荐人
            </p>
            <!-- <div class="set_more rt">
                <img src="__STATIC__/icon/applicationIn/icon_nav_jump@2x.png">
            </div> -->
            <p class="set_text_margin rt"><?php echo $info['tj_mobile']; ?></p>
        </div>
    </div>
    <?php endif; ?>
</main>
 <!-- 昵称的弹框 -->
    <div class="nickname" style="z-index: 100;">
        <div class="header_nav" >
            <div class="header_view">
                <div class="header_tit">
                    修改昵称
                    <div class="header_back" id="fanhui">
                        <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
                    </div>
                </div>
            </div>
        </div>
        <div class="nickname_view">
            <input type="text" name="nick_change_name" >
            <img src="__STATIC__/icon/applicationIn/icon_X@2x.png" class="nickname_img">
        </div>
        <p>1.请输入1-10个字符，可由中英文、数字组成</p>
        <p>2.此昵称非登录名，仅在涉及个人公开信息时显示</p>
        <p>3.如与平台业务或卖家品牌冲突的昵称，将可能被收回</p>
        <div class="nickname_save">完成</div>
    </div>
    <!-- 性别的弹框 -->
    <div class="sex">
        <div class="sex-over"></div>
        <div class="sex_con phonex">
            <div class="sex_tit">
                请问你是GG还是MM
            </div>
            <div class="sex_list" get_val="0">保密</div>
            <div class="sex_list" get_val="1">男生</div>
            <div class="sex_list" get_val="2">女生</div>
            <div class="sex_btn">
                取消
            </div>
        </div>
    </div>
    <!-- 真实姓名的弹框 -->
    <div class="realname">
        <div class="realname_con">
            <p>编辑后就无法更改了哟</p>
            <div class="realname_btn clear">
                <div class="realname_cancel lf">再想想</div>
                <div class="realname_sure rt">确定</div>
            </div>
        </div>
    </div>

    <div class="yzm-view">
        <div class="header_nav" >
            <div class="header_view">
                <div class="header_tit">
                    <div class="header_back" id="yzm-fanhui">
                        <img src="__STATIC__/icon/publish/icon_nav_back@2x.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="yzm-title">验证码</div>
        <div class="yzm-cont">为保障您的账户安全我们已向<span><?php echo $info['m_mobile']; ?></span>发送了验证码<br>请输入您收到的验证码</div>
        <div class="yzm-input">
            <input type="number" id="code" placeholder="请输入验证码" />
            <button class="bangdingcard_code">发送验证码</button>
        </div>
        <div class="yzm-btn">确定</div>
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
<script src="__JS__/set/upload_photo.js"></script>
<script>
//压缩图片
var filechooser = document.getElementById("choose");
//    用于压缩图片的canvas
var canvas = document.createElement("canvas");
var ctx = canvas.getContext('2d');
//    瓦片canvas
var tCanvas = document.createElement("canvas");
var tctx = tCanvas.getContext("2d");
var maxsize = 100 * 1024;
$("#upload").on("click", function() {
//    $(".img-list").html("");
    filechooser.click();

}).on("touchstart", function() {
    $(this).addClass("touch")
}).on("touchend", function() {
    $(this).removeClass("touch")
});

var authentication = "<?php echo $info['is_attestation']; ?>"
//去绑定银行卡弹窗
function check_open() {
    if(authentication == 2) {
        $('.bookcard_view').hide();
        $('.yzm-view').show();
    }else {
        layer.confirm("绑定银行卡<br>即可快速实名认证啦！", {
            title: false, /*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            btn: ['再想想', '立即绑定'], //按钮
            // 按钮2的回调
            btn2: function () {
                $('.bookcard_view').hide();
                $('.yzm-view').show();                
            }
        })
    }        
}
var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    //点击发送验证码
    $(".bangdingcard_code").click(function(){        
        curCount=count;
        $('.bangdingcard_code').attr("disabled","true");
        $(".bangdingcard_code").css({background:"#F2F2F2",color:"#aaaaaa",border:"none"});
        $('.bangdingcard_code').text(curCount+"s后可重新发送");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
        $.ajax({
            type:"POST",//用post方式传输
            dataType:"JSON",//数据格式：JSON
            url:"/member/login/get_token ",//目标地址
            data:{
                mobile:<?php echo $info['m_mobile2']; ?>
            },
            success:function(res){
                $.ajax({
                    type:"post",
                    url:"/member/register/news_code",
                    data: {
                        m_mobile: <?php echo $info['m_mobile2']; ?>,
                        sms_checked_code:res.data
                    },
                    success: function(str){                        
                        layer.msg('<span style="color:#fff">'+ str.msg +'</span>',{time:2000});                        
                    }
                })       
            }
        });
         
    })
    //timer处理函数
    function SetRemainTime(){
        if(curCount==0){
            window.clearInterval(InterValObj);//停止计时器
            $(".bangdingcard_code").css({background:"transparent",color:"#2B2B2B",border:"0.02rem solid #000000"});
            $(".bangdingcard_code").removeAttr("disabled");//启用按钮
            $(".bangdingcard_code").text("重新发送");
        }else{
            curCount--;
            $(".bangdingcard_code").css({background:"#F2F2F2",color:"#aaaaaa",border:"none"});
            $(".bangdingcard_code").text(curCount+"s后可重新发送");
        }
    }

//隐藏发送验证窗口
$('#yzm-fanhui').on('click',function(){
    console.log(1111)
    $('.bookcard_view').show();
    $('.yzm-view').hide();
})
//校验验证码
$('.yzm-btn').click(function(){
    if($('#code').val() == '') {
        layer.msg('<span style="color:#fff">'+ res.msg +'</span>',{time:2000});
        return false;
    }
    $.ajax({
        type:"post",
        url:"/member/wallet/checked_code",
        data: {
            verification: $('#code').val(),
            m_mobile: "<?php echo $info['m_mobile2']; ?>"
        },
        success: function(res){
            if(res.status == 1) {
                window.location.href = '/member/wallet/bindingCard';
                $('#code').val('');
            }else {
                layer.msg('<span style="color:#fff">'+ res.msg +'</span>',{time:2000});
            }                
        }
    })       
})

filechooser.onchange = function() {
    if (!this.files.length) return;
    var files = Array.prototype.slice.call(this.files);
    files.forEach(function(file, i) {
        if (!/\/(?:jpeg|png|gif)/i.test(file.type)) return;
        var reader = new FileReader();
//        var li = document.createElement("li");
//          获取图片大小
        var size = file.size / 1024 > 1024 ? (~~(10 * file.size / 1024 / 1024)) / 10 + "MB" : ~~(file.size / 1024) + "KB";
//        $(".img-list").prepend($(li));
        reader.onload = function() {
            var result = this.result;
            var img = new Image();
            img.src = result;
            
//            $(li).append('<img  class="imgs" src="'+ result +'">');
            var  imgs=[];
            
            //如果图片大小小于100kb，则直接上传
            if (result.length <= maxsize) {
                $(".img-list li img").attr("src",img.src);
                imgs[0] = img.src;
                $.ajax({
                    url: 'self_data',
                    type: 'POST',
                    data:{m_avatar:imgs},
                    success: function(res){
                        if(res.status == 1){
                            $('.file-preview-image').attr('src',res.data);
                        }else{
                            layer.msg('<span style="color:#fff">选取头像失败</span>',{time:2000});
                        }
                    }
                });
                img = null;

                return;
            }
//      图片加载完毕之后进行压缩，然后上传
            if (img.complete) {
                callback();
            } else {
                img.onload = callback;
            }
            function callback() {
                var data = compress(img);
                $(".img-list li img").attr("src",data);
                imgs[0] = data;
                $.ajax({
                    url: 'self_data',
                    type: 'POST',
                    data:{m_avatar:imgs},
                    success: function(res){
                        console.log(res)
                        if(res.status == 1){
                            $('.file-preview-image').attr('src',res.data);
                        }else{
                            layer.msg('<span style="color:#fff">选取头像失败</span>',{time:2000});
                        }
                       
                    }
                });
                img = null;
            }
        };
        reader.readAsDataURL(file);
    })
};
//使用canvas对大图片进行压缩
function compress(img) {
    var initSize = img.src.length;
    var width = img.width;
    var height = img.height;
    //如果图片大于四百万像素，计算压缩比并将大小压至400万以下
    var ratio;
    if ((ratio = width * height / 4000000) > 1) {
        ratio = Math.sqrt(ratio);
        width /= ratio;
        height /= ratio;
    } else {
        ratio = 1;
    }
    canvas.width = width;
    canvas.height = height;
//        铺底色
    ctx.fillStyle = "#fff";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    //如果图片像素大于100万则使用瓦片绘制
    var count;
    if ((count = width * height / 1000000) > 1) {
        count = ~~(Math.sqrt(count) + 1); //计算要分成多少块瓦片
//            计算每块瓦片的宽和高
        var nw = ~~(width / count);
        var nh = ~~(height / count);
        tCanvas.width = nw;
        tCanvas.height = nh;
        for (var i = 0; i < count; i++) {
            for (var j = 0; j < count; j++) {
                tctx.drawImage(img, i * nw * ratio, j * nh * ratio, nw * ratio, nh * ratio, 0, 0, nw, nh);
                ctx.drawImage(tCanvas, i * nw, j * nh, nw, nh);
            }
        }
    } else {
        ctx.drawImage(img, 0, 0, width, height);
    }
    //进行最小压缩
    var ndata = canvas.toDataURL('image/jpeg', 0.1);
//        console.log('压缩前：' + initSize);
//        console.log('压缩后：' + ndata.length);
//        console.log('压缩率：' + ~~(100 * (initSize - ndata.length) / initSize) + "%");
    tCanvas.width = tCanvas.height = canvas.width = canvas.height = 0;
    return ndata;
}
    //选取头像
//    $('#file-4').on('change',function(){
//        var files = $('#file-4').prop('files');
//        var data = new FormData();
//        data.append('m_avatar', files[0]);
//        $.ajax({
//            url: 'self_data',
//            type: 'POST',
//            data: data,
//            cache: false,
//            processData: false,
//            contentType: false,
//            success: function(res){
//                if(res.status == 1){
//                    $('.file-preview-image').attr('src',res.data);
//                }else{
//                    layer.msg('<span style="color:#fff">选取头像失败</span>',{time:2000});
//                }
//            }
//        });
//    });
    //点击设置的返回
    // $("#header_fanhui").click(function(){
    //     var name_val=$(".set_text_margin").html();
    //     // console.log(name_val);
    //
    // })

    //点击修改昵称
    $(".set_name").click(function(){
        var name_val=$(".set_text_margin").html();
        $(".nickname_view input").val(name_val);
        $(".nickname").addClass("block");
        $(".nickname_img").addClass("block");
    })
    //点击修改昵称的返回
    $("#fanhui").click(function(){
        var textname=/^[a-zA-Z0-9\_\u4e00-\u9fa5]{0,10}$/;
        var name_val=$(".set_text_margin").html();
        // var nick_change_name=$(".nick_change_name").val();
            var save_val=$(".nickname_view input").val();
        if(name_val!=save_val && save_val != ''){
            layer.confirm('是否保存修改的昵称', {
                title:false,/*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['不保存','保存'], //按钮
                btn1:function(){
                    var index = layer.open();
                    $(".nickname").removeClass("block");
                    layer.close(index);
                    // location.href="/member/Modifydata/self_data";
                },
                btn2:function(){
                    $(".set_name .set_text_margin").html(save_val);
                    $.post("/member/modifydata/self_data",{m_name:save_val},function(res){
                        layer.msg("<span style='color:#fff'>"+res.msg+"</span>",{
                            time:2000
                        });
                    });
                    $(".nickname").removeClass("block");
                },
            })
            // return false;
        }else{
            $(".nickname").removeClass("block");
        }

    })
    //键盘抬起时出现小叉号
    $(".nickname_view input").keyup(function(){
        var nickname_val=$(this).val();
        if(nickname_val==""){
            $(".nickname_img").removeClass("block");
        }else{
            $(".nickname_img").addClass("block")
        }
        
    })
    //点击昵称叉号事件
    $(".nickname_img").click(function(){
       $(".nickname_view input").val("");
       $(".nickname_view input").focus();
       $(this).removeClass("block");
    })
     //昵称点击完成
     // function sava(){
        var textname=/^[a-zA-Z0-9\_\u4e00-\u9fa5]{0,10}$/;
         $(".nickname_save").click(function(){
            var save_val=$(".nickname_view input").val();
             var name_val=$(".set_text_margin").html();
             if(save_val==name_val){
                 $(".nickname").removeClass("block");
                 return false;
             }
            if(!textname.test(save_val)){
                layer.msg("<span style='color:#fff'>请输入由中英文、数字组成的1-10个字符</span>",{
                    time:2000
                });
                return false;
            }
            if(save_val.length>10){
                layer.msg("<span style='color:#fff'>请输入1-10个字符</span>",{
                    time:2000
                });
                return false;
            }if(save_val.length<1){
                layer.msg("<span style='color:#fff'>昵称不能为空</span>",{
                    time:2000
                });
                return false;
            }
            $(".nickname").removeClass("block");
            $(".set_name .set_text_margin").html(save_val);
            $.post("/member/modifydata/self_data",{m_name:save_val},function(res){
                 // alert(res.msg);
                layer.msg("<span style='color:#fff'>"+res.msg+"</span>",{
                    time:2000
                });
            });
         })
     // } 
     // sava();
     
      //点击性别
    $(".set_sex").click(function(){
        $(".sex").addClass("block");
    })
    //点击性别的取消
    $(".sex_btn").click(function(){
        $(".sex").removeClass("block");
    })
    $('.sex-over').click(function(){
        $(".sex").removeClass("block");
    })
    //点击选择性别
    $(".sex_list").click(function(){
        var htm=$(this).html();
        $(".sex").removeClass("block");
        $(".set_sex .set_text_margin").html(htm);
        var m_sex = $(this).attr('get_val');
        $.post("/member/modifydata/self_data",{m_sex:m_sex},function(res){
            // alert(res.msg);
             layer.msg("<span style='color:#fff'>"+res.msg+"</span>",{
                time:2000
            });
        });
    })
//    //昵称
//    $('.m_name').blur(function(){
//        var value = $(this).val();
//        $.post("/member/modifydata/self_data",{m_name:value},function(res){
//            console.log(res);
//        });
//    })
//    //性别
//    $('.m_sex').change(function(){
//        console.log(1);
//        var value = $(this).val();
//        console.log(value);
//        $.post("/member/modifydata/self_data",{m_sex:value},function(res){
//            console.log(res);
//        });
//    })
//    //真实姓名
//    $('.real_name').blur(function(){
//        var value = $(this).val();
//        $.post("/member/modifydata/self_data",{real_name:value},function(res){
//            console.log(res);
//        });
//    })
//    //身份证号
//    $('.m_identification').blur(function(){
//        var value = $(this).val();
//        $.post("/member/modifydata/self_data",{m_identification:value},function(res){
//            console.log(res);
//        });
//    })

// function check_open() {
//     layer.confirm("绑定银行卡<br>即可快速实名认证啦！", {
//         title: false, /*标题*/
//         closeBtn: 0,
//         btnAlign: 'c',
//         btn: ['再想想', '立即绑定'], //按钮
//         // 按钮2的回调
//         btn2: function () {
//             window.location.href = '/member/wallet/bindingCard';
//         }
//     })
// }
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>