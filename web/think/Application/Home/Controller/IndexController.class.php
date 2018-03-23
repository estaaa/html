<?php
namespace Home\Controller;
use Home\Controller\AuthController;
class IndexController extends AuthController {
        public function index(){
           // 组合数组 二级分类 和 推荐商品
           $fatherData = D('Category')->fatherAndSon();
           // 获得销量最高的产品
           $moreNum = M('Product')->alias('p')->join("__BRAND__ AS b ON p.brand_bid=b.bid")->order('p.buy_num DESC')->select();
           // 获得大图轮播
           $bigsData = D("Carousel")->where("isimg=0")->select();
           $this->assign('bigsData',$bigsData);
           // 获得小图轮播 1200
           $smallsData = D("Carousel")->where("isimg=1")->select();
           $this->assign('smallsData',$smallsData);
           $modelsData = D("Carousel")->where("isimg=2")->select();
           $this->assign('modelsData',$modelsData);

           // 推荐全区域  需要建立一个大的数组 保存顶级id  和子集id 和分类下的文章
           foreach($fatherData as $k=>$v){
               // 得到当前所有子分类
               $cids=implode(D("Category")->getSonData($v['cid']),',');
               // 找到所有产品在分类下的
               $fatherData[$k]['proData']=D("Product")->where("cid in($cids)")->select();
           }
           
           // p($fatherData);
           // 分配数据
           $this->assign('fatherData',$fatherData);
           $this->assign('moreNum',$moreNum);
           $this->show();
        }
        
        /**
         * 退出登陆
         */
        public function close(){
            unset($_SESSION['username']);
            unset($_SESSION['uid']);
            $this->redirect('Home/Index/index');
        }
    
}