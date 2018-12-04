<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\project\pai\public/../application/member/view/register/it_to_rg.html";i:1543549781;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543280491;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<!--<link rel="stylesheet" type="text/css" href="__CSS__/address/register.css">-->
<link rel="stylesheet" type="text/css" href="__CSS__/core/continue_invitation.css">

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
        <header></header>
        <header></header>
        
<main style="margin-top: 0;">
    <div class="continue_bg">
        <a href="/">
            <div class="continue_shouye">
                <img src="__STATIC__/image/share_list/icon_nav_backhome@2x.png" alt=""/>
            </div>
        </a>
        <img src="__STATIC__/image/core/BG2@2x.png" alt="">
        <div class="continue_view">
            <a href="/member/core/rule/">
                <div class="continue_huodong">
                    <img src="__STATIC__/image/core/huodong@2x.png" alt="">
                </div>
            </a>
            <div class="continue_data">
                活动时间 7月1日 ~ 12月31
            </div>
            <div class="continue_liucheng2">
                <div class="continue_inp_view">
                    <div class="continue_phone">
                        <img src="__STATIC__/image/core/icon_shouji@2x.png" alt="">
                        <input type="number" name="phone" class='m_mobile' placeholder="请输入注册手机号" oninput="if(value.length>11)value=value.slice(0,11)">
                    </div>
                    <div class="continue_phone">
                        <img src="__STATIC__/image/core/icon_yanzengma@2x.png" alt="">
                        <input type="number" name="code" class="verification" placeholder="请输入验证码" oninput="if(value.length>6)value=value.slice(0,6)">
                        <button class="continue_it_code register_code">获取验证码</button>
                    </div>
                    <div class="continue_phone">
                        <img src="__STATIC__/image/core/icon_mima@2x.png" alt="">
                        <input type="password" name="password" class='m_pwd'  placeholder="请输入密码"  maxlength="16" oninput="if(value.length>16)value=value.slice(0,16)">
                    </div>
                    <div class="continue_yaoqingren">
                        <span id="tel"><?php echo isset($phone) ? $phone :  ''; ?></span>邀请你加入拍吖吖
                    </div>
                    <div class="continue_tijiao_btn">
                        提交注册信息
                    </div>
                </div>
            </div>
            <div class="continue_fuli">
                <!-- <a href="/index/index/agreement/at_name/邀请新人活动规则"> -->
                    <!-- 查看福利详情 -->
                <!-- </a> -->
            </div>
            <div class="continue_guize">
                <div class="continue_margin">
                    <div class="continue_text">
                        <p>邀请限定范围</p>
                        <span>被邀请人必须是未在拍吖吖平台注册过的新用户</span>
                    </div>
                    <div class="continue_text">
                        <p>二维码或链接</p>
                        <span>被邀请人必须通过邀请人分享的二维码或链接注 册入驻拍吖吖才算成功</span>
                    </div>
                    <div class="continue_text">
                        <p>填写邀请人</p>
                        <span>被邀请人自行下载拍吖吖App，在注册界面自行填写邀请人（必须是在平台注册过的用户）的手机号，且单次参团大于等于50即为成功邀请。</span>
                    </div>
                    <div class="continue_text">
                        <span>如有违法违规作弊行为将被取消奖励资格</span>
                    </div>
                    <a href="/index/index/agreement/at_name/邀请新人活动规则">
                        查看完整规则详情
                    </a>
                </div>
            </div>
            <div class="continue_pop">
                <div class="continue_con">
                    <div class="continue_con_top">
                        <img src="__STATIC__/image/core/icon_yaoqingma@2x.png" alt="">
                    </div>
                    <div class="continue_con_code">
                        <img src="__STATIC__/image/core/icon_member _gold_lage 拷贝@2x.png" alt="">
                    </div>
                    <div class="continue_con_btn clear">
                        <div class="lf">保存二维码</div>
                        <div class="rt">复制链接</div>
                    </div>
                    <div class="continue_con_list clear">
                        <div class="continue_con_list_div lf">
                            <div>
                                <img src="__STATIC__/image/core/wx@2x.png" alt="">
                            </div>
                            <p>微信好友</p>
                        </div>
                        <div class="continue_con_list_div lf">
                            <div>
                                <img src="__STATIC__/image/core/pyq@2x.png" alt="">
                            </div>
                            <p>朋友圈</p>
                        </div>
                        <div class="continue_con_list_div lf">
                            <div>
                                <img src="__STATIC__/image/core/qq@2x.png" alt="">
                            </div>
                            <p>QQ好友</p>
                        </div>
                        <div class="continue_con_list_div lf">
                            <div>
                                <img src="__STATIC__/image/core/xl@2x.png" alt="">
                            </div>
                            <p>新浪微博</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<!--<script src="__JS__/set/register.js"></script>-->
<script>
$(function(){
    //将手机号中间4位数隐藏
    var tel=$("#tel").html();
    $("#tel").html(tel.substring(0,3)+"****"+tel.substring(7,11));
    $("input[name='phone']").blur(function(){
        // var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
        var phone=$(this).val();
        if (phone.length!=11) {
            layer.msg("<span style='color:#fff'>手机号输入有误</span>",{
                time:2000
            });
            return false;
        }
    })
    $("input[name='code']").blur(function(){
        var code=$(this).val();
        if(code==""){
            layer.msg("<span style='color:#fff'>验证码不能为空</span>",{
                time:2000
            });
            return false;
        }
    })
    $("input[name='password']").blur(function(){
        var m_mima=/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/;
        var password=$(this).val();
        if (!m_mima.test(password)) {
            layer.msg("<span style='color:#fff'>请输入6-16位数字/字母的组合</span>",{
                time:2000
            });
            return false;
        }
    })
})
    $('.continue_tijiao_btn').on('click',function(){
        // var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
        var m_mobile = $('.m_mobile').val();
        //验证码
        var verification = $('.verification').val();
        //密码
        var m_pwd=$(".m_pwd").val();
        var tj_mobile = "<?php echo $phone; ?>";
        $.post("/member/register/it_to_rg",{m_mobile:m_mobile,verification:verification,m_pwd:m_pwd,tj_mobile:tj_mobile},function(res){
            if(res.status == 1){
                location.href='/member/register/tj_success'
            }else{
                layer.msg("<span style='color:#fff'>"+res.msg+"</span>",{
                    time:2000
                });
            }
        })
    })



var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount;//当前剩余秒数
$(".continue_it_code").click(function(){
    // var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
    var m_mobile = $('.m_mobile').val();
    if (m_mobile.length!=11) {
            layer.msg("<span style='color:#fff'>手机号输入有误</span>",{
                time:2000
            });
        return false;
    }else{
        curCount=count;
        //设置button效果，开始计时
        var m_mobile = $('.m_mobile').val();
        $.ajax({
            type:"POST",//用post方式传输
            dataType:"JSON",//数据格式：JSON
            url:"/member/login/get_token ",//目标地址
            data:{
                mobile:m_mobile
            },
            success:function(res){
                // console.log(res)
                $.ajax({
                    type:"POST",//用post方式传输
                    dataType:"JSON",//数据格式：JSON
                    url:"/member/register/register_code",//目标地址
                    data:{
                        m_mobile:m_mobile,
                        sms_checked_code:res.data
                    },
                    success:function(str){
                        console.log(str);
                        if(str.status == 1){
                            $('.continue_it_code').attr("disabled","true");
                            $(".continue_it_code").css({background:"#F2F2F2",color:"#aaaaaa",border:"none"});
                            $('.continue_it_code').text(curCount+"s后可重新发送");
                            InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                        }else if(str.status == 2){
                            layer.confirm(str.msg, {
                                title:false,/*标题*/
                                closeBtn: 0,
                                btnAlign: 'c',
                                btn: ['我知道啦','前去登录'],
                                btn2:function(){
                                    location.href="/member/login/index";
                                }
                            })
                        }else{
                            layer.msg("<span style='color:#fff'>"+str.msg+"</span>",{
                                time:2000
                            });
                        }
                    }
                })
            }
        })
        
    }
})
//timer处理函数
function SetRemainTime(){
    if(curCount==0){
//        window.clearInterval(InterValObj);//停止计时器
        $(".continue_it_code").css({background:"transparent",color:"#2B2B2B"});
        $(".continue_it_code").removeAttr("disabled");//启用按钮
        $(".continue_it_code").text("重新发送");
    }else{
        curCount--;
        $(".continue_it_code").css({background:"#F2F2F2",color:"#aaaaaa",border:"none"});
        $(".continue_it_code").text(curCount+"s后可重新发送");
    }
}
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>