<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"D:\project\pai\public/../application/member/view/core/index.html";i:1541765256;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1541491283;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/common/swiper.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/core/vip_center1.css">
<style>
    .yaoqing{
        margin-left:4.5rem;
        margin-top: -3.3rem;
        display: block;
        font-size:0.24rem;
        font-weight:500;
        color:rgba(255,255,255,1);
    }
    .yaoqing:active{
        color:rgba(255,255,255,1);
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
        
<main style="margin-top: 0;">
    <div class="vip_top">
        <div class="header_nav">
            <div class="header_view">
                <div class="header_tit">
                    会员中心
                    <div class="header_back" onclick="backH5()">
                        <img src="__STATIC__/icon/publish/icon_nav_back1@2x.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vip_card_bg">
        <div class="vip_tab num">
            <div class="vip-photo">
                <?php if(empty($info['m_avatar']) || (($info['m_avatar'] instanceof \think\Collection || $info['m_avatar'] instanceof \think\Paginator ) && $info['m_avatar']->isEmpty())): ?>
                <img class="tx" src="__STATIC__/image/index/pic_home_taplace@2x.png">
                <?php else: ?>
                <img class="tx" src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo $info['m_avatar']; ?>">
                <?php endif; ?>
                <h3><?php echo $info['m_name']; ?></h3>

                <?php if(empty($info['tj']['tj_m_mobile']) || (($info['tj']['tj_m_mobile'] instanceof \think\Collection || $info['tj']['tj_m_mobile'] instanceof \think\Paginator ) && $info['tj']['tj_m_mobile']->isEmpty())): ?>
                <p>
                    <span>未填写推荐人 去填写</span>
                </p>
                <?php else: ?>
                <p onclick="openTj()">
                    <span>推荐人</span>
                    <?php if(empty($info['tj']['tj_m_avatar']) || (($info['tj']['tj_m_avatar'] instanceof \think\Collection || $info['tj']['tj_m_avatar'] instanceof \think\Paginator ) && $info['tj']['tj_m_avatar']->isEmpty())): ?>
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png">
                    <?php else: ?>
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo isset($info['tj']['tj_m_avatar']) ? $info['tj']['tj_m_avatar'] :  ''; ?>">
                    <?php endif; ?>
                    <?php echo isset($info['tj']['tj_name']) ? $info['tj']['tj_name'] :  ''; ?>
                </p>
                <?php endif; ?>
            </div>
            <!--<a href="/member/promoters/invitation_list/from/1">-->
            <a href="/member/core/invitations_list/m_type/0//from/1">
                <!--<div class="vip_left lf it">-->
                <div class="lf">
                    成功邀请会员
                    <p><?php echo isset($array_count[0]) ? $array_count[0] :  0; ?></p>
                </div>
            </a>
            <!--<a href="/member/promoters/invitation_list/type/2/from/1">-->
            <a href="/member/core/invitations_list/m_type/1//from/1">
                <!--<div class="inline-block lf it" >-->
                <div class="lf">
                    邀请未激活会员
                    <p><?php echo isset($array_count[1]) ? $array_count[1] :  0; ?></p>
                </div>
            </a>
            <a href="/member/wallet/surplus_book/m_type/2">
                <div class="index_border lf">
                    <!--<div class="vip_left vip_right rt it">-->
                    累计消费金额
                    <p><?php echo (isset($total_pay) && ($total_pay !== '')?$total_pay:'0.00'); ?></p>
                </div>
            </a>
        </div>
        <div class="vip_privilege">
            <p class="vip_level">
                我的会员等级：<?php echo isset($info['ml_name']) ? $info['ml_name'] :  ''; ?>
            </p>
            <div class="vip_privilege_con clear">
                <div class="vip_img lf">
                    <!--<?php if(($info['ml_name'] == '普通会员')): ?>-->
                    <!--<img src="__STATIC__/image/core/pthy.png">-->
                    <!--<?php elseif(($info['ml_name'] == '白银会员')): ?>-->
                    <!--<img src="__STATIC__/image/core/byhy.png">-->
                    <!--<?php elseif(($info['ml_name'] == '黄金会员')): ?>-->
                    <!--<img src="__STATIC__/image/core/hjhy.png">-->
                    <!--<?php elseif(($info['ml_name'] == '黑金会员')): ?>-->
                    <!--<img src="__STATIC__/image/core/hejhy.png">-->
                    <!--<?php elseif(($info['ml_name'] == '吖吖推广员')): ?>-->
                    <!--<img src="__STATIC__/image/core/icon_mber_tgy_select@2x.png">-->
                    <!--<?php endif; ?>-->
                    <img src=<?php echo $info['ml_img']; ?> alt="">
                </div>
                <div class=" vip_test lf">
                    <p class="normal_p">还差<?php echo $info['ml_tj2']-$info['experience']; ?>点升级为<?php echo $info['target']; ?>，尊享更多福利！</p>
                    <p class="kaoheing">您在吖吖推广员考核期中。</p>
                    <p class="promoster_p">您已经是吖吖推广员了</p>
                    <div class="index_bar">
                        <div class="index_bar_yew" style="width: <?php echo $info['experience']/$info['ml_tj2'] * 100; ?>%"></div>
                    </div>
                    <span><?php echo $info['experience']; ?>/<?php echo $info['ml_tj2']; ?></span>
                </div>
                <a href="/member/core/upgrade" class="toup">
                    <div class="index_updata rt toup" >
                        去升级
                    </div>
                </a>

                <!--如果是吖吖推广员显示-->
                <a href="/member/promoters/is_success/type/1" >
                <div class="index_updata rt tosee" style="display: none">
                去查看
                </div>
                </a>
            </div>
        </div>
    </div>

    <div class="my_card">
        <h3 class="my_card_tit">当前会员权益</h3>
        <div class="swiper-container1">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data='0' name="普通会员">
                    <img src="__STATIC__/image/core/pic_member_copperr_selected @2x.png"
                         style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">
                </div>
                <div class="swiper-slide" data='1' name="白银会员">
                    <img src="__STATIC__/image/core/pic_member_silver_selected@2x.png"
                         style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">
                </div>
                <div class="swiper-slide" data='2' name="黄金会员">
                    <img src="__STATIC__/image/core/pic_member_gold_selecteds@2x.png"
                         style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">
                </div>
                <div class="swiper-slide" data='3' name="黑金会员">
                    <img src="__STATIC__/image/core/pic_member_black_selected@2x.png"
                         style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">
                </div>
                <!--判断是否为吖吖会员，然后显示选项卡-->
                <div class="swiper-slide" data='4' name="吖吖推广员" style="position: relative">
                    <!--审核失败-->
                    <div class="fail_promoters">
                        <img src="__STATIC__/image/core/pic_member_tgy_selected@2x.png"
                             style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">
                        <img src="__STATIC__/image/core/pic_zhezhao@2x.png"
                             style="width:4.60rem;height:2.86rem;display:block;margin:0 auto;position: absolute;top:0.68rem;left:0;right:0">
                    </div>

                    <!--审核成功-->
                    <img src="__STATIC__/image/core/pic_member_tgy_selected @2x.png"
                         style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;" class="is_promoters">
                    <!--不是吖吖推广员-->
                    <div class="no-promoters">
                        <img src="__STATIC__/image/core/pic_member_tgy_selected2@2x.png"
                             style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">
                        <a class="yaoqing" href="/member/promoters/index">立即申请 <img
                                src="__STATIC__/image/core/icon_jump@2x.png"
                                style="width:0.34rem;height:0.34rem;margin-left: -0.1rem"></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="swiper-container2">
            <div class="swiper-wrapper">
                <?php if(!(empty($articles) || (($articles instanceof \think\Collection || $articles instanceof \think\Paginator ) && $articles->isEmpty()))): if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="swiper-slide">
                    <?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <div class="quanyi_item clear">
                        <img src="<?php echo $item['a_img']; ?>" alt="">
                        <div class='rt quanyi_info'>
                            <p style="font-weight:bold"><?php echo $item['a_name']; ?></p>

                            <span><?php echo $item['a_description']; ?></span>
                        </div>

                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>

                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                <!--<div class="swiper-slide">slider2</div>-->
                <!--<div class="swiper-slide">slider3</div>-->
                <!--<div class="swiper-slide">slider4</div>-->
                <!--<div class="swiper-slide">slider5</div>-->
            </div>
        </div>
        <p class="my_card_tip">
            PS：若所属会员等级超过推荐人，则推荐人自动停止对该会员的现金收益及分润收入计算！
        </p>
    </div>
    <!--<div class="vip_cat clear">-->
        <!--<div class="vip_lf lf">会员权益</div>-->
    <!--</div>-->
    <!--<div class="swiper-container">-->
        <!--<div class="swiper-wrapper">-->
            <!--<div class="swiper-slide" data='0' name="普通会员">-->
                <!--<img src="__STATIC__/image/core/pic_member_copperr_selected @2x.png" style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">-->
            <!--</div>-->
            <!--<div class="swiper-slide" data='1' name="白银会员">-->
                <!--<img src="__STATIC__/image/core/pic_member_silver_selected@2x.png" style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">-->
            <!--</div>-->
            <!--<div class="swiper-slide" data='2' name="黄金会员">-->
                <!--<img src="__STATIC__/image/core/pic_member_gold_selecteds@2x.png" style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">-->
            <!--</div>-->
            <!--<div class="swiper-slide" data='3' name="黑金会员">-->
                <!--<img src="__STATIC__/image/core/pic_member_black_selected@2x.png" style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">-->
            <!--</div>-->
            <!--&lt;!&ndash;判断是否为吖吖会员，然后显示选项卡&ndash;&gt;-->
            <!--<div class="swiper-slide" data='4' name="吖吖推广员" style="position: relative">-->
                <!--&lt;!&ndash;审核失败&ndash;&gt;-->
                <!--<div class="fail_promoters">-->
                    <!--<img src="__STATIC__/image/core/pic_member_tgy_selected@2x.png" style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">-->
                    <!--<img src="__STATIC__/image/core/pic_zhezhao@2x.png" style="width:4.60rem;height:2.86rem;display:block;margin:0 auto;position: absolute;top:0.68rem;left:0;right:0">-->
                <!--</div>-->

                <!--&lt;!&ndash;审核成功&ndash;&gt;-->
                <!--<img src="__STATIC__/image/core/pic_member_tgy_selected @2x.png" style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;" class="is_promoters">-->
                <!--&lt;!&ndash;不是吖吖推广员&ndash;&gt;-->
                <!--<div class="no-promoters">-->
                    <!--<img src="__STATIC__/image/core/pic_member_tgy_selected2@2x.png" style="width:5.74rem;height:4.19rem;display:block;margin:0 auto;">-->
                    <!--<a class="yaoqing" href="/member/promoters/index">立即申请 <img src="__STATIC__/image/core/icon_jump@2x.png" style="width:0.34rem;height:0.34rem;margin-left: -0.1rem"></a>-->
                <!--</div>-->

            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <!--<div class="index_main">-->
        <!--<div class="index_main_tit">当前会员权益</div>-->
        <!--<div class="index_main_status clear">-->
            <!--<div class="index_main_list active lf">-->
                <!--<div class="index_main_img">-->
                    <!--<img alt="" src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/core/icon_member_invite1@2x.png">-->
                <!--</div>-->
                <!--<p>邀请得收益</p>-->
            <!--</div>-->
            <!--<div class="index_main_list lf">-->
                <!--<div class="index_main_img">-->
                    <!--<img alt="" src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/core/icon_member_mone2@2x.png">-->
                <!--</div>-->
                <!--<p>立返推荐费</p>-->
            <!--</div>-->
            <!--<div class="index_main_list lf">-->
                <!--<div class="index_main_img">-->
                    <!--<img alt="" src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/core/icon_grow@2x.png">-->
                <!--</div>-->
                <!--<p>成长加速</p>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="index_main_text">-->
            <!--<div class="index_main_text_con">-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="index_main_hint clear">-->
            <!--<p class="lf">注：</p>-->
            <!--<span class="lf">若所属会员等级超过了推荐人等级，则推荐人对于该所属会员的现金收益/分润收入停止计算！</span>-->
        <!--</div>-->
    <!--</div>-->
    <!--<a href="/member/core/continue_invitation">-->
    <div class="index_btn phonex">
        <span>
            立即邀请
        </span>
    </div>
    <!--</a>-->
    <!--分享弹框-->
    <div class="continue_pop">
        <div class="continue_con">
            <div class="continue_con_top">
                <img src="__STATIC__/image/core/icon_yaoqingma@2x.png" alt="">
            </div>
            <div class="continue_con_code">
                <img src="<?php echo isset($info['m_code']) ? $info['m_code'] :  ''; ?>" alt="">
            </div>
            <div class="bc-btn">长按保存二维码到本地</div>
            <div data-clipboard-text="<?php echo $share_link; ?>" class="copy-btn">复制链接</div>
            <!-- <div class="continue_con_btn clear"> -->
            <!-- <div>请长按上方二维码保存</div> -->
            <!--<div class="rt">点击右上角指定分享</div>-->
            <!-- </div> -->
            <!--<div class="continue_con_list clear">-->
            <!--<div class="continue_con_list_div share_wx lf">-->
            <!--<div>-->
            <!--<img src="__STATIC__/image/core/wx@2x.png" alt="">-->
            <!--</div>-->
            <!--<p>微信好友</p>-->
            <!--</div>-->
            <!--<div class="continue_con_list_div lf">-->
            <!--<div>-->
            <!--<img src="__STATIC__/image/core/pyq@2x.png" alt="">-->
            <!--</div>-->
            <!--<p>朋友圈</p>-->
            <!--</div>-->
            <!--<div class="continue_con_list_div lf">-->
            <!--<div>-->
            <!--<img src="__STATIC__/image/core/qq@2x.png" alt="">-->
            <!--</div>-->
            <!--<p>QQ好友</p>-->
            <!--</div>-->
            <!--<div class="continue_con_list_div lf">-->
            <!--<div>-->
            <!--<img src="__STATIC__/image/core/xl@2x.png" alt="">-->
            <!--</div>-->
            <!--<p>新浪微博</p>-->
            <!--</div>-->
            <!--</div>-->
        </div>
    </div>
</main>

<!-- 安卓，ios分享效果 S -->
<div class="details_fenxiang">
    <div class="details_fxcon">
        <div class="details_fxtit">
            邀请好友
        </div>
        <div class="details_fxlist clear">
            <div class="details_fx_img lf" onclick="app(0)">
                <img src="__STATIC__/image/details/wx.png">
                微信好友
            </div>
            <div class="details_fx_img lf" onclick="app(1)">
                <img src="__STATIC__/image/details/pyq.png">
                朋友圈
            </div>
            <!-- <div class="details_fx_img lf">
                <img src="__STATIC__/image/details/iconqq@2x.png">
                QQ好友
            </div>
            <div class="details_fx_img lf">
                <img src="__STATIC__/image/details/icon微博@2x.png">
                新浪微博
            </div> -->
            <div class="details_fx_img lf" onclick="copyUrl()">
                <img src="__STATIC__/image/details/link.png">
                复制链接
            </div>
        </div>
        <div class="details_fx_cancel">
            取消
        </div>
    </div>
</div>
<input type="hidden" id="app" />
<!-- 安卓，ios分享效果 E -->

<!-- 推荐人弹窗 S -->
<div class="open-tj">
    <div class="open-over"></div>
    <div class="open-cont">
        <span></span>
        <h3>推荐人</h3>
        <?php if(empty($info['tj']['tj_m_avatar']) || (($info['tj']['tj_m_avatar'] instanceof \think\Collection || $info['tj']['tj_m_avatar'] instanceof \think\Paginator ) && $info['tj']['tj_m_avatar']->isEmpty())): ?>
        <img src="__STATIC__/image/index/pic_home_taplace@2x.png">
        <?php else: ?>
        <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo isset($info['tj']['tj_m_avatar']) ? $info['tj']['tj_m_avatar'] :  ''; ?>">
        <?php endif; ?>
        <p><?php echo isset($info['tj']['tj_name2']) ? $info['tj']['tj_name2'] :  ''; ?></p>
        <div><small class="lf"><?php echo isset($info['tj']['tj_m_mobile']) ? $info['tj']['tj_m_mobile'] :  ''; ?></small><small class="rt"><?php echo isset($info['tj']['tj_ml_name']) ? $info['tj']['tj_ml_name'] :  ''; ?></small></div>
    </div>
</div>
<!-- 推荐人弹窗 E -->


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
<script src="__JS__/common/swiper.min.js"></script>
<script src="__STATIC__/js/clipboard.min.js"></script>
<script>
    //打开推荐人弹窗
    function openTj(){
        $('.open-tj').show();
    }
    //隐藏推荐人弹窗
    $('.open-over').click(function(){
        $('.open-tj').hide();
    })
    $('.open-cont span').click(function(){
        $('.open-tj').hide();
    })

    //iosapp
    /*这段代码是固定的，必须要放到js中*/
    function setupWebViewJavascriptBridge(callback) {
        if (window.WebViewJavascriptBridge) { return callback(WebViewJavascriptBridge); }
        if (window.WVJBCallbacks) { return window.WVJBCallbacks.push(callback); }
        window.WVJBCallbacks = [callback];
        var WVJBIframe = document.createElement('iframe');
        WVJBIframe.style.display = 'none';
        WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
        document.documentElement.appendChild(WVJBIframe);
        setTimeout(function() { document.documentElement.removeChild(WVJBIframe) }, 0)
    }

    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    setupWebViewJavascriptBridge(function(bridge) {
        /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
        bridge.callHandler('isApp',function(str) {
            $('#app').val(str);
        })
    })

    //关闭app分享弹窗
    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })

    //返回按钮
    function backH5() {
        window.history.back();
    }

    function app(id) {
        var is_share_to_firend_circle = '';
        if(id == 0) {
            is_share_to_firend_circle = false;
        }else {
            is_share_to_firend_circle = true;
        }

        var data = '{"share_title": "<?php echo $share_title; ?>","share_content": "<?php echo $share_desc; ?>","share_url": "<?php echo $share_link; ?>","share_image": "'+ imgUrl +'","is_share_to_firend_circle": '+is_share_to_firend_circle+'}';

        if($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function(bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getShareParams',data);
            })
        }else {
            // 非微信浏览器端安卓分享
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        window.android.getShareParams(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }

    function copyUrl() {
        var data = '{"copy_url": "<?php echo $share_link; ?>"}';
        if($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function(bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getCopyUrl',data);
            })
        }else {
            // 非微信浏览器端安卓复制链接
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        window.android.getCopyUrl(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }

    var share_qr_image = "https://"+ document.domain + "<?php echo isset($info['m_code']) ? $info['m_code'] :  ''; ?>";
    //点击邀请弹框
    $(".index_btn").click(function () {
        var data = '{"share_title": "<?php echo $share_title; ?>","share_content": "<?php echo $share_desc; ?>","share_url": "<?php echo $share_link; ?>","share_image": "'+ imgUrl +'","is_share_to_firend_circle": "1","share_qr_image": "'+ share_qr_image +'","type": "2"}';

        if($('#app').val() != '') {
            if($('#app').val() == '1.0') {
                /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
                setupWebViewJavascriptBridge(function(bridge) {
                    /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                    bridge.callHandler('getShareParams',data);
                })
            }else {
                $(".details_fenxiang").show();
            }
            
        }else {
            // 非微信浏览器端安卓分享
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        if(getCookie("version") == null) {
                            $('.details_fenxiang').show();
                        }else {
                            window.android.getShareParams(data);
                        }
                    }
                }else {
                    $(".continue_pop").css({ display: "block" });
                }
            }else {
                $(".continue_pop").css({ display: "block" });
            }
        }
    })

    $(function () {
        var vip = "<?php echo $info['m_levelid']; ?>" - 1;
        var is_promoters = "<?php echo $info['is_promoters']; ?>";
        if(is_promoters == 5 || is_promoters == 4 || is_promoters == 6){
            vip=4
        }
        var mySwiper = new Swiper('.swiper-container1', {
            effect: 'coverflow',
            slidesPerView: 1,
            centeredSlides: true,
            initialSlide: vip,
            coverflow: {
                rotate: 0,// 旋转的角度
                stretch: 80,// 拉伸   图片间左右的间距和密集度
                depth: 220,// 深度   切换图片间上下的间距和密集度
                modifier: 1,//修正值 该值越大前面的效果越明显
                slideShadows: false,// 页面阴影效果
                onSlideChangeStart: function (swiper) {
                    // alert(swiper.activeIndex);
                }
            },
            onTransitionEnd: function (swiper) {
                $(".index_main_list").removeClass('active');
                $(".index_main_list").eq(0).addClass('active');
                getData(swiper.activeIndex, '邀请得收益');
                if (swiper.activeIndex == 0) {
                    if (vip == swiper.activeIndex) {
                        $('.my_card_tit').text('当前会员权益');
                    } else {
                        $('.my_card_tit').text('普通 · 会员权益');
                    }
                } else if (swiper.activeIndex == 1) {
                    if (vip == swiper.activeIndex) {
                        $('.my_card_tit').text('当前会员权益');
                    } else {
                        $('.my_card_tit').text('白银 · 会员权益');
                    }
                } else if (swiper.activeIndex == 2) {
                    if (vip == swiper.activeIndex) {
                        $('.my_card_tit').text('当前会员权益');
                    } else {
                        $('.my_card_tit').text('黄金 · 会员权益');
                    }
                } else if (swiper.activeIndex == 3) {
                    if (vip == swiper.activeIndex) {
                        $('.my_card_tit').text('当前会员权益');
                    } else {
                        $('.my_card_tit').text('黑金 · 会员权益');
                    }
                } else if (swiper.activeIndex == 4) {
                    if (vip == swiper.activeIndex) {
                        $('.my_card_tit').text('当前会员权益');
                    } else {
                        $('.my_card_tit').text('吖吖推广员 · 会员权益');
                    }
                }

            }
        })

        var Swiper2 = new Swiper('.swiper-container2', {
            slidesPerView: 1,
            centeredSlides: true,
            initialSlide: vip,
        })

        mySwiper.params.control = Swiper2;//需要在Swiper2初始化后，Swiper1控制Swiper2
        Swiper2.params.control = mySwiper;//需要在Swiper1初始化后，Swiper2控制Swiper1
        // Swiper2.params.controlInverse=true;

        $(".index_main_list").click(function () {
            $(".index_main_list").removeClass('active');
            $(this).addClass('active');
            vip = $('.swiper-slide-active').attr('data');
            a_name = $(this).find('p').text();
            getData(vip,a_name);
        })
        $(window).scroll(function () {
            var scro = $(window).scrollTop();
            if (scro > 10) {
                $(".header_tit").css({ color: "#000000" });
                $(".header_nav").css({ backgroundColor: "#fff" });
                $(".header_back").find('img').attr('src',"/static/icon/publish/icon_nav_back@2x.png")
            } else {
                $(".header_tit").css({ color: "#fff" });
                $(".header_nav").css({ backgroundColor: "transparent" });
                $(".header_back").find('img').attr('src',"/static/icon/publish/icon_nav_back1@2x.png")
            }
        })

        $(".continue_pop").click(function () {
            $(".continue_pop").css({ display: "none" });
        })
        $(".continue_con").click(function (e) {
            e.stopPropagation();
        })
        var index = $('.swiper-slide-active').attr('data');

        getData(index,'邀请得收益');

        function getData(vip,a_name) {
            var at_name = '';
            if(vip == 0) {
                at_name = '普通会员';
            }else if(vip == 1) {
                at_name = '白银会员';
            }else if(vip == 2) {
                at_name = '黄金会员';
            }else if(vip == 3) {
                at_name = '黑金会员';
            }
            // else if(vip == 4){
            //     at_name = '吖吖推广员'
            // }
            $.ajax({
                type: 'post',
                url: '/member/core/interests_dsc',
                data: {
                    at_name: at_name,
                    a_name: a_name
                },
                success: function(res) {
                    $('.index_main_text_con').empty();
                    $('.index_main_text_con').html(res.a_description);
                }
            })
        }
    })


    //复制功能
    var btns = document.querySelectorAll('.copy-btn');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });

    clipboard.on('error', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });

    var is_promoters = "<?php echo $info['is_promoters']; ?>";
    console.log(is_promoters);
    if(is_promoters == 4 || is_promoters == 3 ){
        $('.is_promoters').show();
        $('.fail_promoters').hide();
        $('.no-promoters').hide();
        $('.toup').hide();
        $('.tosee').show();
        $('.normal_p').hide();
        $('.kaoheing').show();
        $('.promoster_p').hide();
    }else if(is_promoters == 6){
        $('.is_promoters').hide();
        $('.fail_promoters').show();
        $('.no-promoters').hide();
        $('.toup').hide();
        $('.tosee').hide();
        $('.normal_p').show();
        $('.kaoheing').hide();
        $('.promoster_p').hide();
    }else if(is_promoters == 1){
        $('.is_promoters').hide();
        $('.fail_promoters').hide();
        $('.no-promoters').show();
        $('.toup').show();
        $('.tosee').hide();
        $('.normal_p').show();
        $('.kaoheing').hide();
        $('.promoster_p').hide();
    }else if(is_promoters == 5){
        $('.is_promoters').show();
        $('.fail_promoters').hide();
        $('.no-promoters').hide();
        $('.toup').hide();
        $('.tosee').hide();
        $('.normal_p').hide();
        $('.kaoheing').hide();
        $('.promoster_p').show();
    }else if(is_promoters == 2 ){
        $('.is_promoters').show();
        $('.fail_promoters').hide();
        $('.no-promoters').hide();
        $('.toup').show();
        $('.tosee').hide();
        $('.normal_p').show();
        $('.kaoheing').hide();
        $('.promoster_p').hide();
    }
</script>

</html>