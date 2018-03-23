<?php
/**
* 友情链接表
*/
namespace Common\Model;
use Think\Model;
class FlinkModel extends Model
{
   public $_validate = array(
        
        array('ftitle','require','标题不能为空',1,3),
        array('link','require','链接不能为空',1,3),
        array('ftitle','checklength','帐号要在4-12位之间!!!',1,'callback'),
        array('link','url','必须为http网址格式',1,3),
        array('ftitle','_link','链接名称已经存在',1,'callback'),
    );
   public function _link(){
        $value = I('post.ftitle','','string');
        $flinkData = $this->where("ftitle='{$value}'")->find();
        if($flinkData) return false;
        return true;
    }
   public function flinkAdd(){
    
    if(!$this->create()) return false;
    $this->add();
    return true;
   }
	protected  function checklength(){
		if(mb_strlen($_POST['ftitle'])>3){
			  return true;
		}else {return false;} 
	}
   
   public function edit($fid){
    $this->_validate = array(
         
         array('ftitle','require','标题不能为空',1,3),
         array('link','require','链接不能为空',1,3),
         array('ftitle','checklength','帐号要在4-12位之间!!!',1,'callback'),
         array('link','url','必须为http网址格式',1,3),
     );
    if(!$this->create()) return false;

    $title = I('post.ftitle','','string');
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
    
    $this->where("fid={$fid}")->save($_POST);
    return true;
   }
}