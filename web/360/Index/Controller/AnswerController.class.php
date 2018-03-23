<?php
/**
* 回答控制器
*/
class AnswerController extends CommonController
{
   /**
    * 分配信息
    * 
    */
  public function index(){
      // 获得顶级分类
      $this->topCate();
      $this->userprivate();
      
      // 获取问题id
      $userask = isset($_GET['asid'])?(int)$_GET['asid']:0;
      // p($userask);
      // 获得提问用户信息
      $this->userform($userask);
      // p($this->userform($userask));
      // 获取用户回答的问题********************************************
      $this->usdata($userask);
      
      // 采纳答案******************************************
      // 1如果get参数uid存在 就修改满意参数为1
      $issolve=M('er')->query("SELECT * FROM  hd_ask  WHERE  asid={$userask}");

      $issolve = current($issolve);
      // 分配变量 判断采纳的显示和隐藏
      $this->assign('issolve',$issolve);
      if(isset($_GET['uid'])){
        // 获得的是提问的uid
         $a = $_GET['uid'];
         // 是回答的uid
         $b=$_GET['cuid'];

        if($issolve['uid']==$_SESSION['uid']){
          // p($issolve);
            // 添加采纳满意
            M('er')->exec("UPDATE hd_answer SET accept=1 WHERE asid={$userask} and uid={$b}");
            M('er')->exec("UPDATE hd_ask SET solve=1 WHERE asid={$userask}");
            M('et')->exec("UPDATE hd_user SET accept=accept+1 WHERE uid={$a}");
            // 添加采纳金币
            $poit =$this->userform($userask);
            $poit = $poit['reward'];
            M('et')->exec("UPDATE hd_user SET point=point+{$poit}+5,exp=exp+3 WHERE uid={$b}");
            $this->success('采纳成功',__APP__."?c=answer&asid={$userask}");
        }

      }
      // 获得满意答案
      $this->okask($userask);
       // *******************************************************************
     // 判断满意用户id是否存在
     $this->isokask($this->okask($userask));
     // 载入模版**************************************************************
     // 查找关联问题
     $anddata = M('er')->query("select * from hd_user as u join hd_ask as s on u.uid=s.uid where s.cid={$userask}");
     // 右侧信息
     $this->rightnew();
     $this->assign('anddata',$anddata);
      $this->display();
  }
  /**
   * ajax 判断回答
   *
   */
  public function answer(){
         // p($_POST);
         $data = $_POST;
         if(empty($data['content'])){echo 1;return;};
         if(empty($data['asid'])){echo 2;return;};   
         if(empty($_SESSION['uid'])){echo 3;return;};
         // 添加回答问题数目
         $uid = $_SESSION['uid'];

         $asid=$data['asid'];
         $chong= M('er')->query("select uid from hd_ask where asid={$asid}");
         // p($chong);
         if($chong[0]['uid']==$uid){echo 5;return;};
         // 判断是否回答过该问题
         $bbss=M('er')->query("select * from hd_answer where asid={$asid} and uid={$uid}");
         $bbss = current($bbss);
         if($bbss){echo 4;return;}
         // 添加回答数和用户回答次数
         M('er')->exec("UPDATE hd_ask SET answer=answer+1 WHERE asid={$asid}");
         M('er')->exec("UPDATE hd_user SET answer=answer+1 WHERE uid={$uid}");
         // 添加回答金币和经验和回答
         M('er')->exec("UPDATE hd_user SET point=point+1,exp=exp+3 WHERE uid={$uid}");
         $time = time();
         // 添加时间
         $data['time']=date('Y-m-d H:i:s');
         // 获取回答用户id
         $data['uid']=$_SESSION['uid'];
          // 此数组是要插进数据库的内容 不能放在下面
          // ******************************************
          $postdata = $data;
          $postdata['time']=time();
          // ******************************************
         // 查找回答用户的头像图片
         $answerimg=M('er')->query("SELECT * FROM hd_user where uid={$data['uid']}");
         // 判断头像是否为空/Images/noface.gif
         if($answerimg[0]['face']==''){
            $data['img']="noface.gif";
         }else{
            // 截取从右边数的'/'符号到最后 然后在删除是'/'的符号
            $a = trim(strrchr($answerimg[0]['face'],'/'),'/');
            $data['img']=$a;
         
         }
         
        

         // p($a);
         echo json_encode($data);
         M('hd_answer')->add($postdata);
         
         
      
      
  }
  /**
   * 获得提问用户信息
   * @param  [type] $userask [num]
   * @return [type]          [array]
   */
  private function  userform($userask){
      // 获得用户信息*********************************************************
      // $userdata = M('tryrtyrsk')->query("SELECT * FROM hd_ask AS s JOIN hd_user AS u ON s.uid=u.uid JOIN hd_category as c on s.asid=c.cid having s.cid={$userask};");
      $userdata = M('tryrtyrsk')->query("SELECT * FROM hd_ask AS s JOIN hd_user AS u ON s.uid=u.uid having asid={$userask}");
      // 变为一维数组
      $userdata=current($userdata);
      // p($userask);
      // 分配用户信息
      $this->assign('user',$userdata);
      
      // 获得用户的asid*********************************************************************
      $cid=$userdata['cid'];
      // 获得表结构
      $morecategroy=M('er')->query("SELECT * FROM hd_category");
      // 进行递归  返回面包屑菜单数组
      $morecategroy=$this->getFather($morecategroy,$cid);
      // 进行数组倒叙
      $morecategroy = array_reverse($morecategroy);
      // p($morecategroy);
      // 分配变量
      $this->assign('morecategroy',$morecategroy);
      return $userdata;
  }
  /**
   * 获得回答答案的问题
   * @param  [type] $userask [num]
   * @return [type]          [array]
   */
  private function  usdata($userask){
      // 获取用户回答的问题********************************************
      $usdata = M('ero')->query("SELECT * FROM hd_ask as s JOIN hd_answer AS a ON a.asid=s.asid join hd_user as u on a.uid=u.uid having a.asid={$userask}");
      // p($usdata);
      
      $usdata=array_reverse($usdata);
      $this->assign('usdata',$usdata);
      // 统计回答数目************************************************
      $lenth = count($usdata);
      $this->assign('leng',$lenth);
      return $usdata;
  }
  /**
   * 获得满意答案
   * @param  [type] $userask [num]
   * @return [type]          [array]
   */
  private function okask($userask){
      //2 获得满意答案
      $okask = M('et')->query("SELECT * FROM hd_ask as s JOIN hd_answer AS a ON a.asid=s.asid having a.asid={$userask} and accept=1");
      $okask = current($okask);
      $a = $okask['uid'];

      
       // p($okask);
      if($a){
        $img = M('er')->query("SELECT * FROM hd_user WHERE uid={$a}");
        $okask['img']=$img[0]['face'];
        $data = M('et')->query("SELECT * FROM hd_user where uid={$a}");
        if($data[0]['answer']){
             $okask['meau']=round($data[0]['accept']/$data[0]['answer']*100);
         }else{
            $okask['img']='';
            $okask['meau']=0;
         }
      }
         

         
       
       $this->assign('okask',$okask);
       return $okask;
  }
  /**
   * 获得满意答案用户ID
   * @param  [type] $okask [array]
   * @return [type]        [description]
   */
  private function   isokask($okask){
      // 获得满意答案用户ID
      if(isset($okask['uid'])){
         $uid = $okask['uid'];
         $manyi = M('eer')->query("SELECT * FROM hd_user WHERE uid={$uid}");
         $manyi=current($manyi);
         $this->assign('manyi',$manyi);
      }
  }


    private function getFather($data,$cid){
        // 创建一个空数组 用来保存数据的
        $temp = array();
        foreach ($data as $v) {
            if($v['cid'] == $cid){
                $temp[] = $v;
                $temp = array_merge($temp,$this->getFather($data, $v['pid']));
            }
        }
        return $temp;
    }

}