<?php
/**
* 用户中心
*/
namespace Home\Controller;
use Home\Controller\AuthController;
class UserController extends AuthController
{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['username'])||!isset($_SESSION['uid'])){
            $this->redirect('Home/Index/index');
        }
    }
    
    public function index(){
        // 获得分类信息
        $fatherData = D('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得用户id
        $uid = (int)$_SESSION['uid'];
        $userData = M('User')->alias('u')->join("__PROTECTED__ AS p ON u.uid=p.user_uid")->where("user_uid={$uid}")->find();
        $this->assign('userData',$userData);
        // 得到所有未支付的订单
        $notPayment=D('Add_info')->where("user_uid={$uid} AND is_buy=0")->select();
        // 随意得到对应的一张订单信息的图片
        foreach ($notPayment as $k => $v) {
            $notPayment[$k]['img']=D('Buyinfo')->where("infoid={$v['infoid']}")->getField("img",true);
        }
        // 得到所有待评价的订单
        $Payment=D('Add_info')->where("user_uid={$uid} AND is_buy=1")->select();
        // 随意得到对应的一张订单信息的图片
        foreach ($Payment as $k => $v) {
            $Payment[$k]['img']=D('Buyinfo')->where("infoid={$v['infoid']}")->getField("img",true);
        }
        $this->assign('notPayment',$notPayment);
        $this->assign('Payment',$Payment);
        // p($notPayment);
        $this->show();
    }
    /**
     * 我的订单
     * @return [type] [description]
     */
    public function goods(){
        // 获得分类信息
        $fatherData =D('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得所有订单
        $uid = $_SESSION['uid'];
        // 此数组是全部订单和未支付订单
        $goodsData = D('Add_info')->where("user_uid={$uid} AND is_buy=0")->select();
        // 获得订单下的所有订单信息
        if($goodsData){
            $goodsData = $this->buyInfo($goodsData);
            $this->assign('goodsData',$goodsData);
        }
        
        // 获得待评价订单
        $notGoods = D('Add_info')->where("user_uid={$uid} AND is_buy=1")->select();
        if($notGoods){
             $notGoods = $this->buyInfo($goodsData);
             $this->assign('notGoods',$notGoods);
        }
        // 待收货
        $waitData = D('Add_info')->where("user_uid={$uid} AND is_buy=4")->select();
        if($waitData){
             $notGoods = $this->buyInfo($waitData);
             $this->assign('waitData',$waitData);
        }
        // 取消的订单
        $abolishData = D('Add_info')->where("user_uid={$uid} AND is_buy=5")->select();
        if($abolishData){
             $abolishData = $this->buyInfo($abolishData);
             $this->assign('abolishData',$abolishData);
        }
       // p($abolishData);
        
        
        $this->show();
    }

    /**
     * 我的退货
     * @return [type] [description]
     */
    public function returns(){
        // 获得分类信息
        $fatherData = D('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得用户id
        $uid = (int)$_SESSION['uid'];
        // 找到所有要退货的订单
        $returnsData=D('Add_info')->where("user_uid={$uid} AND is_buy=3")->select();
        $this->assign('returnsData',$returnsData);
        $this->show();
    }

    /**
     * 账号余额
     * @return [type] [description]
     */
    public function balance(){
        // 获得分类信息
        $fatherData = D('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得用户id
        $uid = (int)$_SESSION['uid'];
        // 找到所有要退货的订单
        $balanceData=D('Add_info')->where("user_uid={$uid} AND is_buy=3 OR is_buy=2 OR is_buy=0")->select();
        // 得到订单id和时间 获得商品 
        // 建立一个空数组 组合新数组 拼合 产品和时间
        $proData = array();
        foreach($balanceData as $k=>$v){
            // 获得订单下的产品
            $arrData = M('Product')->alias('p')->join("__BUYINFO__ AS b ON p.pro_id=b.pro_id")->where("b.infoid={$v['infoid']}")->select();
            foreach ($arrData as $key => $value) {
                $proData[$k]=$value;
                $proData[$k]['buy_time']=$v['buy_time'];
            }
            
        }
        // 剩余金额
        $endMoney=D("User")->where("uid={$uid}")->find();
        $this->assign('endMoney',$endMoney);

        // p($proData);
        $this->assign('proData',$proData);
        $this->show();
    }

    /**
     * 收货地址管理
     * @return [type] [description]
     */
    public function address(){
        // 获得分类信息
        $fatherData = D('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得所有收获地址
        $uid = $_SESSION['uid'];
        $addData = D('Add_address')->where("user_uid={$uid}")->select();
        // p($addData);
        $this->assign('addData',$addData);
        $this->show();
    }

    /**
     * 我的评价
     * @return [type] [description]
     */
    public function myraise(){
        // 获得分类信息
        $fatherData = D('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        $uid = $_SESSION['uid'];
        $appData = M('User')->alias('u')->join("__APPRAISE__ AS a ON u.uid=a.uid")->join('__PRODUCT__ AS p ON a.pro_id=p.pro_id')->where("a.uid={$uid}")->select();
        $this->assign('appData',$appData);
        // 获得当前用户的所有评论
        $this->show();
    }

    public function del(){
        $appid=I("get.app_id",0,'int');
        D("Appraise")->where("app_id={$appid}")->delete();
        $this->success('删除成功');
    }

    private function buyInfo($arr){
        foreach ($arr as $k => $v) {
            $arr[$k]['son']=D("Buyinfo")->where("infoid={$v['infoid']}")->select();
            // 得到产品名字
            foreach($arr[$k]['son'] as $kk=>$vv){
                $arr[$k]['son'][$kk]['p_title']=current(D('Product')->where("pro_id={$vv['pro_id']}")->getField('p_title',true));
            }
        }
        return $arr;
    }

    /**
     * 取消订单
     * @return [type] [description]
     */
    public function cancel(){
        // 获得要取消的订单id
        $infoid = I('get.infoid',0,'int');
        D('Add_info')->where("infoid={$infoid}")->save(array("is_buy"=>5));
        $this->success("取消成功");
    }
    /**
     * 恢复订单
     * @return [type] [description]
     */
    public function recover(){
        // 获得要恢复的订单id
        $infoid = I('get.infoid',0,'int');
        D('Add_info')->where("infoid={$infoid}")->save(array("is_buy"=>0));
        $this->success("恢复成功");
    }


    // 接收收货地址
    public function addressd(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 判断
        if(empty($_POST['add_people'])){$this->ajaxReturn(1);die;}
        if(empty($_POST['shop_city'])){$this->ajaxReturn(2);die;}
        if($_POST['shop_city']=='请选择省省,请选择市市,请选择县（区）'){$this->ajaxReturn(2);die;}
        if(empty($_POST['address'])){$this->ajaxReturn(3);die;}
        if($_POST['address']=='详细地址'){$this->ajaxReturn(3);die;}
        if(empty($_POST['add_iphoto'])){$this->ajaxReturn(4);die;}
        $_POST['user_uid']=$_SESSION['uid'];
        // 判断是添加还是修改
        if(isset($_POST['addid'])){
            $addid = $_POST['addid'];
            D('Add_address')->where("add_id={$addid}")->save($_POST);
        }else{
             D('Add_address')->add($_POST);
        }
       
        // 找到所属用户的所有订单信息
        $shopData = D('Add_address')->where("user_uid={$_POST['user_uid']}")->select();
        $this->ajaxReturn($shopData);
        // p($_POST);die;
    }
    public function edit(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 得到修改的id
        $addid = I('post.addid',0,'int');
        // 找到要修改的数据返回
        $editData = D('Add_address')->where("add_id={$addid}")->find();
        // 具体化城市
        $editData['shop_city']=explode(',',$editData['shop_city']);
        // p($editData);
        $this->ajaxReturn($editData);
        // p($editData);
    }

    /**
     * 删除收获地址
     */
    public function delAdd(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 得到修改的id
        $addid = I('post.addid',0,'int');
        D('Add_address')->where("add_id={$addid}")->delete();
    }

}