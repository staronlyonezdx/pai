<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\project\pai\public/../application/promotion/view/index/double11.html";i:1542013166;s:68:"D:\project\pai\public/../application/promotion/view/common/base.html";i:1543280491;s:70:"D:\project\pai\public/../application/promotion/view/common/js_sdk.html";i:1541491285;}*/ ?>

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
        
<!--<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">-->
<link rel="stylesheet" type="text/css" href="__CSS__/promotion/double11.css">
<link rel="stylesheet" type="text/css" href="__CSS__/common/swiper.min.css">

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
        <!-- <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script> -->
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <!-- <script src="__JS__/login/loginsdk.js"></script> -->
        <!--web im sdk 登出 示例代码-->
        <!-- <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script> -->
        <title></title>
    </head>
    <body>
        <header>
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <img src="__STATIC__/image/promotion/icon_nav_biaoti@2x.png" alt="" class="nav_biaoti">
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back(-1);" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >
            <img src="__STATIC__/icon/publish/icon_nav_back1@2x.png" name='out' class="smts">
        </div>
        <!--<div class="header_more rt">-->
        <!--<img src="__STATIC__/image/promotion/icon_nav_more@2x.png" alt="">-->
        <!--</div>-->
    </div>
</div>
</header>
        
<main>
    <!--头部秒杀-->
    <div class="double_top">
        <div class="double_top_main">
            <!--可滚动时间条-->
            <div class="timeaxis_warp">
                <div class="timeaxis-current"></div>
                <div class="swiper-container" id="swiper-container3">
                    <div class="swiper-wrapper">
                        <?php if(!(empty($ms_list['0']['huodong_goods']) || (($ms_list['0']['huodong_goods'] instanceof \think\Collection || $ms_list['0']['huodong_goods'] instanceof \think\Paginator ) && $ms_list['0']['huodong_goods']->isEmpty()))): if(is_array($ms_list) || $ms_list instanceof \think\Collection || $ms_list instanceof \think\Paginator): $i = 0; $__LIST__ = $ms_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

                        <div class="swiper-slide" data-num="<?php echo $key; ?>" data='<?php echo $vo['is_active']; ?>'>

                            <div class="timeaxis-item-inner">
                                <div class="timeaxis-time"><?php echo $vo['start_sf']; ?></div>
                                <div class="timeaxis-info">
                                    <!--动态判断显示那个图片-->
                                    <!--<img src="" alt="" class="top_isover_img">-->
                                    <!--<img src="__STATIC__/image/promotion/icon_yijieshu@2x.png" alt="">-->
                                    <!--<img src="__STATIC__/image/promotion/icon_zhengzaijinxing@2x.png" alt="">-->
                                    <!--<img src="__STATIC__/image/promotion/icon_jijiangkaishi@2x.png" alt="">-->
                                    <!--{if condition="$vo.huodong_goods.0.gp_state == 6 " }-->
                                    <?php if($vo['start_time'] < $now_time && $vo['end_time'] > $now_time): ?>
                                    <!--正在进行-->
                                    <img src="__STATIC__/image/promotion/icon_zhengzaijinxing@2x.png" alt="">
                                    <?php elseif($vo['end_time'] <= $now_time): ?>
                                    <!--已结束-->
                                    <img src="__STATIC__/image/promotion/icon_yijieshu@2x.png" alt="">
                                    <?php elseif($now_time <= $vo['start_time']): ?>
                                    <!--即将开始-->
                                    <img src="__STATIC__/image/promotion/icon_jijiangkaishi@2x.png" alt="">
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>


                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

                    </div>
                </div>
            </div>
            <!--对应时间商品简介-->
            <div class="double_top_content">
                <div class="swiper-container2">
                    <div class="swiper-wrapper">
                        <?php if(!(empty($ms_list['0']['huodong_goods']) || (($ms_list['0']['huodong_goods'] instanceof \think\Collection || $ms_list['0']['huodong_goods'] instanceof \think\Paginator ) && $ms_list['0']['huodong_goods']->isEmpty()))): if(is_array($ms_list) || $ms_list instanceof \think\Collection || $ms_list instanceof \think\Paginator): $i = 0; $__LIST__ = $ms_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!(empty($vo['huodong_goods']) || (($vo['huodong_goods'] instanceof \think\Collection || $vo['huodong_goods'] instanceof \think\Paginator ) && $vo['huodong_goods']->isEmpty()))): ?>
                            <div class="swiper-slide">
                            <a href="/member/goodsproduct/index/g_id/<?php echo $vo['huodong_goods'][0]['g_id']; ?>">
                                <!--<div class="swiper_inner">-->
                                <div class="content_top clear">
                                    <img src="__STATIC__/image/promotion/icon_xianshi1@2x.png" alt=""
                                         class="lf tip_img">
                                    <div class="rt">
                                        <!--动态判断显示那个图片-->
                                        <!--<img src="" alt="" class="is_kaishi_img jujieshu">-->
                                        <!--<img src="__STATIC__/image/promotion/icon_jujieshu@2x.png" alt=""-->
                                        <!--class="jujieshu lf">-->
                                        <!--<img src="__STATIC__/image/promotion/icon_yijieshu@2x1.png" alt=""-->
                                        <!--class="jujieshu lf">-->
                                        <!--<img src="__STATIC__/image/promotion/icon_jukaishi@2x2.png" alt=""-->
                                        <!--class="jujieshu lf">-->

                                        <?php if($vo['huodong_goods']['0']['g_starttime'] < $now_time && $vo['huodong_goods']['0']['g_endtime'] > $now_time): ?>
                                        <img src="__STATIC__/image/promotion/icon_jujieshu@2x.png" alt=""
                                             class="jujieshu selt">
                                        <?php elseif($vo['huodong_goods']['0']['g_endtime'] <= $now_time): ?>
                                        <img src="__STATIC__/image/promotion/icon_yijieshu@2x1.png" alt=""
                                             class="jujieshu selt">
                                        <?php elseif($now_time <= $vo['huodong_goods']['0']['g_starttime']): ?>
                                        <img src="__STATIC__/image/promotion/icon_jukaishi@2x2.png" alt=""
                                             class="jujieshu selt">
                                        <?php endif; ?>

                                        <div class="seckill_cutdown rt">
                                            <!--<input type="hidden" name="start_time" value='<?php echo $vo['start_time']; ?>'>-->
                                            <input type="hidden" name="start_time" value='<?php echo $vo['huodong_goods']['0']['g_starttime']; ?>'>
                                            <input type="hidden" name="end_time" value='<?php echo $vo['huodong_goods']['0']['g_endtime']; ?>'>
                                            <!--<input type="hidden" name="end_time" value='<?php echo $vo['end_time']; ?>'>-->
                                            <div class="cutdown clear rt" id="first<?php echo $key; ?>">
                                                <span class="cutdown_num details_day" style="width:0.6rem"></span>
                                                <span class="cutdown_mao">:</span>
                                                <span class="cutdown_num details_hour"></span>
                                                <span class="cutdown_mao">:</span>
                                                <span class="cutdown_num details_minute"></span>
                                                <span class="cutdown_mao">:</span>
                                                <span class="cutdown_num details_second"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content_main">
                                    <div class="content_imgs lf">
                                        <img src="<?php echo $vo['huodong_goods']['0']['g_img']; ?>" alt="" class="content_img details_img">


                                        <?php if($vo['huodong_goods']['0']['g_endtime'] >= $now_time && $vo['huodong_goods']['0']['g_state'] == 9): ?>
                                        <!--如果时间未结束，但是已经抢完，状态显示-->
                                        <img src="__STATIC__/image/promotion/icon_yiliupai@2x.png" alt="" class="content_mask">

                                        <?php elseif($vo['huodong_goods']['0']['g_endtime'] <= $now_time || $vo['huodong_goods']['0']['g_state'] != 6): ?>
                                        <!--如果倒计时结束而且状态不等于6，已结束印章显示-->
                                        <img src="__STATIC__/image/promotion/icon_yijieshuyinzhang@2x.png" alt=""
                                             class="content_mask selt">
                                        <?php else: ?>
                                        <img src="" alt="">
                                        <?php endif; ?>
                                    </div>

                                    <div class="rt content_detail">
                                        <p class="content_name"><?php echo $vo['huodong_goods']['0']['g_name']; ?></p>
                                        <div class="progress clear selt">


                                            <?php if($vo['huodong_goods']['0']['g_endtime'] >= $now_time && $vo['huodong_goods']['0']['g_state'] == 9): ?>
                                            <!--抢完状态显示-->
                                            <div class="progress_main lf" style="background: #EEEEEE">

                                            <?php elseif($vo['huodong_goods']['0']['g_endtime'] <= $now_time || $vo['huodong_goods']['0']['g_state'] != 6): ?>
                                            <div class="progress_main lf" style="background: #EEEEEE">
                                            <?php else: ?>
                                            <div class="progress_main lf">
                                            <?php endif; if($vo['huodong_goods']['0']['g_endtime'] >= $now_time && $vo['huodong_goods']['0']['g_state'] == 9): ?>
                                                <!--抢完状态显示-->
                                                <img src="__STATIC__/image/promotion/icon_qiangwanqiangwan@2x.png" alt="" class="jindouimg">

                                                <?php elseif($vo['huodong_goods']['0']['g_endtime'] <= $now_time || $vo['huodong_goods']['0']['g_state'] != 6): ?>
                                                <img src="__STATIC__/image/promotion/icon_jieshujieshu@2x.png" alt="" class="jindouimg ">
                                                <?php endif; ?>


                                            <span class="progress_inner" style="width:<?php echo $vo['huodong_goods']['0']['pai_progress']['gdr_lists']['0']['proportion']; ?>%"></span>
                                            </div>

                                            <?php if($vo['end_time'] >= $now_time && $vo['huodong_goods']['0']['g_state'] == 9): ?>
                                            <!--抢完状态显示-->
                                            <span class="rt progress_num">100%</span>

                                            <?php elseif($vo['end_time'] <= $now_time || $vo['huodong_goods']['0']['g_state'] != 6): ?>
                                            <span class="rt progress_num">100%</span>
                                            <?php else: ?>
                                            <span class="rt progress_num"><?php echo $vo['huodong_goods']['0']['pai_progress']['gdr_lists']['0']['proportion']; ?>%</span>
                                            <?php endif; ?>

                                        </div>

                                        <div class="content_data">
                                            <p class="content_price lf">￥<span><?php echo $vo['huodong_goods']['0']['pai_progress']['gdr_lists']['0']['gdr_price']; ?></span>
                                            </p>

                                            <span class="">已参与<?php echo $vo['huodong_goods']['0']['pai_progress']['total_pai_num']; ?>人</span>
                                        </div>

                                    </div>
                                </div>

                                <!--</div>-->
                            </a>
                        </div>
                            <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--中间规则-->
    <div class="double_middle">
        <a href="/promotion/index/hd_gz1">
            <img src="__STATIC__/image/promotion/icon_guize@2x.png" alt="">
        </a>
    </div>
    <!--进行中-->
    <!--<div class="double_jinxing clear">-->
    <!--<div class=" jinxing lf">-->
    <!--<div class="content_item_imgs">-->
    <!--<p class="jingxing_tip">进行中</p>-->
    <!--<img src="" alt="" class="fudai_img">-->

    <!--<img src="__STATIC__/image/promotion/icon_11.11biasohi@2x.png" alt="" class="double11">-->
    <!--</div>-->

    <!--<div class="item_detail">-->
    <!--<p class="item_jinxing_name">【第1袋】拍吖吖双11豪华大福袋</p>-->
    <!--<p class="item_detail_price lf">福气价 <span style="font-size: 0.26rem">¥</span> <span-->
    <!--style="font-size: 0.34rem">11.11</span></p>-->
    <!--<span class="item_detail_num rt">剩余27人</span>-->
    <!--</div>-->

    <!--<div class="content_mask">-->
    <!--&lt;!&ndash;第一袋已结束&ndash;&gt;-->
    <!--&lt;!&ndash;第1袋结束后开始&ndash;&gt;-->
    <!--<img src="__STATIC__/image/promotion/icon_yijieshu11@2x.png" alt="">-->

    <!--</div>-->
    <!--</div>-->
    <!--<div class="content_item  lf">-->
    <!--<div class="content_item_imgs">-->
    <!--&lt;!&ndash;<span>进行中</span>&ndash;&gt;-->
    <!--<img src="" alt="" class="fudai_img">-->
    <!--<img src="__STATIC__/image/promotion/icon_11.11biasohi@2x.png" alt="" class="double11">-->
    <!--</div>-->

    <!--<div class="double_jinxing_detail">-->
    <!--<p class="item_detail_name">【第1袋】拍吖吖双11豪华大福袋</p>-->
    <!--<p class="item_detail_price lf">福气价 <span style="font-size: 0.26rem">¥ </span><span-->
    <!--style="font-size: 0.34rem">11.11</span></p>-->
    <!--&lt;!&ndash;<span class="item_detail_num rt">剩余27人</span>&ndash;&gt;-->
    <!--</div>-->

    <!--<div class="mask">-->
    <!--&lt;!&ndash;第一袋已结束&ndash;&gt;-->
    <!--&lt;!&ndash;第1袋结束后开始&ndash;&gt;-->
    <!--<img src="__STATIC__/image/promotion/icon_weikaishi@2x2.png" alt="">-->
    <!--<img src="__STATIC__/image/promotion/icon_yijieshu1@2x.png" alt="" style="display: none">-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->
    <!--福袋列表-->
    <ul class="double_content clear">
        <?php if(!(empty($fudai_goods) || (($fudai_goods instanceof \think\Collection || $fudai_goods instanceof \think\Paginator ) && $fudai_goods->isEmpty()))): if(is_array($fudai_goods) || $fudai_goods instanceof \think\Collection || $fudai_goods instanceof \think\Paginator): $i = 0; $__LIST__ = $fudai_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a href="/member/goodsproduct/index/g_id/<?php echo $vo['g_id']; ?>">

        <?php if(($key == 0)): ?>



            <li class="content_item double_jinxing_detail lf">
                <?php else: ?>
            <li class="content_item  lf">
                <?php endif; ?>

                <div class="content_item_imgs">
                    <?php if(($key == 0)): if($now_time < $vo['g_starttime']): ?>
                    <!--未开始参拍-->
                    <?php elseif($vo['g_state'] == 6 && $vo['gp_state'] == 1 && $now_time < $vo['g_endtime']): ?>
                    <!--是第一张，并且参拍中，没有遮罩-->
                    <span class="jingxing_tip">进行中</span>
                    <?php else: ?>
                    <!--是第一张，参拍结束，显示参拍结束的遮罩-->
                    <?php endif; endif; ?>
                    <img src="<?php echo $vo['g_img']; ?>" alt="" class="fudai_img details_img">
                    <img src="__STATIC__/image/promotion/icon_11.11biasohi@2x.png" alt="" class="double11">
                </div>

                <div class="item_detail">
                    <?php if(($key == 0)): ?>
                    <p class="item_detail_name_jinxing">【第<?php echo $vo['sort']; ?>袋】<?php echo $vo['g_name']; ?></p>
                    <?php else: ?>
                    <p class="item_detail_name">【第<?php echo $vo['sort']; ?>袋】<?php echo $vo['g_name']; ?></p>
                    <?php endif; ?>
                    <p class="item_detail_price lf">福气价 <span style="font-size: 0.26rem">¥ </span><span
                            style="font-size: 0.34rem"><?php echo $vo['pai_progress']['gdr_lists']['0']['gdr_price']; ?></span></p>
                    <?php if(($key == 0)): ?>
                    <span class="item_detail_num rt">剩余<?php echo $vo['pai_progress']['gdr_lists']['0']['left_num']; ?>人</span>
                    <?php endif; ?>
                </div>

                <div class="mask">
                    <!--第一袋已结束-->
                    <!--第1袋结束后开始-->
                    <!--<?php if($vo['g_state'] == 6 && $now_time < $vo['g_endtime'] && $vo['gp_state'] == 1): ?>-->
                    <!--&lt;!&ndash;参拍中&ndash;&gt;-->
                    <!--<img src="__STATIC__/image/promotion/icon_yijieshu11@2x.png" alt="">-->
                    <!--<?php else: ?>-->
                    <!--&lt;!&ndash;不能参拍&ndash;&gt;-->
                    <!--<?php if($key == 0): ?>-->
                    <!--&lt;!&ndash;第一张 展示还未开始&ndash;&gt;-->
                    <!---->
                    <!--<?php elseif($now_time >= $vo['g_endtime']): ?>-->
                    <!--&lt;!&ndash;展示第几张结束后开始&ndash;&gt;-->
                    <!--<img src="__STATIC__/image/promotion/icon_weikaishi@2x<?php echo $vo['sort']; ?>.png" alt="">-->
                    <!--<?php else: ?>-->
                    <!--<img src="__STATIC__/image/promotion/icon_yijieshu1@2x.png" alt="" style="display:none">-->
                    <!--<?php endif; ?>-->
                    <!--<?php endif; ?>-->


                    <?php if(($key == 0)): if($now_time < $vo['g_starttime']): ?>
                            <!--未开始参拍-->
                            <img src="__STATIC__/image/promotion/icon_huodongjijiang@2x.png" alt="">
                        <?php elseif($vo['g_state'] == 6 && $vo['gp_state'] == 1 && $now_time < $vo['g_endtime']): ?>
                            <!--是第一张，并且参拍中，没有遮罩-->
                        <?php else: ?>
                            <!--是第一张，参拍结束，显示参拍结束的遮罩-->
                            <img src="__STATIC__/image/promotion/icon_yijieshu0@2x.png" alt="">
                        <?php endif; else: ?>
                    <!--其余商品显示状态-->
                    <?php if($vo['g_state'] != 6 || $now_time > $vo['g_endtime']): ?>
                    <!--自己商品是已结束状态-->
                    <img src="__STATIC__/image/promotion/icon_yijieshu<?php echo $vo['sort']; ?>@2x.png" alt="" style="">
                    <?php else: ?>
                    <!--别的商品是未开时的时候-->
                    <img src="__STATIC__/image/promotion/icon_weikaishi@2x<?php echo $vo['sort']; ?>.png" alt="">
                    <?php endif; endif; ?>
                </div>
            </li>
        </a>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <!--<li class="content_item lf">-->
        <!--<div class="content_item_imgs">-->
        <!--&lt;!&ndash;<span>进行中</span>&ndash;&gt;-->
        <!--<img src="" alt="" class="fudai_img">-->
        <!--<img src="__STATIC__/image/promotion/icon_11.11biasohi@2x.png" alt="" class="double11">-->
        <!--</div>-->

        <!--<div class="item_detail">-->
        <!--<p class="item_detail_name">【第1袋】拍吖吖双11豪华大福袋</p>-->
        <!--<p class="item_detail_price lf">福气价 <span style="font-size: 0.26rem">¥ </span><span-->
        <!--style="font-size: 0.34rem">11.11</span></p>-->
        <!--&lt;!&ndash;<span class="item_detail_num rt">剩余27人</span>&ndash;&gt;-->
        <!--</div>-->

        <!--<div class="mask">-->
        <!--&lt;!&ndash;第一袋已结束&ndash;&gt;-->
        <!--&lt;!&ndash;第1袋结束后开始&ndash;&gt;-->
        <!--<img src="__STATIC__/image/promotion/icon_weikaishi@2x2.png" alt="">-->
        <!--<img src="__STATIC__/image/promotion/icon_yijieshu1@2x.png" alt="" style="display: none">-->
        <!--</div>-->
        <!--</li>-->

    </ul>

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
<script src="__JS__/common/swiper.min.js"></script>
<script>
    $(function () {
        var initSlide;
        // 遍历头部开始事件，拿到首次进入时候的值
        $("#swiper-container3 .swiper-slide").each(function () {
            var i = ($(this).attr("data"));
            if (i == 1) {
                initSlide = $(this).attr('data-num');
                // console.log($(this).index());
                var index = $(this).index();
                var currentEndTime = $('.swiper-container2 .swiper-slide').eq(index).find('[name=end_time]').val();
                var nextEndTime = $('.swiper-container2 .swiper-slide').eq(index+1).find('[name=end_time]').val();
                // console.log(currentEndTime);
                // 判断当前结束时间是不是小于0如果是，刷新页面，重新进入
                var currentNowTime = '<?php echo $now_time; ?>' ;
                console.log(currentEndTime);
                console.log(currentNowTime);
                if (currentEndTime <= currentNowTime && nextEndTime >= currentNowTime  ) {
                    // window.location.reload();
                }
            }

        });

        $('.seckill_cutdown').each(function (i) {
            var sTime = $(this).find('[name=start_time]').val() * 1000;
            var eTime = $(this).find('[name=end_time]').val() * 1000;
            // var sTime = $('[name=start_time]').val() * 1000;
            // console.log(sTime*1000);
            var nowTIME = "<?php echo $now_time; ?>";
            // console.log(nowTIME);
            var startTime = sTime - nowTIME * 1000;
            // console.log(startTime);
            timer(startTime, '#first' + i);
            if (sTime < nowTIME * 1000) {
                var time = eTime - nowTIME * 1000;
                timer(time, '#first' + i);
            }

            if($("#swiper-container3 .swiper-slide").last().attr('data') != 1) {
                if(sTime < Number(nowTIME * 1000) && eTime < Number(nowTIME * 1000)){
                    initSlide = i+1;
                    return;
                }
            }

            // 如果开始的时间减去当前服务器时间小于0，则表示已经开始秒杀，正在进行中
            // 如果开始的时间减去当前服务器时间大于0，则表示还没有开始秒杀
            // 如果结束的时间减去当前服务器时间小于0，说明活动已经结束
            // if (startTime <= nowTIME) {
            //     var time = eTime - nowTIME * 1000;
            //     timer(time, '#first' + i);
            //     if(time <= nowTIME){
            //         $('.top_isover_img').attr('src', '__STATIC__/image/promotion/icon_zhengzaijinxing@2x.png');
            //         $('.is_kaishi_img').attr('src', '__STATIC__/image/promotion/icon_jujieshu@2x.png');
            //
            //     }
            //
            //     if (time <= nowTIME) {
            //         $('.top_isover_img').attr('src', '__STATIC__/image/promotion/icon_yijieshu@2x.png');
            //         $('.is_kaishi_img').attr('src', '__STATIC__/image/promotion/icon_yijieshu@2x1.png');
            //         $('.content_mask').show();
            //     }
            // } else {
            //     $('.top_isover_img').attr('src', '__STATIC__/image/promotion/icon_jijiangkaishi@2x.png');
            //     $('.is_kaishi_img').attr('src', '__STATIC__/image/promotion/icon_jukaishi@2x2.png');
            // }

        })
        var Swiper2 = new Swiper('.swiper-container2', {
            // slidesPerView: 1,
            centeredSlides: true,
            initialSlide: initSlide,
        })
        var mySwiper1 = new Swiper('.swiper-container', {

            slidesPerView: "auto",
            /*设置slider容器能够同时显示的slides数量(carousel模式)。可以设置为number或者 'auto'则自动根据slides的宽度来设定数量。*/
            freeMode: true,
            /*自动贴合*/
            freeModeSticky: true,
            /*自动贴合。*/
            centeredSlides: true,
            /*设定为true时，活动块会居中，而不是默认状态下的居左。*/
            slideToClickedSlide: true,
            /*设置为true则swiping时点击slide会过渡到这个slide。*/
            centeredSlides: true,
            /*设定为true时，活动块会居中，而不是默认状态下的居左。*/
            initialSlide: initSlide,
            onInit: function (swiper) { /*回调函数，初始化后执行。*/
                $(".swiper-container .swiper-slide-active ").css({
                    "color": '#fff',
                    "font-weight": 'bold'
                });
            },

            onTransitionEnd: function (swiper) {
                var i = swiper.activeIndex;
                // console.log(swiper.activeIndex);
                Swiper2.slideTo(i)
                /* alert(     $(".swiper-slide-active").attr("data-num"));  ajax传参数*/
                $(".swiper-container  .timeaxis-time").css({
                    "color": 'rgba(255, 255, 255, 1)',
                    "font-weight": 'normal',
                    'font-size': '0.28rem'
                });
                $(".swiper-container .swiper-slide-active .timeaxis-time").css({
                    "color": '#fff',
                    "font-weight": 'bold',
                    'font-size': '0.3rem'
                });
            },
            onTouchMove: function () {
                $(".swiper-container .swiper-slide").not('.swiper-slide-active').css({
                    "color": 'rgba(255, 255, 255, 1)',
                    "font-weight": 'normal',
                    'font-size': '0.28rem'
                });
            }

        })


        Swiper2.on('transitionEnd', function (swiper) {
            // alert(11)
            var i = swiper.activeIndex;
            // console.log(i);
            mySwiper1.slideTo(i)
            $(".swiper-container  .timeaxis-time").css({
                "color": 'rgba(255, 255, 255, 1)',
                "font-weight": 'normal'
            });
            $(".swiper-container .swiper-slide-active .timeaxis-time").css({
                "color": '#fff',
                "font-weight": 'bold'
            });
        })


        // 格式化时间
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
                    }
                }
                // hour = day * 24 + hour;
                if (hour <= 9) hour = '0' + hour;
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;

                $(idName + ' .details_day').html(' <span>' + day + '</span>天');
                $(idName + ' .details_hour').html('<span>' + hour + '</span>');
                $(idName + ' .details_minute').html('<span>' + minute + '</span>');
                $(idName + ' .details_second').html('<span>' + second + '</span>');
                // console.log(day, hour, minute, second);
                intDiff -= 1000;
            }, 1000);
        }



        // console.log($('.details_img'));
        $('.details_img').on('error', function () {
            // console.log(11);
            $(this).attr('src', '/static/image/index/pic_home_taplace@2x.png');
        });

        // 点击或者活动的时候去请求最新的值
        function getNewData(g_id) {
            $.ajax({
                type: 'POST',
                url: ' http://www.pai.com/promotion/index/get_goods_info/',
                data: {g_id: g_id},
                dataType: 'json'
            }, function (res) {
                if (res.status == 8) {

                }
            })
        }

        $('.selt').show();
    })


</script>

    <!-- <script>
            $(function(){
                webimLogin();
            })
        </script>  -->
</html>