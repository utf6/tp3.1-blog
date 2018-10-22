<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 列表页控制器
 */
Class ListController extends Controller{

	//列表页面
	Public function index(){
		$id = I('id');
		$db = D('BlogView');
		
		if ($id) {
			$name = M('blog_cate')->where('id='.$id)->getField('name');
			$where = array('name' => $name);
	
			$count = $db->where($where)->count();
			if(!$count){
				redirect('http://www.tigerbook.cn');
			}
			$page = new \Think\Page($count, 8, '', "web/id/{$id}/p");
			$limit = $page->firstRow . ',' . $page->listRows;
			$this->blog = $db->where($where)->limit($limit)->order('addtime DESC')->select();
			$this->page = $page->show();
		} else {
			$count = $db->count();
			$page = new \Think\Page($count, 8, '', 'web/p');
			$limit = $page->firstRow . ',' . $page->listRows;
			$this->blog = $db->limit($limit)->order('addtime DESC')->select();
			$this->page = $page->show();
		}
		$this->display();
	}

	//文章内容页面
	Public function content(){
		$id = I('id');
		$this->blog = D('BlogView')->where(array('id' => $id))->find();
		
		
		if (!$id || !$this->blog) {
			redirect(U('index'));
		}	

		$db = M('blog');
		$field = array('id,title');
		
		//上一篇 
		$pre  = $db ->where(array('id' => array('lt', $id)))->order('addtime DESC')->limit(1)->field($field)->select();

		if ($pre) {
			$this->pre = $pre[0];
		}else {
			$pre['title'] = '没有了';
			$this->pre = $pre;
		}

		//下一篇
		$nextId = $id + 1;
		$next = $db->where(array('id' => array('gt', $id)))->order('addtime ASC')->limit(1)->field($field)->select();
		if ($next) {
		  	$this->next = $next[0];
		} else {
			$next['title'] = '没有了';
			$this->next = $next;
		}  
		$this->display();
	}

	//点击次数
	Public function clickNum () {
		$id = I('id');
		$db = M('blog');
		$where = array('id' => $id);
		$click = $db->where($where)->getField('click');
		$db->where($where)->setInc('click');
		echo 'document.write(' . $click . ')';
	}
}
?>