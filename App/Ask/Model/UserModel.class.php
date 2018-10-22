<?php 
namespace Ask\Model;
use Think\Model;
/**
 * 问答前台注册表单自动验证、映射、完成模型
 */
Class UserModel extends Model{

	//自动映射
	Protected $_map = array(
		'pwd' => 'password'
		);

	//自动验证
	Protected $_validate  = array(
		array('account', 'require', '账号不能为空'), 
		array('account', '/^[a-zA-Z]\w{5,11}$/s', '账号格式错误', 1, 'regex'),
		array('account', '', '账号已存在', 1, 'unique'),
		array('username', 'require', '用户名不能为空'),
		//array('username', '/^[x80-xff]\w{1,11}$/is', '用户名格式错误', 1, 'regex'),
		array('username', '', '用户名已存在', 1, 'unique'),
		array('password', 'require', '密码不能为空'),
		array('password', '/^\w{6,16}$/s', '密码格式错误', 1, 'regex'),
		array('pwded', 'require', '确认密码不能为空'),
		array('pwded', 'password', '两次密码不一致', 1, 'confirm')
		);

	//自动完成
	Protected $_auto = array(
		array('logintime', 'time', 1, 'function'),
		array('password', 'md5', 1, 'function'),
		array('loginip', 'get_client_ip', 1, 'function'),
		array('registime', 'time', 1, 'function')
		);
}
?>