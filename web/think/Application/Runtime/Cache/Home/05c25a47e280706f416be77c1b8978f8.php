<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
        
    <script src="/o2o/web/think/Public/Static/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
    var APP = "/o2o/web/think/index.php/Home/Content";
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
<script src="/o2o/web/think/Public/Js/content.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="/o2o/web/think/Public/Css/content.css">







<!-- 内容页 主大区 -->
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
                                       <?php if(is_array($v['son'])): $i = 0; $__LIST__ = array_slice($v['son'],3,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/List/index',array('cid'=>$n['cid']));?>"><?php echo ($n["ctitle"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
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



<!-- 内容 主大区-->

<div id="content-main">
    <div class="center">
        <!-- 头部小导航 -->
        <div class="top-nav">
            <a href="">首页&nbsp</a>>
            <a href="" class="last"><?php echo ($proData["p_title"]); ?></a>
        </div>
        <!-- 头部小导航结束 -->


        <!-- 放大镜区域 -->
        <div class="show">

            <div class="left">

                <div class="small">
                <?php if(is_array($proData['medium'])): $i = 0; $__LIST__ = $proData['medium'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><img src="/o2o/web/think/<?php echo ($v); ?>" <?php if($key == 0): ?>style="display:block;"<?php endif; ?>><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="box"></div>
                    <div class="cover"></div>
                </div>

                <div class="big">
                    <?php if(is_array($proData['big'])): $i = 0; $__LIST__ = $proData['big'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><img src="/o2o/web/think/<?php echo ($v); ?>" <?php if($key == 0): ?>style="display:block;"<?php endif; ?>><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="lunbo">
                        <s class="lico"></s>
                        <s class="rico"></s>
                        <div class="pad">
                        <?php if(is_array($proData['smallimg'])): $i = 0; $__LIST__ = $proData['smallimg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="javascript:;"><img src="/o2o/web/think/<?php echo ($v); ?>" alt="" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
                         </div> 
                </div>
            </div>


            <div class="right">
            <form action="javascript:;" method="post">
                <div class="top">
                     <h1><?php echo ($proData["p_title"]); ?></h1>
                    <h2><?php echo ($proData["pro_des"]); ?></h2>
                </div>
                <div class="pic">
                    <p>华 为  价：<b>¥ <?php echo ($proData["p_cost"]); ?></b></p>
                    <?php if(isset($$proData['give'][0])): ?><div class="news">
                        <span>优惠信息：</span>
                        <p>
                            <?php if(is_array($proData['give'])): $i = 0; $__LIST__ = $proData['give'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href=""><?php echo ($v); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </p>
                     </div><?php endif; ?>
                    <p>商品编码：<?php echo ($proData["p_code"]); ?></p>
                    <p>商品评分：共 <?php echo ($num); ?> 条评论</p>
                    <p>运      费：满 100 免运费</p>
                    <p>服      务：由华为商城负责发货，并提供售后服务</p>
                </div>
            
                <div class="combo">
                <?php if(is_array($spec)): $i = 0; $__LIST__ = $spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="zhi spec-box">

                        <span><?php echo ($v["stitle"]); ?>：</span>
                        <P>
                        <?php if(is_array($v['content'])): $i = 0; $__LIST__ = $v['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><a href="javascript:;" class="zhishi <?php if($key == 0): ?>fly<?php endif; ?>" value="<?php echo ($vv["attid"]); ?>"  ><?php echo ($vv["avalue"]); ?> <s></s></a>
                        <input type="hidden" name="attid[]" value="<?php echo ($vv["attid"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </P><br/>
                        
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    
                    <div class="zhi buy-num">
                        <span>购买数量：</span>
                        <p>

                            <a href="javascript:;" class="minus">-</a>
                            <a href="javascript:;" class="num"><input type="text" name="buy_num" value="1"></a>
                            <a href="javascript:;" class="plus">+</a>
                           
                        </p>
                    </div>
                </div>
                <div class="hint">
                    <p>您选择了<span class='zhiht'>移动标准版套餐</span></p>
                </div>
                <div class="buyinfo">
                    <s class="clo">
                        
                    </s>
                    <div class="buy_left">
                        <s></s>
                    </div>
                    <div class="buy_right">
                        <p class='buy_title1' style="width:120px;height:20px;overflow: hidden;"></p>
                        <p class='buy_title2'>成功加入购物车!</p>
                        <p class='buy_title3'>购物车中共 <span class="phpNum">3</span> 件商品，金额合计 <span>¥ <span class="phpPic">2664.00</span></span></p>
                        <p class='buy_title4'><a href="<?php echo U('Home/Address/index');?>">去结算</a><a href="<?php echo U('Home/Index/index');?>">继续逛>></a></p>
                    </div>
                </div>
               <!--  <div class="but">
                   <input type="submit" name="buy" value="立即购买">
                   <s></s>
               </div> -->
                <div class="but but1">
                    <input type="submit" name="buyinfo" value="加入购物车">
                    <s></s>
                </div>
                </form>
            </div>
        </div>
        <!-- 放大镜区域end -->

<!-- 
推荐搭配
<div id="match">
    <div class="nav">
        <span>推荐搭配</span>
        <s></s>
    </div>
    <div class="cen">
        <div class="box">
            <a href=""><img src="" alt="" /></a>
            <span>华为价：¥2299.00</span>
            <a href="" class="tit">华为 荣耀6 Plus 标准版 双卡双待双通 移动4G 16GB存储（白色）套餐版</a>
            <i></i>
        </div>
    </div>
</div>
推荐搭配结束
 -->


<div class="review">
<!-- 左侧区域 -->
    <div class="left">



    <!-- 热卖区 -->
        <div class="hot hot-ico">
            <h3><span>热销榜单</span></h3>
            <?php if(is_array($moreNum)): $i = 0; $__LIST__ = array_slice($moreNum,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><!-- 盒子 -->
            <div class="box">
                <s></s>
                <p class="hot-img"><a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>"><img src="/o2o/web/think/<?php echo ($v["list_img"]); ?>" alt="13434" /></a></p>
                <p class="hot-tit"><a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>" style="height:40px;overflow:hidden;"><?php echo ($v["p_title"]); ?></a><span>¥<?php echo ($v["p_cost"]); ?></span></p>
            </div>
            <!-- 盒子结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
           

        </div>
    <!-- 热卖区 end-->

        <!-- 最近浏览 -->
        <div class="hot browse flo_img">
            <h3><span>最近浏览</span><s></s></h3>
            <?php if(is_array($history)): $i = 0; $__LIST__ = array_slice($history,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><!-- 盒子 -->
            <div class="box">
                <s></s>
                <p class="hot-img"><a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>"><img src="/o2o/web/think/<?php echo ($v["list_img"]); ?>" alt="" /></a></p>
                <p class="hot-tit"><a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>" style="height:40px;overflow:hidden;"><?php echo ($v["p_title"]); ?></a><span>¥<?php echo ($v["p_cost"]); ?></span></p>
            </div>
            <!-- 盒子结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- 最近浏览结束 -->






    </div>
<!-- 左侧区域结束 -->


<!-- 右侧内容区域 -->
    <div class="right">
        <div class="con-nav">
            <p>
                <span class="frist">商品详情</span>
                <span>用户评价（<b><?php if(isset($num)): echo ($num); else: ?> 0<?php endif; ?></b>）</span>
                <span>规格参数</span>
                <span>包装清单</span>
                <span>售后服务</span>
                <span class="last"></span>
            </p>
        </div>
        <!-- 内容区 -->

        <div class="count">
            <!-- 商品详情 -->
            <div class="details click" style="display:block">
               <?php echo ($proData["pro_content"]); ?>
            </div>
            <!-- 商品详情结束 -->
            
            <!-- 用户评价 -->
            <div class="details evaluate click">
                <present name="uid">
                 <?php if($isBuy == 1): if(!isset($isapp)): ?><div class="raise">
                 <form action="javascript:;" method="post" accept-charset="utf-8" class='app'>
                     <div class="text">
                         <textarea name="app_content"></textarea>
                     </div>
                     <div class="appBtn">
                         <input type="submit" name="" value="提交">
                     </div>
                     <input type="hidden" name="pro_id" value="<?php echo ($hd["get"]["pro_id"]); ?>">
                 </form>
                    
                 </div><?php endif; endif; ?>
                 </notpresent>
                <?php if(is_array($appData)): $k = 0; $__LIST__ = $appData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><!-- 盒子 -->
                    <div class="box">
                        <div class="lc">
                            <img <?php if(isset($$v['thumb'])): ?>src="/o2o/web/think/<?php echo ($v["thumb"]); ?>" <?php else: ?> src="__CONTROLLER_VIEW__/images/content/77.png"<?php endif; ?> >
                            <span><?php echo ($v["nickname"]); ?></span>
                        </div>
                        <div class="rc">
                            <div class="haop">
                               <!--  <s class="pl"></s> 
                               <s class="ml" style="width:25px;"></s> 
                               <i></i>
                               <span>  4 分好评</span>
                               <ul>
                                   <li>好</li>
                               </ul> -->
                                <p><?php echo (date('Y-m-d H:i:s',$v["publish_time"])); ?></p>
                            </div>
                            <p><?php echo ($v["app_content"]); ?></p>
                        </div>
                    </div>
                    <!-- 盒子结束 --><?php endforeach; endif; else: echo "" ;endif; ?>


            </div>
            <!-- 用户评价end -->

            <!-- 规格参数 -->
            <div class="details click">
              <table>
                 
                  <tbody>
                  <?php if(is_array($content)): $k = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr>
                          <td><?php echo ($v["stitle"]); ?></td>
                          <td><?php echo ($v["avalue"]); ?></td>
                      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                  </tbody>
              </table>
            </div>
            <!-- 包装清单 -->
            <div class="details click">
               <?php echo ($proData["pack_list"]); ?>
            </div>

             <!-- 售后服务 -->
            <div class="details click">
               <?php echo ($proData["after_sale"]); ?>
            </div>
        </div>
        

        <!-- 内容区结束 -->
    </div>
<!-- 右侧内容区域end -->



</div>








    </div>
</div>
<!-- 内容 主大区end-->
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



    <script type="text/javascript" charset="utf-8">
        $(function(){
            // 最近浏览 图标 热销榜单
            var hot = $('#content-main .center .review .left .hot-ico .box s');
            var liulan = $('#content-main .center .review .left .flo_img .box s');
            
            
            ico(liulan);
            ico(hot);
        
        

        })
        function ico(path){
            path.eq(1).css({backgroundPosition:'-33px 0px'});
            path.eq(2).css({backgroundPosition:'-65px 0px'});
            path.eq(3).css({backgroundPosition:'-99px 0px'});
            path.eq(4).css({backgroundPosition:'-132px 0px'});
            path.eq(5).css({backgroundPosition:'-165px 0px'});
        }
        // 隐藏最近浏览
        $('#content-main .center .review .left .hot h3 s').click(function(){

           $.ajax({
             url:"<?php echo U('closed');?>",
             type:'post',
             data:{com:1},
             dataType:'json',

           })
           $('.browse').hide();
        })
   
        // 加入购物车
        $('.but1').click(function(){
            // 获得内容 是否是'库存已空'
            if($('.zhiht').html()=='库存已空'){return;}
            // 为了组合id 定义一个字符串
            var specs = '';
            $.each($('.fly'),function(){
              specs += $(this).attr('value')+',';
            })
            // 获得购买数量
            var buynum = $('input[name=buy_num]').val();
            // alert('message')
            // 发送AJAX
            $.ajax({
                url:"<?php echo U('buyInfo',array('pro_id'=>$_GET['pro_id']));?>",
                type:'post',
                data:{specs:specs,buynum:buynum},
                dataType:'json',
                success:function(phpdata){
                    // 判断用户是否登陆
                    if(phpdata==1){alert('您还未登陆');return;}
                    // 给弹出的结算页面赋值
                    $('.buy_title1').html(phpdata.name);
                    $('.phpNum').html(phpdata.num);
                    $('.phpPic').html(phpdata.total);
                    // // 让按钮消失
                    $('#content-main .center .show .right .but').hide();
                    // // 让购物车显示
                    $('.buyinfo').fadeIn();
                    
                    
                }
            })
           
        })

    // 点击关闭购物车
    $('.buyinfo .clo').click(function(){
      $(this).parents('.buyinfo').hide();
      $('#content-main .center .show .right .but').show();
    })

    // 提交评论
    $('form.app').submit(function(){
        var fromdata = $(this).serialize();
        $.ajax({
            url:"<?php echo U('Home/Content/addraise');?>",
            type:'post',
            data:fromdata,
            dataType:'json',
            success:function(phpData){
                if(phpData==1){return alert('评价内容不能为空');}
                $("#content-main .center .review .right .con-nav span b").html(phpData.num);
                
                var str='';
                str+='<div class="box"><div class="lc">';
                str+='<img src="/o2o/web/think/'+phpData.thumb+'"';
                str+='<span>'+phpData.nickname+'</span></div><div class="rc"><div class="haop">';
                str+='<p>'+phpData.publish_time+'</p></div>';
                str+='<p>'+phpData.app_content+'</p></div></div>';
                $('.raise').after(str);
                // 提交成功就不能再评论了
                $('.raise').hide();
            }
        })
    })
    
    </script>
        <!-- 底部区域结束 -->
        </body>
        </html>