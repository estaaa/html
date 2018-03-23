<?php
//smarty的不缓存块
function nocache($params, $content, &$smarty) {
    return $content;
}
function M($table){
    $model = new Model($table);
    return $model;
}
/*
*打印数组和类型
*
 */
function p($var){
    echo "<pre style='border:1px sold #ccc;padding:10px;border-radius:4px;background:#ddd;margin-top:5px;'>";
    if(is_bool($var)){
        var_dump($var);
    }else{
        print_r($var);
    }
    echo '</pre>';
}
/*
*显示输出错误信息
 */
function halt($msg){
    header("Content-type:text/html;charset=utf-8");
    die("<h2>{$msg} ):</h2>");
}
/*
*配置文件信息  C函数
 */
function C($var=NULL,$value=NULL){
    static $config = array();
    if(is_array($var)){
        $config= array_merge($config,$var);
    }
    if(is_string($var)){
        if(is_null($value)){
            return isset($config[$var])?$config[$var]:null;
        }else{
            return $config[$var]=$value;
        }
    }
    if(is_null($var)&&is_null($value)){
        return $config;
    }
}
/*
*打印框架所有的常量
 */
function print_const(){
    $const = get_defined_constants(true);
}