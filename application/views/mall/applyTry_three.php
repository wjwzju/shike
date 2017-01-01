<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>申请试用</title>
    <link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?> ">
    <link rel="stylesheet" href="<?=base_url('/css/mall/apply_try.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/modal_alert.css')?> ">
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
                <img src="<?=base_url('/images/mall/sc_sqsy_bg_jdt3_default.png')?>" alt="">
            </div>
            <!--搜索商品-->
            <div class="search_good">
                <h1>3.加入购物车</h1>
                <p>请将以下商品加入购物车，以便您在之后的任务过程中更容易找到试用商品。</p>
                <p>注意：<span style="margin-left:0;">部分商品不同规格价格不同，请按照指定规格选择后加入购物车。</span></p>
                <div class="commodity">
                    <div class="content">
                        <p><img src="<?php echo $product_details['picture_url']; ?>" alt=""></p>
                        <div class="good_introduce">
                            <p class="good_name"><span><?php echo $product_details['product_name']; ?></span></p>
                            <p>店铺：<span><?php echo $product_details['shopname']; ?></span></p>
                            <p>规格：<span><?php echo $product_details['color'].' '.$product_details['size']; ?></span></p>
                        </div>
                    </div>
                    <p>需拍下数量：<span><?php echo $product_details['buy_sum']; ?></span>件 &nbsp; 金额<span>&yen;<?php echo $product_details['unit_price']; ?></span></p>
                    <h2>注意：</h2>
                    <p>1、请核实您购买的商品是否为<b><?php echo $product_details['unit_price']; ?></b>。</p>
                    <p>2、当前商品为<b>
                            <?php
                                if($product_details['freight'])
                                {
                                    echo '不包邮';
                                }else
                                {
                                    echo '包邮';
                                }
                            ?>
                        </b>试用。</p>
                </div>

            </div>
            <p class="step_btn">
                <input  onclick="location.href='<?=base_url('mall/applyTry/applyTry_two').'/'.$act_id?>'" class="last_step" type="button" value="上一步">
                <input id="submit_apply" class="next_step" type="button" value="提交申请">
            </p>
        </div>
    </div>
</section>
<footer id="footer"></footer>

<!--弹框--确认通过-->
<div class="pass_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="<?=base_url('/images/mall/sj_grzx_tc_off_default.png')?>" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认审核-->
            <p class="confirm_audit">确认提交试用申请？</p>
        </div>
        <div class="modal_submit">
            <input class="confirm" onclick="apply_product()" type="button" value="确定"/>
            <input class="cancel" type="button" value="取消"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<script src="<?=base_url('/js/mall/jquery-1.10.2.js')?>"></script>
<script src="<?=base_url('/js/mall/modal_scrollbar.js')?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/details_header.html',function(){

        });
        $('#footer').load('../common/footer_other.html');*/
        $('.header .line').css({'background':'-webkit-linear-gradient(#eaeaea, #f5f5f5)'});
        $('.search .right ul').find('a').removeClass('header_active');
        $('.search .right ul').find('a').eq(0).addClass('header_active');
        conversion(0)
//        弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认提交申请
        $('#submit_apply').bind('click',function(){
            $('.pass_modal').css('display','block');
            disableScroll();
        });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.pass_modal').css('display','none');
            enableScroll();
        });
    })

    function apply_product() {
        var act_id = "<?php echo $product_details['act_id'];?>"
        $.ajax({
            url:"<?=base_url('mall/ApplyTry/apply_product')?>",
            method: 'post',
            data:{
                act_id:act_id
            },
            success:function(result){
                result = JSON.parse(result);
                if(result.success==true){
                    alert('申请成功');
                    location.href = '<?php echo base_url().'mall/homepage/productdetails/'.$act_id; ?>'
                }
                else{
                    code = result.code;
                    if(code == 1)
                    {
                        alert('申请失败，请联系客服')
                    }
                }
            },
            error:function(){
                //alert('error');
                console.log('error');
            }
        })
    }
</script>
</body>
</html>