<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布试用</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/settings_trialNumber.css">
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
                <img src="images/merchant/sj_fbsy_bg_jdt_four_default.png" alt="">
            </div>
            <!--4.设置试用份数-->
            <div class="settings_trialNumber">
                <h2 class="title">4.设置试用份数</h2>
                <div class="trial_content">
                    <ul>
                        <li>
                            <img style="width: 80px;height: 80x" src="<?php echo $activity_list['picture_url'];?>" alt="">
                        </li>
                        <li>
                            <p>商品名称：<span><?php echo $activity_list['product_name']?></span></p>
                            <p>商品分类：<span><?php if($activity_list['product_classify']==1){
                                    echo "女装";
                                }elseif ($activity_list['product_classify']==2) {
                                    echo "男装";
                                }elseif ($activity_list['product_classify']==3) {
                                    echo "鞋包配饰";
                                }elseif ($activity_list['product_classify']==4) {
                                    echo "居家生活";
                                }elseif ($activity_list['product_classify']==5) {
                                    echo "数码电器";
                                }elseif ($activity_list['product_classify']==6) {
                                    echo "母婴儿童";
                                }elseif ($activity_list['product_classify']==7) {
                                    echo "食品酒水";
                                }elseif ($activity_list['product_classify']==8) {
                                    echo "其他";
                                }
                                ?></span></p>
                            <p>商品规格：<span><?php echo $activity_list['color']?>.<?php echo $activity_list['size']?></span></p>
                            <p>商品链接：<span><?php echo $activity_list['product_link']?></span></p>
                        </li>
                        <li>
                            <p>店铺名称：<span><?php echo $activity_list['shopname']?></span></p>
                            <p>平台：<span><?php echo($activity_list['platformid']==1?"淘宝":"天猫");?></span></p>
                            <p><span>通过<?php echo($activity_list['ser_platformid']==1?"淘宝":"天猫");?>自然搜索</span></p>
                        </li>
                        <li>
                            <p>商品关键词：<span><?php echo $activity_list['t_key_words']?></span></p>
                            <p>筛选列表：<span><?php echo $activity_list['t_classify1']?>、<?php echo $activity_list['t_classify2']?>、<?php echo $activity_list['t_classify3']?>、<?php echo $activity_list['t_classify4']?>、<?php echo $activity_list['t_classify5']?></span></p>
                            <p>折扣和服务：<span>24小时发货、货到付款</span></p>
                            <p>排列方式：<span>
                            <?php 
                            if($activity_list['t_sort']==1){
                                echo "综合排序";
                            }elseif($activity_list['t_sort']==2){
                                echo "销量从高到低";
                            }elseif($activity_list['t_sort']==3){
                                echo "信用从高到低";
                            }
                            ?>
                            </span></p>
                        </li>
                        <li>
                            <p>价格：<span>&yen;<?php echo $activity_list['margin']?></span></p>
                            <p>发货地：<span><?php echo $activity_list['t_delivery_place']?></span></p>
                            <p>商品运费：<?php if ($activity_list['freight']==0){echo "全国包邮";}else{echo $activity_list['freight'];}
                            ?><span></span></p>
                        </li>
                    </ul>
                    <div class="try_num">
                        <p>
                        投放试用总份数：
                        <input id="apply_amount" type="text" placeholder="份" value="<?php echo $activity['apply_amount'];?>" onblur="check_apply_amount()">
                        <b>（试用份数不得少于5件）</b>
                        </p>
                        <p class="error_hint"><span id="apply_amount_error">投放份数不能为空</span></p>
                    </div>
                </div>

                <div class="nextStep_btn">
                    <input onclick="location.href='/merchant_issue_try3?act_id=<?php echo $act_id ?>'" type="button" value="上一步"/>
                    <input onclick="next_step();" type="button" value="下一步"/>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script>
    $(function(){
        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html");

        $('[data-toggle="search"]').bind('click',function(){
            $(this).addClass('search_active');
            $(this).siblings().removeClass('search_active');
        });
        $('.by_taobao').click(function(){
            $('.tmall_content').slideUp();
            $('.taobao_content'). slideDown()
        });
        $('.by_tmall').click(function(){
            $('.taobao_content').slideUp();
            $('.tmall_content'). slideDown()
        });
        $('.checkbox').click(function(){
            $(this).toggleClass('search_active');
        });
    })
</script>
<script>
    function next_step(){
        //var seller_id = <?php echo $seller_id ?>;
        if($("#apply_amount").val() == '' || $("#apply_amount").val() == 0){
            return;
        }
        var act_id = "<?php echo $act_id ?>";
        var apply_amount = $("#apply_amount").val();
        // var shop_url = $("#shop_url").val();
        // var commodity_classify = $("#commodity_classify").val();
        // var commodity_picture = $("#commodity_picture").val();
        // var thecolor = $("#thecolor").val();
        // var thesize = $("#thesize").val();
        // var unit_price = $("#unit_price").val();
        // var buy_num = $("#buy_num").val();
        // var freight = $("#freight").val();
        // alert(shop_name);
        // alert(platform_id);
        // alert(seller_id);
        $.ajax({
            url : admin.url+'merchant_issue_try4/update_fake_activity4',
            data:{act_id:act_id,apply_amount:apply_amount},
            type : 'post',
            cache : false,
            success : function (data){
               console.log(data);
               location.href=admin.url+"merchant_issue_try5?act_id="+act_id;
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }

    function check_apply_amount(){
        if($("#apply_amount").val() == ''){
            $("#apply_amount_error").css("display","inline-block");
        }else{
            $("#apply_amount_error").css("display","none");
        }
    }
</script>
</body>
</html>









