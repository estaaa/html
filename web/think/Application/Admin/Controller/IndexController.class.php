<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class IndexController extends CommonController {
    public function index(){
        $this->show();
    }

    public function top(){
        $this->show();
    }

    public function welcome(){
        $time = time();
        $this->assign('time',$time);
        $this->show();
    }

    public function left(){
        $this->show();
    }
}