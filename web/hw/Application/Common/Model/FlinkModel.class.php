<?php
/**
* 友情链接表
*/
class FlinkModel extends Model
{
   public $table='flink';

   public $validate = array(
        
        array('ftitle','nonull','标题不能为空',2,3),
        array('link','nonull','链接不能为空',2,3),
        array('ftitle','minlen:2','标题长度必须4个字符以上',2,3),
        array('link','http','必须为http网址格式',2,3),
        array('ftitle','_link','链接名称已经存在',2,3),
    );
   public function _link($name, $value, $msg, $arg){
        // p($value);die;
        $flinkData = $this->where("ftitle='{$value}'")->find();
        if($flinkData) return $msg;
        return true;
    }
   public function flinkAdd(){
    
    if(!$this->create()) return false;
    $this->add();
    return true;
   }

   public function edit($fid){
    $this->validate = array(
         
         array('ftitle','nonull','标题不能为空',2,3),
         array('link','nonull','链接不能为空',2,3),
         array('ftitle','minlen:2','标题长度必须4个字符以上',2,3),
         array('link','http','必须为http网址格式',2,3),
     );
    if(!$this->create()) return false;

    $title = Q('post.ftitle','','string');
    // 判断管理员有没有修改标题 
    // 如果修改了判断标题是否存在
    // 先获得旧数据
    $oldData = $this->where("fid={$fid}")->find();
    if($title!=$oldData['ftitle']){
        $alltitle = $this->where("ftitle='{$title}'")->find();
        // 判断用户是否修改了名字 如果修改了执行
        if($alltitle){
          $this->error="链接名称已经存在";
          return false;
        }
    }
    
    $this->where("fid={$fid}")->update();
    return true;
   }
}