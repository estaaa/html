$(function(){
   // 执行此操作 先遍历option
   $('select[name=cate-one]').change(function(){
      // 把this赋值给变量
      var _this = $(this);
      //获得当前选中分类的cid
      var cid = _this.val();
      // 因为要后台要获得cid的值 所以在要提交的表单里添加一个隐藏表单
      // 并吧value设置cid进行传参
      $('input[name=cid]').val(cid);
      // 不点击第三个分类时让第三个分类隐藏
      _this.next().next().hide();
      $.ajax({
         url:APP+'?c=ask&a=ajaxAsk',
         type:'post',
         data:{id:cid},
         dataType:'json',

         success:function(phpData){
            // next是下一个input 赋值给变量
            var nextSelect = _this.next();
            // 让变量进行下一个表单
            nextSelect = _this.next();
            // 让表单显示 现在显示出来的还是空的 所以下面要创建option
            nextSelect.show();
            // 组合option
            var optionHtml = '';
            $.each(phpData,function(k,v){
               optionHtml+='<option value="'+v.cid+'">'+v.title+'</option>';
            });
            // 给下一个标签进行填充
            nextSelect.html(optionHtml);
         }
      })


      //点击“确定”关闭窗口，然后设置隐藏域
         $('#ok').click(function(){
            $('.close-window').click();
         })
   })

   $('#myask').submit(function(){
      var fromData = $(this).serialize();
      $.ajax({
         url:APP+'?c=ask&a=ajaxForm',
         type:'post',
         data:fromData,
         dataType:'json',
         success:function(phpData){
            if(phpData==1){alert('内容不能为空'); return;} 
            if(phpData==2){alert('分类没有选择');return;}
            if(phpData==4){
               alert('您还没有登录');
               $('#top-bar .top-bar-right li a.login').click();
               return;
            }
            if(phpData==5){alert('您没有足够的金币哦');return;}
            alert('提交成功');
            location.href=APP+"?c=answer&asid="+phpData.asid;
            
            
            // alert('提问成功');
         }
      })
   })

   /**
    * 搜索
    */
   

})