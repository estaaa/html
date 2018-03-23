<?php
/**
 * 用户父级控制器
 * 可以用来保存一些公用的方法
 */
class CommonController extends Controller{
       /**
        * 获取顶级目录菜单
        * 
        */
       protected function  topCate(){
          // 累积提问数
          $cont = M('er')->query("SELECT COUNT(*) FROM hd_ask");
          $cont = $cont[0]['COUNT(*)'];
          // p($cont);
          $this->assign('cont',$cont);
          $topCate = M('category')->query('SELECT * FROM hd_category where pid=0');
          // p($topCate);
          $this->assign('topCate',$topCate);
       }
       /**
        * [判断用户是否存在]
        * 
        */
       protected function isSession(){
           
          if(isset($_SESSION['name'])){
                $username = $_SESSION['name'];
                $userpost = M('category')->query("SELECT * FROM hd_user where username='{$username}'");
                // 把数组变为一维数组
                $userpost=current($userpost);
                // 求采纳率  采纳数/回答数*100
                if($userpost['answer']!=0){
                      $rate = round($userpost['accept']/$userpost['answer']).'%';
                      // 把采纳率压入数组
                      $userpost['rate']=$rate;
                     // p($userpost);
                      
                  }else{
                      $userpost['rate']='0%';
                     
                      
                  }
           $this->assign('user',$userpost);
           $this->assign('user',$userpost);       
            
          }
               
   }
   /**
    * 判断是否登陆
    * @return [type] [description]
    */
  protected function islogin(){
    if(!isset($_SESSION['name'])){
      $this->success('登录才可以访问哦',__APP__);
    }
  }
  /**
   * 个人信息
   * @return [type] [description]
   */
   protected function userprivate(){
        if(isset($_SESSION['uid'])){
              $userid = $_SESSION['uid'];
              // 查找信息
              $userData = M('er')->query("SELECT * FROM hd_user WHERE uid={$userid}");
              $userData = current($userData);
              if($userData['answer']!=0){
                  // 计算采纳率
              $userData['cai']=round($userData['accept']/$userData['answer']).'%';
             
             }else{
                $userData['cai']='0';
             }
               // 计算提问数 和回答数
              $da = M('us')->query("SELECT count(*) FROM hd_answer where uid={$userid}");
              $userData['da']=isset($da[0]['count(*)'])?$da[0]['count(*)']:0;
              $da = M('wen')->query("SELECT count(*) FROM hd_ask where uid={$userid}");
              $userData['wen']=isset($da[0]['count(*)'])?$da[0]['count(*)']:0;
              $this->assign('userr',$userData);
              // 抓取提问数据
              $wendata = M("ewe")->query("SELECT * FROM hd_ask as s join hd_category as c WHERE s.uid={$userid} and s.cid=c.cid");
              $this->assign('wendata',$wendata);
              // 抓取我的回答数据
              $dadata = M('er')->query("SELECT * FROM hd_answer where uid={$userid}");
              $this->assign('dadata',$dadata);
              // p($dadata);
               // 获得数据库路径
              $v=M('wer')->query("SELECT face FROM  hd_user  WHERE uid={$userid}");
              $v = isset($v[0]['face'])?$v[0]['face']:0;
              // 分配变量
              $this->assign('path',$v);
           }
          
          
   }
   // 右侧信息
   protected function rightnew(){
      // 获得待解决问题数据
      $noselv = M('category')->query('SELECT * FROM hd_ask where solve=0 limit 7');
      $this->assign('noselv',$noselv);
      // 悬赏金币高的数据
      $more = M('categroy')->query("SELECT * FROM hd_ask where reward>=20 order by reward desc");
      // p($more);
      $this->assign('more',$more);
      // 获得今日回答问题最多的一个
      $time =strtotime(date('Y-m-d'));
      $timer = time();
      $moreDay = M('er')->query("SELECT max(time),u.answer,u.username,u.accept,u.face FROM hd_answer as a join hd_user as u on a.uid=u.uid WHERE a.time>{$time}");
      $moreDay = current($moreDay);
      if($moreDay['accept']!=0){
         $moreDay['cai']=round($moreDay['accept']/$moreDay['answer'])."%";
       }else{
        $moreDay['cai']="0%";
       }
      
      $this->assign('moreDay',$moreDay);
      // 获取历史回答最多
      $oldDay = M('er')->query("SELECT max(time),u.answer,u.username,u.accept,u.face FROM hd_answer as a join hd_user as u on a.uid=u.uid WHERE a.time<{$time}");
      $oldDay = current($oldDay);

      if($oldDay['accept']!=0){
         $oldDay['cai']=round($oldDay['accept']/$oldDay['answer'])."%";
       }else{
        $oldDay['cai']="0%";
       }
       // 获得助人最多的
      $maxask = M('category')->query('SELECT * FROM hd_user order by accept desc limit 3');
      $this->assign('maxask',$maxask);
      // p($maxask);
   }
}