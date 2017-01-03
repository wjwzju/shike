<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>淘宝评价晒单</title>
    <link rel="stylesheet" href="css/shike/location_title.css">
    <link rel="stylesheet" href="css/shike/modal_alert.css">
    <link rel="stylesheet" href="css/shike/taobao_evaluation.css">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="section_content">
        <div class="location_title">
            <ul>
                <li>您的位置：</li>
                <li><a href="/shike_personal">个人中心</a></li>
                <li><img src="/images/shike/icon_arrow_default.png" alt=""></li>
                <li><a href="/shike_try_winningManage">试用管理</a></li>
                <li><img src="images/shike/icon_arrow_default.png" alt=""></li>
                <li>领取下单</li>
            </ul>
        </div>
        <div class="evaluate_content">
            <h1>淘宝评价晒单</h1>
            <h2>第一步：请访问www.taobao.com，登录账号：asd，在“我的淘宝-已买到的宝贝”找到以下商品：</h2>
            <table>
                <tr>
                    <th>店铺主人旺旺ID</th>
                    <th>商品名</th>
                    <th>单价</th>
                    <th>购买数量</th>
                    <th>规格</th>
                </tr>
                <tr>
                    <td><?php echo $order['sellerwangwang'];?></td>
                    <td><?php echo $order['product_name'];?></td>
                    <td>&yen;<?php echo $order['unit_price'];?></td>
                    <td><?php echo $order['amount_perorder'];?></td>
                    <td>每单拍<?php echo $order['buy_sum'];?>件 <?php echo $order['color'];?> <?php echo $order['size'];?></td>
                </tr>
            </table>
            <h2>第二步：图文好评商品：</h2>
            <h3>1.在“待收货”中找到试用商品。</h3>
            <!--商品信息-->
            <div class="good_information">
                <div class="details">
                    <ul>
                        <li><img style="width:120px;height:80px" src="<?php echo $order['product_img'];?>" alt=""></li>
                        <li>
                            <p><?php echo $order['product_name'];?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <!--好评内容-->
            <h3>
                2.点击“确认收货”后，请将下面初步评价内容复制到淘宝评价中并上传同样的晒单照片，<b>需要全五星好评，照片必须要必传（5张）</b>，
                如果已经评价了请复制下面信息进行追评。
            </h3>
            <div class="good_reputation">
                <p class="left">好评内容：</p>
                <textarea class="left" style="resize:none;" name="" autofocus>
                    <?php echo $order['comment_detail'];?>
                </textarea>
            </div>
            <!--商品图片-->
            <div class="good_picture">
                <span>晒单图片：</span>
                <a href="javascript:void(0);">
                    <img src="<?php echo $order['shaidan1_img'];?>" alt="">
                </a>
                <a href="javascript:void(0);">
                    <img src="<?php echo $order['shaidan2_img'];?>" alt="">
                </a>
                <a href="javascript:void(0);">
                    <img src="<?php echo $order['shaidan3_img'];?>" alt="">
                </a>
                <a href="javascript:void(0);">
                    <img src="<?php echo $order['shaidan4_img'];?>" alt="">
                </a>
                <a href="javascript:void(0);">
                    <img src="<?php echo $order['shaidan5_img'];?>" alt="">
                </a>
            </div>
            <!--上传评价截图-->
            <h3>
                3.提交评价后，截图上传成功发布的评价信息 <a id="screenshot" href="javascript:void(0);">查看截图示例</a>
            </h3>
            <div class="screenshot">
                <img src="images/shike/sk_zjgl_lqxd_bg_tbpj_default.png" alt="">
            </div>
            <form name="form1" id="form1" enctype="multipart/form-data" method="post" action="/shike_taobao_evaluation/submit_comment" >
            <div class="order_screenshot">
                <p class="uploading">
                    点击“收藏店铺”，收藏店铺后截图并上传
                    <a href="javascript:void(0);">
                        <input type="file" id="comment_img" name="comment_img" onchange="change_span()">
                        上传文件
                    </a>
                    <span id="upload_file_span"></span>
                </p>
                <p><span>图片的格式：gif、jpg、jpeg、png，图片大小不能大于1M。</span></p>
            </div>
            <input type="hidden" name="order_id" value="<?php echo $order['order_id'];?>">
            </form>
            <div class="last">
                <p>收货好评之后，商家将在48小时内确认评价，之后系统返款，请耐心等待，严禁到旺旺上催商家或者提及试用、返款等事宜。</p>
                <p>请按要求进行好评晒单，否则平台会冻结您的账户且试用本金将不予提现。</p>
            </div>
            <p class="step_btn">
                <input id="confirm_submit" class="next_step" type="button" value="已晒单评价">
            </p>
        </div>
    </div>
</section>
<script>
    function change_span(){
        $("#upload_file_span").text($("#comment_img").val());
    }
</script>
<div id="footer"></div>
<!--确定已付款弹框-->
<div class="confirm_submit_modal">
    <div class="modal_box">
        <div class="modal_prompt">
            <span>提示</span>
            <a class="close" href="javascript:void(0);">
                <img src="images/shike/sj_grzx_tc_off_default.png" alt="">
            </a>
        </div>
        <div class="modal_content">
            <!--确认审核-->
            <p class="confirm_audit">确定已淘宝晒单评价？</p>
        </div>
        <div class="modal_submit">
            <input class="" type="button" value="确定" onclick="submit_form1();"/>
            <input class="confirm" type="button" value="取消"/>
        </div>
    </div>
    <div class="mask_layer"></div>
</div>
<script src="js/shike/jquery-1.10.2.js"></script>
<script src="js/shike/modal_scrollbar.js"></script>
<script>
    $(function(){
        // $('#header').load("../common/merchant_header.html");
        // $('#footer').load("../common/footer.html");

        $('#screenshot').bind('click',function(){
            $('.screenshot').slideToggle();
        })
        //          弹框
//        模态框的高度(500：表示头部和尾部高度的和)；
        $('.mask_layer').height(document.body.offsetHeight+500);
//        确认审核
        $('#confirm_submit').bind('click',function(){
            $('.confirm_submit_modal').css('display','block');
            disableScroll();
        });

        $('.close,.cancel,.confirm').bind('click',function(){
            $('.confirm_submit_modal').css('display','none');
            enableScroll();
        });
    })

     function submit_form1(){
        if($("#comment_img").val()==''){
            alert("请上传图片");
            return;
        }
        $('#form1').submit();
    }
</script>
</body>
</html>