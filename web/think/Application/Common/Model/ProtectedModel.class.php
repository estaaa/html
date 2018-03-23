<?php
/**
* 个人中心表
*/
namespace Common\Model;
use Think\Model;
class ProtectedModel extends Model
{
    public $_validate = array(
        array('passwd',6,20,'密码长度最小为6位字符',1,'length'),
        array('password',6,20,'确认密码长度最小为6位字符',1,'length'),
        array('passwd','password','两次密码不一致',1,'confirm')
        );




    public function proEdit($uid){
       if(!$this->create()) return false;
       // 实例化上传类
       $upload = new \Think\Upload(array('rootPath'=>'./Uploads/User/'));
       // 调用上传
       $uplofiles = $upload->upload();
	   // 找到当前数据 如果没有修改 还把旧数据 赋值回去
       $notUid = $this->where("user_uid={$uid}")->find();
	   // 判断是否有上传
       if($uplofiles){
           file_exists($notUid['thumb'])&&unlink($notUid['thumb']);
           $_POST['thumb']='./Uploads/User/'.$uplofiles['thumb']['savepath'].$uplofiles['thumb']['savename'];
       }else{
             $_POST['thumb'] = $notUid['thumb'];
           }
		// 获得需要编辑的用户名 和 密码
        $oldData = D('User')->where("uid={$uid} AND is_admin=0")->find();
        // p($oldData);
        // 判断用户名是否被占用  先判断是否修改了用户名
        if($_POST['username']!=$oldData['username']){
          $username = $_POST['username'];
          // 查看名字是否被占用
          $allUser = D('User')->where("username='{$username}' AND is_admin=0")->find();
          if($allUser){
            $this->error='用户名已存在';return false;
          }
        }
        
        // 如果提交过来的密码和旧密码不一致 说明管理员修改了密码 所以要重新赋值
        if(md5($oldData['password'])!=md5(I('post.password','','string'))){
            $_POST['password']=md5(I('post.password','','string'));
        }
        $this->where("user_uid={$uid}")->save($_POST);
        D('User')->where("uid={$uid}")->save($_POST);
        return true;
    }

	/**
	 * 获得查找的所有内容
	 * */
	public function getAll($where){
        $allUser = M('User')->alias('u')->join('__PROTECTED__ AS p ON u.uid=p.user_uid')->where($where)->select();
		return $allUser;
	}

	public function adminEdit($uid){
//		if(!$this->create()) return false;
		// 判断用户名是否被占用  先判断是否修改了用户名
          if($_POST['username']!=$allUser['username']){
            $username = $_POST['username'];
            // 查看管理员名字是否被占用
            $allUser = D('User')->where("username='{$username}' AND is_admin=1")->find();
            // 如果存在 管理员姓名已存在
            if($allUser){
            	$this->error='管理员名字已存在';
              	return false;
            }
          }
          // 判断管理员是否修改了密码 如果修改了 就进行验证
          // 如果新密码不等于服务器上的密码说明 是要修改
          if($_POST['password']!=$allUser['password']){
              if($_POST['password']!=$_POST['newpass']){
              	$this->error='两次密码不一致';
              	return false;
              }
              if(strlen(trim($_POST['password']))<6){
              	$this->error='密码长度最少6位';
              	return false;
              }
          }
		  // 最后修改 
          D('User')->where("uid={$uid}")->save($_POST);
		  return true;
	}
	/**
	 * 获得指定的用户的总数
	 * */
	public function countAll($where){
		$allLen=M('User')->alias('u')->join('__PROTECTED__ AS p ON u.uid=p.user_uid')->where($where)->count();
		return $allLen;
	}
	public function getOldData($uid){
		$allUser=M('User')->alias('u')->join('__PROTECTED__ AS p ON u.uid=p.user_uid')->where("uid={$uid}")->find();
		return $allUser;
	}
	
	


}