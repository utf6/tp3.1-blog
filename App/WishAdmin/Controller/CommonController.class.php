<?php 
namespace WishAdmin\Controller;
use Think\Controller;
/**
 * 后台公用控制器
 */
Class CommonController extends Controller{

	//判断用户是否登录
	Public function _initialize() {
		if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
			redirect(U('Login/index'));
		}

		$notAuth = in_array(MOUDLE_NAME, explode(',', C('NOT_AUTH_MOUDLE'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));
		$Rbac = new \Org\Util\Rbac();
		$Rbac::AccessDecision() || $this->error('没有权限');
	}
}
?>