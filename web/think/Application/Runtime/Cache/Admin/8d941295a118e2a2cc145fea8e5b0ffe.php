<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑货品</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/hailun/web/think/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
<!-- <script type="text/javascript" src="__CONTROLLER_VIEW__/js/jquery.idTabs.min.js"></script> -->
<script type="text/javascript" src="/hailun/web/think/Public/Admin/js/select-ui.min.js"></script>
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
<form action="" method="post" accept-charset="utf-8" enctype='multipart/form-data'>
	<div class="place">
  
    <span>位置：</span>
    <ul class="placeul">
    
     
    
    <li><a href="#">首页</a></li>
    <li><a href="#">编辑货品</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1" class="selected">编辑货品</a></li> 
    
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson" style="width:500px;margin:0 auto;">
    
    <div class="formtext">Hi，<b>admin</b>，欢迎您试用编辑功能！</div>
    
    <ul class="forminfo">
    <?php if(is_array($spec)): $k = 0; $__LIST__ = $spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li><label><?php echo ($v["stitle"]); ?><b>*</b></label>
        <div class="cityleft">
        <select class="select2" name="attrand[]">
        <option value="0">请选择</option>
        <?php if(is_array($v['content'])): $kk = 0; $__LIST__ = $v['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><option value="<?php echo ($vv["attid"]); ?>" <?php if(is_array($oldData['attrand'])): $key = 0; $__LIST__ = $oldData['attrand'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key; if($vv['attid']==$value): ?>selected<?php endif; endforeach; endif; else: echo "" ;endif; ?>  ><?php echo ($vv["avalue"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

        </select>
        </div>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
    
    <li><label>产品编码<b>*</b></label><input name="styleid" type="text" class="dfinput" value="<?php echo ($oldData["styleid"]); ?>"  style="width:218px;"/></li>
    <li><label>库存<b>*</b></label><input name="stock" type="text" class="dfinput" value="<?php echo ($oldData["stock"]); ?>"  style="width:218px;"/></li>

   
    
   <input name="" type="submit" class="btn" value="添加"/>
   </form>    
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