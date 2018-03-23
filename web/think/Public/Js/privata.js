$(function(){
    // 我的订单
    // 边框滑动效果
    $("#user-indent .header a").eq(1).mouseenter(function(){
       $("#user-indent .header s").stop().animate({right:'105px'},500);
    })
    $("#user-indent .header a").eq(0).mouseenter(function(){
       $("#user-indent .header s").stop().animate({right:'0px'},500);
    })


    // 点击文字变色
    $("#user-indent div.in-nav a").click(function(){
        $(this).css({color:"#f63"}).siblings().css({color:'#333333'});
    })

    // 点击选中效果
    $("#user-indent div.he p span").toggle(function(){
        $("#user-indent div.he p input").attr("checked",'checked');
    },function(){
        $("#user-indent div.he p input").removeAttr('checked');
    })
    // 我的订单结束
})