<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情页</title>
    <link rel="stylesheet" href="<?=base_url("css/mall/details.css")?>" >
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--<div class="line"></div>-->
    <div class="section_content">
        <div class="location">
            <ul>
                <li>您的位置：</li>
                <li>首页</li>
                <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
                <li>商品详情</li>
            </ul>
        </div>
        <!--商品详情-->
        <div class="commodity_details">
            <div class="commodity_picture left">
                <img src="<?php echo $product_details['picture_url'];?> " alt="">
            </div>
            <div class="commodity_content left">
                <h1><?php echo $product_details['product_name'];?></h1>
                <div class="serve">
                    <p class="price">价值：<b>&yen;<?php echo $product_details['unit_price'];?></b></p>
                    <p class="freight">运费：<b>&yen;<?php if($product_details['freight']){
                                echo number_format($product_details['freight'],2).'</b>';
                            }else
                            {
                                echo '0.00</b> <span>包邮试用</span>';
                            }?></p>
                    <p class="offer">提供<span><?php echo $product_details['apply_amount'];?></span>份试用,目前已有<span><?php echo $product_details['apply_count'];?></span>人申请</p>
                </div>
                <!--规格-->
                <p class="standard">指定规格：<b><?php echo $product_details['color'];?>  <?php echo $product_details['size'];?></b></p>
                <p class="number">购买数量：<b><?php echo $product_details['buy_sum'];?>件</b></p>
                <input onclick="apply_product()" class="application_button" type="button" value="免费申请">
            </div>
            <div class="activity left">
                <div class="activity_time">
                    <p>活动倒计时：
                        <span id="day"></span>
                        <a>天</a>
                        <span id="hour"></span>
                        <a>时</a>
                        <span id="minute"></span>
                        <a>分</a>
                        <span id="second"></span>
                        <a>秒</a>
                    </p>
                </div>
                <div class="apply_step">
                    <h1>申请步骤：</h1>
                    <ul>
                        <li><span>1</span> 找宝贝</li>
                        <li><span>2</span> 加入购物车</li>
                        <li><span>3</span> 提交申请</li>
                    </ul>
                </div>
                <p>商家已缴纳试用保证金，请放心申请</p>
            </div>
        </div>
        <!--试用流程-->
        <div class="use_flow">
            <div class="has_apply">
                <span>已申请试用（<b><?php echo $product_details['apply_count'];?></b>）</span>
                <!--已申请试用账户名轮播-->
                <div class="left tryAccount_carousel">
                    <div class="rollBox">
                        <div class="Cont" id="ISL_Cont">
                            <div class="ScrCont">
                                <div id="List1">
                                    <?php
                                        foreach($apply_user as $k=>$v)
                                        {
                                            $applyer_name = substr_replace($v['user_name'],str_repeat('*',strlen($v['user_name'])-2),2);
                                            echo '<div class="pic">'.$applyer_name.'</div>';
                                        }
                                    ?>
                                    <!-- 用户名列表 end -->
                                </div>
                                <!--<div id="List2"></div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?=base_url('images/mall/xqy_bg_lc_default.png');?>" alt="">
        </div>
        <!--商品试用-->
        <div class="commodity_try">
            <!--左侧试用的其他的商品-->
            <div class="others_try left">
                <?php
                    echo '<h1>该商家试用的其他商品</h1>';
                    foreach($seller_else as $k=>$v) {
                        $freight = ($v['freight'])?'':'<span style="background-color:#36bc9e">包邮</span>';
                        echo '<div class="products">
                            <a href="'.base_url('mall/homepage/productdetails/'.$v['act_id']).'"><img src="' . $v['picture_url'] . '" alt=""></a>
                            <p class="product_introduction">' . $v['product_name'] . '</p>
                            <p class="quantity">
                            <span style="background-color:#a766e6">限量版' . $v['apply_amount'] . '</span>' . $freight . '
                        </p>
                        <p class="price">
                            <span>&yen;' . $v['unit_price'] . '</span><span>已申请<b>' . $v['apply_count'] . '</b>次</span>
                        </p>
                    </div>';
                    }

                    echo '<h1>申请了本商品的还申请了</h1>';
                    foreach ($seller_else as $k => $v) {
                        $freight = ($v['freight'])?'':'<span style="background-color:#36bc9e">包邮</span>';
                        echo '<div class="products">
                        <a href="'.base_url('mall/homepage/productdetails/'.$v['act_id']).'"><img src="' . $v['picture_url'] . '" alt=""></a>
                        <p class="product_introduction">' . $v['product_name'] . '</p>
                        <p class="quantity">
                        <span style="background-color:#a766e6">限量版' . $v['apply_amount'] . '</span>' . $freight . '
                    </p>
                    <p class="price">
                        <span>&yen;' . $v['unit_price'] . '</span><span>已申请<b>' . $v['apply_count'] . '</b>次</span>
                    </p>
                </div>';
                    }
                ?>

            </div>
            <!--右侧试用商品的详情-->
            <div class="try_details left">
                <h1>试用详情</h1>
                <div class="details_picture">
                    <?php
                        echo $product_details['product_details'];
                    ?>
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer"></footer>
<script src="<?=base_url('js/mall/jquery-1.10.2.js')?>"></script>
<script src="<?=base_url('js/mall/index_goodsby.js')?>"></script>
<script src="<?=base_url('js/mall/timecountdown.min.js')?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/details_header.html');
        $('#footer').load('../common/footer.html');*/
        var gene_time = "<?php echo $product_details['gene_time'];?>";
        var end_time = Date.parse(new Date(gene_time))/1000 + 7*24*60*60;
        //var time = end_time - new Date().getTime()/1000;
        var time = end_time;
        xcsoft.countdown(time,function(obj){
            document.getElementById("day").innerHTML=obj.day;
            document.getElementById("hour").innerHTML=obj.hour;
            document.getElementById("minute").innerHTML=obj.minute;
            document.getElementById("second").innerHTML=obj.second;
        });
    })

    function apply_product() {
        var act_id = "<?php echo $product_details['act_id'];?>";
        $.ajax({
            url:"<?=base_url('mall/ApplyTry/isApply')?>",
            method: 'post',
            data:{
                act_id:act_id
            },
            success:function(result){
                result = JSON.parse(result);
                if(result.success==true){
                    location.href ='<?=base_url('mall/applyTry/applyTry_one').'/'.$product_details['act_id']?>'
                }
                else{
                    code = result.code;
                    if(code == 1)
                    {
                        alert('您已经申请过该产品')
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