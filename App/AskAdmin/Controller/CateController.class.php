<?php
namespace AskAdmin\Controller;
use Think\Controller;
/**
 * 栏目管理控制器
 */
Class CateController extends CommonController {

	//栏目列表视图
	Public function index(){
		$cate = M('category')->select();
		$this->cate = getCateLeve($cate, 0, 0, ' ');
		$this->display();
	}

	//添加顶级栏目视图
	Public function add(){
		$this->display();
	}

	//添加自分类视图
	Public function addSon(){
		$id = I('id', 0, 'intval');
		$this->cate = M('category')->find($id);
		$this->display();
	}

	//添加分类表单处理
	Public function addCate(){
		if (!IS_POST) {
			E('页面不存在');
		}

		if (M('category')->add($_POST)) {
			$this->success('添加成功', U('index'));
		} else {
			$this->error('添加失败');
		}
	}

	//编辑分类视图
	Public function edit(){
		$id = I('id', 0, 'intval');
		$this->cate = M('category')->find($id);
		$this->display();
	}


	//编辑栏目表单处理
	Public function editCate(){
		if (!IS_POST) {
			E('页面不存在');
		}

		if (M('category')->save($_POST)) {
			$this->success('修改成功', U('index'));
		} else {
			$this->error('修改失败');
		}
	}

	//删除栏目及其子栏目
	Public function delete(){
		//提取要删除的父级栏目ID
		$id = I('id', 0, 'intval');
		$cate = M('category')->select();
		//提取删除父级栏目的子栏目ID
		$ids = getChildsId($cate,$id);
		$ids[] = $id;

		//删除父级及其对应的子栏目
		if (M('category')->where(array('id' => array('in', $ids)))->delete()) {
			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败');
		}
	}
}
?>