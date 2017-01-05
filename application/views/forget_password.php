<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>忘记密码</title>
    <link rel="stylesheet" href="<?=base_url('css/mall/reset.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/mall/forget_password.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/mall/modal_alert.css')?>">
</head>
<body>
<header id="header"></header>
<div class="line"></div>
<section id="section">
    <!--修改密码-->
    <div class="change_password left">
        <div class="phone">
            <span>手机号码</span>
            <input type="text" id="phone" class="phone2"  placeholder="建议使用常用手机" />
        </div>
        <!--错误提示-->
        <p class="error"><span class="phone_error"></span></p>
        <div class="affirm_password">
            <span>登录密码</span>
            <input type="password" id="loginPwd" class="password" placeholder="建议使用至少两种字符组合" />
        </div>
        <!--错误提示-->
        <p class="error"><span class="loginPwd_error"></span></p>
        <div class="affirm_password">
            <span>确认密码</span>
            <input id="confirmPwd" type="password" class="re_password" placeholder="请再次输入密码" />
        </div>
        <!--错误提示-->
        <p class="error"><span class="confirmPwd_error"></span></p>
        <div class="auth_code">
            <span>验&nbsp;证&nbsp;码</span>
            <input type="text" class="verification_code" placeholder="请输入手机验证码" />
            <span class="gain"><input onclick="get_phone_code()" id="testGetCode" type="button" value="获取验证码"/></span>
        </div>
        <!--错误提示-->
        <p class="error"><span></span></p>
        <div class="register_now">
            <input type="button" onclick="forgetpwd()" value="提交">
        </div>
    </div>
    <!--账户信息-->
    <div class="account_related right">
        <div class="has_account">
            <h1>已有账号？</h1>
            <input onclick="location.href='<?=base_url('login/index')?>'" type="button" value="立即登录"/>
        </div>
        <div class="no_account">
            <h1>还没有账号？</h1>
            <input onclick="location.href='<?=base_url('mall/register/merchant_register')?>'" type="button" value="注册商家"/>
            <input onclick="location.href='<?=base_url('mall/register/shike_register')?>'" type="button" value="注册试客"/>
        </div>
    </div>
</section>
<div class="myAlert">

</div>

<footer id="footer"></footer>
<script src="<?=base_url("js/mall/jquery-1.10.2.js")?>"></script>
<script src="<?=base_url("js/mall/input_verify.js")?>"></script>
<script src="<?=base_url("js/mall/modal_scrollbar.js")?>"></script>
<script src="<?=base_url("js/mall/mask_layer.js")?>"></script>
<script>
    $(function(){
        $('#header').load('../common/login_header.html',function(){
            $('.details_title').text('忘记密码')
        });
        $('#footer').load('../common/footer.html');
    })

    function get_phone_code(obj)
    {
        var phone = $('.phone2').val();
        var phone_error = $(".phone_error").text();
        if(!phone){
            return;
        }
        $.ajax({
            url:"<?=base_url('sendcloud')?>",
            method:'post',
            data:{
                tel:phone
            },
            success : function (result){
                if(result == 1){
                    console.log('send');
                    //$("#testGetCode").text("验证码已发送，请稍后");
                    //$(obj).unbind('click').removeAttr('onclick').click(function(){$("#testGetCode").text("验证码已发送，请稍后");});
                }
            }
        })
    }

    function forgetpwd()
    {
        var phone = $('.phone2').val();
        var password = $('.password').val();
        var verification_code = $('.verification_code').val();
        if(!(phone && password && verification_code))
        {
            return
        }
        $.ajax({
            url:"<?=base_url('forget_password/reset_pwd')?>",
            method:'post',
            data:{
                tel:phone,
                password:password,
                verification_code:verification_code
            },
            success : function (result) {
                console.log('reset');
                result = JSON.parse(result);
                if (result.success == true) {
                    //alert('注册成功')
                    myalert = '<div class="modal">' +
                        '<div class="modal_box">' +
                        '<div class="modal_prompt">' +
                        '<span>提示</span>' +
                        '<a class="close" href="javascript:void(0);">' +
                        '<img src="../../images/mall/sj_grzx_tc_off_default.png" alt="">' +
                        '</a>' +
                        '</div>' +
                        '<div class="modal_content">' +
                        '<p>密码重置成功</p>' +
                        '<div id="code" data-code="0"></div>' +
                        '</div>' +
                        '<div class="modal_submit">' +
                        '<input class="confirm" type="button" value="确定"/>' +
                        '</div>' +
                        '</div>' +
                        '<div class="mask_layer"></div>' +
                        '</div>';
                    $('.myAlert').append(myalert);
                } else {
                    code = result.code;
                    if (code == 1) {
                        console.log('weizhuce');
                        myalert = '<div class="modal">' +
                            '<div class="modal_box">' +
                            '<div class="modal_prompt">' +
                            '<span>提示</span>' +
                            '<a class="close" href="javascript:void(0);">' +
                            '<img src="../../images/mall/sj_grzx_tc_off_default.png" alt="">' +
                            '</a>' +
                            '</div>' +
                            '<div class="modal_content">' +
                            '<p>您的手机未注册</p>' +
                            '<div id="code" data-code="1"></div>' +
                            '</div>' +
                            '<div class="modal_submit">' +
                            '<input class="confirm" type="button" value="确定"/>' +
                            '</div>' +
                            '</div>' +
                            '<div class="mask_layer"></div>' +
                            '</div>';
                        $('.myAlert').append(myalert);
                    } else if (code == 2) {
                        console.log('验证码错误');
                        myalert = '<div class="modal">' +
                            '<div class="modal_box">' +
                            '<div class="modal_prompt">' +
                            '<span>提示</span>' +
                            '<a class="close" href="javascript:void(0);">' +
                            '<img src="../../images/mall/sj_grzx_tc_off_default.png" alt="">' +
                            '</a>' +
                            '</div>' +
                            '<div class="modal_content">' +
                            '<p>验证码不正确</p>' +
                            '<div id="code" data-code="2"></div>' +
                            '</div>' +
                            '<div class="modal_submit">' +
                            '<input class="confirm" type="button" value="确定"/>' +
                            '</div>' +
                            '</div>' +
                            '<div class="mask_layer"></div>' +
                            '</div>';
                        $('.myAlert').append(myalert);
                    }
                }
            },
            error:function(){
                alert('error');
            }
        })
    }

    $('.myAlert').on('click','.close,.cancel,.confirm',function(){
        $('.modal').css('display','none');
        enableScroll();
        var code = $('#code').data('code');
        if(code == 0)
        {
            location.href = "<?=base_url('login/index')?>";
        }
    })
</script>
</body>
</html>