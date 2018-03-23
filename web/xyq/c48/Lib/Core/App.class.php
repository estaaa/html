<?php 
/**
 * 应用类
 */
class App{
	/**
	 * 运行
	 */
	public static function run(){
		//1.初始化框架
		self::init();
		//2.设置外部路径
		self::setUrl();
		//3.自动载入(给当前类的autoload方法赋予自动载入的功能)
		spl_autoload_register(array(__CLASS__,'autoload'));
		//4.创建demo控制器
		self::createDemo();
		//5.实例化控制器
		self::appRun();
	}
	/**
	 * (1)设置js,css,图片用的网址路径
	 * (2)为了将来跳转服务,比如想跳转到登陆
	 * <a href="<?php echo __APP__ ?>?c=Login">登陆</a>
	 */
	private static function setUrl(){
		//应用路径
		define('__APP__', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME']);
		//项目根
		define('__ROOT__', dirname(__APP__));
		//view路径
		define('__VIEW__', __ROOT__ . '/' . APP_NAME . '/View');
		//定义Public路径
		define('__PUBLIC__', __VIEW__ . '/Public');
	}
	/**
	 * 自动载入，本来autoload是没有自动载入功能
	 * 经过spl_autoload_register 之后就拥有了自动载入
	 */
	private static function autoload($className){
		//判断是否是控制器 ，因为Controller就是10位
		if(strlen($className) > 10 && substr($className, -10) == 'Controller'){
			$path = APP_CONTROLLER_PATH . '/' . $className . '.class.php';
			//如果文件存在则载入
			if(is_file($path)){
				require $path;
			}else{
				//如果没有文件，提示错误
				halt($path . "控制器找不到！");
			}
		}else{//处理工具类
			$path = TOOL_PATH . '/' . $className . '.class.php';
			if(is_file($path)){
				include $path;
			}else{
				//如果没有文件，提示错误
				halt($path . "工具类找不到！");
			}
		}
		
	}
	/**
	 * 实例化应用控制器
	 */
	private static function appRun(){
		//控制器 注意首字母大写，因为类就是首字母大写
		$controller = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Index';
		define('CONTROLLER', $controller);
		//就相当于 $controller = $controller . 'Controller';
		$controller .= 'Controller';
		//动作 方法
		$action = isset($_GET['a']) ? $_GET['a'] : 'index';
		define('ACTION', $action);
		
		//实例化控制器，执行方法
		$obj = new $controller;
		$obj->$action();
	}
	
	/**
	 * 创建demo（1,为了给用户规范，2,输出欢迎语）
	 */
	private static function createDemo(){
		$data = <<<str
<?php
class IndexController extends Controller{
	public function index(){
		header("Content-type:text/html;charset=utf-8");
		echo "<h2 style='padding:10px;border:1px solid #ddd;margin:20px auto;font-size:40px;'>欢迎使用c48超级无敌大框架 (: </h2>";
	}
}
?>
str;
		$path = APP_CONTROLLER_PATH . '/IndexController.class.php';
		//如果文件不存在，则给用户创建
		is_file($path) || file_put_contents($path, $data);
	}
	/**
	 * 初始化框架
	 */
	private static function init(){
		
		//框架配置路径
		$sysConfigPath = CONFIG_PATH . '/Config.php';
		//用户配置路径
		$userConfigPath = APP_CONFIG_PATH . '/Config.php';
		//如果用户配置没有，则创建一个
		if(!is_file($userConfigPath)){
			$str = <<<str
<?php
return array(
//配置项=>配置值

);
?>
str;
			file_put_contents($userConfigPath, $str);
		}
		//加载配置项
		C(include $sysConfigPath);
		C(include $userConfigPath);
		
		//设置时区
		date_default_timezone_set(C('DATA_TIMEZONE'));
		//开启session(如果有了session id 那么证明session已经开启过了)
		session_id() || session_start();
		
	}
}











 ?>