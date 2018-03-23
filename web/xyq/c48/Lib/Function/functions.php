<?php 
/**
 * 打印函数
 */
function p($var){
	echo '<pre style="border:1px solid #ccc;pading:10px;border-radius:4px;background:#ddd;margin-top:5px;">';
	if(is_bool($var)){
		var_dump($var);
	}else{
		print_r($var);
	}
	echo '</pre>';
}

function halt($msg){
	header('Content-type:text/html;charset=utf-8');
	die("<h2>{$msg} ):</h2>");
}

/**
 * 处理配置项函数
 */
function C($var=NULL,$value=NULL){
	static $config = array();
	//如果第一个参数是数组，加载配置项
	if(is_array($var)){
		$config = array_merge($config,$var);
	}
	//C('CODE_LEN');
	//C('CODE_LEN', 1);
	//p(C());
	if(is_string($var)){
		//如果第一个参数是字符串，获得对应配置项
		if(is_null($value)){
			//如果用户传输错误，则返回null
			return isset($config[$var]) ? $config[$var] : NULL;
		}else{
			//临时改变配置项
			$config[$var] = $value;
		}
		
	}
	//用户没有传参，要获得所有配置项
	if(is_null($var) && is_null($value)){
		return $config;
	}
	
}
/**
 * 打印框架所有常量
 */
function print_const(){
	$const = get_defined_constants(true);
	p($const['user']);
}
function data_to_file($data,$path){
	$data = var_export($data,true);
	$str = <<<str
<?php
return {$data};
?>
str;
	file_put_contents($path, $str);
}


















 ?>