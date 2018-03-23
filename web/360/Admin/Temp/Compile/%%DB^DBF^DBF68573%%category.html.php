<?php /* Smarty version 2.6.26, created on 2015-06-01 13:09:40
         compiled from D:/wamp/www/www/2/up/Admin/View/List/category.html */ ?>
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
	<?php if ($_GET['cid']): ?>
		
	<table class="table">
		<tr>
			<td class="th" colspan="20">分类列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle0 center">展开</td>
			<td class="tdLittle1">ID</td>
			<td>分类名称</td>
			<td class="tdLtitle7">操作</td>
		</tr>
		<?php $_from = $this->_tpl_vars['son']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n']):
?>
		<tr>
			<td><a href="javascript:void(0)" class="showPlus"></a></td>
			<td><?php echo $this->_tpl_vars['n']['cid']; ?>
</td>
			<td><?php echo $this->_tpl_vars['n']['title']; ?>
</td>
			<td>
				[<a href="<?php echo @__APP__; ?>
?c=list&a=category&cid=<?php echo $this->_tpl_vars['n']['cid']; ?>
">添加子分类</a>][
				<a href="">修改</a>][
				<a href="" class="del">删除</a>]
			</td>
		</tr>
		
		<?php endforeach; endif; unset($_from); ?>

	</table>
	<?php else: ?>	
	<table class="table">
		<tr>
			<td class="th" colspan="20">分类列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle0 center">展开</td>
			<td class="tdLittle1">ID</td>
			<td>分类名称</td>
			<td class="tdLtitle7">操作</td>
		</tr>
		<?php $_from = $this->_tpl_vars['topcate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n']):
?>
		<tr>
			<td><a href="javascript:void(0)" class="showPlus"></a></td>
			<td><?php echo $this->_tpl_vars['n']['cid']; ?>
</td>
			<td><?php echo $this->_tpl_vars['n']['title']; ?>
</td>
			<td>
				[<a href="<?php echo @__APP__; ?>
?c=list&a=category&cid=<?php echo $this->_tpl_vars['n']['cid']; ?>
">添加子分类</a>][
				<a href="">修改</a>][
				<a href="" class="del">删除</a>]
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>

	</table>
	<?php endif; ?>

</body>
</html>