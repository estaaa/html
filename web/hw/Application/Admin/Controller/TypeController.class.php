<?php
/**
* 类型控制器
*/
class TypeController extends AuthController
{
    private $model;
    public function __init(){
        parent::__init();
        $this->model=K('Type');
    }


    public function index(){
        $allData = $this->model->all();
        if($allData){
            $this->assign('allData',$allData);
        }
        $this->display();
    }

    /**
     * 添加类型
     */
    public function add(){
     
        if(IS_POST){
            if(!$this->model->addData(0)){

                $this->error($this->model->error);
            }
            $this->success('添加成功',U('index'));
        }
        $this->display();
    }

    /**
     * 修改类型
     */
    public function edit(){
        // 获得当前要修改的id
        $tid = Q('get.tid',0,'intval');
        if(IS_POST){
            if(!$this->model->addData(1,$tid)){
                $this->error($this->model->error);
            }
             $this->success('修改成功',U('index'));
        }
        // 获得当前数据
        $data = $this->model->where("tid={$tid}")->find();
        $this->assign('data',$data);

        $this->display();
    }

    /**
     * 删除类型
     */
    public function del(){
        // 获得tid
        $tid = Q('get.tid',0,'intval');
        // 判断类型下面有没有属性
        $sonData = K('Type_son')->where("tid={$tid}")->find();
        if($sonData){
            $this->success('请先删除属性在进行此操作',U('index'));
        }
        $this->model->where("tid={$tid}")->delete();
        $this->success('删除成功',U('index'));
    }
    /**
     * 子类属性列表
     */
    public function sonIndex(){
        // 获得当前tid 找到当前sid 里面是tid的数据
        $tid = Q('get.tid',0,'intval');
        // 实例化子类属性
        $sonModel =K("Type_son");
        $sonNum = $sonModel->where("tid={$tid}")->count();
        // 实例化分页类 传入参数  总条数  要显示几个  有几个分页
        $pageobj = new Page($sonNum,8,2);

        // 让其分页在html中显示 3代表显示方式
        $page = $pageobj->show(3);
        $this->assign('page',$page);
        // 得到截取位置
        $limit = $pageobj->limit();
        // 获得所有前台用户 和个人信息进行关联 并截取相应数组
        $sonData = $sonModel->where("tid={$tid}")->limit($limit)->all();
        $this->assign('sonData',$sonData);
        $this->display();
    }
    /**
     * 添加属性
     */
    public function addSon(){
        // 获得当前所属父级tid 获得属性名字
        $tid = Q("get.tid",0,"intval");
        if(IS_POST){
            $sonModel = K("Type_son");
            if(!$sonModel->sonData()){
                $this->error($sonModel->error);
            }
            $tid = Q("post.tid",0,'intval');
            $this->success('添加成功',U("Admin/Type/sonIndex/tid/{$tid}"));
        }
        $fatherData = $this->model->where("tid={$tid}")->find();
        $this->assign('fatherData',$fatherData);

        $this->display();
    }

    /**
     * 编辑属性
     */
    public function sonEdit(){
        $sid = Q('get.sid',0,'intval');
        if(IS_POST){
            $sonModel = K('Type_son');
            if(!$sonModel->edit($sid)){
                $this->error($sonModel->error);
            }
            // 这里获得tid 是为了跳转方便
            $tid = Q("post.tid",0,'intval');
            $this->success("修改成功",U("Admin/Type/sonIndex/tid/{$tid}"));
        }
        $sonData = K('Type_son')->where("sid={$sid}")->find();
        $this->assign('sonData',$sonData);
        // P($sonData);
        $this->display();
    }
    /*
    *删除属性
    */
    public function sonDel(){
        $sid = Q('get.sid',0,'intval');
        // 获得所属属性id
         
        $tid = current(K('Type_son')->where("sid={$sid}")->getField('tid',true));
      
        K('Type_son')->where("sid={$sid}")->delete();
        $this->success('删除成功',U("Admin/Type/sonIndex/tid/{$tid}"));

    }
}