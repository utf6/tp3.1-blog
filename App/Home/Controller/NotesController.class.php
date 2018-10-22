<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 前台笔记显示控制器
 */
Class NotesController extends Controller{

	Public function index(){
		$db = M('notes');
		$count = $db->count();
		$page = new \Think\Page($count, 8, '', 'note');
		$limit = $page->firstRow . ',' . $page->listRows;

		$this->notes = $db->limit($limit)->order('addtime DESC')->select();
		$this->page = $page->show();
		$this->display();
	}
}
?>