<?php
 namespace app\admin\model;

 use think\Model;

 class Auth extends Model{
 	// protected $table = '';
 	// public function getPassword($name){

 	// }
 	
 	/*
 	 *	根据 auth_id 获取menu列表
 	 *	@param auth_id 权限角色id
 	*/

 	public function getMenu($auth_id){
 		return $this->table('role_auth')->alias('ra')->field('r.*')->join(['role'=>'r'],'ra.RoleID=r.ID')->where([['ra.AuthID','=',$auth_id],['r.Type','=',0]])->select();
 	}	
 }
