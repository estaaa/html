<?php
namespace Common\Model;
use Think\Model;
class CarouselModel extends Model
{
    /**
     * 添加大图轮播
     */
    public function addImg($num){
        if(!$this->create()){return false;}
        
        if($_FILES){
            if($_FILES['logo']['error']!=4){
                // 实例化上传类 并设置保存地址
                $upload = new \Think\Upload();
                $upload->rootPath  =   './Uploads/Carousel/';
                $upload->subName  = false;
                // 执行上传
                $uplofiles = $upload->upload();
                
                // 如果有错误 返回错误
                if(!$uplofiles){
                    $this->error=$upload->getError();
                    return false;
                }
            }
        }
        // 判断图片是否为空
        if(empty($uplofiles)){$this->error='图片不能为空';return false;}
        // 判断单个图片是否为空
        $urls = $_POST['url'];
        foreach ($urls as $k => $v) {
                if(!isset($v)){$this->error='图片链接不能为空';return false;}
                if(!isset($uplofiles[$k])){$this->error='图片地址不能为空';return false;}
        }
        foreach ($urls as $k => $v){
            // 大图
            if($num==0){
                $arr = array(
                 'img' => './Uploads/Carousel/'.$uplofiles[$k]['savename'],
                 'url'=>$v,

                 );
            }
            // 小图
            if($num==1){
                $arr = array(
                 'img' => './Uploads/Carousel/'.$uplofiles[$k]['savename'],
                 'url'=>$v,
                 'isimg'=>1,
                 );
            }
            // 中图
            if($num==2){
                $arr = array(
                 'img' => './Uploads/Carousel/'.$uplofiles[$k]['savename'],
                 'url'=>$v,
                 'isimg'=>2,
                 );
            }
           $this->add($arr);
        }
        return true;
    }

    public function bigEdit($carid){
         if(!$this->create()){return false;}
         if(!isset($_POST['url'])){$this->error='图片链接不能为空';return false;}
         // 获得旧数据
         $oldImg = current($this->where("car_id={$carid}")->getField("img",true));
         // 实例化上传类 并设置保存地址
         $upload = new \Think\Upload();
         $upload->rootPath  =   './Uploads/Carousel/';
         $upload->subName  = false;
         $uplofiles = $upload->upload();
        
         if($uplofiles){
             isset($oldImg)&&unlink($oldImg);
             $newImg = current($uplofiles);
             $_POST['img']='./Uploads/Carousel/'.$newImg['savename'];
             $this->where("car_id={$carid}")->save($_POST);
         }else{
            $this->where("car_id={$carid}")->save($_POST);
         }
         return true;
         // p($newImg['path']);
    }
   
}