<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>申请试用</title>
    <link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?> ">
    <link rel="stylesheet" href="<?=base_url('/css/mall/apply_try.css')?>">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_content">
        <div class="location_title">
            <ul>
                <li>您的位置：</li>
                <li><a href="<?php echo base_url().'mall/homepage/index'; ?>">首页</a></li>
                <li><img src="<?=base_url('/images/mall/icon_arrow_default.png')?>" alt=""></li>
                <li><a href="<?php echo base_url().'mall/homepage/productdetails/'.$act_id; ?>">商品详情</a></li>
                <li><img src="<?=base_url('/images/mall/icon_arrow_default.png')?>" alt=""></li>
                <li>申请试用</li>
            </ul>
        </div>
        <div class="step_introduce">
            <div class="step_picture">
                <img src="<?=base_url('/images/mall/sc_sqsy_bg_jdt2_default.png')?>" alt="">
            </div>
            <!--搜索商品-->
            <div class="search_good">
                <h1>2.搜索商品</h1>
                <p>第一步：请根据以下提示找到试用</p>
                <div class="good_detail">
                    <table>
                        <tr>
                            <th>商品图片</th>
                            <th>商家旺旺</th>
                            <th>商品价格</th>
                        </tr>
                        <tr>
                            <td><img src="<?php echo $product_details['picture_url']; ?>" alt=""></td>
                            <td><?php echo $shop_info['wangwang']; ?></td>
                            <td>&yen;<?php echo $product_details['unit_price']; ?></td>
                        </tr>
                    </table>
                </div>
                <p>第二步：核对商品链接
                    <span>找不到商品请联系客服QQ：</span>
                    <img src="<?=base_url('/images/mall/login_button_QQ_default.png')?>" onclick="window.open('http://wpa.qq.com/msgrd?v=3&uin=861571200&site=qq&menu=yes')" alt="">
                </p>
                <div class="check_url">
                    <p><input class="product_url" type="text"/><input type="button" onclick="check_product_url()" value="核对商品地址"/></p>
                    <p class="error"><span></span></p>
                </div>

            </div>
            <p class="step_btn">
                <input  onclick="location.href='<?=base_url('mall/applyTry/applyTry_one').'/'.$act_id?>'" class="last_step" type="button" value="上一步">
                <input  onclick="next_step()" class="next_step" type="button" value="下一步">
            </p>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="<?=base_url('/js/mall/jquery-1.10.2.js')?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/details_header.html',function(){

        });*/
        $('.header .line').css({'background':'-webkit-linear-gradient(#eaeaea, #f5f5f5)'});
        $('.search .right ul').find('a').removeClass('header_active');
        $('.search .right ul').find('a').eq(0).addClass('header_active');
        conversion(0)
        //$('#footer').load('../common/footer_other.html');
    })

    function check_product_url() {
        var product_url_input = $(".product_url").val();
        var product_url = "<?php echo $product_details['product_link'];?>"
        if (product_url != product_url_input)
        {
            $('.error span').text('商品链接不正确');
        }else
        {
            $('.error span').text('商品链接正确');
        }
    }

    function next_step() {
        var url_error = $('.error span').val();
        if(url_error == '商品链接不正确')
        {
            return
        }else
        {
            location.href='<?=base_url('mall/applyTry/applyTry_three').'/'.$act_id?>';
        }

    }
</script>
</body>
</html>