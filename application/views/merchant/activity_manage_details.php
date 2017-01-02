<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动管理</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/activity_details.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--活动详情-->
    <div class="activity_details">
        <!--所在位置-->
        <div class="location_title">
            <ul>
                <li>你所在的位置：</li>
                <li class="order">
                    <a class="personal_active" href="javascript:void(0);">首页</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a href="/merchant_activity_manage">活动管理</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">活动详情</li>
            </ul>
        </div>
        <!--商品发货状态-->
        <div class="commodity_information">
            <h1>试用信息：</h1>
            <div class="title">
                        <p class="left">
                            <span><?php echo substr($act['gene_time'],0,10);?></span>
                            <span>活动订单号：<?php echo $act['act_id'];?></span>
                        </p>
                    </div>
            <div class="details">
                <ul>
                            <li><img style='width: 80px;height: 80x' src="<?php echo $act['picture_url'];?>" alt=""></li>
                            <li>
                                <p>商品名称：<span><?php echo $act['product_name'];?></span></p>
                                <p>商品分类：<span><?php echo $act['product_classify'];?></span></p>
                                <p>商品规格：<span><?php echo $act['color'];?>.<?php echo $act['size'];?></span></p>
                                <p>商品分类：<span><a href="javascript:void(0);"><?php if($act['product_classify']==1){
                                    echo "女装";
                                }elseif ($act['product_classify']==2) {
                                    echo "男装";
                                }elseif ($act['product_classify']==3) {
                                    echo "鞋包配饰";
                                }elseif ($act['product_classify']==4) {
                                    echo "居家生活";
                                }elseif ($act['product_classify']==5) {
                                    echo "数码电器";
                                }elseif ($act['product_classify']==6) {
                                    echo "母婴儿童";
                                }elseif ($act['product_classify']==7) {
                                    echo "食品酒水";
                                }elseif ($act['product_classify']==8) {
                                    echo "其他";
                                }
                                ?></a></span></p>
                            </li>
                            <li>
                                <p>店铺名称：<span><?php echo $act['shopname'];?></span></p>
                                <p>平台：<span><?php echo ($act['platformid']==1?"淘宝":"天猫");?></span></p>
                                <p><span>通过<?php echo ($act['platformid']==1?"淘宝":"天猫");?>自然搜索</span></p>
                            </li>
                            <li>
                                <p>商品关键词：<span><?php echo $act['t_key_words'];?></span></p>
                                <p>筛选列表：<span><?php echo $act['t_classify1']?>、<?php echo $act['t_classify2']?>、<?php echo $act['t_classify3']?>、<?php echo $act['t_classify4']?>、<?php echo $act['t_classify5']?></span></p>
                                <p>折扣和服务：<span>24小时发货、货到付款</span></p>
                                <p>排列方式：<span><?php 
                            if($act['t_sort']==1){
                                echo "综合排序";
                            }elseif($act['t_sort']==2){
                                echo "销量从高到低";
                            }elseif($act['t_sort']==3){
                                echo "信用从高到低";
                            }
                            ?></span></p>
                            </li>
                            <li>
                                <p>单价：<span><b>&yen;<?php echo $act['unit_price']?></b>每单拍<b><?php echo $act['buy_sum']?></b>件</span></p>
                                <p>试用份数：<b><?php echo $act['apply_amount'];?>份</b></p>
                                <p>发货地：<span><?php echo $act['t_delivery_place'];?></span></p>
                                <p>商品运费：<span><?php if ($act['freight']==0){echo "全国包邮";}else{echo $act['freight']."元";}
                            ?></span></p>
                            </li>
                        </ul>
            </div>
            <h1>订单信息：</h1>
            <table>
                <tr>
                    <th></th>
                    <th>商品单价</th>
                    <th>免单数量</th>
                    <th>备注</th>
                    <th>合计</th>
                </tr>
                <tr>
                    <td>商品押金</td>
                    <td><span><?php echo $act['margin'];?>元</span></td>
                    <td><span>5单</span></td>
                    <td>
                        <p><span>商品押金=商品单价*免单数量</span></p>
                        <p>试用完成后，平台直接将押金返给试客</p>
                    </td>
                    <td><b><?php echo $act['deposit'];?>元</b></td>
                </tr>
                <tr>
                    <td>试用担保金</td>
                    <td><span><?php echo $act['margin'];?>元</span></td>
                    <td><span>5单</span></td>
                    <td>
                        <p><span>试用担保金=商品押金*5%</span></p>
                        <p>试用完成后，平台会自动将试用担保金返回到您的账户可用押金中。</p>
                    </td>
                    <td><b><?php echo ($act['margin'])*5*0.05;?>元</b></td>
                </tr>
            </table>
            <p class="total">订单合计：<span><?php echo $act['total_money'];?>元</span></p>

            <!--状态为1 待付款状态处理流程-->
            <?php if($act['status'] == 1):?>
            <div class="order_status">
                <p>订单状态：<span>待付款</span></p>
                <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
            <!--实际付款-->
            <div class="payment_box">
            <div class="actual_payment">
                <p class="real_payment">实付款：<span>&yen;<?php echo $act['total_money'];?></span></p>
                <p class="deposit">使用押金支付：可用押金：<span>&yen;<?php echo $seller_info['avail_deposit'];?></span></p>
                <p class="explain" id="moneyerror"></p>
                <div class="payment_code">
                    <p>请输入支付密码：</p>
                    <table>
                        <tr>
                            <td><input id="pwd1" type="text"/></td>
                            <td><input id="pwd2" type="text"/></td>
                            <td><input id="pwd3" type="text"/></td>
                            <td><input id="pwd4" type="text"/></td>
                            <td><input id="pwd5" type="text"/></td>
                            <td><input id="pwd6" type="text"/></td>
                        </tr>
                    </table>
                </div>
            </div>
            </div>
            <div class="nextStep_btn">
                <input id="cancel_order" type="button" value="取消订单" />
                <input id="confirm_payment" type="button" value="确认付款" onclick="check_pay()"/>
            </div>
            <?php endif;?>
            <!--状态为2 待发布状态处理流程-->
            <?php if($act['status'] == 2):?>
            <p class="total">已冻结押金：<span><?php echo $act['total_money'];?>元</span></p>
            <div class="order_status">
                <p>订单状态：<span>待发布</span></p>
                <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
            <?php endif;?>
            <!--状态为3 待开奖状态处理流程-->
            <?php if($act['status'] == 3):?>
            <p class="total">已冻结押金：<span><?php echo $act['total_money'];?>元</span></p>
            <div class="order_status">
                <p>订单状态：<span>待开奖</span></p>
                <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
            <?php endif;?>
            <!--状态为4 已开奖状态处理流程-->
            <?php if($act['status'] == 4):?>
            <p class="total">已冻结押金：<span><?php echo $act['total_money'];?>元</span></p>
            <div class="order_status">
                <p>订单状态：<span>已开奖</span></p>
                <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
            <div class="winning_shike">
                <p class="left">中奖试客：</p>
                <div class="left">
                   <table>
                       <tr>
                           <?php foreach ($win_shikes as $v): ?>    
                           <td><?php echo $v['shikename'];?>、</td>
                           <?php endforeach ?>
                       </tr>
                   </table>
                </div>
            </div>
            <p class="try_task">请到<a href="/merchant_order_manage">试用任务</a>中进行查看试客下单领取信息。</p>
            <?php endif;?>
            <!--状态为5 已取消状态处理流程-->
            <?php if($act['status'] == 5):?>
            <div class="order_status">
                <p>订单状态：<span>已取消</span></p>
                <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
            </div>
            <?php endif;?>

        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--弹框--取消订单-->
<div class="cancel_order_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认付款-->
           <p class="confirm_cancel">确认取消订单？</p>
        </div>
        <div class="modal_submit">
            <input type="button" value="确定" onclick="cancel_act()"/>
            <input class="cancel" type="button" value="取消"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<!--确认付款成功弹框-->
<div class="payment_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_right_default.png" alt=""></p>
            <p class="payment_succeed">支付成功！</p>
            <p>请等待客服审核任务审核通过后会上线发布。</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="end_act()"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--确认付款失败弹框-->
<div class="paymentFailure_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_no_default.png" alt=""></p>
            <p class="payment_succeed">支付失败！</p>
            <p style="height:20px;"></p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="end_act()"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html");
//        标题的点击事件
        $('.order').bind('click',function(){
            $(this).find('a').addClass('personal_active');
            $(this).siblings().find('a').removeClass('personal_active');
        });
//          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认付款弹框
        $('#cancel_order').bind('click',function(){
            $('.cancel_order_modal').css('display','block');
            disableScroll();
        });
//        付款成功弹框
//        $('#confirm_payment').bind('click',function(){
//            $('.payment_modal').css('display','block');
//            $('.pay_now_modal').css('display','none');
//            disableScroll();
//        });
//        付款失败弹框
       // $('#confirm_payment').bind('click',function(){
       //  $('.paymentFailure_modal').css('display','block');
       //  disableScroll();
       //  });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.cancel_order_modal,.paymentFailure_modal,.payment_modal').css('display','none');
            enableScroll();
        });
    })
    function check_pay(){

        var avail = <?php echo $seller_info['avail_deposit'];?>;
        var need_pay = <?php echo $act['margin']*5*1.05;?>;
        var act_id = "<?php echo $act['act_id'] ?>";
        if (avail < need_pay){
            $("#moneyerror").text("可用押金不足，请先充值押金，然后在试用活动-待付款活动中进行支付");
            return;
        }
        var pwd1=$("#pwd1").val();
        var pwd2=$("#pwd2").val();
        var pwd3=$("#pwd3").val();
        var pwd4=$("#pwd4").val();
        var pwd5=$("#pwd5").val();
        var pwd6=$("#pwd6").val();
        if( pwd1 == '' || pwd2 == '' || pwd3 == '' ||pwd4 == '' ||pwd5 == '' ||pwd6 == ''){
            return;
        }
        pwd = pwd1;
        pwd += pwd2;
        pwd += pwd3;
        pwd += pwd4;
        pwd += pwd5;
        pwd += pwd6;

        $.ajax({
            url : admin.url+'merchant_issue_try5/check_pay',
            data:{pwd:pwd,avail:avail,need_pay:need_pay,act_id:act_id},
            type : 'post',
            cache : false,
            success : function (result){
                if(result == "1"){
                    $('.payment_modal').css('display','block');
                }else{
                    $('.paymentFailure_modal').css('display','block');
                }
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }
    function end_act(){
        location.href=admin.url+"merchant_activity_manage";
    }
    function cancel_act(){
        var act_id = "<?php echo $act['act_id'] ?>";
        $.ajax({
            url : admin.url+'merchant_issue_try5/cancel_act',
            data:{act_id:act_id},
            type : 'post',
            cache : false,
            success : function (result){
                location.href=admin.url+"merchant_activity_manage";
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









