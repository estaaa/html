<?php
namespace Common\Model;
use Think\Model;
class TypeModel extends model{
    protected $_validate = array(
        array('title','require','属性不能为空','1','3'),
        );
    /**
     * 添加
     */
    public function addData(){
        if(!$this->create()){return false;}
        $this->add();
        return true;
        
    }
    public function editData($tid){
        if(!$this->create()){return false;}
        $this->where("tid={$tid}")->save();
        return true;
    }
}