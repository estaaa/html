<?php
/**
* 登陆控制器
*/
class LoginController extends Controller
{
    private $model;
    public function __init(){

        $this->model=K('user');
    }
    
    public function index(){
        // echo md5('admin');
        $this->display();
    }


    /**
     * 登陆页面
     */
    public function login(){
        if(IS_POST){
            if(!$loginData=$this->model->Vlogin(1)){
                $this->error($this->model->error);
            }
          
            $_SESSION['username']=$loginData['username'];
            $_SESSION['uid']=$loginData['uid'];
            // 获得用户uid
            $uid= $_SESSION['uid'];
            // 这里赋值uid 是为了能自动添加
            $_POST['user_uid']= $uid;
            // 初始化个人中心表
            // 在初始化前先判断该表 是否已经初始化
            // 如果不判断 每次登陆都会重复添加 
            $protectedData = K('Protected')->where("user_uid={$uid}")->find();
            if(!$protectedData){K('Protected')->add();}
            $this->success('登陆成功,正在前往首页',U('Index/Index/index'));
        }
        
    }
    /**
     *注册
     */
    public function logon(){
        if(IS_POST){
            if(!$this->model->Vlogon()){
                $this->error($this->model->error);
            }
            
            $this->success('注册正在前往首页',U('Index/Index/index'));
        }
        $this->display();
    }

    /**
     * 实例化验证码
     */
    public function code(){
        $obj = new code();
        $obj->show();
    }

}