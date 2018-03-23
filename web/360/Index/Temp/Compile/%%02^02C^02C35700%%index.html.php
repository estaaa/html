<?php /* Smarty version 2.6.26, created on 2015-05-29 00:34:34
         compiled from D:/wamp/www/Demo1/Index/View/Category/index.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/top-bar.js'></script>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/list.css" />

<!-- top 结束-->

	<div id='location'>
		<a href="<?php echo @__APP__; ?>
">全部分类</a>
			&gt;&nbsp;<?php echo $this->_tpl_vars['parent']['title']; ?>
&nbsp;&nbsp;
			&gt;&nbsp;<a href=""><?php echo $this->_tpl_vars['son']['title']; ?>
</a>&nbsp;&nbsp;
	</div>

<!--------------------中部-------------------->
	<div id='center'>
		<div id='left'>
			<div id='cate-list'>
				<p class='title'>按分类查找</p>
				<ul>
				<?php $_from = $this->_tpl_vars['classify']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<li>
						<a href=""><?php echo $this->_tpl_vars['v']['title']; ?>
</a>
					</li>
				<?php endforeach; endif; unset($_from); ?>	
				</ul>
			</div>
			<div id='answer-list'>
				<ul class='ans-sel'>
					<li class='on'>
						<a href="">待解决问题</a>
					</li>
					<li >
						<a href="">已解决</a>
					</li>
					<li >
						<a href="">高悬赏</a>
					</li>
					<li >
						<a href="">零回答</a>
					</li>
				</ul>
				<!-- 待解决问题 -->
				<table>
					<tr>
						<th class='t1'>标题</th>
						<th>回答数</th>
						<th>时间</th>
					</tr>

						<tr>
							<td class='t1 cons'>
								<a href="">
									<b>20</b>后盾顶尖PHP培训</a>&nbsp;&nbsp;[培训]
							</td>
							<td>20</td>
							<td>1900.1.1</td>
						</tr>

						<tr>
							<td class='t1 cons'>
								<a href="">
									<b>20</b>后盾顶尖PHP培训</a>&nbsp;&nbsp;[培训]
							</td>
							<td>20</td>
							<td>1900.1.1</td>
						</tr>
						<tr>
							<td class='t1 cons'>
								<a href="">
									<b>20</b>后盾顶尖PHP培训</a>&nbsp;&nbsp;[培训]
							</td>
							<td>20</td>
							<td>1900.1.1</td>
						</tr>
						<tr>
							<td class='t1 cons'>
								<a href="">
									<b>20</b>后盾顶尖PHP培训</a>&nbsp;&nbsp;[培训]
							</td>
							<td>20</td>
							<td>1900.1.1</td>
						</tr>

					<tr class='page'>
						<td colspan='3'>
							<a href="">1</a>
							<a href="">2</a>
							<a href="">3</a>
						</td>
					</tr>
				</table>

			</div>
		</div>

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/right.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
<!--------------------中部结束-------------------->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>