<?php
/**
 * @Author: anchen
 * @Date:   2015-05-16 11:25:37
 * @Last Modified by:   anchen
 * @Last Modified time: 2015-05-27 13:24:40
 */
class App{
    public static function run(){
        // 1初始化框架
        self::init();
        // 2设置外部路径也就是这只js css html 的Http路径
        self::setUrl();
        // 3自动载入(给当前类的autoload方法赋予自动载入的功能)array(__CLASS__,'autoload')里面的__CLASS__可以是App这里是要载入所有的类 所有使用__CLASS__;
        spl_autoload_register(array(__CLASS__,'autoload'));
        // 4创建控制器 先创建控制器 才想到 载入控制器  在实例化控制器 三者同时做完才能使用
        self::createDemo();
        // 5实例化控制器 
        self::appRun();
    }
    /*
    *设置网址路径
     */
    public static function setUrl(){
        // $_SERVER是获得系统各种信息的 我们只需要获得里面的域名信息就好了
        // 组合路径 定义应用网址路径//http://localhost/Demo/index.php
        define('__APP__','http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']);
        // 项目的根目录//http://localhost/Demo
        define('__ROOT__',dirname(__APP__));
        // 定义视图目录view//http://localhost/Demo/Index/View
        define('__VIEW__',__ROOT__.'/'.APP_NAME.'/View');
        // 定义Public目录//http://localhost/Demo/Index/View/Public
        define('__PUBLIC__',__VIEW__.'/Public');
        // p(__PUBLIC__);
    }
    /*
    *实例化控制器
     */
    private static function appRun(){
        // 获取get参数  
        $controller = isset($_GET['c'])?ucfirst($_GET['c']):'Index';
        // 把赋值给常量 用来调用控制器
        define('CONTROLLER',$controller);
        // 组合控制器
        $controller.='Controller';
        // 获得第二个参数
        $action = isset($_GET['a'])?$_GET['a']:'index';
        // 赋值给常量 用来载入模版
        define('ACTION',$action);
        // 实例化控制器
        $obj = new $controller;
        // 调用方法
        $obj->$action();
    }
    /*
    *自动载入控制器
    *自动载入工具扩展类
     */
    private static function autoload($className){
        // 当条件成立时载入控制器 不成立时载入工具扩展类
        // 注意不要在最后class前面加'.'
        if(strlen($className)>10&&substr($className,-10)=='Controller'){
               $path = APP_CONTROLLER_PATH.'/'.$className.'.class.php';
            // echo $path;
            if(is_file($path)){
                require $path;
            }else{
                //如果没有文件，提示错误
                halt($path . "文件找不到！");
            }
        }else{
            $path = TOOL_PATH.'/'.$className.'.class.php';
            if(is_file($path)){
                require $path;
            }else{
                //如果没有文件，提示错误
                halt($path . "文件找不到！");
            }
        }
     
    }
    /* 
    *创建控制器并赋给初始值
    */
    private static function createDemo(){
        // 组合路径
        $path = APP_CONTROLLER_PATH.'/IndexController.class.php';
        // / 编辑文件初始内容
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
    is_file($path)||file_put_contents($path,$data);
        
    }
    /*
    *初始化框架
     */
    private static function init(){
        // 为了实现用户的数据覆盖系统数据配置文件 所以要获得系统配置文件
        // 获得用户配置文件 用户配置文件我们要给他创建好
        // 所以要再次设置路径
        $sysConfigPath = CONFIG_PATH.'/Config.php';
        // 获得用户配置文件
        $userConfigPath = APP_CONFIG_PATH.'/Config.php';
        if(!is_file($userConfigPath)){
            $str = <<<str
<?php
return array(
    //配置项=>配置值,
    );
?>
str;
        file_put_contents($userConfigPath,$str);
        
        }
        // 为了实现用户的数据覆盖系统数据配置文件  要写一个C函数
        C(include $sysConfigPath);
        C(include $userConfigPath);
        // 设置时间区域
        date_default_timezone_set('PRC');
        // 开启session  如果存在就不再开启不存在就开启
        session_id()||session_start();
    }
}