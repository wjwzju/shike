<?php $this->load->view('help_center/header.php'); ?>

<section id="section">
    <div class="section_main">
        <!--左侧导航-->
        <?php $this->load->view('help_center/helpCenter_leftNav.php'); ?>
        <!--右侧店铺管理-->
        <div class="content left">
            <h1 class="title">关于试客巴</h1>
            <div class="about_shike">
                <h2>1、什么是试客巴？</h2>
                <p>试客巴是专门为试客提供商品免费试用和优惠购物的平台，中奖无需返还试用商品，仅需对商品进行客观评价。</p>
                <h2>2、何时公布中奖结果？</h2>
                <P>试客申请试用商品，平台将于申请的72小时后公布中奖结果，获得试用资格的试客，方可进行下单领取。</P>
                <h2>3、中奖奖项都有什么？</h2>
                <p>中奖奖项有免费试用商品和优惠购买商品，获得免费试用的试客可以下单领取免费的商品，获得优惠购买的试客可以获得优惠券进行低价购买商品。</p>
                <h2>4、未中奖怎么办？</h2>
                <p>平台有不同类目的商家提供的试用商品供试客申请，如果试客未获得试用资格，不要灰心，可以申请其他试用商品。</p>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?>">
<link rel="stylesheet" href="<?=base_url('/css/mall/reset_content.css')?>">
<link rel="stylesheet" href="<?=base_url('/css/mall/shike_center.css')?>">

<script src="<?=base_url('/js/mall/jquery-1.10.2.js')?>"></script>
<script src="<?=base_url('/js/mall/modal_scrollbar.js')?>"></script>
<script>
    $(function(){
        $('#header').load('../common/merchant_header.html',function(){
            $('.details_title').text('帮助中心');
        });
        $('#left_nav').load("../common/helpCenter_leftNav.html",function(){
            $('.try_manage ul').find('a').eq(0).addClass('leftNav_active');
        });

    })
</script>

<?php $this->load->view('help_center/footer.php'); ?>