<?php
//测试控制器类
class IndexController extends CommonController{

    //动作方法
    public function index(){
        
       
        // 组合数组 二级分类 和 推荐商品
        $fatherData = K('category')->fatherAndSon();
        // 获得销量最高的产品
        $moreNum = M('')->join("__product__ AS p JOIN __brand__ AS b ON p.brand_bid=b.bid")->order('buy_num DESC')->all();
        // 获得大图轮播
        $bigsData = K("Carousel")->where("isimg=0")->all();
        $this->assign('bigsData',$bigsData);
        // 获得小图轮播 1200
        $smallsData = K("Carousel")->where("isimg=1")->all();
        $this->assign('smallsData',$smallsData);
        $modelsData = K("Carousel")->where("isimg=2")->all();
        $this->assign('modelsData',$modelsData);

        // 推荐全区域  需要建立一个大的数组 保存顶级id  和子集id 和分类下的文章
        foreach($fatherData as $k=>$v){
            // 得到当前所有子分类
            $cids=implode(K("Category")->getSonData($v['cid']),',');
            // 找到所有产品在分类下的
            $fatherData[$k]['proData']=K("Product")->where("cid in($cids)")->all();
        }
       
        // p($fatherData);
        // 分配数据
        $this->assign('fatherData',$fatherData);
        $this->assign('moreNum',$moreNum);
        $this->display();
    }
 
    /**
     * 退出登陆
     */
    public function close(){
        unset($_SESSION['username']);
        unset($_SESSION['uid']);
        go(U('Index/Index/index'));
    }
}
