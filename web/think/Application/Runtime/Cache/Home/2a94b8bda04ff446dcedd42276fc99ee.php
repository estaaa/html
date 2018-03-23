<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
        
    <script src="/o2o/web/think/Public/Static/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
    var APP = "/o2o/web/think/index.php/Home/Index";
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
<script type="text/javascript" charset="utf-8">
   
    </script>
   
    <link rel="stylesheet" type="text/css" href="/o2o/web/think/Public/Css/index.css">
    <script src="/o2o/web/think/Public/Js/index.js" type="text/javascript" charset="utf-8"></script>
        <!-- 导航区域 -->
    <div id="nav">
       <div class="cen">
           <ul>
               <li class="all"><a href="">全部商品</a></li>
               <li class="frist"><a href="">首 页</a></li>
               <?php if(is_array($fatherData)): $k = 0; $__LIST__ = $fatherData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li><a href="<?php echo U('Home/List/index',array('cid'=>$v['cid']));?>"><?php echo ($v["ctitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
           </ul>
       </div>
    </div>
        <!-- 导航区域结束 -->






        <!-- 轮播区域 -->
        <div id="lunbo">
            <!-- 首页轮播区域 -->
            <div class="carousel">
                <div class="left">

            <!-- 分类循环 -->
                <?php if(is_array($fatherData)): $k = 0; $__LIST__ = $fatherData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><!-- 导航区域 -->
                    <div class="nav">
                        <s></s>
                        <h1><a href="<?php echo U('Home/List/index',array('cid'=>$v['cid']));?>"><?php echo ($v["ctitle"]); ?></a></h1>
                        <ul>
                            <?php if(is_array($v['son'])): $i = 0; $__LIST__ = array_slice($v['son'],0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/List/index',array('cid'=>$n['cid']));?>"><?php echo ($n["ctitle"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="list">
                            <div class="cate">
                                <?php if(is_array($v['son'])): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/List/index',array('cid'=>$n['cid']));?>"><?php echo ($n["ctitle"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>

                            </div>
                            <div class="pop">
                                <p>推荐商品</p>
                                <?php if(is_array($v['sustain'])): $kk = 0; $__LIST__ = $v['sustain'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?><a href="<?php echo U('Home/Content/index',array('pro_id'=>$vv['pro_id']));?>" style="font-size:12px;height:16px;line-height: 16px;overflow:hidden;width:150px;padding:0px;text-align: left;margin:10px 0;"><?php echo ($vv["p_title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- 导航区域结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- 循环结束 -->




                </div>
                <!-- 右侧区域 -->
                <div class="right">
                    <div class="bigimg">
                        <?php if(is_array($bigsData)): $k = 0; $__LIST__ = $bigsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a href="" <?php if($key == 0): ?>style="display:block" sdd='er'<?php endif; ?> ><img src="/o2o/web/think/<?php echo ($v["img"]); ?>" alt="" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <div class="clickico">
                        
                         <?php if(is_array($bigsData)): $k = 0; $__LIST__ = $bigsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><span <?php if($key == 0): ?>style="background:#B6121A;"<?php endif; ?> ></span><?php endforeach; endif; else: echo "" ;endif; ?>
                      
                    </div>
                </div>
                <!-- 右侧区域end -->
            </div>
            <!-- 首页轮播区域end -->
        </div>
        <!-- 轮播区域end -->
        <!-- 主大区 -->
        <div id="main">
            <div class="center">
                <!-- 热卖 第一推荐区-->
                <div id="hot">

                    <!-- 左侧 -->
                    <div class="left">
                    <?php if(is_array($moreNum)): $i = 0; $__LIST__ = array_slice($moreNum,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><!-- 盒子 -->
                        <div class="box">
                            <s></s>
                            <div class="box-border">
                                <div class="ico">
                                    <a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>"><img src="/o2o/web/think/<?php echo ($v["list_img"]); ?>" alt="" /></a>
                                </div>
                                <div class="title" >
                                    <h1><a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>" style="height:26px;margin:0;"><?php echo ($v["title"]); ?></a></h1>
                                    <p style='overflow: hidden;width:240px;height:25px;'><?php echo ($v["p_title"]); ?></p>
                                    <p class="tag"><?php echo ($v["activity"]); ?></p>
                                </div>
                                <div class="money">
                                    <p><span>¥<?php echo ($v["p_cost"]); ?></span></p>
                                    <a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>">立即抢购</a>
                                </div>
                            </div>
                        </div>
                        <!-- 盒子 --><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <!-- 左侧结束 -->
                    <!-- 右侧 -->
                    <div class="right">
                        <!-- 小轮播 -->
                        <div class="smimg">
                            <ul>
                                 <?php if(is_array($modelsData)): $k = 0; $__LIST__ = $modelsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li>
                                 <a href="<?php echo ($v["url"]); ?>">
                                 <img src="/o2o/web/think/<?php echo ($v["img"]); ?>" alt="" />

                                 </a>
                                 </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                
                                
                            </ul>
                            <span class="lico"></span>
                            <span class="rico"></span>
                        </div>
                        <!-- 小轮播结束 -->
                        <!-- /* 新闻区 */ -->
                        <div class="new">
                            <a href=""><img src="/o2o/web/think/Public/Static/Images/1111.png" alt=""></a>
                        </div>
                        <!-- /* 新闻区 end*/ -->
                        <!-- 小广告图 -->
                        <div class="adimg1"  style="display:block;">
                            <a href=""><img src="/o2o/web/think/Public/Static/Images/hot/1.jpg" alt=""></a>
                        </div>
                        <!-- 小广告图 end-->
                    </div>
                    <!-- 右侧结束 -->
                </div>
                <!-- 热卖 end -->
                <!-- 广告轮播图 -->
                <div id="adico">
                    <div class="right">
                        <div class="bigimg">
                            <?php if(is_array($smallsData)): $i = 0; $__LIST__ = $smallsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="" <?php if($key == 0): ?>style="display:block"<?php endif; ?> ><img src="/o2o/web/think/<?php echo ($v["img"]); ?>" alt="" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="clickico">
                            
                            <?php if(is_array($bigsData)): $i = 0; $__LIST__ = $bigsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><span <?php if($key == 0): ?>style="background:#B61924;opacity: 1;filter:Alpha(opacity=40);"<?php endif; ?> ></span><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <!-- 广告轮播图 end -->
<!--*****************************************8****** 全区域循环 *********************************************************-->
            <?php if(is_array($fatherData)): $k = 0; $__LIST__ = $fatherData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><!-- 手机精品区 -->
                <div id="iphoto2" class="jsCol">
                    <div class="title-nav">
                        <h1><?php echo ($v["ctitle"]); ?>&nbsp&nbsp&nbsp<span>华为精品<?php echo ($v["ctitle"]); ?></span></h1>
                        <div class="nav">
                            <!-- 循环二级分类 -->
                            <?php if(is_array($v['son'])): $cid = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ctitle): $mod = ($cid % 2 );++$cid;?><a href="<?php echo U('Home/List/index',array('cid'=>$ctitle['cid']));?>"><?php echo ($ctitle["ctitle"]); ?></a>
                           
                            <!-- <a href="" class="last">荣耀</a> --><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                    <!-- 内容 --><div class="content">

                    <!-- 循环产品 -->

                    <!-- 盒子 1-->
                    <?php if(is_array($v['proData'])): $num = 0; $__LIST__ = array_slice($v['proData'],0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($num % 2 );++$num; if($num == 1): ?><div class="box coBg">
                    <s></s>
                    <div class="box-border">
                        <div class="ico">
                            <a href="<?php echo U('Home/Content/index',array('pro_id'=>$pro['pro_id']));?>"><img src="/o2o/web/think/<?php echo ($pro["list_img"]); ?>" alt="" /></a>
                        </div>
                        <div class="title">
                            <h1><a href="<?php echo U('Home/Content/index',array('pro_id'=>$pro['pro_id']));?>" style="width:200px;overflow:hidden;height:26px;"><?php echo ($pro["p_title"]); ?></a></h1>
                            <p>精湛工艺 卓越设计</p>
                            <p class="tag"><?php echo ($pro["activity"]); ?></p>
                        </div>
                        <div class="money">
                            <p><span>¥<?php echo ($pro["p_cost"]); ?></span></p>
                            <a href="<?php echo U('Home/Content/index',array('pro_id'=>$pro['pro_id']));?>">立即抢购</a>
                        </div>
                    </div>
                    </div> 
                    <!-- 盒子1end -->
                    <?php else: ?>
                    <div class="box1 coBg"><!-- 盒子 2-->
                    <s></s>
                    <div class="box-border">
                        <div class="ico">
                            <a href="<?php echo U('Home/Content/index',array('pro_id'=>$pro['pro_id']));?>"><img src="/o2o/web/think/<?php echo ($pro["list_img"]); ?>" alt="" /></a>
                        </div>
                        <div class="title">
                            <h1><a href="<?php echo U('Home/Content/index',array('pro_id'=>$pro['pro_id']));?>"> <span><?php echo ($pro["activity"]); ?></span></a></h1>
                        </div>
                        <div class="money">
                            <span>¥<?php echo ($pro["p_cost"]); ?></span>
                        </div>
                    </div>
                    </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <!-- 循环产品结束 -->
                    <!-- 盒子2end -->
                    
                </div>
                <!-- 内容结束 -->
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
<!--*****************************************8****** 全区域循环 end*********************************************************-->
          
    <!-- 内容结束 -->
</div>
<!-- 必备配件end -->
<!-- 底部广告图片 -->
<div id="lastimg">
    <a href=""><img src="/o2o/web/think/Public/Static/Images/hot/4.jpg" alt="" /></a>
</div>
<!-- 底部广告end -->
<!-- 关注区域 -->
<div id="attention">
    <div class="qq">
        <a href=""><img src="/o2o/web/think/Public/Static/Images/2.png" alt="" /></a>
        <a href=""><img src="/o2o/web/think/Public/Static/Images/3.png" alt="" /></a>
        <a href=""><img src="/o2o/web/think/Public/Static/Images/4.png" alt="" /></a>
        <a href=""><img src="/o2o/web/think/Public/Static/Images/5.png" alt="" /></a>
    </div>
</div>
<!-- 关注区域end -->
</div>
</div>
<!-- 主大区结束 -->
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

</body>
</html>