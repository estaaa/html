<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
        
        <script type="text/javascript" src="/o2o/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/o2o/web/think/Public/Css/login.css">
        <script type="text/javascript">
          // var INDEX = "{|U:'Index/Index/index'}";
          var CONTROL="<?php echo U('code');?>";
        </script>
        <script type="text/javascript" src="/o2o/web/think/Public/Js/login.js"></script>
    </head>
    <body>
       <div id="login">
           <div class="cen">
               <div class="logo">
                   <span><img src="/o2o/web/think/Public/Static/Images/logo2.png" alt="" onclick="location.href='<?php echo U('Home/Index/index');?>'" style="cursor:pointer"></span>
                   <span  class="f">|</span>
                   <span class="word">华为商城 </span>
               </div>
               <div class="b">
                   <div class="left">
                       <img src="/o2o/web/think/Public/Static/Images/bg11.jpg" alt="">
                   </div>
                   <div class="right">
                       <div class="tit">欢迎登录华为帐号
                        <div id="error_tips" class="error_tips">
                            <s></s>
                            <span id="error_logo"></span>
                            <span id="err_m"></span>
                        </div>
                       </div>
                       
                       <form action="" method="post">
                           <input type="text" value="" name="username" placeholder="帐号"/>
                           <input type="password" value="" name="password" />
                           <input type="text" value="" name="code" class="code" placeholder="验证码"/>
                           <a href="javascript:;"><img src="<?php echo U('code');?>" alt="" /></a>
                           <div class="b-box">
                                <input type="checkbox"  class="cheac" name="auto">
                               <span class="use">记住用户名</span>
                               <span class="forget">忘记密码?</span>
                           </div>
                           <input type="submit" name="" value="登陆" class="btn">
                           <!-- <input type="hidden" value="帐号" name="logtime"/> -->
                       </form>
                       <div class="dec">
                           <div class="none">
                               <span>没有华为帐号？ </span>
                               <a href="<?php echo U('logon');?>">免费注册</a>

                           </div>
                            <div class="wd">
                            华为帐号可登录华为商城、花粉俱乐部、应用市场、Cloud+、华为网盘、华为开发者联盟等华为云服务。
                            </div>
                       </div>
                   </div>
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