<?php
class SearchController extends CommonController{
   public function index(){
      // 获取搜索数组
      // 判断提交的表单不为空的时候赋值
         if(!empty($_GET['result'])) $result=$_GET['result'];
         if(!empty($_POST['result'])) $result=$_POST['result'];
         if(empty($_GET['result'])&&empty($_POST['result'])){$result='';}
         // 搜索数据库
         $result = M('hd_ask')->query("SELECT a.content,a.asid,w.content as da,a.time,c.title,a.answer FROM  hd_category as c join hd_ask as a on a.cid=c.cid join hd_answer as w on a.asid=w.asid WHERE a.content LIKE '%{$result}%'" );
         // p($result);
       
         // $data = M('er')->query("SELECT * FROM ")
         // p($result);
         // 分配变量
         $this->assign('result',$result);
         $this->display();
   }

}