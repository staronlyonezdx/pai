<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"D:\project\pai\public/../application/popularity/view/popularityorder/order_info.html";i:1543971449;s:69:"D:\project\pai\public/../application/popularity/view/common/base.html";i:1543280491;s:71:"D:\project\pai\public/../application/popularity/view/common/header.html";i:1541491295;s:71:"D:\project\pai\public/../application/popularity/view/common/js_sdk.html";i:1541491295;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/conf_order.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/stroe/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/order_info/index.css">

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
        <!-- <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script> -->
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <!-- <script src="__JS__/login/loginsdk.js"></script> -->
        <!--web im sdk 登出 示例代码-->
        <!-- <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script> -->
        
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
        <title></title>
    </head>
    <body>
        <header> <div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>
 </header>
        
<main>
    <?php if($info['pm_state'] ==1): ?>
    <!-- 商品等待付款 -->
    <!-- <div class="order_index order_dengdaifukuan">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_ka@2x.png" alt="">
            </div>
            <p class="lf">商品等待付款</p>
        </div>
        <p class="order_index_hink">剩余1时59分11秒 ，若未付款将取消订单。</p>
    </div> -->
    <!--订单已关闭-->
    <!-- <div class="order_index order_yiguanbi">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_guanbi@2x.png" alt="">
            </div>
            <p class="lf">订单已关闭</p>
        </div>
        <p class="order_index_hink">订单超时未付款已关闭，如需购买请重新下单。</p>
    </div> -->
    <?php elseif($info['pm_state']==2): ?>
    <!-- 人气王待揭晓 -->
    <div class="order_index order_jiexiaozhong">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_liwu@2x.png" alt="">
            </div>
            <p class="lf">人气王待揭晓</p>
        </div>
        <!-- <p class="order_index_hink">当前已参与<?php echo (isset($info['joinner_count']) && ($info['joinner_count'] !== '')?$info['joinner_count']:0); ?>人，目标满额立即揭晓。</p> -->
        <p class="order_index_hink">当前进度<?php echo (isset($info['pai_rate']) && ($info['pai_rate'] !== '')?$info['pai_rate']:0); ?>%，目标满额立即揭晓。</p>
        <div class="order_index_pic order_jiexiaozhong_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img  src="<?php echo (isset($info['my_info']['m_s_avatar']) && ($info['my_info']['m_s_avatar'] !== '')?$info['my_info']['m_s_avatar']:'/static/image/index/moren.jpg'); ?>" alt="">
                </div>
                <p class="lf">
                    <span><?php echo $info['my_info']['screte_name']; ?></span>
                    等待开奖中~
                </p>
            </div>

            <div class="order_index_bototm clear">
                <?php if(empty($info['last_joinner']) || (($info['last_joinner'] instanceof \think\Collection || $info['last_joinner'] instanceof \think\Paginator ) && $info['last_joinner']->isEmpty())): ?>
                    <div class="order_index_icon lf">
                        <img src="<?php echo (isset($info['last_joinner']['m_s_avatar']) && ($info['last_joinner']['m_s_avatar'] !== '')?$info['last_joinner']['m_s_avatar']:'/static/image/index/moren.jpg'); ?>"alt="">
                    </div>
                    <p class="lf">
                        还没有人为您点赞哦~
                    </p>
                <?php else: ?>
                    <div class="order_index_icon lf">
                        <img src="<?php echo (isset($info['last_joinner']['m_s_avatar']) && ($info['last_joinner']['m_s_avatar'] !== '')?$info['last_joinner']['m_s_avatar']:'/static/image/index/moren.jpg'); ?>"alt="">
                    </div>
                    <p class="lf" id="order_name">
                        <?php echo (isset($info['last_joinner']['m_name']) && ($info['last_joinner']['m_name'] !== '')?$info['last_joinner']['m_name']:''); ?>
                    </p>
                    <span class="foryou">为您</span>
                    <span class="increase">+<?php echo $info['last_joinner']['pj_num']; ?>人气</span>
                <?php endif; ?>
                <a href="/popularity/popularityorder/pop_rank/pm_id/<?php echo $info['pm_id']; ?>" class="order_index_all order_index_chakan rt">
                    <img src="__STATIC__/image/order_info/icon_jump@2x.png" alt="">
                </a>
            </div>
        </div>
    </div>

    <?php elseif($info['pm_state'] ==3): ?>
        <!-- 恭喜成为人气王 -->
        <?php if($info['pm_order_status'] == 1): ?>
            <!--已中奖（待发货 -->
            <div class="order_index order_gongxi">
                    <div class="order_index_top clear">
                        <div class="order_img lf">
                            <img src="__STATIC__/image/orderpai/icon_liwu@2x.png" alt="">
                        </div>
                        <p class="lf">恭喜您成为人气王</p>
                    </div>
                    <p class="order_index_hink">订单将会尽快为您发货，有疑问可咨询客服。</p>
                    <div class="order_index_pic order_gongxi_pic">
                        <div class="order_index_pic_top clear">
                            <div class="order_index_header lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                <span><?php echo $info['my_info']['screte_name']; ?></span>
                                恭喜您成为人气王，成功获得本商品。
                            </p>
                        </div>

                        <div class="order_index_bototm clear">
                            <?php if(empty($info['last_joinner']) || (($info['last_joinner'] instanceof \think\Collection || $info['last_joinner'] instanceof \think\Paginator ) && $info['last_joinner']->isEmpty())): ?>
                            <div class="order_index_icon lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                还没有人为您点赞哦~
                            </p>
                            <?php else: ?>
                            <div class="order_index_icon lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                <?php echo (isset($info['last_joinner']['m_name']) && ($info['last_joinner']['m_name'] !== '')?$info['last_joinner']['m_name']:''); ?>
                            </p>
                            <span class="foryou">为您</span>
                            <span class="increase">+<?php echo $info['last_joinner']['pj_num']; ?>人气</span>
                            <?php endif; ?>
                            <a href="/popularity/popularityorder/pop_rank/pm_id/<?php echo $info['pm_id']; ?>" class="order_index_all order_index_chakan rt">
                                <img src="__STATIC__/image/order_info/icon_jump@2x.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            <?php elseif($info['pm_order_status'] ==2): ?>
            <!-- 2已发货 -->
            <div class="order_index order_yifahuo">
                    <div class="order_index_top clear">
                        <div class="order_img lf">
                            <img src="__STATIC__/image/orderpai/icon_dizhi@2x.png" alt="">
                        </div>
                        <p class="lf">订单已发货</p>
                    </div>
                    <p class="order_index_hink">您的订单已经发货，请耐心等待哦。</p>
                    <div class="order_index_pic order_yifahuo_pic">
                        <div class="order_index_pic_top clear">
                            <div class="order_index_header lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                <span><?php echo (isset($info['pop_king_info']['m_name']) && ($info['pop_king_info']['m_name'] !== '')?$info['pop_king_info']['m_name']:''); ?></span>
                                恭喜您成为人气王，成功获得本商品。
                            </p>
                        </div>

                        <div class="order_index_bototm clear">
                            <?php if(empty($info['last_joinner']) || (($info['last_joinner'] instanceof \think\Collection || $info['last_joinner'] instanceof \think\Paginator ) && $info['last_joinner']->isEmpty())): ?>
                            <div class="order_index_icon lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                还没有人为您点赞哦~
                            </p>
                            <?php else: ?>
                            <div class="order_index_icon lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                <?php echo (isset($info['last_joinner']['m_name']) && ($info['last_joinner']['m_name'] !== '')?$info['last_joinner']['m_name']:''); ?>
                            </p>
                            <span class="foryou">为您</span>
                            <span class="increase">+<?php echo $info['last_joinner']['pj_num']; ?>人气</span>
                            <?php endif; ?>
                            <a href="/popularity/popularityorder/pop_rank/pm_id/<?php echo $info['pm_id']; ?>" class="order_index_all order_index_chakan rt">
                                <img src="__STATIC__/image/order_info/icon_jump@2x.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            <?php elseif($info['pm_order_status'] ==3): ?>
            <!--3已签收-->
            <div class="order_index order_tuikuansuccess">
                    <div class="order_index_top clear">
                        <div class="order_img lf">
                            <img src="__STATIC__/image/orderpai/icon_wancheng@2x.png" alt="">
                        </div>
                        <p class="lf">订单已完成</p>
                    </div>
                    <p class="order_index_hink">订单已交易完成，期待下次与您相遇！</p>
                    <div class="order_index_pic order_tuikuansuccess_pic">
                        <div class="order_index_pic_top clear">
                            <div class="order_index_header lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                <span><?php echo (isset($info['pop_king_info']['m_name']) && ($info['pop_king_info']['m_name'] !== '')?$info['pop_king_info']['m_name']:''); ?></span>
                                恭喜您成为人气王，成功获得本商品。
                            </p>
                        </div>

                        <div class="order_index_bototm clear">
                            <?php if(empty($info['last_joinner']) || (($info['last_joinner'] instanceof \think\Collection || $info['last_joinner'] instanceof \think\Paginator ) && $info['last_joinner']->isEmpty())): ?>
                            <div class="order_index_icon lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                还没有人为您点赞哦~
                            </p>
                            <?php else: ?>
                            <div class="order_index_icon lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                <?php echo (isset($info['last_joinner']['m_name']) && ($info['last_joinner']['m_name'] !== '')?$info['last_joinner']['m_name']:''); ?>
                            </p>
                            <span class="foryou">为您</span>
                            <span class="increase">+<?php echo $info['last_joinner']['pj_num']; ?>人气</span>
                            <?php endif; ?>
                            <a href="/popularity/popularityorder/pop_rank/pm_id/<?php echo $info['pm_id']; ?>" class="order_index_all order_index_chakan rt">
                                <img src="__STATIC__/image/order_info/icon_jump@2x.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
        <?php endif; elseif($info['pm_order_status'] ==4): ?>
            <!-- 未成团 -->
            <div class="order_index order_tuikuansuccess">
                    <div class="order_index_top clear">
                        <div class="order_img lf">
                            <img src="__STATIC__/image/orderpai/icon_wancheng@2x.png" alt="">
                        </div>
                        <p class="lf">退款已完成</p>
                    </div>
                    <p class="order_index_hink">您的订单已经退款完成，可在钱包查看明细。</p>
                    <div class="order_index_pic order_tuikuansuccess_pic">
                        <div class="order_index_pic_top clear" >
                            <p class="lf" style="width:6.5rem;text-align: center;">
                                本商品未成团，没有产生人气王!
                            </p>
                        </div>
                        <div class="order_index_bototm clear">
                            <?php if(empty($info['last_joinner']) || (($info['last_joinner'] instanceof \think\Collection || $info['last_joinner'] instanceof \think\Paginator ) && $info['last_joinner']->isEmpty())): ?>
                            <div class="order_index_icon lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                还没有人为您点赞哦~
                            </p>
                            <?php else: ?>
                            <div class="order_index_icon lf">
                                <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                            </div>
                            <p class="lf">
                                <?php echo (isset($info['last_joinner']['m_name']) && ($info['last_joinner']['m_name'] !== '')?$info['last_joinner']['m_name']:''); ?>
                            </p>
                            <span class="foryou">为您</span>
                            <span class="increase">+<?php echo $info['last_joinner']['pj_num']; ?>人气</span>
                            <?php endif; ?>
                            <a href="/popularity/popularityorder/pop_rank/pm_id/<?php echo $info['pm_id']; ?>" class="order_index_all order_index_chakan rt">
                                <img src="__STATIC__/image/order_info/icon_jump@2x.png" alt="">
                            </a>
                        </div>
                    </div>
            </div>
    <?php else: ?>
        <!-- 很遗憾未能成为人气王 -->
        <?php if($info['pm_paystate'] == 2): ?>
        <!-- 退款中 -->
        <div class="order_index order_yijiexiao_no">
                <div class="order_index_top clear">
                    <div class="order_img lf">
                        <img src="__STATIC__/image/orderpai/icon_ka@2x.png" alt="">
                    </div>
                    <p class="lf">很遗憾您未能成为人气王</p>
                </div>
                <p class="order_index_hink">系统已自动发起退款，将在本次交易完成后退还到您的钱包。</p>
                <div class="order_index_pic order_yijiexiao_no_pic">
                    <div class="order_index_pic_top clear">
                            <div class="order_index_header lf">
                            <img src="<?php echo (isset($info['pop_king_info']['m_avatar']) && ($info['pop_king_info']['m_avatar'] !== '')?$info['pop_king_info']['m_avatar']:''); ?>" alt="">
                            </div>
                            <p class="lf">
                                <span><?php echo (isset($info['pop_king_info']['screte_name']) && ($info['pop_king_info']['screte_name'] !== '')?$info['pop_king_info']['screte_name']:''); ?></span>
                                获得人气王成号 成功带走本商品
                            </p>
                    </div>

                    <div class="order_index_bototm clear">
                        <?php if(empty($info['last_joinner']) || (($info['last_joinner'] instanceof \think\Collection || $info['last_joinner'] instanceof \think\Paginator ) && $info['last_joinner']->isEmpty())): ?>
                        <div class="order_index_icon lf">
                            <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                        </div>
                        <p class="lf">
                            还没有人为您点赞哦~
                        </p>
                        <?php else: ?>
                        <div class="order_index_icon lf">
                            <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                        </div>
                        <p class="lf">
                            <?php echo (isset($info['last_joinner']['m_name']) && ($info['last_joinner']['m_name'] !== '')?$info['last_joinner']['m_name']:''); ?>
                        </p>
                        <span class="foryou">为您</span>
                        <span class="increase">+<?php echo $info['last_joinner']['pj_num']; ?>人气</span>
                        <?php endif; ?>
                        <a href="/popularity/popularityorder/pop_rank/pm_id/<?php echo $info['pm_id']; ?>" class="order_index_all order_index_chakan rt">
                            <img src="__STATIC__/image/order_info/icon_jump@2x.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        <?php elseif($info['pm_paystate'] == 3): ?>
        <!-- 退款完成 -->
        <div class="order_index order_tuikuansuccess">
                <div class="order_index_top clear">
                    <div class="order_img lf">
                        <img src="__STATIC__/image/orderpai/icon_wancheng@2x.png" alt="">
                    </div>
                    <p class="lf">退款已完成</p>
                </div>
                <p class="order_index_hink">您的订单已经退款完成，可在钱包查看明细。</p>
                <div class="order_index_pic order_tuikuansuccess_pic">
                    <div class="order_index_pic_top clear">
                            <div class="order_index_header lf">
                            <img src="<?php echo (isset($info['pop_king_info']['m_avatar']) && ($info['pop_king_info']['m_avatar'] !== '')?$info['pop_king_info']['m_avatar']:''); ?>" alt="">
                            </div>
                            <p class="lf">
                                <span> <?php echo (isset($info['pop_king_info']['screte_name']) && ($info['pop_king_info']['screte_name'] !== '')?$info['pop_king_info']['screte_name']:''); ?></span>
                                获得人气王称号 成功带走本商品
                            </p>
                    </div>

                    <div class="order_index_bototm clear">
                        <?php if(empty($info['last_joinner']) || (($info['last_joinner'] instanceof \think\Collection || $info['last_joinner'] instanceof \think\Paginator ) && $info['last_joinner']->isEmpty())): ?>
                        <div class="order_index_icon lf">
                            <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                        </div>
                        <p class="lf">
                            还没有人为您点赞哦~
                        </p>
                        <?php else: ?>
                        <div class="order_index_icon lf">
                            <img src="__STATIC__/image/myhome/TIM20180731142117.jpg" data-original="<?php echo (isset($info['last_joinner']['m_avatar']) && ($info['last_joinner']['m_avatar'] !== '')?$info['last_joinner']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                        </div>
                        <p class="lf">
                            <?php echo (isset($info['last_joinner']['m_name']) && ($info['last_joinner']['m_name'] !== '')?$info['last_joinner']['m_name']:''); ?>
                        </p>
                        <span class="foryou">为您</span>
                        <span class="increase">+<?php echo $info['last_joinner']['pj_num']; ?>人气</span>
                        <?php endif; ?>
                        <a href="/popularity/popularityorder/pop_rank/pm_id/<?php echo $info['pm_id']; ?>" class="order_index_all order_index_chakan rt">
                            <img src="__STATIC__/image/order_info/icon_jump@2x.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; endif; ?>

<!-- 判断商品属性是普通商品的才显示地址栏S -->
        <?php if($info['pg_spec'] == 1 and $info['pm_state'] < 4): ?>
            <a>
                <div class="conf_order">
                    <!-- 无地址 S -->
                    <?php if(empty($info['pm_addressid']) || (($info['pm_addressid'] instanceof \think\Collection || $info['pm_addressid'] instanceof \think\Paginator ) && $info['pm_addressid']->isEmpty())): ?>
                    <div class="conf_list clear">
                        <div class="conf_kong cong_dizhicon change_address" i="0">
                            <img src="__STATIC__/image/orderpai/icon_dingwei@2x.png" alt="">
                            <span>选择收货地址</span>
                        </div>
                        <!-- <p class="conf_tit clear cong_dizhicon" i="0">
                            <span class="name">添加收货地址</span>
                        </p> -->
                    </div>
                    <!-- 无地址 E -->
                    <?php else: ?>
                    <!-- 有地址 S -->
                    <div class="conf_list clear">
                            <div class="conf_img lf">
                                <img src="__STATIC__/icon/publish/icon_nav_dingwei@2x.png">
                            </div>
                            <div class="conf_name lf change_address">
                                
                                <p class="conf_tit clear cong_dizhicon" i="1">
                                    <span class="name"><?php echo (isset($info['pm_receiver']) && ($info['pm_receiver'] !== '')?$info['pm_receiver']:''); ?></span>
                                    <span class="conf_default">默认</span>
                                    <span class="rt"><?php echo (isset($info['pm_mobile']) && ($info['pm_mobile'] !== '')?$info['pm_mobile']:''); ?></span>
                                </p>
                                <p class="conf_site">
                                    <span><?php echo (isset($info['pm_address']) && ($info['pm_address'] !== '')?$info['pm_address']:''); ?></span>
                                    <!--<span class="rt"><img src="__STATIC__/image/order_info/icon_jump@2x1.png"></span>-->
                                </p>
                               
                            </div>
                    </div>
                     <!-- 有地址 E -->
                    <?php endif; ?>
                    <div class="conf_seal">
                        <img src="__STATIC__/image/orderpai/icon_ft@2x.png">
                    </div>
                </div>
            </a>
        <?php endif; ?>
<!-- 判断商品属性是普通商品的才显示地址栏E -->
    
    

    <div class="conf_content">
        <!-- <a href="/member/shop/index/store_id/"> -->
            <div class="conf_con_tit tb">
                <span class="hs">目前人气值：</span>
                <span><?php echo (isset($info['pm_popularity']) && ($info['pm_popularity'] !== '')?$info['pm_popularity']:'0.00'); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="hs">排名：</span>
                <span><?php echo $info['pm_sort']; ?></span>
            </div>
        <!-- </a> -->
        <div class="conf_order_main clear">
            <a href="<?php if($info['pg_type'] == 3): ?>/popularity/popularitygoods/line_goods/pg_id/<?php echo $info['pg_id']; else: ?>/popularity/popularitygoods/commodity_info/pg_id/<?php echo $info['pg_id']; endif; ?>">
                <div class="conf_order_img lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo (isset($info['pg_s_img']) && ($info['pg_s_img'] !== '')?$info['pg_s_img']:'/static/image/index/pic_home_taplace@2x.png'); ?>">
                </div>
                <div class="conf_order_text lf">
                    <p><?php echo $info['pg_name']; ?></p>
                    <div class="conf_order_price clear">
                        <span class="conf_order_new">
                                ￥<?php echo $info['pm_paymoney']; ?>
                            <span>￥<?php echo $info['pg_market_price']; ?></span>
                        </span>
                        <span class="conf_order_inventory rt">数量x
                            <span>1</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="conf_order_data">
            <?php if($info['pm_state'] ==2): ?>
            <div class="clear">
                截止时间
                <!-- <span class="conf_order_hint">目标满额立即揭晓</span> -->
                <span class="conf_order_time rt"><?php echo date('Y-m-d H:i:s',(isset($info['end_time']) && ($info['end_time'] !== '')?$info['end_time']:0)); ?></span>
            </div>
            <?php else: ?>
            <div class="clear">
                揭晓时间
                <!-- <span class="conf_order_hint">目标满额立即揭晓</span> -->
                <span class="conf_order_time rt"><?php echo date('Y-m-d H:i:s',(isset($info['publish_time']) && ($info['publish_time'] !== '')?$info['publish_time']:0)); ?></span>
            </div>
            <?php endif; ?>
        </div>
        <div class="conf_order_data">
            <div class="clear">
                配送方式
                <span class="conf_order_time rt">
                    <!--1普通商品 2虚拟拍品 3大宗拍品-->
                    <?php switch($info['pg_spec']): case "1": ?>快递<?php break; case "2": ?>线上发货<?php break; case "3": ?>线下领取<?php break; endswitch; ?>
                </span>
            </div>
        </div>
        <div class="conf_order_data order_index_margin">
            <div class="clear">
                商品价格
                <span class="conf_order_time rt">￥<?php echo $info['pm_paymoney']; ?></span>
            </div>
        </div>
        <!-- <div class="conf_order_data">
            <div class="clear">
                运费
                <span class="conf_order_time rt">￥---</span>
            </div>
        </div> -->
        <div class="conf_order_data order_index_padding">
            <div class="clear">
                <p class="conf_order_time rt"> 总金额<span>￥<?php echo $info['pm_paymoney']; ?></span></p>
            </div>
        </div>

        <div class="order_index_form">
            <div class="order_index_list clear">
                <p class="lf">
                    订单编号
                    <span><?php echo $info['pm_sn']; ?></span>
                    <textarea id="new_select"><?php echo $info['pm_sn']; ?></textarea>
                </p>
                <!-- <div class="order_index_copy lf">
                复制
            </div> -->
            </div>
            <div class="order_index_list clear">
                <p class="lf">
                    下单时间
                    <span><?php echo date('Y-m-d H:i:s',(isset($info['add_time']) && ($info['add_time'] !== '')?$info['add_time']:0)); ?></span>
                </p>
            </div>
            <div class="order_index_list clear">
                <p class="lf">
                    付款时间
                    <span><?php echo date('Y-m-d H:i:s',(isset($info['pm_paytime']) && ($info['pm_paytime'] !== '')?$info['pm_paytime']:0)); ?></span>
                </p>
            </div>
            <?php if($info['pm_state'] > 2): if(!(empty($info['pm_state']) || (($info['pm_state'] instanceof \think\Collection || $info['pm_state'] instanceof \think\Paginator ) && $info['pm_state']->isEmpty()))): ?>
                <!--恭喜团中,订单退款中,订单已发货,已完成开始-->
                <div class="order_index_list clear">
                    <p class="lf">
                        揭晓时间
                        <span><?php echo date('Y-m-d H:i:s',(isset($info['publish_time']) && ($info['publish_time'] !== '')?$info['publish_time']:0)); ?></span>
                    </p>
                </div>
                <?php endif; else: if(!(empty($info['pm_state']) || (($info['pm_state'] instanceof \think\Collection || $info['pm_state'] instanceof \think\Paginator ) && $info['pm_state']->isEmpty()))): ?>
                <!--恭喜团中,订单退款中,订单已发货,已完成开始-->
                <div class="order_index_list clear">
                    <p class="lf">
                        截止时间
                        <span><?php echo date('Y-m-d H:i:s',(isset($info['end_time']) && ($info['end_time'] !== '')?$info['end_time']:0)); ?></span>
                    </p>
                </div>
                <?php endif; endif; ?>
            
            <!--恭喜团中,订单退款中,订单已发货结束-->
            <!--订单已发货,已完成开始-->
            <?php if(!(empty($info['fahuo_time']) || (($info['fahuo_time'] instanceof \think\Collection || $info['fahuo_time'] instanceof \think\Paginator ) && $info['fahuo_time']->isEmpty()))): ?>
            <div class="order_index_list clear">
                <p class="lf">
                    发货时间
                    <span><?php echo date('Y-m-d H:i:s',$info['fahuo_time']); ?></span>
                </p>
            </div>
            <?php endif; ?>
            <!--订单已发货,已完成结束-->
            <!--商品评价开始-->
            <?php if(!(empty($info['shouhuo_time']) || (($info['shouhuo_time'] instanceof \think\Collection || $info['shouhuo_time'] instanceof \think\Paginator ) && $info['shouhuo_time']->isEmpty()))): ?>
            <div class="order_index_list clear">
                <p class="lf">
                    收货时间
                    <span><?php echo date('Y-m-d H:i:s',$info['shouhuo_time']); ?></span>
                </p>
            </div>
            <?php endif; ?>
            <!--商品评价结束-->
            <!--已完成开始-->
            <?php if(!(empty($info['shouhuo_time']) || (($info['shouhuo_time'] instanceof \think\Collection || $info['shouhuo_time'] instanceof \think\Paginator ) && $info['shouhuo_time']->isEmpty()))): ?>
            <div class="order_index_list clear">
                <p class="lf">
                    成交时间
                    <span><?php echo date('Y-m-d H:i:s',$info['shouhuo_time']); ?></span>
                </p>
            </div>
            <?php endif; ?>
            <!--已完成结束-->
            <!--已关闭开始-->
            <?php if(!(empty($info['shouhuo_time']) || (($info['shouhuo_time'] instanceof \think\Collection || $info['shouhuo_time'] instanceof \think\Paginator ) && $info['shouhuo_time']->isEmpty()))): ?>
            <div class="order_index_list clear">
                <p class="lf">
                    关闭时间
                    <span><?php echo date('Y-m-d H:i:s',$info['close_time']); ?></span>
                </p>
            </div>
            <?php endif; ?>
            <!--已关闭结束-->
        </div>


        <?php if($info['pm_state'] ==1): ?>
        <!-- 商品等待付款 -->
        <!-- <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);">
                <div class=" order_payfor rt ">付款</div>
            </a>
            <a href="javascript:void(0);" onclick="cancel()">
                <div class=" rt ">取消订单</div>
            </a>
        </div> -->
        <!--订单已关闭-->
        <!-- <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);" onclick="del()">
                <div class="order_index_del rt ">删除订单</div>
            </a>
        </div> -->
        <?php elseif($info['pm_state'] ==2): ?>
        <!-- 人气王待揭晓 -->
        <div class="order_index_btn clear phonex">
            <a>
                <div class="order_index_tuikuan yaoqing rt "><img src="__STATIC__/image/order_info/icon_fenxiang@2x.png" alt=""> 邀请好友涨人气</div>
            </a>
            <!-- <?php if($info['pg_spec'] == 1): if(empty($info['pm_addressid']) || (($info['pm_addressid'] instanceof \think\Collection || $info['pm_addressid'] instanceof \think\Paginator ) && $info['pm_addressid']->isEmpty())): ?> -->
                <!-- 无地址 S -->
                <!-- <a class="change_address cong_dizhicon" i="0"><div class="order_index_review rt my_publish_renqicolor"> 添加地址</div></a> -->
                <!-- 无地址 E -->
                <!-- <?php else: ?> -->
                <!-- 有地址 S -->
                <!-- <a class="change_address cong_dizhicon" i="1"><div class="order_index_review rt my_publish_renqicolor"> 修改地址</div></a> -->
                <!-- 有地址 E -->
                <!-- <?php endif; ?> -->
            <!-- <?php endif; ?> -->
        </div>
        <?php elseif($info['pm_state'] ==3): ?>
            <!-- 恭喜成为人气王 -->
            <?php if($info['pm_order_status'] == 1): ?>
            <!--已中奖（待发货 -->
            <div class="order_index_btn clear phonex">
                <!-- 判断商品的属性，是普通商品才显示地址 -->
                    <!-- <?php if($info['pg_spec'] == 1): if(empty($info['pm_addressid']) || (($info['pm_addressid'] instanceof \think\Collection || $info['pm_addressid'] instanceof \think\Paginator ) && $info['pm_addressid']->isEmpty())): ?> -->
                            <!-- 无地址 S -->
                            <!-- <a class="change_address"><div class="order_index_review rt my_publish_renqicolor cong_dizhicon" i="0"> 添加地址</div></a> -->
                            <!-- 无地址 E -->
                            <!-- <?php else: ?> -->
                            <!-- 有地址 S -->
                            <!-- <a class="change_address"><div class="order_index_review rt my_publish_renqicolor"> 修改地址</div></a> -->
                            <!-- 有地址 E -->
                            <!-- <?php endif; ?> -->
                    <!-- <?php endif; ?> -->
                <a class="phs" href="tel:400-027-1888">
                    <div class="order_index_review rt ">联系客服</div>
                </a>
            </div>
            <?php elseif($info['pm_order_status'] ==2): ?>
            <!-- 2已发货 -->
            <div class="order_index_btn clear fahuoinfo phonex">
                <a href="javascript:void(0);">
                    <div class="order_index_shouhuo rt ">确认收货</div>
                </a>
                <a href="/member/Orderpai/pop_order_logistics/pm_id/<?php echo $info['pm_id']; ?>">
                    <div class="order_index_wuliu rt">发货信息</div>
                </a>
            </div>
            <?php elseif($info['pm_order_status'] ==3): ?>
            <!--3已签收-->
            <div class="order_index_btn clear fahuoinfo phonex">
                <a href="/popularity/popularitygoods/share_list/"></a>
                    <div class="order_guang rt ">随便逛逛</div>
                </a>
                <a href="javascript:void(0)" >
                    <div class="order_del rt ">删除订单</div>
                </a>
            </div>
            <?php endif; elseif($info['pm_state'] ==4): if($info['pm_order_status'] == 4): ?>
            <!-- 未成团 -->
                <!-- 很遗憾未能成为人气王 -->
                <?php if($info['pm_paystate'] == 2): ?>
                <!-- 退款中 -->
                <div class="order_index_btn clear phonex">
                    <a href="/popularity/popularityorder/refund_info/pm_id/<?php echo $info['pm_id']; ?>">
                        <div class="order_index_tuikuan rt ">退款信息</div>
                    </a>
                </div>
                <?php elseif($info['pm_paystate'] == 3): ?>
                <!-- 退款完成 -->
                <div class="order_index_btn clear phonex">
                    <a href="/popularity/popularityorder/refund_info/pm_id/<?php echo $info['pm_id']; ?>">
                        <div class="order_index_tuikuan rt ">退款信息</div>
                    </a>
                </div>
                <?php endif; else: ?>
                <!-- 很遗憾未能成为人气王 -->
                <?php if($info['pm_paystate'] == 2): ?>
                <!-- 退款中 -->
                <div class="order_index_btn clear phonex">
                    <a  href="/popularity/popularityorder/refund_info/pm_id/<?php echo $info['pm_id']; ?>">
                        <div class="order_index_tuikuan rt ">退款信息</div>
                    </a>
                </div>
                <?php elseif($info['pm_paystate'] == 3): ?>
                <!-- 退款完成 -->
                <div class="order_index_btn clear phonex">
                    <a href="/popularity/popularityorder/refund_info/pm_id/<?php echo $info['pm_id']; ?>">
                        <div class="order_index_tuikuan rt ">退款信息</div>
                    </a>
                </div>
                <?php endif; endif; endif; ?>
    </div>
    <!--支付密码浮动层-->
    <div class="ftc_wzsf">
        <div class="srzfmm_box">
            <div class="qsrzfmm_bt clear_wl">

                <span class="">请输入支付密码</span>
                <img src="__STATIC__/image/orderpai/icon_x@2x.png" class="tx close fr conf_order_colse">
            </div>
            <div class="zfmmxx_shop conf_order_paypassword_main clear">
                <p class="conf_order_hints">
                    <span class="conf_order_pay_text">需支付</span>
                    <span class="conf_order_fuhao">￥</span>
                    <span class="all_money"><?php echo (isset($info['pg_price']) && ($info['pg_price'] !== '')?$info['pg_price']:'0.00'); ?></span>
                </p>
            </div>

            <div class="inputBoxContainer" id="inputBoxContainer">
                <input type="tel" class="realInput" autofocus="autofocus"/>
                <div class="bogusInput">
                    <input type="password" maxlength="6" disabled class="active99"/>
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                    <input type="password" maxlength="6" disabled />
                </div>
            </div>
            <div class="conf_order_paypassword_hint clear">
                <div class="conf_order_balance lf">当前余额
                    <span> ￥---</span>

                    <p class="lack_msg" style="display: none;">余额不足请立即充值</p>
                </div>
                <div class="conf_order_pay rt">充值</div>
            </div>
            <input type="hidden" name="o_id" value="" />
            <input type="hidden" name="gp_id" value="" />
            <input type="hidden" name="gdr_id" value="" />
            <input type="hidden" name="gs_id" value="" />
            <a href="/member/Register/amnesia_payment">
                <p class="conf_forget">忘记密码</p>
            </a>
        </div>

        <div class="hbbj"></div>
    </div>
</main>

<!-- 分享弹窗 S -->
<div class="share-pop">
    <div class="share-over"></div>
    <div class="share-tip"></div>
    <div class="share-cont">
        <img class="share-tit" src="__STATIC__/image/store/share-tit.png" />
        <img class="share-code" src="<?php echo $info['code']; ?>" />
        <p>长按保存二维码到本地</p>
        <div data-clipboard-text="<?php echo $info['url']; ?>" class="share-link">链接分享</div>
        <div class="share-link-wx">链接分享</div>
    </div>
</div>
<!-- 分享弹窗 E -->

<!-- 安卓，ios分享效果 S -->
<div class="details_fenxiang">
    <div class="details_fxcon">
        <div class="details_fxtit">
            将商品分享至
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

        <footer></footer>
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
<script src="__STATIC__/js/clipboard.min.js"></script>
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script type="text/javascript" src="__JS__/md5.js"></script>
<script type="text/javascript" src="__JS__/cookie/jquery.cookie.js"></script>
<script>
    //秒数转标准时间
    function formatSeconds(value) {
        var secondTime = parseInt(value); // 秒
        var minuteTime = 0; // 分
        var hourTime = 0; // 小时
        if (secondTime > 60) {
            //如果秒数大于60，将秒数转换成整数
            //获取分钟，除以60取整数，得到整数分钟
            minuteTime = parseInt(secondTime / 60);
            //获取秒数，秒数取佘，得到整数秒数
            secondTime = parseInt(secondTime % 60);
            //如果分钟大于60，将分钟转换成小时
            if (minuteTime > 60) {
                //获取小时，获取分钟除以60，得到整数小时
                hourTime = parseInt(minuteTime / 60);
                //获取小时后取佘的分，获取分钟除以60取佘的分
                minuteTime = parseInt(minuteTime % 60);
            }
        }
        var result = "" + parseInt(secondTime) + "秒";

        if (minuteTime > 0) {
            result = "" + parseInt(minuteTime) + "分" + result;
        }
        if (hourTime > 0) {
            result = "" + parseInt(hourTime) + "小时" + result;
        }
        return result;
    }
    var time = "";
    var o_isdelete = "";

    if (time > 0 && o_isdelete < 2) {
        $('.order_daifukuan').show();
        $('.order_yiguanbi').hide();
    } else {
        $('.order_daifukuan').hide();
        $('.order_yiguanbi').show();
    }

    // var id = setInterval(frame, 1000);
    function frame() {
        if (time == 0) {
            clearInterval(id);
            location.reload();
        } else {
            time--
            $('.count-down').text(formatSeconds(time));
        }
    }
</script>

<script>
    $(function () {
        // 点击付款
        $(".order_payfor").click(function () {
            $(".ftc_wzsf").show();
        })
        //关闭浮动
        $(".close").click(function () {
            $(".ftc_wzsf").hide();
            $(".mm_box li").removeClass("mmdd");
            $(".mm_box li").attr("data", "");
        });

        boxInput.init(function () {
            var pawval = boxInput.getBoxInputValue();
            setTimeout(function () {
                pwd = hex_md5(pawval);
                // 判断余额
                var $pay_money = parseFloat("");
                var $my_money = parseFloat("");
                if ($pay_money > $my_money) {
                    // 失败提示
                    layer.msg("<span style='color:#fff'>余额不足，请充值</span>", {
                        time: 2000
                    });
                    return false;
                }
                // 支付请求
                var o_id = $("input[name=o_id]").val();
                
                $.ajax({
                    url: "/member/Orderpai/order_pay",
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        o_id: o_id,
                        pwd: pwd
                    },
                    success: function (data) {
                        //console.log(data);
                        if (data.status == 2) {
                            layer.msg("<span style='color:#fff'>" + data.msg +
                                "</span>", {
                                    time: 2000
                            });
                            $(".realInput").val('')
                            boxInput.setValue();
                        } else {
                            window.location.href =
                                "/member/orderpai/pay_result/o_id/" + o_id;
                        }
                    }
                });
            }, 200);
        });
        // 点击充值
        $('.conf_order_pay').click(function () {
            var o_id = $("input[name=o_id]").val();
            window.location.href = "/member/wallet/recharge/r_jump_type/1/r_jump_id/" + o_id;
        });

        // 确认收货
        $(".order_index_shouhuo").click(function () {
            var o_id = <?php echo $info['pm_id']; ?>;
            // console.log(o_id);
            // return false;
            layer.confirm("是否确认收货？", {
                title: false,
                /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['取消', '确认'], //按钮
                btn2: function (index) {
                    //按钮2的回调
                    $.ajax({
                        type: 'GET',
                        url: '/popularity/popularityorder/confirm_pm/pm_id/' + o_id,
                        dataType: 'json',
                        success: function (res) {
                            if (res.status == 1) {
                                layer.msg("<span style='color:#fff'>" + res.msg +
                                    "</span>", {
                                        time: 2000
                                    },
                                    function () {
                                        location.reload();
                                    });
                            } else {
                                layer.msg("<span style='color:#fff'>" + res.msg +
                                    "</span>", {
                                        time: 2000
                                    });
                                layer.close(index);
                            }
                        }
                    });
                }
            })
        });

        // 发货信息
        $(".order_index_wuliu").click(function () {
            var o_id = $("input[name=o_id]").val();
            window.location.href = "/member/Orderpai/order_logistics/o_id/" + o_id;
        });

        // 复制订单编号
        $(".order_index_copy").click(function () {
            $("#new_select").select();
            document.execCommand("Copy"); //执行浏览器复制命令
            layer.msg("<span style='color:#fff'>复制成功，快去粘贴吧</span>", {
                time: 2000
            });
        });
        // console.log($('.conf_tit').attr('i'));
        // 更换收货地址
        function clic(){
            $(".change_address").click(function(){
                var pm_id = "<?php echo (isset($info['pm_id']) && ($info['pm_id'] !== '')?$info['pm_id']:0); ?>";
                var pm_addressid = "<?php echo (isset($info['pm_addressid']) && ($info['pm_addressid'] !== '')?$info['pm_addressid']:0); ?>";
                var pm_order_status = "<?php echo (isset($info['pm_order_status']) && ($info['pm_order_status'] !== '')?$info['pm_order_status']:0); ?>";
                var pm_state="<?php echo (isset($info['pm_state']) && ($info['pm_state'] !== '')?$info['pm_state']:0); ?>";
                var pm_addressid = '<?php echo $info['pm_addressid']; ?>';
                var hasAddress = $('.cong_dizhicon').attr('i');

                // console.log(pm_addressid);
                if(pm_state<3||pm_state>2&&(pm_addressid==0 || pm_addressid==''|| pm_addressid==null)){
                      //不能改地址
                    window.location.href="/member/address/index/pm_id/"+pm_id;
                    $.cookie('hasAddress',hasAddress,{expire:1000,path:'/'});
                }
                // if(pm_order_status !=2 && pm_order_status !=3){
                    // 已发货 已签收不能改地址
                    
                // }
            });
        }

        // var addressid = '<?php echo $info['pm_addressid']; ?>';
        // if(addressid == null || addressid == '' || addressid == 0){
        //     console.log(1);
            clic();
        // }else{
        //     console.log(2);
        // }
        // alert(addressid);
        // console.log(addressid);
        // if(addressid != null || addressid != '' || addressid != 0){
        //     $('.change_address').unbind('click');
        //
        // }else{
        //     window.location.href="/member/address/index/pm_id/"+pm_id;
        // }

    })

    // 退款详情
    // function refund_info() {
    //     var o_id = "";
    //     window.location.href = "/popularity/popularityorder/refund_info/pm_id/" + o_id;
    // }

    // 功能建设中
    function built() {
        layer.msg("<span style='color:#fff'>功能建设中，如急需查看请联系客服哦~</span>", {
            time: 2000
        });
    }
    //取消订单
    function cancel() {
        var o_id = $("input[name=o_id]").val();
        layer.confirm("是否确认取消该订单？", {
            title: false,
            /*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            btn: ['取消', '确认'], //按钮
            btn2: function (index) {
                //按钮2的回调
                $.ajax({
                    type: 'GET',
                    url: '/member/orderpai/cancel_order/o_id/' + o_id,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status == 1) {
                            layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                time: 2000
                            }, function () {
                                location.reload();
                            });
                        } else {
                            layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                time: 2000
                            });
                            layer.close(index);
                        }
                    }
                });
            }
        })
    }

    //删除订单
    $('.order_del').click(function(){
        del()
    })
    function del() {
        var o_id = $("input[name=o_id]").val();
        
        layer.confirm("是否确认删除该订单？", {
            title: false,
            /*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            btn: ['取消', '确认'], //按钮
            btn2: function (index) {
                //按钮2的回调
                $.ajax({
                    type: 'GET',
                    url: '/popularity/popularityorder/delete_pm/pm_id/' + o_id,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status == 1) {
                            layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                time: 2000
                            }, function () {
                                window.location.href =
                                    "/member/Orderpai/orderlist/type/0";
                            });
                        } else {
                            layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                time: 2000
                            });
                            layer.close(index);
                        }
                    }
                });
            }
        })
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

    //ios 判断是否是app
    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    setupWebViewJavascriptBridge(function(bridge) {
        /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
        bridge.callHandler('isApp',function(str) {
            if(str == '1.0') {
                $('.phs').removeAttr('href').attr('onclick','call(4000271888)');
            }
            $('#app').val(str);
        })
    })

    function call(tel) {
        var data = '{"tel": "'+ tel +'"}'
        setupWebViewJavascriptBridge(function(bridge) {
            /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
            bridge.callHandler('call_tel',data);
        })
    }

    title = "<?php echo $info['share_title']; ?>";
    link = "<?php echo $info['share_link']; ?>";
    desc = "<?php echo $info['share_desc']; ?>";
    imgUrl = "<?php echo $info['share_imgUrl']; ?>";
    var share_qr_image = "https://"+ document.domain +"<?php echo $info['code']; ?>";

    //显示分享弹窗
    $('.yaoqing').click(function () {        
        var data = '{"share_title": "' + title + '","share_content": "' + desc + '","share_url": "' + link + '","share_image": "' + imgUrl +
            '","is_share_to_firend_circle": "1","share_qr_image": "'+ share_qr_image +'","type": "1"}';           

        if($('#app').val() != '') {
            if($('#app').val() == '1.0') {
                /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
                setupWebViewJavascriptBridge(function(bridge) {
                    /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                    bridge.callHandler('getShareParams',data);
                })
            }else {
                $('.details_fenxiang').show();
            }
            
        } else {
            // 非微信浏览器端安卓分享
            if (hideFlag) {
                if (typeof (window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        if(getCookie("version") == null) {
                            $('.details_fenxiang').show();
                        }else {
                            window.android.getShareParams(data);
                        }
                    }
                } else {
                    $('.share-pop').show();
                    $('.share-cont').show();
                    $('.share-tip').hide();
                }
            } else {
                $('.share-pop').show();
                $('.share-cont').show();
                $('.share-tip').hide();
            }
        }
    });

    //隐藏分享弹窗
    $('.share-over').click(function () {
        $('.share-pop').hide();
    });

    //复制功能
    var btns = document.querySelectorAll('.share-link');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function (e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>', {
            time: 2000
        });
    });

    clipboard.on('error', function (e) {
        layer.msg('<span style="color:#fff">链接复制成功，快去分享吧！</span>', {
            time: 2000
        });
    });

    // 判断是否在微信内
    if (isWeiXin()) {
        $('.share-link-wx').show();
        $('.share-link').hide();
        //console.log(" 是来自微信内置浏览器")
    } else {
        $('.share-link').show();
        $('.share-link-wx').hide();
        //console.log("不是来自微信内置浏览器")
    }

    //微信分享提示
    $('.share-link-wx').click(function () {
        $('.share-cont').hide();
        $('.share-tip').show();

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

    //关闭app分享弹窗
    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })
    
    function app(id) {

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
                if (typeof (window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        window.android.getShareParams(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }

    function copyUrl() {
        var data = '{"copy_url": "'+ link +'"}';
        if ($('#app').val() != '') {
            /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
            setupWebViewJavascriptBridge(function (bridge) {
                /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                bridge.callHandler('getCopyUrl', data);
            })
        } else {
            // 非微信浏览器端安卓复制链接
            if (hideFlag) {
                if (typeof (window.android) != "undefined") {
                    if (androidIos() == 'android') {
                        window.android.getCopyUrl(data);
                    }
                }
            }
        }
        $('.details_fenxiang').hide();
    }
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>