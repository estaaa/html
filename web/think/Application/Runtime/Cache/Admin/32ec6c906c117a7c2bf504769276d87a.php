<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    var CONTROL="<?php echo U('code');?>";
</script>
<script src="/hailun/web/think/Public/Admin/js/cloud.js" type="text/javascript"></script>
<!-- <script src="/hailun/web/think/Public/Js/js.js" type="text/javascript"></script> -->
<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<body style="background-color:#1c77ac; background-image:url(images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
    <!-- <li><a href="#">回首页</a></li> -->
    </ul>    
    </div>
    
    <div class="loginbody">
    
    <span class="systemlogo"></span> 
       
    <div class="loginbox">
    
    <ul>
    <form action="" method="post">
    <li><input name="username" type="text" class="loginuser" value="" placeholder="帐号"/>
        <div id="error_tips" class="error_tips">
            <s></s>
            <span id="error_logo"></span>
            <span id="err_m"></span>
        </div>
    </li>
    
    <li><input name="password" type="password" class="loginuser" value=""/></li>
    <li><input name="code" type="text" class="code" value="" placeholder="验证码"/><img src="<?php echo U('Admin/Login/code');?>" alt=""></li>
    <li><input name="" type="submit" class="loginbtn" value="登录" /><label><input name="auto" type="checkbox" value="" checked="checked" />记住密码</label></li>
    </form>
    </ul>
    
    
    </div>
    
    </div>
    
    
    
    <div class="loginbm">版权所有  2015   仅供学习交流，勿用于任何商业用途</div>
	
    
</body>

</html>