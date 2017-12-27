<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use Config;

/*
 *	公用父控制器
 *	全局通用方法
 *	@auth wzh
*/

class Home extends Controller{
	protected $logined = false;
	protected function initialize(){

		parent::initialize();
		$this->isLogin();
	}

	protected function isLogin(){
		
		$request = $this->request;
		$now_ctl = $request->controller();
		$user = session('user');
		if(!empty($user))
			$this->logined = true;
		if(empty($user)&&$now_ctl!='Login')		
				$this->redirect("admin/login/index");

	}

	protected function auth(){

	}

	protected function getMenu(){
		$user = session('user');
		if(empty($user))
			$this->redirect("admin/login/index");
		$auth_id = $user['AuthID'];
		$auth = new \app\admin\model\Auth;
		$menu_list = $auth ->getMenu($auth_id);

		return classfiy($menu_list,0);
	}
}