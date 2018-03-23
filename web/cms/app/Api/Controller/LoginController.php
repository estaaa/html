<?php namespace Api\Controller; 

use Api\Controller;

//测试控制器
class LoginController extends Controller{
    //动作
	public function login(){
		$user = Db::table('user')->where("username",$_POST['username'])->first();
		if(empty($user))
		{
			$this->returnAjax(1,'帐号不存在');
		}
		if($user['password']!=md5($_POST['password']))
		{
			$this->returnAjax(1,'密码错误');
		}
		//令牌
		
		$this->returnAjax(
			0,
			array(
				'username'=>$user['username'],
				'uid'=>$user['uid'])
			);	
	}
}











