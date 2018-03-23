<?php
/**
* 订单表
*/
namespace Common\Model;
use Think\Model;
class Add_infoModel extends Model
{
    
    public function infoData($dressData){
        $dressData['buy_time']=time();
        return $this->add($dressData);
    }

    public function editData($addid){
        $this->validate = array(
           array('add_people','require','收货人不能为空',1,3),
           array('shop_city','require','收货地址不能为空',1,3),
           array('address','require','收货地址详情不能为空',1,3),
           array('add_iphoto','require','电话不能为空',1,3),
           array('shop_city','require','价格不能为空',1,3),
           array('pic_all','require','价格不能为空',1,3),
           );
        if(!$this->create()){return false;}
        $this->where("infoid={$addid}")->save();
        return true;
    }
}