<?php 
namespace Ask\Controller;
use Think\Controller;

/**
 * 问答前端公用控制器
 */
Class CommonController extends Controller{

	//自动运行方法
	Public function _initialize(){
		//判断用户已自动登陆并且不在登录状态
		if ($_COOKIE['auto'] || !$_SESSION['uid']) {			
			$info = explode('|', encryption($_COOKIE['auto']));

			//如果和上次Ip一致将不需要登陆	
			if ($info['1'] == get_client_ip()) {

				//更新用户信息
				$where = array('id' => $info[0], 'username' => $info[2]);
				$data = array(
					'logintime' => time(), 
					'loginip' => get_client_ip()
					);
				M('user')->where($where)->data($data)->save();
				session('uid', $info['0']);
				session('ask_login_username', $info['2']);
			}
		}
		$this->count_ask = M('ask')->count();
	}
}
?>