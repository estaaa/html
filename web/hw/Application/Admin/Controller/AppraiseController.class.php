<?php
/**
* 评价控制器
*/
class AppraiseController extends AuthController
{
    public function index(){
        $appData = M()->join("__user__ AS u JOIN __appraise__ AS a ON u.uid=a.uid JOIN __product__ AS p ON a.pro_id=p.pro_id")->all();
        // p($appData);
        $this->assign('appData',$appData);
        $this->display();
    }

    public function edit(){
        $appid = Q("get.app_id",0,'intval');
        if(IS_POST){
            K('Appraise')->where("app_id={$appid}")->update(array('app_content'=>$_POST['app_content']));
            $this->success('修改成功',U('Admin/Appraise/index'));
        }
        $oldData = K("Appraise")->where("app_id={$appid}")->find();
        // p($oldData);
        $this->assign("oldData",$oldData);
        $this->display();
    }

    public function del(){
        $appid = Q("get.app_id",0,'intval');
        K("Appraise")->where("app_id={$appid}")->delete();
        $this->success('删除成功',U('Admin/Appraise/index'));
    }
}