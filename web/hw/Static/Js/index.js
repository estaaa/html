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
    
    // 首页顶部大广告图 缩小
    $(".add-big-sm").click(function(){
        $(".add-big-ico").animate({height:'0px',width:"1200px"},500);
       setTimeout(function(){
             $('.add-big-sm').css({display:"none"});
             $(".add-sm-ico").show();
             $(".ad-cen span.close").show();
        },600)
       })


     setTimeout(function(){
        $(".add-big-ico").animate({height:'0px',width:"1200px"},500);
          $('.add-big-sm').css({display:"none"});
          setTimeout(function(){
             $(".add-sm-ico").show();
             $(".ad-cen span.close").show();
          }, 500)
         
     },6000)
   
    // 然后在点击让小图 消失
    $(".ad-cen span.close").click(function(){
      $(".add-sm-ico").hide();
    })    

    // 搜索框 获得焦点
    $(".text").focus(function(){
        $(this).val('');
    })
    $(".text").blur(function(){
        $(this).val('荣耀6');
    })



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




  // 二级菜单
  $("#lunbo .carousel .left .nav").hover(function(){
    var num = $(this).index();
    if(num>=4){
      $(this).find("div.list").css({top:'auto',bottom:"0px"});
    }
    $(this).find("div.list").show();
  },function(){
    $(this).find("div.list").hide();
  })


// 轮播区域
// 定时器
var runNum=0;
var timer;
function run(){

    runNum++;
    $("#lunbo .carousel .right .clickico span").eq(runNum).css({background:"#B61924"}).siblings().css({background:"#3a3c40"});
    $("#lunbo .carousel .right .bigimg a").eq(runNum).stop().fadeIn(300).animate({display:"block"}).siblings().css({display:"none"});
    if(runNum==6){
      $("#lunbo .carousel .right .clickico span").eq(5).css({background:"#3a3c40"});
      $("#lunbo .carousel .right .bigimg a").eq(5).stop().fadeIn(300).css({display:"none"});
      $("#lunbo .carousel .right .clickico span").eq(0).css({background:"#B61924"});
      $("#lunbo .carousel .right .bigimg a").eq(0).stop().fadeIn(300).css({display:"block"}).siblings().css({display:"none"});
      runNum=0;
    }
}
timer=setInterval(run,2000);
$("#lunbo .carousel .right .clickico span").hover(function(){
  clearInterval(timer);
  runNum= $(this).index();
  $("#lunbo .carousel .right .clickico span").eq(runNum).css({background:"#B61924"}).siblings().css({background:"#3a3c40"});
  $("#lunbo .carousel .right .bigimg a").eq(runNum).stop().fadeIn(300).css({display:"block"}).siblings().css({display:"none"});
},function(){
  timer=setInterval(run,2000);
})
// 轮播区域结束


  var clikNum=0;
// 热卖区域无缝轮播
$("#hot .right .smimg .rico").click(function(){

      clikNum--;
  var left=clikNum*278;
  $("#hot .right .smimg ul").css({left:left});
  if(clikNum==-4){
      clikNum=0;
     $("#hot .right .smimg ul").css({left:left});
  }
})
$("#hot .right .smimg .lico").click(function(){
  if(clikNum==0){
        clikNum=-4;
       $("#hot .right .smimg ul").css({left:left});
    }
      clikNum++;
  var left=clikNum*278;
  $("#hot .right .smimg ul").css({left:left});
  
})



// 新闻tab切换
$("#hot .right .new p.frist").hover(function(){
  $(this).css({background:"#FCF7F7"}).siblings('p').css({background:"#FFFFFF"});
   $("#hot .right .new").find('ul').eq(0).css({display:"block"}).siblings('ul').hide();
})
$("#hot .right .new p.frist2").hover(function(){
  $(this).css({background:"#FCF7F7"}).siblings('p').css({background:"#FFFFFF"});;
   $("#hot .right .new").find('ul').eq(1).css({display:"block"}).siblings('ul').hide();
})







// 底部长图轮播
// 轮播区域
// 定时器
var runNum1=0;
var timer1;
function run1(){

    runNum1++;
    $("#adico .right .clickico span").eq(runNum1).css({background:"#B61924"}).siblings().css({background:"#3a3c40"});
    $("#adico .right .bigimg a").eq(runNum1).stop().fadeIn(300).animate({display:"block"}).siblings().css({display:"none"});
    if(runNum1==6){
      $("#adico .right .clickico span").eq(5).css({background:"#3a3c40"});
      $("#adico .right .bigimg a").eq(5).stop().fadeIn(300).css({display:"none"});
      $("#adico .right .clickico span").eq(0).css({background:"#B61924"});
      $("#adico .right .bigimg a").eq(0).stop().fadeIn(300).css({display:"block"}).siblings().css({display:"none"});
      runNum1=0;
    }
}
timer1=setInterval(run1,2000);
$("#adico .right .clickico span").hover(function(){
  clearInterval(timer1);
  runNum1= $(this).index();
  $("#adico .right .clickico span").eq(runNum1).css({background:"#B61924"}).siblings().css({background:"#3a3c40"});
  $("#adico .right .bigimg a").eq(runNum1).stop().fadeIn(300).css({display:"block"}).siblings().css({display:"none"});
},function(){
  timer1=setInterval(run1,2000);
})
// 轮播区域结束


// 首发区域
// 定义背景颜色
var boxColor = ['#F8F8F8','#E2F9FB','#FFFCE7','#FFECEF','#F2FFE8','#FCEFFF','#FFFCE7','#F6F6F6'];
var bgImg    = ['',]
for (var i = 0; i < boxColor.length; i++) {
$('#hot .left .box').eq(i).css({background:boxColor[i]});
if(i<2){
$('#hot .left .box').eq(i).find('s').addClass('ico_img');
$('#hot .left .box').eq(i).find('s.ico_img').show();
}
};
alert($('.jsCol').length)
alert($('.coBg').length)
// 全区域循环背景颜色
$.each($('.jsCol'),function(x,y){
  $.each($('.jsCol').eq(x).find('.coBg'),function(xx,yy){
    // 获得随机颜色
    if(xx<3){
      $('.jsCol').eq(x).find('.coBg').eq(xx).css({background:boxColor[Math.floor(Math.random()*boxColor.length)]});
    }
    // 获得随机首发 热卖 新品
     $('.jsCol').eq(x).find('.coBg').eq(xx).find('s').css({backgroundImage:"url(__STATIC__'/images/1382542518162.png')"})
  })
})
/*for(var i=0;i<$('.jsCol').length;i++){
  for(var j=0;j<3;i++){
   $('.jsCol .coBg').eq(j).css({background:'red'});
  }
}*/

})