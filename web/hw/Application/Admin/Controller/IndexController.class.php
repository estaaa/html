<?php
//测试控制器类
class IndexController extends AuthController{
    //动作方法
    public function index(){
        // p($_SESSION['adminname']);
        //显示视图
        $this->display();
    }
    // 头部模块
    public function top(){
        $this->display();
    }
    // 左侧
    public function left(){
        $this->display();
    }
    // 欢迎
    public function welcome(){
        $time = time();
        $this->assign('time',$time);
        $this->display();
    }

    public function close(){
        unset($_SESSION['adminuid']);
        unset($_SESSION['adminname']);
        go(U('Admin/Login/index'));
    }
}
