<?php
/**
* 个人中心表
*/
class ProtectedModel extends Model
{
    
    public $table='protected';


    public $validate = array(
        array('passwd','minlen:6','密码长度最小为6位字符',2,3),
        array('password','minlen:6','密码长度最小为6位字符',2,3),
        array('passwd','confirm:password','两次密码不一致',2,3)
        );




    public function proEdit($uid){
      
        if(!$this->create()) return false;
       // 实例化上传类
       $upload = new Upload();
       // 调用上传
       $uplofiles = $upload->upload();
       // 找到当前数据 如果没有修改 还把旧数据 赋值回去
       $notUid = $this->where("user_uid={$uid}")->find();
      
       // 判断是否有上传
       if($uplofiles){
           file_exists($notUid['thumb'])&&unlink($notUid['thumb']);
           $_POST['thumb'] = $uplofiles['0']['path'];
       }else{
             $_POST['thumb'] = $notUid['thumb'];
           }


        // 获得需要编辑的用户名 和 密码
        $oldData = K('User')->where("uid={$uid} AND is_admin=0")->find();
        // p($oldData);
        // 判断用户名是否被占用  先判断是否修改了用户名
        if($_POST['username']!=$oldData['username']){
          $username = $_POST['username'];
          // 查看名字是否被占用
          $allUser = K('User')->where("username='{$username}' AND is_admin=0")->find();
          if($allUser){
            $this->error='用户名已存在';return false;
          }
        }
        
        // 如果提交过来的密码和旧密码不一致 说明管理员修改了密码 所以要重新赋值
        if(md5($oldData['password'])!=md5(Q('post.password'))){
            $_POST['password']=md5(Q('post.password'));
        }
        $this->where("user_uid={$uid}")->update();
        k('User')->where("uid={$uid}")->update();
        return true;
    }






}