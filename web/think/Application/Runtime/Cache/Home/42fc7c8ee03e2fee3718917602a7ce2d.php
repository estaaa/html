<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
        
    <script src="/o2o/web/think/Public/Static/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
    var APP = "/o2o/web/think/index.php/Home/List";
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
<link rel="stylesheet" href="/o2o/web/think/Public/Css/list.css">

<script type="text/javascript" charset="utf-8">

        $(function(){
                var cid = "<?php echo $_GET['cid'] ?>";
                var param = "<?php echo $_GET['param'] ?>";
                // alert(param)
                $('.cost').click(function(){
                    var num=$(this).attr('num');
                    $(this).css({color:'red'});
                    if(param==''){
                       location.href="<?php echo U('Home/List/index/cid/"+cid+"/num/"+num+"');?>";     
                    }else{
                        location.href="<?php echo U('Home/List/index/cid/"+cid+"/param/"+param+"/num/"+num+"');?>";
                    }
                    
                })
                   
               
            
        })
            

        
 
    </script>




<!-- 列表页 主大区 -->
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

<div id="list-main">
    <div class="center">

        <!-- 分类区域 -->
        <div class="top-nav">
            <a href="<?php echo U('Home/Index/index');?>">首页&nbsp</a>
            <?php if(is_array($infiniteCate)): $i = 0; $__LIST__ = $infiniteCate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?>><a href="<?php echo U('Home/List/index',array('cid'=>$n['cid']));?>" <?php if(count($infiniteCate)-1): ?>style="color:#000;"<?php endif; ?> ><?php echo ($n["ctitle"]); ?>&nbsp</a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="cate">
            <p>
                <span>分类：</span>
                <a href="<?php echo U('Home/List/index',array('cid'=>$cidData[0]['pid']));?>" <?php if($_GET['cid'] == $cidData[0]['pid']): ?>style="color:red"<?php endif; ?>>全部</a>
                <?php if(is_array($cidData)): $k = 0; $__LIST__ = $cidData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Home/List/index',array('cid'=>$v['cid']));?>" <?php if($v["cid"] == $_GET['cid']): ?>style="color:red"<?php endif; ?>><?php echo ($v["ctitle"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
            <?php if(is_array($tempFinalAttr)): $k = 0; $__LIST__ = $tempFinalAttr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; $temp=$param; $temp[$k] = 0; ?>
            <p>
                <span style="overflow: hidden;height:30px;"><?php echo ($v["name"]); ?>：</span>
                <a href="<?php echo U('Home/List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)));?>" <?php if($param[$k] == 0): ?>class="frist"<?php endif; ?>>全部</a>
                <?php if(is_array($v['value'])): $kk = 0; $__LIST__ = $v['value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk; $temp[$k]=$vv['attid']; ?>
                <a href="<?php echo U('Home/List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)));?>" <?php if($param[$k]==$vv['attid']): ?>class="frist"<?php endif; ?>><?php echo ($vv["avalue"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </p><?php endforeach; endif; else: echo "" ;endif; ?>
            <p class="last">
                <span>排序：</span>
                <a href="<?php echo U('Home/List/index',array('cid'=>$_GET['cid']));?>" <?php if(!isset($_GET['num'])): ?>class="frist"<?php endif; ?> >默认</a>

                <a href="javascript:;" class="cost" <?php if($_GET['num'] == 1): ?>num='2' <?php else: ?>num='1'<?php endif; ?>  <?php if($_GET['num'] == 1 or $_GET['num'] == 2): ?>style="color:red"<?php endif; ?> >价格<s class="price"></s></a>


                <a href="javascript:;" class="cost"   <?php if($_GET['num']==3): ?>num='4'<?php else: ?>num='3'<?php endif; ?>  <?php if($_GET['num']==3||$_GET['num']==4): ?>style="color:red"<?php endif; ?> >评价数<s class="appraise"></s></a>


                <a href="javascript:;" class="cost"  <?php if($_GET['num']==5): ?>num='6'<?php else: ?>num='5'<?php endif; ?>   <?php if($_GET['num']==5||$_GET['num']==6): ?>style="color:red"<?php endif; ?> >上架时间<s class="time"></s></a>
            </p>
        </div>
        <!-- 分类区域结束 -->



        <!-- 产品区域 -->
        <div class="product">

        <?php if($proData): if(is_array($proData)): $k = 0; $__LIST__ = $proData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><!-- 盒子 -->
                <div class="box">
                    <div class="box-bor">
                        <p><a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>"><img src="/o2o/web/think/<?php echo ($v["list_img"]); ?>" alt="" /></a></p>
                        <h3 style="height:30px;overflow: hidden;"><a href=""><?php echo ($v["p_title"]); ?></a></h3>
                        <span>¥<?php echo ($v["p_cost"]); ?></span>
                        <div class="shop">
                            <a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['pro_id']));?>" class="frist" >查看详情</a>
                            <a href="javascript:;"><?php echo ($v["app_num"]); ?>人评价</a>
                        </div>
                    </div>
                </div>
                <!-- 盒子结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
        <div style="width:400px;margin:0 auto;color:#ccc;text-align: center;height:100px;padding-top: 40px;">
            此分类没有产品哦
        </div><?php endif; ?>
        



        </div>
        <!-- 产品区域end -->

    </div>
</div>





<!-- 列表页 主大区end -->
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