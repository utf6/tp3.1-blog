<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 前台首页视图
 */
Class IndexController extends Controller{

	//首页视图
	Public function index(){
		if (!$blog = S('index_list')) {
			$blog = D('BlogView')->order('addtime DESC')->limit(8)->select();
			S('index_list', $blog, 3600*24);
		}
		$this->blog = $blog;
		$this->display();
	}
}
?>