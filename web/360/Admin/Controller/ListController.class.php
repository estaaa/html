<?php
/**
* 后台管理控制器
*/

class ListController extends CommonController
{
  public function __construct(){
      parent::__construct();
      if(!isset($_SESSION['uname'])){
        $this->success('您还没有登录 没有权限访问',__ROOT__."/admin.php");
      }
  }
  public function index(){
    $timer = time();
    $this->assign('timer',$timer);
    $this->display();
  }
  public function closed(){
    session_unset();
    session_destroy();
    $this->success('退出成功',__APP__."/admin.php");
  }
  /**
   * 载入欢迎页面
   * 
   */
  public function welcome(){
    $data = $_SERVER;
    // 获得运行环境
    $data['huanjing']=php_sapi_name();
    // 获得服务器信息
    $data['shuju']=mysql_list_dbs();
    // 获得用户登录时间
    $name = $_SESSION['uname'];
    $usertime = M('ER')->query("SELECT * FROM hd_admin where username='{$name}'");
    $this->assign('usertime',$usertime);
    $this->assign('data',$data);
    // p($data);
    $this->display();
  }
  /**
   * 用户的列表*****************************************************************
   * 
   */

  public function user_list(){
    // 获得用户表
    $userform = M('er')->query("SELECT * FROM hd_user");

    $this->assign('userform',$userform);
    if(isset($_GET['uid'])){
        $uid = $_GET['uid'];
        M('ER')->exec("DELETE FROM hd_user WHERE uid={$uid}");
    }
    $this->display();
  }

  /**
   * 问题管理 *********************************************************************
   * 所有提问
   * 
   */
  public function ask(){
    $userAsk = M('er')->query("SELECT * FROM hd_ask");
    $this->assign('userAsk',$userAsk);
    // p($userAsk);
    $this->del();
    $this->display();
  }
  /**
   * 未解决提问
   * 
   */
  public function notask(){
    $notask = M('er')->query("SELECT * FROM hd_ask WHERE solve=0");
    $this->assign('notask',$notask);
     $this->del();
    $this->display();

  }
  /**
   * 已经解决的提问
   *
   */
  public function okask(){
    $okask = M('er')->query("SELECT * FROM hd_ask WHERE solve=1");
    $this->assign('okask',$okask);
     $this->del();
    $this->display();
  }
  /**
   * 0回答的提问
   * 
   */
  public function notanswer(){
    $notanswer = M('er')->query("SELECT * FROM hd_ask WHERE answer=0");
    $this->assign('notanswer',$notanswer);
    $this->del();
    $this->display();
  }
  /**
   * 回答管理*****************************************************************
   * 所有的回答***************************************************************
   */
  /*
  *删除函数
   */

  public function answer(){
    $answerfrom = M('er')->query("SELECT * FROM hd_answer");
    $this->assign('answerfrom',$answerfrom);
    // 删除函数
    $this->del();
    // p($answerfrom);
    $this->display();
  }
  /**
   * 未采纳的回答
   */
  public function notokanswer(){
    $notokanswer = M('er')->query("SELECT * FROM hd_answer WHERE accept=0");
    $this->assign('notokanswer',$notokanswer);
    $this->del();
    $this->display();
  }
  /**
   * 已采纳回答
   */
  public function okanswer(){
    $okanswer = M('er')->query("SELECT * FROM hd_answer WHERE accept=1");
    $this->assign('okanswer',$okanswer);
    $this->del();
    $this->display();
  }
  /**
   * 问题分类***************************************************************************
   */
  public function category(){
    // 首先遍历出顶级分类
    $topcate = M('ER')->query("SELECT * FROM hd_category WHERE pid=0");
    // 分配顶级分类  之后再遍历 分类
    // 先循环顶级分类
    $this->assign('topcate',$topcate);
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
        // 获得分类列表
        $catelist = M('ER')->query("SELECT * FROM hd_category");
        // 获得当前点击的分类数组
        $son=$this->soncate($catelist,$cid);
        // 判断当点击到最后一层时 提交的就是子分类 并赋值 让html判断
        if(empty($son)) $son=1;
        // 分配子级分类
        $this->assign('son',$son);
        // 判断 当$son不为空时 提交的是当前分类是函数循环出来的父类  为空提交的是链接传递的cid子分类
        // 获得的$cid就是要添加的分类的父类pid
        if(IS_POST&&!empty($_POST['cate'])){
              if($son==1){
              $title = $_POST['cate'];
              
              M('ER')->exec("INSERT INTO hd_category(title,pid)VALUES('{$title}',{$cid})");
              }else{

               $title = $_POST['cate']; 
               M('ER')->exec("INSERT INTO hd_category(title,pid)VALUES('{$title}',{$cid})");
              }  
        }
    }

    $this->display(); 
  }
  /**
   * 修改顶级分类 和问题分类
   */
  public function add_top_cate(){
   
  
    // 修改问题分类
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
        if(IS_POST){
          $title = $_POST['title'];
          if(empty($title)) return $this->error('内容不能为空');
          M('ER')->exec("UPDATE hd_category SET title='{$title}' WHERE cid={$cid}");
          $this->error('修改成功');
        }
    }else{
         // 修改顶级分类
         if(IS_POST){
            if(empty($_POST['title'])) return $this->error('内容不能为空'); 
            $title = $_POST['title'];
            M('ER')->exec("INSERT INTO hd_category(title,pid)VALUES('{$title}',0)");
            $this->error('添加成功');
         }
    }

    $this->display();
  }




/*
*每次点击分类 调用此函数
**/
  public function soncate($list,$cid){
    $son = array();
    foreach($list as $v){
        if($v['pid']==$cid){
            $son[]=$v;

        }
      }
      return $son;

  }
  /**
   * 金币设置***********************************************************************************************
   * 
   */
  public function rule_point(){
    $this->display();

  }
  /**
   * 经验设置
   * 
   */
  public function rule_level(){
    $this->display();

  }
  /**
   * 系统信息******************************************************************************************************
   */
  public function web_set(){
   
    $this->display();
  }
/**
 * 修改密码
 */
public function passwd(){
  if(IS_POST){
        if(empty($_POST['passwdF'])||empty($_POST['passwdS'])) return $this->error('信息不全');
        if($_POST['passwdF']!=$_POST['passwdS']) return $this->error('两次密码输入不一致');
        $name = $_SESSION['uname'];
        $pass = md5($_POST['passwdF']);
        M('er')->exec("UPDATE hd_admin SET passwd='{$pass}' WHERE username='{$name}'");
        $this->error('修改成功');
    }
  $this->display();
}
// 后台用户管理***********************************************************************************
public function admin_list(){
  $adminfrom = M('er')->query("SELECT * FROM hd_admin");
  $this->assign('adminfrom',$adminfrom);
    // 删除后台用户
  if(isset($_GET['aid'])&&!empty($_GET['aid'])){
    $adminid=$_GET['aid'];
    M('er')->exec("DELETE from hd_admin WHERE aid={$adminid}");
      
  }
  $this->display();
}
/**
 * 添加后台用户
 */
public function add_admin(){
  /**
   * 添加后台用户 和修改后台用户
   */
  if(IS_POST){
        if(empty($_POST['username'])||empty($_POST['passwdF'])||empty($_POST['passwdS'])) return $this->error('信息不全');
        if($_POST['passwdF']!=$_POST['passwdS']) return $this->error('两次密码输入不一致');
        $name = $_POST['username'];
        $pass = md5($_POST['passwdF']);
        if(isset($_GET['aid'])){
          $aid =$_GET['aid'];

          M('er')->exec("UPDATE hd_admin SET username='{$name}',passwd='{$pass}' WHERE aid={$aid}");
          $this->error('修改成功');
        }else{
          M('er')->exec("INSERT INTO hd_admin(username,passwd)VALUES('{$name}','{$pass}')");
          $this->error('添加成功');
        }
        
  }

  // if()
  // p($_POST);
  $this->display();
}











}