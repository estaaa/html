<?php
/**
* 用户总控制器
*/
class CommonController extends Controller
{
    public function __construct(){
        parent::__construct();
        
    }
    /**
     * 回答管理和问题的删除函数
     */
    protected function del(){
        // 回答
      if(isset($_GET['anid'])){
          $anid = $_GET['anid'];
          M('se')->exec("DELETE FROM hd_answer WHERE anid={$anid}");
      }
      // 问题
      if(isset($_GET['asid'])){
         $asid = $_GET['asid'];
          M('se')->exec("DELETE FROM hd_ask WHERE asid={$asid}");
      }
    }
    
}