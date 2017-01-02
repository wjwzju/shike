<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>活动管理</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <!--<link rel="stylesheet" href="../../css/reset_content.css">-->
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/member_recharge.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--会员充值详情-->
    <div class="rechange_details">
        <!--所在位置-->
        <div class="location_title">
            <ul>
                <li>你所在的位置：</li>
                <li class="order">
                    <a class="personal_active" href="/merchant_personal">个人中心</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">
                    <a href="/merchant_member_manage">会员管理</a>
                </li>
                <li class="order"><img src="images/merchant/sj_hdgl_icon_arrow_default.png" alt=""></li>
                <li class="order">会员充值</li>
            </ul>
        </div>
        <!--请选择开通时长-->
        <div class="member_rechange">
            <h1>请选择开通时长</h1>
            <ul class="select_duration">
                <li class="select" onclick="change_recharge_items(1)">
                    <p>会员时长：<b>1年</b></p>
                    <p><span>&yen;4000.00</span></p>
                </li>
                <li class="select" onclick="change_recharge_items(2)">
                    <p>会员时长：<b>2年</b></p>
                    <p><span>&yen;7200.00</span></p>
                </li>
                <li class="select" onclick="change_recharge_items(3)">
                    <p>会员时长：<b>3年</b></p>
                    <p><span>&yen;9600.00</span></p>
                </li>
            </ul>
            <div class="need_pay">
                <p class="one">您已选择<b>12</b>个月会员，有效期至<b><?php echo $one_year_end;?></b></p>
                <p class="two">需要支付:<span>&yen;4000.00</span></p>
                <p class="three" style = "display:none">您已选择<b>24</b>个月会员，有效期至<b><?php echo $two_year_end;?></b></p>
                <p class="four" style = "display:none">需要支付:<span>&yen;7200.00</span></p>
                <p class="five" style = "display:none">您已选择<b>36</b>个月会员，有效期至<b><?php echo $three_year_end;?></b></p>
                <p class="six" style = "display:none">需要支付:<span>&yen;9600.00</span></p>
            </div>
            <h1>请选择银行</h1>
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
                        <a href="javascript:void(0);">选择其他</a>
                    </td>
                </tr>
            </table>
            <p class="confirm_btn">
                <input id="confirm_payment" type="button" value="确认付款" onclick="pay_recharge()"/>
            </p>
            <div class="warm_prompt">
                <h1>温馨提示：</h1>
                <p>1、信用卡支付时银行会自动提示风险安全提醒，可继续支付，请勿担心；</p>
                <p>2、请注意您的银行卡充值限制，以便造成不便；</p>
                <p>3、禁止洗钱、信用卡套现、虚假交易等行为，一经发现并确认，将终止该账号的试用；</p>
                <p>
                    4、如果充值金额没有及时到账，请联系客服。
                    <img src="images/merchant/sj_grzx_icon_qq_default.png" alt="">
                </p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<input type="hidden" id="hidden_recharge">
<script src="js/merchant/jquery-1.10.2.js"></script>
<script src="js/merchant/modal_scrollbar.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html");

        // $('.select').bind('click',function(){
        //     $(this).css('border','1px solid #e61e28');
        //     $(this).siblings().css('border','1px solid #c8c8c8');
        // })
        $('.bank').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #c8c8c8')
            $(this).parent().siblings().find('td').css('border','1px solid #c8c8c8')
        });
    })
    function change_recharge_items(o){
        $('.select').bind('click',function(){
            $(this).css('border','1px solid #e61e28');
            $(this).siblings().css('border','1px solid #c8c8c8');
        })
        if(o == 1){
            $('.one').css('display','block');
            $('.two').css('display','block');
            $('.three').css('display','none');
            $('.four').css('display','none');
            $('.five').css('display','none');
            $('.six').css('display','none');
        }
        if(o == 2){
            $('.one').css('display','none');
            $('.two').css('display','none');
            $('.three').css('display','block');
            $('.four').css('display','block');
            $('.five').css('display','none');
            $('.six').css('display','none');
        }
        if(o == 3){
            $('.one').css('display','none');
            $('.two').css('display','none');
            $('.three').css('display','none');
            $('.four').css('display','none');
            $('.five').css('display','block');
            $('.six').css('display','block');
        }
        $('#hidden_recharge').val(o);
    }
    function pay_recharge(){
        var recharge_year = $("#hidden_recharge").val();
        $.ajax({
            url : admin.url+'Merchant_member_recharge/pay_recharge',
            type : "POST",
            datatype : "json",
            cache : false,
            timeout : 20000,
            data : {recharge_year:recharge_year},
            success : function (result){
                location.href=admin.url+"merchant_member_manage";
            },
            error : function(XMLHttpRequest, textStatus){
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }

</script>
</body>
</html>









