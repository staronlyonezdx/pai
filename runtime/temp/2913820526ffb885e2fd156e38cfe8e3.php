<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\project\pai\public/../application/member/view/orderpai/index.html";i:1542081232;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/conf_order.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/stroe/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/order_info/index.css">

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
        
<main>
    <div class="header_nav">
        <div class="header_view">
            <div class="header_tit">
                <span>订单详情</span>
                <div class="header_back" onclick="backUrl()">
                    <img src="/static/icon/publish/icon_nav_back@2x.png" name="out" class="smt">
                </div>
            </div>
        </div>
    </div>
    <?php if($info['o_paystate'] == 1): if($info['live_paytime'] > 0 && $info['o_isdelete'] < 2): ?>
    <!--待付款开始-->
    <div class="order_index order_daifukuan">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_ka@2x.png" alt="">
            </div>
            <p class="lf">商品等待付款</p>
        </div>
        <p class="order_index_hink">剩余<span class="count-down"></span>  若未付款将取消订单</p>
    </div>
    <!--待付款结束-->
    <?php else: ?>
    <!--已关闭开始-->
    <div class="order_index order_yiguanbi">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_guanbi@2x.png" alt="">
            </div>
            <p class="lf">订单已关闭</p>
        </div>
        <?php if($info['o_isdelete'] > 1): ?>
        <p class="order_index_hink">该订单已取消</p>
        <?php else: ?>
        <p class="order_index_hink">该订单已超时并关闭</p>
        <?php endif; ?>
    </div>
    <!--已关闭结束-->
    <?php endif; elseif($info['o_paystate'] > 1): switch($info['o_state']): case "1": ?>
    <!--商品揭晓中开始-->
    <div class="order_index order_jiexiaozhong">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_ka@2x.png" alt="">
            </div>
            <?php if($is_lord ==1): ?>
            <p class="lf">商品进行中</p>
            <?php else: ?>
            <p class="lf">商品揭晓中</p>

            <?php endif; ?>
        </div>
        <p class="order_index_hink">当前进度<?php echo (isset($rate) && ($rate !== '')?$rate:0); ?>%
            <?php if($is_lord ==1): else: ?>
            达成目标后立即揭晓幸运儿
            <?php endif; ?></p>
        <?php if($is_lord ==1): else: ?>
        <div class="order_index_pic order_jiexiaozhong_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($info['m_name']) && ($info['m_name'] !== '')?$info['m_name']:''); ?></span>
                    等待开奖中
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>

            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    吖吖码编号
                </p>
                <a href="/member/orderpai/paier_info/o_id/<?php echo $info['o_id']; ?>" class="order_index_all order_index_chakan rt">
                    <span class="lookSomthing">查看</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--商品揭晓中结束-->
    <?php break; case "2": ?>
    <!--恭喜团中开始-->
    <div class="order_index order_zhongjiang">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_liwu@2x.png" alt="">
            </div>
            <p class="lf">
                <?php if(!(empty($info['is_fudai']) || (($info['is_fudai'] instanceof \think\Collection || $info['is_fudai'] instanceof \think\Paginator ) && $info['is_fudai']->isEmpty()))): if($info['is_fudai'] == 1): ?>
                恭喜您获得惊喜大福袋
                <?php else: ?>
                您的订单发货中
                <?php endif; else: ?>
                您的订单发货中
                <?php endif; ?>
            </p>
        </div>
        <p class="order_index_hink">            
            商家会尽快为您发货 请耐心等待哟            
        </p>
        <?php if($is_lord ==1): else: if($info['o_paystate'] == 3): ?>
        <p class="order_index_hink">备注：订单中含有未团中的吖吖码正在退款给您，请注意查收！</p>
        <?php elseif($info['o_paystate'] == 4): ?>
        <p class="order_index_hink">备注：订单中含有未团中的吖吖码已退款给您，请注意查收！</p>
        <?php endif; endif; if($is_lord ==1): else: ?>
        <div class="order_index_pic order_zhongjiang_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <!--<span><?php echo (isset($info['m_name']) && ($info['m_name'] !== '')?$info['m_name']:''); ?></span>-->
                    <?php if($info['is_fudai'] == 1): ?>
                    恭喜您~团中惊喜大福袋
                    <?php else: ?>
                    恭喜您团中商品
                    <?php endif; ?>
                    
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--恭喜团中结束-->
    <?php break; case "3": ?>
    <!--订单已发货开始-->
    <div class="order_index order_yifahuo">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_dizhi@2x.png" alt="">
            </div>
            <p class="lf">订单已发货啦</p>
        </div>
        <p class="order_index_hink">您可以查看发货信息哟 请耐心等待</p>
        <?php if($is_lord ==1): else: if($info['o_paystate'] == 3): ?>
        <p class="order_index_hink">备注：订单中含有未团中的吖吖码正在退款给您，请注意查收！</p>
        <?php elseif($info['o_paystate'] == 4): ?>
        <p class="order_index_hink">备注：订单中含有未团中的吖吖码已退款给您，请注意查收！</p>
        <?php endif; endif; if($is_lord ==1): else: ?>
        <div class="order_index_pic order_jiexiaozhong_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <!--<span><?php echo (isset($info['m_name']) && ($info['m_name'] !== '')?$info['m_name']:''); ?></span>-->
                    <?php if($info['is_fudai'] == 1): ?>
                    恭喜您~团中惊喜大福袋
                    <?php else: ?>
                    恭喜您团中商品
                    <?php endif; ?>
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--订单已发货结束-->
    <?php break; case "4": ?>
    <!--评价商品开始-->
    <div class="order_index order_pingjia">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_pingjia@2x.png" alt="">
            </div>
            <p class="lf">评价商品</p>
        </div>
        <p class="order_index_hink">您还没有评价该商品哟 快去评价吧</p>
        <?php if($is_lord ==1): else: ?>
        <div class="order_index_pic order_jiexiaozhong_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <!--<span><?php echo (isset($info['m_name']) && ($info['m_name'] !== '')?$info['m_name']:''); ?></span>-->
                    <?php if($info['is_fudai'] == 1): ?>
                    恭喜您~团中惊喜大福袋
                    <?php else: ?>
                    恭喜您团中商品
                    <?php endif; ?>
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--评价商品结束-->
    <?php break; case "5": ?>
    <!--交易已完成开始-->
    <div class="order_index order_yiwancheng">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_wancheng@2x.png" alt="">
            </div>
            <p class="lf">交易已完成</p>
        </div>
        <p class="order_index_hink">不继续参团的话 好运会流失的哟</p>
        <?php if($is_lord ==1): else: ?>
        <div class="order_index_pic order_yiwancheng_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <!--<span><?php echo (isset($info['m_name']) && ($info['m_name'] !== '')?$info['m_name']:''); ?></span>-->
                    <?php if($info['is_fudai'] == 1): ?>
                    恭喜您~团中惊喜大福袋
                    <?php else: ?>
                    恭喜您团中商品
                    <?php endif; ?>
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--交易已完成结束-->
    <?php break; case "10": ?>
    <!--未团中退款信息-->
    <?php if($info['o_paystate'] == 3): ?>
    <!--订单退款中开始-->
    <div class="order_index order_tuikaunzhong">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_ka@2x.png" alt="">
            </div>
            <p class="lf">订单退款中</p>
            <?php if($is_lord ==1): else: ?>
            <a href="/index/index/agreement/at_name/退款规则详情" class="order_tuikuangz rt">
                <span>退款规则</span>
                <img src="__STATIC__/image/orderpai/icon_jump1@2x.png" alt="">
            </a>

            <?php endif; ?>
        </div>
        <?php if($is_lord ==1): ?>
        <p class="order_index_hink">很遗憾！您未成团宝贝~系统将自动为你退款</p>
        <?php else: ?>
        <p class="order_index_hink">很遗憾！您未团中宝贝~系统将自动为你退款</p>
        <?php endif; if($is_lord ==1): else: ?>
        <div class="order_index_pic order_tuikaunzhong_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($awardinfo['m_name_secret']) && ($awardinfo['m_name_secret'] !== '')?$awardinfo['m_name_secret']:''); ?></span>
                    <?php if($info['is_fudai'] == 1): ?>
                    团中惊喜大福袋
                    <?php else: ?>
                    团中本次商品
                    <?php endif; ?>
                    
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump2@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>

        <?php endif; ?>
    </div>
    <!--订单退款中结束-->
    <?php elseif($info['o_paystate'] == 4): ?>
    <!--退款已完成开始-->
    <div class="order_index order_yiwancheng">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_wancheng@2x.png" alt="">
            </div>
            <p class="lf">退款已完成</p>
        </div>
        <p class="order_index_hink">您的订单退款已完成</p>
        <?php if($is_lord ==1): else: ?>
        <div class="order_index_pic order_yiwancheng_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($awardinfo['m_name_secret']) && ($awardinfo['m_name_secret'] !== '')?$awardinfo['m_name_secret']:''); ?></span>
                    <?php if($info['is_fudai'] == 1): ?>
                    团中惊喜大福袋
                    <?php else: ?>
                    团中本次商品
                    <?php endif; ?>
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--退款已完成结束-->
    <?php endif; ?>
    <!--未团中退款信息 end-->
    <?php break; case "11": ?>
    <!--未成团退款信息-->
    <?php if($info['o_paystate'] == 3): ?>
    <!--订单退款中开始-->
    <div class="order_index order_tuikaunzhong">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_ka@2x.png" alt="">
            </div>
            <p class="lf">订单退款中</p>
            <a href="/index/index/agreement/at_name/退款规则详情" class="order_tuikuangz rt">
                <span>退款规则</span>
                <img src="__STATIC__/image/orderpai/icon_jump1@2x.png" alt="">
            </a>
        </div>
        <p class="order_index_hink">很遗憾！商品未成团~系统将自动为你退款</p>
        <?php if($is_lord ==1): else: ?>
        <div class="order_index_pic order_tuikaunzhong_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($awardinfo['m_name_secret']) && ($awardinfo['m_name_secret'] !== '')?$awardinfo['m_name_secret']:''); ?></span>
                    <?php if($info['is_fudai'] == 1): ?>
                    团中惊喜大福袋
                    <?php else: ?>
                    团中本次商品
                    <?php endif; ?>
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump2@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--订单退款中结束-->
    <?php elseif($info['o_paystate'] == 4): ?>
    <!--退款已完成开始-->
    <div class="order_index order_yiwancheng">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_wancheng@2x.png" alt="">
            </div>
            <p class="lf">退款已完成</p>
        </div>
        <p class="order_index_hink">您的订单退款已完成</p>
        <?php if($is_lord ==1): else: ?>
        <div class="order_index_pic order_yiwancheng_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($awardinfo['m_name_secret']) && ($awardinfo['m_name_secret'] !== '')?$awardinfo['m_name_secret']:''); ?></span>
                    <?php if($info['is_fudai'] == 1): ?>
                    团中惊喜大福袋
                    <?php else: ?>
                    团中本次商品
                    <?php endif; ?>
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--退款已完成结束-->
    <?php endif; ?>
    <!--未成团退款信息 end-->
    <?php break; ?>

    <!-- 福袋商品订单状态 S -->
    <?php case "12": ?>
    <!--恭喜团中开始-->
    <div class="order_index order_jiexiaozhong">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_liwu@2x.png" alt="">
            </div>
            <p class="lf">
                您的超值福袋已备好
            </p>
        </div>
        <p class="order_index_hink">            
            商家会尽快为您发货 请耐心等待哟            
        </p>
        <?php if($is_lord ==1): else: if($info['o_paystate'] == 3): ?>
        <!-- <p class="order_index_hink">备注：订单中含有未团中的吖吖码正在退款给您，请注意查收！</p> -->
        <?php elseif($info['o_paystate'] == 4): ?>
        <!-- <p class="order_index_hink">备注：订单中含有未团中的吖吖码已退款给您，请注意查收！</p> -->
        <?php endif; endif; if($is_lord ==1): else: ?>
        <div class="order_index_pic order_zhongjiang_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($awardinfo['m_name_secret']) && ($awardinfo['m_name_secret'] !== '')?$awardinfo['m_name_secret']:''); ?></span>
                    团中惊喜大福袋
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--恭喜团中结束-->
    <?php break; case "13": ?>
    <!--订单已发货开始-->
    <div class="order_index order_yifahuo">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_dizhi@2x.png" alt="">
            </div>
            <p class="lf">订单已发货啦</p>
        </div>
        <p class="order_index_hink">您可以查看发货信息哟 请耐心等待</p>
        <?php if($is_lord ==1): else: if($info['o_paystate'] == 3): ?>
        <!-- <p class="order_index_hink">备注：订单中含有未团中的吖吖码正在退款给您，请注意查收！</p> -->
        <?php elseif($info['o_paystate'] == 4): ?>
        <!-- <p class="order_index_hink">备注：订单中含有未团中的吖吖码已退款给您，请注意查收！</p> -->
        <?php endif; endif; if($is_lord ==1): else: ?>
        <div class="order_index_pic order_jiexiaozhong_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($awardinfo['m_name_secret']) && ($awardinfo['m_name_secret'] !== '')?$awardinfo['m_name_secret']:''); ?></span>
                    团中惊喜大福袋
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--订单已发货结束-->
    <?php break; case "14": ?>
    <!--评价商品开始-->
    <div class="order_index order_pingjia">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_pingjia@2x.png" alt="">
            </div>
            <p class="lf">评价商品</p>
        </div>
        <p class="order_index_hink">您还没有评价该商品哟 快去评价吧</p>
        <?php if($is_lord ==1): else: ?>
        <div class="order_index_pic order_jiexiaozhong_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($awardinfo['m_name_secret']) && ($awardinfo['m_name_secret'] !== '')?$awardinfo['m_name_secret']:''); ?></span>
                    团中惊喜大福袋
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--评价商品结束-->
    <?php break; case "15": ?>
    <!--交易已完成开始-->
    <div class="order_index order_yiwancheng">
        <div class="order_index_top clear">
            <div class="order_img lf">
                <img src="__STATIC__/image/orderpai/icon_wancheng@2x.png" alt="">
            </div>
            <p class="lf">交易已完成</p>
        </div>
        <p class="order_index_hink">不继续参团的话 好运会流失的哟</p>
        <?php if($is_lord ==1): else: ?>
        <div class="order_index_pic order_yiwancheng_pic">
            <div class="order_index_pic_top clear">
                <div class="order_index_header lf">
                    <img src="__CDN_PATH__<?php echo (isset($info['my_info']['m_avatar']) && ($info['my_info']['m_avatar'] !== '')?$info['my_info']['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>" alt="">
                    <!-- <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt=""> -->
                </div>
                <p class="lf">
                    <span><?php echo (isset($awardinfo['m_name_secret']) && ($awardinfo['m_name_secret'] !== '')?$awardinfo['m_name_secret']:''); ?></span>
                    团中惊喜大福袋
                </p>
                <a href="/member/orderpai/paier_list/gdr_id/<?php echo $info['gdr_id']; ?>/o_periods/<?php echo $info['o_periods']; ?>" class="order_index_all rt">
                    <span>所有参与者</span>
                    <img src="__STATIC__/image/orderpai/icom_jump@2x.png" alt="">
                </a>
            </div>
            <div class="order_index_bototm clear">
                <div class="order_index_icon lf">
                    <img src="__STATIC__/image/orderpai/icon_xingyun@2x.png" alt="">
                </div>
                <p class="lf">
                    团中吖吖码
                </p>
                <span class="rt"><?php echo (isset($awardinfo['oa_code']) && ($awardinfo['oa_code'] !== '')?$awardinfo['oa_code']:''); ?></span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!--交易已完成结束-->
    <?php break; ?>
    <!-- 福袋商品订单状态 E -->
    <?php endswitch; endif; if($info['gs_id'] == 1): ?>
    <a href="##">
        <div class="conf_order">
            <div class="conf_list clear">
                <div class="conf_img lf">
                    <img src="__STATIC__/icon/publish/icon_nav_dingwei@2x.png">
                </div>
                <div class="conf_name lf">
                    <p class="conf_tit clear">
                        <?php echo (isset($info['o_receiver']) && ($info['o_receiver'] !== '')?$info['o_receiver']:''); ?>
                        <span class="conf_default">默认</span>
                        <span class="rt"><?php echo (isset($info['o_mobile_secret']) && ($info['o_mobile_secret'] !== '')?$info['o_mobile_secret']:''); ?></span>
                    </p>
                    <p class="conf_site">
                        <?php echo (isset($info['o_address']) && ($info['o_address'] !== '')?$info['o_address']:''); ?>
                        <span class="rt"></span>
                    </p>
                </div>
            </div>
            <div class="conf_seal">
                <img src="__STATIC__/image/orderpai/icon_ft@2x.png">
            </div>
        </div>
    </a>
    <?php endif; ?>

    <div class="conf_content">
        <a href="/member/shop/index/store_id/<?php echo (isset($info['store_id']) && ($info['store_id'] !== '')?$info['store_id']:0); ?>">
            <div class="conf_con_tit">
                <img src="__CDN_PATH__<?php echo (isset($info['store_logo']) && ($info['store_logo'] !== '')?$info['store_logo']:'__STATIC__/image/myhome/TIM20180731142117.jpg'); ?>">
                <span ><?php echo (isset($info['stroe_name']) && ($info['stroe_name'] !== '')?$info['stroe_name']:''); ?></span>
            </div>
        </a>
        <div class="conf_order_main clear">
            <a href="/member/goodsproduct/index/g_id/<?php echo (isset($info['g_id']) && ($info['g_id'] !== '')?$info['g_id']:0); ?>">
                <div class="conf_order_img lf">
                    <?php if(!(empty($info['is_fudai']) || (($info['is_fudai'] instanceof \think\Collection || $info['is_fudai'] instanceof \think\Paginator ) && $info['is_fudai']->isEmpty()))): if($info['is_fudai'] == 1): ?>
                    <div class="ssy"></div>
                    <?php endif; endif; if(!(empty($info['is_huodong']) || (($info['is_huodong'] instanceof \think\Collection || $info['is_huodong'] instanceof \think\Paginator ) && $info['is_huodong']->isEmpty()))): if($info['is_huodong'] == 1): ?>
                    <div class="ssy"></div>
                    <?php endif; endif; ?>
                    <img src="__CDN_PATH__<?php echo (isset($info['gp_img']) && ($info['gp_img'] !== '')?$info['gp_img']:''); ?>">
                </div>
                <div class="conf_order_text lf">                    
                        <?php if(!(empty($info['is_fudai']) || (($info['is_fudai'] instanceof \think\Collection || $info['is_fudai'] instanceof \think\Paginator ) && $info['is_fudai']->isEmpty()))): if($info['is_fudai'] == 1): ?>
                        <p>
                        <img src="__STATIC__/image/goodsproduct/icon_chaozhigou@2x.png">
                        <?php endif; endif; if(!(empty($info['is_huodong']) || (($info['is_huodong'] instanceof \think\Collection || $info['is_huodong'] instanceof \think\Paginator ) && $info['is_huodong']->isEmpty()))): if($info['is_huodong'] == 1): ?>
                        <p style="background:url(__STATIC__/image/goodsproduct/Icon_11biaoshi@2x.png) no-repeat left 0.035rem;background-size: 0.8rem; text-indent: 0.9rem;">
                        <?php endif; endif; ?>
                        <?php echo (isset($info['g_name']) && ($info['g_name'] !== '')?$info['g_name']:''); ?>                        
                    </p>
                    <div class="conf_order_price clear">
                        <span class="conf_order_new">
                            ￥<?php echo (isset($info['o_money']) && ($info['o_money'] !== '')?$info['o_money']:'0.00'); ?>
                            <span>￥<?php echo (isset($info['gp_market_price']) && ($info['gp_market_price'] !== '')?$info['gp_market_price']:'0.00'); ?></span>
                        </span>
                        <span class="conf_order_inventory rt">
                            数量x<span><?php echo (isset($info['gp_num']) && ($info['gp_num'] !== '')?$info['gp_num']:0); ?></span>
                        </span>
                        <span class="conf_order_zhekou rt">
                            <img src="<?php echo $info['gdt_detail']['gdt_img']; ?>" alt="">
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="conf_order_data">
            <div class="clear">
                <?php if($info['is_fudai'] == 1): ?>
                揭晓时间
                <?php else: ?>
                截止日期
                <?php endif; if($is_lord ==1): else: ?>
                <span class="conf_order_hint">目标满额立即揭晓</span>
                <?php endif; ?>
                <span class="conf_order_time rt"><?php echo date('Y-m-d H:i',(isset($info['g_endtime']) && ($info['g_endtime'] !== '')?$info['g_endtime']:0)); ?></span>
            </div>
        </div>
        <div class="conf_order_data">
            <div class="clear">
                配送方式
                <span class="conf_order_time rt"><?php echo (isset($info['g_express_way']) && ($info['g_express_way'] !== '')?$info['g_express_way']:''); ?></span>
            </div>
        </div>
        <div class="conf_order_data order_index_margin">
            <div class="clear">
                商品价格
                <span class="conf_order_time rt">￥<?php echo (isset($info['o_money']) && ($info['o_money'] !== '')?$info['o_money']:'0.00'); ?></span>
            </div>
        </div>
        <div class="conf_order_data">
            <div class="clear">
                运费
                <span class="conf_order_time rt">￥<?php echo (isset($info['o_deliverfee']) && ($info['o_deliverfee'] !== '')?$info['o_deliverfee']:'0.00'); ?></span>
            </div>
        </div>
        <div class="conf_order_data order_index_padding">
            <div class="clear">
                <p class="conf_order_time rt"> 总金额<span>￥<?php echo (isset($info['o_totalmoney']) && ($info['o_totalmoney'] !== '')?$info['o_totalmoney']:'0.00'); ?></span></p>
            </div>
        </div>

        <div class="order_index_form">
            <div class="order_index_list clear">
                <p class="lf">
                    订单编号
                    <span><?php echo (isset($info['o_sn']) && ($info['o_sn'] !== '')?$info['o_sn']:''); ?></span>
                    <textarea id="new_select"><?php echo (isset($info['o_sn']) && ($info['o_sn'] !== '')?$info['o_sn']:''); ?></textarea>
                </p>
                <!-- <div class="order_index_copy lf">
                    复制
                </div> -->
            </div>
            <div class="order_index_list clear">
                <p class="lf">
                    下单时间
                    <span><?php echo date('Y-m-d H:i',$info['o_addtime']); ?></span>
                </p>
            </div>
            <?php if($info['o_paystate'] > 1): if(!(empty($info['o_paytime']) || (($info['o_paytime'] instanceof \think\Collection || $info['o_paytime'] instanceof \think\Paginator ) && $info['o_paytime']->isEmpty()))): ?>
            <div class="order_index_list clear">
                <p class="lf">
                    付款时间
                    <span><?php echo date('Y-m-d H:i',$info['o_paytime']); ?></span>
                </p>
            </div>
            <?php endif; if($info['o_state'] > 1): if(!(empty($info['o_publishtime']) || (($info['o_publishtime'] instanceof \think\Collection || $info['o_publishtime'] instanceof \think\Paginator ) && $info['o_publishtime']->isEmpty()))): ?>
            <!--恭喜团中,订单退款中,订单已发货,已完成开始-->
            <div class="order_index_list clear">
                <p class="lf">
                    揭晓时间
                    <span><?php echo date('Y-m-d H:i',$info['o_publishtime']); ?></span>
                </p>
            </div>
            <!--恭喜团中,订单退款中,订单已发货结束-->
            <?php endif; if($info['o_state'] > 2 and $info['o_state'] < 6): if(!(empty($info['o_delivertime']) || (($info['o_delivertime'] instanceof \think\Collection || $info['o_delivertime'] instanceof \think\Paginator ) && $info['o_delivertime']->isEmpty()))): ?>
            <!--订单已发货,已完成开始-->
            <div class="order_index_list clear">
                <p class="lf">
                    发货时间
                    <span><?php echo date('Y-m-d H:i',$info['o_delivertime']); ?></span>
                </p>
            </div>
            <!--订单已发货,已完成结束-->
            <?php endif; if($info['o_state'] > 3): if(!(empty($info['o_receivetime']) || (($info['o_receivetime'] instanceof \think\Collection || $info['o_receivetime'] instanceof \think\Paginator ) && $info['o_receivetime']->isEmpty()))): ?>
            <!--商品评价开始-->
            <div class="order_index_list clear">
                <p class="lf">
                    收货时间
                    <span><?php echo date('Y-m-d H:i',$info['o_receivetime']); ?></span>
                </p>
            </div>
            <!--商品评价结束-->
            <?php endif; endif; if($info['o_state'] == 5): if(!(empty($info['o_dealtime']) || (($info['o_dealtime'] instanceof \think\Collection || $info['o_dealtime'] instanceof \think\Paginator ) && $info['o_dealtime']->isEmpty()))): ?>
            <!--已完成开始-->
            <div class="order_index_list clear">
                <p class="lf">
                    成交时间
                    <span><?php echo date('Y-m-d H:i',$info['o_dealtime']); ?></span>
                </p>
            </div>
            <!--已完成结束-->
            <?php endif; endif; endif; endif; else: if($info['live_paytime'] < 1): if(!(empty($info['o_closetime']) || (($info['o_closetime'] instanceof \think\Collection || $info['o_closetime'] instanceof \think\Paginator ) && $info['o_closetime']->isEmpty()))): ?>
            <!--已关闭开始-->
            <div class="order_index_list clear">
                <p class="lf">
                    关闭时间
                    <span><?php echo date('Y-m-d H:i',$info['o_closetime']); ?></span>
                </p>
            </div>
            <!--已关闭结束-->
            <?php endif; endif; endif; ?>
        </div>
        <?php if($info['o_paystate'] == 1): if($info['live_paytime'] > 0 && $info['o_isdelete'] < 2): ?>
        <!--待付款开始-->
        <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);"><div class=" order_payfor rt ">付款</div></a>
            <a href="javascript:void(0);" onclick="cancel()"><div class=" rt ">取消订单</div></a>
        </div>
        <!--待付款结束-->
        <?php else: ?>
        <!--已关闭开始-->
        <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);" onclick="del()"><div class="order_index_del rt ">删除订单</div></a>
        </div>
        <!--已关闭结束-->
        <?php endif; elseif($info['o_paystate'] > 1): switch($info['o_state']): case "1": ?>
        <!--商品揭晓中开始-->
        <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);"><div class="order_fenxiang_img rt "><img src="__STATIC__/image/orderpai/fenxiang.png" alt="">分享商品</div></a>
        </div>
        <!--商品揭晓中结束-->
        <?php break; case "2": ?>
        <!--恭喜团中开始-->
        <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);" onclick="built(this)"><div class="order_index_shenqingtuikuan rt ">申请退款</div></a>
            <a href="javascript:void(0);" onclick="built(this)"><div class="order_index_kefu rt ">联系客服</div></a>
        </div>
        <!--恭喜团中结束-->
        <?php break; case "3": ?>
        <!--订单已发货开始-->
        <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);"><div class="order_index_shouhuo rt ">确认收货</div></a>
            <?php if($info['gs_id'] == 1): ?>
            <a href="javascript:void(0);"><div class="order_index_wuliu rt ">发货信息<?php echo $info['gs_id']; ?></div></a>            
            <?php endif; ?>
        </div>
        <!--订单已发货结束-->
        <?php break; case "4": ?>
        <!--评价商品开始-->
        <div class="order_index_btn clear phonex">
            <a href="/member/review/review_add/o_id/<?php echo $info['o_id']; ?>"><div class="order_index_review rt ">评价商品</div></a>
        </div>
        <!--评价商品结束-->
        <?php break; case "5": ?>
        <!--交易已完成开始-->
        <div class="order_index_btn clear phonex">
            <a onclick="refund_info(this)"><div class="order_index_tuikuan rt ">退款信息</div></a>
        </div>
        <!--交易已完成结束-->
        <?php break; case "10": ?>
        <!--未团中退款信息-->
        <?php if($info['o_paystate'] == 3): ?>
        <!--订单退款中开始-->
        <div class="order_index_btn clear phonex">
            <a onclick="refund_info(this)"><div class="order_index_tuikuan rt ">退款信息</div></a>
        </div>
        <!--订单退款中结束-->
        <?php elseif($info['o_paystate'] == 4): ?>
        <!--退款已完成开始-->
        <div class="order_index_btn clear phonex">
            <a onclick="refund_info(this)"><div class="order_index_tuikuan rt ">退款信息</div></a>
        </div>
        <!--退款已完成结束-->
        <?php endif; ?>
        <!--未团中退款信息 end-->
        <?php break; case "12": ?>
        <!--恭喜团中开始-->
        <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);" onclick="built(this)"><div class="order_index_kefu rt ">联系客服</div></a>
        </div>
        <!--恭喜团中结束-->
        <?php break; case "13": ?>
        <!--订单已发货开始-->
        <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);"><div class="order_index_shouhuo rt ">确认收货</div></a>
            <?php if($info['gs_id'] == 1): ?>
            <a href="javascript:void(0);"><div class="order_index_wuliu rt ">发货信息<?php echo $info['gs_id']; ?></div></a>
            <?php endif; ?>
        </div>
        <!--订单已发货结束-->
        <?php break; case "14": ?>
        <!--评价商品开始-->
        <div class="order_index_btn clear phonex">
            <a href="/member/review/review_add/o_id/<?php echo $info['o_id']; ?>"><div class="order_index_review rt ">评价商品</div></a>
        </div>
        <!--评价商品结束-->
        <?php break; case "15": ?>
        <!--交易已完成开始-->
        <div class="order_index_btn clear phonex">
            <a href="javascript:void(0);" onclick="built(this)"><div class="order_index_kefu rt ">联系客服</div></a>
        </div>
        <!--交易已完成结束-->
        <?php break; endswitch; endif; ?>


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
                    <span class="all_money"><?php echo (isset($info['o_totalmoney']) && ($info['o_totalmoney'] !== '')?$info['o_totalmoney']:'0.00'); ?></span>
                </p>
            </div>
            <!-- <ul class="mm_box">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul> -->
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
                    <span> ￥<?php echo (isset($info['m_money']) && ($info['m_money'] !== '')?$info['m_money']:'0.00'); ?></span>

                    <p class="lack_msg" style="display: none;">余额不足请立即充值</p>
                </div>
                <div class="conf_order_pay rt">充值</div>
            </div>
            <input type="hidden" name="o_id" value="<?php echo (isset($info['o_id']) && ($info['o_id'] !== '')?$info['o_id']:0); ?>"/>
            <input type="hidden" name="gp_id" value="<?php echo (isset($info['gp_id']) && ($info['gp_id'] !== '')?$info['gp_id']:0); ?>"/>
            <input type="hidden" name="gdr_id" value="<?php echo (isset($info['gdr_id']) && ($info['gdr_id'] !== '')?$info['gdr_id']:0); ?>"/>
            <input type="hidden" name="gs_id" value="<?php echo (isset($info['gs_id']) && ($info['gs_id'] !== '')?$info['gs_id']:0); ?>"/>
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
<script src="__STATIC__/js/clipboard.min.js"></script>
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script type="text/javascript" src="__JS__/md5.js"></script>
<?php if($info['o_paystate'] == 1): ?>
<script>
    //秒数转标准时间
    function formatSeconds(value) {
        var secondTime = parseInt(value);// 秒
        var minuteTime = 0;// 分
        var hourTime = 0;// 小时
        if(secondTime > 60) {
            //如果秒数大于60，将秒数转换成整数
            //获取分钟，除以60取整数，得到整数分钟
            minuteTime = parseInt(secondTime / 60);
            //获取秒数，秒数取佘，得到整数秒数
            secondTime = parseInt(secondTime % 60);
            //如果分钟大于60，将分钟转换成小时
            if(minuteTime > 60) {
                //获取小时，获取分钟除以60，得到整数小时
                hourTime = parseInt(minuteTime / 60);
                //获取小时后取佘的分，获取分钟除以60取佘的分
                minuteTime = parseInt(minuteTime % 60);
            }
        }
        var result = "" + parseInt(secondTime) + "秒";

        if(minuteTime > 0) {
            result = "" + parseInt(minuteTime) + "分" + result;
        }
        if(hourTime > 0) {
            result = "" + parseInt(hourTime) + "小时" + result;
        }
        return result;
    }
    var time = "<?php echo $info['live_paytime']; ?>";
    var o_isdelete = "<?php echo $info['o_isdelete']; ?>";

    if(time > 0 && o_isdelete < 2) {
        $('.order_daifukuan').show();
        $('.order_yiguanbi').hide();
    }else {
        $('.order_daifukuan').hide();
        $('.order_yiguanbi').show();
    }

    var id = setInterval(frame, 1000);
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
<?php endif; ?>
<script>
    $(function(){
        // 点击付款
        $(".order_payfor").click(function(){
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
                var $pay_money = parseFloat("<?php echo (isset($all_money) && ($all_money !== '')?$all_money:'0'); ?>");
                var $my_money = parseFloat("<?php echo (isset($mem_info['m_money']) && ($mem_info['m_money'] !== '')?$mem_info['m_money']:'0'); ?>");
                if ($pay_money > $my_money) {
                    // 失败提示
                    layer.msg("<span style='color:#fff'>余额不足，请充值</span>", {
                        time: 2000
                    });
                    return false;
                }

                // 支付请求
                var o_id = $("input[name=o_id]").val();
                o_id = Number(o_id);
                $.ajax({
                    url: "/member/Orderpai/order_pay",
                    dataType: 'json',
                    type: 'POST',
                    data: {o_id: o_id, pwd: pwd},
                    success: function (data) {
                        //console.log(data);exit();
                        if(data.status != 1){
                            layer.msg("<span style='color:#fff'>"+data.msg+"</span>", {
                                time: 2000
                            });
                            console.log($(".realInput").val(''))
                            boxInput.setValue();
                        }else{
                            // 如果成团异步调用退款操作
                            if(data.data.is_mem_full > 0){                                
                                $.ajax({
                                    url: "/member/orderpai/pai_pay_callback",
                                    dataType: 'json',
                                    type: 'POST',
                                    success: function (data) {
                                        console.log(data);
                                        //不用做处理
                                    }
                                });
                            }
                            window.location.href="/member/orderpai/pay_result/o_id/"+o_id+"/j_type/1";
                        }
                    }
                });
            }, 200);
        });

        // 点击充值
        $('.conf_order_pay').click(function () {
            var o_id = $("input[name=o_id]").val();
            window.location.href="/member/wallet/recharge/r_jump_type/1/r_jump_id/"+o_id;
        });

        // 确认收货
        $(".order_index_shouhuo").click(function(){
            var o_id = $("input[name=o_id]").val();
            layer.confirm("是否确认收货？", {
                title: false,/*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['取消', '确认'], //按钮
                btn2: function (index) {
                    //按钮2的回调
                    $.ajax({
                        type: 'GET',
                        url: '/member/orderpai/confirm_order/o_id/' + o_id,
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
        });

        // 发货信息
        $(".order_index_wuliu").click(function(){
            var o_id = $("input[name=o_id]").val();
            window.location.href="/member/Orderpai/order_logistics/o_id/"+o_id;
        });

        // 复制订单编号
        $(".order_index_copy").click(function(){
            $("#new_select").select();
            document.execCommand("Copy");//执行浏览器复制命令
            layer.msg("<span style='color:#fff'>复制成功，快去粘贴吧</span>", {
                time: 2000
            });
        });
    })

    // 退款详情
    function refund_info(){
        var o_id = "<?php echo $info['o_id']; ?>";
        window.location.href="/member/Orderpai/refund_info/o_id/"+o_id;
    }

    // 功能建设中
    function built(){
        layer.msg("<span style='color:#fff'>功能建设中，如急需查看请联系客服哦~</span>", {
            time: 2000
        });
    }
    //取消订单
    function cancel() {
        var o_id = $("input[name=o_id]").val();
        layer.confirm("是否确认取消该订单？", {
            title: false,/*标题*/
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
    function del() {
        var o_id = $("input[name=o_id]").val();
        layer.confirm("是否确认删除该订单？", {
            title: false,/*标题*/
            closeBtn: 0,
            btnAlign: 'c',
            btn: ['取消', '确认'], //按钮
            btn2: function (index) {
                //按钮2的回调
                $.ajax({
                    type: 'GET',
                    url: '/member/orderpai/delete_order/o_id/' + o_id,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status == 1) {
                            layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                                time: 2000
                            }, function () {
                                window.location.href="/member/Orderpai/orderlist";
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

    title = "<?php echo $info['share_title']; ?>";
    link = "<?php echo $info['share_link']; ?>";
    desc = "<?php echo $info['share_desc']; ?>";
    var imgs = "https://"+ document.domain +"<?php echo $info['gp_img']; ?>";
    var share_qr_image = "https://"+ document.domain +"<?php echo $info['code']; ?>";
    //显示分享弹窗
    $('.order_fenxiang_img').click(function(){
        var data = '{"share_title": "' + title +'","share_content": "' + desc +'","share_url": "' + link +'","share_image": "' + imgs +'","is_share_to_firend_circle": "1","share_qr_image": "'+ share_qr_image +'","type": "1"}';

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
                    $('.share-pop').show();
                    $('.share-cont').show();
                    $('.share-tip').hide();
                }
            }else {
                $('.share-pop').show();
                $('.share-cont').show();
                $('.share-tip').hide();
            }
        }
    });

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

    // 判断是否在微信内
    if(isWeiXin()){
        $('.share-link-wx').show();
        $('.share-link').hide();
        //console.log(" 是来自微信内置浏览器")
    }else{
        $('.share-link').show();
        $('.share-link-wx').hide();
        //console.log("不是来自微信内置浏览器")
    }

    //微信分享提示
    $('.share-link-wx').click(function(){
        $('.share-cont').hide();
        $('.share-tip').show();

        //分享到朋友圈
        wx.onMenuShareTimeline({
            title: title,
            link: link,
            imgUrl: imgs,
        });
        //分享给朋友
        wx.onMenuShareAppMessage({
            title: title, // 分享标题
            desc: desc, // 分享描述
            link: link, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: imgs, // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        });
        //分享到QQ
        wx.onMenuShareQQ({
            title:title,
            desc: desc,
            link:link,
            imgUrl: imgs,
        });
        //分享到腾讯微博
        wx.onMenuShareWeibo({
            title:title,
            desc: desc,
            link:link,
            imgUrl: imgs,
        });
        wx.onMenuShareQZone({
            title:title,
            desc: desc,
            link:link,
            imgUrl: imgs,
        });
    });

    //关闭app分享弹窗
    $(".details_fx_cancel").click(function () {
        $(".details_fenxiang").hide();
    })

    function app(id) {
        var is_share_to_firend_circle = '';
        if(id == 0) {
            is_share_to_firend_circle = false;
        }else {
            is_share_to_firend_circle = true;
        }

        var data = '{"share_title": "' + title + '","share_content": "'+ desc +'","share_url": "' + link + '","share_image": "'+ imgs +'","is_share_to_firend_circle": '+is_share_to_firend_circle+'}';

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
        var data = '{"copy_url": "<?php echo $info['url']; ?>"}';
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

    // 头部返回
    function backUrl() {
        if(sessionStorage.getItem('backUrl') != null) {
            window.history.go(-2);
            sessionStorage.removeItem('backUrl');
        }else{
            window.history.go(-1);
        }
    }
</script>

</html>