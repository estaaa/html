<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>

</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
    
    
    <div class="welinfo">
    <span><img src="/hailun/web/think/Public/Admin/images/sun.png" alt="天气" /></span>
    <b><?php echo ($hd["session"]["adminname"]); ?>早上好，欢迎使用信息管理系统</b>
    <!-- <a href="#">帐号设置</a> -->
    </div>
    
    <div class="welinfo">
    <span><img src="/hailun/web/think/Public/Admin/images/time.png" alt="时间" /></span>
    <i>当前的时间为：<?php echo (date('Y-m-d H:m:s',$time)); ?></i>
    </div>
    
    <div class="xline"></div>
    
    <!-- <ul class="iconlist">
    
    <li><img src="/hailun/web/think/Public/Admin/images/ico01.png" /><p><a href="#">管理设置</a></p></li>
    <li><img src="/hailun/web/think/Public/Admin/images/ico02.png" /><p><a href="#">发布文章</a></p></li>
    <li><img src="/hailun/web/think/Public/Admin/images/ico03.png" /><p><a href="#">数据统计</a></p></li>
    <li><img src="/hailun/web/think/Public/Admin/images/ico04.png" /><p><a href="#">文件上传</a></p></li>
    <li><img src="/hailun/web/think/Public/Admin/images/ico05.png" /><p><a href="#">目录管理</a></p></li>
    <li><img src="/hailun/web/think/Public/Admin/images/ico06.png" /><p><a href="#">查询</a></p></li> 
            
    </ul>
    
    <div class="ibox"><a class="ibtn"><img src="/hailun/web/think/Public/Admin/images/iadd.png" />添加新的快捷功能</a></div> -->
    
    <div class="xline"></div>
    <div class="box"></div>
    
    <div class="welinfo">
    <!-- <span><img src="/hailun/web/think/Public/Admin/images/dp.png" alt="提醒" /></span> -->
  <!--   <b>Uimaker信息管理系统使用指南</b> -->
    </div>
    
  
    
    

</body>

</html>