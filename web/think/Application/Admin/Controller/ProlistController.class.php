<?php
/**
* 货品列表控制器
*/
namespace Admin\Controller;
use Admin\Controller\CommonController;
class ProlistController extends CommonController
{
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model=D('Prolist');
        
    }

    public function index(){
       $pro_id=I('get.pro_id',0,'int');
       $tid = I('get.tid',0,'int');
       //通过tid在类型属性表中查到该商品对应的规格名称
       $spec=$this->model->getAttr($tid,$pro_id);
       $this->assign('spec',$spec);
        //获得该商品所填写的货品列表数据
       $listData = $this->model->getGroup($pro_id);
       $this->assign('listData',$listData);
       $this->display();
    }


    public function add(){
        // 首先要找到规格 
        $pro_id=I('get.pro_id',0,'int');
        $tid = I('get.tid',0,'int');
        if(IS_POST){
            if(!$this->model->listAdd($pro_id)){
                $this->error($this->model->getError());
            }
            $this->success('添加成功',U("Admin/Prolist/index/pro_id/{$pro_id}/tid/{$tid}"));
        }
        //通过tid在类型属性表中查到该商品对应的规格名称
        $spec=$this->model->getAttr($tid,$pro_id);
        $this->assign('spec',$spec);
        $this->display();
    }



    public function edit(){
         // 首先要找到规格 
         $pro_id=I('get.pro_id',0,'int');
         $tid = I('get.tid',0,'int');
         $listid = I('get.listid',0,'int');
         if(IS_POST){
             if(!$this->model->listEdit($pro_id,$listid)){
                 $this->error($this->model->getError());
             }
             $this->success('编辑成功',U("Admin/Prolist/index/pro_id/{$pro_id}/tid/{$tid}"));
         }
         // 获得旧数据
         $oldData = $this->model->where("listid={$listid}")->find();
         // 把值变为数组
         $oldData['attrand'] = explode(',',$oldData['attrand']);
         $this->assign('oldData',$oldData);
         //通过tid在类型属性表中查到该商品对应的规格名称
         $spec=$this->model->getAttr($tid,$pro_id);
         $this->assign('spec',$spec);
         $this->display();
    }


    public function del(){
        $pro_id=I('get.pro_id',0,'int');
        $tid = I('get.tid',0,'int');
        $listid = I('get.num',0,'int');
        $this->model->where("listid={$listid}")->delete();
        $this->success('删除成功',U('index',array('pro_id'=>$pro_id,'tid'=>$tid)));
    }
}