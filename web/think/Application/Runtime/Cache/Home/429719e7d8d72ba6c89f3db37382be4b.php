<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>华为商城</title>
       <link rel="stylesheet" type="text/css" href="/o2o/web/think/Public/Css/shop.css">
       <script src="/o2o/web/think/Public/Static/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
       <script src="/o2o/web/think/Public/Js/shop.js" type="text/javascript" charset="utf-8"></script>
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
        /*
        $('.dj').live('click',function(){
            var dj = $('#s1').val() + '省,' + $('#s2').val() + '市,' + $('#s3').val();
            alert(dj);  
        })*/
        $('form').submit(function(){
            var shop_city = $('#s1').val() + '省,' + $('#s2').val() + '市,' + $('#s3').val();
            var fromdata = $(this).serialize()+'&shop_city='+shop_city;
            var _this = $(this);
            $.ajax({
                url:'address',
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
                        if(y.is_add==1){
                            str+='<div class="box"><div class="list list1">';
                            str+='<h2 style=""><div class="guding"><s style="display:block;"></s><span  class="jis" style="display:inline;" class="jis">寄送至:</span></div>';
                            str+='<span><input type="radio" name="add_id" value="'+y.add_id+'" checked="checked"></span>&nbsp;&nbsp;';   
                            str+='<span style="color:#000">'+y.add_people+'</span>&nbsp;&nbsp;&nbsp;';       
                            str+='<span>'+y.address+'</span>&nbsp;&nbsp;&nbsp;';        
                            str+='<span>收货人:&nbsp;'+y.add_people+'</span>&nbsp;&nbsp;&nbsp;';       
                            str+='<span>电话:'+y.add_iphoto+'</span>';      
                            str+='</h2></div><div class="list list2 list4" style="float:left;color:#999999;width:120px;"><span>默认地址</span></div> ' 
                            str+= '<div class="list list5" style="float:left;"><span addid="'+y.add_id+'">修改</span></div>';
                            str+='<div class="list list6" style="float:left;margin-left: 20px;"><span addid="'+y.add_id+'">删除</span></div>';
                           str+='</div>';

                        }else{
                            str+='<div class="box">'
                            str+='<div class="list list1">'
                            str+='<h2><div class="guding"><s></s><span  class="jis">寄送至:</span></div>'
                            str+='<span><input type="radio" name="add_id" value="'+y.add_id+'"></span>&nbsp;&nbsp;'
                            str+='<span style="color:#000">'+y.add_people+'</span>&nbsp;&nbsp;&nbsp;'
                            str+='<span>'+y.address+'</span>&nbsp;&nbsp;&nbsp;'
                            str+='<span>收货人:&nbsp;'+y.add_people+'</span>&nbsp;&nbsp;&nbsp;'
                            str+='<span>电话:'+y.add_iphoto+'</span>'
                            str+='</h2></div>'
                            str+='<div class="list list2 list4" style="float:left;color:#999999;width:120px;"><span addid="'+y.add_id+'">设为默认地址</span></div>'
                             str+= '<div class="list list5" style="float:left;"><span addid="'+y.add_id+'">修改</span></div>';
                             str+='<div class="list list6" style="float:left;margin-left: 20px;"><span addid="'+y.add_id+'">删除</span></div>';
                            str+='</div>';
                        }
                    })
                   $('.add').html(str);
                   $('#big').hide();
                    
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
       $('.add .list5').live('click',function(){
            var addid = $(this).find('span').attr('addid');
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
                   $('p.area textarea').html(phpData.address);
                   $('input[name=postcode]').val(phpData.postcode);
                   $('input[name=add_iphoto]').val(phpData.add_iphoto);
                   $('input[name=pic_all]').val(phpData.pic_all);
                   // 添加一个隐藏表单用来判断是修改还是添加
                   var inputHtml = '<input type="hidden" name="addid" value="'+phpData.add_id+'">';
                   $('input[name=pic_all]').after(inputHtml);
                  $('#big').show();
                }
            })
            
       })


    // 默认值
    $('.add .list4 span').live('click',function(){
        var addid = $(this).attr('addid');
        var _this = $(this);
        $.ajax({
            url:'approve',
            type:'post',
            data:{addid:addid},
            dataType:'json',
            success:function(phpData){
               
            }
        })
        $(this).html('默认地址').parents('.box').siblings('.box').find('.list4 span').html('设为默认地址')
        $(this).parents('.box').find('div.guding').find('s').show().parents('.guding').find('span.jis').show();
        $(this).parents('.box').siblings('.box').find('div.guding').find('s').hide().parents('.guding').find('span.jis').hide();
        $(this).parents('.box').find('div.list1 h2 input').attr('checked','checked');
    })
    // 寄送至
    $('.add .list1 span input').live('click',function(){
      $(this).parents('span').siblings('div.guding').find('s').show().parents('.guding').find('span.jis').show();
      $(this).parents('.box').siblings('.box').find('div.guding').find('s').hide().parents('.guding').find('span.jis').hide();
    })

    // 删除选中
    $('.add .list6 span').live('click',function(){
        var addid = $(this).attr('addid');
        $.ajax({
            type:'post',
            url:'delAdd',
            data:{addid:addid},

        })
        $(this).parents('.box').hide();
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
                        <li><a href="" class="log">登录</a></li>
                        <li><a href="" class="log">注册</a></li><span></span>
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
       


    
    <div id="big">
            <div class="gaizi"></div>
            <div class="tiao">
                <div class="addr">
                    <form action="javascript:;" method="" accept-charset="utf-8">
                        <h2>添加地址</h2>
                        <p><span><b>*</b>收货人：</span><input type="text" name="add_people" value=""></p>
                        <p><span><b>*</b>收货地址：</span><select id="s1" name="">
            <option>省份</option>
        </select>
        <select id="s2" name="city">
            <option>地级市</option>
        </select>
        <select id="s3" name="county">
            <option>市、县级市、县</option>
        </select>
                        <p class="area"><textarea name="address" value=''>详细地址</textarea></p>
                        <p><span>邮编：</span><input type="text" name="postcode" value=""></p>
                        <p><span><b>*</b>手机号码：</span><input type="text" name="add_iphoto" value=""></p>
                        <p><span>固定电话：</span><input type="text" name="pic_all" value=""></p>
                        <p class="last"><input type="submit" value='确定' class="sub" /><input type="button" value='取消' class="btn" /></p>
                        <input type="reset" name="" value="" style="display:none;">
                    </form>
                </div>
            </div>
    </div>
   

<!-- end -->

<!-- 购物车 主区 -->

<div id="shop-go">
    <div class="cen">

         <form action="allData" method="post" accept-charset="utf-8">
        <div class="nav">
            <a href="" class="logo"><img src="images/newLogo.png" alt="" /></a>
            <span class="dingdan"></span>
        </div>
       <div class="address" >
           收货人信息
           <a href="javascript:;" style="color:#28C0C6;font-size: 12px;" class='minus'>[添加地址]</a>
           
       </div>
        <div class="add" style="width:1200px;margin:30px auto;font-size:12px;color:#ccc;height:atuo;overflow:hidden;line-height:30px;border:1px solid #ccc;padding:30px 10px;">
        <?php if($addressData): if(is_array($addressData)): $k = 0; $__LIST__ = $addressData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k; if($v['is_add'] == 1): ?><!-- 盒子 -->
                    <div class="box" style="width:1200px">
                        
                        <div class="list list1">
                            <h2>
                            <div class="guding">
                            <s style="display:block;"></s>
                            <span style="display:inline;" class='jis'>寄送至:</span></div>
                            <span><input type="radio" name="add_id" value="<?php echo ($v["add_id"]); ?>" checked="checked"></span>&nbsp;&nbsp;
                            <span style="color:#000"><?php echo ($v["add_people"]); ?></span>&nbsp;&nbsp;&nbsp;
                            <span><?php echo ($v["address"]); ?></span>&nbsp;&nbsp;&nbsp;
                            <span>收货人:&nbsp;<?php echo ($v["add_people"]); ?></span>&nbsp;&nbsp;&nbsp;
                            <span>电话:<?php echo ($v["add_iphoto"]); ?></span>
                            
                            </h2>
                          
                        </div>
                      
                        
                        <div class="list list2 list4" style="float:left;color:#999999;width:120px;"><span >默认地址</span></div>
                        <div class="list list5" style="float:left;"><span addid="<?php echo ($v["add_id"]); ?>">修改</span></div>
                        <div class="list list6" style="float:left;margin-left: 20px;"><span addid="<?php echo ($v["add_id"]); ?>">删除</span></div>
                    </div>
                    <!-- 盒子结束 -->
                <?php else: ?>
                    <!-- 盒子 -->
                    <div class="box" style="width:1200px">
                        
                        <div class="list list1">
                            <h2>
                            <div class="guding">
                            <s></s>
                            <span class='jis'>寄送至:</span></div>
                            <span><input type="radio" name="add_id" value="<?php echo ($v["add_id"]); ?>"></span>&nbsp;&nbsp;
                            <span style="color:#000"><?php echo ($v["add_people"]); ?></span>&nbsp;&nbsp;&nbsp;
                            <span><?php echo ($v["address"]); ?></span>&nbsp;&nbsp;&nbsp;
                            <span>收货人:&nbsp;<?php echo ($v["add_people"]); ?></span>&nbsp;&nbsp;&nbsp;
                            <span>电话:<?php echo ($v["add_iphoto"]); ?></span>
                            
                            </h2>
                          
                        </div>
                      
                        
                        <div class="list list2 list4" style="float:left;color:#999999;width:120px;"><span addid="<?php echo ($v["add_id"]); ?>">设为默认地址</span></div>
                        <div class="list list5" style="float:left;"><span addid="<?php echo ($v["add_id"]); ?>">修改</span></div>
                        <div class="list list6" style="float:left;margin-left: 20px;" ><span addid="<?php echo ($v["add_id"]); ?>">删除</span></div>
                    </div>
                    <!-- 盒子结束 --><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
            <div class="no" style="width:1200px;text-align: center;color:#595959;">
                您还没有收货地址 赶快添加一个吧!
            </div><?php endif; ?>

           
        </div>

        <div class="buy-reserve">
           
                <p class="tit">
                    <span class="tit1">商品</span>
                    <span class="tit2">单价（元）</span>
                    <span class="tit3">数量</span>
                    <span class="tit4">小计（元）</span>
                </p>

                <?php if(is_array($addData['con'])): $k = 0; $__LIST__ = $addData['con'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><!-- 盒子 -->
                <div class="box">
                    <div class="list list1">
                        <input type="hidden" name="pro_id[]" value="<?php echo ($v["id"]); ?>">
                        <input type="hidden" name="sids[]" value="<?php echo ($key); ?>">
                        <a href="javascript:;" class="ico"><img src="/o2o/web/think/<?php echo ($v["img"]); ?>" alt="" /></a>
                        <input type="hidden" name="img[]" value="<?php echo ($v["img"]); ?>">
                        <h2><a href="javascript:;"><?php echo ($v["name"]); ?></a></h2>
                        <span>样式：<?php echo ($v["options"]); ?></span>
                        <input type="hidden" name="remark[]" value="<?php echo ($v["options"]); ?>">
                    </div>
                    <div class="list list2">
                        <span>¥<?php echo ($v["price"]); ?>.00</span>
                       
                    </div>
                    <div class="list list3">
                        <div class="kong" style="text-align: center;line-height: 50px;">
                           <?php echo ($v["num"]); ?>
                           <input type="hidden" name="buy_num[]" value="<?php echo ($v["num"]); ?>">
                        </div>
                        
                    </div>
                    <div class="list list2 list4"><span>¥<?php echo ($v["total"]); ?>.00</span></div>
                     <input type="hidden" name="pic[]" value="<?php echo ($v["total"]); ?>">
                </div>
                <!-- 盒子结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
        

           
        </div>
        <div class="count">
            <p>
            <span class="bor last" style="margin-left: 870px;">总计金额：</span>
            
            <span class="bor">¥<?php echo ($addData["allPic"]); ?>.00</span>
            <input type="hidden" name="allPic" value="<?php echo ($addData["allPic"]); ?>">
            </p>
            <p class="jie"><span class="bor last">共节省：</span><span class="bor">¥0.00</span></p>
            <p class="jie zui"><span class="bor last">合计(不含运费)：</span><span class="bor">¥<?php echo ($addData["allPic"]); ?>.00</span></p>
        </div>
        <div class="balance">
            <input type="submit" name="" value="提交订单" class="contro">
        </div>
    </form>

    










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
                <a target="_blank" href="http://www.huawei.com/cn/">华为官网</a>
                <a target="_blank" href="http://consumer.huawei.com/cn/">华为消费者业务</a>
                <a target="_blank" href="http://www.honor.cn/">荣耀官网</a>
                <a target="_blank" href="http://browser.vmall.com/">天天浏览器</a>
                <a target="_blank" href="http://www.huaweimossel.com/">莫塞尔商城</a>
                <a target="_blank" href="http://www.hwtrip.com/">爱旅官网</a>
                <a target="_blank" href="http://app.vmall.com/">华为应用市场</a>
                <a target="_blank" href="http://www.wbiao.cn/">万表网</a><a target="_blank" href="http://www.imobile.com.cn/">手机之家</a><a target="_blank" href="http://www.askci.com/">中商情报网</a><a target="_blank" href="http://www.zbird.com/">钻石小鸟</a><a target="_blank" href="http://www.shuame.com/">刷机精灵</a><a target="_blank" href="http://www.nduoa.com/">安卓市场</a><a target="_blank" href="http://www.17ugo.com/">优购物</a><a target="_blank" href="http://www.ydss.cn/">移动叔叔</a><a target="_blank" href="http://www.outlets365.com/">奥特莱斯</a><a target="_blank" href="http://www.zol.com/">中关村商城</a> <a target="_blank" href="http://www.kugou.com/">酷狗音乐</a><a target="_blank" href="http://m.vmall.com/">华为商城手机版</a><a target="_blank" href="http://www.3533.com/">手机世界</a><a target="_blank" href="http://www.958shop.com/">百信手机网</a><a target="_blank" href="http://www.youboy.com/">一呼百应网</a><a target="_blank" href="http://www.cardbaobao.com/">卡宝宝网</a><a target="_blank" href="http://shop.letv.com/">乐视官方商城</a><a target="_blank" href="http://www.hitao.com/">嗨淘网</a><a target="_blank" href="http://www.tongbu.com/">同步助手</a><a target="_blank" href="http://www.fengniao.com/">蜂鸟摄影网</a><a target="_blank" href="http://www.7po.com/">奇珀论坛</a><a target="_blank" href="http://www.homekoo.com/">家具商城</a><a target="_blank" href="http://www.xbiao.com/">世界名表</a><a target="_blank" href="http://www.paixie.net/">拍鞋网</a><a target="_blank" href="http://www.obolee.com/">欧宝丽珠宝</a><a target="_blank" href="http://www.xungou.com/">寻购网</a><a target="_blank" href="http://www.jiukuaiyou.com/">九块邮官网</a><a target="_blank" href="http://www.mumayi.com/">安卓游戏</a> <a target="_blank" href="http://baike.1688.com/">阿里巴巴生意经</a><a target="_blank" href="http://product.cnmo.com/">手机大全</a><a target="_blank" href="http://www.anzow.com/">安卓软件园</a><a target="_blank" href="http://www.dashi.com/">卓大师刷机</a><a target="_blank" href="http://www.wpxap.com/">智机论坛</a><a target="_blank" href="http://www.eepw.com.cn/">电子产品世界</a><a target="_blank" href="http://www.liqucn.com/">历趣网</a><a target="_blank" href="http://www.51bi.com/">网购返利</a><a target="_blank" href="http://cn.china.cn/">中国供应商</a><a title="Apple110" target="_blank" href="http://www.apple110.com/">Apple110</a><a textvalue="91手机门户网" target="_blank" href="http://www.91.com/">91.手机门户网</a><a target="_blank" href="http://www.in189.com/">添翼圈</a><a target="_blank" href="http://www.egou.com/">易购网</a><a target="_blank" href="http://www.meilele.com/">家具网</a><a target="_blank" href="http://www.znds.com">智能电视网</a><a target="_blank" href="http://www.smzdm.com/">什么值得买</a><a target="_blank" href="http://www.duote.com">软件下载</a><a target="_blank" href="http://www.uc.cn/">UC浏览器</a><a target="_blank" href="http://www.vmall.com/product/1896.html">华为P8</a><a target="_blank" href="http://www.vmall.com/links" class="last">申请链接 &gt;&gt;</a>
            
            </div>
                <p>Copyright © 2011-2015 华为软件技术有限公司 版权所有 保留一切权利 苏B2-20130048号 | 苏ICP备09062682号-9</p>
                <p><a href="">网络文化经营许可证苏网文[2012]0401-019号</a></p>
                <p class="last"><a href=""><img src="images/d1.png" alt="" /></a>
                <a href=""><img src="images/d2.png" alt="" /></a>
                <a href=""><img src="images/d3.png" alt="" /></a></p>
         
        </div>
        <!-- 友情链接 -->
        </div>
        </div>

        <!-- 底部区域结束 -->
        </body>
        </html>