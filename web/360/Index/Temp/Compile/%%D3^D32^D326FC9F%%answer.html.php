<?php /* Smarty version 2.6.26, created on 2015-05-31 23:38:00
         compiled from D:/wamp/www/www/2/up/Index/View/Member/answer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'D:/wamp/www/www/2/up/Index/View/Member/answer.html', 31, false),)), $this); ?>
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
		<div id='right'>
			<p class='title'>我的回答</p>
			<ul class='ask-filter'>
				<li class='<?php if ($_GET['wer'] == NULL): ?>cur<?php endif; ?>'><a href="<?php echo @__APP__; ?>
?c=member&a=answer">全部回答</a></li>
				<li class='<?php if ($_GET['wer'] == 1): ?>cur<?php endif; ?>'><a href="<?php echo @__APP__; ?>
?c=member&a=answer&wer=1">被采纳的回答</a></li>
			
			</ul>
			<?php if ($_GET['wer'] == NULL): ?>
			<div class='list list-filter'>
				<table>
						
						<?php if ($this->_tpl_vars['answer']): ?>
						<tr>
							<th class='t1'>标题</th>
							<th>回答</th>
							<th class='t3'>更新时间</th>
						</tr>
						<tr>
						<?php unset($this->_sections['x']);
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['answer']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['max'] = (int)7;
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
?c=answer&asid=<?php echo $this->_tpl_vars['answer'][$this->_sections['x']['index']]['asid']; ?>
"><?php echo $this->_tpl_vars['answer'][$this->_sections['x']['index']]['content']; ?>
</a><span>[<?php echo $this->_tpl_vars['answer'][$this->_sections['x']['index']]['title']; ?>
]</span>
							</td>
							<td>20</td>
							<td class='t3'><?php echo ((is_array($_tmp=$this->_tpl_vars['answer'][$this->_sections['x']['index']]['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
						</tr>
						<?php endfor; endif; ?>
						<?php else: ?>
						<tr height='140'>
							<td>你还没有回答过问题</td>
						</tr>
						<?php endif; ?>
				</table>
			</div>
			<?php else: ?>
			<div class='list list-filter'>
				<table>
						
						<?php if ($this->_tpl_vars['caina']): ?>
						<tr>
							<th class='t1'>标题</th>
							<th>回答</th>
							<th class='t3'>更新时间</th>
						</tr>
						<tr>
						<?php unset($this->_sections['x']);
$this->_sections['x']['loop'] = is_array($_loop=$this->_tpl_vars['caina']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['x']['name'] = 'x';
$this->_sections['x']['max'] = (int)7;
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
?c=answer&asid=<?php echo $this->_tpl_vars['caina'][$this->_sections['x']['index']]['asid']; ?>
"><?php echo $this->_tpl_vars['caina'][$this->_sections['x']['index']]['content']; ?>
</a><span>[<?php echo $this->_tpl_vars['caina'][$this->_sections['x']['index']]['title']; ?>
]</span>
							</td>
							<td>20</td>
							<td class='t3'><?php echo ((is_array($_tmp=$this->_tpl_vars['caina'][$this->_sections['x']['index']]['time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
						</tr>
						<?php endfor; endif; ?>
						<?php else: ?>
						<tr height='140'>
							<td>你还没有回答过问题</td>
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