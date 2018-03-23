<?php namespace Api\Controller; 
use Hdphp\Controller\Controller;
class ContentController extends Controller{
 public function index()
    {
    	 $data = Db::table('article')->where('aid',$_GET['id'])->first();
		 $content = Db::table('article_data')->where('article_aid',$_GET['id'])->first();
		 $data['content']=$content['content'];
    	 echo json_encode($data);
         exit;
    }
//添加收藏表
 public function addCollect()
 {
 	$id = Q('get.id',0);
	$uid = Q('get.uid',0);
	$data = Db::table('collect')->get();
	Db::table('collect')->insert(array('aid'=>$id,'user_uid'=>$uid));
	echo json_encode(1);die;
 }
 public function isCollect(){
 	$id = Q('get.id',0);
	$uid = Q('get.uid',0);
	$data = Db::table('collect')->where('aid',$id)->first();
	if($data){
		echo json_encode(1);
         die;
	}else{
		echo json_encode(2);
         die;
	}
 }
}