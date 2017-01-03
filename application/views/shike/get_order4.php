<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>领取下单</title>
    <link rel="stylesheet" href="css/shike/location_title.css">
    <link rel="stylesheet" href="css/shike/getOrder_stepFour.css">
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
                <img src="images/shike/sk_zjgl_lqxd_bg_jdt4_default.png" alt="">
            </div>
            <!--试用商品-->
            <div class="try_good">
                <h1>4.客服聊天</h1>
                <h2>
                    联系卖家在线客服，至少问5个常见购买问题，如能否降价，是否包邮，商品什么材质等并截图上传聊天记录。
                    <a id="first_step" href="javascript:void(0);">查看截图示例</a>
                </h2>
                <p class="one"><b>注意：</b>1、不得提起试用等关键词，否则封禁账号；</p>
                <p>2、聊天记录必须上传和指定商品店铺的聊天记录截图，不得上传虚假信息，否则封禁账号；</p>
                <p>3、如果卖家不在线，长时间不回复怎么办？     旺旺没有应答，可以直接截图问出问题后的聊天框，无需聊天；</p>
                <p>4、试客领取试用商品一律不得向商家索要赠品和好评返现。</p>
                <form enctype="multipart/form-data" method="post" action="/shike_get_order4/submit_order4" onsubmit="return check_form()">
                <div class="first_step">
                    <!--示例图片-->
                    <div class="example_images">
                        <p class="title">下面为截图示例：</p>
                        <div class="images">
                            <p>
                                <img src="images/shike/sk_zjgl_lqxd_bg_ltjt_default.png" alt="">
                            </p>
                        </div>
                    </div>
                    <p class="uploading">
                        请上传聊天记录截图：
                        <a href="javascript:void(0);">
                            <input type="file" name="chatlog" id="chatlog" onchange="chatlog_change()">
                            上传文件
                        </a>
                        <span id="chatlog_value">未选择文件</span>
                    </p>
                    <p><span>图片的格式：gif、jpg、jpeg、png，图片大小不能大于1M。</span></p>
                </div>
            </div>
            <input type="hidden" name="order_id" value="<?php echo $orderinfo['order_id']?>">
            <p class="step_btn">
                <input  onclick="location.href='shike_get_order3?order_id=<?php echo $orderinfo['order_id']?>'" type="button" value="上一步">
                <input  class="next_step" type="submit" value="下一步">
            </p>
            </form>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");

        $('#first_step').bind('click',function(){
            $('.first_step .example_images').slideToggle();
        })
    })

    function chatlog_change(){
        $("#chatlog_value").text($("#chatlog").val());
    }

    function check_form(){
        if($("#chatlog").val()==''){
            return false;
        }
        return true;
    }
</script>
</body>
</html>