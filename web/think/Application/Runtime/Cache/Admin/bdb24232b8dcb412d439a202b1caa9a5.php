<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(/hailun/web/think/Public/Admin/images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="<?php echo U('index');?>" style="display: block;margin-left: 35px;"><img src="/hailun/web/think/Public/Admin/images/logo.png" title="系统首页" /></a>
    </div>
        
    <ul class="nav">
    <li><a href="<?php echo U('Admin/Product/addPro');?>" target="rightFrame" class="selected"><img src="/hailun/web/think/Public/Admin/images/icon01.png" title="添加商品" /><h2>添加商品</h2></a></li>
    <li><a href="<?php echo U('Admin/Flink/index');?>" target="rightFrame"><img src="/hailun/web/think/Public/Admin/images/icon02.png" title="友情链接" /><h2>友情链接</h2></a></li>
    <li><a href="<?php echo U('Admin/Buyinfo/index');?>"  target="rightFrame"><img src="/hailun/web/think/Public/Admin/images/icon03.png" title="订单信息" /><h2>订单信息</h2></a></li>
    <li><a href="<?php echo U('Admin/Brand/index');?>"  target="rightFrame"><img src="/hailun/web/think/Public/Admin/images/icon04.png" title="品牌列表" /><h2>品牌列表</h2></a></li>
    <li><a href="<?php echo U('Admin/Category/index');?>" target="rightFrame"><img src="/hailun/web/think/Public/Admin/images/icon05.png" title="分类列表" /><h2>分类列表</h2></a></li>
    <li><a href="<?php echo U('Admin/User/index');?>"  target="rightFrame"><img src="/hailun/web/think/Public/Admin/images/icon06.png" title="系统设置" /><h2>用户管理</h2></a></li>
    <li><a href="<?php echo U('Home/Index/index');?>"  target="rightFrame"><img src="/hailun/web/think/Public/Admin/images/11.png" title="前台首页" /><h2>前台首页</h2></a></li>
    </ul>
            
    <div class="topright">    
    <ul>
    <li><span><img src="/hailun/web/think/Public/Admin/images/help.png" title=""  class="helpimg"/></span><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    <li><a href="{|U:'Admin/Index/close'}" target="_parent">退出</a></li>
    </ul>
     
    <div class="user">
    <span><?php echo ($hd["session"]["adminname"]); ?></span>
    <!-- <i>消息</i>
    <b>5</b> -->
    </div>    
    
    </div>

</body>
</html>