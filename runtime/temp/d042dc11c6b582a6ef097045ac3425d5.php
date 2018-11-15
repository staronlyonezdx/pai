<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"D:\project\pai\public/../application/member/view/wallet/profit_book.html";i:1541491284;s:65:"D:\project\pai\public/../application/member/view/common/base.html";i:1542013165;s:67:"D:\project\pai\public/../application/member/view/common/header.html";i:1541491283;s:67:"D:\project\pai\public/../application/member/view/common/js_sdk.html";i:1541491283;}*/ ?>

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
<link rel="stylesheet" type="text/css" href="__CSS__/swiper/swiper-3.3.1.min.css">
<link rel="stylesheet" type="text/css"
      href="__CSS__/wallet/transaction_book.css"> 
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
        <header> <div class="header_nav">
    <div class="header_view">
        <div class="header_tit">
            <span><?php echo isset($header_title) ? $header_title :  ''; ?></span>
            <div class="header_back" <?php if(empty($header_path) || (($header_path instanceof \think\Collection || $header_path instanceof \think\Paginator ) && $header_path->isEmpty())): ?> onClick="javascript:history.back();" <?php else: ?> onClick="javascript:window.location.href='<?php echo $header_path; ?>'" <?php endif; ?>>
                <img src="__STATIC__/icon/publish/icon_nav_back@2x.png" name='out' class="smt">
            </div>
        </div>
    </div>
</div> </header>
        <header></header>
        
<div id="nav" class="nav">
    <p class="active" i="0">
        <span>全部</span>
    </p>
    <p i="1">
        <span>收益</span>&nbsp;
        <img src="__STATIC__/image/wallet/icon_nav_down_selected@2x.png">
    </p>
    <p i="2">
        <span>支出</span>
    </p>
</div>
<div class="transaction_pop">
    <div class="over-pop"></div>
    <div class="transaction_select">
        <div class="transaction_sanjiao"></div>
        <div class="transaction_select_list">
            <div class="transaction_select_text" data="0">全部</div>
            <div class="transaction_select_text" data="1">推荐费</div>
            <div class="transaction_select_text bordernon" data="2">观望奖</div>
            <!--<div class="transaction_select_text bordernon" data="2">分润收益</div>-->
            <input type="hidden" id="type" value="0">
        </div>
    </div>
</div>
<!--轮播-->
<div id="swiper" class="swiper-container">
    <div class="swiper-wrapper">

        <!--全部-->
        <div id="mescroll0" class="swiper-slide mescroll">
            <div class="transaction_tit clear">
                <!-- <p class=" lf">本月</p> -->
                <p class="transaction_tit_rt transaction_list_money rt">支出:
                    <span class="transaction_zhichu"><?php echo isset($money['reduce_money']) ? $money['reduce_money'] :  0; ?></span>
                </p>
                <p class="transaction_tit_rt rt">收入:
                    <span class="transaction_shouru"><?php echo isset($money['add_money']) ? $money['add_money'] :  0; ?></span>
                </p>
            </div>
            <div>
                <?php if($promoters_info['is_show'] = 1): ?>
                <a href="/member/promoters/assessment_money">
                    <div class="transaction_list_view">
                        <div class="transaction_list clear">
                            <div class="transaction_list_lf lf">
                                <p> 推广员考核期收益</p>
                                <span></span>
                            </div>
                            <div class="transaction_list_rt transaction_list_img rt">
                                <img src="__STATIC__/image/promoters/icon_jump@2x.png" alt="" class="rt">
                            </div>
                            <div class="yaoqing_info rt">
                                <span class="lf" style="margin-top: 0.2rem">+<?php echo $promoters_info['money']; ?></span>
                                <!--<a href="/member/promoters/assessment_money">-->
                                    <!--<img src="__STATIC__/image/promoters/icon_jump@2x.png" alt="" class="rt">-->
                                <!--</a>-->
                            </div>
                        </div>
                    </div>
                </a>
                <?php endif; ?>
            </div>
            <div id="dataList0" class="data-list">
            </div>
        </div>
        <!--收益-->
        <div id="mescroll1" class="swiper-slide mescroll">
            <div class="transaction_tit clear">
                <!-- <p class=" lf">本月</p> -->
                <p class="transaction_tit_rt rt">收入:
                    <span class="transaction_shouru"><?php echo isset($money['add_money']) ? $money['add_money'] :  0; ?></span>
                </p>
            </div>
            <div>
                <?php if($promoters_info['is_show'] = 1): ?>
                <a href="/member/promoters/assessment_money">
                <div class="transaction_list_view">
                    <div class="transaction_list clear">
                        <div class="transaction_list_lf lf">
                            <p> 推广员考核期收益</p>
                            <span></span>
                        </div>
                        
                            <div class="transaction_list_rt transaction_list_img rt">
                                <img src="__STATIC__/image/promoters/icon_jump@2x.png" alt="" class="rt">
                            </div>
                        <div class="yaoqing_info rt">
                            <span class="lf" style="margin-top: 0.2rem">+<?php echo $promoters_info['money']; ?></span>
                            <!--<a href="/member/promoters/assessment_money">-->
                            <!--<img src="__STATIC__/image/promoters/icon_jump@2x.png" alt="" class="rt">-->
                            <!--</a>-->
                        </div>
                    </div>
                </div>
            </a>
                <?php endif; ?>
            </div>
            <div id="dataList1" class="data-list">

            </div>
        </div>

        <!--支出-->
        <div id="mescroll2" class="swiper-slide mescroll">
            <div class="transaction_tit clear">
                <!-- <p class=" lf">本月</p> -->
                <p class="transaction_tit_rt transaction_list_money rt">支出:
                    <span class="transaction_zhichu"><?php echo isset($money['reduce_money']) ? $money['reduce_money'] :  0; ?></span>
                </p>
            </div>
            <div id="dataList2" class="data-list">

            </div>
        </div>

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
<script src="__JS__/Public.js"></script>
<script src="__JS__/mescroll/mescroll.min.js"></script>
<script src="__JS__/swiper/swiper-3.3.1.min.js"></script>

<script type="text/javascript" charset="utf-8">
    //收益下拉分类
    function down() {
        $(".transaction_pop").addClass("transaction_pop_dis");
    }

    $(function () {
        var type = "<?php echo $m_type; ?>";
        console.log(type);
        var curNavIndex = 0;//全部0; 收益1; 支出2;
        var mescrollArr = new Array(3);//3个菜单所对应的3个mescroll对象

        //初始化首页
        mescrollArr[0] = initMescroll("mescroll0", "dataList0");

        /*初始化轮播*/
        var swiper = new Swiper('#swiper', {
            initialSlide: type,
            onTransitionEnd: function (swiper) {
                var i = swiper.activeIndex;//轮播切换完毕的事件
                console.log(i);
                changePage(i);
            }
        });

        /*初始化菜单*/
        $("#nav p span").click(function () {
            var i = Number($(this).parent().attr("i"));
            console.log(i);
            swiper.slideTo(i);//以轮播的方式切换列表
            if (i == 1) {
                $('#nav').find('img').attr('onclick', 'down()');
            } else {
                $('#nav').find('img').removeAttr('onclick');
            }
        })

        //隐藏收益下拉
        $('.over-pop').click(function () {
            $(".transaction_pop").removeClass("transaction_pop_dis");
        })

        /*切换列表*/
        function changePage(i) {
            if (i == 1) {
                $('#nav').find('img').attr('onclick', 'down()');
            } else {
                $('#nav').find('img').removeAttr('onclick');
            }

            if (curNavIndex != i) {
                //更改列表条件
                $("#nav p").each(function (n, dom) {
                    if (dom.getAttribute("i") == i) {
                        dom.classList.add("active");
                    } else {
                        dom.classList.remove("active");
                    }
                })
                //隐藏当前回到顶部按钮
                mescrollArr[curNavIndex].hideTopBtn();
                //取出菜单所对应的mescroll对象,如果未初始化则初始化
                if (mescrollArr[i] == null) {
                    mescrollArr[i] = initMescroll("mescroll" + i, "dataList" + i);
                } else {
                    //检查是否需要显示回到到顶按钮
                    var curMescroll = mescrollArr[i];
                    var curScrollTop = curMescroll.getScrollTop();
                    if (curScrollTop >= curMescroll.optUp.toTop.offset) {
                        curMescroll.showTopBtn();
                    } else {
                        curMescroll.hideTopBtn();
                    }
                }
                //更新标记
                curNavIndex = i;
            }
        }

        /*创建MeScroll对象*/
        function initMescroll(mescrollId, clearEmptyId) {
            //创建MeScroll对象,内部已默认开启下拉刷新,自动执行up.callback,刷新列表数据;
            var mescroll = new MeScroll(mescrollId, {
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
                        tip: "暂无相关数据~", //提示
                    },
                    clearEmptyId: clearEmptyId, //相当于同时设置了clearId和empty.warpId; 简化写法;默认null
                    htmlLoading: '<p class="upwarp-progress mescroll-rotate"></p><p class="upwarp-tip">加载中..</p>', //上拉加载中的布局
                    htmlNodata: '<p class="upwarp-nodata">我是有底线的~</p>', //无数据的布局
                    toTop: { //配置回到顶部按钮
                        src: "/static/image/application/mescroll-totop.png", //默认滚动到1000px显示,可配置offset修改
                    }
                }
            });
            return mescroll;
        }

        /*联网加载列表数据  page = {num:1, size:10}; num:当前页 从1开始, size:每页数据条数 */
        function getListData(page) {
            //联网加载数据
            var dataIndex = curNavIndex;
            console.log(dataIndex);//记录当前联网的nav下标,防止快速切换时,联网回来curNavIndex已经改变的情况;
            getListDataFromNet(dataIndex, page.num, page.size, function (pageData) {
                //联网成功的回调,隐藏下拉刷新和上拉加载的状态;
                //mescroll会根据传的参数,自动判断列表如果无任何数据,则提示空;列表无下一页数据,则提示无更多数据;
                //console.log("dataIndex=" + dataIndex + ", curNavIndex=" + curNavIndex + ", page.num=" + page.num + ", page.size=" + page.size + ", pageData.length=" + pageData.length);

                //方法四 (不推荐),会存在一个小问题:比如列表共有20条数据,每页加载10条,共2页.如果只根据当前页的数据个数判断,则需翻到第三页才会知道无更多数据,如果传了hasNext,则翻到第二页即可显示无更多数据.
                mescrollArr[dataIndex].endSuccess(pageData.length);

                //设置列表数据
                setListData(pageData, dataIndex);
            }, function () {
                //联网失败的回调,隐藏下拉刷新和上拉加载的状态;
                mescrollArr[dataIndex].endErr();
            });
        }

        //点击收益的选择内容
        $(".transaction_select_text").click(function () {
            var htm = $(this).html();
            var id = $(this).attr('data');
            $('#type').val(id);
            if (htm == "全部") {
                $("#nav").find('span').eq(1).html("收益");
            } else {
                $("#nav").find('span').eq(1).html(htm);
            }
            $(".transaction_pop").removeClass("transaction_pop_dis");

            //重置列表数据
            mescrollArr[1].resetUpScroll();
            //隐藏回到顶部按钮
            mescrollArr[1].hideTopBtn();

        })

        /*设置列表数据
         * pageData 当前页的数据
         * dataIndex 数据属于哪个nav */
        function setListData(pageData, dataIndex) {
            var listDom = document.getElementById("dataList" + dataIndex);
            for (var i = 0; i < pageData.length; i++) {
                var pd = pageData[i];

                if (pd.ml_type == "reduce") {
                    fh = '<span class="transaction_list_zhichu">-' + pd.ml_money + '</span>';
                } else {
                    fh = '<span class="transaction_list_shouru">+' + pd.ml_money + '</span>';
                }

                if (dataIndex == 2) {
                    pd.nickname = ''
                }

                var str = '<div class="transaction_list_view">';
                str += '<div class="transaction_list clear">';
                str += '<div class="transaction_list_lf lf">';
                str += '<p>' + pd.ml_reason + '</p>';
                str += '<span>' + msToDate(pd.add_time * 1000).wasTime + '</span>';
                str += '</div>';
                str += '<div class="transaction_list_rt transaction_list_img rt">';
                str += ' <img src="__STATIC__/image/promoters/icon_jump@2x.png" alt="" class="rt">'
                str += '</div>';
                str += '<div class="transaction_list_rt transaction_list_money rt">';
                str += fh;
                str += '</div>';
                // str += '<div class="transaction_list_rt rt">';
                // str += '<p>' + pd.nickname + '</p>';
                // //                str += '<span>' + pd.position + '</span>';
                // str += '</div>';
                str += '</div>';
                str += '</div>';
                var liDom = document.createElement("a");
                //                liDom.setAttribute("href", "/member/wallet/profit_details/ml_id/" + pd.ml_id + "");
                //liDom.setAttribute("href", "#");

                liDom.innerHTML = str;
                listDom.appendChild(liDom);
            }
        }

        /*联网加载列表数据
         在您的实际项目中,请参考官方写法: http://www.mescroll.com/api.html#tagUpCallback
         请忽略getListDataFromNet的逻辑,这里仅仅是在本地模拟分页数据,本地演示用
         实际项目以您服务器接口返回的数据为准,无需本地处理分页.
         * */
        function getListDataFromNet(curNavIndex, pageNum, pageSize, successCallback, errorCallback) {
            var id = $('#type').val();
            console.log(curNavIndex);
            if (curNavIndex == 0) {
                var url = '/member/wallet/ajax_profit_book/page/' + pageNum + '/page_size/' + pageSize;
            } else if (curNavIndex == 1) {
                if (id == '0') {
                    url = '/member/wallet/ajax_profit_book/ml_type/add/page/' + pageNum + '/page_size/' + pageSize;
                } else {
                    url = '/member/wallet/ajax_profit_book/ml_type/add/income_type/' + id + '/page/' + pageNum + '/page_size/' + pageSize;
                }
            } else if (curNavIndex == 2) {
                url = '/member/wallet/ajax_profit_book/ml_type/reduce/page/' + pageNum + '/page_size/' + pageSize;
            }
            //延时一秒,模拟联网
            setTimeout(function () {
                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'json',
                    success: function (data) {
                        if (data.add_money == null) {
                            data.add_money = 0;
                        }
                        if (curNavIndex == 1) {
                            $('.transaction_shouru').text(data.add_money);
                        }
                        var listData = [];
                        for (var i = 0; i < data.list.length; i++) {
                            listData.push(data.list[i]);
                        }

                        //回调
                        successCallback(listData);
                    },
                    error: errorCallback
                });
            }, 500)
        }
    });

    // var aa = "<?php echo $promoters_info['is_show']; ?>"
    // console.log(aa);

</script> 
</html>