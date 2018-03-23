$(function(){
// 搜索功能
/*$('#search-area button').click(function(){
  alert('message')
})*/
// alert('message')
// 关闭弹出窗口（如需通用，移到$()中间去）
$('.dialog').on('click','.dialog-bg,.close',function(){
  var $dialog = $('.dialog:visible'),
      $dialog_bg = $dialog.children('.dialog-bg'),
      $dialog_content = $dialog.children('.dialog-content');
  $dialog_content.animate({top:0,marginTop:0,'opacity':0,'-moz-opacity':0},500,function(){
    $(this).hide();
  });
  $dialog_bg.fadeOut(500);
});
// 用户注册
$('#user-area').on('click','.register',function(e){
  e.preventDefault();
  var $dialog = $('#user-register-dialog'),
      $dialog_bg = $dialog.children('.dialog-bg'),
      $dialog_content = $dialog.children('.dialog-content'),
      content_height = $dialog_content.outerHeight();
      $dialog_bg.fadeIn(500);
       $dialog_content.show().animate({top:'50%',marginTop:-(content_height/2),'opacity':1,'-moz-opacity':1},1000);
});
$('#user-register-dialog form').on('submit',function(e){
  e.preventDefault();
  var $this = $(this),
      action = $this.attr('action'),
      $data = $this.serialize(),
      $warning = $this.find('.dialog-warning'),
      $text = $this.find('.dialog-text'),
      $btns = $this.find('.dialog-btns');
  $warning.html('正在注册...');
  $.ajax({
    url : actionurl+"/Index/Index/login",
    data : $data,
    dataType : 'json',
    type : 'POST',
    timeout : 8000,
    success : function(result) {
     if(result==2){$warning.html('用户名不能为空');return;}
     if(result==3){$warning.html('昵称不能为空');return;}
     if(result==4){$warning.html('密码不能为空');return;}
     if(result==5){$warning.html('两次密码不一致');return;}
     if(result==6){$warning.html('验证码不能为空');return;}
     if(result==7){$warning.html('验证码不正确');return;}
     $warning.html('注册成功');
      location.href=actionurl+"/Index/Index/";
    },
    error : function(xhr,textStatus){
      // alert(textStatus)
    }
  });
});
// 用户登录
$('#user-area').on('click','.login',function(e){
  e.preventDefault();
  var $dialog = $('#user-login-dialog'),
      $dialog_bg = $dialog.children('.dialog-bg'),
      $dialog_content = $dialog.children('.dialog-content'),
      content_height = $dialog_content.outerHeight();
  $dialog_bg.fadeIn(500);
  $dialog_content.show().animate({top:'50%',marginTop:-(content_height/2),'opacity':1,'-moz-opacity':1},1000);
});





$('#user-login-dialog form').on('submit',function(e){
  e.preventDefault();
  var $this = $(this),
      action = $this.attr('action'),
      $data = $this.serialize(),
      $warning = $this.find('.dialog-warning');
  $warning.html('正在登录...');
  $.ajax({
    url : actionurl+"/Index/Index/logon",
    data : $data,
    dataType : 'json',
    type : 'POST',
    timeout : 8000,
    success : function(result) {
           if(result==2){$warning.html('用户名不能为空');return;}
           if(result==3){$warning.html('用户名不存在');return;}
           if(result==4){$warning.html('密码不能为空');return;}
           if(result==5){$warning.html('密码错误');return;}
           if(result==6){$warning.html('验证码不能为空');return;}
           if(result==7){$warning.html('验证码不正确');return;}
           $warning.html('登陆成功');
            location.href=actionurl+"/Index/Index/";
    },
    error : function(xhr,textStatus){
      
    }
})
})
})