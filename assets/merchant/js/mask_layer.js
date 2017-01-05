/**
 * Created by 二更 on 2016/12/21.
 */
$(function(){
    $('.mask_layer').height(document.body.scrollHeight+600);

    $('.close,.cancel,.confirm').bind('click',function(){
        $('.pay_modal').css('display','none');
        enableScroll();
    });
});