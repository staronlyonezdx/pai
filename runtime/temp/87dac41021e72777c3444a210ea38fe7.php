<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"D:\project\pai\public/../application/popularity/view/popularitygoods/commodity_info.html";i:1542589248;s:69:"D:\project\pai\public/../application/popularity/view/common/base.html";i:1542013165;s:71:"D:\project\pai\public/../application/popularity/view/common/js_sdk.html";i:1541491295;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/mescroll/mescroll.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goodsproduct/swiper.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/productlist/product_list.css">
<link rel="stylesheet" type="text/css" href="__CSS__/popularity/details.css">
<link rel="stylesheet" type="text/css" href="__CSS__/stroe/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/orderpai/zhifu.css">
<link rel="stylesheet" type="text/css" href="__CSS__/order_info/index.css">
<link rel="stylesheet" type="text/css" href="__CSS__/popularity/popularity_birth.css">
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
        
<main style="margin-top: 0; background: #efeff4">
        <div class="details_tab_list details_display">
                <div class="details_tab clear">
                    <div class="details_tab_back lf back-btn">
                        <img src="__STATIC__/image/goods/icon_nav_back@2x.png" alt="图片加载失败">
                    </div>
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
                    <div class="details_top_rt rt" onclick="share(1)">
                        <img src="__STATIC__/image/goodsproduct/icon_nav_fenxiang2@2x.png" alt="图片加载失败">
                    </div>
                </div>
            </div>
    <div class="details_header_top">
        <!-- 返回按钮 S -->
        <div class="details_back lf details_fanhui back-btn">
            <img src="__STATIC__/image/goodsproduct/icon_nav_back@2x.png">
        </div>
        <!-- 返回按钮 E -->
        <!-- 分享按钮 S -->
        <div class="details_top_rt rt" onclick="share(1)">
            <img src="__STATIC__/image/goodsproduct/icon_nav_fenxiang@2x.png">
        </div>
        <!-- 分享按钮 E -->
    </div>

    <div class="detail_line_view">
        <!-- 轮播banner S -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if(empty($data['imgs']) || (($data['imgs'] instanceof \think\Collection || $data['imgs'] instanceof \think\Paginator ) && $data['imgs']->isEmpty())): ?>            
                <div class="swiper-slide">
                    <div class="details_pic">
                        <img class="details_img click_big" src="/static/image/index/pic_home_taplace@2x.png">
                    </div>
                </div>            
                <?php else: if(is_array($data['imgs']) || $data['imgs'] instanceof \think\Collection || $data['imgs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['imgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="swiper-slide" >
                    <div class="details_pic">
                        <img class="details_img click_big" src="<?php echo $vo; ?>" i="<?php echo $key; ?>">
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- 轮播banner E -->
        <div class="big_banner">
            <div class="swiper-banner big_swiper-container">
                <div class="swiper-wrapper">
                    <?php if(empty($data['imgs']) || (($data['imgs'] instanceof \think\Collection || $data['imgs'] instanceof \think\Paginator ) && $data['imgs']->isEmpty())): ?>
                    <div class="swiper-slide">
                        <div class="details_pic">
                            <img class="details_img" src="/static/image/index/pic_home_taplace@2x.png">
                        </div>
                    </div>
                    <?php else: if(is_array($data['imgs']) || $data['imgs'] instanceof \think\Collection || $data['imgs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['imgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="swiper-slide">
                        <div class="details_pic">
                            <img class="details_img" src="<?php echo $vo; ?>">
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
        <!-- 公告 S -->        
        <div class="details-act">
            <span></span>
            <small></small>
            <div class="dowebok"></div>
        </div>
        <!-- 公告 E -->

        <!-- 价格及倒计时 S-->
        <div class="details_data clear">
            <div class="details_ing"></div>
            <!-- 价格 S-->
            <div class="details_lf lf">
                <p class="details_lf_top">市场价
                    <span class="details_old">￥<?php echo isset($data['pg_market_price']) ? $data['pg_market_price'] :  '0.00'; ?></span>
                    <!-- <span class="details_hint">满额揭晓</span> -->
                </p>
                <p class="details_new"><span>￥</span><?php echo isset($data['pg_price']) ? $data['pg_price'] :  '0.00'; if(($data['pg_status']!=2)): ?>
                    <small>
                        <?php if($data['is_enough'] != 1): ?>
                        名额有限，占完即止！
                        <?php else: ?>
                        抢占已满，等待揭晓
                        <?php endif; ?>
                    </small>
                    <?php endif; ?>
                </p>
            </div>
            <!-- 价格 E-->

            <!-- 倒计时 S -->
            <div class="details_rt rt">
                <?php if(($data['pg_status']==2)): ?>
                <div class="j-star">
                    <p>即将开始</p>
                    标记商品上架会收到提醒的哦！
                </div>
                <?php else: ?>
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
                <?php endif; ?>                
            </div>
            <!-- 倒计时 E -->
        </div>
        <!-- 规则 S -->
        <a href="/popularity/popularitygoods/activity_rule/">
            <div class="details_rule clear">
                <span class="lf">拍吖吖人气购规则 了解一下~</span>
                <span class="rt">
                    查看规则
                    <img src="__STATIC__/image/details/icon_jump@2x.png">
                </span>
            </div>
        </a>
        <!-- 规则 E -->
        <!-- 产品名称 S -->
        <div class="details_top clear">
            <div class="details_icon">邀请好友点赞，助你成为人气王！</div>
            <div class="details_top_lf lf">
                <p><?php echo isset($data['pg_name']) ? $data['pg_name'] :  ''; ?></p>
                <span><?php echo $data['pg_second_name']; ?></span>

                <?php if(($data['pg_spec']== 1)): elseif(($data['pg_spec'] == 2)): ?>
                    <!--虚拟商品 S-->
                    <div class="details_xuni">
                        <p><span>虚拟商品</span>该商品为线下指定地点领取</p>
                    </div>
                    <!--虚拟商品 E -->
                <?php elseif(($data['pg_spec'] == 3)): ?>
                    <!--大宗商品 S-->
                    <div class="details_dazong">
                        <p><span>大宗商品</span>该商品为线下指定地点领取</p>
                    </div>
                    <!--大宗商品 E -->
                <?php endif; if(($data['pg_type']== 1)): ?>
                <!--现场揭晓 S-->
                <!-- <small class="details_xianchang">
                    该商品将在线上揭晓！
                </small> -->
                <!--现场揭晓 E -->
                <?php elseif(($data['pg_spec'] == 2)): ?>
                    <!--现场揭晓 S-->
                    <small class="details_xianchang">
                        该商品将在发布会现场揭晓并领取！
                    </small>
                    <!--现场揭晓 E -->
                <?php endif; ?>
            </div>


        </div>
        <!-- 产品名称 E -->
        <!-- 幸运奖 S -->
        <!-- <div class="details_top_luck ">
            <div class="details_save clear">
                <p class="details_reward lf">幸运奖</p>
                <div class="details_watch lf">
                    <img src="__STATIC__/image/popularity/wh.png" alt=""/>
                </div>
                <p class="details_watch_name lf">
                    DW男士商务手表手表手表手表手表手手酒店客房哈克斯到货付款时间
                </p>
                <div class="details_right_img rt">
                    <img src="__STATIC__/image/popularity/icon_jump2@2x.png" alt=""/>
                </div>
            </div>

        </div> -->
        <!-- 幸运奖 E -->
        <!-- 参加人数 S -->
        <div class="details_num">
            <p><span><?php echo isset($data['new_num']) ? $data['new_num'] :  0; ?></span>/<?php echo isset($data['pg_membernum']) ? $data['pg_membernum'] :  0; ?>人 <small>已抢占<i><?php echo $data['percentage']; ?></i></small></p>
            <div class=""><span style="width:<?php echo round($data['new_num']/$data['pg_membernum']*100,2); ?>%"></span></div>            
            <?php if($data['is_enough'] == 1): ?>
            <h3 class="enough"></h3>
            <?php endif; ?>
        </div>
        <!-- 参加人数 E -->

        <!-- 虚位以待 S -->
        <div class="details_xw"></div>
        <!-- 虚位以待 E -->

    </div>
    <!-- <small>人气排名前<?php echo $data['pg_chosen_num']; ?>将被邀请到发布会现场！</small> -->
    <!-- 前十排名 S -->
    <div class="detail_line_view">
        <?php if(!(empty($data['popularity_member']) || (($data['popularity_member'] instanceof \think\Collection || $data['popularity_member'] instanceof \think\Paginator ) && $data['popularity_member']->isEmpty()))): ?>
        <div class="details_rq">
            <div class="details_rq_tit">人气王排名</div>
            <ul>
                <?php if(is_array($data['popularity_member']) || $data['popularity_member'] instanceof \think\Collection || $data['popularity_member'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['popularity_member'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li>
                    <span>
                        <i class="icon<?php echo $key; ?>"></i>
                        <img src="__STATIC__/image/myhome/TIM20180731142117.jpg"  data-original="<?php echo isset($vo['m_avatar']) ? $vo['m_avatar'] :  '/static/image/shop/pic_fans@2x.png'; ?>" />
                    </span>
                    <p><?php echo isset($vo['m_name']) ? $vo['m_name'] :  ''; ?></p>
                    <p><small><?php echo isset($vo['pm_popularity']) ? $vo['pm_popularity'] :  '0'; ?></small>人气</p>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="details_rq_link"><a href="/popularity/popularitygoods/ranking_list/pg_id/<?php echo $data['pg_id']; ?>">查看全部排名</a></div>
        </div>
        <?php endif; ?>
    </div>
        <!-- 前十排名 E -->
        <!-- 产品图文详情 S -->
            <div class="detail_line_view">
                <div class="details">
                    <div class="details_tit">
                        <p>商品详情</p>
                    </div>
                    <div class="details_text">
                        <div class="shop-num" style="margin:0 0 0.5rem 0;">商品编号：<?php echo $data['pg_sn']; ?></div>
                        <?php echo htmlspecialchars_decode((isset($data['pg_des']) && ($data['pg_des'] !== '')?$data['pg_des']:'')); ?> 
                    </div>
                    <!--<div class="details_main">-->
                        <!--<img src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="<?php echo $data['pg_img']; ?>">-->
                    <!--</div>-->
                </div>
            </div>
            <!-- 产品图文详情 E -->

    <!-- 更多活动拍品 S -->
    <div class="detail_line_view">
        <div class="details_more_tit">
            <img src="/static/image/popularity/at.png">
        </div>
        <div class="details_produce">
            <div class="product_list_main goods_pro_main">
                <div class="product_list_content clear" id="dataList"></div>
            </div>
        </div>
    </div>
    <!-- 更多活动拍品 E -->

    <!-- 底部浮动按钮 S -->
    <div class="details_bottom clear phonex">
        <!-- 预上架 S -->
        <?php if(($data['pg_status']==2)): ?>
        <div class="details_bottom_lf lf clear">
            <a class="phs" href="tel:400-027-1888">
                <div class="details_evaluate_kefu_view lf">
                    <div class="details_evaluate_kefu">
                        <img src="/static/image/details/kefu.png">
                    </div>
                    <p class="details_bottom_border">客服</p>
                </div>
            </a>
        </div>
        <?php if($data['is_collection'] == 0): ?>
        <div class="bj_btn" onclick="collection(<?php echo $data['pg_id']; ?>,1)">标记商品，开团提醒我</div>
        <?php else: ?>
        <div class="bj_btn details_disabled" onclick="collection(<?php echo $data['pg_id']; ?>,1)">已标记，开团将提醒</div>
        <?php endif; else: ?>
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
            <a onclick="collection(<?php echo $data['pg_id']; ?>,2)">
                <div class="details_evaluate_kefu_view lf">
                    <div class="details_evaluate_kefu details_shoucang">
                        <img src="/static/image/popularity/sc<?php echo $data['is_collection']; ?>.png">
                    </div>
                    <p class="details_bottom_border scbj">
                        <?php if($data['is_collection'] == 0): ?>标记<?php else: ?>已标记<?php endif; ?>
                    </p>
                </div>
            </a>
        </div>
        <a class="details_bottom_rt auction lf share-yq" onclick="share(2)">邀请好友</a>
        <a class="details_bottom_rt auction lf details_cd" onclick="pay()">我要参团</a>
        <?php endif; ?>
        
        <!--<button class="details_bottom_rt auction lf details_cd" onclick="confirm_order()">我要参团</button>-->
    </div>
    <!-- 底部浮动按钮 E -->
</main>

<!-- 分享弹窗 S -->
<div class="share-pop">
    <div class="share-over"></div>
    <div class="share-tip"></div>
    <div class="share-cont">
        <img class="share-tit" src="__STATIC__/image/popularity/share-tit.png" />
        <img class="share-code" src="" />
        <p>长按保存二维码到本地</p>
        <div data-clipboard-text="" class="share-link">直接分享</div>
        <div class="share-link-wx">直接分享</div>
        <input type="hidden" id="challenger_code" value="<?php echo isset($data['challenger_code']) ? $data['challenger_code'] :  ''; ?>" />
        <input type="hidden" id="challenger_url" value="<?php echo isset($data['challenger_url']) ? $data['challenger_url'] :  ''; ?>" />
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
                <span class="all_money"><?php echo isset($data['pg_price']) ? $data['pg_price'] :  '0.00'; ?></span>
                <input type="hidden" id="pm_id" />
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
                <span> ￥ <?php echo $data['m_money']; ?></span>
                <?php if($data['m_money']<$data['pg_price']): ?>
                <p class="lack_msg">余额不足请立即充值</p>
                <?php endif; ?>
            </div>
            <a href="/member/wallet/recharge/r_jump_type/4/r_jump_id/<?php echo $data['pg_id']; ?>"><div class="conf_order_pay rt">充值</div></a>
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
        <img />
        <p></p>
        <div><span class="lf">人气值：<small class="rqz"></small></span><span class="rt">排名：<small class="pm"></small></span></div>
        <small>快去邀请小伙伴为你点赞吧！</small>
        <a onclick="share(2)">邀请好友</a>
    </div>
</div>
<!-- 支付成功弹窗 E -->

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

<!-- 人气王诞生弹窗页面 -->
<div class="popularity_birth">
    <canvas id="canvas" style="background-color:transparent"></canvas>
    <div class="show_box">
        <div class="show_info">
            <p class="p1">恭喜！该商品人气王已诞生</p>
            <div class="person_info">
                <img src="__STATIC__/image/admit/icon_ya1@2x.png" alt="">
                <div class="person_info_right">
                    <p>非常厉害的人...</p>
                    <span>获得了该商品</span>
                </div>
            </div>
            <p class="p2">TA共累计了<i>24.4w</i>人气值</p>
        </div>
        <div class="line_goods_hide">
            <img src="__STATIC__/image/popularitygoods/icon_xx@2x.png" alt="">
        </div>
    </div>
</div>

<!-- 人气值悬浮窗 S -->
<!-- <a href="/popularity/popularitygoods/my_attend"> -->
<!-- <div class="details-rqz"></div> -->
<a href="/popularity/popularitygoods/my_attend/">
    <div class="details-rqz">
            <!-- <img src="__STATIC__/image/pointgoods/btn_daqizhi@2x.png" alt="" > -->
            <canvas id="c" style="width:59px;height:59px;"></canvas>
    </div>
</a>
<input type="text" id="r" value="0">
<!-- </a> -->
<!-- 人气值悬浮窗 E -->

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
<script type="text/javascript" src="__JS__/goodsproduct/swiper.min.js"></script>
<script src="__STATIC__/js/clipboard.min.js"></script>
<script type="text/javascript" src="__JS__/md5.js"></script>
<script type="text/javascript" src="__JS__/order_info/payment.js"></script>
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script type="text/javascript" src="__JS__/back_canvas/mathlib-min.js"></script>
<script type="text/javascript" src="__JS__/back_canvas/k3d-min.js"></script>
<script type="text/javascript" src="__JS__/back_canvas/html5logo.js"></script>
<script type="text/javascript" src="__JS__/liMarquee/jquery.liMarquee.js"></script>
<script type="text/javascript" src="__JS__/core/hydrograph.js"></script>
<script>
    console.log(<?php echo $data['is_enough']; ?>)
    //banner图片报错给默认图
    $('.details_img').on('error',function(){ 
        $(this).attr('src','/static/image/index/pic_home_taplace@2x.png'); 
    });

    //轮播图点击放大
    $(".click_big").click(function(){
        var index = $(this).attr('i');
        $('.big_banner').css('display','block');
        var swiper = new Swiper('.big_swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });

        swiper.slideTo(index)
        $('.details_cancelchan').click(function(){
            $('.big_banner').css('display','none');
        })
    })
     
    //banner对比图片的宽高
    $('.details_img').each(function(){
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

            if (wid > hei) {
                //图片宽度设置为100%
                img.css({"width":pat+"px","height":"auto"});
                
                //居中显示
                hei = hei/(wid/pat);
                var mtp = (img.parent().height()-hei)/2;
                img.css("margin-top",mtp+"px");
            }
        });
    })

     // 初始化
//  var vConsole = new VConsole();
//   console.log('VConsole is cool');

// location.reload(); 

    //进度条显示
    $('.details_num').show();

    //人气王弹窗只显示一次
    if(sessionStorage.getItem('rq') == 2) {
        //$('.popularity_birth').css('display','none');
    }

    sessionStorage.setItem('clears','1');

    //点击popularity_birth 隐藏人气王诞生弹窗
    $('.popularity_birth').on('click',function(){
        $(this).css('display','none');
        sessionStorage.setItem('rq','2')
    })
    $('.line_goods_hide').on('click',function(){
        $('.popularity_birth').css('display','none');
    })

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

    //ios 判断是否是app
    /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
    setupWebViewJavascriptBridge(function(bridge) {
        /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
        bridge.callHandler('isApp',function(str) {
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
        if (r != null) return unescape(r[2]); return null; 
    }

    //url带分享参数返回首页，否则返回上一页
    $('.back-btn').click(function(){        
        if(getQueryString("share") != null) {
            window.location.href = "/popularity/popularitygoods/share_list/";
        }else {
            window.history.back();
        }
    })

    //判断是否登陆 0未登录，1已登录
    var is_login = <?php echo $data['is_login']; ?>;

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

    if($('#challenger_url').val() == '') {
        var link = "<?php echo $data['popularity_url']; ?>";
        var imgs = "<?php echo $data['popularity_code']; ?>";
        $('.share-code').attr('src',"<?php echo $data['popularity_code']; ?>");
        $('.share-link').attr('data-clipboard-text',"<?php echo $data['popularity_url']; ?>");
    }else {
        var link = $('#challenger_url').val();
        var imgs = $('#challenger_code').val();
        $('.share-code').attr('src',$('#challenger_code').val());
        $('.share-link').attr('data-clipboard-text',$('#challenger_url').val());
    }

    function app(id) {
        if($('#challenger_url').val() == '') {
            var link = "<?php echo $data['popularity_url']; ?>";
        }else {
            var link = $('#challenger_url').val();
        }

        var is_share_to_firend_circle = '';
        if(id == 0) {
            is_share_to_firend_circle = false;
        }else {
            is_share_to_firend_circle = true;
        }                
        
        var data = '{"share_title": "'+ title +'","share_content": "'+ desc +'","share_url": "'+ link +'","share_image": "'+ imgUrl +'","is_share_to_firend_circle": '+is_share_to_firend_circle+'}';

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
        if($('#challenger_url').val() == '') {
            var link = "<?php echo $data['popularity_url']; ?>";
        }else {
            var link = $('#challenger_url').val();
        }    

        var data = '{"copy_url": "'+ link +'"}';
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

    //显示分享弹窗参数id：1表示头部分享按钮，2表示底部和支付成功按钮
    function share(id) {
        if($('#challenger_url').val() == '') {
            var link = "<?php echo $data['popularity_url']; ?>";
            var imgs = "<?php echo $data['popularity_code']; ?>";
            $('.share-code').attr('src',"<?php echo $data['popularity_code']; ?>");
            $('.share-link').attr('data-clipboard-text',"<?php echo $data['popularity_url']; ?>");
        }else {
            var link = $('#challenger_url').val();
            var imgs = $('#challenger_code').val();
            $('.share-code').attr('src',$('#challenger_code').val());
            $('.share-link').attr('data-clipboard-text',$('#challenger_url').val());
        }

        $('.details_fenxiang').attr('data',id);        
        var share_qr_image = "https://"+ document.domain +imgs;

        var data = '{"share_title": "'+ title +'","share_content": "'+ desc +'","share_url": "'+ link +'","share_image": "'+ imgUrl +'","is_share_to_firend_circle": "1","share_qr_image": "'+ share_qr_image +'","type": "1"}';        
        if($('#app').val() != '') {
            if($('#app').val() == '1.0') {
                /*与OC交互的所有JS方法都要放在此处注册，才能调用通过JS调用OC或者让OC调用这里的JS*/
                setupWebViewJavascriptBridge(function(bridge) {
                    /*JS给ObjC提供公开的API，ObjC端通过注册，就可以在JS端调用此API时，得到回调。ObjC端可以在处理完成后，反馈给JS，这样写就是在载入页面完成时就先调用*/
                    bridge.callHandler('getShareParams',data);
                })
            }else {
                $('.details_fenxiang').show();
                $(".pay-success").hide();
            }
            
        }else {
            // 非微信浏览器端安卓分享
            if(hideFlag){
                if (typeof(window.android) != "undefined") {
                    if(androidIos() == 'android') {
                        if(getCookie("version") == null) {
                            $('.pay-success').hide();//隐藏弹框
                            $('.details_fenxiang').show();
                        }else {
                            window.android.getShareParams(data);
                        }
                    }
                }else {
                    $('.share-pop').show();
                    $('.share-cont').show();
                    $('.share-tip').hide();
                    if(id == 2) {
                        $('.pay-success').hide();
                    }
                }
            } else{
                $('.share-pop').show();
                $('.share-cont').show();
                $('.share-tip').hide();                
                if(id == 2) {
                    $('.pay-success').hide();
                }
            }
        }
    }

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
    }else{
        $('.share-link').show();
        $('.share-link-wx').hide();
    }

    //微信分享提示
    $('.share-link-wx').click(function(){
        $('.share-cont').hide();
        $('.share-tip').show();

        if($('#challenger_url').val() == '') {
            var link = "<?php echo $data['popularity_url']; ?>";
        }else {
            var link = $('#challenger_url').val();
        }

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

    //关闭支付浮窗
    $(".close").click(function () {
        $(".ftc_wzsf").hide();
        $(".mm_box li").removeClass("mmdd");
        $(".mm_box li").attr("data", "");
        i = 0;
    });

    //点击安全支付
    function pay() {
        if (is_login == 0) {
            login();
        } else {
            $.ajax({
                type: 'post',
                url: '/popularity/popularitygoods/to_be_popmem',
                data: {pg_id:<?php echo $data['pg_id']; ?>},
                success:function(res) {
                    console.log(res);
//                如果有支付密码
                    if(res.status==1){
                        $(".ftc_wzsf").show();
                        $('#pm_id').val(res.data.pm_id);
                    }else if(res.status==2){
                        //如果没有支付密码
                        window.location.href=res.data;
                    }else{
                        // 失败提示
                        layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                            time: 2000
                        });
                    }
                }
            })
        }
    }

        boxInput.init(function () {
            var pawval = boxInput.getBoxInputValue();
            setTimeout(function () {
                md5_pwd = hex_md5(pawval);
                // 支付请求
                var pm_id = $("#pm_id").val();
                $.ajax({
                    url: "/popularity/popularitygoods/pay_popmem",
                    dataType: 'json',
                    type: 'POST',
                    data: { pm_id: pm_id, pwd: md5_pwd },
//                        data: {pwd: md5_pwd },
                    success: function (data) {
                        $(".mm_box li").removeClass("mmdd");
                        $(".mm_box li").attr("data", "");
                        i = 0;
                        if (data.status == 8) {
                            if(data.data.m_avatar == '') {
                                data.data.m_avatar = '/static/image/shop/pic_fans@2x.png';
                            }
                            var rqz = data.data.pm_popularity;
                            if(rqz >= 1000 && rqz <= 9999) {
                                rqz = rqz/1000+'k';
                            }else if(rqz >= 10000) {
                                rqz = rqz/10000+'w';
                            }

                            $('.ftc_wzsf').hide();
                            $('.pay-success').show();
                            $('.share-yq').show();
                            $('.details_cd').hide();
                            $('.pay-success-cont').find('img').attr('src',data.data.m_avatar);
                            $('.pay-success-cont').find('p').text(data.data.m_name);
                            $('.pay-success-cont').find('.rqz').text(data.data.pm_popularity);
                            $('.pay-success-cont').find('.pm').text(data.data.pm_sort);
                            $('#challenger_code').val(data.data.code_img);
                            $('#challenger_url').val(data.data.challenger_url);
                        }else {
                            layer.msg("<span style='color:#fff'>" + data.msg + "</span>", {
                                time: 2000
                            });
                            $(".realInput").val('');
                            boxInput.setValue();
                        }
                    }
                });
            }, 200)
        });

    //当前时间
    // var nowTime = parseInt(new Date().getTime());
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
                    $('.details_data').addClass('detail_back');
                    $('.details_data').find('.details_rt').hide();
                    $('.details_bottom_rt').addClass('details_disabled').attr('disabled','disabled').removeAttr("onclick");
                    $('.details_rq_tit small').hide();
                    $('.details_rt').empty().append('<div class="yjs">已结束</div>').show();
                    $(".enough").hide();
                    $('.details_xw').show().empty().append('<div class="red">本次商品未成团，没有产生人气王！</div>');
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
            var showTime = Math.ceil(intDiff/1000)
            // console.log(showTime) 
            if(sessionStorage.getItem('clears') != 2) {
                if(showTime<=5){
                    getStatus(showTime);
                }
            }  
        }, 1000);
    }
    var end_time = <?php echo $data['end_time']; ?> * 1000 - nowTime;
    timer(end_time, '#first');

    //获取定时状态
    function getStatus(showTime){
        $.ajax({
            type: 'post',
            url: '/popularity/popularitygoods/auto_line_publish',
            dataType:'JSON',
            data: {
                pg_id:"<?php echo $data['pg_id']; ?>",
                periods:"<?php echo $data['pg_periods']; ?>"
            },
            error:function(error){
            //    console.log(error)
            },
            success:function(res) {
                if(res.status==0){
                    clearInterval(timerInterval);
                    
                }else if(res.status==1){

                }else if(res.status==8){
                    sessionStorage.setItem('clears','2');
                    sessionStorage.setItem('rq','1');
                    if(showTime<=0){
                        clearInterval(timerInterval);
                        $('.popularity_birth').css('visibility','visible');
                        $('.p2').find('i').html(res.data.short_pop);
                        if(res.data.m_avatar){
                            $('.person_info').find('img').attr('src',res.data.m_avatar)
                        }
                        $('.person_info').find('.person_info_right').find('p').html(res.data.m_name);
                        // $('.details_xw').find('img').attr('src',res.data.m_avatar);
                        // $('.details_xw').find('span').attr('src',res.data.m_name);
                        $('.details_xw').show().empty().append('<img src="'+ res.data.m_avatar +'" /><p><span>'+ res.data.m_name +'</span>成为人气王成功获得本商品</p>');
                        $('.details_lf').css('display','block');
                        // $('.over_span').css('display','block');
                    }else{
                         var timerout = setTimeout(function(){
                            $('.popularity_birth').css('visibility','visible');
                            // console.log($('.person_info .p2'))
                            $('.p2').find('i').html(res.data.short_pop);
                            if(res.data.m_avatar){
                                $('.person_info').find('img').attr('src',res.data.m_avatar)
                            }                            
                            $('.person_info').find('.person_info_right').find('p').html(res.data.m_name);
                            clearTimeout(timerout);
                            clearInterval(timerInterval);                            
                        },showTime*1000);
                    }
                } else if(res.status==10){
                    // console.log(11);
                    // clearInterval(timerInterval);
                    sessionStorage.setItem('clears','2');
                    $('.popularity_birth').css('display', 'none');
                    //$('.details_xw').show().empty().append('<div class="red">本次商品未成团，没有产生人气王！</div>');
                    // $('.details_lf').css('display','block');
                    // $('.over_span').css('display','block');
                }                
            }
        })
    }

    //现场发布会进行中
    if((<?php echo $data['end_time']; ?> * 1000) < nowTime) {
        if(<?php echo $data['is_enough']; ?> == 1) {
            $('.details_data').addClass('detail_back');
            $('.details_data').find('.details_lf').hide();
            $('.details_data').find('.details_rt').hide();
            // $('.details_data').find('.details_ing').show().text('现场发布会进行中！！！');
            $('.details_bottom_rt').addClass('details_disabled').attr('disabled','disabled').removeAttr("onclick");
            // $('.details_num').hide();
            // $('.details_xw').show().append('<img src="/static/image/popularity/wh.png" /><p>宝贝即将开始参团！</p>');
            $('.details_rq_tit small').hide();
        }else {
            $('.details_xw').show().empty().append('<div class="red">本次商品未成团，没有产生人气王！</div>');
        }        
    }else {        
        $('.details_data').find('.details_lf').show();
        $('.details_data').find('.details_rt').show();
        $('.details_data').find('.details_ing').hide();
        $('.details_num').show();
        $('.details_xw').hide();

        if(<?php echo $data['is_enough']; ?> == 1) {
            $('.details_data').addClass('detail_back');
            $('.details_cd').css({'background':'#ddd','color':'#aaa'}).attr('disabled','disabled');
        }
    }

    //标记和取消标记
    function collection(id,stu) {
        if (is_login == 0) {
            login();
        } else {
            $.post("/popularity/popularitygoods/popularity_collection", {pg_id: id}, function (res) {
                if(res.status== 1){                    
                    if(stu == 2) {
                        $(".details_shoucang img").attr("src","/static/image/popularity/sc1.png");
                        $('.scbj').text('已标记');
                    }else {
                        $('.bj_btn').text('已标记，开团将提醒').addClass('details_disabled');
                    }                    
                }else{                    
                    if(stu == 2) {
                        $(".details_shoucang img").attr("src","/static/image/popularity/sc0.png");
                        $('.scbj').text('标记');
                    }else {                        
                        $('.bj_btn').text('标记商品，开团提醒我').removeClass('details_disabled');
                    }
                }
                layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                    time: 2000
                });
            });
        }
    }

    //关闭支付成功弹窗
    $('.pay-success-over').click(function(){
        $('.pay-success').hide();
    })
    $('.pay-success-cont h3 span').click(function(){
        $('.pay-success').hide();
    })
    
    var state = <?php echo (isset($data['popmem_info']['pm_state']) && ($data['popmem_info']['pm_state'] !== '')?$data['popmem_info']['pm_state']:'0'); ?>;

    //判断显示底部按钮
    if(state >= 2) {
        $('.share-yq').show();
        $('.details_cd').hide();
    }

    //人气王
    var m_name = "<?php echo (isset($data['suc']['m_name']) && ($data['suc']['m_name'] !== '')?$data['suc']['m_name']: ''); ?>";
    var m_avatar = "<?php echo (isset($data['suc']['m_avatar']) && ($data['suc']['m_avatar'] !== '')?$data['suc']['m_avatar']: ''); ?>";
    if(m_name != '') {
        $('.details_xw').show().empty().append('<img src="/static/image/index/pic_home_taplace@2x.png" data-original="'+ m_avatar +'" /><p><span>'+ m_name +'</span>成为人气王成功获得本商品</p>');
        // $('.details_num').hide();
        $('.details_bottom_rt').css("color","rgba(255,255,255,0.5)");
        $('.details_bottom_rt').attr("disabled","disabled")
    }
    //现场发布会结束
    if(<?php echo $data['pg_state']; ?> == 4 || <?php echo $data['pg_state']; ?> == 8) {
        // $('.details_ing').show().text('发布会已结束！！！');
        $('.details_rt').empty().append('<div class="yjs">已结束</div>').show();       
        $(".enough").hide(); 
        $('.details_data').addClass('detail_back');
    }

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
                icon: "/static/image/goods/no-cont.png", //图标,默认null
                tip: "暂无更多列表~", //提示
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
        getListDataFromNet(page.num, page.size, function (curPageData,total_num) {
            //方法二(推荐): 后台接口有返回列表的总数据量 totalSize
            //必传参数(当前页的数据个数, 总数据量)
            mescroll.endBySize(curPageData.length, total_num);

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
            
            if (pd.num == '') {
                pd.num = '0';
            }
            if(pd.pg_img==""){
                pd.pg_img='__STATIC__/image/index/pic_home_taplace@2x.png'
            }
            var str = '<div class="product_list_list lf">';
            str += '<div class="product_list_pic">';
            // str += '<img class="lazy" src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="'+ pd.pg_img +'">';
            str += '<img src="'+ pd.pg_img +'">';
            str += '<div class="product_list_number">'+ pd.num +'人已参与</div>';
            str += '</div>';
            str += '<p class="product_list_tit_p">'+ pd.pg_name +'</p>';
            str += '<p class="product_list_price clear">';
            str += '￥<span class="product_list_red ">'+ pd.pg_price +'</span>';
            str += '</p>';
            str += '<span class="product_list_oldprice">￥'+ pd.pg_market_price +'</span>';
            str += '</div>';

            var liDom = document.createElement("a");
            liDom.setAttribute('href','/popularity/popularitygoods/commodity_info/pg_id/'+pd.pg_id);
            liDom.innerHTML = str;
            listDom.appendChild(liDom);
            $('.product_list_pic img').on('error',function(){ 
                $(this).attr('src','/static/image/index/pic_home_taplace@2x.png'); 
            });
            // $("img.lazy").lazyload({effect: "fadeIn"});
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
                url: '/popularity/popularitygoods/commodity_info/pg_id/<?php echo $data['pg_id']; ?>',
                dataType: 'json',
                success: function (data) {
                    var listData = [];
                    for (var i = 0; i < data.list.length; i++) {
                        listData.push(data.list[i]);
                    }

                    //回调
                    successCallback(listData,data.total_num);
                },
                error: errorCallback
            });
        }, 1000)
    }

    /**
     * 确认订单页
     */
    function confirm_order(){
        var pg_id = "<?php echo $data['pg_id']; ?>";
        $.ajax({
            type: 'post',
            url: '/popularity/popularitygoods/rewrite_url',
            data: {pg_id:pg_id},
            success:function(res) {
                console.log(res);
                // 如果有支付密码
                if(res.status){
                    window.location.href="/popularity/Popularityorder/confirm_order/param/"+res.data;
                }else{
                    // 失败提示
                    layer.msg("<span style='color:#fff'>" + res.msg + "</span>", {
                        time: 2000
                    });
                }
            }
        })
    }

     // 滚动页面
     var flag = true;
    $(window).scroll(function () {
        if (flag) {
            $(".detail_line_view").each(function (i) {
                var ofse = $(this).offset().top;
                // console.log(ofse);
                var scrol = $(window).scrollTop();
                if (scrol > 1) {
                    $(".details_header_top").addClass("details_display");
                    $(".details_tab_list").removeClass("details_display");
                } else {
                    $(".details_header_top").removeClass("details_display");
                    $(".details_tab_list").addClass("details_display");
                }
                // console.log(ofse-scrol);
                if (ofse - scrol < 10 && ofse >= scrol) {
                    $(".details_list_btn").children("span").removeClass("details_list_bottom");
                    $(".details_list_btn").eq(i).children("span").addClass("details_list_bottom");
                }
            })
        }
    })
    //点击导航
    $(".details_list_btn").click(function () {
        var inde = $(this).index();
        flag = false;
        var offs = $(".detail_line_view").eq(inde).offset().top - 46;
        $("body,html").stop(true, true).animate({ scrollTop: offs }, function () {
            flag = true;
        });
        $(".details_list_btn").children("span").removeClass("details_list_bottom");
        $(this).children("span").addClass("details_list_bottom");
    })

    //获取公告内容
    $.ajax({
        type: 'post',
        url: '/index/index/notice',
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

    //获取浮窗人气值
    $.ajax({
        type: 'post',
        url: '/popularity/popularitygoods/get_mypop',
        success:function(res) {
            if(res.status == 1) {
                if(res.data.popularity>100) {
                    res.data.popularity = "100.00";
                }
                $(".details-rqz").css('z-index','100');
                $('#r').val(res.data.popularity);
            }     
        }
    })    
</script>

</html>