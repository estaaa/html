<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/hailun/web/think/Public/Static/Bootstrap/css/bootstrap.min.css">
<script type="text/javascript">
var INDEX = "<?php echo U('Admin/Category/index');?>";
var postAjax = "<?php echo U('Admin/Category/textAjax');?>";
var clickAjax = "<?php echo U('Admin/Category/clickAjax');?>";

function del(num){
$(".tip").fadeIn(200);
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
    location.href="<?php echo U('Admin/Category/del');?>?cid="+num;
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
        <th></th>
        <th>分类id<i class="sort"><img src="/hailun/web/think/Public/Admin/images/px.gif" /></i></th>
        <th>分类名称</th>
        <th>分类描述</th>
        <th>分类关键字</th>
        <th>是否显示分类</th>
        <th style="width:270px;">操作</th>
        </tr>
        </thead>
        
        
         <?php if(is_array($cateData)): $i = 0; $__LIST__ = $cateData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tbody cid="<?php echo ($v["cid"]); ?>" pid="<?php echo ($v["pid"]); ?>" class="fat">
                <tr>
                <td><a href="" class="glyphicon glyphicon-plus click-btn"></a></td>
                <td><?php echo ($v["cid"]); ?></td>
                <td><?php echo ($v["_name"]); ?></td>
                <td><?php echo ($v["cdes"]); ?></td>
                <td><?php echo ($v["ckeywords"]); ?></td>
                <td><?php if($v['is_show']==0): ?>是<?php else: ?>否<?php endif; ?> </td>
                <td>
                    <a href="<?php echo U('addSon',array('cid'=>$v['cid']));?>" class="btn btn-primary" >添加子分类</a>
                    <a href="<?php echo U('edit',array('cid'=>$v['cid']));?>" class="btn btn-info">编辑</a>     
                    <a href="javascript:del(<?php echo ($v["cid"]); ?>);" class="btn btn-danger click">删除</a>
                </td>

                </tr> 
            </tbody><?php endforeach; endif; else: echo "" ;endif; ?>


        
    </table>
    
   
    <div class="pagin">
    <?php echo ($page); ?>
        <!-- <div class="message">共<i class="blue">1256</i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
        <ul class="paginList">
        <li class="paginItem"><a href="javascript:;"><span class="pagepre"></span></a></li>
        <li class="paginItem"><a href="javascript:;">1</a></li>
        <li class="paginItem current"><a href="javascript:;">2</a></li>
        <li class="paginItem"><a href="javascript:;">3</a></li>
        <li class="paginItem"><a href="javascript:;">4</a></li>
        <li class="paginItem"><a href="javascript:;">5</a></li>
        <li class="paginItem more"><a href="javascript:;">...</a></li>
        <li class="paginItem"><a href="javascript:;">10</a></li>
        <li class="paginItem"><a href="javascript:;"><span class="pagenxt"></span></a></li>
        </ul> -->
    </div>
    
    
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
function dli(id)
{
   location.href="/hailun/web/think/index.php/Admin/Category/index" + '?cid=' + id;
}
           
$(function(){
      $('tbody[pid!=0]').hide();
      // 这里要做收缩效果 所以要用toggle
      $('.click-btn').toggle(function(){
            // 让加号变为减号
            $(this).removeClass('glyphicon-plus').addClass('glyphicon-minus');
            // 获得父级的cid
            var cid = $(this).parents('tbody').attr('cid');

            // 让子集为父级的cid的元素显示
           $('tbody[pid='+cid+']').css({backgroundColor:"#286090",color:"#07a3f9"}).show();
          
           $.ajax({
                url:clickAjax,
                type:'post',
                data:{cid:cid},
                dataType:'json',
                success:function(phpData){
                    $.each(phpData,function(k,v){
                        $("tbody[cid="+v+"]").find('.click-btn').hide().parents('tr').css({backgroundColor:"#286090",color:"#07a3f9"});

                    })

                }
           })
      },function(){
            $(this).removeClass('glyphicon-minus').addClass('glyphicon-plus');
            var cid = $(this).parents('tbody').attr('cid');
            // 让子集为父级的cid的元素隐藏
            // 由于收缩 只能收缩一级子集分类 所以要 用ajax 来获得 全部子分类
             // $('tbody[pid='+cid+']').hide();
             $.ajax({
                url:postAjax,
                type:'post',
                data:{cid:cid},
                dataType:'json',
                success:function(phpData){
                    // 接收数据
                    // alert(phpData)
                    $.each(phpData,function(k,v){
                        $('tbody[cid='+v+']').hide();
                    })
                }
             })
        
      })   
})
               
           
                    
           
                    
     
           
  
    </script>
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>

</html>