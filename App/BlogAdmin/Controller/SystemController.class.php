<?php 
namespace BlogAdmin\Controller;
use Think\Controller;
/**
 * 系统设置控制器
 */
Class SystemController extends CommonController{

	//修改密码视图
	Public function index(){
		$this->display();
	}

	//修改密码
	Public function editPwd(){
		if (!IS_POST) {
			E('页面不存在');
		}

		//查找原用户信息
		$username = I('username');
		$user = M('blog_user')->where(array('username' => $username))->find();

		//判断用户账号密码是否正确
		if ($user['password'] != md5(I('password'))) {
			$this->error('原密码错误');
		}
		//对比两次密码是否一致
		if (md5(I('newPwd') != md5(I('Pwded')))) {
			$this->error('两次密码不一致');
		}

		//组合用户新数据
		$data = array(
			'id' => $user['id'],
			'password' => md5(I('newPwd'))
			);
		//更新用户信息
		if (M('blog_user')->save($data)) {
			$this->success('修改成功');
		} else {
			$this->error('修改失败');
		}
	}

	//站点设置视图
	Public function site() {
		$this->site = SET('site', '', CONF_PATH);
		$this->display();
	}

	//修改网站信息操作
	Public function siteSet(){
		if(SET('blogSite', $_POST, CONF_PATH)){
			$this->success('设置成功', U('System/site'));
		} else {
			$this->error('设置失败');
		}
		
	}
}
?>