<?php
namespace Home\Controller;
use Home\Controller\AuthController;
class ContentController extends AuthController {
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model=D('Product');
    }
    public function index(){
       // 获得id
       $pro_id = I('get.pro_id',0,'intval');
       // 判断pro_id是否存在  为了使在浏览器上随意输入数字报错
       $isPro_id =$this->model->where("pro_id={$pro_id}")->find();
       if(!$isPro_id){$this->redirect("Home/Index/index");}
       // 保存最近浏览的商品
       $_SESSION['pro_num'][]=$pro_id;
       // 获得分类信息
       $fatherData = D('category')->fatherAndSon();
       // 获得产品数据 关联产品内容表 品牌表 
       $proData = $this->model->proData($pro_id);
       // 获得规格
       $spec = D('Prolist')->getAttr($proData['type_tid'],$pro_id);
       
       // 获得详情页的规格
       $content = M('Attribute')->alias('a')->join("__TYPE_SON__ AS t ON a.sid=t.sid")->where("a.pro_id={$pro_id}")->select(); 

       // 获得最近浏览商品信息
       $history = array();
       foreach (array_unique($_SESSION['pro_num']) as $k => $v) {
           $history[] = D('Product')->where("pro_id={$v}")->find();
       }
       // 获得销量最高的产品
       $moreNum = M('Product')->alias('p')->join("__BRAND__ AS b ON p.brand_bid=b.bid")->order('buy_num DESC')->select();
       // 获得所有评价信息
       $appData =M('Appraise')->alias('a')->join("__PROTECTED__ AS p ON a.uid=p.user_uid")->select();
       $this->assign('appData',$appData);
       // 获得评价数量
       $num= count($appData);

       
       if(isset($_SESSION['uid'])){
          $uid = $_SESSION['uid'];
          // 查看用户是否购买了产品
          // 获得产品信息
          $nowData = current(D("buyinfo")->where("pro_id={$pro_id}")->select());
          if($nowData){
           // 得到订单表查看状态
           $isBuy = current(D("Add_info")->where("infoid={$nowData['infoid']}")->getField('is_buy',true));
           // 如果==1才可以评价
           $this->assign('isBuy',$isBuy);
          }
          // 查看当前用户是否提交过评论
          $isapp = D('Appraise')->where("uid={$uid}")->find();
          if($isapp){
             $this->assign('isapp',$isapp);
           }
             $this->assign('uid',$uid);
       }

       
       
       $this->assign('num',$num);
       // 分配数据
       $this->assign('fatherData',$fatherData);
       $this->assign('proData',$proData);
       $this->assign('spec',$spec);
       $this->assign('content',$content);
       $this->assign('history',$history);
       $this->assign('moreNum',$moreNum);
                    
       $this->show();
    }


    /**
     *判断库存是否为空
     */
    public function specAjax(){
        if(!IS_AJAX) $this->ajaxReturn(1);
        // 得到组合好的attid 并对字符串进行修饰 去除','
        $spec =rtrim($_POST['value'],',');
        // p($spec);
        $pro_id = I("get.pro_id",0,'intval');
        // 查找属于该产品下的属性
        $specData = D("Prolist")->where("pro_id={$pro_id} and attrand='{$spec}'")->find();
        if(!$specData) $this->ajaxReturn(2);
        if($specData['stock']==0) $this->ajaxReturn(2);
        $this->ajaxReturn(4);
    }
    /**
     * 清楚最近浏览
     */
    public function closed(){
        if(!IS_AJAX){return $this->error('非法访问');}
        if($_SESSION['pro_num']){
            echo 1;
            foreach ($_SESSION['pro_num'] as $k => $v) {
                echo $v;
                unset($_SESSION['pro_num'][$k]);
            }
        }

        
    }
    public function topBuy(){
        if(!IS_AJAX){$this->error('非法访问');}
        $car = new  \Think\Cart();
        $proData['con']=current($car::getAllData());
        // 获得图片地址
        foreach($proData['con'] as $k=>$v){
            $proData['con'][$k]['list_img']=current(D('Product')->where("pro_id={$v['id']}")->getField('list_img',true));
        }
       // p($proData);
        // 获得商品的数据
        $proData['numAll']=$car::getTotalNums();
        $proData['allPic']=$car::getTotalPrice();
         // 组合数组 进行返回
        $this->ajaxReturn($proData);
    }

    /**
     * 添加购物车
     */
    public function buyInfo(){
        if(!IS_AJAX){$this->error('非法访问');}
        // 判断用户是否登陆
        if(!isset($_SESSION['uid'])){$this->ajaxReturn(1);}
        // 获得组合好的规格属性id
        $spec = explode(',',rtrim($_POST['specs'],','));

        // 获得产品id
        $pro_id  = I('get.pro_id',0,'intval');
        // 找到当前产品数据
        $proData = D('Product')->where("pro_id={$pro_id}")->find();
        
        // 添加收获地址表
        // 组合数组
        $data = array(
            'id'=>(int)$_GET['pro_id'],
            'name'=>$proData['p_title'],
            'price'=>(int)$proData['p_cost'],
            'options'=>$spec,
            'num' =>I('post.buynum',0,'intval'),
            );
        $car = new  \Think\Cart();
       $car::add($data);
       // 获得当前产品数据并返回 以样式购物框信息
       foreach ($car::getGoods() as $v) {
           if($v['id']==$pro_id){
            $newData = $v;
           }
       }
       // 组合数组 进行返回
      $this->ajaxReturn($newData);
    
    }
    public function addraise(){
        if(!IS_AJAX){$this->error('非法访问');}
        if($_POST['app_content']==''){$this->ajaxReturn(1);}
      // 添加数据
      $raiseModel = D('Appraise');
       // 获得添加评论id
       $appid = $raiseModel->addData();
       // 获得当前评论数据
       $raiseData = M('Appraise')->alias('a')->join('__PROTECTED__ AS p ON a.uid=p.user_uid')->where("a.app_id={$appid}")->find();
       // 获得所欲评论数
       $num = D("Appraise")->SELECT();
       date_default_timezone_set('prc');
       $raiseData['publish_time']=date('y-m-d h:i:s',$raiseData['publish_time']);
       $raiseData['num']= count($num);
       $this->ajaxReturn($raiseData);
    }
}