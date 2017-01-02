<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>基本设置</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/basic_setup.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧店铺管理-->
        <div class="basic_setup left">
            <h1 class="title">基本设置</h1>
            <div class="setup_content">
                <ul>
                    <li>
                        <img src="images/merchant/sj_zhxx_icon_right_default.png" alt="">
                    </li>
                    <li><span>登录密码</span></li>
                    <li>互联网账号存在被盗号风险，建议您定期修改密码以保护账号安全。</li>
                    <li><a href="/merchant_modify_loginPw">修改</a></li>
                </ul>
                <ul>
                <?php if(!$sellerinfo['paypw']):?>
                    <li>
                        <img src="images/merchant/sj_zhxx_icon_no_default.png" alt="">
                    </li>
                    <li><span>支付密码</span></li>
                    <li>设置密码后开启支付功能，保障虚拟资产安全。</li>
                    <li><input onclick="location.href='/merchant_set_payPw'" type="button" value="立即设置"/></li>
                <?php else:?>
                    <li>
                        <img src="images/merchant/sj_zhxx_icon_right_default.png" alt="">
                    </li>
                    <li><span>支付密码</span></li>
                    <li>设置密码后开启支付功能，保障虚拟资产安全。</li>
                    <li><input onclick="location.href='/merchant_set_payPw'" type="button" value="修改"/></li>
                <?php endif;?>
                </ul>
                <ul>
                <?php if(!$sellerinfo['withdrawpw']):?>
                    <li>
                        <img src="images/merchant/sj_zhxx_icon_no_default.png" alt="">
                    </li>
                    <li><span>提现密码</span></li>
                    <li>设置密码后开启提现功能，可将平台资产转出。</li>
                    <li><input onclick="location.href='/merchant_set_withdrawdepositPw'" type="button" value="立即设置"/></li>
                <?php else:?>
                    <li>
                        <img src="images/merchant/sj_zhxx_icon_right_default.png" alt="">
                    </li>
                    <li><span>提现密码</span></li>
                    <li>设置密码后开启提现功能，可将平台资产转出。</li>
                    <li><input onclick="location.href='/merchant_set_withdrawdepositPw'" type="button" value="修改"/></li>
                <?php endif;?>
                </ul>
                <ul>
                    <li>
                        <img src="images/merchant/sj_zhxx_icon_right_default.png" alt="">
                    </li>
                    <li><span>联系方式</span></li>
                    <li>
                        <span>QQ:<?php echo $sellerinfo['qq'];?></span><br/>
                        <span>手机：<?php echo substr($sellerinfo['tel'], 0,3);?>****<?php echo substr($sellerinfo['tel'], -4);?></span>
                    </li>
                    <li><a href="/merchant_set_sellerqq">修改</a><br/><a href="/merchant_set_sellertel">修改</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="../../js/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html");
    })
</script>
</body>
</html>









