<?php
namespace Admin\Controller;
use Admin\Controller\TypeController;
class TypeController extends CommonController {
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model=D('Type');
    }
    public function index(){
        // 获得所有类型
        $allData = $this->model->select();
        $this->assign('allData',$allData);
        $this->show();
    }
    /**
     * 添加类型
     */
    public function add(){
        if(IS_POST){
            if(!$this->model->addData()){$this->error($this->model->getError());}
            $this->success('添加成功',U('index'));
        }
        $this->show();
    }
    public function edit(){
        $tid = I('get.tid',0,'int');
        if(IS_POST){
            if(!$this->model->editData($tid)){$this->error($this->model->getError());}
            $this->success('修改成功',U('index'));
        }
        $oldData = $this->model->where("tid={$tid}")->find();
        $this->assign('oldData',$oldData);
        $this->show();
    }
    /**
     * 删除类型
     * @return [type] [description]
     */
    public function del(){
        // 获得要删除的id
        $tid = I('get.tid',0,'string');
        $sonData = D('Type_son')->where("tid={$tid}")->select();
        if(!empty($sonData)){$this->success('请先删除属性,在进行此操作','',4);}
        $this->model->where("tid={$tid}")->delete();
        $this->success('删除成功',U('index'));
    }
    /**
     * 类型属性列表
     * @return [type] [description]
     */
    public function typeAttr(){
         $tid = I('get.tid',0,'int');
         // 获得相应类型下的属性
         $sonData = D('Type_son')->where("tid={$tid}")->select();
         $this->assign('sonData',$sonData);
        
        $this->show();
    }
    /**
     * 添加属性
     */
    public function addSon(){
        $tid = I('get.tid',0,'int');
        if(IS_POST){
           if(!D('Type_son')->addAttr()){$this->error(D('Type_son')->getError());}
           $this->success('添加成功',U("Admin/Type/typeAttr/tid/{$tid}"));
         
        }
        // 获得所属类型
        $typeTitle = $this->model->where("tid={$tid}")->getField('title');
        $this->assign('typeTitle',$typeTitle);
        $this->show();
    }
    /**
     * 删除属性
     * @return [type] [description]
     */
    public function sonDel(){
        $sid = I('get.sid',0,'int');
        D('Type_son')->where("sid={$sid}")->delete();
        $this->success('删除成功');
    }
    public function sonEdit(){
        $sid = I('get.sid',0,'int');
        if(IS_POST){
            if(!D('Type_son')->attrEdit($sid)){$this->error(D('Type_son')->getError());}
            $tid = I('post.tid',0,'int');
            $this->success('修改成功',U("Admin/Type/typeAttr/tid/{$tid}"));
        }
        $oldData = D('Type_son')->where("sid={$sid}")->find();
        $this->assign('oldData',$oldData);
        $this->show();
    }
  
}