<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
        <link rel="stylesheet" type="text/css" href="/o2o/web/think/Public/Css/address.css">
        <script src="/o2o/web/think/Public/Static/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
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
                    <?php if(isset($_SESSION['username'])): ?><li class="private"> <a href="" ><?php echo (session('username')); ?></a></li>
                         <li><a href="{U('Home/Protected/index')}">个人中心</a></li>
                         <li><a href="<?php echo U('Home/Index/close');?>" class="clo">退出</a></li>
                         <?php else: ?>
                         <li><a href="<?php echo U('Home/Login/index');?>" class="log">登录</a></li>
                         <li><a href="<?php echo U('Home/Login/logon');?>" class="log">注册</a></li><?php endif; ?>    
                        <span></span>
                        <li><a href="">V码(优购码)</a></li><span></span>
                        <li>
                            <a href="">手机版</a>
                        </li>
                        <span></span>
                        <li>
                            <a href="" class="last">网站导航<span class="ico"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- 居中 -->
        </div>
        <!-- 顶部导航 end-->
       






<!-- 购物车 主区 -->

<div id="shop-go">
    <div class="cen">


        <div class="nav">
            <a href="" class="logo"><img src="images/newLogo.png" alt="" /></a>
            <span></span>
        </div>
<?php if($addData['con']): ?><form action="shopping" method="post" accept-charset="utf-8">

       <div class="buy-reserve">
          
               <p class="tit">
                   <input type="checkbox" name="" value="" class="click">
                   <span class="tit1">商品</span>
                   <span class="tit2">单价（元）</span>
                   <span class="tit3">数量</span>
                   <span class="tit4">小计（元）</span>
                   <span class="tit5">操作</span>
               </p>

               <?php if(is_array($addData['con'])): $k = 0; $__LIST__ = $addData['con'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><!-- 盒子 -->
               <div class="box">
                   <div class="list list1">
                       <input type="checkbox" name="" value="">
                       <a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['id']));?>" class="ico"><img src="/o2o/web/think/<?php echo ($v["img"]); ?>" alt="" /></a>
                       <h2><a href="<?php echo U('Home/Content/index',array('pro_id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></h2>
                       <span>样式：<?php echo ($v["options"]); ?></span>
                   </div>
                   <div class="list list2">
                       <span>¥<?php echo ($v["price"]); ?></span>
                   </div>
                   <div class="list list3">
                       <div class="kong">
                           <input type="text" name="vall" value="<?php echo ($v["num"]); ?>">
                           <a href="javascript:;" class="plus" sid="<?php echo ($key); ?>" ></a><a href="javascript:;" class="minus" sid="<?php echo ($key); ?>"></a>
                       </div>
                       
                   </div>
                   <div class="list list2 list4"><span>¥<?php echo ($v["total"]); ?></span></div>
                   <div class="list list5"><span class='close' sid="<?php echo ($key); ?>"></span></div>
               </div>
               <!-- 盒子结束 --><?php endforeach; endif; else: echo "" ;endif; ?>


          
       </div>
       <div class="count">
           <p><input type="checkbox" />
           <span class='click'>全选</span>
           <span class="closed">删除选中商品</span>
           <span class="bor last">总计金额：</span>
           <span class="bor bor1">¥<?php echo ($addData["allPic"]); ?></span>
           </p>
           <p class="jie"><span class="bor last">共节省：</span><span class="bor">¥0.00</span></p>
           <p class="jie zui"><span class="bor last">合计(不含运费)：</span><span class="bor bor1">¥<?php echo ($addData["allPic"]); ?></span></p>
       </div>
       <div class="balance">
           <input type="submit" name="" value="去结算" class="contro">
           <span class="contro go-buy" onclick="location.href='{|U:'Index/Index/index'}'">继续购物</span>
       </div>
       <input type="hidden" name="sid" value="">
   </form>
<?php else: ?>
<div style='width:1000px;height:100px;font-size: 20px;line-height: 100px;color:#ccc;margin:0 auto;text-align: center;'>
    您购物车里还没有东西哦!
</div><?php endif; ?>


    










    </div>
</div>







<!-- 购物车结束 -->
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
        <script type="text/javascript">
        $(function(){
             
        })
        // 加减运算
        $('.plus').click(function(){
            var sid = $(this).attr('sid');
            var plusvall = $(this).siblings('input').val();
            var _this=$(this);
            $.ajax({
                url:'',
                type:'post',
                data:{sid:sid,plusvall:plusvall},
                dataType:'json',
                success:function(phpData){
                    
                   _this.siblings('input').val(phpData.num);
                    _this.parents('.box').find('.list4').find('span').html("¥"+phpData.total);
                    $('#shop-go .cen .count p .bor1').html("¥"+phpData.allPic)
                }
            })
           
        })
        // 减运算
        $('.minus').click(function(){
            var sid = $(this).attr('sid');
            var minusvall = $(this).siblings('input').val();
            var _this=$(this);
            $.ajax({
                url:'',
                type:'post',
                data:{sid:sid,minusvall:minusvall},
                dataType:'json',
                success:function(phpData){
                    if(phpData==1){return;}
                    _this.siblings('input').val(phpData.num);
                     _this.parents('.box').find('.list4').find('span').html("¥"+phpData.total);
                     $('#shop-go .cen .count p .bor1').html("¥"+phpData.allPic);
                }
            })
        })
       // 点击全选
       $('.click').toggle(function(){
        $(this).attr('checked','checked');
        $('input').attr('checked','checked');
        var sids = '';
        $.each($('.box'),function(x,y){
            var a = $('.box').eq(x).find('.list1 input').attr('checked');
            if(typeof(a)!='undefined'){
                // 得到sid
                sids+=$('.box').eq(x).find('.list5 span.close').attr('sid')+",";
            }
          })

        // 发送AJAX
        $.ajax({
            url:'clickInput',
            type:'post',
            data:{sids:sids},
            success:function(phpData){
              $('#shop-go .cen .count p .bor1').html("¥"+phpData);
            }
        })
       },function(){
       $('input').removeAttr('checked');
       $('#shop-go .cen .count p .bor1').html(0);
            
       })
       // 点击删除单个商品
       $('.close').click(function(){
        // 获得当前的sid
        var sid = $(this).attr('sid');

        $.ajax({
            url:'close',
            type:'post',
            data:{sid:sid},
            success:function(phpData){
              $('#shop-go .cen .count p .bor1').html(phpData);
            }
        })
        $(this).parents('.box').hide();
       })
       // 删除选中商品
       $('.closed').click(function(){
       
        var sids = '';
        $.each($('.box'),function(x,y){
            var a = $('.box').eq(x).find('.list1 input').attr('checked');
            if(typeof(a)!='undefined'){
                $('.box').eq(x).hide();
                // 得到sid
                sids+=$('.box').eq(x).find('.list5 span.close').attr('sid')+",";
            }
          })
        if(sids==''){alert('您未选择商品');return;}
        // 发送AJAX
        $.ajax({
            url:'closed',
            type:'post',
            data:{sids:sids},
        })
       })
       // 获得点击input的时候获取总价格
       $('#shop-go .cen .buy-reserve .box .list1 input').click(function(){
        var sids = '';
        $.each($('.box'),function(x,y){
            var a = $('.box').eq(x).find('.list1 input').attr('checked');
            if(typeof(a)!='undefined'){
                // 得到sid
                sids+=$('.box').eq(x).find('.list5 span.close').attr('sid')+",";
            }
          })
        if(sids==''){$('#shop-go .cen .count p .bor1').html(0);return;}

        // 发送AJAX
        $.ajax({
            url:'clickInput',
            type:'post',
            data:{sids:sids},
            success:function(phpData){
              $('#shop-go .cen .count p .bor1').html("¥"+phpData);
            }
        })
       })

       // 点击跳转订单页面
       $('form').submit(function(){
         var sids = '';
         $.each($('.box'),function(x,y){
             var a = $('.box').eq(x).find('.list1 input').attr('checked');
             if(typeof(a)!='undefined'){
                 // 得到sid
                 sids+=$('.box').eq(x).find('.list5 span.close').attr('sid')+",";
             }
           })
         if(sids==''){
          alert('您还没有选择商品呢');
          // 如果用户没有选择商品 就不发送数据
          $('form').attr('action','');
          return;
        }
         // 把组合好的sid赋值给隐藏表单
         $('input[name=sid]').val(sids);
       
       })
        </script>
        <!-- 底部区域结束 -->
        </body>
        </html>