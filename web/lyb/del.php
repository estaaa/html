<?php 
//載入數據庫
header('Content-type:text/html;charset=utf-8');
$arr = include 'date.php';
//獲取序號 
$num = $_GET['k'];
unset($arr[$num]);
//返回合法的數組 實體化

$newarr = var_export($arr,true);
//然後重新插入到數據庫
$last = file_put_contents('date.php',"<?php\n return ".$newarr."\n?>");
//返回首頁留言板
if($last){
	echo '删除中.......';
	echo "<script>location.href='index.php';</script>";
}




 ?>