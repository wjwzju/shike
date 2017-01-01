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
    
	    <ul class="seachform">
		  <li><label>商品名</label><input name="" type="text" class="scinput" /></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
	    </ul>
    
	<div class="formtitle1"><span>消息管理</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>绑定时间</th>
        <th>商家账号</th>
        <th>银行卡号</th>
        <th>所属银行</th>
        <th>开户行支行名称</th>
        <th>开户人姓名</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($merchant_cards as $v):?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['time'];?></td>
        <td><?php echo $v['user_id'];?></td>
        <td><?php echo $v['banknum'];?></td>
        <td><?php echo $v['banktype'];?></td>
        <td><?php echo $v['branchbank'];?></td>
        <td><?php echo $v['name'];?></td>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <div class="rightinfo">
    
        <ul class="seachform">
          <li><label>商品名</label><input name="" type="text" class="scinput" /></li>
          <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
        </ul>
    
    <div class="formtitle1"><span>消息管理</span></div>
    <table class="tablelist">
        <thead>
        <tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>绑定时间</th>
        <th>试客账号</th>
        <th>银行卡号</th>
        <th>所属银行</th>
        <th>开户行支行名称</th>
        <th>开户人姓名</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($shike_cards as $v):?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['time'];?></td>
        <td><?php echo $v['user_id'];?></td>
        <td><?php echo $v['banknum'];?></td>
        <td><?php echo $v['banktype'];?></td>
        <td><?php echo $v['branchbank'];?></td>
        <td><?php echo $v['name'];?></td>
        </tr>
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
	</script>

</body>

</html>