<?php
/**
* 货品列表
*/
class ProListModel extends Model
{
    
   public $table='prolist';


   public $validate = array(
       
        array("styleid",'nonull','货号不能为空',2,3),
    );
   public function listAdd($pro_id){
    // 判断属性是否为空
    foreach($_POST['attrand'] as $v){
         if($v==0){
          $this->error='属性不能为空';
          return false;
         }
    }
       
        if(!$this->create()) return false;
        // 因为提交过来的属性id是一个数组所以要变为字符串
        $_POST['attrand']=implode(',',$_POST['attrand']);
        $_POST['pro_id']=$pro_id;
        $this->add($_POST);
        // p($_POST);DIE;
        return true;
   }



   public function listEdit($pro_id,$listid){

    // 判断属性是否为空
    foreach($_POST['attrand'] as $v){
         if($v==0){
          $this->error='属性不能为空';
          return false;
         }
    }
       
        if(!$this->create()) return false;
        // 因为提交过来的属性id是一个数组所以要变为字符串
        $_POST['attrand']=implode(',',$_POST['attrand']);
        $_POST['pro_id']=$pro_id;
        $this->where("listid={$listid}")->update($_POST);
        // p($_POST);DIE;
        return true;
   }
}