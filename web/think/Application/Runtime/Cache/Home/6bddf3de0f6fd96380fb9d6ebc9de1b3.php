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
<script src="/o2o/web/think/Public/Js/user.js" type="text/javascript" charset="utf-8"></script>
<script src="/o2o/web/think/Public/Js/privata.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="/o2o/web/think/Public/Css/user.css">
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
              
            
             <!-- 我的订单 -->
               <div id="user-indent">
                  <div class="header">
                      <span >我的订单</span>
                     <!--  <a href="" class="clo">三个月之前商品</a>
                      <s></s>
                      <a href="">最近三个月商品</a> -->
                  </div>
                  <div class="in-nav">
                       <a href="javascript:;" style="color:#f63;">全部</a>
                      <a href="javascript:;">待支付</a>
                      <a href="javascript:;">待评价</a>
                      <a href="javascript:;">待收货</a>
                      <!-- <a href="javascript:;">已完成</a> -->
                      <a href="javascript:;">已取消</a>
                  </div>
                  <form action="" method="get" accept-charset="utf-8">
                      
                   
                  
                  <div class="he">
                      <p><input type="checkbox" /><span>全选</span><a href="javascript:;">合并支付</a></p>
                  </div>



                   <div class="no-payment">
                  
                     <p>
                       <span style="width:450px;">商品</span>
                       <span  style="width:100px;">单价/元</span>
                       <span style="width:80px;">数量</span>
                       <span style="width:100px;">实付款/元</span>
                       <span class="cz"  style="width:150px;">操作</span>
                   </p>
                   <div class="show" style="display:block">
                   <?php if($goodsData): ?><!-- 全部订单 -->
                  <?php if(is_array($goodsData)): $k = 0; $__LIST__ = $goodsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="box_pro" style="position:relative;width:940px;height:auto;">
                       <!-- 盒子 -->
                       <div class="payment-box">
                           <div class="k kd" style="width:450px;">
                               <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                               <a href=""><?php echo ($v["info_code"]); ?></a>
                           </div>
                           <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($v["pic_all"]); ?></a></div>
                           <div class="k kd3" style="width:80px;"><a href="">--</a></div>
                           <div class="k " style="width:80px;"><a href=""><?php echo ($v["pic_all"]); ?></a></div>
                       </div>
                       <!-- 盒子结束 -->
                       <?php if(is_array($v['son'])): $kk = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><!-- 盒子 -->
                       <div class="payment-box">
                           <div class="k kd" style="width:450px;">
                               <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                               <a href=""><?php echo ($vv["p_title"]); ?></a>
                           </div>
                           <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($vv["pic"]); ?></a></div>
                           <div class="k kd3" style="width:80px;"><a href=""><?php echo ($vv["buy_num"]); ?></a></div>
                           <div class="k " style="width:80px;"><a href="">--</a></div>
                       </div><?php endforeach; endif; else: echo "" ;endif; ?>
                      <!-- 盒子结束 -->
                       <div class="kd4" style="padding-left: 35px;"><a href="" >立即支付</a>
                               <!-- <a href="">修改订单</a> --><a href="<?php echo U('cancel',array('infoid'=>$v['infoid']));?>">取消订单</a>
                       </div>
                        <!-- 盒子结束 -->
                     
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
                  <?php else: ?>
                    <div class="notall">
                      没有相应的信息哦!
                    </div><?php endif; ?>
                  </div>
                  <!-- 全部订单结束 -->
                  <!-- 待支付订单 -->
                 <div class="show">
                                    <?php if($goodsData): ?><!-- 全部订单 -->
                                   <?php if(is_array($goodsData)): $k = 0; $__LIST__ = $goodsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="box_pro" style="position:relative;width:940px;height:auto;">
                                        <!-- 盒子 -->
                                        <div class="payment-box">
                                            <div class="k kd" style="width:450px;">
                                                <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                                                <a href=""><?php echo ($v["info_code"]); ?></a>
                                            </div>
                                            <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($v["pic_all"]); ?></a></div>
                                            <div class="k kd3" style="width:80px;"><a href="">--</a></div>
                                            <div class="k " style="width:80px;"><a href=""><?php echo ($v["pic_all"]); ?></a></div>
                                        </div>
                                        <!-- 盒子结束 -->
                                        <?php if(is_array($v['son'])): $kk = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><!-- 盒子 -->
                                        <div class="payment-box">
                                            <div class="k kd" style="width:450px;">
                                                <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                                                <a href=""><?php echo ($vv["p_title"]); ?></a>
                                            </div>
                                            <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($vv["pic"]); ?></a></div>
                                            <div class="k kd3" style="width:80px;"><a href=""><?php echo ($vv["buy_num"]); ?></a></div>
                                            <div class="k " style="width:80px;"><a href="">--</a></div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                       <!-- 盒子结束 -->
                                        <div class="kd4" style="padding-left: 35px;"><a href="" >立即支付</a>
                                               <!--  <a href="">修改订单</a> --><a href="<?php echo U('cancel',array('infoid'=>$v['infoid']));?>">取消订单</a>
                                        </div>
                                         <!-- 盒子结束 -->
                                      
                                   </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                   <?php else: ?>
                                     <div class="notall">
                                       没有相应的信息哦!
                                     </div><?php endif; ?>
                                   </div>
                  <!-- 待支付订单结束 -->

                    <!-- 待评价 -->
                   <div class="show">
                                      <?php if($notGoods): ?><!-- 全部订单 -->
                                     <?php if(is_array($notGoods)): $k = 0; $__LIST__ = $notGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="box_pro" style="position:relative;width:940px;height:auto;">
                                          <!-- 盒子 -->
                                          <div class="payment-box">
                                              <div class="k kd" style="width:450px;">
                                                  <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                                                  <a href=""><?php echo ($v["info_code"]); ?></a>
                                              </div>
                                              <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($v["pic_all"]); ?></a></div>
                                              <div class="k kd3" style="width:80px;"><a href="">--</a></div>
                                              <div class="k " style="width:80px;"><a href=""><?php echo ($v["pic_all"]); ?></a></div>
                                          </div>
                                          <!-- 盒子结束 -->
                                          <?php if(is_array($v['son'])): $kk = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><!-- 盒子 -->
                                          <div class="payment-box">
                                              <div class="k kd" style="width:450px;">
                                                  <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                                                  <a href=""><?php echo ($vv["p_title"]); ?></a>
                                              </div>
                                              <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($vv["pic"]); ?></a></div>
                                              <div class="k kd3" style="width:80px;"><a href=""><?php echo ($vv["buy_num"]); ?></a></div>
                                              <div class="k " style="width:80px;"><a href="">--</a></div>
                                          </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                         <!-- 盒子结束 -->
                                          <div class="kd4" style="padding-left: 35px;"><!-- <a href="" >立即支付</a> -->
                                                  <!-- <a href="">修改订单</a> --><!-- <a href="">取消订单</a> -->
                                          </div>
                                           <!-- 盒子结束 -->
                                        
                                     </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                     <?php else: ?>
                                       <div class="notall">
                                         没有相应的信息哦!
                                       </div><?php endif; ?>
                                     </div>
                    <!-- 待评价结束 -->
                    <!-- 待收货 -->
                    <div class="show">
                                       <?php if($waitData): ?><!-- 全部订单 -->
                                      <?php if(is_array($waitData)): $k = 0; $__LIST__ = $waitData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="box_pro" style="position:relative;width:940px;height:auto;">
                                           <!-- 盒子 -->
                                           <div class="payment-box">
                                               <div class="k kd" style="width:450px;">
                                                   <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                                                   <a href=""><?php echo ($v["info_code"]); ?></a>
                                               </div>
                                               <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($v["pic_all"]); ?></a></div>
                                               <div class="k kd3" style="width:80px;"><a href="">--</a></div>
                                               <div class="k " style="width:80px;"><a href=""><?php echo ($v["pic_all"]); ?></a></div>
                                           </div>
                                           <!-- 盒子结束 -->
                                           <?php if(is_array($v['son'])): $kk = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><!-- 盒子 -->
                                           <div class="payment-box">
                                               <div class="k kd" style="width:450px;">
                                                   <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                                                   <a href=""><?php echo ($vv["p_title"]); ?></a>
                                               </div>
                                               <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($vv["pic"]); ?></a></div>
                                               <div class="k kd3" style="width:80px;"><a href=""><?php echo ($vv["buy_num"]); ?></a></div>
                                               <div class="k " style="width:80px;"><a href="">--</a></div>
                                           </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                          <!-- 盒子结束 -->
                                           <div class="kd4" style="padding-left: 35px;"><a href="" >确认收货</a>
                                                   <!-- <a href="">修改订单</a> --><!-- <a href="">取消订单</a> -->
                                           </div>
                                            <!-- 盒子结束 -->
                                         
                                      </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                      <?php else: ?>
                                        <div class="notall">
                                          没有相应的信息哦!
                                        </div><?php endif; ?>
                                      </div>
                    <!-- 待收货结束 -->
                    <!-- 已取消订单 -->
                   <div class="show">
                                      <?php if($abolishData): ?><!-- 全部订单 -->
                                     <?php if(is_array($abolishData)): $k = 0; $__LIST__ = $abolishData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="box_pro" style="position:relative;width:940px;height:auto;">
                                          <!-- 盒子 -->
                                          <div class="payment-box">
                                              <div class="k kd" style="width:450px;">
                                                  <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                                                  <a href=""><?php echo ($v["info_code"]); ?></a>
                                              </div>
                                              <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($v["pic_all"]); ?></a></div>
                                              <div class="k kd3" style="width:80px;"><a href="">--</a></div>
                                              <div class="k " style="width:80px;"><a href=""><?php echo ($v["pic_all"]); ?></a></div>
                                          </div>
                                          <!-- 盒子结束 -->
                                          <?php if(is_array($v['son'])): $kk = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><!-- 盒子 -->
                                          <div class="payment-box">
                                              <div class="k kd" style="width:450px;">
                                                  <a href="" class="a-img"><img src="images/100_100_11.jpg" alt=""></a>
                                                  <a href=""><?php echo ($vv["p_title"]); ?></a>
                                              </div>
                                              <div class="k kd2"  style="width:100px;"><a href="">¥<?php echo ($vv["pic"]); ?></a></div>
                                              <div class="k kd3" style="width:80px;"><a href=""><?php echo ($vv["buy_num"]); ?></a></div>
                                              <div class="k " style="width:80px;"><a href="">--</a></div>
                                          </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                         <!-- 盒子结束 -->
                                          <div class="kd4" style="padding-left: 35px;"><!-- <a href="" >立即支付</a> -->
                                                  <!-- <a href="">修改订单</a> --><a href="<?php echo U('recover',array('infoid'=>$v['infoid']));?>">恢复订单</a>
                                          </div>
                                           <!-- 盒子结束 -->
                                        
                                     </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                     <?php else: ?>
                                       <div class="notall">
                                         没有相应的信息哦!
                                       </div><?php endif; ?>
                                     </div>
                    <!-- 已取消订单 end-->
                    </div>








                   <div class="he">
                       <p><input type="checkbox" /><span>全选</span><a href="">合并支付</a></p>
                   </div>
                   </form>
               </div>
             <!-- 我的订单end -->
        




            </div>
        </div>
      </div>
</div>





<!-- 列表页 主大区end -->










































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
        </body>
        </html>