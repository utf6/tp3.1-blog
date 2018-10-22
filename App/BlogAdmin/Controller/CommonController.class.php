<?php
namespace BlogAdmin\Controller;
use Think\Controller;
/**
 * 后台公用控制器
 */
Class CommonController extends Controller{

	Public function _initialize(){
		if (!isset($_SESSION['uid'])) {
			redirect(U('Login/index'));
		}
	}
}
?>