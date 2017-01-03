<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <title>商城头部</title>-->
    <!--避免浏览器兼容性的js-->
    <link rel="stylesheet" href="<?=base_url("css/mall/reset.css")?>">
    <link rel="stylesheet" href="<?=base_url("css/mall/header.css")?>">
</head>
<body>
<!--商城的头部-->
<div class="header">
    <!--顶部-->
    <div class="top">
        <div class="top_main">
            <ul>
                <?php
                    //echo json_encode($_SESSION);
                    if(isset($_SESSION['user_id']))
                    {
                        if($_SESSION['shike_login'])
                        {
                            echo '<li><a class="merchant_active" href="'.base_url('shike_personal').'">'.$_SESSION['user_name'].'</a></li>';
                        }else
                        {
                            echo '<li><a class="merchant_active" href="'.base_url('merchant_personal').'">'.$_SESSION['user_name'].'</a></li>';
                        }
                        echo '<li><a href="'.base_url('login/logout').'">登出</a></li>';
                    }else
                    {
                        echo '<li><a href="'.base_url('login/index').'">登录</a></li>';
                        echo '<li><a href="'.base_url('mall/register/merchant_register').'">商家注册</a></li>';
                        echo '<li><a href="'.base_url('mall/register/shike_register').'">注册试客</a></li>';
                    }
                ?>
                <li><a href="<?=base_url('mall/help_center/help_center')?>">帮助中心</a></li>
            </ul>
        </div>
    </div>
    <!--Logo和搜索框-->
    <div class="search">
        <div class="left">
            <img class="logo" onclick="location.href='<?php echo base_url().'mall/homepage/index'; ?>'" src="<?=base_url("images/mall/logo_default.png")?>" alt="">
        </div>
        <div class="right">
            <ul class="nav left">
                <li class="nav_title_index"><a href=<?php echo base_url().'mall/homepage/index'; ?> >首页</a></li>
                <li class="nav_title"><a href=<?php echo base_url().'mall/homepage/newest'; ?> >最新试用</a></li>
                <li class="nav_title"><a href=<?php echo base_url().'mall/homepage/hottest'; ?> >最热试用</a></li>
            </ul>
            <div class="search_box left">
                <input type="text" style="margin-top: 7px;" placeholder="搜索" >
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url("js/mall/jquery-1.10.2.js")?>"></script>
<script>
    function conversion(i){

        $('.search .nav').mouseover(function(){
            $('.search .right ul').find('a').removeClass('header_active');
        });

        $('.search .nav').mouseout(function(){
            $('.search .right ul').find('a').removeClass('header_active');
            $('.search .right ul').find('a').eq(i).addClass('header_active');
        });

        $('.search_box input').on('click',function(){
            return false;
        })

        $('.search_box').on('click',function(){
            console.log($('.search_box input').val());
            var search = $('.search_box input').val();
            if(search === '')
            {

            }else
            {
                var url = "<?=base_url('mall/homepage/search/')?>";
                url = url + search;
                location.href = url;
            }
        })
    }
</script>
</body>
</html>










