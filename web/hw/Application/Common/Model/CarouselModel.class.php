<?php
class CarouselModel extends Model
{
    public $table="carousel";
    /**
     * 添加大图轮播
     */
    public function addImg($num){
        if(!$this->create()){return false;}
        // 实例化上传类 并设置保存地址
        $upload = new Upload('./Upload/Carousel');
        $uplofiles = $upload->upload();
        // 判断图片是否为空
        if(empty($uplofiles)){$this->error='图片不能为空';return false;}
        // 判断单个图片是否为空
        $urls = $_POST['url'];
        foreach ($urls as $k => $v) {
                if(!isset($v)){$this->error='图片链接不能为空';return false;}
                if(!isset($uplofiles[$k])){$this->error='图片地址不能为空';return false;}
        }
        // p($_POST);p($uplofiles);
        foreach ($urls as $k => $v){
            // 大图
            if($num==0){
                $arr = array(
                 'img' => $uplofiles[$k]['path'],
                 'url'=>$v,

                 );
            }
            // 小图
            if($num==1){
                $arr = array(
                 'img' => $uplofiles[$k]['path'],
                 'url'=>$v,
                 'isimg'=>1,
                 );
            }
            // 中图
            if($num==2){
                $arr = array(
                 'img' => $uplofiles[$k]['path'],
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
         $upload = new Upload('./Upload/Carousel');
         $uplofiles = $upload->upload();
         if($uplofiles){
             isset($oldImg)&&unlink($oldImg);
             $newImg = current($uplofiles);
             $_POST['img']=$newImg['path'];
             $this->where("car_id={$carid}")->update($_POST);
         }else{
            $this->where("car_id={$carid}")->update($_POST);
         }
         return true;
         // p($newImg['path']);
    }
   
}