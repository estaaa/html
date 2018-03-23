<?php
/**
 * 分类管理控制器
 */
class CategoryController extends CommonController{

       /**
        * 载入列表页
        * @return [type] [description]
        */
       public function index(){
          $this->userprivate();
          // 获得子分类   是为了 按分类查找页面下的数据
          $cid = (int)$_GET['cid'];
          $sonData = M('category')->query("SELECT * FROM hd_category WHERE pid={$cid}");
          // 判断当$sonData为空的时候 就是点解分类不显示了的时候
          if(empty($sonData)){
            // 获得当前分类的pid
            $pid = M('category')->query("SELECT pid FROM hd_category WHERE cid={$cid}");
            $pid = $pid[0]['pid'];
            //按照pid查找子分类  要先在为空的时候还显示原有页面  
            //所以必须查询得到当前页面 的数据  当点击的时候还是显示当前页面
            $sonData = M('category')->query("SELECT * FROM hd_category WHERE pid={$pid}");
         
          }

          // 分配变量
          // 可以在 按分类查找 里面应用程序了
          $this->assign('sonData',$sonData);
          // 面包屑菜单
          $data = M('category')->query("SELECT * FROM hd_category");
          // 调用递归方法
          $fatherData = $this->getFather($data,$cid);
          // 因为得到的数组是倒序的 所以要倒序
          $fatherData = array_reverse($fatherData);
          // p($fatherData);
          // 分配变量循环
          $this->assign('fatherData',$fatherData);
          
          $getList = isset($_GET['w'])?(int)$_GET['w']:0;

          switch ($getList) {
             case '0':
             $data = M('hd_ask')->query("SELECT * FROM  hd_ask AS ask JOIN hd_category as cate ON ask.cid=cate.cid WHERE solve=0 and ask.cid={$cid} ORDER BY reward DESC");
             break;
             case '1':
            $data = M('hd_ask')->query("SELECT * FROM  hd_ask AS ask JOIN hd_category as cate ON ask.cid=cate.cid WHERE solve=1 and ask.cid={$cid} ORDER BY reward DESC");
             break;
             case '2':
              $data = M('hd_ask')->query("SELECT * FROM  hd_ask AS ask JOIN hd_category as cate ON ask.cid=cate.cid WHERE reward>=20 and ask.cid={$cid} ORDER BY reward DESC");
             break;
             case '3':
             $data = M('hd_ask')->query("SELECT * FROM  hd_ask AS ask JOIN hd_category as cate ON ask.cid=cate.cid WHERE answer=0 and ask.cid={$cid} ORDER BY reward DESC");
            
             break;
          }
          // p($data);
          $this->assign('data',$data);
          // p($getList);
          // 右侧信息
          $this->rightnew();
          $this->topCate();
          // 判断是否是用户登录状态
          $this->isSession();
          // 显示模版
          $this->display();
       }


    /**
     * 获得父级
     * 原理 通过cid 找到相应的数组  
     * 压入数组 然后递归
     * 把找到的pid作为参数cid 一只找到顶级菜单
     * 
     */
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
