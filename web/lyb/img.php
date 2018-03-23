<?php 

if(!empty($_FILES)){
	move_uploaded_file($_FILES['file']['tmp_name'],'./images/' . $_FILES['file']['name']);
	$arr11 = include 'date1.php';
	$arr11[] = $_FILES;
	echo "<pre>";
	print_r($arr11);
	echo "</pre>";
	$val11 = var_export($arr11,true);
	$aa=file_put_contents('date1.php',"<?php\nreturn ".$val11."\n?>");

}















 ?>