<?php /* Smarty version 2.6.26, created on 2015-06-01 22:08:47
         compiled from D:/wamp/www/2/up/Admin/View/List/welcome.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'D:/wamp/www/2/up/Admin/View/List/welcome.html', 39, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/css/public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<td colspan='2' class="th"><span class="span_server" style="float:left">&nbsp</span>服务器信息</td>
		</tr>

		<tr>
			<td>服务器环境</td>
			<td><?php echo $this->_tpl_vars['data']['huanjing']; ?>
</td>
		</tr>
		<tr>
			<td>PHP版本</td>
			<td><?php echo $this->_tpl_vars['data']['SERVER_SOFTWARE']; ?>
</td>
		</tr>
		<tr>
			<td>服务器IP</td>
			<td><?php echo $this->_tpl_vars['data']['SERVER_NAME']; ?>
</td>
		</tr>
		<tr>
			<td>数据库信息</td>
			<td><?php echo $this->_tpl_vars['data']['shuju']; ?>
</td>
		</tr>
		<tr>
			<td colspan='2' class="th"><span class="span_people">&nbsp</span>管理员信息</td>
		</tr>
		<tr>
			<td>用户名</td>
			<td><?php echo $this->_tpl_vars['usertime']['0']['username']; ?>
</td>
		</tr>
		<tr>
			<td>登录时间</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['usertime']['0']['logintime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</td>
		</tr>
		<tr>
			<td>登陆IP</td>
			<td><?php echo $this->_tpl_vars['usertime']['0']['loginip']; ?>
</td>
		</tr>
		
</table>
</body>
</html>