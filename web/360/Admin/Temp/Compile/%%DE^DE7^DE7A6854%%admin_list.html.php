<?php /* Smarty version 2.6.26, created on 2015-06-01 15:15:28
         compiled from D:/wamp/www/2/up/Admin/View/List/admin_list.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/public.css" />
	<script type="text/javascript" src="<?php echo @__PUBLIC__; ?>
/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo @__PUBLIC__; ?>
/Js/public.js"></script>	
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20">用户列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>用户名</td>
			<td>最后登录时间</td>
			<td>最后登录IP</td>
			<td>帐号状态</td>
			<td>操作</td>
		</tr>
		<?php unset($this->_sections['num']);
$this->_sections['num']['loop'] = is_array($_loop=$this->_tpl_vars['adminfrom']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['num']['name'] = 'num';
$this->_sections['num']['show'] = true;
$this->_sections['num']['max'] = $this->_sections['num']['loop'];
$this->_sections['num']['step'] = 1;
$this->_sections['num']['start'] = $this->_sections['num']['step'] > 0 ? 0 : $this->_sections['num']['loop']-1;
if ($this->_sections['num']['show']) {
    $this->_sections['num']['total'] = $this->_sections['num']['loop'];
    if ($this->_sections['num']['total'] == 0)
        $this->_sections['num']['show'] = false;
} else
    $this->_sections['num']['total'] = 0;
if ($this->_sections['num']['show']):

            for ($this->_sections['num']['index'] = $this->_sections['num']['start'], $this->_sections['num']['iteration'] = 1;
                 $this->_sections['num']['iteration'] <= $this->_sections['num']['total'];
                 $this->_sections['num']['index'] += $this->_sections['num']['step'], $this->_sections['num']['iteration']++):
$this->_sections['num']['rownum'] = $this->_sections['num']['iteration'];
$this->_sections['num']['index_prev'] = $this->_sections['num']['index'] - $this->_sections['num']['step'];
$this->_sections['num']['index_next'] = $this->_sections['num']['index'] + $this->_sections['num']['step'];
$this->_sections['num']['first']      = ($this->_sections['num']['iteration'] == 1);
$this->_sections['num']['last']       = ($this->_sections['num']['iteration'] == $this->_sections['num']['total']);
?>
		<tr>
			<td><?php echo $this->_tpl_vars['adminfrom'][$this->_sections['num']['index']]['aid']; ?>
</td>
			<td><?php echo $this->_tpl_vars['adminfrom'][$this->_sections['num']['index']]['username']; ?>
</td>
			<td><?php echo $this->_tpl_vars['adminfrom'][$this->_sections['num']['index']]['logintime']; ?>
</td>
			<td><?php echo $this->_tpl_vars['adminfrom'][$this->_sections['num']['index']]['loginip']; ?>
</td>
			<td><?php echo $this->_tpl_vars['adminfrom'][$this->_sections['num']['index']]['lock']; ?>
</td>
			<td><a href="<?php echo @__APP__; ?>
?c=list&a=admin_list&aid=<?php echo $this->_tpl_vars['adminfrom'][$this->_sections['num']['index']]['aid']; ?>
">删除</a>&nbsp&nbsp&nbsp<a href="<?php echo @__APP__; ?>
?c=list&a=add_admin&aid=<?php echo $this->_tpl_vars['adminfrom'][$this->_sections['num']['index']]['aid']; ?>
">修改</a></td>
		</tr>
		<?php endfor; endif; ?>
	</table>

</body>
</html>