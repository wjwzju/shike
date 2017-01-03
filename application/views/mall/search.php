<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商城--搜索页</title>
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/search_page.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/bookmark_page.css")?>">
</head>
<body>
<header id="header"></header>
<section id="section">
    <div class="search_title">
        <ul>
            <li>您的位置：</li>
            <li>首页</li>
            <li><img src="<?=base_url("images/mall/icon_arrow_default.png")?>" alt=""></li>
            <li>商品搜索</li>
        </ul>
    </div>
    <div class="search_commodity">
        <?php
/*        foreach($search_list as $k=>$v)
        {
            //运费
            $freight = ($v['freight'])?'':'包邮';
            echo '
            <div class="products left">
                <a href="'.base_url('mall/homepage/productdetails/'.$v['act_id']).'"><img src="'.$v['picture_url'].'" alt=""></a>
                <p class="product_introduction">'.$v['product_name'].'</p>
                <p class="quantity">
                    <span>限量版'.$v['apply_amount'].'</span><span>'.$freight.'</span>
                </p>
                <p class="price">
                    <span>&yen;'.$v['unit_price'].'</span><span>已申请<b>'.$v['apply_apply_amount'].'</b>次</span>
                </p>
            </div>';
        }
        ;*/?>
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
        $('#header').load('../common/details_header.html',function(){
            $('.search .right ul').find('a').removeClass('header_active');
            $('.search .right ul').find('a').eq(0).addClass('header_active');
            conversion(0);
            $('.details_title').text('商品搜索')

        });
        $('#footer').load('../common/footer.html');

        //第1页
        $.ajax({
            //var base_url = 'localhost/shike/'
            url: "<?=base_url('mall/homepage/searchList')?>",
            method:'post',
            data:{
                page:1,
                search : "<?php echo $search;?>"
            },
            success:function(result){
                result = JSON.parse(result);
                if(result.success==true){
                    //console.log(result.data)base_url('mall/homepage/productdetails/'.$v['act_id']
                    $('.search_commodity').empty();
                    var html = '';
                    search_list = result.data.search_list;
                    search_list.forEach(function(e){
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
                    $('.search_commodity').append(html);
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
            totalPages: <?php echo !($search_count['count']%2)?($search_count['count']/2):(integer)($search_count['count']/2) + 1; ?>,//总页数
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
                    url: "<?=base_url('mall/homepage/searchList')?>",
                    method:'post',
                    data:{
                        page:page,
                        search : "<?php echo $search;?>"
                    },
                    success:function(result){
                        result = JSON.parse(result);
                        if(result.success==true){
                            //console.log(result.data)
                            $('.search_commodity').empty();
                            var html = '';
                            search_list = result.data.search_list;
                            search_list.forEach(function(e){
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
                            $('.search_commodity').append(html);
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