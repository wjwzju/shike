<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
</head>

<style>
    .edit_merchant_block div{height:55px;}
</style>
<body>

    <div class="edit_merchant_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:block">
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p  style="font-size:30px;width:100%;margin:auto">角色名:</p></div>
            <div style="width:200px;float:left"><input id="edit_role_name" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden;height:170px">
             <div style="width:150px;float:left;height:55px"><p  style="font-size:30px;width:100%;margin:auto">模块权限:</p></div>
             <div style="width:300px;float:left;height:170px;">
                <div style="width:50%;float:left;height:55px;font-size:24px"><input id="pri_merchant_check" type="checkbox" style="margin-top:10px" <?php if(1):?>checked="checked"<?php endif;?>>商家管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input type="checkbox" style="margin-top:10px">试客管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input type="checkbox" style="margin-top:10px">活动管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input type="checkbox" style="margin-top:10px">订单管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input type="checkbox" style="margin-top:10px">资金管理</div>
                <div style="width:50%;float:left;height:55px;font-size:24px"><input type="checkbox" style="margin-top:10px">消息管理</div>
             </div>
        </div>
       
         <div style="overflow:hidden">
            <div style="width:200px;float:left"><input type="button" style="width:150px;height:55px;font-size:30px;margin-left:50px" value="保存" onclick="set_role_info()"></div>
            <div style="width:200px;float:left"><input type="button" style="width:150px;height:55px;font-size:30px;margin-left:50px" value="取消" onclick="cancle_seller_info()"></div>
            <div style="width:200px;float:left"><input type="button" style="width:150px;height:55px;font-size:30px;margin-left:50px" value="取消" onclick="cancle_seller_info()"></div>
        </div>
    </div>
<script>
    function set_role_info(){
        var res = $("#pri_merchant_check").is(':checked');
        console.log(res);
            // var seller_id =  $("#edit_merchant_id").text().substring(6);
            // var tel = $("#edit_merchant_phone").val();
            // var qq = $("#edit_merchant_qq").val();
            // console.log(seller_id);
            // console.log(typeof seller_id);
            // console.log(tel);
            // console.log(typeof tel);
            // console.log(qq);
            // console.log(typeof qq);
            // return;
            // $.ajax({
            //     url:"/admin_merchant_basic/set_seller_info",
            //     data:{
            //         seller_id:seller_id,
            //         tel:tel,
            //         qq:qq,
            //     },
            //     type:'post',  
            //     cache:false,  
            //     dataType:'json',  
            //     async: false,
            //     success:function(data){
            //         //console.log(data);
            //         location.reload();
            //     },
            //     error: function(XMLHttpRequest, textStatus, errorThrown) {
            //         console.log(XMLHttpRequest);
            //         console.log(textStatus);
            //         console.log(errorThrown);
            //     },
            // });
        }
        function edit_role(count){
            var id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_role_manage/get_role_info",
                data:{
                    id:id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_role_name").val(data.name);
                    // $("#edit_merchant_id").text("商家ID: "+data.seller_id);
                    // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    // $("#edit_account").text("账号: "+data.account);
                    // $("#edit_merchant_phone").val(data.tel);
                    // $("#edit_merchant_qq").val(data.qq);
                    // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                    // $(".edit_merchant_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
</script>
<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="/admin">首页</a></li>
            <li><a href="/admin_role_manage">角色管理</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label>角色账号</label><input name="" type="text" class="scinput" id="scinput"/></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
	    </ul>
    
	<div class="formtitle1"><span>角色管理</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>角色</th>
        <th>模块权限</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($role as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['name'];?></td>
        <td>
            <?php $str="";
            if($v['pri_merchant'] == 1){
                $str .="商家管理、";
            };
            if($v['pri_shike']){
                $str .="试客管理、";
            };
            if($v['pri_activity']){
                $str .="活动管理、";
            };
            if($v['pri_order']){
                $str .="订单管理、";
            };
            if($v['pri_money']){
                $str .="资金管理、";
            };
            if($v['pri_msg']){
                $str .="消息管理、";
            };
            echo $str;?>
        </td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_role(<?php echo $count;?>)">编辑</a></td>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['id'];?>">
        <?php endforeach ?>
        </tbody>
    </table>

    
    
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
    function search(){
            var account = $(".scinput").val();
            location.href="/admin_role_manage/search?search="+account;
        }
	</script>

</body>

</html>
