<div class="left_nav" style="float:left">
    <div class="title personal_center">
        <a href="/merchant_personal">个人中心</a>
    </div>
    <div class="title store_manage">
        <a href="/merchant_store">店铺管理</a>
    </div>
    <div class="title try_manage">
        <a  href="javascript:void(0);">试用管理</a>
        <ul>
            <li><a href="/merchant_issue_try">发布试用</a></li>
            <li><a id="act_num" href="/merchant_activity_manage">活动管理（0）</a></li>
            <li><a id="order_num" href="/merchant_order_manage">试用订单管理（0）</a></li>
        </ul>
    </div>
    <div class="title account_information">
        <a href="javascript:void(0);">账号信息</a>
        <ul>
            <li><a href="/merchant_basic_setup">基本设置</a></li>
            <li><a href="/merchant_bankcard_manage">绑定银行卡</a></li>
            <li><a href="/merchant_member_manage">会员管理</a></li>
        </ul>
    </div>
    <div class="title fund_manage">
        <a href="javascript:void(0);">资金管理</a>
        <ul>
            <li><a href="/merchant_deposit_recharge">押金充值</a></li>
            <li><a href="/merchant_deposit_withdraw">押金提现</a></li>
            <li><a href="/merchant_funds_record">资金记录</a></li>
        </ul>
    </div>
    <div class="title message_center">
        <a id="message_num" href="/merchant_message_center">消息中心（0）</a>
    </div>
</div>
<script>
    $(function(){
        $.ajax({
            url : '/merchant_userapi/get_sideinfo',
            data:{},
            type : 'post',
            dataType : 'json',
            cache : false,
            success : function (result){
                $("#act_num").text("活动管理（"+result.act_count+"）");
                $("#order_num").text("试用订单管理（"+result.order_count+"）");
                $("#message_num").text("消息中心（"+result.mess_count+"）");
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    });
</script>