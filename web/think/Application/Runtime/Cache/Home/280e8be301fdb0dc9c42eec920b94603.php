<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>个人中心</title>
    <link rel="stylesheet" type="text/css" href="/o2o/web/think/Public/Css/private.css">

</head>









<body>
    <div id="header">
        <div class="cen">
            <div class="nav">
                <span></span>
                <h1>我的华为帐号</h1>
                <p><a href="" class="bor"><?php echo (session('username')); ?></a><a href="<?php echo U('Home/Index/close');?>">退出</a></p>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="cen">
            <div class="user">
            <form action="<?php echo U('edit');?>" method="post" enctype='multipart/form-data'>
                
                
            
                <div class="left">
                    <img <?php if(isset($notUid['thumb'])): ?>src="/o2o/web/think/<?php echo ($notUid["thumb"]); ?>" <?php else: ?> src="/o2o/web/think/Public/Static/Images/headPic.jpg.png"<?php endif; ?>>
                    <span>上传头像</span>
                    <input type="file" name="thumb" <?php if(isset($notUid['thumb'])): ?>value="<?php echo ($notUid["thumb"]); ?>"<?php endif; ?> >
                    
                </div>
                <div class="right">
                <div class="content">
                    <p><span>华为帐号：</span></p>
                    <p><span>昵称：</span><input type="text" name="nickname" <?php if($notUid): ?>value="<?php echo ($notUid["nickname"]); ?>"<?php endif; ?>><a href=""><i></i></a></p>
                    <p><span>安全邮箱：</span><input type="email" name="emli" <?php if($notUid): ?>value="<?php echo ($notUid["emli"]); ?>"<?php endif; ?>><a href=""><i></i></a></p>
                    <p><span>安全手机：</span><input type="text" name="iphoto" <?php if($notUid): ?>value="<?php echo ($notUid["iphoto"]); ?>"<?php endif; ?>><a href=""><i></i></a></p>
                    <p><span>密码：</span><a href="<?php echo U('editPass');?>">更改<i></i></a></p>
                    <p>
                        <span>性别：</span>
                        <span style="width:50px">保密</span><input type="radio" name="max" value="保密"  <?php if($notUid['max']=='保密'): ?>checked<?php endif; ?>>
                        <span style="width:20px">男</span><input type="radio" name="max" value="男" <?php if($notUid['max']=='男'): ?>checked<?php endif; ?>>
                        <span style="width:20px">女</span><input type="radio" name="max" value="女" <?php if($notUid['max']=='女'): ?>checked<?php endif; ?>>
                    </p>
                    <p><span>生日：</span><input type="text" name="birthday" <?php if($notUid): ?>value="<?php echo ($notUid["birthday"]); ?>"<?php endif; ?>></p>
                    <p><span>城市地区：</span><input type="text" name="city" <?php if($notUid): ?>value="<?php echo ($notUid["city"]); ?>"<?php endif; ?>></p>
                    <input type="hidden" name="user_uid" value="<?php echo (session('uid')); ?>">
                    <p class="last"><span><input type="submit" name="" value="保存" style="border:none;background: none;text-align: center;width:120px;height:30px;line-height: 30px;color:#fff;padding:0;margin:0;font-size: 14px;font-family: '微软雅黑'"></span><span>取消</span></p>
                </div>
                    
                </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>