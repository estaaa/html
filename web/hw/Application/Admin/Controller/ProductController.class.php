<?php
/**
* 产品控制器
*/
class ProductController extends AuthController
{
    private $model;
    public function __init(){
        parent::__init();
        $this->model=K('Product');
    }

    public function index(){

        $data = M('')->join("__user__ as u JOIN __product__ as p ON u.uid=p.adminid")->all();
        $sonNum=count($data);
        // 实例化分页类 传入参数  总条数  要显示几个  有几个分页
        $pageobj = new Page($sonNum,5,4);
        // 让其分页在html中显示 3代表显示方式
        $page = $pageobj->show();
        $this->assign('page',$page);
        // 得到截取位置
        $limit = $pageobj->limit();
        // 获得所有前台用户 和个人信息进行关联 并截取相应数组
        $proData = M('')->join("__user__ as u JOIN __product__ as p ON u.uid=p.adminid")->limit($limit)->all();
        $this->assign('proData',$proData);
        // p($proData);
       /* echo date('Y-m-d H:i:s','1435823615');
        p($data);*/
        $this->display();
    }
    /**
     * 添加产品
     */
    public function add(){
        if(IS_POST){
            if(!$this->model->proAdd()){
                $this->error($this->model->error);
            }
            $this->success('添加成功',U('index'));
        }
        // 获得所有分类
        $cateAll = data::tree(K('Category')->all(),'ctitle','cid','pid');
        $this->assign('cateAll',$cateAll);

        // 获得所有品牌
        $brandAll = K('Brand')->all();
        $this->assign('brandAll',$brandAll);
        $this->display();
    }

    /**
     * 上传图片
    */
    public function upload(){
        $upload = new Upload('Upload/Content/' . date('y/m'));
         $file = $upload->upload();
          if (empty($file)) {
            $this->ajax('上传失败');
          } else {
            $data = $file[0];
            $this->ajax($data);
          }
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
        $tid = Q('post.tid',0,'intval');
        // 查找属性所有tid为提交过来的tid
        $data = K('Type_son')->where("tid={$tid}")->all();
        // 循环 把属性的内容 拆分为数组 并重新压入数组
        foreach($data as $k=>$v){
            $data[$k]['content']=explode(',',$v['content']);
        }
        // p($data);die;
        // 最后输出
        $this->ajax($data);
    }



    /**
     * 修改
     */
    public function edit(){
        $pro_id = Q('get.pro_id',0,'intval');
        if(IS_POST){
            
            if(!$this->model->proedit($pro_id)){
                $this->error($this->model->error);
            }
            $this->success('修改成功',U('index'));
        }
        

        // 获得所有属性 关联属性表 内容表 产品表
        $data = M('')->join("__product__ as p JOIN __product_cont__ as d ON p.pro_id=d.pro_id")->where("p.pro_id={$pro_id}")->find();
        $this->assign('data',$data);

        // 获得所有分类
        $cateData = K('Category')->all();
        // 为了方便性 还要进行树状排列
        $newCate = Data::tree($cateData,'ctitle','cid','pid');
        $this->assign('newCate',$newCate);


        
        // 获得所有品牌
        $bindData = k('Brand')->all();
        $this->assign('bindData',$bindData);


        // 获得属性
        $attrData =M('')->join("__attribute__ AS a JOIN __type_son__ AS t ON a.sid=t.sid")->where("pro_id={$pro_id}")->all();
        // 循环属性 把值变为数组 以便于好循环option
        foreach ($attrData as $k => $v) {
            $attrData[$k]['content']=explode(',',$v['content']);
        }
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
        $pro_id = Q("get.pro_id",0,'intval');
        // 删除产品表
        // 先删除图片
        $oldImg = K("Product")->where("pro_id={$pro_id}")->all();
        $list_thumb=dirname($oldImg[0]['list_img'])."/".ltrim(basename($oldImg[0]['list_img']),'list');
       
        is_file($oldImg[0]['list_img'])&&unlink($oldImg[0]['list_img']);
        is_file($list_thumb)&&unlink($list_thumb);
        $this->model->where("pro_id={$pro_id}")->delete();

        // 删除内容表
        // 先删除图片
        
         $oldImg = K("Product_cont")->where("pro_id={$pro_id}")->all();
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
          K("Product_cont")->where("pro_id={$pro_id}")->delete();
         // 删除属性表
         K("Attribute")->where("pro_id={$pro_id}")->delete();


         // 删除货品列表表
         K("Prolist")->where("pro_id={$pro_id}")->delete();
         $this->success('删除成功',U('index'));
    }





}