$(function(){
   $('.search_box .sub').click(function(){
      var result=$('.search_box .searchInput').val();
      // 判断用户提交为空时不做任何操作
      if(result=='')return;
      location.href=APP+'?c=search&result='+result;
      
   })
  
})