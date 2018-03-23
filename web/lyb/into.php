<?php 

if(!empty($_POST)&&!empty($_POST['content'])&&!empty($_FILES['file']['name'])){
		
	move_uploaded_file($_FILES['file']['tmp_name'],'./images/' . $_FILES['file']['name']);
	$arr = include 'date.php';
//	把表单数组压入数组中
//	print_r($_FILES);

	$fi['fi']=$_FILES;
	$arr[] = array_merge($_POST,$fi);
//echo $arr[0]['fi']['file']['name'];
//	print_r($arr);
	
	$val = var_export($arr,true);
	$a=file_put_contents('date.php',"<?php\nreturn ".$val."\n?>");
   	if($a){
   		echo "<script>
   		location.href='index.php';
   		</script>";
   	}
/*echo "<pre>"
print_r($_FILES);
echo "</pre>"*/
}else{
	
}

 ?>