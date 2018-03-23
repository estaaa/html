<?php
/**
* 类型表
*/
class TypeModel extends Model
{
    
    public $table='type';

    public $validate = array(
        array('title','nonull','名称不能为空',2,3),
        array('title','minlen:2','最少为2个字符哦',2,3),
        array('title','_isexist','类型名字已经存在',2,3)
        );

    /**
     * 判断类型名字是否存在
     */
    public function _isexist($name, $value, $msg, $arg){
      
        $typeData = $this->where("title='{$value}'")->find();
        if($typeData) return $msg;
        return true;
    }
    /*
    *$tid=1是修改 默认是添加
     */
    public function addData($num,$tid=NULL){
        if(!$this->create()) return false;
        if($num==1){
            $this->where("tid={$tid}")->update();
        }else{
            $this->add();
        }
        
        return true;
    }



}