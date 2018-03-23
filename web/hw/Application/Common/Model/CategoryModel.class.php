<?php
/**
* 分类表
*/
class CategoryModel extends Model
{
    public $table='category';


    public $validate = array(
        array('ctitle','nonull','分类不能为空',2,3),
        array('type_tid','nonull','所属分类不能为空',2,3),
        // array('htmldir','nonull','静态目录不能为空',2,3),
        array('ctitle','minlen:2','标题最短为2个字符',2,3),
        // array('htmldir','minlen:1','静态目录最短为1个字符',2,3),
        // array('htmldir','regexp:/^\w*$/','分类名称必须为数字下划线和字母组合')
        );




    public function fatherData(){
        $this->validate = array(
            array('ctitle','nonull','分类不能为空',2,3),
            array('ctitle','minlen:2','标题最短为2个字符',2,3),
            
            );
        if(!$this->create()) return false;
        $this->add();
        return true;
    }

    public function fatherEdit($cid){
        $this->validate = array(
            array('ctitle','nonull','分类不能为空',2,3),
            array('ctitle','minlen:2','标题最短为2个字符',2,3),
            
            );
        if(!$this->create()) return false;
        $this->where("cid={$cid}")->update();
        return true;
    }
    public function addData(){
        if(!$this->create()) return false;
        $this->add();
        return true;
    }
    public function edit($cid){
        // p($cid);
        if(!$this->create()) return false;
        $this->where("cid={$cid}")->update();
        return true;
    }

    /**
     * 获得同级分类
     */
    public function peerData($cid){
        // 获得父级pid
        $pid = current($this->where("cid={$cid}")->getField('pid',true));
        // 获得子类
        $peerData = $this->where("pid={$pid}")->all();
        return $peerData;
    }
    public function tidData($cid){
        $tid = current($this->where("cid={$cid}")->getField('type_tid',true));
        // 获得类型的规格
        $peerData = K('Type_son')->where("is_edit=1 AND tid={$tid}")->all();
        // 具体化类型值
        foreach ($peerData as $k => $v) {
            $peerData[$k]['content']=explode(',',$v['content']);
        }
        return $peerData;
    }

    /**
     * 获得当前所有子集分类cid
     */
    public function getSonData($cid){
        $data = $this->all();
        $arr = array();
        foreach ($data as $k => $v) {
            if($v['pid']==$cid){
                $arr[] = $v['cid'];
                $arr = array_merge($arr,$this->getSonData($v['cid'],$data));
            }

        }
        return $arr;
    }

    /**
     * 获得顶级下的所有产品
     * @param  [type] $cid        [cid]
     * @param  [type] $data       [全部分类]
     * @param  [type] $fatherData [所有顶级分类]
     * @return [array]             [所有产品]
     */
/*    public function getAllpro($cid,$data,$fatherData){
        // 两种情况 1顶级分类 2子集分类 判断
        // 获得顶级分类
        $pidData = array();
        foreach ($fatherData as $k => $v) {
            $pidData[]=$v['cid'];
        }
        // 判断当前是否是父级分类
        $is_pid = in_array($cid,$pidData);
        if($is_pid){
            // 获得当前所有子级分类
            $sonData = $this->getSonData($cid,$data);
            // 组合sql
            $where = implode(',',$sonData);
            // 获得所有子分类下的产品
            $nowData = K('product')->where("cid in($where)")->all();
        }else{
            $nowData = K('Product')->where("cid={$cid}")->all();
        }
        return $nowData;
    }*/



    /**
     *组合二级分类和推荐商品
     */
    public function fatherAndSon(){
        // 获得顶级分类 截取7条 因为网站只能放入7条
        $fatherData = $this->where('pid=0')->limit(7)->all();
        foreach($fatherData as $k=>$v){
            $fatherData[$k]['son']=$this->where("pid={$v['cid']}")->all();
            // 推荐产品 获得当前所有子集分类
            $cidAll = implode(',',$this->getSonData($v['cid'],$this->all()));
            // 找到产品是推荐的
            $fatherData[$k]['sustain'] = K('Product')->where("cid in($cidAll) AND is_sustain=1")->all();
        }
        return $fatherData;
        
    }


}