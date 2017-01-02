<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>押金充值</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/deposit_recharge.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--押金充值-->
        <div class="deposit_recharge  left">
            <h1 class="title">押金充值</h1>
            <h2 class="select_bank">1.请选择银行</h2>
            <table>
                <tr>
                    <td class="bank">
                        <img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                </tr>
                <tr class="bank">
                    <td class="bank">
                        <img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt="">
                    </td>
                    <td class="bank">
                        <a href="javascript:void(0);">选择其他</a>
                    </td>
                </tr>
            </table>
            <h2>2.填写充值金额</h2>
            <div class="recharge_amount">
                <p class="account_balance">账户余额：<span>&yen;<?php echo $sellerinfo['avail_deposit']?></span></p>
                <p class="recharge_amount">充值金额：<input id="recharge_money" type="text"/><b>最低100元起冲</b></p>
                <p class="error"><span id="moneyerror"></span></p>
            </div>
            <p class="confirm_btn">
                <input id="confirm_payment" type="button" value="确认充值" onclick="check_recharge()"/>
            </p>
            <div class="warm_prompt">
                <h1>温馨提示：</h1>
                <p>1、信用卡支付时银行会自动提示风险安全提醒，可继续支付，请勿担心；</p>
                <p>2、请注意您的银行卡充值限制，以便造成不便；</p>
                <p>3、禁止洗钱、信用卡套现、虚假交易等行为，一经发现并确认，将终止该账号的试用；</p>
                <p>
                    4、如果充值金额没有及时到账，请联系客服。
                    <img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')">
                </p>
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
        $('.bank').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #c8c8c8')
            $(this).parent().siblings().find('td').css('border','1px solid #c8c8c8')
        });
    })

    function check_recharge(){
        var money = $("#recharge_money").val();
        if (!money){
            $("#moneyerror").text("充值金额不能为空");
            return;
        }
        if (money < 100){
            $("#moneyerror").text("最低100元起充");
            return;
        }
        $.ajax({
            url : admin.url+'merchant_deposit_recharge/check_recharge',
            data:{money:money},
            type : 'post',
            cache : false,
            success : function (data){
                location.href=admin.url+"merchant_deposit_recharge";
            },
            error : function (XMLHttpRequest, textStatus){
            }
        })
    }
</script>
</body>
</html>









