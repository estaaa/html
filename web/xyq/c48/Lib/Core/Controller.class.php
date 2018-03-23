<?php 
class Controller{
	private $var = array();
	/**
	 * 成功提示方法
	 */
	protected function success($msg,$url){
		header('Content-type:text/html;charset=utf-8');
		$str = <<<str
<script type="text/javascript">
alert("{$msg}");
location.href="{$url}";
</script>
str;
		echo $str;die;
	}
	
	/**
	 * 错误提示方法
	 */
	protected function error($msg){
		header('Content-type:text/html;charset=utf-8');
		$str = <<<str
<script type="text/javascript">
alert("{$msg}");
history.back();
</script>
str;
		echo $str;die;
	}
	/**
	 * 分配变量
	 */
	protected function assign($var,$value){
		//$this->var['a'] = 1
		$this->var[$var] = $value;
	}
	/**
	 * 显示模板
	 */
	protected function display(){
		$path = APP_VIEW_PATH . '/' . CONTROLLER . '/' . ACTION . '.html';
		if(is_file($path)){
			//将数组键名变为变量名，
			//将数组键值变为变量值
			//array('a'=>1)
			//$a = 1;
			extract($this->var);
			include $path;
		}else{
			halt($path . ' 模板找不到');
		}
	}
	
	
	
	
	
	
}


 ?>