<?php
/**
* 收货地址表
*/
namespace Common\Model;
use Think\Model;
class Add_addressModel extends Model
{
      public function pluse($sid,$plusvall){
        $data = array(
         'num'=>$plusvall+1,
          'sid'=>$sid,
        );
        $cart = new \Think\Cart();
        $cart::update($data);
        // 找到当前数据 返回ajax
        foreach (current($cart::getAllData()) as $k => $v) {
            if($k==$sid){
                $ajaxData = $v;
                $ajaxData['nums']=$cart::getTotalNums();
                $ajaxData['allPic']=$cart::getTotalPrice();
            }
        }
        return $ajaxData;
      }

      public function minus($sid,$minusvall){
        if($minusvall<=1){return 1;}
        $data = array(
         'num'=>(int)$minusvall-1,
          'sid'=>$sid,
        );
        $cart = new \Think\Cart();
        $cart::update($data);
        // 找到当前数据 返回ajax
        foreach (current($cart::getAllData()) as $k => $v) {
            if($k==$sid){
                $ajaxData = $v;
                $ajaxData['nums']=$cart::getTotalNums();
                $ajaxData['allPic']=$cart::getTotalPrice();
            }
        }
         return $ajaxData;
      }

      public function getSpec($arr){
        foreach ($arr as $k => $v) {
            // 获得图片
            $arr[$k]['img']=current(D('Product')->where("pro_id={$v['id']}")->getField('list_img',true));
            // 获得产品属性
            $avalue=D('Attribute')->where("pro_id={$v['id']} AND attid in(".implode(',',$v['options']).")")->select();
            // 把产品属性变为字符串
            foreach($avalue as $kk=>$vv){
                $avalue[$kk]=$vv['avalue'];
            }
            $arr[$k]['options']=implode(',',$avalue);
        }
        return $arr;
      }
      //判断添加和修改的收获地址
      public function isOk(){
        if(empty($_POST['add_people'])){return 1;die;}
        if(empty($_POST['shop_city'])){return 2;die;}
        if($_POST['shop_city']=='请选择省省,请选择市市,请选择县（区）'){return 2;die;}
        if(empty($_POST['address'])){return(3);die;}
        if($_POST['address']=='详细地址'){return(3);die;}
        if(empty($_POST['add_iphoto'])){return 4;die;}
        $_POST['user_uid']=$_SESSION['uid'];
        // 判断是添加还是修改
        if(isset($_POST['addid'])){
            $addid = $_POST['addid'];
            $this->where("add_id={$addid}")->save($_POST);
        }else{
            $this->add($_POST);
        }
        
        // 找到所属用户的所有订单信息
        $shopData = $this->where("user_uid={$_POST['user_uid']}")->select();
        return $shopData;
      }
      //修改默认收获地址
      public function addDefault($addid){
        // 获得uid  先清除所有默认 在添加默认
        $arr['is_add']=0;
        $uid = $_SESSION['uid'];
        $this->where("user_uid={$uid}")->save($arr);
        $arr['is_add']=1;
        $this->where("add_id={$addid}")->save($arr);
        // 找到所属用户的所有订单信息
        $shopData = $this->where("user_uid={$uid}")->select();
        return $shopData;
      }
}