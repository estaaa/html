<?php 
//载入Smarty
include ORG_PATH . "/Smarty/Smarty.class.php";

class SmartyView{
  
  private static $smarty = NULL;
  
  public function __construct(){
    if(!is_null(self::$smarty)) return;
    //实例化Smarty对象
    $smarty = new Smarty();
    //模版目录
    $smarty->template_dir = APP_VIEW_PATH . '/' . CONTROLLER;
    //编译目录 
    $smarty->compile_dir = APP_COMPILE_PATH;
    //缓存目录
    $smarty->cache_dir = APP_CACHE_PATH;
    //是否缓存
    $smarty->caching = C('CACHE_ON');
    //缓存时间
    $smarty->cache_lifetime = C('CACHE_TIME');
    //开始定界符
    $smarty->left_delimiter = C('LEFT_DELIMITER');
    //结束定界符
    $smarty->right_delimiter = C('RIGHT_DELIMITER');
    
    //注册局部不缓存块
    $smarty->register_block("nocache", "nocache", false);
    
    //保存smarty对象到静态属性中
    self::$smarty = $smarty;  
  }
  
  /**
   * 分配变量
   */
  protected function assign($var,$value){
    self::$smarty->assign($var,$value);
  }
  
  /**
   * 载入模板
   */
  protected function display(){
    //模板路径
    $path = APP_VIEW_PATH . '/' . CONTROLLER . '/' . ACTION . '.html';
    //判断模板是否存在
    if(is_file($path)){
      //调用smarty的载入模板
      self::$smarty->display($path);
    }else{
      halt($path . ' 模板找不到');
    }
    
  }
  
  /**
   * 判断缓存是否失效
   */
  protected function is_cached(){
    //模板路径
    $path = APP_VIEW_PATH . '/' . CONTROLLER . '/' . ACTION . '.html';
    //判断模板是否存在
    if(is_file($path)){
      return self::$smarty->is_cached($path);
    }else{
      halt($path . ' 模板找不到');
    }
    
  }
  
}









