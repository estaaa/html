<?php
/**
* 产品控制器
*/
namespace Admin\Controller;
use Admin\Controller\CommonController;
class ProductController extends CommonController {
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model=D('Product');
    }

    public function index(){

        // 因为默认get参数p 是没有值得所以给一个默认值 避免出错
        $num = I('get.p',1,'int');
        // 要显示的条数
        $limit = 5;
        // 这里的page($num.','.$limit)原始是page($_GET['P'].',5') 在这里使用变量替换了
        $proData = $this->model->alias('p')->join("__USER__ u ON p.adminid=u.uid")->page($num.','.$limit)->select();
        // 得到数据的总条数
        $sonNum=$this->model->count();
        // 实例化分页类
        $Page = new \Think\Page($sonNum,$limit);
        // 显示分页
        $show = $Page->show();
        $this->assign('show',$show);
        $this->assign('proData',$proData);
        $this->show();
    }
    /**
     * 添加产品
     */
    public function addPro(){
        // p(I('session.adminUid'));
        if(IS_POST){
            if(!$this->model->proAdd()){
                $this->error($this->model->getError());
            }
            $this->success('添加成功',U('index'));
        }
        $data = new \Think\Data();
        // 获得所有分类
        $cateAll = $data::tree(D('Category')->select(),'ctitle','cid','pid');
        $this->assign('cateAll',$cateAll);

        // 获得所有品牌
        $brandAll = D('Brand')->select();
        $this->assign('brandAll',$brandAll);
        $this->display();
    }

    /**
     * 上传图片
    */
    public function upload(){
        $upload = new \Think\Moreup();
        $upload->group();
       // p($upload->resultImg());
        echo json_encode($upload->resultImg());
         
    }
    /**
     *删除图片
     */
    public function delImg(){
        if(!IS_AJAX) $this->error('非法访问');
        $path = $_POST['path'];
        unlink($path);
    }

    /**
     * 接收tid ajax
     * 获得类型的属性
     */
    public function getAttrSpec(){
        if(!IS_AJAX) $this->error('非法访问');
        $tid = I('post.tid',0,'intval');
        // 查找属性所有tid为提交过来的tid
        $data = D('Type_son')->where("tid={$tid}")->select();
        // 循环 把属性的内容 拆分为数组 并重新压入数组
        foreach($data as $k=>$v){
            $data[$k]['content']=explode(',',$v['content']);
        }
        // p($data);die;
        // 最后输出
        $this->ajaxReturn($data);
    }



    /**
     * 修改
     */
    public function edit(){
        $pro_id = I('get.pro_id',0,'intval');
        if(IS_POST){
            if(!$this->model->proedit($pro_id)){
                $this->error($this->model->getError());
            }
            $this->success('修改成功',U('index'));
        }
    
        // 获得所有属性 关联属性表 内容表 产品表
        $data =$this->model->alias('p')->join("__PRODUCT_CONT__ d ON p.pro_id=d.pro_id")->where("p.pro_id={$pro_id}")->find();
        
        $this->assign('data',$data);

        // 获得所有分类
        $cateData = D('Category')->select();
        // 为了方便性 还要进行树状排列
        $Data = new \Think\Data();
        $newCate = $Data::tree($cateData,'ctitle','cid','pid');
        $this->assign('newCate',$newCate);


        
        // 获得所有品牌
        $bindData = D('Brand')->select();
        $this->assign('bindData',$bindData);


        // 获得属性
        $attrData =M('Attribute')->alias('a')->join("__TYPE_SON__ t ON a.sid=t.sid")->where("a.pro_id={$pro_id}")->select();
        // 循环属性 把值变为数组 以便于好循环option
        foreach ($attrData as $k => $v) {
            $attrData[$k]['content']=explode(',',$v['content']);
        }
        // p($attrData);
        $this->assign('attrData',$attrData);



        // 获得列表页图片
     
        $list_thumb=dirname($data['list_img'])."/".ltrim(basename($data['list_img']),'list');
        $this->assign('list_thumb',$list_thumb);
        // 获得详情页图片
        // 首先要考虑到是不是多张图片
        $medium = explode(',',$data['medium']);
        foreach ($medium as $k => $v) {
            $medium[$k]=dirname($v)."/".ltrim(basename($v),'medium');
        }
        $this->assign('medium',$medium);
      
        $this->display();
    }


    public function del(){
        $pro_id = I("get.pro_id",0,'int');
        // 删除产品表
        // 先删除图片
        $oldImg = $this->model->where("pro_id={$pro_id}")->select();
        $list_thumb=dirname($oldImg[0]['list_img'])."/".ltrim(basename($oldImg[0]['list_img']),'list');
       
        is_file($oldImg[0]['list_img'])&&unlink($oldImg[0]['list_img']);
        is_file($list_thumb)&&unlink($list_thumb);
        $this->model->where("pro_id={$pro_id}")->delete();

        // 删除内容表
        // 先删除图片
        
         $oldImg = D("Product_cont")->where("pro_id={$pro_id}")->select();
         $oldimages = explode(',',$oldImg[0]['big']);
         
          foreach ($oldimages as $k => $v) {
               $oldimages[$k]=dirname($v)."/".ltrim(basename($v),'big');
               is_file($oldimages[$k])&&unlink($oldimages[$k]);
           }
         // 删除小图
         $this->model->delImg($oldImg[0]['smallimg']);
         // 删除model->大图
         $this->model->delImg($oldImg[0]['big']);
         // 删除model->中图
         $this->model->delImg($oldImg[0]['medium']);
         D("Product_cont")->where("pro_id={$pro_id}")->delete();
         // 删除属性表
         D("Attribute")->where("pro_id={$pro_id}")->delete();


         // 删除货品列表表
         D("Prolist")->where("pro_id={$pro_id}")->delete();
         $this->success('删除成功',U('index'));
    }





}