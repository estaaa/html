<?php
class AskController extends CommonController{
   public function index(){
      $this->topCate();
      if(isset($_SESSION['uid'])){
          $askuid=$_SESSION['uid'];
          $poin =  M('er')->query("select * from hd_user where uid={$askuid}");
          $poin=$poin[0]['point'];
      }else{
          $poin=0;
      }
     
       // 获得用户金币
     $this->assign('poin',$poin);
      // p($poin);
      $this->display();
   }
   public function ajaxAsk(){
      if(IS_POST){
         $cid = (int)$_POST['id'];
         $data = M('category')->query("SELECT * FROM hd_category WHERE pid={$cid}");
         echo json_encode($data);
      }
   }
   public function ajaxForm(){
      
     
      if(IS_POST){
         // $asktime = time();
         // p(date('Y-m-d H:i:s'));
         // 1内容为空
         if(empty($_POST['content'])){echo 1;return;}
         // 2分类为空
         if(empty($_POST['cid'])){echo 2;return;}
         
         if(isset($_SESSION['name'])){
            // 添加用户id
            $data=$_POST;
            $data['uid']=$_SESSION['uid'];
            // 获得用户金币 进行判断
            $userpoint=M('er')->query("SELECT * FROM hd_user WHERE uid={$data['uid']}");
            // 进行判断金币判断
            $userpoint=$userpoint[0]['point'];
            if($userpoint<$data['reward']){echo 5;return;}
            // p($userpoint);
            // 添加时间戳
            $data['time'] = time();
            $fields = implode(',',array_keys($data));
            //组合字段值
            $values = '"' . implode('","',array_values($data)) . '"';
            $sql = "INSERT INTO hd_ask({$fields}) VALUES ({$values})";
            // 添加提问数// 添加经验
            M('er')->exec("UPDATE hd_user SET ask=ask+1,exp=exp+1 WHERE uid={$data['uid']}");
            M('DFG')->exec($sql);
            $asid = M('er')->query("select * from hd_ask where time='{$data['time']}' and uid={$data['uid']}");
            // 减去提交的金币
            M('er')->exec("UPDATE hd_user SET point=point-{$data['reward']} WHERE uid={$data['uid']}");
            
            // 找到asid 返回js
            $data['asid']=$asid[0]['asid'];
             echo json_encode($data);
            // $this->success('添加成功',__APP__."c=answer&asid=".$cid);
           
         }else{
            // 4未登录
            echo 4;
         }
       }
      // p($_POST);
   }
}
