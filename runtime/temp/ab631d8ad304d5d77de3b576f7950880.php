<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"D:\project\pai\public/../application/member/view/myhome/index.html";i:1541491283;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/footer.html";i:1541986719;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/myhome/mine.css">
<!-- <link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css"> -->
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/2.7.0/idangerous.swiper.css" rel="stylesheet">

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
        
<main style="margin-top: 0;background: #fefefe;">
    <div class="mine_top">
        <div class="mine_tit">
            <p class="mine_text">我的</p>
            <!--<div class="mine_size my-icon">-->
            <!--<?php if($data['is_read'] == 1): ?>-->
            <!--<span></span>-->
            <!--<?php endif; ?>-->
            <!--&lt;!&ndash;<a href="/member/systemmsg/index">&ndash;&gt;-->
            <!--&lt;!&ndash;<img src="__STATIC__/image/myhome/msg.png">&ndash;&gt;-->
            <!--&lt;!&ndash;</a>&ndash;&gt;-->
            <!--</div>-->
            <div class="mine_size">
                <a href="/member/modifydata/set_data">
                    <img src="__STATIC__/image/myhome/icon_nav_set@2x.png">
                </a>
            </div>
        </div>
        <div class="mine_name">
            <a href="/member/modifydata/self_data">
                <!--用户显示-->
                <div class="clear">
                    <div class="mine_head_portrait lf">
                        <img src="__STATIC__/image/myhome/TIM20180731142117.jpg"
                             data-original="__CDN_PATH__<?php echo isset($data['m_avatar']) ? $data['m_avatar'] :  ''; ?>">
                    </div>
                    <p class="mine_name_text lf"><?php echo isset($data['m_name']) ? $data['m_name'] :  ''; ?></p>
                </div>
                <div class="myhome_vip">
                    <img src="<?php echo isset($data['ml_img']) ? $data['ml_img'] :  ''; ?>" alt="">
                    <!--吖吖推广员显示-->
                    <!--<img src="__STATIC__/image/myhome/icon_tuiguang@2x.png" alt="">-->
                </div>
                <!-- 已登录显示下边样式 -->
                <!-- 未登录或者未注册显示下边样式 -->
                <!--<div class="lf">-->
                <!--<p class="mine_name_texts">登录注册拍吖吖 享受超级大福利</p>-->
                <!--<div class="clear">-->
                <!--<a href=""><div class="mine_login lf">登录</div></a>-->
                <!--<a href=""><div class="mine_register lf">注册</div></a>-->
                <!--</div>-->
                <!--</div>-->
            </a>
        </div>
        <!-- 已登录显示下边样式 -->
        <a href="/member/core/index">
            <div class="mine_vip">
                <img src="__STATIC__/image/myhome/vip@2x.png">
            </div>
        </a>
        <div class="mine_wave">
            <img src="__STATIC__/image/myhome/icon_demo_jianbian@2x.png">
        </div>
    </div>
    <!--用户显示-->
    <?php if($data['m_type']==0): ?>
    <div class="mine_nav clear">
        <a href="<?php echo url('goodscollection/goods_list'); ?>">
            <div class="mine_collect lf">
                <?php echo isset($data['goods_collection']) ? $data['goods_collection'] :  0; ?>
                <!--<div class="mine_new"><span>1</span></div>-->
                <p>收藏夹</p>
            </div>
        </a>
        <a href="<?php echo url('storecollection/store_list'); ?>">
            <div class="mine_collect lf">
                <?php echo isset($data['store_collection']) ? $data['store_collection'] :  0; ?>
                <!--<div class="mine_new"><span>1</span></div>-->
                <p>关注店铺</p>
            </div>
        </a>
        <a href="/member/myhome/visit_list">
            <div class="mine_collect lf">
                <?php echo isset($data['visit_goods_history']) ? $data['visit_goods_history'] :  0; ?>
                <!--<div class="mine_new"><span>1</span></div>-->
                <p>历史足迹</p>
            </div>
        </a>
    </div>
    <div class="mine_bg"></div>
    <?php endif; ?>
    <!--用户显示结束-->
    <!--商家显示-->
    <?php if($data['m_type']==1): ?>
    <div class="myhome_shop">
        <div class="myhome_shop_top clear">
            <div class="myhome_shop_img lf">
                <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="<?php echo $data['store_logo']; ?>">
            </div>
            <p class="lf"><?php echo $data['store_name']; ?></p>
            <div class="myhome_shop_select rt">
                <a href="/member/store/index/store_id/<?php echo $data['store_id']; ?>">
                    <span>我的店铺</span>
                </a>
                <img src="__STATIC__/image/myhome/icon_jump3@2x.png" alt="">
            </div>
        </div>
        <!--没有发布商品的时候-->
        <?php if($data['goods']['len'] == 0): ?>
        <a href="/member/goods/index">
            <div class="myhome_shop_pub_list clear">
                <div class="myhome_shop_publish">
                    <img src="__STATIC__/image/myhome/icon_xiangji@2x.png" alt="">
                    <span>立即发布</span>
                </div>
            </div>
        </a>
        <?php elseif($data['goods']['len'] < 4): ?>
        <!--发布商品不超过4个时-->
        <div class="myhome_shop_pub_list clear">
            <a href="/member/goods/index">
                <div class="myhome_shop_pub_img lf">
                    <img src="__STATIC__/image/myhome/icon_+@2x.png" alt="">
                </div>
            </a>
            <?php if(is_array($data['goods']['list']) || $data['goods']['list'] instanceof \think\Collection || $data['goods']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['goods']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="/member/goodsproduct/index/g_id/<?php echo $vo['g_id']; ?>">
                <div class="myhome_shop_pub_img lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="<?php echo $vo['g_img']; ?>">
                </div>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <?php else: ?>
        <div class="myhome_shop_pub_list clear">
            <a href="/member/goods/index">
                <div class="myhome_shop_pub_img lf">
                    <img src="__STATIC__/image/myhome/icon_+@2x.png" alt="">
                </div>
            </a>
            <?php if(is_array($data['goods']['list']) || $data['goods']['list'] instanceof \think\Collection || $data['goods']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['goods']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href="/member/goodsproduct/index/g_id/<?php echo $vo['g_id']; ?>">
                <div class="myhome_shop_pub_img lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="<?php echo $vo['g_img']; ?>">
                </div>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </div>

        <!--&lt;!&ndash;发布商品超过4个时&ndash;&gt;-->
        <!--<div class="myhome_shop_pub_list clear">-->
        <!--<?php if(is_array($data['goods']['list']) || $data['goods']['list'] instanceof \think\Collection || $data['goods']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['goods']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
        <!--<a href="/member/goodsproduct/index/g_id/<?php echo $vo['g_id']; ?>">-->
        <!--<div class="myhome_shop_pub_img lf">-->
        <!--<img src="<?php echo $vo['g_img']; ?>" alt="加载中">-->
        <!--</div>-->
        <!--</a>-->
        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
        <!--&lt;!&ndash;<div class="myhome_shop_pub_img myhome_shop_pub_image lf">&ndash;&gt;-->
        <!--&lt;!&ndash;<img src="__STATIC__/image/myhome/icon_fazhan@2x.png" alt="">&ndash;&gt;-->
        <!--&lt;!&ndash;</div>&ndash;&gt;-->
        <!--&lt;!&ndash;<div class="myhome_shop_pub_img lf">&ndash;&gt;-->
        <!--&lt;!&ndash;<img src="__STATIC__/image/myhome/icon_huoban@2x.png" alt="">&ndash;&gt;-->
        <!--&lt;!&ndash;</div>&ndash;&gt;-->
        <!--&lt;!&ndash;<div class="myhome_shop_pub_img lf">&ndash;&gt;-->
        <!--&lt;!&ndash;<img src="__STATIC__/image/myhome/icon_jifen@2x.png" alt="">&ndash;&gt;-->
        <!--&lt;!&ndash;</div>&ndash;&gt;-->
        <!--</div>-->
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <!--商家显示结束-->

    <!--商家显示-->
    <div class="mine_view">
        <div class="mine_compete clear">
            <p class="lf active" i=0>吖吖订单</p>
            <?php if($is_lord ==1): else: ?>
            <p class="lf" i=1>人气购订单</p>
            <p class="lf" i=2>积分订单</p>
            <?php endif; ?>
        </div>

        <!--轮播-->
        <div id="swiper" class="swiper-container size_over">
            <div id="swiperWrapper" class="swiper-wrapper">
                <!--吖吖订单-->
                <div class="swiper-slide">
                    <div class="mine_tab clear">
                        <a href="/member/Orderpai/orderlist/i/1">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d1.png">
                                <p>待付款</p>
                                <div class="mine_red_new"></div>
                                <!-- <?php if(!(empty($order[1]) || (($order[1] instanceof \think\Collection || $order[1] instanceof \think\Paginator ) && $order[1]->isEmpty()))): ?><?php echo isset($order[1]) ? $order[1] :  ''; endif; ?> -->
                            </div>
                        </a>
                        <a href="/member/Orderpai/orderlist/i/2">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d2.png">
                                <p>进行中</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                        <a href="/member/Orderpai/orderlist/i/3">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d3.png">
                                <p>待发货</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                        <a href="/member/Orderpai/orderlist/i/4">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d4.png">
                                <p>待评价</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>

                        <a href="/member/Orderpai/orderlist/i/0">
                            <div class="mine_tab_list mine_tab_dingdan lf mine_all_order">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d5.png">
                                <p>全部订单</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php if($is_lord ==1): else: ?>
                <!--人气购订单-->
                <div id="mescroll1" class="swiper-slide mescroll size_over">
                    <div class="mine_tab">
                        <a href="/popularity/popularityorder/order_list/i/1">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/myhome/d2.png">
                                <p>进行中</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                        <a href="/popularity/popularityorder/order_list/i/2">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/myhome/icon_daifahuo@2x.png">
                                <p>待确认</p>
                                <!-- <p>待发货</p> -->
                                <div class="mine_red_new"></div>

                                <div class="mine_daiqueren" style="display: none;">
                                    待选择地址
                                </div>
                            </div>
                        </a>
                        <a href="/popularity/popularityorder/order_list/i/3">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/myhome/d3.png">
                                <p>待收货</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                        <a href="/popularity/popularityorder/order_list/i/4">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/myhome/icon_weipaizhong@2x.png">
                                <p>已结束</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                        <a href="/popularity/popularityorder/order_list/i/0">
                            <div class="mine_tab_list mine_tab_dingdan lf mine_all_order">
                                <img src="__STATIC__/image/myhome/d5.png">
                                <p>全部订单</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <!--积分订单-->
                <div class="swiper-slide">
                    <div class="mine_tab clear">
                        <a href="/pointpai/Pointorder/orderlist/i/1">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d1.png">
                                <p>待付款</p>
                                <div class="mine_red_new"></div>
                                <!-- <?php if(!(empty($order[1]) || (($order[1] instanceof \think\Collection || $order[1] instanceof \think\Paginator ) && $order[1]->isEmpty()))): ?><?php echo isset($order[1]) ? $order[1] :  ''; endif; ?> -->
                            </div>
                        </a>
                        <a href="/pointpai/Pointorder/orderlist/i/2">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d2.png">
                                <p>进行中</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                        <a href="/pointpai/Pointorder/orderlist/i/3">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d3.png">
                                <p>待发货</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                        <a href="/pointpai/Pointorder/orderlist/i/4">
                            <div class="mine_tab_list mine_tab_dingdan lf">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d4.png">
                                <p>待评价</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>

                        <a href="/pointpai/Pointorder/orderlist/i/0">
                            <div class="mine_tab_list mine_tab_dingdan lf mine_all_order">
                                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                                     data-original="__STATIC__/image/myhome/d5.png">
                                <p>全部订单</p>
                                <div class="mine_red_new"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <div class="mine_bg"></div>
    <!--<div class="mine_bg"></div>-->
    <?php if($data['m_type']==0): ?>
    <!--用户显示-->
    <!--<div class="mine_view mine_pat">-->
    <!--<div class="mine_compete clear">-->
    <!--<p class="lf">我团中的</p>-->
    <!--<a href="/member/Orderpai/orderlist/type/1">-->
    <!--<div class="rt">-->
    <!--<span>所有团中</span>-->
    <!--<img src="__STATIC__/image/myhome/icon_jump@2x.png">-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--<div class="mine_tab clear">-->
    <!--<a href="/member/Orderpai/orderlist/type/1/i/1">-->
    <!--<div class="mine_tab_list lf">-->
    <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/myhome/icon_yipaizhong@2x.png">-->
    <!--<p>待发货</p>-->
    <!--<div class="mine_red_new"><?php echo isset($order[2]) ? $order[2] :  ''; ?></div>-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/Orderpai/orderlist/type/1/i/2">-->
    <!--<div class="mine_tab_list lf">-->
    <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/myhome/icon_yifahuo@2x.png">-->
    <!--<p>待收货</p>-->
    <!--<div class="mine_red_new"><?php echo isset($order[3]) ? $order[3] :  ''; ?></div>-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/Orderpai/orderlist/type/1/i/3">-->
    <!--<div class="mine_tab_list lf">-->
    <!--<a href="<?php echo url('Review/review_add'); ?>">-->
    <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/myhome/icon_pingjia@2x.png">-->
    <!--<p>待评价</p>-->
    <!--</a>-->
    <!--<div class="mine_red_new"><?php echo isset($order[4]) ? $order[4] :  ''; ?></div>-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/Orderpai/orderlist/type/1/i/4">-->
    <!--<div class="mine_tab_list lf">-->
    <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/myhome/icon_tuikuan_shouhou@2x.png">-->
    <!--<p>退款/售后</p>-->
    <!--<div class="mine_red_new"></div>-->
    <!--</div>-->
    <!--</a>-->
    <!--<a href="/member/Orderpai/orderlist/type/1/i/5">-->
    <!--<div class="mine_tab_list lf">-->
    <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/myhome/icon_yiwancheng@2x.png">-->
    <!--<p>已完成</p>-->
    <!--<div class="mine_red_new"></div>-->
    <!--</div>-->
    <!--</a>-->
    <!--</div>-->
    <!--</div>-->
    <!--<div class="mine_bg"></div>-->
    <!--申请商家入驻-->
    <!--<a href="/member/admit/apply_store" >-->
    <!--<div class="mine_banner">-->
    <!--<img src="__STATIC__/image/myhome/bannerruzhu@2x.png" alt="">-->
    <!--</div>-->
    <!--</a>-->
    <?php endif; if($is_lord ==1): else: ?>
    <!--吖吖推广员入口-->
    <div class="promoters_in">
        <img src="__STATIC__/image/myhome/pic_tgy@2x.png" alt="">
        <img src="__STATIC__/image/promoters/bg_qipaokh@2x.png" alt="" class="is_kaohe">
    </div>
    <?php endif; ?>


    <!--<div class="mine_bg"></div>-->
    <!--用户显示结束-->
    <!--<div class="mine_bg"></div>-->
    <!--用户显示-->
    <?php if($is_lord ==1): else: ?>
    <div class="mine_return">
        <img src="__STATIC__/image/myhome/icon_fubiao@2x.png" alt="">
    </div>
    <?php endif; if($data['m_type']==0): ?>
    <div class="mine_view">

        <div class="mine_compete clear">
            <p class="lf mine_compete_action">我的功能</p>
        </div>
        <div class="mine_tab clear">
            <!--<a href="/member/wallet/index">-->
            <a class="mine_tab_list mine_money lf">
                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                     data-original="__STATIC__/image/myhome/icon_qinabao@2x.png">
                <p>我的钱包</p>
                <div class="mine_red_new"></div>
            </a>
            <!--</a>-->
            <a href="/member/myhome/peanut">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_huasheng@2x.png">
                    <p>我的花生</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <a href="<?php echo url('Review/index'); ?>">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_pingjia@2.png">
                    <p>我的评价</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <!--<a href="##">-->
            <!--<div class="mine_tab_list lf">-->
            <!--<img src="__STATIC__/image/myhome/icon_yaoqing@2x.png">-->
            <!--<p>我的兑换</p>-->
            <!--<div class="mine_red_new"></div>-->
            <!--</div>-->
            <!--</a>-->
            <a href="/member/modifydata/use_help/">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_kefu@2x.png">
                    <p>帮助中心</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <!--<a href="/member/partner/index">-->
            <!--<div class="mine_tab_list lf">-->
            <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/myhome/icon_huoban1@2x.png">-->
            <!--<p>合伙人</p>-->
            <!--<div class="mine_red_new"></div>-->
            <!--</div>-->
            <!--</a>-->
        </div>
    </div>
    <?php endif; ?>
    <!--用户显示结束-->
    <!--商家显示-->
    <?php if($data['m_type']==1): ?>
    <div class="mine_view">
        <div class="mine_compete clear">
            <p class="lf mine_compete_action">我的功能</p>
        </div>
        <div class="mine_tab clear">
            <!--<a href="/member/wallet/index">-->
            <a class="mine_tab_list mine_money lf">
                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                     data-original="__STATIC__/image/myhome/icon_qinabao@2x.png">
                <p>我的钱包</p>
                <div class="mine_red_new"></div>
            </a>
            <!--</a>-->
            <a href="/member/myhome/peanut">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_huasheng@2x.png">
                    <p>我的花生</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <a href="<?php echo url('Review/index'); ?>">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_pingjia@2.png">
                    <p>我的评价</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <a href="/member/Goodscollection/goods_list">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_shoucang@2x.png">
                    <p>我的收藏</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <a href="/member/Storecollection/store_list">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_guanzhu@2x.png">
                    <p>我的关注</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <a href="/member/myhome/visit_list">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_lishi@2x.png">
                    <p>历史足迹</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <a href="/member/modifydata/use_help/">
                <div class="mine_tab_list lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__STATIC__/image/myhome/icon_kefu@2x.png">
                    <p>帮助中心</p>
                    <div class="mine_red_new"></div>
                </div>
            </a>
            <!--<a href="/member/partner/index">-->
            <!--<div class="mine_tab_list lf">-->
            <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__STATIC__/image/myhome/icon_huoban1@2x.png">-->
            <!--<p>合伙人</p>-->
            <!--<div class="mine_red_new"></div>-->
            <!--</div>-->
            <!--</a>-->
        </div>
    </div>
    <?php endif; ?>
    <!--商家显示结束-->

    <!--等待刘勇豪的数据s-->
    <!--累积满7天之后的展示效果s-->
    <!--<div class="mine_fanxian_pop">-->
    <!--<div class="mine_fanxian_con">-->
    <!--<a href="/member/myhome/cashback_rule/">查看规则</a>-->
    <!--<div class="mine_fanxian_icon">-->
    <!--<img src="__STATIC__/image/myhome/icon_jump0@2x.png" alt=""/>-->
    <!--</div>-->
    <!--<p class="mine_day">累计<span>7</span>天</p>-->
    <!--<p class="mine_gongxi">恭喜！获得未成团全额退款资格</p>-->
    <!--<p class="mine_hint">每日拍一单，即可维持该资格</p>-->
    <!--</div>-->
    <!--</div>-->
    <!--累积满7天之后的展示效果e-->
    <!--一天拍够3单的展示效果s-->
    <!--<div class="mine_fanxian_pop">-->
    <!--<div class="mine_fanxian_con">-->
    <!--<a href="/member/myhome/cashback_rule/">查看规则</a>-->
    <!--<div class="mine_fanxian_icon">-->
    <!--<img src="__STATIC__/image/myhome/icon_jump0@2x.png" alt=""/>-->
    <!--</div>-->
    <!--<p class="mine_day">今日已团<span>3</span>单</p>-->
    <!--<p class="mine_gongxi">今日获得未成团全额退款资格</p>-->
    <!--<p class="mine_hint">连续7天参团，也可获得资格</p>-->
    <!--</div>-->
    <!--</div>-->
    <!--一天拍够3单的展示效果e-->


    <!--累积不满7天并且一天也没有拍够3单的展示效果s-->
    <div class="mine_fanxian_pop">
        <!--<div class="mine_fanxian_cons">-->
        <!--<a href="/member/myhome/cashback_rule/">查看规则</a>-->
        <!--<div class="mine_fanxian_icon">-->
        <!--<img src="__STATIC__/image/myhome/icon_jump0@2x.png" alt=""/>-->
        <!--</div>-->
        <!--<p class="mine_day">今日已团<span>3</span>单</p>-->
        <!--<p class="mine_leiji">已累计<span>3</span>天,满7天后</p>-->
        <!--<p class="mine_leiji">即可获得未成团全额退款资格</p>-->
        <!--<h3>条件二:</h3>-->
        <!--<p class="mine_hint">当天拍3单，也可获得特权</p>-->
        <!--<p class="mine_dan">今天已团<span>2</span>单,还差<span>1</span>单</p>-->
        <!--</div>-->
    </div>
    <!--累积不满7天并且一天也没有拍够3单的展示效果e-->
    <!--等待刘勇豪的数据e-->

    <!--是吖吖推广员时显示-->
    <?php if($data['tgy_img'] != ''): ?>
    <div class="is_promoters">
        <img src=<?php echo $data['tgy_img']; ?> alt="">
        <!--<span>恭喜成为推广员</span>-->
    </div>
    <?php endif; ?>
</main>

        <footer>
<?php if($is_lord ==1): if($m_type==0): ?>
<div style="height: 1.6rem;"></div>
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
<div style="height: 1.6rem;"></div>
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
<div style="height: 1.6rem;"></div>
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
<div style="height: 1.6rem;"></div>
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
<script type="text/javascript" src="__JS__/myhome/mine.js"></script>
<!-- <script src="__JS__/swiper/swiper-3.3.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/2.7.0/idangerous.swiper.js"></script>
<script src="__JS__/cookie/jquery.cookie.js"></script>
<script>
    $.ajax({
        type: 'POST',
        url: '/popularity/popularityorder/find_no_address_aworder',
        dataType: 'json',
        success: function (data) {
            if (data.status == 8) {
                $(".mine_daiqueren").show();
            }
        }
    })
    // 手机调试
    // var vConsole = new VConsole();
    // console.log('VConsole is cool');
    /*初始化轮播*/
    var swiper = new Swiper('#swiper', {
        initialSlide: 0,
        onSlideChangeEnd: function (swiper) {
            // alert("e");
            var i = swiper.activeIndex;//轮播切换完毕的事件
            $.cookie('index', i, {expire: 7});
            changePage(i);
        }
        // onTransitionEnd: function (swiper) {
        // alert("e")
        // var i = swiper.activeIndex;//轮播切换完毕的事件
        // changePage(i);
        // }
    });

    /*菜单点击事件*/
    $(".mine_compete p").click(function () {
        var i = Number($(this).attr("i"));
        /* 创建cookie来记录选中的状态*/
        $.cookie('index', i, {expire: 7});
        // swiper.slideTo(i);//以轮播的方式切换列表
        swiper.swipeTo(i);
    });
    /*当页面切换时，读取cookie中index的状态，渲染到页面*/
    //问题：退出当前账号的时候，清除cookie，$.cookie('index', null);
    function getCookies() {
        var index = $.cookie('index');
        if (index) {
            $(".mine_compete p").removeClass('active')
            $(".mine_compete p").eq(index).addClass('active')
        }
        // swiper.slideTo(index);
        swiper.swipeTo(index)
    }

    getCookies();

    /*切换列表*/
    function changePage(i) {
        $(".mine_compete p").each(function (n, dom) {
            if (dom.getAttribute("i") == i) {
                dom.classList.add("active");
                curNavDom = dom;
            } else {
                dom.classList.remove("active");
            }
        });
    }

    $(".mine_return").click(function () {
        console.log(11);
        $.ajax({
            type: 'POST',
            url: '/member/Orderpai/get_tip_detail',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var days = data.data.no_tip_time - data.data.today_pai_num;
                console.log(days);
                var html = '';
                $(".mine_fanxian_pop").empty();
                if (data.status == 1) {
                    $(".mine_fanxian_pop").addClass("mine_fanxian_pop_dis");
                    if (data.data.total_days >= data.data.no_tip_days) {
                        html += '<div class="mine_fanxian_cons">';
                        html += ' <a href="/index/index/agreement/at_name/全额返活动规则">查看规则</a>';
                        //   html+=' <a href="/member/myhome/cashback_rule/">查看规则</a>';
                        html += '<div class="mine_fanxian_icon">';
                        html += '<img src="__STATIC__/image/myhome/icon_jump0@2x.png" alt=""/>';
                        html += '</div>';
                        html += ' <p class="mine_day">累计<span>' + data.data.total_days + '</span>天</p>'
                        html += '<p class="mine_gongxi">恭喜！获得未团中全额退款资格</p>'
                        html += '<p class="mine_hint">每日购一单，即可维持该资格</p>'
                        html += '</div>'
                        $(".mine_fanxian_con").css({
                            background: 'url("__STATIC__/image/myhome/di@2x.png") no-repeat center center',
                            backgroundSize: "100% 100%"
                        });
                    } else if (data.data.today_pai_num >= data.data.no_tip_time) {
                        html += '<div class="mine_fanxian_con">';
                        html += ' <a href="/index/index/agreement/at_name/全额返活动规则">查看规则</a>';
                        //   html+=' <a href="/member/myhome/cashback_rule/">查看规则</a>';
                        html += '<div class="mine_fanxian_icon">';
                        html += '<img src="__STATIC__/image/myhome/icon_jump0@2x.png" alt=""/>';
                        html += '</div>';
                        html += ' <p class="mine_day">今日已购<span>' + data.data.today_pai_num + '</span>单</p>'
                        html += '<p class="mine_gongxi">今日获得未团中全额退款资格</p>'
                        html += ' <p class="mine_hint">连续' + data.data.no_tip_days + '天购单，也可获得资格</p>'
                        html += '</div>'

                    } else {
                        html += '<div class="mine_fanxian_cons">';
                        html += ' <a href="/index/index/agreement/at_name/全额返活动规则">查看规则</a>';
                        //   html+=' <a href="/member/myhome/cashback_rule/">查看规则</a>';
                        html += '<div class="mine_fanxian_icon">';
                        html += '<img src="__STATIC__/image/myhome/icon_jump0@2x.png" alt=""/>';
                        html += '</div>';
                        html += '<p class="mine_day">今日已购<span>' + data.data.today_pai_num + '</span>单</p>';
                        html += '<p class="mine_leiji">已累计<span>' + data.data.total_days + '</span>天,满<span>' + data.data.no_tip_days + '</span>天后</p>';
                        html += '<p class="mine_leiji">即可获得未团中全额退款资格</p>';
                        html += '<h3>条件二:</h3>';
                        html += '<p class="mine_hint">当天购<span>' + data.data.no_tip_time + '</span>单，也可获得特权</p>';
                        html += '<div class="mine_bg_view"><p class="mine_dan">今天已购<span>' + data.data.today_pai_num + '</span>单,还差<span>' + days + '</span>单</p></div>';
                        html += '</div>';
                        $(".mine_fanxian_cons").css({
                            background: 'url("__STATIC__/image/myhome/bg@2x.png") no-repeat center center',
                            backgroundSize: "100% 100%"
                        });
                    }
                }
                $(".mine_fanxian_pop").append(html);
                $(".mine_fanxian_icon").click(function () {
                    $(".mine_fanxian_pop").removeClass("mine_fanxian_pop_dis");
                })
            },
            error: function (err) {
                console.log(22);
                console.log(err);
            }
        })
    })

    //活动参数
    //活动参数
    /**
     * 接口url：/member/Orderpai/get_tip_detail
     * 返回：status:0失败 1成功
     *       msg:提示信息
     *       data:返回数据
     *
     *       no_tip_time：系统的设置当天多少单后免手续费
     *       no_tip_days：系统的设置连续几天参团后免手续费
     *       today_pai_num：今天已经参团的订单数
     *       total_days：已经参团几天了(不含今天)
     **/


    var pwd = "<?php echo $data['m_payment_pwd']; ?>";
    //点击我的钱包
    $(".mine_money").click(function (e) {
        // alert("d");
        e.preventDefault();
        if (pwd == false) {
            layer.confirm('请先设置支付密码', {
                title: false, /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['取消', '立即设置'],
                btn2: function () {
                    location.href = "/member/modifydata/first_payment_pwd";
                }
            })
        } else {
            location.href = "/member/wallet/index/type/0";
        }
    });

    var is_pomoters = "<?php echo $data['is_promoters']; ?>";
    console.log(is_pomoters);
    if (is_pomoters == 4) {
        $('.promoters_in img.is_kaohe').show()
    }

    if (is_pomoters == 1) {
        $('.promoters_in').click(function () {
            // 1普通会员
            window.location.href = '/member/promoters/index'
        })

    } else if (is_pomoters == 4 || is_pomoters == 3) {
        // 3审核失败
        // 4考核中
        $('.promoters_in').click(function () {
            window.location.href = '/member/promoters/is_success'
        })

    } else if (is_pomoters == 2) {
        // 2申请中
        $('.promoters_in').click(function () {
            window.location.href = '/member/promoters/is_apply_success'
        })
    } else if (is_pomoters == 5) {
        // 5考核成功(推广员)  气泡显示，之后隐藏 吖吖推广员入口消失
        $('.promoters_in').hide();
        // 成为吖吖推广员的时候显示，然后自己消失
        // $('.is_promoters').show();


    } else if (is_pomoters == 6) {
        // 6考核失败 吖吖推广员入口消失
        $('.promoters_in').hide()
    }

    // var isShow = "<?php echo $data['tgy_img']; ?>";
    // console.log(isShow);
    // if(isShow){
    //    // $('.is_promoters').show();
    // }else{
    //    // $('.is_promoters').hide();
    //    $('.is_promoters').html=
    // }

</script>
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

</html>