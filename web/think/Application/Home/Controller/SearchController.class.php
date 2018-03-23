<?php
/**
* 搜索控制器
*/
namespace Home\Controller;
use Home\Controller\AuthController;
class SearchController extends AuthController
{
    
    public function index(){
        // 获得分类信息
        $fatherData = D('Category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 判断搜索是否存在
        if(isset($_GET['keyword'])){
            $keyword = I('get.keyword','','string');
            if(isset($_GET['num'])){
                $num = I('get.num',0,'int');
                if($num==1){
                   $value = D('Product')->where("p_title LIKE '%".$keyword."%'")->order("p_cost ASC")->select();
                }else if($num==2){
                    $value = D('Product')->where("p_title LIKE '%".$keyword."%'")->order("p_cost DESC")->select();
                }else if($num==3){
                   $value = D('Product')->where("p_title LIKE '%".$keyword."%'")->order("app_num ASC")->select();
                }else if($num==4){
                   $value = D('Product')->where("p_title LIKE '%".$keyword."%'")->order("app_num DESC")->select();
                }else if($num==5){
                    $value =D('Product')->where("p_title LIKE '%".$keyword."%'")->order("add_time ASC")->select();
                }else if($num==6){
                   $value = D('Product')->where("p_title LIKE '%".$keyword."%'")->order("add_time DESC")->select();
                }
            }else{
                $value = D('Product')->where("p_title LIKE '%".$keyword."%'")->select();

            }
            
            $this->assign('value',$value);

            if(!empty($value)){
                $num = count($value);
                // 关键字为空的时候
                if($keyword==''){
                    $keyAndnum = array(
                            'key'=> '荣耀6',
                            'num'=>$num,
                        );
                }else{
                    // 保存关键字 和总数量
                    $keyAndnum = array(
                            'key'=> $keyword,
                            'num'=>$num,
                        );
                 }
              }else{
               $keyAndnum = array(
                    'key'=> '荣耀6',
                    'num'=>0,
                );
              }
              // 关键字不存在的时候
        }else{
            $keyAndnum = array(
                    'key'=> '荣耀6',
                    'num'=>0,
                );
        }
        $this->assign('keyAndnum',$keyAndnum);
        
        $this->show();
    }
}