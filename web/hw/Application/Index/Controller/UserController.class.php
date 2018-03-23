<?php
/**
* 用户中心
*/
class UserController extends CommonController
{
    public function __init(){
        parent::__init();
        if(!isset($_SESSION['username'])||!isset($_SESSION['uid'])){
            go(U('Index/Index/index'));
        }
    }
    
    public function index(){
        // 获得分类信息
        $fatherData = K('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得用户id
        $uid = (int)$_SESSION['uid'];
        $userData = M('')->join("__user__ AS u JOIN __protected__ AS p ON u.uid=p.user_uid")->where("user_uid={$uid}")->find();
        $this->assign('userData',$userData);
        // 得到所有未支付的订单
        $notPayment=K('Add_info')->where("user_uid={$uid} AND is_buy=0")->all();
        // 随意得到对应的一张订单信息的图片
        foreach ($notPayment as $k => $v) {
            $notPayment[$k]['img']=K('Buyinfo')->where("infoid={$v['infoid']}")->getField("img",true);
        }
        // 得到所有待评价的订单
        $Payment=K('Add_info')->where("user_uid={$uid} AND is_buy=1")->all();
        // 随意得到对应的一张订单信息的图片
        foreach ($Payment as $k => $v) {
            $Payment[$k]['img']=K('Buyinfo')->where("infoid={$v['infoid']}")->getField("img",true);
        }
        $this->assign('notPayment',$notPayment);
        $this->assign('Payment',$Payment);
        // p($notPayment);
        $this->display();
    }
    /**
     * 我的订单
     * @return [type] [description]
     */
    public function goods(){
        // 获得分类信息
        $fatherData = K('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得所有订单
        $uid = $_SESSION['uid'];
        // 此数组是全部订单和未支付订单
        $goodsData = K('Add_info')->where("user_uid={$uid} AND is_buy=0")->all();
        // 获得订单下的所有订单信息
        if($goodsData){
            $goodsData = $this->buyInfo($goodsData);
            $this->assign('goodsData',$goodsData);
        }
        
        // 获得待评价订单
        $notGoods = K('Add_info')->where("user_uid={$uid} AND is_buy=1")->all();
        if($notGoods){
             $notGoods = $this->buyInfo($goodsData);
             $this->assign('notGoods',$notGoods);
        }
        // 待收货
        $waitData = K('Add_info')->where("user_uid={$uid} AND is_buy=4")->all();
        if($waitData){
             $notGoods = $this->buyInfo($waitData);
             $this->assign('waitData',$waitData);
        }
        // 取消的订单
        $abolishData = K('Add_info')->where("user_uid={$uid} AND is_buy=5")->all();
        if($abolishData){
             $abolishData = $this->buyInfo($abolishData);
             $this->assign('abolishData',$abolishData);
        }
       // p($abolishData);
        
        
        $this->display();
    }

    /**
     * 我的退货
     * @return [type] [description]
     */
    public function returns(){
        // 获得分类信息
        $fatherData = K('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得用户id
        $uid = (int)$_SESSION['uid'];
        // 找到所有要退货的订单
        $returnsData=K('Add_info')->where("user_uid={$uid} AND is_buy=3")->all();
        $this->assign('returnsData',$returnsData);
        // p($returnsData);
        $this->display();
    }

    /**
     * 账号余额
     * @return [type] [description]
     */
    public function balance(){
        // 获得分类信息
        $fatherData = K('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得用户id
        $uid = (int)$_SESSION['uid'];
        // 找到所有要退货的订单
        $balanceData=K('Add_info')->where("user_uid={$uid} AND is_buy=3 OR is_buy=2 OR is_buy=1")->all();
        // 得到订单id和时间 获得商品 
        // 建立一个空数组 组合新数组 拼合 产品和时间
        $proData = array();
        foreach($balanceData as $k=>$v){
            // 获得订单下的产品
            $arrData = M('')->join("__product__ AS p JOIN __buyinfo__ AS b ON p.pro_id=b.pro_id")->where("b.infoid={$v['infoid']}")->all();
            foreach ($arrData as $key => $value) {
                $proData[$k]=$value;
                $proData[$k]['buy_time']=$v['buy_time'];
            }
            
        }
        // 剩余金额
        $endMoney=K("User")->where("uid={$uid}")->find();
        $this->assign('endMoney',$endMoney);

        // p($proData);
        $this->assign('proData',$proData);
        $this->display();
    }

    /**
     * 收货地址管理
     * @return [type] [description]
     */
    public function address(){
        // 获得分类信息
        $fatherData = K('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        // 获得所有收获地址
        $uid = $_SESSION['uid'];
        $addData = K('Add_address')->where("user_uid={$uid}")->all();
        // p($addData);
        $this->assign('addData',$addData);
        $this->display();
    }

    /**
     * 我的评价
     * @return [type] [description]
     */
    public function myraise(){
        // 获得分类信息
        $fatherData = K('category')->fatherAndSon();
        $this->assign('fatherData',$fatherData);
        $uid = $_SESSION['uid'];
        $appData = M()->join("__user__ AS u JOIN __appraise__ AS a ON u.uid=a.uid JOIN __product__ AS p ON a.pro_id=p.pro_id")->where("a.uid={$uid}")->all();
        p($appData);
        $this->assign('appData',$appData);
        // 获得当前用户的所有评论
        $this->display();
    }

    public function del(){
        $appid=Q("get.app_id",0,'intval');
        K("Appraise")->where("app_id={$appid}")->delete();
        $this->success('删除成功');
    }

    private function buyInfo($arr){
        foreach ($arr as $k => $v) {
            $arr[$k]['son']=K("Buyinfo")->where("infoid={$v['infoid']}")->all();
            // 得到产品名字
            foreach($arr[$k]['son'] as $kk=>$vv){
                $arr[$k]['son'][$kk]['p_title']=current(K('Product')->where("pro_id={$vv['pro_id']}")->getField('p_title',true));
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
        $infoid = Q('get.infoid',0,'intval');
        K('Add_info')->where("infoid={$infoid}")->update(array("is_buy"=>5));
        $this->success("取消成功");
    }
    /**
     * 恢复订单
     * @return [type] [description]
     */
    public function recover(){
        // 获得要恢复的订单id
        $infoid = Q('get.infoid',0,'intval');
        K('Add_info')->where("infoid={$infoid}")->update(array("is_buy"=>0));
        $this->success("恢复成功");
    }


    // 接收收货地址
    public function addressd(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 判断
        if(empty($_POST['add_people'])){$this->ajax(1);die;}
        if(empty($_POST['shop_city'])){$this->ajax(2);die;}
        if($_POST['shop_city']=='请选择省省,请选择市市,请选择县（区）'){$this->ajax(2);die;}
        if(empty($_POST['address'])){$this->ajax(3);die;}
        if($_POST['address']=='详细地址'){$this->ajax(3);die;}
        if(empty($_POST['add_iphoto'])){$this->ajax(4);die;}
        $_POST['user_uid']=$_SESSION['uid'];
        // 判断是添加还是修改
        if(isset($_POST['addid'])){
            $addid = $_POST['addid'];
            K('Add_address')->where("add_id={$addid}")->update();
        }else{
             K('Add_address')->add();
        }
       
        // 找到所属用户的所有订单信息
        $shopData = K('Add_address')->where("user_uid={$_POST['user_uid']}")->all();
        $this->ajax($shopData);
        // p($_POST);die;
    }
    public function edit(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 得到修改的id
        $addid = Q('post.addid',0,'intval');
        // 找到要修改的数据返回
        $editData = K('Add_address')->where("add_id={$addid}")->find();
        // 具体化城市
        $editData['shop_city']=explode(',',$editData['shop_city']);
        // p($editData);
        $this->ajax($editData);
        // p($editData);
    }

    /**
     * 删除收获地址
     */
    public function delAdd(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 得到修改的id
        $addid = Q('post.addid',0,'intval');
        K('Add_address')->where("add_id={$addid}")->delete();
    }

}