<?php 
namespace AskAdmin\Controller;
use Think\Controller;
/*
奖励规则控制器
 */
Class RewardController extends CommonController{

	//金币奖励规则视图
	Public function index(){
		$this->gold = SET('goldRule', '', CONF_PATH);
		$this->display();
	}

	//修改金币规则处理
	Public function goldRule(){
		if (SET('goldRule', $_POST, CONF_PATH)) {
			$this->success('修改成功');
		} else {
			$this->error('修改失败');
		}
	}

	//经验等级规则视图
	Public function exper(){
		$this->display();
	}

	//
	Public function experRule(){
		if (SET('experRule', $_POST, CONF_PATH)) {
			$this->success('修改成功', U('exper'));
		} else {
			$this->error('修改失败');
		}
	}
}
?>