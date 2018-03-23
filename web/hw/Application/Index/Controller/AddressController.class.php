<?php
/**
* 订单控制器
*/
class AddressController extends CommonController
{   
    public function __init(){
        parent::__init();
        if(!isset($_SESSION['username'])||!isset($_SESSION['uid'])){
            go(U("Index/Index/index"));
        }
    }
    
    public function index(){
        // 获得购物车产品数据
        $addData['con'] = Cart::getGoods();
        
        if(IS_AJAX){
            $sid = Q('post.sid',0,'intval');
            if(isset($_POST['plusvall'])){
                $plusvall = Q('post.plusvall','','string');
                $data = array(
                 'num'=>(int)$plusvall+1,
                  'sid'=>$sid,
                );
                Cart::update($data);
                // 找到当前数据 返回ajax
                foreach (current(Cart::getAllData()) as $k => $v) {
                    
                    if($k==$sid){
                        $ajaxData = $v;
                        $ajaxData['nums']=Cart::getTotalNums();
                        $ajaxData['allPic']=Cart::getTotalPrice();
                    }
                }
                // p($ajaxData);die;
                $this->ajax($ajaxData);
            }
            if(isset($_POST['minusvall'])){
                $minusvall = Q('post.minusvall','','string');
                if($minusvall<=1){$this->ajax(1);}
                $data = array(
                 'num'=>(int)$minusvall-1,
                  'sid'=>$sid,
                );
                Cart::update($data);
                // 找到当前数据 返回ajax
                foreach (current(Cart::getAllData()) as $k => $v) {
                    if($k==$sid){
                        $ajaxData = $v;
                        $ajaxData['nums']=Cart::getTotalNums();
                        $ajaxData['allPic']=Cart::getTotalPrice();
                    }
                }
                 $this->ajax($ajaxData);
            }
            $addData['con'] = Cart::getGoods();
        }

        // 得到产品图片地址 和产品属性 
        foreach ($addData['con'] as $k => $v) {
            // 获得图片
            $addData['con'][$k]['img']=current(K('Product')->where("pro_id={$v['id']}")->getField('list_img',true));
            // 获得产品属性
            $avalue=K('Attribute')->where("pro_id={$v['id']} AND attid in(".implode(',',$v['options']).")")->all();
            // 把产品属性变为字符串
            foreach($avalue as $kk=>$vv){
                $avalue[$kk]=$vv['avalue'];
            }
            $addData['con'][$k]['options']=implode(',',$avalue);
        }
       // 获得商品的总数据
       // 获得商品的数据
       $addData['numAll']=Cart::getTotalNums();
       $addData['allPic']=Cart::getTotalPrice();
        $this->assign('addData',$addData);
        $this->display();
    }
    /**
     * 删除产品
     */
    public function close(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 获得产品id
        $sid = Q('post.sid','','string');
        unset($_SESSION['cart']['goods'][$sid]);
        $allPic = Cart::getTotalPrice();
        $this->ajax($allPic);
    }

    /**
     * 删除选中产品
     */
    public function closed(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 获得数据
        $sids = explode(',',rtrim(Q('post.sids','','string'),','));
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
        $sids = explode(',',rtrim(Q('post.sids','','string'),','));
        // p($_SESSION);
        // 获得价格
        $allPic=0;
        foreach ($sids as $k => $v) {
            $allPic += (int)$_SESSION['cart']['goods'][$v]['total'];
        }
        $this->ajax($allPic);
      
    }


    public function shopping(){
        // 获得提交过来的产品id
        $sids = explode(',',rtrim(Q('post.sid','','string'),','));
        // 得到产品数据
        foreach ($sids as $k => $v) {
            $addData['con'][$v]=$_SESSION['cart']['goods'][$v];
        }
         // 得到产品图片地址 和产品属性 
         foreach ($addData['con'] as $k => $v) {
             // 获得图片
             $addData['con'][$k]['img']=current(K('Product')->where("pro_id={$v['id']}")->getField('list_img',true));
             // 获得产品属性
             $avalue=K('Attribute')->where("pro_id={$v['id']} AND attid in(".implode(',',$v['options']).")")->all();
             // 把产品属性变为字符串
             foreach($avalue as $kk=>$vv){
                 $avalue[$kk]=$vv['avalue'];
             }
             $addData['con'][$k]['options']=implode(',',$avalue);
         }
        // 获得商品的总数据
        // 获得商品的数据
        $addData['numAll']=Cart::getTotalNums();
        $addData['allPic']=Cart::getTotalPrice();
        $this->assign('addData',$addData);
        // p($addData);
        // 获得用户订单表数据
        $uid = $_SESSION['uid'];
        $addressData = K('Add_address')->where("user_uid={$uid}")->all();
        if($addressData){
            $this->assign('addressData',$addressData);
        }
       
        $this->display();
    }

    // 接收收货地址
    public function address(){
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
        $this->ajax($editData);
        // p($editData);
    }


    public function approve(){
        if(!IS_AJAX){$this->error('非法操作');}
        // 得到修改的id
        $addid = Q('post.addid',0,'intval');
        // 获得uid
        $_POST['is_add']=0;
        $uid = $_SESSION['uid'];
         K('Add_address')->where("user_uid={$uid}")->update();
        $_POST['is_add']=1;
        K('Add_address')->where("add_id={$addid}")->update();
        // 找到所属用户的所有订单信息
        $shopData = K('Add_address')->where("user_uid={$uid}")->all();
        $this->ajax($shopData);
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

    public function allData(){
        // p($_POST);die;
       if(IS_POST){
        // 添加数据
        $pro_ids = $_POST['pro_id'];
        if(!isset($_POST['add_id'])){$this->success('您还没有填写收货地址',U("Index/Index/index"));}
        // 添加订单表
        // 获的收获地址id
        $addid = Q('post.add_id',0,'intval');
        // 得到收获地址数据
        $dressData = K('Add_address')->where("add_id={$addid}")->find();
        // p($_POST);die;
        $dressData['pic_all']=$_POST['allPic'];
        $dressData['info_code']=Cart::getOrderId();
        // 添加订单表 获得返回id
        $infoid = K('Add_info')->infoData($dressData);
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
            K('Buyinfo')->add($addData);
        }
        // 得到sessionid 进行删除
        $sids = $_POST['sids'];
        foreach ($sids as $k => $v) {
            unset($_SESSION['cart']['goods'][$v]);
        }

       
       $this->success('添加成功',U('Index/Index/index'));
       }
    }











}