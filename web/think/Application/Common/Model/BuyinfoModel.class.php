<?php
/**
* 购物车表
*/
namespace Common\Model;
use Think\Model;
class BuyinfoModel extends Model
{
    
	 public $_validate = array(
	     array('buy_num','require','产品数量不能为空',2,3),
	     array('pic','require','价格不能为空',2,3),
	     array('remark','require','货品属性不能为空',2,3),
	     );
	 public function editData($bid){
	     if(!$this->create()){return false;}
	     $this->where("bid={$bid}")->save();
	     return true;
	 }
 	public function getAll($infoid){
 		$infoData = $this->where("infoid={$infoid}")->select();
         foreach ($infoData as $k => $v) {
             $infoData[$k]['pro_id']=current(D('Product')->where("Pro_id={$v['pro_id']}")->getField('p_title',true));
         }
		 return $infoData;
 	}
 
 
 
}