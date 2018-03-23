/* 
* @Author: anchen
* @Date:   2015-04-18 14:43:14
* @Last Modified by:   anchen
* @Last Modified time: 2015-05-11 23:37:44
*/

$(function(){
    //************************************* 广告区域 顶部*****************
    $('#adt input').click(function(){
        $(this).parents('#adt').fadeOut(500).hide(500);
    })

    //************************************* 广告区域 顶部end*****************
    // 首页导航我的糯米
    $('#top .top_cen .right .nuomi').hover(function(){
        $(this).addClass('lst').find('.list').show();
    },function(){
         $(this).removeClass('lst').find('.list').hide();
    })
    // 首页导航我的糯米
    // 首页搜索区域鼠标点击事件
    $('#search .search-k form input').focus(function(){
        $(this).val('');
    });
    // 鼠标抬起事件
    $('#search .search-k form input').blur(function(){
        $(this).val('ktv');
    })
    // 搜索结束
   
    // 二级菜单*************************************************
    $('#primary .left ul').hover(function(){
         $('#primary .left ul').find('.list').hide();
        $(this).find('.list').stop().fadeIn(500);
    },function(){
        $(this).find('.list').stop().fadeOut(200);
    })
 // 二级菜单end*************************************************
 //******************************轮播区域*********************
 var k=0;
 function cen_run(){
     k++;
    if(k==4){
        $('#primary #center .cen_run .run').css({'left':0+'px'});
        k=1;
    }
    var left = k*-698;
    $('#primary #center .cen_run .run').stop().animate({'left':left+'px'});
 
 }

 var cen_ = setInterval(cen_run,1000);
 // $('#primary #center .cen_run .run').
// 鼠标点击事件  清楚定时器
$('#center .action-img .bg1').click(function(){
    clearInterval(cen_);
    k--;
    if(k==-1){
        $('#primary #center .cen_run .run').css({'left':3*-698+'px'});
        k=2;
    }
    var left = k*-698;
    $('#primary #center .cen_run .run').stop().animate({'left':left+'px'});
    cen_= setInterval(cen_run,1000);
});
$('#center .action-img .bg2').click(function(){
    clearInterval(cen_);
    k++;
   if(k==4){
        $('#primary #center .cen_run .run').css({'left':0+'px'});
        k=1;
    }
    var left = k*-698;
    $('#primary #center .cen_run .run').stop().animate({'left':left+'px'});
    cen_= setInterval(cen_run,1000);
});








})