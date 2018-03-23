<?php
/**
* 购物车表
*/
class BuyinfoModel extends Model
{
    
 public $table='buyinfo';
  public $validate = array(
     array('buy_num','nonull','产品数量不能为空',2,3),
     array('pic','nonull','价格不能为空',2,3),
     array('remark','nonull','货品属性不能为空',2,3),
     );
 public function editData($bid){
     if(!$this->create()){return false;}
     $this->where("bid={$bid}")->update();
     return true;
 }
}