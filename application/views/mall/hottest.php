<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商城--最热试用</title>
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/search_page.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/bookmark_page.css")?>">
</head>
<body>
<header id="header"></header>
<section id="section">
    <!--<div class="classify_title">-->
    <!--<ul>-->
    <!--<li>您的位置：</li>-->
    <!--<li>首页</li>-->
    <!--<li><img src="../../images/icon_arrow_default.png" alt=""></li>-->
    <!--<li>女装</li>-->
    <!--</ul>-->
    <!--</div>-->
    <!--分类导航-->
    <div class="classify_nav">
        <ul>
            <<li class="nav"><a href="<?=base_url('mall/homepage/classify/1') ?>">女装</a><span>/</span></li>
            <li class="nav"><a href="<?=base_url('mall/homepage/classify/2') ?>">男装</a><span>/</span></li>
            <li class="nav"><a href="<?=base_url('mall/homepage/classify/3') ?>">鞋包配饰</a><span>/</span></li>
            <li class="nav"><a href="<?=base_url('mall/homepage/classify/4') ?>">居家生活</a><span>/</span></li>
            <li class="nav"><a href="<?=base_url('mall/homepage/classify/5') ?>">数码电器</a><span>/</span></li>
            <li class="nav"><a href="<?=base_url('mall/homepage/classify/6') ?>">母婴儿童</a><span>/</span></li>
            <li class="nav"><a href="<?=base_url('mall/homepage/classify/7') ?>">食品酒水</a><span>/</span></li>
            <li class="nav"><a href="<?=base_url('mall/homepage/classify/8') ?>">其他</a></li>
        </ul>
    </div>
    <div class="classify_commodity">
    </div>
    <!--分页-->
    <div style="text-align:center;">
        <ul id="pagination" class="pagination-sm pagination"></ul>
    </div>
</section>


<footer id="footer"></footer>
<script src="<?=base_url("js/mall/jquery-1.10.2.js")?>"></script>
<script src="<?=base_url("js/mall/jquery.twbsPagination.js")?>"></script>
<script>
    $(function(){
        $('#header').load('<a></a>',function(){
//            $('.search .right ul').find('a').removeClass('header_active');
            $('.search .right ul').find('a').eq(2).addClass('header_active');
            conversion(2);
            $('.details_title').text('最热试用');
        });
        $('#footer').load('<a></a>');
        $('.nav').bind('click',function(){
            $(this).find('a').addClass('classify_active');
            $(this).siblings().find('a').removeClass('classify_active');
        })
        //第1页
        $.ajax({
            //var base_url = 'localhost/shike/'
            url: "<?=base_url('mall/homepage/getHottest')?>",
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
                    recommend_list = result.data.hottest_list;
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
            totalPages: <?php echo !($hottest_count['count']%2)?($hottest_count['count']/2):(integer)($hottest_count['count']/2) + 1; ?>,//总页数
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
                    url: "<?=base_url('mall/homepage/getHottest')?>",
                    method:'post',
                    data:{
                        page:page
                    },
                    success:function(result){
                        result = JSON.parse(result);
                        if(result.success==true){
                            //console.log(result.data)base_url('mall/homepage/productdetails/'.$v['act_id']
                            $('.classify_commodity').empty();
                            var html = '';
                            recommend_list = result.data.hottest_list;
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
                console.log(page);
            }
        });

    })
</script>
</body>
</html>