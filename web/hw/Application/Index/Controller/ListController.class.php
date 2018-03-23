<?php
/**
* 列表页
*/
class ListController extends CommonController
{
    private $model;
    public function __init(){
        parent::__init();
        $this->model=K('Category');
    }
    public function index(){
        // 获得分类信息
        $fatherData = $this->model->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        
        // 获得cid
        $cid = Q('get.cid',0,'intval');
        // 判断cid是否存在  为了使在浏览器上随意输入数字报错
        $isCid = K("Category")->where("cid={$cid}")->find();
        if(!$isCid){go(U("Index/List/index",array('cid'=>1)));}
        // 面包屑无限极分类
        $data =$this->model->all();
        // 翻转数组
        $infiniteCate = array_reverse($this->getFather($cid,$data));
        // 获得当前分类的所有子集
        $cids = $this->model->getSonData($cid);
       if($cids){
        // 如果存在 
             // 获得分类 名字
            foreach ($cids as $v) {
                 $cidData[] = $this->model->where("cid={$v}")->find();
             }
             
       }else{
        // 没有分类 就把自己的同级存进去
        // 获得同级cid
        $cidcata=$this->model->peerData($cid);
         // 获得分类 名字
        foreach ($cidcata as $v) {
             $cidData[] = $this->model->where("cid={$v['cid']}")->find();
         }
        
            $cids[] = $cid;
       }
       $this->assign('cidData',$cidData);
       
            
        

        // 获得产品id
        $pro_ids = K('Product')->where("cid in(".implode(',',$cids).")")->getField('pro_id',true);
        // 判断分类id 不在的时候会报错
        if($pro_ids){
            // 通过商品pro_id获得属性 group 以avalue 分组
            $attr = K('Attribute')->where("pro_id in(".implode(',',$pro_ids).")")->group('avalue')->all();
            // 组合数组 让规格归类
            $tempAttr = array();
            foreach($attr as $v){
                $tempAttr[$v['sid']][]=$v;
            }
            
            // 最终组合 得到规格名字 和值
            $tempFinalAttr = array();
            foreach ($tempAttr as $sid=>$value) {

                $tempFinalAttr[]=array(
                    'name' => K('Type_son')->where("sid={$sid}")->getField('stitle'),
                    'value' =>$value,
                    );

            }
           $this->assign('tempFinalAttr',$tempFinalAttr);
            // 获得规格个数
            $num = count($tempFinalAttr);
            // 获得要搜索的规格 array_fill(0,$num,0) 填充数组 从第0为开始填充 填充对象 填充的内容
            $param = isset($_GET['param']) ? explode('_',$_GET['param']) : array_fill(0,$num,0);
            $this->assign('param',$param);
            // 进行筛选
            // 进行自己关联 把所有attid和得到的数组attid进行关联 把所有属于他们的产品iD找出来
         
            foreach ($param as $v) {
                // 获得的数组可能是空的 所以进行判断
                if($v){
                    $filterPro_ids[]=M()->join("__attribute__ AS a1 JOIN __attribute__ AS a2 ON a1.avalue=a2.avalue")->where("a1.attid={$v}")->getField('a2.pro_id',true);
                }
            }
           
            

            // 得到的也可能是空的 判断
            if(isset($filterPro_ids)){
                // 取交集  因为每一个条件都要进行判断 第二个条件过滤第一个条件 以此类推 只保留相同的id
                // 保存第一位 为循环做准备
                $finalPro_ids = $filterPro_ids[0];
                foreach ($filterPro_ids as $v) {
                    // 保存取过的交集的结果  array_intersect()取两个数组的交集
                    $finalPro_ids = array_intersect($finalPro_ids,$v);
                }
                // 取得产品pro_id交集之后 在和所属分类下的pro_id取交集
                $finalPro_ids = array_intersect($finalPro_ids,$pro_ids);
            }else{
                // 如果不存在 就等于分类下的所有文章
                $finalPro_ids = $pro_ids;
            }
            
        }else{
            // 如果分类id不存在 赋值为空数组
            $finalPro_ids = array();
        }
        if(!empty($finalPro_ids)){

            // 排序：
            // 1 2 是价格 3 4是评价 5 6是添加时间
            if(isset($_GET['num'])){
                // 再次重组数组 进行商品id的顺序调整
             $newData = array();
               $arr = K('Product')->all();
               foreach ($arr as $k => $v) {
                    $num = Q('get.num',0,'intval');
                    if($num==1){
                        $newData[0] = K('Product')->where("pro_id in(".implode(',',$finalPro_ids).")")->order('p_cost ASC')->getField('pro_id',true);
                    }else if($num==2){
                        $newData[0] = K('Product')->where("pro_id in(".implode(',',$finalPro_ids).")")->order('p_cost DESC')->getField('pro_id',true);
                    }else if($num==3){
                        $newData[0] = K('Product')->where("pro_id in(".implode(',',$finalPro_ids).")")->order('app_num ASC')->getField('pro_id',true);
                    }else if($num==4){
                        $newData[0] = K('Product')->where("pro_id in(".implode(',',$finalPro_ids).")")->order('app_num DESC')->getField('pro_id',true);
                    }else if($num==5){
                        $newData[0] = K('Product')->where("pro_id in(".implode(',',$finalPro_ids).")")->order('add_time ASC')->getField('pro_id',true);
                    }else if($num==6){
                        $newData[0] = K('Product')->where("pro_id in(".implode(',',$finalPro_ids).")")->order('add_time DESC')->getField('pro_id',true);
                    }
                }
                // 得到一维数组
                $finalPro_ids=current($newData);
            }
           
        }
       
        // 获得产品数组
        $proData = array();
        foreach ($finalPro_ids as $v) {
            $proData[]=K('Product')->where("pro_id={$v}")->find();
        }
      



        $this->assign('infiniteCate',$infiniteCate);
        $this->assign('proData',$proData);

        $this->display();
    }


   
    
}