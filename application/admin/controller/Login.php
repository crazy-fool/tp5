<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use Config;

// use think\View;
	/*
	 *	登录控制器
	 *	author by wzh
	*/
class Login extends Home{


	public function index(){

		if($this->logined)
			$this->redirect("admin/index/index");

		return $this->fetch();
	}
	/*	登录操作
	 *	
	 *	@ return [code:200,msg:success];
	*/ 
	public function doLogin(){
		$res = [];

		if($this->logined){
			$res['code'] = 100;
			$res['msg'] = "登录成功";
			return json($res);
		}
		
		//	账号验证正则
		$namePreg = "/^\w+$/"; 
		$request = $this->request->param();
		// return $request['captcha'];
		if(empty($request['captcha']) || !captcha_check($request['captcha'])){
			$res['code'] = 101;
			$res['msg'] = "验证码不对-------";
			return $res;
		}
		if(preg_match($namePreg,$request['name'])){
		
			$adm = new \app\admin\model\Adm;
			$user = $adm->where('Name',$request['name'])->find();
			$pwd = md5('test'.$request['pwd']);
			if($pwd ==$user->Pwd){
				unset($user['pwd']);
				session('user',$user);
				$res['code'] = 100;
				$res['msg'] = "登录成功";
				return json($res);
			}else {
				// return YAN;
				$res['code'] = 101;
				$res['msg'] = "信息有误失败";
				return json($res);
			}
		}
		else {
			// return YAN;
			$res['code'] = 101;
			$res['msg'] = "信息有误";
			return json($res);
		}
		
	}
}