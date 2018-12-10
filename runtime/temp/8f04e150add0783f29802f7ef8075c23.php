<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\project\pai\public/../application/index/view/index/index.html";i:1544423812;s:63:"D:\project\pai\public/../application/index/view/index/base.html";i:1544154864;s:66:"D:\project\pai\public/../application/index/view/common/footer.html";i:1544402806;s:66:"D:\project\pai\public/../application/index/view/common/js_sdk.html";i:1541491293;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/wallet/search_index.css">
<link rel="stylesheet" href="__CSS__/liMarquee/liMarquee.css">
<link rel="stylesheet" type="text/css" href="__CSS__/index/new_index.css">
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
        <!-- <script src="__JS__/common/bootstrap.min.js"></script> -->
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
        <script src="__STATIC__/lib/layui/layui.js"></script>
        <script src="__JS__/common/popups.js"></script>
        <!-- <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script> -->
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <!-- <script src="__JS__/login/loginsdk.js"></script> -->
        <!--web im sdk 登出 示例代码-->
        <!-- <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script> -->
        <title>首页</title>
    </head>
    <body>
        <header></header>
        
<main>
    <div class="index-top">
        <!-- app 扫码 S -->
        <div class="smicon"></div>
        <!-- app 扫码 E -->
        <!-- 搜索框 S -->
        <div class="index-so">
            <div class="index_search">搜索想要的宝贝</div>
            <!-- <div class="index-so-hot">热搜：<span onClick="hclic(this)"><small>iphonex</small></span></div> -->
        </div>
        <!-- 搜索框 E -->

        <!-- 消息图标 S -->
        <!-- <a class="index-msg"></a> -->
        <!-- 消息图标 E -->
    </div>

    <!-- banner S -->
    <div class="index-banner">
        <div class="swiper-container swiper-container1">
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
    </div>
    <!-- banner E -->
    <div class="index_con_nav">
        <div class="swiper-container swiper-container3">
            <div class="swiper-wrapper index_items">
                <?php if(!(empty($imgs['sydh']) || (($imgs['sydh'] instanceof \think\Collection || $imgs['sydh'] instanceof \think\Paginator ) && $imgs['sydh']->isEmpty()))): if(is_array($imgs['sydh']) || $imgs['sydh'] instanceof \think\Collection || $imgs['sydh'] instanceof \think\Paginator): $i = 0; $__LIST__ = $imgs['sydh'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="swiper-slide">
                            <a href="<?php echo $vo['wi_href']; ?>">
                                <div class="index_con_nav_view">
                                    <div>
                                        <img src="<?php echo $vo['wi_imgurl']; ?>" alt="">
                                    </div>
                                    <p><?php echo $vo['wi_name']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
        </div>      
    </div>
  

    <div class="index-cont">
        <!-- 公告 S -->
        <!-- <div class="index-notice">
            <div class="index-notice-title">
                <img class="dts" src="/static/image/index/gg.png" />
                <div>
                    <img src="/static/image/index/g1.png" />
                    <img src="/static/image/index/g2.png" />
                </div>
            </div>
            <div class="index-notice-cont">
                <div>
                    <ul class="gdb">
                        <li class="lis"><a href="#">第1条公告第1条公告第1条公告第1条公告第1条公告第1条公告</a></li>
                        <li class="lis"><a href="#">第1条公告第1条公告第1条公告第1条公告第1条公告第1条公告</a></li>
                        <li class="lis"><a href="#">第1条公告第1条公告第1条公告第1条公告第1条公告第1条公告</a></li>
                        <li class="lis"><a href="#">第1条公告第1条公告第1条公告第1条公告第1条公告第1条公告</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="gdb">
                        <li class="lis"><a href="#">第1条公告第1条公告第1条公告第1条公告第1条公告第1条公告</a></li>
                        <li class="lis"><a href="#">第1条公告第1条公告第1条公告第1条公告第1条公告第1条公告</a></li>
                        <li class="lis"><a href="#">第1条公告第1条公告第1条公告第1条公告第1条公告第1条公告</a></li>
                        <li class="lis"><a href="#">第1条公告第1条公告第1条公告第1条公告第1条公告第1条公告</a></li>
                    </ul>
                </div>    
            </div>
        </div> -->
        <div class="details-act">
            <span>吖吖<b>公告</b></span>
            <!-- <span>吖吖b公告</span> -->
            <small></small>
            <div class="dowebok"></div>
        </div>
        <!-- 公告 E -->

        <!-- 超值团购 S -->
        <div class="index-buy">
            <div class="index-buy-tit">
                <img class="icons" src="/static/image/index/cz.png" />
                <div class="index-buy-gd">
                    <ul class="gdb">
                            <?php if(!(empty($last_paimems) || (($last_paimems instanceof \think\Collection || $last_paimems instanceof \think\Paginator ) && $last_paimems->isEmpty()))): if(is_array($last_paimems) || $last_paimems instanceof \think\Collection || $last_paimems instanceof \think\Paginator): $i = 0; $__LIST__ = $last_paimems;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <li class="lis"><img src="<?php echo (isset($vo['m_s_avatar']) && ($vo['m_s_avatar'] !== '')?$vo['m_s_avatar']:'__STATIC__/image/index/pic_home_taplace@2x.png'); ?>" /><p><?php echo $vo['s_name']; ?>刚刚参了团</p></li>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <!-- <li class="lis"><img src="/static/image/index/pic_home_taplace@2x.png" /><p>小**七刚刚参了团</p></li> -->
                        <!-- <li class="lis"><img src="/static/image/index/pic_home_taplace@2x.png" /><p>小**七刚刚参了团</p></li> -->
                        <!-- <li class="lis"><img src="/static/image/index/pic_home_taplace@2x.png" /><p>小**七刚刚参了团</p></li> -->
                    </ul>
                </div>
                <a href="/activity/index/index/code/<?php echo isset($cztg['activity']['a_code']) ? $cztg['activity']['a_code'] :  0; ?>" class="index-buy-link">进入会场</a>
            </div>
        </div>
        <div class="swiper-container swiper-container2">
            <div class="swiper-wrapper">
                <?php if(!(empty($cztg['goods_list']) || (($cztg['goods_list'] instanceof \think\Collection || $cztg['goods_list'] instanceof \think\Paginator ) && $cztg['goods_list']->isEmpty()))): if(is_array($cztg['goods_list']) || $cztg['goods_list'] instanceof \think\Collection || $cztg['goods_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cztg['goods_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="swiper-slide">
                            <div>
                                <a href="/member/goodsproduct/index/g_id/<?php echo isset($vo['g_id']) ? $vo['g_id'] :  0; ?>">
                                    <img src="<?php echo (isset($vo['g_s_img']) && ($vo['g_s_img'] !== '')?$vo['g_s_img']:'__STATIC__/image/index/pic_home_taplace@2x.png'); ?>">
                                    <p>仅剩<?php echo isset($vo['left_num']) ? $vo['left_num'] :  0; ?>人</p>
                                </a>
                            </div>
                            <small>￥<span><?php echo isset($vo['min_price']) ? $vo['min_price'] :  0; ?></span></small>
                            <del>￥<?php echo isset($vo['gp_market_price']) ? $vo['gp_market_price'] :  0; ?></del>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                <!-- <div class="swiper-slide">
                    <div>
                        <a href="#">
                            <img src="/static/image/index/pic_home_taplace@2x.png">
                            <p>仅剩17人</p>
                        </a>
                    </div>
                    <small>￥<span>800.00</span></small>
                    <del>￥8000.00</del>
                </div>
                <div class="swiper-slide">
                    <div>
                        <a href="#">
                            <img src="/static/image/index/pic_home_taplace@2x.png">
                            <p>仅剩17人</p>
                        </a>
                    </div>
                    <small>￥<span>800.00</span></small>
                    <del>￥8000.00</del>
                </div>
                <div class="swiper-slide">
                    <div>
                        <a href="#">
                            <img src="/static/image/index/pic_home_taplace@2x.png">
                            <p>仅剩17人</p>
                        </a>
                    </div>
                    <small>￥<span>800.00</span></small>
                    <del>￥8000.00</del>
                </div>
                <div class="swiper-slide">
                    <div>
                        <a href="#">
                            <img src="/static/image/index/pic_home_taplace@2x.png">
                            <p>仅剩17人</p>
                        </a>
                    </div>
                    <small>￥<span>800.00</span></small>
                    <del>￥8000.00</del>
                </div>
                <div class="swiper-slide">
                    <div>
                        <a href="#">
                            <img src="/static/image/index/pic_home_taplace@2x.png">
                            <p>仅剩17人</p>
                        </a>
                    </div>
                    <small>￥<span>800.00</span></small>
                    <del>￥8000.00</del>
                </div>
                <div class="swiper-slide">
                    <div>
                        <a href="#">
                            <img src="/static/image/index/pic_home_taplace@2x.png">
                            <p>仅剩17人</p>
                        </a>
                    </div>
                    <small>￥<span>800.00</span></small>
                    <del>￥8000.00</del>
                </div> -->
            </div>
        </div>        
        <!-- 超值团购 E -->
    </div>

    <!-- 活动模块 S -->
    <div class="index-act">
        <div class="index-act-list">
            <!-- <div class="index-act-item1">
                <a href="#"><img src="/static/image/index/hd1.png"></a>
            </div> -->
            <div class="index-act-item2">
                <a href="/popularity/popularitygoods/share_list"><img src="/static/image/index/hd3.png"></a>
            </div>
        </div>    
        <div class="index-act-list">    
            <!-- <div class="index-act-item2">
                <a href="#"><img src="/static/image/index/hd3.png"></a>
            </div>
            <div class="index-act-item2">
                <a href="#"><img src="/static/image/index/hd4.png"></a>
            </div> -->
            <div class="index-act-item2">
                <a href="/index/index/price_range/type/1"><img src="/static/image/index/hd5.png"></a>
            </div>
        </div>
    </div>    
    <!-- 活动模块 E -->

    <!-- 精品推荐 S -->
    <div class="index-pro">
        <h3><img src="/static/image/index/pro.png"></h3>
        <div class="index-pro-list">
            <div class="dataList" id="dataList">

            </div>
            <!-- <div class="index-pro-item">
                <div class="index-pro-item-img">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                </div>
                <div class="index-pro-item-name">Beats 蓝牙无线头戴式运动魔音降噪苹果耳机 黑色</div>
                <div class="index-pro-item-price">￥<span>781.00</span>&nbsp;<del>￥1000.00</del></div>
                <div class="index-pro-item-num">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                    <p>等271人参团</p>
                </div>
            </div>
            <div class="index-pro-item">
                <div class="index-pro-item-img">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                </div>
                <div class="index-pro-item-name">Beats 蓝牙无线头戴式运动魔音降噪苹果耳机 黑色</div>
                <div class="index-pro-item-price">￥<span>781.00</span>&nbsp;<del>￥1000.00</del></div>
                <div class="index-pro-item-num">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                    <p>等271人参团</p>
                </div>
            </div>
            <div class="index-pro-item">
                <div class="index-pro-item-img">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                </div>
                <div class="index-pro-item-name">Beats 蓝牙无线头戴式运动魔音降噪苹果耳机 黑色</div>
                <div class="index-pro-item-price">￥<span>781.00</span>&nbsp;<del>￥1000.00</del></div>
                <div class="index-pro-item-num">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                    <p>等271人参团</p>
                </div>
            </div>
            <div class="index-pro-item">
                <div class="index-pro-item-img">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                </div>
                <div class="index-pro-item-name">Beats 蓝牙无线头戴式运动魔音降噪苹果耳机 黑色</div>
                <div class="index-pro-item-price">￥<span>781.00</span>&nbsp;<del>￥1000.00</del></div>
                <div class="index-pro-item-num">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                    <img src="/static/image/index/pic_home_taplace@2x.png">
                    <p>等271人参团</p>
                </div>
            </div> -->
        </div>
    </div>
    <!-- 精品推荐 E -->

    <!-- 抖动红包 S -->
    <img class="red dd" src="__STATIC__/image/index/icon_hongbao@2x.png" alt="">
    <!-- 抖动红包 E -->

    <!-- 领取红包弹窗 S -->
    <div class="new_pop">
        <div class="new_pop_con">
            <img src="__STATIC__/image/index/icon_x@2x.png" alt=""/>
            <p>恭喜！获得新人红包</p>
            <a>￥
                <small>10</small>
            </a>
            <div class="new_pop_btn" id="new_pop_btn">立即下载并领取红包</div>
        </div>
    </div>
    <!-- 领取红包弹窗 E -->

    <!-- 搜索弹窗 S -->
    <div class="index_search_pop">        
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
    <!-- 搜索弹窗 E -->

    <input type="hidden" id="app">
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
                    <img src="__STATIC__/image/myhome/icon_fabu@2x(1).png">
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
                <img src="__STATIC__/image/myhome/icon_fabu@2x(1).png">
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
<script src="__JS__/cookie/jquery.cookie.js"></script>
<script src="__JS__/index/index.js"></script>
<script>
    //安卓app显示扫码位置
    if(getCookie("versionScan") != null) {
        $('.index-top').addClass('sm-app');
        $('.smicon').show();
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
            if(str == '1.0') {
                $('.index-top').addClass('sm-app');
                $('.smicon').show();
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

    //banner图轮播
    var mySwiper = new Swiper('.swiper-container1', {
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

    //滚动公告
    // var lenlen = $(".gdb").length;
    function notice() {
        $(".gdb").each(function (i) {
            setTimeout(function () {
                $(".gdb").eq(i).stop(true, true).animate({ marginTop: "-0.43rem" }, 1000, function () {
                    $(".gdb").css({ marginTop: "0rem" });
                    $(".gdb").eq(i).find(".lis:last").after($(".gdb").eq(i).find(".lis:first"));
                })
            }, 2000 * i)
        })
    }
    // notice();
    var time1=setInterval(notice, 2000);
    setInterval(function(){
        $.ajax("/activity/index/get_last_pai_mem/a_id/<?php echo isset($cztg['activity']['a_id']) ? $cztg['activity']['a_id'] :  0; ?>",{
            dataType:"json",
            type:"post",
            success:function(data){
                if(data.status==0){
                   
                }else{
                    var lis="";
                    $(".gdb li").last().siblings().remove();
                    // console.log(data.data);
                    for(var i=0;i<data.data.length;i++){
                        if(data.data[i].m_s_avatar==""){
                            data.data[i].m_s_avatar="__STATIC__/image/index/pic_home_taplace@2x.png"
                        }
                        lis+='<li class="lis">'
                        lis+='<img src="'+data.data[i].m_s_avatar+'"/>'
                        lis+='<p>'+data.data[i].s_name+'刚刚参了团</p>'
                        lis+='</li>'
                    }
                    $(".gdb").append(lis);
                }
                $(".lis img").error(function(){
                    $(this).attr("src","__STATIC__/image/index/pic_home_taplace@2x.png")
                })
            }
        })
    },20000)

    $(".lis img").error(function(){
        $(this).attr("src","__STATIC__/image/index/pic_home_taplace@2x.png")
    })
    //超值团购滑动效果
    var swiper = new Swiper('.swiper-container2', {
        slidesPerView: 3.2,
        spaceBetween: 10
    });
    //活动模块滑动效果
    var swiper = new Swiper('.swiper-container3', {
        slidesPerView: 5,
        spaceBetween: 10,
        slidesPerGroup: 5
    });

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
            // if (pd.max_num == 0) {
            //     num = 0;
            // } else {
            //     num = pd.max_num / pd.gdr_membernum * 100;
            //     if (num >= 100) {
            //         num = 100;
            //     } else if (num >= 99 && num < 100) {
            //         num = 99;
            //     } else {
            //         num = Math.ceil(num);
            //     }
            // }
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
            var str='<div class="index-pro-item">'
                str+='<div class="index-pro-item-img">'
                str+='<img src="' + pd.g_s_img + '">'
                str+='</div>'
                str+='<div class="index-pro-item-name">' + pd.g_name + '</div>'
                str+='<div class="index-pro-item-price">￥<span>' + pd.gdr_price + '</span>&nbsp;<del>￥' + pd.gp_market_price + '</del></div>'
                str+='<div class="index-pro-item-num">'
                // str+='<img src="/static/image/index/pic_home_taplace@2x.png">'
                // str+='<img src="/static/image/index/pic_home_taplace@2x.png">'
                str+='<p>等' + pd.total_num + '人参团</p>'
                str+='</div>'
                str+='</div>'
            var liDom = document.createElement("a");
            liDom.setAttribute("href", '/member/goodsproduct/index/g_id/' + pd.g_id);
            liDom.innerHTML = str;
            listDom.appendChild(liDom);
            
        }
        $(".index-pro-item-img img").error(function(){
            $(this).attr("src","__STATIC__/image/index/pic_home_taplace@2x.png")
        })
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
    $('.index_items .index_con_nav_view').click(function(){
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

    <!-- 调用登陆的sdk -->
    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>