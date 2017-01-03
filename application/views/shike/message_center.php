<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>消息通知</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/message_notification.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--消息通知-->
        <div class="message_notification left">
            <h1 class="title">消息通知</h1>
            <table>
            <?php foreach($messages as $v):?>
                <tr>
                    <!--未读时消息加粗-->
                    <?php if($v['status'] == 0):?>
                    <td style="font-weight:bold"><?php echo substr($v['message_time'],0,10);?></td>
                    <td style="font-weight:bold"><?php echo $v['title'];?></td>
                    <td style="font-weight:bold"><a href="/shike_message_details?message_id=<?php echo $v['id'];?>">查看详情</a></td>
                    <?php else:?>
                    <td><?php echo substr($v['message_time'],0,10);?></td>
                    <td><?php echo $v['title'];?></td>
                    <td><a href="/shike_message_details?message_id=<?php echo $v['id'];?>">查看详情</a></td>
                    <?php endif;?>
                </tr>
            <?php endforeach ?>
            </table>
            <?php echo $pagin; ?>
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
        //     $('.message_center').find('a').addClass('left_nav_active');
        // });
    })
</script>
</body>
</html>









