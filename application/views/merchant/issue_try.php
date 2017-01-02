<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布试用</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/issue_try.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧店铺管理-->
        <div class="store_content left">
            <h1 class="title">发布试用</h1>
            <!--进度条-->
            <div class="progress_bar">
                <img src="images/merchant/sj_fbsy_bg_jdt_one_default.png" alt="">
            </div>
            <!--当店铺管理已经绑定了店铺--选择发布试用内容的样式-->
            <div class="have_bindingShops">
                <h2 class="title">1.选择店铺、确定平台</h2>
                <div class="shop_information">
                    <?php foreach($shoplist as $v):?>
                        <div class="left shop">
                            <img style="width: 60px;height: 60px" src=<?php echo $v['logo_link'];?> alt="">
                            <p class="shop_name"><?php echo $v['shop_name'];?></p>
                            <p class="shop_source">来源：<p class="shop_inner_source"><?php echo ($v['platform_id']==1?'淘宝':'天猫'); ?></p></p>
                        </div>
                    <?php endforeach?>
                </div>
                <div class="nextStep_btn">
                    <input class="one" type="button" value="下一步"/>
                    <input onclick="next_step();" class="two" type="button" value="下一步">
                </div>
                <p class="note">
                    <b>注意：</b>
                    试用发布后，开奖类型包括免费试用商品和优惠购买商品，所以请商家设置相应的独家优惠券，优惠券要求有效时间至少12天以上。
                </p>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="shop_name">
<input type="hidden" id="platform_id">

<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html");

        $('.shop').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #f5f5f5');
            $('.one').css('display','none');
            $('.two').css('display','block');
            var shop_name = $(this).find('.shop_name').html();
            var platform_id = $(this).find('.shop_inner_source').html();
            $("#shop_name").val(shop_name);
            $("#platform_id").val(platform_id);
        });
    })
</script>
<script>
    function next_step(){
        var seller_id = <?php echo $seller_id ?>;
        var shop_name = $("#shop_name").val();
        var platform_id = $("#platform_id").val();
        if (platform_id == "淘宝"){
            platform_id = 1;
        }else{
            platform_id = 2;
        }
        $.ajax({
            url : admin.url+'merchant_issue_try/insert_fake_activity',
            data:{seller_id:seller_id,shop_name:shop_name,platform_id:platform_id},
            type : 'post',
            cache : false,
            success : function (data){
               console.log(data);
               location.href=admin.url+"merchant_issue_try2?act_id="+data;
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }
</script>
</body>
</html>









