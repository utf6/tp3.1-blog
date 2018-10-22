<?php 
namespace AskAdmin\Controller;
use Think\Controller;
/**
 * 前台用户管理
 */
Class UserController extends CommonController{

	//用户管理视图
	Public function index(){
		$db = M('user');

		$count = $db->count();
		$page = new \Think\Page($count, 6);
		$limit = $page->firstRow . ',' . $page->listRows;

		$this->user = M('user')->limit($limit)->select();
		$this->page = $page->show();
		$this->display();
	}

	//锁定或解锁用户
	Public function lock(){
		$lock = I('lock', 0, 'intval');
		$id = I('id', 'intval');

		// 1：锁定，0：解锁
		if ($lock) {
			$type = '锁定';
			$data = array(
				'lock' => 1,
				'id' => $id
			);
		} else {
			$type = '解锁';
			$data = array(
				'lock' => 0,
				'id' => $id
			);
		}

		//更新数据
		if (M('user')->save($data)) {
			$this->success($type.'成功', U('index'));
		} else {
			$this->error($type.'失败');
		}
	}
}
?>