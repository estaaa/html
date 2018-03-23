<?php
/**
* 货品列表控制器
*/
class ProlistController extends AuthController
{
    private $model;
    public function __init(){
        parent::__init();
        $this->model=K('Prolist');
        
    }

    public function index(){
       $pro_id=Q('get.pro_id',0,'intval');
       $tid = Q('get.tid',0,'intval');
      
       //通过tid在类型属性表中查到该商品对应的规格名称
       $spec =K('Type_son')->where("is_edit=1 AND tid={$tid}")->all();
       // 循环把属性的值具体化
       // 属性的值可以通过商品属性表具体化
      
       foreach ($spec as $k => $v) {
            $arr = K('Attribute')->where("pro_id={$pro_id} AND sid={$v['sid']}")->all();
            // 判断是否选择了这个规格 如果选择了就加入数组 没有选择就删除
            if(!$arr){
                unset($spec[$k]);
            }else{
                $spec[$k]['content']= $arr;
            }
       }

       $this->assign('spec',$spec);


       //获得该商品所填写的货品列表数据
       $listData = $this->model->where("pro_id={$pro_id}")->all();
       
       foreach ($listData as $k => $v) {
        if($v['attrand']){
            $listData[$k]['spec'] = K('Attribute')->where("attid in (" . $v['attrand'] . ")")->getField('avalue',true);
        }
        
       }
       
       $this->assign('listData',$listData);
     // p($listData);
        $this->display();
    }


    public function add(){
        // 首先要找到规格 
        $pro_id=Q('get.pro_id',0,'intval');
        $tid = Q('tid',0,'intval');
        if(IS_POST){
            if(!$this->model->listAdd($pro_id)){
                $this->error($this->model->error);
            }
            $this->success('添加成功',U("Admin/Prolist/index/pro_id/{$pro_id}/tid/{$tid}"));
        }
        //通过tid在类型属性表中查到该商品对应的规格名称
        $spec =K('Type_son')->where("is_edit=1 AND tid={$tid}")->all();
   // p($spec);
       // 循环 让属性的值带有序号 以便于区分
        foreach ($spec as $k => $v) {
            $arr = K('Attribute')->where("pro_id={$pro_id} AND sid={$v['sid']}")->all();
            if(!$arr){
                unset($spec[$k]);
            }else{
                $spec[$k]['content']= $arr;
            }
            
        }
   // p($spec);
        $this->assign('spec',$spec);
     
        $this->display();
    }



    public function edit(){
         // 首先要找到规格 
         $pro_id=Q('get.pro_id',0,'intval');
         $tid = Q('tid',0,'intval');
         $listid = Q('get.listid',0,'intval');
         if(IS_POST){
             if(!$this->model->listEdit($pro_id,$listid)){
                 $this->error($this->model->error);
             }
             $this->success('编辑成功',U("Admin/Prolist/index/pro_id/{$pro_id}/tid/{$tid}"));
         }
         // 获得旧数据
         $oldData = $this->model->where("listid={$listid}")->find();
         // 把值变为数组
         $oldData['attrand'] = explode(',',$oldData['attrand']);
         $this->assign('oldData',$oldData);
         //通过tid在类型属性表中查到该商品对应的规格名称
         $spec =K('Type_son')->where("is_edit=1 AND tid={$tid}")->all();
        
        // 循环 让属性的值带有序号 以便于区分
         foreach ($spec as $k => $v) {
             $arr = K('Attribute')->where("pro_id={$pro_id} AND sid={$v['sid']}")->all();
             if(!$arr){
                 unset($spec[$k]);
             }else{
                 $spec[$k]['content']= $arr;
             }
         }
       
         $this->assign('spec',$spec);
        $this->display();
    }


    public function del(){
        $pro_id=Q('get.pro_id',0,'intval');
        $tid = Q('tid',0,'intval');
        $listid = Q('get.listid',0,'intval');
        $this->model->where("listid={$listid}")->delete();
        $this->success('删除成功',"Admin/Prolist/index/pro_id/{$pro_id}/tid/{$tid}");
    }
}