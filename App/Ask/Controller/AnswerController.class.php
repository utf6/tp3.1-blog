<?php 
namespace Ask\Controller;
use Think\Controller;
/**
 * 问题详情 及其回答控制器
 */
Class AnswerController extends CommonController{

	Public function index(){
		$id = I('id', 'intval');   //问题ID
		$cid = I('cid', 'intval'); //问题所属分类ID
		if(!$id || !$cid){
			redirect(U('List/index'));
		}

		//问题基本信息
		$where = array('id' => $id);
		$askInfo = D('AskInfoView')->where($where)->find();
		if (!$askInfo) {
			redirect(U('List/index'));
		}		
		$this->askInfo = $askInfo;

		$model = D('AnswerView');
		//满意回答
		$this->goodAnswer = $model->where(array('answer.adopt' => 1))->find();

		//相关未解决问题
		$where = array('cid' => $cid, 'id' => array('neq', $id));
		$this->notSolve = M('ask')->where($where)->limit(10)->select();

		//所有回答
		$where = array('aid' => $id, 'answer.adopt' => 0);
		$count = $model->where($where)->count();  //分页 统计
		$page = new \Think\Page($count, 6);		  
		$limit = $page->firstRow . ',' . $page->listRows; //每页显示条数

		$this->allAnswer = $model->where($where)->limit($limit)->select();
		$this->allAnswerId = $model->where($where)->getField('uid', true);  //所有回答的ID 用来规定用户只能回答一次
		$this->page = $page->show();
		$this->display();
	}

	//回答问题
	Public function answer(){
		if (!IS_POST) {
			E('页面不存在');
		}

		//提取回答问题数据
		$data = array(
			'content' => I('content', 'intval'),
			'time' => time(),
			'aid' => I('aid', 'intval'),
			'uid' => session('uid') 
			);

		//插入回答数据
		if (M('answer')->data($data)->add()) {
			M('ask')->where(array('id' => $data['aid']))->setInc('answer');

			$user = M('user');  //实例化用户表
			$where = array('id' => session('uid'));
			$user->where($where)->setInc('answer');
			$user->where($where)->setInc('exp', C('exp_answer'));
			$user->where($where)->setInc('point', C('gold_answer'));

			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->error('回答失败, 请重试。。。');
		}
	}

	//采纳提问
	Public function adopt(){
		$id = I('id', 'intval');    //问题ID
		$aid = I('aid', 'intval');	//回答的ID

		$reward = I('reward', 0, 'intval');  //悬赏金币数
		//判断下问题ID和回答ID是否存在
		if (!$id || !$aid) {
			redirect(U('Index/index'));
		}
		//查找到该问题与回答
		if(!M('ask')->find($id) || !M('answer')->find($aid)){
			redirect(U('Index/index'));
		}

		//将问题修改为以解决
		$data = array('id' => $id, 'solved' => 1);
		M('ask')->save($data);

		//修改用户基本信息
		$where = array(array('id' => I('uid', 'intval')));
		$user = M('user');  //实例化用户表
		$user->where($where)->setInc('adopt');                //用户采纳数+1
		$user->where($where)->setInc('exp', C('exp_answer')); //经验增加
		$user->where($where)->setInc('point', $reward);       //增加金币

		//将回答更新为采纳的回答
		$data = array('id' => $aid, 'adopt' => 1);
		M('answer')->save($data);

		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>