<?php /* Smarty version 2.6.26, created on 2015-06-01 19:37:57
         compiled from D:/wamp/www/2/up/Admin/View/List/add_top_cate.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="<?php echo @__PUBLIC__; ?>
/Css/add_category.css" />
	<title></title>
</head>
<body>
	<form action="" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加顶级分类</td>
			</tr>
			<tr>
				<td>分类名称</td>
				<td><input type="text" name="title"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="<?php if ($_GET['cid']): ?>修改<?php else: ?>添加<?php endif; ?>" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>