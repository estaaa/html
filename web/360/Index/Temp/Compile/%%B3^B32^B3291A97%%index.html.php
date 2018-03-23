<?php /* Smarty version 2.6.26, created on 2015-05-29 01:01:23
         compiled from D:/wamp/www/Demo1/Index/View/Search/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'D:/wamp/www/Demo1/Index/View/Search/index.html', 41, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后盾问答</title>
	<meta name="keywords" content="后盾问答"/>
	<meta name="description" content="后盾问答"/>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/common.css" />
	<script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/jquery-1.7.2.min.js'></script>
	<script type='text/javascript'>
       var APP= '<?php echo @__APP__; ?>
'; 
     </script>
	<script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/serch.js'></script>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/index.css" />
</head>
<body>
	<!-- 搜索顶部 -->
	<div class="search_top">
		<div class="sealeft">
			<a href=""><img src="<?php echo @__PUBLIC__; ?>
/images/t0150f9b7bd1b41d84e.png" alt="" /></a>
			<a href="http://www.houdunwang.com">后盾顶尖PHP培训</a>
			<a href="http://www.houdunwang.com">后盾网</a>
		</div>

	</div>
	<!-- 搜索顶部结束 -->
	<!-- 搜索框 -->
	<div class="search_box">
		<input type="text" name="result" class="searchInput"/>
		<input type="submit" value="搜索答案" class="sub"/>
		<a href="<?php echo @__APP__; ?>
?c=ask">我要提问</a>
	</div>
	<!-- 搜索框结束 -->
	<!-- 搜索内容 -->
	<div class="searcont">
	<?php if ($this->_tpl_vars['result']): ?>
	<?php $_from = $this->_tpl_vars['result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
		<ul>
			<li> <a href="" class="title"><?php echo $this->_tpl_vars['v']['content']; ?>
</a> </li>
			<li>阿斯顿·马丁·拉宫达公司是由奥斯顿、马丁、拉宫达三家公司全并而成的,以生产敞蓬旅行车、赛车和限量生产的跑车而闻名世界。 参加车赛固然是发展轿车生产的重要手段,..</li>
			<li class="time"><span>生活 > 购车保养 - 1个回答</span> - 提问时间: <?php echo ((is_array($_tmp=$this->_tpl_vars['v']['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%y-%m-%d %H:%M:%S")); ?>
</li>
		</ul>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
	没有您要找的内容
	<?php endif; ?>
	</div>
	<!-- 搜索内容结束 -->

<!-- 底部 -->
	<div id='bottom'>
		<p>Copyright © 2013 Qihoo.Com All Rights Reserved 后盾网</p>
		<p>京公安网备xxxxxxxxxxxx</p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="<?php echo @__PUBLIC__; ?>
/Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->
</body>
</html>
<!-- 底部结束 -->