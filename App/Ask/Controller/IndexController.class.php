<?php
namespace Ask\Controller;
use Think\Controller;
/**
 * 问答首页控制器
 */
class IndexController extends CommonController {

	//首页视图
	Public function index(){
		//将栏目生成缓存一星期
		if (S('index_cate')) {
			$cate = S('index_cate');
		} else {			
			$cate = getCateLayer(M('category')->select());
			S('index_cate', $cate, 3600*24*7);
		}
		$this->cate = $cate;

		//待解决问题
		$this->wait_solve_ask = M('ask')->where(array('solved' => 0))->limit(15)->select();

		//高悬赏问题
		$this->high_reward_ask = M('ask')->where(array('reward' => array('gt', 0)))->limit(15)->select();
		$this->display();
	}

	//退出登录
	Public function loginOut(){
		session_unset();
		session_destroy();
		setcookie('auto', '', time()-100, '/');

		redirect(U('Index/index'));
	}
}