<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品列表</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/hailun/web/think/Public/Static/Bootstrap/css/bootstrap.min.css">
<script language="javascript">
$(function(){	
	//导航切换
	$(".imglist li").click(function(){
		$(".imglist li.selected").removeClass("selected");
		$(this).addClass("selected");
	})	
})	
</script>
<script type="text/javascript">

    function dell(num){
        $(".click").click(function(){
          $(".tip").fadeIn(200);
          });
          
          $(".tiptop a").click(function(){
          $(".tip").fadeOut(200);
        });

          $(".sure").click(function(){
            location.href="<?php echo U('del');?>?pro_id="+num;
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
        width:60px;
        height:30px;
        line-height: 30px;
        text-indent:0;
        font-size: 12px;
        text-align: center;
    }
    .page{
        width:900px;
        height:50px;
    }
    .page a,.page span{
        display:block;
        width:20px;
        height:50px;
        line-height: 50px;
        float:left;
    }
</style>
</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">产品列表</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
 
    
    
    <table class="imgtable">
    
    <thead>
    <tr>
    <th width="100px;">缩略图</th>
    <th>标题</th>
    <th>价格</th>
    <th>已售出</th>
    <th>发布人</th>
    <th>库存</th>
    <th>操作</th>
    </tr>
    </thead>
    
    <tbody>
    <?php if(is_array($proData)): $i = 0; $__LIST__ = $proData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
    <td class="imgtd"><img src="/hailun/web/think/<?php echo ($v["list_img"]); ?>" style="height:60px;width:80px;"/></td>
    <td><a href="<?php echo U('Index/Content/index',array('pro_id'=>$v['pro_id']));?>"><?php echo ($v["p_title"]); ?></a><p>发布时间：<?php echo (date('Y-m-d H:i:s',$v["add_time"])); ?></p></td>
    <td><?php echo ($v["market_price"]); ?>元<p>编码: <?php echo ($v["p_code"]); ?></p></td>
    <td><?php echo ($v["buy_num"]); ?></td>
    <td><?php echo ($v["username"]); ?></td>
    <td><?php echo ($v["surplus"]); ?></td>
    <td style="text-indent: 0px;text-align: center;width:260px;">
        <a href="<?php echo U('Admin/Prolist/index',array('pro_id'=>$v['pro_id'],'tid'=>$v['type_tid']));?>" class="btn btn-primary"  style="text-indent: 0px;text-align: center;">货品列表</a>
        <a href="<?php echo U('edit',array('pro_id'=>$v['pro_id']));?>" class="btn btn-info">编辑</a>
        <a href="javascript:dell(<?php echo ($v["pro_id"]); ?>);"  class="btn btn-danger click">删除</a>
    </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    
    
    
     
    </tbody>
    
    </table>
    
    
    
    
    
   
    <div class='page'>
    <tr><td><?php echo ($show); ?></td></tr>
    </div>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/hailun/web/think/Public/Admin/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认要删除此商品 ？</p>
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
	$('.imgtable tbody tr:odd').addClass('odd');
	</script>
    
</body>

</html>