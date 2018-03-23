<?php /* Smarty version 2.6.26, created on 2015-05-30 22:34:04
         compiled from D:/wamp/www/up/Index/View/Member/ask.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'D:/wamp/www/up/Index/View/Member/ask.html', 32, false),)), $this); ?>
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
<!-- 左侧 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/ask.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- 左侧结束 -->
		<div id='right'>
			<p class='title'>我的提问</p>
			<ul class='ask-filter'>
				<li class='<?php if ($_GET['v'] == NULL): ?>cur<?php endif; ?>'><a href="<?php echo @__APP__; ?>
?c=member&a=ask">待解决问题</a></li>
				<li class='<?php if ($_GET['v'] == 1): ?>cur<?php endif; ?>'><a href="<?php echo @__APP__; ?>
?c=member&a=ask&v=1">已解决问题</a></li>
			</ul>
			<?php if ($_GET['v'] == NULL): ?>
			<div class='list list-filter'>
				<table>
					
					
					<?php if ($this->_tpl_vars['ask']): ?>
					<tr>
						<th class='t1'>标题</th>
						<th>回答数</th>
						<th class='t3'>更新时间</th>
					</tr>
					<tr>
					<?php unset($this->_sections['x']);
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['ask']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['max'] = (int)8;
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
						<td class='t1'>
							<a href="<?php echo @__APP__; ?>
?c=answer&asid=<?php echo $this->_tpl_vars['ask'][$this->_sections['x']['index']]['asid']; ?>
"><?php echo $this->_tpl_vars['ask'][$this->_sections['x']['index']]['content']; ?>
</a> <span> [<?php echo $this->_tpl_vars['ask'][$this->_sections['x']['index']]['title']; ?>
]</span>
						</td>
						<td><?php echo $this->_tpl_vars['ask'][$this->_sections['x']['index']]['answer']; ?>
</td>
						<td class='t3'><?php echo ((is_array($_tmp=$this->_tpl_vars['ask'][$this->_sections['x']['index']]['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
					</tr>
					<?php endfor; endif; ?>
					<?php else: ?>
					<tr height='140'>
						<td>你还没有待解决的提问</td>
					</tr>
					<?php endif; ?>
					
				</table>
			</div>
			<?php else: ?>
			<div class='list list-filter'>
				<table>
					
					<?php if ($this->_tpl_vars['notask']): ?>

					<tr>
						<th class='t1'>标题</th>
						<th>回答</th>
						<th class='t3'>更新时间</th>
					</tr>
					<?php unset($this->_sections['x']);
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['notask']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['max'] = (int)8;
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
					<tr>
						<td class='t1'>
							<a href="<?php echo @__APP__; ?>
?c=answer&asid=<?php echo $this->_tpl_vars['notask'][$this->_sections['x']['index']]['asid']; ?>
"><?php echo $this->_tpl_vars['notask'][$this->_sections['x']['index']]['content']; ?>
</a><span>[<?php echo $this->_tpl_vars['notask'][$this->_sections['x']['index']]['title']; ?>
]</span>
						</td>
						<td><?php echo $this->_tpl_vars['notask'][$this->_sections['x']['index']]['answer']; ?>
</td>
						<td class='t3'><?php echo ((is_array($_tmp=$this->_tpl_vars['notask'][$this->_sections['x']['index']]['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
					</tr>
					<?php endfor; endif; ?>
					<?php else: ?>
					<tr height='140'>
						<td>你还没有已解决的提问</td>
					</tr>
					<?php endif; ?>
					
				</table>
			</div>
			<?php endif; ?>
		</div>
	</div>
<!--------------------中部结束-------------------->
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