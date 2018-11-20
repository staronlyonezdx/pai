<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"D:\project\pai\public/../application/popularity/view/popularitygoods/new_people.html";i:1542352725;s:69:"D:\project\pai\public/../application/popularity/view/common/base.html";i:1542013165;s:71:"D:\project\pai\public/../application/popularity/view/common/header.html";i:1541491295;s:71:"D:\project\pai\public/../application/popularity/view/common/js_sdk.html";i:1541491295;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__CSS__/new_people/new_people.css">
<link rel="stylesheet" type="text/css" href="__CSS__/animate.css">

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
        <header>
<?php if($popgoods_info['pg_type']!=3): ?>
<div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?> >
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
</header>
        
<?php if($popgoods_info['pg_type'] ==3): else: ?>
<main style="background:#fff">
    <?php endif; ?>
    <div class="new_people_top clear">
        <div class="top_left lf">
            <img src="__STATIC__/image/new_people/icon_X@2x1.png" alt="" class="top_close">
            <img src="__STATIC__/image/new_people/icon_yaya@2x.png" alt="" class="yaya_icon">
            <span>下载拍吖吖更有<small>10</small>元红包等着你！</span>
        </div>
        <div class="top_right rt">
            立即下载
        </div>
    </div>
    <div class="new_people">
        <a href="/popularity/popularitygoods/p_rule/">
            <div class="new_people_rule">
                <img src="__STATIC__/image/share_list/icon_guize@2x.png" alt=""/>
            </div>
        </a>
        <div class="new_people_tit">
            <img src="__STATIC__/image/new_people/nav@2x.png" alt=""/>
        </div>
    </div>
    <div class="new_people_main">
        <div class="new_people_con clear">
            <div class="new_people_img lf">
                <?php if($popgoods_info['pg_type']==3): ?>
                <div class="xc-icon"></div>
                <?php endif; ?>
                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                     data-original="__CDN_PATH__<?php echo (isset($popgoods_info['pg_img']) && ($popgoods_info['pg_img'] !== '')?$popgoods_info['pg_img']:'/static/image/index/pic_home_taplace@2x.png'); ?>"
                     class="new_people_hink" alt=""/>
                <div class="new_people_label">
                    <!-- C位活动 -->
                </div>
            </div>
            <div class="new_people_text lf">
                <p><?php echo (isset($popgoods_info['pg_name']) && ($popgoods_info['pg_name'] !== '')?$popgoods_info['pg_name']:''); ?></p>
                <div class="new_people_price">
                    <span>￥<a><?php echo (isset($popgoods_info['pg_price']) && ($popgoods_info['pg_price'] !== '')?$popgoods_info['pg_price']:'0.00'); ?></a></span>
                    <small>原价￥<?php echo (isset($popgoods_info['pg_market_price']) && ($popgoods_info['pg_market_price'] !== '')?$popgoods_info['pg_market_price']:'0.00'); ?></small>
                </div>
                <div class="new_people_num clear">
                    <span><?php echo (isset($total_pm_num) && ($total_pm_num !== '')?$total_pm_num:0); ?>人已参与</span>
                    <?php if($popgoods_info['pg_type']!=3): ?>
                    <a href="/popularity/popularitygoods/commodity_info/pg_id/<?php echo (isset($popgoods_info['pg_id']) && ($popgoods_info['pg_id'] !== '')?$popgoods_info['pg_id']:0); ?>">
                        <div class="new_people_btn rt">查看商品</div>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <div class="new_people_list clear">
            <div class="new_people_header lf">
                <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                     data-original="__CDN_PATH__<?php echo (isset($popgoods_info['m_avatar']) && ($popgoods_info['m_avatar'] !== '')?$popgoods_info['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>"
                     alt=""/>
            </div>
            <div class="new_people_list_view lf">
                <div class="new_people_rt clear">
                    <p class="lf"><?php echo $popgoods_info['m_name']; ?></p>
                    <span>邀你点赞</span>
                    <a class="rt"><?php echo (isset($popgoods_info['pm_popularity']) && ($popgoods_info['pm_popularity'] !== '')?$popgoods_info['pm_popularity']:0); ?></a>
                </div>
                <div class="new_people_val clear">
                    <span>No.<?php echo (isset($pm_sort) && ($pm_sort !== '')?$pm_sort:0); ?></span>
                    <small class="rt">当前人气值</small>
                </div>
            </div>
        </div>
        <div class="new_people_call">
            <div class="clear">
                <div class="new_people_call_img lf">
                    <img src="__STATIC__/image/new_people/Call@2x.png" alt=""/>
                </div>
                <a href="/popularity/popularityorder/pop_rank/pm_id/<?php echo $popgoods_info['pm_id']; ?>">
                    <div class="new_people_more_view rt clear">
                        <p class="lf">查看全部</p>
                        <div class="new_people_more lf">
                            <img src="__STATIC__/image/new_people/icon_jump@2x.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <?php if(empty($joinner_list) || (($joinner_list instanceof \think\Collection || $joinner_list instanceof \think\Paginator ) && $joinner_list->isEmpty())): ?>
            <p class="lf" style="color:#FFB437;">还没有人点赞呢，快来成为第一个吧~</p>
            <?php else: if(is_array($joinner_list) || $joinner_list instanceof \think\Collection || $joinner_list instanceof \think\Paginator): $i = 0; $__LIST__ = $joinner_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="new_people_call_list clear">
                <div class="new_call_header lf">
                    <img src="__STATIC__/image/index/pic_home_taplace@2x.png"
                         data-original="__CDN_PATH__<?php echo (isset($vo['m_avatar']) && ($vo['m_avatar'] !== '')?$vo['m_avatar']:'/static/image/index/pic_home_taplace@2x.png'); ?>"
                         alt=""/>
                </div>
                <p class="lf"><?php echo $vo['m_name']; ?></p>
                <span class="rt">
                        +<?php echo (isset($vo['pj_num']) && ($vo['pj_num'] !== '')?$vo['pj_num']:0); ?>人气值
                    </span>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
        <div class="new_people_bottom">
            <img src="__STATIC__/image/new_people/huodongliucheng@2x.png" alt="">
            <!--<div class="new_people_bottom_text">-->
            <!--<p>2018年10月1日 24时23分22秒 “最强人气王”</p>-->
            <!--<p>活动结束后，拍吖吖将在线下举办“最强人气王”发布会。</p>-->
            <!--<p>届时将邀请前十位人气值最高的“人气王”出席活动，抽取</p>-->
            <!--<p>现场“人气王冠冕”！住宿及往返机票全免！</p>-->
            <!--</div>-->
            <!--<div class="new_people_site">-->
            <!--发布会地址：杭州市滨江区银泰国际1600-->
            <!--</div>-->
        </div>
        <div class="new_people_bottom_btn clear">
            <?php if($popgoods_info['pg_type']==3): ?>
            <div class="new_people_call_btn lf" style="width:100%">为好友点赞</div>
            <?php else: ?>
            <div class="new_people_call_btn lf">为好友点赞</div>
            <a href="/popularity/popularitygoods/commodity_info/pg_id/<?php echo (isset($popgoods_info['pg_id']) && ($popgoods_info['pg_id'] !== '')?$popgoods_info['pg_id']:0); ?>">
                <div class="new_people_debut_btn lf">我也要参加</div>
            </a>
            <?php endif; ?>
        </div>
    </div>
    <!--弹框-->

    <div class="new_people_pop">
        <div class="new_people_register">

            <!--未登录或者未注册-->
            <div class="new_people_line login-no">
                <div class="new_people_tab clear">
                    <div class="new_people_tab_text clear lf">
                        <div class="new_people_border new_people_pitch lf">
                            <span>验证码登录</span>
                            <div></div>
                        </div>
                        <!-- <div class="new_people_border lf">
                            <span>注册</span>
                            <div></div>
                        </div> -->
                    </div>
                    <div class="new_people_cancel rt">
                        <img src="__STATIC__/image/new_people/icon_X1@2x.png" alt=""/>
                    </div>
                </div>
                <div>
                    <!--<div class="new_people_pop_main">-->
                    <!--<div class="new_people_pop_list clear">-->
                    <!--<img src="__STATIC__/image/new_people/icon_shouji@2x.png" alt="" class="lf" />-->
                    <!--<input type="number" class="lf"  name="phone" placeholder="请输入手机号" oninput="if(value.length>11)value=value.slice(0,11)"/>-->
                    <!--</div>-->
                    <!--<div class="new_people_pop_list clear">-->
                    <!--<img src="__STATIC__/image/new_people/icon_mima@2x.png" alt="" class="lf"/>-->
                    <!--<input type="password" class="lf" name="pwd" placeholder="请输入密码" maxlength="16" oninput="if(value.length>16)value=value.slice(0,16)"/>-->
                    <!--</div>-->
                    <!--<div class="new_people_register_btn" id="login_btn">-->
                    <!--登录并为好友点赞-->
                    <!--</div>-->
                    <!--</div>-->

                    <div class="new_people_pop_main new_people_pop_main_dis">
                        <div class="new_people_pop_list clear">
                            <img src="__STATIC__/image/new_people/icon_shouji@2x.png" alt="" class="lf"/>
                            <input type="number" name="m_mobile" class="lf" placeholder="请输入手机号"
                                   oninput="if(value.length>11)value=value.slice(0,11)"/>
                        </div>
                        <div class="new_people_pop_list  clear">
                            <img src="__STATIC__/image/new_people/icon_yanzengma@2x.png" alt="" class="lf"/>
                            <input type="text" name="code" class="new_people_code lf" placeholder="请输入验证码"/>
                            <span class="new_people_code_test rt">获取验证码</span>
                        </div>
                        <!-- <div class="new_people_pop_list clear">
                            <img src="__STATIC__/image/new_people/icon_mima@2x.png" alt="" class="lf"/>
                            <input type="password" name="pwd" class="lf" placeholder="请设置密码"  maxlength="16" oninput="if(value.length>16)value=value.slice(0,16)"/>
                        </div> -->
                        <div class="new_people_register_btn" id="regist_btn">
                            登录并为好友点赞
                        </div>
                    </div>
                </div>
            </div>

            <!--已登陆-->
            <div class="new_people_line login-yes">
                <div class="zan_success">
                    <!--人气值满100点，可以为朋友打气，并且打气成功之后显示-->
                    <!--<div class="call_yes">-->
                    <!--<div class="call_bg">-->
                        <!--&lt;!&ndash;<img src="__STATIC__/image/new_people/pic_dianzan@2x.png" alt="" class="bg"/>&ndash;&gt;-->
                        <!--<div class="bg_top">-->
                            <!--<span class="zan_yes">已成功帮好友点赞！</span>-->
                            <!--<img src="__STATIC__/image/new_people/icon_X@2x.png" alt="" class="click_cancle"/>-->
                        <!--</div>-->
                        <!--<div class="bg_middle">-->
                            <!--<img src="__STATIC__/image/new_people/btn_zhengduo@2x.png" alt="" class="img_icon">-->
                            <!--<div class="pers">-->
                                <!--<div class="bg_top">-->
                                    <!--<span class="new_name"></span>-->
                                    <!--<span class="call_num"></span>-->
                                <!--</div>-->
                                <!--<div class="bg_bottom">-->
                                    <!--<span class="call_order"></span>-->
                                    <!--<span class="new_t">已经为TA增长</span>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="bg_bottom">-->
                            <!--<img src="__STATIC__/image/new_people/btn_zhengduo@2x.png" alt=""/>-->
                            <!--<a class="fight" href="/popularity/popularitygoods/share_list/">争夺人气王</a>-->

                        <!--</div>-->

                    <!--</div>-->
                    <!--<div class="my_call_yes">-->
                        <!--<div class="red_packet">-->
                            <!--<span>下载APP更有10元红包等着你！</span>-->
                        <!--</div>-->

                        <!--<div class="download">-->
                            <!--<span class="andro">Android下载</span>-->
                            <!--<span class="ios">IOS下载</span>-->
                        <!--</div>-->
                        <!--<div class="imgs">-->
                            <!--<img src="__STATIC__/image/new_people/qrcode_for_gh_8284d74f422f_258.jpg" alt="">-->
                            <!--<img src="__STATIC__/image/new_people/gunzhu.png" alt="">-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->

                    <div class="call_yes">
                        <img src="__STATIC__/image/new_people/icon_X@2x (1).png" alt="" class="click_cancle close">
                        <div class="call_info">
                            <img src="" alt="" class="img_icon call_info_img lf">
                            <div class="pers lf">
                                <div class="bg_top clear">
                                    <span class="new_name"></span>
                                    <span class="call_num rt"></span>
                                </div>
                                <div class="bg_bottom clear">
                                    <span class="call_order"></span>
                                    <span class="new_t rt" style="margin-left: 1.5rem">已经为TA增长</span>
                                </div>
                            </div>
                        </div>
                        <a href="/popularity/popularitygoods/share_list/">
                            <div class="call_yes_zhengduo">
                                <img src="__STATIC__/image/new_people/btn_zhengduo@2x (1).png" alt="" >
                            </div>
                        </a>
                        <p class="call_yes_tip ">下载APP更有<small>10元</small>红包等着你！</p>
                        <div style="position: absolute;top:5.8rem">
                            <div class="call_yes_btns clear">
                                <a href="/member/register/ios_guide" class="lf">
                                    <img src="__STATIC__/image/new_people/btn_ios@2x.png" alt="">

                                </a>
                                <a href="/member/register/az_guide" class="lf">
                                    <img src="__STATIC__/image/new_people/btn_android@2x.png" alt="">
                                </a>
                            </div>
                            <div class="imgs">
                                <img src="__STATIC__/image/new_people/qrcode_wechat@2x.png" alt="">
                                <img src="__STATIC__/image/new_people/aa@2x.png" alt="">
                            </div>
                        </div>

                    </div>

                    <!--人气在20-100之间，显示-->
                    <div class="call_queren">
                        <img src="__STATIC__/image/new_people/icon_Xs@2x.png" alt="" class="click_cancle"
                             style="width:0.56rem;height:0.56rem;position: absolute;top:1.13rem;right:0.13rem;"/>
                        <p class="call_queren_title">充值赠送打气值</p>
                        <p class="call_queren_num"> 当前打气值：<span class="call_num_new"></span></p>
                        <p class="call_queren_tip">充值可以快速恢复打气值最高到<span style="color: #FF6753">100</span><span
                                style="color: #FFAE00">(充值1元赠送1点)</span>，好友也将获得更高人气值哦</p>
                        <div class="call_queren_btns">
                            <a href="javascript:;" class="call_queren_chong">前去充值</a>
                            <a href="javascript:;" class="call_queren_zan">直接点赞</a>
                        </div>
                    </div>

                    <!--当人气在20-100里面的时候，点击确认点赞显示-->
                    <div class="queren_call">
                        <div class="call_bg">
                            <!--<img src="__STATIC__/image/new_people/pic_dianzan@2x.png" alt="" class="bg"/>-->
                            <div class="bg_top">
                                <span class="zan_yes">已成功帮好友点赞！</span>
                                <img src="__STATIC__/image/new_people/icon_X@2x.png" alt="" class="click_cancle"/>
                            </div>
                            <div class="bg_middle">
                                <img src="__STATIC__/image/new_people/btn_zhengduo@2x.png" alt="" class="img_icon">
                                <div class="pers">
                                    <div class="bg_top clear">
                                        <span class="new_name">11</span>
                                        <span class="call_num">22</span>
                                    </div>
                                    <div class="bg_bottom clear">
                                        <span class="call_order">33</span>
                                        <span class="new_t">已经为TA增长</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg_bottom">
                                <img src="__STATIC__/image/new_people/btn_zhengduo@2x.png" alt=""/>
                                <a class="fight" href="/popularity/popularitygoods/share_list/">争夺人气王</a>

                            </div>

                        </div>
                        <div class="my_call_no">
                            <p class="my_call"></p>
                            <div class="tips">
                                <img src="__STATIC__/image/new_people/icon_xiaotieshi@2x.png" alt=""
                                     style="margin-top: 0"/>
                                <p class="call_queren_num" style="font-size: 0.22rem;color:#000000"> 当前打气值：<span
                                        class="call_num_new" style="color:#FFA377;font-size: 0.28rem"></span></p>
                                <div class="tips_spans">
                                    <span>1、主动恢复（上限为100点，2者满足其一即可）：<br>
                                        ①在拍吖吖<span style="color: #FFA377">普通商场</span>每参拍1元，人气值增加1点 <br>
                                        ②每充值1元，人气值增加1点。
                                    </span><br>
                                    <span>2、自动恢复：若打气值不足50点，则会慢慢恢复，每2小时恢复5点，上限50点。</span>
                                </div>
                            </div>
                            <div class="buttons">
                                <a href="/member/wallet/recharge/">去充值</a>
                                <a href="/popularity/popularitygoods/share_list/">去参团</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!--人气值不足20显示显示弹框-->
                <div class="call_no">
                    <div class="value_under">
                        <div class="value_under_top">
                            <span>点赞失败！您的打气值过低！</span>
                            <!--<span>您的人气值存量已不足</span>-->
                            <img src="__STATIC__/image/new_people/icon_X@2x.png" alt="" class="click_cancle"/>
                        </div>
                        <div class="value_under_bottom">
                            <p>当前人气值：<span class="call_num_new">36.24</span></p>
                            <span class="date_info"></span>
                            <span class="date_call_full"></span>
                        </div>
                    </div>
                    <div class="tips">
                        <img src="__STATIC__/image/new_people/icon_xiaotieshi@2x.png" alt=""/>
                        <div class="tips_spans">
                                <span>1、主动恢复（上限为100点）：<br>
                                        ①在拍吖吖<span style="color: #FFA377">普通商场</span>每参拍1元，人气值增加1点 <br>
                                        ②每充值1元，人气值增加1点。
                                    </span><br>
                            <span>2、自动恢复（上限为50点）：
                                若打气值不足50点，则会慢慢恢复，每2小时恢复5点。</span>
                        </div>
                    </div>
                    <div class="buttons">
                        <a href="/member/wallet/recharge/">去充值</a>
                        <a href="/popularity/popularitygoods/share_list/">去参团</a>
                    </div>
                    <div class="line"></div>
                    <div class="contend">
                        <span>帮助太累？自己开个团</span><br>
                        <a href="/popularity/popularitygoods/share_list/" style="line-height: 0.48rem">争夺人气王</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <input type="hidden" name="pm_id" value="<?php echo (isset($pm_id) && ($pm_id !== '')?$pm_id:0); ?>"/>
    <div class="guide">
        <img src="__STATIC__/image/new_people/t1.png" class="t1"/>
        <img src="__STATIC__/image/new_people/t2.png" class="t2"/>
        <img src="__STATIC__/image/new_people/t3.png" class="t3"/>
    </div>


    <!-- 人气值悬浮窗 S -->
    <!-- <a href="/popularity/popularitygoods/my_attend/"><div class="details-rqz"></div></a> -->
    <!-- 人气值悬浮窗 E -->
    <!-- 人气值悬浮窗 S -->

    <!-- 人气值悬浮窗 E -->
</main>
<a href="/popularity/popularitygoods/my_attend/">
    <div class="details-rqz">
        <!-- <img src="__STATIC__/image/pointgoods/btn_daqizhi@2x.png" alt="" > -->
        <canvas id="c" style="width:59px;height:59px;"></canvas>
</div>
</a>
<input type="text" id="r" value="0">
<input type="hidden" value="<?php echo (isset($m_id) && ($m_id !== '')?$m_id:0); ?>" id="my_id">
<input type="hidden" value="<?php echo (isset($popgoods_info['m_id']) && ($popgoods_info['m_id'] !== '')?$popgoods_info['m_id']:0); ?>" id="other_id">
<input type="hidden" value="" id="times">
<input type="hidden" value="" id="tops">

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
<script type="text/javascript" src="__JS__/core/hydrograph.js"></script>
<script src="__STATIC__/js/new_people/new_people.js"></script>
<script>

    //引导提示(未注册且第一次进入的用户显示)
    var m_id = "<?php echo isset($m_id) ? $m_id :  ''; ?>";
    var gl = sessionStorage.getItem('gl');
    if (m_id == 0) {
        if (gl == null) {
            $('.guide').show();
            sessionStorage.setItem('gl', '1');
        }
    }
    //点击android下载，判断手机是否为android，如果不是弹框
    // console.log($('.download  span.andro'));
    $('.download  span.andro').click(function () {
        var u = navigator.userAgent;
        if (u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) {
            //安卓手机
            window.location.href = "/member/register/az_guide"
        } else if (u.indexOf('iPhone') > -1) {
            //苹果手机
            //如果是苹果手机，则显示弹框
            // window.location.href = "/member/register/ios_guide"
            layer.confirm('您的手机为IOS系统，点击IOS下载', {
                title: false, /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['知道了'], //按钮
                // btn1:function()
            })
        }
    })
    //点击ios下载，判断手机是否为ios，如果不是弹框
    $('.download  span.ios').click(function () {

        var u = navigator.userAgent;
        if (u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) {
            //安卓手机
            layer.confirm('您的手机为Android系统，点击Android下载', {
                title: false, /*标题*/
                closeBtn: 0,
                btnAlign: 'c',
                btn: ['知道了'], //按钮
            })
            $(".layui-layer-btn .layui-layer-btn0").css({borderRight: 0});
        } else if (u.indexOf('iPhone') > -1) {
            //苹果手机
            window.location.href = "/member/register/ios_guide"
        }
    })


        // 点击关闭头部提示
        $('.top_close').click(function(){
            $('.new_people_top').hide()
        })
       //点击立即下载
    $('.new_people_top .top_right').click(function(){
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
    })
</script>

</html>