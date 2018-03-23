<?php /* Smarty version 2.6.26, created on 2015-05-30 20:24:58
         compiled from D:/wamp/www/up/Index/View/Member/level.html */ ?>
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
			<p class='title'>我的的等级</p>
			<p class='lv-info'>恭喜您，已经升到 <span>Lv1</span> 级啦，距下一级还需 <span>200</span> 经验值!</p>
			<div class='lv-rule'>
				<p><span>等级规则</span></p>
				<table class='lv-exp'>
					<tr>
						<th>等级</th>
						<th>经验值</th>
					</tr>
					<tr class="cur">
						<td >我的现在<span>2</span>级</td>
						<td><span>5</span></td>
					</tr>
					<tr>
						<td>2</td>
						<td>5</td>
					</tr>
				</table>
			</div>
			<div class='lv-rule'>
				<p><span>经验获取规则</span></p>
				<table class='lv-exp'>
					<tr>
						<th>操作</th>
						<th>获得经验值</th>
					</tr>
					<tr>
						<td>每天登录</td>
						<td>1</td>
					</tr>
					<tr>
						<td>提问</td>
						<td>2</td>
					</tr>
					<tr>
						<td>回答</td>
						<td>3</td>
					</tr>
					<tr>
						<td>采纳与被采纳</td>
						<td>3</td>
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