<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <div class="edit_shike_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_shike_id" style="font-size:30px;width:270px;margin:auto">试客ID:</p></div>
            <div style="width:490px;float:left"><p id="edit_reg_time" style="font-size:30px;width:470px;margin:auto">注册时间:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_account" style="font-size:30px;width:250px;margin:auto">账号:</p></div>
            <div style="width:120px;float:left"><p style="font-size:30px;width:120px;margin:auto">手机号:</p></div>
            <div style="width:370px;float:left"><input id="edit_shike_phone" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:30px;width:90px;margin:auto">QQ号:</p></div>
            <div style="width:370px;float:left"><input id="edit_shike_qq" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_shike_type" style="font-size:30px;width:270px;margin:auto">会员类型:</p></div>
            <div style="width:490px;float:left"><p id="edit_end_time" style="font-size:30px;width:470px;margin:auto">会员到期时间:</p></div>
        </div>
         <div style="overflow:hidden">
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="保存" onclick="set_shike_info()"></div>
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="取消" onclick="cancle_shike_info()"></div>
        </div>
    </div>
<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="javascript:void(0)">首页</a></li>
            <li><a href="/aadmin_shike_basic">订单列表</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>账号</label><input name="" type="text" class="scinput" /></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
	    </ul>
    <script>
        function search(){
            var account = $(".scinput").val();
            location.href="/admin_shike_basic/search?search="+account;
        }
    </script>
	<div class="formtitle1"><span>试客基本信息</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>试客ID</th>
        <th>注册时间</th>
        <th>试客账号</th>
        <th>手机号</th>
        <th>QQ号</th>
        <th>淘宝账号</th>
        <th>淘宝账号状态</th>
        <th>淘宝账号审核</th>
        <th>会员类型</th>
        <th>会员到期时间</th>
		<th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($users as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['user_id'];?></td>
        <td><?php echo $v['reg_time'];?></td>
        <td><?php echo $v['user_name'];?></td>
        <td><?php echo $v['phone'];?></td>
        <td><?php echo $v['user_qq'];?></td>
        <td><?php echo $v['taobao_id'];?></td>
        <td><?php 
        if(!$v['taobao_status']){
            echo "未绑定";
        }elseif($v['taobao_status'] == 1){
            echo "待审核";
        }else{
            echo "已审核";
        }?>
        </td>
        <td>
        <?php if($v['taobao_status'] == 1):?>
            <a href="#" class="tablelink">审核</a>
        <?php else:?>
            --
        <?php endif;?>
        </td>
        <td><?php echo ($v['level']==1 ? '试用会员':'正式会员');?></td>
		<td><?php echo $v['vip_endtime'];?></td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_shike(<?php echo $count;?>)">编辑</a></td>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['user_id'];?>">
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

    function edit_shike(count){
            var user_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_shike_basic/get_user_info",
                data:{
                    user_id:user_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_shike_id").text("商家ID: "+data.user_id);
                    if(data.reg_time){
                        $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    }
                    $("#edit_account").text("账号: "+data.user_name);
                    $("#edit_shike_phone").val(data.phone);
                    $("#edit_shike_qq").val(data.user_qq);
                    $("#edit_shike_type").text("会员类型: "+(data.level==1 ? '试用会员':'正式会员'));
                    $("#edit_end_time").text("会员到期时间: "+data.vip_endtime.substring(0,10));

                    $(".edit_shike_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function set_shike_info(){
            var user_id =  $("#edit_shike_id").text().substring(6);
            var tel = $("#edit_shike_phone").val();
            var qq = $("#edit_shike_qq").val();
            // console.log(seller_id);
            // console.log(typeof seller_id);
            // console.log(tel);
            // console.log(typeof tel);
            // console.log(qq);
            // console.log(typeof qq);
            // return;
            $.ajax({
                url:"/admin_shike_basic/set_user_info",
                data:{
                    user_id:user_id,
                    tel:tel,
                    qq:qq,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    //console.log(data);
                    location.reload();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }

        function cancle_shike_info(){
            $(".edit_shike_block").css("display","none");
        }
	</script>

</body>

</html>
