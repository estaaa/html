<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
       if(IS_POST){
            $user = D('User');
            if(!$user->userAdd()){$this->error($user->getError());}
            $this->redirect('Admin/Index/index');
        }
        $this->show();
    }

    public function code(){
        $Verify = new \Think\Verify();
        $Verify->length   = 1;
        $Verify->entry();
    }

    
}