<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>试用中奖管理</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/modal_alert.css">
    <link rel="stylesheet" href="css/shike/try_winningManage.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧试用中奖管理-->
        <div class="content_main left">
            <h1 class="title">试用中奖管理</h1>
            <!--任务说明--进展-->
            <div class="task_specification">
                <!--所有订单的状态种类-->
                <div class="order_status">
                    <ul>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/shike_try_winningManage?order_status=0">所有中奖试用（<span><?php echo $sum_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/shike_try_winningManage?order_status=4">待领取下单（<span><?php echo $sum_4_order_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/shike_try_winningManage?order_status=6">待收货评价（<span><?php echo $sum_6_order_list['count'];?></span>）</a><b>|</b></li>
                    </ul>
                </div>
                <!--商品发货状态-->
            <?php $order_list_count=-1;?>
            <?php foreach($order_list as $v):?>
                <?php $order_list_count++;?>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>申请时间：<?php echo substr($v['time'],0,10);?></span>
                            <span>任务编号：<?php echo $v['order_id'];?></span>
                            <span>淘宝商品订单号：<?php echo $v['out_sorderid']?></span>
                        </p>
                        <p class="right">
                            <a href="/shike_try_winningManage_details?order_id=<?php echo $v['order_id'];?>">查看详情</a>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="<?php echo $v['product_img'];?>" alt=""></li>
                            <li>
                                <p class="clothes_name"><span><?php echo $v['product_name'];?></span></p>
                                <p class="two">店铺：<span><?php echo $v['shopname'];?></span></p>
                                <p>来源：<span><?php  echo ($v['platform_id']==1 ? '淘宝':'天猫');?></span></p>
                            </li>
                        <?php if($v['status'] == 1):?>
                            <li>
                                <p>待发货</p>
                            </li>
                            <li>
                                <p class="status">试用待商家发货</p>
                                <p>
                                    <span>联系客服QQ:</span>
                                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes">
                                        <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                                    </a>
                                </p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 2):?>
                            <li>
                                <p>待审核评价</p>
                            </li>
                            <li>
                                <p class="status">试用待商家审核评价</p>
                                <p>
                                    <span>联系客服QQ:</span>
                                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes">
                                        <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                                    </a>
                                </p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 3):?>
                            <li>
                                <p>待确认评价</p>
                            </li>
                            <li>
                                <p class="status">试用待商家确认评价</p>
                                <p>
                                    <span>联系客服QQ:</span>
                                    <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes">
                                        <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                                    </a>
                                </p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 4):?>
                            <li>
                                <p>待领取下单</p>
                            </li>
                            <li>
                                <p class="place_order">
                                    <input onclick="location.href='/shike_get_order?order_id=<?php echo $v['order_id'];?>'" type="button" value="领取下单"/>
                                </p>
                                 <p><span id="lefttime_<?php echo $v['order_id'];?>"></span></p>
                                <p><a  id="place_order" href="javascript:void(0);">查看下单领取规则</a></p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 5):?>
                            <li>
                                <p>待复制评价</p>
                            </li>
                            <li>
                                <p onclick="location.href='/shike_taobao_evaluation?order_id=<?php echo $v['order_id'];?>'"  class="btn" id="audit"><input type="button" value="淘宝评价"/></p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 6):?>
                            <li>
                                <p>待收货评价</p>
                            </li>
                            <li>
                                <p class="btn"><input onclick="location.href='/shike_preliminary_evaluation?order_id=<?php echo $v['order_id'];?>'" type="button" value="初步评价"/></p>
                            </li>
                        <?php endif;?>
                        <?php if($v['status'] == 7):?>
                            <li>
                                <p>已完成</p>
                            </li>
                            <li>
                                <p class="try_finish">试用已完成</p>
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
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes">
                                    <img src="images/shike/sj_grzx_icon_qq_default.png" alt="">
                                </a>
                                </p>
                            </li>
                        <?php endif;?>
                         <input type="hidden" id="order_list_id_<?php echo $order_list_count;?>" value="<?php echo $v['order_id'];?>">
                        <input type="hidden" id="order_list_time_<?php echo $order_list_count;?>" value="<?php echo strtotime($v['time']);?>">
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
<!--弹框--下单-->
<div class="place_order_modal ">
    <div class="modal_box">
        <div class="modal_content">
            <h1>下单领取规则：</h1>
            <p>1、请在中奖后的48小时内完成下单领取，超时系统将取消中奖资格；</p>
            <p>2、请核对下单淘宝账号为平台绑定淘宝账号：asd，禁止用其他淘宝账号下单；</p>
            <p>3、此次使用商品指定规格为：每单拍1件  红色  大号 请勿拍错；</p>
            <p>4、旺旺聊天时禁止提及试用、免费送等敏感字眼；</p>
            <p>5、下单禁止使用淘宝客、返利网、花呗、信用卡、代付等返利方式下单；</p>
            <p>6、未收到商品前，禁止提前确认收货好评。</p>
            <p><span>如违反以上规则，发现第1次冻结账号7天，第2次冻结账号15天，第3次及以上永久封号不予中奖！</span></p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>

<script src="js/shike/jquery-1.10.2.js"></script>
<script src="js/shike/modal_scrollbar.js"></script>
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
        // $('#left_nav').load("../common/left_nav.html",function(){
        //     $('.try_manage>ul>li').find('a').eq(1).addClass('left_nav_active');
        // });
//        标题的点击事件
        $('.order').bind('click',function(){
            $(this).find('a').addClass('personal_active');
            $(this).siblings().find('a').removeClass('personal_active');
        });
//          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认发货
        $('#place_order').bind('click',function(){
            $('.place_order_modal').css('display','block');
            disableScroll();
        });

        $('.confirm').bind('click',function(){
            $('.place_order_modal').css('display','none');
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
    var order_id = objid.substring(9);
    //console.log(objid.substring(9));
    if(s == 0){
        $.ajax({
        url : admin.url+'shike_personal/cancle_order',
        type : 'POST',
        dataType: "json",
        cache : false,
        timeout : 20000,
        data : {orderid:order_id},
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
</script>
</body>
</html>









