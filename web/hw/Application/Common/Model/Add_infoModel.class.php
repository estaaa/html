<?php
/**
* 订单表
*/
class Add_infoModel extends Model
{
    
    public $table='add_info';
    public $validate = array();
    public function infoData($dressData){
        if(!$this->create()){return false;}
        $dressData['buy_time']=time();
        return $this->add($dressData);
    }

    public function editData($addid){
        $this->validate = array(
           array('add_people','nonull','收货人不能为空',2,3),
           array('shop_city','nonull','收货地址不能为空',2,3),
           array('address','nonull','收货地址详情不能为空',2,3),
           array('add_iphoto','nonull','电话不能为空',2,3),
           array('shop_city','nonull','价格不能为空',2,3),
           array('pic_all','nonull','价格不能为空',2,3),
           );
        if(!$this->create()){return false;}
        $this->where("infoid={$addid}")->update();
        return true;
    }
}