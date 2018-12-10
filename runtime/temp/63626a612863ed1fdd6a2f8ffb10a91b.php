<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\project\pai\public/../application/member/view/goodsproduct/index.html";i:1544430191;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1544154864;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/goodsproduct/swiper.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/productlist/product_list.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goodsproduct/details.css">
<link rel="stylesheet" type="text/css" href="__CSS__/stroe/index.css">

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
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
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
    <!-- 商品 S -->
    <div class="details_tab_line">
        <div class="details_tab_list details_display">
            <div class="details_tab clear">
                <?php if(!(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty()))): ?>
                    <a href="<?php echo $header_path; ?>">
                        <div class="details_tab_back lf">
                            <img src="__STATIC__/image/goods/icon_nav_back@2x.png" alt="图片加载失败">
                        </div>
                    </a>
                <?php else: ?>
                    <div class="details_tab_back lf back-btn">
                        <img src="__STATIC__/image/goods/icon_nav_back@2x.png" alt="图片加载失败">
                    </div>
                <?php endif; ?>
                <div class="details_tab_btn lf clear">
                    <div class="details_list_btn  lf">
                        <span class="details_list_bottom">商品</span>
                    </div>
                    <div class="details_list_btn lf">
                        <span>参团</span>
                    </div>
                    <div class="details_list_btn lf">
                        <span>详情</span>
                    </div>
                    <div class="details_list_btn lf">
                        <span>推荐</span>
                    </div>
                </div>
                <div class="details_top_rt rt">
                    <img src="__STATIC__/image/goodsproduct/icon_nav_fenxiang2@2x.png" alt="图片加载失败">
                </div>
            </div>
        </div>
        <div class="details_header_top">
            <?php if(!(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty()))): ?>
                <a href="<?php echo $header_path; ?>">
                    <div class="details_tab_back lf">
                        <img src="__STATIC__/image/goodsproduct/icon_nav_back@2x.png" alt="图片加载失败">
                    </div>
                </a>
            <?php else: ?>
                <div class="details_back lf details_fanhui back-btn">
                    <img src="__STATIC__/image/goodsproduct/icon_nav_back@2x.png">
                </div>
            <?php endif; ?>
            <div class="details_back lf details_cancelchan details_cancelcha">
                <img src="__STATIC__/image/details/icon_nav_X@2x.png">
            </div>
            <div class="details_top_rt rt">
                <img src="__STATIC__/image/goodsproduct/icon_nav_fenxiang@2x.png">
            </div>
        </div>
        <div class="swiper-container swiper-banner">
            <div class="swiper-wrapper">
                <?php if(empty($goods['img']) || (($goods['img'] instanceof \think\Collection || $goods['img'] instanceof \think\Paginator ) && $goods['img']->isEmpty())): ?>
                    <div class="swiper-slide">
                        <div class="details_pic">
                            <img class="details_img click_big" src="__STATIC__/image/index/pic_home_taplace@2x.png">
                        </div>
                    </div>
                <?php else: if(is_array($goods['img']) || $goods['img'] instanceof \think\Collection || $goods['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="swiper-slide">
                            <div class="details_pic">
                                <img class="details_img click_big" src="<?php echo $vo['gi_name']; ?>" i="<?php echo $key; ?>">
                            </div>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="big_banner">
            <div class="big_swiper-container swiper-banner">
                <div class="swiper-wrapper">
                    <?php if(empty($goods['img']) || (($goods['img'] instanceof \think\Collection || $goods['img'] instanceof \think\Paginator ) && $goods['img']->isEmpty())): ?>
                        <div class="swiper-slide">
                            <div class="details_pic">
                                <img class="details_img" src="__STATIC__/image/index/pic_home_taplace@2x.png">
                            </div>
                        </div>
                    <?php else: if(is_array($goods['img']) || $goods['img'] instanceof \think\Collection || $goods['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <div class="swiper-slide">
                                <div class="details_pic">
                                    <img class="details_img" src="<?php echo $vo['gi_name']; ?>">
                                </div>
                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="details_back rt details_cancelchan" style="margin-left: 90%">
                <img src="__STATIC__/image/details/icon_nav_X@2x.png">
            </div>
        </div>

        <!-- 商品状态 g_state  2审核中  4审核未通过  8 9 0 已结束 6 出售中-->
        <!--倒计时大部分 play_type 1:以前的所有  2:超值团购 3:花生-->
        <?php if(($goods['play_type'] == 1)): if(($goods['g_state'] == 2)): ?>
                <!--<div>审核中</div>-->
                <div class="details_status_shenhezhong">
                    该商品正在审核中
                </div>
                <div class="details_data clear">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                            <!-- 加判断 -->

                            <?php if($is_lord ==1): else: ?>
                            <span class="details_hint">满额揭晓</span>
                            <?php endif; ?>
                        </p>
                        <p class="details_new">
                            <span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                            <?php echo $goods['min']; else: ?>
                            <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                </div>
            <?php elseif(($goods['g_state'] == 4)): ?>
                <!--<div>审核未通过</div>-->
                <div class="details_status_weitongguo">
                    <?php echo $goods['g_des']; ?>
                </div>
                <div class="details_data clear">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价<span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                            <?php if($is_lord ==1): else: ?>
                                <span class="details_hint">满额揭晓</span>
                            <?php endif; ?>
                        </p>
                        <p class="details_new"><span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                </div>
            <?php elseif((($goods['g_state'] == 8) || ($goods['g_state'] == 9) || ($goods['gp_stock'] == 0))): ?>
                <!--<div>已结束</div>-->
                <!-- <div class="details_status_shenhezhong">
                    已结束
                </div> -->
                <div class="details_data detail_back clear">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span> 
                            <?php if($is_lord ==1): else: ?>
                                <span class="details_hint">满额揭晓</span>
                            <?php endif; ?>
                        </p>
                        <p class="details_new"><span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                    <div class="details_rt rt">
                        <span class="yjs">已结束</span>
                    </div>
                </div>
            <?php elseif(($goods['g_state'] == 6)): ?>
                <!--出售中-->
                <div class="details_status_yitongguo">
                    <div class="details_status_yitongguo_time" id="date1">
                        商品已通过审核
                        <span class="details_status_yitongguo_show details_day"></span>
                        <span class="details_status_yitongguo_show details_hour"></span>
                        时
                        <span class="details_status_yitongguo_show details_minute"></span>
                        分
                        <span class="details_status_yitongguo_show details_second"></span>
                        秒
                        后开始
                    </div>
                </div>
                <!-- gp_state:1,已上架 2,预上架，3.已结束 -->
                <?php if($goods['is_fudai']==1): ?>
                    <div class="details_data <?php if(($goods['g_endtime'] - $time<0)): ?> detail_back <?php else: ?> details_data_fudai <?php endif; ?> clear">
                <?php else: ?>
                    <div class="details_data <?php if(($goods['g_endtime'] - $time<0)): ?> detail_back <?php endif; ?> clear">
                <?php endif; ?>
                        <div class="details_lf lf">
                            <p class="details_lf_top">市场价
                                <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                                <?php if($is_lord ==1): else: ?>
                                    <span class="details_hint">满额揭晓</span>
                                <?php endif; ?>
                            </p>
                            <p class="details_new"><span>￥</span>
                                <?php if($goods['min'] == $goods['max']): ?>
                                    <?php echo $goods['min']; else: ?>
                                    <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                            </p>
                        </div>
                        <div class="details_rt rt">
                            <?php if($goods['is_fudai']==1): if($goods['gp_state']==1): ?>
                                    <p class="details_hint_text">距离结束时间还剩</p>
                                    <div class="details_time" id="first">
                                        <span class="details_show_fudai details_day"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show_fudai details_hour"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show_fudai details_minute"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show_fudai details_second"></span>
                                    </div>
                                <?php elseif($goods['gp_state']==2): ?>
                                    <p class="details_hint_text">即将开始</p>
                                    <span style="color:#fff;font-size: 0.24rem;margin-top: 0.1rem;display: block;">第<?php echo $goods['sort']-1; ?>袋结束后立即开始</span>
                                <?php else: ?>
                                    <span class="yjs">已结束</span>
                                <?php endif; else: if($goods['g_endtime'] - $time<0): ?>
                                    <span class="yjs">已结束</span>
                                <?php else: ?>
                                    <p class="details_hint_text">距离结束时间还剩</p>
                                    <div class="details_time" id="first">
                                        <span class="details_show details_day"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show details_hour"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show details_minute"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show details_second"></span>
                                    </div>
                                <?php endif; endif; ?>
                        </div>
                    </div>
            <?php endif; elseif(($goods['play_type'] == 2)): if(($goods['g_state'] == 2)): ?><!--状态-->
                <!--<div>审核中</div>-->
                <div class="details_status_shenhezhong">
                    该商品正在审核中
                </div>
                <div class="details_data clear"
                    style="background-image:linear-gradient(90deg,rgba(241,57,65,1),rgba(252,68,107,1)); ">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                        </p>
                        <p class="details_new">
                            <span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                </div>
            <?php elseif(($goods['g_state'] == 4)): ?>
                <!--<div>审核未通过</div>-->
                <div class="details_status_weitongguo">
                    <!--<?php echo $goods['g_des']; ?>-->
                    <!--审核未通过-->
                </div>
                <div class="details_data clear" style="background-image:linear-gradient(90deg,rgba(241,57,65,1),rgba(252,68,107,1)); ">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                        </p>
                        <p class="details_new">
                            <span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                </div>
            <?php elseif((($goods['g_state'] == 8) || ($goods['g_state'] == 9) || ($goods['gp_stock'] == 0 || ($goods['g_endtime'] < $time)))): ?>
                <!--<div>已结束</div>-->
                <!-- <div class="details_status_shenhezhong">
                    已结束
                </div> -->
                <div class="details_data detail_back clear"
                    style="background-image:linear-gradient(90deg, #2B2B2B 0%, #555555 100%), linear-gradient(#2B2B2B, #2B2B2B); ">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span> 
                        </p>
                        <p class="details_new">
                            <span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                    <div class="details_rt rt">
                        <span class="yjs">已结束</span>
                    </div>
                </div>
            <?php elseif(($goods['g_state'] == 6)): ?>
                <!--出售中-->
                <div class="details_status_yitongguo">
                    <div class="details_status_yitongguo_time" id="date1">
                        商品已通过审核
                        <span class="details_status_yitongguo_show details_day"></span>
                        <span class="details_status_yitongguo_show details_hour"></span>
                        时
                        <span class="details_status_yitongguo_show details_minute"></span>
                        分
                        <span class="details_status_yitongguo_show details_second"></span>
                        秒
                        后开始
                    </div>
                </div>
                <div class="details_data clear" style="background-image:linear-gradient(90deg,rgba(241,57,65,1),rgba(252,68,107,1)); ">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                        </p>
                        <p class="details_new">
                            <span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                    <div class="details_rt rt">
                        <p class="details_hint_text">距离结束时间还剩</p>
                        <div class="details_time" id="first" >
                            <span class="details_show_fudai details_day" style="color: #FF235F"></span>
                            <span class="details_fenhao">:</span>
                            <span class="details_show_fudai details_hour" style="color: #FF235F"></span>
                            <span class="details_fenhao">:</span>
                            <span class="details_show_fudai details_minute" style="color: #FF235F"></span>
                            <span class="details_fenhao">:</span>
                            <span class="details_show_fudai details_second" style="color: #FF235F"></span>
                        </div>
                    </div>
                </div>
            <?php endif; elseif(($goods['play_type'] == 3)): if(($goods['g_state'] == 2)): ?>
                <!--<div>审核中</div>-->
                <div class="details_status_shenhezhong">
                    该商品正在审核中
                </div>
                <div class="details_data clear">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                            <!-- 加判断 -->
                            <?php if($is_lord ==1): else: ?>
                                <span class="details_hint">满额揭晓</span>
                            <?php endif; ?>
                        </p>
                        <p class="details_new">
                            <span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                </div>
            <?php elseif(($goods['g_state'] == 4)): ?>
                <!--<div>审核未通过</div>-->
                <div class="details_status_weitongguo">
                    <?php echo $goods['g_des']; ?>
                </div>
                <div class="details_data clear">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                            <?php if($is_lord ==1): else: ?>
                                <span class="details_hint">满额揭晓</span>
                            <?php endif; ?>
                        </p>
                        <p class="details_new">
                            <span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                </div>
            <?php elseif((($goods['g_state'] == 8) || ($goods['g_state'] == 9) || ($goods['gp_stock'] == 0))): ?>
                <!--<div>已结束</div>-->
                <!-- <div class="details_status_shenhezhong">
                    已结束
                </div> -->
                <div class="details_data detail_back clear">
                    <div class="details_lf lf">
                        <p class="details_lf_top">市场价
                            <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                            <?php if($is_lord ==1): else: ?>
                                <span class="details_hint">满额揭晓</span>
                            <?php endif; ?>
                        </p>
                        <p class="details_new">
                            <span>￥</span>
                            <?php if($goods['min'] == $goods['max']): ?>
                                <?php echo $goods['min']; else: ?>
                                <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                        </p>
                    </div>
                    <div class="details_rt rt">
                        <span class="yjs">已结束</span>
                    </div>
                </div>
            <?php elseif(($goods['g_state'] == 6)): ?>
                <!--出售中-->
                <div class="details_status_yitongguo">
                    <div class="details_status_yitongguo_time" id="date1">
                        商品已通过审核
                        <span class="details_status_yitongguo_show details_day"></span>
                        <span class="details_status_yitongguo_show details_hour"></span>
                        时
                        <span class="details_status_yitongguo_show details_minute"></span>
                        分
                        <span class="details_status_yitongguo_show details_second"></span>
                        秒后开始
                    </div>
                </div>
                <!-- gp_state:1,已上架 2,预上架，3.已结束 -->
                <?php if($goods['is_fudai']==1): ?>
                    <div class="details_data <?php if(($goods['g_endtime'] - $time<0)): ?> detail_back <?php else: ?> details_data_fudai <?php endif; ?> clear">
                <?php else: ?>
                    <div class="details_data details_data_huasheng <?php if(($goods['g_endtime'] - $time<0)): ?> detail_back <?php endif; ?> clear">
                <?php endif; ?>
                        <div class="details_lf lf details_huasheng">
                            <p class="details_lf_top">市场价
                                <span class="details_old">￥<?php echo $goods['gp_market_price']; ?></span>
                                <?php if($is_lord ==1): else: ?>
                                    <span class="details_hint">满额揭晓</span>
                                <?php endif; ?>
                            </p>
                            <p class="details_new">
                                <?php if($goods['min'] == $goods['max']): ?>
                                    <?php echo $goods['min']; else: ?>
                                    <?php echo $goods['min']; ?>~<?php echo $goods['max']; endif; ?>
                                <span>花生</span> 
                            </p>
                        </div>
                        <div class="details_rt rt details_huasheng_text">
                            <?php if($goods['is_fudai']==1): if($goods['gp_state']==1): ?>
                                    <p class="details_hint_text">距离结束时间还剩</p>
                                    <div class="details_time" id="first">
                                        <span class="details_show_fudai details_day"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show_fudai details_hour"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show_fudai details_minute"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show_fudai details_second"></span>
                                    </div>
                                <?php elseif($goods['gp_state']==2): ?>
                                    <p class="details_hint_text">即将开始</p>
                                    <span style="color:#fff;font-size: 0.24rem;margin-top: 0.1rem;display: block;">第<?php echo $goods['sort']-1; ?>袋结束后立即开始</span>
                                <?php else: ?>
                                    <span class="yjs">已结束</span>
                                <?php endif; else: if($goods['g_endtime'] - $time<0): ?>
                                    <span class="yjs">已结束</span>
                                <?php else: ?>
                                    <p class="details_hint_text">距离结束时间还剩</p>
                                    <div class="details_time" id="first">
                                        <span class="details_show details_day"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show details_hour"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show details_minute"></span>
                                        <span class="details_fenhao">:</span>
                                        <span class="details_show details_second"></span>
                                    </div>
                                <?php endif; endif; ?>
                        </div>
                    </div>
            <?php endif; endif; ?>
            <!--福袋规则判断-->
        <?php if(($goods['play_type'] == 1)): if($goods['is_fudai']==1): ?>
                <a href="/member/goodsproduct/fudai_rule">
                    <div class="details_rule details_fudai clear">
                        <span class="lf">吖吖超值福袋规则 了解一下~</span>
                        <span class="rt">
                            查看规则
                            <img src="__STATIC__/image/details/icon_jump@2x.png">
                        </span>
                    </div>
                </a>
            <?php else: ?>
                <a href="/member/goodsproduct/rule">
                    <div class="details_rule clear">
                        <?php if($is_lord ==1): ?>
                        <span class="lf">吖吖活动规则 了解一下~</span>
                        <?php else: ?>
                        <span class="lf">吖吖活动规则 了解一下~</span>
                        <?php endif; ?>
                        <span class="rt">
                            查看规则
                            <img src="__STATIC__/image/details/icon_jump@2x.png">
                        </span>
                    </div>
                </a>
            <?php endif; elseif(($goods['play_type'] == 2)): ?>
            <a href="/member/goodsproduct/chaozhi_rule">
                <div class="details_rule details_fudai clear">
                    <span class="lf">吖吖超值团购规则 了解一下~</span>
                    <span class="rt">
                        查看规则
                        <img src="__STATIC__/image/details/icon_jump@2x.png">
                    </span>
                </div>
            </a>
        <?php elseif(($goods['play_type'] == 3)): ?>
            <a href="/activity/index/peanut_rule">
                <div class="details_rule details_huashengcolor clear">
                    <span class="lf">拍吖吖花生堂规则 了解一下~</span>
                    <span class="rt">
                        查看规则
                        <img src="__STATIC__/image/details/icon_jump2@2x.png">
                    </span>
                </div>
            </a>
        <?php endif; ?>

        <!--商品判断-->
        <?php if(($goods['play_type'] == 1)): ?>
            <div class="details_top clear">
                <a href="/member/goodsproduct/comment_list/gp_id/<?php echo $goods['gp_id']; ?>">
                    <div class="yg-num">
                        <?php if(($goods['g_state'] == 6) OR ($goods['g_state'] == 8) OR ($goods['g_state'] == 9)): ?>
                            <?php echo isset($nransaction_num) ? $nransaction_num :  0; else: ?>
                            0
                        <?php endif; ?>
                        <br>
                        <?php if($goods['is_fudai']==1): ?>
                            <span>大福袋</span>
                        <?php elseif($goods['is_huodong']==1): ?>
                            <span>购中者</span>
                        <?php else: ?>
                            <span>已购者</span>
                        <?php endif; ?>
                    </div>
                </a>
                <?php if($goods['is_fudai']==1): ?>
                    <div class="details_top_lf clear">
                        <p><img src="__STATIC__/image/goodsproduct/icon_chaozhigou@2x.png" alt=""
                                style="margin-right:0.1rem;width:0.8rem;height:0.3rem;margin-top:0.08rem;float: left;"><?php echo $goods['g_name']; ?>
                        </p>
                        <span><?php echo $goods['g_secondname']; ?></span>
                    </div>
                <?php elseif($goods['is_huodong']==1): ?>
                    <div class="details_top_lf clear">
                        <p><img src="__STATIC__/image/goodsproduct/Icon_11biaoshi@2x.png" alt=""
                                style="margin-right:0.1rem;width:0.8rem;height:0.3rem;margin-top:0.08rem;float: left;"><?php echo $goods['g_name']; ?>
                        </p>
                        <span><?php echo $goods['g_secondname']; ?></span>
                    </div>
                <?php elseif($goods['gp_condition']==1): ?>
                <div class="details_top_lf clear">
                    <p><img src="__STATIC__/image/goodsproduct/icon_xrsd@2x.png" alt=""
                            style="margin-right:0.1rem;width:0.92rem;height:0.3rem;margin-top:0.08rem;float: left;"><?php echo $goods['g_name']; ?>
                    </p>
                    <span><?php echo $goods['g_secondname']; ?></span>
                </div>
                <?php else: ?>
                    <div class="details_top_lf">
                        <p><?php echo $goods['g_name']; ?></p>
                        <span><?php echo $goods['g_secondname']; ?></span>
                    </div>
                <?php endif; if(($goods['g_typeid'] == 1 or $goods['g_typeid'] == 0)): elseif(($goods['g_typeid'] == 2)): ?>
                    <div class="details_xuni">
                        <!-- <p><span>虚拟商品</span>具体领取方式将在线发送给您</p> -->
                        <p><img src="__STATIC__/image/goodsproduct/icon_xuni@2x.png" alt="">具体领取方式将在线发送给您</p>
                    </div>
                <?php elseif(($goods['g_typeid'] == 3)): ?>
                    <div class="details_dazong">
                        <p><img src="__STATIC__/image/goodsproduct/icon_xianzia@2x.png" alt="">该商品为线下指定地点领取</p>
                    </div>
                <?php endif; ?>
                <div class="details_top_hint clear">
                    <p class="lf">快递:<span><?php echo isset($goods['g_express']) ? $goods['g_express'] :  '免邮费'; ?></span></p>
                    <p class="lf details_center" style="text-align: center;">库存
                        <span>
                            <?php if(($goods['g_state'] == 6) OR ($goods['g_state'] == 8) OR ($goods['g_state'] == 9)): ?>
                                <?php echo isset($goods['gp_stock']) ? $goods['gp_stock'] :  0; else: ?>
                                0
                            <?php endif; ?>
                        </span>件
                    </p>
                    <p><?php echo isset($goods['address']) ? $goods['address'] :  ''; ?></p>
                </div>
            </div>
        <?php elseif(($goods['play_type'] == 2)): ?>
            <div class="details_top clear">
                <a href="/member/goodsproduct/comment_list/gp_id/<?php echo $goods['gp_id']; ?>">
                    <div class="yg-num">
                        <?php if(($goods['g_state'] == 6) OR ($goods['g_state'] == 8) OR ($goods['g_state'] == 9)): ?>
                            <?php echo isset($nransaction_num) ? $nransaction_num :  0; else: ?>
                            0
                        <?php endif; ?>
                        <br>
                        <span>已购者</span>
                    </div>
                </a>
                <div class="details_top_lf clear">
                    <p><img src="__STATIC__/image/goodsproduct/icon_hsbq@2x.png" alt=""
                            style="margin-right:0.1rem;width:0.92rem;height:0.3rem;margin-top:0.08rem;float: left;"><?php echo $goods['g_name']; ?>
                    </p>
                    <span><?php echo $goods['g_secondname']; ?></span>
                </div>

                <?php if(($goods['g_typeid'] == 1 or $goods['g_typeid'] == 0)): elseif(($goods['g_typeid'] == 2)): ?>
                    <div class="details_xuni">
                        <!-- <p><span>虚拟商品</span>具体领取方式将在线发送给您</p> -->
                        <p><img src="__STATIC__/image/goodsproduct/icon_xuni@2x.png" alt="">具体领取方式将在线发送给您</p>
                    </div>
                <?php elseif(($goods['g_typeid'] == 3)): ?>
                    <div class="details_dazong">
                        <p><img src="__STATIC__/image/goodsproduct/icon_xianzia@2x.png" alt="">该商品为线下指定地点领取</p>
                    </div>
                <?php endif; ?>
                <div class="details_top_hint clear">
                    <p class="lf">快递:<span><?php echo isset($goods['g_express']) ? $goods['g_express'] :  '免邮费'; ?></span></p>
                    <p class="lf details_center" style="text-align: center;">库存
                        <span>
                            <?php if(($goods['g_state'] == 6) OR ($goods['g_state'] == 8) OR ($goods['g_state'] == 9)): ?>
                                <?php echo isset($goods['gp_stock']) ? $goods['gp_stock'] :  0; else: ?>
                                0
                            <?php endif; ?>
                        </span>件
                    </p>
                    <p><?php echo isset($goods['address']) ? $goods['address'] :  ''; ?></p>
                </div>
            </div>
        <?php elseif(($goods['play_type'] == 3)): ?>
            <div class="details_top clear">
                <a href="/member/goodsproduct/comment_list/gp_id/<?php echo $goods['gp_id']; ?>">
                    <div class="yg-num">
                        <?php if(($goods['g_state'] == 6) OR ($goods['g_state'] == 8) OR ($goods['g_state'] == 9)): ?>
                            <?php echo isset($nransaction_num) ? $nransaction_num :  0; else: ?>
                            0
                        <?php endif; ?>
                        <br>
                        <span>已购者</span>
                    </div>
                </a>
                <div class="details_top_lf clear">
                    <p>
                        <img src="__STATIC__/image/goodsproduct/icon_hsbq2@2x.png" alt="" style="margin-right:0.1rem;width:0.62rem;height:0.3rem;margin-top:0.08rem;float: left;"><?php echo $goods['g_name']; ?>
                    </p>
                    <span><?php echo $goods['g_secondname']; ?></span>
                </div>

                <?php if(($goods['g_typeid'] == 1 or $goods['g_typeid'] == 0)): elseif(($goods['g_typeid'] == 2)): ?>
                    <div class="details_xuni">
                        <!-- <p><span>虚拟商品</span>具体领取方式将在线发送给您</p> -->
                        <p><img src="__STATIC__/image/goodsproduct/icon_xuni@2x.png" alt="">具体领取方式将在线发送给您</p>
                    </div>
                <?php elseif(($goods['g_typeid'] == 3)): ?>
                    <div class="details_dazong">
                        <p><img src="__STATIC__/image/goodsproduct/icon_xianzia@2x.png" alt="">该商品为线下指定地点领取</p>
                    </div>
                <?php endif; ?>
                <div class="details_top_hint clear">
                    <p class="lf">快递:<span><?php echo isset($goods['g_express']) ? $goods['g_express'] :  '免邮费'; ?></span></p>
                    <p class="lf details_center" style="text-align: center;">库存
                        <span>
                            <?php if(($goods['g_state'] == 6) OR ($goods['g_state'] == 8) OR ($goods['g_state'] == 9)): ?>
                                <?php echo isset($goods['gp_stock']) ? $goods['gp_stock'] :  0; else: ?>
                                0
                            <?php endif; ?>
                        </span>件
                    </p>
                    <p><?php echo isset($goods['address']) ? $goods['address'] :  ''; ?></p>
                </div>
            </div>
        <?php endif; ?>
        </div>
        <!-- 商品 E -->
        <!--参团上面的图片-->
        <?php if(($goods['play_type'] == 1)): if($goods['is_fudai']==1): ?>
                <div style="width:7.5rem;height:0.6rem;overflow: hidden;">
                    <img src="__STATIC__/image/goodsproduct/pic_bnert@2x.png" alt="" style="width:100%;height:100%;">
                </div>
             <?php elseif($goods['gp_condition']==1): ?>
                        <div style="width:7.5rem;height:0.6rem;overflow: hidden;">
                            <img src="__STATIC__/image/goodsproduct/pic_banner_xrsd@2x.png" alt="" style="width:100%;height:100%;">
                        </div>
            <?php else: endif; elseif(($goods['play_type'] == 2)): ?>
            <div style="width:7.5rem;height:0.8rem;overflow: hidden;">
                <img src="__STATIC__/image/goodsproduct/pic_banner@2x.png" alt="" style="width:100%;height:100%;">
            </div>
        <?php elseif(($goods['play_type'] == 3)): if(($is_one_tuan==1)): ?>
                <div style="width:7.5rem;height:0.88rem;overflow: hidden;">
                    <img src="__STATIC__/image/goodsproduct/pci_yirentuan@2x.png" alt="" style="width:100%;height:100%;">
                </div>
            <?php else: endif; endif; ?>
        <!-- 参团 -->
        <div class="details_tab_line">
            <?php if(in_array(($goods['g_state']), explode(',',"6,8,9"))): ?>
            <div class="details_tit_view">
                <div class="details_tit_top clear">
                    <?php if(empty($member) || (($member instanceof \think\Collection || $member instanceof \think\Paginator ) && $member->isEmpty())): ?>
                    <p class="lf">快去成为第一个参团人吧</p>
                    <?php else: if(is_array($member) || $member instanceof \think\Collection || $member instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($member) ? array_slice($member,0,4, true) : $member->slice(0,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="details_imgs lf">
                        <img alt="" src="<?php echo (isset($vo['m_s_avatar']) && ($vo['m_s_avatar'] !== '')?$vo['m_s_avatar']:'__STATIC__/image/myhome/TIM20180731142117.jpg'); ?>"
                             class="details_errimg">
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <p class="lf">等共<span><?php echo $total_people; ?></span>人次已参与团购</p>
                    <?php endif; ?>
                    <div class="details_cantuan_all rt">
                <span>
                        查看全部
                <img src="__STATIC__/image/details/right.png">
                </span>
                    </div>
                    <!-- <span style="font-weight:600; color: #333333;font-size: 0.24rem;float: right;margin-top: 0.1rem;">查看全部></span> -->
                </div>
            </div>
            <?php if(is_array($gdr_list) || $gdr_list instanceof \think\Collection || $gdr_list instanceof \think\Paginator): $i = 0; $__LIST__ = $gdr_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <!--参团进度-->
                <?php if(($goods['play_type'] == 1)): ?>
                    <div class="details_schedule_stirp clear">
                        <div class="details_carousel">
                            <div class="details_schedule_top clear">
                                <div class="details_schedule_img lf">
                                    <img class="gdt_img1" src="__CDN_PATH__<?php echo isset($vo['gdt_img']) ? $vo['gdt_img'] :  ''; ?>">
                                </div>
                                <div class="details_schedule_center lf">
                                    <p class="lf">已参与<span class="details_schedule_yew"><?php echo isset($vo['gp_num']) ? $vo['gp_num'] :  0; ?></span>人次</p>

                                    <p class="rt">剩余<span class="details_schedule_yew"><?php if(empty($vo['gp_num']) || (($vo['gp_num'] instanceof \think\Collection || $vo['gp_num'] instanceof \think\Paginator ) && $vo['gp_num']->isEmpty())): ?><?php echo $vo['gdr_membernum']; else: ?><?php echo $vo['gdr_membernum'] - $vo['gp_num']; endif; ?></span>人次
                                    </p>

                                    <div class="details_schedule_gray lf">
                                        <div class="details_schedule_red"></div>
                                    </div>
                                    <span class="details_schedule_per a b<?php echo $key; ?>"><?php echo $vo['proportion']; ?>%</span>
                                </div>
                                <?php if($goods['is_fudai']==1): if($goods['gp_state']==1 && $goods['g_starttime'] <= $time && $goods['g_endtime'] > $time): ?>
                                <div class="details_schedule_right_btn rt" gdr_id="<?php echo $vo['gdr_id']; ?>">
                                    参团
                                </div>
                                <?php else: ?>
                                <div class="details_schedule_right_btn rt" style="background:#E2E2E2 ;color:#aaaaaa;"
                                    gdr_id="<?php echo $vo['gdr_id']; ?>" disabled="disabled">
                                    参团
                                </div>
                                <?php endif; else: if(($goods['g_endtime'] - $time<0) || ($goods['g_starttime']> $time)): ?>
                                <div class="details_schedule_right_btn rt" style="background:#E2E2E2 ;color:#aaaaaa;"
                                    gdr_id="<?php echo $vo['gdr_id']; ?>" disabled="disabled">
                                    参团
                                </div>
                                <?php else: if(($goods['gp_stock']>0)): ?>
                                <div class="details_schedule_right_btn rt" gdr_id="<?php echo $vo['gdr_id']; ?>">
                                    参团
                                </div>
                                <?php else: ?>
                                <div class="details_schedule_right_btn rt" style="background:#E2E2E2 ;color:#aaaaaa;"
                                    gdr_id="<?php echo $vo['gdr_id']; ?>" disabled="disabled">
                                    参团
                                </div>
                                <?php endif; endif; endif; ?>
                            </div>
                            <div class="details_schedule_bottom clear">
                                <?php if($vo['member_num'] < 1): ?>
                                <p class="goodsp_span">快去成为第一个参团的人吧~</p>
                                <?php elseif($vo['member_num'] < 2 AND $vo['member_num'] > 0): if(is_array($vo['member']) || $vo['member'] instanceof \think\Collection || $vo['member'] instanceof \think\Paginator): $key = 0; $__LIST__ = $vo['member'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($key % 2 );++$key;?>
                                <div class="details_ul_list">
                                    <div class="details_schedule_name_pic lf">
                                        <img alt=""
                                            src="<?php echo (isset($voo['m_s_avatar']) && ($voo['m_s_avatar'] !== '')?$voo['m_s_avatar']:'__STATIC__/image/myhome/TIM20180731142117.jpg'); ?>"
                                            class="details_errimg">
                                    </div>
                                    <p class="lf"><?php echo isset($voo['s_name']) ? $voo['s_name'] :  ''; ?> <span>已参团</span></p>
                                    <?php if(!(empty($voo['o_addtime']) || (($voo['o_addtime'] instanceof \think\Collection || $voo['o_addtime'] instanceof \think\Paginator ) && $voo['o_addtime']->isEmpty()))): ?>
                                    <span class="rt"><?php echo date('Y-m-d H:i',$voo['o_addtime']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                                <div class="details_ul">
                                    <?php if(is_array($vo['member']) || $vo['member'] instanceof \think\Collection || $vo['member'] instanceof \think\Paginator): $key = 0; $__LIST__ = $vo['member'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($key % 2 );++$key;?>
                                    <div class="details_ul_list">
                                        <div class="details_schedule_name_pic lf">
                                            <img alt=""
                                                src="<?php echo (isset($voo['m_s_avatar']) && ($voo['m_s_avatar'] !== '')?$voo['m_s_avatar']:'__STATIC__/image/myhome/TIM20180731142117.jpg'); ?>"
                                                class="details_errimg">
                                        </div>
                                        <p class="lf"><?php echo isset($voo['s_name']) ? $voo['s_name'] :  ''; ?> <span>已参团</span></p>
                                        <span class="rt"><?php echo date('Y-m-d H:i',$voo['o_addtime']); ?></span>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php elseif(($goods['play_type'] == 2)): ?>
                    <div class="details_schedule_stirp clear">
                        <div class="details_carousel">
                            <div class="details_schedule_top clear">
                                <div class="details_schedule_center lf" style="width:6.6rem">
                                    <p class="lf">已参与<span class="details_schedule_yew"><?php echo isset($vo['gp_num']) ? $vo['gp_num'] :  0; ?></span>人次</p>

                                    <p class="rt">剩余<span class="details_schedule_yew"><?php if(empty($vo['gp_num']) || (($vo['gp_num'] instanceof \think\Collection || $vo['gp_num'] instanceof \think\Paginator ) && $vo['gp_num']->isEmpty())): ?><?php echo $vo['gdr_membernum']; else: ?><?php echo $vo['gdr_membernum'] - $vo['gp_num']; endif; ?></span>人次
                                    </p>

                                    <div class="details_schedule_gray lf" style="width:6.6rem;background-color: #FFC7C7">
                                        <div class="details_schedule_red" style="background-color:#FF2B2C ;background-image: none"></div>
                                    </div>
                                    <span class="details_schedule_per a b<?php echo $key; ?>" style="display: none"><?php echo $vo['proportion']; ?>%</span>
                                </div>
                            </div>
                            <div class="details_schedule_bottom clear">
                                <?php if($vo['member_num'] < 1): ?>
                                <p class="goodsp_span">快去成为第一个参团的人吧~</p>
                                <?php elseif($vo['member_num'] < 2 AND $vo['member_num'] > 0): if(is_array($vo['member']) || $vo['member'] instanceof \think\Collection || $vo['member'] instanceof \think\Paginator): $key = 0; $__LIST__ = $vo['member'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($key % 2 );++$key;?>
                                <div class="details_ul_list">
                                    <div class="details_schedule_name_pic lf">
                                        <img alt=""
                                            src="<?php echo (isset($voo['m_s_avatar']) && ($voo['m_s_avatar'] !== '')?$voo['m_s_avatar']:'__STATIC__/image/myhome/TIM20180731142117.jpg'); ?>"
                                            class="details_errimg">
                                    </div>
                                    <p class="lf"><?php echo isset($voo['s_name']) ? $voo['s_name'] :  ''; ?> <span>已参团</span></p>
                                    <?php if(!(empty($voo['o_addtime']) || (($voo['o_addtime'] instanceof \think\Collection || $voo['o_addtime'] instanceof \think\Paginator ) && $voo['o_addtime']->isEmpty()))): ?>
                                    <span class="rt"><?php echo date('Y-m-d H:i',$voo['o_addtime']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                                <div class="details_ul">
                                    <?php if(is_array($vo['member']) || $vo['member'] instanceof \think\Collection || $vo['member'] instanceof \think\Paginator): $key = 0; $__LIST__ = $vo['member'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($key % 2 );++$key;?>
                                    <div class="details_ul_list">
                                        <div class="details_schedule_name_pic lf">
                                            <img alt=""
                                                src="<?php echo (isset($voo['m_s_avatar']) && ($voo['m_s_avatar'] !== '')?$voo['m_s_avatar']:'__STATIC__/image/myhome/TIM20180731142117.jpg'); ?>"
                                                class="details_errimg">
                                        </div>
                                        <p class="lf"><?php echo isset($voo['s_name']) ? $voo['s_name'] :  ''; ?> <span>已参团</span></p>
                                        <span class="rt"><?php echo date('Y-m-d H:i',$voo['o_addtime']); ?></span>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php elseif(($goods['play_type'] == 3)): ?>
                    <div class="details_schedule_stirp clear">
                        <div class="details_carousel detail_huasheng_carousel">
                            <div class="details_schedule_top clear">
                                <div class="details_schedule_center lf" style="width:6.6rem">
                                    <p class="lf">已参与<span class="details_schedule_yew"><?php echo isset($vo['gp_num']) ? $vo['gp_num'] :  0; ?></span>人次</p>
                                    <p class="rt">剩余
                                        <span class="details_schedule_yew">
                                            <?php if(empty($vo['gp_num']) || (($vo['gp_num'] instanceof \think\Collection || $vo['gp_num'] instanceof \think\Paginator ) && $vo['gp_num']->isEmpty())): ?>
                                                <?php echo $vo['gdr_membernum']; else: ?>
                                                <?php echo $vo['gdr_membernum'] - $vo['gp_num']; endif; ?>
                                        </span>
                                        人次
                                    </p>
                                    <div class="details_schedule_gray lf" style="width:6.6rem;background-color: #FFF8D7;height:0.24rem;border-radius: 0.12rem;">
                                        <div class="details_schedule_red" style="background-color:#FFD714 ;background-image: none;border-radius: 0.12rem;height:100%;"></div>
                                    </div>
                                    <span class="details_schedule_per a b<?php echo $key; ?>" style="display: none"><?php echo $vo['proportion']; ?>%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; endforeach; endif; else: echo "" ;endif; endif; if($is_lord ==1): else: if(!(empty($comment['list']) || (($comment['list'] instanceof \think\Collection || $comment['list'] instanceof \think\Paginator ) && $comment['list']->isEmpty()))): ?>
            <!--没有评价的时候隐藏该div开始-->
            <div class="goodsproduct_pingjia_view">
                <!--<a href="/member/goodsproduct/comment_list/gp_id/<?php echo $goods['gp_id']; ?>">-->
                <div class="details_evaluate">
                    <div class="details_evaluate_tit clear">
                        <p class="lf">
                            已购评价<span>(<?php echo isset($comment['total_num']) ? $comment['total_num'] :  0; ?>)</span>
                        </p>
                        <a href="/member/goodsproduct/comment_list/gp_id/<?php echo $goods['gp_id']; ?>">
                            <div class="rt">
                            <span>
                                    查看全部
                            <img src="__STATIC__/image/details/right.png">
                            </span>
                            </div>
                        </a>

                    </div>
                </div>
                <!--</a>-->
                <?php if(is_array($comment['list']) || $comment['list'] instanceof \think\Collection || $comment['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $comment['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="details_pingjia">
                    <div class="details_evaluate_list clear">
                        <!--评价者头像 S-->
                        <div class="details_evaluate_head lf">
                            <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                 data-original="__CDN_PATH__<?php echo isset($vo['m_s_avatar']) ? $vo['m_s_avatar'] :  ''; ?>">
                        </div>
                        <!--评价者头像 E-->

                        <div class="details_evaluate_rt lf">
                            <div class="details_pingjianame">
                                <small class="details_pinjia_tuomin"><?php echo isset($vo['m_name']) ? $vo['m_name'] :  '吖吖'; ?></small>
                                <span>第<?php echo $vo['o_periods']; ?>轮购中人</span>

                                <!--评价星星S-->
                                <div class="details_evaluate_star rt">
                                    <?php if(($vo['goods_score'] == '5.0')): ?>
                                    <img src="__STATIC__/image/review/icon_huang@2x.png" alt="">
                                    <?php elseif(($vo['goods_score'] == '4.0')): ?>
                                    <img src="__STATIC__/image/review/star4.png" alt="">
                                    <?php elseif(($vo['goods_score'] == '3.0')): ?>
                                    <img src="__STATIC__/image/review/star3.png" alt="">
                                    <?php elseif(($vo['goods_score'] == '2.0')): ?>
                                    <img src="__STATIC__/image/review/star2.png" alt="">
                                    <?php elseif(($vo['goods_score'] == '1.0')): ?>
                                    <img src="__STATIC__/image/review/star1.png" alt="">
                                    <?php endif; ?>
                                </div>
                                <!--评价星星E-->
                            </div>
                            <!--评价内容S-->
                            <div class="details_pingjia_view clear">
                                <p class="details_pingjiatext lf">
                                    <?php if($vo['rg_content'] == ''): ?>
                                    <span>暂无评价</span>
                                    <?php else: ?>
                                    <?php echo $vo['rg_content']; endif; ?>
                                    <span class="details_pingjiadata">
                                <?php echo date('Y-m-d',$vo['luck_time']); ?>
                                <small><?php echo isset($vo['gdt_name']) ? $vo['gdt_name'] :  ''; ?></small>
                                <small>共<b><?php echo isset($vo['gp_num']) ? $vo['gp_num'] :  1; ?></b>份吖吖码</small>
                            </span>
                                </p>
                                <?php if(!(empty($vo['img_list']) || (($vo['img_list'] instanceof \think\Collection || $vo['img_list'] instanceof \think\Paginator ) && $vo['img_list']->isEmpty()))): ?>
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__CDN_PATH__<?php echo $vo['img_list'][0]['img_url']; ?>"/>
                                <?php endif; ?>
                                <!--评价内容E-->
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!--没有评价的时候隐藏该div结束-->
            <?php else: ?>
            <!-- <div class="notpj pds">
                <p>该拍品暂无任何评价</p>
                <span>赶快参与拍购 成为第一个中拍者吖~</span>
            </div> -->
            <?php endif; endif; ?>
            <!-- 店铺信息 -->

            <div class="details_shopname">
                <a href="/member/shop/index/store_id/<?php echo $store_info['store_id']; ?>">
                    <div class="details_shopname_top clear">
                        <div class="details_shopname_head lf">
                            <img width="50" height="50" src="__CDN_PATH__<?php echo isset($store_info['store_logo']) ? $store_info['store_logo'] :  ''; ?>"
                                 data-original="__CDN_PATH__<?php echo isset($store_info['store_logo']) ? $store_info['store_logo'] :  ''; ?>"
                                 onerror="onerror=null;src='__STATIC__/image/index/pic_home_taplace@2x.png'">
                        </div>
                        <p class="lf">
                            <?php echo isset($store_info['stroe_name']) ? $store_info['stroe_name'] :  ''; ?>
                            <!--<img src="<?php echo isset($store_info['store_logo']) ? $store_info['store_logo'] :  '__STATIC__/image/details/icon_V@2x.png'; ?>">-->
                        </p>

                        <div class="details_shopname_into rt">
                            进入店铺
                        </div>
                    </div>
                </a>
                <div class="details_shopname_data clear">
                    <a href="/member/shop/index/store_id/<?php echo $store_info['store_id']; ?>">
                        <div class="lf">
                            <p><?php echo isset($store_info['totle_goods']) ? $store_info['totle_goods'] :  0; ?></p>
                            <span>全部商品</span>
                        </div>
                    </a>
                    <a href="/member/shop/index/store_id/<?php echo $store_info['store_id']; ?>/from/xinpin">
                        <div class="lf">
                            <p><?php echo isset($store_info['new_goods']) ? $store_info['new_goods'] :  0; ?></p>
                            <span>最新上架</span>
                        </div>
                    </a>
                    <a href="/member/shop/index/store_id/<?php echo $store_info['store_id']; ?>">
                        <div class="lf">
                            <p><?php echo isset($store_info['fans']) ? $store_info['fans'] :  0; ?></p>
                            <span>粉丝数量</span>
                        </div>
                    </a>
                    <a href="/member/shop/index/store_id/<?php echo $store_info['store_id']; ?>">
                        <div class="details_shopname_border lf">
                <span>
                    商品描述
                    <span><?php echo isset($store_info['g_score']) ? $store_info['g_score'] :  0; ?></span>
                </span>
                            <span>
                    卖家服务
                    <span><?php echo isset($store_info['s_score']) ? $store_info['s_score'] :  0; ?></span>
                </span>
                            <span>
                    物流服务
                    <span><?php echo isset($store_info['e_score']) ? $store_info['e_score'] :  0; ?></span>
                </span>
                        </div>
                    </a>
                </div>
            </div>
            </a>
        </div>

        <!-- 商品详情 -->
        <div class="details_tab_line">
            <div class="details">
                <div class="details_tit">
                    <p>商品详情</p>
                </div>

                <div class="details_text">
                    <div class="shop-num" style="margin:0 0 0.5rem 0;">商品编号：<?php echo $goods['gp_sn']; ?></div>
                    <?php echo htmlspecialchars_decode((isset($goods['g_description']) && ($goods['g_description'] !== '')?$goods['g_description']:'')); ?>
                    <!-- <textarea readonly id="textarea" class="details_textarea"><?php echo htmlspecialchars_decode((isset($goods['g_description']) && ($goods['g_description'] !== '')?$goods['g_description']:'')); ?></textarea> -->
                </div>
                <!--<div class="details_main">-->
                <!--<?php if(is_array($goods['img']) || $goods['img'] instanceof \think\Collection || $goods['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo $vo['gi_name']; ?>">-->
                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                <!--</div>-->
            </div>
        </div>
        <!-- 推荐商品s -->
        <div class="details_tab_line">
            <div class="details">
                <div class="details_tit  details_tit_line">
                    <p>推荐商品</p>
                </div>
            </div>
            <div class="details_produce">
                <div class="product_list_main goods_pro_main">
                    <div class="product_list_content clear">
                        <?php if(!(empty($tj_list) || (($tj_list instanceof \think\Collection || $tj_list instanceof \think\Paginator ) && $tj_list->isEmpty()))): if(is_array($tj_list) || $tj_list instanceof \think\Collection || $tj_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tj_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <a href="/member/goodsproduct/index/g_id/<?php echo $vo['g_id']; ?>">

                            <div class="product_list_list lf">
                                <div class="product_list_pic">
                                    <img src="__CDN_PATH__<?php echo isset($vo['g_s_img']) ? $vo['g_s_img'] :  ''; ?>">

                                    <div class="product_list_number"><?php echo isset($vo['gp_num']) ? $vo['gp_num'] :  '0'; ?>人已参与</div>
                                </div>
                                <p class="product_list_tit_p"><?php echo isset($vo['g_name']) ? $vo['g_name'] :  ''; ?></p>

                                <p class="product_list_price clear">
                                    ￥
                                    <span class="product_list_red "><?php echo isset($vo['gdr_price']) ? $vo['gdr_price'] :  '0'; ?> </span>
                                </p>
                                <span class="product_list_oldprice">￥<?php echo isset($vo['gp_market_price']) ? $vo['gp_market_price'] :  '0'; ?></span>
                            </div>
                        </a>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- 推荐商品e -->

        <div class="details_canpai">
            <div class="details_canpai_over"></div>
            <div class="details_canpai_main">
                <div class="details_canpai_top clear">
                    <?php if($goods['is_fudai']==1 || $goods['is_huodong']==1): ?>
                        <div class="details_canpai_pic lf details_canpai_pic_fudai">
                            <img src="__STATIC__/image/goodsproduct/icon_11.11biasohi@2x.png" alt=""
                                class="details_shiyi_fudai">
                            <img src="__CDN_PATH__<?php echo (isset($goods['g_s_img']) && ($goods['g_s_img'] !== '')?$goods['g_s_img']:''); ?>">
                        </div>
                    <?php else: ?>
                        <div class="details_canpai_pic lf">
                            <img src="__CDN_PATH__<?php echo (isset($goods['g_s_img']) && ($goods['g_s_img'] !== '')?$goods['g_s_img']:''); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="details_canpai_text lf">
                        <p class="details_canpai_tit">

                            <!--福袋规则判断-->
                            <?php if(($goods['play_type'] == 1)): if($goods['gp_condition'] == 1): ?>
                                <img src="__STATIC__/image/goodsproduct/icon_xrsd@2x.png" alt="" style="width:0.92rem;height:0.3rem">
                                <?php endif; elseif(($goods['play_type'] == 2)): ?>
                            <img src="__STATIC__/image/goodsproduct/icon_hsbq@2x.png" alt="" style="width:0.92rem;height:0.3rem">
                            <?php elseif(($goods['play_type'] == 3)): endif; ?>
                            
                            <?php echo (isset($goods['g_name']) && ($goods['g_name'] !== '')?$goods['g_name']:''); ?></p>

                        <p class="details_canpai_price">
                            ￥<span class="details_canpai_new"><?php echo (isset($gdr_list[0]['gdr_price']) && ($gdr_list[0]['gdr_price'] !== '')?$gdr_list[0]['gdr_price']:"0.00"); ?></span>
                            <span class="details_canpai_old">￥<?php echo (isset($goods['gp_market_price']) && ($goods['gp_market_price'] !== '')?$goods['gp_market_price']:'0.00'); ?></span>
                        </p>
                    </div>
                    <div class="details_canpai_cancel rt">
                        <img src="__STATIC__/image/details/652@2x.png">
                    </div>
                </div>
                <!-- {if condition="($goods.play_type == 1)"} -->
                <?php if(($goods['play_type'] == 3)): ?>
                    <div class="details_canpai_quantity details_evaluate_padding clear" style="display: none;">
                        <div class="details_canpainum  clear">
                            <p>选择价格</p>
                            <?php if(!(empty($gdr_list) || (($gdr_list instanceof \think\Collection || $gdr_list instanceof \think\Paginator ) && $gdr_list->isEmpty()))): if(is_array($gdr_list) || $gdr_list instanceof \think\Collection || $gdr_list instanceof \think\Paginator): $i = 0; $__LIST__ = $gdr_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gdr_vo): $mod = ($i % 2 );++$i;?>
                                    <div class="details_discount lf" gdr_id="<?php echo $gdr_vo['gdr_id']; ?>" gdr_price="<?php echo $gdr_vo['gdr_price']; ?>"
                                        left_num="<?php echo (isset($gdr_vo['left_num']) && ($gdr_vo['left_num'] !== '')?$gdr_vo['left_num']:0); ?>"><?php echo $gdr_vo['gdt_name']; ?>
                                    </div>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            <input type="hidden" name="gdr_id" value="<?php echo (isset($gdr_list[0]['gdr_id']) && ($gdr_list[0]['gdr_id'] !== '')?$gdr_list[0]['gdr_id']:''); ?>"/>
                        </div>
                        <p class="details_pitch_text">当前折扣剩余<span class="left_num"><?php echo $goods['gp_stock']; ?></span>份</p>
                    </div>
                <?php else: ?>
                    <!--选择价格-->
                    <div class="details_canpai_quantity details_evaluate_padding clear">
                        <div class="details_canpainum  clear">
                            <p>选择价格</p>
                            <?php if(!(empty($gdr_list) || (($gdr_list instanceof \think\Collection || $gdr_list instanceof \think\Paginator ) && $gdr_list->isEmpty()))): if(is_array($gdr_list) || $gdr_list instanceof \think\Collection || $gdr_list instanceof \think\Paginator): $i = 0; $__LIST__ = $gdr_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gdr_vo): $mod = ($i % 2 );++$i;?>
                                    <div class="details_discount lf" gdr_id="<?php echo $gdr_vo['gdr_id']; ?>" gdr_price="<?php echo $gdr_vo['gdr_price']; ?>"
                                        left_num="<?php echo (isset($gdr_vo['left_num']) && ($gdr_vo['left_num'] !== '')?$gdr_vo['left_num']:0); ?>"><?php echo $gdr_vo['gdt_name']; ?>
                                    </div>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            <input type="hidden" name="gdr_id" value="<?php echo (isset($gdr_list[0]['gdr_id']) && ($gdr_list[0]['gdr_id'] !== '')?$gdr_list[0]['gdr_id']:''); ?>"/>
                        </div>
                        <p class="details_pitch_text">当前折扣剩余<span class="left_num"><?php echo $goods['gp_stock']; ?></span>份</p>
                    </div>
                <?php endif; ?>
               
                <div class="details_canpai_quantity clear">
                    <div class="details_canpainum lf">
                        <?php if(($goods['play_type'] == 3)): ?>
                            <p>份数</p>
                        <?php else: ?>
                            <p>份数(每份对应一个吖吖码)</p>
                        <?php endif; ?>
                        <span>该商品此折扣价单个用户仅限<span id="gdr_membernum">0</span>份</span>
                    </div>
                    <div class="details_canpai_but rt clear">
                        <div class="details_prep lf">
                            <img src="__STATIC__/image/details/icon_-@2x.png">
                        </div>
                        <div class="details_inp lf">
                            <input type="number" name="num" value="1" min="1" max="<?php echo (isset($max_pai_num) && ($max_pai_num !== '')?$max_pai_num:0); ?>" readonly>
                        </div>
                        <div class="details_add lf">
                            <img src="__STATIC__/image/details/icon_+@2x.png">
                        </div>
                    </div>
                </div>

                <a href="javascript:void(0);">
                    <input type="hidden" name="gs_id" value="<?php echo (isset($goods['g_typeid']) && ($goods['g_typeid'] !== '')?$goods['g_typeid']:1); ?>"/>
                    <input type="hidden" name="gp_id" value="<?php echo $goods['gp_id']; ?>"/>
                    <input type="hidden" name="m_id" value="<?php echo (isset($m_id) && ($m_id !== '')?$m_id:0); ?>"/>
                    <!--福袋规则判断-->
                    <?php if(($goods['play_type'] == 1)): if($goods['is_fudai']==1): ?>
                        <div class="details_canpai_sure details_canpai_fudai">
                            确定参团
                        </div>
                        <?php else: ?>
                        <div class="details_canpai_sure">
                            确定参团
                        </div>
                        <?php endif; elseif(($goods['play_type'] == 2)): ?>
                        <div class="details_canpai_sure" style="background-image: linear-gradient(90deg,rgba(241,57,65,1),rgba(252,68,107,1))">
                            确定参团
                        </div>
                    <?php elseif(($goods['play_type'] == 3)): ?>
                        <div class="details_canpai_sure" style="background: #FFD714;color:#333333">
                            确定参团
                        </div>
                    <?php endif; ?>

                </a>
            </div>
        </div>
        <!-- 安卓，ios分享效果 -->
        <div class="details_fenxiang">
            <div class="details_fxcon">
                <div class="details_fxtit">
                    将商品分享至
                </div>
                <div class="details_fxlist clear">
                    <div class="details_fx_img lf" onclick="share(0)">
                        <img src="__STATIC__/image/details/wx.png">
                        微信好友
                    </div>
                    <div class="details_fx_img lf" onclick="share(1)">
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
</main>

        <footer>
<!--<div>审核中</div>-->
<?php if(($goods['g_state'] == 2)): ?>
<!--状态-->
<div class="detail-btn phonex"><span onclick="cancel(<?php echo $goods['g_id']; ?>)">取消发布</span></div>
<!--<div>审核未通过</div>-->
<?php elseif(($goods['g_state'] == 4)): ?>
<div class="detail-btn phonex"><span onclick="cancel(<?php echo $goods['g_id']; ?>)">取消发布</span><a
        href="/member/goods/reedit/g_id/<?php echo $goods['g_id']; ?>">重新编辑</a></div>
<!--出售中-->
<?php elseif(($goods['g_state'] == 6)): ?>
<div class="details_bottom clear phonex">
    <div class="details_bottom_lf lf clear">
        <a class="phs" href="tel:400-027-1888">
            <div class="details_evaluate_kefu_view lf">
                <div class="details_evaluate_kefu">
                    <img src="__STATIC__/image/details/kefu.png">
                </div>
                <p class="details_bottom_border">客服</p>
            </div>
        </a>

        <div class="details_lines lf"></div>
        <a onclick="collection(<?php echo isset($goods['g_id']) ? $goods['g_id'] :  ''; ?>)">
            <div class="details_evaluate_kefu_view lf">
                <div class="details_evaluate_kefu details_shoucang">
                    <?php if(empty($is_collection['gc_id']) || (($is_collection['gc_id'] instanceof \think\Collection || $is_collection['gc_id'] instanceof \think\Paginator ) && $is_collection['gc_id']->isEmpty())): ?>
                    <img src="__STATIC__/image/details/shoucang.png">
                    <?php else: ?>
                    <img src="__STATIC__/image/goodsproduct/yishoucang1@2x.png">
                    <?php endif; ?>
                </div>
                <p class="details_bottom_border">收藏</p>
            </div>
        </a>
    </div>

    <!--立即参与按钮-->
    <!--福袋规则判断-->
    <?php if(($goods['play_type'] == 1)): if($goods['is_fudai']==1): if($goods['gp_state']==1 && $goods['g_starttime'] <= $time && $goods['g_endtime'] > $time): ?>
                <button class="details_bottom_rt auction lf details_bottom_rt_fudai">立即参与</button>
            <?php else: ?>
                <button class="details_bottom_rt auction lf details_bottom_rt_bg" disabled="disabled">立即参与</button>
            <?php endif; else: if(($goods['g_endtime'] - $time<0) || ($goods['g_starttime']> $time)): ?>
                <button class="details_bottom_rt auction lf details_bottom_rt_bg" disabled="disabled">立即参与</button>
            <?php else: if(($goods['gp_stock']>0)): ?>
                <button class="details_bottom_rt auction lf">立即参与</button>
                <?php else: ?>
                <button class="details_bottom_rt auction lf details_bottom_rt_bg" disabled="disabled">立即参与</button>
                <?php endif; endif; endif; elseif(($goods['play_type'] == 2)): if(($goods['g_endtime'] - $time<0) || ($goods['g_starttime']> $time)): ?>
            <button class="details_bottom_rt auction lf details_bottom_rt_bg" disabled="disabled">立即购买</button>
        <?php else: if(($goods['gp_stock']>0)): ?>
                <button class="details_bottom_rt auction lf" style="background-image:linear-gradient(90deg,rgba(241,57,65,1),rgba(252,68,107,1)); ">立即购买</button>
            <?php else: ?>
                <button class="details_bottom_rt auction lf details_bottom_rt_bg" disabled="disabled">立即购买</button>
            <?php endif; endif; elseif(($goods['play_type'] == 3)): if(($goods['g_endtime'] - $time<0) || ($goods['g_starttime']> $time)): ?>
            <button class="details_bottom_rt auction lf details_bottom_rt_bg" disabled="disabled">立即购买</button>
        <?php else: if(($goods['gp_stock']>0)): ?>
                <button class="details_bottom_rt auction lf" style="background:#FFD714;color:#333333; ">立即购买</button>
            <?php else: ?>
                <button class="details_bottom_rt auction lf details_bottom_rt_bg" disabled="disabled">立即购买</button>
            <?php endif; endif; endif; ?>







</div>
<?php elseif((($goods['g_state'] == 8) || ($goods['g_state'] == 9))): if(($goods['is_store'] == 1)): ?>
<div class="detail-btn phonex"><a href="/member/goods/reedit/g_id/<?php echo $goods['g_id']; ?>">修改商品</a></div>
<?php else: ?>
<div class="details_bottom clear phonex">
    <div class="details_bottom_lf lf clear">
        <a class="phs" href="tel:400-027-1888">
            <div class="details_evaluate_kefu_view lf">
                <div class="details_evaluate_kefu">
                    <img src="__STATIC__/image/details/kefu.png">
                </div>
                <p class="details_bottom_border">客服</p>
            </div>
        </a>

        <div class="details_lines lf"></div>
        <a onclick="collection(<?php echo isset($goods['g_id']) ? $goods['g_id'] :  ''; ?>)">
            <div class="details_evaluate_kefu_view lf">
                <div class="details_evaluate_kefu details_shoucang">
                    <?php if(empty($is_collection['gc_id']) || (($is_collection['gc_id'] instanceof \think\Collection || $is_collection['gc_id'] instanceof \think\Paginator ) && $is_collection['gc_id']->isEmpty())): ?>
                    <img src="__STATIC__/image/details/shoucang.png">
                    <?php else: ?>
                    <img src="__STATIC__/image/goodsproduct/yishoucang1@2x.png">
                    <?php endif; ?>
                </div>
                <p class="details_bottom_border">收藏</p>
            </div>
        </a>
    </div>

    <button class="details_bottom_rt auction lf details_bottom_rt_bg" disabled="disabled">立即参与</button>


</div>
<?php endif; elseif(($goods['g_state'] == 7)): ?>
<div class="detail-btn phonex"><span onclick="cancel(<?php echo $goods['g_id']; ?>)">取消发布</span><a
        href="/member/goods/reedit/g_id/<?php echo $goods['g_id']; ?>">继续编辑</a></div>
<?php elseif(($goods['g_state'] == 1)): ?>
<div class="detail-btn phonex"><span onclick="cancel(<?php echo $goods['g_id']; ?>)">取消发布</span><a class="link"
                                                                                   href="/member/store/deposit/g_id/<?php echo $goods['g_id']; ?>">支付保证金</a>
</div>
<?php endif; ?>
<!-- 分享弹窗 S -->
<div class="share-pop">
    <div class="share-over"></div>
    <div class="share-tip"></div>
    <div class="share-cont">
        <img class="share-tit" src="__STATIC__/image/popularity/share-tit.png"/>
        <img class="share-code" src="<?php if(empty($goods['code']) || (($goods['code'] instanceof \think\Collection || $goods['code'] instanceof \think\Paginator ) && $goods['code']->isEmpty())): ?>/uploads/logo/pai.png <?php else: ?> <?php echo $goods['code']; endif; ?>"/>
        <p>长按保存二维码到本地</p>
        <div data-clipboard-text="<?php echo $goods['url']; ?>" class="share-link">直接分享</div>
        <div class="share-link-wx">直接分享</div>
    </div>
</div>

<!-- 分享弹窗 E -->
<input type="hidden" id="app">
</footer>
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
<script type="text/javascript" src="__JS__/applicationIn/textareaauto.js"></script>
<script type="text/javascript" src="__JS__/goodsproduct/swiper.min.js"></script>
<script src="__STATIC__/js/clipboard.min.js"></script>
<script src="__JS__/cookie/jquery.cookie.js"></script>
<script type="text/javascript" src="__JS__/goodsproduct/details.js"></script>
<script>
    // console.log("<?php echo $goods['g_state']; ?>")
    //var tuomin=$(".details_pinjia_tuomin").html();

    //console.log($(".details_pinjia_tuomin").html().substr(0,1)+"**"+$(".details_pinjia_tuomin").html().substr(2));

    ////判断是否是普通商品
    //if(<?php echo $goods['g_typeid']; ?>==1||<?php echo $goods['g_typeid']; ?>==0){
    //    //var text = document.getElementById("textarea");
    //    //autoTextarea(text);// 调用
    //}

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
            if (str == '1.0') {
                $('.phs').removeAttr('href').attr('onclick', 'call(4000271888)');
            }
            $('#app').val(str);
        })
    })

    function call(tel) {
        var data = '{"tel": "' + tel + '"}'
        setupWebViewJavascriptBridge(function (bridge) {
            /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
            bridge.callHandler('call_tel', data);
        })
    }

    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction'
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });

    // 获取地址栏是否带分享参数
    function getQueryString(name) {
        var reg = new RegExp("(^|&|/)" + name + "=([^&]*)(&|$)", "i");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]);
        return null;
    }

    //url带分享参数返回首页，否则返回上一页
    $('.back-btn').click(function () {
        var data3 = window.sessionStorage.getItem("data");
        var data4 = window.sessionStorage.getItem("keyword");
        if (getQueryString("share") != null) {
            window.location.href = "/index/index/";
        } else if (getQueryString("from") != null) {
            // window.history.back()
            window.history.go(-1);
        } else if (data3) {
            window.location.href = '/index/index/search_index/type/' + data3 + '/keyword/' + data4;
            sessionStorage.removeItem('data');
            sessionStorage.removeItem('keyword');
        } else {
            window.history.go(-1);
            // window.history.back(-1);
        }
    })

    //取消发布
    function cancel(id) {
        var m_id = "<?php echo $m_id; ?>";
        if (!m_id) {
            layer.confirm("您还没有登录，请登录！", {
                title: false, /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['知道啦', '前去登录'], //按钮
                // 按钮2的回调
                btn2: function () {
                    window.location.href = "/member/login/index";
                }
            })
        } else {
            layer.confirm('是否确定取消发布该商品？', {
                title: false, /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['算了吧', '确认取消'], /*按钮*/
                btn2: function () {
                    /*按钮2的回调*/
                    $.post("/member/goods/cancel", {
                        g_id: id
                    }, function (res) {
                        if (res.status == 1) {
                            layer.msg('<span style="color:#fff">' + res.msg + '</span>');
                            window.location.href = document.referrer;
                        } else {
                            layer.msg('<span style="color:#fff">' + res.msg + '</span>');
                        }
                    })
                }
            })
        }
    }

    //收藏
    function collection(id) {
        var m_id = "<?php echo $m_id; ?>";
        if (!m_id) {
            layer.confirm("您还没有登录，请登录！", {
                title: false, /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['知道啦', '前去登录'], //按钮
                // 按钮2的回调
                btn2: function () {
                    window.location.href = "/member/login/index";
                }
            })
        } else {
            $.post("/member/goodscollection/add_collection", {g_id: id}, function (res) {
                if (res.msg == "收藏成功") {
                    $(".details_shoucang img").attr("src", "/static/image/goodsproduct/yishoucang1@2x.png");
                } else {
                    $(".details_shoucang img").attr("src", "__STATIC__/image/details/shoucang.png");
                }
                layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                    time: 2000
                });

//            location.reload();
            });
        }

    }

    //立即参与登录
    $(".auction").click(function () {
        var m_id = $("input[name=m_id]").val();

        if (m_id == 0 || m_id == '') {
            layer.confirm("您还没有登录，请登录！", {
                title: false, /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['知道啦', '前去登录'], //按钮
                // 按钮2的回调
                btn2: function () {
                    window.location.href = "/member/login/index";
                }
            })
        } else {
            $(".details_canpai").addClass("details_canpai_dis");
        }
    })

    var nowTime = parseInt(new Date().getTime());
    // console.log(nowTime);
    /*倒计时*/
    // var startTime = parseInt(new Date('2018/7/29 09:00').getTime());
    // var daTime=startTime-nowTime;
    //var times = "<?php echo $goods['g_endtime']; ?>" - "<?php echo $time; ?>";

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
            if (minute <= 9) minute = '0' + minute;
            if (second <= 9) second = '0' + second;

            $(idName + ' .details_day').html(' <span>' + day + '</span>天');
            $(idName + ' .details_hour').html('<span>' + hour + '</span>');
            $(idName + ' .details_minute').html('<span>' + minute + '</span>');
            $(idName + ' .details_second').html('<span>' + second + '</span>');
            intDiff -= 1000;
        }, 1000);
    }

    //出售中的时间
    $(function () {
        var end_time = <?php echo $goods['g_endtime']; ?> *
        1000 - nowTime;
        timer(end_time, '#first');
        if (nowTime < <?php echo $goods['g_starttime'] * 1000; ?>
    )
        {
            $(".details_status_yitongguo").css({display: "block"});
            $(".details_rt").css({display: "none"});
        }
    else
        {
            $(".details_status_yitongguo").css({display: "none"});
            $(".details_rt").css({display: "block"});
        }
    });
    //已结束的时间
    // $(function () {
    //     var g_endtime = "<?php echo $goods['g_endtime']; ?>";
    //     var end_time = g_endtime * 1000 - nowTime;
    //     timer(end_time, '#first2');
    // });
    $(function () {
        var g_starttime = "<?php echo $goods['g_starttime']; ?>";
        var star_time = g_starttime * 1000 - nowTime;
        timer(star_time, '#date1');
        if (g_starttime > nowTime / 1000) {
            // $(".details_btn_lijicanyu").css({display: "none"});
        } else {
            // $(".details_btn_lijicanyu").css({display: "block"});
        }
    });

    // 选择参团折扣函数
    function select_discount() {
        var ele_pitch = $(".details_canpainum").find(".details_pitch");
        if (ele_pitch.length == 0) {
            $(".details_canpainum").find(".details_discount").eq(0).addClass("details_pitch");
        }
        var gdr_id = $(".details_pitch").attr("gdr_id");
        var gdr_price = $(".details_pitch").attr("gdr_price");
        var left_num = $(".details_pitch").attr("left_num");
        $("input[name=gdr_id]").val(gdr_id);
        $(".details_canpai_new").html(gdr_price);
        $(".left_num").html(left_num);
    }

    select_discount();

    // 当前折扣剩余最大参团数量
    function get_max_pai_num_bygdrid() {
        var gdr_id = $("input[name=gdr_id]").val();
        // 请求
        $.ajax({
            url: "<?php echo url('Goodsproduct/get_max_pai_num_bygdrid'); ?>",
            dataType: 'json',
            type: 'POST',
            data: {gdr_id: gdr_id},
            success: function (data) {
                if (!data.status) {
                    layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                        time: 2000
                    });
                } else {
                    $("#gdr_membernum").html(data.data.gdr_limited);
                    $("input[name=num]").attr("max", data.data.left_max_pai_num);
                }
            }
        });
    }

    get_max_pai_num_bygdrid();

    $(function () {
        // 确定参团
        $('.details_canpai_sure').click(function () {
            //数量
            var num = $('input[name=num]').val();
            var gp_id = $('input[name=gp_id]').val();
            var gdr_id = $("input[name=gdr_id]").val();
            var gs_id = $("input[name=gs_id]").val();
            // 请求
            $.ajax({
                url: "<?php echo url('Goodsproduct/rewriteUrl'); ?>",
                dataType: 'json',
                type: 'POST',
                data: {num: num, gp_id: gp_id, gdr_id: gdr_id, gs_id: gs_id},
                success: function (data) {
                    if (data.status == 1) {
                        window.location.href = '/member/Orderpai/confirm/param/' + data.data;
                    } else {
                        layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                            time: 2000
                        });
                    }
                }
            });
        });
        // 参团
        $('.details_schedule_right_btn ').click(function () {
            if ("<?php echo $goods['is_fudai']; ?>" == 1) {
                if ("<?php echo $goods['gp_state']; ?>" == 2 || "<?php echo $goods['gp_state']; ?>" == 3) {
                } else {
                    //数量
                    var num = 1;
                    var gp_id = $('input[name=gp_id]').val();
                    var gdr_id = $(this).attr("gdr_id");
                    var gs_id = $("input[name=gs_id]").val();

                    // 请求
                    $.ajax({
                        url: "<?php echo url('Goodsproduct/rewriteUrl'); ?>",
                        dataType: 'json',
                        type: 'POST',
                        data: {num: num, gp_id: gp_id, gdr_id: gdr_id, gs_id: gs_id},
                        success: function (data) {
                            console.log(data);
                            if (data.status == 1) {
                                window.location.href = '/member/Orderpai/confirm/param/' + data.data;
                            } else {
                                layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                                    time: 2000
                                });
                            }
                        }
                    });
                }
            } else {
                //数量
                var num = 1;
                var gp_id = $('input[name=gp_id]').val();
                var gdr_id = $(this).attr("gdr_id");
                var gs_id = $("input[name=gs_id]").val();

                // 请求
                $.ajax({
                    url: "<?php echo url('Goodsproduct/rewriteUrl'); ?>",
                    dataType: 'json',
                    type: 'POST',
                    data: {num: num, gp_id: gp_id, gdr_id: gdr_id, gs_id: gs_id},
                    success: function (data) {
                        console.log(data);
                        if (data.status == 1) {
                            window.location.href = '/member/Orderpai/confirm/param/' + data.data;
                        } else {
                            layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                                time: 2000
                            });
                        }
                    }
                });
            }

        });

        // 选择参团的折扣类型
        $(".details_discount").click(function () {
            $(this).addClass("details_pitch").siblings(".details_discount").removeClass("details_pitch");
            var gdr_id = $(this).attr("gdr_id");
            var gdr_price = $(this).attr("gdr_price");
            var left_num = $(this).attr("left_num");
            $("input[name=gdr_id]").val(gdr_id);
            $(".details_canpai_new").html(gdr_price);
            $(".left_num").html(left_num);
            get_max_pai_num_bygdrid();//统计最大参团量
        })
        // 参团者列表
        //1.全部参团
        $(".details_cantuan_all").click(function () {
            var this_gp_id = $("input[name=gp_id]").val();
            if (this_gp_id) {
                window.location.href = "/member/orderpai/pai_memlist/gp_id/" + this_gp_id + "/gdr_id/0";
            }
        });

        // 2.当前折扣参团
        $(".details_schedule_center").click(function () {
            var this_gdr_id = $(this).siblings(".details_schedule_right_btn").attr("gdr_id");
            var this_gp_id = $("input[name=gp_id]").val();
            if (this_gdr_id) {
                window.location.href = "/member/orderpai/pai_memlist/gp_id/" + this_gp_id + "/gdr_id/" + this_gdr_id;
            }
        });
    });

    $(window).scroll(function () {
        var scrol = $(window).scrollTop();
        if (scrol > 1) {
            $(".details_header_top").addClass("details_display");
            $(".details_tab_list").removeClass("details_display");
        } else {
            $(".details_header_top").removeClass("details_display");
            $(".details_tab_list").addClass("details_display");
        }
    })

    function construction(btn) {
        layer.msg("<span style='color:#fff'>功能建设中...</span>", {
            time: 2000
        });
    }

    var share_qr_image = "https://" + document.domain + "<?php echo $goods['code']; ?>";
    //显示分享弹窗    
    $('.details_top_rt').click(function () {
        var data = '{"share_title": "' + title + '","share_content": "' + desc + '","share_url": "' + link + '","share_image": "' + imgUrl + '","is_share_to_firend_circle": "1","share_qr_image":"' + share_qr_image + '","type": "1"}';

        if ($('#app').val() != '') {
            if ($('#app').val() == '1.0') {
                /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
                setupWebViewJavascriptBridge(function (bridge) {
                    /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                    bridge.callHandler('getShareParams', data);
                })
            } else {
                $(".details_fenxiang").show();
            }

        } else {
            // 微信浏览器端安卓分享
            if (hideFlag) {
                if (typeof(window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        if (getCookie("version") == null) {
                            $('.details_fenxiang').show();
                        } else {
                            window.android.getShareParams(data);
                        }
                    }
                } else {
                    $('.share-pop').show();
                    $('.share-cont').show();
                    $('.share-tip').hide();
                }
            } else {
                // 非微信浏览器端安卓分享
                $('.share-pop').show();
                $('.share-cont').show();
                $('.share-tip').hide();
            }
        }
    })

    //隐藏分享弹窗
    $('.share-over').click(function () {
        $('.share-pop').hide();
    });

    //复制功能
    var btns = document.querySelectorAll('.share-link');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function (e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>', {time: 2000});
    });

    clipboard.on('error', function (e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>', {time: 2000});
    });

    //微信分享提示
    $('.share-link-wx').click(function () {
        $('.share-cont').hide();
        $('.share-tip').show();
    });

    // 判断是否在微信内
    if (isWeiXin()) {
        $('.share-link-wx').show();
        $('.share-link').hide();
    } else {
        $('.share-link').show();
        $('.share-link-wx').hide();
    }

    function share(id) {
        var is_share_to_firend_circle = '';
        if (id == 0) {
            is_share_to_firend_circle = false;
        } else {
            is_share_to_firend_circle = true;
        }

        var data = '{"share_title": "' + title + '","share_content": "' + desc + '","share_url": "' + link + '","share_image": "' + imgUrl +
            '","is_share_to_firend_circle": ' + is_share_to_firend_circle + '}';

        if ($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function (bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getShareParams', data);
            })
        } else {
            // 非微信浏览器端安卓分享
            if (hideFlag) {
                if (typeof(window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        window.android.getShareParams(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }

    function copyUrl() {
        var data = '{"copy_url": "<?php echo $share_link; ?>"}';
        if ($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function (bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getCopyUrl', data);
            })
        } else {
            // 非微信浏览器端安卓复制链接
            if (hideFlag) {
                if (typeof(window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        window.android.getCopyUrl(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }

    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })

    //截取评价昵称
    $('.details_pinjia_tuomin').each(function () {
        var srb = $(this).text();
        if (srb.length >= 4) {
            $(this).text("" + srb.substring(0, 1) + "**" + srb.substring(srb.length - 1, srb.length) + "");
        }
    })
    $(".details_errimg").on("error", function () {
        $(this).attr("src", "/static/image/index/pic_home_taplace@2x.png")
    })
    // var type = "<?php echo $goods['play_type']; ?>"
    // var states = "<?php echo $goods['g_state']; ?>"
    // console.log(type, states);
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>