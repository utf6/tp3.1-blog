<?php 
namespace WishAdmin\Controller;
use Think\Controller;
/**
 * 登录控制器
 */
Class LoginController extends Controller{

	//登录视图
	Public function index() {
		$this->display();
	}

	//显示验证码
	Public function verify() {
		$config =    array(
		    'fontSize'    =>    35,    // 验证码字体大小 
		    'length'      =>    4,     // 验证码位数
		    'useNoise'    =>    false, // 关闭验证码杂点
		    );
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

	//登录处理
	Public function login() {
		$verify = new \Think\Verify();
		if (!$verify->check(I('verify'))) {
			$this->error('验证码错误');
		}

		$user = M('wish_user')->where(array('username' => I('username')))->find();
		//查找用户是否存在以及密码是否正确
		if (!$user || $user['password'] != md5(I('password'))) {
			$this->error('账号或密码错误');
		}

		if ($user['lock']) {
			$this->error('用户被锁定，请联系管理员');
		}

		$data = array(
			'logintime' => time(),
			'loginip' => get_client_ip()
			);

		if (M('wish_user')->where(array('id' => $user['id']))->save($data)) {
			session(C('USER_AUTH_KEY'), $user['id']);
			session('username', $user['username']);
			session('logintime', date('Y-m-d H:i:s', $user['logintime']));
			session('loginip', $user['loginip']);

			//判断用户是否为超级管理员
			if ($user['username'] == C('RBAC_SUPERADMIN')) {
				session(C('ADMIN_AUTH_KEY'), true);
			}
			//读取用户权限
			$Rbac = new \Org\Util\Rbac();
			$Rbac::saveAccessList(); 
			redirect(U('Index/index'));			
		}
	}
}
?>