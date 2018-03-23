<?php
/**
* 个人中心
*/
namespace Home\Controller;
use Home\Controller\AuthController;
class ProtectedController extends AuthController
{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['username'])||!isset($_SESSION['uid'])){
            $this->redirect('Home/Index/index');
        }
        $this->model=D("Protected");
    }



    public function index(){
        $uid = session('uid');
        $notUid = $this->model->where("user_uid={$uid}")->find();
        $this->assign('notUid',$notUid);
        
        $this->display();
    }

    /**
     *修改信息
     */
    public function edit(){
        
        if(IS_POST){
            // 实例化上传类
            $upload = new \Think\Upload(array('rootPath'=>'./Uploads/App/'));
            // upload 方法返回的是一个文件上传的路径
            $uplofiles = $upload->upload();
            $uid = session('uid');
            // 获得当前数据  为了用户不是上传图片的时候
            $notUid = $this->model->where("user_uid={$uid}")->find();
            // 为了不保留垃圾图片  用户更换的的图片 会被删除
            // 判断是否上传了 图片  如果上传了 就删除之前的图片
            // 没有上传 就使用当前图片
            if($uplofiles){
              file_exists($notUid['thumb'])&&unlink($notUid['thumb']);
              $_POST['thumb'] ='Uploads/App/'.$uplofiles['thumb']['savepath'].$uplofiles['thumb']['savename'];
            }else{
              $_POST['thumb'] = $notUid['thumb'];
            }
            $this->model->where("user_uid={$uid}")->save($_POST);
            $this->success('修改成功',U('index'));
          }
    }



    public function editPass(){
        if(IS_AJAX){
            
           if(empty($_POST['oldpassword'])){echo 1;die;}
           if(empty($_POST['password'])){echo 2;die;}
           if(empty($_POST['passwd'])){echo 3;die;}
           // 获得就密码数据
           $uid = session('uid');
           $oldData = D('User')->where("uid={$uid}")->find();
           $oldpass = $oldData['password'];
           if($oldpass!=md5($_POST['oldpassword'])){echo 4;die;}
           if($_POST['password']!=$_POST['passwd']){echo 5;die;}
           if(strlen(trim($_POST['password']))<6){echo 6;die;};
           $newpass = md5($_POST['password']);
           D('User')->where("uid={$uid}")->save(array('password'=>$newpass));
           unset($_SESSION['username']);
           unset($_SESSION['uid']);
          
           
        }
        $this->display();
    }








}