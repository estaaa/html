<?php
/**
* 用户管理控制器
*/
namespace Admin\Controller;
use Admin\Controller\CommonController;
class UserController extends CommonController
{
   // 保存个人信息模型
   private $model;
   public function __construct(){
        parent::__construct();
        $this->model=D('Protected');
	}

   /**
    * 前台用户
    */
   public function index(){
      // 搜索用户 如果有搜索 就走搜索 没有默认搜索全部用户
      if(!empty($_GET['con'])){
        $content = I('get.con','','string');
		$where = "is_admin=0 AND username LIKE '%{$content}%'";
        // 获得所有前台用户 和个人信息进行关联
        $allUser = $this->model->getAll($where);
//		获得总数量
        $allLen = $this->model->countAll($where);
        
		}else{
        // 先获得数组的长度
        $allLen = $this->model->countAll("is_admin=0");
        $pageobj = new \Think\Page($sonNum,$limit);
        // 让其分页在html中显示
        $page = $pageobj->show();
        $this->assign('page',$page);
        // 得到截取位置
        // 获得所有前台用户 和个人信息进行关联 并截取相应数组
        $allUser =M('User')->alias('u')->join('__PROTECTED__ AS p ON u.uid=p.user_uid')->where("is_admin=0  OR is_admin=3")->limit($limit)->select();
      
      }
      $this->assign('allLen',$allLen);
      $this->assign('allUser',$allUser);
      $this->display();
   }


   // 前台用户修改
   public function edit(){
      // 获得需要编辑的用户uid
      $uid = I('get.uid',0,'intval');
      if(IS_POST){
        if(!$this->model->proEdit($uid)){
          $this->error($this->model->getError());
        }
        $this->success('修改成功',U('index'));
      }
//    获得旧数据
      $allUser = $this->model->getOldData($uid);
      $this->assign('allUser',$allUser);
      $this->display();
   }



   /**
    * 删除前台用户
    */
   public function del(){
      $uid = I('get.uid',0,'int');
      $this->model->where("user_uid={$uid}")->delete();
      D("User")->where("uid={$uid}")->delete();
      $this->success('删除成功 正在返回..........',U('index'));

   }

   /**
    * 锁定用户 和解锁
    */
   public function lock(){
      $uid = I('get.uid',0,'intval');
      // 获得原数据
      $oldData = D('User')->where("uid={$uid}")->find();
      if($oldData['is_lock']==1){
        D('User')->where("uid={$uid}")->save(array('is_lock'=>0));
        $this->success('解锁成功',U('index'));
      }
      if($oldData['is_lock']==0){
        D('User')->where("uid={$uid}")->save(array('is_lock'=>1));
        $this->success('锁定成功',U('index'));
      }
  }

  /**
   * 前台用户信息
   */
  public function msg(){
    $uid = I('get.uid',0,'intval');
  	// 获得旧数据
    $allUser = $this->model->getOldData($uid);
    $this->assign('allUser',$allUser);
    $this->display();
  }


  /**
   *后台用户
   */
  public function adminIndex(){
    $allUser = D('User')->where("is_admin=1")->select();
    $this->assign('allUser',$allUser);
    $this->display();
  }


  /**
   * 后台用户编辑
   */
  public function adminEdit(){
    if(isset($_GET['uid'])){
        $uid=I('get.uid',0,'int');
        // 获得旧数据
        $allUser = D('User')->where("is_admin=1 AND uid={$uid}")->find();
        $this->assign('allUser',$allUser);
		// 修改
        if(IS_POST){
          if(!$this->model->adminEdit($uid)){
          	$this->error($this->model->getError());
          }
          $this->success('修改成功',U('adminIndex'));
        }
		 $this->display();
    }else{
      $this->success('您访问的页面不存在',U('adminIndex'));
    }
  }



  public function admindel(){
    
   if(isset($_GET['uid'])){
           $uid=I('get.uid',0,'int');
           // 获得旧数据
           $allUser = D('User')->where("uid={$uid}")->delete();
           $this->success('删除成功');
    }else{
      $this->success('您访问的页面不存在',U('adminIndex'));
    }
  }






}