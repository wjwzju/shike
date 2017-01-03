<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/select.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/merchant/store_manage.css">
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<style>
    .edit_shop_block div{height:55px;}
</style>
<div class="edit_shop_block" style="position:absolute;width:800px;height:450px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
    <form enctype="multipart/form-data" method="post" action="/admin_merchant_shop/edit_shop_info">
    <div style="overflow:hidden">
        <div style="width:300px;float:left"><p id="edit_shop_id" style="font-size:30px;width:270px;margin:auto">店铺ID:</p></div>
        <div style="width:490px;float:left"><p id="edit_bind_time" style="font-size:30px;width:470px;margin:auto">绑定时间:</p></div>
    </div>
    <div style="overflow:hidden">
        <div style="width:300px;float:left"><p id="edit_account" style="font-size:30px;width:250px;margin:auto">账号:</p></div>
        <div style="width:140px;float:left"><p style="font-size:30px;width:140px;margin:auto">店铺名称:</p></div>
        <div style="width:350px;float:left"><input name="edit_shop_name" id="edit_shop_name" type="text" style="height:40px;border:1px solid;width:100%"></div>
    </div>
    <div style="overflow:hidden">
        <div style="width:140px;float:left"><p style="font-size:30px;width:100%;margin:auto">店铺链接:</p></div>
        <div style="width:650px;float:left"><input name="edit_shop_link" type="text" id="edit_shop_link" style="font-size:30px;width:100%;margin:auto;border:1px solid;"></div>
    </div>
    <div style="overflow:hidden">
        <div style="width:140px;float:left"><p style="font-size:30px;width:100%;margin:auto">平台:</p></div>
        <div style="width:650px;float:left"><p id="edit_shop_platform" style="font-size:30px;width:50%;"></p></div>
    </div>
    <div style="overflow:hidden">
        <div style="width:140px;float:left"><p style="font-size:30px;width:100%;margin:auto">店铺logo:</p></div>
        <div style="width:300px;float:left"><input name="edit_shop_logo" type="file" id="edit_shop_logo" style="font-size:30px;width:100%;" onchange="change_logo_value()"></div>
        <div style="width:300px;float:left"><p id="shop_logo_value" style="font-size:30px;width:100%;margin-left:-160px;z-index:103;background:white"></p></div>
    </div>
    <div style="overflow:hidden">
        <div style="width:140px;float:left"><p style="font-size:30px;width:100%;margin:auto">旺旺:</p></div>
        <div style="width:250px;float:left"><input name="edit_wangwang" type="text" id="edit_wangwang" style="font-size:30px;width:100%;margin:auto;border:1px solid;"></div>
        <div style="width:140px;float:left"><p style="font-size:30px;width:100%;margin:auto">QQ:</p></div>
        <div style="width:250px;float:left"><input name="edit_qq" type="text" id="edit_qq" style="font-size:30px;width:100%;margin:auto;border:1px solid;"></div>
    </div>
    <div style="overflow:hidden">
        <div style="width:140px;float:left"><p style="font-size:30px;width:100%;margin:auto">微信:</p></div>
        <div style="width:250px;float:left"><input name="edit_wx" type="text" id="edit_wx" style="font-size:30px;width:100%;margin:auto;border:1px solid;"></div>
        <div style="width:140px;float:left"><p style="font-size:30px;width:100%;margin:auto">手机:</p></div>
        <div style="width:250px;float:left"><input name="edit_tel" type="text" id="edit_tel" style="font-size:30px;width:100%;margin:auto;border:1px solid;"></div>
    </div>
     <div style="overflow:hidden">
        <div style="width:390px;float:left"><input type="submit" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="保存"></div>
        <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="取消" onclick="cancle_shop_info()"></div>
    </div>
    <input type="hidden" id="edit_seller_id" name="edit_seller_id">
    <input type="hidden" id="edit_shop_idd" name="edit_shop_idd">
    </form>
</div>

<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	   <div class="place">
            <span>位置：</span>
            <ul class="placeul">
                <li><a href="/admin">首页</a></li>
                <li><a href="/admin_merchant_shop">店铺管理</a></li>
            </ul>
        </div>
    
        <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>店铺名</label><input name="" type="text" class="scinput" /></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
		
        </ul>
        <script>
            function search(){
                var account = $(".scinput").val();
                location.href="/admin_merchant_shop/search?search="+account;
            }
        </script>
    
	    <div class="formtitle1"><span>商家基本信息</span></div>
        <table class="tablelist">
    	    <thead>
    	    <tr>
                <th><input name="" type="checkbox" value="" checked="checked"/></th>
                <th>店铺ID</th>
                <th>绑定时间</th>
                <th>商家账号</th>
                <th>店铺名称</th>
                <th>店铺链接</th>
                <th>平台</th>
                <th>店铺logo</th>
                <th>旺旺</th>
                <th>负责人QQ</th>
                <th>负责人微信</th>
                <th>负责人手机</th>
        		<th>操作</th>
            </tr>
            </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($shops as $v):?>
        <?php $count++;?>
            <tr>
                <td><input name="" type="checkbox" value="" /></td>
                <td><?php echo $v['shop_id'];?></td>
                <td><?php echo $v['bind_time'];?></td>
                <td><?php echo $v['seller_id'];?></td>
                <td><?php echo $v['shop_name'];?></td>
                <td><?php echo $v['shop_link'];?></td>
                <td><?php echo ($v['platform_id']==1 ? '淘宝':'天猫');?></td>
        		<td><img style="width:100px;height:25px" src="<?php echo $v['logo_link'];?>"></td>
                <td><?php echo $v['wangwang'];?></td>
                <td><?php echo $v['chargeqq'];?></td>
                <td><?php echo $v['chargewx'];?></td>
                <td><?php echo $v['chargetel'];?></td>
                <td><a href="javascript:void(0)" class="tablelink" onclick="edit_merchant(<?php echo $count;?>)">编辑</a></td>
            </tr>
             <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['shop_id'];?>">
        <?php endforeach ?>
        </tbody>
    </table>
    <?php echo $pagin; ?>
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
            </div> 
        </div>   
    </div>
</section>
<script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
    function change_shop(){
        $('.modify_modal').css('display','block');
    }

     function edit_merchant(count){
            var shop_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_merchant_shop/get_shop_info",
                data:{
                    shop_id:shop_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_shop_id").text("店铺ID: "+data.shop_id);
                    $("#edit_bind_time").text("绑定时间: "+data.bind_time.substring(0,10));
                    $("#edit_account").text("账号: "+data.account);
                    $("#edit_shop_name").val(data.shop_name);
                    $("#edit_shop_link").val(data.shop_link);
                    $("#edit_shop_platform").text(data.platform_id==1?'淘宝':'天猫');
                    $("#shop_logo_value").text(data.logo_link);
                    $("#edit_wangwang").val(data.wangwang);
                    $("#edit_qq").val(data.chargeqq);
                    $("#edit_wx").val(data.chargewx);
                    $("#edit_tel").val(data.chargetel);
                    $("#edit_seller_id").val(data.seller_id);
                    $("#edit_shop_idd").val(data.shop_id);
                    // $("#edit_merchant_qq").val(data.qq);
                    // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                    $(".edit_shop_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function change_logo_value(){
            $("#shop_logo_value").text($("#edit_shop_logo").val());
        }
        function cancle_shop_info(){
            $(".edit_shop_block").css("display","none");
        }
</script>

</body>

</html>
