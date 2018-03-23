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
		$(".imglist li.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>
<script type="text/javascript">

    function dell(num,pro_id,tid){

        $(".click").click(function(){
          $(".tip").fadeIn(200);
          });
          
          $(".tiptop a").click(function(){
          $(".tip").fadeOut(200);
        });

          $(".sure").click(function(){
            location.href="<?php echo U('Admin/Prolist/del/num/"+num+"/pro_id/"+pro_id+"/tid/"+tid+"');?>";
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
</style>
</head>


<body>
    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="/hailun/web/think/Public/Admin/images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
        </div>
        
        <div class="tipbtn">
        <input name="" type="button"  class="sure" value="确定" />&nbsp;
        <input name="" type="button"  class="cancel" value="取消" />
        </div>
    
    </div>
	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">货品列表</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
 
    
    
    <table class="imgtable">
    
    <thead>
    <tr>
    <th>货品id</th>
    <?php if(is_array($spec)): $k = 0; $__LIST__ = $spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><th><?php echo ($v["stitle"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
    <th>库存</th>
    <th>编号</th>
    <th>操作</th>
    </tr>
    </thead>
    
    <tbody>
    <?php if(is_array($listData)): $k = 0; $__LIST__ = $listData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr>
                    <td><?php echo ($v["listid"]); ?></td>
                    <?php if(is_array($v['spec'])): $kk = 0; $__LIST__ = $v['spec'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><td><?php echo ($vv); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                    <td><?php echo ($v["styleid"]); ?></td>
                    <td><?php echo ($v["stock"]); ?></td>
                    <td style="text-indent:0px;width:150px;">
                        <a href="<?php echo U('edit',array('pro_id'=>$_GET['pro_id'],'tid'=>$_GET['tid'],'listid'=>$v['listid']));?>" class="btn btn-info">修改</a>
                        <a href="javascript:dell(<?php echo ($v["listid"]); ?>,<?php echo ($_GET['pro_id']); ?>,<?php echo ($_GET['tid']); ?>);" class="btn btn-danger click">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    
    
  
    
    </tbody>
    
    </table>
       <a href="<?php echo U('add',array('pro_id'=>$_GET['pro_id'],'tid'=>$_GET['tid']));?>" class="btn btn-primary" style="margin-top:30px;height:25px;width:80px;text-align: center;" onmouseover="this.style.color='#fff'">添加货品</a>
    
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