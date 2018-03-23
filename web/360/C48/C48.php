<?php 

class C48{
    // 提供给外部的调用方法
    public static function run(){
       // 1设置常量保存路径
       self::setConst();
       // 2创建文件夹给用户提供规范 也就是创建前台后台应用
       self::createDir();
       // 3载入必要文件 就是类和函数库  就会联想到载入库里面的文件 那么类和函数库没有文件
       // 就应该先建立文件  建立文件之后没有定义路径 就定义好路径 在载入 然后调用
       self::loadCore();
       // 4执行应用类 执行类库里面的app文件  下面调用一定是App哦 不是self了 self是内部调用
       App::run();
           }
    /*
    *载入必须文件类和函数库
     */
    private static function loadCore(){
        // 把需要载入的类和函数库文件放到一个数组里
        $coreArr = array(
            
            FUNCTION_PATH.'/function.php',
            // 为了让控制器Controller能继承模版$smarty的功能要在他之前载入控制器
            CORE_PATH.'/SmartyView.class.php',
            CORE_PATH.'/App.class.php',
            CORE_PATH.'/Controller.class.php'
            

            );
        foreach($coreArr as $v){
            // 载入之前看看是否被再如果 如果被载入过 就不再载入 没有载入就载入 避免重复载入 函数名相同 发生错误
            require_once $v;
        }
        
    }
    /*
    *创建常量保存目录路径 
    *是为了给创建目录做准备
     */
    private static function setConst(){
        // 为了让windows和linx系统下的路径保持统一 进行优化过滤
        // 输出结果__FILE__D:\wamp\www\Demo\C48\C48.php
        // __DIR__输出结果D:\wamp\www\Demo\C48
        // 这里可以使用__DIR__因为他的效率更快 是获得当前目录的路径
        // __FILE__是获得当前文件的路径 这里为了和老师保持统一 继续使用 __FILE__
        // 这里的\\符号因为\是特殊符号 所以要转译才能使用 第一个\是转译的意思
        // 获得的路径都是\形式的 所以为了统一更改为/形式
        $path = str_replace('\\','/',__FILE__);
        // 定义框架目录//D:/wamp/www/Demo/C48
        define('C48_PATH',dirname($path));
        // 设置系统配置文件目录//D:/wamp/www/Demo/C48/Config
        define('CONFIG_PATH',C48_PATH.'/Config');
        // 定义文字水印目录data//D:/wamp/www/Demo/C48/Data
        define('DATA_PATH',C48_PATH.'/Data');
        // 定义字体目录.//D:/wamp/www/Demo/C48/Data/Font
        define('FONT_PATH',DATA_PATH.'/Font');
        // 定义扩展目录//D:/wamp/www/Demo/C48/Extend
        define('EXTEND_PATH',C48_PATH.'/Extend');
        // 定义smarty模版目录//D:/wamp/www/Demo/C48/Extend/Org
        define('ORG_PATH',EXTEND_PATH.'/Org');
        // 定义工具类Tool//D:/wamp/www/Demo/C48/Extend/Tool 
        define('TOOL_PATH',EXTEND_PATH.'/Tool');
        // echo TOOL_PATH;
        // 定义类和函数库文件目录Lib//D:/wamp/www/Demo/C48/Lib
        define('LIB_PATH',C48_PATH.'/Lib');
        // 定义类Core目录//D:/wamp/www/Demo/C48/Lib/Core
        define('CORE_PATH',LIB_PATH.'/Core');
        // 定义函数Function目录//D:/wamp/www/Demo/C48/Lib/Core/Function
        define('FUNCTION_PATH',LIB_PATH.'/Function');
        // 定义根目录//D:/wamp/www/Demo
        define('ROOT_PATH',dirname(C48_PATH));
        // 定义应用目录//D:/wamp/www/Demo/Index
        define('APP_PATH',ROOT_PATH.'/'.APP_NAME);
        // 定义用户视图View目录//D:/wamp/www/Demo/Index/View
        define('APP_VIEW_PATH',APP_PATH.'/View');
        //定义存放js,css,图片 Public目录
        define('APP_PUBLIC_PATH', APP_VIEW_PATH . '/Public');
        //定义临时目录D:/wamp/www/Demo/Index/Temp
        define('APP_TEMP_PATH',APP_PATH.'/Temp');
        // 定义缓存目录D:/wamp/www/Demo/Index/Temp/Cache
        define('APP_CACHE_PATH',APP_TEMP_PATH.'/Cache');
        // 定义编译目录D:/wamp/www/Demo/Index/Temp/Compile
        define('APP_COMPILE_PATH',APP_TEMP_PATH.'/Compile');
        // echo APP_COMPILE_PATH;

        // define('')
        // 定义应用目录下的配置Config目录//D:/wamp/www/Demo/Index/Config
        define('APP_CONFIG_PATH',APP_PATH.'/Config');
        // 定义应用目录下的控制器Controller目录//D:/wamp/www/Demo/Index/Controller
        define('APP_CONTROLLER_PATH',APP_PATH.'/Controller');
        // echo FUNCTION_PATH;
        define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);
    }
    /*
    *创建应用目录
    *给用户提供规范
     */
    private static function createDir(){
        // 把得到的路径 可以放到一个数组里 
        $dirpath = array(
            APP_VIEW_PATH,
            APP_CONFIG_PATH,
            APP_CONTROLLER_PATH,
            APP_PUBLIC_PATH,
            APP_CACHE_PATH,
            APP_COMPILE_PATH
            );
        // 循环创建文件夹
        foreach($dirpath as $v){
            // 判断是不是一个目录 是目录不执行 不是目录就创建目录 必须要有权限 不然Index就创建不了 报错
            is_dir($v)||mkdir($v,0777,true);
        }
    }

}

C48::run();
















 ?>