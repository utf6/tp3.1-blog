<?php
namespace AskAdmin\Controller;
use Think\Controller;
/**
 * 公用控制器
 */
Class CommonController extends Controller{

	//判断用户是否登录
	Public function _initialize(){
		if (!$_SESSION['uid']) {
			redirect(U('Login/index'));
		}
	}
}
?>