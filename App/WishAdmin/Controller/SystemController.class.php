<?php 
namespace WishAdmin\Controller;
use Think\Controller;
/**
 * 系统管理控制器
 */
Class SystemController extends CommonController {

	//修改密码视图
	Public function index() {
		$this->display();
	}

	//修改密码处理
	Public function editPwd() {
		//读取原密码
		$password = M('wish_user')->where(array('username' => session('username')))->getField('password');
		//判断原密码是否正确
		if ($password != md5(I('password'))) {
			$this->error('原始密码错误');
		}
		//提取新密码并判断两次密码是否一致
		$newPwd = md5(I('newPwd'));
		if ($newPwd != md5(I('Pwded'))) {
			$this->error('两次密码不一致');
		}
		//更新密码
		if (M('wish_user')->where(array('username' => session('username')))->data(array('password' => $newPwd))->save()) {
			$this->success('修改成功', U('System/index'));
		} else {
			$this->error('修改失败');
		}
	}
}
?>