<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/hailun/web/think/Public/Static/Bootstrap/css/bootstrap.min.css">
<script type="text/javascript">

function del(num){
$(".tip").fadeIn(200);
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
    location.href="<?php echo U('Admin/Flink/del');?>?fid="+num;
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});
}

</script>

<style>
    .btn{
        padding:0;
        width:70px;
        height:30px;
        line-height: 30px;
        text-indent:0;
        font-size: 12px;
        text-align: center;
    }
</style>
</head>


<body>


    
    <div class="rightinfo">
 
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
    
        <th>链接id<i class="sort"><img src="/hailun/web/think/Public/Admin/images/px.gif" /></i></th>
        <th>友情链接名称</th>
        <th>友情链接</th>
       
        <th style="width:270px;" text-align="center">操作</th>
        </tr>
        </thead>
        
        
         <?php if(is_array($flinkData)): $k = 0; $__LIST__ = $flinkData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tbody class="fat">
                <tr>
                <td><?php echo ($v["fid"]); ?></td>
                <td><?php echo ($v["ftitle"]); ?></td>
                <td><?php echo ($v["link"]); ?></td>
             
                <td>
                    <a href="<?php echo U('edit',array('fid'=>$v['fid']));?>" class="btn btn-primary" style="text-align: center;" >编辑</a>
                    
                    <a href="javascript:del(<?php echo ($v["fid"]); ?>);" class="btn btn-danger click">删除</a>
                </td>

                </tr> 
            </tbody><?php endforeach; endif; else: echo "" ;endif; ?>


        
    </table>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/hailun/web/think/Public/Admin/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认要删除？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
       
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        
        <input name="" type="button"  class="cancel" value="取消" />
        
        </div>
    
    </div>
    
    
    
    
    </div>
<script type="text/javascript">

           

                    
           
                    
     
           
  
    </script>
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>