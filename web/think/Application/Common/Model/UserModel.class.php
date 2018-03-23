<?php
/**
* 用户信息表
*/
namespace Common\Model;
use Think\Model;
class UserModel extends Model
{
    protected $_validate = array(
        array('username','require','用户不能为空',1,3),
        array('password','require','密码不能为空',1,3),
        array('code','require','验证码不能为空',1,3),
        );

    public function userAdd($num){
        if(!$this->create()){return false;}
        // 获得要验证的数据 进行一一验证
        $adminName = I('post.username','','string');
        $passWord  = md5(I('post.password','','string'));
        $code = I('post.code','','string');
        $isExit = $this->where("username='{$adminName}'")->find();
        if(!$adminName){$this->error='用户名不存在';return false;}
        if($passWord!=$isExit['password']){$this->error='密码不正确';return false;}
        if(!check($code)){$this->error='验证码不正确';return false;}
        if($isExit['is_lock']==1){ $this->error='你已经被锁定 没有权限进行此操作';return false;}
        if($num==1){
            $_SESSION['username']=$isExit['username'];
            $_SESSION['uid']=$isExit['uid'];
            // 初始化个人中心表
            // 在初始化前先判断该表 是否已经初始化
            // 如果不判断 每次登陆都会重复添加 
            $protectedData = D('Protected')->where("user_uid={$isExit['uid']}")->find();
            if(!$protectedData){D('Protected')->add(array('user_uid'=>$_SESSION['uid']));}
            isset($_POST['auto'])? setcookie(session_name(),session_id(),time()+3600 * 24 * 7, '/'): setcookie(session_name(),session_id(),0,'');
        }else{
            if($isExit['is_admin']!=1){$this->error='您没有权限';return false;}
        }
        
        
        session('adminUid',$isExit['uid']);session('adminName',$adminName);
        return true;
    }

	protected  function checklength(){
		if(mb_strlen($_POST['username'])>5){
			  return true;
		}else {return false;} 
	}
	public function Vlogon(){

        // 自动验证
        $this->_validate = array(
            array('username','require','用户名不能为空',2,3),
            array('password','require','密码不能为空',2,3),
            array('passwd','require','确认密码不能为空',2,3),
            array('code','require','验证码不能为空',2,3),
            array('username','checklength','帐号要在5-12位之间!!!',1,'callback'),
            array('password','checklength','密码要在5-12位之间!!!',1,'callback'),
            // array('code','nonull','用户名不能为空',2,3),
            );
        

        $pass = md5(I('post.password','','string'));
        $password =md5(I('post.passwd','','string'));
        $username=I('post.username','','string');
        $code = strtoupper(I('post.code'));
        // 获得数据库信息
        $userdata  = $this->where("username='{$username}'")->find();
        // 判断用户是否存在
        if($userdata){
            $this->error="用户名已存在";return false;
        }
        
        // 判断密码是否一致
        if($pass != $password){
            $this->error='两次密码输入不一致';
        }
        // 判断验证码
        $code = I('post.code','','string');
		if(!check($code)){$this->error='验证码不正确';return false;}
        // 判断是否统一条款
        if(!isset($_POST['clause'])){
            $this->error='您还没有同意条款';return false;
        }
        if(!$this->create()) return false;
        $this->data['password']=$pass;
        // 添加用户表
        $this->add($this->data);
        
        return true;
    }

	
    
}