<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加品牌</title>
<link href="/hailun/web/think/Public/Admin/css/bank.css" rel="stylesheet" type="text/css" />
<link href="__VIEW__/Category/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__VIEW__/Category/js/jquery.js"></script>
<script type="text/javascript" src="__VIEW__/Category/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="__VIEW__/Category/js/select-ui.min.js"></script>
<!-- <script type="text/javascript" src="__VIEW__/Category/editor/kindeditor.js"></script> -->

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 220			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
<style type="text/css" media="screen">

</style>
</head>

<body>


    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1" class="selected">添加品牌</a></li>
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson">
    
    <div class="formtext">Hi，欢迎您使用添加！</div>
    <form action="" method="post" enctype='multipart/form-data'>
    
    
    <ul class="forminfo">
    <li id="img_box">
        <label>品牌LOGO</label>
        <img id="img"  src="/hailun/web/think/Public/Admin/images/adminlogo.jpg" >
        <span id="file">上传LOGO</span>
        <input type="file" id="thumb" name="logo" src="/hailun/web/think/Public/Admin/images/adminlogo.jpg"></li>

    <li><label>品牌标题</label><input name="title" type="text" class="dfinput" value="<?php echo ($allUser["username"]); ?>"  style="width:218px;"/></li>


    <li><label>排序</label><input name="sort" type="text" class="dfinput" value="<?php echo ($allUser["password"]); ?>"  style="width:218px;"/></li>

    
    
    

    
    


   
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/></li>
    </ul>
    </form>
    </div> 
    
    
  	<div id="tab2" class="tabson">
    
    

    
 
    
   
  
    
    </div>  
       
	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    
    
    
    
    
    </div>


</body>

</html>