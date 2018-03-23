<?php
/**
* 子类属性表
*/
class Type_sonModel extends Model
{
    
    public $table="type_son";

    public $validate = array(
        array('stitle','nonull','属性标题不能为空',2,3),
        array('content','nonull','属性值不能为空',2,3),
        // array('stitle','_isexist','属性名字已经存在',2,3),
        );
    public function _isexist($name, $value, $msg, $arg){
        $sonData = $this->where("stitle='{$value}'")->find();

        if($sonData) return $msg;
        return true;
    }
    public function sonData(){
        // p($_POST);die;
        if(!$this->create()) return false;
        $this->add();
        return true;
    }

    public function edit($sid){
       $this->validate = array(
            array('stitle','nonull','属性标题不能为空',2,3),
            array('content','nonull','属性值不能为空',2,3),
            );
       if(!$this->create()) return false;
       // 判断管理员是否修改了属性标题 如果修改了 判断有没有相同的名字存在
       // 获得原始数据
       $oldData = $this->where("sid={$sid}")->find();
       // 如果提交过来的标题 和原始数据标题不一致就证明修改了
       if($oldData['stitle']!=$_POST['stitle']){
            // 判断修改的名字有没有相同的
            $newName = $_POST['stitle'];
            $newData = $this->where("stitle='{$newName}'")->find();
            if($newData){
                $this->error="属性名字已经存在";return false;
            }

       }
       $this->where("sid={$sid}")->update();
       return true;
    }
}