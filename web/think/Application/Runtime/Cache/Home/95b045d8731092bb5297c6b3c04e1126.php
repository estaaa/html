<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
        <script type="text/javascript" src="/o2o/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/o2o/web/think/Public/Css/login.css">
        <script type="text/javascript">

          var CONTROL="<?php echo U('code');?>";
          // var LOGIN = "{|U:'index'}";
        </script>
        <script type="text/javascript" src="/o2o/web/think/Public/Js/logon.js"></script>
    </head>
    <body>
       <div id="logona">
           <div class="cen">
               <div class="logo">
                   <span><a href="<?php echo U('Home/Index/index');?>"><img src="/o2o/web/think/Public/Static/images/logo2.png" alt=""></a></span>
                   <span  class="f">|</span>
                   <span class="word">华为商城 </span>
               </div>











             <div id="logon">
               <div class="title">
               <div class="t">
                 注册华为帐号
                 <div id="error" class="error">
                   <em></em>
                   <span id="error_logo"></span>
                   <span id="err_m"></span>
                 </div>
               </div>
               
               </div>
               <div class="data">
                 <form action="<?php echo U('logon');?>" method="post" accept-charset="utf-8">
                 
                   <p>
                      <span>账号: </span>
                      <input type="text" value="" name="username" placeholder="6~20个字符"/>
                      
                   </p>
                
                   
                   <p><span>密码: </span><input type="password"  value="" name="password" />
                   <span class="cl f1">弱</span><span class="cl f2">中</span><span class="cl f3">强</span></p>
                   <p><span>确认密码: </span><input type="password"  value="" name="passwd"/>

                   </p>
                   <p class="la"><span>验证码: </span><input type="text"  value="" class="code" name="code"  placeholder="不区分大小写"/>
                      <img src="<?php echo U('code');?>" alt="" >
                   </p>
                   <p class="tk"><input type="checkbox"  name='clause'/><a href="javascript:;">同意</a><a href="javascript:;" class="ty">《华为帐号服务条款、华为隐私政策》</a></p>
            
                   <p><input type="submit" class="sub" value="注册" /></p>
                 </form>
                <i></i>
                 <s></s>
               </div>
             </div>
             <div class="go-login">
               <p><span class="lgi" onclick="location.href=LOGIN">登录</span><span >已有华为帐号</span></p>
             </div>












            <div class="bor">
               
            </div>   
            <div class="foot">
                <p class="frist">《华为帐号服务条款、华为隐私政策》</p>
                <p>Copyright © 2011-2013  华为软件技术有限公司  版权所有  保留一切权利  苏B2-20070200号 | 苏ICP备09062682号-9</p>
            </div>
           </div>
       </div>
       
  </body>
</html>