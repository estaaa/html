/* 
* @Author: anchen
* @Date:   2015-04-10 22:19:30
* @Last Modified by:   anchen
* @Last Modified time: 2015-04-18 19:40:24
*/
$(function(){
    // 顶部导航区域
    $('#top-nav .center .right li.wd5').hover(function() {
        $('#top-nav .center .right li.wd5').addClass('wd5_list').find('.wd_img').css('display','block')
    },function(){
         $('#top-nav .center .right li.wd5').removeClass('wd5_list').find('.wd_img').css('display','none')
    });

    $('#top-nav .center .right li.wd6').hover(function() {
        $('#top-nav .center .right li.wd6').addClass('wd6_list').find('.wd6_lista').css('display','block')
    },function(){
         $('#top-nav .center .right li.wd6').removeClass('wd6_list').find('.wd6_lista').css('display','none')
    });

    $('#top-nav .center .right li.wd7').hover(function() {
        $('#top-nav .center .right li.wd7').addClass('wd7_a').find('.wd7_list').css('display','block')
    },function(){
         $('#top-nav .center .right li.wd7').removeClass('wd7_a').find('.wd7_list').css('display','none')
    });

 // 顶部导航区域end
 //二维码删除
 $('#main .header .code').click(function() {
     $('#main .header .code').css({
         display: 'none'
          })
 });


    

    
    $('#main .wordnav .left .nav_word').hover(function(){
        $(this).find('.li_div').stop().css('display','block').animate({'height':'450px'},500).siblings('.li_div').css('display','none');
    },function(){
        $(this).find('.li_div').stop().hide().animate({'height':'0px'},500);
    })


// 搜索鼠标抬起事件
$('#main .header .search .text').focus(function(){
    $('#main .header .search .text').val('');
})
$('#main .header .search .text').blur(function(){
    $('#main .header .search .text').val('gucci眼镜');
})






// 首页文字导航区轮播

    c=0;
    function run(){
        c++;
        c=(c==5)?0:c;
        $('#main .wordnav .center .lunbo li').eq(c).fadeIn(300).siblings('li').fadeOut(300);
        $('#main .wordnav .center .radio span').eq(c).css('background','#B61B1F').siblings('span').css('background','#3E3E3E');

    };
    timer=setInterval(run,2000)
    $('#main .wordnav .center .radio span').hover(function(){
        clearInterval(timer);
        c=$(this).index();
        $('#main .wordnav .center .lunbo li').eq(c).fadeIn(300).siblings('li').fadeOut(300);
        $('#main .wordnav .center .radio span').eq(c).css('background','#B61B1F').siblings('span').css('background','#3E3E3E');
    },function(){
        timer=setInterval(run,2000)
    });
    $('#main .wordnav .center .ico1').click(function(){
        clearInterval(timer);
         // c=$(this).index();
        c--;
        $('#main .wordnav .center .lunbo li').eq(c).fadeIn(300).siblings('li').fadeOut(300);
        $('#main .wordnav .center .radio span').eq(c).css('background','#B61B1F').siblings('span').css('background','#3E3E3E');
        c=(c==-1)?5:c;
        timer=setInterval(run,2000)
    })
    $('#main .wordnav .center .ico2').click(function(){
        clearInterval(timer);
         // c=$(this).index();
        c++;
        c=(c==5)?0:c;
        $('#main .wordnav .center .lunbo li').eq(c).fadeIn(300).siblings('li').fadeOut(300);
        $('#main .wordnav .center .radio span').eq(c).css('background','#B61B1F').siblings('span').css('background','#3E3E3E');
        
        timer=setInterval(run,2000)
    })    
    $('#main .wordnav .center .lunbo').hover(function(){
        $('#main .wordnav .center .lunbo>span').show();
    },function(){
        $('#main .wordnav .center .lunbo>span').hide();
    })
    // 首页文字导航区轮播结束
    // 首页文字导航区无缝轮播
    var b=0;
    $('#main .wordnav .center .bottom .ico1').click(function(){
            
            b++;
            if(b==4){
                $('#main .wordnav .center .bottom .wufeng').css('left','0')
                b=1;
            }
            var left=b*-670
            $('#main .wordnav .center .bottom .wufeng').stop().animate({'left':left+'px'},500)
    })

    $('#main .wordnav .center .bottom .ico2').click(function(){
            
            b--;
            if(b==-1){
                $('#main .wordnav .center .bottom .wufeng').css('left','-2010px')
                b=2;
            }
            var left=b*-670
            $('#main .wordnav .center .bottom .wufeng').stop().animate({'left':left+'px'},500)
    })
        $('#main .wordnav .center .bottom').hover(function(){
        $('#main .wordnav .center .bottom>span').show();
    },function(){
        $('#main .wordnav .center .bottom>span').hide();
    })
     // 首页文字导航区无缝轮播结束

     // 图片运动收缩
     $('#main .showcase .leftbox .boximg').hover(function(){

        $(this).find('img').stop().animate({'margin-left':'-7px'},500)
     },function(){
        $(this).find('img').stop().animate({'margin-left':'0px'},500)
     })
     // 图片运动收缩结束
     // 首页1-12f tab选项
     
     $('#main .appliance .appliance-nav span.oclick').hover(function(){
        // alert($(this).length)
        $(this).css('border-bottom','2px solid #E4393C').find('.border').show().parents('.oclick').siblings('.oclick').css('border-bottom','').find('span').hide();
        
        q=$(this).index();
        // alert(q)
        $(this).parents('div.appliance-nav').next().find('.main_box1').eq(q-2).fadeIn(300).siblings('div').fadeOut(300);
     
     },function(){

     })



     // 1f-12f下的小轮播

 


$('#main .appliance .center .box2 p span').hover(function(){
    
    var u=-$(this).index();
    var left=u*477;
    $(this).parents('div.box').find('ul').stop().animate({'left':left+'px'},500,'easeOutElastic');
    $(this).css('background','red').siblings('span').css('background','#000')
},function(){
   
})


     // 图片运动收缩
     $('#main .appliance .center .box').hover(function(){

        $(this).find('img').stop().animate({'margin-left':'-10px'},500)
     },function(){
        $(this).find('img').stop().animate({'margin-left':'0px'},500)
     })
     // 图片运动收缩结束


     // 图片运动收缩
     $('#main .box-border .left').hover(function(){

        $(this).find('.left-img').stop().animate({'margin-right':'10px'},500)
     },function(){
        $(this).find('.left-img').stop().animate({'margin-right':'0px'},500)
     })
     // 图片运动收缩结束




      // 首页1-12f tab选项
})