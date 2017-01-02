<div class="left_nav" style="float:left">
    <div class="title personal_center">
        <a href="/shike_personal">个人中心</a>
    </div>
    <div class="title try_manage">
        <a  href="javascript:void(0);">试用管理</a>
        <ul>
            <li><a href="/shike_application_record">申请记录</a></li>
            <li><a id="win_num" href="/shike_try_winningManage">试用中奖管理（0）</a></li>
            <li><a id="buy_num" href="/shike_privilege_buyManage">优惠购买管理（0）</a></li>
        </ul>
    </div>
    <div class="title account_information">
        <a href="javascript:void(0);">账号信息</a>
        <ul>
            <li><a href="/shike_basic_setup">基本设置</a></li>
            <li><a href="/shike_bankcard_manage">绑定银行卡</a></li>
            <li><a href="/shike_member_manage">会员管理</a></li>
        </ul>
    </div>
    <div class="title fund_manage">
        <a href="javascript:void(0);">资金管理</a>
        <ul>
            <li><a href="/shike_deposit_withdraw">本金提现</a></li>
            <li><a href="/shike_funds_record">资金记录</a></li>
        </ul>
    </div>
    <div class="title message_center">
        <a id="mess_num" href="/shike_message_center">消息中心（0）</a>
    </div>
</div>
<script>
    $(function(){
        $.ajax({
            url : '/shike_userapi/get_sideinfo',
            data:{},
            type : 'post',
            dataType : 'json',
            cache : false,
            success : function (result){
                $("#win_num").text("试用中奖管理（"+result.win_count+"）");
                $("#buy_num").text("优惠购买管理（"+result.buy_count+"）");
                $("#mess_num").text("消息中心（"+result.mess_count+"）");
            },
            error : function (XMLHttpRequest, textStatus){
                console.log("insert_fake_activity false");
                console.log(XMLHttpRequest);
                console.log(textStatus);
            }
        })
    });
</script>