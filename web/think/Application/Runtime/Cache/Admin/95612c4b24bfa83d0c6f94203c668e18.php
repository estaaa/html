<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/hailun/web/think/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
</head>

<body>


    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1" class="selected">添加顶级分类</a></li>
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson">
    
    <div class="formtext">Hi，<b><?php echo ($hd["session"]["adminname"]); ?></b>，欢迎您使用添加分类功能！</div>
    <form action="" method="post" >
    
    
    <ul class="forminfo">
    <li><label>分类名称<b>*</b></label><input name="ctitle" type="text" class="dfinput" value=""  style="width:218px;"/></li>
   
    <li><label>所属分类<b>*</b></label>  
        <div class="vocation">
        
        <span style="display:block;line-height: 34px;color:red;">顶级分类</span>
       
      
        </div>
    </li>

   
    <li><label>分类关键字</label><input name="ckeywords" type="text" class="dfinput" value=""  style="width:218px;"/></li>
    <li><label>分类描述</label><input name="cdes" type="text" class="dfinput" value=""  style="width:218px;"/></li>
  
   <!--  <li><label>静态目录<b>*</b></label><input name="htmldir" type="rodia" class="dfinput" value=""  style="width:218px;"/></li>
   <li><label>列表页静态</label>
   <div class="box" style="height:24px;padding-top: 10px;">
       是:<input name="is_listhtml" type="radio" value="1" checked="checked"/>
       否:<input name="is_listhtml" type="radio" value="0"/>
   </div>
     
   </li>
   <li><label>内容页静态</label>
   <div class="box" style="height:24px;padding-top: 10px;">
       是:<input name="is_archtml" type="radio" value="1"  checked="checked"/>
       否:<input name="is_archtml" type="radio" value="0"  />
   </div></li> -->
    <li><label>是否显示分类</label>
    <div class="box" style="height:24px;padding-top: 10px;">
        是:<input name="is_show" type="radio" value="0"  checked="checked"/>
        否:<input name="is_show" type="radio" value="1"  />
    </div></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="马上发布"/></li>
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