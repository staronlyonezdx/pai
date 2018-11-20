<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\project\pai\public/../application/index/view/index/index.html";i:1542678708;s:63:"D:\project\pai\public/../application/index/view/index/base.html";i:1542013165;s:66:"D:\project\pai\public/../application/index/view/common/footer.html";i:1541986556;s:66:"D:\project\pai\public/../application/index/view/common/js_sdk.html";i:1541491293;}*/ ?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="full-screen" content="yes">
        <meta name="x5-fullscreen" content="true">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 viewport-fit=cover">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/larea.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/size.css">
        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/popups.css">
        
<link rel="stylesheet" type="text/css" href="__CSS__/index/swiper.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">
<link rel="prerender" href="https://css-tricks.com">
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/search_index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/index/index.css">
<link rel="stylesheet" href="__CSS__/liMarquee/liMarquee.css">
<style>
    .mescroll-upwarp {
        padding: 0.5rem 0 1.6rem 0;
    }
    .layui-layer-msg {
        width: 3.8rem;
    }
</style>

        <script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>
        <script src="__JS__/common/rem.js"></script>
        <script src="__JS__/common/jquery_lazyload.js"></script>
        <script src="__JS__/common/lazyload.js"></script>
        <script src="__JS__/common/site.js"></script>
        <script src="__JS__/common/larea.js"></script>
        <script src="__JS__/common/bootstrap.min.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
        <script src="__STATIC__/lib/layui/layui.js"></script>
        <script src="__JS__/common/popups.js"></script>
        <title>首页</title>
    </head>
    <body>
        <header></header>
        

<main>
    <div class="index_banner">
        <div class="swiper-container" style="height:2.1rem;">
            <div class='swiper-wrapper'>
                <?php if(!(empty($imgs['sydh']) || (($imgs['sydh'] instanceof \think\Collection || $imgs['sydh'] instanceof \think\Paginator ) && $imgs['sydh']->isEmpty()))): if(is_array($imgs['hd']) || $imgs['hd'] instanceof \think\Collection || $imgs['hd'] instanceof \think\Paginator): $i = 0; $__LIST__ = $imgs['hd'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="swiper-slide">
                    <?php if($vo['wi_href'] != ''): ?>
                    <a href="<?php echo isset($vo['wi_href']) ? $vo['wi_href'] :  '#'; ?>"><img src="<?php echo isset($vo['wi_imgurl']) ? $vo['wi_imgurl'] :  ''; ?>"></a>
                    <?php else: ?>
                    <img src="<?php echo isset($vo['wi_imgurl']) ? $vo['wi_imgurl'] :  ''; ?>">
                    <?php endif; ?>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="index_searsh_top" style="background:linear-gradient(90deg,rgba(255,231,68,1),rgba(255,172,28,1));">
            <div class="sm-icon"></div>
            <div class="index_search">
                <img src="__STATIC__/image/index/searchbar_icon_search@2x.png" style="width:0.36rem;height:0.36rem">
                <p style='margin-left:0.8rem;font-size:0.26rem;'>搜索您想要的商品或店铺</p>
            </div>
        </div>

    </div>
    <!--双十一入口-->
    <!--<a href="/promotion/index/double11">-->
        <!--<div class="double11" style="margin-top: -0.01rem">-->
            <!--<img src="__STATIC__/image/index/icon_shuang11@2x.png" alt="">-->
        <!--</div>-->
    <!--</a>-->
     <!-- 公告 S -->
<div class="details-act" style="margin-top: -0.01rem">
        <span></span>
        <small></small>
        <div class="dowebok"></div>
    </div>
    <!-- 公告 E -->


    <!--各个模块入口-->
    <ul class="index_items">
        <?php if(!(empty($imgs['sydh']) || (($imgs['sydh'] instanceof \think\Collection || $imgs['sydh'] instanceof \think\Paginator ) && $imgs['sydh']->isEmpty()))): if(is_array($imgs['sydh']) || $imgs['sydh'] instanceof \think\Collection || $imgs['sydh'] instanceof \think\Paginator): $i = 0; $__LIST__ = $imgs['sydh'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo $vo['wi_href']; ?>">
            <li class="index_item lf">
                <div>
                    <img src="<?php echo $vo['wi_imgurl']; ?>" alt="">
                    <p><?php echo $vo['wi_name']; ?></p>
                </div>
            </li>
        </a>

        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

        <!--<a href="/member/core/index">-->
            <!--<li class="index_item lf">-->
                <!--<div>-->
                    <!--<img src="__STATIC__/image/index/icon_yyhy@2x.png" alt="">-->
                    <!--<p>吖吖会员</p>-->
                <!--</div>-->
            <!--</li>-->
        <!--</a>-->
        <!--<li class="index_item lf">-->
            <!--<div>-->
                <!--<img src="__STATIC__/image/index/icon_syhy@2x.png" alt="">-->
                <!--<p>晟域会员</p>-->
            <!--</div>-->
        <!--</li>-->
        <!--<a href="/member/wallet/recharge">-->
            <!--<li class="index_item lf">-->
                    <!--<div>-->
                <!--<img src="__STATIC__/image/index/icon_qbcz@2x.png" alt="">-->
                <!--<p>钱包充值</p>-->
                <!--</div>-->
            <!--</li>-->
        <!--</a>-->
        <!--<a href="/popularity/popularitygoods/share_list">-->
            <!--<li class="index_item lf" >-->
                    <!--<div>-->
                <!--<img src="__STATIC__/image/index/icon_rqw@2x.png" alt="">-->
                <!--<p>人气王</p>-->
                <!--</div>-->
            <!--</li>-->
        <!--</a>-->
        <!--<a href="/member/core/continue_invitation">-->
            <!--<li class="index_item lf">-->
                    <!--<div>-->
                <!--&lt;!&ndash; <img src="__STATIC__/image/index/icon_lhb@2x.png" alt="" class="lhb"> &ndash;&gt;-->
                <!--<img src="__STATIC__/image/index/icon_yqhy@2x.png" alt="" >-->
                <!--<p>邀请好友</p>-->
                    <!--</div>-->
            <!--</li>-->
        <!--</a>-->
        <!--<a href="/pointpai/pointgoods/goods_list/">-->
            <!--<li class="index_item lf">-->
                    <!--<div>-->
                <!--<img src="__STATIC__/image/index/icon_jfsc@2x.png" alt="">-->
                <!--<p>积分商城</p>-->
                <!--</div>-->
            <!--</li>-->
        <!--</a>-->
        <!--<a href="/index/index/price_range/type/1">-->
            <!--<li class="index_item lf">-->
                    <!--<div>-->
                <!--<img src="__STATIC__/image/index/icon_yzzq@2x.png" alt="">-->
                <!--<p>一折专区</p>-->
                    <!--</div>-->
            <!--</li>-->
        <!--</a>-->
        <!--<li class="index_item lf index_ershou">-->
                <!--<div>-->
            <!--<img src="__STATIC__/image/index/icon_eszq@2x.png" alt="">-->
            <!--<p>二手专区</p>-->
            <!--</div>-->
        <!--</li>-->
        <!--<a href=" /index/index/coiling">-->
            <!--<li class="index_item lf">-->
                    <!--<div>-->
                <!--<img src="__STATIC__/image/index/icon_kqzx@2x.png" alt="">-->
                <!--<p>卡券中心</p>-->
                <!--</div>-->
            <!--</li>-->
        <!--</a>-->
        <!--<li class="index_item lf">-->
            <!--<div>-->
            <!--<img src="__STATIC__/image/index/icon_qefx@2x.png" alt="">-->
            <!--<p>全额返现</p>-->
            <!--</div>-->
        <!--</li>-->
    </ul>
    <!-- 公告 S -->
    <!-- <div class="details-act">
        <img src="__STATIC__/image/index/icon_icon@2x.png" alt="" class="lf">
        <img src="__STATIC__/image/index/x@2x.png" alt="" class="ge lf">
        <div class="details_act_imgs lf">
            <img src="__STATIC__/image/index/icon_zhognjiang@2x.png" alt="" class="lf">
            <img src="__STATIC__/image/index/icon_zhognjiang@2x (2).png" alt="" class="lf">
        </div>
        <div class="lf details_ps">
            <p>拍吖吖目前处于公测阶段，如有问题可询问客服...</p>
            <p>第7期人气王已经公布啦！到底是谁这幸运吖～</p>
        </div>

    </div> -->
    <!-- 公告 E -->
    <!-- <div class="details-act">
            <img src="__STATIC__/image/index/icon_icon@2x.png" alt="" class="lf">
            <img src="__STATIC__/image/index/x@2x.png" alt="" class="ge lf"> -->
            <!-- <div class="details_act_imgs lf">
                <img src="__STATIC__/image/index/icon_zhognjiang@2x.png" alt="" class="lf">
                <img src="__STATIC__/image/index/icon_zhognjiang@2x (2).png" alt="" class="lf">
            </div> -->
            <!-- <div class="lf details_ps">
                <p>拍吖吖目前处于公测阶段，如有问题可询问客服...</p>
            </div>

        </div> -->
    <!--秒杀折扣捡漏-->
    <!--<div class="seckill_picker clear">-->
        <!--&lt;!&ndash; <a href="/activity/seckill/sec_kill_list"> &ndash;&gt;-->
            <!--<div class="seckill lf">-->
                <!--<div class="seckill_top clear">-->
                    <!--<div class="seckill_logo lf">-->
                        <!--<img src="__STATIC__/image/index/icon_miaosha@2x.png" alt="">-->
                        <!--<img src="__STATIC__/image/index/icon_miaoshachang@2x.png" alt="" class="lf">-->
                        <!--<img src="__STATIC__/image/index/icon_jijiangshangxian@2x.png" alt="" class="lf">-->
                    <!--</div>-->
                    <!--<div class="seckill_cutdown rt">-->
                        <!--<div class="cutdown clear rt" id="first" >-->
                            <!--<span class="cutdown_num details_hour">00</span>-->
                            <!--<span class="cutdown_mao">:</span>-->
                            <!--<span class="cutdown_num details_minute">00</span>-->
                            <!--<span class="cutdown_mao">:</span>-->
                            <!--<span class="cutdown_num details_second">00</span>-->
                        <!--</div>-->
                        <!--&lt;!&ndash;<p>距离本场结束</p>&ndash;&gt;-->
                        <!--&lt;!&ndash;<p>超值商品敬请期待</p>&ndash;&gt;-->

                    <!--</div>-->
                    <!--<img src="__STATIC__/image/index/icon_wenzi@2x.png" alt="" class="qidai rt">-->
                <!--</div>-->
                <!--<ul class="seckill_bottom clear">-->
                    <!--<li class="seckill_item lf">-->
                        <!--<img src="__STATIC__/image/index/img1@2x.png" alt="">-->
                        <!--<p class="seckill_price">¥27.00</p>-->
                        <!--<p class="seckill_old_price">¥12377.00</p>-->
                    <!--</li>-->
                    <!--<li class="seckill_item lf">-->
                        <!--<img src="__STATIC__/image/index/img2@2x.png" alt="">-->
                        <!--<p class="seckill_price">¥87.00</p>-->
                        <!--<p class="seckill_old_price">¥15100.00</p>-->
                    <!--</li>-->
                    <!--<li class="seckill_item lf">-->
                        <!--<img src="__STATIC__/image/index/img3@2x.png" alt="">-->
                        <!--<p class="seckill_price">¥99.00</p>-->
                        <!--<p class="seckill_old_price">¥21800.00</p>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</div>-->
        <!--&lt;!&ndash; </a> &ndash;&gt;-->


        <!--&lt;!&ndash; <a href="/activity/pickout/pickout_list"> &ndash;&gt;-->
            <!--<div class="picker rt">-->
                <!--<img src="__STATIC__/image/index/icon_jianlo1@2x.png" alt="" class="picker_img">-->
                <!--<p class="title">精品捡漏 即将上线</p>-->
                <!--&lt;!&ndash;<p class="title">精品捡漏 下单即揭晓</p>&ndash;&gt;-->
                <!--<ul class="seckill_bottom seckill_right_bottom clear">-->
                    <!--<li class="seckill_item lf">-->
                        <!--<img src="__STATIC__/image/index/img5@2x.png" alt="">-->
                        <!--<p class="seckill_price">¥77.00</p>-->
                        <!--<p class="seckill_old_price">¥853.00</p>-->
                    <!--</li>-->
                    <!--<li class="seckill_item lf">-->
                        <!--<img src="__STATIC__/image/index/img4@2x.png" alt="">-->
                        <!--<p class="seckill_price">¥288.00</p>-->
                        <!--<p class="seckill_old_price">¥429.00</p>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</div>-->
        <!--&lt;!&ndash; </a> &ndash;&gt;-->

    <!--</div>-->



    <div class="seckill_picker clear">
        <!-- <a href="/activity/seckill/sec_kill_list"> -->
        <div class="seckill rt">
            <div class="seckill_top clear">
                <div class="seckill_logo lf">
                    <img src="__STATIC__/image/index/icon_miaosha@2x.png" alt="">
                    <img src="__STATIC__/image/index/icon_miaoshachang@2x.png" alt="" class="lf">
                    <img src="__STATIC__/image/index/icon_jijiangshangxian@2x.png" alt="" class="lf">
                </div>
                <div class="seckill_cutdown rt">
                    <div class="cutdown clear rt" id="first" >
                        <span class="cutdown_num details_hour">00</span>
                        <span class="cutdown_mao">:</span>
                        <span class="cutdown_num details_minute">00</span>
                        <span class="cutdown_mao">:</span>
                        <span class="cutdown_num details_second">00</span>
                    </div>
                    <!--<p>距离本场结束</p>-->
                    <!--<p>超值商品敬请期待</p>-->

                </div>
                <img src="__STATIC__/image/index/icon_wenzi@2x.png" alt="" class="qidai rt">
            </div>
            <ul class="seckill_bottom clear">
                <li class="seckill_item lf">
                    <img src="__STATIC__/image/index/img1@2x.png" alt="">
                    <p class="seckill_price">¥27.00</p>
                    <p class="seckill_old_price">¥12377.00</p>
                </li>
                <li class="seckill_item lf">
                    <img src="__STATIC__/image/index/img2@2x.png" alt="">
                    <p class="seckill_price">¥87.00</p>
                    <p class="seckill_old_price">¥15100.00</p>
                </li>
                <li class="seckill_item lf">
                    <img src="__STATIC__/image/index/img3@2x.png" alt="">
                    <p class="seckill_price">¥99.00</p>
                    <p class="seckill_old_price">¥21800.00</p>
                </li>
            </ul>
        </div>
        <!-- </a> -->


         <a href="/activity/index/index">
        <div class="picker lf" style="border-right: 0.01rem solid rgba(245,245,245,1);height:100%">
            <img src="__STATIC__/image/index/icon_fudai@2x.png" alt="" class="picker_img">
            <p class="title">参与必中 还有额外大奖</p>
            <!--<p class="title">精品捡漏 下单即揭晓</p>-->
            <ul class="seckill_bottom seckill_right_bottom clear">
                <li class="seckill_item lf">
                    <img src="__STATIC__/image/index/img5@2x.png" alt="">
                    <p class="seckill_price">¥77.00</p>
                    <p class="seckill_old_price">¥853.00</p>
                </li>
                <li class="seckill_item lf">
                    <img src="__STATIC__/image/index/img4@2x.png" alt="">
                    <p class="seckill_price">¥288.00</p>
                    <p class="seckill_old_price">¥429.00</p>
                </li>
            </ul>
        </div>
         </a>

    </div>

    <!--以前的一折卡券以及积分-->
    <!--<div class="index_area clear">-->
    <!--<a href="/index/index/price_range/type/1">-->
    <!--<div class="index_area_list lf ">-->
    <!--<img src="__STATIC__/image/index/yiyuan@2x.png" alt=""/>-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/index/index/coiling">-->
    <!--<div class="index_area_list lf ">-->
    <!--<img src="__STATIC__/image/index/kajuan.png" alt=""/>-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/index/index/price_range/type/3">-->
    <!--<div class="index_area_list lf ">-->
    <!--<img src="__STATIC__/image/index/qianyuan@2x.png" alt=""/>-->
    <!--</div>-->
    <!--</a>-->
    <!--&lt;!&ndash; <a href="/pointpai/pointgoods/goods_list">-->
    <!--<div class="index_area_list lf ">-->
    <!--<img src="__STATIC__/image/index/icon_jifen@2x.png" alt=""/>-->
    <!--</div>-->
    <!--</a> &ndash;&gt;-->
    <!--&lt;!&ndash;<a href="/index/index/coiling">&ndash;&gt;-->
    <!--&lt;!&ndash; <a href="/index/index/price_range/type/1">-->
    <!--<div class="index_area_list lf">-->
    <!--<img src="__STATIC__/image/index/icon_yizhe@2x.png" alt=""/>-->
    <!--</div>-->
    <!--</a> &ndash;&gt;-->
    <!--&lt;!&ndash;<a href="/index/index/price_range/type/3">&ndash;&gt;-->

    <!--&lt;!&ndash; <a href="/index/index/coiling">-->
    <!--<div class="index_area_list lf">-->
    <!--<img src="__STATIC__/image/index/icon_chognzhi@2x.png" alt=""/>-->
    <!--</div>-->
    <!--</a> &ndash;&gt;-->
    <!--</div>-->
    <!--大额商品，手机数码，家居家装-->
    <div class="index_areas clear">
        <div class="indez_areas_item lf">
            <img src="__STATIC__/image/index/icon_daeshangpin@2x.png" alt="">
            <p>高端商品 快来吖</p>
            <div >
                <img src="__STATIC__/image/index/img10@2x.png" alt="" class="detail_img">
                <img src="__STATIC__/image/index/img11@2x.png" alt="" class="detail_img">
            </div>
        </div>
        <div class="indez_areas_item lf">
            <img src="__STATIC__/image/index/icon_shoujishuma.png" alt="">
            <p>Iphone XS 新品</p>
            <div >
                <img src="__STATIC__/image/index/img8@2x.png" alt="" class="detail_img">
                <img src="__STATIC__/image/index/img9@2x.png" alt="" class="detail_img">
            </div>
        </div>
        <div class="indez_areas_item lf">
            <img src="__STATIC__/image/index/icon_jijujiazhuang.png" alt="">
            <p>低至一折！三折！</p>
            <div style="margin-left: 0.14rem">
                <img src="__STATIC__/image/index/img6@2x.png" alt="" class="detail_img">
                <img src="__STATIC__/image/index/img7@2x.png" alt="" class="detail_img">
            </div>
        </div>

    </div>

    <div class="index_function" style="display:none">
        <div class="index_function_view clear">
            <!--不为空则循环-->
            <?php if(!(empty($imgs['sydh']) || (($imgs['sydh'] instanceof \think\Collection || $imgs['sydh'] instanceof \think\Paginator ) && $imgs['sydh']->isEmpty()))): if(is_array($imgs['sydh']) || $imgs['sydh'] instanceof \think\Collection || $imgs['sydh'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($imgs['sydh']) ? array_slice($imgs['sydh'],0,10, true) : $imgs['sydh']->slice(0,10, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo $vo['wi_href']; ?>">
                <div class="index_function_list lf">
                    <div class="index_function_img">
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="<?php echo $vo['wi_imgurl']; ?>">
                    </div>
                    <p><?php echo $vo['wi_name']; ?></p>
                </div>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
    </div>
    <!-- <?php if(!(empty($imgs['syad']) || (($imgs['syad'] instanceof \think\Collection || $imgs['syad'] instanceof \think\Paginator ) && $imgs['syad']->isEmpty()))): if(is_array($imgs['syad']) || $imgs['syad'] instanceof \think\Collection || $imgs['syad'] instanceof \think\Paginator): $i = 0; $__LIST__ = $imgs['syad'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <a data="<?php echo $vo['wi_href']; ?>" class="ads">
    <div class="index_placeholder_banner">
    <img src="<?php echo $vo['wi_imgurl']; ?>">
    </div>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?> -->
    <div class="index_select_drop">
        <div class="index_choice">
            <!--<img src="__STATIC__/image/index/jingxuan@2x.png" alt=""/>-->
            <img src="__STATIC__/image/index/icon_tuijian@2x.png" alt="" class="index_tuijian"/>
        </div>
        <div>
            <div class="index_select_drop_view dataList" id="dataList">

            </div>
        </div>
    </div>
    <img class='red dd' src="__STATIC__/image/index/icon_hongbao@2x.png" alt="">
    <!-- <form action="/index/index/search_index/" method="post"> -->
    <div class="index_search_pop">
        <!--搜索框-->
        <div class="index_search_pop_top clear">
            <div class="index_pop_text lf">
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" alt=""/>
            </div>
            <div class="index_search_pop_view clear lf">
                <div class="index_search_lfimg" class="lf">
                    <img src="__STATIC__/image/index/searchbar_icon_search1@2x.png">
                </div>
                <input type="text" name="keyword" class="index_pop_inp lf">

                <div class="index_search_cancel rt">
                    <img src="__STATIC__/image/index/icon_qingchu1@2x.png" alt="">
                </div>
            </div>
            <!-- <button type="submit" class="index_pop_sousuo rt"> 搜索</button> -->
            <a class="index_pop_sousuo rt"> 搜索</a>
        </div>
        <!--tab切换-->
        <div class="index_pop_class clear">
            <div class="index_pop_tab index_pop_bold lf">
                <img src="__STATIC__/image/index/icon_bur@2x.png" alt="">
                <span>商品</span>
            </div>
            <div class="index_pop_tab  lf">
                <img src="__STATIC__/image/index/icon_bur@2x.png" alt="">
                <span>店铺</span>
            </div>
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
                <a onClick="hclic(this)">
                    <div class="lf"><?php echo $vo; ?></div>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <?php endif; if(!(empty($searchs['hot']) || (($searchs['hot'] instanceof \think\Collection || $searchs['hot'] instanceof \think\Paginator ) && $searchs['hot']->isEmpty()))): ?>
        <!--热门搜索-->
        <div class="index_pop_history_view">
            <div class="index_pop_history clear">
                <p class="lf">热门搜索</p>
            </div>
            <div class="index_pop_history_main clear">
                <?php if(is_array($searchs['hot']) || $searchs['hot'] instanceof \think\Collection || $searchs['hot'] instanceof \think\Paginator): $i = 0; $__LIST__ = $searchs['hot'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <!-- <a href="/index/index/search_index/keyword/<?php echo $vo; ?>"> -->
                <a onClick="hclic(this)">
                    <div class="lf"><?php echo $vo; ?></div>
                </a>
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
    <div class="new_pop">
        <div class="new_pop_con">
            <img src="__STATIC__/image/index/icon_x@2x.png" alt=""/>
            <p>恭喜！获得新人红包</p>
            <!--<span>领取后在钱包查看，可用于拍购</span>-->
            <a>￥
                <small>10</small>
            </a>
            <div class="new_pop_btn" id="new_pop_btn">立即下载并领取红包</div>
        </div>
    </div>
    <input type="hidden" id="app">


    <!--是否开启准点提醒弹框-->
    <div class="intime_alert">
        <div class="alert_content">
            <p class="alert_msg">是否开启准点提醒</p>
            <p class="alert_contnet">当前时段商品已被秒完啦距离下场开始还剩<span>07:24:45</span></p>
            <div class="alert_btns">
                <span class="alert_no">暂不提醒</span>
                <span class="alert_yes">开启提醒</span>
            </div>
        </div>
        <!--成功开启提醒弹框-->
        <div class="alert_success">
            <img src="__STATIC__/image/index/icon_chenggong@2x.png" alt="">
            <span>成功开启提醒</span>
            <p>每场都将在开始前5分钟提醒您提醒信息在“消息中心”中查看</p>
        </div>
    </div>
</main>

        <footer>
<?php if($is_lord ==1): if($m_type==0): ?>
<div class="hc" style="height: 0.98rem;"></div>

<footer>

    <div class="footer_tab phonex">
            <a href="/index/index">
                <div class="footer_tab_list lf" style="width:1.875rem">
                    <?php if($controller=='Index'): ?>
                    <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                    <?php endif; ?>
                    <p>首页</p>
                </div>
            </a>
            <a href="/member/classify/classify">
                <div class="footer_tab_list lf" style="width:1.875rem">
                    <?php if($controller=='Classify'): ?>
                    <img src="__STATIC__/image/myhome/icon_fenlei_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_fenlei_off@2x.png">
                    <?php endif; ?>
                    <p>分类</p>
                </div>
            </a>

            <a href="/member/myhome/index">
                <div class="footer_tab_list rt" style="width:1.875rem">
                    <?php if($controller=='Myhome'): ?>
                    <img src="__STATIC__/image/myhome/icon_user_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_user_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_user_off@2x.png">
                    <?php endif; ?>
                    <p>我的</p>
                </div>
            </a>
            <?php if($is_read==0): ?>
            <a href="/member/systemmsg/index">
                <div class="footer_tab_list rt" style="width:1.875rem">
                    <?php if($controller=='Systemmsg'): ?>
                    <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php else: ?>
            <a href="/member/systemmsg/index">
                <div class="footer_tab_list rt" style="width:1.875rem">
                    <?php if($controller=='Systemmsg'): ?>
                    <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                    <p class="unread"></p>
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                    <p class="unread"></p>
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php endif; ?>
    </div>
</footer>
<?php endif; if($m_type==1): ?>
<div class="hc" style="height: 1.6rem;"></div>
<div class="footer_tab phonex">
        <a href="/index/index">
            <div class="footer_tab_list lf" style="width:1.875rem">
                <?php if($controller=='Index'): ?>
                <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                <?php endif; ?>
                <p>首页</p>
            </div>
        </a>
        <a href="/member/classify/classify">
            <div class="footer_tab_list lf" style="width:1.875rem">
                <?php if($controller=='Classify'): ?>
                <img src="__STATIC__/image/myhome/icon_fenlei_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_fenlei_off@2x.png">
                <?php endif; ?>
                <p>分类</p>
            </div>
        </a>

        <a href="/member/myhome/index">
            <div class="footer_tab_list rt" style="width:1.875rem">
                <?php if($controller=='Myhome'): ?>
                <img src="__STATIC__/image/myhome/icon_user_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_user_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_user_off@2x.png">
                <?php endif; ?>
                <p>我的</p>
            </div>
        </a>
        <?php if($is_read==0): ?>
        <a href="/member/systemmsg/index">
            <div class="footer_tab_list rt" style="width:1.875rem">
                <?php if($controller=='Systemmsg'): ?>
                <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                <?php endif; ?>
                <p>消息</p>
            </div>
        </a>
        <?php else: ?>
        <a href="/member/systemmsg/index">
            <div class="footer_tab_list rt" style="width:1.875rem">
                <?php if($controller=='Systemmsg'): ?>
                <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                <p class="unread"></p>
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                <p class="unread"></p>
                <?php endif; ?>
                <p>消息</p>
            </div>
        </a>
        <?php endif; ?>
</div>
<?php endif; else: if($m_type==0): ?>
<div class="hc" style="height: 0.98rem;"></div>

<footer>

    <div class="footer_tab phonex">
            <a href="/index/index">
                <div class="footer_tab_list lf">
                    <?php if($controller=='Index'): ?>
                    <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                    <?php endif; ?>
                    <p>首页</p>
                </div>
            </a>
            <a href="/member/classify/classify">
                <div class="footer_tab_list lf">
                    <?php if($controller=='Classify'): ?>
                    <img src="__STATIC__/image/myhome/icon_fenlei_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_fenlei_off@2x.png">
                    <?php endif; ?>
                    <p>分类</p>
                </div>
            </a>

            <a href="/popularity/popularitygoods/share_list">
                <div class="footer_tab_list footer_pub lf">
                    <img src="__STATIC__/image/myhome/icon_fabu1@2x.png">
                </div>
            </a>

            <a href="/member/myhome/index">
                <div class="footer_tab_list rt">
                    <?php if($controller=='Myhome'): ?>
                    <img src="__STATIC__/image/myhome/icon_user_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_user_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_user_off@2x.png">
                    <?php endif; ?>
                    <p>我的</p>
                </div>
            </a>
            <?php if($is_read==0): ?>
            <a href="/member/systemmsg/index">
                <div class="footer_tab_list rt">
                    <?php if($controller=='Systemmsg'): ?>
                    <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php else: ?>
            <a href="/member/systemmsg/index">
                <div class="footer_tab_list rt">
                    <?php if($controller=='Systemmsg'): ?>
                    <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                    <p class="unread"></p>
                    <?php else: ?>
                    <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                     <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                    <p class="unread"></p>
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php endif; ?>
    </div>
</footer>
<?php endif; if($m_type==1): ?>
<div class="hc" style="height: 1.6rem;"></div>
<div class="footer_tab phonex">
        <a href="/index/index">
            <div class="footer_tab_list lf">
                <?php if($controller=='Index'): ?>
                <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                <?php endif; ?>
                <p>首页</p>
            </div>
        </a>
        <a href="/member/classify/classify">
            <div class="footer_tab_list lf">
                <?php if($controller=='Classify'): ?>
                <img src="__STATIC__/image/myhome/icon_fenlei_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_fenlei_off@2x.png">
                <?php endif; ?>
                <p>分类</p>
            </div>
        </a>

        <a href="/popularity/popularitygoods/share_list">
            <div class="footer_tab_list footer_pub lf">
                <img src="__STATIC__/image/myhome/icon_fabu1@2x.png">
            </div>
        </a>

        <a href="/member/myhome/index">
            <div class="footer_tab_list rt">
                <?php if($controller=='Myhome'): ?>
                <img src="__STATIC__/image/myhome/icon_user_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_user_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_user_off@2x.png">
                <?php endif; ?>
                <p>我的</p>
            </div>
        </a>
        <?php if($is_read==0): ?>
        <a href="/member/systemmsg/index">
            <div class="footer_tab_list rt">
                <?php if($controller=='Systemmsg'): ?>
                <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                <?php endif; ?>
                <p>消息</p>
            </div>
        </a>
        <?php else: ?>
        <a href="/member/systemmsg/index">
            <div class="footer_tab_list rt">
                <?php if($controller=='Systemmsg'): ?>
                <img src="__STATIC__/image/myhome/icon_xiaoxi_on@2x.png">
                <p class="unread"></p>
                <?php else: ?>
                <!--<img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png">-->
                 <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                <p class="unread"></p>
                <?php endif; ?>
                <p>消息</p>
            </div>
        </a>
        <?php endif; ?>
</div>
<?php endif; endif; ?>

</footer>
    </body>

    <!--bugtags 开始-->
    <!-- <script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script> -->
    <!-- <script> -->
        <!-- // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本 -->
        <!-- // new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE'); -->
    <!-- // </script> -->
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

//    var link = PAI_URL.'/member/register/it_to_rg/phone/<?php echo isset($info['m_mobile']) ? $info['m_mobile'] :  ""; ?>';
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
        imgUrl = "https://m.paiyy.com.cn"+'/uploads/logo/1.jpg';
    }
    wx.config({
      //  debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
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
<script src="__JS__/index/swiper.min.js"></script>
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script type="text/javascript" src="__JS__/liMarquee/jquery.liMarquee.js"></script>
<script src="__JS__/index/index.js"></script>
<script src="__JS__/cookie/jquery.cookie.js"></script>
<script>
    // $(window).scroll(function () {
    //     console.log($(window).scrollTop());
    //     var scrol=$(window).scrollTop();
    //     window.sessionStorage.setItem("scrol",scrol);//存数据到sessionStorage
    // })
    // var offs=window.sessionStorage.getItem("scrol")//从sessionStorage中取数据
    //  $(window).scrollTop(offs);
    
    //安卓app显示扫码位置
    if(getCookie("versionScan") != null) {
        $('.index_search').addClass('smjk');
        $('.index_searsh_top').addClass('smapp');
        $('.sm-icon').show();
    }

    function hclic(id){
        var vo=$(id).children().html();
        var typ = $("input[name='type']").val();
        window.location.href="/index/index/search_index/type/"+typ+"/keyword/"+vo;
    }
    //点击搜索
        $(".index_pop_sousuo").click(function () {
            var keyword = $("input[name='keyword']").val();
            var typ = $("input[name='type']").val();
            window.location.href = "/index/index/search_index/type/" + typ + "/keyword/" + keyword;
        })

    //判断是否登录(1已登录，0未登录)
    var isLogin = "<?php echo $is_login; ?>";
    //判断是否领取了红包（1可领取，2已领取）
    var is_res = "<?php echo $is_reward; ?>";
    if (isLogin == 0) {
        $('.red').show();
    }
    if (isLogin == 1 && is_res == 1) {
        $('.red').show();
    }

    if (isLogin == 1 && is_res == 2) {
        if (sessionStorage.getItem('hb') == 2) {
            layui.use("layer", function () {
                /*layui的规则*/
                var layer = layui.layer;
                layer.msg("<span style='color:#fff'>此手机已领取过红包了</span>", {
                    // skin: 'demo-class',
                    time: 2000
                }, function () {
                    sessionStorage.removeItem('hb');
                });
            })

        }
    }

    //iosapp
    /*这段代码是固定的，必须要放到js中*/
    function setupWebViewJavascriptBridge(callback) {
        if (window.WebViewJavascriptBridge) {
            return callback(WebViewJavascriptBridge);
        }
        if (window.WVJBCallbacks) {
            return window.WVJBCallbacks.push(callback);
        }
        window.WVJBCallbacks = [callback];
        var WVJBIframe = document.createElement('iframe');
        WVJBIframe.style.display = 'none';
        WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
        document.documentElement.appendChild(WVJBIframe);
        setTimeout(function () {
            document.documentElement.removeChild(WVJBIframe)
        }, 0)
    }

    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    setupWebViewJavascriptBridge(function (bridge) {
        /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
        bridge.callHandler('isApp', function (str) {
            $('#app').val(str);
            //ios app显示扫码位置
            if($('#app').val() == '1.0') {
                $('.index_search').addClass('smjk');
                $('.index_searsh_top').addClass('smapp');
                $('.sm-icon').show();
            }            
            
            //ios app领取红包
            $(".new_pop_btn").html("立即领取红包");
            if (sessionStorage.getItem('close') == null) {
                if (isLogin == 0) {
                    $('.new_pop').show();
                }
                if (isLogin == 1 && is_res == 1) {
                    $('.new_pop').show();
                }
            }
        })
    })

    //ios app点击扫码按钮    
    $('.sm-icon').click(function(){
        if(getCookie("versionScan") != null) {
            //安卓点击扫码按钮
            $('.sm-icon').click(function(){
                window.android.doScanQrImage();
            })
        }else if($('#app').val() == '1.0') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function(bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/ 
                bridge.callHandler('doScanQrImage');
            })
        }
    })
    
    //点击隐藏红包
    $(".new_pop_con img").click(function () {
        $(".new_pop").hide();
        sessionStorage.setItem('close', '1');
    })

    if (hideFlag) {
        if (typeof(window.android) !== 'undefined') {
            if (androidIos() == 'android') {
                $(".new_pop_btn").html("立即领取红包");
                if (sessionStorage.getItem('close') == null) {
                    if (isLogin == 0) {
                        $('.new_pop').show();
                    }
                    if (isLogin == 1 && is_res == 1) {
                        $('.new_pop').show();
                    }
                }
            }
        }
    }

    //点击领取红包
    $('.new_pop_btn').click(function () {
        //h5
        if ($(".new_pop_btn").text() == "立即下载并领取红包") {
            var u = navigator.userAgent;
            if (u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) {
                //安卓手机
                window.location.href = "/member/register/az_guide"
            } else if (u.indexOf('iPhone') > -1) {
                //苹果手机
                window.location.href = "/member/register/ios_guide"
            } else if (u.indexOf('Windows Phone') > -1) {
                //winphone手机
            }
        } else {
            //移动端直接领取
            getData();
        }
    })

    //var timeout;

    //安卓和ios以及微信和qq的打开app协议和跳转到下载app市场的协议可能不同
    // document.getElementById('cs').onclick = function (e) {

    //         // alert(3)
    //         var locationHref = window.location;
    //         if (navigator.userAgent.match(/(iPhone|iPod|iPad);?/i)) {
    //             // 我们还需要知道的一点是，微信里屏蔽了schema协议。除非你是微信的合作伙伴之类的，他们专门给你配置进白名单，否则我们就没办法通过这个协议在微信中直接唤起app。
    //             // 因此我们会判断页面场景是否在微信中，如果在微信中，则会提示用户在浏览器中打开。
    //             // 如何判断本地是否安装了app
    //             var ifr = document.createElement("iframe");
    //             ifr.src = "com.zhisheng.paiyayallll"; /***打开app的协议，有ios同事提供 itms-apps://itunes.apple.com/app/apple-store/id432274380***/
    //             ifr.style.display = "none";
    //             document.body.appendChild(ifr);
    //             timeout = setTimeout(function () {
    //             document.body.removeChild(ifr);
    //             window.location.href = "itms-services://?action=download-manifest&url=https://raw.githubusercontent.com/tiger50906/paiyy/master/final/paiyy.plist"; /***下载app的地址***/
    //             }, 500)
    //         } 
    //         // else if (navigator.userAgent.match(/android/i)) {
    //         //     //在安卓下有弹层提示是否进去下载应用商店，并且如果已经安装进去app后返回 浏览器进去浏览器进入下载页面并且刷新页面时又进如app，知乎appye
    //         //     var ifr = document.createElement('iframe');
    //         //     ifr.src = 'schemepaiyaya://paiyy:8080/app?m_id=1&phone=15676246642'; // shoule configure at AndroidManifest.xml
    //         //     ifr.style.display = 'none';
    //         //     document.body.appendChild(ifr);

    //         //     // var t ="zhihu://articles/27494849";
    //         //     // t += "backupurl=" +  encodeURIComponent("mstore://details?package_name=com.zhihu.android&source_apkname=com.zhihu.android&source_info=zhihu")
    //         //     timeout = setTimeout(function () {
    //         //     document.body.removeChild(ifr);
    //         //     window.location = "http://a.app.qq.com/o/simple.jsp?pkgname=b2c.zhisheng.com.zhisheng&fromcase=40002";//android 下载地址 安卓的下载地址和ios不同,安卓的下载地址最好不要跳转到另外一页，最好在当前页面，不然安卓下不管是否安装该app总是先跳转到该下载页面并且跳转app后再回来的时候浏览器停留在下载页面，因为有时候网络慢或者打开app的时间过长就会导致跳转到了下载页面，即使也打开了app，但是在回到浏览器就跳转到了下载页面，所以安卓下最好下载地址不要重新定义一个页面
    //         //     //安卓或者直接下载app  e.Wechat || e.Weibo ? s(t) : e.QQ || (window.location = 'https://api.zhihu.com/client/download/apk/latest')
    //         //     }, 800);
    //         //     if (document.addEventListener) {
    //         //         document.addEventListener("webkitvisibilitychange", clean);
    //         //         document.addEventListener("visibilitychange", clean);
    //         //         document.addEventListener("pagehide", clean);
    //         //     } else if (document.attachEvent) {
    //         //         //document.attachEvent("onclick", myFunction);
    //         //     }
    //         // }
    //     }        


    //安卓和ios以及微信和qq的打开app协议和跳转到下载app市场的协议可能不同
    // document.getElementById('new_pop_btn').onclick = function (e) {
    //     if($('#app').val() != '') {
    //         //alert(1)
    //         getData();
    //     }else if(hideFlag){
    //         if (typeof(window.android) !== 'undefined') {
    //             if (androidIos() == 'android') {
    //                 getData();
    //             }
    //         }
    //         //alert(2)
    //     }else {
    //         //alert(3)
    //         var locationHref = window.location;
    //         if (navigator.userAgent.match(/(iPhone|iPod|iPad);?/i)) {
    //             // 我们还需要知道的一点是，微信里屏蔽了schema协议。除非你是微信的合作伙伴之类的，他们专门给你配置进白名单，否则我们就没办法通过这个协议在微信中直接唤起app。
    //             // 因此我们会判断页面场景是否在微信中，如果在微信中，则会提示用户在浏览器中打开。
    //             // 如何判断本地是否安装了app
    //             var ifr = document.createElement("iframe");
    //             ifr.src = "PaiYaYa://kanmei.zsj.com"; /***打开app的协议，有ios同事提供 itms-apps://itunes.apple.com/app/apple-store/id432274380***/
    //             ifr.style.display = "none";
    //             document.body.appendChild(ifr);
    //             timeout = setTimeout(function () {
    //             document.body.removeChild(ifr);
    //             window.location.href = "itms-services://?action=download-manifest&url=https://raw.githubusercontent.com/tiger50906/paiyy/master/final/paiyy.plist"; /***下载app的地址***/
    //             }, 500)
    //         } else if (navigator.userAgent.match(/android/i)) {
    //             //在安卓下有弹层提示是否进去下载应用商店，并且如果已经安装进去app后返回 浏览器进去浏览器进入下载页面并且刷新页面时又进如app，知乎appye
    //             var ifr = document.createElement('iframe');
    //             ifr.src = 'schemepaiyaya://paiyy:8080/app?m_id=1&phone=15676246642'; // shoule configure at AndroidManifest.xml
    //             ifr.style.display = 'none';
    //             document.body.appendChild(ifr);

    //             // var t ="zhihu://articles/27494849";
    //             // t += "backupurl=" +  encodeURIComponent("mstore://details?package_name=com.zhihu.android&source_apkname=com.zhihu.android&source_info=zhihu")
    //             timeout = setTimeout(function () {
    //             document.body.removeChild(ifr);
    //             window.location = "http://a.app.qq.com/o/simple.jsp?pkgname=b2c.zhisheng.com.zhisheng&fromcase=40002";//android 下载地址 安卓的下载地址和ios不同,安卓的下载地址最好不要跳转到另外一页，最好在当前页面，不然安卓下不管是否安装该app总是先跳转到该下载页面并且跳转app后再回来的时候浏览器停留在下载页面，因为有时候网络慢或者打开app的时间过长就会导致跳转到了下载页面，即使也打开了app，但是在回到浏览器就跳转到了下载页面，所以安卓下最好下载地址不要重新定义一个页面
    //             //安卓或者直接下载app  e.Wechat || e.Weibo ? s(t) : e.QQ || (window.location = 'https://api.zhihu.com/client/download/apk/latest')
    //             }, 800);
    //             if (document.addEventListener) {
    //                 document.addEventListener("webkitvisibilitychange", clean);
    //                 document.addEventListener("visibilitychange", clean);
    //                 document.addEventListener("pagehide", clean);
    //             } else if (document.attachEvent) {
    //                 //document.attachEvent("onclick", myFunction);
    //             }
    //         }
    //     }        
    // }
    // function clean() {
    //     clearTimeout(timeout);
    //     window.location.href = locationHref;
    // }

    //点击显示红包弹窗
    $('.red').on('click', function () {
        if (isLogin == 1) {
            $(".new_pop").show();
        } else {
            window.location.href = "/member/login/index";
        }
    })

    //给后端发送数据领取红包
    function getData() {
        if (isLogin == 1) {
            var money = $(".new_pop_con a small").html();
            $.ajax({
                url: "/index/index/app_reward",
                dataType: "json",
                type: "POST",
                data: {money: money},
                success: function (data) {
                    if (data.status == 1) {
                        $(".new_pop").hide();
                        $(".red").hide();
                    }
                    layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                        time: 2000
                    });
                }
            })
        } else {
            window.location.href = "/member/login/index";
            sessionStorage.setItem('hb', '1');
        }
    }

    //邀请好友登录
    $('.ads').click(function () {
        window.location.href = $(this).attr('data')
    })

    //banner图轮播
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'horizontal',//滚动方向
        loop: true,//循环
        pagination: {
            el: '.swiper-pagination'
        },
        paginationClickable: true,//分页器
        autoplay: {
            disableOnInteraction: false
        },
        disableOnInteraction: false//用户操作swiper之后，是否禁止autoplay。默认为 true：停止。false是播放
    })

    //滚动屏幕
    // $(window).scroll(function () {
    //     var scro = $(window).scrollTop();
    //     if (scro > 50) {
    //         $(".index_searsh_top").css({background: "#FFD400"});
    //     } else {
    //         $(".index_searsh_top").css({background: "background:linear-gradient(90deg,rgba(255,231,68,1),rgba(255,172,28,1));"});
    //     }
    // })

    //精选拍品的下拉加载数据
    //创建MeScroll对象,内部已默认开启下拉刷新,自动执行up.callback,刷新列表数据;
    var mescroll = new MeScroll("body", {
        //下拉刷新
        down: {
            isLock: true, //锁定下拉
        },
        //上拉加载的配置项
        up: {
            callback: getListData, //上拉回调,此处可简写; 相当于 callback: function (page) { getListData(page); }
            isBounce: false, //此处禁止ios回弹,解析(务必认真阅读,特别是最后一点): http://www.mescroll.com/qa.html#q10
            noMoreSize: 1, //如果列表已无数据,可设置列表的总数量要大于半页才显示无更多数据;避免列表数据过少(比如只有一条数据),显示无更多数据会不好看; 默认5
            empty: {
                icon: "/static/image/goodscollection/shoucang@2x.png", //图标,默认null
                tip: "暂无产品~", //提示
            },
            clearEmptyId: "dataList", //相当于同时设置了clearId和empty.warpId; 简化写法;默认null
            htmlLoading: '<p class="upwarp-progress mescroll-rotate"></p><p class="upwarp-tip">加载中..</p>', //上拉加载中的布局
            htmlNodata: '<p class="upwarp-nodata">我是有底线的~</p>', //无数据的布局
            toTop: {
                //配置回到顶部按钮
                src: "/static/image/application/mescroll-totop.png", //默认滚动到1000px显示,可配置offset修改
                //offset : 1000
            }
        }
    });

    /*联网加载列表数据  page = {num:1, size:10}; num:当前页 从1开始, size:每页数据条数 */
    function getListData(page) {
        //联网加载数据
        getListDataFromNet(page.num, page.size, function (curPageData, totle_num) {
            //方法二(推荐): 后台接口有返回列表的总数据量 totalSize
            //必传参数(当前页的数据个数, 总数据量)
            mescroll.endBySize(curPageData.length, totle_num);

            //设置列表数据
            setListData(curPageData);
        }, function () {
            //联网失败的回调,隐藏下拉刷新和上拉加载的状态;
            mescroll.endErr();
        });
    }
    
    /*设置列表数据*/
    function setListData(curPageData) {
        var listDom = document.getElementById("dataList");
        for (var i = 0; i < curPageData.length; i++) {
            var pd = curPageData[i];
            var num;
            if (pd.max_num == 0) {
                num = 0;
            } else {
                num = pd.max_num / pd.gdr_membernum * 100;
                if (num >= 100) {
                    num = 100;
                } else if (num >= 99 && num < 100) {
                    num = 99;
                } else {
                    num = Math.ceil(num);
                }
            }
            var img = '';
            // if (pd.gp_market_price >= 0 && pd.gp_market_price <= 1000) {
            //     img = '<img src="__STATIC__/image/index/icon_home_hundred@2x.png" alt="">'
            // }
            // if (pd.gp_market_price >= 1001 && pd.gp_market_price <= 10000) {
            //     img = '<img src="__STATIC__/image/index/icoc_home_thousand@2x.png" alt="">'
            // }
            // if (pd.gp_market_price >= 10001) {
            //     img = '<img src="__STATIC__/image/index/icon_home_wan@2x.png" alt="">'
            // }
            var str = '<div class="index_module_main clear">';
            str += '<div class="index_module_img_view lf">';
            str += '<div class="index_module_img">';
            str += '<img src="' + pd.g_img + '" alt="">';
            str += '</div>';
            str += '<div class="index_module_pic">';
            str += img;
            str += '</div>';
            str += '</div>';
            str += '<div class="index_module_text lf">';
            str += '<p>' + pd.g_name + '</p>';
            
            str += '<div class="index_module_progress_view clear">';
            str += '<div class="index_module_progress lf">';
            str += '<div class="index_module_progressbar" style="width: ' + num + '%"></div>';
            str += '</div>';
            str += '<div class="index_module_progress_hint lf">' + num + '%</div>';
            str += '</div>';
            str += '<span>￥<i>' + pd.gdr_price + '</i>&nbsp;&nbsp;<del>￥' + pd.gp_market_price + '</del></span>';
            str += '<div class="index_module_progress_bottom clear">';
            str += '<span class="lf">' + pd.total_num + '人已参与</span>';
            // str += '<div class="index_module_progress_canyu rt">立即参团</div>';

            str += '</div>';
            str += '</div>';
            str += '</div>';
            str += '<div class="index_module_progress_canyu index_module_progress_canyu2 rt"><img src="__STATIC__/image/index/icon_bt@2x.png" alt=""></div>';
            var liDom = document.createElement("a");
            liDom.setAttribute("href", '/member/goodsproduct/index/g_id/' + pd.g_id);
            liDom.innerHTML = str;
            listDom.appendChild(liDom);
            
        }
    }

    /*联网加载列表数据
     在您的实际项目中,请参考官方写法: http://www.mescroll.com/api.html#tagUpCallback
     请忽略getListDataFromNet的逻辑,这里仅仅是在本地模拟分页数据,本地演示用
     实际项目以您服务器接口返回的数据为准,无需本地处理分页.
     * */
    function getListDataFromNet(pageNum, pageSize, successCallback, errorCallback) {
        //延时一秒,模拟联网
        setTimeout(function () {
            $.ajax({
                type: 'post',
                url: '/index/index/goods_hot/page/' + pageNum + '/page_size/' + pageSize,
                dataType: 'json',
                success: function (data) {
                    var listData = [];
                    for (var i = 0; i < data.list.length; i++) {
                        listData.push(data.list[i]);
                    }
                    //回调
                    successCallback(listData, data.totle_num);
                },
                error: errorCallback
            });
        }, 1000)
    }

    //获取公告内容
    $.ajax({
        type: 'post',
        url: '/index/index/notice',
        success: function (res) {
            console.log(res)
            if (res.data.length > 0) {
                for (i = 0; i < res.data.length; i++) {
                    $('.dowebok').append('<a>' + res.data[i] + '</a>');
                }
                $('.dowebok').liMarquee({
                    runshort: false
                });
            } else {
                $('.details-act').hide();
            }
        }
    })
    // $('.index_area_list').click(function () {
    //     // console.log($(this).index());
    //     var i = $(this).index()
    //     // alert(i);
    //     window.location.href = "/index/index/price_range/type/" + (i + 1);
    //     $.cookie('zhekou_type', i, {expire: 10000, path: '/'})
    // })
    // 大牌折扣倒计时
    var nowTime = parseInt(new Date().getTime());

    function timer(intDiff, idName) {
        window.setInterval(function (e) {
            var day = 0,
                hour = 0,
                minute = 0,
                second = 0;
            /*时间默认值*/
            if (intDiff > 0) {
                day = Math.floor(intDiff / 1000 / 60 / 60 / 24);
                hour = Math.floor(intDiff / 1000 / 60 / 60 - (day * 24));
                minute = Math.floor((intDiff / 1000 / 60) - (day * 24 * 60) - (hour * 60));
                second = Math.floor((intDiff / 1000) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60));
                if (day == 0 && hour == 0 && minute == 0 && second == 0) {
                    clearInterval(setInterval(e));
                    location.reload();
                }
            }
            if (hour <= 9) hour = '0' + hour;
            if (minute <= 9) minute = '0' + minute;
            if (second <= 9) second = '0' + second;

            // $(idName + ' .details_day').html(' <span>' + 00 + '</span>天');
            // $(idName + ' .details_hour').html('<span>' + 00 + '</span>');
            // $(idName + ' .details_minute').html('<span>' + 00 + '</span>');
            // $(idName + ' .details_second').html('<span>' + 00 + '</span>');
            intDiff -= 1000;
        }, 1000);
    }
    // var end_time = 12345 * 1000 - nowTime;
    timer(12345000, '#first');


    // 开启提醒弹框逻辑
    // 模拟定时器，显示
    // setTimeout(function(){
    //     $('.intime_alert').css('display','block');
    // },5000)
    $('.alert_no').click(function(){
        $('.intime_alert').css('display','none');
    })
    $('.alert_yes').click(function(){
        $('.alert_content').css('display','none');
        $('.alert_success').css('display','block');
        setTimeout(function(){
            $('.intime_alert').css('display','none');
        },5000)
    })
    // 秒杀
    $(".seckill").click(function(){
        layer.msg("<span style='color:#fff'>暂未开放，敬请期待！</span>",{
            time:2000
        });
    })
    // 捡漏
    // $(".picker").click(function(){
    //     layer.msg("<span style='color:#fff'>暂未开放，敬请期待！</span>",{
    //         time:2000
    //     });
    // })

    // 大额
    $(".index_areas").click(function(){
        layer.msg("<span style='color:#fff'>暂未开放，敬请期待！</span>",{
            time:2000
        });
    })
    // 二手
    // $(".index_ershou").click(function(){
    //     layer.msg("<span style='color:#fff'>暂未开放，敬请期待！</span>",{
    //         time:2000
    //     });
    // })


    $('.index_items li').click(function(){
        var aHref =  $(this).parent('a').attr('href');
        if(aHref == '' || aHref == null){
            $(this).parent('a').attr('href','javascript:;');
            layer.msg("<span style='color:#fff'>暂未开放，敬请期待！</span>",{
                time:2000
            });
            $(this).click(function(){
                layer.msg("<span style='color:#fff'>暂未开放，敬请期待！</span>",{
                    time:2000
                });
            })
        }

    })
</script>


</html>