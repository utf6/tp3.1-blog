<?php
namespace AskAdmin\Controller;
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
			'fontSize' => 35,
			'length' => 4,
			'useNoise' => false
			);
		//生成验证码
		$verify = new \Think\Verify($config);
		$verify->entry();
	}

	//用户登录处理
	Public function login(){
		//判断验证码是否正确
		$verify = new \Think\Verify();
		if (!$verify->check(I('verify'))) {
			$this->error('验证码错误');
		}

		$db = M('admin');
		//判断用户信息是否正确
		$user = $db->where(array('username' => I('username')))->find();
		if (!$user || $user['password'] != md5(I('password'))) {
			$this->error('帐号或密码错误');
		}
		//判断用户是否被锁定
		if ($user['lock']) {
			$this->error('帐号被锁定！');
		}

		//组合新的数据
		$data = array(
			'id' => $user['id'],
			'logintime' => time(),
			'loginip' => get_client_ip()
			);
		//更新用户信息
		$db->save($data);
		//写入用户信息到session
		session('uid', $user['id']);
		session('username', $user['username']);
		session('logintime', date('Y-m-d H:i:s'));
		session('loginip', get_client_ip());
		//跳转到首页
		redirect(U('Index/index'));
	}



}
?>