$(function(){
    var width = $(window).width();
    var height = $(window).height();
    // 获得盒子宽高
    var boxWidth = $('.tiao .addr').width();
    var boxHeight = $('.tiao .addr').height();
    // 获得定位位置
    var trueWidth = (width-boxWidth)/2;
    var trueHeight = (height-boxHeight)/2;
    // 背景盖子
    $('.gaizi').css({width:width,height:height});
    $('.tiao').css({width:width,height:height});
    $('.tiao .addr').css({left:trueWidth,top:trueHeight});
    // 弹出框显示
    $('.minus').click(function(){
        $('#big').show();
    })
    //点击取消 弹出框隐藏
    $('.btn').click(function(){
        $('#big').hide();
         $("input[type=reset]").trigger("click");
         $('p.area textarea').html('');
         $('#s1 option').removeAttr('selected');
         $('#s2 option').html('请选择');
         $('#s3 option').html('请选择');
    })
    // alert(boxWidth)
})