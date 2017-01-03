<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>押金提现</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/deposit_withdraw.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--押金提现-->
        <div class="deposit_withdraw left">
            <h1 class="title">押金提现</h1>
            <h2>填写提现金额</h2>
            <!--填写金额先关的信息-->
            <div class="fillIn_money">
                <div class="main_one"><b>可用押金：</b><span>&yen;<?php echo $seller['avail_deposit'];?></span></div>
                <div class="main_two">
                    <b>可用押金：</b>
                    <?php if(!$bankcard):?>
                    <div class="left bankCard_two">
                        <p><img onclick="location.href='/merchant_add_bankCard'" src="images/merchant/sj_zjgl_icon_bdyhk_default.png" alt="" ></p>
                        <p>请先绑定银行卡</p>
                    </div>
                    <?php else:?>
                    <div class="left bankCard_one">
                        <p class="one"><img src="images/merchant/sj_zhxx_bg_bdyhk_nyyh_five_default.png" alt=""></p>
                        <p class="two"><span>储蓄卡</span></p>
                        <p class="three">**** **** **** <?php echo substr($bankcard['banknum'], -4);?></p>
                    </div>
                    <?php endif;?>
                </div>
                <div class="main_three">
                    <b>提现金额：</b>
                    <input id="tixian" type="text" onblur="get_money()" />
                    <span class="error" id="tixianerror"></span>
                    <br/>
                    <p class="one">单次最少提现500元，提现操作平台将收取1%的手续费</p>
                    <p class="two">预计2个工作日内（国家法定节假日和双休日顺延）平台完成提现操作。<br/>
                        到账时间以各大银行为准，预计3-5个工作日左右。</p>
                </div>
                <div class="main_four">
                    <b>实际到账金额：</b>
                    <span id="daozhang"></span>
                </div>
                <div class="main_five">
                    <b>提现密码：</b>
                    <input type="text" id="tixian_pwd"/>
                    <span class="error" id="pwderror"></span>
                    <br/>
                    <p class="one">忘记密码请联系客服：<img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')" ></p>
                </div>
            </div>
            <p class="confirm_btn">
                <input id="confirm_withdraw" type="button" value="确认提现" onclick="post_tixian()" />
            </p>
            <div class="warm_prompt">
                <h1>温馨提示：</h1>
                <p>1、信用卡支付时银行会自动提示风险安全提醒，可继续支付，请勿担心；</p>
                <p>2、请注意您的银行卡充值限制，以便造成不便；</p>
                <p>3、禁止洗钱、信用卡套现、虚假交易等行为，一经发现并确认，将终止该账号的试用；</p>
                <p>
                    4、如果充值金额没有及时到账，请联系客服。
                    <img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')" >
                </p>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--确认提现成功弹框-->
<div class="withdraw_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/merchant/sj_fbsy_tc_icon_right_default.png" alt=""></p>
            <p class="payment_succeed">提现成功！</p>
            <p>请在3-5个工作日后查询银行账户，如有问题请联系客服。</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--确认提现失败--原因一：可用押金金额不足-->
<div class="withdrawFailure_modal">
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
            <p style="height:20px;">可用押金金额不足</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
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
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);

//        提现成功弹框
        // $('#confirm_withdraw').bind('click',function(){
        //     $('.withdraw_modal').css('display','block');
        //    disableScroll();
        // });
////        提现失败弹框
//        $('#confirm_withdraw').bind('click',function(){
//            $('.withdrawFailure_modal').css('display','block');
//            disableScroll();
//        });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.withdrawFailure_modal,.withdraw_modal').css('display','none');
            enableScroll();
        });
    })
    function get_money(){
        var tixian = $("#tixian").val();
        if(tixian < 500){
            $("#tixianerror").text("单次最少提现500元");
            $("#daozhang").text("");
            return;
        }
        var money = tixian*0.99;
        if(tixian){
            $("#daozhang").text("￥"+money);
            $("#tixianerror").text("");
            return;
        }
        return;
    }
    function post_tixian(){
        var tixian = $("#tixian").val();
        var tixian_pwd = $("#tixian_pwd").val();
        var avail_deposit = <?php echo $seller['avail_deposit'];?>;
        if(!tixian){
            $("#tixianerror").text("提现金额不能为空");
            return;
        }
        if(avail_deposit < tixian){
            $("#tixianerror").text("金额不足");
            return;
        }
        if(!tixian_pwd){
            $("#pwderror").text("提现密码不能为空");
            return;
        }
        $.ajax({
            url : admin.url+'merchant_deposit_withdraw/post_tixian',
            data:{tixian:tixian,tixian_pwd:tixian_pwd},
            type : 'post',
            cache : false,
            datatype : "json",
            success : function (data){
                if(!data){
                    $('.withdrawFailure_modal').css('display','block');
                }else{
                    $('.withdraw_modal').css('display','block');
                }

            },
            error : function (XMLHttpRequest, textStatus){
            }
        })
    }
</script>
</body>
</html>









