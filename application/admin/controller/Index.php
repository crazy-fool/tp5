<?php 
namespace app\admin\controller;

/*
 *	
 *
*/
class Index extends Home{

	public function index(){
		$menu = $this->getMenu();
		$this->assign('menu',$menu); 
		// $this->redirect("admin/login/index");
		return $this->fetch();
	}
	// public function 
}