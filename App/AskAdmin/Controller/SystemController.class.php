<?php 
namespace AskAdmin\Controller;
use Think\Controller;
/*
系统设置控制器
 */
Class SystemController extends CommonController{

	//修改密码视图
	Public function index(){
		$this->display();
	}

	//修改密码操作
	Public function editPwd(){
		if (!IS_POST) {
			E('页面不存在');
		}
		//组合查询条件 提取出原始密码
		$where = array('username' => session('username'));
		$pwd = M('admin')->where($where)->getField('password');

		//判断用户输入原始密码是否正确
		if ($pwd != I('oldPwd', '', 'md5')) {
			$this->error('原始密码错误');
		}

		//判断用户输入的两次密码是否一致
		$newPwd = I('newPwd', '', 'md5');
		if ($newPwd != I('newPwded', '', 'md5')) {
			$this->error('两次密码不一致');
		}

		//更新用户的密码
		if (M('admin')->where($where)->data(array('password' => $newPwd))->save()) {
			$this->success('修改成功', U('index'));
		} else {
			$this->error('修改失败');
		}
	}

	//修改站点信息视图
	Public function site(){
		$this->display();
	}

	//修改站点信息操作
	Public function setSite(){
		if (SET('askSite', $_POST, CONF_PATH)) {
			$this->success('修改成功', U('site'));
		} else {
			$this->error('修改失败');
		}	
	}
}
?>