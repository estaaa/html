<?php
/**
* 订单控制器
*/
namespace Home\Controller;
use Home\Controller\AuthController;
class AddressController extends AuthController
{   
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['username'])||!isset($_SESSION['uid'])){
            //$this->redirect(U("Home/Index/index"));
            $this->error('您还未登陆',U("Home/Index/index"));
        }
    }
    
    public function index(){
        $cart = new \Think\Cart();
        // 获得购物车产品数据
        $addData['con'] = $cart::getGoods();
        
        if(IS_AJAX){
            $sid = I('post.sid',0,'int');
            //加法
            if(isset($_POST['plusvall'])){
                $plusvall = I('post.plusvall',0,'int');
                $this->ajaxReturn(D('Add_address')->pluse($sid,$plusvall));
            }
            //减法
            if(isset($_POST['minusvall'])){
                $minusvall = I('post.minusvall','','string');
                $this->ajaxReturn(D('Add_address')->minus($sid,$minusvall));
            }
            $addData['con'] = $cart::getGoods();
        }

        // 得到产品图片地址 和产品属性 
        $addData['con'] = D('Add_address')->getSpec($addData['con']);
        
       // 获得商品的总数据
       // 获得商品的数据
       $addData['numAll']=$cart::getTotalNums();
       $addData['allPic']=$cart::getTotalPrice();
        $this->assign('addData',$addData);
        $this->display();
    }
    /**
     * 删除产品
     */
    public function close(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 获得产品id
        $sid = I('post.sid','','string');
        unset($_SESSION['cart']['goods'][$sid]);
        $cart = new \Think\Cart();
        $allPic = $cart::getTotalPrice();
        $this->ajaxReturn($allPic);
    }

    /**
     * 删除选中产品
     */
    public function closed(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 获得数据
        $sids = explode(',',rtrim(I('post.sids','','string'),','));
        // 删除选中的商品
        foreach ($sids as $k => $v) {
            unset($_SESSION['cart']['goods'][$v]);
        }
        // 获得产品id
        // $sid = Q('post.sid','','string');
        // unset($_SESSION['cart']['goods'][$sid]);
    }
    /**
     * 点击input获得价格
     */
    public function clickInput(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 获得数据
        $sids = explode(',',rtrim(I('post.sids','','string'),','));
        // p($_SESSION);
        // 获得价格
        $allPic=0;
        foreach ($sids as $k => $v) {
            $allPic += (int)$_SESSION['cart']['goods'][$v]['total'];
        }
        $this->ajaxReturn($allPic);
      
    }


    public function shopping(){
        // 获得提交过来的产品id
        $sids = explode(',',rtrim(I('post.sid','','string'),','));
        // 得到产品数据
        foreach ($sids as $k => $v) {
            $addData['con'][$v]=$_SESSION['cart']['goods'][$v];
        }
        // 得到产品图片地址 和产品属性 
         $addData['con'] = D('Add_address')->getSpec($addData['con']);
        // 获得商品的总数据
        // 获得商品的数据
        $cart = new \Think\Cart();
        $addData['numAll']=$cart::getTotalNums();
        $addData['allPic']=$cart::getTotalPrice();
        $this->assign('addData',$addData);
        // p($addData);
        // 获得用户订单表数据
        $uid = $_SESSION['uid'];
        $addressData = D('Add_address')->where("user_uid={$uid}")->select();
        if($addressData){
            $this->assign('addressData',$addressData);
        }
       
        $this->show();
    }

    // 接收收货地址
    public function address(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 判断//判断添加和修改的收获地址
        $this->ajaxReturn(D('Add_address')->isOk());
        // p($_POST);die;
    }
    public function edit(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 得到修改的id
        $addid = I('post.addid',0,'intval');
        // 找到要修改的数据返回
        $editData = D('Add_address')->where("add_id={$addid}")->find();
        // 具体化城市
        $editData['shop_city']=explode(',',$editData['shop_city']);
        $this->ajaxReturn($editData);
        // p($editData);
    }


    public function approve(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 得到修改的id
        $addid = I('post.addid',0,'intval');
        $this->ajaxReturn(D('Add_address')->addDefault($addid));
    }
    /**
     * 删除收获地址
     */
    public function delAdd(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 得到修改的id
        $addid = I('post.addid',0,'intval');
        D('Add_address')->where("add_id={$addid}")->delete();
    }

    public function allData(){
       if(IS_POST){
        // 添加数据
        $pro_ids =$_POST['pro_id'];
        $addid = I('post.add_id',0,'intval');
        if(!isset($addid)){$this->success('您还没有填写收货地址',U("Home/Index/index"));}
        // 添加订单表
        // 得到收获地址数据
        $dressData = D('Add_address')->where("add_id={$addid}")->find();
        // p($_POST);die;
        $dressData['pic_all']=$_POST['allPic'];
		
        $cart = new \Think\Cart();
        $dressData['info_code']=$cart::getOrderId();
		
        // 添加订单表 获得返回id
        $infoid = D('Add_info')->infoData($dressData);
		
        // 添加订单信息表
        // 组合数组
        foreach ($pro_ids as $k => $v) {
            $addData = array(
                'user_uid'=>$_SESSION['uid'],
                'pro_id'  =>$v,
                'buy_num' =>$_POST['buy_num'][$k],
                'pic'     =>$_POST['pic'][$k],
                'remark'  =>$_POST['remark'][$k],
                'add_id'  =>$_POST['add_id'],
                'infoid' =>$infoid,
                'img' =>$_POST['img'][$k],
                );
            D('Buyinfo')->add($addData);
        }
        // 得到sessionid 进行删除
        $sids = $_POST['sids'];
        foreach ($sids as $k => $v) {
            unset($_SESSION['cart']['goods'][$v]);
        }

       
       $this->success('添加成功',U('Home/Index/index'));
       }
    }











}