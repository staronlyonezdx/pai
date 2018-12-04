<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\project\pai\public/../application/member/view/goods/index.html";i:1541491283;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1543280491;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1542767234;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
        
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/layui/css/layui.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goods/upload.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goods/mobiscroll.2.13.2.css">
<link rel="stylesheet" type="text/css" href="__CSS__/goods/publish.css">
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link rel="stylesheet" type="text/css" href="__CSS__/pop/common.css">
<style>
    .view{
        padding-bottom: 0.2rem;
        overflow: hidden;
    }
    #upload{
        display: block;
        width:1.58rem;
        height:1.58rem;
        text-align: center;
        border-radius: 5px;
        background: #f2f2f2;
        margin-left: 0.2rem;
        float: left;
    }
    #upload img{
        width:100%;
        height:100%;
        display: block;
        margin: 0 auto;
    }
    #choose{
        display: none;
    }
    .img-list{
        /*float: left;*/
    }
    .img-list li{
        position: relative;
        width:1.58rem;
        height:1.58rem;
        background: #eee no-repeat center;
        background-size: cover;
        border-radius: 5px;
        margin-left: 0.2rem;
        margin-bottom: 0.2rem;
        float: left;

    }
    .img-list li img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit:cover;
    }
    .pub_cross{
        width:0.34rem;
        height:0.34rem;
        position: absolute;
        top:0;
        right:0;
        z-index: 2;
        background: url("/static/icon/publish/icon_deom_del.png") no-repeat;
        background-size: 100%;
    }
    .pub_cross img{
        width:100%;
        height:100%;
        display: block;
    }
    .goods_cancel_img{
        width:0.56rem;
        height:0.56rem;
        position:absolute;
        top:0.56rem;
        left:0.3rem;
        display: none;
        z-index: 103;
    }
    .goods_cancel_img img{
        width:100%;
        height:100%;
    }
    .goods_cancel_img_block{
        display: block;
    }

    .big_img {
    position: fixed;
    z-index: -1;
    opacity: 0;
    background: rgba(0, 0, 0, 1);
    width: 100%;
    height: 100%;
    top: 0;
    left: 0
}

.big_img .swiper-container2 {
    position: relative;
    width: 100%;
    height: 100%
}

.big_img .swiper-container2 .swiper-wrapper {
    width: 100%;
    height: 100%
}

.big_img .swiper-slide {
    width: 100%;
    height: 100%;
    display: table
}

.big_img .swiper-slide .cell {
    width: 100%;
    height: 100%;
    display: table-cell;
    vertical-align: middle;
    text-align: center
}

.big_img .swiper-slide img {
    max-width: 90%;
    max-height: 80%;
    margin: 0 auto
}

.big_img .swiper-pagination2 {
    position: absolute;
    top: .2rem;
    text-align: center;
    width: 100%
}

.big_img .swiper-pagination2 span {
    margin: 0 .05rem
}
</style>

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
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" onClick="javascript:history.go(-1);">
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div>
</header>
        <header></header>
        
<main>
    <div class="content">
        <div class="pub_list">
            <input type="text" name="g_name"  value='<?php echo isset($info['g_name']) ? $info['g_name'] :  ""; ?>' placeholder="请输入商品标题" maxlength="30" oninput="if(value.length>30)value=value.slice(0,30)">
            <div class="reedit_clear">
                <img src="__STATIC__/image/login/icon_login_clean@2x.png">
            </div>
        </div>
    </div>
    <!--  <div class="content">
         <div class="pub_list">
             <input type=" text" name="g_name"  placeholder="请输入商品标题">
         </div>
     </div> -->
    <div class="content">
        <div class="pub_list">
            <input type="text" name="g_secondname" value="<?php echo isset($info['g_secondname']) ? $info['g_secondname'] :  ''; ?>"  placeholder="请输入商品的二级标题吧（选填）" maxlength="30" oninput="if(value.length>30)value=value.slice(0,30)">
            <div class="reedit_clear">
                <img src="__STATIC__/image/login/icon_login_clean@2x.png">
            </div>
        </div>
    </div>
    <!--<textarea name="" id="" cols="30" rows="10" height="10"></textarea>-->
    <!-- <div class="content">
        <div class="pub_list">
            <input type=" text" name="g_secondname" placeholder="请输入商品的二级标题吧（选填）">
        </div>
    </div> -->
    <div class="content ">
        <div class="pub_list index_textarea">
            <!--<input type="text" name="g_description" class='desc' placeholder="请描述一下商品的细节吧~">-->
            <textarea type="text" name="g_description" class='desc' placeholder="请描述一下商品的细节吧~"><?php echo htmlspecialchars_decode((isset($info['g_description']) && ($info['g_description'] !== '')?$info['g_description']:'')); ?></textarea>
        </div>
        <div class="view">
            <div class="goods_view_position">
                <ul class="img-list" >
                    <?php if(!(empty($info['img']) || (($info['img'] instanceof \think\Collection || $info['img'] instanceof \think\Paginator ) && $info['img']->isEmpty()))): if(is_array($info['img']) || $info['img'] instanceof \think\Collection || $info['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="img<?php echo $vo['gi_id']; ?>" >
                        <div class="pub_cross" onclick="imgs(<?php echo $vo['gi_id']; ?>,<?php echo $info['g_id']; ?>)"></div>
                        <img class="imgs" src="__STATIC__/image/index/pic_home_taplace@2x.png" data-original="__CDN_PATH__<?php echo $vo['gi_name']; ?>">
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>                    
                </ul>
                <input type="file" id="choose" accept="image/*" multiple>
                <a id="upload">
                    <img src="__STATIC__/icon/publish/icon_+@2x.png" alt=""/>
                </a>
            </div>
            <div class="goods_cancel_img">
                <img src="__STATIC__/image/goods/icon_X@2x.png" alt=""/>
            </div>
        </div>
    </div>
    <!-- <form enctype="multipart/form-data"> -->

    <!-- </form> -->
    <div class="content">
        <div class="pub_list pub_site">
            <div  class="pub_icons">
                <img src="__STATIC__/icon/publish/icon_nav_dingwei@2x.png">
            </div>
            <input type="text" name="" id="demo1" readonly="true" placeholder="选取地址" class="pub_dz" value="<?php echo isset($info['address']) ? $info['address'] :  ''; ?>">
            <input id="value1" type="hidden" name="pid" value="<?php echo isset($info['pid']) ? $info['pid'] :  ''; ?>"/>
            <div class="pub_select">
                <img src="__STATIC__/icon/publish/icon_nav_jump@2x.png" >
            </div>
        </div>
    </div>
    <div class="content" id="classify">
        <div class="pub_list pub_site">
            <p class="pub_tit">商品分类</p>
            <input type="text" name="classify" id="" readonly="true"  value='<?php echo isset($info['gc_name']) ? $info['gc_name'] :  ""; ?>' placeholder="请选择商品分类" class="pub_ify application_class">
            <input type="hidden" name="store_categoryid" value="<?php echo isset($info['store_categoryid']) ? $info['store_categoryid'] :  ''; ?>">
            <!--<input type="text" name="" readonly="true" placeholder="请选择商品分类" class="pub_ify">-->
            <!-- <div style="text-align: right;margin-right:50px;">
                <select name="category" id="gc_id">
                    <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['gc_id']; ?>"><?php echo $vo['gc_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div> -->
            <div class="pub_select">
                <img src="__STATIC__/icon/publish/icon_nav_jump@2x.png" >
            </div>
        </div>
    </div>
    <!--   <div class="content">
          <div class="pub_list pub_site">
              <p class="pub_tit">商品类型</p>
              <input type="text" name="" readonly="true" placeholder="请选择商品分类" class="pub_ify">
              <div style="text-align: right;margin-right:50px;">
                  <select name="spec" id="gs_id">
                      <?php if(is_array($spec) || $spec instanceof \think\Collection || $spec instanceof \think\Paginator): $i = 0; $__LIST__ = $spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                      <option value="<?php echo $vo['gs_id']; ?>"><?php echo $vo['gs_name']; ?></option>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
              </div>
              <div class="pub_select">
                  <img src="__STATIC__/icon/publish/icon_nav_jump@2x.png" >
              </div>
          </div>
      </div> -->

    <div class="content">
        <div class="pub_list pub_site">
            <p class="pub_tit"> 结算价</p>
            <input type="number" name="gp_settlement_price" value='<?php echo isset($info['gp_settlement_price']) ? $info['gp_settlement_price'] :  ""; ?>' placeholder="请输入与平台的最终结算价" class="pub_ify" size="10" oninput="if(value.length>10)value=value.slice(0,10)">
        </div>
    </div>
    <!--<div class="content ">-->
        <!--<div class="pub_list pub_site pub_price">-->
            <!--<p class="pub_tit">销售价</p>-->
            <!--&lt;!&ndash;<span>￥</span>&ndash;&gt;-->
            <!--<input type="text" name="gp_market_price" placeholder="￥0.00" class="pub_ify gp_market_price">-->
        <!--</div>-->
    <!--</div>-->

    <!-- <div class="content">
        <div class="pub_list pub_site">
            <p class="pub_tit">参与人数</p>
            <input type="text" name="g_peoplenumber"  placeholder="设置参与商品人数" class="pub_ify">
        </div>
    </div> -->
    <div class="content ">
        <div class="pub_list pub_site pub_price">
            <p class="pub_tit">市场价</p>
            <!-- <span>￥</span> -->
            <input type="number" name="gp_market_price" placeholder="￥0.00" value='<?php echo isset($info['gp_market_price']) ? $info['gp_market_price'] :  ""; ?>' class="pub_ify gp_market_price" size="10" oninput="if(value.length>10)value=value.slice(0,10)">
        </div>
    </div>
    <div class="content_number">
        <?php if(empty($info['dt_record']) || (($info['dt_record'] instanceof \think\Collection || $info['dt_record'] instanceof \think\Paginator ) && $info['dt_record']->isEmpty())): ?>
            <div class="content_number_list">
                <input type="checkbox" checked name="nod" />
                <img src="__STATIC__/image/goods/icon_10@2x.png"  class="gdt_img1">
                <span class="content_price_view gdr_price1">￥<small></small></span>
                <span>参与人次
              <span class="content_number_view gdr_membernum1"><input type="number" g_id="" /></span>
            </span>
            </div>
            <div class="content_number_list">
                <input type="checkbox" checked name="nod" />
                <img src="__STATIC__/image/goods/icon_30@2x.png"  class="gdt_img2">
                <span class="content_price_view gdr_price2">￥<small></small></span>
                <span >参与人次
              <span class="content_number_view gdr_membernum2"><input type="number" g_id="" /></span>
            </span>
            </div>
            <div class="content_number_list">
                <input type="checkbox" checked name="nod" />
                <img src="__STATIC__/image/goods/icon_50@2x.png" class="gdt_img3">
                <span class="content_price_view gdr_price3">￥<small></small></span>
                <span>参与人次
              <span class="content_number_view gdr_membernum3"><input type="number" g_id="" /></span>
            </span>
            </div>
        <?php else: if(is_array($info['dt_record']) || $info['dt_record'] instanceof \think\Collection || $info['dt_record'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['dt_record'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="content_number_list">
                <input type="checkbox" <?php if($vo['is_check'] == 1): ?> checked <?php endif; ?> name="nod" value="<?php echo isset($vo['gdt_id']) ? $vo['gdt_id'] :  ''; ?>" />
                <img src="__CDN_PATH__<?php echo isset($vo['gdt_img']) ? $vo['gdt_img'] :  ''; ?>"  class="gdt_img<?php echo $key+1; ?>">
                <span class="content_price_view gdr_price<?php echo $key+1; ?>">￥<small><?php echo isset($vo['gdr_price']) ? $vo['gdr_price'] :  ''; ?></small></span>
                <span>参与人次
                  <span class="content_number_view gdr_membernum<?php echo $key+1; ?>"><input type="number" value="<?php echo isset($vo['gdr_membernum']) ? $vo['gdr_membernum'] :  ''; ?>" g_id="<?php echo isset($info['g_id']) ? $info['g_id'] :  ''; ?>" /></span>
                </span>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
    <div class="content pub_margin">
        <div class="pub_list pub_site pub_data">
            <p class="pub_tit">开始时间</p>
            <div class="settings" style="display:none;">
                <select name="demo" id="demo2">
                    <option value="date">日期</option>
                </select>
            </div>
            <input name="g_starttime" id="tests1" value="<?php if(!(empty($info['g_starttime']) || (($info['g_starttime'] instanceof \think\Collection || $info['g_starttime'] instanceof \think\Paginator ) && $info['g_starttime']->isEmpty()))): ?><?php echo date('Y-m-d H:i',$info['g_starttime']); endif; ?>" class="demo-test-date demo-test-datetime demo-test-time demo-test-credit" />
            <!--<input name="test" id="test1" class="demo-test-date demo-test-datetime demo-test-time demo-test-credit" />-->
            <!-- <input id="value2" type="hidden" name="g_endtime"/> -->
            <div class="pub_select">
                <img src="__STATIC__/icon/publish/icon_nav_jump@2x.png" >
            </div>
        </div>
    </div>

    <div class="content">
        <div class="pub_list pub_site pub_data">
            <p class="pub_tit">截止时间</p>
            <div class="settings" style="display:none;">
                <select name="demo" id="demo">
                    <option value="date">日期</option>
                </select>
            </div>
            <input name="g_endtime" id="tests" value="<?php if(!(empty($info['g_endtime']) || (($info['g_endtime'] instanceof \think\Collection || $info['g_endtime'] instanceof \think\Paginator ) && $info['g_endtime']->isEmpty()))): ?><?php echo date('Y-m-d H:i',$info['g_endtime']); endif; ?>" class="demo-test-date demo-test-datetime demo-test-time demo-test-credit" />
            <!--<input name="test" id="test" class="demo-test-date demo-test-datetime demo-test-time demo-test-credit" />-->
            <!-- <input id="value2" type="hidden" name="g_endtime"/> -->
            <div class="pub_select">
                <img src="__STATIC__/icon/publish/icon_nav_jump@2x.png" >
            </div>
        </div>
    </div>
    <div class="content">
        <div class="pub_list pub_site">
            <p class="pub_tit">商品库存</p>
            <input type="number" name="gp_stock" placeholder="至少1件" value='<?php echo isset($info['gp_stock']) ? $info['gp_stock'] :  ""; ?>' class="pub_dz pub_ify" size="10" oninput="if(value.length>10)value=value.slice(0,10)">
            <div class="pub_explain">
                <img src="__STATIC__/icon/publish/shuoming 拷贝@2x.png">
            </div>

        </div>
    </div>

    <!--判断商家类型-->
    <div class="content pub_margin <?php if($store_type==1): ?> content_distribution<?php endif; ?>">
        <div class="pub_list pub_site">
            <p class="pub_tit">配送方式</p>
            <?php if($store_type==1): ?>
            <input type="text"  name="g_express_way" readonly="readonly" onfocus="this.blur()" placeholder="请选择配送方式" value='<?php echo isset($info['g_express_way']) ? $info['g_express_way'] :  ""; ?>' class="pub_ify">
            <div class="pub_select">
                <img src="__STATIC__/icon/publish/icon_nav_jump@2x.png" >
            </div>
            <?php else: ?>
            <input type="text"  name="g_express_way" readonly="readonly" onfocus="this.blur()" placeholder="请选择配送方式" value='普通商品ww' class="pub_ify">
            <?php endif; ?>
        </div>
    </div>

    <div class="content <?php if($store_type==1): ?> delivery_content<?php endif; ?>">
        <div class="pub_list pub_site pub_price">
            <p class="pub_tit">快递费</p>
            <!-- <span>￥</span> -->
            <input type="number" name="g_express" placeholder="0" class="pub_ify" size="10" oninput="if(value.length>10)value=value.slice(0,10)">
        </div>
    </div>

    <input type="hidden" id='g_state' value="<?php echo isset($info['g_state']) ? $info['g_state'] :  ''; ?>">
    <input type="hidden" name="" id="hidden_val" value="<?php echo isset($info['g_id']) ? $info['g_id'] :  ''; ?>">
    <div class="content pub_agree_view ">
        <div class="pub_list pub_agree_input clear pub_site">
            <img src="__STATIC__/icon/publish/icon_weixuanze@2x.png" class="pub_icon" data="1">
            <img src="__STATIC__/icon/publish/icon_yixuanze@2x.png" class="pub_icon pub_dis" data="2">
            <a href="/index/index/agreement/at_name/商品发布协议" class="pub_agree">同意《拍吖吖商品发布协议》</a>
        </div>
    </div>
</main>
<div class="pub_submit register_yellow">
    <button type="submit" class="smt">确认提交商品</button>
</div>
<!-- 分类的弹框 -->
<div class="application_popups">
    <div class="application_menu">
        <ul>
        <!-- 判断不为空 -->
            <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li><a class="" name="<?php echo $vo['status']; ?>" id="<?php echo $vo['gc_id']; ?>"><?php echo $vo['gc_name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="application_content">
        <div class="application_contentDiv">
        <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <ul class="application_tabcon">
                <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a sc_id="" class="application_two" name="<?php echo $voo['status']; ?>" id="<?php echo $voo['gc_id']; ?>"><?php echo $voo['gc_name']; ?></a>
                            <div class="application_three">
                                <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): if(is_array($voo['son']) || $voo['son'] instanceof \think\Collection || $voo['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $voo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vooo): $mod = ($i % 2 );++$i;?>
                                        <a sc_id="" name="<?php echo $vooo['status']; ?>" id="<?php echo $vooo['gc_id']; ?>"><?php echo $vooo['gc_name']; ?>
                                        </a>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </div>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
    </div>
</div>
<!-- 配送方式的弹框 -->
<div class="delivery_pop">
    <div class="delivery_con">
        <div class="delivery_list">
            <p>选择配送方式</p>
            <div class="delivery_img">
                <img src="__STATIC__/image/login/icon_login_clean@2x.png">
            </div>
        </div>
        <?php if(is_array($spec) || $spec instanceof \think\Collection || $spec instanceof \think\Paginator): $i = 0; $__LIST__ = $spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="delivery_lists" id="<?php echo $vo['gs_id']; ?>">
            <p><?php echo $vo['gs_name']; ?></p>
            <span><?php echo $vo['gs_des']; ?></span>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

<div class="big_img">
    <div class="swiper-container2">
        <div class="swiper-wrapper"></div>
    </div>
</div>

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
<script src="__STATIC__/lib/layui/layui.js"></script>
<script src="__JS__/common/popups.js"></script>
<script src="__JS__/goods/jQuery.upload.js"></script>
<script src="__JS__/goods/mobiscroll.2.13.2.js"></script>
<script src="__JS__/goods/publish.js"></script>
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>
<script src="__JS__/goods/publish1.js"></script>
<script>
//var swiper = new Swiper('.swiper-container');
    var g_id = "<?php echo isset($info['g_id']) ? $info['g_id'] :  ''; ?>";
    var inp_val=$('.gp_market_price').val();
    if(inp_val==""||inp_val==undefined){
        $(".content_number").removeClass("application_tab_li");
    }else{
        $(".content_number").addClass("application_tab_li");
    }
    $('.gp_market_price').keyup(function(){
        var inp_val=$(this).val();
        if(inp_val==""){
             $(".content_number").removeClass("application_tab_li");
        }else{
             $(".content_number").addClass("application_tab_li");
            $.get('/member/goods/get_discount',{money:inp_val},function(res){
                if(res.status==1){
                    for (k in res.data){
                        num = Number(k)+1;
                        $('input[name="nod"]').eq(k).val(res.data[k].gdt_id);
                        if(g_id != '') {
                            if(res.data[k].is_check == 0) {
                                $('input[name="nod"]').eq(k).removeAttr('checked');
                            }
                        }                        
                        $('.gdt_img'+num).attr('src',res.data[k].gdt_img);
                        $('.gdr_price'+num).find('small').html(res.data[k].gdr_price);
                        $('.gdr_membernum'+num).find('input').val(res.data[k].gdr_membernum);
                    }
                }
            })
        }
    })
//点击库存说明
$(".pub_explain").click(function(){
    $(".layui-layer-dialog .layui-layer-content").css({paddingTop:0});
    layer.confirm("",{
        title:['商品库存说明','color:#666666;font-size:0.24rem;border-bottom:0.01rem solid #eee!important;margin-left:0.2rem;margin-right:0.2rem;'],/*标题*/
//        title:true,/*标题*/
        closeBtn:1,
        btnAlign: 'c',
        closeBtn: 0,
        btn:'我知道啦~',
        content:'<p style="text-align: left;color:#333333;font-size: 0.26rem;">1. 商品库存默认为1件，结束后商品无法再开团</p><p style="text-align: left;color:#333333;font-size: 0.26rem;">2. 若商品库存大于1件，在第一件商品结束后，下一件商品会自动开团</p><p style="text-align: left;color:#333333;font-size: 0.26rem;">3. 您可以在“我的-我发布的”中修改商品的库存</p> ',
    });
})
//压缩图片
    var filechooser = document.getElementById("choose");
    //    用于压缩图片的canvas
    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext('2d');
    //    瓦片canvas
    var tCanvas = document.createElement("canvas");
    var tctx = tCanvas.getContext("2d");
    var maxsize = 100 * 1024;
    $("#upload").on("click", function() {
        filechooser.click();
    }).on("touchstart", function() {
        $(this).addClass("touch")
    }).on("touchend", function() {
        $(this).removeClass("touch")
    });
    filechooser.onchange = function() {
        if (!this.files.length) return;
        var files = Array.prototype.slice.call(this.files);
        var fileli=$(".img-list li").length;

//        console.log(fileli);
        if (files.length+fileli> 12) {
            layer.msg("<span style='color:#fff'>最多只能上传12张图片哦</span>",{
                time:2000
            });
            return;
        }
        if (files.length+fileli> 11){
            $("#upload").css({display:"none"});
        }else{
            $("#upload").css({display:"block"});
        }
        files.forEach(function(file, i) {
            if (!/\/(?:jpeg|png|gif)/i.test(file.type)) return;
            var reader = new FileReader();
            var li = document.createElement("li");
//          获取图片大小
            var size = file.size / 1024 > 1024 ? (~~(10 * file.size / 1024 / 1024)) / 10 + "MB" : ~~(file.size / 1024) + "KB";
            
            li.innerHTML='<div class="pub_cross del"></div>'
//            li.innerHTML = '<div class="progress"><span></span></div><div class="size">' + size + '</div>';
            $(".img-list").prepend($(li));
            reader.onload = function() {
                var result = this.result;
                var img = new Image();
                img.src = result;
//                $(".swiper-wrapper").append('<div class="swiper-slide"><img src="'+result+'" alt=""/></div>');
//                var swiper = new Swiper('.swiper-container');
                //$(li).css("background-image", "url(" + result + ")");
                //如果图片大小小于100kb，则直接上传
                if (result.length <= maxsize) {
                    console.log(img.src)
                    $(li).append('<img  class="imgs" src="'+ img.src +'">');
                    img = null;
                    return;
                }
//      图片加载完毕之后进行压缩，然后上传
                if (img.complete) {
                    callback();
                } else {
                    img.onload = callback;
                }
                function callback() {
                    var data = compress(img);
                    $(li).append('<img  class="imgs" src="'+ data +'">');
                    img = null;
                }
            };
            reader.readAsDataURL(file);
        })

        $(".del").click(function(){
            $(this).parent("li").remove();
            var fileli=$(".img-list li").length;
            console.log(fileli);
            if(fileli<12){
                $("#upload").css({display:"block"});
            }
        })
    };

    //    使用canvas对大图片进行压缩
    function compress(img) {
        var initSize = img.src.length;
        var width = img.width;
        var height = img.height;
        //如果图片大于四百万像素，计算压缩比并将大小压至400万以下
        var ratio;
        if ((ratio = width * height / 4000000) > 1) {
            ratio = Math.sqrt(ratio);
            width /= ratio;
            height /= ratio;
        } else {
            ratio = 1;
        }
        canvas.width = width;
        canvas.height = height;
//        铺底色
        ctx.fillStyle = "#fff";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        //如果图片像素大于100万则使用瓦片绘制
        var count;
        if ((count = width * height / 1000000) > 1) {
            count = ~~(Math.sqrt(count) + 1); //计算要分成多少块瓦片
//            计算每块瓦片的宽和高
            var nw = ~~(width / count);
            var nh = ~~(height / count);
            tCanvas.width = nw;
            tCanvas.height = nh;
            for (var i = 0; i < count; i++) {
                for (var j = 0; j < count; j++) {
                    tctx.drawImage(img, i * nw * ratio, j * nh * ratio, nw * ratio, nh * ratio, 0, 0, nw, nh);
                    ctx.drawImage(tCanvas, i * nw, j * nh, nw, nh);
                }
            }
        } else {
            ctx.drawImage(img, 0, 0, width, height);
        }
        //进行最小压缩
        var ndata = canvas.toDataURL('image/jpeg', 0.3);
//        console.log('压缩前：' + initSize);
//        console.log('压缩后：' + ndata.length);
//        console.log('压缩率：' + ~~(100 * (initSize - ndata.length) / initSize) + "%");
        tCanvas.width = tCanvas.height = canvas.width = canvas.height = 0;
        return ndata;
    }

    /*调起大图 S*/
    var mySwiper = new Swiper('.swiper-container2', {
        loop: false,
        pagination: '.swiper-pagination2',
        })
    $(".view").on("click", ".img-list img",function() {
        var imgBox = $(this).parents(".img-list").find("img");
        var i = $(imgBox).index(this);
        $(".big_img .swiper-wrapper").html("")

        for(var j = 0 ,c = imgBox.length; j < c ;j++){
         $(".big_img .swiper-wrapper").append('<div class="swiper-slide"><div class="cell"><img src="' + imgBox.eq(j).attr("src") + '" / ></div></div>');
        }
        mySwiper.updateSlidesSize();//这个方法会重新计算Slides的数量
        mySwiper.updatePagination();//这个方法会重新计算Slides分页器的数量
        $(".big_img").css({
            "z-index": 1001,
            "opacity": "1"
        });
        mySwiper.slideTo(i, 0, false);
        return false;
    });
  
    $(".big_img").on("click",function() {
        $(this).css({
            "z-index": "-1",
            "opacity": "0"
        });
    });
  /*调起大图 E*/
</script>

    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>