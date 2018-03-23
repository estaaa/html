<?php
/**
* 轮播控制器
*/
class CarouselController extends AuthController
{
  private $model;
  public function __init(){
    parent::__init();
    $this->model=K('Carousel');
  }
    
   public function index(){
    $bigData=$this->model->where("isimg=0")->all();
    $this->assign('bigData',$bigData);
    $this->display();
   }
   /**
    * 首页大轮播图
    */
   public function bigImg(){
    if(IS_POST){
      if(!$this->model->addImg(0)){$this->error($this->model->error);}
      $this->success('添加成功',U('index'));
    }
    $this->display();
   }
   /**
    * 大图轮播修改
    */
   public function bigEdit(){
    $carid = Q('get.car_id',0,'intval');
    if(IS_POST){
      if(!$this->model->bigEdit($carid)){$this->error($this->model->error);}
      $this->success('修改成功',U("index"));
    }
    
    $oldData = $this->model->where("car_id={$carid}")->find();
    $this->assign('oldData',$oldData);
    $this->display();
   }

   /**
    * 小图
    * @return [type] [description]
    */
   public function small(){
    $bigData=$this->model->where("isimg=1")->all();
    $this->assign('bigData',$bigData);
    $this->display();
   }
   /**
    * 小图添加
    * @return [type] [description]
    */
   public function smallImg(){
    if(IS_POST){
      if(!$this->model->addImg(1)){$this->error($this->model->error);}
      $this->success('添加成功',U('small'));
    }
    $this->display();
   }
   public function smallEdit(){
    $carid = Q('get.car_id',0,'intval');
    if(IS_POST){
      if(!$this->model->bigEdit($carid)){$this->error($this->model->error);}
      $this->success('修改成功',U("small"));
    }
    
    $oldData = $this->model->where("car_id={$carid}")->find();
    $this->assign('oldData',$oldData);
    $this->display();
   }
   /**
    * 小图
    * @return [type] [description]
    */
   public function model(){
    $bigData=$this->model->where("isimg=2")->all();
    $this->assign('bigData',$bigData);
    $this->display();
   }
   /**
    * 小图添加
    * @return [type] [description]
    */
   public function modelAdd(){
    if(IS_POST){
      if(!$this->model->addImg(2)){$this->error($this->model->error);}
      $this->success('添加成功',U('model'));
    }
    $this->display();
   }
   public function modelEdit(){
    $carid = Q('get.car_id',0,'intval');
    if(IS_POST){
      if(!$this->model->bigEdit($carid)){$this->error($this->model->error);}
      $this->success('修改成功',U("model"));
    }
    
    $oldData = $this->model->where("car_id={$carid}")->find();
    $this->assign('oldData',$oldData);
    $this->display();
   }
   public function del(){
    $carid = Q('get.car_id',0,'intval');
    $this->model->where("car_id={$carid}")->delete();
    $this->success('删除成功');
   }
}