<?php
namespace BlogAdmin\Controller;
use Think\Controller;
/**
 * 栏目管理控制器
 */
Class CateController extends CommonController {

	//栏目列表视图
	Public function index(){
		$cate = M('blog_cate')->order('sort')->select();
		$this->cate = getCateLeve($cate);
		$this->display();
	}
	//栏目排序
	Public function sortCate(){
		if (!IS_POST) {
			E('页面不存在');
		}

		foreach ($_POST as $k => $v) {
			M('blog_cate')->where(array('id' => $k))->setField('sort', $v);
		}
		redirect(U('index'));
	}

	//添加栏目视图
	Public function add(){
		$this->pid = I('pid', 0, 'intval');
		$this->display();
	}

	//添加栏目表单处理
	Public function addCate(){
		if (M('blog_cate')->add($_POST)) {
			$this->success('添加成功', U('index'));
		} else {
			$this->error('添加失败');
		}
	}

	//修改栏目视图
	Public function edit(){
		$id = I('id');
		if (!$id) {
			E('页面不存在');
		}
		$this->cate = M('blog_cate')->where(array('id' => $id))->find();
		$this->display();
	}

	//修改栏目表单处理
	Public function editCate(){
		if(!IS_POST){
			E('页面不存在');
		}
		if (M('blog_cate')->save($_POST)) {
			$this->success('修改成功', U('index'));
		} else {
			$this->error('修改失败');
		}
	}

	//删除栏目处理
	Public function delCate(){
		$id = I('id');

		//判断是否为顶级栏目
		if (M('blog_cate')->where(array('pid' => $id))->find()) {
			$where = array(
				'id' => $id,
				'pid' => $id,
				'_logic' => 'OR'
			);
			//如果是顶级栏目 则连他的子级一起删除
			$result = M('blog_cate')->where($where)->delete();
		} else {
			//否则只删除他自己
			$result = M('blog_cate')->delete($id);
		}

		//判断删除操作是否成功
		if ($result) {
			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败');
		}
	}
}
?>