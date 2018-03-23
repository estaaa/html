<?php
/**
* 货品列表
*/
namespace Common\Model;
use Think\Model;
class ProListModel extends Model
{
    
   public $_validate = array(
       array("styleid",'require','货号不能为空',2,3),
    );


   /**
    * 添加
    */
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
        $this->where("listid={$listid}")->save($_POST);
        // p($_POST);DIE;
        return true;
   }

   /**
    * //通过tid在类型属性表中查到该商品对应的规格名称
    */
   public function getAttr($tid,$pro_id,$sid){
      $spec =D('Type_son')->where("is_edit=1 AND tid={$tid}")->select();
      // 循环 让属性的值带有序号 以便于区分
      foreach ($spec as $k => $v) {
          $arr = D('Attribute')->where("pro_id={$pro_id} AND sid={$v['sid']}")->select();
          if(!$arr){
              unset($spec[$k]);
          }else{
              $spec[$k]['content']= $arr;
          }
      }
      return $spec;
   }
   /**
    *  //获得该商品所填写的货品列表数据
    */
   public function getGroup($pro_id){
      //获得该商品所填写的货品列表数据
      $listData = $this->where("pro_id={$pro_id}")->select();
      foreach ($listData as $k => $v) {
         if($v['attrand']){
             $listData[$k]['spec'] = D('Attribute')->where("attid in (" . $v['attrand'] . ")")->getField('avalue',true);
         }
      }
      return $listData;
   }
}