<?php 
namespace AskAdmin\Controller;
use Think\Controller;
/**
 * 前台问题管理控制器
 */
Class AskController extends CommonController{

	//所有问题管理视图
	Public function index(){
		$ask = M('ask')->select();
		foreach ($ask as $v) {
			$v['name'] = M('category')->where(array('id' => $v['cid']))->getField('name');
			$v['asker'] = M('user')->where(array('id'  => $v['uid']))->getField('username');
			$data[] = $v;
		}

		//计算数组元素总个数                            
   		$page = new \Think\Page(count($data), 8);              
    	//array_slice函数代替了limit方法。原理相同。
   		$this->ask = array_slice($data, $page->firstRow,$page->listRows); 
   		$this->page = $page->show();
		$this->display();
	}

	Public function delete(){
		$id = I('id', 'intval');

		if (M('ask')->delete($id)) {
			M('answer')->where(array('aid' => $id))->delete();
			M('user')->where(array('id' => I('uid', 'intval')))->setDec('point', C('gold_del_ask'));
		}
		
	}
}
?>