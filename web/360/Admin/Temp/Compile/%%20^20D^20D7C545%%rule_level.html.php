<?php /* Smarty version 2.6.26, created on 2015-06-01 21:32:42
         compiled from D:/wamp/www/2/up/Admin/View/List/rule_level.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/css/public.css" />
</head>
<body>
	<form action="" method='post'>
		<table class="table">
			<tr>
				<th colspan='2'>经验级别规则设置</th>
			</tr>
			<tr>
				<td align='right'>登录：</td>
				<td>
					+ <input type="text" name='lv_login' value='' />
				</td>
			</tr>
			<tr>
				<td align='right'>提问：</td>
				<td>
					+ <input type="text" name='lv_ask' value='' />
				</td>
			</tr>
			<tr>
				<td align='right'>回答：</td>
				<td>
					+ <input type="text" name='lv_answer' value='' />
				</td>
			</tr>
			<tr>
				<td align='right'>采纳：</td>
				<td>
					+ <input type="text" name='lv_adopt' value='' />
				</td>
			</tr>
		</table>
		<table class='table'>
			<tr>
				<th colspan='8'>各等级所需经验</th>
			</tr>
			<tr>
				<td>LV1:</td>
				<td>
					<input type="text" name='lv1' value='' />
				</td>
			</tr>
			<tr>
				<td colspan='8' align='center' height='60'>
					<input type="submit" value='保存修改' class='input_button'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>