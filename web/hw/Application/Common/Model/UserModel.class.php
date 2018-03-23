<?php
/**
* 用户表
*/
class UserModel extends Model
{
    public $table='user';

    // 自动验证
    public $validate = array(
        array('username','nonull','用户名不能为空',2,3),
        array('password','nonull','密码不能为空',2,3),
        array('code','nonull','验证码不能为空',2,3),
        // array('code','nonull','用户名不能为空',2,3),
        );
    public $auto = array(
        array('addtime','time','function',2,1),
        );
    /**
     * 登陆验证
     */
    public function Vlogin($num){

        if(!$this->create()) return false;
        // 获得信息
        $adminname = Q('post.username');
        $passwd    = md5(Q('post.password'));
        $code      = strtoupper(Q('post.code'));
        // 判断验证码
        if($_SESSION['code'] != $code){
            $this->error="验证码错误";return false;
        }
        // 获得数据库信息
        $userdata  = $this->where("username='{$adminname}'")->find();
        // 判断用户是否存在
        if(!$userdata){
            $this->error="用户名不存在";return false;
        }
        // 判断密码和用户名是否存在
        // 因为后台比较重要 提示应该模糊
        
        if($userdata['username']!=$adminname || $userdata['password'] != $passwd){
            $this->error="用户名或者密码错误";return false;
        }
        // 判断是前台登陆还是后台登陆
        if($num==0){
            // 判断是否是后台用户
            if($userdata['is_admin'] !=1){
                $this->error="您没有权限访问";return false;
            }
        }
        // 判断是不是锁定用户
        if($userdata['is_lock']==1){
            $this->error='你已经被锁定 没有权限进行此操作';return false;
        }

        
        $uid=$userdata['uid'];
        
        // 更新登陆时间
        $this->where("uid=$uid")->update(array('logtime'=>time()));
        // 判断前台7天登陆
        if($num==1){
            isset($_POST['auto'])? setcookie(session_name(),session_id(),time()+3600 * 24 * 7, '/'): setcookie(session_name(),session_id(),0,'');
        }
        return $userdata;
    }
    public function Vlogon(){

        // 自动验证
        $this->validate = array(
            array('username','nonull','用户名不能为空',2,3),
            array('password','nonull','密码不能为空',2,3),
            array('passwd','nonull','确认密码不能为空',2,3),
            array('code','nonull','验证码不能为空',2,3),
            array('username','user:6,20','用户名必须大于 5 小于 20',2,3),
            array('password','minlen:5','密码长度最少为6位',2,3),
            // array('code','nonull','用户名不能为空',2,3),
            );
        

        $pass = md5(Q('post.password'));
        $password =md5(Q('post.passwd'));
        $username=Q('post.username');
        $code = strtoupper(Q('post.code'));
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
        if($_SESSION['code'] != $code){
            $this->error="验证码错误";return false;
        }
        // 判断是否统一条款
        if(!isset($_POST['clause'])){
            $this->error='您还没有同意条款';return false;
        }
        if(!$this->create()) return false;
        $this->data['password']=$pass;
        // 添加用户表
        $this->add();
        
        return true;
    }
}