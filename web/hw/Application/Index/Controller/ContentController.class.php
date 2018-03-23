<?php
/**
* 产品详情页
*/
class ContentController extends CommonController
{
    private $model;
    public function __init(){
        parent::__init();
        $this->model=K('Product');
    }

    public function index(){
   
        // 获得id
        $pro_id = Q('get.pro_id',0,'intval');
        // 判断pro_id是否存在  为了使在浏览器上随意输入数字报错
        $isPro_id = K("Product")->where("pro_id={$pro_id}")->find();
        if(!$isPro_id){go(U("Index/Index/index"));}
        // 保存最近浏览的商品
        $_SESSION['pro_num'][]=$pro_id;
        // 获得分类信息
        $fatherData = K('category')->fatherAndSon();
        // 获得产品数据 关联产品内容表 品牌表 
        $proData = $this->model->proData($pro_id);

        // 获得规格
        $spec =K('Type_son')->where("is_edit=1 AND tid={$proData['type_tid']}")->all();
        // 循环把属性的值具体化
        // 属性的值可以通过商品属性表具体化
        foreach ($spec as $k => $v) {
           $arr = K('Attribute')->where("pro_id={$pro_id} AND sid={$v['sid']}")->all();
           // 判断是否选择了这个规格 如果选择了就加入数组 没有选择就删除
           if(!$arr){
               unset($spec[$k]);
           }else{
               $spec[$k]['content']= $arr;
           }
        }
        // p($spec);
        // 获得详情页的规格
        $content = M('')->join("__attribute__ AS a JOIN __type_son__ AS t ON a.sid=t.sid")->where("a.pro_id={$pro_id}")->all(); 

        // 获得最近浏览商品信息
        $history = array();
        foreach (array_unique($_SESSION['pro_num']) as $k => $v) {
            $history[] = K('Product')->where("pro_id={$v}")->find();
        }
        // 获得销量最高的产品
        $moreNum = M('')->join("__product__ AS p JOIN __brand__ AS b ON p.brand_bid=b.bid")->order('buy_num DESC')->all();
        // 获得所有评价信息
        $appData =M('')->join("__appraise__ AS a JOIN __protected__ AS p ON a.uid=p.user_uid")->all();
        $this->assign('appData',$appData);
        // 获得评价数量
        $num= count($appData);

        
        if(isset($_SESSION['uid'])){
           $uid = $_SESSION['uid'];
           // 查看用户是否购买了产品
           // 获得产品信息
           $nowData = current(K("buyinfo")->where("pro_id={$pro_id}")->all());
           if($nowData){
            // 得到订单表查看状态
            $isBuy = current(K("Add_info")->where("infoid={$nowData['infoid']}")->getField('is_buy',true));
            // 如果==1才可以评价
            $this->assign('isBuy',$isBuy);
           }
           // p($isBuy);
           // 查看当前用户是否提交过评论
           $isapp = K('Appraise')->where("uid={$uid}")->find();
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
        $this->display();
    }


    /**
     *判断库存是否为空
     */
    public function specAjax(){
        if(!IS_AJAX) $this->ajax(1);
        // 得到组合好的attid 并对字符串进行修饰 去除','
        $spec =rtrim($_POST['value'],',');
        // p($spec);
        $pro_id = Q("get.pro_id",0,'intval');
        // 查找属于该产品下的属性
        $specData = K("Prolist")->where("pro_id={$pro_id} and attrand='{$spec}'")->find();
        if(!$specData) $this->ajax(2);
        if($specData['stock']==0) $this->ajax(2);
        $this->ajax(4);
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
      
        $proData['con']=current(Cart::getAllData());
        // 获得图片地址
        foreach($proData['con'] as $k=>$v){
            $proData['con'][$k]['list_img']=current(K('Product')->where("pro_id={$v['id']}")->getField('list_img',true));
        }
       // p($proData);
        // 获得商品的数据
        $proData['numAll']=Cart::getTotalNums();
        $proData['allPic']=Cart::getTotalPrice();
         // 组合数组 进行返回
        $this->ajax($proData);
    }

    /**
     * 添加购物车
     */
    public function buyInfo(){
        if(!IS_AJAX){$this->error('非法访问');}
        // 判断用户是否登陆
        if(!isset($_SESSION['uid'])){$this->ajax(1);die;}
        // 获得组合好的规格属性id
        $spec = explode(',',rtrim($_POST['specs'],','));

        // 获得产品id
        $pro_id  = Q('get.pro_id',0,'intval');
        // 找到当前产品数据
        $proData = K('Product')->where("pro_id={$pro_id}")->find();
        
        // 添加收获地址表
        // 组合数组
        $data = array(
            'id'=>(int)$_GET['pro_id'],
            'name'=>$proData['p_title'],
            'price'=>(int)$proData['p_cost'],
            'options'=>$spec,
            'num' =>Q('post.buynum',0,'intval'),
            );
       Cart::add($data);
       // 获得当前产品数据并返回 以样式购物框信息
       foreach (Cart::getGoods() as $v) {
           if($v['id']==$pro_id){
            $newData = $v;
           }
       }
       // 组合数组 进行返回
      $this->ajax($newData);
    
    }
    public function addraise(){
        if(!IS_AJAX){$this->error('非法访问');}
        if($_POST['app_content']==''){$this->ajax(1);}
      // 添加数据
      $raiseModel = K('Appraise');
       // 获得添加评论id
       $appid = $raiseModel->addData();
       // 获得当前评论数据
       $raiseData = M()->join('__appraise__ AS a JOIN __protected__ AS p ON a.uid=p.user_uid')->where("a.app_id={$appid}")->find();
       // 获得所欲评论数
       $num = K("Appraise")->all();
       date_default_timezone_set('prc');
       $raiseData['publish_time']=date('y-m-d h:i:s',$raiseData['publish_time']);
       $raiseData['num']= count($num);
       $this->ajax($raiseData);
    }
}