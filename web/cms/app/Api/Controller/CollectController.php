<?php namespace Api\Controller; 
use Api\Controller;
class CollectController extends Controller{
		public function getAll(){
			$uid = Q('get.uid',0);
			$data = Db::table('article a')->join('collect c','a.aid','=','c.aid')->where("c.user_uid={$uid}")->get();
			echo json_encode($data);
	    	exit;
		}
		
		
		
}
	