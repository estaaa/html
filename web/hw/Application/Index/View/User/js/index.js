$(function(){

  // 顶部导航 下拉菜单
  $('li.private').hover(function(){

    $(this).find('div.list').show();
  },function(){
    $(this).find('div.list').hide();
  })
  $('li.top-list').hover(function(){
      $(this).css({backgroundColor:'#fff'}).find('.help').show();
  },function(){
      $(this).css({backgroundColor:''}).find('.help').hide();
  })
  // 顶部导航下拉菜单end
    
   

    // 搜索框 获得焦点
    $(".text").focus(function(){
        $(this).val('');
    })/*
    $(".text").blur(function(){
        $(this).val('荣耀6');
    })*/



    // 我的商城
    $("#search .cen .shop .list li.store").hover(function(){
        $(this).find("div.my-shop").show();
    },function(){
        $(this).find("div.my-shop").hide();
    })
    // 我的购物车
    $("#search .cen .shop .list li.cart").hover(function(){
        $(this).find("div.my-car").show();
    },function(){
        $(this).find("div.my-car").hide();
    })


// 二维码
  $('#search .cen .code .rodio span').mouseover(function(){
    $(this).css({background:"#F79F2E"}).siblings().css({background:"#E5E5E5"});

    var num = $(this).index();
    $("#search .cen .code .right").find('div').eq(num).show().siblings().hide();
  })







 
// 列表页
// 二级菜单
$("#list-nav .cen li.all .left .nav").hover(function(){
  var num = $(this).index();
  if(num>=4){
    $(this).find("div.list").css({top:'auto',bottom:"0px"}).show();
  }
  $(this).find("div.list").show();
},function(){
  $(this).find("div.list").hide();
})



// goods页面  点击显示相应内容 tab切换
$('#user-indent div.in-nav a').click(function(){
  var num = $(this).index();
  $('.show').eq(num).show().siblings('.show').hide();
})

})