<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<!-- <script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="js/select-ui.min.js"></script>
<script type="text/javascript" src="editor/kindeditor.js"></script>

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
$(document).ready(function(e) {

	$(".select3").uedSelect({
		width : 152
	});
});
</script> -->


</head>
<script>
    // $(document).click(function(){
    //     $(".edit_activity_block").hide();
    //     $(".edit_shike_info_block").hide();

    // });
    // $(".edit_activity_block").click(function(event){
    // event.stopPropagation();});
    // $(".edit_shike_info_block").click(function(event){
    // event.stopPropagation();});
</script>
<style>
    .edit_merchant_block div{height:55px;}
</style>
<body>
    <div class="edit_activity_block" style="position:absolute;width:800px;height:800px;border:1px solid;background:white;z-index:101;top:500px;right:0;display:none">
        <img src="images/close.jpg" style="width:30px;height:30px;position:absolute;top:0;right:0;cursor:pointer" onclick="hide_edit_activity_block()">
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_act_id" style="font-size:24px;width:270px;margin:auto">活动订单号:</p></div>
            <div style="width:490px;float:left"><p id="edit_gene_time" style="font-size:24px;width:470px;margin:auto">生成时间:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_account" style="font-size:24px;width:250px;margin:auto">账号:</p></div>
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">商品名称</p></div>
            <div style="width:370px;float:left"><input id="edit_product_name" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">商品链接</p></div>
            <div style="width:500px;float:left"><input id="edit_product_link" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">店铺名称</p></div>
            <div style="width:250px;float:left"><input id="edit_shop_name" type="text" style="height:40px;border:1px solid;width:100%"></div>
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">平台</p></div>
            <div style="width:250px;float:left"><input id="edit_platform" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">商品主图</p></div>
            <div style="width:500px;float:left"><input id="edit_picture_url" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">商品分类</p></div>
            <div style="width:250px;float:left"><input id="edit_product_classify" type="text" style="height:40px;border:1px solid;width:100%"></div>
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">商品规格</p></div>
            <div style="width:100px;float:left"><input id="edit_color" type="text" style="height:40px;border:1px solid;width:100%"></div>
            <div style="width:100px;float:left"><input id="edit_size" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:350px;float:left"><p id="edit_unit_price" style="font-size:24px;width:270px;margin:auto">单品价格:</p></div>
            <div style="width:440px;float:left"><p id="edit_buy_sum" style="font-size:24px;width:470px;margin:auto">每单拍 件</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:150px;float:left"><p style="font-size:24px;width:100%;margin:auto">商品运费:</p></div>
            <div style="width:200px;float:left"><input id="check_freight1" name="check_freight" type="radio" style="float:left;width:10%"><p style="font-size:24px;width:90%;margin:auto">全国包邮</p></div>
            <div style="width:120px;float:left"><input id="check_freight2" name="check_freight" type="radio" style="float:left;width:10%"><p id="edit_buy_sum" style="font-size:24px;width:90%;margin:auto">收取费用</p></div>
            <div style="width:200px;float:left"><input id="edit_freight" style="width:90%;border:1px solid;height:30px" type="text">元</div>
        </div>
        <div style="overflow:hidden">
            <div style="width:200px;float:left"><p style="font-size:24px;width:100%">搜索方式:</p></div>
            <div style="width:120px;float:left"><p id="edit_search_platform" style="font-size:24px;width:120px;margin:auto"></p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:200px;float:left"><p style="font-size:24px;width:100%">搜索关键字:</p></div>
            <div style="width:120px;float:left"><p id="edit_key_words" style="font-size:24px;width:120px;margin:auto"></p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:150px;float:left"><p style="font-size:24px;width:100%;margin:auto">商品搜索主图</p></div>
            <div style="width:500px;float:left"><input id="edit_t_picture_url" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">筛选列表</p></div>          
            <div style="width:120px;float:left"><input id="edit_t_classify1" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:120px;float:left"><input id="edit_t_classify2" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:120px;float:left"><input id="edit_t_classify3" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:120px;float:left"><input id="edit_t_classify4" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:120px;float:left"><input id="edit_t_classify5" type="text" style="height:40px;border:1px solid;width:90%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">折扣服务</p></div>          
            <div style="width:60px;float:left"><input id="edit_ser1" type="checkbox" style="float:left;width:10%">包邮</div>
            <div style="width:60px;float:left"><input id="edit_ser2" type="checkbox" style="float:left;width:10%">赠送退货运费险</div>
            <div style="width:60px;float:left"><input id="edit_ser3" type="checkbox" style="float:left;width:10%">货到付款</div>
            <div style="width:60px;float:left"><input id="edit_ser4" type="checkbox" style="float:left;width:10%">海外商品</div>
            <div style="width:60px;float:left"><input id="edit_ser5" type="checkbox" style="float:left;width:10%">二手</div>
            <div style="width:60px;float:left"><input id="edit_ser6" type="checkbox" style="float:left;width:10%">天猫</div>
            <div style="width:60px;float:left"><input id="edit_ser7" type="checkbox" style="float:left;width:10%">正品保障</div>
            <div style="width:60px;float:left"><input id="edit_ser8" type="checkbox" style="float:left;width:10%">24小时内发货</div>
            <div style="width:60px;float:left"><input id="edit_ser9" type="checkbox" style="float:left;width:10%">7+天退换货</div>
            <div style="width:60px;float:left"><input id="edit_ser10" type="checkbox" style="float:left;width:10%">旺旺在线</div>
            <div style="width:60px;float:left"><input id="edit_ser11" type="checkbox" style="float:left;width:10%">新品</div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:120px;margin:auto">排序方式</p></div>
            <div style="width:250px;float:left"><input id="edit_t_sort" type="text" style="height:40px;border:1px solid;width:100%"></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:120px;float:left"><p style="font-size:24px;width:100%;margin:auto">价格</p></div>          
            <div style="width:120px;float:left"><input id="edit_lower_price" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:30px;float:left">元-</div>
            <div style="width:120px;float:left"><input id="edit_higher_price" type="text" style="height:40px;border:1px solid;width:90%"></div>
            <div style="width:30px;float:left">元</div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_deposit" style="font-size:24px;width:270px;margin:auto">商品押金:</p></div>
            <div style="width:490px;float:left"><p id="edit_guarantee" style="font-size:24px;width:470px;margin:auto">试用担保金:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_total_money" style="font-size:24px;width:270px;margin:auto">订单合计:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_status" style="font-size:24px;width:270px;margin:auto">状态:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_apply_user" style="font-size:24px;width:270px;margin:auto">申请试客:</p></div>
        </div>
        <div style="overflow:hidden">
            <div style="width:300px;float:left"><p id="edit_apply_user_suc" style="font-size:24px;width:270px;margin:auto">中奖试客:</p></div>
        </div>
         <div style="overflow:hidden">
            <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:24px;margin-left:95px" value="确定" onclick="hide_edit_activity_block()"></div>
            <!-- <div style="width:390px;float:left"><input type="button" style="width:200px;height:55px;font-size:24px;margin-left:95px" value="取消" onclick="cancle_seller_info()"></div> -->
        </div>
    </div>

    <div class="edit_shike_info_block" style="position:absolute;width:280px;height:400px;border:1px solid;background:white;z-index:101;top:500px;right:200px;display:none">
        <img src="images/close.jpg" style="width:30px;height:30px;position:absolute;top:0;right:0;cursor:pointer" onclick="hide_edit_shike_info_block()">
        <div style="overflow:hidden;width:220px;margin:20px auto 0">
            <input style="float:left;border:1px solid;width:100px" type="text" id="shike_search">
            <input type="hidden" id="hidden_act_id">
            <input style="float:left;border:1px solid;width:80px;margin-left:20px" type="button" value="查询" onclick="shike_search()">
        </div>
        <div class="shike_info_block2" style="overflow:hidden;width:220px;height:300px;margin:20px auto 0;overflow-y:scroll">
            <div>试客账号</div>
        </div>
    </div>
    <style>
        .shike_info_block2 div{text-align:center;height:30px;line-height:30px;border:1px solid}
    </style>

    <script>
        function hide_edit_activity_block(){
            $(".edit_activity_block").css("display","none");
        }
        function hide_edit_shike_info_block(){
            $(".edit_shike_info_block").css("display","none");
        }
        function edit_activity(count){
            var act_id = $("#tag_"+count).val();
            $.ajax({
                url:"/admin_activity_manage/get_activity_info",
                data:{
                    act_id:act_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $("#edit_act_id").text("活动订单号: "+data.act_id);
                    $("#edit_gene_time").text("生成时间: "+data.gene_time.substring(0,10));
                    $("#edit_account").text("账号: "+data.seller_id);
                    $("#edit_product_name").val(data.product_name);
                    $("#edit_product_link").val(data.product_link);
                    $("#edit_shop_name").val(data.shopname);
                    $("#edit_platform").val(data.platformid);
                    $("#edit_picture_url").val(data.picture_url);
                    $("#edit_product_classify").val(data.product_classify);
                    $("#edit_color").val(data.color);
                    $("#edit_size").val(data.size);
                    $("#edit_unit_price").text("单品价格:"+data.unit_price);
                    $("#edit_buy_sum").text("每单拍"+data.buy_sum+"件");
                    $("#edit_freight").val(data.freight);
                    $("#edit_search_platform").text(data.platformid);
                    $("#edit_key_words").text(data.t_key_words);
                    $("#edit_t_picture_url").val(data.t_picture_url);
                    $("#edit_t_classify1").val(data.t_classify1);
                    $("#edit_t_classify2").val(data.t_classify2);
                    $("#edit_t_classify3").val(data.t_classify3);
                    $("#edit_t_classify4").val(data.t_classify4);
                    $("#edit_t_classify5").val(data.t_classify5);
                    $("#edit_t_sort").val(data.t_sort);
                    $("#edit_deposit").text("商品押金:"+data.deposit);
                    $("#edit_guarantee").text("试用担保金"+data.guarantee);
                    $("#edit_total_money").text("订单合计："+data.total_money);
                    $("#edit_status").text("状态"+data.status);
                    $("#edit_apply_user").text("申请试客：查看（"+data.apply_amount+"）");
                    $("#edit_apply_user").bind("click",function(){
                      edit_shike_info(count);
                    });
                    $("#edit_apply_user_suc").text("中奖试客");
                    // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    // $("#edit_account").text("账号: "+data.account);
                    // $("#edit_merchant_phone").val(data.tel);
                    // $("#edit_merchant_qq").val(data.qq);
                    // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                    $(".edit_activity_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function shike_search(){
            var search = $("#shike_search").val();
            var act_id = $("#hidden_act_id").val();
            $.ajax({
                url:"/admin_activity_manage/get_shike_info_by_apply2",
                data:{
                    user_id:search,
                    act_id:act_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    $(".shike_info_block2").children().remove();
                    var html = '<div>试客账号</div>';
                     for(var i=0;i<data.length;i++){
                        html += "<div>"+data[i].user_id+"</div>"
                    }
                    $(".shike_info_block2").append(html);
                    // var html = '';
                    // for(var i=0;i<data.length;i++){
                    //     html += "<div>"+data[i].user_id+"</div>"
                    // }
                    // console.log(html);
                    // $(".shike_info_block2").append(html);
                    // // $("#edit_merchant_id").text("商家ID: "+data.seller_id);
                    // // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    // // $("#edit_account").text("账号: "+data.account);
                    // // $("#edit_merchant_phone").val(data.tel);
                    // // $("#edit_merchant_qq").val(data.qq);
                    // // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));

                    // $(".edit_shike_info_block").css("display","block");
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
            <li><a href="/admin_activity_manage">活动管理</a></li>
        </ul>
    </div>
    
    <div class="rightinfo">
    
	    <ul class="seachform">
		  <li><label></label><input name="" type="text" class="scinput" /></li>
		  <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询" onclick="search()"/></li>
	    </ul>
    <script>
        function search(){
            var account = $(".scinput").val();
            location.href="/admin_activity_manage/search?search="+account;
        }
    </script>
	<div class="formtitle1"><span>商家基本信息</span></div>
    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>活动订单号</th>
        <th>生成时间</th>
        <th>商品名称</th>
        <th>商品链接</th>
        <th>店铺名称</th>
        <th>平台</th>
        <th>试用份数</th>
        <th>商品运费</th>
        <th>商品押金</th>
        <th>试用担保金</th>
        <th>订单合计</th>
        <th>申请试客</th>
        <th>状态</th>
		<th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=-1;?>
        <?php foreach($activity as $v):?>
        <?php $count++;?>
        <tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo $v['act_id'];?></td>
        <td><?php echo $v['gene_time'];?></td>
        <td><?php echo $v['product_name'];?></td>
        <td><?php echo $v['product_link'];?></td>
        <td><?php echo $v['shopname'];?></td>
        <td><?php echo ($v['platformid']==1 ? '淘宝':'天猫');?></td>
        <td><?php echo $v['apply_amount'];?></td>
        <td><?php echo $v['freight'];?></td>
        <td><?php echo $v['deposit'];?></td>
        <td><?php echo $v['guarantee'];?></td>
        <td><?php echo $v['total_money'];?></td>
        <?php if(!$v['apply_amount']):?>
        <td onclick="javascript:void(0)">查看（<?php echo $v['apply_amount'];?>）</td>
        <?php else:?>
        <td style="color:#00a4ac;cursor:pointer" onclick="edit_shike_info(<?php echo $count;?>)">查看（<?php echo $v['apply_amount'];?>）</td>
        <?php endif;?>
        <td><?php if($v['status']==1){
            echo "待付款";
        }elseif ($v['status']==2) {
            echo "待发布";
        }elseif ($v['status']==3) {
            echo "待开奖";
        }elseif ($v['status']==4) {
            echo "已开奖";
        }elseif ($v['status']==5) {
            echo "已取消";
        };?></td>
        <td><a href="javascript:void(0)" class="tablelink" onclick="edit_activity(<?php echo $count;?>)">查看</a></td>
        </tr>
        <input type="hidden" id="tag_<?php echo $count;?>" value="<?php echo $v['act_id'];?>">
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
	</script>
    <script>

        function edit_shike_info(count){
            var act_id = $("#tag_"+count).val();
            $("#hidden_act_id").val(act_id);
            $.ajax({
                url:"/admin_activity_manage/get_shike_info_by_apply",
                data:{
                    act_id:act_id,
                },
                type:'post',  
                cache:false,  
                dataType:'json',  
                async: false,
                success:function(data){
                    console.log(data);
                    console.log(data[0]);
                    console.log(data.length);
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        html += "<div>"+data[i].user_id+"</div>"
                    }
                    console.log(html);
                    $(".shike_info_block2").append(html);
                    // $("#edit_merchant_id").text("商家ID: "+data.seller_id);
                    // $("#edit_reg_time").text("注册时间: "+data.reg_time.substring(0,10));
                    // $("#edit_account").text("账号: "+data.account);
                    // $("#edit_merchant_phone").val(data.tel);
                    // $("#edit_merchant_qq").val(data.qq);
                    // $("#edit_merchant_type").text("会员类型: "+(data.reg_time==1 ? '试用会员':'正式会员'));
                    // $("#edit_end_time").text("会员到期时间: "+data.end_time.substring(0,10));
                    $(".edit_activity_block").css("display","none");
                    $(".edit_shike_info_block").css("display","block");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
            });
        }
        function set_seller_info(){
            var seller_id =  $("#edit_merchant_id").text().substring(6);
            var tel = $("#edit_merchant_phone").val();
            var qq = $("#edit_merchant_qq").val();
            // console.log(seller_id);
            // console.log(typeof seller_id);
            // console.log(tel);
            // console.log(typeof tel);
            // console.log(qq);
            // console.log(typeof qq);
            // return;
            $.ajax({
                url:"/admin_merchant_basic/set_seller_info",
                data:{
                    seller_id:seller_id,
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

        function cancle_seller_info(){
            $(".edit_merchant_block").css("display","none");
        }
    </script>

</body>

</html>
