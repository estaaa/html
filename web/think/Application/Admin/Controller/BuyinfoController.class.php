<?php
/**
* 订单控制器
*/
namespace Admin\Controller;
use Admin\Controller\CommonController;
class BuyinfoController extends CommonController
{
    public function  index(){
        // 获得所有订单
        $infoData = D('Add_info')->select();
        // p($infoData);
        $this->assign('infoData',$infoData);
        $this->display();
    }
    /**
     * 编辑
     */
    public function edit(){
        $infoid = I('get.infoid',0,'int');
        if(IS_POST){
            $addressModel = D('Add_info');
            if(!$addressModel->editData($infoid)){
            	$this->error($addressModel->getError());
			}		
        	$this->success('修改成功',U('index'));
        }
        
        $oldData = D('Add_info')->where("infoid={$infoid}")->find();
        $this->assign('oldData',$oldData);
        $this->display();
    }
    /**
     *删除
     */
    public function del(){
         $infoid = I('get.infoid',0,'int');
         D('Add_info')->where("infoid={$infoid}")->delete();
         $this->success('删除成功',U('index'));
    }
    /**
     * 订单信息
     */
    public function infoIndex(){
         $infoid = I('get.infoid',0,'int');
         // 获得当前所有订单信息
         $infoData=D('Buyinfo')->getAll($infoid);
         $this->assign('infoData',$infoData);
         $this->display();
    }
    /**
     * 修改订单信息
     */
    public function infoEdit(){
        $bid = I('get.bid',0,'intval');
        if(IS_POST){
            $BuyinfoModel = D('Buyinfo');
            // 获得addid
            $infoid = current(D('Buyinfo')->where("bid={$bid}")->getField('infoid',true));
			if(!$BuyinfoModel->editData($bid)){
				$this->error($BuyinfoModel->error);
			}
            $this->success('修改成功',U("Admin/Buyinfo/infoIndex/infoid/{$infoid}"));
        }
        // 获得当前订单信息
        $oldData = D('Buyinfo')->where("bid={$bid}")->find();
        $this->assign('oldData',$oldData);
        $this->display();
    }

    public function infodel(){
         $bid = I('get.bid',0,'intval');
         // 获得addid
         $infoid = current(D('Buyinfo')->where("bid={$bid}")->getField('infoid',true));
         D('Buyinfo')->where("bid={$bid}")->delete();
         $this->success('删除成功',U("Admin/Buyinfo/infoIndex/infoid/{$infoid}"));
    }

}