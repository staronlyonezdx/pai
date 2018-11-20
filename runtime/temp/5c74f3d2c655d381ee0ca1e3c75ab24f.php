<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"D:\project\pai\public/../application/popularity/view/popularitygoods/share_list.html";i:1542704315;s:69:"D:\project\pai\public/../application/popularity/view/common/base.html";i:1542013165;s:71:"D:\project\pai\public/../application/popularity/view/common/footer.html";i:1541986997;s:71:"D:\project\pai\public/../application/popularity/view/common/js_sdk.html";i:1541491295;}*/ ?>

<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="full-screen" content="yes">
        <meta name="x5-fullscreen" content="true">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 viewport-fit=cover">
        <meta name="format-detection" content="telephone=no">
        <!--<link rel="stylesheet" type="text/css" href="__CSS__/mui/mui.min.css">-->
        <!-- <link rel="stylesheet" type="text/css" href="__CSS__/common/bootstrap.min.css"> -->

        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/bootstrap-fileinput-master/css/fileinput.min.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/larea.css">
        <link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/size.css">
        <link rel="stylesheet" type="text/css" href="__CSS__/common/popups.css">
        
<link rel="stylesheet" type="text/css" href="__CSS__/dropload/dropload.css">
<!--<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">-->
<link rel="stylesheet" type="text/css" href="__CSS__/share_list/swiper-4.4.1.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/share_list/share_list.css">
<link rel="stylesheet" href="__CSS__/liMarquee/liMarquee.css">

        <script type="text/javascript" src="__JS__/jquery-1.11.1.min.js"></script>
        <!--<script type="text/javascript" src="__JS__/zepto.min.js"></script>-->
        <script src="__JS__/common/rem.js"></script>
        <script src="__JS__/common/jquery_lazyload.js"></script>
        <script src="__JS__/common/lazyload.js"></script>
        <!--<script src="__JS__/mui/mui.min.js"></script>-->
        <!--<script src="__JS__/mui/mui.pullToRefresh.js"></script>-->
        <!--<script src="__JS__/mui/mui.pullToRefresh.material.js"></script>-->
        <script src="__JS__/common/site.js"></script>
        <script src="__JS__/common/larea.js"></script>
        <script src="__JS__/common/bootstrap.min.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/fileinput.js"></script>
        <script type="text/javascript" src="__STATIC__/lib/bootstrap-fileinput-master/js/locales/zh.js"></script>
        <script src="__STATIC__/lib/layui/layui.js"></script>
        <script src="__JS__/common/popups.js"></script>
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
        <title></title>
    </head>
    <body>
        <header></header>
        
<!-- 公告 S -->        
<div class="details-act">
    <span></span>
    <small></small>
    <div class="dowebok"></div>
</div>
<!-- 公告 E -->
<main style="margin-top: 0;">
    <div class="share_list">
        <a href="/popularity/popularitygoods/p_rule/" class="share_list_bg_a">
            <div class="share_list_rule">
                <img src="__STATIC__/image/share_list/icon_guize@2x.png" alt=""/>
            </div>
        </a>
        <div class="share_list_touch">
            <div class="share_list_bg">
                <!-- 精选推荐 -->
                <div class="share_list_recommend">
                    <?php if(!(empty($list['data1']) || (($list['data1'] instanceof \think\Collection || $list['data1'] instanceof \think\Paginator ) && $list['data1']->isEmpty()))): if(is_array($list['data1']) || $list['data1'] instanceof \think\Collection || $list['data1'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['data1'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/popularity/popularitygoods/commodity_info/pg_id/<?php echo $vo['pg_id']; ?>">
                        <div class="share_list_box clear">
                            <div class="share_list_pic lf">
                                <img src="<?php echo $vo['pg_img']; ?>" alt="">
                            </div>
                            <div class="share_list_text lf">
                                <p class="share_list_biaoti"><?php echo $vo['pg_name']; ?></p>
                                <div class="share_list_bars clear">
                                    <div class="share_list_view lf">
                                        <div class="share_list_line" style="width:<?php echo $vo['percentage']; ?>;"></div>
                                    </div>
                                    <span class="lf"><?php echo $vo['percentage']; ?></span>
                                </div>
                                <div class="share_list_scope clear">
                                    <div class="share_list_price_lf lf">
                                        <del>市场价￥<?php echo $vo['pg_market_price']; ?></del>
                                        <p>人气价￥<span><?php echo $vo['pg_price']; ?></span></p>
                                    </div>

                                    <div class="share_list_canyu_btn rt">
                                        <img src="__STATIC__/image/share_list/icon_bt@2x.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>




                    <!--<div class="share_list_box clear">-->
                            <!--<div class="share_list_pic lf">-->
                                <!--<img src="__STATIC__/image/review/icon_+@2x.png" alt="">-->
                            <!--</div>-->
                            <!--<div class="share_list_text lf">-->
                                <!--<p class="share_list_biaoti">Apple iPhone X (A1865) 64GBfhasfjksd</p>-->
                                <!--<div class="share_list_bars clear">-->
                                    <!--<div class="share_list_view lf">-->
                                        <!--<div class="share_list_line"></div>-->
                                    <!--</div>-->
                                    <!--<span class="lf">19%</span>-->
                                <!--</div>-->
                                <!--<div class="share_list_scope clear">-->
                                    <!--<div class="share_list_price_lf lf">-->
                                        <!--<del>市场价￥8079.00</del>-->
                                        <!--<p>人气价￥<span>99.00</span></p>-->
                                    <!--</div>-->
                                    <!---->
                                    <!--<div class="share_list_canyu_btn rt">-->
                                        <!--<img src="__STATIC__/image/share_list/icon_bt@2x.png" alt="">-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                    <!--</div>-->
                    <!--<div class="share_list_box clear">-->
                            <!--<div class="share_list_pic lf">-->
                                <!--<img src="__STATIC__/image/review/icon_+@2x.png" alt="">-->
                            <!--</div>-->
                            <!--<div class="share_list_text lf">-->
                                <!--<p class="share_list_biaoti">Apple iPhone X (A1865) 64GBfhasfjksd</p>-->
                                <!--<div class="share_list_bars clear">-->
                                    <!--<div class="share_list_view lf">-->
                                        <!--<div class="share_list_line"></div>-->
                                    <!--</div>-->
                                    <!--<span class="lf">19%</span>-->
                                <!--</div>-->
                                <!--<div class="share_list_scope clear">-->
                                    <!--<div class="share_list_price_lf lf">-->
                                        <!--<del>市场价￥8079.00</del>-->
                                        <!--<p>人气价￥<span>99.00</span></p>-->
                                    <!--</div>-->
                                    <!---->
                                    <!--<div class="share_list_canyu_btn rt">-->
                                        <!--<img src="__STATIC__/image/share_list/icon_bt@2x.png" alt="">-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
            <!-- 吖吖新闻公告 -->
            <!--<div class="share_list_notice">-->
                <!--<div class="share_list_news">-->
                    <!--<div class="swiper-container">-->
                        <!--<div class="swiper-wrapper">-->
                            <!--<?php if(!(empty($yy_gg) || (($yy_gg instanceof \think\Collection || $yy_gg instanceof \think\Paginator ) && $yy_gg->isEmpty()))): ?>-->
                            <!--<?php if(is_array($yy_gg) || $yy_gg instanceof \think\Collection || $yy_gg instanceof \think\Paginator): $i = 0; $__LIST__ = $yy_gg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->

                            <!--<div class="swiper-slide">-->
                                <!--<a href="/popularity/popularitygoods/prize_info/a_id/<?php echo $vo['a_id']; ?>">-->
                                    <!--<div class="share_list_new clear">-->
                                        <!--<div class="share_list_new_pic lf">-->
                                            <!--<img src="<?php echo $vo['a_img']; ?>" alt="">-->
                                        <!--</div>-->
                                        <!--<div class="share_list_new_text clear lf">-->
                                            <!--<p><?php echo $vo['a_brief']; ?></p>-->
                                            <!--<div class="share_list_new_btn rt">-->
                                                <!--<img src="__STATIC__/image/share_list/btn_lijichakan@3x.png" alt="">-->
                                            <!--</div>-->
                                        <!--</div>-->

                                    <!--</div>-->
                                <!--</a>-->

                            <!--</div>-->

                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                            <!--<?php endif; ?>-->

                            <!--&lt;!&ndash;<div class="swiper-slide">&ndash;&gt;-->
                                <!--&lt;!&ndash;<div class="share_list_new clear">&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div class="share_list_new_pic lf">&ndash;&gt;-->
                                        <!--&lt;!&ndash;<img src="__STATIC__/image/share_list/btn_canyudecopy@2x.png" alt="">&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div class="share_list_new_text clear lf">&ndash;&gt;-->
                                        <!--&lt;!&ndash;<p>恭喜<span>我**咋地</span>成为人气王，1元喜提成为人气王，1元喜提奥迪成为人气王，1元喜提奥迪奥迪</p>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<div class="share_list_new_btn rt">&ndash;&gt;-->
                                            <!--&lt;!&ndash;<img src="__STATIC__/image/share_list/btn_lijichakan@3x.png" alt="">&ndash;&gt;-->
                                        <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;&ndash;&gt;-->
                                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                            <!--&lt;!&ndash;<div class="swiper-slide">&ndash;&gt;-->
                                <!--&lt;!&ndash;<div class="share_list_new clear">&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div class="share_list_new_pic lf">&ndash;&gt;-->
                                        <!--&lt;!&ndash;<img src="__STATIC__/image/share_list/btn_canyudecopy@2x.png" alt="">&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div class="share_list_new_text clear lf">&ndash;&gt;-->
                                        <!--&lt;!&ndash;<p>恭喜<span>我**咋地</span>成为人气王，1元喜提成为人气王，1元喜提奥迪成为人气王，1元喜提奥迪奥迪</p>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<div class="share_list_new_btn rt">&ndash;&gt;-->
                                            <!--&lt;!&ndash;<img src="__STATIC__/image/share_list/btn_lijichakan@3x.png" alt="">&ndash;&gt;-->
                                        <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;&ndash;&gt;-->
                                <!--&lt;!&ndash;</div>&ndash;&gt;-->
                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->

            <div class="share_list_notice">
                <div class="share_list_news" >
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php if(!(empty($yy_gg) || (($yy_gg instanceof \think\Collection || $yy_gg instanceof \think\Paginator ) && $yy_gg->isEmpty()))): if(is_array($yy_gg) || $yy_gg instanceof \think\Collection || $yy_gg instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($yy_gg) ? array_slice($yy_gg,0,6, true) : $yy_gg->slice(0,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <div class="swiper-slide clear">
                                <a href="/popularity/popularitygoods/prize_list/">
                                    <div>
                                        <div class="yy_notice_img lf">
                                            <!--<img src="__STATIC__/image/myhome/TIM20180731142117.jpg" alt="" class="lf annunciate_img ">-->
                                            <img src="<?php echo $vo['a_img']; ?>" alt="" class="lf annunciate_img ">
                                        </div>

                                        <div class="notice_info rt">
                                            <p class="annunciate_name"><?php echo $vo['a_name']; ?></p>
                                            <p class="annunciate_tip"><?php echo $vo['a_brief']; ?></p>
                                            <span class="annunciate_date"><?php echo date("Y-m-d H:i:s",$vo['a_addtime']); ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--<div class="swiper-slide">-->
                                <!--<a href="/popularity/popularitygoods/prize_info/a_id/">-->
                                    <!--<div>-->
                                        <!--<img src="" alt="" class="lf annunciate_img ">-->
                                        <!--<div class="notice_info rt">-->
                                            <!--<p class="annunciate_name">部分人气商品延时发布哈哈哈哈</p>-->
                                            <!--<p class="annunciate_tip">因拍吖吖目前处于测试阶段部分人气商品的下架哈哈哈哈哈哈哈哈哈</p>-->
                                            <!--<span class="annunciate_date">2018-10-24 15:24</span>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</a>-->
                            <!--</div>-->
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>

                        <!-- 如果需要分页器 -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            
        </div>
        <!--活动商品-->
        <div class="share_list_tit_con share_list_tit_bg">
                <div class="share_list_tit">
                    <img src="__STATIC__/image/share_list/pic_huodongcopy2@2x.png" alt=""/>
                </div>
                <!-- <div class="share_list_pulldown">
                    <img src="__STATIC__/image/share_list/icon_downchankan@2x.png" alt=""/>
                </div> -->
            </div>
        <div id="share_list_main " class="clear">
            <?php if(!(empty($list['data2']['list']) || (($list['data2']['list'] instanceof \think\Collection || $list['data2']['list'] instanceof \think\Paginator ) && $list['data2']['list']->isEmpty()))): if(is_array($list['data2']['list']) || $list['data2']['list'] instanceof \think\Collection || $list['data2']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['data2']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="/popularity/popularitygoods/commodity_info/pg_id/<?php echo $vo['pg_id']; ?>">
                        <div class="share_list_con lf">
                            <div class="share_list_con_img">
                                <img alt="" src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="<?php echo $vo['pg_img']; ?>"/>
                            </div>
                            <div class="share_list_con_text clear">
                                <div class="share_list_bar lf">
                                    <div class="share_list_schedule" style="width:<?php echo $vo['percentage']; ?>;"></div>
                                </div>
                                <span class="share_list_percent rt"><?php echo $vo['percentage']; ?></span>
                            </div>
                            <p><?php echo $vo['pg_name']; ?></p>
                            <div class="share_list_price">
                                <span>活动价</span>
                                <small>¥<?php echo $vo['pg_price']; ?></small>
                            </div>
                        </div>
                    </a>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
        <!--预上架商品-->
        <?php if(!(empty($list['data3']['list']) || (($list['data3']['list'] instanceof \think\Collection || $list['data3']['list'] instanceof \think\Paginator ) && $list['data3']['list']->isEmpty()))): ?>
        <div class="share_list_tit_con share_list_tit_bg share_list_tit_con_two" >
            <div class="share_list_tit share_list_title">
                <img src="__STATIC__/image/share_list/pic_huodong.png" alt=""/>
            </div>
        </div>
        <div class="share_list_main clear" id="dataList">            
            <?php if(is_array($list['data3']['list']) || $list['data3']['list'] instanceof \think\Collection || $list['data3']['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['data3']['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>                
                <div class="share_list_con lf">
                    <div class="share_list_biaoji" onclick="collection(this,'<?php echo $vo['pg_id']; ?>')">
                        <?php if($vo['is_collection'] == 0): ?>
                        <img src="__STATIC__/image/share_list/icon_biaoji@2x.png" alt="">
                        <?php else: ?>
                        <img src="__STATIC__/image/share_list/icon_biaoji1@2x.png" alt="">
                        <?php endif; ?>
                    </div>
                    <a href="/popularity/popularitygoods/commodity_info/pg_id/<?php echo $vo['pg_id']; ?>">
                        <div class="share_list_con_img">
                            <img alt="" src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="<?php echo $vo['pg_img']; ?>"/>                            
                        </div>
                        <p><?php echo $vo['pg_name']; ?></p>
                        <div class="share_list_price">
                            <span>活动价</span>
                            <small>¥<?php echo $vo['pg_price']; ?></small>
                        </div>
                    </a>
                </div>                
            <?php endforeach; endif; else: echo "" ;endif; ?>            
        </div>
        <?php endif; ?>
        <!--历史参团记录-->
        <a href="/popularity/popularitygoods/champion_list/">
                <div class="share_list_susp" id="share_list_susp">
                    <ul class="share_list_ul">
                    <?php if(!(empty($list['info']) || (($list['info'] instanceof \think\Collection || $list['info'] instanceof \think\Paginator ) && $list['info']->isEmpty()))): if(is_array($list['info']) || $list['info'] instanceof \think\Collection || $list['info'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list['info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li class="share_list_li clear">
                            <div class="share_list_name_img lf">
                                
                                <?php if($vo['m_avatar']==''): ?>
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" alt="">
                                <?php else: ?>
                                <img src="<?php echo $vo['m_avatar']; ?>" alt=""/>
                                <?php endif; ?>
                            </div>
                            <?php if($vo['pm_state'] == 2): ?>
                            <p class="lf"><span><?php echo $vo['m_name']; ?></span><small>刚刚参与了团购</small></p>
                            
                            <?php elseif($vo['pm_state'] == 3): ?>
                            <p class="lf"><span><?php echo $vo['m_name']; ?></span><small>团中了</small><b class="share_list_names"><?php echo $vo['pg_name']; ?></b></p>
                            <?php endif; ?>
                            <div class="share_list_list_more rt">
                                <img src="__STATIC__/image/share_list/icon_jump@2x.png" alt="">
                            </div>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <!-- <li class="share_list_li clear">
                            <div class="share_list_name_img lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" alt=""/>
                            </div>
                            <p class="lf"><span>楼的说法楼的说法</span><small>团中了</small><b>宝马五系</b></p>
                            <div class="share_list_list_more rt">
                                <img src="__STATIC__/image/share_list/icon_jump@2x.png" alt="">
                            </div>
                        </li>
                        <li class="share_list_li clear">
                            <div class="share_list_name_img lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" alt=""/>
                            </div>
                            <p class="lf"><span>楼的说法楼的说法</span><small>团中了</small><b>宝马五系</b></p>
                            <div class="share_list_list_more rt">
                                <img src="__STATIC__/image/share_list/icon_jump@2x.png" alt="">
                            </div>
                        </li>
                        <li class="share_list_li clear d">
                            <div class="share_list_name_img lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" alt=""/>
                            </div>
                            <p class="lf"><span>楼的说法楼的说法</span><small>团中了</small><b>宝马五系</b></p>
                            <div class="share_list_list_more rt">
                                <img src="__STATIC__/image/share_list/icon_jump@2x.png" alt="">
                            </div>
                        </li> -->
                    </ul>
                </div>
        </a>
        <div class="share_list_btn_view">
            <?php if($list['is_login'] == 1): ?>
            <a href="/popularity/popularityorder/order_list/i/1/">
                <div class="share_list_yaoqing">
                    <img src="__STATIC__/image/share_list/icon_yaoqing@2x.png" alt=""/>
                </div>
            </a>
            <a href="/popularity/popularitygoods/my_attend/">
                <div class="share_list_yaoqing">
                    <img src="__STATIC__/image/share_list/icon_wode@2x.png" alt=""/>
                </div>
            </a>
            <?php else: ?>            
            <div class="share_list_yaoqing" onclick="login()">
                <img src="__STATIC__/image/share_list/icon_yaoqing@2x.png" alt=""/>
            </div>        
            <div class="share_list_yaoqing" onclick="login()">
                <img src="__STATIC__/image/share_list/icon_wode@2x.png" alt=""/>
            </div>            
            <?php endif; ?>
        </div>
        
    </div>


    <!--人气王诞生页面-->
    <div class="popularity_person">
        <div class="popularity_person_box">
            <p class="person_info">您有<span></span>份订单待确认！</p>
            <div class="popularity_person_info">
                <img>
                <span></span>
            </div>
            <a><img src="__STATIC__/image/popularitygoods/icon_quer@2x.png" alt="" class="lingqu"></a>
        </div>
        <div class="line_goods_hide per">
            <img src="__STATIC__/image/popularitygoods/icon_xx@2x.png" alt="">
        </div>
    </div>
</main>

        <footer>
<?php if($is_lord ==1): if($m_type==0): ?>
        <div style="height: 0.98rem;"></div>
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
                         <!--<img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png"> -->
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
                        <!-- <img src="__STATIC__/image/myhome/icon_user_on11@2x.png"> -->
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
                        <!-- <img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png"> -->
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
                        <!-- <img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png"> -->
                        <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                        <p class="unread"></p>
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php endif; ?>
        </div>
    <?php endif; if($m_type==1): ?>
        <div style="height: 1.6rem;"></div>
        <div class="footer_tab phonex">
            <a href="/index/index">
                <div class="footer_tab_list lf" style="width:1.875rem">
                    <?php if($controller=='Index'): ?>
                        <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                    <?php else: ?>
                        <!-- <img src="__STATIC__/image/myhome/icon_home_on11@2x.png"> -->
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
                        <!-- <img src="__STATIC__/image/myhome/icon_fenlei_on11@2x.png"> -->
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
                        <!-- <img src="__STATIC__/image/myhome/icon_user_on11@2x.png"> -->
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
                        <!-- <img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png"> -->
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
                        <!-- <img src="__STATIC__/image/myhome/icon_xiaoxi_on11@2x.png"> -->
                        <img src="__STATIC__/image/myhome/icon_xiaoxi_off@2x.png">
                        <p class="unread"></p>
                    <?php endif; ?>
                    <p>消息</p>
                </div>
            </a>
            <?php endif; ?>
        </div>
    <?php endif; else: if($m_type==0): ?>
        <div style="height: 0.98rem;"></div>
        <div class="footer_tab phonex">
            <a href="/index/index">
                <div class="footer_tab_list lf">
                    <?php if($controller=='Index'): ?>
                        <img src="__STATIC__/image/myhome/icon_home_on@2x.png">
                    <?php else: ?>
                    <img src="__STATIC__/image/myhome/icon_home_off@2x.png">
                        <!--<img src="__STATIC__/image/myhome/icon_home_on11@2x.png">-->
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
    <!--<script src="https://dn-bts.qbox.me/sdk/bugtags-1.0.3.js"></script>-->
    <!-- <script> -->
        <!-- // VERSION_NAME 替换为项目的版本，VERSION_CODE 替换为项目的子版本 -->
         <!-- //new Bugtags('bbbe041d223432b3e8bf8a294674dfe5','VERSION_NAME','VERSION_CODE'); -->
    <!-- </script> -->
    <!--bugtags 结束-->

    
<script src="__STATIC__/js/common/jweixin-1.2.0.js"></script>
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
<!--<script src="__JS__/mescroll/mescroll.min.js"></script>-->
<script src="__JS__/dropload/dropload.js"></script>
<!--<script src="__JS__/share_list/touch.js"></script>-->
<!--<script src="__JS__/mescroll/mescroll.min.js"></script>-->

<script src="__STATIC__/js/share_list/swiper-4.4.1.min.js"></script>
<script src="__STATIC__/js/share_list/share_list.js"></script>
<script type="text/javascript" src="__JS__/liMarquee/jquery.liMarquee.js"></script>
<script>
    $(window).load(function () {
        //banner对比图片的宽高
        $('.annunciate_img').each(function(){
            //获取图片父容器的宽度
            var pat = $(this).parent().width();


            //获取图片父容器的高度
            var pah = $(this).parent().height();
            var img = $(this);
            var wid;// 真实的宽度
            var hei;// 真实的高度
            // 这里做下说明，$("<img/>")这里是创建一个临时的img标签，类似js创建一个new Image()对象！
            $("<img/>").attr("src", $(img).attr("src")).load(function() {
                /*
                * 如果要获取图片的真实的宽度和高度有三点必须注意 1、需要创建一个image对象：如这里的$("<img/>")
                * 2、指定图片的src路径 3、一定要在图片加载完成后执行如.load()函数里执行
                */
                wid = this.width;
                hei = this.height;
                // console.log(wid,hei);
                if (wid > hei) {
                    //图片宽度设置为100%
                    img.css({"width":pat+"px","height":"auto"});

                    //居中显示
                    hei = hei/(wid/pat);
                    var mtp = (img.parent().height()-hei)/2;
                    img.css("margin-top",mtp+"px");
                    // console.log(wid,hei);
                }else if(wid <= hei){
                    //图片宽度设置为100%
                    img.css({"width":'auto',"height":'100%'});
                    //居中显示
                    wid = wid/(hei/pah);
                    var mtp = (img.parent().width()-wid)/2;
                    img.css("margin-left",mtp+"px");
                }
            });
        })
    })

   // 弹框出现，点击消失
    $('.popularity_person').on('click',function(){
        $(this).css('display','none');
    })
    $('.line_goods_hide').on('click',function(){
        $('.popularity_person').css('display','none');
    })

// var isNoSwiping = false;
// if($(".swiper-container swiper-slide").size() = 1){
//     isNoSwiping = true;
// } 

if($(".swiper-container .swiper-slide").size() != 1){
    //swiper
    var Swiper = new Swiper ('.swiper-container', {
        // direction: 'vertical',
        // noSwiping : isNoSwiping,
        loop: true,
        // spaceBetween: 30,
        // centeredSlides: true,
        // 如果需要分页器
        pagination: {
            el: '.swiper-pagination',
        },
        autoplay: {
            //   delay: 5000,
              disableOnInteraction: false,
        }
      })        
}
      //登录弹窗
        function login() {
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
        }

        //获取公告内容
    $.ajax({
        type: 'post',
        url: '/index/index/notice/',
        success:function(res) {
            if(res.data.length > 0) {
                for(i=0;i<res.data.length;i++) {
                    $('.dowebok').append('<a>'+res.data[i]+'</a>');
                }
                $('.dowebok').liMarquee({
                    runshort: false
                });                
            }else {
                $('.details-act').hide();
            }         
        }

    })

    // $.ajax({
    //     type: 'post',
    //     url: '/Popularity/Popularitygoods/share_list/',
    //     success: function (res) {
    //         console.log(res);
    //     }
    // })

    //安卓隐藏底部导航
    // if(getCookie("version") != null) {
    //     $('footer').hide();
    // }else {
    //     $('footer').show();
    // }

    //iosapp
    /*这段代码是固定的，必须要放到js中*/
    // function setupWebViewJavascriptBridge(callback) {
    //     if (window.WebViewJavascriptBridge) { return callback(WebViewJavascriptBridge); }
    //     if (window.WVJBCallbacks) { return window.WVJBCallbacks.push(callback); }
    //     window.WVJBCallbacks = [callback];
    //     var WVJBIframe = document.createElement('iframe');
    //     WVJBIframe.style.display = 'none';
    //     WVJBIframe.src = 'wvjbscheme://__BRIDGE_LOADED__';
    //     document.documentElement.appendChild(WVJBIframe);
    //     setTimeout(function() { document.documentElement.removeChild(WVJBIframe) }, 0)
    // }

    //获取ios app版本号
    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    // setupWebViewJavascriptBridge(function(bridge) {
    //     /*JS给ObjC提供公开的API，在ObjC端可以手动调用JS的这个API。接收ObjC传过来的参数，且可以回调ObjC*/
    //     bridge.registerHandler('edn', function(str) {
    //         if(str != undefined) {
    //             $('footer').hide();
    //         }else {
    //             $('footer').show();
    //         }
    //     })
    // })
//点击跳转页面后存session
    $(".swiper-slide").click(function(){
        var getsess=window.sessionStorage.setItem("backUrl",window.location.href);//存session
    })

    //填写地址弹窗
    $.ajax({
        type: 'post',
        url: '/popularity/popularitygoods/count_noaddress_order',
        success: function (res) {
            if(res.status == 1) {
                $('.popularity_person_info').find('img').attr('src',res.data.first_pg_img);
                $('.popularity_person_info').find('span').text(res.data.first_pg_name);
                $('.person_info').find('span').text(res.data.count);
                $('.popularity_person_box').find('a').attr('href','/popularity/popularityorder/order_list/i/2');
                if(res.data.count>0) {
                    $('.popularity_person').show();
                }
            }
        }
    })

    //预上架标记和取消标记
function collection(obj,id) {    
    if (<?php echo $list['is_login']; ?> == 0) {
        login();
    } else {
        $.post("/popularity/popularitygoods/popularity_collection", {pg_id: id}, function (res) {
            if(res.status== 1){
                $(obj).find('img').attr("src","/static/image/share_list/icon_biaoji1@2x.png");                                  
            }else{
                $(obj).find('img').attr("src","/static/image/share_list/icon_biaoji@2x.png");                   
            }
        });
    }
}



</script>

</html>