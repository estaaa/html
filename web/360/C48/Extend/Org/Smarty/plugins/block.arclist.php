<?php
/**
 * $params 用户传递的参数 rows=2
 * $content 就是标签中间包裹的内容
 */
function smarty_block_arclist($params, $content, &$smarty)
{
   //条数
   $rows = isset($params['rows']) ? $params['rows'] : 1000;
   //分类id
   $cid = isset($params['uid']) ? $params['uid'] : NULL;
	
	//如果用户有传递cid
	if($cid){
		$sql = "SELECT * FROM login WHERE uid={$uid} LIMIT {$rows}";
	}else{
		$sql = "SELECT * FROM login LIMIT {$rows}";
	}
	//获得数据
  	$data = query($sql);
	$str = '';
	foreach ($data as $v) {
		$c = $content;
		foreach($v as $f => $value){
			//p("[\$field.{$f}]" . "对应的值：" . $value);
			$c = str_replace("[\$field.{$f}]", $value, $c);
		}
		$str .= $c;
	}
	return $str;
	
}

//整体过程
//<tr>
//	<td>[$field.aid]</td>
//	<td>[$field.title]</td>
//</tr>
//第一次替换
//<tr>
//	<td>1</td>
//	<td>今天是周三</td>
//</tr>

//第二次替换
//<tr>
//	<td>[$field.aid]</td>
//	<td>[$field.title]</td>
//</tr>
//<tr>
//	<td>2</td>
//	<td>今天是周四</td>
//</tr>







