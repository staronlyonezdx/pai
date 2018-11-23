<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\project\pai\public/../application/member/view/address/index.html";i:1542247672;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
<link rel="stylesheet" type="text/css" href="__CSS__/address/address.css">

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
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" >
            <!--<div class="header_back"  <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >-->
            <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
        </div>
    </div>
</div>
</header>
        <header></header>
        
<main>
    <div class="address-msg"></div>
    <div class="address_main">
        <input type="hidden" name="encrypt" value="<?php echo (isset($encrypt) && ($encrypt !== '')?$encrypt:0); ?>"/>
        <input type="hidden" name="pm_id" value="<?php echo (isset($pm_id) && ($pm_id !== '')?$pm_id:0); ?>"/>
        <input type="hidden" name="pcode" value="<?php echo (isset($pcode) && ($pcode !== '')?$pcode:0); ?>"/>
        <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="address_list" aid = <?php echo $vo['address_id']; ?>>
                <div class="address_con">
                    <div class="address_top" data="<?php echo $key; ?>">
                        <p class="address_name clear">
                            <?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>
                            <span class="rt"><?php echo (isset($vo['tel']) && ($vo['tel'] !== '')?$vo['tel']:''); ?></span>
                        </p>
                        <p class="address_name address_pad"><?php echo (isset($vo['pname']) && ($vo['pname'] !== '')?$vo['pname']:''); ?> <?php echo (isset($vo['cname']) && ($vo['cname'] !== '')?$vo['cname']:''); ?> <?php echo (isset($vo['dname']) && ($vo['dname'] !== '')?$vo['dname']:''); ?> <?php echo (isset($vo['address']) && ($vo['address'] !== '')?$vo['address']:''); ?></p>
                    </div>
                    <div class="address_site clear">
                        <!-- <input type="radio" name="address" class="address_inp"> -->

                        <?php if($vo['is_default'] == 1): ?>
                        <img src="__STATIC__/image/register/icon_yixuanze@2x.png" class="address_icon">
                        <!-- <img src="__STATIC__/image/register/icon_yixuanze@2x.png" class="address_icon"> -->

                        <span class="address_text">默认地址</span>
                        <?php else: ?>
                        <img src="__STATIC__/image/register/icon_weixuanze@2x.png" class="address_icon">
                        <!-- <img src="__STATIC__/image/register/icon_yixuanze@2x.png" class="address_icon"> -->

                        <span class="address_text">设为默认地址</span>
                        <?php endif; ?>
                        <span class="address_dele  address_edit rt">
                            <img src="__STATIC__/image/register/icon_del@2x.png" class="">
                            <span>删除</span>
                        </span>
                        <a href="/member/address/edit/encrypt/<?php echo $encrypt; ?>/address_id/<?php echo $vo['address_id']; ?>/pm_id/<?php echo $pm_id; ?>/pcode/<?php echo $pcode; ?>">
                            <span class="address_dele adress_compile rt">
                                <img src="__STATIC__/image/register/icon_bianji@2x.png" class="">
                                <span>编辑</span>
                            </span>
                        </a>
                    </div>
                    
                </div>
                
            </div>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <div class="address_list">
            <a href="/member/address/edit/encrypt/<?php echo $encrypt; ?>/pm_id/<?php echo $pm_id; ?>/pcode/<?php echo $pcode; ?>">
                <div class="address_noview">
                    <div class="address_nomain">
                        <img src="__STATIC__/image/goods/icon_+@2x.png">
                    </div>
                    <p>添加收货地址</p>
                </div>
            </a>
        </div>
        
    </div>
</main>
<!-- <a href="/member/address/edit/encrypt/<?php echo $encrypt; ?>/pm_id/<?php echo $pm_id; ?>/pcode/<?php echo $pcode; ?>" class="phonex addr">
    <div class="address_btn">
        添加收货地址
    </div>
</a> -->



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
<script src="__STATIC__/lib/layui/layui.js"></script>
<script src="__JS__/common/popups.js"></script>
<script src="__JS__/cookie/jquery.cookie.js"></script>
<script>
    $(function(){
        // var add_icon=$(".address_list .address_icon").is("src","static/image/register/icon_weixuanze@2x.png");
        // console.log(add_icon);


        // $(".address_list").first().find(".address_icon").attr("src","__STATIC__/image/register/icon_yixuanze@2x.png");
        // $(".address_icon").click(function(){
        //      $(".address_icon").attr("src","__STATIC__/image/register/icon_weixuanze@2x.png");
        //      $(this).attr("src","__STATIC__/image/register/icon_yixuanze@2x.png");
        //
        // })
        // 设为默认地址
        $(".address_site .address_icon").click(function(){
            // alert(1)
            $(".address_icon").attr("src","__STATIC__/image/register/icon_weixuanze@2x.png");
            $(this).attr("src","__STATIC__/image/register/icon_yixuanze@2x.png");
            $(this).parents(".address_list").prependTo(".address_main");
            var aid = $(this).parents(".address_list").attr("aid");
            var is_default = 1;//TODO。。。（需要前端完善,这里是否要选中还是取消，1选中 0不选中）
            if(is_default==1){
                $(".address_icon").attr("src","__STATIC__/image/register/icon_weixuanze@2x.png");
                $(this).attr("src","__STATIC__/image/register/icon_yixuanze@2x.png");
                $(".address_icon").siblings(".address_text").html("设为默认地址");
                $(this).siblings(".address_text").html("默认地址");
            }
            $.ajax({
                url:"<?php echo url('address/setdefault'); ?>",
                dataType:'JSON',
                type:'POST',
                data:{is_default:is_default,address_id:aid},
                success: function(data) {
                    console.log(data);
                    if(data.status){
                        layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                            time:2000
                        });
                        // alert(data.msg+"..........具体处理请前端完善");
//                        window.location.reload();
                    }else{
                        layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                            time:2000
                        });
                        // alert(data.msg+"..........具体处理请前端完善");
//                        window.location.reload();
                    }
                }
            });
        });

        // 删除地址
        $(".address_edit").click(function(){
            layer.confirm('是否确认删除该地址？', {
                title:false,/*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['取消','删除'], //按钮
                btn2:function(){
                    remov();
                }
            })
            var aid = $(this).parents(".address_list").attr("aid");
            function remov(){
                $.ajax({
                    url:"<?php echo url('address/delete'); ?>",
                    dataType:'JSON',
                    type:'POST',
                    data:{address_id:aid},
                    success: function(data) {
                        console.log(data);
                        if(data.status){
                            layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                                time:2000
                            });
                            // alert(data.msg+"..........具体处理请前端完善");
                            window.location.reload();
                        }else{
                            if(data.status){
                                layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                                    time:2000
                                });
                                // alert(data.msg+"..........具体处理请前端完善");
                                window.location.reload();
                            }
                        }
                    },
                    error:function(data){
                        alert(data);
                    }

                })
            }
    })

        // 订单页选择收货地址
        // $(".address_top").click(function(){
        //     var encrypt = $("input[name=encrypt]").val();
        //     console.log(encrypt);
        //     var pm_id = $("input[name=pm_id]").val();
        //     var address_id = $(this).parents(".address_list").attr("aid");
        //     if(encrypt != '' && encrypt != 0){
        //         window.location.href = "/member/Orderpai/confirm/param/" + encrypt + "/address_id/" + address_id;
        //     }else if(pm_id > 0){
        //         // 更新擂主地址
        //         $.ajax({
        //             url:"/popularity/popularityorder/change_address",
        //             dataType:'JSON',
        //             type:'POST',
        //             data:{address_id:address_id,pm_id:pm_id},
        //             success: function(data) {
        //                 console.log(data);
        //                 if(data.status){
        //                     window.history.back();
        //                     // window.location.href="/popularity/popularityorder/order_info/pm_id/"+pm_id;
        //                 }else{
        //                     if(data.status){
        //                         layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
        //                             time:2000
        //                         });
        //                         window.location.reload();
        //                     }
        //                 }
        //             },
        //             error:function(data){
        //                 alert(data);
        //             }
        //
        //         })
        //     }
        // });
        
        var pm_id = $("input[name=pm_id]").val();
        $.ajax({
            url:"/popularity/popularitygoods/get_pm_address_status",
            dataType:'JSON',
            type:'POST',
            data:{pm_id:pm_id},
            success: function(data) {
                if(data.status == 1) {
                    $('.address-msg').text(data.msg).show();
                }
            }
        })

        //如果是普通商品或者积分商品进入地址页面
        if("<?php echo $encrypt; ?>"!=0 || "<?php echo $pcode; ?>"!=0){
            $('.header_back').click(function(){                
                window.history.back();
            })
            ptchangeAddress();
        }

        //如果是人气商品进入地址页面
        if("<?php echo $pm_id; ?>"==""||"<?php echo $pm_id; ?>"==0||"<?php echo $pm_id; ?>"==null){
        }else{
            var hasAddress = $.cookie('hasAddress');
            // 判断是否已添加收货地址，如果未添加点击返回则弹框
            if(hasAddress == 0){
                $('.header_back').click(function(){
                    layer.confirm('当前尚未添加收货地址揭晓商品将无法送到您手里', {
                        title:false,/*标题*/
                        closeBtn: 0,
                        btnAlign: 'c',
                        btn: ['暂不添加','留下选择'], //按钮
                        btn1:function(){
                            var header_path = "<?php echo (isset($header_path) && ($header_path !== '')?$header_path:''); ?>";
                            if(header_path.length > 0){
                                window.location.href=header_path;
                            }else{
                                window.history.back();
                            }
                        },
                    })
                })
                changeAddress();
            }else{
                //修改地址弹框
                changeAddress();
                $('.header_back').click(function(){
                    window.history.back();
                })
            }
        }
        if(getUrlParam('thisinfo')==1){
            $('.header_back').click(function(){
                window.history.back();
            })
            // ptchangeAddress();
        }
        //个人中心设置地址
        function getUrlParam(name) {    
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); 
            // 构造一个含有目标参数的正则表达式对象    
            var r = window.location.search.substr(1).match(reg);  
            // 匹配目标参数    
            if (r != null) return unescape(r[2]); return null; // 返回参数值
        }
        function ptchangeAddress(){
            $(".address_top").click(function(){
                var i = $(this).attr('data');
                var address_name = $(".address_list").eq(i).find('.address_name').html();
                var address_pad = $(".address_list").eq(i).find('.address_pad').html();
                var encrypt = $("input[name=encrypt]").val();
                var pcode = $("input[name=pcode]").val();
                var pm_id = $("input[name=pm_id]").val();
                var address_id = $(this).parents(".address_list").attr("aid");

                $.cookie('address_id', address_id, {expire: 7,path:"/"});
                window.history.go(-1);
                // if("<?php echo $encrypt; ?>"!=0) {
                //     window.location.href = "/member/Orderpai/confirm/param/" + encrypt + "/address_id/" + address_id;
                // }else if("<?php echo $pcode; ?>"!=0) {
                //     window.location.href = "/pointpai/Pointorder/confirm_order/pcode/"+pcode+"/address_id/" + address_id;
                // }                
            })
        }
    
        function changeAddress(){
                $(".address_top").click(function(){
                    // alert("e");
                    var i = $(this).attr('data');
                    var address_name = $(".address_list").eq(i).find('.address_name').html();
                    var address_pad = $(".address_list").eq(i).find('.address_pad').html();
                    layer.confirm('<p>'+ address_name +'</p><span>'+ address_pad +'</span><p style="color:#D8791D">注：人气王公布后地址便不可修改！</p>', {
                        title:'确认该收货地址',/*标题*/
                        closeBtn: 0,
                        btnAlign: 'c',
                        btn: ['我再想想','确认添加'], //可以无限个按钮
                        btn2: function(index, layero){
                            //按钮【按钮三】的回调
                            var encrypt = $("input[name=encrypt]").val();
                            var pm_id = $("input[name=pm_id]").val();
                            var address_id = $(".address_list").eq(i).attr("aid");
                            // if(encrypt != '' && encrypt != 0){
                            //     window.location.href = "/member/Orderpai/confirm/param/" + encrypt + "/address_id/" + address_id;
                            // }else if(pm_id > 0){
                                // 更新擂主地址
                                $.ajax({
                                    url:"/popularity/popularityorder/change_address",
                                    dataType:'JSON',
                                    type:'POST',
                                    data:{address_id:address_id,pm_id:pm_id},
                                    success: function(data) {
                                        console.log(data);
                                        if(data.status){
                                            window.history.go(-1);
                                            // window.location.href="/popularity/popularityorder/order_info/pm_id/"+pm_id;
                                        }else{
                                            if(data.status){
                                                layer.msg("<span style='color:#fff'>"+data.msg+"</span>",{
                                                    time:2000
                                                });
                                                window.location.reload();
                                            }
                                        }
                                    },
                                    error:function(data){
                                        alert(data);
                                    }

                                })
                            // }
                            $.cookie('hasAddress','1',{path:'/',expire:10000})
                        }
                    }, function(index, layero){
                        //按钮【按钮一】的回调
                        layer.closeAll()
                    });
                })
            }
        
    })
</script>

</html>