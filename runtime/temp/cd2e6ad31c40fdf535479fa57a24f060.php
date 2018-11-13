<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"D:\project\pai\public/../application/member/view/register/index.html";i:1541491284;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1541491283;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1541491283;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<!-- <link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="__CSS__/common/popups.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="__CSS__/login/login.css"> -->
<link rel="stylesheet" type="text/css" href="__CSS__/address/register.css">

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
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?>>
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>
<!--<div class="header_nav">-->
  <!--<div class="header_view">-->
   <!--&lt;!&ndash;  <div class="header_back">-->
        <!--<img src="__STATIC__/icon/publish/icon_nav_back.png">-->
    <!--</div> &ndash;&gt;-->
    <!--<div class="header_tit">-->
        <!--<div class="header_back" onClick="javascript :history.back(-1);">-->
          <!--<img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">-->
        <!--</div>-->
    <!--</div>-->
  <!--</div>-->
<!--</div>-->
</header>
        <header></header>
        
<main style="margin-top: 0.8rem;">
<p class="login_tit">使用手机号注册</p>
  <div class="register_list">
    <div class="register_inp">
      <p>+86</p>
      <input type="number"  class='m_mobile' placeholder="请输入注册手机号（必填）" oninput="if(value.length>11)value=value.slice(0,11)">
    </div>
  </div>
  <div class="register_list">
    <div class="register_inp">
      <input type="number"  class="verification" placeholder="请输入验证码" oninput="if(value.length>4)value=value.slice(0,4)">
      <button class="register_code">发送验证码</button>
    </div>
  </div>
  <div class="register_list">
    <div class="register_inp register_pass">
      <input type="password" class='m_pwd' id="p1" placeholder="设置登录密码(6-16位数字/密码的组合)" maxlength="16" oninput="if(value.length>16)value=value.slice(0,16)">
      <input type="text" id="t1"  placeholder="设置登录密码(6-16位数字/密码的组合)" maxlength="16" oninput="if(value.length>16)value=value.slice(0,16)">
      <div class="register_cancel_icon">
        <img src="__STATIC__/image/login/icon_login_clean@2x.png">
      </div>
      <div class="register_eye_icon">
        <img src="__STATIC__/image/login/icon_login_hideeye@2x.png" name="p1" id="kaiguan1">
      </div>
      <!-- <div class="register_eye_line"></div> -->
    </div>
  </div>
  <div class="register_list">
    <div class="register_inp register_pass2">
      <input type="password"  id="p2" class="re_pwd" placeholder="确定密码" maxlength="16" oninput="if(value.length>16)value=value.slice(0,16)">
      <input type="text" id="t2"  placeholder="确定密码" maxlength="16" oninput="if(value.length>16)value=value.slice(0,16)">
      <div class="register_cancel_icons">
        <img src="__STATIC__/image/login/icon_login_clean@2x.png">
      </div>
      <div class="register_eye_icons">
        <img src="__STATIC__/image/login/icon_login_hideeye@2x.png" name="p2" id="kaiguan2">
      </div>
    </div>
  </div>
    <div class="register_list">
        <div class="register_inp register_inp">
            <input type="text"  class="tj_mobile" placeholder="邀请人手机号(选填)">
        </div>
    </div>
    <input type="hidden"  class="ip" value="" placeholder="ip">
    <input type="hidden" class="type" value="3">
    <div class="register_agreements">
        <p>
            <img src="__STATIC__/image/register/icon_yixuanze@2x.png" class="register_radio register_radios">
            <img src="__STATIC__/image/register/icon_weixuanze@2x.png" class="register_radio">
            <span> 我已阅读并同意 </span>
            <a href="/index/index/agreement/at_name/注册协议和隐私政策">《注册协议和隐私政策》</a>
        </p>
    </div>
  <div class="register_btn register" disabled="disabled">
      <!--加入拍吖吖-->
      下一步
  </div>



</main>

<!--填写地址页面-->
<div class="register_address">
    <div class="header_back" >
        <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt close_address">
    </div>
    <p class="add_address">选择地址区域</p>
    <div class=" editaddress_inp">

        <img src="__STATIC__/image/register/icon_dizhi@2x.png" alt="" class="dingwei">
        <input id="demo1" type="text" name="pid "   readonly="readonly" placeholder="选择当前所在地址省/市/区" class="address_input">
        <input id="value1" type="hidden" name="area_id" />
        <img src="__STATIC__/icon/publish/icon_nav_jump@2x.png" class="address_edit">
    </div>
    <div class="success_register " disabled="disabled">完成注册</div>
</div>


        <footer></footer>
    </body>

    <!--bugtags 开始-->
    <!-- <script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script> -->
    <script>
        // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本
        // new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE');
    </script>
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
<!-- <script src="__STATIC__/lib/layui/layui.js"></script>
<script src="__JS__/common/popups.js"></script> -->
<!-- <script src="__JS__/login/login.js"></script> -->
<script src="__JS__/set/register.js"></script>
<script type="text/javascript" src="__JS__/applicationIn/textareaauto.js"></script>
<script>
    var phone = getUrlParam('phone');
    $('.tj_mobile').val(phone);
    function getUrlParam(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
        var r = window.location.search.substr(1).match(reg); //匹配目标参数
        if (r != null) return unescape(r[2]); return null; //返回参数值
    }

    $(function(){
        //调用地址插件
        var area1 = new LArea();
        area1.init({
            'trigger': '#demo1', //触发选择控件的文本框，同时选择完毕后name属性输出到该位置
            'valueTo': '#value1', //选择完毕后id属性输出到该位置
            'keys': {
                id: 'id',
                name: 'name'
            }, //绑定数据源相关字段 id对应valueTo的value属性输出 name对应trigger的value属性输出
            'type': 1, //数据源类型
            'data': LAreaData //数据源
        });
        area1.value=[0,0,0];

    });
</script>

</html>