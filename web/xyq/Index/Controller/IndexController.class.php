<?php
class IndexController extends Controller{
  // 保存数据库路径
  private $path;
  // 保存数据库信息
  private $data;
  public function __construct(){
    $this->path = ROOT_PATH."/data.php";
    $this->data = include $this->path;
  }
	public function index(){
    $this->assign('data', $this->data);
		$this->display();
	}
  /*
  *接收ajax内容数据
   */
  public function ajax_data(){
    // 判断当名字和内容不为空的时候执行
    if(!empty($_POST['uname'])&&!empty($_POST['wish'])){
      // 获得时间
      $_POST['time'] = date('Y-m-d H:i:s');
      // 把数据的长度压进数据库
      $_POST['leng']=count($this->data);
      $this->data[] =$_POST;
      data_to_file($this->data, $this->path);
      // 把数据以json格式传出出去
      echo json_encode($_POST);
      return;
    }
    echo 0;
     
  }
  /*
  *接收ajax人气数据
   */
  public function ajax_renqi(){
    // 當沒有登陸的是否計算遞增
    if(!isset($_SESSION['uname'])){
       $num = $_POST['indnum'];
        $value=$_POST['ding']+1;
        $this->data[$num]['ding'] =$value;
        data_to_file($this->data, $this->path);
        echo json_encode($_POST);
    }
   
    
  }
    /*
    *刪除數據
     */
    public function delenum(){
      unset($this->data[$_POST['delenum']-1]);
      // echo $_POST['delenum'];
       data_to_file($this->data, $this->path);
       // unset($this->data[$_POST['delenum']-1]);
    }
 
}
?>