<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>店铺管理--已绑定</title>
    <link rel="stylesheet" href="css/merchant/reset.css">
    <link rel="stylesheet" href="css/merchant/reset_content.css">
    <link rel="stylesheet" href="css/merchant/modal_alert.css">
    <link rel="stylesheet" href="css/merchant/store_manage.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <aside class="left" id="left_nav"></aside>
        <!--右侧店铺管理-->
        <div class="store_content left">
            <h1 class="title">店铺管理</h1>
            <div class="binding_shops">
                <input id="binding_shops" type="button" onclick="check_binding_shop('<?php echo sizeof($shops);?>')" value="绑定新店铺"/>
                最多可以绑定3家店铺，如需换绑店铺请联系客服QQ:
                <img src="images/merchant/sj_grzx_icon_qq_default.png" alt="" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq;?>&site=qq&menu=yes')">
            </div>
            <div class="shops_details">
                <div class="detalis">
                    <?php foreach($shops as $v): ?>
                    <ul>
                        <li><img src="<?php echo $v['logo_link']; ?>" alt=""></li>
                        <li>
                            <p class="clothes_name"><?php echo $v['shop_id']; ?>
                            <p class="two"><span>店铺：</span><?php echo $v['shop_name']; ?></p>
                            <p><span>来源：</span><?php  echo ($v['platform_id']==1 ? '淘宝':'天猫');?></p>
                        </li>
                        <li>
                            <p>QQ：<b><?php echo $v['chargeqq']; ?></b></p>
                            <p class="two">微信：<b><?php echo $v['chargewx']; ?></b></p>
                            <p>手机：<b><?php echo $v['chargetel']; ?></b></p>
                        </li>
                        <li>
                            <p><input class="modify_contact" onclick="show_modify_contact(<?php echo $v['shop_id'];?>)" type="button" value="修改联系方式"/></p>
                        </li>
                        <li>
                            <p>绑定时间：<b><?php echo $v['bind_time']; ?></b></p>
                        </li>
                    </ul>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="hidden_shopid">
<footer id="footer"></footer>
<!--弹框--修改联系方式-->
<div class="modify_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>修改联系方式</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--修改联系方式-->
            <form class="amend_box" action="">
                <label for="logistics">QQ</label>
                <input id="logistics" type="text"/>
                <p><span id="qq_error"></span></p>
                <label for="WeChat">微信</label>
                <input id="WeChat" name="chargewx" type="text"/>
                <p><span></span></p>
                <label for="mobile_phone">手机</label>
                <input id="mobile_phone" name="chargetel" type="text"/>
                <p><span id="tel_error"></span></p>

            </form>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="change_content()" />
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<!--弹框--绑定店铺（超过3次绑定）-->
 <div class="binding_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            确认审核
            <p>最多只能绑定3家店铺</p>
            <p>如需更换店铺，请联系客服QQ：54545487</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="button" value="确定" onclick="check_ok()" />
        </div>
    </div>
    <div class="mask_layer"></div>
</div> 
<!--弹框--绑定新店铺-->
<div class="bindingShops_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>绑定新店铺（请认真填写绑定信息，一经提交无法修改）</span>
            <a class="close" href="/merchant_store">
                <img src="images/merchant/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--绑定新店铺-->
            <form class="shop_information" enctype="multipart/form-data" method="post" action="/merchant_store/submit_new_shop" onsubmit="return check_form()">
                <label for="shop_url">店铺首页网址：</label>
                <input id="shop_url" name="shop_url" type="text"/>
                <span id="shoperror"></span>
                <br/>
                <label for="shop_name">店铺名称：</label>
                <input id="shop_name" name="shop_name" type="text"/>
                <span></span>
                <br/>
                <label for="wangwang">店铺主旺旺TD：</label>
                <input id="wangwang" name="wangwang" type="text"/>
                <span></span>
                <br/>
                <label for="shop_logo">店铺LOGO：</label>
                <a class="file" href="javascript:void(0);">
                    <!-- 选择文件 -->
                    <input id="shop_logo" name="shop_logo" type="file" value=""/>
                </a>
                <!-- <b class="not_select">未选择任何文件</b> -->
                <span></span>
                <br/>
                <p>请先上传店铺LOGO，要求：尺寸为260x260，大小不超过1M。</p>
                <label for="auth_code">验证码：</label>
                <input id="auth_code" type="button" name="auth_code" value=<?php echo $pwd;?> />
                <input class="clone" type="button" value="复制" onclick="clip_to_board('<?php echo $pwd;?>')"/>
                <span id="clip_ok"></span>
                <br/>
                <p>1、将验证码加到您的店铺里某个上架商品的标题上，如下图</p>
                <p class="picture"><span><img src="images/merchant/sj_dpgl_tc_bg_jt_default.png" alt=""></span></p>
                <p>2、再将这个商品的详情页链接，复制到下面输入框中进行验证。</p>
                <br/>
                <label for="good_url">商品地址：</label>
                <input id="good_url" name="good_url" type="text"/>
                <span></span>
                <br/>
                <label for="principal_qq">负责人QQ：</label>
                <input id="principal_qq" name="principal_qq" type="text"/>
                <span></span>
                <br/>
                <label for="principal_weChat">负责人微信：</label>
                <input id="principal_weChat" name="principal_weChat" type="text"/>
                <span></span>
                <br/>
                <label for="principal_phone">负责人手机：</label>
                <input id="principal_phone" name="principal_phone" type="text"/>
                <span></span>
        </div>
        <div class="modal_submit">
            <input class="confirm" type="submit" value="确定" />
        </div>
        </form>
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
//          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        <!--弹框--绑定店铺（超过3次绑定）-->
        // $('#binding_shops').bind('click',function(){
        //     n = $shops.length();
        //     alert(n);
        //     if(n >= 3){
        //         $('.binding_modal').css('display','block');
        //         // disableScroll();
        //     }eles{
        //         $('.bindingShops_modal').css('display','block');
        //         // disableScroll();
        //     }
        // });
//        修改联系方式
        // $('.modify_contact').bind('click',function (){
        //     $('.modify_modal').css('display','block');
        //     disableScroll();
        // });
        $('.close,.cancel').bind('click',function(){
            $('.binding_modal,.modify_modal').css('display','none');
            // enableScroll();
        });
    })
</script>
<script>
    function change_content(obj){
        var shop_id = $("#hidden_shopid").val();
        var chargeqq = $("#logistics").val();
        var chargewx = $("#WeChat").val();
        var chargetel = $("#mobile_phone").val();
        if(!chargeqq){
            $("#qq_error").text("负责人QQ不能为空");
            return;
        }
        if(!chargetel){
            $("#tel_error").text("负责人手机号不能为空");
            return;
        }
        $.ajax({
            url : admin.url+'merchant_store/change_content',
            type : "POST",
            datatype : "json",
            cache : false,
            timeout : 20000,
            data : {shop_id:shop_id, chargeqq:chargeqq, chargewx:chargewx, chargetel:chargetel},
            success : function (result){
                location.reload();

            },
            error : function(XMLHttpRequest, textStatus){
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }
    function show_modify_contact(o){
        $('.modify_modal').css('display','block');
        // disableScroll();
        $('#hidden_shopid').val(o);
    }
    function check_binding_shop(o){
        if(o >= 3){
            $('.binding_modal').css('display','block');
            // disableScroll();
        }else{
            $('.bindingShops_modal').css('display','block');
            // disableScroll();
        }
    }
    function check_form(){
        if($("#shop_url").val()==''|| $("#shop_name").val()==''|| $("#wangwang").val()==''|| $("#shop_logo").val()==''|| $("#auth_code").val()==''|| $("#principal_qq").val()==''|| $("#principal_weChat").val()==''|| $("#principal_phone").val()==''){
            return false;
        }
        return true;
    }
    function submit_new_shop(){
        var shop_link = $("#shop_url").val();
        var shop_name = $("#shop_name").val();
        var wangwang = $("#wangwang").val();
        // var shop_logo = $("#shop_logo").val();
        var good_url = $("#good_url").val();
        var chargeqq = $("#principal_qq").val();
        var chargewx = $("#principal_weChat").val();
        var chargetel = $("#principal_phone").val();
        alert(shop_link);
        $.ajax({
            url : admin.url+'merchant_store/submit_new_shop',
            type : "POST",
            datatype : "json",
            cache : false,
            timeout : 20000,
            data : {shop_link:shop_link, shop_name:shop_name, wangwang:wangwang, 
                    good_url:good_url, chargeqq:chargeqq,
                    chargewx:chargewx, chargetel:chargetel},
            success : function (result){
                location.reload();

            },
            error : function(XMLHttpRequest, textStatus){
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    }

    function clip_to_board(o){
        if (window.clipboardData) // IE
        {
            window.clipboardData.setData("Text",o);
            $("#clip_ok").text("复制成功");
        } 
        return;
    }

    function check_ok(){
        $('.binding_modal').css('display','none');
        return;
    }
</script>
</body>
</html>









