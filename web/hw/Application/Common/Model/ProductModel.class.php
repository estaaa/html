<?php
/**
* 产品表
*/
class ProductModel extends Model
{
    
    public $table='product';
    
    public $validate = array(
        // array("p_code",'nonull','产品编码不能为空',2,3),
        array("cid",'nonull','分类不能为空',2,3),
        array("brand_bid",'nonull','所属品牌不能为空',2,3),
        array("p_title",'nonull','产品标题不能为空',2,3),
        array("p_cost",'nonull','商城价不能为空',2,3),
        array("p_code",'nonull','产品编码不能为空',2,3),
        array("carriage",'nonull','运费不能为空',2,3),
        array("surplus",'nonull','库存不能为空',2,3),
        array("list_thumb",'nonull','列表图片不能为空',2,3),
        array("thumb",'nonull','内容页图片不能为空',2,3),
        array("pro_content",'nonull','内容详情不能为空',2,3),
        
        );



    public $auto = array(
      array('add_time','time','function',2,1),
      array('edit_time','time','function',2,3),

      array('adminid','_uid','method',2,3),
      array('type_tid','_tid','method',2,3),
      );




    /**
     * 获得管理员id
     */
    public function _uid(){
      $uid = session('adminuid');
    
      return $uid;
    }



    /**
     * 获得类型id
     */
    public function _tid(){
      $cid = Q("post.cid",0,'intval');
      // 获得当前cid里所属tid
      $data = K("Category")->where("cid={$cid}")->find();
      $tid = $data['type_tid'];
      return $tid;
    }





    /**
     * 添加
     */
    public function proAdd(){
      $code = (int)$_POST['p_code'];
      $allCode = $this->where("p_code={$code}")->find();
      if($allCode){
          $this->error='编码已经存在';
          return false;
      }

        if(!$this->create()) return false;
        
        // p($this->data);die;
        // 判断编码是否已经存在
        
        $img = new Image();
        $v = $_POST['list_thumb'];
        $this->data['list_img']= $img->thumb($v, dirname($v).'/list'.basename($v),218,218);
      
        // 添加产品表
        $_POST['pro_id']=$this->add();
      // 定义一个变量保存内容页页缩略图地址路径  中图
       $medium='';$big = '';$smallimg='';
       // 因为列表页提交过来的图片是一个数组 要想缩略图 必须循环
       foreach ($_POST['thumb'] as $k => $v) {
           // 缩图大小 必须得到 原始图片 和缩略图文件 $v 是原图 
           // 大图
           $big.= $img->thumb($v, dirname($v).'/big'.basename($v),800,800).",";
           // 中图
           $medium .= $img->thumb($v,dirname($v).'/medium'.basename($v),400,400).",";
           // 小图
           $smallimg.= $img->thumb($v,dirname($v).'/small'.basename($v),55, 55).",";
           
       }

       // 去除多余的',' 并赋值给表单  中图
       $_POST['medium']=rtrim($medium,',');
       $_POST['big']=rtrim($big,',');
       $_POST['smallimg']=rtrim($smallimg,',');
      // 添加内容表
      K("Product_cont")->add();
      // 添加属性表
        if(isset($_POST['avalue'])){
             $avalue = $_POST['avalue'];
             // 因为$k就是sid $v[0]就是值所以可以循环
             foreach ($avalue as $k => $v) {
               // 判断属性不为空的时候才添加
               if($v[0]!='0'){
                 $_POST['avalue']=$v[0];
                 $_POST['sid']=$k;
                
                 K('Attribute')->add();
               }
            }
            
        }
        // 添加规格
        if(isset($_POST['spec'])){
        $spec = $_POST['spec'];
        foreach ($spec as $sid => $value) {
          foreach($value['avalue'] as $k => $v){
           if($v){
             $data = array(
                 'sid' => $sid,
                 'avalue' => $v,
                 'added' => $value['added'][$k],
                 'pro_id'=>$_POST['pro_id'],
               );
              K('Attribute')->add($data);
           }
          }
        }
      }
        return true;
    }







    /**
     * 编辑
     */
    public function proedit($pro_id){

      if(!$this->create()) return false;
     // p($_POST);die;
      // 修改产品表

      $img = new Image();
    
      // 修改之前把旧数据删除
      $oldImg = K("Product")->where("pro_id={$pro_id}")->all();
    
      is_file($oldImg[0]['list_img'])&&unlink($oldImg[0]['list_img']);

      $v = $_POST['list_thumb'];
      $this->data['list_img']= $img->thumb($v, dirname($v).'/list'.basename($v),218,218);
      $this->where("pro_id={$pro_id}")->update();



      // 修改产品内容表
     // 修改之前把旧数据删除
     $oldImg = K("Product_cont")->where("pro_id={$pro_id}")->all();
    
      
      // 删除小图
      $this->delImg($oldImg[0]['smallimg']);
      // 删除大图
      $this->delImg($oldImg[0]['big']);
      // 删除中图
      $this->delImg($oldImg[0]['medium']);
      
       // 定义一个变量保存内容页页缩略图地址路径  中图
       $medium='';
       $big = '';
       $smallimg='';
       // 因为列表页提交过来的图片是一个数组 要想缩略图 必须循环
       foreach ($_POST['thumb'] as $k => $v) {
            // 缩图大小 必须得到 原始图片 和缩略图文件 $v 是原图 
           
           // 大图
           $big.= $img->thumb($v, dirname($v).'/big'.basename($v),800,800).",";
           // 中图
           $medium .= $img->thumb($v,dirname($v).'/medium'.basename($v),400,400).",";
           // 小图
           $smallimg.= $img->thumb($v,dirname($v).'/small'.basename($v),50, 50).",";
           
       }

       // 去除多余的',' 并赋值给表单  中图
       $_POST['medium']=rtrim($medium,',');
       $_POST['big']=rtrim($big,',');
       $_POST['smallimg']=rtrim($smallimg,',');
      
        
        // 添加内容表
        K("Product_cont")->where("pro_id={$pro_id}")->update();



        // 添加属性表
        // 先进行删除
        K("Attribute")->where("pro_id={$pro_id}")->delete();



        // 添加属性表
        if(isset($_POST['avalue'])){
             $avalue = $_POST['avalue'];
             // 因为$k就是sid $v[0]就是值所以可以循环
             foreach ($avalue as $k => $v) {
               // 判断属性不为空的时候才添加
               if($v[0]!='0'){
                 $_POST['avalue']=$v[0];
                 $_POST['sid']=$k;
                 K('Attribute')->add();
               }
            }
           
        }
         if(isset($_POST['spec'])){
         // 添加规格
         if(isset($_POST['spec'])){
         $spec = $_POST['spec'];
         foreach ($spec as $sid => $value) {
           foreach($value['avalue'] as $k => $v){
            if($v){
              $data = array(
                  'sid' => $sid,
                  'avalue' => $v,
                  'added' => $value['added'][$k],
                  'pro_id'=>$_POST['pro_id'],
                );
               K('Attribute')->add($data);
            }
           }
         }
        } 
      }
        return true;
    }

    /**
     * 删除旧图片
     */
    public function delImg($arr){

        $arr = explode(',',$arr);
        // p($arr);
        foreach ($arr as $k => $v) {
          is_file($v)&&unlink($v);

        }

      
    }
    

    /**
     * 获得产品数据 关联产品内容表 品牌表 
     */
    public function proData($pro_id){
      // 获得产品数据 关联产品内容表 品牌表 
      $proData =M('')->join('__product__ AS p JOIN __product_cont__ AS c ON p.pro_id=c.pro_id')->where("c.pro_id={$pro_id}")->find();
      // 把赠送产品字段具体化
      $proData['give']=explode(',',$proData['give']);
      // 图片具体化
      $proData['smallimg']=explode(',',$proData['smallimg']);
      $proData['big']=explode(',',$proData['big']);
      $proData['medium']=explode(',',$proData['medium']);
      return $proData;
    }




}