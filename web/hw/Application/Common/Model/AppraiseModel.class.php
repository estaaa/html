<?php
/**
* 商品评价表
*/
class AppraiseModel extends Model
{
    
    public $table="appraise";
    public function addData(){
        $_POST['uid'] = $_SESSION['uid'];
        $_POST['publish_time']=time();
        return $this->add($_POST);
    }
}