<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['adminUid'])||!isset($_SESSION['adminName'])){
            $this->redirect('Admin/Login/index');
        }
    }
   




}