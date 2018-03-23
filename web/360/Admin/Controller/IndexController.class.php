<?php
class IndexController extends CommonController{
    public function index(){
       $this->display();
    }

    /**
     * 验证码
     */
    public function Code(){
        $code = new Code();
        $code->show();
    }
    // 登陆验证
    public function login(){
        if(IS_POST){
            // 查找数据库 匹配用户和密码
            $name = $_POST['userName'];
            $pass = md5($_POST['psd']);
            $userdata = M('er')->query("SELECT * FROM hd_admin WHERE username='{$name}'");
            if(!is_null($userdata)){
                //if($_SESSION['code']!=$_POST['verify']) return $this->success('验证码错误',__APP__);
                if($userdata[0]['username']==$name&&$userdata[0]['passwd']==$pass){
                    $data = $_SERVER;
                    M('er')->exec("UPDATE hd_admin set loginip='{$data['SERVER_ADDR']}' WHERE username='{$name}'");
                    $_SESSION['uname']=$name;

                    $this->success('登陆成功',__APP__."?c=list");
                }else{
                     $this->success('密码不对',__APP__);
                    }
            }else{
                $this->success('此用户不存在',__APP__);
            }
            
        }
    }









}
?>