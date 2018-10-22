<?php
namespace Ask\Controller;
use Think\Controller;
/**
 * 问答前端注册控制器
 */
Class RegistController extends Controller{

	//注册操作处理
	Public function regist(){
		if (!IS_POST) {
			E('页面不存在');
		}

		if (C('ASK_IS_REGIS')) {
			$this->error('网站暂时关闭注册, 请联系管理员', U('Index/index'));
		}

		$db = D('User'); //实例化自动验证、完成模型
		if (!$db->create()) {
			$this->error($db->getError());
		}

		$username = $db->username;
		if (!$id = $db->add()) {
			$this->error('注册失败');
		}

		session('uid', $id);
		session('ask_login_username', $username);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//验证码
	Public function verify(){
		$config =    array(
		    'fontSize'    =>    30,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		    'useNoise'    =>    false, // 关闭验证码杂点
		    );
		//生成验证码
		$verify = new \Think\Verify($config);
		$verify->entry();
	}

	//异步验证账号是否存在
	Public function checkAccount(){
		if(!IS_POST){
			E('页面不存在');
		}

		//查找账号是否存在
		if (M('user')->where(array('account' => I('account', '', 'strtolower')))->find()) {
			$data['status'] = 1;
			echo json_encode($data);
		} else {
			$data['status'] = 0;
			echo json_encode($data);
		}
	}

	//异步验证验证码是否正确
	Public function checkVerify(){
		if (!IS_POST) {
			E('页面不存在');
		}

		$verify = new \Think\Verify();
		if (!$verify->check(I('verify'))) {
			$data['status'] = 1;
			echo json_encode($data);
		} else {
			$data['status'] = 0;
			echo json_encode($data);
		}
	}

	Public function checkUsername(){
		if (!IS_POST) {
			E('页面不存在');
		}

		$where = array('username' => I('username'));
		if (M('user')->where($where)->find()) {
			$data['status'] = 1;
			echo json_encode($data);
		} else {
			$data['status'] = 0;
			echo json_encode($data);
		}
	}

}
?>