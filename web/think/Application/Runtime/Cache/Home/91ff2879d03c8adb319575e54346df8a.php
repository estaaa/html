<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
        
    <script src="/o2o/web/think/Public/Static/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
    var APP = "/o2o/web/think/index.php/Home/User";
    var pro_id="<?php echo ($proData["pro_id"]); ?>";
    var ROOT = "/o2o/web/think/Public/Static";
    </script>
    
    
    <script  type="text/javascript" charset="utf-8">
    $(function(){
        // 顶部购物车
        $('.cart').hover(function(){
            var is_log = $('#top-nav .nav-cen .left li a.log').html();
            if(is_log=='登录'){return;}

            // alert(is_log);
            $.ajax({
                url:"<?php echo U('Home/Content/topBuy',array('pro_id'=>$_GET['pro_id']));?>",
                type:'post',
                data:{specs:1},
                dataType:'json',
                success:function(phpdata){
                  if(phpdata.con==''){
                    $('.shop-f').hide();
                    $('#buy-box').html('<b class="font-size:12px;display:block;width:120px;margin:0 auto;">您还没有添加购物车哦</b>');
                    return;
                }
                 $('.shop-f').show();
                 $('#buy-box').html('') 
                        var str='';
                        $.each(phpdata.con,function(x,y){
                            str+='<div class="shop-box">';
                            str+='<div class="shop-l">';
                            str+='<a href="'+"<?php echo U('Home/Content/index');?>?pro_id="+y.id+'" >';
                            
                            str+='<img src="'+'/o2o/web/think/'+y.list_img+'"';
                            str+=' style="width:80px;height:80px;"/></a>';
                            str+='</div>';
                            str+='<div class="shop-r">';
                            str+='<p>'+y.name+'</p>';
                            str+='<p><span>¥ '+y.price+' * '+y.num+'</span></p>';
                            str+='</div>';
                            str+='</div>';
                        })

                        /*if($('.shop_box').length==0){
                            $('.shop-f').hide();
                            $('#buy-box').html('<b class="font-size:12px;display:block;width:120px;margin:0 auto;">您还没有添加购物车哦</b>');return;}*/
                        $('#buy-box').after(str);
                        $('.f-n').html(phpdata.numAll);
                        $('.f-t').html(phpdata.allPic);
                        $('#search .cen .shop .list li.cart span i').html(phpdata.numAll);
                    
                }
            })
        },function(){
            $('.shop-box').remove();
        })
    })
        
    </script>
    </head>
    <body>
        <!-- 顶部导航 -->
        <div id="top-nav">
            <!-- 居中 -->
            <div class="nav-cen">
                <!-- 右侧 -->
                <div class="right">
                    <ul>
                        <li><a href="">华为官网</a></li><span></span>
                        <li><a href="">华为荣耀</a></li><span></span>
                        <li><a href="">EMUI</a></li><span></span>
                        <li><a href="">应用市场</a></li><span></span>
                        <li><a href="">云服务</a></li><span></span>
                        <li><a href="">开发者联盟</a></li><span></span>
                        <li><a href="">花粉俱乐部</a></li>
                    </ul>
                </div>
                <!-- 右侧 -->
                <div class="left">
                    <ul>
                    <?php if(isset($_SESSION['username'])): ?><li class="private">
                         <a href="" ><?php echo (session('username')); ?></a>
                         <div class="list">
                             <a href="<?php echo U('Home/Protected/index');?>">个人中心</a>
                             <a href="<?php echo U('Home/Index/close');?>" class="clo">退出</a>
                         </div>
                     </li>
                     <?php else: ?>
                     <li><a href="<?php echo U('Home/Login/index');?>" class="log">登录</a></li>
                     <li><a href="<?php echo U('Home/Login/logon');?>" class="log">注册</a></li><?php endif; ?>
<span></span>
                        <li><a href="">V码(优购码)</a></li><span></span>
                        <li>
                            <a href="">手机版</a>
                        </li>
                        <span></span>
                        <li class="top-list">
                            <a href="" class="last">网站导航<span class="ico"></span></a>
                            <div class="help">

                                <a href="">帮助中心</a>
                                <a href="">PC软件</a>
                                <a href="">数字音乐</a>
                                <a href="">爱旅</a>
                                <a href="">华为网盘</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- 居中 -->
        </div>
        <!-- 顶部导航 end-->
      
        <!-- 头部搜索区域 -->
        <div id="search">
            <div class="cen">
                <!-- logo图片 -->
                <div class="logo">
                    <a href="<?php echo U('Home/Index/index');?>">
                    <img src="/o2o/web/think/Public/Static/Images/newLogo.png" alt="">
                    </a>
                </div>
                <!-- logo图片end -->
                <!-- 搜索区 -->
                <div class="sear">
                    <form action="<?php echo U('Home/Search/index');?>" method="get" accept-charset="utf-8">
                        <input type="text" class="text" value="荣耀6" name="keyword"/>
                        <input type="submit" value="搜索" class="btn">
                    </form>
                    <div class="nav">
                        <a href="javascript:;">热门搜索：</a>
                        <a href="">华为P8</a>
                        <a href="">指纹识别</a>
                        <a href="">畅玩4X</a>
                        <a href="">荣耀4C</a>
                        <a href="">年中大促</a>
                    </div>
                </div>
                <!-- 搜索区end -->
                <!-- 购物车 -->
                <div class="shop">
                    <div class="list">
                        <ul>
                            <li class="store">
                                <s></s>
                                <a href="">我的商城</a>
                                <div class="my-shop">
                                    <?php if(isset($_SESSION['username'])): ?><p><a href="<?php echo U('Home/User/index');?>">欢迎您 <?php echo (session('username')); ?> 回来</a></p>
                                    <?php else: ?>
                                     <p>你好，请  <span>登录</span> | <span>注册</span></p><?php endif; ?>
                                        <div class="shop-list">
                                            <a href="<?php echo U('Home/User/goods');?>">我的订单</a>
                                            <a href="<?php echo U('Home/User/address');?>" class="no-bor">收货地址</a>
                                            <!-- <a hr:f"HomeIndex/User/index'}">待评论</a> -->
                                            <a href="<?php echo U('Home/User/index');?>" class="no-bor">账户余额</a>
                                            <a href="<?php echo U('Home/User/returns');?>">我的退货</a>
                                        </div>
                                        
                                </div>
                            </li>
                            <li class="cen"></li>

                            <li  class="cart">
                                <a href="<?php echo U('Home/Address/index');?>">我的购物车</a>
                                <s></s>
                                <span><i>0</i><s></s></span>
                                <?php if(isset($_SESSION['username'])): ?><div class="my-car">
                                    <b id="buy-box"></b>

                                    <div class="shop-f">
                                        <p><span>共</span><span class="f-c f-n">2</span><span>件商品，金额合计¥</span><span class="f-c f-t">238.00</span><b></b> <a href="<?php echo U('Home/Address/index');?>">去结算</a></p>
                                        
                                    </div>
                                </div>
                                <?php else: ?>
                                    <div class="my-car" style="color:#ccc;text-align: center;line-height: 30px;">
                                    登陆才可以看到哦!
                                    </div><?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- 购物车end -->
                <!-- 二维码 -->
                <div class="code">
                    <div class="right">
                        <div class="icon icon3" style="display:none;">
                            <a href="">
                            <img src="/o2o/web/think/Public/Static/Images/code1.jpg" alt="">
                            <span>微信扫码关注我们</span>
                            </a>
                        </div>
                        <div class="icon icon2" >
                            <a href="">
                            <img src="/o2o/web/think/Public/Static/Images/code2.png" alt="">
                            <span>华为商城官方微信</span>
                            </a>
                        </div>
                    </div>
                    <div class="rodio">
                        
                        <span></span>
                        <span style="background:#F79F2E"></span>
                    </div>
                </div>
                <!-- 二维码结束 -->
            </div>
        </div>
        <!-- 头部搜索区域end -->
<!-- 公共结束 -->

<script src="/o2o/web/think/Public/Js/index.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="/o2o/web/think/Public/Css/user.css">
<script src="/o2o/web/think/Public/Js/js.js" type="text/javascript" charset="utf-8"></script>
       <script language="javascript" src="/o2o/web/think/Public/Js/address.js"></script>
<script language="javascript">
var s=["s1","s2","s3"];
var opt0 = ["请选择省","请选择市","请选择县（区）"];
function setup(){
 for(i=0;i<s.length-1;i++)
  document.getElementById(s[i]).onclick=new Function("change("+(i+1)+")");
 change(0);
}
window.onload=function(){
setup()  
 
};
$(function(){

  $('form').submit(function(){
            $('input[type=submit]').val("添加新地址");
            var shop_city = $('#s1').val() + '省,' + $('#s2').val() + '市,' + $('#s3').val();
            var fromdata = $(this).serialize()+'&shop_city='+shop_city;
            var _this = $(this);
            $.ajax({
                url:'addressd',
                type:'post',
                data:fromdata,
                dataType: 'json',
                success:function(phpData){
                    if(phpData==1){alert('收货人不能为空');return;}
                    if(phpData==2){alert('收货地址不能为空');return;}
                    if(phpData==3){alert('收货详细地址不能为空不能为空');return;}
                    if(phpData==4){alert('手机号码不能为空');return;}
                    var str='';
                    $.each(phpData,function(x,y){
                          str+='<div class="in-nav both">';
                          str+='<a href="javascript:;" style="width:140px;">'+y.add_people+'</a>';
                          str+='<a href="javascript:;" style="width:250px;">'+y.address+'</a>';
                          str+='<a href="javascript:;" style="width:150px;">'+y.postcode+'</a>';
                          str+='<a href="javascript:;" style="width:170px;">'+y.add_iphoto+'</a>';
                          str+='<a href="javascript:;" class="edit" addid="'+y.add_id+'" style="width:70px;">编辑</a>';
                          str+='<a href="javascript:;" addid="'+y.add_id+'" style="width:70px;" class="del">删除</a>';
                          str+='</div>';

                       
                    })
                   $('.add').html(str);
                    
                }
            })
// 清空默认值
            $("input[type=reset]").trigger("click");
            $('p.area textarea').html('');
            $('#s1 option').removeAttr('selected');
            $('#s2 option').html('请选择');
            $('#s3 option').html('请选择');

        })



 // 修改
$('.edit').live('click',function(){
     var addid = $(this).attr('addid');
     $('input[type=submit]').val("确认修改");
     // 改变提交路径
     // $('.form').attr("method","edit");
     $.ajax({
         url:'edit',
         type:'post',
         data:{addid:addid},
         dataType:'json',
         success:function(phpData){
             // 设置表单内容
             $('input[name=add_people]').val(phpData.add_people);
             // 获得联动城市
             var s= phpData.shop_city[0].replace('省','');
             var x = phpData.shop_city[1].replace('市','');
             var q = phpData.shop_city[2];
             $.each($('#s1 option'),function(x,y){
                 var a =$('#s1 option').eq(x).val();
                 if(a==s){
                     $('#s1 option').eq(x).attr('selected','selected')
                 }

             })
            $('#s2').html('<option selected>'+x+'</option>');
            $('#s3').html('<option selected>'+q+'</option>');
            $('textarea').html(phpData.address);
            $('input[name=postcode]').val(phpData.postcode);
            $('input[name=add_iphoto]').val(phpData.add_iphoto);
            $('input[name=pic_all]').val(phpData.pic_all);
            // 添加一个隐藏表单用来判断是修改还是添加
            var inputHtml = '<input type="hidden" name="addid" value="'+phpData.add_id+'">';
            $('input[name=addid]').remove();
            $('input[name=add_iphoto]').after(inputHtml);
            
         }
     })
    
     
})
  // 删除收货地址
  $('.del').live('click',function(){
      var addid = $(this).attr('addid');
      $.ajax({
          type:'post',
          url:'delAdd',
          data:{addid:addid},

      })
      $(this).parents('.both').hide();
  })
})
</script>
        <!-- 导航区域 -->
               <div id="list-nav">
                       <div class="cen">
                           <ul>
                               <li class="list-cate all">
                                    <s></s>
                                    <a href="">全部商品</a>
                                    <!-- 二级导航菜单*************************************************** -->
                                    <div class="left">
                                     <?php if(is_array($fatherData)): $k = 0; $__LIST__ = $fatherData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><!-- 导航区域 -->
                                        <div class="nav">
                                            <s></s>
                                            <h1><a href="<?php echo U('Home/List/index',array('cid'=>$v['cid']));?>"><?php echo ($v["ctitle"]); ?></a></h1>
                                            <ul>
                                               <?php if(is_array($v['son'])): $i = 0; $__LIST__ = array_slice($v['son'],0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/List/index',array('cid'=>$n['cid']));?>"><?php echo ($n["ctitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                            <div class="list">
                                                <div class="cate">
                                                   <list from="$v['son']" name='$n' start='3'>
                                                    <a href="{|U:'Index/List/index',array('cid'=>$n['cid'])}"><?php echo ($n["ctitle"]); ?></a>
                                                   </list>
                                                </div>
                                                <div class="pop">
                                                    <p>推荐商品</p>
                                                    <?php if(is_array($v['sustain'])): $kk = 0; $__LIST__ = $v['sustain'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><a href="<?php echo U('Home/Content/index',array('pro_id'=>$vv['pro_id']));?>" style="font-size:12px;height:16px;line-height: 16px;overflow:hidden;width:150px;padding:0px;text-align: left;margin:10px 0;"><?php echo ($vv["p_title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 导航区域结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                        <!-- 二级导航菜单end*************************************************** -->
                                </li>
                               <li class="list-cate frist"><a href="<?php echo U('Home/Index/index');?>">首 页</a></li>
                               <?php if(is_array($fatherData)): $k = 0; $__LIST__ = $fatherData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li  class="list-cate"><a href="<?php echo U('Home/List/index',array('cid'=>$v['cid']));?>"><?php echo ($v["ctitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                           </ul>
                       </div>
                   </div>
               <!-- 导航区域结束 -->
<div id="list-main">
    <div class="center">

        


        <!-- 我的商城 -->
        <div id="user-table">
            <div id="user-left">
                <h1><a href="">我的商城</a></h1>
                <div class="user-box">
                  <div class="it"><s class="lc"></s>订单中心<s class="rc"></s></div>
                  <p <?php if($_GET['a'] == 'goods'): ?>style="border-left:2px solid red;"<?php endif; ?>>
                    <a href="goods" <?php if($_GET['a'] == 'goods'): ?>style="color:red;"<?php endif; ?>>我的订单</a>
                  </p>
                  <p <?php if($_GET['a'] == 'returns'): ?>style="border-left:2px solid red;"<?php endif; ?>>
                    <a href="returns"  <?php if($_GET['a'] == 'returns'): ?>style="color:red;"<?php endif; ?>>我的退换货</a></p>
                  <!-- <p><a href="">我的团购</a></p> -->
                </div>
                <div class="user-box">
                  <div class="it" ><s class="lc"></s>个人中心<s class="rc"></s></div>
               <!--    <p><a href="">我的预约</a></p>
                  <p><a href="">到货通知</a></p> -->
                  <p <?php if($_GET['a'] == 'balance'): ?>style="border-left:2px solid red;"<?php endif; ?>>
                  <a href="balance" <?php if($_GET['a'] == 'balance'): ?>style="color:red;"<?php endif; ?>>账户余额</a></p>
             <!--      <p><a href="">我的花瓣</a></p>
                  <p><a href="">我的优惠劵</a></p> -->
                  <p <?php if($_GET['a'] == 'address'): ?>style="border-left:2px solid red;"<?php endif; ?>><a href="address" <?php if($_GET['a'] == 'address'): ?>style="color:red;"<?php endif; ?>>收货地址管理</a></p>
                </div>
                <div class="user-box">
                  <div class="it"><s class="lc"></s>社区中心<s class="rc"></s></div>
                  <p <?php if($_GET['a'] == 'myraise'): ?>style="border-left:2px solid red;"<?php endif; ?>>
                    <a href="myraise" <?php if($_GET['a'] == 'myraise'): ?>style="color:red;"<?php endif; ?>>商品评价</a>
                 </p>
                  <!-- <p><a href="">站内信</a></p> -->
                </div>
            </div>
<div id="user-right">
              
      <!-- 我的收货地址 -->
                   <div id="user-refund">
                       <div class="header">
                           <span>收货地址</span>
                       </div>
                       <div id="Profile">
                       <form action="javascript:;" method="post" accept-charset="utf-8">
                         
                           <div class="pt">
                               <p><span style="width:120px;"><i>* &nbsp</i>收货人：</span><input type="text" name="add_people" value=""></p>
                               <p style="height:170px;"><span style="width:120px;"><i>* &nbsp</i>收货地址：</span> 
                               <select id="s1" name="" style="height:30px;">
                                           <option>省份</option>
                                       </select>
                                       <select id="s2" name="city" style="height:30px;">
                                           <option>地级市</option>
                                       </select>
                                       <select id="s3" name="county" style="height:30px;">
                                           <option>市、县级市、县</option>
                                       </select></span><br />
                               <textarea name="address"></textarea><br />
                               </p>
                               <p><span style="width:120px;">邮编：</span><input type="text" name="postcode" value=""></p>
                               <p style="width:300px;"><span style="width:120px;"><i>* &nbsp</i>手机号码：</span><input type="text" name="add_iphoto" value=""></p>
                               <p style="width:300px;"><span>或者固定电话：</span><input type="text" name="" value=""></p>
                              
                               <p class="last" style="padding-left: 30px;">
                               <input type="submit" class="lf" style="width:120px;background:none;border:none;font-size:14px;border:1px solid #EEEEEE;" value="添加新地址" />
                               <input type="reset" style="width:120px;background:none;border:1px solid #EEEEEE;font-size:14px;margin-left: 20px;" value="清空"/></p>
                           </div>

                       </form>
                       </div>
                      <div class="in-nav">
                           <a href="javascript:;" style="color:#f63;">收货人</a>
                          <a href="javascript:;">收货地址</a>
                          <a href="javascript:;">邮编</a>
                          <a href="javascript:;">手机/电话</a>
                          <!-- <a href="javascript:;">已完成</a> -->
                          <a href="javascript:;">操作</a>
                      </div>
                      <div class="add">
                      <?php if(is_array($addData)): $k = 0; $__LIST__ = $addData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="in-nav both">
                             <a href="javascript:;" style="width:140px;"><?php echo ($v["add_people"]); ?></a>
                            <a href="javascript:;" style="width:250px;"><?php echo ($v["address"]); ?></a>
                            <a href="javascript:;" style="width:150px;"><?php echo ($v["postcode"]); ?></a>
                            <a href="javascript:;" style="width:170px;"><?php echo ($v["add_iphoto"]); ?></a>
                            <!-- <a href="javascript:;">已完成</a> -->
                            <a href="javascript:;" style="width:70px;" class="edit" addid="<?php echo ($v["add_id"]); ?>">编辑</a>
                            <a href="javascript:;" style="width:70px;" class="del" addid="<?php echo ($v["add_id"]); ?>">删除</a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                      </div>
                   </div>

                 <!-- 我的收货地址end -->
        




            </div>
        </div>
      </div>
</div>

















<!-- 底部区域 -->
<!-- 底部区域 -->

        <!-- 售后保障 -->
        <div id="austin">
        <div class="center">
        <ul>
            <li class="ico1"><span></span>&nbsp&nbsp&nbsp 500强企业 品质保证</li>
            <li class="ico2"><span></span>&nbsp&nbsp&nbsp7天退货 15天换货</li>
            <li class="ico3"><span></span>&nbsp&nbsp&nbsp100元起免运费</li>
            <li class="ico4"><span></span>&nbsp&nbsp&nbsp448家维修网点 全国联保</li>
        </ul>
        </div>
        </div>
        <!-- 售后 end-->
        <div id="floot">
        <div class="cen">
        <!-- 帮助中心 -->
        <div class="help">
            <ul>
                <span></span>
                <h2>帮助中心</h2>
                <li><a href="">购物指南</a></li>
                <li><a href="">配送方式</a></li>
                <li><a href="">支付方式</a></li>
                <li><a href="">常见问题</a></li>
            </ul>
            <ul>
                <span></span>
                <h2>售后服务</h2>
                <li><a href="">保修政策</a></li>
                <li><a href="">退换货政策</a></li>
                <li><a href="">退换货流程</a></li>
                <li><a href="">手机寄修服务</a></li>
            </ul>
            <ul>
                <span></span>
                <h2>技术支持</h2>
                <li><a href="">售后网点</a></li>
                <li><a href="">常见问题</a></li>
                <li><a href="">产品手册</a></li>
                <li><a href="">软件下载</a></li>
            </ul>
            <ul>
                <span></span>
                <h2>关于商城</h2>
                <li><a href="">公司介绍</a></li>
                <li><a href="">华为商城简介</a></li>
                <li><a href="">联系客服</a></li>
            </ul>
            <ul class="last">
                <span></span>
                <h2>关注我们</h2>
                <li><a href="">新浪微博</a></li>
                <li><a href="">花粉社区</a></li>
                <li><a href="">腾讯微博</a></li>
                <li><a href="">商城手机版</a></li>
            </ul>
        </div>
        <!-- 帮助中心结束 -->
        <!-- 友情链接     -->
        <div class="flink">
            <div class="center">
                
                <a href="">友情链接：</a>
                <?php if(is_array($linkData)): $k = 0; $__LIST__ = $linkData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a target="_blank" href="<?php echo ($v["link"]); ?>"><?php echo ($v["ftitle"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <a target="_blank" href="http://www.vmall.com/links" class="last">申请链接 &gt;&gt;</a>
            
            </div>
                <p>Copyright © 2011-2015 华为软件技术有限公司 版权所有 保留一切权利 苏B2-20130048号 | 苏ICP备09062682号-9</p>
                <p><a href="">网络文化经营许可证苏网文[2012]0401-019号</a></p>
                <p class="last"><a href=""><img src="/o2o/web/think/Public/Static/Images/d1.png" alt="" /></a>
                <a href=""><img src="/o2o/web/think/Public/Static/Images/d2.png" alt="" /></a>
                <a href=""><img src="/o2o/web/think/Public/Static/Images/d3.png" alt="" /></a></p>
         
        </div>
        <!-- 友情链接 -->
        </div>
        </div>
   
        <!-- 底部区域结束 -->





























<!-- 底部区域 -->

    
        <!-- 底部区域结束 -->
        </body>
        </html>