<?php 
header('Content-type:text/html;charset=utf-8');
$arr = include 'date.php';
//print_r($arr);
//获取当前序号
if(!empty($_GET)){
	$num = $_GET['num'];
//截取.到后面的数字
$zen = strchr($num,'.');
//把截取到的替换为空得到的就是数组的序号
$k = str_replace($zen,'',$num);
//echo $k;
//截取.到后面的数字就是递增的数目
$num = str_replace(".",'',$zen);
//echo $num;
$arr[$k]['jian'] = $num;
//print_r($arr);
$newarr = var_export($arr,true);
$last = file_put_contents('date.php',"<?php\n return ".$newarr."\n?>");

if($last){
//	echo '删除中.......';
	echo "<script>location.href='index.php';</script>";
}
}else{
	$arr[$k]['jian']=0;
}










 ?>