<?php

function smarty_modifier_truncate_d($string, $length = 80, $etc = '...'){
	//截取字符串
	return mb_substr($string, 0,$length,'utf8') . $etc;
}

/* vim: set expandtab: */

?>
