<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\project\pai\public/../application/business/view/login/index.html";i:1541491289;}*/ ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <title>拍吖吖商户管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel="stylesheet" href="__STATIC__/lib/business_master/assets/css/reset.css">
    <link rel="stylesheet" href="__STATIC__/lib/business_master/assets/css/supersized.css">
    <link rel="stylesheet" href="__STATIC__/lib/business_master/assets/css/style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script type="text/javascript" src="/static/js/jquery-3.1.1.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="page-container">
    <h1>Paiyaya Business Login</h1>
    <form action="" method="post">
        <input type="text" name="m_mobile" class="username" placeholder="Username">
        <input type="password" name="m_pwd" class="password" placeholder="Password">
        <input type="text" name="code" class="code" style="width:100px; text-align:left; ">
        <div  style="display:inline;line-height:50px;"><img src="<?php echo captcha_src(); ?>" id="verify"  style="height:30px;vertical-align: middle; "></div>
        <button type="submit">Sign me in</button>
        <div class="error"><span>+</span></div>
    </form>

</div>


<!-- Javascript -->
<script src="__STATIC__/lib/business_master/assets/js/jquery-1.8.2.min.js"></script>
<script src="__STATIC__/lib/business_master/assets/js/supersized.3.2.7.min.js"></script>
<script src="__STATIC__/lib/business_master/assets/js/supersized-init.js"></script>
<script src="__STATIC__/lib/business_master/assets/js/scripts.js"></script>

</body>
<script>
    // 更新验证码
    $('#verify').click(function () {
        $(this).attr('src', '<?php echo captcha_src(); ?>?' + Math.random());
    });
</script>
</html>

