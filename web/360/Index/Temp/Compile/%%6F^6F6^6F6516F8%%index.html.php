<?php /* Smarty version 2.6.26, created on 2015-05-31 23:37:56
         compiled from D:/wamp/www/www/2/up/Index/View/Member/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'D:/wamp/www/www/2/up/Index/View/Member/index.html', 34, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/member.css" />

<!-- top结束 -->
<!--------------------中部-------------------->
	<div id='center'>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/ask.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- 左侧结束 -->
		<div id='right'>
	
			<p class='title'>我的首页</p>

			<ul class='property'>
				<li>金币：<span><?php echo $this->_tpl_vars['userr']['point']; ?>
</span></li>
				<li>经验值：<span><?php echo $this->_tpl_vars['userr']['exp']; ?>
</span></li>
				<li>采纳率：<span><?php echo $this->_tpl_vars['userr']['cai']; ?>
</span></li>
			</ul>
			<div class='list'>
				<p><span>我的提问 <b>(共<?php echo $this->_tpl_vars['userr']['wen']; ?>
条)</b></span><a href="">更多>></a></p>
				<table>
						<?php if ($this->_tpl_vars['wendata']): ?>

								<tr>
									<th class='t1'>标题</th>
									<th>回答数</th>
									<th class='t3'>更新时间</th>
								</tr>
							<?php $_from = $this->_tpl_vars['wendata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>	
								<tr>
									<td class='t1'>
										<a href="<?php echo @__APP__; ?>
?c=answer&asid=<?php echo $this->_tpl_vars['v']['asid']; ?>
"><?php echo $this->_tpl_vars['v']['content']; ?>
</a><span>[<?php echo $this->_tpl_vars['v']['title']; ?>
]</span>
									</td>
									<td><?php echo $this->_tpl_vars['v']['answer']; ?>
</td>
									<td class='t3'><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
								</tr>
							<?php endforeach; endif; unset($_from); ?>
					<?php else: ?>
							<tr height='140'>
								<td>你还没有进行过提问</td>
							</tr>
						
					<?php endif; ?>
						
				</table>
			</div>
			<div class='list'>
				<p><span>我的回答 <b>(共<?php echo $this->_tpl_vars['userr']['da']; ?>
条)</b></span><a href="">更多>></a></p>
				<table>
				<?php if ($this->_tpl_vars['dadata']): ?>
					<tr>
						<th class='t1'>标题</th>
						<th>回答</th>
						<th class='t3'>更新时间</th>
					</tr>
					<?php $_from = $this->_tpl_vars['dadata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<tr>
						<td class='t1'>
							<a href="<?php echo @__APP__; ?>
?c=answer&asid=<?php echo $this->_tpl_vars['v']['asid']; ?>
"><?php echo $this->_tpl_vars['v']['content']; ?>
</a><span><?php echo $this->_tpl_vars['v']['title']; ?>
</span>
						</td>
						<td><?php echo $this->_tpl_vars['v']['answer']; ?>
</td>
						<td class='t3'><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
				<?php else: ?>



					<tr height='140'>
						<td>你还没有进行过回答</td>
					</tr>
				<?php endif; ?>
					

				</table>
			</div>
		</div>
	</div>
<!--------------------中部结束-------------------->

<!--------------------底部-------------------->
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