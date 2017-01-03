<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>帮助中心</title>
    <!--避免浏览器兼容性的js-->
    <link rel="stylesheet" href="<?=base_url('/css/mall/reset.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/merchant_header.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/shike_center.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/reset_content.css')?>">
    <link rel="stylesheet" href="<?=base_url('/css/mall/service_agreement.css')?>">
</head>
<body>
<!--商城的头部-->
<div class="header">
    <!--顶部-->
    <div class="top">
        <div class="top_main">
            <ul>
                <li ><a href="<?=base_url('mall/homepage/index')?>">返回首页</a></li>
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
                    echo '<li><a href="'.base_url('mall/register/merchant_register').'">登出</a></li>';
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
            <img class="logo" onclick="location.href='../register/index.html'" src="<?=base_url('/images/mall/xqy_logo_default.png')?>" alt="">
            <span class="details_title">帮助中心</span>
        </div>
    </div>
    <div class="line"></div>
</div>


