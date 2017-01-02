<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>申请记录</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/application_record.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧申请记录-->
        <div class="content_main left">
           <h1 class="title">申请记录</h1>
            <!--任务说明--进展-->
            <div class="application_record">
                <!--所有订单的状态种类-->
                <div class="order_status">
                    <ul>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active"  <?php endif;?> href="/shike_application_record?order_status=0">所有申请（<span><?php echo $sum_apply_list['count'];?></span>）</a><b>|</b></li>
                        <li class="order"><a <?php if(!$order_status):?> class="personal_active" <?php endif;?> href="/shike_application_record?order_status=3">已中奖申请（<span><?php echo $sum_win_apply_list['count'];?></span>）</a></li>
                    </ul>
                </div>
                <!--商品发货状态-->
                 <?php $apply_list_count=-1;?>
            <?php foreach($apply_list as $v):?>
                <?php $apply_list_count++;?>
                <div class="delivery_status">
                    <div class="title">
                        <p class="left">
                            <span>申请时间：<?php echo substr($v['apply_time'],0,10);?></span>
                        </p>
                    </div>
                    <div class="detalis">
                        <ul>
                            <li><img src="<?php echo $v['picture_url'];?>" alt=""></li>
                            <li>
                                <p class="clothes_name">商品名称：<span><?php echo $v['product_name'];?></span></p>
                                <p>店铺名称：<span><?php echo $v['shopname'];?></span></p>
                                <p>商品来源：<span><?php echo ($v['platformid']==1 ? '淘宝':'天猫');?></span></p>
                                <p>商品件数：<span><?php echo $v['amount_perorder'];?>件</span>&nbsp; &nbsp; &nbsp; &nbsp;价格：<b>&yen;<?php echo $v['price'];?></b></p>
                            </li>
                        <?php if($v['apply_status'] == 1):?>
                            <li>
                                <p>待开奖</p>
                            </li>
                            <li>
                                <p class="status" id="place_order">等待开奖</p>
                                <p><span id="lefttime_<?php echo $v['apply_id'];?>"></span></p>
                            </li>
                        <?php endif;?>
                        <?php if($v['apply_status'] == 2):?>
                            <li>
                                <p>未中奖</p>
                            </li>
                            <li>
                                <p class="try_finish">没有中奖再接再厉</p>
                            </li>
                        <?php endif;?>
                        <?php if($v['apply_status'] == 3):?>
                            <li>
                                <p>已中奖</p>
                            </li>
                            <li>
                                <p class="status">恭喜您中了免费试用商品！</p>
                                <p>快去<a href="/shike_try_winningManage">试用中奖管理</a>领取吧！</p>
                            </li>
                        <?php endif;?>
                        <?php if($v['apply_status'] == 4):?>
                            <li>
                                <p>已中奖</p>
                            </li>
                            <li>
                                <p class="status">恭喜您获得了优惠购买商品资格！</p>
                                <p>快去<a href="/shike_try_winningManage">优惠购买管理</a>领取吧！</p>
                            </li>
                        <?php endif;?>
                         <input type="hidden" id="apply_list_id_<?php echo $apply_list_count;?>" value="<?php echo $v['apply_id'];?>">
                        <input type="hidden" id="apply_list_time_<?php echo $apply_list_count;?>" value="<?php echo strtotime($v['apply_time']);?>">
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
<script src="js/shike/jquery-1.10.2.js"></script>
<script>
    $(function(){

        var apply_list_count = <?php echo count($apply_list);?>;
        for(var i=0;i<apply_list_count;i++){
            var timestamp = $("#apply_list_time_"+i).val();
            var now ="<?php echo time();?>";
            var order_id = $("#apply_list_id_"+i).val();
            var obj = $("#lefttime_"+order_id);
            leftseconds = parseInt(timestamp)+ 3600*48 - parseInt(now);
            console.log(leftseconds);
            //console.log(obj);
            ydcountdown(leftseconds,obj);
        }

        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
        //     $('.try_manage>ul>li').find('a').eq(0).addClass('left_nav_active');
        // });
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
    var apply_id = objid.substring(9);
    //console.log(objid.substring(9));
    if(s == 0){
        $.ajax({
        url : admin.url+'shike_application_record/cancle_apply',
        type : 'POST',
        dataType: "json",
        cache : false,
        timeout : 20000,
        data : {apply_id:apply_id},
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









