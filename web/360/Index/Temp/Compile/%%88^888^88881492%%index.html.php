<?php /* Smarty version 2.6.26, created on 2015-05-31 22:36:45
         compiled from D:/wamp/www/2/up/Index/View/Index/index.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/index.js'></script>
 <script type="text/javascript" src='<?php echo @__PUBLIC__; ?>
/Js/skip.js'></script>
 <link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/index.css" />
<!-- top -->
	<div class='main'>
		<div id='left'>
			<p class='left-title'>所有问题分类</p>
			<ul class='left-list'>
			<?php unset($this->_sections['top']);
$this->_sections['top']['loop'] = is_array($_loop=$this->_tpl_vars['cate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['top']['name'] = 'top';
$this->_sections['top']['show'] = true;
$this->_sections['top']['max'] = $this->_sections['top']['loop'];
$this->_sections['top']['step'] = 1;
$this->_sections['top']['start'] = $this->_sections['top']['step'] > 0 ? 0 : $this->_sections['top']['loop']-1;
if ($this->_sections['top']['show']) {
    $this->_sections['top']['total'] = $this->_sections['top']['loop'];
    if ($this->_sections['top']['total'] == 0)
        $this->_sections['top']['show'] = false;
} else
    $this->_sections['top']['total'] = 0;
if ($this->_sections['top']['show']):

            for ($this->_sections['top']['index'] = $this->_sections['top']['start'], $this->_sections['top']['iteration'] = 1;
                 $this->_sections['top']['iteration'] <= $this->_sections['top']['total'];
                 $this->_sections['top']['index'] += $this->_sections['top']['step'], $this->_sections['top']['iteration']++):
$this->_sections['top']['rownum'] = $this->_sections['top']['iteration'];
$this->_sections['top']['index_prev'] = $this->_sections['top']['index'] - $this->_sections['top']['step'];
$this->_sections['top']['index_next'] = $this->_sections['top']['index'] + $this->_sections['top']['step'];
$this->_sections['top']['first']      = ($this->_sections['top']['iteration'] == 1);
$this->_sections['top']['last']       = ($this->_sections['top']['iteration'] == $this->_sections['top']['total']);
?>	
				<li class='list-l1'>
					<div class='list-l1-wrap'>
						<h4><a href="<?php echo @__APP__; ?>
?c=category&cid=<?php echo $this->_tpl_vars['cate'][$this->_sections['top']['index']]['cid']; ?>
"><?php echo $this->_tpl_vars['cate'][$this->_sections['top']['index']]['title']; ?>
</a></h4>
						<ul class='list-l2'>
						<?php unset($this->_sections['x']);
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['cate'][$this->_sections['top']['index']]['son']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['max'] = (int)3;
$this->_sections['x']['show'] = true;
if ($this->_sections['x']['max'] < 0)
    $this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
$this->_sections['x']['start'] = $this->_sections['x']['step'] > 0 ? 0 : $this->_sections['x']['loop']-1;
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = min(ceil(($this->_sections['x']['step'] > 0 ? $this->_sections['x']['loop'] - $this->_sections['x']['start'] : $this->_sections['x']['start']+1)/abs($this->_sections['x']['step'])), $this->_sections['x']['max']);
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>
							<li><a href="<?php echo @__APP__; ?>
?c=category&cid=<?php echo $this->_tpl_vars['cate'][$this->_sections['top']['index']]['cid']; ?>
&pid=<?php echo $this->_tpl_vars['cate'][$this->_sections['top']['index']]['son'][$this->_sections['x']['index']]['cid']; ?>
"><?php echo $this->_tpl_vars['cate'][$this->_sections['top']['index']]['son'][$this->_sections['x']['index']]['title']; ?>
</a></li>
						<?php endfor; endif; ?>
						</ul>
					</div>

					<div class='list-more hidden'>
						<ul>
						<?php unset($this->_sections['x']);
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['cate'][$this->_sections['top']['index']]['son']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['start'] = (int)3;
$this->_sections['x']['show'] = true;
$this->_sections['x']['max'] = $this->_sections['x']['loop'];
$this->_sections['x']['step'] = 1;
if ($this->_sections['x']['start'] < 0)
    $this->_sections['x']['start'] = max($this->_sections['x']['step'] > 0 ? 0 : -1, $this->_sections['x']['loop'] + $this->_sections['x']['start']);
else
    $this->_sections['x']['start'] = min($this->_sections['x']['start'], $this->_sections['x']['step'] > 0 ? $this->_sections['x']['loop'] : $this->_sections['x']['loop']-1);
if ($this->_sections['x']['show']) {
    $this->_sections['x']['total'] = min(ceil(($this->_sections['x']['step'] > 0 ? $this->_sections['x']['loop'] - $this->_sections['x']['start'] : $this->_sections['x']['start']+1)/abs($this->_sections['x']['step'])), $this->_sections['x']['max']);
    if ($this->_sections['x']['total'] == 0)
        $this->_sections['x']['show'] = false;
} else
    $this->_sections['x']['total'] = 0;
if ($this->_sections['x']['show']):

            for ($this->_sections['x']['index'] = $this->_sections['x']['start'], $this->_sections['x']['iteration'] = 1;
                 $this->_sections['x']['iteration'] <= $this->_sections['x']['total'];
                 $this->_sections['x']['index'] += $this->_sections['x']['step'], $this->_sections['x']['iteration']++):
$this->_sections['x']['rownum'] = $this->_sections['x']['iteration'];
$this->_sections['x']['index_prev'] = $this->_sections['x']['index'] - $this->_sections['x']['step'];
$this->_sections['x']['index_next'] = $this->_sections['x']['index'] + $this->_sections['x']['step'];
$this->_sections['x']['first']      = ($this->_sections['x']['iteration'] == 1);
$this->_sections['x']['last']       = ($this->_sections['x']['iteration'] == $this->_sections['x']['total']);
?>
							<li><a href="<?php echo @__APP__; ?>
?c=category&cid=<?php echo $this->_tpl_vars['cate'][$this->_sections['top']['index']]['cid']; ?>
&pid=<?php echo $this->_tpl_vars['cate'][$this->_sections['top']['index']]['son'][$this->_sections['x']['index']]['cid']; ?>
"><?php echo $this->_tpl_vars['cate'][$this->_sections['top']['index']]['son'][$this->_sections['x']['index']]['title']; ?>
</a></li>
						
						 <?php endfor; endif; ?>	
						</ul>
					</div>
				</li>
			<?php endfor; endif; ?>


				
			</ul>
		</div>

		<div id='center'>
			<div id='animate'>
				<div class='imgs-wrap'>
					<ul>
						<li>
							<a href=""><img src="<?php echo @__PUBLIC__; ?>
/Images/animate1.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="<?php echo @__PUBLIC__; ?>
/Images/animate2.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="<?php echo @__PUBLIC__; ?>
/Images/animate3.jpg" width='558' height='190'/></a>
						</li>
					</ul>
				</div>
				<ul class='ani-btn'>
					<li class='ani-btn-cur'>0学费学习<i></i></li>
					<li>超百G原创视频<i></i></li>
					<li style='border:none'>有实力做后盾<i></i></li>
				</ul>
			</div>

			<dl class='answer-list'>
				<dt>
					<span class='wait-as'>待解决问题</span>
					<a href=''>更多>></a>
				</dt>
				<?php $_from = $this->_tpl_vars['noselv']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<dd>
					<a href="<?php echo @__APP__; ?>
?c=answer&asid=<?php echo $this->_tpl_vars['v']['asid']; ?>
"><?php echo $this->_tpl_vars['v']['content']; ?>
</a>
					<span><?php echo $this->_tpl_vars['v']['answer']; ?>
回答</span>
				</dd>
				<?php endforeach; endif; unset($_from); ?>
			</dl>

			<dl class='answer-list'>
				<dt>
					<span class='reward-as'>高分悬赏问题</span>
					<a href=''>更多>></a>
				</dt>
				<?php $_from = $this->_tpl_vars['more']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<dd>
					<a href="<?php echo @__APP__; ?>
?c=answer&asid=<?php echo $this->_tpl_vars['v']['asid']; ?>
"><b><?php echo $this->_tpl_vars['v']['reward']; ?>
</b><?php echo $this->_tpl_vars['v']['content']; ?>
</a>
					<span><?php echo $this->_tpl_vars['v']['answer']; ?>
回答</span>
				</dd>
				<?php endforeach; endif; unset($_from); ?>
			</dl>

		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/right.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
<!--------------------内容主体结束-------------------->
	<div class='clear'></div>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>