<?php
class LoginController extends Controller{
      // 保存数据库路径
  private $login_path;
  // 保存数据库信息
  private $login_data;
  public function __construct(){
    $this->login_path = ROOT_PATH."/login_data.php";
    $this->login_data = include $this->login_path;
  }
  /*
  *註冊處理
   */
    public function index(){
    
    if(!empty($_POST['enroll_name'])&&!empty($_POST['pass'])&&!empty($_POST['passed'])){
        foreach($this->login_data as $v){
          if($v['enroll_name']==$_POST['enroll_name']){
            echo 3;
            return;
          }
        }
        $_POST['pass']=md5($_POST['pass']);
        $_POST['passed']=md5($_POST['passed']);
        if($_POST['pass']==$_POST['passed']){
            $this->login_data[] =$_POST;
            data_to_file($this->login_data, $this->login_path);
            echo json_encode($_POST);
            return;
        }
            echo 0;  
            return; 
      }    
      echo 1;
    }
    /*
    *登陸處理
     */
    public function login(){
       if(!empty($_POST['log_name'])&&!empty($_POST['pass'])){
            // 登陸
            foreach($this->login_data as $v){
                if($v['enroll_name']==$_POST['log_name']&&$v['pass']==md5($_POST['pass'])){
                  $_SESSION['uname'] = $v['enroll_name'];
                  if(isset($_POST['auto'])){
                     setcookie(session_name(),session_id(),time() + 3600 * 24 * 7, '/');
                    }else{
                       setcookie(session_name(),session_id(),0,'/');
                    }
                    echo 2;
                    return;
                }
                echo 0;
                return;
            }
            // 判斷密碼是否正確
        return;
       }
       echo 1;
    }
    // 清除密碼
    public function closed(){
      session_unset();
    session_destroy();
    echo 1;
    }


  /*  public function delenum(){
      unset($this->login_data[$_POST['delenum']-1]);
      echo 
      data_to_file($this->login_data, $this->login_path);
    }*/
}