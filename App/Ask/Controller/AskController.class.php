<?php
namespace Ask\Controller;
use Think\Controller;
/**
 * 问答前端用户提问控制器
 */
Class AskController extends CommonController{

	//用户提问视图
	Public function index(){
		$this->point = M('user')->where(array('id' => session('uid')))->getField('point');
		
		$this->cate = M('category')->where(array('pid' => 0))->select();
		$this->display();
	}

	//异步获取子栏目
	Public function getCate(){
		if (!IS_AJAX) {
			E('页面不存在');
		}

		if ($data = M('category')->where(array('pid' => I('id','intval')))->select()) {
			echo json_encode($data);
		} else {
			echo 0;
		}
	}

	//异步获取选中栏目的定级栏目及本身名称
	Public function getCheckCateName(){
		if (!IS_AJAX) {
			E('页面不存在');
		}

		$cate = getParents(M('category')->select(), I('pid', 'intval'));
		foreach ($cate as $v) {
			$str .= $v['name'] . '<font color="red">&nbsp;/&nbsp;</font>';
		}	
		echo (trim($str, '<font color="red">&nbsp;/&nbsp;</font>'));
	}

	//提交问题表单处理
	Public function send(){
		if (!IS_POST) {
			E('页面不存在');
		}

		//组合问题数据
		$data = array(
			'content' => I('content'),
			'reward' => I('reward', 'intval'),
			'cid' => I('cid', 'intval'),
			'uid' => session('uid'),
			'time' => time()
			);
		//插入问题并增加想关联属性值
		if (M('ask')->data($data)->add()) {
			$db = M('user');
			$where = array('id' => session('uid'));
			$db->where($where)->setInc('ask');
			$db->where($where)->setDec('point', I('reward', 'intval'));
			$db->where($where)->setInc('exp', C('exp_ask'));
			redirect(U('Member/index', array('id' => session('uid'))));
		} else {
			$this->error('发布失败，请重试。。。');
		}
	}

	Public function search(){
		$keyword = I('keyword');

		// if(!$keyword){
		// 	E('页面不存在');
		// }

		$where = array('content' => array('like', '%'.$keyword.'%'));
		$ask = D('AskView')->where($where)->select();
		foreach ($ask as $v) {
			$content = M('answer')->where(array('aid' => $v['id'], 'adopt' => 1))->getField('content');
			if (!$content) {
				$content = M('answer')->where(array('aid' => $v['id']))->order("time DESC")->getField('content');
			}
			$v['answerContent'] = $content;
			$result[] = $v;
		}

		$this->result = $result;
		$this->key_words = $keyword;
		$this->display();
	}
}
?>