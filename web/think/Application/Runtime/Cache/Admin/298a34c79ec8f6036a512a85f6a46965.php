<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加产品</title>
<link href="/hailun/web/think/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/hailun/web/think/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/hailun/web/think/Public/Static/Js/jquery-1.7.2.min.js"></script>
<!-- <script type="text/javascript" src="__CONTROLLER_VIEW__/js/jquery.idTabs.min.js"></script> -->
<script type="text/javascript" src="/hailun/web/think/Public/Admin/js/select-ui.min.js"></script>

<!-- <script type="text/javascript" src="/hailun/web/think/Public/Static/uploadify/jquery.uploadify.min.js"></script> -->

<!-- 引入编辑器**************************************** -->
   <script type="text/javascript" charset="utf-8" src="/hailun/web/think/Public/Static/ueditor1_4_3/ueditor.config.js"></script>
   <script type="text/javascript" charset="utf-8" src="/hailun/web/think/Public/Static/ueditor1_4_3/ueditor.all.min.js"> </script>
   <script type="text/javascript" charset="utf-8" src="/hailun/web/think/Public/Static/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
   <!-- 结束************************************************* -->
<!-- <link href="/hailun/web/think/Public/Static/uploadify/uploadify.css" type="text/css" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="/hailun/web/think/Public/Static/uplode/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/hailun/web/think/Public/Static/uplode/diyUpload/css/diyUpload.css">
<script type="text/javascript" src="/hailun/web/think/Public/Static/uplode/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="/hailun/web/think/Public/Static/uplode/diyUpload/js/diyUpload.js"></script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	})
	$(".select2").uedSelect({
		width : 167  
	})
	$(".select3").uedSelect({
		width : 100
	})
})


// 点击x删除图片
$('.forminfo li i.close').live('click',function(){
  var liObj = $(this).parents('a.list-left');
  //找到父级li里面的地址
  var path = liObj.attr('path');
  //发异步到服务器删除
  $.ajax({
    type:"post",
    url:"<?php echo U('delImg');?>",
    data:{path:path},
    success:function(data){
      //移除图片
      liObj.remove();
    }
  })
})

$(function(){
  // 异步获得规格和属性
  // change事件 针对下拉菜单
  $("select[name=cid]").change(function(){
      var tid = $(":selected").attr('tid');
      if(tid==0){
        return alert('不能选择顶级分类');
      }
      $.ajax({
        type:"post",
        data:{tid:tid},
        url:"<?php echo U('getAttrSpec');?>",
        dataType:'json',
        success:function(phpData){
          // 属性
          var attr = '';
          // 规格
          var spec = '';
          $.each(phpData,function(k,v){
            // 如果是属性(属性是不可选的)
            if(v.is_edit==0){
              attr +='<tr><td>'+v.stitle+'</td><td><select class="select2" name="avalue['+v.sid+'][]"><option value="0">请选择</option>';
              $.each(v.content,function(kk,vv){
                attr += '<option value="'+vv+'">'+vv+'</option>';
              });

              attr += '</select></td></tr>';
            }else{
              spec += '<tr><td>'+v.stitle+'</td><td><select name="spec['+v.sid+'][avalue][]"><option  value="0">请选择</option>';
              $.each(v.content,function(kk,vv){
                spec += '<option value="'+vv+'">'+vv+'</option>';
              });

              spec += '</select></td><td>附加价格</td><td><input type="text" name="spec['+v.sid+'][added][]" value="" style="border:1px solid #ccc;height:25px;"></td><td><a href="javascript:;" class="addlist">增加一项</a></td><td><a class="dellist" href="javascript:;">删除</a></td></tr>';
            }
          })

          $('#attr').html(attr);
          $('#spec').html(spec);
        },
      })
  })
})


$(function(){
  $('.addlist').live('click',function(){
    var listhtml = $(this).parents('tr').clone();
    $(this).parents('tr').after(listhtml);
    
  })

  $('.dellist').live('click',function(){
    $(this).parents('tr').hide();
  })
})

</script>
<style type="text/css" media="screen">
  .list-left,.hd-h70{
    width:50px;
    height:50px;
    margin-left:5px;
    float: left
    ;
  }
  .list-left{
    position: relative;
  }
  .list-left img{
    margin:0px;
    padding:0px;
  }
  .forminfo li i.close{
    position:absolute;
    top:0px;
    height:12px;
    width:12px;
    text-align: center;
    cursor:pointer;
    line-height:12px;
    background: red;
    padding:0px;
    right:0px;
    display: block;
  }
   #spec select,#attr select{
    opacity: 1;
    width:100px;
    height:25px;
    color:red;
  }
  #spec{
    width:700px;
  } 
  #spec tr,#attr tr{
    width:700px;
    height:30px;

    border-bottom:1px solid #ccc;
  }
  #spec tr td,#attr tr td{
    width:200px;
    height:30px;
    text-align: left;
  }
  #edit{
    width:800px;
    height:20px;
    
  }

 #edui561_toolbarbox,#edui562{
    width:800px;
    height:100px;
  }
 .edit_hd{
  margin-top:20px;
  width:800px;
 
 }
#edui282_elementpath{
  display:none;
}

</style>
</head>

<body>
<form action="" method="post" accept-charset="utf-8" enctype='multipart/form-data'>
	<div class="place">
  
    <span>位置：</span>
    <ul class="placeul">
    
     
    
    <li><a href="#">首页</a></li>
    <li><a href="#">系统设置</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1" class="selected">发布通知</a></li> 
    
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson" style="width:500px;margin-left:100px;">
    
    <div class="formtext">Hi，<b>admin</b>，欢迎您试用信息发布功能！</div>
    
    <ul class="forminfo">
    <li><label>所属分类<b>*</b></label>
        <div class="cityleft">
        <select class="select2" name="cid">
        <option value="0">请选择</option>
        <?php if(is_array($cateAll)): $i = 0; $__LIST__ = $cateAll;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["cid"]); ?>" tid="<?php echo ($v["type_tid"]); ?>"><?php echo ($v["_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

        </select>
        </div>
    </li>
   <li><label>所属品牌<b>*</b></label>
       <div class="cityleft">
       <select class="select2" name="brand_bid">
       <option  value="0">请选择</option>
       <?php if(is_array($brandAll)): $i = 0; $__LIST__ = $brandAll;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["bid"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
       </select>
       </div>
   </li>
    <li><label>产品标题<b>*</b></label><input name="p_title" type="text" class="dfinput" value=""  style="width:218px;"/></li>
    <li><label>产品描述</label><input name="pro_des" type="text" class="dfinput" value=""  style="width:218px;"/></li>
    <li><label>活动信息</label><input name="activity" type="text" class="dfinput" value=""  style="width:218px;"/></li>
   <li>
        <label>是否推荐</label>
        <span style='display:inline;line-height: 36px;'>是</span>
        <input name="is_sustain" type="radio" class="dfinput" value="1"  style="width:12px;height:12px;"/>
        <span style='display:inline;line-height: 36px;'>否</span>
        <input name="is_sustain" type="radio" class="dfinput" value="0"  style="width:12px;height:12px;" checked="checked" />
        </li>
    <li><label>赠送货物</label><textarea name="give" class="dfinput" style="width:218px;height:100px;"></textarea><span style="color:red;padding:4px 100px;">多个以','号隔开</span></li>
     <li><label>市场价<b></b></label><input name="market_price" type="text" class="dfinput" value=""  style="width:218px;"/></li>
    <li><label>商城价格<b>*</b></label><input name="p_cost" type="text" class="dfinput" value=""  style="width:218px;"/></li>
    <li><label>产品编码<b>*</b></label><input name="p_code" type="text" class="dfinput" value=""  style="width:218px;"/></li>
    <li><label>运费<b>*</b></label><input name="carriage" type="text" class="dfinput" value=""  style="width:218px;"/></li>
    <li><label>库存<b>*</b></label><input name="surplus" type="text" class="dfinput" value=""  style="width:218px;"/></li>

    <li><label>属性<b>*</b></label>
      <table id="attr">
        
      </table>
    </li>
    <li><label>规格<b>*</b></label>
      <table id="spec">
        
      </table>
    </li>








  <li ><label>列表页图片<b>*</b></label>
  <input id="file" type="file" multiple="true" name="list_img[]" style="display:none;"/>
  <div id="box">
  <div id="test" ></div>
  </div>
  <script  type="text/javascript" charset="utf-8">
    $('#test').diyUpload({
      url:"upload",
      success:function(data){
        var path ='<input type="hidden" name="list_thumb" value="'+data+'"/>';
        $("#file").after(path);
      },
      error:function(err) {
        // console.info(err);  
      }
    });

  </script>
</li>
 <li ><label>详情页图片<b>*</b></label>
 <input id="content" type="file" multiple="true" name="big" style="display:none;"/>
  <div id="box1">
  <div id="demo" ></div>
  </div>
  <script  type="text/javascript" charset="utf-8">
    $('#demo').diyUpload({
      url:"upload",
      success:function(data){
        var path='<input type="hidden" name="thumb[]" value="'+data+'"/>';
        $("#content").after(path);
      },
      error:function(err) {
        // console.info(err);  
      }
    });

  </script>
</li>

  
















   
    <li id="edit"><label>产品详情<b>*</b></label></li>
    <!-- 编辑器**************************** -->
    <!-- 第一个script可以看做是一个标签 -->
    <!-- name是可以传参的 -->
    <div class="edit_hd">
       <script id="ed1" type="text/plain"  name="pro_content"></script>
      <script>
        var ue = UE.getEditor('ed1');
      </script>

    </div>
     
    



    <li id="edit"><label>包装清单<b>*</b></label></li>
    <!-- 编辑器**************************** -->
    <!-- 第一个script可以看做是一个标签 -->
    <!-- name是可以传参的 -->
    <div class="edit_hd">
       <script id="ed2" type="text/plain"  name="pack_list"></script>
      <script>
        var ue = UE.getEditor('ed2');
      </script>

    </div>
     
    



    <li id="edit"><label>售后服务<b>*</b></label> </li>
    <!-- 编辑器**************************** -->
    <!-- 第一个script可以看做是一个标签 -->
    <!-- name是可以传参的 -->
    <div class="edit_hd">
       <script id="ed" type="text/plain"  name="after_sale"></script>
      <script>
        var ue = UE.getEditor('ed');
      </script>

    </div>
     
   
   
    </ul>
    
    </div> 
    
    
   <input name="" type="submit" class="btn" value="马上发布"/>
   </form>    
	</div> 
 
	
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    
    
    
    
    
    </div>


</body>

</html>