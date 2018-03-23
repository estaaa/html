<?php
/**
 * 继承用户类的控制器  
 * 
 */
class IndexController extends CommonController{
  
   /**
    * 调用框架里面的方法   
    * 如果在这里直接使用会替代父级的方法 
    */
   public function __construct(){

      parent::__construct();

   }

   /**
    * 把顶级菜单循环出来 
    * 载入父级方法$this->diaplay()
    * 分配变量
    * 
    */
   public function index(){
      $this->userprivate();
      // 获取所有顶级菜单
      $cate = M('category')->query('SELECT * FROM hd_category WHERE pid=0');
      
      // 循环顶级菜单
      foreach ($cate as $k=>$v){
        // 找到二级目录 压进原来数组
        $cate[$k]['son']=M('category')->query("SELECT * FROM hd_category WHERE pid={$v['cid']}");
      }
      // p($cate);
      $this->assign('cate',$cate);
      // 调用顶级分类
      $this->topCate();
      // 判断session
      $this->isSession();
      // 右侧信息
      $this->rightnew();


      // 载入模版
      $this->display();
  }
    /**
     *实例化验证码
     */
    public function code(){
       $obj = new Code();
       // 调用工具类验证码类的函数
       $obj->show();
    }


















}
?>