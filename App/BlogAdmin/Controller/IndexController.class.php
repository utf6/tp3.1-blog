<?php
namespace BlogAdmin\Controller;
use Think\Controller;
/**
 * 后台首页控制器
 */
Class IndexController extends CommonController{

	//首页视图
	Public function index(){
		$this->display();
	}

	//欢迎页面
	Public function welcome(){
		$this->display();
	}

	//退出登录
	Public function logOut(){
		session_unset();
		session_destroy();
		redirect(U('Login/index'));
	}
}
?> 