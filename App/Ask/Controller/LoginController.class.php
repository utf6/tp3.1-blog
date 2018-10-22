<?php
namespace Ask\Controller;
use Think\Controller;
/**
 * 问答前端登录控制器
 */
Class LoginController extends Controller{

	Public function login(){
		$account = I('account');
		$user = M('user')->where(array('account' => $account))->find();

		if (!$user || $user['password'] != md5(I('pwd'))) {
			$this->error('帐号密码不存在');
		}

		if($user['lock']){
			$this->error('用户被锁定');
		}

		if (isset($_POST['auto'])) {
			$value = $user['id'] . '|' . get_client_ip() . '|' . $user['username'];
			@setcookie('auto', encryption($value, 1), C('AUTO_LOGIN_LIVETIME'), '/');
		}

		$today = strtotime(date('Y-m-d'));
		if ($user['logintime'] < $today) {
			M('user')->where(array('id' => $user['id']))->setInc('exp', C('exp_login'));
		}

		$data = array(
			'id' => $user['id'],
			'logintime' => time(),
			'loginip' => get_client_ip()
			);
		M('user')->save($data);
		session('uid', $user['id']);
		session('ask_login_username', $user['username']);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//异步验证账号密码是否正确
	Public function checkLogin(){
		if (!IS_AJAX) {
			E('页面不存在');
		}

		$user = M('user')->where(array('account' => I('account')))->find();
		if (!$user || $user['password'] != I('password', '', 'md5')) {
			echo 0;
		} else {
			echo 1;
		}
	}
}
?>