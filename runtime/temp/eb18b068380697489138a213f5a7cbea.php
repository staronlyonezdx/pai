<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:80:"D:\project\pai\public/../application/pointpai/view/pointorder/confirm_order.html";i:1542080366;s:67:"D:\project\pai\public/../application/pointpai/view/common/base.html";i:1542013165;s:69:"D:\project\pai\public/../application/pointpai/view/common/header.html";i:1541491294;s:69:"D:\project\pai\public/../application/pointpai/view/common/js_sdk.html";i:1541491294;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/goods/upload.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/conf_order.css">
<link rel="stylesheet" type="text/css" href="__CSS__/order_info/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goodsproduct/details.css">

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
        </div>
    </div>
</div>
</header>
        
<main >
    <?php if($gs_id < 2): ?>
    <!--地址栏-->
    <a href="/member/address/index/pcode/<?php echo $pcode; ?>">
        <div class="conf_order">
            <div class="conf_list clear">
                <div class="conf_img lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/orderpai/icon_nav_dingwei@2x.png">
                </div>
                <?php if(empty($default_address) || (($default_address instanceof \think\Collection || $default_address instanceof \think\Paginator ) && $default_address->isEmpty())): ?>
                <a href="/member/address/edit/pcode/<?php echo $pcode; ?>">添加收货地址</a>
                <?php else: ?>
                <div class="conf_name lf">
                    <p class="conf_tit clear">
                        <?php echo (isset($default_address['name']) && ($default_address['name'] !== '')?$default_address['name']:''); if($default_address['is_default'] == 1): ?>
                        <span class="conf_default">默认</span>
                        <?php endif; ?>
                        <span class="rt"><?php echo (isset($default_address['secrecy_tel']) && ($default_address['secrecy_tel'] !== '')?$default_address['secrecy_tel']:''); ?></span>
                    </p>

                    <p class="conf_site">
                        <?php echo $default_address['province']; ?><?php echo $default_address['city']; ?><?php echo $default_address['district']; ?><?php echo $default_address['address']; ?>
                        <span class="rt">
                            <img src="__STATIC__/image/orderpai/icon_jump@2x.png">
                        </span>
                    </p>
                    <input type="hidden" name="address_id" value="<?php echo $default_address['address_id']; ?>"/>
                </div>
                <?php endif; ?>
            </div>
            <div class="conf_seal">
                <img src="__STATIC__/image/orderpai/icon_ft@2x.png">
            </div>
        </div>
    </a>
    <?php endif; ?>
    <a href="/member/orderpai/pai_rule">
        <div class="details_rule clear">
            <span class="lf">拍吖吖揭晓规则 了解一下~</span>
            <span class="rt">
                查看规则
                <img src="/static/image/details/icon_jump@2x.png">
            </span>
        </div>
    </a>

    <div class="conf_content">
        <div class="conf_con_tit">
            <img src="/static/image/index/pic_home_taplace@2x.png" data-original='<?php echo $info['store_logo']; ?>'>
            <span><?php echo (isset($info['stroe_name']) && ($info['stroe_name'] !== '')?$info['stroe_name']:''); ?></span>
        </div>
        <div class="conf_order_main clear">
            <div class="conf_order_img lf">
                <img src="/static/image/index/pic_home_taplace@2x.png" data-original='<?php echo $info['gp_img']; ?>'>
            </div>
            <div class="conf_order_text lf">
                <p><?php echo (isset($info['g_name']) && ($info['g_name'] !== '')?$info['g_name']:''); ?></p>

                <div class="conf_order_price clear">
                    <span class="conf_order_new">
                        <?php if($info['gp_sale_price'] == $info['gp_market_price']): ?>
                        <?php echo (isset($info['gp_sale_price']) && ($info['gp_sale_price'] !== '')?$info['gp_sale_price']:'0.00'); ?> 积分
                        <?php else: ?>
                        <?php echo (isset($info['gp_sale_price']) && ($info['gp_sale_price'] !== '')?$info['gp_sale_price']:'0.00'); ?> 积分
                        <span><?php echo (isset($info['gp_market_price']) && ($info['gp_market_price'] !== '')?$info['gp_market_price']:'0.00'); ?></span>
                        <?php endif; ?>                       
                    </span>
                    <span class="conf_order_inventory rt">x
                        <span class="mynum"><?php echo (isset($num) && ($num !== '')?$num:'0'); ?></span>
                    </span>
                </div>
            </div>

        </div>
        <div class="conf_order_data">
            <div class="clear">
                截止日期
                <span class="conf_order_hint">目标满额立即揭晓</span>
                <span class="conf_order_time rt"><?php echo date('Y-m-d H:i',$info['g_endtime']); ?></span>
            </div>
        </div>
        <div class="conf_order_data conf_order_num">
            <div class="clear">
                吖吖码份数
                <!--<span class="conf_order_hint">每份对应一个幸运码</span>-->
                <div class="conf_order_but rt clear">
                    <div class="conf_order_prep lf">
                        <img src="__STATIC__/image/orderpai/icon_-@2x.png">
                    </div>
                    <div class="conf_order_inp lf">
                        <input type="number" name="num" min="1" max="<?php echo (isset($max_pai_num) && ($max_pai_num !== '')?$max_pai_num:0); ?>"
                               value="<?php echo (isset($num) && ($num !== '')?$num:'0'); ?>" readonly>
                    </div>
                    <div class="conf_order_add lf">
                        <img src="__STATIC__/image/orderpai/icon_+@2x.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="conf_order_data">
            <div class="clear">
                配送方式
                <span class="conf_order_hint"><?php echo (isset($info['g_express_way']) && ($info['g_express_way'] !== '')?$info['g_express_way']:'未选择'); ?></span>
                
            </div>
        </div>
        <div class="conf_order_data">
            <div class="clear">
                总积分
                <span class="conf_order_time conf_price rt"><small><?php echo (isset($all_money) && ($all_money !== '')?$all_money:'0.00'); ?></small></span>
            </div>
        </div>
    </div>
    <div class="conf_order_btn ljzf_but" style="background:linear-gradient(90deg,rgba(255,111,35,1),rgba(255,172,44,1))">
        提交订单
    </div>
    <!--支付密码浮动层-->
    <div class="ftc_wzsf">
        <div class="srzfmm_box">
            <div class="qsrzfmm_bt clear_wl">

                <span class="">请输入支付密码</span>
                <img src="__STATIC__/image/orderpai/icon_x@2x.png" class="tx close fr conf_order_colse">
            </div>
            <div class="zfmmxx_shop conf_order_paypassword_main clear">
                <!--<span class="conf_order_pay_text lf">需支付￥</span>-->
                <p class="conf_order_hints">
                    <span class="conf_order_pay_text">需支付</span>
                    <span class="all_money"><?php echo $all_money; ?></span>
                    <span class="conf_order_fuhao">积分</span>
                </p>
            </div>

            <div class="inputBoxContainer" id="inputBoxContainer">
                <input type="tel" class="realInput" autofocus="autofocus"/>
                <div class="bogusInput">
                    <input type="password" maxlength="6" disabled class="active99"/>
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                </div>
            </div>
            <div class="conf_order_paypassword_hint clear">
                <div class="conf_order_balance lf">当前剩余
                    <span> <small><?php echo (isset($syumem_info['tui_diamond']) && ($syumem_info['tui_diamond'] !== '')?$syumem_info['tui_diamond']:'0.00'); ?></small>积分</span>
                    <p class="lack_msg" style="display: none;">积分不足请立即充值</p>
                </div>
                <a href="/member/sitelogin/to_sy"><div class="conf_order_pay rt">充值</div></a>
            </div>
            <input type="hidden" name="o_id" value="0"/>
            <input type="hidden" name="gp_id" value="<?php echo $gp_id; ?>"/>
            <input type="hidden" name="gs_id" value="<?php echo (isset($gs_id) && ($gs_id !== '')?$gs_id:1); ?>"/>
            <a href="/member/Register/amnesia_payment">
                <p class="conf_forget">忘记密码</p>
            </a>
        </div>
        <div class="hbbj"></div>
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
<script type="text/javascript" src="__JS__/orderpai/conf_order.js"></script>
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script type="text/javascript" src="__JS__/md5.js"></script>
<script type="text/javascript">
    $(function () {
        //提交订单
        $(".ljzf_but").click(function(){            
            if($('.conf_price').find('small').text()><?php echo (isset($syumem_info['tui_diamond']) && ($syumem_info['tui_diamond'] !== '')?$syumem_info['tui_diamond']:'0.00'); ?>) {
                $('.lack_msg').show();
            }
            var address_id = $('input[name=address_id]').val();
            var num = $('input[name=num]').val();
            var gp_id = $('input[name=gp_id]').val();
            var o_id = $('input[name=o_id]').val();
            var gs_id = $('input[name=gs_id]').val();
            $.ajax({
                url: "/pointpai/Pointorder/creat_order",
                dataType: 'json',
                type: 'POST',
                data: {address_id: address_id, num: num, gp_id: gp_id, o_id: o_id, gs_id: gs_id },
                success: function (data) {
                    //console.log(data);
                    if (data.status == 1) {
                        $('input[name=o_id]').val(data.data);
                        //打开浮动
                        $(".ftc_wzsf").show();
                        boxInput.init(function () {
                            var pawval = boxInput.getBoxInputValue();
                            setTimeout(function () {
                                pwd = hex_md5(pawval);

                                // 判断剩余积分                                
                                if (<?php echo $all_money; ?> > <?php echo (isset($syumem_info['tui_diamond']) && ($syumem_info['tui_diamond'] !== '')?$syumem_info['tui_diamond']:'0.00'); ?>) {
                                    // 失败提示
                                    layer.msg("<span style='color:#fff'>积分不足，请充值</span>", {
                                        time: 2000
                                    });
                                    return false;
                                }
                                // 支付请求
                                var o_id = $("input[name=o_id]").val();
                                o_id = Number(o_id);
                                //alert(o_id);
                                //alert(pwd);
                                $.ajax({
                                    url: "/pointpai/Pointorder/order_pay",
                                    dataType: 'json',
                                    type: 'POST',
                                    data: {o_id: o_id, pwd: pwd},
                                    success: function (data) {
                                        if(data.status != 1){
                                            layer.msg("<span style='color:#fff'>"+data.msg+"</span>", {
                                                time: 2000
                                            });
                                            $(".realInput").val('');
                                            boxInput.setValue();
                                        }else{
                                            // 如果成团异步调用退款操作
                                            if(data.data.is_mem_full > 0){
                                                var gp_id = "<?php echo (isset($gp_id) && ($gp_id !== '')?$gp_id:0); ?>";
                                                $.ajax({
                                                    url: "/pointpai/Pointorder/point_pay_callback",
                                                    dataType: 'json',
                                                    type: 'POST',
                                                    data: {gp_id: gp_id},
                                                    success: function (data) {
                                                        console.log(data);
                                                        //不用做处理
                                                    }
                                                });
                                            }
                                            window.location.href="/pointpai/Pointorder/pay_result/o_id/"+o_id+"/j_type/1";
                                            sessionStorage.setItem('backUrl',window.location.href);

                                        }
                                    }
                                });
                            }, 200);
                        });
                    }else if(data.status == 2){
                        //判断如果没有开通钱包
                        window.location.href=data.data;
                    } else {
                        // 失败提示
                        layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                            time: 2000
                        });
                    }
                }
            });
        });

        // 充值
        $('.conf_order_pay').click(function () {
            var o_id = $("input[name=o_id]").val();
            window.location.href="/member/wallet/recharge/r_jump_type/1/r_jump_id/"+o_id;
        });
        // 数量加
        $(".conf_order_add").click(function () {
            var num = $('input[name=num]').val();
            var max = $('input[name=num]').attr("max");
            var left_num = $(".left_num").html();
            num = parseInt(num);
            max = parseInt(max);
            left_num = parseInt(left_num);

            if(left_num < max){
                max = left_num;
            }
            if (max > num) {
                num++;
            } else {
                layer.msg("<span style='color:#fff'>您当前最多能团" + max + "件</span>", {
                    time: 2000
                });
            }
            $('input[name=num]').val(num);
            $(".mynum").html(num);
            // 计算金额
            settle(num);
        });
        // 数量减
        $(".conf_order_prep").click(function () {
            var num = $('input[name=num]').val();
            var min = $('input[name=num]').attr("min");
            num = parseInt(num);
            min = parseInt(min);
            if (min < num) {
                num--;
            }
            $('input[name=num]').val(num);
            $(".mynum").html(num);
            // 计算金额
            settle(num);
        });
        
        //计算金额
        function settle(num) {
            var dj = "<?php echo (isset($info['gp_sale_price']) && ($info['gp_sale_price'] !== '')?$info['gp_sale_price']:'0.00'); ?>";
            var yf = Number("<?php echo (isset($info['g_express']) && ($info['g_express'] !== '')?$info['g_express']:'0.00'); ?>");
            $('.conf_price').find('small').text(((dj*num)+yf).toFixed(2));
            $('.all_money').text(((dj*num)+yf).toFixed(2));
        }

        //关闭浮动
        $(".close").click(function () {
            $(".ftc_wzsf").hide();
            $('.realInput').val();
            boxInput.setValue();
            i = 0;
            is_setorder();
        });

        // 判断此页面是否已经生成订单 生成则跳转
        function is_setorder() {
            var o_id = $('input[name=o_id]').val();
            if (o_id > 0) {
                window.location.href = "/pointpai/Pointorder/index/o_id/" + o_id + "/j_type/1";
                // alert(0)
                sessionStorage.setItem('backUrl',window.location.href);
            }
        }
        is_setorder();

    });
</script>

</html>