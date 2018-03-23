<?php namespace Api; 

use Hdphp\Controller\Controller as BaseController;

//测试控制器
class Controller extends BaseController{
    //动作
    public function returnAjax($errcode,$message){
     $this->ajax(array('errcode'=>$errcode,'message'=>$message));
    }
}











