<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>管理区</div>
    
    <dl class="leftmenu">

    <dd><div class="title"><span><img src="/hailun/web/think/Public/Admin/images/leftico04.png" /></span>类型管理</div>
    <ul class="menuson">

        <li><cite></cite><a href="<?php echo U('Admin/Type/index');?>" target="rightFrame">类型列表</a><i></i></li>
        <li><cite></cite><a href="<?php echo U('Admin/Type/add');?>" target="rightFrame">添加类型</a><i></i></li>

    </ul>
    
    </dd>  

    <dd>
    <div class="title">
    <span><img src="/hailun/web/think/Public/Admin/images/leftico02.png" /></span>分类管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="<?php echo U('Admin/Category/index');?>" target="rightFrame">分类列表</a><i></i></li>
        <li><cite></cite><a href="<?php echo U('Admin/Category/add');?>"  target="rightFrame">添加顶级分类</a><i></i></li>
        </ul>     
    </dd>  


    <dd>
    <div class="title">
    <span><img src="/hailun/web/think/Public/Admin/images/leftico02.png" /></span>品牌管理
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="<?php echo U('Admin/Brand/index');?>" target="rightFrame">品牌列表</a><i></i></li>
        <li><cite></cite><a href="<?php echo U('Admin/Brand/addBrank');?>"  target="rightFrame">添加品牌</a><i></i></li>
        </ul>     
    </dd>     


    <dd>
    <div class="title">
    <span><img src="/hailun/web/think/Public/Admin/images/leftico01.png" /></span>产品管理
    </div>
    	<ul class="menuson">
        
        <li><cite></cite><a href="<?php echo U('Admin/Product/index');?>" target="rightFrame">产品列表</a><i></i></li>
        <li class="active"><cite></cite><a href="<?php echo U('Admin/Product/addPro');?>" target="rightFrame">添加产品</a><i></i></li>
        
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="/hailun/web/think/Public/Admin/images/leftico02.png" /></span>轮播图片
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="<?php echo U('Admin/Carousel/index');?>" target="rightFrame">大图轮播</a><i></i></li>
        <li><cite></cite><a href="<?php echo U('Admin/Carousel/small');?>" target="rightFrame">小图轮播</a><i></i></li>
        <li><cite></cite><a href="<?php echo U('Admin/Carousel/model');?>" target="rightFrame">中图轮播</a><i></i></li>
        </ul>     
    </dd> 
    
    
    <dd><div class="title"><span><img src="/hailun/web/think/Public/Admin/images/leftico03.png" /></span>订单管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="<?php echo U('Admin/Buyinfo/index');?>" target="rightFrame">订单</a><i></i></li>
        <!-- <li><cite></cite><a href="{|U:'Admin/Buyinfo/buyinfo'}" target="rightFrame">订单信息</a><i></i></li> -->
        
    </ul>    
    </dd>  
    
    
    <dd><div class="title"><span><img src="/hailun/web/think/Public/Admin/images/leftico04.png" /></span>用户管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="<?php echo U('Admin/User/index');?>" target="rightFrame">前台用户</a><i></i></li>
        <li><cite></cite><a href="<?php echo U('Admin/User/adminIndex');?>" target="rightFrame">后台用户</a><i></i></li>
    </ul>
    
    </dd>   

    <dd><div class="title"><span><img src="/hailun/web/think/Public/Admin/images/leftico04.png" /></span>评价管理</div>
    <ul class="menuson">
        <li><cite></cite><a href="<?php echo U('Admin/Appraise/index');?>" target="rightFrame">评价管理</a><i></i></li>
       
    </ul>
    
    </dd>   

    <dd><div class="title"><span><img src="/hailun/web/think/Public/Admin/images/leftico04.png" /></span>友情链接</div>
    <ul class="menuson">

        <li><cite></cite><a href="<?php echo U('Admin/Flink/index');?>" target="rightFrame">友情链接</a><i></i></li>
        <li><cite></cite><a href="<?php echo U('Admin/Flink/add');?>" target="rightFrame">添加友情</a><i></i></li>

    </ul>
    
    </dd>   
    

   
    </dl>
    
</body>
</html>