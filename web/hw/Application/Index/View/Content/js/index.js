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
        },500)
       })


     setTimeout(function(){
        $(".add-big-ico").animate({height:'0px',width:"1200px"},500);
          $('.add-big-sm').css({display:"none"});
          $(".add-sm-ico").show();
          $(".ad-cen span.close").show();
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
timer=setInterval(run,1000);
$("#lunbo .carousel .right .clickico span").hover(function(){
  clearInterval(timer);
  runNum= $(this).index();
  $("#lunbo .carousel .right .clickico span").eq(runNum).css({background:"#B61924"}).siblings().css({background:"#3a3c40"});
  $("#lunbo .carousel .right .bigimg a").eq(runNum).stop().fadeIn(300).css({display:"block"}).siblings().css({display:"none"});
},function(){
  timer=setInterval(run,1000);
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
timer1=setInterval(run1,1000);
$("#adico .right .clickico span").hover(function(){
  clearInterval(timer1);
  runNum1= $(this).index();
  $("#adico .right .clickico span").eq(runNum1).css({background:"#B61924"}).siblings().css({background:"#3a3c40"});
  $("#adico .right .bigimg a").eq(runNum1).stop().fadeIn(300).css({display:"block"}).siblings().css({display:"none"});
},function(){
  timer1=setInterval(run1,1000);
})
// 轮播区域结束

})



// 列表页
// 二级菜单
$(function(){


  
  $("#list-nav .cen li.all .left .nav").hover(function(){
  var num = $(this).index();
  if(num>=4){
    $(this).find("div.list").css({top:'auto',bottom:"0px"}).show();
  }
  $(this).find("div.list").show();
},function(){
  $(this).find("div.list").hide();
})




})
// 放大镜区域
$(function(){
  // 给左侧加鼠标移动事件
  $("#content-main .center .show .left .small .cover").mousemove(function(event){
    $("#content-main .center .show .left .small .box").show();
    $("#content-main .center .show .left .big").show();
    // 获得鼠标距离事件源左侧和顶部距离
    var mouse_left = event.pageX;;
    var mouse_top = event.pageY;;
    // 获得鼠标点击居浏览器的距离
    // 
    // 
    //获得box的left和top距离浏览器的距离
    var downLeft = $(this).offset().left;
    var downTop = $(this).offset().top;
    // document.title = mouse_left+'|'+mouse_top;
    // 用鼠标点击的位置 减去盒子距离浏览器的距离 得到色块的位置 再减去色块的一半的宽  就得到鼠标居中了
    var box_left = mouse_left-downLeft-100;
    var box_top = mouse_top-downTop-100;
    // 判断色块范围
    if(box_left<0){
      box_left=0;
    }
    if(box_left>200){
      box_left=200;
    }
    if(box_top<0){
      box_top=0;
    }
    if(box_top>200){
      box_top=200;
    }
    // 让色块位置变换
    $("#content-main .center .show .left .small .box").css({left:box_left,top:box_top});
    // 计算右侧大图的位置
    var bigL=box_left*-2;
    var bigT=box_top*-2;
    // 让大图动起来
    $("#content-main .center .show .left .big img").css({left:bigL,top:bigT});


  })
  $("#content-main .center .show .left .small").mouseout(function(){
    $("#content-main .center .show .left .small .box").hide();
    $("#content-main .center .show .left .big").hide();
  })

$('#content-main .center .show .left .lunbo .pad a').mouseover(function(){
  var num = $(this).index();
  
  $('#content-main .center .show .left .small img').eq(num).show().siblings('img').hide();
  $('#content-main .center .show .left .big img').eq(num).show().siblings('img').hide();
})


// 把错误元素赋给变量
var error= $('#content-main .center .show .right .hint p span.zhiht');
// 规格的默认状态
var a='';
for(var i=0;i<$('.fly').length;i++){
  a+=$('#content-main .center .show .right .combo .zhi p a.fly').eq(i).html();
}
error.html(a);

// 点击规格制式
$('#content-main .center .show .right .combo .zhi p a.zhishi').click(function(){
  // 添加class 
  $(this).addClass('fly').siblings('a').removeClass('fly');
  // 获得选中的序号
  var clickNum = $('.fly').length;

  // 获得选中的value 值
  if(clickNum==$('.spec-box').length){
    // 为了组合id 定义一个字符串 和提示货物信
    var specs = '';
    var proinfo = '';
    $.each($('.fly'),function(){
      specs += $(this).attr('value')+',';
      proinfo += $(this).html()+'/';
    })
    // 去除多余的符号'/'
    proinfo=proinfo.substring(0,proinfo.length-1);
    // 提示信息 
    $('.zhiht').html(proinfo);
    
  }
 
  $.ajax({
    url:APP+'/specAjax/pro_id/'+pro_id,
    type:"post",
    data:{value:specs},
    dataType:'json',
    success:function(num){
      if(num==1){error.html('非法访问');return;} 
      if(num==2){error.html('库存已空');return;}
     
    }
  })
  
})

// 点击增加购买数量
$('#content-main .center .show .right .combo .zhi p a.minus').click(function(){
  var minus = $(this).siblings('a.num').find('input').val();
  if(minus==1){return};
  $(this).siblings('a.num').find('input').val(minus-1);
})
$('#content-main .center .show .right .combo .zhi p a.plus').click(function(){
  var plus = $(this).siblings('a.num').find('input').val();
  $(this).siblings('a.num').find('input').val(parseInt(plus)+1);
})





// 商品详情
$('#content-main .center .review .right .con-nav span').click(function(){
  var num = $(this).index();
  $(this).css({borderBottom:'none'}).siblings('span').css({borderBottom:'1px solid #E6E6E6',borderRight:'1px solid #E6E6E6'})
  $('#content-main .center .review .right .count').find('div.click').eq(num).show().siblings('div.click').hide();
})
})