<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"D:\project\pai\public/../application/member/view/myhome/peanut.html";i:1544154864;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1544154864;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/myhome/peanut.css"> 
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
        <!-- <script src="__JS__/common/vconsole.min.js"></script> -->
        <!-- <script src="__JS__/imsdk/sdk/webim.js" type="text/javascript"></script> -->
        <!--web im sdk 登录 示例代码-->
        <!-- <script src="__JS__/imsdk/js/login/login.js" type="text/javascript"></script> -->
        <!-- <script src="__JS__/login/loginsdk.js"></script> -->
        <!--web im sdk 登出 示例代码-->
        <!-- <script src="__JS__/imsdk/js/logout/logout.js" type="text/javascript"></script> -->
        
        <title></title>
    </head>
    <body>
        <header></header>
        <header></header>
        
<main style="margin-top: 0;">
    <div class="peanut_bg">
        <div class="peanut_header">
            <a class="peanut_fanhui" onclick="backH5()">
             <img src="__STATIC__/image/orderpai/icon_nav_back@2x.png" alt="" />
            </a>
            <p>我的花生</p>
            <!-- <a href="/member/myhome/peanut_explain">帮助说明</a> -->
            <?php if($is_lord ==1): else: ?>
    <a href="/index/index/agreement/at_name/花生帮助">帮助说明</a>
    <?php endif; ?>
            
        </div>
        <div class="peanut_top_tit">
            <p>
                <!--<img src="__STATIC__/image/myhome/icon_huasheng@2x.png" alt="" />-->
                <span>现有花生数</span>
            </p>
            <p class="peanut_num"><?php echo isset($info['peanut']) ? $info['peanut'] :  0; ?></p>
            <div class="peanut_gouser">去使用</div>
            <div class="peanut_view clear">
                <div class="peanut_tab peanut_lftab lf">
                    <p><?php echo isset($info['total_peanut']) ? $info['total_peanut'] :  0; ?></p>
                    <span>花生总额</span>
                </div>
                <div class="peanut_tab lf">
                    <p><?php echo isset($info['spend_peanut']) ? $info['spend_peanut'] :  0; ?></p>
                    <span>已抵用的花生</span>
                </div>
            </div>
        </div>
    </div>
    <a href="/member/myhome/recharge_peanut">
        <div class="peanut_list clear">
            <img src="__STATIC__/image/myhome/icon_chognzhi @2x.png" alt="" class="peanut_chongzhi lf" />
            <span class="lf">充值</span>
            <img src="__STATIC__/image/myhome/icon_nav_jump@2x.png" alt="" class="peanut_img rt" />
        </div>
    </a>
    <div class="peanut_record">
        <div class="peanut_list peanut_select_position">
            <span class="peanut_list_tit lf">花生记录</span>
            <div class="peanut_list_all rt">
                <span>全部</span>
                <img src="__STATIC__/image/myhome/icon_nav_down_selected@2x.png" alt="" class="peanut_img" />
            </div>
            <div class="peanut_select_fix"></div>
            <div class="peanut_select">
                <div class="peanut_sanjiao"></div>
                <ul>
                    <li data="0">全部</li>
                    <li data="add">获取</li>
                    <li calss='bordernon' data="reduce">使用</li>
                </ul>
                <input type="hidden" name="type" id="type" value="0" />
            </div>
        </div>

        <!--展示上拉加载的数据列表-->
        <div id="dataList" class="data-list"></div>

    </div>
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
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script src="__JS__/Public.js"></script>
<script>
    $(".peanut_gouser").click(function(){
        layer.confirm("",{
            title:['吖吖公告','color:#666666;font-size:0.24rem;border-bottom:0.01rem solid #eee!important;margin-left:0.2rem;margin-right:0.2rem;'],/*标题*/
//        title:true,/*标题*/
            btnAlign: 'c',
            closeBtn: 0,
            btn:'我知道啦~',
            content:'<p style="color:#333333;font-size: 0.26rem;">诺丁百利正紧张筹备中，马上与大家见面了。</p><p style="color:#333333;font-size: 0.26rem;">敬请期待！</p>',
        });
    })
    $(window).scroll(function(){
        var scrol=$(window).scrollTop();
        if(scrol>1){
            $(".peanut_header").css("background","#fff");
        }else{
            $(".peanut_header").css("background","none");
        }
    })
    $(function () {
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
                    tip: "暂无相关数据~", //提示
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
            getListDataFromNet(page.num, page.size, function (curPageData) {
                //方法四 (不推荐),会存在一个小问题:比如列表共有20条数据,每页加载10条,共2页.如果只根据当前页的数据个数判断,则需翻到第三页才会知道无更多数据,如果传了hasNext,则翻到第二页即可显示无更多数据.
                mescroll.endSuccess(curPageData.length);

                //设置列表数据
                setListData(curPageData);
            }, function () {
                //联网失败的回调,隐藏下拉刷新和上拉加载的状态;
                mescroll.endErr();
            });
        }

        //点击下拉框
        $(".peanut_list_all").click(function () {
            $(".peanut_select_fix").addClass("peanut_block");
            $(".peanut_select").addClass("peanut_block");
        })
        //点击遮罩
        $(".peanut_select_fix").click(function () {
            $(this).removeClass("peanut_block");
            $(".peanut_select").removeClass("peanut_block");
        })
        //点击下拉框里面的内容
        $(".peanut_select li").click(function () {
            var val = $(this).html();
            $(".peanut_select_fix").removeClass("peanut_block");
            $(".peanut_select").removeClass("peanut_block");
            $(".peanut_list_all span").html(val);
            $('#type').val($(this).attr('data'));

            //重置列表数据
            mescroll.resetUpScroll();
            //隐藏回到顶部按钮
            mescroll.hideTopBtn();

        })
        /*设置列表数据*/
        function setListData(curPageData) {
            var listDom = document.getElementById("dataList");

            var mapLoction = function (arr) {
                var newArr = [];
                arr.forEach(function(address, i) {
                    var index = -1;
                    var alreadyExists = newArr.some( function(newAddress, j) {
                        if (address.month === newAddress.month) {
                            index = j;
                            return true;
                        }
                    });
                    if (!alreadyExists) {
                        newArr.push({
                            month: address.month,
                            add_price:address.add_price,
                            reduce_money:address.reduce_money,
                            info: [{"date_pl_time":address.date_pl_time,"pl_type":address.pl_type,"pl_type":address.pl_type,"pl_num":address.pl_num,"pl_reason":address.pl_reason,"pl_reason":address.pl_reason}]
                        });
                    } else {
                        newArr[index].info.push({"date_pl_time":address.date_pl_time,"pl_type":address.pl_type,"pl_type":address.pl_type,"pl_num":address.pl_num,"pl_reason":address.pl_reason,"pl_reason":address.pl_reason});
                    }
                });
                return newArr;
            };

            for (var i = 0; i < mapLoction(curPageData).length; i++) {
                var pd = mapLoction(curPageData)[i];
                var hf = '';
                var sy = '';
                var str = '';

                if ($('#type').val() == 'add') {
                    sy = '<p class="peanut_huoqu lf" style="margin:0">获取:<span>' + pd.add_price + '</span></p>';
                } else if ($('#type').val() == 'reduce') {
                    sy = '<p class="peanut_use lf">使用:<span>' + pd.reduce_money + '</span></p>';
                } else {
                    sy = '<p class="peanut_huoqu lf">获取:<span>' + pd.add_price + '</span></p><p class="peanut_use lf">使用:<span>' + pd.reduce_money + '</span></p>';
                }

                if($('.month').last().find('.peanut_list_tit').text() != pd.month) {
                    str = '<div class="peanut_list clear month">';
                    str += '<span class="peanut_list_tit lf">' + pd.month + '</span>';
                    str += '<div class="peanut_list_hint rt clear">';
                    str += sy;
                    str += '</div>';
                    str += '</div>';
                }
                
                for (j = 0; j < pd.info.length; j++) {
                    if (pd.info[j].pl_type == 'add') {
                        hf = '<span class="peanut_green">+' + pd.info[j].pl_num + '</span>';
                    } else {
                        hf = '<span class="peanut_red">-' + pd.info[j].pl_num + '</span>';
                    }
                    if (pd.info[j].pl_reason == null) {
                        pd.info[j].pl_reason = '';
                    }
 
                    str += '<div class="peanut_list peanut_list_hei clear">';             
                    str += '<div class="peanut_list_lf lf">';
                    str += '<p class="peanut_list_tit">' + pd.info[j].pl_reason + '</p>';
                    str += '<span>' + pd.info[j].date_pl_time + '</span>';
                    str += '</div>';
                    str += '<div class="peanut_list_hint rt clear">';
                    str += hf;
                    str += '</div>';
                    str += '</div>';
                }

                var liDom = document.createElement("div");
                liDom.className = 'hslist';
                liDom.innerHTML = str;
                listDom.appendChild(liDom);
            }
            $('.month').eq(0).css("margin","0 0 0 0");
        }

        /*联网加载列表数据
        在您的实际项目中,请参考官方写法: http://www.mescroll.com/api.html#tagUpCallback
        请忽略getListDataFromNet的逻辑,这里仅仅是在本地模拟分页数据,本地演示用
        实际项目以您服务器接口返回的数据为准,无需本地处理分页.
        * */
        function getListDataFromNet(pageNum, pageSize, successCallback, errorCallback) {
            if ($('#type').val() == '0') {
                var url = '/member/myhome/peanut/page/' + pageNum + '/page_size/' + pageSize;
            } else if ($('#type').val() == 'add') {
                url = '/member/myhome/peanut/pl_type/add/page/' + pageNum + '/page_size/' + pageSize;
            } else if ($('#type').val() == 'reduce') {
                url = '/member/myhome/peanut/pl_type/reduce/page/' + pageNum + '/page_size/' + pageSize;
            }
            //延时一秒,模拟联网
            setTimeout(function () {
                $.ajax({
                    type: 'get',
                    url: url,
                    data: {},
                    dataType: 'json',
                    success: function (data) {
                        var listData = [];
                        for (var i = 0; i < data.list.length; i++) {
                            listData.push(data.list[i]);
                        }

                        //回调
                        successCallback(listData);
                    },
                    error: errorCallback
                });
            }, 1000)
        }
    });



    //返回按钮
    function backH5() {        
        window.location.href = "/member/myhome/index/";            
    }
</script> 
    <!-- <script>
        $(function(){
            webimLogin();
        })
    </script>  -->
</html>