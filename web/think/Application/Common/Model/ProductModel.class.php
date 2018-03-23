<?php
/**
* 产品表
*/
namespace Common\Model;
use Think\Model;
class ProductModel extends Model
{
    
    
    public $_validate = array(
        // array("p_code",'nonull','产品编码不能为空',2,3),
        array("cid",array(null,0),'分类不能为空','1','notin'),
        array("brand_bid",array(null,0),'所属品牌不能为空','1','notin'),
        array("p_title",'require','产品标题不能为空','1','3'),
        array("p_cost",array(null,0),'商城价不能为空','1','notin'),
        array("p_code",array(null,0),'产品编码不能为空','1','notin'),
        // array("p_code",'checkCode','产品编码已存在','1','callback'),
        array("surplus",array(null,0),'库存不能为空','1','notin'),
        array("list_thumb",'require','列表图片不能为空','1','3'),
        array("thumb",array(null,0),'详情页图片不能为空','1','notin'),
        array("pro_content",'require','内容详情不能为空','1','3'),
        
        );

    // public function checkCode(){
    //    $code = (int)$_POST['p_code'];
    //    $allCode = $this->where("p_code={$code}")->find();
    //    if($allCode){
    //       // $this->error='编码已经存在';
    //       return false;
    //    }
      
    // }

    public $_auto = array(
      array('add_time','time',1,'function'),
      array('edit_time','time',3,'function'),

      array('adminid','_uid',3,'callback'),
      array('type_tid','_tid',3,'callback'),
      );




    /**
     * 获得管理员id
     */
    public function _uid(){
      $uid = I('session.adminUid');
      
      return $uid;
    }



    /**
     * 获得类型id
     */
    public function _tid(){
      $cid = I("post.cid",0,'intval');
      // 获得当前cid里所属tid
      $data = D("Category")->where("cid={$cid}")->find();
      $tid = $data['type_tid'];
      return $tid;
    }





    /**
     * 添加
     */
    public function proAdd(){
        if(!$this->create()) return false;
        $data = array_merge($this->data,$_POST);
        
        // 判断编码是否已经存在
        
        $img = new \Think\Image();
        // 得到列表图像
        $listImg = './Uploads/Content/'.$_POST['list_thumb'];
        $img->open($listImg);
        $img->thumb(218,218,\Think\Image::IMAGE_THUMB_FIXED)->save(dirname($listImg).'/list'.basename($listImg));
        
        $data['list_img']= dirname($listImg).'/list'.basename($listImg);
        
      //   // 添加产品表
        $data['pro_id']=$this->add($data);
       
      // 定义一个变量保存内容页页缩略图地址路径  中图
       $medium='';$big = '';$smallimg='';
     
       // 因为列表页提交过来的图片是一个数组 要想缩略图 必须循环
       foreach ($data['thumb'] as $k => $v) {
           // 缩图大小 必须得到 原始图片 和缩略图文件 $v 是原图 
           $img->open('./Uploads/Content/'.$v);
           // 大图
           $img->thumb(800,800,\Think\Image::IMAGE_THUMB_FIXED)->save('./Uploads/Content'.'/big'.$v);
           $big .= './Uploads/Content'.'/big'.$v.',';

           // 中图
           $img->thumb(400,400,\Think\Image::IMAGE_THUMB_FIXED)->save('./Uploads/Content'.'/medium'.$v);
           $medium .= './Uploads/Content'.'/medium'.$v.',';
           // 小图
           $img->thumb(55,55,\Think\Image::IMAGE_THUMB_FIXED)->save('./Uploads/Content'.'/small'.$v);
           $smallimg .= './Uploads/Content'.'/small'.$v.',';
       }
       // 去除多余的',' 并赋值给表单  中图
       $data['medium']=rtrim($medium,',');
       $data['big']=rtrim($big,',');
       $data['smallimg']=rtrim($smallimg,',');
      // 添加内容表
      D("Product_cont")->add($data);
      // 添加属性表
        if(isset($data['avalue'])){
             $avalue = $data['avalue'];
             // 因为$k就是sid $v[0]就是值所以可以循环
             foreach ($avalue as $k => $v) {
               // 判断属性不为空的时候才添加
               if($v[0]!='0'){
                 $data['avalue']=$v[0];
                 $data['sid']=$k;
                
                 D('Attribute')->add($data);
               }
            }
            
        }
        // 添加规格
        if(isset($data['spec'])){
        $spec = $data['spec'];
        foreach ($spec as $sid => $value) {
          foreach($value['avalue'] as $k => $v){
           if($v){
             $data = array(
                 'sid' => $sid,
                 'avalue' => $v,
                 'added' => $value['added'][$k],
                 'pro_id'=>$data['pro_id'],
               );
              D('Attribute')->add($data);
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
      $data = array_merge($this->data,$_POST);
      // 修改之前把旧数据删除
       $oldImg =$this->where("pro_id={$pro_id}")->select();
       is_file($oldImg[0]['list_img'])||unlink($oldImg[0]['list_img']);
       
       // 修改产品表
       $img = new \Think\Image();
       $listImg = $data['list_thumb'];
       $img->open($listImg);
       $img->thumb(218,218,\Think\Image::IMAGE_THUMB_FIXED)->save(dirname($listImg).'/list'.basename($listImg));
       
       $data['list_img']= dirname($listImg).'/list'.basename($listImg);
       $this->where("pro_id={$pro_id}")->save($data);
      // 修改产品内容表
      // 修改之前把旧数据删除
      $oldImg = D("Product_cont")->where("pro_id={$pro_id}")->select();
      
      // // // 删除小图
      $this->delImg($oldImg[0]['smallimg']);
      // // // 删除大图
      $this->delImg($oldImg[0]['big']);
      // // // 删除中图
      $this->delImg($oldImg[0]['medium']);
      
       // 定义一个变量保存内容页页缩略图地址路径  中图
       $medium='';
       $big = '';
       $smallimg='';
       // 因为列表页提交过来的图片是一个数组 要想缩略图 必须循环
       foreach ($data['thumb'] as $k => $v) {
         // 缩图大小 必须得到 原始图片 和缩略图文件 $v 是原图 
         $img->open($v);
         // 大图
         $img->thumb(800,800,\Think\Image::IMAGE_THUMB_FIXED)->save(dirname($v).'/big'.basename($v));
         $big .= dirname($v).'/big'.basename($v).',';

         // 中图
         $img->thumb(400,400,\Think\Image::IMAGE_THUMB_FIXED)->save(dirname($v).'/medium'.basename($v));
         $medium .= dirname($v).'/medium'.basename($v).',';
         // 小图
         $img->thumb(55,55,\Think\Image::IMAGE_THUMB_FIXED)->save(dirname($v).'/small'.basename($v));
         $smallimg .= dirname($v).'/small'.basename($v).',';
           
       }

       // 去除多余的',' 并赋值给表单  中图
       $data['medium']=rtrim($medium,',');
       $data['big']=rtrim($big,',');
       $data['smallimg']=rtrim($smallimg,',');
        
        // 添加内容表
        D("Product_cont")->where("pro_id={$pro_id}")->save($data);



        // 添加属性表
        // 先进行删除
        D("Attribute")->where("pro_id={$pro_id}")->delete();


        $data['pro_id']=$pro_id;  
        // 添加属性表
        if(isset($data['avalue'])){
             $avalue = $data['avalue'];

             // 因为$k就是sid $v[0]就是值所以可以循环
             foreach ($avalue as $k => $v) {
               // 判断属性不为空的时候才添加
               if($v[0]!='0'){
                 $data['avalue']=$v[0];
                 $data['sid']=$k;
                 D('Attribute')->add($data);
               }
            }
           
        }
         if(isset($data['spec'])){

         // 添加规格
         if(isset($data['spec'])){
         $spec = $data['spec'];
         foreach ($spec as $sid => $value) {
           foreach($value['avalue'] as $k => $v){
            if($v){
              $data = array(
                  'sid' => $sid,
                  'avalue' => $v,
                  'added' => $value['added'][$k],
                  'pro_id'=>$pro_id,
                );
               D('Attribute')->add($data);
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
      $proData =M('Product')->alias('p')->join('__PRODUCT_CONT__ AS c ON p.pro_id=c.pro_id')->where("c.pro_id={$pro_id}")->find();
      // 把赠送产品字段具体化
      $proData['give']=explode(',',$proData['give']);
      // 图片具体化
      $proData['smallimg']=explode(',',$proData['smallimg']);
      $proData['big']=explode(',',$proData['big']);
      $proData['medium']=explode(',',$proData['medium']);
      return $proData;
    }

    


}