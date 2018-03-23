<?php
/**
* 用户管理控制器
*/
class UserController extends AuthController
{
   // 保存个人信息模型
   private $model;
  


   public function __init(){
        parent::__init();
        $this->model=K('protected');


   }

   /**
    * 前台用户
    */
   public function index(){
      // 搜索用户 如果有搜索 就走搜索 没有默认搜索全部用户
      if(!empty($_GET['con'])){
        $content = Q('get.con','','string');
        // 获得所有前台用户 和个人信息进行关联
        $where = "is_admin=0 AND username LIKE '%{$content}%'";
        $allUser = M('')->join('__user__ AS u JOIN __protected__ AS p ON u.uid=p.user_uid')->where($where)->all();

      }else{
        // 先获得数组的长度
        $allLen =  M('')->join('__user__ AS u JOIN __protected__ AS p ON u.uid=p.user_uid')->where("is_admin=0")->count();
        $this->assign('allLen',$allLen);
        // 实例化分页类 传入参数  总条数  要显示几个  有几个分页
        $pageobj = new Page($allLen,4,2);
        // 让其分页在html中显示
        $page = $pageobj->show(3);
        $this->assign('page',$page);
        // 得到截取位置
        $limit = $pageobj->limit();
        // 获得所有前台用户 和个人信息进行关联 并截取相应数组
        $allUser = M('')->join('__user__ AS u JOIN __protected__ AS p ON u.uid=p.user_uid')->where("is_admin=0  OR is_admin=3")->limit($limit)->all();
      
      }
      
      $this->assign('allUser',$allUser);
      // p($allUser);
      $this->display();
   }


   // 前台用户修改
   public function edit(){
      // 获得需要编辑的用户uid
      $uid = Q('get.uid',0,'intval');
      if(IS_POST){
        if(!$this->model->proEdit($uid)){
          $this->error($this->model->error);
        }
        $this->success('修改成功',U('index'));
      }
      
      $allUser = M('')->join('__user__ AS u JOIN __protected__ AS p ON u.uid=p.user_uid')->where("uid={$uid}")->find();
      
      $this->assign('allUser',$allUser);
      
      $this->display();
   }



   /**
    * 删除前台用户
    */
   public function del(){
      $uid = Q('get.uid',0,'intval');
      $this->model->where("user_uid={$uid}")->delete();
      K("User")->where("uid={$uid}")->delete();
      $this->success('删除成功 正在返回..........',U('index'));

   }

   /**
    * 锁定用户 和解锁
    */
   public function lock(){
      $uid = Q('get.uid',0,'intval');
      // 获得原数据
      $oldData = K('User')->where("uid={$uid}")->find();
      if($oldData['is_lock']==1){
        K('User')->where("uid={$uid}")->update(array('is_lock'=>0));
        $this->success('解锁成功',U('index'));
      }
      if($oldData['is_lock']==0){
        K('User')->where("uid={$uid}")->update(array('is_lock'=>1));
        $this->success('锁定成功',U('index'));
      }
  }

  /**
   * 前台用户信息
   */
  public function msg(){
    $uid = Q('get.uid',0,'intval');
    $allUser = M('')->join('__user__ AS u JOIN __protected__ AS p ON u.uid=p.user_uid')->where("uid={$uid}")->find();
    $this->assign('allUser',$allUser);
    $this->display();
  }


  /**
   *后台用户
   */
  public function adminIndex(){
    $allUser = K('User')->where("is_admin=1")->all();
    $this->assign('allUser',$allUser);
    // p($allUser);
    $this->display();
  }


  /**
   * 后台用户编辑
   */
  public function adminEdit(){
    if(isset($_GET['uid'])){
        $uid=Q('get.uid',0,'intval');
        // 获得旧数据
        $allUser = K('User')->where("is_admin=1 AND uid={$uid}")->find();
        $this->assign('allUser',$allUser);


        // 修改
        if(IS_POST){
          // 判断用户名是否被占用  先判断是否修改了用户名
          if($_POST['username']!=$allUser['username']){
            $username = $_POST['username'];
            // 查看管理员名字是否被占用
            $allUser = K('User')->where("username='{$username}' AND is_admin=1")->find();
            // p($allUser);
            // 如果存在 管理员姓名已存在
            if($allUser){
              $this->success('管理员名字已存在');
            }
          }
          // 判断管理员是否修改了密码 如果修改了 就进行验证
          // 如果新密码不等于服务器上的密码说明 是要修改
          if($_POST['password']!=$allUser['password']){
              if($_POST['password']!=$_POST['newpass']){
                $this->success('两次密码不一致');
              }
              if(strlen(trim($_POST['password']))<6){
                $this->success('密码长度最少6位');
              }
          }

          // 最后修改 
          K('User')->where("uid={$uid}")->update();
          $this->success('修改成功',U('adminIndex'));
        }


        $this->display();
    }else{
      $this->success('您访问的页面不存在',U('adminIndex'));
    }
  }



  public function admindel(){
    
   if(isset($_GET['uid'])){
           $uid=Q('get.uid',0,'intval');
           // 获得旧数据
           $allUser = K('User')->where("uid={$uid}")->delete();
           $this->success('删除成功');
    }else{
      $this->success('您访问的页面不存在',U('adminIndex'));
    }
  }






}