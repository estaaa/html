<?php /* Smarty version 2.6.26, created on 2015-05-31 22:57:34
         compiled from D:/wamp/www/2/up/Index/View/Member/face.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/face.css">
<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/member.css" />
<!-- top结束 -->
<!--------------------中部-------------------->
	<div id='center'>
<!-- 左侧 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/ask.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id='right'>
			<p class='title'>头像上传</p>
			<ul class='ask-filter'>
			</ul>
			<div class='imgface_box'>
				<img src="<?php if ($this->_tpl_vars['path']): ?><?php echo $this->_tpl_vars['path']; ?>
<?php else: ?><?php echo @__PUBLIC__; ?>
/Images/noface.gif<?php endif; ?>" id="preview">
				<form action="<?php echo @__APP__; ?>
?c=member&a=face&up=1" method="POST" enctype="multipart/form-data">
					<input type="file" name="face" id="face" >
					<input type="submit" value="上传头像" id="sub">
				</form>
				<p>支持JPG、PNG、GIF图片类型，不能大于5M。推荐尺寸：180PX*180PX</p>
			</div>
		</div>
	</div>
<!-- 底部 -->
	<div id='bottom'>
		<p>Copyright © 2013 houdunwang.Com All Rights Reserved 后盾网</p>
		<p>京公安网备xxxxxxxxxxxx</p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->
</body>
</html>
<!-- 底部结束 -->