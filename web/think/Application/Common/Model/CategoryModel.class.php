<?php
namespace Common\Model;
use Think\Model;
class CategoryModel extends model{

    protected $_validate = array(
        array('ctitle','require','分类名字不能为空','1','3'),
        );
    /**
     * 添加顶级分类
     */
    public function addCate(){
       
        if(!$this->create()) return false;
        $this->add();
        return true;
    }
    /**
     * 编辑顶级分类
     */
   public function topEdit($cid){
       if(!$this->create()) return false;
       $this->where("cid={$cid}")->save();
       return true;
   }
   /**
    * 添加子级分类
    */
   public function addSonCate(){
      $this->_validate = array(
          array('ctitle','require','分类名字不能为空','1','3'),
          array('type_tid',array(null,0),'所属属性不能为空','1','notin'),
          );
      // p($_POST);die;
       if(!$this->create()) return false;
       $this->add();
       return true;
   }
   public function sonEdit($cid){
        $this->_validate = array(
            array('ctitle','require','分类名字不能为空','1','3'),
            array('type_tid',array(null,0),'所属属性不能为空','1','notin'),
            );
        $this->where("cid={$cid}")->save();
        return true;
   }
     /**
      * 获取子集分类
      */
     public function getSon($data,$cid){

       $arr = array();
       foreach($data as $v){
         if($v['pid']==$cid){
             $arr[] = $v['cid'];
             $arr = array_merge($arr,$this->getSon($data,$v['cid']));
         }
       }
       return $arr;
       
    }
    /**
     *组合二级分类和推荐商品
     */
    public function fatherAndSon(){
        // 获得顶级分类 截取7条 因为网站只能放入7条
        $fatherData = $this->where('pid=0')->limit(7)->select();
        foreach($fatherData as $k=>$v){
            $fatherData[$k]['son']=$this->where("pid={$v['cid']}")->select();
            // 推荐产品 获得当前所有子集分类
            $cidAll = implode(',',$this->getSonData($v['cid'],$this->select()));
            // 找到产品是推荐的
            $fatherData[$k]['sustain'] = D('Product')->where("cid in($cidAll) AND is_sustain=1")->select();
        }
        return $fatherData;
        
    }
    /**
     * 获得当前所有子集分类cid
     */
    public function getSonData($cid){
        $data = $this->select();
        $arr = array();
        foreach ($data as $k => $v) {
            if($v['pid']==$cid){
                $arr[] = $v['cid'];
                $arr = array_merge($arr,$this->getSonData($v['cid'],$data));
            }

        }
        return $arr;
    }

    public function getFather($cid,$data){
        $arr = array();
        foreach($data as $v){
            if($v['cid']==$cid){
                $arr[] = $v;
                $arr = array_merge($arr,$this->getFather($v['pid'],$data));
            }
        }
        return $arr;
    }

    /**
     * 获得同级分类
     */
    public function peerData($cid){
        // 获得父级pid
        $pid = current($this->where("cid={$cid}")->getField('pid',true));
        // 获得子类
        $peerData = $this->where("pid={$pid}")->select();
        return $peerData;
    }
}