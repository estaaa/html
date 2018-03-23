<?php
/**
* 轮播控制器
*/
namespace Admin\Controller;
use Admin\Controller\CommonController;
class CarouselController extends CommonController
{
  private $model;
  public function __construct(){
    parent::__construct();
    $this->model=D('Carousel');
  }
    
   public function index(){
    $bigData=$this->model->where("isimg=0")->select();
    $this->assign('bigData',$bigData);
    $this->show();
   }
   /**
    * 首页大轮播图
    */
   public function bigImg(){
    if(IS_POST){
      if(!$this->model->addImg(0)){$this->error($this->model->getError());}
      $this->success('添加成功',U('index'));
    }
    $this->show();
   }
   /**
    * 大图轮播修改
    */
   public function bigEdit(){
    $carid = I('get.car_id',0,'int');
    if(IS_POST){
      if(!$this->model->bigEdit($carid)){$this->error($this->model->getError());}
      $this->success('修改成功',U("index"));
    }
    
    $oldData = $this->model->where("car_id={$carid}")->find();
    $this->assign('oldData',$oldData);
    $this->show();
   }

   /**
    * 小图
    * @return [type] [description]
    */
   public function small(){
    $bigData=$this->model->where("isimg=1")->select();
    $this->assign('bigData',$bigData);
    $this->show();
   }
   /**
    * 小图添加
    * @return [type] [description]
    */
   public function smallImg(){
    if(IS_POST){
      if(!$this->model->addImg(1)){$this->error($this->model->getError());}
      $this->success('添加成功',U('small'));
    }
    $this->show();
   }
   public function smallEdit(){
    $carid = I('get.car_id',0,'intval');
    if(IS_POST){
      if(!$this->model->bigEdit($carid)){$this->error($this->model->getError());}
      $this->success('修改成功',U("small"));
    }
    
    $oldData = $this->model->where("car_id={$carid}")->find();
    $this->assign('oldData',$oldData);
    $this->show();
   }
   /**
    * 小图
    * @return [type] [description]
    */
   public function model(){
    $bigData=$this->model->where("isimg=2")->select();
    $this->assign('bigData',$bigData);
    $this->show();
   }
   /**
    * 小图添加
    * @return [type] [description]
    */
   public function modelAdd(){
    if(IS_POST){
      if(!$this->model->addImg(2)){$this->error($this->model->getError());}
      $this->success('添加成功',U('model'));
    }
    $this->show();
   }
   public function modelEdit(){
    $carid = I('get.car_id',0,'intval');
    if(IS_POST){
      if(!$this->model->bigEdit($carid)){$this->error($this->model->getError());}
      $this->success('修改成功',U("model"));
    }
    
    $oldData = $this->model->where("car_id={$carid}")->find();
    $this->assign('oldData',$oldData);
    $this->show();
   }
   public function del(){
    $carid = I('get.car_id',0,'intval');
    $this->model->where("car_id={$carid}")->delete();
    $this->success('删除成功');
   }
}