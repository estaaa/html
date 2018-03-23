/* 
* @Author: anchen
* @Date:   2015-04-12 16:58:22
* @Last Modified by:   anchen
* @Last Modified time: 2015-04-20 12:25:19
*/
$(function(){
    // 顶部导航区域
     $('#top_nav .top_nav_center .right .mytao').hover(function(){
        $(this).addClass('mytao_list').find('.mytao_word').css('display','block')
     },function(){
         $(this).removeClass('mytao_list').find('.mytao_word').css('display','none')
     })
       $('#top_nav .top_nav_center .right .sj').hover(function(){
        $(this).addClass('sj2').find('.sj_list').css('display','block')
     },function(){
         $(this).removeClass('sj2').find('.sj_list').css('display','none')
     })
    $('#top_nav .top_nav_center .right .dh').hover(function(){
        $(this).addClass('sjlist').find('.dh_list').css('display','block')
     },function(){
         $(this).removeClass('sjlist').find('.dh_list').css('display','none')
     })
        $('#top_nav .top_nav_center .right .iphoto').hover(function(){
        $(this).find('.pic').show();

        $(this).find('.iphoto_img').show();
     },function(){
         $(this).find('.pic').hide();
        $(this).find('.iphoto_img').hide();
     })
        // 顶部导航区域
    


    // 搜索区域
    $('#search .form .sear .text').focus(function(){
        $(this).val('')
    })
   $('#search .form .sear .text').blur(function(){
        $(this).val('春意愈浓  时尚商品抢先购!').css('color','#ccc')
    })
   // 搜索区域结束
   
// 轮播区

 var p=0;
 // 轮播时的背景
var my_color=['#F5AD41','#44413C','#DE2C44','#DADADA','#FF9B84','#E1E1E1','#075190'];
// 给商品服务li添加移入事件和 移出事件  给商品服务li添加移入事件改变背景 和背景颜色
$('#carousel .carousel_center .left li.nav_word').hover(function(){
    // 给每个轮播分配背景颜色
var li_color= ['','#FCD2E0','#53504B','#6DACCF','#075190','#2C93F2','#ED2FC5','#C861EE','#136CC6','#D40C54','#C7C2BE','#0372F5','#EFA43E','#FDC300','#EC4139','#E1E1E1'];
    // 清处定时器
    clearInterval(imglunbo);

    // 给li加文字平滑效果 让li右侧二级菜单显示
$(this).css('background','#A90000').stop().animate({'padding-left':'10px'},500).find('.nav_2wd').show().animate({'left':'188px'},100,function(){
    $(this).animate({'left':'190px'},100)
})
     
    // 获取序号
    var qq=$(this).index();
    // imglunbo=setInterval(main_lunbo,3000);
    clearInterval(imglunbo)
    // 鼠标经过li让右侧图片轮播
    $(this).parents('#carousel').find('.carousel_center').find('div.right').eq(qq).show().siblings('div.right').hide().parents('#carousel').find('.small_ig2').hide(); 
    // 判断当为0时 让精选市场右侧要显示
    if(qq==0){
      imglunbo=setInterval(main_lunbo,3000);
         $('#carousel .carousel_center .center').find('.small_ig2').show().find('a').eq(p).show().siblings('a').hide().parents('#carousel').find('.small_ig').hide();
        $('#carousel .carousel_center .center .small_ig2 img').eq(p).stop().animate({'height':'440px','width':'380px'},2000);
     $(this).find('.left_nav').show().parents('#carousel').css('background',my_color[p]);
     $(this).parents('#carousel').find('.li_hove-img').hide().parents('div.center').find('div.lunbo').show().parents('#carousel').find('.small_ig').hide();

    }else{

          // $(this).parents('#carousel').css('background','');
          // 找到要显示的大图
    $(this).parents('#carousel').find('.li_hove-img').find('img').hide();
    // 给大图加背景颜色 和缩小
    $(this).parents('#carousel').css('background',li_color[qq]).find('div.lunbo').hide().parents('div.center').find('.li_hove-img').show().find('img').eq(qq).show().stop().animate({'left':'0px','top':'0px','height':'480px','width':'810px'},3000).parents('#carousel').find('.small_ig').show().find('.su_pic').eq(qq).stop().fadeIn(1000).siblings('a').hide(); 
    $('#carousel .carousel_center .left li.nav_word .left_nav').hide();
    }


},function(){
    $(this).parents('#carousel').find('div.right').hide();  
    var qq=$(this).index()
    
    // 让右侧图片保持鼠标移到几号就停留在几号
     $(this).parents('#carousel').find('.carousel_center').find('div.right').eq(qq).show()
    // 鼠标移出图片恢复
    // $(this).parents('#carousel').find('.li_hove-img').find('img').hide();
    $(this).parents('#carousel').find('.li_hove-img').find('img').css({'left':'-20px','top':'0px','height':'500px','width':'840px'});
    $(this).stop().css('background','').stop().animate({'padding-left':'0px'},500).find('.nav_2wd').hide();
   
})

// 给商品服务li里面的图片加移动效果
$('#carousel .carousel_center .left li.nav_word .nav_2wd .sp_bt .bt_nav .run').hover(function(){
    $(this).stop().animate({'left':'7px'},500)
},function(){
    $(this).stop().animate({'left':'0px'},500)
})
// 右侧图片 移动效果
$('#carousel .carousel_center .right .run .run_img').hover(function(){
    $(this).stop().animate({'left':'-5px'});
},function(){
    $(this).stop().animate({'left':'0px'});
})
// 给商品服务li添加移入事件和 移出事件end

// 给商品服务li添加移入事件改变背景 和背景颜色















   
  $('#carousel .carousel_center .center').find('.small_ig2').show().find('a').eq(p).show().siblings('a').hide().parents('#carousel').find('.small_ig').hide();
        $('#carousel .carousel_center .center .small_ig2 img').eq(p).stop().animate({'height':'440px','width':'380px'},2000);
    function main_lunbo(){
      
        p++;
        // 判断给背景加颜色
        p=(p==7)?0:p;
        
        // 这是让中间的轮播图片恢复原始大小
        $('#carousel .carousel_center .center .lunbo .run li.lunbo_img img').css({'left':'-20px','top':'0px','height':'500px','width':'840px'});
        // 这是让中间的小图片恢复原始大小
        $('#carousel .carousel_center .center .small_ig2 img').css({'height':'490px','width':'410px'});

            // 这是让中间小图缩小和隐藏
         
        $('#carousel .carousel_center .center').find('.small_ig2').show().find('a').eq(p).show().siblings('a').hide().parents('#carousel').find('.small_ig').hide();
        $('#carousel .carousel_center .center .small_ig2 img').eq(p).stop().animate({'height':'440px','width':'380px'},2000);

            // 让轮播时背景同步
            $('#carousel').css('background',my_color[p]);
            $('#carousel .carousel_center .center .lunbo .run').find('img').eq(p).stop().animate({'left':'0px','top':'0px','height':'480px','width':'810px'},2000);
      
        
        // 让当前图片显示 背景显示 其他兄弟隐藏
        $('#carousel .carousel_center .center .lunbo .run li.lunbo_img').eq(p).show().siblings('li.lunbo_img').hide();
        $('#carousel .carousel_center .center .lunbo .radio li').eq(p).css('background','#c40000').siblings('li').css('background','#000');

    }
    imglunbo=setInterval(main_lunbo,2000);

    // 给轮播按钮加事件
        $('#carousel .carousel_center .center .lunbo .radio li').hover(function(){
            clearInterval(imglunbo);

                    // 判断给背景加颜色
        p=$(this).index();
               // 这是让中间的小图片恢复原始大小
        
          $('#carousel .carousel_center .center').find('.small_ig2').show().find('a').eq(p).show().siblings('a').hide().parents('#carousel').find('.small_ig').hide();  
        // 给图片动画恢复原始尺寸
         $('#carousel .carousel_center .center .small_ig2 img').css({'height':'490px','width':'410px'});
         $('#carousel .carousel_center .center .lunbo .run li.lunbo_img img').css({'left':'-20px','top':'0px','height':'500px','width':'840px'});

        // 让轮播时背景同步
            $('#carousel').css('background',my_color[p]);
           $('#carousel .carousel_center .center .small_ig2 img').eq(p).stop().animate({'height':'440px','width':'380px'},4000);
            $('#carousel .carousel_center .center .lunbo .run').find('img').eq(p).stop().animate({'left':'0px','top':'0px','height':'480px','width':'810px'},2000);
            // 让当前图片显示 背景显示 其他兄弟隐藏
         $(this).parents('.lunbo').find('li.lunbo_img').eq(p).show().siblings('li.lunbo_img').hide();

        $(this).css('background','#c40000').siblings('li').css('background','#000');
        },function(){
           imglunbo=setInterval(main_lunbo,2000);
 
        })
    // 热门品牌
    // 鼠标经过
    // 给热门品牌加事件
    $('#main .main_center .main_hot .nav_title li.xh_i').click(function(){
        p=$(this).index();
        // p-1是因为li多了一个  
        $(this).parents('.main_hot').find('div.hot_center').eq(p-1).show().siblings('div.hot_center').hide();
        // 先让所有的下边框没有 让当前有
        $('#main .main_center .main_hot .nav_title li.xh_i a').css('border-bottom','')
         $(this).find('a').css('border-bottom','2px solid #000')
    })

// 给换一批加事件
$('#main .main_center .main_hot .nav_title li.last').click(function(){
    var num=Math.floor(Math.random()*4);
    $(this).parents('.main_hot').find('div.hot_center').eq(num).show().siblings('div.hot_center').hide();
    // alert(num)
})
// 给左侧大图加运动效果
$('#main .main_center .main_hot .hot_main .hot_left').hover(function(){

    $(this).find('.left_right_run').show().stop().animate({
        width: '806px'
    },500,'easeInQuad').find('.ico_close').show(500).parents('.hot_left').find('.ico1').show(500);

},function(){
        $(this).parent().find('.left_right_run').show().stop().animate({
        width: '0px'
    },500,'easeInQuad').find('.ico_close').hide(500).parents('.hot_left').find('.ico1').hide(500);
})


  // 热门品牌 结束
   // 1f
   // 左侧小图标 放大
   $('#main .main_1f .left .iconfont').hover(function(){
        $(this).stop().animate({'font-size':'25px'},500)
   },function(){
    $(this).stop().animate({'font-size':'23px'},500)
   })
   // 放大结束
   






var u=0;

  $('#main .main_1f .left .lunbo_small_f .lunbo_small_ico1').click(function(){
    if(u==0){
         $(this).parents('.lunbo_small_f').find('.zong').css('left','-573px')
         u=-3;
    }
     u++;
    var left=u*191;
    $(this).parents('.lunbo_small_f').find('.zong').stop().animate({'left':left+'px'},500)
  })

  $('#main .main_1f .left .lunbo_small_f .lunbo_small_ico2').click(function(){
    u--;
    if(u==-4){
         $(this).parents('.lunbo_small_f').find('.zong').css('left','0px')
         u=-1
    }
     
    var left=u*191;
    $(this).parents('.lunbo_small_f').find('.zong').stop().animate({'left':left+'px'},500)
  })




















$('#main .main_1f .left .lunbo_small_f').hover(function(){
        $(this).find('.lunbo_small_ico1').css('color','#D4CDCC');
         $(this).find('.lunbo_small_ico2').css('color','#D4CDCC');
},function(){
        $(this).find('.lunbo_small_ico1').css('color','#f0f0f0');
         $(this).find('.lunbo_small_ico2').css('color','#f0f0f0');
})

// 顶部搜索固定

$('#main .main_1f .right a img').hover(function(){
    $(this).stop().animate({'left':'-5px'},500)
},function(){
    $(this).stop().animate({'left':'0px'},500)
})

// 搜索固定   左侧滚动距离控制
$(window).scroll(function(){
    var mytop=$(document).scrollTop();
    // document.title=mytop;
    if(mytop>=613){
        $('.top_search').css('display','block').animate({'height':'50px'},700,'easeInOutBack');
        $('#left_img').css('display','block');
    }else{
            $('#left_img').css('display','none');
             $('.top_search').css({'display':'none','height':'0px'});

            }
})

setInterval(function(){
var top_width=$(window).width();

if(top_width>1000){
     $('.top_search').find('input.hei').css('width','655px');
     $('.top_search').css('width',top_width+'px');
}else{ 
 $('.top_search').css('width',top_width+'px');

$('.top_search .search_center .search_t input.hei').css('width',top_width/2.5+'px');
}   
},0)

// 结束





// 右侧固定
setInterval(function(){
var right_height=$(window).height();
if(right_height<650){
   $('#right li').hide();
   $('#right li.ico').show().parents('#right').css('background','');
}else{
     $('#right li').show();
   $('#right li.ico').show().parents('#right').css('background','#000');
}

$('#right').css('height',right_height+'px')
},0)


$('#right .right_cen li.ico11').click(function(){
    var right_height=$(window).height();
    $('html,body').animate({'scrollTop':'0'}, 500);
})


// 右侧固定结束
$('#right .right_cen li').hover(function(){
    var o=$(this).index();
    if(o==10){
      $(this).find('p').show().css('opacity','1')
    }
    if(o==8){
        $(this).find('p').show().css({'left':'-175px','top':'-170px'});
    }else{
        // $('#right .right_cen li p').fadeOut();
         $(this).find('p').stop().show().animate({'left':'-90px','opacity':'1'},500);
    }
   
},function(){
    var o=$(this).index();
        if(o==8){
        $(this).find('p').hide(50).css({'left':'-175px','top':'-170px'});
    }else{
         $(this).find('p').stop().animate({'left':'-120px','opacity':'0'},500);
    }
})


// 左侧固定栏

  // 给窗口加滚动条事件
  $(window).scroll(function() {
    // 当滚动条大鱼规定的距离时 让悬浮出现
    var stop = $(document).scrollTop();
        if(stop>550){
          $('#fu_run').show();
        }else{
          $('#fu_run').hide();
        }
        // 把样式封装进函数
        function tihuan(w){
           $('#fu_run li').eq(w).siblings('li').find('.sm_word').hide().siblings().show();
          $('#fu_run li').eq(w).find('.sm_word').show().css({'background':'none'}).find('a').css({'color':'#c40000'}).parent().siblings().hide();
        }
        // 循环 滚动到相应的位置 调用函数 文字显示
        var arr=['1150','1599','2030','2620','3110','3560','4115','4560','5060','5640','6070'];
        for(var i=0;i<$('#fu_run li').length;i++)
        {
             if(stop>=arr[i])
             {
            tihuan(i)
         
            }
        }
       
    })
$('#fu_run li').click(function(){
  var num=$(this).index();
  // 当点击时把相应的样式赋给
  function ti(e,r){
$('#fu_run li').eq(e).siblings().attr('stat','0').find('.sm_word').css({'background':'#C40000'}).find('a').css({'color':'#fff'}).parent('.sm_word').hide().siblings().show();
    $('#fu_run li').eq(e).attr('stat','1').find('.sm_word').show().css('background','none').siblings().hide();
    $('html,body').animate({'scrollTop':r}, 500);
  }
  var arr=['1150','1600','2030','2630','3100','3580','4120','4570','5060','5650','6080'];
  for(var i=0;i<$('#fu_run li').length;i++)
  {
      if(i==num)
      {
    ti(num,arr[num])
    
        }
  }
})
// 这是鼠标经过样式
$('#fu_run li').hover(function(){
    $(this).find('div.sm_word').show().css({'background':'#C40000'}).find('a').css({'color':'#fff'});
},function(){
    if($(this).attr('stat')==1){
      $(this).find('div.sm_word').show().css({'background':'none','color':'#c40000'}).find('a').css({'color':'#c40000'}).parent().siblings().hide()
    }else{
      $(this).find('div.sm_word').hide().siblings().show()
    }
    
})


























// //     // 给li添加状态  点击的时候 给他添加1  就是在文字显示的时候 和背景为红色的时候 
// //     // 在鼠标离开的时候设置样式  ==1的时候 也就是else的时候
// //     // $(this).attr('stat','1');
// //     // 点击的时候清处其他状态  让其他为0 并隐藏文字 显示图片  
// //     // $(this).siblings('li').attr('stat','0').find('a.ico_img').hide().siblings('span').show();
   
// // })

// $('#left_img li').hover(function(){

// // 这是鼠标移入的时候 让文字显示 并把文字颜色变为白色  背景变为红色   然后让图标隐藏

// $(this).find('a.ico_img').css({'color':'#fff','background':'red'}).show().siblings('span').hide()
    
// },function(){
//     // 移出的时候判断状态  定义状态是点击有变化 所以先在点击里面设定状态
//     // 状态为0的时候 图标是显示的 所以
//    if($(this).attr('stat') == 0){
//     // 成为图标
//     $(this).find('span').show().siblings('a.ico_img').hide();
//     // 
// }else{
//     //成为文字    状态为1的时候
//     $(this).find('.ico_img').show().css({'background':'','color':'red'}).siblings('span').hide()
// }
// 



// // alert($('body').width())






})
