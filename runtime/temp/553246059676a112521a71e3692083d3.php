<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\project\pai\public/../application/pointpai/view/pointgoods/index.html";i:1542694680;s:67:"D:\project\pai\public/../application/pointpai/view/common/base.html";i:1542013165;s:69:"D:\project\pai\public/../application/pointpai/view/common/js_sdk.html";i:1541491294;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goodsproduct/swiper.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/productlist/product_list.css">
<link rel="stylesheet" type="text/css" href="__CSS__/popularity/details.css">
<link rel="stylesheet" type="text/css" href="__CSS__/stroe/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/order_info/index.css">
<link rel="stylesheet" href="__CSS__/liMarquee/liMarquee.css">
<link rel="stylesheet" href="__CSS__/pointgoods/pointgoods.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goodsproduct/details.css">
<link rel="stylesheet" type="text/css" href="__CSS__/baguetteBox/baguetteBox.css">

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
        <header></header>
        
<main style="margin-top: 0;margin-bottom: 50px;">
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

    <!--商品-->
    <div class="details_tab_line">
        <div class="detail_line_view">
            <!-- 轮播banner S -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php if(empty($goods_info['banner_list']) || (($goods_info['banner_list'] instanceof \think\Collection || $goods_info['banner_list'] instanceof \think\Paginator ) && $goods_info['banner_list']->isEmpty())): ?>
                        <div class="swiper-slide">
                            <div class="details_pic">
                                <img class="details_img click_big" src="/static/image/index/pic_home_taplace@2x.png">
                            </div>
                        </div>
                    <?php else: if(is_array($goods_info['banner_list']) || $goods_info['banner_list'] instanceof \think\Collection || $goods_info['banner_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods_info['banner_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <div class="swiper-slide" >
                                <div class="details_pic">
                                    <img class="details_img click_big" src="<?php echo $vo['gi_name']; ?>" i="<?php echo $key; ?>">
                                </div>
                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>            
            <!-- 轮播banner E -->

            <div class="big_banner">
                <div class="big_swiper-container swiper-banner">
                    <div class="swiper-wrapper">
                        <?php if(empty($goods_info['banner_list']) || (($goods_info['banner_list'] instanceof \think\Collection || $goods_info['banner_list'] instanceof \think\Paginator ) && $goods_info['banner_list']->isEmpty())): ?>
                        <div class="swiper-slide">
                            <div class="details_pic">
                                <img class="details_img" src="__STATIC__/image/index/pic_home_taplace@2x.png">
                            </div>
                        </div>
                        <?php else: if(is_array($goods_info['banner_list']) || $goods_info['banner_list'] instanceof \think\Collection || $goods_info['banner_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods_info['banner_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
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

            <!-- 价格及倒计时 S-->
            <div class="details_data clear">
                <div class="details_ing"></div>
                <!-- 价格 S-->
                <div class="details_lf lf" style="display: block">
                    <p class="details_lf_top">市场价
                        <span class="details_old">￥<?php echo (isset($goods_info['gp_market_price']) && ($goods_info['gp_market_price'] !== '')?$goods_info['gp_market_price']:0); ?></span>
                        <span class="details_hint">满额揭晓</span>
                    </p>
                    <p class="details_new"><?php echo (isset($goods_info['gp_sale_price']) && ($goods_info['gp_sale_price'] !== '')?$goods_info['gp_sale_price']:0); ?>
                        <small>积分</small>
                    </p>
                </div>
                <!-- 价格 E-->

                <!-- 倒计时 S -->
                <div class="details_rt rt" style="display: block">
                    <p class="details_hint_text">距离商品结束时间还剩</p>
                    <div class="details_time" id="first">
                        <span class="details_show details_day"></span>
                        <span class="details_fenhao">:</span>
                        <span class="details_show details_hour"></span>
                        <span class="details_fenhao">:</span>
                        <span class="details_show details_minute"></span>
                        <span class="details_fenhao">:</span>
                        <span class="details_show details_second"></span>
                    </div>
                </div>
                <!-- 倒计时 E -->
            </div>
            <!-- 规则 S -->
            <a href="/pointpai/Pointgoods/rule/">
                <div class="details_rule clear">
                    <span class="lf">拍吖吖积分规则 了解一下~</span>
                    <span class="rt">
                    查看规则
                    <img src="__STATIC__/image/details/icon_jump@2x.png">
                </span>
                </div>
            </a>
            <!-- 规则 E -->
            <!-- 产品名称 S -->

            <div class="details_top clear">
                <a href="/pointpai/review/gp_review_list/gp_id/<?php echo $goods_info['gp_id']; ?>">
                <div class="yg-num">                    
                    <?php echo isset($review_count) ? $review_count :  0; ?>
                    <br><span>已购者</span>
                </div>
                </a>
                <div class="details_top_lf lf">                    
                    <p><img src="__STATIC__/image/pointgoods/icon_renqigou@2x.png" alt="" class="jifen">&nbsp;&nbsp;<?php echo (isset($goods_info['g_name']) && ($goods_info['g_name'] !== '')?$goods_info['g_name']:''); ?></p>
                    <span><?php echo (isset($goods_info['g_secondname']) && ($goods_info['g_secondname'] !== '')?$goods_info['g_secondname']:''); ?></span>
                    <div class="details_top_hint">
                        <span>快递：免运费</span>
                        <span>库存：<?php echo (isset($goods_info['gp_stock']) && ($goods_info['gp_stock'] !== '')?$goods_info['gp_stock']:0); ?></span>
                        <span><?php echo (isset($goods_info['p_name']) && ($goods_info['p_name'] !== '')?$goods_info['p_name']:''); ?> <?php echo (isset($goods_info['c_name']) && ($goods_info['c_name'] !== '')?$goods_info['c_name']:''); ?></span>
                    </div>
                </div>
            </div>

            <!-- 虚位以待 S -->
            <div class="details_xw"></div>
            <!-- 虚位以待 E -->
            <div class="qianggou">
                <span>积分商品火热来袭，快来抢购吧！！</span>
            </div>
        </div>
    </div>
    <!--参团-->
    <div class="details_tab_line">
        <div class="details_tit_view">
            <div class="details_tit_top clear">
                <?php if(empty($pai_progress['last_4_avatars']) || (($pai_progress['last_4_avatars'] instanceof \think\Collection || $pai_progress['last_4_avatars'] instanceof \think\Paginator ) && $pai_progress['last_4_avatars']->isEmpty())): ?>
                    <p class="lf">快去成为第一个参团人吧</p>
                <?php else: ?>
                    <div class="details_schedule_name_pic lf">
                    <?php if(is_array($pai_progress['last_4_avatars']) || $pai_progress['last_4_avatars'] instanceof \think\Collection || $pai_progress['last_4_avatars'] instanceof \think\Paginator): $i = 0; $__LIST__ = $pai_progress['last_4_avatars'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <img src="/static/image/index/pic_home_taplace@2x.png" data-original="<?php echo $vo['m_avatar']; ?>">
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                <?php endif; ?>
                <p class="lf">等共<span><?php echo (isset($pai_progress['total_painum']) && ($pai_progress['total_painum'] !== '')?$pai_progress['total_painum']:0); ?></span>人次已参与团购</p>
            </div>
        </div>
        <div class="details_schedule_stirp clear">
            <div class="details_carousel jfgs">
                <div class="details_schedule_top clear">
                    <div class="details_schedule_center lf jfg">
                        <p class="lf jfgp">已参与<span class="details_schedule_yew"><?php echo (isset($pai_progress['count_painum']) && ($pai_progress['count_painum'] !== '')?$pai_progress['count_painum']:0); ?></span>人次</p>

                        <p class="rt jfgp">剩余<span class="details_schedule_yew"><?php echo (isset($pai_progress['left_pai_num']) && ($pai_progress['left_pai_num'] !== '')?$pai_progress['left_pai_num']:0); ?></span>人次
                        </p>

                        <div class="details_schedule_gray lf jfgcen">
                            <div class="details_schedule_red jfgcet">
                                <?php if($pai_progress['pai_rate'] != 0): ?>
                                <span><?php echo (isset($pai_progress['pai_rate']) && ($pai_progress['pai_rate'] !== '')?$pai_progress['pai_rate']:0); ?>%</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(!(empty($last_reviews) || (($last_reviews instanceof \think\Collection || $last_reviews instanceof \think\Paginator ) && $last_reviews->isEmpty()))): ?>
        <!--没有评价的时候隐藏该div开始-->
        <div class="goodsproduct_pingjia_view">
            <div class="details_evaluate">
                <div class="details_evaluate_tit clear">
                    <p class="lf">
                        已购评价<span>(<?php echo (isset($review_count) && ($review_count !== '')?$review_count:0); ?>)</span>
                    </p>
                    <a href="/pointpai/review/gp_review_list/gp_id/<?php echo $goods_info['gp_id']; ?>">
                        <div class="rt">
                              <span>
                                      查看全部
                                <img src="__STATIC__/image/details/right.png">
                              </span>
                        </div>
                    </a>
                </div>
            </div>

            <?php if(is_array($last_reviews) || $last_reviews instanceof \think\Collection || $last_reviews instanceof \think\Paginator): $i = 0; $__LIST__ = $last_reviews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="details_pingjia">
                <div class="details_evaluate_list clear">
                    <!--评价者头像 S-->
                    <div class="details_evaluate_head lf">
                        <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original='<?php echo $vo['m_avatar']; ?>'>
                    </div>
                    <!--评价者头像 E-->

                    <div class="details_evaluate_rt lf">
                        <div class="details_pingjianame">
                            <small class="details_pinjia_tuomin"><?php echo (isset($vo['s_name']) && ($vo['s_name'] !== '')?$vo['s_name']:'吖吖'); ?></small>
                            <small class="details_pinjia_tuomintt">第<?php echo (isset($vo['o_periods']) && ($vo['o_periods'] !== '')?$vo['o_periods']:''); ?>轮购中人</small>
                            <!--<div class="details_evaluate_star rt">-->
                            <!--<img src="__STATIC__/image/review/icon_huang@2x.png" alt="">-->
                            <!--</div>-->
                            <!--评价星星S-->
                            <div class="details_evaluate_star rt">
                                <?php if($vo['goods_score'] == 5): ?>
                                <img src="__STATIC__/image/review/icon_huang@2x.png" alt="">
                                <?php elseif($vo['goods_score'] == 4): ?>
                                <img src="__STATIC__/image/review/star4.png" alt="">
                                <?php elseif($vo['goods_score'] == 3): ?>
                                <img src="__STATIC__/image/review/star3.png" alt="">
                                <?php elseif($vo['goods_score'] == 2): ?>
                                <img src="__STATIC__/image/review/star2.png" alt="">
                                <?php elseif($vo['goods_score'] == 1): ?>
                                <img src="__STATIC__/image/review/star1.png" alt="">
                                <?php endif; ?>
                            </div>
                            <!--评价星星E-->
                        </div>
                        <!--评价内容S-->
                        <div class="details_pingjia_view clear">
                            <p class="details_pingjiatext">
                                <?php if($vo['rg_content'] == ''): ?>
                                <span>暂无评价</span>
                                <?php else: ?>
                                <?php echo $vo['rg_content']; endif; ?>
                            </p>
                            <!--评价内容E-->
                            <small><?php echo date('Y-m-d',(isset($vo['o_addtime']) && ($vo['o_addtime'] !== '')?$vo['o_addtime']:0)); ?>&nbsp;&nbsp;&nbsp;&nbsp;共<?php echo (isset($vo['pai_num']) && ($vo['pai_num'] !== '')?$vo['pai_num']:'0'); ?>份吖吖码</small>
                            <?php if(!(empty($vo['img_list']) || (($vo['img_list'] instanceof \think\Collection || $vo['img_list'] instanceof \think\Paginator ) && $vo['img_list']->isEmpty()))): ?>
                            <img src="<?php echo $vo['img_list'][0]['img_url']; ?>">
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <!--没有评价的时候隐藏该div结束-->
        </div>
        <?php endif; ?>

        <!--进入店铺-->

            <div class="details_shopname">
                <a href="/member/shop/index/store_id/<?php echo (isset($store_info['store_id']) && ($store_info['store_id'] !== '')?$store_info['store_id']:0); ?>">
                    <div class="details_shopname_top clear">
                    <div class="details_shopname_head lf">
                        <img width="50" height="50" src="<?php echo isset($store_info['store_logo']) ? $store_info['store_logo'] :  '__STATIC__/image/details/icon_V@2x.png'; ?>">
                    </div>
                    <p class="lf">
                        <?php echo (isset($store_info['stroe_name']) && ($store_info['stroe_name'] !== '')?$store_info['stroe_name']:''); ?>
                        <!--<img src="<?php echo isset($store_info['store_logo']) ? $store_info['store_logo'] :  '__STATIC__/image/details/icon_V@2x.png'; ?>">-->
                    </p>

                    <div class="details_shopname_into rt">
                        进入店铺
                    </div>
                </div>
                </a>
                <div class="details_shopname_data clear">
                    <a href="/member/shop/index/store_id/<?php echo (isset($store_info['store_id']) && ($store_info['store_id'] !== '')?$store_info['store_id']:0); ?>">
                         <div class="lf">
                        <p><?php echo (isset($store_info['totle_goods']) && ($store_info['totle_goods'] !== '')?$store_info['totle_goods']:0); ?></p>
                        <span>全部商品</span>
                    </div>
                    </a>
                    <a href="/member/shop/index/store_id/<?php echo (isset($store_info['store_id']) && ($store_info['store_id'] !== '')?$store_info['store_id']:0); ?>/from/xinpin">
                        <div class="lf">
                        <p><?php echo (isset($store_info['new_goods']) && ($store_info['new_goods'] !== '')?$store_info['new_goods']:0); ?></p>
                        <span>最新上架</span>
                    </div>
                    </a>
                    <a href="/member/shop/index/store_id/<?php echo (isset($store_info['store_id']) && ($store_info['store_id'] !== '')?$store_info['store_id']:0); ?>">
                        <div class="lf">
                        <p><?php echo (isset($store_info['fans']) && ($store_info['fans'] !== '')?$store_info['fans']:0); ?></p>
                        <span>粉丝数量</span>
                    </div>
                    </a>
                    <a href="/member/shop/index/store_id/<?php echo (isset($store_info['store_id']) && ($store_info['store_id'] !== '')?$store_info['store_id']:0); ?>">
                        <div class="details_shopname_border lf">
                    <span>
                      商品描述
                      <span><?php echo (isset($store_info['g_score']) && ($store_info['g_score'] !== '')?$store_info['g_score']:'5.0'); ?></span>
                    </span>
                        <span>
                      卖家服务
                      <span><?php echo (isset($store_info['s_score']) && ($store_info['s_score'] !== '')?$store_info['s_score']:'5.0'); ?></span>
                    </span>
                        <span>
                      物流服务
                      <span><?php echo (isset($store_info['e_score']) && ($store_info['e_score'] !== '')?$store_info['e_score']:'5.0'); ?></span>
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
                <?php echo (isset($goods_info['g_description']) && ($goods_info['g_description'] !== '')?$goods_info['g_description']:''); ?>
            </div>

        </div>
    </div>
    <!-- 推荐商品s -->
    <div class="details_tab_line" >
        <div class="details" style="display: none;">
            <div class="details_tit  details_tit_line">
                <p>推荐商品</p>
            </div>
        </div>
        <div class="details_produce" style="display: none;">
            <div class="product_list_main goods_pro_main">
                <div class="product_list_content clear">
                    <?php if(!(empty($tj_list) || (($tj_list instanceof \think\Collection || $tj_list instanceof \think\Paginator ) && $tj_list->isEmpty()))): if(is_array($tj_list) || $tj_list instanceof \think\Collection || $tj_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tj_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/pointpai/Pointgoods/index/g_id/<?php echo $vo['g_id']; ?>">
                        <div class="product_list_list lf">
                            <div class="product_list_pic">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__CDN_PATH__<?php echo isset($vo['g_img']) ? $vo['g_img'] :  ''; ?>">

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

    <!--点击立即参团弹框-->
    <div class="details_canpai">
        <div class="details_canpai_over"></div>
        <div class="details_canpai_main">
            <div class="details_canpai_top clear">
                <div class="details_canpai_pic lf">
                    <img src="<?php echo $goods_info['g_img']; ?>">
                </div>
                <div class="details_canpai_text lf">
                    <p class="details_canpai_tit"><?php echo (isset($goods_info['g_secondname']) && ($goods_info['g_secondname'] !== '')?$goods_info['g_secondname']:''); ?></p>

                    <p class="details_canpai_price">
                        <span class="details_canpai_new"><?php echo (isset($goods_info['gp_sale_price']) && ($goods_info['gp_sale_price'] !== '')?$goods_info['gp_sale_price']:'0.00'); ?></span>积分
                        <span class="details_canpai_old">￥<?php echo (isset($goods_info['gp_market_price']) && ($goods_info['gp_market_price'] !== '')?$goods_info['gp_market_price']:'0.00'); ?></span>
                    </p>
                </div>
                <div class="details_canpai_cancel rt">
                    <img src="__STATIC__/image/details/652@2x.png">
                </div>
            </div>
            <!--选择价格-->
            <div class="details_canpai_quantity details_evaluate_padding clear">
                <p class="details_pitch_text">当前库存剩余<span class="left_num"><?php echo (isset($goods_info['gp_stock']) && ($goods_info['gp_stock'] !== '')?$goods_info['gp_stock']:'0'); ?></span>份</p>
            </div>
            <!--选择价格 end-->
            <div class="details_canpai_quantity clear">
                <div class="details_canpainum lf">
                    <p>份数(每份对应一个吖吖码)</p>
                    <span>该商品单个用户每期最多拍<span id="gdr_membernum"><?php echo (isset($goods_info['g_limited']) && ($goods_info['g_limited'] !== '')?$goods_info['g_limited']:'0'); ?></span>份</span>
                </div>
                <div class="details_canpai_but rt clear">
                    <div class="details_prep lf">
                        <img src="__STATIC__/image/details/icon_-@2x.png">
                    </div>
                    <div class="details_inp lf">
                        <input type="number" name="num" value="1" min="1" max="<?php echo $max_pai_num; ?>" readonly>
                    </div>
                    <div class="details_add lf">
                        <img src="__STATIC__/image/details/icon_+@2x.png">
                    </div>
                </div>
            </div>

            <a href="javascript:void(0);">
                <input type="hidden" name="gs_id" value="<?php echo (isset($goods_info['g_typeid']) && ($goods_info['g_typeid'] !== '')?$goods_info['g_typeid']:'1'); ?>"/>
                <input type="hidden" name="gp_id" value="<?php echo (isset($goods_info['gp_id']) && ($goods_info['gp_id'] !== '')?$goods_info['gp_id']:'0'); ?>"/>
                <!-- 判断是否登录 -->
                <input type="hidden" name="m_id" value="<?php echo (isset($m_id) && ($m_id !== '')?$m_id:0); ?>"/>
                <div class="details_canpai_sure">
                    确定参团
                </div>
            </a>
        </div>
    </div>
    
    <!-- 底部浮动按钮 S -->
    <div class="details_bottom clear phonex">
        <div class="details_bottom_lf lf clear">
            <a class="phs" href="tel:400-027-1888">
                <div class="details_evaluate_kefu_view lf">
                    <div class="details_evaluate_kefu">
                        <img src="/static/image/details/kefu.png">
                    </div>
                    <p class="details_bottom_border">客服</p>
                </div>
            </a>

            <div class="details_lines lf"></div>
            <a onclick="collection(<?php echo isset($goods_info['g_id']) ? $goods_info['g_id'] :  ''; ?>)">
                <div class="details_evaluate_kefu_view lf">
                    <div class="details_evaluate_kefu details_shoucang">
                        <?php if($is_collection > 0): ?>
                        <img src="__STATIC__/image/goodsproduct/yishoucang1@2x.png">
                        <?php else: ?>
                        <img src="__STATIC__/image/details/shoucang.png">
                        <?php endif; ?>
                    </div>
                    <p class="details_bottom_border">收藏</p>
                </div>
            </a>
        </div>
        <button class="details_bottom_rt auction lf details_cd" onclick="pay()">立即参团</button>
    </div>
    <!-- 底部浮动按钮 E -->
</main>

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

<!-- 分享弹窗 S -->
<div class="share-pop">
    <div class="share-over"></div>
    <div class="share-tip"></div>
    <div class="share-cont">
        <img class="share-tit" src="__STATIC__/image/popularity/share-tit.png"/>
        <img class="share-code" src="<?php echo $goods_info['code']; ?>"/>
        <p>长按保存二维码到本地</p>
        <div data-clipboard-text="<?php echo $goods_info['url']; ?>" class="share-link">直接分享</div>
        <div class="share-link-wx">直接分享</div>
    </div>
</div>
<!-- 分享弹窗 E -->

<!-- 支付密码浮动层 S -->
<div class="ftc_wzsf">
    <div class="srzfmm_box">
        <div class="qsrzfmm_bt clear_wl">
            <span class="">请输入支付密码</span>
            <img src="__STATIC__/image/orderpai/icon_nav_X@2x.png" class="tx close fr conf_order_colse">
        </div>
        <div class="zfmmxx_shop conf_order_paypassword_main clear">
            <p class="conf_order_hints">
                <span class="conf_order_fuhao">￥</span>
                <span class="all_money">100</span>
                <input type="hidden" id="pm_id"/>
            </p>
        </div>
        <div class="inputBoxContainer" id="inputBoxContainer">
            <input type="tel" class="realInput" autofocus="autofocus"/>
            <div class="bogusInput">
                <input type="password" maxlength="6" disabled class="active99"/>
                <input type="password" maxlength="6" disabled/>
                <input type="password" maxlength="6" disabled/>
                <input type="password" maxlength="6" disabled/>
                <input type="password" maxlength="6" disabled/>
                <input type="password" maxlength="6" disabled/>
            </div>
        </div>
        <div class="conf_order_paypassword_hint clear">
            <div class="conf_order_balance lf">当前余额
                <span> ￥ 200</span>
                <p class="lack_msg">余额不足请立即充值</p>
            </div>
            <a href="/member/wallet/recharge/r_jump_type/4/r_jump_id/">
                <div class="conf_order_pay rt">充值</div>
            </a>
        </div>
        <a href="/member/Register/amnesia_payment">
            <p class="conf_forget">忘记密码</p>
        </a>
    </div>
    <div class="hbbj"></div>
</div>
<!-- 支付密码浮动层 E -->

<!-- 支付成功弹窗 S -->
<div class="pay-success">
    <div class="pay-success-over"></div>
    <div class="pay-success-cont">
        <h3>支付成功 <span></span></h3>
        <img/>
        <p></p>
        <div><span class="lf">人气值：<small class="rqz"></small></span><span class="rt">排名：<small
                class="pm"></small></span></div>
        <small>快去邀请小伙伴为你点赞吧！</small>
        <a onclick="share(2)">邀请好友</a>
    </div>
</div>
<!-- 支付成功弹窗 E -->

<input type="hidden" id="app"/>
<!-- 安卓，ios分享效果 E -->

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
<script type="text/javascript" src="__JS__/goodsproduct/swiper.min.js"></script>
<script src="__STATIC__/js/clipboard.min.js"></script>
<script type="text/javascript" src="__JS__/md5.js"></script>
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script type="text/javascript" src="__JS__/goodsproduct/details.js"></script>
<script type="text/javascript" src="__JS__/liMarquee/jquery.liMarquee.js"></script>
<script src="__JS__/baguetteBox/baguetteBox.js"></script>
<script src="__JS__/baguetteBox/highlight.min.js"></script>
<script>
    // location.reload();

    // banner轮播效果
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
            $('.phs').removeAttr('href').attr('onclick','call(4000271888)');
        })
    })

    function call(tel) {
        var data = '{"tel": "'+ tel +'"}'
        setupWebViewJavascriptBridge(function(bridge) {
            /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
            bridge.callHandler('call_tel',data);
        })
    }

    //关闭app分享弹窗
    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })

    // 获取地址栏是否带分享参数
    function getQueryString(name) {
        var reg = new RegExp("(^|&|/)" + name + "=([^&]*)(&|$)", "i");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]);
        return null;
    }

    //url带分享参数返回首页，否则返回上一页
    $('.back-btn').click(function () {
        if (getQueryString("share") != null) {
            window.location.href = "/index/index/";
        } else {
            window.history.go(-1);
        }
    })

    // 点击分享页面消失
    $('.share-over').click(function () {
        $('.share-pop').hide();
    });

    function pay() {
        var m_id = $("input[name=m_id]").val();
        if (m_id == 0 || m_id == '') {
            layer.confirm("您还没有登录，请登录！", {
                title: false,/*标题*/
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
    }

    //隐藏确定参团弹窗
    $('.details_canpai_cancel').click(function () {
        $(".details_canpai").removeClass("details_canpai_dis");
    });
    $('.details_canpai_over').click(function(){
        $(".details_canpai").removeClass("details_canpai_dis");
    })

    $(".details_tit_top").click(function () {
        // var this_gp_id = $("input[name=gp_id]").val();
        // if (this_gp_id) {
        window.location.href = "/pointpai/Pointorder/pai_mem_list/gp_id/<?php echo $goods_info['gp_id']; ?>";

        // }
    });

    // 参团请求
    function can_tuan(num,gp_id,gs_id) {
        var m_id = $("input[name=m_id]").val();
        if (m_id == 0 || m_id == '') {
            layer.confirm("您还没有登录，请登录！", {
                title: false,/*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['知道啦', '前去登录'], //按钮
                // 按钮2的回调
                btn2: function () {                    
                    window.location.href = "/member/login/index";
                }
            })
        }else {
            // 请求
            $.ajax({
                url: "<?php echo url('Pointgoods/rewriteUrl'); ?>",
                dataType: 'json',
                type: 'POST',
                data: {num: num, gp_id: gp_id, gs_id: gs_id},
                success: function (data) {
                    if (data.status == 1) {
    //                    if(getCookie("version") == null && $('#backH5').val() == '') {
                            window.location.href = '/pointpai/Pointorder/confirm_order/pcode/' + data.data;

    //                    }
    //                    if($("input[name=m_id]").val() == 0 || $("input[name=m_id]").val() == '') {
    //                        if(getCookie("version") != null)  {
    //                            window.android.h5NeedLogin();
    //                        }else if($('#backH5').val() != '') {
    //                            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    //                            setupWebViewJavascriptBridge(function(bridge) {
    //                                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
    //                                bridge.callHandler('h5NeedLogin');
    //                            })
    //                        }
    //                    }
                    } else {
                        layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                            time: 2000
                        });
                    }
                }
            });
        }        
    }

    // 确定参团
    $('.details_canpai_sure').click(function () {
        //数量
        var num = $('input[name=num]').val();
        var gp_id = $('input[name=gp_id]').val();
        var gs_id = $("input[name=gs_id]").val();
        // 请求
        can_tuan(num,gp_id,gs_id);
    });

    // 参团
    $('.details_schedule_right_btn ').click(function () {
        //数量
        var num = 1;
        var gp_id = $('input[name=gp_id]').val();
        var gs_id = $("input[name=gs_id]").val();
        // 请求
        can_tuan(num,gp_id,gs_id);
    });

    //当前时间
    var nowTime = "<?php echo $now_time; ?>";
    nowTime=nowTime*1000;
    var timerInterval = null;
    //倒计时
    function timer(intDiff, idName) {
        timerInterval = setInterval(function (e) {
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
                if (day == 0 && hour == 0 && minute == 0 && second == 1) {
                    clearInterval(timerInterval);
                    $('.details_rt').empty().append('<span class="yjs">已结束</span>');
                    $('.details_data').addClass('detail_back');
                    $('.details_bottom_rt').addClass('detail_back').attr('disabled','disabled').removeAttr('onclick');
                }
            }
            if (minute <= 9) minute = '0' + minute;
            if (second <= 9) second = '0' + second;
            
            $(idName + ' .details_day').html(' <span>' + day + '</span>天');
            $(idName + ' .details_hour').html('<span>' + hour + '</span>');
            $(idName + ' .details_minute').html('<span>' + minute + '</span>');
            $(idName + ' .details_second').html('<span>' + second + '</span>');
            intDiff -= 1000;    
            //判断time做人气王诞生弹窗，time>10  不做请求    time<=10 开始请求
            //var showTime = Math.ceil(intDiff/1000)
            // console.log(showTime) 
            // if(sessionStorage.getItem('clears') != 2) {
            //     if(showTime<=5){
            //         getStatus(showTime);
            //     }
            // }  
        }, 1000);
    }
    var end_time = <?php echo $goods_info['g_endtime']; ?> * 1000 - nowTime;
    timer(end_time, '#first');

    //商品结束状态
    if(end_time<=0) {
        $('.details_rt').empty().append('<span class="yjs">已结束</span>');
        $('.details_data').addClass('detail_back');
        $('.details_bottom_rt').addClass('detail_back').attr('disabled','disabled').removeAttr('onclick');
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
            $.post("/pointpai/goodscollection/add_collection", {g_id: id}, function (res) {
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

    var share_qr_image = "https://"+document.domain+"<?php echo $goods_info['code']; ?>";
    //显示分享弹窗    
    $('.details_top_rt').click(function(){
        var data = '{"share_title": "'+ title +'","share_content": "' + desc + '","share_url": "' + link + '","share_image": "' + imgUrl + '","is_share_to_firend_circle": "1","share_qr_image":"'+ share_qr_image +'","type": "1"}';

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
            // 微信浏览器端安卓分享
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
                    $('.share-pop').show();
                    $('.share-cont').show();
                    $('.share-tip').hide();
                }
            } else{
            // 非微信浏览器端安卓分享
                $('.share-pop').show();
                $('.share-cont').show();
                $('.share-tip').hide();
            }       
        }         
    }) 

    //隐藏分享弹窗
    $('.share-over').click(function(){
        $('.share-pop').hide();
    });

    //复制功能
    var btns = document.querySelectorAll('.share-link');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });

    clipboard.on('error', function(e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>',{time:2000});
    });

    //微信分享提示
    $('.share-link-wx').click(function(){
        $('.share-cont').hide();
        $('.share-tip').show();
    });

    // 判断是否在微信内
    if(isWeiXin()){
        $('.share-link-wx').show();
        $('.share-link').hide();
    }else{
        $('.share-link').show();
        $('.share-link-wx').hide();
    }

    function share(id) {
        var is_share_to_firend_circle = '';
        if(id == 0) {
            is_share_to_firend_circle = false;
        }else {
            is_share_to_firend_circle = true;
        }

        var data = '{"share_title": "'+ title +'","share_content": "' + desc + '","share_url": "' + link + '","share_image": "' + imgUrl +
            '","is_share_to_firend_circle": '+is_share_to_firend_circle+'}';

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
    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })

    //评价图片报错填充默认图
    // $('.gallery img').on('error',function(){
    //     $(this).attr('src','/static/image/index/pic_home_taplace@2x.png');
    // });
    //评价图片放大
    // baguetteBox.run('.gallery');
    $('.jfgcet').css("width","<?php echo (isset($pai_progress['pai_rate']) && ($pai_progress['pai_rate'] !== '')?$pai_progress['pai_rate']:0); ?>%")
    console.log("<?php echo $review_count; ?>");
    if(<?php echo $review_count; ?>==0){
        $(".notpj").css({display:"none"});
    }else{
        $(".notpj").css({display:"block"});
    }
</script>

</html>