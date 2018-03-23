<?php /* Smarty version 2.6.26, created on 2015-05-31 23:37:58
         compiled from D:/wamp/www/www/2/up/Index/View/Member/point.html */ ?>
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
			<p class='title'>我的金币</p>
			<p class='lv-info'>
					您还没有金币，赶紧向着高富帅去奋斗吧！
					您现有金币<span>20</span>
			</p>
			<div class='lv-rule'>
				<p><span>金币获取</span></p>
				<table class='lv-exp'>
					<tr>
						<th>操作</th>
						<th>获得金币</th>
					</tr>
					<tr>
						<td>回答</td>
						<td>+1金币</td>
					</tr>
					<tr>
						<td>回答被采纳</td>
						<td>+5金币</td>
					</tr>
					<tr>
						<td>回答被删除：</td>
						<td>-2金币</td>
					</tr>
					<tr>
						<td>提问被删除：</td>
						<td>-3金币</td>
					</tr>
					<tr>
						<td>采纳回答被删除</td>
						<td>提问者：-1金币&nbsp;&nbsp;回答者：-2金币</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<!--------------------中部结束-------------------->
<!-- 底部 -->
	<div id='bottom'>
		<p>Copyright © 2013 Qihoo.Com All Rights Reserved 后盾网</p>
		<p>京公安网备xxxxxxxxxxxx</p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->
</body>
</html>
<!-- 底部结束 -->