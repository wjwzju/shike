<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>绑定银行卡</title>
    <link rel="stylesheet" href="css/shike/reset.css">
    <link rel="stylesheet" href="css/shike/reset_content.css">
    <link rel="stylesheet" href="css/shike/modal_alert.css">
    <link rel="stylesheet" href="css/shike/add_bankCard.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--修改登录密码-->
        <div class="add_bankCard left">
            <h1 class="title">绑定银行卡</h1>
            <form action="" class="account_information">
                <label for="username">姓名：</label>
                <input id="username" type="text"/>
                <br/>
                <p><span id="usernameerror"></span></p>

                <label for="phone">开户预留手机号：</label>
                <input id="phone" type="text"/>
                <br/>
                <p><span id="phoneerror"></span></p>

                <label for="openBank">开户银行：</label>
                <input id="openBank" type="text"/>
                <br/>
                <p><span id="openBankerror"></span></p>

                <label for="openBankname">开户支行名称：</label>
                <input id="openBankname" type="text"/>
                <br/>
                <p><span id="openBanknameerror"></span></p>

                <label for="bankCardNum">银行卡号：</label>
                <input id="bankCardNum" type="text"/>
                <br/>
                <p><span id="bankCardNumerror"></span></p>

                <p class="btn">
                    <input id="confirm" type="button" value="确定" onclick="post_add_bankcard()"/>
                    <input type="button" value="取消"/>
                </p>
            </form>
            <p class="warm_prompt"><span>温馨提示：</span>如果您填写的银行卡账号不正确，可能无法成功返款，平台不承担由此产生的一切费用。</p>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<!--确认绑定成功弹框-->
<div class="add_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/shike/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="images/shike/sj_fbsy_tc_icon_right_default.png" alt=""></p>
            <p class="payment_succeed">绑定成功！</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" onclick="location.href='/shike_bankcard_manage'"  type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--确认绑定失败弹框-->
<div class="addFailure_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="../../images/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="succeed_content">
            <p><img src="../../images/sj_fbsy_tc_icon_no_default.png" alt=""></p>
            <p class="payment_succeed">绑定失败！</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<script src="../../js/jquery-1.10.2.js"></script>
<script src="../../js/modal_scrollbar.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");
        // $('#left_nav').load("../common/left_nav.html",function(){
        //     $('.account_information ul>li').find('a').eq(1).addClass('left_nav_active');
        // });

        $('.mask_layer').height(document.body.offsetHeight+500);
//        添加成功弹框
        // $('#confirm').bind('click',function(){
        //     $('.add_modal').css('display','block');
        //    disableScroll();
        // });
//        添加失败弹框
//        $('#confirm').bind('click',function(){
//            $('.addFailure_modal').css('display','block');
//            disableScroll();
//        });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.addFailure_modal,.add_modal').css('display','none');
            enableScroll();
        });
    })
    function post_add_bankcard(){
        var name = $("#username").val();
        var phone = $("#phone").val();
        var banktype = $("#openBank").val();
        var branchbank = $("#openBankname").val();
        var banknum = $("#bankCardNum").val();
        if(!name){
            $("#usernameerror").text("姓名不能为空");
            return;
        }
        if(!phone){
            $("#phoneerror").text("手机号不能为空");
            return;
        }
        if(!banktype){
            $("#openBankerror").text("开户银行不能为空");
            return;
        }
        if(!branchbank){
            $("#openBanknameerror").text("开户支行银行不能为空");
            return;
        }
        if(!banknum){
            $("#bankCardNumerror").text("银行卡号不能为空");
            return;
        }
        $.ajax({
            url : admin.url+'shike_add_bankCard/post_add_bankcard',
            type : "POST",
            datatype : "json",
            cache : false,
            timeout : 20000,
            data : {name:name, phone:phone, banktype:banktype, branchbank:branchbank, banknum:banknum},
            success : function (result){
                $('.add_modal').css('display','block');
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









