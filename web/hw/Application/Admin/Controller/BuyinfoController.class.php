<?php
/**
* 订单控制器
*/
class BuyinfoController extends AuthController
{
    public function  index(){
        // 获得所有订单
        $infoData = K('Add_info')->all();
        // p($infoData);
        $this->assign('infoData',$infoData);
        $this->display();
    }
    /**
     * 编辑
     */
    public function edit(){
        $infoid = Q('get.infoid',0,'intval');
        if(IS_POST){
            $addressModel = K('Add_info');
            if(!$addressModel->editData($infoid)){$this->error($addressModel->error);}
            $this->success('修改成功',U('index'));
        }
        
        $oldData = K('Add_info')->where("infoid={$infoid}")->find();
        $this->assign('oldData',$oldData);
        $this->display();
    }
    /**
     *删除
     */
    public function del(){
         $infoid = Q('get.infoid',0,'intval');
         K('Add_info')->where("infoid={$infoid}")->delete();
         $this->success('删除成功',U('index'));
    }
    /**
     * 订单信息
     */
    public function infoIndex(){
         $infoid = Q('get.infoid',0,'intval');
         // 获得当前所有订单信息
         $infoData = K('Buyinfo')->where("infoid={$infoid}")->all();
         foreach ($infoData as $k => $v) {
             $infoData[$k]['pro_id']=current(K('Product')->where("Pro_id={$v['pro_id']}")->getField('p_title',true));
         }
         $this->assign('infoData',$infoData);
        $this->display();
    }
    /**
     * 修改订单信息
     */
    public function infoEdit(){
        $bid = Q('get.bid',0,'intval');
        if(IS_POST){
            $BuyinfoModel = K('Buyinfo');
            // 获得addid
            $infoid = current(K('Buyinfo')->where("bid={$bid}")->getField('infoid',true));

            if(!$BuyinfoModel->editData($bid)){$this->error($BuyinfoModel->error);}
            $this->success('修改成功',U("Admin/Buyinfo/infoIndex/infoid/{$infoid}"));
        }
        // 获得当前订单信息
        $oldData = K('Buyinfo')->where("bid={$bid}")->find();
        $this->assign('oldData',$oldData);
        $this->display();
    }

    public function infodel(){
         $bid = Q('get.bid',0,'intval');
         // 获得addid
         $infoid = current(K('Buyinfo')->where("bid={$bid}")->getField('infoid',true));
         K('Buyinfo')->where("bid={$bid}")->delete();
         $this->success('删除成功',U("Admin/Buyinfo/infoIndex/infoid/{$infoid}"));
    }

}