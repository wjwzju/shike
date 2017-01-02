<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>试用订单管理</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <!--<link rel="stylesheet" href="../../css/reset_content.css">-->
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/order_details.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--订单详情-->
    <div class="order_details">
        <!--所在位置-->
        <div class="location_title">
            <ul>
                <li>你所在的位置：</li>
                <li class="order">
                    <a class="personal_active" href="/merchant_personal">个人中心</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a href="/merchant_order_manage">试用订单管理</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">订单详情</li>
            </ul>
        </div>
        <!--商品发货状态-->
        <div class="commodity_information">
            <h1>试用信息：</h1>
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
                    </li>
                    <li>
                        <p>店铺名称：<span><?php echo $order['shopname'];?></span></p>
                        <p>平台：<span><?php  echo ($order['platform_id']==1 ? '淘宝':'天猫');?></span></p>
                        <p>单价：<span><b>&yen;<?php echo $order['unit_price'];?></b>每单拍<b><?php echo $order['buy_sum'];?></b>个</span></p>
                    </li>
                    <li>
                        <p>试客：<span><?php echo $order['shikename'];?></span></p>
                    </li>
                </ul>
            </div>
            <h1>申请信息：</h1>
            <!--状态为8 已取消状态处理流程-->
            <?php if($order['status'] == 8):?>
                <div class="application_information">
                    <p class="no_information">暂无申请信息</p>
                </div>
                <!--订单状态-->
                <div class="order_status">
                    <p>订单状态：<span>超时已取消</span></p>
                    <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
                </div>
            <!--状态为4 待领取状态处理流程-->
            <?php elseif($order['status'] == 4):?>
                <div class="application_information">
                    <p class="no_information">暂无申请信息</p>
                </div>
                <!--订单状态-->
                <div class="order_status">
                    <p>订单状态：<span>待领取</span></p>
                    <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
                </div>
            <!--除状态8和状态4外均有申请信息的详细信息-->
            <?php else:?>
                <p class="collapse"></p>
                <!--申请信息-->
                <div class="application_information">
                    <!--收藏宝贝与店铺-->
                    <div class="content">
                        <p class="application_title">收藏宝贝与店铺</p>
                        <div class="screenshot">
                            <div class="left collect">
                                <p>宝贝收藏截图：</p>
                                <div class="picture">
                                    <img src="<?php echo $order['product_saveimg'];?>" alt="">
                                </div>
                            </div>
                            <div class="left collect">
                                <p>店铺收藏截图</p>
                                <div class="picture">
                                    <img src="<?php echo $order['shop_saveimg'];?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--浏览店铺-->
                    <div class="content">
                        <p class="application_title">浏览店铺</p>
                        <div class="browse_shop">
                            <p class="baby_url">宝贝链接1：<?php echo $order['product_url1'];?></p>
                            <p class="baby_url">宝贝链接2：<?php echo $order['product_url2'];?></p>
                            <p class="baby_url">宝贝链接3：<?php echo $order['product_url3'];?></p>
                            <p class="baby_url">宝贝链接4：<?php echo $order['product_url4'];?></p>
                        </div>
                    </div>
                    <!--客服聊天-->
                    <div class="content">
                        <p class="application_title">客服聊天</p>
                        <div class="serviceChat">
                            <div class="left collect">
                                <div class="picture">
                                    <img src="<?php echo $order['chatlog_img'];?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--淘宝订单-->
                    <div class="content">
                        <p class="application_title">淘宝订单</p>
                        <div class="taobao_order">
                            <p><span>订单号：<?php echo $order['outer_orderid'];?></span><span>实际付款金额：&yen;<?php echo $order['real_paymoney'];?></span></p>
                            <div>
                                <img src="<?php echo $order['orderdetail_img'];?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <!--当为状态2 3 5 7时 出现评价信息的详细信息-->
            <?php if($order['status'] == 2 || $order['status'] == 3 || $order['status'] == 5 || $order['status'] == 7):?>

                <!--评价信息-->
                <h1>评价信息</h1>
                <p class="collapse_evaluate"></p>
                <div class="evaluate_information">
                    <!--评价内容-->
                    <div class="content">
                        <p class="application_title">评价内容</p>
                        <div class="evaluate_content">
                          <p>
                              <?php echo $order['comment_detail'];?>
                          </p>
                        </div>
                    </div>
                    <!--晒单照片-->
                    <div class="content">
                        <p class="application_title">晒单照片</p>
                        <div class="show_picture">
                            <ul>
                                <li><img src="<?php echo $order['shaidan1_img'];?>" alt=""></li>
                                <li><img src="<?php echo $order['shaidan2_img'];?>" alt=""></li>
                                <li><img src="<?php echo $order['shaidan3_img'];?>" alt=""></li>
                                <li><img src="<?php echo $order['shaidan4_img'];?>" alt=""></li>
                                <li><img src="<?php echo $order['shaidan5_img'];?>" alt=""></li>
                            </ul>
                        </div>
                    </div>
                <?php if($order['status'] == 3 || $order['status'] == 7):?>
                    <!--淘宝评价截图-->
                    <div class="content">
                        <p class="application_title">淘宝评价截图</p>
                        <div class="taobao_evaluate">
                            <img src="<?php echo $order['comment_img'];?>" alt="">
                        </div>
                    </div>
                <?php endif;?>
                </div>
            <?php endif;?>
            <?php if($order['status'] == 7):?>
                <!--返款信息-->
                <h1 class="quidco">返款信息</h1>
                <div class="quidco_information">
                    <table>
                        <tr>
                            <th>返款时间</th>
                            <th>实际付款金额</th>
                            <th>运费</th>
                            <th>返款金额</th>
                            <th>试客</th>
                        </tr>
                        <tr>
                            <td><?php echo substr($order['time'],0,10);?></td>
                            <td>&yen;<?php echo $order['real_paymoney'];?></td>
                            <td><?php if ($order['freight']==0){echo "全国包邮";}else{echo $order['freight'].'元';}
                            ?></td>
                            <td>&yen;<?php echo $order['real_paymoney']-$order['freight'];?></td>
                            <td><?php echo $order['shikename'];?></td>
                        </tr>
                    </table>
                </div>
            <?php endif;?>

            <?php if($order['status'] == 1):?>
                <div class="order_status">
                    <p>订单状态：<span>待发货</span></p>
                    <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
                </div>
                <!--确认发货按钮-->
                <div class="btn">
                    <input id="delivery" onclick="show_deliver_modal(<?php echo $order['order_id'];?>)" type="button" value="确认发货"/>
                </div>
            <?php elseif($order['status'] == 2):?>
                <!--订单状态-->
                <div class="order_status">
                    <p>订单状态：<span>待审核评价</span></p>
                    <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
                </div>
                <!--审核通过按钮-->
                <div class="btn">
                    <input id="audit" onclick="show_audit_modal(<?php echo $order['order_id'];?>)" type="button" value="审核通过"/>
                </div>
            <?php elseif($order['status'] == 3):?>
                <!--订单状态-->
                <div class="order_status">
                    <p>订单状态：<span>待确认评价</span></p>
                    <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
                </div>
                <!--确认评价按钮-->
                <div class="btn">
                    <input id="confirm_pass" onclick="show_pass_modal(<?php echo $order['order_id'];?>)" type="button" value="确认通过"/>
                </div>
            <?php elseif($order['status'] == 5):?>
                <!--订单状态-->
                <div class="order_status">
                    <p>订单状态：<span>待复制评价</span></p>
                    <p>运单号：<b>123456789</b></p>
                    <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
                </div>
            <?php elseif($order['status'] == 6):?>
                <!--订单状态-->
                <div class="order_status">
                    <p>订单状态：<span>待收货</span></p>
                    <p>物流公司：<b><?php echo $order['wuliu'];?></b></p>
                    <p>运单号：<b><?php echo $order['yundan'];?></b></p>
                    <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
                </div>
            <?php elseif($order['status'] == 7):?>
                <!--订单状态-->
                <div class="order_status">
                    <p>订单状态：<span>已完成</span></p>
                    <p>联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')"></p>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
<input type="hidden" id="hidden_orderid">
<footer id="footer"></footer>
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
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html");

        $('.collapse').bind('click',function(){
            $('.application_information').slideToggle(500);
            $(this).toggleClass('collapse_active');
        });

        $('.collapse_evaluate').bind('click',function(){
            $('.evaluate_information').slideToggle(500);
            $(this).toggleClass('collapse_active');
        });
// //        确认发货
//         $('#delivery').bind('click',function(){
//             $('.delivery_modal').css('display','block');
//             disableScroll();
//         });
// //        确认审核通过
//         $('#audit').bind('click',function(){
//             $('.audit_modal').css('display','block');
//             disableScroll();
//         });
// //        确认通过
//         $('#confirm_pass').bind('click',function(){
//             $('.pass_modal').css('display','block');
//             disableScroll();
//         });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.delivery_modal,.audit_modal,.pass_modal').css('display','none');
            enableScroll();
        });

    })

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
                // alert("确认发货成功");
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
                // alert("确认审核成功");
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
                // alert("确认通过成功");
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
</script>
</body>
</html>









