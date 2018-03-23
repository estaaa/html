<?php
/**
* 搜索控制器
*/
class SearchController extends CommonController
{
    
    public function index(){
        // 获得分类信息
        $fatherData = K('Category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 判断搜索是否存在
        if(isset($_GET['keyword'])){
            $keyword = Q('get.keyword','','string');
            if(isset($_GET['num'])){
                $num = Q('get.num',0,'intval');
                if($num==1){
                   $value = K('Product')->where("p_title LIKE '%".$keyword."%'")->order("p_cost ASC")->all();
                }else if($num==2){
                    $value = K('Product')->where("p_title LIKE '%".$keyword."%'")->order("p_cost DESC")->all();
                }else if($num==3){
                   $value = K('Product')->where("p_title LIKE '%".$keyword."%'")->order("app_num ASC")->all();
                }else if($num==4){
                   $value = K('Product')->where("p_title LIKE '%".$keyword."%'")->order("app_num DESC")->all();
                }else if($num==5){
                    $value = K('Product')->where("p_title LIKE '%".$keyword."%'")->order("add_time ASC")->all();
                }else if($num==6){
                   $value = K('Product')->where("p_title LIKE '%".$keyword."%'")->order("add_time DESC")->all();
                }
            }else{
                $value = K('Product')->where("p_title LIKE '%".$keyword."%'")->all();

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
        
        $this->display();
    }
}