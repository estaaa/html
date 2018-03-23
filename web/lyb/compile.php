<?php 
header('Content-type:text/html;charset=utf-8');
//載入數據庫
$arr = include 'date.php';
//獲取鍵標
$num = (int)$_GET['k'];
//echo $num;
if(!empty($_POST['com'])){
//	如果表單不為空 那麼我讓表單的內容賦給$num號數組
	$arr[$num]['content']=$_POST['com'];
	$arr[$num]['mytime']=$_POST['mytime'];
//	echo $_POST['com'];
//	然後讓數組合法化

	$newarr = var_export($arr,true);
//	創建數據庫
	$last = file_put_contents('date.php', "<?php\nreturn ".$newarr."\n?>");
	if($last){
		echo '编辑成功.....';
		echo "<script>location.href='index.php';</script>";
	}
}

 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
 	<title>Document</title>
 	<style>
 	*{
 		padding: 0;
 		margin: 0;
 	}
 	form{
 		width: 500px;
 		margin: 50px auto;
 	}
 		input{
 			width:500px;
 			height: 30px;
 			border: 1px solid #498CD1;
 		}
 		.int{
 			width: 500px;
 			background: #498CD1;
 		}
 		.time{
 			display: none;
 		}
 	</style>
 </head>
 <body>
 	<form action="" method="post">
 		<input type="text" name='mytime' class='time' value="<?php date_default_timezone_set('PRC');$mytime=date('Y-m-d H:i:s');$arr[]= $mytime;echo $mytime;?>"/>

 		<input type="text" name="com"/><br />
 		<input type="submit" value="確認修改" class="int"/>
 	</form>
 	
 </body>
 </html>