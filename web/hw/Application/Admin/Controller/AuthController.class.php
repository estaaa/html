<?php
/**
* 后台总控制器
*/
class AuthController extends Controller
{
    
    public function __init(){
        if(!isset($_SESSION['adminuid'])||!isset($_SESSION['adminname'])){
            go(U("Admin/Login/index"));
        }
    }

    /**
     * 获取子集分类
     */
    protected function getSon($data,$cid){

      $arr = array();
      foreach($data as $v){
        if($v['pid']==$cid){
            $arr[] = $v['cid'];
            $arr = array_merge($arr,$this->getSon($data,$v['cid']));
        }
      }
      return $arr;
      
   }













}