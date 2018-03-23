$(function(){
   $('#answer-info .ianswer form').submit(function(){
      var formData = $(this).serialize();
     // alert($_GET['asid']);
      $.ajax({
         url: APP+'?c=answer&a=answer',
         type:'post',
         data:formData,
         dataType:'json',
         success:function(phpData){
            if(phpData==1){alert('内容为空');return;}
            if(phpData==3){alert('您还没有登陆哦');$('#top-bar .top-bar-right li a.login').click();return;}
            if(phpData==4){alert('您已经回答过该问题了');return;}
            if(phpData==5){alert('自己不能回答自己的问题');return;}
            var str='';
            str+="<li><div class='face'><a href=''>";
            str+="<img src='./pfile/"+phpData.img+"' width='48' height='48'/></a></div><div class='cons blue'>";
            str+="<p>"+phpData.content+"<span style='color:#888;font-size:12px'>&nbsp;&nbsp;("+phpData.time+")</span></p></div>";
            str+= "</li>";
            $('#all-answer ul').prepend(str);
             // 统计回答数目
            var a=parseInt($('#all-answer .title strong').html());
            $('#all-answer .title strong').html(a+1);
                                
         }
      })
     
   })

     











})