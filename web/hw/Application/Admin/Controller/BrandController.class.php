<?php
/**
* 品牌控制器
*/
class BrandController extends AuthController
{
    
    private $model;

    public function __init(){
        parent::__init();
        $this->model=K('Brand');
    }


    public function index(){
        // 因为有排序功能 所以要进行排序 并获得所有品牌数据 从大到小
        $allData = $this->model->order('sort DESC')->all();
        $this->assign('allData',$allData);
        $this->display();
    }
    /**
     * 品牌的添加
     */
    public function add(){
        if(IS_POST){
            if(!$this->model->brandAdd()){
                $this->error($this->model->error);
            }
            $this->success('添加成功',U('index'));
        }
        $this->display();
    }

    /**
     * 品牌的修改
     */
    public function edit(){

        // 获得当前数据
        $bid = Q('get.bid',0,'intval');

        if(IS_POST){
            if(!$this->model->edit($bid)){
                $this->error($this->model->error);
            }
            $this->success('修改成功',U('index'));
        }
        $oldData = $this->model->where("bid={$bid}")->find();
        $this->assign('oldData',$oldData);
        $this->display();
    }


    public function del(){
        // 获得当前数据
        $bid = Q('get.bid',0,'intval');
        $this->model->where("bid={$bid}")->delete();
        $this->success("删除成功",U('index'));
    }
}