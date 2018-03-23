<?php
namespace Home\Controller;
use Think\Controller;
class AuthController extends Controller{
    public function __construct(){
        parent::__construct();
        // 组合数组 二级分类 和 推荐商品
        $fatherData = D('Category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
		$linkData = D("Flink")->select();
       $this->assign('linkData',$linkData);
    }
}