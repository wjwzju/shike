<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商城--首页</title>
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/index.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/carousel.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/bookmark_page.css")?>">
</head>
<body>
<!--页面的头部-->
<header id="header"></header>
<!--轮播部分-->
<nav id="nav">
    <div class="nav_content">
        <!--左侧导航-->
        <div class="left_nav left">
            <ul>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/1') ?>">女装</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/2') ?>">男装</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/3') ?>">美妆</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/4') ?>">鞋包配饰</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/5') ?>">居家生活</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/6') ?>">数码电器</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/7') ?>">母婴儿童</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/8') ?>">户外运动</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/9') ?>">食品酒水</a></li>
                <li class="left_nav_title"><a href="<?=base_url('mall/homepage/classify/10') ?>">其他</a></li>
            </ul>
        </div>
        <!--中间轮播广告-->
        <div class="center_carousel left">
            <!--轮播图-->
            <div id="myCarousel" class="carousel slide">
                <!--下方小圆点-->
                <!--<ol class="carousel-indicators">-->
                <!--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
                <!--<li data-target="#myCarousel" data-slide-to="1"></li>-->
                <!--<li data-target="#myCarousel" data-slide-to="2"></li>-->
                <!--</ol>-->
                <!--图片-->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?=base_url("images/mall/hb.png")?>" alt="">
                    </div>

                </div>
                <!--左右滑动按钮-->
                <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">-->
                <!--<img src="images/ad_arrow_left_default.png " alt="">-->
                <!--</a>-->
                <!--<a class="right carousel-control" href="#myCarousel" data-slide="next">-->
                <!--<img src="images/ad_arrow_right_default.png" alt="">-->
                <!--</a>-->
            </div>
            <!--下方导航-教程-->
            <div class="all_course">
                <ul>
                    <!--试客教程-->
                    <li class="shike_course">
                        <a href="#">
                        </a>
                    </li>
                    <!--商家教程教程-->
                    <li class="merchant_course">
                        <a href="#"></a>
                    </li>
                    <!--中奖秘笈-->
                    <li class="winning_tips">
                        <a href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--右侧登录-->
        <div class="right_login left">
            <!--商城登录-->
            <div class="store_login">
                <img src="<?=base_url("images/mall/nav_icon_touxiang_default.png")?>" alt="">
                <p>欢迎来到云推购</p>
                <input onclick="location.href='<?=base_url("login/index")?>'" class="login_btn" type="button" value="登录"/>
                <p class="register"><a href="<?=base_url('mall/register/shike_register')?>">注册试客</a><a href="<?=base_url('mall/register/merchant_register')?>">注册商家</a></p>
                <div class="project_pitching">
                    <ul>
                        <li><a href="<?=base_url('mall/homepage/affiche_details')?>">双11部分试用商品预售处理方案</a></li>
                        <li><a href="<?=base_url('mall/homepage/affiche_details')?>">双11部分试用商品预售处理方案</a></li>
                        <li><a href="<?=base_url('mall/homepage/affiche_details')?>">双11部分试用商品预售处理方案</a></li>
                    </ul>
                </div>
            </div>
            <!--商品狂欢-->
            <div class="commodity_sale">
                <img src="<?=base_url("images/mall/nav_bg_jp_default.png")?>" alt="">
            </div>
        </div>
    </div>
</nav>
<section id="section">
    <div class="section_content">
        <!--最新试用-->
        <h1 class="section_title"><img src="<?=base_url("images/mall/zuixin_bg_default.png")?>" alt=""></h1>
        <div class="latest_trial">
            <?php
                foreach($newest_list as $k=>$v)
                {
                    //运费
                    $freight = ($v['freight'])?'':'<span style="background-color:#36bc9e">包邮</span>';
                    echo '
            <div class="products left">
                <a href="'.base_url('mall/homepage/productdetails/'.$v['act_id']).'"><img src="'.$v['picture_url'].'" alt=""></a>
                <p class="product_introduction">'.$v['product_name'].'</p>
                <p class="quantity">
                    <span style="background-color:#a766e6" >限量版'.$v['apply_amount'].'</span>'.$freight.'
                </p>
                <p class="price">
                    <span>&yen;'.$v['unit_price'].'</span><span>已申请<b>'.$v['apply_count'].'</b>次</span>
                </p>
            </div>';
                }
            ;?>
        </div>
        <!--推荐试用-->
        <h1 class="section_title"><img src="../../images/mall/tuijian_bg_default.png" alt=""></h1>
        <div class="recommend_trial">
            <!--&lt;!&ndash;查看更多按钮&ndash;&gt;-->
            <!--<div class="see_more">-->
            <!--<input type="button"/>-->
            <!--</div>-->
        </div>

        <!--分页-->
        <div style="text-align:center;">
            <ul id="pagination" class="pagination-sm pagination"></ul>
        </div>
    </div>
</section>
<!--页面的尾部-->
<footer id="footer"></footer>
<script src="<?=base_url("js/mall/jquery-1.10.2.js")?>"></script>
<script src="<?=base_url("js/mall/bootstrap-transition.js")?>"></script>
<script src="<?=base_url("js/mall/bootstrap-carousel.js")?>"></script>
<script src="<?=base_url("js/mall/jquery.twbsPagination.js")?>"></script>
<script>
    $(function(){
        /*$('#header').load('../common/header.html');
        $('#footer').load('../common/footer.html');*/
        $('#header').load('../common/header.html',function(){
            $('.search .right ul').find('a').removeClass('header_active');
            $('.search .right ul').find('a').eq(0).addClass('header_active');
            conversion(0)
        });

        $('.shike_course').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_ren_selected.png)");
            $(this).find('a').css('margin-top','0px')
        });
        $('.shike_course').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_ren_default.png)");
            $(this).find('a').css('margin-top','10px')
        });
        $('.merchant_course').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_gwc_selected.png)");
            $(this).find('a').css('margin-top','0px')
        })
        $('.merchant_course').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_gwc_default.png)");
            $(this).find('a').css('margin-top','10px')
        });
        $('.winning_tips').mouseover(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_diannao_selected.png)");
            $(this).find('a').css('margin-top','0px')
        });
        $('.winning_tips').mouseout(function(){
            $(this).find('a').css("background-image","url(../../images/mall/nav_icon_diannao_default.png)");
            $(this).find('a').css('margin-top','10px')
        });
        //第1页
        $.ajax({
            //var base_url = 'localhost/shike/'
            url: "<?=base_url('mall/homepage/getRecommend')?>",
            method:'post',
            data:{
                page:1
            },
            success:function(result){
                result = JSON.parse(result);
                if(result.success==true){
                    //console.log(result.data)base_url('mall/homepage/productdetails/'.$v['act_id']
                    $('.classify_commodity').empty();
                    var html = '';
                    recommend_list = result.data.recommend_list;
                    recommend_list.forEach(function(e){
                        var freight = (e.freight != '0')?'<span style="height: 0px;"></span>':'<span>包邮</span>';
                        html += '<div class="products left">'+
                            '<a href="<?=base_url('mall/homepage/productdetails/')?>'+ e.act_id+ '"><img src="'+ e.picture_url + '" alt=""></a>'+
                            '<p class="product_introduction">'+ e.product_name +'</p>'+
                            '<p class="quantity">'+
                            '<span>限量版'+ e.apply_amount + '份</span>'+ freight+
                            '</p>'+
                            '<p class="price">'+
                            '<span>&yen;'+ e.unit_price +'</span><span>已申请<b>'+ e.apply_count+'</b>次</span>'+
                            '</p>'+
                            '</div>';
                        console.log(e)
                    });
                    $('.classify_commodity').append(html);
                }
                else{

                }
                //$('.xx').remove()
            },
            error:function(result){
                alert('error')
            }

        })

        //        分页
        $('#pagination').twbsPagination({
            totalPages: <?php echo !($recommend_count['count']%2)?($recommend_count['count']/2):(integer)($recommend_count['count']/2) + 1; ?>,//总页数
            //totalPages: 10,//总页数
            startPage:1,//开始的页码
            visiblePages: 7,//显示的页面的数字个数
            initiateStartPageClick:true,
            first:'首页',
            prev:'上一页',
            next:'下一页',
            last:'尾页',

        onPageClick: function (event, page) {
            //$('#page-content').text('Page ' + page);
            $.ajax({
                //var base_url = 'localhost/shike/'
                url: "<?=base_url('mall/homepage/getRecommend')?>",
                method:'post',
                data:{
                    page:page
                },
                success:function(result){
                    result = JSON.parse(result);
                    if(result.success==true){
                        //console.log(result.data)
                        $('.recommend_trial').empty();
                        var html = '';
                        recommend_list = result.data.recommend_list;
                        recommend_list.forEach(function(e){
                            var freight = (e.freight != '0')?'<span style="height: 0px;"></span>':'<span>包邮</span>';
                            html += '<div class="products left">'+
                                '<a href="<?=base_url('mall/homepage/productdetails/')?>'+ e.act_id+ '"><img src="'+ e.picture_url + '" alt=""></a>'+
                                '<p class="product_introduction">'+ e.product_name +'</p>'+
                                '<p class="quantity">'+
                                '<span>限量版'+ e.apply_amount + '份</span>'+ freight+
                                '</p>'+
                                '<p class="price">'+
                                '<span>&yen;'+ e.unit_price +'</span><span>已申请<b>'+ e.apply_count+'</b>次</span>'+
                            '</p>'+
                            '</div>';
                            console.log(e)
                        });
                        $('.recommend_trial').append(html);
                    }
                    else{

                    }
                    //$('.xx').remove()
                },
                error:function(result){
                    alert('error')
                }

        })
            console.log(page);
        }
        });

    })
</script>
</body>
</html>