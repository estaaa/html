<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
    <script src="http://localhost/hailun/web/hw/Application/Index/View/Content/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
    var APP = "http://localhost/hailun/web/hw/index.php/Index/Content";
    var pro_id="<?php echo $proData['pro_id'];?>";
    </script>
    <script src="http://localhost/hailun/web/hw/Application/Index/View/Content/js/index.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/hailun/web/hw/Application/Index/View/Content/css/index.css">
    <script  type="text/javascript" charset="utf-8">
    $(function(){
        // 顶部购物车
        $('.cart').hover(function(){
            var is_log = $('#top-nav .nav-cen .left li a.log').html();
            if(is_log=='登录'){return;}

            // alert(is_log);
            $.ajax({
                url:"<?php echo U('Index/Content/topBuy',array('pro_id'=>$_GET['pro_id']));?>",
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
                            str+='<a href="'+"<?php echo U('Index/Content/index/pro_id/');?>"+y.id+'" >';
                            str+='<img src="'+"<?php echo U('http://localhost/hailun/web/hw/');?>"+y.list_img+'"';
                            
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
                        <?php if($hd['session']['username']){ ?>
                     <li class="private">
                         <a href="" ><?php echo $hd['session']['username'];?></a>
                         <div class="list">
                             <a href="<?php echo U('Index/Protected/index');?>">个人中心</a>
                             <a href="<?php echo U('Index/Index/close');?>" class="clo">退出</a>
                         </div>
                     </li>
                     <?php }else{ ?>
                     <li><a href="<?php echo U('Index/Login/index');?>" class="log">登录</a></li>
                     <li><a href="<?php echo U('Index/Login/logon');?>" class="log">注册</a></li>
                    <?php } ?>
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
                    <a href="<?php echo U('Index/Index/index');?>">
                    <img src="http://localhost/hailun/web/hw/Application/Index/View/Content/images/newLogo.png" alt="">
                    </a>
                </div>
                <!-- logo图片end -->
                <!-- 搜索区 -->
                <div class="sear">
                    <form action="<?php echo U('Index/Search/index');?>" method="get" accept-charset="utf-8">
                        <input type="text" class="text" value="荣耀6" name="keyword"/>
                        <input type="submit" name="" value="搜索" class="btn">
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
                                        <?php if($hd['session']['username']){ ?>
                                     <p><a href="<?php echo U('Index/User/index');?>">欢迎您 <?php echo $hd['session']['username'];?> 回来</a></p>
                                    <?php }else{ ?>
                                     <p>你好，请  <span>登录</span> | <span>注册</span></p>
                                    <?php } ?>
                                        <div class="shop-list">
                                            <a href="<?php echo U('Index/User/goods');?>">我的订单</a>
                                            <a href="<?php echo U('Index/User/address');?>" class="no-bor">收货地址</a>
                                            <!-- <a href="<?php echo U('Index/User/index');?>">待评论</a> -->
                                            <a href="<?php echo U('Index/User/index');?>" class="no-bor">账户余额</a>
                                            <a href="<?php echo U('Index/User/returns');?>">我的退货</a>
                                        </div>
                                        
                                </div>
                            </li>
                            <li class="cen"></li>

                            <li  class="cart">
                                <a href="<?php echo U('Index/Address/index');?>">我的购物车</a>
                                <s></s>
                                <span><i>0</i><s></s></span>
                                    <?php if($hd['session']['username']){ ?>
                                <div class="my-car">
                                    <b id="buy-box"></b>

                                    <div class="shop-f">
                                        <p><span>共</span><span class="f-c f-n">2</span><span>件商品，金额合计¥</span><span class="f-c f-t">238.00</span><b></b> <a href="<?php echo U('Index/Address/index');?>">去结算</a></p>
                                        
                                    </div>
                                </div>
                                <?php }else{ ?>
                                    <div class="my-car" style="color:#ccc;text-align: center;line-height: 30px;">
                                    登陆才可以看到哦!
                                    </div>
                                <?php } ?>
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
                            <img src="http://localhost/hailun/web/hw/Application/Index/View/Content/images/code1.jpg" alt="">
                            <span>微信扫码关注我们</span>
                            </a>
                        </div>
                        <div class="icon icon2" >
                            <a href="">
                            <img src="http://localhost/hailun/web/hw/Application/Index/View/Content/images/code2.png" alt="">
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