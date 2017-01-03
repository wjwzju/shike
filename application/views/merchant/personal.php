<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/personal_center.css">
    <link rel="stylesheet" href="css/merchant/order_manage.css">
</head>
<body>
<!-- <header id="header"></header> -->
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧个人中心-->
        <div class="content left">
            <!--会员信息及试用押金说明-->
            <div class="member_power">
                <!--个人信息-->
                <div class="left personal_details">
                    <div class="left  avatar">
                        <img src="images/merchant/sj_grzx_icon_touxiang_default.png" alt="">
                    </div>
                    <div class="left username">
                        <h1><?php echo $sellerinfo['user_name']?></h1>
                        <p>会员等级：<span><?php  echo ($sellerinfo['level']==1 ? '试用会员':'正式会员');?></span><?php if($sellerinfo['level'] != 1):?><b><?php echo substr($sellerinfo['end_time'],0,10);?>到期</b><?php endif;?></p>
                        <input type="button" value=<?php  echo ($sellerinfo['level']==1 ? '购买正式会员':'续费');?> onclick="window.open('/merchant_member_recharge')"/>
                    </div>
                </div>
                <!--试用任务-->
                <div class="left try_task">
                    <div class="try_monery">
                        <input type="button" value="发布试用任务" onclick="window.open('/merchant_issue_try')"/>
                        可用押金：<span><?php echo $sellerinfo['avail_deposit']?></span>元
                        <a href="/merchant_deposit_recharge">充值押金</a>
                        冻结押金：<span><?php echo $sellerinfo['freeze_deposit']?></span>元
                    </div>
                    <p>
                        押&nbsp; &nbsp;&nbsp; &nbsp;金：可用来支付平台一切费用，可提现。
                    </p>
                    <p>
                        冻结押金：试用任务中支付的押金和保证金费用，试用任务结束，押金打给试客，保证金返还到银行卡上。
                    </p>
                </div>
            </div>
            <!--任务说明-->
            <div class="task_specification">
                <h1>
                    <span>任务进展</span>
                    下方如有提示请点击操作，超过48小时未操作，平台自动确认。
                </h1>
                <!--所有订单的状态种类-->
                <div class="order_status">
                    <ul>
                        <li class="order"><a <?php if(!$order_status):?>class="personal_active" <?php endif;?> href="/merchant_personal?order_status=0">所有订单（<span><?php echo $sum_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 1):?>class="personal_active" <?php endif;?> href="/merchant_personal?order_status=1">待发货订单（<span><?php echo $sum_1_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 2):?>class="personal_active" <?php endif;?> href="/merchant_personal?order_status=2">待审核评价订单（<span><?php echo $sum_2_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 3):?>class="personal_active" <?php endif;?> href="/merchant_personal?order_status=3">待确认评价订单（<span><?php echo $sum_3_order_list['count'];?></span>）</a></li>
                    </ul>
                </div>
                <!--商品发货状态-->
                <?php $order_list_count=-1;?>
                <?php foreach($order_list as $v):?>
                    <?php $order_list_count++;?>
                    <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span><?php echo substr($v['time'],0,10);?></span>
                            <span>任务编号：<?php echo $v['order_id'];?></span>
                            <span>淘宝商品订单号：<?php echo $v['out_sorderid']?></span>
                        </p>
                        <p class="right">
                            <a href="/merchant_order_details?order_id=<?php echo $v['order_id'];?>">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="images/merchant/order/order_<?php echo $v['order_id'];?>.png" alt=""></li>
                            <li>
                                <p class="clothes_name"><?php echo $v['product_name'];?>
                                <p class="two"><span>店铺：</span><?php echo $v['shopname'];?></p>
                                <p><span>来源：</span><?php  echo ($v['platform_id']==1 ? '淘宝':'天猫');?></p>
                            </li>
                            <li>
                                <p><span>试客：</span><?php echo $v['shikename'];?></p>
                            </li>

                            <?php if($v['status'] == 1):?>
                            <li>
                                <p>待发货</p>
                            </li>
                            <li>
                                <p class="status" id="delivery" onclick="show_deliver_modal(<?php echo $v['order_id'];?>)"><input type="button" value="确认发货"/></p>
                                <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p>
                            </li>
                            <?php endif;?>

                            <?php if($v['status'] == 2):?>
                                 <li>
                                <p>待审核</p>
                            </li>
                            <li>
                                <p class="status" id="audit" onclick="show_audit_modal(<?php echo $v['order_id'];?>)"><input type="button" value="确认审核"/></p>
                                <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p>
                            </li>
                            <?php endif;?>

                            <?php if($v['status'] == 3):?>
                                <li>
                                <p>待确认评价</p>
                            </li>
                            <li>
                                <p class="status" id="pass" onclick="show_pass_modal(<?php echo $v['order_id'];?>)"><input type="button" value="确认评价"/></p>
                                <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p>
                            </li>
                            <?php endif;?>
                             <?php if($v['status'] == 4):?>
                            <li>
                                <p>待领取</p>
                            </li>
                            <li>
                                <p class="status">试用待领取</p>
                                <p>
                                <span>联系客服QQ:</span>
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a>
                                </p>
                                <!-- <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p> -->
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 5):?>
                            <li>
                                <p>待复制评价</p>
                            </li>
                            <li>
                                <p class="status" >待试客复制发布评价</p>
                                <p>
                                <span>联系客服QQ:</span>
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a>
                                </p>
                                <!-- <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p> -->
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 6):?>
                            <li>
                                <p>待收货评价</p>
                            </li>
                            <li>
                                <p class="status" >试用待试客收货评价</p>
                                <p>
                                <span>联系客服QQ:</span>
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a>
                                </p>
                                <!-- <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p> -->
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 7):?>
                            <li>
                                <p>已完成</p>
                            </li>
                            <li>
                                <p class="status finish" >试用已结束</p>
                                <!-- <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p> -->
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 8):?>
                            <li>
                                <p>已取消</p>
                            </li>
                            <li>
                                <p class="status">试用已取消</p>
                                <p>
                                <span>联系客服QQ:</span>
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a>
                                </p>
                               <!--  <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p> -->
                            </li>
                            <?php endif;?>
                            <input type="hidden" id="order_list_id_<?php echo $order_list_count;?>" value="<?php echo $v['order_id'];?>">
                            <input type="hidden" id="order_list_time_<?php echo $order_list_count;?>" value="<?php echo strtotime($v['time']);?>">
                        </ul>
                    </div>
                </div>
                <?php endforeach ?>
                <div class="see_more">
                    <input onclick="location.href='/merchant_order_manage'" type="button"/>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="hidden_orderid">
<!-- <footer id="footer"></footer> -->
<!--弹框--确认发货-->
<div class="delivery_modal ">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>确认发货</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认发货-->
            <div class="confirm_delivery" action="">
                <label for="logistics">物&nbsp; &nbsp;流</label>
                <input id="logistics" type="text"/>
                <p><span>物流不能为空</span></p>
                <label for="waybill_number">运单号</label>
                <input id="waybill_number" type="text"/>
                <p><span></span></p>
            </div>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="post_yundan()">
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--弹框--确认审核-->
<div class="audit_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>确认审核</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认审核-->
           <p class="confirm_audit">确认审核通过</p>
        </div>
        <div class="modal_submit">
            <input type="button" value="确定通过" onclick="post_shenhe()"/>
            <input class="confirm" type="button" value="取消"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--弹框--确认通过-->
<div class="pass_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>确认通过</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认审核-->
            <p class="confirm_audit">确认通过</p>
        </div>
        <div class="modal_submit">
            <input type="button" value="确定通过" onclick="post_tongguo()"/>
            <input class="confirm" type="button" value="取消"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script src="js/ydcountdown.js"></script>
<script>
    $(function(){
        var order_list_count = <?php echo count($order_list);?>;
        for(var i=0;i<order_list_count;i++){
            var timestamp = $("#order_list_time_"+i).val();
            var now ="<?php echo time();?>";
            var order_id = $("#order_list_id_"+i).val();
            var obj = $("#lefttime_"+order_id);
            leftseconds = parseInt(timestamp)+ 3600*48 - parseInt(now);
            console.log(leftseconds);
            //console.log(obj);
            ydcountdown(leftseconds,obj);
        }
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
//        确认发货
        // $('#delivery').bind('click',function(){
        //     $('.delivery_modal').css('display','block');

        //     disableScroll();
        // });
//        确认审核
        // $('#audit').bind('click',function(){
        //     $('.audit_modal').css('display','block');
        //     disableScroll();
        // });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.delivery_modal,.audit_modal,.pass_modal').css('display','none');
            // enableScroll();
        });
    })
</script>
<script>
    function post_yundan(){
        var wuliu = $("#logistics").val();
        var yundan = $("#waybill_number").val();
        var order_id = $("#hidden_orderid").val();
        $.ajax({
        url : admin.url+'merchant_personal/update_confirm_ship',
        data:{wuliu:wuliu,yundan:yundan,order_id:order_id},
        type : 'post',
        cache : false,
        success : function (data){
            console.log(data);
            if(data == 'true'){
                alert("确认发货成功");
                location.reload();
            }
            else{
                alert("确认发货失败");
            }
        },
        error : function (XMLHttpRequest, textStatus){
            alert(2);
        }
    })
    }

    function post_shenhe(){
        var order_id = $("#hidden_orderid").val();
        $.ajax({
        url : admin.url+'merchant_personal/update_shenhe',
        data:{order_id:order_id},
        type : 'post',
        cache : false,
        success : function (data){
            console.log(data);
            if(data == 'true'){
                alert("确认审核成功");
                location.reload();
            }
            else{
                alert("确认审核失败");
            }
        },
        error : function (XMLHttpRequest, textStatus){
            alert(2);
        }
    })
    }
    
    function post_tongguo(){
        var order_id = $("#hidden_orderid").val();
        $.ajax({
        url : admin.url+'merchant_personal/tongguo_shenhe',
        data:{order_id:order_id},
        type : 'post',
        cache : false,
        success : function (data){
            console.log(data);
            if(data == 'true'){
                alert("确认通过成功");
                location.reload();
            }
            else{
                alert("确认通过失败");
            }
        },
        error : function (XMLHttpRequest, textStatus){
            alert(2);
        }
    })
    }

    function show_deliver_modal(o){
        $('.delivery_modal').css('display','block');
        // disableScroll();
        $('#hidden_orderid').val(o);
    }

    function show_audit_modal(o){
        $('.audit_modal').css('display','block');
        // disableScroll();
        $('#hidden_orderid').val(o);
    }
    function show_pass_modal(o){
        $('.pass_modal').css('display','block');
        // disableScroll();
        $('#hidden_orderid').val(o);
    }
    // function post_yundan(){
    //     var wuliu = $("#logistics").val();
    //     var yundan = $("#waybill_number").val();
    //     var order_id = $("#hidden_orderid").val();
    //     $.ajax({
    //     url : admin.url+'merchant_personal/update_confirm_ship',
    //     data:{wuliu:wuliu,yundan:yundan,order_id:order_id},
    //     type : 'post',
    //     cache : false,
    //     success : function (data){
    //         console.log(data);
    //         if(data == 'true'){
    //             alert("确认发货成功");
    //             location.reload();
    //         }
    //         else{
    //             alert("确认发货失败");
    //         }
    //     },
    //     error : function (XMLHttpRequest, textStatus){
    //         alert(2);
    //     }
    // })
    // }
</script>
</body>
</html>









