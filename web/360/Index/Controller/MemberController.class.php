<?php
/**
* 个人中心
*/
class MemberController extends CommonController
{
   public function index(){
         // 检查登陆状态
         $this->islogin();
         // 获得用户id 并找到相应信息
         $this->userprivate();
         // 获得顶级分类
         $this->topCate();
         $this->display();
      
      
   }

  /**
   * 我的提问
   * 
   */
   public function ask(){
      $this->topCate();
      $this->islogin();
      // 获得用户id 并找到相应信息
      $this->userprivate();
      $userid = $_SESSION['uid'];
      // 未解决
      $ask = M('er')->query("SELECT * FROM hd_ask as s JOIN hd_category as c on s.cid=c.cid WHERE s.uid={$userid} AND s.solve=0");
      // 已解决
      $notask = M('er')->query("SELECT * FROM hd_ask as s JOIN hd_category as c on s.cid=c.cid WHERE s.uid={$userid} AND s.solve=1");
      // p($notask);
      $this->assign('ask',$ask);
      $this->assign('notask',$notask);
      $this->display();
   }
   public function answer(){
      $this->topCate();
      $this->islogin();
      $this->userprivate();
      $userid = $_SESSION['uid'];
      $answer = M('er')->query("SELECT * FROM hd_answer AS a join hd_ask as c ON a.asid=c.asid join hd_category as t on t.cid=c.cid WHERE a.uid={$userid}");
      $caina = M('er')->query("SELECT * FROM hd_answer AS a join hd_ask as c ON a.asid=c.asid join hd_category as t on t.cid=c.cid WHERE a.uid={$userid} and a.accept=1");
      $this->assign('answer',$answer);
      $this->assign('caina',$caina);
      // p($caina);
      $this->display();
   }
    public function point(){
      $this->topCate();
      $this->islogin();
      $this->userprivate();
      $this->display();
   }
    public function level(){
      $this->topCate();
      $this->islogin();
      $this->userprivate();
      $this->display();
   }
   
    public function face(){
      $this->topCate();
      $this->islogin();
      $this->userprivate();
       // 实例化上传类
      $img = new UP();
      $v = $img ->group();
      // 获得用户id
      $userid = $_SESSION['uid'];
      if(isset($_GET['up'])){

            // 获得图片路径
            $path = $v[0]['path'];
            // 判断原来的照片是否存在  存在就删除 为空就插入
            $oldimg = M("er")->query("SELECT FACE FROM hd_user where uid={$userid}");
            $old =$oldimg[0]['FACE'];
            if($old==''){
               // 插入数据库
               M('wer')->exec("UPDATE hd_user SET face='{$path}' WHERE uid={$userid}");
            }else{
               $oldimg = M("er")->query("SELECT FACE FROM hd_user where uid={$userid}");
               $old =$oldimg[0]['FACE'];
               file_exists($old)&&unlink($old);
               // 插入数据库
               M('wer')->exec("UPDATE hd_user SET face='{$path}' WHERE uid={$userid}");
                $this->userprivate();
            }
            $this->success('上传成功',__APP__."?c=member&a=face");

         }
   
     
      $this->display();
   }
















}