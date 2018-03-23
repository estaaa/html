<?php /* Smarty version 2.6.26, created on 2015-05-31 23:37:51
         compiled from D:/wamp/www/www/2/up/Index/View/Answer/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'D:/wamp/www/www/2/up/Index/View/Answer/index.html', 36, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/question.css" />
	<script type="text/javascript" src="<?php echo @__PUBLIC__; ?>
/Js/question.js"></script>
	<script type="text/javascript" src="<?php echo @__PUBLIC__; ?>
/Js/anwer.js"></script>

<!-- top 结束-->
	<div id='location'>
		<a href="<?php echo @__APP__; ?>
?c=category&cid=1}">全部分类</a>
			<?php unset($this->_sections['b']);
$this->_sections['b']['loop'] = is_array($_loop=$this->_tpl_vars['morecategroy']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['b']['name'] = 'b';
$this->_sections['b']['show'] = true;
$this->_sections['b']['max'] = $this->_sections['b']['loop'];
$this->_sections['b']['step'] = 1;
$this->_sections['b']['start'] = $this->_sections['b']['step'] > 0 ? 0 : $this->_sections['b']['loop']-1;
if ($this->_sections['b']['show']) {
    $this->_sections['b']['total'] = $this->_sections['b']['loop'];
    if ($this->_sections['b']['total'] == 0)
        $this->_sections['b']['show'] = false;
} else
    $this->_sections['b']['total'] = 0;
if ($this->_sections['b']['show']):

            for ($this->_sections['b']['index'] = $this->_sections['b']['start'], $this->_sections['b']['iteration'] = 1;
                 $this->_sections['b']['iteration'] <= $this->_sections['b']['total'];
                 $this->_sections['b']['index'] += $this->_sections['b']['step'], $this->_sections['b']['iteration']++):
$this->_sections['b']['rownum'] = $this->_sections['b']['iteration'];
$this->_sections['b']['index_prev'] = $this->_sections['b']['index'] - $this->_sections['b']['step'];
$this->_sections['b']['index_next'] = $this->_sections['b']['index'] + $this->_sections['b']['step'];
$this->_sections['b']['first']      = ($this->_sections['b']['iteration'] == 1);
$this->_sections['b']['last']       = ($this->_sections['b']['iteration'] == $this->_sections['b']['total']);
?>
			&gt;&nbsp;
				<?php if ($this->_sections['b']['last']): ?>
					<?php echo $this->_tpl_vars['morecategroy'][$this->_sections['b']['index']]['title']; ?>

				<?php else: ?>
			<a href="<?php echo @__APP__; ?>
?c=category&cid=<?php echo $this->_tpl_vars['morecategroy'][$this->_sections['b']['index']]['cid']; ?>
"><?php echo $this->_tpl_vars['morecategroy'][$this->_sections['b']['index']]['title']; ?>
</a>
				<?php endif; ?>
			&nbsp;&nbsp;
			<?php endfor; endif; ?>
			<!-- &gt;&nbsp;<a href="">硬件</a>&nbsp;&nbsp; -->
	</div>
	
<!--------------------中部-------------------->
	<div id='center-wrap'>
		<div id='center'>
			<div id='left'>
				<div id='answer-info'>
					<!-- 如果没有解决用wait -->
					<div class='ans-state wait'></div>
					<div class='answer'>
						<p class='ans-title'><?php echo $this->_tpl_vars['user']['content']; ?>

							<b class='point'><?php echo $this->_tpl_vars['user']['reward']; ?>
</b>
						</p>
					</div>
					<ul>
						<li><a href=""><?php echo $this->_tpl_vars['user']['username']; ?>
</a></li>
						<li><i class='level lv1' title='Level 1'></i></li>
						<li><?php echo ((is_array($_tmp=$this->_tpl_vars['user']['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%y-%m-%d %H:%M:%S")); ?>
</li>
				
					</ul>
					<?php if ($this->_tpl_vars['issolve']['solve'] == 0): ?>
					<div class='ianswer'>
						<form action="javascript:;" method='POST'>
							<p>我来回答</p>
							<textarea name="content"></textarea>
							<input type="hidden" name='asid' value='<?php echo $_GET['asid']; ?>
'>
							<input type="submit" value='提交回答' id='anw-sub'/>
						</form>
					</div>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['okask']): ?>

					<!-- 满意回答 -->
					<div class='ans-right'>
						<p class='title'><i></i>{满意回答}<span></span></p>
						<p class='ans-cons'><?php echo $this->_tpl_vars['okask']['content']; ?>
</p>
						<dl>
							<dt>
								<a href="<?php echo @__APP__; ?>
?c=member"><img src="<?php if ($this->_tpl_vars['okask']['img'] == ''): ?><?php echo @__PUBLIC__; ?>
/Images/noface.gif<?php else: ?><?php echo $this->_tpl_vars['okask']['img']; ?>
<?php endif; ?>" width='48' height='48'/></a>
							</dt>
							<dd>
								<a href=""><?php echo $this->_tpl_vars['manyi']['username']; ?>
</a>
							</dd>
							<dd><i class='level lv1'></i></dd>
							<dd><?php echo $this->_tpl_vars['okask']['meau']; ?>
%</dd>
						</dl>
					</div>
					<?php endif; ?>
					<!-- 满意回答 -->
				</div>

				<div id='all-answer'>
					<div class='ans-icon'></div>
					<p class='title'>共 <strong><?php echo $this->_tpl_vars['leng']; ?>
</strong> 条回答</p>
					<ul>

						<?php $_from = $this->_tpl_vars['usdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
						<li>
							<div class='face'>
								<a href="">
									<img src="<?php if ($this->_tpl_vars['v']['face'] == ''): ?><?php echo @__PUBLIC__; ?>
/Images/noface.gif<?php else: ?><?php echo $this->_tpl_vars['v']['face']; ?>
<?php endif; ?>" width='48' height='48'/>
								</a>
							</div>
							<div class='cons blue'>
								<p><?php echo $this->_tpl_vars['v']['content']; ?>
<span style='color:#888;font-size:12px'>&nbsp;&nbsp;(<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
)</span></p>
							</div>
							<?php if ($this->_tpl_vars['issolve']['solve'] == 0): ?>
								<?php if ($_SESSION['uid'] == $this->_tpl_vars['issolve']['uid']): ?>
								<a href="<?php echo @__APP__; ?>
?c=answer&asid=<?php echo $_GET['asid']; ?>
&uid=<?php echo $_SESSION['uid']; ?>
&cuid=<?php echo $this->_tpl_vars['v']['uid']; ?>
" class='adopt-btn'>采纳</a>
								<?php endif; ?>
							<?php endif; ?>
						</li> 
						<?php endforeach; endif; unset($_from); ?>






						
					</ul>
					<div class='page'>
						<a href="">1</a>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
					</div>
				</div>
				<div id='other-ask'>
					<p class='title'>待解决的相关问题</p>
					<table>
					<?php $_from = $this->_tpl_vars['anddata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
						<tr>
							<td class='t1'><a href="<?php echo @__APP__; ?>
?c=answer&asid=<?php echo $this->_tpl_vars['v']['asid']; ?>
"><?php echo $this->_tpl_vars['v']['content']; ?>
</a></td>
							<td><?php echo $this->_tpl_vars['v']['answer']; ?>
&nbsp;回答</td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
					</table>
				</div>
			</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/right.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			
		</div>
	

	</div>
	
<!--------------------中部结束-------------------->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>