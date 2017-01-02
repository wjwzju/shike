<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>领取下单</title>
    <link rel="stylesheet" href="css/shike/location_title.css">
    <link rel="stylesheet" href="css/shike/getOrder_stepOne.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_content">
        <div class="location_title">
            <ul>
                <li>您的位置：</li>
                <li><a href="/shike_personal">个人中心</a></li>
                <li><img src="images/shike/icon_arrow_default.png" alt=""></li>
                <li><a href="/shike_try_winningManage">使用管理</a></li>
                <li><img src="images/shike/icon_arrow_default.png" alt=""></li>
                <li>领取下单</li>
            </ul>
        </div>
        <!--步骤介绍-->
        <div class="step_introduce">
            <!--步骤进度条所处状态-->
            <div class="step_picture">
                <img src="images/shike/sk_zjgl_lqxd_bg_jdt1_default.png" alt="">
            </div>
            <!--试用商品-->
            <div class="try_good">
                <h1>1.进入试用商品详情页</h1>
                <p>请打开淘宝网登录账号：<b><?php echo $userinfo['taobao_id'];?></b>，进入购物车找到以下商品，并点击进入宝贝详情页。</p>
                <div class="commodity">
                    <div class="content">
                        <p><img src="<?php echo $orderinfo['product_img'];?>" alt=""></p>
                        <div class="good_introduce">
                            <p class="good_name"><span><?php echo $orderinfo['product_name'];?></span></p>
                            <p>店铺：<span><?php echo $orderinfo['shopname'];?></span></p>
                            <p>规格：<span><?php echo $orderinfo['size'];?> <?php echo $orderinfo['color'];?></span></p>
                        </div>
                    </div>
                    <p>需拍下数量：<span><?php echo $orderinfo['buy_sum'];?></span>件 &nbsp; 金额<span>&yen;<?php echo $orderinfo['buy_sum']*$orderinfo['unit_price'];?></span></p>
                </div>

            </div>
            <p class="step_btn">
                <input  onclick="location.href='/shike_get_order2?order_id=<?php echo $orderinfo['order_id'];?>'" class="next_step" type="button" value="下一步">
            </p>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
    })
</script>
</body>
</html>