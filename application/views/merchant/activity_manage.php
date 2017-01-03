<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动管理</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/activity_manage.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧活动中心-->
        <div class="content left">
            <div class="activity_manage">
                <h1 class="title">活动管理</h1>
                <!--所有订单的状态种类-->
                <div class="order_status">
                    <ul>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=0">所有活动（<span><?php echo $sum_activity_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 1):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=1">待付款活动（<span><?php echo $sum_1_activity_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 2):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=2">待发布活动（<span><?php echo $sum_2_activity_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if($order_status == 3):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=3">待开奖活动（<span><?php echo $sum_3_activity_list['count'];?></span>）</a></li>
                        <li class="order"><a <?php if($order_status == 4):?> class="personal_active" <?php endif;?> href="/merchant_activity_manage?order_status=4">已开奖活动（<span><?php echo $sum_4_activity_list['count'];?></span>）</a></li>
                    </ul>
                </div>
                <!--商品发货状态-->
                <?php $activity_list_count=-1;?>
                <?php foreach($activity_list as $v):?>
                <?php $activity_list_count++;?>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span><?php echo substr($v['gene_time'],0,10);?></span>
                            <span>活动编号：<?php echo $v['act_id'];?></span>
                        </p>
                        <p class="right">
                            <a href="/merchant_activity_details?act_id=<?php echo $v['act_id'];?>">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img style="width:120px;height:80px" src="<?php echo $v['picture_url'];?>" alt=""></li>
                            <li>
                                <p>商品名称：<span><?php echo $v['product_name'];?></span></p>
                                <p>店铺名称：<span><?php echo $v['shopname'];?></span></p>
                                <p>商品来源：<span><?php echo ($v['platformid']==1?"淘宝":"天猫");?></span></p>
                                <p>商品分类：<span>
                                <?php if($v['product_classify']==1){
                                    echo "女装";
                                }elseif ($v['product_classify']==2) {
                                    echo "男装";
                                }elseif ($v['product_classify']==3) {
                                    echo "鞋包配饰";
                                }elseif ($v['product_classify']==4) {
                                    echo "居家生活";
                                }elseif ($v['product_classify']==5) {
                                    echo "数码电器";
                                }elseif ($v['product_classify']==6) {
                                    echo "母婴儿童";
                                }elseif ($v['product_classify']==7) {
                                    echo "食品酒水";
                                }elseif ($v['product_classify']==8) {
                                    echo "其他";
                                }
                                ?>

                                ，每单拍<?php echo $v['buy_sum'];?>个</span></p>
                            </li>
                            <li>
                                <p>商品押金：<span><?php echo $v['deposit'];?>元</span></p>
                                <p>试用担保金：<span><?php echo $v['guarantee'];?>元</span></p>
                                <p>商品运费：<span><?php echo $v['freight'];?>元</span></p>
                                <p>订单合计：<span><?php echo $v['total_money'];?>元</span></p>
                            </li>                            
                            <?php if($v['status'] == 1):?>
                            <li>
                                <p><span>待付款</span></p>
                            </li>
                            <li>
                                <p class="status">
                                    <span>
                                        <input id="pay_now" type="button" value="立即付款" onclick="get_actid(<?php echo $v['act_id'];?>)" />
                                    </span>
                                </p>
                                <p><span id="lefttime_<?php echo $v['act_id'];?>"></span></p>
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 2):?>
                            <li>
                                <p><span>待发布</span></p>
                            </li>
                            <li>
                                <p class="status"><span>试用活动正在审核中</span></p>
                                <p>联系客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                                <p><span id="lefttime_<?php echo $v['act_id'];?>"></span></p>
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 3):?>
                            <li>
                                <p><span>待开奖</span></p>
                            </li>
                            <li>
                                <p class="status"><span>试用活动待开奖</span></p>
                                <p>联系客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                                <p><span id="lefttime_<?php echo $v['act_id'];?>"></span></p>
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 4):?>
                            <li>
                                <p><span>已开奖</span></p>
                            </li>
                            <li>
                                <p class="status"><span>试用活动已开奖</span></p>
                                <p>联系客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                            </li>
                            <?php endif;?>
                            <?php if($v['status'] == 5):?>
                            <li>
                                <p><span>已取消</span></p>
                            </li>
                            <li>
                                <p class="status"><span>试用活动已取消</span></p>
                                <p>联系客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes"><img src="images/merchant/sj_grzx_icon_qq_default.png" alt=""></a></p>
                            </li>
                            <?php endif;?>
                            <input type="hidden" id="activity_list_id_<?php echo $activity_list_count;?>" value="<?php echo $v['act_id'];?>">
                            <input type="hidden" id="activity_list_time_<?php echo $activity_list_count;?>" value="<?php echo strtotime($v['gene_time']);?>">
                        </ul>
                    </div>
                </div>
                <?php endforeach ?>
                <?php echo $pagin; ?>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<input type="hidden" id="hidden_actid">
<!--弹框--确认发货-->
<div class="pay_now_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认付款-->
           <p>请输入支付密码</p>
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
        <div class="modal_submit">
            <input id="confirm_payment"type="button" value="确定" onclick="check_pay()"/>
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
        var activity_list_count = <?php echo count($activity_list);?>;
        for(var i=0;i<activity_list_count;i++){
            var timestamp = $("#activity_list_time_"+i).val();
            var now ="<?php echo time();?>";
            var order_id = $("#activity_list_id_"+i).val();
            var obj = $("#lefttime_"+order_id);
            leftseconds = parseInt(timestamp)+ 3600*48 - parseInt(now);
            console.log(leftseconds);
            //console.log(obj);
            ydcountdown(leftseconds,obj);
        }

        $('#header').load("../common/merchant_header.html");
        $('#footer').load("../common/footer.html");
        $('#left_nav').load("../common/left_nav.html");
//        标题的点击事件
        $('.order').bind('click',function(){
            $(this).find('a').addClass('personal_active');
            $(this).siblings().find('a').removeClass('personal_active');
        });
//          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认付款弹框
        // $('#pay_now').bind('click',function(){
        //     $('.pay_now_modal').css('display','block');
        //     disableScroll();
        // });
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
            $('.pay_now_modal,.paymentFailure_modal,.payment_modal').css('display','none');
            enableScroll();
        });
    })
</script>
<script>
    function ydcountdown(s,obj){
    // console.log(s);
    //console.log(obj);
    var remain_seconds = s;
    remain_seconds = remain_seconds%(3600*24);
    var hour = parseInt(remain_seconds/3600);
    hour = (hour<10?'0'+hour:hour);
    var minutes = parseInt(remain_seconds%3600/60);
    minutes = (minutes<10?'0'+minutes:minutes);
    var seconds = parseInt(remain_seconds%60);
    seconds = (seconds<10)?'0'+seconds:seconds;
    if(s<0){
        return;
    }
    // console.log(s);
    // console.log(obj);
    var timestring = '还剩'+hour+'小时'+minutes+'分'+seconds+'秒';
    var objid = obj.attr('id');
    if(!objid){
        return;
    }
    obj.text(timestring);
    //console.log(objid);
    //console.log(typeof objid);
    var act_id = objid.substring(9);
    //console.log(objid.substring(9));
    if(s == 0){
        $.ajax({
        url : admin.url+'merchant_activity_manage/cancle_activity',
        type : 'POST',
        dataType: "json",
        cache : false,
        timeout : 20000,
        data : {actid:act_id},
        success : function (result){
            // console.log(result);
            window.location.reload();
        },
        error : function (XMLHttpRequest, textStatus){
            console.log(XMLHttpRequest);
            console.log(textStatus);
        }
    })
    }
    setTimeout("ydcountdown("+(s-1)+",$(\"#"+objid+"\"))","1000");
}
    function check_pay(){
        var act_id = $("#hidden_actid").val();
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
            url : admin.url+'merchant_activity_manage/check_pay',
            data:{pwd:pwd,act_id:act_id},
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
    function get_actid(o){
        $('#hidden_actid').val(o);
        $('.pay_now_modal').css('display','block');
    }
</script>
</body>
</html>









