<?php
namespace Common\Model;
use Think\Model;
class Type_sonModel extends model{

    protected $_validate = array(
        array('stitle','require','属性名称不能为空','1','3'),
        array('content','require','属性内容不能为空','1','3'),
        );

    public function addAttr(){
        if(!$this->create()){return false;}
        $this->add();
        return true;
    }

    public function attrEdit($sid){
        if(!$this->create()){return false;}
        $this->where("sid={$sid}")->save();
        return true;
    }

}