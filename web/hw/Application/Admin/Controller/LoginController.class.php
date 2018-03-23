<?php
/**
* 登陆控制器
*/
class LoginController extends Controller
{
    private $model;

    public function __init(){
        $this->model=K('User');
        // echo md5('admin11');
    }

    public function index(){
        
       
        $this->display();
    }
    /**
     * 登陆验证
     */
    public function login(){
        if(IS_POST){
            if(!$loginData=$this->model->Vlogin(0)){
                $this->error($this->model->error);
            }
          
            $_SESSION['adminname']=$loginData['username'];
            $_SESSION['adminuid']=$loginData['uid'];
            $this->success('登陆成功',U('Admin/Index/index'));
        }
    }


    /**
     * 实例化验证码
     */
    public function code(){
        $obj = new Code();
        $obj->show();
    }    






}