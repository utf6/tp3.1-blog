<?php 
namespace AskAdmin\Controller;
use Think\Controller;
/**
 * 问题管理控制器
 */
Class AnswerController extends CommonController{

	Public function index(){
		$answer = M('answer')->select();

		foreach ($answer as $v) {
			$ask_user =  M('ask')->where(array('id' => $v['aid']))->field(array('uid,content'))->find();
			$v['ask'] = $ask_user['content'];
			$v['asker'] = M('user')->where(array('id' => $ask_user['uid']))->getField('username');
			$v['askId'] = $ask_user['uid']; 
			$v['answer'] = M('user')->where(array('id' => $v['uid']))->getField('username');

			$data[] = $v;
		}
	
		//计算数组元素总个数                            
   		$page = new \Think\Page(count($data), 8);              
    	//array_slice函数代替了limit方法。原理相同。
   		$this->answer = array_slice($data, $page->firstRow,$page->listRows); 
   		$this->page = $page->show();

		$this->display();
	}

	//删除回答操作处理
	Public function delete(){
		$id = I('id', 'intval');
		if (M('answer')->delete($id)) {
			//采纳回答被删
			if (I('solved', 0, 'intval')) {
				M('ask')->where(array('id' => $aid))->save(array('solved' => 0));
				//提问者 减金币
				M('user')->where(array('id' => I('askId')))->setDec('point', C('gold_del_adopt_answer'));
				//回答者 减金币
				M('user')->where(array('id' => I('uid')))->setDec('point', C('gold_del_ask_adopt'));	
			} 
			//问题回答数减一
			M('ask')->where(array('id' => $aid))->setDec('answer');
			//回答着扣除金币
			M('user')->where(array('id' => I('uid')))->setDec('point', C('gold_del_answer'));  //回答者
		}
	}
}
?>