<?php
/**
* 前台总控制器
*/
class CommonController extends Controller
{
    
    public function __init(){
       // 友情链接
       $linkData = K("Flink")->all();
       $this->assign('linkData',$linkData);
    }



/*    // 获得分类
    protected function fatherData(){
        // 做分类  实例化分类表
        $cateModel = K('Category');
        // 获得顶级分类 截取7条 因为网站只能放入7条
        $fatherData = $cateModel->where('pid=0')->limit(7)->all();
        // 获得二级分类
        foreach($fatherData as $k=>$v){
            $fatherData[$k]['son']=$cateModel->where("pid={$v['cid']}")->all();
        }
        return $fatherData;
    }*/

    // 获得分类的父级
    public function getFather($cid,$data){
        $arr = array();
        foreach($data as $v){
            if($v['cid']==$cid){
                $arr[] = $v;
                $arr = array_merge($arr,$this->getFather($v['pid'],$data));
            }
        }
        return $arr;
    }


}