<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>领取下单</title>
    <link rel="stylesheet" href="css/shike/location_title.css">
    <link rel="stylesheet" href="css/shike/modal_alert.css">
    <link rel="stylesheet" href="css/shike/getOrder_stepFive.css">
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
                <img src="images/shike/sk_zjgl_lqxd_bg_jdt5_default.png" alt="">
            </div>
            <!--试用商品-->
            <div class="try_good">
                <h1>5.下单付款</h1>
                <div class="first_step">
                    <h2>第一步：下单前请先确认一下商品信息</h2>
                    <table>
                        <tr>
                            <th>店铺主人旺旺ID</th>
                            <th>商品名</th>
                            <th>单价</th>
                            <th>购买数量</th>
                            <th>规格</th>
                        </tr>
                        <tr>
                            <td><?php echo $orderinfo['sellerwangwang']?></td>
                            <td><?php echo $orderinfo['product_name']?></td>
                            <td><?php echo $orderinfo['unit_price']*$orderinfo['buy_sum'];?></td>
                            <td><?php echo $orderinfo['amount']?></td>
                            <td>每单拍<?php echo $orderinfo['buy_sum']?>件 <?php echo $orderinfo['color']?> <?php echo $orderinfo['size']?></td>
                        </tr>
                    </table>
                    <p class="oneWarning">下单注意事项：</p>
                    <p>下单<b>不得使用信用卡、花呗、余额宝分期、集分宝、天猫积分、淘金币等付款</b>；也不得使用淘宝客等“返利网站”下单付款。</p>
                    <p>请按照任务要求的规格金额拍，禁止乱拍，犯错2次以上直接冻结账号处罚。</p>
                </div>
                <div class="second_step">
                    <h2>第二步：下单付款后填写订单信息</h2>
                    <p class="look">
                        1.请上传订单详情截图：请使用电脑访问淘宝，到“我的淘宝-已买到的宝贝，点击“订单详情”，
                        将此订单的“订单详情”截图，并上传到平台。
                        <a id="second_step" href="javascript:void(0);">查看截图示例</a>
                    </p>
                    <!--示例图片-->
                    <div class="example_images">
                        <p class="title">截图示例：</p>
                        <div class="images">
                            <p>
                                <img src="images/shike/sk_zjgl_lqxd_bg_ddjt_default.png" alt="">
                            </p>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" method="post" action="/shike_get_order5/submit_order5" onsubmit="return check_form()">
                    <p class="uploading">
                        请上传订单详情截图：
                        <a href="javascript:void(0);">
                            <input type="file" id="orderdetail_img" name="orderdetail_img" value="<?php echo $orderinfo['orderdetail_img'];?>" onchange="orderdetail_img_change()">
                            上传文件
                        </a>
                        <span id="orderdetail_img_value">未选择文件</span>
                    </p>
                    <p class="picture_format"><span>图片的格式：gif、jpg、jpeg、png，图片大小不能大于1M。</span></p>
                    <p class="look">2.请填写当前订单信息</p>
                        <label for="order">请填写订单号：</label>
                        <input id="order" name="order" type="text" onblur="check_order()"/>
                        <span id="order_error"></span>
                        <br/>
                        <label for="pay_money">实际付款金额：</label>
                        <input id="pay_money" name="pay_money" type="text" onblur="check_pay_money()"/>
                        <span id="pay_money_error"></span>
                        <br/>
                    <p class="oneWarning">注意事项：</p>
                    <ul>
                        <li>1、严禁转售中奖获得的试用商品，一经发现，直接封号！</li>
                        <li>2、商品没有质量问题，一律不予退换货，尺寸大小问题试客联系商家客服自己承担来回运费！</li>
                        <li>3、商品存在质量问题，一律联系平台客服，平台客服与商家协商。</li>
                        <li>4、下单之后商家将在72小时内操作发货，请耐心等待，不要到旺旺上催商家。</li>
                    </ul>
                </div>
            </div>
            <input type="hidden" name="order_id" value="<?php echo $orderinfo['order_id']?>">
            <p class="step_btn">
                <input  onclick="location.href='shike_get_order4?order_id=<?php echo $orderinfo['order_id']?>'" type="button" value="上一步">
                <input  type="submit" value="确认已付款">
            </p>
            </form>
        </div>
    </div>
</section>
<!--确定已付款弹框-->
<div class="confirm_pay_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/shike/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认审核-->
            <p class="confirm_audit">确定已付款，提交信息？</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
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
        $('#confirm_pay').bind('click',function(){
            $('.confirm_pay_modal').css('display','block');
            disableScroll();
        });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.confirm_pay_modal').css('display','none');
            enableScroll();
        });
    })

    function orderdetail_img_change(){
        $("#orderdetail_img_value").text($("#orderdetail_img").val());
    }

    function check_order(){
        if($("#order").val()==''){
            $("#order_error").text("订单编号不得为空");
        }else{
            $("#order_error").text("");
        }
    }

    function check_pay_money(){
        if($("#pay_money").val()==''){
            $("#pay_money_error").text("付款金额不得为空");
        }else{
            $("#pay_money_error").text("");
        }
    }

    function check_form(){
        if($("#pay_money").val()=='' || $("#order").val()=='' || $("#pay_money").val()==''){
            return false;
        }
        return true;
    }
</script>
</body>
</html>