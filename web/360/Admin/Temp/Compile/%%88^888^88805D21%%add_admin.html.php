<?php /* Smarty version 2.6.26, created on 2015-06-01 15:16:00
         compiled from D:/wamp/www/2/up/Admin/View/List/add_admin.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/add_category.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo @__APP__; ?>
?c=list&a=add_admin" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加后台用户</td>
			</tr>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username"/></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input type="password" name="passwdF"/></td>
			</tr>
			<tr>
				<td>确认密码：</td>
				<td><input type="password" name="passwdS"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="<?php if ($_GET['aid']): ?>修改<?php else: ?>添加<?php endif; ?>" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>