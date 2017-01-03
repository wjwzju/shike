<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员管理</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/member_manage.css">
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
                    <td><?php  echo ($seller['level']==1 ? '试用会员':'正式会员');?></td>
                    <?php if($seller['level']==1):?>
                    <td>----</td>
                    <?php else:?>
                    <td><?php echo substr($seller['end_time'],0,10);?></td>
                    <?php endif;?>
                    <td><a href="/merchant_member_recharge"><?php  echo ($seller['level']==1 ? '购买正式会员':'续费');?></a></td>
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
                <p>1.会员商家发布试用没有数量限制，普通商家一个月只能发布一款试用商品；</p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="js/merchant/jquery-1.10.2.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html");
    })
</script>
</body>
</html>









