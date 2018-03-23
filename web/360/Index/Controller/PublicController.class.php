<?php 
/**
 * 登录和注册管理控制器
 */
class PublicController extends Controller{
   private $model;
   public function __construct(){
       $this->model=M('hd_user');
   }
   // 注册额验证
	public function eroll(){
      // 如果post提交执行
            $username=htmlspecialchars(addslashes($_POST['username']));
            $pwd=md5(htmlspecialchars(addslashes($_POST['pwd'])));
            $pwded=md5(htmlspecialchars(addslashes($_POST['pwded'])));
         // 表单数据不为空的时候
         if(!empty($username)&&!empty($pwd)&&!empty($pwded)){
            // 把名字复制给$name
            $name = $username;
            // 查找名字 
            $data = $this->model->where("username='{$name}'")->find();
            if($data['username']==$username){
               $this->success('用户名已存在',__APP__);
            }
          
                  if((mb_strlen($username))>15){
                    $this->success('您输入的名字太长了  请输入10个字符以下',__APP__);
                   
                    die;
                  }
                  if((mb_strlen($username))<6){
                     $this->success('您输入的名字太短了  请输入10个字符以下',__APP__);
                    die;
                  }
                  $um = "/^[a-z]*$/";
                  $ubool = preg_match($um,$username);
            //      var_dump($ubool);
                  if($ubool){
            //        echo "账号必须是小写字母";
                  }else{
                     $this->success('账号必须是小写字母',__APP__);
                    die;
                  }
           

            // 验证密码
                  $pass =$pwded;
                  $pa = "/\S/";
                  $pbool = preg_match($pa,$pass);
            //      var_dump($ubool);
                  if($pbool){
            //        echo "账号必须是小写字母";
                  }else{
                     $this->success('账号必须是小写字母',__APP__);
                    die;
                  }
                
                  if(mb_strlen($pass)<5){
                     $this->success('您输入的密码太短了  请输入5个字符以上',__APP__);
                    die;
                  }
                
           
             


            if($pwd==$pwded){
               $mydata = array( 
                  'username'=>$username,
                  'passwd'=>$pwd
                     );
                  // p($_POST);
                  if(strtoupper($_POST['verify'])==$_SESSION['code']){
                      $mydata['restime']=time();
                      // p($mydata);
                      $this->model->add($mydata);
                   $this->success('注册成功',__APP__);
                }else{
                  $this->success('验证码错误',__APP__);
                }
                 
            }else{
               $this->success('两次密码不一致',__APP__);
            }

         }else{
            $this->success('内容填写不完整',__APP__);
         }
      
       // p($_POST);
   }
   // 登陆验证
   public function login(){
      if(IS_POST){
         $name = $_POST['account'];
         $pass =md5($_POST['pwd']);
         $data = $this->model->where("username='{$name}'")->find();
         // p($data);
         if($data['username']!=$name){
            $this->success('用户名不存在',__APP__);
         }
         if($data['username']==$name){
            if($data['passwd']!=$pass){
               $this->success('密码错误',__APP__);
            }else{
              $_SESSION['name'] = $name;
               $a = M('hd_user')->where("username='{$name}'")->find();
                $logintime = time();
                $_SESSION['uid']=$a['uid'];
                $iipp=$_SERVER["REMOTE_ADDR"];
                // var_dump($iipp);
                $loginip=$_SESSION['uid'];
              
                M('er')->exec("UPDATE hd_user SET logintime={$logintime},loginip='{$iipp}' WHERE uid={$loginip}");
              isset($_POST['auto']) ? setcookie(session_name(), session_id(), time() + 3600 * 24 * 7, '/') : setcookie(session_name(), session_id(), 0, '/');
                $this->success('登陆成功',__APP__);
            }
         }
      }
      // $this->success('登陆成功',__APP__);
   }

   public function close(){
    session_unset();
    session_destroy();
    $this->success('退出成功',__APP__);
   }




}

 ?>