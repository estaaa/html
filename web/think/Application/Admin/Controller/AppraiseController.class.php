<?php
/**
* 评价控制器
*/
namespace Admin\Controller;
use Admin\Controller\CommonController;
class AppraiseController extends CommonController
{
    public function index(){
        $appData = M('User')->alias('u')->join("__APPRAISE__ AS a ON u.uid=a.uid")->join('__PRODUCT__ AS p ON a.pro_id=p.pro_id')->select();
        // p($appData);
        $this->assign('appData',$appData);
        $this->display();
    }

    public function edit(){
        $appid = I("get.app_id",0,'int');
        if(IS_POST){
            D('Appraise')->where("app_id={$appid}")->save(array('app_content'=>$_POST['app_content']));
            $this->success('修改成功',U('Admin/Appraise/index'));
        }
        $oldData = D("Appraise")->where("app_id={$appid}")->find();
        // p($oldData);
        $this->assign("oldData",$oldData);
        $this->display();
    }

    public function del(){
        $appid = I("get.app_id",0,'int');
        D("Appraise")->where("app_id={$appid}")->delete();
        $this->success('删除成功',U('Admin/Appraise/index'));
    }
}