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

    <div class="edit_merchant_block" style="position:absolute;width:800px;height:300px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_merchant_id" style="font-size:30px;width:270px;margin:auto">发送对象</p></div>
            <!-- <div style="width:350px;float:left"> -->
                <select style="font-size:30px;width:470px;margin:auto;border:1px solid"><option value ="volvo">Volvo</option><option value ="saab">Saab</option>
                </select>
                
            <!-- </div> -->
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_account" style="font-size:30px;width:250px;margin:auto">账号:</p></div>
            <div style="width:120px;float:left"><p style="font-size:30px;width:120px;margin:auto">手机号:</p></div>
            <div style="width:370px;float:left"><input id="edit_merchant_phone" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:30px;width:90px;margin:auto">QQ号:</p></div>
            <div style="width:370px;float:left"><input id="edit_merchant_qq" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_merchant_type" style="font-size:30px;width:270px;margin:auto">会员类型:</p></div>
            <div style="width:490px;float:left"><p id="edit_end_time" style="font-size:30px;width:470px;margin:auto">会员到期时间:</p></div>
        </div>
         <div style="overflow:hidden">
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="保存" onclick="set_seller_info()"></div>
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:30px;margin-left:95px" value="取消" onclick="cancle_seller_info()"></div>
        </div>
    </div>


<section id="section">
    <div class="section_main">
    <aside class="left" id="left_nav" style="margin-left:-91px;"></aside>
	    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">订单列表</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
	    <ul>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="创建消息" onclick="create_table()"/></li>
	    </ul>
    
	<div class="formtitle1"><span>消息管理</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>时间</th>
        <th>发送对象</th>
        <th>标题</th>
        <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($messages as $v):?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['time'];?></td>
        <td><?php echo ($v['user_type']==1 ? '试客':'商家');?></td>
        <td><?php echo $v['title'];?></td>
        <td><a href="#" class="tablelink">编辑</a></td>
        </tr>
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
	
    function create_table(){
        $(".edit_merchant_block").css("display","block");
    }


</script>
</body>

</html>
