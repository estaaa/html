<?php 
class C48{
	//提供给外部的运行方法
	public static function run(){
		//1.设置常量(为了创建目录做准备，为了后面载入文件做准备)
		self::setConst();
		//2.创建目录(给用户提供可以在哪里写代码的规范)
		self::createDir();
		//3.载入必须文件
		self::loadCore();
		//4.执行应用类
		App::run();
		
	}
	/**
	 * 载入核心文件
	 */
	private static function loadCore(){
		$coreArr = array(
			CORE_PATH . '/App.class.php',
			CORE_PATH . '/Controller.class.php',
			FUNCTION_PATH . '/functions.php',
		);
		foreach ($coreArr as $v) {
			//只被载入一次
			require_once $v;
		}
	}
	/**
	 * 设置常量
	 */
	private static function setConst(){
		//统一windows和linux路径
		$path = str_replace('\\', '/', __FILE__);
		//定义框架目录
		define('C48_PATH', dirname($path));
		//定义框架config目录
		define('CONFIG_PATH', C48_PATH . '/Config');
		//定义Data目录
		define('DATA_PATH', C48_PATH . '/Data');
		//定义Font字体目录
		define('FONT_PATH', DATA_PATH . '/Font');
		//定义扩展Extend目录
		define('EXTEND_PATH', C48_PATH . '/Extend');
		//定义Tool目录
		define('TOOL_PATH', EXTEND_PATH . '/Tool');
		//定义Lib目录
		define('LIB_PATH', C48_PATH . '/Lib');
		//定义Core目录
		define('CORE_PATH', LIB_PATH . '/Core');
		//定义Function目录
		define('FUNCTION_PATH', LIB_PATH . '/Function');
		//定义项目根目录
		define('ROOT_PATH', dirname(C48_PATH));
		//定义应用目录
		define('APP_PATH', ROOT_PATH . '/' . APP_NAME);
		//定义控制器目录
		define('APP_CONTROLLER_PATH', APP_PATH . '/Controller');
		//定义视图目录
		define('APP_VIEW_PATH', APP_PATH . '/View');
		//定义存放js,css,图片 Public目录
		define('APP_PUBLIC_PATH', APP_VIEW_PATH . '/Public');
		//定义配置项目录
		define('APP_CONFIG_PATH', APP_PATH . '/Config');
		//p($_SERVER);
		//如果有post提交，IS_POST为真
		define('IS_POST', $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false);
	}
	
	/**
	 * 创建文件夹
	 */
	private static function createDir(){
		$dirArr = array(
			APP_CONTROLLER_PATH,
			APP_VIEW_PATH,
			APP_CONFIG_PATH,
			APP_PUBLIC_PATH
		);
		foreach ($dirArr as $v) {
			is_dir($v) || mkdir($v,0777,true);
		}
	}
	
	
	
	
}
C48::run();

 ?>