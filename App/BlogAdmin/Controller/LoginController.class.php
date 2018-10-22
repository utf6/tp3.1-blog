<?php
namespace BlogAdmin\Controller;
use Think\Controller;
/**
 * 登录控制器
 */
Class LoginController extends Controller{

	//登录视图
	Public function index(){
		$this->display();
	}

	//验证码
	Public function verify(){
		$config = array(
			'fontSize' => 40,
			'length' => 4,
			'useNoise' => false
			);
		$verify = new \Think\Verify($config);
		$verify->entry();
	}

	//登录处理
	Public function login(){
		if (!IS_POST) {
			E('页面不存在');
		}
		//判断验证码是否正确
		$verify = new \Think\Verify();
		if (!$verify->check(I('verify'))) {
			$this->error('验证码错误');
		}
		//用户填写的帐号
		$username = I('username');
		//判断用户帐号密码是否正确
		$user = M('blog_user')->where(array('username' => $username))->find();
		if (!$user || $user['password'] != md5(I('password'))) {
			$this->error('帐号或密码错误');
		}
		//判断用户是否锁定
		if ($user['lock']) {
			$this->error('帐号被锁定');
		}
		//组合新的用户数据
		$data = array(
			'id' => $user['id'],
			'logintime' => time(),
			'loginip' => get_client_ip()
			);
		//更新用户信息
		M('blog_user')->save($data);
		//写入session
		session('uid', $user['id']);
		session('username', $user['username']);
		session('loginip', $user['loginip']);
		session('logintime', $user['logintime']);
		//跳转至首页
		redirect(U('Index/index'));
	}
}
?>