<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"D:\project\pai\public/../application/activity/view/index/index.html";i:1544406560;s:67:"D:\project\pai\public/../application/activity/view/common/base.html";i:1541491285;s:69:"D:\project\pai\public/../application/activity/view/common/js_sdk.html";i:1541491285;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/activity/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">

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
        
<mian style="margin-top: -0.88rem">
    <?php if($is_jiche == 1): ?>
    <header>
        <div class="header_nav">
            <div class="header_view">
                <div class="header_tit">
                    <span>机车情怀</span>
                    <div class="header_back" onclick="javascript:history.go(-1);">
                        <img src="/static/icon/publish/icon_nav_back@2x.png" name="out" class="smts">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php elseif($is_peanut ==1): ?>
    <div class="peanut_header">
        <div class="group_header">
            <div class="goback lf goback1">
                <img src="__STATIC__/image/activity/icon_back@2x (1).png" alt="">
            </div>
            <div class="index_search lf tosearch" style="background: rgba(255,241,186,1);">

                <img src="__STATIC__/image/activity/icon_sousuo@2x.png" alt="" class="lf">

                <p>大家都在搜 iMac Pro…</p>
            </div>
            <div class="share_top lf">
                <img src="__STATIC__/image/activity/icon_fenxiang@2x.png" alt="">
            </div>
        </div>
        <div class="peanut_data clear">
            <img src="" alt="" class="peanut_my_img lf">
            <a href="/member/myhome/peanut">
                <div class="peanut_my_info lf">
                    <span class="peanut_my_name">DuckKING</span>
                    <img src="__STATIC__/image/activity/icon_jump@2x.png" alt="">
                    <span class="peanut_my_num">
                    <img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">
                    200.00
                </span>
                </div>
            </a>

            <a href="/member/myhome/recharge_peanut">
                <div class="peanut_recharge rt">花生充值</div>
            </a>

        </div>
        <a href="/activity/index/peanut_rule">
            <div class="peanut_rule">
                <img src="__STATIC__/image/activity/icon_bar@2x.png" alt="">
            </div>
        </a>

    </div>
    <?php else: ?>
    <div class="group_header clear">
        <div class="goback lf goback1">
            <img src="__STATIC__/image/activity/icon_back@2x.png" alt="">
        </div>
        <div class="index_search lf tosearch">

            <img src="__STATIC__/image/activity/icon_sousuo@2x.png" alt="" class="lf">

            <p>大家都在搜 iPhoneX…</p>
        </div>
    </div>
    <?php endif; if($is_jiche == 1): elseif($is_peanut ==1): ?>
    <div class="my_peanut">
        <!--如果没有别人买-->
        <img src="__STATIC__/image/activity/icon_biaoti@2x (2).png" alt="" class="no_peanut">
        <!--如果有人买花生-->
        <div class="peanut_join">
            <div class="peanut_join_title">
                <span>我的花生连</span>
                <span>查看所有奖励</span>
                <img src="__STATIC__/image/activity/icon_jump@2x.png" alt="">
            </div>
            <div class="peanut_join_wrap">
                <div class="swiper-container3 swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="/member/goodsproduct/index/g_id/">
                                <div class="peanut_item">
                                    <div class="peanut_item_top">
                                        <img src="" alt="" class="err_img">
                                        <span class="peanut_help">助TA成团
                                        <img src="__STATIC__/image/activity/icon_jump@2x.png" alt=""></span>
                                    </div>
                                    <div class="peanut_item_other">
                                        <img src="" alt="" class="item_other_img">
                                        <span>TA将赠您</span>
                                    </div>
                                    <p class="peanut_item_price">
                                        <img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">
                                        10
                                    </p>
                                </div>
                            </a>


                        </div>
                        <div class="swiper-slide">
                            <a href="/member/goodsproduct/index/g_id/">
                                <div class="peanut_item">
                                    <div class="peanut_item_top">
                                        <img src="" alt="" class="err_img">
                                        <span class="peanut_success">花生已到账</span>
                                    </div>
                                    <div class="peanut_item_other">
                                        <img src="" alt="" class="item_other_img">
                                        <span>TA已赠您</span>
                                    </div>
                                    <p class="peanut_item_price">
                                        <img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">
                                        10
                                    </p>
                                </div>
                            </a>


                        </div>
                        <div class="swiper-slide">
                            <a href="/member/goodsproduct/index/g_id/">
                                <div class="peanut_item">
                                    <div class="peanut_item_top">
                                        <img src="" alt="" class="err_img">
                                        <span class="peanut_success">花生已到账</span>
                                    </div>
                                    <div class="peanut_item_other">
                                        <img src="" alt="" class="item_other_img">
                                        <span>TA已赠您</span>
                                    </div>
                                    <p class="peanut_item_price">
                                        <img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">
                                        10
                                    </p>
                                </div>
                            </a>


                        </div>
                        <div class="swiper-slide">
                            <a href="/member/goodsproduct/index/g_id/">
                                <div class="peanut_item">
                                    <div class="peanut_item_top">
                                        <img src="" alt="" class="err_img">
                                        <span class="peanut_success">花生已到账</span>
                                    </div>
                                    <div class="peanut_item_other">
                                        <img src="" alt="" class="item_other_img">
                                        <span>TA已赠您</span>
                                    </div>
                                    <p class="peanut_item_price">
                                        <img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">
                                        10
                                    </p>
                                </div>
                            </a>


                        </div>
                        <div class="swiper-slide">
                            <a href="/member/goodsproduct/index/g_id/">
                                <div class="peanut_item">
                                    <div class="peanut_item_top">
                                        <img src="" alt="" class="err_img">
                                        <span class="peanut_success">花生已到账</span>
                                    </div>
                                    <div class="peanut_item_other">
                                        <img src="" alt="" class="item_other_img">
                                        <span>TA已赠您</span>
                                    </div>
                                    <p class="peanut_item_price">
                                        <img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">
                                        10
                                    </p>
                                </div>
                            </a>


                        </div>
                        <div class="swiper-slide">
                            <a href="/member/goodsproduct/index/g_id/">
                                <div class="peanut_item">
                                    <div class="peanut_item_top">
                                        <img src="" alt="" class="err_img">
                                        <span class="peanut_success">花生已到账</span>
                                    </div>
                                    <div class="peanut_item_other">
                                        <img src="" alt="" class="item_other_img">
                                        <span>TA已赠您</span>
                                    </div>
                                    <p class="peanut_item_price">
                                        <img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">
                                        10
                                    </p>
                                </div>
                            </a>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--提示好友数-->
        <div class="peanut_friend">
            <span>我的花生连</span>
            <div class="my_parent_wrap clear">
                <div class="my_parent lf">
                    <img src="" alt="" class="par_img">
                    <img src="" alt="" class="par_img">
                    <img src="" alt="" class="par_img">
                    <span>共24名好友</span>
                </div>
                <div class="inv_btn rt">邀TA们参团</div>
            </div>
        </div>
    </div>
    <?php else: if(!(empty($info['activity_banner']) || (($info['activity_banner'] instanceof \think\Collection || $info['activity_banner'] instanceof \think\Paginator ) && $info['activity_banner']->isEmpty()))): ?>
    <div class="group_banner">

        <?php if(is_array($info['activity_banner']) || $info['activity_banner'] instanceof \think\Collection || $info['activity_banner'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($info['activity_banner']) ? array_slice($info['activity_banner'],0,1, true) : $info['activity_banner']->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo (isset($vo['ab_href']) && ($vo['ab_href'] !== '')?$vo['ab_href']:'#content'); ?>">
            <img src="<?php echo isset($vo['ab_img']) ? $vo['ab_img'] :  ''; ?>" alt="" style="width:100%;height:100%" class="err_img">
        </a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <!--<div class="swiper-container swiper-container1">-->
        <!--<div class='swiper-wrapper'>-->
        <!---->

        <!--<div class="swiper-slide">-->
        <!--<?php if($vo['ab_href'] != ''): ?>-->
        <!--<a href="<?php echo isset($vo['ab_href']) ? $vo['ab_href'] :  '#'; ?>"><img src="<?php echo isset($vo['ab_img']) ? $vo['ab_img'] :  ''; ?>"></a>-->
        <!--<?php else: ?>-->
        <!--<img src="<?php echo isset($vo['ab_img']) ? $vo['ab_img'] :  ''; ?>">-->
        <!--<?php endif; ?>-->
        <!--</div>-->
        <!---->

        <!--</div>-->
        <!--<div class="swiper-pagination"></div>-->
        <!--</div>-->

    </div>
    <?php endif; endif; ?>


    <div class="group_discount_pick">
        <div class="group_discount clear">
            <?php if(!(empty($info['ads_goods']) || (($info['ads_goods'] instanceof \think\Collection || $info['ads_goods'] instanceof \think\Paginator ) && $info['ads_goods']->isEmpty()))): if(is_array($info['ads_goods']) || $info['ads_goods'] instanceof \think\Collection || $info['ads_goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['ads_goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="group_discount_item lf">
                <a href="/member/goodsproduct/index/g_id/<?php echo $vo['ag_gid']; ?>">
                    <img src="<?php echo $vo['ag_banner']; ?>" alt="">
                </a>
            </div>
            <!--<div class="group_discount_item lf">-->
            <!--<img src="__STATIC__/image/activity/banner_2@2x.png" alt="">-->
            <!--</div>-->
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
        <?php if(!(empty($info['tj_goods']) || (($info['tj_goods'] instanceof \think\Collection || $info['tj_goods'] instanceof \think\Paginator ) && $info['tj_goods']->isEmpty()))): ?>
        <div class="group_pick">
            <div class="group_pick_top">
                <img src="__STATIC__/image/activity/icon_biaoti@2x.png" alt="">
            </div>
            <div class="group_pick_content">
                <div class="swiper-container2 swiper-container">
                    <div class="swiper-wrapper">

                        <?php if(is_array($info['tj_goods']) || $info['tj_goods'] instanceof \think\Collection || $info['tj_goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['tj_goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="swiper-slide">
                            <a href="/member/goodsproduct/index/g_id/<?php echo $vo['g_id']; ?>">
                                <div class="pick_item">
                                    <div class="pick_item_top">
                                        <img src="<?php echo $vo['g_s_img']; ?>" alt="" class="err_img">
                                        <span>仅剩<?php echo $vo['left_num']; ?>人</span>
                                    </div>
                                    <p class="pick_item_name"><?php echo $vo['g_name']; ?></p>
                                    <p class="pick_item_price">
                                        <small>￥</small>
                                        <?php echo $vo['gdr_price']; ?>
                                    </p>
                                </div>
                            </a>


                        </div>

                        <?php endforeach; endif; else: echo "" ;endif; ?>

                        <!--<div class="swiper-slide">-->
                        <!--<div class="pick_item">-->
                        <!--<div class="pick_item_top">-->
                        <!--<img src="" alt="">-->
                        <!--<span>仅剩2人</span>-->
                        <!--</div>-->
                        <!--<p class="pick_item_name">SONY 便携迷你音响 IPX5防水…</p>-->
                        <!--<p class="pick_item_price">-->
                        <!--<small>￥</small>-->
                        <!--188-->
                        <!--</p>-->
                        <!--</div>-->

                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="group_content" id="content">
        <div class="group_content_top">
            <div class="top_item lf active total" data="0">
                <span>综合</span>
            </div>
            <div class="top_item lf sale_num">
                <span>销量</span>
                <div class="shop_index_tab_default">
                    <img src="__STATIC__/image/shop/icon_nav_defelt@2x.png" alt="">
                </div>
                <div class="shop_index_filter">
                    <img src="__STATIC__/image/shop/icon_nav_on@2x.png" alt="" data="1">
                    <img src="__STATIC__/image/shop/icon_nav_down@2x.png" alt="" class="shop_index_filter_img" data="2">
                </div>
                <!--<span class="arrow">-->
                <!--<img src="__STATIC__/image/activity/icon_shang@2x (1).png" alt="" class="sale_num_tohigh">-->
                <!--<img src="__STATIC__/image/activity/icon_xia@2x (1).png" alt="" class="sale_num_tolow">-->
                <!--</span>-->

            </div>
            <div class="top_item lf sale_price">
                <span>价格</span>
                <div class="shop_index_tab_default">
                    <img src="__STATIC__/image/shop/icon_nav_defelt@2x.png" alt="">
                </div>
                <div class="shop_index_filter">
                    <img src="__STATIC__/image/shop/icon_nav_on@2x.png" alt="" data="3">
                    <img src="__STATIC__/image/shop/icon_nav_down@2x.png" alt="" class="shop_index_filter_img" data="4">
                </div>
                <!--<span class="arrow">-->
                <!--<img src="__STATIC__/image/activity/icon_shang@2x (1).png" alt="" class="price_num_tohigh">-->
                <!--<img src="__STATIC__/image/activity/icon_xia@2x (1).png" alt="" class="price_num_tolow">-->
                <!--</span>-->
            </div>
            <div class="top_item lf filtrate">
                <span>筛选</span>
                <img src="__STATIC__/image/activity/icon_shaixuan@2x.png" alt="" data="5">
                <img src="__STATIC__/image/activity/icon_shaixuan@2x (1).png" alt="" class="filtrate_img" data="6">
                <!--<img src="__STATIC__/image/activity/icon_shaixuan@2x.png" alt="">-->
            </div>
            <input type="hidden" name="order" value="0"/>
        </div>
        <div class="search_condition">
            <div style="padding-left: 0.3rem;background: white;padding-bottom: 0.8rem">
                <div class="condition_item">
                    <p class="condition_item_title">揭晓时间（可多选）</p>
                    <div class="condition_item_content search_time">
                        <p><span class="search_big" style="display: none">1</span><span class="search_little"
                                                                                        style="display: none">0</span>一天以内
                        </p>
                        <p><span class="search_big" style="display: none">3</span><span class="search_little"
                                                                                        style="display: none">0</span>三天以内
                        </p>
                        <p><span class="search_big" style="display: none">7</span><span class="search_little"
                                                                                        style="display: none">0</span>七天以内
                        </p>
                        <p><span class="search_big" style="display: none">15</span><span class="search_little"
                                                                                         style="display: none">0</span>十五天以内
                        </p>
                    </div>
                    <input type="hidden" name="searchtimelow">
                    <input type="hidden" name="searchtimehigh">
                </div>
                <?php if($is_peanut ==1): ?>
                <div class="condition_item">
                    <p class="condition_item_title">商品价格（可多选）</p>
                    <div class="condition_item_content search_price">
                        <p><span class="search_big">10</span>花生以下 <span class="search_little"
                                                                        style="display: none">0</span></p>
                        <p><span class="search_little">10</span>-<span class="search_big">50</span>花生</p>
                        <p><span class="search_little">50</span>-<span class="search_big">200</span>花生</p>
                        <p><span class="search_little">200</span>-<span class="search_big">500</span>花生</p>
                        <p><span class="search_little">500</span>-<span class="search_big">1000</span>花生</p>
                        <p><span class="search_little">1000</span>花生以上 <span class="search_big" style="display: none">1000000000000000000000</span>
                        </p>
                        <!--<span>¥<span>10</span>-¥<span>50</span></span>-->
                        <!--<span>¥10-¥50</span>-->
                        <!--<span>¥200-¥500</span>-->
                        <!--<span>¥200-¥500</span>-->
                        <!--<span>¥1000以上</span>-->
                    </div>
                    <div class="input_in">
                        <input type="text" class="price_low" placeholder="最低价"><span
                            style="margin-left:0.3rem;margin-right: 0.3rem ">至</span> <input type="text"
                                                                                             class="price_high"
                                                                                             placeholder="最高价">
                    </div>
                </div>
                <?php else: ?>
                <div class="condition_item">
                    <p class="condition_item_title">商品价格（可多选）</p>
                    <div class="condition_item_content search_price">
                        <p>¥<span class="search_big">10</span>元以下 <span class="search_little"
                                                                        style="display: none">0</span></p>
                        <p>¥<span class="search_little">10</span>-¥<span class="search_big">50</span></p>
                        <p>¥<span class="search_little">50</span>-¥<span class="search_big">200</span></p>
                        <p>¥<span class="search_little">200</span>-¥<span class="search_big">500</span></p>
                        <p>¥<span class="search_little">500</span>-¥<span class="search_big">1000</span></p>
                        <p>¥<span class="search_little">1000</span>以上 <span class="search_big" style="display: none">1000000000000000000000</span>
                        </p>
                        <!--<span>¥<span>10</span>-¥<span>50</span></span>-->
                        <!--<span>¥10-¥50</span>-->
                        <!--<span>¥200-¥500</span>-->
                        <!--<span>¥200-¥500</span>-->
                        <!--<span>¥1000以上</span>-->
                    </div>
                    <div class="input_in">
                        <input type="text" class="price_low" placeholder="最低价"><span
                            style="margin-left:0.3rem;margin-right: 0.3rem ">至</span> <input type="text"
                                                                                             class="price_high"
                                                                                             placeholder="最高价">
                    </div>
                </div>
                <?php endif; ?>
                <div class="condition_item">
                    <p class="condition_item_title">成团人数（可多选）</p>
                    <div class="condition_item_content search_num">
                        <p><span class="search_big">10</span>人以下 <span class="search_little"
                                                                       style="display: none">0</span></p>
                        <p><span class="search_little">10</span>人-<span class="search_big">50</span>人</p>
                        <p><span class="search_little">50</span>人以上 <span class="search_big" style="display: none">100000000000000000000000000000</span>
                        </p>
                        <!--<span>10人以下</span>-->
                        <!--<span>30人-50人</span>-->
                        <!--<span>50人以上</span>-->

                    </div>
                    <div class="input_in">
                        <input type="text" class="people_low" placeholder="最低人数">至 <input type="text"
                                                                                          class="people_high"
                                                                                          placeholder="最高人数">
                    </div>
                </div>
            </div>


            <div class="btns">
                <div class="reset lf">重置</div>
                <?php if($is_peanut==1): ?>
                <div class="affrim lf" style="background: #FDD42F;color: black">确定筛选</div>
                <?php else: ?>
                <div class="affrim lf">确定筛选</div>
                <?php endif; ?>
            </div>

        </div>
        <div id="mescroll" class="mescroll">
            <!--展示上拉加载的数据列表-->
            <ul id="dataList" class="data-list clear">
                <!--<li class="content_item lf">-->
                <!--<img src="" alt="" class="info_img">-->
                <!--<div class="content_item_info">-->
                <!--<p class="content_info_name">iPhone XR 256G 深空灰色 双卡双待 全网通 限…</p>-->
                <!--<div class="progress clear">-->
                <!--<div class="progress_main lf">-->
                <!--<span style="width: 70%"></span>-->
                <!--</div>-->
                <!--<span class="progress_num lf">700%</span>-->
                <!--</div>-->
                <!--<div class="content_info_data">-->
                <!--<span class="info_price"><small>￥</small>1788.00</span>-->
                <!--<span class="join">100人参与</span>-->
                <!--</div>-->
                <!--</div>-->
                <!--</li>-->
            </ul>
        </div>


        <!--<div class="goods_list" style="display: none; background: #fff;">-->
        <!--<div class="goods_list_img">-->
        <!--<img src="__STATIC__/image/activity/icon_ss@2x@2x@2x.png" alt="" />-->
        <!--</div>-->
        <!--<p>吖吖没有找到您想要的商品</p>-->
        <!--<a href="/index/index/index"><div class="goods_list_btn">再去逛逛</div></a>-->
        <!--</div>-->

        <!--<div class="details_produce">-->
        <!--<div class="product_list_main goods_pro_main lst">-->
        <!--<ul class="product_list_content clear">-->

        <!--</ul>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <div class="recommend">
            <div class="recomend_title">
                <img src="__STATIC__/image/activity/icon_biaoti@2x (1).png" alt="">
            </div>
            <ul class="data-list">
                <li class="content_item lf">
                    <img src="" alt="" class="info_img">
                    <div class="content_item_info">
                        <p class="content_info_name">iPhone XR 256G 深空灰色 双卡双待 全网通 限…</p>
                        <div class="progress clear">
                            <div class="progress_main lf">
                                <span style="width: 70%"></span>
                            </div>
                            <span class="progress_num lf">700%</span>
                        </div>
                        <div class="content_info_data">
                            <span class="info_price"><small>￥</small>1788.00</span>
                            <span class="join">100人参与</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <?php if($is_peanut ==1): ?>
    <!--花生第一次进去遮罩-->
    <div class="is_first_peanut">
        <div class="i_know"></div>
    </div>
    <?php endif; if($is_peanut ==1): ?>
    <!--获得花生遮罩-->
    <div class="gain_peanut">
        <div class="gain_info">
            <div class="gain_num">
                <img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">
                5179.00
            </div>
            <!--<div class="gain_con">恭喜！该笔花生已到至您花生余额</div>-->
            <div class="gain_con">恭喜！有3笔花生已到账
                <img src="__STATIC__/image/activity/icon_jump@2x (1).png" alt="">
            </div>
            <div class="gain_info_data clear">
                <img src="" alt="" class="gain_info_pd_img lf">
                <div class="lf" style="width:46%;">
                    <p class="gain_info_name">Beats Beats Studio3 Wireless 3代 头戴式蓝牙无线降噪耳机 魅影灰</p>
                    <img src="" alt="" class="gain_info_other_img">
                    <span class="gain_span">TA已赠您</span>
                </div>

            </div>
            <p class="gain_tip">
                邀请的好友在花生堂首次成功团中后系统将自动赠与您好友团中商品的等额花生数
            </p>
        </div>
        <div class="close_gain">
            <img src="__STATIC__/image/activity/icon_x@2x.png" alt="">
        </div>
    </div>
    <?php endif; ?>


    <!--分享弹框-->
    <div class="continue_pop">
        <div class="continue_con">
            <div class="continue_con_top">
                <img src="__STATIC__/image/core/icon_yaoqingma@2x.png" alt="">
            </div>
            <div class="continue_con_code">
                <img src="" alt="">
            </div>
            <div class="bc-btn">长按保存二维码到本地</div>
            <div data-clipboard-text="" class="copy-btn">复制链接</div>
            <!-- <div class="continue_con_btn clear">
                <div>长按保存二维码到本地</div>
                <div class="rt">复制链接</div>
            </div> -->
            <!-- <div class="continue_con_list clear">
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
            </div> -->
        </div>
    </div>

</mian>
<?php if($is_peanut ==1): ?>
<!--花生堂底部按钮-->
<div class="peanut_share phonex">
    <div class="register peanut_share_item lf">
        <img src="__STATIC__/image/activity/icon_erweima@2x.png" alt="">
        邀请好友注册
    </div>

        <div class="peanut_inv peanut_share_item lf">
            邀请好友花生团
        </div>

</div>
<?php endif; ?>


<!--搜索头部-->
<div class="search_top">
    <?php if($is_peanut==1): ?>
    <div class="search_top_hearder" style="background: #FDD42F">
        <?php else: ?>
        <div class="search_top_hearder">
            <?php endif; ?>
            <div class="goback lf close_top">
                <?php if($is_peanut==1): ?>
                <img src="__STATIC__/image/activity/icon_back@2x (1).png" alt="">
                <?php else: ?>
                <img src="__STATIC__/image/activity/icon_back@2x.png" alt="">
                <?php endif; ?>
            </div>
            <div class="index_search lf">
                <img src="__STATIC__/image/activity/icon_sousuo@2x.png" alt="" class="lf"
                     style="margin-left: 0.3rem;margin-top: 0.18rem">
                <input type="text" placeholder="输入您想搜索的商品" autofocus class="search_input">
            </div>
            <?php if($is_peanut==1): ?>
            <span class="search_btn" style="color:#000000;font-weight: 600">搜索</span>
            <?php else: ?>
            <span class="search_btn">搜索</span>
            <?php endif; ?>
        </div>

        <div class="del_all rt" style="display: none">
            <img src="__STATIC__/image/activity/icon_del@2x.png" alt="">
        </div>
        <div class="search_top_content" style="display: none">
            <div class="search_top_item">
                <p class="search_top_title">历史搜索</p>
                <div class="search_item clear">
                    <a onClick="hclic(this)">
                        <div class="lf">iPhone X</div>
                    </a>
                    <a onClick="hclic(this)">
                        <div class="lf">Beats Beats Studio3</div>
                    </a>
                    <a onClick="hclic(this)">
                        <div class="lf">RGB背光键盘</div>
                    </a>
                    <a onClick="hclic(this)">
                        <div class="lf">刺绣条纹毛衣</div>
                    </a>


                </div>
            </div>
            <div class="search_top_item">
                <p class="search_top_title">火热参团中</p>
                <div class="search_item claer">
                    <a onClick="hclic(this)">
                        <div class="lf">外星人 Gsync 游戏本</div>
                    </a>
                    <a onClick="hclic(this)">
                        <div class="lf">简约电视柜</div>
                    </a>
                    <a onClick="hclic(this)">
                        <div class="lf">GENANX印花连帽卫衣</div>
                    </a>
                    <a onClick="hclic(this)">
                        <div class="lf">三星人工智能黑色手机</div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>



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
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script src="__STATIC__/js/clipboard.min.js"></script>
<script>
    // var mySwiper = new Swiper('.swiper-container1', {
    //     autoplay: 5000,//可选选项，自动滑动
    //     pagination : '.swiper-pagination',
    // })

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
    var isPeanut = "<?php echo $is_peanut; ?>";

    var mySwiper2 = new Swiper('.swiper-container2', {
        slidesPerView: 3.5,
        spaceBetween: 10,
    })
    var mySwiper3 = new Swiper('.swiper-container3', {
        slidesPerView: 3.3,
        spaceBetween: 10,
    })

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
                icon: "/static/image/activity/icon_ss@2x@2x@2x.png", //图标,默认null
                tip: "吖吖没有找到您想要的商品", //提示
                btntext: "再去逛逛", //按钮,默认""
                btnClick: function () {
                    //点击按钮的回调,默认null
                    window.location.href = "/index/index";
                },
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

    // 点击排序
    $('.top_item ').click(function () {
        $('.top_item ').removeClass('active');
        $(this).addClass('active')
        $(".shop_index_tab_default").show();
        $(".shop_index_filter").css({"display": "none"});
        $(this).find(".shop_index_tab_default").hide();
        $(this).find(".shop_index_filter").css({"display": "inline-block"});
        $(this).find('.shop_index_filter').find('img').toggleClass('shop_index_filter_img');
        if ($(this).index() == 0) {
            $('input[name="order"]').val($(this).attr('data'))

        }
        if ($(this).index() == 1 || $(this).index() == 2) {
            $('input[name="order"]').val($(this).find('.shop_index_filter_img').attr("data"));
        }
        if ($(this).index() == 3) {
            $('input[name="order"]').val('7')
        }
        if ($(this).index() != 3) {
            // $(".shop_index_tab_list").removeClass("shop_index_tab_bold");
            //重置列表数据
            mescroll.resetUpScroll();
            //隐藏回到顶部按钮
            mescroll.hideTopBtn();
        }
        // console.log($('input[name="order"]').val());
    })
    // 点击筛选
    $('.filtrate').click(function () {
        $('.top_item').removeClass('active')
        $(this).addClass('active');
        $('.search_condition').toggleClass('active_search_con');
        $(this).find('img').toggleClass('filtrate_img');
        $(".shop_index_tab_default").show();
        $(".shop_index_filter").hide();
        var windowTop = $('.group_content').offset().top;
        window.scrollTo(0, windowTop)
    })

    //点击揭晓时间里面的每个p
    $('.search_time p').click(function () {

        // console.log($(this));
        if (isPeanut == 1) {
            $('.search_time p').removeClass('peanut_in');
            $(this).addClass('peanut_in')
            $('input[name="searchtimelow"]').val($(this).find('.search_little').html());
            $('input[name="searchtimehigh"]').val($(this).find('.search_big').html())
        } else {
            $('.search_time p').removeClass('active_in');
            $(this).addClass('active_in')
            $('input[name="searchtimelow"]').val($(this).find('.search_little').html());
            $('input[name="searchtimehigh"]').val($(this).find('.search_big').html())
        }

        // console.log($('input[name="searchtimelow"]').val());
        // console.log($('input[name="searchtimehigh"]').val());
    })
    // 点击商品价格里面的每个p
    $('.search_price p').click(function () {
        // console.log($(this));
        if (isPeanut == 1) {
            $('.search_price p').removeClass('peanut_in')
            $(this).addClass('peanut_in')
            $('.price_low').val($(this).find('.search_little').html());
            $('.price_high').val($(this).find('.search_big').html())
        } else {
            $('.search_price p').removeClass('active_in')
            $(this).addClass('active_in')
            $('.price_low').val($(this).find('.search_little').html());
            $('.price_high').val($(this).find('.search_big').html())
        }

        // console.log($('.price_low').val());
        // console.log($('.price_high').val());
    })
    // 点击成团人数里面的每个p
    $('.search_num p').click(function () {
        // console.log($(this));
        if (isPeanut == 1) {
            $('.search_num p').removeClass('peanut_in')
            $(this).addClass('peanut_in')
            $('.people_low').val($(this).find('.search_little').html());
            $('.people_high').val($(this).find('.search_big').html())
        } else {
            $('.search_num p').removeClass('active_in')
            $(this).addClass('active_in')
            $('.people_low').val($(this).find('.search_little').html());
            $('.people_high').val($(this).find('.search_big').html())
        }

        // console.log($('.people_low').val());
        // console.log($('.people_high').val());
    })
    // 点击重置
    $('.reset').click(function () {
        $('.condition_item_content p').removeClass('active_in');
        $('input[name="searchtimelow"]').val('');
        $('input[name="searchtimehigh"]').val('');
        $('.price_low').val('');
        $('.price_high').val('');
        $('.people_low').val('');
        $('.people_high').val('');
    })
    // 点击确定筛选
    $('.affrim').click(function () {
        var mm = /(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/;

        if ($('.price_low').val() != '' && !mm.test($('.price_low').val())) {
            layer.msg('<span style="color:#fff;">您输入的最低价格式不正确</span>', {time: 2000});
            return false;
        }
        if ($('.price_high').val() != '' && !mm.test($('.price_high').val())) {
            layer.msg('<span style="color:#fff;">您输入的最高价格式不正确</span>', {time: 2000});
            return false;
        }
        if ($('.people_low').val() != '' && !mm.test($('.people_low').val())) {
            layer.msg('<span style="color:#fff;">您输入的最低成团人数格式不正确</span>', {time: 2000});
            return false;
        }
        if ($('.people_high').val() != '' && !mm.test($('.people_high').val())) {
            layer.msg('<span style="color:#fff;">您输入的最高成团人数格式不正确</span>', {time: 2000});
            return false;
        }
        $('.search_condition').hide();
    })
    // 点击清除所有图片
    $('.del_all').click(function () {
        layer.confirm('<p style="font-size:0.32rem;font-weight: 600;color: #000000">确定删除所有历史记录</p>', {
            title: '', /*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            btn: ['取消', '确定'], //可以无限个按钮
            btn2: function (index, layero) {

            }
        }, function (index, layero) {
            //按钮【按钮一】的回调
            layer.closeAll()
        });
        if (isPeanut == 1) {
            // console.log($('.layui-layer-btn a.layui-layer-btn1'));
            $('.layui-layer-btn a.layui-layer-btn1').addClass('is_peanut_clear')
        }
    })

    $('.close_top').click(function () {
        $('.search_top').hide()
    })

    $('.tosearch').click(function () {
        $('.search_top').show();
        //隐藏回到顶部按钮
        mescroll.hideTopBtn();
    })
    $('.goback1').click(function () {
        window.history.go(-1);
    })
    var keyWord = '';
    var code = '<?php echo $code; ?>';
    $('.search_btn').click(function () {
        // console.log($('.search_input').val());
        keyWord = $('.search_input').val();
        window.location.href = '/activity/index/search/code/' + code + '/keyword/' + keyWord;
        $('.search_input').val('')
    })

    //点击banner
    // $('.group_banner').click(function () {
    //     var windowTop = $('.group_content').offset().top;
    //     // console.log(windowTop);
    //     // $('.group_content').scrollTo(0)
    //     window.scrollTo(0, windowTop)
    // })

    function hclic(id) {
        var vo = $(id).children().html();
        keyWord = vo;
        // console.log(vo);
        window.location.href = '/activity/index/search/keyword/' + keyWord + '/code/' + code;
    }

    /*联网加载列表数据  page = {num:1, size:10}; num:当前页 从1开始, size:每页数据条数 */
    function getListData(page) {
        //联网加载数据
        getListDataFromNet(page.num, page.size, function (curPageData, total_num) {
            //方法二(推荐): 后台接口有返回列表的总数据量 totalSize
            //必传参数(当前页的数据个数, 总数据量)
            mescroll.endBySize(curPageData.length, total_num);

            //设置列表数据
            setListData(curPageData);
            if (isPeanut == 1) {
                // console.log($('.empty-btn'));
                $('.empty-btn').addClass('is_peanut')
            }
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
            var str = '<li class="content_item lf">';
            // str += ' <img src="' + pd.gp_img + '" alt="" class="info_img err_img">';
            str += '<div style="position: relative;width:3.34rem;height:3.34rem">'
            str += ' <img src="' + pd.g_s_img + '" alt="" class="info_img err_img">';
            if(isPeanut == 1){
                str += "<span class='is_peanut_sheng'>仅剩27人</span>"

            }
            str += '</div>'
            str += '<div class="content_item_info">';
            str += ' <p class="content_info_name">'
            if (isPeanut == 1) {
                str += '<img src="__STATIC__/image/activity/icon_danren@2x.png">'
            }
            str += pd.g_name;
            str += '</p>';
            str += '<div class="progress clear">';
            if (isPeanut == 1) {
                str += '<div class="progress_main lf" style="background: #FFF4D1">';
                str += '<span style="width: ' + pd.proportion + '%;background: #FFC60A"></span>';
                str += '</div>';
            } else {
                str += '<div class="progress_main lf">';
                str += '<span style="width: ' + pd.proportion + '%"></span>';
                str += '</div>';
            }

            str += ' <span class="progress_num lf">' + pd.proportion + '%</span>';
            str += '</div>'
            if (isPeanut == 1) {
                str += '<p class="peanut_item_data"><img src="__STATIC__/image/activity/icon_huasheng@2x.png" alt="">1788.00</p>'
            } else {
                str += '<div class="content_info_data clear">';
                str += '<span class="info_price lf"><small>￥</small>' + pd.gdr_price + '</span>';
                str += '<span class="join rt">' + pd.pai_num + '人参与</span>';
                str += '</div>';

            }
            str += '</div>';
            str += ' </li>';


            var liDom = document.createElement("a");
            liDom.setAttribute('href', '/member/goodsproduct/index/g_id/' + pd.g_id);
            liDom.innerHTML = str;
            listDom.appendChild(liDom);
            if(isPeanut == 1){
                $('.content_item_info').css('margin-top','0.8rem')
            }
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
                url: '/activity/index/get_activity_goods',
                data: {
                    page: pageNum,
                    page_size: pageSize,
                    keyword: keyWord,
                    code: 'act1543473374',
                    // code: code,
                    order_type: $('input[name="order"]').val()
                },
                dataType: 'json',
                success: function (data) {
                    // console.log(data);
                    // if (data.status == 8) {
                    var listData = [];
                    for (var i = 0; i < data.data.length; i++) {
                        listData.push(data.data[i]);
                    }
                    //回调
                    successCallback(listData, data.total_num);
                    // var recommend = $('.recommend');
                    // recommend.html('11')
                    // // console.log(recommend);
                    // $('.mescroll-upwarp').after(recommend)
                    // $('.recommend').show()
                    // }

                },
                error: errorCallback
            });
        }, 1000)
    }


    // 滚动时候逻辑
    var windowTop = $('.group_content').offset().top - 40;
    $(window).scroll(function () {
        var scrolls = $(this).scrollTop();//获取当前可视区域距离页面顶端的距离
        // console.log(scrolls);
        if (scrolls >= windowTop) {
            // windowTop=scrolls;
            //当B>A时，表示页面在向下滑动
            // console.log(11);

            $('.group_content_top').css({
                'position': 'fixed',
                "top": "0.88rem",
                "z-index": 5
            })

            $(".search_condition").css({"position": "fixed", "top": "1.76rem"});
            $('.mescroll').css('margin-top', '0.98rem')
        } else {
            // console.log(22);
            $('.group_content_top').css({
                "position": "relative",
                "top": "0",
                "z-index": 0
            })
            $(".search_condition").css({"position": "absolute", "top": "0.88rem"});

            $('.mescroll').css('margin-top', '0.1rem')
        }


    });

    $(window).scroll(function () {
        var scro = $(window).scrollTop();
        if (scro > 10) {
            $('.peanut_header .group_header').css('background', '#FDD42F')
        } else {
            $('.peanut_header .group_header').css('background', 'transparent')
        }
    })

    if (isPeanut == 1) {
        // $('.group_content').css('margin-bottom', '1rem')
        $('.is_first_peanut').css('height', $('.group_content').offset().top)
    }
    // 点击我知道啦
    $('.i_know').click(function () {
        $('.is_first_peanut').hide();
    })
    $('.close_gain').click(function(){
        $('.gain_peanut').hide()
    })

    //关闭app分享弹窗
    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })
    var share_qr_image = "https://"+ document.domain + "";
    // 点击邀请好友注册
    $('.register').click(function(){
        var data = '';
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
                    $(".continue_pop").css({display:"block"});
                }
            }else {
                $(".continue_pop").css({display:"block"});
            }
        }
    })

    $(".continue_pop").click(function(){
        $(".continue_pop").css({display:"none"});
    })

    $(".continue_con").click(function(e){
        e.stopPropagation();
    })
    function app(id) {
        var is_share_to_firend_circle = '';
        if(id == 0) {
            is_share_to_firend_circle = false;
        }else {
            is_share_to_firend_circle = true;
        }

        var data = '';
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
        var data = '';
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

    //复制功能
    var btns = document.querySelectorAll('.copy-btn');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });

    clipboard.on('error', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });
    // console.log($('.group_content').offset().top);
</script>

</html>