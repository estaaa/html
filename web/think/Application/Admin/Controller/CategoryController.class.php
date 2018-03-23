<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class CategoryController extends CommonController {
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model=D('Category');
    }
    public function index(){
        $data = new \Think\Data();
        // 获得树状数组
        $cateData = $data::tree($this->model->select(),'ctitle','cid','pid');
        $this->assign('cateData',$cateData);
      
        $this->show();
    }
    /**
     * 添加顶级分类
     */
    public function add(){
        if(IS_POST){
            if(!$this->model->addCate()){
                $this->error($this->model->getError());
            }
            $this->success('添加成功',U('index'));
        }
        $this->show();
    }
    /**
     * 删除顶级分类
     * @return [type] [description]
     */
    public function del(){
        $cid = I('get.cid',0,'int');
        $delData = $this->model->where("pid={$cid}")->find();
        if($delData){
            $this->success('请删除子分类在进行删除',U('index'));
        }
        $this->model->where("cid={$cid}")->delete();
        $this->success('删除成功',U('index'));
    }
    /**
     * 编辑分类
     */
    public function edit(){
        $cid = I('get.cid',0,'intval');
        // 先获得旧数据
        $oldData = $this->model->where("cid={$cid}")->find();
        // 因为父级分类不能添加类型所以进行判断
        // pid为0的时候是顶级分类 
        if(IS_POST){
            if($oldData['pid']==0){
                // 修改顶级分类
                if(!$this->model->topEdit($cid)){
                    $this->error($this->model->getError());
                }
            }else{
                // 修改子集分类
                if(!$this->model->topEdit($cid)){
                    $this->error($this->model->getError());
                }
            }
            $this->success('修改成功',U('index'));
         }
        $this->assign('oldData',$oldData);
        // 因为分类不能添加 自己的子集  因为会陷入死循环 也不能添加自己
        // 所以要进行筛选
        $notData = $this->model->getSon($this->model->select(),$cid);
        // 在把自己压进去
        $notData[] = $cid;
        // 查找不在这些分类里面的分类
        $newData = $this->model->where("cid not in(".implode(',',$notData).") ")->select();
    
        // 为了方便性 还要进行树状排列
        $data = new \Think\Data();
        $newData = $data::tree($newData,'ctitle','cid','pid');

        $this->assign('newData',$newData);
     
        // 获得所有类型
        $brandData = D('Type')->select();
        $this->assign('brandData',$brandData);
        $this->display();
    }

    /**
     * 添加子分类
     */
    public function addSon(){
        $cid = I('get.cid',0,'intval');
        if(IS_POST){
            if(!$this->model->addSonCate()){
                $this->error($this->model->getError());
            }
            $this->success('添加成功',U('index'));
        }
        // 获得当前分类
        $father = $this->model->where("cid={$cid}")->find();
        $this->assign('father',$father);
        // 获得所有类型
        $brandData = D('Type')->select();
        $this->assign('brandData',$brandData);
        // p($brandData);
        $this->show();
    }
    /**
     *接收点击 ajax
     *让没有子分类的图标+ -
     *消失
     */
    public function clickAjax(){
        if(IS_AJAX){
            $cid = I('post.cid',0,'intval');
            // 找到当前的子集分类
            $noSon = $this->model->where("pid={$cid}")->select();
            $arr=array();
            // 如果有分类 执行
            if($noSon){
                // 查找二级分类下面还有没有分类 如果 没有  就把数组返回出去
                foreach($noSon as $v){
                    $noCid = $this->model->where("pid={$v['cid']}")->find();
                    if(!$noCid){
                        $arr[] = $v['cid'];
                    }
                }
            }
            echo json_encode($arr);die;
            
        }
    }
    /**
     * 接收ajax 数据
     */
    public function textAjax(){
        if(IS_AJAX){
            $cid = I('post.cid',0,'intval');
            // 获取分类数据
            $data = $this->model->select();
            $noSon = $this->model->where("pid={$cid}")->select();
            if(!$noSon){
                echo $cid;
            }
            // 获得所有子集分类
            $sonCid = $this->model->getSon($data,$cid);
            // p($sonCid);
            // 把数据返回
            echo json_encode($sonCid);die;
            // 或者
            // $this->ajax($sonCid);
        }
    }



}