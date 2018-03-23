<?php
/**
* 友情链接
*/
namespace Admin\Controller;
use Admin\Controller\CommonController;
class FlinkController extends CommonController
{
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model=D('Flink');
    }
    
    public function index(){
        $flinkData = $this->model->select();
        $this->assign('flinkData',$flinkData);
        $this->display();
    }

    // 添加
    public function add(){

        if(IS_POST){
            if(!$this->model->flinkAdd()){
                $this->error($this->model->getError());
            }
            $this->success('添加成功',U('index'));
        }
        
        $this->display();
    }

    public function edit(){
        $fid = I('get.fid',0,'int');
        if(IS_POST){
            if(!$this->model->edit($fid)){
                $this->error($this->model->getError());
            }
            $this->success('修改成功',U('index'));
        }
        $oldData = $this->model->where("fid={$fid}")->find();
        $this->assign('oldData',$oldData);
        $this->display();
    }

    public function del(){
        $fid = I('get.fid',0,'int');
        $this->model->where("fid={$fid}")->delete();
        $this->success('删除成功',U('index'));
    }
	
}