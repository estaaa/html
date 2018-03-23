<?php namespace Api\Controller; 
use Api\Controller;
class CategoryController extends Controller{
		public function all(){
		$data = Db::table('category')->get();
		echo json_encode($data);
	    exit;
    
		}
		    //返回分类下的文章
    public function catelist()
    {
    	
         //起始条
        $begin= Q('get.begin',0);
        //总条数
        $row = Q('get.row',10);
		$id = Q('get.id',0);
        $db = Db::table('article');
        $data = $db->where('category_cid',$id)->limit($begin,$row)->get();
       
        $this->returnAjax(0,$data);
    }
		
}		
	