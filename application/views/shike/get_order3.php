<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>领取下单</title>
    <link rel="stylesheet" href="css/shike/location_title.css">
    <link rel="stylesheet" href="css/shike/getOrder_stepThree.css">
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
                <img src="images/shike/sk_zjgl_lqxd_bg_jdt3_default.png" alt="">
            </div>
            <!--试用商品-->
            <div class="try_good">
                <h1>3.浏览店铺</h1>
                <!--第一步-->
                <div class="first_step">
                    <h2>
                        第一步：如图所示，进入店铺首页。
                    </h2>
                    <img src="images/shike/sk_zjgl_lqxd_bg_jrdp_default.png" alt="">
                    <!--示例图片-->
                </div>
                <!--第二步-->
                <div class="second_step">
                    <h2>
                        第二步：进入店铺首页后，随机点开4个商品，浏览完整个宝贝详情，并将宝贝详情页地址粘贴到以下输入框中：
                    </h2>
                    <p><b>注意：4个宝贝页面地址不可重复，如果搜到的商品少于4个，可填写淘宝其他链接。</b></p>
                    <form action="">
                        <label for="babyOne">宝贝页地址1：</label>
                        <input id="babyOne" type="text" placeholder="将浏览器的商品链接复制粘贴到此处" value="<?php echo $orderinfo['product_url1'];?>" onblur="check_product()">
                        <span id="babyone_error"></span>
                        <br/>
                        <label for="babyTwo">宝贝页地址2：</label>
                        <input id="babyTwo" type="text" placeholder="将浏览器的商品链接复制粘贴到此处" value="<?php echo $orderinfo['product_url2'];?>" onblur="check_product()">
                        <span id="babytwo_error"></span>
                        <br/>
                        <label for="babyThree">宝贝页地址3：</label>
                        <input id="babyThree" type="text" placeholder="将浏览器的商品链接复制粘贴到此处" value="<?php echo $orderinfo['product_url3'];?>" onblur="check_product()">
                        <span id="babythree_error"></span>
                        <br/>
                        <label for="babyFour">宝贝页地址4：</label>
                        <input id="babyFour" type="text" placeholder="将浏览器的商品链接复制粘贴到此处" value="<?php echo $orderinfo['product_url4'];?>" onblur="check_product()">
                        <span id="babyfour_error"></span>
                        <br/>
                    </form>
                    <!--示例图片-->
                </div>
            </div>
            <input type="hidden" id="order_id" name="order_id" value="<?php echo $orderinfo['order_id']?>">
            <p class="step_btn">
                <input  onclick="location.href='shike_get_order2?order_id=<?php echo $orderinfo['order_id']?>'" type="button" value="上一步">
                <input  onclick="next_step()" class="next_step" type="button" value="下一步">
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

    function check_product(){
        //alert($("#babyOne").val());
        if($("#babyOne").val()==''){
            $("#babyone_error").text('商品链接不能为空');
        }else{
            $("#babyone_error").text('');
        }

        if($("#babyTwo").val()==''){
            $("#babytwo_error").text('商品链接不能为空');
        }else{
            $("#babytwo_error").text('');
        }

        if($("#babyThree").val()==''){
            $("#babythree_error").text('商品链接不能为空');
        }else{
            $("#babythree_error").text('');
        }

        if($("#babyFour").val()==''){
            $("#babyfour_error").text('商品链接不能为空');
        }else{
            $("#babyfour_error").text('');
        }
    }

    function next_step(){
        if($("#babyOne").val()=='' || $("#babyTwo").val()=='' || $("#babyThree").val()=='' || $("#babyFour").val()==''){
            return;
        }
        var order_id = $("#order_id").val();
        var babyone = $("#babyOne").val();
        var babytwo = $("#babyTwo").val();
        var babythree = $("#babyThree").val();
        var babyfour = $("#babyFour").val();
        $.ajax({
            url : admin.url+'shike_get_order3/submit_order3',
            data:{product_url1:babyone,product_url2:babytwo,product_url3:babythree,product_url4:babyfour,order_id:order_id},
            type : 'post',
            cache : false,
            success : function (data){
               console.log(data);
               location.href=admin.url+"shike_get_order4?order_id="+order_id;
            },
            error : function (XMLHttpRequest, textStatus){
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }
</script>
</body>
</html>