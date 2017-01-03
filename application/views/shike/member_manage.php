<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员管理</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/member_manage.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--会员管理-->
        <div class="member_manage left">
            <h1 class="title">会员管理</h1>
            <h2>会员状态：</h2>
            <table class="member_state">
                <tr>
                    <th>会员类型</th>
                    <th>到期时间</th>
                    <th>操作</th>
                </tr>
                <tr>
                    <td><?php  echo ($user['level']==1 ? '试用会员':'正式会员');?></td>
                    <?php if($user['level']==1):?>
                    <td>----</td>
                    <?php else:?>
                    <td><?php echo substr($user['vip_endtime'],0,10);?></td>
                    <?php endif;?>
                    <td><a href="/shike_member_recharge"><?php  echo ($user['level']==1 ? '购买正式会员':'续费');?></a></td>
                </tr>
            </table>
            <h2>会员充值记录：</h2>
            <table class="recharge_record">
                <tr>
                    <th>时间</th>
                    <th>开通时间</th>
                    <th>充值金额</th>
                    <th>充值类型</th>
                    <th>状态</th>
                </tr>
            <?php foreach($recharges as $v):?>
                <tr>
                    <td><?php echo $v['charge_time'];?></td>
                    <td><?php echo $v['open_duration'];?></td>
                    <td>&yen;<?php echo $v['money'];?></td>
                    <td><?php  echo ($v['charge_type']==1 ? '购买正式会员':'续费');?></td>
                    <td><?php  echo ($v['status']==1 ? '充值成功':'充值失败');?></td>
                </tr>
            <?php endforeach ?>
            </table>
            <h2>会员介绍：</h2>
            <div class="member_introduce">
                <p>1.VIP会员申请试用没有限制，普通会员一周只能申请一款试用商品；</p>
                <p>2.VIP会员中奖概率高于普通会员；</p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/shike/jquery-1.10.2.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
        //     $('.account_information ul>li').find('a').eq(2).addClass('left_nav_active');
        // });
    })
</script>
</body>
</html>









