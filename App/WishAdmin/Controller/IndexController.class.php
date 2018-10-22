<?php 
namespace WishAdmin\Controller;
use Think\Controller;
/**
 * 后台首页控制器
 */
Class IndexController extends CommonController {

	//首页控制器
	Public function index() {
		$this->display();
	}

	//登出处理
	Public function logout() {
		session_unset();
		session_destroy();
		redirect(U('Login/index'));
	}
	//欢迎页面
	Public function welcome() {
		$this->user = M('wish_user')->count();
		$this->wish = M('wish')->count();
		$this->display();
	}
}
?>