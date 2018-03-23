<?php
namespace Home\Controller;
use Home\Controller\AuthController;
class LoginController extends AuthController {
    public function __construct(){
        parent::__construct();
        $this->model=D('User');
    }
    /**
     * 登陆页面
     * @return [type] [description]
     */
    public function index(){
        if(IS_POST){
            if(!$this->model->userAdd(1)){
                $this->error($this->model->getError());
            }
            // 获得用户uid
            $uid= $_SESSION['uid'];
            // 这里赋值uid 是为了能自动添加
            $_POST['user_uid']= $uid;
            $this->redirect('Home/Index/index');
        }
        
       $this->show();
    }


    /**
     * 验证码 是保存到session中
     * @return [type] [description]
     */
    public function code(){
        $Verify = new \Think\Verify();
		$Verify->length   = 1;
        $Verify->entry();
    }


    /**
     * 注册页面
     * @return [type] [description]
     */
    public function logon(){
    	if(IS_POST){
            if(!$this->model->Vlogon()){
                $this->error($this->model->getError());
            }
            
            $this->success('注册正在前往首页',U('Home/Index/index'));
        }
        $this->show();
    }
}