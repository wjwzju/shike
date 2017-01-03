<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>初步评价</title>
    <link rel="stylesheet" href="css/shike/location_title.css">
    <link rel="stylesheet" href="css/shike/modal_alert.css">
    <link rel="stylesheet" href="css/shike/preliminary_evaluation.css">
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
                <li><a href="/shike_try_winningManage">试用管理</a></li>
                <li><img src="images/shike/icon_arrow_default.png" alt=""></li>
                <li>领取下单</li>
            </ul>
        </div>
            <!--初步评价-->
        <div class="evaluate_content">
            <h1>初步评价</h1>
            <!--商品信息-->
            <div class="good_information">
                <div class="title">
                    <p class="left">
                        <span><?php echo substr($order['time'],0,10);?></span>
                        <span>活动订单号：<?php echo $order['order_id'];?></span>
                    </p>
                </div>
                <div class="details">
                    <ul>
                        <li><img style="width:120px;height:80px" src="<?php echo $order['product_img'];?>" alt=""></li>
                    <li>
                        <p>商品名称：<span><?php echo $order['product_name'];?></span></p>
                        <p>商品分类：<span><?php if($order['product_classify']==1){
                                    echo "女装";
                                }elseif ($order['product_classify']==2) {
                                    echo "男装";
                                }elseif ($order['product_classify']==3) {
                                    echo "鞋包配饰";
                                }elseif ($order['product_classify']==4) {
                                    echo "居家生活";
                                }elseif ($order['product_classify']==5) {
                                    echo "数码电器";
                                }elseif ($order['product_classify']==6) {
                                    echo "母婴儿童";
                                }elseif ($order['product_classify']==7) {
                                    echo "食品酒水";
                                }elseif ($order['product_classify']==8) {
                                    echo "其他";
                                }
                                ?></span></p>
                        <p>商品规格：<span><?php echo $order['color'];?>.<?php echo $order['size'];?></span></p>
                        <p>商品链接：<span><a href="<?php echo $order['product_link'];?>"><?php echo $order['product_link'];?></a></span></p>
                    </li>
                    <li>
                        <p>店铺名称：<span><?php echo $order['shopname'];?></span></p>
                        <p>平台：<span><?php  echo ($order['platform_id']==1 ? '淘宝':'天猫');?></span></p>
                        <p>单价：<span><b>&yen;<?php echo $order['unit_price'];?></b>每单拍<b><?php echo $order['buy_sum'];?></b>个</span></p>
                        <p>商品运费：<span><?php if ($order['freight']==0){echo "全国包邮";}else{echo $order['freight'].'元';}
                            ?></span></p>
                    </li>
                    </ul>
                </div>
            </div>
            <!--评价注意事项-->
            <div class="evaluate_notice">
                <h2>评价注意事项：</h2>
                <p>1、收到商品后，请先不要在淘宝上进行评价，<b>先在平台进行初步评价，商家确认过后再去淘宝评价</b>；</p>
                <p>2、请在平台中独自编写评价内容并提交好评，<b>照片必传（5张）</b>，上传的照片到时需要和淘宝评价中上传的五张照片一样，</p>
                <p> &nbsp;&nbsp; &nbsp; 照片可以为包装照、商品正面、背面照、细节照等；图片尺寸建议1027*768以内，格式支持jpg、png。；</p>
                <p>3、好评内容<b>严禁复制、抄袭、拼凑他人评价，一经发现，直接冻结平台账号</b>！</p>
                <p>4、评价内容<b>不能包含“刷单”、“试用”、“团购”、“免费送”</b>等关键词。</p>
            </div>
            <!--好评内容-->
            <form name="form1" id="form1" enctype="multipart/form-data" method="post" action="/shike_preliminary_evaluation/submit_comment" >
            <div class="good_reputation">
                <p class="left">好评内容：</p>
                <textarea id="comment_detail" name="comment_detail" form="form1" class="left" style="resize:none;" name="" autofocus></textarea>
                <span id="evaluate_error"></span>
            </div>
            <!--商品图片-->
            <div class="good_picture">
                <label for="good_picture">商品图片：</label>
                <a href="javascript:void(0);">
                    <input id="shaidan1_img" name="shaidan1_img" type="file">
                    <img src="images/shike/sk_zjgl_lqxd_icon_jiahao_default.png" alt="">
                </a>
                <a href="javascript:void(0);">
                    <input type="file" id="shaidan2_img" name="shaidan2_img">
                    <img src="images/shike/sk_zjgl_lqxd_icon_jiahao_default.png" alt="">
                </a>
                <a href="javascript:void(0);">
                    <input type="file" id="shaidan3_img" name="shaidan3_img">
                    <img src="images/shike/sk_zjgl_lqxd_icon_jiahao_default.png" alt="">
                </a>
                <a href="javascript:void(0);">
                    <input type="file" id="shaidan4_img" name="shaidan4_img">
                    <img src="images/shike/sk_zjgl_lqxd_icon_jiahao_default.png" alt="">
                </a>
                <a href="javascript:void(0);">
                    <input type="file" id="shaidan5_img" name="shaidan5_img">
                    <img src="images/shike/sk_zjgl_lqxd_icon_jiahao_default.png" alt="">
                </a>
                <span id="pictureerror"></span>
                <p>初步评价之后，商家将在48小时内审核评价，请耐心等待。</p>
                <p>请按要求进行好评晒单，否则平台会冻结您的账户且试用本金将不予提现。</p>
            </div>
            <input type="hidden" name="order_id" value="<?php echo $order['order_id'];?>">
            <p class="step_btn">
                <input id="confirm_submit" class="next_step" type="button" value="确认初步评价" onclick="check_type()">
            </p>
            </form>
        </div>
    </div>
</section>
<div id="footer"></div>
<!--确定已付款弹框-->
<div class="confirm_submit_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/shike/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认审核-->
            <p class="confirm_audit">确定提交初步评价？</p>
        </div>
        <div class="modal_submit">
            <input class="" type="button" value="确定" onclick="submit_form1();"/>
            <input class="confirm" type="button" value="取消"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<script src="js/shike/jquery-1.10.2.js"></script>
<script src="js/shike/modal_scrollbar.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");

        $('#second_step').bind('click',function(){
            $('.second_step .example_images').slideToggle();
        })
        //          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认审核
        // $('#confirm_submit').bind('click',function(){
        //     $('.confirm_submit_modal').css('display','block');
        //     disableScroll();
        // });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.confirm_submit_modal').css('display','none');
            enableScroll();
        });
    })

    function check_type(){

        if($("#comment_detail").val().length < 15){
            $("#evaluate_error").text("好评内容不能少于15个字");
            return;
        }

        if($("#shaidan1_img").val()=='' || $("#shaidan2_img").val()=='' || $("#shaidan3_img").val()=='' || $("#shaidan4_img").val()=='' || $("#shaidan5_img").val()==''){
            $("#evaluate_error").text("");
            $("#pictureerror").text("请上传5张商品图片");
            return;
        } 
        $('.confirm_submit_modal').css('display','block');
    }

    function submit_form1(){
        if($("#shaidan1_img").val()=='' || $("#shaidan2_img").val()=='' || $("#shaidan3_img").val()=='' || $("#shaidan4_img").val()=='' || $("#shaidan5_img").val()=='' || $("#comment_detail").val()==''){
            return;
        }
        $('#form1').submit();
    }
</script>
</body>
</html>