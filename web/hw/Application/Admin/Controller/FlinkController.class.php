<?php
/**
* 友情链接
*/
class FlinkController extends AuthController
{
    private $model;
    public function __init(){
        parent::__init();
        $this->model=K('Flink');
    }
    
    public function index(){
        $flinkData = $this->model->all();
        $this->assign('flinkData',$flinkData);
        $this->display();
    }

    // 添加
    public function add(){

        if(IS_POST){
            if(!$this->model->flinkAdd()){
                $this->error($this->model->error);
            }
            $this->success('添加成功',U('index'));
        }
        
        $this->display();
    }

    public function edit(){
        $fid = Q('get.fid',0,'intval');
        if(IS_POST){
            if(!$this->model->edit($fid)){
                $this->error($this->model->error);
            }
            $this->success('修改成功',U('index'));
        }
        $oldData = $this->model->where("fid={$fid}")->find();
        $this->assign('oldData',$oldData);
        $this->display();
    }

    public function del(){
        $fid = Q('get.fid',0,'intval');
        $this->model->where("fid={$fid}")->delete();
        $this->success('删除成功',U('index'));
    }
}